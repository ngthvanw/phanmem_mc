<?php

class danhmuccptratruoc extends database
{
    public $tringorder;

    public $MaTaiSan;
    public $MaTaiSanCha;
    public $ThamChieu;
    public $LoaiSP;
    public $KhauHao;
    public $TheoDoi;

    /**
     * @return mixed
     */
    public function getTheoDoi()
    {
        return $this->TheoDoi;
    }

    /**
     * @param mixed $TheoDoi
     */
    public function setTheoDoi($TheoDoi)
    {
        $this->TheoDoi = $TheoDoi;
    }
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
        $sql = "select * from cptratruoc where mats='" . $this->get_MaTaiSan() . "' and sott!=" . $this->get_SoTT() . "";
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
        $sql = "select * from cptratruoc  where matscha='" . $this->get_MaTaiSan() . "'";
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

    public function checkKeyChaCPTraTruoc()
    {
        $sql = "select * from cptratruoc where mats='" . $this->get_MaTaiSan() . "'";
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

    public function createSoTT_MaCPTraTruoc()
    {
        $sql = "select max(sott) as sott from cptratruoc";
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

    function loadListAllDSSPTRATRUOC($parentid = 0, $printto = 10)
    { // c?p 1 la cha
        //$cb_loaitk = $this->get_Cb_LoaiTK();
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = $this->get_orderby() . " and ";
        $sql = "SELECT * FROM cptratruoc WHERE $sql_w matscha = '$parentid'  order by mats DESC ";
        $this->query($sql);
        $i = 0;
        while ($data = $this->fetch()) {
            $i++;
            $data['STT'] = $i;
            $trees[] = $data;
            $sql1 = "SELECT * FROM cptratruoc WHERE $sql_w matscha ='" . $data['mats'] . "' order by mats ";
            $query = $this->re_query($sql1);
            while ($data1 = $this->re_fetch($query)) {
                if ($printto == 1) {
                    break;
                }
                $i++;
                $data1['STT'] = $i;
                $trees[] = $data1;
                $sql2 = "SELECT * FROM cptratruoc WHERE $sql_w matscha ='" . $data1['mats'] . "' order by mats ";
                $query1 = $this->re_query($sql2);
                while ($data2 = $this->re_fetch($query1)) {
                    if ($printto == 2) {
                        break;
                    }
                    $i++;
                    $data2['STT'] = $i;
                    $trees[] = $data2;
                }
            }
        }
        return $trees;
    }
	
	
    function loadListAllDSSPTRATRUOC_W($parentid = 0, $printto = 10)
    { // c?p 1 la cha
        //$cb_loaitk = $this->get_Cb_LoaiTK();
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = $this->get_orderby() . " and ";
        $sql = "SELECT * FROM cptratruoc WHERE $sql_w matscha = '$parentid'  order by mats DESC ";
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
        $sql = "SELECT * FROM pscptt WHERE 0=0 $sql_w  order by mapsts";
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

    public function themMaCPTraTruoc()
    {
        $sql = "INSERT INTO cptratruoc (sott,mats,tents,dvt,matk,ngaysd,nuocsx,ngaysx,congsuat,tylekh,thoigiansd,dongia,nguyengia,chuthich,tenkd,manhomts,matscha,khauhao,cpkhongduoctru,theodoi) 
			VALUES ('" . $this->get_SoTT() . "','" . $this->get_MaTaiSan() . "', '" . $this->get_TenTaiSan() . "','" . $this->get_DVT() . "','" . $this->get_MaTK() . "','" . $this->getNgaySD() . "','" . $this->get_NuocSX() . "','" . $this->get_NgaySX() . "','" . $this->get_CongSuat() . "','" . $this->get_TyLeKH() . "','" . $this->get_ThoiGianSD() . "','" . $this->get_SoLuong() . "','" . $this->get_NguyenGia() . "','" . $this->get_ChuThich() . "', '" . $this->get_TenKD() . "','" . $this->get_MaNhomTS() . "','" . $this->getMaTaiSanCha() . "','" . $this->getKhauHao() . "','" . $this->getCPKhongDuocTru() . "','" . $this->getTheoDoi() . "');";
        $this->query($sql);
    }

    public function themPSTS()
    {
        $sql = "INSERT INTO pscptt (mapsts,mats,tents,dvt,matk,ngaysd,nuocsx,ngaysx,congsuat,tylekh,thoigiansd,soluong,dongia,nguyengia,giatriconlai,muckhthang,muckhquy,muckhnam,tkco,tkno,chuthich,tenkd,mabp,bophan,mand,noidung,manhomts,tanggiam,ngayghiso,ngayhoadon,tennhomts,thamchieu,loaisp) 
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

    public function suaCPTraTruoc()
    {
        $sql = "update cptratruoc set 
						mats='" . $this->get_MaTaiSan() . "',
						matscha='" . $this->getMaTaiSanCha() . "',
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
						nguyengia='" . $this->get_NguyenGia() . "',
						giatriconlai='" . $this->get_GiaTriConLai() . "',
						chuthich='" . $this->get_ChuThich() . "',
						manhomts='" . $this->get_MaNhomTS() . "',
						khauhao='" . $this->getKhauHao() . "',
						theodoi='" . $this->getTheoDoi() . "',
						cpkhongduoctru='" . $this->getCPKhongDuocTru() . "',						
						tenkd='" . $this->get_TenKD() . "'
                  WHERE sott = '" . $this->get_SoTT() . "'";
        $this->query($sql);
    }

    public function suaPSTS()
    {
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = $this->get_orderby()." and ";
        $sql = "update pscptt set 
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
                  WHERE {$sql_w} mapsts='" . $this->get_MaPSTS() . "' and tanggiam = '" . $this->get_TangGiam() . "'";
        $this->query($sql);
    }

    public function xoaTS()
    {
        $sql = "delete from ts where sott='" . $this->get_SoTT() . "'";
        $this->query($sql);
    }

    public function xoaPhieu()
    {
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = " and " . $this->get_orderby();
        $sql = "delete from pscptt where mapsts='" . $this->get_SoTT() . "' and tanggiam='" . $this->get_TangGiam() . "' $sql_w ";
        $this->query($sql);
    }

    public function xoaMaTS()
    {
        $sql = "delete from cptratruoc where sott='" . $this->get_SoTT() . "'";
        $this->query($sql);
    }


    public function createMaCPTraTruoc()
    {
        $sql = "select max(sott) as mats from cptratruoc";
        $this->query($sql);
        $data = $this->fetch();
        if ($data['mats'] != "") {
            return $data['mats'] + 1;
        } else {
            return 0;
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
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = $this->get_orderby()." and " ;

        $sql = "select * from pscptt where {$sql_w} mapsts='" . $this->get_MaPSTS() . "' and tanggiam='" . $this->get_TangGiam() . "'";
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

        $sql = "select max(mapsts) as mapsts from pscptt where 0=0 $sql_w ";
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
        $sql = "SELECT * from pscptt where tanggiam=1 order by mats";
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
        $loadBangTaiSanTangTrongKy = $this->LoadListTaiSanTangTrongKy();
        $loadBangKHTaiSanDK = $this->daukytaisan();
        $parentid = 0;
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = $this->get_orderby() . " and ";
        $sql = "SELECT mats,matscha,dvt,matk as tkno,tents,ngaysd,theodoi FROM cptratruoc WHERE $sql_w matscha = '$parentid'  order by mats DESC ";
        $this->query($sql);
        $i = 0;
        $TONGNGUYENGIA = 0;
        $TONGKHAUHAO = 0;
        while ($data = $this->fetch()) {
            $i++;
            $data['STT'] = $i;
            $data['tylekh'] = $loadBangKHTaiSan[$data['mats']]['tylekh'];// Thời gian còn lại

            $data['sokh'] = $loadBangKHTaiSan[$data['mats']]['sokh'];
            $data['tienno'] = $loadBangKHTaiSan[$data['mats']]['tienno'];
            if (array_key_exists($data['mats'], $loadBangTaiSanTangTrongKy)) {
                $data['nguyengia'] = $loadBangTaiSanTangTrongKy[$data['mats']]['nguyengia'];// Giá mua
                $data['tkno'] = $loadBangTaiSanTangTrongKy[$data['mats']]['tkno'];
                $data['tkco'] = $loadBangTaiSanTangTrongKy[$data['mats']]['tkco'];
                $data['soluong'] = $loadBangTaiSanTangTrongKy[$data['mats']]['soluong'];
                $data['trongky'] = $loadBangTaiSanTangTrongKy[$data['mats']]['trongky'];
                $data['sothangdk'] = $loadBangTaiSanTangTrongKy[$data['mats']]['sothangdk'];
            } else {
                $data['nguyengia'] = $loadBangKHTaiSan[$data['mats']]['nguyengia'];// Giá mua
                $data['tkno'] = $loadBangKHTaiSan[$data['mats']]['tkno'];
                $data['tkco'] = $loadBangKHTaiSan[$data['mats']]['tkco'];
                $data['soluong'] = $loadBangKHTaiSan[$data['mats']]['soluong'];
                $data['trongky'] = $loadBangKHTaiSan[$data['mats']]['trongky'];
                $data['sothangdk'] = $loadBangKHTaiSan[$data['mats']]['sothangdk'];
            }


            if (number_format($loadBangKHTaiSanDK[$data['mats']]['giatriconlai']) == 0) {
                $data['gtconlai'] = $loadBangKHTaiSan[$data['mats']]['nguyengia'];
            } else {
                $data['gtconlai'] = $loadBangKHTaiSanDK[$data['mats']]['giatriconlai'];
            }

            if (number_format($loadBangKHTaiSanDK[$data['mats']]['tylekh']) == 0) {
                $data['sothangconlaidk'] = $loadBangKHTaiSan[$data['mats']]['sothangdk'];
            } else {
                $data['sothangconlaidk'] = $loadBangKHTaiSanDK[$data['mats']]['tylekh'];
            }
            $data['CoSoLieu'] = 0;
            if($data['nguyengia']!=0 || $data['gtconlai']!=0){
                $data['CoSoLieu'] = 1;
            }
            $trees[$data['mats']] = $data;
            $sql1 = "SELECT mats,matscha,dvt,matk as tkno,tents,ngaysd,theodoi FROM cptratruoc WHERE $sql_w matscha ='" . $data['mats'] . "' order by mats ";
            $query = $this->re_query($sql1);
            $TONGNGUYENGIA1 = 0;
            $TONGKHAUHAO1 = 0;
            while ($data1 = $this->re_fetch($query)) {
                $i++;
                $data1['STT'] = $i;
                $data1['tents'] = "- -" . $data1['tents'];

                $data1['tylekh'] = $loadBangKHTaiSan[$data1['mats']]['tylekh'];

                $data1['sokh'] = $loadBangKHTaiSan[$data1['mats']]['sokh'];
                $data1['tienno'] = $loadBangKHTaiSan[$data1['mats']]['tienno'];

                if (array_key_exists($data1['mats'], $loadBangTaiSanTangTrongKy)) {
                    $data1['nguyengia'] = $loadBangTaiSanTangTrongKy[$data1['mats']]['nguyengia'];
                    $data1['tkno'] = $loadBangTaiSanTangTrongKy[$data1['mats']]['tkno'];
                    $data1['tkco'] = $loadBangTaiSanTangTrongKy[$data1['mats']]['tkco'];
                    $data1['soluong'] = $loadBangTaiSanTangTrongKy[$data1['mats']]['soluong'];
                    $data1['trongky'] = $loadBangTaiSanTangTrongKy[$data1['mats']]['trongky'];
                    $data1['sothangdk'] = $loadBangTaiSanTangTrongKy[$data1['mats']]['sothangdk'];

                } else {
                    $data1['nguyengia'] = $loadBangKHTaiSan[$data1['mats']]['nguyengia'];
                    $data1['tkno'] = $loadBangKHTaiSan[$data1['mats']]['tkno'];
                    $data1['tkco'] = $loadBangKHTaiSan[$data1['mats']]['tkco'];
                    $data1['soluong'] = $loadBangKHTaiSan[$data1['mats']]['soluong'];
                    $data1['trongky'] = $loadBangKHTaiSan[$data1['mats']]['trongky'];
                    $data1['sothangdk'] = $loadBangKHTaiSan[$data1['mats']]['sothangdk'];
                }


                $data1['gtconlai'] = $loadBangKHTaiSanDK[$data1['mats']]['giatriconlai'];
                $data1['sothangconlaidk'] = $loadBangKHTaiSanDK[$data1['mats']]['tylekh'];

                $data1['gtconlai'] = $loadBangKHTaiSanDK[$data1['mats']]['giatriconlai'];
                $data1['sothangconlaidk'] = $loadBangKHTaiSanDK[$data1['mats']]['tylekh'];
                $data1['CoSoLieu'] = 0;
                if($data1['nguyengia']!=0 || $data1['gtconlai']!=0){
                    $data1['CoSoLieu'] = 1;
                    $trees[$data['mats']]['CoSoLieu'] = 1;
                }

                $trees[$data1['mats']] = $data1;
                $sql2 = "SELECT mats,matscha,dvt,matk as tkno,tents,ngaysd,theodoi FROM cptratruoc WHERE $sql_w matscha ='" . $data1['mats'] . "' order by mats ";
                $query1 = $this->re_query($sql2);
                $TONGNGUYENGIA2 = 0;
                $TONGKHAUHAO2 = 0;
                while ($data2 = $this->re_fetch($query1)) {
                    $i++;
                    $data2['STT'] = $i;
                    $data1['tents'] = "- - - -" . $data1['tents'];
                    $data2['tylekh'] = $loadBangKHTaiSan[$data2['mats']]['tylekh'];
                    $data2['sokh'] = $loadBangKHTaiSan[$data2['mats']]['sokh'];
                    $data2['tienno'] = $loadBangKHTaiSan[$data2['mats']]['tienno'];
                    if (array_key_exists($data2['mats'], $loadBangTaiSanTangTrongKy)) {
                        $data2['nguyengia'] = $loadBangTaiSanTangTrongKy[$data2['mats']]['nguyengia'];
                        $data2['tkno'] = $loadBangTaiSanTangTrongKy[$data2['mats']]['tkno'];
                        $data2['tkco'] = $loadBangTaiSanTangTrongKy[$data2['mats']]['tkco'];
                        $data2['soluong'] = $loadBangTaiSanTangTrongKy[$data2['mats']]['soluong'];
                        $data2['trongky'] = $loadBangTaiSanTangTrongKy[$data2['mats']]['trongky'];
                        $data2['sothangdk'] = $loadBangTaiSanTangTrongKy[$data1['mats']]['sothangdk'];
                    } else {
                        $data2['nguyengia'] = $loadBangKHTaiSan[$data2['mats']]['nguyengia'];
                        $data2['tkno'] = $loadBangKHTaiSan[$data2['mats']]['tkno'];
                        $data2['tkco'] = $loadBangKHTaiSan[$data2['mats']]['tkco'];
                        $data2['soluong'] = $loadBangKHTaiSan[$data2['mats']]['soluong'];
                        $data2['trongky'] = $loadBangKHTaiSan[$data2['mats']]['trongky'];
                        $data2['sothangdk'] = $loadBangKHTaiSan[$data1['mats']]['sothangdk'];
                    }

                    $data2['gtconlai'] = $loadBangKHTaiSanDK[$data2['mats']]['giatriconlai'];
                    $data2['sothangconlaidk'] = $loadBangKHTaiSanDK[$data2['mats']]['tylekh'];

                    $data2['CoSoLieu'] = 0;
                    if($data2['nguyengia']!=0 || $data2['gtconlai']!=0){
                        $data2['CoSoLieu'] = 1;
                        $trees[$data1['mats']]['CoSoLieu'] = 1;
                    }

                    $TONGNGUYENGIA2 += $data2['nguyengia'];
                    $TONGKHAUHAO2 += $data2['sokh'];
                    $trees[$data2['mats']] = $data2;
                }

                $TONGNGUYENGIA1 += $data1['nguyengia'] + $TONGNGUYENGIA2;
                $TONGKHAUHAO1 += $data1['sokh'] + $TONGKHAUHAO2;

                $trees[$data1['mats']]['nguyengia'] = $data1['nguyengia'] + $TONGNGUYENGIA2;
                $trees[$data1['mats']]['sokh'] = $data1['sokh'] + $TONGKHAUHAO2;
            }
            $TONGNGUYENGIA = $data['nguyengia'] + $TONGNGUYENGIA1;
            $TONGKHAUHAO = $data['sokh'] + $TONGKHAUHAO1;

            $trees[$data['mats']]['nguyengia'] = $TONGNGUYENGIA;
            $trees[$data['mats']]['sokh'] = $TONGKHAUHAO;
        }
        return $trees;

    }

    function loadListKhauHaoTaiSan_CaNam()
    {
        $loadBangKHTaiSan = $this->loadBangKHTaiSan_CaNam();
        $loadBangKHTaiSanDK = $this->daukytaisan();
        $parentid = 0;
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = $this->get_orderby() . " and ";
        $sql = "SELECT mats,matscha,dvt,matk as tkno,tents FROM cptratruoc WHERE $sql_w matscha = '$parentid'  order by mats DESC ";
        $this->query($sql);
        $i = 0;
        $TONGNGUYENGIA = 0;
        $TONGKHAUHAO = 0;
        while ($data = $this->fetch()) {
            $i++;
            $data['STT'] = $i;
            $data['tylekh'] = $loadBangKHTaiSan[$data['mats']]['tylekh'];// Thời gian còn lại
            $data['nguyengia'] = $loadBangKHTaiSan[$data['mats']]['nguyengia'];// Giá mua
            $data['sokh'] = $loadBangKHTaiSan[$data['mats']]['sokh'];
            $data['tienno'] = $loadBangKHTaiSan[$data['mats']]['tienno'];
            $data['tkno'] = $loadBangKHTaiSan[$data['mats']]['tkno'];
            $data['tkco'] = $loadBangKHTaiSan[$data['mats']]['tkco'];
            $data['soluong'] = $loadBangKHTaiSan[$data['mats']]['soluong'];

            $data['sothangdk'] = $loadBangKHTaiSan[$data['mats']]['sothangdk'];

            if (number_format($loadBangKHTaiSanDK[$data['mats']]['giatriconlai']) == 0)
                $data['gtconlai'] = $loadBangKHTaiSan[$data['mats']]['nguyengia'];
            else
                $data['gtconlai'] = $loadBangKHTaiSanDK[$data['mats']]['giatriconlai'];

            if (number_format($loadBangKHTaiSanDK[$data['mats']]['tylekh']) == 0)
                $data['sothangconlaidk'] = $loadBangKHTaiSan[$data['mats']]['sothangdk'];
            else
                $data['sothangconlaidk'] = $loadBangKHTaiSanDK[$data['mats']]['tylekh'];

            $trees[$data['mats']] = $data;
            $sql1 = "SELECT mats,matscha,dvt,matk as tkno,tents FROM cptratruoc WHERE $sql_w matscha ='" . $data['mats'] . "' order by mats ";
            $query = $this->re_query($sql1);
            $TONGNGUYENGIA1 = 0;
            $TONGKHAUHAO1 = 0;
            while ($data1 = $this->re_fetch($query)) {
                $i++;
                $data1['STT'] = $i;
                $data1['tents'] = "- -" . $data1['tents'];

                $data1['tylekh'] = $loadBangKHTaiSan[$data1['mats']]['tylekh'];
                $data1['nguyengia'] = $loadBangKHTaiSan[$data1['mats']]['nguyengia'];
                $data1['sokh'] = $loadBangKHTaiSan[$data1['mats']]['sokh'];
                $data1['tienno'] = $loadBangKHTaiSan[$data1['mats']]['tienno'];

                $data1['tkno'] = $loadBangKHTaiSan[$data1['mats']]['tkno'];
                $data1['tkco'] = $loadBangKHTaiSan[$data1['mats']]['tkco'];

                $data1['soluong'] = $loadBangKHTaiSan[$data1['mats']]['soluong'];

                $data1['gtconlai'] = $loadBangKHTaiSanDK[$data1['mats']]['giatriconlai'];
                $data1['sothangconlaidk'] = $loadBangKHTaiSanDK[$data1['mats']]['tylekh'];
                $data1['sothangdk'] = $loadBangKHTaiSan[$data1['mats']]['sothangdk'];

                $trees[$data1['mats']] = $data1;
                $sql2 = "SELECT mats,matscha,dvt,matk as tkno,tents FROM cptratruoc WHERE $sql_w matscha ='" . $data1['mats'] . "' order by mats ";
                $query1 = $this->re_query($sql2);
                $TONGNGUYENGIA2 = 0;
                $TONGKHAUHAO2 = 0;
                while ($data2 = $this->re_fetch($query1)) {
                    $i++;
                    $data2['STT'] = $i;

                    $data2['tylekh'] = $loadBangKHTaiSan[$data2['mats']]['tylekh'];
                    $data2['nguyengia'] = $loadBangKHTaiSan[$data2['mats']]['nguyengia'];
                    $data2['sokh'] = $loadBangKHTaiSan[$data2['mats']]['sokh'];
                    $data2['tienno'] = $loadBangKHTaiSan[$data2['mats']]['tienno'];

                    $data2['tkno'] = $loadBangKHTaiSan[$data1['mats']]['tkno'];
                    $data2['tkco'] = $loadBangKHTaiSan[$data1['mats']]['tkco'];

                    $data2['soluong'] = $loadBangKHTaiSan[$data1['mats']]['soluong'];

                    $data2['gtconlai'] = $loadBangKHTaiSanDK[$data1['mats']]['giatriconlai'];
                    $data2['sothangconlaidk'] = $loadBangKHTaiSanDK[$data1['mats']]['tylekh'];
                    $data2['sothangdk'] = $loadBangKHTaiSan[$data1['mats']]['sothangdk'];

                    $TONGNGUYENGIA2 += $data2['nguyengia'];
                    $TONGKHAUHAO2 += $data2['sokh'];
                    $trees[$data2['mats']] = $data2;
                }

                $TONGNGUYENGIA1 += $data1['nguyengia'] + $TONGNGUYENGIA2;
                $TONGKHAUHAO1 += $data1['sokh'] + $TONGKHAUHAO2;

                $trees[$data1['mats']]['nguyengia'] = $data1['nguyengia'] + $TONGNGUYENGIA2;
                $trees[$data1['mats']]['sokh'] = $data1['sokh'] + $TONGKHAUHAO2;
            }
            $TONGNGUYENGIA = $data['nguyengia'] + $TONGNGUYENGIA1;
            $TONGKHAUHAO = $data['sokh'] + $TONGKHAUHAO1;

            $trees[$data['mats']]['nguyengia'] = $TONGNGUYENGIA;
            $trees[$data['mats']]['sokh'] = $TONGKHAUHAO;
        }
        return $trees;

    }


    function thembangkhauhaotstheothang($tuthang, $denthang, $sophieu, $ngaycuoithang, $xoakhauhaodatrichtrongky, $khongtaobuttoandinhkhoan, $khauhaotheo)
    {
        $trees = array();
        $array_tkno_co = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = " and " . $this->get_orderby();
        $sql = " SELECT t1.mats,t1.tents,t1.dvt,t1.tkno,t1.tkco,max(t1.thoigiansd) as thoigiansudung,t1.mabp,t1.bophan,max(t1.ngaysd) as ngaysd,max(t1.soluong) as soluong,t1.matk,t2.khauhao,t1.loaisp,tanggiam,t2.cpkhongduoctru,t2.theodoi FROM pscptt t1 INNER JOIN cptratruoc t2 on (t1.mats = t2.mats) group by t1.mats ";
        $this->query($sql);
        if ($tuthang == 1) {
            $datadaukyTS = $this->daukytaisan($tuthang, $denthang, $khauhaotheo);
        } else {
            $datadaukyTS = $this->thangtruoctaisan($tuthang, $denthang);
        }
        $datatangTS = $this->tangtaisan($tuthang, $denthang, $khauhaotheo);
        $datagiamTS = $this->giamtaisan($tuthang, $denthang, $khauhaotheo);
        $this->re_query("delete from bangpbchiphi where thang=" . $tuthang);
        $this->re_query("ALTER TABLE `bangpbchiphi` ADD `trongky` INT(1) NOT NULL;");
        $this->re_query("ALTER TABLE `bangpbchiphi` ADD `theodoi` INT(1) NOT NULL DEFAULT '1';");

        $sql_emp_pskt = "delete from pskt where month(ngayghiso)='" . $tuthang . "' and loaiphieu='71'";
        $this->re_query($sql_emp_pskt);
        $sql_emp_chitiet_pskt = "delete from chitiet_pskt where month(ngayhoadon)='" . $tuthang . "' and loaiphieu='71' ";
        $this->re_query($sql_emp_chitiet_pskt);
        $i = $sophieu;
        $value = "";
        $value_pskt = "";
        $value_chitiet_pskt = "";

        while ($data = $this->fetch()) {
            $timesd = strtotime($data['ngaysd']);
            $tongkhthang = 0;
            $i++;
            $sophieu++;
            $mats = $data['mats'];
            if (number_format($data['thoigiansudung']) == 0) {// Nếu thời gian sử dụng đầu kỳ không có thì lấy trong kỳ
                $thoigiansudung = $datadaukyTS[$mats]['thoigiansudung'];// Thời gian phân bổ của công cụ dụng cụ
            } else {
                $thoigiansudung = $data['thoigiansudung'];
            }

            $tongnguyengia = $datadaukyTS[$mats]['nguyengia'] + $datatangTS[$mats]['nguyengia'] - $datagiamTS[$mats]['nguyengia'];// Giá mua của công cụ dụng cụ

            $sothangconlai = $datadaukyTS[$mats]['tylekh'] + $datatangTS[$mats]['tylekh'] - $datagiamTS[$mats]['tylekh'];// Giá mua của công cụ dụng cụ

            $gtconlai = $datadaukyTS[$mats]['giatriconlai'] + $datatangTS[$mats]['giatriconlai'];// Giá trị còn lại của công cụ dụng cụ

            if ($data['khauhao'] == 0 || $gtconlai <= 0) {// Nếu không phân bổ thì không cho phân bổ
                $tienkhthang = 0;// Số tiền phân bổ trong 1 tháng của công cụ
                $tongkhthang = 0;
            } else {
                $tienkhthang = $datatangTS[$mats]['muckhthang'];// Số tiền phân bổ trong 1 tháng của công cụ
                $tongkhthang = $datadaukyTS[$mats]['muckhthang'] + $tienkhthang;
            }


            $datathangdakh = $datadaukyTS[$mats]['sothangpbdkconlai'];
            $tkno = $data['tkno'];
            $tkco = $data['tkco'];
            $CPKhongDuocTru= $data['cpkhongduoctru'];
            $MaBP= $data['mabp'];
			$Key_tkno_co = $tkno . "-" . $tkco."-".$CPKhongDuocTru."-".$MaBP;
            if (number_format($tongnguyengia) != 0) {
                $sothangdakh = $datathangdakh + 1;
                if ($sothangdakh <= $sothangconlai) {
                    if ($sothangdakh == $sothangconlai && $data['khauhao'] != 0) {
                        $tongnguyengiacuakh = $tongkhthang * $sothangconlai;
                        $giatrichenhlechgiuanguyengia = $tongnguyengiacuakh - $gtconlai;
                        $tongkhthang = $tongkhthang - $giatrichenhlechgiuanguyengia;
                    }
                    if (array_key_exists($Key_tkno_co, $array_tkno_co)) {
                        $array_tkno_co[$Key_tkno_co]['tien'] = $array_tkno_co[$Key_tkno_co]['tien'] + ($tongkhthang);
                        $array_tkno_co[$Key_tkno_co]['mabp'] = $data['mabp'];
                        $array_tkno_co[$Key_tkno_co]['bophan'] = $data['bophan'];
                        $array_tkno_co[$Key_tkno_co]['loaisp'] = $data['loaisp'];
                        $array_tkno_co[$Key_tkno_co]['trongky'] = $data['tanggiam'];
                    } else {
                        $array_tkno_co[$Key_tkno_co]['tien'] = ($tongkhthang);
                        $array_tkno_co[$Key_tkno_co]['mabp'] = $data['mabp'];
                        $array_tkno_co[$Key_tkno_co]['bophan'] = $data['bophan'];
                        $array_tkno_co[$Key_tkno_co]['loaisp'] = $data['loaisp'];
                        $array_tkno_co[$Key_tkno_co]['trongky'] = $data['tanggiam'];
                    }
                    $value .= "('" . $data['mats'] . "','" . $data['tents'] . "','" . $data['dvt'] . "','" . $thoigiansudung . "','" . $sothangconlai . "','" . $gtconlai . "','" . $tongnguyengia . "','" . $tongkhthang . "','" . $data['tkno'] . "','" . $data['tkco'] . "','" . $tongkhthang . "','" . $tuthang . "','" . $data['mabp'] . "','" . $data['bophan'] . "','" . $data['soluong'] . "','" . $data['ngaysd'] . "','" . $data['matk'] . "','" . $sothangdakh . "','" . $gtconlai_trupb . "','" . $data['loaisp'] . "','" . $data['tanggiam'] . "','" . $data['theodoi'] . "'),";
                }
            }
            /////////////
            $trees[] = $data;
        }
        //debug($array_tkno_co);
        $sql_ins = " Insert into bangpbchiphi(mats,tents,dvt,sothangdk,tylekh,gtconlai,nguyengia,sokh,tkno,tkco,tienno,thang,mabp,tenbp,soluong,ngaysudung,matk,sothangpbdkconlai,gtdkconlai,loaisp,trongky,theodoi) VALUE " . substr($value, 0, -1);
        if ($xoakhauhaodatrichtrongky == "false") {
            $this->re_query($sql_ins);
        }

        $dem = 1;
        $value_pskt = "";
        $value_chitiet_pskt = "";
        $tongtien = 0;
        foreach ($array_tkno_co as $key => $value) {
            $tknoco = explode("-", $key);
            $no = $tknoco[0];
            $co = $tknoco[1];
            $cpkhongduoctru= $tknoco[2];
            $tongtien = $value['tien'];

            $value_pskt .= "('" . $sophieu . "','" . $dem . "','" . $ngaycuoithang . "','" . $no . "','71','" . $tongtien . "'),";
            $value_chitiet_pskt .= "('" . $dem . "','" . $ngaycuoithang . "','" . $tongtien . "','" . $value['mabp'] . "','" . $value['bophan'] . "','100091','Phân bổ chi phí trả trước/xây dựng cơ bản tháng $tuthang - $_SESSION[NienDo]','" . $co . "','" . $tongtien . "','4','71','" . $sophieu . "','" . $value['loaisp'] . "','".$cpkhongduoctru."'),";
            $sophieu++;
            $dem++;
        }
        $sql_pskt = "insert into pskt(sophieu,mapskt,ngayghiso,tkco,loaiphieu,tongcong) VALUE " . substr($value_pskt, 0, -1);
        $sql_chitiet_pskt = "insert into chitiet_pskt(mapskt,ngayhoadon,gtvnd1,mabp,bophan,mand1,noidung1,tkno1,tongtien,maloai,loaiphieu,sophieu,loaisp,chiphikhongloaitru) VALUE " . substr($value_chitiet_pskt, 0, -1);

        if ($khongtaobuttoandinhkhoan == "false") {
            $this->re_query($sql_pskt);
            $this->re_query($sql_chitiet_pskt);
        }
        return $trees;
    }

    function loadBangKHTaiSan($thang)
    {
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = " and " . $this->get_orderby();
        $sql = "SELECT * from bangpbchiphi where thang=" . $thang;
        $this->query($sql);
        $i = 0;
        while ($data = $this->fetch()) {
            $i++;
            $trees[$data['mats']] = $data;
        }
        return $trees;
    }

    function loadBangKHTaiSan_Tu_Den($tungay, $thang)
    {
        $trees = array();
        $sothangkh = ($thang - $tungay) + 1;
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = $this->get_orderby()." and " ;
        $sql = "SELECT *,'" . ($sothangkh) . "' as sothangkh,theodoi from bangpbchiphi where {$sql_w} thang>= '" . $tungay . "' and thang<=" . $thang." ";
        $this->query($sql);
        $i = 0;
        while ($data = $this->fetch()) {
            $i++;
            $trees[$data['mats']][$data['thang']] = $data;
        }
        return $trees;
    }

    function loadBangKHTaiSan_CaNam()
    {
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = " and " . $this->get_orderby();
        $sql = "SELECT sott,mats,tents,tylekh,sum(nguyengia) as nguyengia,sum(sokh) as sokh,tkno,sum(tienno) as tienno ,dvt,mabp,tenbp,sum(gtconlai) as gtconlai from bangpbchiphi where thang>=1 and thang<=12 GROUP by mats";
        $this->query($sql);
        $i = 0;
        while ($data = $this->fetch()) {
            $i++;
            $trees[$data['mats']] = $data;
        }
        return $trees;
    }

    function thembangkhauhaotstheonam($tuthang, $denthang, $sophieu)
    {
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = " and " . $this->get_orderby();
        $sql = "
				SELECT mats,tents,dvt,tkno,tylekh FROM psts";
        $this->query($sql);
        $datadaukyTS = $this->daukytaisan();
        $datatangTS = $this->tangtaisan($tuthang, $denthang);
        $datagiamTS = $this->giamtaisan($tuthang, $denthang);

        $this->re_query("delete from bangkhtaisan where thang=13");
        $value = "";
        while ($data = $this->fetch()) {
            $tongnguyengia = 0;
            $mats = $data['mats'];
            $tongnguyengia = $datadaukyTS[$mats]['nguyengia'] + $datatangTS[$mats]['nguyengia'] - $datagiamTS[$mats]['nguyengia'];
            $tongkhthang = $datadaukyTS[$mats]['muckhnam'] + $datatangTS[$mats]['muckhnam'] - $datagiamTS[$mats]['muckhnam'];

            $value .= "('" . $data['mats'] . "','" . $data['tents'] . "','" . $data['dvt'] . "','" . $data['tylekh'] . "','" . $tongnguyengia . "','" . $tongkhthang . "','" . $data['tkno'] . "','" . $tongkhthang . "','13'),";
            $trees[] = $data;
        }
        $sql_ins = " Insert into bangkhtaisan (mats,tents,dvt,tylekh,nguyengia,sokh,tkno,tienno,thang) VALUE " . substr($value, 0, -1);
        $this->re_query($sql_ins);
        return $trees;
    }

    function tangtaisan($tuthang, $denthang, $khauhaotheo)
    {
        $sql_un = "";
        if ($khauhaotheo == 'ngaysd') {
            $sql_un = " UNION ALL SELECT mats,(nguyengia) as nguyengia,sum(muckhthang) as muckhthang,(giatriconlai) as giatriconlai,tylekh FROM pscptt where tanggiam='0' and MONTH({$khauhaotheo})>='" . $tuthang . "' and MONTH({$khauhaotheo})<='" . $denthang . "' AND YEAR({$khauhaotheo})='" . $_SESSION['NienDo'] . "' group by mats";
        }
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = " and " . $this->get_orderby();
        $sql = "SELECT mats,(nguyengia) as nguyengia,sum(muckhthang) as muckhthang,(giatriconlai) as giatriconlai,tylekh FROM pscptt where tanggiam='1' and MONTH({$khauhaotheo})>='" . $tuthang . "' and MONTH({$khauhaotheo})<='" . $denthang . "' group by mats 
                  {$sql_un}
        ";
        $result = $this->re_query($sql);
        while ($data = $this->re_fetch($result)) {
            $trees[$data['mats']] = $data;
        }
        return $trees;
    }

    function giamtaisan($tuthang, $denthang, $khauhaotheo)
    {
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = " and " . $this->get_orderby();
        $sql = "SELECT mats,(nguyengia) as nguyengia,sum(muckhthang) as muckhthang,(giatriconlai) as giatriconlai,tylekh FROM pscptt where tanggiam='2' and MONTH({$khauhaotheo})>='" . $tuthang . "' and MONTH({$khauhaotheo})<='" . $denthang . "' group by mats ";
        $result = $this->re_query($sql);
        while ($data = $this->re_fetch($result)) {
            $trees[$data['mats']] = $data;
        }
        return $trees;
    }

    function daukytaisan($tuthang, $denthang, $khauhaotheo)
    {
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = " and " . $this->get_orderby();
        if ($khauhaotheo == 'ngaysd') {
            $sql = "SELECT mats,sum(nguyengia) as nguyengia,sum(muckhthang) as muckhthang,sum(giatriconlai) as giatriconlai,tylekh,tkno,tkco,sum(giatriconlai) as giatriconlaibp,tylekh as sothangconlaipb FROM pscptt where tanggiam='0' and year(ngaysd)<'" . $_SESSION['NienDo'] . "'group by mats ";
        } else {
            $sql = "SELECT mats,sum(nguyengia) as nguyengia,sum(muckhthang) as muckhthang,sum(giatriconlai) as giatriconlai,tylekh,tkno,tkco,sum(giatriconlai) as giatriconlaibp,tylekh as sothangconlaipb FROM pscptt where tanggiam='0' group by mats ";
        }
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
        $sql = "SELECT mats,(nguyengia) as nguyengia,sum(sokh) as muckhthang,(gtconlai) as giatriconlai,tylekh,sothangpbdkconlai as sothangpbdkconlai,gtdkconlai as gtconlaipb FROM bangpbchiphi WHERE thang = ($tuthang-1) group by mats";
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
        $sql = "SELECT mats from cptratruoc WHERE matscha='" . $makhcha . "'";
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

    function LoadListTaiSanTangTrongKy()
    {
        $sql = "SELECT mats,'1' as trongky,soluong,tkno,tkco,nguyengia,thoigiansd as sothangdk FROM pscptt where tanggiam='1' group by mats";
        $result = $this->re_query($sql);
        while ($data = $this->re_fetch($result)) {
            $trees[$data['mats']] = $data;
        }
        return $trees;
    }

}

?>
