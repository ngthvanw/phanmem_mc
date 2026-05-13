<?php
session_start();
require("../config.php");
$OBJ = new dmsanpham();

$tu_ngay = isset($_POST['tu_ngay']) ? (int)$_POST['tu_ngay'] : 1;
$den_ngay = isset($_POST['den_ngay']) ? (int)$_POST['den_ngay'] : 31;
$thang = isset($_POST['thang']) ? (int)$_POST['thang'] : date('m');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $columns = [];
    for ($i = $tu_ngay; $i <= $den_ngay; $i++) {
        $columns[] = "t.n$i";
    }
    $columns_str = implode(" + ", $columns);

    $sql = "SELECT 
                c.mavt,
                m.tenvt,
                SUM(c.dinhmuckecakhauhao * ($columns_str)) AS dinhmuc_sudung
            FROM chitiet_dinhmuc_sp c
            JOIN bangthongkethanhpham t ON c.masp = t.masp
            JOIN mavt m ON c.mavt = m.mavt
            WHERE thang = $thang and c.mavt not in ('NC-001','SXC-01','SXC-02')
            GROUP BY c.mavt;
        ";
    $result = $OBJ->re_query($sql);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tính Định Mức Sử Dụng</title>
</head>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 20px;
        padding: 20px;
    }
    h2, h3 {
        text-align: center;
        color: #333;
    }
    form {
        display: flex;
        justify-content: center;
        gap: 10px;
        margin-bottom: 20px;
    }
    input {
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }
    button {
        padding: 8px 15px;
        border: none;
        background-color: #28a745;
        color: white;
        font-size: 16px;
        cursor: pointer;
        border-radius: 5px;
    }
    button:hover {
        background-color: #218838;
    }
    table {
        width: 80%;
        margin: auto;
        border-collapse: collapse;
        background: white;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    th, td {
        padding: 10px;
        text-align: left;
        border: 1px solid #ddd;
    }
    th {
        background-color: #007bff;
        color: white;
        text-align: center;
    }
    tr:nth-child(even) {
        background-color: #f2f2f2;
    }
</style>

<body>
<h2>Tính Định Mức Sử Dụng</h2>
<form method="POST">
    Tháng: <input type="number" name="thang" min="1" max="12" value="<?= $thang ?>">
    Từ ngày: <input type="number" name="tu_ngay" min="1" max="31" value="<?= $tu_ngay ?>">
    Đến ngày: <input type="number" name="den_ngay" min="1" max="31" value="<?= $den_ngay ?>">
    <button type="submit">Tính</button>
</form>

<?php if(isset($result)){ ?>
    <h3>Kết Quả</h3>
    <table border="1">
        <tr>
            <th>Mã vật tư</th>
            <th>Tên vật tư</th>
            <th>Định mức sử dụng</th>
        </tr>
        <?php while ($row = $OBJ->re_fetch($result)){ ?>
            <tr>
                <td><?php echo  $row['mavt']; ?></td>
                <td><?php echo  $row['tenvt']; ?></td>
                <td><?php echo number_format($row['dinhmuc_sudung'], 5,",","."); ?></td>
            </tr>
        <?php } ?>
    </table>
<?php } ?>
</body>
</html>