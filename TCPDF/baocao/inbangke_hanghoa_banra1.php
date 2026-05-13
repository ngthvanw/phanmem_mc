<?php
session_start();
$DATACIBANRA = $_SESSION["LISTCTBANRA"];
?>
<html>
<head><title>In bản kê mua vào</title>

    <link rel="stylesheet" type="text/css"
          href="https://cdn.datatables.net/buttons/1.3.1/css/buttons.dataTables.min.css">
    <style type="text/css" class="init">
        .dataTable {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        .dataTable td, th {
            border: 1px solid #000000;
            text-align: left;
            padding: 3px;
            font-size: 13px;
        }
        body{
            width: 297mm;
        }
    </style>
    <meta charset="utf-8">
</head>
<body class="dt-print-view">
<?php
$html_tt='<table width="100%" border="0">
  <tr>
    <td align="center" WIDTH="20%"></td>    
    <td align="center" WIDTH="60%"><B><h3>PHỤ LỤC</h3></B></td>
    <td WIDTH="20%">
    <table border="0">
    
   <tr>
   <td align="center"><i>Mẫu số 01-1/GTGT<br/>
        (Ban hành kèm theo thông tư số 26/12/2011 của Bộ Tài Chính)</i>
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
    <td><b>(Kèo theo tờ khai thuế GTGT mẫ số 01/GTGT ngày 16/02/2017)</b></td>
  </tr>
  <tr>
    <td><b>[01] Kỳ tính thuế: '.$_SESSION["THONGTINPHIEU"]['ngayhoadon'].'</b></td>
  </tr>
</table>
<table border="0" cellspacing="1" cellpadding="1" width="100%">
  <tr>
    <td width="17%">[02] Tên người nộp thuế:
    </td>
    <td>
      <table width="100%" border="0" STYLE="border-bottom:0.5px solid #000;font-weight: bold ">
        <tr>
          <td>'.$_SESSION['TenCongTy'].'</td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td>[03] Mã số thuế: 
    </td><td><table width="100%" border="0" STYLE="border-bottom:0.5px solid #000;font-weight: bold">
        <tr>
          <td>'.$_SESSION['MST'].'</td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td>[04] Tên đại lý thuế(nếu có): 
    </td><td><table width="100%" STYLE="border-bottom:0.5px solid #000;font-weight: bold">
        <tr>
          <td>CTY KẾ TOÁN VÀ TƯ VẤN THUẾ CHIẾN THUẬT</td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td>[05] Mã số thuế: 
    </td><td><table width="100%" STYLE="border-bottom:0.5px solid #000;font-weight: bold">
        <tr>
          <td>2100462770</td>
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
    <td align="right">Đơn vị tiền: <b>Đồng Việt Nam</b></td>
  </tr>
</table>';
echo $html_tt;
?>
<div></div>
<table class="display dataTable" width="100%" border="0.4" cellspacing="1" cellpadding="1">
    <thead>
    <tr>
        <th  width="20px" rowspan="2">&nbsp;<br/>STT</th>
        <th  width="180px" colspan="3">Hóa đơn, chứng từ bán ra</th>
        <th  width="180px" rowspan="2">&nbsp;<br/>Tên người mua</th>
        <th  width="67px" rowspan="2">Mã số thuế người mua</th>
        <th  width="100px" rowspan="2">&nbsp;<br/>Mặt hàng</th>
        <th  rowspan="2">Doanh số chưa có thuế</th>
        <th  rowspan="2">Thuế giá trị gia tăng</th>
        <th  rowspan="2">&nbsp;<br/>Ghi chú</th>
    </tr>
    <tr>
        <th  >Ký hiệu hóa đơn</th>
        <th >Số hóa đơn</th>
        <th  >Ngày tháng năm phát hành</th>
    </tr>
    <tr>
        <th >(1)</th>
        <th >(2)</th>
        <th >(3)</th>
        <th >(4)</th>
        <th >(5)</th>
        <th >(6)</th>
        <th >(7)</th>
        <th >(8)</th>
        <th >(9)</th>
        <th >(10)</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $sott=0;
    $tongdoanhthu=0;
    $tongthue=0;
    foreach ($DATACIBANRA as $k=>$itemTS) {
        if($k=="-0"){
            $html_ct .='<tr><td  colspan="10" align="left"><i><b>Hàng hóa, dịch vụ không chiu thuế GTGT</b></i></td></tr>';
        }else{
            $html_ct .='<tr><td  colspan="10" align="left"><i><b>Hàng hóa, dịch vụ chiu thuế GTGT '.$k.' %</b></i></td></tr>';
        }
        $tongdoanhthu_theothue=0;
        $tongthue_theothue=0;
        foreach ($itemTS as $itemCT) {
            $sott++;
            $tongdoanhthu += $itemCT["thanhtien"];
            $tongthue += $itemCT["thue"];
            $tongdoanhthu_theothue += $itemCT["thanhtien"];
            $tongthue_theothue += $itemCT["thue"];
            $html_ct .= '
        <tr >
        <td >' . $sott . '</td>
        <td>' . strtoupper($itemCT["seri"]) . '</td>
        <td >' . $itemCT["sct"] . '</td>
        <td >';
            $time = strtotime($itemCT["ngayghiso"]);
            $html_ct .= date("d-m-Y", $time);
            $html_ct .= '</td>
        <td align="left">' . $itemCT["tenkh"] . '</td>
        <td >' . $itemCT["masothue"] . '</td>
        <td  align="left">' . $itemCT["tenvt"] . '</td>
        <td  align="right">' . number_format($itemCT["thanhtien"], 0, ",", ".") . '</td>
        <td  align="right">' . number_format($itemCT["thue"], 0, ",", ".") . '</td>
        <td align="left">' . $itemCT["chuthich"] . '</td>
      </tr>
    ';
        }
        $html_ct .= '
        <tr >
        <td  align="right" colspan="7" ><b>Tổng</b></td>

        <td  align="right"><b>' . number_format($tongdoanhthu_theothue,0,",",".") . '</b></td>
        <td  align="right"><b>' . number_format($tongthue_theothue,0,",",".") . '</b></td>
        <td  align="left"></td>
      </tr>
    ';
        echo $html_ct;
    }
$html_sum='<table width="700" border="0">
  <tr>
    <td width="280"><strong>Tổng doanh thu hàng hóa, dịch vụ bán ra:</strong></td>
    <td width="70" align="right"><b>'.number_format($tongdoanhthu,0,",",".").'</b></td>
  </tr>
  <tr>
    <td><strong>Tổng doanh thu hàng hóa, dịch vụ bán ra chịu thuế GTGT:</strong></td>
    <td align="right"><b>'.number_format($tongdoanhthu,0,",",".").'</b></td>
  </tr>
  <tr>
    <td><strong>Tổng thuế GTGT của hàng hóa, dịch vụ bán ra:</strong></td>
    <td align="right"><b>'.number_format($tongthue,0,",",".").'</b></td>
  </tr>
  <tr>
    <td colspan="2">Tôi cam đoan số liệu khai trên là đúng và chịu trách nhiệm trước pháp luật về số liệu đã khai ./.</td>
  </tr>
</table>';
	$html_foodter ='<table width="100%" border="0" cellpadding="2">
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