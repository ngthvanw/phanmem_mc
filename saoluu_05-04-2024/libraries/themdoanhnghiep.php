<?php
require("config.php");
$pathname = "datafile/"; // đường dẫn chứa data của công ty
$dir = $driver."/datafile/";

if(!isset($_SESSION['User'])){
    session_destroy();
    redirect("login.php");
}else{
    if($_SESSION['URI']!=$URI){
        session_destroy();
        redirect("login.php");
    }
}

function load_Phanquyen($dir){// Lấy danh sách phân quyền hiện tại
    $fp = @fopen($dir.'/phanquyen.db', "r");
    while(!feof($fp)){
        $string_user =  fgets($fp);
    }
    return json_decode($string_user,true);
}

if(isset($_POST['submit'])){
    $MaSoThue = trim($_POST['MaSoThue']);
    $TenCongTy = trim($_POST['TenCongTy']);
    $DiaChi = trim($_POST['DiaChi']);
    $khongtontai=0;
    if ($handle = opendir($dir)) {
        while ($entry = readdir($handle)) {
            if (is_dir($dir."/".$entry) && $entry!="." && $entry!=".." ) {
                if($entry==$MaSoThue){
                    $khongtontai=1;
                }
            }
        }
        closedir($handle);
    }
    if($MaSoThue && $TenCongTy&&$DiaChi){ 
        if($khongtontai==0){
            $phanquyen = load_Phanquyen($dir);
            $phanquyen[$_SESSION['User']];
            if(is_array($phanquyen[$_SESSION['User']])){// là mảng
                array_push($phanquyen[$_SESSION['User']],$MaSoThue);
            }else{
                $phanquyen[$_SESSION['User']]=array($MaSoThue);
            }

            $str=$MaSoThue.":".$TenCongTy.":".$DiaChi;        
            $congty = mahoa2chieu($str);
            mkdir( $pathname.$MaSoThue); // tạo thư mục data theo mã số thuế doanh nghiệp

            $fp1 = @fopen($pathname."/"."$MaSoThue"."/".'info.db', "w");
            $fp2 = @fopen($dir.'phanquyen.db', "w");

            fwrite($fp1,$congty);

            fwrite($fp2,(json_encode($phanquyen)));

            echo "<script>alert('Thêm thông tin thành công');</script>";
            fclose($fp1);
        }else{
            echo "<script>alert('Mã số thuế đã tồn tại ! vui lòng nhập lại !');</script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
		<meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/> 
        <link rel="shortcut icon" type="image/x-icon" href="icon/favicon.ico"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/> 
        <title>ĐĂNG NHẬP PHẦN MỀM</title>
        <meta name="description" content="Custom Login Form Styling with CSS3" />
        <meta name="keywords" content="css3, login, form, custom, input, submit, button, html5, placeholder" />
        <meta name="author" content="Codrops" /> 
        <link rel="stylesheet" type="text/css" href="login/css/style.css" />
        
        <!--[if lte IE 7]><style>.main{display:none;} .support-note .note-ie{display:block;}</style><![endif]-->
		<style>
			body {
				background: #e1c192 url(login/images/wood_pattern.jpg);
			}
		</style>
    </head>
    <body>
        <div class="container">
			<section class="main">
				<form class="form-2" action="#" onsubmit="checkknull()" method="post">
					<h1 style="text-align: center;"><span class="log-in">THÊM THÔNG TIN DOANH NGHIỆP</span></h1>
					<p class="float">
						<label for="login"><i class="icon-user"></i>Mã số thuế</label>
						<input type="text" required pattern="[0-9]{8,15}" id="MaSoThue" name="MaSoThue" placeholder="Mã số thuế"/>
					</p>
					<p class="float">
						<label for="login"><i class="icon-user"></i>Tên công ty</label>
						<input type="text" required id="TenCongTy" name="TenCongTy" placeholder="Tên công ty"/>
					</p>
                    <p class="float" style="width: 100% !important;">
						<label for="MaSoThue"><i class="icon-lock"></i>Địa Chỉ</label>
						<input type="text" required id="DiaChi" name="DiaChi" required="" placeholder="Địa chỉ"/>
					</p>
					<p class="clearfix">   
						<input style="text-align: center;"  type="submit" name="submit" value="Thêm Mới"/>
                        <a href="login.php" class="log-twitter">Đăng nhập</a>
					</p>
				</form>​​
			</section>
			
        </div>
		<!-- jQuery if needed -->
        <script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript">
			$(function(){
			 function checkknull(){
                    if($("#MaSoThue").val()==""){
                        alert("Vui lòng nhập mã số thuế ");
                        $("#MaSoThue").focus();
                        return false;
                    }
                    if($("#TenCongTy").val()==""){
                        alert("Vui lòng nhập mã số thuế ");
                        $("#TenCongTy").focus();
                        return false;
                    }
                    if($("#DiaChi").val()==""){
                        alert("Vui lòng nhập mã số thuế ");
                        $("#DiaChi").focus();
                        return false;
                    }
                    return true;
                }
			});
            $("#MaSoThue").keyup(function(){
                masothue = $("#MaSoThue").val();
                		$.ajax({
                    	url: "modules/doannghiep/checkkey.php",
            			type: "GET",
			            data:  {id: masothue},
            			success: function(data)
            		    {
            			  if(data==1){
                            alert("Mã số thuế đã tồn tại ");
                            $("#MaSoThue").focus();
                        }
            		    }
            });
            });
		</script>
    </body>
</html>