<?php
require("config.php");
$OBJCT = new baocaothue();
$OBJCT->re_query("UPDATE pscptt set tylekh = round(giatriconlai/muckhthang) WHERE tanggiam='0'");
$OBJCT->re_query("delete from pscptt WHERE tanggiam='0' and giatriconlai=0");
echo "Dữ liệu đã cập nhật thành công bảng công cụ dụng cụ đầu kỳ";
?>