<?php
    session_start();
    ini_set('max_execution_time', 300);
	require("../../config.php");
    $MST = $_SESSION['MST'];
    $dir = $driver."/datafile/".$MST."/";
        $NienDo = trim($_GET['niendo']);
        $MacDinh = trim($_GET['macdinh']);
        $khongtontai=0;
        if ($handle = opendir($dir)) {
            while ($entry = readdir($handle)) {
                if (is_dir($dir."/".$entry) && $entry!="." && $entry!=".." ) {
                    if($entry==$NienDo){
                        $khongtontai=1;
                    }
                }
            }
            closedir($handle);
        }
        if($NienDo!=""){ 
            if($MacDinh!="on"){
            if($khongtontai==0){
                echo "Niên độ không tồn tại . Vui lòng nhập lại .";
                fclose($fp1);
            }else{
                $_SESSION['NienDo'] = $NienDo;
                $dbname = $_SESSION['MST']."_".$NienDo;
                //redirect($URI);
            }
            }else{
                mkdir($dir."/$NienDo");
            // Khai Báo tên c?a file sao luu du?c d? trên h? thông ho?c b?n c?a th? phát tri?n ch?c  nang ch?n tr?c ti?p...
                $filename = $driver.'/khac/datafile.rar';
                $dbname = $_SESSION['MST']."_".$NienDo;
                $mysql_host = $HOST;
                $mysql_username = $USER_DB;
                // MySQL password
                $mysql_password = $PAS_DB;
                
                //////////////////////////////////////////////////////////////////////////////////////////////
                
                // Connect to MySQL server
                $cnn = mysql_connect($mysql_host, $mysql_username, $mysql_password);
                // Select database
                $sql = "CREATE DATABASE ".$dbname." DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci";
                mysql_query($sql,$cnn);
                
                // Database name
                $mysql_database = $dbname;
                mysql_select_db($mysql_database,$cnn);
                
                mysql_query("SET NAMES 'UTF-8'",$cnn);
                // Temporary variable, used to store current query
                $templine = '';
                // Read in entire file
                $fp = fopen($filename, "r");  
                 
                if (!$fp) {
                   
                }
                else{
                    while(!feof($fp)){
                            $str.= fgetc($fp);
                    }
                }
                $lines = explode(";",$str);
                foreach ($lines as $line){
                    mysql_query($line,$cnn);
                }
            $_SESSION['NienDo'] = $NienDo;
            //redirect($URI);
        }
        }
?>