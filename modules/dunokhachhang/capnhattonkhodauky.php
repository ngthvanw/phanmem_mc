<?php
include("../../config.php");
$OBJ = new soluongton();

$dbnametruoc = $_SESSION['TIENTO'] . $_SESSION['MST'] . "_" . ($_SESSION[NienDo] - 1);
$mysql_host = $_SESSION['HOST'];
$mysql_username = $_SESSION['USER_DB'];
$mysql_password = $_SESSION['PASS_DB'];
$cnntruoc = mysql_connect($mysql_host, $mysql_username, $mysql_password);

$db_selected = mysql_select_db($dbnametruoc, $cnntruoc);

if (!$db_selected) {
    echo 0;
} else {
    $sql = "select * from tkthang where thang=12";
    $query = mysql_query($sql, $cnntruoc);
    $val = "";
    $count = mysql_num_rows($query);
    if ($count < 1) {
        echo 2;
    } else {
        $i = 0;
        while ($row = mysql_fetch_assoc($query)) {
            $i++;
            $dauphay = ",";
            if ($count == $i) {
                $dauphay = "";
            }
            $val .= "('" . $row['mavt'] . "','" . $row['tenvt'] . "','" . $row['matk'] . "','" . $row['dvt'] . "','" . $row['soluong'] . "','" . $row['dongia'] . "','" . $row['thanhtien'] . "','" . $row['thuesuat'] . "','" . $row['chietkhau'] . "','" . $row['makho'] . "','" . $row['tenkho'] . "','" . $row['quycach'] . "','" . $row['manhom'] . "','" . $row['tennhom'] . "','" . khu_dau_vn($row['tenvt']) . "')" . $dauphay;
            $data[] = $row;
        }

        mysql_close($cnntruoc);
        $dbname = $_SESSION['TIENTO'] . $_SESSION['MST'] . "_" . ($_SESSION[NienDo]);
        $mysql_host = $_SESSION['HOST'];
        $mysql_username = $_SESSION['USER_DB'];
        $mysql_password = $_SESSION['PASS_DB'];
        $cnn = mysql_connect($mysql_host, $mysql_username, $mysql_password);

        $db_selected = mysql_select_db($dbname, $cnn);
        $sql_emp2 = "TRUNCATE tk";
        mysql_query($sql_emp2,$cnn);
        $sql_in = "insert into tk(mavt,tenvt,matk,dvt,slck,gtvnck,dgxvnd,rate,chietkhau,makho,kho,quycach,manhom,tennhom,tenkd) VALUE " . $val;
        mysql_query($sql_in);
        mysql_close($cnn);
        echo 1;
        debug($data);
    }
}

?>