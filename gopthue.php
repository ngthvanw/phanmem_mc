<?php
include("config.php");
$sophieu = $_GET['sophieu'];
$OBJ = new ps_chitiet_mavattu();
$re = $OBJ->re_query("update chitiet_psvt set thanhtienchuack = (thanhtien+thue),thanhtien = (thanhtien+thue),thue = 0 where sophieu = '".$sophieu."'");
?>