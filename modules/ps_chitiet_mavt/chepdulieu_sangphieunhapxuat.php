<?php
require("../../config.php");
$OBJ = new ps_chitiet_mavattu();
$SoPhieu = $_GET['sophieu'];
$sub = rand(10,99);
$sott = trim(trim($_SESSION['UserID']).time()).$sub;
$TTHoaDon = base64_decode($_GET['TTHoaDon']);
$ARR_TTHoaDon = explode("@!@",$TTHoaDon);
//debug($ARR_TTHoaDon);
$Masothue = $ARR_TTHoaDon[0];
$TenKH = check_data($ARR_TTHoaDon[1]);
$DiaChi = check_data($ARR_TTHoaDon[2]);

if($Masothue!=""){
	$OBJ->re_query("ALTER TABLE makh ADD UNIQUE (makh);");
    $OBJ->re_query("insert into makh (sott,makh,masothue,tenkh,diachi,makhcha,tenkd,manhom) value (0,'".$Masothue."','".$Masothue."','".$TenKH."','".$DiaChi."','0','".khu_dau_vn($TenKH)."','1001')");
    $OBJ->re_query("update makh set sott=stt where sott=0");

}

$OBJ->re_query("insert into mavt (sott,mavt,tenvt,dvt,manhom,matk,tkdoanhthu,tenkd,rate) select '0',mavt,tenvt,dvt,manhom,matk,tkdoanhthu,tenkd,thuesuat from nhaphoadon where sophieu='".$SoPhieu."' ON DUPLICATE KEY UPDATE dvtp = '' ");
$OBJ->re_query("update mavt set sott=stt where sott=0");
$OBJ->re_query("insert into chitiet_psvt (mavt,tenvt,dvt,soluongnhap,donggianhap,thanhtienchuack,thanhtien,tienchietkhau,thuesuat,thue,sophieu) select mavt,tenvt,dvt,soluong,dongia,thanhtienchuack,thanhtien,chietkhau,thuesuat,tienthue,sophieu from nhaphoadon where sophieu='".$SoPhieu."'");

$OBJ->re_query("delete from nhaphoadon where sophieu='".$SoPhieu."'");
unset($_SESSION['DataPhucHoi']);
unset($_SESSION['DataExcel']);
echo "Sao chép danh sách thành công!";
?>