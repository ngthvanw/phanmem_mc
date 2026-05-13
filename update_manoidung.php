<?php
require("config.php");
$OBJ = new baocaothue();
$result = $OBJ->re_query("select mand,tennoidung from mand where tenkd=''");
while ($result_makh = $OBJ->re_fetch($result)){
    $OBJ->re_query("update mand set tenkd = '".khu_dau_vn($result_makh['tennoidung'])."' where mand='".$result_makh['mand']."'");
}
echo "Dữ liệu đã cập nhật thành công bảng nội dung";
?>
