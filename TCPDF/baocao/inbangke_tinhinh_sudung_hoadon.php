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
$pdf->AddPage("L");
$html_ct = "";
$html_title = '
<tr style="font-weight: bold;">
    <td STYLE="border:0.5px solid #000;" width="20px" rowspan="3">&nbsp;<br/>STT</td>
	<td STYLE="border:0.5px solid #000;" width="80px" rowspan="3">Ký hiệu mẫu hóa đơn</td>
	<td STYLE="border:0.5px solid #000;" width="40px" rowspan="3">Ký hiệu hóa đơn</td>
    <td STYLE="border:0.5px solid #000;" width="130px" colspan="2">Số tồn đầu kỳ</td>
    <td STYLE="border:0.5px solid #000;" width="120px" colspan="2">Số mua /phát trong kỳ</td>
    <td STYLE="border:0.5px solid #000;" width="280px" colspan="5">Số sử dụng trong kỳ</td>
    <td STYLE="border:0.5px solid #000;" width="130px" colspan="2">Tồn cuối kỳ</td>

  </tr>
  <tr style="font-weight: bold;">
    <td rowspan="2" STYLE="border:0.5px solid #000;" >Từ số đến số</td>
    <td rowspan="2" STYLE="border:0.5px solid #000;">Tổng số</td>
	
    <td rowspan="2" STYLE="border:0.5px solid #000;">Từ số đến số</td>
    <td rowspan="2" STYLE="border:0.5px solid #000;" >Tổng số</td>
	
    <td rowspan="2" STYLE="border:0.5px solid #000;">Từ số đến số</td>
    <td rowspan="2" STYLE="border:0.5px solid #000;" >Tổng số</td>
	<td STYLE="border:0.5px solid #000;" colspan="3" >Trong đó</td>
	
    <td rowspan="2" STYLE="border:0.5px solid #000;">Từ số đến số</td>
    <td rowspan="2" STYLE="border:0.5px solid #000;" >Tổng số</td>
	
  </tr>
  <tr style="font-weight: bold;">
    <td STYLE="border:0.5px solid #000;">Xóa</td>
    <td STYLE="border:0.5px solid #000;">Mất </td>
     <td STYLE="border:0.5px solid #000;">Hủy</td>
  </tr>
  <tr style="font-weight: bold;">
    <td rowspan="1" STYLE="border:0.5px solid #000;" >(1)</td>
    <td rowspan="1" STYLE="border:0.5px solid #000;">(2)</td>
	
    <td rowspan="1" STYLE="border:0.5px solid #000;">(3)</td>
    <td rowspan="1" STYLE="border:0.5px solid #000;" >(4)</td>
	
    <td rowspan="1" STYLE="border:0.5px solid #000;">(5)</td>
    <td rowspan="1" STYLE="border:0.5px solid #000;" >(6)</td>
	<td STYLE="border:0.5px solid #000;" >(7)</td>
	<td STYLE="border:0.5px solid #000;" >(8)</td>
	
    <td rowspan="1" STYLE="border:0.5px solid #000;">(9)</td>
    <td rowspan="1" STYLE="border:0.5px solid #000;" >(10)</td>
    <td rowspan="1" STYLE="border:0.5px solid #000;" >(11)</td>
    <td rowspan="1" STYLE="border:0.5px solid #000;" >(12)</td>
    <td rowspan="1" STYLE="border:0.5px solid #000;" >(13)</td>
    <td rowspan="1" STYLE="border:0.5px solid #000;" >(14)</td>
	
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
        <td STYLE="border:0.5px solid #000;">';
    if ($itemCT["dktuso"] == 0) {
        $html_ct .= "";
    } else {
        $html_ct .= $itemCT["dktuso"] . ' - ' . $itemCT["dkdenso"];
    }
    $html_ct .= '</td>
        <td STYLE="border:0.5px solid #000;" align="center">';
    if ($itemCT["dktuso"] == 0) {
        $html_ct .= "";
    } else {
        $html_ct .= (($itemCT["dkdenso"] - $itemCT["dktuso"]) + 1);
        $tongdk += (($itemCT["dkdenso"] - $itemCT["dktuso"]) + 1);
    }

    $html_ct .= '</td>
        <td STYLE="border:0.5px solid #000;" align="center">';
    if ($itemCT["ntuso"] == 0) {
        $html_ct .= "";
    } else {
        $html_ct .= $itemCT["ntuso"] . ' - ' . $itemCT["ndenso"];
    }

    $html_ct .= '</td>
        <td STYLE="border:0.5px solid #000;" align="center">';
    if ($itemCT["ntuso"] == 0) {
        $html_ct .= "";
    } else {
        $html_ct .= (($itemCT["ndenso"] - $itemCT["ntuso"]) + 1);
        $tongnhap += (($itemCT["ndenso"] - $itemCT["ntuso"]) + 1);
    }

    $html_ct .= '</td>
        <td STYLE="border:0.5px solid #000;" align="center">';
    if ($itemCT["pstuso"] == 0) {
        $html_ct .= "";
    } else {
        $html_ct .= $itemCT["pstuso"] . ' - ' . $itemCT["psdenso"];
    }

    $html_ct .= '</td>
		<td STYLE="border:0.5px solid #000;" align="center">';
    if ($itemCT["pstuso"] == 0) {
        $html_ct .= "";
    } else {
        $html_ct .= (($itemCT["psdenso"] - $itemCT["pstuso"]) + 1);
        $tongps += (($itemCT["psdenso"] - $itemCT["pstuso"]) + 1);
    }
    $string_xoa = $itemCT["xoaso"];
    $array_xoa = explode(";",$string_xoa);
    //$tongxoa = 0;
    foreach ($array_xoa as $item_xoa) {
        if ($item_xoa!="") {
        $timchuoi = strpos($item_xoa, "-");
        if ($timchuoi) {
            $tongxoa_khoan = 0;
            $array_xoakhoan = $array_xoa = explode("-", $item_xoa);
            $tongxoa_khoan = ($array_xoakhoan[1] - $array_xoakhoan[0]) + 1;
            $tongxoa = $tongxoa + $tongxoa_khoan;
        } else {
            $tongxoa++;
        }
    }
    }
    $html_ct .= '</td>
		<td STYLE="border:0.5px solid #000;" align="left">' . $itemCT["xoaso"] . '</td>
		<td STYLE="border:0.5px solid #000;" align="left">' . $itemCT["mat"] . '</td>
		<td STYLE="border:0.5px solid #000;" align="left">' . $itemCT["huyso"] . '</td>
		<td STYLE="border:0.5px solid #000;" align="center">';
    if ($itemCT["tontuso"] == 0) {
        $html_ct .= "";
    } else {
        $html_ct .= $itemCT["tontuso"] . ' - ' . $itemCT["tondenso"];
    }

    $html_ct .= '</td>
		<td STYLE="border:0.5px solid #000;" align="center">';
    if ($itemCT["tontuso"] == 0) {
        $html_ct .= "";
    } else {
        $html_ct .= (($itemCT["tondenso"] - $itemCT["tontuso"]) + 1);
        $tongton += (($itemCT["tondenso"] - $itemCT["tontuso"]) + 1);
    }

    $html_ct .= '</td>
      </tr>';
}

