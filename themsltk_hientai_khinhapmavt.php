<?php
include("config.php");
$OBJ = new ps_chitiet_mavattu();
$OBJDMSP = new dmsanpham();
$OBJKHO = new makho();
$data_KHO = $OBJKHO->loadListMaKho_CoKeyLaMa();
$result = $OBJ->ThemSLTKMaVTHT_KhiNhapMaVT($data_KHO);
//$resultsp = $OBJDMSP->ThemSLDMSPHienTai();
//$resultnvlct = $OBJDMSP->ThemSLDMNVLHienTai();
?>