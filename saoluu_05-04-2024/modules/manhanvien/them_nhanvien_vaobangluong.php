<?php
include("../../config.php");
$OBJ = new manhanvien;
$thang = $_GET['thang'];
$socmndstr = str_replace(",","','",$_GET['socmnd']);
$socmnd = str_replace(";","','",$_GET['socmnd']);
 $sql_in = "insert into bangluongnhanvien(manv,tennv,chucvu,trinhdo,luongcb,doanhthu,luongkhoan,phucapchucvu,baohiem,thang,thuegtgt,socmnd,phantramthang,phantramquy,phantramnam,tienangiuaca,phucapkhongdungbhxh,thuethunhap,matk1,phantramtk,matk2,loaibp) 
            select manhanvien,tennv,chucdanh,trinhdo,luongcb,0 doanhthu,0 luongkhoan,phucapchucvu,baohiem,{$thang} thang,0,socmnd,phantramthang,phantramquy,phantramnam,tienangiuaca,phucapkhongdungbhxh,thuethunhap,matk1,phantramtk,matk2,loaibp from manhanvien where socmnd in ('".$socmnd."') and socmnd not in( select socmnd from bangluongnhanvien where thang=".$thang.")
";
if ($OBJ->re_query($sql_in)) {
    echo "Đã thêm nhân viên vào bảng lương tháng {$thang}!";
}else{
    echo "Có lỗi trong quá trong quá trình thêm dữ liệu!";
}
?>