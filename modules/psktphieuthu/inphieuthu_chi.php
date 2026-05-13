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
        foreach($lines as $line)
            $data[] = explode(";",trim($line));
        return $data;
    }
    
    // Simple table
    function TieuDe($Ngay,$TKCo,$SoPhieu,$SoTT)
    {
        $this->AddFont('times','','vuTimes.ttf',true);
        $this->AddFont('timesi','','vuTimesItalic.ttf',true);
        $this->SetFont('times','',10);

        $tendn = ($_SESSION['TenCongTy']);
        $DiaChi = ($_SESSION['DiaChi']);
        $MST = ($_SESSION['MST']);

        $this->Cell(90,4,''."",0,0,L);// Lên công ty
        $this->SetFont('times','',9);
        $this->Cell(105,4,'Mấu số: 01-TT ',0,0,R);
        
        $this->Ln(4);// xu?ng hàng bao nhiêu dong
        $this->SetFont('timesb','',12);
        $this->Cell(90,4,''.$tendn,0,0,L);// Lên công ty
        $this->SetFont('times','',9);
        $this->Cell(105,4,'Ban hành theo quyết định số : 48/2016 QĐ-BCT ',0,0,R);

        $this->Ln(4);// xu?ng hàng bao nhiêu dong
        $this->Cell(90,4,$DiaChi ." - ".$MST,0,0,L);
        $this->Cell(105,4,'Ngày 14/9/2006 của Bộ Tài Chính ',0,0,R);
        $this->Ln(0);

        $this->Cell(195,4,"",B,0,L);

        $this->SetFont('times','',10);
        $this->Ln(7);// xu?ng hàng bao nhiêu dong
        $this->SetFont('timesb','',14);
        $this->Cell(110,4,'PHIẾU THU',0,0,R);
        $this->SetFont('times','',10);
        $this->Cell(85,4,'Quyển số:__________',0,0,R);

        $this->Ln(6);// xu?ng hàng bao nhiêu dong
        $this->SetFont('timesb','',12);
        $this->SetFont('timesi','',12);
        $this->Cell(110,4,'Ngày '.$Ngay,0,0,R);
        $this->SetFont('times','',10);
        $this->Cell(85,4,'Số:'.$SoPhieu."/".$SoTT,0,0,R);
        $TKNoMaND1=0;
        $TKNoMaND2=0;
        $GTVNDND1=0;
        $GTVNDND2=0;

        $this->Ln(6);// xu?ng hàng bao nhiêu dong
        $this->Cell(151,20,'',0,0,C);
        $this->Cell(15,20,'',LTRB,L);
        $this->Cell(30,20,'',LTRB,0,R);

        $this->Ln(0);// xu?ng hàng bao nhiêu dong
        $array_tkno=array();
        foreach ($_SESSION['ChiTietPhieuThuChi'] as $Item_chitiet){// Cộng các tài khoản trùng nhau và xuất vào 1 màng
            if(array_key_exists ($Item_chitiet['tkco_mand'],$array_tkno)) {
                $gtvnd = $array_tkno[$Item_chitiet['tkco_mand']]+$Item_chitiet['gtvnd'];
                $array_tkno[$Item_chitiet['tkco_mand']]=$gtvnd;

            }else{
                $array_tkno[$Item_chitiet['tkco_mand']]=$Item_chitiet['gtvnd'];
            }
            if(array_key_exists ($Item_chitiet['tkco_mand2'],$array_tkno)) {
                $gtvnd2 = $array_tkno[$Item_chitiet['tkco_mand2']]+$Item_chitiet['gtvnd2'];
                $array_tkno[$Item_chitiet['tkco_mand2']]=$gtvnd2;

            }else{
                $array_tkno[$Item_chitiet['tkco_mand2']]=$Item_chitiet['gtvnd2'];
            }

        }
        $soTK =count($array_tkno);
        $TongTKCo = 0;
        foreach ($array_tkno as $ItemNo=>$valueNo){
            $this->Cell(151,5,'',0,0,C);
            $this->Cell(15,5,'Có '.$ItemNo,0,L);
            $this->Cell(30,5,number_format($valueNo),0,0,R);
            $TongTKCo+=$valueNo;
            $this->Ln(5);// xu?ng hàng bao nhiêu dong
        }
        //debug($array_tkno);
        $this->Ln(20-($soTK*5));// xu?ng hàng bao nhiêu dong
        $this->Cell(151,5,'',0,0,C);
        $this->Cell(15,5,'Nợ '.$TKCo,LTRB,L);
        $this->Cell(30,5,number_format($TongTKCo),LTRB,0,R);

        
        
        $this->Ln(5);// xu?ng hàng bao nhiêu dong

    }
    function ImprovedTable($header, $data)
    {
        $this->SetDrawColor(0,0,0);
        $this->SetLineWidth(0.1);
        $this->SetFont('times','',11);
        // Column widths
        $w = array(10,40);
        // Header
        for($i=0;$i<count($header);$i++){
            $this->Cell($w[$i],7,$header[$i],1,0,'C');
            }
        $this->Ln();
        // Data

        $this->SetLineWidth(.1);
        $this->Cell(46,4,'Họ và Tên người nộp tiền:','0');// LTRB là border c?a cell
        $this->Cell(150,4,$data['tenkh'].' - Mã Số:'.$data['makh'],'B','L');
        $this->Ln(7);

        $this->Cell(14,4,'Địa chỉ:','0');// LTRB là border c?a cell
        $this->Cell(182,4,$data['diachi'],'B','L');
        $this->Ln(7);

        $this->Cell(18,4,'Lý do nộp:','0');// LTRB là border c?a cell
        $this->Cell(178,4,$data['chuthich'],'B','L');
        $this->Ln(7);

        $this->Cell(14,4,'Số tiền:','0');// LTRB là border c?a cell
        $this->Cell(182,4,$data['tonggtvn'],'B','L');
        $this->Ln(7);

        $this->Cell(18,4,'Bằng chữ:','0');// LTRB là border c?a cell
        $tien = convert_number_to_words(str_replace(",","",$data['tonggtvn']));
        $this->Cell(178,4,($tien)." đồng",'B','L');
        $this->Ln(7);

        $this->Cell(18,4,'Kèm theo:','0');// LTRB là border c?a cell
        $this->Cell(178,4,'1 Chứng từ gốc','B','L');
        // Closing line

        $this->SetFont('times','',10);
        $this->Ln(8);
        $this->Cell(38,3,'Giám đốc',0,0,C);
        $this->Cell(38,3,'Kế toán trưởng',0,0,C);
        $this->Cell(38,3,'Người nhận tiền',0,0,C);
        $this->Cell(38,3,'Người lập phiếu',0,0,C);
        $this->Cell(38,3,'Thủ quỹ',0,0,C);
        $this->Ln(20);

        $this->Cell(50,4,'Đã nhận đủ số tiền(viết bằng chữ):','0');// LTRB là border c?a cell
        $this->Cell(146,4,($tien)." đồng",'B','L');
        $this->Ln(7);

        $this->Cell(50,4,'- Tỷ giá ngoại tệ(vàng,bạc,đá,quý):','0');// LTRB là border c?a cell
        $this->Cell(146,4,'','B','L');
        $this->Ln(7);

        $this->Cell(26,4,'- Số tiền qui đổi:','0');// LTRB là border c?a cell
        $this->Cell(170,4,'','B','L');
        $this->Ln(7);
    }
}
$pdf = new PDF();

// Column headings
//$header = array('STT', 'Họ và Tên');
//$pdf->AddPage();

// Add a Unicode font (uses UTF-8)
$pdf->PageNo();
$pdf->AddFont('times','','vuTimes.ttf',true);
$pdf->SetFont('times','',14);
$pdf->AddFont('timesb','','vuTimesBold.ttf',true);
$pdf->SetMargins(5, 1,0.3,0);
$pdf->SetAutoPageBreak(TRUE, 0);
$i=0;
foreach($_SESSION['PhieuThuChi'] as $item_data){// Duyết data theo tuân
    $data = $item_data;
    $pdf->AddPage('P','A4');

    $pdf->TieuDe(dd_mm_yyy($item_data['date']),$data['tkno'],$data['mapskt'],$data['sott']);
    $pdf->ImprovedTable($header,$data);
    $i++;
}
echo $pdf->Output("bangluong_".khu_dau_vn($manhom).".pdf", "I");
?>