<?php
include("../../config.php");
unset($_SESSION["THONGTINPHIEUTONGHOPDTCPGTCT"]);
unset($_SESSION["THONGTINPHIEU"]);
$tungay = $_GET['tungay'];
$denngay = $_GET['denngay'];

$loaisanpham = $_GET['loaisanpham'];
$nhomcttheo = $_GET['nhomcttheo'];

$OBJMACT = new dmsanpham();
if($nhomcttheo=='DIABAN'){
    $OBJMACT->set_orderby(" bangtonghop_danhthu_chiphi_giathanhct.loaisp = '".$loaisanpham."' and diabanuudai!='0' and diabanuudai!=''");
    $data = $OBJMACT->loadListThongTinBangTopHopDanhThuChiPhiGiaThanhCT_TheoDiaBan();
}else{
    $OBJMACT->set_orderby(" bangtonghop_danhthu_chiphi_giathanhct.loaisp = '".$loaisanpham."'");
    $data = $OBJMACT->loadListThongTinBangTopHopDanhThuChiPhiGiaThanhCT();
}
debug($data);
$_SESSION["THONGTINPHIEUTONGHOPDTCPGTCT"] = $data;
$_SESSION["THONGTINPHIEU"]['tenphieu'] = $_GET['tenphieu'];
$_SESSION["THONGTINPHIEU"]['ngaylap'] = $_GET['ngaylap'];
$_SESSION["THONGTINPHIEU"]['ngayhoadon'] = $_GET['ngayhoadon'];





