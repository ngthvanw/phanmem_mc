<?php
session_start();
ini_set('max_execution_time', 0);
require("../../config.php");
$OBJBK = new backup;
$noidung = $_GET['noidung'];
function backup_Database($hostName,$userName,$password,$DbName,$driver,$filename,$tables = '*')
{

    $luu = $driver."\\backup\\".$_SESSION['MST']."_".$_SESSION['NienDo']."\\".$filename.".rar";
    $database = $DbName;
    $user = $userName;
    $pass = $password;
    $host = $hostName;
    $dir = substr(dirname(__FILE__),0,9);

    exec($dir."mysql\bin\mysqldump.exe --user={$user} --password={$pass} --host={$host} {$database} --compress=TRUE --default-character-set=utf8 --skip-triggers --result-file={$luu} 2>&1", $output);

}  // end of the function

$MST = $_SESSION['MST'];
$TenDN = $_SESSION['TenCongTy'];
$DBNamme = $_SESSION['MST']."_".$_SESSION['NienDo'];
// CALL TO THE FUNCTION
$date_time = date('Y-m-d h:i:s');
$date_time_file = str_replace(" ","-",$date_time);
$date_time_file = str_replace(":","-",$date_time_file);
$filename = $DBNamme."_".$date_time_file;
$backup_response = backup_Database($_SESSION['HOST'],$_SESSION['USER_DB'],$_SESSION['PASS_DB'],$_SESSION['TIENTO'].$_SESSION['MST']."_".$_SESSION['NienDo'],$driver,$filename);
//xattr_set($driver."/backup/".$_SESSION['MST']."_".$_SESSION['NienDo']."/".$filename.'.rar', 'Artist', $noidung);
if($backup_response[0]=="") {
    echo 'Sao lưu dữ liệu đã được tạo thành công !<br/>Nhấn phím <strong style="color:blue;">[Y]</strong> để thoát .';
}
else {
    echo 'Xảy ra lỗi khi tạo sao lưu dữ liệu !<br/>Nhấn phím <strong style="color:blue;">[Y]</strong> để thoát .';
}

?>