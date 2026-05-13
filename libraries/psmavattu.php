<?php

class psmavattu extends database
{
    public $table = "psvt";
    public $tringorder;
    public $tringorder1;

    /**
     * @return mixed
     */
    public function getTringorder1()
    {
        return $this->tringorder1;
    }

    /**
     * @param mixed $tringorder1
     */
    public function setTringorder1($tringorder1)
    {
        $this->tringorder1 = $tringorder1;
    }

    public $MaVT;
    public $MaVTCha;
    public $NhapVaoKho;

    public $DonGiaMT;
    public $ThanhTienMT;
    public $CoChungTuGoc;
    public $ChiPhiKhongLoaiTru;
    public $LoaiToKhai;
    public $LoaiSP;

    public $SoTienNT1;
    public $SoTienNT2;
    public $SoTienNT3;
    public $SoTienNT4;

    public $TongTienNT;

    public $MaSoBiMat;
    public $LoaiHDDT;
    public $LoaiHangHoaDichVu;
    public $TenCaNhan;
    public $LaCongTrinh;
    public $DuAnDauTu;
    public $ChiNhanhCongTy;

    /**
     * @return mixed
     */
    public function getChiNhanhCongTy()
    {
        return $this->ChiNhanhCongTy;
    }

    /**
     * @param mixed $ChiNhanhCongTy
     */
    public function setChiNhanhCongTy($ChiNhanhCongTy)
    {
        $this->ChiNhanhCongTy = $ChiNhanhCongTy;
    }

    /**
     * @return mixed
     */
    public function getDuAnDauTu()
    {
        return $this->DuAnDauTu;
    }

    /**
     * @param mixed $DuAnDauTu
     */
    public function setDuAnDauTu($DuAnDauTu)
    {
        $this->DuAnDauTu = $DuAnDauTu;
    }

    /**
     * @return mixed
     */
    public function getLaCongTrinh()
    {
        return $this->LaCongTrinh;
    }

    /**
     * @param mixed $LaCongTrinh
     */
    public function setLaCongTrinh($LaCongTrinh)
    {
        $this->LaCongTrinh = $LaCongTrinh;
    }

    /**
     * @return mixed
     */
    public function getTenCaNhan()
    {
        return $this->TenCaNhan;
    }

    /**
     * @param mixed $TenCaNhan
     */
    public function setTenCaNhan($TenCaNhan)
    {
        $this->TenCaNhan = $TenCaNhan;
    }

    /**
     * @return mixed
     */
    public function getLoaiHangHoaDichVu()
    {
        return $this->LoaiHangHoaDichVu;
    }

    /**
     * @param mixed $LoaiHangHoaDichVu
     */
    public function setLoaiHangHoaDichVu($LoaiHangHoaDichVu)
    {
        $this->LoaiHangHoaDichVu = $LoaiHangHoaDichVu;
    }

    /**
     * @return mixed
     */
    public function getMaSoBiMat()
    {
        return $this->MaSoBiMat;
    }

    /**
     * @param mixed $MaSoBiMat
     */
    public function setMaSoBiMat($MaSoBiMat)
    {
        $this->MaSoBiMat = $MaSoBiMat;
    }

    /**
     * @return mixed
     */
    public function getLoaiHDDT()
    {
        return $this->LoaiHDDT;
    }

    /**
     * @param mixed $LoaiHDDT
     */
    public function setLoaiHDDT($LoaiHDDT)
    {
        $this->LoaiHDDT = $LoaiHDDT;
    }

    /**
     * @return mixed
     */

    /**
     * @return mixed
     */
    public function getSoTienNT1()
    {
        return $this->SoTienNT1;
    }

    /**
     * @param mixed $SoTienNT1
     */
    public function setSoTienNT1($SoTienNT1)
    {
        $this->SoTienNT1 = $SoTienNT1;
    }

    /**
     * @return mixed
     */
    public function getSoTienNT2()
    {
        return $this->SoTienNT2;
    }

    /**
     * @param mixed $SoTienNT2
     */
    public function setSoTienNT2($SoTienNT2)
    {
        $this->SoTienNT2 = $SoTienNT2;
    }

    /**
     * @return mixed
     */
    public function getSoTienNT3()
    {
        return $this->SoTienNT3;
    }

    /**
     * @param mixed $SoTienNT3
     */
    public function setSoTienNT3($SoTienNT3)
    {
        $this->SoTienNT3 = $SoTienNT3;
    }

    /**
     * @return mixed
     */
    public function getSoTienNT4()
    {
        return $this->SoTienNT4;
    }

    /**
     * @param mixed $SoTienNT4
     */
    public function setSoTienNT4($SoTienNT4)
    {
        $this->SoTienNT4 = $SoTienNT4;
    }

    /**
     * @return mixed
     */
    public function getTongTienNT()
    {
        return $this->TongTienNT;
    }

