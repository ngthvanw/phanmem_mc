<?php
require("config.php");
$pathname = "datafile/"; // đường dẫn chứa data của công ty
$dir = $driver . "/datafile/";

if (!isset($_SESSION['User'])) {
    session_destroy();
    redirect("login.php");
} else {
    if ($_SESSION['URI'] != $URI) {
        session_destroy();
        redirect("login.php");
    }else if($_SESSION['ThemDN']!=1){
        echo "<script>alert('CẢNH BÁO\\nBạn không có quyền tạo doanh nghiệp mới.\\nVui lòng liên hệ với nhân viên quản lý phần mềm !');</script>";
        redirect("doanhnghiep.php");
    }
}
	function load_Phanquyen($driver,$UserName) {
		// Tạo một mảng chứa quyền hạn của người dùng
		$quyen = array();
		// Thực hiện truy vấn để lấy phân quyền của người dùng
		try {
			$db = new PDO('sqlite:' . $driver . 'thongtinchung.db');
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$stmt = $db->prepare("SELECT permissions FROM users WHERE username = :username");
			$stmt->bindParam(':username', $UserName);
			$stmt->execute();
			
			// Lấy kết quả truy vấn
			$result = $stmt->fetch(PDO::FETCH_ASSOC);
			
			// Nếu tìm thấy, giải mã phân quyền từ JSON
			if ($result) {
				$quyen = json_decode($result['permissions'], true);
			}
		} catch (PDOException $e) {
			echo "Lỗi kết nối hoặc truy vấn: " . $e->getMessage();
		}

		return $quyen; // Trả về mảng quyền hạn
	}

	function save_Phanquyen($driver, $UserName, $quyen) {
		try {
			$db = new PDO('sqlite:' . $driver . 'thongtinchung.db');
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$permissions = json_encode($quyen);
			$stmt = $db->prepare("UPDATE users SET permissions = :permissions WHERE username = :username");
			$stmt->bindParam(':permissions', $permissions);
			$stmt->bindParam(':username', $UserName);
			$stmt->execute();
		} catch (PDOException $e) {
			echo "Lỗi kết nối hoặc lưu trữ: " . $e->getMessage();
		}
	}

