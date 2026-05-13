<?php
    include("../../config.php");
    $OBJ = new phieukiemtra();
    $sott = $_POST['sott'];
    $sql_ins = "DELETE FROM duyetsocai WHERE sott='".$sott."'";
    $OBJ->re_query($sql_ins);
?>