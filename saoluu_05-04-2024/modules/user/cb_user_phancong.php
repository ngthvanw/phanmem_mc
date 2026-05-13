<?php
include("../../config.php");
$pathname = "datafile/"; // đường dẫn chứa data của công ty
function load_User($dir)
{
    $fp = @fopen($dir . '/user.db', "r");
    while (!feof($fp)) {
        $string_user = explode(":", fgets($fp));
        if(trim($string_user[0])!="" && trim($string_user[6])==1) {
            $array_user[] = array($string_user[0]=>strtoupper($string_user[0]));
        }
    }
    return $array_user;
}
if($_SESSION['Level']==1 ||$_SESSION['Level']==2 ){
    $data = load_User($driver . "/datafile");
}else if($_SESSION['ThongKe']==1){
    $data = array(array($_SESSION['User']=>strtoupper($_SESSION['User'])));
}
echo json_encode($data) ;
?>