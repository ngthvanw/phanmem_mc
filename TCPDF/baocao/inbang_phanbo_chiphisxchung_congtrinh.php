<?php
session_start();
$DATACIBANRA = $_SESSION["THONGTINPHIEUTONGHOPDTCPGTCT"];
$phuongphapphanbo = $_GET['phuongphapphanbo'];
?>
<html>
<head><title>IN BẢNG CHI PHÍ SẢN XUẤT CHUNG CÔNG TRÌNH (Nhấn CTRL + P để in , ALT + F4 để thoát)</title>


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
            width: 297mm;
			margin:2px;
			padding:2px;
        }
        @page {
            size: A4 landscape;
            margin-top: 5mm;
            margin-bottom: 10mm;
        }

        @media print {
            #Header, #Footer { display: none !important; }
            .page_break{
                page-break-inside: avoid;
            }
        }
    </style>
    <meta charset="utf-8">
</head>
<body class="dt-print-view">
<?php
$html_ct="";
$html_title='
<thead>
  <tr>
    <th  rowspan="2">STT</th>
    <th  rowspan="2">Mã CT</th>
    <th  rowspan="2">Tên công trình, dịch vụ</th>
    <th  rowspan="2">Doanh thu hợp đồng</th>
    <th  rowspan="2">% HT</th>
    <th  rowspan="2">';
    if($phuongphapphanbo=='doanhthuthuan'){
        $html_title.="Doanh thu thuần";
    }else  if($phuongphapphanbo=='doanhthuthuchien'){
        $html_title.="Doanh thu thực hiện";
    }else  if($phuongphapphanbo=='nguyenvatlieu'){
        $html_title.="Nguyên vật liệu";
    }else  if($phuongphapphanbo=='nhancong'){
        $html_title.="Nhân công";
    }
    $html_title.='</th>
    <th  rowspan="2">Phân bổ 627</th>
    <th  rowspan="2">Phân bổ 623</th>
    <th  rowspan="2">Phân bổ 622</th>
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
$TongTienCPSXC=0;
$TongTienCPSXCPB=0;
$TongTienDoanhThuThuan=0;
$TongTienTongCong=0;

$TongGiaThanh=0;
$TongLaiLo=0;
$TongTienCK=0;
$TongTienCPNCPB=0;
    foreach ($DATACIBANRA as $itemCT) {
        $indam="";
        if($itemCT['mactcha']=="0") {
            $indam='style="font-weight: bold;"';
            $TongTienDK+=$itemCT['dodangdk'];
            $TongTienNguyenLieu+=$itemCT['sotiennl'];
            $TongTienNhanCong+=$itemCT['sotiennc'];
            $TongTienMay+=$itemCT['sotienmay'];
            $TongTienCPSXC+=$itemCT['sotiencpsxc'];
            $TongTienCPSXCPB+=$itemCT['sotiencpsxcpb'];
            $TongTienCPNCPB+=$itemCT['sotienncpb'];
            $TongTienCPNC622PB+=$itemCT['sotiennc622pb'];
            $TongTienDoanhThuThuan+=$itemCT['doanhthuthuan'];
            $TongTienTongCong+=$itemCT['tongcong'];

            $TongGiaThanh+=$itemCT['giathanh'];
            $TongLaiLo+=$itemCT['lailo'];
            $TongTienCK+=$itemCT['dodangck'];
            $TongDoanhThuHopDong +=$itemCT['doanhthuhopdong'];
        }
        if ($itemCT["sotiencpsxcpb"]==0 && $itemCT["doanhthuthuan"]==0 && $itemCT["tongcong"]==0 ) {
            // Nếu không có số liệu thì sẽ không hiện liên
        }else{
        $sott++;
        $html_ct .= '
        <tr >
        <td class="td_first"  '.$indam.' align="center" >' .$itemCT["sottxuat"] . '</td>
        <td class="td_center" '.$indam.'">' . $itemCT["mact"]. '</td>
        <td class="td_center"  align="left" '.$indam.'>' . $itemCT["tenct"] . '</td>
        <td class="td_center"  align="right" '.$indam.'>';
            $html_ct.=(number_format($itemCT["doanhthuhopdong"]) != 0) ? number_format($itemCT["doanhthuhopdong"],0,",","."):"";
        $html_ct .= '</td>
        <td class="td_center"  align="right"'.$indam.'>';
                $html_ct.=(number_format($itemCT["tylethucte"]) != 0) ? number_format($itemCT["tylethucte"],0,",","."):"";
        $html_ct .= '</td>
<td class="td_center"  align="right"'.$indam.'>';
                $html_ct.=(number_format($itemCT["doanhthuthuan"]) != 0) ? number_format($itemCT["doanhthuthuan"],0,",","."):"";
        $html_ct .= '</td>
<td class="td_end"  align="right"'.$indam.'>';
                $html_ct.=(number_format($itemCT["sotiencpsxcpb"]) != 0) ? number_format($itemCT["sotiencpsxcpb"],0,",","."):"";
        $html_ct .= '</td>
		<td class="td_end"  align="right"'.$indam.'>';
                $html_ct.=(number_format($itemCT["sotienncpb"]) != 0) ? number_format($itemCT["sotienncpb"],0,",","."):"";
        $html_ct .= '</td>
<td class="td_end"  align="right"'.$indam.'>';
                $html_ct.=(number_format($itemCT["sotiennc622pb"]) != 0) ? number_format($itemCT["sotiennc622pb"],0,",","."):"";
        $html_ct .= '</td>
      </tr>';
    }
}

