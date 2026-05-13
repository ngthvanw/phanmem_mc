<?php
session_start();
ob_start();
include("../../config.php");
// Optionally define the filesystem path to your system fonts

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
    function TieuDe($Ngay, $TKCo, $SoPhieu, $SoTT,$LoaiPhieu,$TenPhieu,$tk1,$tk2,$data)
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

        $this->SetFont('times', '', 10);
        $this->Ln(7);// xu?ng hàng bao nhiêu dong
        $this->SetFont('timesb', '', 14);
        $this->Cell(60, 4, '', 0, 0, R);

        $this->Cell(65, 4,$TenPhieu, 0, 0, C);
        $this->SetFont('times', '', 10);
        $this->Cell(60, 4, 'Mẫu số : 01-VT', 0, 0, R);

        $this->Ln(6);// xu?ng hàng bao nhiêu dong
        $this->SetFont('timesb', '', 12);
        $this->SetFont('timesi', '', 12);
        $this->Cell(60, 4, '', 0, 0, R);
        $this->Cell(65, 4, 'Ngày :'.$Ngay, 0, 0, C);
        $this->SetFont('times', '', 10);
        $this->Cell(25, 4, '', 0, 0, R);
        $this->Cell(52, 4, 'Định khoản', LTRB, 0, C);

        foreach ($_SESSION['DinhKhoanNo'][$data['sophieu']] as $k=>$ItemDK){
            $this->Ln();// xu?ng hàng bao nhiêu dong
            $this->SetFont('timesb', '', 10);
            $this->SetFont('timesi', '', 10);
            $this->Cell(60, 5, '', 0, 0, R);
            if($k==0) {
                $laythang = explode("-", $data['ngayghiso']);
                $this->Cell(65, 5, 'Số : ' . $data['mapskt'] . "/" . $laythang[1], 0, 0, C);
            }else{
                $this->Cell(65, 5, '', 0, 0, C);
            }
            $this->SetFont('times', '', 10);
            $this->Cell(25, 5, '', 0, 0, R);
            $dkarr = explode("*",$ItemDK);
            $this->Cell(21,5,$dkarr[0],'LR','C',false);
            $this->Cell(31,5,$dkarr[1],'LR','C',false);

        }
        foreach ($_SESSION['DinhKhoanCo'][$data['sophieu']] as $ItemDK){
            $this->Ln();// xu?ng hàng bao nhiêu dong
            $this->SetFont('timesb', '', 10);
            $this->SetFont('timesi', '', 10);
            $this->Cell(60, 5, '', 0, 0, R);
            $this->Cell(65, 5,'', 0, 0, C);
            $this->SetFont('times', '', 10);
            $this->Cell(25, 5, '', 0, 0, R);
            $dkarr = explode("*",$ItemDK);
            $this->Cell(21,5,"  ".$dkarr[0],'LTRB','0',false);
            $this->Cell(31,5,"  ".$dkarr[1],'LTRB','0',R);
            //$this->Ln();// xu?ng hàng bao nhiêu dong
        }
        $this->Ln(6);

    }

    function Footer()
    {
        // Go to 1.5 cm from bottom
        $this->SetY(-5);
        // Select Arial italic 8
        $this->SetFont('Arial','I',8);
        // Print centered page number
       // $this->Cell(0,4,'Trang '.$this->PageNo(),0,0,'R');
    }

    function ImprovedTable($header,$data,$datactphieu)
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
        $this->Cell(20, 4, 'Họ và Tên :', '0');// LTRB là border c?a cell
        $this->Cell(87, 4, substr($data['tenkh'],0,41), '0', 'L');

        $this->Cell(26, 4, 'Mã số thuế :', '0');// LTRB là border c?a cell
        $this->Cell(70, 4, $data['masothue'], '0', 'L');

        $this->Ln(1);
        $this->Cell(20, 4, '', '0');// LTRB là border c?a cell
        $this->Cell(170, 4,'.........................................................................................                                ..............................................................................', '0', 'L');

        //$this->Cell(20, 4, 'Địa chỉ:', '0');// LTRB là border c?a cell
        //$this->Cell(30, 4, $data['diachi'], 'B', 'L');

        $this->Ln(6);

        $this->Cell(27, 4, 'Địa chỉ(bộ phận):', '0');// LTRB là border c?a cell
        $this->Cell(158, 4, $data['diachi'], '0', 'L');

        $this->Ln(1);
        $this->Cell(27, 4, '', '0');// LTRB là border c?a cell
        $this->Cell(158, 4,'................................................................................................................................................................................................', '0', 'L');

        $this->Ln(6);

        $this->Cell(3, 4, 'Theo:', '0');// LTRB là border c?a cell
        $this->Cell(87, 4, $data['hopdong'], '0', 'L');

        $this->Cell(20, 4, 'Chứng từ số :', '0');// LTRB là border c?a cell
        $this->Cell(34, 4, $data['seri']." ".$data['sct'], '0', 'L');
        
        $this->Cell(10, 4, 'Ngày:', '0');// LTRB là border c?a cell
        $this->Cell(30, 4, dd_mm_yyy($data['ngayhoadon']), '0', 'L');

        $this->Ln(1);

        $this->Cell(8, 4, '', '0');// LTRB là border c?a cell
        $this->Cell(87, 4,'............................................................................................', '0', 'L');

        $this->Cell(14, 4, '', '0');// LTRB là border c?a cell
        $this->Cell(34, 4,'.......................................', '0', 'L');

        $this->Cell(10, 4, '', '0');// LTRB là border c?a cell
        $this->Cell(30, 4,'................................................', '0', 'L');

        $this->Ln(6);

        $this->Cell(20, 4, 'Nhập tại kho:', '0');// LTRB là border c?a cell
        $this->Cell(74, 4, 'Giá mua hàng hóa', '0', 'L');

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
        $w = array(1=>7,2=>75,3=>15,4=>12,5=>13,6=>17,7=>25,8=>15,9=>22);
        $this->SetFont('times', '', 10);
        $this->Cell($w[1],5,"",'0',0,'C');// LTRB là border c?a cell
        $this->Cell($w[2],5,"",'0',0,'C');// LTRB là border c?a cell
        $this->Cell($w[3],5,"",'0',0,'C');
        $this->Cell($w[4],5,"",'0',0,'C');
        $this->Cell($w[5],5,"TheoCT",'LTRB',0,'C');
        $this->Cell($w[6],5,"Thực nhập",'LTRB',0,'C');
        $this->Cell($w[7],5,"",'0',0,'C');
        $this->Cell($w[8],5,"",'0',0,'C');
        $this->Cell($w[9],5,"",'0',0,'C');
        $this->Ln(-5);

        $this->SetFont('times', '', 10);
        $this->Cell($w[1],10,"STT",'LTRB',0,'C');// LTRB là border c?a cell
        $this->Cell($w[2],10,"Tên, nhãn hiệu, quy cách ",'LTRB',0,'C');// LTRB là border c?a cell
        $this->Cell($w[3],10,"Mã số",'LTRB',0,'C');
        $this->Cell($w[4],10,"ĐVT",'LTRB',0,'C');
        $this->Cell($w[5]+$w[6],5,"Số lượng",'LTRB',0,'C');
        $this->Cell($w[7],10,"Đơn giá",'LTRB',0,'C');
        $this->Cell($w[8],10,"Chiết khấu",'LTRB',0,'C');
        $this->Cell($w[9],10,"Thành tiền",'LTRB',0,'C');
        $this->Ln();

        $this->Cell($w[1],5,"A",'LTRB',0,'C');// LTRB là border c?a cell
        $this->Cell($w[2],5,"B",'LTRB',0,'C');// LTRB là border c?a cell
        $this->Cell($w[3],5,"C",'LTRB',0,'C');
        $this->Cell($w[4],5,"D",'LTRB',0,'C');
        $this->Cell($w[5],5,"1",'LTRB',0,'C');
        $this->Cell($w[6],5,"2",'LTRB',0,'C');
        $this->Cell($w[7],5,"3",'LTRB',0,'C');
        $this->Cell($w[8],5,"4",'LTRB',0,'C');
        $this->Cell($w[9],5,"5",'LTRB',0,'C');
        $this->Ln();
        // đặt hàm foreach ở đây
        $sott=1;
        $sodongtrongphieu =count($datactphieu);
        for($i=$sodongtrongphieu+1;$i<24;$i++){
            $datactphieu[$i]="";
        }
        $dem=0;
    foreach ($datactphieu as $tiemCT) {
            if($tiemCT['tenvt']!=""){
                $this->Cell($w[1], 5, $sott, 'LR', 0, 'C');// LTRB là border c?a cell
                $this->Cell($w[2], 5, $tiemCT['tenvt'], 'LR', 0, 'L');// LTRB là border c?a cell
                $this->Cell($w[3], 5,$tiemCT['mavt'], 'LR', 0, 'C');
                $this->Cell($w[4], 5, $tiemCT['dvt'], 'LR', 0, 'C');
                $this->Cell($w[5], 5, "", 'LR', 0, 'L');
                $this->Cell($w[6], 5, number_format($tiemCT['soluongnhap'],2,',','.'), 'LR', 0, 'R');
                $this->Cell($w[7], 5, number_format($tiemCT['donggianhap'],2,',','.'), 'LR', 0, 'R');
                $this->Cell($w[8], 5, number_format($tiemCT['tienchietkhau'],0,',','.'), 'LR', 0, 'R');
                $this->Cell($w[9], 5, number_format($tiemCT['thanhtien'],0,',','.'), 'LR', 0, 'R');
                $this->Ln(0);

                $this->Cell(202, 5,'_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _', '0', 0, 'R');

                $dem++;
            }else{
                $this->Cell($w[1], 5,'', 'LR', 0, 'C');// LTRB là border c?a cell
                $this->Cell($w[2], 5, "", 'LR', 0, 'L');// LTRB là border c?a cell
                $this->Cell($w[3], 5,"", 'LR', 0, 'C');
                $this->Cell($w[4], 5, "", 'LR', 0, 'C');
                $this->Cell($w[5], 5, "", 'LR', 0, 'L');
                $this->Cell($w[6], 5, "", 'LR', 0, 'R');
                $this->Cell($w[7], 5, "", 'LR', 0, 'R');
                $this->Cell($w[8], 5, "", 'LR', 0, 'R');
                $this->Cell($w[9], 5, "", 'LR', 0, 'R');
                $this->Ln(0);

                $this->Cell(202, 5,'', '0', 0, 'R');

            }



        $this->Ln();
        $sott++;
    }
    if($dem<22) {
        $y = (($dem) * 5) + 100+2;
        $this->Line(4, $y, 80, $y);
        $this->Line(80, $y, 205, 212);
    }

        $this->SetFont('timesb', '', 10);
        $this->Cell($w[1],5,"",'LTRB',0,'C');// LTRB là border c?a cell
        $this->Cell($w[2],5,"Cộng tiền chiết khấu",'LTRB',0,'R');// LTRB là border c?a cell
        $this->Cell($w[3],5,"",'LTRB',0,'C');
        $this->Cell($w[4],5,"",'LTRB',0,'C');
        $this->Cell($w[5],5,"",'LTRB',0,'L');
        $this->Cell($w[6],5,"",'LTRB',0,'R');
        $this->Cell($w[7],5,"",'LTRB',0,'R');
        $this->Cell($w[8],5,"",'LTRB',0,'R');
        $this->Cell($w[9],5,number_format($data['tienchietkhau'],0,'.',','),'LTRB',0,'R');

        $this->Ln();

        $this->SetFont('timesb', '', 10);
        $this->Cell($w[1],5,"",'LTRB',0,'C');// LTRB là border c?a cell
        $this->Cell($w[2],5,"Cộng tiền hàng",'LTRB',0,'R');// LTRB là border c?a cell
        $this->Cell($w[3],5,"",'LTRB',0,'C');
        $this->Cell($w[4],5,"",'LTRB',0,'C');
        $this->Cell($w[5],5,"",'LTRB',0,'L');
        $this->Cell($w[6],5,"",'LTRB',0,'R');
        $this->Cell($w[7],5,"",'LTRB',0,'R');
        $this->Cell($w[8],5,"",'LTRB',0,'R');
        $this->Cell($w[9],5,number_format($data['tienhang'],0,',','.'),'LTRB',0,'R');

        $this->Ln();
        $this->Cell($w[1],5,"",'LTRB',0,'C');// LTRB là border c?a cell
        $this->Cell($w[2],5,"Thuế GTGT",'LTRB',0,'R');// LTRB là border c?a cell
        $this->Cell($w[3],5,"",'LTRB',0,'C');
        $this->Cell($w[4],5,"",'LTRB',0,'C');
        $this->Cell($w[5],5,"",'LTRB',0,'L');
        $this->Cell($w[6],5,"",'LTRB',0,'R');
        $this->Cell($w[7],5,"",'LTRB',0,'R');
        $this->Cell($w[8],5,"",'LTRB',0,'R');
        $this->Cell($w[9],5,number_format($data['tienthue'],0,',','.'),'LTRB',0,'R');

        $this->Ln();
        $this->Cell($w[1],5,"",'LTRB',0,'C');// LTRB là border c?a cell
        $this->Cell($w[2],5,"Phí môi trường",'LTRB',0,'R');// LTRB là border c?a cell
        $this->Cell($w[3],5,"",'LTRB',0,'C');
        $this->Cell($w[4],5,"",'LTRB',0,'C');
        $this->Cell($w[5],5,"",'LTRB',0,'L');
        $this->Cell($w[6],5,"",'LTRB',0,'R');
        $this->Cell($w[7],5,"",'LTRB',0,'R');
        $this->Cell($w[8],5,"",'LTRB',0,'R');
        $this->Cell($w[9],5,number_format($data['phimoitruong'],0,',','.'),'LTRB',0,'R');

        $this->Ln();
        $this->Cell($w[1],5,"",'LTRB',0,'C');// LTRB là border c?a cell
        $this->Cell($w[2],5,"Tổng cộng tiền thanh toán",'LTRB',0,'R');// LTRB là border c?a cell
        $this->Cell($w[3],5,"",'LTRB',0,'C');
        $this->Cell($w[4],5,"",'LTRB',0,'C');
        $this->Cell($w[5],5,"",'LTRB',0,'L');
        $this->Cell($w[6],5,"",'LTRB',0,'R');
        $this->Cell($w[7],5,"",'LTRB',0,'R');
        $this->Cell($w[8],5,"",'LTRB',0,'R');
        $this->Cell($w[9],5,number_format($data['tongcong'],0,',','.'),'LTRB',0,'R');

        if(number_format($data['chietkhaudoanhso'])!=0) {
            $this->Ln();
            $this->Cell($w[1], 5, "", 'LTRB', 0, 'C');// LTRB là border c?a cell
            $this->Cell($w[2], 5, "Chiết khấu doanh thu", 'LTRB', 0, 'R');// LTRB là border c?a cell
            $this->Cell($w[3], 5, "", 'LTRB', 0, 'C');
            $this->Cell($w[4], 5, "", 'LTRB', 0, 'C');
            $this->Cell($w[5], 5, "", 'LTRB', 0, 'L');
            $this->Cell($w[6], 5, "", 'LTRB', 0, 'R');
            $this->Cell($w[7], 5, "", 'LTRB', 0, 'R');
            $this->Cell($w[8], 5, "", 'LTRB', 0, 'R');
            $this->Cell($w[9], 5, number_format($data['chietkhaudoanhso'], 0, ',', '.'), 'LTRB', 0, 'R');
        }



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
        $this->Cell(46, 3, 'Ngày '.($_SESSION['THONGTINPHIEUCD']['ngaylap']), 0, 0, C);
        $this->Ln(4);
        $this->Cell(46, 3, 'Người lập phiếu', 0, 0, C);
        $this->Cell(46, 3, 'Người nhận', 0, 0, C);
        $this->Cell(46, 3, 'Thủ kho', 0, 0, C);
        $this->Cell(46, 3, 'Hiệu trưởng', 0, 0, C);
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

