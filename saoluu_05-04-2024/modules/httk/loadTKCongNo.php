<?php
include("../../config.php");
$OBJ = new hethongtaikhoan();
$matk = $String_tkno_KH;
$OBJ->set_orderby("matk in ($matk)");
$data = $OBJ->loadListHTTK_W();
foreach ($data as $item){
    $datakh[][$item['matk']] = $item['matk']." - ".$item['tentk'];
}
echo json_encode($datakh);