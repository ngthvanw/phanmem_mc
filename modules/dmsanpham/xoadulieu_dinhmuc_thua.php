<?php
include("../../config.php");
$OBJ = new dmsanpham();
$OBJ->re_query("delete from chitiet_dinhmuc_sp where masp not in (select masp from masp where loaisp='SP')");
$OBJ->re_query("delete from chitiet_dinhmuc_sp where mavt not in (select mavt from mavt)");
echo "{\"result\": \"success\"}";
?>