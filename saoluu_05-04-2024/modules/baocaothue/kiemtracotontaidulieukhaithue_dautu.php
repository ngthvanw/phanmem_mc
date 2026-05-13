<?php
include("../../config.php");
$OBJCT = new baocaothue();
$thangtinhthue = $_GET['thangtinhthue'];
$namtinhthue = $_GET['namtinhthue'];
$OBJCT->setThangQuy($thangtinhthue."-".$namtinhthue);
$tontai = $OBJCT->checkTonTaiDuLieu_DauTu();
if($tontai==FALSE){
    echo 0;
}else{
    echo 1;
}


