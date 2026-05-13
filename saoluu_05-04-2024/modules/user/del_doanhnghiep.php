<?php
include("../../config.php");
$OBJ = new phieukiemtra();

function delete_directory($dirname) {
    if (is_dir($dirname))
        $dir_handle = opendir($dirname);
    if (!$dir_handle)
        return false;
    while($file = readdir($dir_handle)) {
        if ($file != "." && $file != "..") {
            if (!is_dir($dirname."/".$file))
                unlink($dirname."/".$file);
            else
                delete_directory($dirname.'/'.$file);
        }
    }
    closedir($dir_handle);
    rmdir($dirname);
    return true;
}

$sott = $_GET['id'];
$masothue = $_GET['ma'];
$xoadulieu = $_GET['xoadulieu'];
$sql = "delete from phpmyadmin.danhsach_phancong_{$noiluu_phanmem} where sott='".$sott."'";
$OBJ->re_query($sql);

$dir = $driver."/datafile/".$masothue;
delete_directory($dir);
$tunam = "2016";
$dennam = date("Y");
if($xoadulieu==1){
    for ($nam=$tunam;$nam<=$dennam;$nam++) {
        $OBJ->re_query("DROP DATABASE ".$_SESSION['TIENTO'].$masothue."_".$nam);
    }
}
echo "{\"result\": \"success\"}";
?>