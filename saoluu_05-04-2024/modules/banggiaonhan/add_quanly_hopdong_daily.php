<?php
include("../../config.php");
$OBJ = new ps_chitiet_mavattu();

$sql_sott = "SELECT `AUTO_INCREMENT` as sott FROM  INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = '".$_SESSION['TIENTO'].$_SESSION['MST']."_".$_SESSION['NienDo']."' AND TABLE_NAME   = 'danhsach_hopdong_daily';";
$query_sott = database::re_query($sql_sott);
$res_sott = database::re_fetch($query_sott);
$sott = $res_sott['sott'];

$namhd           =   check_data($_GET['namhd']);
$ngaybd          =   check_data($_GET['ngaybd']);
$ngaykt          =   check_data($_GET['ngaykt']);
$nguoinhap         =   check_data($_SESSION['User']);
$giadichvu         =   check_data($_GET['giadichvu']);
$teptin          =   htmlentities($_GET['teptin']);
$ghichu          = check_data($_GET['ghichu']);

$sql_ins = "INSERT INTO `danhsach_hopdong_daily`(`sott`, `namhd`, `ngaybd`, `ngaykt`,`giadichvu`, `teptin`, `nguoinhap`, `ghichu`) 
                                         VALUES ('".$sott."','".$namhd."','".$ngaybd."','".$ngaykt."','".$giadichvu."','".$teptin."','".$nguoinhap."','".$ghichu."')";
database::re_query($sql_ins);
echo "{\"recId\": \"" . $sott . "\"}";
?>