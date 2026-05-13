<?php
session_start();
//include("../../config.php");
$data =$_SESSION["TOKHAITHUE"];
$thuedenghihoan = str_replace(",","",$_GET['thuedenghihoan']);
$doanhsogtgtkhautru = str_replace(",","",$_GET['doanhsogtgtkhautru']);
$doanhsogtgtdaura = str_replace(",","",$_GET['doanhsogtgtdaura']);
$thuegtgtdaura = str_replace(",","",$_GET['thuegtgtdaura']);
$thuegtgtngoaitinh = str_replace(",","",$_GET['thuegtgtngoaitinh']);
$thuegtgtmuavaoduandautu= str_replace(",","",$_GET['thuegtgtmuavaoduandautu']);
$loaitokhai= str_replace(",","",$_GET['loaitokhai']);
$nhomnganh = trim($_GET['nhomnganh']);

// Tính toán dữ liệu trước 
// Phân phối hàng hoá
$gthh_PPHH  = ($data['II2']['gthh']  == 0) ? "" : number_format($data['II2']['gthh'], 0, ",", ".");
$thue_PPHH  = ($data['II2']['thue']  == 0) ? "" : number_format($data['II2']['thue'], 0, ",", ".");
$gthh_tncn_PPHH  = ($data['II2']['gthh_tncn']  == 0) ? "" : number_format($data['II2']['gthh_tncn'], 0, ",", ".");
$thue_tncn_PPHH  = ($data['II2']['thue_tncn']  == 0) ? "" : number_format($data['II2']['thue_tncn'], 0, ",", ".");

// Dịch vụ, xây dựng không bao thầu nguyên vật liệu
$gthh_HHKoBT = ($data['II2b']['gthh'] == 0) ? "" : number_format($data['II2b']['gthh'], 0, ",", ".");
$thue_HHKoBT = ($data['II2b']['thue'] == 0) ? "" : number_format($data['II2b']['thue'], 0, ",", ".");
$gthh_tncn_HHKoBT = ($data['II2b']['gthh_tncn'] == 0) ? "" : number_format($data['II2b']['gthh_tncn'], 0, ",", ".");
$thue_tncn_HHKoBT = ($data['II2b']['thue_tncn'] == 0) ? "" : number_format($data['II2b']['thue_tncn'], 0, ",", ".");

//dịch vụ chịu thuế 0% và không chịu thuế
$gthh_KoChiuThue  = ($data['II1']['gthh']  == 0) ? "" : number_format($data['II1']['gthh'], 0, ",", ".");

//Sản xuất, vận tải, dịch vụ có gắn với hàng hoá, xây dụng có bao thầu nguyên vật liệu
$gthh_HHCoBT = ($data['II2c']['gthh'] == 0) ? "" : number_format($data['II2c']['gthh'], 0, ",", ".");
$thue_HHCoBT = ($data['II2c']['thue'] == 0) ? "" : number_format($data['II2c']['thue'], 0, ",", ".");
$gthh_tncn_HHCoBT = ($data['II2c']['gthh_tncn'] == 0) ? "" : number_format($data['II2c']['gthh_tncn'], 0, ",", ".");
$thue_tncn_HHCoBT = ($data['II2c']['thue_tncn'] == 0) ? "" : number_format($data['II2c']['thue_tncn'], 0, ",", ".");

//Hoạt động kinh doanh khác
$gthh_HHKhac  = ($data['II3']['gthh']  == 0) ? "" : number_format($data['II3']['gthh'], 0, ",", ".");
$thue_HHKhac  = ($data['II3']['thue']  == 0) ? "" : number_format($data['II3']['thue'], 0, ",", ".");
$gthh_tncn_HHKhac  = ($data['II3']['gthh_tncn']  == 0) ? "" : number_format($data['II3']['gthh_tncn'], 0, ",", ".");
$thue_tncn_HHKhac  = ($data['II3']['thue_tncn']  == 0) ? "" : number_format($data['II3']['thue_tncn'], 0, ",", ".");

$Tong_gthh = $data['II2']['gthh'] + $data['II2b']['gthh'] + $data['II2c']['gthh'] + $data['II3']['gthh'];
$Tong_thue = $data['II2']['thue'] + $data['II2b']['thue'] + $data['II2c']['thue'] + $data['II3']['thue'];
$Tong_gthh_tncn = $data['II2']['gthh_tncn'] + $data['II2b']['gthh_tncn'] + $data['II2c']['gthh_tncn'] + $data['II3']['gthh_tncn'];
$Tong_thue_tncn = $data['II2']['thue_tncn'] + $data['II2b']['thue_tncn'] + $data['II2c']['thue_tncn'] + $data['II3']['thue_tncn'];

