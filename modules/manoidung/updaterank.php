<?php
   include("../../config.php");
   $Ma = $_GET['id'];
   $OBJ = new manoidung();
   $OBJ->set_MaND($Ma);
   $tontai = $OBJ->suaRank();
?>