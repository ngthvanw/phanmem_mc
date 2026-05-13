<?php
include("../../config.php");
$Loai = $_GET['loai'];
$OBJ = new dmsanpham();
$database_namtruoc = $_SESSION['TIENTO'].$_SESSION['MST']."_".($_SESSION['NienDo']-1);
if($Loai=='LCTT'){
    $OBJ->re_query("UPDATE luuchuyentiente T1, {$database_namtruoc}.luuchuyentiente T2
                SET T1.sodudk = T2.soduck 
                where T1.sott=T2.sott");

}
if($Loai=='XDKQKD'){
    $OBJ->re_query("UPDATE tokhaitndn T1, {$database_namtruoc}.tmp_kqhdkd T2
                SET T1.sotiendk = T2.namnay 
                where T1.machitieu=T2.maso ");
}
echo "{\"result\": \"success\"}";
?>