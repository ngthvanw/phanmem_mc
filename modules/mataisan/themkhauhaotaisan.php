<?php
include("../../config.php");
unset($_SESSION['DSKHAUHAOTAISAN']);
$thangtk = ngaycuoithang(($_GET['thangtk']), $_SESSION['NienDo']);
$sole = $_GET['sole'];
$tuthang = $_GET['tuthang'];
$denthang = $_GET['denthang'];
$tonghopcanam = $_GET['tonghopcanam'];
$khauhaotheo= $_GET['khauhaotheo'];
$khauhaotaisanhetkhauhao= $_GET['khauhaotaisanhetkhauhao'];
$xoakhauhaodatrichtrongky = $_GET['xoakhauhaodatrichtrongky'];
$khongtaobuttoandinhkhoan = $_GET['khongtaobuttoandinhkhoan'];
$OBJPSKT = new pskt();
$sophieu = $OBJPSKT->createSoPhieu();
$OBJCT = new mataisan();
$NgayCuoiThang = ngaycuoithang($tuthang,$_SESSION['NienDo']);
$OBJCT->re_query("CREATE TABLE `sanluong_khauhao_taisan` ( `sott` BIGINT NOT NULL AUTO_INCREMENT , `mats` VARCHAR(20) NOT NULL,`matscha` VARCHAR(20) NOT NULL , `tents` VARCHAR(1000) NOT NULL , `thang1` BIGINT NOT NULL DEFAULT '0' , `thang2` BIGINT NOT NULL DEFAULT '0' , `thang3` BIGINT NOT NULL DEFAULT '0' , `thang4` BIGINT NOT NULL DEFAULT '0' , `thang5` BIGINT NOT NULL DEFAULT '0' , `thang6` BIGINT NOT NULL DEFAULT '0' , `thang7` BIGINT NOT NULL DEFAULT '0' , `thang8` BIGINT NOT NULL DEFAULT '0' , `thang9` BIGINT NOT NULL DEFAULT '0' , `thang10` BIGINT NOT NULL DEFAULT '0' , `thang11` BIGINT NOT NULL DEFAULT '0' , `thang12` BIGINT NOT NULL DEFAULT '0' , `tongcong` BIGINT NOT NULL,`tenkd` VARCHAR(1000) NOT NULL , PRIMARY KEY (`sott`)) ENGINE = InnoDB;");
$OBJCT->re_query("ALTER TABLE `sanluong_khauhao_taisan` ADD UNIQUE(`mats`);");
$OBJCT->re_query("INSERT INTO sanluong_khauhao_taisan(mats,tents,matscha,tenkd) SELECT mats,tents,matscha,tenkd FROM mats");
$OBJCT->re_query("UPDATE `sanluong_khauhao_taisan` set tongcong = thang1+thang2+thang3+thang4+thang5+thang6+thang7+thang8+thang9+thang10+thang11+thang12");
$OBJCT->re_query("UPDATE mats a INNER JOIN sanluong_khauhao_taisan b ON a.mats = b.mats SET b.tents = a.tents,b.tenkd = a.tenkd");
if($tonghopcanam=="false"){
    $data = $OBJCT->thembangkhauhaotstheothang($tuthang, $denthang,$sophieu,$NgayCuoiThang,$xoakhauhaodatrichtrongky,$khongtaobuttoandinhkhoan,$khauhaotheo,$khauhaotaisanhetkhauhao);
}else{
    //$data = $OBJCT->thembangkhauhaotstheothang(1, 12,$sophieu,$NgayCuoiThang,$xoakhauhaodatrichtrongky,$khongtaobuttoandinhkhoan);
}