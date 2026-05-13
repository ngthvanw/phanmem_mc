<?php
include("../../config.php");

try {
    // Kết nối đến cơ sở dữ liệu SQLite
    $db = new PDO('sqlite:' . $driver . '/datafile/thongtinchung.db');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Lấy thông tin từ GET request
    $TenDangNhap = $_GET['tendangnhap'];
    $MatKhau = $_GET['matkhau'];
    $level = $_GET['level'];
    $themdn = $_GET['themdn'] == "" ? 0 : $_GET['themdn'];
    $thongke = $_GET['thongke'] == "" ? 0 : $_GET['thongke'];
    $khoadulieu = $_GET['khoadulieu'];
    $doanhnghiepquanly = $_GET['doanhnghiepquanly'];
    $doanhnghiepquanly_arr = explode(";", $doanhnghiepquanly);

    // Mã hóa mật khẩu nếu cần
    $demmatkhau = strlen($MatKhau);
    $makhaumahoa = $demmatkhau == 32 ? $MatKhau : mahoamotchieu($MatKhau);

    // Chuẩn bị dữ liệu phân quyền
    $permissions_json = json_encode($doanhnghiepquanly_arr);

    // Kiểm tra nếu người dùng tồn tại
    $stmt = $db->prepare("SELECT COUNT(*) FROM users WHERE username = :username");
    $stmt->execute([':username' => $TenDangNhap]);
    $exists = $stmt->fetchColumn();

    if ($exists) {
        // Nếu người dùng đã tồn tại, cập nhật thông tin
        $stmt = $db->prepare("UPDATE users 
                              SET password = :password, level = :level, khoadulieu = :khoadulieu, themdn = :themdn, thongke = :thongke, permissions = :permissions 
                              WHERE username = :username");
        $stmt->execute([
            ':username' => $TenDangNhap,
            ':password' => $makhaumahoa,
            ':level' => $level,
            ':khoadulieu' => $khoadulieu,
            ':themdn' => $themdn,
            ':thongke' => $thongke,
            ':permissions' => $permissions_json
        ]);
    } else {
        // Nếu người dùng chưa tồn tại, chèn người dùng mới
        $stmt = $db->prepare("INSERT INTO users (username, password, level, khoadulieu, themdn, thongke, permissions) 
                              VALUES (:username, :password, :level, :khoadulieu, :themdn, :thongke, :permissions)");
        $stmt->execute([
            ':username' => $TenDangNhap,
            ':password' => $makhaumahoa,
            ':level' => $level,
            ':khoadulieu' => $khoadulieu,
            ':themdn' => $themdn,
            ':thongke' => $thongke,
            ':permissions' => $permissions_json
        ]);
    }

    echo "Cập nhật dữ liệu thành công.";

} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

// Đóng kết nối
$db = null;
?>
