<?php
session_start();
require '../../phpexcel/PHPExcel.php';
$objPHPExcel = new PHPExcel();
$objPHPExcel->getDefaultStyle()->getFont()->setName('times new roman');
$objPHPExcel->getDefaultStyle()->getFont()->setSize(10); //SET FONT AND SIZE DEFAULT

$objPHPExcel->setActiveSheetIndex(0)
    ->setCellValue('A1', $_SESSION["TenCongTy"])
    ->setCellValue('A2',"MST :".$_SESSION["MST"]);

$objPHPExcel->setActiveSheetIndex(0)
    ->setCellValue('A3', $_SESSION["THONGTINPHIEUBANGLUONGNHANVIEN"]['tenphieu'])
    ->setCellValue('A4',$_SESSION["THONGTINPHIEUBANGLUONGNHANVIEN"]['ngayhoadon']);
$objPHPExcel->setActiveSheetIndex(0)
    ->setCellValue('A5', 'STT')
    ->setCellValue('B5', 'HỌ VÀ TÊN')
    ->setCellValue('C5', 'CHỨC DANH')
    ->setCellValue('D5', 'TIỀN LƯƠNG VÀ THU NHẬP NHẬN ĐƯỢC')
    ->setCellValue('L5', 'TIỀN LƯƠNG VÀ THU NHẬP ĐƯỢC LẢNH');

$objPHPExcel->setActiveSheetIndex(0)
    ->setCellValue('D6', 'CHIA RA')
    ->setCellValue('I6', 'CHIA RA');

$objPHPExcel->setActiveSheetIndex(0)
    ->setCellValue('D7', 'Lương CB')
    ->setCellValue('E7', 'Tiền ăn giữa ca')
    ->setCellValue('F7', 'Phụ cấp chức vụ')
    ->setCellValue('G7', 'Phụ cấp không đóng BHXH')
    ->setCellValue('H7', 'TỔNG CỘNG')
    ->setCellValue('I7', 'BHXH;BHYT')
    ->setCellValue('J7', 'Thuế thu nhập')
    ->setCellValue('K7', 'TỔNG CỘNG')
    ->setCellValue('L7', 'TIỀN LẢNH')
    ->setCellValue('M7', 'KÝ NHẬN');
$objPHPExcel->setActiveSheetIndex(0)
    ->setCellValue('A8', '(1)')
    ->setCellValue('B8', '(2)')
    ->setCellValue('C8', '(3)')
    ->setCellValue('D8', '(4)')
    ->setCellValue('E8', '(5)')
    ->setCellValue('F8', '(6)')
    ->setCellValue('G8', '(7)')
    ->setCellValue('H8', '(8)')
    ->setCellValue('I8', '(9)')
    ->setCellValue('J8', '(10)')
    ->setCellValue('K8', '(11)')
    ->setCellValue('L8', '(12)')
    ->setCellValue('M8', '(13)');

$objPHPExcel->getActiveSheet()->mergeCells('A3:M3');
$objPHPExcel->getActiveSheet()->mergeCells('A4:M4');
$objPHPExcel->getActiveSheet()->mergeCells('A5:A7');
$objPHPExcel->getActiveSheet()->mergeCells('B5:B7');
$objPHPExcel->getActiveSheet()->mergeCells('C5:C7');
$objPHPExcel->getActiveSheet()->mergeCells('D5:K5');
$objPHPExcel->getActiveSheet()->mergeCells('D6:H6');
$objPHPExcel->getActiveSheet()->mergeCells('I6:K6');
$objPHPExcel->getActiveSheet()->mergeCells('L5:M6');

$lists = $_SESSION["LISTBANGLUONGNHANVIEN"];

