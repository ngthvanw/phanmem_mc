<?php
include("../../config.php");
$OBJ = new ps_chitiet_mavattu();
$nam = check_data($_GET['nam']);
$tuthang = check_data($_GET['tuthang']);
$denthang = check_data($_GET['denthang']);
if($nam!="") {
$str="";
for ($i=$tuthang;$i<=$denthang;$i++){
    $str.="sum(thang".$i.") thang".$i.",";
}
$str = substr($str,0,-1);
$dbname = "dulieuchung";

$sql_tendangnhap = "";
if($_SESSION['Level']==1 ||$_SESSION['Level']==2 ){

}else if($_SESSION['ThongKe']==1){
    $sql_tendangnhap = " tendangnhap = '".$_SESSION['User']."' and ";
}
$sql = "select matong,tendangnhap,{$str} from {$dbname}.phancongkhaithue_{$noiluu_phanmem} where $sql_tendangnhap nam='{$nam}' GROUP BY tendangnhap,matong ORDER BY matong";
$query =$OBJ->re_query($sql);
$sott=1;
while ($result =$OBJ->re_fetch($query)){
    if($result['matong']==1){
        $matong = "bhxh";
        $data[$result['tendangnhap']][$matong] = $result;
    }else if($result['matong']==2){
        $matong = "tienluong";
        $data[$result['tendangnhap']][$matong] = $result;
    }else if($result['matong']==0){
        $matong = "tien";
        $data[$result['tendangnhap']][$matong] = $result;
    }
}
$i=0;
foreach ($data  as $k=>$item){
    $tongcong = $item['tien']['thang1']+$item['tien']['thang2']+$item['tien']['thang3']+$item['tien']['thang4']+$item['tien']['thang5']+$item['tien']['thang6']+$item['tien']['thang7']+$item['tien']['thang8']+$item['tien']['thang9']+$item['tien']['thang10']+$item['tien']['thang11']+$item['tien']['thang12'];
    $thue = ($tongcong/1.1)*0.1;
    $doanhthuthuan = $tongcong-$thue;
    $luongkhoan30 = $doanhthuthuan*0.3;
    $luongkhoan2 = $doanhthuthuan*0.02;
    $tienthuong = $doanhthuthuan*0.03;
    $tongluong = $luongkhoan30+$luongkhoan2;
    $luongtamung = $item['tienluong']['thang1']+$item['tienluong']['thang2']+$item['tienluong']['thang3']+$item['tienluong']['thang4']+$item['tienluong']['thang5']+$item['tienluong']['thang6']+$item['tienluong']['thang7']+$item['tienluong']['thang8']+$item['tienluong']['thang9']+$item['tienluong']['thang10']+$item['tienluong']['thang11']+$item['tienluong']['thang12'];
    $tytrongluongtamung = round(($luongtamung/$doanhthuthuan)*100,2);
    $bhxh = $item['bhxh']['thang1']+$item['bhxh']['thang2']+$item['bhxh']['thang3']+$item['bhxh']['thang4']+$item['bhxh']['thang5']+$item['bhxh']['thang6']+$item['bhxh']['thang7']+$item['bhxh']['thang8']+$item['bhxh']['thang9']+$item['bhxh']['thang10']+$item['bhxh']['thang11']+$item['bhxh']['thang12'];
    $tytrongbhxh = round(($bhxh/$doanhthuthuan)*100,2);
    $chenhlechbien = $doanhthuthuan-$tongluong;
    $tytrongchenhlechbien = round(($chenhlechbien/$doanhthuthuan)*100,2);
	$chenhlech30 = $luongkhoan30-$luongtamung-$bhxh;
    $array[$i]['tendangnhap'] =strtoupper($k);
    $array[$i]['nam'] =$nam;
    $array[$i]['doanhthu'] =$doanhthuthuan;
    $array[$i]['luongtamung'] =$luongtamung;
    $array[$i]['tytrongluongtamung'] =$tytrongluongtamung;
    $array[$i]['bhxh'] =$bhxh;
    $array[$i]['tytrongbhxh'] =$tytrongbhxh;
    $array[$i]['luongkhoan30'] =$luongkhoan30;
    $array[$i]['luongkhoan2'] =$luongkhoan2;
    $array[$i]['tongluong'] =$tongluong;
    $array[$i]['tienthuong'] =$tienthuong;
    $array[$i]['chenhlechbien'] =$chenhlechbien;
    $array[$i]['tytrongchenhlechbien'] =$tytrongchenhlechbien;
    $array[$i]['chenhlech30'] =$chenhlech30;
    $i++;
}
}
echo "{\"data\":".json_encode($array) ."}" ;
?>