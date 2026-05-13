<?php
   include("../../config.php");
    $valcolumw = $_GET['valcolumw'];
    $table=$_GET['table'];
    $columw = $_GET['columw'];
    $OBJ = new makhachhang();
    $data = $OBJ->DenDongTheo_Table($table,$columw,$valcolumw);
   echo $data['sodong'];
?>