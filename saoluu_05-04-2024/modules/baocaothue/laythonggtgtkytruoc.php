<?php
include("../../config.php");
$OBJCT = new baocaothue();
$thangtinhthue = $_GET['thangtinhthue'];
$namtinhthue = $_GET['namtinhthue'];
$machinhanh = $_GET['machinhanh'];
$loaitokhai = $_GET['loaitokhai'];
$nam1 = date("Y",strtotime($_SESSION['kyketoan_tungay']));
$nam2 = date("Y",strtotime($_SESSION['kyketoan_denngay']));
function MangThueThangTruoc($NgayBD,$NgayKT){
    $array_quy =
        array(1 => "I",
            2 => "I",
            3 =>"I",
            4 => "II",
            5 => "II",
            6 => "II",
            7 => "III",
            8 => "III",
            9 => "III",
            10 => "IV",
            11 => "IV",
            12 => "IV",
        );
    $Startday = ($NgayBD);
    $Enday = ($NgayKT);
    $timetoday = strtotime($Startday);
    $timeend = strtotime($Enday);
    for($d=$timetoday;$d<=$timeend;$d = strtotime(date("Y-m-d", $d). " +1 month")) {
        $m = date("n", $d);
        $y = date("Y", $d);
        $day_back = strtotime(date("Y-m-d", $d) . " -1 month");
        $m_back = date("n", $day_back);
        $y_back = date("Y", $day_back);
        if ($d == $timetoday) {
            $array_thangtruoc[$m . "-" . $y] = 0;
        } else {
            $array_thangtruoc[$m . "-" . $y] = $m_back . "-" . $y_back;
        }
    }
    for ($d = $timetoday; $d <= $timeend; $d = strtotime(date("Y-m-d", $d) . " +3 month")) {
        $m = date("n", $d);
        $y = date("Y", $d);
        $day_back = strtotime(date("Y-m-d", $d) . " -3 month");
        $m_back = date("n", $day_back);
        $y_back = date("Y", $day_back);
        if ($d == $timetoday) {
            $array_thangtruoc[$array_quy[$m] . "-" . $y] = 0;
        } else {
            $array_thangtruoc[$array_quy[$m] . "-" . $y] = $array_quy[$m_back] . "-" . $y_back;
        }
    }
    return $array_thangtruoc;
}
$OBJCT->re_query("ALTER TABLE `tokhaithue` CHANGE `thang` `thang` VARCHAR(8) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL;");
$OBJCT->re_query("ALTER TABLE `tokhaithue` ADD `loikhaibosung` INT(1) NOT NULL");
$OBJCT->re_query("ALTER TABLE `tokhaithue` ADD `machinhanh` CHAR(14) NOT NULL;");
$OBJCT->re_query("update `tokhaithue` set machinhanh = '".$_SESSION['MST']."' where machinhanh = '';");

$OBJCT->re_query("UPDATE tokhaithue SET thang = CONCAT(thang,'-".$_SESSION['NienDo']."') WHERE locate('-',thang)<1");
$array_thangtruoc = MangThueThangTruoc($_SESSION['kyketoan_tungay'],$_SESSION['kyketoan_denngay']);
if ($array_thangtruoc[$thangtinhthue."-".$namtinhthue] === 0) {// Lấy số dư đầu kỳ, không lấy từ số dư tài khoản đầu kỳ
    $sql = "select sum(soduno) as thue from sdtkdk where matk='1331' or matk='1332'";
    $data1 = $OBJCT->load_danhsach_tokhai('-1',1,$machinhanh);// thông tin tồn đầu kỳ
    if($data1==0){
        $query = $OBJCT->re_query($sql);
        while ($result = $OBJCT->re_fetch($query)) {
            $matkhai = "VI42";
            $data[$matkhai] = $result;
        }

    }else{
        $data = $data1;
    }
} else {
    $data = $OBJCT->load_danhsach_tokhai($array_thangtruoc[$thangtinhthue."-".$namtinhthue], $loaitokhai,$machinhanh);// thông tin tồn đầu kỳ
}
echo json_encode($data);