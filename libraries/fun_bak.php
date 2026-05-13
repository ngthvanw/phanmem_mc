<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');
$cb_LoaiTK = array(
    array(1 => "Tài khoản tài sản"), // có thêm 1 mảng bên httk
    array(2 => "Tài khoản nợ phải trả"),
    array(3 => "Tài khoản vốn chủ sở hữu"),
    array(4 => "Tài khoản doanh thu"),
    array(5 => "Tài khoản chi phí sản xuất, kinh doanh"),
    array(6 => "Tài khoản thu nhập khác"),
    array(7 => "Tài khoản chi phí khác"),
    array(8 => "Tài khoản xác định kết quản kinh doanh"));
$cb_LoaiTK1 = array(
    1 => "Tài khoản tài sản", // có thêm 1 mảng bên httk
    2 => "Tài khoản nợ phải trả",
    3 => "Tài khoản vốn chủ sở hữu",
    4 => "Tài khoản doanh thu",
    5 => "Tài khoản chi phí sản xuất, kinh doanh",
    6 => "Tài khoản thu nhập khác",
    7 => "Tài khoản chi phí khác",
    8 => "Tài khoản xác định kết quản kinh doanh");
$cb_NhomTK = array(
    array("TT" => "Tiền, các khoản ĐT ngắn hạn..."),
    array("NO" => "Nợ phải thu và phải trả"),
    array("KHAC" => "Khác"));
$cb_MaPhanLoai1 = array(
    array("THU" => "Thu"),
    array("CHI" => "Chi"),
    array("NHAP" => "Nhập"),
    array("XUAT" => "Xuất"),
    array("KC" => "Kết chuyễn"),
    array("KHTS" => "Khấu hao TSCĐ"),
    array("TATS" => "Tăng TSCĐ"),
    array("GITS" => "Giảm TSCĐ"),
    array("KHAC" => "Khác")
);
$cb_MaPhanLoai =
    array("THU" => "Thu",
    "CHI" => "Chi",
    "NHAP" => "Nhập",
    "XUAT" => "Xuất",
    "KC" => "Kết chuyễn",
    "KHTS" => "Khấu hao TSCĐ",
        "TATS" => "Tăng TSCĐ",
        "GITS" => "Giảm TSCĐ",
    "KHAC" => "Khác"
);
$cb_LoaiCT1 = array(
    array("1" => "Hóa đơn GTGT"),
    array("2" => "Hóa đơn bán hàng"),
    array("3" => "Bảng kê 01/TNDN"),
    array("4" => "Chứng từ khác"),
);
$cb_LoaiCT = array(
    "1" => "Hóa đơn GTGT",
    "2" => "Hóa đơn bán hàng",
    "3" => "Bảng kê 01/TNDN",
    "4" => "Chứng từ khác",
);
$cb_LoaiPhieu1 = array(
    array("2" => "Phiếu Chi"),
);
$cb_LoaiPhieu = array(
    "2" => "Phiếu chi",
);

