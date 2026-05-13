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
if($tonghopcanam=="false"){
    $data = $OBJCT->thembangkhauhaotstheothang($tuthang, $denthang,$sophieu,$NgayCuoiThang,$xoakhauhaodatrichtrongky,$khongtaobuttoandinhkhoan,$khauhaotheo,$khauhaotaisanhetkhauhao);
}else{
    //$data = $OBJCT->thembangkhauhaotstheothang(1, 12,$sophieu,$NgayCuoiThang,$xoakhauhaodatrichtrongky,$khongtaobuttoandinhkhoan);
}