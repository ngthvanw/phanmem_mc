<?php
session_start();
$DATA = $_SESSION["DSNOKHCHITIET"];
$sole = $_GET['sole'];
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
            width: 297mm;
        }

        .page_break {
            page-break-inside: avoid;
        }

        @page {
            size: A4 landscape;
            margin-top: 5mm;
            margin-left: 4mm;
            margin-right: 5mm;
            margin-bottom: 10mm;

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
            $('#xuatexcel').click(function(){
                $(".dt-print-view").table2excel({
                    exclude: ".noExl",
                    name: "Excel Document Name",
                    filename: "tonghop_tk_" + new Date().toISOString().replace(/[\-\:\.]/g, "") + ".xls",
                    fileext: ".xls",
                    exclude_img: true,
                    exclude_links: true,
                    exclude_inputs: true,
                    preserveColors: true
                });
            });
            $("#DuyetBangTonKho").click(function () {
                window.open("../../form/frm_duyet_bangtonkho.php?mst=<?php echo $_SESSION['MST'] ?>&tencongty=<?php echo $_SESSION['TenCongTy'] ?>&tendatabase=<?php echo $_SESSION['TIENTO'].$_SESSION['MST'].'_'.$_SESSION['NienDo']; ?>","Danhsach_tonkho","height="+(screen.height-80)+",width="+screen.width);
            });
        });
    </script>
</head>
<body class="dt-print-view">
<table class="no-print" style="background-color: #00c6ff;" width="100%" border="0" >
    <tr>
        <td class="no-print"><input class="no-print" type="button" style="color: #0000CC;font-weight: bold;border: 2px solid red;" value="Xuất excel" id="xuatexcel"></td>
        <td><input type="button" style="color: #0000CC;font-weight: bold;border: 2px solid red;<?php echo $Display_an;  ?>" value="Duyệt bảng tồn kho" id="DuyetBangTonKho"></td>
        <td></td>
    </tr>
</table>
<?php
$tongsotk = count($_SESSION["LISTTKTHANG"]);
$sodong = 0;