$cb_LoaiPhieuThu1 = array(
    array("1" => "Phiếu thu"),
);
$cb_LoaiPhieuThu = array(
    "1" => "Phiếu thu",
);
$String_tkno_KH = "131,331,3388,3387,1388,141,335,3386,34111,34112,3412,1361,1368";
$String_loaiphieu_NH_Thu = "5,7,9,11,13,15,17,19,21,23,25,27,29,31,33,35,37,39,41,43,45,47,49,51,53,55,57,59,61,63";
$String_loaiphieu_NH_Chi = "6,8,10,12,14,16,18,20,22,24,26,28,30,32,34,36,38,40,42,44,46,48,50,52,54,56,58,60,62,64";
$_SESSION['HOST'] = "localhost";
$_SESSION['USER_DB'] = "root";
$_SESSION['PASS_DB'] = "ChienThuat@888#";
$_SESSION['TIENTO'] = "kt01_";
function ngaycuoithang($thang,$nam){
    $yy_mm_dd="";
    switch ($thang) {
        case "1":
            $yy_mm_dd=$nam."/01/31";
            break;
        case "2":
            if($nam%4==0){
                $yy_mm_dd=$nam."/02/29";
            }else{
                $yy_mm_dd=$nam."/02/28";
            }
            break;
        case "3":
            $yy_mm_dd=$nam."/03/31";
            break;
        case "I":
            $yy_mm_dd=$nam."/03/31";
            break;
        case "4":
            $yy_mm_dd=$nam."/04/30";
            break;
        case "5":
            $yy_mm_dd=$nam."/05/31";
            break;
        case "6":
            $yy_mm_dd=$nam."/06/30";
            break;
        case "II":
            $yy_mm_dd=$nam."/06/30";
            break;
        case "7":
            $yy_mm_dd=$nam."/07/31";
            break;
        case "8":
            $yy_mm_dd=$nam."/08/31";
            break;
        case "9":
            $yy_mm_dd=$nam."/09/30";
            break;
        case "III":
            $yy_mm_dd=$nam."/09/30";
            break;
        case "10":
            $yy_mm_dd=$nam."/10/31";
            break;
        case "11":
            $yy_mm_dd=$nam."/11/30";
            break;
        case "12":
            $yy_mm_dd=$nam."/12/31";
            break;
        case "IV":
            $yy_mm_dd=$nam."/12/31";
            break;
        default:
            $yy_mm_dd=$nam."/01/31";
    }
    return $yy_mm_dd;
}
function load_cb_LoaiTK($select = "")
{
    global $cb_LoaiTK;
    $secl = "";
    $chonce = "";
    foreach ($cb_LoaiTK as $k => $item) {
        if ($select == $k) {
            $chonce = "selected";
        } else {
            $chonce = "";
        }
        $secl .= "<option $chonce value=$k>$i$item</option>";
    }
    return $secl;
}

function load_cb_NhomTK($select = "")
{
    global $cb_NhomTK;
    $secl = "";
    $chonce = "";
    foreach ($cb_NhomTK as $k => $item) {
        if ($select == $k) {
            $chonce = "selected";
        } else {
            $chonce = "";
        }
        $secl .= "<option $chonce value=$k>$i$item</option>";
    }
    return $secl;
}

function load_cb_MaPhanLoai($select = "")
{
    global $cb_MaPhanLoai;
    $secl = "";
    $chonce = "";
    foreach ($cb_MaPhanLoai as $k => $item) {
        if ($select == $k) {
            $chonce = "selected";
        } else {
            $chonce = "";
        }
        $secl .= "<option $chonce value=$k>$i$item</option>";
    }
    return $secl;
}

function empty_data($text)
{
    if ($text == NULL) {
        return FALSE;
    } else {
        return TRUE;
    }
}

function debug($text)
{
    echo "<pre>";
    print_r($text);
    echo "</pre>";
}

function matchs($text1, $text2)
{
    if ($text1 != $text2) {
        return FALSE;
    } else {
        return TRUE;
    }
}

function check_mail($email)
{
    if (eregi("^[a-zA-Z]{1}[a-zA-Z0-9._]{1,20}\@[a-zA-Z0-9]{2,5}\.[a-zA-Z.]{2,9}$", $email)) {
        return TRUE;
    } else {
        return FALSE;
    }
}

function check_numphone($phone)
{
    if (eregi("^[0-9]{8,15}$", $phone)) {
        return TRUE;
    } else {
        return FALSE;
    }
}

function check_num($num)
{
    if (eregi("^[0-9]$", $num)) {
        return TRUE;
    } else {
        return FALSE;
    }
}


function check_date($date)
{
    if (eregi("^[0-9]{1,2}\-[0-9]{1,2}\-[0-9]{4}$", $date)) {
        return TRUE;
    } else {
        return FALSE;
    }
}


function check_data($text)
{
    $str = $text;
    $str = str_replace("'","&#039;",$str);
    return $str;
}

function __autoload($url)
{
    $url = strtolower($url);
    require("$url.php");
}

function redirect($url)
{
    echo "<script>";
    echo "window.location='$url';";
    echo "</script>";
    exit();
}

