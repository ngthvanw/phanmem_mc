<?php
session_start();
//require_once('tcpdf_include.php');
$DATACISONHATKY = $_SESSION["LISTTINHHINHNGANSACH_NSNN"];
?>
<html>
<head><title>IN TÌNH HÌNH THANH TOÁN NGÂN SÁCH NHÀ NƯỚC (Nhấn CTRL + P để in , ALT + F4 để thoát)</title>


    <style type="text/css" class="init">
        .dataTable {
            font-family: "Times New Roman", Georgia, Serif;
            border-collapse: collapse;
            width: 100%;
        }

        .dataTable td {
            padding: 1px 2px;
            font-size: 15px;

        }

        .dataTable .td_full, th {
            border: 1px solid #000000;
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
            margin-bottom: 10mm;
            margin-left: 5mm;
            margin-right: 5mm;
        }

        @media print {
            #Header, #Footer {
                display: none !important;
            }

            .page_break {
                page-break-before: always;
            }
        }
    </style>
    <meta charset="utf-8">
</head>
<body class="dt-print-view">
<?php
    $html_ct = "";
    $html_title = '
<thead>
  <tr>
   
    <th width="50px"  rowspan="1">STT</th>
    <th  width="250px"   rowspan="1">&nbsp;<br/>Tên loại thuế</th>
    <th  width="100px" rowspan="1">Số còn lại năm trước chuyển sang năm ';$html_title.=$_SESSION['NienDo'];$html_title.= '</th>
    <th width="100px"  rowspan="1">Số phát sinh phải nộp năm quyết toán</th>
    <th width="100px" rowspan="1" >Tổng số đã nộp trong năm quyết toán</th>
    <th width="100px rowspan="1" >Số còn lại phải nộp ngân sách NN</th>
  </tr>
  </thead>
  ';
$html_ct .= '
        <tr >
        <td class="td_center" style="text-align: center" >1</td>
        <td class="td_center" style="text-align: left" >- Thuế GTGT</td>
              <td class="td_center"  align="right">';
$html_ct .= (($_SESSION["DSDAUK_NSNN"]['33311']['tienco']-$_SESSION["DSDAUK_NSNN"]['33311']['tienno']) == 0) ? "" : number_format(($_SESSION["DSDAUK_NSNN"]['33311']['tienco']-$_SESSION["DSDAUK_NSNN"]['33311']['tienno']), 0, ",", ".");
        $html_ct .= '</td>
	
      <td class="td_center"  align="right">';
        $html_ct .= ($DATACISONHATKY['33311']['tienco'] == 0) ? "" : number_format($DATACISONHATKY['33311']['tienco'], 0, ",", ".");
        $html_ct .= '</td>

       <td class="td_center"  align="right">';
        $html_ct .= ($DATACISONHATKY['33311']['tienno'] == 0) ? "" : number_format($DATACISONHATKY['33311']['tienno'], 0, ",", ".");
        $html_ct .= '</td>

        <td class="td_end"  align="right">';
                $SoConPhaiNop1  = (($_SESSION["DSDAUK_NSNN"]['33311']['tienco']-$_SESSION["DSDAUK_NSNN"]['33311']['tienno'])+$DATACISONHATKY['33311']['tienco'])-$DATACISONHATKY['33311']['tienno'];
                $html_ct .= ($SoConPhaiNop1 == 0) ? "" : number_format($SoConPhaiNop1, 0, ",", ".");
                $html_ct .= '</td>
      </tr>
      
              <tr >
        <td class="td_center" style="text-align: center" >2</td>
        <td class="td_center" style="text-align: left" >- Thuế GTGT hàng nhập khẩu</td>
              <td class="td_center"  align="right">';
