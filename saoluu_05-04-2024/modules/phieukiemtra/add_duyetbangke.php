<?php
    include("../../config.php");
    $OBJ = new phieukiemtra();
    $matk = $_POST['matk'];
    $tungay_denngay = $_POST['tungay_denngay'];
    $sodu = $_POST['sodu'];
    $sodu2 = $_POST['sodu2'];
    $ngayduyet = date("Y-m-d h:i:s");
    $nguoiduyet = $_SESSION['User'];
    $sql_ins = "INSERT INTO duyetsocai(matk,tungay_denngay,sodu,sodu2,nguoiduyet,ngayduyet) VALUE ('".$matk."','".$tungay_denngay."','".$sodu."','".$sodu2."','".$nguoiduyet."','".$ngayduyet."')";
    $OBJ->re_query("ALTER TABLE `duyetsocai` ADD `sodu2` BIGINT NOT NULL;");
    $OBJ->re_query($sql_ins);
?>