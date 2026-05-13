<?php
   include("../../config.php");
   $OBJPKT = new phieukiemtra();
   $ngayghiso = $_GET['ngayghiso'];
   $loaiphieu = $_GET['loaiphieu'];
   $sophieu = $_GET['sophieu'];
   $matk = trim($_GET['matk']);

    $_SESSION['chkkhoadulieu'];
    $_SESSION['txtkhoadulieu'];
    $_SESSION['txthienthisole'];
    $_SESSION['apdungketoan'];
    $_SESSION['apdungkhachhang'];
    $_SESSION['chkkhoadulieukhiduyet'];
    $tungay = $_SESSION['NienDo']."-01-01";
    if($matk=="") {
        $OBJPKT->set_orderby(" loaiphieu='" . $loaiphieu . "'");
    }else{
        $OBJPKT->set_orderby(" loaiphieu='" . $loaiphieu . "' and matk='".$matk."'");
    }
    $data_pkt = $OBJPKT->loadListNhatKy_LayMaxMin();
    //debug($data_pkt);
    $tuso = $data_pkt['tuso'];
    $denso = $data_pkt['denso'];

    if($_SESSION['Level']==!"" ){
        if($_SESSION['chkkhoadulieukhiduyet']==1){
            foreach ($data_pkt as $item) {
                if ($sophieu >= $item['tuso'] && $sophieu <= $item['denso']) {
                    echo "Phiếu này đã được duyệt ! Vui lòng liên hệ  kế toán viên nếu muốn cập nhật dữ liệu !";
                    return;
                }
            }
        }
        if($_SESSION['chkkhoadulieu']==1){
           if(strtotime($ngayghiso)>=strtotime($tungay) && strtotime($ngayghiso) <=strtotime($_SESSION['txtkhoadulieu'])){
               echo "Bạn chỉ có thể nhập dữ liệu sau ngày ".date('d-m-Y',strtotime($_SESSION['txtkhoadulieu']))." ! \n Vui lòng liên hệ kế toán viên nếu muốn cập nhật dữ liệu !";
               return;
            }
        }
    }
if($_SESSION['Level']==5 || $_SESSION['Level']==6 ){
    if($_SESSION['chkkhoadulieukhiduyet']==1){
        foreach ($data_pkt as $item) {
            if ($sophieu >= $item['tuso'] && $sophieu <= $item['denso']) {
                echo "Phiếu này đã được duyệt ! Vui lòng liên hệ  kế toán viên nếu muốn cập nhật dữ liệu !";
                return;
            }
        }
    }
    if($_SESSION['chkkhoadulieu']==1){
        if(strtotime($ngayghiso)>=strtotime($tungay) && strtotime($ngayghiso) <=strtotime($_SESSION['txtkhoadulieu'])){
            echo "Bạn chỉ có thể nhập dữ liệu sau ngày ".date('d-m-Y',strtotime($_SESSION['txtkhoadulieu']))." ! \n Vui lòng liên hệ kế toán viên nếu muốn cập nhật dữ liệu !";
            return;
        }
    }
}
?>