$html_ct .= (($_SESSION["DSDAUK_NSNN"]['33312']['tienco']-$_SESSION["DSDAUK_NSNN"]['33312']['tienno']) == 0) ? "" : number_format(($_SESSION["DSDAUK_NSNN"]['33312']['tienco']-$_SESSION["DSDAUK_NSNN"]['33312']['tienno']), 0, ",", ".");
        $html_ct .= '</td>
	
      <td class="td_center"  align="right">';
        $html_ct .= ($DATACISONHATKY['33312']['tienco'] == 0) ? "" : number_format($DATACISONHATKY['33312']['tienco'], 0, ",", ".");
        $html_ct .= '</td>

       <td class="td_center"  align="right">';
        $html_ct .= ($DATACISONHATKY['33312']['tienno'] == 0) ? "" : number_format($DATACISONHATKY['33312']['tienno'], 0, ",", ".");
        $html_ct .= '</td>

        <td class="td_end"  align="right">';
                $SoConPhaiNop2  = ($_SESSION["DSDAUK_NSNN"]['33312']['tienco']+$DATACISONHATKY['33312']['tienco'])-$DATACISONHATKY['33312']['tienno'];
                $html_ct .= ($SoConPhaiNop2 == 0) ? "" : number_format($SoConPhaiNop2, 0, ",", ".");
                $html_ct .= '</td>
      </tr>
      
                    <tr >
        <td class="td_center" style="text-align: center" >3</td>
        <td class="td_center" style="text-align: left" >- Thuế tiêu thụ dặt biệt</td>
              <td class="td_center"  align="right">';
$html_ct .= (($_SESSION["DSDAUK_NSNN"]['3332']['tienco']-$_SESSION["DSDAUK_NSNN"]['3332']['tienno']) == 0) ? "" : number_format(($_SESSION["DSDAUK_NSNN"]['3332']['tienco']-$_SESSION["DSDAUK_NSNN"]['3332']['tienno']), 0, ",", ".");
        $html_ct .= '</td>
	
      <td class="td_center"  align="right">';
        $html_ct .= ($DATACISONHATKY['3332']['tienco'] == 0) ? "" : number_format($DATACISONHATKY['3332']['tienco'], 0, ",", ".");
        $html_ct .= '</td>

       <td class="td_center"  align="right">';
        $html_ct .= ($DATACISONHATKY['3332']['tienno'] == 0) ? "" : number_format($DATACISONHATKY['3332']['tienno'], 0, ",", ".");
        $html_ct .= '</td>

        <td class="td_end"  align="right">';
                $SoConPhaiNop3  = (($_SESSION["DSDAUK_NSNN"]['3332']['tienco']-$_SESSION["DSDAUK_NSNN"]['3332']['tienno'])+$DATACISONHATKY['3332']['tienco'])-$DATACISONHATKY['3332']['tienno'];
                $html_ct .= ($SoConPhaiNop3 == 0) ? "" : number_format($SoConPhaiNop3, 0, ",", ".");
                $html_ct .= '</td>
      </tr>
      
                          <tr >
        <td class="td_center" style="text-align: center" >4</td>
        <td class="td_center" style="text-align: left" >- Thuế xuất, nhập khẩu</td>
              <td class="td_center"  align="right">';
$html_ct .= (($_SESSION["DSDAUK_NSNN"]['3333']['tienco']-$_SESSION["DSDAUK_NSNN"]['3333']['tienno']) == 0) ? "" : number_format(($_SESSION["DSDAUK_NSNN"]['3333']['tienco']-$_SESSION["DSDAUK_NSNN"]['3333']['tienno']), 0, ",", ".");
        $html_ct .= '</td>
	
      <td class="td_center"  align="right">';
        $html_ct .= ($DATACISONHATKY['3333']['tienco'] == 0) ? "" : number_format($DATACISONHATKY['3333']['tienco'], 0, ",", ".");
        $html_ct .= '</td>

       <td class="td_center"  align="right">';
        $html_ct .= ($DATACISONHATKY['3333']['tienno'] == 0) ? "" : number_format($DATACISONHATKY['3333']['tienno'], 0, ",", ".");
        $html_ct .= '</td>

        <td class="td_end"  align="right">';
                $SoConPhaiNop4  = (($_SESSION["DSDAUK_NSNN"]['3333']['tienco']-$_SESSION["DSDAUK_NSNN"]['3333']['tienno'])+$DATACISONHATKY['3333']['tienco'])-$DATACISONHATKY['3333']['tienno'];
                $html_ct .= ($SoConPhaiNop4 == 0) ? "" : number_format($SoConPhaiNop4, 0, ",", ".");
                $html_ct .= '</td>
      </tr>
      
                                <tr >
        <td class="td_center" style="text-align: center" >5</td>
        <td class="td_center" style="text-align: left" >- Thuế thu nhập doanh nghiệp</td>
              <td class="td_center"  align="right">';
