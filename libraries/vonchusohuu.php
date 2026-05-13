<?php

class vonchusohuu extends database
{
    public $tringorder;

    public $MaTaiSan;
    public $MaTaiSanCha;
    public $VonGopUSD;

    /**
     * @return mixed
     */
    public function getVonGopUSD()
    {
        return $this->VonGopUSD;
    }

    /**
     * @param mixed $VonGopUSD
     */
    public function setVonGopUSD($VonGopUSD)
    {
        $this->VonGopUSD = $VonGopUSD;
    }

    /**
     * @return mixed
     */
    public function getVonDieuLeUSD()
    {
        return $this->VonDieuLeUSD;
    }

    /**
     * @param mixed $VonDieuLeUSD
     */
    public function setVonDieuLeUSD($VonDieuLeUSD)
    {
        $this->VonDieuLeUSD = $VonDieuLeUSD;
    }
    public $VonDieuLeUSD;

    public $TangVonDieuLeUSD;

    /**
     * @return mixed
     */
    public function getTangVonDieuLeUSD()
    {
        return $this->TangVonDieuLeUSD;
    }

    /**
     * @param mixed $TangVonDieuLeUSD
     */
    public function setTangVonDieuLeUSD($TangVonDieuLeUSD)
    {
        $this->TangVonDieuLeUSD = $TangVonDieuLeUSD;
    }
    public $TangVonDieuLe;

    /**
     * @return mixed
     */
    public function getTangVonDieuLe()
    {
        return $this->TangVonDieuLe;
    }

    /**
     * @param mixed $TangVonDieuLe
     */
    public function setTangVonDieuLe($TangVonDieuLe)
    {
        $this->TangVonDieuLe = $TangVonDieuLe;
    }

    /**
     * @return mixed
     */
    public function getTangVonGop()
    {
        return $this->TangVonGop;
    }

