<?php
session_start();
ob_start();
include("../../config.php");

$loaitokhai= str_replace(",","",$_GET['loaitokhai']);

$nhomnganh = trim($_GET['nhomnganh']);

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
        $this->Cell(45, 6, 'Mẫu số: 01/BVMT', LTR, 0,C);

        $this->Ln(5);// xu?ng hàng bao nhiêu dong
        $this->Cell(40, 6, '', 0, 0, R);
        $this->SetFont('times', '', 10);
        $this->Cell(116, 6,"Độc Lập - Tự Do - Hạnh Phúc", 0, 0, C);
        $this->SetFont('times', '', 10);
        $this->SetFont('timesi', '', 8);
        $this->MultiCell(45, 4, '(Ban hành kèm theo Thông tư số 156/2013/TT-BTC ngày 06/11/2013 của Bộ Tài chính)', LRB,C,false);

        $this->Ln(-7);// xu?ng hàng bao nhiêu dong
        $this->Cell(40, 6, '', 0, 0, R);

        $this->SetFont('timesb', '', 11);
        $this->Cell(115, 6,"TỜ KHAI PHÍ BẢO VỆ MÔI TRƯỜNG", 0, 0, C);
        $this->SetFont('times', '', 9);
        $this->Cell(45, 6, '', 0, 0,C);

        $this->Ln(4);// xu?ng hàng bao nhiêu dong
        $this->SetFont('timesi', '', 10);
        $this->Cell(40, 6, '', 0, 0, R);
        $this->Cell(115, 6,"", 0, 0, C);
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
    function Header()
    {

    }
    function Footer()
    {

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
        $this->Cell(35, 4, 'Số tài khoản:', '0');// LTRB là border c?a cell
        $this->SetFont('timesb', '', 10);
        $this->Cell(50, 4, "", '0', 'L');
        $this->SetFont('times', '', 9);

        $this->Cell(28, 4, '[13] tại Ngân hàng/KBNN:', '0');// LTRB là border c?a cell
        $this->SetFont('timesb', '', 10);
        $this->Cell(62, 4, "", '0', 'L');
        $this->SetFont('times', '', 9);

        $this->Ln(5);

        $this->Cell(10, 4, '   [13]', '0',R);// LTRB là border c?a cell
        $this->Cell(35, 4, 'Mã số thuế:', '0','L');// LTRB là border c?a cell
        $this->SetFont('timesb', '', 10);
        $this->Cell(170, 4, "", '0', 'L');
        $this->SetFont('times', '', 9);

        $this->Ln(5);

        $this->Cell(10, 4, '   [14]', '0',R);// LTRB là border c?a cell
        $this->Cell(35, 4, 'Nghề nghiệp/lĩnh vực hoạt động,kinh doanh chính:', '0','L');// LTRB là border c?a cell
        $this->SetFont('timesb', '', 10);
        $this->Cell(175, 4, "", '0', 'L');
        $this->SetFont('times', '', 9);

        $this->Ln(5);

        $this->Cell(10, 4, '   [15]', '0',R);// LTRB là border c?a cell
        $this->Cell(36, 4, 'Văn bản uỷ quyền:', '0');// LTRB là border c?a cell
        $this->SetFont('timesb', '', 12);
        $this->Cell(52, 4, "", '0', 'L');
        $this->SetFont('times', '', 10);

        $this->Cell(12, 4, '', '0');// LTRB là border c?a cell
        $this->SetFont('timesb', '', 10);
        $this->Cell(60, 4, "", '0', 'L');
        $this->SetFont('times', '', 9);


        $this->Ln(10);
        $this->SetFont('times', '', 7);
        $this->Cell(149,3,"",'0',0,'L');// LTRB là border c?a cell
        $this->SetFont('timesb', '', 8);
        $this->Cell(50,3,"Đơn vị tiền: Đồng Việt Nam",'0',0,'R');
        $this->Ln(8);

        $w = array(0=>0,1=>10,2=>80,3=>15,4=>32,5=>25,6=>37);
        $this->SetFont('timesb', '', 10);
        $this->Cell(10,5,"",'0',0,'C');// LTRB là border c?a cell
        $this->Cell(60,5,"",'0',0,'C');// LTRB là border c?a cell

        $this->Cell(37,5,"",'0',0,'C');
        $this->Cell(20,5,"",'0',0,'C');
        $this->Cell(20,5,"",'0',0,'C');
        $this->Cell(30,5,"",'0',0,'C');
        $this->Ln(-5);

        $this->SetFont('timesb', '', 9);
        $this->Cell($w[1],5,"",'LT',0,'C');// LTRB là border c?a cell
        $this->Cell($w[2],5," ",'LT',0,'C');// LTRB là border c?a cell
        $this->Cell($w[3]+$w[4],5,"Số lượng khoán sản",'LTB',0,'C');
        $this->Cell($w[5],5,"",'LTR',0,'C');
        $this->Cell($w[6],5,"",'LTR',0,'C');
        $this->Ln();
        $this->Cell($w[1],5,"STT",'L',0,'C');// LTRB là border c?a cell
        $this->Cell($w[2],5,"Loại khoán sản ",'L',0,'C');// LTRB là border c?a cell
        $this->Cell($w[3],5,"Đơn vị",'L',0,'C');
        $this->Cell($w[4],5,"Số lượng",'L',0,'C');
        $this->Cell($w[5],5,"Mức phí",'L',0,'C');
        $this->Cell($w[6],5,"Số phí phải nộp",'LR',0,'C');
        $this->Ln();
        $this->Cell($w[1],5,"",'LB',0,'C');// LTRB là border c?a cell
        $this->Cell($w[2],5,"",'LB',0,'C');// LTRB là border c?a cell
        $this->Cell($w[3],5,"tính",'LB',0,'C');
        $this->Cell($w[4],5,"",'LRB',0,'C');
        $this->Cell($w[5],5,"",'LRB',0,'C');
        $this->Cell($w[6],5,"trong kỳ",'LRB',0,'C');
        $this->Ln();

        $this->SetLineWidth(0.03);
        $this->Cell($w[1], 5,"(1)", 'LB', 0, 'C');// LTRB là border c?a cell
        $this->Cell($w[2], 5,"(2)", 'LRB', 0, 'C');// LTRB là border c?a cell
        $this->Cell($w[3], 5, "(3)", 'LB', 0, 'C');
        $this->Cell($w[4], 5,"(4)", 'LRB', 0, 'C');
        $this->Cell($w[5], 5,"(5)", 'LRB', 0, 'C');
        $this->Cell($w[6], 5,"(6)=(4)x(5)", 'LRB', 0, 'C');
        $this->Ln();

        $this->SetFont('timesb', '', 9);
        $this->SetLineWidth(0.03);
        $this->Cell($w[1], 5,"I", 'LB', 0, 'C');// LTRB là border c?a cell
        $this->Cell($w[2], 5,"Khoán sản do cơ sở tự khai thác:", 'LRB', 0, 'L');// LTRB là border c?a cell
        $this->Cell($w[3], 5, "", 'LRB', 0, 'C');
        $this->Cell($w[4], 5,"", 'LRB', 0, 'R');
        $this->Cell($w[5], 5,"", 'LRB', 0, 'C');
        $this->Cell($w[6], 5,"", 'LRB', 0, 'R');
        $this->Ln();

        $this->SetFont('times', '', 9);
        $this->SetLineWidth(0.03);
        $this->Cell($w[1], 5,"1", 'LB', 0, 'C');// LTRB là border c?a cell
        $this->Cell($w[2], 5,$data['I']['tenloai'], 'LRB', 0, 'L');// LTRB là border c?a cell
        $this->Cell($w[3], 5,$data['I']['tendvt'], 'LRB', 0, 'C');
        $this->Cell($w[4], 5,(number_format($data['I']['soluong']) == 0) ? "" : number_format($data['I']['soluong'],3,",","."), 'LRB', 0, 'R');
        $this->Cell($w[5], 5,(number_format($data['I']['mucphi']) == 0) ? "" : number_format($data['I']['mucphi'],3,",","."), 'LRB', 0, 'C');
        $this->Cell($w[6], 5,(number_format($data['I']['thanhtien']) == 0) ? "" : number_format($data['I']['thanhtien'],0,",","."), 'LRB', 0, 'R');
        $this->Ln();

        $this->SetFont('timesb', '', 9);
        $this->SetLineWidth(0.03);
        $this->Cell($w[1], 10,"I", 'LB', 0, 'C');// LTRB là border c?a cell
        $this->Cell($w[2], 10,"Khoán sản do cơ sở thu mua nộp thay người khai thác:", 'LRB', 0, 'L');// LTRB là border c?a cell
        $this->Cell($w[3], 10, "", 'LRB', 0, 'C');
        $this->Cell($w[4], 10,"", 'LRB', 0, 'R');
        $this->Cell($w[5], 10,"", 'LRB', 0, 'C');
        $this->Cell($w[6], 10,"", 'LRB', 0, 'R');
        $this->Ln();
        $this->SetFont('times', '', 9);
        $this->SetLineWidth(0.03);
        $this->Cell($w[1], 5,"1", 'LB', 0, 'C');// LTRB là border c?a cell
        $this->Cell($w[2], 5,"", 'LRB', 0, 'L');// LTRB là border c?a cell
        $this->Cell($w[3], 5,"", 'LRB', 0, 'C');
        $this->Cell($w[4], 5,(number_format($doanhthunhom2) == 0) ? "" : number_format($doanhthunhom2,0,",","."), 'LRB', 0, 'R');
        $this->Cell($w[5], 5,"", 'LRB', 0, 'C');
        $this->Cell($w[6], 5,(number_format($thuenhom2) == 0) ? "" : number_format($thuenhom2,0,",","."), 'LRB', 0, 'R');
        $this->Ln();

        $this->SetFont('timesb', '', 9);
        $this->SetLineWidth(0.03);
        $this->Cell(162, 5,"Tổng cộng:", 'LRB', 0, 'C');// LTRB là border c?a cell
        $this->Cell(37, 5,(number_format($data['I']['thanhtien']) == 0) ? "" : number_format($data['I']['thanhtien'],0,",","."), 'LRB', 0, 'R');
        $this->Ln();
        $this->Ln();

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

// Column headings
//$header = array('STT', 'Họ và Tên');
//$pdf->AddPage();
// Add a Unicode font (uses UTF-8)
$pdf->PageNo();
$pdf->AddFont('times', '', 'vuTimes.ttf', true);
$pdf->SetFont('times', '', 14);
$pdf->AddFont('timesb', '', 'vuTimesBold.ttf', true);
$pdf->SetMargins(6, 1, 0.3, 0);
$pdf->SetAutoPageBreak(true, 0);

$data = $_SESSION['PhieuNhapXuat'];
$pdf->AddPage('P', 'A4');
$loaiphieu = $data['loaiphieu'];

$data =$_SESSION["TOKHAITHUE"];

$pdf->TieuDe($loaitokhai);
$pdf->ImprovedTable($header, $data,$nhomnganh);
//debug($_SESSION['PhieuNhapXuatCT']);
echo $pdf->Output("tokhai_phi_bvmt" .$data['sott']. ".pdf", "I");
ob_end_flush();
?>