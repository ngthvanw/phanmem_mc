<?php
session_start();
require_once('tcpdf_include.php');
$DATACIBANRA = $_SESSION['SOCHITIETHHLAIGOP'];
$tungay_arr = explode("-",$_SESSION['THONGTINPHIEUSOHH']['tungay']);
$denngay_arr = explode("-",$_SESSION['THONGTINPHIEUSOHH']['denngay']);
$tungay = $tungay_arr[1];
$dengay = $denngay_arr[1];
$nam = $denngay_arr[0];
?>
    <html>
    <head><title>Bảng kê hàng hóa nhập kho (Nhấn CTRL + P để in , ALT + F4 để thoát)</title>

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
                text-align: left;
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

            }
            #Header, #Footer { display: none !important; }
            @media print
            {
                p.bodyText {font-family:times,georgia, serif;}
            }

        </style>
        <meta charset="utf-8">
    </head>
    <body class="dt-print-view">
<?php
$html_ct="";
$html_title='
<thead>
  <tr >
    <th  STYLE="border:0.5px solid #000;text-align:center" width="30px" rowspan="2">STT</th>
    <th STYLE="border:0.5px solid #000;text-align:center" width="50px" rowspan="2">Mã hàng</th>
    <th STYLE="border:0.5px solid #000;text-align:center" width="250px" rowspan="2">Tên hàng</th>
    <th STYLE="border:0.5px solid #000;text-align:center" width="40px" rowspan="2">Đơn vị tính</th>
    <th STYLE="border:0.5px solid #000;text-align:center" width="60px" rowspan="2">Số lượng</th>
    <th STYLE="border:0.5px solid #000;text-align:center" colspan="2"  width="160px">ĐƠN GIÁ</th>
    <th STYLE="border:0.5px solid #000;text-align:center" colspan="2" width="160px">THÀNH TIỀN</th>
    <th STYLE="border:0.5px solid #000;text-align:center" colspan="2" width="160px">Lãi gộp</th>
  </tr>
  <tr>
	
	<th STYLE="border:0.5px solid #000;text-align:center">Giá vốn</th>
    <th STYLE="border:0.5px solid #000;text-align:center" >Giá nhập</th>
	
	<th STYLE="border:0.5px solid #000;text-align:center">Giá vốn</th>
    <th STYLE="border:0.5px solid #000;text-align:center" >Giá nhập</th>
	
	<th STYLE="border:0.5px solid #000;text-align:center">tỷ lệ</th>
    <th STYLE="border:0.5px solid #000;text-align:center" >Tiền</th>
  </tr>
  </thead>
';
foreach ($DATACIBANRA as $kKho=>$itemCTKho) {
    $html_ct .= '
     <tr>
	<td colspan="15" STYLE="border:0.5px solid #000;">';
    $html_ct .= '<b>' . $_SESSION['DSKHOHANG'][$kKho]['tenkho_'] . '</b>';
    $html_ct .= '</td></tr>';
    $sott = 0;

    $tongthanhtienvonkho= 0;
    $tongthanhtienbankho= 0;
    $tongtienloikho= 0;

    foreach ($itemCTKho as $itemCT) {
        $sott++;

        $soluong = $itemCT["soluongxuat"];
        $tongsoluong+= $itemCT["soluongxuat"];
        $giavon = $itemCT["giavon"];
        $giaban = $itemCT["giaban"];
        $thanhtienvon = $itemCT["thanhtienvon"];
        $thanhtienban = $itemCT["thanhtienxuat"];
        $tyle = (1 - ($thanhtienvon / $thanhtienban)) * 100;
        $tienloi = $thanhtienban - $thanhtienvon;

        $tongthanhtienvon += $thanhtienvon;
        $tongthanhtienban += $thanhtienban;
        $tongtienloi += $tienloi;

        $tongthanhtienvonkho += $thanhtienvon;
        $tongthanhtienbankho += $thanhtienban;
        $tongtienloikho += $tienloi;

        $html_ct .= '
        <tr >
        <td class="td_first"  align="center" >' . $sott . '</td>
        <td class="td_first"  align="center" >' . $itemCT["mavt"] . '</td>
        <td class="td_center" align="left">' . $itemCT["tenvt"] . '</td>
        <td class="td_center" align="center">' . $itemCT["dvt"] . '</td>
        <td class="td_center" align="right">';

        if (number_format($soluong) != 0) {
            $html_ct .= number_format($soluong, 3, ",", ".");
        } else {
            $html_ct .= "";
        }

        $html_ct .= '</td>
		
        <td class="td_center" align="right">';

        if (number_format($giavon) != 0) {
            $html_ct .= number_format($giavon, 2, ",", ".");
        } else {
            $html_ct .= "";
        }
        $html_ct .= '</td><td class="td_center" align="right">';

        if (number_format($giaban) != 0) {
            $html_ct .= number_format($giaban, 2, ",", ".");
        } else {
            $html_ct .= "";
        }


        $html_ct .= '</td><td class="td_center" align="right">';

        if (number_format($thanhtienvon) != 0) {
            $html_ct .= number_format($thanhtienvon, 0, ",", ".");
        } else {
            $html_ct .= "";
        }

        $html_ct .= '</td><td class="td_center" align="right">';
        if (number_format($thanhtienban) != 0) {
            $html_ct .= number_format($thanhtienban, 0, ",", ".");
        } else {
            $html_ct .= "";
        }


        $html_ct .= '</td><td class="td_center" align="right">';
        $soluongton = $soluongton + $slnhap - $slxuat;
        if (number_format($tyle) != 0) {
            $html_ct .= number_format($tyle, 0, ",", ".") . "%";
        } else {
            $html_ct .= "";
        }

        $html_ct .= '</td><td class="td_end" align="right">';

        if (number_format($tienloi) != 0) {
            $html_ct .= number_format($tienloi, 0, ",", ".");
        } else {
            $html_ct .= "";
        }

        $html_ct .= '</td>

      </tr>';
    }
    $html_ct .= '<tr>
    <td STYLE="border:0.5px solid #000;"></td>
    <td STYLE="border:0.5px solid #000;"></td>
    <td STYLE="border:0.5px solid #000;text-align:right"><b>Tổng '.$_SESSION['DSKHOHANG'][$kKho]['tenkho_'].' </b></td>

    <td STYLE="border:0.5px solid #000;"></td>
    <td STYLE="border:0.5px solid #000;"></td>
    <td align="right" STYLE="border:0.5px solid #000;"></td>
    <td align="right" STYLE="border:0.5px solid #000;"></td>
	
	<td align="right" STYLE="border:0.5px solid #000;"><b>' . number_format($tongthanhtienvonkho, 0, ",", ".") . '</b></td>
    <td align="right" STYLE="border:0.5px solid #000;"><b>' . number_format($tongthanhtienbankho, 0, ",", ".") . '</b></td>
	<td align="right" STYLE="border:0.5px solid #000;"><b></b></td>
    <td align="right" STYLE="border:0.5px solid #000;"><b>' . number_format($tongtienloikho, 0, ",", ".") . '</b></td>
	
  </tr>';
}

