<?php
include("../../config.php");
$TenDangNhap = $_GET['tendangnhap'];
$sott = $_GET['sott'];
function load_User($dir)
{
    $fp = @fopen($dir . '/user.db', "r");
    while (!feof($fp)) {
        $string_user[] = explode(":", fgets($fp));
    }
    return $string_user;
}

$data_arr = load_User($driver . "/datafile");
$max = 0;
foreach ($data_arr as $item) {
    if ($max < $item[4]) {
        $max = $item[4];
    }
}
echo $max;
?>