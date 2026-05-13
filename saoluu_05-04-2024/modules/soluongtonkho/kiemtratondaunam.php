<?php
include("../../config.php");
$OBJCT = new ps_chitiet_mavattu();
$checkTKDK = $OBJCT->kiemTraTonKhoDauKy();
if($checkTKDK==FALSE){
    echo "0";
}else{
    echo "1";
}

