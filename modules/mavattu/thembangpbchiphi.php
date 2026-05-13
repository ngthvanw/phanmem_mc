<?php
include("../../config.php");

$thangtk = ngaycuoithang(($_GET['thangtk']), $_SESSION['NienDo']);

$tuthang = $_GET['tuthang'];
$denthang = $_GET['denthang'];
$tonghopcanam = $_GET['tonghopcanam'];
$phanbotheo = $_GET['phanbotheo'];
$khongtaobuttoandinhkhoan = $_GET['khongtaobuttoandinhkhoan'];
$xoaphanbocp = $_GET['xoakhauhaodatrichtrongky'];
$OBJPSKT = new pskt();
$sophieu = $OBJPSKT->createSoPhieu();
$NgayCuoiThang = ngaycuoithang($tuthang,$_SESSION['NienDo']);
$OBJCT = new mavattu();

if($tonghopcanam=="false"){
    $data = $OBJCT->ThemBangPhanBoChiPhi($tuthang, $denthang,$sophieu,$NgayCuoiThang,$khongtaobuttoandinhkhoan,$xoaphanbocp,$phanbotheo);
}