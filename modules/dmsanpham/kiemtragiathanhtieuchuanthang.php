<?php
include("../../config.php");
$OBJCT = new dmsanpham();
$thang = $_GET['thang'];
$checkTKDK = $OBJCT->kiemTraGiaThanhTieuChua($thang);
if($checkTKDK==FALSE){
    echo "0";
}else{
    echo "1";
}

