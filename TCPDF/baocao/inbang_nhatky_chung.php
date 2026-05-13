<?php
session_start();
require_once('tcpdf_include.php');
$DATACTPHIEUGHISO = $_SESSION["LISTCTSONHATKY"];
?>
<html>
<head><title>Sổ nhật ký chung (Nhấn CTRL + P để in , ALT + F4 để thoát)</title>

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

        @media print {
            #Header, #Footer {
                display: none !important;
            }

            .page_break {
                page-break-before: always;
            }
            .no-print, .no-print * {
                display: none !important;
            }
			@page {
				size: A4;
				margin-top: 5mm;
				margin-bottom: 10mm;
			}
        }
    </style>
    <meta charset="utf-8">
	    <script type="text/javascript" src="../../js/jquery.js"></script>
		<script type="text/javascript" language="javascript">
			$(document).ready(function() {
				/*$('#xuatexcel').click(function(){
						$(".BangInExcel").table2excel({
							exclude: ".noExl",
							name: "Excel Document Name",
							filename: "So_Cai_" + new Date().toISOString().replace(/[\-\:\.]/g, "") + ".xls",
							fileext: ".xls",
							exclude_img: true,
							exclude_links: true,
							exclude_inputs: true,
							preserveColors: true
						});
				})*/
				$(document).on('click','#xuatexcel',function(e) {
					var result = 'data:application/vnd.ms-excel,' + encodeURIComponent($('.BangInExcel').html());
					var link = document.createElement("a");
					document.body.appendChild(link);
					link.download = "So_Nhat_Ky_" + new Date().toISOString().replace(/[\-\:\.]/g, "") + ".xls",
					link.href = result;
					link.click();
				});
			});
		</script>
</head>
<body class="dt-print-view">
<table style="background-color: #00c6ff;" border="0" width="100%" >
    <tr>
        <td colspan="8" class="no-print"><input type="button" style="color: #0000CC;font-weight: bold;border: 2px solid red;" value="Xuất excel" id="xuatexcel"></td>
    </tr>
</table>
<div class="BangInExcel">
<?php
$html_ct = "";
$html_title = '
<thead border ="5">
  <tr>
    <th STYLE="border:0.5px solid #000;" width="70px" rowspan="2">&nbsp;<br/>Ngày ghi sổ</th>
    <th STYLE="border:0.5px solid #000;" width="140px" colspan="2">Chứng từ</th>
    <th STYLE="border:0.5px solid #000;" width="200px" rowspan="2">&nbsp;<br/>Diễn giải</th>
    <th STYLE="border:0.5px solid #000;" width="40px" rowspan="2">TK Nợ/Có</th>
    <th STYLE="border:0.5px solid #000;" width="40px" rowspan="2">Số hiệu TK dối ứng</th>
    <th STYLE="border:0.5px solid #000;" colspan="2" width="120px">Số phát sinh</th>
  </tr>
  <tr>
    <th STYLE="border:0.5px solid #000;" width="50px" >Số hiệu</th>
    <th STYLE="border:0.5px solid #000;" width="80px">Ngày</th>
    <th STYLE="border:0.5px solid #000;">Nợ</th>
    <th STYLE="border:0.5px solid #000;" >Có</th>
  </tr>
  <tr>
    <th STYLE="border:0.5px solid #000;">A</th>
    <th STYLE="border:0.5px solid #000;">B</th>
    <th STYLE="border:0.5px solid #000;">C</th>
    <th STYLE="border:0.5px solid #000;">D</th>
    <th STYLE="border:0.5px solid #000;">E</th>
    <th STYLE="border:0.5px solid #000;">F</th>
    <th STYLE="border:0.5px solid #000;">1</th>
    <th STYLE="border:0.5px solid #000;">2</th>
  </tr>
  </thead>
  ';
$sott = 0;
$tongno = 0;
$tongco = 0;
$tong = 0;
foreach ($DATACTPHIEUGHISO as $k=> $itemTH) {
    krsort($itemTH);
    foreach ($itemTH as $itemCT){
        $sott++;
            $tongno += $itemCT['tienno'];
            $tongco += $itemCT['tienco'];
            $TongNoCo = $itemCT["tienno"]+$itemCT["tienco"];
            if($TongNoCo!=0 ) {
                $html_ct .= '
        <tr >
        <td class="td_first" STYLE="text-align: center;">';
                $timeghiso = strtotime($itemCT["ngayghiso"]);
                $html_ct .= date("d-m-Y", $timeghiso);
                $html_ct .= '</td>
        <td class="td_center" STYLE="text-align: center;">' . $itemCT["sophieu"] . '</td>
        <td class="td_center" STYLE="text-align: center;">';
                $time = strtotime($itemCT["ngayhoadon"]);
                $html_ct .= date("d-m-Y", $time);
                $html_ct .= '</td>
        <td class="td_center" align="left">' . $itemCT["noidung"] . '</td>
        <td class="td_center" >' . $itemCT["tk"] . '</td>
        <td class="td_center" >' . $itemCT["tkdu"] . '</td>
        <td class="td_center" align="right">';
                $tienno1 = ($itemCT["tienno"] == 0) ? "" : number_format($itemCT["tienno"], 0, ",", ".");
                $html_ct .= $tienno1;
                $html_ct .= '</td>
        <td class="td_end" align="right">';
                $tienco1 = ($itemCT["tienco"] == 0) ? "" : number_format($itemCT["tienco"], 0, ",", ".");
                $html_ct .= $tienco1;
                $html_ct .= '</td>
      </tr>';
            }
            }
}

$html = '
<table width="100%" border="0" style="border-bottom: 1px solid #000">
  <tr>
    <td colspan="4" align="left" WIDTH="50%"><B>' . $_SESSION["TenCongTy"] . '</B><br/>' . $_SESSION["DiaChi"] . '<br/>MST:' . $_SESSION["MST"] . '</td>    
    <td colspan="2" align="center" WIDTH="5%"></td>
    <td colspan="2" WIDTH="25%" align="center">
		<i><b>Mẩu số S03a-DNN</b><br/>
        (Ban hành kèm theo thông tư số 133/2016/TT-BTC  ngày 26/08/2016 của Bộ Tài Chính)</i>  
	</td>
  </tr>
</table>
<table><tr><td></td></tr></table>
<table border="0" align="center">
  <tr>
    <td align="center" colspan="8"><b>' . $_SESSION["THONGTINPHIEU"]['tenphieu'] . '</b></td>
  </tr>
  <tr>
    <td align="center" colspan="8">' . $_SESSION["THONGTINPHIEU"]['ngayhoadon'] . '</td>
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
    <td STYLE="border:0.5px solid #000;"><b>Tổng</b></td>
    <td STYLE="border:0.5px solid #000;"></td>
    <td align="right" STYLE="border:0.5px solid #000;"><b>' . number_format($tongno, 0, ",", ".") . '</b></td>
    <td align="right" STYLE="border:0.5px solid #000;"><b>' . number_format($tongco, 0, ",", ".") . '</b></td>
  </tr>
</table>
<table width="100%" cellpadding="2"><tr><td colspan="8">Ghi chú: Tất cả số phát sinh đã ghi vào sổ cái</td></tr></table>
<table><tr><td></td></tr></table>

<table width="100%" border="0" cellpadding="2">
  <tr>
	<td colspan="3" align="center" width="35%">&nbsp;<br/>Người ghi sổ</td>
    <td colspan="3" align="center" width="35%">&nbsp;<br/>Kế toán trưởng</td>
    <td colspan="2" width="30%" rowspan="2" align="center">
    <em>Trà Vinh Ngày ';
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
</div>
</body>
</html>



