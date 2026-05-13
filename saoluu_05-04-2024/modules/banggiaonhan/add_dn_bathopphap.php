<?php
include("../../config.php");
$OBJ = new ps_chitiet_mavattu();

$sub = rand(10,99);
$sott = trim(trim($_SESSION['UserID']).time()).$sub;
$masothue           =   check_data($_GET['masothue']);
$tencongty          =   check_data($_GET['tencongty']);
$nguonthongtin          =   check_data($_GET['nguonthongtin']);
$diachi         =   check_data($_GET['diachi']);
$nguoigui          =   check_data($_GET['nguoigui']);
$ngaygui     =   check_data($_GET['ngaygui']);
$ghichu             = check_data($_GET['ghichu']);
$tenkd              =   khu_dau_vn(check_data($_GET['tencongty']));

$sql_ins = "INSERT INTO dulieuchung.doanhnghiep_bathopphap(`sott`, `masothue`, `tencongty`, `diachi`, `nguoigui`, `ngaygui`, `ghichu`, `tenkd`,`nguonthongtin`) 
            VALUES ('{$sott}','{$masothue}','{$tencongty}','{$diachi}','{$nguoigui}','{$ngaygui}','{$ghichu}','{$tenkd}','{$nguonthongtin}')";
database::re_query($sql_ins);
echo "{\"recId\": \"" . $sott . "\"}";
?>