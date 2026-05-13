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
        //$this->SetLineWidth(0.6);
       // $this->Line(4,4,205,4);
        //$this->Line(4,4,4,291);
        //$this->Line(4,291,205,291);
       // $this->Line(205,4,205,291);

        $this->SetLineWidth(0.1);

        $this->SetFont('times', '', 10);
        $this->Ln(3.5);// xu?ng hàng bao nhiêu dong
        //$this->SetFont('timesb', '', 14);
        $this->Cell(40, 6, '', 0, 0, R);

        $this->Cell(116, 6,"CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM", 0, 0, C);
        $this->SetFont('times', '', 9);
        $this->Cell(45, 6, 'Mãu số : 01-VT', LTR, 0,C);

        $this->Ln(5);// xu?ng hàng bao nhiêu dong
        $this->Cell(40, 6, '', 0, 0, R);
        $this->SetFont('times', '', 10);
        $this->Cell(116, 6,"Độc Lập - Tự Do - Hạnh Phúc", 0, 0, C);
        $this->SetFont('times', '', 10);
        $this->SetFont('timesi', '', 8);
        $this->MultiCell(45, 4, 'Ban hành kèo theo thông tư số 26/2011/TT-BTC ngày 26/02/2011 của Bộ Tài Chính', LRB,C,false);

        $this->Ln(-7);// xu?ng hàng bao nhiêu dong
        $this->Cell(40, 6, '', 0, 0, R);

        $this->SetFont('timesb', '', 11);
        $this->Cell(115, 6,"TỜ KHAI THUẾ GIÁ TRỊ GIA TĂNG(GTGT)", 0, 0, C);
        $this->SetFont('times', '', 9);
        $this->Cell(45, 6, '', 0, 0,C);

        $this->Ln(4);// xu?ng hàng bao nhiêu dong
        $this->SetFont('timesi', '', 10);
        $this->Cell(40, 6, '', 0, 0, R);
        $this->Cell(115, 6,"(Dành cho người nộp thuế GTGT theo phương pháp khấu trừ)", 0, 0, C);
        $this->SetFont('times', '', 9);
        $this->Cell(45, 6, '', 0, 0,C);

        $this->Ln(4);// xu?ng hàng bao nhiêu dong
        $this->SetFont('timesb', '', 10);
        $this->Cell(40, 6, '', 0, 0, R);
        $this->Cell(115, 6,"[01] Kỳ tính thuế : Quý 4 năm 2015", 0, 0, C);
        $this->SetFont('times', '', 9);
        $this->Cell(45, 6, '', 0, 0,C);

        $this->Ln(4);// xu?ng hàng bao nhiêu dong
        $this->SetFont('times', '', 10);
        $this->Cell(40, 6, '', 0, 0, R);
        $this->Cell(115, 6,"[02] Lần đầu [X] [03] Bổ sung lần thứ [  ]", 0, 0, C);
        $this->SetFont('times', '', 9);
        $this->Cell(45, 6, '', 0, 0,C);




        $this->Ln();// xu?ng hàng bao nhiêu dong

    }
    function Header()
    {
        /*$this->AddFont('times', '', 'vuTimes.ttf', true);
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

        $this->Cell(195, 4, "", B, 0, L);*/
    }
    function Footer()
    {
        // Go to 1.5 cm from bottom
        //$this->SetY(-5);
        // Select Arial italic 8
        ///$this->SetFont('Arial','I',8);
        // Print centered page number
       // $this->Cell(0,4,'Trang '.$this->PageNo(),0,0,'R');
    }

    function ImprovedTable($header, $data)
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
        $this->Cell(164, 4,"CÔNG TY XÂY DỰNG TRUNG THÀNH", '0', 'L');
        $this->SetFont('times', '', 9);

        $this->Ln(5);

        $this->Cell(10, 4, '   [05]', '0',R);// LTRB là border c?a cell
        $this->Cell(35, 4, 'Mã số thuế:', '0','L');// LTRB là border c?a cell
        $this->SetFont('timesb', '', 10);
        $this->Cell(170, 4, "", '0', 'L');

        $this->Ln(-0.5);
        $this->Cell(10, 4, '   ', '0',R);// LTRB là border c?a cell
        $this->Cell(35, 4, '', '0','L');// LTRB là border c?a cell

        $this->Cell(5.5, 4, '1', 'LTRB','L');// LTRB là border c?a cell
        $this->Cell(5.5, 4, '2', 'TRB','L');// LTRB là border c?a cell
        $this->Cell(5.5, 4, '3', 'TRB','L');// LTRB là border c?a cell
        $this->Cell(5.5, 4, '2', 'TRB','L');// LTRB là border c?a cell
        $this->Cell(5.5, 4, '2', 'TRB','L');// LTRB là border c?a cell
        $this->Cell(5.5, 4, '2', 'TRB','L');// LTRB là border c?a cell
        $this->Cell(5.5, 4, '2', 'TRB','L');// LTRB là border c?a cell
        $this->Cell(5.5, 4, '2', 'TRB','L');// LTRB là border c?a cell
        $this->Cell(5.5, 4, '2', 'TRB','L');// LTRB là border c?a cell
        $this->Cell(5.5, 4, '2', 'TRB','L');// LTRB là border c?a cell

        $this->Cell(3, 4, '', '0','L');// LTRB là border c?a cell

        $this->Cell(5.5, 4, '', ':LTRB','L');// LTRB là border c?a cell
        $this->Cell(5.5, 4, '', 'TRB','L');// LTRB là border c?a cell
        $this->Cell(5.5, 4, '', 'TRB','L');// LTRB là border c?a cell
        $this->SetFont('times', '', 9);

        $this->Ln(5);

        $this->Cell(10, 4, '   [06]', '0',R);// LTRB là border c?a cell
        $this->Cell(35, 4, 'Địa chỉ:', '0','L');// LTRB là border c?a cell
        $this->SetFont('timesb', '', 10);
        $this->Cell(175, 4,"Thành phố Trà Vinh ", '0', 'L');
        $this->SetFont('times', '', 9);
        $this->Ln(5);

        $this->Cell(10, 4, '   [07]', '0',R);// LTRB là border c?a cell
        $this->Cell(35, 4, 'Quận/Huyện:', '0');// LTRB là border c?a cell
        $this->SetFont('timesb', '', 10);
        $this->Cell(50, 4, "Trà Vinh", '0', 'L');
        $this->SetFont('times', '', 9);

        $this->Cell(28, 4, '[08]Tỉnh/Thành phố:', '0');// LTRB là border c?a cell
        $this->SetFont('timesb', '', 10);
        $this->Cell(62, 4, "Trà Vinh", '0', 'L');
        $this->SetFont('times', '', 9);

        $this->Ln(5);

        $this->Cell(10, 4, '   [09]', '0',R);// LTRB là border c?a cell
        $this->Cell(35, 4, 'Điện thoại:', '0');// LTRB là border c?a cell
        $this->SetFont('timesb', '', 10);
        $this->Cell(50, 4, "12312312313", '0', 'L');
        $this->SetFont('times', '', 9);

        $this->Cell(15, 4, '[10]Fax :', '0');// LTRB là border c?a cell
        $this->SetFont('timesb', '', 10);
        $this->Cell(25, 4, "131231", '0', 'L');
        $this->SetFont('times', '', 9);

        $this->Cell(15, 4, '[11]Email:', '0');// LTRB là border c?a cell
        $this->SetFont('timesb', '', 10);
        $this->Cell(52, 4,"dailythuechienthuat@gmail.com", '0', 'L');
        $this->SetFont('times', '', 9);

        $this->Ln(5);

        $this->Cell(10, 4, '   [12]', '0',R);// LTRB là border c?a cell
        $this->Cell(35, 4, 'Tên đại lý thuế(nếu có):', '0','L');// LTRB là border c?a cell
        $this->SetFont('timesb', '', 10);
        $this->Cell(153, 4, "Công ty kế toán Chiến Thuật", '0', 'L');
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

        $this->Cell(5.5, 4, '1', 'LTRB','L');// LTRB là border c?a cell
        $this->Cell(5.5, 4, '2', 'TRB','L');// LTRB là border c?a cell
        $this->Cell(5.5, 4, '3', 'TRB','L');// LTRB là border c?a cell
        $this->Cell(5.5, 4, '2', 'TRB','L');// LTRB là border c?a cell
        $this->Cell(5.5, 4, '2', 'TRB','L');// LTRB là border c?a cell
        $this->Cell(5.5, 4, '2', 'TRB','L');// LTRB là border c?a cell
        $this->Cell(5.5, 4, '2', 'TRB','L');// LTRB là border c?a cell
        $this->Cell(5.5, 4, '2', 'TRB','L');// LTRB là border c?a cell
        $this->Cell(5.5, 4, '2', 'TRB','L');// LTRB là border c?a cell
        $this->Cell(5.5, 4, '2', 'TRB','L');// LTRB là border c?a cell

        $this->Cell(3, 4, '', '0','L');// LTRB là border c?a cell

        $this->Cell(5.5, 4, '', ':LTRB','L');// LTRB là border c?a cell
        $this->Cell(5.5, 4, '', 'TRB','L');// LTRB là border c?a cell
        $this->Cell(5.5, 4, '', 'TRB','L');// LTRB là border c?a cell
        $this->SetFont('times', '', 9);

        $this->Ln(5);


        $this->Cell(10, 4, '   [14]', '0',R);// LTRB là border c?a cell
        $this->Cell(35, 4, 'Địa chỉ:', '0','L');// LTRB là border c?a cell
        $this->SetFont('timesb', '', 10);
        $this->Cell(175, 4, "Trà Vinh", '0', 'L');
        $this->SetFont('times', '', 9);

        $this->Ln(5);

        $this->Cell(10, 4, '   [15]', '0',R);// LTRB là border c?a cell
        $this->Cell(35, 4, 'Quận/Huyện:', '0');// LTRB là border c?a cell
        $this->SetFont('timesb', '', 10);
        $this->Cell(50, 4, "Trà Vinh", '0', 'L');
        $this->SetFont('times', '', 9);

        $this->Cell(28, 4, '[16]Tỉnh/Thành phố:', '0');// LTRB là border c?a cell
        $this->SetFont('timesb', '', 10);
        $this->Cell(62, 4, "Trà Vinh", '0', 'L');
        $this->SetFont('times', '', 9);

        $this->Ln(5);

        $this->Cell(10, 4, '   [17]', '0',R);// LTRB là border c?a cell
        $this->Cell(35, 4, 'Điện thoại:', '0');// LTRB là border c?a cell
        $this->SetFont('timesb', '', 10);
        $this->Cell(50, 4, "12312312313", '0', 'L');
        $this->SetFont('times', '', 9);

        $this->Cell(15, 4, '[18]Fax :', '0');// LTRB là border c?a cell
        $this->SetFont('timesb', '', 10);
        $this->Cell(25, 4, "131231", '0', 'L');
        $this->SetFont('times', '', 9);

        $this->Cell(15, 4, '[19]Email:', '0');// LTRB là border c?a cell
        $this->SetFont('timesb', '', 10);
        $this->Cell(52, 4,"dailythuechienthuat@gmail.com", '0', 'L');
        $this->SetFont('times', '', 9);

        $this->Ln(5);

        $this->Cell(10, 4, '   [20]', '0',R);// LTRB là border c?a cell
        $this->Cell(36, 4, 'Hợp đồng đại lý thuế: số', '0');// LTRB là border c?a cell
        $this->SetFont('timesb', '', 12);
        $this->Cell(52, 4, "321312312", '0', 'L');
        $this->SetFont('times', '', 10);

        $this->Cell(12, 4, 'Ngày:', '0');// LTRB là border c?a cell
        $this->SetFont('timesb', '', 10);
        $this->Cell(60, 4, "12/11/2016", '0', 'L');
        $this->SetFont('times', '', 9);


        $this->Ln(10);
        $this->SetFont('times', '', 7);
        $this->Cell(151,3,"Trường hợp được gia hạn:",'0',0,'L');// LTRB là border c?a cell
        $this->SetFont('timesb', '', 8);
        $this->Cell(50,3,"Đơn vị tiền: Đồng Việt Nam",'0',0,'R');
        $this->Ln(8);


        $this->SetFont('timesb', '', 10);
        $this->Cell(7,5,"",'0',0,'C');// LTRB là border c?a cell
        $this->Cell(122,5,"",'0',0,'C');// LTRB là border c?a cell

        $this->Cell(37,5,"chưa có thuế GTGT",'LTRB',0,'C');
        $this->Cell(20,5,"",'0',0,'C');
        $this->Cell(20,5,"",'0',0,'C');
        $this->Cell(30,5,"",'0',0,'C');
        $this->Ln(-5);

        $this->SetFont('timesb', '', 9);
        $this->Cell(7,10,"STT",'LTB',0,'C');// LTRB là border c?a cell
        $this->Cell(122,10,"Chỉ tiêu ",'LTB',0,'C');// LTRB là border c?a cell
        $this->Cell(37,5,"Giá trị HHDV",'LTB',0,'C');
        $this->Cell(35,10,"Thuế GTGT",'LTRB',0,'C');
        $this->Ln();
        // đặt hàm foreach ở đây
        $sott=1;
        $sodongtrongphieu =count($_SESSION['PhieuNhapXuatCT']);
        for($i=$sodongtrongphieu+1;$i<24;$i++){
            $_SESSION['PhieuNhapXuatCT'][$i]="";
        }
        $this->SetLineWidth(0.03);
        $this->Cell(7, 5,"A", 'LB', 0, 'C');// LTRB là border c?a cell
        $this->Cell(115, 5,"Không phát sinh hoạt động mua, bán trong kỳ(đánh dấu \"X\")", 'LRB', 0, 'L');// LTRB là border c?a cell
        $this->Cell(7, 5, "[21]", 'LB', 0, 'C');
        $this->Cell(37, 5, "", 'LB', 0, 'L');
        $this->Cell(35, 5, number_format($tiemCT['tienchietkhau']), 'LRB', 0, 'R');
        $this->Ln();

        $this->Cell(7, 5,"B", 'LB', 0, 'C');// LTRB là border c?a cell
        $this->Cell(159, 5,"Thuế giá trị gia tăng còn được khấu trừ kỳ trước chuyển sang", 'LB', 0, 'L');// LTRB là border c?a cell

        $this->Cell(7, 5,"[22]", 'LB', 0, 'C');
        $this->Cell(28, 5,"", 'LRB', 0, 'R');

        $this->Ln();

        $this->Cell(7, 5,"C", 'LB', 0, 'C');// LTRB là border c?a cell
        $this->Cell(194, 5,"Kê khai thuế GTGT phải nộp vào Ngan sách nhà nước", 'LRB', 0, 'L');// LTRB là border c?a cell

        $this->Ln();

        $this->Cell(7, 5,"I", 'LB', 0, 'C');// LTRB là border c?a cell
        $this->Cell(194, 5,"Hàng hóa, dịch vụ(HHDV) mua vào trong kỳ", 'LRB', 0, 'L');// LTRB là border c?a cell

        $this->SetFont('times', '', 9);
        $this->Ln();
        $this->Cell(7, 5,"1", 'LB', 0, 'C');// LTRB là border c?a cell
        $this->Cell(122, 5,"Giá trị và thuế GTGT của hàng hóa, dịch vụ mua vào", 'LB', 0, 'L');// LTRB là border c?a cell
        $this->Cell(7, 5, "[23]", 'LB', 0, 'C');
        $this->Cell(30, 5, "", 'LB', 0, 'L');
        $this->Cell(35, 5, number_format($tiemCT['tienchietkhau']), 'LRB', 0, 'R');

        $this->Ln();
        $this->Cell(7, 5,"2", 'LB', 0, 'C');// LTRB là border c?a cell
        $this->Cell(122, 5,"Tổng số thuế GTGT được khấu trừ trong kỳ này", 'LB', 0, 'L');// LTRB là border c?a cell
        $this->Cell(37, 5, "", 'LB', 0, 'L');
        $this->Cell(35, 5, number_format($tiemCT['tienchietkhau']), 'LRB', 0, 'R');
        $this->SetFont('timesb', '', 9);

        $this->Ln();

        $this->Cell(7, 5,"II", 'LB', 0, 'C');// LTRB là border c?a cell
        $this->Cell(194, 5,"Hàng hóa, dịch vụ bán ra trong kỳ", 'LRB', 0, 'L');// LTRB là border c?a cell

        $this->Ln();
        $this->SetFont('times', '', 9);
        $this->Cell(7, 5,"1", 'LB', 0, 'C');// LTRB là border c?a cell
        $this->Cell(122, 5,"Hàng hóa, dịch vụ bán ra không chịu thuế GTGT", 'LB', 0, 'L');// LTRB là border c?a cell
        $this->Cell(7, 5, "[26]", 'LB', 0, 'C');
        $this->Cell(30, 5, "", 'LB', 0, 'L');
        $this->Cell(35, 5, number_format($tiemCT['tienchietkhau']), 'LRB', 0, 'R');

        $this->Ln();
        $this->Cell(7, 5,"2", 'LB', 0, 'C');// LTRB là border c?a cell
        $this->Cell(122, 5,"Hàng hóa, dịch vụ bán ra chịu thuế GTGT([27]=[29]+[30]+[32]+[32a];[28]=[31]+[33])", 'LB', 0, 'L');// LTRB là border c?a cell
        $this->Cell(7, 5, "[27]", 'LB', 0, 'C');
        $this->Cell(30, 5, "", 'LB', 0, 'L');
        $this->Cell(7, 5, "", 'LB', 0, 'C');
        $this->Cell(28, 5, "", 'LRB', 0, 'R');

        $this->Ln();
        $this->Cell(7, 5,"a", 'LB', 0, 'C');// LTRB là border c?a cell
        $this->Cell(122, 5,"Hàng hóa, dịch vụ bán ra chịu thuế 0%", 'LB', 0, 'L');// LTRB là border c?a cell
        $this->Cell(7, 5, "[29]", 'LB', 0, 'C');
        $this->Cell(30, 5, "", 'LB', 0, 'L');
        $this->Cell(35, 5, number_format($tiemCT['tienchietkhau']), 'LRB', 0, 'R');
        $this->Ln();
        $this->Cell(7, 5,"b", 'LB', 0, 'C');// LTRB là border c?a cell
        $this->Cell(122, 5,"Hàng hóa, dịch vụ bán ra chịu thuế 5%", 'LB', 0, 'L');// LTRB là border c?a cell
        $this->Cell(7, 5, "[30]", 'LB', 0, 'C');
        $this->Cell(30, 5, "", 'LB', 0, 'L');
        $this->Cell(7, 5, "[31]", 'LB', 0, 'C');
        $this->Cell(28, 5, number_format($tiemCT['tienchietkhau']), 'LRB', 0, 'R');
        $this->Ln();
        $this->Cell(7, 5,"c", 'LB', 0, 'C');// LTRB là border c?a cell
        $this->Cell(122, 5,"Hàng hóa, dịch vụ bán ra chịu thuế 10%", 'LB', 0, 'L');// LTRB là border c?a cell
        $this->Cell(7, 5, "[32]", 'LB', 0, 'C');
        $this->Cell(30, 5, "", 'LB', 0, 'L');
        $this->Cell(7, 5, "[33]", 'LB', 0, 'C');
        $this->Cell(28, 5, number_format($tiemCT['tienchietkhau']), 'LRB', 0, 'R');
        $this->Ln();
        $this->Cell(7, 5,"d", 'LB', 0, 'C');// LTRB là border c?a cell
        $this->Cell(122, 5,"Hàng hóa, dịch vụ bán ra không chịu thuế", 'LB', 0, 'L');// LTRB là border c?a cell
        $this->Cell(7, 5, "[32a]", 'LB', 0, 'C');
        $this->Cell(30, 5, "", 'LB', 0, 'L');
        $this->Cell(7, 5, "", 'LB', 0, 'C');
        $this->Cell(28, 5, number_format($tiemCT['tienchietkhau']), 'LRB', 0, 'R');


        $this->Ln();
        $this->Cell(7, 5,"", 'L', 0, 'C');// LTRB là border c?a cell
        $this->Cell(122, 5,"Tổng doanh thu và thuế GTGT của HHDV bán ra ([34]=[26]+[27];[35]=[28])", 'L', 0, 'L');// LTRB là border c?a cell
        $this->Cell(7, 5, "", 'LR', 0, 'C');
        $this->Cell(30, 5, "", 'LR', 0, 'L');
        $this->Cell(7, 5, "", 'LR', 0, 'C');
        $this->Cell(28, 5, "", 'LR', 0, 'R');

        $this->Ln();
        $this->SetFont('timesb', '', 9);
        $this->Cell(7, 5,"III", 'LB', 0, 'C');// LTRB là border c?a cell
        $this->Cell(159, 5,"Thuế GTGT phát sinh trong kỳ ([36]=[35]-[25])", 'LRB', 0, 'L');// LTRB là border c?a cell

        $this->Cell(7, 5,"[36]", 'LB', 0, 'C');
        $this->Cell(28, 5,"", 'LRB', 0, 'R');

        $this->Ln();

        $this->Cell(7, 5,"VI", 'LB', 0, 'C');// LTRB là border c?a cell
        $this->Cell(194, 5,"Điều chỉnh tăng giảm thuế GTGT còn được khấu trừ các kỳ trước", 'LRB', 0, 'L');// LTRB là border c?a cell

        $this->Ln();
        $this->SetFont('times', '', 9);
        $this->Cell(7, 5,"1", 'LB', 0, 'C');// LTRB là border c?a cell
        $this->Cell(159, 5,"Điều chỉnh giảm", 'LB', 0, 'L');// LTRB là border c?a cell

        $this->Cell(7, 5,"[37]", 'LB', 0, 'C');
        $this->Cell(28, 5,"", 'LRB', 0, 'R');

        $this->Ln();

        $this->Cell(7, 5,"2", 'LB', 0, 'C');// LTRB là border c?a cell
        $this->Cell(159, 5,"Điều chỉnh tăng", 'LB', 0, 'L');// LTRB là border c?a cell

        $this->Cell(7, 5,"[38]", 'LB', 0, 'C');
        $this->Cell(28, 5,"", 'LRB', 0, 'R');

        $this->Ln();
        $this->SetFont('timesb', '', 9);

        $this->Cell(7, 5,"V", 'LB', 0, 'C');// LTRB là border c?a cell
        $this->Cell(159, 5,"Thuế GTGT đã nộp ở địa phương khác của hoạt động kinh doanh xây dựng, lắp đặt, bán hàng, bất động sản ngoại tỉnh", 'LRB', 0, 'L');// LTRB là border c?a cell

        $this->Cell(7, 5,"[36]", 'LB', 0, 'C');
        $this->Cell(28, 5,"", 'LRB', 0, 'R');

        $this->Ln();

        $this->Cell(7, 5,"VI", 'LB', 0, 'C');// LTRB là border c?a cell
        $this->Cell(194, 5,"Xác định nghĩa vụ thuế GTGT phải nộp trong kỳ", 'LRB', 0, 'L');// LTRB là border c?a cell

        $this->Ln();

        $this->Cell(7, 5,"1", 'LB', 0, 'C');// LTRB là border c?a cell
        $this->Cell(159, 5,"Thuế GTGT phải nộp của hoạt động sản xuất kinh doanh trong kỳ ([40a]=[36]-[22]+[37]-[38]-[39]>=0)", 'LRB', 0, 'L');// LTRB là border c?a cell

        $this->Cell(7, 5,"[36]", 'LB', 0, 'C');
        $this->Cell(28, 5,"", 'LRB', 0, 'R');

        $this->Ln();

        $this->Cell(7, 5,"2", 'LB', 0, 'C');// LTRB là border c?a cell
        $this->Cell(159, 5,"Thuế GTGT mua vào của các dự án đầu tư được bù trừ với thuế GTGT còn phải nộp của hoạt động sản xuất kinh doanh cùng kỳ tính thuế", 'LRB', 0, 'L');// LTRB là border c?a cell

        $this->Cell(7, 5,"[36]", 'LB', 0, 'C');
        $this->Cell(28, 5,"", 'LRB', 0, 'R');

        $this->Ln();

        $this->Cell(7, 5,"3", 'LB', 0, 'C');// LTRB là border c?a cell
        $this->Cell(159, 5,"Thuế GTGT còn phải nộp trong kỳ ([40]=[40a]-[40b])", 'LRB', 0, 'L');// LTRB là border c?a cell

        $this->Cell(7, 5,"[36]", 'LB', 0, 'C');
        $this->Cell(28, 5,"", 'LRB', 0, 'R');

        $this->Ln();

        $this->Cell(7, 5,"4", 'LB', 0, 'C');// LTRB là border c?a cell
        $this->Cell(159, 5,"Thuế GTGT chưa khấu trừ hết kỳ này (nếu [41]=[36]-[22]+[37]-[38]-[39]<0)", 'LRB', 0, 'L');// LTRB là border c?a cell

        $this->Cell(7, 5,"[36]", 'LB', 0, 'C');
        $this->Cell(28, 5,"", 'LRB', 0, 'R');
        $this->Ln();

        $this->Cell(7, 5,"4.1", 'LB', 0, 'C');// LTRB là border c?a cell
        $this->Cell(159, 5,"Tổng số thuế GTGT đề nghị hoàn", 'LRB', 0, 'L');// LTRB là border c?a cell

        $this->Cell(7, 5,"[36]", 'LB', 0, 'C');
        $this->Cell(28, 5,"", 'LRB', 0, 'R');

        $this->Ln();

        $this->Cell(7, 5,"4.2", 'LB', 0, 'C');// LTRB là border c?a cell
        $this->Cell(159, 5,"Thuế GTGT còn được khấu trừ chuyển kỳ sau ([43]=[41]-[42])", 'LRB', 0, 'L');// LTRB là border c?a cell

        $this->Cell(7, 5,"[36]", 'LB', 0, 'C');
        $this->Cell(28, 5,"", 'LRB', 0, 'R');

        $this->Ln();

        $this->Cell(201, 5,"Tôi cam đoan số liệu khai trên là đúng và chịu trách nhiệm trước pháp luật về số liệu đã khai./.", '0', 0, 'L');// LTRB là border c?a cell

        $this->Ln();

        $this->Cell(115, 4,"NHÂN VIÊN ĐẠI LÝ THUẾ", '0', 0, 'L');// LTRB là border c?a cell
        $this->SetFont('times', '', 9);
        $this->Cell(50, 4, 'Ngày 16 tháng 02 năm 2017', 0, 0, L);

        $this->Ln();
        $this->SetFont('times', '', 9);
        $this->SetFont('timesb', '', 9);
        $this->Cell(35, 4, 'Họ và tên :', 0, 0, L);
        $this->SetFont('times', '', 9);
        $this->Cell(65, 4, 'Trần Thiện Thuật', 0, 0, L);
        $this->SetFont('timesb', '', 9);
        $this->Cell(92, 4, 'NGƯỜI NỘP THUẾ hoặc', 0, 0, C);


        $this->Ln();
        $this->SetFont('timesb', '', 9);
        $this->Cell(35, 4, 'Chứng chỉ hành nghề số :', 0, 0, L);
        $this->SetFont('times', '', 9);
        $this->Cell(65, 4, '2011000948', 0, 0, L);
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

$pdf->TieuDe(dd_mm_yyy($data['ngayghiso']), $data['tkco'], $data['mapskt'], $data['sott'],$data['loaiphieu'],$data['tenphieu'],$tk1,$tk2);
$pdf->ImprovedTable($header, $data);
//debug($_SESSION['PhieuNhapXuatCT']);
echo $pdf->Output("BangThuChi_" .$data['sott']. ".pdf", "I");
?>