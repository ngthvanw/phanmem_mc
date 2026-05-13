<?php
include("../../config.php");
$OBJCT = new baocaothue();
$namtinhthue = $_GET['namtinhthue'];
$OBJCT->setThangQuy($thangtinhthue."-".$namtinhthue);
$tontai = $OBJCT->checkDuLieuToKhaiKhai_KhauTru_TNCN();
if($tontai==FALSE || $_SESSION['User']=='Administrator'){
    echo 0;
}else{
    echo 1;
}


