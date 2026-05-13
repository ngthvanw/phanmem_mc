<?php
   include("../../config.php");
$TenDangNhap = $_GET['tendangnhap'];
$sott = $_GET['sott'];
function load_User($dir){
    $fp = @fopen($dir.'/user.db', "r");
    while(!feof($fp)){
        $string_user[] =  explode(":",fgets($fp));
    }
    return $string_user;
}

$data_arr = load_User($driver."/datafile");
$i=0;
$tontai = FALSE;
foreach ($data_arr as $item){
    if($item[0]=="$TenDangNhap" && $item[4]!=$sott){
        $tontai = TRUE;
    }

}
   if($tontai==TRUE){
    echo 1;
   }
?>