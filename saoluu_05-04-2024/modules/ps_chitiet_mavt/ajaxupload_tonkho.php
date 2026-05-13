<?php
require("../../config.php");
$valid_extensions = array('sql'); // valid extensions
if(isset($_FILES['file']))
{
    $tmp = $_FILES['file']['tmp_name'];// Lấy nội dung file tạm
    $templine = '';
    $fp = fopen($tmp,"r");
    $str="";
    while(!feof($fp))
    {
            $str.= fgetc($fp);
    }
}

$_SESSION['DataPhucHoi']=$str;
require '../../phpexcel/SimpleXLSX.php';
try{
    if ( $xlsx = SimpleXLSX::parse($tmp) ) {
        $_SESSION['DataExcel'] = $xlsx->rows();
    }
}catch (Exception $e){}

?>