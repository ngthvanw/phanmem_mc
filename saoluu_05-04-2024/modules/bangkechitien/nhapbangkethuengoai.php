<?php
include("../../config.php");
$OBJ = new bangkechitien();

$mabangke = $OBJ->setMabangke($_GET['mabangke']);
$hotennguoichi = $OBJ->setHotennguoichi($_GET['hotennguoichi']);
$bophan = $OBJ->setBophan($_GET['bophan']);
$lydochi = $OBJ->setLydochi($_GET['lydochi']);
$ngaychi = $OBJ->setNgaychi($_GET['ngay']);
$danhsach = ($_GET['danhsach']);
krsort($danhsach);
$noidung = "";
$sotien = 0;
foreach ($danhsach as $item){
    $noidung.=$item["noidung"]."+";
    $sotien+=$item["thuclinh"];
}
$OBJ->setNoidung(substr($noidung,0,-1));
$OBJ->setSotien($sotien);
$OBJ->themBangKeChiTiet();
$_SESSION['BANGTHUENGOAI'] = $_GET;

?>