<?php
session_start();
$DATACIBANRA = $_SESSION["LISTCTBANRA"];
?>
<html>
<head><title>DataTables example - Disable auto print</title>

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
        <th  width="200px" colspan="3">Hóa đơn, chứng từ bán ra</th>
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

    ?>
    </tbody>
</table>
</body>
</html>