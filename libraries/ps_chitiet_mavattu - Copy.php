<?php

class ps_chitiet_mavattu extends database
{
    public $tringorder;

    public $MaVT;
    public $MaVTCha;
    public $TenVT;
    public $TenKD;
    public $MaTK;

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
    public $Rate;// Thuế Suất
    public $Mark;// Thu? su?t
    public $CongVao;// Thu? su?t
    public $TruRa;// Thu? su?t
    public $DP;// Thu? su?t
    public $Rank1;// Thu? su?t

    public $ChuThich;
    public $SoTT;

    public $mapskt;

    public $Limit;
    public $DonGiaMT;
    public $ThanhTienMT;
    public $ThueNK;
    public $ThueTTDB;
    public $PhiVC;
    public $PhiBX;
    public $TyGiaNT;
    public $NguyenTeNT;

    /**
     * @return mixed
     */
    public function getTyGiaNT()
    {
        return $this->TyGiaNT;
    }

    /**
     * @param mixed $TyGiaNT
     */
    public function setTyGiaNT($TyGiaNT)
    {
        $this->TyGiaNT = $TyGiaNT;
    }

    /**
     * @return mixed
     */
    public function getNguyenTeNT()
    {
        return $this->NguyenTeNT;
    }

    /**
     * @param mixed $NguyenTeNT
     */
    public function setNguyenTeNT($NguyenTeNT)
    {
        $this->NguyenTeNT = $NguyenTeNT;
    }

    /**
     * @return mixed
     */
    public function getThanhTienNT()
    {
        return $this->ThanhTienNT;
    }

    /**
     * @param mixed $ThanhTienNT
     */
    public function setThanhTienNT($ThanhTienNT)
    {
        $this->ThanhTienNT = $ThanhTienNT;
    }
    public $ThanhTienNT;

    /**
     * @return mixed
     */
    public function getPhiVC()
    {
        return $this->PhiVC;
    }

    /**
     * @param mixed $PhiVC
     */
    public function setPhiVC($PhiVC)
    {
        $this->PhiVC = $PhiVC;
    }

    /**
     * @return mixed
     */
    public function getPhiBX()
    {
        return $this->PhiBX;
    }

    /**
     * @param mixed $PhiBX
     */
    public function setPhiBX($PhiBX)
    {
        $this->PhiBX = $PhiBX;
    }

    /**
     * @return mixed
     */
    public function getThueNK()
    {
        return $this->ThueNK;
    }

    /**
     * @param mixed $ThueNK
     */
    public function setThueNK($ThueNK)
    {
        $this->ThueNK = $ThueNK;
    }

    /**
     * @return mixed
     */
    public function getThueTTDB()
    {
        return $this->ThueTTDB;
    }

