<?php
include("../../config.php");
$OBJCT = new ketoantonghop();
if ($_SESSION['theothongtu'] == "tt200") {
	unset($_SESSION["LISTCTBANGTHUYETMINHTAICHINH"]);
$database = strtolower($_SESSION['TIENTO'].$_SESSION['MST']."_".($_SESSION['NienDo']-1));
$dataBANGCDTK = $OBJCT->load_danhsach_bangcd_tk_tmp();
$dataBANGCDTKNAMTRUOC = $OBJCT->load_danhsach_bangcd_tk_tmp_namtruoc($database);

$dataBANGCDTKDK = $OBJCT->load_danhsach_bangcd_tk_tmp_dk();
$dataBANGCDKT = $OBJCT->load_danhsach_bangcd_ketoan_dacodulieu();
//// Lấy danh sách giá thành
$tungay = $_GET['tungay'];
$denngay = $_GET['denngay'];

$sql_mabp = " and mabp!=''";
$sql_mabp1 = " and makho!=''";
$theonoidung = "ALL";

$str_w2=" and ngayghiso >='".$tungay."' and ngayghiso<='".$denngay."'  ".$sql_mabp1;
$OBJCT->setStrOderby2($str_w2);
$str_w=" and ngayghiso >='".$tungay."' and ngayghiso<= '".$denngay."'  ".$sql_mabp;
$OBJCT->setStrOderby($str_w);

////lấy thông tin giá vốn hàng đã bán
$matk = "632";
$dataGiaVonHangDaBan = $OBJCT->load_danhsach_no_co_giavonhanghoa($matk,$theonoidung,"1561','1562");// Giá vốn hàng đã bán
$dataGiaVonHangDaBanNamTruoc = $OBJCT->load_danhsach_no_co_giavonhanghoa_namtruoc($matk,$theonoidung,"1561','1562",$database);// lấy tất cả thu chi

////lấy thông tin giá vốn hàng đã bán
$matk = "632";
$dataGiaVonTPDaBan = $OBJCT->load_danhsach_no_co_giavonhanghoa($matk,$theonoidung,"155");// Giá vốn thành phẩm đã bán
$dataGiaVonTPDaBanNamTruoc = $OBJCT->load_danhsach_no_co_giavonhanghoa_namtruoc($matk,$theonoidung,"155",$database);// lấy tất cả thu chi


////lấy thông tin giá vốn hàng đã bán
$matk = "632";
$dataGiaVonCuaDichVuDaCungCap = $OBJCT->load_danhsach_no_co_giavonhanghoa($matk,$theonoidung,"154");// Giá vốn dịch vụ đã cung cấp
$dataGiaVonCuaDichVuDaCungCapNamTruoc = $OBJCT->load_danhsach_no_co_giavonhanghoa_namtruoc($matk,$theonoidung,"154",$database);// lấy tất cả thu chi

////lấy thông tin giá vốn hàng đã bán
$matk = "632";
$dataGiamGiaVon = $OBJCT->load_danhsach_no_co_giamgiavonhanghoa($matk,$theonoidung,"1561','1562','154','155','911");// Các khoản ghi giảm giá vốn
$dataGiamGiaVonNamTruoc = $OBJCT->load_danhsach_no_co_giamgiavonhanghoa_namtruoc($matk,$theonoidung,"1561','1562','154','155','911",$database);// lấy tất cả thu chi


$DaiHanTrongKy = $dataBANGCDKT[338]['soduck']-$dataBANGCDKT[338]['sodudk'];
$TangVayDaiHan = 0;
$GiamVayDaiHan = 0;
if($DaiHanTrongKy>0){
    $TangVayDaiHan = abs($DaiHanTrongKy);
}else{
    $GiamVayDaiHan = abs($DaiHanTrongKy);
}

$arr_ketqua_thuyetminh =
    array(
        "A1" => $_SESSION['TenCongTy'],
        "A2" => $_SESSION['DiaChi'],
        "A9"=>"Ngày 01/01/".$_SESSION['NienDo']." đến ngày 31/12/".$_SESSION['NienDo']."",
        "A11"=>"1. Hình thức sở hữu vốn: ".$_SESSION['HinhThucSoHuuVon'],
        "A12"=>"2. Lĩnh vực kinh doanh: ".$_SESSION['LinhVucKinhDoanh'],
        "A13"=>"3. Ngành nghề kinh doanh: ".$_SESSION['NganhNgheKinhDoanh'],
        "A22"=>"1. Kỳ kế toán năm (bắt đầu từ ngày 01/01/".$_SESSION['NienDo']." kết thúc vào ngày 31/12/".$_SESSION['NienDo'].").",

        "AH84"=>$dataBANGCDTK['111']['tongdunock']+$dataBANGCDTK['111']['tongducock'],
        "AX84"=>$dataBANGCDTK['111']['tongduno']+$dataBANGCDTK['111']['tongduco'],

        "AH85"=>$dataBANGCDTK['112']['tongdunock']+$dataBANGCDTK['112']['tongducock'],
        "AX85"=>$dataBANGCDTK['112']['tongduno']+$dataBANGCDTK['112']['tongduco'],

        "AH86"=>$dataBANGCDTK['113']['tongdunock']+$dataBANGCDTK['113']['tongducock'],
        "AX86"=>$dataBANGCDTK['113']['tongduno']+$dataBANGCDTK['113']['tongduco'],

        "AH129"=>$dataBANGCDTK['131']['tongdunock'],
        "AX129"=>$dataBANGCDTK['131']['tongduno'],

        "Q107"=>$dataBANGCDTK['1281']['tongdunock'],
        "AA107"=>$dataBANGCDTK['1281']['tongdunock'],
        "AO107"=>$dataBANGCDTK['1281']['tongduno'],
        "BB107"=>$dataBANGCDTK['1281']['tongduno'],

        "Q108"=>$dataBANGCDTK['1282']['tongdunock'],
        "AA108"=>$dataBANGCDTK['1282']['tongdunock'],
        "AO108"=>$dataBANGCDTK['1282']['tongduno'],
        "BB108"=>$dataBANGCDTK['1282']['tongduno'],

        "Q109"=>$dataBANGCDTK['1283']['tongdunock']+$dataBANGCDTK['1288']['tongdunock'],
        "AA109"=>$dataBANGCDTK['1283']['tongdunock']+$dataBANGCDTK['1288']['tongdunock'],
        "AO109"=>$dataBANGCDTK['1283']['tongduno']+$dataBANGCDTK['1288']['tongduno'],
        "BB109"=>$dataBANGCDTK['1283']['tongduno']+$dataBANGCDTK['1288']['tongduno'],

        "O139"=>$dataBANGCDTK['1385']['tongdunock'],
        "AN139"=>$dataBANGCDTK['1385']['tongduno'],

        "O140"=>$dataBANGCDTK['334']['tongdunock'],
        "AN140"=>$dataBANGCDTK['334']['tongduno'],

        "O141"=>$dataBANGCDTK['224']['tongdunock'],
        "AN141"=>$dataBANGCDTK['224']['tongduno'],

        "O145"=>$dataBANGCDTK['1388']['tongdunock']+$dataBANGCDTK['338']['tongdunock']+$dataBANGCDTK['141']['tongdunock'],
        "AN145"=>$dataBANGCDTK['1388']['tongduno']+$dataBANGCDTK['338']['tongduno']+$dataBANGCDTK['141']['tongduno'],

        "F94"=>$dataBANGCDTK['1211']['tongdunock'],
        "AG94"=>$dataBANGCDTK['1211']['tongduno'],

        "F95"=>$dataBANGCDTK['1212']['tongdunock'],
        "AG95"=>$dataBANGCDTK['1212']['tongduno'],

        "F96"=>$dataBANGCDTK['1218']['tongdunock'],
        "AG96"=>$dataBANGCDTK['1218']['tongduno'],

        "F118"=>$dataBANGCDTK['221']['tongdunock'],
        "AG118"=>$dataBANGCDTK['221']['tongduno'],

        "F119"=>$dataBANGCDTK['222']['tongdunock'],
        "AG119"=>$dataBANGCDTK['222']['tongduno'],

        "F120"=>$dataBANGCDTK['228']['tongdunock'],
        "AG120"=>$dataBANGCDTK['228']['tongduno'],

        "N120"=>$dataBANGCDTK['2292']['tongducock'],
        "AQ120"=>$dataBANGCDTK['2292']['tongduco'],

        "AH441"=>$dataBANGCDTK['3381']['tongducock'],
        "AX441"=>$dataBANGCDTK['3381']['tongduco'],

        "AH442"=>$dataBANGCDTK['3382']['tongducock'],
        "AX442"=>$dataBANGCDTK['3382']['tongduco'],

        "AH443"=>$dataBANGCDTK['3383']['tongducock'],
        "AX443"=>$dataBANGCDTK['3383']['tongduco'],

        "AH444"=>$dataBANGCDTK['3384']['tongducock'],
        "AX444"=>$dataBANGCDTK['3384']['tongduco'],

        "AH445"=>$dataBANGCDTK['3386']['tongducock'],
        "AX445"=>$dataBANGCDTK['3386']['tongduco'],

        "AH446"=>$dataBANGCDTK['3385']['tongducock'],
        "AX446"=>$dataBANGCDTK['3385']['tongduco'],

        "AH447"=>$dataBANGCDTK['344']['tongducock'],
        "AX447"=>$dataBANGCDTK['344']['tongduco'],

        "AH449"=>$dataBANGCDTK['3388']['tongducock'],
        "AX449"=>$dataBANGCDTK['3388']['tongduco'],

        "AH462"=>$dataBANGCDTK['3387']['tongducock']-$dataBANGCDTK['3387']['tongdunock'],
        "AX462"=>$dataBANGCDTK['3387']['tongduco']-$dataBANGCDTK['3387']['tongduno'],

        "AH524"=>$dataBANGCDTK['3521']['tongducock'],
        "AX524"=>$dataBANGCDTK['3521']['tongduco'],

        "AH525"=>$dataBANGCDTK['3522']['tongducock'],
        "AX525"=>$dataBANGCDTK['3522']['tongduco'],

        "AH526"=>$dataBANGCDTK['3523']['tongducock'],
        "AX526"=>$dataBANGCDTK['3524']['tongduco'],

        "AH527"=>$dataBANGCDTK['3524']['tongducock'],
        "AX527"=>$dataBANGCDTK['3524']['tongduco'],

        "O180"=>$dataBANGCDTK['151']['tongdunock'],
        "AN180"=>$dataBANGCDTK['151']['tongduno'],

        "O181"=>$dataBANGCDTK['152']['tongdunock'],
        "AN181"=>$dataBANGCDTK['152']['tongduno'],

        "O182"=>$dataBANGCDTK['153']['tongdunock'],
        "AN182"=>$dataBANGCDTK['153']['tongduno'],

        "O183"=>$dataBANGCDTK['154']['tongdunock'],
        "AN183"=>$dataBANGCDTK['154']['tongduno'],

        "O184"=>$dataBANGCDTK['155']['tongdunock'],
        "AN184"=>$dataBANGCDTK['155']['tongduno'],

        "O185"=>$dataBANGCDTK['156']['tongdunock']-$dataBANGCDTK['1567']['tongdunock'],
        "AN185"=>$dataBANGCDTK['156']['tongduno']-$dataBANGCDTK['1567']['tongduno'],

        "O186"=>$dataBANGCDTK['157']['tongdunock'],
        "AN186"=>$dataBANGCDTK['157']['tongduno'],

        "O187"=>$dataBANGCDTK['158']['tongdunock'],
        "AN187"=>$dataBANGCDTK['158']['tongduno'],

        "O188"=>$dataBANGCDTK['1567']['tongdunock'],
        "AN188"=>$dataBANGCDTK['1567']['tongduno'],



        "G215"=>$dataBANGCDTK['2111']['tongduno'],
        "G222"=>$dataBANGCDTK['2111']['tongdunock'],

        "L215"=>$dataBANGCDTK['2112']['tongduno'],
        "L222"=>$dataBANGCDTK['2112']['tongdunock'],

        "T215"=>$dataBANGCDTK['2113']['tongduno'],
        "T222"=>$dataBANGCDTK['2113']['tongdunock'],

        "AC215"=>$dataBANGCDTK['2114']['tongduno'],
        "AC222"=>$dataBANGCDTK['2114']['tongdunock'],

        "AM215"=>$dataBANGCDTK['2115']['tongduno'],
        "AM222"=>$dataBANGCDTK['2115']['tongdunock'],

        "AU215"=>$dataBANGCDTK['2118']['tongduno'],
        "AU222"=>$dataBANGCDTK['2118']['tongdunock'],

        "G216"=>$dataBANGCDTK['2111']['tongdunops'],
        "L216"=>$dataBANGCDTK['2112']['tongdunops'],
        "T216"=>$dataBANGCDTK['2113']['tongdunops'],
        "AC216"=>$dataBANGCDTK['2114']['tongdunops'],
        "AM216"=>$dataBANGCDTK['2115']['tongdunops'],
        "AU216"=>$dataBANGCDTK['2118']['tongdunops'],

        "I91"=>$dataBANGCDTK['2141']['tongduco']+$dataBANGCDTK['2141']['tongduno'],
        "T91"=>$dataBANGCDTK['2141']['tongducock']+$dataBANGCDTK['2141']['tongdunock'],

        "I92"=>($dataBANGCDTK['2111']['tongduno']+$dataBANGCDTK['2111']['tongduco'])-($dataBANGCDTK['2141']['tongduco']+$dataBANGCDTK['2141']['tongduno']),
        "T92"=>($dataBANGCDTK['2111']['tongdunock']+$dataBANGCDTK['2111']['tongducock'])-($dataBANGCDTK['2141']['tongducock']+$dataBANGCDTK['2141']['tongdunock']),

        "I94"=>$dataBANGCDTK['2113']['tongduno']+$dataBANGCDTK['2113']['tongduco'],
        "T94"=>$dataBANGCDTK['2113']['tongdunock']+$dataBANGCDTK['2113']['tongducock'],

        "I95"=>$dataBANGCDTK['2143']['tongduco']+$dataBANGCDTK['2143']['tongduno'],
        "T95"=>$dataBANGCDTK['2143']['tongducock']+$dataBANGCDTK['2143']['tongdunock'],

        "I96"=>($dataBANGCDTK['2113']['tongduno']+$dataBANGCDTK['2113']['tongduco'])-($dataBANGCDTK['2143']['tongduco']+$dataBANGCDTK['2143']['tongduno']),
        "T96"=>($dataBANGCDTK['2113']['tongdunock']+$dataBANGCDTK['2113']['tongducock'])-($dataBANGCDTK['2143']['tongducock']+$dataBANGCDTK['2143']['tongdunock']),

        "I98"=>$dataBANGCDTK['2112']['tongduno']+$dataBANGCDTK['2112']['tongduco'],
        "T98"=>$dataBANGCDTK['2112']['tongdunock']+$dataBANGCDTK['2112']['tongducock'],

        "I99"=>$dataBANGCDTK['2142']['tongduco']+$dataBANGCDTK['2142']['tongduno'],
        "T99"=>$dataBANGCDTK['2142']['tongducock']+$dataBANGCDTK['2142']['tongdunock'],

        "I100"=>($dataBANGCDTK['2112']['tongduno']+$dataBANGCDTK['2112']['tongduco'])-($dataBANGCDTK['2142']['tongduco']+$dataBANGCDTK['2142']['tongduno']),
        "T100"=>($dataBANGCDTK['2112']['tongdunock']+$dataBANGCDTK['2112']['tongducock'])-($dataBANGCDTK['2142']['tongducock']+$dataBANGCDTK['2142']['tongdunock']),

        "J122"=>$dataBANGCDTK['2411']['tongducock']+$dataBANGCDTK['2411']['tongdunock'],
        "S122"=>$dataBANGCDTK['2411']['tongduco']+$dataBANGCDTK['2411']['tongduno'],

        "J123"=>$dataBANGCDTK['2412']['tongducock']+$dataBANGCDTK['2412']['tongdunock'],
        "S123"=>$dataBANGCDTK['2412']['tongduco']+$dataBANGCDTK['2412']['tongduno'],

        "J124"=>$dataBANGCDTK['2413']['tongducock']+$dataBANGCDTK['2413']['tongdunock'],
        "S124"=>$dataBANGCDTK['2413']['tongduco']+$dataBANGCDTK['2413']['tongduno'],

        "E245"=>$dataBANGCDTKDK['2131']['soduno'],
        "I245"=>$dataBANGCDTKDK['2132']['soduno'],
        "R245"=>$dataBANGCDTKDK['2133']['soduno'],
        "Y245"=>$dataBANGCDTKDK['2134']['soduno'],
        "AD245"=>$dataBANGCDTKDK['2135']['soduno'],
        "AO245"=>$dataBANGCDTKDK['2136']['soduno'],
        "AV245"=>$dataBANGCDTKDK['2138']['soduno'],

        "E246"=>$dataBANGCDTK['2131']['tongdunops'],
        "I246"=>$dataBANGCDTK['2132']['tongdunops'],
        "R246"=>$dataBANGCDTK['2133']['tongdunops'],
        "Y246"=>$dataBANGCDTK['2134']['tongdunops'],
        "AD246"=>$dataBANGCDTK['2135']['tongdunops'],
        "AO246"=>$dataBANGCDTK['2136']['tongdunops'],
        "AV246"=>$dataBANGCDTK['2138']['tongdunops'],

        "E250"=>$dataBANGCDTK['2131']['tongducops'],
        "I250"=>$dataBANGCDTK['2132']['tongducops'],
        "R250"=>$dataBANGCDTK['2133']['tongducops'],
        "Y250"=>$dataBANGCDTK['2134']['tongducops'],
        "AD250"=>$dataBANGCDTK['2135']['tongducops'],
        "AO250"=>$dataBANGCDTK['2136']['tongducops'],
        "AV250"=>$dataBANGCDTK['2138']['tongducops'],

        "E252"=>$dataBANGCDTK['2131']['tongdunock'],
        "I252"=>$dataBANGCDTK['2132']['tongdunock'],
        "R252"=>$dataBANGCDTK['2133']['tongdunock'],
        "Y252"=>$dataBANGCDTK['2134']['tongdunock'],
        "AD252"=>$dataBANGCDTK['2135']['tongdunock'],
        "AO252"=>$dataBANGCDTK['2136']['tongdunock'],
        "AV252"=>$dataBANGCDTK['2138']['tongdunock'],



        "J128"=>$dataBANGCDTK['242']['tongducock']+$dataBANGCDTK['242']['tongdunock'],
        "S128"=>$dataBANGCDTK['242']['tongduco']+$dataBANGCDTK['242']['tongduno'],

        "S129"=>($dataBANGCDTK['333']['tongduno']-$dataBANGCDTK['333']['tongduco'])>0?($dataBANGCDTK['333']['tongduno']-$dataBANGCDTK['333']['tongduco']):0,
        "J129"=>$dataBANGCDTK['333']['tongdunock'],


        "J387"=>$dataBANGCDTK['331']['tongdunock'],
        "AL387"=>$dataBANGCDTK['331']['tongduno'],

        "J401"=>$dataBANGCDTK['3331']['tongduco'],
        "AZ401"=>$dataBANGCDTK['3331']['tongducock'],

        "J402"=>$dataBANGCDTK['3332']['tongduco'],
        "AZ402"=>$dataBANGCDTK['3332']['tongducock'],

        "J403"=>$dataBANGCDTK['3333']['tongduco'],
        "AZ403"=>$dataBANGCDTK['3333']['tongducock'],

        "J404"=>$dataBANGCDTK['3334']['tongduco'],
        "AZ404"=>$dataBANGCDTK['3334']['tongducock'],

        "J405"=>$dataBANGCDTK['3335']['tongduco'],
        "AZ405"=>$dataBANGCDTK['3335']['tongducock'],

        "J406"=>$dataBANGCDTK['3336']['tongduco'],
        "AZ406"=>$dataBANGCDTK['3336']['tongducock'],

        "J407"=>$dataBANGCDTK['3337']['tongduco'],
        "AZ407"=>$dataBANGCDTK['3337']['tongducock'],

        "J408"=>$dataBANGCDTK['3338']['tongduco'],
        "AZ408"=>$dataBANGCDTK['3338']['tongducock'],

        "J409"=>$dataBANGCDTK['3339']['tongduco'],
        "AZ409"=>$dataBANGCDTK['3339']['tongducock'],

        "J412"=>$dataBANGCDTK['3331']['tongduno'],
        "AZ412"=>$dataBANGCDTK['3331']['tongdunock'],

        "J413"=>$dataBANGCDTK['3332']['tongduno'],
        "AZ413"=>$dataBANGCDTK['3332']['tongdunock'],

        "J414"=>$dataBANGCDTK['3333']['tongduno'],
        "AZ414"=>$dataBANGCDTK['3333']['tongdunock'],

        "J415"=>$dataBANGCDTK['3334']['tongduno'],
        "AZ415"=>$dataBANGCDTK['3334']['tongdunock'],

        "J416"=>$dataBANGCDTK['3335']['tongduno'],
        "AZ416"=>$dataBANGCDTK['3335']['tongdunock'],

        "J417"=>$dataBANGCDTK['3336']['tongduno'],
        "AZ417"=>$dataBANGCDTK['3336']['tongdunock'],

        "J418"=>$dataBANGCDTK['3337']['tongduno'],
        "AZ418"=>$dataBANGCDTK['3337']['tongdunock'],

        "J419"=>$dataBANGCDTK['3338']['tongduno'],
        "AZ419"=>$dataBANGCDTK['3338']['tongdunock'],

        "J420"=>$dataBANGCDTK['3339']['tongduno'],
        "AZ420"=>$dataBANGCDTK['3339']['tongdunock'],

        "E360"=>$dataBANGCDTK['341']['tongducock']-$dataBANGCDKT[338]['soduck'], // Cuối kỳ
        "AQ360"=>$dataBANGCDTK['341']['tongduco']-$dataBANGCDKT[338]['sodudk'],// Đầu kỳ

        "V360"=>($dataBANGCDTK['341']['tongducops']-$TangVayDaiHan), // Tăng trong kỳ
        "AF360"=>$dataBANGCDTK['341']['tongdunops']-$GiamVayDaiHan, // Giảm trong kỳ

        "E361"=>$dataBANGCDKT[338]['soduck'],// Cuối kỳ
        "AQ361"=>$dataBANGCDKT[338]['sodudk'],// Đầu kỳ

        "V361"=>($TangVayDaiHan),// Tăng trong kỳ
        "AF361"=>$GiamVayDaiHan,// Giảm trong kỳ


        "J170"=>$dataBANGCDTK['3521']['tongduco']+$dataBANGCDTK['3521']['tongduno'],
        "S170"=>$dataBANGCDTK['3521']['tongducock']+$dataBANGCDTK['3521']['tongdunock'],

        "J171"=>$dataBANGCDTK['3522']['tongduco']+$dataBANGCDTK['3522']['tongduno'],
        "S171"=>$dataBANGCDTK['3522']['tongducock']+$dataBANGCDTK['3522']['tongdunock'],

        "J172"=>$dataBANGCDTK['3523']['tongduco']+$dataBANGCDTK['3523']['tongduno'],
        "S172"=>$dataBANGCDTK['3523']['tongducock']+$dataBANGCDTK['3523']['tongdunock'],

        "C179"=>$dataBANGCDTK['411']['tongduco']+$dataBANGCDTK['411']['tongduno'],
        "S179"=>$dataBANGCDTK['421']['tongduco']+$dataBANGCDTK['421']['tongduno'],

        "C182"=>$dataBANGCDTK['411']['tongducock']+$dataBANGCDTK['411']['tongdunock'],
        "S182"=>$dataBANGCDTK['421']['tongducock']+$dataBANGCDTK['421']['tongdunock'],

        "AH667"=>$dataBANGCDTK['5111']['tongducops'],
        "AX667"=>$dataBANGCDTKDK['5111']['sodupsco'],

        "AH668"=>$dataBANGCDTK['5113']['tongducops'],
        "AX668"=>$dataBANGCDTKDK['5113']['sodupsco'],

        "AH679"=>$dataBANGCDTK['5211']['tongducops'],
        "AX679"=>$dataBANGCDTKNAMTRUOC['5211']['tongducops'],

        "AH680"=>$dataBANGCDTK['5213']['tongducops'],
        "AX680"=>$dataBANGCDTKNAMTRUOC['5213']['tongducops'],

        "AH681"=>$dataBANGCDTK['5212']['tongducops'],
        "AX681"=>$dataBANGCDTKNAMTRUOC['5212']['tongducops'],


        "AH687"=>$dataGiaVonHangDaBan['tienno']-$dataGiaVonHangDaBan['tienco'],
        "AH688"=>$dataGiaVonTPDaBan['tienno']-$dataGiaVonTPDaBan['tienco'],
        "AH693"=>$dataGiaVonCuaDichVuDaCungCap['tienno']-$dataGiaVonCuaDichVuDaCungCap['tienco'],
        "AH699"=>$dataGiamGiaVon['tienno']-$dataGiamGiaVon['tienco'],

        "AX687"=>$dataGiaVonHangDaBanNamTruoc['tienno']-$dataGiaVonHangDaBanNamTruoc['tienco'],
        "AX688"=>$dataGiaVonTPDaBanNamTruoc['tienno']-$dataGiaVonTPDaBanNamTruoc['tienco'],
        "AX693"=>$dataGiaVonCuaDichVuDaCungCapNamTruoc['tienno']-$dataGiaVonCuaDichVuDaCungCapNamTruoc['tienco'],
        "AX699"=>$dataGiamGiaVonNamTruoc['tienno']-$dataGiamGiaVonNamTruoc['tienco'],

        "AH710"=>$dataBANGCDTK['515']['tongducops'],
        "AX710"=>$dataBANGCDTKNAMTRUOC['515']['tongducops'],

        "AH721"=>$dataBANGCDTK['635']['tongducops'],
        "AX721"=>$dataBANGCDTKNAMTRUOC['635']['tongducops'],

        "AH732"=>$dataBANGCDTK['711']['tongducops'],
        "AX732"=>$dataBANGCDTKNAMTRUOC['711']['tongducops'],

        "AH741"=>$dataBANGCDTK['811']['tongducops'],
        "AX741"=>$dataBANGCDTKNAMTRUOC['811']['tongducops'],

        "AH761"=>$dataBANGCDTK['621']['tongducops']+$dataBANGCDTK['6272']['tongducops']+$dataBANGCDTK['6273']['tongducops']+$dataBANGCDTK['6412']['tongducops']+$dataBANGCDTK['6413']['tongducops']+$dataBANGCDTK['6422']['tongducops']+$dataBANGCDTK['6423']['tongducops'],
        "AX761"=>$dataBANGCDTKNAMTRUOC['621']['tongducops']+$dataBANGCDTKNAMTRUOC['6272']['tongducops']+$dataBANGCDTKNAMTRUOC['6273']['tongducops']+$dataBANGCDTKNAMTRUOC['6412']['tongducops']+$dataBANGCDTKNAMTRUOC['6413']['tongducops']+$dataBANGCDTKNAMTRUOC['6422']['tongducops']+$dataBANGCDTKNAMTRUOC['6423']['tongducops'],

        "AH762"=>$dataBANGCDTK['622']['tongducops']+$dataBANGCDTK['6271']['tongducops']+$dataBANGCDTK['6421']['tongducops']+$dataBANGCDTK['6411']['tongducops'],
        "AX762"=>$dataBANGCDTKNAMTRUOC['622']['tongducops']+$dataBANGCDTKNAMTRUOC['6271']['tongducops']+$dataBANGCDTKNAMTRUOC['6421']['tongducops']+$dataBANGCDTKNAMTRUOC['6411']['tongducops'],

        "AH763"=>$dataBANGCDTK['6274']['tongducops']+$dataBANGCDTK['6424']['tongducops']+$dataBANGCDTK['6414']['tongducops'],
        "AX763"=>$dataBANGCDTKNAMTRUOC['6274']['tongducops']+$dataBANGCDTKNAMTRUOC['6424']['tongducops']+$dataBANGCDTKNAMTRUOC['6414']['tongducops'],

        "AH764"=>$dataBANGCDTK['6277']['tongducops']+$dataBANGCDTK['6427']['tongducops']+$dataBANGCDTK['6417']['tongducops'],
        "AX764"=>$dataBANGCDTKNAMTRUOC['6277']['tongducops']+$dataBANGCDTKNAMTRUOC['6427']['tongducops']+$dataBANGCDTKNAMTRUOC['6417']['tongducops'],

        "AH765"=>$dataBANGCDTK['6278']['tongducops']+$dataBANGCDTK['6428']['tongducops']+$dataBANGCDTK['6418']['tongducops']+$dataBANGCDTK['62710']['tongducops']+$dataBANGCDTK['62711']['tongducops']+ $dataBANGCDTK['62712']['tongducops'],
        "AX765"=>$dataBANGCDTKNAMTRUOC['6278']['tongducops']+$dataBANGCDTKNAMTRUOC['6428']['tongducops']+$dataBANGCDTKNAMTRUOC['6418']['tongducops']+$dataBANGCDTK['62710']['tongducops']+$dataBANGCDTK['62711']['tongducops']+ $dataBANGCDTK['62712']['tongducops'],

        "AH771"=>$dataBANGCDTK['8211']['tongducops'],
        "AX771"=>$dataBANGCDTKNAMTRUOC['8211']['tongducops'],

        "AH773"=>$dataBANGCDTK['8211']['tongducops'],
        "AX773"=>$dataBANGCDTKNAMTRUOC['8211']['tongducops'],

        "AH784"=>$dataBANGCDTK['8212']['tongducops'],
        "AX784"=>$dataBANGCDTKNAMTRUOC['8212']['tongducops'],


    );

}else{
	unset($_SESSION["LISTCTBANGTHUYETMINHTAICHINH"]);
	$database = strtolower($_SESSION['TIENTO'].$_SESSION['MST']."_".($_SESSION['NienDo']-1));
	$dataBANGCDTK = $OBJCT->load_danhsach_bangcd_tk_tmp();
	$dataBANGCDTKNAMTRUOC = $OBJCT->load_danhsach_bangcd_tk_tmp_namtruoc($database);

	$dataBANGCDTKDK = $OBJCT->load_danhsach_bangcd_tk_tmp_dk();
	//// Lấy danh sách giá thành
	$tungay = $_GET['tungay'];
	$denngay = $_GET['denngay'];

	$sql_mabp = " and mabp!=''";
	$sql_mabp1 = " and makho!=''";
	$theonoidung = "ALL";

	$str_w2=" and ngayghiso >='".$tungay."' and ngayghiso<='".$denngay."'  ".$sql_mabp1;
	$OBJCT->setStrOderby2($str_w2);
	$str_w=" and ngayghiso >='".$tungay."' and ngayghiso<= '".$denngay."'  ".$sql_mabp;
	$OBJCT->setStrOderby($str_w);

	////lấy thông tin giá vốn hàng đã bán
	$matk = "632";
	$dataGiaVonHangDaBan = $OBJCT->load_danhsach_no_co_giavonhanghoa($matk,$theonoidung,"1561','1562");// Giá vốn hàng đã bán
	$dataGiaVonHangDaBanNamTruoc = $OBJCT->load_danhsach_no_co_giavonhanghoa_namtruoc($matk,$theonoidung,"1561','1562",$database);// lấy tất cả thu chi

	////lấy thông tin giá vốn hàng đã bán
	$matk = "632";
	$dataGiaVonTPDaBan = $OBJCT->load_danhsach_no_co_giavonhanghoa($matk,$theonoidung,"155");// Giá vốn thành phẩm đã bán
	$dataGiaVonTPDaBanNamTruoc = $OBJCT->load_danhsach_no_co_giavonhanghoa_namtruoc($matk,$theonoidung,"155",$database);// lấy tất cả thu chi


	////lấy thông tin giá vốn hàng đã bán
	$matk = "632";
	$dataGiaVonCuaDichVuDaCungCap = $OBJCT->load_danhsach_no_co_giavonhanghoa($matk,$theonoidung,"154");// Giá vốn dịch vụ đã cung cấp
	$dataGiaVonCuaDichVuDaCungCapNamTruoc = $OBJCT->load_danhsach_no_co_giavonhanghoa_namtruoc($matk,$theonoidung,"154",$database);// lấy tất cả thu chi

	////lấy thông tin giá vốn hàng đã bán
	$matk = "632";
	$dataGiamGiaVon = $OBJCT->load_danhsach_no_co_giamgiavonhanghoa($matk,$theonoidung,"1561','1562','154','155','911");// Các khoản ghi giảm giá vốn
	$dataGiamGiaVonNamTruoc = $OBJCT->load_danhsach_no_co_giamgiavonhanghoa_namtruoc($matk,$theonoidung,"1561','1562','154','155','911",$database);// lấy tất cả thu chi


	$arr_ketqua_thuyetminh =
		array(
			"A1" => $_SESSION['TenCongTy'],
			"A3" => $_SESSION['DiaChi'],
			"A8"=>"Năm: ".$_SESSION['NienDo'],
			"A11"=>"1. Hình thức sở hữu vốn: ".$_SESSION['HinhThucSoHuuVon'],
			"A12"=>"2. Lĩnh vực kinh doanh: ".$_SESSION['LinhVucKinhDoanh'],
			"A13"=>"3. Ngành nghề kinh doanh: ".$_SESSION['NganhNgheKinhDoanh'],
			"A18"=>"1. Kỳ kế toán năm (bắt đầu từ ngày 01/01/".$_SESSION['NienDo']." kết thúc vào ngày 31/12/".$_SESSION['NienDo'].").",

			"J39"=>$dataBANGCDTK['111']['tongdunock']+$dataBANGCDTK['111']['tongducock'],
			"S39"=>$dataBANGCDTK['111']['tongduno']+$dataBANGCDTK['111']['tongduco'],

			"J40"=>$dataBANGCDTK['112']['tongdunock']+$dataBANGCDTK['112']['tongducock'],
			"S40"=>$dataBANGCDTK['112']['tongduno']+$dataBANGCDTK['112']['tongduco'],

			"J57"=>$dataBANGCDTK['131']['tongdunock'],
			"S57"=>$dataBANGCDTK['131']['tongduno'],

			"J59"=>$dataBANGCDTK['331']['tongdunock'],
			"S59"=>$dataBANGCDTK['331']['tongduno'],

			"J74"=>$dataBANGCDTK['151']['tongdunock']+$dataBANGCDTK['151']['tongducock'],
			"S74"=>$dataBANGCDTK['151']['tongduno']+$dataBANGCDTK['151']['tongduco'],

			"J75"=>$dataBANGCDTK['152']['tongdunock']+$dataBANGCDTK['152']['tongducock'],
			"S75"=>$dataBANGCDTK['152']['tongduno']+$dataBANGCDTK['152']['tongduco'],

			"J76"=>$dataBANGCDTK['153']['tongdunock']+$dataBANGCDTK['153']['tongducock'],
			"S76"=>$dataBANGCDTK['153']['tongduno']+$dataBANGCDTK['153']['tongduco'],

			"J77"=>$dataBANGCDTK['154']['tongdunock']+$dataBANGCDTK['154']['tongducock'],
			"S77"=>$dataBANGCDTK['154']['tongduno']+$dataBANGCDTK['154']['tongduco'],

			"J78"=>$dataBANGCDTK['155']['tongdunock']+$dataBANGCDTK['155']['tongducock'],
			"S78"=>$dataBANGCDTK['155']['tongduno']+$dataBANGCDTK['155']['tongduco'],

			"J79"=>$dataBANGCDTK['156']['tongdunock']+$dataBANGCDTK['156']['tongducock'],
			"S79"=>$dataBANGCDTK['156']['tongduno']+$dataBANGCDTK['156']['tongduco'],

			"J80"=>$dataBANGCDTK['157']['tongdunock']+$dataBANGCDTK['157']['tongducock'],
			"S80"=>$dataBANGCDTK['157']['tongduno']+$dataBANGCDTK['157']['tongduco'],



			"I90"=>$dataBANGCDTK['2111']['tongduno']+$dataBANGCDTK['2111']['tongduco'],
			"T90"=>$dataBANGCDTK['2111']['tongdunock']+$dataBANGCDTK['2111']['tongducock'],

			"I91"=>$dataBANGCDTK['2141']['tongduco']+$dataBANGCDTK['2141']['tongduno'],
			"T91"=>$dataBANGCDTK['2141']['tongducock']+$dataBANGCDTK['2141']['tongdunock'],

			"I92"=>($dataBANGCDTK['2111']['tongduno']+$dataBANGCDTK['2111']['tongduco'])-($dataBANGCDTK['2141']['tongduco']+$dataBANGCDTK['2141']['tongduno']),
			"T92"=>($dataBANGCDTK['2111']['tongdunock']+$dataBANGCDTK['2111']['tongducock'])-($dataBANGCDTK['2141']['tongducock']+$dataBANGCDTK['2141']['tongdunock']),

			"I94"=>$dataBANGCDTK['2113']['tongduno']+$dataBANGCDTK['2113']['tongduco'],
			"T94"=>$dataBANGCDTK['2113']['tongdunock']+$dataBANGCDTK['2113']['tongducock'],

			"I95"=>$dataBANGCDTK['2143']['tongduco']+$dataBANGCDTK['2143']['tongduno'],
			"T95"=>$dataBANGCDTK['2143']['tongducock']+$dataBANGCDTK['2143']['tongdunock'],

			"I96"=>($dataBANGCDTK['2113']['tongduno']+$dataBANGCDTK['2113']['tongduco'])-($dataBANGCDTK['2143']['tongduco']+$dataBANGCDTK['2143']['tongduno']),
			"T96"=>($dataBANGCDTK['2113']['tongdunock']+$dataBANGCDTK['2113']['tongducock'])-($dataBANGCDTK['2143']['tongducock']+$dataBANGCDTK['2143']['tongdunock']),

			"I98"=>$dataBANGCDTK['2112']['tongduno']+$dataBANGCDTK['2112']['tongduco'],
			"T98"=>$dataBANGCDTK['2112']['tongdunock']+$dataBANGCDTK['2112']['tongducock'],

			"I99"=>$dataBANGCDTK['2142']['tongduco']+$dataBANGCDTK['2142']['tongduno'],
			"T99"=>$dataBANGCDTK['2142']['tongducock']+$dataBANGCDTK['2142']['tongdunock'],

			"I100"=>($dataBANGCDTK['2112']['tongduno']+$dataBANGCDTK['2112']['tongduco'])-($dataBANGCDTK['2142']['tongduco']+$dataBANGCDTK['2142']['tongduno']),
			"T100"=>($dataBANGCDTK['2112']['tongdunock']+$dataBANGCDTK['2112']['tongducock'])-($dataBANGCDTK['2142']['tongducock']+$dataBANGCDTK['2142']['tongdunock']),

			"J122"=>$dataBANGCDTK['2411']['tongducock']+$dataBANGCDTK['2411']['tongdunock'],
			"S122"=>$dataBANGCDTK['2411']['tongduco']+$dataBANGCDTK['2411']['tongduno'],

			"J123"=>$dataBANGCDTK['2412']['tongducock']+$dataBANGCDTK['2412']['tongdunock'],
			"S123"=>$dataBANGCDTK['2412']['tongduco']+$dataBANGCDTK['2412']['tongduno'],

			"J124"=>$dataBANGCDTK['2413']['tongducock']+$dataBANGCDTK['2413']['tongdunock'],
			"S124"=>$dataBANGCDTK['2413']['tongduco']+$dataBANGCDTK['2413']['tongduno'],

			"J128"=>$dataBANGCDTK['242']['tongducock']+$dataBANGCDTK['242']['tongdunock'],
			"S128"=>$dataBANGCDTK['242']['tongduco']+$dataBANGCDTK['242']['tongduno'],

			"S129"=>($dataBANGCDTK['333']['tongduno']-$dataBANGCDTK['333']['tongduco'])>0?($dataBANGCDTK['333']['tongduno']-$dataBANGCDTK['333']['tongduco']):0,
			"J129"=>$dataBANGCDTK['333']['tongdunock'],


			"J134"=>$dataBANGCDTK['331']['tongducock'],
			"S134"=>$dataBANGCDTK['331']['tongduco'],

			"J136"=>$dataBANGCDTK['131']['tongducock'],
			"S136"=>$dataBANGCDTK['131']['tongduco'],



			"I148"=>$dataBANGCDTK['3331']['tongduco'],
			"T148"=>$dataBANGCDTK['3331']['tongducock'],

			"I149"=>$dataBANGCDTK['3332']['tongduco'],
			"T149"=>$dataBANGCDTK['3332']['tongducock'],

			"I150"=>$dataBANGCDTK['3333']['tongduco'],
			"T150"=>$dataBANGCDTK['3333']['tongducock'],

			"I151"=>$dataBANGCDTK['3334']['tongduco'],
			"T151"=>$dataBANGCDTK['3334']['tongducock'],

			"I152"=>$dataBANGCDTK['3335']['tongduco'],
			"T152"=>$dataBANGCDTK['3335']['tongducock'],

			"I153"=>$dataBANGCDTK['3336']['tongduco'],
			"T153"=>$dataBANGCDTK['3336']['tongducock'],

			"I154"=>$dataBANGCDTK['3337']['tongduco'],
			"T154"=>$dataBANGCDTK['3337']['tongducock'],

			"I155"=>$dataBANGCDTK['3338']['tongduco'],
			"T155"=>$dataBANGCDTK['3338']['tongducock'],

			"I156"=>$dataBANGCDTK['3339']['tongduco'],
			"T156"=>$dataBANGCDTK['3339']['tongducock'],

			"T161"=>$dataBANGCDTK['34111']['tongduco']+$dataBANGCDTK['34111']['tongduno'],
			"I161"=>$dataBANGCDTK['34111']['tongducock']+$dataBANGCDTK['34111']['tongdunock'],

			"T163"=>$dataBANGCDTK['34112']['tongduco']+$dataBANGCDTK['34112']['tongduno'],
			"I163"=>$dataBANGCDTK['34112']['tongducock']+$dataBANGCDTK['34112']['tongdunock'],

			"T165"=>$dataBANGCDTK['3412']['tongduco']+$dataBANGCDTK['3412']['tongduno'],
			"I165"=>$dataBANGCDTK['3412']['tongducock']+$dataBANGCDTK['3412']['tongdunock'],

			"J170"=>$dataBANGCDTK['3521']['tongduco']+$dataBANGCDTK['3521']['tongduno'],
			"S170"=>$dataBANGCDTK['3521']['tongducock']+$dataBANGCDTK['3521']['tongdunock'],

			"J171"=>$dataBANGCDTK['3522']['tongduco']+$dataBANGCDTK['3522']['tongduno'],
			"S171"=>$dataBANGCDTK['3522']['tongducock']+$dataBANGCDTK['3522']['tongdunock'],

			"J172"=>$dataBANGCDTK['3523']['tongduco']+$dataBANGCDTK['3523']['tongduno'],
			"S172"=>$dataBANGCDTK['3523']['tongducock']+$dataBANGCDTK['3523']['tongdunock'],

			"C179"=>$dataBANGCDTK['411']['tongduco']+$dataBANGCDTK['411']['tongduno'],
			"S179"=>$dataBANGCDTK['421']['tongduco']+$dataBANGCDTK['421']['tongduno'],

			"C182"=>$dataBANGCDTK['411']['tongducock']+$dataBANGCDTK['411']['tongdunock'],
			"S182"=>$dataBANGCDTK['421']['tongducock']+$dataBANGCDTK['421']['tongdunock'],

			"J205"=>$dataBANGCDTK['5111']['tongducops'],
			"S205"=>$dataBANGCDTKDK['5111']['sodupsco'],

			"J206"=>$dataBANGCDTK['5112']['tongducops'],
			"S206"=>$dataBANGCDTKDK['5112']['sodupsco'],

			"J207"=>$dataBANGCDTK['5113']['tongducops'],
			"S207"=>$dataBANGCDTKDK['5113']['sodupsco'],

			"J208"=>$dataBANGCDTK['5118']['tongducops'],
			"S208"=>$dataBANGCDTKDK['5118']['sodupsco'],


			"J220"=>$dataGiaVonHangDaBan['tienno']-$dataGiaVonHangDaBan['tienco'],
			"J221"=>$dataGiaVonTPDaBan['tienno']-$dataGiaVonTPDaBan['tienco'],
			"J222"=>$dataGiaVonCuaDichVuDaCungCap['tienno']-$dataGiaVonCuaDichVuDaCungCap['tienco'],
			"J225"=>$dataGiamGiaVon['tienno']-$dataGiamGiaVon['tienco'],

			"S220"=>$dataGiaVonHangDaBanNamTruoc['tienno']-$dataGiaVonHangDaBanNamTruoc['tienco'],
			"S221"=>$dataGiaVonTPDaBanNamTruoc['tienno']-$dataGiaVonTPDaBanNamTruoc['tienco'],
			"S222"=>$dataGiaVonCuaDichVuDaCungCapNamTruoc['tienno']-$dataGiaVonCuaDichVuDaCungCapNamTruoc['tienco'],
			"S225"=>$dataGiamGiaVonNamTruoc['tienno']-$dataGiamGiaVonNamTruoc['tienco'],

			"J229"=>$dataBANGCDTK['5151']['tongducops'],
			"S229"=>$dataBANGCDTKNAMTRUOC['5151']['tongducops'],

			"J232"=>$dataBANGCDTK['5152']['tongducops'],
			"S232"=>$dataBANGCDTKNAMTRUOC['5152']['tongducops'],

			"J238"=>$dataBANGCDTK['635']['tongducops'],
			"S238"=>$dataBANGCDTKNAMTRUOC['635']['tongducops'],

			"J248"=>$dataBANGCDTK['6422']['tongducops'],
			"S248"=>$dataBANGCDTKNAMTRUOC['6422']['tongducops'],

			"J249"=>$dataBANGCDTK['6421']['tongducops'],
			"S249"=>$dataBANGCDTKNAMTRUOC['6421']['tongducops'],

			"J259"=>$dataBANGCDTK['711']['tongducops'],
			"S259"=>$dataBANGCDTKNAMTRUOC['711']['tongducops'],

			"J266"=>$dataBANGCDTK['811']['tongducops'],
			"S266"=>$dataBANGCDTKNAMTRUOC['811']['tongducops'],

			"J270"=>$dataBANGCDTK['821']['tongducops'],
			"S270"=>$dataBANGCDTKNAMTRUOC['821']['tongducops'],


		);	

}
$_SESSION["LISTCTBANGTHUYETMINHTAICHINH"] = $arr_ketqua_thuyetminh;

