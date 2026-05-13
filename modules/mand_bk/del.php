<?php
    include("../../config.php");
    $HTTK = new Hethongtaikhoan;
    $HTTK->set_MaTK(check_data($_GET['id']));
    $check = $HTTK->checkXoa();
    if($check==false){
        echo 1;
    }else{
        $HTTK->xoaTaiKhoan();   
    }
?>