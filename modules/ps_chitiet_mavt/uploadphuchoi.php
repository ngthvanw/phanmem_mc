<?php
ini_set('max_execution_time', 300);
require("../../config.php");
$OBJ = new ps_chitiet_mavattu();
$OBJHTTK = new hethongtaikhoan();
$OBJMaND = new manoidung();
$NhaCungCap = $_GET['nhacungcap'];
$manhom = $_GET['manhom'];
$matkhang = $_GET['matkhang'];
$matkdoanhthu = $_GET['matkdoanhthu'];
$SoPhieu = $_GET['sophieu'];
$loaiphieu = $_GET['loaiphieu'];
$xmlString = trim($_SESSION['DataPhucHoi']);
$allowed_tax = ['k', 'kk', 0, 5, 8, 10];
function isValidMSTLength($mst) {
    return preg_match('/^[0-9\-]{10,14}$/', trim($mst));
}
function normalize_tax($input) {
    // 1. Ép về chuỗi để loại bỏ float của PHP/Excel
    $input = trim((string)$input);

    // 2. Chuyển dấu phẩy về dấu chấm
    $input = str_replace(',', '.', $input);

    // 3. Chuẩn hóa sai số float kiểu 0.08000000000000001
    //    Giới hạn về tối đa 6 số thập phân rồi trim lại
    if (is_numeric($input)) {
        $input = rtrim(rtrim(number_format((float)$input, 2, '.', ''), '0'), '.');
    }

    // 4. Map dạng thập phân → %
    $map_decimal = [
        "0.1"  => "10",
        "0.08" => "8",
        "0.05" => "5",
    ];
    if (isset($map_decimal[$input])) {
        return $map_decimal[$input];
    }

    // 5. Dạng phần trăm
    if (preg_match('/^(\d+)%$/', $input, $m)) {
        return $m[1];
    }

    // 6. Dạng số nguyên 10, 8, 5, 0
    if (preg_match('/^(10|8|5|0)$/', $input)) {
        return $input;
    }

    // 7. Dạng chữ
    $map_str = [
        "KKKNT" => "kk",
        "KCT"   => "k",
        "K"     => "k",
		"k"     => "k",
        "-"     => "k",
        "%"     => "k",
        " "     => "k"
    ];
    if (isset($map_str[$input])) {
        return $map_str[$input];
    }

    // 8. Không khớp → mặc định 10
    return "";
}


