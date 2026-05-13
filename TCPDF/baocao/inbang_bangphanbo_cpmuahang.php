<?php
session_start();
require_once('tcpdf_include.php');
$DATADSKHAUHAOTS = $_SESSION['DSPBCHIPHIMUAHANG'];
function NB_Format($Number){
	$a = new \NumberFormatter("it-IT", \NumberFormatter::DECIMAL);
	$a->setAttribute(\NumberFormatter::MIN_FRACTION_DIGITS, 0);
	$a->setAttribute(\NumberFormatter::MAX_FRACTION_DIGITS, 5); //Định dạng thập phân cao nhất
	return $a->format($Number);
}
$denthang = $_GET['denthang'];
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
$pdf->SetMargins(5, 6, 6);
//$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, 12);

// set image scale factor
//$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
    require_once(dirname(__FILE__) . '/lang/eng.php');
    $pdf->setLanguageArray($l);
}

$pdf->SetFont('dejavuserifcondensed', '', 10);
$pdf->AddPage();
$html_ct = "";
$html_title = '
  <tr>
    <td STYLE="border:0.5px solid #000;" width="30px" rowspan="1">&nbsp;STT</td>
    <td STYLE="border:0.5px solid #000;" width="65px" rowspan="1">&nbsp;Mã vật tư</td>
    <td STYLE="border:0.5px solid #000;" width="160px" rowspan="1">&nbsp;Tên vật tư</td>
    <td STYLE="border:0.5px solid #000;" width="42px;" rowspan="1">&nbsp;ĐVT</td>
    <td STYLE="border:0.5px solid #000;" width="50px;" rowspan="1">&nbsp;Số lượng</td>
    <td STYLE="border:0.5px solid #000;" width="80px" rowspan="1">&nbsp;Thành tiền</td>
    <td  STYLE="border:0.5px solid #000;" width="70px" rowspan="1">&nbsp;CP Phân bổ</td>
    <td  STYLE="border:0.5px solid #000;" width="70px" rowspan="1">&nbsp;Kho hàng</td>
  </tr>
';
$sott = 0;
$tonggiamuadk = 0;
$tonggtconlaidk = 0;
foreach ($DATADSKHAUHAOTS as $itemCT) {
        $sott++;
$TongSL+=$itemCT["soluong"];
$TongThanhTien+=$itemCT["thanhtien"];
$TongPhanBo+=$itemCT["cpphanbo"];
        $html_ct .= '
        <tr >
        <td STYLE="border-left:0.5px solid #000;border-right:0.5px solid #000;border-top:0.5px dashed #000;border-bottom:0px dashed #fff;' . $indam . '" >' . $sott . '</td>
        <td STYLE="border-left:0.5px solid #000;border-right:0.5px solid #000;border-top:0.5px dashed #000;border-bottom:0px dashed #fff;' . $indam . '" align="center">' . strtoupper($itemCT["mavt"]) . '</td>
        <td STYLE="border-left:0.5px solid #000;border-right:0.5px solid #000;border-top:0.5px dashed #000;border-bottom:0px dashed #fff;' . $indam . '" align="left">' . $itemCT["tenvt"] . '</td>
        <td STYLE="border-left:0.5px solid #000;border-right:0.5px solid #000;border-top:0.5px dashed #000;border-bottom:0px dashed #fff;' . $indam . '" align="center">' . $itemCT["dvt"] . '</td>
        <td STYLE="border-left:0.5px solid #000;border-right:0.5px solid #000;border-top:0.5px dashed #000;border-bottom:0px dashed #fff;' . $indam . '" align="right">';
        $time = $itemCT["soluong"];
        $html_ct .= NB_Format($time);
        $html_ct .= '</td>
        <td STYLE="border-left:0.5px solid #000;border-right:0.5px solid #000;border-top:0.5px dashed #000;border-bottom:0px dashed #fff;' . $indam . '" align="right">' . (number_format($itemCT["thanhtien"] != 0) ? number_format($itemCT["thanhtien"], 0, ",", ".") : "") . '</td>
        <td STYLE="border-left:0.5px solid #000;border-right:0.5px solid #000;border-top:0.5px dashed #000;border-bottom:0px dashed #fff;' . $indam . '" align="right">' . (number_format($itemCT["cpphanbo"] != 0) ? number_format($itemCT["cpphanbo"], 0, ",", ".") : "") . '</td>
        <td STYLE="border-left:0.5px solid #000;border-right:0.5px solid #000;border-top:0.5px dashed #000;border-bottom:0px dashed #fff;' . $indam . '" align="left">' . $itemCT["tenkho"] . '</td>
      </tr>
    ';
}


$html = '
<table border="0" cellspacing="1" cellpadding="1">
  <tr>
    <td>
      <table width="100%" border="0" STYLE="font-weight: bold ">
        <tr>
          <td>'.$_SESSION['TenCongTy'] . '</td>
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
    <td><b>'. $_SESSION["THONGTINPHIEUCPMUAHANG"]['tenphieu'] . '</b></td>
    <td rowspan="2" align="right">
<i>Mẫu số 06 -TSCĐ<br/>
        (Ban hành theo thông tư số 133/2016/TT-BCT <br/>Ngày 26/08/2016 của Bộ Tài Chính</i>
    </td>
  </tr>
  <tr>
    <td><b>' . $_SESSION["THONGTINPHIEUCPMUAHANG"]['ngayhoadon'] . '</b></td>
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
    <td STYLE="border:0.5px solid #000;" align="right"></td>
    <td STYLE="border:0.5px solid #000;" align="right"><b>'.NB_Format($TongSL).'</b></td>
    <td STYLE="border:0.5px solid #000;" align="right"><b>'. (number_format($TongThanhTien != 0) ? number_format($TongThanhTien, 0, ",", ".") : "") .'</b></td>
    <td STYLE="border:0.5px solid #000;" align="right"><b>'. (number_format($TongPhanBo != 0) ? number_format($TongPhanBo, 0, ",", ".") : "") .'</b></td>
  <td STYLE="border:0.5px solid #000;" align="right"></td>
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
$time = strtotime($_SESSION["THONGTINPHIEUCPMUAHANG"]['ngaylap']);
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
$pdf->Output('bang_pb_chiphi_muahang.pdf', 'I');

