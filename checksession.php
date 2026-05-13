<?php
session_start();
require("config.php");

unset($_SESSION["THONGBAOTHONGTIN"]);
$OBJ = new phieukiemtra();
set_time_limit(5);

if (isset($_SESSION['NienDo'])) {
    $dbname = "dulieuchung";
    $session_id = session_id();
    $time = time();
    $ngayxuat = date("Y-m-d", $time);
    $gioxuat = date("H:i:s", $time);

    // Cập nhật log người dùng
    $sql_in = "
        UPDATE {$dbname}.logfile_user_{$noiluu_phanmem} 
        SET ngayxuat = '$ngayxuat', gioxuat = '$gioxuat', vitri = 'ON', 
            tencongty = '{$_SESSION['TenCongTy']} - {$_SESSION['NienDo']}' 
        WHERE session_id = '$session_id' AND tendatabase = '{$_SESSION['MST']}'";
    $OBJ->re_query($sql_in);

    // Lấy danh sách công ty trong ngày hiện tại
    $D = date("d");
    $M = date("m");
    $Y = date("Y");

    $sqlsl = "
        SELECT masothue, tencongty, trangthai, ngaytrinhduyet, niendo 
        FROM {$dbname}.danhsach_congty_trinhky_{$noiluu_phanmem} 
        WHERE YEAR(ngaytrinhduyet) = $Y 
          AND MONTH(ngaytrinhduyet) = $M 
          AND DAY(ngaytrinhduyet) = $D";
    $query_count = $OBJ->re_query($sqlsl);

    // Xử lý thông báo
    $thongbao = ($_SESSION['USER_DB'] == 'CHIDOC')
        ? "<b style='color:red;'>***DỮ LIỆU CÔNG TY HIỆN CHỈ CÓ QUYỀN XEM DỮ LIỆU***</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"
        : "";

    while ($result_count = $OBJ->re_fetch($query_count)) {
        $ngay = date("h:i d-m-Y", strtotime($result_count['ngaytrinhduyet']));
        $thongbao .= formatCompanyStatus($result_count, $ngay);
    }

    // Kiểm tra chứng từ giao nhận chưa ký
    $sql_nhan = "
        SELECT COUNT(nguoinhanky) AS sodong 
        FROM {$dbname}.danhsach_giaonhan_chungtu_{$noiluu_phanmem} 
        WHERE (nguoinhan = '{$_SESSION['User']}' AND nguoinhanky = '0') 
           OR (nguoigiao = '{$_SESSION['User']}' AND nguoigiaoky = '0')";
    $query_nhan = $OBJ->re_query($sql_nhan);
    $res_nhan = $OBJ->re_fetch($query_nhan);

    if (!empty($res_nhan['sodong'])) {
        $thongbao .= "<b style='color:red;'>BẠN ĐANG CÓ ({$res_nhan['sodong']}) CHỨNG TỪ GIAO NHẬN CHƯA ĐƯỢC KÝ NHẬN</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
        $_SESSION["THONGBAOTHONGTIN"] = "BẠN ĐANG CÓ ({$res_nhan['sodong']}) CHỨNG TỪ GIAO NHẬN CHƯA ĐƯỢC KÝ NHẬN";
    }

    // Thông báo nếu người dùng có quyền chỉ đọc
    if ($_SESSION['USER_DB'] == 'CHIDOC') {
        $thongbao .= "<b style='color:red !important;'>***DỮ LIỆU CÔNG TY HIỆN CHỈ CÓ QUYỀN XEM DỮ LIỆU***</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
    }

    echo $thongbao;
} else {
    echo 0;
}
// Hàm định dạng trạng thái công ty
function formatCompanyStatus($company, $ngay) {
    $statusMap = [
        'CD' => "<b style='color:Orange;'>{$company['tencongty']} - Niên độ: {$company['niendo']} - CHỜ DUYỆT {$ngay}</b>",
        'DD' => "<b style='color:blue;'>{$company['tencongty']} - Niên độ: {$company['niendo']} - ĐÃ DUYỆT {$ngay}</b>",
        'TN' => "<b style='color:#7f007f;'>{$company['tencongty']} - Niên độ: {$company['niendo']} - TẠM NỘP {$ngay}</b>",
        'TR' => "<b style='color:red;'>{$company['tencongty']} - Niên độ: {$company['niendo']} - TRẢ LẠI {$ngay}</b>"
    ];

    return $statusMap[$company['trangthai']] . "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
}
?>
