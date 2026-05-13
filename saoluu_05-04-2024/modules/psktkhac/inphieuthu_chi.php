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
        foreach($lines as $line)
            $data[] = explode(";",trim($line));
        return $data;
    }

    // Simple table
    function TieuDe($NgayGhiSo,$NgayLap,$SoPhieu,$TenPhieu)
    {
        $this->AddFont('times','','vuTimes.ttf',true);
        $this->AddFont('timesi','','vuTimesItalic.ttf',true);
        $this->SetFont('times','',10);

        $tendn = ($_SESSION['TenCongTy']);
        $DiaChi = ($_SESSION['DiaChi']);
        $MST = ($_SESSION['MST']);

        $this->Cell(90,4,''."",0,0,L);// Lên công ty
        $this->SetFont('times','',9);
        $this->Cell(105,4,'',0,0,R);

        $this->Ln(4);// xu?ng hàng bao nhiêu dong
        $this->SetFont('timesb','',12);
        $this->Cell(90,4,''.$tendn,0,0,L);// Lên công ty
        $this->SetFont('times','',9);
        $this->Cell(105,4,'',0,0,R);

        $this->Ln(4);// xu?ng hàng bao nhiêu dong
        $this->Cell(90,4,$DiaChi ." - ".$MST,0,0,L);
        $this->Cell(105,4,'MST: '.$MST,0,0,R);
        $this->Ln(0);

        $this->Cell(195,4,"",B,0,L);
        $this->SetFont('timesi','',10);
        $this->Ln(7);// xu?ng hàng bao nhiêu dong
        $this->SetFont('timesb','',14);
        $this->Cell(120,4,'',0,0,R);
        $this->SetFont('timesi','',10);
        $this->Cell(75,3,'Mẫu số: S01-SKT/DNN',0,0,R);

        $this->SetFont('timesi','',10);
        $this->Ln(4);// xu?ng hàng bao nhiêu dong
        $this->SetFont('timesb','',14);
        $this->Cell(60,4,'',0,0,R);
        $this->Cell(52,4,$TenPhieu,0,0,C);
        $this->SetFont('timesi','',9);
        $this->Cell(75,3,'Ban hành theo quyết QĐ số : 1177-TC/QĐ/CĐKT',0,0,R);

        $this->Ln(4);// xu?ng hàng bao nhiêu dong
        $this->SetFont('timesb','',12);
        $this->SetFont('timesi','',12);
        $this->Cell(110,3,'',0,0,R);
        $this->SetFont('timesi','',9);
        $this->Cell(85,3,'Ngày 23/12/1996 của bộ tài chính',0,0,R);

        $this->Ln(3);// xu?ng hàng bao nhiêu dong
        $this->SetFont('timesb','',12);
        $this->SetFont('timesi','',12);
        $this->Cell(70,4,'',0,0,R);
        $this->Cell(30,4,'Ngày '.$NgayGhiSo,0,0,C);
        $this->SetFont('times','',9);
        $this->Cell(85,3,'',0,0,R);

        $this->Ln(6);// xu?ng hàng bao nhiêu dong
        $this->SetFont('timesb','',12);
        $this->SetFont('timesi','',12);
        $this->Cell(70,4,'',0,0,R);
        $this->Cell(10,4,'Số :',0,0,C);
        $this->Cell(20,4,$SoPhieu,0,0,C);

        $this->SetFont('times','',9);
        $this->Cell(85,3,'',0,0,R);

        $this->Ln(.7);// xu?ng hàng bao nhiêu dong
        $this->SetFont('timesb','',12);
        $this->SetFont('timesi','',12);
        $this->Cell(70,4,'',0,0,R);
        $this->Cell(10,4,'','0',0,'R');
        $this->Cell(20,4,'....................','0',0,'R');

        $this->SetFont('times','',9);
        $this->Cell(85,3,'',0,0,R);

        $this->Ln(5);// xu?ng hàng bao nhiêu dong

    }
    function ImprovedTable($data,$NgayLap)
    {
        $this->SetDrawColor(0,0,0);
        $this->SetLineWidth(0.1);
        $this->SetFont('times','',11);
        // Column widths
        $w = array(10,40);
        // Header
        $this->Cell(65,5,"",'LTR',0,'C');// LTRB là border c?a cell
        $this->Cell(40,5,"Số hiệu tài khoản",'TB',0,'C');
        $this->Cell(30,5,"",'LTR',0,'C');
        $this->Cell(60,5,"",'LTR',0,'C');
        $this->Ln(5);
        $this->Cell(65,5,"Trích yếu",'LRB',0,'C');// LTRB là border c?a cell
        $this->Cell(20,5,"TK nợ",'TB',0,'C');
        $this->Cell(20,5,"TK có",'TB',0,'C');
        $this->Cell(30,5,"Số tiền",'LB',0,'C');
        $this->Cell(60,5,"Ghi chú",'LRB',0,'C');
        $this->Ln();
        // Data
        $tongtien =0;
        foreach($data as $k=>$row)
        {

            $this->SetLineWidth(.1);
            $this->Cell(65,5,"-".$row['noidung1'],'LR');// LTRB là border c?a cell
            
			if($row['loaiphieu']==3){
					$this->Cell(20,5,$row['tkno1'],'R',0,'C');
            $this->Cell(20,5,($row['tkco']),'R',0,'C');
				}else{
					
					
            $this->Cell(20,5,($row['tkco']),'R',0,'C');
			$this->Cell(20,5,$row['tkno1'],'R',0,'C');
				}
            $this->Cell(30,5,number_format($row['gtvnd1'],0,",","."),'R',0,'R');
            $this->Cell(60,5,($row['chuthich']),'R',0,'C');
            $this->Ln();
            for($i=0;$i<=97;$i++){// Tạo line --- trong bảng
                $this->Cell(1,0.1,($row['t4']),'B',0,'C');
                $this->Cell(1,0.1,($row['t4']),'0',0,'C');
            }
            $tongtien+=$row['gtvnd1'];

            $this->Ln();
            $tongtien+=$row['gtvnd'];
            if($row['mand2']!="" && $row['mand2']!=0){
                $this->Cell(65,5,"-".$row['noidung2'],'LR');// LTRB là border c?a cell
				if($row['loaiphieu']==3){
					$this->Cell(20,5,$row['tkno2'],'R',0,'C');
					$this->Cell(20,5,($row['tkco']),'R',0,'C');
				}else{
					
					$this->Cell(20,5,($row['tkco']),'R',0,'C');
					$this->Cell(20,5,$row['tkno2'],'R',0,'C');
				}
                $this->Cell(30,5,(number_format($row['gtvnd2'],0,",",".")),'R',0,'R');
                $this->Cell(60,5,($row['chuthich']),'R',0,'C');
                $tongtien+=$row['gtvnd2'];
                $this->Ln();
                for($i=0;$i<=97;$i++){// Tạo line --- trong bảng
                    $this->Cell(1,0.1,($row['t4']),'B',0,'C');
                    $this->Cell(1,0.1,($row['t4']),'0',0,'C');
                }
                $this->Ln();
            }
            $sohd = $row['sct'];
        }
        $this->SetFont('timesb','',10);
        $this->Cell(65,5,"Tổng cộng",'LTRB',0,"R");// LTRB là border c?a cell
        $this->Cell(20,5,"",'LTRB',0,'C');
        $this->Cell(20,5,"",'LTRB',0,'C');
        $this->Cell(30,5,number_format($tongtien,0,",","."),'LTRB',0,'R');
        $this->Cell(60,5,"",'LTRB',0,'C');
        $this->Ln();


        $this->Ln(3);
        $this->SetFont('timesi','',10);
        $this->Cell(16,3,'Kèm theo',0,0,L);
        $this->Cell(17,3,$sohd,0,0,C);
        $this->Cell(30,3,'chứng từ gốc',0,0,L);
        $this->Ln(0.7);
        $this->Cell(16,3,'',0,0,L);
        $this->Cell(17,3,'.....................',0,0,C);
        $this->Cell(30,3,'',0,0,L);

        $this->SetFont('times','',10);
        $this->Ln(8);
        $this->Cell(97,3,'',0,0,C);

        $this->Cell(97,3,'Ngày '.$NgayLap,0,0,C);
        $this->Ln(4);
        $this->Cell(97,3,'Người lập biểu',0,0,C);

        $this->Cell(97,3,'Kế toán trường',0,0,C);
        $this->Cell(97,3,'Kế toán trường',0,0,C);
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
$pdf->SetMargins(7, 1,0.3,0);
$pdf->SetAutoPageBreak(TRUE, 0);
$i=0;
    $data = $_SESSION['PhieuGhiSo'];
    $pdf->AddPage('P','A4');
    //debug($_SESSION['ChiTietPhieuGhiSo']);
    $pdf->TieuDe(dd_mm_yyy($data['ngayghiso']),$data['ngaylap'],$data['mapskt'],$data['tenphieu']);
    $pdf->ImprovedTable($_SESSION['ChiTietPhieuGhiSo'],($data['ngaylap']));
    $i++;
$pdf->Output("phieuhachtoan_".khu_dau_vn($manhom).".pdf", "I");
ob_end_flush();
?>