$html = '
<table width="100%" border="0">
  <tr>
    <td align="left" WIDTH="62%">
		<table>
			<tr>
				<td><b>'.$_SESSION['TenCongTy'].'</b></td>
				</tr>
				<tr>
				<td>'.$_SESSION['DiaChi'].'</td>
				</tr>
		</table>
	</td>    
    <td align="center" WIDTH="15%"><B><h3></h3></B></td>
    <td WIDTH="23%">
    <table border="0">
    
   <tr>
   <td align="center">
   </td>
</tr>

</table>
    
</td>
  </tr>
</table>

<table border="0" align="left">
  <tr>
    <td><b>'.$_SESSION["THONGTINPHIEUSOHHLAIGOP"]['tenphieu'].'</b></td>
  </tr>
  <tr>
    <td><b> '.$_SESSION["THONGTINPHIEUSOHHLAIGOP"]['ngayhoadon'].'</b></td>
  </tr>
</table>
<table width="100%" border="0">
  <tr>
    <td align="right"></td>
  </tr>
</table>
<table width="100%" border="0">
  <tr>
    <td align="right">Đơn vị tính: <b>'.$_SESSION['DSMAVT'][$k]['dvt'].'</b></td>
  </tr>
</table><table border="0" class="dataTable"  cellpadding="2" width="100%" cellspacing="0" valign="middle">'.$html_title.$html_ct.'
<tr>
    <td STYLE="border:0.5px solid #000;"></td>
    <td STYLE="border:0.5px solid #000;"></td>
    <td STYLE="border:0.5px solid #000;text-align:right""><b>Tổng cộng</b></td>

    <td STYLE="border:0.5px solid #000;"></td>
    <td STYLE="border:0.5px solid #000;text-align: right;"><b>'.number_format($tongsoluong,3,",",".").'</b></td>
    <td align="right" STYLE="border:0.5px solid #000;"></td>
    <td align="right" STYLE="border:0.5px solid #000;"></td>
	
	<td align="right" STYLE="border:0.5px solid #000;"><b>'.number_format($tongthanhtienvon,0,",",".").'</b></td>
    <td align="right" STYLE="border:0.5px solid #000;"><b>'.number_format($tongthanhtienban,0,",",".").'</b></td>
	
	<td align="right" STYLE="border:0.5px solid #000;"></td>
    <td align="right" STYLE="border:0.5px solid #000;"><b>'.number_format($tongtienloi,0,",",".").'</b></td>
	
  </tr>
</table>
<table><tr><td></td></tr></table>
<table border=0 class="page_break" align="center" width=100%><tr>
<td align="center">Người ghi sổ</td>
<td align="center" >Kế toán trưởng</td>
<td align="center" >';
$timengaylap = strtotime($_SESSION["THONGTINPHIEUSOHHLAIGOP"]['ngaylap']);
$html.=date("d-m-Y",$timengaylap);
$html.='<br/>Giám đốc</td></tr></table>
';
echo $html;
?>
</tbody>
</table>
    </body>
    </html>