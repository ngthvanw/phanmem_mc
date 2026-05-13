<?php
include("../../config.php");
$makhgop = $_GET['makhgop'];
$tenkhgop = $_GET['tenkhgop'];
$gopvaomakh = $_GET['gopvaomakh'];
$gopvaotenkh = $_GET['gopvaotenkh'];
$OBJ = new makhachhang;
$OBJ->re_query("update psvt set makh='{$gopvaomakh}',tenkh='{$gopvaotenkh}' where makh='{$makhgop}'");
$OBJ->re_query("update pskt set makh='{$gopvaomakh}',tenkh='{$gopvaotenkh}' where makh='{$makhgop}'");
$OBJ->re_query("update pskt set makh_nh='{$gopvaomakh}',tenkh_nh='{$gopvaotenkh}' where makh_nh='{$makhgop}'");
$OBJ->re_query("update sdcn set makh='{$gopvaomakh}' where makh='{$makhgop}'");
?>