<?php
include("../../config.php");

$OBJCT = new dmsanpham();
$OBJPSKT = new pskt();
$mact = substr($_GET['mact'], 0, -1);
$mact_arr = explode(",", $mact);
$tungay = $_GET['tungay'];
$denngay = $_GET['denngay'];

$nam = $_SESSION['NienDo'];

$LocTheoLoai = $_GET["LocTheoLoai"];

$data = $OBJCT->loaddanhsachbangdutruvadanhsachnhapvlct("CT",$tungay,$denngay,$LocTheoLoai);

$tongtienchenhlech = 0;
foreach ($data as $itemCTCT) {
    foreach ($itemCTCT as $itemCT) {
        $thanhtiendutru = $itemCT['thanhtien'];

        $dongia = round($thanhtiendutru/$itemCT['soluong'],3);

        $thanhtienthucxuat = $itemCT['thanhtienxuat'];

        $tienchienlech = $thanhtienthucxuat - $thanhtiendutru;
        $phantram = ($itemCT['soluongthucxuat'] / $itemCT['soluong']);
        $tongtienchenhlech += $tienchienlech;
        if ($tienchienlech <= 0) {
            $tklp = "Tiết kiệm";
        } else {
            $tklp = "Lãng phí";
        }
        if ($itemCT['soluong'] == 0 && $itemCT['soluongthucxuat'] == 0) {

        } else {
            $values .= "('".$itemCT['masp']."','" . $itemCT['mavt'] . "','" . $itemCT['tenvt'] . "','" . $itemCT['dvt'] . "','" . $dongia. "','" . $itemCT['soluong'] . "','" . $itemCT['soluongthucxuat'] . "','" . $phantram . "','" . $tienchienlech . "','" . $tklp . "','" . $thang . "','".$thanhtienthucxuat."','".$thanhtiendutru."'),";
        }
    }
}


//// Tạo bảng tiết kiệm lảng phí vật liệu sản xuất
$OBJCT->re_query("CREATE TABLE `bangtk_lp_vlct` ( `sott` INT NOT NULL AUTO_INCREMENT ,`mact` CHAR(14) NOT NULL, `mavt` CHAR(14) NOT NULL , `tenvt` VARCHAR(500) NOT NULL , `dvt` VARCHAR(100) NOT NULL , `dongia` DOUBLE NOT NULL , `soluongdutru` DOUBLE NOT NULL , `soluongthucnhap` DOUBLE NOT NULL , `tylephantram` DOUBLE NOT NULL , `sotienchenhlech` BIGINT NOT NULL , `tk_lp` VARCHAR(100) NOT NULL,`thang` INT NOT NULL , PRIMARY KEY (`sott`)) ENGINE = InnoDB;");
$OBJCT->re_query("ALTER TABLE `bangtk_lp_vlct` ADD `thanhtienthucnhap` BIGINT NOT NULL , ADD `thanhtiendutoan` BIGINT NOT NULL AFTER `thanhtienthucnhap`;");


$sql = "insert into bangtk_lp_vlct(mact,mavt,tenvt,dvt,dongia,soluongdutru,soluongthucnhap,tylephantram,sotienchenhlech,tk_lp,thang,thanhtienthucnhap,thanhtiendutoan) VALUES" . substr($values, 0, -1);
$OBJCT->re_query("delete from bangtk_lp_vlct");
$OBJCT->re_query($sql);


