<?php
include("../../config.php");
$OBJ = new psmavattu();
$phieunhap = $_GET['phieunhap'];
$phieuchi = $_GET['phieuthu'];
$phieughico = $_GET['phieughico'];
$phieunganhangchi = $_GET['phieunganhangchi'];

$phieuxuat = $_GET['phieuxuat'];
$phieuxuatsx = $_GET['phieuxuatsx'];
$phieuthu = $_GET['phieuchi'];
$phieughino = $_GET['phieughino'];
$phieunganhangthu = $_GET['phieunganhangthu'];
$tknganhangthu = $_GET['tknganhangthu'];
$tknganhangchi = $_GET['tknganhangchi'];

$tuthang = $_GET['tuthang'];
$denthang = $_GET['denthang'];

$loaidanhdau = $_GET['loaidanhdau'];

if($phieunhap==1) {// Phiếu nhập kho
    $sqlup_phieunhap = $OBJ->loadDanhsSachPSVT(1,$tuthang,$denthang,$loaidanhdau);
}
if($phieuchi==1){// Phiếu chi
    $sqlup_phieuchi = $OBJ->loadDanhsSachPSKT(2,$tuthang,$denthang,$loaidanhdau);
}

if($phieunganhangchi==1){// Ngân hàng rút ra
	if($tknganhangchi=="ALL"){// Nếu không chọn tài khoản ngân hàng thì đánh số hết
		for($i=6;$i<64;$i=$i+2){
			$sqlup_phieuchi = $OBJ->loadDanhsSachPSKT($i,$tuthang,$denthang,$loaidanhdau);
		}
	}else{
		 $sqlup_phieuchi = $OBJ->loadDanhsSachPSKT($tknganhangchi,$tuthang,$denthang,$loaidanhdau);
	}
}
if($phieughico==1){// Phiếu ghi có
    $sqlup_phieuchi = $OBJ->loadDanhsSachPSKT(4,$tuthang,$denthang,$loaidanhdau);
}

// Dánh số đầu ra
if($phieuxuat==1) {// Phiếu xuất kho
    $sqlup_phieuxuat = $OBJ->loadDanhsSachPSVT(2,$tuthang,$denthang,$loaidanhdau);
}

if($phieuxuatsx==1) {// Phiếu xuất kho sản xuất
    $sqlup_phieuxuatsx = $OBJ->loadDanhsSachPSVT(3,$tuthang,$denthang,$loaidanhdau);
}

if($phieuthu==1){// Phiếu thu
    $sqlup_phieuthu = $OBJ->loadDanhsSachPSKT(1,$tuthang,$denthang,$loaidanhdau);
}

if($phieunganhangthu==1){// Ngân hàng gửi vào
	if($tknganhangthu=="ALL"){// Nếu không chọn tài khoản ngân hàng thì đánh số hết
		for($i=5;$i<63;$i=$i+2){
			$sqlup_phieuthu = $OBJ->loadDanhsSachPSKT($i,$tuthang,$denthang,$loaidanhdau);
		}
	}else{
		$sqlup_phieuthu = $OBJ->loadDanhsSachPSKT($tknganhangthu,$tuthang,$denthang,$loaidanhdau);
	}
}
if($phieughino==1){// Phiếu ghi nợ
    $sqlup_phieuchi = $OBJ->loadDanhsSachPSKT(3,$tuthang,$denthang,$loaidanhdau);
}
echo "Số thứ tự các phiếu đã được đánh dấu thành công ! ";


