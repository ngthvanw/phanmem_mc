<?php
   include("../../config.php");
   $Ma = $_GET['id'];
   $OBJ = new makhachhang;
   $OBJ->set_MaKH($Ma);
   $tontai = $OBJ->suaRank();
?>