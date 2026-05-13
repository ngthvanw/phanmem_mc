<?php
session_start();
ini_set('max_execution_time', 300);
require("../../config.php");
$OBJ = new ps_chitiet_mavattu();
$MST = $_SESSION['MST'];
$NienDo = $_SESSION['NienDo'];
$chkkhoadulieu = $_GET['chkkhoadulieu'];
$chkkhoadulieukhiduyet = $_GET['khoadulieukhiduyet'];
$txtkhoadulieu = $_GET['txtkhoadulieu'];
$txthienthisole = $_GET['txthienthisole'];
$apdungketoan = $_GET['apdungketoan'];
$apdungkhachhang = $_GET['apdungkhachhang'];

$loaihinhdoanhnghiep = $_GET['loaihinhdoanhnghiep'];
$theothongtu = $_GET['theothongtu'];

$thietlaphddt = $_GET['thietlaphddt'];
$txt_hddt_duongdan = $_GET['txt_hddt_duongdan'];
$txt_hddt_tendangnhap = $_GET['txt_hddt_tendangnhap'];
$txt_hddt_matkhau = $_GET['txt_hddt_matkhau'];

$txttengiamdoc = $_GET['txttengiamdoc'];
$txtketoantruong = $_GET['txtketoantruong'];
$txtthuquy = $_GET['txtthuquy'];
$txtnguoilapphieu = $_GET['txtnguoilapphieu'];
$txt_mauhoadon = $_GET['txt_mauhoadon'];

$txt_kyhieu = $_GET['txt_kyhieu'];
$txt_sotaikhoan = $_GET['txt_sotaikhoan'];
$txt_tennganhang = $_GET['txt_tennganhang'];
$nhacungcaphddt = $_GET['nhacungcaphddt'];

$thietlapdailythue = $_GET['thietlapdailythue'];
$txt_masothue_daily=$_GET['txt_masothue_daily'];
$txt_tencongtydaily=$_GET['txt_tencongtydaily'];
$txt_hovatendaily=$_GET['txt_hovatendaily'];
$txt_chungchindaily=$_GET['txt_chungchindaily'];
$ngonngu=$_GET['ngonngu'];
$txt_seritoken=trim($_GET['txt_seritoken']);
$chukysodaky=trim($_GET['chukysodaky']);
$butrucongno=trim($_GET['butrucongno']);
$dinhdangsophieu=trim($_GET['dinhdangsophieu']);
$phuongphaptonkho=trim($_GET['phuongphaptonkho']);
$capnhatgiavontucthoi=trim($_GET['capnhatgiavontucthoi']);

$txt_PartnerGUID=trim($_GET['txt_PartnerGUID']);
$txt_PartnerToken=trim(base64_encode($_GET['txt_PartnerToken']));
$tudongtinhdongia = trim(($_GET['tudongtinhdongia']));
$giam30thuegtgt = trim(($_GET['giam30thuegtgt']));
$hienthichinhanh = trim(($_GET['hienthichinhanh']));
$ngoaite = trim(($_GET['ngoaite']));
$duandautu = trim(($_GET['duandautu']));
$phanloaihanghoadauvao = trim(($_GET['phanloaihanghoa']));
$chungtuthamchieu = trim(($_GET['chungtuthamchieu']));

