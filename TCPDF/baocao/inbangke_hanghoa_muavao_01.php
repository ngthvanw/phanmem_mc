<?php
session_start();
$DATACIBANRA = $_SESSION["LISTCTMUAVAO"];
$loaibangke = $_GET['loaibangke'];
$display = "";
if($_SESSION['Level']!=1 && $_SESSION['Level']!=2){
    $display="display: none;";
}
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
$time_ngaylap = strtotime($_SESSION["THONGTINPHIEU"]['ngaylap']);
$ngaylap = date("d-m-Y", $time_ngaylap);
$html_tt = '<table width="100%" border="0" style="font-size:13px;">
  <tr>
    <td align="center" WIDTH="20%"></td>    
    <td align="center" WIDTH="60%"><B><h3>PHỤ LỤC</h3></B></td>
    <td WIDTH="20%">
    <table border="0" style="font-size:11px;">
    
   <tr>
   <td align="center"><i>Mẫu số: 01 -4a/GTGT<br/>
        (Ban hành '.$_SESSION['THONGTUMANG'][$_SESSION['theothongtu']]['thongtu'].' ngày ' . $_SESSION['THONGTUMANG'][$_SESSION['theothongtu']]['ngay'] . '
   của Bộ Tài chính)
</i>
   </td>
</tr>

</table>
    
</td>
  </tr>
</table>

<table border="0" align="center">
  <tr>
    <td><b>BẢNG KÊ MUA HÀNG CỦA TỔ CHỨC CÁ NHÂN KHÔNG KINH DOANH</b></td>
  </tr>
  <tr>
    <td><b>(Kèm theo tờ khai thuế GTGT mẫu số 01/GTGT ngày ' . $ngaylap . ')</b></td>
  </tr>
  <tr>
    <td><b>[01] Kỳ tính thuế: ' . $_SESSION["THONGTINPHIEU"]['ngayhoadon'] . '</b></td>
  </tr>';
if ($loaibangke == 0) {
    $html_tt .= '<tr>
    <td><b>Loại bảng kê: Bổ sung</b></td>
  </tr>';
}
$html_tt .= '
</table>
<table border="0" cellspacing="0" cellpadding="0" width="100%" >
  <tr>
    <td width="17%">[02] Tên người nộp thuế:
    </td>
    <td>
      <table width="100%" border="0" >
        <tr>
          <td STYLE="border-bottom:0.5px dashed  #000;font-weight: bold" >' . $_SESSION['TenCongTy'] . '</td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td>[03] Mã số thuế: 
    </td><td><table width="100%" border="0" STYLE="border-bottom:0.5px dashed  #000;font-weight: bold">
        <tr>
          <td>' . $_SESSION['MST'] . '</td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td>[04] Tên đại lý thuế(nếu có): 
    </td><td><table width="100%" >
        <tr>
          <td STYLE="border-bottom:0.5px dashed #000;font-weight: bold">
          <input style="border:0px solid #000;width:700px;font-weight:bold;" type="text" value="';
if ($_SESSION['thietlapdailythue'] == 1) {
    $html_tt .= $_SESSION['txt_tencongtydaily'];
}
$html_tt .= '" /></td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td>[05] Mã số thuế: 
    </td><td><table width="100%" >
        <tr>
          <td STYLE="border-bottom:0.5px dashed #000;font-weight: bold">
          <input style="border:0px solid #000;width:700px;font-weight:bold;" type="text" value="';
if ($_SESSION['thietlapdailythue'] == 1) {
    $html_tt .= $_SESSION['txt_masothue_daily'];
}
$html_tt .= '" /></td>
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
    <td align="right" style="font-size:11px;">Đơn vị tiền: <b>Đồng Việt Nam</b></td>
  </tr>
