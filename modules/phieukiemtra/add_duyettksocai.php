<?php
    include("../../config.php");
    $OBJ = new phieukiemtra();
    $matk = $_POST['matk'];
    $tungay_denngay = $_POST['tungay_denngay'];
    $sodu = $_POST['sodu'];
    $ngayduyet = date("Y-m-d h:i:s");
    $nguoiduyet = $_SESSION['User'];
    $sql_ins = "INSERT INTO duyetsocai(matk,tungay_denngay,sodu,nguoiduyet,ngayduyet) VALUE ('".$matk."','".$tungay_denngay."','".$sodu."','".$nguoiduyet."','".$ngayduyet."')";
    $OBJ->re_query($sql_ins);
?>