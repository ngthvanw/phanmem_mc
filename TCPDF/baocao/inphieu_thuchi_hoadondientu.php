<?php
session_start();
ob_start();
require_once('tcpdf_include.php');
$DATACTPHIEUGHISO = $_SESSION['PhieuGhiSo'];

$DATAPHIEUGHISO = $_SESSION['ChiTietPhieuGhiSo'];

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set default header data
//$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 006', PDF_HEADER_STRING);

// set header and footer fonts
//$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
$pdf->setPrintHeader(false);
// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(6, 5, 15);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, 10);

// set image scale factor
//$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
    require_once(dirname(__FILE__) . '/lang/eng.php');
    $pdf->setLanguageArray($l);
}

$pdf->SetFont('dejavuserifcondensed', '', 10);
foreach($DATACTPHIEUGHISO as $k=>$itemCTPHIEUGHISO){
$pdf->AddPage("");
$html_ct = "";
{
$html_title = '
  <tr>
    <td STYLE="border:0.5px solid #000;" width="200px" rowspan="2">&nbsp;<br/>Trích yếu</td>
    <td STYLE="border:0.5px solid #000;" width="110px" colspan="2">Số hiệu tại khoản</td>
    <td STYLE="border:0.5px solid #000;" width="80px" rowspan="2">&nbsp;<br/>Số tiền</td>
    <td STYLE="border:0.5px solid #000;" rowspan="2" width="180px">Ghi chú</td>
  </tr>
  <tr>
    <td STYLE="border:0.5px solid #000;">TK Nợ</td>
    <td STYLE="border:0.5px solid #000;" >TK Có</td>
  </tr>';
}
$sott = 0;
$tongno = 0;
$tongco = 0;
$tongtien=0;
foreach ($DATAPHIEUGHISO[$k] as $itemCT) {
	$tongtien+=$itemCT['gtvnd1'];
	$tongtien+=$itemCT['gtvnd2'];
     $html_ct .= '
        <tr >
        <td STYLE="border-top:0px solid #FFF;border-right:0.2px solid #000;border-left:0.5px solid #000;border-bottom: 0.5px dashed #000;"  align="left">';
    $html_ct .= $itemCT["noidung1"];
    $html_ct .= '</td><td STYLE="border-top:0px solid #FFF;border-right:0.2px solid #000;border-left:0.5px solid #000;border-bottom: 0.5px dashed #000;" align="center">';
        if($itemCTPHIEUGHISO['loaiphieu']==3) {
            $html_ct .=$itemCT["tkco"];
        }else{
            $html_ct .=$itemCT["tkno1"];
        }
    $html_ct.='</td><td STYLE="border-top:0px solid #FFF;border-right:0.2px solid #000;border-left:0.5px solid #000;border-bottom: 0.5px dashed #000;">';
        if($itemCTPHIEUGHISO['loaiphieu']==3) {
            $html_ct .=$itemCT["tkno1"];
        }else{
            $html_ct .=$itemCT["tkco"];
        }
    $html_ct.='</td>
        <td STYLE="border-top:0px solid #FFF;border-right:0.2px solid #000;border-left:0.5px solid #000;border-bottom: 0.5px dashed #000;" align="right">';
    $html_ct.=number_format($itemCT['gtvnd1'],0,",",".");
    $html_ct.='</td>
        <td STYLE="border-top:0px solid #FFF;border-right:0.2px solid #000;border-left:0.5px solid #000;border-bottom: 0.5px dashed #000;" align="left">';
    $html_ct.=$itemCT['chuthich'];
    $html_ct.='</td>
      </tr>';
	  if($itemCT['mand2']!="" && $itemCT['mand2']!=0){
		  $html_ct .= '
        <tr >
        <td STYLE="border-top:0px solid #FFF;border-right:0.2px solid #000;border-left:0.5px solid #000;border-bottom: 0.5px dashed #000;" align="left">';
    $html_ct .= $itemCT["noidung2"];
    $html_ct .= '</td><td STYLE="border-top:0px solid #FFF;border-right:0.2px solid #000;border-left:0.5px solid #000;border-bottom: 0.5px dashed #000;" align="center">';
        if($itemCTPHIEUGHISO['loaiphieu']==3) {
            $html_ct .=$itemCT["tkco"];
        }else{
            $html_ct .=$itemCT["tkno2"];
        }
    $html_ct.='</td><td STYLE="border-top:0px solid #FFF;border-right:0.2px solid #000;border-left:0.5px solid #000;border-bottom: 0.5px dashed #000;">';
        if($itemCTPHIEUGHISO['loaiphieu']==3) {
            $html_ct .=$itemCT["tkno2"];
        }else{
            $html_ct .=$itemCT["tkco"];
        }
    $html_ct.='</td><td STYLE="border-top:0px solid #FFF;border-right:0.2px solid #000;border-left:0.5px solid #000;border-bottom: 0.5px dashed #000;" align="right">';
    $html_ct.=number_format($itemCT['gtvnd2'],0,",",".");
    $html_ct.='</td>
        <td STYLE="border-top:0px solid #FFF;border-right:0.2px solid #000;border-left:0.5px solid #000;border-bottom: 0.5px dashed #000;" align="left">';
    $html_ct.=$itemCT['chuthich'];
    $html_ct.='</td>
      </tr>';
	  }
	   $sohd = $itemCT['sct'];
}

$html = '
<table width="105%" border="1" style="border-bottom: 1px solid #000">
  <tr>
    <td align="left" WIDTH="15%"></td>    
     <td align="left" WIDTH="40%"></td>
     <td align="left" WIDTH="25%"></td>
     <td align="left" WIDTH="20%">Mẫu số: 01GTKT2/001</td>
</tr>
 <tr>
    <td align="left" WIDTH="15%"></td>    
     <td align="left" WIDTH="40%">MST: 2100462770</td>
     <td align="left" WIDTH="25%">Điện thoại: 0294 1234567</td>
     <td align="left" WIDTH="20%">Ký hiệu: CT/11P</td>
</tr>
<tr>
    <td align="left" WIDTH="15%"></td>    
     <td align="left"  colspan="2" WIDTH="65%">A3/31 Phạm Ngũ Lão, Khóm 3, Phường 1, TP Trà Vinh, Tỉnh Trà Vinh</td>
     <td align="left" WIDTH="20%">Ký hiệu: CT/11P</td>
</tr>
</table>
</td>
    <td WIDTH="20%" align="left">Mẫu số: 01GTKT2/001</td>
  </tr>
</table>
<table><tr><td></td></tr></table>
<table border="0" align="center">
  <tr><td></td>
    <td><b>' . $DATACTPHIEUGHISO[$k]['tenphieu'] . '</b></td>
	<td align="right"><i>Mẫu số: S01-SKT/DNN</i></td>
  </tr>
  <tr>
  <td></td>
    <td>';
$time = strtotime($DATACTPHIEUGHISO[$k]['ngayghiso']);
$html .="Ngày ". date("d-m-Y", $time);
$html .= '</td>
<td align="right"><i>Ban hành theo quyết QĐ số : 1177-TC/QĐ/CĐKT</i></td>
  </tr>
  <tr><td></td>
    <td><table border="0">
		<tr>
			<td width="45%" align="right"><b> Số :   </b></td>
			<td width="30%" style="border-bottom: 0.5px dotted #000;">'. $DATACTPHIEUGHISO[$k]['mapskt'] . '</td>
		</tr>
	</table></td>
	<td align="right"><i>Ngày 23/12/1996 của bộ tài chính</i></td>
  </tr>
</table>
<table width="100%" border="0">
  <tr>
    <td align="right"></td>
  </tr>
</table>
<table border="0" cellpadding="2" cellspacing="0" align="center" valign="middle">' . $html_title . $html_ct . '
<tr>
    <td STYLE="border:0.5px solid #000;"></td>
    <td STYLE="border:0.5px solid #000;"><b>Tổng</b></td>
    <td STYLE="border:0.5px solid #000;"></td>
    <td align="right" STYLE="border:0.5px solid #000;"><b>' . number_format($tongtien,0,",",".") . '</b></td>
    <td align="right" STYLE="border:0.5px solid #000;"></td>
  </tr>
</table>
<table width="100%" cellpadding="2"><tr><td><i>Kèm theo </i><i style="border-bottom: 0.5px dashed #000;">'.$sohd.'</i> <i>chứng từ gốc</i></td></tr></table>
<table border="0"><tr><td></td></tr></table>

<table width="100%" border="0" cellpadding="2">
  <tr>
  <td align="center" width="35%">&nbsp;<br/>Người lập phiếu</td>
    <td align="center" width="35%"></td>
    <td width="30%" rowspan="2" align="center">
    <em>Ngày ';
$time = strtotime($DATACTPHIEUGHISO[$k]['ngaylap']);
$html .= date("d-m-Y", $time);
$html .= '</em><br/>kế toán trưởng</td>
  </tr>
  <tr>
    <td></td>
  </tr>
</table>';

$pdf->writeHTML($html, true, false, true, false, '');
}
$pdf->Output('bang_ke_hh_dichvu.pdf', 'I');
ob_end_flush(); 

