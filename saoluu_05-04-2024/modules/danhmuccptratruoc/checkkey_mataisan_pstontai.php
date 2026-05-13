<?php
   include("../../config.php");
   $Ma = $_GET['ma'];
   $SoTT = $_GET['sott'];
   $Loai = $_GET['loai'];
   $OBJ = new danhmuccptratruoc();
   $sql = "select mapsts,tanggiam,matk from pscptt where mats='".$Ma."' and (mapsts!='".$SoTT."' or tanggiam!='".$Loai."')";
   $res = $OBJ->re_query($sql);
   $count = 0;
   $str_sott="";
   $str_tanggiam="";
   $arr_tanggiam = array(0=>" đầu kỳ ",1=>" tăng trong kỳ ",2=>" giảm trong kỳ ");
   while($data = $OBJ->re_fetch($res)){
	   $count++;
	   $str_sott.=$data['mapsts']."-";
	   $str_tanggiam.=$arr_tanggiam[$data['tanggiam']]."-";
	   
   }
   if($count!=0){
        echo "Mã này đã tồn tại phiếu".substr($str_tanggiam,0,-1)." ở số thứ tự thứ ",substr($str_sott,0,-1)."! Vui lòng tạo mã khác để phân bổ CP.";
   }
?>