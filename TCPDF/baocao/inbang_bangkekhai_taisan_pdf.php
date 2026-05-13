<?php
session_start();
require_once('tcpdf_include.php');

$DATADSKHAUHAOTS = $_SESSION['DSBANGKETAISAN'];
$denngay = $_GET['denngay'];

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
    <td width="30px" rowspan="2" STYLE="border:0.5px solid #000;">&nbsp;<br/>
      STT</td>
    <td width="55px" rowspan="2" STYLE="border:0.5px solid #000;">&nbsp;<br/>
      Mã số</td>
    <td width="160px" rowspan="2" STYLE="border:0.5px solid #000;">&nbsp;<br/>Tên tài sản</td>
    <td width="60px" rowspan="2" STYLE="border:0.5px solid #000;">&nbsp;<br/>Nước SX</td>
    <td width="40px" rowspan="2" STYLE="border:0.5px solid #000;">&nbsp;<br/>ĐVT</td>
    <td width="30px" rowspan="2" STYLE="border:0.5px solid #000;"  >&nbsp;<br/>Số lượng</td>
    <td width="120px" STYLE="border:0.5px solid #000;" colspan="2">Giá trị ban đầu</td>
    <td  width="60px" rowspan="2" STYLE="border:0.5px solid #000;">T.Gian đưa vào sử dụng</td>
    <td STYLE="border:0.5px solid #000;" colspan="3" width="170px" >Giá trị còn lại</td>
    <td  width="60px" rowspan="2" STYLE="border:0.5px solid #000;">&nbsp;<br/>Số tiền khấu hao năm</td>
  </tr>
   <tr>
    <td STYLE="border:0.5px solid #000;" width="90px"  >Nguyên giá</td>
    <td STYLE="border:0.5px solid #000;" width="30px" >Thời gian sử dụng</td>
    <td STYLE="border:0.5px solid #000;font-size: 7px;"  width="40px">Tỷ lệ (%)</td>
    <td STYLE="border:0.5px solid #000;"  width="90px">Số tiền</td>
    <td STYLE="border:0.5px solid #000;font-size: 7px;"  width="40px">T.Gian sử dụng còn lại(Năm)</td>
  </tr>
  ';
$sott=0;
$tongdoanhthu=0;
$tongthue=0;
    foreach ($DATADSKHAUHAOTS as $itemCT) {
        if (number_format($itemCT["nguyengia"])!=0 && $itemCT["daban"]!=1) {
        $sott++;
		$indam="";
	if ($itemCT['matscha'] == "0") {
        $nguyengia += $itemCT["nguyengia"];
        $tongsokh += round($itemCT["sokh"]);
        $tonggtconlai += round($itemCT["gtconlai"]-$itemCT["sokh"]);
		$indam="font-weight:bold;";
    }
        $html_ct .= '
        <tr >
        <td STYLE="border:0.5px solid #000;'.$indam.'" >' . $itemCT["STT"] . '</td>
        <td align="left" STYLE="border:0.5px solid #000;'.$indam.'">' . strtoupper($itemCT["mats"]) . '</td>
        <td align="left" STYLE="border:0.5px solid #000;'.$indam.'">' . $itemCT["tents"] . '</td>
        <td align="center" STYLE="border:0.5px solid #000;'.$indam.'">';

        $html_ct .=($itemCT["nuocsx"]);
        $html_ct .= '</td>
        <td  STYLE="border:0.5px solid #000;'.$indam.'" align="center">';
            $html_ct .= $itemCT["dvt"];
        $html_ct .= '</td>
        <td align="center" STYLE="border:0.5px solid #000;'.$indam.'">';
            $html_ct .=($itemCT["soluong"]);
        $html_ct .= '</td>
        <td align="right" STYLE="border:0.5px solid #000;'.$indam.'">';
        $html_ct .=(number_format($itemCT["nguyengia"] != 0) ? number_format($itemCT["nguyengia"],0,",","."):"");
        $html_ct .= '</td>
        <td align="center" STYLE="border:0.5px solid #000;'.$indam.'">';
		        $html_ct .=((number_format(($itemCT["tgsudung"]/12)) != 0) ? round(($itemCT["tgsudung"]/12),2):"");
        $html_ct .= '</td>
        <td align="center" STYLE="border:0.5px solid #000;'.$indam.'">';
		$html_ct .=((strtotime($itemCT["ngaysd"]) != "") ? date("d-m-Y",strtotime($itemCT["ngaysd"])):"");
        $html_ct .= '</td>
		<td align="center" STYLE="border:0.5px solid #000;'.$indam.'">';
            $date1=date_create($itemCT["ngaysd"]);
            $date2=date_create($denngay);
            $diff=date_diff($date1,$date2);
            $namdasudung = (($diff->format("%R%a")/365));
            $namsudung = $itemCT["tgsudung"]/12;
            $namconlai = $namsudung-$namdasudung;
            if($namsudung==0 || $namconlai<=0 ){
                $namconlai=0;
            }
            $tylekh = ((($namconlai*100)/($itemCT["tgsudung"]/12)));
            $GTConLai = $itemCT["gtconlai"]-$itemCT["sokh"];
            if($itemCT["tylekh"]==0){
                $tylekh=0;
                $GTConLai = 0;
            }
            $html_ct .=(number_format($tylekh != 0) ? number_format($tylekh,2,",","."):"");
        $html_ct .= '</td>
		<td STYLE="border:0.5px solid #000;'.$indam.'" align="right">';
		        $html_ct .=(($GTConLai > 0) ? number_format($GTConLai,0,",","."):"");

        $html_ct .= '</td>
		<td align="right" STYLE="border:0.5px solid #000;'.$indam.'" align="right">';
            $html_ct .=(number_format($namconlai != 0) ? number_format($namconlai,2,",","."):"");
        $html_ct .= '</td>
		<td align="right" STYLE="border:0.5px solid #000;'.$indam.'" align="right">';
            $html_ct .=(number_format($itemCT["sokh"] != 0) ? number_format($itemCT["sokh"],0,",","."):"");

        $html_ct .= '</td>
      </tr>';
    }
}

