<?php
session_start();
require_once('tcpdf_include.php');
$DATACIBANRA = $_SESSION["LISTCTBCDKT"];

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
$pdf->SetMargins(6, 5, 6);
//$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
//$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, 10);

// set image scale factor
//$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

$pdf->SetFont('dejavuserifcondensed', '', 10);
$pdf->AddPage("");
$html_ct="";
$html_ct1="";
$html_title='
  <tr>
    <td STYLE="border:0.2px solid #000;" width="250px"><b>CHỈ TIÊU</b></td>
    <td STYLE="border:0.2px solid #000;" width="50px" ><b>Mã số</b></td>
    <td STYLE="border:0.2px solid #000;" width="50px"><b>Thiết minh</b></td>
    <td STYLE="border:0.2px solid #000;" width="110px" ><b>Số cuối năm</b></td>
    <td STYLE="border:0.2px solid #000;" width="110px"><b>Số đầu năm</b></td>
  </tr>
  <tr>
    <td STYLE="border:0.2px solid #000;" width="250px">1</td>
    <td STYLE="border:0.2px solid #000;" width="50px" >2</td>
    <td STYLE="border:0.2px solid #000;" width="50px">3</td>
    <td STYLE="border:0.2px solid #000;" width="110px" >4</td>
    <td STYLE="border:0.2px solid #000;" width="110px">5</td>
  </tr>
    <tr>
    <td STYLE="border:0.2px solid #000;" width="250px"><b>TÀI SẢN</b></td>
    <td STYLE="border:0.2px solid #000;" width="50px" ></td>
    <td STYLE="border:0.2px solid #000;" width="50px"></td>
    <td STYLE="border:0.2px solid #000;" width="110px" ></td>
    <td STYLE="border:0.2px solid #000;" width="110px"></td>
  </tr>
  ';
$html_title1='
  <tr>
    <td STYLE="border:0.2px solid #000;" width="250px"><b>NGUỒN VỐN</b></td>
    <td STYLE="border:0.2px solid #000;" width="50px" ></td>
    <td STYLE="border:0.2px solid #000;" width="50px"></td>
    <td STYLE="border:0.2px solid #000;" width="110px" ></td>
    <td STYLE="border:0.2px solid #000;" width="110px"></td>
  </tr>';
$sott=0;
$tongcuoi=0;
$tongcuoi1=0;
$tongdau=0;
$tongdau1=0;
    foreach ($DATACIBANRA as $itemLoai) {

    foreach ($itemLoai as $itemCT) {
        $sott++;

        if($itemCT["loaitsnv"]==1) {
            $indam="";
            if($itemCT['CAP']==1) {
                $tongcuoi += $itemCT["soduck"];
                $tongdau += $itemCT["sodudk"];
                $indam="font-weight: bold";
            }
            $html_ct .= '
        <tr >
        <td STYLE="border-top:0.2px solid #FFF;border-right:0.2px solid #000;border-left:0.2px solid #000;border-bottom:0.2px dashed  #000;'.$indam.'" align="left">' . ($itemCT["tentsnv"]) . '</td>
        <td align="center" STYLE="border-top:0.2px solid #FFF;border-right:0.2px solid #000;border-left:0.2px solid #000;border-bottom:0.2px dashed  #000;'.$indam.'">' . $itemCT["maso"] . '</td>
        <td align="right" STYLE="border-top:0.2px solid #FFF;border-right:0.2px solid #000;border-left:0.2px solid #000;border-bottom:0.2px dashed  #000;'.$indam.'">' . $itemCT["thietminh"] . '</td>
        <td  STYLE="border-top:0.2px solid #FFF;border-right:0.2px solid #000;border-left:0.2px solid #000;border-bottom:0.2px dashed  #000;'.$indam.'" align="right">';
            if($itemCT['maso']==124 || $itemCT['maso']==136 || $itemCT['maso']==142 || $itemCT['maso']==152 || $itemCT['maso']==162) {
                $html_ct .= (number_format($itemCT["soduck"] != 0) ? "(".number_format(abs($itemCT["soduck"]), 0, ",", ".").")" : "");
            }else{
                $html_ct .= (number_format($itemCT["soduck"] != 0) ? number_format($itemCT["soduck"], 0, ",", ".") : "");
            }
            $html_ct .= '</td>
        <td align="right" STYLE="border-top:0.2px solid #FFF;border-right:0.2px solid #000;border-left:0.2px solid #000;border-bottom:0.2px dashed  #000;'.$indam.'" align="right">';
            if($itemCT['maso']==124 || $itemCT['maso']==136 || $itemCT['maso']==142 || $itemCT['maso']==152 || $itemCT['maso']==162) {
                $html_ct .= (number_format($itemCT["sodudk"] != 0) ? "(".number_format(abs($itemCT["sodudk"]), 0, ",", ".").")" : "");
            }else{
                $html_ct .= (number_format($itemCT["sodudk"] != 0) ? number_format($itemCT["sodudk"], 0, ",", ".") : "");
            }
            $html_ct .= '</td>
      </tr>';
        }else{
            $indam="";
            if($itemCT['CAP']==1) {
                $tongcuoi1 += $itemCT["soduck"];
                $tongdau1 += $itemCT["sodudk"];
                $indam="font-weight: bold";
            }
            $html_ct1 .= '
        <tr >
        <td STYLE="border-top:0.2px solid #FFF;border-right:0.2px solid #000;border-left:0.2px solid #000;border-bottom:0.2px dashed  #000;'.$indam.'" align="left">' . ($itemCT["tentsnv"]) . '</td>
        <td align="center" STYLE="border-top:0.2px solid #FFF;border-right:0.2px solid #000;border-left:0.2px solid #000;border-bottom:0.2px dashed  #000;'.$indam.'">' . $itemCT["maso"] . '</td>
        <td align="right" STYLE="border-top:0.2px solid #FFF;border-right:0.2px solid #000;border-left:0.2px solid #000;border-bottom:0.2px dashed  #000;'.$indam.'">' . $itemCT["thietminh"] . '</td>
        <td  STYLE="border-top:0.2px solid #FFF;border-right:0.2px solid #000;border-left:0.2px solid #000;border-bottom:0.2px dashed #000;'.$indam.'" align="right">';
            $html_ct1 .= (number_format($itemCT["soduck"] != 0) ? number_format($itemCT["soduck"],0,",","."):"");
            $html_ct1 .= '</td>
        <td align="right" STYLE="border-top:0.2px solid #FFF;border-right:0.2px solid #000;border-left:0.2px solid #000;border-bottom:0.2px dashed  #000;'.$indam.'" align="right">';
            $html_ct1 .= (number_format($itemCT["sodudk"] != 0) ? number_format($itemCT["sodudk"],0,",","."):"");
            $html_ct1 .= '</td>
      </tr>';
        }
    }
}

