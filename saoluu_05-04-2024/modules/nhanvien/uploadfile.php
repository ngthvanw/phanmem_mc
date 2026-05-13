<?php
if(is_array($_FILES)) {
    $DIR = "../../uploads/nhanvien/";
    $time = time()."@";
	if(is_uploaded_file($_FILES['HinhAnh']['tmp_name'])) {
	$sourcePath = $_FILES['HinhAnh']['tmp_name'];
    $namefile = $time.$_FILES['HinhAnh']['name'];
	$targetPath = $DIR.$time.$_FILES['HinhAnh']['name'];
		if(move_uploaded_file($sourcePath,$targetPath)) {
            echo "File đã được upload ";
            echo "<input type='hidden' id='HinhAnhAn' name='HinhAnhAn' value='".$namefile."' />";
		}
	}
}
?>