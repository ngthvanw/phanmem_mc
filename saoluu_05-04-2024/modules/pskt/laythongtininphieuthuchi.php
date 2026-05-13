<?php
include("../../config.php");
unset($_SESSION['PhieuThuChi']);
unset($_SESSION['ChiTietPhieuThuChi']);
unset($_SESSION['PHIEUCUOI']);
$OBJ = new pskt();
$sophieu = $_GET['sophieu'];

$postuphieu = strpos($_GET['tuphieu'],"-");
if($postuphieu==""){
    $tuphieu = $_GET['tuphieu'];
}else{
    $tuphieu = str_replace("-","",substr($_GET['tuphieu'],$postuphieu));
}
$posdenphieu = strpos($_GET['denphieu'],"-");
if($posdenphieu==""){
    $denphieu = $_GET['denphieu'];
}else{
    $denphieu = str_replace("-","",substr($_GET['denphieu'],$posdenphieu));
}

$loaiphieu = $_GET['loaiphieu'];
$OBJ->set_orderby(" loaiphieu ='".$loaiphieu."' and  CAST(SUBSTRING_INDEX(mapskt, '-', -1) as UNSIGNED)>='".$tuphieu."' and CAST(SUBSTRING_INDEX(mapskt, '-', -1)as UNSIGNED)<='".$denphieu."' ");
$data = $OBJ->loadListPSKT_W_IN();
foreach ($data as $itemPh){
    $strsophieu.="'".$itemPh['sophieu']."',";
}
$data_chitiet = $OBJ->loadListChiTietPSKT_IN(substr($strsophieu,0,-1));

$dem=0;
$array_tkno=array();
foreach ($data_chitiet as $k=>$Item_chitiet0){// Cộng các tài khoản trùng nhau và xuất vào 1 màng
	$dem=0;
	foreach ($Item_chitiet0 as $Item_chitiet){// Cộng các tài khoản trùng nhau và xuất vào 1 màng
		$dem++;
		if(array_key_exists($Item_chitiet['tkno1'],$array_tkno[$k])) {
			$gtvnd1 = $array_tkno[$k][$Item_chitiet['tkno1']]+$Item_chitiet['gtvnd1'];
			$array_tkno[$k][$Item_chitiet['tkno1']]=$gtvnd1;

		}else{
			$array_tkno[$k][$Item_chitiet['tkno1']]=$Item_chitiet['gtvnd1'];
		}
        if($Item_chitiet['maloai']==1 ||($Item_chitiet['maloai']!=1 &&$Item_chitiet['gtvnd2']!=0) ) {
            if (array_key_exists($Item_chitiet['tkno2'], $array_tkno[$k])) {
                $gtvnd2 = $array_tkno[$k][$Item_chitiet['tkno2']] + $Item_chitiet['gtvnd2'];
                $array_tkno[$k][$Item_chitiet['tkno2']] = $gtvnd2;

            } else {
                $array_tkno[$k][$Item_chitiet['tkno2']] = $Item_chitiet['gtvnd2'];
            }
        }
	}
	$data[$k]['soluongct']=$dem;
	$data[$k]['tenphieu'] = $_GET['tenphieu'];
	$data[$k]['ngayhd'] = dd_mm_yyy($_GET['ngayhd']);
	$data[$k]['ngaylap'] = dd_mm_yyy($_GET['ngaylap']);
	$data[$k]['chuthich'] = $Item_chitiet['chuthich'];
	$data[$k]['loaisp'] = $Item_chitiet['loaisp'];
	$data[$k]['mabp'] = $Item_chitiet['mabp'];
	$data[$k]['mand1'] = $Item_chitiet['mand1'];
}

$_SESSION['PhieuThuChi'] = $data;

$_SESSION['ChiTietPhieuThuChi'] = $array_tkno;
$_SESSION['ChiTietPhieuThuChiFULL'] = $Item_chitiet;

foreach ( $data as $item){
    $phieucuoi = $item;
}
$_SESSION['PHIEUCUOI'] = $phieucuoi;



