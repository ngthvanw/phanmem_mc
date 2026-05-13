<?php
include("../../config.php");

$mysql_host = $_SESSION['HOST'];
$mysql_username = $_SESSION['USER_DB'];
// MySQL password
$mysql_password = $_SESSION['PASS_DB'];
$mst = $_SESSION['MST'];
$tencongty = $_SESSION['TenCongTy'];
$niendo = $_SESSION['NienDo'];
$tiento = strtolower($_SESSION['TIENTO']);
$tendangnhap = ($_SESSION['User']);
$tendatabase = $_GET['tendatabase'];
$trangthai = $_GET['trangthai'];
mysqli_close($cnn);
if($_SESSION['Level']=='1' || $_SESSION['Level']=='2'){
	$cnn = mysqli_connect($mysql_host, $mysql_username, $mysql_password);
	$dbname = "dulieuchung";
	mysqli_select_db($cnn,$dbname);
	$filterQuery = " and tendatabase='{$tendatabase}'";
	$sql = "select count(*) as dem from danhsach_congty_trinhky_{$noiluu_phanmem} where 0=0 $filterQuery order by niendo DESC";
	$query = mysqli_query($cnn,$sql);
	$data = mysqli_fetch_assoc($query);
	if($trangthai=='TL'){
		$testtrangthai = $_SESSION['User'].":TRẢ LẠI &nbsp;&nbsp;";
	}else if($trangthai=='DD'){
		$testtrangthai = $_SESSION['User'].":ĐÃ DUYỆT";
	}else if($trangthai=='TN'){
		$testtrangthai = $_SESSION['User'].":TẠM NỘP&nbsp;";
	}
	if($data['dem']<=0){
		$sqlin = " UPDATE danhsach_congty_trinhky_{$noiluu_phanmem} SET trangthai = '{$trangthai}',log = CONCAT('{$testtrangthai} - ".date('H:i:s d/m/Y')."<br/>',log),ngaytrinhduyet='".date('Y-m-d H:i:s')."' WHERE tendatabase = '{$tendatabase}';";
	}else{
		$sqlin = " UPDATE danhsach_congty_trinhky_{$noiluu_phanmem} SET trangthai = '{$trangthai}',log = CONCAT('{$testtrangthai} - ".date('H:i:s d/m/Y')."<br/>',log),ngaytrinhduyet='".date('Y-m-d H:i:s')."'  WHERE tendatabase = '{$tendatabase}';";

	}
	$query = mysqli_query($cnn,$sqlin);
	echo 1;
}else{
	echo 0;
}
?>