$html = '
<table width="100%" border="0" style="border-bottom: 1px solid #000">
  <tr>
    <td align="left" WIDTH="55%"><B>'.$_SESSION["TenCongTy"].'</B><br/>'.$_SESSION["DiaChi"].'<br/>MST:'.$_SESSION["MST"].'</td>    
    <td align="center" WIDTH="5%"></td>
    <td WIDTH="40%">
    <table border="0">
    
   <tr>
   <td align="center"><i>Mẫu số B01a-DNN<br/>
        (Ban hành '.$_SESSION['THONGTUMANG'][$_SESSION['theothongtu']]['thongtu'].' ngày '.$_SESSION['THONGTUMANG'][$_SESSION['theothongtu']]['ngay'].' của Bộ trưởng Bộ Tài Chính)</i>
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
<table border="1" cellpadding="2" cellspacing="0" align="center" valign="middle">'.$html_title.$html_ct.'
<tr>
    <td STYLE="border:0.2px solid #000;"><b>TỔNG CỘNG TÀI SẢN (200=110+120+130+140+150+160+170+180)</b></td>
    <td STYLE="border:0.2px solid #000;"><b>250</b></td>
    <td STYLE="border:0.2px solid #000;"><b></b></td>
    <td STYLE="border:0.2px solid #000;" align="right"><b>'.number_format($tongcuoi,0,",",".").'</b></td>
    <td STYLE="border:0.2px solid #000;" align="right"><b>'.number_format($tongdau,0,",",".").'</b></td>
  </tr>
</table>
<table pagebreak="true" border="1" cellpadding="2" cellspacing="0" align="center" valign="middle">'.$html_title1.$html_ct1.'
<tr>
    <td STYLE="border:0.2px solid #000;"><b>TỔNG CỘNG NGUỒN VỐN (500=300+400)</b></td>
    <td STYLE="border:0.2px solid #000;"><b>500</b></td>
    <td STYLE="border:0.2px solid #000;"><b></b></td>
    <td STYLE="border:0.2px solid #000;" align="right"><b>'.number_format($tongcuoi1,0,",",".").'</b></td>
    <td STYLE="border:0.2px solid #000;" align="right"><b>'.number_format($tongdau1,0,",",".").'</b></td>
  </tr>
</table>

<table><tr><td></td></tr></table>

<table width="100%" border="0" cellpadding="2">
  <tr>
  <td align="center" width="35%">&nbsp;<br/>Người lập biểu</td>
    <td align="center" width="35%">&nbsp;<br/>Kế toán trưởng</td>
    <td width="30%" rowspan="2" align="center">
    <em>'.$ThanhPho.' Ngày ';
$time = strtotime($_SESSION["THONGTINPHIEU"]['ngaylap']);
$html.=date("d-m-Y",$time);
$html.='</em><br/>Người đại diện theo pháp luật
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

