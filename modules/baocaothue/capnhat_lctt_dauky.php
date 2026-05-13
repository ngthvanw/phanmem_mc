<?php
include("../../config.php");
$database_hientai = $_SESSION['TIENTO'].$_SESSION['MST']."_".$_SESSION['NienDo'];
$database_namtruoc = $_SESSION['TIENTO'].$_SESSION['MST']."_".($_SESSION['NienDo']-1);
$OBJCT = new baocaothue();
$Sql = "UPDATE {$database_hientai}.luuchuyentiente ht JOIN {$database_namtruoc}.luuchuyentiente nt
		ON (ht.maso = nt.maso)
		SET ht.sodudk = nt.soduck
		";
$OBJCT->re_query($Sql);