//////////////////////////////////////////////////////////////////////////////////////////////
$OBJ->re_query("CREATE UNIQUE INDEX `idx_makh_makh` ON `makh` (`makh`);");
$OBJ->re_query("CREATE TABLE `nhaphoadon` ( `sott` INT NOT NULL AUTO_INCREMENT , `mavt` CHAR(20) NOT NULL , `tenvt` VARCHAR(500) NOT NULL , `dvt` VARCHAR(50) NOT NULL , `manhom` CHAR(10) NOT NULL , `matk` CHAR(10) NOT NULL , `tkdoanhthu` CHAR(10) NOT NULL , `tenkd` VARCHAR(500) NOT NULL , `soluong` DOUBLE(15,3) NOT NULL , `dongia` DOUBLE(15,3) NOT NULL , `thanhtien` BIGINT NOT NULL , `chietkhau` BIGINT NOT NULL , `thuesuat` CHAR(4) NOT NULL , `tienthue` BIGINT NOT NULL, `sophieu` BIGINT NOT NULL , PRIMARY KEY (`sott`), INDEX `id_mavt` (`mavt`)) ENGINE = InnoDB;");
$OBJ->re_query("ALTER TABLE `nhaphoadon` ADD `thanhtienchuack` BIGINT(20) NOT NULL AFTER `dongia`;");
if($NhaCungCap=='TT78'){
    $child = new SimpleXMLElement($xmlString);
    $data = $child->DLHDon->NDHDon->DSHHDVu;
    $TTHoaDon = $child->DLHDon->NDHDon->NBan->MST."@!@".$child->DLHDon->NDHDon->NBan->Ten."@!@".$child->DLHDon->NDHDon->NBan->DChi."@!@".$child->DLHDon->TTChung->KHMSHDon."@!@".$child->DLHDon->TTChung->KHHDon."@!@".$child->DLHDon->TTChung->SHDon."@!@".$child->DLHDon->TTChung->NLap;
    $sql_in = "INSERT INTO nhaphoadon(mavt,tenvt,dvt,manhom,matk,tkdoanhthu,tenkd,soluong,dongia,thanhtienchuack,thanhtien,chietkhau,thuesuat,tienthue,sophieu) VALUES ";
    $val="";
    foreach ($data->HHDVu as $item)
    {
		$MaVT = khu_dau_vn(str_replace(" ","_",trim($item->MHHDVu))); //=> Mã VT
		$TenVT = check_data($item->THHDVu); //=> Tên vật tư
		$TenVTKD = check_data(khu_dau_vn($item->THHDVu)); //=> Tên vật tư không dấu
		$DVTinh = $item->DVTinh; //=> Đơn vị tính
		$SoLuong = $item->SLuong; //=> Số lượng
		$DonGia = $item->DGia; //=> Đơn giá
		$TienChietKhau = round($item->STCKhau);// => Tiền chiết khấu
		$ThanhTien = round($item->ThTien); //=> Thành tiền đã chiết khấu
		$ThanhTienChuaCK = $ThanhTien+$TienChietKhau; //=> Thành tiền chưa chiết khấu
		$ThueSuat = normalize_tax($item->TSuat);
		if($ThueSuat==""){
			$ThueSuat = "k";
		}
		$TienThue = round(($item->ThTien*($item->TSuat/100))); //=> Tiền thuế

        $val.="('".$MaVT."','".$TenVT."','".$DVTinh."','".$manhom."','".$matkhang."','".$matkdoanhthu."','".$TenVTKD."','".$SoLuong."','".$DonGia."','".$ThanhTienChuaCK."','".$ThanhTien."','".$TienChietKhau."','".$ThueSuat."','".$TienThue."','".$SoPhieu."'),";
    }
    $SQL_INS = $sql_in.substr($val,0,-1);
    $OBJ->re_query("delete from nhaphoadon where sophieu='".$SoPhieu."'");
    $OBJ->re_query($SQL_INS);
}else if($NhaCungCap=='Excel' && $loaiphieu!='TC'){
    $data = $_SESSION['DataExcel'];
	$SoLuongDongExcel = count($data);
	if($SoLuongDongExcel>5000){
		echo "<script>alert('Số lượng dòng trong Excel quá lớn, chỉ được phép nhập tối đa 1000 dòng. Vui lòng chia nhỏ file Excel và thử lại.');</script>";
		exit();
	}
    $sql_in = "INSERT INTO nhaphoadon(mavt,tenvt,dvt,manhom,matk,tkdoanhthu,tenkd,soluong,dongia,thanhtienchuack,thanhtien,chietkhau,thuesuat,tienthue,sophieu) VALUES ";
    $val="";
    foreach ($data as $k=>$item)
    {
        if($k!=0 && $item[1]!=""){
			$MaVT = (str_replace(" ","_",trim($item[1]))); //=> Mã VT
			$TenVT = check_data($item[2]); //=> Tên vật tư
			$TenVTKD = khu_dau_vn($TenVT); //=> Tên vật tư không dấu
			$DVTinh = trim($item[3]); //=> Đơn vị tính
			$SoLuong = trim($item[4]); //=> Số lượng
			$DonGia = round($item[5],3); //=> Đơn giá
			$ThanhTienChuaCK = round($item[6]);
			$ThanhTien = round($item[6]) - round($item[7]);
			$TienChietKhau = round($item[7]);
			$ThueSuat = round($item[8]);
			$TienThue = round($item[9]);
            $val.="('".$MaVT."','".$TenVT."','".$DVTinh."','".$manhom."','".$matkhang."','".$matkdoanhthu."','".$TenVTKD."',".$SoLuong.",".$DonGia.",".$ThanhTienChuaCK.",".$ThanhTien.",".$TienChietKhau.",'".$ThueSuat."',".$TienThue.",'".$SoPhieu."'),";
        }
    }
    $SQL_INS = $sql_in.substr($val,0,-1);
    $OBJ->re_query("delete from nhaphoadon where sophieu='".$SoPhieu."'");
    $OBJ->re_query($SQL_INS);
}else if($NhaCungCap=='Excel_NP_TC'){ //Nhập Excel từ phiếu định khoản, thu chi
    $data = $_SESSION['DataExcel'];
	if($SoLuongDongExcel>5000){
		echo "<script>alert('Số lượng dòng trong Excel quá lớn, chỉ được phép nhập tối đa 5000 dòng. Vui lòng chia nhỏ file Excel và thử lại.');</script>";
		exit();
	}
    $OBJ->re_query("ALTER TABLE `pskt` ADD CONSTRAINT unique_sophieu UNIQUE(`sophieu`);");
	$OBJ->re_query("START TRANSACTION;");
	$sott = 0;
	$ThemPhieu = 0;
	?>
	<table style='width: 100%;border: 1px solid green;' border='1' >
	<tr>
	<td align="center"><b>Số TT</b></td>
	<td align="center"><b>Loại phiếu</b></td>
	<td align="center"><b>Số Phiếu</b></td>
	<td align="center"><b>STT CT</b></td>
	<td align="center"><b>Ngày HĐ</b></td>
	<td align="center"><b>TK 1</b></td>
	<td align="center"><b>Thông báo</b></td>
	<td align="center"><b>Mã ND</b></td>
	<td align="center"><b>Nội dung</b></td>
	<td align="center"><b>TK 2</b></td>
	<td align="center"><b>Tiền 1</b></td>
	<td align="center"><b>Trạng Thái</b></td>
	</tr>
	<?php
	$LoiDL_TatCa = TRUE;
    foreach ($data as $k=>$item)
    {
		$coThueGTGT = 0;
		$MaKH_NH = "";
		$TenKH_NH = "";
        if($k!=0 && $item[0]!=""){
            $SoPhieu = trim($item[0]);// Số phiếu
            $MaPSKT = trim($item[1]); //Số TT
			$LoaiPhieu = trim($item[2]); //Loại phiếu
			$NgayGhiSo_Nhap = str_replace("/", "-", trim($item[3])); //Ngày ghi sổ
			$NgayGhiSo_XuLy = new DateTime($NgayGhiSo_Nhap);
			$NgayGhiSo = $NgayGhiSo_XuLy->format('Y/m/d');
			$TKNo = trim($item[4]); //TK nợ
			$TenTKNo = trim($item[5]); // Tên TK Nợ
			$MaKH = khu_dau_vn(str_replace(" ", "_", trim($item[6]))); //Mã KH
			$TenKH = check_data(trim($item[7])); // Tên KH
			$MaKH_NH = khu_dau_vn(str_replace(" ", "_", trim($item[8]))); //Mã KH NH
			$TenKH_NH = check_data(trim($item[9])); // Tên KH NH
			$DiaChi = check_data(trim($item[10])); // Địa Chỉ
			$Masothue = trim($item[11]); //Mã số thuế
			$LoaiHoaDon = trim($item[12]); //Loại hoá đơn
			if($LoaiHoaDon==1){// Nếu là hoá đơn GTGT
				$coThueGTGT = 1;
			}
			$MauHoaDon = trim($item[13]); //Mẫu HĐ
			$KyHieuHD = trim($item[14]); //Ký hiệu HĐ
			$SoHoaDon = trim($item[15]); //Số hoá đơn
			$NgayHoaDon_Nhap = str_replace("/", "-", trim($item[16])); //Ngày hoá đơn
			$NgayHoaDon_XuLy = new DateTime($NgayHoaDon_Nhap);
			$NgayHoaDon = $NgayHoaDon_XuLy->format('Y/m/d');
			$LoaiBP = trim($item[17]); //Loại bộ phận
			if ($LoaiBP != "SP" && $LoaiBP != "CT" && $LoaiBP != "HD" && $LoaiBP != "") {
				$LoaiBP = "";
			}
			$MaBP = trim($item[18]); //Mã bộ phận
			$TenBP = check_data(trim($item[19])); //Tên bộ phận
			if ($MaBP == "") {
				$MaBP = "0001";
				$TenBP = "Toàn bộ";
			}
			$MaNoiDung1 = trim($item[20]); //Mã nội dung 1
			$NoiDung1 = check_data(trim($item[21])); //Nội dung 1
			$TKNo1 = trim($item[22]); //TK nợ 1
			$ThanhTien = trim($item[23]); //Thành tiền
			$vatPercentage = trim($item[24]); //Thuế suất
			if($LoaiHoaDon==1){// Nếu là hoá đơn GTGT
			$ThueSuat = normalize_tax($vatPercentage);
				if(trim($ThueSuat)==""){
					$ThongBaoLoi[]="- Thuế suất không được trống!";
				}else{
					if (!in_array($ThueSuat,$allowed_tax, true)) {
						$ThongBaoLoi[]="- Thuế suất không đúng định dạng ['k','kk',0,5,8,10]!";
					}
				}
			}else{
				$ThueSuat = "k";
			}
			$MaNoiDung2 = trim($item[25]); //Mã nội dung 2
			$NoiDung2 = check_data(trim($item[26])); //Nội dung 2
			$TKNo2 = trim($item[27]); //TK nợ 2
			$TienThue = trim($item[28]); //Thuế
			$TongTien = trim($item[29]); //Tổng tiền
			$LoaiHHDV = trim($item[30]); //Loại hàng hoá, dịch vụ

			if($LoaiHHDV==0){
				$LoaiHHDV =1;
			}

            $SQL_MaKH = "insert into makh (sott,makh,masothue,tenkh,diachi,makhcha,tenkd,manhom) value (0,'".$MaKH."','".$Masothue."','".$TenKH."','".$DiaChi."','0','".khu_dau_vn($TenKH)."','1001');";
            if ($OBJ->re_query($SQL_MaKH) == TRUE) {
				$OBJ->re_query("update makh set sott=stt where sott=0");// Cập nhật lại Số TT mã khách hàng
            }

            $sql_pskt = "INSERT INTO pskt (sophieu,mapskt,ngayghiso,makh,tenkh,diachi,masothue,tkco,tentkco,tongcong,loaiphieu,makh_nh,tenkh_nh,machinhanh)
                     VALUES('" . $SoPhieu . "','" . $MaPSKT . "','" . $NgayGhiSo . "','" . $MaKH . "','" . $TenKH . "','" . $DiaChi . "','" . $Masothue . "','" . $TKNo . "','" . $TenTKNo . "','" . $TongTien . "','" . $LoaiPhieu . "','" . $MaKH_NH . "','" . $TenKH_NH . "','".$_SESSION['MST']."');";
            if($SoPhieu_HienTai!=$SoPhieu){
					$InSoPhieu = $SoPhieu;// In STT phiếu thu
					$SoPhieu_HienTai = $SoPhieu;
					$sott++;
			}else{
				$InSoPhieu ="............";
			}
			
			//-- Kiểm tra dữ liệu
			$LoiDL = TRUE;
			$ThongBaoLoi = array();
			if($MaPSKT==""){
				$LoiDL = FALSE;
				$ThongBaoLoi[]="- Số TT trống!";
			}else{
				if (!is_numeric($MaPSKT)) {
					$LoiDL = FALSE;
					$ThongBaoLoi[]="- Số TT phải là số.";
				}
			}
			if($SoPhieu==""){
				$LoiDL = FALSE;
				$ThongBaoLoi[]="- Số phiếu trống!";
			}else{
				if (!is_numeric($SoPhieu)) {
					$LoiDL = FALSE;
					$ThongBaoLoi[]="- Số phiếu phải là số.";
				}
			}
			if($LoaiPhieu==""){
				$LoiDL = FALSE;
				$ThongBaoLoi[]="- Loại phiếu trống!";
			}else{
				if(substr($TKNo,0,3)==112){// Nếu là Ngân hàng
					$loaiPhieuMapThu = array(
 										   	112101 => 5, 112102 => 7, 112103 => 9, 112104 => 11, 112105 => 13,
    										112106 => 15, 112107 => 17, 112108 => 19, 112109 => 21, 112110 => 23,
											112111 => 25, 112112 => 27, 112113 => 29, 112114 => 31, 112115 => 33,
											112116 => 55, 112117 => 57, 112118 => 59, 112119 => 61, 112120 => 63,
											112201 => 35, 112202 => 37, 112203 => 39, 112204 => 41, 112205 => 43,
											112206 => 45, 112207 => 47, 112208 => 49, 112209 => 51, 112210 => 53
										);
					$loaiPhieuMapChi = array(
											112101 => 6, 112102 => 8, 112103 => 10, 112104 => 12, 112105 => 14,
											112106 => 16, 112107 => 18, 112108 => 20, 112109 => 22, 112110 => 24,
											112111 => 26, 112112 => 28, 112113 => 30, 112114 => 32, 112115 => 34,
											112116 => 56, 112117 => 58, 112118 => 60, 112119 => 62, 112120 => 64,
											112201 => 36, 112202 => 38, 112203 => 40, 112204 => 42, 112205 => 44,
											112206 => 46, 112207 => 48, 112208 => 50, 112209 => 52, 112210 => 54
										);
					$tkHopLe = range(112101, 112210);
					if (in_array($TKNo, $tkHopLe)) {
						if (isset($loaiPhieuMapThu[$TKNo]) && isset($loaiPhieuMapChi[$TKNo]) &&	$LoaiPhieu != $loaiPhieuMapThu[$TKNo] && $LoaiPhieu != $loaiPhieuMapChi[$TKNo]) {
							$LoiDL = FALSE;
							$ThongBaoLoi[] = "- TK $TKNo chỉ chấp nhận loại phiếu là {$loaiPhieuMapThu[$TKNo]} hoặc {$loaiPhieuMapChi[$TKNo]}!";
						}
					}
				}else{// Là các phiếu còn lại ngoài ngân hàng
					if(substr($TKNo,0,3)==111){// Nếu là tiền mặt
						if($LoaiPhieu!=1 && $LoaiPhieu!=2){
							$LoiDL = FALSE;
							$ThongBaoLoi[]="- TK ".$TKNo." Loại phiếu này không tồn tại loại phiếu chỉ từ 1-2!";
						}
					}else{
						if($LoaiPhieu!=3 && $LoaiPhieu!=4){
							$LoiDL = FALSE;
							$ThongBaoLoi[]="- TK ".$TKNo." Loại phiếu này không tồn tại loại phiếu chỉ từ 3-4!";
						}
					}
				}
			}
			if($NgayGhiSo_Nhap==""){
				$LoiDL = FALSE;
				$ThongBaoLoi[]="- Ngày ghi sổ trống!";
			}else{
				$NamGhiSo = $NgayGhiSo_XuLy->format('Y');
				if($NamGhiSo!=$_SESSION['NienDo']){
					$LoiDL = FALSE;
					$ThongBaoLoi[]="- Ngày ghi sổ không thuộc niên độ ".$_SESSION['NienDo']."!";
				}
			}
			if($NgayHoaDon_Nhap==""){
				$LoiDL = FALSE;
				$ThongBaoLoi[]="- Ngày hoá đơn trống!";
			}
			if($TKNo==""){
				$LoiDL = FALSE;
				$ThongBaoLoi[]="- TK 1 trống!";
			}else{
				$OBJHTTK->set_MaTK($TKNo);
				$TKNo_TonTai = $OBJHTTK->checkKeyTonTai();
				if($TKNo_TonTai==FALSE){
					$LoiDL = FALSE;
					$ThongBaoLoi[]="- TK ".$TKNo." không tồn tại!";
				}
			}
			if($MaKH==""){
				$LoiDL = FALSE;
				$ThongBaoLoi[]="- Mã khách hàng trống!";
			}
			if($Masothue!=""){
				if(!isValidMSTLength($Masothue)){
					$LoiDL = FALSE;
					$ThongBaoLoi[]="- Mã số thuế không đúng định dạng!";
				}
			}
			if($LoaiHoaDon==""){
				$LoiDL = FALSE;
				$ThongBaoLoi[]="- Loại hoá đơn trống!";
			}else{
				if($LoaiHoaDon!=1 && $LoaiHoaDon!=2 && $LoaiHoaDon!=3 && $LoaiHoaDon!=4 && $LoaiHoaDon!=5){
					$LoiDL = FALSE;
					$ThongBaoLoi[]="- Loại hoá đơn chỉ được phép nhập từ 1-5!";
				}
			}

			if($TenKH==""){
				$LoiDL = FALSE;
				$ThongBaoLoi[]="- Tên khách hàng trống!";
			}
			if($ThanhTien!="" || $ThanhTien!=0){
				if($TKNo1==""){
				$LoiDL = FALSE;
				$ThongBaoLoi[]="- TK 2 trống!";
				}else{
					$OBJHTTK->set_MaTK($TKNo1);
					$TKNo1_TonTai = $OBJHTTK->checkKeyTonTai();
					if($TKNo1_TonTai==FALSE){
						$LoiDL = FALSE;
						$ThongBaoLoi[]="- TK ".$TKNo1." không tồn tại!";
					}
				}
			}
			if($TienThue!="" || $TienThue!=0){
				if($TKNo2==""){
					$LoiDL = FALSE;
					$ThongBaoLoi[]="- TK 3 trống";
				}else{
					$OBJHTTK->set_MaTK($TKNo2);
					$TKNo2_TonTai = $OBJHTTK->checkKeyTonTai();
					if($TKNo2_TonTai==FALSE){
						$LoiDL = FALSE;
						$ThongBaoLoi[]="- TK ".$TKNo2." không tồn tại";
					}
				}
				if($vatPercentage=="" && $LoaiHoaDon){
					$LoiDL = FALSE;
					$ThongBaoLoi[]="- Thuế suất trống!";
				}
			}
			if($TongTien!=($ThanhTien+$TienThue)){
				$LoiDL = FALSE;
				$ThongBaoLoi[]="- Tổng tiền khác (Tiền hàng+Tiền thuế)!";
			}
			//--- Kết thúc kiểm tra dữ liệu
			if ($OBJ->re_query($sql_pskt) == TRUE && $LoiDL==TRUE) {
				$ThemPhieu++;
				echo "<td align='center'>".$MaPSKT."</td>";
					echo "<td align='center'>".$LoaiPhieu."</td>";
					echo "<td>".$InSoPhieu."</td>";
					echo "<td>".$MaPSKT."</td>";
					echo "<td>".$NgayHoaDon_Nhap."</td>";
					echo "<td>".$TKNo."</td>";
				echo "<td style='color:blue;background-color:Yellow'>Thành Công</td>";
            } else {
				if($LoiDL == FALSE){
					echo "<td align='center'>".$MaPSKT."</td>";
					echo "<td align='center'>".$LoaiPhieu."</td>";
					echo "<td>".$InSoPhieu."</td>";
					echo "<td>".$MaPSKT."</td>";
					echo "<td>".$NgayHoaDon_Nhap."</td>";
					echo "<td>".$TKNo."</td>";
					echo "<td style='color:red;'>";
					foreach($ThongBaoLoi as $iTem_ThongBaoLoi){
						echo $iTem_ThongBaoLoi."<br/>";
					}
					echo "</td>";
				}else{
					$LoiDL = FALSE;
					echo "<td align='center'>".$MaPSKT."</td>";
					echo "<td align='center'>".$LoaiPhieu."</td>";
					echo "<td>".$InSoPhieu."</td>";
					echo "<td>".$MaPSKT."</td>";
					echo "<td>".$NgayHoaDon."</td>";
					echo "<td>".$TKNo."</td>";
					echo "<td style='color:red;' align='center'>".$OBJ->re_error($sql_pskt)."</td>";
				}                
            }
            $sql_chitiet_pskt = "INSERT INTO chitiet_pskt (sophieu,mapskt,mauso,seri,sct,ngayhoadon,mabp,bophan,mand1,noidung1,tkno1,gtvnd1,mand2,noidung2,tkno2,gtvnd2,tongtien,maloai,chuthich,loaiphieu,makhno,tenkhachhang,diachikh,thuesuat1,chiphikhongloaitru,loaitokhai,loaisp,ngaykhaithue,loaihanghoadichvu,masothuekh,sott,duandautu,cothuegtgt)
                     VALUES('" . $SoPhieu . "','" . $MaPSKT . "','" . $MauHoaDon . "','" . $KyHieuHD . "','" . $SoHoaDon . "','" . $NgayHoaDon . "','" . $MaBP . "','" . $TenBP . "','" . $MaNoiDung1 . "','" . $NoiDung1 . "','" . $TKNo1 . "','" . $ThanhTien . "','" . $MaNoiDung2 . "','" . $NoiDung2 . "','" . $TKNo2 . "','" . $TienThue . "','" . $TongTien . "','" . $LoaiHoaDon . "','" . $NoiDung1 . "','" . $LoaiPhieu . "','" . $MaKH . "','" . $TenKH . "','" . $DiaChi . "','" . $ThueSuat . "','0','1','" . $LoaiBP . "','" . $NgayGhiSo . "','".$LoaiHHDV."','" . $Masothue . "','" . $SoPhieu . "',0,$coThueGTGT);";

            if ($OBJ->re_query($sql_chitiet_pskt) == TRUE && $LoiDL==TRUE) {
                echo "<td>".$MaNoiDung1."</td>";
				echo "<td>".$NoiDung1."</td>";
				echo "<td>".$TKNo1."</td>";
				echo "<td align='right'>".NB_Format($ThanhTien)."</td>";
				echo "<td style='color:blue;'>Thành công</td>";
            } else {
				$LoiDL = FALSE;
				$OBJ->re_query("delete from pskt where sophieu='".$SoPhieu."'");// Xoá phiếu PSKT nếu chitiet_pskt bị lỗi
				$OBJ->re_query("delete from chitiet_pskt where sophieu='".$SoPhieu."'");// Xoá phiếu PSKT nếu chitiet_pskt bị lỗi
                echo "<td>".$MaNoiDung1."</td>";
				echo "<td>".$NoiDung1."</td>";
				echo "<td>".$TKNo1."</td>";
				echo "<td align='right'>".NB_Format($ThanhTien)."</td>";
				echo "<td style='color:white;background-color:red;' align='center'>".$OBJ->re_error($sql_chitiet_pskt)."</td>";
            }
			echo "</tr>";
			if(!$LoiDL){
				$LoiDL_TatCa = FALSE;
			}
        }
	}
		if(!$LoiDL_TatCa){
			$OBJ->re_query("ROLLBACK;");
		}else{
			$OBJ->re_query("COMMIT;");
		}
		?>
		<tr>
			<td colspan="12" align='center' style='color:blue;'><b>ĐÃ KIỂM TRA <?php echo $ThemPhieu; ?> PHIẾU THÀNH CÔNG.</b><b style='color:red;'> LỖI: <?php echo ($sott-$ThemPhieu); ?>&nbsp; PHIẾU .</b></td>
		</tr>
		<?php
		if(!$LoiDL_TatCa){
		?>
		<tr>
			<td colspan="12" align='center' style='color:red;'><b>THÊM DỮ LIỆU THẤT BẠI.VUI LÒNG ĐIỀU CHỈNH EXCEL THEO THÔNG BÁO LỖI TRƯỚC KHI THÊM</b></td>
		</tr>
		<?php
		}else{
		?>
			<td colspan="12" align='center' style='color:BLUE;'><b>ĐÃ THÊM DỮ LIỆU THÀNH CÔNG.</b></td>
		<?php
			}
		?>
	</table>
	<?php
}else if($NhaCungCap=='Excel_NP_NX'){
    $data = $_SESSION['DataExcel'];
	if($SoLuongDongExcel>5000){
		echo "<script>alert('Số lượng dòng trong Excel quá lớn, chỉ được phép nhập tối đa 5000 dòng. Vui lòng chia nhỏ file Excel và thử lại.');</script>";
		exit();
	}
    $OBJ->re_query("ALTER TABLE `psvt` ADD CONSTRAINT unique_sophieu UNIQUE(`sophieu`);");
	$OBJ->re_query("START TRANSACTION;");
	$sott = 0;
	$ThemPhieu = 0;
	?>
	<table style='width: 100%;border: 1px solid green;' border='1' >
	<tr>
	<td align="center"><b>Số TT</b></td>
	<td align="center"><b>Số Phiếu</b></td>
	<td align="center"><b>Mã CT</b></td>
	<td align="center"><b>Ngày hoá đơn</b></td>
	<td align="center"><b>Mã ND</b></td>
	<td align="center"><b>Nội dung</b></td>
	<td align="center"><b>Trạng Thái</b></td>
	<td align="center"><b>Mã VT</b></td>
	<td align="center"><b>Tên VT</b></td>
	<td align="center"><b>Trạng Thái</b></td>
	</tr>
	<?php
	$LoiDL_TatCa = TRUE;
	$PhienBan = $data[0][1];
    foreach ($data as $k=>$item)
    {
		$coThueGTGT = 0;
        if($k>1 && $item[2]!=""){
            $SoPhieu = trim($item[0]); //=> Số phiếu
			$MaPSKT = trim($item[1]); //=> Số TT
			$LoaiPhieu = trim($item[2]); //=> Loại phiếu
			$LoaiHoaDon = trim($item[3]); //=> Loại hoá đơn
			if($LoaiHoaDon==1){// Nếu là hoá đơn GTGT
				$coThueGTGT = 1;
			}
			$MauHoaDon = trim($item[4]); //=> Mẫu HĐ
			$KyHieuHD = trim($item[5]); //=> Ký Hiệu
			$SoHoaDon = trim($item[6]); //=> Số HĐ

			$NgayGhiSo_Nhap = str_replace("/", "-", trim($item[7])); //Ngày ghi sổ
			$NgayGhiSo_XuLy = new DateTime($NgayGhiSo_Nhap);
			$NgayGhiSo = $NgayGhiSo_XuLy->format('Y/m/d');

			$NgayHoaDon_Nhap = str_replace("/", "-", trim($item[8])); //Ngày hoá đơn
			$NgayHoaDon_XuLy = new DateTime($NgayHoaDon_Nhap);
			$NgayHoaDon = $NgayHoaDon_XuLy->format('Y/m/d');

			$MaNoiDung = trim($item[9]); //=> Mã ND
			$NoiDung = check_data(trim($item[10])); //=> Nội dung
			$MaKH = khu_dau_vn(str_replace(" ", "_", trim($item[11]))); //=> Mã KH
			$TenKH = check_data(trim($item[12])); //=> Tên KH
			$DiaChi = check_data(trim($item[13])); //=> Địa chỉ
			$Masothue = trim($item[14]); //=> Mã số thuế
			$MaKho = trim($item[15]); //=> Mã kho
			if ($MaKho == "") {
				$MaKho = "0010";
			}

			$LoaiBP = trim($item[16]); //=> Loại BP
			if ($LoaiBP != "SP" && $LoaiBP != "CT" && $LoaiBP != "HD" && $LoaiBP != "") {
				$LoaiBP = "";
			}
			$MaBP = trim($item[17]); //=> Mã BP
			$TenBP = check_data(trim($item[18])); //=> Tên bộ phận
			if ($MaBP == "") {
				$MaBP = "0001";
				$TenBP = "Toàn bộ";
			}

			$TongThanhTien = trim($item[19]); //=> Tổng Tiền hàng
			$TongTienThue = trim($item[20]); //=> Tổng Tiền thuế
			$TongTien = trim($item[21]); //=> Tổng cộng
			$LoaiHHDV = trim($item[22]); //Loại hàng hoá, dịch vụ

			$MaVT = khu_dau_vn(str_replace(" ", "_", trim($item[23]))); //=> Mã VT
			$TenVT = check_data(trim($item[24])); //=> Tên vật tư
			$DVTinh = trim($item[25]); //=> ĐVT
			$TKKho = trim($item[26]); //=> TK Kho
			$TKDoanhThu = trim($item[27]); //=> TK doanh thu
			$SoLuong = trim($item[28]); //=> Số lượng
			$DonGia = trim($item[29]); //=> Đơn giá
			$IienHang = trim($item[30]); //=> Thành hàng
			$TienChietKhau = trim($item[31]); //=> Chiết khấu
			$IienHangSauCK = $IienHang - $TienChietKhau; //=> Thành tiền sau chiết khấu
			$vatPercentage = trim($item[32]); //=> Thuế suất
			if($LoaiHoaDon==1){// Nếu là hoá đơn GTGT
			$ThueSuat = normalize_tax($vatPercentage);
				if(trim($ThueSuat)==""){
					$ThongBaoLoi[]="- Thuế suất không được trống!";
				}else{
					if (!in_array($ThueSuat,$allowed_tax, true)) {
						$ThongBaoLoi[]="- Thuế suất không đúng định dạng ['k','kk',0,5,8,10]!";
					}
				}
			}else{
				$ThueSuat = "k";
			}
			$TienThue = trim($item[33]); //=> Tiền thuế

			if($LoaiHHDV==0){
				$LoaiHHDV =1;
			}
			
			$SQL_MaKH = "insert into makh (sott,makh,masothue,tenkh,diachi,makhcha,tenkd,manhom) value (0,'".$MaKH."','".$Masothue."','".$TenKH."','".$DiaChi."','0','".khu_dau_vn($TenKH)."','1001');";
            if ($OBJ->re_query($SQL_MaKH) == TRUE) {
				$OBJ->re_query("update makh set sott=stt where sott=0");// Cập nhật lại Số TT mã khách hàng
            }
			
			$OBJ->re_query("insert into mavt (sott,mavt,tenvt,dvt,manhom,matk,tkdoanhthu,tenkd,rate) value (0,'".khu_dau_vn($MaVT)."','".$TenVT."','".$DVTinh."','1230','".$TKKho."','".$TKDoanhThu."','".khu_dau_vn($TenVT)."','".$ThueSuat."')");
			$OBJ->re_query("update mavt set sott=stt where sott=0");// Cập nhật lại Số TT mã vật tư

			$sql_psvt = "INSERT INTO psvt (mapskt,sophieu,seri,sct,mauso,loaict,ngayghiso,ngayhoadon,loaiphieu,mand,noidung,makh,masothue,tenkh,diachi,makho,tenkho,kho,chuthich,tienhang,tienthue,tongcong,loaitokhai,loaisp,ngaykhaithue,loaihanghoadichvu,dathem,maloai,machinhanh,cothuegtgt) VALUES ('" . $MaPSKT . "','" . $SoPhieu . "', '" . $KyHieuHD . "', '" . $SoHoaDon . "','" . $MauHoaDon . "','" . $LoaiHoaDon . "', '" . $NgayGhiSo . "', '" . $NgayHoaDon . "', '" . $LoaiPhieu . "', '" . $MaNoiDung . "', '" . $NoiDung . "', '" . $MaKH . "','" . $Masothue . "','" . $TenKH . "', '" . $DiaChi . "', '" . $MaBP . "', '" . $TenBP . "','" . $MaKho . "', '" . $NoiDung . "', '" . $TongThanhTien . "','" . $TongTienThue . "', '" . $TongTien . "','1','".$LoaiBP."','" . $NgayGhiSo . "','".$LoaiHHDV."',1,'" . $LoaiHoaDon . "','".$_SESSION['MST']."','" . $coThueGTGT . "');";
			
			//-- Kiểm tra dữ liệu
			$LoiDL = TRUE;
			$ThongBaoLoi = array();
			if($PhienBan!="1.1.1"){
				$LoiDL = FALSE;
				$ThongBaoLoi[]="- Vui lòng tải mẫu excel mới nhất Phiên bản hiện tại 1.1.1!";
			}
			if($MaPSKT==""){
				$LoiDL = FALSE;
				$ThongBaoLoi[]="- Số TT trống!";
			}else{
				if (!is_numeric($MaPSKT)) {
					$LoiDL = FALSE;
					$ThongBaoLoi[]="- Số TT phải là số.";
				}
			}
			if($SoPhieu==""){
				$LoiDL = FALSE;
				$ThongBaoLoi[]="- Số phiếu trống!";
			}else{
				if (!is_numeric($SoPhieu)) {
					$LoiDL = FALSE;
					$ThongBaoLoi[]="- Số phiếu phải là số.";
				}
			}
			if($LoaiPhieu==""){
				$LoiDL = FALSE;
				$ThongBaoLoi[]="- Loại phiếu trống!";
			}else{
				if ($LoaiPhieu != 1 && $LoaiPhieu != 2 && $LoaiPhieu != 3) {
					$LoiDL = FALSE;
					$ThongBaoLoi[] = "- TK " . $TKNo . " Loại phiếu này không tồn tại, chỉ từ 1 đến 3!";
				}else{
					if ($LoaiPhieu == 1) {
						if($MaNoiDung=="100014" || $MaNoiDung=="100020"){
							$LoiDL = FALSE;
							$ThongBaoLoi[] = "- Nội dung: " . $MaNoiDung." - ".$NoiDung. " Không hợp lệ trong phiếu nhập kho!";
						}
					}
					if ($LoaiPhieu == 2) {
						if($MaNoiDung=="100010" || $MaNoiDung=="100011"){
							$LoiDL = FALSE;
							$ThongBaoLoi[] = "- Nội dung: " . $MaNoiDung." - ".$NoiDung. " Không hợp lệ trong phiếu xuất kho!";
						}
					}
					if ($LoaiPhieu == 3) {
						if($MaNoiDung=="100010" || $MaNoiDung=="100011" || $MaNoiDung=="100014" || $MaNoiDung!=="100020"){
							$LoiDL = FALSE;
							$ThongBaoLoi[] = "- Nội dung: " . $MaNoiDung." - ".$NoiDung. " Không hợp lệ trong phiếu xuất kho sản xuất!";
						}
					}
				}
			}
			if($LoaiHoaDon==""){
				$LoiDL = FALSE;
				$ThongBaoLoi[]="- Loại hoá đơn trống!";
			}else{
				if ($LoaiHoaDon != 1 && $LoaiHoaDon != 2 && $LoaiHoaDon != 3 && $LoaiHoaDon != 4 && $LoaiHoaDon != 5) {
					$LoiDL = FALSE;
					$ThongBaoLoi[] = "- TK " . $TKNo . " Loại phiếu này không tồn tại, chỉ từ 1 đến 5!";
				}
			}
			if($NgayGhiSo_Nhap==""){
				$LoiDL = FALSE;
				$ThongBaoLoi[]="- Ngày ghi sổ trống!";
			}else{
				$NamGhiSo = $NgayGhiSo_XuLy->format('Y');
				if($NamGhiSo!=$_SESSION['NienDo']){
					$LoiDL = FALSE;
					$ThongBaoLoi[]="- Ngày ghi sổ không thuộc niên độ ".$_SESSION['NienDo']."!";
				}
			}
			if($NgayHoaDon_Nhap==""){
				$LoiDL = FALSE;
				$ThongBaoLoi[]="- Ngày hoá đơn trống!";
			}
			if($MaKH==""){
				$LoiDL = FALSE;
				$ThongBaoLoi[]="- Mã khách hàng trống!";
			}
			if($Masothue!=""){
				if(!isValidMSTLength($Masothue)){
					$LoiDL = FALSE;
					$ThongBaoLoi[]="- Mã số thuế không đúng định dạng!";
				}
			}
			if($TenKH==""){
				$LoiDL = FALSE;
				$ThongBaoLoi[]="- Tên khách hàng trống!";
			}
			if($MaNoiDung==""){
				$LoiDL = FALSE;
				$ThongBaoLoi[]="- Mã nội dung trống!";
			}else{
				$OBJMaND->set_MaND($MaNoiDung);
				$MaND_TonTai = $OBJMaND->checkKeyTonTai();
				if($MaND_TonTai==FALSE){
					$LoiDL = FALSE;
					$ThongBaoLoi[]="- Mã nội dung ".$MaNoiDung." không tồn tại!";
				}
			}
			if($NoiDung==""){
				$LoiDL = FALSE;
				$ThongBaoLoi[]="- Tên nội dung trống!";
			}
			if($MaVT==""){
				$LoiDL = FALSE;
				$ThongBaoLoi[]="- Mã vật tư trống!";
			}
			if($TenVT==""){
				$LoiDL = FALSE;
				$ThongBaoLoi[]="- Tên vật tư trống!";
			}
			if($vatPercentage==""){
				$LoiDL = FALSE;
				$ThongBaoLoi[]="- Thuế suất trống!";
			}
			if($TKKho==""){
				$LoiDL = FALSE;
				$ThongBaoLoi[]="- Tài khoản doanh thu trống!";
				}else{
					$OBJHTTK->set_MaTK($TKKho);
					$TKKho_TonTai = $OBJHTTK->checkKeyTonTai();
					if($TKKho_TonTai==FALSE){
						$LoiDL = FALSE;
						$ThongBaoLoi[]="- TK ".$TKKho_TonTai." không tồn tại!";
					}
			}
			if($TKDoanhThu==""){
				$LoiDL = FALSE;
				$ThongBaoLoi[]="- Tài khoản kho trống!";
				}else{
					$OBJHTTK->set_MaTK($TKDoanhThu);
					$TKDoanhThu_TonTai = $OBJHTTK->checkKeyTonTai();
					if($TKDoanhThu_TonTai==FALSE){
						$LoiDL = FALSE;
						$ThongBaoLoi[]="- TK ".$TKDoanhThu_TonTai." không tồn tại!";
					}
			}
			//-- End Kiểm tra dữ liệu
			
			echo "<tr>"; 			
			if($SoPhieu_HienTai!=$SoPhieu){
					$InSoPhieu = $SoPhieu;// In STT phiếu thu
					$SoPhieu_HienTai = $SoPhieu;
					$sott++;
				}else{
                    $InSoPhieu ="............";
                }
            if ($OBJ->re_query($sql_psvt) == TRUE && $LoiDL==TRUE) {
				$ThemPhieu++;
				echo "<td align='center'>".$sott."</td>";
				echo "<td style='color:blue;background-color:Yellow'>".$InSoPhieu."</td>";
				echo "<td>".$MaPSKT."</td>";
				echo "<td>".$NgayHoaDon."</td>";
				echo "<td>".$MaNoiDung."</td>";
				echo "<td>".$NoiDung."</td>";
				echo "<td style='color:blue;background-color:Yellow'>Thành Công</td>";
            } else {
				if($LoiDL == FALSE){
					echo "<td align='center'>".$sott."</td>";
					echo "<td>".$InSoPhieu."</td>";
					echo "<td>".$MaPSKT."</td>";
					echo "<td>".$NgayHoaDon."</td>";
					echo "<td>".$MaNoiDung."</td>";
					echo "<td>".$NoiDung."</td>";
					echo "<td style='color:red;'>";
					foreach($ThongBaoLoi as $iTem_ThongBaoLoi){
						echo $iTem_ThongBaoLoi."<br/>";
					}
					echo "</td>";
				}else{
					echo "<td align='center'>".$sott."</td>";
					echo "<td>".$InSoPhieu."</td>";
					echo "<td>".$MaPSKT."</td>";
					echo "<td>".$NgayHoaDon."</td>";
					echo "<td>".$MaNoiDung."</td>";
					echo "<td>".$NoiDung."</td>";
					echo "<td style='color:red;'>".$OBJ->re_error($sql_psvt)."</td>";
				}
            }
			$sql_chitiet_psvt = "insert into chitiet_psvt (mavt,tenvt,dvt,soluongnhap,donggianhap,thanhtienchuack,thanhtien,tienchietkhau,thuesuat,thue,sophieu) VALUES('" . khu_dau_vn($MaVT) . "','" . $TenVT . "','" . $DVTinh . "','" . $SoLuong . "','" . $DonGia . "','" . $IienHang . "','" . $IienHangSauCK . "','" . $TienChietKhau . "','" . $ThueSuat . "','" . $TienThue . "','" . $SoPhieu . "')"; 
            if ($OBJ->re_query($sql_chitiet_psvt) == TRUE && $LoiDL==TRUE) {
                echo "<td>".$MaVT."</td>";
				echo "<td>".$TenVT."</td>";
				echo "<td style='color:blue;'>Thành công</td>";
            } else {
				$LoiDL = FALSE;
                echo "<td>".$MaVT."</td>";
				echo "<td>".$TenVT."</td>";
				echo "<td style='color:white;background-color:red'>".$OBJ->re_error($sql_chitiet_psvt)."</td>";
            }
			echo "</tr>";
			if(!$LoiDL){
				$LoiDL_TatCa = FALSE;
			}
        }		
    }
	$soPhieuLoi = ($sott-$ThemPhieu);
	if($soPhieuLoi!=0){
		$LoiDL_TatCa = FALSE;
	}
	if(!$LoiDL_TatCa){
		$OBJ->re_query("ROLLBACK;");
	}else{
		$OBJ->re_query("COMMIT;");
	}
	?>
		<tr>
			<td colspan="10" align='center' style='color:blue;'><b>ĐÃ KIỂM TRA <?php echo $ThemPhieu; ?> PHIẾU THÀNH CÔNG.</b><b style='color:red;'> LỖI: <?php echo ($sott-$ThemPhieu); ?>&nbsp; PHIẾU .</b></td>
		</tr>
	<?php
		if(!$LoiDL_TatCa){
		?>
		<tr>
			<td colspan="10" align='center' style='color:red;'><b>THÊM DỮ LIỆU THẤT BẠI.VUI LÒNG ĐIỀU CHỈNH EXCEL THEO THÔNG BÁO LỖI TRƯỚC KHI THÊM</b></td>
		</tr>
	<?php
		}else{
	?>
			<td colspan="10" align='center' style='color:blue;'><b>ĐÃ THÊM DỮ LIỆU THÀNH CÔNG. VUI LÒNG <a href='../../update_dungtk_nxton.php?loaichungtu=0'>ĐỊNH KHOẢN</a> LẠI DỮ LIỆU.</b></td>
	<?php
		}
	?>
	</table>
	<?php
}
 echo "<input type='hidden' id='TTHoaDon' value='".$TTHoaDon."'><input type='hidden' id='TTHoaDon_MaHoa' value='".base64_encode($TTHoaDon)."'>Tải dữ liệu thành công .<br/> Nhấn phím <strong style=\"color:blue;\">[Y]</strong> để thoát ... ";
 unset($_SESSION['DataExcel']);
 unset($_SESSION['DataPhucHoi']);
?>