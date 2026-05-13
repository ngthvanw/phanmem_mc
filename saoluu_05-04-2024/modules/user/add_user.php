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
$thongke = $_GET['thongke'];
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
$max = 0;
foreach($ListUser as $ItemUser){
    if(trim($ItemUser[0])==trim($TenDangNhap)){// Nếu cập nhật lại User thì bỏ qua
    }else{
        if(trim($ItemUser[0])!="")
            $string_user.=$ItemUser[0].":".$ItemUser[1].":".$ItemUser[2].":".$ItemUser[3].":".$ItemUser[4].":".$ItemUser[5].":".$ItemUser[6]."\n";
    }
    if ($max < $ItemUser[4]) {
        $max = $ItemUser[4];
    }
}
$sott = $max+1;
$dir = $driver."/datafile/";
$fp = @fopen($dir.'user.db',"w");
$string_user.=$TenDangNhap.":".$makhaumahoa.":".$level.":".$khoadulieu.":".$sott.":".$themdn.":".$thongke;
fwrite($fp,$string_user);
fclose($fp);

$fp2 = @fopen($driver . "/datafile/".'phanquyen.db', "w");;
fwrite($fp2,(json_encode($data_quyen_arr)));
fclose($fp2);

echo "{\"recId\": \"" . ($sott) . "\"}";
?>