<?php
require("../../config.php");
$OBJBK = new backup;
if (isset($_FILES['file'])) {
    $errors = array();
    $file_name = $_FILES['file']['name'];
    $file_size = $_FILES['file']['size'];
    $file_tmp = $_FILES['file']['tmp_name'];
    $file_type = $_FILES['file']['type'];
    $file_ext = strtolower(end(explode('.', $_FILES['file']['name'])));
    $extensions = array("xls", "xlsx");
    $date_time = date('Y-m-d h:i:s');
    $MST = $_SESSION['MST'];
    $TenDN = $_SESSION['TenCongTy'];
    $DBNamme = $_SESSION['MST']."_".$_SESSION['NienDo'];
    // CALL TO THE FUNCTION
    $time = time();
    $filename = khu_dau_vn($time."_".$file_name);
    if (in_array($file_ext, $extensions) === false) {
        $errors[] = "Tập ten tải không phải excel.";
    }
    if ($file_size > 2097152) {
        $errors[] = 'Tập tin tải lên vượt quá 5Mb !';
    }
    $path = $driver . "/backup/" . $_SESSION['MST'] . "_" . $_SESSION['NienDo'] . "/";
    if (empty($errors) == true) {
        if (is_dir($path)) {

        } else {
            mkdir($path);
        }
        $sql = "insert into saoluu (mst,tendn,tenfile,ngayluu) value('".$MST."','".$TenDN."','".$filename."','".$date_time."')";
        $OBJBK->re_query($sql);
        move_uploaded_file($file_tmp, $path. $filename);
        echo "Tải lên thành công";
    } else {
        print_r($errors);
    }
}

?>