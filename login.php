<?php
session_start();
unset($_SESSION['NienDo']);
unset($_SESSION['User']);
session_regenerate_id();
require("config.php");
$pathname = "datafile/";
function create_Token() {
    $rd = getcwd();
    $arr_root_source = explode("\\", $rd);
    $root_source = $arr_root_source[3];
    $_SESSION['TOKEN'] = $root_source;
}

if (isset($_POST['submit'])) {
    $TenDangNhap = check_data($_POST['TenDangNhap']);
    $MatKhau = check_data($_POST['MatKhau']);    
    try {
        // Kết nối SQLite
        $db = new PDO('sqlite:' . $driver . '/datafile/thongtinchung.db');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);		
		try {
			$result = $db->query("PRAGMA table_info(users)");
			$columns = $result->fetchAll(PDO::FETCH_COLUMN, 1);
			if (!in_array('failed_attempts', $columns)) {
				$db->exec("ALTER TABLE users ADD failed_attempts INTEGER DEFAULT 0");
			}
			if (!in_array('lock_until', $columns)) {
				$db->exec("ALTER TABLE users ADD lock_until DATETIME DEFAULT NULL");
			}
		} catch (PDOException $e) {
			echo "Lỗi: " . $e->getMessage();
		}
        // Lấy thông tin người dùng
        $stmt = $db->prepare("SELECT * FROM users WHERE username = :username");
        $stmt->bindParam(':username', $TenDangNhap);
        $stmt->execute();
        $userData = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($userData) {
            // Kiểm tra nếu tài khoản bị khóa
            if ($userData['lock_until'] && strtotime($userData['lock_until']) > time()) {
                echo "<script>alert('Tài khoản bị khóa. Vui lòng thử lại sau.');</script>";
                exit;
            }
            // Xác thực mật khẩu
            if (trim(mahoamotchieu($MatKhau)) == trim($userData['password'])) {
                if (strcasecmp($_POST['mabaomat'], $_SESSION['security_code']) == 0) {
                    // Đăng nhập thành công
                    $stmt = $db->prepare("UPDATE users SET failed_attempts = 0, lock_until = NULL WHERE username = :username");
                    $stmt->bindParam(':username', $TenDangNhap);
                    $stmt->execute();
                    $_SESSION['User'] = $TenDangNhap;
                    $_SESSION['Level'] = $userData['level'];
                    $_SESSION['ThemDN'] = $userData['themdn'];
                    $_SESSION['ThongKe'] = $userData['thongke'];
                    $_SESSION['Pass'] = crypt($userData['password'], "CONGTYketoanCHIENTHUAT@2100462770#");
                    $_SESSION['KhoaDL'] = $userData['khoadl'];
                    $_SESSION['UserID'] = $userData['sott'];
                    $_SESSION['Time'] = date('H:i');
                    $_SESSION['YeuCauDoiMK'] = $userData['yeucau_doimk'];
                    $_SESSION['URI'] = $_SERVER['REQUEST_URI'];
                    create_Token();
                    redirect("doanhnghiep.php");
                } else {
                    echo "<script>alert('Mã bảo mật không đúng!');</script>";
                }
            } else {
                // Sai mật khẩu
                $failed_attempts = $userData['failed_attempts'] + 1;
                $lock_until = null;
                if ($failed_attempts >= 5) {
                    $lock_until = date('Y-m-d H:i:s', strtotime('+5 minutes')); // Khóa trong 5 phút
                }
                $stmt = $db->prepare("UPDATE users SET failed_attempts = :failed_attempts, lock_until = :lock_until WHERE username = :username");
                $stmt->bindParam(':failed_attempts', $failed_attempts);
                $stmt->bindParam(':lock_until', $lock_until);
                $stmt->bindParam(':username', $TenDangNhap);
                $stmt->execute();
                echo $failed_attempts >= 5 
                    ? "<script>alert('Tài khoản bị khóa do nhập sai quá nhiều lần. Thử lại sau 5 phút.');</script>"
                    : "<script>alert('Sai thông tin đăng nhập. Bạn còn " . (5 - $failed_attempts) . " lần thử.');</script>";
            }
        } else {
            echo "<script>alert('Tên đăng nhập không tồn tại.');</script>";
        }
    } catch (PDOException $e) {
        echo "Lỗi kết nối: " . $e->getMessage();
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
		<!--<link rel="stylesheet" href="fontawesome_6.6.0/css/all.min.css"> Tải file về máy local-->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
		<script>
			function togglePasswordVisibility() {
				var passwordField = document.getElementById("password");
				var toggleIcon = document.getElementById("togglePassword").querySelector("i");
				
				if (passwordField.type === "password") {
					passwordField.type = "text";
					toggleIcon.classList.remove("fa-eye");
					toggleIcon.classList.add("fa-eye-slash");
				} else {
					passwordField.type = "password";
					toggleIcon.classList.remove("fa-eye-slash");
					toggleIcon.classList.add("fa-eye");
				}
			}
		</script>
		<style>
			#cas #login-box table tr td input {
				padding-right: 30px; 
				border-radius: 3px; 
				border: 1px solid #173381;
			}
		</style>
    </head>

   <body id="cas">
        <div style="margin-top: -10px;" id="header">
			<?php
				$NamePhamMem = "CHIẾN THUẬT";
				$host = $_SERVER['HTTP_HOST'];
				$parts = explode('.', $host);

				// Kiểm tra nếu có subdomain
				if(count($parts) > 2) {
					$subdomain = $parts[0]; // Lấy phần subdomain
					switch ($subdomain) {
						case "binhminh":
							$NamePhamMem = "CHIẾN THUẬT BÌNH MINH";
							break;
						case "nguyentrinh":
							$NamePhamMem = "NGUYỄN TRÌNH";
							break;
						case "tuongvi":
							$NamePhamMem = "TƯỜNG VY";
							break;
						case "tuongvy":
							$NamePhamMem = "TƯỜNG VY";
							break;
						case "xdhoanmy":
							$NamePhamMem = "HOÀN MỸ";
							break;
						default:
							$NamePhamMem = "CHIẾN THUẬT";
					}
				}
			?>
          <h1 id="app-name">HỆ THỐNG PHẦN MỀM KẾ TOÁN <?php echo $NamePhamMem; ?></h1></div>
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
				<td align="left" width="330px">
					<div style="position: relative; width: fit-content;">
						<input id="password" name="MatKhau" required type="password" value="" size="25" readonly='readonly'
							   onfocus="this.removeAttribute('readonly');" />
						<span id="togglePassword" onclick="togglePasswordVisibility()" 
							  style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); cursor: pointer;">
							<i class="fas fa-eye"></i>
						</span>
					</div>
				</td>
			</tr>
            <tr id="capchaRow">
                <td align="right" width="150px">
                    <label style="font-size: 13px">Mã bảo mật:</label>
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
                    
                    <b>BẢN QUYỀN &copy; 2016 THUỘC CÔNG TY TNHH KẾ TOÁN VÀ TƯ VẤN THUẾ CHIẾN THUẬT</b>
                    <br/>
                    Địa chỉ: Số 57A đường Bạch Đằng, Phường 4, Thành phố Trà Vinh, Tỉnh Trà Vinh, Việt Nam.
                    <br/>
                    Điện thoại: 0983 868 441 - (0294) 6261 888 - Email: ketoanchienthuat@yahoo.com.
					<br/>
					<span style="font-size:1.1em">
					</span>
				</div>
	        </div>
	    </div>
	</body>
</html>
