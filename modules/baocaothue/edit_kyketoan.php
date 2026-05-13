<?php
include("../../config.php");
$OBJ = new baocaothue();

$tungay = $_GET['kyketoan_tungay'];
$denngay = $_GET['kyketoan_denngay'];
$OBJ->re_query("delete from kyketoan");
//echo "insert into kyketoan(tungay,dengay) values('".$tungay."','".$denngay."')";
$OBJ->re_query("insert into kyketoan(tungay,denngay) values('".$tungay."','".$denngay."')");
$_SESSION['kyketoan_tungay'] = $tungay;
$_SESSION['kyketoan_denngay'] = $denngay;
$_SESSION['TuNgay'] = $_SESSION['kyketoan_tungay'];
$_SESSION['DenNgay'] = $_SESSION['kyketoan_denngay'];
function LayQuy($thang,$nam)
{
    switch ($thang) {
        case 1:
            $Quy = 'I';
            break;
        case 2:
            $Quy = 'I';
            break;
        case 3:
            $Quy = 'I';
            break;
        case 4:
            $Quy = 'II';
            break;
        case 5:
            $Quy = 'II';
            break;
        case 6:
            $Quy = 'II';
            break;
        case 7:
            $Quy = 'III';
            break;
        case 8:
            $Quy = 'III';
            break;
        case 9:
            $Quy = 'III';
            break;
        case 10:
            $Quy = 'IV';
            break;
        case 11:
            $Quy = 'IV';
            break;
        case 12:
            $Quy = 'IV';
            break;
    }
    return $Quy.'-'.$nam;
}
$_SESSION['kyketoan_quybatdau'] = LayQuy(date("n",strtotime($_SESSION['kyketoan_tungay'])),date("Y",strtotime($_SESSION['kyketoan_tungay'])));
$_SESSION['kyketoan_quyketthuc'] = LayQuy(date("n",strtotime($_SESSION['kyketoan_denngay'])),date("Y",strtotime($_SESSION['kyketoan_denngay'])));
?>