<?php
header ("Expires: ".gmdate("D, d M Y H:i:s", time())." GMT");
header ("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header ("Cache-Control: no-cache, must-revalidate");
header ("Pragma: no-cache");

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
    <td STYLE="border:0.5px solid #000;" width="20px" rowspan="2">&nbsp;<br/>STT</td>
    <td STYLE="border:0.5px solid #000;" width="60px" rowspan="2">&nbsp;<br/>Mã số</td>
    <td STYLE="border:0.5px solid #000;" width="150px" rowspan="2">&nbsp;<br/>Tên tài sản</td>
    <td STYLE="border:0.5px solid #000;" width="40px" rowspan="2">&nbsp;<br/>ĐVT</td>
    <td STYLE="border:0.5px solid #000;" width="30px" rowspan="2">Tỷ lệ khấu hao (%)</td>
    <td  STYLE="border:0.5px solid #000;" width="70px" rowspan="2">&nbsp;<br/>Nguyên giá</td>
    <td  STYLE="border:0.5px solid #000;" width="70px" rowspan="2">&nbsp;<br/>Số khấu hao</td>
    <td width="360px" STYLE="border:0.5px solid #000;" colspan="6">Chia ra các đối tượng chi phí</td>
  </tr>
  <tr>
    <td STYLE="border:0.5px solid #000;" >';
    $matk0 = array_keys($DATADSKHAUHAOTSTK[0]);
if($matk0[0]==""){

}else{
    $html_title .= "TK " . $matk0[0];
}
    $html_title .= '</td>
    <td STYLE="border:0.5px solid #000;">';
    $matk1 = array_keys($DATADSKHAUHAOTSTK[1]);
if($matk1[0]==""){

}else{
    $html_title .= "TK " . $matk1[0];
}
    $html_title .= '</td>
    <td STYLE="border:0.5px solid #000;" >';
    $matk2 = array_keys($DATADSKHAUHAOTSTK[2]);
if($matk2[0]==""){

}else{
    $html_title .= "TK " . $matk2[0];
}
    $html_title .= '</td>
        <td STYLE="border:0.5px solid #000;">';
    $matk3 = array_keys($DATADSKHAUHAOTSTK[3]);
if($matk3[0]==""){

}else{
    $html_title .= "TK " . $matk3[0];
}
    $html_title .= '</td>
    <td STYLE="border:0.5px solid #000;" >';
    $matk4 = array_keys($DATADSKHAUHAOTSTK[4]);
if($matk4[0]==""){

}else{
    $html_title .= "TK " . $matk4[0];
}
    $html_title .= '</td>
    <td STYLE="border:0.5px solid #000;" >';
    $matk5 = array_keys($DATADSKHAUHAOTSTK[5]);
    if($matk5[0]==""){

    }else{
        $html_title .= "TK " . $matk5[0];
    }
    $html_title .= '</td>
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
        $tongsokh += round($itemCT["sokh"]);
		$indam="font-weight:bold;";
    }
    $tongtk0 += $DATADSKHAUHAOTSTK[0][$matk0[0]][$itemCT['mats']];
    $tongtk1 += $DATADSKHAUHAOTSTK[1][$matk1[0]][$itemCT['mats']];
    $tongtk2 += $DATADSKHAUHAOTSTK[2][$matk2[0]][$itemCT['mats']];
    $tongtk3 += $DATADSKHAUHAOTSTK[3][$matk3[0]][$itemCT['mats']];
    $tongtk4 += $DATADSKHAUHAOTSTK[4][$matk4[0]][$itemCT['mats']];
    $tongtk5 += $DATADSKHAUHAOTSTK[5][$matk5[0]][$itemCT['mats']];
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
        <td STYLE="border-left:0.5px solid #000;border-right:0.5px solid #000;border-top:0.5px dashed #000;border-bottom:0px dashed #fff;'.$indam.'" align="right">' . (number_format($DATADSKHAUHAOTSTK[1][$matk1[0]][$itemCT[mats]] != 0) ? number_format($DATADSKHAUHAOTSTK[1][$matk1[0]][$itemCT[mats]], 0, ",", ".") : "") . '</td>
        <td STYLE="border-left:0.5px solid #000;border-right:0.5px solid #000;border-top:0.5px dashed #000;border-bottom:0px dashed #fff;'.$indam.'" align="right">' . (number_format($DATADSKHAUHAOTSTK[2][$matk2[0]][$itemCT[mats]] != 0) ? number_format($DATADSKHAUHAOTSTK[2][$matk2[0]][$itemCT[mats]], 0, ",", ".") : "") . '</td>
        <td STYLE="border-left:0.5px solid #000;border-right:0.5px solid #000;border-top:0.5px dashed #000;border-bottom:0px dashed #fff;'.$indam.'" align="right">' . (number_format($DATADSKHAUHAOTSTK[3][$matk3[0]][$itemCT[mats]] != 0) ? number_format($DATADSKHAUHAOTSTK[3][$matk3[0]][$itemCT[mats]], 0, ",", ".") : "") . '</td>
        <td STYLE="border-left:0.5px solid #000;border-right:0.5px solid #000;border-top:0.5px dashed #000;border-bottom:0px dashed #fff;'.$indam.'" align="right">' . (number_format($DATADSKHAUHAOTSTK[4][$matk4[0]][$itemCT[mats]] != 0) ? number_format($DATADSKHAUHAOTSTK[4][$matk4[0]][$itemCT[mats]], 0, ",", ".") : "") . '</td>
        <td STYLE="border-left:0.5px solid #000;border-right:0.5px solid #000;border-top:0.5px dashed #000;border-bottom:0px dashed #fff;'.$indam.'" align="right">' . (number_format($DATADSKHAUHAOTSTK[5][$matk5[0]][$itemCT[mats]] != 0) ? number_format($DATADSKHAUHAOTSTK[5][$matk5[0]][$itemCT[mats]], 0, ",", ".") : "") . '</td>
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
    <td align="right" STYLE="border:0.5px solid #000;"><b>' . (number_format($tongtk1 != 0) ?number_format($tongtk1, 0, ",", "."):"") . '</b></td>
    <td align="right" STYLE="border:0.5px solid #000;"><b>' . (number_format($tongtk2 != 0) ?number_format($tongtk2, 0, ",", "."):"") . '</b></td>
    <td align="right" STYLE="border:0.5px solid #000;"><b>' . (number_format($tongtk3 != 0) ?number_format($tongtk3, 0, ",", "."):"") . '</b></td>
    <td align="right" STYLE="border:0.5px solid #000;"><b>' . (number_format($tongtk4 != 0) ?number_format($tongtk4, 0, ",", "."):"") . '</b></td>
    <td align="right" STYLE="border:0.5px solid #000;"><b>' . (number_format($tongtk5 != 0) ?number_format($tongtk5, 0, ",", "."):"") . '</b></td>
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

