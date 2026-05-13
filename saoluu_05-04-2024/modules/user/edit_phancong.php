<?php
include("../../config.php");
$truongnhom = $_GET['truongnhom'];
$nguoiphutrach = $_GET['nguoiphutrach'];
$nguoiphutrachcu = $_GET['nguoiphutrachcu'];
$tendangnhap = $_GET['tendangnhap'];
$phidichvu = $_GET['phidichvu'];
$masothue = $_GET['masothue'];
$ghichu = $_GET['ghichu'];
$sott = $_GET['sott'];

$mysql_host = $_SESSION['HOST'];
$mysql_username = $_SESSION['USER_DB'];
// MySQL password
$mysql_password = $_SESSION['PASS_DB'];
$cnn = mysqli_connect($mysql_host, $mysql_username, $mysql_password);
$dbname = "phpmyadmin";
mysqli_select_db($cnn,$dbname);
mysqli_query($cnn,"update danhsach_phancong_{$noiluu_phanmem} set 
                                            truongnhom='{$truongnhom}',
                                            nguoiphutrach='{$nguoiphutrach}',
                                            tendangnhap='{$tendangnhap}',
                                            phidichvu='{$phidichvu}',
                                            ghichu='{$ghichu}'

                    where sott='{$sott}'");

echo "{\"result\": \"success\"}";

?>