<?php
include("config.php");
$OBJ = new ps_chitiet_mavattu();
$OBJ->re_query("ALTER TABLE `matk` ADD UNIQUE(`sott`);");
$OBJ->re_query("ALTER TABLE `matk` CHANGE `sott` `sott` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT;");
if($_SESSION['NienDo']>=2026 && $_SESSION['theothongtu'] == "tt99"){
// =================================================================
// CẤU HÌNH KẾT NỐI DATABASE
// =================================================================
$servername = $_SESSION['HOST'];
$username = $_SESSION['USER_DB']; // Thay bằng user của bạn
$password = $_SESSION['PASS_DB'];    // Thay bằng pass của bạn
$dbname = $_SESSION['TIENTO'] . $_SESSION['MST'] . "_" . $_SESSION['NienDo'];

$conn = new mysqli($servername, $username, $password, $dbname);
//$conn->set_charset("utf8mb4");

if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// =================================================================
// DANH SÁCH TÀI KHOẢN ĐẦY ĐỦ THEO THÔNG TƯ 99/2025/TT-BTC
// Nguồn: Phụ lục II bạn đã cung cấp
// =================================================================
$danh_sach_tt99 = [
    // --- LOẠI 1: TÀI SẢN NGẮN HẠN ---
    '111' => 'Tiền mặt',
    '112' => 'Tiền gửi không kỳ hạn',
    '113' => 'Tiền đang chuyển',
    '121' => 'Chứng khoán kinh doanh',
    '128' => 'Đầu tư nắm giữ đến ngày đáo hạn',
    '1281' => 'Tiền gửi có kỳ hạn',
    '1282' => 'Trái phiếu',
    '1283' => 'Cho vay',
    '1288' => 'Các khoản đầu tư khác nắm giữ đến ngày đáo hạn',
    '131' => 'Phải thu của khách hàng',
    '133' => 'Thuế GTGT được khấu trừ',
    '1331' => 'Thuế GTGT được khấu trừ của hàng hóa, dịch vụ',
    '1332' => 'Thuế GTGT được khấu trừ của TSCĐ',
    '136' => 'Phải thu nội bộ',
    '1361' => 'Vốn kinh doanh ở đơn vị trực thuộc',
    '1362' => 'Phải thu nội bộ về chênh lệch tỷ giá',
    '1363' => 'Phải thu nội bộ về chi phí đi vay đủ điều kiện được vốn hoá',
    '1368' => 'Phải thu nội bộ khác',
    '138' => 'Phải thu khác',
    '1381' => 'Tài sản thiếu chờ xử lý',
    '1383' => 'Thuế TTĐB của hàng nhập khẩu',
    '1388' => 'Phải thu khác',
    '141' => 'Tạm ứng',
    '151' => 'Hàng mua đang đi đường',
    '152' => 'Nguyên liệu, vật liệu',
    '153' => 'Công cụ, dụng cụ',
    '154' => 'Chi phí sản xuất, kinh doanh dở dang',
    '155' => 'Sản phẩm',
    '156' => 'Hàng hóa',
    '157' => 'Hàng gửi đi bán',
    '158' => 'Nguyên liệu, vật tư tại kho bảo thuế',
    '171' => 'Giao dịch mua, bán lại trái phiếu chính phủ',

    // --- LOẠI 2: TÀI SẢN DÀI HẠN ---
    '211' => 'Tài sản cố định hữu hình',
    '212' => 'Tài sản cố định thuê tài chính',
    '213' => 'Tài sản cố định vô hình',
    '214' => 'Hao mòn tài sản cố định',
    '2141' => 'Hao mòn TSCĐ hữu hình',
    '2142' => 'Hao mòn TSCĐ thuê tài chính',
    '2143' => 'Hao mòn TSCĐ vô hình',
    '2147' => 'Hao mòn BĐSĐT',
    '215' => 'Tài sản sinh học',
    '2151' => 'Súc vật nuôi cho sản phẩm định kỳ',
    '21511' => 'Súc vật nuôi cho sản phẩm định kỳ chưa đạt đến giai đoạn trưởng thành',
    '21512' => 'Súc vật nuôi cho sản phẩm định kỳ đạt đến giai đoạn trưởng thành',
    '215121' => 'Nguyên giá',
    '215122' => 'Giá trị khấu hao lũy kế',
    '2152' => 'Súc vật nuôi lấy sản phẩm một lần',
    '2153' => 'Cây trồng theo mùa vụ hoặc lấy sản phẩm một lần',
    '217' => 'Bất động sản đầu tư',
    '221' => 'Đầu tư vào công ty con',
    '222' => 'Đầu tư vào công ty liên doanh, liên kết',
    '228' => 'Đầu tư khác',
    '2281' => 'Đầu tư góp vốn vào đơn vị khác',
    '2288' => 'Đầu tư khác',
    '229' => 'Dự phòng tổn thất tài sản',
    '2291' => 'Dự phòng giảm giá chứng khoán kinh doanh',
    '2292' => 'Dự phòng tổn thất đầu tư vào đơn vị khác',
    '2293' => 'Dự phòng phải thu khó đòi',
    '2294' => 'Dự phòng giảm giá hàng tồn kho',
    '2295' => 'Dự phòng tổn thất tài sản sinh học',
    '241' => 'Xây dựng cơ bản dở dang',
    '2411' => 'Mua sắm TSCĐ',
    '2412' => 'Xây dựng cơ bản',
    '2413' => 'Sửa chữa, bảo dưỡng định kỳ TSCĐ',
    '2414' => 'Nâng cấp, cải tạo TSCĐ',
    '242' => 'Chi phí chờ phân bổ',
    '243' => 'Tài sản thuế thu nhập hoãn lại',
    '244' => 'Ký quỹ, ký cược',

    // --- LOẠI 3: NỢ PHẢI TRẢ ---
    '331' => 'Phải trả cho người bán',
    '332' => 'Phải trả cổ tức, lợi nhuận',
    '333' => 'Thuế và các khoản phải nộp Nhà nước',
    '3331' => 'Thuế giá trị gia tăng phải nộp',
    '33311' => 'Thuế GTGT đầu ra',
    '33312' => 'Thuế GTGT hàng nhập khẩu',
    '3332' => 'Thuế tiêu thụ đặc biệt',
    '3333' => 'Thuế xuất, nhập khẩu',
    '3334' => 'Thuế thu nhập doanh nghiệp',
    '3335' => 'Thuế thu nhập cá nhân',
    '3336' => 'Thuế tài nguyên',
    '3337' => 'Thuế nhà đất, tiền thuê đất',
    '3338' => 'Thuế bảo vệ môi trường và các loại thuế khác',
    '33381' => 'Thuế bảo vệ môi trường',
    '33382' => 'Các loại thuế khác',
    '3339' => 'Phí, lệ phí và các khoản phải nộp khác',
    '334' => 'Phải trả người lao động',
    '335' => 'Chi phí phải trả',
    '336' => 'Phải trả nội bộ',
    '3361' => 'Phải trả nội bộ về vốn kinh doanh',
    '3362' => 'Phải trả nội bộ về chênh lệch tỷ giá',
    '3363' => 'Phải trả nội bộ về chi phí đi vay đủ điều kiện được vốn hóa',
    '3368' => 'Phải trả nội bộ khác',
    '337' => 'Thanh toán theo tiến độ hợp đồng xây dựng',
    '338' => 'Phải trả, phải nộp khác',
    '3381' => 'Tài sản thừa chờ giải quyết',
    '3382' => 'Kinh phí công đoàn',
    '3383' => 'Bảo hiểm xã hội',
    '3384' => 'Bảo hiểm y tế',
    '3386' => 'Bảo hiểm thất nghiệp',
    '3387' => 'Doanh thu chờ phân bổ',
    '3388' => 'Phải trả, phải nộp khác',
    '341' => 'Vay và nợ thuê tài chính',
    '3411' => 'Các khoản đi vay',
    '3412' => 'Nợ thuê tài chính',
    '343' => 'Trái phiếu phát hành',
    '3431' => 'Trái phiếu thường',
    '3432' => 'Trái phiếu chuyển đổi',
    '344' => 'Nhận ký quỹ, ký cược',
    '347' => 'Thuế thu nhập hoãn lại phải trả',
    '352' => 'Dự phòng phải trả',
    '3521' => 'Dự phòng bảo hành sản phẩm, hàng hóa',
    '3522' => 'Dự phòng bảo hành công trình xây dựng',
    '3523' => 'Dự phòng tái cơ cấu doanh nghiệp',
    '3525' => 'Dự phòng phải trả khác',
    '353' => 'Quỹ khen thưởng, phúc lợi',
    '3531' => 'Quỹ khen thưởng',
    '3532' => 'Quỹ phúc lợi',
    '3533' => 'Quỹ phúc lợi đã hình thành TSCĐ',
    '3534' => 'Quỹ thưởng ban quản lý điều hành công ty',
    '356' => 'Quỹ phát triển khoa học và công nghệ',
    '3561' => 'Quỹ phát triển khoa học và công nghệ',
    '3562' => 'Quỹ phát triển khoa học và công nghệ đã hình thành tài sản',
    '357' => 'Quỹ bình ổn giá',

    // --- LOẠI 4: VỐN CHỦ SỞ HỮU ---
    '411' => 'Vốn đầu tư của chủ sở hữu',
    '4111' => 'Vốn góp của chủ sở hữu',
    '41111' => 'Cổ phiếu phổ thông có quyền biểu quyết',
    '41112' => 'Cổ phiếu ưu đãi',
    '4112' => 'Thặng dư vốn',
    '4113' => 'Quyền chọn chuyển đổi trái phiếu',
    '4118' => 'Vốn khác',
    '412' => 'Chênh lệch đánh giá lại tài sản',
    '413' => 'Chênh lệch tỷ giá hối đoái',
    '414' => 'Quỹ đầu tư phát triển',
    '418' => 'Các quỹ khác thuộc vốn chủ sở hữu',
    '419' => 'Cổ phiếu mua lại của chính mình',
    '421' => 'Lợi nhuận sau thuế chưa phân phối',
    '4211' => 'Lợi nhuận sau thuế chưa phân phối lũy kế đến cuối năm trước',
    '4212' => 'Lợi nhuận sau thuế chưa phân phối năm nay',

    // --- LOẠI 5: DOANH THU ---
    '511' => 'Doanh thu bán hàng và cung cấp dịch vụ',
    '515' => 'Doanh thu hoạt động tài chính',
    '521' => 'Các khoản giảm trừ doanh thu',

    // --- LOẠI 6: CHI PHÍ SẢN XUẤT, KINH DOANH ---
    '621' => 'Chi phí nguyên liệu, vật liệu trực tiếp',
    '622' => 'Chi phí nhân công trực tiếp',
    '623' => 'Chi phí sử dụng máy thi công',
    '6231' => 'Chi phí nhân công',
    '6232' => 'Chi phí vật liệu',
    '6233' => 'Chi phí dụng cụ sản xuất',
    '6234' => 'Chi phí khấu hao máy thi công',
    '6237' => 'Chi phí dịch vụ mua ngoài',
    '6238' => 'Chi phí bằng tiền khác',
    '627' => 'Chi phí sản xuất chung',
    '6271' => 'Chi phí nhân viên phân xưởng',
    '6272' => 'Chi phí vật liệu',
    '6273' => 'Chi phí dụng cụ sản xuất',
    '6274' => 'Chi phí khấu hao TSCĐ',
    '6275' => 'Thuế, phí, lệ phí',
    '6277' => 'Chi phí dịch vụ mua ngoài',
    '6278' => 'Chi phí bằng tiền khác',
    '632' => 'Giá vốn hàng bán',
    '635' => 'Chi phí tài chính',
    '641' => 'Chi phí bán hàng',
    '6411' => 'Chi phí nhân viên',
    '6412' => 'Chi phí vật liệu, bao bì',
    '6413' => 'Chi phí dụng cụ, đồ dùng',
    '6414' => 'Chi phí khấu hao TSCĐ',
    '6415' => 'Thuế, phí, lệ phí',
    '6417' => 'Chi phí dịch vụ mua ngoài',
    '6418' => 'Chi phí bằng tiền khác',
    '642' => 'Chi phí quản lý doanh nghiệp',
    '6421' => 'Chi phí nhân viên quản lý',
    '6422' => 'Chi phí vật liệu quản lý',
    '6423' => 'Chi phí đồ dùng văn phòng',
    '6424' => 'Chi phí khấu hao TSCĐ',
    '6425' => 'Thuế, phí và lệ phí',
    '6426' => 'Chi phí dự phòng',
    '6427' => 'Chi phí dịch vụ mua ngoài',
    '6428' => 'Chi phí bằng tiền khác',

    // --- LOẠI 7: THU NHẬP KHÁC ---
    '711' => 'Thu nhập khác',

    // --- LOẠI 8: CHI PHÍ KHÁC ---
    '811' => 'Chi phí khác',
    '821' => 'Chi phí thuế thu nhập doanh nghiệp',
    '8211' => 'Chi phí thuế TNDN hiện hành',
    '82111' => 'Chi phí thuế thu nhập doanh nghiệp hiện hành theo quy định của Luật thuế thu nhập doanh nghiệp',
    '82112' => 'Chi phí thuế thu nhập doanh nghiệp bổ sung theo quy định về thuế tối thiểu toàn cầu',
    '8212' => 'Chi phí thuế TNDN hoãn lại',

    // --- LOẠI 9: XÁC ĐỊNH KẾT QUẢ ---
    '911' => 'Xác định kết quả kinh doanh'
];

// =================================================================
// CÁC HÀM HỖ TRỢ LOGIC
// =================================================================
function getParentAccount($matk) {
    $len = strlen($matk);
    if ($len <= 3) return '0';
    // Ví dụ: 1281 -> cha 128, 33311 -> cha 3331
    if ($len == 4) return substr($matk, 0, 3);
    return substr($matk, 0, $len - 1);
}

function getAccountType($matk) {
    // Lấy ký tự đầu làm loại TK (Logic cơ bản)
    $firstChar = substr($matk, 0, 1);
    return (int)$firstChar >= 1 && (int)$firstChar <= 9 ? $firstChar : '1'; 
}

// =================================================================
// BẮT ĐẦU XỬ LÝ
// =================================================================
echo "<h3>BẮT ĐẦU CẬP NHẬT HỆ THỐNG TÀI KHOẢN TT99 (FULL)</h3>";
echo "<hr>";

$count_update = 0;
$count_insert = 0;
$count_disable = 0;

// 1. DUYỆT DANH SÁCH TT99 ĐỂ INSERT HOẶC UPDATE
foreach ($danh_sach_tt99 as $matk => $tentk) {
    $matk = trim($matk);
    $tentk = trim($tentk);
    $matkcha = getParentAccount($matk);
    $loaitk = getAccountType($matk);
    
    // Kiểm tra xem TK đã có trong DB chưa
    $checkSql = "SELECT matk, tentk FROM matk WHERE matk = '$matk'";
    $result = $conn->query($checkSql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Nếu tên trong DB khác tên trong TT99 thì mới update (tránh query thừa)
        if ($row['tentk'] !== $tentk) {
            $updateSql = "UPDATE matk SET tentk = ? WHERE matk = ?";
            $stmt = $conn->prepare($updateSql);
            $stmt->bind_param("ss", $tentk, $matk);
            if ($stmt->execute()) {
                echo "- Cập nhật tên TK $matk: $tentk<br>";
                $count_update++;
            }
            $stmt->close();
        }
    } else {
        // Chưa có -> Insert mới
        $insertSql = "INSERT INTO matk (matk, tentk, matkcha, loaitk, ngaytao, sott) VALUES (?, ?, ?, ?, NOW(), 0)";
        $stmt = $conn->prepare($insertSql);
        $stmt->bind_param("ssss", $matk, $tentk, $matkcha, $loaitk);
        if ($stmt->execute()) {
            echo "+ <b>Thêm mới TK $matk</b> ($tentk)<br>";
            $count_insert++;
        }
        $stmt->close();
    }
}

// 2. KIỂM TRA CÁC TÀI KHOẢN 3 KÝ TỰ CŨ KHÔNG CÒN TRONG TT99
echo "<hr><h4>Kiểm tra hiệu lực (Chỉ áp dụng với TK 3 ký tự)</h4>";

// Lấy tất cả TK 3 ký tự hiện có trong DB
$sqlCheck3Char = "SELECT matk, tentk FROM matk WHERE CHAR_LENGTH(matk) = 3";
$result3Char = $conn->query($sqlCheck3Char);

if ($result3Char->num_rows > 0) {
    while($row = $result3Char->fetch_assoc()) {
        $db_matk = $row['matk'];
        $db_tentk = $row['tentk'];

        // Nếu mã trong DB không nằm trong danh sách TT99 ở trên
        if (!array_key_exists($db_matk, $danh_sach_tt99)) {
            
            // Nếu tên chưa có chữ "Hết hiệu lực" thì thêm vào
            if (strpos($db_tentk, 'Hết hiệu lực') === false) {
                $new_name = $db_tentk . " (Hết hiệu lực)";
                
                $updateDisableSql = "UPDATE matk SET tentk = ? WHERE matk = ?";
                $stmt = $conn->prepare($updateDisableSql);
                $stmt->bind_param("ss", $new_name, $db_matk);
                
                if ($stmt->execute()) {
                    echo "! <b>Đánh dấu hết hiệu lực:</b> TK $db_matk - $db_tentk<br>";
                    $count_disable++;
                }
                $stmt->close();
            }
        }
    }
}

echo "<hr>";
echo "<h3>HOÀN TẤT CẬP NHẬT THÔNG TƯ 99.</h3>";
echo "<ul>";
echo "<li>Đã cập nhật tên: $count_update</li>";
echo "<li>Đã thêm mới: $count_insert</li>";
echo "<li>Đã đánh dấu hết hiệu lực (TK 3 ký tự): $count_disable</li>";
echo "</ul>";
$conn->close();
}else{
    echo "<h3>Chỉ áp dụng cập nhật hệ thống tài khoản TT99 từ năm 2026 trở đi và theo thông tư 99/2025/TT-BTC</h3>";
}
?>