<?php
session_start();
require '../../phpexcel/PHPExcel.php';
$objPHPExcel = new PHPExcel();
$objPHPExcel->getDefaultStyle()->getFont()->setName('times new roman');
$objPHPExcel->getDefaultStyle()->getFont()->setSize(10); //SET FONT AND SIZE DEFAULT
$objPHPExcel->setActiveSheetIndex(0)
    ->setCellValue('C1', 'Doanh nghiệp: '. $_SESSION["TenCongTy"])
    ->setCellValue('C2', 'Địa chỉ: '. $_SESSION["DiaChi"])
    ->setCellValue('Q2', 'Mã số thuế: '. $_SESSION["MST"])
    ->setCellValue('f4', $_SESSION["THONGTINPHIEU"]['ngayhoadon'])
    ->setCellValue('A3', $_SESSION["THONGTINPHIEU"]['tenphieu'])
    ->setCellValue('A5', 'STT')
    ->setCellValue('B5', 'Mã CT')
    ->setCellValue('C5', 'Tên công trình, dịch vụ')
    ->setCellValue('D5', 'Dở dang ĐK')
    ->setCellValue('E5', 'Nguyên vật liệu')
    ->setCellValue('G5', 'Nhân công')
    ->setCellValue('I5', 'Máy')
    ->setCellValue('K5', 'Chi phí SXC')
	->setCellValue('M5', 'Chi phí SXC PB')
    ->setCellValue('O5', 'Tổng cộng')
    ->setCellValue('P5', 'Doanh thu thuần')
    ->setCellValue('Q5', 'Giá thành')
    ->setCellValue('R5', 'Lãi(Lỗ)')
    ->setCellValue('S5', 'Dở dang CK')
;

$objPHPExcel->setActiveSheetIndex(0)
    ->setCellValue('E6', 'Số tiền')
    ->setCellValue('F6', 'Tỷ lệ')
    ->setCellValue('G6', 'Số tiền')
    ->setCellValue('H6', 'Tỷ lệ')
    ->setCellValue('I6', 'Số tiền')
    ->setCellValue('J6', 'Tỷ lệ')
    ->setCellValue('K6', 'Số tiền')
    ->setCellValue('L6', 'Tỷ lệ')
    ->setCellValue('M6', 'Số tiền')
    ->setCellValue('N6', 'Tỷ lệ')
    ->setCellValue('O6', 'Số tiền')
    ->setCellValue('P6', 'Tỷ lệ')
    ;
$objPHPExcel->getActiveSheet()->mergeCells('A3:S3');
$objPHPExcel->getActiveSheet()->mergeCells('A5:A6');
$objPHPExcel->getActiveSheet()->mergeCells('B5:B6');
$objPHPExcel->getActiveSheet()->mergeCells('C5:C6');
$objPHPExcel->getActiveSheet()->mergeCells('D5:D6');
$objPHPExcel->getActiveSheet()->mergeCells('E5:F5');
$objPHPExcel->getActiveSheet()->mergeCells('G5:H5');
$objPHPExcel->getActiveSheet()->mergeCells('I5:J5');
$objPHPExcel->getActiveSheet()->mergeCells('K5:L5');
$objPHPExcel->getActiveSheet()->mergeCells('M5:N5');

$objPHPExcel->getActiveSheet()->mergeCells('O5:O6');
$objPHPExcel->getActiveSheet()->mergeCells('P5:P6');
$objPHPExcel->getActiveSheet()->mergeCells('Q5:Q6');
$objPHPExcel->getActiveSheet()->mergeCells('R5:R6');
$objPHPExcel->getActiveSheet()->mergeCells('S5:S6');

$lists = $_SESSION["THONGTINPHIEUTONGHOPDTCPGTCT"];

