<?php
session_start();
ini_set('max_execution_time', 300);
require("../../config.php");
function backup_Database($hostName,$userName,$password,$DbName,$driver,$filename,$tables = '*')
{
  
  // CONNECT TO THE DATABASE
  $con = mysql_connect($hostName,$userName,$password) or die(mysql_error());
  mysql_select_db($DbName,$con) or die(mysql_error());
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
  
  $return = 'SET FOREIGN_KEY_CHECKS=0;' . "\r\n";
  $return.= 'SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";' . "\r\n";
  $return.= 'SET AUTOCOMMIT=0;' . "\r\n";
  $return.= 'START TRANSACTION;' . "\r\n";
  
  
  foreach($tables as $table)
  {
    $result = mysql_query('SELECT * FROM '.$table) or die(mysql_error());
    $num_fields = mysql_num_fields($result) or die(mysql_error());
    
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
  
    $return .= 'SET FOREIGN_KEY_CHECKS=1;' . "\r\n";
	$return.= 'COMMIT;';
  
  //SAVE THE BACKUP AS SQL FILE
  if (is_dir($driver."/backup/".$_SESSION['MST']."_".$_SESSION['NienDo']."/")) {
  
  }else{
    mkdir($driver."/backup/".$_SESSION['MST']."_".$_SESSION['NienDo']."/");
  }
  $handle = fopen($driver."/backup/".$_SESSION['MST']."_".$_SESSION['NienDo']."/".$filename.'.rar','w+');
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
 
 $MST = $_SESSION['MST'];
 $TenDN = $_SESSION['TenCongTy'];
 $DBNamme = $_SESSION['MST']."_".$_SESSION['NienDo'];
 // CALL TO THE FUNCTION
 $date_time = date('Y-m-d h:i:s');
 $date_time_file = str_replace(" ","-",$date_time);
 $date_time_file = str_replace(":","-",$date_time_file);
 $filename = $DBNamme."_".$date_time_file;
 $backup_response = backup_Database($_SESSION['HOST'],$_SESSION['USER_DB'],$_SESSION['PASS_DB'],$_SESSION['TIENTO'].$_SESSION['MST']."_".$_SESSION['NienDo'],$driver,$filename);
  if($backup_response) {
    $sql = "insert into saoluu (mst,tendn,tenfile,ngayluu) value('".$MST."','".$TenDN."','".$filename.".rar','".$date_time."')";
    database::re_query($sql);
	echo 'Sao lưu dữ liệu đã được tạo thành công !<br/>Nhấn phím <strong style="color:blue;">[Y]</strong> để thoát .';  
  }
  else {
	echo 'Xảy ra lỗi khi tạo sao lưu dữ liệu !<br/>Nhấn phím <strong style="color:blue;">[Y]</strong> để thoát .';    
  }

?>