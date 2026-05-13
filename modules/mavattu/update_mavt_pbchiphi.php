<?php
include("../../config.php");
$sottpsct = check_data($_GET['sottpsct']);
$loai = check_data($_GET['loai']);
$mavt = check_data($_GET['mavt']);
$OBJ = new mavattu;
if($loai=="xksx"){
    $res = $OBJ->re_query("update chitiet_psvt set mavt_pbchiphi='{$mavt}' where sophieu='{$sottpsct}'");
}else{
    $OBJ->re_query("update chitiet_pskt set mavt_pbchiphi='{$mavt}' where sott='{$sottpsct}'");
}
?>