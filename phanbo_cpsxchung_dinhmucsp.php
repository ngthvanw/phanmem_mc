<?php
session_start();
require("config.php");
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phân Bổ Chi Phí</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
        .container {
            background-color: #fff;
            padding: 30px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            width: 400px;
            text-align: center;
        }
        h2 {
            color: #333;
            margin-bottom: 20px;
        }
        label {
            font-weight: bold;
            display: block;
            margin-top: 10px;
            color: #555;
            text-align: left;
        }
        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            box-sizing: border-box;
            text-align: right;
        }
        button {
            width: 100%;
            padding: 12px;
            background-color: #28a745;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 18px;
            margin-top: 20px;
            cursor: pointer;
            transition: 0.3s;
        }
        input[type="text"], input[type="date"] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            box-sizing: border-box;
            text-align: right;
        }

        button:hover {
            background-color: #218838;
        }
        .message {
            margin-top: 15px;
            font-size: 16px;
            padding: 10px;
            border-radius: 5px;
            display: none;
        }
        .success {
            background-color: #d4edda;
            color: blue;
            border: 1px solid #c3e6cb;
        }
        .error {
            background-color: #f8d7da;
            color: red;
            border: 1px solid #f5c6cb;
        }
    </style>
    <script>
        function formatNumber(input, isBlur = false) {
            let value = input.value.replace(/\D/g, "");
            if (value === "") return;
            input.value = new Intl.NumberFormat("vi-VN").format(value);        }

        function formatBeforeSubmit() {
            document.querySelectorAll("input[type='text']").forEach(input => {
                input.value = input.value.replace(/\./g, "");
        });
        }

        function showMessage(msg, type) {
            let messageBox = document.getElementById("result-message");
            messageBox.textContent = msg;
            messageBox.className = 'message '+type;
            messageBox.style.display = "block";
        }
    </script>
