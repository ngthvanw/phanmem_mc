<?php
session_start();
require '../../phpexcel/PHPExcel.php';
$objPHPExcel = new PHPExcel();
$objPHPExcel->getDefaultStyle()->getFont()->setName('times new roman');
$objPHPExcel->getDefaultStyle()->getFont()->setSize(10); //SET FONT AND SIZE DEFAULT
$objPHPExcel->setActiveSheetIndex(0)
    ->setCellValue('A1', 'STT')
    ->setCellValue('B1', 'Ngày ghi sổ')
    ->setCellValue('C1', 'Chứng từ ')
    ->setCellValue('E1', 'Diễn giải')
    ->setCellValue('F1', 'TK đối ứng')
    ->setCellValue('G1', 'Đơn giá')
    ->setCellValue('H1', 'Nhập')
    ->setCellValue('J1', 'Xuất')
    ->setCellValue('L1', 'Số tồn');
$objPHPExcel->setActiveSheetIndex(0)
    ->setCellValue('A2', 'STT')
    ->setCellValue('B2', 'Ngày ghi sổ')
    ->setCellValue('C2', 'Số hiệu')
    ->setCellValue('D2', 'Ngày')
    ->setCellValue('E2', 'Diễn giải')
    ->setCellValue('F2', 'TK đối ứng')
    ->setCellValue('G2', 'Đơn giá')
    ->setCellValue('H2', 'Số lượng')
    ->setCellValue('I2', 'Thành tiền')
    ->setCellValue('J2', 'Số lượng')
    ->setCellValue('K2', 'Thành tiền')
    ->setCellValue('L2', 'Số lượng')
    ->setCellValue('M2', 'Thành tiền');
$objPHPExcel->getActiveSheet()->mergeCells('A1:A2');
$objPHPExcel->getActiveSheet()->mergeCells('B1:B2');
$objPHPExcel->getActiveSheet()->mergeCells('C1:D1');
$objPHPExcel->getActiveSheet()->mergeCells('E1:E2');
$objPHPExcel->getActiveSheet()->mergeCells('F1:F2');
$objPHPExcel->getActiveSheet()->mergeCells('G1:G2');
$objPHPExcel->getActiveSheet()->mergeCells('H1:I1');
$objPHPExcel->getActiveSheet()->mergeCells('J1:K1');
$objPHPExcel->getActiveSheet()->mergeCells('L1:M1');

$lists = $_SESSION["LISTTKTHANG"];

//set gia tri cho cac cot du lieu
$i = 3;
$dem=0;
foreach ($lists as $row1) {
    foreach ($row1 as $row) {
        $dem++;
        $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A' . $i, $dem)
            ->setCellValue('B' . $i, "'" . $row['mavt'])
            ->setCellValue('C' . $i, $row['tenvt'])
            ->setCellValue('D' . $i, $row['dvt'])
            ->setCellValue('E' . $i, $row['soluongtondk'])
            ->setCellValue('F' . $i, ($row['thanhtientondk']))
            ->setCellValue('G' . $i, $row['soluongnhap'])
            ->setCellValue('H' . $i, ($row['thanhtiennhap']))
            ->setCellValue('I' . $i, $row['soluongxuat'])
            ->setCellValue('J' . $i, ($row['thanhtienxuat']))
            ->setCellValue('K' . $i, $row['soluongtonck'])
            ->setCellValue('L' . $i, ($row['thanhtientonck']))
            ->setCellValue('L' . $i, ($row['giaban']));
        $objPHPExcel->getActiveSheet()->getStyle('F' . $i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
        $objPHPExcel->getActiveSheet()->getStyle('H' . $i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
        $objPHPExcel->getActiveSheet()->getStyle('J' . $i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
        $objPHPExcel->getActiveSheet()->getStyle('L' . $i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
        $objPHPExcel->getActiveSheet()->getStyle('F' . $i)->getNumberFormat()->setFormatCode('#,##');
        $objPHPExcel->getActiveSheet()->getStyle('H' . $i)->getNumberFormat()->setFormatCode('#,##');
        $objPHPExcel->getActiveSheet()->getStyle('J' . $i)->getNumberFormat()->setFormatCode('#,##');
        $objPHPExcel->getActiveSheet()->getStyle('L' . $i)->getNumberFormat()->setFormatCode('#,##');
        $i++;
    }
}
$objPHPExcel->getActiveSheet()->SetCellValue('E'.$i, "Tổng cộng");
$objPHPExcel->getActiveSheet()->SetCellValue('F'.$i, "=SUM(F3:F".($i-1).")");
$objPHPExcel->getActiveSheet()->SetCellValue('H'.$i, "=SUM(H3:H".($i-1).")");
$objPHPExcel->getActiveSheet()->SetCellValue('J'.$i, "=SUM(J3:J".($i-1).")");
$objPHPExcel->getActiveSheet()->SetCellValue('L'.$i, "=SUM(L3:L".($i-1).")");

$objPHPExcel->getActiveSheet()->getStyle('F'.$i)->getNumberFormat()->setFormatCode('#,##');
$objPHPExcel->getActiveSheet()->getStyle('H'.$i)->getNumberFormat()->setFormatCode('#,##');
$objPHPExcel->getActiveSheet()->getStyle('J'.$i)->getNumberFormat()->setFormatCode('#,##');
$objPHPExcel->getActiveSheet()->getStyle('L'.$i)->getNumberFormat()->setFormatCode('#,##');

$styleArray = array(
    'borders' => array(
        'allborders' => array(
            'style' => PHPExcel_Style_Border::BORDER_THIN
        ),
    ),
);
$objPHPExcel->getActiveSheet()->getStyle('A1:M'.$i)->applyFromArray($styleArray); // BORDER
$styleArray10L = array(
    'font' => array(
        'bold' => true,
        'size'=>10,
    ),
    'alignment' => array(
        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
    )
);
$objPHPExcel->getActiveSheet()->getStyle('A1:M2')->applyFromArray($styleArray10L);
$objPHPExcel->getActiveSheet()->getStyle('A'.$i.':M'.$i)->applyFromArray($styleArray10L);
//-- CANH GIỮA TIÊU ĐỀ
$objPHPExcel->getActiveSheet()->getStyle('A1:L2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(5);
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(10);
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(10);
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(15);
$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(50);
$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(15);
$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(15);
$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(15);
$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(15);
$objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(15);
$objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(15);
$objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(15);
$objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(15);

//ghi du lieu vao file,định dạng file excel 2007
$objPHPExcel->getActiveSheet()->setTitle("so_chi_tiet_hh");
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$full_path = 'so_chi_tiet_hang_hoa.xlsx';//duong dan file
//$objWriter->save($full_path);
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="'.$full_path.'"');
header('Cache-Control: max-age=0');
//$objWriter->save($full_path);
$objWriter->save('php://output');
?>