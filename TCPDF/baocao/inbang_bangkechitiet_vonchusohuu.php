<?php
session_start();
require_once('tcpdf_include.php');
$DATADSKHAUHAOTS = $_SESSION['DSKHAUHAOTAISAN'];
$DATADSKHAUHAOTSTK = $_SESSION['DSKHAUHAOTAISANTK'];
// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->setFontSubsetting(false);
// set default header data
//$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 006', PDF_HEADER_STRING);

// set header and footer fonts
//$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
$pdf->setPrintHeader(false);
// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(10, 2, 8);
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
    <td STYLE="border:0.5px solid #000;" width="30px" rowspan="1">&nbsp;<br/>STT</td>
    <td STYLE="border:0.5px solid #000;" width="250px" rowspan="1">&nbsp;<br/>Tên sáng lập viên</td>
    <td STYLE="border:0.5px solid #000;" width="90px" rowspan="1">&nbsp;<br/>Vốn điều lệ đầu kỳ</td>
    <td STYLE="border:0.5px solid #000;" width="90px" rowspan="1">Vốn điều lệ tăng/giảm trong kỳ</td>
    <td  STYLE="border:0.5px solid #000;" width="50px" rowspan="1">&nbsp;<br/>Tỷ lệ</td>
    <td  STYLE="border:0.5px solid #000;" width="90px" rowspan="1">&nbsp;<br/>Vốn đã góp đầu kỳ</td>
    <td STYLE="border:0.5px solid #000;" width="90px" rowspan="1">&nbsp;<br/>Tăng vốn/Rút vốn trong kỳ</td>
    <td width="90px" STYLE="border:0.5px solid #000;" rowspan="1">Vốn chưa góp</td>
  </tr>';
$sott = 0;
$tongdoanhthu = 0;
$tongthue = 0;
foreach ($DATADSKHAUHAOTS as $itemCT) {
	$indam="";
    if (number_format($itemCT["nguyengia"]) != 0){
        $sott++;
    if ($itemCT['matscha'] == "0") {
        $nguyengia += $itemCT["nguyengia"];
        $tongsokh += $itemCT["sokh"];
		$indam="font-weight:bold;";
    }
    $html_ct .= '
        <tr >
        <td STYLE="border-left:0.5px solid #000;border-right:0.5px solid #000;border-top:0.5px dashed #000;border-bottom:0px dashed #fff;'.$indam.'" >' . $sott . '</td>
        <td STYLE="border-left:0.5px solid #000;border-right:0.5px solid #000;border-top:0.5px dashed #000;border-bottom:0px dashed #fff;'.$indam.'" align="left">' . strtoupper($itemCT["mats"]) . '</td>
        <td STYLE="border-left:0.5px solid #000;border-right:0.5px solid #000;border-top:0.5px dashed #000;border-bottom:0px dashed #fff;'.$indam.'" align="left">' . $itemCT["tents"] . '</td>
        <td STYLE="border-left:0.5px solid #000;border-right:0.5px solid #000;border-top:0.5px dashed #000;border-bottom:0px dashed #fff;'.$indam.'" align="center">';
    $time = ($itemCT["dvt"]);
    $html_ct .= $time;
    $html_ct .= '</td>
        <td STYLE="border-left:0.5px solid #000;border-right:0.5px solid #000;border-top:0.5px dashed #000;border-bottom:0px dashed #fff;'.$indam.'" align="center">' . (number_format($itemCT["tylekh"] != 0) ? number_format($itemCT["tylekh"], 0, ",", ".") : "") . '</td>
        <td STYLE="border-left:0.5px solid #000;border-right:0.5px solid #000;border-top:0.5px dashed #000;border-bottom:0px dashed #fff;'.$indam.'" align="right">' . (number_format($itemCT["nguyengia"] != 0) ? number_format($itemCT["nguyengia"], 0, ",", ".") : "") . '</td>
        <td STYLE="border-left:0.5px solid #000;border-right:0.5px solid #000;border-top:0.5px dashed #000;border-bottom:0px dashed #fff;'.$indam.'" align="right">' . (number_format($itemCT["sokh"] != 0) ? number_format($itemCT["sokh"], 0, ",", ".") : "") . '</td>
        <td STYLE="border-left:0.5px solid #000;border-right:0.5px solid #000;border-top:0.5px dashed #000;border-bottom:0px dashed #fff;'.$indam.'" align="right">' . (number_format($DATADSKHAUHAOTSTK[0][$matk0[0]][$itemCT[mats]] != 0) ? number_format($DATADSKHAUHAOTSTK[0][$matk0[0]][$itemCT[mats]], 0, ",", ".") : "") . '</td>
      </tr>
    ';
}
}


$html = '
<table border="0" cellspacing="1" cellpadding="1">
  <tr>
    <td>
      <table width="100%" border="0" STYLE="font-weight: bold ">
        <tr>
          <td>' . $_SESSION['TenCongTy'] . '</td>
          <td></td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" STYLE="font-weight: bold;border-bottom:1px solid #000;">
        <tr>
          <td>' . $_SESSION['DiaChi'] . '</td>
          <td align="right">MST: ' . $_SESSION['MST'] . '</td>
        </tr>
    </table></td>
  </tr>
</table>
<table border="0" align="left">
  <tr>
    <td><b>' . $_SESSION["THONGTINPHIEU"]['tenphieu'] . '</b></td>
    <td rowspan="2" align="right">
<i>Mẫu số 06 -TSCĐ<br/>
        (Ban hành theo thông tư số 133/2016/TT-BCT <br/>Ngày 26/08/2016 của Bộ Tài Chính</i>
    </td>
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
<tr>
    <td STYLE="border:0.5px solid #000;"></td>
    <td STYLE="border:0.5px solid #000;"></td>
    <td STYLE="border:0.5px solid #000;" align="right"><b>Tổng cộng</b></td>
    <td STYLE="border:0.5px solid #000;"></td>
    <td STYLE="border:0.5px solid #000;"></td>
    <td STYLE="border:0.5px solid #000;" align="right"><b>' . number_format($nguyengia, 0, ",", ".") . '</b></td>
    <td STYLE="border:0.5px solid #000;"  align="right"><b>' . number_format($tongsokh, 0, ",", ".") . '</b></td>
  
    <td align="right" STYLE="border:0.5px solid #000;"><b>' . (number_format($tongtk0 != 0) ?number_format($tongtk0, 0, ",", "."):"") . '</b></td>
  </tr>
</table>
<table><tr><td></td></tr></table>
';
$pdf->writeHTML($html, true, false, true, false, '');
$html_foodter = '
<table width="100%" border="0" cellpadding="2">
  <tr>
    <td width="70%">&nbsp;</td>
    <td width="30%" rowspan="2" align="center"><table width="200" border="0">
      <tr>
        <td><em>Trà Vinh Ngày ';
$time = strtotime($_SESSION["THONGTINPHIEU"]['ngaylap']);
$html_foodter .= date("d-m-Y", $time);


$html_foodter .= '</em></td>
      </tr>
      <tr>
        <td>Kế toán trưởng</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><table width="200" border="0" cellspacing="2">
      <tr>
        <td align="center"><strong>Người lập phiếu</strong></td>
        </tr>
    </table></td>
  </tr>
</table>
';
$break = $pdf->checkquatrang(10);
if ($break) {
    $pdf->SetAutoPageBreak(True);
    $pdf->writeHTML($html_foodter, true, false, true, false, '');
} else {
    $pdf->writeHTML($html_foodter, true, false, true, false, '');
}

//$pdf->lastPage();

$pdf->Output('bang_khau_hao_tai_san.pdf', 'I');

