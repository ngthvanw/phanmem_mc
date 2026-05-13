<?php
session_start();
require '../../phpexcel/PHPExcel.php';
$objPHPExcel = new PHPExcel();
$objPHPExcel->getDefaultStyle()->getFont()->setName('times new roman');
$objPHPExcel->getDefaultStyle()->getFont()->setSize(10); //SET FONT AND SIZE DEFAULT
$objPHPExcel->setActiveSheetIndex(0)
    ->setCellValue('A1', 'STT')
    ->setCellValue('B1', 'Mã số')
    ->setCellValue('C1', 'Tên, nhãn hiệu, quy cách ')
    ->setCellValue('D1', 'Tài khoản')
    ->setCellValue('E1', 'ĐVT')
    ->setCellValue('F1', 'Số tồn cuối kỳ')
    ->setCellValue('I1', 'Mã kho');
$objPHPExcel->setActiveSheetIndex(0)
    ->setCellValue('A2', 'STT')
    ->setCellValue('B2', 'Mã số')
    ->setCellValue('C2', 'Tên, nhãn hiệu, quy cách ')
    ->setCellValue('D2', '')
    ->setCellValue('E2', 'ĐVT')
    ->setCellValue('F2', 'Số lượng')
    ->setCellValue('G2', 'Đơn giá')
    ->setCellValue('H2', 'Thành tiền')
    ->setCellValue('I2', 'Mã kho');

$objPHPExcel->getActiveSheet()->mergeCells('A1:A2');
$objPHPExcel->getActiveSheet()->mergeCells('B1:B2');
$objPHPExcel->getActiveSheet()->mergeCells('C1:C2');
$objPHPExcel->getActiveSheet()->mergeCells('D1:D2');
$objPHPExcel->getActiveSheet()->mergeCells('E1:E2');
$objPHPExcel->getActiveSheet()->mergeCells('F1:H1');
$objPHPExcel->getActiveSheet()->mergeCells('I1:I2');


