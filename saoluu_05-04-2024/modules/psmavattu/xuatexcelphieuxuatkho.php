<?php
session_start();
require '../../phpexcel/PHPExcel.php';
$objPHPExcel = new PHPExcel();
$objPHPExcel->getDefaultStyle()->getFont()->setName('times new roman');
$objPHPExcel->getDefaultStyle()->getFont()->setSize(10); //SET FONT AND SIZE DEFAULT


$lists = $_SESSION['PhieuNhapXuatCT'];

//set gia tri cho cac cot du lieu
$index_worksheet = 0;
foreach ($lists as $k => $ItemThue) {
    $i = 3;
    $dem = 0;
    if($index_worksheet>0){
        $objPHPExcel->createSheet(); //Tạo sheet mới
    }
    $objPHPExcel->setActiveSheetIndex($index_worksheet)
        ->setCellValue('A1', 'STT')
        ->setCellValue('B1', 'Tên, nhãn hiệu, quy cách, phẩm chất vật tư, dụng cụ, sản phẩm, hàng hóa')
        ->setCellValue('C1', 'Mã số')
        ->setCellValue('D1', 'ĐVT')
        ->setCellValue('E1', 'Số lượng')
        ->setCellValue('F1', 'Đơn giá')
        ->setCellValue('G1', 'Chiết khâu')
        ->setCellValue('H1', 'Thuế')
        ->setCellValue('I1', 'Thành tiền');

    $objPHPExcel->setActiveSheetIndex($index_worksheet);
    foreach ($ItemThue as $row) {
        $dem++;
        $objPHPExcel->setActiveSheetIndex($index_worksheet)
            ->setCellValue('A' . $i, $dem)
            ->setCellValue('B' . $i, $row['tenvt'])
            ->setCellValue('C' . $i, $row['mavt'])
            ->setCellValue('D' . $i, $row['dvt'])
            ->setCellValue('E' . $i, $row['soluongnhap'])
            ->setCellValue('F' . $i,($row['donggianhap']))
            ->setCellValue('G' . $i, $row['chietkhau'])
            ->setCellValue('H' . $i, ($row['thue']))
            ->setCellValue('I' . $i,($row['thanhtien']));

        $objPHPExcel->getActiveSheet()->getStyle('H' . $i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
        $objPHPExcel->getActiveSheet()->getStyle('J' . $i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);

       // $objPHPExcel->getActiveSheet()->getStyle('F' . $i)->getNumberFormat()->setFormatCode('#,##');
        $objPHPExcel->getActiveSheet()->getStyle('H' . $i)->getNumberFormat()->setFormatCode('#,##');
        $objPHPExcel->getActiveSheet()->getStyle('I' . $i)->getNumberFormat()->setFormatCode('#,##');


        $i++;
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
    $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(50);
    $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(10);
    $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(10);
    $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(10);
    $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(15);
    $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(10);
    $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(15);
    $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(20);

    //ghi du lieu vao file,định dạng file excel 2007
    $objPHPExcel->getActiveSheet()->setTitle("Phieuxuatkho_so ".$row['mapskt']);

    $index_worksheet++;
}

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$full_path = 'Phieu_xuat_kho.xlsx';//duong dan file
//$objWriter->save($full_path);
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="' . $full_path . '"');
header('Cache-Control: max-age=0');
//$objWriter->save($full_path);
$objWriter->save('php://output');
?>