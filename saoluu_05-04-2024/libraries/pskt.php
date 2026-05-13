<?php

class pskt extends database
{
    public $tringorder;
    public $table = "pskt";
    public $table_chitietpskt = "chitiet_pskt";


    public $MaVT;
    public $MaVTCha;
    public $DaThem;
    public $MaPSKT;
    public $CoChungTuGoc;
    public $ChiPhiKhongLoaiTru;
    public $LoaiToKhai;
    public $LoaiSP;
    public $TyGia;
    public $SoTienNT1;
    public $SoTienNT2;
    public $TongTienNT;
    public $MaSoBiMat;
    public $LoaiHDDT;

    public $CoNgayKhaiThue;
    public $LoaiHangHoaDichVu;
    public $ChungTuThamChieu;

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
    public function getChungTuThamChieu()
    {
        return $this->ChungTuThamChieu;
    }

    /**
     * @param mixed $ChungTuThamChieu
     */
    public function setChungTuThamChieu($ChungTuThamChieu)
    {
        $this->ChungTuThamChieu = $ChungTuThamChieu;
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
    public function getTyGia()
    {
        return $this->TyGia;
    }

    /**
     * @param mixed $TyGia
     */
    public function setTyGia($TyGia)
    {
        $this->TyGia = $TyGia;
    }

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
    public function getTongCongNT()
    {
        return $this->TongCongNT;
    }

    /**
     * @param mixed $TongCongNT
     */
    public function setTongCongNT($TongCongNT)
    {
        $this->TongCongNT = $TongCongNT;
    }

    public $TongCongNT;


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

    public $sottpsct;

    public function getDaThem()
    {
        return $this->DaThem;
    }

    /**
     * @param mixed $sottpsct
     */
    public function setDaThem($DaThem)
    {
        $this->DaThem = $DaThem;
    }

    /**
     * @return mixed
     */
    public function getSottpsct()
    {
        return $this->sottpsct;
    }

    /**
     * @param mixed $sottpsct
     */
    public function setSottpsct($sottpsct)
    {
        $this->sottpsct = $sottpsct;
    }


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

    public $Seri;////

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

    public $Ngay;

    /**
     * @return mixed
     */
    public function getNgay()
    {
        return $this->Ngay;
    }

    /**
     * @param mixed $Ngay
     */
    public function setNgay($Ngay)
    {
        $this->Ngay = $Ngay;
    }

    public $NgayHD;

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
    }////

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
    }////

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

    public $TenTKCo;

    /**
     * @return mixed
     */
    public function getTenTKCo()
    {
        return $this->TenTKCo;
    }

    /**
     * @param mixed $TenTKCo
     */
    public function setTenTKCo($TenTKCo)
    {
        $this->TenTKCo = $TenTKCo;
    }////

    public $TTDB;

    /**
     * @return mixed
     */
    public function getTTDB()
    {
        return $this->TTDB;
    }

    /**
     * @param mixed $TTDB
     */
    public function setTTDB($TTDB)
    {
        $this->TTDB = $TTDB;
    }////

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
    }////

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
    }////

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

    public $MaKH2;

    /**
     * @return mixed
     */
    public function getMaKH2()
    {
        return $this->MaKH2;
    }

    /**
     * @param mixed $MaKH2
     */
    public function setMaKH2($MaKH2)
    {
        $this->MaKH2 = $MaKH2;
    }////

    public $TenKH2;

    /**
     * @return mixed
     */
    public function getTenKH2()
    {
        return $this->TenKH2;
    }

    /**
     * @param mixed $TenKH2
     */
    public function setTenKH2($TenKH2)
    {
        $this->TenKH2 = $TenKH2;
    }////

    public $DiaChi2;

    /**
     * @return mixed
     */
    public function getDiaChi2()
    {
        return $this->DiaChi2;
    }

    /**
     * @param mixed $DiaChi2
     */
    public function setDiaChi2($DiaChi2)
    {
        $this->DiaChi2 = $DiaChi2;
    }

    public $MaKH3;

    /**
     * @return mixed
     */
    public function getMaKH3()
    {
        return $this->MaKH3;
    }

    /**
     * @param mixed $MaKH2
     */
    public function setMaKH3($MaKH3)
    {
        $this->MaKH3 = $MaKH3;
    }////

    public $TenKH3;

    /**
     * @return mixed
     */
    public function getTenKH3()
    {
        return $this->TenKH3;
    }

    /**
     * @param mixed $TenKH2
     */
    public function setTenKH3($TenKH3)
    {
        $this->TenKH3 = $TenKH3;
    }////

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
    public $MaSoThue2;

    /**
     * @return mixed
     */
    public function getMaSoThue2()
    {
        return $this->MaSoThue2;
    }

    /**
     * @param mixed $MaSoThue2
     */
    public function setMaSoThue2($MaSoThue2)
    {
        $this->MaSoThue2 = $MaSoThue2;
    }////
    ///
    public $Comment;////

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

    public $Add;////

    /**
     * @param mixed $Add
     */
    public function setAdd($Add)
    {
        $this->Add = $Add;
    }

    /**
     * @return mixed
     */
    public function getAdd()
    {
        return $this->Add;
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

    public $TongTien;

    /**
     * @return mixed
     */
    public function getTongTien()
    {
        return $this->TongTien;
    }

    /**
     * @param mixed $TongTien
     */
    public function setTongTien($TongTien)
    {
        $this->TongTien = $TongTien;
    }

    public $GTVND1;

    /**
     * @return mixed
     */
    public function getGTVND1()
    {
        return $this->GTVND1;
    }

    /**
     * @param mixed $GTVND1
     */
    public function setGTVND1($GTVND1)
    {
        $this->GTVND1 = $GTVND1;
    }// Giá trị việt nam đồng

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
    public $NoiDung;

    /**
     * @param mixed $NoiDung
     */
    public function setNoiDung($NoiDung)
    {
        $this->NoiDung = $NoiDung;
    }

    /**
     * @return mixed
     */
    public function getNoiDung()
    {
        return $this->NoiDung;
    }

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

    public $STUSD;

    /**
     * @param mixed $STUSD
     */
    public function setSTUSD($STUSD)
    {
        $this->STUSD = $STUSD;
    }

    /**
     * @return mixed
     */
    public function getSTUSD()
    {
        return $this->STUSD;
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

    public $DVTBX;
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

    public $Address;

    /**
     * @param mixed $Address
     */
    public function setAddress($Address)
    {
        $this->Address = $Address;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->Address;
    }

    public $Khac;

    /**
     * @param mixed $Khac
     */
    public function setKhac($Khac)
    {
        $this->Khac = $Khac;
    }

    /**
     * @return mixed
     */
    public function getKhac()
    {
        return $this->Khac;
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

    /**
     * @param mixed $Rate1
     */
    public function setRate1($Rate1)
    {
        $this->Rate1 = $Rate1;
    }

    /**
     * @return mixed
     */
    public function getRate1()
    {
        return $this->Rate1;
    }

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


    public function set_Rank($Rank)
    {
        $this->Rank = $Rank;
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

    public $MaND2;

    /**
     * @return mixed
     */
    public function getMaND2()
    {
        return $this->MaND2;
    }

    /**
     * @param mixed $MaND2
     */
    public function setMaND2($MaND2)
    {
        $this->MaND2 = $MaND2;
    }

    public $TenND2;

    /**
     * @return mixed
     */
    public function getTenND2()
    {
        return $this->TenND2;
    }

    /**
     * @param mixed $TenND2
     */
    public function setTenND2($TenND2)
    {
        $this->TenND2 = $TenND2;
    }

    public $GTVND2;

    /**
     * @return mixed
     */
    public function getGTVND2()
    {
        return $this->GTVND2;
    }

    /**
     * @param mixed $GTVND2
     */
    public function setGTVND2($GTVND2)
    {
        $this->GTVND2 = $GTVND2;
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

    public $ThueSuat1;

    /**
     * @return mixed
     */
    public function getThueSuat1()
    {
        return $this->ThueSuat1;
    }

    /**
     * @param mixed $ThueSuat1
     */
    public function setThueSuat1($ThueSuat1)
    {
        $this->ThueSuat1 = $ThueSuat1;
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

    public function checkKeyTrung()
    {
        $sql = "select * from  " . $this->table . " where mapskt='" . $this->getMaPSKT() . "' and loaiphieu='".$this->getLP()."'";
        $this->query($sql);
        if ($this->num_rows() >= 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function checkSoPhieuTonTai()
    {
        $sql = "select * from  " . $this->table . " where sophieu='" . $this->getSoPhieu() . "'";
        $this->query($sql);
        if ($this->num_rows() >= 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function checSoTTCTTonTai()
    {
        $sql = "select * from  chitiet_pskt where sott='" . $this->getSottpsct() . "'";
        $this->query($sql);
        if ($this->num_rows() >= 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }


    public function checkSoHDTrung()
    {
        $sql = "select * from mavt where so_hd='" . $this->get_SoHD() . "' and sott!=" . $this->get_SoTT() . "";
        $this->query($sql);
        if ($this->num_rows() >= 1) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function checkXoa()
    {
        $sql = "select * from " . $this->table_chitietpskt . "  where mapskt='" . $this->getMaPSKT() . "'";
        $this->query($sql);
        if ($this->num_rows() >= 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function checkKeyChaTrung()
    {
        $sql = "select * from mavt where mavt='" . $this->get_MaVTCha() . "'";
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

    public function createSoPhieu()
    {
        $sql = "select max(sophieu) as sophieu from " . $this->table;
        $this->query($sql);
        $data = $this->fetch();
        $chieudai = strlen($data['sophieu']);
        if($chieudai<15){
            return "999".(time())."00";
        }else{
            return ($data['sophieu']+1);
        }

    }

    public function createSoPhieuTime()
    {
        $sub = rand(10,99);
        $ID = trim(trim($_SESSION['UserID']).time()).$sub;
        return (float)$ID;
    }

    public function createMa()
    {
        $sql = "select max(mapskt) as mavt from " . $this->table . "";
        $this->query($sql);
        $data = $this->fetch();
        if ($data['mavt'] != "") {
            return $data['mavt'] + 1000;
        } else {
            return 10000;
        }
    }

    public function gettongtienphieu()
    {
        $sql = "select (gtvnd1+gtvnd2) as tongtien,(sotiennt+sotiennt1) as tongtiennt,sott from chitiet_pskt where sophieu='" . $this->getSoPhieu() . "'";
        $this->query($sql);
        while ($data = $this->fetch()) {
            $trees[] = $data;
        }
        return $trees;
    }

    public function createMaPSKT()
    {
        $sql_w = $this->get_orderby();
        $sql = "select max(CAST(SUBSTRING_INDEX(mapskt,'-',-1) as SIGNED)) as mapskt from " . $this->table . " where $sql_w ";
        $this->query($sql);
        $data = $this->fetch();
        if ($data['mapskt'] != "") {
            return $data['mapskt'] + 1;
        } else {
            return 1;
        }
    }

    function loadListPSKT_W()
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

    function loadListPSKT_W_IN()
    {
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = " and " . $this->get_orderby();
        $sql = "SELECT * FROM " . $this->table . " WHERE 0=0 $sql_w  order by CAST(SUBSTRING_INDEX(mapskt, '-', -1) as UNSIGNED)";
        $this->query($sql);
        $i = 0;
        while ($data = $this->fetch()) {
            $i++;
            $data['STT'] = $i;
            $trees[$data['sophieu']] = $data;
        }
        return $trees;
    }

    function loadListPSKT()
    {
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = " and " . $this->get_orderby();
        $sql = "SELECT chitiet_pskt.*,pskt.ngayghiso,tkco,tentkco,makh,tenkh,makh_nh,tenkh_nh,diachi,masothue,tongcong,tongcongnt,tencanhan,machinhanh from pskt inner join chitiet_pskt on(pskt.sophieu = chitiet_pskt.sophieu) WHERE 0=0 $sql_w  order by sott DESC ";
        $this->query($sql);
        $i = 0;
        while ($data = $this->fetch()) {
            /*$sql1 = "select sum(gtvnd) as gtvnd, sum(gtvnd2) as gtvnd2 from chitiet_pskt where mapskt='".$data['mapskt']."'";
            $query1 = $this->re_query($sql1);
            $data1=$this->re_fetch($query1);
            $tong=0;
            $tonggtvnd = $data1['gtvnd'];
            $tonggtvnd2 = $data1['gtvnd2'];
            $tong= $tonggtvnd+$tonggtvnd2;
            $data['tonggtvn'] = number_format($tong);

            $i++;
            $data['STT'] = $i;*/
            $trees[] = $data;
        }
        return $trees;
    }

    function loadListBTPS()
    {
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = " and " . $this->get_orderby();
        $sql = "SELECT * from buttoanps ";
        $this->query($sql);
        $i = 0;
        while ($data = $this->fetch()) {
            $trees[] = $data;
        }
        return $trees;
    }

    function loadListChiTietPSKT()
    {
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = " and " . $this->get_orderby();
        $sql = "SELECT chitiet_pskt.* from chitiet_pskt WHERE 0=0 $sql_w  order by sott ";
        $this->query($sql);
        $i = 0;
        while ($data = $this->fetch()) {
            $trees[] = $data;
        }
        return $trees;
    }

    function loadListChiTietPSKT_IN($sophieu)
    {
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = " and " . $this->get_orderby();
        $sql = "SELECT chitiet_pskt.* from chitiet_pskt WHERE sophieu in($sophieu)  order by sott DESC ";
        $this->query($sql);
        $i = 0;
        while ($data = $this->fetch()) {
            $trees[$data['sophieu']][] = $data;
        }
        return $trees;
    }

    function demsoluongdongchitiet()
    {
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = " and " . $this->get_orderby();
        $sql = "SELECT count(sott) as soluong from " . $this->table_chitietpskt . "  WHERE 0=0 $sql_w  order by sott ";
        $this->query($sql);
        return $data = $this->fetch();
    }


    /*public function loadListmavt(){
        $fill = $this->get_orderby();
            if($fill!="")
                    $sql_w = " and ".$this->get_orderby();
        $sql="select * from mavt where 0=0 $sql_w " ;
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
    function kiemTraTrungSoHoaDon()
    {// Kiểm tra xem phiếu nhập kho có tòn tại chưa
        $sql = "select chitiet_pskt.sct,pskt.mapskt,ngayghiso,pskt.loaiphieu from pskt inner join chitiet_pskt on (pskt.sophieu = chitiet_pskt.sophieu) where pskt.loaiphieu in ('2','4') and CAST(chitiet_pskt.sct AS SIGNED) ='" . $this->getSCT() . "' and pskt.sophieu!='" . $this->getSoPhieu() . "' and pskt.makh='" . $this->getMaKH() . "'
                union all
                select sct,mapskt,ngayghiso,101 as loaiphieu from psvt where loaiphieu='1' and CAST(sct AS SIGNED) ='" . $this->getSCT()."' and makh='" . $this->getMaKH()."'";
        $this->query($sql);
        if ($this->num_rows() > 0) {
            return $this->fetch();
        } else {
            return FALSE;
        }
    }

    function kiemTraTrungSoHoaDon_Thu()
    {// Kiểm tra xem phiếu nhập kho có tòn tại chưa
        $sql = "select chitiet_pskt.sct,pskt.mapskt,ngayghiso,pskt.loaiphieu from pskt inner join chitiet_pskt on (pskt.sophieu = chitiet_pskt.sophieu) where pskt.loaiphieu in ('1','3') and CAST(chitiet_pskt.sct AS SIGNED) ='" . $this->getSCT() . "' and pskt.sophieu!='" . $this->getSoPhieu() . "' and chitiet_pskt.seri='" . $this->getSeri() . "'
        union all
        select sct,mapskt,ngayghiso,102 as loaiphieu from psvt where seri='" . $this->getSeri() . "' and  loaiphieu='2' and CAST(sct AS SIGNED)='" . $this->getSCT()."'
        ";
        $this->query($sql);
        if ($this->num_rows() > 0) {
            return $this->fetch();
        } else {
            return FALSE;
        }
    }

    public function getPSKT()
    {
        $sql = "select * from " . $this->table . " where sott='" . $this->get_SoTT() . "'";
        $this->query($sql);
        if ($this->num_rows() == 0) {
            return 0;
        } else {
            return $this->fetch();
        }
    }

    public function getTopPSKT()
    {
        $sql = "select max(ngayghiso) as ngayghiso from " . $this->table . " where loaiphieu='" . $this->getLP() . "' order by sott DESC limit 1";
        $this->query($sql);
        if ($this->num_rows() == 0) {
            return 0;
        } else {
            return $this->fetch();
        }
    }

    public function getMaxSoTTCTPSKT()
    {
        $sql = "SELECT AUTO_INCREMENT
                FROM information_schema.tables
                WHERE table_name = 'chitiet_pskt'
                AND table_schema ='" . $_SESSION['TIENTO'] . $_SESSION['MST'] . "_" . $_SESSION['NienDo'] . "'";
        $this->query($sql);
        if ($this->num_rows() == 0) {
            return 0;
        } else {
            return $this->fetch();
        }
    }


    public function themPSKT()
    {
        $sql = "INSERT INTO " . $this->table . "(sophieu,mapskt,ngayghiso,makh,tenkh,diachi,masothue,tkco,tentkco,tongcong,loaiphieu,makh_nh,tenkh_nh,tongcongnt,tencanhan,machinhanh)
                 VALUES('" . $this->getSoPhieu() . "','" . $this->getMaPSKT() . "','" . $this->getNgay() . "','" . $this->getMaKH() . "','" . $this->getTenKH() . "','" . $this->getDiaChi() . "','" . $this->getMaSoThue() . "','" . $this->getMaTKCo() . "','" . $this->getTenTKCo() . "','" . $this->getTongCong() . "','" . $this->getLP() . "','" . $this->getMaKH3() . "','" . $this->getTenKH3() . "','" . $this->getTongCongNT() . "','" . $this->getTenCaNhan() . "','" . $this->getChiNhanhCongTy() . "');";

        $this->query($sql);
    }

    public function themChiTietPSKT()
    {
        $sql = "INSERT INTO " . $this->table_chitietpskt . " (sophieu,mapskt,mauso,seri,sct,ngayhoadon,ngaythanhtoan,mabp,bophan,mand1,noidung1,tkno1,gtvnd1,mand2,noidung2,tkno2,gtvnd2,tongtien,maloai,chuthich,loaiphieu,makhno,tenkhachhang,diachikh,cothuegtgt,thuesuat1,baogomthue,chungtugoc,chiphikhongloaitru,loaitokhai,loaisp,tygia,sotiennt,sotiennt1,tongtiennt,mabimat,loaihddt,congaykhaithue,ngaykhaithue,loaihanghoadichvu,masothuekh,sott,chungtuthamchieu,lacongtrinh,duandautu)
                 VALUES('" . $this->getSoPhieu() . "','" . $this->getMaPSKT() . "','" . $this->getMauSo() . "','" . $this->getSeri() . "','" . $this->getSCT() . "','" . $this->getNgayHD() . "','" . $this->getNgayTT() . "','" . $this->getMaBP() . "','" . $this->getTenBP() . "','" . $this->getMaND() . "','" . $this->getTenND() . "','" . $this->getMaTKNo1() . "','" . $this->getGTVND1() . "','" . $this->getMaND2() . "','" . $this->getTenND2() . "','" . $this->getMaTKNo2() . "','" . $this->getGTVND2() . "','" . $this->getTongTien() . "','" . $this->getMaLoai() . "','" . $this->get_ChuThich() . "','" . $this->getLP() . "','" . $this->getMaKHNo() . "','" . $this->getTenKH2() . "','" . $this->getDiaChi2() . "','" . $this->getCoThueGTGT() . "','" . $this->getThueSuat1() . "','" . $this->getCoBaoGomThue() . "','" . $this->getCoChungTuGoc() . "','" . $this->getChiPhiKhongLoaiTru() . "','" . $this->getLoaiToKhai() . "','" . $this->getLoaiSP() . "','" . $this->getTyGia() . "','" . $this->getSoTienNT1() . "','" . $this->getSoTienNT2() . "','" . $this->getTongTienNT() . "','" . $this->getMaSoBiMat() . "','" . $this->getLoaiHDDT() . "','" . $this->getCoNgayKhaiThue() . "','" . $this->getNgayKhaiThue() . "','" . $this->getLoaiHangHoaDichVu() . "','" . $this->getMaSoThue2() . "','" . $this->getSottpsct() . "','" . $this->getChungTuThamChieu() . "','" . $this->getLaCongTrinh() . "','" . $this->getDuAnDauTu() . "');";

        $this->query($sql);
    }

    public function suaPSKT()
    {
        $sql_dathem = "";
        if (trim($this->getDaThem()) != "") {
            $sql_dathem = "dathem='" . $this->getDaThem() . "',";
        }
        $sql = "UPDATE " . $this->table . " set 
                                ngayghiso='" . $this->getNgay() . "',
                                makh='" . $this->getMaKH() . "',
                                tenkh='" . $this->getTenKH() . "',
								makh_nh='" . $this->getMaKH3() . "',
                                tenkh_nh='" . $this->getTenKH3() . "',
                                diachi='" . $this->getDiaChi() . "',
                                masothue='" . $this->getMaSoThue() . "',
                                tkco='" . $this->getMaTKCo() . "',
                                tentkco='" . $this->getTenTKCo() . "',
								$sql_dathem
                                tongcong='" . $this->getTongCong() . "',
                                tongcongnt='" . $this->getTongCongNT() . "',
                                tencanhan='" . $this->getTenCaNhan() . "',
                                machinhanh='" . $this->getChiNhanhCongTy() . "'
                                
                  WHERE sophieu = '" . $this->getSoPhieu() . "'";
        $this->query($sql);
    }

    public function suaChiTietPSKT()
    {
        $loaihddt = "";
        if($this->getLoaiHDDT()!=0){
            $loaihddt = "loaihddt='" . $this->getLoaiHDDT() . "',";
        }
        $sql = "UPDATE " . $this->table_chitietpskt . " set 
                seri='" . $this->getSeri() . "',
                sct ='" . $this->getSCT() . "',
                mauso ='" . $this->getMauSo() . "',
                ngayhoadon='" . $this->getNgayHD() . "',
                ngaythanhtoan ='" . $this->getNgayTT() . "',
                mabp='" . $this->getMaBP() . "',
                bophan ='" . $this->getTenBP() . "',
                mand1='" . $this->getMaND() . "',
                noidung1='" . $this->getTenND() . "',
                tkno1='" . $this->getMaTKNo1() . "',
                gtvnd1 ='" . $this->getGTVND1() . "',
                thuesuat1 ='" . $this->getThueSuat1() . "',
                mand2='" . $this->getMaND2() . "',
                noidung2 ='" . $this->getTenND2() . "',
                tkno2='" . $this->getMaTKNo2() . "',
                gtvnd2 ='" . $this->getGTVND2() . "',
                tongtien='" . $this->getTongTien() . "',
                tygia='" . $this->getTyGia() . "',
                sotiennt='" . $this->getSoTienNT1() . "',
                sotiennt1='" . $this->getSoTienNT2() . "',
                tongtiennt='" . $this->getTongTienNT() . "',
                maloai='" . $this->getMaLoai() . "',
                chuthich ='" . $this->get_ChuThich() . "',
                loaiphieu='" . $this->getLP() . "',
                makhno='" . $this->getMaKHNo() . "',
                tenkhachhang='" . $this->getTenKH2() . "',
                diachikh='" . $this->getDiaChi2() . "',
                masothuekh='" . $this->getMaSoThue2() . "',
                cothuegtgt='" . $this->getCoThueGTGT() . "',
                baogomthue='" . $this->getCoBaoGomThue() . "',
                chiphikhongloaitru='" . $this->getChiPhiKhongLoaiTru() . "',
                loaitokhai='" . $this->getLoaiToKhai() . "',
                loaisp='" . $this->getLoaiSP() . "',
                mabimat='" . $this->getMaSoBiMat() . "',
                $loaihddt
                chungtugoc='" . $this->getCoChungTuGoc() . "',
                congaykhaithue='" . $this->getCoNgayKhaiThue() . "',
                ngaykhaithue='" . $this->getNgayKhaiThue() . "',
                loaihanghoadichvu='" . $this->getLoaiHangHoaDichVu() . "',
                chungtuthamchieu='" . $this->getChungTuThamChieu() . "',
                lacongtrinh='" . $this->getLaCongTrinh() . "',
                duandautu='" . $this->getDuAnDauTu() . "'
                
       WHERE sott = '" . $this->getSottpsct() . "'";
        $this->query($sql);
    }

    public function xoaPSKT()
    {
        $sql = "delete from " . $this->table . " where sophieu='" . $this->getSoPhieu() . "'";
        $sqlctct = "delete from ct_nhapvattu_ct where sophieu='" . $this->getSoPhieu() . "'";
        $this->query($sql);
        $this->query($sqlctct);
    }

    public function xoaChiTietPSKT()
    {
        $sql = "delete from " . $this->table_chitietpskt . " where sott='" . $this->get_SoTT() . "'";
        $this->query($sql);
    }

    function LayMaKH()
    {
        $sql = "select tenkh,masothue,diachi from makh where makh='" . $this->getMaKH() . "'";
        $this->query($sql);
        if ($this->num_rows() == 0) {
            return 0;
        } else {
            return $this->fetch();
        }
    }

    public function suaRank()
    {
        $sql = "update mand set rank=rank+1
                      WHERE mand = '" . $this->getMaND() . "';";
        $this->query($sql);
    }

    public function suaTongCong()
    {
        $sql = "update " . $this->table . " set tongcong='" . $this->getTongCong() . "'
                      WHERE sophieu = '" . $this->getSoPhieu() . "';";
        $this->query($sql);
    }

    public function xoaCTPSKT_DuThua()
    {

        $sql = "select sophieu from pskt where pskt.dathem='0' and pskt.tendangnhap='" . $_SESSION['User'] . "';";
        $query = $this->re_query($sql);
        $sophieu = "";
        while ($data = $this->re_fetch($query)) {
            $sophieu .= "'" . $data['sophieu'] . "',";
        }
        $string_sophieu = substr($sophieu, 0, -1);

        $sql1 = "delete from pskt 
            where sophieu in ($string_sophieu);";
        $this->query($sql1);

        $sql2 = "delete from chitiet_pskt 
				where sophieu in ($string_sophieu);";
        $this->query($sql2);
    }

    function kiemTraTrungSoHoaDon_VuotXuat()
    {// Kiểm tra xem phiếu nhập kho có tòn tại chưa
        $sql = "select *,(gtvnd1+gtvnd2) as tongtienphieu,pskt.mapskt as mapsktxuat from pskt INNER JOIN chitiet_pskt on(pskt.sophieu = chitiet_pskt.sophieu) where chitiet_pskt.maloai in(1,2) and pskt.loaiphieu='" . $this->getLP() . "'  and ngayhoadon='" . $this->getNgayHD() . "' and makh='" . $this->getMaKH() . "' and pskt.tkco='" . $this->getMaTKCo() . "'";
        $this->query($sql);
        if ($this->num_rows() > 0) {
            return $this->fetch_all();
        } else {
            return FALSE;
        }
    }
}

?>
