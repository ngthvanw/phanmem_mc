<?php
   include("../../config.php");
   $Ma = $_GET['id'];
   $OBJ = new hethongtaikhoan;
   $OBJ->set_MaTK($Ma);
   $tontai = $OBJ->suaRank();
?>