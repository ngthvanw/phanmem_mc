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
            $header = $xlsx->rows()[1]; // Hàng đầu tiên là tiêu đề

            // Xây dựng câu lệnh INSERT với tên cột từ tiêu đề
            $columns = implode(', ', $header); // Kết hợp các tiêu đề thành chuỗi
			
            // Lặp qua các hàng dữ liệu, bắt đầu từ hàng thứ 2 (hàng 1 chứa tiêu đề)
			$count_data = count($xlsx->rows());
            for ($i = 2; $i < $count_data; $i++) {
                $row = $xlsx->rows()[$i];
				
                // Chuẩn bị các giá trị của hàng hiện tại để thêm vào SQL
                $values = array_map(function($value) {
                    return "'" . htmlspecialchars($value) . "'"; // Xử lý giá trị từng cột
                }, $row);
                $arr_values = $values;
                $values = implode(', ', $values); // Kết hợp các giá trị thành chuỗi

                // Tạo câu lệnh SQL INSERT
                $sql = "INSERT INTO pscptt ($columns) VALUES ($values);";
                $sql_mats = "INSERT INTO cptratruoc (mats,tents,matscha,dvt,matk,ngaysd,manhomts,tenkd) 
                            VALUES ($arr_values[4],$arr_values[5],$arr_values[32],$arr_values[8],$arr_values[19],$arr_values[2],$arr_values[28],$arr_values[27]);";
                $BCT->re_query($sql_mats);
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
						<th>Ngày Ghi sổ</th>
						<th>Ngày sử dụng</th>
						<th>Mã tài sản</th>
                        <th>Tên tài sản</th>
                        <th>Đơn vụ tính</th>
                        <th>Nguyên giá</th>
                        <th>TGSD</th>
                        <th>TK Tài sản</th>
                        <th>Tài khoản CP</th>
                        <th>TK khấu hao</th>
                        <th>Loại TS</th>
					</tr>";
			foreach ($results as $result) {
				$statusClass = strpos($result['status'], 'Lỗi') !== false ? 'status-error' : 'status-success';
				echo "<tr>
						<td class='{$statusClass}'>{$result['status']}</td>
						<td>{$result['data'][0]}</td>
						<td>{$result['data'][1]}</td>
						<td>{$result['data'][2]}</td>
						<td>{$result['data'][4]}</td>
                        <td>{$result['data'][5]}</td>
                        <td>{$result['data'][8]}</td>
                        <td>{$result['data'][10]}</td>
                        <td>{$result['data'][14]}</td>
                        <td>{$result['data'][18]}</td>
                        <td>{$result['data'][19]}</td>
                        <td>{$result['data'][20]}</td>
                        <td>{$result['data'][26]}</td>
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
    <title>TẢI DỮ LIỆU TĂNG/GIẢM CPTT</title>
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
    <a href="../tmp/mautang_giamcptt.xlsx" download>Tải Excel mẫu</a>
</p>
</div>

</body>
</html>
