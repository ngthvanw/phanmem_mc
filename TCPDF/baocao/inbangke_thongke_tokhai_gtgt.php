<?php
session_start();
$DATA = $_SESSION["THONGKETOKHAI"];
$tendangnhap = ($_GET['tennguoidung']);
$nam = ($_GET['niendo']);
$khaitheo = ($_GET['khaitheo']);
$trangthai = ($_GET['trangthai']);
$loaitokhai = ($_GET['loaitokhai']);
$nguoiphutrach = ($_GET['nguoiphutrach']);
$kykhaithue = "";
if($loaitokhai=="Thang"){
    $kykhaithue="Tháng ".$khaitheo."-".$nam;
}else{
    $kykhaithue="Quý ".$khaitheo."-".$nam;
}
?>
<html>
<head><title>BẢNG THỐNG KÊ DUYỆT TỜ KHAI (Nhấn CTRL + P để in , ALT + F4 để thoát)</title>

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

        .page_break {
            page-break-inside: avoid;
        }

		@page {
            size: A4;
            margin-left: 4mm;
            margin-right: 10mm;
        }

        @media print {
            #Header, #Footer { display: none !important; }
            .no-print, .no-print * {
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
    <script type="text/javascript" language="javascript">
        $(document).ready(function() {
            $('#xuatexcel').click(function(){
                var url='data:application/vnd.ms-excel,' + encodeURIComponent($('.dt-print-view').html())
                location.href=url
                return false
            })
        });
    </script>
</head>
<body class="dt-print-view">
<table class="no-print" style="background-color: #00c6ff;" width="100%" >
    <tr>
        <td class="no-print"><input class="no-print" type="button" style="color: #0000CC;font-weight: bold;border: 2px solid red;" value="Xuất excel" id="xuatexcel"></td>
        <td></td>
    </tr>
</table>
<?php
$html_ct = "";

$html_title = '
<thead>
  <tr>
    <th STYLE="border:0.5px solid #000;"  rowspan="2">STT</th>
    <th STYLE="border:0.5px solid #000;"  rowspan="2">Mã số thuế</th>
    <th STYLE="border:0.5px solid #000;" >Tên công ty</th>
	<th STYLE="border:0.5px solid #000;"  rowspan="2">Người phụ trách</th>
    <th STYLE="border:0.5px solid #000;"  rowspan="2" >Ngày duyệt</th>
    <th STYLE="border:0.5px solid #000;"  rowspan="2" >Tr.nhóm duyệt</th>
    <th STYLE="border:0.5px solid #000;"  >Giám đốc duyệt</th>
  </tr>
   </thead>
  ';
$sott = 0;
$tongdoanhthu = 0;
$tongthue = 0;
$tongduyet = 0;
foreach ($DATA as $itemCT) {
    $sott++;
    $html_ct .= '
        <tr >
        <td class="td_first"  width="35px" align="center" >' . $sott . '</td>
        <td class="td_center" width="90px" align="center" >' . $itemCT["masothue"] . '</td>
        <td class="td_center" align="left" width="340px" >' . $itemCT["tendoanhnghiep"] . '</td>
        <td class="td_center" align="center" width="80px" >' . $itemCT["tendangnhap"] . '</td>
        <td class="td_center" width="80px" >' . $itemCT["ngayduyet"] . '</td>
        <td align="center" class="td_center" width="50px" >';
         if($itemCT["truongnhomduyet"]==1){
             $html_ct .= 'Duyệt';
         }else{
             $html_ct .= '';
         }
         $html_ct .= '</td>
        <td align="center" class="td_end" width="50px" >';
         if($itemCT["giamdocduyet"]==1){
             $html_ct .= 'Duyệt';
         }else{
             $html_ct .= '';
         }
         $html_ct .= '</td></tr>';
if($itemCT["truongnhomduyet"]==1 || $itemCT["giamdocduyet"]==1){
    $tongduyet++;
}
}
$html = '   
</td>
  </tr>
</table>
<table><tr><td></td></tr></table>
<table align="center"  border="0" width="100%">
  <tr>
    <td align="center" ><b>DANH SÁCH DUYỆT TỜ KHAI</b></td>
  </tr>
  <tr>
    <td align="center" ><b>Kỳ khai thuế: ' . $kykhaithue . '</b></td>
  </tr>
</table>
<table width="100%" border="0">
  <tr>
    <td align="right"></td>
  </tr>
</table>
<table border="0" class="dataTable" cellpadding="2" cellspacing="0" align="center" valign="middle">' . $html_title . $html_ct . '
<tr>
    <td class="td_full"></td>
    <td class="td_full"></td>
    <td class="td_full" style="text-align: left;"><b>TỔNG CỘNG</b></td>
	<td class="td_full"></td>
    <td style="text-align: right;" class="td_full"></td>
    <td style="text-align: center;" colspan="2" class="td_full"><b>'.$tongduyet.'</b></td>
  </tr>
</table>
<table><tr><td></td></tr></table>

<table width="100%" border="0" cellpadding="2">
  <tr>
  <td align="center" width="35%">&nbsp;<br/>Người lập phiếu</td>
    <td align="center" width="35%">&nbsp;<br/>Kế toán trưởng</td>
    <td width="30%" rowspan="2" align="center">
    <em>'.$_SESSION["ThanhPho"].', Ngày ';
$time = strtotime(date("Y/m/d"));
$html .= date("d/m/Y", $time);
$html .= '</em><br/>Giám đốc
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


