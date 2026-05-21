<?php
include("../../config.php");
$OBJ = new bangkechitien();

function parse_number_khonghoadon($value)
{
    if (is_numeric($value)) {
        return (float)$value;
    }
    $value = str_replace(array(",", " "), "", $value);
    if ($value === "") {
        return 0;
    }
    return (float)$value;
}

function tao_mavt_tam_khonghoadon($tenhang, $index)
{
    $ma = strtoupper(khu_dau_vn($tenhang));
    $ma = preg_replace('/[^A-Z0-9]/', '', $ma);
    if ($ma == "") {
        $ma = "HANG";
    }
    $ma = substr($ma, 0, 12);
    return $ma . str_pad($index, 4, "0", STR_PAD_LEFT);
}

$mabangke_input = isset($_GET['mabangke']) ? trim($_GET['mabangke']) : '';
if ($mabangke_input == '') {
    $mabangke_input = "HND" . date("YmdHis");
}
$mabangke = $OBJ->setMabangke($mabangke_input);
$hotennguoichi = $OBJ->setHotennguoichi($_GET['hotennguoichi']);
$bophan = $OBJ->setBophan($_GET['bophan']);
$lydochi = $OBJ->setLydochi($_GET['lydochi']);
$ngaychi = $OBJ->setNgaychi($_GET['ngay']);
$trangthaighi = isset($_GET['trangthaighi']) ? strtoupper(trim($_GET['trangthaighi'])) : 'CHUA_GHI_SO';
if ($trangthaighi !== 'DA_GHI_SO') {
    $trangthaighi = 'CHUA_GHI_SO';
}
$danhsach = ($_GET['danhsach']);
krsort($danhsach);
$noidung = "";
$sotien = 0;
foreach ($danhsach as $item){
    $noidung.=$item["noidung"]."+";
    $sotien+=parse_number_khonghoadon($item["thanhtien"]);
}
$OBJ->setNoidung(substr($noidung,0,-1));
$OBJ->setSotien($sotien);

$sql_exists_bangke = "SELECT mabangke FROM bangkechitien WHERE mabangke='" . check_data($mabangke_input) . "' LIMIT 1";
$query_exists_bangke = $OBJ->re_query($sql_exists_bangke);
$row_exists_bangke = $OBJ->re_fetch($query_exists_bangke);
if (!$row_exists_bangke) {
    $OBJ->themBangKe();
} else {
    $OBJ->suaBangKe();
}
$OBJ->themBangKeChiTiet();

