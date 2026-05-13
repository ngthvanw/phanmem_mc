<?php
include("../../config.php");
$OBJ = new ps_chitiet_mavattu();
$sql_sott = "SELECT `AUTO_INCREMENT` as sott FROM  INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = 'dulieuchung' AND   TABLE_NAME   = 'danhsach_giaonhan_chungtu_{$noiluu_phanmem}';";
$query_sott = $OBJ->re_query($sql_sott);
$res_sott = $OBJ->re_fetch($query_sott);

$sott = $res_sott['sott'];

$OBJ->re_query("ALTER TABLE dulieuchung.danhsach_giaonhan_chungtu_{$noiluu_phanmem} AUTO_INCREMENT={($sott+1)};");

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
$ghichu             = check_data($_GET['ghichu']);
$tenkd              =   khu_dau_vn(check_data($_GET['tencongty']));
$bosung             =   check_data($sott);

$sql_ins = "insert into dulieuchung.danhsach_giaonhan_chungtu_{$noiluu_phanmem}(sott,masothue,tencongty,nguoigiao,hotennguoigiao,ngaygiao,nguoinhan,hotennguoinhan,noidung,nguoigiaoky,ngaynguoigiaoky,nguoinhanky,ngaynguoinhanky,ghichu,tenkd,bosung)
                                                              VALUE ('{$sott}','{$masothue}','{$tencongty}','{$nguoigiao}','{$hotennguoigiao}','{$ngaygiao}','{$nguoinhan}','{$hotennguoinhan}','{$noidung}','{$nguoigiaoky}','{$ngaynguoigiaoky}','{$nguoinhanky}','{$ngaynguoinhanky}','{$ghichu}','{$tenkd}','{$bosung}');";
$OBJ->re_query($sql_ins);
echo "{\"recId\": \"" . $sott . "\"}";
?>