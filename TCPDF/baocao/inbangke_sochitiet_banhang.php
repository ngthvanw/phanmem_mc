<?php
session_start();
require_once('tcpdf_include.php');
$DATACIBANRA = $_SESSION['SOCHITIETHH'];
$tungay_arr = explode("-", $_SESSION['THONGTINPHIEUSOHH']['tungay']);
$denngay_arr = explode("-", $_SESSION['THONGTINPHIEUSOHH']['denngay']);

$tongsotk = count($DATACIBANRA);

$tungay = $tungay_arr[1];
$dengay = $denngay_arr[1];

$DonGiaBinhQuan = $_SESSION['DSDGBQTK'];
$nam = $denngay_arr[0];
// create new PDF document

?>
<html>
<head><title>SỔ CHI TIẾT BÁN HÀNG (Nhấn CTRL + P để in , ALT + F4 để thoát)</title>

    <style type="text/css" class="init">
        .dataTable {
            font-family: "Times New Roman", Georgia, Serif;
            border-collapse: collapse;
            width: 100%;
        }

        .dataTable td {
            padding: 1px 2px;
            font-size: 13px;

        }

        .dataTable .td_full, th {
            border: 1px solid #000000;
            text-align: center;
            font-size: 13px;
            padding: 1px 2px;
            height: 20px;
        }

        .dataTable .td_full_right {
            border: 1px solid #000000;
            text-align: right;
            font-size: 13px;
            padding: 1px 2px;
            height: 20px;
        }

        .dataTable .td_first {
            border: 1px dashed #000000;
            border-left: 1px solid #000000;
        }

        .dataTable .td_center {
            border-bottom: 1px dashed #000000;
            border-left: 1px solid #000000;
            height: 18px;
        }

        .dataTable .td_end {
            border: 1px dashed #000000;
            border-left: 1px solid #000000;
            border-right: 1px solid #000000;
        }

        body {
            width: 297mm;
        }

        .page_break {
            page-break-inside: avoid;
        }

        .page_break_ln {
            page-break-before: always;
        }

        @page {
            size: A4 landscape;
            margin-top: 5mm;
            margin-bottom: 10mm;
            counter-increment: page;

        }

        @media print {
            #Header, #Footer {
                display: none !important;
            }

        }

        #Header, #Footer {
            display: none !important;
        }

        @media print {
            p.bodyText {
                font-family: times, georgia, serif;
            }
            .no-print, .no-print * {
                display: none !important;
            }
        }

        .page_break {
            page-break-before: always;
        }

        @page {
            @bottom-right {
                content: counter(page) " of " counter(pages);
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
                    filename: "sochitiet_banhang_" + new Date().toISOString().replace(/[\-\:\.]/g, "") + ".xls",
                    fileext: ".xls",
                    exclude_img: true,
                    exclude_links: true,
                    exclude_inputs: true,
                    preserveColors: true
                });
            })
        });
    </script>
</head>
<body class="dt-print-view">
<table class="no-print" style="background-color: #00c6ff;" width="100%" >
    <tr>
        <td class="no-print"><input type="button" style="color: #0000CC;font-weight: bold;border: 2px solid red;" value="Xuất excel" id="xuatexcel"></td>
        <td></td>
    </tr>
