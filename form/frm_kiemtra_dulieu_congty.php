<?php
function zipFolder($sourceDir, $zipFile) {
    if (!is_dir($sourceDir)) {
        return "Thư mục không tồn tại: $sourceDir";
    }

    $zip = new ZipArchive();
    if ($zip->open($zipFile, ZipArchive::CREATE | ZipArchive::OVERWRITE)) {
        $files = new RecursiveIteratorIterator(
            new RecursiveDirectoryIterator($sourceDir, RecursiveDirectoryIterator::SKIP_DOTS),
            RecursiveIteratorIterator::LEAVES_ONLY
        );

        foreach ($files as $file) {
            $filePath = $file->getRealPath();
            $relativePath = substr($filePath, strlen($sourceDir) + 1);
            $zip->addFile($filePath, $relativePath);
        }

        $zip->close();
        return true;
    } else {
        return "Không thể tạo file zip.";
    }
}

$thongBao = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $thuMuc = trim($_POST['duongdan']);
    $zipName = 'backup.zip';

    $ketQua = zipFolder($thuMuc, $zipName);
    if ($ketQua === true) {
        $thongBao = "✅ Đã nén thành công. <a href='?download=1'>Tải file tại đây</a>";
    } else {
        $thongBao = "❌ Lỗi: " . $ketQua;
    }
}

// Nếu yêu cầu tải file
if (isset($_GET['download']) && file_exists('backup.zip')) {
    header('Content-Type: application/zip');
    header('Content-Disposition: attachment; filename="backup.zip"');
    header('Content-Length: ' . filesize('backup.zip'));
    readfile('backup.zip');
    exit;
}

// Lấy thư mục hiện tại
$thuMucHienTai = getcwd();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Nén thư mục và tải về</title>
</head>
<body>
    <h2>Nén thư mục và tải về</h2>

    <p><strong>📂 Thư mục hiện tại:</strong> <?php echo $thuMucHienTai; ?></p>

    <form method="post">
        <label>Nhập đường dẫn thư mục cần nén:</label><br>
        <input type="text" name="duongdan" style="width:400px" required placeholder="Ví dụ: <?php echo $thuMucHienTai; ?>/myfolder"><br><br>
        <input type="submit" value="Nén thư mục">
    </form>

    <p style="color: green;"><?php echo $thongBao; ?></p>
</body>
</html>
