<?php
include("../../config.php");
$OBJ = new baocaothue();
//debug($_GET);
$sott = $_GET['sott'];
$maso = $_GET['maso'];
$solophatsinh = $_GET['solophatsinh'];
$sochuyenkytruoc = $_GET['sochuyenkytruoc'];
$sochuyentrongky = $_GET['sochuyentrongky'];
$sochuyenkysau = $_GET['sochuyenkysau'];
$ghichu = check_data($_GET['ghichu']);

$OBJ->re_query(" update plchuyenlo set solophatsinh=".$solophatsinh.",sochuyenkytruoc=".$sochuyenkytruoc.",sochuyentrongky=".$sochuyentrongky.",sochuyenkysau=".$sochuyenkysau.",ghichu='".$ghichu."' where sott='{$sott}'");

?>