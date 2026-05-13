<?php
session_start();
require_once('tcpdf_include.php');
$DATACIBANRA = $_SESSION["LISTCTMUAVAO"];
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
$pdf->SetMargins(10, 2, 8);
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
    <td STYLE="border:0.5px solid #000;" width="20px" rowspan="2">&nbsp;<br/>STT</td>
    <td STYLE="border:0.5px solid #000;" width="180px" colspan="3">Hóa đơn, chứng từ, biên lai nộp thuế</td>
    <td STYLE="border:0.5px solid #000;" width="180px" rowspan="2">&nbsp;<br/>Tên người bán</td>
    <td STYLE="border:0.5px solid #000;" width="67px" rowspan="2">Mã số thuế người bán</td>
    <td STYLE="border:0.5px solid #000;" width="100px" rowspan="2">&nbsp;<br/>Mặt hàng</td>
    <td  STYLE="border:0.5px solid #000;" rowspan="2">Giá trị HHDV mua vào chưa có thuế</td>
    <td width="27px" STYLE="border:0.5px solid #000;" rowspan="2">Thuế suất %</td>
    <td STYLE="border:0.5px solid #000;" rowspan="2">Thuế giá trị gia tăng</td>
    <td STYLE="border:0.5px solid #000;" rowspan="2">Ghi chú hoặc thời hạn thanh toán chậm</td>
  </tr>
  <tr>
    <td STYLE="border:0.5px solid #000;" >Ký hiệu hóa đơn</td>
    <td STYLE="border:0.5px solid #000;">Số hóa đơn</td>
    <td STYLE="border:0.5px solid #000;" >Ngày tháng năm phát hành</td>
  </tr>
  <tr>
    <td STYLE="border:0.5px solid #000;">(1)</td>
    <td STYLE="border:0.5px solid #000;">(2)</td>
    <td STYLE="border:0.5px solid #000;">(3)</td>
    <td STYLE="border:0.5px solid #000;">(4)</td>
    <td STYLE="border:0.5px solid #000;">(5)</td>
    <td STYLE="border:0.5px solid #000;">(6)</td>
    <td STYLE="border:0.5px solid #000;">(7)</td>
    <td STYLE="border:0.5px solid #000;">(8)</td>
    <td STYLE="border:0.5px solid #000;">(9)</td>
    <td STYLE="border:0.5px solid #000;">(10)</td>
    <td STYLE="border:0.5px solid #000;">(11)</td>
  </tr>';
$sott=0;
$tongdoanhthu=0;
$tongthue=0;
foreach ($DATACIBANRA as $k=>$itemTS) {
    $html_ct .='<tr><td STYLE="border:0.5px solid #000;" colspan="11" align="left"><i><b>';
    if($k==0){
        $html_ct.="Hàng hóa dịch vụ riêng cho SXKD chịu thuế GTGT và sử dụng cho các hoạt động cung cấp hàng hóa, dịch vụ không kê khai, nộp thuế GTGT đủ điều kiện khấu trừ thuế:";
    }else{
        $html_ct.="Hàng hóa, dịch vụ dùng chung cho SXKD chịu thuế và không chịu thuế đủ điều kiện khấu trừ:";
    }
    $html_ct.='</b></i></td></tr>';
    foreach ($itemTS as $itemCT) {
        $sott++;
        $tongdoanhthu+=$itemCT["thanhtien"];
        $tongthue+=$itemCT["thue"];
    $html_ct .= '
        <tr >
        <td STYLE="border:0.5px solid #000;" >' . $sott . '</td>
        <td STYLE="border:0.5px solid #000;">' . strtoupper ($itemCT["seri"]) . '</td>
        <td STYLE="border:0.5px solid #000;">' . $itemCT["sct"] . '</td>
        <td STYLE="border:0.5px solid #000;">'; $time = strtotime($itemCT["ngayghiso"]);
        $html_ct.=date("d-m-Y",$time); $html_ct.='</td>
        <td STYLE="border:0.5px solid #000;" align="left">' . $itemCT["tenkh"] . '</td>
        <td STYLE="border:0.5px solid #000;">' . $itemCT["masothue"] . '</td>
        <td STYLE="border:0.5px solid #000;" align="left">' . $itemCT["tenvt"] . '</td>
        <td STYLE="border:0.5px solid #000;" align="right">' . number_format($itemCT["thanhtien"],0,",",".") . '</td>
        <td STYLE="border:0.5px solid #000;" align="center">' . number_format($itemCT["thuesuat"],0,",",".") . '</td>
        <td STYLE="border:0.5px solid #000;" align="right">' . number_format($itemCT["thue"],0,",",".") . '</td>
        <td STYLE="border:0.5px solid #000;" align="left">' . $itemCT["chuthich"] . '</td>
      </tr>
    ';
}
}


$html = '
<table width="100%" border="0">
  <tr>
    <td align="center" WIDTH="15%"></td>    
    <td align="center" WIDTH="70%"><B><h3>PHỤ LỤC</h3></B></td>
    <td WIDTH="15%">
    <table border="1">
    
   <tr>
   <td align="center"><i>Mẫu số 01-2/GTGT<br/>
        (Ban hành kèm theo thông tư số 26/12/2011 của Bộ Tài Chính)</i>
   </td>
