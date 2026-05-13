<?php
include("../../config.php");
   $file = $driver."/tmp/thuyetminhtaichinh.xls";
   echo $newfile = $driver."/datafile/".$_SESSION['MST']."/".$_SESSION['NienDo']."/thuyetminhtaichinh.xls";
   copy($file, $newfile);
?>