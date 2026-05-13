<?php
include("../../config.php");
$OBJ = new ps_chitiet_mavattu();

$sott               = check_data($_GET['sott']);
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

$sql_update = "update bangkemuavao_banra set 
                                             thang       = '{$thang}',
                                             loaibangke       = '{$loaibangke}',
                                             gtmuavao  = '{$gtmuavao}',
                                             thuemuavao       = '{$thuemuavao}',
                                             dtbanra  = '{$dtbanra}',
                                             thuebanra         = '{$thuebanra}',
                                             teptin     = '{$teptin}',
                                             nguoinhap = '{$nguoinhap}',
                                             ngaynhap     = '{$ngaynhap}',
                                             ghichu = '{$ghichu}'

              WHERE  sott = '{$sott}';";
$OBJ->re_query($sql_update);
echo "{\"result\": \"success\"}";
?>