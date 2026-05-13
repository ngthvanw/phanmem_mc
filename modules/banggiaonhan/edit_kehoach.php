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
$tentep              =   (check_data($_GET['tentep']));

$OBJ->re_query("ALTER TABLE dulieuchung.danhsach_kehoach_{$noiluu_phanmem} ADD `tentep` VARCHAR(250) NOT NULL;");
$OBJ->re_query("ALTER TABLE dulieuchung.danhsach_kehoach_{$noiluu_phanmem} ADD `file_data` LONGBLOB  NOT NULL;");

$sql_update = "update dulieuchung.danhsach_kehoach_{$noiluu_phanmem} set          dscongty       = '{$tencongty}',
                                                                                 tenkd       = '{$tenkd}',
                                                                                 nguoigui  = '{$nguoigui}',
                                                                                 ngaygui       = '{$ngaygui}',
                                                                                 tungay  = '{$tungay}',
                                                                                 denngay         = '{$denngay}',
                                                                                 ghichu     = '{$ghichu}',
                                                                                 trangthai           = '{$trangthai}',
                                                                                 tentep           = '{$tentep}'
              WHERE  sott = '{$sott}';";
$OBJ->re_query($sql_update);
echo "{\"result\": \"success\"}";
?>