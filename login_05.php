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
            if (strcasecmp($_POST['mabaomat'], $_SESSION['security_code']) == 0) {
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

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="login-form-05/fonts/icomoon/style.css">
    <link rel="stylesheet" href="login-form-05/css/owl.carousel.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="login-form-05/css/bootstrap.min.css">    
    <!-- Style -->
    <link rel="stylesheet" href="login-form-05/css/style.css">
    <title>ĐĂNG NHẬP HỆ THỐNG</title>
  </head>
  <body style="margin-top:-25px;">
  <div class="d-md-flex half">
    <div class="bg" style="background-image: url('login-form-05/images/bg_1.jpg');"></div>
    <div class="contents">
      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-12">
            <div class="form-block mx-auto">
              <div class="text-center mb-5">
                <h3 class="text-uppercase"><strong>ĐĂNG NHẬP HỆ THỐNG</strong></h3>
              </div>
              <form action="#" method="post" autocomplete="off">
                <div class="form-group first">
                  <label for="username">Tên đăng nhập</label>
                  <input type="text" name="TenDangNhap" class="form-control" required placeholder="Tài khoản của bạn" id="username">
                </div>
                <div class="form-group last mb-3">
                  <label for="password">Mật khẩu</label>
                  <input type="password" name="MatKhau" class="form-control" required placeholder="Mật khẩu của bạn" id="password" readonly
           onfocus="this.removeAttribute('readonly');">
                </div>
				<div class="form-group last mb-3">
                  <label for="security_code">Mã bảo mật</label>
                  <input type="text" name="mabaomat" class="form-control" placeholder="Mã bảo mật" required id="security_code">
                </div>                
                <div class="form-group last mb-3">
                  <span class="ml-auto"><img src="random_image_05.php" width="100%" height="40" id="captchaImg"/></span> 
                </div>
                <input type="submit" name="submit" value="ĐĂNG NHẬP" class="btn btn-block py-2 btn-primary">
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>    
  </div>  
    <script src="login-form-05/js/jquery-3.3.1.min.js"></script>
    <script src="login-form-05/js/popper.min.js"></script>
    <script src="login-form-05/js/bootstrap.min.js"></script>
    <script src="login-form-05/js/main.js"></script>
  </body>
</html>