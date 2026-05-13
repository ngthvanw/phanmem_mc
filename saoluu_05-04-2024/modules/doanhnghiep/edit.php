<?php
session_start();
ini_set('max_execution_time', 300);
require("../../config.php");
$MST = $_SESSION['MST'];
$TenCongTy = $_GET['TenDN'];
$DiaChi = $_GET['DiaChi'];
$QuanHuyen = $_GET['QuanHuyen'];
$ThanhPho = $_GET['ThanhPho'];
$DienThoai = $_GET['DienThoai'];
$Email = $_GET['Email'];
$LoaiHinh = $_GET['LoaiHinh'];

$LoaiHinhDoanhNghiep = $_GET['LoaiHinhDoanhNghiep'];
$HinhThucSoHuuVon = $_GET['HinhThucSoHuuVon'];
$LinhVucKinhDoanh = $_GET['LinhVucKinhDoanh'];
$NganhNgheKinhDoanh = trim($_GET['NganhNgheKinhDoanh']);


$dir = $driver . "/datafile/" . $MST . "/";
$str = $MST . ":" . $TenCongTy . ":" . $DiaChi.":" . $QuanHuyen.":" . $ThanhPho.":" . $DienThoai.":" . $Email.":".$LoaiHinh.":".$HinhThucSoHuuVon.":".$LinhVucKinhDoanh.":".$NganhNgheKinhDoanh.":".$LoaiHinhDoanhNghiep;
$congty = mahoa2chieu($str);
if ($handle = opendir($dir)) {
    while ($entry = readdir($handle)) {
        if (is_dir($dir . "/" . $entry) && $entry != "." && $entry != "..") {
        }
    }
    closedir($handle);
}
$fp = @fopen($dir . "info.db", "w");
// Ki?m tra file m? thành công không
$string = "";
if (!$fp) {
    echo 'Mở file không thành công ';
} else {
    $_SESSION['TenCongTy'] = $TenCongTy;
    $_SESSION['DiaChi'] = $DiaChi;
    $_SESSION['QuanHuyen'] = $QuanHuyen;
    $_SESSION['ThanhPho'] = $ThanhPho;
    $_SESSION['DienThoai'] = $DienThoai;
    $_SESSION['Email'] = $Email;
    $_SESSION['LoaiHinh'] = $LoaiHinh;

    $_SESSION['LoaiHinhDoanhNghiep'] = $LoaiHinhDoanhNghiep;
    $_SESSION['LinhVucKinhDoanh'] = $LinhVucKinhDoanh;
    $_SESSION['NganhNgheKinhDoanh'] = $NganhNgheKinhDoanh;
    $_SESSION['HinhThucSoHuuVon'] = $HinhThucSoHuuVon;
    fwrite($fp, $congty);
    fclose($fp);
}
?>