<?php

// Optionally define the filesystem path to your system fonts
// otherwise tFPDF will use [path to tFPDF]/font/unifont/ directory
// define("_SYSTEM_TTFONTS", "C:/Windows/Fonts/");

require('tfpdf.php');
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
    function Header()
    {
        // Logo
        // Arial bold 15
        $this->AddFont('times','','vuTimes.ttf',true);
        $this->SetFont('times','',14);
        // Move to the right
        //$this->Cell(1);
        // Title
        $this->Cell(178,10,'BÁO CÁO KẾT QUẢ HOẶT ĐỘNG SẢN XUẤT KINH DOANH',0,0,C);

        $this->Ln(10);// xu?ng hàng bao nhiêu dong
        // Title
        $this->AddFont('times','','vuTimesItalic.ttf',true);
        $this->SetFont('times','',12);
        $this->Cell(185,10,'Đơn vị tiền : đồng Việt Nam',0,0,R);

            //$this->Cell(1);
        // Title
        // Line break
        $this->Ln(10);// xu?ng hàng bao nhiêu dong
    }
    function BasicTable($header, $data)
    {
       $w = array(40, 35, 40, 45);
        // Header
        foreach($header as $col)
            $this->Cell(40,7,$col,1);
        $this->Ln();
        // Data
        foreach($data as $row)
        {
            foreach($row as $col)
                $this->Cell(40,6,$col,1);
            $this->Ln();
        }
    }
    
    // Better table
    function ImprovedTable($header, $data)
    {
        $this->SetDrawColor(0,0,0);
        $this->SetLineWidth(0.1);
        // Column widths
        $w = array(50, 50, 40, 45);
        // Header
        for($i=0;$i<count($header);$i++){
            $this->Cell($w[$i],7,$header[$i],1,0,'C');
            }
        $this->Ln();
        // Data
        foreach($data as $k=>$row)
        {
            if($k!=0){ // không xuất hàng đầu tiên trong data 
                $this->SetLineWidth(.1);
                $this->Cell($w[0],6,$row[0],'LTRB');// LTRB là border c?a cell
                $this->Cell($w[1],6,$row[1],'LTRB');
                $this->Cell($w[2],6,number_format($row[2]),'LTRB',0,'R');
                $this->Cell($w[3],6,number_format($row[3]),'LTRB',0,'R');
                $this->Ln();
            }
        }
        // Closing line
         $this->Ln(10);
        //$this->Cell(array_sum($w),0,'','T');
        $this->AddFont('timesb','','vuTimesBold.ttf',true);
        $this->SetFont('timesb','',10);
        $this->Cell(50,3,'Người lập biểu',0,0,C);
         $this->Ln(5);
        $this->SetFont('times','',10);
        $this->Cell(50,3,'(Ký,Ghi rõ họ tên)',0,0,C);
    }
    
    // Colored table
    function FancyTable($header, $data)
    {
        // Colors, line width and bold font
        $this->SetFillColor(245,245,245);
        $this->SetTextColor(0);
        $this->SetDrawColor(0,0,0);
        $this->SetLineWidth(.1);
        //$this->SetFont('','B');
        // Header
        $w = array(55, 40, 50, 45);
        for($i=0;$i<count($header);$i++)
        $this->Cell($w[$i],7,$header[$i],1,0,'C',true);
        $this->Ln();
        // Color and font restoration
        $this->SetFillColor(224,235,255);
        $this->SetTextColor(0);
        $this->SetFont('');
        //$this->Line(10,20,100,20);
        // Data
        $fill = false;
        foreach($data as $row)
        {
            $this->Cell($w[0],6,$row[0],'LR',0,'L',$fill);
            $this->Cell($w[1],6,$row[1],'LR',0,'L',$fill);
            $this->Cell($w[2],6,number_format($row[2]),'LR',0,'C',$fill);
            $this->Cell($w[3],6,number_format($row[3]),'LR',0,'C',$fill);
            $this->Ln();
            $fill = !$fill;
        }
        // Closing line
        $this->Cell(array_sum($w),0,'','T');
        $this->Ln();        
    }
}
$pdf = new PDF();

// Column headings
$header = array('Quốc gia', 'Thành phố', 'Area (sq km)', 'Pop. (thousands)');
//$pdf->AddPage();

// Add a Unicode font (uses UTF-8)
$pdf->AddFont('times','','vuTimes.ttf',true);
$pdf->SetFont('times','',14);

// Load a UTF-8 string from a file and print it
//$txt = file_get_contents('HelloWorld.txt');
//$pdf->Write(8,$txt);
$data = $pdf->LoadData('HelloWorld.txt');

// Select a standard font (uses windows-1252)
$pdf->AddPage();
$pdf->ImprovedTable($header,$data);
echo $pdf->Output();
?>