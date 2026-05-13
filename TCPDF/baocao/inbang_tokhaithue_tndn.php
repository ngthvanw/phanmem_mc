<?php
session_start();
require_once('tcpdf_include.php');
$DATACIBANRA = $_SESSION["LISTTHUETNDN"];

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
    <td STYLE="border:0.2px solid #000;" width="375px" ><b>Chỉ tiêu</b></td>
    <td STYLE="border:0.2px solid #000;" width="50px"><b>Mã chỉ tiêu</b></td>
    <td STYLE="border:0.2px solid #000;" width="105px" ><b>Số tiền</b></td>
  </tr>
  <tr>
    <td STYLE="border:0.2px solid #000;" width="30px">1</td>
    <td STYLE="border:0.2px solid #000;" width="375px" >2</td>
    <td STYLE="border:0.2px solid #000;" width="50px">3</td>
    <td STYLE="border:0.2px solid #000;" width="105px" >4</td>
  </tr>
  ';

$sott=0;
$tongcuoi=0;
$tongcuoi1=0;
$tongdau=0;
$tongdau1=0;
    foreach ($DATACIBANRA as $itemCT) {
        $indam="";
        $sott++;

            if($itemCT['machitieucha']=="0") {
                $indam="font-weight: bold";
            }
            $html_ct .= '
        <tr >
        <td STYLE="border-top:0.2px solid #FFF;border-right:0.2px solid #000;border-left:0.2px solid #000;border-bottom:0.2px dashed  #000;'.$indam.'" align="center">'. ($itemCT["maso"]) . '</td>
        <td align="left" STYLE="border-top:0.2px solid #FFF;border-right:0.2px solid #000;border-left:0.2px solid #000;border-bottom:0.2px dashed  #000;'.$indam.'">' . $itemCT["chitieu"] . '</td>
        <td align="center" STYLE="border-top:0.2px solid #FFF;border-right:0.2px solid #000;border-left:0.2px solid #000;border-bottom:0.2px dashed  #000;'.$indam.'">' . $itemCT["machitieu"] . '</td>
        <td  STYLE="border-top:0.2px solid #FFF;border-right:0.2px solid #000;border-left:0.2px solid #000;border-bottom:0.2px dashed  #000;'.$indam.'" align="right">';
            $html_ct .= (number_format($itemCT["sotien"] != 0) ? number_format($itemCT["sotien"], 0, ",", ".") : "");
            $html_ct .='</td>
      </tr>';
}

$html = '
<table width="100%" border="0">
  <tr>
    <td align="left" WIDTH="17%"></td>    
    <td style="font-weight: bold;font-size: 9px" align="center" valign="middle" WIDTH="55%">&nbsp;<br/>CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM<BR/>Độc lập- Tự do- Hạnh phúc</td>
    <td WIDTH="28%">
    <table border="0.2" cellpadding="2">
    
   <tr>
   <td style="font-size: 8px" align="center"><i>Mẫu số 03/TNDN<br/>
        (Ban hành ';
    if($_SESSION['NienDo']>=2021){
        $html.='kèm theo Thông tư số 80/2021/TT-BTC ngày 29 tháng 9 năm 2021';
    }else{
        $html.='kèm theo Thông tư số 151/2014/TT-BTC ngày 10 tháng 10 năm 2014';
    }
$html.=' của Bộ trưởng Bộ Tài Chính)</i>
   </td>
</tr>

</table>
    
</td>
  </tr>
</table>
<table><tr><td></td></tr></table>
<table style="font-size: 9px;" border="0" align="center">
  <tr>
    <td><b>'.$_SESSION["THONGTINPHIEU"]['tenphieu'].'</b></td>
  </tr>
  <tr>
    <td>
        <table width="100%" cellpadding="2">
            <tr><td>
                <b>[01] Kỳ tính thuế:</b> '.$_SESSION["THONGTINPHIEU"]['ngayhoadon'].'
            </td></tr>
            <tr><td>
                [02] Lần đầu [ x ] &nbsp;&nbsp;&nbsp;&nbsp; [03] Bổ sung lần thứ [  ]
            </td></tr>
            <tr><td>
                [  ] Doanh nghiệp có quy mô vừa và nhỏ
            </td></tr>
            <tr><td>
                [  ] Doanh nghiệp có cơ sở sản xuất hạch toán phụ thuộc
            </td></tr>
             <tr><td>
                [  ] Doanh nghiệp thuộc đối tượng kê khai thông tin giao dịch liên kết
            </td></tr>
            <tr><td>
                [04] Ngành nghề có tỷ lệ doanh thu cáo nhất:
            </td></tr>
            <tr><td>
                [05] Tỷ lệ(%) &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;%
            </td></tr>
        </table>
    </td>
  </tr>
</table>
<table style="font-size:9px;" width="100%" border="0">
  <tr>
    <td width="130px"><b>[06] Tên người nộp thuế :</b></td>
    <td colspan="5"><b>'.$_SESSION["TenCongTy"].'</b></td>
  </tr>
    <tr>
    <td>[07] Mã số thuế :</td>
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
    <td>[08] Địa chỉ :</td>
    <td colspan="5">'.$_SESSION["DiaChi"].'</td>
  </tr>
    <tr>
    <td>[09] Quận/Huyện:</td>
    <td></td>
    <td></td>
    <td></td>
    <td>[10] Tỉnh/Thành phố</td>
    <td></td>
  </tr>
    <tr>
    <td>[11] Điện thoại :</td>
    <td></td>
    <td>[12] Fax:</td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
</table>
<table width="100%" border="0">
<tr>
<td></td>
<td style="font-size:8px;" align="right"><i> Đơn vị tiền: Đồng Việt Nam</i></td>
</tr>
</table>
<table border="1" cellpadding="2" cellspacing="0" align="center" valign="middle">'.$html_title.$html_ct.'

</table>

<table><tr><td></td></tr></table>

<table width="100%" border="0" cellpadding="2">
  <tr>
  <td align="center" width="35%">&nbsp;<br/>Người lập biểu</td>
    <td align="center" width="35%">&nbsp;<br/>Kế toán trưởng</td>
    <td width="30%" rowspan="2" align="center">
    <em>'.$_SESSION["ThanhPho"].' Ngày ';
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

