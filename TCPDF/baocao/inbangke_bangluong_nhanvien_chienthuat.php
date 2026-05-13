<?php
session_start();
require_once('tcpdf_include.php');
$BAOCAO_SUDUNGHD = $_SESSION['LISTBANGLUONGNHANVIEN'];
//echo "<pre>";
//print_r($BAOCAO_SUDUNGHD);
//echo "</pre>";

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
<tr style="font-weight: bold;">
    <td STYLE="border:0.5px solid #000;" align="center" width="20px" rowspan="2">&nbsp;<br/>STT</td>
	<td STYLE="border:0.5px solid #000;" align="center" width="100px" rowspan="2">&nbsp;<br/>HỌ VÀ TÊN</td>
	<td STYLE="border:0.5px solid #000;" align="center" width="60px" rowspan="2">&nbsp;<br/>CHỨC DANH</td>
    <td STYLE="border:0.5px solid #000;" align="center" width="430px" colspan="8">TIỀN LƯƠNG VÀ THU NHẬP ĐƯỢC NHẬN</td>
    <td STYLE="border:0.5px solid #000;" align="center"  width="50px" rowspan="2">BHXH; BHYT; BHTN</td>
    <td STYLE="border:0.5px solid #000;" align="center" width="140px" colspan="2">TIỀN LƯƠNG VÀ THU NHẬP ĐƯỢC LẢNH</td>

  </tr>
  <tr style="font-weight: bold;">
    <td  align="center" STYLE="border:0.5px solid #000;" >Lương CB</td>
    <td  align="center" STYLE="border:0.5px solid #000;">Tổng thu</td>
	
    <td  align="center" STYLE="border:0.5px solid #000;">Doanh thu thuần</td>
    <td  align="center" STYLE="border:0.5px solid #000;" >Thuế GTGT</td>
	
    <td  align="center" STYLE="border:0.5px solid #000;">Lương khoán</td>
    <td  align="center" STYLE="border:0.5px solid #000;" >chênh lệch</td>
    <td  align="center" STYLE="border:0.5px solid #000;" >Phụ Cấp Chức Vụ</td>
	<td  STYLE="border:0.5px solid #000;" align="center" >Tổng Lương</td>
	
    <td  align="center" STYLE="border:0.5px solid #000;">Thực Lãnh</td>
    <td  align="center" STYLE="border:0.5px solid #000;" >Ký Nhận</td>
	
  </tr>
  <tr style="font-weight: bold;">
    <td align="center" rowspan="1" STYLE="border:0.5px solid #000;" >(1)</td>
    <td align="center" rowspan="1" STYLE="border:0.5px solid #000;">(2)</td>
	
    <td align="center" rowspan="1" STYLE="border:0.5px solid #000;">(3)</td>
    <td align="center" rowspan="1" STYLE="border:0.5px solid #000;" >(4)</td>
	
    <td align="center" rowspan="1" STYLE="border:0.5px solid #000;">(5)</td>
    <td align="center" rowspan="1" STYLE="border:0.5px solid #000;" >(6)</td>
	<td align="center" STYLE="border:0.5px solid #000;" >(7)</td>
	<td align="center" STYLE="border:0.5px solid #000;" >(8)</td>
	
    <td align="center" rowspan="1" STYLE="border:0.5px solid #000;">(9)</td>
    <td align="center" rowspan="1" STYLE="border:0.5px solid #000;" >(10)</td>
    <td align="center" rowspan="1" STYLE="border:0.5px solid #000;" >(11)</td>
    <td align="center" rowspan="1" STYLE="border:0.5px solid #000;" >(12)</td>
    <td align="center" rowspan="1" STYLE="border:0.5px solid #000;" >(13)</td>
    <td align="center" rowspan="1" STYLE="border:0.5px solid #000;" >(14)</td>
	
  </tr>
  ';
