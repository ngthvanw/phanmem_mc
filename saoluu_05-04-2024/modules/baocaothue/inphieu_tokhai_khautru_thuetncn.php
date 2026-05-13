<?php
session_start();
ob_start();
include("../../config.php");

$loaitokhai= str_replace(",","",$_GET['loaitokhai']);
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
    function TieuDe($loaitokhai)
    {
        $this->AddFont('times', '', 'vuTimes.ttf', true);
        $this->AddFont('timesi', '', 'vuTimesItalic.ttf', true);
        $this->SetFont('times', '', 10);


        $this->SetLineWidth(0.1);

        $this->SetFont('times', '', 10);
        $this->Ln(3.5);// xu?ng hàng bao nhiêu dong
        //$this->SetFont('timesb', '', 14);
        $this->Cell(40, 6, '', 0, 0, R);

        $this->Cell(116, 6,"CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM", 0, 0, C);
        $this->SetFont('times', '', 9);
        $this->Cell(45, 6, 'Mẫu số: 05/KK-TNCN', LTR, 0,C);

        $this->Ln(5);// xu?ng hàng bao nhiêu dong
        $this->Cell(40, 6, '', 0, 0, R);
        $this->SetFont('times', '', 10);
        $this->Cell(116, 6,"Độc Lập - Tự Do - Hạnh Phúc", 0, 0, C);
        $this->SetFont('times', '', 10);
        $this->SetFont('timesi', '', 8);
        $this->MultiCell(45, 4, '(Ban hành kèm theo Thông tư số 92/2015/TT-BTC ngày 15/06/2015 của Bộ Tài chính)', LRB,C,false);

        $this->Ln(-7);// xu?ng hàng bao nhiêu dong
        $this->Cell(40, 6, '', 0, 0, R);

        $this->SetFont('timesb', '', 11);
        $this->Cell(115, 6,"TỜ KHAI KHẤU TRỪ THUẾ THU NHẠP CÁ NHÂN", 0, 0, C);
        $this->SetFont('times', '', 9);
        $this->Cell(45, 6, '', 0, 0,C);

        $this->Ln(4);// xu?ng hàng bao nhiêu dong
        $this->SetFont('timesi', '', 10);
        $this->Cell(40, 6, '', 0, 0, R);
        $this->Cell(115, 6,"(Áp dụng cho tổ chức, cá nhân trả các khoản thu nhập từ tiền lương, tiền công)", 0, 0, C);
        $this->SetFont('times', '', 9);
        $this->Cell(45, 6, '', 0, 0,C);

        $this->Ln(4);// xu?ng hàng bao nhiêu dong
        $this->SetFont('timesb', '', 10);
        $this->Cell(40, 6, '', 0, 0, R);
        $this->Cell(115, 6,"[01] Kỳ tính thuế : ".$_SESSION["THONGTINPHIEU"]['ngayhoadon'], 0, 0, C);
        $this->SetFont('times', '', 9);
        $this->Cell(45, 6, '', 0, 0,C);
        if($loaitokhai==1) {
            $this->Ln(4);// xu?ng hàng bao nhiêu dong
            $this->SetFont('times', '', 10);
            $this->Cell(40, 6, '', 0, 0, R);
            $this->Cell(115, 6, "[02] Lần đầu [X] [03] Bổ sung lần thứ [  ]", 0, 0, C);
            $this->SetFont('times', '', 9);
            $this->Cell(45, 6, '', 0, 0, C);
        }else{
            $this->Ln(4);// xu?ng hàng bao nhiêu dong
            $this->SetFont('times', '', 10);
            $this->Cell(40, 6, '', 0, 0, R);
            $this->Cell(115, 6, "[02] Lần đầu [  ] [03] Bổ sung lần thứ [X]", 0, 0, C);
            $this->SetFont('times', '', 9);
            $this->Cell(45, 6, '', 0, 0, C);
        }
        $this->Ln();// xu?ng hàng bao nhiêu dong
    }

    function ImprovedTable($header, $data,$nhomnganh)
    {
        $this->SetDrawColor(0, 0, 0);
        $this->SetLineWidth(0.1);
        $this->SetFont('times', '', 9);
        // Column widths
        $w = array(10, 40);
        // Header
        for ($i = 0; $i < count($header); $i++) {
            $this->Cell($w[$i], 7, $header[$i], 1, 0, 'C');
        }
        // Data

        $this->SetLineWidth(.1);

        $this->Cell(10, 4, '   [04]', '0',R);// LTRB là border c?a cell
        $this->Cell(35, 4, 'Người nộp thuế:', '0','L');// LTRB là border c?a cell
        $this->SetFont('timesb', '', 10);
        $this->Cell(164, 4,$_SESSION['TenCongTy'], '0', 'L');
        $this->SetFont('times', '', 9);

        $this->Ln(5);
        $MST = $_SESSION['MST'];

        $this->Cell(10, 4, '   [05]', '0',R);// LTRB là border c?a cell
        $this->Cell(35, 4, 'Mã số thuế:', '0','L');// LTRB là border c?a cell
        $this->SetFont('timesb', '', 10);
        $this->Cell(170, 4, "", '0', 'L');

        $this->Ln(-0.5);
        $this->Cell(10, 4, '', '0',R);// LTRB là border c?a cell
        $this->Cell(35, 4, '', '0','L');// LTRB là border c?a cell

        $this->Cell(5.5, 4, substr($MST,0,1) , 'LTRB','L');// LTRB là border c?a cell
        $this->Cell(5.5, 4, substr($MST,1,1), 'TRB','L');// LTRB là border c?a cell
        $this->Cell(5.5, 4, substr($MST,2,1), 'TRB','L');// LTRB là border c?a cell
        $this->Cell(5.5, 4, substr($MST,3,1), 'TRB','L');// LTRB là border c?a cell
        $this->Cell(5.5, 4, substr($MST,4,1), 'TRB','L');// LTRB là border c?a cell
        $this->Cell(5.5, 4, substr($MST,5,1), 'TRB','L');// LTRB là border c?a cell
        $this->Cell(5.5, 4, substr($MST,6,1), 'TRB','L');// LTRB là border c?a cell
        $this->Cell(5.5, 4, substr($MST,7,1), 'TRB','L');// LTRB là border c?a cell
        $this->Cell(5.5, 4, substr($MST,8,1), 'TRB','L');// LTRB là border c?a cell
        $this->Cell(5.5, 4, substr($MST,9,1), 'TRB','L');// LTRB là border c?a cell

        $this->Cell(3, 4, '', '0','L');// LTRB là border c?a cell

        $this->Cell(5.5, 4, substr($MST,11,1), ':LTRB','L');// LTRB là border c?a cell
        $this->Cell(5.5, 4, substr($MST,12,1), 'TRB','L');// LTRB là border c?a cell
        $this->Cell(5.5, 4, substr($MST,13,1), 'TRB','L');// LTRB là border c?a cell
        $this->SetFont('times', '', 9);

        $this->Ln(5);

        $this->Cell(10, 4, '   [06]', '0',R);// LTRB là border c?a cell
        $this->Cell(35, 4, 'Địa chỉ:', '0','L');// LTRB là border c?a cell
        $this->SetFont('timesb', '', 10);
        $this->Cell(175, 4,$_SESSION['DiaChi'], '0', 'L');
        $this->SetFont('times', '', 9);
        $this->Ln(5);

        $this->Cell(10, 4, '   [07]', '0',R);// LTRB là border c?a cell
        $this->Cell(35, 4, 'Quận/Huyện:', '0');// LTRB là border c?a cell
        $this->SetFont('timesb', '', 10);
        $this->Cell(50, 4, $_SESSION['QuanHuyen'], '0', 'L');
        $this->SetFont('times', '', 9);

        $this->Cell(28, 4, '[08]Tỉnh/Thành phố:', '0');// LTRB là border c?a cell
        $this->SetFont('timesb', '', 10);
        $this->Cell(62, 4, $_SESSION['ThanhPho'], '0', 'L');
        $this->SetFont('times', '', 9);

        $this->Ln(5);

        $this->Cell(10, 4, '   [09]', '0',R);// LTRB là border c?a cell
        $this->Cell(35, 4, 'Điện thoại:', '0');// LTRB là border c?a cell
        $this->SetFont('timesb', '', 10);
        $this->Cell(50, 4, $_SESSION['DienThoai'], '0', 'L');
        $this->SetFont('times', '', 9);

        $this->Cell(15, 4, '[10]Fax :', '0');// LTRB là border c?a cell
        $this->SetFont('timesb', '', 10);
        $this->Cell(25, 4, "", '0', 'L');
        $this->SetFont('times', '', 9);

        $this->Cell(15, 4, '[11]Email:', '0');// LTRB là border c?a cell
        $this->SetFont('timesb', '', 10);
        $this->Cell(52, 4,$_SESSION['Email'], '0', 'L');
        $this->SetFont('times', '', 9);

        $this->Ln(5);

        $this->Cell(10, 4, '   [12]', '0',R);// LTRB là border c?a cell
        $this->Cell(35, 4, 'Tên đại lý thuế(nếu có):', '0','L');// LTRB là border c?a cell
        $this->SetFont('timesb', '', 10);
        $this->Cell(153, 4, "", '0', 'L');
        $this->SetFont('times', '', 9);

        $this->Ln(5);

        $this->Cell(10, 4, '   [13]', '0',R);// LTRB là border c?a cell
        $this->Cell(35, 4, 'Mã số thuế:', '0','L');// LTRB là border c?a cell
        $this->SetFont('timesb', '', 10);
        $this->Cell(170, 4, "", '0', 'L');
        $this->SetFont('times', '', 9);

        $this->Ln(-0.5);
        $this->SetFont('timesb', '', 10);
        $this->Cell(10, 4, '   ', '0',R);// LTRB là border c?a cell
        $this->Cell(35, 4, '', '0','L');// LTRB là border c?a cell

        $this->Cell(5.5, 4, '', 'LTRB','L');// LTRB là border c?a cell
        $this->Cell(5.5, 4, '', 'TRB','L');// LTRB là border c?a cell
        $this->Cell(5.5, 4, '', 'TRB','L');// LTRB là border c?a cell
        $this->Cell(5.5, 4, '', 'TRB','L');// LTRB là border c?a cell
        $this->Cell(5.5, 4, '', 'TRB','L');// LTRB là border c?a cell
        $this->Cell(5.5, 4, '', 'TRB','L');// LTRB là border c?a cell
        $this->Cell(5.5, 4, '', 'TRB','L');// LTRB là border c?a cell
        $this->Cell(5.5, 4, '', 'TRB','L');// LTRB là border c?a cell
        $this->Cell(5.5, 4, '', 'TRB','L');// LTRB là border c?a cell
        $this->Cell(5.5, 4, '', 'TRB','L');// LTRB là border c?a cell

        $this->Cell(3, 4, '', '0','L');// LTRB là border c?a cell

        $this->Cell(5.5, 4, '', ':LTRB','L');// LTRB là border c?a cell
        $this->Cell(5.5, 4, '', 'TRB','L');// LTRB là border c?a cell
        $this->Cell(5.5, 4, '', 'TRB','L');// LTRB là border c?a cell
        $this->SetFont('times', '', 9);
        $this->Ln(5);
        $this->Cell(10, 4, '   [14]', '0',R);// LTRB là border c?a cell
        $this->Cell(35, 4, 'Địa chỉ:', '0','L');// LTRB là border c?a cell
        $this->SetFont('timesb', '', 10);
        $this->Cell(175, 4, "", '0', 'L');
        $this->SetFont('times', '', 9);
        $this->Ln(5);
        $this->Cell(10, 4, '   [15]', '0',R);// LTRB là border c?a cell
        $this->Cell(35, 4, 'Quận/Huyện:', '0');// LTRB là border c?a cell
        $this->SetFont('timesb', '', 10);
        $this->Cell(50, 4, "", '0', 'L');
        $this->SetFont('times', '', 9);

        $this->Cell(28, 4, '[16]Tỉnh/Thành phố:', '0');// LTRB là border c?a cell
        $this->SetFont('timesb', '', 10);
        $this->Cell(62, 4, "", '0', 'L');
        $this->SetFont('times', '', 9);

        $this->Ln(5);

        $this->Cell(10, 4, '   [17]', '0',R);// LTRB là border c?a cell
        $this->Cell(35, 4, 'Điện thoại:', '0');// LTRB là border c?a cell
        $this->SetFont('timesb', '', 10);
        $this->Cell(50, 4, "", '0', 'L');
        $this->SetFont('times', '', 9);

        $this->Cell(15, 4, '[18]Fax :', '0');// LTRB là border c?a cell
        $this->SetFont('timesb', '', 10);
        $this->Cell(25, 4, "", '0', 'L');
        $this->SetFont('times', '', 9);

        $this->Cell(15, 4, '[19]Email:', '0');// LTRB là border c?a cell
        $this->SetFont('timesb', '', 10);
        $this->Cell(52, 4,"", '0', 'L');
        $this->SetFont('times', '', 9);

        $this->Ln(5);

        $this->Cell(10, 4, '   [20]', '0',R);// LTRB là border c?a cell
        $this->Cell(36, 4, 'Hợp đồng đại lý thuế: số', '0');// LTRB là border c?a cell
        $this->SetFont('timesb', '', 12);
        $this->Cell(52, 4, "", '0', 'L');
        $this->SetFont('times', '', 10);

        $this->Cell(12, 4, 'Ngày:', '0');// LTRB là border c?a cell
        $this->SetFont('timesb', '', 10);
        $this->Cell(60, 4, "", '0', 'L');
        $this->SetFont('times', '', 9);


        $this->Ln(10);
        $this->SetFont('times', '', 7);
        $this->Cell(150,3,"",'0',0,'L');// LTRB là border c?a cell
        $this->SetFont('timesb', '', 8);
        $this->Cell(50,3,"Đơn vị tiền: Đồng Việt Nam",'0',0,'R');
        $this->Ln(10);


        $this->SetFont('timesb', '', 10);
        $this->Cell(10,5,"",'0',0,'C');// LTRB là border c?a cell
        $this->Cell(60,5,"",'0',0,'C');// LTRB là border c?a cell

        $this->Cell(37,5,"",'0',0,'C');
        $this->Cell(20,5,"",'0',0,'C');
        $this->Cell(20,5,"",'0',0,'C');
        $this->Cell(30,5,"",'0',0,'C');
        $this->Ln(-5);

        $this->SetFont('timesb', '', 9);
        $this->Cell(10,10,"STT",'LRBT',0,'C');// LTRB là border c?a cell
        $this->Cell(89,10,"Chỉ tiêu",'LRBT',0,'C');// LTRB là border c?a cell
        $this->Cell(30,10,"Mã chỉ tiêu",'LRBT',0,'C');
        $this->Cell(30,10,"Đơn vị tính",'LRBT',0,'C');
        $this->Cell(40,10,"Số người/Số tiền",'LRBT',0,'C');
        $this->Ln();

        foreach ($data as $item){
            if($item['machitieucha']==0){
                $this->SetFont('timesb', '', 9);
            }else{
                $this->SetFont('times', '', 9);
            }
            if($item['maso']=='4'){
                $this->SetLineWidth(0.03);
                $this->Cell(10, 10,$item['maso'], 'LR', 0, 'C');// LTRB là border c?a cell
                $this->Cell(89, 5,mb_substr($item['chitieu'],0,55), 'LRT', 0, 'L');// LTRB là border c?a cell
                $this->Cell(30, 10,"[".$item['machitieu']."]", 'LRT', 0, 'C');
                $this->Cell(30, 10,$item['donvitinh'], 'LRT', 0, 'C');
                $this->Cell(40, 10,$item['sotien'], 'LRT', 0, 'R');
                $this->Cell(0, 5,"", '', 0, 'R');
                $this->Ln();
                $this->SetLineWidth(0.03);
                $this->Cell(10, 0,"", 'LR', 0, 'C');// LTRB là border c?a cell
                $this->Cell(89, 5,mb_substr($item['chitieu'],56,80), 'LRB', 0, 'L');// LTRB là border c?a cell
                $this->Cell(30, 0,"[".$item['machitieu']."]", 'LR', 0, 'C');
                $this->Cell(30, 0,$item['donvitinh'], 'LR', 0, 'C');
                $this->Cell(40, 0,$item['sotien'], 'LR', 0, 'R');
                $this->Cell(0, 5,"", '', 0, 'R');
                $this->Ln();
            } if($item['maso']=='6'){
                $this->SetLineWidth(0.03);
                $this->Cell(10, 15,$item['maso'], 'LRB', 0, 'C');// LTRB là border c?a cell
                $this->Cell(89, 5,mb_substr($item['chitieu'],0,53), 'LRT', 0, 'L');// LTRB là border c?a cell
                $this->Cell(30, 15,"[".$item['machitieu']."]", 'LRT', 0, 'C');
                $this->Cell(30, 15,$item['donvitinh'], 'LRT', 0, 'C');
                $this->Cell(40, 15,$item['sotien'], 'LRT', 0, 'R');
                $this->Cell(0, 5,"", '', 0, 'R');
                $this->Ln();
                $this->SetLineWidth(0.03);
                $this->Cell(10, 0,"", 'LR', 0, 'C');// LTRB là border c?a cell
                $this->Cell(89, 5,mb_substr($item['chitieu'],54,58), 'LR', 0, 'L');// LTRB là border c?a cell
                $this->Cell(30, 0,"", 'LR', 0, 'C');
                $this->Cell(30, 0,"", 'LR', 0, 'C');
                $this->Cell(40, 0,"", 'LR', 0, 'R');
                $this->Cell(0, 5,"", '', 0, 'R');
                $this->Ln();
                $this->SetLineWidth(0.03);
                $this->Cell(10, 0,"", 'LR', 0, 'C');// LTRB là border c?a cell
                $this->Cell(89, 5,mb_substr($item['chitieu'],112,120), 'LR', 0, 'L');// LTRB là border c?a cell
                $this->Cell(30, 0,"", 'LR', 0, 'C');
                $this->Cell(30, 0,"", 'LR', 0, 'C');
                $this->Cell(40, 0,"", 'LR', 0, 'R');
                $this->Cell(0, 5,"", '', 0, 'R');
                $this->Ln();
            }else if($item['maso']=='7'){
                $this->SetLineWidth(0.03);
                $this->Cell(10, 15,$item['maso'], 'LRB', 0, 'C');// LTRB là border c?a cell
                $this->Cell(89, 5,mb_substr($item['chitieu'],0,56), 'LRT', 0, 'L');// LTRB là border c?a cell
                $this->Cell(30, 15,"[".$item['machitieu']."]", 'LRTB', 0, 'C');
                $this->Cell(30, 15,$item['donvitinh'], 'LRTB', 0, 'C');
                $this->Cell(40, 15,$item['sotien'], 'LRTB', 0, 'R');
                $this->Cell(0, 5,"", '', 0, 'R');
                $this->Ln();
                $this->SetLineWidth(0.03);
                $this->Cell(10, 0,"", 'LR', 0, 'C');// LTRB là border c?a cell
                $this->Cell(89, 5,mb_substr($item['chitieu'],56,57), 'LR', 0, 'L');// LTRB là border c?a cell
                $this->Cell(30, 0,"", 'LR', 0, 'C');
                $this->Cell(30, 0,"", 'LR', 0, 'C');
                $this->Cell(40, 0,"", 'LR', 0, 'R');
                $this->Cell(0, 5,"", '', 0, 'R');
                $this->Ln();
                $this->SetLineWidth(0.03);
                $this->Cell(10, 0,"", 'LR', 0, 'C');// LTRB là border c?a cell
                $this->Cell(89, 5,mb_substr($item['chitieu'],112,120), 'LRB', 0, 'L');// LTRB là border c?a cell
                $this->Cell(30, 0,"", 'LR', 0, 'C');
                $this->Cell(30, 0,"", 'LR', 0, 'C');
                $this->Cell(40, 0,"", 'LR', 0, 'R');
                $this->Cell(0, 5,"", '', 0, 'R');
                $this->Ln(7);
            }else{
                $this->SetLineWidth(0.03);
                $this->Cell(10, 5,$item['maso'], 'LRBT', 0, 'C');// LTRB là border c?a cell
                $this->Cell(89, 5,$item['chitieu'], 'LRBT', 0, 'L');// LTRB là border c?a cell
                $this->Cell(30, 5,"[".$item['machitieu']."]", 'LRBT', 0, 'C');
                $this->Cell(30, 5,$item['donvitinh'], 'LRBT', 0, 'C');
                $this->Cell(40, 5,$item['sotien'], 'LRBT', 0, 'R');
                $this->Ln();
            }
        }

        $this->Cell(201, 5,"Tôi cam đoan số liệu khai trên là đúng và chịu trách nhiệm trước pháp luật về số liệu đã khai./.", '0', 0, 'L');// LTRB là border c?a cell

        $this->Ln();

        $this->Cell(115, 4,"NHÂN VIÊN ĐẠI LÝ THUẾ", '0', 0, 'L');// LTRB là border c?a cell
        $this->SetFont('times', '', 9);
        $this->Cell(50, 4, $_SESSION['ThanhPho'].', ngày '.dd_mm_yyy($_SESSION["THONGTINPHIEU"]['ngaylap']), 0, 0, L);

        $this->Ln();
        $this->SetFont('times', '', 9);
        $this->SetFont('timesb', '', 9);
        $this->Cell(35, 4, 'Họ và tên :', 0, 0, L);
        $this->SetFont('times', '', 9);
        $this->Cell(65, 4, $_SESSION['txt_hovatendaily'], 0, 0, L);
        $this->SetFont('timesb', '', 9);
        $this->Cell(92, 4, 'NGƯỜI NỘP THUẾ hoặc', 0, 0, C);


        $this->Ln();
        $this->SetFont('timesb', '', 9);
        $this->Cell(35, 4, 'Chứng chỉ hành nghề số :', 0, 0, L);
        $this->SetFont('times', '', 9);
        $this->Cell(65, 4, $_SESSION['txt_chungchindaily'], 0, 0, L);
        $this->SetFont('timesb', '', 9);
        $this->Cell(92, 4, 'ĐẠI DIỆN HỢP PHÁP CỦA NGƯỜI NỘP THUẾ', 0, 0, C);

        $this->Ln();
        $this->SetFont('timesb', '', 9);
        $this->Cell(35, 4, '', 0, 0, L);
        $this->Cell(65, 4, '', 0, 0, L);

        $this->SetFont('timesi', '', 9);
        $this->Cell(92, 4, '(Ký ghi rõ họ tên: chức vụ và đóng dấu (nếu có))', 0, 0, C);

    }
}

$pdf = new PDF();
$pdf->PageNo();
$pdf->AddFont('times', '', 'vuTimes.ttf', true);
$pdf->SetFont('times', '', 14);
$pdf->AddFont('timesb', '', 'vuTimesBold.ttf', true);
$pdf->SetMargins(6, 1, 0.3, 0);
$pdf->SetAutoPageBreak(true, 0);
$pdf->AddPage('P', 'A4');

$data =$_SESSION["TOKHAIKHAUTRU_THUETNCN"];

$pdf->TieuDe($loaitokhai);
$pdf->ImprovedTable($header, $data,$nhomnganh);
echo $pdf->Output("BangThuChi_" .$data['sott']. ".pdf", "I");
ob_end_flush();
?>