    /**
     * @param mixed $TangVonGop
     */
    public function setTangVonGop($TangVonGop)
    {
        $this->TangVonGop = $TangVonGop;
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
    public function getVonChuaGop()
    {
        return $this->VonChuaGop;
    }

    /**
     * @param mixed $VonChuaGop
     */
    public function setVonChuaGop($VonChuaGop)
    {
        $this->VonChuaGop = $VonChuaGop;
    }
    public $TangVonGop;
    public $TangVonGopUSD;

    /**
     * @return mixed
     */
    public function getTangVonGopUSD()
    {
        return $this->TangVonGopUSD;
    }

    /**
     * @param mixed $TangVonGopUSD
     */
    public function setTangVonGopUSD($TangVonGopUSD)
    {
        $this->TangVonGopUSD = $TangVonGopUSD;
    }
    public $TyLe;
    public $VonChuaGop;
    public $VonChuaGopUSD;

    /**
     * @return mixed
     */
    public function getVonChuaGopUSD()
    {
        return $this->VonChuaGopUSD;
    }

    /**
     * @param mixed $VonChuaGopUSD
     */
    public function setVonChuaGopUSD($VonChuaGopUSD)
    {
        $this->VonChuaGopUSD = $VonChuaGopUSD;
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
        $sql = "select * from tk  where mavt='" . $this->get_MaVT() . "'";
        $this->query($sql);
        if ($this->num_rows() >= 1) {
            return FALSE;
        } else {
            return TRUE;
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
    function loadListPSMaTaiSan()
    {
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = " and " . $this->get_orderby();
        $sql = "SELECT makh.tenkh,psvoncsh.* FROM psvoncsh INNER JOIN  makh on (psvoncsh.makh = makh.makh) WHERE 0=0 $sql_w  order by mapsvoncsh";
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
        $sql = "INSERT INTO cptratruoc (sott,mats,tents,dvt,matk,ngaysd,nuocsx,ngaysx,congsuat,tylekh,thoigiansd,dongia,nguyengia,chuthich,tenkd,manhomts,matscha) 
			VALUES ('" . $this->get_SoTT() . "','" . $this->get_MaTaiSan() . "', '" . $this->get_TenTaiSan() . "','" . $this->get_DVT() . "','" . $this->get_MaTK() . "','" . $this->getNgaySD() . "','" . $this->get_NuocSX() . "','" . $this->get_NgaySX() . "','" . $this->get_CongSuat() . "','" . $this->get_TyLeKH() . "','" . $this->get_ThoiGianSD() . "','" . $this->get_SoLuong() . "','" . $this->get_NguyenGia() . "','" . $this->get_ChuThich() . "', '" . $this->get_TenKD() . "','" . $this->get_MaNhomTS() . "','" . $this->getMaTaiSanCha() . "');";
        $this->query($sql);
    }

    public function themPSTS()
    {
        $sql = "INSERT INTO psvoncsh (mapsvoncsh,makh,ngayghiso,ngayhoadon,tkco,tkno,mabp,bophan,mand,noidung,vondieule,vongop,tanggiam,ghichu,tenkd,vondieuletrongky,vongoptrongky,tyle,vonchuagop,vondieuleusd,vongopusd,vondieuletrongkyusd,vongoptrongkyusd,vonchuagopusd) 
			VALUES ('" . $this->get_MaPSTS() . "','" . $this->get_MaTaiSan() . "','" . $this->getNgayGhiSo() . "','" . $this->getNgayHoaDon() . "','" . $this->get_TKCo() . "','" . $this->get_TKNo() . "','" . $this->get_MaBoPhan() . "','" . $this->get_BoPhan() . "','" . $this->get_MaNoiDung() . "','" . $this->get_NoiDung() . "','" . $this->get_NguyenGia() . "','" . $this->get_GiaTriConLai() . "','" . $this->get_TangGiam() . "','" . $this->get_ChuThich() . "', '" . $this->get_TenKD() . "','" . $this->getTangVonDieuLe() . "','" . $this->getTangVonGop() . "','" . $this->getTyLe() . "','" . $this->getVonChuaGop() . "','" . $this->getVonDieuLeUSD() . "','" . $this->getVonGopUSD() . "','" . $this->getTangVonDieuLeUSD() . "','" . $this->getTangVonGopUSD() . "','" . $this->getVonChuaGopUSD() . "');";
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
						tenkd='" . $this->get_TenKD() . "'
                  WHERE sott = '" . $this->get_SoTT() . "'";
        $this->query($sql);
    }

    public function suaPSTS()
    {
        $sql = "update psvoncsh set 
                                makh ='" . $this->get_MaTaiSan() . "', 
                                ngayghiso ='" . $this->getNgayGhiSo() . "',
                                ngayhoadon ='" . $this->getNgayHoaDon() . "', 
                                tkco ='" . $this->get_TKCo() . "', 
                                tkno ='" . $this->get_TKNo() . "', 
                                mabp ='" . $this->get_MaBoPhan() . "', 
                                bophan ='" . $this->get_BoPhan() . "', 
                                mand ='" . $this->get_MaNoiDung() . "', 
                                noidung ='" . $this->get_NoiDung() . "', 
                                vondieule ='" . $this->get_NguyenGia() . "', 
                                vongop ='" . $this->get_GiaTriConLai() . "', 
                                ghichu ='" . $this->get_ChuThich() . "', 
                                tenkd ='" . $this->get_TenKD() . "',
                                
                                vondieuletrongky ='" . $this->getTangVonDieuLe() . "',
                                vongoptrongky ='" . $this->getTangVonGop() . "',
                                tyle ='" . $this->getTyLe() . "',
                                vondieuleusd ='" . $this->getVonDieuLeUSD() . "',
                                vongopusd ='" . $this->getVonGopUSD() . "',
                                vondieuletrongkyusd ='" . $this->getTangVonDieuLeUSD() . "',
                                vongoptrongkyusd ='" . $this->getTangVonGopUSD() . "',
                                vonchuagopusd ='" . $this->getVonChuaGopUSD() . "'
                  WHERE mapsvoncsh='" . $this->get_MaPSTS() . "' and tanggiam = '" . $this->get_TangGiam() . "'";
        $this->query($sql);
    }

    public function xoaTS()
    {
        $sql = "delete from ts where sott='" . $this->get_SoTT() . "'";
        $this->query($sql);
    }

    public function xoaPhieu()
    {
        $sql = "delete from psvoncsh where mapsvoncsh='" . $this->get_SoTT() . "' and tanggiam='".$this->get_TangGiam()."'";
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
        $sql = "select * from psvoncsh where mapsvoncsh='" . $this->get_MaPSTS() . "' and tanggiam='" . $this->get_TangGiam() . "'";
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

        $sql = "select max(mapsvoncsh) as mapsts from psvoncsh where 0=0 $sql_w ";
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
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = " and " . $this->get_orderby();
        $sql = "SELECT * from bangkhtaisan where thang=" . $thang;
        $this->query($sql);
        $i = 0;
        while ($data = $this->fetch()) {
            $i++;
            $trees[] = $data;
        }
        return $trees;
    }


    function thembangkhauhaotstheothang($tuthang, $denthang, $sophieu)
    {// Thêm bang kê vào

        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = " and " . $this->get_orderby();
        $sql = " SELECT makh,tenkh FROM psvoncsh group by makh ";
        $this->query($sql);
        $datadaukyTS = $this->daukytaisan();// Lấy thông tin vốn chủ sở huux đầu kỳ

        $datatangTS = $this->tangtaisan($tuthang, $denthang);// Lấy thông tin vốn chủ sở huux tăng
        $datagiamTS = $this->giamtaisan($tuthang, $denthang); // Lấy thông tin vốn chủ sở huux giảm

        $this->re_query("delete from bangchitiet_chusohu");

        //$sql_emp_pskt = "delete from pskt where month(ngayghiso)='" . $tuthang . "' and loaiphieu=69 ";
        //$this->re_query($sql_emp_pskt);

        //$sql_emp_chitiet_pskt = "delete from chitiet_pskt where month(ngayhoadon)='" . $tuthang . "' and loaiphieu=69 ";
        //$this->re_query($sql_emp_chitiet_pskt);
        $i = $sophieu;
        while ($data = $this->fetch()) {
            $i++;
            $sophieu++;
            $tongnguyengia = 0;
            $makh = $data['makh'];
            $tongvondieuletrongky = $datatangTS[$makh]['vondieule'] - $datagiamTS[$makh]['vondieule'];
            $tongvongoptrongky = $datatangTS[$makh]['vongop'] - $datagiamTS[$makh]['vongop'];
            $vonchuagop = ($datadaukyTS[$makh]['vondieule']+$tongvondieuletrongky) - ($datadaukyTS[$makh]['vongop']+$tongvongoptrongky);
            $value .= "('" . $data['makh'] . "','" . $data['tenkh'] . "','" . $datadaukyTS[$makh]['vondieule'] . "','" . $tongvondieuletrongky . "','" . 0 . "','" . $datadaukyTS[$makh]['vongop'] . "','" . $tongvongoptrongky . "','" . $vonchuagop . "'),";

            //////////Thêm vào ps khác
           // $value_pskt .= "('" . $sophieu . "','" . $i . "','" . $_SESSION['NienDo'] . "-" . $tuthang . "-28','" . $data['tkno'] . "','69','" . abs($tongkhthang) . "'),";
            //$value_chitiet_pskt .= "('" . $i . "','" . $_SESSION['NienDo'] . "-" . $tuthang . "-28','" . abs($tongkhthang) . "','0001','Toàn bộ','000002','Khấu hao tài sản','" . $data['tkco'] . "','" . abs($tongkhthang) . "','4','69','" . $sophieu . "'),";

            /////////////
            $trees[] = $data;
        }
        $sql_ins = " insert into bangchitiet_chusohu (makh,tenkh,vondieule,vondieuletrongky,tyle,vongop,vongoptrongky,vonchuagop) VALUE " . substr($value, 0, -1);
        $this->re_query($sql_ins);

        //$sql_pskt = "insert into pskt(sophieu,mapskt,ngayghiso,tkco,loaiphieu,tongcong) VALUE " . substr($value_pskt, 0, -1);
       // $sql_chitiet_pskt = "insert into chitiet_pskt(mapskt,ngayhoadon,gtvnd1,mabp,bophan,mand1,noidung1,tkno1,tongtien,maloai,loaiphieu,sophieu) VALUE " . substr($value_chitiet_pskt, 0, -1);

        //$this->re_query($sql_pskt);
        //$this->re_query($sql_chitiet_pskt);
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

    function tangtaisan($tuthang, $denthang)
    {
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = " and " . $this->get_orderby();
        $sql = "SELECT makh,sum(vondieule) as vondieule,sum(vongop) as vongop FROM psvoncsh where tanggiam=1 group by makh";
        $result = $this->re_query($sql);
        while ($data = $this->re_fetch($result)) {
            $trees[$data['makh']] = $data;
        }
        return $trees;
    }

    function giamtaisan($tuthang, $denthang)
    {
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = " and " . $this->get_orderby();
        $sql = "SELECT makh,sum(vondieule) as vondieule,sum(vongop) as vongop FROM psvoncsh where tanggiam=2 group by makh";
        $result = $this->re_query($sql);
        while ($data = $this->re_fetch($result)) {
            $trees[$data['makh']] = $data;
        }
        return $trees;
    }

    function daukytaisan()
    {
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = " and " . $this->get_orderby();
        $sql = "SELECT makh,sum(vondieule) as vondieule,sum(vongop) as vongop FROM psvoncsh where tanggiam=0 group by makh ";
        $result = $this->re_query($sql);
        while ($data = $this->re_fetch($result)) {
            $trees[$data['makh']] = $data;
        }
        return $trees;
    }

    function thangtruoctaisan($tuthang, $denthang)
    {
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = " and " . $this->get_orderby();
        $sql = "SELECT mats,sum(nguyengia) as nguyengia,sum(sokh) as muckhthang FROM bangkhtaisan WHERE thang = ($tuthang-1) group by mats";
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

}

?>
