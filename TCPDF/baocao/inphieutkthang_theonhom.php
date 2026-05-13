<?php
session_start();
$DATA = $_SESSION["DSNOKHCHITIET"];
$sole = $_GET['sole'];
function NB_Format($Number){
	$a = new \NumberFormatter("it-IT", \NumberFormatter::DECIMAL);
	$a->setAttribute(\NumberFormatter::MIN_FRACTION_DIGITS, 0);
	$a->setAttribute(\NumberFormatter::MAX_FRACTION_DIGITS, 5); //Định dạng thập phân cao nhất
	return $a->format($Number);
}
?>
<html>
<head><title>BẢNG KÊ GIÁ TRỊ VẬT TƯ,SẢN PHẨM, HÀNG HÓA(Nhấn CTRL + P để in , ALT + F4 để thoát)</title>

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

        #Header, #Footer {
            display: none !important;
        }

        body {
            width: 210mm;
			margin: 2px;
			padding: 2px;
        }

        .page_break {
            page-break-inside: avoid;
        }

        @page {
            size: A4;
            margin-left: 4mm;
            margin-right: 4mm;

        }

        @media print {
            #Header, #Footer { display: none !important; }
            .no-print, .no-print * {
                display: none !important;
            }

        }


        @media print {
            p.bodyText {
                font-family: times, georgia, serif;
            }
        }
        @page {
            @bottom-right {
                content: counter(page) "/" counter(pages);
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
				var result = 'data:application/vnd.ms-excel,' + encodeURIComponent($('.BangInExcel').html());
				var link = document.createElement("a");
				document.body.appendChild(link);
				link.download = "Ton_Kho_" + new Date().toISOString().replace(/[\-\:\.]/g, "") + ".xls",
				link.href = result;
				link.click();
			});
			
            $("#DuyetBangTonKho").click(function () {
                window.open("../../form/frm_duyet_bangtonkho.php?mst=<?php echo $_SESSION['MST'] ?>&tencongty=<?php echo $_SESSION['TenCongTy'] ?>&tendatabase=<?php echo $_SESSION['TIENTO'].$_SESSION['MST'].'_'.$_SESSION['NienDo']; ?>","Danhsach_tonkho","height="+(screen.height-80)+",width="+screen.width);
            });
        });
    </script>
</head>
<body class="dt-print-view">
<table class="no-print" style="background-color: #00c6ff;" width="100%" >
    <tr>
        <td class="no-print"><input class="no-print" type="button" style="color: #0000CC;font-weight: bold;border: 2px solid red;" value="Xuất excel" id="xuatexcel"></td>
        <td><input type="button" style="color: #0000CC;font-weight: bold;border: 2px solid red;<?php echo $Display_an;  ?>" value="Duyệt bảng tồn kho" id="DuyetBangTonKho"></td>
    </tr>
