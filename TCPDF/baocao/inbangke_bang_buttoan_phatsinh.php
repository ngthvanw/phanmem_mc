<?php
session_start();
$DATACISONHATKY = $_SESSION['LISTBUTTOAN_PHATSINH'];
?>
<html>
<head><title>BÚT TOÁN PHÁT SINH (Nhấn CTRL + P để in , ALT + F4 để thoát)</title>


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
			margin: 2;
			padding: 2;
        }

        @page {
            size: A4;
            margin-top: 5mm;
            margin-bottom: 10mm;
            margin-left: 5mm;
            margin-right: 5mm;
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

    $html_ct = "";
    $html_title = '
<thead>
  <tr>
   
    <th  rowspan="1">STT</th>
    <th  rowspan="1">Mã ND</th>
    <th   rowspan="1">&nbsp;<br/>Diễn giải</th>
    <th   rowspan="1">TK nợ</th>
    <th   rowspan="1">TK có</th>
    <th  rowspan="1" >Số tiền</th>
  </tr>
  </thead>
  ';
    $sott = 0;

    foreach ($DATACISONHATKY as $kthang => $itemTHANG) {
            $sott++;
                $html_ct .= '
        <tr >
        <td class="td_center" style="text-align: center" >' . $sott . '</td>
        <td class="td_center" style="text-align: center" >' .  $itemTHANG['maso'] . '</td>
        <td class="td_center" style="text-align: left" >';
                $html_ct .= $itemTHANG["noidung"];
                $html_ct .= '</td>
        <td class="td_center" align="center">' . $itemTHANG["tkno"] . '</td>


        <td class="td_center"  align="center">';
        $html_ct .= $itemTHANG["tkco"];
                $html_ct .= '</td>

        <td class="td_end"  align="right">';
        $html_ct .= $codk1 = ($itemTHANG["sotien"] == 0) ? "" : number_format($itemTHANG["sotien"], 0, ",", ".");
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
    <td  align="center"><b>' . $_SESSION["THONGTINPHIEUBTPS"]['tenphieu'] . '</b></td>
  </tr>
  <tr>
    <td  align="center"><b>' . date("d-m-Y",strtotime($_SESSION["THONGTINPHIEUBTPS"]['ngayhoadon'])) . '</b></td>
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
	 <td class="td_full" ></td>
    <td class="td_full" align="right" ><b>&nbsp;</b></td>';

	$html .= '<td class="td_full"  align="right"><b>';
                $html .= '</b></td>

	<td class="td_full"  align="right"><b>';
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
    $time = strtotime($_SESSION["THONGTINPHIEUBTPS"]['ngaylap']);
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

?>
</body>
</html>

