<?php
session_start();
include("../../config.php");
$donvitinh = new Donvitinh;
$total = $donvitinh->countNhanVien();
$page = isset($_POST['page']) ? $_POST['page'] : 1;
$rp = isset($_POST['rp']) ? $_POST['rp'] : 10;
$sortname = isset($_POST['sortname']) ? $_POST['sortname'] : 'TenDVT';
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
$donvitinh->set_orderby($sql_order);
$result = $donvitinh->loadListDonViTinh();
$i=1;
foreach($result as $items){
    $rows[$i] = array(
                     'MaDVT'=>$items['MaDVT'], 
                     'TenDVT'=>$items['TenDVT'],   
                     'GhiChu'=>$items['GhiChu'],  
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
            'MaDVT'        => $row['MaDVT'],
            'TenDVT'       => $row['TenDVT'],
            'GhiChu'       => $row['GhiChu'],
        )
    );
    $jsonData['rows'][] = $entry;
}
$jsonData['total'] = $total;
echo json_encode($jsonData);
?>
