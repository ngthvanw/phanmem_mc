<?php

class dmsanpham extends database
{
    public $tringorder;

    public $MaCT;
    public $MaCTCha;
    public $TenCT;
    public $TenKD;
    public $MaKH;
    public $DiaChi;
    public $SoHD;
    public $NgayHD;
    public $NgayKC;
    public $NgayHT;
    public $GiaTriHD;
    public $VatLieu;
    public $DVT;
    public $NhanCong;
    public $May;
    public $DaQuyetToan;
    public $ChuThich;
    public $SoTT;
    public $NamSX;
    public $LoaiSP;

    public $mavt;
    public $dinhmuc;
    public $tylehaohoc;
    public $SoLuong;
    public $DonGia;
    public $ThanhTien;
    public $Thue;
    public $MaHangMuc;
    public $TenHangMuc;
    public $Thang;
    public $Thang1;
    public $Thang2;
    public $Thang3;
    public $Thang4;
    public $Thang5;
    public $Thang6;
    public $Thang7;
    public $Thang8;
    public $Thang9;
    public $Thang10;

    public $Ngay1;
    public $Ngay2;
    public $Ngay3;
    public $Ngay4;
    public $Ngay5;
    public $Ngay6;
    public $Ngay7;
    public $Ngay8;
    public $Ngay9;
    public $Ngay10;

    public $Ngay11;
    public $Ngay12;
    public $Ngay13;
    public $Ngay14;
    public $Ngay15;
    public $Ngay16;
    public $Ngay17;
    public $Ngay18;
    public $Ngay19;
    public $Ngay20;

    public $Ngay21;
    public $Ngay22;
    public $Ngay23;
    public $Ngay24;
    public $Ngay25;
    public $Ngay26;
    public $Ngay27;
    public $Ngay28;
    public $Ngay29;
    public $Ngay30;
    public $Ngay31;
    public $SoDuNo;

    public $GTCongTrinh;

    public $SoHopDong;

    public $NgayHopDong;
    public $NgayNghiemThu;
    public $GiaTriNghiemThu;
    public $GhiChu;
    public $DiaBanUuDai;

    /**
     * @return mixed
     */
    public function getDiaBanUuDai()
    {
        return $this->DiaBanUuDai;
    }

    /**
     * @param mixed $DiaBanUuDai
     */
    public function setDiaBanUuDai($DiaBanUuDai)
    {
        $this->DiaBanUuDai = $DiaBanUuDai;
    }

    /**
     * @return mixed
     */
    public function getGhiChu()
    {
        return $this->GhiChu;
    }

    /**
     * @param mixed $GhiChu
     */
    public function setGhiChu($GhiChu)
    {
        $this->GhiChu = $GhiChu;
    }

    /**
     * @return mixed
     */
    public function getSoHopDong()
    {
        return $this->SoHopDong;
    }

    /**
     * @param mixed $SoHopDong
     */
    public function setSoHopDong($SoHopDong)
    {
        $this->SoHopDong = $SoHopDong;
    }

    /**
     * @return mixed
     */
    public function getNgayHopDong()
    {
        return $this->NgayHopDong;
    }

    /**
     * @param mixed $NgayHopDong
     */
    public function setNgayHopDong($NgayHopDong)
    {
        $this->NgayHopDong = $NgayHopDong;
    }

    /**
     * @return mixed
     */
    public function getNgayNghiemThu()
    {
        return $this->NgayNghiemThu;
    }

    /**
     * @param mixed $NgayNghiemThu
     */
    public function setNgayNghiemThu($NgayNghiemThu)
    {
        $this->NgayNghiemThu = $NgayNghiemThu;
    }

    /**
     * @return mixed
     */
    public function getGiaTriNghiemThu()
    {
        return $this->GiaTriNghiemThu;
    }

    /**
     * @param mixed $GiaTriNghiemThu
     */
    public function setGiaTriNghiemThu($GiaTriNghiemThu)
    {
        $this->GiaTriNghiemThu = $GiaTriNghiemThu;
    }

    /**
     * @return mixed
     */
    public function getPhanTramHTNT()
    {
        return $this->PhanTramHTNT;
    }

    /**
     * @param mixed $PhanTramHTNT
     */
    public function setPhanTramHTNT($PhanTramHTNT)
    {
        $this->PhanTramHTNT = $PhanTramHTNT;
    }

    /**
     * @return mixed
     */
    public function getPhanTramHTTT()
    {
        return $this->PhanTramHTTT;
    }

    /**
     * @param mixed $PhanTramHTTT
     */
    public function setPhanTramHTTT($PhanTramHTTT)
    {
        $this->PhanTramHTTT = $PhanTramHTTT;
    }

    public $PhanTramHTNT;
    public $PhanTramHTTT;

    /**
     * @return mixed
     */
    public function getGTCongTrinh()
    {
        return $this->GTCongTrinh;
    }

    /**
     * @param mixed $GTCongTrinh
     */
    public function setGTCongTrinh($GTCongTrinh)
    {
        $this->GTCongTrinh = $GTCongTrinh;
    }

    /**
     * @return mixed
     */
    public function getTyLe()
    {
        return $this->TyLe;
    }

    /**
     * @param mixed $TyLe
     */
    public function setTyLe($TyLe)
    {
        $this->TyLe = $TyLe;
    }

    /**
     * @return mixed
     */
    public function getDoanhThuThucTe()
    {
        return $this->DoanhThuThucTe;
    }

    /**
     * @param mixed $DoanhThuThucTe
     */
    public function setDoanhThuThucTe($DoanhThuThucTe)
    {
        $this->DoanhThuThucTe = $DoanhThuThucTe;
    }

    public $TyLe;
    public $DoanhThuThucTe;

    /**
     * @return mixed
     */
    public function getSoDuNo()
    {
        return $this->SoDuNo;
    }

    /**
     * @param mixed $SoDuNo
     */
    public function setSoDuNo($SoDuNo)
    {
        $this->SoDuNo = $SoDuNo;
    }

    /**
     * @return mixed
     */
    public function getSoDuCo()
    {
        return $this->SoDuCo;
    }

    /**
     * @param mixed $SoDuCo
     */
    public function setSoDuCo($SoDuCo)
    {
        $this->SoDuCo = $SoDuCo;
    }

    public $SoDuCo;

    /**
     * @return mixed
     */
    public function getNgay1()
    {
        return $this->Ngay1;
    }

    /**
     * @param mixed $Ngay1
     */
    public function setNgay1($Ngay1)
    {
        $this->Ngay1 = $Ngay1;
    }

    /**
     * @return mixed
     */
    public function getNgay2()
    {
        return $this->Ngay2;
    }

    /**
     * @param mixed $Ngay2
     */
    public function setNgay2($Ngay2)
    {
        $this->Ngay2 = $Ngay2;
    }

    /**
     * @return mixed
     */
    public function getNgay3()
    {
        return $this->Ngay3;
    }

    /**
     * @param mixed $Ngay3
     */
    public function setNgay3($Ngay3)
    {
        $this->Ngay3 = $Ngay3;
    }

    /**
     * @return mixed
     */
    public function getNgay4()
    {
        return $this->Ngay4;
    }

    /**
     * @param mixed $Ngay4
     */
    public function setNgay4($Ngay4)
    {
        $this->Ngay4 = $Ngay4;
    }

    /**
     * @return mixed
     */
    public function getNgay5()
    {
        return $this->Ngay5;
    }

    /**
     * @param mixed $Ngay5
     */
    public function setNgay5($Ngay5)
    {
        $this->Ngay5 = $Ngay5;
    }

    /**
     * @return mixed
     */
    public function getNgay6()
    {
        return $this->Ngay6;
    }

    /**
     * @param mixed $Ngay6
     */
    public function setNgay6($Ngay6)
    {
        $this->Ngay6 = $Ngay6;
    }

    /**
     * @return mixed
     */
    public function getNgay7()
    {
        return $this->Ngay7;
    }

    /**
     * @param mixed $Ngay7
     */
    public function setNgay7($Ngay7)
    {
        $this->Ngay7 = $Ngay7;
    }

    /**
     * @return mixed
     */
    public function getNgay8()
    {
        return $this->Ngay8;
    }

    /**
     * @param mixed $Ngay8
     */
    public function setNgay8($Ngay8)
    {
        $this->Ngay8 = $Ngay8;
    }

    /**
     * @return mixed
     */
    public function getNgay9()
    {
        return $this->Ngay9;
    }

    /**
     * @param mixed $Ngay9
     */
    public function setNgay9($Ngay9)
    {
        $this->Ngay9 = $Ngay9;
    }

    /**
     * @return mixed
     */
    public function getNgay10()
    {
        return $this->Ngay10;
    }

    /**
     * @param mixed $Ngay10
     */
    public function setNgay10($Ngay10)
    {
        $this->Ngay10 = $Ngay10;
    }

    /**
     * @return mixed
     */
    public function getNgay11()
    {
        return $this->Ngay11;
    }

    /**
     * @param mixed $Ngay11
     */
    public function setNgay11($Ngay11)
    {
        $this->Ngay11 = $Ngay11;
    }

    /**
     * @return mixed
     */
    public function getNgay12()
    {
        return $this->Ngay12;
    }

    /**
     * @param mixed $Ngay12
     */
    public function setNgay12($Ngay12)
    {
        $this->Ngay12 = $Ngay12;
    }

    /**
     * @return mixed
     */
    public function getNgay13()
    {
        return $this->Ngay13;
    }

    /**
     * @param mixed $Ngay13
     */
    public function setNgay13($Ngay13)
    {
        $this->Ngay13 = $Ngay13;
    }

    /**
     * @return mixed
     */
    public function getNgay14()
    {
        return $this->Ngay14;
    }

    /**
     * @param mixed $Ngay14
     */
    public function setNgay14($Ngay14)
    {
        $this->Ngay14 = $Ngay14;
    }

    /**
     * @return mixed
     */
    public function getNgay15()
    {
        return $this->Ngay15;
    }

    /**
     * @param mixed $Ngay15
     */
    public function setNgay15($Ngay15)
    {
        $this->Ngay15 = $Ngay15;
    }

    /**
     * @return mixed
     */
    public function getNgay16()
    {
        return $this->Ngay16;
    }

    /**
     * @param mixed $Ngay16
     */
    public function setNgay16($Ngay16)
    {
        $this->Ngay16 = $Ngay16;
    }

    /**
     * @return mixed
     */
    public function getNgay17()
    {
        return $this->Ngay17;
    }

    /**
     * @param mixed $Ngay17
     */
    public function setNgay17($Ngay17)
    {
        $this->Ngay17 = $Ngay17;
    }

    /**
     * @return mixed
     */
    public function getNgay18()
    {
        return $this->Ngay18;
    }

    /**
     * @param mixed $Ngay18
     */
    public function setNgay18($Ngay18)
    {
        $this->Ngay18 = $Ngay18;
    }

    /**
     * @return mixed
     */
    public function getNgay19()
    {
        return $this->Ngay19;
    }

    /**
     * @param mixed $Ngay19
     */
    public function setNgay19($Ngay19)
    {
        $this->Ngay19 = $Ngay19;
    }

    /**
     * @return mixed
     */
    public function getNgay20()
    {
        return $this->Ngay20;
    }

    /**
     * @param mixed $Ngay20
     */
    public function setNgay20($Ngay20)
    {
        $this->Ngay20 = $Ngay20;
    }

    /**
     * @return mixed
     */
    public function getNgay21()
    {
        return $this->Ngay21;
    }

    /**
     * @param mixed $Ngay21
     */
    public function setNgay21($Ngay21)
    {
        $this->Ngay21 = $Ngay21;
    }

    /**
     * @return mixed
     */
    public function getNgay22()
    {
        return $this->Ngay22;
    }

    /**
     * @param mixed $Ngay22
     */
    public function setNgay22($Ngay22)
    {
        $this->Ngay22 = $Ngay22;
    }

    /**
     * @return mixed
     */
    public function getNgay23()
    {
        return $this->Ngay23;
    }

    /**
     * @param mixed $Ngay23
     */
    public function setNgay23($Ngay23)
    {
        $this->Ngay23 = $Ngay23;
    }

    /**
     * @return mixed
     */
    public function getNgay24()
    {
        return $this->Ngay24;
    }

    /**
     * @param mixed $Ngay24
     */
    public function setNgay24($Ngay24)
    {
        $this->Ngay24 = $Ngay24;
    }

    /**
     * @return mixed
     */
    public function getNgay25()
    {
        return $this->Ngay25;
    }

    /**
     * @param mixed $Ngay25
     */
    public function setNgay25($Ngay25)
    {
        $this->Ngay25 = $Ngay25;
    }

    /**
     * @return mixed
     */
    public function getNgay26()
    {
        return $this->Ngay26;
    }

    /**
     * @param mixed $Ngay26
     */
    public function setNgay26($Ngay26)
    {
        $this->Ngay26 = $Ngay26;
    }

    /**
     * @return mixed
     */
    public function getNgay27()
    {
        return $this->Ngay27;
    }

    /**
     * @param mixed $Ngay27
     */
    public function setNgay27($Ngay27)
    {
        $this->Ngay27 = $Ngay27;
    }

    /**
     * @return mixed
     */
    public function getNgay28()
    {
        return $this->Ngay28;
    }

    /**
     * @param mixed $Ngay28
     */
    public function setNgay28($Ngay28)
    {
        $this->Ngay28 = $Ngay28;
    }

    /**
     * @return mixed
     */
    public function getNgay29()
    {
        return $this->Ngay29;
    }

    /**
     * @param mixed $Ngay29
     */
    public function setNgay29($Ngay29)
    {
        $this->Ngay29 = $Ngay29;
    }

    /**
     * @return mixed
     */
    public function getNgay30()
    {
        return $this->Ngay30;
    }

    /**
     * @param mixed $Ngay30
     */
    public function setNgay30($Ngay30)
    {
        $this->Ngay30 = $Ngay30;
    }

    /**
     * @return mixed
     */
    public function getNgay31()
    {
        return $this->Ngay31;
    }

    /**
     * @param mixed $Ngay31
     */
    public function setNgay31($Ngay31)
    {
        $this->Ngay31 = $Ngay31;
    }

    /**
     * @return mixed
     */
    public function getThang()
    {
        return $this->Thang;
    }

    /**
     * @param mixed $Thang
     */
    public function setThang($Thang)
    {
        $this->Thang = $Thang;
    }


    /**
     * @return mixed
     */
    public function getThang1()
    {
        return $this->Thang1;
    }

    /**
     * @param mixed $Thang1
     */
    public function setThang1($Thang1)
    {
        $this->Thang1 = $Thang1;
    }

    /**
     * @return mixed
     */
    public function getThang2()
    {
        return $this->Thang2;
    }

    /**
     * @param mixed $Thang2
     */
    public function setThang2($Thang2)
    {
        $this->Thang2 = $Thang2;
    }

    /**
     * @return mixed
     */
    public function getThang3()
    {
        return $this->Thang3;
    }

    /**
     * @param mixed $Thang3
     */
    public function setThang3($Thang3)
    {
        $this->Thang3 = $Thang3;
    }

    /**
     * @return mixed
     */
    public function getThang4()
    {
        return $this->Thang4;
    }

    /**
     * @param mixed $Thang4
     */
    public function setThang4($Thang4)
    {
        $this->Thang4 = $Thang4;
    }

    /**
     * @return mixed
     */
    public function getThang5()
    {
        return $this->Thang5;
    }

    /**
     * @param mixed $Thang5
     */
    public function setThang5($Thang5)
    {
        $this->Thang5 = $Thang5;
    }

    /**
     * @return mixed
     */
    public function getThang6()
    {
        return $this->Thang6;
    }

    /**
     * @param mixed $Thang6
     */
    public function setThang6($Thang6)
    {
        $this->Thang6 = $Thang6;
    }

    /**
     * @return mixed
     */
    public function getThang7()
    {
        return $this->Thang7;
    }

    /**
     * @param mixed $Thang7
     */
    public function setThang7($Thang7)
    {
        $this->Thang7 = $Thang7;
    }

    /**
     * @return mixed
     */
    public function getThang8()
    {
        return $this->Thang8;
    }

    /**
     * @param mixed $Thang8
     */
    public function setThang8($Thang8)
    {
        $this->Thang8 = $Thang8;
    }

    /**
     * @return mixed
     */
    public function getThang9()
    {
        return $this->Thang9;
    }

    /**
     * @param mixed $Thang9
     */
    public function setThang9($Thang9)
    {
        $this->Thang9 = $Thang9;
    }

    /**
     * @return mixed
     */
    public function getThang10()
    {
        return $this->Thang10;
    }

    /**
     * @param mixed $Thang10
     */
    public function setThang10($Thang10)
    {
        $this->Thang10 = $Thang10;
    }

    /**
     * @return mixed
     */
    public function getThang11()
    {
        return $this->Thang11;
    }

    /**
     * @param mixed $Thang11
     */
    public function setThang11($Thang11)
    {
        $this->Thang11 = $Thang11;
    }

    /**
     * @return mixed
     */
    public function getThang12()
    {
        return $this->Thang12;
    }

    /**
     * @param mixed $Thang12
     */
    public function setThang12($Thang12)
    {
        $this->Thang12 = $Thang12;
    }

    public $Thang11;
    public $Thang12;

    /**
     * @return mixed
     */
    public function getSoLuong()
    {
        return $this->SoLuong;
    }

    /**
     * @param mixed $SoLuong
     */
    public function setSoLuong($SoLuong)
    {
        $this->SoLuong = $SoLuong;
    }

    /**
     * @return mixed
     */
    public function getDonGia()
    {
        return $this->DonGia;
    }

    /**
     * @param mixed $DonGia
     */
    public function setDonGia($DonGia)
    {
        $this->DonGia = $DonGia;
    }

    /**
     * @return mixed
     */
    public function getThanhTien()
    {
        return $this->ThanhTien;
    }

