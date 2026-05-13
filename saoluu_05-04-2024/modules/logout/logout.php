<?php
include("../../config.php");

$dir = $driver."/datafile/".$_SESSION["MST"]."/".$_SESSION["NienDo"]."/"; // Đường dẫn lưu file csdl
if($_SESSION["MST"]!="" && $_SESSION["NienDo"]!="") {
    $backup_response = backup_Database($_SESSION['HOST'], $_SESSION['USER_DB'], $_SESSION['PASS_DB'], $_SESSION['TIENTO'] . $_SESSION["MST"] . "_" . $_SESSION["NienDo"], $dir);
}
$mysql_host = $_SESSION['HOST'];
$mysql_username = $_SESSION['USER_DB'];
// MySQL password
$mysql_password = $_SESSION['PASS_DB'];
$cnn = mysql_connect($mysql_host, $mysql_username, $mysql_password);
$dbname = "phpmyadmin";
mysql_select_db($dbname, $cnn);
$session_id = session_id();
$time = time();
$ngayxuat = date("Y-m-d",$time);
$gioxuat = date("H:i:s",$time);

$sql_in = "update logfile_user_{$noiluu_phanmem} set ngayxuat='".$ngayxuat."',gioxuat='".$gioxuat."' where session_id='".$session_id."'";
mysql_query($sql_in,$cnn);
mysql_close($cnn);

function del_file($dir)
{
    $mydir = opendir($dir);
    $s2 = date("d/m/y H:i:s");
    $filelist = array();
    if ($handle = opendir($dir)) {
        while ($entry = readdir($handle)) {
            $lastModifiedTime = filemtime($dir.$entry);
            $currentTime = time();
            $timeDiff = abs($currentTime - $lastModifiedTime)/(60*60); //giờ

            if($entry!="." and $entry!=".." and $timeDiff > 48) { //kiểm tra nếu file được thay đổi trước 10h
                unlink($dir.$entry); //Xóa file
            }
        }
        closedir($handle);
    }
}
if($_SESSION["MST"]!="" && $_SESSION["NienDo"]!=""){
	del_file((str_replace("\\","/",$dir)));
}

session_destroy();// Hủy bỏ toàn bộ session của người dùng

redirect("login.php");
function backup_Database($hostName,$userName,$password,$DbName,$dir,$tables = '*')
{

  // CONNECT TO THE DATABASE
  $con = mysql_connect($hostName,$userName,$password);
  mysql_select_db($DbName,$con);
  mysql_query("SET NAMES 'utf-8'",$con);


  // GET ALL TABLES
  if($tables == '*')
  {
    $tables = array();
    $result = mysql_query('SHOW TABLES');
    while($row = mysql_fetch_row($result))
    {
      $tables[] = $row[0];
    }
  }
  else
  {
    $tables = is_array($tables) ? $tables : explode(',',$tables);
  }

    $data = 'SET FOREIGN_KEY_CHECKS=0;' . "\r\n";
    $data.= 'SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";' . "\r\n";
    $data.= 'SET AUTOCOMMIT=0;' . "\r\n";
    $data.= 'START TRANSACTION;' . "\r\n";


  foreach($tables as $table)
  {
    $result = mysql_query('SELECT * FROM '.$table);
    $num_fields = mysql_num_fields($result);

    $data.= 'DROP TABLE IF EXISTS '.$table.';';
    $row2 = mysql_fetch_row(mysql_query('SHOW CREATE TABLE '.$table));
    $data.= "\n\n".$row2[1].";\n\n";

    for ($i = 0; $i<$num_fields; $i++)
    {
      while($row = mysql_fetch_row($result))
      {
        $data.= 'INSERT INTO '.$table.' VALUES(';
        for($x=0; $x<$num_fields; $x++)
        {
          $row[$x] = addslashes($row[$x]);
		  $row[$x] = clean($row[$x]); // CLEAN QUERIES
          if (isset($row[$x])) {
		  	$data.= '"'.$row[$x].'"' ;
		  } else {
		  	$data.= '""';
		  }

          if ($x<($num_fields-1)) {
		  	$data.= ',';
		  }
        }  // end of the for loop 2
        $data.= ");\n";
      } // end of the while loop
    } // end of the for loop 1

    $data.="\n\n\n";
  }  // end of the foreach*/

    $data.= 'SET FOREIGN_KEY_CHECKS=1;' . "\r\n";
	$data.= 'COMMIT;';

  //SAVE THE BACKUP AS SQL FILE
    $filename= date("d_m_Y_H_i_s")."_datafile.rar";
  $handle = fopen($dir.$filename,'w');
  fwrite($handle,$data);
  fclose($handle);

   if($data)
   		return true;
   else
		return false;
 }  // end of the function


//  CLEAN THE QUERIES
function clean($str) {
	if(@isset($str)){
		$str = @trim($str);
		if(get_magic_quotes_gpc()) {
			$str = stripslashes($str);
		}
		return mysql_real_escape_string($str);
	}
	else{
		return 'NULL';
	}
}