<?php
    include("../../config.php");
    $OBJ = new psmavattu();

     $OBJ->setMaPSKT(check_data($_REQUEST['STT']));
     $OBJ->setNgayGhiSo(check_data($_REQUEST['ngayghiso']));
     $OBJ->setLoaiCT(check_data($_REQUEST['loaict']));
     $OBJ->setMauSo(check_data($_REQUEST['mauso']));
     $OBJ->setSeri(check_data($_REQUEST['kyhieu']));
     $OBJ->setSCT(check_data($_REQUEST['sohopdong']));
     $OBJ->setNgayHD(check_data($_REQUEST['ngayhopdong']));
     $OBJ->setMaKH(check_data($_REQUEST['makhachhang']));
     $OBJ->setTenKH(check_data($_REQUEST['tenkhachhang']));
     $OBJ->setDiaChi(check_data($_REQUEST['diachi']));
     $OBJ->setMaSoThue(check_data($_REQUEST['masothue']));
     $OBJ->setMaND(check_data($_REQUEST['manoidung']));
     $OBJ->setTenND(check_data($_REQUEST['noidung']));
     $OBJ->setMaBP(check_data($_REQUEST['mabophan']));
     $OBJ->setTenBP(check_data($_REQUEST['bophan']));
     $OBJ->setNgayTT(check_data($_REQUEST['ngaythanhtoan']));

     $OBJ->setMaTKNo1(check_data($_REQUEST['tkno1']));
     $OBJ->setMaTKNo2(check_data($_REQUEST['tkno2']));
     $OBJ->setMaTKCo1(check_data($_REQUEST['tkco1']));
     $OBJ->setMaTKCo2(check_data($_REQUEST['tkco2']));
     $OBJ->setSoTien1(check_data($_REQUEST['sotien1']));
     $OBJ->setSoTien2(check_data($_REQUEST['sotien2']));
     //$OBJ->set_SoTT(check_data($_REQUEST['tongtien']));
     $OBJ->set_SoTT(check_data($_REQUEST['ghichu']));

    $check = $OBJ->checkSoHD();
    if($check==TRUE){// Cập nhật phiếu nhập kho
        echo "Cap nhat";
    }else{// thêm phiếu nhập kho
       $OBJ->themPhieuNhapKho();
    }
    //$OBJ->themMaVT();
    echo "{\"recId\": \"" . $sott . "\"}";
?>