//set gia tri cho cac cot du lieu
$i = 9;
$dem = 0;
    foreach ($lists as $row) {
        $dem++;
        $TONGLUONG = $row["luongcb"]+$row["tienangiuaca"]+$row["phucapkhongdungbhxh"]+$row["phucapchucvu"];
        $TONGLUONGDUOCNHAN+=$TONGLUONG;
        $TONGPHAINOP = $row["baohiem"] + $row["thuethunhap"];
        $TONGPHAINOPBAOHIEM+=$TONGPHAINOP;
        $THUCLANH = $TONGLUONG - $TONGPHAINOP;
        $TONGTHUCLANH+=$THUCLANH;
        $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A' . $i, $dem)
            ->setCellValue('B' . $i, $row['tennv'])
            ->setCellValue('C' . $i, $row['chucvu'])
            ->setCellValue('D' . $i, $row['luongcb'])
            ->setCellValue('E' . $i, $row['tienangiuaca'])
            ->setCellValue('F' . $i,($row['phucapchucvu']))
            ->setCellValue('G' . $i, $row['phucapkhongdungbhxh'])
            ->setCellValue('H' . $i,$TONGLUONG)
            ->setCellValue('I' . $i, $row['baohiem'])
            ->setCellValue('J' . $i, $row['thuethunhap'])
            ->setCellValue('K' . $i, ($TONGPHAINOP))
			 ->setCellValue('L' . $i, ($THUCLANH));

        $objPHPExcel->getActiveSheet()->getStyle('H' . $i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
        $objPHPExcel->getActiveSheet()->getStyle('J' . $i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);

       // $objPHPExcel->getActiveSheet()->getStyle('F' . $i)->getNumberFormat()->setFormatCode('#,##');
        $objPHPExcel->getActiveSheet()->getStyle('D' . $i)->getNumberFormat()->setFormatCode('#,##');
        $objPHPExcel->getActiveSheet()->getStyle('E' . $i)->getNumberFormat()->setFormatCode('#,##');
        $objPHPExcel->getActiveSheet()->getStyle('F' . $i)->getNumberFormat()->setFormatCode('#,##');
        $objPHPExcel->getActiveSheet()->getStyle('G' . $i)->getNumberFormat()->setFormatCode('#,##');
        $objPHPExcel->getActiveSheet()->getStyle('H' . $i)->getNumberFormat()->setFormatCode('#,##');
        $objPHPExcel->getActiveSheet()->getStyle('I' . $i)->getNumberFormat()->setFormatCode('#,##');
        $objPHPExcel->getActiveSheet()->getStyle('J' . $i)->getNumberFormat()->setFormatCode('#,##');
        $objPHPExcel->getActiveSheet()->getStyle('K' . $i)->getNumberFormat()->setFormatCode('#,##');
        $objPHPExcel->getActiveSheet()->getStyle('L' . $i)->getNumberFormat()->setFormatCode('#,##');


        $i++;
    }
$objPHPExcel->getActiveSheet()->SetCellValue('C' . $i, "Tổng cộng");

$objPHPExcel->getActiveSheet()->SetCellValue('D' . $i, "=SUM(D6:D" . ($i - 1) . ")");
$objPHPExcel->getActiveSheet()->SetCellValue('H' . $i, "=SUM(H6:H" . ($i - 1) . ")");
$objPHPExcel->getActiveSheet()->SetCellValue('K' . $i, "=SUM(K6:K" . ($i - 1) . ")");
$objPHPExcel->getActiveSheet()->SetCellValue('L' . $i, "=SUM(L6:L" . ($i - 1) . ")");

$objPHPExcel->getActiveSheet()->getStyle('D' . $i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
$objPHPExcel->getActiveSheet()->getStyle('E' . $i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
$objPHPExcel->getActiveSheet()->getStyle('F' . $i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
$objPHPExcel->getActiveSheet()->getStyle('G' . $i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
$objPHPExcel->getActiveSheet()->getStyle('H' . $i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
$objPHPExcel->getActiveSheet()->getStyle('I' . $i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
$objPHPExcel->getActiveSheet()->getStyle('J' . $i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
$objPHPExcel->getActiveSheet()->getStyle('K' . $i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
$objPHPExcel->getActiveSheet()->getStyle('L' . $i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);




$objPHPExcel->getActiveSheet()->getStyle('D' . $i)->getNumberFormat()->setFormatCode('#,##');
$objPHPExcel->getActiveSheet()->getStyle('E' . $i)->getNumberFormat()->setFormatCode('#,##');
$objPHPExcel->getActiveSheet()->getStyle('F' . $i)->getNumberFormat()->setFormatCode('#,##');
$objPHPExcel->getActiveSheet()->getStyle('G' . $i)->getNumberFormat()->setFormatCode('#,##');
$objPHPExcel->getActiveSheet()->getStyle('H' . $i)->getNumberFormat()->setFormatCode('#,##');
$objPHPExcel->getActiveSheet()->getStyle('I' . $i)->getNumberFormat()->setFormatCode('#,##');
$objPHPExcel->getActiveSheet()->getStyle('J' . $i)->getNumberFormat()->setFormatCode('#,##');
$objPHPExcel->getActiveSheet()->getStyle('K' . $i)->getNumberFormat()->setFormatCode('#,##');
$objPHPExcel->getActiveSheet()->getStyle('L' . $i)->getNumberFormat()->setFormatCode('#,##');

$styleArray = array(
    'borders' => array(
        'allborders' => array(
            'style' => PHPExcel_Style_Border::BORDER_THIN
        ),
    ),
);
$objPHPExcel->getActiveSheet()->getStyle('A5:M' . $i)->applyFromArray($styleArray); // BORDER
$styleArray10L = array(
    'font' => array(
        'bold' => true,
        'size' => 10,
    ),
    'alignment' => array(
        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
    )
);
$objPHPExcel->getActiveSheet()->getStyle('A1:L2')->applyFromArray($styleArray10L);
$objPHPExcel->getActiveSheet()->getStyle('A' . $i . ':L' . $i)->applyFromArray($styleArray10L);
//-- CANH GIỮA TIÊU ĐỀ
$objPHPExcel->getActiveSheet()->getStyle('A1:L2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(5);
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(15);
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(15);
$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(10);
$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(15);
$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(10);
$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(15);
$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(15);
$objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(15);
$objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(15);
$objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(15);
$objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(15);

$objPHPExcel->getActiveSheet()->SetCellValue('K' . ($i+2), $_SESSION["THONGTINPHIEUBANGLUONGNHANVIEN"]['ngaylap']);
$objPHPExcel->getActiveSheet()->SetCellValue('C' . ($i+3), "LẬP BẢNG");
$objPHPExcel->getActiveSheet()->SetCellValue('H' . ($i+3), "PHỤ TRÁCH KẾ TOÁN");
$objPHPExcel->getActiveSheet()->SetCellValue('K' . ($i+3), "GIÁM ĐỐC");

//ghi du lieu vao file,định dạng file excel 2007
$objPHPExcel->getActiveSheet()->setTitle("BangLuong ");
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$full_path = 'bang_ke_mua_vao.xlsx';//duong dan file
//$objWriter->save($full_path);
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="' . $full_path . '"');
header('Cache-Control: max-age=0');
//$objWriter->save($full_path);
$objWriter->save('php://output');
?>