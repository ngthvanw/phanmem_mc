<?php
   include("../../config.php");
   $ma = $_GET['mabangke'];
   $OBJ = new bangkechitien();
   $OBJ->xoabangkechitienchitiet($ma);
?>