function chuoisangmang($chuoinhandang, $chuoi)
{// lấy tên file từ chuổi 12324@tenanh
    $str_arr = explode($chuoinhandang, $str);
    return $str_arr;
}

function mangsangchuong($chuoinhandang, $mang)
{// lấy tên file từ chuổi 12324@tenanh
    $str_str = implode($chuoinhandang, $str);
    return $str_str;
}

function xoa_dau($text)
{
    return str_replace("_", " ", $text);
}

function khu_dau_vn($str)
{
    $unicode = array(
        'a' => 'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ',
        'd' => 'đ',
        'e' => 'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
        'i' => 'í|ì|ỉ|ĩ|ị',
        'o' => 'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
        'u' => 'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
        'y' => 'ý|ỳ|ỷ|ỹ|ỵ',
        'A' => 'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
        'D' => 'Đ',
        'E' => 'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
        'I' => 'Í|Ì|Ỉ|Ĩ|Ị',
        'O' => 'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
        'U' => 'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
        'Y' => 'Ý|Ỳ|Ỷ|Ỹ|Ỵ',
    );

    foreach ($unicode as $nonUnicode => $uni) {
        $str = preg_replace("/($uni)/i", $nonUnicode, $str);
    }
    return $str;
}

function khu_dau_vn_thay_phantram($str)
{
    $unicode = array(
        '%' => 'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ',
        '%' => 'đ',
        '%' => 'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
        '%' => 'í|ì|ỉ|ĩ|ị',
        '%' => 'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
        '%' => 'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
        '%' => 'ý|ỳ|ỷ|ỹ|ỵ',
        '%' => 'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
        '%' => 'Đ',
        '%' => 'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
        '%' => 'Í|Ì|Ỉ|Ĩ|Ị',
        '%' => 'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
        '%' => 'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
        '%' => 'Ý|Ỳ|Ỷ|Ỹ|Ỵ',
    );

    foreach ($unicode as $nonUnicode => $uni) {
        $str = preg_replace("/($uni)/i", $nonUnicode, $str);
    }
    return $str;
}

function load_cb_MaTKCha($select = "", $array)
{
    $secl = "";
    $chonce = "";
    foreach ($array as $item) {
        if ($select == $item['matk']) {
            $chonce = "selected";
        } else {
            $chonce = "";
        }
        $secl .= "<option $chonce value=" . $item['matk'] . ">" . $item['matk'] . "--" . $item['tentk'] . "</option>";
    }
    return $secl;
}

function mahoamotchieu($string)
{
    return md5(md5(md5($string . "11405113f5252c3c700f8352772181ec")));
}

function mahoa2chieu($string)
{
    return base64_encode(base64_encode(base64_encode(base64_encode(base64_encode($string)))));
}

function giaima2chieu($string)
{
    return base64_decode(base64_decode(base64_decode(base64_decode(base64_decode($string)))));
}

function update_source($frompath, $topath, $URI)
{// cập nhật code mới nếu có
    $fvsn = @fopen($frompath . "\\updatesource/version.db", "r");// Kiểm tra file mở thành công không
    $version_new = fgets($fvsn);// Lấy version trong phần mềm bản cập nhật
    fclose($fvsn);

    $fvso = @fopen($topath . "/version.db", "r");// Kiểm tra file mở thành công không
    $version_old = fgets($fvso);// Lấy version trong phần mềm
    fclose($fvso);
    if ($version_new != $version_old) {
        $zip = new ZipArchive;
        if ($zip->open($frompath . "\\updatesource/" . $version_new . ".zip") === TRUE) {
            $zip->extractTo($topath);
            $zip->close();
        }
    }
}
function dd_mm_yyy($yy_mm_dd){
    $arr = explode("-",$yy_mm_dd);
    return $arr[2]."-".$arr[1]."-".$arr[0];
}

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
update_source($driver_htdocs, $driver, $URI);
function HienNgonNgu($NgonNgu,$TiengViet,$TiengAnh,$TiengTrung){
    if($NgonNgu=="EN"){
        return $TiengAnh;
    }else if($NgonNgu=="CN"){
        return $TiengTrung;
    }else{
        return $TiengViet;
    }
}
?>