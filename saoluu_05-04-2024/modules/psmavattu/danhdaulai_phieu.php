<?php
include("../../config.php");
$OBJ = new psmavattu();
$phieunhap = $_GET['phieunhap'];
$phieuchi = $_GET['phieuthu'];
$phieughico = $_GET['phieughico'];
$phieunganhang = $_GET['phieunganhang'];

$phieuxuat = $_GET['phieuxuat'];
$phieuxuatsx = $_GET['phieuxuatsx'];
$phieuthu = $_GET['phieuchi'];
$phieughino = $_GET['phieughino'];
$phieunganhangthu = $_GET['phieunganhangthu'];

$tuthang = $_GET['tuthang'];
$denthang = $_GET['denthang'];

$loaidanhdau = $_GET['loaidanhdau'];

if($phieunhap==1) {
    $sqlup_phieunhap = $OBJ->loadDanhsSachPSVT(1,$tuthang,$denthang,$loaidanhdau);
}
if($phieuchi==1){
    $sqlup_phieuchi = $OBJ->loadDanhsSachPSKT(2,$tuthang,$denthang,$loaidanhdau);
}

if($phieunganhang==1){
    for($i=6;$i<64;$i=$i+2){
        $sqlup_phieuchi = $OBJ->loadDanhsSachPSKT($i,$tuthang,$denthang,$loaidanhdau);
    }
}
if($phieughico==1){
    $sqlup_phieuchi = $OBJ->loadDanhsSachPSKT(4,$tuthang,$denthang,$loaidanhdau);
}

// Đầu vào
if($phieuxuat==1) {
    $sqlup_phieuxuat = $OBJ->loadDanhsSachPSVT(2,$tuthang,$denthang,$loaidanhdau);
    //mysqli_multi_query($mysqli,$sqlup_phieunhap);
}

if($phieuxuatsx==1) {
    $sqlup_phieuxuatsx = $OBJ->loadDanhsSachPSVT(3,$tuthang,$denthang,$loaidanhdau);
    //mysqli_multi_query($mysqli,$sqlup_phieunhap);
}

if($phieuthu==1){
    $sqlup_phieuthu = $OBJ->loadDanhsSachPSKT(1,$tuthang,$denthang,$loaidanhdau);
}

if($phieunganhangthu==1){
    for($i=5;$i<63;$i=$i+2){
        $sqlup_phieuchi = $OBJ->loadDanhsSachPSKT($i,$tuthang,$denthang,$loaidanhdau);
    }
}
if($phieughino==1){
    $sqlup_phieuchi = $OBJ->loadDanhsSachPSKT(3,$tuthang,$denthang,$loaidanhdau);
}
echo "Số thứ tự các phiếu đã được đánh dấu thành công ! ";


