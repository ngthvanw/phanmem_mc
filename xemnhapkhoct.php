<table width="200px" border="1">
    <tr>
        <td>Số TT</td>
        <td>Số hoá đơn</td>
        <td>Thành tiền</td>
    </tr>
<?php
require("config.php");
{
    $thang = $_GET['thang'];
    $mysql_host = $_SESSION['HOST'];
    $mysql_username = $_SESSION['USER_DB'];
    // MySQL password
    $mysql_password = $_SESSION['PASS_DB'];
    $cnn = mysqli_connect($mysql_host, $mysql_username, $mysql_password);
    // Select database
    $dbname = $_SESSION['TIENTO'] . $_SESSION['MST'] . "_" . $_SESSION['NienDo'];
    mysqli_select_db($cnn,$dbname);
    $sql = "SELECT psvt.mapskt,sct,sum(thanhtien) as thanhtien FROM `chitiet_psvt` INNER JOIN psvt on (chitiet_psvt.sophieu = psvt.sophieu) where psvt.loaiphieu='1' and month(ngayghiso) = '{$thang}' GROUP by psvt.mapskt,sct order by psvt.sct";
    $query = mysqli_query($cnn,$sql);
    while ($result = mysqli_fetch_assoc($query)){
        ?>
        <tr>
            <td align="center"><?php echo $result['mapskt'] ?></td>
            <td align="right"><?php echo $result['sct'] ?></td>
            <td align="right"><?php echo number_format($result['thanhtien']) ?></td>
        </tr>
<?php
    }

}
?>
</table>
