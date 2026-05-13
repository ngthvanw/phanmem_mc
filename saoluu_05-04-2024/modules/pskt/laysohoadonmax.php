<?php
include("../../config.php");
$LoaiPhieu = $_GET['loaiphieu'];
$KyHieu= $_GET['kyhieu'];

$OBJ = new psmavattu();
$OBJ->setLP($LoaiPhieu);
$OBJ->setSeri($KyHieu);
$tontai = $OBJ->LaySoHoaDonChiMax();
$sohoadonke = $tontai +1;
$chieudaichuoi =  strlen($tontai);
if($chieudaichuoi<=1){
	$chieudaichuoi=7;
}
$chieudaiso =  strlen($sohoadonke);
$themsokhong = $chieudaichuoi-$chieudaiso;
$str="";
for($i=1;$i<=$themsokhong;$i++){
	//$str.="0";
}
echo $str.$sohoadonke;
?>