<?php
include("../../config.php");
$OBJ = new manhanvien;
$OBJ->re_query("insert into bangluongnhanvien(manv,tennv,chucvu,trinhdo,luongcb,phucapchucvu,baohiem,socmnd,tienangiuaca,phucapkhongdungbhxh,thuethunhap,matk1,phantramtk,matk2,loaibp,sapxep) 
                     select manhanvien,tennv,chucdanh,trinhdo,luongcb,phucapchucvu,baohiem,socmnd,tienangiuaca,phucapkhongdungbhxh,thuethunhap,matk1,phantramtk,matk2,loaibp,sapxep from manhanvien where manhanvien not in (select manv from bangluongnhanvien) ");
?>