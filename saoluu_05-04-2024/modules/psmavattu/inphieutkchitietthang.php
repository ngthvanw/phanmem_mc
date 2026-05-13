<?php
session_start();
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
    function TieuDe($Ngay, $TKCo, $SoPhieu, $SoTT,$LoaiPhieu,$TenPhieu,$tk1,$tk2)
    {
        $this->AddFont('times', '', 'vuTimes.ttf', true);
        $this->AddFont('timesi', '', 'vuTimesItalic.ttf', true);
        $this->SetFont('times', '', 10);


        $this->SetFont('times', '', 10);
        $this->SetFont('timesb', '', 12);

        $this->Cell(225, 4,'', 0, 0, L);
        $this->SetFont('timesi', '', 10);
        $this->Cell(65, 4, 'Mãu số : S03a-SKT/DNN', 0, 0,R);

        $this->Ln(5);
        $this->SetFont('timesb', '', 12);
        $this->Cell(225, 4,$_SESSION["THONGTINPHIEU"]['tenphieu'], 0, 0, L);
        $this->SetFont('timesi', '', 10);
        $this->Cell(65, 4, 'Ban hành theo QĐ số 1271-TC/QĐ/CĐKT', 0, 0,R);

        $this->Ln(5);
        $this->SetFont('timesb', '', 11);
        $this->SetFont('timesi', '', 11);
        $this->Cell(225, 4,'Tồn cuối :'.($_SESSION['THONGTINPHIEU']['thangtk']), 0, 0, L);
        $this->SetFont('timesi', '', 10);
        $this->Cell(65, 4, 'Ngày 14/12/1995 của Bộ Tài Chính', 0, 0,R);

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

        $this->Cell(185, 4, '' . "", 0, 0, L);// Lên công ty
        $this->SetFont('times', '', 9);
        $this->Cell(105, 4, '', 0, 0, R);

        $this->Ln(4);// xu?ng hàng bao nhiêu dong
        $this->SetFont('timesb', '', 12);
        $this->Cell(185, 4, '' . $tendn, 0, 0, L);// Lên công ty
        $this->SetFont('times', '', 9);
        $this->Cell(105, 4, ' ', 0, 0, R);

        $this->Ln(4);// xu?ng hàng bao nhiêu dong
        $this->Cell(185, 4, $DiaChi, 0, 0, L);
        $this->Cell(105, 4, 'MST : '.$MST, 0, 0, R);
        $this->Ln(0);

        $this->Cell(290, 4, "", B, 0, L);
        $this->Ln(8);
    }
    function Footer()
    {
        // Go to 1.5 cm from bottom
        $this->SetY(-5);
        // Select Arial italic 8
        $this->SetFont('Arial','I',8);
        // Print centered page number
        $this->Cell(285,4,'Trang '.$this->PageNo(),0,0,'R');
    }

    function ImprovedTable($header, $data)
    {
        $w = array(0,7,20,70,17,17,26,17,26,17,26,17,26);
        $this->SetDrawColor(0, 0, 0);
        $this->SetLineWidth(0.1);
        $this->SetFont('times', '', 9);

        $this->Cell($w[1],5,"",'0',0,'C');// LTRB là border c?a cell
        $this->Cell($w[2],5,"",'0',0,'C');
        $this->Cell($w[3],5,"",'0',0,'C');// LTRB là border c?a cell
        $this->Cell($w[4],5,"",'0',0,'C');

        $this->Cell($w[5],5,"Số lượng",'LTRB',0,'C');// Tồn đầu
        $this->Cell($w[6],5,"Thành Tiền",'LTRB',0,'C');

        $this->Cell($w[7],5,"Số lượng",'LTRB',0,'C');// Nhập trong kỳ
        $this->Cell($w[8],5,"Thành Tiền",'LTRB',0,'C');

        $this->Cell($w[9],5,"Số lượng",'LTRB',0,'C');// Xuất trong kỳ
        $this->Cell($w[10],5,"Thành Tiền",'LTRB',0,'C');

        $this->Cell($w[11],5,"Số lượng",'LTRB',0,'C');
        $this->Cell($w[12],5,"Thành Tiền",'LTRB',0,'C');

        $this->Ln(-5);

        $this->SetFont('times', '', 9);
        $this->Cell($w[1],10,"STT",'LTRB',0,'C');// LTRB là border c?a cell
        $this->Cell($w[2],10,"Mã số",'LTRB',0,'C');
        $this->Cell($w[3],10,"Tên, nhãn hiệu, quy cách ",'LTRB',0,'C');// LTRB là border c?a cell
        $this->Cell($w[4],10,"ĐVT",'LTRB',0,'C');

        $this->Cell($w[5]+$w[6],5,"Số tồn đầu kỳ",'LTRB',0,'C');// Tồn đầu

        $this->Cell($w[7]+$w[8],5,"Nhập trong kỳ",'LTRB',0,'C');// nhập trong kỳ

        $this->Cell($w[9]+$w[10],5,"Xuất trong kỳ",'LTRB',0,'C');// nhập trong kỳ

        $this->Cell($w[11]+$w[12],5,"Số tồn cuối kỳ",'LTRB',0,'C');

        $this->Ln(10);
        // đặt hàm foreach ở đây
        $sott=1;
        $tongthanhtiendk=0;
        $tongthanhtienck=0;
    foreach ($_SESSION["LISTTKTHANG"] as $tiemCT) {
        $this->Cell($w[1], 5, $sott, 'LR', 0, 'C');// LTRB là border c?a cell
        $this->Cell($w[2], 5,$tiemCT['mavt'], 'LR', 0, 'C');
        $this->Cell($w[3], 5, $tiemCT['tenvt'], 'LR', 0, 'L');// LTRB là border c?a cell
        $this->Cell($w[4], 5, $tiemCT['dvt'], 'LR', 0, 'C');

        $this->Cell($w[5], 5, ($tiemCT['soluongtondk'] == 0) ? "":number_format($tiemCT['soluongtondk']), 'LR', 0, 'R');// Tồn đầu
        $this->Cell($w[6], 5, ($tiemCT['thanhtientondk'] == 0) ? "":number_format($tiemCT['thanhtientondk']), 'LR', 0, 'R');

        $this->Cell($w[7], 5, ($tiemCT['soluongnhap'] == 0) ? "":number_format($tiemCT['soluongnhap']), 'LR', 0, 'R');// Nhập trong kỳ
        $this->Cell($w[8], 5, ($tiemCT['thanhtiennhap'] == 0) ? "":number_format($tiemCT['thanhtiennhap']), 'LR', 0, 'R');

        $this->Cell($w[9], 5, ($tiemCT['soluongxuat'] == 0) ? "":number_format($tiemCT['soluongxuat']), 'LR', 0, 'R');// Xuất trong kỳ
        $this->Cell($w[10], 5, ($tiemCT['thanhtienxuat'] == 0) ? "":number_format($tiemCT['thanhtienxuat']), 'LR', 0, 'R');

        $this->Cell($w[11], 5, ($tiemCT['soluongtonck'] == 0) ? "":number_format($tiemCT['soluongtonck']), 'LR', 0, 'R');
        $this->Cell($w[12], 5, ($tiemCT['thanhtientonck'] == 0) ? "":number_format($tiemCT['thanhtientonck']), 'LR', 0, 'R');

        $tongthanhtiendk+=$tiemCT['thanhtientondk'];
        $tongthanhtienck+=$tiemCT['thanhtientonck'];


        $this->Ln(0);

        $this->Cell(array_sum($w), 5,'_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _', '0', 0, 'R');

        $this->Ln();
        if($sott%31==0){
            $this->AddPage('L', 'A4');
            $this->Ln(7);
            $this->SetFont('times', '', 9);

            $this->Cell($w[1],5,"",'0',0,'C');// LTRB là border c?a cell
            $this->Cell($w[2],5,"",'0',0,'C');
            $this->Cell($w[3],5,"",'0',0,'C');// LTRB là border c?a cell
            $this->Cell($w[4],5,"",'0',0,'C');

            $this->Cell($w[5],5,"Số lượng",'LTRB',0,'C');// Tồn đầu
            $this->Cell($w[6],5,"Thành Tiền",'LTRB',0,'C');

            $this->Cell($w[7],5,"Số lượng",'LTRB',0,'C');// Nhập trong kỳ
            $this->Cell($w[8],5,"Thành Tiền",'LTRB',0,'C');

            $this->Cell($w[9],5,"Số lượng",'LTRB',0,'C');// Xuất trong kỳ
            $this->Cell($w[10],5,"Thành Tiền",'LTRB',0,'C');

            $this->Cell($w[11],5,"Số lượng",'LTRB',0,'C');
            $this->Cell($w[12],5,"Thành Tiền",'LTRB',0,'C');

            $this->Ln(-5);

            $this->SetFont('times', '', 9);
            $this->Cell($w[1],10,"STT",'LTRB',0,'C');// LTRB là border c?a cell
            $this->Cell($w[2],10,"Mã số",'LTRB',0,'C');
            $this->Cell($w[3],10,"Tên, nhãn hiệu, quy cách ",'LTRB',0,'C');// LTRB là border c?a cell
            $this->Cell($w[4],10,"ĐVT",'LTRB',0,'C');

            $this->Cell($w[5]+$w[6],5,"Số tồn đầu kỳ",'LTRB',0,'C');// Tồn đầu

            $this->Cell($w[7]+$w[8],5,"Nhập trong kỳ",'LTRB',0,'C');// nhập trong kỳ

            $this->Cell($w[9]+$w[10],5,"Xuất trong kỳ",'LTRB',0,'C');// nhập trong kỳ

            $this->Cell($w[11]+$w[12],5,"Số tồn cuối kỳ",'LTRB',0,'C');

            $this->Ln(10);
        }
        $sott++;
    }

        $this->SetFont('timesb', '', 10);
        $this->Cell($w[1],5,"",'LTRB',0,'C');// LTRB là border c?a cell
        $this->Cell($w[2],5,"",'LTRB',0,'R');// LTRB là border c?a cell
        $this->Cell($w[3],5,"Tổng cộng",'LTRB',0,'C');
        $this->Cell($w[4],5,"",'LTRB',0,'L');

        $this->Cell($w[5],5,"",'LTRB',0,'R');
        $this->Cell($w[6],5,number_format($tongthanhtiendk),'LTRB',0,'R');

        $this->Cell($w[7],5,"",'LTRB',0,'R');
        $this->Cell($w[8],5,"",'LTRB',0,'R');

        $this->Cell($w[9],5,"",'LTRB',0,'R');
        $this->Cell($w[10],5,"",'LTRB',0,'R');

        $this->Cell($w[11],5,"",'LTRB',0,'R');
        $this->Cell($w[12],5,number_format($tongthanhtienck),'LTRB',0,'R');

        $this->Ln(7);

        $this->SetFont('times', '', 10);
        $this->Ln(8);
        $this->Cell(90, 3, '', 0, 0, C);
        $this->Cell(90, 3, '', 0, 0, C);
        $this->Cell(90, 3, 'Ngày '.dd_mm_yyy($_SESSION["THONGTINPHIEU"]['ngaylap']), 0, 0, C);
        $this->Ln(4);
        $this->Cell(90, 3, 'Người lập', 0, 0, C);
        $this->Cell(90, 3, 'Kế toán trưởng', 0, 0, C);
        $this->Cell(90, 3, 'Giám đốc', 0, 0, C);
        $this->Ln(25);

        $this->Cell(46, 3, $data['tennguoilap'], 0, 0, C);
        $this->Cell(46, 3, '', 0, 0, C);
        $this->Cell(46, 3, '', 0, 0, C);
        $this->Cell(46, 3, $data['ketoantruong'], 0, 0, C);

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
$pdf->SetMargins(4, 1);
$pdf->SetAutoPageBreak(TRUE, 0);

$data = $_SESSION['PhieuNhapXuat'];
$pdf->AddPage('L', 'A4');
$loaiphieu = $data['loaiphieu'];

$pdf->TieuDe(dd_mm_yyy($data['ngayghiso']), $data['tkco'], $data['mapskt'], $data['sott'],$data['loaiphieu'],$data['tenphieu'],$tk1,$tk2);
$pdf->ImprovedTable($header, $data);
//debug($_SESSION['PhieuNhapXuatCT']);
echo $pdf->Output("BangThuChi_" .$data['sott']. ".pdf", "I");
?>