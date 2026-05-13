<?php
include("../../config.php");
$OBJ = new ps_chitiet_mavattu();

$sott               = check_data($_GET['sott']);
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

echo $sql_update = "update dulieuchung.danhsach_thuquanly_{$noiluu_phanmem} set        mst        = '{$masothue}',
                                                                                 tencongty       = '{$tencongty}',
                                                                                 nguoigui       = '{$nguoigui}',
                                                                                 ngaygui  = '{$ngaygui}',
                                                                                 nguoiduyet       = '{$nguoinhan}',
                                                                                 lichsuduyet  = '{$lichsuduyet}',
                                                                                 taptin         = '{$taptin}',
                                                                                 trangthai     = '{$trangthai}',
                                                                                 tenkd           = '{$tenkd}',
                                                                                 ghichu          = '{$ghichu}'
              WHERE  sott = '{$sott}';";
$OBJ->re_query($sql_update);
echo "{\"result\": \"success\"}";
?>