$dir = $driver . "/datafile/" . $MST . "/".$NienDo."/";
$str= $chkkhoadulieu . ":" . $txtkhoadulieu . ":" . $txthienthisole.":" . $apdungketoan.":" . $apdungkhachhang.":".$chkkhoadulieukhiduyet.":" . $loaihinhdoanhnghiep.":".$theothongtu.":".$thietlaphddt.":".$txt_hddt_duongdan.":".$txt_hddt_tendangnhap.":".$txt_hddt_matkhau.":".$txttengiamdoc.":".$txtketoantruong.":".$txtthuquy.":".$txtnguoilapphieu.":".$txt_mauhoadon.":".$txt_kyhieu.":".$txt_sotaikhoan.":".$txt_tennganhang.":".$nhacungcaphddt;
$str.=":". $thietlapdailythue . ":" . $txt_masothue_daily.":" . $txt_tencongtydaily.":" . $txt_hovatendaily.":".$txt_chungchindaily.":".$ngonngu.":".$txt_seritoken.":".$chukysodaky.":".$butrucongno.":".$dinhdangsophieu.":".$phuongphaptonkho.":".$capnhatgiavontucthoi.":".$txt_PartnerGUID.":".$txt_PartnerToken.":".$tudongtinhdongia.":".$giam30thuegtgt.":".$hienthichinhanh.":".$ngoaite.":".$duandautu.":".$phanloaihanghoadauvao.":".$chungtuthamchieu;
$congty = $str;
if ($handle = opendir($dir)) {
    while ($entry = readdir($handle)) {
        if (is_dir($dir . "/" . $entry) && $entry != "." && $entry != "..") {
        }
    }
    closedir($handle);
}
$fp = @fopen($dir . "tuychon.db", "w");
// Ki?m tra file m? thành công không
$string = "";
if (!$fp) {
    echo 'Mở file không thành công ';
} else {
    $_SESSION['chkkhoadulieu'] = $chkkhoadulieu;
    $_SESSION['txtkhoadulieu'] = $txtkhoadulieu;
    $_SESSION['txthienthisole'] = $txthienthisole;
    $_SESSION['apdungketoan'] = $apdungketoan;
    $_SESSION['apdungkhachhang'] = $apdungkhachhang;
    $_SESSION['chkkhoadulieukhiduyet'] = $chkkhoadulieukhiduyet;
    $_SESSION['loaihinhdoanhnghiep'] = $loaihinhdoanhnghiep;
    $_SESSION['theothongtu'] = $theothongtu;

    $_SESSION['thietlaphddt'] = $thietlaphddt;
    $_SESSION['txt_hddt_duongdan'] = $txt_hddt_duongdan;
    $_SESSION['txt_hddt_tendangnhap'] = $txt_hddt_tendangnhap;
    $_SESSION['txt_hddt_matkhau'] = $txt_hddt_matkhau;
    $_SESSION['txttengiamdoc'] = $txttengiamdoc;
    $_SESSION['txtketoantruong'] = $txtketoantruong;
    $_SESSION['txtthuquy'] = $txtthuquy;
    $_SESSION['txtnguoilapphieu'] = $txtnguoilapphieu;
    $_SESSION['txt_mauhoadon'] = $txt_mauhoadon;

    $_SESSION['txt_kyhieu'] = $txt_kyhieu;
    $_SESSION['txt_sotaikhoan'] = $txt_sotaikhoan;
    $_SESSION['txt_tennganhang'] = $txt_tennganhang;
    $_SESSION['nhacungcaphddt'] = $nhacungcaphddt;

    $_SESSION['thietlapdailythue'] = $thietlapdailythue;
    $_SESSION['txt_masothue_daily'] = $txt_masothue_daily;
    $_SESSION['txt_tencongtydaily'] = $txt_tencongtydaily;
    $_SESSION['txt_hovatendaily'] = $txt_hovatendaily;
    $_SESSION['txt_chungchindaily'] = $txt_chungchindaily;
    $_SESSION['NGONNGU'] = $ngonngu;
    $_SESSION['txt_seritoken'] = $txt_seritoken;
    $_SESSION['chukysodaky'] = $chukysodaky;
    $_SESSION['butrucongno'] = $butrucongno;
    $_SESSION['dinhdangsophieu'] = $dinhdangsophieu;
    $_SESSION['phuongphaptonkho'] = $phuongphaptonkho;
    $_SESSION['capnhatgiavontucthoi'] = $capnhatgiavontucthoi;

    $_SESSION['txt_PartnerGUID'] = $txt_PartnerGUID;
    $TachPartnerGUID = explode("@",$txt_PartnerGUID);
    //OrganizationUnitID@CompanyID@UserID@InvoiceTemplateID
    $_SESSION['OrganizationUnitID'] = $TachPartnerGUID[0];
    $_SESSION['CompanyID'] = $TachPartnerGUID[1];
    $_SESSION['UserIDMS'] = $TachPartnerGUID[2];
    $_SESSION['InvoiceTemplateID'] = $TachPartnerGUID[3];
    $_SESSION['C_OR_K'] = $TachPartnerGUID[4];

    $_SESSION['txt_PartnerToken'] = trim(base64_decode($txt_PartnerToken));
    $_SESSION['tudongtinhdongia'] = ($tudongtinhdongia);
    $_SESSION['giam30thuegtgt'] = ($giam30thuegtgt);
    $_SESSION['hienthichinhanh'] = ($hienthichinhanh);
    $_SESSION['ngoaite'] = ($ngoaite);
    $_SESSION['duandautu'] = ($duandautu);
    $_SESSION['phanloaihanghoadauvao'] = ($phanloaihanghoadauvao);
    $_SESSION['chungtuthamchieu'] = ($chungtuthamchieu);

    $OBJ->re_query("Insert into thongtinchung(sott,noidung) VALUES(1,'".$congty."')");
    $OBJ->re_query("update thongtinchung set noidung ='".$congty."' where sott = 1");
    fwrite($fp, $congty);
    fclose($fp);
}
?>