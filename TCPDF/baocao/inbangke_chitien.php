<?php
session_start();
//require_once('tcpdf_include.php');
$DATACISONHATKY = $_SESSION["LISTTINHHINHNGANSACH_NSNN"];
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
    <th   rowspan="2">STT</th>
    <th   colspan="2">&nbsp;Chứng từ</th>
    <th   rowspan="2">Nội dung chi</th>
    <th  rowspan="2" >Số tiền</th>
  </tr>
   <tr>
    <th >Số hiệu</th>
    <th>Ngày,tháng</th>
  </tr>
  <tr>
    <th width="50px"  rowspan="1">A</th>
    <th  width="60px" rowspan="1">B</th>
    <th  width="90px" rowspan="1">C</th>
    <th  width="250px" rowspan="1">1</th>
    <th  width="150px" rowspan="1" >2</th>
  </tr>
  </thead>
  ';
    $sott = 0;
    foreach ($_SESSION['BANGKECHITIETCHITIEN'] as $item) {
        $sott++;
        $html_ct .= '
        <tr >
        <td class="td_center" style="text-align: center" >'.$sott.'</td>
        <td class="td_center"  align="center">';
        $html_ct .= $item['sott'];
        $html_ct .= '</td>
        <td class="td_center"  align="center">';
        $time = strtotime($item['ngaychi']);
        $html_ct.=date("d-m-Y",$time);
        $html_ct .= '</td>
	
      <td class="td_center"  align="left">';
        $html_ct .= $item['noidungchi'];
        $html_ct .= '</td>

       <td class="td_end"  align="right">';
        $sotien+= $item['sotien'];
        $html_ct .= ($item['sotien'] == 0) ? "" : number_format($item['sotien'], 0, ",", ".");
        $html_ct .= '</td>
      </tr>';
    }

    $html = '
<table width="100%" border="0">
  <tr>   
    <td align="left" WIDTH="40%">Đơn vị: '.$_SESSION["TenCongTy"].' <br/> Bộ phận:.................................................</td>
    <td align="center" WIDTH="30%"></td>
    <td align="center" style="font-size: 14px;" WIDTH="30%">Mẫu số 06 - VT<br/>(Ban hành theo thông tư số 133/2016/TT-BTC ngày 26 tháng 08 năm 2016)<br/></td>
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
    <td  align="center"><b>' . $_SESSION["THONGTINPHIEUCHITIEN"]['TENPHIEU'] . '</b><br/>'.$_SESSION["THONGTINPHIEUCHITIEN"]['NGAYHD'].'</td>
  </tr>
    <tr>
    <td  align="center">&nbsp;</td>
  </tr>

</table>
<table border="0" width="100%" align="left">
  <tr>
    <td  align="left">Họ và tên người chi: <b>'.$_SESSION["BANGKECHITIEN"]["hotennguoichi"].'</b></td>
    <td  align="left"></td>
  </tr>
  <tr>
    <td  align="left" colspan="2">Bộ phận(VP,CN): <b>'.$_SESSION["BANGKECHITIEN"]["bophan"].'</b></td>
  </tr>
   <tr>
    <td  align="left">Chi cho công việc: <b>' . $_SESSION["BANGKECHITIEN"]["lydochi"] . '</b></td>
  </tr>

</table>

<table width="100%" border="0">
  <tr>
    <td align="right"></td>
  </tr>
</table>
<table border="0" class="dataTable" cellpadding="2" cellspacing="0" align="center" valign="middle">' . $html_title . $html_ct . '
<tr>';
    $html .= '<td class="td_full" colspan="3" align="right"><b>TỔNG CỘNG</b></td>';

    $html .= '<td class="td_full"  align="right"></td>';


	$html .= '<td class="td_full"  align="right"><b>';
$html .= ($sotien == 0) ? "" : number_format($sotien, 0, ",", ".");
                $html .= '</b></td>

  </tr>
  
</table>
<table width="100%" cellpadding="2"><tr><td></td></tr></table>
<table><tr><td></td></tr></table>

<table width="100%" border="0" cellpadding="2">
  <tr>
    <td colspan="3">Số tiền bằng chữ: <b>'.ucfirst(convert_number_to_words($sotien)).'</b></td>
  </tr>
    <tr>
    <td colspan="3"><i>(Kèm theo .... chứng từ gốc)</i></td>
  </tr>
  <tr>
  <td align="center" width="35%">&nbspNgười mua<br/><i>(Ký, họ tên)</i></td>
    <td align="center" width="35%">&nbsp Xác nhận bộ phận<br/><i>(Ký, họ tên)</i></td>
    <td width="30%" rowspan="2" align="center">Người duyệt mua<br/><i>(Ký, họ tên)</i>
   </td>
  </tr>
</table>
';
echo $html;

?>
</body>
</html>

