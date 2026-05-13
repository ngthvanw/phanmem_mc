<?php
include("../../config.php");
$OBJ = new ps_chitiet_mavattu();
if (isset($_FILES['file'])) {
    $file = $_FILES['file'];
    $rowData = json_decode($_POST['rowData'],true);
    $sott= $rowData['sott'];
    $tentep_cu = $rowData['tentep'];

    $time = time();

    // Khử dấu tiếng Việt khỏi tên file
    $fileName = khu_dau_vn($file['name']);
    $fileName = preg_replace('/\s+/', '_', $fileName);
    $fileName = $time."_".$fileName;
    // Kiểm tra định dạng file
    $allowed = array('xls', 'xlsx');
    $file_extension = pathinfo($fileName, PATHINFO_EXTENSION);

    if (in_array($file_extension, $allowed)) {

        if (!file_exists($driver."/upload")) { // Kiểm tra xem thư mục đã tồn tại hay chưa
            mkdir($driver."/upload", 0755);
        }
        if (!file_exists($driver."/upload/kehoachtuan")) { // Kiểm tra xem thư mục đã tồn tại hay chưa
            mkdir($driver."/upload/kehoachtuan", 0755);
        }
        // Đường dẫn lưu trữ file
        $destination = $driver."/upload/kehoachtuan/" . $time."_".basename($file["name"]);

        // Di chuyển file đã tải lên vào thư mục
        if (move_uploaded_file($file["tmp_name"], $destination)) {
            // Ghi tên file vào cơ sở dữ liệu
            $sql = "UPDATE dulieuchung.danhsach_kehoach_{$noiluu_phanmem} SET tentep = '$fileName' WHERE sott = '$sott'";
            $OBJ->re_query($sql);

            if (file_exists($driver."/upload/kehoachtuan/".$tentep_cu)) { // Kiểm tra xem file có tồn tại không
                unlink($driver."/upload/kehoachtuan/".$tentep_cu);
            }
            echo "Tải tệp tin thành công!";
        } else {
            echo "Lỗi khi di chuyển file!";
        }
    } else {
        echo "Chỉ chấp nhận file Excel (.xls, .xlsx)!";
    }
}
?>
