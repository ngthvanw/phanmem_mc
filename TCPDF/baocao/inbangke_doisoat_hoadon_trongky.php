<?php
session_start();
$quy = $_GET['quy'];
if ($quy == "I") {
    $tungay = "01/01/" . $_SESSION['NienDo'];
    $denngay = "31/03/" . $_SESSION['NienDo'];
}
if ($quy == "II") {
    $tungay = "01/04/" . $_SESSION['NienDo'];
    $denngay = "30/06/" . $_SESSION['NienDo'];
}
if ($quy == "III") {
    $tungay = "01/07/" . $_SESSION['NienDo'];
    $denngay = "30/09/" . $_SESSION['NienDo'];
}
if ($quy == "VI") {
    $tungay = "01/10/" . $_SESSION['NienDo'];
    $denngay = "31/12/" . $_SESSION['NienDo'];
}
require_once('tcpdf_include.php');
$BAOCAO_SUDUNGHD = $_SESSION['BAOCAO_SUDUNGHD'];
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
$pdf->AddPage("");
$html_ct = "";
$html_title = '
<tr style="font-weight: bold;">
    <td rowspan="2" STYLE="border:0.5px solid #000;" width="20px" >&nbsp;<br/>STT</td>
	<td rowspan="2" STYLE="border:0.5px solid #000;" width="80px" >&nbsp;<br/>Mẫu hóa đơn</td>
	<td rowspan="2" STYLE="border:0.5px solid #000;" width="70px" >&nbsp;<br/>Ký hiệu hóa đơn</td>
	<td colspan="3" STYLE="border:0.5px solid #000;" width="240px" >Hoá đơn xoá</td>
    <td rowspan="2" STYLE="border:0.5px solid #000;" width="134px">&nbsp;<br/>Ghi chú</td>
  </tr>
  <tr>
    <td STYLE="border:0.5px solid #000;" width="60px" >Hoá đơn</td>
	<td STYLE="border:0.5px solid #000;" width="60px">Hợp lệ</td>
    <td STYLE="border:0.5px solid #000;" width="60px">Mất Liên đỏ</td>
    <td STYLE="border:0.5px solid #000;" width="60px">thay thế</td>	
</tr>

  <tr style="font-weight: bold;">
    <td rowspan="1" STYLE="border:0.5px solid #000;" >(1)</td>
    <td rowspan="1" STYLE="border:0.5px solid #000;">(2)</td>
	
    <td rowspan="1" STYLE="border:0.5px solid #000;">(3)</td>
	<td STYLE="border:0.5px solid #000;" >(4)</td>
	
    <td rowspan="1" STYLE="border:0.5px solid #000;">(5)</td>
    <td rowspan="1" STYLE="border:0.5px solid #000;" >(6)</td>
    <td rowspan="1" STYLE="border:0.5px solid #000;" >(7)</td>
    <td rowspan="1" STYLE="border:0.5px solid #000;" >(8)</td>
	
  </tr>
  ';
$sott = 0;
$tongdk = "";
$tongnhap = "";
$tongps = "";
$tongton = "";
foreach ($BAOCAO_SUDUNGHD as $itemCT) {
    $sott++;
    $html_ct .= '
        <tr >
        <td STYLE="border:0.5px solid #000;" >' . $sott . '</td>
        <td STYLE="border:0.5px solid #000;">'.$itemCT["mauso"].'</td>
        <td STYLE="border:0.5px solid #000;">' . $itemCT['kyhieu'] . '</td>
       
        <td STYLE="border:0.5px solid #000;" align="center">';
    $html_ct .= $itemCT["hoadon"];
    $html_ct .= '</td>
		<td STYLE="border:0.5px solid #000;" align="center">';
        if($itemCT["hople"]==1){
            $html_ct .= "Có";
        }else if($itemCT["hople"]==2){
            $html_ct .= "Không";
        }else{
            $html_ct .= "";
        }
    $html_ct .='</td>
		<td STYLE="border:0.5px solid #000;" align="center">';
    if($itemCT["liendo"]==1){
        $html_ct .= "Có";
    }else if($itemCT["liendo"]==2){
        $html_ct .= "Không";
    }else{
        $html_ct .= "";
    }
    $html_ct .='</td>
		<td STYLE="border:0.5px solid #000;" align="center">' . $itemCT["thaythe"] . '</td>
		<td STYLE="border:0.5px solid #000;" align="left">';
        $html_ct .= $itemCT["ghichu"];
    $html_ct .= '</td>
    </tr>';
}

$html = '
<table border="0" width="100%">
<tr>
<td width="25%"></td>
<td width="60%" style="text-align: center;"><b>CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM<br/>Độc lập- Tự do- Hạnh phúc<br/>---------------<br/></b><b>' . $_SESSION["THONGTINPHIEU_BCHD"]['tenphieu'] . '</b><br/><b>[01] Kỳ tính thuế: ' . $_SESSION["THONGTINPHIEU_BCHD"]['ngayhoadon'] . '</b></td>
<td width="15%" style="text-align: center;" ></td>
</tr>
</table>
<table width="100%" border="0">
  <tr>
    <td align="left" WIDTH="70%">
		<table border="0" cellspacing="1" cellpadding="1">
  <tr>
    <td>1. Tên tổ chức, cá nhân:
      <table width="100%" border="0" STYLE="font-weight: bold ">
        <tr>
          <td>' . $_SESSION['TenCongTy'] . '</td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td>2. Địa chỉ: <table width="100%" border="0" STYLE="font-weight: bold">
        <tr>
          <td>' . $_SESSION['DiaChi'] . '</td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td>3. Mã số thuế: <table width="100%" STYLE="font-weight: bold">
        <tr>
          <td>' . $_SESSION['MST'] . '</td>
        </tr>
    </table></td>
  </tr>
</table>
	</td>    
    <td align="center" WIDTH="30%">
<table border="0" align="center">
  <tr>
    <td></td>
  </tr>
  <tr>
    <td></td>
  </tr>
</table>
	</td>
  </tr>
  <tr>
    <td>Ngày đầu kỳ báo cáo: '.$tungay.'</td>
    <td align="right">Ngày cuối kỳ báo cáo: '.$denngay.'</td>
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
    <td STYLE="border:0.5px solid #000;"><b>Tổng</b></td>
	<td STYLE="border:0.5px solid #000;"></td>
	<td STYLE="border:0.5px solid #000;"><b>'.$sott.'</b></td>
    <td STYLE="border:0.5px solid #000;"></td>
    <td STYLE="border:0.5px solid #000;"></td>
    <td STYLE="border:0.5px solid #000;"></td>
     <td STYLE="border:0.5px solid #000;"></td>
  </tr>
</table>
<table><tr><td></td></tr></table>
<table width="100%" border="0" cellpadding="2">
  <tr>
    <td width="33%"  align="center">Người lập báo cáo</td>
	<td width="33%"  align="center">Kế toán</td>
	<td width="33%"  align="center">Đại diện doanh nghiệp</td>
  </tr>
</table>
';
$pdf->writeHTML($html, true, false, true, false, '');

$pdf->Output('Ban_Doi_Soat_Hoa_Don_Xoa.pdf', 'I');

