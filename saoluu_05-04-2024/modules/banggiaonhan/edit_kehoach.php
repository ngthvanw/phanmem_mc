<?php
include("../../config.php");
$OBJ = new ps_chitiet_mavattu();

$sott               = check_data($_GET['sott']);
$tencongty          =   check_data($_GET['dscongty']);
$nguoigui          =   check_data($_GET['nguoigui']);
$ngaygui     =   check_data($_GET['ngaygui']);
$nguoiduyet          =   check_data($_GET['nguoiduyet']);
$tungay    =   check_data($_GET['tungay']);
$denngay          =   check_data($_GET['denngay']);
$trangthai            =   check_data($_GET['trangthai']);
$ghichu             = check_data($_GET['ghichu']);
$tenkd              =   khu_dau_vn(check_data($_GET['dscongty']));

$sql_update = "update phpmyadmin.danhsach_kehoach_{$noiluu_phanmem} set          dscongty       = '{$tencongty}',
                                                                                 tenkd       = '{$tenkd}',
                                                                                 nguoigui  = '{$nguoigui}',
                                                                                 ngaygui       = '{$ngaygui}',
                                                                                 tungay  = '{$tungay}',
                                                                                 denngay         = '{$denngay}',
                                                                                 ghichu     = '{$ghichu}',
                                                                                 trangthai           = '{$trangthai}'
              WHERE  sott = '{$sott}';";
database::re_query($sql_update);
echo "{\"result\": \"success\"}";
?>