    /**
     * @param mixed $ThanhTien
     */
    public function setThanhTien($ThanhTien)
    {
        $this->ThanhTien = $ThanhTien;
    }

    /**
     * @return mixed
     */
    public function getThue()
    {
        return $this->Thue;
    }

    /**
     * @param mixed $Thue
     */
    public function setThue($Thue)
    {
        $this->Thue = $Thue;
    }

    /**
     * @return mixed
     */
    public function getMaHangMuc()
    {
        return $this->MaHangMuc;
    }

    /**
     * @param mixed $MaHangMuc
     */
    public function setMaHangMuc($MaHangMuc)
    {
        $this->MaHangMuc = $MaHangMuc;
    }

    /**
     * @return mixed
     */
    public function getTenHangMuc()
    {
        return $this->TenHangMuc;
    }

    /**
     * @param mixed $TenHangMuc
     */
    public function setTenHangMuc($TenHangMuc)
    {
        $this->TenHangMuc = $TenHangMuc;
    }


    /**
     * @return mixed
     */
    public function getMavt()
    {
        return $this->mavt;
    }

    /**
     * @param mixed $mavt
     */
    public function setMavt($mavt)
    {
        $this->mavt = $mavt;
    }

    /**
     * @return mixed
     */
    public function getLoaiSP()
    {
        return $this->LoaiSP;
    }

    /**
     * @param mixed $LoaiSP
     */
    public function setLoaiSP($LoaiSP)
    {
        $this->LoaiSP = $LoaiSP;
    }

    /**
     * @return mixed
     */

    public function getDaQuyetToan()
    {
        return $this->DaQuyetToan;
    }

    /**
     * @param mixed $DaQuyetToan
     */
    public function setDaQuyetToan($DaQuyetToan)
    {
        $this->DaQuyetToan = $DaQuyetToan;
    }

    /**
     * @return mixed
     */

    public function getDinhmuc()
    {
        return $this->dinhmuc;
    }

    /**
     * @param mixed $dinhmuc
     */
    public function setDinhmuc($dinhmuc)
    {
        $this->dinhmuc = $dinhmuc;
    }

    /**
     * @return mixed
     */
    public function getTylehaohoc()
    {
        return $this->tylehaohoc;
    }

    /**
     * @param mixed $tylehaohoc
     */
    public function setTylehaohoc($tylehaohoc)
    {
        $this->tylehaohoc = $tylehaohoc;
    }

    /**
     * @return mixed
     */
    public function getDinhmuckecakhauhao()
    {
        return $this->dinhmuckecakhauhao;
    }

    /**
     * @param mixed $dinhmuckecakhauhao
     */
    public function setDinhmuckecakhauhao($dinhmuckecakhauhao)
    {
        $this->dinhmuckecakhauhao = $dinhmuckecakhauhao;
    }

    /**
     * @return mixed
     */
    public function getNamSX()
    {
        return $this->NamSX;
    }

    /**
     * @param mixed $NamSX
     */
    public function setNamSX($NamSX)
    {
        $this->NamSX = $NamSX;
    }

    public function __construct()
    {
        $this->connect();
    }

    public function __destruct()
    {
        $this->disconnect();
    }

    public function set_orderby($string)
    {
        $this->tringorder = $string;
    }

    public function get_orderby()
    {
        return $this->tringorder;
    }

    public function set_SoTT($SoTT)
    {
        $this->SoTT = $SoTT;
    }

    public function get_SoTT()
    {
        return $this->SoTT;
    }

    public function set_DVT($DVT)
    {
        $this->DVT = $DVT;
    }

    public function get_DVT()
    {
        return $this->DVT;
    }

    public function set_MaCT($MaCT)
    {
        $this->MaCT = $MaCT;
    }

    public function get_MaCT()
    {
        return $this->MaCT;
    }

    public function set_MaCTCha($MaCTCha)
    {
        $this->MaCTCha = $MaCTCha;
    }

    public function get_MaCTCha()
    {
        return $this->MaCTCha;
    }

    public function set_TenCT($TenCT)
    {
        $this->TenCT = $TenCT;
    }

    public function get_TenCT()
    {
        return $this->TenCT;
    }

    public function set_TenKD($TenKD)
    {
        $this->TenKD = $TenKD;
    }

    public function get_TenKD()
    {
        return $this->TenKD;
    }

    public function set_MaKH($MaKH)
    {
        $this->MaKH = $MaKH;
    }

    public function get_MaKH()
    {
        return $this->MaKH;
    }

    public function set_SoHD($SoHD)
    {
        $this->SoHD = $SoHD;
    }

    public function get_SoHD()
    {
        return $this->SoHD;
    }

    public function set_NgayHD($NgayHD)
    {
        $this->NgayHD = $NgayHD;
    }

    public function get_NgayHD()
    {
        return $this->NgayHD;
    }

    public function set_NgayKC($NgayKC)
    {
        $this->NgayKC = $NgayKC;
    }

    public function get_NgayKC()
    {
        return $this->NgayKC;
    }

    public function set_NgayHT($NgayHT)
    {
        $this->NgayHT = $NgayHT;
    }

    public function get_NgayHT()
    {
        return $this->NgayHT;
    }

    public function set_GiaTriHD($GiaTriHD)
    {
        $this->GiaTriHD = $GiaTriHD;
    }

    public function get_GiaTriHD()
    {
        return $this->GiaTriHD;
    }

    public function set_VatLieu($VatLieu)
    {
        $this->VatLieu = $VatLieu;
    }

    public function get_VatLieu()
    {
        return $this->VatLieu;
    }

    public function set_NhanCong($NhanCong)
    {
        $this->NhanCong = $NhanCong;
    }

    public function get_NhanCong()
    {
        return $this->NhanCong;
    }

    public function set_May($May)
    {
        $this->May = $May;
    }

    public function get_May()
    {
        return $this->May;
    }

    public function set_DiaChi($DiaChi)
    {
        $this->DiaChi = $DiaChi;
    }

    public function get_DiaChi()
    {
        return $this->DiaChi;
    }

    public function set_ChuThich($ChuThich)
    {
        $this->ChuThich = $ChuThich;
    }

    public function get_ChuThich()
    {
        return $this->ChuThich;
    }

