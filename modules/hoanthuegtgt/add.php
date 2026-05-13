<?php
include("../../config.php");
$OBJ = new makhachhang;
$recId = create_Key_Hex();
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
$sql = "INSERT INTO tokhai_hh_nhap_xuatkhau (sophieu,
    maloaihinh, tokhaiso, ngaydangky, nuocnhapkhau, giatringoaite,
    loaitien, giatrivnd, chungtuthanhtoan, ghichu,loaitokhai
) VALUES (
    '" .$recId."','" .$maloaihinh."', '" .$tokhaiso."', '" .$ngaydangky."', '" .$nuocnhapkhau."', '" .$giatringoaite."',
    '" .$loaitien."', '" .$giatrivnd."', '" .$chungtuthanhtoan."', '" .$ghichu."','" .$loaitokhai."'
)";
$OBJ->re_query($sql);
echo "{\"recId\": \"" . $recId . "\"}";
?>