<?php
    include("../../config.php");
    $OBJ = new danhmuccptratruoc();
    $loai = $_GET['loai'];
	$tanggiam = $_GET['tanggiam'];
    $OBJ->set_TangGiam($_GET['tanggiam']);
    $OBJ->set_MaTaiSan($_GET['mataisan']);
    $OBJ->setLoaiSP($_GET['loaisp']);
    $OBJ->set_MaPSTS($_GET['STT']);
    $OBJ->set_TenTaiSan(check_data($_GET['tentaisan']));
    $OBJ->set_TenKD(khu_dau_vn(check_data($_GET['tentaisan'])));
    $OBJ->set_MaTK(check_data($_GET['matk']));
    $OBJ->set_DVT(check_data($_GET['donvitinh']));
    $OBJ->set_MaNhomTS(check_data($_GET['NhomTS']));
    $OBJ->set_TenNhom(check_data($_GET['tenNhomTS']));
    $OBJ->set_MaBoPhan(check_data($_GET['mabp']));
    $OBJ->set_BoPhan(check_data($_GET['bophan']));
    $OBJ->setThamChieu(check_data($_GET['thamchieu']));
	
    $OBJ->set_MaNoiDung(check_data($_GET['manoidung']));
    $OBJ->set_NoiDung(check_data($_GET['noidung']));
	
    $OBJ->set_CongSuat(check_data(str_replace(",","",$_GET['congsuat'])));
    $OBJ->set_NuocSX(check_data($_GET['nuocsanxuat']));
    $OBJ->set_NgaySX(check_data($_GET['ngaysx']));
    $OBJ->setNgayGhiSo(check_data($_GET['ngayghiso']));
    $OBJ->setNgayHoaDon(check_data($_GET['ngayhoadon']));
    $OBJ->setNgaySD(check_data($_GET['ngaysudung']));
    $OBJ->set_SoLuong(check_data(str_replace(",","",$_GET['soluong'])));
    $OBJ->set_NguyenGia(check_data(str_replace(",","",$_GET['nguyengia'])));
    $OBJ->set_GiaTriConLai(check_data(str_replace(",","",$_GET['giatriconlai'])));
    $OBJ->set_TyLeKH(check_data($_GET['tylekhachhang']));
    $OBJ->set_ThoiGianSD(check_data(str_replace(",","",$_GET['thoigiansudung'])));
    $OBJ->set_MucKHThang(check_data(str_replace(",","",$_GET['khauhaothang'])));
    $OBJ->set_TKCo(check_data(str_replace(",","",$_GET['tkco'])));
    $OBJ->set_TKNo(check_data(str_replace(",","",$_GET['tkno'])));
    $OBJ->set_ChuThich(check_data($_GET['chuthich']));
    database::re_query("ALTER TABLE `pscptt` ADD `loaisp` CHAR(2) NOT NULL;");
    if($loai=='xdcb'){
        $OBJ->set_orderby(" SUBSTRING(matk,1,3)=241");
    }else{
        $OBJ->set_orderby(" SUBSTRING(matk,1,3)!=241");
    }
	$kiemtramats = $OBJ->checkmataisanps();

	if($kiemtramats){
		$OBJ->suaPSTS();
	}else{
		$OBJ->themPSTS();
	}

    echo "{\"recId\": \"" . $sott . "\"}";
?>