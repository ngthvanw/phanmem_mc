<?php
include("../../config.php");
$OBJ = new phieukiemtra();
$TuPhieu = $_GET['tuphieu'];
$DenPhieu = $_GET['denphieu'];
$LoaiPhieu = $_GET['loaiphieu'];
$gt1= $_GET['gt1'];
$gt2 = $_GET['gt2'];
$matk = $_GET['matk'];
$machinhanh = $_GET['machinhanh'];
$ngaycuoi = $_GET['ngaycuoi'];
$SoLan = $OBJ->createSoLan($LoaiPhieu);
if($_SESSION['Level']==2){
    $truongnhomduyet = 1;
}
if($_SESSION['Level']==1){
    $truongnhomduyet = 0;
    $giamdocduyet = 1;
    $nguoiduyet = $_SESSION['User'];
    $ngayduyetduyet = date('Y-m-d H:i:s');
}

$thoigiannhap = time();
$ngaynhap = date("Y-m-d", $thoigiannhap);
$gionhap = date("H:i:s", $thoigiannhap);
$NguoiNhap = $_SESSION['User'];
$OBJ->re_query("ALTER TABLE `nhatkykiemphieu` ADD `machinhanh` CHAR(14) NOT NULL;");
$OBJ->themPhieuNhatKy($SoLan, $TuPhieu, $DenPhieu, $ngaynhap, $gionhap, $LoaiPhieu, $NguoiNhap,$gt1,$gt2,$matk,$ngaycuoi,$truongnhomduyet,$giamdocduyet,$nguoiduyet,$ngayduyetduyet,$ghichu,$machinhanh);
echo "{\"recId\": \"" . $SoLan . "\"}";
?>