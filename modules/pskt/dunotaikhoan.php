<?php
include("../../config.php");
$OBJCT = new ketoantonghop();
//$OBJHTTK = new hethongtaikhoan();
$tungay = $_SESSION['NienDo']."-01-01";

$denngay = $_SESSION['NienDo']."-12-31";
$theobophan = "0001";
$theonoidung = $_GET['theonoidung'];
if($theobophan=='0001'){
    $sql_mabp = " and mabp!=''";
    $sql_mabp1 = " and makho!=''";
}else{
    $sql_mabp = " and mabp='".$theobophan."'";
}

$intheothuesuat = $_GET['intheothuesuat'];
$intheochungtu= $_GET['intheochungtu'];
$sapxep= "ngayghiso";
$tenphieu= $_GET['tenphieu'];
$ngaylap= $_GET['ngaylap'];
$matk =  $_GET['matk'];

$str_w=" and ngayghiso >='".$tungay."' and ngayghiso<= '".$denngay."' ".$sql_mabp;;
$str_w2=" and ngayghiso >='".$tungay."' and ngayghiso<='".$denngay."' ".$sql_mabp1;;
$OBJCT->setStrOderby($str_w);
$OBJCT->setStrOderby2($str_w2);

//$OBJHTTK->set_orderby(" matk in (".$matk.")");
//$danhsachtk = $OBJHTTK->loadListHTTK_W1();

$dauky = $OBJCT->load_danhsach_socai_dauky($matk);

$dataChi = $OBJCT->LayTongDuNoCuaTaiKhoan($matk,"ALL",$sapxep);// lấy tất cả thu chi
//debug($dataChi);
$tongnops=0;
$tongcops=0;
foreach ($dataChi[$matk] as $itemTK){
    $tongcops+=$itemTK['tienco'];
    $tongnops+=$itemTK['tienno'];
}
//debug($dauky);
$dunodk = $dauky[$matk]['soduno'];
$ducodk = $dauky[$matk]['soduco'];

$tamtinh = ($dunodk+$tongnops)-($ducodk+$tongcops);
echo "Số dư tài khoản ".$matk.": ".number_format($tamtinh);



