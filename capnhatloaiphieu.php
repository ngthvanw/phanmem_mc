<?php
include("config.php");
$SoPhieu = $_GET['sophieu'];
$LoaiPhieu = $_GET['loaiphieu'];
$SoTT = $_GET['sott'];
$matk = $_GET['matk'];
$sql_matk = "";
if($matk!=""){
    $sql_matk="pskt.tkco = '".$matk."',";
}
$OBJ = new ps_chitiet_mavattu();
if($SoTT==""){
$sql_select = "select max(CAST(SUBSTRING_INDEX(mapskt,'-',-1) as SIGNED)) as sott from pskt where pskt.loaiphieu = ".$LoaiPhieu." ";
$qqery = $OBJ->re_query($sql_select);
$result = $OBJ->re_fetch($qqery);
    $SoTT = ($result['sott']+1);
}
$sql_update = "UPDATE pskt INNER JOIN chitiet_pskt ON pskt.sophieu = chitiet_pskt.sophieu
                SET 
                  pskt.loaiphieu = ".$LoaiPhieu.",
                  chitiet_pskt.loaiphieu = ".$LoaiPhieu.",
                  $sql_matk
                  pskt.mapskt= ".$SoTT.",
                  chitiet_pskt.mapskt= ".$SoTT."
                  WHERE  pskt.sophieu='".$SoPhieu."'";
$OBJ->re_query($sql_update);
echo "Số phiếu hiện tại là: ".$SoTT." và loại phiếu là: ".$LoaiPhieu;
?>