$html = '
<table width="100%" border="0" style="border-bottom: 1px solid #000">
  <tr>
    <td align="left" WIDTH="55%"><B>'.$_SESSION["TenCongTy"].'</B><br/>'.$_SESSION["DiaChi"].'<br/>MST:'.$_SESSION["MST"].'</td>    
    <td align="center" WIDTH="20%"></td>
    <td WIDTH="25%">
    <table border="0">
    
   <tr>
   <td align="center"><i>Mẫu số F01-DNN<br/>
        (Ban hành theo quyết định số 48/2006/QĐ-BTC ngày 14/09/2006 của Bộ trưởng Bộ Tài Chính)</i>
   </td>
</tr>

</table>
    
</td>
  </tr>
</table>
<table><tr><td></td></tr></table>
<table border="0" align="center">
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
    <td STYLE="border:0.5px solid #000;" align="right"><b>Tổng cộng</b></td>
    <td STYLE="border:0.5px solid #000;"></td>
    <td STYLE="border:0.5px solid #000;"></td>
    <td STYLE="border:0.5px solid #000;" align="right"></td>
    <td STYLE="border:0.5px solid #000;"  align="right"><b>' . number_format($nguyengia, 0, ",", ".") . '</b></td>
  
    <td align="right" STYLE="border:0.5px solid #000;"></td>
    <td align="right" STYLE="border:0.5px solid #000;"></td>
    <td align="right" STYLE="border:0.5px solid #000;"></td>
    <td align="right" STYLE="border:0.5px solid #000;"><b>' . number_format(($tonggtconlai), 0, ",", ".") . '</b></td>
    <td align="right" STYLE="border:0.5px solid #000;"></td>
    <td align="right" STYLE="border:0.5px solid #000;"><b>' . (number_format($tongsokh != 0) ?number_format($tongsokh, 0, ",", "."):"") . '</b></td>
  </tr>
</table>
<table><tr><td></td></tr></table>

<table width="100%" border="0" cellpadding="2">
  <tr>
  <td align="center" width="35%"></td>
    <td align="center" width="35%"></td>
    <td width="30%" rowspan="2" align="center">
    <em>Ngày ';
$time = strtotime($_SESSION["THONGTINPHIEU"]['ngaylap']);
$html.=date("d-m-Y",$time);
$html.='</em><br/>Chủ doanh nghiệp
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

$pdf->Output('BANG_KE_TAI_SAN.pdf', 'I');

