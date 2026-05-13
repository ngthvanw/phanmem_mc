<?php
include("../../config.php");
$OBJ = new pskt();
$mapskt = $_GET['mapskt'];
$OBJ->set_orderby(" mapskt ='".$mapskt."' ");
$data = $OBJ->loadListPSKT();
$data_chitiet = $OBJ->loadListChiTietPSKT();
$_SESSION['PhieuThuChi'] = $data;
$_SESSION['ChiTietPhieuThuChi'] = $data_chitiet;
debug($data_chitiet);