$html = '
<table width="100%" border="0" style="border-bottom: 1px solid #000">
  <tr>
    <td align="left" WIDTH="55%"><B>'.$_SESSION["TenCongTy"].'</B><br/>'.$_SESSION["DiaChi"].'</td>    
    <td align="center" WIDTH="30%"></td>
    <td WIDTH="15%" align="right">
    <table border="0">
    
   <tr>
   <td><br/>MST:'.$_SESSION["MST"].'       
   </td>
</tr>

</table>
    
</td>
  </tr>
</table>
<table><tr><td></td></tr></table>
<table border="0" align="center">
  <tr>
    <td><b>'.$_SESSION["THONGTINPHIEU"]['tenphieu'].'</b></td>
  </tr>
  <tr>
    <td><b>'.$_SESSION["THONGTINPHIEU"]['ngayhoadon'].'</b></td>
  </tr>
</table>
<table width="100%" border="0" style="font-weight:bold;">
  <tr>
    <td align="left"><i>Đối tượng chi phí: Toàn bộ</i></td>
     </tr>
      <tr>
    <td align="left"><i>Tiêu chuẩn chọn phân bổ: Doanh thu</i></td>
    </tr>
      <tr>
    <td align="left"><i>Phương pháp đánh giá SP dở dang: Tỷ lệ % hoàn thành</i></td>
    </tr>
      <tr>
    <td align="left"><i>Phương pháp phân bổ: Tỷ trọng từng bộ phận so với tổng số</i></td>
  </tr>
</table>
<table width="100%" border="0">
  <tr>
    <td align="right"></td>
  </tr>
</table>
<table border="0" class="dataTable" cellpadding="2" cellspacing="0" align="center" valign="middle">'.$html_title.$html_ct.'
<tr>
    <td width="15px" STYLE="border:0.5px solid #000;"></td>
    <td width="100px" STYLE="border:0.5px solid #000;"></td>
    <td width="300px" STYLE="border:0.5px solid #000;"><b>Tổng</b></td>
     <td  width="140px" align="right" STYLE="border:0.5px solid #000;"><b>'.number_format($TongDoanhThuHopDong,0,",",".").'</b></td>
    <td  width="40x" align="right" STYLE="border:0.5px solid #000;"></td>
    <td  width="140px" align="right" STYLE="border:0.5px solid #000;"><b>'.number_format($TongTienDoanhThuThuan,0,",",".").'</b></td>
    <td  width="120px" align="right" STYLE="border:0.5px solid #000;"><b>'.number_format($TongTienCPSXCPB,0,",",".").'</b></td>
    <td  width="120px" align="right" STYLE="border:0.5px solid #000;"><b>'.number_format($TongTienCPNCPB,0,",",".").'</b></td>
    <td  width="120px" align="right" STYLE="border:0.5px solid #000;"><b>'.number_format($TongTienCPNC622PB,0,",",".").'</b></td>
  </tr>
</table>
<table><tr><td></td></tr></table>

<table width="100%" border="0" cellpadding="2">
  <tr>
  <td align="center" width="35%">&nbsp;<br/>Người lập phiếu</td>
    <td align="center" width="35%">&nbsp;<br/>Kế toán trưởng</td>
    <td width="30%" rowspan="2" align="center">
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
</body>
</html>