</table>';
echo $html_tt;
?>
<div></div>
<table class="display dataTable" width="100%" cellspacing="1" cellpadding="1">
    <thead>
    <tr>
        <th STYLE="border:0.5px solid #000;" width="20px" rowspan="2">&nbsp;<br/>STT</th>
        <th STYLE="border:0.5px solid #000;" colspan="3">Hóa đơn, chứng từ, biên lai nộp thuế</th>
        <th STYLE="border:0.5px solid #000;" width="150px" rowspan="2">&nbsp;<br/>Tên người bán</th>
        <th STYLE="border:0.5px solid #000;" width="110px" rowspan="2">CMND</th>
        <th STYLE="border:0.5px solid #000;" width="160px" rowspan="2">&nbsp;<br/>Mặt hàng</th>
        <th STYLE="border:0.5px solid #000;" rowspan="2" width="50px">ĐVT</th>
        <th width="60px" STYLE="border:0.5px solid #000;" rowspan="2">Số lượng</th>
        <th STYLE="border:0.5px solid #000;" width="80px" rowspan="2">Đơn giá</th>
        <th width="100px" STYLE="border:0.5px solid #000;" rowspan="2">Thành tiền</th>
    </tr>
    <tr>
        <th STYLE="border:0.5px solid #000;" width="65px">Ký hiệu hóa đơn</th>
        <th STYLE="border:0.5px solid #000;" width="70px">Số hóa đơn</th>
        <th STYLE="border:0.5px solid #000;" width="70px">Ngày tháng năm phát hành</th>
    </tr>
    <tr>
        <th STYLE="border:0.5px solid #000;text-align:center;">(1)</th>
        <th STYLE="border:0.5px solid #000;text-align:center;">(2)</th>
        <th STYLE="border:0.5px solid #000;text-align:center;">(3)</th>
        <th STYLE="border:0.5px solid #000;text-align:center;">(4)</th>
        <th STYLE="border:0.5px solid #000;text-align:center;">(5)</th>
        <th STYLE="border:0.5px solid #000;text-align:center;">(6)</th>
        <th STYLE="border:0.5px solid #000;text-align:center;">(7)</th>
        <th STYLE="border:0.5px solid #000;text-align:center;">(8)</th>
        <th STYLE="border:0.5px solid #000;text-align:center;">(9)</th>
        <th STYLE="border:0.5px solid #000;text-align:center;">(10)</th>
        <th STYLE="border:0.5px solid #000;text-align:center;">(11)</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $sott = 0;
    $tongdoanhthu = 0;
    $tongthue = 0;
    foreach ($DATACIBANRA as $k => $itemTS) {
        $html_ct .= '<tr><td STYLE="border:0.5px solid #000;font-size: 15px" colspan="11" align="left"><i><b>';
        if ($k == 1) {
            $html_ct .= "Hàng hóa dịch vụ riêng cho SXKD chịu thuế GTGT và sử dụng cho các hoạt động cung cấp hàng hóa, dịch vụ không kê khai, nộp thuế GTGT đủ điều kiện khấu trừ thuế:";
        } else if ($k == 2) {
            $html_ct .= "Hàng hóa, dịch vụ không đủ điều kiện khấu trừ:";
        } else {
            $html_ct .= "Hàng hóa, dịch vụ dùng chung cho SXKD chịu thuế và không chịu thuế đủ điều kiện khấu trừ:";
        }
        $html_ct .= '</b></i></td></tr>';
        $tongtienloaihanghoa = 0;
        $tongthueloaihanghoa = 0;
        foreach ($itemTS as $itemCT) {
            $sott++;
            $tongdoanhthu += $itemCT["thanhtien"];
            $tongtienloaihanghoa += $itemCT["thanhtien"];
            $tongthue += $itemCT["thue"];
            $tongthueloaihanghoa += $itemCT["thue"];
            $time_thanhtoan = strtotime($itemCT["ngaythanhtoan"]);
            $ngaythanhtoan = "";
            if ($time_thanhtoan != "") {
                $ngaythanhtoan = date("d-m-Y", $time_thanhtoan);
            }
            $html_ct .= '
        <tr >
        <td class="td_first" align="center" >' . $sott . '</td>
        <td class="td_center" >' . strtoupper($itemCT["seri"]) . '</td>
        <td class="td_center" >' . $itemCT["sct"] . '</td>
        <td class="td_center" >';
            $time = strtotime($itemCT["ngayhoadon"]);
            $html_ct .= date("d-m-Y", $time);
            $html_ct .= '</td>
        <td class="td_center"  align="left">' . $itemCT["tenkh"] . '</td>
        <td class="td_center" ></td>
        <td class="td_center"  align="left">' . $itemCT["tenvt"] . '</td>
        <td class="td_center" align="center" >' . $itemCT["dvt"] . '</td>
        <td class="td_center" align="right" >' . number_format($itemCT["soluongnhap"], 3, ",", ".") . '</td>
        <td class="td_center" align="right" >' . number_format($itemCT["donggianhap"], 3, ",", ".") . '</td>
        <td class="td_end"  align="right">' . number_format($itemCT["thanhtien"], 0, ",", ".") . '</td>
      </tr>
    ';
        }
        $html_ct .= '
        <tr >
        <td class="td_full" align="center" ></td>
        <td class="td_full" ></td>
        <td class="td_full" ></td>
        <td class="td_full" >';
        $html_ct .= '</td>
        <td class="td_full"  align="left"><b><i>Tổng &nbsp;&nbsp;</i></b></td>
        <td class="td_full" ></td>
        <td class="td_full"  align="left" style="text-align: right" ></td>
        <td class="td_full" align="right" style="text-align: right" ></td>
        <td class="td_full" align="center" ></td>
        <td class="td_full" align="right" style="text-align: right" ><b><i></i></b></td>
        <td class="td_full" STYLE="text-align: right"><b><i>' . number_format($tongtienloaihanghoa, 0, ",", ".") . '</i></b></td>
      </tr>
    ';
    }
    $html_ct .= '<tr>
    <td class="td_full" colspan="7" STYLE="border:0.5px solid #000;"><b>Tổng cộng</b></td>
    <td class="td_full" align="right" STYLE="border:0.5px solid #000;text-align:right;"><b></b></td>
    <td class="td_full" STYLE="border:0.5px solid #000;"></td>
    <td class="td_full" align="right" STYLE="border:0.5px solid #000;text-align:right;"><b></b></td>
    <td class="td_full" STYLE="border:0.5px solid #000;" ></td>
  </tr>
