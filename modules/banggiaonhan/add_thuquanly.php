<?php
include("../../config.php");
$OBJ = new ps_chitiet_mavattu();

$sql_sott = "SELECT `AUTO_INCREMENT` as sott FROM  INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = 'dulieuchung' AND   TABLE_NAME   = 'danhsach_thuquanly_{$noiluu_phanmem}';";
$query_sott = $OBJ->re_query($sql_sott);
$res_sott = $OBJ->re_fetch($query_sott);
$sott = $res_sott['sott'];

$masothue           =   check_data($_GET['mst']);
$tencongty          =   check_data($_GET['tencongty']);
$nguoigui          =   check_data($_GET['nguoigui']);
$ngaygui     =   check_data($_GET['ngaygui']);
$nguoiduyet          =   check_data($_GET['nguoiduyet']);
$lichsuduyet          =   check_data($_GET['lichsuduyet']);
$taptin     =   check_data($_GET['taptin']);
$trangthai            =   check_data($_GET['trangthai']);
$ghichu             = check_data($_GET['ghichu']);
$tenkd              =   khu_dau_vn(check_data($_GET['tencongty']));

$sql_ins = "INSERT INTO dulieuchung.danhsach_thuquanly_{$noiluu_phanmem}(`mst`, `tencongty`, `tenkd`, `nguoigui`, `ngaygui`, `nguoiduyet`, `lichsuduyet`, `taptin`, `ghichu`, `trangthai`)
                                                              VALUE ('{$masothue}','{$tencongty}','{$tenkd}','{$nguoigui}','{$ngaygui}','{$nguoiduyet}','{$lichsuduyet}','{$taptin}','{$ghichu}','{$trangthai}');";
$OBJ->re_query($sql_ins);
echo "{\"recId\": \"" . $sott . "\"}";
?>