<?php
include("../../config.php");
$sottpsct = check_data($_GET['sottpsct']);
$loai = check_data($_GET['loai']);
$mavt = substr(check_data($_GET['mavt']),0,-1);
$OBJ = new mavattu;
if($loai=="xksx"){
    $res = $OBJ->re_query("select mavt_pbchiphi from chitiet_psvt where sophieu='{$sottpsct}'");
}else{
    $res = $OBJ->re_query("select mavt_pbchiphi from chitiet_pskt where sott='{$sottpsct}'");
}
$data = $OBJ->re_fetch($res);

echo $data['mavt_pbchiphi'];
?>