</table>
<div class="BangInExcel">
<?php
$html_ct = "";
$tongsotk = count($_SESSION["LISTTKTHANG"]);
$sodong = 0;
foreach ($_SESSION["LISTTKTHANG"] as $k=> $dataCT) {
    $sodong ++;
    $html_title = '
<thead>
  <tr>
    <th STYLE="border:0.5px solid #000;"  rowspan="2">STT</th>
    <th STYLE="border:0.5px solid #000;"  rowspan="2">Mã số</th>
	<th STYLE="border:0.5px solid #000;"  rowspan="2">Tên, nhãn hiệu, quy cách</th>
    <th STYLE="border:0.5px solid #000;"  rowspan="2" >Mã TK</th>
    <th STYLE="border:0.5px solid #000;"  rowspan="2" >ĐVT</th>
    <th STYLE="border:0.5px solid #000;"  colspan="3">Số tồn cuối kỳ</th>
  </tr>
  <tr>
    <th STYLE="border:0.5px solid #000;" >Số lượng</th>
    <th STYLE="border:0.5px solid #000;">Đơn giá</th>
    <th STYLE="border:0.5px solid #000;" >Thành tiền</th>
  </tr>
   </thead>
  ';
    $sott = 0;
    $tongcong = 0;
    $tongcongSL = 0;
    $demall = 0;
    foreach ($dataCT as $key => $tiemG) {
        $sumg = 0;
        $soluongg = 0;
        $demall++;

        foreach ($tiemG as $tiemCT) {
            {
                $demall++;
                $sott++;
				$Style = "";
				if($tiemCT['soluongtonck']<0){
					$Style = "style='color:red;'";
				}
                $html_ct .= '
        <tr '.$Style.'>
        <td class="td_first"  width="35px" align="center" >' . $sott . '</td>
        <td class="td_center" align="center" >' . $tiemCT['mavt'] . '</td>
        <td class="td_center" align="left" width="280px" >' . html_entity_decode($tiemCT['tenvt']) . '</td>
		<td class="td_center" align="center"  width="40px" >' . $tiemCT['matk'] . '</td>
        <td class="td_center" align="center" width="40px" >' . $tiemCT['dvt'] . '</td>
        <td class="td_center" width="90px" align="right" >' . NB_Format($tiemCT['soluongtonck']) . '</td>
        <td align="right" class="td_center" width="70px" >';
                $html_ct .= number_format($tiemCT['dongiabinhquan'], $_SESSION["THONGTINPHIEU"]['sole'], ",", ".");
                $html_ct .= '</td>
        <td align="right" class="td_end" width="100px" >';
                $html_ct .= number_format($tiemCT['thanhtientonck'], 0, ",", ".");
                $html_ct .= '</td></tr>';
                $tongcong += $tiemCT['thanhtientonck'];
                $tongcongSL += $tiemCT['soluongtonck'];
                $sumg += $tiemCT['thanhtientonck'];
                $soluongg += $tiemCT['soluongtonck'];
            }

        }
        $html_ct .= '<tr>
    <td class="td_full"></td>
    <td class="td_full"></td>
    <td class="td_full" style="text-align: right;"><b><i>Cộng ' . $tiemCT['tennhom'] . '</i></b></td>
	<td class="td_full"></td>
    <td style="text-align: right;" class="td_full"></td>
    <td style="text-align: right;" class="td_full"><b><i>' . NB_Format($soluongg) . '</i></b></td>
    <td style="text-align: right;" class="td_full"></td>
    <td style="text-align: right;" class="td_full"><b><i>' . number_format($sumg, 0, ",", ".") . '</i></b></td>
  </tr>';
    }
    $html = '
<table width="100%" border="0" style="border-bottom: 1px solid #000">
  <tr>
    <td colspan="3" align="left" WIDTH="55%"><B>' . $_SESSION["TenCongTy"] . '</B><br/>' . $_SESSION["DiaChi"] . '<br/>MST: ' . $_SESSION["MST"] . '</td>    
    <td colspan="3" align="center" WIDTH="15%"></td>
    <td colspan="2" WIDTH="30%"  align="center" style="font-size:11px;">
		Mẫu số: S07/DNN<br/>Ban hành ' . $_SESSION['THONGTUMANG'][$_SESSION['theothongtu']]['thongtu'] . ' ngày ' . $_SESSION['THONGTUMANG'][$_SESSION['theothongtu']]['ngay'] . ' của Bộ trưởng Bộ Tài Chính 
	</td>
  </tr>
</table>
<table><tr><td></td></tr></table>
<table align="left"  border="0" width="100%">
  <tr>
    <td colspan="8" align="left" ><b>' . $_SESSION["THONGTINPHIEU"]['tenphieu'] . '</b></td>
  </tr>
  <tr>
    <td colspan="8" align="left" >Tồn cuối: <b>' . $_SESSION["THONGTINPHIEU"]['ngayhoadon'] . '</b></td>
  </tr>
    <tr>
    <td colspan="8" align="left" >Kho hàng: <b>' . $_SESSION['DSKHOHANG'][$k]['tenkho'] . '</b></td>
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
    <td STYLE="border:0.5px solid #000;"><b>TỔNG CỘNG</b></td>
	<td STYLE="border:0.5px solid #000;"></td>
    <td align="right" STYLE="border:0.5px solid #000;"></td>
    <td align="right" STYLE="border:0.5px solid #000;"><b>'.number_format($tongcongSL,3,",",".").'</b></td>
    <td STYLE="border:0.5px solid #000;" align="right" ><b>';
    $html .= "";
    $html .= '</b></td>
<td STYLE="border:0.5px solid #000;" align="right" ><b>';
    $html .= number_format($tongcong,0,",",".");
    $html .= '</b></td>
  </tr>
</table>
<table><tr><td></td></tr></table>

<table width="100%" border="0" cellpadding="2">
  <tr>
  <td colspan="2" align="center" width="35%">&nbsp;<br/>Người lập phiếu</td>
  <td colspan="3" align="center" width="35%">&nbsp;<br/>Kế toán trưởng</td>
  <td colspan="3" width="30%" rowspan="2" align="center">
    <em>Ngày ';
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
    if($tongsotk!=$sodong) {
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
</div>
</body>
</html>


