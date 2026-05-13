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
$tendatabase = "{$tiento}{$mst}_{$niendo}";
$luuy = $_GET['luuy'];

$cnn = mysqli_connect($mysql_host, $mysql_username, $mysql_password);
$dbname = "dulieuchung";
mysqli_select_db($cnn,$dbname);

$filterQuery = " and tendatabase='{$tendatabase}'";

$sql = "select count(*) as dem from danhsach_congty_trinhky_{$noiluu_phanmem} where 0=0 $filterQuery order by niendo DESC";
$query = mysqli_query($cnn,$sql);
$data = mysqli_fetch_assoc($query);
$testtrangthai = "TRÌNH KÝ &nbsp;";
if($data['dem']<=0){
    $sqlin = " insert into danhsach_congty_trinhky_{$noiluu_phanmem}(masothue,tencongty,trangthai,nguoigui,tendatabase,niendo,log,ghichu) VALUE ('{$mst}','{$tencongty}','CD','{$tendangnhap}','{$tendatabase}','{$niendo}','{$testtrangthai} - ".date('H:i:s d/m/Y')."<br/>','{$luuy}')";
}else{
    if($luuy==""){
        $sqlin = " UPDATE danhsach_congty_trinhky_{$noiluu_phanmem} SET masothue = '{$mst}',tencongty = '{$tencongty}',trangthai = 'CD',nguoigui = '{$tendangnhap}',niendo = '{$niendo}',log = CONCAT('{$testtrangthai} - ".date('H:i:s d/m/Y')."<br/>',log),ngaytrinhduyet='".date('Y-m-d H:i:s')."'  WHERE tendatabase = '{$tendatabase}';";
    }else{
        $sqlin = " UPDATE danhsach_congty_trinhky_{$noiluu_phanmem} SET masothue = '{$mst}',tencongty = '{$tencongty}',trangthai = 'CD',nguoigui = '{$tendangnhap}',niendo = '{$niendo}',log = CONCAT('{$testtrangthai} - ".date('H:i:s d/m/Y')."<br/>',log),ngaytrinhduyet='".date('Y-m-d H:i:s')."',ghichu='{$luuy}'  WHERE tendatabase = '{$tendatabase}';";
    }
}
$query = mysqli_query($cnn,$sqlin);

mysqli_close($cnn);
?>