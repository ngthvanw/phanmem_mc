<?php
session_start();
require_once('tcpdf_include.php');
$DATADSKHAUHAOTS = $_SESSION['DSKHAUHAOTAISAN'];
$DATADSKHAUHAOTSTHANG = $_SESSION['DSKHAUHAOTAISANTHANG'];
$denthang = $_GET['denthang'];
?>
<html>
<head><title>Bảng kê tài sản  (Nhấn CTRL + P để in , ALT + F4 để thoát)</title>

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
        body{
            width: 297mm;
        }
        .page_break{
            page-break-before: always;
        }
        @page {
            size: A4 landscape;
            margin-top: 5mm;
            margin-bottom: 10mm;
            margin-left: 5mm;
            margin-right: 6mm;

        }


        @media print {
            #Header, #Footer { display: none !important; }
            .no-print, .no-print * {
                display: none !important;
            }

        }

        #Header, #Footer { display: none !important; }
        @media print
        {
            p.bodyText {font-family:times,georgia, serif;}
        }
    </style>
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
                $cof = confirm("CHÚ Ý!! \nBạn đang chuẩn bị duyệt TK: "+$arr_tk[0]+" "+$arr_tk[1]+ " có số dư: "+$.number($arr_tk[2],0,".",",")+".\n Bạn có muốn tiếp tục không?");
                if($cof){
                    $.ajax({
                        url: '../../modules/phieukiemtra/add_duyettksocai.php',
                        type: 'POST',
                        dataType: 'php',
                        data: {
                            matk:$arr_tk[0],
                            tungay_denngay: $arr_tk[1],
                            sodu:$arr_tk[2]
                        }
                    }).done(function() {
                    });
                    loadListDuyetSoCai($arr_tk[0]);
                }
            });
            function loadListDuyetSoCai($matk) {
                $(".ketquaduyetsocai").load("../../modules/phieukiemtra/list_duyettksocai.php?matk="+$matk);
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
                        url: '../../modules/phieukiemtra/del_duyettksocai.php',
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
    <meta charset="utf-8">
</head>
<body class="dt-print-view">
<table style="background-color: #00c6ff;" width="100%" class="no-print">
    <tr>
        <td><input type="button" style="color: #0000CC;font-weight: bold;border: 2px solid red;" value="Xuất excel" id="xuatexcel"></td>
        <td></td>
    </tr>
</table>
<?php
$html_ct = "";
$html_title = '
<thead>
  <tr>
    <th colspan="10"  style="border: 0px" width="640px"></th>
    <th STYLE="border:0.5px solid #000;"  colspan="2" width="90px" >Đầu năm</th>
  </tr>
  <tr>
    <th STYLE="border:0.5px solid #000;" width="20px" rowspan="1">STT</th>
    <th STYLE="border:0.5px solid #000;" width="60px" rowspan="1">Mã số</th>
    <th STYLE="border:0.5px solid #000;" width="320px" rowspan="1">Tên chi phí</th>
    <th STYLE="border:0.5px solid #000;" width="90px" rowspan="1">Ngày sử dụng</th>
    <th STYLE="border:0.5px solid #000;" width="50px" rowspan="1">ĐVT</th>
    <th  STYLE="border:0.5px solid #000;" width="50px" rowspan="1">Số lượng</th>
    <th  STYLE="border:0.5px solid #000;" width="100px" rowspan="1">Giá mua</th>
    <th STYLE="border:0.5px solid #000;" width="55px" >';
$html_title .= "TK -CP ";
$html_title .= '</td>
    <th STYLE="border:0.5px solid #000;" width="55px">';
$html_title .= "TK - Có";
$html_title .= '</td>
    <th STYLE="border:0.5px solid #000;" width="55px" >';
$html_title .= "Số tháng ";
$html_title .= '</td>
    <th STYLE="border:0.5px solid #000;" width="50px">';
$html_title .= " Số tháng PB còn lại ";
$html_title .= '</td>
    <th STYLE="border:0.5px solid #000;" width="100px" >';
$html_title .= "giá trị còn lại";
$html_title .= '</td>
  </tr>
  </thead>
';
$sott = 0;
$tonggiamuadk = 0;
$tonggtconlaidk = 0;
$gtconlai= 0;
foreach ($DATADSKHAUHAOTS as $itemCT) {
    $indam = "";
    // if (number_format($itemCT["nguyengia"]) != 0) {
    $sott++;
    if ($itemCT['matscha'] == "0") {
        $tongsokh += $itemCT["sokh"];
        $indam = "font-weight:bold;";
    }
    $nguyengiatrongky = 0;
    if ($itemCT['trongky'] == 1) {
        $nguyengiatrongky = $itemCT["nguyengia"];
        $tonggiamuadk += $itemCT["nguyengia"];
		$gtconlai = 0;
    }else{
		$gtconlai=$itemCT["gtconlai"];
	}

    $tonggtconlaidk += $gtconlai;

    $html_ct .= '
        <tr >
        <td align="center" STYLE="border-left:0.5px solid #000;border-right:0.5px solid #000;border-top:0.5px dashed #000;border-bottom:0px dashed #fff;' . $indam . '" >' . $sott . '</td>
        <td STYLE="border-left:0.5px solid #000;border-right:0.5px solid #000;border-top:0.5px dashed #000;border-bottom:0px dashed #fff;' . $indam . '" align="left">' . strtoupper($itemCT["mats"]) . '</td>
        <td STYLE="border-left:0.5px solid #000;border-right:0.5px solid #000;border-top:0.5px dashed #000;border-bottom:0px dashed #fff;' . $indam . '" align="left">' . $itemCT["tents"] . '</td>
        <td STYLE="border-left:0.5px solid #000;border-right:0.5px solid #000;border-top:0.5px dashed #000;border-bottom:0px dashed #fff;' . $indam . '" align="center">';
    $time = date("d-m-Y", strtotime($itemCT["ngaysd"]));
    if (strtotime($itemCT["ngaysd"]) == "") {
        $html_ct .= "";
    } else {
        $html_ct .= $time;
    }
    $html_ct .= '</td>
        <td STYLE="border-left:0.5px solid #000;border-right:0.5px solid #000;border-top:0.5px dashed #000;border-bottom:0px dashed #fff;' . $indam . '" align="center">' . $itemCT["dvt"] . '</td>
        <td STYLE="border-left:0.5px solid #000;border-right:0.5px solid #000;border-top:0.5px dashed #000;border-bottom:0px dashed #fff;' . $indam . '" align="center">' . (number_format($itemCT["soluong"] != 0) ? number_format($itemCT["soluong"], 0, ",", ".") : "") . '</td>
        <td STYLE="border-left:0.5px solid #000;border-right:0.5px solid #000;border-top:0.5px dashed #000;border-bottom:0px dashed #fff;' . $indam . '" align="right">' . (number_format($nguyengiatrongky != 0) ? number_format($nguyengiatrongky, 0, ",", ".") : "") . '</td>
        <td STYLE="border-left:0.5px solid #000;border-right:0.5px solid #000;border-top:0.5px dashed #000;border-bottom:0px dashed #fff;' . $indam . '" align="center">' . $itemCT["tkno"] . '</td>
        <td STYLE="border-left:0.5px solid #000;border-right:0.5px solid #000;border-top:0.5px dashed #000;border-bottom:0px dashed #fff;' . $indam . '" align="center">' . $itemCT["tkco"] . '</td>
        <td STYLE="border-left:0.5px solid #000;border-right:0.5px solid #000;border-top:0.5px dashed #000;border-bottom:0px dashed #fff;' . $indam . '" align="center">' . $itemCT["sothangdk"] . '</td>
        <td STYLE="border-left:0.5px solid #000;border-right:0.5px solid #000;border-top:0.5px dashed #000;border-bottom:0px dashed #fff;' . $indam . '" align="center">' . (number_format($itemCT["sothangconlaidk"] != 0) ? number_format($itemCT["sothangconlaidk"], 0, ",", ".") : "") . '</td>
        <td STYLE="border-left:0.5px solid #000;border-right:0.5px solid #000;border-top:0.5px dashed #000;border-bottom:0px dashed #fff;' . $indam . '" align="right">' . (number_format($gtconlai != 0) ? number_format($gtconlai, 0, ",", ".") : "") . '</td>
      </tr>
    ';
    //}
}


$html = '
<table  width="100%" border="0" cellspacing="1" cellpadding="1">
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
<table width="100%" border="0" align="left">
  <tr>
    <td width="75%"><b>' . $_SESSION["THONGTINPHIEU"]['tenphieu'] . '</b></td>
    <td rowspan="2" align="center">
<i>Mẫu số 06 -TSCĐ<br/>
        (Ban hành '.$_SESSION['THONGTUMANG'][$_SESSION['theothongtu']]['thongtu'].' ngày '.$_SESSION['THONGTUMANG'][$_SESSION['theothongtu']]['ngay'].' của Bộ Tài Chính)</i>
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
<table border="0" class="dataTable" cellpadding="2" cellspacing="0" align="center" valign="middle">' . $html_title . $html_ct . '
<tr>
    <td STYLE="border:0.5px solid #000;"></td>
    <td STYLE="border:0.5px solid #000;"></td>
    <td STYLE="border:0.5px solid #000;" align="right"><b>Tổng cộng</b></td>
    <td STYLE="border:0.5px solid #000;"></td>
    <td STYLE="border:0.5px solid #000;"></td>
    <td STYLE="border:0.5px solid #000;" align="right"></td>
    <td STYLE="border:0.5px solid #000;"  align="right"><b>' . number_format($tonggiamuadk, 0, ",", ".") . '</b></td>
  
    <td align="right" STYLE="border:0.5px solid #000;"></td>
    <td align="right" STYLE="border:0.5px solid #000;"></td>
    <td align="right" STYLE="border:0.5px solid #000;"></td>
    <td align="right" STYLE="border:0.5px solid #000;"></td>
    <td align="right" STYLE="border:0.5px solid #000;"><b>' . (number_format($tonggtconlaidk, 0, ",", ".")) . '</b></td>
  </tr>
</table>
<table><tr><td></td></tr></table>
';
echo $html;
?>
<table style="margin-top: 50px;margin-bottom: 50px; border-bottom: 1px solid black;"  width="100%" class="no-print"><tr><td></td></tr></table>
<table  width="100%" class="page_break"><tr><td></td></tr></table>
<?php
$html_foodter = '
<table width="100%" border="0" cellpadding="2">
  <tr>
    <td width="70%">&nbsp;</td>
    <td width="30%" rowspan="2" align="center"><table width="200" border="0">
      <tr>
        <td><em>'.$_SESSION['ThanhPho'].' Ngày ';
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
//  từ tháng 1 đến tháng 12
//$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

$html_ct = "";
$html_title = '
<thead>
  <tr>
    <th colspan="14" style="border: 0px" width="620px"></th>
    <th STYLE="border:0.5px solid #000;"  colspan="3" width="190px" >Cuối năm</th>
  </tr>
  <tr>
    <th STYLE="border:0.5px solid #000;" width="20px" rowspan="1"> STT</th>
    <th STYLE="border:0.5px solid #000;" width="60px" rowspan="1">Tháng 1</th>
    <th STYLE="border:0.5px solid #000;" width="60px" rowspan="1">Tháng 2</th>
    <th STYLE="border:0.5px solid #000;" width="60px" rowspan="1">Tháng 3</th>
    <th STYLE="border:0.5px solid #000;" width="60px" rowspan="1">Tháng 4</th>
    <th  STYLE="border:0.5px solid #000;" width="60px" rowspan="1">Tháng 5</th>
    <th  STYLE="border:0.5px solid #000;" width="60px" rowspan="1">Tháng 6</th>
    <th STYLE="border:0.5px solid #000;" width="60px" >';
$html_title .= "Tháng 7 ";
$html_title .= '</td>
    <th STYLE="border:0.5px solid #000;" width="60px">';
$html_title .= "Tháng 8";
$html_title .= '</td>
    <th STYLE="border:0.5px solid #000;" width="60px" >';
$html_title .= "Tháng 9 ";
$html_title .= '</td>
    <th STYLE="border:0.5px solid #000;" width="60px">';
$html_title .= " Tháng 10 ";
$html_title .= '</td>
    <th STYLE="border:0.5px solid #000;" width="60px" >';
$html_title .= "Tháng 11";
$html_title .= '</td>
    <th STYLE="border:0.5px solid #000;" width="60px" >';
$html_title .= "Tháng 12";
$html_title .= '</td>
<th STYLE="border:0.5px solid #000;" width="80px" >';
$html_title .= "Cả năm";
$html_title .= '</td>
    <th STYLE="border:0.5px solid #000;" width="80px" rowspan="1">Hao mòn lũy kế</th>
    <th  STYLE="border:0.5px solid #000;" width="20px" rowspan="1">Số PB CK</th>
    <th  STYLE="border:0.5px solid #000;" width="80px" rowspan="1">Giá trị còn lại</th>
  </tr>
  </thead>
';
$sott = 0;
$tongdoanhthu = 0;
$tongthue = 0;
$tonggtconlai = 0;
$tongcanam = 0;
foreach ($DATADSKHAUHAOTS as $itemCT) {
    $indam = "";
    //if (number_format($itemCT["nguyengia"]) != 0) {
    $sott++;
    if ($itemCT['matscha'] == "0") {
        //$tonggiamuadk += $itemCT["nguyengia"];
        // $tongsokh += $itemCT["sokh"];
        //$tonggtconlaidk+=$itemCT["gtconlai"];
        $indam = "font-weight:bold;";
    }
    $tongthang1 += $DATADSKHAUHAOTSTHANG[$itemCT["mats"]][1]['sokh'];
    $tongthang2 += $DATADSKHAUHAOTSTHANG[$itemCT["mats"]][2]['sokh'];
    $tongthang3 += $DATADSKHAUHAOTSTHANG[$itemCT["mats"]][3]['sokh'];
    $tongthang4 += $DATADSKHAUHAOTSTHANG[$itemCT["mats"]][4]['sokh'];
    $tongthang5 += $DATADSKHAUHAOTSTHANG[$itemCT["mats"]][5]['sokh'];
    $tongthang6 += $DATADSKHAUHAOTSTHANG[$itemCT["mats"]][6]['sokh'];
    $tongthang7 += $DATADSKHAUHAOTSTHANG[$itemCT["mats"]][7]['sokh'];
    $tongthang8 += $DATADSKHAUHAOTSTHANG[$itemCT["mats"]][8]['sokh'];
    $tongthang9 += $DATADSKHAUHAOTSTHANG[$itemCT["mats"]][9]['sokh'];
    $tongthang10 += $DATADSKHAUHAOTSTHANG[$itemCT["mats"]][10]['sokh'];
    $tongthang11 += $DATADSKHAUHAOTSTHANG[$itemCT["mats"]][11]['sokh'];
    $tongthang12 += $DATADSKHAUHAOTSTHANG[$itemCT["mats"]][12]['sokh'];
    $thangdaphanbo = (($DATADSKHAUHAOTSTHANG[$itemCT["mats"]][1]['sokh']==0)?0:1)+(($DATADSKHAUHAOTSTHANG[$itemCT["mats"]][2]['sokh']==0)?0:1)+(($DATADSKHAUHAOTSTHANG[$itemCT["mats"]][3]['sokh']==0)?0:1)+(($DATADSKHAUHAOTSTHANG[$itemCT["mats"]][4]['sokh']==0)?0:1)+(($DATADSKHAUHAOTSTHANG[$itemCT["mats"]][5]['sokh']==0)?0:1)+(($DATADSKHAUHAOTSTHANG[$itemCT["mats"]][6]['sokh']==0)?0:1)+(($DATADSKHAUHAOTSTHANG[$itemCT["mats"]][7]['sokh']==0)?0:1)+(($DATADSKHAUHAOTSTHANG[$itemCT["mats"]][8]['sokh']==0)?0:1)+(($DATADSKHAUHAOTSTHANG[$itemCT["mats"]][9]['sokh']==0)?0:1)+(($DATADSKHAUHAOTSTHANG[$itemCT["mats"]][10]['sokh']==0)?0:1)+(($DATADSKHAUHAOTSTHANG[$itemCT["mats"]][11]['sokh']==0)?0:1)+(($DATADSKHAUHAOTSTHANG[$itemCT["mats"]][12]['sokh']==0)?0:1);
    $canam = 0;
    //for ($i=1;$i<=$denthang;$i++){
    // if ($i <= $denthang){
    $tonggtconlai += $DATADSKHAUHAOTSTHANG[$itemCT["mats"]][$denthang]['gtconlai'];
    $tonghaomonluyke += $itemCT["nguyengia"] - $DATADSKHAUHAOTSTHANG[$itemCT["mats"]][$denthang]['gtconlai'];
    $canam = $DATADSKHAUHAOTSTHANG[$itemCT["mats"]][1]['sokh'] + $DATADSKHAUHAOTSTHANG[$itemCT["mats"]][2]['sokh'] + $DATADSKHAUHAOTSTHANG[$itemCT["mats"]][3]['sokh'] + $DATADSKHAUHAOTSTHANG[$itemCT["mats"]][4]['sokh'] + $DATADSKHAUHAOTSTHANG[$itemCT["mats"]][5]['sokh'] + $DATADSKHAUHAOTSTHANG[$itemCT["mats"]][6]['sokh'] + $DATADSKHAUHAOTSTHANG[$itemCT["mats"]][7]['sokh'] + $DATADSKHAUHAOTSTHANG[$itemCT["mats"]][8]['sokh'] + $DATADSKHAUHAOTSTHANG[$itemCT["mats"]][9]['sokh'] + $DATADSKHAUHAOTSTHANG[$itemCT["mats"]][10]['sokh'] + $DATADSKHAUHAOTSTHANG[$itemCT["mats"]][11]['sokh'] + $DATADSKHAUHAOTSTHANG[$itemCT["mats"]][12]['sokh'];

    //$sothangpbconlai = $DATADSKHAUHAOTSTHANG[$itemCT["mats"]][$denthang]['sothangdk']-$DATADSKHAUHAOTSTHANG[$itemCT["mats"]][$denthang]['sothangkh'];
    if($DATADSKHAUHAOTS[$itemCT["mats"]]['trongky']==1){
        $sothangpbconlai = $DATADSKHAUHAOTS[$itemCT["mats"]]['sothangdk']-$thangdaphanbo;
    }else{
        $sothangpbconlai = $DATADSKHAUHAOTS[$itemCT["mats"]]['sothangconlaidk']-$thangdaphanbo;
    }

    $giatriconlai = $DATADSKHAUHAOTSTHANG[$itemCT["mats"]][$denthang]['gtconlai'] - $canam;
    $haomonluyke = $DATADSKHAUHAOTSTHANG[$itemCT["mats"]][$denthang]['nguyengia'] - $giatriconlai;

    $tongcanamck += $canam;

    if ($giatriconlai < 0) {
        $giatriconlai = 0;
    }
    $tonggtconlaick += $giatriconlai;
    $tonghaomonluykeck += $haomonluyke;
    //}
    //}

    $html_ct .= '
        <tr >
        <td align="center" STYLE="border-left:0.5px solid #000;border-right:0.5px solid #000;border-top:0.5px dashed #000;border-bottom:0px dashed #fff;' . $indam . '" >' . $sott . '</td>
        <td STYLE="border-left:0.5px solid #000;border-right:0.5px solid #000;border-top:0.5px dashed #000;border-bottom:0px dashed #fff;' . $indam . '" align="right">' . (number_format($DATADSKHAUHAOTSTHANG[$itemCT["mats"]][1]['sokh'] != 0) ? number_format($DATADSKHAUHAOTSTHANG[$itemCT["mats"]][1]['sokh'], 0, ",", ".") : "") . '</td>
        <td STYLE="border-left:0.5px solid #000;border-right:0.5px solid #000;border-top:0.5px dashed #000;border-bottom:0px dashed #fff;' . $indam . '" align="right">' . (number_format($DATADSKHAUHAOTSTHANG[$itemCT["mats"]][2]['sokh'] != 0) ? number_format($DATADSKHAUHAOTSTHANG[$itemCT["mats"]][2]['sokh'], 0, ",", ".") : "") . '</td>
        <td STYLE="border-left:0.5px solid #000;border-right:0.5px solid #000;border-top:0.5px dashed #000;border-bottom:0px dashed #fff;' . $indam . '" align="right">';
    $html_ct .= (number_format($DATADSKHAUHAOTSTHANG[$itemCT["mats"]][3]['sokh'] != 0) ? number_format($DATADSKHAUHAOTSTHANG[$itemCT["mats"]][3]['sokh'], 0, ",", ".") : "");
    $html_ct .= '</td>
        <td STYLE="border-left:0.5px solid #000;border-right:0.5px solid #000;border-top:0.5px dashed #000;border-bottom:0px dashed #fff;' . $indam . '" align="right">' . (number_format($DATADSKHAUHAOTSTHANG[$itemCT["mats"]][4]['sokh'] != 0) ? number_format($DATADSKHAUHAOTSTHANG[$itemCT["mats"]][4]['sokh'], 0, ",", ".") : "") . '</td>
        <td STYLE="border-left:0.5px solid #000;border-right:0.5px solid #000;border-top:0.5px dashed #000;border-bottom:0px dashed #fff;' . $indam . '" align="right">' . (number_format($DATADSKHAUHAOTSTHANG[$itemCT["mats"]][5]['sokh'] != 0) ? number_format($DATADSKHAUHAOTSTHANG[$itemCT["mats"]][5]['sokh'], 0, ",", ".") : "") . '</td>
        <td STYLE="border-left:0.5px solid #000;border-right:0.5px solid #000;border-top:0.5px dashed #000;border-bottom:0px dashed #fff;' . $indam . '" align="right">' . (number_format($DATADSKHAUHAOTSTHANG[$itemCT["mats"]][6]['sokh'] != 0) ? number_format($DATADSKHAUHAOTSTHANG[$itemCT["mats"]][6]['sokh'], 0, ",", ".") : "") . '</td>
        <td STYLE="border-left:0.5px solid #000;border-right:0.5px solid #000;border-top:0.5px dashed #000;border-bottom:0px dashed #fff;' . $indam . '" align="right">' . (number_format($DATADSKHAUHAOTSTHANG[$itemCT["mats"]][7]['sokh'] != 0) ? number_format($DATADSKHAUHAOTSTHANG[$itemCT["mats"]][7]['sokh'], 0, ",", ".") : "") . '</td>
        <td STYLE="border-left:0.5px solid #000;border-right:0.5px solid #000;border-top:0.5px dashed #000;border-bottom:0px dashed #fff;' . $indam . '" align="right">' . (number_format($DATADSKHAUHAOTSTHANG[$itemCT["mats"]][8]['sokh'] != 0) ? number_format($DATADSKHAUHAOTSTHANG[$itemCT["mats"]][8]['sokh'], 0, ",", ".") : "") . '</td>
        <td STYLE="border-left:0.5px solid #000;border-right:0.5px solid #000;border-top:0.5px dashed #000;border-bottom:0px dashed #fff;' . $indam . '" align="right">' . (number_format($DATADSKHAUHAOTSTHANG[$itemCT["mats"]][9]['sokh'] != 0) ? number_format($DATADSKHAUHAOTSTHANG[$itemCT["mats"]][9]['sokh'], 0, ",", ".") : "") . '</td>
        <td STYLE="border-left:0.5px solid #000;border-right:0.5px solid #000;border-top:0.5px dashed #000;border-bottom:0px dashed #fff;' . $indam . '" align="right">' . (number_format($DATADSKHAUHAOTSTHANG[$itemCT["mats"]][10]['sokh'] != 0) ? number_format($DATADSKHAUHAOTSTHANG[$itemCT["mats"]][10]['sokh'], 0, ",", ".") : "") . '</td>
        <td STYLE="border-left:0.5px solid #000;border-right:0.5px solid #000;border-top:0.5px dashed #000;border-bottom:0px dashed #fff;' . $indam . '" align="right">' . (number_format($DATADSKHAUHAOTSTHANG[$itemCT["mats"]][11]['sokh'] != 0) ? number_format($DATADSKHAUHAOTSTHANG[$itemCT["mats"]][11]['sokh'], 0, ",", ".") : "") . '</td>
        <td STYLE="border-left:0.5px solid #000;border-right:0.5px solid #000;border-top:0.5px dashed #000;border-bottom:0px dashed #fff;' . $indam . '" align="right">' . (number_format($DATADSKHAUHAOTSTHANG[$itemCT["mats"]][12]['sokh'] != 0) ? number_format($DATADSKHAUHAOTSTHANG[$itemCT["mats"]][12]['sokh'], 0, ",", ".") : "") . '</td>
        <td STYLE="border-left:0.5px solid #000;border-right:0.5px solid #000;border-top:0.5px dashed #000;border-bottom:0px dashed #fff;' . $indam . '" align="right">' . (number_format($canam != 0) ? number_format($canam, 0, ",", ".") : "") . '</td>
        <td STYLE="border-left:0.5px solid #000;border-right:0.5px solid #000;border-top:0.5px dashed #000;border-bottom:0px dashed #fff;' . $indam . '" align="right">' . (number_format($haomonluyke != 0) ? number_format($haomonluyke, 0, ",", ".") : "") . '</td>
        <td STYLE="border-left:0.5px solid #000;border-right:0.5px solid #000;border-top:0.5px dashed #000;border-bottom:0px dashed #fff;' . $indam . '" align="center">' . (number_format($sothangpbconlai != 0) ? number_format($sothangpbconlai, 0, ",", ".") : "") . '</td>
        <td STYLE="border-left:0.5px solid #000;border-right:0.5px solid #000;border-top:0.5px dashed #000;border-bottom:0px dashed #fff;' . $indam . '" align="right">' . (($giatriconlai != 0) ? number_format($giatriconlai, 0, ",", ".") : "") . '</td>

      </tr>
    ';
    //}
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
    <td width="75%"><b>' . $_SESSION["THONGTINPHIEU"]['tenphieu'] . '</b></td>
    <td rowspan="2" align="center">
<i>Mẫu số 06 -TSCĐ<br/>
        (Ban hành '.$_SESSION['THONGTUMANG'][$_SESSION['theothongtu']]['thongtu'].' ngày '.$_SESSION['THONGTUMANG'][$_SESSION['theothongtu']]['ngay'].' của Bộ Tài Chính)</i>
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
<table border="0" class="dataTable" cellpadding="2" cellspacing="0" align="center" valign="middle">' . $html_title . $html_ct . '
<tr>
    <td STYLE="border:0.5px solid #000;"></td>
    <td STYLE="border:0.5px solid #000;"><b>' . (number_format($tongthang1, 0, ",", ".")) . '</b></td>
    <td STYLE="border:0.5px solid #000;" align="right"><b>' . (number_format($tongthang2, 0, ",", ".")) . '</b></td>
    <td STYLE="border:0.5px solid #000;" align="right"><b>' . (number_format($tongthang3, 0, ",", ".")) . '</b></td>
    <td STYLE="border:0.5px solid #000;" align="right"><b>' . (number_format($tongthang4, 0, ",", ".")) . '</b></td>
    <td STYLE="border:0.5px solid #000;" align="right"><b>' . (number_format($tongthang5, 0, ",", ".")) . '</b></td>
    <td STYLE="border:0.5px solid #000;"  align="right"><b>' . (number_format($tongthang6, 0, ",", ".")) . '</b></td>
  
    <td align="right" STYLE="border:0.5px solid #000;"><b>' . (number_format($tongthang7, 0, ",", ".")) . '</b></td>
    <td align="right" STYLE="border:0.5px solid #000;"><b>' . (number_format($tongthang8, 0, ",", ".")) . '</b></td>
    <td align="right" STYLE="border:0.5px solid #000;"><b>' . (number_format($tongthang9, 0, ",", ".")) . '</b></td>
    <td align="right" STYLE="border:0.5px solid #000;"><b>' . (number_format($tongthang10, 0, ",", ".")) . '</b></td>
    <td align="right" STYLE="border:0.5px solid #000;"><b>' . (number_format($tongthang11, 0, ",", ".")) . '</b></td>
    <td align="right" STYLE="border:0.5px solid #000;"><b>' . (number_format($tongthang12, 0, ",", ".")) . '</b></td>
    <td align="right" STYLE="border:0.5px solid #000;"><b>' . (number_format($tongcanamck, 0, ",", ".")) . '</b></td>
    <td align="right" STYLE="border:0.5px solid #000;"><b>' . (number_format($tonghaomonluykeck, 0, ",", ".")) . '</b></td>
    <td align="right" STYLE="border:0.5px solid #000;"><b></b></td>
    <td align="right" STYLE="border:0.5px solid #000;"><b>' . (number_format($tonggtconlaick, 0, ",", ".")) . '</b></td>
  </tr>
</table>
<table><tr><td></td></tr></table>
';
echo $html;
echo $html_foodter;

?>
</body>
</html>
