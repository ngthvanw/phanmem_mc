<?php
session_start();
require_once('tcpdf_include.php');
$DATADSKHAUHAOTS = $_SESSION['DSKHAUHAOTAISAN'];
$DATADSKHAUHAOTSTK = $_SESSION['DSKHAUHAOTAISANTK'];
?>
<html>
<head><title>In bản kê mua vào (Nhấn CTRL + P để in , ALT + F4 để thoát)</title>

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
    width: 297mm;
            padding: 2px;
            margin: 2px;
        }

        .page_break {
    page-break-inside: avoid;
        }
        @media print {
    #Header, #Footer {
    display: none !important;
            }

            .page_break {
    page-break-inside: avoid;
            }
            .no-print, .no-print * {
    display: none !important;
            }
        }

        @page {
    size: A4 landscape;
            margin-top: 5mm;
            margin-bottom: 10mm;

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
        }

        .ketquaduyetsocai {
    border-collapse: collapse;
            width: 100%;
        }

        .ketquaduyetsocai td, .ketquaduyetsocai th {
    border: 1px solid #ddd;
            padding: 8px;
        }

        .ketquaduyetsocai tr:nth-child(even){background-color: #f2f2f2;}

        .ketquaduyetsocai tr:hover {background-color: #ddd;}

        .ketquaduyetsocai th {
        padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #4CAF50;
            color: white;
        }

    </style>
    <meta charset="utf-8">
    <script type="text/javascript" src="../../js/jquery.js"></script>
    <script type="text/javascript" src="../../js/jquery.number.min.js"></script>
    <script type="text/javascript" src="../../js/jquery.table2excel.js"></script>
    <script type="text/javascript" language="javascript">
        $(document).ready(function() {
            $('#xuatexcel').click(function(){
                $(".dataTable").table2excel({
                    exclude: ".noExl",
                    name: "Excel Document Name",
                    filename: "myFileName" + new Date().toISOString().replace(/[\-\:\.]/g, "") + ".xls",
                    fileext: ".xls",
                    exclude_img: true,
                    exclude_links: true,
                    exclude_inputs: true,
                    preserveColors: true
                });
            })

            $('.duyettaikhoan').click(function(){
                $val = this.dataset.name;
                $arr_tk = $val.split("#");
                $cof = confirm("CHÚ Ý!! \nBạn đang chuẩn bị duyệt bảng kê mua vào có tổng tiền: "+$.number($arr_tk[2],0,".",",")+" - tổng thuế: "+$.number($arr_tk[3],0,".",",")+".\n Bạn có muốn tiếp tục không?");
                if($cof){
                    $.ajax({
                        url: '../../modules/phieukiemtra/add_duyetbangke.php',
                        type: 'POST',
                        dataType: 'php',
                        data: {
                        matk:$arr_tk[0],
                            tungay_denngay: $arr_tk[1],
                            sodu:$arr_tk[2],
                            sodu2:$arr_tk[3]
                        }
                    }).done(function() {
                    });
                    loadListDuyetSoCai($arr_tk[0]);
                }
            });
            function loadListDuyetSoCai($matk) {
                $(".ketquaduyetsocai").load("../../modules/phieukiemtra/list_duyetbangke.php?matk="+$matk);
            }

            $('.ketquatrave').click(function(){
                $matk = this.dataset.name;
                //alert($matk);
                loadListDuyetSoCai($matk);
            });
            $('.xoa').click(function(){
                $matk = this.dataset.name;
                $cof = confirm("CẢNH BÁO!!\nBạn có muốn xóa dòng nhật ký này không?");
                if($cof) {
                    $.ajax({
                        url: '../../modules/phieukiemtra/del_duyetbangke.php',
                        type: 'POST',
                        dataType: 'php',
                        data: {
                        matk: $matk
                        }
                    }).done(function () {
                    });
                    loadListDuyetSoCai($matk);
                }
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
$html_ct = "";
$html_title = '
<thead>
  <tr>
    <th STYLE="border:0.5px solid #000;" width="20px" rowspan="2">&nbsp;<br/>STT</th>
    <th STYLE="border:0.5px solid #000;" width="60px" rowspan="2">&nbsp;<br/>Mã số</th>
    <th STYLE="border:0.5px solid #000;" width="260px" rowspan="2">&nbsp;<br/>Tên tài sản</th>
    <th STYLE="border:0.5px solid #000;" width="40px" rowspan="2">&nbsp;<br/>ĐVT</th>
    <th STYLE="border:0.5px solid #000;" width="30px" rowspan="2">Tỷ lệ khấu hao (%)</th>
    <th  STYLE="border:0.5px solid #000;" width="100px" rowspan="2">&nbsp;<br/>Nguyên giá</th>
    <th  STYLE="border:0.5px solid #000;" width="70px" rowspan="2">&nbsp;<br/>Số khấu hao</th>
    <th width="360px" STYLE="border:0.5px solid #000;" colspan="6">Chia ra các đối tượng chi phí</th>
  </tr>
 
  <tr>
    <th width="70px" STYLE="border:0.5px solid #000;" >';
    $matk0 = array_keys($DATADSKHAUHAOTSTK[0]);
if($matk0[0]==""){

}else{
    $html_title .= "TK " . $matk0[0];
}
    $html_title .= '</td>
    <th width="70px" STYLE="border:0.5px solid #000;">';
    $matk1 = array_keys($DATADSKHAUHAOTSTK[1]);
if($matk1[0]==""){

}else{
    $html_title .= "TK " . $matk1[0];
}
    $html_title .= '</td>
    <th width="70px" STYLE="border:0.5px solid #000;" >';
    $matk2 = array_keys($DATADSKHAUHAOTSTK[2]);
if($matk2[0]==""){

}else{
    $html_title .= "TK " . $matk2[0];
}
    $html_title .= '</td>
        <th width="70px" STYLE="border:0.5px solid #000;">';
    $matk3 = array_keys($DATADSKHAUHAOTSTK[3]);
if($matk3[0]==""){

}else{
    $html_title .= "TK " . $matk3[0];
}
    $html_title .= '</td>
    <th width="70px" STYLE="border:0.5px solid #000;" >';
    $matk4 = array_keys($DATADSKHAUHAOTSTK[4]);
if($matk4[0]==""){

}else{
    $html_title .= "TK " . $matk4[0];
}
    $html_title .= '</td>
    <th width="70px" STYLE="border:0.5px solid #000;" >';
    $matk5 = array_keys($DATADSKHAUHAOTSTK[5]);
    if($matk5[0]==""){

    }else{
        $html_title .= "TK " . $matk5[0];
    }
    $html_title .= '</td>
  </tr>
  </thead>
  ';
$sott = 0;
$tongdoanhthu = 0;
$tongthue = 0;
foreach ($DATADSKHAUHAOTS as $itemCT) {
	$indam="";
    if (number_format($itemCT["nguyengia"]) != 0){
        $sott++;
    if ($itemCT['matscha'] == "0") {
        $nguyengia += $itemCT["nguyengia"];
        $tongsokh += round($itemCT["sokh"]);
		$indam="font-weight:bold;";
    }
    $tongtk0 += $DATADSKHAUHAOTSTK[0][$matk0[0]][$itemCT['mats']];
    $tongtk1 += $DATADSKHAUHAOTSTK[1][$matk1[0]][$itemCT['mats']];
    $tongtk2 += $DATADSKHAUHAOTSTK[2][$matk2[0]][$itemCT['mats']];
    $tongtk3 += $DATADSKHAUHAOTSTK[3][$matk3[0]][$itemCT['mats']];
    $tongtk4 += $DATADSKHAUHAOTSTK[4][$matk4[0]][$itemCT['mats']];
    $tongtk5 += $DATADSKHAUHAOTSTK[5][$matk5[0]][$itemCT['mats']];
    $html_ct .= '
        <tr >
        <td STYLE="border-left:0.5px solid #000;border-right:0.5px solid #000;border-top:0.5px dashed #000;border-bottom:0px dashed #fff;'.$indam.'" align="center">' . $sott . '</td>
        <td STYLE="border-left:0.5px solid #000;border-right:0.5px solid #000;border-top:0.5px dashed #000;border-bottom:0px dashed #fff;'.$indam.'" align="left">' . strtoupper($itemCT["mats"]) . '</td>
        <td STYLE="border-left:0.5px solid #000;border-right:0.5px solid #000;border-top:0.5px dashed #000;border-bottom:0px dashed #fff;'.$indam.'" align="left">' . $itemCT["tents"] . '</td>
        <td STYLE="border-left:0.5px solid #000;border-right:0.5px solid #000;border-top:0.5px dashed #000;border-bottom:0px dashed #fff;'.$indam.'" align="center">';
    $time = ($itemCT["dvt"]);
    $html_ct .= $time;
    $html_ct .= '</td>
        <td STYLE="border-left:0.5px solid #000;border-right:0.5px solid #000;border-top:0.5px dashed #000;border-bottom:0px dashed #fff;'.$indam.'" align="center">' . (number_format($itemCT["tylekh"] != 0) ? number_format($itemCT["tylekh"], 2, ",", ".") : "") . '</td>
        <td STYLE="border-left:0.5px solid #000;border-right:0.5px solid #000;border-top:0.5px dashed #000;border-bottom:0px dashed #fff;'.$indam.'" align="right">' . (number_format($itemCT["nguyengia"] != 0) ? number_format($itemCT["nguyengia"], 0, ",", ".") : "") . '</td>
        <td STYLE="border-left:0.5px solid #000;border-right:0.5px solid #000;border-top:0.5px dashed #000;border-bottom:0px dashed #fff;'.$indam.'" align="right">' . (number_format($itemCT["sokh"] != 0) ? number_format($itemCT["sokh"], 0, ",", ".") : "") . '</td>
        <td STYLE="border-left:0.5px solid #000;border-right:0.5px solid #000;border-top:0.5px dashed #000;border-bottom:0px dashed #fff;'.$indam.'" align="right">' . (number_format($DATADSKHAUHAOTSTK[0][$matk0[0]][$itemCT[mats]] != 0) ? number_format($DATADSKHAUHAOTSTK[0][$matk0[0]][$itemCT[mats]], 0, ",", ".") : "") . '</td>
        <td STYLE="border-left:0.5px solid #000;border-right:0.5px solid #000;border-top:0.5px dashed #000;border-bottom:0px dashed #fff;'.$indam.'" align="right">' . (number_format($DATADSKHAUHAOTSTK[1][$matk1[0]][$itemCT[mats]] != 0) ? number_format($DATADSKHAUHAOTSTK[1][$matk1[0]][$itemCT[mats]], 0, ",", ".") : "") . '</td>
        <td STYLE="border-left:0.5px solid #000;border-right:0.5px solid #000;border-top:0.5px dashed #000;border-bottom:0px dashed #fff;'.$indam.'" align="right">' . (number_format($DATADSKHAUHAOTSTK[2][$matk2[0]][$itemCT[mats]] != 0) ? number_format($DATADSKHAUHAOTSTK[2][$matk2[0]][$itemCT[mats]], 0, ",", ".") : "") . '</td>
        <td STYLE="border-left:0.5px solid #000;border-right:0.5px solid #000;border-top:0.5px dashed #000;border-bottom:0px dashed #fff;'.$indam.'" align="right">' . (number_format($DATADSKHAUHAOTSTK[3][$matk3[0]][$itemCT[mats]] != 0) ? number_format($DATADSKHAUHAOTSTK[3][$matk3[0]][$itemCT[mats]], 0, ",", ".") : "") . '</td>
        <td STYLE="border-left:0.5px solid #000;border-right:0.5px solid #000;border-top:0.5px dashed #000;border-bottom:0px dashed #fff;'.$indam.'" align="right">' . (number_format($DATADSKHAUHAOTSTK[4][$matk4[0]][$itemCT[mats]] != 0) ? number_format($DATADSKHAUHAOTSTK[4][$matk4[0]][$itemCT[mats]], 0, ",", ".") : "") . '</td>
        <td STYLE="border-left:0.5px solid #000;border-right:0.5px solid #000;border-top:0.5px dashed #000;border-bottom:0px dashed #fff;'.$indam.'" align="right">' . (number_format($DATADSKHAUHAOTSTK[5][$matk5[0]][$itemCT[mats]] != 0) ? number_format($DATADSKHAUHAOTSTK[5][$matk5[0]][$itemCT[mats]], 0, ",", ".") : "") . '</td>
      </tr>
    ';
}
}


$html = '
<table width="100%" border="0" cellspacing="1" cellpadding="1">
  <tr>
    <td>
      <table width="100%" border="0" STYLE="font-weight: bold ">
        <tr>
          <td>' . $_SESSION['TenCongTy'] . '</td>
          <td></td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" STYLE="font-weight: bold;border-bottom:1px solid #000;">
        <tr>
          <td>' . $_SESSION['DiaChi'] . '</td>
          <td align="right">MST: ' . $_SESSION['MST'] . '</td>
        </tr>
    </table></td>
  </tr>
</table>
<table border="0" align="left">
  <tr>
    <td width="70%"><b>' . $_SESSION["THONGTINPHIEU"]['tenphieu'] . '</b></td>
    <td rowspan="2" align="center">
<i>Mẫu số 06 -TSCĐ<br/>
        (Ban hành '.$_SESSION['THONGTUMANG'][$_SESSION['theothongtu']]['thongtu'].' ngày ' . $_SESSION['THONGTUMANG'][$_SESSION['theothongtu']]['ngay'] . '
   của Bộ Tài chính)</i>
    </td>
  </tr>
  <tr>
    <td><b>' . $_SESSION["THONGTINPHIEU"]['ngayhoadon'] . '</b></td>
  </tr>
</table>
<table width="100%" border="0">
  <tr>
    <td align="right"></td>
  </tr>
</table>
<table border="0" cellpadding="2" class="dataTable" cellspacing="0" align="center" valign="middle">' . $html_title . $html_ct . '
<tr>
    <td STYLE="border:0.5px solid #000;"></td>
    <td STYLE="border:0.5px solid #000;"></td>
    <td STYLE="border:0.5px solid #000;" align="right"><b>Tổng cộng</b></td>
    <td STYLE="border:0.5px solid #000;"></td>
    <td STYLE="border:0.5px solid #000;"></td>
    <td STYLE="border:0.5px solid #000;" align="right"><b>' . number_format($nguyengia, 0, ",", ".") . '</b></td>
    <td STYLE="border:0.5px solid #000;"  align="right"><b>' . number_format($tongsokh, 0, ",", ".") . '</b></td>
  
    <td align="right" STYLE="border:0.5px solid #000;"><b>' . (number_format($tongtk0 != 0) ?number_format($tongtk0, 0, ",", "."):"") . '</b></td>
    <td align="right" STYLE="border:0.5px solid #000;"><b>' . (number_format($tongtk1 != 0) ?number_format($tongtk1, 0, ",", "."):"") . '</b></td>
    <td align="right" STYLE="border:0.5px solid #000;"><b>' . (number_format($tongtk2 != 0) ?number_format($tongtk2, 0, ",", "."):"") . '</b></td>
    <td align="right" STYLE="border:0.5px solid #000;"><b>' . (number_format($tongtk3 != 0) ?number_format($tongtk3, 0, ",", "."):"") . '</b></td>
    <td align="right" STYLE="border:0.5px solid #000;"><b>' . (number_format($tongtk4 != 0) ?number_format($tongtk4, 0, ",", "."):"") . '</b></td>
    <td align="right" STYLE="border:0.5px solid #000;"><b>' . (number_format($tongtk5 != 0) ?number_format($tongtk5, 0, ",", "."):"") . '</b></td>
  </tr>
</table>
<table><tr><td></td></tr></table>
';
echo $html;
$html_foodter = '
<table width="100%" border="0" cellpadding="2">
  <tr>
    <td width="70%">&nbsp;</td>
    <td width="30%" rowspan="2" align="center"><table width="200" border="0">
      <tr>
        <td><em>'.$_SESSION['ThanhPho'].', Ngày ';
$time = strtotime($_SESSION["THONGTINPHIEU"]['ngaylap']);
$html_foodter .= date("d-m-Y", $time);


$html_foodter .= '</em></td>
      </tr>
      <tr>
        <td>Kế toán trưởng</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><table width="200" border="0" cellspacing="2">
      <tr>
        <td align="center"><strong>Người lập phiếu</strong></td>
        </tr>
    </table></td>
  </tr>
</table>
';
echo $html_foodter

?>
    </tbody>
</table>
</body>
</html>

