<?php
include("../../config.php");
unset($_SESSION["THONGTINPHIEU"]);
unset($_SESSION["LISTTINHHINHNGANSACH"]);
unset($_SESSION["DSHTTK"]);
unset($_SESSION["DSDAUKY"]);

$nam = $_SESSION['NienDo'];
function load_ppkhaithue($dir)
{
    $fp1 = @fopen($dir . "/" . 'phuongphapkhaithue.db', "r"); // đọc thông tin chung
    $string_info = fgets($fp1);
    fclose($fp1);
    if ($string_info == "") {
        $string_info = 1;
    }
    return ($string_info);
}

$ppkhautru_str = load_ppkhaithue($driver . "/datafile/" . $_SESSION['MST']."/".$_SESSION['NienDo']);
$ppkhautru_arr = explode(";",$ppkhautru_str);
$ppkhautru = $ppkhautru_arr['0'];
$OBJCT = new ketoantonghop();
$OBJHTTK = new hethongtaikhoan();
$OBJMACT = new dmsanpham();
$OBJMANOIDUNG = new manoidung();
$DATA_LISTMABP = $OBJMACT->loadListMaCT_CoKeyLaMa();
$DATA_LISTMAND = $OBJMANOIDUNG->loadListMaNoiDung_CoKeyLaMa();

$tungay = $_GET['tungay'];

$denngay = $_GET['denngay'];
$theobophan = $_GET['theobophan'];

$theonoidung = $_GET['theonoidung'];
$congdontheosocai = 0;
$theobophan = '0001';
if($theobophan==='0001'){
	$sql_mabp = " and mabp!=''";
    $sql_mabp1 = " and makho!=''";
}else{
    $chuoimactsp_re = substr($OBJMACT->loadMaKHALL_TraVeChuoiMaCTSP($theobophan),0,-1);
    $mactsp_string = str_replace(",","','",$chuoimactsp_re);
	$sql_mabp = " and mabp in ('".$mactsp_string."')";
	$sql_mabp1 = " and makho in ('".$mactsp_string."')";
}

$_SESSION['TuNgay'] = $tungay;
$_SESSION['DenNgay'] = $denngay;
$intheothuesuat = $_GET['intheothuesuat'];
$intheochungtu= $_GET['intheochungtu'];
$sapxep= $_GET['sapxep'];
$tenphieu= $_GET['tenphieu'];
$ngaylap= $_GET['ngaylap'];
$matk =  $_GET['mavt'];
$str_w="";
$str_w2="";

    $str_w=" and ngayghiso >='".$_SESSION['NienDo']."-01-01' and ngayghiso< '".$tungay."'  ".$sql_mabp;
    $OBJCT->setStrOderby($str_w);
	$str_w2=" and ngayghiso >='".$_SESSION['NienDo']."-01-01' and ngayghiso<'".$tungay."'  ".$sql_mabp1;
	$OBJCT->setStrOderby2($str_w2);
	$dauky = $OBJCT->load_danhsach_socai_dk_theotk($matk,$theonoidung,$sapxep);
	//debug($dauky);
	$str_w2=" and ngayghiso >='".$tungay."' and ngayghiso<='".$denngay."'  ".$sql_mabp1;
    $OBJCT->setStrOderby2($str_w2);
	$str_w=" and ngayghiso >='".$tungay."' and ngayghiso<= '".$denngay."'  ".$sql_mabp;
	$OBJCT->setStrOderby($str_w);
    $OBJHTTK->set_orderby(" matk in (".$matk.")");
    $danhsachtk = $OBJHTTK->loadListHTTK_W1();
	
//$dauky = $OBJCT->load_danhsach_socai_dauky($matk)
$dataChi = $OBJCT->load_danhsach_socai_chi_theotk($matk,$theonoidung,$sapxep);// lấy tất cả thu chi

$datatokhai = $OBJCT->load_danhsach_tokhai_thue($ppkhautru);// lấy tất cả thu chi

