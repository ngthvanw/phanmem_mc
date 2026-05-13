<?php
require('../../pdf/fpdf.php');

class PDF extends FPDF
{
// Load data
function LoadData($file)
{
    // Read file lines
    $lines = file($file);
    $data = array();
    foreach($lines as $line)
        $data[] = explode(';',trim($line));
    return $data;
}

// Simple table
function Header()
{
    // Logo
    $this->SetX(5);
     $this->SetY(10);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Move to the right
    // Title
    $this->Cell(280,5,'BẢNG KÊ HÓA ĐƠN, CHỨNG TỪ HÀNG HÓA, DỊCH VỤ MUA VÀO',1,0,'C');
    $this->Ln();// xuống hàng bao nhiêu dong
    $this->Cell(280,5,'(Kèo theo tờ khai thuế GTGT mẫ số 01/GTGT ngày 16/02/2017)',1,0,'C');
    $this->Ln();// xuống hàng bao nhiêu dong
    $this->Cell(280,5,'[01] Kỳ tính thuế: Tháng 01 năm 2017 ',1,0,'C');
    // Line break
    $this->Ln(50);// xuống hàng bao nhiêu dong
}
// Better table
function ImprovedTable($header, $data)
{
    // Column widths
    $w = array(40, 50, 40, 45);
    // Header
    for($i=0;$i<count($header);$i++)
        $this->Cell($w[$i],7,$header[$i],1,0,'C');
    $this->Ln();
    // Data
    foreach($data as $row)
    {
        $this->Cell($w[0],6,$row[0],'LR');
        $this->Cell($w[1],6,$row[1],'LR');
        $this->Cell($w[2],6,number_format($row[2]),'LR',0,'R');
        $this->Cell($w[3],6,number_format($row[3]),'LR',0,'R');
        $this->Ln();
    }
    // Closing line
    $this->Cell(array_sum($w),0,'','T');
}
}

$pdf = new PDF();
// Column headings
$header = array('Country', 'Capital', 'Area (sq km)', 'Pop. (thousands)');
// Data loading
$data = $pdf->LoadData('../../pdf/data.txt');

$pdf->AddFont('vuArial','','vuArial.php',true);
$pdf->SetFont('vuArial','',14);

$pdf->AddPage("L");
$pdf->ImprovedTable($header,$data);

$pdf->Output();
?>