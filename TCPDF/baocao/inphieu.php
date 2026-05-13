<?php
session_start();
include("../../config.php");
// Optionally define the filesystem path to your system fonts
// otherwise tFPDF will use [path to tFPDF]/font/unifont/ directory
// define("_SYSTEM_TTFONTS", "C:/Windows/Fonts/");

require_once('tcpdf_include.php');

class PDF extends TCPDF
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

        /*$tendn = ($_SESSION['TenCongTy']);
        $DiaChi = ($_SESSION['DiaChi']);
        $MST = ($_SESSION['MST']);

        $this->Cell(90, 4, '' . "", 0, 0, L);// Lên công ty
        $this->SetFont('times', '', 9);
        $this->Cell(105, 4, '', 0, 0, R);

        $this->Ln(4);// xu?ng hàng bao nhiêu dong
        $this->SetFont('timesb', '', 12);
        $this->Cell(90, 4, '' . $tendn, 0, 0, L);// Lên công ty
        $this->SetFont('times', '', 9);
        $this->Cell(105, 4, ' ', 0, 0, R);

        $this->Ln(4);// xu?ng hàng bao nhiêu dong
        $this->Cell(90, 4, $DiaChi, 0, 0, L);
        $this->Cell(105, 4, 'MST : '.$MST, 0, 0, R);
        $this->Ln(0);*/

        $this->Cell(195, 4, "", B, 0, L);

        $this->SetFont('times', '', 10);
        $this->Ln(7);// xu?ng hàng bao nhiêu dong
        $this->SetFont('timesb', '', 14);
        $this->Cell(70, 4, '', 0, 0, R);

        $this->Cell(65, 4,$_SESSION['PhieuNhapXuat']['tenphieu'], 0, 0, C);
        $this->SetFont('times', '', 10);
        $this->Cell(60, 4, 'Mãu số : 01-VT', 0, 0, R);

        $this->Ln(6);// xu?ng hàng bao nhiêu dong
        $this->SetFont('timesb', '', 12);
        $this->SetFont('timesi', '', 12);
        $this->Cell(70, 4, '', 0, 0, R);
        $this->Cell(65, 4, 'Ngày :'.dd_mm_yyy($_SESSION['PhieuNhapXuat']['ngayhoadon']), 0, 0, C);
        $this->SetFont('times', '', 10);
        $this->Cell(25, 4, '', 0, 0, R);
        $this->Cell(35, 4, 'Định khoản', LTRB, 0, C);

        $this->Ln();// xu?ng hàng bao nhiêu dong
        $this->SetFont('timesb', '', 10);
        $this->SetFont('timesi', '', 10);
        $this->Cell(70, 5, '', 0, 0, R);
        $this->Cell(65, 5, 'Số : '.$_SESSION['PhieuNhapXuat']['mapskt']."/".$_SESSION['PhieuNhapXuat']['sott'], 0, 0, C);
        $this->SetFont('times', '', 10);
        $this->Cell(25, 5, '', 0, 0, R);
        $this->MultiCell(35,5,str_replace("*"," ",$_SESSION['DinhKhoan']),'LTRB','C',false);




        $this->Ln();// xu?ng hàng bao nhiêu dong

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
        $this->Cell(105, 4, '', 0, 0, R);

        $this->Ln(4);// xu?ng hàng bao nhiêu dong
        $this->SetFont('timesb', '', 12);
        $this->Cell(90, 4, '' . $tendn, 0, 0, L);// Lên công ty
        $this->SetFont('times', '', 9);
        $this->Cell(105, 4, ' ', 0, 0, R);

        $this->Ln(4);// xu?ng hàng bao nhiêu dong
        $this->Cell(90, 4, $DiaChi, 0, 0, L);
        $this->Cell(105, 4, 'MST : '.$MST, 0, 0, R);
        $this->Ln(0);

        $this->Cell(195, 4, "", B, 0, L);
    }
    function Footer()
    {
        // Go to 1.5 cm from bottom
        $this->SetY(-5);
        // Select Arial italic 8
        $this->SetFont('Arial','I',8);
        // Print centered page number
        $this->Cell(0,4,'Trang '.$this->PageNo(),0,0,'R');
    }

    function ImprovedTable($header, $data)
    {
        $this->SetDrawColor(0, 0, 0);
        $this->SetLineWidth(0.1);
        $this->SetFont('times', '', 10);
        // Column widths
        $w = array(10, 40);
        // Header
        for ($i = 0; $i < count($header); $i++) {
            $this->Cell($w[$i], 7, $header[$i], 1, 0, 'C');
        }
        // Data

        $this->SetLineWidth(.1);
        $this->Cell(40, 4, 'Họ và Tên người giao hàng:', '0');// LTRB là border c?a cell
        $this->Cell(67, 4, $data['tenkh'], '0', 'L');

        $this->Cell(26, 4, 'Địa chỉ(bộ phận):', '0');// LTRB là border c?a cell
        $this->Cell(70, 4, $data['diachi'], '0', 'L');

        $this->Ln(1);
        $this->Cell(40, 4, '', '0');// LTRB là border c?a cell
        $this->Cell(150, 4,'.........................................................................                                .......................................................................', '0', 'L');

        //$this->Cell(20, 4, 'Địa chỉ:', '0');// LTRB là border c?a cell
        //$this->Cell(30, 4, $data['diachi'], 'B', 'L');

        $this->Ln(6);

        $this->Cell(32, 4, 'Mã số thuế người bán:', '0');// LTRB là border c?a cell
        $this->Cell(158, 4, $data['masothue'], '0', 'L');

        $this->Ln(1);
        $this->Cell(32, 4, '', '0');// LTRB là border c?a cell
        $this->Cell(158, 4,'..........................................................................................................................................................................................', '0', 'L');

        $this->Ln(6);

        $this->Cell(3, 4, 'Theo:', '0');// LTRB là border c?a cell
        $this->Cell(87, 4, $data['hopdong'], '0', 'L');

        $this->Cell(20, 4, 'Chứng từ số :', '0');// LTRB là border c?a cell
        $this->Cell(34, 4, $data['seri']." ".$data['sct'], '0', 'L');
        
        $this->Cell(10, 4, 'Ngày:', '0');// LTRB là border c?a cell
        $this->Cell(30, 4, dd_mm_yyy($data['ngayghiso']), '0', 'L');

        $this->Ln(1);

        $this->Cell(8, 4, '', '0');// LTRB là border c?a cell
        $this->Cell(87, 4,'............................................................................................', '0', 'L');

        $this->Cell(14, 4, '', '0');// LTRB là border c?a cell
        $this->Cell(34, 4,'.......................................', '0', 'L');

        $this->Cell(10, 4, '', '0');// LTRB là border c?a cell
        $this->Cell(30, 4,'................................................', '0', 'L');

        $this->Ln(6);

        $this->Cell(20, 4, 'Nhập tại kho:', '0');// LTRB là border c?a cell
        $this->Cell(74, 4, $data['tenkho'], '0', 'L');

        $this->Cell(32, 4, 'Hình thức vận chuyển:', '0');// LTRB là border c?a cell
        $this->Cell(60, 4, $data['hinhthucvanchuyen'], '0', 'L');
        $this->Ln(1);
        $this->Cell(20, 4, '', '0');// LTRB là border c?a cell
        $this->Cell(74, 4, '...................................................................................', '0', 'L');

        $this->Cell(32, 4, '', '0');// LTRB là border c?a cell
        $this->Cell(60, 4, '...............................................................................', '0', 'L');

        $this->Ln(6);

        $this->Cell(16, 4, 'Ghi chú:', '0');// LTRB là border c?a cell
        $this->Cell(178, 4, $data['chuthich'], '0', 'L');

        $this->Ln(1);
        $this->Cell(14, 4, '', '0');// LTRB là border c?a cell
        $this->Cell(178, 4,'..............................................................................................................................................................................................................', '0', 'L');
        $this->Ln(15);

        $this->SetFont('times', '', 10);
        $this->Cell(7,5,"",'0',0,'C');// LTRB là border c?a cell
        $this->Cell(57,5,"",'0',0,'C');// LTRB là border c?a cell
        $this->Cell(25,5,"",'0',0,'C');
        $this->Cell(20,5,"",'0',0,'C');
        $this->Cell(20,5,"TheoCT",'LTRB',0,'C');
        $this->Cell(17,5,"Thực nhập",'LTRB',0,'C');
        $this->Cell(20,5,"",'0',0,'C');
        $this->Cell(20,5,"",'0',0,'C');
        $this->Cell(30,5,"",'0',0,'C');
        $this->Ln(-5);

        $this->SetFont('times', '', 10);
        $this->Cell(7,10,"STT",'LTRB',0,'C');// LTRB là border c?a cell
        $this->Cell(57,10,"Tên, nhãn hiệu, quy cách ",'LTRB',0,'C');// LTRB là border c?a cell
        $this->Cell(25,10,"Mã số",'LTRB',0,'C');
        $this->Cell(20,10,"ĐVT",'LTRB',0,'C');
        $this->Cell(37,5,"Số lượng",'LTRB',0,'C');
        $this->Cell(20,10,"Đơn giá",'LTRB',0,'C');
        $this->Cell(15,10,"Chiết khấu",'LTRB',0,'C');
        $this->Cell(20,10,"Thành tiền",'LTRB',0,'C');
        $this->Ln();

        $this->Cell(7,5,"A",'LTRB',0,'C');// LTRB là border c?a cell
        $this->Cell(57,5,"B",'LTRB',0,'C');// LTRB là border c?a cell
        $this->Cell(25,5,"C",'LTRB',0,'C');
        $this->Cell(20,5,"D",'LTRB',0,'C');
        $this->Cell(20,5,"1",'LTRB',0,'C');
        $this->Cell(17,5,"2",'LTRB',0,'C');
        $this->Cell(20,5,"3",'LTRB',0,'C');
        $this->Cell(15,5,"4",'LTRB',0,'C');
        $this->Cell(20,5,"5",'LTRB',0,'C');
        $this->Ln();
        // đặt hàm foreach ở đây
        $sott=1;
        $sodongtrongphieu =count($_SESSION['PhieuNhapXuatCT']);
        for($i=$sodongtrongphieu+1;$i<24;$i++){
            $_SESSION['PhieuNhapXuatCT'][$i]="";
        }
        $dem=0;
    foreach ($_SESSION['PhieuNhapXuatCT'] as $tiemCT) {
            if($tiemCT['tenvt']!=""){
                $this->Cell(7, 5, $sott, 'LR', 0, 'C');// LTRB là border c?a cell
                $dem++;
            }else{
                $this->Cell(7, 5,'', 'LR', 0, 'C');// LTRB là border c?a cell
            }

        $this->Cell(57, 5, $tiemCT['tenvt'], 'LR', 0, 'L');// LTRB là border c?a cell
        $this->Cell(25, 5,$tiemCT['mavt'], 'LR', 0, 'C');
        $this->Cell(20, 5, $tiemCT['dvt'], 'LR', 0, 'C');
        $this->Cell(20, 5, "", 'LR', 0, 'L');
        $this->Cell(17, 5, number_format($tiemCT['soluongnhap']), 'LR', 0, 'R');
        $this->Cell(20, 5, number_format($tiemCT['donggianhap']), 'LR', 0, 'R');
        $this->Cell(15, 5, number_format($tiemCT['tienchietkhau']), 'LR', 0, 'R');
        $this->Cell(20, 5, number_format($tiemCT['thanhtien']), 'LR', 0, 'R');

        $this->Ln(0);

        $this->Cell(202, 5,'_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _', '0', 0, 'R');

        $this->Ln();
        $sott++;
    }
    if($dem<22) {
        $y = (($dem) * 5) + 100 + 2;
        $this->Line(4, $y, 80, $y);
        $this->Line(80, $y, 205, 212);
    }

        $this->SetFont('timesb', '', 10);
        $this->Cell(7,5,"",'LTRB',0,'C');// LTRB là border c?a cell
        $this->Cell(57,5,"Cộng tiền chiết khấu",'LTRB',0,'R');// LTRB là border c?a cell
        $this->Cell(25,5,"",'LTRB',0,'C');
        $this->Cell(20,5,"",'LTRB',0,'C');
        $this->Cell(20,5,"",'LTRB',0,'L');
        $this->Cell(17,5,"",'LTRB',0,'R');
        $this->Cell(20,5,"",'LTRB',0,'R');
        $this->Cell(15,5,"",'LTRB',0,'R');
        $this->Cell(20,5,number_format($data['tienchietkhau']),'LTRB',0,'R');

        $this->Ln();

        $this->SetFont('timesb', '', 10);
        $this->Cell(7,5,"",'LTRB',0,'C');// LTRB là border c?a cell
        $this->Cell(57,5,"Cộng tiền hàng",'LTRB',0,'R');// LTRB là border c?a cell
        $this->Cell(25,5,"",'LTRB',0,'C');
        $this->Cell(20,5,"",'LTRB',0,'C');
        $this->Cell(20,5,"",'LTRB',0,'L');
        $this->Cell(17,5,"",'LTRB',0,'R');
        $this->Cell(20,5,"",'LTRB',0,'R');
        $this->Cell(15,5,"",'LTRB',0,'R');
        $this->Cell(20,5,number_format($data['tienhang']),'LTRB',0,'R');

        $this->Ln();
        $this->Cell(7,5,"",'LTRB',0,'C');// LTRB là border c?a cell
        $this->Cell(57,5,"Thuế GTGT",'LTRB',0,'R');// LTRB là border c?a cell
        $this->Cell(25,5,"",'LTRB',0,'C');
        $this->Cell(20,5,"",'LTRB',0,'C');
        $this->Cell(20,5,"",'LTRB',0,'L');
        $this->Cell(17,5,"",'LTRB',0,'R');
        $this->Cell(20,5,"",'LTRB',0,'R');
        $this->Cell(15,5,"",'LTRB',0,'R');
        $this->Cell(20,5,number_format($data['tienthue']),'LTRB',0,'R');

        $this->Ln();
        $this->Cell(7,5,"",'LTRB',0,'C');// LTRB là border c?a cell
        $this->Cell(57,5,"Tổng cộng tiền thanh toán",'LTRB',0,'R');// LTRB là border c?a cell
        $this->Cell(25,5,"",'LTRB',0,'C');
        $this->Cell(20,5,"",'LTRB',0,'C');
        $this->Cell(20,5,"",'LTRB',0,'L');
        $this->Cell(17,5,"",'LTRB',0,'R');
        $this->Cell(20,5,"",'LTRB',0,'R');
        $this->Cell(15,5,"",'LTRB',0,'R');
        $this->Cell(20,5,number_format($data['tongcong']),'LTRB',0,'R');

        $this->Ln(7);
        $tongcong = convert_number_to_words(str_replace(",", "", $data['tongcong']));
        $this->SetFont('times', '', 10);
        $this->Cell(40, 4, 'Tổng số tiền(viết bằng chữ):', '0');// LTRB là border c?a cell
        $this->SetFont('timesi', '', 10);
        $this->Cell(146, 4, ucfirst($tongcong) . " đồng", '0', 'L');
        $this->Ln(7);

        $this->SetFont('times', '', 10);
        $this->Ln(8);
        $this->Cell(46, 3, '', 0, 0, C);
        $this->Cell(46, 3, '', 0, 0, C);
        $this->Cell(46, 3, '', 0, 0, C);
        $this->Cell(46, 3, 'Ngày '.($data['ngaylap']), 0, 0, C);
        $this->Ln(4);
        $this->Cell(46, 3, 'Lập phiếu', 0, 0, C);
        $this->Cell(46, 3, 'Người giao', 0, 0, C);
        $this->Cell(46, 3, 'Thủ kho', 0, 0, C);
        $this->Cell(46, 3, 'Kế toán trưởng', 0, 0, C);
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
$pdf->SetMargins(4, 1, 0.3, 0);
$pdf->SetAutoPageBreak(true, 0);

$data = $_SESSION['PhieuNhapXuat'];
$pdf->AddPage('P', 'A4');
$loaiphieu = $data['loaiphieu'];
if($loaiphieu==1){
    $tk1="Có ";
    $tk2="Nợ ";
}
if($loaiphieu==2){
    $tk1="Nợ ";
    $tk2="Có ";
}

$pdf->TieuDe(dd_mm_yyy($data['ngayghiso']), $data['tkco'], $data['mapskt'], $data['sott'],$data['loaiphieu'],$data['tenphieu'],$tk1,$tk2);
$pdf->ImprovedTable($header, $data);
//debug($_SESSION['PhieuNhapXuatCT']);
echo $pdf->Output("BangThuChi_" .$data['sott']. ".pdf", "I");
?>