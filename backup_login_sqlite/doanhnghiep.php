<?php
//echo md5(md5(md5("ketoanchienthuat"."11405113f5252c3c700f8352772181ec")));
session_start();
require("config.php");
if (!isset($_SESSION['User'])) {
    session_destroy();
    redirect("login.php");
} else {
    if ($_SESSION['URI'] != $URI) {
        session_destroy();
        redirect("login.php");
    }
}
header ("Expires: ".gmdate("D, d M Y H:i:s", time())." GMT");
header ("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header ("Cache-Control: no-cache, must-revalidate"); header ("Pragma: no-cache");

unset($_SESSION['NienDo']);
//$ngayxuat = date();
//$gioxuat = time();
function getRealIPAddress()
{
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        //check ip from share internet
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } else if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        //to check ip is pass from proxy
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}

$pathname = "datafile/"; // đường dẫn chứa data của công ty
function load_doanhngiep($dir)
{
    $filelist = array();
    if ($handle = opendir($dir)) {
        while ($entry = readdir($handle)) {
            if (is_dir($dir . "/" . $entry) && $entry != "." && $entry != "..") {
                $filelist[] = $entry;
                $fp1 = @fopen($dir . "/" . $entry . "/" . 'info.db', "r"); // đọc thông tin chung
                $string_info[] = explode(":", giaima2chieu(fgets($fp1)));
            }
        }
        closedir($handle);
    }
    return ($string_info);
}

