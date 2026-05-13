<?php
include("config.php");
$OBJ = new ps_chitiet_mavattu();
$OBJDMSP = new dmsanpham();
$OBJKHO = new makho();
$filename = "soluongnhapxuat.db";
$re = $OBJ->re_query("select SUM(soluongnhap) sodong from chitiet_psvt");
$data = $OBJ->re_fetch($re);

$soluong = file_get_contents($filename);
if($data['sodong']!=$soluong){
	file_put_contents($filename,$data['sodong']);
	$data_KHO = $OBJKHO->loadListMaKho_CoKeyLaMa();
	$result = $OBJ->ThemSLTKMaVTHT($data_KHO);
	$resultsp = $OBJDMSP->ThemSLDMSPHienTai();
	$resultnvlct = $OBJDMSP->ThemSLDMNVLHienTai();
}
?>