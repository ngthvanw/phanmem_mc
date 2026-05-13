<?php	

include("../../config.php");
$sophieu = $_GET['sophieu'];

$OBJCT = new ps_chitiet_mavattu();

$data = $OBJCT->layTongTienPhieuNhapXuat_CTCT($sophieu);
echo json_encode($data);