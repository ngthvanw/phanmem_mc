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
$mangtkthuenk = array();
foreach ($data as $item){
        if (array_key_exists($item['matk'],$mangtk)) {// Kiểm tra xem matk có tồn tại trong mảng không
            $tongcong=$mangtk[$item['matk']]+($item['thanhtien']-$item['thuenk']);
            $mangtk[$item['matk']] = $tongcong;
            $tongcongnt=$mangtknt[$item['matk']]+$item['thanhtiennt'];
            $mangtknt[$item['matk']] = $tongcongnt;
		}
		if (array_key_exists($item['matk']."-3333",$mangtkthuenk)){
			
			$mangtknt[$item['matk']."-3333"] = 0;			
			$tongcongthuenk=$mangtkthuenk[$item['matk']."-3333"]+$item['thuenk'];
            $mangtkthuenk[$item['matk']."-3333"] = $tongcongthuenk;
			
		} 
		if (array_key_exists($item['matk'],$mangtk)==false && array_key_exists($item['matk']."-3333",$mangtkthuenk)==false) {
            $mangtk[$item['matk']]=$item['thanhtien']-$item['thuenk'];
            $mangtknt[$item['matk']]=$item['thanhtiennt'];
            $mangtkthuenk[$item['matk']."-3333"]=$item['thuenk'];			
			$mangtknt[$item['matk']."-3333"] = 0;
        }
     $tongthue+=$item['thue'];
     $tongthuent+=$item['thuent'];
    $i++;
}
//$mangtong=array_merge($mangtk,$mangtkthuenk);
//debug($data);
//$mangtk['3333']=$tongthue;
foreach ($mangtkthuenk as $kthuenk=>$valthuenk){
	if($valthuenk!=0){
	$mangtk[$kthuenk]=$valthuenk;
	}
}

$mangtk['1331']=$tongthue;
$mangtknt['1331']=$tongthuent;

$array_tkmul=array();
foreach ($mangtk as $k=>$val){
    $array_tkmul[] = array('matk'=>$k,'sotien'=>$val,'sotiennt'=>$mangtknt[$k]);
}
echo json_encode($array_tkmul);