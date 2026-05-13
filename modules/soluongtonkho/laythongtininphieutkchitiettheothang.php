<?php
include("../../config.php");
$thangtk = ngaycuoithang(($_GET['thangtk']), $_SESSION['NienDo']);
$sole = $_GET['sole'];
$congdontuthang = $_GET['congdontuthang'];
$congdondenthang = $_GET['congdondenthang'];
$congdon = $_GET['congdon'];
$tutaobuttoanphatsinh = $_GET['tutaobuttoanphatsinh'];
$PhuongPhapTinhGiaVon = $_GET['PhuongPhapTinhGiaVon'];

$OBJCT = new ps_chitiet_mavattu();
$OBJPSKT = new pskt();

$OBJKHO = new makho();
$data_KHO = $OBJKHO->loadListMaKho_CoKeyLaMa();

$OBJCT->setThangNamTK($_SESSION['NienDo']."-".($_GET['thangtk'])."-01");
$OBJCT->setThangTonKho($thangtk);
$OBJCT->setThang($_GET['thangtk']);
if($PhuongPhapTinhGiaVon==2){// Theo phương pháp tính tồn kho liên hoàn
    $data = $OBJCT->themTonKhoThang_LienHoan($data_KHO);
}else {// Theo phương pháp tính tồn kho tháng
    if ($_GET['thangtk'] == 1) {
        if ($tutaobuttoanphatsinh == "true") {
            //// cập nhật giá nhập kho sản xuất----------------------------------
            $data = $OBJCT->laydanhsachphieunhapkhosanxuat_();

            foreach ($data as $sophieu => $iTem) {
                foreach ($iTem as $iTemMaVT) {
                    $dongiaSP = $OBJCT->getdongiagiathanhtieuchuan();

                    $dongia = $dongiaSP[$iTemMaVT['mavt']];
                    $soluong = $iTemMaVT['soluongnhap'];
                    $thanhtien = round($soluong * $dongia);
                    if (array_key_exists($iTemMaVT['matk'], $dinhkhoan[$sophieu])) {
                        $dinhkhoan[$sophieu][$iTemMaVT['matk']] += $thanhtien;
                    } else {
                        $dinhkhoan[$sophieu][$iTemMaVT['matk']] = $thanhtien;
                    }
                    $OBJCT->re_query("update chitiet_psvt set donggianhap='" . $dongia . "',thanhtienchuack='" . $thanhtien . "',thanhtien='" . $thanhtien . "' where sott='" . $iTemMaVT['sott'] . "'");
                }
            }
            foreach ($dinhkhoan as $ksophieu => $itemDK) {
                foreach ($itemDK as $kmatk => $iTemSoTien) {
                    $OBJCT->re_query("update dinhkhoan_psvt set sotien='" . round($iTemSoTien) . "' where sophieu='" . $ksophieu . "' and tkno='" . $kmatk . "'");
                }
            }
            // Kết thúc nhập kho sản xuất--------------------------------
        }

        $data = $OBJCT->themTonKhoThangTuTK($thangtk, $data_KHO);

    } else {
        $data = $OBJCT->themTonKhoThang($thangtk, $data_KHO);
    }
}