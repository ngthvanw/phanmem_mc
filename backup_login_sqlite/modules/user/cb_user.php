<?php
include("../../config.php");

$pathname = "datafile/"; // đường dẫn chứa data của công ty

function load_User($dir)
{
    $fp = @fopen($dir . '/user.db', "r");
    while (!feof($fp)) {
        $string_user = explode(":", fgets($fp));
        if(trim($string_user[0])!="") {
            $array_user[] = array($string_user[0]=>$string_user[0]);
        }
    }
    return $array_user;
}
$data = load_User($driver . "/datafile");
echo json_encode($data) ;
?>