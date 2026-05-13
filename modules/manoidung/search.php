<?php
$text = trim($_GET['term']);
$mapl = $_GET['mapl'];
include("../../config.php");
$OBJ = new manoidung;
$OBJ->re_query("ALTER TABLE `mand` ADD FULLTEXT `fmtm` (`mand`, `tenkd`);");
$result = $OBJ->re_query("select mand,tennoidung from mand where MATCH (mand,tenkd) AGAINST ('+" . str_replace(" "," +",$text) . "*' IN BOOLEAN MODE) and mapl in ('".str_replace(",","','",$mapl)."') limit 10");
while ($result_makh = $OBJ->re_fetch($result)){
    $data[] = array("label"=>$result_makh['mand']."-".$result_makh['tennoidung'],"value"=>$result_makh['mand']);
}
echo json_encode($data);
?>