<?php
include("../../config.php");
$OBJ = new dmsanpham();
$thang = $_GET['thang'];
$sql = "SELECT 
            chitiet_psvt.mavt AS masp, 
            DAY(psvt.ngayghiso) AS ngay, 
            SUM(chitiet_psvt.soluongnhap) AS total_slmasp 
        FROM psvt 
        INNER JOIN chitiet_psvt ON psvt.sophieu = chitiet_psvt.sophieu 
        INNER JOIN masp ON masp.masp = chitiet_psvt.mavt 
        WHERE loaiphieu in (2,3) 
        AND masp.loaisp = 'SP' 
        AND MONTH(psvt.ngayghiso) = ".$thang." 
        GROUP BY chitiet_psvt.mavt, DAY(psvt.ngayghiso)";

$result = $OBJ ->re_query($sql);
$update_sql_xoa = "UPDATE bangthongkethanhpham SET 
                  n1 = 0, n2 = 0, n3 = 0, n4 = 0, n5 = 0, 
                  n6 = 0, n7 = 0, n8 = 0, n9 = 0, n10 = 0, 
                  n11 = 0, n12 = 0, n13 = 0, n14 = 0, n15 = 0, 
                  n16 = 0, n17 = 0, n18 = 0, n19 = 0, n20 = 0, 
                  n21 = 0, n22 = 0, n23 = 0, n24 = 0, n25 = 0, 
                  n26 = 0, n27 = 0, n28 = 0, n29 = 0, n30 = 0, 
                  n31 = 0 where thang=".$thang;
$OBJ ->re_query($update_sql_xoa);
while ($row = $OBJ ->re_fetch($result)) {
    $masp = $row['masp'];
    $ngay = $row['ngay'];
    $soluong = $row['total_slmasp'];
    // Kiểm tra xem sản phẩm đã tồn tại trong bảng chưa
    $update_sql = "UPDATE bangthongkethanhpham SET n".$ngay." = $soluong WHERE masp = '$masp' and thang=".$thang ;
    $OBJ ->re_query($update_sql);
}
echo "Cập nhật dữ liệu thành công!";
?>