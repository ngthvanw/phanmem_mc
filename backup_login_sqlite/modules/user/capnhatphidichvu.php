<?php
include("../../config.php");
$OBJ = new mavattu;
$thang = check_data($_GET['thang']);
$nam = check_data($_GET['nam']);
$tennguoidung= check_data($_GET['tennguoidung']);

$sql = "UPDATE dulieuchung.`phancongkhaithue_{$noiluu_phanmem}` a
JOIN dulieuchung.`danhsach_phancong_{$noiluu_phanmem}` b
   ON a.masothue = b.masothue
   set a.{$thang}=b.phidichvu
where 
    b.nguoiphutrach = '".$tennguoidung."' and nam='{$nam}'
";

$OBJ->re_query($sql);
echo "{\"result\": \"success\"}";
?>