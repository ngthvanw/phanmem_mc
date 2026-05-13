<?php
include("../../config.php");
$OBJ = new mavattu;
$ngaykiemtra = $_GET['ngaykiemtra'];
$kykiemtra = $_GET['kykiemtra'];
$sotientruythu = $_GET['sotientruythu'];
$lydotruythu = $_GET['lydotruythu'];
$nguoiphutrach = $_GET['nguoiphutrach'];
$kehoachkiemtra = $_GET['kehoachkiemtra'];
$masothue = $_GET['masothue'];
$tencongty = $_GET['tencongty'];
$ghichu = $_GET['ghichu'];

$sub = rand(10,99);
$sott = trim(trim($_SESSION['UserID']).time()).$sub;

$sql = "insert into phpmyadmin.danhsach_congty_kiemtra_{$noiluu_phanmem}(sott,masothue,tencongty,ngaykiemtra,nguoiphutrach,kykiemtra,sotientruythu,lydotruythu,kehoachkiemtra,ghichu) VALUES('".$sott."','".$masothue."','".$tencongty."','".$ngaykiemtra."','".$nguoiphutrach."','".$kykiemtra."','".$sotientruythu."','".$lydotruythu."','".$kehoachkiemtra."','".$ghichu."')";
$OBJ->re_query("ALTER TABLE phpmyadmin.`danhsach_congty_kiemtra_phanmem_mc` CHANGE `sott` `sott` BIGINT NOT NULL AUTO_INCREMENT;");
$OBJ->re_query("ALTER TABLE phpmyadmin.`danhsach_congty_kiemtra_phanmem_mc` DROP INDEX `masothue`;");
$OBJ->re_query($sql);
echo "{\"recId\": \"" . $sott . "\"}";
?>