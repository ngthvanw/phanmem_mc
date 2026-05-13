<?php
include("../../config.php");
$thangtk = ngaycuoithang(($_GET['thangtk']), $_SESSION['NienDo']);
$sole = $_GET['sole'];
$congdontuthang = $_GET['congdontuthang'];
$congdondenthang = $_GET['congdondenthang'];
$congdon = $_GET['congdon'];
$tutaobuttoanphatsinh = $_GET['tutaobuttoanphatsinh'];

$OBJCT = new ps_chitiet_mavattu();
$OBJPSKT = new pskt();

$OBJCT->setThangNamTK($_SESSION['NienDo']."-".($_GET['thangtk'])."-01");
$OBJCT->setThangTonKho($thangtk);
$OBJCT->setThang($_GET['thangtk']);

if($_GET['thangtk']==1){
	//// cập nhật giá nhập kho sản xuất----------------------------------
	$data = $OBJCT->laydanhsachphieunhapkhosanxuat_();
foreach ($data as $sophieu => $iTem) {
    foreach ($iTem as $iTemMaVT) {
        $dongiaSP = $OBJCT->getdongiagiathanhtieuchuan();
		$dongia = $dongiaSP[$iTemMaVT['mavt']];
        $soluong = $iTemMaVT['soluongnhap'];
        $thanhtien = round($soluong * $dongia);
        if (array_key_exists($iTemMaVT['matk'], $dinhkhoan[$sophieu])) {
            $dinhkhoan[$sophieu][$iTemMaVT['matk']] += $thanhtien;
        } else {
            $dinhkhoan[$sophieu][$iTemMaVT['matk']] = $thanhtien;
        }
        $OBJCT->re_query("update chitiet_psvt set donggianhap='" . $dongia . "',thanhtienchuack='" . $thanhtien . "',thanhtien='" . $thanhtien . "' where sott='" . $iTemMaVT['sott'] . "'");
    }
}
foreach ($dinhkhoan as $ksophieu => $itemDK) {
    foreach ($itemDK as $kmatk => $iTemSoTien) {
        $OBJCT->re_query("update dinhkhoan_psvt set sotien='" . round($iTemSoTien) . "' where sophieu='" . $ksophieu . "' and tkno='" . $kmatk . "'");
    }
}

	//////----------------------------------------------------------------
    $data = $OBJCT->themTonKhoThangTuTK($thangtk);
}else{
    $data = $OBJCT->themTonKhoThang($thangtk);
}
//$OBJCT->themdanhsach_mabp_cuahanghoa($_GET['thangtk']);// lấy tất cả

//$data1 = $OBJCT->loadddanhsach_mabp_cuahanghoa($thangtk);
//debug($data);
//$sophieu = $OBJPSKT->createSoPhieu();
foreach ($data as $item){
    /*$sophieu++;
    $sql_emp_pskt = "delete from pskt where loaiphieu='65' and MONTH(ngayghiso)='".$_GET['thangtk']."'";
    $OBJCT->re_query($sql_emp_pskt);

    $sql_emp_chitiet_pskt = "delete from chitiet_pskt where loaiphieu='65' and MONTH(ngayhoadon)='".$_GET['thangtk']."' ";
    $OBJCT->re_query($sql_emp_chitiet_pskt);

    $value_pskt.= "('".$sophieu."','".$item['mapskt']."','".$item['ngayghiso']."','".$item['tkno']."','". $item['loaiphieu']."','".abs($item['tongtien'])."'),";
    $value_chitiet_pskt.= "('".$item['mapskt']."','".$item['ngayghiso']."','".abs($item['tongtien'])."','".$item['mabp']."','". $item['bophan']."','".$item['mand']."','".$item['noidung']."','".$item['tkco']."','".abs($item['tongtien'])."','".$item['loaict']."','".$item['loaiphieu']."','".$sophieu."'),";
    $sql_pskt = "insert into pskt(sophieu,mapskt,ngayghiso,tkco,loaiphieu,tongcong) VALUE ".substr($value_pskt,0,-1);
    $sql_chitiet_pskt = "insert into chitiet_pskt(mapskt,ngayhoadon,gtvnd1,mabp,bophan,mand1,noidung1,tkno1,tongtien,maloai,loaiphieu,sophieu) VALUE ".substr($value_chitiet_pskt,0,-1);

    if($tutaobuttoanphatsinh=="true"){
        $OBJCT->re_query($sql_pskt);
        $OBJCT->re_query($sql_chitiet_pskt);
    }*/
    $thongbao = $item['thongbaoam'];
}
echo $thongbao;



 