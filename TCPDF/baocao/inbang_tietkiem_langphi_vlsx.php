<?php
session_start();
$DATACIBANRA = $_SESSION['BAOCAO_TK_LP_VLSX'];
?>
<html>
<head><title>IN BẢNG TIẾT KIỆM - LÃNG PHÍ VLSX (Nhấn CTRL + P để in , ALT + F4 để thoát)</title>


    <style type="text/css" class="init">
        .dataTable {
            font-family: "Times New Roman", Georgia, Serif;
            border-collapse: collapse;
            width: 100%;
        }

        .dataTable td {
            padding: 1px 2px;
            font-size: 13px;

        }

        .dataTable .td_full, th {
            border: 1px solid #000000;
            text-align: center;
            font-size: 13px;
            padding: 1px 2px;
        }

        .dataTable .td_first {
            border: 1px dashed #000000;
            border-left: 1px solid #000000;
        }

        .dataTable .td_center {
            border-bottom: 1px dashed #000000;
            border-left: 1px solid #000000;
        }

        .dataTable .td_end {
            border: 1px dashed #000000;
            border-left: 1px solid #000000;
            border-right: 1px solid #000000;
        }

        body {
            width: 210mm;
            margin: 2px;
            padding: 2px;
        }

        @page {
            size: A4;
            margin-top: 5mm;
            margin-bottom: 5mm;
            margin-left:auto;
            margin-right:auto;
        }

        @media print {
            #Header, #Footer {
                display: none !important;
            }

            .page_break {
                page-break-inside: avoid;
            }
        }
    </style>
    <meta charset="utf-8">
</head>
<body class="dt-print-view">
<?php
$time_ngaylap = strtotime($_SESSION["THONGTINPHIEU_TKLPVLSX"]['ngaylap']);
$ngaylap = date("d-m-Y", $time_ngaylap);
$html_tt = '<table width="100%" border="0" style="font-size: 13px">
  <tr>
    <td align="center" WIDTH="70%">
    <table border="0" cellspacing="1" cellpadding="1" width="100%">
  <tr>
    <td width="0%">
    </td>
    <td>
      <table width="100%" border="0" >
        <tr>
          <td STYLE="font-weight: bold ">' . $_SESSION['TenCongTy'] . '</td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td>
    </td><td><table width="100%" border="0" STYLE="font-weight: bold">
        <tr>
          <td>MST: ' . $_SESSION['MST'] . '</td>
        </tr>
    </table></td>
  </tr>
</table>
    
</td>    
    <td align="center" WIDTH="10%"><B><h3></h3></B></td>
    <td WIDTH="20%">
    <table border="0">
    
   <tr>
   <td style="font-size: 11px" align="center"><i>Mẫu số 01-1/GTGT<br/>
        (Ban hành ' . $_SESSION['THONGTUMANG'][$_SESSION['theothongtu']]['thongtu'] . ' ngày ' . $_SESSION['THONGTUMANG'][$_SESSION['theothongtu']]['ngay'] . ' của Bộ Tài Chính)</i>
   </td>
</tr>

</table>
    
</td>
  </tr>
</table>

<table border="0" align="center" >
  <tr>
    <td align="center"><b>' . $_SESSION["THONGTINPHIEU_TKLPVLSX"]['tenphieu'] . '</b></td>
  </tr>
  <tr>
    <td align="center"><b>' . $_SESSION["THONGTINPHIEU_TKLPVLSX"]['ngayhoadon'] . '</b></td>
  </tr>
</table>
<table width="100%" border="0">
  <tr>
    <td align="right"></td>
  </tr>
</table>
<table width="100%" style="font-size:11px" border="0">
  <tr>
    <td align="right">Đơn vị tiền: <b>Đồng Việt Nam</b></td>
  </tr>
