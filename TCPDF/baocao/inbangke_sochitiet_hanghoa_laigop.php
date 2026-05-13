<?php
session_start();
require_once('tcpdf_include.php');
$DATACIBANRA = $_SESSION['SOCHITIETHHLAIGOP'];
$tungay_arr = explode("-",$_SESSION['THONGTINPHIEUSOHH']['tungay']);
$denngay_arr = explode("-",$_SESSION['THONGTINPHIEUSOHH']['denngay']);
$tungay = $tungay_arr[1];
$dengay = $denngay_arr[1];
$nam = $denngay_arr[0];
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


$pdf->SetFont('dejavuserifcondensed', '', 8);
$pdf->AddPage("L");
$html_ct="";
$html_title='
  <tr>
    <td STYLE="border:0.5px solid #000;" width="30px" rowspan="2">&nbsp;<br/>STT</td>
    <td STYLE="border:0.5px solid #000;" width="180px" rowspan="2">&nbsp;<br/>Diễn giải</td>
    <td STYLE="border:0.5px solid #000;" width="30px" rowspan="2">Đơn vị tính</td>
    <td STYLE="border:0.5px solid #000;" width="80px" rowspan="2">&nbsp;<br/>Đơn giá</td>
    <td STYLE="border:0.5px solid #000;" colspan="2"  width="160px">ĐƠN GIÁ</td>
    <td STYLE="border:0.5px solid #000;" colspan="2" width="160px">THÀNH TIỀN</td>
    <td STYLE="border:0.5px solid #000;" colspan="2" width="160px">Lãi gộp</td>
  </tr>
  <tr>
	
	<td STYLE="border:0.5px solid #000;">Giá vốn</td>
    <td STYLE="border:0.5px solid #000;" >Giá bán</td>
	
	<td STYLE="border:0.5px solid #000;">Giá vốn</td>
    <td STYLE="border:0.5px solid #000;" >Giá bán</td>
	
	<td STYLE="border:0.5px solid #000;">Tỷ lệ</td>
    <td STYLE="border:0.5px solid #000;" >Tiền</td>
  </tr>
';
$sott=0;
$tongdoanhthu=0;
$tongthue=0;
    foreach ($DATACIBANRA as $itemCT) {
        $sott++;
				    $soluongnhap=$itemCT["soluongnhap"];
					$soluongxuat=$itemCT["soluongxuat"];
					$thanhtien=$itemCT["thanhtien"];
					$thanhtienxuat=$itemCT["thanhtienxuat"];
					$dongianhap = round($itemCT["thanhtien"]/$itemCT["soluongnhap"],2);
					$dongiaxuat = round($itemCT["thanhtienxuat"]/$itemCT["soluongxuat"],2);
		$html_ct .= '
        <tr >
        <td STYLE="border:0.5px solid #000;" >' . $sott. '</td>
        
        <td STYLE="border:0.5px solid #000;" align="left">' . $itemCT["tenvt"] . '</td>
        <td STYLE="border:0.5px solid #000;">' . $itemCT["dvt"] . '</td>
        <td STYLE="border:0.5px solid #000;" align="right">'  . number_format($itemCT["dongianhap"],2,",",".") . '</td>
		
        <td STYLE="border:0.5px solid #000;" align="right">'; 
		$slnhap = $itemCT["soluongnhap"]; $html_ct .= number_format($dongianhap,2,",",".");
		$html_ct .= '</td><td STYLE="border:0.5px solid #000;" align="right">'; 
			$ttnhap =$itemCT["thanhtien"]; 
			$html_ct .=number_format($dongiaxuat,0,",",".") ; 
		$html_ct .='</td><td STYLE="border:0.5px solid #000;" align="right">';  
			$slxuat = $itemCT["soluongxuat"];
			$html_ct .=number_format($itemCT["thanhtien"],2,",",".") ;
		$html_ct .= '</td><td STYLE="border:0.5px solid #000;" align="right">'; 
			$ttxuat =$itemCT["thanhtienxuat"]; 
			$html_ct .=number_format($itemCT["thanhtienxuat"],0,",",".") ; 
		$html_ct .= '</td><td STYLE="border:0.5px solid #000;" align="right">';  
			$soluongton =$soluongton+$slnhap-$slxuat; 
			$html_ct .= number_format($soluongton,0,",","."); 
		$html_ct .= '</td><td STYLE="border:0.5px solid #000;" align="right">';  
			$thanhtienton =$thanhtienton+$ttnhap-$ttxuat; 
			$html_ct .=number_format($thanhtienton,0,",","."); 	
		$html_ct .= '</td>

      </tr>';
}

