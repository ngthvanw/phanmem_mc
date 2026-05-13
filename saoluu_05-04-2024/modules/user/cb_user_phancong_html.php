<?php
include("../../config.php");
$pathname = "datafile/"; // đường dẫn chứa data của công ty
function load_User($dir)
{
    $array_user="<option value='ALL'>--- Tất cả ---</option>";
    $fp = @fopen($dir . '/user.db', "r");
    while (!feof($fp)) {
        $string_user = explode(":", fgets($fp));
        if(trim($string_user[0])!="" && trim($string_user[6])==1) {
            $array_user.= "<option value='".$string_user[0]."'>".strtoupper($string_user[0])."</option>";
        }
    }
    return $array_user;
}
$data = load_User($driver . "/datafile");
echo ($data) ;
?>