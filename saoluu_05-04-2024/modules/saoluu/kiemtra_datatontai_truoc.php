<?php
session_start();
require("../../config.php");
$MST = $_SESSION['MST'];
$dir = $driver . "/datafile/" . $MST . "/";
$NienDo = $_SESSION['NienDo'] -1;
$khongtontai = 0;
if ($handle = opendir($dir)) {
    while ($entry = readdir($handle)) {
        if (is_dir($dir . "/" . $entry) && $entry != "." && $entry != "..") {
            if ($entry == $NienDo) {
                $khongtontai = 1;
            }
        }
    }
    closedir($handle);
}
echo $khongtontai;
?>