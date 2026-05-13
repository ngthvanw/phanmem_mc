<?php
include("../../config.php");
$OBJCT = new ps_chitiet_mavattu();
$OBJCT->setThangTonKho($_GET['thangtk']);
$checkTKDK = $OBJCT->kiemTraTonKhothang();
if($checkTKDK==FALSE){
    echo "0";
}else{
    echo "1";
}

