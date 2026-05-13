<?php

class mataisan extends database
{
    public $tringorder;

    public $MaTaiSan;
    public $MaTaiSanCha;
    public $KhauHao;
    public $ThamChieu;
    public $LoaiSP;
    public $SoHuu;
    public $MaTKGiam;

    /**
     * @return mixed
     */
    public function getMaTKGiam()
    {
        return $this->MaTKGiam;
    }

    /**
     * @param mixed $MaTKGiam
     */
    public function setMaTKGiam($MaTKGiam)
    {
        $this->MaTKGiam = $MaTKGiam;
    }

    /**
     * @return mixed
     */
    public function getSoHuu()
    {
        return $this->SoHuu;
    }

    /**
     * @param mixed $SoHuu
     */
    public function setSoHuu($SoHuu)
    {
        $this->SoHuu = $SoHuu;
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
    public function getThamChieu()
    {
        return $this->ThamChieu;
    }

    /**
     * @param mixed $ThamChieu
     */
    public function setThamChieu($ThamChieu)
    {
        $this->ThamChieu = $ThamChieu;
    }

    /**
     * @return mixed
     */
    public function getKhauHao()
    {
        return $this->KhauHao;
    }

    /**
     * @param mixed $KhauHao
     */
    public function setKhauHao($KhauHao)
    {
        $this->KhauHao = $KhauHao;
    }

    /**
     * @return mixed
     */
    public function getMaTaiSanCha()
    {
        return $this->MaTaiSanCha;
    }

    /**
     * @param mixed $MaTaiSanCha
     */
    public function setMaTaiSanCha($MaTaiSanCha)
    {
        $this->MaTaiSanCha = $MaTaiSanCha;
    }

    public $MaBoPhan;
    public $BoPhan;

    public $MaNoiDung;
    public $NoiDung;
    public $MaPSTS;
    public $TangGiam;

    public $TenTaiSan;
    public $TenKD;
    public $MaTK;

    public $MaNhomTS;
    public $TenNhom;

    public $CongSuat;
    public $DVT;
    public $NuocSX;
    public $SoLuong;
    public $NgaySX;
    public $NgayGiam;
    public $CPKhongDuocTru;

    /**
     * @return mixed
     */
    public function getCPKhongDuocTru()
    {
        return $this->CPKhongDuocTru;
    }

    /**
     * @param mixed $CPKhongDuocTru
     */
    public function setCPKhongDuocTru($CPKhongDuocTru)
    {
        $this->CPKhongDuocTru = $CPKhongDuocTru;
    }

    /**
     * @return mixed
     */
    public function getNgayGiam()
    {
        return $this->NgayGiam;
    }

    /**
     * @param mixed $NgayGiam
     */
    public function setNgayGiam($NgayGiam)
    {
        $this->NgayGiam = $NgayGiam;
    }
    public $NgayGhiSo;

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
    public function getNgayHoaDon()
    {
        return $this->NgayHoaDon;
    }

    /**
     * @param mixed $NgayHoaDon
     */
    public function setNgayHoaDon($NgayHoaDon)
    {
        $this->NgayHoaDon = $NgayHoaDon;
    }

    public $NgayHoaDon;
    public $NgaySD;
    public $NguyenGia;
    public $GiaTriConLai;

    public $TyLeKH;

    public $ThoiGianSD;
    public $MucKHThang;

    public $TKCo;
    public $TKNo;// Thuế Suất
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

    public function set_MaTaiSan($MaTaiSan)
    {
        $this->MaTaiSan = $MaTaiSan;
    }

    public function get_MaTaiSan()
    {
        return $this->MaTaiSan;
    }

    public function set_MaBoPhan($MaBoPhan)
    {
        $this->MaBoPhan = $MaBoPhan;
    }

    public function get_MaBoPhan()
    {
        return $this->MaBoPhan;
    }

    public function set_BoPhan($BoPhan)
    {
        $this->BoPhan = $BoPhan;
    }

    public function get_BoPhan()
    {
        return $this->BoPhan;
    }

    ////////////////////////////
    public function set_MaNoiDung($MaNoiDung)
    {
        $this->MaNoiDung = $MaNoiDung;
    }

    public function get_MaNoiDung()
    {
        return $this->MaNoiDung;
    }

    public function set_NoiDung($NoiDung)
    {
        $this->NoiDung = $NoiDung;
    }

    public function get_NoiDung()
    {
        return $this->NoiDung;
    }

    public function set_MaPSTS($MaPSTS)
    {
        $this->MaPSTS = $MaPSTS;
    }

    public function get_MaPSTS()
    {
        return $this->MaPSTS;
    }

    public function set_TangGiam($TangGiam)
    {
        $this->TangGiam = $TangGiam;
    }

    public function get_TangGiam()
    {
        return $this->TangGiam;
    }

    ///////////////////////////

    public function set_TenTaiSan($TenTaiSan)
    {
        $this->TenTaiSan = $TenTaiSan;
    }

    public function get_TenTaiSan()
    {
        return $this->TenTaiSan;
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

    public function set_MaNhomTS($MaNhomTS)
    {
        $this->MaNhomTS = $MaNhomTS;
    }

    public function get_MaNhomTS()
    {
        return $this->MaNhomTS;
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

    public function set_NuocSX($NuocSX)
    {
        $this->NuocSX = $NuocSX;
    }

    public function get_NuocSX()
    {
        return $this->NuocSX;
    }

    public function set_SoLuong($SoLuong)
    {
        $this->SoLuong = $SoLuong;
    }

    public function get_SoLuong()
    {
        return $this->SoLuong;
    }

    public function set_NgaySX($NgaySX)
    {
        $this->NgaySX = $NgaySX;
    }

    public function get_NgaySX()
    {
        return $this->NgaySX;
    }

    public function set_NguyenGia($NguyenGia)
    {
        $this->NguyenGia = $NguyenGia;
    }

    public function get_NguyenGia()
    {
        return $this->NguyenGia;
    }

    public function set_GiaTriConLai($GiaTriConLai)
    {
        $this->GiaTriConLai = $GiaTriConLai;
    }

    public function get_GiaTriConLai()
    {
        return $this->GiaTriConLai;
    }

    public function set_TyLeKH($TyLeKH)
    {
        $this->TyLeKH = $TyLeKH;
    }

    public function get_TyLeKH()
    {
        return $this->TyLeKH;
    }

    public function set_ThoiGianSD($ThoiGianSD)
    {
        $this->ThoiGianSD = $ThoiGianSD;
    }

    public function get_ThoiGianSD()
    {
        return $this->ThoiGianSD;
    }

    public function set_MucKHThang($MucKHThang)
    {
        $this->MucKHThang = $MucKHThang;
    }

    public function get_MucKHThang()
    {
        return $this->MucKHThang;
    }

    public function set_TKCo($TKCo)
    {
        $this->TKCo = $TKCo;
    }

    public function get_TKCo()
    {
        return $this->TKCo;
    }

    public function set_TKNo($TKNo)
    {
        $this->TKNo = $TKNo;
    }

    public function get_TKNo()
    {
        return $this->TKNo;
    }

    public function set_Rank($Rank)
    {
        $this->TKNo = $Rank;
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

    /**
     * @return mixed
     */
    public function getNgaySD()
    {
        return $this->NgaySD;
    }

    /**
     * @param mixed $NgaySD
     */
    public function setNgaySD($NgaySD)
    {
        $this->NgaySD = $NgaySD;
    }


    public function set_CongSuat($CongSuat)
    {
        $this->CongSuat = $CongSuat;
    }

    public function get_CongSuat()
    {
        return $this->CongSuat;
    }

    public function set_ChuThich($ChuThich)
    {
        $this->ChuThich = $ChuThich;
    }

    public function get_ChuThich()
    {
        return $this->ChuThich;
    }


    public function checkKeyTrung()
    {
        $sql = "select * from ts where mats='" . $this->get_MaTaiSan() . "' and sott!=" . $this->get_SoTT() . "";
        $this->query($sql);
        if ($this->num_rows() >= 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    public function checkKeyMaTaiSanTrung()
    {
        $sql = "select * from mats where mats='" . $this->get_MaTaiSan() . "' and sott!=" . $this->get_SoTT() . "";
        $this->query($sql);
        if ($this->num_rows() >= 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    public function checkSoHDTrung()
    {
        $sql = "select * from ts where so_hd='" . $this->get_SoHD() . "' and sott!=" . $this->get_SoTT() . "";
        $this->query($sql);
        if ($this->num_rows() >= 1) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function checkXoa()
    {
        $sql = "select * from mats  where matscha='" . $this->get_MaTaiSan() . "'";
        $this->query($sql);
        if ($this->num_rows() >= 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }


    public function checkKeyChaTrung()
    {
        $sql = "select * from ts where mavt='" . $this->get_MaVTCha() . "'";
        $this->query($sql);
        if ($this->num_rows() >= 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    public function checkKeyChaMaTaiSan()
    {
        $sql = "select * from mats where mats='" . $this->get_MaTaiSan() . "'";
        $this->query($sql);
        if ($this->num_rows() >= 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function createSoTT()
    {
        $sql = "select max(sott) as sott from ts";
        $this->query($sql);
        if ($this->num_rows() == 1) {
            $data = $this->fetch();
            return $data['sott'] + 1;
        } else {
            return 1;
        }
    }

    public function createSoTT_MaTS()
    {
        $sql = "select max(sott) as sott from mats";
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
        $sql = "select max(mavt) as mavt from ts";
        $this->query($sql);
        $data = $this->fetch();
        if ($data['mavt'] != "") {
            return $data['mavt'] + 1000;
        } else {
            return 10000000000000;
        }
    }

    function loadListMaVT_W()
    {
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = " and " . $this->get_orderby();
        $sql = "SELECT * from ts WHERE 0=0 $sql_w  order by mavt";
        $this->query($sql);
        $i = 0;
        while ($data = $this->fetch()) {
            $i++;
            $data['STT'] = $i;
            $trees[] = $data;
        }
        return $trees;
    }

    function loadListMaTaiSan()
    {
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = " and " . $this->get_orderby();
        $sql = "SELECT * FROM mats WHERE 0=0 $sql_w  order by mats";
        $this->query($sql);
        $i = 0;
        while ($data = $this->fetch()) {
            $i++;
            $data['STT'] = $i;
            $trees[] = $data;
        }
        return $trees;
    }

    function loadListAllMaTaiSan()
    {
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = " and " . $this->get_orderby();
        $sql = "SELECT `mats`,`tents`,`dvt`,`matk`,`ngaysd`,`nuocsx`,`ngaysx`,`congsuat`,`tylekh`,`thoigiansd`,`soluong`,`dongia`,`nguyengia`,`giatriconlai`,`muckhthang`,`muckhquy`,`muckhnam`,`tkco`,`tkno`,`chuthich`,`mabp`,`bophan`,`manhomts`,`tenkd` FROM ts WHERE 0=0 $sql_w  
                  UNION 
                SELECT `mats`,`tents`,`dvt`,`matk`,`ngaysd`,`nuocsx`,`ngaysx`,`congsuat`,`tylekh`,`thoigiansd`,`soluong`,`dongia`,`nguyengia`,`giatriconlai`,`muckhthang`,`muckhquy`,`muckhnam`,`tkco`,`tkno`,`chuthich`,`mabp`,`bophan`,`manhomts`,`tenkd` FROM psts
                 WHERE 0=0 $sql_w order by mats";
        $this->query($sql);
        $i = 0;
        while ($data = $this->fetch()) {
            $i++;
            $data['STT'] = $i;
            $trees[] = $data;
        }
        return $trees;
    }
    function DemDinhMuc()
    {// Tính phát sinh nhập trong khoản thời gian nhất định
        $sql = "select count(*) as dong,mats from dinhmucxemay group by mats ";// Nhập hàng trông tháng
        $query = $this->re_query($sql);{
        while ($data = $this->re_fetch($query)) {
            $row[$data['mats']] = $data['dong'];
        }
    }
        return $row;
    }
    function loadListAllDSMaTaiSan($parentid = 0, $printto = 10)
    { // c?p 1 la cha
        //$cb_loaitk = $this->get_Cb_LoaiTK();
        $trees = array();
        $ListDinhMucSP = $this->DemDinhMuc();

        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = $this->get_orderby() . " and ";
        $sql = "SELECT * FROM mats WHERE $sql_w matscha = '$parentid'  order by mats DESC ";
        $this->query($sql);
        $i = 0;
        while ($data = $this->fetch()) {
            $i++;
            $data['STT'] = $i;
            //$data['tents'] = $data['tents'];
            $data['slnguyenlieu'] = $ListDinhMucSP[$data['mats']];
            $trees[] = $data;
            $sql1 = "SELECT * FROM mats WHERE $sql_w matscha ='" . $data['mats'] . "' order by mats ";
            $query = $this->re_query($sql1);
            while ($data1 = $this->re_fetch($query)) {
                if ($printto == 1) {
                    break;
                }
                $i++;
                $data1['STT'] = $i;
                //$data1['tents'] = "&nbsp;&nbsp;&nbsp;&nbsp;".$data1['tents'];
                $data1['slnguyenlieu'] = $ListDinhMucSP[$data1['mats']];
                $trees[] = $data1;
                $sql2 = "SELECT * FROM mats WHERE $sql_w matscha ='" . $data1['mats'] . "' order by mats ";
                $query1 = $this->re_query($sql2);
                while ($data2 = $this->re_fetch($query1)) {
                    if ($printto == 2) {
                        break;
                    }
                    $i++;
                    $data2['STT'] = $i;
                    //$data2['tents'] = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$data2['tents'];
                    $data2['slnguyenlieu'] = $ListDinhMucSP[$data2['mats']];
                    $trees[] = $data2;
                }
            }
        }
        return $trees;
    }
    function loadListAllDSMaTaiSan_W($parentid = 0, $printto = 10)
    { // c?p 1 la cha
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = " and ".$this->get_orderby();
        $sql = "SELECT * FROM mats WHERE 0=0 $sql_w  order by mats DESC ";
        $this->query($sql);
        $i = 0;
        while ($data = $this->fetch()) {
            $i++;
            $data['STT'] = $i;
            $trees[] = $data;
        }
        return $trees;
    }
    function loadListPSMaTaiSan()
    {
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = " and " . $this->get_orderby();
        $sql = "SELECT * FROM psts WHERE 0=0 $sql_w  order by mats";
        $this->query($sql);
        $i = 0;
        while ($data = $this->fetch()) {
            $i++;
            $data['STT'] = $i;
            $trees[] = $data;
        }
        return $trees;
    }

    function loadListMaVT_khong_co_trong_kho($parentid = 0)
    {
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = " and " . $this->get_orderby();
        $sql = "SELECT mavt.*,manhom.tennhom from ts inner join manhom on (mavt.manhom = manhom.manhom) WHERE mavt not in (select mavt from tk) $sql_w  order by mavt";
        $this->query($sql);
        $i = 0;
        while ($data = $this->fetch()) {
            $i++;
            $data['STT'] = $i;
            $trees[] = $data;
        }
        return $trees;
    }

    /*public function loadListmavt(){
        $fill = $this->get_orderby();
            if($fill!="")
                    $sql_w = " and ".$this->get_orderby();
        $sql="select * from ts where 0=0 $sql_w " ;
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

    public function getMaVT()
    {
        $sql = "select * from ts where mavt='" . $this->get_MaVT() . "'";
        $this->query($sql);
        if ($this->num_rows() == 0) {
            return 0;
        } else {
            return $this->fetch();
        }
    }

    public function themTS()
    {
        $sql = "INSERT INTO ts (mats,tents,dvt,matk,ngaysd,nuocsx,ngaysx,congsuat,tylekh,thoigiansd,soluong,dongia,nguyengia,giatriconlai,muckhthang,muckhquy,muckhnam,tkco,tkno,chuthich,tenkd,mabp,bophan,manhomts,tennhomts) 
			VALUES ('" . $this->get_MaTaiSan() . "', '" . $this->get_TenTaiSan() . "','" . $this->get_DVT() . "','" . $this->get_MaTK() . "','" . $this->getNgaySD() . "','" . $this->get_NuocSX() . "','" . $this->get_NgaySX() . "','" . $this->get_CongSuat() . "','" . $this->get_TyLeKH() . "','" . $this->get_ThoiGianSD() . "','" . $this->get_SoLuong() . "','" . $this->get_NguyenGia() . "','" . $this->get_NguyenGia() . "', '" . $this->get_GiaTriConLai() . "','" . $this->get_MucKHThang() . "','" . ($this->get_MucKHThang() * 3) . "','" . ($this->get_MucKHThang() * 12) . "','" . $this->get_TKCo() . "','" . $this->get_TKNo() . "','" . $this->get_ChuThich() . "', '" . $this->get_TenKD() . "','" . $this->get_MaBoPhan() . "','" . $this->get_BoPhan() . "','" . $this->get_MaNhomTS() . "','" . $this->get_TenNhom() . "');";
        $this->query($sql);
    }

    public function themMaTS()
    {
        $sql = "INSERT INTO mats (sott,mats,tents,dvt,matk,ngaysd,nuocsx,ngaysx,congsuat,tylekh,thoigiansd,dongia,nguyengia,chuthich,tenkd,manhomts,matscha,khauhao,ngaygiam,sohuu,matkgiam,cpkhongduoctru) 
			VALUES ('" . $this->get_SoTT() . "','" . $this->get_MaTaiSan() . "', '" . $this->get_TenTaiSan() . "','" . $this->get_DVT() . "','" . $this->get_MaTK() . "','" . $this->getNgaySD() . "','" . $this->get_NuocSX() . "','" . $this->get_NgaySX() . "','" . $this->get_CongSuat() . "','" . $this->get_TyLeKH() . "','" . $this->get_ThoiGianSD() . "','" . $this->get_SoLuong() . "','" . $this->get_NguyenGia() . "','" . $this->get_ChuThich() . "', '" . $this->get_TenKD() . "','" . $this->get_MaNhomTS() . "','" . $this->getMaTaiSanCha() . "','" . $this->getKhauHao() . "','" . $this->getNgayGiam() . "','" . $this->getSoHuu() . "','" . $this->getMaTKGiam() . "','" . $this->getCPKhongDuocTru() . "');";
        $this->query($sql);
    }

    public function themPSTS()
    {
        $sql = "INSERT INTO psts (mapsts,mats,tents,dvt,matk,ngaysd,nuocsx,ngaysx,congsuat,tylekh,thoigiansd,soluong,dongia,nguyengia,giatriconlai,muckhthang,muckhquy,muckhnam,tkco,tkno,chuthich,tenkd,mabp,bophan,mand,noidung,manhomts,tanggiam,ngayghiso,ngayhoadon,tennhomts,thamchieu,loaisp) 
			VALUES ('" . $this->get_MaPSTS() . "','" . $this->get_MaTaiSan() . "', '" . $this->get_TenTaiSan() . "','" . $this->get_DVT() . "','" . $this->get_MaTK() . "','" . $this->getNgaySD() . "','" . $this->get_NuocSX() . "','" . $this->get_NgaySX() . "','" . $this->get_CongSuat() . "','" . $this->get_TyLeKH() . "','" . $this->get_ThoiGianSD() . "','" . $this->get_SoLuong() . "','" . $this->get_NguyenGia() . "','" . $this->get_NguyenGia() . "', '" . $this->get_GiaTriConLai() . "','" . $this->get_MucKHThang() . "','" . ($this->get_MucKHThang() * 3) . "','" . ($this->get_MucKHThang() * 12) . "','" . $this->get_TKCo() . "','" . $this->get_TKNo() . "','" . $this->get_ChuThich() . "', '" . $this->get_TenKD() . "','" . $this->get_MaBoPhan() . "','" . $this->get_BoPhan() . "','" . $this->get_MaNoiDung() . "','" . $this->get_NoiDung() . "','" . $this->get_MaNhomTS() . "','" . $this->get_TangGiam() . "','" . $this->getNgayGhiSo() . "','" . $this->getNgayHoaDon() . "','" . $this->get_TenNhom() . "','" . $this->getThamChieu() . "','" . $this->getLoaiSP() . "');";
        $this->query($sql);
    }

    public function suaTS()
    {
        $sql = "update ts set 
						mats='" . $this->get_MaTaiSan() . "',
						tents='" . $this->get_TenTaiSan() . "',
						dvt='" . $this->get_DVT() . "',
						matk='" . $this->get_MaTK() . "',
						ngaysd='" . $this->getNgaySD() . "',
						nuocsx='" . $this->get_NuocSX() . "',
						ngaysx='" . $this->get_NgaySX() . "',
						congsuat='" . $this->get_CongSuat() . "',
						tylekh='" . $this->get_TyLeKH() . "',
						thoigiansd='" . $this->get_ThoiGianSD() . "',
						soluong='" . $this->get_SoLuong() . "',
						dongia='" . $this->get_NguyenGia() . "',
						nguyengia='" . $this->get_NguyenGia() . "',
						giatriconlai='" . $this->get_GiaTriConLai() . "',
						muckhthang='" . $this->get_MucKHThang() . "',
						muckhquy='" . ($this->get_MucKHThang() * 3) . "',
						muckhnam='" . ($this->get_MucKHThang() * 12) . "',
						tkco='" . $this->get_TKCo() . "',
						tkno='" . $this->get_TKNo() . "',
						chuthich='" . $this->get_ChuThich() . "',
						mabp='" . $this->get_MaBoPhan() . "',
						bophan='" . $this->get_BoPhan() . "',
						manhomts='" . $this->get_MaNhomTS() . "',
						tennhomts='" . $this->get_TenNhom() . "',
						tenkd='" . $this->get_TenKD() . "'
                  WHERE mats = '" . $this->get_MaTaiSan() . "'";
        $this->query($sql);
    }

    public function suaMaTS()
    {
        $sql = "update mats set 
						mats='" . $this->get_MaTaiSan() . "',
						khauhao='" . $this->getKhauHao() . "',
						matscha='" . $this->getMaTaiSanCha() . "',
						tents='" . $this->get_TenTaiSan() . "',
						dvt='" . $this->get_DVT() . "',
						matk='" . $this->get_MaTK() . "',
						ngaysd='" . $this->getNgaySD() . "',
						nuocsx='" . $this->get_NuocSX() . "',
						ngaysx='" . $this->get_NgaySX() . "',
						ngaygiam='" . $this->getNgayGiam() . "',
						matkgiam='" . $this->getMaTKGiam() . "',
						congsuat='" . $this->get_CongSuat() . "',
						tylekh='" . $this->get_TyLeKH() . "',
						thoigiansd='" . $this->get_ThoiGianSD() . "',
						soluong='" . $this->get_SoLuong() . "',
						nguyengia='" . $this->get_NguyenGia() . "',
						giatriconlai='" . $this->get_GiaTriConLai() . "',
						chuthich='" . $this->get_ChuThich() . "',
						manhomts='" . $this->get_MaNhomTS() . "',
						sohuu='" . $this->getSoHuu() . "',
						cpkhongduoctru='" . $this->getCPKhongDuocTru() . "',
						tenkd='" . $this->get_TenKD() . "'
                  WHERE sott = '" . $this->get_SoTT() . "'";
        $this->query($sql);
    }

    public function suaPSTS()
    {
        $sql = "update psts set 
						mats='" . $this->get_MaTaiSan() . "',
						tents='" . $this->get_TenTaiSan() . "',
						dvt='" . $this->get_DVT() . "',
						matk='" . $this->get_MaTK() . "',
						ngaysd='" . $this->getNgaySD() . "',
						nuocsx='" . $this->get_NuocSX() . "',
						ngaysx='" . $this->get_NgaySX() . "',
						ngayghiso='" . $this->getNgayGhiSo() . "',
						ngayhoadon='" . $this->getNgayHoaDon() . "',
						congsuat='" . $this->get_CongSuat() . "',
						tylekh='" . $this->get_TyLeKH() . "',
						thoigiansd='" . $this->get_ThoiGianSD() . "',
						soluong='" . $this->get_SoLuong() . "',
						dongia='" . $this->get_NguyenGia() . "',
						nguyengia='" . $this->get_NguyenGia() . "',
						giatriconlai='" . $this->get_GiaTriConLai() . "',
						muckhthang='" . $this->get_MucKHThang() . "',
						muckhquy='" . ($this->get_MucKHThang() * 3) . "',
						muckhnam='" . ($this->get_MucKHThang() * 12) . "',
						tkco='" . $this->get_TKCo() . "',
						tkno='" . $this->get_TKNo() . "',
						chuthich='" . $this->get_ChuThich() . "',
						mabp='" . $this->get_MaBoPhan() . "',
						bophan='" . $this->get_BoPhan() . "',
						mand='" . $this->get_MaNoiDung() . "',
						noidung='" . $this->get_NoiDung() . "',
						manhomts='" . $this->get_MaNhomTS() . "',
						tennhomts='" . $this->get_TenNhom() . "',
						thamchieu='" . $this->getThamChieu() . "',
						loaisp='" . $this->getLoaiSP() . "',
						tenkd='" . $this->get_TenKD() . "'
                  WHERE mapsts='" . $this->get_MaPSTS() . "' and tanggiam = '" . $this->get_TangGiam() . "'";
        $this->query($sql);
    }

    public function xoaTS()
    {
        $sql = "delete from ts where sott='" . $this->get_SoTT() . "'";
        $this->query($sql);
    }

    public function xoaPhieu()
    {
        $sql = "delete from psts where mapsts='" . $this->get_SoTT() . "' and tanggiam='".$this->get_TangGiam()."'";
        $this->query($sql);
    }
    public function xoaMaTS()
    {
        $sql = "delete from mats where sott='" . $this->get_SoTT() . "'";
        $this->query($sql);
    }


    public function createMaTaiSan()
    {
        $sql = "select max(sott) as mats from mats";
        $this->query($sql);
        $data = $this->fetch();
        if ($data['mats'] != "") {
            return $data['mats'] + 1+100000;
        } else {
            return 100000;
        }
    }

    public function checkmataisan()
    {
        $sql = "select * from ts where mats='" . $this->get_MaTaiSan() . "'";
        $this->query($sql);
        if ($this->num_rows() >= 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function checkmataisanps()
    {
        $sql = "select * from psts where mapsts='" . $this->get_MaPSTS() . "' and tanggiam='" . $this->get_TangGiam() . "'";
        $this->query($sql);
        if ($this->num_rows() >= 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function createMaPSTS()
    {
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = " and " . $this->get_orderby();

        $sql = "select max(mapsts) as mapsts from psts where 0=0 $sql_w ";
        $this->query($sql);
        $data = $this->fetch();
        if ($data['mapsts'] != "") {
            return $data['mapsts'] + 1;
        } else {
            return 1;
        }
    }

    function LoadTangTaiSan()
    {
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = " and " . $this->get_orderby();
        $sql = "SELECT * from psts where tanggiam=1 order by mats";
        $this->query($sql);
        $i = 0;
        while ($data = $this->fetch()) {
            $i++;
            $data['STT'] = $i;
            $trees[] = $data;
        }
        return $trees;
    }

    function LoaiDanhSachTSKH()
    {
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = " and " . $this->get_orderby();
        $sql = "SELECT mats,tents,dvt from ts UNION  SELECT mats,tents,dvt FROM psts";
        $this->query($sql);
        $i = 0;
        while ($data = $this->fetch()) {
            $i++;
            $data['STT'] = $i;
            $trees[] = $data;
        }
        return $trees;
    }

    function loadListKhauHaoTaiSan($thang)
    {
        $loadBangKHTaiSan = $this->loadBangKHTaiSan($thang);
        $parentid=0;
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = $this->get_orderby() . " and ";
        $sql = "SELECT mats,matscha,dvt,matk as tkno,tents FROM mats WHERE $sql_w matscha = '$parentid'  order by mats DESC ";
        $this->query($sql);
        $i = 0;
        $TONGNGUYENGIA = 0;
        $TONGKHAUHAO=0;
        while ($data = $this->fetch()) {
            $i++;
            $data['STT'] = $i;
            $data['tylekh'] = $loadBangKHTaiSan[$data['mats']]['tylekh'];
            $data['nguyengia'] = $loadBangKHTaiSan[$data['mats']]['nguyengia'];
            $data['sokh'] = $loadBangKHTaiSan[$data['mats']]['sokh'];
            $data['tienno'] = $loadBangKHTaiSan[$data['mats']]['tienno'];

            $trees[$data['mats']] = $data;
            $sql1 = "SELECT mats,matscha,dvt,matk as tkno,tents FROM mats WHERE $sql_w matscha ='" . $data['mats'] . "' order by mats ";
            $query = $this->re_query($sql1);
            $TONGNGUYENGIA1 = 0;
            $TONGKHAUHAO1=0;
            while ($data1 = $this->re_fetch($query)) {
                $i++;
                $data1['STT'] = $i;
                $data1['tents'] =  "- -".$data1['tents'];

                $data1['tylekh'] = $loadBangKHTaiSan[$data1['mats']]['tylekh'];
                $data1['nguyengia'] = $loadBangKHTaiSan[$data1['mats']]['nguyengia'];
                $data1['sokh'] = $loadBangKHTaiSan[$data1['mats']]['sokh'];
                $data1['tienno'] = $loadBangKHTaiSan[$data1['mats']]['tienno'];

                $trees[$data1['mats']] = $data1;
                $sql2 = "SELECT mats,matscha,dvt,matk as tkno,tents FROM mats WHERE $sql_w matscha ='" . $data1['mats'] . "' order by mats ";
                $query1 = $this->re_query($sql2);
                $TONGNGUYENGIA2 = 0;
                $TONGKHAUHAO2=0;
                while ($data2 = $this->re_fetch($query1)) {
                    $i++;
                    $data2['STT'] = $i;

                    $data2['tylekh'] = $loadBangKHTaiSan[$data2['mats']]['tylekh'];
                    $data2['nguyengia'] = $loadBangKHTaiSan[$data2['mats']]['nguyengia'];
                    $data2['sokh'] = $loadBangKHTaiSan[$data2['mats']]['sokh'];
                    $data2['tienno'] = $loadBangKHTaiSan[$data2['mats']]['tienno'];
                    $TONGNGUYENGIA2+=$data2['nguyengia'];
                    $TONGKHAUHAO2+=$data2['sokh'];
                    $trees[$data2['mats']] = $data2;
                }

                $TONGNGUYENGIA1+=$data1['nguyengia']+$TONGNGUYENGIA2;
                $TONGKHAUHAO1+=$data1['sokh']+$TONGKHAUHAO2;

                $trees[$data1['mats']]['nguyengia'] =  $data1['nguyengia']+$TONGNGUYENGIA2;
                $trees[$data1['mats']]['sokh'] = $data1['sokh']+$TONGKHAUHAO2;
            }
            $TONGNGUYENGIA=$data['nguyengia']+$TONGNGUYENGIA1;
            $TONGKHAUHAO=$data['sokh']+$TONGKHAUHAO1;

            $trees[$data['mats']]['nguyengia'] = $TONGNGUYENGIA;
            $trees[$data['mats']]['sokh'] = $TONGKHAUHAO;
        }
        return $trees;

    }



    function loadListKhauHaoTaiSan_CaNam($tuthang,$denthang,$Loai="")
    {
        if($denthang==0){
            $denthang=1;
            $sql_dk = " and YEAR(ngaysd)!='".$_SESSION['NienDo']."' ";
        }
        $loadBangKHTaiSan = $this->loadBangKHTaiSan_CaNam($tuthang,$denthang,$Loai);
        $parentid=0;
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = $this->get_orderby() . " and ";
        $sql = "SELECT mats,matscha,dvt,matk as tkno,tents,ngaysd FROM mats WHERE $sql_w matscha = '$parentid' {$sql_dk}  order by mats DESC ";
        $this->query($sql);
        $i = 0;
        $TONGNGUYENGIA = 0;
        $TONGGTCONLAI = 0;
        $TONGKHAUHAO=0;
        while ($data = $this->fetch()) {
            $i++;
            $data['STT'] = $i;
            $data['tgsudung'] = $loadBangKHTaiSan[$data['mats']]['tgsudung'];
            $data['tylekh'] = $loadBangKHTaiSan[$data['mats']]['tylekh'];
            $data['nguyengia'] = $loadBangKHTaiSan[$data['mats']]['nguyengia'];
            $data['gtconlai'] = $loadBangKHTaiSan[$data['mats']]['gtconlai'];
            $data['sokh'] = $loadBangKHTaiSan[$data['mats']]['sokh'];
            $data['tienno'] = $loadBangKHTaiSan[$data['mats']]['tienno'];
            $data['daban'] = $loadBangKHTaiSan[$data['mats']]['daban'];
            $data['soluong'] = $loadBangKHTaiSan[$data['mats']]['soluong'];

            $trees[$data['mats']] = $data;
            $sql1 = "SELECT mats,matscha,dvt,matk as tkno,tents,ngaysd FROM mats WHERE $sql_w matscha ='" . $data['mats'] . "' {$sql_dk} order by mats ";
            $query = $this->re_query($sql1);
            $TONGNGUYENGIA1 = 0;
            $TONGGTCONLAI1 = 0;
            $TONGKHAUHAO1=0;
            while ($data1 = $this->re_fetch($query)) {
                $i++;
                $data1['STT'] = $i;
                $data1['tents'] =  "- -".$data1['tents'];

                $data1['tylekh'] = $loadBangKHTaiSan[$data1['mats']]['tylekh'];
                $data1['tgsudung'] = $loadBangKHTaiSan[$data1['mats']]['tgsudung'];
                $data1['nguyengia'] = $loadBangKHTaiSan[$data1['mats']]['nguyengia'];
                $data1['gtconlai'] = $loadBangKHTaiSan[$data1['mats']]['gtconlai'];
                $data1['sokh'] = $loadBangKHTaiSan[$data1['mats']]['sokh'];
                $data1['tienno'] = $loadBangKHTaiSan[$data1['mats']]['tienno'];

                $data1['daban'] = $loadBangKHTaiSan[$data1['mats']]['daban'];
                $data1['soluong'] = $loadBangKHTaiSan[$data1['mats']]['soluong'];

                $trees[$data1['mats']] = $data1;
                $sql2 = "SELECT mats,matscha,dvt,matk as tkno,tents,ngaysd FROM mats WHERE $sql_w matscha ='" . $data1['mats'] . "' {$sql_dk} order by mats ";
                $query1 = $this->re_query($sql2);
                $TONGNGUYENGIA2 = 0;
                $TONGGTCONLAI2 = 0;
                $TONGKHAUHAO2=0;
                while ($data2 = $this->re_fetch($query1)) {
                    $i++;
                    $data2['STT'] = $i;

                    $data2['tylekh'] = $loadBangKHTaiSan[$data2['mats']]['tylekh'];
                    $data2['tgsudung'] = $loadBangKHTaiSan[$data2['mats']]['tgsudung'];
                    $data2['nguyengia'] = $loadBangKHTaiSan[$data2['mats']]['nguyengia'];
                    $data2['gtconlai'] = $loadBangKHTaiSan[$data2['mats']]['gtconlai'];
                    $data2['sokh'] = $loadBangKHTaiSan[$data2['mats']]['sokh'];
                    $data2['tienno'] = $loadBangKHTaiSan[$data2['mats']]['tienno'];

                    $data2['daban'] = $loadBangKHTaiSan[$data2['mats']]['daban'];
                    $data2['soluong'] = $loadBangKHTaiSan[$data2['mats']]['soluong'];

                    $TONGNGUYENGIA2+=$data2['nguyengia'];
                    $TONGGTCONLAI2+=$data2['gtconlai'];
                    $TONGKHAUHAO2+=$data2['sokh'];
                    $trees[$data2['mats']] = $data2;
                }

                $TONGNGUYENGIA1+=$data1['nguyengia']+$TONGNGUYENGIA2;
                $TONGGTCONLAI1+=$data1['gtconlai']+$TONGGTCONLAI2;
                $TONGKHAUHAO1+=$data1['sokh']+$TONGKHAUHAO2;

                $trees[$data1['mats']]['nguyengia'] =  $data1['nguyengia']+$TONGNGUYENGIA2;
                $trees[$data1['mats']]['gtconlai'] =  $data1['gtconlai']+$TONGGTCONLAI2;
                $trees[$data1['mats']]['sokh'] = $data1['sokh']+$TONGKHAUHAO2;
            }
            $TONGNGUYENGIA=$data['nguyengia']+$TONGNGUYENGIA1;
            $TONGGTCONLAI=$data['gtconlai']+$TONGGTCONLAI1;
            $TONGKHAUHAO=$data['sokh']+$TONGKHAUHAO1;

            $trees[$data['mats']]['nguyengia'] = $TONGNGUYENGIA;
            $trees[$data['mats']]['gtconlai'] = $TONGGTCONLAI;
            $trees[$data['mats']]['sokh'] = $TONGKHAUHAO;
        }
        return $trees;

    }

    function loadListKhauHaoTaiSan_CaNam_Theo_MaTK($tuthang,$denthang,$Loai="")
    {
        if($denthang==0){
            $denthang=1;
            $sql_dk = " and YEAR(ngaysd)!='".$_SESSION['NienDo']."' ";
        }
        $loadBangKHTaiSan = $this->loadBangKHTaiSan_CaNam($tuthang,$denthang,$Loai);
        //debug($loadBangKHTaiSan);
        $parentid=0;
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = $this->get_orderby() . " and ";

        $sql = "SELECT mats,matscha,dvt,matk as tkno,tents,ngaysd FROM mats WHERE 0=0 $sql_w  {$sql_dk}  order by mats DESC ";
        $this->query($sql);
        $i = 0;
        while ($data = $this->fetch()) {
            $i++;
            $data['STT'] = $i;
            $matk = $loadBangKHTaiSan[$data['mats']]['matk'];
            $data['tgsudung'] = $loadBangKHTaiSan[$data['mats']]['tgsudung'];
            $data['tylekh'] = $loadBangKHTaiSan[$data['mats']]['tylekh'];
            $data['matk'] = $loadBangKHTaiSan[$data['mats']]['matk'];
            $data['nguyengia'] = $loadBangKHTaiSan[$data['mats']]['nguyengia'];
            $data['gtconlai'] = $loadBangKHTaiSan[$data['mats']]['gtconlai'];
            $data['sokh'] = $loadBangKHTaiSan[$data['mats']]['sokh'];
            $data['tienno'] = $loadBangKHTaiSan[$data['mats']]['tienno'];
            $data['daban'] = $loadBangKHTaiSan[$data['mats']]['daban'];
            $data['soluong'] = $loadBangKHTaiSan[$data['mats']]['soluong'];
            if($matk!=""){
                $trees[$matk][] = $data;
            }
        }
        return $trees;

    }

    function loadBangKHTaiSan($thang){
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = " and " . $this->get_orderby();
        $sql = "SELECT * from bangkhtaisan where thang=" . $thang;
        $this->query($sql);
        $i = 0;
        while ($data = $this->fetch()) {
            $i++;
            $trees[$data['mats']] = $data;
        }
        return $trees;
    }

    function loadBangKHTaiSan_CaNam($tuthang,$denthang,$Loai){
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = " and " . $this->get_orderby();
        if($Loai=="BK"){
            $sql = "SELECT sott,mats,tents,tylekh,max(daban) as daban,(select sum(nguyengia) from psts t where t.mats=bangkhtaisan.mats and t.tanggiam in (0,1) GROUP BY mats ORDER by thang DESC LIMIT 1 ) as nguyengia,sum(sokh) as sokh,tkno,sum(tienno) as tienno ,tkco,matk,dvt,mabp,tenbp,(select gtconlai from bangkhtaisan t where t.mats=bangkhtaisan.mats ORDER by thang DESC LIMIT 1 ) as gtconlai,tgsudung,max(soluong) as soluong from bangkhtaisan where thang>='" . $tuthang . "' and thang<='" . $denthang . "' GROUP by mats HAVING max(daban)=0";
        }else {
            $sql = "SELECT sott,mats,tents,tylekh,max(daban) as daban,(select sum(nguyengia) from psts t where t.mats=bangkhtaisan.mats and t.tanggiam in (0,1) GROUP BY mats ORDER by thang DESC LIMIT 1 ) as nguyengia,sum(sokh) as sokh,tkno,sum(tienno) as tienno ,tkco,matk,dvt,mabp,tenbp,(select gtconlai from bangkhtaisan t where t.mats=bangkhtaisan.mats ORDER by thang DESC LIMIT 1 ) as gtconlai,tgsudung,max(soluong) as soluong from bangkhtaisan where thang>='" . $tuthang . "' and thang<='" . $denthang . "' GROUP by mats";
        }
        $this->query($sql);
        $i = 0;
        while ($data = $this->fetch()) {
            $i++;
            $trees[$data['mats']] = $data;
        }
        return $trees;
    }

    function loadTongGiaTriKhauHao($denthang,$mats){
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = " and " . $this->get_orderby();
        $sql = "SELECT sum(sokh) as tongkh from bangkhtaisan where thang<='".$denthang."' and mats='{$mats}' GROUP by mats";
        $res = $this->re_query($sql);
        $data = $this->re_fetch($res);
        return $data;
    }


    function thembangkhauhaotstheothang($tuthang, $denthang, $sophieu,$ngaycuoithang,$xoakhauhaodatrichtrongky,$khongtaobuttoandinhkhoan,$khauhaotheo,$khauhaotaisanhetkhauhao)
    {
        $trees = array();
        $value = "";
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = " and " . $this->get_orderby();
        $sql = " SELECT t1.mats,t1.tents,t1.dvt,t1.tkno,t1.tkco,max(t1.tylekh) as tylekh,t1.mabp,t1.bophan,min(t2.ngaysd) as ngaysd,t2.ngaygiam,t2.matkgiam,max(t1.soluong) soluong,t1.matk,t1.thoigiansd,t2.khauhao,( select sum(sokh) from bangkhtaisan where bangkhtaisan.mats = t1.mats and thang<'".$tuthang."' GROUP by bangkhtaisan.mats) as tongkhdenthang,t1.loaisp,t2.cpkhongduoctru FROM mats t2 left join psts t1  on(t1.mats = t2.mats) group by t1.mats";
        $this->query($sql);
        $datadaukyTS = $this->daukytaisan();
        if ($tuthang == 1) {
            $datadaukyTSThangTruoc = $this->daukytaisan();
        } else {
            $datadaukyTSThangTruoc = $this->thangtruoctaisan($tuthang, $denthang);
        }
        $datatangTS = $this->tangtaisan(1, $denthang,$khauhaotheo);
        $datatangTSThangTruoc = $this->tangtaisan($tuthang, $denthang,$khauhaotheo);
        //$datagiamTS = $this->giamtaisan(1, $denthang);
        //$datagiamTSThangTruoc = $this->giamtaisan($tuthang, $denthang);

        $this->re_query("ALTER TABLE `bangkhtaisan` ADD `daban` INT(1) NOT NULL;");
        $this->re_query("delete from bangkhtaisan where thang='" . $tuthang."'");

        $sql_emp_pskt = "delete from pskt where month(ngayghiso)='" . $tuthang . "' and loaiphieu='69'";
        $this->re_query($sql_emp_pskt);

        $sql_emp_chitiet_pskt = "delete from chitiet_pskt where month(ngayhoadon)='" . $tuthang . "' and loaiphieu='69' ";
        $this->re_query($sql_emp_chitiet_pskt);

        $sql_emp_pskt_giam = "delete from pskt where month(ngayghiso)='" . $tuthang . "' and loaiphieu='68'";
        $this->re_query($sql_emp_pskt_giam);

        $sql_emp_chitiet_pskt_giam = "delete from chitiet_pskt where month(ngayhoadon)='" . $tuthang . "' and loaiphieu='68' ";
        $this->re_query($sql_emp_chitiet_pskt_giam);

        $sql_emp_pskt_giam85 = "delete from pskt where month(ngayghiso)='" . $tuthang . "' and loaiphieu='85'";
        $this->re_query($sql_emp_pskt_giam85);

        $sql_emp_chitiet_pskt_giam85 = "delete from chitiet_pskt where month(ngayhoadon)='" . $tuthang . "' and loaiphieu='85' ";
        $this->re_query($sql_emp_chitiet_pskt_giam85);

        $this->re_query("delete from psts where tanggiam='2' and month(ngayghiso)='{$denthang}'");

        $i = $sophieu;
        $tongtien=0;
        $value_pskt_giam = "";
        $value_chitiet_pskt_giam = "";
        $array_tkno_co= array();
        while ($data = $this->fetch()) {

            //debug($data);
            $dagiam = 0;
            $timesd = strtotime($data['ngaysd']);
            $Date_SD = date("d",$timesd);
            $Month_SD = date("m",$timesd);
            $Year_SD = date("Y",$timesd);

            $timegiam = strtotime($data['ngaygiam']);
            $Date_Giam = date("d",$timegiam);
            $Month_Giam = date("m",$timegiam);
            $Year_Giam = date("Y",$timegiam);

            $i++;
            if(number_format($data['tylekh'])==0){
                $tylekh = $datadaukyTS['tylekh'];
            }else{
                $tylekh = $data['tylekh'];
            }
            $mats = $data['mats'];

            $tongnguyengia = $datadaukyTS[$mats]['nguyengia'] + $datatangTS[$mats]['nguyengia'];
            $tienkhthang = $datatangTS[$mats]['muckhthang'];

            if($Month_SD==$tuthang && $Year_SD==$_SESSION['NienDo']){// Khấu hao nằm trong tháng sử dụng

                $tienkhthang_trongthang = $datatangTS[$mats]['muckhthang'];

                $tienkhngay = $tienkhthang_trongthang/30;// Tính số tiền khấu hao của 1 ngày
                $NgayCuoiThang = ngaycuoithang($tuthang,$_SESSION['NienDo']);
                $first_date = strtotime($NgayCuoiThang);
                $second_date = strtotime($data['ngaysd']);
                $datediff = abs($first_date - $second_date);
                $SoNgaySD = floor($datediff / (60*60*24));
                $tienkhthang = $tienkhngay*$SoNgaySD;

            }

            $tongkhthang = $datadaukyTS[$mats]['muckhthang'] + $tienkhthang;

            if($Month_Giam==$tuthang && $Year_Giam==$_SESSION['NienDo']){

                $tienkhthang_trongthang = $datadaukyTS[$mats]['muckhthang']+$datatangTS[$mats]['muckhthang'];

                $tienkhngay = $tienkhthang_trongthang/30;// Tính số tiền khấu hao của 1 ngày
                $NgayDauThang = $_SESSION['NienDo']."/".$tuthang."/01";
                $first_date_giam = strtotime($NgayDauThang);
                $second_date_giam = strtotime($data['ngaygiam']);
                $datediff = abs($second_date_giam - $first_date_giam);
                $SoNgayGiam = floor($datediff / (60*60*24));
                $tongkhthang = round($tienkhngay*$SoNgayGiam);

                $dagiam = 1;
            }  // Hết kết thúc giảm tài sản

            if($data['khauhao']==0){
                $tongkhthang=0;
            }

            $gtconlai = $datadaukyTSThangTruoc[$mats]['giatriconlai']+$datatangTSThangTruoc[$mats]['giatriconlai'];// Giá trị còn lại của công cụ dụng cụ
            $gtconlai_trupb = $gtconlai;


            if($gtconlai_trupb<=0){
                $gtconlai_trupb=0;
                $tongkhthang=0;
            }
            $tienkhauhoa1thangtmp= $gtconlai-$data['tongkhdenthang'];
            if($tienkhauhoa1thangtmp<$tongkhthang){
                $tongkhthang= $gtconlai-$data['tongkhdenthang'];
            }
            /// Nếu hết thời gian khấu hao thì số khấu hao =0
            $Ngaykhautrucuoicung = ngaycuoithang($denthang,$_SESSION['NienDo']);
            $Ngaysudungcuoithang = ngaycuoithang(date("m",strtotime($data['ngaysd'])),date("Y",strtotime($data['ngaysd'])));
            //$Ngaysudungcuoithang = date("Y",strtotime($data['ngaysd']))."/".date("m",strtotime($data['ngaysd']))."/".date("t",$data['ngaysd']);


            $date1 = new DateTime($Ngaysudungcuoithang);
            $date2 = new DateTime($Ngaykhautrucuoicung);

            $interval = $date1->diff($date2);
            if($interval->y==($data['thoigiansd']/12) && $interval->m==0 && $interval->d==0 && $tongkhthang!=0){
				$khauhaotrongthangtamtinh =$tongkhthang;
                $tongkhthang= $gtconlai-$data['tongkhdenthang'];
				$SoTienKhauHaoQuaQuyDinh = $tongkhthang - $khauhaotrongthangtamtinh; // Neu GTCT Tai San Lon hon khau hao 20 trieu thi chi khau hao 1 thang va canh bao
					if($khauhaotaisanhetkhauhao=="theodungtyle"){
						$tongkhthang=$khauhaotrongthangtamtinh;
					}
            }
            if($interval->y>=($data['thoigiansd']/12) && (($interval->m>0 && $interval->d==0) || ($interval->m==0 && $interval->d>0) || ($interval->m>0 && $interval->d>0)) ){
				$khauhaotrongthangtamtinh =$tongkhthang;
                $tongkhthang = $gtconlai-$data['tongkhdenthang'];
				$SoTienKhauHaoQuaQuyDinh = $tongkhthang - $khauhaotrongthangtamtinh; // Neu GTCT Tai San Lon hon khau hao 20 trieu thi chi khau hao 1 thang va canh bao
				if($khauhaotaisanhetkhauhao=="theodungtyle"){
					if($SoTienKhauHaoQuaQuyDinh>=100000 && $data['khauhao']!=0){
						$str_taisan_qua_thoi_gian.=$data['mats'].",";					
						$tongkhthang=$khauhaotrongthangtamtinh;					
					}else if(($SoTienKhauHaoQuaQuyDinh<100000 || $SoTienKhauHaoQuaQuyDinh>-100000) && $SoTienKhauHaoQuaQuyDinh!=0 && $data['khauhao']!=0){
						$str_taisan_qua_thoi_gian.=$data['mats'].",";					
						$tongkhthang=$tongkhthang;
					}else{
						$tongkhthang=0;
					}
				}else{
					$tongkhthang=0;
				}
            }

            if($dagiam==1){// /// Tạo bút toán khi giảm tài sản cố định
                $TongKhauHaoTaiSan_arr = $this->loadTongGiaTriKhauHao($denthang,$data['mats']);

                $TongKhauHaoTaiSan = ($TongKhauHaoTaiSan_arr['tongkh']+$tongkhthang);


                $GTTSConLaiHienTai= abs($tongnguyengia -($TongKhauHaoTaiSan+($tongnguyengia-$gtconlai)));

                $GTHMTaiSanHienTai = abs($tongnguyengia-$GTTSConLaiHienTai);

                $matkgiam = $data['matkgiam'];
                if($matkgiam==""){
                    $matkgiam = "811";
                }

                $value_pskt_giam .= "('" . $sophieu . "','68','" . $data['ngaygiam'] . "','".$data['matk']."','68','" . ($tongnguyengia) . "','68'),";
                $value_chitiet_pskt_giam .= "('68','" . $data['ngaygiam'] . "','" . ($GTTSConLaiHienTai) . "','" . $GTHMTaiSanHienTai . "','0001','Toàn bộ','100092','GT còn lại khi giảm TSCĐ - Mã TS: {$data['mats']} ','100093','Hao mòn khi giảm TSCĐ - Mã TS {$data['mats']}','".$matkgiam."','".$data['tkco']."','" . abs($tongnguyengia) . "','4','68','" . $sophieu . "','68','" . $data['cpkhongduoctru'] . "'),";

                $sql_in = "INSERT INTO psts (mapsts,mats,tents,dvt,matk,ngaysd,nuocsx,ngaysx,congsuat,tylekh,thoigiansd,soluong,dongia,nguyengia,giatriconlai,muckhthang,muckhquy,muckhnam,tkco,tkno,chuthich,tenkd,mabp,bophan,mand,noidung,manhomts,tanggiam,ngayghiso,ngayhoadon,tennhomts,thamchieu,loaisp) 
			     VALUES ('1','" . $data['mats'] . "', '" . $data['tents']. "','" . $data['dvt'] . "','".$data['matk']."','" . $data['ngaysd']. "','" . $this->get_NuocSX() . "','" . $this->get_NgaySX() . "','" . $this->get_CongSuat() . "','" . $data['tylekh'] . "','" . $data['thoigiansd'] . "','" .$data['soluong'] . "','" . $tongnguyengia . "','" .$tongnguyengia . "', '" . $GTTSConLaiHienTai . "','" . $data['muckhthang'] . "','" . ($data['muckhthang'] * 3) . "','" . ($data['muckhthang'] * 12) . "','" . $data['tkco'] . "','" . $data['tkno'] . "','" . $this->get_ChuThich() . "', '" . $this->get_TenKD() . "','0001','Toàn bộ','_ATS04','Giảm cho thanh lý, nhượng bán','".$data['matk']."','2','".$data['ngaygiam']."','" . $data['ngaygiam'] . "','" . $data['ngaygiam'] . "','" . $this->getThamChieu() . "','" .$data['loaisp'] . "');";
                $this->re_query($sql_in);
                $this->re_query("update psts set mapsts=sott where tanggiam='2'");
                $sophieu++;
                $gtconlai_trupb = 0;/// Giá trị còn lại hết
                $tylekh = 0;
            }

            $NgayDauThangKH = $_SESSION['NienDo']."/".$tuthang."/01";
            $NgayDauThangKhTS = strtotime($NgayDauThangKH);
            $NgayGiamTaiSanKH = strtotime($data['ngaygiam']);
            $KhangCach2NgayGiam = ($NgayGiamTaiSanKH - $NgayDauThangKhTS);

            if($KhangCach2NgayGiam<0 && $data['ngaygiam']!="0000-00-00"){
                $tongkhthang=0;
                $tongnguyengia = 0;
            }

            if($tongkhthang<0){
                $tongkhthang=0;
            }

            // end hết thời gian khấu hao
			$tongkhthang = round($tongkhthang);
            $value .= "('" . $data['mats'] . "','" . $data['tents'] . "','" . $data['dvt'] . "','" . $tylekh . "','" . $tongnguyengia . "','" . $tongkhthang . "','" . $data['tkno'] . "','" . $tongkhthang . "','" . $tuthang . "','" . $data['mabp'] . "','" . $data['bophan'] . "','".$gtconlai_trupb."','" . $data['soluong'] . "','" . $data['ngaysd'] . "','" . $data['matk'] . "','" . $data['tkco'] . "','" . $data['thoigiansd'] . "','" . $data['loaisp'] . "','{$dagiam}'),";

            //////////Thêm vào ps khác
            $tkno= $data['tkno'];
            $tkco= $data['tkco'];
            $CPKhongDuocTru= $data['cpkhongduoctru'];
            $LoaiSP= $data['loaisp'];
            $MaBP= $data['mabp'];
            if(array_key_exists ($tkno."-".$tkco."-".$CPKhongDuocTru."-".$LoaiSP."-".$MaBP,$array_tkno_co)){
                $array_tkno_co[$tkno."-".$tkco."-".$CPKhongDuocTru."-".$LoaiSP."-".$MaBP]['tien']+=abs($tongkhthang);
                $array_tkno_co[$tkno."-".$tkco."-".$CPKhongDuocTru."-".$LoaiSP."-".$MaBP]['mabp']=$data['mabp'];
                $array_tkno_co[$tkno."-".$tkco."-".$CPKhongDuocTru."-".$LoaiSP."-".$MaBP]['bophan']=$data['bophan'];
                $array_tkno_co[$tkno."-".$tkco."-".$CPKhongDuocTru."-".$LoaiSP."-".$MaBP]['loaisp']=$data['loaisp'];
            }else{
                $array_tkno_co[$tkno."-".$tkco."-".$CPKhongDuocTru."-".$LoaiSP."-".$MaBP]['tien']=abs($tongkhthang);
                $array_tkno_co[$tkno."-".$tkco."-".$CPKhongDuocTru."-".$LoaiSP."-".$MaBP]['mabp']=$data['mabp'];
                $array_tkno_co[$tkno."-".$tkco."-".$CPKhongDuocTru."-".$LoaiSP."-".$MaBP]['bophan']=$data['bophan'];
                $array_tkno_co[$tkno."-".$tkco."-".$CPKhongDuocTru."-".$LoaiSP."-".$MaBP]['loaisp']=$data['loaisp'];
            }
            /////////////
            $trees[] = $data;
        }
		echo substr($str_taisan_qua_thoi_gian,0,-1);
        $sql_ins = " Insert into bangkhtaisan (mats,tents,dvt,tylekh,nguyengia,sokh,tkno,tienno,thang,mabp,tenbp,gtconlai,soluong,ngaysd,matk,tkco,tgsudung,loaisp,daban) VALUE " . substr($value, 0, -1);
        if($xoakhauhaodatrichtrongky=="false"){
            $this->re_query($sql_ins);
        }
        $dem=$tuthang;
        $value_pskt="";
        $value_chitiet_pskt="";
        $tongtien=0;
        foreach($array_tkno_co as $key=>$value){
            $tknoco = explode("-",$key);
            $no= $tknoco[0];
            $co= $tknoco[1];
            $cpkhongduoctru= $tknoco[2];
            $tongtien =$value['tien'];
            $value_pskt .= "('" . $sophieu . "','" . $dem . "','" . $ngaycuoithang . "','" . $no . "','69','" . $tongtien . "'),";
            $value_chitiet_pskt .= "('" . $dem . "','" .$ngaycuoithang . "','" . $tongtien . "','" . $value['mabp'] . "','" . $value['bophan'] . "','100090','Khấu hao tài sản cố định tháng $tuthang - $_SESSION[NienDo]','" . $co . "','" . $tongtien . "','4','69','" . $sophieu . "','".$value['loaisp']."','".$cpkhongduoctru."'),";
            $sophieu++;
            $dem++;
        }

        $sql_pskt_giam = "insert into pskt(sophieu,mapskt,ngayghiso,tkco,loaiphieu,tongcong,btps) VALUE " . substr($value_pskt_giam, 0, -1);
        $sql_chitiet_pskt_giam = "insert into chitiet_pskt(mapskt,ngayhoadon,gtvnd1,gtvnd2,mabp,bophan,mand1,noidung1,mand2,noidung2,tkno1,tkno2,tongtien,maloai,loaiphieu,sophieu,btps,chiphikhongloaitru) VALUE " . substr($value_chitiet_pskt_giam, 0, -1);

        $sql_pskt = "insert into pskt(sophieu,mapskt,ngayghiso,tkco,loaiphieu,tongcong) VALUE " . substr($value_pskt, 0, -1);
        $sql_chitiet_pskt = "insert into chitiet_pskt(mapskt,ngayhoadon,gtvnd1,mabp,bophan,mand1,noidung1,tkno1,tongtien,maloai,loaiphieu,sophieu,loaisp,chiphikhongloaitru) VALUE " . substr($value_chitiet_pskt, 0, -1);
        if($khongtaobuttoandinhkhoan=="false"){
            $this->re_query($sql_pskt);
            $this->re_query($sql_chitiet_pskt);
        }
        $this->re_query($sql_pskt_giam);
        $this->re_query($sql_chitiet_pskt_giam);

        return $trees;
    }


    function tangtaisan($tuthang, $denthang,$khauhaotheo)
    {
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = " and " . $this->get_orderby();
        $sql = "SELECT mats,sum(nguyengia) as nguyengia,sum(muckhthang) as muckhthang,sum(muckhnam) as muckhnam,sum(giatriconlai) as giatriconlai FROM psts where tanggiam='1' and MONTH($khauhaotheo)>='" . $tuthang . "' and MONTH($khauhaotheo)<='" . $denthang . "' group by mats ";
        $result = $this->re_query($sql);
        while ($data = $this->re_fetch($result)) {
            $trees[$data['mats']] = $data;
        }
        return $trees;
    }

    function giamtaisan($tuthang, $denthang)
    {
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = " and " . $this->get_orderby();
        $sql = "SELECT mats,sum(nguyengia) as nguyengia,sum(muckhthang) as muckhthang,sum(muckhnam) as muckhnam,sum(giatriconlai) as giatriconlai  FROM psts where tanggiam='2' and MONTH(ngayghiso)>='" . $tuthang . "' and MONTH(ngayghiso)<='" . $denthang . "' group by mats ";
        $result = $this->re_query($sql);
        while ($data = $this->re_fetch($result)) {
            $trees[$data['mats']] = $data;
        }
        return $trees;
    }

    function daukytaisan()
    {
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = " and " . $this->get_orderby();
        $sql = "SELECT mats,sum(nguyengia) as nguyengia,sum(muckhthang) as muckhthang,sum(muckhnam) as muckhnam,tylekh,giatriconlai FROM psts where tanggiam=0 group by mats ";
        $result = $this->re_query($sql);
        while ($data = $this->re_fetch($result)) {
            $trees[$data['mats']] = $data;
        }
        return $trees;
    }

    function thangtruoctaisan($tuthang, $denthang)
    {
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = " and " . $this->get_orderby();
		
		$sql = "SELECT mats,sum(nguyengia) as nguyengia,sum(sokh) as muckhthang,sum(gtconlai) as giatriconlai FROM bangkhtaisan WHERE thang = (select max(thang) from bangkhtaisan where thang < {$tuthang} ) group by mats";
        $result = $this->re_query($sql);
        while ($data = $this->re_fetch($result)) {
            $trees[$data['mats']] = $data;
        }
        return $trees;
    }

    function loadListMaTaiSanCon($makhcha)
    {
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = " and " . $this->get_orderby();
        $sql = "SELECT mats from mats WHERE matscha='" . $makhcha . "'";
        $this->query($sql);
        $i = 0;
        $num = $this->num_rows();
        if ($num == 0) {
            return 0;
        } else {
            while ($data = $this->fetch()) {
                $i++;
                $ma = explode("-", $data[mats]);
                $sopt = count($ma) - 1;
                $trees[$ma[$sopt]] = $ma;
            }
            return $trees;
        }
    }

}

?>
