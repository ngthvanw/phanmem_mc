<?php
include("../../config.php");
$database_hientai = $_SESSION['TIENTO'].$_SESSION['MST']."_".$_SESSION['NienDo'];
$database_namtruoc = $_SESSION['TIENTO'].$_SESSION['MST']."_".($_SESSION['NienDo']-1);
$OBJCT = new baocaothue();
$Sql = "UPDATE {$database_hientai}.tokhaitndn ht JOIN {$database_namtruoc}.tmp_kqhdkd nt
		ON (ht.machitieu = nt.maso)
		SET ht.sotiendk = nt.namnay
		where ht.loaitokhai='XDKQKD' and nt.quy='V'
		";
//$OBJCT->re_query("delete from {$database_namtruoc}.tmp_kqhdkd where quy!='V'");
$OBJCT->re_query($Sql);