<?php
session_start();
$DATACIBANRA = $_SESSION["LISTCTMUAVAO"];
?>
<html>
<head><title>In bản kê mua vào (Nhấn CTRL + P để in , ALT + F4 để thoát)</title>

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
            page-break-inside: avoid;
        }
		@page {
			size: A4 landscape;
            margin-top: 5mm;
            margin-bottom: 10mm;

			}


		@media print {
			#Header, #Footer { display: none !important; }

		}
		#Header, #Footer { display: none !important; }
		 @media print
   {
      p.bodyText {font-family:times,georgia, serif;}
   }

    </style>
    <meta charset="utf-8">
</head>
<body class="dt-print-view">
<?php
$time_ngaylap = strtotime($_SESSION["THONGTINPHIEU"]['ngaylap']);
$ngaylap=date("d-m-Y",$time_ngaylap);
$html_tt='<table width="100%" border="0" style="font-size:13px;">
  <tr>
    <td align="center" WIDTH="20%"></td>    
    <td align="center" WIDTH="60%"><B><h3>PHỤ LỤC</h3></B></td>
    <td WIDTH="20%">
    <table border="0" style="font-size:11px;">
    
   <tr>
   <td align="center"><i>Mẫu số: 01 -2/GTGT<br/>
        (Ban hành kèm theo Thông tư
số 156 /2013/TT-BTC ngày
  6/11/2013 của Bộ Tài chính)
</i>
   </td>
</tr>

</table>
    
</td>
  </tr>
</table>

<table border="0" align="center">
  <tr>
    <td><b>'.$_SESSION["THONGTINPHIEU"]['tenphieu'].'</b></td>
  </tr>
  <tr>
    <td><b>(Kèm theo tờ khai thuế GTGT mẫu số 01/GTGT ngày '.$ngaylap.')</b></td>
  </tr>
  <tr>
    <td><b>[01] Kỳ tính thuế: '.$_SESSION["THONGTINPHIEU"]['ngayhoadon'].'</b></td>
  </tr>
