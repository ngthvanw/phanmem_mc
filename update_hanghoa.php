<?php
require("config.php");
$OBJ = new baocaothue();
$result = $OBJ->re_query("select mavt,tenvt from mavt");
$OBJ->re_query("update mavt set tenkd = ''");
while ($data = $OBJ->re_fetch($result)){
    $OBJ->re_query("update mavt set tenkd = '".khu_dau_vn($data['tenvt'])."' where mavt='".$data['mavt']."'");
}
$OBJ->re_query("ALTER TABLE mavt DROP INDEX tenkd");
$OBJ->re_query("ALTER TABLE mavt DROP INDEX FullTenKD");
$OBJ->re_query("ALTER TABLE mavt ADD FULLTEXT FullTenKD (tenkd)");
echo "Cập nhật thành công bảng hàng hoá, vật tư.";
?>
