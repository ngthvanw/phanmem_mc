<?php
include("../../config.php");
$OBJ = new mavattu;
$sub = rand(10,99);
$sott = trim(trim($_SESSION['UserID']).time()).$sub;
$tendoanhnghiep= check_data($_GET['tendoanhnghiep']);
$masothue= check_data($_GET['masothue']);
$tendangnhap= check_data($_GET['tendangnhap']);
$ghichu= check_data($_GET['ghichu']);
$phidichvu= check_data($_GET['phidichvu']);
$nam= check_data($_GET['nam']);
$thang1= check_data($_GET['thang1']);
$thang2= check_data($_GET['thang2']);
$thang3= check_data($_GET['thang3']);
$thang4= check_data($_GET['thang4']);
$thang5= check_data($_GET['thang5']);
$thang6= check_data($_GET['thang6']);
$thang7= check_data($_GET['thang7']);
$thang8= check_data($_GET['thang8']);
$thang9= check_data($_GET['thang9']);
$thang10= check_data($_GET['thang10']);
$thang11= check_data($_GET['thang11']);
$thang12= check_data($_GET['thang12']);
$sql = "INSERT INTO dulieuchung.`phancongkhaithue_{$noiluu_phanmem}`(`sott`, `tendoanhnghiep`, `thang1`, `thang2`, `thang3`, `thang4`, `thang5`, `thang6`, `thang7`, `thang8`, `thang9`, `thang10`, `thang11`, `thang12`, `phidichvu`, `ghichu`, `tendangnhap`, `masothue`,nam) VALUES ('".$sott."','".$tendoanhnghiep."','".$thang1."','".$thang2."','".$thang3."','".$thang4."','".$thang5."','".$thang6."','".$thang7."','".$thang8."','".$thang9."','".$thang10."','".$thang11."','".$thang12."','".$phidichvu."','".$ghichu."','".$tendangnhap."','".$masothue."','".$nam."')";
$OBJ->re_query($sql);
echo "{\"recId\": \"" . $sott . "\"}";
?>