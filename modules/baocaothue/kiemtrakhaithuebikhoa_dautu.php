<?php
include("../../config.php");
$OBJCT = new baocaothue();
$thangtinhthue = $_GET['thangtinhthue'];
$namtinhthue = $_GET['namtinhthue'];
$OBJCT->setThangQuy($thangtinhthue."-".$namtinhthue);
$OBJCT->re_query("UPDATE nhatkykiemphieu SET tuso = CONCAT(tuso,'-".$_SESSION['NienDo']."') WHERE locate('-',tuso)<1 and loaiphieu in('13','15')");
$tontai = $OBJCT->checkDuLieuToKhaiKhao_DauTu();
if($tontai==FALSE || $_SESSION['User']=='Administrator'){
    echo 0;
}else{
    echo 1;
}


