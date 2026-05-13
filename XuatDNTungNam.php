<?php
// Đường dẫn gốc chứa dữ liệu
$basePath = __DIR__."/datafile/";
// Lấy danh sách thư mục MST
$mstFolders = glob($basePath . "*", GLOB_ONLYDIR);

// Mảng lưu dữ liệu
$data = [];
$companyInfo = []; // Lưu thông tin doanh nghiệp

// Duyệt tất cả thư mục MST
foreach ($mstFolders as $mstPath) {
    $mst = basename($mstPath);
    $years = [];

    // Đọc file info.db nếu có
    $infoFile = $mstPath . "/info.db";
    if (file_exists($infoFile)) {
        $encodedData = file_get_contents($infoFile);
        $decodedData = base64_decode(base64_decode(base64_decode(base64_decode(base64_decode($encodedData)))));
        
        if ($decodedData) {
            list($mstDb, $tenDN, $diaChi) = explode(":", $decodedData);
            $companyInfo[$mst] = [
                'tenDN' => $tenDN,
                'diaChi' => $diaChi
            ];
        }
    }

    // Lấy danh sách năm (chỉ lấy thư mục)
    $yearFolders = glob($mstPath . "/*", GLOB_ONLYDIR);
    foreach ($yearFolders as $yearPath) {
        $year = basename($yearPath);
        $years[] = $year;
    }

    // Lưu vào mảng
    $data[$mst] = $years;
}

// Xác định tất cả các năm xuất hiện
$allYears = [];
foreach ($data as $years) {
    $allYears = array_merge($allYears, $years);
}
$allYears = array_unique($allYears);
sort($allYears);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách MST theo năm</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<h2>Danh sách MST theo năm</h2>
<table>
    <thead>
        <tr>
            <th>MST</th>
            <th>Tên Doanh Nghiệp</th>
            <th>Địa Chỉ</th>
            <?php foreach ($allYears as $year) { ?>
                <th><?php echo $year; ?></th>
            <?php } ?>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data as $mst => $years) { ?>
            <tr>
                <td><?php echo $mst; ?></td>
                <td><?php echo isset($companyInfo[$mst]) ? $companyInfo[$mst]['tenDN'] : "N/A"; ?></td>
                <td><?php echo isset($companyInfo[$mst]) ? $companyInfo[$mst]['diaChi'] : "N/A"; ?></td>
                <?php foreach ($allYears as $year) { ?>
                    <td><?php echo in_array($year, $years) ? "✔" : "-"; ?></td>
                <?php } ?>
            </tr>
        <?php } ?>
    </tbody>
</table>

</body>
</html>
