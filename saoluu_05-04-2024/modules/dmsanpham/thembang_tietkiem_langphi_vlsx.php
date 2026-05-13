<?php
include("../../config.php");

$OBJCT = new dmsanpham();
$OBJPSKT = new pskt();
$thang = $_GET['thangtklp'];
$tutaobuttoan = $_GET['tudongtaobuttoan'];

$nam = $_SESSION['NienDo'];

$data = $OBJCT->loaddanhsachbangdutruvadanhsachnhapvlsx($thang,"SP");
//debug($data);
$tongtienchenhluch = 0;
foreach ($data as $itemCT) {
    $thanhtiendutru = $itemCT['dongia'] * $itemCT['soluongdutru'];
    $thanhtienthucxuat = $itemCT['dongia'] * $itemCT['soluongthucxuat'];
    $tienchienlech = $thanhtienthucxuat - $thanhtiendutru;
    $phantram = ($itemCT['soluongthucxuat'] / $itemCT['soluongdutru']);
    $tongtienchenhlech += $tienchienlech;
    if ($tienchienlech <= 0) {
        $tklp = "Tiết kiệm";
    } else {
        $tklp = "Lãng phí";
    }
    if ($itemCT['soluongdutru'] == 0 && $itemCT['soluongthucxuat'] == 0) {

    } else {
        $values .= "('" . $itemCT['mavt'] . "','" . $itemCT['tenvt'] . "','" . $itemCT['dvt'] . "','" . $itemCT['dongia'] . "','" . $itemCT['soluongdutru'] . "','" . $itemCT['soluongthucxuat'] . "','" . $phantram . "','" . $tienchienlech . "','" . $tklp . "','" . $thang . "'),";
    }
}


//// Tạo bảng tiết kiệm lảng phí vật liệu sản xuất
database::re_query("CREATE TABLE `bangtk_lp_vlsx` ( `sott` INT NOT NULL AUTO_INCREMENT , `mavt` CHAR(14) NOT NULL , `tenvt` VARCHAR(500) NOT NULL , `dvt` VARCHAR(100) NOT NULL , `dongia` DOUBLE NOT NULL , `soluongdutru` DOUBLE NOT NULL , `soluongthucnhap` DOUBLE NOT NULL , `tylephantram` DOUBLE NOT NULL , `sotienchenhlech` BIGINT NOT NULL , `tk_lp` VARCHAR(100) NOT NULL,`thang` INT NOT NULL , PRIMARY KEY (`sott`)) ENGINE = InnoDB;");


$sql = "insert into bangtk_lp_vlsx(mavt,tenvt,dvt,dongia,soluongdutru,soluongthucnhap,tylephantram,sotienchenhlech,tk_lp,thang) VALUES" . substr($values, 0, -1);
database::re_query("delete from bangtk_lp_vlsx where thang='" . $thang . "'");
database::re_query($sql);