</table>';
    echo $html_ct;
    $html_sum = '<table width="700" class="page_break" border="0">
  <tr>
    <td width="280"><strong>Tổng doanh thu hàng hóa, dịch vụ mua vào:</strong></td>
    <td width="70" align="right"><b>' . number_format($tongdoanhthu, 0, ",", ".") . '</b></td>
  </tr>
  <tr>
    <td><strong>Tổng thuế GTGT của hàng hóa, dịch vụ mua vào:</strong></td>
    <td align="right"><b>' . number_format($tongthue, 0, ",", ".") . '</b></td>
  </tr>
  <tr>
    <td colspan="2">Tôi cam đoan số liệu khai trên là đúng và chịu trách nhiệm trước pháp luật về số liệu đã khai ./.</td>
  </tr>
</table>';
    $html_foodter = '<table width="100%" border="0" class="page_break" cellpadding="2">
  <tr>
    <td width="70%">&nbsp;</td>
    <td width="30%" rowspan="2" align="center"><table width="400" border="0">
      <tr>
        <td align="center"><em>'.$_SESSION['ThanhPho'].' Ngày ';
    $time = strtotime($_SESSION["THONGTINPHIEU"]['ngaylap']);
    $html_foodter .= date("d-m-Y", $time);


    $html_foodter .= '</em></td>
      </tr>
      <tr>
        <td align="center"><strong>NGƯỜI NỘP THUẾ hoặc</strong></td>
      </tr>
      <tr>
        <td align="center"><strong>ĐẠI DIỆN HỢP PHÁP CỦA NGƯỜI NỘP THUẾ</strong></td>
      </tr>
      <tr>
        <td align="center"><em>(Ký ghi rõ họ tên: chức vụ và đóng dấu (nếu có))</em></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><table width="400" border="0" cellspacing="2">
      <tr>
        <td align="center"><strong><input style="border:0px" type="text" value="Nhân viên đại lý thuế" /></strong></td>
        </tr>
      <tr>
        <td>&nbsp;</td>
        </tr>
     <tr>
        <td><input style="border:0px solid #000;width:65px;" type="text" value="Họ và tên:" /><input style="border:0px solid #000;width:160px;font-weight:bold;" type="text" value="';
    if ($_SESSION['thietlapdailythue'] == 1) {
        $html_foodter .= $_SESSION['txt_hovatendaily'];
    }
    $html_foodter .= '" /></td>
        </tr>
      <tr>
        <td><input style="border:0px solid #000;width:157px;" type="text" value="Chứng chỉ hành nghề số:" />
        <input style="border:0px solid #000;width:160px;font-weight:bold;" type="text" value="';
    if ($_SESSION['thietlapdailythue'] == 1) {
        $html_foodter .= $_SESSION['txt_chungchindaily'];
    }
    $html_foodter .= '" /></td>
        </tr>
    </table></td>
  </tr>
</table>
<div style=" '.$display.'" class="no-print ketquaduyetsocai kequa_'.$k_matk.'" >
<table width="100%" border="1" >
        <tr>
            <th style="text-align: center;" colspan="7"><b>DANH SÁCH DUYỆT BẢNG KÊ</b></th>
        </tr>
        <tr>
            <th style="text-align: center;" colspan="7"><a style="cursor: pointer" data-name="1" class="ketquatrave">Xem chi tiết duyệt</a></th>
        </tr>
        <tr>
            <th style="text-align: center;" width="5px">STT</th>
            <th style="text-align: center;" width="15px">Loại BK</th>
            <th style="text-align: center;" width="120px">Thời gian</th>
            <th style="text-align: center;" width="50px">Tổng tiền</th>
            <th style="text-align: center;" width="50px">Tổng thuế</th>
            <th style="text-align: center;" width="70px">Ngày duyệt</th>
            <th style="text-align: center;" width="30px">Người duyệt</th>
        </tr>
    </table>
    </div>
';

    echo $html_sum;
    echo $html_foodter;
    ?>
    </tbody>
</table>
</body>
</html>