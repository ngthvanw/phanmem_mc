<?php
header('Content-Type: text/html; charset=utf-8');

$host = 'localhost';
$user = 'root';
$pass = ''; // thay bằng mật khẩu nếu có

try {
    $pdo = new PDO("mysql:host=$host", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Lấy danh sách database bắt đầu bằng tv02_
    $stmt = $pdo->query("SHOW DATABASES LIKE 'tv02_%'");
    $databases = $stmt->fetchAll(PDO::FETCH_COLUMN);

    if (empty($databases)) {
        echo "<p>Không tìm thấy database nào bắt đầu bằng 'tv02_'.</p>";
        exit;
    }

    if (!isset($_POST['confirm'])) {
        echo "<h3>Danh sách database sẽ xóa:</h3><ul>";
        foreach ($databases as $db) {
            echo "<li>$db</li>";
        }
        echo "</ul>";
        echo '<form method="post">';
        echo '<input type="hidden" name="confirm" value="yes">';
        echo '<button type="submit">Xác nhận xóa tất cả</button>';
        echo '</form>';
        exit;
    }

    echo "<h3>Đang xóa các database:</h3><ul>";
    foreach ($databases as $db) {
        $pdo->exec("DROP DATABASE `$db`");
        echo "<li>Đã xóa: $db</li>";
    }
    echo "</ul><p>Hoàn tất!</p>";

} catch (PDOException $e) {
    echo "<p>Lỗi: " . $e->getMessage() . "</p>";
}
?>
