<?php
session_start();
include("../../config.php");
$nhanvien = new Nhanvien;
$total = $nhanvien->countNhanVien();
$page = isset($_POST['page']) ? $_POST['page'] : 1;
$rp = isset($_POST['rp']) ? $_POST['rp'] : 10;
$sortname = isset($_POST['sortname']) ? $_POST['sortname'] : 'TenNhanVien';
$sortorder = isset($_POST['sortorder']) ? $_POST['sortorder'] : 'DESC';
$query = isset($_POST['query']) ? $_POST['query'] : false;
$qtype = isset($_POST['qtype']) ? $_POST['qtype'] : false;

$start = ($page-1)*$rp;
$limit =  $rp*$page;
//$sotrang =  ceil($total/$rp);
$sql_order="";
if($query !=false and $qtype!=false)
    $sql_order.=" where $qtype like '%$query%' ";
$sql_order.=" ORDER BY $sortname $sortorder limit $start,$limit ";
$nhanvien->set_orderby($sql_order);
$result = $nhanvien->loadListNhanVien();
$i=1;
foreach($result as $items){
    $rows[$i] = array(
                     'MaNhanVien'=>$items['MaNhanVien'], 
                     'HoNhanVien'=>$items['HoNhanVien'],   
                     'TenNhanVien'=>$items['TenNhanVien'],  
                     'NgaySinh'=>$items['NgaySinh'],   
                     'HinhAnh'=>getNameImages($items['HinhAnh']),
                     'Email'=>$items['Email'],
                     'TenDangNhap'=>$items['TenDangNhap'],
                     'MatKhau'=>$items['MatKhau']
                 );
                 $i++;
    }


header("Content-type: application/json");
$jsonData = array('page'=>$page,'total'=>0,'rows'=>array());
foreach($rows as $rowNum => $row){
    //If cell's elements have named keys, they must match column names
    //Only cell's with named keys and matching columns are order independent.
    $entry = array('id' => $rowNum,
        'cell'=>array(
            'STT'          => $rowNum,
            'MaNhanVien'   => $row['MaNhanVien'],
            'HoNhanVien'   => $row['HoNhanVien'],
            'TenNhanVien'  => $row['TenNhanVien'],
            'NgaySinh'     => $row['NgaySinh'],
            'HinhAnh'      => $row['HinhAnh'],
            'Email'        => $row['Email'],
            'TenDangNhap'=>$items['TenDangNhap'],
            'MatKhau'=>$items['MatKhau']
        )
    );
    $jsonData['rows'][] = $entry;
}
$jsonData['total'] = $total;
echo json_encode($jsonData);
?>