$pdf->AddFont('times', '', 'vuTimes.ttf', true);
$pdf->SetFont('times', '', 14);
$pdf->AddFont('timesb', '', 'vuTimesBold.ttf', true);
$pdf->SetMargins(4, 1, 0.3, 0);
$pdf->SetAutoPageBreak(true, 0);

$data_tieude = $_SESSION['PhieuNhapXuat'];
foreach ($data_tieude as $data) {
    $pdf->AddPage('P', 'A4');
    $pdf->PageNo();
$loaiphieu = $data['loaiphieu'];
if($loaiphieu==1){
    $tk1="Có ";
    $tk2="Nợ ";
}
if($loaiphieu==2){
    $tk1="Nợ ";
    $tk2="Có ";
}
$sophieu = trim($data['sophieu']);
$datactphieu = $_SESSION['PhieuNhapXuatCT'][$sophieu];
$pdf->TieuDe(dd_mm_yyy($data['ngayghiso']), $data['tkco'], $data['mapskt'], $data['sott'],$_SESSION['THONGTINPHIEUCD']['loaiphieu'],$_SESSION['THONGTINPHIEUCD']['tenphieu'],$tk1,$tk2,$data);
$pdf->ImprovedTable($header, $data,$datactphieu);
$pdf->Footer();
}
$pdf->Output("BangThuChi_" .$data['sott']. ".pdf", "I");
ob_end_flush(); 
?>