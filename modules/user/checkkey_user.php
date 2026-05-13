<?php
include("../../config.php");

$TenDangNhap = $_GET['tendangnhap'];
$sott = $_GET['sott'];
try {
    // Kết nối đến cơ sở dữ liệu SQLite
    $db = new PDO('sqlite:' . $driver . '/datafile/thongtinchung.db');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	if($sott!=""){
		// Truy vấn để kiểm tra xem người dùng có tồn tại không
		$stmt = $db->prepare("SELECT COUNT(*) FROM users WHERE username = :username AND sott != :sott");
		$stmt->execute([':username' => $TenDangNhap, ':sott' => $sott]);
	}else{
		// Truy vấn để kiểm tra xem người dùng có tồn tại không
		$stmt = $db->prepare("SELECT COUNT(*) FROM users WHERE username = :username");
		$stmt->execute([':username' => $TenDangNhap]);
	}

    $exists = $stmt->fetchColumn();

    // Nếu số lượng kết quả lớn hơn 0, người dùng đã tồn tại với sott khác
    if ($exists > 0) {
        echo 1; // Người dùng tồn tại
    } else {
        echo 0; // Người dùng không tồn tại hoặc cùng sott
    }

} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

// Đóng kết nối
$db = null;
?>
