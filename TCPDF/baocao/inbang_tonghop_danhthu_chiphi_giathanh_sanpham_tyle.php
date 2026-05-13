<?php
session_start();
$DATACIBANRA = $_SESSION["THONGTINPHIEUTONGHOPDTCPGTCT"];
$theocongdoan = $_GET['theocongdoan'];
?>
<html>
<head><title>IN BẢNG TỔNG HỢP - CHI PHÍ - GIÁ THÀNH SẢN PHẨM</title>

    <style type="text/css" class="init">
        .dataTable {
            font-family: "Times New Roman", Georgia, Serif;
            border-collapse: collapse;
            width: 100%;
        }

        .dataTable td {
            padding: 1px 2px;
            font-size: 15px;

        }

        .dataTable .td_full, th {
            border: 1px solid #000000;
            text-align: center;
            font-size: 15px;
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
            width: 397mm;
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

            .page_break {
                page-break-inside: avoid;
            }

            .no-print, .no-print * {
                display: none !important;
            }
        }

        @media print {
            #Header, #Footer {
                display: none !important;
            }

            .no-print, .no-print * {
                display: none !important;
            }

        }

        @media print {
            p.bodyText {
                font-family: times, georgia, serif;
            }
        }
    </style>
    <script type="text/javascript" src="../../js/jquery.js"></script>
    <script type="text/javascript" src="../../js/jquery.number.min.js"></script>
    <script type="text/javascript" src="../../js/jquery.table2excel.js"></script>
    <script type="text/javascript" language="javascript">
        $(document).ready(function () {
             $(document).on('click','#xuatexcel',function(e) {
				$(".BangInExcel").each(function() {
					var result = 'data:application/vnd.ms-excel,' + encodeURIComponent($(this).html());
					var link = document.createElement("a");
					document.body.appendChild(link);
					$MaTK = ($(this).attr("MaTK"));
					link.download = $MaTK+".xls",
					link.href = result;
					link.click();
				});
            })
        });
    </script>
    <meta charset="utf-8">
</head>
<body class="dt-print-view">
<table style="background-color: #00c6ff;" width="100%" class="no-print">
    <tr>
        <td><input type="button" style="color: #0000CC;font-weight: bold;border: 2px solid red;" value="Xuất excel"
                   id="xuatexcel"></td>
        <td></td>
    </tr>
</table>
<div class='BangInExcel' MaTK='Bang_Gia_Thanh_SP'>
<?php
$html_ct = "";
$html_title = '
<thead>
  <tr>
    <th  rowspan="1">&nbsp;<br/>STT</th>
    <th  rowspan="1">&nbsp;<br/>Mã SP</th>
    <th  rowspan="1">&nbsp;<br/>Tên sản phẩm</th>
    <th  rowspan="1">&nbsp;<br/>Dở dang ĐK</th>
    <th  rowspan="1">Nguyên vật liệu </th>
    <th  rowspan="1">Nhân công</th>
    <th  rowspan="1" >Máy</th>
    <th  rowspan="1" >Máy BP</th>
    <th  rowspan="1">Chi phí SXC</th>
    <th  rowspan="1">Chi phí SXC PB</th>
    <th  rowspan="1">&nbsp;<br/>Tổng cộng</th>
    <th  rowspan="1">&nbsp;<br/>Doanh thu</th>
    <th  rowspan="1">&nbsp;<br/>Lãi/Lỗ</th>
    <th  rowspan="1">&nbsp;<br/>Dở dang CK</th>
  </tr>
  <tr>
    <th >(A)</th>
    <th >(B)</th>
    <th >(C)</th>
    <th >(D)</th>
    <th >(1)</th>

    <th >(2)</th>

    <th >(3)</th>

     <th >(4)</th>

    <th >(5)</th>

     <th >(E)</th>
     <th >(F)</th>
     <th >(G)</th>
     <th >(H)</th>
     <th >(K)</th>
  </tr>
  </thead>
  ';
$sott = 0;
$CAPIN = $_SESSION["THONGTINPHIEU"]['incaptk'];
if ($xemchitiet == 1) {
    $CAPIN = 4;
}
$TongTienDK = 0;
$TongTienNguyenLieu = 0;
$TongTienNhanCong = 0;
$TongTienMay = 0;
$TongTienMayPB = 0;
$TongTienCPSXC = 0;
$TongTienCPSXCPB = 0;
$TongTienDoanhThuThuan = 0;
$TongTienTongCong = 0;
$TongGiaThanh = 0;
$TongLaiLo = 0;
$TongTienCK = 0;

$TongTienNguyenLieuTieuChuan = 0;
$TongTienNhanCongTieuChuan = 0;
$TongTienMayTieuChuan = 0;
$TongTienCPSXCTieuChuan = 0;

