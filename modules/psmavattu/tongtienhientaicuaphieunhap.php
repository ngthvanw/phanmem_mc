<?php	

include("../../config.php");
$sophieu = $_GET['sophieu'];

$OBJCT = new ps_chitiet_mavattu();

$data = $OBJCT->layTongTienPhieuNhapXuat($sophieu);
echo "Tổng tiền hàng:".number_format($data['thanhtien'])." - Tổng thuế: ".number_format($data['thue'])." Tổng thuế: ".number_format($data['chietkhau']);





