<?php
$text = trim($_GET['term']);
include("../../config.php");
$OBJ = new makhachhang;
$OBJ->re_query("ALTER TABLE `makh` ADD FULLTEXT `fmtm` (`makh`, `tenkd`, `masothue`);");
$result = $OBJ->re_query("select makh,masothue,tenkh from makh where MATCH (makh,tenkd,masothue) AGAINST ('+" . str_replace(" "," +",$text) . "*' IN BOOLEAN MODE) limit 10");
while ($result_makh = $OBJ->re_fetch($result)){
    $data[] = array("label"=>$result_makh['makh']."-".$result_makh['masothue']."-".$result_makh['tenkh'],"value"=>$result_makh['makh']);
}
echo json_encode($data);
?>