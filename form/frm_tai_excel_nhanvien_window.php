<?php
require '../phpexcel/SimpleXLSX.php';
require("../config.php");


$BCT = new baocaothue();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Kiểm tra nếu file được upload
    if (isset($_FILES['excel_file'])) {
        $file = $_FILES['excel_file']['tmp_name'];
		
        // Đọc file Excel sử dụng SimpleXLSX
        if ($xlsx = SimpleXLSX::parse($file)) {

            // Lấy hàng đầu tiên (Header) làm tên cột
            $header = $xlsx->rows()[0]; // Hàng đầu tiên là tiêu đề
            // Xây dựng câu lệnh INSERT với tên cột từ tiêu đề
            $columns = implode(', ', $header); // Kết hợp các tiêu đề thành chuỗi
			
            // Lặp qua các hàng dữ liệu, bắt đầu từ hàng thứ 2 (hàng 1 chứa tiêu đề)
			$count_data = count($xlsx->rows());
			$BCT->re_query("delete from manhanvien");
            for ($i = 1; $i < $count_data; $i++) {
                $row = $xlsx->rows()[$i];
				
                // Chuẩn bị các giá trị của hàng hiện tại để thêm vào SQL
                $values = array_map(function($value) {
                    return "'" . htmlspecialchars($value) . "'"; // Xử lý giá trị từng cột
                }, $row);
                $values = implode(', ', $values); // Kết hợp các giá trị thành chuỗi

                // Tạo câu lệnh SQL INSERT
                $sql = "INSERT INTO manhanvien ($columns) VALUES ($values);";

                // Thực hiện câu lệnh SQL				
				if ($BCT->re_query($sql)) {
					$results[] = [
						'status' => 'Thành công',
						'data' => $row
					];
				} else {
					// Thêm thất bại
					$results[] = [
						'status' => 'Lỗi: ' . $BCT->re_error($sql),
						'data' => $row
					];
				}
            }
            // Hiển thị kết quả
			echo "<h2>Kết quả tải lên:</h2>";
			echo "<table>
					<tr>
						<th>Trạng thái</th>
						<th>STT</th>
						<th>Mã Nhân Viên</th>
						<th>Tên Nhân Viên</th>
						<th>CMND/CCCD</th>
					</tr>";
			foreach ($results as $result) {
				$statusClass = strpos($result['status'], 'Lỗi') !== false ? 'status-error' : 'status-success';
				echo "<tr>
						<td class='{$statusClass}'>{$result['status']}</td>
						<td>{$result['data'][0]}</td>
						<td>{$result['data'][1]}</td>
						<td>{$result['data'][2]}</td>
						<td>{$result['data'][3]}</td>
					</tr>";
			}
			echo "</table>";
        } else {
            echo SimpleXLSX::parseError();
        }
    } else {
        echo "Vui lòng chọn file hợp lệ.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tải tập tin</title>
    <style>
        body {
			font-family: Arial, sans-serif;
			background-color: #e0e0e0; /* Màu nền tối hơn */
			margin: 0;
			padding: 20px;
		}
        .container {
			max-width: 600px;
			margin: 0 auto;
			background: white;
			padding: 20px;
			border-radius: 5px;
			box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
			border: 2px solid #5cb85c; /* Viền màu xanh lá */
		}
       h2 {
			text-align: center;
			color: #333; /* Màu chữ */
			font-size: 24px; /* Kích thước chữ */
			margin-bottom: 20px; /* Khoảng cách dưới */
			font-weight: bold; /* Đậm chữ */
			text-transform: uppercase; /* Chữ hoa */
			border-bottom: 2px solid #5cb85c; /* Đường dưới */
			padding-bottom: 10px; /* Khoảng cách dưới đường */
		}

        form {
            display: flex;
            flex-direction: column;
        }
        input[type="file"], input[type="submit"] {
            padding: 10px;
            margin: 10px 0;
        }
        input[type="submit"] {
            background-color: #28a745;
            color: white;
            border: none;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #218838;
        }
		/* Định dạng bảng kết quả */
		table {
			width: 100%;
			border-collapse: collapse;
			margin-top: 20px;
		}

		th, td {
			padding: 10px;
			text-align: left;
			border: 1px solid #ddd;
		}

		th {
			background-color: #5cb85c;
			color: white;
		}

		tr:nth-child(even) {
			background-color: #f2f2f2;
		}

		tr:hover {
			background-color: #eaeaea;
		}

		.status-success {
			color: green;
			font-weight: bold;
		}

		.status-error {
			color: red;
			font-weight: bold;
		}
		/* Định dạng cho link tải file mẫu */
		.download-link {
			display: block;
			text-align: center;
			margin-top: 20px;
			font-size: 16px;
		}

		.download-link a {
			color: #5cb85c;
			text-decoration: none;
			font-weight: bold;
		}

		.download-link a:hover {
			text-decoration: underline;
		}
    </style>
</head>
<body>

<div class="container">
    <h2>Tải tập tin Excel</h2>
    <form action="#" method="POST" enctype="multipart/form-data">
        <input type="file" name="excel_file" accept=".xlsx" required>
        <input type="submit" name="upload" value="Tải lên">
    </form>
	<p class="download-link">
    <a href="../tmp/tmp_dsnhanvien.xlsx" download>Tải Excel mẫu</a>
</p>
</div>

</body>
</html>
