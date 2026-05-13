<?php
include("../../config.php");
$OBJCT = new baocaothue();
$thangtinhthue = $_GET['thangtinhthue'];
$namtinhthue = $_GET['namtinhthue'];
$machinhanh = $_GET['machinhanh'];
$OBJCT->setThangQuy($thangtinhthue."-".$namtinhthue);
$tontai = $OBJCT->checkTonTaiDuLieu($machinhanh);
if($tontai==FALSE){
    echo 0;
}else{
    echo 1;
}