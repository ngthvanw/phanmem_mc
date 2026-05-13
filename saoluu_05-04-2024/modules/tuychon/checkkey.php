<?php
   include("../../config.php");
   function load_User($dir){
        $fp = @fopen($dir.'/user.db', "r");
         while(!feof($fp)){
            $string_user[] =  explode(":",fgets($fp));
         }
         return $string_user;
    }    
   $TenDangNhap = $_POST['user'];
   $MatKhau = $_POST['pass'];
   
    $ListUser = load_User($driver."/datafile");       
     foreach($ListUser as $ItemUser){
        if(trim($ItemUser[0])==trim($TenDangNhap)){
            $user = $ItemUser[0];
            $pass = $ItemUser[1];
        }
     }
     if(trim($TenDangNhap)==trim($user) && trim(mahoamotchieu($MatKhau))==trim($pass)){
        echo 1;
     }else{
        echo 0;
     }
?>