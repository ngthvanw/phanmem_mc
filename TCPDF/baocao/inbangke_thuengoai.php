<?php
session_start();
//require_once('tcpdf_include.php');
$DATACISONHATKY = $_SESSION['BANGTHUENGOAI'];
$ten = $_GET['ten'];
$ngaylap = $_GET['ngaylap'];
function convert_number_to_words( $number )
{
    $hyphen = ' ';
    $conjunction = '  ';
    $separator = ' ';
    $negative = 'âm ';
    $decimal = ' phẩy ';
    $dictionary = array(
        0 => 'không',
        1 => 'một',
        2 => 'hai',
        3 => 'ba',
        4 => 'bốn',
        5 => 'năm',
        6 => 'sáu',
        7 => 'bảy',
        8 => 'tám',
        9 => 'chín',
        10 => 'mười',
        11 => 'mười một',
        12 => 'mười hai',
        13 => 'mười ba',
        14 => 'mười bốn',
        15 => 'mười năm',
        16 => 'mười sáu',
        17 => 'mười bảy',
        18 => 'mười tám',
        19 => 'mười chín',
        20 => 'hai mươi',
        30 => 'ba mươi',
        40 => 'bốn mươi',
        50 => 'năm mươi',
        60 => 'sáu mươi',
        70 => 'bảy mươi',
        80 => 'tám mươi',
        90 => 'chín mươi',
        100 => 'trăm',
        1000 => 'ngàn',
        1000000 => 'triệu',
        1000000000 => 'tỷ',
        1000000000000 => 'nghìn tỷ',
        1000000000000000 => 'ngàn triệu triệu',
        1000000000000000000 => 'tỷ tỷ'
    );

    if( !is_numeric( $number ) )
    {
        return false;
    }

    if( ($number >= 0 && (int)$number < 0) || (int)$number < 0 - PHP_INT_MAX )
    {
        // overflow
        trigger_error( 'convert_number_to_words only accepts numbers between -' . PHP_INT_MAX . ' and ' . PHP_INT_MAX, E_USER_WARNING );
        return false;
    }

    if( $number < 0 )
    {
        return $negative . convert_number_to_words( abs( $number ) );
    }

    $string = $fraction = null;

    if( strpos( $number, '.' ) !== false )
    {
        list( $number, $fraction ) = explode( '.', $number );
    }

    switch (true)
    {
        case $number < 21:
            $string = $dictionary[$number];
            break;
        case $number < 100:
            $tens = ((int)($number / 10)) * 10;
            $units = $number % 10;
            $string = $dictionary[$tens];
            if( $units )
            {
                $string .= $hyphen . $dictionary[$units];
            }
            break;
        case $number < 1000:
            $hundreds = $number / 100;
            $remainder = $number % 100;
            $string = $dictionary[$hundreds] . ' ' . $dictionary[100];
            if( $remainder )
            {
                $string .= $conjunction . convert_number_to_words( $remainder );
            }
            break;
        default:
            $baseUnit = pow( 1000, floor( log( $number, 1000 ) ) );
            $numBaseUnits = (int)($number / $baseUnit);
            $remainder = $number % $baseUnit;
            $string = convert_number_to_words( $numBaseUnits ) . ' ' . $dictionary[$baseUnit];
            if( $remainder )
            {
                $string .= $remainder < 100 ? $conjunction : $separator;
                $string .= convert_number_to_words( $remainder );
            }
            break;
    }

    if( null !== $fraction && is_numeric( $fraction ) )
    {
        $string .= $decimal;
        $words = array( );
        foreach( str_split((string) $fraction) as $number )
        {
            $words[] = $dictionary[$number];
        }
        $string .= implode( ' ', $words );
    }

    return ($string);
}
?>
<html>
<head><title>IN BẢNG KÊ CHI TIỀN (Nhấn CTRL + P để in , ALT + F4 để thoát)</title>


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
            width: 297mm;
        }

        @page {
            size: A4 landscape;
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
    <th  width="200px"   rowspan="1">&nbsp;<br/>Họ và tên người được thuê</th>
    <th  width="100px" rowspan="1">Địa chỉ hoặc số CMND</th>
    <th width="150px"  rowspan="1">Nội dung hoặc tên CV thuê</th>
    <th width="70px" rowspan="1" >Số công hoặc KLCV đã làm</th>
    <th width="90px rowspan="1" >Đơn giá thanh toán</th>
    <th width="100px rowspan="1" >Thành tiền</th>
    <th width="90px rowspan="1" >Thuế TNCN</th>
    <th width="100px rowspan="1" >Thực lĩnh</th>
    <th width="100px rowspan="1" >Ký nhận</th>
  </tr>
    <tr>
   
    <th   rowspan="1">A</th>
    <th   rowspan="1">B</th>
    <th  rowspan="1">C</th>
    <th  rowspan="1">D</th>
    <th  rowspan="1" >1</th>
    <th  rowspan="1" >2</th>
    <th  rowspan="1" >3</th>
    <th  rowspan="1" >4</th>
    <th  rowspan="1" >5=3-4</th>
    <th rowspan="1" >E</th>
  </tr>
  </thead>
  ';
$i = 0;
$danhsach = $DATACISONHATKY['danhsach'];
krsort($danhsach);
foreach ($danhsach as $iTem) {
    $i++;
    $html_ct .= '
        <tr >
        <td class="td_center" style="text-align: center" >' . $i . '</td>
        <td class="td_center"  align="left">';
    $html_ct .= $iTem['hoten'];
    $html_ct .= '</td>
              <td class="td_center"  align="left">';
    $html_ct .= $iTem['diachi'];
    $html_ct .= '</td>
	
      <td class="td_center"  align="left">';
    $html_ct .= $iTem['noidung'];
    $html_ct .= '</td>

       <td class="td_center"  align="right">';
    $html_ct .= ($iTem['socong'] == 0) ? "" : $iTem['socong'];
    $html_ct .= '</td>

        <td class="td_center"  align="right">';
    $DonGia += $iTem['dongia'];
    $html_ct .= ($iTem['dongia'] == 0) ? "" : number_format($iTem['dongia'], 0, ",", ".");
    $html_ct .= '</td>
        <td class="td_center"  align="right">';
    $ThanhTien += $iTem['thanhtien'];
    $html_ct .= ($iTem['thanhtien'] == 0) ? "" : number_format($iTem['thanhtien'], 0, ",", ".");
    $html_ct .= '</td>
        <td class="td_center"  align="right">';
    $ThueTNCN += $iTem['thuetncn'];
    $html_ct .= ($iTem['thuetncn'] == 0) ? "" : number_format($iTem['thuetncn'], 0, ",", ".");
    $html_ct .= '</td>
        <td class="td_center"  align="right">';
    $ThucLinh += $iTem['thuclinh'];
    $html_ct .= ($iTem['thuclinh'] == 0) ? "" : number_format($iTem['thuclinh'], 0, ",", ".");
    $html_ct .= '</td>
<td class="td_end" style="text-align: center" ></td>
      </tr>';
}

$html = '
<table width="100%" border="0">
  <tr>   
    <td align="left" WIDTH="40%">Đơn vị: ' . $_SESSION["TenCongTy"] . ' <br/>Bộ phận :.........................................................</td>
    <td align="center" WIDTH="30%"></td>
    <td align="center" style="font-size: 14px;" WIDTH="30%">Mẫu số 07 - VT<br/>(Ban hành theo thông tư số 133/2016/TT-BTC ngày 26 tháng 08 năm 2016)<br/></td>
</tr>
    <tr>
    <td  align="center">&nbsp;</td>
    <td  align="center">&nbsp;</td>
    <td  align="center">&nbsp;</td>
  </tr>
</table>
    
</td>
  </tr>
</table>
<table><tr><td></td></tr></table>
<table border="0" width="60%" align="center">
  <tr>
    <td  align="center"><b>' . $ten . '</b><br/>( Dùng cho thuê nhân công, thuê khoán việc )</td>
  </tr>
    <tr>
    <td  align="center">&nbsp;</td>
  </tr>

</table>
<table border="0" width="100%" align="left">
  <tr>
    <td  align="left">Họ và tên người chi: <b>' . $DATACISONHATKY['hotennguoichi'] . '</b></td>
    <td  align="right"> Số:...........</td>
  </tr>
  <tr>
    <td  align="left" colspan="2">Bộ phận(VP,CN): <b>' . $DATACISONHATKY['bophan'] . '</b></td>
  </tr>
   <tr>
    <td  align="left">Chi cho công việc: <b>' . $DATACISONHATKY['lydochi'] . '</b></td>
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
$html .= '<td class="td_full"  align="right"></td>';

$html .= '<td class="td_full"  align="right"></td>';

$html .= '<td class="td_full"  align="right"></td>';


$html .= '<td class="td_full"  align="right"><b>';
$html .= ($DonGia == 0) ? "" : number_format($DonGia, 0, ",", ".");
$html .= '</b></td>
        <td class="td_full"  align="right"><b>';
$html .= ($ThanhTien == 0) ? "" : number_format($ThanhTien, 0, ",", ".");
$html .= '</b></td>
        <td class="td_full"  align="right"><b>';
$html .= ($ThueTNCN == 0) ? "" : number_format($ThueTNCN, 0, ",", ".");
$html .= '</b></td>
        <td class="td_full"  align="right"><b>';
$html .= ($ThucLinh == 0) ? "" : number_format($ThucLinh, 0, ",", ".");
$html .= '</b></td>
<td class="td_full" ></td>

  </tr>
  
</table>
<table width="100%" cellpadding="2"><tr><td></td></tr></table>
<table><tr><td></td></tr></table>

<table width="100%" border="0" cellpadding="2">
  <tr>
    <td colspan="3">Đề nghị....................................................cho thanh toán số tiền: ';
$html .= number_format($ThucLinh, 0, ",", ".");
$html.=' đồng</td>
  </tr>
    <tr>
    <td colspan="3">Bằng chữ: <b>';
$html .= ucfirst(convert_number_to_words($ThucLinh));
$html.='</b></td>
  </tr>
    <tr>
    <td colspan="3"><i>(Kèm theo .... chứng từ gốc)</i></td>
  </tr>
  <tr>
  <td align="center" width="35%">&nbsp; Người đề nghị thanh toán<br/><i>(Ký, họ tên)</i></td>
    <td align="center" width="35%">&nbsp Xác nhận bộ phận<br/><i>(Ký, họ tên)</i></td>
    <td width="30%" rowspan="2" align="center">' . $ngaylap . '<br/>Người duyệt mua<br/><i>(Ký, họ tên)</i>
   </td>
  </tr>
</table>
';
echo $html;

?>
</body>
</html>