foreach ($DATACIBANRA as $itemCT) {
    $indam = "";
    if ($itemCT['mactcha'] == "0") {
        $indam = 'style="font-weight: bold;"';
        $TongTienDK += $itemCT['dodangdk'];

        $TongTienDoanhThuThuan += $itemCT['doanhthuthuan'];
        //$TongTienTongCong += $itemCT['tongcong'];

        $TongGiaThanh += $itemCT['giathanh'];
        $TongLaiLo += $itemCT['lailo'];
        $TongTienCK += $itemCT['dodangck'];
    }
    $TongTienNhanCong += $itemCT['sotiennc622pb'];
    $TongTienMay += $itemCT['sotienmay'];
    $TongTienMayPB += $itemCT['sotienncpb'];
    $TongTienCPSXC += $itemCT['sotiencpsxc'];
    $TongTienCPSXCPB += $itemCT['sotiencpsxcpb'];
    $TongTienNguyenLieu += $itemCT['sotiennl'];
    $TongTienNguyenLieuTieuChuan += $itemCT['sotiennltieuchuan'];
    $TongTienNhanCongTieuChuan += $itemCT['sotiennctieuchuan'];
    $TongTienMayTieuChuan += $itemCT['sotienmaytieuchuan'];
    $TongTienCPSXCTieuChuan += $itemCT['sotiencpsxctieuchuan'];
    if($theocongdoan==""){
        if ($itemCT['CAP'] <= $CAPIN) {
            if ($itemCT["tongcong"]!=0||$itemCT["dodangdk"]!=0 || $itemCT["dodangck"]!=0) {
                $sott++;
                $html_ct .= '
        <tr >
        <td class="td_first" width="20px" ' . $indam . ' align="center" >' . $itemCT["sottxuat"] . '</td>
        <td class="td_center" width="50px" ' . $indam . '>' . $itemCT["mact"] . '</td>
        <td class="td_center" width="250px" align="left" ' . $indam . '>' . $itemCT["tenct"] . '</td>
        <td class="td_center" width="90px" align="right" ' . $indam . '>';
                $html_ct .= (number_format($itemCT["dodangdk"] != 0) ? number_format($itemCT["dodangdk"], 0, ",", ".") : "");
                $html_ct .= '</td>
        <td class="td_center" width="90px" align="right" ' . $indam . '>';
                $html_ct .= (number_format($itemCT["sotiennl"] != 0) ? number_format($itemCT["sotiennl"], 0, ",", ".") : "");
                $html_ct .= '</td>
        <td class="td_center" width="90px" align="right" ' . $indam . '>';
                $html_ct .= (number_format($itemCT["sotiennc622pb"] != 0) ? number_format($itemCT["sotiennc622pb"], 0, ",", ".") : "");
                $html_ct .= '</td>
        <td class="td_center" width="90px" align="right" ' . $indam . ' align="right">';
                $html_ct .= (number_format($itemCT["sotienmay"]) != 0) ? number_format($itemCT["sotienmay"], 0, ",", ".") : "";
                $html_ct .= '</td>
		<td class="td_center" width="90px" align="right" ' . $indam . ' align="right">';
                $html_ct .= (number_format($itemCT["sotienncpb"]) != 0) ? number_format($itemCT["sotienncpb"], 0, ",", ".") : "";
                $html_ct .= '</td>

<td class="td_center" width="90px" align="right" ' . $indam . '>';
                $html_ct .= (number_format($itemCT["sotiencpsxc"]) != 0) ? number_format($itemCT["sotiencpsxc"], 0, ",", ".") : "";
                $html_ct .= '</td>

<td class="td_center" width="90px" align="right" ' . $indam . '>';
                $html_ct .= (number_format($itemCT["sotiencpsxcpb"]) != 0) ? number_format($itemCT["sotiencpsxcpb"], 0, ",", ".") : "";
                $html_ct .= '</td>

<td class="td_center" width="90px" align="right" ' . $indam . ' >';
                $TongGiaThanhTungSP = ($itemCT["dodangdk"]+$itemCT["sotiennl"]+$itemCT["sotiennc622pb"]+$itemCT["sotienmay"]+$itemCT["sotienncpb"]+$itemCT["sotiencpsxc"]+$itemCT["sotiencpsxcpb"]);
                $TongTienTongCong+=$TongGiaThanhTungSP;
                $html_ct .= (number_format($TongGiaThanhTungSP) != 0) ? number_format($TongGiaThanhTungSP, 0, ",", ".") : "";

                $html_ct .= '</td>
                <td class="td_center" width="90px" align="right" ' . $indam . ' >';
                $html_ct .= (number_format($itemCT["doanhthuthuan"]) != 0) ? number_format($itemCT["doanhthuthuan"], 0, ",", ".") : "";
                $html_ct .= '</td>
                
                <td class="td_center" width="90px" align="right" ' . $indam . ' >';
                $LaiLo = $itemCT["doanhthuthuan"] - $TongGiaThanhTungSP;
                $TongLaiLo+= $LaiLo;
                $TongTienDoanhThuThuan+= $itemCT["doanhthuthuan"];
                $html_ct .= (number_format($LaiLo) != 0) ? number_format($LaiLo, 0, ",", ".") : "";
                $html_ct .= '</td>

<td class="td_end" align="right"' . $indam . ' >';
                $html_ct .= (number_format(0) != 0) ? number_format(0, 0, ",", ".") : "";
                $html_ct .= '</td>

      </tr>';
            }
        }
    }
}

