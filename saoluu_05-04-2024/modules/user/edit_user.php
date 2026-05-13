<?php
include("../../config.php");
function load_User($dir){
    $fp = @fopen($dir.'/user.db', "r");
    while(!feof($fp)){
        $string_user[] =  explode(":",fgets($fp));
    }
    return $string_user;
}    // Hàm load danh sách các user
$TenDangNhap = $_GET['tendangnhap'];
$MatKhau = $_GET['matkhau'];
$level = $_GET['level'];
$themdn = $_GET['themdn'];
if($themdn==""){
    $themdn=0;
}
$thongke = $_GET['thongke'];
if($thongke==""){
    $thongke=0;
}
$khoadulieu = $_GET['khoadulieu'];
$sott = $_GET['sott'];
$doanhnghiepquanly = $_GET['doanhnghiepquanly'];
$doanhnghiepquanly_arr = explode(";",$doanhnghiepquanly);
$demmatkhau = strlen($MatKhau);
$makhaumahoa = "";
if($demmatkhau==32){
    $makhaumahoa = $MatKhau;
}else{
    $makhaumahoa =  mahoamotchieu($MatKhau);
}

$ListUser = load_User($driver."/datafile");

function load_Phanquyen($dir)
{// Lấy danh sách phân quyền hiện tại
    $fp = @fopen($dir . '/phanquyen.db', "r");
    while (!feof($fp)) {
        $string_user = fgets($fp);
    }
    return json_decode($string_user, true);
}
$data_quyen_arr = load_Phanquyen($driver."/datafile");

$data_quyen_arr[$TenDangNhap] = $doanhnghiepquanly_arr;

$string_user="";
foreach($ListUser as $ItemUser){
    if(trim($ItemUser[0])===trim($TenDangNhap)){// Nếu cập nhật lại User thì bỏ qua

    }else{
        if(trim($ItemUser[0])!="") {
            $tdn = str_replace("\n",0,substr($ItemUser[5],0,1));
            if($tdn==""){
                $tdn = 0;
            }
            $tk = str_replace("\n",0,substr($ItemUser[6],0,1));
            if($tk==""){
                $tk = 0;
            }
            $string_user .= $ItemUser[0] . ":" . $ItemUser[1] . ":" . $ItemUser[2] . ":" . $ItemUser[3] . ":".trim($ItemUser[4]).":" . $tdn.":". $tk."\n";
        }
    }
}
$dir = $driver."/datafile/";
$fp = @fopen($dir.'user.db',"w");
$string_user.=$TenDangNhap.":".$makhaumahoa.":".$level.":".$khoadulieu.":".trim($sott).":".$themdn.":".$thongke;
fwrite($fp,$string_user);
fclose($fp);

$fp2 = @fopen($driver . "/datafile/".'phanquyen.db', "w");;
fwrite($fp2,(json_encode($data_quyen_arr)));
fclose($fp2);

?>