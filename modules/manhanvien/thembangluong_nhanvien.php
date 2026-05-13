<?php
   include("../../config.php");
   $txttinhluongtheo = $_GET['txttinhluongtheo'];
   $tinhluongtheo = $_GET['tinhluongtheo'];
   $khongtaobuttoan = $_GET['khongtaobuttoan'];
switch ($txttinhluongtheo) {
    case 1:
        $tenthang = " Tháng 1 - " . $_SESSION['NienDo'];
        $tungay = $_SESSION['NienDo'] . "-" . $txttinhluongtheo . "-1";
        $denngay = $_SESSION['NienDo'] . "-" . $txttinhluongtheo . "-31";
        break;
    case 2:
        $tenthang = " Tháng 2 - " . $_SESSION['NienDo'];
        $tungay = $_SESSION['NienDo'] . "-" . $txttinhluongtheo . "-1";
        if($_SESSION['NienDo']%4==0){
            $denngay = $_SESSION['NienDo'] . "-" . $txttinhluongtheo . "-29";
        }else{
            $denngay = $_SESSION['NienDo'] . "-" . $txttinhluongtheo . "-28";
        }

        break;
    case 3:
        $tenthang = " Tháng 3 - " . $_SESSION['NienDo'];
        $tungay = $_SESSION['NienDo'] . "-" . $txttinhluongtheo . "-1";
        $denngay = $_SESSION['NienDo'] . "-" . $txttinhluongtheo . "-31";
        break;
    case 4:
        $tenthang = " Tháng 4 - " . $_SESSION['NienDo'];
        $tungay = $_SESSION['NienDo'] . "-" . $txttinhluongtheo . "-1";
        $denngay = $_SESSION['NienDo'] . "-" . $txttinhluongtheo . "-30";
        break;
    case 5:
        $tenthang = " Tháng 5 - " . $_SESSION['NienDo'];
        $tungay = $_SESSION['NienDo'] . "-" . $txttinhluongtheo . "-1";
        $denngay = $_SESSION['NienDo'] . "-" . $txttinhluongtheo . "-31";
        break;
    case 6:
        $tenthang = " Tháng 6 - " . $_SESSION['NienDo'];
        $tungay = $_SESSION['NienDo'] . "-" . $txttinhluongtheo . "-1";
        $denngay = $_SESSION['NienDo'] . "-" . $txttinhluongtheo . "-30";
        break;
    case 7:
        $tenthang = " Tháng 7 - " . $_SESSION['NienDo'];
        $tungay = $_SESSION['NienDo'] . "-" . $txttinhluongtheo . "-1";
        $denngay = $_SESSION['NienDo'] . "-" . $txttinhluongtheo . "-31";
        break;
    case 8:
        $tenthang = " Tháng 8 - " . $_SESSION['NienDo'];
        $tungay = $_SESSION['NienDo'] . "-" . $txttinhluongtheo . "-1";
        $denngay = $_SESSION['NienDo'] . "-" . $txttinhluongtheo . "-31";
        break;
    case 9:
        $tenthang = " Tháng 9 - " . $_SESSION['NienDo'];
        $tungay = $_SESSION['NienDo'] . "-" . $txttinhluongtheo . "-1";
        $denngay = $_SESSION['NienDo'] . "-" . $txttinhluongtheo . "-30";
        break;
    case 10:
        $tenthang = " Tháng 10 - " . $_SESSION['NienDo'];
        $tungay = $_SESSION['NienDo'] . "-" . $txttinhluongtheo . "-1";
        $denngay = $_SESSION['NienDo'] . "-" . $txttinhluongtheo . "-31";
        break;
    case 11:
        $tenthang = " Tháng 11 - " . $_SESSION['NienDo'];
        $tungay = $_SESSION['NienDo'] . "-" . $txttinhluongtheo . "-1";
        $denngay = $_SESSION['NienDo'] . "-" . $txttinhluongtheo . "-30";
        break;
    case 12:
        $tenthang = " Tháng 12 - " . $_SESSION['NienDo'];
        $tungay = $_SESSION['NienDo'] . "-" . $txttinhluongtheo . "-1";
        $denngay = $_SESSION['NienDo'] . "-" . $txttinhluongtheo . "-31";
        break;
    case "I":
        $tenthang = " Quý I - " . $_SESSION['NienDo'];
        $tungay = $_SESSION['NienDo'] . "-1-1";
        $denngay = $_SESSION['NienDo'] . "-3-31";
        break;
    case "II":
        $tenthang = " Quý II - " . $_SESSION['NienDo'];
        $tungay = $_SESSION['NienDo'] . "-4-1";
        $denngay = $_SESSION['NienDo'] . "-6-30";
        break;
    case "III":
        $tenthang = " Quý III - " . $_SESSION['NienDo'];
        $tungay = $_SESSION['NienDo'] . "-7-1";
        $denngay = $_SESSION['NienDo'] . "-9-30";
        break;
    case "IV":
        $tenthang = " Quý IV - " . $_SESSION['NienDo'];
        $tungay = $_SESSION['NienDo'] . "-10-1";
        $denngay = $_SESSION['NienDo'] . "-12-31";
        break;
    case "V":
        $tungay = $_SESSION['NienDo'] . "-1-1";
        $denngay = $_SESSION['NienDo'] . "-12-31";
        break;

}
$OBJ = new manhanvien;
$OBJCT = new ketoantonghop();
$OBJPSKT = new pskt();
$OBJ->re_query("UPDATE pskt SET makh_nh = '' WHERE (loaiphieu!=3 and loaiphieu!=4) or tenkh_nh='';");// update khách hàng không có trong thu chi
$OBJ->re_query("UPDATE manhanvien set manhanvien=sott where manhanvien=0;");
//// Bảng thu khách hàng từ ngày đến ngÀY
$OBJ->re_query("ALTER TABLE `bangluongnhanvien` ADD `phicongdoan` BIGINT NOT NULL AFTER `phucapchucvu`;");
$OBJ->re_query("ALTER TABLE `bangluongnhanvien` ADD `baohiemyt` BIGINT NOT NULL AFTER `baohiem`, ADD `baohiemtn` BIGINT NOT NULL AFTER `baohiemyt`, ADD `kinhphicongdoan` BIGINT NOT NULL AFTER `baohiemtn`, ADD `dn_baohiem` BIGINT NOT NULL AFTER `kinhphicongdoan`, ADD `dn_baohiemyt` BIGINT NOT NULL AFTER `dn_baohiem`, ADD `dn_baohiemtn` BIGINT NOT NULL AFTER `dn_baohiemyt`;");

