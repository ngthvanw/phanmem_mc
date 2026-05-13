<?php
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
session_start();
require_once('tcpdf_include.php');
$DATACIBANRA = $_SESSION["LISTTHUETNDNPLCHUYENLO"];

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
    <td STYLE="border:0.2px solid #000;" width="30px"><b>STT</b></td>
    <td STYLE="border:0.2px solid #000;" width="50px" ><b>Năm phát sinh lỗ</b></td>
    <td STYLE="border:0.2px solid #000;" width="120px"><b>Số lỗ phát sinh</b></td>
    <td STYLE="border:0.2px solid #000;" width="120px" ><b>Số lỗ đã chuyển trong các kỳ tính thuế trước</b></td>
    <td STYLE="border:0.2px solid #000;" width="120px" ><b>Số lỗ đã chuyển trong các kỳ tính thuế này</b></td>
    <td STYLE="border:0.2px solid #000;" width="120px" ><b>Số lỗ còn được chuyển sang các kỳ tính thuế sau</b></td>
  </tr>
  <tr>
    <td STYLE="border:0.2px solid #000;">(1)</td>
    <td STYLE="border:0.2px solid #000;">(2)</td>
    <td STYLE="border:0.2px solid #000;">(3)</td>
    <td STYLE="border:0.2px solid #000;" >(4)</td>
    <td STYLE="border:0.2px solid #000;" >(5)</td>
    <td STYLE="border:0.2px solid #000;" >(6)</td>
  </tr>
  ';

$sott=0;
$solophatsinh=0;
$sochuyenkytruoc=0;
$sochuyentrongky=0;
$sochuyenkysau=0;

    foreach ($DATACIBANRA as $itemCT) {
        $sott++;
            $indam="";
        $solophatsinh+=$itemCT["solophatsinh"];
        $sochuyenkytruoc+=$itemCT["sochuyenkytruoc"];
        $sochuyentrongky+=$itemCT["sochuyenkytruoc"];
        $sochuyenkysau+=$itemCT["sochuyenkysau"];
        $html_ct .= '
        <tr >
        <td STYLE="border-top:0.2px solid #FFF;border-right:0.2px solid #000;border-left:0.2px solid #000;border-bottom:0.2px dashed  #000;'.$indam.'" align="center">'. ($sott) . '</td>
        <td align="center" STYLE="border-top:0.2px solid #FFF;border-right:0.2px solid #000;border-left:0.2px solid #000;border-bottom:0.2px dashed  #000;'.$indam.'">' . $itemCT["nampslo"] . '</td>
        <td align="right" STYLE="border-top:0.2px solid #FFF;border-right:0.2px solid #000;border-left:0.2px solid #000;border-bottom:0.2px dashed  #000;'.$indam.'">' . (number_format($itemCT["solophatsinh"] != 0) ? number_format($itemCT["solophatsinh"], 0, ",", ".") : "") . '</td>
        <td  STYLE="border-top:0.2px solid #FFF;border-right:0.2px solid #000;border-left:0.2px solid #000;border-bottom:0.2px dashed  #000;'.$indam.'" align="right">';
            $html_ct .= (number_format($itemCT["sochuyenkytruoc"] != 0) ? number_format($itemCT["sochuyenkytruoc"], 0, ",", ".") : "");
            $html_ct .='</td>
<td align="right" STYLE="border-top:0.2px solid #FFF;border-right:0.2px solid #000;border-left:0.2px solid #000;border-bottom:0.2px dashed  #000;'.$indam.'">' . (number_format($itemCT["sochuyentrongky"] != 0) ? number_format($itemCT["sochuyentrongky"], 0, ",", ".") : "") . '</td>
<td align="right" STYLE="border-top:0.2px solid #FFF;border-right:0.2px solid #000;border-left:0.2px solid #000;border-bottom:0.2px dashed  #000;'.$indam.'">' . (number_format($itemCT["sochuyenkysau"] != 0) ? number_format($itemCT["sochuyenkysau"], 0, ",", ".") : "") . '</td>
      </tr>';
}

$html = '
<table width="100%" border="0">
  <tr>
    <td align="left" WIDTH="8%"></td>    
    <td style="font-weight: bold;font-size: 9px" align="center" valign="middle" WIDTH="75%">
    <table style="font-size: 9px;" border="0" align="center">
  <tr>
    <td><b>PHỤ LỤC</b><BR/><b>'.$_SESSION["THONGTINPHIEUPLCHUYENLO"]['tenphieu'].'</b></td>
  </tr>
  <tr>
    <td>
        <table width="100%" cellpadding="2">
        <tr><td style="font-size:9px;">
                <i>(kèm theo tờ khai quyết toán thuế thu nhập doanh nghiệp số 03/TNDN)</i>
            </td></tr>
            <tr><td>
                <b>Kỳ tính thuế: '.$_SESSION["THONGTINPHIEUPLCHUYENLO"]['ngayhoadon'].'</b>
            </td></tr>
            
        </table>
    </td>
  </tr>
</table>
</td>
    <td WIDTH="17%">
    <table border="0.2" cellpadding="2">
    
   <tr>
   <td style="font-size: 7px" align="center"><i>Mẫu số 03-3A/TNDN<br/>
        (Ban hành '.$_SESSION['THONGTUMANG'][$_SESSION['theothongtu']]['thongtu'].' ngày '.$_SESSION['THONGTUMANG'][$_SESSION['theothongtu']]['ngay'].' của Bộ trưởng Bộ Tài Chính)</i>
   </td>
</tr>

</table>
    
</td>
  </tr>
