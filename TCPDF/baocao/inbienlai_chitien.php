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
    $sott = 0;
    foreach ($_SESSION['BANGKECHITIETCHITIEN'] as $item) {
        $sotien+= $item['sotien'];
    }

    $html = '
<table width="100%" border="0">
  <tr>   
    <td align="left" WIDTH="40%">Đơn vị: '.$_SESSION["TenCongTy"].' <br/> Bộ phận:.................................................</td>
    <td align="center" WIDTH="30%"></td>
    <td align="center" style="font-size: 14px;" WIDTH="30%">Mẫu số 06 - TT<br/>(Ban hành theo thông tư số 133/2016/TT-BTC ngày 26 tháng 08 năm 2016)<br/></td>
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
<table border="0" width="100%" align="center">
  <tr>
  <td  align="center" width="20%">&nbsp;</td>
    <td  align="center" width="40%" ><b>' . $_SESSION["THONGTINPHIEUCHITIEN"]['TENPHIEU'] . '</b><br/>'.$_SESSION["THONGTINPHIEUCHITIEN"]['NGAYHD'].'</td>
    <td  align="center"width="20%">&nbsp;</td>
  </tr>
    <tr>
    <td  align="center">&nbsp;</td>
    <td  align="center">&nbsp;</td>
    <td  align="right">Quyển số:..................</td>
  </tr>
   <tr>
    <td  align="center">&nbsp;</td>
    <td  align="center">&nbsp;</td>
    <td  align="right"><br/>&nbsp;&nbsp;&nbsp;&nbsp;Số:.........................</td>
  </tr>

</table>
<table border="0" width="100%" align="left">
  <tr>
    <td colspan="2" align="left">&nbsp;&nbsp;-Họ và tên người chi: '.$_SESSION["BANGKECHITIEN"]["hotennguoichi"].'</td>
  </tr>
  <tr>
    <td  align="left" colspan="2">&nbsp;&nbsp;-Địa chỉ: '.$_SESSION["BANGKECHITIEN"]["bophan"].'</td>
  </tr>
   <tr>
    <td colspan="2"  align="left">&nbsp;&nbsp;-Nội dung chi: ' . $_SESSION["BANGKECHITIEN"]["lydochi"] . '</td>
  </tr>
    <tr>
    <td  width="50%" align="left">&nbsp;&nbsp;-Số tiền chi: '. number_format($sotien, 0, ",", ".").' </td>
    <td  width="50%" align="left">(Viết bằng chữ): '.ucfirst(convert_number_to_words($sotien)).'</td>
  </tr>
  </tr>
    <tr>
    <td  width="50%" align="left">&nbsp; </td>
    <td  width="50%" align="left">&nbsp;</td>
  </tr>

</table>

<table width="100%" border="0">
  <tr>
    <td align="right"></td>
  </tr>
</table>
<table width="100%" cellpadding="2"><tr><td></td></tr></table>
<table><tr><td></td></tr></table>

<table width="100%" border="0" cellpadding="2">

  <tr>
  <td align="center" width="35%"><b>Người chi tiền</b><br/><i>(Ký, họ tên)</i></td>
    <td align="center" width="35%"></td>
    <td width="30%" rowspan="2" align="center"><b>Người nhận tiền</b><br/><i>(Ký, họ tên)</i>
   </td>
  </tr>
</table>
';
echo $html;

?>
</body>
</html>

