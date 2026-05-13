<?php
include("../../config.php");
$OBJ = new pskt();
$sophieu = $_GET['sophieu'];
$sottpskt = $_GET['sottpskt'];
$tongtien = $_GET['tongtien'];
$tongtiennt = $_GET['tongtiennt'];
$OBJ->setSoPhieu($sophieu);
$data = $OBJ->gettongtienphieu();
$tongcong = 0;
$tongcongnt = 0;
$tongphieu=0;
$tongphieunt=0;
foreach($data as $item){
	$tongcong+=$item['tongtien'];
	$tongcongnt+=$item['tongtiennt'];
	if($item['sott']==$sottpskt){
		$tongphieu+=$item['tongtien'];
		$tongphieunt+=$item['tongtiennt'];
	}
	
}
echo json_encode(array("tongtien"=>(($tongcong+$tongtien)-$tongphieu),"tongtiennt"=>(($tongcongnt+$tongtiennt)-$tongphieunt)));