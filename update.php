<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Links</title>
    <style>
		/* Thiết lập cơ bản */
		body {
			font-family: Arial, sans-serif;
			background-color: #f4f7f9;
			padding: 20px;
			text-align: center;
		}

		/* Tiêu đề */
		h2 {
			color: #333;
			font-size: 22px;
			margin-bottom: 15px;
		}

		/* Danh sách */
		.link-list {
			list-style: none;
			padding: 0;
			max-width: 600px;
			margin: auto;
		}

		/* Mục danh sách */
		.link-item {
			background: #ffffff;
			padding: 12px;
			margin: 8px 0;
			border-radius: 8px;
			box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
			transition: all 0.3s ease;
		}

		/* Hiệu ứng hover cho link có thể click */
		.link-item:hover {
			transform: scale(1.02);
		}

		/* Link được bật */
		.enabled-link {
			color: #007bff;
			text-decoration: none;
			font-weight: bold;
		}

		/* Hiệu ứng hover cho link có thể click */
		.enabled-link:hover {
			text-decoration: underline;
			color: #0056b3;
		}

		/* Link bị vô hiệu hóa */
		.disabled-link {
			color: #dc3545;
			font-weight: bold;
			cursor: not-allowed;
		}

		/* Thêm chú thích vào link bị vô hiệu hóa */
		.disabled-link::after {
			content: " (Không thể click)";
			font-style: italic;
			color: #999;
		}
    </style>
    <script>
        // Function to confirm before proceeding
        function confirmAllLinks(event) {
            const isConfirmed = confirm("Bạn có chắc chắn muốn tiếp tục không?");
            if (!isConfirmed) {
                event.preventDefault(); // Prevent navigation if canceled
            }
        }

        // Apply the confirm function to all links on the page
        window.onload = function() {
            const links = document.querySelectorAll('.link-item a');
            links.forEach(link => {
                link.addEventListener('click', confirmAllLinks);
            });
        };
    </script>
</head>
<body>
    <h2>Danh sách cập nhật</h2>
    <ul class="link-list">
        <li class="link-item"> 
            <a class="enabled-link" href="update_hethongtaikhoan.php">1.Cập nhật hệ thống tài khoản theo TT99</a>
        </li>
        <li class="link-item"> 
            <a class="enabled-link" href="update_thuyetminh.php">1.Cập nhật thuyết minh báo cáo tài chính</a>
        </li>
        <li class="link-item"> 
            <a class="disabled-link" href="updatets.php">2.Cập nhật bảng tăng/giảm tài sản</a>
        </li>
        <li class="link-item"> 
            <a class="disabled-link" href="update_makh_chacon.php">3.Điều chỉnh đúng mã KH cha - con</a>
        </li>
        <li class="link-item"> 
            <a class="enabled-link" href="updatekhts.php">4.Cập nhật bảng khấu hao tài sản</a>
        </li>
        <li class="link-item"> 
            <a class="enabled-link" href="updateluuchuyen.php">5.Cập nhật bảng lưu chuyển tiền tệ (PPTT)</a>
        </li>
        <li class="link-item"> 
            <a class="enabled-link" href="updatetndn_plkqkd_truoc_2021.php">6.Cập nhật bảng TNDN, PLKQKD trước 2021</a>
        </li>
        <li class="link-item"> 
            <a class="enabled-link" href="updatecdkt.php">7.Cập nhật bảng cân đối kế toán</a>
        </li>
        <li class="link-item"> 
            <a class="enabled-link" href="updatekqkd.php">8.Cập nhật bảng PLKQKD - TNDN</a>
        </li>
        <li class="link-item"> 
            <a class="enabled-link" href="updatebuttoanps.php">9.Cập nhật bảng bút toán phát sinh</a>
        </li>
        <li class="link-item"> 
            <a class="enabled-link" href="updatetgcl_dauky.php">10.Cập nhật thời gian còn lại CCDC đầu kỳ</a>
        </li>
        <li class="link-item"> 
            <a class="enabled-link" href="update_manoidung.php">11.Cập nhật không tìm thấy nội dung</a>
        </li>
        <li class="link-item"> 
            <a class="enabled-link" href="update_hanghoa.php">12.Cập nhật không tìm thấy hàng hoá, vật tư</a>
        </li>
        <li class="link-item"> 
            <a class="disabled-link" href="update_dungtk_nxton.php?loaichungtu=0">13.Điều chỉnh định khoản nhập-xuất kho</a>
        </li>
		<li class="link-item"> 
            <a class="disabled-link" href="doctokhai/">14.Đọc tờ khai GTGT</a>
        </li>
    </ul>
</body>
</html>