$dataListNhanVien = $OBJ->loadListMaNV();
$val_ins_bangluong ="";
$sophieu = $OBJPSKT->createSoPhieu();

$i=0;
foreach ($dataListNhanVien as $itemListNhanVien){
    $TONGLUONGCP1 = 0;
    $TONGLUONGCP2 = 0;
    $TONGKPCD1 = 0;
    $TONGKPCD2 = 0;
    $TONGDNBHXH1 = 0;
    $TONGDNBHXH2 = 0;
    $TONGDNBHYT1 = 0;
    $TONGDNBHYT2 = 0;
    $TONGDNBHTN1 = 0;
    $TONGDNBHTN2 = 0;
$i++;
    $val_ins_bangluong.="('".$itemListNhanVien['manhanvien']."','".$itemListNhanVien['tennv']."','".$itemListNhanVien['chucdanh']."','".$itemListNhanVien['trinhdo']."','".$itemListNhanVien['luongcb']."','0','0','".$itemListNhanVien['phucapchucvu']."','".$itemListNhanVien['baohiem']."','".$txttinhluongtheo."','0','".$itemListNhanVien['socmnd']."','".$itemListNhanVien['phantramthang']."','".$itemListNhanVien['phantramquy']."','".$itemListNhanVien['phantramnam']."','".$itemListNhanVien['tienangiuaca']."','".$itemListNhanVien['phucapkhongdungbhxh']."','".$itemListNhanVien['thuethunhap']."','".$itemListNhanVien['matk1']."','".$itemListNhanVien['phantramtk']."','".$itemListNhanVien['matk2']."','".$itemListNhanVien['loaibp']."','".$itemListNhanVien['phicongdoan']."','".$itemListNhanVien['baohiemyt']."','".$itemListNhanVien['baohiemtn']."','".$itemListNhanVien['kinhphicongdoan']."','".$itemListNhanVien['dn_baohiem']."','".$itemListNhanVien['dn_baohiemyt']."','".$itemListNhanVien['dn_baohiemtn']."'),";
    $TONGLUONG = $itemListNhanVien['luongcb']+$itemListNhanVien['tienangiuaca']+$itemListNhanVien['phucapkhongdungbhxh']+$itemListNhanVien['phucapchucvu'];
    $TONGKPCD = $itemListNhanVien['kinhphicongdoan'];
    $TONGDNBHXH = $itemListNhanVien['dn_baohiem'];
    $TONGDNBHYT = $itemListNhanVien['dn_baohiemyt'];
    $TONGDNBHTN = $itemListNhanVien['dn_baohiemtn'];
    $loaisp = $itemListNhanVien['loaibp'];
    if($itemListNhanVien['phantramtk']==100){
        $TONGLUONGCP1 = $TONGLUONG;
        $TONGLUONGCP2 = 0;

        $TONGKPCD1 = $TONGKPCD;
        $TONGKPCD2 = 0;

        $TONGDNBHXH1 = $TONGDNBHXH;
        $TONGDNBHXH2 = 0;

        $TONGDNBHYT1 = $TONGDNBHYT;
        $TONGDNBHYT2 = 0;

        $TONGDNBHYT1 = $TONGDNBHYT;
        $TONGDNBHYT2 = 0;

        $TONGDNBHTN1 = $TONGDNBHTN;
        $TONGDNBHTN2 = 0;
    }else{
        $TONGLUONGCP1 = round($TONGLUONG*($itemListNhanVien['phantramtk']/100));
        $TONGLUONGCP2 = $TONGLUONG - $TONGLUONGCP1;

        $TONGKPCD1 = round($TONGKPCD*($itemListNhanVien['phantramtk']/100));
        $TONGKPCD2 = $TONGKPCD - $TONGKPCD1;

        $TONGDNBHXH1 = round($TONGDNBHXH*($itemListNhanVien['phantramtk']/100));
        $TONGDNBHXH2 = $TONGDNBHXH - $TONGDNBHXH1;

        $TONGDNBHYT1 = round($TONGDNBHYT*($itemListNhanVien['phantramtk']/100));
        $TONGDNBHYT2 = $TONGDNBHYT - $TONGDNBHYT1;

        $TONGDNBHTN1 = round($TONGDNBHTN*($itemListNhanVien['phantramtk']/100));
        $TONGDNBHTN2 = $TONGDNBHTN - $TONGDNBHTN1;
    }


    $TONGCACKHOANPHAINOP = $itemListNhanVien['baohiem']+$itemListNhanVien['phicongdoan']+$itemListNhanVien['baohiemyt']+$itemListNhanVien['baohiemtn']+$itemListNhanVien['thuethunhap'];
$tkluong = '334';
$tkBHTN = '3385';
if($_SESSION['theothongtu']=="tt200"){
	$tkluong = '3341';
    $tkBHTN = '3386';
}
   $value_tmpluong.="('{$itemListNhanVien['matk1']}','{$tkluong}','{$TONGLUONGCP1}','{$loaisp}'),
                   ('{$itemListNhanVien['matk2']}','{$tkluong}','{$TONGLUONGCP2}','{$loaisp}'),
                   ('{$tkluong}','3382','".abs( $itemListNhanVien['phicongdoan'])."',''),
                   ('{$tkluong}','3383','".abs( $itemListNhanVien['baohiem'])."',''),
                   ('{$tkluong}','3384','".abs( $itemListNhanVien['baohiemyt'])."',''),
                   ('{$tkluong}','{$tkBHTN}','".abs( $itemListNhanVien['baohiemtn'])."',''),
                   ('{$tkluong}','3335','".abs( $itemListNhanVien['thuethunhap'])."',''),
                   
                   ('{$itemListNhanVien['matk1']}','3382','{$TONGKPCD1}','{$loaisp}'),
                   ('{$itemListNhanVien['matk2']}','3382','{$TONGKPCD2}','{$loaisp}'),
                   
                   ('{$itemListNhanVien['matk1']}','3383','{$TONGDNBHXH1}','{$loaisp}'),
                   ('{$itemListNhanVien['matk2']}','3383','{$TONGDNBHXH1}','{$loaisp}'),
                   
                   ('{$itemListNhanVien['matk1']}','3384','{$TONGDNBHYT1}','{$loaisp}'),
                   ('{$itemListNhanVien['matk2']}','3384','{$TONGDNBHYT2}','{$loaisp}'),
                   
                   ('{$itemListNhanVien['matk1']}','{$tkBHTN}','{$TONGDNBHTN1}','{$loaisp}'),
                   ('{$itemListNhanVien['matk2']}','{$tkBHTN}','{$TONGDNBHTN2}','{$loaisp}'),";

}
$sql_insert_tmp = "insert into tmp_hachtoanluongthang(tkno,tkco1,sotien1,loaisp) VALUE " . substr($value_tmpluong, 0, -1);

