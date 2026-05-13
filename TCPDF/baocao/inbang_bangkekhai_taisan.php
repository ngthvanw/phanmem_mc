<?php
session_start();

$DATADSKHAUHAOTS = $_SESSION['DSBANGKETAISAN'];
$denngay = $_GET['denngay'];
$sapxeptheo = $_GET['sapxeptheo'];
?>
<html>
<head><title>BẢNG KÊ TÀI SẢN CỐ ĐỊNH</title>

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
        .page_break{
            page-break-inside: avoid;
        }
        @page {
            size: A4 landscape;
			margin-left: 3mm;
            margin-right: 10mm;

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
            /*$('#xuatexcel').click(function(){
                $(".BangInExcel").table2excel({
                    exclude: ".noExl",
                    name: "Excel Document Name",
                    filename: "Bang_Ke_Tai_San_" + new Date().toISOString().replace(/[\-\:\.]/g, "") + ".xls",
                    fileext: ".xls",
                    exclude_img: true,
                    exclude_links: true,
                    exclude_inputs: true,
                    preserveColors: true
                });
            })*/
			$(document).on('click','#xuatexcel',function(e) {
				var BOM = '\ufeff'; // BOM UTF-8
				var result = 'data:application/vnd.ms-excel;charset=utf-8,' + encodeURIComponent(BOM + $('.BangInExcel').html());
				var link = document.createElement("a");
				document.body.appendChild(link);
				link.download = "Bang_Ke_Tai_San_" + new Date().toISOString().replace(/[\-\:\.]/g, "") + ".xls";
				link.href = result;
				link.click();
			});
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
<thead style="border: 0px solid #000;">
 <tr style="border: 0px solid #000;">
    <th width="30px" rowspan="2" style="border-right: 0px solid #000;">&nbsp;<br/>
      STT</th>
    <th rowspan="2"  style="border-right: 0px solid #000;width: 50px;" >&nbsp;<br/>
      Mã số</th>
    <th width="250px" rowspan="2"  style="border-right: 0px solid #000;" >&nbsp;<br/>Tên tài sản</th>
    <th width="60px" rowspan="2"  style="border-right: 0px solid #000;" >&nbsp;<br/>Nước SX</th>
    <th width="50px" rowspan="2"  style="border-right: 0px solid #000;" >&nbsp;<br/>ĐVT</th>
    <th width="30px" rowspan="2"  style="border-right: 0px solid #000;" >&nbsp;<br/>Số lượng</th>
    <th width="160px"  colspan="2"  style="border-right: 0px solid #000;">Giá trị ban đầu</th>
    <th  width="80px" rowspan="2"  style="border-right: 0px solid #000;" >T.Gian đưa vào sử dụng</th>
    <th  colspan="3" width="170px"  style="border-right: 0px solid #000;" >Giá trị còn lại</th>
    <th  width="90px" rowspan="2"  >&nbsp;<br/>Số tiền khấu hao năm</th>
  </tr>
   <tr>
    <th  width="100px"  style="border-right: 0px solid #000;border-top: 0px solid #000;" >Nguyên giá</th>
    <th  width="30px" style="border-right: 0px solid #000;border-top: 0px solid #000;" >Thời gian sử dụng</th>
    <th   width="40px" style="border-right: 0px solid #000;border-top: 0px solid #000;">Tỷ lệ (%)</th>
    <th   width="90px" style="border-right: 0px solid #000;border-top: 0px solid #000;">Số tiền</th>
    <th   width="40px" style="border-right: 0px solid #000;border-top: 0px solid #000;">T.Gian sử dụng còn lại(Năm)</th>
  </tr>
  </thead>
  ';
if($sapxeptheo=="matk"){
    ksort($DATADSKHAUHAOTS );
    $sott=0;
    $tongdoanhthu=0;
    $nguyengia = 0;
    $tongthue=0;

    $nguyengiatk = 0;
    $tongthuetk=0;
	$tongcongsokhtk = 0;
    foreach ($DATADSKHAUHAOTS as $k=>$itemMaTK) {
        $nguyengiatk = 0;
        $tongsokh=0;
		$tongsokhtk = 0;
        $tonggtconlaitk=0;
        foreach ($itemMaTK as $itemCT) {
            if (number_format($itemCT["nguyengia"])!=0 && $itemCT["daban"]!=1) {
                $sott++;
                $nguyengia += $itemCT["nguyengia"];
                $tongsokh += round($itemCT["sokh"]);

                $nguyengiatk+= $itemCT["nguyengia"];
                $tongsokhtk+= round($itemCT["sokh"]);
				$tongcongsokhtk+=round($itemCT["sokh"]);
                $html_ct .= '
        <tr >
        <td STYLE="border-bottom:0.5px dashed #000;border-left:0.5px solid #000;text-align: center;'.$indam.'" >' . $itemCT["STT"] . '</td>
        <td align="left" STYLE="border-bottom:0.5px dashed #000;border-left:0.5px solid #000;'.$indam.'">' . strtoupper($itemCT["mats"]) . '</td>
        <td align="left" STYLE="border-bottom:0.5px dashed #000;border-left:0.5px solid #000;'.$indam.'">' . $itemCT["tents"] . '</td>
        <td align="center" STYLE="border-bottom:0.5px dashed #000;border-left:0.5px solid #000;'.$indam.'">';

                $html_ct .=($itemCT["nuocsx"]);
                $html_ct .= '</td>
        <td  STYLE="border-bottom:0.5px dashed #000;border-left:0.5px solid #000;'.$indam.'" align="center">';
                $html_ct .= $itemCT["dvt"];
                $html_ct .= '</td>
        <td align="center" STYLE="border-bottom:0.5px dashed #000;border-left:0.5px solid #000;'.$indam.'">';
                $html_ct .=($itemCT["soluong"]);
                $html_ct .= '</td>
        <td align="right" STYLE="border-bottom:0.5px dashed #000;border-left:0.5px solid #000;'.$indam.'">';
                $html_ct .=(number_format($itemCT["nguyengia"] != 0) ? number_format($itemCT["nguyengia"],0,",","."):"");
                $html_ct .= '</td>
        <td align="center" STYLE="border-bottom:0.5px dashed #000;border-left:0.5px solid #000;'.$indam.'">';
                $html_ct .=((number_format(($itemCT["tgsudung"]/12)) != 0) ? round(($itemCT["tgsudung"]/12),2):"");
                $html_ct .= '</td>
        <td align="center" STYLE="border-bottom:0.5px dashed #000;border-left:0.5px solid #000;mso-number-format:\'\@\';'.$indam.'">';
                $html_ct .=((strtotime($itemCT["ngaysd"]) != "") ? date("d-m-Y",strtotime($itemCT["ngaysd"])):"");
                $html_ct .= '</td>
		<td align="center" STYLE="border-bottom:0.5px dashed #000;border-left:0.5px solid #000;'.$indam.'">';
                $date1=date_create($itemCT["ngaysd"]);
                $date2=date_create($denngay);
                $diff=date_diff($date1,$date2);
                $namdasudung = (($diff->format("%R%a")/365));
                $namsudung = $itemCT["tgsudung"]/12;
                $namconlai = $namsudung-$namdasudung;
                if($namsudung==0 || $namconlai<=0 ){
                    $namconlai=0;
                }
                $tylekh = ((($namconlai*100)/($itemCT["tgsudung"]/12)));
                $GTConLai = $itemCT["gtconlai"]-$itemCT["sokh"];
                if($itemCT["tylekh"]==0){
                    $tylekh=0;
                    $GTConLai = 0;
                }
                if($GTConLai>0){
                    $tonggtconlai += $GTConLai;
                    $tonggtconlaitk += $GTConLai;
                }
                $html_ct .=(number_format($tylekh != 0) ? number_format($tylekh,2,",","."):"");
                $html_ct .= '</td>
		<td STYLE="border-bottom:0.5px dashed #000;border-left:0.5px solid #000;'.$indam.'" align="right">';
                $html_ct .=(($GTConLai > 0) ? number_format($GTConLai,0,",","."):"");

                $html_ct .= '</td>
		<td align="right" STYLE="border-bottom:0.5px dashed #000;border-left:0.5px solid #000;'.$indam.'" align="right">';
                $html_ct .=(number_format($namconlai != 0) ? number_format($namconlai,2,",","."):"");
                $html_ct .= '</td>
		<td align="right" STYLE="border-bottom:0.5px dashed #000;border-right:0.5px solid #000;border-left:0.5px solid #000;'.$indam.'" align="right">';
                $html_ct .=(number_format($itemCT["sokh"] != 0) ? number_format($itemCT["sokh"],0,",","."):"");

                $html_ct .= '</td>
      </tr>';
            }
        }
        $html_ct .= '<tr>
    <td STYLE="border-left:0.5px solid #000;border-top:0.5px solid #000;border-bottom:0.5px solid #000;" ></td>
    <td STYLE="border-left:0.5px solid #000;border-top:0.5px solid #000;border-bottom:0.5px solid #000;"></td>
    <td  align="right" STYLE="border-left:0.5px solid #000;border-top:0.5px solid #000;border-bottom:0.5px solid #000;"><b>Tổng cộng '.$k.'</b></td>
    <td STYLE="border-left:0.5px solid #000;border-top:0.5px solid #000;border-bottom:0.5px solid #000;" ></td>
    <td STYLE="border-left:0.5px solid #000;border-top:0.5px solid #000;border-bottom:0.5px solid #000;" ></td>
    <td STYLE="border-left:0.5px solid #000;border-top:0.5px solid #000;border-bottom:0.5px solid #000;" align="right"></td>
    <td STYLE="border-left:0.5px solid #000;border-top:0.5px solid #000;border-bottom:0.5px solid #000;" align="right"><b>' . number_format($nguyengiatk, 0, ",", ".") . '</b></td>
  
    <td align="right" STYLE="border-left:0.5px solid #000;border-top:0.5px solid #000;border-bottom:0.5px solid #000;"></td>
    <td align="right" STYLE="border-left:0.5px solid #000;border-top:0.5px solid #000;border-bottom:0.5px solid #000;"></td>
    <td align="right" STYLE="border-left:0.5px solid #000;border-top:0.5px solid #000;border-bottom:0.5px solid #000;"></td>
    <td align="right"STYLE="border-left:0.5px solid #000;border-top:0.5px solid #000;border-bottom:0.5px solid #000;"><b>' . number_format(($tonggtconlaitk), 0, ",", ".") . '</b></td>
    <td align="right" STYLE="border-left:0.5px solid #000;border-top:0.5px solid #000;border-bottom:0.5px solid #000;"></td>
    <td align="right" STYLE="border:0.5px solid #000;"><b>' . (number_format($tongsokhtk != 0) ?number_format($tongsokhtk, 0, ",", "."):"") . '</b></td>
  </tr>';
    }
}else{
    $sott=0;
    $tongdoanhthu=0;
    $nguyengia = 0;
    $tongthue=0;
	$tongcongsokhtk = 0;
    foreach ($DATADSKHAUHAOTS as $itemCT) {
        if (number_format($itemCT["nguyengia"])!=0 && $itemCT["daban"]!=1) {
            $sott++;
            $indam="";
            if ($itemCT['matscha'] == "0") {
                $nguyengia += $itemCT["nguyengia"];
                $tongsokh += round($itemCT["sokh"]);
                //echo  $itemCT['mats'].":".$itemCT["gtconlai"]."<br/>";
				$tongcongsokhtk+=round($itemCT["sokh"]);
                $indam="font-weight:bold;";
            }
            $html_ct .= '
        <tr >
        <td STYLE="border-bottom:0.5px dashed #000;border-left:0.5px solid #000;text-align: center;'.$indam.'" >' . $itemCT["STT"] . '</td>
        <td align="left" STYLE="border-bottom:0.5px dashed #000;border-left:0.5px solid #000;'.$indam.'">' . strtoupper($itemCT["mats"]) . '</td>
        <td align="left" STYLE="border-bottom:0.5px dashed #000;border-left:0.5px solid #000;'.$indam.'">' . $itemCT["tents"] . '</td>
        <td align="center" STYLE="border-bottom:0.5px dashed #000;border-left:0.5px solid #000;'.$indam.'">';

            $html_ct .=($itemCT["nuocsx"]);
            $html_ct .= '</td>
        <td  STYLE="border-bottom:0.5px dashed #000;border-left:0.5px solid #000;'.$indam.'" align="center">';
            $html_ct .= $itemCT["dvt"];
            $html_ct .= '</td>
        <td align="center" STYLE="border-bottom:0.5px dashed #000;border-left:0.5px solid #000;'.$indam.'">';
            $html_ct .=($itemCT["soluong"]);
            $html_ct .= '</td>
        <td align="right" STYLE="border-bottom:0.5px dashed #000;border-left:0.5px solid #000;'.$indam.'">';
            $html_ct .=(number_format($itemCT["nguyengia"] != 0) ? number_format($itemCT["nguyengia"],0,",","."):"");
            $html_ct .= '</td>
        <td align="center" STYLE="border-bottom:0.5px dashed #000;border-left:0.5px solid #000;'.$indam.'">';
            $html_ct .=((number_format(($itemCT["tgsudung"]/12)) != 0) ? round(($itemCT["tgsudung"]/12),2):"");
            $html_ct .= '</td>
        <td align="center" STYLE="border-bottom:0.5px dashed #000;border-left:0.5px solid #000;'.$indam.'">';
            $html_ct .=((strtotime($itemCT["ngaysd"]) != "") ? date("d-m-Y",strtotime($itemCT["ngaysd"])):"");
            $html_ct .= '</td>
		<td align="center" STYLE="border-bottom:0.5px dashed #000;border-left:0.5px solid #000;'.$indam.'">';
            $date1=date_create($itemCT["ngaysd"]);
            $date2=date_create($denngay);
            $diff=date_diff($date1,$date2);
            $namdasudung = (($diff->format("%R%a")/365));
            $namsudung = $itemCT["tgsudung"]/12;
            $namconlai = $namsudung-$namdasudung;
            if($namsudung==0 || $namconlai<=0 ){
                $namconlai=0;
            }
            $tylekh = ((($namconlai*100)/($itemCT["tgsudung"]/12)));
            $GTConLai = $itemCT["gtconlai"]-$itemCT["sokh"];
            if($itemCT["tylekh"]==0){
                $tylekh=0;
                $GTConLai = 0;
            }
            if($GTConLai>0){
                $tonggtconlai += $GTConLai;
            }
            $html_ct .=(number_format($tylekh != 0) ? number_format($tylekh,2,",","."):"");
            $html_ct .= '</td>
		<td STYLE="border-bottom:0.5px dashed #000;border-left:0.5px solid #000;'.$indam.'" align="right">';
            $html_ct .=(($GTConLai > 0) ? number_format($GTConLai,0,",","."):"");

            $html_ct .= '</td>
		<td align="right" STYLE="border-bottom:0.5px dashed #000;border-left:0.5px solid #000;'.$indam.'" align="right">';
            $html_ct .=(number_format($namconlai != 0) ? number_format($namconlai,2,",","."):"");
            $html_ct .= '</td>
		<td align="right" STYLE="border-bottom:0.5px dashed #000;border-right:0.5px solid #000;border-left:0.5px solid #000;'.$indam.'" align="right">';
            $html_ct .=(number_format($itemCT["sokh"] != 0) ? number_format($itemCT["sokh"],0,",","."):"");

            $html_ct .= '</td>
      </tr>';
        }
    }
}
$html = '
<table width="100%" border="0" style="border-bottom: 1px solid #000">
  <tr>
    <td colspan="6" align="left" WIDTH="55%"><B>'.$_SESSION["TenCongTy"].'</B><br/>'.$_SESSION["DiaChi"].'<br/>MST:'.$_SESSION["MST"].'</td>    
    <td colspan="4" align="center" WIDTH="20%"></td>
    <td colspan="3" align="center" WIDTH="25%">
	<i>Mẫu số F01-DNN<br/>
        (Ban hành ' . $_SESSION['THONGTUMANG'][$_SESSION['theothongtu']]['thongtu'] . ' ngày ' . $_SESSION['THONGTUMANG'][$_SESSION['theothongtu']]['ngay'] . ' của Bộ trưởng Bộ Tài Chính)</i>  
</td>
  </tr>
</table>
<table><tr><td></td></tr></table>
<table border="0" align="center">
  <tr>
    <td colspan="13"><b>'.$_SESSION["THONGTINPHIEU"]['tenphieu'].'</b></td>
  </tr>
  <tr>
    <td colspan="13"><b>'.$_SESSION["THONGTINPHIEU"]['ngayhoadon'].'</b></td>
  </tr>
</table>
<table width="100%" border="0">
  <tr>
    <td align="right"></td>
  </tr>
</table>
<table class="dataTable" border="1" style="width: 100%" cellpadding="2" cellspacing="0" align="center" valign="middle">'.$html_title.$html_ct.'
<tr>
    <td STYLE="border-left:0.5px solid #000;border-top:0.5px solid #000;border-bottom:0.5px solid #000;" ></td>
    <td STYLE="border-left:0.5px solid #000;border-top:0.5px solid #000;border-bottom:0.5px solid #000;"></td>
    <td  align="right" STYLE="border-left:0.5px solid #000;border-top:0.5px solid #000;border-bottom:0.5px solid #000;"><b>Tổng cộng</b></td>
    <td STYLE="border-left:0.5px solid #000;border-top:0.5px solid #000;border-bottom:0.5px solid #000;" ></td>
    <td STYLE="border-left:0.5px solid #000;border-top:0.5px solid #000;border-bottom:0.5px solid #000;" ></td>
    <td STYLE="border-left:0.5px solid #000;border-top:0.5px solid #000;border-bottom:0.5px solid #000;" align="right"></td>
    <td STYLE="border-left:0.5px solid #000;border-top:0.5px solid #000;border-bottom:0.5px solid #000;" align="right"><b>' . number_format($nguyengia, 0, ",", ".") . '</b></td>
  
    <td align="right" STYLE="border-left:0.5px solid #000;border-top:0.5px solid #000;border-bottom:0.5px solid #000;"></td>
    <td align="right" STYLE="border-left:0.5px solid #000;border-top:0.5px solid #000;border-bottom:0.5px solid #000;"></td>
    <td align="right" STYLE="border-left:0.5px solid #000;border-top:0.5px solid #000;border-bottom:0.5px solid #000;"></td>
    <td align="right"STYLE="border-left:0.5px solid #000;border-top:0.5px solid #000;border-bottom:0.5px solid #000;"><b>' . number_format(($tonggtconlai), 0, ",", ".") . '</b></td>
    <td align="right" STYLE="border-left:0.5px solid #000;border-top:0.5px solid #000;border-bottom:0.5px solid #000;"></td>
    <td align="right" STYLE="border:0.5px solid #000;"><b>' . (number_format($tongcongsokhtk != 0) ?number_format($tongcongsokhtk, 0, ",", "."):"") . '</b></td>
  </tr>
  <tr>
    <td  align="right" colspan="12" STYLE="border-left:0.5px solid #000;border-top:0.5px solid #000;border-bottom:0.5px solid #000;"><b>Hao mòn luỹ kế</b></td>

    <td align="right" STYLE="border:0.5px solid #000;"><b>' . (number_format(($nguyengia-$tonggtconlai) != 0) ?number_format($nguyengia-$tonggtconlai, 0, ",", "."):"") . '</b></td>
  </tr>
</table>
<table><tr><td></td></tr></table>

<table width="100%" border="0" cellpadding="2">
  <tr>
  <td colspan="3" align="center" width="35%">Lập bảng</td>
  <td colspan="6" align="center" width="35%">Kế toán</td>
  <td colspan="4" width="30%" rowspan="2" align="center">
    <em>Ngày ';
	$time = strtotime($_SESSION["THONGTINPHIEU"]['ngaylap']);
	$html.=date("d-m-Y",$time);
	$html.='</em><br/>Chủ doanh nghiệp
   </td>
  </tr>
</table>';
echo $html;
?>
</div>
</body>
</html>