</tr>

</table>
    
</td>
  </tr>
</table>

<table border="0" align="center">
  <tr>
    <td><b>'.$_SESSION["THONGTINPHIEU"]['tenphieu'].'</b></td>
  </tr>
  <tr>
    <td><b>(Kèo theo tờ khai thuế GTGT mẫ số 01/GTGT ngày 16/02/2017)</b></td>
  </tr>
  <tr>
    <td><b>[01] Kỳ tính thuế: '.$_SESSION["THONGTINPHIEU"]['ngayhoadon'].'</b></td>
  </tr>
</table>
<table border="0" cellspacing="1" cellpadding="1">
  <tr>
    <td>[02] Tên người nộp thuế:
      <table width="100%" border="0" STYLE="border-bottom:0.5px solid #000;font-weight: bold ">
        <tr>
          <td>'.$_SESSION['TenCongTy'].'</td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td>[03] Mã số thuế: <table width="100%" border="0" STYLE="border-bottom:0.5px solid #000;font-weight: bold">
        <tr>
          <td>'.$_SESSION['MST'].'</td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td>[04] Tên đại lý thuế(nếu có): <table width="100%" STYLE="border-bottom:0.5px solid #000;font-weight: bold">
        <tr>
          <td>CTY KẾ TOÁN VÀ TƯ VẤN THUẾ CHIẾN THUẬT</td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td>[05] Mã số thuế: <table width="100%" STYLE="border-bottom:0.5px solid #000;font-weight: bold">
        <tr>
          <td>2100462770</td>
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
    <td align="right">Đơn vị tiền: <b>Đồng Việt Nam</b></td>
  </tr>
</table><table border="0" cellpadding="2" cellspacing="0" align="center" valign="middle">'.$html_title.$html_ct.'
<tr>
    <td STYLE="border:0.5px solid #000;"></td>
    <td STYLE="border:0.5px solid #000;"></td>
    <td STYLE="border:0.5px solid #000;"></td>
    <td STYLE="border:0.5px solid #000;"></td>
    <td STYLE="border:0.5px solid #000;"><b>Tổng</b></td>
    <td STYLE="border:0.5px solid #000;"></td>
    <td STYLE="border:0.5px solid #000;"></td>
  
    <td align="right" STYLE="border:0.5px solid #000;"><b>'.number_format($tongdoanhthu,0,",",".").'</b></td>
    <td STYLE="border:0.5px solid #000;"></td>
    <td align="right" STYLE="border:0.5px solid #000;"><b>'.number_format($tongthue,0,",",".").'</b></td>
    <td STYLE="border:0.5px solid #000;"></td>
  </tr>
</table>
<table><tr><td></td></tr></table>
<table width="500" border="0">
  <tr>
    <td width="280"><strong>Tổng doanh thu hàng hóa, dịch vụ mua vào:</strong></td>
    <td width="70" align="right"><b>'.number_format($tongdoanhthu,0,",",".").'</b></td>
  </tr>
 
  <tr>
    <td><strong>Tổng thuế GTGT của hàng hóa, dịch vụ mua vào:</strong></td>
    <td align="right"><b>'.number_format($tongthue,0,",",".").'</b></td>
  </tr>
  <tr>
    <td colspan="2">Tôi cam đoan số liệu khai trên là đúng và chịu trách nhiệm trước pháp luật về số liệu đã khai ./.</td>
  </tr>
</table>
';
$pdf->writeHTML($html, true, false, true, false, '');
$html_foodter='
<table width="100%" border="0" cellpadding="2">
  <tr>
    <td width="70%">&nbsp;</td>
    <td width="30%" rowspan="2" align="center"><table width="200" border="0">
      <tr>
        <td><em>Trà Vinh Ngày ';
$time = strtotime($_SESSION["THONGTINPHIEU"]['ngaylap']);
$html_foodter.=date("d-m-Y",$time);


$html_foodter.='</em></td>
      </tr>
      <tr>
        <td><strong>NGƯỜI NỘP THUẾ hoặc</strong></td>
      </tr>
      <tr>
        <td><strong>ĐẠI DIỆN HỢP PHÁP CỦA NGƯỜI NỘP THUẾ</strong></td>
      </tr>
      <tr>
        <td><em>(Ký ghi rõ họ tên: chức vụ và đóng dấu (nếu có))</em></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><table width="200" border="0" cellspacing="2">
      <tr>
        <td align="center"><strong>Nhân viên đại lý thuế</strong></td>
        </tr>
      <tr>
        <td>&nbsp;</td>
        </tr>
      <tr>
        <td>Họ và tên: <strong>Trần Thiện Thuật</strong></td>
        </tr>
      <tr>
        <td>Chứng chỉ hành nghề số: <strong>2011000948</strong></td>
        </tr>
    </table></td>
  </tr>
</table>
';
$break = $pdf->checkquatrang(10);
if($break){
	 $pdf->SetAutoPageBreak(True); 
	$pdf->writeHTML($html_foodter, true, false, true, false, '');
}else{
	$pdf->writeHTML($html_foodter, true, false, true, false, '');
}

//$pdf->lastPage();

$pdf->Output('bang_ke_hh_dichvu.pdf', 'I');

