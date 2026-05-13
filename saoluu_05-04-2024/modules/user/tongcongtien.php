<?php
include("../../config.php");
$OBJ = new ps_chitiet_mavattu();
$tendangnhap = check_data($_GET['tennguoidung']);
$nam = check_data($_GET['nam']);

$dbname = "phpmyadmin";

$sql = "select matong,sum(thang1) thang1,sum(thang2) thang2,sum(thang3) thang3,sum(thang4) thang4,sum(thang5) thang5,sum(thang6) thang6,sum(thang7) thang7,sum(thang8) thang8,sum(thang9) thang9,sum(thang10) thang10,sum(thang11) thang11,sum(thang12) thang12 from {$dbname}.phancongkhaithue_{$noiluu_phanmem} where tendangnhap = '{$tendangnhap}' and nam='{$nam}' GROUP BY tendangnhap,matong ORDER BY matong";
$query =$OBJ->re_query($sql);
$sott=1;
while ($result =$OBJ->re_fetch($query)){
    if($result['matong']==1){
        $matong = "bhxh";
        $data[$matong] = $result;
    }else if($result['matong']==0){
        $matong = "tien";
        $data[$matong] = $result;
    }else if($result['matong']==2){
        $matong = "tamung";
        $data[$matong] = $result;
    }
}
//debug($result);
$array = array(
    "thang1"=>$data['tien']['thang1'],
    "thang2"=>$data['tien']['thang2'],
    "thang3"=>$data['tien']['thang3'],
    "thang4"=>$data['tien']['thang4'],
    "thang5"=>$data['tien']['thang5'],
    "thang6"=>$data['tien']['thang6'],
    "thang7"=>$data['tien']['thang7'],
    "thang8"=>$data['tien']['thang8'],
    "thang9"=>$data['tien']['thang9'],
    "thang10"=>$data['tien']['thang10'],
    "thang11"=>$data['tien']['thang11'],
    "thang12"=>$data['tien']['thang12'],
    "bhthang1"=>$data['bhxh']['thang1'],
    "bhthang2"=>$data['bhxh']['thang2'],
    "bhthang3"=>$data['bhxh']['thang3'],
    "bhthang4"=>$data['bhxh']['thang4'],
    "bhthang5"=>$data['bhxh']['thang5'],
    "bhthang6"=>$data['bhxh']['thang6'],
    "bhthang7"=>$data['bhxh']['thang7'],
    "bhthang8"=>$data['bhxh']['thang8'],
    "bhthang9"=>$data['bhxh']['thang9'],
    "bhthang10"=>$data['bhxh']['thang10'],
    "bhthang11"=>$data['bhxh']['thang11'],
    "bhthang12"=>$data['bhxh']['thang12'],
	"tmpthang1"=>$data['tamung']['thang1'],
    "tmpthang2"=>$data['tamung']['thang2'],
    "tmpthang3"=>$data['tamung']['thang3'],
    "tmpthang4"=>$data['tamung']['thang4'],
    "tmpthang5"=>$data['tamung']['thang5'],
    "tmpthang6"=>$data['tamung']['thang6'],
    "tmpthang7"=>$data['tamung']['thang7'],
    "tmpthang8"=>$data['tamung']['thang8'],
    "tmpthang9"=>$data['tamung']['thang9'],
    "tmpthang10"=>$data['tamung']['thang10'],
    "tmpthang11"=>$data['tamung']['thang11'],
    "tmpthang12"=>$data['tamung']['thang12']
);
echo "{\"data\":".json_encode($array) ."}" ;
?>