</table>';
echo $html_tt;
?>
<div></div>
<table class="display dataTable" width="100%" border="0" cellspacing="1" cellpadding="1">
    <thead>
    <tr>
        <th rowspan="2">&nbsp;<br/>STT</th>
        <th rowspan="2">&nbsp;<br/>Mã SP</th>
        <th rowspan="2">&nbsp;<br/>Mã VT</th>
        <th rowspan="2">Tên vật liệu</th>
        <th rowspan="2">ĐVT</th>
        <th rowspan="2">Đơn giá</th>
        <th align="center" rowspan="2">Số lượng dự trù</th>
        <th rowspan="2">Số lượng thực tế</th>
        <th colspan="3">&nbsp;<br/>Chênh lệch</th>
    </tr>
    <tr>
        <th>Phần trăm</th>
        <th>Số tiền</th>
        <th>TK/LP</th>
    </tr>
    <tr>
        <th style="text-align:center;">(1)</th>
        <th style="text-align:center;">(2)</th>
        <th style="text-align:center;">(3)</th>
        <th style="text-align:center;">(4)</th>
        <th style="text-align:center;">(5)</th>
        <th style="text-align:center;">(6)</th>
        <th style="text-align:center;">(7)</th>
        <th style="text-align:center;">(8)</th>
        <th style="text-align:center;">(9)</th>
        <th style="text-align:center;">(10)</th>
        <th style="text-align:center;">(11)</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $sott = 0;
    $html_ct = '';
    $tongsoluongdutru=0;
    $tongsoluongxuat=0;
    $tongtienchenlech = 0;
    foreach ($DATACIBANRA as $item) {
        $tongsoluongdutru_G=0;
        $tongsoluongxuat_G=0;
        $tongtienchenlech_G = 0;
        foreach($item as $itemCT){
            $sott++;
            $html_ct .= '
			<tr >
			<td width="20px" class="td_first" align="center" >' . $sott . '</td>
			<td width="80px" class="td_center">' . ($itemCT["masp"]) . '</td>
			<td width="80px" class="td_center">' . ($itemCT["mavt"]) . '</td>
			<td width="280px" class="td_center">' . ($itemCT["tenvt"]) . '</td>
			<td width="60px" class="td_center" align="center" >' . $itemCT["dvt"] . '</td>
			<td width="100px" class="td_center" align="right" >' . number_format($itemCT["dongia"],2,",",".") . '</td>
			<td width="125px" class="td_center" align="right">' . number_format($itemCT["soluongdutru"],$_SESSION['txthienthisole'],",",".") . '</td>
			<td width="125px" class="td_center" align="right" >' . number_format($itemCT["soluongthucnhap"],$_SESSION['txthienthisole'],",",".") . '</td>
			<td width="30px" class="td_center" style="text-align:right;">' . number_format($itemCT["tylephantram"]*100, 2, ",", ".") . '</td>
			<td width="90px" class="td_center" style="text-align:right;">' . number_format($itemCT["sotienchenhlech"], 0, ",", ".") . '</td>
			<td width="90px" align="left" class="td_end"></td>
		  </tr>';
            $tongsoluongdutru+=$itemCT["soluongdutru"];
            $tongsoluongxuat+=$itemCT["soluongthucnhap"];
            $tongtienchenlech+= $itemCT["sotienchenhlech"];

            $tongsoluongdutru_G+=$itemCT["soluongdutru"];
            $tongsoluongxuat_G+=$itemCT["soluongthucnhap"];
            $tongtienchenlech_G+= $itemCT["sotienchenhlech"];
        }
        $html_ct .= '
        <tr >
        <td colspan="4" class="td_full" align="center" ><b>Tổng SP: '.$itemCT["masp"].'</b></td>
        <td  class="td_full" align="center" ></td>
        <td class="td_full" align="right" ></td>
        <td  class="td_full"  style="text-align:right;"><b>' . number_format($tongsoluongdutru_G,$_SESSION['txthienthisole'],",",".") . '</b></td>
        <td  class="td_full"  style="text-align:right;" ><b>' . number_format($tongsoluongxuat_G,$_SESSION['txthienthisole'],",",".") . '</b></td>
        <td  class="td_full" style="text-align:right;"></td>
        <td  class="td_full" style="text-align:right;"><b>' . number_format($tongtienchenlech_G, 0, ",", ".") . '</b></td>
        <td  align="left" class="td_full"><b>';
        if($tongtienchenlech_G<=0){
            $html_ct.="TK";
        }else{
            $html_ct.="LP";
        }
        $html_ct.='</b></td>
      </tr>
    ';
    }
    $html_ct .= '
        <tr >
        <td  class="td_full" align="center" ></td>
        <td  class="td_full" align="center" ></td>
        <td  class="td_full" align="center" ></td>
        <td  class="td_full"  style="text-align:right;"><b>TỔNG CỘNG</b></td>
        <td  class="td_full" align="center" ></td>
        <td class="td_full" align="right" ></td>
        <td  class="td_full"  style="text-align:right;"><b>' . number_format($tongsoluongdutru,$_SESSION['txthienthisole'],",",".") . '</b></td>
        <td  class="td_full"  style="text-align:right;" ><b>' . number_format($tongsoluongxuat,$_SESSION['txthienthisole'],",",".") . '</b></td>
        <td  class="td_full" style="text-align:right;"></td>
        <td  class="td_full" style="text-align:right;"><b>' . number_format($tongtienchenlech, 0, ",", ".") . '</b></td>
        <td  align="left" class="td_full"><b>';
    if($tongtienchenlech<=0){
        $html_ct.="TIẾT KIỆM";
    }else{
        $html_ct.="LÃNG PHÍ";
    }
    $html_ct.='</b></td>
      </tr>
    ';
    echo $html_ct;
    $html_sum = '<table width="700" class="page_break" border="0">
</table>';
    $html_foodter = '<table width="100%" border="0" cellpadding="2" class="page_break">
  <tr>
    <td width="70%">&nbsp;</td>
    <td width="30%" rowspan="2" align="center"><table width="400" border="0">
      <tr>
        <td align="center"><em>'.$_SESSION['ThanhPho'].' Ngày ';
    $time = strtotime($_SESSION["THONGTINPHIEU_TKLPVLSX"]['ngaylap']);
    $html_foodter .= date("d-m-Y", $time);


    $html_foodter .= '</em></td>
      </tr>
      <tr>
        <td align="center"><strong>Người lập phiếu</strong></td>
      </tr>
      <tr>
        <td align="center"><strong></strong></td>
      </tr>
      <tr>
        <td align="center"><em></em></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><table width="400" border="0" cellspacing="2">
      <tr>
        <td align="center"></td>
        </tr>
      <tr>
        <td>&nbsp;</td>
        </tr>
      <tr>
        <td  align="center"><strong>Kế toán viên</strong></td>
        </tr>
      <tr>
        <td><input style="border:0px solid #000;width:157px;" type="text" value="" /> <input style="border:0px solid #000;width:160px;font-weight:bold;" type="text" value="" /></td>
        </tr>
    </table></td>
  </tr>
</table>';
    echo $html_sum;
    echo $html_foodter;

    ?>
    </tbody>
</table>
</body>
</html>