if (isset($_POST['submit'])) {
    $MaSoThue = trim($_POST['MaSoThue']);
    $TenCongTy = trim($_POST['TenCongTy']);
    $DiaChi = trim($_POST['DiaChi']);
    $khongtontai = 0;
    if ($handle = opendir($dir)) {
        while ($entry = readdir($handle)) {
            if (is_dir($dir . "/" . $entry) && $entry != "." && $entry != "..") {
                if ($entry == $MaSoThue) {
                    $khongtontai = 1;
                }
            }
        }
        closedir($handle);
    }
    if ($MaSoThue && $TenCongTy && $DiaChi) {
        if ($khongtontai == 0) {
            $phanquyen = load_Phanquyen($dir, $_SESSION['User']);
			if (is_array($phanquyen)) {
                array_push($phanquyen, $MaSoThue);
            } else {
                $phanquyen = [$MaSoThue];
            }
            $str = $MaSoThue . ":" . $TenCongTy . ":" . $DiaChi;
            $congty = mahoa2chieu($str);
            mkdir($pathname . $MaSoThue); // tạo thư mục data theo mã số thuế doanh nghiệp

            $fp1 = @fopen($pathname . "/" . "$MaSoThue" . "/" . 'info.db', "w");
            fwrite($fp1, $congty);
			
            // Lưu phân quyền vào SQLite
            save_Phanquyen($dir, $_SESSION['User'], $phanquyen);

            echo "<script>alert('Thêm thông tin thành công');</script>";
            fclose($fp1);
        } else {
            echo "<script>alert('Mã số thuế đã tồn tại ! vui lòng nhập lại !');</script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <link rel="shortcut icon" type="image/x-icon" href="icon/favicon.ico"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>THÊM DOANH NGHIỆP</title>
    <meta name="PHAN MEM KE TOAN CHIEN THUAT" content="PHAN MEM KE TOAN CHIEN THUAT"/>
    <meta name="keywords" content="PHAN MEM KE TOAN CHIEN THUAT"/>
    <meta name="author" content="PHAN MEM KE TOAN CHIEN THUAT"/>
    <link rel="stylesheet" type="text/css" href="login/css/style.css?v=0.1"/>

    <!--[if lte IE 7]>
    <style>.main {
        display: none;
    }

    .support-note .note-ie {
        display: block;
    }</style><![endif]-->
    <style>
	*{
			font-family: "Times New Roman", Times, serif !important;
		}
        body {
            background: #e1c192 url(login/images/bg.png);
        }
    </style>
</head>
<body>
<div class="container">
    <section class="main">
        <form class="form-2" action="#" style="background-color: rgba(255, 255, 255, 0.4);" onsubmit="checkknull()" method="post">
            <h1 style="text-align: center;"><span class="log-in">THÊM THÔNG TIN DOANH NGHIỆP</span></h1>
            <p class="float">
                <label for="login"><i class="icon-user"></i>Mã số thuế</label>
                <input type="text" required pattern="[0-9-]{10,14}" id="MaSoThue" name="MaSoThue" placeholder="Mã số thuế" autocomplete="off" />
            </p>
            <p class="float">
                <label for="login"><i class="icon-user"></i>Tên công ty</label>
                <input type="text" required id="TenCongTy" name="TenCongTy" placeholder="Tên công ty" autocomplete="off" />
            </p>
            <p class="float" style="width: 100% !important;">
                <label for="MaSoThue"><i class="icon-lock"></i>Địa Chỉ</label>
                <input type="text" required id="DiaChi" name="DiaChi" required="" placeholder="Địa chỉ" autocomplete="off" />
            </p>
            <p class="clearfix">
                <input style="text-align: center;" type="submit" name="submit" value="Thêm Mới"/>
                <a href="login.php" class="log-twitter">Đăng nhập</a>
            </p>
        </form>
        ​​
    </section>

</div>
<!-- jQuery if needed -->
<script type="text/javascript" src="js/jquery.js?v=1.0"></script>
<script>
    $(document).ready(function () {
        function checkknull() {
            if ($("#MaSoThue").val() == "") {
                alert("Vui lòng nhập mã số thuế ");
                $("#MaSoThue").focus();
                return false;
            }
            if ($("#TenCongTy").val() == "") {
                alert("Vui lòng nhập mã số thuế ");
                $("#TenCongTy").focus();
                return false;
            }
            if ($("#DiaChi").val() == "") {
                alert("Vui lòng nhập mã số thuế ");
                $("#DiaChi").focus();
                return false;
            }
            return true;
        }

        $("#MaSoThue").keyup(function () {
            masothue = $("#MaSoThue").val();
            $.ajax({
                url: "modules/doannghiep/checkkey.php",
                type: "GET",
                data: {id: masothue},
                success: function (data) {
                    if (data == 1) {
                        alert("Mã số thuế đã tồn tại ");
                        $("#MaSoThue").focus();
                    }
                }
            });
        });

        $("#MaSoThue").focusout(function () {
            masothue = $("#MaSoThue").val().trim();
            if (masothue != "") {
                $.ajax({
                    url: "modules/doannghiep/checkiscompany.php",
                    type: "GET",
                    data: {id: masothue},
                    success: function (res) {
                        $data = $.parseJSON(res);
                        if ($data.Data == "") {
                            alert("CẢNH BÁO \n\n MÃ SỐ THUẾ NÀY CHƯA ĐƯỢC DĂNG KÝ VỚI CƠ QUAN THUẾ !! ");
                        }else {
                            $DATA = $.parseJSON($data.Data);
                            $("#TenCongTy").val($DATA.companyName.toUpperCase());
                            $("#DiaChi").val($DATA.address);
                        }
                    }
                });
            }
        });
    });
</script>
</body>
</html>