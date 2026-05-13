<?php
include("../../config.php");
function load_User($dir){
    $fp = @fopen($dir.'/user.db', "r");
    while(!feof($fp)){
        $string_user[] =  explode(":",fgets($fp));
    }
    return $string_user;
}    // Hàm load danh sách các user
$TenDangNhap = $_GET['ma'];
$sott = $_GET['sott'];

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
unset($data_quyen_arr[$TenDangNhap]);


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
fwrite($fp,$string_user);
fclose($fp);

$fp2 = @fopen($driver . "/datafile/".'phanquyen.db', "w");;
fwrite($fp2,(json_encode($data_quyen_arr)));
fclose($fp2);
?>