foreach ($datatokhai as $itemtokhai){
    $itemtokhai['ngayghiso'] = ngaycuoithang($itemtokhai['thang'],$_SESSION['NienDo']);
    $itemtokhai['ngayhoadon'] = ngaycuoithang($itemtokhai['thang'],$_SESSION['NienDo']);
    $thang =1;
    if($itemtokhai['thang']=='I')
        $thang=3;
    if($itemtokhai['thang']=='II')
        $thang=6;
    if($itemtokhai['thang']=='III')
        $thang=9;
    if($itemtokhai['thang']=='IV')
        $thang=12;

    if($ppkhautru==2){
        if($itemtokhai['tokhai']=="vanglai"){
            $itemtokhai['noidung'] = "Thuế GTGT ở địa phương khác của hoạt động kinh doanh xây dựng, lắp đặt bán hàng, bất động sản ngoại tỉnh quý {$itemtokhai['thang']} năm {$_SESSION['NienDo']}";
        }else{
            $itemtokhai['noidung'] = "Tờ khai thuế GTGT quý {$itemtokhai['thang']} năm {$_SESSION['NienDo']}";
        }
        $tokhaithue['33311'][$thang][] = $itemtokhai;
    }else{
        if($itemtokhai['tokhai']=="vanglai"){
            $itemtokhai['noidung'] = "Thuế GTGT ở địa phương khác của hoạt động kinh doanh xây dựng, lắp đặt bán hàng, bất động sản ngoại tỉnh tháng {$itemtokhai['thang']} năm {$_SESSION['NienDo']}";
        }else{
            $itemtokhai['noidung'] = "Tờ khai thuế GTGT tháng {$itemtokhai['thang']} năm {$_SESSION['NienDo']}";
        }

        $tokhaithue['33311'][$itemtokhai['thang']][] = $itemtokhai;
    }
}

$grouptheo ="thang";
if($sapxep=="noidung"){
    $grouptheo ="mand";
}else{
    $grouptheo ="thang";
}
$matk_arr = explode(",",$matk);

if($congdontheosocai=="0"){
    foreach ($matk_arr as $item_tk){
        foreach ($dataChi[$item_tk] as $item_danhsach){
            $tk = $item_danhsach['tk'];
            $thang = $item_danhsach[$grouptheo];
            if(($item_danhsach['tkdu']=='34111'|| $item_danhsach['tkdu']=='1111' || substr($item_danhsach['tkdu'],0,-2)=='1121' || $item_danhsach['tkdu']=='131') && $item_danhsach['tienno']!="0"){
                $danhsach_data[$tk][$thang][]=$item_danhsach;
            }
            if((($item_danhsach['tkdu']=='811'|| $item_danhsach['tkdu']=='4211' || substr($item_danhsach['tkdu'],0,-2)=='1121') && $item_danhsach['tienco']!="0" )){/// Lấy danh sách các loại thuê đã nộp NSNN
                $danhsach_data[$tk][$thang][]=$item_danhsach;
            }
        }
    }
}else{
    foreach ($matk_arr as $item_tk){
        foreach ($dataChi[$item_tk] as $item_danhsach){
            $tk = $item_danhsach['tk'];
            $thang = $item_danhsach[$grouptheo];
            $item_danhsach['tienco'] = $danhsach_data[$tk][$thang]['tienco']+$item_danhsach['tienco'];
            $item_danhsach['tienno'] = $danhsach_data[$tk][$thang]['tienno']+$item_danhsach['tienno'];
            $danhsach_data[$tk][$thang]=$item_danhsach;
        }
    }
}
$data_xuat_tinhhinh_ngansach="";
$kmatk = '33311';
//foreach ($danhsach_data as $kmatk => $item_danhsach_data){
    $j = 0;
    for ($i=1;$i<=12;$i++){
        foreach ($danhsach_data[$kmatk][$i] as $item_tokhai1){
            $j++;
            $time = strtotime($item_tokhai1["ngayghiso"]).$j;
            $data_xuat_tinhhinh_ngansach[$kmatk][$i][$time] = $item_tokhai1;
        }
        foreach ($tokhaithue[$kmatk][$i] as $item_tokhai2){
            $j++;
            $time = strtotime($item_tokhai2["ngayghiso"]).$j;
            $data_xuat_tinhhinh_ngansach[$kmatk][$i][$time] = $item_tokhai2;
        }
    }

$_SESSION["THONGTINPHIEU"]['thangtk'] = "Từ  " .dd_mm_yyy($tungay) ." đến " .dd_mm_yyy($denngay);

$_SESSION["THONGTINPHIEU"]['tenphieu'] = $_GET['tenphieu'];
$_SESSION["THONGTINPHIEU"]['ngaylap'] = $_GET['ngaylap'];
$_SESSION["THONGTINPHIEU"]['ngayhoadon'] = $_GET['ngayhoadon'];
$_SESSION["LISTTINHHINHNGANSACH"] = $data_xuat_tinhhinh_ngansach;
$_SESSION["DSHTTK"] = $danhsachtk;
$_SESSION["DSDAUKY"] = $dauky;
$_SESSION["DSMABP"] = $DATA_LISTMABP[$theobophan];
$_SESSION["DSMAND"] = $DATA_LISTMAND;