$html_ct .= (($_SESSION["DSDAUK_NSNN"]['3334']['tienco']-$_SESSION["DSDAUK_NSNN"]['3334']['tienno']) == 0) ? "" : number_format(($_SESSION["DSDAUK_NSNN"]['3334']['tienco']-$_SESSION["DSDAUK_NSNN"]['3334']['tienno']), 0, ",", ".");
        $html_ct .= '</td>
	
      <td class="td_center"  align="right">';
        $html_ct .= ($DATACISONHATKY['3334']['tienco'] == 0) ? "" : number_format($DATACISONHATKY['3334']['tienco'], 0, ",", ".");
        $html_ct .= '</td>

       <td class="td_center"  align="right">';
        $html_ct .= ($DATACISONHATKY['3334']['tienno'] == 0) ? "" : number_format($DATACISONHATKY['3334']['tienno'], 0, ",", ".");
        $html_ct .= '</td>

        <td class="td_end"  align="right">';
                $SoConPhaiNop5  = (($_SESSION["DSDAUK_NSNN"]['3334']['tienco']-$_SESSION["DSDAUK_NSNN"]['3334']['tienno'])+$DATACISONHATKY['3334']['tienco'])-$DATACISONHATKY['3334']['tienno'];
                $html_ct .= ($SoConPhaiNop5 == 0) ? "" : number_format($SoConPhaiNop5, 0, ",", ".");
                $html_ct .= '</td>
      </tr>
      
      <tr >
        <td class="td_center" style="text-align: center" >6</td>
        <td class="td_center" style="text-align: left" >- Thuế thu nhập cá nhân</td>
              <td class="td_center"  align="right">';
$html_ct .= (($_SESSION["DSDAUK_NSNN"]['3335']['tienco']-$_SESSION["DSDAUK_NSNN"]['3335']['tienno']) == 0) ? "" : number_format(($_SESSION["DSDAUK_NSNN"]['3335']['tienco']-$_SESSION["DSDAUK_NSNN"]['3335']['tienno']), 0, ",", ".");
        $html_ct .= '</td>
	
      <td class="td_center"  align="right">';
        $html_ct .= ($DATACISONHATKY['3335']['tienco'] == 0) ? "" : number_format($DATACISONHATKY['3335']['tienco'], 0, ",", ".");
        $html_ct .= '</td>

       <td class="td_center"  align="right">';
        $html_ct .= ($DATACISONHATKY['3335']['tienno'] == 0) ? "" : number_format($DATACISONHATKY['3335']['tienno'], 0, ",", ".");
        $html_ct .= '</td>

        <td class="td_end"  align="right">';
                $SoConPhaiNop6  = (($_SESSION["DSDAUK_NSNN"]['3335']['tienco']-$_SESSION["DSDAUK_NSNN"]['3335']['tienno'])+$DATACISONHATKY['3335']['tienco'])-$DATACISONHATKY['3335']['tienno'];
                $html_ct .= ($SoConPhaiNop6 == 0) ? "" : number_format($SoConPhaiNop6, 0, ",", ".");
                $html_ct .= '</td>
      </tr>
      
            <tr >
        <td class="td_center" style="text-align: center" >7</td>
        <td class="td_center" style="text-align: left" >- Thuế tài nguyên</td>
              <td class="td_center"  align="right">';