$OBJ->re_query("delete from tmp_hachtoanluongthang");
$OBJ->re_query($sql_insert_tmp);

$dataListtmpButToan = $OBJ->loadListTMPButToan();
foreach ($dataListtmpButToan as $itemButToanTMP){
    if(substr($itemButToanTMP['tkco1'],0,3)=='338' || $itemButToanTMP['tkco1']=='3335'){
        if($itemButToanTMP['tkco1']=='3382' && substr($itemButToanTMP['tkno'],0,3)=='334'){
            $noidung = "Kết chuyển PCĐ nhân viên - T{$txttinhluongtheo}/{$_SESSION['NienDo']}";
        }else if($itemButToanTMP['tkco1']=='3383' && substr($itemButToanTMP['tkno'],0,3)=='334') {
            $noidung = "Kết chuyển BHXH nhân viên - T{$txttinhluongtheo}/{$_SESSION['NienDo']}";
        }else if($itemButToanTMP['tkco1']=='3384' && substr($itemButToanTMP['tkno'],0,3)=='334') {
            $noidung = "Kết chuyển BHYT nhân viên - T{$txttinhluongtheo}/{$_SESSION['NienDo']}";
        }else if($itemButToanTMP['tkco1']=='{$tkBHTN}' && substr($itemButToanTMP['tkno'],0,3)=='334') {
            $noidung = "Kết chuyển BHTN nhân viên - T{$txttinhluongtheo}/{$_SESSION['NienDo']}";
        } elseif($itemButToanTMP['tkco1']=='3382' && substr($itemButToanTMP['tkno'],0,3)!='334'){
            $noidung = "Trích KPCĐ vào CPDN - T{$txttinhluongtheo}/{$_SESSION['NienDo']}";
        }else if($itemButToanTMP['tkco1']=='3383' && substr($itemButToanTMP['tkno'],0,3)!='334') {
            $noidung = "Trích BHXH vào CPDN - T{$txttinhluongtheo}/{$_SESSION['NienDo']}";
        }else if($itemButToanTMP['tkco1']=='3384' && substr($itemButToanTMP['tkno'],0,3)!='334') {
            $noidung = "Trích BHYT vào CPDN - T{$txttinhluongtheo}/{$_SESSION['NienDo']}";
        }else if($itemButToanTMP['tkco1']=='{$tkBHTN}' && substr($itemButToanTMP['tkno'],0,3)!='334') {
            $noidung = "Trích BHTN vào CPDN - T{$txttinhluongtheo}/{$_SESSION['NienDo']}";
        }else{
            $noidung = "Kết chuyển Thuế TNCN nhân viên - T{$txttinhluongtheo}/{$_SESSION['NienDo']}";
        }
    }else{
        $noidung = "Kết chuyển lương - T{$txttinhluongtheo}/{$_SESSION['NienDo']}";
    }

    $value_pskt_83 .=      "('" . $sophieu . "'," . $i . ",'" . $denngay . "','{$itemButToanTMP['tkno']}','83','" . abs($itemButToanTMP['tongtien']) . "','83'),";
    $value_chitiet_pskt_83 .= "(" . $i . ",'" . $denngay . "','" . abs($itemButToanTMP['tongtien']) . "','0','0001','Toàn bộ','100092','{$noidung}','','','{$itemButToanTMP['tkco1']}','','" . abs($itemButToanTMP['tongtien']) . "','4','83','" . $sophieu . "','83','".$itemButToanTMP['loaisp']."'),";
    $sophieu++;
    $i++;

}



