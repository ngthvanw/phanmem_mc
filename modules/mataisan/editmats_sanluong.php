<?php
    include("../../config.php");
    $OBJ = new mataisan();
    $sott = $_GET['sott'];
    $mats = $_GET['mats'];
    $tents = $_GET['tents'];
    $thang1 = check_data($_GET['thang1']);
    $thang2 = check_data($_GET['thang2']);
    $thang3 = check_data($_GET['thang3']);
    $thang4 = check_data($_GET['thang4']);
    $thang5 = check_data($_GET['thang5']);
    $thang6 = check_data($_GET['thang6']);
    $thang7 = check_data($_GET['thang7']);
    $thang8 = check_data($_GET['thang8']);
    $thang9 = check_data($_GET['thang9']);
    $thang10 = check_data($_GET['thang10']);
    $thang11 = check_data($_GET['thang11']);
    $thang12 = check_data($_GET['thang12']);
	$tongcong = $thang1+$thang2+$thang3+$thang4+$thang5+$thang6+$thang7+$thang8+$thang9+$thang10+$thang11+$thang12;
    $OBJ->re_query("update sanluong_khauhao_taisan 
                    set thang1='".$thang1."',
                        thang2='".$thang2."',
                        thang3='".$thang3."',
                        thang4='".$thang4."',
                        thang5='".$thang5."',
                        thang6='".$thang6."',
                        thang7='".$thang7."',
                        thang8='".$thang8."',
                        thang9='".$thang9."',
                        thang10='".$thang10."',
                        thang11='".$thang11."',
                        thang12='".$thang12."',
						tongcong = ".$tongcong."
                    where sott='".$sott."'");
echo "{\"result\": \"success\"}";
?>