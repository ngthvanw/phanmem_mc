<?php
session_start();
//require_once('tcpdf_include.php');
$DATACISONHATKY = $_SESSION["LISTTINHHINHNGANSACH"];
$tongsotk = count($DATACISONHATKY);
?>
<html>
<head><title>IN BẢNG CHI TIẾT THEO DÕI THUẾ GTGT (Nhấn CTRL + P để in , ALT + F4 để thoát)</title>


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
        }

        @page {
            size: A4;
            margin-top: 5mm;
            margin-bottom: 10mm;
            margin-left: 5mm;
            margin-right: 7mm;
        }

        @media print {
            #Header, #Footer {
                display: none !important;
            }

            .page_break {
                page-break-before: always;
            }
        }
    </style>
    <meta charset="utf-8">
</head>
<body class="dt-print-view">
<?php
$sodong = 0;
foreach ($DATACISONHATKY as $k_matk => $itemTK) {// Duyet vao tk
    $sodong++;
    $tamtinhdauky = ($_SESSION["DSDAUKY"][$k_matk]["tienco"] - $_SESSION["DSDAUKY"][$k_matk]["tienno"]);
    if ($tamtinhdauky > 0) {
        $nodkquy = 0;
        $nodk = 0;
        $codkquy = $tamtinhdauky;
        $codk = $tamtinhdauky;
    } else {
        $nodkquy = abs($tamtinhdauky);
        $nodk = abs($tamtinhdauky);
        $codkquy = 0;
        $codk = 0;
    }
    $html_ct = "";
    $html_title = '
<thead>
  <tr>
   
    <th  colspan="2">Số TT</th>
    <th   rowspan="2">Tháng</th>
    <th   rowspan="2">Số phải nộp</th>
    <th   rowspan="2">Phải nộp vãng lai</th>
    <th   rowspan="2">Số đã nộp</th>
    <th  colspan="2" >Số cuối kỳ</th>
  </tr>
  <tr>
    <th  ></th>
    <th  ></th>
	<th  >Còn nợ</th>
    <th   >Nộp thừa</th>
  </tr>
  <tr>
   
    <td class="td_full" width="50px" ></td>
    <td class="td_full" width="50px"  ></td>
    <td class="td_full" width="250px" align="right"><b>Số dư đầu năm </b></td>

    <td class="td_full" width="100px" ></td>
    <td class="td_full" width="100px" ></td>
    <td class="td_full" width="100px" ></td>
    
    <td class="td_full" width="100px"  align="right" >';
    $html_title .= ($codk == 0) ? "" : number_format($codk, 0, ",", ".");
    $html_title .= '</td>

    <td class="td_full" width="100px"  align="right" >';
    $html_title .= ($nodk == 0) ? "" : number_format($nodk, 0, ",", ".");
    $html_title .= '
</td>
  </tr>
  </thead>
  ';
    $sott = 0;
    $TongSoDaNop =0;
    $TongSoPhaiNop =0;
    $TongSoPhaiNopVangLai =0;
    foreach ($itemTK as $kthang => $itemTHANG) {

        $TongSoDaNopThang =0;
        $TongSoPhaiNopThang =0;
        $TongSoPhaiNopVangLaiThang =0;

        foreach ($itemTHANG as $itemCT) {
            $sott++;
            $SoCuoiKy = ($codk+$itemCT["tienco"])- ($nodk+$itemCT["tienno"]);
            if($SoCuoiKy>=0){
                $codk = $SoCuoiKy;
                $nodk = 0;
            }else{
                $codk = 0;
                $nodk = abs($SoCuoiKy);
            }

            if (number_format($itemCT["tienco"]) == 0 && number_format($itemCT["tienno"]) == 0) {
            } else {
                $html_ct .= '
        <tr >
        <td class="td_center" >' . $itemCT["sct"] . '</td>
        <td class="td_center" style="text-align: right" >';
                $time = strtotime($itemCT["ngayghiso"]);
                $html_ct .= date("d-m", $time);
                $html_ct .= '</td>
        <td class="td_center" align="left">' . $itemCT["noidung"] . '</td>
	          <td class="td_center"  align="right">';
                $tokhai = $itemCT['tokhai'];
                if($tokhai=='gtgt'){
                    $tienno1 = ($itemCT["tienco"] == 0) ? "" : number_format($itemCT["tienco"], 0, ",", ".");
                    $TongSoPhaiNop+=$itemCT["tienco"];
                    $TongSoPhaiNopThang+=$itemCT["tienco"];
                    $html_ct .= $tienno1;
                }
                $html_ct .= '</td>
	   
	           <td class="td_center"  align="right">';
                $tokhai = $itemCT['tokhai'];
                if($tokhai=='vanglai'){
                    $tienno1 = ($itemCT["tienco"] == 0) ? "" : number_format($itemCT["tienco"], 0, ",", ".");
                    $TongSoPhaiNopVangLai+=$itemCT["tienco"];
                    $TongSoPhaiNopVangLaiThang+=$itemCT["tienco"];
                    $html_ct .= $tienno1;
                }
                $html_ct .= '</td>
              <td class="td_center"  align="right">';
                $tienno1 = ($itemCT["tienno"] == 0) ? "" : number_format($itemCT["tienno"], 0, ",", ".");
                $TongSoDaNop+=$itemCT["tienno"];
                $TongSoDaNopThang+=$itemCT["tienno"];
                $html_ct .= $tienno1;
                $html_ct .= '</td>

              <td class="td_center"  align="right">';
                $codk1 = ($codk == 0) ? "" : number_format($codk, 0, ",", ".");
                $html_ct .= $codk1;
                $html_ct .= '</td>

              <td class="td_end"  align="right">';
                $nodk1 = ($nodk == 0) ? "" : number_format($nodk, 0, ",", ".");
                $html_ct .= $nodk1;
                $html_ct .= '</td>
      </tr>';
            }
        }
    $html_ct .= '<tr>
    <td class="td_full" ></td>
    <td class="td_full"  ></td>
   ';
        if ($kthang <= 12) {
            $html_ct .= '<td class="td_full"  align="left"><b>Tháng ' . $itemCT['thang'] . "/" . $_SESSION['NienDo'] . '</b></td>';
        } else {
            $html_ct .= '<td class="td_full"  align="right"><b>Cộng phát sinh</b></td>';
        }

        $html_ct .= '
    <td class="td_full" align="right" >';
        $html_ct .= ($TongSoPhaiNopThang == 0) ? "" : number_format($TongSoPhaiNopThang, 0, ",", ".");
        $html_ct .= '</td>
    <td class="td_full" align="right" >';
        $html_ct .= ($TongSoPhaiNopVangLaiThang == 0) ? "" : number_format($TongSoPhaiNopVangLaiThang, 0, ",", ".");
        $html_ct .= '</td>
    <td class="td_full" align="right" >';
        $html_ct .= ($TongSoDaNop == 0) ? "" : number_format($TongSoDaNop, 0, ",", ".");
        $html_ct .= '
</td>
<td class="td_full" align="right" >';
        $codk1 = ($codk == 0) ? "" : number_format($codk, 0, ",", ".");
        $html_ct .= $codk1;
        $html_ct .= '
</td>
		 <td class="td_full"  align="right">';
        $nodk1 = ($nodk == 0) ? "" : number_format($nodk, 0, ",", ".");
        $html_ct .= $nodk1;
        $html_ct .= '</td>
  </tr>';
    }
    $html = '
<table width="100%" border="0">
  <tr>
    <td align="left" WIDTH="55%"><B>' . $_SESSION["TenCongTy"] . '</B><br/>' . $_SESSION["DiaChi"] . '</td>    
    <td align="center" WIDTH="20%"></td>
    <td WIDTH="25%">
    <table border="0"<b>Mã số thuế:' . $_SESSION["MST"] . '</b><tr>
   <td align="center">
        
   </td>
</tr>
</table>
    
</td>
  </tr>
</table>
<table><tr><td></td></tr></table>
<table border="0" align="center">
  <tr>
    <td  align="center"><b>' . $_SESSION["THONGTINPHIEU"]['tenphieu'] . '</b></td>
  </tr>
  <tr>
    <td  align="center"><b>' . $_SESSION["THONGTINPHIEU"]['ngayhoadon'] . '</b></td>
  </tr>

</table>
<table width="100%" border="0">
  <tr>
    <td align="right"></td>
  </tr>
</table>
<table border="0" class="dataTable" cellpadding="2" cellspacing="0" align="center" valign="middle">' . $html_title . $html_ct . '
<tr>
    <td class="td_full" ></td>
	 <td class="td_full" ></td>
    <td class="td_full" align="right" ><b>Số cuối kỳ</b></td>
    
    <td class="td_full" align="right" ><b>'.number_format($TongSoPhaiNop, 0, ",", ".").'</b></td>
    <td class="td_full" align="right" ><b>'.number_format($TongSoPhaiNopVangLai, 0, ",", ".").'</b></td>
    <td class="td_full" align="right" ><b>'.number_format($TongSoDaNop, 0, ",", ".").'</b></td>';

	$html .= '<td class="td_full"  align="right"><b>';
                $codk1 = ($codk == 0) ? "" : number_format($codk, 0, ",", ".");
                $html .= $codk1;
                $html .= '</b></td>

	<td class="td_full"  align="right"><b>';
			$nodk1 = ($nodk == 0) ? "" : number_format($nodk, 0, ",", ".");
			$html .= $nodk1;
			$html .= '</b></td>
  </tr>
  
</table>
<table width="100%" cellpadding="2"><tr><td></td></tr></table>
<table><tr><td></td></tr></table>

<table width="100%" border="0" cellpadding="2">
  <tr>
  <td align="center" width="35%">&nbsp;<br/>Người lập biểu</td>
    <td align="center" width="35%">&nbsp;<br/>Kế toán trưởng</td>
    <td width="30%" rowspan="2" align="center">
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
}

?>
</body>
</html>

