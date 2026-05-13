<?php
   include("../../config.php");
    $ma = $_GET['ma'];
    $table=$_GET['table'];
    $columw = $_GET['columw'];
    $columget=$_GET['columget'];
    $OBJ = new makhachhang();
    $data = $OBJ->getTenTheo_Table($ma,$table,$columw);
   echo $data[$columget];
?>