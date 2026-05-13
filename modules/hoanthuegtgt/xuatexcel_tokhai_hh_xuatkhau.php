<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once '../../phpexcel/PHPExcel.php';
require_once '../../phpexcel/PHPExcel/IOFactory.php';

// Kết nối MySQL
$conn = new mysqli($_SESSION['HOST'], $_SESSION['USER_DB'], $_SESSION['PASS_DB'], $_SESSION['TIENTO'].$_SESSION["MST"]."_".$_SESSION["NienDo"]);
//$conn->set_charset("utf8");

// Truy vấn dữ liệu
$sql = "SELECT * FROM tokhai_hh_nhap_xuatkhau where loaitokhai='X' order by sott";
$result = $conn->query($sql);

// Load file mẫu Excel
$templateFile = $_SESSION['DRIVER_PM'].'/tmp/tmp_tokhai_hh_nxkhau.xlsx';
$objPHPExcel = PHPExcel_IOFactory::load($templateFile);
$sheet = $objPHPExcel->getSheetByName('01-2HT');

$rowStart = 19;
$stt = 1;
$rowIndex = $rowStart;
$sheet->setCellValue("F7","Từ kỳ 01/01/".$_SESSION['NienDo']." đến kỳ 31/12/".$_SESSION['NienDo']);
$sheet->setCellValue("E9", $_SESSION['TenCongTy']);
$sheet->setCellValue("E10", $_SESSION['MST']);
while ($row = $result->fetch_assoc()) {
    if($rowIndex>47){
        $sheet->insertNewRowBefore($rowIndex, 1);
    }
    $sheet->setCellValue("A$rowIndex", $stt);
    $sheet->setCellValue("B$rowIndex", $row['maloaihinh']);
    $sheet->setCellValue("C$rowIndex", $row['tokhaiso']);
    $NgayDK = DateTime::createFromFormat('Y-m-d', $row['ngaydangky']);
    $sheet->setCellValue("D$rowIndex", $NgayDK ? $NgayDK->format('d/m/Y') : '');
    $sheet->setCellValue("E$rowIndex", $row['nuocnhapkhau']);
    $sheet->setCellValue("F$rowIndex", $row['giatringoaite']);
    $sheet->setCellValue("G$rowIndex", $row['giatrivnd']);
    $sheet->setCellValue("H$rowIndex", $row['chungtuthanhtoan']);
    $sheet->setCellValue("I$rowIndex", $row['ghichu']);

    $rowIndex++;
    $stt++;
}
if($rowIndex>47){
    // Sau khi chèn xong, cập nhật công thức tại dòng tổng
    $formulaRow = $rowIndex + 1; // Dòng chứa tổng, ví dụ G26
    $formulaF = "=SUM(F$rowStart:F" . ($rowIndex - 1) . ")";
    $formulaG = "=SUM(G$rowStart:G" . ($rowIndex - 1) . ")";
    $sheet->setCellValue("F$formulaRow", $formulaF);
    $sheet->setCellValue("G$formulaRow", $formulaG);
}else{
    $formulaF = "=SUM(F$rowStart:F" . (47) . ")";
    $formulaG = "=SUM(G$rowStart:G" . (47) . ")";
    $sheet->setCellValue("F48", $formulaF);
    $sheet->setCellValue("G48", $formulaG);
}

// Đặt sheet BKNK là sheet mặc định khi mở
$objPHPExcel->setActiveSheetIndexByName('01-2HT');

// Xuất file ra trình duyệt
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="baocao_tokhai_hh_xuatkhau.xlsx"');
header('Cache-Control: max-age=0');
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');
exit;
