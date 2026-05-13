<?php
include("../../config.php");
$database_hientai = $_SESSION['TIENTO'].$_SESSION['MST']."_".$_SESSION['NienDo'];
$database_namtruoc = $_SESSION['TIENTO'].$_SESSION['MST']."_".($_SESSION['NienDo']-1);
$OBJCT = new baocaothue();
$Sql = "UPDATE {$database_hientai}.sdcn ht JOIN {$database_namtruoc}.cnkh nt
		ON (ht.makh = nt.makh)
		SET 
			ht.sdkno = nt.nock_,
			ht.sdkco = nt.cock_
			where ht.matk = nt.matk ";
$OBJCT->re_query($Sql);
