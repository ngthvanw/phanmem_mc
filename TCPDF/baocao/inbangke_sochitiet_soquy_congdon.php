
<?php
session_start();
//require_once('tcpdf_include.php');
$DATACISONHATKY = $_SESSION["LISTCTSONHATKY"];
?>
<html>
<head><title>In sổ quỹ (Nhấn CTRL + P để in , ALT + F4 để thoát)</title>


    <style type="text/css" class="init">
        .dataTable {
    font-family: "Times New Roman", Georgia, Serif;
            border-collapse: collapse;
            width: 100%;
        }
        .dataTable td{
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

        body{
    width: 210mm;
        }
		@page {
    size: A4;
            margin-top: 5mm;
            margin-bottom: 10mm;
            margin-left: 5mm;
            margin-right: 5mm;
			}

        @media print {
    #Header, #Footer { display: none !important; }
    .page_break{
        page-break-before:always;
            }
}
    </style>
    <meta charset="utf-8">
</head>
<body class="dt-print-view">
<?php
$tongsotk = count($DATACISONHATKY);
foreach ($DATACISONHATKY as $k_matk=>$itemTK) {// Duyet vao tk
    $html_ct = "";
    $sotontien = $_SESSION["DSDAUKY"][$k_matk]["tienno"]-$_SESSION["DSDAUKY"][$k_matk]["tienco"];
    $html_title = '
<thead>
  <tr>
    <th  width="35px" rowspan="2">&nbsp;<br/>Ngày ghi sổ</th>
    <th  width="35px" rowspan="2">Ngày chứng từ</th>
    <th  width="100px" colspan="2">Chứng từ</th>
    <th  width="180px" rowspan="2">&nbsp;<br/>Diễn giải</th>
    <th  width="35px" rowspan="2">TK dối ứng</th>
    <th  colspan="2" width="160px">Số tiền</th>
    <th  width="70px" colspan="2"></th>
  </tr>
  <tr>';
  if(substr($k_matk,0,3)==111){
	  $html_title.='<th  >Thu</th><th>Chi</th>';
  }else{
	  $html_title.='<th>Gửi vào</th><th>Rút ra</th>';
  }
	$html_title.='
	<th  width="80px">Nợ</th>
    <th  width="80px" >Có</th>
   <th >Số tồn</th>
    <th>Ghi chú</th>
  </tr>
  <tr>
    <td class="td_full" width="45px" ></td>
    <td class="td_full" width="45px" ></td>
    <td class="td_full" width="50px" ></td>
    <td class="td_full" width="50px" ></td>
    <td class="td_full" width="200px" align="right"><b>Tồn quỹ đầu kỳ </b></td>
	<td class="td_full" width="35px" ></td>
    <td class="td_full" width="100px"  align="right" >';
    $html_title.='</td><td class="td_full" width="100px"  align="right" >';
    $html_title.='
</td>
	<td class="td_full" width="100px" align="right"  ><b>';
    $html_title.=($sotontien == 0) ? "" : number_format($sotontien,0,",",".");
    $html_title.='</b></td>
    <td class="td_full" width="20px"  ></td>
  </tr>
  </thead>
  ';
    $sott = 0;
    $tongno = 0;
    $tongco = 0;
    $tongnothang=0;
    $tongcothang=0;
    $nodk = $_SESSION["DSDAUKY"][$k_matk]["tienno"];
    $codk = $_SESSION["DSDAUKY"][$k_matk]["tienco"];
    foreach ($itemTK as $kthang => $itemCT) {
        $tongnothang = 0;
        $tongcothang = 0;
            $sott++;
            $sotontien = $sotontien + ($itemCT['tienno'] - $itemCT['tienco']);
            $tongno += $itemCT['tienno'];
            $tongco += $itemCT['tienco'];

            $tongnothang += $itemCT['tienno'];
            $tongcothang += $itemCT['tienco'];
            if (number_format($itemCT["tienco"]) == 0 && number_format($itemCT["tienno"]) == 0) {
            }else{
            $html_ct .= '
        <tr >
        <td class="td_first" >';
			if($timeghiso!=strtotime($itemCT["ngayghiso"])){
            $timeghiso = strtotime($itemCT["ngayghiso"]);
            $html_ct .= date("d-m", $timeghiso);
			}
            $html_ct .= '</td>
			<td class="td_center" >';
			if($time!=strtotime($itemCT["ngayhoadon"])){
            $time = strtotime($itemCT["ngayhoadon"]);
            $html_ct .= date("d-m", $time);
			}
            $html_ct .= '</td>
        <td class="td_center" align="center">'; 
			if(($itemCT["loaiphieu"]%2==1 && $itemCT["sapxep"]!=1) || ($itemCT["loaiphieu"]%2==0 && $itemCT["sapxep"]==1)){
				if($sophieuthu!=$itemCT["sophieu"]){
					$html_ct .=$itemCT["sophieu"];// In STT phiếu thu
					$sophieuthu = $itemCT["sophieu"];
				}else{
                    $html_ct .="...";
                }
			}
			 
		$html_ct .='</td>
		<td class="td_center" align="center">'; 
			if(($itemCT["loaiphieu"]%2==0 && $itemCT["sapxep"]!=1)|| ($itemCT["loaiphieu"]%2==1 && $itemCT["sapxep"]==1)){
				if($sophieuchi!=$itemCT["sophieu"]){
					$html_ct .=$itemCT["sophieu"];// In STT phiếu thu
					$sophieuchi = $itemCT["sophieu"];
				}else{
                    $html_ct .="...";
                }
			}
			 
		$html_ct .='</td>
        
        <td class="td_center" align="left">' . $itemCT["noidung"] . '</td>

	   <td class="td_center" >' . $itemCT["tkdu"] . '</td>
        <td class="td_center"  align="right">';
            $tienno1 = ($itemCT["tienno"] == 0) ? "" : number_format($itemCT["tienno"], 0, ",", ".");
            $html_ct .= $tienno1;
            $html_ct .= '</td>
        <td class="td_center"  align="right">';
            $tienco1 = ($itemCT["tienco"] == 0) ? "" : number_format($itemCT["tienco"], 0, ",", ".");
            $html_ct .= $tienco1;
            $html_ct .= '</td>
		 <td class="td_center"  align="right">';
            $tienco1 = ($sotontien == 0) ? "" : number_format($sotontien, 0, ",", ".");
            $html_ct .= $tienco1;
            $html_ct .= '</td>
        <td class="td_end" >&nbsp;</td>
      </tr>';
        }
        $html_ct.='<tr>
    <td class="td_full" ></td>
    <td class="td_full" ></td>
    <td class="td_full" ></td>
    <td class="td_full" ></td>
    ';
        if ( $kthang <= 12) {

            $html_ct.='<td class="td_full"  align="right"><b>cộng phát sinh tháng ' . $itemCT['thang'] . "/" . $_SESSION['NienDo'] . '</b></td>';
        }else{
            $html_ct.='<td class="td_full"  align="right"><b>Cộng phát sinh</b></td>';
        }

        $html_ct.='
	<td class="td_full"  ></td>

    <td class="td_full" align="right" ><i>';
        $html_ct.=($tongnothang == 0) ? "" : number_format($tongnothang,0,",",".");
        $html_ct.='</i></td>
    <td class="td_full" align="right" ><i>
    ';
        $html_ct.=($tongcothang == 0) ? "" : number_format($tongcothang,0,",",".");
        $html_ct.='
</i></td>
	<td class="td_full"  align="right"><b>';
            $tienco1 = ($sotontien == 0) ? "" : number_format($sotontien,0,",",".");
        $html_ct .= $tienco1;
            $html_ct .= '</b></td>
    <td class="td_full" ></td>
  </tr>
  <tr>
    <td class="td_full" ></td>
    <td class="td_full" ></td>
    <td class="td_full" ></td>
    <td class="td_full" ></td>
    ';
        if ($kthang <= 12) {
            $html_ct.='<td class="td_full"  align="right"><b>Số dư cuối tháng ' . $itemCT['thang'] . "/" . $_SESSION['NienDo'] . '</b></td>';
        }else{
            $html_ct.='<td class="td_full"  align="right"><b>Số dư - ' . $kthang. ' - '.$_SESSION["DSMAND"][$kthang]['tennoidung'].'</b></td>';
        }

        $html_ct.='
	<td class="td_full" ></td>
    <td class="td_full" align="right" ><b>';
        $tinhtam = ($nodk+$tongnothang)-($codk+$tongcothang);
        if($tinhtam>0){
            $nodk = $tinhtam;
            $codk = 0;
        }else{
            $nodk = 0;
            $codk = abs($tinhtam);
        }
        $html_ct.=($nodk == 0) ? "" : number_format($nodk,0,",",".");
        $html_ct.='</b></td>
    <td class="td_full" align="right" ><b>';
        $html_ct.=($codk == 0) ? "" : number_format($codk,0,",",".");
        $html_ct.='</b>
<td class="td_full"  align="right"><b>';
            $tienco1 = ($sotontien == 0) ? "" : number_format($sotontien,0,",",".");
            $html_ct .= $tienco1;
            $html_ct .= '</b></td>
    <td class="td_full" ></td>
  </tr>
  ';
    }

    $html = '
<table width="100%" border="0">
  <tr>
    <td align="left" WIDTH="55%"><B>' . $_SESSION["TenCongTy"] . '</B><br/>' . $_SESSION["DiaChi"] . '<br/>MST:' . $_SESSION["MST"] . '</td>    
    <td align="center" WIDTH="20%"></td>
    <td WIDTH="25%">
    <table border="0">
    
   <tr>
   <td align="center"><i>Mẫu số S03b-DNN<br/>
        (Ban hành kèm theo thông tư số 133/2016/TT-BTC ngày 26/8/2016 của Bộ Tài Chính)</i>
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
  </tr> <tr>
    <td  align="center"><b>(Dùng cho hình thức kế toán Nhật ký chung)</b></td>
  </tr>
  <tr>
    <td  align="center"><b>' . $_SESSION["THONGTINPHIEU"]['ngayhoadon'] . '</b></td>
  </tr>
  <tr>
    <td  align="center"> <b>Tên tài khoản: ' . $_SESSION["DSHTTK"][$k_matk]['tentk'] . '</b></td>
  </tr>
    <tr>
    <td  align="center"><b> Số hiệu: ' . $k_matk . '</b></td>
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
	 <td class="td_full" ></td>
    <td class="td_full" ><b>Tổng</b></td>
    <td class="td_full" ></td>
    <td class="td_full" align="right" ><b>' . number_format($tongno,0,",",".") . '</b></td>
    <td class="td_full" align="right" ><b>' . number_format($tongco,0,",",".") . '</b></td>
        <td class="td_full" ></td>
    <td class="td_full" ></td>
  </tr>
</table>
<table width="100%" cellpadding="2"><tr><td>Ghi chú: Tất cả số phát sinh đã ghi vào sổ cái</td></tr></table>
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
    if($tongsotk!=$tongsotk) {
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

