<?php
ini_set('max_execution_time', 300);
require("../../config.php");
$OBJ = new ps_chitiet_mavattu();
$OBJ_MKH = new makhachhang;
$NhaCungCap = "Excel";

$xmlString = trim($_SESSION['DataTangGiamTaiSan']);

//////////////////////////////////////////////////////////////////////////////////////////////
if ($NhaCungCap == 'Excel') {
    $data = $_SESSION['DataExcel_TangGiamTaiSan'];
    foreach ($data as $k => $item) {
        if ($k != 0 && $item[1] != "") {

            $OBJ->re_query("insert into makh (sott,makh,masothue,tenkh,diachi,makhcha,tenkd,manhom) value (0,'" . $item[1] . "','" . $item[3] . "','" . $item[4] . "','" . $item[5] . "','0','" . khu_dau_vn($item[4]) . "','1001')");
            $OBJ->re_query("update makh set sott=stt where sott=0");
            $OBJ->re_query("delete from sdcn where makh='" . $item[1] . "' and matk='".$item[6]."'");
            $sql = "INSERT INTO sdcn (makh,makhcha,matk,sdkno,sdkco) value('" . $item[1] . "','" . $item[2] . "','" . $item[6] . "','" . $item[7] . "','" . $item[8] . "')";
            $OBJ->re_query($sql);
        }
    }
}
$OBJ->re_query("update mavt set sott=stt where sott=0");
//unset($_SESSION['DataExcel']);
//unset($_SESSION['DataPhucHoi']);
echo "Đã thêm dữ liệu thành công!";
?>