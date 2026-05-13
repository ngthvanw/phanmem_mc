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
    ->setCellValue('D1', 'ĐVT')
    ->setCellValue('E1', 'Số tồn đầu kỳ')
    ->setCellValue('G1', 'Nhập trong kỳ')
    ->setCellValue('I1', 'Xuất trong kỳ')
    ->setCellValue('K1', 'Số tồn cuối kỳ')
    ->setCellValue('M1', 'Giá bán')
    ->setCellValue('N1', 'Mã kho');
$objPHPExcel->setActiveSheetIndex(0)
    ->setCellValue('A2', 'STT')
    ->setCellValue('B2', 'Mã số')
    ->setCellValue('C2', 'Tên, nhãn hiệu, quy cách ')
    ->setCellValue('D2', 'ĐVT')
    ->setCellValue('E2', 'Số lượng')
    ->setCellValue('F2', 'Thành tiền')
    ->setCellValue('G2', 'Số lượng')
    ->setCellValue('H2', 'Thành tiền')
    ->setCellValue('I2', 'Số lượng')
    ->setCellValue('J2', 'Thành tiền')
    ->setCellValue('K2', 'Số lượng')
    ->setCellValue('L2', 'Thành tiền')
    ->setCellValue('M2', 'Giá bán')
    ->setCellValue('N2', 'Mã kho');
$objPHPExcel->getActiveSheet()->mergeCells('A1:A2');
$objPHPExcel->getActiveSheet()->mergeCells('B1:B2');
$objPHPExcel->getActiveSheet()->mergeCells('C1:C2');
$objPHPExcel->getActiveSheet()->mergeCells('D1:D2');
$objPHPExcel->getActiveSheet()->mergeCells('E1:F1');
$objPHPExcel->getActiveSheet()->mergeCells('G1:H1');
$objPHPExcel->getActiveSheet()->mergeCells('I1:J1');
$objPHPExcel->getActiveSheet()->mergeCells('K1:L1');
$objPHPExcel->getActiveSheet()->mergeCells('M1:M2');
$objPHPExcel->getActiveSheet()->mergeCells('N1:N2');

$lists = $_SESSION["LISTTKTHANG"];

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
            ->setCellValue('D' . $i, $row['dvt'])
            ->setCellValue('E' . $i, $row['soluongtondk'])
            ->setCellValue('F' . $i, ($row['thanhtientondk']))
            ->setCellValue('G' . $i, $row['soluongnhap'])
            ->setCellValue('H' . $i, ($row['thanhtiennhap']))
            ->setCellValue('I' . $i, $row['soluongxuat'])
            ->setCellValue('J' . $i, ($row['thanhtienxuat']))
            ->setCellValue('K' . $i, $row['soluongtonck'])
            ->setCellValue('L' . $i, ($row['thanhtientonck']))
            ->setCellValue('M' . $i, ($row['giaban']))
            ->setCellValue('N' . $i, ( "'" .$row['makho']));
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
    $dongdau = $i - $count_dong;
    $objPHPExcel->setActiveSheetIndex(0)
        ->setCellValue('A' . $i, "")
        ->setCellValue('B' . $i, "")
        ->setCellValue('C' . $i, $key)
        ->setCellValue('D' . $i, "")
        ->setCellValue('E' . $i, ("=sum(E" . $dongdau . ":E" . ($i - 1) . ")"))
        ->setCellValue('F' . $i, ("=sum(F" . $dongdau . ":F" . ($i - 1) . ")"))
        ->setCellValue('G' . $i, ("=sum(G" . $dongdau . ":G" . ($i - 1) . ")"))
        ->setCellValue('H' . $i, ("=sum(H" . $dongdau . ":H" . ($i - 1) . ")"))
        ->setCellValue('I' . $i, ("=sum(I" . $dongdau . ":I" . ($i - 1) . ")"))
        ->setCellValue('J' . $i, ("=sum(J" . $dongdau . ":J" . ($i - 1) . ")"))
        ->setCellValue('K' . $i, ("=sum(K" . $dongdau . ":K" . ($i - 1) . ")"))
        ->setCellValue('L' . $i, ("=sum(L" . $dongdau . ":L" . ($i - 1) . ")"));
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
    $objPHPExcel->getActiveSheet()->getStyle('F' . $i)->getNumberFormat()->setFormatCode('#,##');
    $objPHPExcel->getActiveSheet()->getStyle('H' . $i)->getNumberFormat()->setFormatCode('#,##');
    $objPHPExcel->getActiveSheet()->getStyle('J' . $i)->getNumberFormat()->setFormatCode('#,##');
    $objPHPExcel->getActiveSheet()->getStyle('L' . $i)->getNumberFormat()->setFormatCode('#,##');
    $sodongg[] = $i;
    $i++;
}
}
function sum_string($kytu,$array){
    $str="";
    foreach ($array as $item){
        $str.=$kytu.$item."+";
    }
    return "=".$str."0";
}

$objPHPExcel->getActiveSheet()->SetCellValue('C'.$i, "Tổng cộng");
$objPHPExcel->getActiveSheet()->SetCellValue('F'.$i, sum_string("F",$sodongg));
$objPHPExcel->getActiveSheet()->SetCellValue('H'.$i, sum_string("H",$sodongg));
$objPHPExcel->getActiveSheet()->SetCellValue('J'.$i, sum_string("J",$sodongg));
$objPHPExcel->getActiveSheet()->SetCellValue('L'.$i, sum_string("L",$sodongg));

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
$objPHPExcel->getActiveSheet()->getStyle('A1:L'.$i)->applyFromArray($styleArray); // BORDER
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
$objPHPExcel->getActiveSheet()->setTitle(khu_dau_vn($_SESSION["THONGTINPHIEU"]['thangtk']));
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$full_path = $_SESSION["THONGTINPHIEU"]['thangtk'].'.xlsx';//duong dan file
//$objWriter->save($full_path);
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="'.$full_path.'"');
header('Cache-Control: max-age=0');
//$objWriter->save($full_path);
$objWriter->save('php://output');

function khu_dau_vn($str)
{
    $unicode = array(
        'a' => 'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ',
        'd' => 'đ',
        'e' => 'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
        'i' => 'í|ì|ỉ|ĩ|ị',
        'o' => 'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
        'u' => 'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
        'y' => 'ý|ỳ|ỷ|ỹ|ỵ',
        'A' => 'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
        'D' => 'Đ',
        'E' => 'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
        'I' => 'Í|Ì|Ỉ|Ĩ|Ị',
        'O' => 'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
        'U' => 'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
        'Y' => 'Ý|Ỳ|Ỷ|Ỹ|Ỵ',
    );

    foreach ($unicode as $nonUnicode => $uni) {
        $str = preg_replace("/($uni)/i", $nonUnicode, $str);
    }
    return $str;
}
?>