$html = '
<table width="100%" border="0" style="border-bottom: 1px solid #000">
  <tr>
    <td colspan="6" align="left" WIDTH="55%"><B>' . $_SESSION["TenCongTy"] . '</B><br/>' . $_SESSION["DiaChi"] . '</td>    
    <td colspan="8" align="center" WIDTH="30%"></td>
    <td colspan="3" WIDTH="15%" align="right">MST:' . $_SESSION["MST"] . '</td>
  </tr>
</table>
<table><tr><td></td></tr></table>
<table border="0" align="center">
  <tr>
    <td align="center" colspan="15"><b>' . $_SESSION["THONGTINPHIEU"]['tenphieu'] . '</b></td>
  </tr>
  <tr>
    <td align="center" colspan="15"><b>' . $_SESSION["THONGTINPHIEU"]['ngayhoadon'] . '</b></td>
  </tr>
</table>
<table width="100%" border="0">
  <tr>
    <td align="right"></td>
  </tr>
</table>
<table border="1" class="dataTable" cellpadding="2" cellspacing="0" align="center" valign="middle">' . $html_title . $html_ct . '
<tr>
    <td width="15px" STYLE="border:0.5px solid #000;"></td>
    <td width="100px" STYLE="border:0.5px solid #000;"></td>
    <td width="200px" STYLE="border:0.5px solid #000;"><b>Tổng giá thành</b></td>
    <td width="80px" align="right" STYLE="border:0.5px solid #000;"><b>' . number_format($TongTienDK, 0, ",", ".") . '</b></td>
    <td width="80px" align="right" STYLE="border:0.5px solid #000;"><b>' . number_format($TongTienNguyenLieu, 0, ",", ".") . '</b></td>
    <td  width="80px" align="right" STYLE="border:0.5px solid #000;"><b>' . number_format($TongTienNhanCong, 0, ",", ".") . '</b></td>

    <td  width="80px" align="right" STYLE="border:0.5px solid #000;"><b>' . number_format($TongTienMay, 0, ",", ".") . '</b></td>
    <td  width="80px" align="right" STYLE="border:0.5px solid #000;"><b>' . number_format($TongTienMayPB, 0, ",", ".") . '</b></td>

    <td  width="80px" align="right" STYLE="border:0.5px solid #000;"><b>' . number_format($TongTienCPSXC, 0, ",", ".") . '</b></td>

    <td  width="80px" align="right" STYLE="border:0.5px solid #000;"><b>' . number_format($TongTienCPSXCPB, 0, ",", ".") . '</b></td>

    <td  width="100px" align="right" STYLE="border:0.5px solid #000;"><b>' . number_format($TongTienTongCong, 0, ",", ".") . '</b></td>
    <td  width="100px" align="right" STYLE="border:0.5px solid #000;"><b>' . number_format($TongTienDoanhThuThuan, 0, ",", ".") . '</b></td>
    <td  width="100px" align="right" STYLE="border:0.5px solid #000;"><b>' . number_format($TongLaiLo, 0, ",", ".") . '</b></td>

    <td  width="80px" align="right" STYLE="border:0.5px solid #000;"><b>' . number_format(0, 0, ",", ".") . '</b></td>
  </tr>';
$html .= ' 
</table>
<table><tr><td></td></tr></table>

<table width="100%" border="0" cellpadding="2">
  <tr>
  <td colspan="4" align="center" width="35%">&nbsp;<br/>Người lập phiếu</td>
  <td colspan="7" align="center" width="35%">&nbsp;<br/>Kế toán trưởng</td>
  <td colspan="6" width="30%" rowspan="2" align="center">
    <em>' . $_SESSION['ThanhPho'] . ' Ngày ';
$time = strtotime($_SESSION["THONGTINPHIEU"]['ngaylap']);
$html .= date("d-m-Y", $time);
$html .= '</em><br/>Giám đốc
   </td>
  </tr>
  <tr>
    <td></td>
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