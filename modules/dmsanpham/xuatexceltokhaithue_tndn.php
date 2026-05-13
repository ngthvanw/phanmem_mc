<?php
session_start();
$thongtutncn = $_GET["thongtutncn"];
$data = $_SESSION["LISTTOKHAITNDN"];
$ThongTinPhieu = $_SESSION["THONGTINPHIEUTKTNCN"];
error_reporting(E_ALL);
//require('../../phpexcel/IOFactory.php');
require '../../phpexcel/PHPExcel.php';
//require_once dirname(__FILE__) . '/../Classes/PHPExcel/IOFactory.php';

$objReader = PHPExcel_IOFactory::createReader('Excel5');
if($thongtutncn=='tt92_2015') {
    $objPHPExcel = $objReader->load($_SESSION['DRIVER_PM'] . "/tmp/tmp_thuetncn.xls");

    $objPHPExcel->setActiveSheetIndex(0);
    $songuoi = 0;
    $tongtien = 0;

    $tongthuetncn = 0;
    $tongnguoidongthuetncn = 0;
    foreach ($data as $dataRow) {
        $row = $baseRow++;
        $songuoi++;
        $tongtien += (($dataRow['tongluongcb'] + $dataRow['phucapchucvu'] + $dataRow['tongphucapkhongdungbhxh']));
        $tongthuetncn += $dataRow['tongthuethunhap'];
        if ($dataRow['tongthuethunhap'] != 0) {
            $tongnguoidongthuetncn++;
        }
    }

    $objPHPExcel->getActiveSheet()->setCellValue('H4', $_SESSION["NienDo"]);
    $objPHPExcel->getActiveSheet()->setCellValue('L4', "01/" . $_SESSION["NienDo"]);
    $objPHPExcel->getActiveSheet()->setCellValue('N4', "12/" . $_SESSION["NienDo"]);
    $objPHPExcel->getActiveSheet()->setCellValue('D8', $_SESSION["TenCongTy"]);
    $objPHPExcel->getActiveSheet()->setCellValue('D10', $_SESSION["MST"]);

    $objPHPExcel->getActiveSheet()->setCellValue('I36', $songuoi);
    $objPHPExcel->getActiveSheet()->setCellValue('I37', $songuoi);

    $objPHPExcel->getActiveSheet()->setCellValue('I43', $tongtien);
    $objPHPExcel->getActiveSheet()->setCellValue('I44', $tongtien);
    $objPHPExcel->getActiveSheet()->setCellValue('I60', $tongnguoidongthuetncn);
    $objPHPExcel->getActiveSheet()->setCellValue('I62', $tongthuetncn);
    $objPHPExcel->getActiveSheet()->setCellValue('I63', $tongthuetncn);
    $objPHPExcel->getActiveSheet()->setCellValue('M70', date("d/m/Y"));

    $objPHPExcel->setActiveSheetIndex(1);
    $objPHPExcel->getActiveSheet()->setCellValue('G5', $_SESSION["NienDo"]);
    $objPHPExcel->getActiveSheet()->setCellValue('E7', $_SESSION["TenCongTy"]);
    $objPHPExcel->getActiveSheet()->setCellValue('E9', $_SESSION["MST"]);
    $baseRow = 23;
    $sott = 0;
    foreach ($data as $dataRow) {
        $row = $baseRow++;
        $sott++;
        $tongso += ($dataRow['tongluongcb'] + $dataRow['phucapchucvu'] + $dataRow['tongphucapkhongdungbhxh']);
        $tongsogtgc += $dataRow['giamtrugiacanh'];
        $tongsobaohiem += $dataRow['tongbaohiem'];
        $objPHPExcel->getActiveSheet()->insertNewRowBefore($row, 1);

        $objPHPExcel->getActiveSheet()->setCellValue('B' . $row, $sott)
            ->setCellValue('D' . $row, $dataRow['tennv'])
            ->setCellValue('E' . $row, $dataRow['masothue'])
            ->setCellValue('F' . $row, $dataRow['socmnd'])
            ->setCellValue('H' . $row, ($dataRow['tongluongcb'] + $dataRow['tongphucapchucvu'] + $dataRow['tongphucapkhongdungbhxh']))
            ->setCellValue('N' . $row, ($dataRow['tongbaohiem']))
            ->setCellValue('Q' . $row, 0)
            ->setCellValue('R' . $row, 0)
            ->setCellValue('I' . $row, 0)
            ->setCellValue('J' . $row, 0)
            ->setCellValue('K' . $row, 0)
            ->setCellValue('M' . $row, 0)
            ->setCellValue('O' . $row, 0)
            ->setCellValue('P' . $row, 0)
            ->setCellValue('R' . $row, 0)
            ->setCellValue('S' . $row, 0)
            ->setCellValue('T' . $row, 0)
            ->setCellValue('U' . $row, 0)
            ->setCellValue('V' . $row, 0)
            ->setCellValue('L' . $row, $dataRow['giamtrugiacanh'])
            ->setCellValue('H' . ($row + 2), ($tongso))
            ->setCellValue('N' . ($row + 2), ($tongsobaohiem))
            ->setCellValue('L' . ($row + 2), $tongsogtgc)
            ->setCellValue('Q' . ($row + 2), 0)
            ->setCellValue('R' . ($row + 2), 0)
            ->setCellValue('I' . ($row + 2), 0)
            ->setCellValue('J' . ($row + 2), 0)
            ->setCellValue('K' . ($row + 2), 0)
            ->setCellValue('M' . ($row + 2), 0)
            ->setCellValue('O' . ($row + 2), 0)
            ->setCellValue('P' . ($row + 2), 0)
            ->setCellValue('R' . ($row + 2), 0)
            ->setCellValue('S' . ($row + 2), 0)
            ->setCellValue('T' . ($row + 2), 0)
            ->setCellValue('U' . ($row + 2), 0)
            ->setCellValue('V' . ($row + 2), 0);
    }
    $objPHPExcel->getActiveSheet()->removeRow(22, 1);

    $objPHPExcel->setActiveSheetIndex(2);
    $objPHPExcel->getActiveSheet()->setCellValue('E4', $_SESSION["NienDo"]);
    $objPHPExcel->getActiveSheet()->setCellValue('D6', $_SESSION["TenCongTy"]);
    $objPHPExcel->getActiveSheet()->setCellValue('D8', $_SESSION["MST"]);

    $objPHPExcel->setActiveSheetIndex(3);
    $objPHPExcel->getActiveSheet()->setCellValue('G5', $_SESSION["NienDo"]);
    $objPHPExcel->getActiveSheet()->setCellValue('E7', $_SESSION["TenCongTy"]);
    $objPHPExcel->getActiveSheet()->setCellValue('E9', $_SESSION["MST"]);

    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
    $objWriter->save($_SESSION['DRIVER_PM'] . "/datafile/" . $_SESSION['MST'] . "/" . $_SESSION['NienDo'] . "/tokhaithue_tncn.xls");
}else{
    $objPHPExcel = $objReader->load($_SESSION['DRIVER_PM'] . "/tmp/tmp_05_qtt_tncn_tt80_2021.xls");

    $objPHPExcel->setActiveSheetIndex(0);

    $baseRow =7;
    $sott = 0;
    foreach ($data as $dataRow) {
        $row = $baseRow++;
        $sott++;
        $TongTNCT = ($dataRow['tongluongcb'] + $dataRow['tongphucapchucvu'] + $dataRow['tongphucapkhongdungbhxh']+ $dataRow['tongbaohiem']);
        $GiamTruGiaCanh = $dataRow['giamtrugiacanh'];
        $GiamTruBHXH = $dataRow['tongbaohiem'];
        //$objPHPExcel->getActiveSheet()->insertNewRowBefore($row, 1);
        $LoaiGT = "01";
		$TenLoaiGT = "Thẻ CCCD";
        if(Strlen($dataRow['socmnd'])==9){
            $LoaiGT = "01";
			$TenLoaiGT = "CMND";
        }else{
            $LoaiGT = "03";
			$TenLoaiGT = "Thẻ CCCD";
        }

        $objPHPExcel->getActiveSheet()->setCellValue('B' . $row, $sott)
            ->setCellValue('C' . $row, $dataRow['tennv'])
            ->setCellValue('D' . $row, $dataRow['masothue'])
            ->setCellValue('E' . $row, $TenLoaiGT)
            ->setCellValue('F' . $row, $dataRow['socmnd'])
            ->setCellValue('I' . $row, ($TongTNCT))
            ->setCellValue('P' . $row, ($GiamTruBHXH))
            ->setCellValue('N' . $row, ($GiamTruGiaCanh))
            ->setCellValue('Y' . $row, ($LoaiGT));

    }

    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
    $objWriter->save($_SESSION['DRIVER_PM'] . "/datafile/" . $_SESSION['MST'] . "/" . $_SESSION['NienDo'] . "/Bang_Ke_05_1_QTT_TT80.xls");
}