$html_ct .= (($_SESSION["DSDAUK_NSNN"]['3336']['tienco']-$_SESSION["DSDAUK_NSNN"]['3336']['tienno']) == 0) ? "" : number_format(($_SESSION["DSDAUK_NSNN"]['3336']['tienco']-$_SESSION["DSDAUK_NSNN"]['3336']['tienno']), 0, ",", ".");
        $html_ct .= '</td>
	
      <td class="td_center"  align="right">';
        $html_ct .= ($DATACISONHATKY['3336']['tienco'] == 0) ? "" : number_format($DATACISONHATKY['3336']['tienco'], 0, ",", ".");
        $html_ct .= '</td>

       <td class="td_center"  align="right">';
        $html_ct .= ($DATACISONHATKY['3336']['tienno'] == 0) ? "" : number_format($DATACISONHATKY['3336']['tienno'], 0, ",", ".");
        $html_ct .= '</td>

        <td class="td_end"  align="right">';
                $SoConPhaiNop7  = (($_SESSION["DSDAUK_NSNN"]['3336']['tienco']-$_SESSION["DSDAUK_NSNN"]['3336']['tienno'])+$DATACISONHATKY['3336']['tienco'])-$DATACISONHATKY['3336']['tienno'];
                $html_ct .= ($SoConPhaiNop7 == 0) ? "" : number_format($SoConPhaiNop7, 0, ",", ".");
                $html_ct .= '</td>
      </tr>
      
                  <tr >
        <td class="td_center" style="text-align: center" >8</td>
        <td class="td_center" style="text-align: left" >- Thuế nhà đất, tiền thuê đất</td>
              <td class="td_center"  align="right">';
$html_ct .= (($_SESSION["DSDAUK_NSNN"]['3337']['tienco']-$_SESSION["DSDAUK_NSNN"]['3337']['tienno'])== 0) ? "" : number_format(($_SESSION["DSDAUK_NSNN"]['3337']['tienco']-$_SESSION["DSDAUK_NSNN"]['3337']['tienno']), 0, ",", ".");
        $html_ct .= '</td>
	
      <td class="td_center"  align="right">';
        $html_ct .= ($DATACISONHATKY['3337']['tienco'] == 0) ? "" : number_format($DATACISONHATKY['3337']['tienco'], 0, ",", ".");
        $html_ct .= '</td>

       <td class="td_center"  align="right">';
        $html_ct .= ($DATACISONHATKY['3337']['tienno'] == 0) ? "" : number_format($DATACISONHATKY['3337']['tienno'], 0, ",", ".");
        $html_ct .= '</td>

        <td class="td_end"  align="right">';
                $SoConPhaiNop8  = (($_SESSION["DSDAUK_NSNN"]['3337']['tienco']-$_SESSION["DSDAUK_NSNN"]['3337']['tienno'])+$DATACISONHATKY['3337']['tienco'])-$DATACISONHATKY['3337']['tienno'];
                $html_ct .= ($SoConPhaiNop8 == 0) ? "" : number_format($SoConPhaiNop8, 0, ",", ".");
                $html_ct .= '</td>
      </tr>
      
                        <tr >
        <td class="td_center" style="text-align: center" >9</td>
        <td class="td_center" style="text-align: left" >- Thuế bảo vệ môi trường</td>
              <td class="td_center"  align="right">';
$html_ct .= (($_SESSION["DSDAUK_NSNN"]['33381']['tienco']-$_SESSION["DSDAUK_NSNN"]['33381']['tienno']) == 0) ? "" : number_format(($_SESSION["DSDAUK_NSNN"]['33381']['tienco']-$_SESSION["DSDAUK_NSNN"]['33381']['tienno']), 0, ",", ".");
        $html_ct .= '</td>
	
      <td class="td_center"  align="right">';
        $html_ct .= ($DATACISONHATKY['33381']['tienco'] == 0) ? "" : number_format($DATACISONHATKY['33381']['tienco'], 0, ",", ".");
        $html_ct .= '</td>

       <td class="td_center"  align="right">';
        $html_ct .= ($DATACISONHATKY['33381']['tienno'] == 0) ? "" : number_format($DATACISONHATKY['33381']['tienno'], 0, ",", ".");
        $html_ct .= '</td>

        <td class="td_end"  align="right">';
                $SoConPhaiNop9  = (($_SESSION["DSDAUK_NSNN"]['33381']['tienco']-$_SESSION["DSDAUK_NSNN"]['33381']['tienno'])+$DATACISONHATKY['33381']['tienco'])-$DATACISONHATKY['33381']['tienno'];
                $html_ct .= ($SoConPhaiNop9 == 0) ? "" : number_format($SoConPhaiNop9, 0, ",", ".");
                $html_ct .= '</td>
      </tr>
      
                              <tr >
        <td class="td_center" style="text-align: center" >10</td>
        <td class="td_center" style="text-align: left" >- Các loại thuế khác</td>
              <td class="td_center"  align="right">';
