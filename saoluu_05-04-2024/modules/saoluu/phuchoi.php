<?php
session_start();
ini_set('max_execution_time', 0);

require("../../config.php");

$filename = $_GET['filename'];

$luu = $driver."\\backup\\".$_SESSION['MST']."_".$_SESSION['NienDo']."\\".$filename;
$database = $_SESSION['TIENTO'].$_SESSION['MST']."_".$_SESSION['NienDo'];
$user = $_SESSION['USER_DB'];
$pass = $_SESSION['PASS_DB'];
$host = $_SESSION['HOST'];
echo $dir = substr(dirname(__FILE__),0,9);

exec($dir."mysql\bin\mysql.exe --user={$user} --password={$pass} --host={$host} --default-character-set=utf8 --comments --database={$database}<$luu ", $output);
debug($output);
echo "Phục hồi dữ liệu thành công ";

?>