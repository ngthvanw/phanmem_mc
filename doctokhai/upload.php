<?php	
$uploadDir = "uploads/"; // Thư mục lưu file
if (!is_dir($uploadDir)) mkdir($uploadDir, 0777, true); // Tạo thư mục nếu chưa có
// Xóa tất cả file XML cũ trước khi tải mới
array_map('unlink', glob($uploadDir . "*.xml"));

// Kiểm tra file được tải lên
$messages = [];
if (!empty($_FILES["files"]["name"][0])) {
    foreach ($_FILES["files"]["tmp_name"] as $key => $tmp_name) {
        $fileName = basename($_FILES["files"]["name"][$key]);
        $filePath = $uploadDir . $fileName;

        if (move_uploaded_file($tmp_name, $filePath)) {
            $messages[] = "<div class='success'>✅ Tải lên thành công: <strong>$fileName</strong></div>";
        } else {
            $messages[] = "<div class='error'>❌ Lỗi tải lên: <strong>$fileName</strong></div>";
        }
    }
} else {
    $messages[] = "<div class='warning'>⚠️ Vui lòng chọn file!</div>";
}

$databaseFile = "thongtinchung.db"; // Đường dẫn SQLite
$folder = "uploads"; // Thư mục chứa file XML

// Kết nối SQLite bằng PDO
try {
    $db = new PDO('sqlite:' . $databaseFile);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Lỗi kết nối SQLite: " . $e->getMessage());
}

// Tạo bảng nếu chưa có
$db->exec("CREATE TABLE IF NOT EXISTS tokhai (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    ten_file TEXT,
    mst TEXT,
    ky_khai TEXT,
    ky_khai_sort INTEGER,
    lan_ke_khai INTEGER,
    loai_tk TEXT,
    thue_khau_tru REAL,
    gia_tri_mua REAL,
    thue_mua REAL,
    doanh_thu REAL,
    thue_ban REAL,
    ct37 REAL,
    ct38 REAL,
    thue_con_no REAL
)");

// Xóa dữ liệu cũ để cập nhật mới
$db->exec("DELETE FROM tokhai");

// Lấy danh sách file XML
$files = glob("$folder/*.xml");

if (empty($files)) {
    die("Không tìm thấy file XML nào.");
}