$sql_in = "insert into bangluongnhanvien(manv,tennv,chucvu,trinhdo,luongcb,doanhthu,luongkhoan,phucapchucvu,baohiem,thang,thuegtgt,socmnd,phantramthang,phantramquy,phantramnam,tienangiuaca,phucapkhongdungbhxh,thuethunhap,matk1,phantramtk,matk2,loaibp,phicongdoan,baohiemyt,baohiemtn,kinhphicongdoan,dn_baohiem,dn_baohiemyt,dn_baohiemtn) VALUE ".substr($val_ins_bangluong,0,-1);
$sql_pskt_83 = "insert into pskt(sophieu,mapskt,ngayghiso,tkco,loaiphieu,tongcong,btps) VALUE " . substr($value_pskt_83, 0, -1);
$sql_chitiet_pskt_83 = "insert into chitiet_pskt(mapskt,ngayhoadon,gtvnd1,gtvnd2,mabp,bophan,mand1,noidung1,mand2,noidung2,tkno1,tkno2,tongtien,maloai,loaiphieu,sophieu,btps,loaisp) VALUE " . substr($value_chitiet_pskt_83, 0, -1);

if($tinhluongtheo=="false"){

    $OBJ->re_query("delete from bangluongnhanvien WHERE thang='{$txttinhluongtheo}'");
    $OBJ->re_query($sql_in);

    $sql_emp_pskt_83 = "delete from pskt where loaiphieu='83' and ((ngayghiso>='" . $tungay . "' and ngayghiso<='" . $denngay. "') or ngayghiso='0000-00-00')";
    $sql_emp_chitiet_pskt_83 = "delete from chitiet_pskt where loaiphieu='83' and ((ngayhoadon >='" . $tungay . "' and ngayhoadon<='" . $denngay . "') or ngayhoadon='0000-00-00') ";

    $OBJ->re_query($sql_emp_pskt_83);
    $OBJ->re_query($sql_emp_chitiet_pskt_83);
    if($khongtaobuttoan!="true") {
        $OBJ->re_query($sql_pskt_83);
        $OBJ->re_query($sql_chitiet_pskt_83);
    }
}

?>