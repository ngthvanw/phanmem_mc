<?php
    include("../../config.php");
    $OBJ = new phieukiemtra();
    $sott = $OBJ->createSoTT();
    $OBJ->set_SoTT($sott);
    $OBJ->setSoct($_GET['soct']);
    $OBJ->setNoidung($_GET['noidung']);
    $OBJ->setChinhsua($_GET['chinhsua']);

    $OBJ->setKetoanvien($_GET['ketoanvien']);
    $OBJ->setTruongnhom($_GET['truongnhom']);
    $OBJ->setBangiamdoc($_GET['bangiamdoc']);
    $OBJ->setLoaiPhieu($_GET['loaiphieu']);
    $thoigiannhap = time();
    $OBJ->setThoigianbatdau($thoigiannhap);
    $OBJ->themPhieu();
    echo "{\"recId\": \"" . $sott . "\"}";
?>