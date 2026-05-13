<?php
session_start();
unset($_SESSION['NienDo']);
unset($_SESSION['User']);
session_regenerate_id();
require("config.php");
$pathname = "datafile/"; // đường dẫn chứa data của công ty

function create_Token(){
    $rd = getcwd();
    $arr_root_source = explode("\\",$rd);
    $root_source = $arr_root_source[3];
    $_SESSION['TOKEN'] = $root_source;
}

function load_doanhnghiep($dir){
    $filelist = array();
    if ($handle = opendir($dir)) {
        while ($entry = readdir($handle)) {
            if (is_dir($dir."/".$entry) && $entry!="." && $entry!="..") {
                $filelist[] = $entry;
                $fp1 = @fopen($dir."/".$entry."/".'info.db', "r"); // đọc thông tin chung
                $string_info[]=explode(":",giaima2chieu(fgets($fp1)));
            }
        }
        closedir($handle);
    }
    return $string_info;
}

$arr_doanhnghiep = load_doanhnghiep($driver."/datafile");

if (isset($_POST['submit'])) {
    $MST = $_POST['MaSoThue'];
    foreach ($arr_doanhnghiep as $item) {
        if ($item[0] == $MST) {
            $TenCongTy = $item[1];
            $DiaChi = $item[2];
        }
    }

    $TenDangNhap = check_data($_POST['TenDangNhap']);
    $MatKhau = check_data($_POST['MatKhau']);

    // Kết nối đến SQLite
    try {
        $db = new PDO('sqlite:' . $driver . '/datafile/thongtinchung.db');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Lấy thông tin người dùng từ cơ sở dữ liệu
        $stmt = $db->prepare("SELECT * FROM users WHERE username = :username");
        $stmt->bindParam(':username', $TenDangNhap);
        $stmt->execute();
        $userData = $stmt->fetch(PDO::FETCH_ASSOC);

        // Xác thực người dùng
        if ($userData && trim(mahoamotchieu($MatKhau)) == trim($userData['password'])) {
            if ($_POST['mabaomat'] == $_SESSION['security_code']) {
                $_SESSION['User'] = $TenDangNhap;
                $_SESSION['Level'] = $userData['level'];
                $_SESSION['ThemDN'] = $userData['themdn'];
                $_SESSION['ThongKe'] = $userData['thongke'];
                $_SESSION['Pass'] = crypt($userData['password'], "CONGTYketoanCHIENTHUAT@2100462770#");
                $_SESSION['KhoaDL'] = $userData['khoadl'];
                $_SESSION['UserID'] = $userData['userid'];
                $_SESSION['Time'] = date('H:i');
                $_SESSION['YeuCauDoiMK'] = $userData['yeucau_doimk'];
                $_SESSION['URI'] = $_SERVER['REQUEST_URI']; // Thêm URI hiện tại vào session
                create_Token();
                redirect("doanhnghiep.php");
            } else {
                echo "<script>alert('Mã bảo mật không đúng! Vui lòng nhập lại!');</script>";
            }
        } else {
            echo "<script>alert('Vui lòng kiểm tra thông tin đăng nhập!');</script>";
        }
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
    <head>
        <title>ĐĂNG NHẬP PHẦN MỀM KẾ TOÁN CHIẾN THUẬT</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type="text/css" href="login/css/cas.css?v=1.00" />
        <link rel="shortcut icon" type="image/x-icon" href="icon/favicon.ico"/>
    </head>

   <body id="cas">
        <div style="margin-top: -10px;" id="header">
          <h1 id="app-name">HỆ THỐNG PHẦN MỀM KẾ TOÁN CHIẾN THUẬT</h1></div>
     <div id="content">


<form id="fm1" class="fm-v clearfix" action="#" method="post" autocomplete="off">
    <div id="login-box">
        <table width="480" border="0" cellspacing="0" cellpadding="0" style="text-align:center">

            <tr height="45px">
                <td colspan="2" style="border: 0px solid  #5c88af; height:10px;text-align: center;">
                    ĐĂNG NHẬP HỆ THỐNG
                </td>
            </tr>

            <tr>
                <td align="right" width="150px">
                    <label style="font-size: 13px" for="username">Tên đăng nhập:</label>
                </td>
                <td align="left" width="330px" style="">
                        <input id="username" name="TenDangNhap" required type="text" value="" size="25"/>
                    
                </td>
            </tr>
            <tr>
                <td align="right" width="150px">
                   <label style="font-size: 13px" for="password">Mật khẩu:</label>
                </td>
                <td align="left" width="330px" style="">                    
                    <input id="password" name="MatKhau" required type="password" value="" size="25" readonly
           onfocus="this.removeAttribute('readonly');" />
                </td>
            </tr>
            <tr id="capchaRow">
                <td align="right" width="150px">
                    <label style="font-size: 13px" >Mã bảo mật</label>
                </td>
                <td align="left" width="330px" style="">
                    <input id="capcha" name="mabaomat" style="width: 180px"  required type="text" value="" size="25" autocomplete="off"/>
                </td>
            </tr>               
            <tr id="capchaRowInput">
                <td></td>
                <td align="left" width="330px" style="">
                    <span style="margin-left:0px;">
                        <img src="random_image.php" height="30" id="captchaImg"/>
                    </span>
                </td>
            </tr>
            <tr>
                <td></td>
                <td align="left">
                    <input class="btn-submit" style="width:180px" name="submit" accesskey="l" value="&#272;&#258;NG NH&#7852;P" tabindex="4" type="submit" />
                </td>
            </tr>

        </table>
        <div style="text-align: center; font-weight: bold">
            
        </div>

    </div>

    <div id="sidebar">
    </div>
</form>

		</div>
	    <div id="footer">
	        <div>
                <div id="vt-copyRite" style="text-align:center;margin-top:5px;font-size:1em;line-height: 150%;color:white;">
                    
                    <b>&copy; 2016 BẢN QUYỀN THUỘC CÔNG TY TNHH KẾ TOÁN VÀ TƯ VẤN THUẾ CHIẾN THUẬT</b>
                    <br/>
                    Địa chỉ: Số 57A đường Bạch Đằng - Phường 4 - TP Trà Vinh - tỉnh Trà Vinh.
                    <br/>
                    Điện thoại: (0294) 6261 888 - Email: ketoanchienthuat@yahoo.com.
					<br/>
					<span style="font-size:1.1em">
					</span>
				</div>
	        </div>
	    </div>
	</body>
</html>
