<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<?php
session_start();
function fixText($str) {
    return html_entity_decode(html_entity_decode($str, ENT_QUOTES, 'UTF-8'), ENT_QUOTES, 'UTF-8');
}

require_once '../../phpexcel/PHPExcel.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Lấy dữ liệu từ session và decode JSON nếu cần
    if (!isset($_SESSION['DATA_TONKHO_HKD'])) {
        die("Lỗi: Dữ liệu không tồn tại trong session");
    }

    $dataCT = $_SESSION['DATA_TONKHO_HKD'];
    if (is_string($dataCT)) {
        $dataCT = json_decode($dataCT, true);
    }

    if ($dataCT === null || !is_array($dataCT)) {
        die("Lỗi: dữ liệu JSON không hợp lệ");
    }

    // Kiểm tra file template
    $templateFile = $_SESSION['DRIVER_PM'] . "/tmp/BangKe_01_2_CNKD_TT40.xls";
    if (!file_exists($templateFile)) {
        die("File template không tồn tại: $templateFile");
    }

    try {
        $objReader = PHPExcel_IOFactory::createReader('Excel5');
        $objPHPExcel = $objReader->load($templateFile);
        $objPHPExcel->setActiveSheetIndex(0);
        $sheet = $objPHPExcel->getActiveSheet();

        $baseRow = 7;
        $sott = 0;

        foreach ($dataCT as $k => $dataKho) {
            foreach ($dataKho as $key => $tiemG) {
                foreach ($tiemG as $dataRow) {
                    if($dataRow['soluongtondk']!=0 || $dataRow['soluongtonck']!=0 || $dataRow['soluongnhap']!=0 || $dataRow['soluongxuat']!=0) {
                    $row = $baseRow++;
                    $sott++;
                    $sheet->setCellValue('B' . $row, $sott)
                          ->setCellValue('C' . $row, isset($dataRow['tenvt']) ? fixText($dataRow['tenvt']) : '')
                          ->setCellValue('D' . $row, isset($dataRow['dvt']) ? $dataRow['dvt'] : '')
                          ->setCellValue('E' . $row, isset($dataRow['soluongtondk']) ? $dataRow['soluongtondk'] : 0)
                          ->setCellValue('F' . $row, isset($dataRow['thanhtientondk']) ? $dataRow['thanhtientondk'] : 0)
                          ->setCellValue('G' . $row, isset($dataRow['soluongnhap']) ? $dataRow['soluongnhap'] : 0)
                          ->setCellValue('H' . $row, isset($dataRow['thanhtiennhap']) ? $dataRow['thanhtiennhap'] : 0)
                          ->setCellValue('I' . $row, isset($dataRow['soluongxuat']) ? $dataRow['soluongxuat'] : 0)
                          ->setCellValue('J' . $row, isset($dataRow['thanhtienxuat']) ? $dataRow['thanhtienxuat'] : 0)
                          ->setCellValue('K' . $row, isset($dataRow['soluongtonck']) ? $dataRow['soluongtonck'] : 0)
                          ->setCellValue('L' . $row, isset($dataRow['thanhtientonck']) ? $dataRow['thanhtientonck'] : 0);
                    }
                }
            }
        }

        // Tạo thư mục lưu file nếu chưa tồn tại
        $saveDir = $_SESSION['DRIVER_PM'] . "/datafile/" . $_SESSION['MST'] . "/" . $_SESSION['NienDo'];
        if (!is_dir($saveDir)) {
            mkdir($saveDir, 0777, true);
        }

        $saveFile = $saveDir . "/BangKe_01_2_CNKD_TT40.xls";
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save($saveFile);

        echo $saveFile;

    } catch (Exception $e) {
        echo "Lỗi Excel: " . $e->getMessage();
    }
}
?>
