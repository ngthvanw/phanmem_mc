<?php
   include("../../config.php");
   $OBJ = new hethongtaikhoan();
   $ma = $_GET['ma'];
   $OBJ->set_orderby(" matk in ($ma)");
    $data = $OBJ->loadListHTTK_CB();
   array_unshift($data,array(""=>""));
   echo json_encode($data);
?>