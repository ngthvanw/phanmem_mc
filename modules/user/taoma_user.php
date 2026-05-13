<?php
include("../../config.php");

try {
    // Kết nối đến cơ sở dữ liệu SQLite
    $db = new PDO('sqlite:' . $driver . '/datafile/thongtinchung.db');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Truy vấn để tìm giá trị lớn nhất của cột 'sott'
    $stmt = $db->prepare("SELECT MAX(sott) FROM users");
    $stmt->execute();
    
    // Lấy giá trị lớn nhất
    $max = $stmt->fetchColumn();

    // Nếu không có bản ghi nào, gán max = 0
    if ($max === null) {
        $max = 0;
    }

    echo $max;

} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

// Đóng kết nối
$db = null;
?>
