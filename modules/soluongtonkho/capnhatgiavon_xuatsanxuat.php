<?php
include("../../config.php");
$OBJCT = new ps_chitiet_mavattu();
$OBJPSKT = new pskt();

$PhuongPhapTinhGiaVon = $_GET['PhuongPhapTinhGiaVon'];
if ($PhuongPhapTinhGiaVon == 2) {
    $dataPXK = $OBJCT->laydanhsachphieuxuatkho_lienhoan();/// Load phiếu xuất kho
    $dataGiaVonLienHoan = $OBJCT->gettonggiavonxuatkho_lienhoan();/// Load phiếu xuất kho
    //debug($dataGiaVonLienHoan);
    $sql_emp_pskt = "delete from pskt where loaiphieu='65'";
    $OBJCT->re_query($sql_emp_pskt);

    $sql_emp_chitiet_pskt = "delete from chitiet_pskt where loaiphieu='65' ";
    $OBJCT->re_query($sql_emp_chitiet_pskt);
    $sophieu = $OBJPSKT->createSoPhieu();
    foreach ($dataPXK as $itemPXK) {
        foreach ($dataGiaVonLienHoan[$itemPXK['sophieu']] as $itemPhieuXuat) {
            if ($itemPXK['loaiphieu'] == 2) {
                $sophieu++;
                $value_pskt .= "('" . $sophieu . "','" . $itemPXK['mapskt'] . "','" . $itemPXK['ngayghiso'] . "','632','65','" . ($itemPhieuXuat['thanhtien']) . "'),";
                $value_chitiet_pskt .= "('" . $itemPXK['mapskt'] . "','" . $itemPXK['ngayghiso'] . "','" . ($itemPhieuXuat['thanhtien']) . "','0001','Toàn Bộ','100099','Giá vốn bán hàng Phiếu số  {$itemPXK['mapskt']}','{$itemPhieuXuat['matk']}','" . ($itemPhieuXuat['thanhtien']) . "','4','65','" . $sophieu . "'),";
            } else if ($itemPXK['loaiphieu'] == 3) {
                //echo "update chitiet_psvt INNER JOIN tkthang on chitiet_psvt.sophieu=tkthang.sophieu_nxk set chitiet_psvt.donggianhap=tkthang.dongia,chitiet_psvt.thanhtienchuack=tkthang.thanhtienxuat,chitiet_psvt.thanhtien=tkthang.thanhtienxuat where sophieu='" . $itemPhieuXuat['sophieu_nxk'] . "' and chitiet_psvt.mavt=tkthang.mavt ";
                $OBJCT->re_query("update chitiet_psvt INNER JOIN tkthang on chitiet_psvt.sophieu=tkthang.sophieu_nxk set chitiet_psvt.donggianhap=tkthang.dongia,chitiet_psvt.thanhtienchuack=tkthang.thanhtienxuat,chitiet_psvt.thanhtien=tkthang.thanhtienxuat,chitiet_psvt.thue=0 where sophieu='" . $itemPhieuXuat['sophieu_nxk'] . "' and chitiet_psvt.mavt=tkthang.mavt ");
                //$OBJCT->re_query("update chitiet_psvt set donggianhap='" . $itemPhieuXuat['dongiabinhquan'] . "',thanhtienchuack='" . $itemPhieuXuat['thanhtienxuat'] . "',thanhtien='" . $itemPhieuXuat['thanhtienxuat'] . "' where sophieu='" . $itemPhieuXuat['sophieu'] . "' and mavt='" . $itemPhieuXuat['mavt'] . "' and soluong='".$itemPhieuXuat['soluongxuat']."'");
            }
        }
    }
    $sql_pskt = "insert into pskt(sophieu,mapskt,ngayghiso,tkco,loaiphieu,tongcong) VALUE " . substr($value_pskt, 0, -1);
    $sql_chitiet_pskt = "insert into chitiet_pskt(mapskt,ngayhoadon,gtvnd1,mabp,bophan,mand1,noidung1,tkno1,tongtien,maloai,loaiphieu,sophieu) VALUE " . substr($value_chitiet_pskt, 0, -1);

    $OBJCT->re_query($sql_pskt);
    $OBJCT->re_query($sql_chitiet_pskt);

} else {// Bình quân gia quyền
    $data = $OBJCT->laydanhsachphieunhapkhosanxuat();
    foreach ($data as $sophieu => $iTem) {
        foreach ($iTem as $iTemMaVT) {
            $dongia = $OBJCT->getdongiamavttonkho($iTemMaVT['mavt'], $iTemMaVT['thang'], $iTemMaVT['khohang']);
            $soluong = $iTemMaVT['soluongnhap'];
            $thanhtien = round($soluong * $dongia);
			if($iTemMaVT['mand']=='_XKHH'){
				//$dongia = 0;
				$thanhtien = 0;
			}
            if (array_key_exists($iTemMaVT['matk'], $dinhkhoan[$sophieu])) {
                $dinhkhoan[$sophieu][$iTemMaVT['matk']] += $thanhtien;
            } else {
                $dinhkhoan[$sophieu][$iTemMaVT['matk']] = $thanhtien;
            }
            $OBJCT->re_query("update chitiet_psvt set donggianhap='" . $dongia . "',thanhtienchuack='" . $thanhtien . "',thanhtien='" . $thanhtien . "',thue=0 where sott='" . $iTemMaVT['sott'] . "'");
        }
    }

    foreach ($dinhkhoan as $ksophieu => $itemDK) {
        foreach ($itemDK as $kmatk => $iTemSoTien) {
            $OBJCT->re_query("update dinhkhoan_psvt set sotien='" . round($iTemSoTien) . "' where sophieu='" . $ksophieu . "' and tkco='" . $kmatk . "'");
            $OBJCT->re_query("update dinhkhoan_psvt set sotien='0' where sophieu='" . $ksophieu . "' and tkco='33311'");
        }
    }
// Kết thúc cập nhật phiếu xuất kho sản xuất
// Cập nhật phiếu xuất kho giá vốn bán hàng
    $dataPXK = $OBJCT->laydanhsachphieunhapkho();/// Load phiếu xuất kho
    $dataCTPXK = $OBJCT->laydanhsachchitietphieunhapkho();/// Load phiếu xuất kho

    foreach ($dataPXK as $sophieuPXK => $iTemPSX) {
        foreach ($dataCTPXK[$sophieuPXK] as $iTemCTPSX) {
            $dongia = $OBJCT->getdongiamavttonkho($iTemCTPSX['mavt'], $iTemCTPSX['thang'], $iTemCTPSX['khohang']);
            $soluong = $iTemCTPSX['soluongnhap'];
            $thanhtien = round($soluong * $dongia);

            $dataNgayGhiSo[$sophieuPXK] = $iTemCTPSX['ngayghiso'];
            if (array_key_exists($iTemCTPSX['matk'], $dinhkhoan1[$iTemPSX])) {
                $dinhkhoan1[$iTemPSX][$iTemCTPSX['matk']] += $thanhtien;
            } else {
                $dinhkhoan1[$iTemPSX][$iTemCTPSX['matk']] = $thanhtien;
            }
        }
    }
    $sql_emp_pskt = "delete from pskt where loaiphieu='65'";
    $OBJCT->re_query($sql_emp_pskt);

    $sql_emp_chitiet_pskt = "delete from chitiet_pskt where loaiphieu='65' ";
    $OBJCT->re_query($sql_emp_chitiet_pskt);

    $sophieu = $OBJPSKT->createSoPhieu();

    foreach ($dinhkhoan1 as $kmapskt => $itemDinhKhoang) {
        foreach ($itemDinhKhoang as $kmatkmavt => $itemSoTien) {
            $sophieu++;

            $ngayghiso = $dataNgayGhiSo[$kmapskt];

            $value_pskt .= "('" . $sophieu . "','" . $kmapskt . "','" . $ngayghiso . "','632','65','" . ($itemSoTien) . "'),";
            $value_chitiet_pskt .= "('" . $kmapskt . "','" . $ngayghiso . "','" . ($itemSoTien) . "','0001','Toàn Bộ','100099','Giá vốn bán hàng Phiếu số  {$kmapskt}','{$kmatkmavt}','" . ($itemSoTien) . "','4','65','" . $sophieu . "'),";
        }
    }
    $sql_pskt = "insert into pskt(sophieu,mapskt,ngayghiso,tkco,loaiphieu,tongcong) VALUE " . substr($value_pskt, 0, -1);
    $sql_chitiet_pskt = "insert into chitiet_pskt(mapskt,ngayhoadon,gtvnd1,mabp,bophan,mand1,noidung1,tkno1,tongtien,maloai,loaiphieu,sophieu) VALUE " . substr($value_chitiet_pskt, 0, -1);

    $OBJCT->re_query($sql_pskt);
    $OBJCT->re_query($sql_chitiet_pskt);

//////////////////////////////////Cập nhật điều chỉnh giá
    $tongtm = 0;
    $value_pskt = "";
    $value_chitiet_pskt = "";
    for ($i = 1; $i <= 12; $i++) {
        $datatkthang = $OBJCT->sumthangtientkcktungthang($i);// Tổng tiền giá vốn của tháng đó
        //debug($datatkthang);
        $datagiavonpskt = $OBJCT->sumthangtienpsgiavon($i);// Tổng tiền giá vốn của tháng xuất
        // debug($datatkthang);
        foreach ($datatkthang as $k => $itemtkthang) {
            $tmptinh = 0;
            //echo $datatkthang[$k]['tongtientkck']." - ".$datagiavonpskt[$k]['tongtiengiavon']."<br/>";
            $tmptinh = $datatkthang[$k]['tongtientkck'] - $datagiavonpskt[$k]['tongtiengiavon'];
            $tongtm += $tmptinh;
            if ($tmptinh != 0 && $tmptinh < 100000 && $tmptinh > (-100000)) {// Nếu tổng tiền tồn kho cuối kỳ bị lệch so với tồn kho từng tháng
                //$sophieu++;
                //$ngayghiso = ngaycuoithang($i,$_SESSION['NienDo']);

                //$value_pskt1 .= "('" . $sophieu . "','1','" . $ngayghiso . "','632','65','" . ($tmptinh) . "'),";
                //$value_chitiet_pskt1 .= "('1','" . $ngayghiso . "','" . ($tmptinh) . "','0001','Toàn Bộ','100099','Điều chỉnh giá vốn tháng {$i}','{$k}','" . ($tmptinh) . "','4','65','" . $sophieu . "'),";

                $sql_update = "update chitiet_pskt set gtvnd1=(gtvnd1+{$tmptinh}),tongtien = (tongtien+{$tmptinh}) WHERE  sophieu = 
                                                                                                    ( select * from(
                                                                                                        SELECT sophieu 
                                                                                                        FROM chitiet_pskt
                                                                                                        WHERE loaiphieu='65' and tkno1='{$k}' and MONTH(ngayhoadon)={$i}
                                                                                                        ORDER  BY gtvnd1 DESC
                                                                                                         LIMIT 1
                                                                                                    )  t )";
                $OBJCT->re_query($sql_update);
                $rows_update = $OBJCT->re_affected_rows();
                if ($rows_update == 0) {
                    $sqlsophieu = "select chitiet_psvt.sophieu from psvt INNER JOIN chitiet_psvt on(psvt.sophieu = chitiet_psvt.sophieu) INNER join dinhkhoan_psvt on(psvt.sophieu =dinhkhoan_psvt.sophieu) WHERE psvt.loaiphieu='3' and dinhkhoan_psvt.tkco='{$k}' and month(ngayghiso)={$i} ORDER by sotien LIMIT 1";
                    $ressophieu = $OBJCT->re_query($sqlsophieu);
                    $datasophieu = $OBJCT->re_fetch($ressophieu);
                    $OBJCT->re_query("update chitiet_psvt set thanhtienchuack=(thanhtienchuack+{$tmptinh}),thanhtien=(thanhtien+{$tmptinh}) where sophieu='" . $datasophieu['sophieu'] . "' order by soluongnhap LIMIT 1");
                    $OBJCT->re_query("update dinhkhoan_psvt set sotien=(sotien+{$tmptinh}) where sophieu='" . $datasophieu['sophieu'] . "' and tkco='" . $k . "' LIMIT 1");
                }
            }
        }
    }
    $OBJCT->re_query($sql_pskt1);
    $OBJCT->re_query($sql_chitiet_pskt1);
}
$OBJ = new ps_chitiet_mavattu();
$OBJDMSP = new dmsanpham();
$OBJKHO = new makho();
$data_KHO = $OBJKHO->loadListMaKho_CoKeyLaMa();
$result = $OBJ->ThemSLTKMaVTHT($data_KHO);
$resultsp = $OBJDMSP->ThemSLDMSPHienTai();
$resultnvlct = $OBJDMSP->ThemSLDMNVLHienTai();

