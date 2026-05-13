<?php
include("../../config.php");
$OBJCT = new ketoantonghop();
unset($_SESSION["LISTCTBANGTHUYETMINHTAICHINH"]);
$dataBANGCDTK = $OBJCT->load_danhsach_bangcd_tk_tmp();
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
$dataGiaVonHangDaBan = $OBJCT->load_danhsach_no_co_giavonhanghoa($matk,$theonoidung,"1561','1562");// lấy tất cả thu chi

////lấy thông tin giá vốn hàng đã bán
$matk = "632";
$dataGiaVonTPDaBan = $OBJCT->load_danhsach_no_co_giavonhanghoa($matk,$theonoidung,"155");// lấy tất cả thu chi


////lấy thông tin giá vốn hàng đã bán
$matk = "632";
$dataGiaVonCuaDichVuDaCungCap = $OBJCT->load_danhsach_no_co_giavonhanghoa($matk,$theonoidung,"154");// lấy tất cả thu chi


$arr_ketqua_thuyetminh =
    array(
        "A1" => $_SESSION['TenCongTy'],
        "A2" => $_SESSION['DiaChi'],
        "C5"=>$_SESSION['NienDo'],
        "A15"=>"1. Kỳ kế toán năm (bắt đầu từ ngày 01/01/".$_SESSION['NienDo']." kết thúc vào ngày 31/12/".$_SESSION['NienDo'].").",
        "A8"=>"1. Hình thức sở hữu vốn: ".$_SESSION['HinhThucSoHuuVon'],
        "A9"=>"2. Lĩnh vực kinh doanh: ".$_SESSION['LinhVucKinhDoanh'],
        "A10"=>"3. Ngành nghề kinh doanh: ".$_SESSION['NganhNgheKinhDoanh'],

        "B35"=>$dataBANGCDTK['111']['tongdunock']+$dataBANGCDTK['111']['tongducock'],
        "D35"=>$dataBANGCDTK['111']['tongduno']+$dataBANGCDTK['111']['tongduco'],

        "B36"=>$dataBANGCDTK['112']['tongdunock']+$dataBANGCDTK['112']['tongducock'],
        "D36"=>$dataBANGCDTK['112']['tongduno']+$dataBANGCDTK['112']['tongduco'],

        "B52"=>$dataBANGCDTK['131']['tongdunock'],
        "D52"=>$dataBANGCDTK['131']['tongduno'],
        "B54"=>$dataBANGCDTK['331']['tongdunock'],
        "D54"=>$dataBANGCDTK['331']['tongduno'],

        "B72"=>$dataBANGCDTK['154']['tongdunock']+$dataBANGCDTK['154']['tongducock'],
        "D72"=>$dataBANGCDTK['154']['tongduno']+$dataBANGCDTK['154']['tongduco'],



        "D125"=>$dataBANGCDTK['331']['tongducock'],
        "F125"=>$dataBANGCDTK['331']['tongduco'],
        "D127"=>$dataBANGCDTK['131']['tongducock'],
        "F127"=>$dataBANGCDTK['131']['tongduco'],

        "B69"=>$dataBANGCDTK['154']['tongdunock']+$dataBANGCDTK['151']['tongducock'],
        "D69"=>$dataBANGCDTK['154']['tongduno']+$dataBANGCDTK['151']['tongduco'],

        "B70"=>$dataBANGCDTK['154']['tongdunock']+$dataBANGCDTK['152']['tongducock'],
        "D70"=>$dataBANGCDTK['154']['tongduno']+$dataBANGCDTK['152']['tongduco'],

        "B71"=>$dataBANGCDTK['154']['tongdunock']+$dataBANGCDTK['153']['tongducock'],
        "D71"=>$dataBANGCDTK['154']['tongduno']+$dataBANGCDTK['153']['tongduco'],

        "B72"=>$dataBANGCDTK['154']['tongdunock']+$dataBANGCDTK['154']['tongducock'],
        "D72"=>$dataBANGCDTK['154']['tongduno']+$dataBANGCDTK['154']['tongduco'],

        "B73"=>$dataBANGCDTK['154']['tongdunock']+$dataBANGCDTK['155']['tongducock'],
        "D73"=>$dataBANGCDTK['154']['tongduno']+$dataBANGCDTK['155']['tongduco'],

        "B74"=>$dataBANGCDTK['154']['tongdunock']+$dataBANGCDTK['156']['tongducock'],
        "D74"=>$dataBANGCDTK['154']['tongduno']+$dataBANGCDTK['156']['tongduco'],

        "B75"=>$dataBANGCDTK['154']['tongdunock']+$dataBANGCDTK['157']['tongducock'],
        "D75"=>$dataBANGCDTK['154']['tongduno']+$dataBANGCDTK['157']['tongduco'],


        "B85"=>$dataBANGCDTK['2111']['tongduno']+$dataBANGCDTK['2111']['tongduco'],
        "F85"=>$dataBANGCDTK['2111']['tongdunock']+$dataBANGCDTK['2111']['tongducock'],

        "B86"=>$dataBANGCDTK['2141']['tongduco']+$dataBANGCDTK['2141']['tongduno'],
        "F86"=>$dataBANGCDTK['2141']['tongducock']+$dataBANGCDTK['2141']['tongdunock'],

        "B87"=>($dataBANGCDTK['2111']['tongduno']+$dataBANGCDTK['2111']['tongduco'])-($dataBANGCDTK['2141']['tongduco']+$dataBANGCDTK['2141']['tongduno']),
        "F87"=>($dataBANGCDTK['2111']['tongdunock']+$dataBANGCDTK['2111']['tongducock'])-($dataBANGCDTK['2141']['tongducock']+$dataBANGCDTK['2141']['tongdunock']),

        "B89"=>$dataBANGCDTK['2113']['tongduno']+$dataBANGCDTK['2113']['tongduco'],
        "F89"=>$dataBANGCDTK['2113']['tongdunock']+$dataBANGCDTK['2113']['tongducock'],

        "B90"=>$dataBANGCDTK['2143']['tongduco']+$dataBANGCDTK['2143']['tongduno'],
        "F90"=>$dataBANGCDTK['2143']['tongducock']+$dataBANGCDTK['2143']['tongdunock'],

        "B91"=>($dataBANGCDTK['2113']['tongduno']+$dataBANGCDTK['2113']['tongduco'])-($dataBANGCDTK['2143']['tongduco']+$dataBANGCDTK['2143']['tongduno']),
        "F91"=>($dataBANGCDTK['2113']['tongdunock']+$dataBANGCDTK['2113']['tongducock'])-($dataBANGCDTK['2143']['tongducock']+$dataBANGCDTK['2143']['tongdunock']),

        "B93"=>$dataBANGCDTK['2112']['tongduno']+$dataBANGCDTK['2112']['tongduco'],
        "F93"=>$dataBANGCDTK['2112']['tongdunock']+$dataBANGCDTK['2112']['tongducock'],

        "B94"=>$dataBANGCDTK['2142']['tongduco']+$dataBANGCDTK['2142']['tongduno'],
        "F94"=>$dataBANGCDTK['2142']['tongducock']+$dataBANGCDTK['2142']['tongdunock'],

        "B95"=>($dataBANGCDTK['2112']['tongduno']+$dataBANGCDTK['2112']['tongduco'])-($dataBANGCDTK['2142']['tongduco']+$dataBANGCDTK['2142']['tongduno']),
        "F95"=>($dataBANGCDTK['2112']['tongdunock']+$dataBANGCDTK['2112']['tongducock'])-($dataBANGCDTK['2142']['tongducock']+$dataBANGCDTK['2142']['tongdunock']),

        "B181"=>$dataBANGCDTK['5111']['tongducops'],
        "C181"=>$dataBANGCDTKDK['5111']['sodupsco'],

        "B182"=>$dataBANGCDTK['5112']['tongducops'],
        "C182"=>$dataBANGCDTKDK['5112']['sodupsco'],

        "B183"=>$dataBANGCDTK['5113']['tongducops'],
        "C183"=>$dataBANGCDTKDK['5113']['sodupsco'],

        "B184"=>$dataBANGCDTK['5118']['tongducops'],
        "C184"=>$dataBANGCDTKDK['5118']['sodupsco'],

        "B138"=>$dataBANGCDTK['3331']['tongduco']+$dataBANGCDTK['3331']['tongduno'],
        "H138"=>$dataBANGCDTK['3331']['tongducock']+$dataBANGCDTK['3331']['tongdunock'],

        "B139"=>$dataBANGCDTK['3334']['tongduco']+$dataBANGCDTK['3334']['tongduno'],
        "H139"=>$dataBANGCDTK['3334']['tongducock']+$dataBANGCDTK['3334']['tongdunock'],

        "B161"=>$dataBANGCDTK['411']['tongduco']+$dataBANGCDTK['411']['tongduno'],
        "G161"=>$dataBANGCDTK['421']['tongduco']+$dataBANGCDTK['421']['tongduno'],

        "B164"=>$dataBANGCDTK['411']['tongducock']+$dataBANGCDTK['411']['tongdunock'],
        "G164"=>$dataBANGCDTK['421']['tongducock']+$dataBANGCDTK['421']['tongdunock'],

        "B194"=>$dataGiaVonHangDaBan['tienno']-$dataGiaVonHangDaBan['tienco'],
        "B195"=>$dataGiaVonTPDaBan['tienno']-$dataGiaVonTPDaBan['tienco'],
        "B196"=>$dataGiaVonCuaDichVuDaCungCap['tienno']-$dataGiaVonCuaDichVuDaCungCap['tienco'],
        "B202"=>$dataBANGCDTK['5151']['tongduco'],
        "B210"=>$dataBANGCDTK['635']['tongduco'],
        "B218"=>$dataBANGCDTK['6422']['tongduco'],
        "B219"=>$dataBANGCDTK['6421']['tongduco'],
        "B237"=>$dataBANGCDTK['821']['tongduco'],


    );

$_SESSION["LISTCTBANGTHUYETMINHTAICHINH"] = $arr_ketqua_thuyetminh;

