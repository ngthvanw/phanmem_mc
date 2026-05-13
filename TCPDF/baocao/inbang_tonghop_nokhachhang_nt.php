<?php
session_start();
$DATACIBANRA = $_SESSION["LISTTONGHOPNO"];
function NB_Format($Number){
	$a = new \NumberFormatter("it-IT", \NumberFormatter::DECIMAL);
	$a->setAttribute(\NumberFormatter::MIN_FRACTION_DIGITS, 0);
	$a->setAttribute(\NumberFormatter::MAX_FRACTION_DIGITS, 5); //Định dạng thập phân cao nhất
	return $a->format($Number);
}
?>
<html>
<head><title>Bảng tổng hợp công nợ ngoại tệ khách hàng (Nhấn CTRL + P để in , ALT + F4 để thoát)</title>

    <style type="text/css" class="init">
        .dataTable {
            font-family: "Times New Roman", Georgia, Serif;
            border-collapse: collapse;
            width: 100%;
        }
        .dataTable td{
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
        body{
            width: 297mm;
			margin: 2px;
			padding: 2px;
        }
        .page_break{
            page-break-inside: avoid;
        }
		@page {
			size: A4 landscape;
            margin-top: 5mm;
            margin-bottom: 10mm;

			}


		@media print {
			#Header, #Footer { display: none !important; }
			.no-print, .no-print * {
                display: none !important;
            }
		}
		#Header, #Footer { display: none !important; }
		 @media print
   {
      p.bodyText {font-family:times,georgia, serif;}
   }

    </style>
     <meta charset="utf-8">
    <script type="text/javascript" src="../../js/jquery.js"></script>
    <script type="text/javascript" src="../../js/jquery.table2excel.js"></script>
    <script type="text/javascript" language="javascript">
        $(document).ready(function() {
            $dir_module_user = "../../modules/user/";////////////////Khai báo đường dẫn vào mudole
            /*$('#xuatexcel').click(function(){
                $(".BangInExcel").table2excel({
                    exclude: ".noExl",
                    name: "Excel Document Name",
                    filename: "Cong_No_KH" + new Date().toISOString().replace(/[\-\:\.]/g, "") + ".xls",
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
				link.download = "Cong_No_KH_NT_" + new Date().toISOString().replace(/[\-\:\.]/g, "") + ".xls",
				link.href = result;
				link.click();
			});
        });
    </script>
</head>
<body class="dt-print-view">
<table border="0" style="background-color: #00c6ff;" width="100%" class="no-print">
    <tr>
        <td  colspan=2 ><input type="button" style="color: #0000CC;font-weight: bold;border: 2px solid red;" value="Xuất excel" id="xuatexcel"></td>
    </tr>
</table>
<div class="BangInExcel">
<?php
$html_ct="";
$html_title='
<thead>
  <tr>
    <th STYLE="border:0.5px solid #000;" width="35px" rowspan="2" align="center">&nbsp;<br/>STT</td>
    <th STYLE="border:0.5px solid #000;" width="60px" rowspan="2" align="center">&nbsp;<br/>Mã số</td>
    <th STYLE="border:0.5px solid #000;" width="200px" rowspan="2" align="center">&nbsp;<br/>Họ tên</td>
	<th STYLE="border:0.5px solid #000;" width="30px" rowspan="2" align="center">&nbsp;<br/>Số hiệu TK</td>
    <th STYLE="border:0.5px solid #000;" width="160px" colspan="2" align="center">Số dư đầu năm</td>
    <th STYLE="border:0.5px solid #000;" width="160px" colspan="2" align="center">Số phát sinh trong năm</td>
    <th STYLE="border:0.5px solid #000;" colspan="2" width="160px" align="center">Số dư cuối năm</td>
     <th STYLE="border:0.5px solid #000;" width="60px" rowspan="2" align="center">Loại tiền</td>
  </tr>
  <tr>
    <th STYLE="border:0.5px solid #000;">Nợ</td>
    <th STYLE="border:0.5px solid #000;" >Có</td>
    <th STYLE="border:0.5px solid #000;">Nợ</td>
    <th STYLE="border:0.5px solid #000;" >Có</td>
    <th STYLE="border:0.5px solid #000;">Nợ</td>
    <th STYLE="border:0.5px solid #000;" >Có</td>
  </tr>
  </thead>
  ';
$sott=0;
$tongdoanhthu=0;
$tongthue=0;
    foreach ($DATACIBANRA as $k=> $item) {
        if($_GET['xemtonghop']=="false"){
        $tongducodktk = 0;
        $tongdunodktk = 0;

        $tongducopstk = 0;
        $tongdunopstk = 0;

        $tongducocktk = 0;
        $tongdunocktk = 0;
        foreach ($item as $itemCT) {
            $sott++;
            $tongdoanhthu += $itemCT["thanhtien"];
            $tongthue += $itemCT["thue"];
            $imdam = "";
            if ($itemCT["makhcha"] == "0") {
                $imdam = 'style="font-weight:bold"';
            }
            $html_ct .= '
        <tr >
        <td class="td_first" align="center" ' . $imdam . ' >' . $sott . '</td>
        <td class="td_center" ' . $imdam . ' >' . strtoupper($itemCT["makh"]) . '</td>
        <td class="td_center" ' . $imdam . ' align="left">' . $itemCT["tenkh"] . '</td>
		<td class="td_center" ' . $imdam . ' align="center">' . $itemCT["matk"] . '</td>
        <td class="td_center" ' . $imdam . ' align="right">';
            if ($itemCT["tongduno"] != 0) {
                $html_ct .= (($itemCT["tongdunont"] != 0) ? NB_Format($itemCT["tongdunont"]) : "");
                $soduno = round($itemCT["tongdunont"], 3);
            } else {
                $html_ct .= (($itemCT["sodunont"] != 0) ? NB_Format($itemCT["sodunont"]) : "");
                $soduno = round($itemCT["sodunont"], 3);
            }
            $html_ct .= '</td>
        <td class="td_center" ' . $imdam . ' align="right">';
            if ($itemCT["tongducont"] != 0) {
                $html_ct .= (($itemCT["tongducont"] != 0) ? NB_Format($itemCT["tongducont"]) : "");
                $soduco  = round($itemCT["tongducont"], 3);
            } else {
                $html_ct .= $soduco = (($itemCT["soducont"] != 0) ? NB_Format($itemCT["soducont"]) : "");
                $soduco  = round($itemCT["soducont"], 3);
            }
            $html_ct .= '</td>
        <td class="td_center" ' . $imdam . ' align="right">';
            if ($itemCT["tongdunontps"] != "" || $itemCT["tongdunontps"] != 0) {
                $html_ct .= (($itemCT["tongdunontps"] != 0) ? NB_Format($itemCT["tongdunontps"]) : "");
                $sodunops   = round($itemCT["tongdunontps"], 3);
            } else {
                $html_ct .= (($itemCT["sodunontps"] != 0) ? NB_Format($itemCT["sodunontps"]) : "");
                $sodunops   = round($itemCT["sodunontps"], 3);
            }
            $html_ct .= '</td>
        <td class="td_center" ' . $imdam . ' align="right" >';
            if ($itemCT["tongducontps"] != "" || $itemCT["tongdunontps"] != 0) {
                $html_ct .=  (($itemCT["tongducontps"] != 0) ? NB_Format($itemCT["tongducontps"]) : "");
                $soducops   = round($itemCT["tongducontps"], 3);
            } else {
                $html_ct .= $soducops = (($itemCT["soducontps"] != 0) ? NB_Format($itemCT["soducontps"]) : "");
                $soducops   = round($itemCT["soducontps"], 3);
            }
            $html_ct .= '</td>
        <td class="td_center" ' . $imdam . '  align="right">';
            // Xử lý Nợ cuối

            $soducktinh = ($soduno + $sodunops) - ($soduco + $soducops);
            if ($soducktinh >= 0) {
                $sodunock = ($soduno + $sodunops) - ($soduco + $soducops);
                $html_ct .=NB_Format($sodunock);
            } else {

            }
            $html_ct .= '</td>
        <td class="td_center" ' . $imdam . ' align="right">';
            if ($soducktinh >= 0) {
            } else {
                $soducock = ($soduco + $soducops) - ($soduno + $sodunops);
                $html_ct .=  NB_Format($soducock);
            }
            $html_ct .= '</td>
<td class="td_end" ' . $imdam . ' align="center">' . $itemCT["loaitien"] . '</td>
      </tr>';
            if ($itemCT['makhcha'] == "0") {
                $tongducodk += $itemCT["soducont"];
                $tongdunodk += $itemCT["sodunont"];

                $tongducops += $itemCT["soducontps"];
                $tongdunops += $itemCT["sodunontps"];

                $tongducock += $itemCT["tongducontck"];
                $tongdunock += $itemCT["tongdunontck"];
                /////////////////////////////////////////////
                $tongducodktk += $itemCT["soducont"];
                $tongdunodktk += $itemCT["sodunont"];

                $tongducopstk += $itemCT["soducontps"];
                $tongdunopstk += $itemCT["sodunontps"];

                $tongducocktk += $itemCT["tongducontck"];
                $tongdunocktk += $itemCT["tongdunontck"];
            }
        }
        $html_ct .= '<tr>
    <td STYLE="border:0.5px solid #000;"></td>
    <td STYLE="border:0.5px solid #000;"></td>
    <td STYLE="border:0.5px solid #000;" align="right"><b>Tổng tài khoản ' . $k . '</b></td>
	<td STYLE="border:0.5px solid #000;"></td>
    <td align="right" STYLE="border:0.5px solid #000;"><b>' . NB_Format($tongdunodktk) . '</b></td>
    <td align="right" STYLE="border:0.5px solid #000;"><b>' . NB_Format($tongducodktk) . '</b></td>
    <td align="right" STYLE="border:0.5px solid #000;"><b>' . NB_Format($tongdunopstk) . '</b></td>
    <td align="right" STYLE="border:0.5px solid #000;"><b>' . NB_Format($tongducopstk) . '</b></td>
    <td align="right" STYLE="border:0.5px solid #000;"><b>' . NB_Format($tongdunocktk) . '</b></td>
     <td align="right" STYLE="border:0.5px solid #000;"><b>' . NB_Format($tongducocktk) . '</b></td>
     <td STYLE="border:0.5px solid #000;" ' . $imdam . ' align="center"></td>
  </tr>';
    }else{
            $tongducodktk = 0;
            $tongdunodktk = 0;

            $tongducopstk = 0;
            $tongdunopstk = 0;

            $tongducocktk = 0;
            $tongdunocktk = 0;
            foreach ($item as $itemCT) {
                if ($itemCT['makhcha'] == "0") {
                    
                $sott++;
                $tongdoanhthu += $itemCT["thanhtien"];
                $tongthue += $itemCT["thue"];
                $imdam = "";
                if ($itemCT["makhcha"] == "0") {
                    //$imdam = 'style="font-weight:bold"';
                }
                $html_ct .= '
        <tr >
        <td class="td_first" align="center" ' . $imdam . ' >' . $sott . '</td>
        <td class="td_center" ' . $imdam . ' >' . strtoupper($itemCT["makh"]) . '</td>
        <td class="td_center" ' . $imdam . ' align="left">' . $itemCT["tenkh"] . '</td>
		<td class="td_center" ' . $imdam . ' align="center">' . $itemCT["matk"] . '</td>
        <td class="td_center" ' . $imdam . ' align="right">';
                if ($itemCT["tongdunont"] != 0) {
                    $html_ct .= (($itemCT["tongdunont"] != 0) ? NB_Format($itemCT["tongdunont"]) : "");
                    $soduno = round($itemCT["tongdunont"],3);
                } else {
                    $html_ct .= (($itemCT["sodunont"] != 0) ? NB_Format($itemCT["sodunont"]) : "");
                    $soduno = round($itemCT["sodunont"],3);
                }
                $html_ct .= '</td>
        <td class="td_center" ' . $imdam . ' align="right">';
                if ($itemCT["tongducont"] != 0) {
                    $html_ct .= $soduco = (($itemCT["tongducont"] != 0) ? NB_Format($itemCT["tongducont"]) : "");
                } else {
                    $html_ct .= $soduco = (($itemCT["soducont"] != 0) ? NB_Format($itemCT["soducont"]) : "");
                }
                $html_ct .= '</td>
        <td class="td_center" ' . $imdam . ' align="right">';
                if ($itemCT["tongdunontps"] != "" || $itemCT["tongdunontps"] != 0) {
                    $html_ct .= (($itemCT["tongdunontps"] != 0) ? NB_Format($itemCT["tongdunontps"]) : "");
                    $sodunops = round($itemCT["tongdunontps"],3);
                } else {
                    $html_ct .= (($itemCT["sodunontps"] != 0) ? NB_Format($itemCT["sodunontps"]) : "");
                    $sodunops = round($itemCT["sodunontps"],3);
                }
                $html_ct .= '</td>
        <td class="td_center" ' . $imdam . ' align="right" >';
                if ($itemCT["tongducontps"] != "" || $itemCT["tongdunontps"] != 0) {
                    $html_ct .= (($itemCT["tongducontps"] != 0) ? NB_Format($itemCT["tongducontps"]) : "");
                    $soducops = round($itemCT["tongducontps"],3);
                } else {
                    $html_ct .= $soducops = (($itemCT["soducontps"] != 0) ? NB_Format($itemCT["soducontps"]) : "");
                    $soducops = round($itemCT["soducontps"],3);
                }
                $html_ct .= '</td>
        <td class="td_center" ' . $imdam . '  align="right">';
                // Xử lý Nợ cuối

                $soducktinh = ($soduno + $sodunops) - ($soduco + $soducops);
                if ($soducktinh >= 0) {
                    $sodunock = ($soduno + $sodunops) - ($soduco + $soducops);
                    $html_ct .=  NB_Format($sodunock);
                } else {

                }
                $html_ct .= '</td>
        <td class="td_center" ' . $imdam . ' align="right">';
                if ($soducktinh >= 0) {

                } else {
                    $soducock = ($soduco + $soducops) - ($soduno + $sodunops);
                    $html_ct .= NB_Format($soducock);
                }
                $html_ct .= '</td>
<td class="td_end" ' . $imdam . ' align="center">' . $itemCT["loaitien"] . '</td>
      </tr>';
                    $tongducodk += $itemCT["soducont"];
                    $tongdunodk += $itemCT["sodunont"];

                    $tongducops += $itemCT["soducopsnt"];
                    $tongdunops += $itemCT["sodunopsnt"];

                    $tongducock += $itemCT["tongducock"];
                    $tongdunock += $itemCT["tongdunock"];
                    /////////////////////////////////////////////
                    $tongducodktk += $itemCT["soducont"];
                    $tongdunodktk += $itemCT["sodunont"];

                    $tongducopstk += $itemCT["soducontps"];
                    $tongdunopstk += $itemCT["sodunontps"];

                    $tongducocktk += $itemCT["tongducontck"];
                    $tongdunocktk += $itemCT["tongdunontck"];
                }
            }
            $html_ct .= '<tr>
    <td STYLE="border:0.5px solid #000;"></td>
    <td STYLE="border:0.5px solid #000;"></td>
    <td STYLE="border:0.5px solid #000;" align="right"><b>Tổng tài khoản ' . $k . '</b></td>
	<td STYLE="border:0.5px solid #000;"></td>
    <td align="right" STYLE="border:0.5px solid #000;"><b>' . NB_Format($tongdunodktk) . '</b></td>
    <td align="right" STYLE="border:0.5px solid #000;"><b>' . NB_Format($tongducodktk) . '</b></td>
    <td align="right" STYLE="border:0.5px solid #000;"><b>' . NB_Format($tongdunopstk) . '</b></td>
    <td align="right" STYLE="border:0.5px solid #000;"><b>' . NB_Format($tongducopstk) . '</b></td>
    <td align="right" STYLE="border:0.5px solid #000;"><b>' . NB_Format($tongdunocktk) . '</b></td>
     <td align="right" STYLE="border:0.5px solid #000;"><b>'.NB_Format($tongducocktk) . '</b></td>
    <td STYLE="border:0.5px solid #000;" ' . $imdam . ' align="center"></td>
  </tr>';
        }
}

$html = '
<table width="100%" border="0" style="border-bottom: 1px solid #000">
  <tr>
    <td colspan="6" align="left" WIDTH="55%"><B>'.$_SESSION["TenCongTy"].'</B><br/>'.$_SESSION["DiaChi"].'</td>    
    <td colspan="2" align="center" WIDTH="20%"></td>
    <td colspan="3" WIDTH="25%" align="right">MST:'.$_SESSION["MST"].'</td>
  </tr>
</table>
<table><tr><td></td></tr></table>
<table border="0" align="center">
  <tr>
    <td colspan="11"><b>'.$_SESSION["THONGTINPHIEU"]['tenphieu'].'</b></td>
  </tr>
  <tr>
    <td colspan="11"><b>'.$_SESSION["THONGTINPHIEU"]['ngayhoadon'].'</b></td>
  </tr>
</table>
<table width="100%" border="0">
  <tr>
    <td align="right"></td>
  </tr>
</table>
<table border="1" cellpadding="2" class="dataTable" cellspacing="0" align="center" valign="middle">'.$html_title.$html_ct.'

<tr>
    <td width="30px" STYLE="border:0.5px solid #000;"></td>
    <td width="80px" STYLE="border:0.5px solid #000;"></td>
    <td width="300px" STYLE="border:0.5px solid #000;" align="right"><b>Tổng</b></td>
	<td width="30px" STYLE="border:0.5px solid #000;"></td>
    <td width="100px" align="right" STYLE="border:0.5px solid #000;"><b>'.NB_Format($tongdunodk,3,",",".").'</b></td>
    <td width="100px" align="right" STYLE="border:0.5px solid #000;"><b>'.NB_Format($tongducodk,3,",",".").'</b></td>
    <td width="100px" align="right" STYLE="border:0.5px solid #000;"><b>'.NB_Format($tongdunops,3,",",".").'</b></td>
    <td width="100px" align="right" STYLE="border:0.5px solid #000;"><b>'.NB_Format($tongducops,3,",",".").'</b></td>
    <td width="100px" align="right" STYLE="border:0.5px solid #000;"><b>'.NB_Format($tongdunock,3,",",".").'</b></td>
     <td width="100px" align="right" STYLE="border:0.5px solid #000;"><b>'.NB_Format($tongducock,3,",",".").'</b></td>
     <td STYLE="border:0.5px solid #000;" ' . $imdam . ' align="center"></td>
  </tr>
</table>
<table><tr><td></td></tr></table>

<table width="100%" border="0" cellpadding="2">
  <tr>
	<td  colspan="3" align="center" width="35%">&nbsp;<br/>Người lập phiếu</td>
    <td  colspan="4" align="center" width="35%">&nbsp;<br/>Kế toán trưởng</td>
    <td  colspan="4" width="30%" rowspan="2" align="center">
    <em>Trà Vinh Ngày ';
$time = strtotime($_SESSION["THONGTINPHIEU"]['ngaylap']);
$html.=date("d-m-Y",$time);
$html.='</em><br/>Giám đốc
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
</table>
</body>
</html>