$Tong_gthh_in = ($Tong_gthh == 0) ? "" : number_format($Tong_gthh, 0, ",", ".");
$Tong_thue_in = ($Tong_thue == 0) ? "" : number_format($Tong_thue, 0, ",", ".");
$Tong_gthh_tncn_in = ($Tong_gthh_tncn == 0) ? "" : number_format($Tong_gthh_tncn, 0, ",", ".");
$Tong_thue_tncn_in = ($Tong_thue_tncn == 0) ? "" : number_format($Tong_thue_tncn, 0, ",", ".");


$Ngayky = strtotime($_SESSION["THONGTINPHIEU"]['ngaylap']);
$Ngayky_in = "Ngày " . date("d", $Ngayky) . " tháng " . date("m", $Ngayky) . " năm " . date("Y", $Ngayky);

require_once('tcpdf_include.php');

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

$pdf->SetFont('dejavuserifcondensed', '', 8);
$pdf->AddPage("");
$html = <<<EOD
<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8">
<title>Tờ khai 01/CNKD</title>
<style>
@page { size: A4; margin: 15mm; }
body {
  
  font-size: 10pt;
  line-height: 1.4;
  width: 210mm;
  min-height: 297mm;
  margin: auto;
}
table { border-collapse: collapse; width: 100%; }
td { vertical-align: top; font-size: 10pt; padding: 2px; }
.header { text-align: center; font-weight: bold; }
.small { font-size: 10pt; }
.box {
  border: 1px solid #000;
  display: inline-block;
  width: 16px;
  height: 18px;
  line-height: 18px;
  text-align: center;
  font-size: 10pt;
  margin-right: 1px;
}
</style>
</head>
<body>

<!-- Quốc hiệu + Mẫu số -->
<table>
  <tr>
    <td style="text-align:center; width:70%;">
      <b>CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM</b><br>
      <span class="small">Độc lập - Tự do - Hạnh phúc</span>
    </td>
    <td style="text-align:center; width:30%; border:1px solid #000; padding:5px;font-size:8pt">
      Mẫu số: 01/CNKD<br>
      (Ban hành kèm theo Thông tư số 40/2021/TT-BTC<br>
      ngày 01/6/2021 của Bộ trưởng Bộ Tài chính)
    </td>
  </tr>
</table>

<!-- Tiêu đề -->
<table>
  <tr>
    <td class="header" style="padding-top:10px;">
      <b>TỜ KHAI THUẾ ĐỐI VỚI HỘ KINH DOANH, CÁ NHÂN KINH DOANH</b><br>
      <i>(HKD, CNKD nộp thuế theo phương pháp kê khai)</i>
    </td>
  </tr>
</table>

<!-- Kỳ tính thuế -->
<table>
  <tr>
    <td>[01] Kỳ tính thuế: <b>{$_SESSION["THONGTINPHIEU"]['ngayhoadon']}</b></td>
  </tr>
  <tr>
    <td>[02] Lần đầu [X] &nbsp;&nbsp;&nbsp; [03] Bổ sung lần thứ [ ]</td>
  </tr>
</table>