$sott = 0;
$tongdk = "";
$tongnhap = "";
$tongps = "";
$tongton = "";
foreach ($BAOCAO_SUDUNGHD as $itemCT) {
    $sott++;
    $TongCongBaoHien += $itemCT["baohiem"];
    $TongCongLuongCB += $itemCT["luongcb"];

    $html_ct .= '
        <tr >
        <td align="center" STYLE="border:0.5px solid #000;" >' . $sott . '</td>
        <td STYLE="border:0.5px solid #000;">' . $itemCT["tennv"] . '</td>
        <td STYLE="border:0.5px solid #000;">' . $itemCT['chucvu'] . '</td>
        <td align="right" STYLE="border:0.5px solid #000;">';
    $html_ct .= number_format($itemCT["luongcb"], 0, ",", ".");

    $html_ct .= '</td>
        <td STYLE="border:0.5px solid #000;" align="right">';
    $TongThu = $itemCT["doanhthu"] + $itemCT["thuegtgt"];
    $TongCongThu +=$TongThu;
    $html_ct .= (number_format($TongThu != 0) ? number_format($TongThu, 0, ",", ".") : "");


    $html_ct .= '</td>
        <td STYLE="border:0.5px solid #000;" align="right">';

    $html_ct .= (number_format($itemCT["doanhthu"] != 0) ? number_format($itemCT["doanhthu"], 0, ",", ".") : "");

    $html_ct .= '</td>
        <td STYLE="border:0.5px solid #000;" align="right">';

    $html_ct .= (number_format($itemCT["thuegtgt"] != 0) ? number_format($itemCT["thuegtgt"], 0, ",", ".") : "");

    $html_ct .= '</td>
        <td STYLE="border:0.5px solid #000;" align="right">';

    $html_ct .= (number_format($itemCT["luongkhoan"] != 0) ? number_format($itemCT["luongkhoan"], 0, ",", ".") : "");

    $html_ct .= '</td>
		<td STYLE="border:0.5px solid #000;" align="right">';
    $chenhlech = $itemCT["luongkhoan"] - $itemCT["luongcb"];
    $html_ct .= (number_format($chenhlech != 0) ? number_format($chenhlech, 0, ",", ".") : "");
    $html_ct .= '</td>
		<td STYLE="border:0.5px solid #000;" align="right">' . (number_format($itemCT["phucapchucvu"] != 0) ? number_format($itemCT["phucapchucvu"], 0, ",", ".") : "") . '</td>
		<td STYLE="border:0.5px solid #000;" align="right">';
    if ($chenhlech < 0) {
        $TongLuong = $itemCT["luongcb"] + $itemCT["phucapchucvu"];
    } else {
        $TongLuong = $itemCT["luongcb"] + $itemCT["phucapchucvu"] + $chenhlech;
    }

    $TongCongLuong += $TongLuong;
    $html_ct .= (number_format($TongLuong != 0) ? number_format($TongLuong, 0, ",", ".") : "");
    $html_ct .= '</td>
		<td STYLE="border:0.5px solid #000;" align="right">' . (number_format($itemCT["baohiem"] != 0) ? number_format($itemCT["baohiem"], 0, ",", ".") : "") . '</td>
		<td STYLE="border:0.5px solid #000;" align="right">';
    $ThucLanh = $TongLuong - $itemCT["baohiem"];
    $TongCongThucLinh += $ThucLanh;
    $html_ct .= (number_format($ThucLanh != 0) ? number_format($ThucLanh, 0, ",", ".") : "");
    $html_ct .= '</td>
		<td STYLE="border:0.5px solid #000;" align="center">';
    $html_ct .= "";
    $html_ct .= '</td>
      </tr>';
}

$html = '
<table border="0" width="100%">
<tr>
<td width="30%"><b>' . $_SESSION['TenCongTy'] . '<br/>MST: ' . $_SESSION['MST'] . '</b></td>
<td width="55%" style="text-align: center;"></td>
<td width="15%" style="text-align: center;" >Mẫu số <b>02-LĐTL</b><br/><i>(Ban hành ' . $_SESSION['THONGTUMANG'][$_SESSION['theothongtu']]['thongtu'] . ' ngày ' . $_SESSION['THONGTUMANG'][$_SESSION['theothongtu']]['ngay'] . ' Bộ Tài Chính)</i></td>
</tr>
</table>
<table width="100%" border="0">
  <tr>
    <td align="center" WIDTH="100%"><b>' . $_SESSION["THONGTINPHIEUBANGLUONGNHANVIEN"]['tenphieu'] . '</b></td>    
  </tr>
    <tr>
    <td align="center" WIDTH="100%"><b>' . $_SESSION["THONGTINPHIEUBANGLUONGNHANVIEN"]['ngayhoadon'] . '</b></td>    
  </tr>

</table>
<table width="100%" border="0">
  <tr>
    <td align="right"></td>
  </tr>
</table>
<table border="0" cellpadding="2" cellspacing="0" align="left" valign="middle">' . $html_title . $html_ct . '
<tr>
    <td STYLE="border:0.5px solid #000;"></td>
    <td align="right" STYLE="border:0.5px solid #000;"><b>TỔNG CỘNG</b></td>
	<td STYLE="border:0.5px solid #000;"></td>
	<td align="right" STYLE="border:0.5px solid #000;"><b>' . number_format($TongCongLuongCB, 0, ",", ".") . '</b></td>
	<td STYLE="border:0.5px solid #000;" align="right"><b>' . number_format($TongCongThu, 0, ",", ".") . '</b></td>
	<td STYLE="border:0.5px solid #000;"></td>
	<td STYLE="border:0.5px solid #000;"><b>' . ($tongnhap) . '</b></td>
    <td STYLE="border:0.5px solid #000;"></td>
    <td STYLE="border:0.5px solid #000;"><b>' . ($tongps) . '</b></td>
    <td STYLE="border:0.5px solid #000;"></td>
    <td align="right" STYLE="border:0.5px solid #000;"><b>' . number_format($TongCongLuong, 0, ",", ".") . '</b></td>
     <td align="right" STYLE="border:0.5px solid #000;"><b>' . number_format($TongCongBaoHien, 0, ",", ".") . '</b></td>
    <td align="right" STYLE="border:0.5px solid #000;"><b>' . number_format($TongCongThucLinh, 0, ",", ".") . '</b></td>
    <td STYLE="border:0.5px solid #000;"><b></b></td>
  </tr>
</table>
<table><tr><td></td></tr></table>
<table width="100%" border="0" cellpadding="2">  
<tr>
    <td width="30%"  align="center"></td>
	<td width="30%"  align="center"></td>
	<td width="30%"  align="center"><i>' . $_SESSION["THONGTINPHIEUBANGLUONGNHANVIEN"]['ngaylap'] . '</i></td>
  </tr>
  <tr>
    <td width="30%"  align="center"><b>LẬP BẢNG</b></td>
	<td width="30%"  align="center"><b>PHỤ TRÁCH KẾ TOÁN</b></td>
	<td width="30%"  align="center"><b>GIÁM ĐỐC</b></td>
  </tr>
</table>
';
$pdf->writeHTML($html, true, false, true, false, '');
//$pdf->writeHTMLCell(0, 0, '', '', $html, 'LRTB', 1, 0, true, 'L', true);

//$pdf->lastPage();

$pdf->Output('bang_luong_nhan_vien.pdf', 'I');

