<?php
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
$date = date("d-m-Y");
$string = crypt($date,"CONGTYketoanCHIENTHUAT@2100462770#");
$_SESSION['MaNienDo'] = $string;
$MST = $_SESSION['MST'];
$dir = $driver . "/datafile/" . $MST . "/";
function restore_Database($hostName, $userName, $password, $DbName, $sqlFileName, $dir, $Partion) {
	if (file_exists($sqlFileName)) {
		// Dùng lệnh mysql để phục hồi cơ sở dữ liệu
		$command = "{$Partion}xampp\\mysql\\bin\\mysql --host={$hostName} --user={$userName} --password={$password} --default-character-set=latin1 {$DbName} < {$sqlFileName}";
		// Thực thi lệnh phục hồi
		system($command, $output);
		return $output === 0; // Trả về true nếu lệnh thành công
	} else {
		echo "<script>alert('Không tìm thấy file .sql khi phụ hồi.');</script>";
		return false;
	}
}

$array_niendo = [];
if ($handle = opendir($dir)) {
    while ($entry = readdir($handle)) {
        if (is_dir($dir."/".$entry) && $entry!="." && $entry!=".." ) {
            $array_niendo[] = $entry;
        }
    }
    closedir($handle);
}
if (isset($_POST['submit'])) {
    $NienDo = trim($_POST['NienDo']);
    $MacDinh = trim($_POST['MacDinh']);
    $theothongtu = trim($_POST['theothongtu']);
    $khongtontai = 0;
    if ($handle = opendir($dir)) {
        while ($entry = readdir($handle)) {
            if (is_dir($dir . "/" . $entry) && $entry != "." && $entry != "..") {
                if ($entry == $NienDo) {
                    $khongtontai = 1;
                }
            }
        }
        closedir($handle);
    }
    function load_khoadulieuchidoc($dir){
        $fp1 = @fopen($dir."/".'khoadulieu.db', "r"); // đọc thông tin chung
        $string_info = fgets($fp1);
        fclose($fp1);
        if($string_info==""){
            $string_info = 0;
        }
        return ($string_info);
    }
    function load_tuychon($dir=""){
        $OBJ = new ps_chitiet_mavattu();
        $sql = "select noidung from thongtinchung where sott = 1";
        $res = $OBJ->re_query($sql);
        $data = $OBJ->re_fetch($res);
        $string_info = explode(":",$data['noidung']);
        return ($string_info);
    }

    function load_tuychon_file($dir){
        $fp1 = @fopen($dir."/".'tuychon.db', "r"); // đọc thông tin chung
        $string_info = fgets($fp1);
        fclose($fp1);
        return ($string_info);
    }
    function ghi_chinhanh($dir){// Ghi chi nhánh nếu chưa thiết lập
        if(file_exists($dir."/chinhanh.db")==FALSE) {
            $fp1 = @fopen($dir . "/" . 'chinhanh.db', "w"); // đọc thông tin chung
            $txt = '{"' . $_SESSION['MST'] . '":["' . $_SESSION['MST'] . '","' . $_SESSION['TenCongTy'] . '","0"]}';
            fwrite($fp1, $txt);
            fclose($fp1);
        }
    }
	function load_ppkhaithue($dir){
		$fp1 = @fopen($dir . "/" . 'phuongphapkhaithue.db', "r"); // đọc thông tin chung
		$string_info = fgets($fp1);
		fclose($fp1);
		if ($string_info == "") {
			$string_info = "1;1;1";
		}
		return ($string_info);
	}
	$ppkhautru = load_ppkhaithue($driver . "/datafile/" . $_SESSION['MST']."/".$_SESSION['NienDo']);
    if ($NienDo != "") {
        if ($MacDinh != "on") {
            if ($khongtontai == 0) {
                echo "<script>alert('Niên độ không tồn tại ! vui lòng nhập lại');</script>";
                fclose($fp1);
            } else {
                $_SESSION['NienDo'] = $NienDo;
                $khoadulieuchidoc = load_khoadulieuchidoc($driver."/datafile/".$_SESSION['MST']."/".$NienDo);
                $_SESSION['CHIDOC'] = $khoadulieuchidoc;
                $OBJ = new ps_chitiet_mavattu();
				
                $str_tuychon = load_tuychon_file($driver."/datafile/".$_SESSION['MST']."/".$NienDo);
                $OBJ->re_query("CREATE TABLE thongtinchung ( `sott` INT NOT NULL AUTO_INCREMENT , `noidung` TEXT NOT NULL , `ghichu` TEXT NOT NULL , PRIMARY KEY (`sott`)) ENGINE = InnoDB;");
                $OBJ->re_query("insert into thongtinchung(sott,noidung,ghichu) values (1,'".$str_tuychon."','Tuỳ chọn')");
				$ppkhautru = load_ppkhaithue($driver . "/datafile/" . $_SESSION['MST']."/".$_SESSION['NienDo']);
				$_SESSION['PhuongPhapKeKhaiThueGTGT'] = $ppkhautru;
				
                $arr_tuychon = load_tuychon();
				$KhoaNienDoHienTai = trim(($arr_tuychon[42]));
				if($KhoaNienDoHienTai==1 && $_SESSION['Level']!=1){
					echo "<script>alert('KHÔNG THỂ TRUY CẬP PHẦN MỀM DO CHƯA THANH TOÁN PHÍ. VUI LÒNG THANH TOÁN PHẦN MỀM ĐỂ TIẾP TỤC SỬ DỤNG.');</script>";
					redirect($URI."/niendo.php");
				}
                $_SESSION['chkkhoadulieu'] = $arr_tuychon[0];
                $_SESSION['txtkhoadulieu'] = $arr_tuychon[1];
                $_SESSION['txthienthisole'] = $arr_tuychon[2];
                $_SESSION['apdungketoan'] = $arr_tuychon[3];
                $_SESSION['apdungkhachhang'] = $arr_tuychon[4];
                $_SESSION['chkkhoadulieukhiduyet'] = $arr_tuychon[5];
                $_SESSION['loaihinhdoanhnghiep'] = $arr_tuychon[6];
                $_SESSION['theothongtu'] = $arr_tuychon[7];
                $_SESSION['THONGTUMANG'] = array("tt200"=>array("thongtu"=>"theo thông tư số 200/2016/BTC","ngay"=>"22/12/2014"),
                    "tt133"=>array("thongtu"=>"theo thông tư số 133/2016/BTC","ngay"=>"26/08/2016"),
                    ""=>array("thongtu"=>"theo thông tư số 133/2016/BTC","ngay"=>"26/08/2016"),
                );
                $_SESSION['nhacungcaphddt'] = $arr_tuychon[20];
                $_SESSION['thietlaphddt'] = $arr_tuychon[8];
                $_SESSION['txt_hddt_duongdan'] = $arr_tuychon[9];
                $_SESSION['txt_hddt_tendangnhap'] = $arr_tuychon[10];
                $_SESSION['txt_hddt_matkhau'] = $arr_tuychon[11];

                $_SESSION['txttengiamdoc'] = $arr_tuychon[12];
                $_SESSION['txtketoantruong'] = $arr_tuychon[13];
                $_SESSION['txtthuquy'] = $arr_tuychon[14];
                $_SESSION['txtnguoilapphieu'] = $arr_tuychon[15];
                $_SESSION['txt_mauhoadon'] = $arr_tuychon[16];

                $_SESSION['txt_kyhieu'] = $arr_tuychon[17];
                $_SESSION['txt_sotaikhoan'] = $arr_tuychon[18];
                $_SESSION['txt_tennganhang'] = $arr_tuychon[19];

                $_SESSION['thietlapdailythue'] = $arr_tuychon[21];
                $_SESSION['txt_masothue_daily'] = $arr_tuychon[22];
                $_SESSION['txt_tencongtydaily'] = $arr_tuychon[23];
                $_SESSION['txt_hovatendaily'] = $arr_tuychon[24];
                $_SESSION['txt_chungchindaily'] = $arr_tuychon[25];
                $_SESSION['NGONNGU'] = $arr_tuychon[26];
                $_SESSION['txt_seritoken'] = trim($arr_tuychon[27]);
                $_SESSION['chukysodaky'] = trim($arr_tuychon[28]);
                $_SESSION['butrucongno'] = trim($arr_tuychon[29]);
                $_SESSION['dinhdangsophieu'] = trim($arr_tuychon[30]);
                $_SESSION['phuongphaptonkho'] = trim($arr_tuychon[31]);
                $_SESSION['capnhatgiavontucthoi'] = trim($arr_tuychon[32]);

                $_SESSION['txt_PartnerGUID'] = trim($arr_tuychon[33]);
                $TachPartnerGUID = explode("@",trim($arr_tuychon[33]));
                //OrganizationUnitID@CompanyID@UserID@InvoiceTemplateID
                $_SESSION['OrganizationUnitID'] = $TachPartnerGUID[0];
                $_SESSION['CompanyID'] = $TachPartnerGUID[1];
                $_SESSION['UserIDMS'] = $TachPartnerGUID[2];
                $_SESSION['InvoiceTemplateID'] = $TachPartnerGUID[3];
                $_SESSION['C_OR_K'] = $TachPartnerGUID[4];

                $_SESSION['txt_PartnerToken'] = trim(base64_decode($arr_tuychon[34]));
                $_SESSION['tudongtinhdongia'] = trim(($arr_tuychon[35]));
                $_SESSION['giam30thuegtgt'] = trim(($arr_tuychon[36]));
                $_SESSION['hienthichinhanh'] = trim(($arr_tuychon[37]));
                $_SESSION['ngoaite'] = trim(($arr_tuychon[38]));
                $_SESSION['duandautu'] = trim(($arr_tuychon[39]));
                $_SESSION['phanloaihanghoadauvao'] = trim(($arr_tuychon[40]));
                $_SESSION['chungtuthamchieu'] = trim(($arr_tuychon[41]));
                /// Tự động thêm chi nhánh nếu không tồn tại
                ghi_chinhanh($driver."/datafile/".$_SESSION['MST']."/".$NienDo);
                $_SESSION['ChiNhanh'] = $_SESSION['MST'];
                $_SESSION['TenCN'] = $_SESSION['TenCongTy'];
                /// Kết thúc tự động thêm chi nhánh nếu không tồn tại
                $dbname = $_SESSION['TIENTO'] . $_SESSION['MST'] . "_" . $NienDo;
                mkdir($driver_htdocs."/log_login");
                mkdir($driver_htdocs."/log_login/" . $dbname);
                redirect($URI);
            }
        } else {// Thiết lập dữ liệu mặc định
            $_SESSION['NienDo'] = $NienDo;
            $khoadulieuchidoc = load_khoadulieuchidoc($driver."/datafile/".$_SESSION['MST']."/".$NienDo);
            $_SESSION['CHIDOC'] = $khoadulieuchidoc;

            mkdir("datafile/" . $_SESSION['MST'] . "/$NienDo");
            ghi_chinhanh($driver."/datafile/".$_SESSION['MST']."/".$NienDo);
            $_SESSION['ChiNhanh'] = $_SESSION['MST'];
            $_SESSION['TenCN'] = $_SESSION['TenCongTy'];
            if($theothongtu=='200'){
                $filename = 'datafile/khac/datafile_tt200.sql';
            }else{
                $filename = 'datafile/khac/datafile_tt133.sql';
            }
            $dbname = $_SESSION['TIENTO'] . $_SESSION['MST'] . "_" . $NienDo;
            mkdir($driver_htdocs."/log_login");
            mkdir($driver_htdocs."/log_login/" . $dbname);
            $mysql_host = $_SESSION['HOST'];
            $mysql_username = $_SESSION['USER_DB'];
            // MySQL password
            $mysql_password = $_SESSION['PASS_DB'];
            //////////////////////////////////////////////////////////////////////////////////////////////
            // Connect to MySQL server
            $cnn = mysqli_connect($mysql_host, $mysql_username, $mysql_password);
            // Select database
            $sql = "CREATE DATABASE `" . $dbname . "` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci";
            mysqli_query($cnn,$sql);// Tạo CSDL mới 
			$dir = $driver."/datafile/khac/";
			$sqlFileName = $driver."/".$filename;
			$restore_response = restore_Database(
				$_SESSION['HOST'], 
				$_SESSION['USER_DB'], 
				$_SESSION['PASS_DB'], 
				$dbname, 
				$sqlFileName,  // Đường dẫn đến file zip backup
				$dir,           // Thư mục để giải nén file
				$Partion
			);
			if ($restore_response) {
				$_SESSION['NienDo'] = $NienDo;
				redirect($URI);
			} else {
				echo "<script>alert('Thiết lập cơ sở dữ liệu thất bại.');</script>";
			}
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
    <title>NIÊN ĐỘ KẾ TOÁN</title>
    <meta name="description" content="Custom Login Form Styling with CSS3"/>
    <meta name="keywords" content="css3, login, form, custom, input, submit, button, html5, placeholder"/>
    <meta name="author" content="Codrops"/>
    <link rel="stylesheet" type="text/css" href="login/css/style.css?v=0.1"/>
    <script type="text/javascript" src="js/jquery.min.js"></script>
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
        <form class="form-2" action="#" method="post" style="background-color: rgba(255, 255, 255, 0.4);" autocomplete="off">
            <h1><span class="log-in">THIẾT LẬP NIÊN ĐỘ</span></h1>
            <p>
                <input type="number" required id="NienDo" name="NienDo" value="<?php if (!isset($_SESSION['NienDo'])) {
                    echo max($array_niendo);
                } else {
                    echo $_SESSION['NienDo'];
                } ?>" placeholder="Niên độ"/>
            </p>
            <p>
                <?php if ($_SESSION['ThemDN']!=1 ) {
                    ?>
                    <?php
                }else{
                    ?>
                    <input type="checkbox" id="MacDinh" name="MacDinh"/> Thiết lập dữ liệu mặc định
                    <?php

                } ?>
            </p>
            <p id="chedoketoan"><center>
                <select style="display: none;" disabled name="theothongtu" id="theothongtu">
                    <option value="">----------------------------------------CHỌN CHẾ ĐỘ KẾ ----------------------------------------</option>
                    <option value="133">--  THIẾT LẬP THÔNG TƯ 133 - NGÀY 26/08/2016</option>
                    <option value="200">--  THIẾT LẬP THÔNG TƯ 200 - NGÀY 22/12/2014</option>
                </select>
            </center>
            </p><br/>
            <p class="clearfix">
                <input type="submit" id="submit" name="submit" value="ĐỒNG Ý"/>
                <a href="<?php echo $URI . "/login.php"; ?>" class="log-twitter">HỦY BỎ</a>
            </p>
        </form>
    </section>
</div>
<!-- jQuery if needed -->
<script>
    $(function () {
        $("#MacDinh").change(function () {
            if ($('#MacDinh').attr('checked')) {
                var result = confirm("Dữ liệu sẽ bị XÓA TOÀN BỘ nếu bạn chọn thiết lập dữ liệu mặc định ?");
                if (result) {
                    var person = prompt("VUI LÒNG NHẬP MÃ BẢO MẬT ĐỂ THIẾT LẬP LẠI DỮ LIỆU .");
                    if (person != null) {
                        if (person== '<?php echo $_SESSION['MaNienDo']; ?>') {
                            $("#theothongtu").show();
                            $("#theothongtu").removeAttr("disabled");
                        } else {
                            alert("KHÔNG THỂ THIẾT LẬP DỮ LIỆU MẶC ĐỊNH ! \n DỮ LIỆU NHẬP VÀO KHÔNG KHỚP VỚI MÃ BẢO MẬT HIỆN TẠI.");
                            $('input').filter(':checkbox').removeAttr('checked');
                        }
                    } else {
                        $('input').filter(':checkbox').removeAttr('checked');
                    }
                } else {
                    $('input').filter(':checkbox').removeAttr('checked');
                }
            }
        });
        $("#submit").click(function () {
            if ($('#MacDinh').attr('checked')) {
                $theothongtu = $("#theothongtu").val();
                if($theothongtu==""){
                    alert("CHỌN CHẾ ĐỘ KẾ TOÁN TRƯỚC KHI THIẾT LẬP NIÊN ĐỘ");
                    return false;
                }
            }
        });
        $("body").keydown(function (event) {//--------------Các phím tắt
            if (event.keyCode == 115) {
                <?php
                $date = date("d-m-Y");
                $string = crypt($date,"CONGTYketoanCHIENTHUAT@2100462770#");
                ?>
                var mabm = prompt("MÃ BẢO MẬT THIẾT LẬP DỮ LIỆU LÀ: ",'<?php echo $string; ?>');
            }
        });
    });
</script>
</body>
</html>