<!-- Thông tin người nộp thuế -->
<table border="0">
  <tr>
    <td width="25%">[04] Người nộp thuế:</td>
    <td colspan="3"><b>{$_SESSION['TenCongTy']}</b></td>
  </tr>
  <tr>
    <td>[05] Mã số thuế:</td>
    <td colspan="3">
      <span class="box">{$_SESSION['MST']}</span>
    </td>
  </tr>
  <tr>
    <td>[06] Địa chỉ:</td>
    <td colspan="3"><b>{$_SESSION['DiaChi']}</b></td>
  </tr>
  <tr>
    <td>[07] Quận/Huyện:</td>
    <td>{$_SESSION['QuanHuyen']}</td>
    <td>[08] Tỉnh/Thành phố:</td>
    <td>{$_SESSION['ThanhPho']}</td>
  </tr>
  <tr>
    <td>[09] Điện thoại:</td>
    <td>{$_SESSION['DienThoai']}</td>
    <td>[10] Fax:</td>
    <td>....................</td>
  </tr>
  <tr>
    <td>[11] Email:</td>
    <td colspan="3">vantancn.tv@gmail.com</td>
  </tr>
  <tr>
    <td>[12] Tên đại lý thuế (nếu có):</td>
    <td colspan="3">
      <span class="box"></span><span class="box"></span><span class="box"></span>
      <span class="box"></span><span class="box"></span><span class="box"></span>
      <span class="box"></span><span class="box"></span>
    </td>
  </tr>
  <tr>
    <td>[13] Mã số thuế:</td>
    <td>....................</td>
    <td>[14] Địa chỉ:</td>
    <td>....................</td>
  </tr>
  <tr>
    <td>[15] Quận/Huyện:</td>
    <td>....................</td>
    <td>[16] Tỉnh/Thành phố:</td>
    <td>....................</td>
  </tr>
  <tr>
    <td>[17] Điện thoại:</td>
    <td>....................</td>
    <td>[18] Fax:</td>
    <td>....................</td>
  </tr>
  <tr>
    <td>[19] Email:</td>
    <td colspan="3">....................</td>
  </tr>
  <tr>
    <td>[20] Hợp đồng đại lý thuế:</td>
    <td colspan="3">Số ....... &nbsp;&nbsp; Ngày .......</td>
  </tr>
</table>
<!-- Phần A -->
<table style="margin-top:15px; width:100%;">
  <tr>
    <td colspan="7" style="font-weight:bold;">&nbsp;<br>
      A. KÊ KHAI THUẾ GIÁ TRỊ GIA TĂNG (GTGT), THUẾ THU NHẬP CÁ NHÂN (TNCN)
    </td>
    <td  colspan="1" style="text-align:right; font-style:italic;"></td>
  </tr>
  <tr>
    <td colspan="6" style="font-weight:bold;"></td>
    <td  colspan="2" style="text-align:right; font-style:italic;">Đơn vị tính: Đồng Việt Nam</td>
  </tr>
</table>

<table border="0.2" style="width:100%; border-collapse:collapse; margin-top:5px;">
  <tr>
    <th rowspan="2" style="width:5%;text-align:center;"><b>STT</b></th>
    <th rowspan="2" style="width:30%;text-align:center;"><b>Nhóm ngành nghề</b></th>
    <th rowspan="2" style="width:7%;text-align:center;"><b>Mã chỉ tiêu</b></th>
    <th colspan="2" style="width:29%;text-align:center;"><b>Thuế GTGT</b></th>
    <th colspan="2" style="width:29%;text-align:center;"><b>Thuế TNCN</b></th>
  </tr>
  <tr>
    <th style="text-align:center;width:16%;"><b>Doanh thu<br>(a)</b></th>
    <th style="text-align:center;width:13%;"><b>Số thuế<br>(b)</b></th>
    <th style="text-align:center;width:16%;"><b>Doanh thu<br>(c)</b></th>
    <th style="text-align:center;width:13%;"><b>Số thuế<br>(d)</b></th>
  </tr>

  <tr>
    <td style="text-align:center;">1</td>
    <td>Phân phối, cung cấp hàng hóa</td>
    <td style="text-align:center;">[28]</td>
    <td style="text-align:right;">{$gthh_PPHH}</td>
    <td style="text-align:right;">{$thue_PPHH}</td>
   <td style="text-align:right;">{$gthh_tncn_PPHH}</td>
    <td style="text-align:right;">{$thue_tncn_PPHH}</td>
  </tr>

  <tr>
    <td style="text-align:center;">2</td>
    <td>Dịch vụ, xây dựng không bao thầu nguyên vật liệu</td>
    <td style="text-align:center;">[29]</td>
    <td style="text-align:right;">{$gthh_HHKoBT}</td>
    <td style="text-align:right;">{$thue_HHKoBT}</td>
    <td style="text-align:right;">{$gthh_tncn_HHKoBT}</td>
    <td style="text-align:right;">{$thue_tncn_HHKoBT}</td>
  </tr>

  <tr>
    <td style="text-align:center;">3</td>
    <td>Sản xuất, vận tải, dịch vụ có gắn với hàng hóa, xây dựng có bao thầu nguyên vật liệu</td>
    <td style="text-align:center;">[30]</td>
    <td style="text-align:right;">{$gthh_HHCoBT}</td>
    <td style="text-align:right;">{$thue_HHCoBT}</td>
    <td style="text-align:right;">{$gthh_tncn_HHCoBT}</td>
    <td style="text-align:right;">{$thue_tncn_HHCoBT}</td>
  </tr>

  <tr>
    <td style="text-align:center;">4</td>
    <td>Hoạt động kinh doanh khác</td>
    <td style="text-align:center;">[31]</td>
    <td style="text-align:right;">{$gthh_HHKhac}</td>
    <td style="text-align:right;">{$thue_HHKhac}</td>
   <td style="text-align:right;">{$gthh_tncn_HHKhac}</td>
    <td style="text-align:right;">{$thue_tncn_HHKhac}</td>
  </tr>

  <tr>
    <td colspan="3" style="text-align:right;"><b>Tổng cộng:</b></td>
    <td style="text-align:right;"><b>{$Tong_gthh_in}</b></td>
    <td style="text-align:right;"><b>{$Tong_thue_in}</b></td>
    <td style="text-align:right;"><b>{$Tong_gthh_tncn_in}</b></td>
    <td style="text-align:right;"><b>{$Tong_thue_tncn_in}</b></td>
  </tr>