$mabangke_raw = check_data($mabangke_input);
$sql_check = "SELECT sophieu,mapskt FROM psvt WHERE loaiphieu='1' and noidung='BK MUA KHONG HOA DON: " . $mabangke_raw . "' LIMIT 1";
$query_check = $OBJ->re_query($sql_check);
$row_check = $OBJ->re_fetch($query_check);
if (!$row_check) {
    $PVT = new psmavattu();
    $PVT->set_orderby(" loaiphieu = 1");
    $mapskt = $PVT->createMaPSKT();
    $sophieu = $PVT->createSoPhieuTime();
    $tongtien = 0;
    foreach ($danhsach as $item) {
        $thanhtien = parse_number_khonghoadon($item["thanhtien"]);
        if ($thanhtien <= 0) {
            $thanhtien = round(parse_number_khonghoadon($item["socong"]) * parse_number_khonghoadon($item["dongia"]));
        }
        $tongtien += $thanhtien;
    }

    $ngay = check_data($_GET['ngay']);
    $is_mau_02_tndn = (strtotime($ngay) >= strtotime('2026-01-01'));
    $ma_noidung_tndn = $is_mau_02_tndn ? "02TNDN" : "01TNDN";
    $ten_noidung_tndn = $is_mau_02_tndn ? "BK 02/TNDN KHONG HOA DON" : "BK 01/TNDN KHONG HOA DON";
    $trang_thai_ghi_so_text = ($trangthaighi === 'DA_GHI_SO') ? 'GHI SO' : 'CHUA GHI SO';
    $diachi = addslashes($_GET['bophan']);
    $nguoiphutrach = addslashes($_GET['hotennguoichi']);

    $PVT->setMaPSKT($mapskt);
    $PVT->setSoPhieu($sophieu);
    $PVT->setSeri("");
    $PVT->setSCT("");
    $PVT->setMauSo("");
    $PVT->setNgayGhiSo($ngay);
    $PVT->setNgayHD($ngay);
    $PVT->setNgayTT($ngay);
    $PVT->setLP(1);
    $PVT->setMaND($ma_noidung_tndn);
    $PVT->setTenND($ten_noidung_tndn . ": " . $mabangke_raw);
    $PVT->setMaKH(check_data($_GET['makh']));
    $PVT->setMaSoThue("");
    $PVT->setTenKH($nguoiphutrach);
    $PVT->setDiaChi($diachi);
    $PVT->setMaKho("0010");
    $PVT->setTenKho("KHO CHINH");
    $PVT->setNhapVaoKho("0010");
    $PVT->setMaLoai(0);
    $PVT->set_ChuThich($trang_thai_ghi_so_text . " - TU DONG TAO TU BANG KE MUA KHONG HOA DON - " . $ten_noidung_tndn);
    $PVT->setCoThueGTGT(0);
    $PVT->setCoChietKhau(0);
    $PVT->setCoBaoGomThue(0);
    $PVT->setTienHang($tongtien);
    $PVT->setTienThue(0);
    $PVT->setTongCong($tongtien);
    $PVT->setTongTienNT(0);
    $PVT->setTienChietKhau(0);
    $PVT->setThanhTienMT(0);
    $PVT->setCoChungTuGoc(0);
    $PVT->setChietKhauDoanhSo(0);
    $PVT->setChiPhiKhongLoaiTru(0);
    $PVT->setLoaiToKhai(1);
    $PVT->setLoaiSP("HH");
    $PVT->setMaSoBiMat("");
    $PVT->setLoaiHDDT(0);
    $PVT->setCoNgayKhaiThue(0);
    $PVT->setNgayKhaiThue($ngay);
    $PVT->setLoaiHangHoaDichVu(1);
    $PVT->setTenCaNhan($nguoiphutrach);
    $PVT->setLaCongTrinh(0);
    $PVT->setDuAnDauTu(0);
    $PVT->setChiNhanhCongTy("0");
    $PVT->themPhieuNhapKho();

    $PVT->re_query("INSERT INTO dinhkhoan_psvt(sophieu,tkno,tkco,sotien,sotiennt) VALUES ('" . $sophieu . "','1561','1111','" . $tongtien . "','0')");

    $stt = 0;
    foreach ($danhsach as $item) {
        $stt++;
        $tenhang = addslashes($item["noidung"]);
        $soluong = parse_number_khonghoadon($item["socong"]);
        $dongia = parse_number_khonghoadon($item["dongia"]);
        $thanhtien = parse_number_khonghoadon($item["thanhtien"]);
        if ($thanhtien <= 0) {
            $thanhtien = round($soluong * $dongia);
        }
        $dvt = trim($item["ghichu"]);
        if ($dvt == "") {
            $dvt = "kg";
        }
        $mavt = tao_mavt_tam_khonghoadon($item["noidung"], $stt);
        $sql_ct = "INSERT INTO chitiet_psvt(mavt,tenvt,dvt,soluongnhap,donggianhap,thanhtienchuack,thanhtien,thuesuat,thue,sophieu) VALUES ('" . $mavt . "','" . $tenhang . "','" . addslashes($dvt) . "','" . $soluong . "','" . $dongia . "','" . $thanhtien . "','" . $thanhtien . "','0','0','" . $sophieu . "')";
        $PVT->re_query($sql_ct);
    }
    $_SESSION['PHIEUNHAPKHO_BANGKEKHONGHOADON'] = array(
        'sophieu' => $sophieu,
        'mapskt' => $mapskt,
        'ghichu' => $trang_thai_ghi_so_text
    );
}

$_SESSION['BANGTHUENGOAI'] = $_GET;

?>