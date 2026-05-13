<?php
$madoanhnghiep = $_GET["id"];
$khongtontai = 0; // if là 0 thì key này chua có

//** Bước 1: Khởi tạo request
$ch = curl_init();

//** Bước 2: Thiết lập các tuỳ chọn
// Thiết lập URL trong request
$url = "https://thongtindoanhnghiep.co/api/company/" . $madoanhnghiep;

$ch=curl_init();

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,false);

$lines_string=curl_exec($ch); // lấy nội dung theo URL

curl_close($ch); // giải phóng tài liệu sau khi lấy dữ liệu

echo $lines_string; // hiển thị dữ liệuecho $khongtontai;
?>