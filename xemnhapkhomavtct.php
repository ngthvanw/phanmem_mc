<table width="200px" border="1">
    <tr>
        <td>Mã VT</td>
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
    $sql = "SELECT chitiet_psvt.mavt FROM `chitiet_psvt` INNER JOIN psvt on (chitiet_psvt.sophieu = psvt.sophieu) where psvt.loaiphieu='1' and month(ngayghiso) = '{$thang}' and mavt not in (select mavt from tkthang WHERE thang='{$thang}')";
    $query = mysqli_query($cnn,$sql);
    while ($result = mysqli_fetch_assoc($query)){
        ?>
        <tr>
            <td align="center"><?php echo $result['mavt'] ?></td>
        </tr>
<?php
    }

}
?>
</table>
