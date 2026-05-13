<?php
    include("../../config.php");
    $OBJ = new pskt();
    $sophieu = $_GET['sophieu'];
    $OBJ->set_orderby(" sophieu = ".$sophieu);
    //$OBJ->demsoluongdongchitiet();
    $soluong = $OBJ->demsoluongdongchitiet();
    echo $soluong['soluong'];
?>