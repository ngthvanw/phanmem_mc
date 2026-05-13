<?php
include("../../config.php");
$OBJ = new phieukiemtra;
debug($_GET);
$thoigiannhap = time();
$OBJ->set_SoTT(check_data($_GET['sott']));
$OBJ->setSoct($_GET['soct']);
$OBJ->setNoidung($_GET['noidung']);
$OBJ->setChinhsua($_GET['chinhsua']);

$OBJ->setKetoanvien($_GET['ketoanvien']);
$OBJ->setTruongnhom($_GET['truongnhom']);
$OBJ->setBangiamdoc($_GET['bangiamdoc']);
$OBJ->setLoaiPhieu($_GET['loaiphieu']);
$OBJ->setKetoancapnhat($_GET['loaiphieu']);
$OBJ->setTruongnhomcapnhat($_GET['loaiphieu']);
$OBJ->setGiamdoccapnhat($_GET['loaiphieu']);

if ($_SESSION['Level'] == 1 && ($_GET['pq_cellcls']['ketoanvien'] != "" || $_GET['pq_cellcls']['truongnhom'] != "" || $_GET['pq_cellcls']['bangiamdoc'] != "")) {// Ban giam đốc
    $OBJ->setGiamdoccapnhat($thoigiannhap);
}
if ($_SESSION['Level'] == 2 && ($_GET['pq_cellcls']['ketoanvien'] != "" || $_GET['pq_cellcls']['truongnhom'] != "")) {// Ban giam đốc
    $OBJ->setTruongnhomcapnhat($thoigiannhap);
}
if ($_SESSION['Level'] == 3 && ($_GET['pq_cellcls']['ketoanvien'] != "")) {// Ban giam đốc
    $OBJ->setKetoancapnhat($thoigiannhap);
}
$OBJ->suaPhieu();
echo "{\"result\": \"success\"}";
?>