// Đọc từng file XML và lưu vào SQLite
foreach ($files as $file) {
    $ten_file = basename($file); // Lấy tên tập tin
    $xml = simplexml_load_file($file) or die("Không thể đọc file XML: $file");

    // Định nghĩa namespace
    $namespaces = $xml->getNamespaces(true);
    $xml->registerXPathNamespace('ns', $namespaces['']);

    // Lấy thông tin doanh nghiệp
    $companyInfo = $xml->xpath("//ns:HSoKhaiThue/ns:TTinChung/ns:TTinTKhaiThue/ns:NNT")[0];

    // Lấy danh sách tờ khai
    $tKhaiList = $xml->xpath("//ns:HSoKhaiThue/ns:TTinChung/ns:TTinTKhaiThue/ns:TKhaiThue");
    $cTieuList = $xml->xpath("//ns:HSoKhaiThue/ns:CTieuTKhaiChinh");

    foreach ($tKhaiList as $index => $tkhai) {
        $loai_tk = ((string)$tkhai->loaiTKhai == "C") ? "Chính thức" : "Bổ sung";
        
        // Định dạng kỳ kê khai thành "YYYY-MM"
        $ky_khai_raw = (string)$tkhai->KyKKhaiThue->kyKKhai;
        $ky_khai_nam = substr($ky_khai_raw, 0, 4);
        $ky_khai_thang = str_pad(substr($ky_khai_raw, -2), 2, "0", STR_PAD_LEFT);
        $ky_khai = $ky_khai_raw;
        $ky_khai_sort = (int)$ky_khai_nam * 100 + (int)$ky_khai_thang;

        // Lưu vào SQLite
        $stmt = $db->prepare("INSERT INTO tokhai 
            (ten_file, mst, ky_khai, ky_khai_sort, lan_ke_khai, loai_tk, thue_khau_tru, gia_tri_mua, thue_mua, doanh_thu, thue_ban, ct37, ct38, thue_con_no) 
            VALUES (:ten_file, :mst, :ky_khai, :ky_khai_sort, :lan_ke_khai, :loai_tk, :thue_khau_tru, :gia_tri_mua, :thue_mua, :doanh_thu, :thue_ban, :ct37, :ct38, :thue_con_no)");
        $stmt->bindValue(':ten_file', $ten_file, PDO::PARAM_STR);
        $stmt->bindValue(':mst', (string)$companyInfo->mst, PDO::PARAM_STR);
        $stmt->bindValue(':ky_khai', $ky_khai, PDO::PARAM_STR);
        $stmt->bindValue(':ky_khai_sort', $ky_khai_sort, PDO::PARAM_INT);
        $stmt->bindValue(':lan_ke_khai', (int)$tkhai->soLan, PDO::PARAM_INT);
        $stmt->bindValue(':loai_tk', $loai_tk, PDO::PARAM_STR);
        $stmt->bindValue(':thue_khau_tru', (float)$cTieuList[$index]->ct22, PDO::PARAM_STR);
        $stmt->bindValue(':gia_tri_mua', (float)$cTieuList[$index]->GiaTriVaThueGTGTHHDVMuaVao->ct23, PDO::PARAM_STR);
        $stmt->bindValue(':thue_mua', (float)$cTieuList[$index]->GiaTriVaThueGTGTHHDVMuaVao->ct24, PDO::PARAM_STR);
        $stmt->bindValue(':doanh_thu', (float)$cTieuList[$index]->TongDThuVaThueGTGTHHDVBRa->ct34, PDO::PARAM_STR);
        $stmt->bindValue(':thue_ban', (float)$cTieuList[$index]->TongDThuVaThueGTGTHHDVBRa->ct35, PDO::PARAM_STR);
        $stmt->bindValue(':ct37', (float)$cTieuList[$index]->ct37, PDO::PARAM_STR);
        $stmt->bindValue(':ct38', (float)$cTieuList[$index]->ct38, PDO::PARAM_STR);
        $stmt->bindValue(':thue_con_no', (float)$cTieuList[$index]->ct41, PDO::PARAM_STR);
        $stmt->execute();
    }
}

// Truy vấn dữ liệu đã sắp xếp từ SQLite
$result = $db->query("SELECT * FROM tokhai ORDER BY ky_khai_sort ASC, lan_ke_khai ASC");
// Truy vấn tổng cộng
$total = $db->query("SELECT 
    SUM(thue_khau_tru) AS total_thue_khau_tru,
    SUM(gia_tri_mua) AS total_gia_tri_mua,
    SUM(thue_mua) AS total_thue_mua,
    SUM(doanh_thu) AS total_doanh_thu,
    SUM(thue_ban) AS total_thue_ban,
    SUM(ct37) AS total_ct37,
    SUM(ct38) AS total_ct38,
    SUM(thue_con_no) AS total_thue_con_no
 FROM tokhai")->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Tờ Khai GTGT - SQLite</title>
    <style>
        table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: center; }
        th { background-color: #f2f2f2; }
        .bold { font-weight: bold; }
        .highlight { background-color: yellow; }
				#exportExcel {
			background-color: #28a745; /* Màu xanh lá */
			color: white; /* Chữ màu trắng */
			font-size: 16px;
			font-weight: bold;
			padding: 10px 20px;
			border: none;
			border-radius: 8px;
			cursor: pointer;
			transition: 0.3s;
			display: inline-flex;
			align-items: center;
			gap: 8px;
		}
		#exportExcel:hover {
			background-color: #218838; /* Màu xanh đậm hơn khi hover */
		}
		#exportExcel:active {
			background-color: #1e7e34;
		}
		 /* CSS Thông báo */
        .success {
            background: #d4edda;
            color: #155724;
            padding: 10px;
            border-radius: 5px;
            margin: 10px 0;
            border-left: 5px solid #28a745;
        }
        .error {
            background: #f8d7da;
            color: #721c24;
            padding: 10px;
            border-radius: 5px;
            margin: 10px 0;
            border-left: 5px solid #dc3545;
        }
        .warning {
            background: #fff3cd;
            color: #856404;
            padding: 10px;
            border-radius: 5px;
            margin: 10px 0;
            border-left: 5px solid #ffc107;
        }
    </style>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
	<script>
	document.addEventListener("DOMContentLoaded", function () {
		document.getElementById("exportExcel").addEventListener("click", function () {
			let table = document.getElementById("chitiet_tokhai"); // Lấy đúng bảng theo ID
			let wb = XLSX.utils.book_new(); // Tạo workbook
			let ws = XLSX.utils.table_to_sheet(table); // Chuyển bảng thành sheet
			XLSX.utils.book_append_sheet(wb, ws, "Tờ Khai GTGT"); // Thêm sheet vào workbook
			XLSX.writeFile(wb, "ToKhai_GTGT.xlsx"); // Xuất file Excel
		});
	});
	</script>
