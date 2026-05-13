<?php
include("../../config.php");
$OBJCT = new baocaothue();
$thangtinhthue = $_GET['thangtinhthue'];
$namtinhthue = $_GET['namtinhthue'];
$loaitokhai = $_GET['loaitokhai'];
$tontai = $OBJCT->checkTonTaiDuLieu($thangtinhthue,$namtinhthue,$loaitokhai);
if($tontai==FALSE){
    echo 0;
}else{
    echo 1;
}