foreach ($_SESSION["LISTTKTHANG"] as $k=> $dataCT) {
    $html="";
    $html_ct = "";
    $sodong ++;
    $html_title = '
<thead>
  <tr>
    <th STYLE="border:0.5px solid #000;"  rowspan="2">STT</th>
    <th STYLE="border:0.5px solid #000;"  rowspan="2">Mã số</th>
	<th STYLE="border:0.5px solid #000;"  rowspan="2">Tên, nhãn hiệu, quy cách</th>
    <th STYLE="border:0.5px solid #000;"  rowspan="2" >ĐVT</th>
    <th STYLE="border:0.5px solid #000;"  colspan="2">Số tồn đầu kỳ</th>
    <th STYLE="border:0.5px solid #000;"  colspan="2">Nhập trong kỳ</th>
    <th STYLE="border:0.5px solid #000;"  colspan="2">Xuất trong kỳ</th>
    <th STYLE="border:0.5px solid #000;"  colspan="3">Số tồn cuối kỳ</th>
  </tr>
  <tr>
    <th STYLE="border:0.5px solid #000;" >Số lượng</th>
    <th STYLE="border:0.5px solid #000;" >Thành tiền</th>
    <th STYLE="border:0.5px solid #000;" >Số lượng</th>
    <th STYLE="border:0.5px solid #000;" >Thành tiền</th>
    <th STYLE="border:0.5px solid #000;" >Số lượng</th>
    <th STYLE="border:0.5px solid #000;" >Thành tiền</th>
    <th STYLE="border:0.5px solid #000;" >Số lượng</th>
    <th STYLE="border:0.5px solid #000;" >Đơn giá</th>
    <th STYLE="border:0.5px solid #000;" >Thành tiền</th>
    
  </tr>
   </thead>
  ';
    $sott = 0;
    $tongcong = 0;
    $tongcongSL = 0;
    $demall = 0;
    $tongthanhtiendk = 0;
    $tongthanhtienck = 0;

    $tongthanhtiennhapps = 0;
    $tongthanhtienxuatps = 0;

    $tongsldk=0;
    $tongslck=0;

    $tongslnhap=0;
    $tongslxuat=0;
    foreach ($dataCT as $key => $tiemG) {
        $sumg = 0;
        $soluongg = 0;
        $demall++;
        $tongsldkg = 0;
        $tongthanhtiendkg = 0;
        $tongslckg = 0;
        $tongthanhtienckg = 0;
        $tongslnhapg=0;
        $tongslxuatg=0;
        $tongthanhtiennhapg=0;
        $tongthanhtienxuatg=0;

        foreach ($tiemG as $tiemCT) {
            {


                $sumg = 0;
                $soluongg = 0;
                $demall++;
if($tiemCT['soluongtondk']!=0 || $tiemCT['soluongtonck']!=0 || $tiemCT['soluongnhap']!=0 || $tiemCT['soluongxuat']!=0) {
    $sott++;
    $html_ct .= '
        <tr >
        <td class="td_first"  width="35px" align="center" >' . $sott . '</td>
        <td class="td_center" align="center" width="100px" >' . $tiemCT['mavt'] . '</td>
        <td class="td_center" align="left" width="400px" >' . html_entity_decode($tiemCT['tenvt']) . '</td>
        <td class="td_center" align="center" width="40px" >' . $tiemCT['dvt'] . '</td>
        <td class="td_center" width="90px" align="right" >' . (($tiemCT['soluongtondk'] == 0) ? "":number_format($tiemCT['soluongtondk'],3,",",".")) . '</td>
        <td align="right" class="td_end" width="100px" >';
    $html_ct .= (($tiemCT['thanhtientondk'] == 0) ? "":number_format($tiemCT['thanhtientondk'],0,",","."));
    $html_ct .= '</td>
        <td class="td_center" width="90px" align="right" >' . (($tiemCT['soluongnhap'] == 0) ? "":number_format($tiemCT['soluongnhap'],3,",",".")) . '</td>
        <td align="right" class="td_end" width="100px" >';
    $html_ct .= (($tiemCT['thanhtiennhap'] == 0) ? "":number_format($tiemCT['thanhtiennhap'],0,",","."));
    $html_ct .= '</td>

        <td class="td_center" width="90px" align="right" >' . (($tiemCT['soluongxuat'] == 0) ? "":number_format($tiemCT['soluongxuat'],3,",",".")) . '</td>
        <td align="right" class="td_end" width="100px" >';
    $html_ct .= (($tiemCT['thanhtienxuat'] == 0) ? "":number_format($tiemCT['thanhtienxuat'],0,",","."));
	$DGBQ = ($tiemCT['thanhtientondk']+$tiemCT['thanhtiennhap'])/($tiemCT['soluongtondk']+$tiemCT['soluongnhap']);
    $html_ct .= '</td>

        <td class="td_center" width="90px" align="right" >' . (($tiemCT['soluongtonck'] == 0) ? "":number_format($tiemCT['soluongtonck'],3,",",".")) . '</td>
		<td class="td_center" width="90px" align="right" >' . (($tiemCT['thanhtientonck'] == 0) ? "":number_format($DGBQ,2,",",".")) . '</td>
        <td align="right" class="td_end" width="100px" >';
    $html_ct .= (($tiemCT['thanhtientonck'] == 0) ? "":number_format($tiemCT['thanhtientonck'],0,",","."));
    $html_ct .= '</td>

</tr>';
}
                $tongthanhtiendk += $tiemCT['thanhtientondk'];
                $tongthanhtienck += $tiemCT['thanhtientonck'];

                $tongthanhtiennhapps += $tiemCT['thanhtiennhap'];
                $tongthanhtienxuatps += $tiemCT['thanhtienxuat'];

                $tongsldk+=$tiemCT['soluongtondk'];
                $tongslck+=$tiemCT['soluongtonck'];

                $tongslnhap+=$tiemCT['soluongnhap'];
                $tongslxuat+=$tiemCT['soluongxuat'];

                $tongthanhtiendkg+= $tiemCT['thanhtientondk'];
                $tongthanhtienckg+= $tiemCT['thanhtientonck'];



                $tongsldkg+=$tiemCT['soluongtondk'];
                $tongslckg+=$tiemCT['soluongtonck'];

                $tongslnhapg+=$tiemCT['soluongnhap'];
                $tongslxuatg+=$tiemCT['soluongxuat'];
                $tongthanhtiennhapg+=$tiemCT['thanhtiennhap'];
                $tongthanhtienxuatg+=$tiemCT['thanhtienxuat'];


            }

        }
        $tongnhomsoluong = $tongsldkg+$tongslnhapg+$tongslxuatg+$tongslckg;
        if($tongnhomsoluong!=0) {
            $html_ct .= '<tr>
    <td class="td_full"></td>
    <td class="td_full"></td>
    <td class="td_full" style="text-align: right" ><b><i>Cộng ' . $tiemCT['tennhom'] . '</i></b></td>
    <td style="text-align: right;" class="td_full"></td>
    <td style="text-align: right;" class="td_full"><b><i>' . number_format($tongsldkg, 3, ",", ".") . '</i></b></td>
    <td style="text-align: right;" class="td_full"><b><i>' . number_format($tongthanhtiendkg, 0, ",", ".") . '</i></b></td>
        <td style="text-align: right;" class="td_full"><b><i>' . number_format($tongslnhapg, 3, ",", ".") . '</i></b></td>
    <td style="text-align: right;" class="td_full"><b><i>' . number_format($tongthanhtiennhapg, 0, ",", ".") . '</i></b></td>
        <td style="text-align: right;" class="td_full"><b><i>' . number_format($tongslxuatg, 3, ",", ".") . '</i></b></td>
    <td style="text-align: right;" class="td_full"><b><i>' . number_format($tongthanhtienxuatg, 0, ",", ".") . '</i></b></td>
        <td style="text-align: right;" class="td_full"><b><i>' . number_format($tongslckg, 3, ",", ".") . '</i></b></td>
        <td style="text-align: right;" class="td_full"></td>
    <td style="text-align: right;" class="td_full"><b><i>' . number_format($tongthanhtienckg, 0, ",", ".") . '</i></b></td>
  </tr>';
        }
    }
    $html = '
<table width="100%" border="0" style="border-bottom: 1px solid #000">
  <tr>
    <td align="left" WIDTH="55%"><B>' . $_SESSION["TenCongTy"] . '</B><br/>' . $_SESSION["DiaChi"] . '<br/>MST: ' . $_SESSION["MST"] . '</td>    
    <td align="center" WIDTH="15%"></td>
    <td WIDTH="30%">
    <table border="0" width="100%">
    
   <tr>
   <td align="right" style="font-size:11px;">Mẫu số: S03a-SKT/DNN<br/>Ban hành theo Quyết định số 1271-TC/QĐ/CĐKT<br/>Ngày 14/12/1995 của Bộ Tài Chính</td>
</tr>

</table>
    
</td>
  </tr>
</table>
<table><tr><td></td></tr></table>
<table align="left"  border="0" width="100%">
  <tr>
    <td align="left" ><b>' . $_SESSION["THONGTINPHIEU"]['tenphieu'] . '</b></td>
  </tr>
  <tr>
    <td align="left" >Tồn cuối: <b>' . $_SESSION["THONGTINPHIEU"]['ngayhoadon'] . '</b></td>
  </tr>
    <tr>
    <td align="left" >Kho hàng: <b>' . $_SESSION['DSKHOHANG'][$k]['tenkho'] . '</b></td>
  </tr>
</table>
<table width="100%" border="0">
  <tr>
    <td align="right"></td>
  </tr>
</table>
<table border="0" class="dataTable" cellpadding="2" cellspacing="0" align="center" valign="middle">' . $html_title . $html_ct . '
 
  <tr>
    <td STYLE="border:0.5px solid #000;"></td>
    <td STYLE="border:0.5px solid #000;"></td>
    <td STYLE="border:0.5px solid #000;"><b>TỔNG CỘNG</b></td>
    <td align="right" STYLE="border:0.5px solid #000;"></td>
    <td align="right" STYLE="border:0.5px solid #000;"><b>'.number_format($tongsldk,3,",",".").'</b></td>
<td STYLE="border:0.5px solid #000;" align="right" ><b>';
    $html .= number_format($tongthanhtiendk,0,",",".");
    $html .= '</b></td>
<td align="right" STYLE="border:0.5px solid #000;"><b>'.number_format($tongslnhap,3,",",".").'</b></td>
<td STYLE="border:0.5px solid #000;" align="right" ><b>';
    $html .= number_format($tongthanhtiennhapps,0,",",".");
    $html .= '</b></td>
<td align="right" STYLE="border:0.5px solid #000;"><b>'.number_format($tongslxuat,3,",",".").'</b></td>
<td STYLE="border:0.5px solid #000;" align="right" ><b>';
    $html .= number_format($tongthanhtienxuatps,0,",",".");
    $html .= '</b></td>
<td align="right" STYLE="border:0.5px solid #000;"><b>'.number_format($tongslck,3,",",".").'</b></td>
<td align="right" STYLE="border:0.5px solid #000;"></td>
<td STYLE="border:0.5px solid #000;" align="right" ><b>';
    $html .= number_format($tongthanhtienck,0,",",".");
    $html .= '</b></td>
  </tr>
</table>
<table><tr><td></td></tr></table>

<table width="100%" border="0" cellpadding="2">
  <tr>
  <td align="center" width="35%">&nbsp;<br/>Người lập phiếu</td>
    <td align="center" width="35%">&nbsp;<br/>Kế toán trưởng</td>
    <td width="30%" rowspan="2" align="center">
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
</body>
</html>


