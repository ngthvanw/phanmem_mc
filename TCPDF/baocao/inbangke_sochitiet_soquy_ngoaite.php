<?php
session_start();
//require_once('tcpdf_include.php');
function NB_Format($Number){
	$a = new \NumberFormatter("it-IT", \NumberFormatter::DECIMAL);
	$a->setAttribute(\NumberFormatter::MIN_FRACTION_DIGITS, 0);
	$a->setAttribute(\NumberFormatter::MAX_FRACTION_DIGITS, 5); //Định dạng thập phân cao nhất
	return $a->format($Number);
}
$DATACISONHATKY = $_SESSION["LISTCTSONHATKY"];
$tongsotk = count($DATACISONHATKY);
?>
<html>
<head><title>BẢNG CHI TIẾT THEO DÕI NGOẠI TỆ (Nhấn CTRL + P để in , ALT + F4 để thoát)</title>


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
            width: 297mm;
			padding:1px;
        }

        @page {
            size: A4 landscape;
            margin-top: 5mm;
            margin-bottom: 10mm;
            margin-left: 4mm;
            margin-right: 5mm;
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
        }
    </style>
    <meta charset="utf-8">
	<script type="text/javascript" src="../../js/jquery.js"></script>
    <script type="text/javascript" src="../../js/jquery.number.min.js"></script>
    <script type="text/javascript" src="../../js/jquery.table2excel.js"></script>
    <script type="text/javascript" language="javascript">
        $(document).ready(function() {
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
<?php
$sodong = 0;
foreach ($DATACISONHATKY as $k_matk => $itemTK) {// Duyet vao tk
    $sodong++;
	echo "<div class='BangInExcel' MaTK='SoQuyNT_".$k_matk."'>";
    $html_ct = "";

    $SoTienVNDK = ($_SESSION["DSDAUKY"][$k_matk]["tienno"] - $_SESSION["DSDAUKY"][$k_matk]["tienco"])+($_SESSION["DSDAUKYTHEOTK"][$k_matk]['tienno']-$_SESSION["DSDAUKYTHEOTK"][$k_matk]['tienco']);
    $nguyenteDK = ($_SESSION["DSDAUKY"][$k_matk]["tienntno"] - $_SESSION["DSDAUKY"][$k_matk]["tienntco"])+$_SESSION["DSDAUKYTHEOTK"][$k_matk]['sotiennt'];
    $tygia = round($SoTienVNDK/$nguyenteDK);

    $tygiadauky = $tygia;

    $html_title = '
<thead>
  <tr>
    <th   rowspan="2">&nbsp;<br/>Ngày ghi sổ</th>
    <th   rowspan="2">Ngày chứng từ</th>
    <th   colspan="2">Chứng từ</th>
    <th   rowspan="2">&nbspTK ĐƯ</th>
    <th   rowspan="2">&nbsp;<br/>Diễn giải</th>
    <th  colspan="2" >Tỷ giá</th>
    <th  colspan="3" >Gửi vào</th>
    <th  colspan="3" >Rút ra</th>
    <th  colspan="3" >Tồn cuối kỳ</th>
  </tr>
  <tr>';
    if (substr($k_matk, 0, 3) == 111) {
        $html_title .= '<th  >Thu</th><th>Chi</th>';
    } else {
        $html_title .= '<th>Gửi vào</th><th>Rút ra</th>';
    }
    $html_title .= '
    <th  >Mua</th>
	<th >Bán</th>
    <th >USD</th>
    <th  >Tỷ giá</th>
    <th  >VND</th>
    
        <th  >USD</th>
    <th   >Tỷ giá</th>
    <th  >VND</th>
    
        <th >USD</th>
    <th   >Tỷ giá</th>
    <th  >VND</th>

  </tr>
  <tr>
    <td class="td_full" width="30px" ></td>
    <td class="td_full" width="30px" ></td>
    <td class="td_full" width="30px" ></td>
    <td class="td_full" width="30px" ></td>
    <td class="td_full" width="30px" ></td>
    <td class="td_full" width="200px" align="right"><b>Tồn quỹ đầu kỳ </b></td>
	<td class="td_full" width="30px" ></td>
	<td class="td_full" width="30px" ></td>
	<td class="td_full" width="50px" ></td>
	<td class="td_full" width="30px" ></td>
	<td class="td_full" width="50px" ></td>
	<td class="td_full" width="50px" ></td>
	<td class="td_full" width="30px" ></td>
    <td class="td_full" width=50px"  align="right" >';
    $html_title .= '</td>
<td class="td_full" width="30px" align="right"  ><b>';
    $html_title .= ($nguyenteDK == 0) ? "" : NB_Format($nguyenteDK);
    $html_title .= '</b></td>
	<td class="td_full" width="30px" align="right"  ><b>';
    $html_title .= ($tygiadauky == 0) ? "" : number_format($tygiadauky, 0, ",", ".");
    $html_title .= '</b></td>
    <td class="td_full" width="30px" align="right"  ><b>';
    $html_title .= ($SoTienVNDK == 0) ? "" : number_format($SoTienVNDK, 0, ",", ".");
    $html_title .= '</b></td>  
  </tr>
  </thead>
  ';
    $sott = 0;
    $tongnoUSDGuiVao = 0;
    $tongnoVNGuiVao = 0;

    $tongcoUSDRutRa = 0;
    $tongcoVNRutRa = 0;
    // $tienvnxuat = 0;

    $nodk = $_SESSION["DSDAUKY"][$k_matk]["tienno"];
    $codk = $_SESSION["DSDAUKY"][$k_matk]["tienco"];
    foreach ($itemTK as $kthang => $itemTHANG) {
        $tongnoUSDGuiVaoThang = 0;
        $tongnoVNGuiVaoThang = 0;

        $tongcoUSDRutRaThang = 0;
        $tongcoVNRutRaThang = 0;

        foreach ($itemTHANG as $itemCT) {
            $sott++;

            $nguyenteDK = ($nguyenteDK + $itemCT["tienntno"]);
            $SoTienVNDK = ($SoTienVNDK + $itemCT["tienno"]);
            if ($itemCT["tienntco"] == 0 && $itemCT["tienntno"] == 0) {

            } else {
                $tygiadauky = round(($SoTienVNDK / ($nguyenteDK)));
            }

            //$tienvnxuat = round($tygiadauky*$itemCT["tienntco"]);
            $tienvnxuat = round($itemCT["tienco"]);


            //if($tinh!=0){
            $nguyenteDK = ($nguyenteDK - $itemCT["tienntco"]);
            $SoTienVNDK = $SoTienVNDK - $tienvnxuat;
            //}


            $tongnoUSDGuiVao += $itemCT['tienntno'];
            $tongnoVNGuiVao += $itemCT['tienno'];

            $tongcoUSDRutRa += $itemCT['tienntco'];
            $tongcoVNRutRa += $itemCT['tienco'];

            $tongnoUSDGuiVaoThang += $itemCT['tienntno'];
            $tongnoVNGuiVaoThang += $itemCT['tienno'];

            $tongcoUSDRutRaThang += $itemCT['tienntco'];
            $tongcoVNRutRaThang += $itemCT['tienco'];

            if (number_format($itemCT["tienco"]) == 0 && number_format($itemCT["tienno"]) == 0) {
            } else {
                $html_ct .= '
        <tr >
        <td class="td_first" >';
                if ($timeghiso != strtotime($itemCT["ngayghiso"])) {
                    $timeghiso = strtotime($itemCT["ngayghiso"]);
                    $html_ct .= date("d-m", $timeghiso);
                }
                $html_ct .= '</td>
			<td class="td_center" >';
                if ($time != strtotime($itemCT["ngayhoadon"])) {
                    $time = strtotime($itemCT["ngayhoadon"]);
                    $html_ct .= date("d-m", $time);
                }
                $html_ct .= '</td>
        <td class="td_center" align="center">';
                if (($itemCT["loaiphieu"] % 2 == 1 && $itemCT["sapxep"] != 1) || ($itemCT["loaiphieu"] % 2 == 0 && $itemCT["sapxep"] == 1)) {
                    if ($sophieuthu != $itemCT["sophieu"]) {
                        $html_ct .= $itemCT["sophieu"];// In STT phiếu thu
                        $sophieuthu = $itemCT["sophieu"];
                    } else {
                        $html_ct .= "...";
                    }
                }

                $html_ct .= '</td>
		<td class="td_center" align="center">';
                if (($itemCT["loaiphieu"] % 2 == 0 && $itemCT["sapxep"] != 1) || ($itemCT["loaiphieu"] % 2 == 1 && $itemCT["sapxep"] == 1)) {
                    if ($sophieuchi != $itemCT["sophieu"]) {
                        $html_ct .= $itemCT["sophieu"];// In STT phiếu thu
                        $sophieuchi = $itemCT["sophieu"];
                    } else {
                        $html_ct .= "...";
                    }
                }

                $html_ct .= '</td>
        
        <td class="td_center" align="left">' . $itemCT["tkdu"] . '</td>
        <td class="td_center" align="left">' . $itemCT["noidung"] . '</td>

        <td class="td_center"  align="right">';
                $tienno1 = ($itemCT["tygiano"] == 0) ? "" : number_format($itemCT["tygiano"], 0, ",", ".");
                $html_ct .= $tienno1;
                $html_ct .= '</td>
        <td class="td_center"  align="right">';
                $html_ct .= ($itemCT["tygiaco"] == 0) ? "" : number_format($itemCT["tygiaco"], 0, ",", ".");
                $html_ct .= '</td>
		 <td class="td_center"  align="right">';
                $html_ct .= ($itemCT["tienntno"] == 0) ? "" : NB_Format($itemCT["tienntno"]);
                $html_ct .= '</td>
		 <td class="td_center"  align="right">';
                $html_ct .= ($itemCT["tygiano"] == 0) ? "" : number_format($itemCT["tygiano"], 0, ",", ".");

                $html_ct .= '</td>
 <td class="td_center"  align="right">';
                $html_ct .= ($itemCT["tienno"] == 0) ? "" : number_format($itemCT["tienno"], 0, ",", ".");
                $html_ct .= '</td>
		 <td class="td_center"  align="right">';
                $html_ct .= ($itemCT["tienntco"] == 0) ? "" : NB_Format($itemCT["tienntco"]);
                $html_ct .= '</td>
		 <td class="td_center"  align="right">';
                $giaruttien = round($itemCT["tienco"] / $itemCT["tienntco"]);

                if ($giaruttien == $itemCT["tygiaco"] && $itemCT["tygiaco"] != 0) {
                    $html_ct .= ($itemCT["tygiaco"] == 0) ? "" : number_format($itemCT["tygiaco"], 0, ",", ".");
                } else {
                    $chechlechtygia = abs($_SESSION["TYGIABINHQUAN"][$itemCT["sott"]] - $itemCT["tygiaco"]);
                    if ($itemCT["tienno"] == 0) {
                        if ($itemCT["tienntco"] == 0 && $itemCT["tienntno"] == 0) {
                            $html_ct .= ($chechlechtygia == 0) ? "" : number_format($chechlechtygia, 0, ",", ".");
                        } else {
                            $html_ct .= ($_SESSION["TYGIABINHQUAN"][$itemCT["sott"]] == 0) ? "" : number_format($_SESSION["TYGIABINHQUAN"][$itemCT["sott"]], 0, ",", ".");
                        }

                    }

                }

                $html_ct .= '</td>
		 <td class="td_center"  align="right">';
                $html_ct .= ($tienvnxuat == 0) ? "" : number_format($tienvnxuat, 0, ",", ".");
                $html_ct .= '</td>
		 <td class="td_center"  align="right">';
                $html_ct .= ($nguyenteDK == 0) ? "" : NB_Format($nguyenteDK);
                $html_ct .= '</td>
		 <td class="td_center"  align="right">';
                $html_ct .= ($_SESSION["TYGIABINHQUAN"][$itemCT["sott"]] == 0) ? "" : number_format($_SESSION["TYGIABINHQUAN"][$itemCT["sott"]], 0, ",", ".");
                $html_ct .= '</td>

        <td class="td_end"  align="right">';
                $html_ct .= ($SoTienVNDK == 0) ? "" : number_format($SoTienVNDK, 0, ",", ".");
                $html_ct .= '</td>
      </tr>';
            }
        }
        $html_ct .= '<tr>
    <td class="td_full" ></td>
    <td class="td_full" ></td>
    <td class="td_full" ></td>
    <td class="td_full" ></td>
    <td class="td_full" ></td>';
        if ($kthang <= 12) {

            $html_ct .= '<td class="td_full"  align="right"><b>cộng phát sinh tháng ' . $itemCT['thang'] . "/" . $_SESSION['NienDo'] . '</b></td>';
        } else {
            $html_ct .= '<td class="td_full"  align="right"><b>Cộng phát sinh</b></td>';
        }
        $html_ct .= '
	<td class="td_full"  ></td>
    <td class="td_full" align="right" ><i></i></td>
    <td class="td_full" align="right" ><i>';
        $html_ct .= ($tongnoUSDGuiVaoThang == 0) ? "" : NB_Format($tongnoUSDGuiVaoThang);
        $html_ct .= '
</i></td>
	<td class="td_full"  align="right"><b></b></td>
    <td class="td_full" align="right" >';
        $html_ct .= ($tongnoVNGuiVaoThang == 0) ? "" : number_format($tongnoVNGuiVaoThang, 0, ",", ".");
        $html_ct .= '</td>
    <td class="td_full" align="right" >';
        $html_ct .= ($tongcoUSDRutRaThang == 0) ? "" : NB_Format($tongcoUSDRutRaThang);
        $html_ct .= '</td>
    <td class="td_full" ></td>
    <td class="td_full" align="right" >';
        $html_ct .= ($tongcoVNRutRaThang == 0) ? "" : number_format($tongcoVNRutRaThang, 0, ",", ".");
        $html_ct .= '</td>
    <td class="td_full" ></td>
    <td class="td_full" ></td>
    <td class="td_full" ></td>
  </tr>
  ';
    }

    $html = '
<table width="100%" border="0">
  <tr>
    <td colspan="10" align="left" WIDTH="55%"><B>' . $_SESSION["TenCongTy"] . '</B><br/>' . $_SESSION["DiaChi"] . '<br/>MST:' . $_SESSION["MST"] . '</td>    
    <td colspan="4" align="center" WIDTH="20%"></td>
    <td colspan="3" WIDTH="25%" align="center" > <i>Mẫu số S03b-DNN<br/>
        (Ban hành ' . $_SESSION['THONGTUMANG'][$_SESSION['theothongtu']]['thongtu'] . ' ngày ' . $_SESSION['THONGTUMANG'][$_SESSION['theothongtu']]['ngay'] . ' của Bộ Tài Chính)</i>    
	</td>
  </tr>
</table>
<table><tr><td></td></tr></table>
<table border="0" align="center">
  <tr>
    <td colspan="17" align="center"><b>' . $_SESSION["THONGTINPHIEU"]['tenphieu'] . '</b></td>
  </tr> <tr>
    <td colspan="17"  align="center"><b>(Dùng cho hình thức kế toán Nhật ký chung)</b></td>
  </tr>
  <tr>
    <td colspan="17" align="center"><b>' . $_SESSION["THONGTINPHIEU"]['ngayhoadon'] . '</b></td>
  </tr>
  <tr>
    <td colspan="17" align="center"> <b>Tên tài khoản: ' . $_SESSION["DSHTTK"][$k_matk]['tentk'] . '</b></td>
  </tr>
    <tr>
    <td colspan="17" align="center"><b> Số hiệu: ' . $k_matk . '</b></td>
  </tr>
  <tr>
    <td colspan="17"  align="center"><b> Công trình - sản phẩm : ' . $_SESSION["DSMABP"]['tensp'] . '</b></td>
  </tr>
</table>
<table width="100%" border="0">
  <tr>
    <td align="right"></td>
  </tr>
</table>
<table border="1" class="dataTable" cellpadding="2" cellspacing="0" align="center" valign="middle">' . $html_title . $html_ct . '
<tr>
    <td class="td_full" ></td>
    <td class="td_full" ></td>
    <td class="td_full" ></td>
	 <td class="td_full" ></td>
	 <td class="td_full" ></td>
    <td class="td_full" ><b>Tổng</b></td>
    <td class="td_full" ></td>
    <td class="td_full" align="right" ><b></b></td>
    <td class="td_full" align="right" ><b>' . NB_Format($tongnoUSDGuiVao) . '</b></td>
        <td class="td_full" ></td>
        <td class="td_full" align="right" ><b>' . number_format($tongnoVNGuiVao, 0, ",", ".") . '</b></td>
        <td class="td_full"  align="right"><b>' . NB_Format($tongcoUSDRutRa) . '</b></td>
        <td class="td_full" ></td>
        <td class="td_full" align="right" ><b>' . number_format($tongcoVNRutRa, 0, ",", ".") . '</b></td>
        <td class="td_full" ></td>
        <td class="td_full" ></td>
    <td class="td_full" ></td>
  </tr>
</table>
<table width="100%" cellpadding="2"><tr><td colspan="17">Ghi chú: Tất cả số phát sinh đã ghi vào sổ cái</td></tr></table>
<table><tr><td></td></tr></table>

<table width="100%" border="0" cellpadding="2">
  <tr>
	<td colspan="6" align="center" width="35%">&nbsp;<br/>Người lập biểu</td>
    <td colspan="6" align="center" width="35%">&nbsp;<br/>Kế toán trưởng</td>
    <td colspan="5" width="30%" rowspan="2" align="center">
    <em>Ngày ';
    $time = strtotime($_SESSION["THONGTINPHIEU"]['ngaylap']);
    $html .= date("d-m-Y", $time);
    $html .= '</em><br/>Người đại diện theo pháp luật
   </td>
  </tr>
  <tr>
    <td></td>
  </tr>
</table>
';
    echo $html;
    if ($tongsotk != $sodong) {
        ?>
        <table width="100%" class="page_break">
            <tr>
                <td></td>
            </tr>
        </table>
        <?php
    }
	echo "</div>";
}

?>
</body>
</html>

