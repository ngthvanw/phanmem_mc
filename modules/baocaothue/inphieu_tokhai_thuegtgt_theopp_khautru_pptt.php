<?php
session_start();
ob_start();
include("../../config.php");
$thuedenghihoan = str_replace(",","",$_GET['thuedenghihoan']);
$doanhsogtgtkhautru = str_replace(",","",$_GET['doanhsogtgtkhautru']);
$doanhsogtgtdaura = str_replace(",","",$_GET['doanhsogtgtdaura']);
$thuegtgtdaura = str_replace(",","",$_GET['thuegtgtdaura']);
$thuegtgtngoaitinh = str_replace(",","",$_GET['thuegtgtngoaitinh']);
$thuegtgtmuavaoduandautu= str_replace(",","",$_GET['thuegtgtmuavaoduandautu']);
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
        $this->Cell(45, 6, 'Mẫu số: 04/GTGT', LTR, 0,C);

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
        $this->Cell(115, 6,"TỜ KHAI THUẾ GIÁ TRỊ GIA TĂNG(GTGT)", 0, 0, C);
        $this->SetFont('times', '', 9);
        $this->Cell(45, 6, '', 0, 0,C);

        $this->Ln(4);// xu?ng hàng bao nhiêu dong
        $this->SetFont('timesi', '', 10);
        $this->Cell(40, 6, '', 0, 0, R);
        $this->Cell(115, 6,"(Dành cho người nộp thuế theo phương pháp trực tiếp trên doanh thu)", 0, 0, C);
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
        $this->Cell(151,3,"",'0',0,'L');// LTRB là border c?a cell
        $this->SetFont('timesb', '', 8);
        $this->Cell(50,3,"Đơn vị tiền: Đồng Việt Nam",'0',0,'R');
        $this->Ln(8);


        $this->SetFont('timesb', '', 10);
        $this->Cell(10,5,"",'0',0,'C');// LTRB là border c?a cell
        $this->Cell(60,5,"",'0',0,'C');// LTRB là border c?a cell

        $this->Cell(37,5,"",'0',0,'C');
        $this->Cell(20,5,"",'0',0,'C');
        $this->Cell(20,5,"",'0',0,'C');
        $this->Cell(30,5,"",'0',0,'C');
        $this->Ln(-5);

        $this->SetFont('timesb', '', 9);
        $this->Cell(10,5,"",'LT',0,'C');// LTRB là border c?a cell
        $this->Cell(60,5," ",'LT',0,'C');// LTRB là border c?a cell
        $this->Cell(37,5,"Doanh thu hàng hoá",'LT',0,'C');
        $this->Cell(35,5,"Doanh thu hàng hoá",'LTR',0,'C');
        $this->Cell(20,5,"Tỷ lệ",'LTR',0,'C');
        $this->Cell(37,5,"",'LTR',0,'C');
        $this->Ln();
        $this->Cell(10,5,"STT",'L',0,'C');// LTRB là border c?a cell
        $this->Cell(60,5,"Nhóm ngành ",'L',0,'C');// LTRB là border c?a cell
        $this->Cell(37,5,"dịch vụ chịu thuế suất",'L',0,'C');
        $this->Cell(35,5,"dịch vụ chịu thuế",'L',0,'C');
        $this->Cell(20,5,"GTGT",'L',0,'C');
        $this->Cell(37,5,"Thuế GTGT phải nộp",'LR',0,'C');
        $this->Ln();
        $this->Cell(10,5,"",'LB',0,'C');// LTRB là border c?a cell
        $this->Cell(60,5,"",'LB',0,'C');// LTRB là border c?a cell
        $this->Cell(37,5,"0% và không chịu thuế",'LB',0,'C');
        $this->Cell(35,5,"",'LRB',0,'C');
        $this->Cell(20,5,"",'LRB',0,'C');
        $this->Cell(37,5,"",'LRB',0,'C');
        $this->Ln();

        $this->SetLineWidth(0.03);
        $this->Cell(10, 5,"(1)", 'LB', 0, 'C');// LTRB là border c?a cell
        $this->Cell(60, 5,"(2)", 'LRB', 0, 'C');// LTRB là border c?a cell
        $this->Cell(37, 5, "(3)", 'LB', 0, 'C');
        $this->Cell(35, 5,"(4)", 'LRB', 0, 'C');
        $this->Cell(20, 5,"(5)", 'LRB', 0, 'C');
        $this->Cell(37, 5,"(6)", 'LRB', 0, 'C');
        $this->Ln();

        $tongdoanhthu = $data['II2']['gthh']+$data['II2b']['gthh']+$data['II2c']['gthh']+$data['II3']['gthh'];
        $tongthue = $data['II2']['thue']+$data['II2b']['thue']+$data['II2c']['thue']+$data['II3']['thue'];

        $this->SetFont('times', '', 9);
        $this->SetLineWidth(0.03);
        $this->Cell(10, 10,"1", 'LB', 0, 'C');// LTRB là border c?a cell
        $this->Cell(60, 10,"Phân phối, cung cấp hàng hoá", 'LRB', 0, 'L');// LTRB là border c?a cell
        $this->Cell(7, 10, "", 'L', 0, 'C');
        $this->Cell(30, 10, "", 'L', 0, 'C');
        $this->Cell(7, 10,"[22]", 'LRB', 0, 'C');
        $this->Cell(28, 10,(number_format($data['II2']['gthh']) == 0) ? "" : number_format($data['II2']['gthh'],0,",","."), 'LRB', 0, 'R');
        $this->Cell(20, 10,"[23]=[22]x1%", 'LRB', 0, 'C');
        $this->Cell(37, 10,(number_format($data['II2']['thue']) == 0) ? "" : number_format($data['II2']['thue'],0,",","."), 'LRB', 0, 'R');
        $this->Ln();

        $this->SetLineWidth(0.03);
        $this->Cell(10, 5,"2", 'L', 0, 'C');// LTRB là border c?a cell
        $this->Cell(60, 5,"Dịch vụ, xây dựng không bao thầu", 'LR', 0, 'L');// LTRB là border c?a cell
        $this->Cell(7, 5, "", 'L', 0, 'C');
        $this->Cell(30, 5, "", 'L', 0, 'C');
        $this->Cell(7, 5,"", 'LR', 0, 'C');
        $this->Cell(28, 5,"", 'LR', 0, 'R');
        $this->Cell(20, 5,"[25]=[24]", 'LR', 0, 'C');
        $this->Cell(37, 5,"", 'LR', 0, 'R');
        $this->Ln(3);

        $this->SetLineWidth(0.03);
        $this->Cell(10, 5,"", 'LB', 0, 'C');// LTRB là border c?a cell
        $this->Cell(60, 5,"nguyên vật liệu", 'LRB', 0, 'L');// LTRB là border c?a cell
        $this->Cell(7, 5, "", 'L', 0, 'C');
        $this->Cell(30, 5, "", 'L', 0, 'C');
        $this->Cell(7, 5,"[24]", 'LRB', 0, 'C');
        $this->Cell(28, 5,(number_format(($data['II2b']['gthh']) == 0)) ? "" : number_format($data['II2b']['gthh'],0,",","."), 'LRB', 0, 'R');
        $this->Cell(20, 5,"x5%", 'LRB', 0, 'C');
        $this->Cell(37, 5,(number_format($data['II2b']['thue']) == 0) ? "" : number_format($data['II2b']['thue'],0,",","."), 'LRB', 0, 'R');
        $this->Ln();

        $this->SetLineWidth(0.03);
        $this->Cell(10, 5,"3", 'L', 0, 'C');// LTRB là border c?a cell
        $this->Cell(60, 5,"Sản xuất, vận tải, dịch vụ có gắn với hàng", 'LR', 0, 'L');// LTRB là border c?a cell
        $this->Cell(7, 5, "[21]", 'L', 0, 'C');
        $this->Cell(30, 5, (number_format($data['II1']['gthh']) == 0) ? "" : number_format($data['II1']['gthh'],0,",","."), 'L', 0, 'R');
        $this->Cell(7, 5,'', 'LR', 0, 'C');
        $this->Cell(28, 5,"", 'LR', 0, 'R');
        $this->Cell(20, 5,"[27]=[26]", 'LR', 0, 'C');
        $this->Cell(37, 5,"", 'LR', 0, 'R');
        $this->Ln(3);

        $this->SetLineWidth(0.03);
        $this->Cell(10, 5,"", 'LB', 0, 'C');// LTRB là border c?a cell
        $this->Cell(60, 5,"hoá, xây dụng có bao thầu nguyên vật liệu", 'LRB', 0, 'L');// LTRB là border c?a cell
        $this->Cell(7, 5, "", 'L', 0, 'C');
        $this->Cell(30, 5, "", 'L', 0, 'C');
        $this->Cell(7, 5,"[26]", 'LRB', 0, 'C');
        $this->Cell(28, 5,(number_format($data['II2c']['gthh']) == 0) ? "" : number_format($data['II2c']['gthh'],0,",","."), 'LRB', 0, 'R');
        $this->Cell(20, 5,"x3%", 'LRB', 0, 'C');
        $this->Cell(37, 5,(number_format($data['II2c']['thue']) == 0) ? "" : number_format($data['II2c']['thue'],0,",","."), 'LRB', 0, 'R');
        $this->Ln();

        $this->SetLineWidth(0.03);
        $this->Cell(10, 10,"4", 'LB', 0, 'C');// LTRB là border c?a cell
        $this->Cell(60, 10,"Hoạt động kinh doanh khác", 'LRB', 0, 'L');// LTRB là border c?a cell
        $this->Cell(7, 10, "", 'LB', 0, 'C');
        $this->Cell(30, 10, "", 'LB', 0, 'C');
        $this->Cell(7, 10,"[28]", 'LRB', 0, 'C');
        $this->Cell(28, 10,(number_format($data['II3']['gthh']) == 0) ? "" : number_format($data['II3']['gthh'],0,",","."), 'LRB', 0, 'R');
        $this->Cell(20, 10,"[29]=[28]x2%", 'LRB', 0, 'C');
        $this->Cell(37, 10,(number_format($data['II3']['thue']) == 0) ? "" : number_format($data['II3']['thue'],0,",","."), 'LRB', 0, 'R');
        $this->Ln();

        $this->SetFont('timesb', '', 9);
        $this->SetLineWidth(0.03);
        $this->Cell(10, 5,"", 'LB', 0, 'C');// LTRB là border c?a cell
        $this->Cell(60, 5,"Tổng", 'LRB', 0, 'L');// LTRB là border c?a cell
        $this->Cell(7, 5, "", 'LB', 0, 'C');
        $this->Cell(30, 5, (number_format($data['II1']['gthh']) == 0) ? "" : number_format($data['II1']['gthh'],0,",","."), 'LB', 0, 'C');
        $this->Cell(7, 5,"[30]", 'LRB', 0, 'C');
        $this->Cell(28, 5,(number_format($tongdoanhthu) == 0) ? "" : number_format($tongdoanhthu,0,",","."), 'LRB', 0, 'R');
        $this->Cell(20, 5,"[31]", 'LRB', 0, 'C');
        $this->Cell(37, 5,(number_format($tongthue) == 0) ? "" : number_format($tongthue,0,",","."), 'LRB', 0, 'R');
        $this->Ln();
        $this->Ln();
        $this->Cell(201, 5,"Tổng doanh thu: [32]=[21]+[30]", '0', 0, 'L');// LTRB là border c?a cell
        $this->Ln();
        $this->Cell(201, 5,"Tổng số thuế GTGT phải nộp: [33]=[31]", '0', 0, 'L');// LTRB là border c?a cell
        $this->SetFont('timesb', '', 9);

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
echo $pdf->Output("BangThuChi_" .$data['sott']. ".pdf", "I");
ob_end_flush();
?>