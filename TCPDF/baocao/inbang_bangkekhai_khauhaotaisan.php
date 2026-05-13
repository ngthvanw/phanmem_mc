<?php
session_start();
require_once('tcpdf_include.php');
$DATADSKHAUHAOTS = $_SESSION['DSKHAUHAOTAISAN'];

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
if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
    require_once(dirname(__FILE__) . '/lang/eng.php');
    $pdf->setLanguageArray($l);
}

$pdf->SetFont('dejavuserifcondensed', '', 8);
$pdf->AddPage("L");
$html_ct = "";
$html_title = '
 <tr>
    <td width="20px" rowspan="2" STYLE="border:0.5px solid #000;">&nbsp;<br/>
      STT</td>
    <td width="50px" rowspan="2" STYLE="border:0.5px solid #000;">&nbsp;<br/>
      Mã số</td>
    <td width="160px" rowspan="2" STYLE="border:0.5px solid #000;">&nbsp;<br/>Tên tài sản</td>
    <td width="40px" rowspan="2" STYLE="border:0.5px solid #000;">&nbsp;<br/>ĐVT</td>
    <td width="40px" rowspan="2" STYLE="border:0.5px solid #000;">Tỷ lệ KH(%)</td>
    <td width="60px" rowspan="2" STYLE="border:0.5px solid #000;"  >&nbsp;<br/>Nguyên giá</td>
    <td STYLE="border:0.5px solid #000;" width="60px" rowspan="2">&nbsp;<br/>Số khấu hao</td>
    <td colspan="6" STYLE="border:0.5px solid #000;">Chia ra các đối tượng chi phí</td>
  </tr>
   <tr>
    <td STYLE="border:0.5px solid #000;"  >TK 1541</td>
    <td STYLE="border:0.5px solid #000;"  >TK 1547</td>
    <td STYLE="border:0.5px solid #000;">TK 6421</td>
    <td STYLE="border:0.5px solid #000;" >TK 6422</td>
    <td STYLE="border:0.5px solid #000;" ></td>
    <td STYLE="border:0.5px solid #000;" ></td>
  </tr>
  ';
