<?php
include("../../config.php");
$thangtk = ngaycuoithang($_GET['thangtk'],$_SESSION['NienDo']);

$OBJ = new psmavattu();
$OBJCT = new ps_chitiet_mavattu();
$OBJCT->setThangTonKho($thangtk);
$OBJCT->setThangNamTK($_SESSION['NienDo']."-12-31");
$OBJCT->loadListDanhSachTKChuyen();


