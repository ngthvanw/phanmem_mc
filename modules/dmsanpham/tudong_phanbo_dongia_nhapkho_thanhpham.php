<?php
include("../../config.php");
$OBJCT = new ketoantonghop();
$OBJCT_PSVT = new ps_chitiet_mavattu();
$OBJPSKT = new pskt();
$TuNgay = $_GET['tungay'];
$DenNgay = $_GET['denngay'];
$tutaobuttoan = $_GET['TuDongTaoButToanPhatSinh'];
$TuDongPhanBoTheoTyLe = $_GET['TuDongPhanBoTheoTyLe'];
if($TuDongPhanBoTheoTyLe=="true"){
	$phanbotheo = $_GET['phanbotheo'];
	$OBJCT->re_query("UPDATE bangtonghop_danhthu_chiphi_giathanhct t1
						INNER JOIN bangphanbo_chiphi_sxchung t2 ON t1.mact = t2.mact
						SET t1.sotiennc622pb = t2.sotiennc622pb
						WHERE t1.loaisp='SP';
						");// Cập nhật nhân công phân bổ từ bảng phân bổ nhân công

	$OBJCT->re_query("update bangtonghop_danhthu_chiphi_giathanhct set sotiencpsxcpb = '0' where loaisp = 'SP' and lacapthapnhat=0");
	$OBJCT->re_query("update bangtonghop_danhthu_chiphi_giathanhct set sotiencpsxc = '0' where loaisp = 'SP' and lacapthapnhat=0");
	$OBJCT->re_query("update bangtonghop_danhthu_chiphi_giathanhct set sotienncpb = '0' where loaisp = 'SP' and lacapthapnhat=0");// Ca máy 623
	$OBJCT->re_query("update bangtonghop_danhthu_chiphi_giathanhct set sotiennc622pb = '0' where loaisp = 'SP' and lacapthapnhat=0");// Ca máy 622
	$OBJCT->re_query("update bangtonghop_danhthu_chiphi_giathanhct set doanhthuthuan = '0' where loaisp = 'SP' and lacapthapnhat=0");// Ca máy 622
	$OBJCT->re_query("update bangtonghop_danhthu_chiphi_giathanhct set lailo = '0' where loaisp = 'SP' and lacapthapnhat=0");// Ca máy 622

	$dataDoanhThuThuan = $OBJCT->load_danhsach_doanhthu_thuan_sanpham($tungay, $denngay);// lấy tất cả thu chi  nhập xuất
	$sql_banggiathanh = "select * from bangtonghop_danhthu_chiphi_giathanhct where loaisp='SP'";
	$result_banggiathanh_sp = $OBJCT->re_query($sql_banggiathanh);
	$TongTienPhanBo = 0;
	$TongTienCanPhanBo = 0;
	if($phanbotheo=='doanhthu_thuan'){
		$dataDoanhThuThuan = $OBJCT->load_danhsach_doanhthuan_theosanpham($TuNgay, $DenNgay);// Lấy từ hoá đơn xuất bán sản phẩm
		foreach ($dataDoanhThuThuan as $itemTongDTT) {
			$TongTienCanPhanBo += ($itemTongDTT['tienco'] - $itemTongDTT['tienno']);
		}
		while ($itemCT = $OBJCT->re_fetch($result_banggiathanh_sp)) {
			$masp = $itemCT['mact'];
			if ($itemCT['mactcha'] == "0") {
				$TongTienPhanBo += $itemCT['sotiennl'];
			}
			$itemCT['sotiencanphanbo'] = $dataDoanhThuThuan[$masp]['tienco'];
			$data_banggiathanh_sp[$masp] = $itemCT;
		}
	}else if($phanbotheo=='doanhthu_thuchien'){
		$dataDoanhThucHien = $OBJCT->load_danhsach_doanhthuthuchien_theotungcongtrinh();// Lấy doanh thu thực hiện sản phẩm bên bảng CPSXC
		foreach ($dataDoanhThucHien as $itemTongDTTH) {
			if ($itemTongDTTH['loaisp'] == "SP") {
				$TongTienCanPhanBo += ($itemTongDTTH['tienco'] - $itemTongDTTH['tienno']);
			}
		}
		while ($itemCT = $OBJCT->re_fetch($result_banggiathanh_sp)) {
			$masp = $itemCT['mact'];
			if ($itemCT['mactcha'] == "0") {
				$TongTienPhanBo += $itemCT['sotiennl'];
			}
			$itemCT['sotiencanphanbo'] = $dataDoanhThucHien[$masp]['tienco'];
			$data_banggiathanh_sp[$masp] = $itemCT;
		}
	}else{
		while ($itemCT = $OBJCT->re_fetch($result_banggiathanh_sp)) {
			$masp = $itemCT['mact'];
			if ($itemCT['mactcha'] == "0") {
				$TongTienPhanBo += $itemCT['sotiennl'];
			}
			$TongTienCanPhanBo += $itemCT['sotiennltieuchuan'];
			$itemCT['sotiencanphanbo'] = $itemCT['sotiennltieuchuan'];
			$data_banggiathanh_sp[$masp] = $itemCT;
		}
	}

	$TongNVLPhanBo = 0;
	$SoTienNVL_LonNhat = 0;
	$MaSP_Luu_LonNhat = "";
	foreach ($data_banggiathanh_sp as $KMaSP=>$itemSP){// Phân bổ CPNVL Thực tế theo NVL Tiêu Chuẩn
		$SoTienCanPhanBo = $itemSP['sotiencanphanbo'];
		$TyLePhanBo = ($SoTienCanPhanBo/$TongTienCanPhanBo);
		$PhanBoNVL = round($TyLePhanBo* $TongTienPhanBo);
		if($SoTienNVL_LonNhat<$itemSP['sotiennltieuchuan']){
			$SoTienNVL_LonNhat = $itemSP['sotiennltieuchuan'];
			$MaSP_Luu_LonNhat = $KMaSP;
		}
		$TongNVLPhanBo+=$PhanBoNVL;
		$data_banggiathanh_sp[$KMaSP]['sotiennvlphanbo'] = $PhanBoNVL;
	}

	$ChenhLechSauPhanBo = $TongNVLPhanBo - $TongTienPhanBo;
	$data_banggiathanh_sp[$MaSP_Luu_LonNhat]['sotiennvlphanbo'] = $data_banggiathanh_sp[$MaSP_Luu_LonNhat]['sotiennvlphanbo']-$ChenhLechSauPhanBo;

	$SoLuongNhap_SP_TrongKy = $OBJCT->load_danhsach_soluong_nhapkho_sanpham($TuNgay,$DenNgay);// (Lấy số lượng nhập kho sản xuất thay cho số lượng xuất kho)

	$TongGiaThanhThanhPham = 0;
	$value_pskt_621 = "";
	$value_chitiet_pskt_621 = "";

	foreach ($data_banggiathanh_sp as $KMaSP_CapNhat=>$itemSP_CapNhat){
		$TongGiaThanhMotSP  = $itemSP_CapNhat['sotiennvlphanbo']+ $itemSP_CapNhat['sotiencpsxcpb']+ $itemSP_CapNhat['sotienncpb']+ $itemSP_CapNhat['sotiennc622pb'];
		$sotiennvlphanbo+=$itemSP_CapNhat['sotiennvlphanbo'];
		$sotiencpsxcpb+=$itemSP_CapNhat['sotiencpsxcpb'];
		//$sotiencpsxc+=$itemSP_CapNhat['sotiencpsxc'];
		$sotienncpb+=$itemSP_CapNhat['sotienncpb'];
		$sotiennc622pb+=$itemSP_CapNhat['sotiennc622pb'];
		$TongGiaThanhThanhPham+=$TongGiaThanhMotSP;
		$OBJCT->re_query("update bangtonghop_danhthu_chiphi_giathanhct set sotiennl = '".$itemSP_CapNhat['sotiennvlphanbo']."' where mact = '".$KMaSP_CapNhat."' AND loaisp = 'SP'");
		$SoLuongNhap_SP_NhapTrongKy = round($SoLuongNhap_SP_TrongKy[$KMaSP_CapNhat]['soluong'],5);
		$DonGiaMotSP[$KMaSP_CapNhat] = number_format(($TongGiaThanhMotSP/$SoLuongNhap_SP_NhapTrongKy),3,".","");
		$TongSoLuongNhap_SP_NhapTrongKy+=$SoLuongNhap_SP_NhapTrongKy;

		$sophieu++;
		$value_pskt_621 .= "('" . $sophieu . "','1','" . $DenNgay . "','154','79','" . $itemSP_CapNhat['sotiennvlphanbo'] . "','4'),";
		$value_chitiet_pskt_621 .= "('" . 1 . "','" . $DenNgay . "','" . $itemSP_CapNhat['sotiennvlphanbo'] . "','0001','Toàn Bộ','100093','Kết chuyển CP NVL TP: ".$KMaSP_CapNhat."','621','" . $itemSP_CapNhat['sotiennvlphanbo'] . "','4','79','" . $sophieu . "','4'),";

		$sophieu++;
		$value_pskt_622 .= "('" . $sophieu . "','1','" . $DenNgay . "','154','79','" . $itemSP_CapNhat['sotiennc622pb'] . "','4'),";
		$value_chitiet_pskt_622 .= "('" . 1 . "','" . $DenNgay . "','" . $itemSP_CapNhat['sotiennc622pb'] . "','0001','Toàn Bộ','100093','Kết chuyển CP NC TP: ".$KMaSP_CapNhat."','622','" . $itemSP_CapNhat['sotiennc622pb'] . "','4','79','" . $sophieu . "','4'),";

	}
	{
		//// cập nhật giá nhập kho sản xuất----------------------------------
		$data = $OBJCT_PSVT->laydanhsachphieunhapkhosanxuat_tu_denngay($TuNgay,$DenNgay);
		$TongGiaNhapKhoSP = 0;
		$ThanhTienNhapKho_LonNhat = 0;
		$SoPhieu_Luu = 0;
		foreach ($data as $sophieu => $iTem) {
			foreach ($iTem as $iTemMaVT) {
				$dongia = $DonGiaMotSP[$iTemMaVT['mavt']];
				$soluong = $iTemMaVT['soluongnhap'];
				$thanhtien = round($soluong * $dongia);
				if($ThanhTienNhapKho_LonNhat<$thanhtien){
					$ThanhTienNhapKho_LonNhat = $thanhtien;
					$SoPhieu_Luu = $sophieu;
				}
				$TongGiaNhapKhoSP+=$thanhtien;
				if (array_key_exists($iTemMaVT['matk'], $dinhkhoan[$sophieu])) {
					$dinhkhoan[$sophieu][$iTemMaVT['matk']] += $thanhtien;
				} else {
					$dinhkhoan[$sophieu][$iTemMaVT['matk']] = $thanhtien;
				}
				$OBJCT_PSVT->re_query("update chitiet_psvt set donggianhap='" . $dongia . "',thanhtienchuack='" . $thanhtien . "',thanhtien='" . $thanhtien . "' where sott='" . $iTemMaVT['sott'] . "'");
			}
		}
		foreach ($dinhkhoan as $ksophieu => $itemDK) {
			$OBJCT_PSVT->re_query("update dinhkhoan_psvt set sotien=0 where sophieu='" . $ksophieu . "'");
			foreach ($itemDK as $kmatk => $iTemSoTien) {
				$OBJCT_PSVT->re_query("update dinhkhoan_psvt set sotien='" . round($iTemSoTien) . "' where sophieu='" . $ksophieu . "' and tkno='" . $kmatk . "'");
			}
		}
		$ChenhLechGiaThanhNhapKho = $TongGiaThanhThanhPham-$TongGiaNhapKhoSP;
		if($ChenhLechGiaThanhNhapKho>100000000){// Nếu chênh lệch 100tr không điều chỉnh chênh lệch do sai quy trình
			echo "<script>alert('Vui lòng kiểm tra lại giá thành do chênh lệch giá lớn!');</script>";
		}
		$OBJCT_PSVT->re_query("update chitiet_psvt set thanhtienchuack=thanhtienchuack+" . $ChenhLechGiaThanhNhapKho . ",thanhtien=thanhtien+" . $ChenhLechGiaThanhNhapKho . " where sophieu='" . $SoPhieu_Luu . "' ORDER BY thanhtien DESC LIMIT 1;");
		$OBJCT_PSVT->re_query("update dinhkhoan_psvt set sotien=sotien+" . $ChenhLechGiaThanhNhapKho . " where sophieu='" . $SoPhieu_Luu . "' ORDER BY sotien DESC LIMIT 1 " );
		// Kết thúc nhập kho sản xuất--------------------------------
	}
	{// Kết chuyển 627 sang tài khoản 154, Kết chuyển riêng do 2 tài khoản này có tài khoản con
		$sophieu = $OBJPSKT->createSoPhieu();
	// Lấy danh sách tài khoản với số tiền giới hạn
		$sql1 = "SELECT matk, sum(sotien) as sotien FROM tmp_taikhoanchung_623_627_phanbo WHERE matk like '627%'GROUP BY matk ORDER BY matk ASC";
		$result1 = $OBJCT_PSVT->re_query($sql1);

		$matk_list = [];
		while ($row = $OBJCT_PSVT->re_fetch($result1)) {
			$matk_list[] = ['matk' => $row['matk'], 'sotien' => $row['sotien'], 'used' => 0];
		}

	// Lấy danh sách sản phẩm với số tiền cần phân bổ
		$sql2 = "SELECT mact, sotiencpsxcpb FROM bangtonghop_danhthu_chiphi_giathanhct WHERE sotiencpsxcpb > 0 AND loaisp = 'SP'";
		$result2 = $OBJCT_PSVT->re_query($sql2);

		$products = [];
		while ($row = $OBJCT_PSVT->re_fetch($result2)) {
			$products[] = ['mact' => $row['mact'], 'sotiencpsxcpb' => $row['sotiencpsxcpb']];
		}
		$allocations = [];
		foreach ($products as $product) {
			$remaining = $product['sotiencpsxcpb'];
			foreach ($matk_list as &$matk) {
				$available = $matk['sotien'] - $matk['used'];
				if ($available > 0) {
					$allocated = min($remaining, $available);
					$allocations[] = ['mact' => $product['mact'],'matk' => $matk['matk'],'sotien' => $allocated];
					$matk['used'] += $allocated;
					$remaining -= $allocated;
				}
				if ($remaining <= 0) break;
			}
		}
	}
	{// Kết chuyển 623 sang tài khoản 154, Kết chuyển riêng do 2 tài khoản này có tài khoản con
	// Lấy danh sách tài khoản với số tiền giới hạn
		$sql1 = "SELECT matk, sum(sotien) as sotien FROM tmp_taikhoanchung_623_627_phanbo WHERE matk like '623_'GROUP BY matk ORDER BY matk ASC";
		$result1 = $OBJCT_PSVT->re_query($sql1);

		$matk_list_623 = [];
		while ($row = $OBJCT_PSVT->re_fetch($result1)) {
			$matk_list_623[] = ['matk' => $row['matk'], 'sotien' => $row['sotien'], 'used' => 0];
		}

	// Lấy danh sách sản phẩm với số tiền cần phân bổ
		$sql2 = "SELECT mact, sotienncpb FROM bangtonghop_danhthu_chiphi_giathanhct WHERE sotiencpsxcpb > 0 AND loaisp = 'SP'";
		$result2 = $OBJCT_PSVT->re_query($sql2);

		$products_623 = [];
		while ($row = $OBJCT_PSVT->re_fetch($result2)) {
			$products_623[] = ['mact' => $row['mact'], 'sotienncpb' => $row['sotienncpb']];
		}
		$allocations_623 = [];
		foreach ($products_623 as $product) {
			$remaining = $product['sotienncpb'];
			foreach ($matk_list_623 as &$matk) {
				$available = $matk['sotien'] - $matk['used'];
				if ($available > 0) {
					$allocated = min($remaining, $available);
					$allocations_623[] = ['mact' => $product['mact'],'matk' => $matk['matk'],'sotien' => $allocated];
					$matk['used'] += $allocated;
					$remaining -= $allocated;
				}
				if ($remaining <= 0) break;
			}
		}
	}
		$value_pskt = "";
		$value_chitiet_pskt = "";

		foreach ($allocations as $alloc) {
			$sophieu++;
			$value_pskt .= "('" . $sophieu . "','1','" . $DenNgay . "','154','79','" . $alloc['sotien'] . "','4'),";
			$value_chitiet_pskt .= "('" . 1 . "','" . $DenNgay . "','" . $alloc['sotien'] . "','0001','Toàn Bộ','100093','Kết chuyển CPSXC TP: ".$alloc["mact"]."','".$alloc['matk']."','" . $alloc['sotien'] . "','4','79','" . $sophieu . "','4'),";
		}

		$value_pskt_623 = "";
		$value_chitiet_pskt_623 = "";
		foreach ($allocations_623 as $alloc) {
			$sophieu++;
			$value_pskt_623 .= "('" . $sophieu . "','1','" . $DenNgay . "','154','79','" . $alloc['sotien'] . "','4'),";
			$value_chitiet_pskt_623 .= "('" . 1 . "','" . $DenNgay . "','" . $alloc['sotien'] . "','0001','Toàn Bộ','100093','Kết chuyển CP ca máy TP: ".$alloc["mact"]."','".$alloc['matk']."','" . $alloc['sotien'] . "','4','79','" . $sophieu . "','4'),";
		}

		$sql_emp_pskt = "DELETE chitiet_pskt, pskt 
							FROM pskt 
							INNER JOIN chitiet_pskt ON pskt.sophieu = chitiet_pskt.sophieu 
							WHERE pskt.loaiphieu = '75' AND pskt.btps = '2' and ngayghiso>='".$TuNgay."' and ngayghiso<='".$DenNgay."';";
		$OBJCT->re_query($sql_emp_pskt);
		
		$sql_emp_pskt = "DELETE chitiet_pskt, pskt 
							FROM pskt 
							INNER JOIN chitiet_pskt ON pskt.sophieu = chitiet_pskt.sophieu 
							WHERE pskt.loaiphieu = '79' AND pskt.btps = '2' and ngayghiso>='".$TuNgay."' and ngayghiso<='".$DenNgay."';";
		$OBJCT->re_query($sql_emp_pskt);
		
		/*$sql_emp_pskt = "DELETE chitiet_pskt, pskt 
							FROM pskt 
							INNER JOIN chitiet_pskt ON pskt.sophieu = chitiet_pskt.sophieu 
							WHERE pskt.loaiphieu = '79' AND pskt.btps = '4' and ngayghiso>='".$TuNgay."' and ngayghiso<='".$DenNgay."';";
		$OBJCT->re_query($sql_emp_pskt); // btps = 4, SP-Phan bo SP theo NVL*/

		$sql_pskt = "insert into pskt(sophieu,mapskt,ngayghiso,tkco,loaiphieu,tongcong,btps) VALUE " . substr($value_pskt, 0, -1);
		$sql_chitiet_pskt = "insert into chitiet_pskt(mapskt,ngayhoadon,gtvnd1,mabp,bophan,mand1,noidung1,tkno1,tongtien,maloai,loaiphieu,sophieu,btps) VALUE " . substr($value_chitiet_pskt, 0, -1);

		$sql_pskt_621 = "insert into pskt(sophieu,mapskt,ngayghiso,tkco,loaiphieu,tongcong,btps) VALUE " . substr($value_pskt_621, 0, -1);
		$sql_chitiet_pskt_621 = "insert into chitiet_pskt(mapskt,ngayhoadon,gtvnd1,mabp,bophan,mand1,noidung1,tkno1,tongtien,maloai,loaiphieu,sophieu,btps) VALUE " . substr($value_chitiet_pskt_621, 0, -1);

		$sql_pskt_623 = "insert into pskt(sophieu,mapskt,ngayghiso,tkco,loaiphieu,tongcong,btps) VALUE " . substr($value_pskt_623, 0, -1);
		$sql_chitiet_pskt_623 = "insert into chitiet_pskt(mapskt,ngayhoadon,gtvnd1,mabp,bophan,mand1,noidung1,tkno1,tongtien,maloai,loaiphieu,sophieu,btps) VALUE " . substr($value_chitiet_pskt_623, 0, -1);

		$sql_pskt_622 = "insert into pskt(sophieu,mapskt,ngayghiso,tkco,loaiphieu,tongcong,btps) VALUE " . substr($value_pskt_622, 0, -1);
		$sql_chitiet_pskt_622 = "insert into chitiet_pskt(mapskt,ngayhoadon,gtvnd1,mabp,bophan,mand1,noidung1,tkno1,tongtien,maloai,loaiphieu,sophieu,btps) VALUE " . substr($value_chitiet_pskt_622, 0, -1);


	if ($tutaobuttoan == "true") {
			$OBJCT->re_query($sql_pskt);
			$OBJCT->re_query($sql_chitiet_pskt);

			$OBJCT->re_query($sql_pskt_621);
			$OBJCT->re_query($sql_chitiet_pskt_621);

			$OBJCT->re_query($sql_pskt_623);
			$OBJCT->re_query($sql_chitiet_pskt_623);

			$OBJCT->re_query($sql_pskt_622);
			$OBJCT->re_query($sql_chitiet_pskt_622);
		}
}

try {    // Thực hiện truy vấn hoặc logic xử lý dữ liệu
    $data = ['status' => 'success', 'message' => 'Dữ liệu xử lý thành công'];
    echo json_encode($data);
} catch (Exception $e) {
    echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
}
