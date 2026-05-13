<?php
include("../../config.php");
$OBJ = new makhachhang;
$user = $_GET['user'];
$quyen = json_encode($_GET['quyen']);
$database = "dulieuchung";

$sql = "select count(sott) as dem from {$database}.phanquyen_{$noiluu_phanmem} where user='{$user}' ";
$query = $OBJ->re_query($sql);
$data = $OBJ->re_fetch($query);

if($data['dem']<=0){
    $sqlin = " insert into {$database}.phanquyen_{$noiluu_phanmem}(`user`,phanquyen) VALUE ('{$user}','{$quyen}')";
}else{
    $sqlin = " UPDATE {$database}.phanquyen_{$noiluu_phanmem} SET phanquyen = '{$quyen}' WHERE `user` = '{$user}';";
}
$query = $OBJ->re_query($sqlin);
?>