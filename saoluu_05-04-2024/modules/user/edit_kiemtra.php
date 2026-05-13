<?php
include("../../config.php");
$OBJ = new mavattu;
$ngaykiemtra = $_GET['ngaykiemtra'];
$kykiemtra = $_GET['kykiemtra'];
$sotientruythu = $_GET['sotientruythu'];
$lydotruythu = $_GET['lydotruythu'];
$nguoiphutrach = $_GET['nguoiphutrach'];
$kehoachkiemtra = $_GET['kehoachkiemtra'];
$ghichu = $_GET['ghichu'];
$sott = $_GET['sott'];

$OBJ->re_query("ALTER TABLE phpmyadmin.`danhsach_congty_kiemtra_phanmem_mc` ADD `kehoachkiemtra` VARCHAR(200) NOT NULL");
$OBJ->re_query("update phpmyadmin.danhsach_congty_kiemtra_{$noiluu_phanmem} set ngaykiemtra='{$ngaykiemtra}',
                                            nguoiphutrach='{$nguoiphutrach}',
                                            kykiemtra='{$kykiemtra}',
                                            sotientruythu='{$sotientruythu}',
                                            lydotruythu='{$lydotruythu}',
                                            kehoachkiemtra='{$kehoachkiemtra}',
                                            ghichu='{$ghichu}'

                    where sott='{$sott}' "
            );

?>