<?php
session_start();

function create_image()
{
    // Tạo mã bảo mật ngẫu nhiên
    $md5_hash = md5(time() . "ABCDEFGHJKLMNPRSTUVWXYZabcdefghjkmnprstuvwxyz");
    $security_code = strtoupper(substr($md5_hash, 15, 5));
    $_SESSION["security_code"] = $security_code;

    // Kích thước hình ảnh
    $width = 180;
    $height = 30;

    // Tạo hình ảnh
    $im = imagecreate($width, $height);

    // Tạo màu sắc
    $background_color = ImageColorAllocate($im, 173, 216, 230); // Màu nền
    $text_color = ImageColorAllocate($im, 0, 0, 139); // Màu chữ

    // Đường dẫn tới file font, hãy đảm bảo rằng file tồn tại tại vị trí này
    $font_path = __DIR__ . '/login/font/hlnetco1.TTF';

    // Kiểm tra nếu font tồn tại
    if (!file_exists($font_path)) {
        die("Font không tồn tại tại đường dẫn: $font_path");
    }

    // Vẽ mã bảo mật lên ảnh
    imagettftext($im, 15, 0, 55, 23, $text_color, $font_path, $security_code);

    // Đặt header để hiển thị hình ảnh PNG
    header('Content-Type: image/png');
    imagepng($im);

    // Giải phóng bộ nhớ
    imagedestroy($im);
}

// Gọi hàm tạo ảnh
create_image();
exit();
?>