</table>
<!-- Phần B -->
<table style="margin-top:15px; width:100%;">
  <tr>
    <td colspan="7" style="font-weight:bold;">&nbsp;<br>
      B. KÊ KHAI THUẾ TIÊU THỤ ĐẶC BIỆT (TTĐB)
    </td>
    <td style="text-align:right; font-style:italic;"></td>
  </tr>
   <tr>
    <td colspan="6" style="font-weight:bold;"></td>
    <td colspan="2" style="text-align:right; font-style:italic;">Đơn vị tính: Đồng Việt Nam</td>
  </tr>
</table>

<table border="0.2" style="width:100%; border-collapse:collapse; margin-top:5px; font-size:11pt;">
  <tr>
    <th style="width:5%;text-align:center;"><b>STT</b></th>
    <th style="width:30%;text-align:center;"><b>Hàng hoá, dịch vụ chịu thuế TTĐB</b></th>
    <th style="width:10%;text-align:center;"><b>Mã chỉ tiêu</b></th>
    <th style="width:10%;text-align:center;"><b>Đơn vị tính</b></th>
    <th style="width:15%;text-align:center;"><b>Doanh thu tính thuế TTĐB</b></th>
    <th style="width:10%;text-align:center;"><b>Thuế suất</b></th>
    <th style="width:20%;text-align:center;"><b>Số thuế</b></th>
  </tr>
  <tr>
    <th style="width:5%;text-align:center;"><b>(1)</b></th>
    <th style="width:30%;text-align:center;"><b>(2)</b></th>
    <th style="width:10%;text-align:center;"><b>(3)</b></th>
    <th style="width:10%;text-align:center;"><b>(4)</b></th>
    <th style="width:15%;text-align:center;"><b>(5)</b></th>
    <th style="width:10%;text-align:center;"><b>(6)</b></th>
    <th style="width:20%;text-align:center;"><b>(7) = (5)*(6)</b></th>
  </tr>

  <tr>
    <td style="text-align:center;">1</td>
    <td></td>
    <td style="text-align:center;"></td>
    <td style="text-align:center;"></td>
    <td style="text-align:right;"></td>
    <td style="text-align:center;"></td>
    <td style="text-align:right;"></td>
  </tr>

  <tr>
    <td colspan="4" style="text-align:right;"><b>Tổng cộng:</b></td>
    <td style="text-align:right;"><b></b></td>
    <td style="text-align:center;">[33]</td>
    <td style="text-align:right;"><b></b></td>
  </tr>
</table>
<!-- Phần C -->
<table style="margin-top:15px; width:100%;">
  <tr>
    <td colspan="7" style="font-weight:bold;">&nbsp;<br>
      C. KÊ KHAI THUẾ/PHÍ BẢO VỆ MÔI TRƯỜNG HOẶC THUẾ TÀI NGUYÊN
    </td>
    <td style="text-align:right; font-style:italic;"></td>
  </tr>
  <tr>
    <td colspan="6" style="font-weight:bold;"></td>
    <td  colspan="2" style="text-align:right; font-style:italic;">Đơn vị tính: Đồng Việt Nam</td>
  </tr>
</table>