function load_Phanquyen($driver,$UserName) {
    // Tạo một mảng chứa quyền hạn của người dùng
    $quyen = array();
    // Thực hiện truy vấn để lấy phân quyền của người dùng
    try {
		$db = new PDO('sqlite:' . $driver . '/datafile/thongtinchung.db');
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
$arr_doanhnghiep = load_doanhngiep($driver . "/datafile");
$PhanQuyen = load_Phanquyen($driver ,$_SESSION['User']);// Lấy Danh sách của tất cả user chứa danh sách MST
$ListMST = $PhanQuyen;// Danh sách các MST của User
$_SESSION['LISTDN'] = $ListMST;

function cb_doanhnghiep($arr_doanhnghiep, $PhanQuyen)
{
    $str = "";
    foreach ($arr_doanhnghiep as $item) {
        $Hien = 0;
        foreach ($PhanQuyen as $ItemPhanQuyen) {
            if ($ItemPhanQuyen == $item[0] || $ItemPhanQuyen == "ALL") {
                $Hien = 1;
            }
        }
        if ($item[0] != "" && $Hien == 1) {
            $str .= "<option value=" . $item[0] . ">" .$item[0]." - ".mb_strtoupper(($item[1]))."</option>";
        }
    }
    return $str;
}

if (isset($_POST['submit'])) {
    $MST = $_POST['MaSoThue'];
    $location = $_POST['location'];
    $tontai = false;
    foreach ($ListMST as $itemMSTUser) {
        if($itemMSTUser == "ALL" || $itemMSTUser == $MST ) {
            foreach ($arr_doanhnghiep as $item) {
                if ($item[0] == $MST) {
                    $TenCongTy = $item[1];
                    $DiaChi = $item[2];
                    $QuanHuyen = $item[3];
                    $ThanhPho = $item[4];
                    $DienThoai = $item[5];
                    $Email = $item[6];
                    $LoaiHinhDoanhNghiep = $item[11];
                    $LinhVucKinhDoanh = $item[9];
                    $NganhNgheKinhDoanh = $item[10];
                    $HinhThucSoHuuVon = $item[8];
                    $tontai = true;
                }
            }
        }
    }

    $_SESSION['MST'] = $MST;
    $_SESSION['TenCongTy'] = $TenCongTy;
    $_SESSION['DiaChi'] = $DiaChi;
    $_SESSION['QuanHuyen'] = $QuanHuyen;
    $_SESSION['ThanhPho'] = $ThanhPho;
    $_SESSION['DienThoai'] = $DienThoai;
    $_SESSION['Email'] = $Email;

    $_SESSION['LoaiHinhDoanhNghiep'] = $LoaiHinhDoanhNghiep;
    $_SESSION['LinhVucKinhDoanh'] = $LinhVucKinhDoanh;
    $_SESSION['NganhNgheKinhDoanh'] = $NganhNgheKinhDoanh;
    $_SESSION['HinhThucSoHuuVon'] = $HinhThucSoHuuVon;

    $_SESSION['Time'] = date('H:i');
    $_SESSION['URI'] = $URI;

    if ($tontai) {
        $mysql_host = $_SESSION['HOST'];
        $mysql_username = $_SESSION['USER_DB'];
        // MySQL password
        $mysql_password = $_SESSION['PASS_DB'];
        $cnn = mysqli_connect($mysql_host, $mysql_username, $mysql_password);
		
        $dbname = "dulieuchung";
        mysqli_select_db($cnn,$dbname);
		
		/// Tạo CSDL dulieuchung nếu chưa tồn tại
		mysqli_query($cnn,"CREATE DATABASE dulieuchung;");
		//Tạo và Copy bằng từ phpmyadmin qua dulieuchung
		mysqli_query($cnn,"CREATE TABLE dulieuchung.logfile_user_{$noiluu_phanmem} LIKE phpmyadmin.logfile_user_{$noiluu_phanmem};");
		mysqli_query($cnn,"INSERT INTO dulieuchung.logfile_user_{$noiluu_phanmem} SELECT * FROM phpmyadmin.logfile_user_{$noiluu_phanmem};");
		mysqli_query($cnn,"DROP TABLE phpmyadmin.logfile_user_{$noiluu_phanmem};");
		
		mysqli_query($cnn,"CREATE TABLE dulieuchung.user_online_{$noiluu_phanmem} LIKE phpmyadmin.user_online_{$noiluu_phanmem};");
		mysqli_query($cnn,"INSERT INTO dulieuchung.user_online_{$noiluu_phanmem} SELECT * FROM phpmyadmin.user_online_{$noiluu_phanmem};");
		mysqli_query($cnn,"DROP TABLE phpmyadmin.user_online_{$noiluu_phanmem};");
		
		mysqli_query($cnn,"CREATE TABLE dulieuchung.danhsach_congty_trinhky_{$noiluu_phanmem} LIKE phpmyadmin.danhsach_congty_trinhky_{$noiluu_phanmem};");
		mysqli_query($cnn,"INSERT INTO dulieuchung.danhsach_congty_trinhky_{$noiluu_phanmem} SELECT * FROM phpmyadmin.danhsach_congty_trinhky_{$noiluu_phanmem};");
		mysqli_query($cnn,"DROP TABLE phpmyadmin.danhsach_congty_trinhky_{$noiluu_phanmem};");
		
		mysqli_query($cnn,"CREATE TABLE dulieuchung.danhsach_giaonhan_chungtu_{$noiluu_phanmem} LIKE phpmyadmin.danhsach_giaonhan_chungtu_{$noiluu_phanmem};");
		mysqli_query($cnn,"INSERT INTO dulieuchung.danhsach_giaonhan_chungtu_{$noiluu_phanmem} SELECT * FROM phpmyadmin.danhsach_giaonhan_chungtu_{$noiluu_phanmem};");
		mysqli_query($cnn,"DROP TABLE phpmyadmin.danhsach_giaonhan_chungtu_{$noiluu_phanmem};");
		
		mysqli_query($cnn,"CREATE TABLE dulieuchung.phancongkhaithue_{$noiluu_phanmem} LIKE phpmyadmin.phancongkhaithue_{$noiluu_phanmem};");
		mysqli_query($cnn,"INSERT INTO dulieuchung.phancongkhaithue_{$noiluu_phanmem} SELECT * FROM phpmyadmin.phancongkhaithue_{$noiluu_phanmem};");
		mysqli_query($cnn,"DROP TABLE phpmyadmin.phancongkhaithue_{$noiluu_phanmem};");
		
		mysqli_query($cnn,"CREATE TABLE dulieuchung.phanquyen_{$noiluu_phanmem} LIKE phpmyadmin.phanquyen_{$noiluu_phanmem};");
		mysqli_query($cnn,"INSERT INTO dulieuchung.phanquyen_{$noiluu_phanmem} SELECT * FROM phpmyadmin.phanquyen_{$noiluu_phanmem};");
		mysqli_query($cnn,"DROP TABLE phpmyadmin.phanquyen_{$noiluu_phanmem};");
		
		mysqli_query($cnn,"CREATE TABLE dulieuchung.tmp_danhsach_congty_kiemtra_{$noiluu_phanmem} LIKE phpmyadmin.tmp_danhsach_congty_kiemtra_{$noiluu_phanmem};");
		mysqli_query($cnn,"INSERT INTO dulieuchung.tmp_danhsach_congty_kiemtra_{$noiluu_phanmem} SELECT * FROM phpmyadmin.tmp_danhsach_congty_kiemtra_{$noiluu_phanmem};");
		mysqli_query($cnn,"DROP TABLE phpmyadmin.tmp_danhsach_congty_kiemtra_{$noiluu_phanmem};");
		
		mysqli_query($cnn,"CREATE TABLE dulieuchung.danhsach_phancong_{$noiluu_phanmem} LIKE phpmyadmin.danhsach_phancong_{$noiluu_phanmem};");
		mysqli_query($cnn,"INSERT INTO dulieuchung.danhsach_phancong_{$noiluu_phanmem} SELECT * FROM phpmyadmin.danhsach_phancong_{$noiluu_phanmem};");
		mysqli_query($cnn,"DROP TABLE phpmyadmin.danhsach_phancong_{$noiluu_phanmem};");
		
		mysqli_query($cnn,"CREATE TABLE dulieuchung.nhatkykiemphieu{$noiluu_phanmem} LIKE phpmyadmin.nhatkykiemphieu{$noiluu_phanmem};");
		mysqli_query($cnn,"INSERT INTO dulieuchung.nhatkykiemphieu{$noiluu_phanmem} SELECT * FROM phpmyadmin.nhatkykiemphieu{$noiluu_phanmem};");
		mysqli_query($cnn,"DROP TABLE phpmyadmin.nhatkykiemphieu{$noiluu_phanmem};");
		
		mysqli_query($cnn,"CREATE TABLE dulieuchung.danhsach_kehoach_{$noiluu_phanmem} LIKE phpmyadmin.danhsach_kehoach_{$noiluu_phanmem};");
		mysqli_query($cnn,"INSERT INTO dulieuchung.danhsach_kehoach_{$noiluu_phanmem} SELECT * FROM phpmyadmin.danhsach_kehoach_{$noiluu_phanmem};");
		mysqli_query($cnn,"DROP TABLE phpmyadmin.nhatkykiemphieu{$noiluu_phanmem};");
		
		mysqli_query($cnn,"CREATE TABLE dulieuchung.danhsach_congty_kiemtra_{$noiluu_phanmem} LIKE phpmyadmin.danhsach_congty_kiemtra_{$noiluu_phanmem};");
		mysqli_query($cnn,"INSERT INTO dulieuchung.danhsach_congty_kiemtra_{$noiluu_phanmem} SELECT * FROM phpmyadmin.danhsach_congty_kiemtra_{$noiluu_phanmem};");
		mysqli_query($cnn,"DROP TABLE phpmyadmin.danhsach_congty_kiemtra_{$noiluu_phanmem};");
		
		mysqli_query($cnn,"CREATE TABLE dulieuchung.danhsach_thuquanly_{$noiluu_phanmem} LIKE phpmyadmin.danhsach_thuquanly_{$noiluu_phanmem};");
		mysqli_query($cnn,"INSERT INTO dulieuchung.danhsach_thuquanly_{$noiluu_phanmem} SELECT * FROM phpmyadmin.danhsach_thuquanly_{$noiluu_phanmem};");
		mysqli_query($cnn,"DROP TABLE phpmyadmin.danhsach_thuquanly_{$noiluu_phanmem};");
		

        mysqli_query($cnn,"CREATE TABLE `logfile_user_{$noiluu_phanmem}` (
        `sott` int(11) NOT NULL,
          `session_id` varchar(200) COLLATE utf8_bin NOT NULL,
          `tencongty` text COLLATE utf8_bin NOT NULL,
          `tendangnhap` varchar(20) COLLATE utf8_bin NOT NULL,
          `ngaynhap` date NOT NULL,
          `gionhap` time NOT NULL,
          `ngayxuat` date NOT NULL,
          `gioxuat` time NOT NULL,
          `tendatabase` varchar(200) COLLATE utf8_bin NOT NULL,
          `ip` varchar(200) COLLATE utf8_bin NOT NULL
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;");
        mysqli_query($cnn,"ALTER TABLE `logfile_user_{$noiluu_phanmem}`  ADD PRIMARY KEY (`sott`);");
        mysqli_query($cnn,"ALTER TABLE `logfile_user_{$noiluu_phanmem}` MODIFY `sott` int(11) NOT NULL AUTO_INCREMENT;");
        mysqli_query($cnn,"ALTER TABLE `logfile_user_{$noiluu_phanmem}` ADD `vitri` VARCHAR(100) NOT NULL AFTER `ip`");


        $session_id = session_id();
        $tendangnhap = $_SESSION['User'];
        $masothue = $_SESSION['MST'];
        $tendoanhnghiep = $_SESSION['TenCongTy'];
        $IP = getRealIPAddress();
        $time = time();
        $ngaynhap = date("Y-m-d", $time);
        $gionhap = date("H:i:s", $time);
        $ngayxuat = date("Y-m-d", $time);
        $gioxuat = date("H:i:s", $time);

        $sql_in = "insert into logfile_user_{$noiluu_phanmem}(session_id,tendangnhap,ngaynhap,gionhap,ngayxuat,gioxuat,tendatabase,ip,tencongty,vitri)
                    VALUE ('" . $session_id . "','" . $tendangnhap . "','" . $ngaynhap . "','" . $gionhap . "','" . $ngayxuat . "','" . $gioxuat . "','" . $masothue . "','" . $IP . "','" . $tendoanhnghiep . "','".$location."')
                  ";
        mysqli_query($cnn,$sql_in);
        mysqli_close($cnn);
        redirect("index.php");
    } else {
        echo "<script>alert('Doanh nghiệp không tồn tại ! Vui lòng chọn lại doanh nghiệp !');</script>";
    }


}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <link rel="shortcut icon" type="image/x-icon" href="icon/favicon.ico"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <script src="js/function.js?v=<?php echo time(); ?>"></script>
    <title>DOANH NGHIỆP</title>

    <style>
        <style >
        #page-wrapper {
            width: 640px;
            background: #FFFFFF;
            padding: 1em;
            margin: 1em auto;
            border-top: 5px solid #69c773;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.8);
        }

        h1 {
            margin-top: 0;
        }

        label {
            display: block;
            margin-top: 2em;
            margin-bottom: 0.5em;
            color: #999999;
        }

        input {
            width: 100%;
            padding: 0.5em 0.5em;
            font-size: 12px;
            border-radius: 3px;
            border: 1px solid #D9D9D9;
        }
        select {
            width: 100%;
            padding: 0.5em 0.5em;
            font-size: 15px;
            border-radius: 3px;
            border: 1px solid #D9D9D9;
        }

        button {
            display: inline-block;
            border-radius: 3px;
            border: none;
            font-size: 0.9rem;
            padding: 0.5rem 0.8em;
            background: #69c773;
            border-bottom: 1px solid #498b50;
            color: white;
            -webkit-font-smoothing: antialiased;
            font-weight: bold;
            margin: 0;
            width: 100%;
            text-align: center;
        }

        button:hover, button:focus {
            opacity: 0.75;
            cursor: pointer;
        }

        button:active {
            opacity: 1;
            box-shadow: 0 -3px 10px rgba(0, 0, 0, 0.1) inset;
        }
        #languages option{
            color: red;
            background: blue;
        }
        #languages option:hover{
            color: red;
            background: blue;
        }

		/* option active styles */
		datalist option:hover, datalist option:focus {
		  color: #fff;
		  background-color: #036;
		  outline: 0 none;
		}
    </style>


    <link rel="stylesheet" type="text/css" href="login/css/style.css"/>

    <style>
        body {
            background: #e1c192 url(login/images/bg.png);
            font-family: "Times New Roman", Times, serif !important;
            font-size: 12px;
        }
    </style>
    <script src="js/jquery.js"></script>
	<link href="select2-4.1.0/dist/css/select2.min.css" rel="stylesheet" />
	<script src="select2-4.1.0/dist/js/select2.min.js"></script>
	<script>
	// In your Javascript (external .js resource or <script> tag)
	$(document).ready(function() {
		$('#MaSoThue').select2();
	});
</script>
</head>
<body>
<div class="container">
    <section class="main">
        <form class="form-2" action="#" method="post" style="background-color: rgba(255, 255, 255, 0.4);" autocomplete="off">
            <h1><span class="log-in">CHỌN DOANH NGHIỆP</span></h1>
            <p>
            <div style="margin-bottom: 5px;" id="page-wrapper">
					   <select id="MaSoThue" name="MaSoThue" required>
                           <option style="text-align: center;" value="">----------------------------------- TÌM KIẾM DOANH NGHIỆP -----------------------------------</option>
					        <?php echo cb_doanhnghiep($arr_doanhnghiep, $ListMST); ?>
					   </select>
            </div>
            </p>
            <p class="clearfix">
                <input type="submit" name="submit" style="height: 38px;padding: 0" value="ĐỒNG Ý"/>
                <?php if ($_SESSION['ThemDN']==1) { ?>
                    <a href="themdoanhnghiep.php" class="log-twitter">Thêm doanh nghiệp</a>
                <?php } else { ?>
                    <a href="login.php" class="log-twitter">Đăng Nhập</a>
                <?php } ?>
            </p>
        </form>
    </section>

</div>
</body>
</html>