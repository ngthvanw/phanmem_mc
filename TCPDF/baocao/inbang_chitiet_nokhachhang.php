<?php
session_start();
$DATA = $_SESSION["DSNOKHCHITIET"];
?>
<html>
<head><title>Bảng chi tiết công nợ khách hàng (Nhấn CTRL + P để in , ALT + F4 để thoát)</title>

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
			margin: 1px;
			padding: 1px;
        }

        .page_break {
            page-break-inside: avoid;
        }

        @page {
            size: A4;
            margin-top: 5mm;
            margin-bottom: 10mm;

        }

        @media print {
            #Header, #Footer { display: none !important; }
            .no-print, .no-print * {
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
        @page {
            @bottom-right {
                content: counter(page) " of " counter(pages);
            }
            .no-print, .no-print * {
                display: none !important;
            }
        }

    </style>
	<meta charset="utf-8">
    <script type="text/javascript" src="../../js/jquery.js"></script>
	<script type="text/javascript" src="../../js/jquery.table2excel.js"></script>
    <script type="text/javascript" language="javascript">
        $(document).ready(function() {
			$(document).on('click','#xuatexcel',function(e) {
				var BOM = '\ufeff'; // BOM UTF-8
				var result = 'data:application/vnd.ms-excel;charset=utf-8,' + encodeURIComponent(BOM + $('.BangInExcel').html());
				var link = document.createElement("a");
				document.body.appendChild(link);
				link.download = "Bang_ChiTiet_CNKH_" + new Date().toISOString().replace(/[\-\:\.]/g, "") + ".xls";
				link.href = result;
				link.click();
			});
			
            /*$('#xuatexcel').click(function(){
                $(".BangInExcel").table2excel({
                    exclude: ".noExl",
                    name: "Excel Document Name",
                    filename: "Bang_C_" + new Date().toISOString().replace(/[\-\:\.]/g, "") + ".xls",
                    fileext: ".xls",
                    exclude_img: true,
                    exclude_links: true,
                    exclude_inputs: true,
                    preserveColors: true
                });
            })*/
        });
    </script>
</head>
<body class="dt-print-view">
<table class="no-print" style="background-color: #00c6ff;" width="100%" >
    <tr>
        <td class="no-print"><input class="no-print" type="button" style="color: #0000CC;font-weight: bold;border: 2px solid red;" value="Xuất excel" id="xuatexcel"></td>
        <td></td>
    </tr>
</table>
<div class="BangInExcel">
<?php
$html_ct = "";

$tamtinhdauky = ($_SESSION["GETNODK"]['sdkco'] - $_SESSION["GETNODK"]['sdkno']);
if ($tamtinhdauky > 0) {
    $nodk = 0;
    $codk = $tamtinhdauky;
} else {
    $nodk = abs($tamtinhdauky);
    $codk = 0;
}

$html_title = '
<thead>
  <tr>
    <th STYLE="border:0.5px solid #000;"  rowspan="2">&nbsp;<br/>STT</th>
    <th STYLE="border:0.5px solid #000;"  rowspan="2">&nbsp;<br/>Ngày ghi sổ</th>
    <th STYLE="border:0.5px solid #000;"  colspan="2">&nbsp;<br/>Chứng từ</th>
	<th STYLE="border:0.5px solid #000;"  rowspan="2">&nbsp;<br/>Diễn giải</th>
    <th STYLE="border:0.5px solid #000;"  rowspan="2" >TK Đ.Ư</th>
    <th STYLE="border:0.5px solid #000;"  colspan="2">Số phát sinh trong năm</th>
  </tr>
  <tr>
   <th STYLE="border:0.5px solid #000;" >Số hiệu</th>
    <th STYLE="border:0.5px solid #000;" >Ngày,Tháng</th>
    <th STYLE="border:0.5px solid #000;">Nợ</th>
    <th STYLE="border:0.5px solid #000;" >Có</th>
  </tr>
  <tr>
    <th STYLE="border-top:0.5px solid #FFF;border-right:0.5px solid #000;border-left:0.5px solid #000;border-bottom:0.5px solid #000;"></th>
    <th STYLE="border-top:0.5px solid #FFF;border-right:0.5px solid #000;border-left:0.5px solid #000;border-bottom:0.5px solid #000;"></th>
    <th STYLE="border-top:0.5px solid #FFF;border-right:0.5px solid #000;border-left:0.5px solid #000;border-bottom:0.5px solid #000;"></th>
	<th STYLE="border-top:0.5px solid #FFF;border-right:0.5px solid #000;border-left:0.5px solid #000;border-bottom:0.5px solid #000;"></th>
    <th align="right" STYLE="border-top:0.5px solid #FFF;border-right:0.5px solid #000;border-left:0.5px solid #000;border-bottom:0.5px solid #000;"><b>Số dư đầu kỳ</b></th>
    <th align="right" STYLE="border-top:0.5px solid #FFF;border-right:0.5px solid #000;border-left:0.5px solid #000;border-bottom:0.5px solid #000;"></th>
    <th align="right" STYLE="border-top:0.5px solid #FFF;border-right:0.5px solid #000;border-left:0.5px solid #000;border-bottom:0.5px solid #000;text-align: right;"><b>' . (number_format($nodk != 0) ? number_format($nodk, 0, ",", ".") : "") . '</b></th>
    <th align="right" STYLE="border-top:0.5px solid #FFF;border-right:0.5px solid #000;border-left:0.5px solid #000;border-bottom:0.5px solid #000;"><b>' . (number_format($codk != 0) ? number_format($codk, 0, ",", ".") : "") . '</b></td>
  </tr>
   </thead>
  ';
$sott = 0;
$tongdoanhthu = 0;
$tongthue = 0;
foreach ($DATA as $k => $item) {
    $tongducotk = 0;
    $tongdunotk = 0;

    foreach ($item as $itemCT) {
        if (number_format($itemCT["tienco"]) == 0 && number_format($itemCT["tienno"]) == 0) {

        } else {
            $sott++;
            $html_ct .= '
        <tr >
        <td class="td_first"  width="35px" align="center" >' . $itemCT["mapskt"] . '</td>
        <td class="td_center" width="40px" align="center" style="mso-number-format:\'\@\';" >' . date("d-m", strtotime($itemCT["ngayghiso"])) . '</td>
        <td class="td_center" align="center" width="70px" >' . $itemCT["sct"] . '</td>
		<td class="td_center" align="center"  width="40px" style="mso-number-format:\'\@\';" >' . date("d-m", strtotime($itemCT["ngayhoadon"])) . '</td>
        <td class="td_center" align="left" width="280px" >' . $itemCT["noidung"] . '</td>
        <td class="td_center" width="40px" >' . $itemCT["tkdu"] . '</td>
        <td align="right" class="td_center" width="100px" >';
            $html_ct .= $sodunops = (number_format($itemCT["tienno"] != 0) ? number_format($itemCT["tienno"], 0, ",", ".") : "");
            $html_ct .= '</td>
        <td align="right" class="td_end" width="100px" >';
            $html_ct .= $soducops = (number_format($itemCT["tienco"] != 0) ? number_format($itemCT["tienco"], 0, ",", ".") : "");

            $html_ct .= '</td></tr>';
            $tongduco += $itemCT["tienco"];
            $tongduno += $itemCT["tienno"];

            /////////////////////////////////////////////
            $tongducotk += $itemCT["tienco"];
            $tongdunotk += $itemCT["tienno"];
        }

    }
    $html_ct .= '<tr>
    <td class="td_full"></td>
    <td class="td_full"></td>
    <td class="td_full"></td>
	<td class="td_full"></td>
    <td style="text-align: right;" class="td_full"><i>Cộng tháng ' . $k . '/' . $_SESSION['NienDo'] . '</i></td>
    <td style="text-align: right;" class="td_full"></td>
    <td style="text-align: right;" class="td_full"><i>' . number_format($tongdunotk, 0, ",", ".") . '</b></td>
    <td style="text-align: right;" class="td_full"><i>' . number_format($tongducotk, 0, ",", ".") . '</b></td>
  </tr>';
    $tinhtam = ($codk + $tongducotk) - ($nodk + $tongdunotk);
    if ($tinhtam > 0) {
        $nodk = 0;
        $codk = abs($tinhtam);
    } else {
        $nodk = abs($tinhtam);
        $codk = 0;
    }
    $html_ct .= '<tr>
    <td class="td_full"></td>
    <td class="td_full"></td>
    <td class="td_full"></td>
	<td class="td_full"></td>
    <td style="text-align: right;" class="td_full"><i>Cộng số dư tháng ' . $k . '/' . $_SESSION['NienDo'] . '</i></td>
    <td style="text-align: right;" class="td_full"></td>
    <td style="text-align: right;" class="td_full"><i>';
    $html_ct .= ($nodk == 0) ? "" : number_format($nodk, 0, ",", ".");
    $html_ct .= '</b></td>
    <td style="text-align: right;" class="td_full"><i>';
    $html_ct .= ($codk == 0) ? "" : number_format($codk, 0, ",", ".");
    $html_ct .= '</b></td>
  </tr>';
}
$dunocktmp = (($tongduco + $_SESSION["GETNODK"]['sdkco']) - ($tongduno + $_SESSION["GETNODK"]['sdkno']));
if ($dunocktmp > 0) {
    $tongnock = 0;
    $tongcock = abs($dunocktmp);
} else {
    $tongnock = abs($dunocktmp);
    $tongcock = 0;
}
$html = '
<table width="100%" border="0" style="border-bottom: 1px solid #000">
  <tr>
    <td colspan="5" align="left" WIDTH="55%"><B>' . $_SESSION["TenCongTy"] . '</B><br/>' . $_SESSION["DiaChi"] . '<br/>MST: ' . $_SESSION["MST"] . '</td>    
    <td align="center" WIDTH="15%"></td>
    <td colspan="2" WIDTH="30%" align="center" style="font-size:11px;" valign="top">
		Mẫu số: S13-DNN<br/> 
		(Ban hành ' . $_SESSION['THONGTUMANG'][$_SESSION['theothongtu']]['thongtu'] . ' ngày ' . $_SESSION['THONGTUMANG'][$_SESSION['theothongtu']]['ngay'] . ' của Bộ Tài Chính)</i>
	</td>
  </tr>
</table>
<table><tr><td></td></tr></table>
<table align="center"  border="0" width="100%">
  <tr>
    <td colspan="8" align="center" ><b>' . $_SESSION["THONGTINPHIEU"]['tenphieu'] . '</b></td>
  </tr>
  <tr>
    <td colspan="8" align="center" ><b>' . $_SESSION["THONGTINPHIEU"]['ngayhoadon'] . '</b></td>
  </tr>
   <tr>
    <td colspan="8">
        <table border="0" width="790px">
            <tr valign="top" >
                <td width="90px" align="left" valign="top">Tài khoản:</td>
                <td width="190px" align="left" valign="top"><b>' . $_SESSION["GETMATK"]['matk'] . '</b></td>
                <td width="80px" align="left" valign="top">Số hiệu:</td>
                <td width="180px" align="left" valign="top"><b>' . $_SESSION["GETMATK"]['tentk'] . '</b></td>
                <td width="60px" align="left" valign="top">Mã số:</td>
                <td width="130px" align="left" valign="top"><b>' . $_SESSION["GETMAKH"]['makh'] . '</b></td>
            </tr>
            <tr>
                <td align="left">Khách hàng:</td>
                <td align="left"><b>' . $_SESSION["GETMAKH"]['tenkh'] . '</b></td>
                <td align="left">Địa chỉ:</td>
                <td colspan="3" align="left"><b>' . $_SESSION["GETMAKH"]['diachi'] . '</b></td>
            </tr>
            <tr>
                <td align="left">Mã số thuế:</td>
                <td align="left"><b>' . $_SESSION["GETMAKH"]['masothue'] . '</b></td>
                <td align="left">Điện thoại:</td>
                <td align="left"><b>' . $_SESSION["GETMAKH"]['dienthoai'] . '</b></td>
                <td align="left">FAX:</td>
                <td></td>
            </tr>            
        </table>
    </td>
  </tr>
</table>
<table width="100%" border="0">
  <tr>
    <td align="right"></td>
  </tr>
</table>
<table border="1" class="dataTable" cellpadding="2" cellspacing="0" align="center" valign="middle">' . $html_title . $html_ct . '
<tr>
    <td STYLE="border:0.5px solid #000;"></td>
    <td STYLE="border:0.5px solid #000;"></td>
    <td STYLE="border:0.5px solid #000;"></td>
	<td STYLE="border:0.5px solid #000;"></td>
    <td align="right" STYLE="border:0.5px solid #000;"><b>Cộng số phát sinh</b></td>
    <td align="right" STYLE="border:0.5px solid #000;"></td>
    <td align="right" STYLE="border:0.5px solid #000;"><b>' . number_format($tongduno, 0, ",", ".") . '</b></td>
    <td align="right" STYLE="border:0.5px solid #000;"><b>' . number_format($tongduco, 0, ",", ".") . '</b></td>
  </tr>
  
  <tr>
    <td STYLE="border:0.5px solid #000;"></td>
    <td STYLE="border:0.5px solid #000;"></td>
    <td STYLE="border:0.5px solid #000;"></td>
	<td STYLE="border:0.5px solid #000;"></td>
    <td align="right" STYLE="border:0.5px solid #000;"><b>Cộng số dư cuối kỳ</b></td>
    <td align="right" STYLE="border:0.5px solid #000;"></td>
    <td STYLE="border:0.5px solid #000;" align="right" ><b>';
$html .= ($tongnock == 0) ? "" : number_format($tongnock, 0, ",", ".");
$html .= '</b></td>
<td STYLE="border:0.5px solid #000;" align="right" ><b>';
$html .= ($tongcock == 0) ? "" : number_format($tongcock, 0, ",", ".");
$html .= '</b></td>
  </tr>
</table>
<table><tr><td></td></tr></table>

<table width="100%" border="0" cellpadding="2">
  <tr>
	  <td colspan="4" align="center" width="35%">&nbsp;<br/>Người lập phiếu</td>
	  <td align="center" width="35%">&nbsp;<br/>Kế toán trưởng</td>
	  <td colspan="3" width="30%" rowspan="2" align="center">
		<em>'.$_SESSION["ThanhPho"].', Ngày ';
		$time = strtotime($_SESSION["THONGTINPHIEU"]['ngaylap']);
		$html .= date("d-m-Y", $time);
		$html .= '</em><br/>Giám đốc
	  </td>
  </tr>
</table>
';
echo $html;
?>
</div>
</body>
</html>


