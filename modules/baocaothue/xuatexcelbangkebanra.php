<?php
session_start();
require '../../phpexcel/PHPExcel.php';
$objPHPExcel = new PHPExcel();
$objPHPExcel->getDefaultStyle()->getFont()->setName('times new roman');
$objPHPExcel->getDefaultStyle()->getFont()->setSize(10); //SET FONT AND SIZE DEFAULT
$objPHPExcel->setActiveSheetIndex(0)
    ->setCellValue('A1', 'STT')
    ->setCellValue('B1', 'Hóa đơn, chứng từ bán ra')
    ->setCellValue('E1', 'Tên người mua')
    ->setCellValue('F1', 'Mã số thuế người mua')
    ->setCellValue('G1', 'Mặt hàng')
    ->setCellValue('H1', 'Doanh số chưa có thuế')
    ->setCellValue('I1', 'Thuế giá trị gia tăng ')
    ->setCellValue('J1', 'Ghi chú ')
	->setCellValue('K1', 'Số TT ');

$objPHPExcel->setActiveSheetIndex(0)
    ->setCellValue('A2', 'STT')
    ->setCellValue('B2', 'Ký hiệu hóa đơn')
    ->setCellValue('C2', 'Số hóa đơn')
    ->setCellValue('D2', 'Ngày tháng năm phát hành')
    ->setCellValue('E2', 'Số lượng');

$objPHPExcel->getActiveSheet()->mergeCells('A1:A2');
$objPHPExcel->getActiveSheet()->mergeCells('B1:D1');
$objPHPExcel->getActiveSheet()->mergeCells('E1:E2');
$objPHPExcel->getActiveSheet()->mergeCells('F1:F2');
$objPHPExcel->getActiveSheet()->mergeCells('G1:G2');
$objPHPExcel->getActiveSheet()->mergeCells('H1:H2');
$objPHPExcel->getActiveSheet()->mergeCells('I1:I2');
$objPHPExcel->getActiveSheet()->mergeCells('J1:J2');
$objPHPExcel->getActiveSheet()->mergeCells('K1:K2');

$lists = $_SESSION["LISTCTBANRA"];

//set gia tri cho cac cot du lieu
$i = 3;
$dem = 0;
foreach ($lists as $k => $ItemThue) {
    $objPHPExcel->setActiveSheetIndex(0)
        ->setCellValue('A' . $i, 'Hàng hóa, dịch vụ chịu thuế GTGT '.$k.'%');
    $objPHPExcel->getActiveSheet()->mergeCells('A'.$i.':J'.$i);
    $i++;
    foreach ($ItemThue as $row) {
        $dem++;
        $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A' . $i, $dem)
            ->setCellValue('B' . $i, $row['seri'])
            ->setCellValue('C' . $i, $row['sct'])
            ->setCellValue('D' . $i, $row['ngayghiso'])
            ->setCellValue('E' . $i, $row['tenkh'])
            ->setCellValue('F' . $i, "'".($row['masothue']))
            ->setCellValue('G' . $i, $row['tenvt'])
            ->setCellValue('H' . $i, ($row['thanhtien']))
            ->setCellValue('I' . $i, $row['thue'])
            ->setCellValue('J' . $i, ($row['chuthich']))
			->setCellValue('K' . $i, ($row['mapskt']));

        $objPHPExcel->getActiveSheet()->getStyle('H' . $i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
        $objPHPExcel->getActiveSheet()->getStyle('J' . $i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);

       // $objPHPExcel->getActiveSheet()->getStyle('F' . $i)->getNumberFormat()->setFormatCode('#,##');
        $objPHPExcel->getActiveSheet()->getStyle('H' . $i)->getNumberFormat()->setFormatCode('#,##');
        $objPHPExcel->getActiveSheet()->getStyle('I' . $i)->getNumberFormat()->setFormatCode('#,##');


        $i++;
    }
}
$objPHPExcel->getActiveSheet()->SetCellValue('C' . $i, "Tổng cộng");

$objPHPExcel->getActiveSheet()->SetCellValue('H' . $i, "=SUM(H3:H" . ($i - 1) . ")");
$objPHPExcel->getActiveSheet()->SetCellValue('I' . $i, "=SUM(I3:I" . ($i - 1) . ")");

$objPHPExcel->getActiveSheet()->getStyle('H' . $i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
$objPHPExcel->getActiveSheet()->getStyle('I' . $i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);




$objPHPExcel->getActiveSheet()->getStyle('H' . $i)->getNumberFormat()->setFormatCode('#,##');
$objPHPExcel->getActiveSheet()->getStyle('I' . $i)->getNumberFormat()->setFormatCode('#,##');

$styleArray = array(
    'borders' => array(
        'allborders' => array(
            'style' => PHPExcel_Style_Border::BORDER_THIN
        ),
    ),
);
$objPHPExcel->getActiveSheet()->getStyle('A1:J' . $i)->applyFromArray($styleArray); // BORDER
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
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(10);
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(10);
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(10);
$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(50);
$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(15);
$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(30);
$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(15);
$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(15);
$objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(15);

//ghi du lieu vao file,định dạng file excel 2007
$objPHPExcel->getActiveSheet()->setTitle("Bang ke ban ra ");
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$full_path = 'bang_ke_ban_ra.xlsx';//duong dan file
//$objWriter->save($full_path);
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="' . $full_path . '"');
header('Cache-Control: max-age=0');
//$objWriter->save($full_path);
$objWriter->save('php://output');
?>