$sott = 0;
foreach ($DATADSKHAUHAOTS as $itemCT) {
    $sott++;
    $html_ct .= '
        <tr >
        <td STYLE="border:0.5px solid #000;" >' . $sott . '</td>
        <td STYLE="border:0.5px solid #000;">' . strtoupper($itemCT["mats"]) . '</td>
        <td align="left" STYLE="border:0.5px solid #000;">' . $itemCT["tents"] . '</td>
        <td align="right" STYLE="border:0.5px solid #000;">';
    if ($itemCT["tongduno"] != 0) {
        $html_ct .= $soduno = (number_format($itemCT["tongduno"] != 0) ? number_format($itemCT["tongduno"]) : "");
    } else {
        $html_ct .= $soduno = (number_format($itemCT["soduno"] != 0) ? number_format($itemCT["soduno"]) : "");
    }
    $html_ct .= '</td>
        <td  STYLE="border:0.5px solid #000;" align="right">';
    if ($itemCT["tongduco"] != 0) {
        $html_ct .= $soduco = (number_format($itemCT["tongduco"] != 0) ? number_format($itemCT["tongduco"]) : "");
    } else {
        $html_ct .= $soduco = (number_format($itemCT["soduco"] != 0) ? number_format($itemCT["soduco"]) : "");
    }
    $html_ct .= '</td>
        <td align="right" STYLE="border:0.5px solid #000;">';
    if ($itemCT["tongdunops"] != "" || $itemCT["tongdunops"] != 0) {
        $html_ct .= $sodunops = (number_format($itemCT["tongdunops"] != 0) ? number_format($itemCT["tongdunops"]) : "");
    } else {
        $html_ct .= $sodunops = (number_format($itemCT["sodunops"] != 0) ? number_format($itemCT["sodunops"]) : "");
    }
    $html_ct .= '</td>
        <td align="right" STYLE="border:0.5px solid #000;">';
    if ($itemCT["tongducops"] != "" || $itemCT["tongducops"] != 0) {
        $html_ct .= $soducops = (number_format($itemCT["tongducops"] != 0) ? number_format($itemCT["tongducops"]) : "");
    } else {
        $html_ct .= $soducops = (number_format($itemCT["soducops"] != 0) ? number_format($itemCT["soducops"]) : "");
    }
    $html_ct .= '</td>
        <td align="right" STYLE="border:0.5px solid #000;" align="right">';
    // Xử lý Nợ cuối
    $soduno = str_replace(",", "", $soduno);
    $soduco = str_replace(",", "", $soduco);
    $sodunops = str_replace(",", "", $sodunops);
    $soducops = str_replace(",", "", $soducops);

    //if ($itemCT["CAP"] == 1 || $itemCT["CAP"] == 2 || $itemCT["CAP"] == 3 ) {
    $sodunock = ($soduno + $sodunops) - ($soduco + $soducops);
    if ($sodunock >= 0) {
        $html_ct .= (number_format($sodunock) != 0) ? number_format($sodunock) : "";
    } else {
        $soducock = ($soduco + $soducops) - ($soduno + $sodunops);
        //$html_ct.=(number_format($soducock) != 0) ? number_format($soducock):"";
    }
    //$html_ct .= number_format($soduno + $sodunops - $soducops);
    // }
    $html_ct .= '</td>
        <td align="right" STYLE="border:0.5px solid #000;" align="right">';
    $sodunock = ($soduno + $sodunops) - ($soduco + $soducops);
    if ($sodunock >= 0) {
        //$html_ct.=(number_format($sodunock) != 0) ? number_format($sodunock):"";
    } else {
        $soducock = ($soduco + $soducops) - ($soduno + $sodunops);
        $html_ct .= (number_format($soducock) != 0) ? number_format($soducock) : "";
    }
    $html_ct .= '</td>
      </tr>';
}

$html = '
<table width="100%" border="0" style="border-bottom: 1px solid #000">
  <tr>
    <td align="left" WIDTH="55%"><B>' . $_SESSION["TenCongTy"] . '</B><br/>' . $_SESSION["DiaChi"] . '<br/>MST:' . $_SESSION["MST"] . '</td>    
    <td align="center" WIDTH="20%"></td>
    <td WIDTH="25%">
    <table border="0">
    
   <tr>
   <td align="center"><i>Mẫu số S24-SKT/DNN<br/>
        (Ban hành theo quyết định số 1177-TC/QĐ/CĐKT ngày 23/12/1996 của Bộ Tài Chính)</i>
   </td>
</tr>

</table>
    
</td>
  </tr>
</table>
<table><tr><td></td></tr></table>
<table border="0" align="center">
  <tr>
    <td><b>' . $_SESSION["THONGTINPHIEU"]['tenphieu'] . '</b></td>
  </tr>
  <tr>
    <td><b>' . $_SESSION["THONGTINPHIEU"]['ngayhoadon'] . '</b></td>
  </tr>
</table>
<table width="100%" border="0">
  <tr>
    <td align="right"></td>
  </tr>
</table>
<table border="0" cellpadding="2" cellspacing="0" align="center" valign="middle">' . $html_title . $html_ct . '

</table>
<table><tr><td></td></tr></table>

<table width="100%" border="0" cellpadding="2">
  <tr>
  <td align="center" width="35%">Người lập biểu</td>
    <td align="center" width="35%"></td>
    <td width="30%" rowspan="2" align="center">
    <em>Ngày ';
$time = strtotime($_SESSION["THONGTINPHIEU"]['ngaylap']);
$html .= date("d-m-Y", $time);
$html .= '</em><br/>Kế toán trưởng
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