$html = '
<table width="100%" border="0">
  <tr>
    <td align="center" WIDTH="15%"></td>    
    <td align="center" WIDTH="62%"><B><h3>PHỤ LỤC</h3></B></td>
    <td WIDTH="23%">
    <table border="0">
    
   <tr>
   <td align="center"><i>Mẫu số S07-DNN<br/>
        Ban hành theo Quyết định số 48/2006/QĐ-BTC ngày 14/9/2006 của Bổ trưởng Bộ Tài Chính</i>
   </td>
</tr>

</table>
    
</td>
  </tr>
</table>

<table border="0" align="center">
  <tr>
    <td><b>'.$_SESSION["THONGTINPHIEUSOHH"]['tenphieu'].'</b></td>
  </tr>
  <tr>
    <td><b> '.$_SESSION["THONGTINPHIEUSOHH"]['ngayhoadon'].'</b></td>
  </tr>
</table>
<table border="0" cellspacing="1" cellpadding="1">
  <tr>
    <td>- Tên nguyên liệu, vật liệu, công cụ, dụng cụ(sản phẩm, hàng hóa):
      <table width="100%" border="0" STYLE="font-weight: bold ">
        <tr>
          <td>'.$_SESSION['DSMAVT'][$k]['tenvt'].'</td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td>- Quy cách <table width="100%" border="0" >
        <tr>
          <td><table width="40%" border="0">
		  <tr>
		  <td width="35%"></td>
		  <td>&nbsp;- Mã số:&nbsp; <b>'.$_SESSION['DSMAVT'][$k]['mavt'].'</b></td>
		  <td>- Tài khoản:&nbsp;<b>'.$_SESSION['DSMAVT'][$k]['matk'].'</b></td>
		  </tr>
		  </table></td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td>- Tên kho: <table width="100%" >
        <tr>
          <td>
		  <table width="40%" border="0">
		  <tr>
		  <td width="35%" ></td>
		  <td width="60%">- Chú thích:&nbsp;</td>
		  </tr>
		  </table>
		  </td>
        </tr>
    </table></td>
  </tr>

</table>
<table width="100%" border="0">
  <tr>
    <td align="right"></td>
  </tr>
</table>
<table width="100%" border="0">
  <tr>
    <td align="right">Đơn vị tính: <b>'.$_SESSION['DSMAVT'][$k]['dvt'].'</b></td>
  </tr>
</table><table border="0" cellpadding="2" cellspacing="0" align="center" valign="middle">'.$html_title.$html_ct.'
<tr>
    <td STYLE="border:0.5px solid #000;"></td>
    <td STYLE="border:0.5px solid #000;"><b>Tổng</b></td>
    <td STYLE="border:0.5px solid #000;"></td>
    <td STYLE="border:0.5px solid #000;"></td>
    <td align="right" STYLE="border:0.5px solid #000;"><b>'.number_format($soluongnhap,2,",",".").'</b></td>
    <td align="right" STYLE="border:0.5px solid #000;"><b>'.number_format($thanhtien,0,",",".").'</b></td>
	
	<td align="right" STYLE="border:0.5px solid #000;"><b>'.number_format($soluongxuat,2,",",".").'</b></td>
    <td align="right" STYLE="border:0.5px solid #000;"><b>'.number_format($thanhtienxuat,0,",",".").'</b></td>
	
	<td align="right" STYLE="border:0.5px solid #000;"><b>'.number_format($soluongton,0,",",".").'</b></td>
    <td align="right" STYLE="border:0.5px solid #000;"><b>'.number_format($thanhtienton,0,",",".").'</b></td>
	
  </tr>
</table>
<table><tr><td></td></tr></table>
<table border=1 align="center" width=100%><tr>
<td>Người ghi sổ</td>
<td>Kế toán trưởng</td>
<td>';
$timengaylap = strtotime($_SESSION["THONGTINPHIEUSOHH"]['ngaylap']);
$html.=date("d-m-Y",$timengaylap);
$html.='<br/>Giám đốc</td></tr></table>
';
$pdf->writeHTML($html, true, false, true, false, '');

$pdf->lastPage();

$pdf->Output('bang_ke_hh_dichvu.pdf', 'I');

