<?php
session_start();
require_once('tcpdf_include.php');
$DATACISONHATKY = $_SESSION["LISTCTSONHATKY"];

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
$pdf->SetMargins(6, 5, 8);
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
foreach ($DATACISONHATKY as $itemTK){
$pdf->AddPage("");
$html_ct = "";
$html_title = '
  <tr>
    <td STYLE="border:0.5px solid #000;" width="20px" rowspan="2">&nbsp;<br/>STT</td>
    <td STYLE="border:0.5px solid #000;" width="30px" rowspan="2">Ngày ghi sổ</td>
    <td STYLE="border:0.5px solid #000;" width="90px" colspan="2">Chứng từ</td>
    <td STYLE="border:0.5px solid #000;" width="180px" rowspan="2">&nbsp;<br/>Diễn giải</td>
	<td STYLE="border:0.5px solid #000;" width="90px" colspan="2">Nhật ký chung</td>
    <td STYLE="border:0.5px solid #000;" width="30px" rowspan="2">TK dối ứng</td>
    <td STYLE="border:0.5px solid #000;" colspan="2" width="120px">Số tiền</td>
  </tr>
  <tr>
    <td STYLE="border:0.5px solid #000;" >Số hiệu</td>
    <td STYLE="border:0.5px solid #000;" >Ngày</td>
    <td STYLE="border:0.5px solid #000;">Trang số</td>
    <td STYLE="border:0.5px solid #000;" >STT dòng</td>
	<td STYLE="border:0.5px solid #000;">Nợ</td>
    <td STYLE="border:0.5px solid #000;" >Có</td>
  </tr>';
$sott = 0;
$tongno = 0;
$tongco = 0;
foreach ($itemTK as $itemCT) {
    $sott++;
    $tongno+=$itemCT['tienno1']+$itemCT['tienno2'];
    $tongco+=$itemCT['tienco1']+$itemCT['tienco2'];
    $html_ct .= '
        <tr >
        <td STYLE="border-top:0px solid #FFF;border-right:0.2px solid #000;border-left:0.5px solid #000;border-bottom: 0.5px dashed #000;" >' . $itemCT["sophieu"] . '</td>
        <td STYLE="border-top:0px solid #FFF;border-right:0.2px solid #000;border-left:0.5px solid #000;border-bottom: 0.5px dashed #000;">';
    $timeghiso = strtotime($itemCT["ngayghiso"]);
    $html_ct .= date("d-m", $timeghiso);
    $html_ct .= '</td>
        <td STYLE="border-top:0px solid #FFF;border-right:0.2px solid #000;border-left:0.5px solid #000;border-bottom: 0.5px dashed #000;">' . $itemCT["sct"] . '</td>
        <td STYLE="border-top:0px solid #FFF;border-right:0.2px solid #000;border-left:0.5px solid #000;border-bottom: 0.5px dashed #000;">';
    $time = strtotime($itemCT["ngayhoadon"]);
    $html_ct .= date("d-m", $time);
    $html_ct .= '</td>
        <td STYLE="border-top:0px solid #FFF;border-right:0.2px solid #000;border-left:0.5px solid #000;border-bottom: 0.5px dashed #000;" align="left">' . $itemCT["noidung1"] . '</td>
		        <td STYLE="border-top:0px solid #FFF;border-right:0.2px solid #000;border-left:0.5px solid #000;border-bottom: 0.5px dashed #000;"></td>
        <td STYLE="border-top:0px solid #FFF;border-right:0.2px solid #000;border-left:0.5px solid #000;border-bottom: 0.5px dashed #000;"></td>

	   <td STYLE="border-top:0px solid #FFF;border-right:0.2px solid #000;border-left:0.5px solid #000;border-bottom: 0.5px dashed #000;">' . $itemCT["tk1"] . '</td>
        <td STYLE="border-top:0px solid #FFF;border-right:0.2px solid #000;border-left:0.5px solid #000;border-bottom: 0.5px dashed #000;" align="right">';
    $tienno1 = ($itemCT["tienno1"] == 0) ? "": number_format($itemCT["tienno1"]);
    $html_ct.=$tienno1;
    $html_ct.='</td>
        <td STYLE="border-top:0px solid #FFF;border-right:0.2px solid #000;border-left:0.5px solid #000;border-bottom: 0.5px dashed #000;" align="right">';
    $tienco1 = ($itemCT["tienco1"] == 0) ? "": number_format($itemCT["tienco1"]);
    $html_ct.=$tienco1;
    $html_ct.='</td>
      </tr>';
   /* if (number_format($itemCT["tk2"])!=0) {
        $html_ct .= '
        <tr >
        <td STYLE="border-top:0px solid #FFF;border-right:0.2px solid #000;border-left:0.5px solid #000;border-bottom: 0.5px dashed #000;" >' . $itemCT["sophieu"] . '</td>
        <td STYLE="border-top:0px solid #FFF;border-right:0.2px solid #000;border-left:0.5px solid #000;border-bottom: 0.5px dashed #000;">'
        ;
        $timeghiso = strtotime($itemCT["ngayghiso"]);
        $html_ct .= date("d-m", $timeghiso);
        $html_ct .= '</td>
        <td STYLE="border-top:0px solid #FFF;border-right:0.2px solid #000;border-left:0.5px solid #000;border-bottom: 0.5px dashed #000;">' . $itemCT["sct"] . '</td>
        <td STYLE="border-top:0px solid #FFF;border-right:0.2px solid #000;border-left:0.5px solid #000;border-bottom: 0.5px dashed #000;">';
        $time = strtotime($itemCT["ngayhoadon"]);
        $html_ct .= date("d-m", $time);
        $html_ct .= '</td>
        <td STYLE="border-top:0px solid #FFF;border-right:0.2px solid #000;border-left:0.5px solid #000;border-bottom: 0.5px dashed #000;" align="left">' . $itemCT["noidung2"] . '</td>
                <td STYLE="border-top:0px solid #FFF;border-right:0.2px solid #000;border-left:0.5px solid #000;border-bottom: 0.5px dashed #000;"></td>
        <td STYLE="border-top:0px solid #FFF;border-right:0.2px solid #000;border-left:0.5px solid #000;border-bottom: 0.5px dashed #000;"></td>

		<td STYLE="border-top:0px solid #FFF;border-right:0.2px solid #000;border-left:0.5px solid #000;border-bottom: 0.5px dashed #000;">' . $itemCT["tk2"] . '</td>
        <td STYLE="border-top:0px solid #FFF;border-right:0.2px solid #000;border-left:0.5px solid #000;border-bottom: 0.5px dashed #000;" align="right">';
        $tienno1 = ($itemCT["tienno2"] == 0) ? "": number_format($itemCT["tienno2"]);
        $html_ct.=$tienno1;
        $html_ct.='</td>
        <td STYLE="border-top:0px solid #FFF;border-right:0.2px solid #000;border-left:0.5px solid #000;border-bottom: 0.5px dashed #000;" align="right">';
        $tienco1 = ($itemCT["tienco2"] == 0) ? "": number_format($itemCT["tienco2"]);
        $html_ct.=$tienco1;
        $html_ct.='</td>
      </tr>';
}*/
}

$html = '
<table width="100%" border="0" style="border-bottom: 1px solid #000">
  <tr>
    <td align="left" WIDTH="55%"><B>' . $_SESSION["TenCongTy"] . '</B><br/>' . $_SESSION["DiaChi"] . '<br/>MST:' . $_SESSION["MST"] . '</td>    
    <td align="center" WIDTH="20%"></td>
    <td WIDTH="25%">
    <table border="0">
    
   <tr>
   <td align="center"><i>Mẫu số 01-1/GTGT<br/>
        (Ban hành kèm theo thông tư số 26/12/2011 của Bộ Tài Chính)</i>
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
    <td>' . $_SESSION["THONGTINPHIEU"]['ngayhoadon'] . '</td>
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
    <td STYLE="border:0.5px solid #000;"></td>
    <td STYLE="border:0.5px solid #000;"></td>
	 <td STYLE="border:0.5px solid #000;"></td>
    <td STYLE="border:0.5px solid #000;"></td>
    <td STYLE="border:0.5px solid #000;"></td>
    <td STYLE="border:0.5px solid #000;"><b>Tổng</b></td>
    <td STYLE="border:0.5px solid #000;"></td>
    <td align="right" STYLE="border:0.5px solid #000;"><b>' . number_format($tongno) . '</b></td>
    <td align="right" STYLE="border:0.5px solid #000;"><b>' . number_format($tongco) . '</b></td>
  </tr>
</table>
<table width="100%" cellpadding="2"><tr><td>Ghi chú: Tất cả số phát sinh đã ghi vào sổ cái</td></tr></table>
<table><tr><td></td></tr></table>

<table width="100%" border="0" cellpadding="2">
  <tr>
  <td align="center" width="35%">&nbsp;<br/>Người ghi sổ</td>
    <td align="center" width="35%">&nbsp;<br/>Kế toán trưởng</td>
    <td width="30%" rowspan="2" align="center">
    <em>Ngày ';
$time = strtotime($_SESSION["THONGTINPHIEU"]['ngaylap']);
$html .= date("d-m-Y", $time);
$html .= '</em><br/>Giám đốc
   </td>
  </tr>
  <tr>
    <td></td>
  </tr>
</table>
';
$pdf->writeHTML($html, true, false, true, false, '');
}
//$pdf->writeHTMLCell(0, 0, '', '', $html, 'LRTB', 1, 0, true, 'L', true);

//$pdf->lastPage();

$pdf->Output('bang_ke_hh_dichvu.pdf', 'I');

