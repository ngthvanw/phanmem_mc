<html>
<head><title>In bảng lương nhân viên (Nhấn CTRL + P để in , ALT + F4 để thoát)</title>

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
            width: 297mm;
			margin:2px;
			padding:2px;
        }

        .page_break {
            page-break-inside: avoid;
        }
        @media print {
            #Header, #Footer {
                display: none !important;
            }

            .page_break {
                page-break-inside: avoid;
            }
            .no-print, .no-print * {
                display: none !important;
            }
        }

        @page {
            size: A4 landscape;
            margin-top: 5mm;
            margin-bottom: 10mm;

        }

        @media print {
            #Header, #Footer {
                display: none !important;
            }

        }

        #Header, #Footer {
            display: none !important;
        }

        @media print {
            p.bodyText {
                font-family: times, georgia, serif;
            }
        }

        .ketquaduyetsocai {
            border-collapse: collapse;
            width: 100%;
        }

        .ketquaduyetsocai td, .ketquaduyetsocai th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        .ketquaduyetsocai tr:nth-child(even){background-color: #f2f2f2;}

        .ketquaduyetsocai tr:hover {background-color: #ddd;}

        .ketquaduyetsocai th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #4CAF50;
            color: white;
        }

    </style>
    <meta charset="utf-8">
    <script type="text/javascript" src="../../js/jquery.js"></script>
    <script type="text/javascript" src="../../js/jquery.number.min.js"></script>
    <script type="text/javascript" src="../../js/jquery.table2excel.js"></script>
    <script type="text/javascript" language="javascript">
        $(document).ready(function() {
            $(document).on('click','#xuatexcel',function(e) {
				var result = 'data:application/vnd.ms-excel,' + encodeURIComponent($('.BangInExcel').html());
				var link = document.createElement("a");
				document.body.appendChild(link);
				link.download = "Bang_Luong_Thang" + new Date().toISOString().replace(/[\-\:\.]/g, "") + ".xls",
				link.href = result;
				link.click();
			});
        });
    </script>
</head>
<body class="dt-print-view">
<table style="background-color: #00c6ff;" width="100%" >
    <tr>
        <td class="no-print"><input type="button" style="color: #0000CC;font-weight: bold;border: 2px solid red;" value="Xuất excel" id="xuatexcel"></td>
        <td></td>
    </tr>
</table>
<div class="BangInExcel">
<?php
session_start();
$BAOCAO_SUDUNGHD = $_SESSION['LISTBANGLUONGNHANVIEN'];
$html_ct = "";
$html_title = '
 <thead>
<tr style="font-weight: bold;">
    <th STYLE="border:0.5px solid #000;" align="center" width="20" rowspan="3">&nbsp;<br/>STT</th>
	<th STYLE="border:0.5px solid #000;" align="center" width="100" rowspan="3">&nbsp;<br/>HỌ VÀ TÊN</th>
	<th STYLE="border:0.5px solid #000;" align="center" width="60" rowspan="3">&nbsp;<br/>CHỨC DANH</th>
    <th STYLE="border:0.5px solid #000;" align="center" width="450" colspan="8">TIỀN LƯƠNG VÀ THU NHẬP ĐƯỢC NHẬN</th>
   
    <th width="140" colspan="2" rowspan="2" align="center" STYLE="border:0.5px solid #000;">TIỀN LƯƠNG VÀ THU NHẬP ĐƯỢC LẢNH</th>

  </tr>
  
  <tr style="font-weight: bold;">
    <th colspan="5"  align="center" STYLE="border:0.5px solid #000;" >CHIA RA</th>
    <th colspan="3"  align="center" STYLE="border:0.5px solid #000;">CHIA RA</th>
  </tr>
    <tr style="font-weight: bold;">
    <th align="center" STYLE="border:0.5px solid #000;" >Lương CB</th>
    <th align="center" STYLE="border:0.5px solid #000;">Tiền ăn<br/>giữa ca</th>
    <th align="center" STYLE="border:0.5px solid #000;">Phụ cấp<br/>chức vụ</th>
    <th align="center" STYLE="border:0.5px solid #000;" >Phụ cấp không<br/> đóng BHXH</th>
    <th align="center" STYLE="border:0.5px solid #000;" >TỔNG CỘNG</th>
    <th align="center" STYLE="border:0.5px solid #000;" >BHXH;BHYT</th>
    <th align="center" STYLE="border:0.5px solid #000;" >Thuế thu nhập</th>
    <th align="center" STYLE="border:0.5px solid #000;" >TỔNG CỘNG</th>
    <th align="center" STYLE="border:0.5px solid #000;" >TIỀN LÃNH</th>
    <th align="center" STYLE="border:0.5px solid #000;" >KÝ NHẬN</th>
  </tr>
  <tr style="font-weight: bold;">
    <th align="center" rowspan="1" STYLE="border:0.5px solid #000;" >(1)</th>
    <th align="center" rowspan="1" STYLE="border:0.5px solid #000;">(2)</th>
	
    <th align="center" rowspan="1" STYLE="border:0.5px solid #000;">(3)</th>
    <th align="center" rowspan="1" STYLE="border:0.5px solid #000;" >(4)</th>
    <th align="center" rowspan="1" STYLE="border:0.5px solid #000;" >(5)</th>
	
    <th align="center" rowspan="1" STYLE="border:0.5px solid #000;">(6)</th>
    <th align="center" rowspan="1" STYLE="border:0.5px solid #000;" >(7)</th>
	<th align="center" STYLE="border:0.5px solid #000;" >(8)</th>
	<th align="center" STYLE="border:0.5px solid #000;" >(9)</th>
	
    <th align="center" rowspan="1" STYLE="border:0.5px solid #000;" >(10)</th>
    <th align="center" rowspan="1" STYLE="border:0.5px solid #000;" >(11)</th>
   
    <th align="center" rowspan="1" STYLE="border:0.5px solid #000;" >(13)</th>
    <th align="center" rowspan="1" STYLE="border:0.5px solid #000;" >(14)</th>
	
  </tr>
   </thead>
  ';
$sott = 0;
$TONGLUONGCOBAN = 0;
$TONGLUONGDUOCNHAN = 0;
$TONGPHAINOPBAOHIEM = 0;
$TONGTHUCLANH = 0;
$TONGTIENANGIUACA = 0;
$TONGPHUCAPKHONGDONGBHXH= 0;
$TONGBHXHNV= 0;
$TONGTHUETHUNHAPCN= 0;
$TONGPHUCAPCHUCVU= 0;
foreach ($BAOCAO_SUDUNGHD as $itemCT) {
    $sott++;
if($itemCT["luongcb"]!=0){
	$TONGLUONGCOBAN += $itemCT["luongcb"];
    $TONGTIENANGIUACA += $itemCT["tienangiuaca"];
    $TONGPHUCAPKHONGDONGBHXH += $itemCT["phucapkhongdungbhxh"];
    $TONGTHUETHUNHAPCN += $itemCT["thuethunhap"];
    $TONGPHUCAPCHUCVU += $itemCT["phucapchucvu"];
    $html_ct .= '
        <tr >
        <td align="center" class="td_first" >' . $sott . '</td>
        <td class="td_center">' . $itemCT["tennv"] . '</td>
        <td class="td_center">' . $itemCT['chucvu'] . '</td>
        
        <td align="right" class="td_center">';
        $html_ct .= number_format($itemCT["luongcb"], 0, ",", ".");
        $html_ct .= '</td>

        <td class="td_center" align="right">';
    $html_ct .= (number_format($itemCT["tienangiuaca"] != 0) ? number_format($itemCT["tienangiuaca"], 0, ",", ".") : "");


    $html_ct .= '</td>
<td class="td_center" align="right">';
    $html_ct .= (number_format($itemCT["phucapchucvu"] != 0) ? number_format($itemCT["phucapchucvu"], 0, ",", ".") : "");


    $html_ct .= '</td>
        <td class="td_center" align="right">';

    $html_ct .= (number_format($itemCT["phucapkhongdungbhxh"] != 0) ? number_format($itemCT["phucapkhongdungbhxh"], 0, ",", ".") : "");

    $html_ct .= '</td>
        <td class="td_center" align="right">';
    $TONGLUONG = $itemCT["luongcb"]+$itemCT["tienangiuaca"]+$itemCT["phucapkhongdungbhxh"]+$itemCT["phucapchucvu"];
    $TONGLUONGDUOCNHAN+=$TONGLUONG;
    $html_ct .= (number_format($TONGLUONG != 0) ? number_format($TONGLUONG, 0, ",", ".") : "");

    $html_ct .= '</td>
		<td class="td_center" align="right">';
		$TongBNNV = $itemCT["baohiem"]+$itemCT["baohiemyt"]+$itemCT["baohiemtn"];
		$TONGBHXHNV += $TongBNNV;
    $html_ct .= (number_format($TongBNNV != 0) ? number_format($TongBNNV, 0, ",", ".") : "");
    $html_ct .= '</td>
		<td class="td_center" align="right">' . (number_format($itemCT["thuethunhap"] != 0) ? number_format($itemCT["thuethunhap"], 0, ",", ".") : "") . '</td>
		<td class="td_center" align="right">';
        $TONGPHAINOP = $TongBNNV + $itemCT["thuethunhap"];
        $TONGPHAINOPBAOHIEM+=$TONGPHAINOP;
    $html_ct .= (number_format($TONGPHAINOP != 0) ? number_format($TONGPHAINOP, 0, ",", ".") : "");
    $html_ct .= '</td>
	<td class="td_center" align="right">';
    $THUCLANH = $TONGLUONG - $TONGPHAINOP;
    $TONGTHUCLANH+=$THUCLANH;
    $html_ct .= (number_format($THUCLANH != 0) ? number_format($THUCLANH, 0, ",", ".") : "");
    $html_ct .= '</td>
		<td class="td_end" align="center">';
    $html_ct .= "";
    $html_ct .= '</td>
      </tr>';
    }
}

$html = '
<table border="0" width="100%">
<tr>
<td colspan="5" width="30%"><b>' . $_SESSION['TenCongTy'] . '<br/>MST: ' . $_SESSION['MST'] . '</b></td>
<td colspan="6" width="55%" style="text-align: center;"></td>
<td colspan="2" width="15%" style="text-align: center;" >Mẫu số <b>02-LĐTL</b><br/><i>(Ban hành ' . $_SESSION['THONGTUMANG'][$_SESSION['theothongtu']]['thongtu'] . ' ngày ' . $_SESSION['THONGTUMANG'][$_SESSION['theothongtu']]['ngay'] . ' Bộ Tài Chính)</i></td>
</tr>
</table>
<table width="100%" border="0">
  <tr>
    <td colspan="13" align="center" WIDTH="100%"><b>' . $_SESSION["THONGTINPHIEUBANGLUONGNHANVIEN"]['tenphieu'] . '</b></td>    
  </tr>
    <tr>
    <td colspan="13" align="center" WIDTH="100%"><b>' . $_SESSION["THONGTINPHIEUBANGLUONGNHANVIEN"]['ngayhoadon'] . '</b></td>    
  </tr>

</table>
<table width="100%" border="0">
  <tr>
    <td align="right"></td>
  </tr>
</table>
<table border="1" class="dataTable" cellpadding="2" cellspacing="0" align="left" valign="middle">' . $html_title . $html_ct . '
<tr>
    <td STYLE="border:0.5px solid #000;"></td>
    <td align="right" STYLE="border:0.5px solid #000;"><b>TỔNG CỘNG</b></td>

	<td align="right" STYLE="border:0.5px solid #000;"></td>
	<td STYLE="border:0.5px solid #000;" align="right"><b>' . number_format($TONGLUONGCOBAN, 0, ",", ".") . '</b></td>
	<td STYLE="border:0.5px solid #000;" align="right"><b>' . number_format($TONGTIENANGIUACA, 0, ",", ".") . '</b></td>
	<td STYLE="border:0.5px solid #000;" align="right"><b>' . number_format($TONGPHUCAPCHUCVU, 0, ",", ".") . '</b></td>
	<td STYLE="border:0.5px solid #000;" align="right"><b>' . number_format($TONGPHUCAPKHONGDONGBHXH, 0, ",", ".") . '</b></td>
    <td STYLE="border:0.5px solid #000;" align="right"><b>' . number_format($TONGLUONGDUOCNHAN, 0, ",", ".") . '</b></td>
    <td STYLE="border:0.5px solid #000;" align="right"><b>' . number_format($TONGBHXHNV, 0, ",", ".") . '</b></td>
    <td STYLE="border:0.5px solid #000;" align="right"><b>' . number_format($TONGTHUETHUNHAPCN, 0, ",", ".") . '</b></td>
     <td align="right" STYLE="border:0.5px solid #000;"><b>' . number_format($TONGPHAINOPBAOHIEM, 0, ",", ".") . '</b></td>
    <td align="right" STYLE="border:0.5px solid #000;"><b>' . number_format($TONGTHUCLANH, 0, ",", ".") . '</b></td>
    <td STYLE="border:0.5px solid #000;" align="right"><b></b></td>
  </tr>
</table>
<table><tr><td></td></tr></table>
<table width="100%" border="0" cellpadding="2">  
<tr>
    <td colspan="5" width="30%"  align="center"></td>
	<td colspan="4" width="30%"  align="center"></td>
	<td colspan="4" width="30%"  align="center"><i>' . $_SESSION["THONGTINPHIEUBANGLUONGNHANVIEN"]['ngaylap'] . '</i></td>
  </tr>
  <tr>
    <td colspan="5" width="30%"  align="center"><b>LẬP BẢNG</b></td>
	<td colspan="4" width="30%"  align="center"><b>PHỤ TRÁCH KẾ TOÁN</b></td>
	<td colspan="4" width="30%"  align="center"><b>GIÁM ĐỐC</b></td>
  </tr>
</table>
';
echo $html;
?>
        </tbody>
    </table>
<div>
</body>
</html>

