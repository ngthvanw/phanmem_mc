<?php
session_start();
require_once('tcpdf_include.php');
$DATACIBANRA = $_SESSION["LISTTHUETNDNPLUUDAI"];

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

$pdf->SetFont('dejavuserifcondensed', '', 9);
$pdf->AddPage("");
$html_ct="";
$html_ct1="";
$html = '
<table width="100%" border="0">
  <tr>
    <td align="left" WIDTH="8%"></td>    
    <td style="font-weight: bold;font-size: 9px" align="center" valign="middle" WIDTH="75%">
    <table style="font-size: 9px;" border="0" align="center">
  <tr>
    <td><b>PHỤ LỤC</b><BR/><b>'.$_SESSION["THONGTINPHIEUPLUUDAI"]['tenphieu'].'</b></td>
  </tr>
  <tr>
    <td>
        <table width="100%" cellpadding="2">
        <tr><td style="font-size:9px;">
                <b>Đối với cơ sở kinh doanh thành lập mới từ dự án đầu tư,cơ sở kinh doanh di chuyển địa<br/> điểm, dự án đầu tư mới và dự án đầu tư đặt biệt quan trọng</b><br/><i>(kèm theo tờ khai quyết toán thuế thu nhập doanh nghiệp số 03/TNDN)</i>
            </td></tr>
            <tr><td>
                <b>Kỳ tính thuế: '.$_SESSION["THONGTINPHIEUPLUUDAI"]['ngayhoadon'].'</b>
            </td></tr>
            
        </table>
    </td>
  </tr>
</table>
</td>
    <td WIDTH="17%">
    <table border="0.2" style="width: 100%" cellpadding="2">
    
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
<td><b><br>A. Xác định điều kiện và mức độ ưu đãi thuế:</b><br/></td>
<td style="font-size:8px;" align="right"></td>
</tr>
</table>

<table border="0" STYLE="border:0.2px solid #000;" cellpadding="2" cellspacing="0" align="center" valign="middle">
  <tr>
    <td colspan="3" align="left" ><b>1. Điều kiện ưu đãi:</b></td>
  </tr>';
foreach ($DATACIBANRA as $Item1) {
        if($Item1['machitieucha']==1) {
            $check = "&nbsp;&nbsp;&nbsp;&nbsp;";
            if($Item1['chonuudai']==1){
                $check = "&nbsp;X&nbsp;";
            }
            $html .= '<tr >
            <td align="center" width="10px"></td >
            <td align="center" width="40px" >['.$check.']</td >
            <td align="left" width="515px" ><i>' . $Item1['chitieu'] . '</i> </td >
           </tr >';
        }
    }
$html.=
'</table>
<table border="0" STYLE="border:0.2px solid #000;" cellpadding="2" cellspacing="0" align="center" valign="middle">
  <tr>
    <td colspan="2" align="left" ><b>2. Mức độ ưu đãi thuế:</b></td>
  </tr>';
foreach ($DATACIBANRA as $Item2) {
        if($Item2['machitieucha']==2) {
            $search = array('[PhanTram]','[SoNam]','[Nam]');
            $replace   = array($Item2['phantram'],$Item2['nam'],$Item2['ketunam']);
            $result = str_replace($search, $replace, $Item2['chitieu']);
            $html .= '<tr >
            <td align="center" width="30px">' . $Item2['machitieu'] . '</td >
            <td align="left" width="515px" >' . $result . ' </td >
           </tr >';
        }
    }
$html.=
'</table>



<table width="100%" border="0">
<tr>
<td><b><br>B. Xác định số thuế được ưu đãi</b></td>
<td style="font-size:8px;" align="right"></td>
</tr>
</table>
<table width="100%" border="0">
<tr>
<td></td>
<td style="font-size:8px;" align="right"><i>Đơn vị tiền: Đồng Việt Nam</i></td>
</tr>
</table>
<table border="1" cellpadding="2" cellspacing="0" align="center" valign="middle">
  <tr>
    <td STYLE="border:0.2px solid #000;" width="30px"><b>STT</b></td>
    <td STYLE="border:0.2px solid #000;" width="375px" ><b>Chỉ tiêu</b></td>
    <td STYLE="border:0.2px solid #000;" width="50px"><b>Mã chỉ tiêu</b></td>
    <td STYLE="border:0.2px solid #000;" width="110px" ><b>Số tiền</b></td>
  </tr>
  <tr>
    <td STYLE="border:0.2px solid #000;" width="30px">1</td>
    <td STYLE="border:0.2px solid #000;" width="375px" >2</td>
    <td STYLE="border:0.2px solid #000;" width="50px">3</td>
    <td STYLE="border:0.2px solid #000;" width="110px" >4</td>
  </tr>';
foreach ($DATACIBANRA as $Item3) {
        if($Item3['machitieucha']==3) {
            $machitieu = "";
            $indam = "";
            $dongindam = "";
            if($Item3['machitieu']=="3.1"){
                $machitieu = "[1]";
                $indam="<b>";
                $dongindam="</b>";
            }else if($Item3['machitieu']=="3.2"){
                $machitieu = "[2]";
            }else if($Item3['machitieu']=="3.3"){
                $machitieu = "[3]";
            }else if($Item3['machitieu']=="3.4"){
                $machitieu = "[4]";
                $indam="<b>";
                $dongindam="</b>";
            }else if($Item3['machitieu']=="4"){
                $indam="<b>";
                $dongindam="</b>";
            } else if($Item3['machitieu']=="4.1"){
                $machitieu = "[5]";
            }else if($Item3['machitieu']=="4.2"){
                $machitieu = "[6]";
            }else if($Item3['machitieu']=="4.3"){
                $machitieu = "[7]";
            }else if($Item3['machitieu']=="4.4"){
                $machitieu = "[8]";
            }else if($Item3['machitieu']=="4.5"){
                $machitieu = "[9]";
                $indam="<b>";
                $dongindam="</b>";
            }
            $html .= '<tr >
            <td STYLE = "border:0.2px solid #000 " width = "30px" align="center" >'.$indam.$Item3['machitieu'].$dongindam.'</td >
            <td STYLE = "border:0.2px solid #000;  " width = "375px" align="left" >'.$indam.$Item3['chitieu'].$dongindam.' </td >
            <td STYLE = "border:0.2px solid #000; " width = "50px" align="center" >'.$indam.$machitieu.$dongindam.' </td >
            <td STYLE = "border:0.2px solid #000; " width = "110px" align="right" >'.$indam.(($Item3['sotien'] != 0) ? number_format($Item3['sotien'], 0, ",", ".") : "").$dongindam.' </td >
          </tr >';
        }
    }
$html.=
'</table>

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
