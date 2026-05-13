<?php
include("../../config.php");
$OBJ = new ps_chitiet_mavattu();

$sott               = check_data($_GET['sott']);
$namhd           =   check_data($_GET['namhd']);
$ngaybd          =   check_data($_GET['ngaybd']);
$ngaykt          =   check_data($_GET['ngaykt']);
$nguoinhap         =   check_data($_GET['nguoinhap']);
$giadichvu         =   check_data($_GET['giadichvu']);
$ngaythaydoi        =   date("Y-m-d h:i:m");
$teptin         =   htmlentities($_GET['teptin']);
$ghichu          = check_data($_GET['ghichu']);

$sql_update = "UPDATE `danhsach_hopdong_daily` SET 
                                                  `namhd`='".$namhd."',
                                                  `ngaybd`='".$ngaybd."',
                                                  `ngaykt`='".$ngaykt."',
                                                  `giadichvu`='".$giadichvu."',
                                                  `teptin`='".$teptin."',
                                                  `ngaythaydoi`='".$ngaythaydoi."',
                                                  `ghichu`='".$ghichu."'
              WHERE  sott = '{$sott}';";
$OBJ->re_query($sql_update);
echo "{\"result\": \"success\"}";
?>