</table>
<table border="0" cellspacing="0" cellpadding="0" width="100%" >
  <tr>
    <td width="17%">[02] Tên người nộp thuế:
    </td>
    <td>
      <table width="100%" border="0" >
        <tr>
          <td STYLE="border-bottom:0.5px dashed  #000;font-weight: bold" >'.$_SESSION['TenCongTy'].'</td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td>[03] Mã số thuế: 
    </td><td><table width="100%" border="0" STYLE="border-bottom:0.5px dashed  #000;font-weight: bold">
        <tr>
          <td>'.$_SESSION['MST'].'</td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td>[04] Tên đại lý thuế(nếu có): 
    </td><td><table width="100%" >
        <tr>
          <td STYLE="border-bottom:0.5px dashed  #000;font-weight: bold"><input style="border:0px solid #000;width:700px;font-weight:bold;" type="text" value="CTY TNHH KẾ TOÁN VÀ TƯ VẤN THUẾ CHIẾN THUẬT" /></td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td>[05] Mã số thuế: 
    </td><td><table width="100%" STYLE="border-bottom:0.5px dashed  #000;font-weight: bold">
        <tr>
          <td><input style="border:0px solid #000;width:700px;font-weight:bold;" type="text" value="2100462770" /></td>
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
    <th STYLE="border:0.5px solid #000;" width="160px" colspan="3">Hóa đơn, chứng từ, biên lai nộp thuế</th>
    <th STYLE="border:0.5px solid #000;" width="180px" rowspan="2">&nbsp;<br/>Tên người bán</th>
    <th STYLE="border:0.5px solid #000;" width="115px" rowspan="2">Mã số thuế người bán</th>
    <th STYLE="border:0.5px solid #000;" width="160px" rowspan="2">&nbsp;<br/>Mặt hàng</th>
    <th  STYLE="border:0.5px solid #000;" rowspan="2" width="90px">Giá trị HHDV mua vào chưa có thuế</th>
    <th width="27px" STYLE="border:0.5px solid #000;" rowspan="2">Thuế suất %</th>
    <th STYLE="border:0.5px solid #000;" rowspan="2">Thuế giá trị gia tăng</th>
    <th width="80px" STYLE="border:0.5px solid #000;" rowspan="2">TK có</th>
  </tr>
  <tr>
    <th STYLE="border:0.5px solid #000;" >Ký hiệu hóa đơn</th>
    <th STYLE="border:0.5px solid #000;">Số hóa đơn</th>
    <th STYLE="border:0.5px solid #000;" >Ngày tháng năm phát hành</th>
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
$sott=0;
$tongdoanhthu=0;
$tongthue=0;
foreach ($DATACIBANRA as $k=>$itemTS) {
    $html_ct .='<tr><td STYLE="border:0.5px solid #000;font-size: 15px" colspan="11" align="left"><i><b>';
    if($k==0){
        $html_ct.="Hàng hóa dịch vụ riêng cho SXKD chịu thuế GTGT và sử dụng cho các hoạt động cung cấp hàng hóa, dịch vụ không kê khai, nộp thuế GTGT đủ điều kiện khấu trừ thuế:";
    }else{
        $html_ct.="Hàng hóa, dịch vụ dùng chung cho SXKD chịu thuế và không chịu thuế đủ điều kiện khấu trừ:";
    }
    $html_ct.='</b></i></td></tr>';
    foreach ($itemTS as $itemCT) {
        $sott++;
        $tongdoanhthu+=$itemCT["thanhtien"];
        $tongthue+=$itemCT["thue"];
        $time_thanhtoan = strtotime($itemCT["ngaythanhtoan"]);
        $ngaythanhtoan="";
        if($time_thanhtoan!=""){
            $ngaythanhtoan = date("d-m-Y",$time_thanhtoan);
        }
    $html_ct .= '
        <tr >
        <td align="center" class="td_first"  >' . $itemCT["mapskt"] . '</td>
        <td class="td_center" >' . strtoupper ($itemCT["seri"]) . '</td>
        <td class="td_center" >' . $itemCT["sct"] . '</td>
        <td class="td_center" >'; $time = strtotime($itemCT["ngayhoadon"]);
        $html_ct.=date("d-m-Y",$time); $html_ct.='</td>
        <td class="td_center"  align="left">' . $itemCT["tenkh"] . '</td>
        <td class="td_center" >' . $itemCT["masothue"] . '</td>
        <td class="td_center"  align="left">' . $itemCT["tenvt"] . '</td>
        <td class="td_center" align="right" >' . number_format($itemCT["thanhtien"],0,",",".") . '</td>
        <td class="td_center" align="center" >' . number_format($itemCT["thuesuat"],0,",",".") . '</td>
        <td class="td_center" align="right" >' . number_format($itemCT["thue"],0,",",".") . '</td>
        <td class="td_end"  align="center">' . $itemCT["tkco"]. '</td>
      </tr>
    ';
}
}
$html_ct.='<tr>
    <td STYLE="border:0.5px solid #000;"></td>
    <td STYLE="border:0.5px solid #000;"></td>
    <td STYLE="border:0.5px solid #000;"></td>
    <td STYLE="border:0.5px solid #000;"></td>
    <td class="td_full" STYLE="border:0.5px solid #000;"><b>Tổng</b></td>
    <td class="td_full" STYLE="border:0.5px solid #000;"></td>
    <td class="td_full" STYLE="border:0.5px solid #000;"></td>
  
    <td class="td_full" align="right" STYLE="border:0.5px solid #000;text-align:right;"><b>'.number_format($tongdoanhthu,0,",",".").'</b></td>
    <td class="td_full" STYLE="border:0.5px solid #000;"></td>
    <td class="td_full" align="right" STYLE="border:0.5px solid #000;text-align:right;"><b>'.number_format($tongthue,0,",",".").'</b></td>
    <td class="td_full" STYLE="border:0.5px solid #000;"></td>
  </tr>
</table>';
echo $html_ct;
$html_sum='<table width="700" class="page_break" border="0">
  <tr>
    <td width="280"><strong>Tổng doanh thu hàng hóa, dịch vụ mua vào:</strong></td>
    <td width="70" align="right"><b>'.number_format($tongdoanhthu,0,",",".").'</b></td>
  </tr>
  <tr>
    <td><strong>Tổng thuế GTGT của hàng hóa, dịch vụ mua vào:</strong></td>
    <td align="right"><b>'.number_format($tongthue,0,",",".").'</b></td>
  </tr>
  <tr>
    <td colspan="2">Tôi cam đoan số liệu khai trên là đúng và chịu trách nhiệm trước pháp luật về số liệu đã khai ./.</td>
  </tr>
</table>';
	$html_foodter ='<table width="100%" border="0" class="page_break" cellpadding="2">
  <tr>
    <td width="70%">&nbsp;</td>
    <td width="30%" rowspan="2" align="center"><table width="400" border="0">
      <tr>
        <td align="center"><em>Trà Vinh Ngày ';
$time = strtotime($_SESSION["THONGTINPHIEU"]['ngaylap']);
$html_foodter.=date("d-m-Y",$time);


$html_foodter.='</em></td>
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
        <td><input style="border:0px solid #000;width:65px;" type="text" value="Họ và tên:" /><input style="border:0px solid #000;width:160px;font-weight:bold;" type="text" value="Trần Thiện Thuật" /></td>
        </tr>
      <tr>
        <td><input style="border:0px solid #000;width:157px;" type="text" value="Chứng chỉ hành nghề số:" /> <input style="border:0px solid #000;width:160px;font-weight:bold;" type="text" value="2011000948" /></td>
        </tr>
    </table></td>
  </tr>
</table>';
echo $html_sum;
echo $html_foodter;

    ?>
    </tbody>
</table>
</body>
</html>