</table>
<table><tr><td></td></tr></table>
<table style="font-size:9px;" width="100%" border="0">
  <tr>
    <td width="130px"><b>Tên người nộp thuế :</b></td>
    <td colspan="5"><b>'.$_SESSION["TenCongTy"].'</b></td>
  </tr>
    <tr>
    <td>Mã số thuế :</td>
    <td colspan="5" align="center"><table border="0.2" width="200px"><tr>
        <td>'.substr($_SESSION["MST"],0,1).'</td>
        <td>'.substr($_SESSION["MST"],1,1).'</td>
        <td>'.substr($_SESSION["MST"],2,1).'</td>
        <td>'.substr($_SESSION["MST"],3,1).'</td>
        <td>'.substr($_SESSION["MST"],4,1).'</td>
        <td>'.substr($_SESSION["MST"],5,1).'</td>
        <td>'.substr($_SESSION["MST"],6,1).'</td>
        <td>'.substr($_SESSION["MST"],7,1).'</td>
        <td>'.substr($_SESSION["MST"],8,1).'</td>
        <td>'.substr($_SESSION["MST"],9,1).'</td>
        <td style="border-top:0px solid #FFF;border-bottom:0px solid #FFF"></td>
        <td>'.substr($_SESSION["MST"],10,1).'</td>
        <td>'.substr($_SESSION["MST"],11,1).'</td>
        <td>'.substr($_SESSION["MST"],12,1).'</td>
    </tr></table></td>
  </tr>
    <tr>
    <td width="130px"></td>
    <td colspan="5"></td>
  </tr>
    <tr>
    <td width="130px"><b>Tên đại lý thuế(nếu có) :</b></td>
    <td colspan="5"><b>'.$_SESSION['txt_tencongtydaily'].'</b></td>
  </tr>
    <tr>
    <td>Mã số thuế :</td>
    <td colspan="5" align="center"><table border="0.2" width="200px"><tr>
        <td>'.substr($_SESSION["txt_masothue_daily"],0,1).'</td>
        <td>'.substr($_SESSION["txt_masothue_daily"],1,1).'</td>
        <td>'.substr($_SESSION["txt_masothue_daily"],2,1).'</td>
        <td>'.substr($_SESSION["txt_masothue_daily"],3,1).'</td>
        <td>'.substr($_SESSION["txt_masothue_daily"],4,1).'</td>
        <td>'.substr($_SESSION["txt_masothue_daily"],5,1).'</td>
        <td>'.substr($_SESSION["txt_masothue_daily"],6,1).'</td>
        <td>'.substr($_SESSION["txt_masothue_daily"],7,1).'</td>
        <td>'.substr($_SESSION["txt_masothue_daily"],8,1).'</td>
        <td>'.substr($_SESSION["txt_masothue_daily"],9,1).'</td>
        <td style="border-top:0px solid #FFF;border-bottom:0px solid #FFF"></td>
        <td>'.substr($_SESSION["txt_masothue_daily"],10,1).'</td>
        <td>'.substr($_SESSION["txt_masothue_daily"],11,1).'</td>
        <td>'.substr($_SESSION["txt_masothue_daily"],12,1).'</td>
    </tr></table></td>
  </tr>
  
</table>
<table width="100%" border="0">
<tr>
<td></td>
<td style="font-size:8px;" align="right"></td>
</tr>
</table>
<table border="1" cellpadding="2" cellspacing="0" align="center" valign="middle">'.$html_title.$html_ct.'
  <tr>
    <td colspan="2" STYLE="border:0.2px solid #000;"><b>Tổng cộng</b></td>
    <td STYLE="border:0.2px solid #000;" align="right"><b>' . (number_format($solophatsinh != 0) ? number_format($solophatsinh, 0, ",", ".") : "") . '</b></td>
    <td STYLE="border:0.2px solid #000;" align="right"><b>' . (number_format($sochuyenkytruoc != 0) ? number_format($sochuyenkytruoc, 0, ",", ".") : "") . '</b></td>
    <td STYLE="border:0.2px solid #000;" align="right" ><b>' . (number_format($sochuyentrongky != 0) ? number_format($sochuyentrongky, 0, ",", ".") : "") . '</b></td>
    <td STYLE="border:0.2px solid #000;" align="right" ><b>' . (number_format($sochuyenkysau != 0) ? number_format($sochuyenkysau, 0, ",", ".") : "") . '</b></td>
  </tr>
</table>

<table><tr><td></td></tr></table>
<table><tr><td>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tôi cam đoan số liệu khai là đúng và chịu trách nhiệm trước pháp luật về số liệu đã khai ./.
</td></tr></table>
<table><tr><td></td></tr></table>
<table width="100%" border="0" cellpadding="2">
  <tr>
    <td align="left" rowspan="2" width="40%">&nbsp;<br/>
    <b>NHÂN VIÊN ĐẠI LÝ THUẾ</b><br/>Họ và tên: '.$_SESSION['txt_hovatendaily'].'<br/>Chứng chỉ hành nghề số: '.$_SESSION['txt_chungchindaily'].'
    </td>
    <td align="center" width="20%">&nbsp;<br/></td>
    <td width="40%" rowspan="2" align="center">
    <em>Ngày ';
$time = strtotime($_SESSION["THONGTINPHIEUPLCHUYENLO"]['ngaylap']);
$html.=date("d-m-Y",$time);
$html.='</em><br/><b>NGƯỜI NỘP THUẾ hoặc ĐẠI DIỆN HỢP PHÁP CỦA NGƯỜI NỘP THUẾ</b><br/><br/><i style="font-size: 9px">(Ký, ghi rõ họ tên; chức vụ và đóng dấu (nếu có))</i>
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

