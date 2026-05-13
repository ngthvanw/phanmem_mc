<?php
include("../../config.php");
$OBJ = new ps_chitiet_mavattu();

$sott               = check_data($_GET['sott']);
$masothue           =   check_data($_GET['masothue']);
$tencongty          =   check_data($_GET['tencongty']);
$nguoigiao          =   check_data($_GET['nguoigiao']);
$hotennguoigiao     =   check_data($_GET['hotennguoigiao']);
$ngaygiao           =   check_data($_GET['ngaygiao']);
$nguoinhan          =   check_data($_GET['nguoinhan']);
$hotennguoinhan     =   check_data($_GET['hotennguoinhan']);
$noidung            =   check_data($_GET['noidung']);
$nguoigiaoky        =   check_data($_GET['nguoigiaoky']);
$ngaynguoigiaoky    =   check_data($_GET['ngaynguoigiaoky']);
$nguoinhanky        =   check_data($_GET['nguoinhanky']);
$ngaynguoinhanky    =   check_data($_GET['ngaynguoinhanky']);
$ghichu             =   check_data($_GET['ghichu']);
$tenkd              =   khu_dau_vn(check_data($_GET['tencongty']));
$bosung             =   check_data($_GET['bosung']);

$sql_update = "update phpmyadmin.danhsach_giaonhan_chungtu_{$noiluu_phanmem} set masothue        = '{$masothue}',
                                                                                 tencongty       = '{$tencongty}',
                                                                                 nguoigiao       = '{$nguoigiao}',
                                                                                 hotennguoigiao  = '{$hotennguoigiao}',
                                                                                 nguoinhan       = '{$nguoinhan}',
                                                                                 hotennguoinhan  = '{$hotennguoinhan}',
                                                                                 noidung         = '{$noidung}',
                                                                                 nguoigiaoky     = '{$nguoigiaoky}',
                                                                                 ngaynguoigiaoky = '{$ngaynguoigiaoky}',
                                                                                 nguoinhanky     = '{$nguoinhanky}',
                                                                                 ngaynguoinhanky = '{$ngaynguoinhanky}',
                                                                                 tenkd           = '{$tenkd}',
                                                                                 bosung          = '{$bosung}',
                                                                                 ghichu          = '{$ghichu}'
              WHERE  sott = '{$sott}';";
database::re_query($sql_update);
echo "{\"result\": \"success\"}";
?>