    /**
     * @param mixed $TongTienNT
     */
    public function setTongTienNT($TongTienNT)
    {
        $this->TongTienNT = $TongTienNT;
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
    public function getLoaiToKhai()
    {
        return $this->LoaiToKhai;
    }

    /**
     * @param mixed $LoaiToKhai
     */
    public function setLoaiToKhai($LoaiToKhai)
    {
        $this->LoaiToKhai = $LoaiToKhai;
    }

    /**
     * @return mixed
     */
    public function getChiPhiKhongLoaiTru()
    {
        return $this->ChiPhiKhongLoaiTru;
    }

    /**
     * @param mixed $ChiPhiKhongLoaiTru
     */
    public function setChiPhiKhongLoaiTru($ChiPhiKhongLoaiTru)
    {
        $this->ChiPhiKhongLoaiTru = $ChiPhiKhongLoaiTru;
    }
    public $ChietKhauDoanhSo;

    /**
     * @return mixed
     */
    public function getChietKhauDoanhSo()
    {
        return $this->ChietKhauDoanhSo;
    }

    /**
     * @param mixed $ChietKhauDoanhSo
     */
    public function setChietKhauDoanhSo($ChietKhauDoanhSo)
    {
        $this->ChietKhauDoanhSo = $ChietKhauDoanhSo;
    }

    /**
     * @return mixed
     */
    public function getCoChungTuGoc()
    {
        return $this->CoChungTuGoc;
    }

    /**
     * @param mixed $CoChungTuGoc
     */
    public function setCoChungTuGoc($CoChungTuGoc)
    {
        $this->CoChungTuGoc = $CoChungTuGoc;
    }
    public $DaThem;

    /**
     * @return mixed
     */
    public function getDaThem()
    {
        return $this->DaThem;
    }

    /**
     * @param mixed $DaThem
     */
    public function setDaThem($DaThem)
    {
        $this->DaThem = $DaThem;
    }

    /**
     * @return mixed
     */
    public function getDonGiaMT()
    {
        return $this->DonGiaMT;
    }

    /**
     * @param mixed $DonGiaMT
     */
    public function setDonGiaMT($DonGiaMT)
    {
        $this->DonGiaMT = $DonGiaMT;
    }

    /**
     * @return mixed
     */
    public function getThanhTienMT()
    {
        return $this->ThanhTienMT;
    }

    /**
     * @param mixed $ThanhTienMT
     */
    public function setThanhTienMT($ThanhTienMT)
    {
        $this->ThanhTienMT = $ThanhTienMT;
    }

    /**
     * @return mixed
     */
    public function getNhapVaoKho()
    {
        return $this->NhapVaoKho;
    }

    /**
     * @param mixed $NhapVaoKho
     */
    public function setNhapVaoKho($NhapVaoKho)
    {
        $this->NhapVaoKho = $NhapVaoKho;
    }
    public $Seri;////
    public $Limit;

    public function getLimit()
    {
        return $this->Limit;
    }

    /**
     * @param mixed $mapskt
     */
    public function setLimit($Limit)
    {
        $this->Limit = $Limit;
    }
    public function getSeri()
    {
        return $this->Seri;
    }

    public function setSeri($Seri)
    {
        $this->Seri = $Seri;
    }

    public $SCT;

    public function getSCT()
    {
        return $this->SCT;
    }

    public function setSCT($SCT)
    {
        $this->SCT = $SCT;
    }

    public $TuNgay;

    public function getTuNgay()
    {
        return $this->TuNgay;
    }

    public function setTuNgay($TuNgay)
    {
        $this->TuNgay = $TuNgay;
    }

    public $DenNgay;

    public function getDenNgay()
    {
        return $this->DenNgay;
    }

    public function setDenNgay($DenNgay)
    {
        $this->DenNgay = $DenNgay;
    }

    public $XemChiTiet;

    public function getXemChiTiet()
    {
        return $this->XemChiTiet;
    }

    public function setXemChiTiet($XemChiTiet)
    {
        $this->XemChiTiet = $XemChiTiet;
    }

    public $NgayGhiSo;

    public $NgayHD;

    /**
     * @return mixed
     */
    public function getNgayGhiSo()
    {
        return $this->NgayGhiSo;
    }

    /**
     * @param mixed $NgayGhiSo
     */
    public function setNgayGhiSo($NgayGhiSo)
    {
        $this->NgayGhiSo = $NgayGhiSo;
    }

    /**
     * @return mixed
     */
    public function getNgayHD()
    {
        return $this->NgayHD;
    }

    /**
     * @param mixed $NgayHD
     */
    public function setNgayHD($NgayHD)
    {
        $this->NgayHD = $NgayHD;
    }

    public $NgayTT;

    /**
     * @return mixed
     */
    public function getNgayTT()
    {
        return $this->NgayTT;
    }

    /**
     * @param mixed $NgayTT
     */
    public function setNgayTT($NgayTT)
    {
        $this->NgayTT = $NgayTT;
    }

    public $LP;////

    /**
     * @return mixed
     */
    public function getLP()
    {
        return $this->LP;
    }

    /**
     * @param mixed $LP
     */
    public function setLP($LP)
    {
        $this->LP = $LP;
    }

    public $TenVT;
    public $TenKD;
    public $MaTK;

    public $MaTKNo;////

    /**
     * @return mixed
     */
    public function getMaTKNo()
    {
        return $this->MaTKNo;
    }

    /**
     * @param mixed $MaTKNo
     */
    public function setMaTKNo($MaTKNo)
    {
        $this->MaTKNo = $MaTKNo;
    }

    public $MaTKCo;////

    /**
     * @return mixed
     */
    public function getMaTKCo()
    {
        return $this->MaTKCo;
    }

    /**
     * @param mixed $MaTKCo
     */
    public function setMaTKCo($MaTKCo)
    {
        $this->MaTKCo = $MaTKCo;
    }

    public $MaND;////

    /**
     * @param mixed $MaND
     */
    public function setMaND($MaND)
    {
        $this->MaND = $MaND;
    }

    /**
     * @return mixed
     */
    public function getMaND()
    {
        return $this->MaND;
    }

    public $TenND;////

    /**
     * @param mixed $TenND
     */
    public function setTenND($TenND)
    {
        $this->TenND = $TenND;
    }

    /**
     * @return mixed
     */
    public function getTenND()
    {
        return $this->TenND;
    }

    public $MaKH;////

    /**
     * @param mixed $MaKH
     */
    public function setMaKH($MaKH)
    {
        $this->MaKH = $MaKH;
    }

    /**
     * @return mixed
     */
    public function getMaKH()
    {
        return $this->MaKH;
    }

    public $MaKHNo;////

    /**
     * @param mixed $MaKHNo
     */
    public function setMaKHNo($MaKHNo)
    {
        $this->MaKHNo = $MaKHNo;
    }

    /**
     * @return mixed
     */
    public function getMaKHNo()
    {
        return $this->MaKHNo;
    }

    public $MaKHCo;////

    /**
     * @param mixed $MaKHCo
     */
    public function setMaKHCo($MaKHCo)
    {
        $this->MaKHCo = $MaKHCo;
    }

    /**
     * @return mixed
     */
    public function getMaKHCo()
    {
        return $this->MaKHCo;
    }

    public $MaSoThue;////

    /**
     * @param mixed $MaSoThue
     */
    public function setMaSoThue($MaSoThue)
    {
        $this->MaSoThue = $MaSoThue;
    }

    /**
     * @return mixed
     */
    public function getMaSoThue()
    {
        return $this->MaSoThue;
    }

    public $SL;

    /**
     * @param mixed $SL
     */
    public function setSL($SL)
    {
        $this->SL = $SL;
    }

    /**
     * @return mixed
     */
    public function getSL()
    {
        return $this->SL;
    }

    public $SLT;

    /**
     * @param mixed $SLT
     */
    public function setSLT($SLT)
    {
        $this->SLT = $SLT;
    }

    /**
     * @return mixed
     */
    public function getSLT()
    {
        return $this->SLT;
    }

    public $DgVND;

    /**
     * @param mixed $DgVND
     */
    public function setDgVND($DgVND)
    {
        $this->DgVND = $DgVND;
    }

    /**
     * @return mixed
     */
    public function getDgVND()
    {
        return $this->DgVND;
    }

    public $DgXKVND;

    /**
     * @param mixed $DgXKVND
     */
    public function setDgXKVND($DgXKVND)
    {
        $this->DgXKVND = $DgXKVND;
    }

    /**
     * @return mixed
     */
    public function getDgXKVND()
    {
        return $this->DgXKVND;
    }

    public $GTVND;// Giá trị việt nam đồng

    /**
     * @param mixed $GTVND
     */
    public function setGTVND($GTVND)
    {
        $this->GTVND = $GTVND;
    }

    /**
     * @return mixed
     */
    public function getGTVND()
    {
        return $this->GTVND;
    }

    public $GTXKVND;// Giá trị xuất khẩu việt nam đồng

    /**
     * @param mixed $GTXKVND
     */
    public function setGTXKVND($GTXKVND)
    {
        $this->GTXKVND = $GTXKVND;
    }

    /**
     * @return mixed
     */
    public function getGTXKVND()
    {
        return $this->GTXKVND;
    }

    public $GTXK;// Giá trị xuất khẩu

    /**
     * @param mixed $GTXK
     */
    public function setGTXK($GTXK)
    {
        $this->GTXK = $GTXK;
    }

    /**
     * @return mixed
     */
    public function getGTXK()
    {
        return $this->GTXK;
    }

    public $STVND;

    /**
     * @param mixed $STVND
     */
    public function setSTVND($STVND)
    {
        $this->STVND = $STVND;
    }

    /**
     * @return mixed
     */
    public function getSTVND()
    {
        return $this->STVND;
    }

    public $Prepaid;

    /**
     * @param mixed $Prepaid
     */
    public function setPrepaid($Prepaid)
    {
        $this->Prepaid = $Prepaid;
    }

    /**
     * @return mixed
     */
    public function getPrepaid()
    {
        return $this->Prepaid;
    }

    public $Debt;

    /**
     * @param mixed $Debt
     */
    public function setDebt($Debt)
    {
        $this->Debt = $Debt;
    }

    /**
     * @return mixed
     */
    public function getDebt()
    {
        return $this->Debt;
    }

    public $MaKho;

    /**
     * @param mixed $MaKho
     */
    public function setMaKho($MaKho)
    {
        $this->MaKho = $MaKho;
    }

    /**
     * @return mixed
     */
    public function getMaKho()
    {
        return $this->MaKho;
    }

    public $TenKho;

    /**
     * @param mixed $TenKho
     */
    public function setTenKho($TenKho)
    {
        $this->TenKho = $TenKho;
    }

    /**
     * @return mixed
     */
    public function getTenKho()
    {
        return $this->TenKho;
    }

    public $Comment;

    /**
     * @param mixed $Comment
     */
    public function setComment($Comment)
    {
        $this->Comment = $Comment;
    }

    /**
     * @return mixed
     */
    public function getComment()
    {
        return $this->Comment;
    }

    public $Payment;

    /**
     * @param mixed $Payment
     */
    public function setPayment($Payment)
    {
        $this->Payment = $Payment;
    }

    /**
     * @return mixed
     */
    public function getPayment()
    {
        return $this->Payment;
    }

    public $Rate;

    /**
     * @param mixed $Rate
     */
    public function setRate($Rate)
    {
        $this->Rate = $Rate;
    }

    /**
     * @return mixed
     */
    public function getRate()
    {
        return $this->Rate;
    }

    public $VAT;

    /**
     * @param mixed $VAT
     */
    public function setVAT($VAT)
    {
        $this->VAT = $VAT;
    }

    /**
     * @return mixed
     */
    public function getVAT()
    {
        return $this->VAT;
    }

    public $TTDB;

    /**
     * @param mixed $TTDB
     */
    public function setTTDB($TTDB)
    {
        $this->TTDB = $TTDB;
    }

    public $DVTBX;

    /**
     * @return mixed
     */
    public function getTTDB()
    {
        return $this->TTDB;
    }

    /**
     * @param mixed $DVTBX
     */
    public function setDVTBX($DVTBX)
    {
        $this->DVTBX = $DVTBX;
    }

    /**
     * @return mixed
     */
    public function getDVTBX()
    {
        return $this->DVTBX;
    }

    public $REF;

    /**
     * @param mixed $REF
     */
    public function setREF($REF)
    {
        $this->REF = $REF;
    }

    /**
     * @return mixed
     */
    public function getREF()
    {
        return $this->REF;
    }

    public $Other;

    /**
     * @param mixed $Other
     */
    public function setOther($Other)
    {
        $this->Other = $Other;
    }

    /**
     * @return mixed
     */
    public function getOther()
    {
        return $this->Other;
    }

    public $TenKH;

    /**
     * @param mixed $TenKH
     */
    public function setTenKH($TenKH)
    {
        $this->TenKH = $TenKH;
    }

    /**
     * @return mixed
     */
    public function getTenKH()
    {
        return $this->TenKH;
    }

    public $DiaChi;

    /**
     * @param mixed $DiaChi
     */
    public function setDiaChi($DiaChi)
    {
        $this->DiaChi = $DiaChi;
    }

    /**
     * @return mixed
     */
    public function getDiaChi()
    {
        return $this->DiaChi;
    }

    public $MaLoai;

    /**
     * @param mixed $MaLoai
     */
    public function setMaLoai($MaLoai)
    {
        $this->MaLoai = $MaLoai;
    }

    /**
     * @return mixed
     */
    public function getMaLoai()
    {
        return $this->MaLoai;
    }

    public $CLink;

    /**
     * @param mixed $CLink
     */
    public function setCLink($CLink)
    {
        $this->CLink = $CLink;
    }

    /**
     * @return mixed
     */
    public function getCLink()
    {
        return $this->CLink;
    }

    public $SoLe;

    /**
     * @param mixed $SoLe
     */
    public function setSoLe($SoLe)
    {
        $this->SoLe = $SoLe;
    }

    /**
     * @return mixed
     */
    public function getSoLe()
    {
        return $this->SoLe;
    }

    public $Way;

    /**
     * @param mixed $Way
     */
    public function setWay($Way)
    {
        $this->Way = $Way;
    }

    /**
     * @return mixed
     */
    public function getWay()
    {
        return $this->Way;
    }

    public $KHBX;

    /**
     * @param mixed $KHBX
     */
    public function setKHBX($KHBX)
    {
        $this->KHBX = $KHBX;
    }

    /**
     * @return mixed
     */
    public function getKHBX()
    {
        return $this->KHBX;
    }

    public $TenVTBX;

    /**
     * @param mixed $TenVTBX
     */
    public function setTenVTBX($TenVTBX)
    {
        $this->TenVTBX = $TenVTBX;
    }

    /**
     * @return mixed
     */
    public function getTenVTBX()
    {
        return $this->TenVTBX;
    }


    public $ToBX;

    /**
     * @param mixed $ToBX
     */
    public function setToBX($ToBX)
    {
        $this->ToBX = $ToBX;
    }

    /**
     * @return mixed
     */
    public function getToBX()
    {
        return $this->ToBX;
    }

    public $BX;

    /**
     * @param mixed $BX
     */
    public function setBX($BX)
    {
        $this->BX = $BX;
    }

    /**
     * @return mixed
     */
    public function getBX()
    {
        return $this->BX;
    }

    public $SLBX;

    /**
     * @param mixed $SLBX
     */
    public function setSLBX($SLBX)
    {
        $this->SLBX = $SLBX;
    }

    /**
     * @return mixed
     */
    public function getSLBX()
    {
        return $this->SLBX;
    }

    public $DGBX;

    /**
     * @param mixed $DGBX
     */
    public function setDGBX($DGBX)
    {
        $this->DGBX = $DGBX;
    }

    /**
     * @return mixed
     */
    public function getDGBX()
    {
        return $this->DGBX;
    }

    public $TCTM;

    /**
     * @param mixed $TCTM
     */
    public function setTCTM($TCTM)
    {
        $this->TCTM = $TCTM;
    }

    /**
     * @return mixed
     */
    public function getTCTM()
    {
        return $this->TCTM;
    }

    public $Sort;

    /**
     * @param mixed $Sort
     */
    public function setSort($Sort)
    {
        $this->Sort = $Sort;
    }

    /**
     * @return mixed
     */
    public function getSort()
    {
        return $this->Sort;
    }

    public $TLCK;

    /**
     * @param mixed $TLCK
     */
    public function setTLCK($TLCK)
    {
        $this->TLCK = $TLCK;
    }

    /**
     * @return mixed
     */
    public function getTLCK()
    {
        return $this->TLCK;
    }

    public $STCK;

    /**
     * @param mixed $STCK
     */
    public function setSTCK($STCK)
    {
        $this->STCK = $STCK;
    }

    /**
     * @return mixed
     */
    public function getSTCK()
    {
        return $this->STCK;
    }

    public $SoGiay;

    /**
     * @param mixed $SoGiay
     */
    public function setSoGiay($SoGiay)
    {
        $this->SoGiay = $SoGiay;
    }

    /**
     * @return mixed
     */
    public function getSoGiay()
    {
        return $this->SoGiay;
    }

    public $MauSo;

    /**
     * @param mixed $MauSo
     */
    public function setMauSo($MauSo)
    {
        $this->MauSo = $MauSo;
    }

    /**
     * @return mixed
     */
    public function getMauSo()
    {
        return $this->MauSo;
    }

    public $LoaiCT;

    /**
     * @param mixed $LoaiCT
     */
    public function setLoaiCT($LoaiCT)
    {
        $this->LoaiCT = $LoaiCT;
    }

    /**
     * @return mixed
     */
    public function getLoaiCT()
    {
        return $this->LoaiCT;
    }

    public $MaNhom;
    public $TenNhom;

    public $QuyCach;
    public $DVT;
    public $DVTP;
    public $KL;
    public $KT;
    public $Min;
    public $Max;

    public $Muc;

    public $GiaBan;
    public $GiaBanSi;

    public $GiaMua;
    public $Rate1;// Thuế Suất
    public $Mark;// Thu? su?t
    public $CongVao;// Thu? su?t
    public $TruRa;// Thu? su?t
    public $DP;// Thu? su?t
    public $Rank1;// Thu? su?t

    public $ChuThich;
    public $SoTT;

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

    public function set_MaVT($MaVT)
    {
        $this->MaVT = $MaVT;
    }

    public function get_MaVT()
    {
        return $this->MaVT;
    }

    public function set_MaVTCha($MaVTCha)
    {
        $this->MaVTCha = $MaVTCha;
    }

    public function get_MaVTCha()
    {
        return $this->MaVTCha;
    }

    public function set_TenVT($TenVT)
    {
        $this->TenVT = $TenVT;
    }

    public function get_TenVT()
    {
        return $this->TenVT;
    }

    public function set_TenKD($TenKD)
    {
        $this->TenKD = $TenKD;
    }

    public function get_TenKD()
    {
        return $this->TenKD;
    }

    public function set_MaTK($MaTK)
    {
        $this->MaTK = $MaTK;
    }

    public function get_MaTK()
    {
        return $this->MaTK;
    }

    public function set_MaNhom($MaNhom)
    {
        $this->MaNhom = $MaNhom;
    }

    public function get_MaNhom()
    {
        return $this->MaNhom;
    }

    public function set_TenNhom($TenNhom)
    {
        $this->TenNhom = $TenNhom;
    }

    public function get_TenNhom()
    {
        return $this->TenNhom;
    }

    public function set_DVT($DVT)
    {
        $this->DVT = $DVT;
    }

    public function get_DVT()
    {
        return $this->DVT;
    }

    public function set_DVTP($DVTP)
    {
        $this->DVTP = $DVTP;
    }

    public function get_DVTP()
    {
        return $this->DVTP;
    }

    public function set_KL($KL)
    {
        $this->KL = $KL;
    }

    public function get_KL()
    {
        return $this->KL;
    }

    public function set_KT($KT)
    {
        $this->KT = $KT;
    }

    public function get_KT()
    {
        return $this->KT;
    }

    public function set_Min($Min)
    {
        $this->Min = $Min;
    }

    public function get_Min()
    {
        return $this->Min;
    }

    public function set_Max($Max)
    {
        $this->Max = $Max;
    }

    public function get_Max()
    {
        return $this->Max;
    }

    public function set_Muc($Muc)
    {
        $this->Muc = $Muc;
    }

    public function get_Muc()
    {
        return $this->Muc;
    }

    public function set_GiaBan($GiaBan)
    {
        $this->GiaBan = $GiaBan;
    }

    public function get_GiaBan()
    {
        return $this->GiaBan;
    }

    public function set_GiaBanSi($GiaBanSi)
    {
        $this->GiaBanSi = $GiaBanSi;
    }

    public function get_GiaBanSi()
    {
        return $this->GiaBanSi;
    }

    public function set_GiaMua($GiaMua)
    {
        $this->GiaMua = $GiaMua;
    }

    public function get_GiaMua()
    {
        return $this->GiaMua;
    }

    public function set_Rate($Rate)
    {
        $this->Rate = $Rate;
    }

    public function get_Rate()
    {
        return $this->Rate;
    }

    public function set_Rank($Rank)
    {
        $this->Rate = $Rank;
    }

    public function get_Rank()
    {
        return $this->Rank;
    }

    public function set_Mark($Mark)
    {
        $this->Mark = $Mark;
    }

    public function get_Mark()
    {
        return $this->Mark;
    }

    public function set_CongVao($CongVao)
    {
        $this->CongVao = $CongVao;
    }

    public function get_CongVao()
    {
        return $this->CongVao;
    }

    public function set_TruRa($TruRa)
    {
        $this->TruRa = $TruRa;
    }

    public function get_TruRa()
    {
        return $this->TruRa;
    }

    public function set_DP($DP)
    {
        $this->DP = $DP;
    }

    public function get_DP()
    {
        return $this->DP;
    }

    public function set_QuyCach($QuyCach)
    {
        $this->QuyCach = $QuyCach;
    }

    public function get_QuyCach()
    {
        return $this->QuyCach;
    }

    public function set_ChuThich($ChuThich)
    {
        $this->ChuThich = $ChuThich;
    }

    public function get_ChuThich()
    {
        return $this->ChuThich;
    }

    public $MaBP;

    /**
     * @return mixed
     */
    public function getMaBP()
    {
        return $this->MaBP;
    }

    /**
     * @param mixed $MaBP
     */
    public function setMaBP($MaBP)
    {
        $this->MaBP = $MaBP;
    }

    public $TenBP;

    /**
     * @return mixed
     */
    public function getTenBP()
    {
        return $this->TenBP;
    }

    /**
     * @param mixed $TenBP
     */
    public function setTenBP($TenBP)
    {
        $this->TenBP = $TenBP;
    }

    public $MaTKNo1;

    /**
     * @return mixed
     */
    public function getMaTKNo1()
    {
        return $this->MaTKNo1;
    }

    /**
     * @param mixed $MaTKNo1
     */
    public function setMaTKNo1($MaTKNo1)
    {
        $this->MaTKNo1 = $MaTKNo1;
    }

    public $MaTKNo2;

    /**
     * @return mixed
     */
    public function getMaTKNo2()
    {
        return $this->MaTKNo2;
    }

    /**
     * @param mixed $MaTKNo2
     */
    public function setMaTKNo2($MaTKNo2)
    {
        $this->MaTKNo2 = $MaTKNo2;
    }

    public $MaTKCo1;

    /**
     * @return mixed
     */
    public function getMaTKCo1()
    {
        return $this->MaTKCo1;
    }

    /**
     * @param mixed $MaTKCo1
     */
    public function setMaTKCo1($MaTKCo1)
    {
        $this->MaTKCo1 = $MaTKCo1;
    }

    public $MaTKCo2;

    /**
     * @return mixed
     */
    public function getMaTKCo2()
    {
        return $this->MaTKCo2;
    }

    /**
     * @param mixed $MaTKCo2
     */
    public function setMaTKCo2($MaTKCo2)
    {
        $this->MaTKCo2 = $MaTKCo2;
    }

    public $SoTien1;

    /**
     * @return mixed
     */
    public function getSoTien1()
    {
        return $this->SoTien1;
    }

    /**
     * @param mixed $SoTien1
     */
    public function setSoTien1($SoTien1)
    {
        $this->SoTien1 = $SoTien1;
    }

    public $SoTien2;

    /**
     * @return mixed
     */
    public function getSoTien2()
    {
        return $this->SoTien2;
    }

    /**
     * @param mixed $SoTien2
     */
    public function setSoTien2($SoTien2)
    {
        $this->SoTien2 = $SoTien2;
    }

    public $MaPSKT;

    /**
     * @return mixed
     */
    public function getMaPSKT()
    {
        return $this->MaPSKT;
    }

    /**
     * @param mixed $MaPSKT
     */
    public function setMaPSKT($MaPSKT)
    {
        $this->MaPSKT = $MaPSKT;
    }

    public $SoPhieu;

    /**
     * @return mixed
     */
    public function getSoPhieu()
    {
        return $this->SoPhieu;
    }

    /**
     * @param mixed $SoPhieu
     */
    public function setSoPhieu($SoPhieu)
    {
        $this->SoPhieu = $SoPhieu;
    }

    public $CoThueGTGT;

    /**
     * @return mixed
     */
    public function getCoThueGTGT()
    {
        return $this->CoThueGTGT;
    }

    /**
     * @param mixed $CoThueGTGT
     */
    public function setCoThueGTGT($CoThueGTGT)
    {
        $this->CoThueGTGT = $CoThueGTGT;
    }
    public $CoChietKhau;

    /**
     * @return mixed
     */
    public function getCoChietKhau()
    {
        return $this->CoChietKhau;
    }

    /**
     * @param mixed $CoChietKhau
     */
    public function setCoChietKhau($CoChietKhau)
    {
        $this->CoChietKhau = $CoChietKhau;
    }
    public $CoBaoGomThue;

    /**
     * @return mixed
     */
    public function getCoBaoGomThue()
    {
        return $this->CoBaoGomThue;
    }

    /**
     * @param mixed $CoBaoGomThue
     */
    public function setCoBaoGomThue($CoBaoGomThue)
    {
        $this->CoBaoGomThue = $CoBaoGomThue;
    }
    public $TienHang;

    /**
     * @return mixed
     */
    public function getTienHang()
    {
        return $this->TienHang;
    }

    /**
     * @param mixed $TienHang
     */
    public function setTienHang($TienHang)
    {
        $this->TienHang = $TienHang;
    }

    public $TienThue;

    /**
     * @return mixed
     */
    public function getTienThue()
    {
        return $this->TienThue;
    }

    /**
     * @param mixed $TienThue
     */
    public function setTienThue($TienThue)
    {
        $this->TienThue = $TienThue;
    }
    public $TienChietKhau;

    /**
     * @return mixed
     */
    public function getTienChietKhau()
    {
        return $this->TienChietKhau;
    }

    /**
     * @param mixed $TienChietKhau
     */
    public function setTienChietKhau($TienChietKhau)
    {
        $this->TienChietKhau = $TienChietKhau;
    }

    public $TongCong;

    /**
     * @return mixed
     */
    public function getTongCong()
    {
        return $this->TongCong;
    }

    /**
     * @param mixed $TongCong
     */
    public function setTongCong($TongCong)
    {
        $this->TongCong = $TongCong;
    }
    public $MaTKNo3;

    /**
     * @return mixed
     */
    public function getMaTKNo3()
    {
        return $this->MaTKNo3;
    }

    /**
     * @param mixed $MaTKNo3
     */
    public function setMaTKNo3($MaTKNo3)
    {
        $this->MaTKNo3 = $MaTKNo3;
    }
    public $MaTKNo4;

    /**
     * @return mixed
     */
    public function getMaTKNo4()
    {
        return $this->MaTKNo4;
    }

    /**
     * @param mixed $MaTKNo4
     */
    public function setMaTKNo4($MaTKNo4)
    {
        $this->MaTKNo4 = $MaTKNo4;
    }
    public $MaTKCo3;

    /**
     * @return mixed
     */
    public function getMaTKCo3()
    {
        return $this->MaTKCo3;
    }

    /**
     * @param mixed $MaTKCo3
     */
    public function setMaTKCo3($MaTKCo3)
    {
        $this->MaTKCo3 = $MaTKCo3;
    }
    public $MaTKCo4;

    /**
     * @return mixed
     */
    public function getMaTKCo4()
    {
        return $this->MaTKCo4;
    }

    /**
     * @param mixed $MaTKCo4
     */
    public function setMaTKCo4($MaTKCo4)
    {
        $this->MaTKCo4 = $MaTKCo4;
    }
    public $SoTien3;

    /**
     * @return mixed
     */
    public function getSoTien3()
    {
        return $this->SoTien3;
    }

    /**
     * @param mixed $SoTien3
     */
    public function setSoTien3($SoTien3)
    {
        $this->SoTien3 = $SoTien3;
    }
    public $SoTien4;

    /**
     * @return mixed
     */
    public function getSoTien4()
    {
        return $this->SoTien4;
    }

    /**
     * @param mixed $SoTien4
     */
    public function setSoTien4($SoTien4)
    {
        $this->SoTien4 = $SoTien4;
    }
    public $Congayghiso;

    /**
     * @return mixed
     */
    public function getCoNgayKhaiThue()
    {
        return $this->CoNgayKhaiThue;
    }

    /**
     * @param mixed $CoNgayKhaiThue
     */
    public function setCoNgayKhaiThue($CoNgayKhaiThue)
    {
        $this->CoNgayKhaiThue = $CoNgayKhaiThue;
    }
    public $NgayKhaiThue;
    /**
     * @return mixed
     */
    public function getNgayKhaiThue()
    {
        return $this->NgayKhaiThue;
    }

    /**
     * @param mixed $NgayKhaiThue
     */
    public function setNgayKhaiThue($NgayKhaiThue)
    {
        $this->NgayKhaiThue = $NgayKhaiThue;
    }

    public function checkKeyTrung()
    {
        $sql = "select * from " . $this->table . " where mavt='" . $this->get_MaVT() . "' and sott!=" . $this->get_SoTT() . "";
        $this->query($sql);
        if ($this->num_rows() >= 1) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function checkSoHDTrung()
    {
        $sql = "select * from " . $this->table . " where so_hd='" . $this->get_SoHD() . "' and sott!=" . $this->get_SoTT() . "";
        $this->query($sql);
        if ($this->num_rows() >= 1) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function checkXoa()
    {
        $sql = "select * from " . $this->table . "  where mavt='" . $this->get_MaVT() . "'";
        $this->query($sql);
        if ($this->num_rows() >= 1) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function checkKeyChaTrung()
    {
        $sql = "select * from " . $this->table . " where mavt='" . $this->get_MaVTCha() . "'";
        $this->query($sql);
        if ($this->num_rows() >= 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function createSoTT()
    {
        $sql = "select max(sott) as sott from " . $this->table;
        $this->query($sql);
        if ($this->num_rows() == 1) {
            $data = $this->fetch();
            return $data['sott'] + 1;
        } else {
            return 1;
        }
    }

    public function createMa()
    {
        $sql = "select max(mapskt) as ma from " . $this->table;
        $this->query($sql);
        $data = $this->fetch();
        if ($data['ma'] != "") {
            return $data['ma'] + 1;
        } else {
            return 1;
        }
    }

    public function createMaPSKT()
    {
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = " and " . $this->get_orderby();

        $sql = "select max(CAST(SUBSTRING_INDEX(mapskt,'-',-1) as SIGNED)) as mapskt from " . $this->table . " where 0=0 $sql_w ";
        $this->query($sql);
        $data = $this->fetch();
        if ($data['mapskt'] != "") {
            return $data['mapskt'] + 1;
        } else {
            return 1;
        }
    }

    public function createSoPhieu()
    {
        $sql = "select SUBSTRING(max(sophieu), 3, 12) as sophieu from " . $this->table;
        $this->query($sql);
        $data = $this->fetch();
        $chieudai = strlen($data['sophieu']);
        if($chieudai<12){
            return "90".(time())."00";
        }else{
            return "90".($data['sophieu']+1);
        }
    }

    public function createSoPhieuTime()
    {
        $sub = rand(10,99);
        $ID = trim(trim($_SESSION['UserID']).time()).$sub;
        return (float)$ID;
    }

    function checkSoHD()
    {// Kiểm tra xem phiếu nhập kho có tòn tại chưa
        $sql = "select * from " . $this->table . " where mapskt ='" . $this->getMaPSKT() . "' and loaiphieu ='".$this->getLP()."'";
        $this->query($sql);
        if ($this->num_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function checkSoPhieuTonTai()
    {// Kiểm tra xem phiếu nhập kho có tòn tại chưa
        $sql = "select * from " . $this->table . " where sophieu='" . $this->getSoPhieu() . "'";
        $this->query($sql);
        if ($this->num_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function kiemTraTrungSoHoaDon()
    {// Kiểm tra xem phiếu nhập kho có tòn tại chưa
        $sql = "select sct,mapskt,ngayghiso,101 as loaiphieu from " . $this->table . " where loaiphieu='" . $this->getLP() . "' and CAST(sct AS SIGNED)='" . $this->getSCT()."' and sophieu!='" . $this->getSoPhieu()."' and makh='" . $this->getMaKH()."'
                union all
                select chitiet_pskt.sct,pskt.mapskt,ngayghiso,pskt.loaiphieu from pskt inner join chitiet_pskt on (pskt.sophieu = chitiet_pskt.sophieu) where pskt.loaiphieu in ('2','4') and CAST(chitiet_pskt.sct AS SIGNED) ='" . $this->getSCT() . "' and pskt.makh='" . $this->getMaKH() . "'";
        $this->query($sql);
        if ($this->num_rows() > 0) {
            return $this->fetch();
        } else {
            return FALSE;
        }
    }

    function kiemTraTrungSoHoaDon_Xuat()
    {// Kiểm tra xem phiếu nhập kho có tòn tại chưa
        $sql = "select sct,mapskt,ngayghiso,102 as loaiphieu from " . $this->table . " where seri='" . $this->getSeri() . "' and loaiphieu='" . $this->getLP() . "' and CAST(psvt.sct AS SIGNED) ='" . $this->getSCT()."' and sophieu!='" . $this->getSoPhieu()."'
                union all
                select chitiet_pskt.sct,pskt.mapskt,ngayghiso,pskt.loaiphieu from pskt inner join chitiet_pskt on (pskt.sophieu = chitiet_pskt.sophieu) where pskt.loaiphieu in ('1','3') and CAST(chitiet_pskt.sct AS SIGNED) ='" . $this->getSCT() . "' and chitiet_pskt.seri='" . $this->getSeri() . "'";
        $this->query($sql);
        if ($this->num_rows() > 0) {
            return $this->fetch();
        } else {
            return FALSE;
        }
    }
    function kiemTraTrungSoHoaDon_Vuot()
    {// Kiểm tra xem phiếu nhập kho có tòn tại chưa
        $sql = "select * from psvt INNER JOIN dinhkhoan_psvt on(psvt.sophieu = dinhkhoan_psvt.sophieu) where maloai in(1,2) and loaiphieu='" . $this->getLP() . "'  and ngayhoadon='" . $this->getNgayHD()."' and makh='" . $this->getMaKH()."' and dinhkhoan_psvt.tkco='" . $this->getMaTKCo()."' group by psvt.sophieu";
        $this->query($sql);
        if ($this->num_rows() > 0) {
            return $this->fetch_all();
        } else {
            return FALSE;
        }
    }

    function kiemTraTrungSoHoaDon_VuotXuat()
    {// Kiểm tra xem phiếu nhập kho có tòn tại chưa
        $sql = "select * from psvt INNER JOIN dinhkhoan_psvt on(psvt.sophieu = dinhkhoan_psvt.sophieu) where  loaiphieu='" . $this->getLP() . "'  and ngayhoadon='" . $this->getNgayHD()."' and makh='" . $this->getMaKH()."' and dinhkhoan_psvt.tkno='" . $this->getMaTKNo()."' group by psvt.sophieu";
        $this->query($sql);
        if ($this->num_rows() > 0) {
            return $this->fetch_all();
        } else {
            return FALSE;
        }
    }
    function LaySoHoaDonMax()
    {// Kiểm tra xem phiếu nhập kho có tòn tại chưa
        $sql = "
        SELECT max(CAST(SUBSTRING_INDEX(sct,'-',-1) as SIGNED)) as sct FROM (
            select max(CAST(SUBSTRING_INDEX(sct,'-',-1) as SIGNED)) as sct from psvt where loaiphieu='2' and seri='".$this->getSeri()."'
            union all
            select max(CAST(SUBSTRING_INDEX(sct,'-',-1) as SIGNED)) as sct from chitiet_pskt where loaiphieu in (1,3) and seri='".$this->getSeri()."') X
        ";
        $this->query($sql);
        $data = $this->fetch();
        return $data['sct'];
    }
    function LaySoHoaDonChiMax()
    {// Kiểm tra xem phiếu nhập kho có tòn tại chưa
        $sql = "
        SELECT max(CAST(SUBSTRING_INDEX(sct,'-',-1) as SIGNED)) as sct FROM (
            select max(CAST(SUBSTRING_INDEX(sct,'-',-1) as SIGNED)) as sct from psvt where loaiphieu='2' and seri='".$this->getSeri()."'
            union all
            select max(CAST(SUBSTRING_INDEX(sct,'-',-1) as SIGNED)) as sct from chitiet_pskt where loaiphieu in (1,3) and seri='".$this->getSeri()."') X
        ";
        $this->query($sql);
        $data = $this->fetch();
        return $data['sct'];
    }

    function loadListPSVT_W()
    {
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = " and " . $this->get_orderby();
        $sql = "SELECT * FROM " . $this->table . " WHERE 0=0 $sql_w  order by sott";
        $this->query($sql);
        $i = 0;
        while ($data = $this->fetch()) {
            $i++;
            $data['STT'] = $i;
            $trees[] = $data;
        }
        return $trees;
    }
    function loadListPSVT_IN()
    {
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = " and " . $this->get_orderby();
        $sql = "SELECT psvt.*,makho.tenkho,psvt.tenkho as tenct FROM psvt left JOIN makho on (psvt.kho= makho.makho) WHERE 0=0 $sql_w  order by CAST(SUBSTRING_INDEX(mapskt, '-', -1) as UNSIGNED)";
        $this->query($sql);
        $i = 0;
        while ($data = $this->fetch()) {
            $i++;
            $data['STT'] = $i;
            $trees[$data['mapskt']] = $data;
        }
        return $trees;
    }

    function LayThongTinTableDinhKhoan()
    {
        $trees = array();
        $sql = "SELECT * FROM dinhkhoan_psvt WHERE 0=0 and sophieu='".$this->getSoPhieu()."' order by sott";
        $this->query($sql);
        $i = 0;
        while ($data = $this->fetch()) {
            $i++;
            $trees[] = $data;
        }
        return $trees;
    }
    function LayThongTinTableDinhKhoan_IN()
    {
        $trees = array();
        $sql = "SELECT * FROM dinhkhoan_psvt WHERE 0=0 and sophieu in(".$this->getSoPhieu().") order by sott";
        $this->query($sql);
        $i = 0;
        while ($data = $this->fetch()) {
            $i++;
            $trees[$data['sophieu']][] = $data;
        }
        return $trees;
    }
    function loadListPSVT($parentid = 0)
    {
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = " and " . $this->get_orderby();
        $sql = "SELECT * FROM " . $this->table . " WHERE loaiphieu='" . $this->getLP() . "' $sql_w  order by cast(SUBSTRING_INDEX(mapskt, '-',-1) as unsigned) DESC,ngayghiso DESC ".$this->getLimit();
        $this->query($sql);
        $i = 0;
        while ($data = $this->fetch()) {
            $i++;
            $data['STT'] = $i;
            $trees[] = $data;
        }
        return $trees;
    }

    function loadList_KhongChungTuGoc()
    {
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "") {
            $sql_w = " and " . $this->get_orderby();
            $sql_w1 = " and " . $this->getTringorder1();
        }
        $sql = "SELECT sott,mapskt,loaiphieu,ngayghiso,seri,sct,makh,tenkh,diachi,masothue,noidung,tienhang,tienthue,tongcong,chuthich,1 as nhapxuat,0 as tentkco,chungtugoc FROM psvt WHERE chungtugoc=0 $sql_w
                UNION ALL 
                SELECT pskt.sott,pskt.mapskt,pskt.loaiphieu,pskt.ngayghiso,seri,sct,makh,tenkh,diachi,masothue,noidung1 as noidung,gtvnd1 as tienhang,gtvnd2 as tienthue,tongcong,chuthich,2 as nhapxuat,pskt.tentkco,chungtugoc from pskt inner join chitiet_pskt on(pskt.sophieu = chitiet_pskt.sophieu) WHERE chungtugoc=0 $sql_w1
 ";
        $this->query($sql);
        $i = 0;
        while ($data = $this->fetch()) {
            $i++;
            $data['STT'] = $i;
            $trees[] = $data;
        }
        return $trees;
    }

    function loadList_TatCaChungTu()
    {
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "") {
            $sql_w = " and " . $this->get_orderby();
            $sql_w1 = " and " . $this->getTringorder1();
        }
        $sql = "SELECT sott,mapskt,loaiphieu,ngayghiso,seri,sct,makh,tenkh,diachi,masothue,noidung,tienhang,tienthue,tongcong,chuthich,1 as nhapxuat,0 as tentkco FROM psvt WHERE 0=0 $sql_w
                UNION ALL 
                SELECT pskt.sott,pskt.mapskt,pskt.loaiphieu,pskt.ngayghiso,seri,sct,makh,tenkh,diachi,masothue,noidung1 as noidung,gtvnd1 as tienhang,gtvnd2 as tienthue,tongcong,chuthich,2 as nhapxuat,pskt.tentkco from pskt inner join chitiet_pskt on(pskt.sophieu = chitiet_pskt.sophieu) WHERE 0=0 $sql_w1
 ";
        $this->query($sql);
        $i = 0;
        while ($data = $this->fetch()) {
            $i++;
            $data['STT'] = $i;
            $trees[] = $data;
        }
        return $trees;
    }

    function loadList_CPKhongDuocTru()
    {
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "") {
            $sql_w = " and " . $this->get_orderby();
            $sql_w1 = " and " . $this->getTringorder1();
        }
        $sql = "SELECT sott,mapskt,loaiphieu,ngayghiso,seri,sct,makh,tenkh,diachi,masothue,noidung,tienhang,tienthue,tongcong,chuthich,1 as nhapxuat,0 as tentkco,chungtugoc,duyetcpduoctru,tiencpduocduyet FROM psvt WHERE chiphikhongloaitru=1 $sql_w
                UNION ALL 
                SELECT chitiet_pskt.sott,pskt.mapskt,pskt.loaiphieu,pskt.ngayghiso,seri,sct,makh,tenkh,diachi,masothue,noidung1 as noidung,gtvnd1 as tienhang,gtvnd2 as tienthue,tongcong,chuthich,2 as nhapxuat,pskt.tentkco,chungtugoc,duyetcpduoctru,tiencpduocduyet from pskt inner join chitiet_pskt on(pskt.sophieu = chitiet_pskt.sophieu) WHERE chiphikhongloaitru=1 $sql_w1
 ";
        $this->query($sql);
        $i = 0;
        while ($data = $this->fetch()) {
            $i++;
            $data['STT'] = $i;
            $trees[] = $data;
        }
        return $trees;
    }

    function loadDanhsSachPSVT($LoaiPhieu,$tuthang,$denthang,$loaidanhdau)
    {
        $trees = array();
        $thangtruoc = $tuthang-1;
        $sql_max = "select max( CAST(SUBSTRING_INDEX(mapskt,'-',-1) as SIGNED)) as mapsktmax from psvt where loaiphieu='" . $LoaiPhieu . "' and  MONTH(ngaykhaithue) < '".$tuthang."' ";
        $result_max = $this->re_query($sql_max);
        $data_max = $this->re_fetch($result_max);
        $somax = $data_max['mapsktmax'];
        $fill = $this->get_orderby();

        if ($fill != "")
            $sql_w = " and " . $this->get_orderby();
        if($LoaiPhieu==2){
            $sql = "SELECT * FROM " . $this->table . " WHERE loaiphieu='" . $LoaiPhieu . "' and MONTH(ngaykhaithue)>= '".$tuthang."' and MONTH(ngaykhaithue)<= '".$denthang."' $sql_w  order by machinhanh,ngaykhaithue,ngayhoadon,CAST(SUBSTRING_INDEX(sct,'-',-1) as SIGNED) ";
        }else if($LoaiPhieu==3){
            $sql = "SELECT * FROM " . $this->table . " WHERE loaiphieu='" . $LoaiPhieu . "' and MONTH(ngayghiso)>= '".$tuthang."' and MONTH(ngayghiso)<= '".$denthang."' $sql_w  order by machinhanh,ngayghiso,ngayhoadon,CAST(SUBSTRING_INDEX(sct,'-',-1) as SIGNED) ";
        }else{
            $sql = "SELECT * FROM " . $this->table . " WHERE loaiphieu='" . $LoaiPhieu . "' and MONTH(ngaykhaithue)>= '".$tuthang."' and MONTH(ngaykhaithue)<= '".$denthang."' $sql_w  order by machinhanh,ngaykhaithue,ngayhoadon,CAST(SUBSTRING_INDEX(sct,'-',-1) as SIGNED) ";
        }
        $this->query($sql);
        $i = $somax;
        if($loaidanhdau==2){
            $i = $tuthang.'000';
        }
        $sql_update="";
        while ($data = $this->fetch()) {
            $i++;
            $ghepchuoi = "";
            if($loaidanhdau==2){
                if($LoaiPhieu==2){// Nếu là phiếu xuất
                    if(strlen ($i)<6){
                        $ghepchuoi.='PX-00';
                    }else{
                        $ghepchuoi.='PX-0';
                    }
                }else if($LoaiPhieu==3){// Nếu là phiếu xuất SX
                    if(strlen ($i)<6){
                        $ghepchuoi.='PSX-00';
                    }else{
                        $ghepchuoi.='PSX-0';
                    }
                }else{// Nếu là phiếu Nhập
                    if(strlen ($i)<6){
                        $ghepchuoi.='PN-00';
                    }else{
                        $ghepchuoi.='PN-0';
                    }
                }
            }

            $trees[$data['sophieu']] = $i;
            $this->re_query("UPDATE psvt SET mapskt='".$ghepchuoi.$i."' WHERE sophieu='".$data['sophieu']."';");
        }
        return $trees;
    }
    function loadDanhsSachPSKT($LoaiPhieu,$tuthang,$denthang,$loaidanhdau)
    {
        $trees = array();
        $thangtruoc = $tuthang;
        $sql_max = "select max( CAST(SUBSTRING_INDEX(pskt.mapskt,'-',-1) as SIGNED)) as mapsktmax from pskt inner join chitiet_pskt on (pskt.sophieu = chitiet_pskt.sophieu) WHERE pskt.loaiphieu='" . $LoaiPhieu . "' and  MONTH(ngaykhaithue) < '".$tuthang."' ";
        $result_max = $this->re_query($sql_max);
        $data_max = $this->re_fetch($result_max);
        $somax = $data_max['mapsktmax'];

        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = " and " . $this->get_orderby();
        if($LoaiPhieu%2==0){
            $sql = "SELECT pskt.* FROM pskt inner join chitiet_pskt on (pskt.sophieu = chitiet_pskt.sophieu) WHERE pskt.loaiphieu='" . $LoaiPhieu . "' and MONTH(ngaykhaithue)>= '".$tuthang."' and MONTH(ngaykhaithue)<= '".$denthang."' $sql_w  order by machinhanh,ngaykhaithue,chitiet_pskt.ngayhoadon,CAST(SUBSTRING_INDEX(chitiet_pskt.sct,'-',-1) as SIGNED) ";
        }else{
            $sql = "SELECT pskt.* FROM pskt inner join chitiet_pskt on (pskt.sophieu = chitiet_pskt.sophieu) WHERE pskt.loaiphieu='" . $LoaiPhieu . "' and MONTH(ngaykhaithue)>= '".$tuthang."' and MONTH(ngaykhaithue)<= '".$denthang."' $sql_w  order by machinhanh,ngaykhaithue,chitiet_pskt.ngayhoadon,CAST(SUBSTRING_INDEX(chitiet_pskt.sct,'-',-1) as SIGNED) ";
        }
        $this->query($sql);
        if($somax==""){
            $i = 1;
            if($LoaiPhieu%2==0) {
                $i=0;
            }
        }else{
            $i = ($somax+1);
        }
        if($loaidanhdau==2){
            $i = $tuthang.'000';
        }

        $sql_update="";
        $sophieu_arr = "";
        while ($data = $this->fetch()) {
            $sophieu_arr[$data['sophieu']] = $data['sophieu'];
        }
        foreach ($sophieu_arr as $items){
            if($LoaiPhieu%2==0 && $loaidanhdau==1) {
                $i++;
            }
            $ghepchuoi = "";
            if($loaidanhdau==2){
                $i++;
                if($LoaiPhieu==1){// Nếu là phiếu xuất
                    if(strlen ($i)<6){
                        $ghepchuoi.='PT-00';
                    }else{
                        $ghepchuoi.='PT-0';
                    }
                }else if($LoaiPhieu==2){// Nếu là phiếu xuất SX
                    if(strlen ($i)<6){
                        $ghepchuoi.='PC-00';
                    }else{
                        $ghepchuoi.='PC-0';
                    }
                }else if($LoaiPhieu==3){// Nếu là phiếu Nhập
                    if(strlen ($i)<6){
                        $ghepchuoi.='GN-00';
                    }else{
                        $ghepchuoi.='GN-0';
                    }
                }else if($LoaiPhieu==4){// Nếu là phiếu Nhập
                    if(strlen ($i)<6){
                        $ghepchuoi.='GC-00';
                    }else{
                        $ghepchuoi.='GC-0';
                    }
                }else if($LoaiPhieu%2!=0){// Nếu là phiếu Nhập
                    if(strlen ($i)<6){
                        $ghepchuoi.='UNT-00';
                    }else{
                        $ghepchuoi.='UNT-0';
                    }
                }else if($LoaiPhieu%2==0){// Nếu là phiếu Nhập
                    if(strlen ($i)<6){
                        $ghepchuoi.='UNC-00';
                    }else{
                        $ghepchuoi.='UNC-0';
                    }
                }
            }
            $trees[$items] = $i;
            $sql_update = "UPDATE pskt SET mapskt='".$ghepchuoi.$i."' WHERE sophieu='".$items."';";
            $this->re_query($sql_update);
            if($LoaiPhieu%2!=0 && $loaidanhdau==1) {
                $i++;
            }
        }
        return $trees;
    }


    function loadListDSVTHH($parentid = 0)
    {
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = " and " . $this->get_orderby();
        $sql = "SELECT mavt,tenvt FROM mavt WHERE 0=0 $sql_w  order by mavt";
        $this->query($sql);
        $i = 0;
        while ($data = $this->fetch()) {
            $i++;
            $data['STT'] = $i;
            $trees[] = $data;
        }
        return $trees;
    }

    public function getPhieuNhapKho()
    {
        $sql = "select * from " . $this->table . " where mapskt='" . $this->getMaPSKT() . "' and loaiphieu='" . $this->getLP() . "'";
        $this->query($sql);
        if ($this->num_rows() == 0) {
            return 0;
        } else {
            return $this->fetch();
        }
    }
    public function LayNgayGhiSo(){
        $sql = "select max(ngayghiso) as ngayghiso from " . $this->table . " where loaiphieu='" . $this->getLP() . "'";
        $this->query($sql);
        if ($this->num_rows() == 0) {
            return 0;
        } else {
            return $this->fetch();
        }
    }

    public function themPhieuNhapKho()
    {
        $sql = "";
        $sql = "INSERT INTO " . $this->table . " (mapskt,sophieu,seri,sct,mauso,ngayghiso,ngayhoadon,ngaythanhtoan,loaiphieu,mand,noidung,makh,masothue,tenkh,diachi,makho,tenkho,kho,maloai,chuthich,cothuegtgt,cochietkhau,cobaogomthue,tienhang,tienthue,tongcong,tongcongnt,tienchietkhau,phimoitruong,chungtugoc,chietkhaudoanhso,chiphikhongloaitru,loaitokhai,loaisp,tendangnhap,mabimat,loaihddt,congaykhaithue,ngaykhaithue,loaihanghoadichvu,tencanhan,lacongtrinh,duandautu,machinhanh) ";
        $sql .= "VALUES ('" . $this->getMaPSKT() . "','" . $this->getSoPhieu() . "', '" . $this->getSeri() . "', '" . $this->getSCT() . "','" . $this->getMauSo() . "', '" . $this->getNgayGhiSo() . "', '" . $this->getNgayHD() . "', '" . $this->getNgayTT() . "', '" . $this->getLP() . "', '" . $this->getMaND() . "', '" . $this->getTenND() . "', '" . $this->getMaKH() . "','" . $this->getMaSoThue() . "','" . $this->getTenKH() . "', '" . $this->getDiaChi() . "', '" . $this->getMaKho() . "', '" . $this->getTenKho() . "','" . $this->getNhapVaoKho() . "', '" . $this->getMaLoai() . "', '" . $this->get_ChuThich() . "', '" . $this->getCoThueGTGT() . "', '" . $this->getCoChietKhau() . "', '" . $this->getCoBaoGomThue() . "', '" . $this->getTienHang() . "','" . $this->getTienThue() . "', '" . $this->getTongCong() . "','" . $this->getTongTienNT() . "', '" . $this->getTienChietKhau() . "','" . $this->getThanhTienMT() . "','" . $this->getCoChungTuGoc() . "','" . $this->getChietKhauDoanhSo() . "','" . $this->getChiPhiKhongLoaiTru() . "','" . $this->getLoaiToKhai() . "','" . $this->getLoaiSP() . "','" . $_SESSION['User'] . "','" . $this->getMaSoBiMat() . "','" . $this->getLoaiHDDT() . "','" . $this->getCoNgayKhaiThue() . "','" . $this->getNgayKhaiThue() . "','" . $this->getLoaiHangHoaDichVu() . "','" . $this->getTenCaNhan() . "','" . $this->getLaCongTrinh() . "','" . $this->getDuAnDauTu() . "','" . $this->getChiNhanhCongTy() . "');";
        $this->query($sql);
    }
    public function xoaPhieuNhapKho(){
        $sql = "delete from psvt WHERE sophieu = '".$this->getSoPhieu()."'";
        $this->query($sql);
    }
    public function xoaCTPhieuNhapKho(){
        $sql = "delete from chitiet_psvt WHERE sophieu = '".$this->getSoPhieu()."'";
        $this->query($sql);
    }
    public function xoaDKPhieuNhapKho(){
        $sql = "delete from dinhkhoan_psvt WHERE sophieu = '".$this->getSoPhieu()."'";
        $this->query($sql);
    }

    public function suaPhieuNhapKho()
    {
        $dathem="";
        if(trim($this->getDaThem())!=0){
            $dathem="dathem='" . $this->getDaThem() . "',";
        }
        $loaihddt = "";
        if($this->getLoaiHDDT()!=0){
            $loaihddt = "loaihddt='" . $this->getLoaiHDDT() . "',";
        }
        $loaihanghoadichvu = "";
        if($this->getLoaiHangHoaDichVu()!=0){
            $loaihanghoadichvu = "loaihanghoadichvu = '" . $this->getLoaiHangHoaDichVu() . "',";
        }
        $sql = "update " . $this->table . " set
              seri='" . $this->getSeri() . "',
              sct= '" . $this->getSCT() . "',
              mauso= '" . $this->getMauSo() . "',
              ngayghiso= '" . $this->getNgayGhiSo() . "',
              $dathem
              ngayhoadon= '" . $this->getNgayHD() . "',
              ngaythanhtoan= '" . $this->getNgayTT() . "',
              loaiphieu= '" . $this->getLP() . "',
              mand= '" . $this->getMaND() . "',
              noidung= '" . $this->getTenND() . "',
              makh= '" . $this->getMaKH() . "',
              masothue= '" . $this->getMaSoThue() . "',
              tenkh= '" . $this->getTenKH() . "',
              diachi= '" . $this->getDiaChi() . "',
              makho= '" . $this->getMaKho() . "',
              tenkho= '" . $this->getTenKho() . "',
              kho= '" . $this->getNhapVaoKho() . "',
              maloai= '" . $this->getMaLoai() . "',
              chuthich= '" . $this->get_ChuThich() . "',
              cothuegtgt= '" . $this->getCoThueGTGT() . "',
              cochietkhau= '" . $this->getCoChietKhau() . "',
              cobaogomthue= '" . $this->getCoBaoGomThue() . "',
              tienhang= '" . $this->getTienHang() . "',
              tienthue= '" . $this->getTienThue() . "',
              tongcong= '" . $this->getTongCong() . "',
              tongcongnt= '" . $this->getTongTienNT() . "',
              tienchietkhau='" . $this->getTienChietKhau() . "',
              phimoitruong='" . $this->getThanhTienMT() . "',
              chietkhaudoanhso='" . $this->getChietKhauDoanhSo() . "',
              chiphikhongloaitru='" . $this->getChiPhiKhongLoaiTru() . "',
              loaitokhai='" . $this->getLoaiToKhai() . "',
              loaisp='" . $this->getLoaiSP() . "',
              $loaihddt
              chungtugoc='" . $this->getCoChungTuGoc() . "',
              $loaihanghoadichvu
              congaykhaithue='" . $this->getCoNgayKhaiThue() . "',
              ngaykhaithue='" . $this->getNgayKhaiThue() . "',
              tencanhan='" . $this->getTenCaNhan() . "',
              lacongtrinh='" . $this->getLaCongTrinh() . "',
              duandautu='" . $this->getDuAnDauTu() . "',
              machinhanh='" . $this->getChiNhanhCongTy() . "'
              
              where sophieu =  '" . $this->getSoPhieu() . "'";
        $this->query($sql);
    }
    function ChiTietHangHoaVatTu(){//
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = " and " . $this->get_orderby();
        $sql="select mavt,0 as sophieu,0 ngayghiso,0 ngayhoadon,0 sct,0 tenkh,0 soluongnhap,0 as dongianhap,(0) as thanhtien,0 as soluongxuat,0 as thanhtienxuat,0 as thang,0 loaiphieu,0 as tkdu,0 as tkduxk,0 thue,0 tienchietkhau from tk where slck!=0 {$sql_w}
                  UNION all
                  select mavt,psvt.mapskt as sophieu,ngayghiso,ngayhoadon,sct,tenkh,soluongnhap,donggianhap as dongianhap,(thanhtien+cpmuahang) as thanhtien,vat as soluongxuat,vat as thanhtienxuat,MONTH(ngayghiso) as thang,loaiphieu,(select tkco FROM dinhkhoan_psvt where dinhkhoan_psvt.sophieu = chitiet_psvt.sophieu limit 1) as tkdu,(select tkco FROM dinhkhoan_psvt where dinhkhoan_psvt.sophieu = chitiet_psvt.sophieu order by tkco DESC limit 1) as tkduxk,chitiet_psvt.thue,chitiet_psvt.tienchietkhau  FROM psvt INNER JOIN chitiet_psvt on (psvt.sophieu = chitiet_psvt.sophieu) WHERE loaiphieu = 1 and ngayghiso>='".$this->getTuNgay()."' and ngayghiso<='".$this->getDenNgay()."' {$sql_w}
		          UNION all 
		          select mavt,psvt.mapskt as sophieu,ngayghiso,ngayhoadon,sct,tenkh,0 as soluongnhap,donggianhap as dongianhap,0 as thanhtien,soluongnhap as soluongxuat,thanhtien as soluongxuat,MONTH(ngayghiso) as thang,loaiphieu,632 as tkdu,(select tkco FROM dinhkhoan_psvt where dinhkhoan_psvt.sophieu = chitiet_psvt.sophieu order by tkco DESC limit 1 ) as tkduxk,chitiet_psvt.thue,chitiet_psvt.tienchietkhau FROM psvt INNER JOIN chitiet_psvt on (psvt.sophieu = chitiet_psvt.sophieu) WHERE loaiphieu = 2 and ngayghiso>='".$this->getTuNgay()."' and ngayghiso<='".$this->getDenNgay()."' {$sql_w}
		          UNION all 
		          select mavt,psvt.mapskt as sophieu,ngayghiso,ngayhoadon,sct,tenkh,0 as soluongnhap,donggianhap as dongianhap,0 as thanhtien,soluongnhap as soluongxuat,thanhtien as soluongxuat,MONTH(ngayghiso) as thang,loaiphieu,(select tkno FROM dinhkhoan_psvt where dinhkhoan_psvt.sophieu = chitiet_psvt.sophieu limit 1) as tkdu,(select tkco FROM dinhkhoan_psvt where dinhkhoan_psvt.sophieu = chitiet_psvt.sophieu order by tkco DESC limit 1) as tkduxk,chitiet_psvt.thue,chitiet_psvt.tienchietkhau FROM psvt INNER JOIN chitiet_psvt on (psvt.sophieu = chitiet_psvt.sophieu) WHERE loaiphieu = 3 and ngayghiso>='".$this->getTuNgay()."' and ngayghiso<='".$this->getDenNgay()."' {$sql_w} order by ngayghiso,loaiphieu,sophieu";
        $this->query($sql);
        if($this->num_rows() == 0){
            return 0;
        }else{
            $i=0;
            while($data=$this->fetch()){
                $i++;
                $mavt = $data['mavt'];
                $thang = $data['thang'];
                $row[$mavt][$thang][$i]=$data;
            }
            return $row;
        }
    }

    function LoadDSMaVTBinhQuanThang_LienHoan()
    {//
        if ($this->get_MaVT() == "") {
            $sql = "select mavt,dongiabinhquan as dongia,thang,sottct,thanhtienxuat FROM tkthang ";
        } else {
            $sql = "select mavt,dongiabinhquan as dongia,thang,sottct,thanhtienxuat FROM tkthang WHERE mavt in ('" . $this->get_MaVT() . "') ";
        }
        $this->query($sql);
        if ($this->num_rows() == 0) {
            return 0;
        } else {
            $i = 0;
            while ($data = $this->fetch()) {
                $i++;
                $mavt = $data['mavt'];
                $thang = $data['thang'];
                $sottct = $data['sottct'];

                $row[$sottct][$mavt] = $data;
            }
            return $row;
        }
    }

    function LoadDSMaVTBinhQuanThang(){//
        if($this->get_MaVT()=="")
        {
            $sql="select mavt,dongiabinhquan as dongia,thang FROM tkthang ";
        }else{
            $sql="select mavt,dongiabinhquan as dongia,thang FROM tkthang WHERE mavt in ('".$this->get_MaVT()."') ";
        }
        $this->query($sql);
        if($this->num_rows() == 0){
            return 0;
        }else{
            $i=0;
            while($data=$this->fetch()){
                $i++;
                $mavt = $data['mavt'];
                $thang = $data['thang'];

                $row[$mavt][$thang]=$data;
            }
            return $row;
        }
    }
    function LoadDSMaVT(){//
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = " and " . $this->get_orderby();

        $sql="select mavt,tenvt,matk,dvt from mavt WHERE 0=0 {$sql_w}";
        $this->query($sql);

        $datanhap = $this->TinhPhatSinhNhapDK($this->getTuNgay(),$this->get_MaVT());
        $dataxuat = $this->TinhPhatSinhXuatDK($this->getTuNgay(),$this->get_MaVT());
        $dataton = $this->TinhPhatSinhTonDKTuTK($this->get_MaVT());

        if($this->num_rows() == 0){
            return 0;
        }else{
            while($data=$this->fetch()){
                $mavt = $data['mavt'];
                if($datanhap==0){
                    $soluongnhap = 0;
                    $thanhtiennhap = 0;
                }else{
                    $soluongnhap = $datanhap[$mavt]['soluong'];
                    $thanhtiennhap =$datanhap[$mavt]['thanhtien'];
                }

                if($dataxuat==0) {
                    $soluongxuat = 0;
                    $thanhtienxuat = 0;
                } else{
                    $soluongxuat = $dataxuat[$mavt]['soluong'];
                    $thanhtienxuat =$dataxuat[$mavt]['thanhtien'];
                }

                if($dataton==0) {
                    $soluongtondk = 0;
                    $thanhtientondk =0;
                }else{
                    $soluongtondk = $dataton[$mavt]['soluong'];
                    $thanhtientondk =$dataton[$mavt]['thanhtien'];
                }

                $soluongtonck = $soluongtondk+($soluongnhap-$soluongxuat);
                //$thanhtientonck = ($thanhtientondk+($thanhtiennhap-$thanhtienxuat));
                $dongiabinhquan = ($thanhtientondk+$thanhtiennhap)/($soluongtondk+$soluongnhap);

                $thanhtienxuat = ($dongiabinhquan*$soluongxuat);

                $thanhtientonck = $thanhtientondk+$thanhtiennhap-$thanhtienxuat;

                $row[$mavt]=$data;
                $row[$mavt]['dongiaton']= $dongiabinhquan;
                $row[$mavt]['soluongton']= $soluongtonck;
                $row[$mavt]['thanhtienton']= $thanhtientonck;
            }
            return $row;
        }
    }

    function TinhPhatSinhNhapDK($TuNgay,$MaVT){// Tính phát sinh nhập trong khoản thời gian nhất định
        if($MaVT==""){
            $sql = "select sum(soluongnhap) as soluong,SUM(thanhtien) as thanhtien,chitiet_psvt.mavt from psvt INNER join chitiet_psvt on (psvt.sophieu=chitiet_psvt.sophieu) where loaiphieu=1 and ngayghiso<'" . $TuNgay . "' group by chitiet_psvt.mavt";// Nhập hàng trông tháng
        }else {
            $sql = "select sum(soluongnhap) as soluong,SUM(thanhtien) as thanhtien,chitiet_psvt.mavt from psvt INNER join chitiet_psvt on (psvt.sophieu=chitiet_psvt.sophieu) where loaiphieu=1 and ngayghiso<'" . $TuNgay . "' and mavt in ('" . $MaVT . "') group by chitiet_psvt.mavt";// Nhập hàng trông tháng
        }
        $query = $this->re_query($sql);
        if($this->num_rows() == 0){
            return 0;
        }else{
            while($data=$this->re_fetch($query)){
                $row[$data['mavt']]=$data;
            }
            return $row;
        }
    }
    function TinhPhatSinhXuatDK($TuNgay,$MaVT){// Tính phát sinh nhập trong khoản thời gian nhất định
        if($MaVT==""){
            $sql="select sum(soluongnhap) as soluong,SUM(thanhtien) as thanhtien,chitiet_psvt.mavt from psvt INNER join chitiet_psvt on (psvt.sophieu=chitiet_psvt.sophieu) where loaiphieu=2 and ngayghiso<'".$TuNgay."' group by chitiet_psvt.mavt";// Nhập hàng trông tháng
        }else{
            $sql="select sum(soluongnhap) as soluong,SUM(thanhtien) as thanhtien,chitiet_psvt.mavt from psvt INNER join chitiet_psvt on (psvt.sophieu=chitiet_psvt.sophieu) where loaiphieu=2 and ngayghiso<'".$TuNgay."' and mavt in ('".$MaVT."') group by chitiet_psvt.mavt";// Nhập hàng trông tháng
        }
        $query = $this->re_query($sql);
        if($this->num_rows() == 0){
            return 0;
        }else{
            while($data=$this->re_fetch($query)){
                $row[$data['mavt']]=$data;
            }
            return $row;
        }
    }

    function TinhPhatSinhTonDKTuTK($MaVT){// Tính phát sinh nhập trong khoản thời gian nhất định
        if($MaVT==""){
            $sql="SELECT mavt,slck as soluong,dgxvnd as thanhtien FROM tk ";// Nhập hàng trông tháng
        }else{
            $sql="SELECT mavt,slck as soluong,dgxvnd as thanhtien FROM tk where mavt in ('".$MaVT."')";// Nhập hàng trông tháng
        }
        $query = $this->re_query($sql);
        if($this->num_rows() == 0){
            return 0;
        }else{
            while($data=$this->re_fetch($query)){
                $row[$data['mavt']]=$data;
            }
            return $row;
        }
    }
    function TinhPhatSinhNhapDKALL($TuNgay,$DenNgay){// Tính phát sinh nhập trong khoản thời gian nhất định
        $sql="select sum(soluongnhap) as soluong,SUM(thanhtien) as thanhtien,chitiet_psvt.mavt from psvt INNER join chitiet_psvt on (psvt.sophieu=chitiet_psvt.sophieu) where loaiphieu=1 and ngayhoadon>='".$TuNgay."' and ngayhoadon<='".$DenNgay."'  group by chitiet_psvt.mavt";// Nhập hàng trông tháng
        $query = $this->re_query($sql);
        if($this->num_rows() == 0){
            return 0;
        }else{
            while($data=$this->re_fetch($query)){
                $row[$data['mavt']]=$data;
            }
            return $row;
        }
    }
    function TinhPhatSinhTonDKTuTKALL(){// Tính phát sinh nhập trong khoản thời gian nhất định
        $sql="SELECT mavt,slck as soluong,dgxvnd as thanhtien FROM tk ";// Nhập hàng trông tháng
        $query = $this->re_query($sql);
        if($this->num_rows() == 0){
            return 0;
        }else{
            while($data=$this->re_fetch($query)){
                $row[$data['mavt']]=$data;
            }
            return $row;
        }
    }

    public function xoaPSVT()
    {
        $sql = "delete from mavt where mavt='" . $this->get_MaVT() . "'";
        $this->query($sql);
    }
    public function xoaDinhKhoanMaPSVT()
    {
        $sql = "delete from dinhkhoan_psvt where sophieu='" . $this->getSoPhieu() . "'";
        $this->query($sql);
    }
    function LoadChiTietHangHoaVatTuLaiGop($TuNgay,$DenNgay){// bảng cộng dồn xuất kho

        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = " " . $this->get_orderby();

        $sql="select chitiet_psvt.mavt,chitiet_psvt.tenvt,chitiet_psvt.dvt,sum(soluongnhap) as soluongxuat,sum(thanhtien) as thanhtienxuat,(select dongiabinhquan from tkthang where tkthang.mavt = mavt.mavt and thang = MONTH(ngayghiso)) as giavon  FROM chitiet_psvt INNER JOIN psvt on (chitiet_psvt.sophieu = psvt.sophieu) INNER JOIN mavt on (chitiet_psvt.mavt = mavt.mavt)  WHERE loaiphieu = 2 and ngayghiso>='".$this->getTuNgay()."' and ngayghiso<='".$this->getDenNgay()."' {$sql_w} group by chitiet_psvt.mavt order by chitiet_psvt.tenvt ";
        $this->query($sql);
        if($this->num_rows() == 0){
            return 0;
        }else{
            $TonDK = $this->TinhPhatSinhTonDKTuTKALL();
            $TonNhapPS = $this->TinhPhatSinhNhapDKALL($TuNgay,$DenNgay);
            while($data=$this->fetch()){
                $mavt = $data['mavt'];

                $sltondk = $TonDK[$mavt]['soluong'];
                $thanhtientondk = $TonDK[$mavt]['thanhtien'];

                $slnhapps = $TonNhapPS[$mavt]['soluong'];
                $thanhtiennhapps= $TonNhapPS[$mavt]['thanhtien'];
                $dongiabinhquan = ($thanhtiennhapps+$thanhtientondk)/($sltondk+$slnhapps);

                $row[$mavt] = $data;
                $row[$mavt]['giaban']=round($data['thanhtienxuat']/$data['soluongxuat']);

                //$row[$mavt]['giavon']=round($dongiabinhquan,2);
            }
            return $row;
        }
    }

    function LoadChiTietHangHoaVatTuLaiGop_ChiTiet($TuNgay,$DenNgay,$SapXep){// bảng cộng dồn xuất kho

        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = " " . $this->get_orderby();

        if($_SESSION['phuongphaptonkho']==2){
            $sql="select psvt.mapskt,chitiet_psvt.mavt,chitiet_psvt.tenvt,chitiet_psvt.dvt,soluongnhap as soluongxuat,thanhtien as thanhtienxuat,(select dongiabinhquan from tkthang where tkthang.mavt = mavt.mavt and ngs = ngayghiso and psvt.kho = tkthang.makho and psvt.sophieu=tkthang.sophieu_nxk LIMIT 1) as giavon,ngayhoadon,ngayghiso,makh,tenkh,sct,seri,psvt.kho,mavt.manhom  FROM chitiet_psvt INNER JOIN psvt on (chitiet_psvt.sophieu = psvt.sophieu) INNER JOIN mavt on (chitiet_psvt.mavt = mavt.mavt)  WHERE ngayghiso>='".$this->getTuNgay()."' and ngayghiso<='".$this->getDenNgay()."' {$sql_w} order by {$SapXep} ";
        }else{
            $sql="select psvt.mapskt,chitiet_psvt.mavt,chitiet_psvt.tenvt,chitiet_psvt.dvt,soluongnhap as soluongxuat,thanhtien as thanhtienxuat,(select dongiabinhquan from tkthang where tkthang.mavt = mavt.mavt and thang = MONTH(ngayghiso) and psvt.kho = tkthang.makho) as giavon,ngayhoadon,ngayghiso,makh,tenkh,sct,seri,psvt.kho,mavt.manhom  FROM chitiet_psvt INNER JOIN psvt on (chitiet_psvt.sophieu = psvt.sophieu) INNER JOIN mavt on (chitiet_psvt.mavt = mavt.mavt)  WHERE ngayghiso>='".$this->getTuNgay()."' and ngayghiso<='".$this->getDenNgay()."' {$sql_w} order by {$SapXep} ";
        }
        $this->query($sql);
        if($this->num_rows() == 0){
            return 0;
        }else{
            $TonDK = $this->TinhPhatSinhTonDKTuTKALL();
            $TonNhapPS = $this->TinhPhatSinhNhapDKALL($TuNgay,$DenNgay);
            $i=0;
            while($data=$this->fetch()){
                $mavt = $data['mavt'];

                $sltondk = $TonDK[$mavt]['soluong'];
                $thanhtientondk = $TonDK[$mavt]['thanhtien'];

                $slnhapps = $TonNhapPS[$mavt]['soluong'];
                $thanhtiennhapps= $TonNhapPS[$mavt]['thanhtien'];
                //$dongiabinhquan = ($thanhtiennhapps+$thanhtientondk)/($sltondk+$slnhapps);

                $data['giaban']=round($data['thanhtienxuat']/$data['soluongxuat']);
                $data['thanhtienvon']=round($data['giavon']*$data['soluongxuat']);


                $row[] = $data;
            }
            return $row;
        }
    }

    function LoadChiTietHangHoaVatTuLaiGop_ChiTiet_NhapKho($TuNgay,$DenNgay,$SapXep){// bảng cộng dồn xuất kho

        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = " " . $this->get_orderby();

        if($_SESSION['phuongphaptonkho']==2){
            $sql = "select psvt.mapskt,chitiet_psvt.mavt,chitiet_psvt.tenvt,chitiet_psvt.dvt,soluongnhap as soluongxuat,thanhtien as thanhtienxuat,(select dongiabinhquan from tkthang where tkthang.mavt = mavt.mavt and ngs = ngayghiso and psvt.kho = tkthang.makho and psvt.sophieu=tkthang.sophieu_nxk LIMIT 1) as giavon,ngayhoadon,ngayghiso,makh,tenkh,sct,seri,psvt.kho,mavt.manhom,diachi  FROM chitiet_psvt INNER JOIN psvt on (chitiet_psvt.sophieu = psvt.sophieu) INNER JOIN mavt on (chitiet_psvt.mavt = mavt.mavt)  WHERE loaiphieu = 1 and ngayghiso>='" . $this->getTuNgay() . "' and ngayghiso<='" . $this->getDenNgay() . "' {$sql_w} order by {$SapXep} ";
        }else {
            $sql = "select psvt.mapskt,chitiet_psvt.mavt,chitiet_psvt.tenvt,chitiet_psvt.dvt,soluongnhap as soluongxuat,thanhtien as thanhtienxuat,(select dongiabinhquan from tkthang where tkthang.mavt = mavt.mavt and thang = MONTH(ngayghiso) and psvt.kho = tkthang.makho) as giavon,ngayhoadon,ngayghiso,makh,tenkh,sct,seri,psvt.kho,mavt.manhom,diachi  FROM chitiet_psvt INNER JOIN psvt on (chitiet_psvt.sophieu = psvt.sophieu) INNER JOIN mavt on (chitiet_psvt.mavt = mavt.mavt)  WHERE loaiphieu = 1 and ngayghiso>='" . $this->getTuNgay() . "' and ngayghiso<='" . $this->getDenNgay() . "' {$sql_w} order by {$SapXep} ";
        }
        $this->query($sql);
        if($this->num_rows() == 0){
            return 0;
        }else{
            $TonDK = $this->TinhPhatSinhTonDKTuTKALL();
            $TonNhapPS = $this->TinhPhatSinhNhapDKALL($TuNgay,$DenNgay);
            $i=0;
            while($data=$this->fetch()){
                $mavt = $data['mavt'];

                $sltondk = $TonDK[$mavt]['soluong'];
                $thanhtientondk = $TonDK[$mavt]['thanhtien'];

                $slnhapps = $TonNhapPS[$mavt]['soluong'];
                $thanhtiennhapps= $TonNhapPS[$mavt]['thanhtien'];
                //$dongiabinhquan = ($thanhtiennhapps+$thanhtientondk)/($sltondk+$slnhapps);

                $data['giaban']=round($data['thanhtienxuat']/$data['soluongxuat']);
                $data['thanhtienvon']=round($data['giavon']*$data['soluongxuat']);

                $row[] = $data;
            }
            return $row;
        }
    }

    function LoadBangChiTietHangHoaVatTuLaiGop_ChiTiet($SapXep){// bảng cộng dồn xuất kho

        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = " " . $this->get_orderby();

        $sql="select * from bangchitiet_laigop where 0=0 {$sql_w} order by {$SapXep} ";
        $this->query($sql);
        if($this->num_rows() == 0){
            return 0;
        }else{
            $i=0;
            while($data=$this->fetch()){
                $row[$data['makho']][] = $data;
            }
            return $row;
        }
    }

    function LoadBangChiTietHangHoaVatTuLaiGop_CongDon($SapXep){// bảng cộng dồn xuất kho

        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = " " . $this->get_orderby();

        $sql="select maspkt,mavt,tenvt,dvt,sum(soluongxuat) as soluongxuat, sum(thanhtienxuat) as thanhtienxuat, avg(giavon) as giavon, ngayhoadon, ngayghiso,makh,tenkh, sct, seri,avg(giaban) as giaban, sum(thanhtienvon) as thanhtienvon,makho from bangchitiet_laigop where 0=0 {$sql_w} group by {$SapXep} order by {$SapXep} ";
        $this->query($sql);
        if($this->num_rows() == 0){
            return 0;
        }else{
            $i=0;
            while($data=$this->fetch()){
                $row[$data['makho']][] = $data;
            }
            return $row;
        }
    }

    function kiemTraPhieuNXTrungTrongPhieuKhac()
    {// Kiểm tra xem phiếu nhập kho có tòn tại chưa
        $sql = "select sott from pskt where loaiphieu='" . $this->getLP() . "' and mapskt=" . $this->getMaPSKT();
        $this->query($sql);
        if ($this->num_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}
?>
