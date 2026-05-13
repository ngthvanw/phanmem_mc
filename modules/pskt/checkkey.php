<?php
include("../../config.php");
$Ma = $_GET['ma'];
$LoaiPhieu = $_GET['lp'];
$OBJ = new pskt();
$OBJ->setMaPSKT($Ma);
$OBJ->setLP($LoaiPhieu);
$tontai = $OBJ->checkKeyTrung();
if($tontai==TRUE){
    echo 1;
}else{
    echo 0;
}
?>