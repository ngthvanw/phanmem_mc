<?php
session_start();
error_reporting(E_ALL);
//require('../../phpexcel/IOFactory.php');
require '../../phpexcel/PHPExcel.php';
//require_once dirname(__FILE__) . '/../Classes/PHPExcel/IOFactory.php';
$data = $_SESSION["LISTCTBANGTHUYETMINHTAICHINH"];
$ngayhoadon = $_GET['ngayhoadon'];
if ($_SESSION['theothongtu'] == "tt200") {
	//$data['A15'] = "1. Kỳ kế toán năm ".$ngayhoadon;
$objReader = PHPExcel_IOFactory::createReader('Excel5');

$objPHPExcel = $objReader->load($_SESSION['DRIVER_PM']."/tmp/thuyetminhtaichinh_200.xls");

foreach($data as $k => $dataRow) {
    //$row = $baseRow + $r;
    //$objPHPExcel->getActiveSheet()->insertNewRowBefore($row,1);

   $objPHPExcel->getActiveSheet()->setCellValue($k,$dataRow);
}
//$objPHPExcel->getActiveSheet()->removeRow($baseRow-1,1);


$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save($_SESSION['DRIVER_PM']."/datafile/".$_SESSION['MST']."/".$_SESSION['NienDo']."/thuyetminhtaichinh.xls");
}else{
	$data['A15'] = "1. Kỳ kế toán năm ".$ngayhoadon;
	$objReader = PHPExcel_IOFactory::createReader('Excel5');

	$objPHPExcel = $objReader->load($_SESSION['DRIVER_PM']."/tmp/thuyetminhtaichinh.xls");

	foreach($data as $k => $dataRow) {
		//$row = $baseRow + $r;
		//$objPHPExcel->getActiveSheet()->insertNewRowBefore($row,1);

	   $objPHPExcel->getActiveSheet()->setCellValue($k,$dataRow);
	}
	//$objPHPExcel->getActiveSheet()->removeRow($baseRow-1,1);

	$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
	$objWriter->save($_SESSION['DRIVER_PM']."/datafile/".$_SESSION['MST']."/".$_SESSION['NienDo']."/thuyetminhtaichinh.xls");
}

