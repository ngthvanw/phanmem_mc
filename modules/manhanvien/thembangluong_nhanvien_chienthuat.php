<?php
   include("../../config.php");
   $txttinhluongtheo = $_GET['txttinhluongtheo'];
   $tinhluongtheo = $_GET['tinhluongtheo'];
switch ($txttinhluongtheo) {
    case 1:
        $tenthang = " Tháng 1 - " . $_SESSION['NienDo'];
        $tungay = $_SESSION['NienDo'] . "-" . $txttinhluongtheo . "-1";
        $denngay = $_SESSION['NienDo'] . "-" . $txttinhluongtheo . "-31";
        break;
    case 2:
        $tenthang = " Tháng 2 - " . $_SESSION['NienDo'];
        $tungay = $_SESSION['NienDo'] . "-" . $txttinhluongtheo . "-1";
        $denngay = $_SESSION['NienDo'] . "-" . $txttinhluongtheo . "-29";
        break;
    case 3:
        $tenthang = " Tháng 3 - " . $_SESSION['NienDo'];
        $tungay = $_SESSION['NienDo'] . "-" . $txttinhluongtheo . "-1";
        $denngay = $_SESSION['NienDo'] . "-" . $txttinhluongtheo . "-31";
        break;
    case 4:
        $tenthang = " Tháng 4 - " . $_SESSION['NienDo'];
        $tungay = $_SESSION['NienDo'] . "-" . $txttinhluongtheo . "-1";
        $denngay = $_SESSION['NienDo'] . "-" . $txttinhluongtheo . "-30";
        break;
    case 5:
        $tenthang = " Tháng 5 - " . $_SESSION['NienDo'];
        $tungay = $_SESSION['NienDo'] . "-" . $txttinhluongtheo . "-1";
        $denngay = $_SESSION['NienDo'] . "-" . $txttinhluongtheo . "-31";
        break;
    case 6:
        $tenthang = " Tháng 6 - " . $_SESSION['NienDo'];
        $tungay = $_SESSION['NienDo'] . "-" . $txttinhluongtheo . "-1";
        $denngay = $_SESSION['NienDo'] . "-" . $txttinhluongtheo . "-30";
        break;
    case 7:
        $tenthang = " Tháng 7 - " . $_SESSION['NienDo'];
        $tungay = $_SESSION['NienDo'] . "-" . $txttinhluongtheo . "-1";
        $denngay = $_SESSION['NienDo'] . "-" . $txttinhluongtheo . "-31";
        break;
    case 8:
        $tenthang = " Tháng 8 - " . $_SESSION['NienDo'];
        $tungay = $_SESSION['NienDo'] . "-" . $txttinhluongtheo . "-1";
        $denngay = $_SESSION['NienDo'] . "-" . $txttinhluongtheo . "-31";
        break;
    case 9:
        $tenthang = " Tháng 9 - " . $_SESSION['NienDo'];
        $tungay = $_SESSION['NienDo'] . "-" . $txttinhluongtheo . "-1";
        $denngay = $_SESSION['NienDo'] . "-" . $txttinhluongtheo . "-30";
        break;
    case 10:
        $tenthang = " Tháng 10 - " . $_SESSION['NienDo'];
        $tungay = $_SESSION['NienDo'] . "-" . $txttinhluongtheo . "-1";
        $denngay = $_SESSION['NienDo'] . "-" . $txttinhluongtheo . "-31";
        break;
    case 11:
        $tenthang = " Tháng 11 - " . $_SESSION['NienDo'];
        $tungay = $_SESSION['NienDo'] . "-" . $txttinhluongtheo . "-1";
        $denngay = $_SESSION['NienDo'] . "-" . $txttinhluongtheo . "-30";
        break;
    case 12:
        $tenthang = " Tháng 12 - " . $_SESSION['NienDo'];
        $tungay = $_SESSION['NienDo'] . "-" . $txttinhluongtheo . "-1";
        $denngay = $_SESSION['NienDo'] . "-" . $txttinhluongtheo . "-31";
        break;
    case "I":
        $tenthang = " Quý I - " . $_SESSION['NienDo'];
        $tungay = $_SESSION['NienDo'] . "-1-1";
        $denngay = $_SESSION['NienDo'] . "-3-31";
        break;
    case "II":
        $tenthang = " Quý II - " . $_SESSION['NienDo'];
        $tungay = $_SESSION['NienDo'] . "-4-1";
        $denngay = $_SESSION['NienDo'] . "-6-30";
        break;
    case "III":
        $tenthang = " Quý III - " . $_SESSION['NienDo'];
        $tungay = $_SESSION['NienDo'] . "-7-1";
        $denngay = $_SESSION['NienDo'] . "-9-30";
        break;
    case "IV":
        $tenthang = " Quý IV - " . $_SESSION['NienDo'];
        $tungay = $_SESSION['NienDo'] . "-10-1";
        $denngay = $_SESSION['NienDo'] . "-12-31";
        break;
    case "V":
        $tungay = $_SESSION['NienDo'] . "-1-1";
        $denngay = $_SESSION['NienDo'] . "-12-31";
        break;

}
   $OBJ = new manhanvien;
   $OBJCT = new ketoantonghop();
	$OBJ->re_query("UPDATE pskt SET makh_nh = '' WHERE (loaiphieu!=3 and loaiphieu!=4) or tenkh_nh='';");// update khách hàng không có trong thu chi

//// Bảng thu khách hàng từ ngày đến ngÀY

$str_w=" and ngayghiso >='".$tungay."' and ngayghiso<= '".$denngay."' and chitiet_pskt.tkno1 in ('131')";

$str_w3=" and ngayghiso >='".$tungay."' and ngayghiso<= '".$denngay."' and chitiet_pskt.tkno2 in ('131')";

$OBJCT->setStrOderby($str_w);
$OBJCT->setStrOderby3($str_w3);

$dataThu = $OBJCT->load_danhsach_thuno_chuyenkhoan_cuakhachhang();

$datadoanhthu = $OBJCT->load_danhsach_phancap_thu_nokhachhang($dataThu);


   $OBJ->ThemBangLuongNhanVien($datadoanhthu,$tinhluongtheo,$txttinhluongtheo);

?>