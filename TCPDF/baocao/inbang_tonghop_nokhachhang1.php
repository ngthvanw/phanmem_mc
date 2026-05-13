<?php
session_start();
require_once('tcpdf_include.php');
$DATACIBANRA = $_SESSION["LISTTONGHOPNO"];

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
$pdf->SetMargins(6, 2, 6);
//$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, 10);

// set image scale factor
//$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

$pdf->SetFont('dejavuserifcondensed', '', 8);
$pdf->AddPage("L");
$html_ct="";
$html_title='
  <tr>
    <td STYLE="border:0.5px solid #000;" width="35px" rowspan="2">&nbsp;<br/>STT</td>
    <td STYLE="border:0.5px solid #000;" width="60px" rowspan="2">&nbsp;<br/>Mã số</td>
    <td STYLE="border:0.5px solid #000;" width="200px" rowspan="2">&nbsp;<br/>Họ tên</td>
	<td STYLE="border:0.5px solid #000;" width="30px" rowspan="2">&nbsp;<br/>Số hiệu TK</td>
    <td STYLE="border:0.5px solid #000;" width="160px" colspan="2">Số dư đầu năm</td>
    <td STYLE="border:0.5px solid #000;" width="160px" colspan="2">Số phát sinh trong năm</td>
    <td STYLE="border:0.5px solid #000;" colspan="2" width="160px">Số dư cuối năm</td>
  </tr>
  <tr>
    <td STYLE="border:0.5px solid #000;">Nợ</td>
    <td STYLE="border:0.5px solid #000;" >Có</td>
    <td STYLE="border:0.5px solid #000;">Nợ</td>
    <td STYLE="border:0.5px solid #000;" >Có</td>
    <td STYLE="border:0.5px solid #000;">Nợ</td>
    <td STYLE="border:0.5px solid #000;" >Có</td>
  </tr>';
$sott=0;
$tongdoanhthu=0;
$tongthue=0;
    foreach ($DATACIBANRA as $itemCT) {
        //if ($itemCT['CAP']<=$_SESSION["THONGTINPHIEU"]['incaptk']) {
        $sott++;
        $tongdoanhthu += $itemCT["thanhtien"];
        $tongthue += $itemCT["thue"];
        $html_ct .= '
        <tr >
        <td STYLE="border:0.5px solid #000;" >' . $sott . '</td>
        <td STYLE="border:0.5px solid #000;">' . strtoupper($itemCT["makh"]) . '</td>
        <td align="left" STYLE="border:0.5px solid #000;">' . $itemCT["tenkh"] . '</td>
		<td align="center" STYLE="border:0.5px solid #000;">' . $itemCT["matk"] . '</td>
        <td align="right" STYLE="border:0.5px solid #000;">';
        if ($itemCT["tongduno"] != 0) {
            $html_ct .= $soduno=(number_format($itemCT["tongduno"] != 0) ? number_format($itemCT["tongduno"]):"");
        } else {
            $html_ct .= $soduno=(number_format($itemCT["soduno"] != 0) ? number_format($itemCT["soduno"]):"");
        }
        $html_ct .= '</td>
        <td  STYLE="border:0.5px solid #000;" align="right">';
        if ($itemCT["tongduco"] != 0) {
            $html_ct .= $soduco=(number_format($itemCT["tongduco"] != 0) ? number_format($itemCT["tongduco"]):"");
        } else {
            $html_ct .= $soduco=(number_format($itemCT["soduco"] != 0) ? number_format($itemCT["soduco"]):"");
        }
        $html_ct .= '</td>
        <td align="right" STYLE="border:0.5px solid #000;">';
        if ($itemCT["tongdunops"] != "" || $itemCT["tongdunops"] != 0) {
            $html_ct .= $sodunops=(number_format($itemCT["tongdunops"] != 0) ? number_format($itemCT["tongdunops"]):"");
        } else {
            $html_ct .= $sodunops=(number_format($itemCT["sodunops"] != 0) ? number_format($itemCT["sodunops"]):"");
        }
        $html_ct .= '</td>
        <td align="right" STYLE="border:0.5px solid #000;">';
        if ($itemCT["tongducops"] != "" || $itemCT["tongdunops"] != 0) {
            $html_ct .= $soducops=(number_format($itemCT["tongducops"] != 0) ? number_format($itemCT["tongducops"]):"");
        } else {
            $html_ct .= $soducops=(number_format($itemCT["soducops"] != 0) ? number_format($itemCT["soducops"]):"");
        }
        $html_ct .= '</td>
        <td align="right" STYLE="border:0.5px solid #000;" align="right">';
        // Xử lý Nợ cuối
            $soduno = str_replace(",","",$soduno);
            $soduco = str_replace(",","",$soduco);
            $sodunops = str_replace(",","",$sodunops);
            $soducops = str_replace(",","",$soducops);
			
            $soducktinh = ($soduno+$sodunops) - ($soduco+$soducops);
            if($soducktinh>=0){
				$sodunock = ($soduno+$sodunops) - ($soduco+$soducops);
                $html_ct.=(number_format($sodunock) != 0) ? number_format($sodunock):"";
            }else{
                
            }
        $html_ct .= '</td>
        <td align="right" STYLE="border:0.5px solid #000;" align="right">';
            if($soducktinh>=0){
            }else{
                $soducock = ($soduco+$soducops) - ($soduno+$sodunops);
                $html_ct.=(number_format($soducock) != 0) ? number_format($soducock):"";
            }
        $html_ct .= '</td>
      </tr>';
            $tongducodk +=$itemCT["soduco"];
            $tongdunodk +=$itemCT["soduno"];

            $tongducops +=$itemCT["soducops"];
            $tongdunops +=$itemCT["sodunops"];

            $tongducock +=$itemCT["tongducock"];
            $tongdunock +=$itemCT["tongdunock"];
   // }
}