<table border="0.2" style="width:100%; border-collapse:collapse; margin-top:5px; font-size:11pt;">
  <tr>
    <th style="width:5%;text-align:center;"><b>STT</b></th>
    <th style="width:31%;text-align:center;"><b>Tài nguyên, hàng hóa, sản phẩm</b></th>
    <th style="width:8%;text-align:center;"><b>Mã chỉ tiêu</b></th>
    <th style="width:8%;text-align:center;"><b>Đơn vị tính</b></th>
    <th style="width:10%;text-align:center;"><b>Sản lượng/<br>Số lượng</b></th>
    <th style="width:15%;text-align:center;"><b>Giá tính thuế tài nguyên/<br>mức thuế hoặc phí BVMT</b></th>
    <th style="width:8%;text-align:center;"><b>Thuế suất</b></th>
    <th style="width:15%;text-align:center;"><b>Số thuế</b></th>
  </tr>
  <tr>
    <th style="width:5%;text-align:center;"><b>(1)</b></th>
    <th style="width:31%;text-align:center;"><b>(2)</b></th>
    <th style="width:8%;text-align:center;"><b>(3)</b></th>
    <th style="width:8%;text-align:center;"><b>(4)</b></th>
    <th style="width:10%;text-align:center;"><b>(5)</b></th>
    <th style="width:15%;text-align:center;"><b>(6)</b></th>
    <th style="width:8%;text-align:center;"><b>(7)</b></th>
    <th style="width:15%;text-align:center;"><b>(8)</b></th>
  </tr>

  <!-- Khai thuế tài nguyên -->
  <tr>
    <td style="text-align:center;">1</td>
    <td colspan="7">Khai thuế tài nguyên</td>
  </tr>
  <tr>
    <td style="text-align:center;">1.1</td>
    <td></td><td></td><td></td><td></td><td></td><td></td><td></td>
  </tr>
  <tr>
    <td colspan="2" style="text-align:right;"><b>Tổng cộng</b></td>
    <td style="text-align:center;">[34]</td>
    <td colspan="5"></td>
  </tr>

  <!-- Khai thuế bảo vệ môi trường -->
  <tr>
    <td style="text-align:center;">2</td>
    <td colspan="7">Khai thuế bảo vệ môi trường</td>
  </tr>
  <tr>
    <td style="text-align:center;">2.1</td>
    <td></td><td></td><td></td><td></td><td></td><td></td><td></td>
  </tr>
  <tr>
    <td colspan="2" style="text-align:right;"><b>Tổng cộng</b></td>
    <td style="text-align:center;">[35]</td>
    <td colspan="5"></td>
  </tr>

  <!-- Khai phí bảo vệ môi trường -->
  <tr>
    <td style="text-align:center;">3</td>
    <td colspan="7">Khai phí bảo vệ môi trường</td>
  </tr>
  <tr>
    <td style="text-align:center;">3.1</td>
    <td></td><td></td><td></td><td></td><td></td><td></td><td></td>
  </tr>
  <tr>
    <td colspan="2" style="text-align:right;"><b>Tổng cộng</b></td>
    <td style="text-align:center;">[36]</td>
    <td colspan="5"></td>
  </tr>
</table>
<!-- Phần cuối -->
<table style="margin-top:20px; width:100%;">
  <tr>
    <td colspan="2">&nbsp;<br>
      Tôi cam đoan số liệu khai trên là đúng và chịu trách nhiệm trước pháp luật về những số liệu đã khai./.<br>
    </td>
  </tr>
</table>

<table style="margin-top:20px; width:100%;">
  <tr>
    <td style="width:50%; vertical-align:top;">
      <b>NHÂN VIÊN ĐẠI LÝ THUẾ</b><br>
      Họ và tên: {$_SESSION['txt_hovatendaily']}<br>
      Chứng chỉ hành nghề số: {$_SESSION['txt_chungchindaily']}
    </td>
    <td style="width:50%; text-align:center; vertical-align:top;">
      <i>{$Ngayky_in}</i><br>
      <b>NGƯỜI NỘP THUẾ hoặc<br>
      ĐẠI DIỆN HỢP PHÁP CỦA NGƯỜI NỘP THUẾ</b><br>
      <span class="small">(Chữ ký, ghi rõ họ tên; chức vụ và đóng dấu (nếu có) Ký điện tử)</span><br><br><br>
      <b></b>
    </td>
  </tr>
</table>
</body>
</html>
EOD;
$pdf->writeHTML($html, true, false, true, false, '');

// Xóa output buffer nếu có
if (ob_get_length()) ob_end_clean();

$pdf->Output('01-CNKD.pdf', 'I');