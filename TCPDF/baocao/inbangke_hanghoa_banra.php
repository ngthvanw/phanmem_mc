<?php
session_start();
$DATACIBANRACHUADC = $_SESSION["LISTCTBANRA"];
foreach ($DATACIBANRACHUADC as $thuesuat=>$ItemData){
    if($thuesuat=="10" ||$thuesuat=="8") {
        foreach ($ItemData as $itemDuLieu) {
            $Tax = round(($itemDuLieu['thue']/$itemDuLieu['thanhtien'])*100);
            if ($Tax==8){
                $DATACIBANRA[$Tax][] = $itemDuLieu;
            }else{
                $DATACIBANRA[$thuesuat][] = $itemDuLieu;
            }
        }
    }else {
        $DATACIBANRA[$thuesuat] = $ItemData;
    }
}
$loaibangke = $_GET['loaibangke'];
$display = "";
if($_SESSION['Level']!=1 && $_SESSION['Level']!=2){
    $display="display: none;";
}
?>
<html>
<head><title>&nbsp;</title>


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
			margin: 2;
			padding: 2;
        }
        @page {
            size: A4 landscape;
			margin-left: 4mm;
            margin-right: 10mm;
        }
		@page {
            @bottom-right {
                content: counter(page) "/" counter(pages);
            }
            .no-print, .no-print * {
                display: none !important;
            }
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
			$(document).on('click','#xuatexcel',function(e) {
				var result = 'data:application/vnd.ms-excel,' + encodeURIComponent($('.BangInExcel').html());
				var link = document.createElement("a");
				document.body.appendChild(link);
				link.download = "Bang_Ke_Ban_Ra_" + new Date().toISOString().replace(/[\-\:\.]/g, "") + ".xls",
				link.href = result;
				link.click();
			});
                  $('.duyettaikhoan').click(function(){
                $val = this.dataset.name;
                $arr_tk = $val.split("#");
                $cof = confirm("CHÚ Ý!! \nBạn đang chuẩn bị duyệt bảng kê bán ra có tổng tiền: "+$.number($arr_tk[2],0,".",",")+" - tổng thuế: "+$.number($arr_tk[3],0,".",",")+".\n Bạn có muốn tiếp tục không?");
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
<div class="BangInExcel">
<?php
$time_ngaylap = strtotime($_SESSION["THONGTINPHIEU"]['ngaylap']);
$ngaylap=date("d-m-Y",$time_ngaylap);
$html_tt='<table width="100%" border="0" style="font-size: 13px">
 <tr>
    <td colspan="4" align="center" WIDTH="20%"></td>    
    <td colspan="4" align="center" WIDTH="60%"><B><h3>PHỤ LỤC</h3></B></td>
    <td colspan="2" WIDTH="20%" align="center" style="font-size:11px;">
		<i>Mẫu số: 01-1/GTGT<br/>
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
    <td colspan="10" ><b>' . $_SESSION["THONGTINPHIEU"]['tenphieu'] . '</b></td>
  </tr>
  <tr>
    <td colspan="10"><b>(Kèm theo tờ khai thuế GTGT mẫu số 01/GTGT ngày ' . $ngaylap . ')</b></td>
  </tr>
  <tr>
    <td colspan="10"><b>[01] Kỳ tính thuế: ' . $_SESSION["THONGTINPHIEU"]['ngayhoadon'] . '</b></td>
  </tr>';
if ($loaibangke == "0") {
    $html_tt .= '<tr>
    <td><b colspan="10">Loại bảng kê: Bổ sung</b></td>
  </tr>';
}
if ($loaibangke == "ALL") {
    $html_tt .= '<tr>
    <td colspan="10"><b>Loại bảng kê: Tất cả</b></td>
  </tr>';
}
$html_tt.='
</table>
<table border="0" cellspacing="2" cellpadding="2" width="100%" >
  <tr>
    <td colspan="4" width="17%">[02] Tên người nộp thuế:</td>
    <td colspan="6" STYLE="border-bottom:0.5px dashed  #000;font-weight: bold">' . $_SESSION['TenCongTy'] . '</td>
  </tr>
  <tr>
    <td colspan="4">[03] Mã số thuế:</td>
	<td colspan="6" STYLE="border-bottom:0.5px dashed  #000;font-weight: bold">' . $_SESSION['MST'] . '</td>
  </tr>
  <tr>
    <td colspan="4">[04] Tên đại lý thuế(nếu có):</td>
	<td colspan="6" STYLE="border-bottom:0.5px dashed  #000;font-weight: bold">
		<input style="border:0px solid #000;width:700px;font-weight:bold;" type="text" value="';
		if ($_SESSION['thietlapdailythue'] == 1) {
			$html_tt .= $_SESSION['txt_tencongtydaily'];
		}
	$html_tt .= '" /></td>
  </tr>
  <tr>
    <td colspan="4">[05] Mã số thuế:</td>
	<td colspan="6" STYLE="border-bottom:0.5px dashed  #000;font-weight: bold">
		<input style="border:0px solid #000;width:700px;font-weight:bold;" type="text" value="';
		if ($_SESSION['thietlapdailythue'] == 1) {
			$html_tt .= $_SESSION['txt_masothue_daily'];
		}
	$html_tt .= '" /></td>
  </tr>
</table>
<table width="100%" border="0">
  <tr>
    <td colspan="10" align="right"></td>
  </tr>
</table>
<table width="100%" border="0">
  <tr>
	<td colspan="9"></td>
    <td colspan="1" align="right" style="font-size:11px;">Đơn vị tiền: <b>Đồng Việt Nam</b></td>
  </tr>
</table>';
echo $html_tt;
?>
<div></div>
<table border="1" class="display dataTable" width="100%" border="0" cellspacing="1" cellpadding="1">
    <thead>
    <tr>
        <th rowspan="2">&nbsp;<br/>STT</th>
        <th colspan="3">Hóa đơn, chứng từ bán ra</th>
        <th   rowspan="2">&nbsp;<br/>Tên người mua</th>
        <th   rowspan="2">Mã số thuế người mua</th>
        <th  align="center" rowspan="2">&nbsp;<br/>Mặt hàng</th>
        <th   rowspan="2">Doanh số chưa có thuế</th>
        <th   rowspan="2">Thuế giá trị gia tăng</th>
        <th   rowspan="2">&nbsp;<br/>Ghi chú</th>
    </tr>
    <tr>
        <th  >Ký hiệu hóa đơn</th>
        <th >Số hóa đơn</th>
        <th >Ngày tháng năm phát hành</th>
    </tr>
    <tr>
        <th style="text-align:center;">(1)</th>
        <th style="text-align:center;" >(2)</th>
        <th style="text-align:center;" >(3)</th>
        <th style="text-align:center;" >(4)</th>
        <th style="text-align:center;" >(5)</th>
        <th style="text-align:center;" >(6)</th>
        <th style="text-align:center;" >(7)</th>
        <th style="text-align:center;" >(8)</th>
        <th style="text-align:center;" >(9)</th>
        <th style="text-align:center;" >(10)</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $sott=0;
    $tongdoanhthu=0;
    $tongdoanhthucothue=0;
    $tongthue=0;
    $html_ct='';
    foreach ($DATACIBANRA as $k=>$itemTS) {
        if((string)$k=="k" || (string)$k=="K"){
            $html_ct ='<tr><td class="td_full"  colspan="10" style="text-align: left;"><i><b>Hàng hóa, dịch vụ không chịu thuế GTGT</b></i></td></tr>';
        }else  if((string)$k=="kk" || (string)$k=="KK"){
            $html_ct ='<tr><td class="td_full"  colspan="10" style="text-align: left;"><i><b>Hàng hóa, dịch vụ không tính thuế</b></i></td></tr>';
        }else{
            $html_ct ='<tr><td class="td_full" colspan="10" style="text-align: left;"><i><b>Hàng hóa, dịch vụ chịu thuế GTGT '.(int)$k.' %</b></i></td></tr>';
        }
        $tongdoanhthu_theothue=0;
        $tongthue_theothue=0;
        foreach ($itemTS as $itemCT) {
            $sott++;
            if((string)$k=="k" || (string)$k=="K"){

            }else{
                $tongdoanhthucothue+= $itemCT["thanhtien"];
            }
            $tongdoanhthu += $itemCT["thanhtien"];
            $tongthue += $itemCT["thue"];
            $tongdoanhthu_theothue += $itemCT["thanhtien"];
            $tongthue_theothue += $itemCT["thue"];
            $html_ct .= '
        <tr >
        <td width="20px" class="td_first" align="center" >' . $sott . '</td>
        <td width="60px" class="td_center">' . strtoupper($itemCT["seri"]) . '</td>
        <td width="65px" class="td_center" >' . $itemCT["sct"] . '</td>
        <td width="65px" class="td_center" >'.date("d-m-Y",strtotime($itemCT["ngayhoadon"])).'</td>
        <td width="280px" class="td_center" align="left">' . mb_convert_case($itemCT["tenkh"],MB_CASE_TITLE) . '</td>
        <td width="120px" class="td_center" >' . $itemCT["masothue"] . '</td>
        <td width="200px" class="td_center" align="left">' . $itemCT["tenvt"] . '</td>
        <td width="120px" class="td_center" style="text-align:right;">' . number_format($itemCT["thanhtien"], 0, ",", ".") . '</td>
        <td width="90px" class="td_center" style="text-align:right;">' . number_format($itemCT["thue"], 0, ",", ".") . '</td>
        <td width="90px" align="left" class="td_end"></td>
      </tr>
    ';
        }
        $html_ct .= '
        <tr >
        <td class="td_full" style="text-align: center;" colspan="7" ><b>Tổng</b></td>

        <td class="td_full"  style="text-align:right;"><b>' . number_format($tongdoanhthu_theothue,0,",",".") . '</b></td>
        <td class="td_full"  style="text-align:right;"><b>' . number_format($tongthue_theothue,0,",",".") . '</b></td>
        <td class="td_full"  align="left"><input style="background-color: #00c6ff;font-size: 10px;'.$display.'" width="100%" class="no-print duyettaikhoan" data-name="2#'.$_SESSION["THONGTINPHIEU"]['ngayhoadon'].'#'.$tongdoanhthu.'#'.$tongthue.'" type="button" value="DUYỆT"></td>
      </tr>
    ';
        echo $html_ct;
    }
    $html_sum='<table width="700" class="page_break" border="0">
  <tr>
    <td colspan="5" width="280"><strong>Tổng doanh thu hàng hóa, dịch vụ bán ra:</strong></td>
    <td colspan="1" width="70" align="right"><b>'.number_format($tongdoanhthu,0,",",".").'</b></td>
  </tr>
  <tr>
    <td colspan="5"><strong>Tổng doanh thu hàng hóa, dịch vụ bán ra chịu thuế GTGT:</strong></td>
    <td colspan="1" align="right"><b>'.number_format($tongdoanhthucothue,0,",",".").'</b></td>
  </tr>
  <tr>
    <td colspan="5"><strong>Tổng thuế GTGT của hàng hóa, dịch vụ bán ra:</strong></td>
    <td colspan="1" align="right"><b>'.number_format($tongthue,0,",",".").'</b></td>
  </tr>
  <tr>
    <td colspan="6">Tôi cam đoan số liệu khai trên là đúng và chịu trách nhiệm trước pháp luật về số liệu đã khai ./.</td>
  </tr>
</table>';
 
 $html_foodter = '<table width="100%" border="0" class="page_break" cellpadding="2">
  <tr>
    <td colspan="7" width="65%">&nbsp;</td>
    <td width="35%" rowspan="2" colspan="3" align="center" valign="top">
		<em>'.$_SESSION['ThanhPho'].' Ngày ';
		$time = strtotime($_SESSION["THONGTINPHIEU"]['ngaylap']);
		$html_foodter .= date("d-m-Y", $time);
		$html_foodter .= '</em><br/><strong>NGƯỜI NỘP THUẾ hoặc</strong><br/>
		<strong>ĐẠI DIỆN HỢP PHÁP CỦA NGƯỜI NỘP THUẾ</strong><br/>
		<em>(Ký ghi rõ họ tên: chức vụ và đóng dấu (nếu có))</em>
	</td>
  </tr>
  <tr>
    <td colspan="7">
		<input style="border:0px" type="text" value="Nhân viên đại lý thuế" /></strong><br/>
		<input style="border:0px solid #000;width:65px;" type="text" value="Họ và tên:" /><input style="border:0px solid #000;width:160px;font-weight:bold;" type="text" value="';
		if ($_SESSION['thietlapdailythue'] == 1) {
			$html_foodter .= $_SESSION['txt_hovatendaily'];
		}
		$html_foodter .= '" /><br/>
		<input style="border:0px solid #000;width:157px;" type="text" value="Chứng chỉ hành nghề số:" />
		<input style="border:0px solid #000;width:160px;font-weight:bold;" type="text" value="';
		if ($_SESSION['thietlapdailythue'] == 1) {
			$html_foodter .= $_SESSION['txt_chungchindaily'];
		}
		$html_foodter .= '" />
	</td>
  </tr>
</table>
</div>
<div style=" '.$display.'" class="no-print ketquaduyetsocai kequa_'.$k_matk.'" >
<table width="100%" border="1" >
        <tr>
            <th style="text-align: center;" colspan="7"><b>DANH SÁCH DUYỆT BẢNG KÊ</b></th>
        </tr>
        <tr>
            <th style="text-align: center;" colspan="7"><a style="cursor: pointer" data-name="2" class="ketquatrave">Xem chi tiết duyệt</a></th>
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