<?php
    include("../../config.php");
    $OBJ = new makhachhang;
    $sophieu            = check_data($_GET['sophieu']);
    $loaitokhai         = check_data($_GET['loaitokhai']);
    $maloaihinh         = check_data($_GET['maloaihinh']);
    $tokhaiso           = check_data($_GET['tokhaiso']);
    $ngaydangky         = check_data($_GET['ngaydangky']);
    $nuocnhapkhau       = check_data($_GET['nuocnhapkhau']);
    $giatringoaite      = check_data($_GET['giatringoaite']);
    $loaitien           = check_data($_GET['loaitien']);
    $giatrivnd          = check_data($_GET['giatrivnd']);
    $chungtuthanhtoan   = check_data($_GET['chungtuthanhtoan']);
    $ghichu             = check_data($_GET['ghichu']);

    $sql = "UPDATE tokhai_hh_nhap_xuatkhau SET
                maloaihinh = '$maloaihinh',
                tokhaiso = '$tokhaiso',
                ngaydangky = '$ngaydangky',
                nuocnhapkhau = '$nuocnhapkhau',
                giatringoaite = '$giatringoaite',
                loaitien = '$loaitien',
                giatrivnd = '$giatrivnd',
                chungtuthanhtoan = '$chungtuthanhtoan',
                ghichu = '$ghichu'
            WHERE sophieu = '$sophieu'";
 
    $OBJ->re_query($sql);
    echo "{\"result\": \"success\"}";
?>