</head>
<body>
<h2><a href='index.php'>📂 Kết Quả Tải Lên</a></h2>
<?php
	// Hiển thị thông báo
	foreach ($messages as $message) {
		echo $message;
	}
?>

<h2>Thông Tin Doanh Nghiệp</h2>
<table>
    <tr><th>Mã số thuế</th><td><?= $companyInfo->mst ?></td></tr>
    <tr><th>Tên doanh nghiệp</th><td><?= $companyInfo->tenNNT ?></td></tr>
    <tr><th>Địa chỉ</th><td><?= $companyInfo->dchiNNT ?></td></tr>
</table>
<h2>Chỉ Tiêu Tờ Khai Thuế GTGT</h2>
<button id="exportExcel">Xuất Excel</button>
<table id="chitiet_tokhai">
    <tr>
        <th>STT</th>
        <th>Mã số thuế</th>
        <th>Kỳ kê khai</th>
        <th>Lần kê khai</th>
        <th>Loại tờ khai</th>
        <th>Thuế GTGT khấu trừ kỳ trước</th>
        <th>Giá trị HHDV mua vào</th>
        <th>Thuế GTGT HHDV mua vào</th>
        <th>Doanh thu HHDV bán ra</th>
        <th>Thuế GTGT HHDV bán ra</th>
        <th>Điều chỉnh giảm</th>
        <th>Điều chỉnh tăng</th>
        <th>Thuế GTGT còn phải nộp</th>
		<th>Tên tập tin</th>
    </tr>
    <?php $index = 1; while ($row = $result->fetch(PDO::FETCH_ASSOC)): ?>
    <tr>
        <td><?= $index++ ?></td>
        <td><?= $row['mst'] ?></td>
        <td><?= $row['ky_khai'] ?></td>
        <td><?= $row['lan_ke_khai'] ?></td>
        <td><?= $row['loai_tk'] ?></td>
        <td><?= number_format($row['thue_khau_tru'], 0, ',', '.') ?></td>
        <td><?= number_format($row['gia_tri_mua'], 0, ',', '.') ?></td>
        <td><?= number_format($row['thue_mua'], 0, ',', '.') ?></td>
        <td><?= number_format($row['doanh_thu'], 0, ',', '.') ?></td>
        <td><?= number_format($row['thue_ban'], 0, ',', '.') ?></td>
        <td><?= number_format($row['ct37'], 0, ',', '.') ?></td>
        <td><?= number_format($row['ct38'], 0, ',', '.') ?></td>
        <td><?= number_format($row['thue_con_no'], 0, ',', '.') ?></td>
		<td><?= $row['ten_file'] ?></td>
    </tr>
    <?php endwhile; ?>
	<!-- Hàng Tổng Cộng -->
    <tr class="bold">
        <td colspan="5">TỔNG CỘNG</td>
        <td><?= number_format($total['total_thue_khau_tru'], 0, ',', '.') ?></td>
        <td><?= number_format($total['total_gia_tri_mua'], 0, ',', '.') ?></td>
        <td><?= number_format($total['total_thue_mua'], 0, ',', '.') ?></td>
        <td><?= number_format($total['total_doanh_thu'], 0, ',', '.') ?></td>
        <td><?= number_format($total['total_thue_ban'], 0, ',', '.') ?></td>
        <td><?= number_format($total['total_ct37'], 0, ',', '.') ?></td>
        <td><?= number_format($total['total_ct38'], 0, ',', '.') ?></td>
        <td><?= number_format($total['total_thue_con_no'], 0, ',', '.') ?></td>
        <td></td>
    </tr>
</table>

</body>
</html>
