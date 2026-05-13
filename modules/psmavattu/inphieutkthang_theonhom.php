<?php
session_start();
ob_start();
include("../../config.php");
// Optionally define the filesystem path to your system fonts
// otherwise tFPDF will use [path to tFPDF]/font/unifont/ directory
// define("_SYSTEM_TTFONTS", "C:/Windows/Fonts/");

require('../../pdf_lib/tfpdf.php');

class PDF extends tFPDF
{
    // Load data
    function LoadData($file)
    {
        // Read file lines
        $lines = file($file);
        foreach ($lines as $line)
            $data[] = explode(";", trim($line));
        return $data;
    }

    // Simple table
    function TieuDe($khohang)
    {
        $this->AddFont('times', '', 'vuTimes.ttf', true);
        $this->AddFont('timesi', '', 'vuTimesItalic.ttf', true);
        $this->AddFont('timesbi', '', 'vuTimesBoldItalic.ttf', true);
        $this->SetFont('times', '', 10);

        $this->SetFont('times', '', 10);
        $this->SetFont('timesb', '', 12);

        $this->Cell(135, 4,'', 0, 0, L);
        $this->SetFont('timesi', '', 10);
        $this->Cell(65, 4, 'Mãu số : S03a-SKT/DNN', 0, 0,R);

        $this->Ln(5);
        $this->SetFont('timesb', '', 12);
        $this->Cell(135, 4,$_SESSION["THONGTINPHIEU"]['tenphieu'], 0, 0, L);
        $this->SetFont('timesi', '', 10);
        $this->Cell(65, 4, 'Ban hành theo QĐ số 1271-TC/QĐ/CĐKT', 0, 0,R);

        $this->Ln(5);
        $this->SetFont('timesb', '', 11);
        $this->SetFont('timesi', '', 11);
        $this->Cell(135, 4,'Tồn cuối :'.($_SESSION['THONGTINPHIEU']['thangtk']), 0, 0, L);
        $this->SetFont('timesi', '', 10);
        $this->Cell(65, 4, 'Ngày 14/12/1995 của Bộ Tài Chính', 0, 0,R);

        $this->Ln(5);
        $this->SetFont('timesb', '', 11);
        $this->SetFont('timesi', '', 11);
        $this->Cell(135, 4, 'Kho hàng :' . $khohang, 0, 0, L);
        $this->SetFont('timesi', '', 10);
        $this->Cell(65, 4, '', 0, 0, R);

        $this->Ln(14);// xu?ng hàng bao nhiêu dong

    }
    function Header()
    {
        $this->AddFont('times', '', 'vuTimes.ttf', true);
        $this->AddFont('timesi', '', 'vuTimesItalic.ttf', true);
        $this->SetFont('times', '', 10);
        $tendn = ($_SESSION['TenCongTy']);
        $DiaChi = ($_SESSION['DiaChi']);
        $MST = ($_SESSION['MST']);

        $this->Cell(90, 4, '' . "", 0, 0, L);// Lên công ty
        $this->SetFont('times', '', 9);
        $this->Cell(110, 4, '', 0, 0, R);

        $this->Ln(4);// xu?ng hàng bao nhiêu dong
        $this->SetFont('timesb', '', 12);
        $this->Cell(90, 4, '' . $tendn, 0, 0, L);// Lên công ty
        $this->SetFont('times', '', 9);
        $this->Cell(110, 4, ' ', 0, 0, R);

        $this->Ln(4);// xu?ng hàng bao nhiêu dong
        $this->Cell(90, 4, $DiaChi, 0, 0, L);
        $this->Cell(110, 4, 'MST : '.$MST, 0, 0, R);
        $this->Ln(0);

        $this->Cell(200, 4, "", B, 0, L);
        $this->Ln(8);
    }
    function Footer()
    {
        // Go to 1.5 cm from bottom
        $this->SetY(-5);
        // Select Arial italic 8
        $this->SetFont('Arial','I',8);
        // Print centered page number
        $this->Cell(200,4,'Trang '.$this->PageNo(),0,0,'R');
    }
    function ImprovedTable($dataCT, $data)
    {
        $w = array(0,7,20,85,10,17,17,20,26);
        $this->SetDrawColor(0, 0, 0);
        $this->SetLineWidth(0.1);
        $this->SetFont('times', '', 10);

        $this->SetFont('times', '', 10);
        $this->Cell($w[1],5,"",'0',0,'C');// LTRB là border c?a cell
        $this->Cell($w[2],5,"",'0',0,'C');
        $this->Cell($w[3],5,"",'0',0,'C');// LTRB là border c?a cell
        $this->Cell($w[4],5,"",'0',0,'C');
        $this->Cell($w[5],5,"",'0',0,'C');
        $this->Cell($w[6],5,"Số lượng",'LTRB',0,'C');
        $this->Cell($w[7],5,"Đơn giá",'LTRB',0,'C');
        $this->Cell($w[8],5,"Thành Tiền",'LTRB',0,'C');

        $this->Ln(-5);

        $this->SetFont('times', '', 10);
        $this->Cell($w[1],10,"STT",'LTRB',0,'C');// LTRB là border c?a cell
        $this->Cell($w[2],10,"Mã số",'LTRB',0,'C');
        $this->Cell($w[3],10,"Tên, nhãn hiệu, quy cách ",'LTRB',0,'C');// LTRB là border c?a cell
        $this->Cell($w[4],10,"Mã TK",'LTRB',0,'C');
        $this->Cell($w[5],10,"ĐVT",'LTRB',0,'C');
        $this->Cell($w[6]+$w[7]+$w[8],5,"Số tồn cuối kỳ",'LTRB',0,'C');

        $this->Ln(10);
        // đặt hàm foreach ở đây
        $sott=0;
        $tongcong=0;
        $demall=0;
    foreach ($dataCT as $key =>$tiemG) {

        $sumg = 0;
        $soluongg =0;
		$demall++;
        foreach ($tiemG as $tiemCT){
            $demall++;
			$sott++;
        $this->Cell($w[1], 5, $sott, 'LR', 0, 'C');// LTRB là border c?a cell
        $this->Cell($w[2], 5, $tiemCT['mavt'], 'LR', 0, 'C');
        $this->Cell($w[3], 5, mb_substr(html_entity_decode($tiemCT['tenvt']), 0,55,'UTF-8'), 'LR', 0, 'L');// LTRB là border c?a cell
        $this->Cell($w[4], 5, $tiemCT['matk'], 'LR', 0, 'C');
        $this->Cell($w[5], 5, $tiemCT['dvt'], 'LR', 0, 'C');
        $this->Cell($w[6], 5, number_format($tiemCT['soluongtonck'],2,",","."), 'LR', 0, 'R');
        $this->Cell($w[7], 5, number_format($tiemCT['dongiabinhquan'], $_SESSION["THONGTINPHIEU"]['sole'],",","."), 'LR', 0, 'R');
        $this->Cell($w[8], 5, number_format($tiemCT['thanhtientonck'],0,",","."), 'LR', 0, 'R');
		
        $tongcong += $tiemCT['thanhtientonck'];
        $sumg+=$tiemCT['thanhtientonck'];
            $soluongg+=$tiemCT['soluongtonck'];

        $this->Ln(0);

        $this->Cell(202, 5, '_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _', '0', 0, 'R');
		 $this->Ln();

       
        if ($demall % 49 == 0) {
            $this->AddPage('P', 'A4');
            $this->Ln(8);
            $this->SetFont('times', '', 10);
            $this->Cell($w[1], 5, "", '0', 0, 'C');// LTRB là border c?a cell
            $this->Cell($w[2], 5, "", '0', 0, 'C');
            $this->Cell($w[3], 5, "", '0', 0, 'C');// LTRB là border c?a cell
            $this->Cell($w[4], 5, "", '0', 0, 'C');
            $this->Cell($w[5], 5, "", '0', 0, 'C');
            $this->Cell($w[6], 5, "Số lượng", 'LTRB', 0, 'C');
            $this->Cell($w[7], 5, "Đơn giá", 'LTRB', 0, 'C');
            $this->Cell($w[8], 5, "Thành Tiền", 'LTRB', 0, 'C');

            $this->Ln(-5);

            $this->SetFont('times', '', 10);
            $this->Cell($w[1], 10, "STT", 'LTRB', 0, 'C');// LTRB là border c?a cell
            $this->Cell($w[2], 10, "Mã số", 'LTRB', 0, 'C');
            $this->Cell($w[3], 10, "Tên, nhãn hiệu, quy cách ", 'LTRB', 0, 'C');// LTRB là border c?a cell
            $this->Cell($w[4], 10, "Mã TK", 'LTRB', 0, 'C');
            $this->Cell($w[5], 10, "ĐVT", 'LTRB', 0, 'C');
            $this->Cell($w[6] + $w[7] + $w[8], 5, "Số tồn cuối kỳ", 'LTRB', 0, 'C');
            $this->Ln(10);
        }
 
    }
        $this->SetFont('timesbi', '', 10);

        $this->Cell($w[1], 5,"", 'LR', 0, 'C');// LTRB là border c?a cell
        $this->Cell($w[2], 5,"", 'LR', 0, 'C');
        $this->Cell($w[3], 5," Cộng ".$tiemCT['tennhom'], 'LR', 0, 'R');// LTRB là border c?a cell
        $this->Cell($w[4], 5, "", 'LR', 0, 'C');
        $this->Cell($w[5], 5, "", 'LR', 0, 'C');
        $this->Cell($w[6], 5, number_format($soluongg,2,",","."), 'LR', 0, 'R');
        $this->Cell($w[7], 5, "", 'LR', 0, 'R');
        $this->Cell($w[8], 5, number_format($sumg,0,",","."), 'LR', 0, 'R');
        $this->Ln(0);
        $this->Cell(202, 5, '_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _', '0', 0, 'R');
        $this->Ln();
        $this->SetFont('times', '', 10);
    }

        $this->SetFont('timesb', '', 10);
        $this->Cell($w[1],5,"",'LTRB',0,'C');// LTRB là border c?a cell
        $this->Cell($w[2],5,"",'LTRB',0,'R');// LTRB là border c?a cell
        $this->Cell($w[3],5,"Tổng cộng",'LTRB',0,'C');
        $this->Cell($w[4],5,"",'LTRB',0,'L');
        $this->Cell($w[5],5,"",'LTRB',0,'R');
        $this->Cell($w[6],5,"",'LTRB',0,'R');
        $this->Cell($w[7],5,"",'LTRB',0,'R');
        $this->Cell($w[8],5,number_format($tongcong,0,",","."),'LTRB',0,'R');

        $this->Ln();



        $this->Ln(7);

        $this->SetFont('times', '', 10);
        $this->Ln(8);
        $this->Cell(56, 3, '', 0, 0, C);
        $this->Cell(56, 3, '', 0, 0, C);
        $this->Cell(56, 3, 'Ngày '.dd_mm_yyy($_SESSION["THONGTINPHIEU"]['ngaylap']), 0, 0, C);
        $this->Ln(4);
        $this->Cell(56, 3, 'Người lập', 0, 0, C);
        $this->Cell(56, 3, 'Kế toán trưởng', 0, 0, C);
        $this->Cell(56, 3, 'Giám đốc', 0, 0, C);
        $this->Ln(25);

        $this->Cell(56, 3, $data['tennguoilap'], 0, 0, C);
        $this->Cell(56, 3, '', 0, 0, C);
        $this->Cell(56, 3, $data['ketoantruong'], 0, 0, C);

    }
}

$pdf = new PDF();

// Column headings
//$header = array('STT', 'Họ và Tên');
//$pdf->AddPage();

// Add a Unicode font (uses UTF-8)
$pdf->PageNo();
$pdf->AddFont('times', '', 'vuTimes.ttf', true);
$pdf->SetFont('times', '', 14);
$pdf->AddFont('timesb', '', 'vuTimesBold.ttf', true);
$pdf->SetMargins(4, 1, 0.3, 0);
$pdf->SetAutoPageBreak(TRUE, 0);

$data = $_SESSION['PhieuNhapXuat'];

foreach ($_SESSION["LISTTKTHANG"] as $k=> $dataCT) {
    $pdf->AddPage('P', 'A4');
    $loaiphieu = $data['loaiphieu'];

    $pdf->TieuDe($_SESSION['DSKHOHANG'][$k]['tenkho']);
    $pdf->ImprovedTable($dataCT, $data);
    $pdf->Footer();
}
echo $pdf->Output("BangThuChi_" .$data['sott']. ".pdf", "I");
ob_end_flush();
?>