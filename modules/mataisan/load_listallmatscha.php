<?php
    include("../../config.php");
    $OBJMaTS = new mataisan();
	$ListMaTSCha = $OBJMaTS->loadListAllDSMaTaiSan(0,1);
    echo json_encode($ListMaTSCha) ;
?>