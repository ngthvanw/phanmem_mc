<?php
session_start();
$DATACIBANRA = $_SESSION['BAOCAO_TK_LP_VLCT'];
$tongsotk = count($DATACIBANRA);
function NB_Format($Number){
	$a = new \NumberFormatter("it-IT", \NumberFormatter::DECIMAL);
	$a->setAttribute(\NumberFormatter::MIN_FRACTION_DIGITS, 0);
	$a->setAttribute(\NumberFormatter::MAX_FRACTION_DIGITS, 5); //Định dạng thập phân cao nhất
	return $a->format($Number);
}
?>
<html>
<head><title>IN BẢNG TIẾT KIỆM - LÃNG PHÍ VL CÔNG TRÌNH</title>


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

        @page {
            size: A4;
            margin-top: 5mm;
            margin-bottom: 5mm;
            margin-left:auto;
            margin-right:auto;
        }

        @media print {
            #Header, #Footer {
                display: none !important;
            }

            .page_break{
                page-break-before:always;
            }
            .no-print, .no-print * {
                display: none !important;
            }
        }
    </style>
    <meta charset="utf-8">
    <script type="text/javascript" src="../../js/jquery.js"></script>
    <script type="text/javascript" src="../../js/jquery.number.min.js"></script>
    <script type="text/javascript" src="../../js/jquery.table2excel.js"></script>
    <script type="text/javascript" language="javascript">
        $(document).ready(function() {
            $('#xuatexcel').click(function(){
                $(".dt-print-view").table2excel({
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
$sodong = 0;
foreach ($DATACIBANRA as $k=>$itemCTCT) {
    $sodong++;
$time_ngaylap = strtotime($_SESSION["THONGTINPHIEU_TKLPVLCT"]['ngaylap']);
$ngaylap = date("d-m-Y", $time_ngaylap);
$html_tt = '<table width="100%" border="0" style="font-size: 13px">
  <tr>
    <td align="center" WIDTH="70%">
    <table border="0" cellspacing="1" cellpadding="1" width="100%">
  <tr>
    <td width="0%">
    </td>
    <td>
      <table width="100%" border="0" >
        <tr>
          <td STYLE="font-weight: bold ">' . $_SESSION['TenCongTy'] . '</td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td>
    </td><td><table width="100%" border="0" STYLE="font-weight: bold">
        <tr>
          <td>MST: ' . $_SESSION['MST'] . '</td>
        </tr>
    </table></td>
  </tr>
</table>
    
</td>    
    <td align="center" WIDTH="10%"><B><h3></h3></B></td>
    <td WIDTH="20%">
    <table border="0">
    
   <tr>
   <td style="font-size: 11px" align="center"><i>Mẫu số 01-1/GTGT<br/>
        (Ban hành kèm theo thông tư số 26/12/2011 của Bộ Tài Chính)</i>
   </td>
</tr>

</table>
    
</td>
  </tr>
</table>

<table border="0" align="center" width="100%" >
  <tr>
    <td align="center"><b>' . $_SESSION["THONGTINPHIEU_TKLPVLCT"]['tenphieu'] . '</b></td>
  </tr>
  <tr>
    <td align="center"><b>' . $_SESSION["THONGTINPHIEU_TKLPVLCT"]['ngayhoadon'] . '</b></td>
  </tr>
  <td align="left"><br/><b>Công trình: </b>' .$k." - ". $itemCTCT['tenct'] . '</td>
  </tr>
</table>
<table width="100%" border="0">
  <tr>
    <td align="right"></td>
  </tr>
</table>
<table width="100%" style="font-size:11px" border="0">
  <tr>
    <td align="right">Đơn vị tiền: <b>Đồng Việt Nam</b></td>
  </tr>
</table>';
echo $html_tt;
?>
<div></div>
<table class="display dataTable" width="100%" border="0" cellspacing="1" cellpadding="1">
    <thead>
    <tr>
        <th rowspan="2">&nbsp;<br/>STT</th>
        <th rowspan="2">&nbsp;<br/>Mã VT</th>
        <th rowspan="2">Tên vật liệu</th>
        <th rowspan="2">ĐVT</th>
        <th align="center" colspan="2">Vật tư theo hóa đơn</th>
        <th colspan="2">Dự toán công trình</th>
        <th colspan="2">Chênh lệch</th>
    </tr>
    <tr>
        <th>Khối lượng</th>
        <th>Thành tiền</th>
        <th>Khối lượng</th>
        <th>Thành tiền</th>
        <th>Khối lượng</th>
        <th>Thành tiền</th>
    </tr>
    <tr>
        <th style="text-align:center;">(1)</th>
        <th style="text-align:center;">(2)</th>
        <th style="text-align:center;">(3)</th>
        <th style="text-align:center;">(4)</th>
        <th style="text-align:center;">(5)</th>
        <th style="text-align:center;">(6)</th>
        <th style="text-align:center;">(7)</th>
        <th style="text-align:center;">(8)</th>
        <th style="text-align:center;">(9)</th>
        <th style="text-align:center;">(10)</th>
    </tr>
    </thead>
    <?php
    $sott = 0;
    $html_ct = '';
    $tongsoluongdutru=0;
    $tongthanhtiendutru=0;
    $tongsoluongxuat=0;
    $tongthanhtienxuat=0;
    $tongtienchenlech = 0;
    $tongsoluongchenlech = 0;
    $tongthanhtienchenlech = 0;
    foreach ($itemCTCT['chitiet'] as $itemCT) {
        $sott++;
        $tongsochenhlech = $itemCT["soluongthucnhap"]-$itemCT["soluongdutru"];
        $html_ct .= '
        <tr >
        <td width="20px" class="td_first" align="center" >' . $sott . '</td>
        <td width="60px" class="td_first" align="center" >' . $itemCT["mavt"] . '</td>
        <td width="300px" class="td_center">' . ($itemCT["tenvt"]) . '</td>
        <td width="60px" class="td_center" align="center" >' . $itemCT["dvt"] . '</td>
        <td width="80px" class="td_center" align="right" >' . (($itemCT["soluongthucnhap"] != 0) ? NB_Format($itemCT["soluongthucnhap"]):"") . '</td>
        <td width="125px" class="td_center" align="right">' . (($itemCT["thanhtienthucnhap"] != 0) ? number_format($itemCT["thanhtienthucnhap"],0,",","."):"") . '</td>
        <td width="80px" class="td_center" align="right" >' . (($itemCT["soluongdutru"] != 0) ?NB_Format($itemCT["soluongdutru"]):"") . '</td>
        <td width="125px" class="td_center" style="text-align:right;">' . (($itemCT["thanhtiendutoan"] != 0) ? number_format($itemCT["thanhtiendutoan"], 0, ",", "."):"") . '</td>
        <td width="80px" class="td_center" style="text-align:right;">' . (($tongsochenhlech!= 0) ?NB_Format($tongsochenhlech):"") . '</td>
        <td width="125px" align="right" class="td_end">' . (($itemCT["sotienchenhlech"] != 0) ?number_format($itemCT["sotienchenhlech"], 0, ",", "."):"") . '</td>
      </tr>
    ';
        $tongsoluongdutru+=$itemCT["soluongdutru"];
        $tongthanhtiendutru+=$itemCT["thanhtiendutoan"];
        $tongsoluongxuat+=$itemCT["soluongthucnhap"];
        $tongthanhtienxuat+=$itemCT["thanhtienthucnhap"];
        $tongsoluongchenlech+= $tongsochenhlech;
        $tongthanhtienchenlech+= $itemCT["sotienchenhlech"];
    }
    $html_ct .= '
        <tr >
        <td  class="td_full" align="center" ></td>
        <td  class="td_full" align="center" ></td>
        <td  class="td_full"  style="text-align:right;"><b>TỔNG CỘNG</b></td>
        <td  class="td_full" align="center" ></td>
        <td class="td_full" style="text-align:right;" ><b>' . NB_Format($tongsoluongxuat) . '</b></td>
        <td  class="td_full"  style="text-align:right;"><b>' . number_format($tongthanhtienxuat,0,",",".") . '</b></td>
        <td  class="td_full"  style="text-align:right;" ><b>' . NB_Format($tongsoluongdutru) . '</b></td>
        <td  class="td_full" style="text-align:right;"><b>' . number_format($tongthanhtiendutru,0,",",".") . '</b></td>
        <td  class="td_full" style="text-align:right;"><b>' . NB_Format($tongsoluongchenlech) . '</b></td>
        <td  align="left" style="text-align:right;" class="td_full"><b>';
        $html_ct.=number_format($tongthanhtienchenlech, 0, ",", ".");
    $html_ct.='</b></td>
      </tr>
    ';
    echo $html_ct;
    $html_foodter = '<table width="100%" border="0" cellpadding="2">
  <tr>
    <td width="70%">&nbsp;</td>
    <td width="30%" rowspan="2" align="center"><table width="400" border="0">
      <tr>
        <td align="center"><em>'.$_SESSION["ThanhPho"].' Ngày ';
    $time = strtotime($_SESSION["THONGTINPHIEU_TKLPVLCT"]['ngaylap']);
    $html_foodter .= date("d-m-Y", $time);


    $html_foodter .= '</em></td>
      </tr>
      <tr>
        <td align="center"><strong>Người lập phiếu</strong></td>
      </tr>
      <tr>
        <td align="center"><strong></strong></td>
      </tr>
      <tr>
        <td align="center"><em></em></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><table width="400" border="0" cellspacing="2">
      <tr>
        <td align="center"></td>
        </tr>
      <tr>
        <td>&nbsp;</td>
        </tr>
      <tr>
        <td  align="center"><strong>Kế toán viên</strong></td>
        </tr>
      <tr>
        <td><input style="border:0px solid #000;width:157px;" type="text" value="" /> <input style="border:0px solid #000;width:160px;font-weight:bold;" type="text" value="" /></td>
        </tr>
    </table></td>
  </tr>
</table>';
    echo $html_foodter;

    ?>
</table>
<?php
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