    public function checkCTTonTai()
    {
        $sql = "select * from chitiet_dinhmuc_sp where masp='" . $this->get_MaCT() . "' and mavt='" . $this->getMavt() . "'";
        $this->query($sql);
        if ($this->num_rows() >= 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function checkCTTonTai_HD()
    {
        $sql = "select * from chitiet_dinhmuc_hd where masp='" . $this->get_MaCT() . "' and mavt='" . $this->getMavt() . "'";
        $this->query($sql);
        if ($this->num_rows() >= 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function checkCTXeMayTonTai()
    {
        $sql = "select * from dinhmucxemay where mats='" . $this->get_MaCT() . "' and maloaiduong='" . $this->getMavt() . "'";
        $this->query($sql);
        if ($this->num_rows() >= 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function kiemTraGiaThanhTieuChua($thang)
    {
        $sql = "select * from banggiathanhtieuchuan";
        $this->query($sql);
        if ($this->num_rows() >= 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function checkCTTonTaiCT_HM()
    {
        $sql = "select * from chitiet_dinhmuc_ct_vl where masp='" . $this->get_MaCT() . "' and mavt='" . $this->getMavt() . "' and mahm='" . $this->getMaHangMuc() . "'";
        $this->query($sql);
        if ($this->num_rows() >= 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function checkKeyTrung()
    {
        $sql = "select * from masp where masp='" . $this->get_MaCT() . "' and sott!=" . $this->get_SoTT() . "";
        $this->query($sql);
        if ($this->num_rows() >= 1) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function checkSoHDTrung()
    {
        $sql = "select * from mact where so_hd='" . $this->get_SoHD() . "' and sott!=" . $this->get_SoTT() . "";
        $this->query($sql);
        if ($this->num_rows() >= 1) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function checkXoa()
    {
        $sql = "select * from masp  where maspcha='" . $this->get_MaCT() . "'";
        $this->query($sql);
        if ($this->num_rows() >= 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function checkKeyChaTrung()
    {
        $sql = "select * from masp where masp='" . $this->get_MaCT() . "'";
        $this->query($sql);
        if ($this->num_rows() >= 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function createSoTT()
    {
        $sql = "select max(stt) as sott from masp";
        $this->query($sql);
        if ($this->num_rows() == 1) {
            $data = $this->fetch();
            return $data['sott'] + 1;
        } else {
            return 1;
        }
    }

    public function createMaPSTS()
    {
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = " and " . $this->get_orderby();

        $sql = "select max(mapsdm) as mapsts from chitiet_dinhmuc_sp where 0=0 $sql_w ";
        $this->query($sql);
        $data = $this->fetch();
        if ($data['mapsts'] != "") {
            return $data['mapsts'] + 1;
        } else {
            return 1;
        }
    }

    function loadListMaSP_W()
    {
        $trees = array();
        $ListMaKH = $this->loadListMaKH_Co_Key_La_Ma();
        $ListDinhMucSP = $this->DemDinhMuc();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = " and " . $this->get_orderby();
        $sql = "SELECT * FROM masp  WHERE 0=0 $sql_w  order by masp";
        $this->query($sql);
        $i = 0;
        while ($data = $this->fetch()) {
            $i++;
            $data['STT'] = $i;
            $data['tenkh'] = $ListMaKH[$data[makh]][tenkh];
            $data['slnguyenlieu'] = $ListDinhMucSP[$data['masp']];
            $trees[] = $data;
        }
        return $trees;
    }
    function loadListMaSP_Frm()
    {
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = " and " . $this->get_orderby();
        $sql = "SELECT SQL_CACHE masp,tensp FROM masp  WHERE 0=0 $sql_w  order by masp";
        $this->query($sql);
        $i = 0;
        while ($data = $this->fetch()) {
            $i++;
            $data['STT'] = $i;
            $trees[] = $data;
        }
        return $trees;
    }

    function loadListMaSP_Co_Key_La_Ma()
    {
        $trees = array();
        $ListMaKH = $this->loadListMaKH_Co_Key_La_Ma();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = " and " . $this->get_orderby();
        $sql = "SELECT * FROM masp  WHERE 0=0 $sql_w  order by masp";
        $this->query($sql);
        $i = 0;
        while ($data = $this->fetch()) {
            $i++;
            $data['STT'] = $i;
            $data['tenkh'] = $ListMaKH[$data[makh]][tenkh];
            $trees[$data['masp']] = $data;
        }
        return $trees;
    }

    function loadListMaSP_TuBangGiaThanh_Co_Key_La_Ma($thang)
    {
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = " and " . $this->get_orderby();
        $sql = "SELECT b1.* FROM masp b1 INNER JOIN banggiathanhtieuchuan b2 on (b1.masp = b2.masp) WHERE 0=0 $sql_w  order by b1.masp";
        $this->query($sql);
        $i = 0;
        while ($data = $this->fetch()) {
            $i++;
            $data['STT'] = $i;
            $trees[$data['masp']] = $data;
        }
        return $trees;
    }

    function loadListNVL_NC_CPC($MaSP, $thang)
    {
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = " and " . $this->get_orderby();
        $sql = "SELECT b1.mavt,b2.tenvt,b2.dvt,dinhmuckecakhauhao as dinhmuc,(SELECT max(dongiabinhquan) from tkthang WHERE b1.mavt = tkthang.mavt and thang={$thang} group by tkthang.mavt) as dongia,ROUND(dinhmuckecakhauhao*(SELECT max(dongiabinhquan) from tkthang WHERE b1.mavt = tkthang.mavt and thang={$thang} group by tkthang.mavt)) as thanhtien,b2.loaivl FROM chitiet_dinhmuc_sp b1 inner JOIN mavt b2 on (b1.mavt = b2.mavt) WHERE b1.masp='" . $MaSP . "' and b2.loaivl=''
                union all
                SELECT b1.mavt,b2.tenvt,b2.dvt,dinhmuc,tylehaohoc as dongia,dinhmuckecakhauhao as thanhtien,b2.loaivl FROM chitiet_dinhmuc_sp b1 inner JOIN mavt b2 on (b1.mavt = b2.mavt) WHERE b1.masp='" . $MaSP . "' and b2.loaivl='NC'
                union all
                SELECT b1.mavt,b2.tenvt,b2.dvt,0,0 as dongia,dinhmuckecakhauhao as thanhtien,b2.loaivl FROM chitiet_dinhmuc_sp b1 inner JOIN mavt b2 on (b1.mavt = b2.mavt) WHERE b1.masp='" . $MaSP . "' and b2.loaivl='SXC'
                union all
                SELECT b1.mavt,b2.tenvt,b2.dvt,dinhmuc,tylehaohoc as dongia,dinhmuckecakhauhao as thanhtien,b2.loaivl FROM chitiet_dinhmuc_sp b1 inner JOIN mavt b2 on (b1.mavt = b2.mavt) WHERE b1.masp='" . $MaSP . "' and b2.loaivl='CM'

         ";
        $this->query($sql);
        $i = 0;
        while ($data = $this->fetch()) {
            $i++;
            $trees[$data['mavt']] = $data;
        }
        return $trees;
    }

    function loadList_TuBang_NVL_NC_CPC($MaSP, $thang)
    {
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = " and " . $this->get_orderby();
        $sql = "SELECT * FROM banggiathanhtieuchuan  WHERE masp='" . $MaSP . "' and loaivl=''
                union all
                SELECT * FROM banggiathanhtieuchuan  WHERE masp='" . $MaSP . "' and loaivl='NC'
                union all
                SELECT * FROM banggiathanhtieuchuan  WHERE masp='" . $MaSP . "' and loaivl='SXC'
                union all
                SELECT * FROM banggiathanhtieuchuan  WHERE masp='" . $MaSP . "' and loaivl='CM'
         ";
        $this->query($sql);
        $i = 0;
        while ($data = $this->fetch()) {
            $i++;
            $trees[$data['mavt']] = $data;
        }
        return $trees;
    }

    function loadListMaCT_BANGDIEUTRAXAYDUNG_W()
    {
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = " and " . $this->get_orderby();
        echo $sql = "SELECT * FROM  bangdieutraxaydung_congtrinh WHERE 0=0 $sql_w  order by mact";
        $this->query($sql);
        $i = 0;
        while ($data = $this->fetch()) {
            $i++;
            $data['STT'] = $i;
            $trees[] = $data;
        }
        return $trees;
    }

    function loadListMaCT_BANGDIEUTRAXAYDUNG($parentid = 0, $printto = 10)
    {
        //$cb_loaitk = $this->get_Cb_LoaiTK();
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = $this->get_orderby() . " and ";
        $sql = "SELECT * FROM bangdieutraxaydung_congtrinh WHERE $sql_w mactcha = '$parentid'  order by mact";
        $this->query($sql);
        $i = 0;
        while ($data = $this->fetch()) {
            $i++;
            $data['STT'] = $i;
            $data['CAP'] = 1;
            $data['tensp'] = $data['mact'];;
            $trees[] = $data;
            $sql1 = "SELECT * FROM bangdieutraxaydung_congtrinh WHERE $sql_w mactcha ='" . $data['mact'] . "' order by mact ";
            $query = $this->re_query($sql1);
            while ($data1 = $this->re_fetch($query)) {
                if ($printto == 1) {
                    break;
                }
                $i++;
                $data1['STT'] = $i;
                $data1['CAP'] = 2;
                $data1['tensp'] = "&nbsp;&nbsp;&nbsp;&nbsp;" . $data1['mact'];

                $trees[] = $data1;
                /*$sql2 = "SELECT * FROM bangdieutraxaydung_congtrinh WHERE $sql_w mactcha ='" . $data1['mact'] . "' order by mact";
                $query1 = $this->re_query($sql2);
                while ($data2 = $this->re_fetch($query1)) {
                    if ($printto == 2) {
                        break;
                    }
                    $i++;
                    $data2['STT'] = $i;
                    $data2['CAP'] = 3;
                    $data2['tensp'] = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" . $data2['mact'];

                    $trees[] = $data2;
                }*/
            }
        }
        return $trees;
    }


    function loadListMaCT_DOANHTHUTHUCTE_W()
    {
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = " and " . $this->get_orderby();
        $sql = "SELECT masp,tensp,tenkd,gtcongtrinh,tyle,doanhthuthucte,maspcha,mact FROM masp INNER JOIN bangdoanhthuthucte on (masp.masp = bangdoanhthuthucte.mact) WHERE 0=0 $sql_w  order by masp.masp";
        $this->query($sql);
        $i = 0;
        while ($data = $this->fetch()) {
            $i++;
            $data['STT'] = $i;
            $trees[] = $data;
        }
        return $trees;
    }

    function loadListMaCT_DOANHTHUTHUCTE_DK($parentid = 0, $printto = 10)
    {
        //$cb_loaitk = $this->get_Cb_LoaiTK();
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = $this->get_orderby() . " and ";
        $sql = "SELECT masp,tensp,tenkd,gtcongtrinh,tyle,doanhthuthucte,maspcha,mact FROM masp INNER JOIN bangdoanhthuthucte on (masp.masp = bangdoanhthuthucte.mact)  WHERE $sql_w maspcha = '$parentid'  order by masp";
        $this->query($sql);
        $i = 0;
        while ($data = $this->fetch()) {
            $i++;
            $data['STT'] = $i;
            $data['CAP'] = 1;
            $data['tensp'] = $data['tensp'];;
            $trees[] = $data;
            $sql1 = "SELECT masp,tensp,tenkd,gtcongtrinh,tyle,doanhthuthucte,maspcha,mact FROM masp INNER JOIN bangdoanhthuthucte on (masp.masp = bangdoanhthuthucte.mact) WHERE $sql_w maspcha ='" . $data['masp'] . "' order by masp ";
            $query = $this->re_query($sql1);
            while ($data1 = $this->re_fetch($query)) {
                if ($printto == 1) {
                    break;
                }
                $i++;
                $data1['STT'] = $i;
                $data1['CAP'] = 2;
                $data1['tensp'] = "&nbsp;&nbsp;&nbsp;&nbsp;" . $data1['tensp'];
                $trees[] = $data1;

                /*$sql2 = "SELECT masp,tensp,tenkd,gtcongtrinh,tyle,doanhthuthucte,maspcha,mact FROM masp INNER JOIN bangdoanhthuthucte on (masp.masp = bangdoanhthuthucte.mact) WHERE $sql_w maspcha ='" . $data1['masp'] . "' order by masp ";
                 $query1 = $this->re_query($sql2);
                 while ($data2 = $this->re_fetch($query1)) {
                     if ($printto == 2) {
                         break;
                     }
                     $i++;
                     $data2['STT'] = $i;
                     $data2['CAP'] = 3;
                     $data2['tensp'] = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" . $data2['tensp'];

                     $trees[] = $data2;
                 }*/

            }
        }
        return $trees;
    }

    function loadListMaSP_DOANHTHUTHUCTE_DK($parentid = 0, $printto = 10)
    {
        //$cb_loaitk = $this->get_Cb_LoaiTK();
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = $this->get_orderby() . " and ";
        $sql = "SELECT masp,tensp,tenkd,gtcongtrinh,tyle,doanhthuthucte,maspcha,mact FROM masp INNER JOIN bangdoanhthuthucte on (masp.masp = bangdoanhthuthucte.mact)  WHERE $sql_w maspcha = '$parentid'  order by masp";
        $this->query($sql);
        $i = 0;
        while ($data = $this->fetch()) {
            $i++;
            $data['STT'] = $i;
            $data['CAP'] = 1;
            $data['tensp'] = $data['tensp'];;
            $trees[] = $data;
            $sql1 = "SELECT masp,tensp,tenkd,gtcongtrinh,tyle,doanhthuthucte,maspcha,mact FROM masp INNER JOIN bangdoanhthuthucte on (masp.masp = bangdoanhthuthucte.mact) WHERE $sql_w maspcha ='" . $data['masp'] . "' order by masp ";
            $query = $this->re_query($sql1);
            while ($data1 = $this->re_fetch($query)) {
                if ($printto == 1) {
                    break;
                }
                $i++;
                $data1['STT'] = $i;
                $data1['CAP'] = 2;
                $data1['tensp'] = "&nbsp;&nbsp;&nbsp;&nbsp;" . $data1['tensp'];
                $trees[] = $data1;

                $sql2 = "SELECT masp,tensp,tenkd,gtcongtrinh,tyle,doanhthuthucte,maspcha,mact FROM masp INNER JOIN bangdoanhthuthucte on (masp.masp = bangdoanhthuthucte.mact) WHERE $sql_w maspcha ='" . $data1['masp'] . "' order by masp ";
                $query1 = $this->re_query($sql2);
                while ($data2 = $this->re_fetch($query1)) {
                    if ($printto == 2) {
                        break;
                    }
                    $i++;
                    $data2['STT'] = $i;
                    $data2['CAP'] = 3;
                    $data2['tensp'] = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" . $data2['tensp'];

                    $trees[] = $data2;
                }

            }
        }
        return $trees;
    }


    function loadListMaCT_DK_W()
    {
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = " and " . $this->get_orderby();
        $sql = "SELECT masp,tensp,tenkd,soduno,soduco,maspcha,cpdodangdk.mact FROM masp INNER JOIN cpdodangdk on (masp.masp = cpdodangdk.mact) WHERE 0=0 $sql_w  order by masp.masp";
        $this->query($sql);
        $i = 0;
        while ($data = $this->fetch()) {
            $i++;
            $data['STT'] = $i;
            $trees[] = $data;
        }
        return $trees;
    }

    function loadListMaCT_DK($parentid = 0, $printto = 10)
    {
        //$cb_loaitk = $this->get_Cb_LoaiTK();
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = $this->get_orderby() . " and ";
        $sql = "SELECT masp,tensp,tenkd,soduno,soduco,maspcha,mact FROM masp INNER JOIN cpdodangdk on (masp.masp = cpdodangdk.mact)  WHERE $sql_w maspcha = '$parentid'  order by masp";
        $this->query($sql);
        $i = 0;
        while ($data = $this->fetch()) {
            $i++;
            $data['STT'] = $i;
            $data['CAP'] = 1;
            $data['tensp'] = $data['tensp'];;
            $trees[] = $data;
            $sql1 = "SELECT masp,tensp,tenkd,soduno,soduco,maspcha,mact FROM masp INNER JOIN cpdodangdk on (masp.masp = cpdodangdk.mact) WHERE $sql_w maspcha ='" . $data['masp'] . "' order by masp ";
            $query = $this->re_query($sql1);
            while ($data1 = $this->re_fetch($query)) {
                if ($printto == 1) {
                    break;
                }
                $i++;
                $data1['STT'] = $i;
                $data1['CAP'] = 2;
                $data1['tensp'] = "&nbsp;&nbsp;&nbsp;&nbsp;" . $data1['tensp'];

                $trees[] = $data1;
                $sql2 = "SELECT masp,tensp,tenkd,soduno,soduco,maspcha,mact FROM masp INNER JOIN cpdodangdk on (masp.masp = cpdodangdk.mact) WHERE $sql_w maspcha ='" . $data1['masp'] . "' order by masp ";
                $query1 = $this->re_query($sql2);
                while ($data2 = $this->re_fetch($query1)) {
                    if ($printto == 2) {
                        break;
                    }
                    $i++;
                    $data2['STT'] = $i;
                    $data2['CAP'] = 3;
                    $data2['tensp'] = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" . $data2['tensp'];

                    $trees[] = $data2;
                }
            }
        }
        return $trees;
    }

    function loadThemBangTongHop_DoanhThu_ChiPhi_GiaThanhCongTrinh($parentid = 0, $dataVao,$theocongdoan="",$LoaiPB="")
    {
        if($LoaiPB==""){
            $LoaiPB = "SP','CT','HD";
        }
        $STTABC = array(1 => "A", 2 => "B", 3 => "C", 4 => "D", 5 => "E", 6 => "F", 7 => "G", 8 => "H", 9 => "I", 10 => "J", 11 => "K", 12 => "L", 13 => "M", 14 => "N", 15 => "O", 16 => "P", 17 => "Q", 18 => "R", 19 => "A", 20 => "S");
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = $this->get_orderby() . " and ";
        $sql = "SELECT * FROM masp  WHERE $sql_w maspcha = '$parentid' AND loaisp in('".$LoaiPB."') order by masp";
        $this->query($sql);
        $i = 0;
        $k = 0;
        $TongTienDK = 0;
        $TongTienNguyenLieu = 0;
        $TongTienNhanCong = 0;
        $TongTienNhanCong622PB = 0;
        $TongTienMay = 0;
        $TongTienNhanCongPB = 0;
        $TongTienCPSXC = 0;
        $TongTienCPSXCPB = 0;
        $TongTienCTKHOAN = 0;
        $TongTienDoanhThuThuan = 0;
        $TongTienTongCong = 0;
        $TongGiaThanh = 0;
        $TongGiaThanhToanBo = 0;
        $TongGiaThanhDonVi = 0;

        $TongLaiLo = 0;
        $TongTienCK = 0;
        $TongDoanhThuHopDong = 0;

        while ($data = $this->fetch()) {// Cấp thứ 1 của Thành Phẩm
            $data['LapCapThapNhat'] = 1;
            $i++;
            $TongTienDK1 = 0;
            $TongTienNguyenLieu1 = 0;
            $TongTienNhanCong1 = 0;
            $TongTienNhanCong622PB1 = 0;
            $TongTienNhanCongPB1 = 0;
            $TongTienMay1 = 0;
            $TongTienCPSXC1 = 0;
            $TongTienCPSXCPB1 = 0;
            $TongTienCTKHOAN1 = 0;
            $TongTienDoanhThuThuan1 = 0;
            $TongTienTongCong1 = 0;
            $TongGiaThanh1 = 0;

            $TongGiaThanhToanBo1 = 0;
            $TongGiaThanhDonVi1 = 0;

            $TongLaiLo1 = 0;
            $TongTienCK1 = 0;

            $TongDoanhThuHopDong1 = 0;

            $data['STT'] = $i;
            if ($data['loaisp'] == "SP") {
                $data['sottxuat'] = $STTABC[$i];
            }else{
                $data['sottxuat'] = $this->number2roman($i, true);
            }
            $data['CAP'] = 1;
            $data['tensp'] = $data['tensp'];
            $trees[$data['masp']] = $data;
            $sql1 = "SELECT * FROM masp WHERE $sql_w maspcha ='" . $data['masp'] . "' order by masp ";
            $query = $this->re_query($sql1);
            $j = 0;
            while ($data1 = $this->re_fetch($query)) {// Cấp 2 của Thành Phẩm
                $trees[$data['masp']]['LapCapThapNhat'] = 0;
                $data1['LapCapThapNhat'] = 1;
                $j++;
                $TongTienDK2 = 0;
                $TongTienNguyenLieu2 = 0;
                $TongTienNhanCong2 = 0;
                $TongTienNhanCong622PB2 = 0;
                $TongTienNhanCongPB2 = 0;
                $TongTienMay2 = 0;
                $TongTienCPSXC2 = 0;
                $TongTienCPSXCPB2 = 0;
                $TongTienCTKHOAN2 = 0;
                $TongTienDoanhThuThuan2 = 0;
                $TongTienTongCong2 = 0;
                $TongGiaThanh2 = 0;

                $TongGiaThanhToanBo2 = 0;
                $TongGiaThanhDonVi2 = 0;

                $TongLaiLo2 = 0;
                $TongTienCK2 = 0;
                $TongDoanhThuHopDong2 = 0;
                $HienThi = 0;

                $data1['STT'] = $i;
                if ($data1['loaisp'] == "SP") {
                    $data1['sottxuat'] = $this->number2roman($j, true);
                }else{
                    $data1['sottxuat'] = $j;
                }
                $data1['tensp'] = "&nbsp;&nbsp;".$data1['tensp'];
                $data1['CAP'] = 2;
                $trees[$data1['masp']] = $data1;
                if($data1['masp']==$theocongdoan){
                    $HienThi=1;
                }
                if ($data1['loaisp'] == "SP") {
                    $sql2 = "SELECT * FROM masp WHERE $sql_w maspcha ='" . $data1['masp'] . "' order by masp ";
                    $query1 = $this->re_query($sql2);
                    $k = 0;
                    while ($data2 = $this->re_fetch($query1)) {// Cấp 3 của Thành Phẩm
                        $trees[$data1['masp']]['LapCapThapNhat'] = 0;
                        $data2['LapCapThapNhat'] = 1;
                        $k++;
                        $data2['STT'] = $i;
                        $data2['sottxuat'] = $k;
                        $data2['CAP'] = 3;

                        $data2['tensp'] = "&nbsp;&nbsp;&nbsp;&nbsp;".$data2['tensp'];

                        $TongTienDK2 += $dataVao[$data2['masp']]['sotiendk'];
                        $TongTienNguyenLieu2 += $dataVao[$data2['masp']]['sotiennl'];
                        $TongTienNhanCong2 += $dataVao[$data2['masp']]['sotiennc'];
                        $TongTienNhanCong622PB2 += $dataVao[$data2['masp']]['sotiennc622pb'];
                        $TongTienNhanCongPB2 += $dataVao[$data2['masp']]['sotienncpb'];
                        $TongTienMay2 += $dataVao[$data2['masp']]['sotienmay'];
                        $TongTienCPSXC2 += $dataVao[$data2['masp']]['sotiencpsxc'];
                        $TongTienCPSXCPB2 += $dataVao[$data2['masp']]['sotiencpsxcpb']+$dataVao[$data2['masp']]['sotienpbcpsxccap1']+$dataVao[$data2['masp']]['sotienpbcpsxccap2'];
                        $TongTienCTKHOAN2 += $dataVao[$data2['masp']]['ctkhoan'];
                        $TongTienDoanhThuThuan2 += $dataVao[$data2['masp']]['doanhthuthuan'];
                        $TongTienTongCong2 += $dataVao[$data2['masp']]['tongcong'];
                        $TongGiaThanh2 += $dataVao[$data2['masp']]['giathanh'];

                        $TongGiaThanhToanBo2 += $dataVao[$data2['masp']]['giathanhtoanbo'];
                        $TongGiaThanhDonVi2 += $dataVao[$data2['masp']]['giathanhdonvi'];

                        $TongLaiLo2 += $dataVao[$data2['masp']]['lailo'];
                        $TongTienCK2 += $dataVao[$data2['masp']]['dodangck'];
                        $TongDoanhThuHopDong2 += $dataVao[$data2['masp']]['doanhthuhopdong'];

                        $trees[$data2['masp']] = $data2;

                        $trees[$data2['masp']]['sotiendk'] = $dataVao[$data2['masp']]['sotiendk'];
                        $trees[$data2['masp']]['sotiennl'] = $dataVao[$data2['masp']]['sotiennl'];
                        $trees[$data2['masp']]['sotiennc'] = $dataVao[$data2['masp']]['sotiennc'];
                        $trees[$data2['masp']]['sotiennc622pb'] = $dataVao[$data2['masp']]['sotiennc622pb'];
                        $trees[$data2['masp']]['sotienncpb'] = $dataVao[$data2['masp']]['sotienncpb'];
                        $trees[$data2['masp']]['sotienmay'] = $dataVao[$data2['masp']]['sotienmay'];
                        $trees[$data2['masp']]['sotiencpsxc'] = $dataVao[$data2['masp']]['sotiencpsxc'];
                        $trees[$data2['masp']]['sotiencpsxcpb'] = $dataVao[$data2['masp']]['sotiencpsxcpb']+$dataVao[$data2['masp']]['sotienpbcpsxccap1']+$dataVao[$data2['masp']]['sotienpbcpsxccap2'];;
                        $trees[$data2['masp']]['ctkhoan'] = $dataVao[$data2['masp']]['ctkhoan'];
                        $trees[$data2['masp']]['doanhthuthuan'] = $dataVao[$data2['masp']]['doanhthuthuan'];
                        $trees[$data2['masp']]['tongcong'] = $dataVao[$data2['masp']]['tongcong'];

                        $trees[$data2['masp']]['giathanh'] = $dataVao[$data2['masp']]['giathanh'];

                        $trees[$data2['masp']]['giathanhtoanbo'] = $dataVao[$data2['masp']]['giathanhtoanbo'];
                        $trees[$data2['masp']]['giathanhdonvi'] = $dataVao[$data2['masp']]['giathanhdonvi'];

                        $trees[$data2['masp']]['lailo'] = $dataVao[$data2['masp']]['lailo'];
                        $trees[$data2['masp']]['dodangck'] = $dataVao[$data2['masp']]['dodangck'];

                        $trees[$data2['masp']]['doanhthuhopdong'] = $dataVao[$data2['masp']]['doanhthuhopdong'];

                        $trees[$data2['masp']]['dodangck_'] = $dataVao[$data2['masp']]['dodangck'];

                        $trees[$data2['masp']]['tylenl'] = $dataVao[$data2['masp']]['tylenl'];
                        $trees[$data2['masp']]['tylenc'] = $dataVao[$data2['masp']]['tylenc'];
                        $trees[$data2['masp']]['tylemay'] = $dataVao[$data2['masp']]['tylemay'];
                        $trees[$data2['masp']]['tylecpsxc'] = $dataVao[$data2['masp']]['tylecpsxc'];
                        $trees[$data2['masp']]['tylecpsxcpb'] = $dataVao[$data2['masp']]['tylecpsxcpb'];

                        $trees[$data2['masp']]['tylethucte'] = $dataVao[$data2['masp']]['tylethucte'];

                        $trees[$data2['masp']]['sotiennltieuchuan'] = $dataVao[$data2['masp']]['sotiennltieuchuan'];
                        $trees[$data2['masp']]['sotiennctieuchuan'] = $dataVao[$data2['masp']]['sotiennctieuchuan'];
                        $trees[$data2['masp']]['sotienmaytieuchuan'] = $dataVao[$data2['masp']]['sotienmaytieuchuan'];
                        $trees[$data2['masp']]['sotiencpsxctieuchuan'] = $dataVao[$data2['masp']]['sotiencpsxctieuchuan'];

                        $trees[$data2['masp']]['sotienpbcpsxccap1'] = $dataVao[$data2['masp']]['sotienpbcpsxccap1'];
                        $trees[$data2['masp']]['sotienpbcpsxccap2'] = $dataVao[$data2['masp']]['sotienpbcpsxccap2'];

                        $trees[$data2['masp']]['hienthi'] = $HienThi;

                    }// End cấp 3 của Thành Phẩm
                }

                $TongTienDK1 += $dataVao[$data1['masp']]['sotiendk'] + $TongTienDK2;
                $TongTienNguyenLieu1 += $dataVao[$data1['masp']]['sotiennl'] + $TongTienNguyenLieu2;
                $TongTienNhanCong1 += $dataVao[$data1['masp']]['sotiennc'] + $TongTienNhanCong2;
                $TongTienNhanCong622PB1 += $dataVao[$data1['masp']]['sotiennc622pb'] + $TongTienNhanCong622PB2;
                $TongTienNhanCongPB1 += $dataVao[$data1['masp']]['sotienncpb'] + $TongTienNhanCongPB2;
                $TongTienMay1 += $dataVao[$data1['masp']]['sotienmay'] + $TongTienMay2;
                $TongTienCPSXC1 += $dataVao[$data1['masp']]['sotiencpsxc'] + $TongTienCPSXC2;
                $TongTienCPSXCPB1 += $dataVao[$data1['masp']]['sotiencpsxcpb']+$dataVao[$data1['masp']]['sotienpbcpsxccap1']+$dataVao[$data1['masp']]['sotienpbcpsxccap2'] + $TongTienCPSXCPB2;
                $TongTienCTKHOAN1+= $dataVao[$data1['masp']]['ctkhoan'] + $TongTienCTKHOAN2;
                $TongTienDoanhThuThuan1 += $dataVao[$data1['masp']]['doanhthuthuan'] + $TongTienDoanhThuThuan2;
                $TongTienTongCong1 += $dataVao[$data1['masp']]['tongcong'] + $TongTienTongCong2;
                $TongGiaThanh1 += $dataVao[$data1['masp']]['giathanh'] + $TongGiaThanh2;

                $TongGiaThanhToanBo1 += $dataVao[$data1['masp']]['giathanhtoanbo'] + $TongGiaThanhToanBo2;
                $TongGiaThanhDonVi1 += $dataVao[$data1['masp']]['giathanhdonvi'] + $TongGiaThanhDonVi2;

                $TongLaiLo1 += $dataVao[$data1['masp']]['lailo'] + $TongLaiLo2;
                $TongTienCK1 += $dataVao[$data1['masp']]['dodangck'] + $TongTienCK2;

                $TongDoanhThuHopDong1 += $dataVao[$data1['masp']]['doanhthuhopdong'] + $TongDoanhThuHopDong2;

                $trees[$data1['masp']]['sotiendk'] = $dataVao[$data1['masp']]['sotiendk'] + $TongTienDK2;
                $trees[$data1['masp']]['sotiennl'] = $dataVao[$data1['masp']]['sotiennl'] + $TongTienNguyenLieu2;
                $trees[$data1['masp']]['sotiennc'] = $dataVao[$data1['masp']]['sotiennc'] + $TongTienNhanCong2;
                $trees[$data1['masp']]['sotiennc622pb'] = $dataVao[$data1['masp']]['sotiennc622pb'] + $TongTienNhanCong622PB2;
                $trees[$data1['masp']]['sotienncpb'] = $dataVao[$data1['masp']]['sotienncpb'] + $TongTienNhanCongPB2;
                $trees[$data1['masp']]['sotienmay'] = $dataVao[$data1['masp']]['sotienmay'] + $TongTienMay2;
                $trees[$data1['masp']]['sotiencpsxc'] = $dataVao[$data1['masp']]['sotiencpsxc'] + $TongTienCPSXC2;
                $trees[$data1['masp']]['sotiencpsxcpb'] = $dataVao[$data1['masp']]['sotiencpsxcpb']+$dataVao[$data1['masp']]['sotienpbcpsxccap1']+$dataVao[$data1['masp']]['sotienpbcpsxccap2']+ $TongTienCPSXCPB2;
                $trees[$data1['masp']]['ctkhoan'] = $dataVao[$data1['masp']]['ctkhoan']+ $TongTienCTKHOAN2;
                $trees[$data1['masp']]['doanhthuthuan'] = $dataVao[$data1['masp']]['doanhthuthuan'] + $TongTienDoanhThuThuan2;
                $trees[$data1['masp']]['tongcong'] = $dataVao[$data1['masp']]['tongcong'] + $TongTienTongCong2;
                $trees[$data1['masp']]['giathanh'] = $dataVao[$data1['masp']]['giathanh'] + $TongGiaThanh2;

                $trees[$data1['masp']]['giathanhtoanbo'] = $dataVao[$data1['masp']]['giathanhtoanbo'] + $TongGiaThanhToanBo2;
                $trees[$data1['masp']]['giathanhdonvi'] = $dataVao[$data1['masp']]['giathanhdonvi'] + $TongGiaThanhDonVi2;

                $trees[$data1['masp']]['lailo'] = $dataVao[$data1['masp']]['lailo'] + $TongLaiLo2;
                $trees[$data1['masp']]['dodangck'] = $dataVao[$data1['masp']]['dodangck'] + $TongTienCK2;

                $trees[$data1['masp']]['doanhthuhopdong'] = $dataVao[$data1['masp']]['doanhthuhopdong'] + $TongDoanhThuHopDong2;

                $trees[$data1['masp']]['dodangck_'] = $dataVao[$data1['masp']]['dodangck'];

                $trees[$data1['masp']]['tylenl'] = $dataVao[$data1['masp']]['tylenl'];
                $trees[$data1['masp']]['tylenc'] = $dataVao[$data1['masp']]['tylenc'];
                $trees[$data1['masp']]['tylemay'] = $dataVao[$data1['masp']]['tylemay'];
                $trees[$data1['masp']]['tylecpsxc'] = $dataVao[$data1['masp']]['tylecpsxc'];
                $trees[$data1['masp']]['tylecpsxcpb'] = $dataVao[$data1['masp']]['tylecpsxcpb'];

                $trees[$data1['masp']]['tylethucte'] = $dataVao[$data1['masp']]['tylethucte'];

                $trees[$data1['masp']]['sotiennltieuchuan'] = $dataVao[$data1['masp']]['sotiennltieuchuan'];
                $trees[$data1['masp']]['sotiennctieuchuan'] = $dataVao[$data1['masp']]['sotiennctieuchuan'];
                $trees[$data1['masp']]['sotienmaytieuchuan'] = $dataVao[$data1['masp']]['sotienmaytieuchuan'];
                $trees[$data1['masp']]['sotiencpsxctieuchuan'] = $dataVao[$data1['masp']]['sotiencpsxctieuchuan'];

                $trees[$data1['masp']]['sotienpbcpsxccap1'] = $dataVao[$data1['masp']]['sotienpbcpsxccap1'];
                $trees[$data1['masp']]['sotienpbcpsxccap2'] = $dataVao[$data1['masp']]['sotienpbcpsxccap2'];
                $trees[$data1['masp']]['hienthi'] = $HienThi;


            }// End cấp 2 thành phẩm

            $TongTienDK += $dataVao[$data['masp']]['sotiendk'] + $TongTienDK1;
            $TongTienNguyenLieu += $dataVao[$data['masp']]['sotiennl'] + $TongTienNguyenLieu1;
            $TongTienNhanCong += $dataVao[$data['masp']]['sotiennc'] + $TongTienNhanCong1;
            $TongTienNhanCong622PB += $dataVao[$data['masp']]['sotienncpb'] + $TongTienNhanCong622PB1;
            $TongTienNhanCongPB += $dataVao[$data['masp']]['sotienncpb'] + $TongTienNhanCongPB1;
            $TongTienMay += $dataVao[$data['masp']]['sotienmay'] + $TongTienMay1;
            $TongTienCPSXC += $dataVao[$data['masp']]['sotiencpsxc'] + $TongTienCPSXC1;
            $TongTienCPSXCPB += $dataVao[$data['masp']]['sotiencpsxcpb'] +$dataVao[$data['masp']]['sotienpbcpsxccap1']+$dataVao[$data['masp']]['sotienpbcpsxccap2']+ $TongTienCPSXCPB1;
            $TongTienCTKHOAN += $dataVao[$data['masp']]['ctkhoan'] + $TongTienCTKHOAN1;
            $TongTienDoanhThuThuan += $dataVao[$data['masp']]['doanhthuthuan'] + $TongTienDoanhThuThuan1;
            $TongTienTongCong += $dataVao[$data['masp']]['tongcong'] + $TongTienTongCong1;
            $TongGiaThanh += $dataVao[$data['masp']]['giathanh'] + $TongGiaThanh1;

            $TongGiaThanhToanBo += $dataVao[$data['masp']]['giathanhtoanbo'] + $TongGiaThanhToanBo1;
            $TongGiaThanhDonVi += $dataVao[$data['masp']]['giathanhdonvi'] + $TongGiaThanhDonVi1;

            $TongLaiLo += $dataVao[$data['masp']]['lailo'] + $TongLaiLo1;
            $TongTienCK += $dataVao[$data['masp']]['dodangck'] + $TongTienCK1;

            $TongDoanhThuHopDong += $dataVao[$data['masp']]['doanhthuhopdong'] + $TongDoanhThuHopDong1;

            $trees[$data['masp']]['sotiendk'] = $dataVao[$data['masp']]['sotiendk'] + $TongTienDK1;
            $trees[$data['masp']]['sotiennl'] = $dataVao[$data['masp']]['sotiennl'] + $TongTienNguyenLieu1;
            $trees[$data['masp']]['sotiennc'] = $dataVao[$data['masp']]['sotiennc'] + $TongTienNhanCong1;
            $trees[$data['masp']]['sotiennc622pb'] = $dataVao[$data['masp']]['sotiennc622pb'] + $TongTienNhanCong622PB1;
            $trees[$data['masp']]['sotienncpb'] = $dataVao[$data['masp']]['sotienncpb'] + $TongTienNhanCongPB1;
            $trees[$data['masp']]['sotienmay'] = $dataVao[$data['masp']]['sotienmay'] + $TongTienMay1;
            $trees[$data['masp']]['sotiencpsxc'] = $dataVao[$data['masp']]['sotiencpsxc'] + $TongTienCPSXC1;
            $trees[$data['masp']]['sotiencpsxcpb'] = $dataVao[$data['masp']]['sotiencpsxcpb']+$dataVao[$data['masp']]['sotienpbcpsxccap1']+$dataVao[$data['masp']]['sotienpbcpsxccap2']+ $TongTienCPSXCPB1;
            $trees[$data['masp']]['ctkhoan'] = $dataVao[$data['masp']]['ctkhoan']+ $TongTienCTKHOAN1;
            $trees[$data['masp']]['doanhthuthuan'] = $dataVao[$data['masp']]['doanhthuthuan'] + $TongTienDoanhThuThuan1;
            $trees[$data['masp']]['tongcong'] = $dataVao[$data['masp']]['tongcong'] + $TongTienTongCong1;
            $trees[$data['masp']]['giathanh'] = $dataVao[$data['masp']]['giathanh'] + $TongGiaThanh1;

            $trees[$data['masp']]['giathanhtoanbo'] = $dataVao[$data['masp']]['giathanhtoanbo'] + $TongGiaThanhToanBo1;
            $trees[$data['masp']]['giathanhdonvi'] = $dataVao[$data['masp']]['giathanhdonvi'] + $TongGiaThanhDonVi1;

            $trees[$data['masp']]['lailo'] = $dataVao[$data['masp']]['lailo'] + $TongLaiLo1;
            $trees[$data['masp']]['dodangck'] = $dataVao[$data['masp']]['dodangck'] + $TongTienCK1;

            $trees[$data['masp']]['doanhthuhopdong'] = $dataVao[$data['masp']]['doanhthuhopdong'] + $TongDoanhThuHopDong1;

            $trees[$data['masp']]['dodangck_'] = $dataVao[$data['masp']]['dodangck_'];

            $trees[$data['masp']]['tylenl'] = $dataVao[$data['masp']]['tylenl'];
            $trees[$data['masp']]['tylenc'] = $dataVao[$data['masp']]['tylenc'];
            $trees[$data['masp']]['tylemay'] = $dataVao[$data['masp']]['tylemay'];
            $trees[$data['masp']]['tylecpsxc'] = $dataVao[$data['masp']]['tylecpsxc'];
            $trees[$data['masp']]['tylecpsxcpb'] = $dataVao[$data['masp']]['tylecpsxcpb'];
            $trees[$data['masp']]['tylethucte'] = $dataVao[$data['masp']]['tylethucte'];

            $trees[$data['masp']]['sotiennltieuchuan'] = $dataVao[$data['masp']]['sotiennltieuchuan'];
            $trees[$data['masp']]['sotiennctieuchuan'] = $dataVao[$data['masp']]['sotiennctieuchuan'];
            $trees[$data['masp']]['sotienmaytieuchuan'] = $dataVao[$data['masp']]['sotienmaytieuchuan'];
            $trees[$data['masp']]['sotiencpsxctieuchuan'] = $dataVao[$data['masp']]['sotiencpsxctieuchuan'];

            $trees[$data['masp']]['sotienpbcpsxccap1'] = $dataVao[$data['masp']]['sotienpbcpsxccap1'];
            $trees[$data['masp']]['sotienpbcpsxccap2'] = $dataVao[$data['masp']]['sotienpbcpsxccap2'];
            $trees[$data['masp']]['hienthi'] = 1;

        }
        return $trees;
    }


    function loadListMaSP($parentid = 0, $printto = 10)
    {
        //$cb_loaitk = $this->get_Cb_LoaiTK();
        $trees = array();
        $ListMaKH = $this->loadListMaKH_Co_Key_La_Ma();
        $ListDinhMucSP = $this->DemDinhMuc();

        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = $this->get_orderby() . " and ";
        $sql = "SELECT * FROM masp  WHERE $sql_w maspcha = '$parentid'  order by masp";
        $this->query($sql);
        $i = 0;
        while ($data = $this->fetch()) {
            $i++;
            $data['STT'] = $i;
            $data['CAP'] = 1;
            $data['chon'] = "";
            $data['tenct'] = "";
            $data['tenkh'] = $ListMaKH[$data['makh']]['tenkh'];
            $data['slnguyenlieu'] = $ListDinhMucSP[$data['masp']];
            $trees[] = $data;
            $sql1 = "SELECT * FROM masp WHERE $sql_w maspcha ='" . $data['masp'] . "' order by masp ";
            $query = $this->re_query($sql1);
            while ($data1 = $this->re_fetch($query)) {
                if ($printto == 1) {
                    break;
                }
                $i++;
                $data1['STT'] = $i;
                $data1['CAP'] = 2;
                $data1['chon'] = "chon";
                $data1['tenct'] = $data['tensp'];
                $data1['tenkh'] = $ListMaKH[$data1[makh]][tenkh];
                $data1['slnguyenlieu'] = $ListDinhMucSP[$data1['masp']];
                //$MaLoaiTK = $data1['loaitk'];
                //	$data1['tenloaitk']=$cb_loaitk[$MaLoaiTK];
                $trees[] = $data1;
                $sql2 = "SELECT * FROM masp WHERE $sql_w maspcha ='" . $data1['masp'] . "' order by masp ";
                $query1 = $this->re_query($sql2);
                while ($data2 = $this->re_fetch($query1)) {
                    if ($printto == 2) {
                        break;
                    }
                    $i++;
                    $data2['STT'] = $i;
                    $data2['CAP'] = 3;
                    $data2['chon'] = "";
                    $data2['tenct'] = $data1['tensp'];
                    $data2['tenkh'] = $ListMaKH[$data2[makh]][tenkh];
                    $data2['slnguyenlieu'] = $ListDinhMucSP[$data2['masp']];
                    //$MaLoaiTK = $data2['loaitk'];
                    //$data2['tenloaitk']=$cb_loaitk[$MaLoaiTK];
                    $trees[] = $data2;
                    $sql3 = "SELECT * FROM masp WHERE $sql_w maspcha ='" . $data2['masp'] . "' order by masp ";
                    $query3 = $this->re_query($sql3);
                    while ($data3 = $this->re_fetch($query3)) {
                        if ($printto == 3) {
                            break;
                        }
                        $i++;
                        $data3['STT'] = $i;
                        $data3['CAP'] = 4;
                        $data3['chon'] = "";
                        $data3['tenct'] = $data2['tensp'];
                        $data3['tenkh'] = $ListMaKH[$data3['makh']]['tenkh'];
                        $data3['slnguyenlieu'] = $ListDinhMucSP[$data3['masp']];
                        //$MaLoaiTK = $data2['loaitk'];
                        //$data2['tenloaitk']=$cb_loaitk[$MaLoaiTK];
                        $trees[] = $data3;
                    }
                }
            }
        }
        return $trees;
    }

    function loadListMaSP_CB($parentid = 0, $printto = 10)
    {
        //$cb_loaitk = $this->get_Cb_LoaiTK();
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = $this->get_orderby() . " and ";
        $sql = "SELECT * FROM masp  WHERE $sql_w maspcha = '$parentid'  order by masp";
        $this->query($sql);
        $i = 0;
        while ($data = $this->fetch()) {
            $i++;
            $data['STT'] = $i;
            $data['CAP'] = 1;
            $data['tenct'] = $data['masp'] . " - " . $data['tensp'];
            $trees[] = $data;
            $sql1 = "SELECT * FROM masp WHERE $sql_w maspcha ='" . $data['masp'] . "' order by masp ";
            $query = $this->re_query($sql1);
            while ($data1 = $this->re_fetch($query)) {
                if ($printto == 1) {
                    break;
                }
                $i++;
                $data1['STT'] = $i;
                $data1['CAP'] = 2;
                $data1['tenct'] = "---" . $data1['masp'] . " - " . $data1['tensp'];
                $trees[] = $data1;
                $sql2 = "SELECT * FROM masp WHERE $sql_w maspcha ='" . $data1['masp'] . "' order by masp ";
                $query1 = $this->re_query($sql2);
                while ($data2 = $this->re_fetch($query1)) {
                    if ($printto == 2) {
                        break;
                    }
                    $i++;
                    $data2['STT'] = $i;
                    $data2['CAP'] = 3;
                    $data2['tenct'] = "------" . $data2['masp'] . " - " . $data2['tensp'];
                    $trees[] = $data2;
                    $sql3 = "SELECT * FROM masp WHERE $sql_w maspcha ='" . $data2['masp'] . "' order by masp ";
                    $query3 = $this->re_query($sql3);
                    while ($data3 = $this->re_fetch($query3)) {
                        if ($printto == 3) {
                            break;
                        }
                        $i++;
                        $data3['STT'] = $i;
                        $data3['CAP'] = 4;
                        $data3['tenct'] = $data3['tensp'];
                        $trees[] = $data3;
                    }
                }
            }
        }
        return $trees;
    }

    function loadListMaSP_CB_ChiCT($parentid = 0, $printto = 10)
    {
        //$cb_loaitk = $this->get_Cb_LoaiTK();
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = $this->get_orderby() . " and ";
        $sql = "SELECT * FROM masp  WHERE $sql_w maspcha = '$parentid' and loaisp='CT'  order by masp";
        $this->query($sql);
        $i = 0;
        while ($data = $this->fetch()) {
            $i++;
            $data['STT'] = $i;
            $data['CAP'] = 1;
            $data['tenct'] = $data['tensp'] . " - " . $data['tensp'];
            $trees[] = $data;
            $sql1 = "SELECT * FROM masp WHERE $sql_w maspcha ='" . $data['masp'] . "' order by masp ";
            $query = $this->re_query($sql1);
            while ($data1 = $this->re_fetch($query)) {
                if ($printto == 1) {
                    break;
                }
                $i++;
                $data1['STT'] = $i;
                $data1['CAP'] = 2;
                $data1['tenct'] = "---" . $data['tensp'] . " - " . $data1['tensp'];
                $trees[] = $data1;
                $sql2 = "SELECT * FROM masp WHERE $sql_w maspcha ='" . $data1['masp'] . "' order by masp ";
                $query1 = $this->re_query($sql2);
                while ($data2 = $this->re_fetch($query1)) {
                    if ($printto == 2) {
                        break;
                    }
                    $i++;
                    $data2['STT'] = $i;
                    $data2['CAP'] = 3;
                    $data2['tenct'] = "------" . $data['tensp'] . " - " . $data2['tensp'];
                    $trees[] = $data2;
                    $sql3 = "SELECT * FROM masp WHERE $sql_w maspcha ='" . $data2['masp'] . "' order by masp ";
                    $query3 = $this->re_query($sql3);
                    while ($data3 = $this->re_fetch($query3)) {
                        if ($printto == 3) {
                            break;
                        }
                        $i++;
                        $data3['STT'] = $i;
                        $data3['CAP'] = 4;
                        $data3['tenct'] = $data3['tensp'];
                        $trees[] = $data3;
                    }
                }
            }
        }
        return $trees;
    }

    function loadListThongTinBangTopHopDanhThuChiPhiGiaThanhCT()
    {
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = " and " . $this->get_orderby();
        $sql = "SELECT * FROM bangtonghop_danhthu_chiphi_giathanhct WHERE 0=0 $sql_w  order by sott";
        $this->query($sql);
        $i = 0;
        while ($data = $this->fetch()) {
            $i++;
            $data['STT'] = $i;
            $trees[] = $data;
        }
        return $trees;
    }

    function loadListThongTinBangTopHopDanhThuChiPhiGiaThanhCT_TheoDiaBan()
    {
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = " and " . $this->get_orderby();
        $sql = "SELECT bangtonghop_danhthu_chiphi_giathanhct.*,diabanuudai FROM bangtonghop_danhthu_chiphi_giathanhct inner join masp on(masp.masp = bangtonghop_danhthu_chiphi_giathanhct.mact ) WHERE 0=0 $sql_w  order by mact";
        $this->query($sql);
        $i = 0;
        while ($data = $this->fetch()) {
            $i++;
            $data['STT'] = $i;
            $trees[$data['diabanuudai']][] = $data;
        }
        return $trees;
    }

    function loadListThongTinBangCPSXChungCongTrinh()
    {
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = " and " . $this->get_orderby();
        $sql = "SELECT bangphanbo_chiphi_sxchung.* FROM bangphanbo_chiphi_sxchung inner JOIN masp on (bangphanbo_chiphi_sxchung.mact = masp.masp )WHERE 0=0 $sql_w ";
        $this->query($sql);
        $i = 0;
        while ($data = $this->fetch()) {
            $i++;
            $data['STT'] = $i;
            $trees[] = $data;
        }
        return $trees;
    }

    function loadListThongTinBangCPSXChungCongTrinh_CoKey($loaisp)
    {
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = " and " . $this->get_orderby();
        $sql = "SELECT masp.masp,sotienpbcpsxccap1,sotienpbcpsxccap2 FROM bangphanbo_chiphi_sxchung inner JOIN masp on (bangphanbo_chiphi_sxchung.mact = masp.masp )WHERE 0=0 and loaisp='{$loaisp}' ";
        $this->query($sql);
        $i = 0;
        while ($data = $this->fetch()) {
            $trees[$data['masp']] = $data;
        }
        return $trees;
    }

    function loadListMaCT_CoKeyLaMa()
    {
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = " and " . $this->get_orderby();
        $sql = "SELECT * FROM masp WHERE 0=0 $sql_w  order by masp";
        $this->query($sql);
        $i = 0;
        while ($data = $this->fetch()) {
            $i++;
            $data['STT'] = $i;
            $trees[$data['masp']] = $data;
        }
        return $trees;
    }

    function loadMaKHALL_TraVeChuoiMaCTSP($makh = 0)
    { // c?p 1 la cha
        //$cb_loaitk = $this->get_Cb_LoaiTK();
        $trees = array();
        $fill = $this->get_orderby();
        $trinhmakh = "";
        if ($fill != "")
            $sql_w = $this->get_orderby() . " and ";
        $sql = "SELECT * FROM masp WHERE $sql_w masp = '$makh'  order by masp DESC ";
        $this->query($sql);
        $i = 0;
        while ($data = $this->fetch()) {
            $i++;
            $data['STT'] = $i;
            $trinhmakh .= $data['masp'] . ",";
            $sql1 = "SELECT * FROM masp WHERE $sql_w maspcha ='" . $data['masp'] . "' order by masp ";
            $query = $this->re_query($sql1);
            while ($data1 = $this->re_fetch($query)) {
                $i++;
                $data1['STT'] = $i;
                $trinhmakh .= $data1['masp'] . ",";
                $sql2 = "SELECT * FROM masp WHERE $sql_w maspcha ='" . $data1['masp'] . "' order by masp ";
                $query1 = $this->re_query($sql2);
                while ($data2 = $this->re_fetch($query1)) {
                    $i++;
                    $data2['STT'] = $i;
                    $trinhmakh .= $data2['masp'] . ",";
                }
            }
        }
        return $trinhmakh;
    }

    function loadMaKHALL_TraVeChuoiMaCTSP_TheoTungChaCon($makh = 0)
    { // c?p 1 la cha
        //$cb_loaitk = $this->get_Cb_LoaiTK();
        $trees = array();
        $fill = $this->get_orderby();
        $trinhmakh = "";
        if ($fill != "")
            $sql_w = $this->get_orderby() . " and ";
        $sql = "SELECT * FROM masp WHERE $sql_w maspcha = '$makh'  order by masp DESC ";
        $this->query($sql);
        $i = 0;
        while ($data = $this->fetch()) {
            $i++;
            $data['STT'] = $i;
            $trinhmakh = "";
            $trinhmakh .= $data['masp'] . ",";
            $sql1 = "SELECT * FROM masp WHERE $sql_w maspcha ='" . $data['masp'] . "' order by masp ";
            $query = $this->re_query($sql1);
            while ($data1 = $this->re_fetch($query)) {
                $i++;
                $data1['STT'] = $i;
                $trinhmakh .= $data1['masp'] . ",";
                $sql2 = "SELECT * FROM masp WHERE $sql_w maspcha ='" . $data1['masp'] . "' order by masp ";
                $query1 = $this->re_query($sql2);
                while ($data2 = $this->re_fetch($query1)) {
                    $i++;
                    $data2['STT'] = $i;
                    $trinhmakh .= $data2['masp'] . ",";
                }
            }
            $trees[$data['masp']] = substr($trinhmakh,0,-1);
        }
        return $trees;
    }

    function loadDSSPCap1($makh = 0)
    { // c?p 1 la cha
        //$cb_loaitk = $this->get_Cb_LoaiTK();
        $trees = array();
        $fill = $this->get_orderby();
        $trinhmakh = "";
        if ($fill != "")
            $sql_w = $this->get_orderby() . " and ";
        $sql = "SELECT * FROM masp WHERE $sql_w maspcha = '$makh' and loaisp='SP'  order by masp DESC ";
        $this->query($sql);
        $i = 0;
        while ($data = $this->fetch()) {
            $trees[$data['masp']] = $data['masp'];
        }
        return $trees;
    }

    function loadDSSPCap1_CT($makh = 0)
    { // c?p 1 la cha
        //$cb_loaitk = $this->get_Cb_LoaiTK();
        $trees = array();
        $fill = $this->get_orderby();
        $trinhmakh = "";
        if ($fill != "")
            $sql_w = $this->get_orderby() . " and ";
        $sql = "SELECT * FROM masp WHERE $sql_w maspcha = '$makh' and loaisp='CT'  order by masp DESC ";
        $this->query($sql);
        $i = 0;
        while ($data = $this->fetch()) {
            $trees[$data['masp']] = $data['masp'];
        }
        return $trees;
    }

    function loadListMaKH_Co_Key_La_Ma()
    {
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = " and " . $this->get_orderby();
        $sql = "SELECT * FROM makh WHERE 0=0 $sql_w  order by tenkh ";
        $this->query($sql);
        $i = 0;
        while ($data = $this->fetch()) {
            $i++;
            $data['STT'] = $i;
            $trees[$data[makh]] = $data;
        }
        return $trees;
    }

    function loadListMaVT()
    {
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = " and " . $this->get_orderby();
        $sql = "SELECT ct.sott,ct.masp,ct.mavt,ct.dvt,ct.dinhmuc,ct.tylehaohoc,ct.dinhmuckecakhauhao,mavt.tenvt,mavt.loaivl FROM chitiet_dinhmuc_sp ct left join mavt on (ct.mavt=mavt.mavt) WHERE 0=0 $sql_w  order by ct.mavt ";
        $this->query($sql);
        $i = 0;
        while ($data = $this->fetch()) {
            $i++;
            $data['STT'] = $i;
            //if ($data['dinhmuc'] == 0) {
            $sql_del = "delete from chitiet_dinhmuc_sp WHERE sott='" . $data['sott'] . "' and dinhmuc=0";
            $this->re_query($sql_del);
            //}
            $trees[] = $data;
        }
        return $trees;
    }

    function loadListMaVT_HongDong()
    {
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = " and " . $this->get_orderby();
        $sql = "SELECT ct.sott,ct.masp,ct.mavt,ct.dvt,ct.dinhmuc,ct.tylehaohoc,ct.dinhmuckecakhauhao,mavt.tenvt,mavt.loaivl FROM chitiet_dinhmuc_hd ct left join mavt on (ct.mavt=mavt.mavt) WHERE 0=0 $sql_w  order by ct.mavt ";
        $this->query($sql);
        $i = 0;
        while ($data = $this->fetch()) {
            $i++;
            $data['STT'] = $i;
            //if ($data['dinhmuc'] == 0) {
            $sql_del = "delete from chitiet_dinhmuc_hd WHERE sott='" . $data['sott'] . "' and dinhmuc=0";
            $this->re_query($sql_del);
            //}
            $trees[] = $data;
        }
        return $trees;
    }

    function loadListLoaiDuong()
    {
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = " and " . $this->get_orderby();
        $sql = "SELECT ct.sott,ct.mats,ct.maloaiduong,ct.sokm,ct.litkmdau,ct.tongdau,maloaiduong.tenduong,maloaiduong.pptinh FROM dinhmucxemay ct left join maloaiduong on (ct.maloaiduong=maloaiduong.maduong) WHERE 0=0 $sql_w  order by ct.maloaiduong";
        $this->query($sql);
        $i = 0;
        while ($data = $this->fetch()) {
            $i++;
            $data['STT'] = $i;
            if ($data['sokm'] == 0) {
                $sql_del = "delete from dinhmucxemay WHERE sott='" . $data['sott'] . "'";
                $this->re_query($sql_del);
            }
            $trees[] = $data;
        }
        return $trees;
    }
    function loadListLoaiDuongUnion($masp, $loaidinhmucsp)
    {
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = " and " . $this->get_orderby();
        $sql = "SELECT 0 as mats,maduong as maloaiduong,0 as sokm,0 as litkmdau,0 as tongdau,tenduong,maloaiduong.pptinh FROM  maloaiduong WHERE pptinh='" . $loaidinhmucsp . "' and maduong not in(SELECT maloaiduong FROM dinhmucxemay WHERE mats='" . $masp . "') $sql_w  order by maduong ";
        $this->query($sql);
        $i = 0;
        while ($data = $this->fetch()) {
            $i++;
            $data['STT'] = $i;
            $trees[] = $data;
        }
        return $trees;
    }

    function loadListGiaThanhTieuChuan()
    {
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = " and " . $this->get_orderby();
        $sql = "SELECT b1.*,tensp FROM banggiathanhtieuchuan b1 INNER JOIN masp b2 on (b1.masp = b2.masp) WHERE 0=0 $sql_w  order by b1.masp,b1.loaivl ";
        $this->query($sql);
        $i = 0;
        while ($data = $this->fetch()) {
            $i++;
            $data['STT'] = $i;
            if ($data['loaivl'] == "") {
                $data['loaivl'] = "VL";
            }
            $trees[] = $data;
        }
        return $trees;
    }


    function loadListMaVTUnion($masp, $loaidinhmucsp)
    {
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = " and " . $this->get_orderby();
        $sql = "SELECT 0 as masp,mavt,dvt,0 as dinhmuc,0 as tylehaohoc,0 as dinhmuckecakhauhao,tenvt,mavt.loaivl FROM  mavt WHERE loaivl='" . $loaidinhmucsp . "' and mavt not in(SELECT mavt FROM chitiet_dinhmuc_sp WHERE masp='" . $masp . "') $sql_w  order by mavt ";
        $this->query($sql);
        $i = 0;
        while ($data = $this->fetch()) {
            $i++;
            $data['STT'] = $i;
            $data['masp'] = $masp;
            $trees[] = $data;
        }
        return $trees;
    }

    function loadListMaVTHDUnion($masp, $loaidinhmucsp)
    {
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = " and " . $this->get_orderby();
        $sql = "SELECT 0 as masp,mavt,dvt,0 as dinhmuc,0 as tylehaohoc,0 as dinhmuckecakhauhao,tenvt,mavt.loaivl FROM  mavt WHERE loaivl='" . $loaidinhmucsp . "' and mavt not in(SELECT mavt FROM chitiet_dinhmuc_hd WHERE masp='" . $masp . "') $sql_w  order by mavt ";
        $this->query($sql);
        $i = 0;
        while ($data = $this->fetch()) {
            $i++;
            $data['STT'] = $i;
            $data['masp'] = $masp;
            $trees[] = $data;
        }
        return $trees;
    }

    function loadListMaVT_CT_Vatlieu()
    {
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = " and " . $this->get_orderby();
        $sql = "SELECT ct.sott,ct.masp,ct.mahm,ct.mavt,ct.dvt,ct.soluong,ct.dongia,ct.thanhtien,ct.thue,mavt.tenvt FROM chitiet_dinhmuc_ct_vl ct inner join mavt on (ct.mavt=mavt.mavt) WHERE 0=0 $sql_w  order by ct.mavt ";
        $this->query($sql);
        $i = 0;
        while ($data = $this->fetch()) {
            $i++;
            $data['STT'] = $i;
            if ($data['soluong'] == 0) {
                $sql_del = "delete from chitiet_dinhmuc_ct_vl WHERE sott='" . $data['sott'] . "'";
                $this->re_query($sql_del);
            }
            $trees[] = $data;
        }
        return $trees;
    }

    function loadListMaVT_CT_Vatlieu_Copy()
    {
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = " and " . $this->get_orderby();
        $sql = "SELECT ct.sott,ct.masp,ct.mahm,ct.mavt,ct.dvt,0 as soluong,ct.dongia,0 as thanhtien,ct.thue,mavt.tenvt FROM chitiet_dinhmuc_ct_vl ct inner join mavt on (ct.mavt=mavt.mavt) WHERE 0=0 $sql_w  order by ct.mavt ";
        $this->query($sql);
        $i = 0;
        while ($data = $this->fetch()) {
            $i++;
            $data['STT'] = $i;
            $trees[] = $data;
        }
        return $trees;
    }

    function loadListMaVT_CT_Vatlieu_Union($masp, $mahm)
    {
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = " and " . $this->get_orderby();
        $sql = "SELECT 0 as masp,0 as mahm,mavt,dvt,0 as soluong,0 as dongia,0 as thanhtien, 0 as thue,tenvt FROM  mavt WHERE 0=0 and mavt not in(SELECT mavt FROM chitiet_dinhmuc_ct_vl WHERE masp='" . $masp . "' and mahm='" . $mahm . "') $sql_w  order by mavt ";
        $this->query($sql);
        $i = 0;
        while ($data = $this->fetch()) {
            $i++;
            $data['STT'] = $i;
            $data['masp'] = $masp;
            $data['mahm'] = $mahm;
            $trees[] = $data;
        }
        return $trees;
    }

    function loadListMaVT_CT_Vatlieu_TongHop()
    {
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = " and " . $this->get_orderby();
        $sql = "SELECT ct.sott,ct.masp,ct.mahm,ct.mavt,ct.dvt,sum(ct.soluong) as soluong,sum(ct.thanhtien)/sum(ct.soluong) as dongia,sum(ct.thanhtien) as thanhtien,avg(ct.thue) as thue,mavt.tenvt FROM chitiet_dinhmuc_ct_vl ct inner join mavt on (ct.mavt=mavt.mavt) WHERE 0=0 $sql_w group by ct.mavt  order by ct.mavt ";
        $this->query($sql);
        $i = 0;
        while ($data = $this->fetch()) {
            $i++;
            $data['STT'] = $i;
            if ($data['soluong'] == 0) {
                $sql_del = "delete from chitiet_dinhmuc_ct_vl WHERE sott='" . $data['sott'] . "'";
                $this->re_query($sql_del);
            }
            $trees[] = $data;
        }
        return $trees;
    }


    /*public function loadListMaCT(){
        $fill = $this->get_orderby();
            if($fill!="")
                    $sql_w = " and ".$this->get_orderby();
        $sql="select * from mact where 0=0 $sql_w " ;
        $this->query($sql);
        if($this->num_rows() == 0){
            return 0;
        }else{
            $i=0;
            while($data=$this->fetch()){
                $i++;
                $data['STT']=$i;
                $row[]=$data;
            }
            return $row;
        }
    }*/

    public function getMaCT()
    {
        $sql = "select * from mact where mact='" . $this->get_MaCT() . "'";
        $this->query($sql);
        if ($this->num_rows() == 0) {
            return 0;
        } else {
            return $this->fetch();
        }
    }


    public function themMaSP()
    {
        $sql = "INSERT INTO masp(sott, masp, tensp,maspcha,tenkd,dvt,makh,diachi,namsx,gthopdong,ngaykhoicong,ngayhoanthanh,vatlieu,nhancong,may,quyettoan,loaisp,ghichu,diabanuudai)
                       VALUES ('" . $this->get_SoTT() . "','" . $this->get_MaCT() . "', '" . $this->get_TenCT() . "','" . $this->get_MaCTCha() . "','" . $this->get_TenKD() . "','" . $this->get_DVT() . "','" . $this->get_MaKH() . "','" . $this->get_DiaChi() . "','" . $this->getNamSX() . "','" . $this->get_GiaTriHD() . "','" . $this->get_NgayKC() . "','" . $this->get_NgayHT() . "','" . $this->get_VatLieu() . "','" . $this->get_NhanCong() . "','" . $this->get_May() . "','" . $this->getDaQuyetToan() . "','" . $this->getLoaiSP() . "','" . $this->getGhiChu() . "','" . $this->getDiaBanUuDai() . "' );";
        $this->query($sql);
    }

    public function suaMaSP()
    {
        $sql = "update masp set masp='" . $this->get_MaCT() . "',tensp='" . $this->get_TenCT() . "',maspcha='" . $this->get_MaCTCha() . "',tenkd='" . $this->get_TenKD() . "',dvt='" . $this->get_DVT() . "',makh='" . $this->get_MaKH() . "',diachi='" . $this->get_DiaChi() . "',namsx='" . $this->getNamSX() . "',gthopdong='" . $this->get_GiaTriHD() . "',ngaykhoicong='" . $this->get_NgayKC() . "',ngayhoanthanh='" . $this->get_NgayHT() . "',vatlieu='" . $this->get_VatLieu() . "',nhancong='" . $this->get_NhanCong() . "',may='" . $this->get_May() . "',quyettoan='" . $this->getDaQuyetToan() . "',loaisp='" . $this->getLoaiSP() . "',ghichu='" . $this->getGhiChu() . "',diabanuudai='" . $this->getDiaBanUuDai() . "'
                  WHERE sott = '" . $this->get_SoTT() . "'";
        $this->query($sql);
    }

    public function suaCPDoDangDK()
    {
        $sql = "update cpdodangdk set soduco='" . $this->getSoDuCo() . "',soduno='" . $this->getSoDuNo() . "'
                  WHERE mact = '" . $this->get_MaCT() . "'";
        $this->query($sql);
    }

    public function suaDoanhThuThucTe_CongTrinh()
    {
        $sql = "update bangdoanhthuthucte set gtcongtrinh='" . $this->getGTCongTrinh() . "',doanhthuthucte='" . $this->getDoanhThuThucTe() . "',tyle='" . $this->getTyLe() . "'
                  WHERE mact = '" . $this->get_MaCT() . "'";
        $this->query($sql);
    }

    public function suaDieuTra_XayDung_CongTrinh()
    {
        $sql = "update bangdieutraxaydung_congtrinh set 
                                                      sohopdong='" . $this->getSoHopDong() . "',
                                                      ngayhopdong='" . $this->getNgayHopDong() . "',
                                                      ngaynghiemthu='" . $this->getNgayNghiemThu() . "',
                                                      giatringiemthu='" . $this->getGiaTriNghiemThu() . "',
                                                      phantramhoanthanhnghiemthu='" . $this->getPhanTramHTNT() . "',
                                                      phantramklhttt='" . $this->getPhanTramHTTT() . "'
                  WHERE sott = '" . $this->get_SoTT() . "'";
        $this->query($sql);
    }

    public function xoaMaSP()
    {
        $sql = "delete from masp where masp='" . $this->get_MaCT() . "'";
        $this->query($sql);
    }

    public function themCTMaSP()
    {
        $sql = "INSERT INTO chitiet_dinhmuc_sp(masp,mavt, dvt,dinhmuc,tylehaohoc,dinhmuckecakhauhao)
                       VALUES ('" . $this->get_MaCT() . "', '" . $this->getMavt() . "','" . $this->get_DVT() . "','" . $this->getDinhmuc() . "','" . $this->getTylehaohoc() . "','" . $this->getDinhmuckecakhauhao() . "');";
        $this->query($sql);
    }
    public function themHDMaSP()
    {
        $sql = "INSERT INTO chitiet_dinhmuc_hd(masp,mavt, dvt,dinhmuc,tylehaohoc,dinhmuckecakhauhao)
                       VALUES ('" . $this->get_MaCT() . "', '" . $this->getMavt() . "','" . $this->get_DVT() . "','" . $this->getDinhmuc() . "','" . $this->getTylehaohoc() . "','" . $this->getDinhmuckecakhauhao() . "');";
        $this->query($sql);
    }
    public function themCTXeMay()
    {
        $sql = "INSERT INTO dinhmucxemay(mats,maloaiduong,sokm,litkmdau,tongdau)
                       VALUES ('" . $this->get_MaCT() . "', '" . $this->getMavt() . "','" . $this->getDinhmuc() . "','" . $this->getTylehaohoc() . "','" . $this->getDinhmuckecakhauhao() . "');";
        $this->query($sql);
    }

    public function suaCTMaSP()
    {
        $sql = "update chitiet_dinhmuc_sp set dinhmuc='" . $this->getDinhmuc() . "',tylehaohoc='" . $this->getTylehaohoc() . "',dinhmuckecakhauhao='" . $this->getDinhmuckecakhauhao() . "'
                  WHERE masp = '" . $this->get_MaCT() . "' and mavt = '" . $this->getMavt() . "' ";
        $this->query($sql);
    }
    public function suaHDMaSP()
    {
        $sql = "update chitiet_dinhmuc_hd set dinhmuc='" . $this->getDinhmuc() . "',tylehaohoc='" . $this->getTylehaohoc() . "',dinhmuckecakhauhao='" . $this->getDinhmuckecakhauhao() . "'
                  WHERE masp = '" . $this->get_MaCT() . "' and mavt = '" . $this->getMavt() . "' ";
        $this->query($sql);
    }
    public function suaCTXeMay()
    {
        $sql = "update dinhmucxemay set sokm='" . $this->getDinhmuc() . "',litkmdau='" . $this->getTylehaohoc() . "',tongdau='" . $this->getDinhmuckecakhauhao() . "'
                  WHERE mats = '" . $this->get_MaCT() . "' and maloaiduong = '" . $this->getMavt() . "' ";
        $this->query($sql);
    }

    public function suaGiaThanhTieuChuan($sott, $dongia, $thanhtien)
    {
        $sql = "update banggiathanhtieuchuan set dongia='" . $dongia . "',thanhtien='" . $thanhtien . "'
                  WHERE sott = '" . $sott . "'";
        $this->query($sql);
    }

    public function themCTMaCTVL()
    {
        $sql = "INSERT INTO chitiet_dinhmuc_ct_vl(masp,mavt, dvt,soluong,dongia,thanhtien,thue,mahm)
                       VALUES ('" . $this->get_MaCT() . "', '" . $this->getMavt() . "','" . $this->get_DVT() . "','" . $this->getSoLuong() . "','" . $this->getDonGia() . "','" . $this->getThanhTien() . "','" . $this->getThue() . "','" . $this->getMaHangMuc() . "');";
        $this->query($sql);
    }

    public function suaCTMaCTVL()
    {
        $sql = "update chitiet_dinhmuc_ct_vl set soluong='" . $this->getSoLuong() . "',dongia='" . $this->getDonGia() . "',thanhtien='" . $this->getThanhTien() . "',thue='" . $this->getThue() . "'
                  WHERE masp = '" . $this->get_MaCT() . "' and mavt = '" . $this->getMavt() . "' and mahm = '" . $this->getMaHangMuc() . "' ";
        $this->query($sql);
    }

    function loadListMaCTCon($makhcha)
    {
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = " and " . $this->get_orderby();
        $sql = "SELECT masp as manhom from masp WHERE maspcha='" . $makhcha . "'";
        $this->query($sql);
        $i = 0;
        $num = $this->num_rows();
        if ($num == 0) {
            return 0;
        } else {
            while ($data = $this->fetch()) {
                $i++;
                $ma = explode("-", $data[manhom]);
                $sopt = count($ma) - 1;
                $trees[$ma[$sopt]] = $ma;
            }
            return $trees;
        }
    }

    function themdssp()
    {
        $sql_dl = "TRUNCATE soluonghanghoaxuatkhau";
        $sql = "INSERT INTO soluonghanghoaxuatkhau (masp,thang1,thang2,thang3,thang4,thang5,thang6,thang7,thang8,thang9,thang10,thang11,thang12) SELECT t1.masp,(SELECT (n1+n2+n3+n4+n5+n6+n7+n8+n9+n10+n11+n12+n13+n14+n15+n16+n17+n18+n19+n20+n21+n22+n23+n24+n25+n26+n27+n28+n29+n30+n31+0) from bangthongkethanhpham st1 where thang=1 and st1.masp  = t1.masp) as thang1,(SELECT (n1+n2+n3+n4+n5+n6+n7+n8+n9+n10+n11+n12+n13+n14+n15+n16+n17+n18+n19+n20+n21+n22+n23+n24+n25+n26+n27+n28+n29+n30+n31+0) from bangthongkethanhpham st1 where thang=2 and st1.masp  = t1.masp) as thang2,(SELECT (n1+n2+n3+n4+n5+n6+n7+n8+n9+n10+n11+n12+n13+n14+n15+n16+n17+n18+n19+n20+n21+n22+n23+n24+n25+n26+n27+n28+n29+n30+n31+0) from bangthongkethanhpham st1 where thang=3 and st1.masp  = t1.masp) as thang3,(SELECT (n1+n2+n3+n4+n5+n6+n7+n8+n9+n10+n11+n12+n13+n14+n15+n16+n17+n18+n19+n20+n21+n22+n23+n24+n25+n26+n27+n28+n29+n30+n31+0) from bangthongkethanhpham st1 where thang=4 and st1.masp  = t1.masp) as thang4,(SELECT (n1+n2+n3+n4+n5+n6+n7+n8+n9+n10+n11+n12+n13+n14+n15+n16+n17+n18+n19+n20+n21+n22+n23+n24+n25+n26+n27+n28+n29+n30+n31+0) from bangthongkethanhpham st1 where thang=5 and st1.masp  = t1.masp) as thang5,(SELECT (n1+n2+n3+n4+n5+n6+n7+n8+n9+n10+n11+n12+n13+n14+n15+n16+n17+n18+n19+n20+n21+n22+n23+n24+n25+n26+n27+n28+n29+n30+n31+0) from bangthongkethanhpham st1 where thang=6 and st1.masp  = t1.masp) as thang6,(SELECT (n1+n2+n3+n4+n5+n6+n7+n8+n9+n10+n11+n12+n13+n14+n15+n16+n17+n18+n19+n20+n21+n22+n23+n24+n25+n26+n27+n28+n29+n30+n31+0) from bangthongkethanhpham st1 where thang=7 and st1.masp  = t1.masp) as thang7,(SELECT (n1+n2+n3+n4+n5+n6+n7+n8+n9+n10+n11+n12+n13+n14+n15+n16+n17+n18+n19+n20+n21+n22+n23+n24+n25+n26+n27+n28+n29+n30+n31+0) from bangthongkethanhpham st1 where thang=8 and st1.masp  = t1.masp) as thang8,(SELECT (n1+n2+n3+n4+n5+n6+n7+n8+n9+n10+n11+n12+n13+n14+n15+n16+n17+n18+n19+n20+n21+n22+n23+n24+n25+n26+n27+n28+n29+n30+n31+0) from bangthongkethanhpham st1 where thang=9 and st1.masp  = t1.masp) as thang9,(SELECT (n1+n2+n3+n4+n5+n6+n7+n8+n9+n10+n11+n12+n13+n14+n15+n16+n17+n18+n19+n20+n21+n22+n23+n24+n25+n26+n27+n28+n29+n30+n31+0) from bangthongkethanhpham st1 where thang=10 and st1.masp  = t1.masp) as thang10,(SELECT (n1+n2+n3+n4+n5+n6+n7+n8+n9+n10+n11+n12+n13+n14+n15+n16+n17+n18+n19+n20+n21+n22+n23+n24+n25+n26+n27+n28+n29+n30+n31+0) from bangthongkethanhpham st1 where thang=11 and st1.masp  = t1.masp) as thang11,(SELECT (n1+n2+n3+n4+n5+n6+n7+n8+n9+n10+n11+n12+n13+n14+n15+n16+n17+n18+n19+n20+n21+n22+n23+n24+n25+n26+n27+n28+n29+n30+n31+0) from bangthongkethanhpham st1 where thang=12 and st1.masp  = t1.masp) as thang12 from bangthongkethanhpham t1 group by t1.masp";
        $this->re_query("SET FOREIGN_KEY_CHECKS=0;");
        $this->re_query($sql_dl);
        $this->re_query($sql);
        $this->re_query("SET FOREIGN_KEY_CHECKS=1;");
    }

    function themdssptktp($thang)
    {
        $sql = "INSERT INTO bangthongkethanhpham(masp,thang) SELECT masp,'" . $thang . "' as thang FROM masp where masp NOT in (select masp FROM bangthongkethanhpham where thang='" . $thang . "') and loaisp='SP'";
        $this->query($sql);
    }

    function loadListSoDuTruVLSX($parentid = 0, $printto)
    {
        //$cb_loaitk1 = $this->get_Cb_LoaiTK();
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = $this->get_orderby() . " and ";
        $sql = "SELECT * FROM soluonghanghoaxuatkhau sl inner JOIN masp on (sl.masp =masp.masp ) WHERE $sql_w maspcha = '" . $parentid . "'  order by sl.masp";
        $result = $this->re_query($sql);
        $i = 0;
        while ($data = $this->re_fetch($result)) {// Lấy thông tin tài khoản cấp 1
            $i++;
            $data['STT'] = $i;
            $data['tensp'] = $data['tensp'];
            $trees[] = $data;
            $sql1 = "SELECT * FROM soluonghanghoaxuatkhau sl inner JOIN masp on (sl.masp =masp.masp ) WHERE $sql_w maspcha ='" . $data['masp'] . "' order by sl.masp ";
            $query = $this->re_query($sql1);
            while ($data1 = $this->re_fetch($query)) {// Lấy thông tin tài khoản cấp 2
                if ($printto == 1) {
                    break;
                }
                $i++;
                $data1['STT'] = $i;
                $data1['tensp'] = "&nbsp;&nbsp;&nbsp;" . $data1['tensp'];

                $trees[] = $data1;
                $sql2 = "SELECT * FROM soluonghanghoaxuatkhau sl inner JOIN masp on (sl.masp =masp.masp ) WHERE $sql_w maspcha ='" . $data1['masp'] . "' order by sl.masp";
                $query1 = $this->re_query($sql2);
                while ($data2 = $this->re_fetch($query1)) {// Lấy thông tin tài khoản cấp 3
                    if ($printto == 2) {
                        break;
                    }
                    $i++;
                    $data2['STT'] = $i;
                    $data2['tensp'] = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" . $data2['tensp'];
                    $trees[] = $data2;
                }
            }
        }
        return $trees;
    }

    function loadListSoDuTruVLSXTKTP($parentid = 0, $printto)
    {
        //$cb_loaitk1 = $this->get_Cb_LoaiTK();
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = $this->get_orderby() . " and ";
        $sql = "SELECT sl.*,masp.maspcha,masp.tensp FROM bangthongkethanhpham sl inner JOIN masp on (sl.masp =masp.masp ) WHERE $sql_w maspcha = '" . $parentid . "'  order by sl.masp";
        $result = $this->re_query($sql);
        $i = 0;
        while ($data = $this->re_fetch($result)) {// Lấy thông tin tài khoản cấp 1
            $i++;
            $data['STT'] = $i;
            $data['tensp'] = $data['tensp'];
            $trees[] = $data;
            $sql1 = "SELECT sl.*,masp.maspcha,masp.tensp FROM bangthongkethanhpham sl inner JOIN masp on (sl.masp =masp.masp ) WHERE $sql_w maspcha ='" . $data['masp'] . "' order by sl.masp ";
            $query = $this->re_query($sql1);
            while ($data1 = $this->re_fetch($query)) {// Lấy thông tin tài khoản cấp 2
                if ($printto == 1) {
                    break;
                }
                $i++;
                $data1['STT'] = $i;
                $data1['tensp'] = "&nbsp;&nbsp;&nbsp;" . $data1['tensp'];

                $trees[] = $data1;
                $sql2 = "SELECT sl.*,masp.maspcha,masp.tensp FROM bangthongkethanhpham sl inner JOIN masp on (sl.masp =masp.masp ) WHERE $sql_w maspcha ='" . $data1['masp'] . "' order by sl.masp";
                $query1 = $this->re_query($sql2);
                while ($data2 = $this->re_fetch($query1)) {// Lấy thông tin tài khoản cấp 3
                    if ($printto == 2) {
                        break;
                    }
                    $i++;
                    $data2['STT'] = $i;
                    $data2['tensp'] = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" . $data2['tensp'];
                    $trees[] = $data2;
                }
            }
        }
        return $trees;
    }

    function loadListTongHopDuTruVLSX($parentid = 0, $printto)
    {
        //$cb_loaitk1 = $this->get_Cb_LoaiTK();
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = $this->get_orderby() . " and ";
        $sql = "SELECT b1.*,tenvt,dvt FROM bangdutruvlsxdk b1 INNER JOIN  mavt b2 on (b1.mavt=b2.mavt)WHERE $sql_w 0=0  order by b1.mavt";
        $result = $this->re_query($sql);
        $i = 0;
        while ($data = $this->re_fetch($result)) {// Lấy thông tin tài khoản cấp 1
            $i++;
            $data['STT'] = $i;
            $trees[] = $data;
        }
        return $trees;
    }

    function loadListSoDuTruVLSX_W()
    {
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = " and " . $this->get_orderby();
        $sql = "SELECT * FROM soluonghanghoaxuatkhau sl inner JOIN masp on (sl.masp =masp.masp ) WHERE 0=0 $sql_w  order by sl.masp";
        $this->query($sql);
        $i = 0;
        while ($data = $this->fetch()) {
            $i++;
            $data['STT'] = $i;
            $trees[] = $data;
        }
        return $trees;
    }

    function loadListSoDuTruVLSXTKTP_W()
    {
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = " and " . $this->get_orderby();
        $sql = "SELECT sl.*,masp.maspcha,masp.tensp FROM bangthongkethanhpham sl inner JOIN masp on (sl.masp =masp.masp ) WHERE 0=0 $sql_w  order by sl.masp";
        $this->query($sql);
        $i = 0;
        while ($data = $this->fetch()) {
            $i++;
            $data['STT'] = $i;
            $trees[] = $data;
        }
        return $trees;
    }

    public function suaSLDTVLSX()
    {
        $sql = "update soluonghanghoaxuatkhau set 
                    thang1='" . $this->getThang1() . "', 
                    thang2='" . $this->getThang2() . "', 
                    thang3='" . $this->getThang3() . "', 
                    thang4='" . $this->getThang4() . "', 
                    thang5='" . $this->getThang5() . "', 
                    thang6='" . $this->getThang6() . "', 
                    thang7='" . $this->getThang7() . "', 
                    thang8='" . $this->getThang8() . "', 
                    thang9='" . $this->getThang9() . "', 
                    thang10='" . $this->getThang10() . "', 
                    thang11='" . $this->getThang11() . "', 
                    thang12='" . $this->getThang12() . "' 
        WHERE masp = '" . $this->get_MaCT() . "'";
        $this->query($sql);
    }

    public function suaSLDTVLSXTKTP()
    {
        $sql = "update bangthongkethanhpham set 
                   n1='" . $this->getNgay1() . "', 
                    n2='" . $this->getNgay2() . "', 
                    n3='" . $this->getNgay3() . "', 
                    n4='" . $this->getNgay4() . "', 
                    n5='" . $this->getNgay5() . "', 
                    n6='" . $this->getNgay6() . "', 
                    n7='" . $this->getNgay7() . "', 
                    n8='" . $this->getNgay8() . "', 
                    n9='" . $this->getNgay9() . "', 
                    n10='" . $this->getNgay10() . "', 
                    n11='" . $this->getNgay11() . "', 
                    n12='" . $this->getNgay12() . "', 
                    n13='" . $this->getNgay13() . "', 
                    n14='" . $this->getNgay14() . "', 
                    n15='" . $this->getNgay15() . "', 
                    n16='" . $this->getNgay16() . "', 
                    n17='" . $this->getNgay17() . "', 
                    n18='" . $this->getNgay18() . "', 
                    n19='" . $this->getNgay19() . "', 
                    n20='" . $this->getNgay20() . "', 
                    n21='" . $this->getNgay21() . "', 
                    n22='" . $this->getNgay22() . "', 
                    n23='" . $this->getNgay23() . "', 
                    n24='" . $this->getNgay24() . "', 
                    n25='" . $this->getNgay25() . "', 
                    n26='" . $this->getNgay26() . "', 
                    n27='" . $this->getNgay27() . "', 
                    n28='" . $this->getNgay28() . "', 
                    n29='" . $this->getNgay29() . "', 
                    n30='" . $this->getNgay30() . "', 
                    n31='" . $this->getNgay31() . "' 
        WHERE sott = '" . $this->get_SoTT() . "'";
        $this->query($sql);
    }

    function ThemBangDuTruVLSX()
    {
        $sql_dl = "delete from bangdutruvlsxdk";
        $sql_dl_copy = "delete from bangdutruvlsxdk_masp";
        $sql = "INSERT INTO bangdutruvlsxdk (masp,mavt,thang1,thang2,thang3,thang4,thang5,thang6,thang7,thang8,thang9,thang10,thang11,thang12) SELECT slxk.masp,mavt.mavt,sum(thang1*ct.dinhmuckecakhauhao) as thang1,sum(thang2*ct.dinhmuckecakhauhao) as thang2,sum(thang3*ct.dinhmuckecakhauhao) as thang3,sum(thang4*ct.dinhmuckecakhauhao) as thang4,sum(thang5*ct.dinhmuckecakhauhao) as thang5,sum(thang6*ct.dinhmuckecakhauhao) as thang6,sum(thang7*ct.dinhmuckecakhauhao) as thang7,sum(thang8*ct.dinhmuckecakhauhao) as thang8,sum(thang9*ct.dinhmuckecakhauhao) as thang9,sum(thang10*ct.dinhmuckecakhauhao) as thang10,sum(thang11*ct.dinhmuckecakhauhao) as thang11,sum(thang12*ct.dinhmuckecakhauhao) as thang12 FROM soluonghanghoaxuatkhau slxk INNER JOIN chitiet_dinhmuc_sp ct on (slxk.masp=ct.masp) inner JOIN mavt on (ct.mavt = mavt.mavt) WHERE mavt.loaivl='' group by mavt.mavt";
        $sql_copy = "INSERT INTO bangdutruvlsxdk_masp (masp,mavt,thang1,thang2,thang3,thang4,thang5,thang6,thang7,thang8,thang9,thang10,thang11,thang12) SELECT slxk.masp,mavt.mavt,sum(thang1*ct.dinhmuckecakhauhao) as thang1,sum(thang2*ct.dinhmuckecakhauhao) as thang2,sum(thang3*ct.dinhmuckecakhauhao) as thang3,sum(thang4*ct.dinhmuckecakhauhao) as thang4,sum(thang5*ct.dinhmuckecakhauhao) as thang5,sum(thang6*ct.dinhmuckecakhauhao) as thang6,sum(thang7*ct.dinhmuckecakhauhao) as thang7,sum(thang8*ct.dinhmuckecakhauhao) as thang8,sum(thang9*ct.dinhmuckecakhauhao) as thang9,sum(thang10*ct.dinhmuckecakhauhao) as thang10,sum(thang11*ct.dinhmuckecakhauhao) as thang11,sum(thang12*ct.dinhmuckecakhauhao) as thang12 FROM soluonghanghoaxuatkhau slxk INNER JOIN chitiet_dinhmuc_sp ct on (slxk.masp=ct.masp) inner JOIN mavt on (ct.mavt = mavt.mavt) WHERE mavt.loaivl='' group by ct.masp,mavt.mavt";
        $this->re_query($sql_dl);
        $this->re_query($sql);
        $this->re_query($sql_dl_copy);
        $this->re_query($sql_copy);
    }

    function layDSBangDuTruDauKy()
    {
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = " and " . $this->get_orderby();
        $sql = "SELECT * FROM bangdutruvlsxdk WHERE 0=0 $sql_w  order by masp";
        $this->query($sql);
        $i = 0;
        while ($data = $this->fetch()) {
            $i++;
            $data['STT'] = $i;
            $trees[] = $data;
        }
        return $trees;
    }


    //----------------------------------------------------------------------------------------------------------
    function ThemSLDMSPHienTai()
    {// Lấy danh sách nhập vật tư trong tồn kho
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = " and " . $this->get_orderby();
        $sql = "SELECT mavt FROM mavt WHERE 0=0 $sql_w ";
        $this->query($sql);
        $sql_emp = "delete from tmp_tksphienthai";
        $this->re_query($sql_emp);
        $this->re_query("ALTER TABLE tmp_tksphienthai AUTO_INCREMENT=1;");
        $count = $this->num_rows();
        $i = 0;
        $dataxuat = $this->TinhSLSPXuat();
        $dataton = $this->TinhPhatSinhTonSPDKTuTK();
        while ($data = $this->fetch()) {
            $mavt = $data['mavt'];

            {
                $soluongxuatthang1 = (float)$dataxuat[1][$mavt]['soluong'];
                $soluongxuatthang2 = (float)$dataxuat[2][$mavt]['soluong'];
                $soluongxuatthang3 = (float)$dataxuat[3][$mavt]['soluong'];
                $soluongxuatthang4 = (float)$dataxuat[4][$mavt]['soluong'];
                $soluongxuatthang5 = (float)$dataxuat[5][$mavt]['soluong'];
                $soluongxuatthang6 = (float)$dataxuat[6][$mavt]['soluong'];
                $soluongxuatthang7 = (float)$dataxuat[7][$mavt]['soluong'];
                $soluongxuatthang8 = (float)$dataxuat[8][$mavt]['soluong'];
                $soluongxuatthang9 = (float)$dataxuat[9][$mavt]['soluong'];
                $soluongxuatthang10 = (float)$dataxuat[10][$mavt]['soluong'];
                $soluongxuatthang11 = (float)$dataxuat[11][$mavt]['soluong'];
                $soluongxuatthang12 = (float)$dataxuat[12][$mavt]['soluong'];
            }

            $thang1 = $dataton[$mavt]['thang1'] - $soluongxuatthang1;
            $thang2 = $dataton[$mavt]['thang2'] - $soluongxuatthang2;
            $thang3 = $dataton[$mavt]['thang3'] - $soluongxuatthang3;
            $thang4 = $dataton[$mavt]['thang4'] - $soluongxuatthang4;
            $thang5 = $dataton[$mavt]['thang5'] - $soluongxuatthang5;
            $thang6 = $dataton[$mavt]['thang6'] - $soluongxuatthang6;
            $thang7 = $dataton[$mavt]['thang7'] - $soluongxuatthang7;
            $thang8 = $dataton[$mavt]['thang8'] - $soluongxuatthang8;
            $thang9 = $dataton[$mavt]['thang9'] - $soluongxuatthang9;
            $thang10 = $dataton[$mavt]['thang10'] - $soluongxuatthang10;
            $thang11 = $dataton[$mavt]['thang11'] - $soluongxuatthang11;
            $thang12 = $dataton[$mavt]['thang12'] - $soluongxuatthang12;


            $i++;
            $data['STT'] = $i;

            $value .= "('" . $data['mavt'] . "','" . $thang1 . "','" . $thang2 . "','" . $thang3 . "','" . $thang4 . "','" . $thang5 . "','" . $thang6 . "','" . $thang7 . "','" . $thang8 . "','" . $thang9 . "','" . $thang10 . "','" . $thang11 . "','" . $thang12 . "'),";
            $trees[] = $data;
        }
        $sql_ins = "insert into tmp_tksphienthai(mavt,thang1,thang2,thang3,thang4,thang5,thang6,thang7,thang8,thang9,thang10,thang11,thang12) VALUE ".substr($value,0,-1);
        $this->query($sql_ins);
        return $trees;
    }

    function ThemSLDMNVLHienTai()
    {// Lấy danh sách nhập vật tư trong tồn kho
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = " and " . $this->get_orderby();
        $sql = "SELECT masp FROM masp WHERE loaisp='CT'  order by masp ";
        $this->query($sql);
        $sql_emp = "delete from tmp_tknvlhienthai";
        $this->re_query($sql_emp);
        $this->re_query("ALTER TABLE tmp_tknvlhienthai AUTO_INCREMENT=1;");
        $count = $this->num_rows();
        $i = 0;
        $datamavt = $this->loaddsmavt();
        $dataxuat = $this->TinhSLNVLXuat();
        $dataton = $this->TinhPhatSinhTonNVLDKTuTK();


        while ($data = $this->fetch()) {
            $i++;
            $masp = $data['masp'];
            $ton = 0;
            $soluongxuat = 0;
            foreach ($datamavt as $kmavt => $itemmvt) {
                $soluongxuat = (float)$dataxuat[$masp][$kmavt]['soluong'];
                $ton = $dataton[$masp][$kmavt]['soluong'] - $soluongxuat;

                $data['STT'] = $i;
                $value .= "('" . $kmavt . "','" . $ton . "','" . $masp . "'),";
            }


            $trees[] = $data;
        }
        $sql_ins = "insert into tmp_tknvlhienthai(mavt,soluong,mact) VALUE " . substr($value, 0, -1);
        $this->re_query($sql_ins);
        return $trees;
    }

    function loaddsmavt()
    {// Tính phát sinh nhập trong khoản thời gian nhất định
        $sql = "SELECT mavt FROM mavt ";// Tồn đầu kỳ
        $query = $this->re_query($sql);
        if ($this->num_rows() == 0) {
            return 0;
        } else {
            while ($data = $this->re_fetch($query)) {
                $row[$data['mavt']] = $data;
            }
            return $row;
        }
    }

    function CapNhatSLTonSPHT($mavt, $thang1, $thang2, $thang3, $thang4, $thang5, $thang6, $thang7, $thang8, $thang9, $thang10, $thang11, $thang12)
    {
        $sql = "update tmp_tksphienthai set thang1 = '" . $thang1 . "',thang2 = '" . $thang2 . "',thang3 = '" . $thang3 . "',thang4 = '" . $thang4 . "',thang5 = '" . $thang5 . "',thang6 = '" . $thang6 . "',thang7 = '" . $thang7 . "',thang8 = '" . $thang8 . "',thang9 = '" . $thang9 . "',thang10 = '" . $thang10 . "',thang11 = '" . $thang11 . "',thang12 = '" . $thang12 . "' where mavt ='" . $mavt . "'";// Tồn đầu kỳ
        $this->re_query($sql);
    }

    function TinhPhatSinhTonSPDKTuTK()
    {// Tính phát sinh nhập trong khoản thời gian nhất định
        $sql = "SELECT * FROM bangdutruvlsxdk ";// Tồn đầu kỳ
        $query = $this->re_query($sql);
        if ($this->num_rows() == 0) {
            return 0;
        } else {
            while ($data = $this->re_fetch($query)) {
                $row[$data['mavt']] = $data;
            }
            return $row;
        }
    }

    function TinhPhatSinhTonNVLDKTuTK()
    {// Tính phát sinh nhập trong khoản thời gian nhất định
        $sql = "SELECT * FROM chitiet_dinhmuc_ct_vl ";// Tồn đầu kỳ
        $query = $this->re_query($sql);
        if ($this->num_rows() == 0) {
            return 0;
        } else {
            while ($data = $this->re_fetch($query)) {
                $row[$data['masp']][$data['mavt']] = $data;
            }
            return $row;
        }
    }

    function TinhSLSPXuat()
    {// Tính phát sinh nhập trong khoản thời gian nhất định
        $sql = "select sum(soluongnhap) as soluong,chitiet_psvt.mavt,MONTH(ngayghiso) as thang from psvt INNER join chitiet_psvt on (psvt.sophieu=chitiet_psvt.sophieu) where loaiphieu in ('3') and loaisp = 'SP' group by MONTH(ngayghiso),chitiet_psvt.mavt";// Nhập hàng trông tháng
        $query = $this->re_query($sql);
        if ($this->re_num_rows($query) == 0) {
            return 0;
        } else {
            while ($data = $this->re_fetch($query)) {
                $row[$data['thang']][$data['mavt']] = $data;
            }
            return $row;
        }
    }

    function TinhSLNVLXuat()
    {// Tính phát sinh nhập trong khoản thời gian nhất định
        $sql = "select mact as mabp,mavt,sum(soluongthucxuat) as soluong from (select sum(soluongnhap) as soluongthucxuat,chitiet_psvt.mavt,psvt.makho as mact from psvt INNER join chitiet_psvt on (psvt.sophieu=chitiet_psvt.sophieu) where loaiphieu in ('3') and loaisp='CT' group by psvt.makho,chitiet_psvt.mavt
              UNION ALL 
                select sum(soluong) as soluongthucxuat,mavt,mabp as mact from ct_nhapvattu_ct INNER join chitiet_pskt on (ct_nhapvattu_ct.sophieu=chitiet_pskt.sophieu) where loaiphieu in ('2','4') and loaisp='CT' group by mabp,ct_nhapvattu_ct.mavt) f group by f.mact,f.mavt";// Nhập hàng trông tháng
        $query = $this->re_query($sql);
        $sql_emp = "delete from tmp_tknvlhienthai_xuat";
        $this->re_query($sql_emp);
        $this->re_query("ALTER TABLE tmp_tknvlhienthai_xuat AUTO_INCREMENT=1;");
        $value="";
        if ($this->re_num_rows($query) == 0) {
            return 0;
        } else {
            while ($data = $this->re_fetch($query)) {
                $row[$data['mabp']][$data['mavt']] = $data;
                $value .= "('" . $data['mavt'] . "','" . $data['soluong'] . "','" . $data['mabp'] . "'),";
            }
            $sql_ins = "insert into tmp_tknvlhienthai_xuat(mavt,soluong,mact) VALUE " . substr($value, 0, -1);
            $this->re_query($sql_ins);
            return $row;
        }
    }

    //----------------------------------------------------------------------------------------------
    function loaddanhsachbangdutruvadanhsachnhapvlsx($thang,$LoaiSP)
    {
        $colthang = "thang" . $thang;
        $datapsxuat = $this->TinhSLSPXuatThucTe($thang,$LoaiSP);

        if($thang==13){
            $sql = "select mavt.mavt,mavt.tenvt,mavt.dvt,(thang1+thang2+thang3+thang4+thang5+thang6+thang7+thang8+thang9+thang10+thang11+thang12) as soluongdutru,b1.masp from bangdutruvlsxdk_masp b1 INNER JOIN mavt on (b1.mavt = mavt.mavt)";// Nhập hàng trông tháng
        }else{
            $sql = "select mavt.mavt,mavt.tenvt,mavt.dvt,thang{$thang} as soluongdutru,b1.masp from bangdutruvlsxdk_masp b1 INNER JOIN mavt on (b1.mavt = mavt.mavt)";// Nhập hàng trông tháng
        }

        $query = $this->re_query($sql);
        if ($this->re_num_rows($query) == 0) {
            return 0;
        } else {
            while ($data = $this->re_fetch($query)) {// Lấy những mavt không có trong định mức khi xuất
                $data['soluongthucxuat'] = $datapsxuat[$data['masp']][$data['mavt']]['soluongthucxuat'];
                $data['dongia'] = $datapsxuat[$data['masp']][$data['mavt']]['dongia'];
                $row[$data['masp']][$data['mavt']] = $data;
                unset($datapsxuat[$data['masp']][$data['mavt']]);
            }
            foreach ($datapsxuat as $KMaSP=>$itemCTSP){
                foreach ($itemCTSP as $KMaVT=>$itemCTXuat){
                    $data1['mavt'] =$itemCTXuat['mavt'];
                    $data1['tenvt'] =$itemCTXuat['tenvt'];
                    $data1['dvt'] =$itemCTXuat['dvt'];
                    $data1['soluongthucxuat'] = $itemCTXuat['soluongthucxuat'];
                    $data1['dongia'] = $itemCTXuat['dongia'];
                    $data1['soluongdutru'] = 0;
                    $row[$KMaSP][$itemCTXuat['mavt']] = $data1;
                }
            }
            return $row;
        }
    }

    function loaddanhsachbangdutruvadanhsachnhapvlct($LoaiSP,$TuNgay,$DenNgay,$LocTheoLoai)
    {
        $datapsxuat = $this->TinhSLCTXuatThucTe($LoaiSP,$TuNgay,$DenNgay,$LocTheoLoai);
        $datanvlct_dk = $this->TinhSLCTXuatThucTe_DK();

        $sql = "select masp,mavt.mavt,mavt.tenvt,mavt.dvt,sum(soluong) as soluong,sum(thanhtien) as thanhtien from chitiet_dinhmuc_ct_vl b1 INNER JOIN mavt on (b1.mavt = mavt.mavt) group by masp,b1.mavt";// Nhập hàng trông tháng

        $query = $this->re_query($sql);
        if ($this->re_num_rows($query) == 0) {
            return 0;
        } else {
            while ($data = $this->re_fetch($query)) {
                $SLXuatDK = $datanvlct_dk[$data['masp']][$data['mavt']]['soluong'];
                $data['soluongthucxuat'] = $datapsxuat[$data['masp']][$data['mavt']]['soluongthucxuat']+$SLXuatDK;
                $data['thanhtienxuat'] = $datapsxuat[$data['masp']][$data['mavt']]['thanhtien'];
                $row[$data['masp']][$data['mavt']] = $data;
                unset($datapsxuat[$data['masp']][$data['mavt']]);
            }
            foreach ($datapsxuat as $KCT=>$iTemCT){
                foreach ($iTemCT as $KMaVT=>$itemCTXuat){

                    $SLXuatDK = $datanvlct_dk[$itemCTXuat['mact']][$itemCTXuat['mavt']]['soluong'];

                    $data1['masp'] =$itemCTXuat['mact'];
                    $data1['mavt'] =$itemCTXuat['mavt'];
                    $data1['tenvt'] =$itemCTXuat['tenvt'];
                    $data1['dvt'] =$itemCTXuat['dvt'];
                    $data1['soluongthucxuat'] = $itemCTXuat['soluongthucxuat']+$SLXuatDK;
                    $data1['thanhtienxuat'] = $itemCTXuat['thanhtien'];
                    $data1['soluong'] = 0;
                    $data1['thanhtien'] = 0;
                    $row[$itemCTXuat['mact']][$itemCTXuat['mavt']] = $data1;
                }
            }
            return $row;
        }
    }

    //---------------------------------------------------------------------------------------------

    function TinhSLSPXuatThucTe($thang,$LoaiSP)
    {// Tính phát sinh nhập trong khoản thời gian nhất định
        if($thang==13){
            $sql = "select sum(soluongnhap) as soluongthucxuat,avg(donggianhap) as dongia,chitiet_psvt.mavt,MONTH(ngayghiso) as thang,tenvt,dvt,psvt.makho as mabp from psvt INNER join chitiet_psvt on (psvt.sophieu=chitiet_psvt.sophieu) where loaiphieu in ('3') and loaisp='{$LoaiSP}' group by psvt.makho,chitiet_psvt.mavt";// Nhập hàng trông tháng
        }else{
            $sql = "select sum(soluongnhap) as soluongthucxuat,avg(donggianhap) as dongia,chitiet_psvt.mavt,MONTH(ngayghiso) as thang,tenvt,dvt,psvt.makho as mabp from psvt INNER join chitiet_psvt on (psvt.sophieu=chitiet_psvt.sophieu) where loaiphieu in ('3') and MONTH(ngayghiso)='" . $thang . "' and loaisp='{$LoaiSP}' group by psvt.makho,chitiet_psvt.mavt";// Nhập hàng trông tháng
        }
        $query = $this->re_query($sql);
        if ($this->re_num_rows($query) == 0) {
            return 0;
        } else {
            while ($data = $this->re_fetch($query)) {
                $row[$data['mabp']][$data['mavt']] = $data;
            }
            return $row;
        }
    }

    function TinhSLCTXuatThucTe($LoaiSP,$TuNgay,$DenNgay,$LocTheoLoai)
    {// Tính phát sinh nhập trong khoản thời gian nhất định
        $sql = "select sum(soluongthucxuat) as soluongthucxuat,sum(thanhtien) as thanhtien,mavt,mact,tenvt,dvt from 
		(select chitiet_psvt.sott as sott,(soluongnhap) as soluongthucxuat,(thanhtien) as thanhtien,chitiet_psvt.mavt,psvt.makho as mact,tenvt,dvt,psvt.mapskt from psvt INNER join chitiet_psvt on (psvt.sophieu=chitiet_psvt.sophieu) INNER join dinhkhoan_psvt on (psvt.sophieu=dinhkhoan_psvt.sophieu) where dinhkhoan_psvt.tkno like '{$LocTheoLoai}%' and loaiphieu in ('3') and loaisp='{$LoaiSP}' and psvt.ngayghiso>='".$TuNgay."' and psvt.ngayghiso<='".$DenNgay."' 
              UNION
        select ct_nhapvattu_ct.sott as sott,(soluong) as soluongthucxuat,(ct_nhapvattu_ct.thanhtien) as thanhtien,mavt.mavt,ct_nhapvattu_ct.mact,tenvt,dvt,pskt.mapskt from ct_nhapvattu_ct INNER join chitiet_pskt on (ct_nhapvattu_ct.sophieu=chitiet_pskt.sophieu) inner join pskt on (pskt.sophieu=chitiet_pskt.sophieu) INNER join mavt on (mavt.mavt = ct_nhapvattu_ct.mavt) where ct_nhapvattu_ct.mact = chitiet_pskt.mabp and pskt.loaiphieu in ('2','4') and (chitiet_pskt.tkno1 like '{$LocTheoLoai}%' or chitiet_pskt.tkno2 like '{$LocTheoLoai}%') and chitiet_pskt.loaisp='{$LoaiSP}' and pskt.ngayghiso>='".$TuNgay."' and pskt.ngayghiso<='".$DenNgay."') f group by f.mact,f.mavt
                ";// Nhập hàng trông tháng
        $query = $this->re_query($sql);
        if ($this->re_num_rows($query) == 0) {
            return 0;
        } else {
            while ($data = $this->re_fetch($query)) {
                $row[$data['mact']][$data['mavt']] = $data;
            }
            return $row;
        }
    }
    function TinhSLCTXuatThucTe_DK()
    {// Tính phát sinh nhập trong khoản thời gian nhất định
        $sql = "select mavt,sum(soluong) as soluong,mact from tmp_tknvlhienthai_dk group by mact,mavt";// Nhập hàng trông tháng
        $query = $this->re_query($sql);
        if ($this->re_num_rows($query) == 0) {
            return 0;
        } else {
            while ($data = $this->re_fetch($query)) {
                $row[$data['mact']][$data['mavt']] = $data;
            }
            return $row;
        }
    }

    function loadDanhSachBangTKLP_VLSX($thang)
    {// Tính phát sinh nhập trong khoản thời gian nhất định
        $sql = "select * from bangtk_lp_vlsx where thang='" . $thang . "' order by masp,mavt";// Nhập hàng trông tháng
        $query = $this->re_query($sql);
        if ($this->re_num_rows($query) == 0) {
            return 0;
        } else {
            while ($data = $this->re_fetch($query)) {
                $row[$data['masp']][] = $data;
            }
            return $row;
        }
    }

    function loadDanhSachBangTKLP_VLCT($mact)
    {// Tính phát sinh nhập trong khoản thời gian nhất định
        $sql = "select bangtk_lp_vlct.*,tensp from bangtk_lp_vlct inner join masp on (bangtk_lp_vlct.mact = masp.masp) where mact in ('{$mact}') order by mavt";// Nhập hàng trông tháng
        $query = $this->re_query($sql);
        if ($this->re_num_rows($query) == 0) {
            return 0;
        } else {
            while ($data = $this->re_fetch($query)) {
                $row[$data['mact']]['tenct'] = $data['tensp'];
                $row[$data['mact']]['chitiet'][] = $data;
            }
            return $row;
        }
    }

    function TongNhanCongTieuChuan($DataDanhSachSPChaCon,$dataSoLuongXuatkhoThanhPham)
    {// Tính phát sinh nhập trong khoản thời gian nhất định
        foreach ($DataDanhSachSPChaCon as $k=>$Item){
            $tongsp = 0;
            $strmasp = str_replace(",","','",$Item);
            $sql = "select sum(thanhtien) as tongnctc,masp from banggiathanhtieuchuan where masp in('" . $strmasp . "') and mavt='NC-001' group by masp ";// Nhập hàng trông tháng
            $query = $this->re_query($sql);
            while ($data = $this->re_fetch($query)) {
                $tongsp+= ($data['tongnctc']*$dataSoLuongXuatkhoThanhPham[$data['masp']]);
            }
            $row[$k] = $tongsp;
        }
        return $row;
    }
    function LoadDSNhanCongTieuChuan()
    {// Tính phát sinh nhập trong khoản thời gian nhất định
        $sql = "select sum(thanhtien) as tongnctc,masp from banggiathanhtieuchuan where  loaivl='NC' group by masp";// Nhập hàng trông tháng
        $query = $this->re_query($sql);{
        while ($data = $this->re_fetch($query)) {
            $row[$data['masp']] = $data['tongnctc'];
        }
    }
        return $row;
    }

    function LoadDSMayTieuChuan()
    {// Tính phát sinh nhập trong khoản thời gian nhất định
        $sql = "select sum(thanhtien) as tongnctc,masp from banggiathanhtieuchuan where  loaivl='CM' group by masp";// Nhập hàng trông tháng
        $query = $this->re_query($sql);{
        while ($data = $this->re_fetch($query)) {
            $row[$data['masp']] = $data['tongnctc'];
        }
    }
        return $row;
    }

    function LoadDSNguyenVatLieuTieuChuan()
    {// Tính phát sinh nhập trong khoản thời gian nhất định
        $sql = "select sum(thanhtien) as tongnctc,masp from banggiathanhtieuchuan where  loaivl='' group by masp ";// Nhập hàng trông tháng
        $query = $this->re_query($sql);{
        while ($data = $this->re_fetch($query)) {
            $row[$data['masp']] = $data['tongnctc'];
        }
    }
        return $row;
    }

    function LoadDSChiPhiSXCTieuChuan()
    {// Tính phát sinh nhập trong khoản thời gian nhất định
        $sql = "select sum(thanhtien) as tongnctc,masp from banggiathanhtieuchuan where  loaivl='SXC' group by masp ";// Nhập hàng trông tháng
        $query = $this->re_query($sql);{
        while ($data = $this->re_fetch($query)) {
            $row[$data['masp']] = $data['tongnctc'];
        }
    }
        return $row;
    }

    function DemDinhMuc()
    {// Tính phát sinh nhập trong khoản thời gian nhất định
        $sql = "select count(*) as dong,masp from chitiet_dinhmuc_sp group by masp ";// Nhập hàng trông tháng
        $query = $this->re_query($sql);{
        while ($data = $this->re_fetch($query)) {
            $row[$data['masp']] = $data['dong'];
        }
    }
        return $row;
    }

    function ListSoLuongXuatKhoThanhPham($tungay,$denngay)
    {// Tính phát sinh nhập trong khoản thời gian nhất định
        $sql = "SELECT mavt,sum(soluongnhap) as soluongnhap FROM chitiet_psvt INNER JOIN psvt on (psvt.sophieu = chitiet_psvt.sophieu ) WHERE ngayghiso>='{$tungay}' and ngayghiso<='{$denngay}' and loaiphieu='2' GROUP BY mavt";// Nhập hàng trông tháng
        $query = $this->re_query($sql);
        while ($data = $this->re_fetch($query)) {
            $row[$data['mavt']] = $data['soluongnhap'];
        }
        return $row;
    }

    function ListSoLuongDuTruSanPham($tungay,$denngay)
    {// Tính phát sinh nhập trong khoản thời gian nhất định
        $mtungay = date("m",strtotime($tungay));
        $mdenngay = date("m",strtotime($denngay));
        $str = "";
        for($i=$mtungay;$i<=$mdenngay;$i++){
            $str.="thang".(int)$i."+";
        }
        $thang = substr($str,0,-1);
        $sql = "SELECT masp,$thang as soluongnhap FROM soluonghanghoaxuatkhau GROUP BY masp";// Nhập hàng trông tháng
        $query = $this->re_query($sql);
        while ($data = $this->re_fetch($query)) {
            $row[$data['masp']] = $data['soluongnhap'];
        }
        return $row;
    }

    function ListToKhaiQuyetToanThueTNCN()
    {// Tính phát sinh nhập trong khoản thời gian nhất định
        $sql = "SELECT bangluongnhanvien.*,sum(bangluongnhanvien.luongcb) as tongluongcb,sum(bangluongnhanvien.tienangiuaca) as tongtienangiuaca,sum(bangluongnhanvien.phucapkhongdungbhxh) as tongphucapkhongdungbhxh,sum(bangluongnhanvien.baohiem+bangluongnhanvien.baohiemyt+bangluongnhanvien.baohiemtn) as tongbaohiem,sum(bangluongnhanvien.thuethunhap) as tongthuethunhap,sum(bangluongnhanvien.phucapchucvu) as tongphucapchucvu,masothue,giamtrugiacanh FROM bangluongnhanvien INNER JOIN  manhanvien on (bangluongnhanvien.manv = manhanvien.manhanvien) GROUP BY bangluongnhanvien.manv ORDER BY manhanvien.sapxep";// Nhập hàng trông tháng
        $query = $this->re_query($sql);
        while ($data = $this->re_fetch($query)) {
            $row[] = $data;
        }
        return $row;
    }

    function loadListMaCT_DuThua($parentid = 0, $printto = 10)
    {
        //$cb_loaitk = $this->get_Cb_LoaiTK();
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = $this->get_orderby() . " and ";
        $sql = "SELECT *,(select count(*) from bangtonghop_danhthu_chiphi_giathanhct WHERE masp.masp = bangtonghop_danhthu_chiphi_giathanhct.mact  and loaisp='CT' GROUP BY mact HAVING SUM(dodangdk)!=0 or SUM(dodangdk)!=sum(dodangck)) as choxoa FROM masp  WHERE $sql_w maspcha = '$parentid' and loaisp='CT' and niendo='".($_SESSION['NienDo']-1)."'  order by masp";
        $this->query($sql);
        $i = 0;
        while ($data = $this->fetch()) {
            $i++;
            $data['STT'] = $i;
            if($data['masp']!='0001'){
                $trees[] = $data;
            }
            $sql1 = "SELECT *,(select count(*) from bangtonghop_danhthu_chiphi_giathanhct WHERE masp.masp = bangtonghop_danhthu_chiphi_giathanhct.mact  and loaisp='CT' GROUP BY mact HAVING SUM(dodangdk)!=0 or SUM(dodangdk)!=sum(dodangck)) as choxoa FROM masp WHERE $sql_w maspcha ='" . $data['masp'] . "' and niendo='".($_SESSION['NienDo']-1)."' order by masp ";
            $query = $this->re_query($sql1);
            while ($data1 = $this->re_fetch($query)) {
                if ($printto == 1) {
                    break;
                }
                $i++;
                $data1['STT'] = $i;
                $data1['tensp'] = "&nbsp;&nbsp;&nbsp;&nbsp;".$data1['tensp'];
                $trees[] = $data1;
                $sql2 = "SELECT *,(select count(*) from bangtonghop_danhthu_chiphi_giathanhct WHERE masp.masp = bangtonghop_danhthu_chiphi_giathanhct.mact  and loaisp='CT' GROUP BY mact HAVING SUM(dodangdk)!=0 or SUM(dodangdk)!=sum(dodangck)) as choxoa FROM masp WHERE $sql_w maspcha ='" . $data1['masp'] . "' and niendo='".($_SESSION['NienDo']-1)."' order by masp ";
                $query1 = $this->re_query($sql2);
                while ($data2 = $this->re_fetch($query1)) {
                    if ($printto == 2) {
                        break;
                    }
                    $i++;
                    $data2['STT'] = $i;
                    $data2['tensp'] = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$data2['tensp'];
                    $trees[] = $data2;
                    $sql3 = "SELECT * FROM masp WHERE $sql_w maspcha ='" . $data2['masp'] . "' order by masp ";
                    $query3 = $this->re_query($sql3);
                    while ($data3 = $this->re_fetch($query3)) {
                        if ($printto == 3) {
                            break;
                        }
                        $i++;
                        $data3['STT'] = $i;
                        $data3['tensp'] = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$data3['tensp'];
                        $trees[] = $data3;
                    }
                }
            }
        }
        return $trees;
    }

    public function xoaMaCT_DuThua($MaSP)
    {
        $sql = "delete from masp where masp in ('" . $MaSP . "')";
        $this->query($sql);
    }
}

?>
