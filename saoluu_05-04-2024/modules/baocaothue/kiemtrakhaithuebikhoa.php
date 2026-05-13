<?php
include("../../config.php");
$OBJCT = new baocaothue();
$thangtinhthue = $_GET['thangtinhthue'];
$namtinhthue = $_GET['namtinhthue'];
$machinhanh = $_GET['machinhanh'];
$OBJCT->setThangQuy($thangtinhthue."-".$namtinhthue);
$OBJCT->re_query("ALTER TABLE `nhatkykiemphieu` ADD `machinhanh` CHAR(14) NOT NULL;");
$OBJCT->re_query("update `nhatkykiemphieu` set machinhanh = '".$_SESSION['MST']."' where machinhanh = '';");
$OBJCT->re_query("UPDATE nhatkykiemphieu SET tuso = CONCAT(tuso,'-".$_SESSION['NienDo']."') WHERE locate('-',tuso)<1 and loaiphieu in('9','11')");
$tontai = $OBJCT->checkDuLieuToKhaiKhao($machinhanh);
if($tontai==FALSE || $_SESSION['User']=='Administrator'){
    echo 0;
}else{
    echo 1;
}