<?php
$text = trim($_GET['term']);
include("../../config.php");
$OBJ = new dmsanpham();
$OBJ->re_query("ALTER TABLE `masp` ADD FULLTEXT `fmt` (`masp`,`tenkd`);");
$result = $OBJ->re_query("select masp,tensp from masp where MATCH (masp,tenkd) AGAINST ('+" . str_replace(" "," +",$text) . "*' IN BOOLEAN MODE) and loaisp!='' limit 10");
while ($result_mact = $OBJ->re_fetch($result)){
    $data[] = array("label"=>$result_mact['masp']."-".$result_mact['tensp'],"value"=>$result_mact['masp']);
}
echo json_encode($data);
?>