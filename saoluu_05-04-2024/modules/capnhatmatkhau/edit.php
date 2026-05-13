<?php
   include("../../config.php");
   
   function load_User($dir){
        $fp = @fopen($dir.'/user.db', "r");
         while(!feof($fp)){
            $string_user[] =  explode(":",fgets($fp));
         }
         return $string_user;
    }    // Hàm load danh sách các user
   $TenDangNhap = $_GET['user'];
   $MatKhau = $_GET['pass'];
    $ListUser = load_User($driver."/datafile");   
    $string_user="";    
     foreach($ListUser as $ItemUser){
        if(trim($ItemUser[0])==trim($TenDangNhap)){
        }else{
            if(trim($ItemUser[0])!="") {
                $tdn = str_replace("\n",0,substr($ItemUser[5],0,1));
                if($tdn==""){
                    $tdn = 0;
                }
                $tk = str_replace("\n",0,substr($ItemUser[6],0,1));
                if($tk==""){
                    $tk = 0;
                }
                $string_user .= $ItemUser[0] . ":" . $ItemUser[1] . ":" . $ItemUser[2] . ":" . $ItemUser[3] . ":" . $ItemUser[4] . ":" . $tdn . ":" . $tk . "\n";
            }
        }
     }
    $_SESSION['YeuCauDoiMK'] = 0;
   $dir = $driver."/datafile/";
   $fp = @fopen($dir.'user.db',"w");
   $string_user.=$TenDangNhap.":".mahoamotchieu($MatKhau).":".$_SESSION['Level'].":".$_SESSION['KhoaDL'].":".$_SESSION['UserID'].":".$_SESSION['ThemDN'].":".$_SESSION['ThongKe'];
   fwrite($fp,$string_user);
   fclose($fp);
?>