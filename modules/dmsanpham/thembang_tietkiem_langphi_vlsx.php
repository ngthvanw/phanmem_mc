<?php
include("../../config.php");

$OBJCT = new dmsanpham();
$OBJPSKT = new pskt();
$thang = $_GET['thangtklp'];
$nhomtheo = $_GET['nhomtheo'];

$nam = $_SESSION['NienDo'];

$data = $OBJCT->loaddanhsachbangdutruvadanhsachnhapvlsx($thang,"SP");
//debug($data);
$tongtienchenhlech = 0;
$values = "";
$values = "";
foreach ($data as $MaSP=>$item) {
    foreach ($item as $itemCT){
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
            $values .= "('" . $itemCT['mavt'] . "','" . $itemCT['tenvt'] . "','" . $itemCT['dvt'] . "','" . $itemCT['dongia'] . "','" . $itemCT['soluongdutru'] . "','" . $itemCT['soluongthucxuat'] . "','" . $phantram . "','" . $tienchienlech . "','" . $tklp . "','" . $thang . "','" . $MaSP . "'),";
        }
    }
}


//// Tạo bảng tiết kiệm lảng phí vật liệu sản xuất
$OBJCT->re_query("CREATE TABLE `bangtk_lp_vlsx` ( `sott` INT NOT NULL AUTO_INCREMENT , `mavt` CHAR(20) NOT NULL , `tenvt` VARCHAR(500) NOT NULL , `dvt` VARCHAR(100) NOT NULL , `dongia` DOUBLE NOT NULL , `soluongdutru` DOUBLE NOT NULL , `soluongthucnhap` DOUBLE NOT NULL , `tylephantram` DOUBLE NOT NULL , `sotienchenhlech` BIGINT NOT NULL , `tk_lp` VARCHAR(100) NOT NULL,`thang` INT NOT NULL, `masp` CHAR(20) NOT NULL , PRIMARY KEY (`sott`)) ENGINE = InnoDB;");
$OBJCT->re_query("ALTER TABLE `bangtk_lp_vlsx` ADD `masp` CHAR(20) NOT NULL");

$sql = "insert into bangtk_lp_vlsx(mavt,tenvt,dvt,dongia,soluongdutru,soluongthucnhap,tylephantram,sotienchenhlech,tk_lp,thang,masp) VALUES" . substr($values, 0, -1);
$OBJCT->re_query("delete from bangtk_lp_vlsx where thang='" . $thang . "'");
$OBJCT->re_query($sql);