<?php
session_start();
require '../../phpexcel/PHPExcel.php';
$objPHPExcel = new PHPExcel();
$objPHPExcel->getDefaultStyle()->getFont()->setName('times new roman');
$objPHPExcel->getDefaultStyle()->getFont()->setSize(10); //SET FONT AND SIZE DEFAULT
$objPHPExcel->setActiveSheetIndex(0)
    ->setCellValue('A1', 'STT')
    ->setCellValue('B1', 'Tên hàng')
    ->setCellValue('C1', 'Đơn vị tính')
    ->setCellValue('D1', 'Số lượng')
    ->setCellValue('E1', 'ĐƠN GIÁ')
    ->setCellValue('G1', 'THÀNH TIỀN')
    ->setCellValue('I1', 'Lãi gộp');

$objPHPExcel->setActiveSheetIndex(0)
    ->setCellValue('E2', 'Giá vốn')
    ->setCellValue('F2', 'Giá bán')
    ->setCellValue('G2', 'Giá vốn')
    ->setCellValue('H2', 'Giá bán')
    ->setCellValue('I2', 'Tỷ lệ')
    ->setCellValue('J2', 'Tiền');

$objPHPExcel->getActiveSheet()->mergeCells('A1:A2');
$objPHPExcel->getActiveSheet()->mergeCells('B1:B2');
$objPHPExcel->getActiveSheet()->mergeCells('C1:C2');
$objPHPExcel->getActiveSheet()->mergeCells('D1:D2');
$objPHPExcel->getActiveSheet()->mergeCells('E1:F1');
$objPHPExcel->getActiveSheet()->mergeCells('G1:H1');
$objPHPExcel->getActiveSheet()->mergeCells('I1:J1');


$lists = $_SESSION['SOCHITIETHHLAIGOP'];

//set gia tri cho cac cot du lieu
$i = 3;
$dem = 0;
foreach ($lists as $k => $row) {
    $i++;
	$dem++;
		$giavon = $row['giavon'];
		$giaban = $row['giaban'];
		$soluong = $row['soluongxuat'];
	
		$thanhtienvon=round($soluong*$giavon);
		$thanhtienban=round($soluong*$giaban);
		$tyle = (1-($giavon/$giaban))*100;
		$tienloi = $thanhtienban - $thanhtienvon;
        $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A' . $i, $dem)
            ->setCellValue('B' . $i, $row['tenvt'])
            ->setCellValue('C' . $i, $row['dvt'])
            ->setCellValue('D' . $i, $row['soluongxuat'])
            ->setCellValue('E' . $i, $row['giavon'])
            ->setCellValue('F' . $i, $row['giaban'])
            ->setCellValue('G' . $i, $thanhtienvon)
            ->setCellValue('H' . $i, $thanhtienban)
            ->setCellValue('I' . $i, $tyle)
            ->setCellValue('J' . $i, $tienloi);

}
$i++;
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
$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(15);
$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(15);
$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(15);
$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(15);
$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(15);
$objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(15);

//ghi du lieu vao file,định dạng file excel 2007
$objPHPExcel->getActiveSheet()->setTitle("Bang ke ban ra ".$_SESSION["THONGTINPHIEU"]['ngayhoadon']);
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$full_path = 'bang_ke_chi_chitiet_laigop.xlsx';//duong dan file
//$objWriter->save($full_path);
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="' . $full_path . '"');
header('Cache-Control: max-age=0');
//$objWriter->save($full_path);
$objWriter->save('php://output');
?>