$html = '
<table width="100%" border="0" style="border-bottom: 1px solid #000">
  <tr>
    <td align="left" WIDTH="55%"><B>'.$_SESSION["TenCongTy"].'</B><br/>'.$_SESSION["DiaChi"].'</td>    
    <td align="center" WIDTH="20%"></td>
    <td WIDTH="25%">
    <table border="0">
    
   <tr>
   <td align="right"><br/>MST:'.$_SESSION["MST"].'</td>
</tr>

</table>
    
</td>
  </tr>
</table>
<table><tr><td></td></tr></table>
<table border="0" align="left">
  <tr>
    <td><b>'.$_SESSION["THONGTINPHIEU"]['tenphieu'].'</b></td>
  </tr>
  <tr>
    <td><b>'.$_SESSION["THONGTINPHIEU"]['ngayhoadon'].'</b></td>
  </tr>
</table>
<table width="100%" border="0">
  <tr>
    <td align="right"></td>
  </tr>
</table>
<table border="0" cellpadding="2" cellspacing="0" align="center" valign="middle">'.$html_title.$html_ct.'
<tr>
    <td STYLE="border:0.5px solid #000;"></td>
    <td STYLE="border:0.5px solid #000;"></td>
    <td STYLE="border:0.5px solid #000;"><b>Tổng</b></td>
	<td STYLE="border:0.5px solid #000;"></td>
    <td align="right" STYLE="border:0.5px solid #000;"><b>'.number_format($tongdunodk).'</b></td>
    <td align="right" STYLE="border:0.5px solid #000;"><b>'.number_format($tongducodk).'</b></td>
    <td align="right" STYLE="border:0.5px solid #000;"><b>'.number_format($tongdunops).'</b></td>
    <td align="right" STYLE="border:0.5px solid #000;"><b>'.number_format($tongducops).'</b></td>
    <td align="right" STYLE="border:0.5px solid #000;"><b>'.number_format($tongdunock).'</b></td>
     <td align="right" STYLE="border:0.5px solid #000;"><b>'.number_format($tongducock).'</b></td>
  </tr>
</table>
<table><tr><td></td></tr></table>

<table width="100%" border="0" cellpadding="2">
  <tr>
  <td align="center" width="35%">&nbsp;<br/>Người lập phiếu</td>
    <td align="center" width="35%">&nbsp;<br/>Kế toán trưởng</td>
    <td width="30%" rowspan="2" align="center">
    <em>Trà Vinh Ngày ';
$time = strtotime($_SESSION["THONGTINPHIEU"]['ngaylap']);
$html.=date("d-m-Y",$time);
$html.='</em><br/>Giám đốc
   </td>
  </tr>
  <tr>
    <td></td>
  </tr>
</table>
';
$pdf->writeHTML($html, true, false, true, false, '');
//$pdf->writeHTMLCell(0, 0, '', '', $html, 'LRTB', 1, 0, true, 'L', true);

//$pdf->lastPage();

$pdf->Output('bang_ke_hh_dichvu.pdf', 'I');

