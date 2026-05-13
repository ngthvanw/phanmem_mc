<?php
include("../../config.php");
$OBJ = new baocaothue();
$dir = $driver."/datafile/".$_SESSION["MST"]."/".$_SESSION["NienDo"]."/"; // Đường dẫn lưu file csdl
if($_SESSION["MST"]!="" && $_SESSION["NienDo"]!="") {
	 $backup_response = backup_Database(
		$_SESSION['HOST'], 
		$_SESSION['USER_DB'], 
		$_SESSION['PASS_DB'], 
		$_SESSION['TIENTO'] . $_SESSION["MST"] . "_" . $_SESSION["NienDo"], 
		$dir
	);
}
$mysql_host = $_SESSION['HOST'];
$mysql_username = $_SESSION['USER_DB'];
// MySQL password
$mysql_password = $_SESSION['PASS_DB'];
$cnn = mysql_connect($mysql_host, $mysql_username, $mysql_password);
$dbname = "dulieuchung";

$session_id = session_id();
$time = time();
$ngayxuat = date("Y-m-d",$time);
$gioxuat = date("H:i:s",$time);

$sql_in = "update {$dbname}.logfile_user_{$noiluu_phanmem} set ngayxuat='".$ngayxuat."',gioxuat='".$gioxuat."' where session_id='".$session_id."'";
$OBJ->re_query($sql_in);

session_destroy();// Hủy bỏ toàn bộ session của người dùng

redirect("login.php");
function backup_Database($hostName, $userName, $password, $DbName, $dir) {
    $filename = date("d_m_Y_H_i_s") . "_datafile.sql";
    $filePath = $dir . $filename;
    $zipFilePath = $dir . date("d_m_Y_H_i_s") . "_datafile.zip";

    // Tạo lệnh mysqldump để sao lưu dữ liệu
    $command = "mysqldump --host={$hostName} --user={$userName} --password={$password} {$DbName} > {$filePath}";

    // Thực thi lệnh CMD để sao lưu
    system($command, $output);

    // Kiểm tra xem file backup có được tạo thành công không
    if (file_exists($filePath)) {
        // Nén file SQL thành file ZIP
        $zip = new ZipArchive();
        if ($zip->open($zipFilePath, ZipArchive::CREATE) === TRUE) {
            $zip->addFile($filePath, basename($filePath));
            $zip->close();

            // Xóa file SQL gốc sau khi nén thành công
            unlink($filePath);
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}
