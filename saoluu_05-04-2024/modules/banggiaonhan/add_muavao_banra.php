<?php
include("../../config.php");
$OBJ = new ps_chitiet_mavattu();
$sql_sott = "SELECT max(sott) as sott FROM  bangkemuavao_banra";
$query_sott = database::re_query($sql_sott);
$res_sott = database::re_fetch($query_sott);

$sott = $res_sott['sott']+1;

$thang           =   check_data($_GET['thang']);
$loaibangke          =   check_data($_GET['loaibangke']);
$gtmuavao          =   check_data($_GET['gtmuavao']);
$thuemuavao     =   check_data($_GET['thuemuavao']);
$dtbanra          =   check_data($_GET['dtbanra']);
$thuebanra         =   check_data($_GET['thuebanra']);
$teptin     =   check_data($_GET['teptin']);
$nguoinhap           =   check_data($_GET['nguoinhap']);
$ngaynhap       =   check_data($_GET['ngaynhap']);
$ghichu             = check_data($_GET['ghichu']);


$sql_ins = "insert into bangkemuavao_banra(sott,thang,loaibangke,gtmuavao,thuemuavao,dtbanra,thuebanra,teptin,nguoinhap,ngaynhap,ghichu)
            VALUE ('{$sott}','{$thang}','{$loaibangke}','{$gtmuavao}','{$thuemuavao}','{$dtbanra}','{$thuebanra}','{$teptin}','{$nguoinhap}','{$ngaynhap}','{$ghichu}');";
database::re_query($sql_ins);
echo "{\"recId\": \"" . $sott . "\"}";
?>