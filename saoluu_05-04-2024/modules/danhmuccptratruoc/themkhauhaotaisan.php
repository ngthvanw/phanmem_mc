<?php
include("../../config.php");
unset($_SESSION['DSKHAUHAOTAISAN']);
$thangtk = ngaycuoithang(($_GET['thangtk']), $_SESSION['NienDo']);
$sole = $_GET['sole'];
$tuthang = $_GET['tuthang'];
$denthang = $_GET['denthang'];
$tonghopcanam = $_GET['tonghopcanam'];
$khauhaotheo= $_GET['khauhaotheo'];
$xoakhauhaodatrichtrongky = $_GET['xoakhauhaodatrichtrongky'];
$khongtaobuttoandinhkhoan = $_GET['khongtaobuttoandinhkhoan'];
$OBJPSKT = new pskt();
$sophieu = $OBJPSKT->createSoPhieu();
$NgayCuoiThang = ngaycuoithang($tuthang,$_SESSION['NienDo']);
$OBJCT = new danhmuccptratruoc();

if($tonghopcanam=="false"){
    $data = $OBJCT->thembangkhauhaotstheothang($tuthang, $denthang,$sophieu,$NgayCuoiThang,$xoakhauhaodatrichtrongky,$khongtaobuttoandinhkhoan,$khauhaotheo);
}else{
}


 