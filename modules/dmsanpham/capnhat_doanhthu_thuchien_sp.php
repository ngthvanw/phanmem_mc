<?php
include("../../config.php");
$tungay = $_GET['tungay'];
$denngay = $_GET['denngay'];

$OBJCT = new ketoantonghop();
$dataDoanhThuThuan = $OBJCT->load_danhsach_doanhthu_thuan_sanpham($tungay, $denngay);// Lấy doanh thu thuần từng sản phẩm
$DonGiaBanMotSP = array();
foreach ($dataDoanhThuThuan as $KMaSP => $Item){
    $DonGiaBanMotSP[$KMaSP] = $Item['tienco']/$Item['soluong'];
}
$sql = "SELECT chitiet_psvt.mavt AS masp,SUM(chitiet_psvt.soluongnhap) AS total_slmasp 
        FROM psvt 
        INNER JOIN chitiet_psvt ON psvt.sophieu = chitiet_psvt.sophieu 
        INNER JOIN masp ON masp.masp = chitiet_psvt.mavt 
        WHERE loaiphieu in (2,3) AND masp.loaisp = 'SP' AND psvt.ngayghiso >= '".$tungay."'  and psvt.ngayghiso <= '".$denngay."'
        GROUP BY chitiet_psvt.mavt";
$result = $OBJCT ->re_query($sql);
$OBJCT->re_query("UPDATE bangdoanhthuthucte
					JOIN masp ON bangdoanhthuthucte.mact = masp.masp
					SET bangdoanhthuthucte.gtcongtrinh = 0,bangdoanhthuthucte.doanhthuthucte = 0
					WHERE masp.loaisp = 'SP';");
while ($row = $OBJCT ->re_fetch($result)) {
    $masp = $row['masp'];
    $soluong = $row['total_slmasp'];
    $thanhtien = round($soluong*$DonGiaBanMotSP[$masp]);
    $OBJCT->re_query("delete from bangdoanhthuthucte where mact='".$masp."'");
    $OBJCT->re_query("insert into bangdoanhthuthucte(mact,gtcongtrinh,tyle,doanhthuthucte) values ('".$masp."','".$thanhtien."',100,'".$thanhtien."');");
}