$html_ct .= (($_SESSION["DSDAUK_NSNN"]['33382']['tienco']-$_SESSION["DSDAUK_NSNN"]['33382']['tienno']) == 0) ? "" : number_format(($_SESSION["DSDAUK_NSNN"]['33382']['tienco']-$_SESSION["DSDAUK_NSNN"]['33382']['tienno']), 0, ",", ".");
        $html_ct .= '</td>
	
      <td class="td_center"  align="right">';
        $html_ct .= ($DATACISONHATKY['33382']['tienco'] == 0) ? "" : number_format($DATACISONHATKY['33382']['tienco'], 0, ",", ".");
        $html_ct .= '</td>

       <td class="td_center"  align="right">';
        $html_ct .= ($DATACISONHATKY['33382']['tienno'] == 0) ? "" : number_format($DATACISONHATKY['33382']['tienno'], 0, ",", ".");
        $html_ct .= '</td>

        <td class="td_end"  align="right">';
                $SoConPhaiNop10  = ($_SESSION["DSDAUK_NSNN"]['33382']['tienco']+$DATACISONHATKY['33382']['tienco'])-$DATACISONHATKY['33382']['tienno'];
                $html_ct .= ($SoConPhaiNop10 == 0) ? "" : number_format($SoConPhaiNop10, 0, ",", ".");
                $html_ct .= '</td>
      </tr>
      
                                    <tr >
        <td class="td_center" style="text-align: center" >11</td>
        <td class="td_center" style="text-align: left" >- Thuế môn bài</td>
              <td class="td_center"  align="right">';
$html_ct .= (($_SESSION["DSDAUK_NSNN"]['33391']['tienco']-$_SESSION["DSDAUK_NSNN"]['33391']['tienno']) == 0) ? "" : number_format(($_SESSION["DSDAUK_NSNN"]['33391']['tienco']-$_SESSION["DSDAUK_NSNN"]['33391']['tienno']), 0, ",", ".");
        $html_ct .= '</td>
	
      <td class="td_center"  align="right">';
        $html_ct .= ($DATACISONHATKY['33391']['tienco'] == 0) ? "" : number_format($DATACISONHATKY['33391']['tienco'], 0, ",", ".");
        $html_ct .= '</td>

       <td class="td_center"  align="right">';
        $html_ct .= ($DATACISONHATKY['33391']['tienno'] == 0) ? "" : number_format($DATACISONHATKY['33391']['tienno'], 0, ",", ".");
        $html_ct .= '</td>

        <td class="td_end"  align="right">';
                $SoConPhaiNop11  = (($_SESSION["DSDAUK_NSNN"]['33391']['tienco']-$_SESSION["DSDAUK_NSNN"]['33391']['tienno'])+$DATACISONHATKY['33391']['tienco'])-$DATACISONHATKY['33391']['tienno'];
                $html_ct .= ($SoConPhaiNop11 == 0) ? "" : number_format($SoConPhaiNop11, 0, ",", ".");
                $html_ct .= '</td>
      </tr>
      
                                          <tr >
        <td class="td_center" style="text-align: center" >12</td>
        <td class="td_center" style="text-align: left" >- Các khoản phải nộp khác</td>
              <td class="td_center"  align="right">';
