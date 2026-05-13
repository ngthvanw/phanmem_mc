<?php
    include("../../config.php");
    $OBJ = new Hethongtaikhoan;
    $MaTK = check_data($_GET['matk']);
    $SHTK = substr($MaTK,0,3);  
	$OBJ->set_SoTT(check_data($_GET['sott']));
    $OBJ->set_MaTK(check_data($_GET['matk']));
    $OBJ->set_TenTaiKhoan(check_data($_GET['tentk']));
    $OBJ->set_MaTKCha(check_data($_GET['matkcha']));
    $OBJ->set_LoaiTK(check_data($_GET['loaitk']));
    $OBJ->set_MaTS(check_data($_GET['mats']));
    $OBJ->set_MaNgV(check_data($_GET['mangv']));
    $OBJ->set_NhomTK(check_data($_GET['nhomtk']));
    $OBJ->set_SHTK(check_data($SHTK));
    $OBJ->set_ChuThich(check_data($_GET['ghichu']));
    $OBJ->set_NgayTao(date('Y-m-d'));
    $rowData = $OBJ->getTaiKhoan();
    $MaTKOld = $rowData['matk'];
    if($MaTKOld!=$MaTK){// N?u mã TK thay d?i
        $OBJ->set_MaTKOld($MaTKOld);
        $OBJ->suaMaTKCha();// c?p nh?t l?i các mã cha c?a mã tk con và các khóa ngo?i có liên quan
    }     
    $OBJ->suaTaiKhoan();
    echo "{\"result\": \"success\"}";
?>