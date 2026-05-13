<?php
// Hiển thị tất cả các lỗi
set_time_limit(300); // Tăng thời gian thực thi lên 300 giây (5 phút)
session_start();
$data_MuaVao = $_SESSION['PLGiamThueGTGTMuaVao'];
$data_BanRa = $_SESSION['PLGiamThueGTGTBanRa'] ;
include ("../../phpexcel/PHPExcel.php");
// Đường dẫn tới file
$filePath = $_SESSION['DRIVER_PM'].'/tmp/tmp_Bang_Ke_01_GiamThue_GTGT_NQ142_GTGT_TT80.xls';
try {
    // Tạo đối tượng PHPExcel Reader
    $objReader = PHPExcel_IOFactory::createReader('Excel5'); // 'Excel5' dành cho file .xls
    $objPHPExcel = $objReader->load($filePath);
    $row = 30;
    $objPHPExcel->setActiveSheetIndex(0);
    $sott = 0;
    foreach ($data_MuaVao as $item_MuaVao){
        $sott++;
        $objPHPExcel->getActiveSheet()->setCellValue('B' . $row, $sott)
                                        ->setCellValue('C' . $row, $item_MuaVao['tenvt'])
                                        ->setCellValue('D' . $row, $item_MuaVao['thanhtien'])
                                        ->setCellValue('E' . $row, $item_MuaVao['thue']);
        $row++;
        $objPHPExcel->getActiveSheet()->insertNewRowBefore($row, 1);
    }
    $objPHPExcel->getActiveSheet()->removeRow($row, 1);// Bỏ dòng cuối cùng do dữ liệu trống
    $row = $row+5;
    $sott = 0;
    foreach ($data_BanRa as $item_BanRa){
        $sott++;
        $objPHPExcel->getActiveSheet()->setCellValue('B' . $row, $sott)
            ->setCellValue('C' . $row, $item_BanRa['tenvt'])
            ->setCellValue('D' . $row, $item_BanRa['thanhtien'])
            ->setCellValue('E' . $row, 10);

        $row++;
        $objPHPExcel->getActiveSheet()->insertNewRowBefore($row, 1);
    }
    $objPHPExcel->getActiveSheet()->removeRow($row, 1);// Bỏ dòng cuối cùng do dữ liệu trống
    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
    $objWriter->save($_SESSION['DRIVER_PM'] . "/datafile/" . $_SESSION['MST'] . "/" . $_SESSION['NienDo'] . "/Bang_Ke_01_GiamThue_GTGT_NQ142_GTGT_TT80.xls");
    unset($_SESSION['PLGiamThueGTGTMuaVao']);
    unset($_SESSION['PLGiamThueGTGTBanRa']);
    $data = array('status' => 'success', 'data1' => 'value1', 'data2' => 'value2');
} catch (Exception $e) {
    die('Lỗi: ' . $e->getMessage());
}



