<?php
$madoanhnghiep = $_GET["id"];
$khongtontai =0; // if là 0 thì key này chua có
include("../../config.php");
$dir = $driver."/datafile/";
if ($handle = opendir($dir)) {
    while ($entry = readdir($handle)) {
        if (is_dir($dir."/".$entry) && $entry!="." && $entry!=".." ) {
            if($entry==$madoanhnghiep){
                $khongtontai=1;
            }
        }
    }
closedir($handle);
}
echo $khongtontai;
?>