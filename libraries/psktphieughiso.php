<?php

class psktphieughiso extends database
{
    public $tringorder;
    public $table = "pskt";
    public $table_chitietpskt = "chitiet_pskt";


    public $MaVT;
    public $MaVTCha;
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
    public  $GTVND2;

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

    public function checkKeyTrung()
    {
        $sql = "select * from  " . $this->table . " where mapskt='" . $this->getMaPSKT() . "' and sott!='" . $this->get_SoTT() . "'";
        $this->query($sql);
        if ($this->num_rows() >= 1) {
            return FALSE;
        } else {
            return TRUE;
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
    public function createSoTT_CT()
    {
        $sql = "select max(sott) as sott from " . $this->table_chitietpskt;
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
        $sql = "select max(mavt) as mavt from " . $this->table . "";
        $this->query($sql);
        $data = $this->fetch();
        if ($data['mavt'] != "") {
            return $data['mavt'] + 1000;
        } else {
            return 10000;
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

    function loadListPSKT()
    {
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = " and " . $this->get_orderby();
        $sql = "SELECT pskt.*,tenkh,diachi,masothue from pskt inner join makh on(pskt.makh = makh.makh) WHERE 0=0 and lp=3 $sql_w  order by sott DESC ";
        $this->query($sql);
        $i = 0;
        while ($data = $this->fetch()) {
            $sql1 = "select sum(gtvnd) as gtvnd, sum(gtvnd2) as gtvnd2 from chitiet_pskt where mapskt='".$data['mapskt']."'";
            $query1 = $this->re_query($sql1);
            $data1=$this->re_fetch($query1);
            $tong=0;
            $tonggtvnd = $data1['gtvnd'];
            $tonggtvnd2 = $data1['gtvnd2'];
            $tong= $tonggtvnd+$tonggtvnd2;
            $data['tonggtvn'] = number_format($tong);

            $i++;
            $data['STT'] = $i;
            $trees[] = $data;
        }
        return $trees;
    }
    function loadInPhieu()// In Phiêu ghi sổ
    {
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = " and " . $this->get_orderby();
        $sql = "select pskt.mapskt,pskt.date,pskt.tkco,chitiet_pskt.mand,chitiet_pskt.mand2,chitiet_pskt.gtvnd,chitiet_pskt.gtvnd2,mand.tennoidung,mand.tkno,chitiet_pskt.chuthich from pskt INNER join chitiet_pskt on (pskt.mapskt=chitiet_pskt.mapskt) INNER JOIN mand ON(chitiet_pskt.mand=mand.mand) WHERE 0=0  $sql_w  ";
        $this->query($sql);
        $i = 0;
        while ($data = $this->fetch()) {
            $sql1 = "select * from mand where mand='".$data['mand2']."'";
            $query1 = $this->re_query($sql1);
            $data1=$this->re_fetch($query1);
            $i++;
            $data['STT'] = $i;
            $data['mand2'] = $data1['mand'];
            $data['tennoidung2'] = $data1['tennoidung'];
            $data['tkno_mand2'] = $data1['tkno'];
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
        $sql = "SELECT chitiet_pskt.*,tennoidung,mand.tkco as tkco_mand from chitiet_pskt INNER JOIN mand on (chitiet_pskt.mand = mand.mand) WHERE 0=0 $sql_w  order by sott ";
        $this->query($sql);
        $i = 0;
        while ($data = $this->fetch()) {
            $sql1 = "select * from mand where mand='".$data['mand2']."'";
            $query1 = $this->re_query($sql1);
            $data1=$this->re_fetch($query1);
            $i++;
            $data['STT'] = $i;
            $data['mand2'] = $data1['mand'];
            $data['tennoidung2'] = $data1['tennoidung'];
            $data['tkco_mand2'] = $data1['tkco'];
            $trees[] = $data;
        }
        return $trees;
    }
    function LayChiTietPSKT()
    {
        $trees="";
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = " and " . $this->get_orderby();
       $sql = "SELECT count(sott) as soluong from " . $this->table_chitietpskt . "  WHERE 0=0 $sql_w  order by sott ";
        $this->query($sql);
        $i = 0;
        while ($data = $this->fetch()) {
            $i++;
            $trees = $data;
        }
        return $trees;
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


    public function themPSKT()
    {
        $sql = "INSERT INTO " . $this->table . "(sott,mapskt,mauso,seri,sct,`date`,datehd,datett,tenvt,quycach,noidung,dvt,dvtp,kl,kt,sl,dgvnd,gtvnd,stvnd,stusd,prepaid,debt,matk,tkno,tkco,mand,makh,makhno,makhco,`comment`,`add`,lp,rate,rate1,vat,ttdb,sogiay,ref,khac,other,address,loaict,maloai,clink,chuthich,mark,tctm)
                 VALUES(" . $this->get_SoTT() . ",'" . $this->getMaPSKT() . "','" . $this->getMauSo() . "','" . $this->getSeri() . "','" . $this->getSCT() . "','" . $this->getNgay() . "','" . $this->getNgayHD() . "','" . $this->getNgayTT() . "','" . $this->get_TenVT() . "','" . $this->get_QuyCach() . "','" . $this->getNoiDung() . "','" . $this->get_DVT() . "','" . $this->get_DVTP() . "','" . $this->get_KL() . "','" . $this->get_KT() . "','" . $this->getSL() . "','" . $this->getDgVND() . "','" . $this->getGTVND() . "','" . $this->getSTVND() . "','" . $this->getSTUSD() . "','" . $this->getPrepaid() . "','" . $this->getDebt() . "','" . $this->get_MaTK() . "','" . $this->getMaTKNo() . "','" . $this->getMaTKCo() . "','" . $this->getMaND() . "','" . $this->getMaKH() . "','" . $this->getMaKHNo() . "','" . $this->getMaKHCo() . "','" . $this->getComment() . "','" . $this->getAdd() . "','" . $this->getLP() . "','" . $this->getRate() . "','" . $this->getRate1() . "','" . $this->getVAT() . "','" . $this->getTTDB() . "','" . $this->getSoGiay() . "','" . $this->getREF() . "','" . $this->Khac . "','" . $this->getOther() . "','" . $this->getAddress . "','" . $this->getLoaiCT() . "','" . $this->getMaLoai() . "','" . $this->getCLink() . "','" . $this->get_ChuThich() . "','" . $this->get_Mark() . "','" . $this->getTCTM() . "');";

        $this->query($sql);
    }

    public function themChiTietPSKT()
    {
        $sql = "INSERT INTO " . $this->table_chitietpskt . " (sott,mapskt,mauso,seri,sct,`date`,datehd,datett,tenvt,quycach,diachi,dvt,dvtp,kl,kt,sl,dgvnd,gtvnd,stvnd,stusd,prepaid,debt,matk,tkno,tkco,mand,makh,makhno,makhco,masothue,`comment`,`add`,lp,rate,rate1,vat,ttdb,sogiay,ref,khac,other,tenkh,address,loaict,maloai,clink,chuthich,mark,tctm,mand2,gtvnd2)
                 VALUES(" . $this->get_SoTT() . ",'" . $this->getMaPSKT() . "','" . $this->getMauSo() . "','" . $this->getSeri() . "','" . $this->getSCT() . "','" . $this->getNgay() . "','" . $this->getNgayHD() . "','" . $this->getNgayTT() . "','" . $this->get_TenVT() . "','" . $this->get_QuyCach() . "','" . $this->getDiaChi() . "','" . $this->get_DVT() . "','" . $this->get_DVTP() . "','" . $this->get_KL() . "','" . $this->get_KT() . "','" . $this->getSL() . "','" . $this->getDgVND() . "','" . $this->getGTVND() . "','" . $this->getSTVND() . "','" . $this->getSTUSD() . "','" . $this->getPrepaid() . "','" . $this->getDebt() . "','" . $this->get_MaTK() . "','" . $this->getMaTKNo() . "','" . $this->getMaTKCo() . "','" . $this->getMaND() . "','" . $this->getMaKH() . "','" . $this->getMaKHNo() . "','" . $this->getMaKHCo() . "','" . $this->getMaSoThue() . "','" . $this->getComment() . "','" . $this->getAdd() . "','" . $this->getLP() . "','" . $this->getRate() . "','" . $this->getRate1() . "','" . $this->getVAT() . "','" . $this->getTTDB() . "','" . $this->getSoGiay() . "','" . $this->getREF() . "','" . $this->Khac . "','" . $this->getOther() . "','" . $this->getTenKH() . "','" . $this->getAddress . "','" . $this->getLoaiCT() . "','" . $this->getMaLoai() . "','" . $this->getCLink() . "','" . $this->get_ChuThich() . "','" . $this->get_Mark() . "','" . $this->getTCTM() . "','" . $this->getMaND2() . "','" . $this->getGTVND2() . "');";

        $this->query($sql);
    }

    public function suaPSKT()
    {
        $sql = "UPDATE " . $this->table . " set 
                                mapskt='".$this->getMaPSKT()."',
                                mauso='" . $this->getMauSo() . "',
                                seri='" . $this->getSeri() . "',
                                sct='" . $this->getSCT() . "',
                                `date`='" . $this->getNgay() . "',
                                datehd='" . $this->getNgayHD() . "',
                                datett='" . $this->getNgayTT() . "',
                                tenvt='" . $this->get_TenVT() . "',
                                quycach='" . $this->get_QuyCach() . "',
                                noidung='" . $this->getNoiDung() . "',
                                dvt='" . $this->get_DVT() . "',
                                dvtp='" . $this->get_DVTP() . "',
                                kl='" . $this->get_KL() . "',
                                kt='" . $this->get_KT() . "',
                                sl='" . $this->getSL() . "',
                                dgvnd='" . $this->getDgVND() . "',
                                gtvnd='" . $this->getGTVND() . "',
                                stvnd='" . $this->getSTVND() . "',
                                stusd='" . $this->getSTUSD() . "',
                                prepaid='" . $this->getPrepaid() . "',
                                debt='" . $this->getDebt() . "',
                                matk='" . $this->get_MaTK() . "',
                                tkno='" . $this->getMaTKNo() . "',
                                tkco='" . $this->getMaTKCo() . "',
                                mand='" . $this->getMaND() . "',
                                makh='" . $this->getMaKH() . "',
                                makhno='" . $this->getMaKHNo() . "',
                                makhco='" . $this->getMaKHCo() . "',
                                comment='" . $this->getComment() . "',
                                `add`='" . $this->getAdd() . "',
                                lp='" . $this->getLP() . "',
                                rate='" . $this->getRate() . "',
                                rate1='" . $this->getRate1() . "',
                                vat='" . $this->getVAT() . "',
                                ttdb='" . $this->getTTDB() . "',
                                sogiay='" . $this->getSoGiay() . "',
                                ref='" . $this->getREF() . "',
                                khac='" . $this->Khac . "',
                                other='" . $this->getOther() . "',
                                address='" . $this->getAddress . "',
                                loaict='" . $this->getLoaiCT() . "',
                                maloai='" . $this->getMaLoai() . "',
                                clink='" . $this->getCLink() . "',
                                chuthich='" . $this->get_ChuThich() . "',
                                mark='" . $this->get_Mark() . "',
                                tctm='" . $this->getTCTM() . "'
       WHERE sott = '" . $this->get_SoTT() . "'";
        $this->query($sql);
    }

    public function suaChiTietPSKT()
    {
       $sql = "UPDATE " . $this->table_chitietpskt . " set 
                                mapskt='" . $this->getMaPSKT() . "',
                                mauso='" . $this->getMauSo() . "',
                                seri='" . $this->getSeri() . "',
                                sct='" . $this->getSCT() . "',
                                `date`='" . $this->getNgay() . "',
                                datehd='" . $this->getNgayHD() . "',
                                datett='" . $this->getNgayTT() . "',
                                tenvt='" . $this->get_TenVT() . "',
                                quycach='" . $this->get_QuyCach() . "',
                                diachi='" . $this->getDiaChi() . "',
                                dvt='" . $this->get_DVT() . "',
                                dvtp='" . $this->get_DVTP() . "',
                                kl='" . $this->get_KL() . "',
                                kt='" . $this->get_KT() . "',
                                sl='" . $this->getSL() . "',
                                dgvnd='" . $this->getDgVND() . "',
                                gtvnd='" . $this->getGTVND() . "',
                                stvnd='" . $this->getSTVND() . "',
                                stusd='" . $this->getSTUSD() . "',
                                prepaid='" . $this->getPrepaid() . "',
                                debt='" . $this->getDebt() . "',
                                matk='" . $this->get_MaTK() . "',
                                tkno='" . $this->getMaTKNo() . "',
                                tkco='" . $this->getMaTKCo() . "',
                                mand='" . $this->getMaND() . "',
                                makh='" . $this->getMaKH() . "',
                                makhno='" . $this->getMaKHNo() . "',
                                makhco='" . $this->getMaKHCo() . "',
                                masothue='" . $this->getMaSoThue() . "',
                                comment='" . $this->getComment() . "',
                                `add`='" . $this->getAdd() . "',
                                lp='" . $this->getLP() . "',
                                rate='" . $this->getRate() . "',
                                rate1='" . $this->getRate1() . "',
                                vat='" . $this->getVAT() . "',
                                ttdb='" . $this->getTTDB() . "',
                                sogiay='" . $this->getSoGiay() . "',
                                ref='" . $this->getREF() . "',
                                khac='" . $this->Khac . "',
                                other='" . $this->getOther() . "',
                                tenkh='" . $this->getTenKH() . "',
                                address='" . $this->getAddress . "',
                                loaict='" . $this->getLoaiCT() . "',
                                maloai='" . $this->getMaLoai() . "',
                                clink='" . $this->getCLink() . "',
                                chuthich='" . $this->get_ChuThich() . "',
                                mark='" . $this->get_Mark() . "',
                                tctm='" . $this->getTCTM() . "',
                                mand2='" . $this->getMaND2() . "',
                                gtvnd2='" . $this->getGTVND2() . "'
       WHERE sott = '" . $this->get_SoTT() . "'";
        $this->query($sql);
    }

    public function xoaPSKT()
    {
        $sql = "delete from " . $this->table . " where sott='" . $this->get_SoTT() . "'";
        $this->query($sql);
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
}

?>
