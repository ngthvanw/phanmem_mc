<?php
session_start();
//require_once('tcpdf_include.php');
$DATACISONHATKY = $_SESSION["LISTCTSONHATKY"];
$tongsotk = count($DATACISONHATKY);
$congdontheo = $_GET['congdontheosocai'];
?>
<html>
<head><title>IN SỔ CÁI (Nhấn CTRL + P để in , ALT + F4 để thoát)</title>


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
if($congdontheo=='mabophan,manoidung'){
    foreach ($DATACISONHATKY as $k_matk => $itemTK) {// Duyet vao tk
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
    <th  width="35px" rowspan="2">Ngày ghi sổ</th>
    <th  width="100px" colspan="3">Chứng từ</th>
    <th  width="180px" rowspan="2">&nbsp;<br/>Diễn giải</th>
    <th  width="35px" rowspan="2">TK dối ứng</th>
    <th  colspan="2" width="160px">Số tiền</th>
  </tr>
  <tr>
  <th >Số CT</th>
    <th  >Số hiệu</th>
    <th  >Mã</th>
    
	<th  width="80px">Nợ</th>
    <th  width="80px" >Có</th>
  </tr>
  <tr>
    <td class="td_full" width="45px" ></td>
    <td class="td_full" width="35px" ></td>
    <td class="td_full" width="50px" ></td>
    <td class="td_full" width="50px" ></td>
    <td class="td_full" width="180px" align="right"><b>Số dư đầu kỳ </b></td>

    <td class="td_full" width="35px"  ></td>
    <td class="td_full" width="100px"  align="right" >';
        $html_title .= ($nodk == 0) ? "" : number_format($nodk,0,",",".");
        $html_title .= '</td><td class="td_full" width="100px"  align="right" >';
        $html_title .= ($codk == 0) ? "" : number_format($codk,0,",",".");
        $html_title .= '
</td>
  </tr>
  </thead>
  ';
        $sott = 0;
        $tongno = 0;
        $tongco = 0;
        $tongnothang = 0;
        $tongcothang = 0;
        $tongnoquy = 0;
        $tongcoquy = 0;

        $tinhquy = 0;
        foreach ($itemTK as $kthang => $itemND) {////// Duyệt theo bộ phận
            $tongnothang = 0;
            $tongcothang = 0;
            foreach ($itemND as $kNoiDung => $itemCT) {////// Duyệt theo bộ phận
                $tinhquy += $kthang;
                $sott++;
                $tongno += $itemCT['tienno'];
                $tongco += $itemCT['tienco'];

                $tongnothang += $itemCT['tienno'];
                $tongcothang += $itemCT['tienco'];
                if (number_format($itemCT["tienco"]) == 0 && number_format($itemCT["tienno"]) == 0) {
                } else {
                    $html_ct .= '
            <tr >
            <td class="td_first" style="text-align: right" >';
                    $timeghiso = strtotime($itemCT["ngayghiso"]);
                    $html_ct .= date("d-m", $timeghiso);
                    $html_ct .= '</td>
    <td class="td_center" align="center" >';
                    //if(($itemCT["loaiphieu"]%2==1 && $itemCT["sapxep"]!=1) || ($itemCT["loaiphieu"]%2==0 && $itemCT["sapxep"]==1)){
                    if ($sophieuthu != $itemCT["sophieu"]) {
                        $html_ct .= $itemCT["sophieu"];// In STT phiếu thu
                        $sophieuthu = $itemCT["sophieu"];
                    } else {
                        $html_ct .= "...";
                    }
                    //}

                    $html_ct .= '</td>
            <td class="td_center" >' . $itemCT["sct"] . '</td>
            <td class="td_center" style="text-align: left" >';
                        $html_ct .= $itemCT["manoidung"];

                    $html_ct .= '</td>
            <td class="td_center" align="left">';
                        $html_ct .= $_SESSION["DSMAND"][$itemCT["manoidung"]]['tennoidung'];
                    $html_ct .= '</td>	
    
           <td class="td_center" >' . $itemCT["tkdu"] . '</td>
            <td class="td_center"  align="right">';
                    $tienno1 = ($itemCT["tienno"] == 0) ? "" : number_format($itemCT["tienno"], 0, ",", ".");
                    $html_ct .= $tienno1;
                    $html_ct .= '</td>
            <td class="td_end"  align="right">';
                    $tienco1 = ($itemCT["tienco"] == 0) ? "" : number_format($itemCT["tienco"], 0, ",", ".");
                    $html_ct .= $tienco1;
                    $html_ct .= '</td>
          </tr>';
                }
                $tongcoquy += $tongcothang;
                $tongnoquy += $tongnothang;
                if ($itemCT['thang'] % 3 == 0 && $kthang <= 12) {
                    $Quy = $itemCT['thang'] / 3;
                    $tongcoquy = 0;
                    $tongnoquy = 0;
                }
            }
            if($tongnothang!=0 || $tongcothang!=0) {
                $html_ct .= '<tr>
<td class="td_full" ></td>
    <td class="td_full"  ></td>
    <td class="td_full" ></td>
    <td class="td_full" ><b><i>'.$kthang.'</i></b></td>
                   ';

                $html_ct .= '<td class="td_full"  align="right"><b><i>Cộng bộ phận: '.$_SESSION["LISTMABP"][$kthang]['tensp'] . '</i></b></td>';

                $html_ct .= '
                    <td class="td_full" ></td>
                    <td class="td_full" align="right" ><i>';
                $html_ct .= ($tongnothang == 0) ? "" : number_format($tongnothang, 0, ",", ".");
                $html_ct .= '</i></td>
                    <td class="td_full" align="right" ><i>
                    ';
                $html_ct .= ($tongcothang == 0) ? "" : number_format($tongcothang, 0, ",", ".");
                $html_ct .= '
                </i></td>
                  </tr>';
            }

        }

        $dunocktmp = (($tongco + $_SESSION["DSDAUKY"][$k_matk]["tienco"]) - ($tongno + $_SESSION["DSDAUKY"][$k_matk]["tienno"]));
        if ($dunocktmp > 0) {
            $tongnock = 0;
            $tongcock = abs($dunocktmp);
        } else {
            $tongnock = abs($dunocktmp);
            $tongcock = 0;
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
        (Ban hành ' . $_SESSION['THONGTUMANG'][$_SESSION['theothongtu']]['thongtu'] . ' ngày ' . $_SESSION['THONGTUMANG'][$_SESSION['theothongtu']]['ngay'] . ' của Bộ trưởng Bộ Tài Chính)</i>
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
    <td class="td_full" align="right" ><b>Cộng số phát sinh</b></td>
    
    <td class="td_full" ></td>
    <td class="td_full" align="right" ><b>' . number_format($tongno,0,",",".") . '</b></td>
    <td class="td_full" align="right" ><b>' . number_format($tongco,0,",",".") . '</b></td>
  </tr>
  
  <tr>
    <td class="td_full" ></td>
    <td class="td_full" ></td>
    <td class="td_full" ></td>
	 <td class="td_full" ></td>
    <td class="td_full" align="right" ><b>Số dư cuối kỳ</b></td>
    <td class="td_full" ></td>
    
    <td class="td_full" align="right" ><b>';
        $html .= ($tongnock == 0) ? "" : number_format($tongnock,0,",",".");
        $html.='</b></td>
<td class="td_full" align="right" ><b>';
        $html .= ($tongcock == 0) ? "" : number_format($tongcock,0,",",".");
        $html.='</b></td>
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
}else{
    foreach ($DATACISONHATKY as $k_matk => $itemTK) {// Duyet vao tk
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
    <th  width="35px" rowspan="2">Ngày ghi sổ</th>
    <th  width="100px" colspan="3">Chứng từ</th>
    <th  width="180px" rowspan="2">&nbsp;<br/>Diễn giải</th>
    <th  width="35px" rowspan="2">TK dối ứng</th>
    <th  colspan="2" width="160px">Số tiền</th>
  </tr>
  <tr>
  <th >Số CT</th>
    <th  >Số hiệu</th>
    <th  >Mã</th>
    
	<th  width="80px">Nợ</th>
    <th  width="80px" >Có</th>
  </tr>
  <tr>
    <td class="td_full" width="45px" ></td>
    <td class="td_full" width="35px" ></td>
    <td class="td_full" width="50px" ></td>
    <td class="td_full" width="50px" ></td>
    <td class="td_full" width="180px" align="right"><b>Số dư đầu kỳ </b></td>

    <td class="td_full" width="35px"  ></td>
    <td class="td_full" width="100px"  align="right" >';
        $html_title .= ($nodk == 0) ? "" : number_format($nodk,0,",",".");
        $html_title .= '</td><td class="td_full" width="100px"  align="right" >';
        $html_title .= ($codk == 0) ? "" : number_format($codk,0,",",".");
        $html_title .= '
</td>
  </tr>
  </thead>
  ';
        $sott = 0;
        $tongno = 0;
        $tongco = 0;
        $tongnothang = 0;
        $tongcothang = 0;
        $tongnoquy = 0;
        $tongcoquy = 0;

        $tinhquy = 0;
        foreach ($itemTK as $kthang => $itemCT) {
            $tongnothang = 0;
            $tongcothang = 0;
            $tinhquy += $kthang;
            $sott++;
            $tongno += $itemCT['tienno'];
            $tongco += $itemCT['tienco'];

            $tongnothang += $itemCT['tienno'];
            $tongcothang += $itemCT['tienco'];
            if (number_format($itemCT["tienco"]) == 0 && number_format($itemCT["tienno"]) == 0) {
            }else{
                $html_ct .= '
        <tr >
        <td class="td_first" style="text-align: right" >';
                $timeghiso = strtotime($itemCT["ngayghiso"]);
                $html_ct .= date("d-m", $timeghiso);
                $html_ct .= '</td>
<td class="td_center" align="center" >';
                //if(($itemCT["loaiphieu"]%2==1 && $itemCT["sapxep"]!=1) || ($itemCT["loaiphieu"]%2==0 && $itemCT["sapxep"]==1)){
                if($sophieuthu!=$itemCT["sophieu"]){
                    $html_ct .=$itemCT["sophieu"];// In STT phiếu thu
                    $sophieuthu = $itemCT["sophieu"];
                }else{
                    $html_ct .="...";
                }
                //}

                $html_ct .='</td>
        <td class="td_center" >' . $itemCT["sct"] . '</td>
        <td class="td_center" style="text-align: left" >';

                if($congdontheo=="manoidung"){
                    $html_ct.=$itemCT["manoidung"];
                }else{
                    $html_ct.=$itemCT["mabophan"];
                }

                $html_ct .= '</td>
        <td class="td_center" align="left">';
                    if($congdontheo=="manoidung"){
                        $html_ct.=$_SESSION["DSMAND"][$itemCT["manoidung"]]['tennoidung'] ;
                    }else{
                        $html_ct.=$_SESSION["LISTMABP"][$itemCT["mabophan"]]['tensp'] ;
                    }

                $html_ct.='</td>	

	   <td class="td_center" >' . $itemCT["tkdu"] . '</td>
        <td class="td_center"  align="right">';
                $tienno1 = ($itemCT["tienno"] == 0) ? "" : number_format($itemCT["tienno"],0,",",".");
                $html_ct .= $tienno1;
                $html_ct .= '</td>
        <td class="td_end"  align="right">';
                $tienco1 = ($itemCT["tienco"] == 0) ? "" : number_format($itemCT["tienco"],0,",",".");
                $html_ct .= $tienco1;
                $html_ct .= '</td>
      </tr>';
            }
            $tongcoquy += $tongcothang;
            $tongnoquy += $tongnothang;
            if ($itemCT['thang'] % 3 == 0 && $kthang <= 12) {
                $Quy = $itemCT['thang'] / 3;
                $tongcoquy = 0;
                $tongnoquy = 0;
            }
        }

        $dunocktmp = (($tongco + $_SESSION["DSDAUKY"][$k_matk]["tienco"]) - ($tongno + $_SESSION["DSDAUKY"][$k_matk]["tienno"]));
        if ($dunocktmp > 0) {
            $tongnock = 0;
            $tongcock = abs($dunocktmp);
        } else {
            $tongnock = abs($dunocktmp);
            $tongcock = 0;
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
        (Ban hành ' . $_SESSION['THONGTUMANG'][$_SESSION['theothongtu']]['thongtu'] . ' ngày ' . $_SESSION['THONGTUMANG'][$_SESSION['theothongtu']]['ngay'] . ' của Bộ trưởng Bộ Tài Chính)</i>
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
    <td class="td_full" align="right" ><b>Cộng số phát sinh</b></td>
    
    <td class="td_full" ></td>
    <td class="td_full" align="right" ><b>' . number_format($tongno,0,",",".") . '</b></td>
    <td class="td_full" align="right" ><b>' . number_format($tongco,0,",",".") . '</b></td>
  </tr>
  
  <tr>
    <td class="td_full" ></td>
    <td class="td_full" ></td>
    <td class="td_full" ></td>
	 <td class="td_full" ></td>
    <td class="td_full" align="right" ><b>Số dư cuối kỳ</b></td>
    <td class="td_full" ></td>
    
    <td class="td_full" align="right" ><b>';
        $html .= ($tongnock == 0) ? "" : number_format($tongnock,0,",",".");
        $html.='</b></td>
<td class="td_full" align="right" ><b>';
        $html .= ($tongcock == 0) ? "" : number_format($tongcock,0,",",".");
        $html.='</b></td>
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
}
?>
</body>
</html>