$lists = $_SESSION["LISTTKTHANG"];
//echo "<pre>";
//print_r($lists);
//echo "</pre>";
//set gia tri cho cac cot du lieu
$i = 3;
$dem=0;
foreach ($lists as $val1) {
foreach ($val1 as $key=>$val) {
    $tongthanhtieng = 0;
    $tongslg = 0;
    $count_dong = 0;
    foreach ($val as $row) {
        $count_dong++;
        $dem++;
        $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A' . $i, $dem)
            ->setCellValue('B' . $i, "'" . $row['mavt'])
            ->setCellValue('C' . $i, html_entity_decode($row['tenvt']))
            ->setCellValue('D' . $i, $row['matk'])
            ->setCellValue('E' . $i, $row['dvt'])
            ->setCellValue('F' . $i, $row['soluongtonck'])
            ->setCellValue('G' . $i, $row['dongiabinhquan'])
            ->setCellValue('H' . $i, ($row['thanhtientonck']))
            ->setCellValue('I' . $i, ( "'" .$row['makho']));
        $objPHPExcel->getActiveSheet()->getStyle('F' . $i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
        $objPHPExcel->getActiveSheet()->getStyle('H' . $i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
        $objPHPExcel->getActiveSheet()->getStyle('J' . $i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
        $objPHPExcel->getActiveSheet()->getStyle('L' . $i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
        $objPHPExcel->getActiveSheet()->getStyle('G' . $i)->getNumberFormat()->setFormatCode('#,##0.00');
        $objPHPExcel->getActiveSheet()->getStyle('H' . $i)->getNumberFormat()->setFormatCode('#,##');
        $objPHPExcel->getActiveSheet()->getStyle('J' . $i)->getNumberFormat()->setFormatCode('#,##');
        $objPHPExcel->getActiveSheet()->getStyle('L' . $i)->getNumberFormat()->setFormatCode('#,##');
        $tongthanhtieng += $row['thanhtientonck'];
        $tongslg += $row['soluongtonck'];
        $i++;
    }
    $dongdau = $i - $count_dong;
    $objPHPExcel->setActiveSheetIndex(0)
        ->setCellValue('A' . $i, "")
        ->setCellValue('B' . $i, "")
        ->setCellValue('C' . $i, $key)
        ->setCellValue('D' . $i, "")
        ->setCellValue('E' . $i, "")
        ->setCellValue('F' . $i, $tongslg)
        ->setCellValue('G' . $i, "")
        ->setCellValue('H' . $i, ("=sum(H" . $dongdau . ":H" . ($i - 1) . ")"));
    $styleArray10L = array(
        'font' => array(
            'bold' => true,
            'size' => 10,
        ),
        'alignment' => array(
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_RIGHT,
        )
    );
    $objPHPExcel->getActiveSheet()->getStyle('A' . ($i) . ':L' . ($i))->applyFromArray($styleArray10L);
    $objPHPExcel->getActiveSheet()->getStyle('F' . $i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
    $objPHPExcel->getActiveSheet()->getStyle('H' . $i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
    $objPHPExcel->getActiveSheet()->getStyle('J' . $i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
    $objPHPExcel->getActiveSheet()->getStyle('L' . $i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
    $objPHPExcel->getActiveSheet()->getStyle('I' . $i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
    $objPHPExcel->getActiveSheet()->getStyle('G' . $i)->getNumberFormat()->setFormatCode('#,##0.00');
    $objPHPExcel->getActiveSheet()->getStyle('H' . $i)->getNumberFormat()->setFormatCode('#,##');
    $objPHPExcel->getActiveSheet()->getStyle('J' . $i)->getNumberFormat()->setFormatCode('#,##');
    $objPHPExcel->getActiveSheet()->getStyle('L' . $i)->getNumberFormat()->setFormatCode('#,##');
    $sodongg[] = $i;
    $i++;
}
}
$objPHPExcel->getActiveSheet()->SetCellValue('C'.$i, "Tổng cộng");

function sum_string($kytu,$array){
    $str="";
    foreach ($array as $item){
        $str.=$kytu.$item."+";
    }
    return "=".$str."0";
}
$objPHPExcel->getActiveSheet()->SetCellValue('H'.$i, sum_string("H",$sodongg));
//$objPHPExcel->getActiveSheet()->SetCellValue('H'.$i, "=SUM(H3:H".($i-1).")");
//$objPHPExcel->getActiveSheet()->SetCellValue('J'.$i, "=SUM(J3:J".($i-1).")");
//$objPHPExcel->getActiveSheet()->SetCellValue('L'.$i, "=SUM(L3:L".($i-1).")");

$objPHPExcel->getActiveSheet()->getStyle('G'.$i)->getNumberFormat()->setFormatCode('#,##');
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
$objPHPExcel->getActiveSheet()->getStyle('A1:H'.$i)->applyFromArray($styleArray); // BORDER
$styleArray10L = array(
    'font' => array(
        'bold' => true,
        'size'=>10,
    ),
    'alignment' => array(
        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
    )
);
$objPHPExcel->getActiveSheet()->getStyle('A1:L2')->applyFromArray($styleArray10L);
$objPHPExcel->getActiveSheet()->getStyle('A'.$i.':L'.$i)->applyFromArray($styleArray10L);
//-- CANH GIỮA TIÊU ĐỀ
$objPHPExcel->getActiveSheet()->getStyle('A1:L2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(5);
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(10);
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(50);
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(10);
$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(15);
$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(15);
$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(15);
$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(15);
$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(15);
$objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(15);
$objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(15);
$objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(15);

//ghi du lieu vao file,định dạng file excel 2007
$objPHPExcel->getActiveSheet()->setTitle("ton_kho_thang_".$_SESSION["THONGTINPHIEU"]['thangtk']);
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$full_path = 'ton_kho_thang_'.$_SESSION["THONGTINPHIEU"]['thangtk'].'.xlsx';//duong dan file
//$objWriter->save($full_path);
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="'.$full_path.'"');
header('Cache-Control: max-age=0');
//$objWriter->save($full_path);
$objWriter->save('php://output');
?>