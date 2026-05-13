<?php
include("../../config.php");
$OBJ = new pskt();
$sophieu = $_GET['sophieu'];
$OBJ->set_orderby(" sophieu ='".$sophieu."' ");
$data = $OBJ->loadListPSKT();
$data_chitiet = $OBJ->loadListChiTietPSKT();
$_SESSION['PhieuThuChi'] = $data;
$_SESSION['ChiTietPhieuThuChi'] = $data_chitiet;
debug($data);