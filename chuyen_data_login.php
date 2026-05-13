<?php
include("config.php");

// Kết nối đến cơ sở dữ liệu SQLite
try {
    $db = new PDO('sqlite:' . $driver . '/datafile/thongtinchung.db');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Tạo bảng users nếu chưa tồn tại, thêm cột permissions
    $db->exec("CREATE TABLE IF NOT EXISTS users (
        username TEXT PRIMARY KEY,
        password TEXT,
        level INTEGER,
        khoadulieu TEXT,
        sott INTEGER,
        themdn TEXT,
        thongke TEXT,
        permissions TEXT
    )");

    // Đọc và chuyển dữ liệu từ file user.db
    $userFile = $driver . '/datafile/user.db';
    if (file_exists($userFile)) {
        $fp = fopen($userFile, 'r');
        while (($line = fgets($fp)) !== false) {
            $data = explode(':', trim($line));
            if (count($data) >= 7) { // Đảm bảo có đủ trường
                $stmt = $db->prepare("INSERT OR REPLACE INTO users (username, password, level, khoadulieu, sott, themdn, thongke, permissions) 
                                      VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
                $stmt->execute(array_merge($data, [""])); // Tạm thời để permissions là rỗng
            }
        }
        fclose($fp);
    }

    // Đọc và chuyển dữ liệu từ file phanquyen.db vào cột permissions của bảng users
    $phanquyenFile = $driver . '/datafile/phanquyen.db';
    if (file_exists($phanquyenFile)) {
        $fp = fopen($phanquyenFile, 'r');
        $permissions = fgets($fp);
        fclose($fp);
        
        $permissionsArr = json_decode($permissions, true);
        foreach ($permissionsArr as $username => $perms) {
            $stmt = $db->prepare("UPDATE users SET permissions = ? WHERE username = ?");
            $stmt->execute([json_encode($perms), $username]);
        }
    }

    echo "Dữ liệu đã được chuyển vào SQLite thành công.";

} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

// Đóng kết nối
$db = null;
?>