$html_ct .= (($_SESSION["DSDAUK_NSNN"]['33392']['tienco']-$_SESSION["DSDAUK_NSNN"]['33392']['tienno']) == 0) ? "" : number_format(($_SESSION["DSDAUK_NSNN"]['33392']['tienco']-$_SESSION["DSDAUK_NSNN"]['33392']['tienno']), 0, ",", ".");
        $html_ct .= '</td>
	
      <td class="td_center"  align="right">';
        $html_ct .= ($DATACISONHATKY['33392']['tienco'] == 0) ? "" : number_format($DATACISONHATKY['33392']['tienco'], 0, ",", ".");
        $html_ct .= '</td>

       <td class="td_center"  align="right">';
        $html_ct .= ($DATACISONHATKY['33392']['tienno'] == 0) ? "" : number_format($DATACISONHATKY['33392']['tienno'], 0, ",", ".");
        $html_ct .= '</td>

        <td class="td_end"  align="right">';
                $SoConPhaiNop12  = (($_SESSION["DSDAUK_NSNN"]['33392']['tienco']-$_SESSION["DSDAUK_NSNN"]['33392']['tienno'])+$DATACISONHATKY['33392']['tienco'])-$DATACISONHATKY['33392']['tienno'];
                $html_ct .= ($SoConPhaiNop12 == 0) ? "" : number_format($SoConPhaiNop12, 0, ",", ".");
                $html_ct .= '</td>
      </tr>
      ';

    $html = '
<table width="100%" border="0">
  <tr>   
    <td align="center" WIDTH="100%">Cộng Hoà Xã Hội Chủ Nghĩa Việt Nam<br/>Độc Lập-Tự Do-Hạnh Phúc<br/></td>
</tr>
    <tr>
    <td  align="center">&nbsp;</td>
  </tr>
</table>
    
</td>
  </tr>
</table>
<table><tr><td></td></tr></table>
<table border="0" width="60%" align="center">
  <tr>
    <td  align="center"><b>' . $_SESSION["THONGTINPHIEU_NSNN"]['tenphieu'] . '</b></td>
  </tr>
    <tr>
    <td  align="center">&nbsp;</td>
  </tr>

</table>
<table border="0" width="100%" align="left">
  <tr>
    <td  align="left">Tên dơn vị: <b>'.$_SESSION["TenCongTy"].'</b></td>
    <td  align="left">Mã số thuế: <b>'.$_SESSION["MST"].'</b></td>
  </tr>
  <tr>
    <td  align="left" colspan="2">Địa chỉ: <b>'.$_SESSION["DiaChi"].'</b></td>
  </tr>
   <tr>
    <td  align="left">Năm quyết toán: <b>' . $_SESSION["THONGTINPHIEU_NSNN"]['ngayhoadon'] . '</b></td>
  </tr>

</table>

<table width="100%" border="0">
  <tr>
    <td align="right"></td>
  </tr>
</table>
<table border="0" class="dataTable" cellpadding="2" cellspacing="0" align="center" valign="middle">' . $html_title . $html_ct . '
<tr>
    <td class="td_full" ></td>
    <td class="td_full" align="right" ><b>Tổng cộng</b></td>';
	 	$html .= '<td class="td_full"  align="right"><b>';
	$TongConLaiNamTruoc = (($_SESSION["DSDAUK_NSNN"]['33311']['tienco']-$_SESSION["DSDAUK_NSNN"]['33311']['tienno'])+($_SESSION["DSDAUK_NSNN"]['33312']['tienco']-$_SESSION["DSDAUK_NSNN"]['33312']['tienno'])+($_SESSION["DSDAUK_NSNN"]['3332']['tienco']-$_SESSION["DSDAUK_NSNN"]['3332']['tienno'])+($_SESSION["DSDAUK_NSNN"]['3333']['tienco']-$_SESSION["DSDAUK_NSNN"]['3333']['tienno'])+($_SESSION["DSDAUK_NSNN"]['3334']['tienco']-$_SESSION["DSDAUK_NSNN"]['3334']['tienno'])+($_SESSION["DSDAUK_NSNN"]['3335']['tienco']-$_SESSION["DSDAUK_NSNN"]['3335']['tienno'])+($_SESSION["DSDAUK_NSNN"]['3336']['tienco']-$_SESSION["DSDAUK_NSNN"]['3336']['tienno'])+($_SESSION["DSDAUK_NSNN"]['3337']['tienco']-$_SESSION["DSDAUK_NSNN"]['3337']['tienno'])+($_SESSION["DSDAUK_NSNN"]['33381']['tienco']-$_SESSION["DSDAUK_NSNN"]['33381']['tienno'])+($_SESSION["DSDAUK_NSNN"]['33382']['tienco']-$_SESSION["DSDAUK_NSNN"]['33382']['tienno'])+($_SESSION["DSDAUK_NSNN"]['33391']['tienco']-$_SESSION["DSDAUK_NSNN"]['33391']['tienno'])+($_SESSION["DSDAUK_NSNN"]['33392']['tienco']-$_SESSION["DSDAUK_NSNN"]['33392']['tienno']));
