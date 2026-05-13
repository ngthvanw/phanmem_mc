<?php
    include("../../config.php");
    $HTTK = new Hethongtaikhoan;
    $MaTK = checkdate($_GET['MaTK']); 
    $HTTK->set_MaTK(check_data($_GET['MaTK']));
	$DS_MaTKCha = $HTTK->loadListMaTKCha();

?>