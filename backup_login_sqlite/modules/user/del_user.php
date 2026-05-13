<?php
include("../../config.php");
// Kết nối đến cơ sở dữ liệu SQLite
try {
    $db = new PDO('sqlite:' . $driver . '/datafile/thongtinchung.db');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Nhận dữ liệu từ yêu cầu
    $username = $_GET['ma'];
    
    // Xóa người dùng
    $stmt = $db->prepare("DELETE FROM users WHERE username = :username");
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    echo "User deleted successfully";

} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

// Đóng kết nối
$db = null;
?>