    /**
     * @param mixed $ThueTTDB
     */
    public function setThueTTDB($ThueTTDB)
    {
        $this->ThueTTDB = $ThueTTDB;
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

    /**
     * @return mixed
     */
    public function getMapskt()
    {
        return $this->mapskt;
    }

    /**
     * @param mixed $mapskt
     */
    public function setMapskt($mapskt)
    {
        $this->mapskt = $mapskt;
    }

    public $SoLuongNhap;

    /**
     * @return mixed
     */
    public function getSoLuongNhap()
    {
        return $this->SoLuongNhap;
    }

    /**
     * @param mixed $SoLuongNhap
     */
    public function setSoLuongNhap($SoLuongNhap)
    {
        $this->SoLuongNhap = $SoLuongNhap;
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

    public $DonGiaNhap;

    /**
     * @return mixed
     */
    public function getDonGiaNhap()
    {
        return $this->DonGiaNhap;
    }

    /**
     * @param mixed $DonGiaNhap
     */
    public function setDonGiaNhap($DonGiaNhap)
    {
        $this->DonGiaNhap = $DonGiaNhap;
    }

    public $ThueSuat;

    /**
     * @return mixed
     */
    public function getThueSuat()
    {
        return $this->ThueSuat;
    }

    /**
     * @param mixed $ThueSuat
     */
    public function setThueSuat($ThueSuat)
    {
        $this->ThueSuat = $ThueSuat;
    }

    public $ThanhTien;

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

    public $ThanhTienChuaCK;

    /**
     * @return mixed
     */
    public function getThanhTienChuaCK()
    {
        return $this->ThanhTienChuaCK;
    }

    /**
     * @param mixed $ThanhTien
     */
    public function setThanhTienChuaCK($ThanhTienChuaCK)
    {
        $this->ThanhTienChuaCK = $ThanhTienChuaCK;
    }

    public $Thue;

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

    public $ChietKhau;

    /**
     * @return mixed
     */
    public function getChietKhau()
    {
        return $this->ChietKhau;
    }

    /**
     * @param mixed $ChietKhau
     */
    public function setChietKhau($ChietKhau)
    {
        $this->ChietKhau = $ChietKhau;
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

    public $CothueGTGT;

    /**
     * @return mixed
     */
    public function getCothueGTGT()
    {
        return $this->CothueGTGT;
    }

    /**
     * @param mixed $CothueGTGT
     */
    public function setCothueGTGT($CothueGTGT)
    {
        $this->CothueGTGT = $CothueGTGT;
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

    public $ThangTonKho;

    /**
     * @return mixed
     */
    public function getThangTonKho()
    {
        return $this->ThangTonKho;
    }

    /**
     * @param mixed $ThangTonKho
     */
    public function setThangTonKho($ThangTonKho)
    {
        $this->ThangTonKho = $ThangTonKho;
    }

    public $ThangNamTK;

    /**
     * @return mixed
     */
    public function getThangNamTK()
    {
        return $this->ThangNamTK;
    }

    /**
     * @param mixed $ThangNamTK
     */
    public function setThangNamTK($ThangNamTK)
    {
        $this->ThangNamTK = $ThangNamTK;
    }

    public $Thang;

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

    public function checkKeyTrung()
    {
        $sql = "select * from mavt where mavt='" . $this->get_MaVT() . "' and sott!=" . $this->get_SoTT() . "";
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
        $sql = "select * from mavt  where mavt='" . $this->get_MaVT() . "'";
        $this->query($sql);
        if ($this->num_rows() >= 1) {
            return FALSE;
        } else {
            return TRUE;
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

    public function checkSoPhieu()
    {
        $sql = "select * from psvt where sophieu='" . $this->getSoPhieu() . "'";
        $this->query($sql);
        if ($this->num_rows() >= 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function createSoTT()
    {
        $sql = "select max(sott) as sott from mavt";
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
        $sql = "select max(mavt) as mavt from mavt";
        $this->query($sql);
        $data = $this->fetch();
        if ($data['mavt'] != "") {
            return $data['mavt'] + 1000;
        } else {
            return 10000000000000;
        }
    }

    function kiemtrachitietvattu()
    {// kiểm tra xem mã vật tư có tồn tại trông phiếu nhập chưa
        //$sql = "select * from chitiet_psvt where sott= '" . $this->get_SoTT() . "' and mavt='" . $this->get_MaVT() . "' and sophieu= '" . $this->getSoPhieu() . "'";
        $sql = "select * from chitiet_psvt where sott= '" . $this->get_SoTT() . "'";
        $this->query($sql);
        if ($this->num_rows() >= 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function kiemtrachitietvattu_ctct()
    {// kiểm tra xem mã vật tư có tồn tại trông phiếu nhập chưa
        //$sql = "select * from chitiet_psvt where sott= '" . $this->get_SoTT() . "' and mavt='" . $this->get_MaVT() . "' and sophieu= '" . $this->getSoPhieu() . "'";
        $sql = "select * from ct_nhapvattu_ct where sott= '" . $this->get_SoTT() . "'";
        $this->query($sql);
        if ($this->num_rows() >= 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function kiemtraphieuvt()
    {// kiểm tra xem mã vật tư có tồn tại trông phiếu nhập chưa
        $sql = "select * from chitiet_psvt where  sophieu='" . $this->getSoPhieu() . "'";
        $this->query($sql);
        if ($this->num_rows() >= 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function kiemtraphieuvt_ctct()
    {// kiểm tra xem mã vật tư có tồn tại trông phiếu nhập chưa
        $sql = "select * from ct_nhapvattu_ct where  sophieu='" . $this->getSoPhieu() . "'";
        $this->query($sql);
        if ($this->num_rows() >= 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function loadListMaVT_W()
    {
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = " and " . $this->get_orderby();
        $sql = "SELECT * FROM mavt WHERE 0=0 $sql_w  order by mavt";
        $this->query($sql);
        $i = 0;
        while ($data = $this->fetch()) {
            $i++;
            $data['STT'] = $i;
            $trees[] = $data;
        }
        return $trees;
    }

    function loadListMaVT($thang)
    {// Lấy danh sách vật tư nhập trong ps chi tiết
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = " and " . $this->get_orderby();
        $sql = "SELECT sott,mavt,tenvt,dvt,donggianhap,soluongnhap,thuesuat,thanhtien,thanhtienchuack,chietkhau,thue,tienchietkhau,soluongnhap as slcu,soluongnhap as slcuton,donggianhap as dgcu,thuesuat as thuesuatcu,chietkhau as chietkhaucu,dongiamt,thanhtienmt,thuenk,thuettdb,phivc,phibx,tygiant,nguyentent,thanhtiennt FROM chitiet_psvt  WHERE 0=0 and sophieu= '" . $this->getSoPhieu() . "' $sql_w  order by sott";
        $this->query($sql);
        $i = 0;
        $dataton = $this->LoadDanhSachTKHT();
        $datagiavon = $this->LoadDanhSachGiaVon($thang);
        $datatonsp = $this->LoadDanhSachTKSPHT();
        while ($data = $this->fetch()) {
            $mavt = $data['mavt'];

            $i++;
            $data['STT'] = $i;
            $data['soluongton'] = $dataton[$mavt]['slton'];
            $data['thang1'] = $datatonsp[$mavt]['thang1'];
            $data['thang2'] = $datatonsp[$mavt]['thang2'];
            $data['thang3'] = $datatonsp[$mavt]['thang3'];
            $data['thang4'] = $datatonsp[$mavt]['thang4'];
            $data['thang5'] = $datatonsp[$mavt]['thang5'];
            $data['thang6'] = $datatonsp[$mavt]['thang6'];
            $data['thang7'] = $datatonsp[$mavt]['thang7'];
            $data['thang8'] = $datatonsp[$mavt]['thang8'];
            $data['thang9'] = $datatonsp[$mavt]['thang9'];
            $data['thang10'] = $datatonsp[$mavt]['thang10'];
            $data['thang11'] = $datatonsp[$mavt]['thang11'];
            $data['thang12'] = $datatonsp[$mavt]['thang12'];
            $data['gianhap'] = round($datagiavon[$mavt], 2);

            $trees[] = $data;
        }
        return $trees;
    }

    function loadListMaVT_CTCT($mact)
    {// Lấy danh sách vật tư nhập trong ps chi tiết
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = " and " . $this->get_orderby();
        $sql = "SELECT ct_nhapvattu_ct.sott,ct_nhapvattu_ct.mavt,mavt.tenvt,mavt.dvt,ct_nhapvattu_ct.dongia,ct_nhapvattu_ct.soluong,ct_nhapvattu_ct.soluong as slcu,ct_nhapvattu_ct.thanhtien,(select soluong from tmp_tknvlhienthai where tmp_tknvlhienthai.mavt = mavt.mavt and mact='".$mact."' ) as soluongton FROM ct_nhapvattu_ct INNER JOIN mavt on (ct_nhapvattu_ct.mavt = mavt.mavt )  WHERE 0=0 and sophieu= '" . $this->getSoPhieu() . "' $sql_w  order by sott";
        $this->query($sql);
        $i = 0;
       // $dataton = $this->LoadDanhSachTKHT();
        //$datatonsp = $this->LoadDanhSachTKSPHT();
        while ($data = $this->fetch()) {
            $mavt = $data['mavt'];

            $i++;
            $data['STT'] = $i;
            $trees[] = $data;
        }
        return $trees;
    }

    function loadListMaVT_IN($parentid = 0)
    {// Lấy danh sách vật tư nhập trong ps chi tiết
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = " and " . $this->get_orderby();
        $sql = "SELECT chitiet_psvt.sott,chitiet_psvt.mavt,chitiet_psvt.tenvt,chitiet_psvt.dvt,chitiet_psvt.donggianhap,chitiet_psvt.soluongnhap,chitiet_psvt.thuesuat,chitiet_psvt.thanhtien,chitiet_psvt.thanhtienchuack,chitiet_psvt.chietkhau,chitiet_psvt.thue,chitiet_psvt.tienchietkhau,chitiet_psvt.soluongnhap as slcu,chitiet_psvt.soluongnhap as slcuton,chitiet_psvt.donggianhap as dgcu,chitiet_psvt.thuesuat as thuesuatcu,chitiet_psvt.chietkhau as chietkhaucu,chitiet_psvt.sophieu,psvt.mapskt FROM chitiet_psvt inner join psvt on (chitiet_psvt.sophieu = psvt.sophieu)  WHERE 0=0 and chitiet_psvt.sophieu in (" . $this->getSoPhieu() . ") $sql_w  order by chitiet_psvt.sott";
        $this->query($sql);
        $i = 0;
        $dataton = $this->LoadDanhSachTKHT();
        while ($data = $this->fetch()) {
            $mavt = $data['mavt'];

            $i++;
            $data['STT'] = $i;
            $data['soluongton'] = $dataton[$mavt]['slton'];
            $data['gianhap'] = round($dataton[$mavt]['giavon'], 2);

            $trees[$data['sophieu']][] = $data;
        }
        return $trees;
    }

    function loadListMaVTXuatKho_IN($parentid = 0)
    {// Lấy danh sách vật tư nhập trong ps chi tiết
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = " and " . $this->get_orderby();
        $sql = "SELECT chitiet_psvt.sott,chitiet_psvt.mavt,chitiet_psvt.tenvt,chitiet_psvt.dvt,(SELECT dongia from tkthang where chitiet_psvt.mavt = tkthang.mavt AND month(psvt.ngayghiso)=tkthang.thang ) as donggianhap,chitiet_psvt.soluongnhap,chitiet_psvt.thuesuat,chitiet_psvt.soluongnhap*(SELECT dongia from tkthang where chitiet_psvt.mavt = tkthang.mavt AND month(psvt.ngayghiso)=tkthang.thang ) as thanhtien,chitiet_psvt.soluongnhap*(SELECT dongia from tkthang where chitiet_psvt.mavt = tkthang.mavt AND month(psvt.ngayghiso)=tkthang.thang ) as thanhtienchuack,chietkhau,(chitiet_psvt.thuesuat/100)*chitiet_psvt.soluongnhap*(SELECT dongia from tkthang where chitiet_psvt.mavt = tkthang.mavt AND month(psvt.ngayghiso)=tkthang.thang ) as thue,chitiet_psvt.tienchietkhau,soluongnhap as slcu,soluongnhap as slcuton,donggianhap as dgcu,thuesuat as thuesuatcu,chietkhau as chietkhaucu,chitiet_psvt.sophieu,psvt.mapskt FROM chitiet_psvt inner join psvt on (chitiet_psvt.sophieu = psvt.sophieu) WHERE 0=0 and chitiet_psvt.sophieu in (".$this->getSoPhieu().") order by chitiet_psvt.sott";
        $this->query($sql);
        $i = 0;
        $dataton = $this->LoadDanhSachTKHT();
        while ($data = $this->fetch()) {
            $mavt = $data['mavt'];

            $i++;
            $data['STT'] = $i;
            $data['soluongton'] = $dataton[$mavt]['slton'];
            $data['gianhap'] = round($dataton[$mavt]['giavon'], 2);

            $trees[$data['sophieu']][] = $data;
        }
        return $trees;
    }

    function loadListMaVTDaNhapKho($parentid = 0)
    {// Lấy danh sách vật tư nhập trong ps chi tiết
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = " and " . $this->get_orderby();
        $sql = "SELECT sott,mavt,tenvt,dvt,donggianhap,soluongnhap,thuesuat,thanhtien,thanhtienchuack,chietkhau,thue,tienchietkhau,soluongnhap as slcu,soluongnhap as slcuton,donggianhap as dgcu,thuesuat as thuesuatcu,chietkhau as chietkhaucu,0 as tygiant,0 as nguyentent,0 as thanhtiennt FROM chitiet_psvt  WHERE 0=0 and sophieu= '" . $this->getSoPhieu() . "' $sql_w  order by sott";
        $this->query($sql);
        $i = 0;
        while ($data = $this->fetch()) {

            $trees[] = $data;
        }
        return $trees;
    }


    function layChiTietPSVT($parentid = 0)
    {
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = " and " . $this->get_orderby();
        $sql = "SELECT chitiet_psvt.*,mavt.matk FROM chitiet_psvt inner JOIN mavt on(chitiet_psvt.mavt = mavt.mavt)  WHERE 0=0 $sql_w  order by mavt";
        $this->query($sql);
        $i = 0;
        while ($data = $this->fetch()) {
            $i++;
            $data['STT'] = $i;
            $trees[] = $data;
        }
        return $trees;
    }

    function loadListMaVTNotjon($thang)
    {// Lấy danh sách nhập vật tư trong tồn kho
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = " and " . $this->get_orderby();
        $sql = "SELECT 0 as sott,mavt.mavt,mavt.tenvt,mavt.dvt,mavt.giamua as donggianhap,sl as soluongnhap,mavt.rate as thuesuat,sl as thanhtien,sl as thanhtienchuack,dp as chietkhau,sl as thue,sl as tienchietkhau,sl as slcu,sl as slcuton,sl as dgcu,rate as thuesuatcu,dp as chietkhaucu,0 as dongiamt,0 as thanhtienmt,0 as thuenk,0 as thuettdb,0 as phivc,0 as phibx,0 as tygiant,0 as nguyentent,0 as thanhtiennt,tmp_tkhientai.slton as soluongton FROM mavt LEFT JOIN tmp_tkhientai on (mavt.mavt = tmp_tkhientai.mavt) WHERE 0=0 $sql_w  order by tenvt " . $this->getLimit();
        $this->query($sql);
        $i = 0;
        //$dataton = $this->LoadDanhSachTKHT();
        $datagiavon = $this->LoadDanhSachGiaVon($thang);
        while ($data = $this->fetch()) {
            $mavt = $data['mavt'];

            $i++;
            $data['STT'] = $i;
            //$data['soluongton'] = $dataton[$mavt]['slton'];
            $data['gianhap'] = round($datagiavon[$mavt], 2);

            if ($this->getCothueGTGT() == 0) {// Neu khong co thue gtgt thue suat =0
                //$data['thuesuat'] = 0;
            }
            if ($this->getCoChietKhau() == 0) {// Neu khong co thue gtgt thue suat =0
                $data['chietkhau'] = 0;
            }
            $trees[] = $data;
        }
        return $trees;
    }

    function loadListMaVTXuatNotjon($thang)
    {// Lấy danh sách nhập vật tư trong tồn kho
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = " and " . $this->get_orderby();
        $sql="SELECT 0 as sott,mavt.mavt,mavt.tenvt,mavt.dvt,mavt.giaban as donggianhap,sl as soluongnhap,rate as thuesuat,sl as thanhtienchuack,sl as thanhtien,dp as chietkhau,sl as thue,sl as tienchietkhau,sl as slcu,sl as dgcu,rate as thuesuatcu,dp as chietkhaucu,0 as phivc,0 as phibx,0 as tygiant,0 as nguyentent,0 as thanhtiennt,tmp_tkhientai.slton as soluongton FROM mavt LEFT JOIN tmp_tkhientai on (mavt.mavt = tmp_tkhientai.mavt) WHERE 0=0 $sql_w order by tenvt" . $this->getLimit();
         $this->query($sql);
        $i = 0;
        //$dataton = $this->LoadDanhSachTKHT();
        $datagiavon = $this->LoadDanhSachGiaVon($thang);
        $datatonsp = $this->LoadDanhSachTKSPHT();
        while ($data = $this->fetch()) {
            $mavt = $data['mavt'];

            $i++;
            $data['STT'] = $i;
            //$data['soluongton'] = $dataton[$mavt]['slton'];

                $data['thang1'] = $datatonsp[$mavt]['thang1'];
                $data['thang2'] = $datatonsp[$mavt]['thang2'];
                $data['thang3'] = $datatonsp[$mavt]['thang3'];
                $data['thang4'] = $datatonsp[$mavt]['thang4'];
                $data['thang5'] = $datatonsp[$mavt]['thang5'];
                $data['thang6'] = $datatonsp[$mavt]['thang6'];
                $data['thang7'] = $datatonsp[$mavt]['thang7'];
                $data['thang8'] = $datatonsp[$mavt]['thang8'];
                $data['thang9'] = $datatonsp[$mavt]['thang9'];
                $data['thang10'] = $datatonsp[$mavt]['thang10'];
                $data['thang11'] = $datatonsp[$mavt]['thang11'];
                $data['thang12'] = $datatonsp[$mavt]['thang12'];
                $data['gianhap'] = round($datagiavon[$mavt], 2);
            if ($this->getCothueGTGT() == 0) {// Neu khong co thue gtgt thue suat =0
               // $data['thuesuat'] = 0;
            }
            if ($this->getCoChietKhau() == 0) {// Neu khong co thue gtgt thue suat =0
                $data['chietkhau'] = 0;
            }
            $trees[] = $data;
        }
        return $trees;
    }

    function loadListMaVTXuat_CTCT_Notjon($mact)
    {// Lấy danh sách nhập vật tư trong tồn kho
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = " and " . $this->get_orderby();
        $sql = "SELECT 0 as sott,mavt,tenvt,dvt,0 as dongia,0 as soluong,0 as slcu,0 as thanhtien,(select soluong from tmp_tknvlhienthai where tmp_tknvlhienthai.mavt = mavt.mavt and mact='".$mact."' )  as soluongton FROM mavt WHERE 0=0 $sql_w  order by tenvt " . $this->getLimit();
        $this->query($sql);
        $i = 0;
        //$dataton = $this->LoadDanhSachTKHT();
        //$datatonsp = $this->LoadDanhSachTKSPHT();
        while ($data = $this->fetch()) {
            $mavt = $data['mavt'];

            $i++;
            $data['STT'] = $i;
           // $data['soluongton'] = $dataton[$mavt]['slton'];

           // $data['gianhap'] = round($dataton[$mavt]['giavon'], 2);

            $trees[] = $data;
        }
        return $trees;
    }

    function loadListMaVTUnion($thang)
    {// Lấy danh sách nhập vật tư trong tồn kho khi nhấn INSERT
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = " and " . $this->get_orderby();
        $sql = "SELECT chitiet_psvt.sott,chitiet_psvt.mavt,chitiet_psvt.tenvt,chitiet_psvt.dvt,chitiet_psvt.donggianhap,chitiet_psvt.soluongnhap,chitiet_psvt.thuesuat,chitiet_psvt.thanhtien,thanhtienchuack,chietkhau,thue,tienchietkhau,chitiet_psvt.soluongnhap as slcu,chitiet_psvt.soluongnhap as slcuton,chitiet_psvt.donggianhap as dgcu,chitiet_psvt.thuesuat as thuesuatcu,chietkhau as chietkhaucu,dongiamt,thanhtienmt,thuenk,thuettdb,phivc,phibx,tygiant,nguyentent,thanhtiennt,tmp_tkhientai.slton as soluongton FROM chitiet_psvt LEFT JOIN tmp_tkhientai on (chitiet_psvt.mavt = tmp_tkhientai.mavt) WHERE sophieu= '" . $this->getSoPhieu() . "' $sql_w  
        UNION ALL 
        SELECT 0 as sott,mavt.mavt,mavt.tenvt,mavt.dvt,mavt.giamua as donggianhap,sl as soluongnhap,mavt.rate as thuesuat,sl as thanhtien,sl as thanhtienchuack,dp as chietkhau,sl as thue,sl as tienchietkhau,sl as slcu,sl as slcuton,sl as dgcu,rate as thuesuatcu,dp as chietkhaucu,0 as dongiamt,0 as thanhtienmt,0 as thuenk,0 as thuettdb,0 as phivc,0 as phibx,0 as tygiant,0 as nguyentent,0 as thanhtiennt,tmp_tkhientai.slton as soluongton FROM mavt LEFT JOIN tmp_tkhientai on (mavt.mavt = tmp_tkhientai.mavt) WHERE 0=0 $sql_w order by tenvt " . $this->getLimit();
        $this->query($sql);
        $i = 0;
        $dataton = $this->LoadDanhSachGiaVon($thang);

        while ($data = $this->fetch()) {
            $mavt = $data['mavt'];

            $i++;
            $data['STT'] = $i;
           // $data['soluongton'] = $dataton[$mavt]['slton'];


               // $data['soluongton'] = $dataton[$mavt]['slton'];

                $data['thang1'] = $datatonsp[$mavt]['thang1'];
                $data['thang2'] = $datatonsp[$mavt]['thang2'];
                $data['thang3'] = $datatonsp[$mavt]['thang3'];
                $data['thang4'] = $datatonsp[$mavt]['thang4'];
                $data['thang5'] = $datatonsp[$mavt]['thang5'];
                $data['thang6'] = $datatonsp[$mavt]['thang6'];
                $data['thang7'] = $datatonsp[$mavt]['thang7'];
                $data['thang8'] = $datatonsp[$mavt]['thang8'];
                $data['thang9'] = $datatonsp[$mavt]['thang9'];
                $data['thang10'] = $datatonsp[$mavt]['thang10'];
                $data['thang11'] = $datatonsp[$mavt]['thang11'];
                $data['thang12'] = $datatonsp[$mavt]['thang12'];
            $data['gianhap'] = round($dataton[$mavt]['giavon'], 2);

            if ($this->getCothueGTGT() == 0) {// Neu khong co thue gtgt thue suat =0
               // $data['thuesuat'] = 0;
            }
            if ($this->getCoChietKhau() == 0) {// Neu khong co thue gtgt thue suat =0
                $data['chietkhau'] = 0;
            }
            $trees[] = $data;
        }
        return $trees;
    }

    function loadListMaVTXuatUnion($thang)
    {// Lấy danh sách nhập vật tư trong tồn kho khi nhấn INSERT
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = " and " . $this->get_orderby();
        $sql = "SELECT chitiet_psvt.sott,chitiet_psvt.mavt,chitiet_psvt.tenvt,chitiet_psvt.dvt,donggianhap,chitiet_psvt.soluongnhap,chitiet_psvt.thuesuat,chitiet_psvt.thanhtien,thanhtienchuack,chietkhau,thue,tienchietkhau,chitiet_psvt.soluongnhap as slcu,donggianhap as dgcu,thue as thuesuatcu,chietkhau as chietkhaucu,phivc,phibx,tygiant,nguyentent,thanhtiennt,tmp_tkhientai.slton as soluongton FROM chitiet_psvt LEFT JOIN tmp_tkhientai on (chitiet_psvt.mavt = tmp_tkhientai.mavt) WHERE sophieu= '" . $this->getSoPhieu() . "' $sql_w  
        UNION ALL 
		SELECT 0 as sott,mavt.mavt,mavt.tenvt,mavt.dvt,mavt.giaban as donggianhap,sl as soluongnhap,rate as thuesuat,sl as thanhtienchuack,sl as thanhtien,dp as chietkhau,sl as thue,sl as tienchietkhau,sl as slcu,sl as dgcu,rate as thuesuatcu,dp as chietkhaucu,0 as phivc,0 as phibx,0 as tygiant,0 as nguyentent,0 as thanhtiennt,tmp_tkhientai.slton as soluongton FROM mavt LEFT JOIN tmp_tkhientai on (mavt.mavt = tmp_tkhientai.mavt) WHERE 0=0 $sql_w order by tenvt" . $this->getLimit();
        $this->query($sql);
        $i = 0;
        //$dataton = $this->LoadDanhSachTKHT();
        $datagiavon = $this->LoadDanhSachGiaVon($thang);
        $datatonsp = $this->LoadDanhSachTKSPHT();
        while ($data = $this->fetch()) {
            $mavt = $data['mavt'];

            $i++;
            $data['STT'] = $i;
            //$data['soluongton'] = $dataton[$mavt]['slton'];

                $data['thang1'] = $datatonsp[$mavt]['thang1'];
                $data['thang2'] = $datatonsp[$mavt]['thang2'];
                $data['thang3'] = $datatonsp[$mavt]['thang3'];
                $data['thang4'] = $datatonsp[$mavt]['thang4'];
                $data['thang5'] = $datatonsp[$mavt]['thang5'];
                $data['thang6'] = $datatonsp[$mavt]['thang6'];
                $data['thang7'] = $datatonsp[$mavt]['thang7'];
                $data['thang8'] = $datatonsp[$mavt]['thang8'];
                $data['thang9'] = $datatonsp[$mavt]['thang9'];
                $data['thang10'] = $datatonsp[$mavt]['thang10'];
                $data['thang11'] = $datatonsp[$mavt]['thang11'];
                $data['thang12'] = $datatonsp[$mavt]['thang12'];

            $data['gianhap'] = round($datagiavon[$mavt], 2);
            if ($this->getCothueGTGT() == 0) {// Neu khong co thue gtgt thue suat =0
                //$data['thuesuat'] = 0;
            }
            if ($this->getCoChietKhau() == 0) {// Neu khong co thue gtgt thue suat =0
                $data['chietkhau'] = 0;
            }
            $trees[] = $data;
        }
        return $trees;
    }

    function loadListMaVTXuat_CTCT_Union($mact)
    {// Lấy danh sách nhập vật tư trong tồn kho khi nhấn INSERT
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = " and " . $this->get_orderby();
                $sql = "SELECT ct_nhapvattu_ct.sott,ct_nhapvattu_ct.mavt,mavt.tenvt,mavt.dvt,ct_nhapvattu_ct.dongia,ct_nhapvattu_ct.soluong,ct_nhapvattu_ct.soluong as slcu,ct_nhapvattu_ct.thanhtien,(select soluong from tmp_tknvlhienthai where tmp_tknvlhienthai.mavt = mavt.mavt and tmp_tknvlhienthai.mact='".$mact."' )  as soluongton FROM ct_nhapvattu_ct INNER JOIN mavt on (ct_nhapvattu_ct.mavt = mavt.mavt ) WHERE 0=0 AND sophieu= '" . $this->getSoPhieu() . "' $sql_w  
        UNION ALL 
		        SELECT 0 as sott,mavt,tenvt,dvt,0 as dongia,0 as soluong,0 as slcu,0 as thanhtien,(select soluong from tmp_tknvlhienthai where tmp_tknvlhienthai.mavt = mavt.mavt and mact='".$mact."' )  as soluongton FROM mavt WHERE 0=0 $sql_w order by tenvt" . $this->getLimit();
        $this->query($sql);
        $i = 0;
        $dataton = $this->LoadDanhSachTKHT();
        $datatonsp = $this->LoadDanhSachTKSPHT();
        while ($data = $this->fetch()) {
            $mavt = $data['mavt'];

            $i++;
            $data['STT'] = $i;
           // $data['soluongton'] = $dataton[$mavt]['slton'];

            //$data['gianhap'] = round($dataton[$mavt]['giavon'], 2);
            $trees[] = $data;
        }
        return $trees;
    }
    function loadListDanhSachTKChiTietCuoiKy()
    {// // Không sử dụng nửa
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = " and " . $this->get_orderby();
        $sql = "select mavt,tenvt,dvt,matk FROM tk UNION SELECT chitiet_psvt.mavt,chitiet_psvt.tenvt,chitiet_psvt.dvt,mavt.matk FROM chitiet_psvt inner JOIN psvt on (psvt.sophieu=chitiet_psvt.sophieu) LEFT JOIN mavt on (chitiet_psvt.mavt = mavt.mavt) where ngayhoadon<='" . $this->getThangTonKho() . "' ";
        $this->query($sql);
        $i = 0;
        while ($data = $this->fetch()) {
            $mavt = $data['mavt'];
            $sqlnhap = "select sum(soluongnhap) as soluongnhap,SUM(thanhtien) as thanhtien,chitiet_psvt.mavt from psvt INNER join chitiet_psvt on (psvt.sophieu=chitiet_psvt.sophieu) where loaiphieu=1 and chitiet_psvt.mavt='" . $mavt . "' and ngayhoadon>='" . $this->getThangNamTK() . "' and ngayhoadon<='" . $this->getThangTonKho() . "' group by chitiet_psvt.mavt";// Nhập hàng trông tháng
            $sqlxuat = " select sum(soluongnhap) as soluongnhap,SUM(thanhtien) as thanhtien,chitiet_psvt.mavt from psvt INNER join chitiet_psvt on (psvt.sophieu=chitiet_psvt.sophieu) where loaiphieu in ('2','3') and chitiet_psvt.mavt='" . $mavt . "' and ngayhoadon>='" . $this->getThangNamTK() . "' and  ngayhoadon<='" . $this->getThangTonKho() . "' group by chitiet_psvt.mavt";// Xuất hàng trong tháng
            $sqlton = " SELECT mavt,soluong,thanhtien FROM tk_tmp where mavt='" . $mavt . "'";// Tồn đầu kỳ

            $querynhap = $this->re_query($sqlnhap);
            $datanhap = $this->re_fetch($querynhap);
            //debug($datanhap['soluongnhap']);
            $soluongnhap = $datanhap['soluongnhap'];
            $thanhtiennhap = $datanhap['thanhtien'];

            $queryxuat = $this->re_query($sqlxuat);
            $dataxuat = $this->re_fetch($queryxuat);
            $soluongxuat = $dataxuat['soluongnhap'];
            $thanhtienxuat = $dataxuat['thanhtien'];

            $queryton = $this->re_query($sqlton);
            $dataton = $this->re_fetch($queryton);

            $soluongtondk = $dataton['soluong'];
            $thanhtientondk = $dataton['thanhtien'];

            $soluongtonck = $soluongtondk + ($soluongnhap - $soluongxuat);
            $thanhtientonck = ($thanhtientondk + ($thanhtiennhap - $thanhtienxuat));
            $dongiabinhquan = ($thanhtientondk + $thanhtiennhap) / ($soluongtondk + $soluongnhap);

            $i++;
            $data['STT'] = $i;
            $data['sott'] = "";

            $data['nhap'] = $thanhtiennhap;
            $data['soluongtondk'] = $soluongtondk;
            $data['thanhtientondk'] = $thanhtientondk;

            $data['soluongnhap'] = $soluongnhap;
            $thanhtiennhap = round($dongiabinhquan * $soluongnhap);
            $data['thanhtiennhap'] = $thanhtiennhap;

            $data['soluongxuat'] = $soluongxuat;
            //$thanhtienxuat = -($thanhtientonck-$thanhtientondk-$thanhtiennhap);
            $thanhtienxuat = $soluongxuat * $dongiabinhquan;
            $data['thanhtienxuat'] = $thanhtienxuat;


            $data['soluongtonck'] = $soluongtonck;
            $data['thanhtientonck'] = $thanhtientonck;
            $data['dongiabinhquan'] = $dongiabinhquan;

            //$data['soluongton']=$tonconlai;
            //$data['thanhtien']=$thanhtien;
            $data['dongia'] = $dongiabinhquan;
            $trees[] = $data;
        }
        return $trees;
    }

    function loadddanhsach_mabp_cuahanghoa($thangtk)
    {// // Không sử dụng nửa
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = " and " . $this->get_orderby();
        $sql = "SELECT *,sum(thanhtien) as tongthanhtien from tmp_mabp_psvt  WHERE loaiphieu!=1 group by mabp,tkno,tkco ";
        $sql_emp_pskt = "delete from pskt where loaiphieu=67 ";
        $this->re_query($sql_emp_pskt);

        $sql_emp_chitiet_pskt = "delete from chitiet_pskt where loaiphieu=67 ";
        $this->re_query($sql_emp_chitiet_pskt);
        $this->query($sql);
        $i = 0;
        while ($item = $this->fetch()) {

            $value_pskt.= "('".$item['sophieu']."','".$item['mapskt']."','".$thangtk."','".$item['tkno']."','67','".abs($item['tongthanhtien'])."'),";
            $value_chitiet_pskt.= "('".$item['mapskt']."','".$thangtk."','".abs($item['tongthanhtien'])."','".$item['mabp']."','". $item['tenbp']."','".$item['mand']."','".$item['noidung']."','".$item['tkco']."','".abs($item['tongtien'])."','4','67','".$item['sophieu']."'),";
        }
        $sql_pskt = "insert into pskt(sophieu,mapskt,ngayghiso,tkco,loaiphieu,tongcong) VALUE ".substr($value_pskt,0,-1);
        $sql_chitiet_pskt = "insert into chitiet_pskt(mapskt,ngayhoadon,gtvnd1,mabp,bophan,mand1,noidung1,tkno1,tongtien,maloai,loaiphieu,sophieu) VALUE ".substr($value_chitiet_pskt,0,-1);
        $this->re_query($sql_pskt);
        $this->re_query($sql_chitiet_pskt);
    }

    function loadListDanhSachTKChiTietCuoiKyTheoNhom()
    {// Tính tồn kho cuối kỳ theo từ ngày đến ngày
        $trees = array();
        $sqlg = "select * from manhom ORDER by rank DESC";
        $queryg = $this->re_query($sqlg);
        $dem = 0;
        while ($datag = $this->re_fetch($queryg)) {
            $dem++;
            $manhom = (int)($datag['manhom']);

            $fill = $this->get_orderby();
            if ($fill != "")
                $sql_w = " and " . $this->get_orderby();
            $sql = "select mavt,tenvt,dvt,matk FROM mavt where manhom='" . $datag['manhom'] . "' order by tenvt ";
            $this->query($sql);
            $i = 0;
            $datanhap = $this->TinhPhatSinhNhap($this->getThangNamTK(), $this->getThangTonKho());
            $dataxuat = $this->TinhPhatSinhXuat($this->getThangNamTK(), $this->getThangTonKho());
            $dataton = $this->TinhPhatSinhTonDKTuTKTMP();

            while ($data = $this->fetch()) {
                $mavt = $data['mavt'];

                if ($datanhap == 0) {
                    $soluongnhap = 0;
                    $thanhtiennhap = 0;
                } else {
                    $soluongnhap = $datanhap[$mavt]['soluong'];
                    $thanhtiennhap = $datanhap[$mavt]['thanhtien'];
                }

                if ($dataxuat == 0) {
                    $soluongxuat = 0;
                    $thanhtienxuat = 0;
                } else {
                    $soluongxuat = $dataxuat[$mavt]['soluong'];
                    $thanhtienxuat = $dataxuat[$mavt]['thanhtien'];
                }

                if ($dataton == 0) {
                    $soluongtondk = 0;
                    $thanhtientondk = 0;
                } else {
                    $soluongtondk = $dataton[$mavt]['soluong'];
                    $thanhtientondk = $dataton[$mavt]['thanhtien'];
                }

                $soluongtonck = $soluongtondk + ($soluongnhap - $soluongxuat);// Số lượng tồn cuối kỳ = Sl đầu kỳ + (SL Nhập -SL Xuất))
                $dongiabinhquan = ($thanhtientondk + $thanhtiennhap) / ($soluongtondk + $soluongnhap); // Đơn giá Bình Quân
                $thanhtientonck = $soluongtonck * $dongiabinhquan;

                $i++;
                $data['STT'] = $i;
                $data['sott'] = "";

                $data['nhap'] = $thanhtiennhap;
                $data['soluongtondk'] = $soluongtondk;
                $data['thanhtientondk'] = $thanhtientondk;

                $data['soluongnhap'] = $soluongnhap;
                $data['thanhtiennhap'] = $thanhtiennhap;

                $data['soluongxuat'] = $soluongxuat;

                $data['thanhtienxuat'] = $thanhtienxuat;


                $data['soluongtonck'] = $soluongtonck;

                $data['thanhtientonck'] = $thanhtientonck;
                $data['dongiabinhquan'] = $dongiabinhquan;

                $data['dongia'] = $dongiabinhquan;
                $trees[$datag['tennhom']][] = $data;
            }
        }

        return $trees;
    }

    function loadListDanhSachTKTheoThangChiTietCuoiKyTheoNhom($InSoAm)
    {// Xuất tòn kho cuối kỳ theo từng tháng
        $trees = array();
        $sqlg = "select * from manhom ORDER by rank DESC";
        $queryg = $this->re_query($sqlg);
        $dem = 0;
        while ($datag = $this->re_fetch($queryg)) {
            $dem++;
            $manhom = (int)($datag['manhom']);

            $fill = $this->get_orderby();
            if ($fill != "")
                $sql_w = " and " . $this->get_orderby();
            if ($InSoAm == 1)
                $sql = "select * from tkthang where thang=" . $this->getThang() . " and manhom=" . $manhom . " and ROUND(soluongtonck,1)!=0 order by tenvt";
            if ($InSoAm == 2)
                $sql = "select * from tkthang where thang=" . $this->getThang() . " and manhom=" . $manhom . " and ROUND(soluongtonck,1) >0 order by tenvt";
            if ($InSoAm == 3)
                $sql = "select * from tkthang where thang=" . $this->getThang() . " and manhom=" . $manhom . " and ROUND(soluongtonck,1) < 0 order by tenvt";
            if ($InSoAm == 4)
                $sql = "select * from tkthang where thang=" . $this->getThang() . " and manhom=" . $manhom . " order by tenvt ";
            $this->query($sql);
            $i = 0;
            while ($data = $this->fetch()) {
                $mavt = $data['mavt'];

                $i++;
                $data['STT'] = $i;
                $data['sott'] = "";
                $data['nhap'] = $data['thanhtiennhap'];
                $data['soluongtondk'] = $data['soluong'];
                $data['thanhtientondk'] = $data['thanhtien'];
                $data['soluongnhap'] = $data['soluongnhap'];
                $data['thanhtiennhap'] = $data['thanhtiennhap'];
                $data['soluongxuat'] = $data['soluongxuat'];
                $data['thanhtienxuat'] = $data['thanhtienxuat'];
                $data['soluongtonck'] = $data['soluongtonck'];
                $data['thanhtientonck'] = $data['thanhtientonck'];
                $data['dongiabinhquan'] = $data['dongiabinhquan'];
                $data['dongia'] = $data['dongiabinhquan'];
                $trees[$datag['tennhom']][] = $data;
            }
        }
        return $trees;
    }


    function loadListDanhSachTKChiTiet()
    {// Tính tồn kho từ ngày đến ngày và ghi vào tk_tmp
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = " and " . $this->get_orderby();
        $sql = "select mavt,tenvt,dvt FROM tk UNION SELECT mavt,tenvt,dvt FROM chitiet_psvt inner JOIN psvt on (psvt.sophieu=chitiet_psvt.sophieu) where ngayghiso<='" . $this->getThangNamTK() . "' ";
        $this->query($sql);
        $sql_emp = "TRUNCATE tk_tmp";
        $this->re_query($sql_emp);
        $count = $this->num_rows();
        $i = 0;

        $datanhap = $this->TinhPhatSinhNhapDK($this->getThangNamTK());
        $dataxuat = $this->TinhPhatSinhXuatDK($this->getThangNamTK());
        $dataton = $this->TinhPhatSinhTonDKTuTK();
        while ($data = $this->fetch()) {
            $mavt = $data['mavt'];

            if ($datanhap == 0) {
                $soluongnhap = 0;
                $thanhtiennhap = 0;
            } else {
                $soluongnhap = $datanhap[$mavt]['soluong'];
                $thanhtiennhap = $datanhap[$mavt]['thanhtien'];
            }

            if ($dataxuat == 0) {
                $soluongxuat = 0;
                $thanhtienxuat = 0;
            } else {
                $soluongxuat = $dataxuat[$mavt]['soluong'];
                $thanhtienxuat = $dataxuat[$mavt]['thanhtien'];
            }

            if ($dataton == 0) {
                $soluongtondk = 0;
                $thanhtientondk = 0;
            } else {
                $soluongtondk = $dataton[$mavt]['soluong'];
                $thanhtientondk = $dataton[$mavt]['thanhtien'];
            }

            $soluongtonck = $soluongtondk + ($soluongnhap - $soluongxuat);
            $thanhtientonck = ($thanhtientondk + ($thanhtiennhap - $thanhtienxuat));
            $dongiabinhquan = ($thanhtientondk + $thanhtiennhap) / ($soluongtondk + $soluongnhap);


            $i++;
            $data['STT'] = $i;
            $data['sott'] = "";

            $data['nhap'] = $thanhtiennhap;
            $data['soluongtondk'] = $soluongtondk;
            $data['thanhtientondk'] = $thanhtientondk;

            $data['soluongnhap'] = $soluongnhap;
            //$thanhtiennhap = round($dongiabinhquan*$soluongnhap);
            $data['thanhtiennhap'] = $thanhtiennhap;

            $data['soluongxuat'] = $soluongxuat;

            $data['thanhtienxuat'] = $thanhtienxuat;


            $data['soluongtonck'] = $soluongtonck;
            if ($soluongtonck == 0) {
                $data['thanhtientonck'] = 0;
            } else {
                $data['thanhtientonck'] = $soluongtonck * $dongiabinhquan;
            }
            $data['dongiabinhquan'] = $dongiabinhquan;
            $dauphay = ",";
            if ($count == $i) {
                $dauphay = "";
            }
            $value .= "('" . $data['mavt'] . "','" . $data['tenvt'] . "','" . $soluongtonck . "','" . $dongiabinhquan . "','" . $thanhtientonck . "')" . $dauphay;

            $trees[] = $data;
        }
        $sql_ins = "insert into tk_tmp(mavt,tenvt,soluong,dongia,thanhtien) VALUE $value";
        $this->re_query($sql_ins);
        return $trees;
    }

    function loadListDanhSachTKChuyen()
    {// Không sử dụng nửa
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = " and " . $this->get_orderby();
        $sql = "select tk.mavt,tk.tenvt,tk.dvt,tk.matk,tk.quycach,tk.manhom,tk.tennhom,mavt.rate,mavt.dp as chietkhau FROM tk LEFT JOIN mavt on (tk.mavt = mavt.mavt) UNION 
						SELECT chitiet_psvt.mavt,chitiet_psvt.tenvt,chitiet_psvt.dvt,mavt.matk,mavt.quycach,mavt.manhom,manhom.tennhom,mavt.rate,mavt.dp 
						FROM chitiet_psvt 
						inner JOIN psvt on (psvt.sophieu=chitiet_psvt.sophieu) 
						LEFT JOIN mavt on (chitiet_psvt.mavt = mavt.mavt)
						 INNER JOIN manhom on (mavt.manhom=manhom.manhom)
						where ngayhoadon<='" . $this->getThangNamTK() . "' ";
        $this->query($sql);
        $sql_emp = "TRUNCATE tkkc_tmp";
        $this->re_query($sql_emp);
        $count = $this->num_rows();
        $i = 0;
        while ($data = $this->fetch()) {
            $mavt = $data['mavt'];
            $sqlnhap = "select sum(soluongnhap) as soluongnhap,SUM(thanhtien) as thanhtien,chitiet_psvt.mavt from psvt INNER join chitiet_psvt on (psvt.sophieu=chitiet_psvt.sophieu) where loaiphieu=1 and chitiet_psvt.mavt='" . $mavt . "' and ngayhoadon<='" . $this->getThangNamTK() . "' group by chitiet_psvt.mavt";// Nhập hàng trông tháng
            $sqlxuat = " select sum(soluongnhap) as soluongnhap,SUM(thanhtien) as thanhtien,chitiet_psvt.mavt from psvt INNER join chitiet_psvt on (psvt.sophieu=chitiet_psvt.sophieu) where loaiphieu in ('2','3') and chitiet_psvt.mavt='" . $mavt . "' and ngayhoadon<='" . $this->getThangNamTK() . "' group by chitiet_psvt.mavt";// Xuất hàng trong tháng
            $sqlton = " SELECT mavt,slck,dgxvnd FROM tk where mavt='" . $mavt . "'";// Tồn đầu kỳ

            $querynhap = $this->re_query($sqlnhap);
            $datanhap = $this->re_fetch($querynhap);
            //debug($datanhap['soluongnhap']);
            $soluongnhap = $datanhap['soluongnhap'];
            $thanhtiennhap = $datanhap['thanhtien'];

            $queryxuat = $this->re_query($sqlxuat);
            $dataxuat = $this->re_fetch($queryxuat);
            $soluongxuat = $dataxuat['soluongnhap'];
            $thanhtienxuat = $dataxuat['thanhtien'];

            $queryton = $this->re_query($sqlton);
            $dataton = $this->re_fetch($queryton);

            $soluongtondk = $dataton['slck'];
            $thanhtientondk = $dataton['dgxvnd'];

            $soluongtonck = $soluongtondk + ($soluongnhap - $soluongxuat);
            $thanhtientonck = ($thanhtientondk + ($thanhtiennhap - $thanhtienxuat));
            $dongiabinhquan = ($thanhtientondk + $thanhtiennhap) / ($soluongtondk + $soluongnhap);

            $i++;
            $data['STT'] = $i;
            $data['sott'] = "";

            $data['nhap'] = $thanhtiennhap;
            $data['soluongtondk'] = $soluongtondk;
            $data['thanhtientondk'] = $thanhtientondk;

            $data['soluongnhap'] = $soluongnhap;
            $thanhtiennhap = round($dongiabinhquan * $soluongnhap);
            $data['thanhtiennhap'] = $thanhtiennhap;

            $data['soluongxuat'] = $soluongxuat;
            //$thanhtienxuat = -($thanhtientonck-$thanhtientondk-$thanhtiennhap);
            $thanhtienxuat = $soluongxuat * $dongiabinhquan;
            $data['thanhtienxuat'] = $thanhtienxuat;


            $data['soluongtonck'] = $soluongtonck;
            $data['thanhtientonck'] = $thanhtientonck;
            $data['dongiabinhquan'] = $dongiabinhquan;
            $dauphay = ",";
            if ($count == $i) {
                $dauphay = "";
            }
            $value .= "('" . $data['mavt'] . "','" . $data['tenvt'] . "','" . $soluongtonck . "','" . $dongiabinhquan . "','" . $thanhtientonck . "','" . $data['matk'] . "','" . $data['dvt'] . "','" . $data['rate'] . "','" . $data['chietkhau'] . "','" . $data['manhom'] . "','" . $data['tennhom'] . "','" . $data['quycach'] . "')" . $dauphay;


            //$data['soluongton']=$tonconlai;
            //$data['thanhtien']=$thanhtien;
            //$data['dongia']=$dongiabinhquan;
            $trees[] = $data;
        }
        $sql_ins = "insert into tkkc_tmp(mavt,tenvt,soluong,dongia,thanhtien,matk,dvt,thuesuat,chietkhau,manhom,tennhom,quycach) VALUE $value";
        $this->re_query($sql_ins);
        return $trees;
    }

    function themdanhsach_mabp_cuahanghoa()
    {// Tính ton kho tháng lấy từ file tk và ghi vào file tk_thang
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = " and " . $this->get_orderby();
        $sql_emp = "delete from tmp_mabp_pskt ";
        $this->re_query($sql_emp);

        $sql = "insert into tmp_mabp_psvt  SELECT psvt.sophieu,psvt.mapskt,psvt.makho as mabp,psvt.tenkho as tenbp,tkthang.mavt,tkthang.tenvt,chitiet_psvt.soluongnhap,month(ngayghiso) as thang,dongiabinhquan,(chitiet_psvt.soluongnhap*dongiabinhquan) as thanhtien,dinhkhoan_psvt.tkno,dinhkhoan_psvt.tkco,psvt.tongcong as thanhtienco,psvt.loaiphieu from psvt INNER JOIN chitiet_psvt on (psvt.sophieu = chitiet_psvt.sophieu) INNER JOIN tkthang on (chitiet_psvt.mavt=tkthang.mavt) INNER join dinhkhoan_psvt on (psvt.sophieu=dinhkhoan_psvt.sophieu) WHERE psvt.makho!='0001' AND month(ngayghiso)='".$thangtk."' AND tkthang.thang='".$thangtk."' and dinhkhoan_psvt.tkco!='33311' and dinhkhoan_psvt.tkno!='1331'";
        $this->query($sql);
    }

    function themdanhsach_mabp_cuapskt($TuNgay,$DenNgay)
    {// Tính ton kho tháng lấy từ file tk và ghi vào file tk_thang
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = " and " . $this->get_orderby();
        $sql_emp = "delete from tmp_mabp_pskt ";
        $this->re_query($sql_emp);

        $sql = "";
        $this->query($sql);
    }
    function themTonKhoThangTuTK($thangtk)
    {// Tính ton kho tháng lấy từ file tk và ghi vào file tk_thang
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = " and " . $this->get_orderby();
        $sql = "select mavt,tenvt,dvt,matk,mavt.manhom,rate as thuesuat,manhom.tennhom FROM mavt inner join manhom on (mavt.manhom=manhom.manhom)";
        $this->query($sql);
        $sql_emp = "delete from tkthang where thang=" . $this->getThang();
        $this->re_query($sql_emp);
        $count = $this->num_rows();
        $i = 0;

        $datanhap = $this->TinhPhatSinhNhap($this->getThangNamTK(), $this->getThangTonKho());
        $dataxuat = $this->TinhPhatSinhXuat($this->getThangNamTK(), $this->getThangTonKho());

        $dataton = $this->TinhPhatSinhTonDKTuTK();
        while ($data = $this->fetch()) {
            $mavt = $data['mavt'];
            $giaban=0;

            if ($datanhap == 0) {
                $soluongnhap = 0;
                $thanhtiennhap = 0;
            } else {
                $soluongnhap = $datanhap[$mavt]['soluong'];
                $thanhtiennhap = $datanhap[$mavt]['thanhtien'];
            }

            if ($dataxuat == 0) {
                $soluongxuat = 0;
                $thanhtienxuat = 0;
            } else {
                $soluongxuat = $dataxuat[$mavt]['soluong'];
                $thanhtienxuat = $dataxuat[$mavt]['thanhtien'];
                $giaban = round($thanhtienxuat / $soluongxuat, 2);
            }

            if ($dataton == 0) {
                $soluongtondk = 0;
                $thanhtientondk = 0;
            } else {
                $soluongtondk = $dataton[$mavt]['soluong'];
                $thanhtientondk = $dataton[$mavt]['thanhtien'];
            }

            $soluongtonck = $soluongtondk + ($soluongnhap - $soluongxuat);

            $dongiabinhquan = round(($thanhtientondk + $thanhtiennhap) / ($soluongtondk + $soluongnhap),3);

            $thanhtienxuat = round($soluongxuat*$dongiabinhquan);// Giá vốn bán hàng

            if ($soluongtonck == 0) {
                $thanhtientonck = 0;
            } else {
                $thanhtientonck = round($thanhtientondk + $thanhtiennhap-$thanhtienxuat);
            }


            $i++;
            $data['sophieu'] = $data['matk'] . $this->getThang();
            $data['mapskt'] = $data['matk'] . $this->getThang();
            $data['ngayghiso'] = $thangtk;
            $data['ngayhoadon'] = $thangtk;
            $data['loaiphieu'] = 65;

            $data['noidung'] = "Kết chuyển giá vốn bán hàng";
            $data['mand'] = "100095";

            $data['mabp'] = "0001";
            $data['bophan'] = "Toàn bộ";
            $data['tkno'] = 632;
            $data['tkco'] = $data['matk'];
            $data['loaict'] = 4;
            if ($soluongtonck < 0) {
                $thongbaoam .= $data['mavt'] . " - " . $data['tenvt'] . " - (" . $soluongtonck . " " . $data['dvt'] . ") \n ";
            }
            $data['tongtien'] = $trees[$data['matk']]['tongtien'] += $thanhtienxuat;


            $dauphay = ",";
            if ($count == $i) {
                $dauphay = "";
            }
            $value .= "('" . $data['mavt'] . "','" . $data['tenvt'] . "','" . $data['dvt'] . "','" . $soluongtondk . "','" . $dongiabinhquan . "','" . $thanhtientondk . "','" . $this->getThang() . "','" . $data['matk'] . "','" . $data['manhom'] . "','" . $data['thuesuat'] . "','" . $data['tennhom'] . "','" . $soluongnhap . "','" . $thanhtiennhap . "','" . $soluongxuat . "','" . $thanhtienxuat . "','" . $dongiabinhquan . "','" . $soluongtonck . "','" . $thanhtientonck . "',$giaban)" . $dauphay;

            $trees[$data['matk']] = $data;
            $trees[$data['matk']]['thongbaoam'] = $thongbaoam;

            //$sql_up = "update chitiet_psvt as b1 INNER join psvt as b2 on (b1.sophieu= b2.sophieu)set b1.donggianhap='".$dongiabinhquan."',b1.thanhtien=b1.soluongnhap*".$dongiabinhquan.",b1.thanhtienchuack=b1.soluongnhap*".$dongiabinhquan." where b1.mavt='".$mavt."' and b2.loaiphieu='3' and month(b2.ngayghiso)='".$this->getThang()."'";
            //$this->re_query($sql_up);
        }
        $sql_ins = "insert into tkthang(mavt,tenvt,dvt,soluong,dongia,thanhtien,thang,matk,manhom,thuesuat,tennhom,soluongnhap,thanhtiennhap,soluongxuat,thanhtienxuat,dongiabinhquan,soluongtonck,thanhtientonck,giaban) VALUE $value";
        $this->re_query($sql_ins);
        return $trees;
    }

    function themTonKhoThang($thangtk)
    { // Tính toàn kho tháng và ghi vào table tk_thang
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = " and " . $this->get_orderby();
        $sql = "select mavt,tenvt,dvt,matk,mavt.manhom,rate as thuesuat,manhom.tennhom FROM mavt inner join manhom on (mavt.manhom=manhom.manhom) ";
        $this->query($sql);
        $sql_emp = "delete from tkthang where thang=" . $this->getThang();
        $this->re_query($sql_emp);
        $count = $this->num_rows();
        $i = 0;

        $datanhap = $this->TinhPhatSinhNhap($this->getThangNamTK(), $this->getThangTonKho());
        $dataxuat = $this->TinhPhatSinhXuat($this->getThangNamTK(), $this->getThangTonKho());
        $dataton = $this->TinhPhatSinhTonDKTuTKTHANGTRUOC($this->getThang());
        while ($data = $this->fetch()) {
            $mavt = $data['mavt'];
            $giaban=0;
            if ($datanhap == 0) {
                $soluongnhap = 0;
                $thanhtiennhap = 0;
            } else {
                $soluongnhap = $datanhap[$mavt]['soluong'];
                $thanhtiennhap = $datanhap[$mavt]['thanhtien'];
            }


            if ($dataton == 0) {
                $soluongtondk = 0;
                $thanhtientondk = 0;
                $giabandk = 0;
            } else {
                $soluongtondk = $dataton[$mavt]['soluong'];
                $thanhtientondk = $dataton[$mavt]['thanhtien'];
                $giabandk = $dataton[$mavt]['giaban'];
            }

            if ($dataxuat == 0) {
                $soluongxuat = 0;
                $thanhtienxuat = 0;
                $giabanxuat = 0;
            } else {
                $soluongxuat = $dataxuat[$mavt]['soluong'];
                $thanhtienxuat = $dataxuat[$mavt]['thanhtien'];
                $giabanxuat = round(($thanhtienxuat / $soluongxuat), 2);
            }
            if (number_format($giabandk) != 0 && number_format($giabanxuat) != 0) {
                $giaban = round((($giabandk + $giabanxuat)/2), 2);
            }
            if (number_format($giabandk) != 0 && number_format($giabanxuat) == 0) {
                $giaban = round(($giabandk), 2);
            }
            if (number_format($giabandk) == 0 && number_format($giabanxuat) != 0) {
                $giaban = round(($giabanxuat), 2);
            }

            $soluongtonck = $soluongtondk + ($soluongnhap - $soluongxuat);

            $dongiabinhquan = round(($thanhtientondk + $thanhtiennhap) / ($soluongtondk + $soluongnhap),3);

            $thanhtienxuat = round($soluongxuat*$dongiabinhquan);// Giá vốn bán hàng

            if ($soluongtonck == 0) {
                $thanhtientonck = 0;
            } else {
                $thanhtientonck = round($thanhtientondk + $thanhtiennhap-$thanhtienxuat);
                //$thanhtientonck = round($soluongtonck*$dongiabinhquan);
            }

            $i++;
            $data['sophieu'] = $data['matk'] . $this->getThang();
            $data['mapskt'] = $data['matk'] . $this->getThang();
            $data['ngayghiso'] = $thangtk;
            $data['ngayhoadon'] = $thangtk;
            $data['loaiphieu'] = 65;

            $data['noidung'] = "Kết chuyển giá vốn bán hàng";
            $data['mand'] = "100095";
            $data['mabp'] = "0001";
            $data['bophan'] = "Toàn bộ";
            $data['tkno'] = 632;
            $data['tkco'] = $data['matk'];
            $data['loaict'] = 4;

            if ($soluongtonck < 0) {
                $thongbaoam .= $data['mavt'] . " - " . $data['tenvt'] . " - (" . $soluongtonck . " " . $data['dvt'] . ") \n ";
            }

            $data['tongtien'] = $trees[$data['matk']]['tongtien'] += $thanhtienxuat;
            $dauphay = ",";
            if ($count == $i) {
                $dauphay = "";
            }
            $value .= "('" . $data['mavt'] . "','" . $data['tenvt'] . "','" . $data['dvt'] . "','" . $soluongtondk . "','" . $dongiabinhquan . "','" . $thanhtientondk . "','" . $this->getThang() . "','" . $data['matk'] . "','" . $data['manhom'] . "','" . $data['thuesuat'] . "','" . $data['tennhom'] . "','" . $soluongnhap . "','" . $thanhtiennhap . "','" . $soluongxuat . "','" . $thanhtienxuat . "','" . $dongiabinhquan . "','" . $soluongtonck . "','" . $thanhtientonck . "','".$giaban."')" . $dauphay;
            //$sql_up = "update chitiet_psvt as b1 INNER join psvt as b2 on (b1.sophieu= b2.sophieu)set b1.donggianhap='".$dongiabinhquan."',b1.thanhtien=b1.soluongnhap*".$dongiabinhquan.",b1.thanhtienchuack=b1.soluongnhap*".$dongiabinhquan." where b1.mavt='".$mavt."' and b2.loaiphieu='3' and month(b2.ngayghiso)='".$this->getThang()."'";
            //$this->re_query($sql_up);
            $trees[$data['matk']] = $data;
            $trees[$data['matk']]['thongbaoam'] = $thongbaoam;
        }
        $sql_ins = "insert into tkthang(mavt,tenvt,dvt,soluong,dongia,thanhtien,thang,matk,manhom,thuesuat,tennhom,soluongnhap,thanhtiennhap,soluongxuat,thanhtienxuat,dongiabinhquan,soluongtonck,thanhtientonck,giaban) VALUE $value";
        $this->re_query($sql_ins);
        return $trees;
    }

    public function getMaVT()
    {
        $sql = "select * from mavt where mavt='" . $this->get_MaVT() . "'";
        $this->query($sql);
        if ($this->num_rows() == 0) {
            return 0;
        } else {
            return $this->fetch();
        }
    }

    function getNextSTT()
    {
        $sql = "select auto_increment as sott from information_schema.TABLES where TABLE_NAME ='chitiet_psvt' and TABLE_SCHEMA='" . $_SESSION['TIENTO'] . $_SESSION['MST'] . "_" . $_SESSION['NienDo'] . "';";
        $this->query($sql);
        if ($this->num_rows() == 0) {
            return 0;
        } else {
            return $this->fetch();
        }
    }

    function getNextSTTCTCT()
    {
        $sql = "select auto_increment as sott from information_schema.TABLES where TABLE_NAME ='ct_nhapvattu_ct' and TABLE_SCHEMA='" . $_SESSION['TIENTO'] . $_SESSION['MST'] . "_" . $_SESSION['NienDo'] . "';";
        $this->query($sql);
        if ($this->num_rows() == 0) {
            return 0;
        } else {
            return $this->fetch();
        }
    }

    public function themchitietvattu()
    {
        $sql = "INSERT INTO chitiet_psvt (mapskt,mavt,tenvt,soluongnhap,donggianhap,thuesuat,thanhtien,thanhtienchuack,thue,sophieu,dvt,chietkhau,tienchietkhau,tenkd,dongiamt,thanhtienmt,thuenk,thuettdb,phivc,phibx,tygiant,nguyentent,thanhtiennt) VALUES ('" . $this->getMapskt() . "', '" . $this->get_MaVT() . "','" . $this->get_TenVT() . "', '" . $this->getSoLuongNhap() . "','" . $this->getDonGiaNhap() . "','" . $this->getThueSuat() . "','" . $this->getThanhTien() . "','" . $this->getThanhTienChuaCK() . "','" . $this->getThue() . "','" . $this->getSoPhieu() . "','" . $this->get_DVT() . "','" . $this->getChietKhau() . "','" . $this->getTienChietKhau() . "','" . $this->get_TenKD() . "','" . $this->getDonGiaMT() . "','" . $this->getThanhTienMT() . "','" . $this->getThueNK() . "','" . $this->getThueTTDB() . "','" . $this->getPhiVC() . "','" . $this->getPhiBX() . "','" . $this->getTyGiaNT() . "','" . $this->getNguyenTeNT() . "','" . $this->getThanhTienNT() . "');";
        $this->query($sql);
    }

    public function themchitietvattu_ctct()
    {
        $sql = "INSERT INTO ct_nhapvattu_ct (mavt,soluong,dongia,thanhtien,sophieu) VALUES ('" . $this->get_MaVT() . "', '" . $this->getSoLuongNhap() . "','" . $this->getDonGiaNhap() . "','" . $this->getThanhTien() . "','" . $this->getSoPhieu() . "');";
        $this->query($sql);
    }

    public function suachitietvattu()
    {
        //$sql = "UPDATE chitiet_psvt SET soluongnhap ='" . $this->getSoLuongNhap() . "',donggianhap ='" . $this->getDonGiaNhap() . "',thuesuat ='" . $this->getThueSuat() . "',thanhtien='" . $this->getThanhTien() . "',thanhtienchuack='" . $this->getThanhTienChuaCK() . "',thue ='" . $this->getThue() . "',chietkhau ='" . $this->getChietKhau() . "',tienchietkhau ='" . $this->getTienChietKhau() . "',tenkd='" . $this->get_TenKD() . "',dongiamt='" . $this->getDonGiaMT() . "',thanhtienmt='" . $this->getThanhTienMT() . "' WHERE sott='" . $this->get_SoTT() . "' and sophieu='" . $this->getSoPhieu() . "' and mavt='" . $this->get_MaVT() . "';";
        $sql = "UPDATE chitiet_psvt SET mavt = '".$this->get_MaVT()."',tenvt = '".$this->get_TenVT()."',dvt ='".$this->get_DVT()."',soluongnhap ='" . $this->getSoLuongNhap() . "',donggianhap ='" . $this->getDonGiaNhap() . "',thuesuat ='" . $this->getThueSuat() . "',thanhtien='" . $this->getThanhTien() . "',thanhtienchuack='" . $this->getThanhTienChuaCK() . "',thue ='" . $this->getThue() . "',chietkhau ='" . $this->getChietKhau() . "',tienchietkhau ='" . $this->getTienChietKhau() . "',tenkd='" . $this->get_TenKD() . "',dongiamt='" . $this->getDonGiaMT() . "',thanhtienmt='" . $this->getThanhTienMT() . "',thuenk='" . $this->getThueNK() . "',thuettdb='" . $this->getThueTTDB() . "',phivc='" . $this->getPhiVC() . "',phibx='" . $this->getPhiBX() . "',tygiant='" . $this->getTyGiaNT() . "',nguyentent='" . $this->getNguyenTeNT() . "',thanhtiennt='" . $this->getThanhTienNT() . "' WHERE sott='" . $this->get_SoTT() . "'";
        $this->query($sql);
    }

    public function suachitietvattu_ctct()
    {
        //$sql = "UPDATE chitiet_psvt SET soluongnhap ='" . $this->getSoLuongNhap() . "',donggianhap ='" . $this->getDonGiaNhap() . "',thuesuat ='" . $this->getThueSuat() . "',thanhtien='" . $this->getThanhTien() . "',thanhtienchuack='" . $this->getThanhTienChuaCK() . "',thue ='" . $this->getThue() . "',chietkhau ='" . $this->getChietKhau() . "',tienchietkhau ='" . $this->getTienChietKhau() . "',tenkd='" . $this->get_TenKD() . "',dongiamt='" . $this->getDonGiaMT() . "',thanhtienmt='" . $this->getThanhTienMT() . "' WHERE sott='" . $this->get_SoTT() . "' and sophieu='" . $this->getSoPhieu() . "' and mavt='" . $this->get_MaVT() . "';";
        $sql = "UPDATE ct_nhapvattu_ct SET mavt = '".$this->get_MaVT()."',soluong ='" . $this->getSoLuongNhap() . "',dongia ='" . $this->getDonGiaNhap() . "',thanhtien='" . $this->getThanhTien() . "' WHERE sott='" . $this->get_SoTT() . "'";
        $this->query($sql);
    }

    public function xoachitietvattu()
    {

        $sql = "select sophieu from psvt where psvt.dathem='0' and psvt.tendangnhap='".$_SESSION['User']."';";
        $query = $this->re_query($sql);
        $sophieu="";
        while ($data = $this->re_fetch($query)) {
           $sophieu.="'".$data['sophieu']."',";
        }
        $string_sophieu = substr($sophieu,0,-1);

        $sql1="DELETE FROM psvt 
			   where sophieu in ($string_sophieu);";
        $this->query($sql1);

        $sql2="DELETE FROM chitiet_psvt 
			   where sophieu in ($string_sophieu);";
        $this->query($sql2);

        $sql3="DELETE FROM dinhkhoan_psvt 
			   where sophieu in ($string_sophieu);";
        $this->query($sql3);
    }

    public function xoapschitietvattu()
    {
        $sql = "delete from chitiet_psvt WHERE sott='" . $this->get_SoTT() . "' and sophieu='" . $this->getSoPhieu() . "' and mavt='" . $this->get_MaVT() . "'";
        $this->query($sql);
    }

    public function xoapschitietvattu_ctct()
    {
        $sql = "delete from ct_nhapvattu_ct WHERE sott='" . $this->get_SoTT() . "'";
        $this->query($sql);
    }

    public function getTongChietKhau()
    {
        $sql_w = $this->get_orderby();
        $sql = "select sum(tienchietkhau) as tongchietkhau,sum(thuenk) as tongthuenk,sum(thuettdb) as tongttdb,sum(thanhtiennt) as tongttnt from chitiet_psvt where $sql_w ";
        $this->query($sql);
        if ($this->num_rows() == 0) {
            return 0;
        } else {
            return $this->fetch();
        }
    }

    public function getTongPhiMoiTruong()
    {
        $sql_w = $this->get_orderby();
        $sql = "select sum(thanhtienmt) as tongmoitruong from chitiet_psvt where $sql_w ";
        $this->query($sql);
        if ($this->num_rows() == 0) {
            return 0;
        } else {
            return $this->fetch();
        }
    }

    public function kiemTraTonKhoDauKy()
    {
        $sql = "select * from tk ";
        $this->query($sql);
        if ($this->num_rows() == 0) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function kiemTraTonKhothang()
    {
        $sql = "select * from tkthang where thang='" . $this->getThangTonKho() . "' ";
        $this->query($sql);
        if ($this->num_rows() == 0) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    function TinhSLNhap()
    {// Tính phát sinh nhập trong khoản thời gian nhất định
        $sql = "select sum(soluongnhap) as soluong,AVG(donggianhap) as dongia,chitiet_psvt.mavt from psvt INNER join chitiet_psvt on (psvt.sophieu=chitiet_psvt.sophieu) where loaiphieu=1 group by chitiet_psvt.mavt";// Nhập hàng trông tháng
        $query = $this->re_query($sql);
        if ($this->re_num_rows($query) == 0) {
            return 0;
        } else {
            while ($data = $this->re_fetch($query)) {
                $row[$data['mavt']] = $data;
            }
            return $row;
        }
    }

    function TinhSLXuat()
    {// Tính phát sinh nhập trong khoản thời gian nhất định
        $sql = "select sum(soluongnhap) as soluong,chitiet_psvt.mavt from psvt INNER join chitiet_psvt on (psvt.sophieu=chitiet_psvt.sophieu) where loaiphieu in ('2','3') group by chitiet_psvt.mavt";// Nhập hàng trông tháng
        $query = $this->re_query($sql);
        if ($this->re_num_rows($query) == 0) {
            return 0;
        } else {
            while ($data = $this->re_fetch($query)) {
                $row[$data['mavt']] = $data;
            }
            return $row;
        }
    }

    function TinhPhatSinhNhap($TuNgay, $DenNgay)
    {// Tính phát sinh nhập trong khoản thời gian nhất định
        $sql = "select sum(soluongnhap) as soluong,SUM(thanhtien) as thanhtien,chitiet_psvt.mavt from psvt INNER join chitiet_psvt on (psvt.sophieu=chitiet_psvt.sophieu) where loaiphieu=1 and ngayghiso<='" . $DenNgay . "' and ngayghiso>='" . $TuNgay . "' group by chitiet_psvt.mavt";// Nhập hàng trông tháng
        $query = $this->re_query($sql);
        //if($this->num_rows() == 0){
        //return 0;
        //}else{
        while ($data = $this->re_fetch($query)) {
            $row[$data['mavt']] = $data;
        }
        return $row;
        //}
    }

    function TinhPhatSinhXuat($TuNgay, $DenNgay)
    {// Tính phát sinh nhập trong khoản thời gian nhất định
        $sql = "select sum(soluongnhap) as soluong,SUM(thanhtien) as thanhtien,chitiet_psvt.mavt from psvt INNER join chitiet_psvt on (psvt.sophieu=chitiet_psvt.sophieu) where loaiphieu in ('2','3') and ngayghiso<='" . $DenNgay . "' and ngayghiso>='" . $TuNgay . "' group by chitiet_psvt.mavt";// Nhập hàng trông tháng
        $query = $this->re_query($sql);
        ///if($this->num_rows() == 0){
        // return 0;
        //}else{
        while ($data = $this->re_fetch($query)) {
            $row[$data['mavt']] = $data;
        }
        return $row;
        //}
    }

    function TinhPhatSinhNhapDK($TuNgay)
    {// Tính phát sinh nhập trong khoản thời gian nhất định
        $sql = "select sum(soluongnhap) as soluong,SUM(thanhtien) as thanhtien,chitiet_psvt.mavt from psvt INNER join chitiet_psvt on (psvt.sophieu=chitiet_psvt.sophieu) where loaiphieu=1 and ngayghiso<'" . $TuNgay . "' group by chitiet_psvt.mavt";// Nhập hàng trông tháng
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

    function TinhPhatSinhXuatDK($TuNgay)
    {// Tính phát sinh nhập trong khoản thời gian nhất định
        $sql = "select sum(soluongnhap) as soluong,SUM(thanhtien) as thanhtien,chitiet_psvt.mavt from psvt INNER join chitiet_psvt on (psvt.sophieu=chitiet_psvt.sophieu) where loaiphieu in ('2','3')) and ngayghiso<'" . $TuNgay . "' group by chitiet_psvt.mavt";// Nhập hàng trông tháng
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

    function TinhPhatSinhTonDKTuTK()
    {// Tính phát sinh nhập trong khoản thời gian nhất định
        $sql = "SELECT mavt,slck as soluong,dgxvnd as thanhtien,gtvnck as dongia FROM tk";// Nhập hàng trông tháng
        $query = $this->re_query($sql);
        //if($this->num_rows() == 0){
        //return 0;
        // }else{
        while ($data = $this->re_fetch($query)) {
            $row[$data['mavt']] = $data;
        }
        return $row;
        //}
    }

    function TinhPhatSinhTonDKTuTKTHANGTRUOC($thang)
    {// Tính phát sinh nhập trong khoản thời gian nhất định
        $sql = "SELECT mavt,soluongtonck as soluong,thanhtientonck as thanhtien,giaban FROM tkthang where thang=" . ($thang - 1);// Tồn đầu kỳ
        $query = $this->re_query($sql);
        //if($this->num_rows() == 0){
        //return 0;
        //}else{
        while ($data = $this->re_fetch($query)) {
            $row[$data['mavt']] = $data;
        }
        return $row;
        //}
    }

    function TinhPhatSinhTonDKTuTKTMP()
    {// Tính phát sinh nhập trong khoản thời gian nhất định
        $sql = "SELECT mavt,slck as soluong,dgxvnd as thanhtien FROM tk";// Tồn đầu kỳ
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

    function LoadDanhSachTKHT()
    {// Tính phát sinh nhập trong khoản thời gian nhất định
        $sql = "SELECT mavt,slton FROM tmp_tkhientai";// Tồn đầu kỳ
        $query = $this->re_query($sql);

        while ($data = $this->re_fetch($query)) {
            $row[$data['mavt']] = $data;
        }
        return $row;
    }

    function LoadDanhSachGiaVon($thang)
    {// Tính phát sinh nhập trong khoản thời gian nhất định
        $sql = "SELECT mavt,dongiabinhquan as giavon FROM tkthang where thang='{$thang}'";// Tồn đầu kỳ
        $query = $this->re_query($sql);

        while ($data = $this->re_fetch($query)) {
            $row[$data['mavt']] = $data['giavon'];
        }
        return $row;
    }

    function LoadDanhSachTKSPHT()
    {// Tính phát sinh nhập trong khoản thời gian nhất định
        $sql = "SELECT mavt,thang1,thang3,thang3,thang4,thang5,thang6,thang7,thang8,thang9,thang10,thang11,thang12 FROM tmp_tksphienthai";// Tồn đầu kỳ
        $query = $this->re_query($sql);

        while ($data = $this->re_fetch($query)) {
            $row[$data['mavt']] = $data;
        }
        return $row;
    }


    function CapNhatGiaNhap()
    {
        $sql = "update mavt set giamua = '" . $this->getDonGiaNhap() . "' where mavt ='" . $this->get_MaVT() . "'";// Tồn đầu kỳ
        $this->re_query($sql);
    }

    function CapNhatGiaXuat()
    {
        $sql = "update mavt set giaban = '" . $this->getDonGiaNhap() . "' where mavt ='" . $this->get_MaVT() . "'";// Tồn đầu kỳ
        $this->re_query($sql);
    }

    function layTongTienPhieuNhapXuat($sophieu)
    {// Tính phát sinh nhập trong khoản thời gian nhất định
        $sql = "SELECT sum(thanhtien) as thanhtien,sum(thue) as thue,sum(tienchietkhau) as chietkhau,sum(soluongnhap) as soluong FROM chitiet_psvt where sophieu=" . $sophieu;// Tồn đầu kỳ
        $query = $this->re_query($sql);

        while ($data = $this->re_fetch($query)) {
            $row = $data;
        }
        return $row;

    }

    function layTongTienPhieuNhapXuat_CTCT($sophieu)
    {// Tính phát sinh nhập trong khoản thời gian nhất định
        $sql = "SELECT sum(thanhtien) as thanhtien,sum(soluong) as soluong FROM ct_nhapvattu_ct where sophieu=" . $sophieu;// Tồn đầu kỳ
        $query = $this->re_query($sql);

        while ($data = $this->re_fetch($query)) {
            $row = $data;
        }
        return $row;

    }

    function laydanhsachphieunhapkhosanxuat()//// Lấy thông tin xuất kho sản xuất
    {// Tính phát sinh nhập trong khoản thời gian nhất định
        $sql = "SELECT t1.*,month(t2.ngayghiso) as thang,t3.matk FROM chitiet_psvt t1 inner join psvt t2 on (t1.sophieu=t2.sophieu) INNER join mavt t3 on(t1.mavt=t3.mavt) where t2.loaiphieu=3";// Tồn đầu kỳ
        $query = $this->re_query($sql);
        while ($data = $this->re_fetch($query)) {
            $row[$data[sophieu]][] = $data;
        }
        return $row;

    }
	
	function laydanhsachphieunhapkhosanxuat_()//// Lấy thông tin nhập kho để sản xuất-------------
    {// Tính phát sinh nhập trong khoản thời gian nhất định
        $sql = "SELECT t1.sophieu,t3.matk,t1.mavt,t1.soluongnhap FROM chitiet_psvt t1 inner join psvt t2 on (t1.sophieu=t2.sophieu) INNER join mavt t3 on(t1.mavt=t3.mavt) INNER JOIN masp t4 on (t1.mavt = t4.masp) where t2.loaiphieu=1";// Tồn đầu kỳ
        $query = $this->re_query($sql);
        while ($data = $this->re_fetch($query)) {
            $row[$data['sophieu']][] = $data;
        }
        return $row;

    }


    function laydanhsachphieunhapkho()
    {// Tính phát sinh nhập trong khoản thời gian nhất định
        $sql = "SELECT mapskt,sophieu,ngayghiso,MONTH(ngayghiso) as thang FROM psvt where loaiphieu=2";// Tồn đầu kỳ
        $query = $this->re_query($sql);
        while ($data = $this->re_fetch($query)) {
            $row[$data['mapskt']] = $data['mapskt'];
        }
        return $row;

    }

    function laydanhsachchitietphieunhapkho()
    {// Tính phát sinh nhập trong khoản thời gian nhất định
        $sql = "SELECT t2.mapskt,t1.mavt,t1.sophieu,t1.soluongnhap,month(t2.ngayghiso) as thang,t2.ngayghiso,t3.matk,(SELECT dongia from tkthang WHERE thang = month(t2.ngayghiso) and mavt = t1.mavt )*t1.soluongnhap FROM chitiet_psvt t1 inner join psvt t2 on (t1.sophieu=t2.sophieu) INNER join mavt t3 on(t1.mavt=t3.mavt) where t2.loaiphieu=2";// Tồn đầu kỳ
        $query = $this->re_query($sql);
        while ($data = $this->re_fetch($query)) {
            $row[$data['mapskt']][] = $data;
        }
        return $row;

    }

    function getdongiamavttonkho($mavt,$thang)
    {// Tính phát sinh nhập trong khoản thời gian nhất định
        $sql = "SELECT dongiabinhquan as dongia from tkthang where mavt='".$mavt."' and thang='".$thang."'";// Tồn đầu kỳ
        $query = $this->re_query($sql);
        $data = $this->re_fetch($query);
        $row = $data['dongia'];
        return $row;

    }
	function getdongiagiathanhtieuchuan()
    {// Tính phát sinh nhập trong khoản thời gian nhất định
        $sql = "SELECT masp,sum(thanhtien) as dongia FROM `banggiathanhtieuchuan` where loaivl='' group by masp";// Tồn đầu kỳ
        $query = $this->re_query($sql);
        while ($data = $this->re_fetch($query)) {
            $row[$data['masp']] = $data['dongia'];
        }
        return $row;

    }

    function ThemSLTKMaVTHT()
    {// Lấy danh sách nhập vật tư trong tồn kho
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = " and " . $this->get_orderby();
        $sql = "SELECT mavt FROM mavt WHERE 0=0 $sql_w  order by tenvt " . $this->getLimit();
        $this->query($sql);
        $sql_emp = "TRUNCATE tmp_tkhientai";
        $this->re_query($sql_emp);
        $count = $this->num_rows();
        $i = 0;
        $datanhap = $this->TinhSLNhap();
        $dataxuat = $this->TinhSLXuat();
        $dataton = $this->TinhPhatSinhTonDKTuTK();
        while ($data = $this->fetch()) {
            $mavt = $data['mavt'];
            if ($datanhap == 0) {
                $soluongnhap = 0;
                $dongia = 0;
            } else {
                $soluongnhap = $datanhap[$mavt]['soluong'];
                $dongia = $datanhap[$mavt]['dongia'];
            }

            if ($dataxuat == 0) {
                $soluongxuat = 0;
            } else {
                $soluongxuat = $dataxuat[$mavt]['soluong'];
            }
            if ($dataton == 0) {
                $soluongton = 0;
                $dongiaton = 0;
            } else {
                $soluongton = $dataton[$mavt]['soluong'];
                $dongiaton = $dataton[$mavt]['dongia'];
            }

            $tonconlai = $soluongton + ($soluongnhap - $soluongxuat);
            $giavontong = ($dongia + $dongiaton);
            $giavon = 0;
            if ($dongia == 0 && $dongiaton != 0) {
                $giavon = $dongiaton;
            }
            if ($dongia != 0 && $dongiaton == 0) {
                $giavon = $dongia;
            }
            if ($dongia != 0 && $dongiaton != 0) {
                $giavon = $giavontong / 2;
            }

            $i++;
            $data['STT'] = $i;
            $data['soluongton'] = $tonconlai;
            $data['gianhap'] = round($giavon, 2);

            $dauphay = ",";
            if ($count == $i) {
                $dauphay = "";
            }
            $value .= "('" . $data['mavt'] . "','" . $tonconlai . "','" . round($giavon, 2) . "','" . $data['kho'] . "')" . $dauphay;
            $trees[] = $data;
        }
        $sql_ins = "insert into tmp_tkhientai(mavt,slton,giavon,kho) VALUE $value";
        $this->re_query($sql_ins);
        return $trees;
    }

    function CapNhatSLTonHT($SLTon)
    {
        $sql = "update tmp_tkhientai set slton = '" . $SLTon . "' where mavt ='" . $this->get_MaVT() . "'";// Tồn đầu kỳ
        $this->re_query($sql);
    }

    function CapNhatNVLTonHT($SLTon,$mact)
    {
        $sql = "update tmp_tknvlhienthai set soluong = '" . $SLTon . "' where mavt ='" . $this->get_MaVT() . " and mact='".$mact."'";// Tồn đầu kỳ
        $this->re_query($sql);
    }

    function loadListDanhSachTKTheoThangChiTietCuoiKyTheoNhom_CongDon($InSoAm,$tuthang,$denthang)
    {// Xuất tòn kho cuối kỳ theo từng tháng
        $trees = array();
            $datadauky = $this->TinhTonDKTuTK_CongDon($tuthang, $denthang);

            $dataphatsinh = $this->TinhPhatSinh_CongDong($tuthang,$denthang);

            $dem = 0;
            $dem++;

            $fill = $this->get_orderby();
            if ($fill != "")
                $sql_w = " and " . $this->get_orderby();
            if ($InSoAm == 1)
                $sql = "select * from tkthang where thang=" . $this->getThang() . " and ROUND(soluongtonck,1)!=0 order by tenvt";
            if ($InSoAm == 2)
                $sql = "select * from tkthang where thang=" . $this->getThang() . " and ROUND(soluongtonck,1) >0 order by tenvt";
            if ($InSoAm == 3)
                $sql = "select * from tkthang where thang=" . $this->getThang() . " and ROUND(soluongtonck,1) < 0 order by tenvt";
            if ($InSoAm == 4)
                $sql = "select * from tkthang where thang=" . $this->getThang() . " order by tenvt ";
            $this->query($sql);
            $i = 0;
            while ($data = $this->fetch()) {
                $mavt = $data['mavt'];
                    $i++;
                    $data['STT'] = $i;
                    $data['sott'] = "";
                    $data['nhap'] = $data['thanhtiennhap'];
                    $data['soluongtondk'] = $datadauky[$mavt]['soluong'];
                    $data['thanhtientondk'] = $datadauky[$mavt]['thanhtien'];
                    $data['soluongnhap'] = $dataphatsinh[$mavt]['soluongnhap'];
                    $data['thanhtiennhap'] = $dataphatsinh[$mavt]['thanhtiennhap'];
                    $data['soluongxuat'] = $dataphatsinh[$mavt]['soluongxuat'];
                    $data['thanhtienxuat'] = $dataphatsinh[$mavt]['thanhtienxuat'];

                    $data['soluongtonck'] = $data['soluongtonck'];
                    $data['thanhtientonck'] = $data['thanhtientonck'];
                    $data['dongiabinhquan'] = $data['dongiabinhquan'];

                    $data['dongia'] = $data['dongiabinhquan'];
                    $trees[$data['manhom']][] = $data;
            }
        return $trees;
    }

    function TinhTonDKTuTK_CongDon($tungay,$denngay)
    {// Tính phát sinh nhập trong khoản thời gian nhất định
        if($tungay==1){
            $sql = "SELECT mavt,slck as soluong,dgxvnd as thanhtien,gtvnck as dongia FROM tk";// Nhập hàng trông tháng
        }else{
            $sql = "SELECT mavt,soluongtonck as soluong,thanhtientonck as thanhtien,dongiabinhquan as dongia,makho FROM tkthang where thang='".($tungay-1)."'";// Nhập hàng trông tháng
        }
        echo $sql;
        $query = $this->re_query($sql);
        while ($data = $this->re_fetch($query)) {
            $row[$data['mavt']] = $data;
        }
        return $row;
        //}
    }

    function TinhPhatSinh_CongDong($tungay,$denngay)
    {// Tính phát sinh nhập trong khoản thời gian nhất định
        $sql = "SELECT mavt,sum(soluongnhap) as soluongnhap,sum(thanhtiennhap) as thanhtiennhap,sum(soluongxuat) as soluongxuat,sum(thanhtienxuat) as thanhtienxuat FROM tkthang where  thang>='".($tungay)."' and thang<='".$denngay."' group by mavt";// Nhập hàng trông tháng
        $query = $this->re_query($sql);
        while ($data = $this->re_fetch($query)) {
            $row[$data['mavt']] = $data;
        }
        return $row;
        //}
    }
    public function sumthangtientkcktungthang($thang)
    {
        $sql_w = $this->get_orderby();
        $sql = "select sum(thanhtienxuat) as tongtientkck,matk from tkthang where thang='{$thang}' GROUP BY matk";
        $this->query($sql);
        while ($data = $this->fetch()) {
            $row[$data['matk']] = $data;
        }
        return $row;
    }
    public function sumthangtienpsgiavon($thang)
    {
        $sql_w = $this->get_orderby();
        $sql = "select sum(gtvnd1) as tongtiengiavon,tkno1 as matk from chitiet_pskt where MONTH(ngayhoadon) ='{$thang}' and loaiphieu='65' GROUP BY tkno1";
        $this->query($sql);
        while ($data = $this->fetch()) {
            $row[$data['matk']] = $data;
        }
        return $row;
    }

}

?>
