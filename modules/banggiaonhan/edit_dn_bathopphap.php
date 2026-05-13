<?php
include("../../config.php");
$OBJ = new ps_chitiet_mavattu();

$sott = check_data($_GET['sott']);
$masothue = check_data($_GET['masothue']);
$tencongty = check_data($_GET['tencongty']);
$nguonthongtin          =   check_data($_GET['nguonthongtin']);
$diachi = check_data($_GET['diachi']);
$nguoigui = check_data($_GET['nguoigui']);
$ngaygui = check_data($_GET['ngaygui']);
$ghichu = check_data($_GET['ghichu']);
$tenkd = khu_dau_vn(check_data($_GET['tencongty']));

$sql_ins = "UPDATE dulieuchung.`doanhnghiep_bathopphap` 
            SET    `tencongty`='{$tencongty}',
                   `diachi`='{$diachi}',
                   `nguonthongtin`='{$nguonthongtin}',
                   `ghichu`='{$ghichu}',
                   `tenkd`='{$tenkd}'
                   WHERE sott='{$sott}'";
$OBJ->re_query($sql_ins);
echo "{\"recId\": \"" . $sott . "\"}";
?>