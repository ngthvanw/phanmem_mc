<?php
   include("../../config.php");
   $Ma = $_GET['id'];
   $OBJ = new manhom;
   $OBJ->set_MaNhom($Ma);
   $OBJ->suaRank();
?>