$html = '
<table border="0" width="100%">
<tr>
<td width="25%"></td>
<td width="60%" style="text-align: center;"><b>CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM<br/>Độc lập- Tự do- Hạnh phúc<br/>---------------<br/></b><b>' . $_SESSION["THONGTINPHIEU_BCHD"]['tenphieu'] . '</b><br/><b>[01] Kỳ tính thuế: ' . $_SESSION["THONGTINPHIEU_BCHD"]['ngayhoadon'] . '</b></td>
<td width="15%" style="text-align: center;border:0.5px soild #000000;" >Mẫu số <b>BC26/AC</b><br/><i>(Ban hành '.$_SESSION['THONGTUMANG'][$_SESSION['theothongtu']]['thongtu'].' ngày '.$_SESSION['THONGTUMANG'][$_SESSION['theothongtu']]['ngay'].' Bộ Tài Chính)</i></td>
</tr>
</table>
<table width="100%" border="0">
  <tr>
    <td align="left" WIDTH="50%">
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
    <td align="center" WIDTH="50%">
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
    <td>Ngày cuối kỳ báo cáo: '.$denngay.'</td>
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
	<td STYLE="border:0.5px solid #000;"></td>
	<td STYLE="border:0.5px solid #000;"><b>' . ($tongdk) . '</b></td>
	<td STYLE="border:0.5px solid #000;"></td>
	<td STYLE="border:0.5px solid #000;"><b>' . ($tongnhap) . '</b></td>
    <td STYLE="border:0.5px solid #000;"></td>
    <td STYLE="border:0.5px solid #000;"><b>' . ($tongps) . '</b></td>
    <td STYLE="border:0.5px solid #000;"><b>' . (($tongxoa != 0) ? $tongxoa : "") . '</b></td>
    <td STYLE="border:0.5px solid #000;"></td>
     <td STYLE="border:0.5px solid #000;"></td>
    <td align="right" STYLE="border:0.5px solid #000;"></td>
    <td STYLE="border:0.5px solid #000;"><b>' . ($tongton) . '</b></td>
  </tr>
</table>
<table><tr><td></td></tr></table>
<table width="100%" border="0" cellpadding="2">
  <tr>
    <td width="50%"  align="center">Người lập báo cáo</td>
	<td width="50%"  align="center">Đại diện doanh nghiệp</td>
  </tr>
</table>
';
$pdf->writeHTML($html, true, false, true, false, '');

$pdf->Output('bang_ke_hh_dichvu.pdf', 'I');

