<?php
include("../../config.php");
$OBJ = new psktphieughiso();
$mapskt = $_GET['mapskt'];
$OBJ->set_orderby(" pskt.mapskt ='".$mapskt."' ");
$data = $OBJ->loadListPSKT();
$data_chitiet = $OBJ->loadInPhieu();
$_SESSION['PhieuGhiSo'] = $data;

$_SESSION['ChiTietPhieuGhiSo'] = $data_chitiet;