//set gia tri cho cac cot du lieu
$i = 7;
$dem = 0;
foreach ($lists as $k => $row) {
    $i++;
        $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A' . $i,  $row['sottxuat'])
            ->setCellValue('B' . $i, $row['mact'])
            ->setCellValue('C' . $i, $row['tenct'])
            ->setCellValue('D' . $i, $row['dodangdk'])
            ->setCellValue('E' . $i, $row['sotiennl'])
            ->setCellValue('F' . $i, ($row['tylenl']))
            ->setCellValue('G' . $i, $row['sotiennc'])
            ->setCellValue('H' . $i, ($row['tylenc']))
            ->setCellValue('I' . $i, $row['sotienmay'])
            ->setCellValue('J' . $i, ($row['tylemay']))
			->setCellValue('K' . $i, ($row['sotiencpsxc']))
            ->setCellValue('L' . $i, ($row['tylecpsxc']))
            ->setCellValue('M' . $i, ($row['sotiencpsxcpb']))
            ->setCellValue('N' . $i, ($row['tylecpsxcpb']))
            ->setCellValue('O' . $i, ($row['tongcong']))
            ->setCellValue('P' . $i, ($row['doanhthuthuan']))
            ->setCellValue('Q' . $i, ($row['giathanh']))
            ->setCellValue('R' . $i, ($row['lailo']))
            ->setCellValue('S' . $i, ($row['dodangck']))
        ;

    $objPHPExcel->getActiveSheet()->getStyle('D' . $i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
    $objPHPExcel->getActiveSheet()->getStyle('E' . $i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
    $objPHPExcel->getActiveSheet()->getStyle('F' . $i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
    $objPHPExcel->getActiveSheet()->getStyle('G' . $i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
    $objPHPExcel->getActiveSheet()->getStyle('H' . $i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
    $objPHPExcel->getActiveSheet()->getStyle('I' . $i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
    $objPHPExcel->getActiveSheet()->getStyle('J' . $i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
    $objPHPExcel->getActiveSheet()->getStyle('K' . $i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
    $objPHPExcel->getActiveSheet()->getStyle('L' . $i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
    $objPHPExcel->getActiveSheet()->getStyle('M' . $i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
    $objPHPExcel->getActiveSheet()->getStyle('N' . $i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
    $objPHPExcel->getActiveSheet()->getStyle('O' . $i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
    $objPHPExcel->getActiveSheet()->getStyle('P' . $i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
    $objPHPExcel->getActiveSheet()->getStyle('Q' . $i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
    $objPHPExcel->getActiveSheet()->getStyle('R' . $i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
    $objPHPExcel->getActiveSheet()->getStyle('S' . $i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);




    $objPHPExcel->getActiveSheet()->getStyle('D' . $i)->getNumberFormat()->setFormatCode('#,##');
    $objPHPExcel->getActiveSheet()->getStyle('E' . $i)->getNumberFormat()->setFormatCode('#,##');
    //$objPHPExcel->getActiveSheet()->getStyle('F' . $i)->getNumberFormat()->setFormatCode('#,##');
    $objPHPExcel->getActiveSheet()->getStyle('G' . $i)->getNumberFormat()->setFormatCode('#,##');
    //$objPHPExcel->getActiveSheet()->getStyle('H' . $i)->getNumberFormat()->setFormatCode('#,##');
    $objPHPExcel->getActiveSheet()->getStyle('I' . $i)->getNumberFormat()->setFormatCode('#,##');
    //$objPHPExcel->getActiveSheet()->getStyle('J' . $i)->getNumberFormat()->setFormatCode('#,##');
    $objPHPExcel->getActiveSheet()->getStyle('K' . $i)->getNumberFormat()->setFormatCode('#,##');
    //$objPHPExcel->getActiveSheet()->getStyle('L' . $i)->getNumberFormat()->setFormatCode('#,##');
    $objPHPExcel->getActiveSheet()->getStyle('M' . $i)->getNumberFormat()->setFormatCode('#,##');
    //$objPHPExcel->getActiveSheet()->getStyle('N' . $i)->getNumberFormat()->setFormatCode('#,##');
    $objPHPExcel->getActiveSheet()->getStyle('O' . $i)->getNumberFormat()->setFormatCode('#,##');
    $objPHPExcel->getActiveSheet()->getStyle('P' . $i)->getNumberFormat()->setFormatCode('#,##');
    $objPHPExcel->getActiveSheet()->getStyle('Q' . $i)->getNumberFormat()->setFormatCode('#,##');
    $objPHPExcel->getActiveSheet()->getStyle('R' . $i)->getNumberFormat()->setFormatCode('#,##');
    $objPHPExcel->getActiveSheet()->getStyle('S' . $i)->getNumberFormat()->setFormatCode('#,##');
    if($row['mactcha']=="0"){
        $sumD.="D".$i."+";
        $sumE.="E".$i."+";
        $sumG.="G".$i."+";
        $sumI.="I".$i."+";
        $sumK.="K".$i."+";
        $sumM.="M".$i."+";
        $sumO.="O".$i."+";
        $sumP.="P".$i."+";
        $sumQ.="Q".$i."+";
        $sumR.="R".$i."+";
        $sumS.="S".$i."+";
    }
}
$i++;
$objPHPExcel->getActiveSheet()->SetCellValue('C' . $i, "Tổng cộng");

$objPHPExcel->getActiveSheet()->SetCellValue('D' . $i, "=".substr($sumD,0,-1));
$objPHPExcel->getActiveSheet()->SetCellValue('E' . $i, "=".substr($sumE,0,-1));
$objPHPExcel->getActiveSheet()->SetCellValue('G' . $i, "=".substr($sumG,0,-1));
$objPHPExcel->getActiveSheet()->SetCellValue('I' . $i, "=".substr($sumI,0,-1));
$objPHPExcel->getActiveSheet()->SetCellValue('K' . $i, "=".substr($sumK,0,-1));
$objPHPExcel->getActiveSheet()->SetCellValue('M' . $i, "=".substr($sumM,0,-1));
$objPHPExcel->getActiveSheet()->SetCellValue('O' . $i, "=".substr($sumO,0,-1));
$objPHPExcel->getActiveSheet()->SetCellValue('P' . $i, "=".substr($sumP,0,-1));
$objPHPExcel->getActiveSheet()->SetCellValue('Q' . $i, "=".substr($sumQ,0,-1));
$objPHPExcel->getActiveSheet()->SetCellValue('R' . $i, "=".substr($sumR,0,-1));
$objPHPExcel->getActiveSheet()->SetCellValue('S' . $i, "=".substr($sumS,0,-1));

$objPHPExcel->getActiveSheet()->getStyle('D' . $i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
$objPHPExcel->getActiveSheet()->getStyle('E' . $i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
$objPHPExcel->getActiveSheet()->getStyle('F' . $i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
$objPHPExcel->getActiveSheet()->getStyle('G' . $i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
$objPHPExcel->getActiveSheet()->getStyle('H' . $i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
$objPHPExcel->getActiveSheet()->getStyle('I' . $i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
$objPHPExcel->getActiveSheet()->getStyle('J' . $i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
$objPHPExcel->getActiveSheet()->getStyle('K' . $i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
$objPHPExcel->getActiveSheet()->getStyle('L' . $i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
$objPHPExcel->getActiveSheet()->getStyle('M' . $i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
$objPHPExcel->getActiveSheet()->getStyle('N' . $i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
$objPHPExcel->getActiveSheet()->getStyle('O' . $i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
$objPHPExcel->getActiveSheet()->getStyle('P' . $i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
$objPHPExcel->getActiveSheet()->getStyle('Q' . $i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
$objPHPExcel->getActiveSheet()->getStyle('R' . $i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
$objPHPExcel->getActiveSheet()->getStyle('S' . $i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);




$objPHPExcel->getActiveSheet()->getStyle('D' . $i)->getNumberFormat()->setFormatCode('#,##');
$objPHPExcel->getActiveSheet()->getStyle('E' . $i)->getNumberFormat()->setFormatCode('#,##');
$objPHPExcel->getActiveSheet()->getStyle('F' . $i)->getNumberFormat()->setFormatCode('#,##');
$objPHPExcel->getActiveSheet()->getStyle('G' . $i)->getNumberFormat()->setFormatCode('#,##');
$objPHPExcel->getActiveSheet()->getStyle('H' . $i)->getNumberFormat()->setFormatCode('#,##');
$objPHPExcel->getActiveSheet()->getStyle('I' . $i)->getNumberFormat()->setFormatCode('#,##');
$objPHPExcel->getActiveSheet()->getStyle('J' . $i)->getNumberFormat()->setFormatCode('#,##');
$objPHPExcel->getActiveSheet()->getStyle('K' . $i)->getNumberFormat()->setFormatCode('#,##');
$objPHPExcel->getActiveSheet()->getStyle('L' . $i)->getNumberFormat()->setFormatCode('#,##');
$objPHPExcel->getActiveSheet()->getStyle('M' . $i)->getNumberFormat()->setFormatCode('#,##');
$objPHPExcel->getActiveSheet()->getStyle('N' . $i)->getNumberFormat()->setFormatCode('#,##');
$objPHPExcel->getActiveSheet()->getStyle('O' . $i)->getNumberFormat()->setFormatCode('#,##');
$objPHPExcel->getActiveSheet()->getStyle('P' . $i)->getNumberFormat()->setFormatCode('#,##');
$objPHPExcel->getActiveSheet()->getStyle('Q' . $i)->getNumberFormat()->setFormatCode('#,##');
$objPHPExcel->getActiveSheet()->getStyle('R' . $i)->getNumberFormat()->setFormatCode('#,##');
$objPHPExcel->getActiveSheet()->getStyle('S' . $i)->getNumberFormat()->setFormatCode('#,##');

$styleArray = array(
    'borders' => array(
        'allborders' => array(
            'style' => PHPExcel_Style_Border::BORDER_THIN
        ),
    ),
);
$objPHPExcel->getActiveSheet()->getStyle('A5:S' . $i)->applyFromArray($styleArray); // BORDER
$styleArray10L = array(
    'font' => array(
        'bold' => true,
        'size' => 10,
    ),
    'alignment' => array(
        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
    )
);
$styleArray12L = array(
    'font' => array(
        'bold' => true,
        'size' => 10,
    ),
    'alignment' => array(
        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
    )
);
$objPHPExcel->getActiveSheet()->getStyle('A5:S6')->applyFromArray($styleArray10L);
$objPHPExcel->getActiveSheet()->getStyle('A' . $i . ':L' . $i)->applyFromArray($styleArray10L);
//-- CANH GIỮA TIÊU ĐỀ
$objPHPExcel->getActiveSheet()->getStyle('A3:S3')->applyFromArray($styleArray12L);

$objPHPExcel->getActiveSheet()->getStyle('A5:S6')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(5);
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(10);
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(50);
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(15);
$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(15);
$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(5);
$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(15);
$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(5);
$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(15);
$objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(5);
$objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(15);
$objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(5);
$objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(15);
$objPHPExcel->getActiveSheet()->getColumnDimension('N')->setWidth(5);
$objPHPExcel->getActiveSheet()->getColumnDimension('O')->setWidth(15);
$objPHPExcel->getActiveSheet()->getColumnDimension('P')->setWidth(15);
$objPHPExcel->getActiveSheet()->getColumnDimension('Q')->setWidth(15);
$objPHPExcel->getActiveSheet()->getColumnDimension('R')->setWidth(15);
$objPHPExcel->getActiveSheet()->getColumnDimension('S')->setWidth(15);

//ghi du lieu vao file,định dạng file excel 2007
$objPHPExcel->getActiveSheet()->setTitle("gtct".time());
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$full_path = "gtct".time().'.xlsx';//duong dan file
//$objWriter->save($full_path);
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="' . $full_path . '"');
header('Cache-Control: max-age=0');
//$objWriter->save($full_path);
$objWriter->save('php://output');
?>