$html .= ($TongConLaiNamTruoc == 0) ? "" : number_format($TongConLaiNamTruoc, 0, ",", ".");
                $html .= '</b></td>';

    	 	$html .= '<td class="td_full"  align="right"><b>';
	$TongPSTrongNam = ($DATACISONHATKY['33311']['tienco']+$DATACISONHATKY['33312']['tienco']+$DATACISONHATKY['3332']['tienco']+$DATACISONHATKY['3333']['tienco']+$DATACISONHATKY['3334']['tienco']+$DATACISONHATKY['3335']['tienco']+$DATACISONHATKY['3336']['tienco']+$DATACISONHATKY['3337']['tienco']+$DATACISONHATKY['33381']['tienco']+$DATACISONHATKY['33382']['tienco']+$DATACISONHATKY['33391']['tienco']+$DATACISONHATKY['33392']['tienco']);
$html .= ($TongPSTrongNam == 0) ? "" : number_format($TongPSTrongNam, 0, ",", ".");
                $html .= '</b></td>';

        	 	$html .= '<td class="td_full"  align="right"><b>';
	$TongDaNopTrongNam = ($DATACISONHATKY['33311']['tienno']+$DATACISONHATKY['33312']['tienno']+$DATACISONHATKY['3332']['tienno']+$DATACISONHATKY['3333']['tienno']+$DATACISONHATKY['3334']['tienno']+$DATACISONHATKY['3335']['tienno']+$DATACISONHATKY['3336']['tienno']+$DATACISONHATKY['3337']['tienno']+$DATACISONHATKY['33381']['tienno']+$DATACISONHATKY['33382']['tienno']+$DATACISONHATKY['33391']['tienno']+$DATACISONHATKY['33392']['tienno']);
$html .= ($TongDaNopTrongNam == 0) ? "" : number_format($TongDaNopTrongNam, 0, ",", ".");
                $html .= '</b></td>';

 
	$html .= '<td class="td_full"  align="right"><b>';
	$TongConLaiPhaiNop = ($SoConPhaiNop1+$SoConPhaiNop2+$SoConPhaiNop3+$SoConPhaiNop4+$SoConPhaiNop5+$SoConPhaiNop6+$SoConPhaiNop7+$SoConPhaiNop8+$SoConPhaiNop9+$SoConPhaiNop10+$SoConPhaiNop11+$SoConPhaiNop12);
$html .= ($TongConLaiPhaiNop == 0) ? "" : number_format($TongConLaiPhaiNop, 0, ",", ".");
                $html .= '</b></td>

  </tr>
  
</table>
<table width="100%" cellpadding="2"><tr><td></td></tr></table>
<table><tr><td></td></tr></table>

<table width="100%" border="0" cellpadding="2">
  <tr>
  <td align="center" width="35%">&nbsp;<br/>Người lập biểu</td>
    <td align="center" width="35%">&nbsp;<br/>Kế toán trưởng</td>
    <td width="30%" rowspan="2" align="center">
    <em>Ngày ';
    $time = strtotime($_SESSION["THONGTINPHIEU_NSNN"]['ngaylap']);
    $html .= date("d-m-Y", $time);
    $html .= '</em><br/>Người đại diện theo pháp luật
   </td>
  </tr>
  <tr>
    <td></td>
  </tr>
</table>
';
echo $html;

?>
</body>
</html>

