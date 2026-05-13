<?php
include("../../config.php");
$OBJ = new ps_chitiet_mavattu();
$sophieu = $_GET['sophieu'];
$OBJ->set_orderby(" sophieu = ".$sophieu);
$data = $OBJ->layChiTietPSVT();
$i=0;
$tongtien = 0;
$tongthue = 0;
$tongcong = 0;
$mangtk = array();
$mangtknt = array();
foreach ($data as $item){
    if (array_key_exists($item['matk'],$mangtk)) {// Kiểm tra xem matk có tồn tại trong mảng không
        $tongcong=$mangtk[$item['matk']]+$item['thanhtien'];
        $mangtk[$item['matk']] = $tongcong;

        $tongcongnt=$mangtknt[$item['matk']]+$item['thanhtiennt'];
        $mangtknt[$item['matk']] = $tongcongnt;
    } else {
        $mangtk[$item['matk']]=$item['thanhtien'];
        $mangtknt[$item['matk']]=$item['thanhtiennt'];
    }
    $tongthue+=$item['thue'];
    $tongthuent+=$item['thuent'];
    $i++;
}
//echo $tongthue;
$mangtk['33311']=$tongthue;
$mangtknt['33311']=$tongthuent;
$array_tkmul=array();
foreach ($mangtk as $k=>$val){
    $array_tkmul[] = array('matk'=>$k,'sotien'=>$val,'sotiennt'=>$mangtknt[$k]);
}
echo json_encode($array_tkmul);