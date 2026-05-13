<?php
include("../../config.php");
$database_hientai = $_SESSION['TIENTO'].$_SESSION['MST']."_".$_SESSION['NienDo'];
$database_namtruoc = $_SESSION['TIENTO'].$_SESSION['MST']."_".($_SESSION['NienDo']-1);
$OBJCT = new baocaothue();
$Sql = "UPDATE {$database_hientai}.tk ht JOIN {$database_namtruoc}.tkthang nt
		ON (ht.mavt = nt.mavt)
		SET 
			ht.slck = nt.soluongtonck,
			ht.gtvnck = nt.dongiabinhquan,
			ht.dgxvnd = nt.thanhtientonck
		where ht.makho = nt.makho and nt.thang='12'";
$OBJCT->re_query($Sql);
