<?php
session_start();
$DATACIBANRA = $_SESSION["THONGTINPHIEUTONGHOPDTCPGTCT"];
?>
<html>
<head><title>IN BẢNG TỔNG HỢP - DOANH THU - CHI PHÍ - GIÁ THÀNH CÔNG TRÌNH (Nhấn CTRL + P để in , ALT + F4 để thoát)</title>


    <style type="text/css" class="init">
        .dataTable {
            font-family: "Times New Roman", Georgia, Serif;
            border-collapse: collapse;
            width: 100%;
        }
        .dataTable td{
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

        body{
            width: 420mm;
			margin: 1px;
			padding:1px;
			font-size:8px;
        }
        @page {
            size: A3 landscape;
            margin-top: 5mm;
            margin-bottom: 10mm;
        }

        @media print {
            #Header, #Footer { display: none !important; }
            .page_break{
                page-break-inside: avoid;
            }
            .no-print, .no-print * {
                display: none !important;
            }
        }

    </style>
    <script type="text/javascript" src="../../js/jquery.js"></script>
    <script type="text/javascript" src="../../js/jquery.number.min.js"></script>
    <script type="text/javascript" src="../../js/jquery.table2excel.js"></script>
    <script type="text/javascript" language="javascript">
        $(document).ready(function() {
           /* $('#xuatexcel').click(function(){
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
            })*/
			
			$(document).on('click','#xuatexcel',function(e) {
				var result = 'data:application/vnd.ms-excel,' + encodeURIComponent($('.BangInExcel').html());
				var link = document.createElement("a");
				document.body.appendChild(link);
				link.download = "Gia_Thanh_Cong_Trinh_" + new Date().toISOString().replace(/[\-\:\.]/g, "") + ".xls",
				link.href = result;
				link.click();
			});

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
    <meta charset="utf-8">
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
$html_ct="";
$html_title='
<thead>
  <tr>
    <th  rowspan="1">&nbsp;<br/>STT</th>
    <th  rowspan="1">&nbsp;<br/>Mã CT</th>
    <th  rowspan="1">&nbsp;<br/>Tên công trình, dịch vụ</th>
    <th  rowspan="1">&nbsp;<br/>Dở dang ĐK</th>
    <th  colspan="1">Nguyên vật liệu </th>
    <th  colspan="1">Nhân công</th>
    <th  colspan="1">Nhân công PB</th>
    <th  colspan="1" >Máy</th>
    <th  colspan="1" >Máy PB</th>
    <th  colspan="1">Chi phí SXC</th>
    <th  colspan="1">Chi phí SXC PB</th>
    <th  colspan="1">Khoán</th>
    <th  rowspan="1">&nbsp;<br/>Tổng cộng</th>
    <th  rowspan="1">&nbsp;<br/>Doanh thu thuần</th>
    <th  rowspan="1">&nbsp;<br/>Giá thành</th>
    
    <th  rowspan="1">&nbsp;<br/>Lãi(Lỗ)</th>
    <th  rowspan="1">&nbsp;<br/>Dở dang CK</th>
  </tr>
  <tr>
    <th >(A)</th>
    <th >(B)</th>
    <th >(C)</th>
    <th >(D)</th>
    <th >(1)</th>

    <th >(2)</th>
    <th >(3)</th>

    <th >(4)</th>
    <th >(5)</th>

     <th >(6)</th>

    <th >(7)</th>
    <th >(8)</th>

     <th >(E)</th>
     <th >(F)</th>
     <th >(G)</th>
     <th >(H)</th>
     <th >(L)</th>
  </tr>
  </thead>
  ';
    $sott=0;
    $CAPIN = $_SESSION["THONGTINPHIEU"]['incaptk'];
    if($xemchitiet==1){
        $CAPIN =4;
    }
$TongTienDK=0;
$TongTienNguyenLieu=0;
$TongTienNhanCong=0;
$TongTienMay=0;
$TongTienMayPB=0;
$TongTienCPSXC=0;
$TongTienCPSXCPB=0;
$TongTienCTKHOAN=0;
$TongTienDoanhThuThuan=0;
$TongTienTongCong=0;

$TongGiaThanh=0;
$TongLaiLo=0;
$TongTienCK=0;
$STT_Cha = 0;
    foreach ($DATACIBANRA as $itemCT) {
        $indam="";
        if($itemCT['mactcha']=="0") {
			$STT_Cha++;
			$sott = 0;
            $indam='style="font-weight: bold;"';
            $TongTienDK+=$itemCT['dodangdk'];
            $TongTienNguyenLieu+=$itemCT['sotiennl'];
            $TongTienNhanCong+=$itemCT['sotiennc'];
            $TongTienNhanCong622PB+=$itemCT['sotiennc622pb'];
            $TongTienCTKHOAN+=$itemCT['ctkhoan'];
            $TongTienMay+=$itemCT['sotienmay'];
            $TongTienMayPB+=$itemCT['sotienncpb'];
            $TongTienCPSXC+=$itemCT['sotiencpsxc'];
            $TongTienCPSXCPB+=$itemCT['sotiencpsxcpb'];
            $TongTienDoanhThuThuan+=$itemCT['doanhthuthuan'];
            $TongTienTongCong+=$itemCT['tongcong'];

            $TongGiaThanh+=$itemCT['giathanh'];
            $TongLaiLo+=$itemCT['lailo'];
            $TongTienCK+=$itemCT['dodangck'];

        }
        if ($itemCT['CAP']<=$CAPIN) {
            $tongcong = $itemCT['dodangdk']+$itemCT['sotiennl']+$itemCT['sotiennc']+$itemCT['sotiennc622pb']+$itemCT['sotienmay']+$itemCT['sotienncpb']+$itemCT['sotiencpsxc']+$itemCT['sotiencpsxcpb'];

            if(number_format($itemCT["tongcong"])==0&&number_format($itemCT["doanhthuthuan"])==0&&number_format($itemCT["dodangck"])==0&&$tongcong==0){

            }else {
				if($itemCT['mactcha']=="0"){
					$InSTT = $STT_Cha;
				}else{
					$sott++;
					$InSTT = $STT_Cha.".".$sott;
				}
                $html_ct .= '
        <tr >
        <td class="td_first" width="20px" ' . $indam . '" align="LÈ" >'.$InSTT .'</td>
        <td class="td_center" width="50px" ' . $indam . '">' . $itemCT["mact"] . '</td>
        <td class="td_center" width="300px" align="left" ' . $indam . '">' . $itemCT["tenct"] . '</td>
        <td class="td_center" width="100px" align="right" ' . $indam . '">';
                $html_ct .= (number_format($itemCT["dodangdk"] != 0) ? number_format($itemCT["dodangdk"], 0, ",", ".") : "");
                $html_ct .= '</td>
        <td class="td_center" width="100px" align="right" ' . $indam . '">';
                $html_ct .= (number_format($itemCT["sotiennl"] != 0) ? number_format($itemCT["sotiennl"], 0, ",", ".") : "");
                $html_ct .= '</td>
        <td class="td_center" width="100px" align="right" ' . $indam . '">';
                $html_ct .= (number_format($itemCT["sotiennc"] != 0) ? number_format($itemCT["sotiennc"], 0, ",", ".") : "");
                $html_ct .= '</td>
<td class="td_center" width="100px" align="right" ' . $indam . '">';
                $html_ct .= (number_format($itemCT["sotiennc622pb"] != 0) ? number_format($itemCT["sotiennc622pb"], 0, ",", ".") : "");
                $html_ct .= '</td>
         <td class="td_center" width="100px" align="right" ' . $indam . '" align="right">';
                $html_ct .= (number_format($itemCT["sotienmay"]) != 0) ? number_format($itemCT["sotienmay"], 0, ",", ".") : "";
                $html_ct .= '</td>
		<td class="td_center" width="100px" align="right" ' . $indam . '" align="right">';
                $html_ct .= (number_format($itemCT["sotienncpb"]) != 0) ? number_format($itemCT["sotienncpb"], 0, ",", ".") : "";
                $html_ct .= '</td>
<td class="td_center" width="100px" align="right" ' . $indam . '" align="right">';
                $html_ct .= (number_format($itemCT["sotiencpsxc"]) != 0) ? number_format($itemCT["sotiencpsxc"], 0, ",", ".") : "";
                $html_ct .= '</td>
                 <td class="td_center" width="100px" align="right" ' . $indam . '" align="right">';
                $html_ct .= (number_format($itemCT["sotiencpsxcpb"]) != 0) ? number_format($itemCT["sotiencpsxcpb"], 0, ",", ".") : "";
                $html_ct .= '</td>

<td class="td_center" width="100px" align="right" ' . $indam . '" align="right">';
                $html_ct .= (number_format($itemCT["ctkhoan"]) != 0) ? number_format($itemCT["ctkhoan"], 0, ",", ".") : "";
                $html_ct .= '</td>
		<td class="td_center" width="100px" align="right" ' . $indam . '" align="right">';
                $html_ct .= (number_format($itemCT["tongcong"]) != 0) ? number_format($itemCT["tongcong"], 0, ",", ".") : "";
                $html_ct .= '</td>
        <td class="td_end" width="100px" align="right"' . $indam . '" align="right">';
                $html_ct .= (number_format($itemCT["doanhthuthuan"]) != 0) ? number_format($itemCT["doanhthuthuan"], 0, ",", ".") : "";
                $html_ct .= '</td>
<td class="td_end" width="100px" align="right"' . $indam . '" align="right">';
                $html_ct .= (number_format($itemCT["giathanh"]) != 0) ? number_format($itemCT["giathanh"], 0, ",", ".") : "";
                $html_ct .= '</td><td class="td_end" width="100px" align="right"' . $indam . '" align="right">';
                $html_ct .= (number_format($itemCT["lailo"]) != 0) ? number_format($itemCT["lailo"], 0, ",", ".") : "";
                $html_ct .= '</td>

<td class="td_end" width="100px" align="right"' . $indam . '" align="right">';
                $html_ct .= (number_format($itemCT["dodangck"]) != 0) ? number_format($itemCT["dodangck"], 0, ",", ".") : "";
                $html_ct .= '</td>

      </tr>';
            }
    }
}

$html = '
<table width="100%" border="0" style="border-bottom: 1px solid #000">
  <tr>
    <td  colspan="10" align="left" WIDTH="55%"><B>'.$_SESSION["TenCongTy"].'</B><br/>'.$_SESSION["DiaChi"].'</td>    
    <td colspan="5" align="center" WIDTH="30%"></td>
    <td colspan="2" WIDTH="15%" align="right" valign="top">MST:'.$_SESSION["MST"].'</td>
  </tr>
</table>
<table><tr><td></td></tr></table>
<table border="0" align="center">
  <tr>
    <td colspan="17" align="center"><b>'.$_SESSION["THONGTINPHIEU"]['tenphieu'].'</b></td>
  </tr>
  <tr>
    <td colspan="17" align="center"><b>'.$_SESSION["THONGTINPHIEU"]['ngayhoadon'].'</b></td>
  </tr>
</table>
<table width="100%" border="0">
  <tr>
    <td align="right"></td>
  </tr>
</table>
<table border="1" width="100%" class="dataTable" cellpadding="2" cellspacing="0" align="center" valign="middle">'.$html_title.$html_ct.'
<tr>
    <td width="15px" STYLE="border:0.5px solid #000;"></td>
    <td width="100px" STYLE="border:0.5px solid #000;"></td>
    <td width="200px" STYLE="border:0.5px solid #000;text-align:right;"><b>TỔNG CỔNG</b></td>
    <td width="80px" align="right" STYLE="border:0.5px solid #000;"><b>'.number_format($TongTienDK,0,",",".").'</b></td>
    <td width="80px" align="right" STYLE="border:0.5px solid #000;"><b>'.number_format($TongTienNguyenLieu,0,",",".").'</b></td>

    <td  width="80px" align="right" STYLE="border:0.5px solid #000;"><b>'.number_format($TongTienNhanCong,0,",",".").'</b></td>
    <td  width="80px" align="right" STYLE="border:0.5px solid #000;"><b>'.number_format($TongTienNhanCong622PB,0,",",".").'</b></td>

    <td  width="80px" align="right" STYLE="border:0.5px solid #000;"><b>'.number_format($TongTienMay,0,",",".").'</b></td>
    <td  width="80px" align="right" STYLE="border:0.5px solid #000;"><b>'.number_format($TongTienMayPB,0,",",".").'</b></td>

    <td  width="80px" align="right" STYLE="border:0.5px solid #000;"><b>'.number_format($TongTienCPSXC,0,",",".").'</b></td>

    <td  width="80px" align="right" STYLE="border:0.5px solid #000;"><b>'.number_format($TongTienCPSXCPB,0,",",".").'</b></td>
    <td  width="80px" align="right" STYLE="border:0.5px solid #000;"><b>'.number_format($TongTienCTKHOAN,0,",",".").'</b></td>

    <td  width="100px" align="right" STYLE="border:0.5px solid #000;"><b>'.number_format($TongTienTongCong,0,",",".").'</b></td>
    <td  width="100px" align="right" STYLE="border:0.5px solid #000;"><b>'.number_format($TongTienDoanhThuThuan,0,",",".").'</b></td>
    <td  width="100px" align="right" STYLE="border:0.5px solid #000;"><b>'.number_format($TongGiaThanh,0,",",".").'</b></td>
    <td  width="100px" align="right" STYLE="border:0.5px solid #000;"><b>'.number_format($TongLaiLo,0,",",".").'</b></td>
    <td  width="100px" align="right" STYLE="border:0.5px solid #000;"><b>'.number_format($TongTienCK,0,",",".").'</b></td>
  </tr>
</table>
<table><tr><td></td></tr></table>

<table width="100%" border="0" cellpadding="2">
  <tr>
	<td colspan="5" align="center" width="35%">&nbsp;<br/>Người lập phiếu</td>
    <td colspan="7" align="center" width="35%">&nbsp;<br/>Kế toán trưởng</td>
    <td colspan="5" width="30%" rowspan="2" align="center">
    <em>'.$_SESSION["ThanhPho"].', Ngày ';
$time = strtotime($_SESSION["THONGTINPHIEU"]['ngaylap']);
$html.=date("d-m-Y",$time);
$html.='</em><br/>Giám đốc
   </td>
  </tr>
  <tr>
    <td></td>
  </tr>
</table>
';
echo $html;

?>
</tbody>
</table>
</div>
</body>
</html>