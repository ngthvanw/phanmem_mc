<?php
include("../../config.php");
$thangtk = $_GET['thangtk'];// Đến tháng
$sole = $_GET['sole'];
$congdontuthang = $_GET['congdontuthang'];
$congdondenthang = $_GET['congdondenthang'];
$congdon = $_GET['congdon'];
echo 1111;
$OBJ = new psmavattu();
$OBJCT = new ps_chitiet_mavattu();
if($congdon==0){
    if($thangtk=="1"){// lấy table tk làm đầu kỳ
        // Kiểm tra xem có chuyển đầu kỳ năm cũ qua chưa // Nếu chưa phải chuyển năm cũ qua
       $checkTKDK = $OBJCT->kiemTraTonKhoDauKy();
       if($checkTKDK==FALSE){
          echo "<script>alert('Chưa có tồn kho đầu kỳ');</script>";
       }else{
           // Tính tồn kho tháng 1
           echo "<script>alert('Chưa có tồn kho đầu kỳ');</script>";
       }

    }else{// tháng bằng số khác thì lấy tháng trước làm số đầu kỳ
        // Kiểm tra xem tháng trước có tồn kho chưa

        //Nếu chưa thì thi báo để tạo tồn kho tháng trước

        // else nếu có thì thông báo 1 ghi đè 2 không

    }

}else {
    $OBJCT->setThangTonKho($congdondenthang);
    $OBJCT->setThangNamTK($congdontuthang);

    $_SESSION["THONGTINPHIEU"]['thangtk'] = "Từ  " . dd_mm_yyy($congdontuthang) . " đến " . dd_mm_yyy($congdondenthang);
    $OBJCT->loadListDanhSachTKChiTiet();
    $dataCT = $OBJCT->loadListDanhSachTKChiTietCuoiKyTheoNhom();// thông tin tồn đầu kỳ
}

$_SESSION["THONGTINPHIEU"]['tenphieu'] = $_GET['tenphieu'];
$_SESSION["THONGTINPHIEU"]['ngaylap'] = $_GET['ngaylap'];
$_SESSION["THONGTINPHIEU"]['sole'] = $sole;
$_SESSION["LISTTKTHANG"]=$dataCT ;

debug($dataCT);


