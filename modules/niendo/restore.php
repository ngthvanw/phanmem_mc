<?php
// Khai Báo tên c?a file sao luu du?c d? trên h? thông ho?c b?n c?a th? phát tri?n ch?c  nang ch?n tr?c ti?p...
$filename = 'data.sql';
// MySQL host
$mysql_host = 'localhost';
// MySQL username
$mysql_username = 'root';
// MySQL password
$mysql_password = '';
// Database name
$mysql_database = 'phanmemketoan';

//////////////////////////////////////////////////////////////////////////////////////////////

// Connect to MySQL server
$cnn = mysql_connect($mysql_host, $mysql_username, $mysql_password) or die('Error connecting to MySQL server: ' . mysql_error());
// Select database
mysql_select_db($mysql_database,$cnn) or die('Error selecting MySQL database: ' . mysql_error());

mysql_query("SET NAMES 'UTF-8'",$cnn);
// Temporary variable, used to store current query
$templine = '';
// Read in entire file
$fp = fopen($filename, "r");  
 
if (!$fp) {
    echo 'Cant open file';
}
else{
    // L?p qua t?ng dòng d? d?c
    while(!feof($fp)){
        //if(fgetc($fp)!="")
            $str.= fgetc($fp);
    }
}
$lines = explode(";",$str);
//$lines = file($filename);
// Loop through each line
foreach ($lines as $line){
    mysql_query($line,$cnn) or print('Error performing query \'<strong>' . $templine . '\': ' . mysql_error() . '<br /><br />');
}

?>