</table>
<?php
$sodong = 0;
$dongiaton = 0;
$soluongton = 0;
foreach ($DATACIBANRA as $k => $ItemChiTiet) {
    $sodong++;
    $html_ct = "";
    $html_title = '
   <thead>
  <tr>
    <th STYLE="border:0.5px solid #000;" width="30px" rowspan="2">&nbsp;<br/>STT</th>
    <th STYLE="border:0.5px solid #000;" width="35px" rowspan="2">Ngày<br/>ghi sổ</th>
    <th STYLE="border:0.5px solid #000;" width="80px" colspan="2">Chứng từ</th>
    <th STYLE="border:0.5px solid #000;" width="180px" rowspan="2">&nbsp;<br/>Diễn giải</th>
    <th STYLE="border:0.5px solid #000;" width="30px" rowspan="2">TK<br/>đối ứng</th>
    <th STYLE="border:0.5px solid #000;" colspan="3" width="130px">Doanh thu</th>
    <th STYLE="border:0.5px solid #000;" colspan="2" width="130px">Các khoản tính trừ</th>
  </tr>
  <tr>
    <th STYLE="border:0.5px solid #000;" width="50px">Số hiệu</th>
    <th STYLE="border:0.5px solid #000;"width="35px" >Ngày</th>
    
	<th STYLE="border:0.5px solid #000;">Số lượng</th>
	<th STYLE="border:0.5px solid #000;">Đơn giá</th>
    <th STYLE="border:0.5px solid #000;" >Thành tiền</th>
	
	<th STYLE="border:0.5px solid #000;">Thuế</th>
    <th STYLE="border:0.5px solid #000;" >Khác<br/>(521)</th>
  </tr>
     </thead>
';
    $soluongnhap = 0;

    $soluongxuat = 0;

    $thanhtien = 0;

    $thanhtienxuat = 0;

    foreach ($ItemChiTiet as $thang => $itemMaVT) {

        $soluongnhapthang = 0;

        $soluongxuatthang = 0;

        $thanhtienthang = 0;

        $thanhtienxuatthang = 0;
        $dongiabinhquan_trongthang = 0;
        $sott++;
        $sopt = count($itemMaVT);
        $thanhtiencuoiky = $itemMaVT[$sopt - 1]['ttck'];
        $slcuoiky = $itemMaVT[$sopt - 1]['slck'];
        $dongiabinhquan_trongthang = round((($thanhtiencuoiky + $thanhtienton) / ($slcuoiky + $soluongton)), 2);
        foreach ($itemMaVT as $itemCT) {
            if($itemCT['loaiphieu']==2){
            $soluongnhap += $itemCT["soluongnhap"];
            $soluongnhapthang += $itemCT["soluongnhap"];
            $soluongxuat += $itemCT["soluongxuat"];
            $soluongxuatthang += $itemCT["soluongxuat"];
            $thanhtien += $itemCT["thanhtien"];
            $thanhtienthang += $itemCT["thanhtien"];

            $dongiabinhquan = $itemCT["dongianhap"];

            $thanhtienxuatbq = $itemCT["thanhtienxuat"];
            $thanhtienxuat += $thanhtienxuatbq;
            $thanhtienxuatthang += $thanhtienxuat;
            $html_ct .= '
        <tr >
        <td class="td_first" align="center" >' . $itemCT["sophieu"] . '</td>
        <td class="td_center">';
            $time = strtotime($itemCT["ngayghiso"]);
            $html_ct .= date("d-m", $time);
            $html_ct .= '</td>
        <td class="td_center">' . $itemCT["sct"] . '</td>
        <td class="td_center">';
            $time1 = strtotime($itemCT["ngayhoadon"]);
            $html_ct .= date("d-m", $time1);
            $html_ct .= '</td>
        <td class="td_center" align="left">' . $itemCT["tenkh"] . '</td>
        <td class="td_center">' . $itemCT["tkduxk"] . '</td>
        <td class="td_center" align="right">';
                $slxuat = $itemCT["soluongxuat"];
                if (number_format($itemCT["soluongxuat"]) != 0) {
                    $html_ct .= number_format($itemCT["soluongxuat"], 2, ",", ".");
                } else {
                    $html_ct .= "";
                }

            $html_ct .= '</td><td class="td_center" align="right">';
                if (number_format($dongiabinhquan) != 0) {
                    $html_ct .= number_format($dongiabinhquan, 2, ",", ".");
                } else {
                    $html_ct .= "";
                }
            $html_ct .= '</td><td class="td_center" align="right">';
            $ttxuat = $thanhtienxuatbq;
            if (number_format($thanhtienxuatbq) != 0) {
                $html_ct .= number_format($thanhtienxuatbq, 0, ",", ".");
            } else {
                $html_ct .= "";
            }


            $html_ct .= '</td><td class="td_center" align="right">';
            $soluongton = $itemCT["thue"];
            if (number_format($soluongton) != 0) {
                $html_ct .= number_format($soluongton, 0, ",", ".");
            } else {
                $html_ct .= "";
            }

            $html_ct .= '</td><td class="td_end" align="right">';

            $thanhtienton = $itemCT["tienchietkhau"];
            if (number_format($thanhtienton) != 0) {
                $html_ct .= number_format($thanhtienton, 0, ",", ".");
            } else {
                $html_ct .= "";
            }

            $html_ct .= '</td>

      </tr>';
        }
        }
        $html_ct .= '
        <tr >
        <td STYLE="border:0.5px solid #000;" ></td>
        <td STYLE="border:0.5px solid #000;"></td>
        <td STYLE="border:0.5px solid #000;"></td>
        <td STYLE="border:0.5px solid #000;"></td>
        <td STYLE="border:0.5px solid #000;" align="right"><i> Cộng tháng ' . $thang . '/' . $nam . '</i></td>
        <td STYLE="border:0.5px solid #000;"></td>
        <td STYLE="border:0.5px solid #000;" align="right"><i>' . number_format($soluongxuatthang, 2, ",", ".") . '</i></td>
		
		<td STYLE="border:0.5px solid #000;" align="right"></td>
        <td STYLE="border:0.5px solid #000;" align="right"><i>' . number_format($thanhtienxuatthang, 0, ",", ".") . '</i></td>
		
		        <td STYLE="border:0.5px solid #000;" align="right"><i>' . number_format($soluongton, 0, ",", ".") . '</i></td>
        <td STYLE="border:0.5px solid #000;" align="right"><i>' . number_format($thanhtienton, 0, ",", ".") . '</i></td>

      </tr>';
    }

    $html = '
<table width="100%" border="0">
  <tr>
    <td align="left" WIDTH="62%">
		<table>
			<tr>
				<td><b>' . $_SESSION['TenCongTy'] . '</b></td>
				</tr>
				<tr>
				<td>' . $_SESSION['DiaChi'] . '</td>
				</tr>
				<tr>
				<td>MST: ' . $_SESSION['MST'] . '</td>
			</tr>
		</table>
	</td>    
    <td align="center" WIDTH="15%"><B><h3></h3></B></td>
    <td WIDTH="23%">
    <table border="0">
    
   <tr>
   <td align="center"><i>Mẫu số S16-DNN<br/>
        (Ban hành '.$_SESSION['THONGTUMANG'][$_SESSION['theothongtu']]['thongtu'].' ngày ' . $_SESSION['THONGTUMANG'][$_SESSION['theothongtu']]['ngay'] . '
   của Bộ Tài chính)</i>
   </td>
</tr>

</table>
    
</td>
  </tr>
</table>

<table border="0" align="center">
  <tr>
    <td align="center" ><b>' . $_SESSION["THONGTINPHIEUSOHH"]['tenphieu'] . '</b></td>
  </tr>
  <tr>
    <td><b> ' . $_SESSION["THONGTINPHIEUSOHH"]['ngayhoadon'] . '</b></td>
  </tr>
</table>
<table border="0" cellspacing="1" cellpadding="1" width="100%">
  <tr>
    <td><table  border="0">
        <tr>
          <td width="430px">- Tên nguyên liệu, vật liệu, công cụ, dụng cụ(sản phẩm, hàng hóa):</td>
          <td width="400px"><b>' . $_SESSION['DSMAVT'][$k]['tenvt'] . '</b></td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" >
        <tr>
          <td><table width="600px" border="0">
		  <tr>
		  <td>- Mã số:&nbsp; <b>' . $_SESSION['DSMAVT'][$k]['mavt'] . '</b></td>
          <td>- Tài khoản:&nbsp;<b>' . $_SESSION['DSMAVT'][$k]['matk'] . '</b></td>
		  </tr>
		  </table></td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" >
        <tr>
          <td><table width="600px" border="0">
		  <tr>
		  <td>- Tên kho:&nbsp; <b></b></td>
          <td>- Chú thích:&nbsp;<b></b></td>
		  </tr>
		  </table></td>
        </tr>
    </table></td>
  </tr>

</table>
<table width="100%" border="0">
  <tr>
    <td align="right"></td>
  </tr>
</table>
<table width="100%" border="0">
  <tr>
    <td align="right">Đơn vị tính: <b>' . $_SESSION['DSMAVT'][$k]['dvt'] . '</b></td>
  </tr>
</table><table class="dataTable" border="0" cellpadding="2" cellspacing="0" align="center" valign="middle">' . $html_title . $html_ct . '
<tr>
    <td STYLE="border:0.5px solid #000;"></td>
    <td STYLE="border:0.5px solid #000;"></td>
    <td STYLE="border:0.5px solid #000;"></td>
    <td STYLE="border:0.5px solid #000;"></td>
    <td STYLE="border:0.5px solid #000;text-align: right;"><b>Tổng cộng</b></td>
    <td STYLE="border:0.5px solid #000;"></td>
    <td STYLE="border:0.5px solid #000;text-align: right;"><b>' . number_format($soluongxuat, 2, ",", ".") . '</b></td>
	<td align="right" STYLE="border:0.5px solid #000;"></td>
    <td align="right" STYLE="border:0.5px solid #000;"><b>' . number_format($thanhtienxuat, 0, ",", ".") . '</b></td>
	
	<td align="right" STYLE="border:0.5px solid #000;"><b>' . number_format($soluongton, 0, ",", ".") . '</b></td>
    <td align="right" STYLE="border:0.5px solid #000;"><b>' . number_format($thanhtienton, 0, ",", ".") . '</b></td>
	
  </tr>
</table>
<table><tr><td></td></tr></table>
<table border=0 align="center" width=100%><tr>
<td align="center">Người ghi sổ</td>
<td align="center">Kế toán trưởng</td>
<td align="center">';
    $timengaylap = strtotime($_SESSION["THONGTINPHIEUSOHH"]['ngaylap']);
    $html .= date("d-m-Y", $timengaylap);
    $html .= '<br/>Giám đốc</td></tr></table>
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
