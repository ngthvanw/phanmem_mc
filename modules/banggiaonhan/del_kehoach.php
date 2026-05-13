<?php
    include("../../config.php");
    $OBJ = new dmsanpham;
    $rowData = $_GET['rowData'];
    $sott= $rowData['sott'];
    $tentep = $rowData['tentep'];
    if (file_exists($driver."/upload/kehoachtuan/".$tentep)) { // Kiểm tra xem file có tồn tại không
        unlink($driver."/upload/kehoachtuan/".$tentep);
    }
    $sql_del = "delete from dulieuchung.danhsach_kehoach_{$noiluu_phanmem} where sott = '{$sott}'";
    $res = $OBJ->re_query($sql_del);
    echo "{\"result\": \"success\"}";

?>