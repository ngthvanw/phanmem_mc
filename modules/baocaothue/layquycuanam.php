<?php
include("../../config.php");
$OBJCT = new baocaothue();
$namtinhthue = $_GET['namtinhthue'];
function load_ppkhaithue($dir)
{
    $fp1 = @fopen($dir . "/" . 'phuongphapkhaithue.db', "r"); // đọc thông tin chung
    $string_info = fgets($fp1);
    fclose($fp1);
    if ($string_info == "") {
        $string_info = 1;
    }
    return ($string_info);
}

$ppkhautru = substr(load_ppkhaithue($driver . "/datafile/" . $_SESSION['MST']."/".$_SESSION['NienDo']),0,1);

function MangThueThangTruoc($NgayBD,$NgayKT,$ppkhautru){
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
    if($ppkhautru==1){
    for($d=$timetoday;$d<=$timeend;$d = strtotime(date("Y-m-d", $d). " +1 month")) {
        $m = date("n", $d);
        $y = date("Y", $d);
        $array_thang[$y][$m] = $m ;
    }
    }else {
        for ($d = $timetoday; $d <= $timeend; $d = strtotime(date("Y-m-d", $d) . " +3 month")) {
            $m = date("n", $d);
            $y = date("Y", $d);
            $array_thang[$y][$array_quy[$m]] = $array_quy[$m];
        }
    }
    return $array_thang;
}
$array_thang = MangThueThangTruoc($_SESSION['kyketoan_tungay'],$_SESSION['kyketoan_denngay'],$ppkhautru);
?>
    <option value="">--Chọn--</option>
<?php
foreach ($array_thang[$namtinhthue] as $item){
    if($ppkhautru==1){
        $ten = "Tháng ";
    }else{
        $ten = "Quý ";
    }
   ?>
    <option value="<?php echo $item ?>"><?php echo $ten.$item; ?></option>
<?php
}


