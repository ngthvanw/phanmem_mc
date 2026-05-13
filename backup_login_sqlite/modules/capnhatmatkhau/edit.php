<?php
include("../../config.php");
try {
    // Connect to SQLite database
    $db = new PDO("sqlite:" . $driver . "/datafile/thongtin.db");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Get username and password from the request
    $TenDangNhap = $_GET['user'];
    $MatKhau = $_GET['pass'];
    $encryptedPassword = mahoamotchieu($MatKhau);  // Encrypt the password

    // Update the user's password in the database
    $stmt = $db->prepare("UPDATE user SET password = :password WHERE username = :username");
    $stmt->bindValue(':username', $TenDangNhap);
    $stmt->bindValue(':password', $encryptedPassword);

    // Execute the query
    if ($stmt->execute()) {
        $_SESSION['YeuCauDoiMK'] = 0;  // Reset session request if needed
        echo "Cập nhật mật khẩu thành công.";
    } else {
        echo "Lỗi cập nhật mật khẩu.";
    }

} catch (PDOException $e) {
    echo "Database error: " . $e->getMessage();
}
?>
