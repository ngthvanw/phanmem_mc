<?php
include("../../config.php");
$SoPhieu = $_GET['sophieu'];
$OBJCT = new ps_chitiet_mavattu();
$OBJPSKT = new pskt();
$OBJKHO = new makho();
$data_KHO = $OBJKHO->loadListMaKho_CoKeyLaMa();
$OBJCT->setThangNamTK($_SESSION['NienDo']."-".($_GET['thangtk'])."-01");
$OBJCT->setThangTonKho($thangtk);
$OBJCT->setThang($_GET['thangtk']);
if($_SESSION['phuongphaptonkho']==2){// Theo phương pháp tính tồn kho liên hoàn
    $data = $OBJCT->themTonKhoThang_LienHoan($data_KHO);
    database::re_query("update chitiet_psvt INNER JOIN tkthang on chitiet_psvt.sophieu=tkthang.sophieu_nxk set chitiet_psvt.donggianhap=tkthang.dongia,chitiet_psvt.thanhtienchuack=tkthang.thanhtienxuat,chitiet_psvt.thanhtien=tkthang.thanhtienxuat where sophieu='" . $SoPhieu. "' and chitiet_psvt.mavt=tkthang.mavt ");
}