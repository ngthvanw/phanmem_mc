<?php
session_start();
require_once('tcpdf_include.php');
$DATACIBANRA = $_SESSION['SOCHITIETHH'];
$tungay_arr = explode("-",$_SESSION['THONGTINPHIEUSOHH']['tungay']);
$denngay_arr = explode("-",$_SESSION['THONGTINPHIEUSOHH']['denngay']);
$tungay = $tungay_arr[1];
$dengay = $denngay_arr[1];
$nam = $denngay_arr[0];
// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->setFontSubsetting(false) ;

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


foreach ($DATACIBANRA as $k=>$ItemChiTiet){
$pdf->SetFont('dejavuserifcondensed', '', 8);
$pdf->AddPage("L");
$html_ct="";
$html_title='
<table width="100%" border="0">
  <tr>
    <td align="left" WIDTH="62%">
		<table>
			<tr>
				<td><b>'.$_SESSION['TenCongTy'].'</b></td>
				</tr>
				<tr>
				<td>'.$_SESSION['DiaChi'].'</td>
				</tr>
				<tr>
				<td>MST: '.$_SESSION['MST'].'</td>
			</tr>
		</table>
	</td>    
    <td align="center" WIDTH="15%"><B><h3></h3></B></td>
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
</table>
<table align="center">
  <tr>
    <td STYLE="border:0.5px solid #000;" width="30px" rowspan="2">&nbsp;<br/>STT</td>
    <td STYLE="border:0.5px solid #000;" width="30px" rowspan="2">Ngày<br/>ghi sổ</td>
    <td STYLE="border:0.5px solid #000;" width="80px" colspan="2">Chứng từ</td>
    <td STYLE="border:0.5px solid #000;" width="180px" rowspan="2">&nbsp;<br/>Diễn giải</td>
    <td STYLE="border:0.5px solid #000;" width="30px" rowspan="2">TK<br/>đối ứng</td>
    <td STYLE="border:0.5px solid #000;" width="60px" rowspan="2">&nbsp;<br/>Đơn giá</td>
    <td STYLE="border:0.5px solid #000;" colspan="2"  width="130px">Nhập</td>
    <td STYLE="border:0.5px solid #000;" colspan="2" width="130px">Xuất</td>
    <td STYLE="border:0.5px solid #000;" colspan="2" width="130px">Tồn</td>
  </tr>
  <tr>
    <td STYLE="border:0.5px solid #000;" width="50px">Số hiệu</td>
    <td STYLE="border:0.5px solid #000;"width="30px" >Ngày</td>
	
	<td STYLE="border:0.5px solid #000;">Số lượng</td>
    <td STYLE="border:0.5px solid #000;" >Thành tiền</td>
	
	<td STYLE="border:0.5px solid #000;">Số lượng</td>
    <td STYLE="border:0.5px solid #000;" >Thành tiền</td>
	
	<td STYLE="border:0.5px solid #000;">Số lượng</td>
    <td STYLE="border:0.5px solid #000;" >Thành tiền</td>
  </tr>
  </table>
';
$w = array(0,10,11,18,11,63,11,21,23,23,23,23,23,23);
$h = 4;
$pdf->writeHTML($html_title, true, false, true, false, '');

	$soluongnhap=0;
	$soluongxuat=0;
	$thanhtien=0;
	$thanhtienxuat=0;	
	$thanhtienton=$_SESSION['DSMAVT'][$k]['thanhtienton'];
	$soluongton =$_SESSION['DSMAVT'][$k]['soluongton'];
	$pdf->MultiCell($w[1],$h,'','LTRB','L',$fill,0);
	$pdf->MultiCell($w[2],$h,'','LTRB','L',$fill,0);
	$pdf->MultiCell($w[3],$h,'','LTRB','L',$fill,0);
	$pdf->MultiCell($w[4],$h,'','LTRB','L',$fill,0);
	$pdf->MultiCell($w[5],$h,'Số dư đầu kỳ','LTRB','L',$fill,0);
	$pdf->MultiCell($w[6],$h,'','LTRB','L',$fill,0);
	$pdf->MultiCell($w[7],$h,number_format($_SESSION['DSMAVT'][$k]['dongiaton'],2,",","."),'LTRB','R',$fill,0);
	$pdf->MultiCell($w[8],$h,'','LTRB','L',$fill,0);
	$pdf->MultiCell($w[9],$h,'','LTRB','L',$fill,0);
	$pdf->MultiCell($w[10],$h,'','LTRB','L',$fill,0);
	$pdf->MultiCell($w[11],$h,'','LTRB','L',$fill,0);
	$pdf->MultiCell($w[12],$h,number_format($_SESSION['DSMAVT'][$k]['soluongton'],2,",","."),'LTRB','R',$fill,0);
	$pdf->MultiCell($w[13],$h,number_format($_SESSION['DSMAVT'][$k]['thanhtienton'],0,",","."),'LTRB','R',$fill,0);
	$pdf->ln();
 foreach ($ItemChiTiet as $thang=>$itemMaVT) {
	$sott++;
	$sopt = count($itemMaVT);
	$thanhtiencuoiky = $itemMaVT[$sopt-1]['ttck'];
	$slcuoiky = $itemMaVT[$sopt-1]['slck'];
	$dongiabinhquan_trongthang = round((($thanhtiencuoiky+$thanhtienton)/($slcuoiky+$soluongton)),2);
	 foreach($itemMaVT as $itemCT){
		 $soluongnhap+=$itemCT["soluongnhap"];
				$soluongnhapthang+=$itemCT["soluongnhap"];
				$soluongxuat+=$itemCT["soluongxuat"];
				$soluongxuatthang+=$itemCT["soluongxuat"];
				$thanhtien+=$itemCT["thanhtien"];
				$thanhtienthang+=$itemCT["thanhtien"];
				
				
				if(number_format($itemCT["soluongxuat"])==0){
					$dongiabinhquan = $itemCT['dongianhap'];
				}else{
					$dongiabinhquan = $dongiabinhquan_trongthang;
				}
				
				$thanhtienxuatbq = $dongiabinhquan* $itemCT["soluongxuat"];
				$thanhtienxuat+=$thanhtienxuatbq;
				$thanhtienxuatthang+=$thanhtienxuat;
				
					$pdf->MultiCell($w[1],$h,'','LTRB','L',$fill,0);
	$pdf->MultiCell($w[2],$h,'','LTRB','L',$fill,0);
	$pdf->MultiCell($w[3],$h,'','LTRB','L',$fill,0);
	$pdf->MultiCell($w[4],$h,'','LTRB','L',$fill,0);
	$pdf->MultiCell($w[5],$h,'Số dư đầu kỳ','LTRB','L',$fill,0);
	$pdf->MultiCell($w[6],$h,'','LTRB','L',$fill,0);
	$pdf->MultiCell($w[7],$h,number_format($_SESSION['DSMAVT'][$k]['dongiaton'],2,",","."),'LTRB','R',$fill,0);
	$pdf->MultiCell($w[8],$h,'','LTRB','L',$fill,0);
	$pdf->MultiCell($w[9],$h,'','LTRB','L',$fill,0);
	$pdf->MultiCell($w[10],$h,'','LTRB','L',$fill,0);
	$pdf->MultiCell($w[11],$h,'','LTRB','L',$fill,0);
	$pdf->MultiCell($w[12],$h,number_format($_SESSION['DSMAVT'][$k]['soluongton'],2,",","."),'LTRB','R',$fill,0);
	$pdf->MultiCell($w[13],$h,number_format($_SESSION['DSMAVT'][$k]['thanhtienton'],0,",","."),'LTRB','R',$fill,0);
	$pdf->ln();
		 
	 }
	$pdf->ln();
 }

$html = '
<table border="0" cellpadding="2" cellspacing="0" align="center" valign="middle">
<tr>
    <td STYLE="border:0.5px solid #000;"></td>
    <td STYLE="border:0.5px solid #000;"></td>
    <td STYLE="border:0.5px solid #000;"></td>
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
}

$pdf->Output('bang_ke_hh_dichvu.pdf', 'I');

