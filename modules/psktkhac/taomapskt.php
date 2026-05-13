<?php
   include("../../config.php");
   $OBJ = new pskt();
   $LoaiPhieu = $_GET['lp'];
   $OBJ->set_orderby(" loaiphieu = ".$LoaiPhieu);
   $data = $OBJ->createMaPSKT();
   echo $data;
?>