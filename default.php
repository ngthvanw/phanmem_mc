<?php
if (!ini_get('date.timezone')) {
    date_default_timezone_set('Asia/Ho_Chi_Minh');
}
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);
$_SESSION['TuNgay'] = $_SESSION['NienDo'] . "-01-01";
$_SESSION['DenNgay'] = $_SESSION['NienDo'] . "-" . date("12-31");

require("include/header.php");
require("config.php");
function load_khoadulieuchidoc($dir)
{
    $fp1 = @fopen($dir . "/" . 'khoadulieu.db', "r"); // đọc thông tin chung
    $string_info = fgets($fp1);
    fclose($fp1);
    if ($string_info == "") {
        $string_info = 0;
    }
    return ($string_info);
}

if (!isset($_SESSION['User'])) {
    session_destroy();
    redirect("login.php");
} else {
    $rd = getcwd();
    $arr_root_source = preg_split('/[\\\\\/]+/', trim($rd));
    $root_source = end($arr_root_source);
    if ($root_source != $_SESSION['TOKEN']) {
        session_destroy();
        redirect("login.php");
    }
}
if (!isset($_SESSION['NienDo'])) {
    ?>
    <script>
        $(document).keydown(function (event) { // Xóa dialog bằng ESCAPE-----------------------------
            if ($('div').hasClass('jconfirm') == true) {
                return false;
            }
        });
        if ($('div').hasClass('jconfirm') == false) {
            $.confirm({
                title: 'Thông báo',
                content: ' Vui lòng chọn niên độ ?<br/>Nhấn phím <strong style="color:blue;">[Y]</strong> để đồng ý ',
                icon: 'fa fa-warning',
                type: 'red',
                buttons: {
                    "Đồng ý": {
                        keys: ['Y'], action: function () {
                            window.location = "<?php echo $URI . "/niendo.php" ?>";
                        }
                    }
                }
            });
        }
        ;
    </script>
    <?php
} else {

    $OBJCT = new ps_chitiet_mavattu();
    $OBJPSKT = new pskt();
    $OBJCT->xoachitietvattu();
    $OBJPSKT->xoaCTPSKT_DuThua();

    $sql = "select * from kyketoan";
    $res = $OBJPSKT->re_query($sql);
    $data = $OBJPSKT->re_fetch($res);

    if ($data['tungay'] == '') {
        $_SESSION['kyketoan_tungay'] = $_SESSION['NienDo'] . "-01-01";
        $_SESSION['kyketoan_denngay'] = $_SESSION['NienDo'] . "-12-31";
    } else {
        $_SESSION['kyketoan_tungay'] = $data['tungay'];
        $_SESSION['kyketoan_denngay'] = $data['denngay'];
    }
    $_SESSION['TuNgay'] = $_SESSION['kyketoan_tungay'];
    $_SESSION['DenNgay'] = $_SESSION['kyketoan_denngay'];
    function LayQuy($thang,$nam)
    {
        switch ($thang) {
            case 1:
                $Quy = 'I';
                break;
            case 2:
                $Quy = 'I';
                break;
            case 3:
                $Quy = 'I';
                break;
            case 4:
                $Quy = 'II';
                break;
            case 5:
                $Quy = 'II';
                break;
            case 6:
                $Quy = 'II';
                break;
            case 7:
                $Quy = 'III';
                break;
            case 8:
                $Quy = 'III';
                break;
            case 9:
                $Quy = 'III';
                break;
            case 10:
                $Quy = 'IV';
                break;
            case 11:
                $Quy = 'IV';
                break;
            case 12:
                $Quy = 'IV';
                break;
        }
        return $Quy.'-'.$nam;
    }
    $_SESSION['kyketoan_quybatdau'] = LayQuy(date("n",strtotime($_SESSION['kyketoan_tungay'])),date("Y",strtotime($_SESSION['kyketoan_tungay'])));
    $_SESSION['kyketoan_quyketthuc'] = LayQuy(date("n",strtotime($_SESSION['kyketoan_denngay'])),date("Y",strtotime($_SESSION['kyketoan_denngay'])));
    function them_ppkhaithue($dir){
        $OBJ = new ps_chitiet_mavattu();
        $sql = "select noidung from thongtinchung where sott = 2";
        $res = $OBJ->re_query($sql);
        $data = $OBJ->re_fetch($res);
        if($data['noidung']!=""){// Nếu có đăng ký phương pháp kê khai
            $str = $data['noidung'];
            $fp = @fopen($dir . "/phuongphapkhaithue.db", "w");
            fwrite($fp,$str);
            fclose($fp);
        }
    }
    them_ppkhaithue($driver."/datafile/".$_SESSION['MST']."/".$_SESSION['NienDo']);
	?>
	    <script>
		/*$(function () {
			const mst = "<?php echo $_SESSION['MST']; ?>"; // Thay MST của người dùng
			const nam = "<?php echo $_SESSION['NienDo']; ?>"; // Thay Năm của người dùng
			const user = "<?php echo $_SESSION['User']; ?>"; // Lấy thông tin user từ trình duyệt

			let lastAction = ""; // Lưu hành động gần nhất để tránh lặp lại
        let lastElement = null; // Lưu phần tử cuối cùng được chọn
        let lastTime = 0; // Lưu thời gian click gần nhất

        function logAction(action, element) {
            let time = new Date().toISOString().slice(0, 19).replace("T", " ");
            let tag = element.prop("tagName");
            let id = element.attr("id") ? `#${element.attr("id")}` : "";
            let classes = element.attr("class") ? `.${element.attr("class").replace(/\s+/g, '.')}` : "";
            let text = element.text().trim().substring(0, 100);
            let value = element.val() || "";

            let details = `[${tag}${id}${classes}]`;
            if (text) details += ` | Nội dung: "${text}"`;
            if (value) details += ` | Giá trị: "${value}"`;

            let logMessage = `${action} ${details}`;

            // Kiểm tra nếu trùng nội dung thì bỏ qua
            if (logMessage === lastAction) return;

            // Gửi dữ liệu lên server
            fetch("log.php", {
                method: "POST",
                headers: { "Content-Type": "application/x-www-form-urlencoded" },
                body: `mst=${mst}&nam=${nam}&user=${encodeURIComponent(user)}&action=${encodeURIComponent(logMessage)}&time=${encodeURIComponent(time)}`
            });

            lastAction = logMessage;
            lastElement = element;
            lastTime = Date.now();
            console.log(logMessage);
        }

        // Giảm log trùng khi click nhiều lần cùng một chỗ
        $(document).on("click", function (e) {
            let target = $(e.target);
            let now = Date.now();

            if (target.is(lastElement) && (now - lastTime < 1000)) return; // Bỏ qua nếu click trùng trong 1 giây

            logAction("Click", target);
        });

        // Theo dõi focus nhưng tránh ghi log trùng liên tục
        $(document).on("focus", "input, textarea, select, button, a", function () {
            if ($(this).is(lastElement)) return;
            logAction("Chọn phần tử", $(this));
        });

        // Theo dõi nhập input, chỉ ghi khi giá trị thay đổi
        $(document).on("input", "input, textarea", function () {
            if ($(this).val() === lastElement?.val()) return;
            logAction("Nhập văn bản", $(this));
        });

        // Theo dõi thay đổi select, tránh log trùng
        $(document).on("change", "select", function () {
            logAction("Chọn giá trị", $(this));
        });

        // Theo dõi nhấn phím, tránh log phím trùng lặp liên tục
        $(document).on("keydown", function (e) {
            if (e.key === lastAction) return;
            logAction(`Nhấn phím: ${e.key}`, $(e.target));
        });
		});
		*/	
    </script>
	<?php
}
if (isset($_SESSION['Level']) && (string)$_SESSION['Level'] === "6") {
    require("include/topmenu_partner_hnd.php");
} else if($_SESSION['theothongtu'] == "tt18"){
    require("include/topmenu_hkd.php");
}else{
    require("include/topmenu.php");
}
?>
<tr>
    <td style="vertical-align: top;width: 0%;"><!-- left -->
    <td style="vertical-align: top;width: 100%;"><!-- noi dung phan mem -->
	<center>
        <div style="margin: 0 auto;" class="box-content-body">
            <div class="box-content-head-body"></div>
            <div class="box-content-main-body">
                <?php
					$Page = $_GET['act'];
					if($Page==""){
						require("include/body_menu.php");
					}
                ?>

            </div>
        </div>
		</center>
    </td>
</tr>
<?php require("include/bottom.php"); ?>
