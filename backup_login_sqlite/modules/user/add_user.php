<?php
include("../../config.php");

$TenDangNhap = $_GET['tendangnhap'];
$MatKhau = $_GET['matkhau'];
$level = $_GET['level'];
$themdn = $_GET['themdn'];
$thongke = $_GET['thongke'];
$khoadulieu = $_GET['khoadulieu'];

$doanhnghiepquanly = $_GET['doanhnghiepquanly'];
$doanhnghiepquanly_arr = explode(";", $doanhnghiepquanly);

$demmatkhau = strlen($MatKhau);
$makhaumahoa = "";
if($demmatkhau == 32){
    $makhaumahoa = $MatKhau;
} else {
    $makhaumahoa = mahoamotchieu($MatKhau);
}

// Kết nối đến cơ sở dữ liệu SQLite
try {
    $db = new PDO('sqlite:' . $driver . '/datafile/thongtinchung.db');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Truy vấn tìm giá trị lớn nhất của cột `sott`
    $stmt = $db->query("SELECT MAX(sott) AS max_sott FROM users");
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $max_sott = isset($result['max_sott']) ? (int)$result['max_sott'] : 0;

    // Tính giá trị mới cho `sott`
    $sott = $max_sott + 1;

    // Cập nhật hoặc thêm mới thông tin người dùng vào bảng users
    $stmt = $db->prepare("
        INSERT OR REPLACE INTO users (username, password, level, khoadulieu, sott, themdn, thongke, permissions)
        VALUES (:username, :password, :level, :khoadulieu, :sott, :themdn, :thongke, :permissions)
    ");
    $stmt->execute([
        ':username' => $TenDangNhap,
        ':password' => $makhaumahoa,
        ':level' => $level,
        ':khoadulieu' => $khoadulieu,
        ':sott' => $sott,
        ':themdn' => $themdn,
        ':thongke' => $thongke,
        ':permissions' => json_encode($doanhnghiepquanly_arr) // Thêm thông tin phân quyền vào cột permissions
    ]);

    echo "{\"recId\": \"" . ($sott) . "\"}";

} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

// Đóng kết nối
$db = null;
?>