</head>
<body>
<div class="container">
    <h2>Nhập Giá Trị Chi Phí</h2>
    <form action="" method="POST" onsubmit="formatBeforeSubmit()">

        <label for="from_date">Từ ngày:</label>
        <input type="date" id="from_date" name="from_date" value="<?php echo $_SESSION['NienDo'].'01/01'; ?>" required>

        <label for="to_date">Đến ngày:</label>
        <input type="date" id="to_date" name="to_date" value="<?php echo $_SESSION['NienDo'].'12/31'; ?>" required>

        <label for="nhan_cong">Nhân công:</label>
        <input type="text" id="nhan_cong" name="nhan_cong" required placeholder="Nhập chi phí nhân công" oninput="formatNumber(this)" onblur="formatNumber(this, true)">

        <label for="ca_may">Ca máy:</label>
        <input type="text" id="ca_may" name="ca_may" required placeholder="Nhập chi phí ca máy" oninput="formatNumber(this)" onblur="formatNumber(this, true)">

        <label for="cpsxc">CPSXC:</label>
        <input type="text" id="cpsxc" name="cpsxc" required placeholder="Nhập chi phí CPSXC" oninput="formatNumber(this)" onblur="formatNumber(this, true)">

        <button type="submit">Phân Bổ</button>
    </form>

    <div id="result-message" class="message"></div>

    <div class="footer">
        &copy; 2025 Phân Bổ Chi Phí
    </div>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $OBJ = new baocaothue();

        // Chuyển đổi định dạng số từ chuỗi có dấu "." thành số thực
        function formatNumber($num) {
            return floatval(str_replace('.', '', $num));
        }

        // Lấy giá trị từ form nhập
        $nhan_cong = formatNumber($_POST['nhan_cong']);
        $ca_may = formatNumber($_POST['ca_may']);
        $cpsxc = formatNumber($_POST['cpsxc']);
        $phuong_phap = 'doanhthu';
        $tungay = $_POST['from_date'];
        $denngay = $_POST['to_date'];

        // Tính tổng số lượng tất cả sản phẩm
        if ($phuong_phap == "soluong") {
            $sql_total = "select sum(chitiet_psvt.soluongnhap) as total_spps from psvt inner join chitiet_psvt on (psvt.sophieu = chitiet_psvt.sophieu) inner join masp on (masp.masp = chitiet_psvt.mavt)where loaiphieu =2 and masp.loaisp='SP' and psvt.ngayghiso >='".$tungay."' and psvt.ngayghiso <='".$denngay."'";
        } else {
            $sql_total = "select sum(chitiet_psvt.thanhtien) as total_spps from psvt inner join chitiet_psvt on (psvt.sophieu = chitiet_psvt.sophieu) inner join masp on (masp.masp = chitiet_psvt.mavt)where loaiphieu =2 and masp.loaisp='SP' and psvt.ngayghiso >='".$tungay."' and psvt.ngayghiso <='".$denngay."'";
        }
        $result_total = $OBJ->re_query($sql_total);
        $row_total = $OBJ->re_fetch($result_total);
        $total_spps = $row_total['total_spps'];

        if ($total_spps > 0) {
            // Truy vấn tất cả mã sản phẩm và tổng số lượng của từng mã
            if ($phuong_phap == "soluong") {
                $sql = "select chitiet_psvt.mavt as masp, sum(chitiet_psvt.soluongnhap) as total_masp,sum(chitiet_psvt.soluongnhap) as total_slmasp from psvt inner join chitiet_psvt on (psvt.sophieu = chitiet_psvt.sophieu) inner join masp on (masp.masp = chitiet_psvt.mavt)where loaiphieu =2 and masp.loaisp='SP' and psvt.ngayghiso >='".$tungay."' and psvt.ngayghiso <='".$denngay."' group  by chitiet_psvt.mavt ";
            } else {
                $sql = "select chitiet_psvt.mavt as masp, sum(chitiet_psvt.thanhtien) as total_masp,sum(chitiet_psvt.soluongnhap) as total_slmasp from psvt inner join chitiet_psvt on (psvt.sophieu = chitiet_psvt.sophieu) inner join masp on (masp.masp = chitiet_psvt.mavt)where loaiphieu =2 and masp.loaisp='SP' and psvt.ngayghiso >='".$tungay."' and psvt.ngayghiso <='".$denngay."' group  by chitiet_psvt.mavt ";
            }
            $result = $OBJ->re_query($sql);
            while ($row = $OBJ->re_fetch($result)) {
                $masp = $row['masp'];
                $total_masp = $row['total_masp'];
                $total_slmasp = $row['total_slmasp'];
                $proportion = $total_masp / $total_spps;

                $allocated_nhan_cong = round(($nhan_cong * $proportion) / $total_slmasp);
                $allocated_ca_may = round(($ca_may * $proportion) / $total_slmasp);
                $allocated_cpsxc = round(($cpsxc * $proportion) / $total_slmasp);

                $del_sql = "DELETE FROM chitiet_dinhmuc_sp WHERE mavt IN ('NC-001','MAY-001','SXC-01','SXC-02') AND masp='".$masp."'";
                $OBJ->re_query($del_sql);

                $ins_sql = "INSERT INTO chitiet_dinhmuc_sp(masp,mavt,dvt,dinhmuc,tylehaohoc,dinhmuckecakhauhao,ghichu) 
                                VALUES ('".$masp."','NC-001','Công',1,$allocated_nhan_cong,$allocated_nhan_cong,'Tự động phân bổ'),
                                       ('".$masp."','MAY-001','Ca',$allocated_ca_may,1,$allocated_ca_may,'Tự động phân bổ'),
                                       ('".$masp."','SXC-01','SXC',1,$allocated_cpsxc,$allocated_cpsxc,'Tự động phân bổ'),
                                       ('".$masp."','SXC-02','SXC',0,0,0,'Tự động phân bổ');";
                $OBJ->re_query($ins_sql);
            }

            echo "<script>showMessage('Đã phân bổ chi phí thành công.', 'success');</script>";
        } else {
            echo "<script>showMessage('Không có dữ liệu để phân bổ.', 'error');</script>";
        }
    }
    ?>
</div>
</body>
</html>