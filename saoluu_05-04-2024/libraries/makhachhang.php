<?php

class makhachhang extends database
{
    public $tringorder;

    public $MaKH;
    public $MaKHOld;
    public $TenKH;
    public $TenKD;
    public $MaKHCha;
    public $MaSoThue;
    public $MaTK;
    public $SiLe;
    public $DiaChi;
    public $DienThoai;
    public $ChuThich;
    public $HanMucNo;
    public $SoTT;
    public $NoTH;
    public $NoQH;
    public $NoNH;
    public $NoDH;
    public $NoXau;
    public $NgayTra;
    public $Limit;
    public $SoCMND;

    /**
     * @return mixed
     */
    public function getSoCMND()
    {
        return $this->SoCMND;
    }

    /**
     * @param mixed $SoCMND
     */
    public function setSoCMND($SoCMND)
    {
        $this->SoCMND = $SoCMND;
    }

    public $sdkno;
    public $sdkco;
    public $LoaiTien;
    public $TyGiaPT;
    public $TyGiaPTr;
    public $ThanhTienNTPT;
    public $ThanhTienNTPTr;
    public $MaNhom;

    /**
     * @return mixed
     */
    public function getMaNhom()
    {
        return $this->MaNhom;
    }

    /**
     * @param mixed $MaNhom
     */
    public function setMaNhom($MaNhom)
    {
        $this->MaNhom = $MaNhom;
    }

    /**
     * @return mixed
     */
    public function getTyGiaPT()
    {
        return $this->TyGiaPT;
    }

    /**
     * @param mixed $TyGiaPT
     */
    public function setTyGiaPT($TyGiaPT)
    {
        $this->TyGiaPT = $TyGiaPT;
    }

    /**
     * @return mixed
     */
    public function getTyGiaPTr()
    {
        return $this->TyGiaPTr;
    }

    /**
     * @param mixed $TyGiaPTr
     */
    public function setTyGiaPTr($TyGiaPTr)
    {
        $this->TyGiaPTr = $TyGiaPTr;
    }

    /**
     * @return mixed
     */
    public function getThanhTienNTPT()
    {
        return $this->ThanhTienNTPT;
    }

    /**
     * @param mixed $ThanhTienNTPT
     */
    public function setThanhTienNTPT($ThanhTienNTPT)
    {
        $this->ThanhTienNTPT = $ThanhTienNTPT;
    }

    /**
     * @return mixed
     */
    public function getThanhTienNTPTr()
    {
        return $this->ThanhTienNTPTr;
    }

    /**
     * @param mixed $ThanhTienNTPTr
     */
    public function setThanhTienNTPTr($ThanhTienNTPTr)
    {
        $this->ThanhTienNTPTr = $ThanhTienNTPTr;
    }

    /**
     * @return mixed
     */
    public function getLoaiTien()
    {
        return $this->LoaiTien;
    }

    /**
     * @param mixed $LoaiTien
     */
    public function setLoaiTien($LoaiTien)
    {
        $this->LoaiTien = $LoaiTien;
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

    public function setLimit($Limit)
    {
        $this->Limit = $Limit;
    }

    public function getLimit()
    {
        return $this->Limit;
    }

    public function setsdkno($sdkno)
    {
        $this->sdkno = $sdkno;
    }

    public function getsdkno()
    {
        return $this->sdkno;
    }

    public function setsdkco($sdkco)
    {
        $this->sdkco = $sdkco;
    }

    public function getsdkco()
    {
        return $this->sdkco;
    }

    public function set_SoTT($SoTT)
    {
        $this->SoTT = $SoTT;
    }

    public function get_SoTT()
    {
        return $this->SoTT;
    }

    public function set_MaKH($MaKH)
    {
        $this->MaKH = $MaKH;
    }

    public function get_MaKH()
    {
        return $this->MaKH;
    }

    public function set_MaKHOld($MaKHOld)
    {
        $this->MaKHOld = $MaKHOld;
    }

    public function get_MaKHOld()
    {
        return $this->MaKHOld;
    }

    public function set_TenKH($TenKH)
    {
        $this->TenKH = $TenKH;
    }

    public function get_TenKH()
    {
        return $this->TenKH;
    }

    public function set_TenKD($TenKD)
    {
        $this->TenKD = $TenKD;
    }

    public function get_TenKD()
    {
        return $this->TenKD;
    }


    public function set_MaKHCha($MaKHCha)
    {
        $this->MaKHCha = $MaKHCha;
    }

    public function get_MaKHCha()
    {
        return $this->MaKHCha;
    }

    public function set_MaSoThue($MaSoThue)
    {
        $this->MaSoThue = $MaSoThue;
    }

    public function get_MaSoThue()
    {
        return $this->MaSoThue;
    }

    public function set_MaTK($MaTK)
    {
        $this->MaTK = $MaTK;
    }

    public function get_MaTK()
    {
        return $this->MaTK;
    }

    public function set_SiLe($SiLe)
    {
        $this->SiLe = $SiLe;
    }

    public function get_SiLe()
    {
        return $this->SiLe;
    }

    public function set_DiaChi($DiaChi)
    {
        $this->DiaChi = $DiaChi;
    }

    public function get_DiaChi()
    {
        return $this->DiaChi;
    }

    public function set_DienThoai($DienThoai)
    {
        $this->DienThoai = $DienThoai;
    }

    public function get_DienThoai()
    {
        return $this->DienThoai;
    }

    public function set_ChuThich($ChuThich)
    {
        $this->ChuThich = $ChuThich;
    }

    public function get_ChuThich()
    {
        return $this->ChuThich;
    }

    public function set_HanMucNo($HanMucNo)
    {
        $this->HanMucNo = $HanMucNo;
    }

    public function get_HanMucNo()
    {
        return $this->HanMucNo;
    }

    public function set_NoTH($NoTH)
    {
        $this->NoTH = $NoTH;
    }

    public function get_NoTH()
    {
        return $this->NoTH;
    }

    public function set_NoQH($NoQH)
    {
        $this->NoQH = $NoQH;
    }

    public function get_NoQH()
    {
        return $this->NoQH;
    }

    public function set_NoNH($NoNH)
    {
        $this->NoNH = $NoNH;
    }

    public function get_NoNH()
    {
        return $this->NoNH;
    }

    public function set_NoDH($NoDH)
    {
        $this->NoDH = $NoDH;
    }

    public function get_NoDH()
    {
        return $this->NoDH;
    }

    public function set_NoXau($NoXau)
    {
        $this->NoXau = $NoXau;
    }

    public function get_NoXau()
    {
        return $this->NoXau;
    }

    public function set_NgayTra($NgayTra)
    {
        $this->NgayTra = $NgayTra;
    }

    public function get_NgayTra()
    {
        return $this->NgayTra;
    }

    public function checkKeyTrung()
    {
        $sql = "select * from makh where makh='" . $this->get_MaKH() . "' and sott!=" . $this->get_SoTT() . "";
        $this->query($sql);
        if ($this->num_rows() >= 1) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function checkKeyChaTrung()
    {
        $sql = "select * from makh where makh='" . $this->get_MaKH() . "'";
        $this->query($sql);
        if ($this->num_rows() >= 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function createSoTT()
    {
        $sql = "select max(stt) as sott from makh";
        $this->query($sql);
        if ($this->num_rows() == 1) {
            $data = $this->fetch();
            return $data['sott'] + 1;
        } else {
            return 1;
        }
    }

    public function createSoTTSDCN()
    {
        $sql = "select max(sott) as sott from sdcn";
        $this->query($sql);
        if ($this->num_rows() == 1) {
            $data = $this->fetch();
            return $data['sott'] + 1;
        } else {
            return 1;
        }
    }

    public function checkXoa()
    {
        $sql = "select * from makh  where makhcha='" . $this->get_MaKH() . "'";
        $this->query($sql);
        if ($this->num_rows() >= 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function checkXoa_khoangoai()
    {
        $sql = "select * from mact  where makh='" . $this->get_MaKH() . "'";
        $this->query($sql);
        if ($this->num_rows() >= 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function loadListMaKH_W()
    {
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = " and " . $this->get_orderby();
        $sql = "SELECT makh.*,tennhom FROM makh INNER JOIN manhomkh on (makh.manhom = manhomkh.manhom) WHERE 0=0 $sql_w  order by manhom,makh ";
        $this->query($sql);
        while ($data = $this->fetch()) {
            $trees[] = $data;
        }
        return $trees;
    }

    function loadListMaKH_Co_Key_La_Ma()
    {
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = " and " . $this->get_orderby();
        $sql = "SELECT * FROM makh WHERE 0=0 $sql_w  order by makh ";
        $this->query($sql);
        $i = 0;
        while ($data = $this->fetch()) {
            $i++;
            $data['STT'] = $i;
            $trees[$data[makh]] = $data;
        }
        return $trees;
    }

    function loadListMaNhomKH_Co_Key_La_Ma()
    {
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = " and " . $this->get_orderby();
        $sql = "SELECT * FROM manhomkh WHERE 0=0 $sql_w  ";
        $this->query($sql);
        $i = 0;
        while ($data = $this->fetch()) {
            $i++;
            $data['STT'] = $i;
            $trees[$data['manhom']] = $data;
        }
        return $trees;
    }


    function loadListMaKHNODK_W($loaitien,$tkcongno)
    {
        $trees = array();
        if($tkcongno=="" || $tkcongno=="0"){
            $tkcongno =131;
        }
        if($loaitien==""){
            $sql_lt=" loaitien='VND' and sdcn.matk='{$tkcongno}' ";
        }else{
            $sql_lt=" loaitien!='VND' and sdcn.matk='{$tkcongno}' ";
        }
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = " and " . $this->get_orderby();
        $sql = "SELECT makh.tenkh,makh.masothue,sdcn.makh,sdcn.matk,sdkno,sdkco,makh.makhcha,makh.diachi,makh.dienthoai,makh.ngaytra,makh.ghichu,sdcn.sott,loaitien,tygiapt,tygiaptr,thanhtienntpt,thanhtienntptr FROM makh inner join sdcn on (makh.makh = sdcn.makh ) WHERE  {$sql_lt} $sql_w  order by sdcn.makh,sdcn.matk";
        $this->query($sql);
        $i = 0;
        while ($data = $this->fetch()) {
            $i++;
            $data['STT'] = $i;
            $trees[] = $data;
        }
        return $trees;
    }

    function loadListMaKHCon($makhcha)
    {
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = " and " . $this->get_orderby();
        $sql = "SELECT makh from makh WHERE makhcha='" . $makhcha . "'";
        $this->query($sql);
        $i = 0;
        $num = $this->num_rows();
        if ($num == 0) {
            return 0;
        } else {
            while ($data = $this->fetch()) {
                $i++;
                $ma = explode("-",$data[makh]);
                $sopt = count($ma)-1;
                $trees[$ma[$sopt]] = $ma;
            }
            return $trees;
        }
    }

    function loadListMaKH($parentid = 0, $printto = 10)
    { // c?p 1 la cha
        $ListAllMaNhomKH = $this->loadListMaNhomKH_Co_Key_La_Ma();
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = $this->get_orderby() . " and ";
        $sql = "SELECT sott,makh,masothue,tenkh,makhcha,diachi,dienthoai,ngaytra,loaitien,manhom,ghichu,socmnd FROM makh WHERE $sql_w makhcha = '$parentid'  order by manhom,makh ";
        $this->query($sql);
        while ($data = $this->fetch()) {
            $data['tennhom'] = $ListAllMaNhomKH[$data['manhom']]['tennhom'];
            $trees[] = $data;
            $sql1 = "SELECT sott,makh,masothue,tenkh,makhcha,diachi,dienthoai,ngaytra,loaitien,manhom,ghichu,socmnd FROM makh WHERE $sql_w makhcha ='" . $data['makh'] . "' order by makh ";
            $query = $this->re_query($sql1);
            while ($data1 = $this->re_fetch($query)) {
                if ($printto == 1) {
                    break;
                }
                $data1['tennhom'] = $ListAllMaNhomKH[$data1['manhom']]['tennhom'];
                $trees[] = $data1;
                $sql2 = "SELECT sott,makh,masothue,tenkh,makhcha,diachi,dienthoai,ngaytra,loaitien,manhom,ghichu,socmnd FROM makh WHERE $sql_w makhcha ='" . $data1['makh'] . "' order by makh ";
                $query1 = $this->re_query($sql2);
                while ($data2 = $this->re_fetch($query1)) {
                    if ($printto == 2) {
                        break;
                    }
                    $data2['tennhom'] = $ListAllMaNhomKH[$data2['manhom']]['tennhom'];
                    $trees[] = $data2;
                }
            }
        }
        return $trees;
    }

    function loadListMaKH_Frm($parentid = 0, $printto = 10)
    { // c?p 1 la cha
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = $this->get_orderby() . " and ";
        $sql = "SELECT SQL_CACHE makh,masothue,tenkh FROM makh WHERE 0=0 $sql_w  ";
        $this->query($sql);
        while ($data = $this->fetch()) {
            $trees[] = $data;
        }
        return $trees;
    }

    public function getTenTheo_Table($ma,$table,$colum)
    {
        $sql = "select * from $table where $colum='" . $ma . "'";
        $this->query($sql);
        if ($this->num_rows() == 0) {
            return 0;
        } else {
            return $this->fetch();
        }
    }

    function loadListMaKH_CB($parentid = 0, $printto = 10)
    { // c?p 1 la cha
        //$cb_loaitk = $this->get_Cb_LoaiTK();
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = $this->get_orderby() . " and ";
        $sql = "SELECT * FROM makh WHERE $sql_w makhcha = '$parentid'  order by makh ";
        $this->query($sql);
        $i = 0;
        while ($data = $this->fetch()) {
            $i++;
            $data['STT'] = $i;
            $trees[] = $data;
            $sql1 = "SELECT * FROM makh WHERE $sql_w makhcha ='" . $data['makh'] . "' order by makh ";
            $query = $this->re_query($sql1);
            while ($data1 = $this->re_fetch($query)) {
                if ($printto == 1) {
                    break;
                }
                $i++;
                $data1['STT'] = $i;
                $trees[] = $data1;
                $sql2 = "SELECT * FROM makh WHERE $sql_w makhcha ='" . $data1['makh'] . "' order by makh ";
                $query1 = $this->re_query($sql2);
                while ($data2 = $this->re_fetch($query1)) {
                    if ($printto == 2) {
                        break;
                    }
                    $i++;
                    $data2['STT'] = $i;
                    $trees[] = $data2;
                    $sql3 = "SELECT * FROM makh WHERE $sql_w makhcha ='" . $data2['makh'] . "' order by makh ";
                    $query3 = $this->re_query($sql3);
                    while ($data3 = $this->re_fetch($query3)) {
                        if ($printto == 3) {
                            break;
                        }
                        $i++;
                        $data3['STT'] = $i;
                        $trees[] = $data3;
                        $sql4 = "SELECT * FROM makh WHERE $sql_w makhcha ='" . $data3['makh'] . "' order by makh ";
                        $query4 = $this->re_query($sql4);
                        while ($data4 = $this->re_fetch($query4)) {
                            $i++;
                            $data4['STT'] = $i;
                            $trees[] = $data4;
                        }
                    }
                }
            }
        }
        return $trees;
    }

    function loadListMaKHNODK($parentid,$loaitien,$tkcongno)
    { // c?p 1 la cha
        //$cb_loaitk = $this->get_Cb_LoaiTK();
        if($loaitien==""){
            $sql_lt=" loaitien='VND' ";
        }else{
            $sql_lt=" loaitien!='VND' ";
        }
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = $this->get_orderby() . " and ";
        $sql = "SELECT makh.tenkh,sdcn.makh,sdcn.matk,sdkno,sdkco,makh.makhcha,makh.diachi,makh.dienthoai,makh.ngaytra,makh.ghichu,sdcn.sott,makh.masothue,loaitien,tygiapt,tygiaptr,thanhtienntpt,thanhtienntptr from makh inner join sdcn on (makh.makh = sdcn.makh ) WHERE $sql_w makh.makhcha = '$parentid' and sdcn.matk='{$tkcongno}' and {$sql_lt}  order by sdcn.matk ASC ";
        $this->query($sql);
        $i = 0;
        while ($data = $this->fetch()) {
            $i++;
            $data['STT'] = $i;
            $trees[$data['makh'].$data['matk']] = $data;
            $sql1 = "SELECT makh.tenkh,sdcn.makh,sdcn.matk,sdkno,sdkco,makh.makhcha,makh.diachi,makh.dienthoai,makh.ngaytra,makh.ghichu,sdcn.sott,makh.masothue,loaitien,tygiapt,tygiaptr,thanhtienntpt,thanhtienntptr FROM makh inner join sdcn on (makh.makh = sdcn.makh ) WHERE $sql_w makh.makhcha ='" . $data['makh'] . "' and sdcn.matk='".$data['matk']."' order by makh.makh ";
            $query = $this->re_query($sql1);
            while ($data1 = $this->re_fetch($query)) {
                if ($printto == 1) {
                    break;
                }
                $i++;
                $data1['STT'] = $i;
                $trees[$data1['makh'].$data1['matk']] = $data1;
                $sql2 = "SELECT makh.tenkh,sdcn.makh,sdcn.matk,sdkno,sdkco,makh.makhcha,makh.diachi,makh.dienthoai,makh.ngaytra,makh.ghichu,sdcn.sott,makh.masothue,loaitien,tygiapt,tygiaptr,thanhtienntpt,thanhtienntptr FROM makh inner join sdcn on (makh.makh = sdcn.makh ) WHERE $sql_w makh.makhcha ='" . $data1['makh'] . "' and sdcn.matk='".$data1['matk']."' order by makh.makh ";
                $query1 = $this->re_query($sql2);
                while ($data2 = $this->re_fetch($query1)) {
                    if ($printto == 2) {
                        break;
                    }
                    $i++;
                    $data2['STT'] = $i;
                    $trees[$data2['makh'].$data2['matk']] = $data2;
                    $sql3 = "SELECT makh.tenkh,sdcn.makh,sdcn.matk,sdkno,sdkco,makh.makhcha,makh.diachi,makh.dienthoai,makh.ngaytra,makh.ghichu,sdcn.sott,makh.masothue,loaitien,tygiapt,tygiaptr,thanhtienntpt,thanhtienntptr FROM makh inner join sdcn on (makh.makh = sdcn.makh )  WHERE $sql_w makh.makhcha ='" . $data2['makh'] . "' and sdcn.matk='".$data2['matk']."' order by makh.makh ";
                    $query3 = $this->re_query($sql3);
                    while ($data3 = $this->re_fetch($query3)) {
                        if ($printto == 3) {
                            break;
                        }
                        $i++;
                        $data3['STT'] = $i;
                        $trees[$data3['makh'].$data3['matk']] = $data3;
                    }

                }

            }
        }
        return $trees;
    }

    public function loadListMaKHCha()
    {
        $sql = "select * from matk ";
        $this->query($sql);
        if ($this->num_rows() == 0) {
            return 0;
        } else {
            while ($data = $this->fetch()) {
                $row[] = $data;
            }
            return $row;
        }
    }

    public function getMaKH()
    {
        $sql = "select * from makh where sott='" . $this->get_SoTT() . "'";
        $this->query($sql);
        if ($this->num_rows() == 0) {
            return 0;
        } else {
            return $this->fetch();
        }
    }

    public function themSoDuDKKH($tkcongno)
    {
        if($tkcongno=="" || $tkcongno=="0"){
            $tkcongno =131;
        }
        $sql = "INSERT INTO sdcn (makh,makhcha,matk) 
				SELECT makh,makhcha,$tkcongno
				FROM makh
				WHERE not exists (select makh from sdcn where makh.makh = sdcn.makh and matk='{$tkcongno}')";
        $this->query($sql);
    }

    public function themMaKH()
    {
        $sql = "INSERT INTO makh (sott,makh,masothue,matk,tenkh,tenkd,makhcha,sile,diachi,dienthoai,hanmucno,noth,noqh,nonh,nodh,noxau,ngaytra,ghichu,loaitien,manhom,socmnd) 
       VALUES ('" . $this->get_SoTT() . "','" . $this->get_MaKH() . "','" . $this->get_MaSoThue() . "','" . $this->get_MaTK() . "','" . $this->get_TenKH() . "','" . $this->get_TenKD() . "', '" . $this->get_MaKHCha() . "','" . $this->get_SiLe() . "','" . $this->get_DiaChi() . "','" . $this->get_DienThoai() . "','" . $this->get_HanMucNo() . "','" . $this->get_NoTH() . "', '" . $this->get_NoQH() . "', '" . $this->get_NoNH() . "', '" . $this->get_NoDH() . "', '" . $this->get_NoXau() . "','" . $this->get_NgayTra() . "','" . $this->get_ChuThich() . "','" . $this->getLoaiTien() . "','" . $this->getMaNhom() . "','" . $this->getSoCMND() . "');";
        $this->query($sql);
    }

    public function checkKeyTrung_SoCMND()
    {
        $sql = "select * from makh where socmnd='" . $this->getSoCMND() . "' and sott!=" . $this->get_SoTT() . "";
        $this->query($sql);
        if ($this->num_rows() >= 1) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    function loadMaKHALL_TraVeChuoiMaKH($makh = 0)
    { // c?p 1 la cha
        //$cb_loaitk = $this->get_Cb_LoaiTK();
        $trees = array();
        $fill = $this->get_orderby();
        $trinhmakh = "";
        if ($fill != "")
            $sql_w = $this->get_orderby() . " and ";
        $sql = "SELECT * FROM makh WHERE $sql_w makh = '$makh'  order by tenkh DESC ";
        $this->query($sql);
        $i = 0;
        while ($data = $this->fetch()) {
            $i++;
            $data['STT'] = $i;
            $trinhmakh.=$data['makh'].",";
            $sql1 = "SELECT * FROM makh WHERE $sql_w makhcha ='" . $data['makh'] . "' order by makh ";
            $query = $this->re_query($sql1);
            while ($data1 = $this->re_fetch($query)) {
                $i++;
                $data1['STT'] = $i;
                $trinhmakh.=$data1['makh'].",";
                $sql2 = "SELECT * FROM makh WHERE $sql_w makhcha ='" . $data1['makh'] . "' order by makh ";
                $query1 = $this->re_query($sql2);
                while ($data2 = $this->re_fetch($query1)) {
                    $i++;
                    $data2['STT'] = $i;
                    $trinhmakh.=$data2['makh'].",";
                }
            }
        }
        return $trinhmakh;
    }

    public function themMaKHSDKY()
    {
        $sql = "INSERT INTO sdcn (makh,sdkno,sdkco,matk,tygiapt,tygiaptr,thanhtienntpt,thanhtienntptr) 
       VALUES ('" . $this->get_MaKH() . "','" . $this->getsdkno() . "','" . $this->getsdkco() . "','" . $this->get_MaTK() . "','" . $this->getTyGiaPT() . "','" . $this->getTyGiaPTr() . "','" . $this->getThanhTienNTPT() . "','" . $this->getThanhTienNTPTr() . "')";
        $this->query($sql);
    }

    public function suaMaKHSDKY()
    {
        $sql = "update sdcn set sdkno='" . $this->getsdkno() . "',sdkco='" . $this->getsdkco() . "',matk='" . $this->get_MaTK() . "',tygiapt='" . $this->getTyGiaPT() . "',tygiaptr='" . $this->getTyGiaPTr() . "',thanhtienntpt='" . $this->getThanhTienNTPT() . "',thanhtienntptr ='" . $this->getThanhTienNTPTr() . "'
                  WHERE sott = '" . $this->get_SoTT() . "'";
        $this->query($sql);
    }

    public function suaMaKH()
    {
        $sql = "update makh set makh='" . $this->get_MaKH() . "',masothue='" . $this->get_MaSoThue() . "',matk='" . $this->get_MaTK() . "',tenkh='" . $this->get_TenKH() . "',tenkd='" . $this->get_TenKD() . "',makhcha='" . $this->get_MaKHCha() . "',diachi='" . $this->get_DiaChi() . "',dienthoai='" . $this->get_DienThoai() . "',ngaytra='" . $this->get_NgayTra() . "',ghichu='" . $this->get_ChuThich() . "',loaitien='" . $this->getLoaiTien() . "',manhom='" . $this->getMaNhom() . "',socmnd='" . $this->getSoCMND() . "'
                  WHERE sott = '" . $this->get_SoTT() . "'";
        $this->query($sql);

        $sql2 = "update psvt set makh='" . $this->get_MaKH() . "'
                      WHERE makh = '" . $this->get_MaKHOld() . "';";

        $sql3 = "update pskt set makh='" . $this->get_MaKH() . "'
                      WHERE makh = '" . $this->get_MaKHOld() . "';";

        $sql4 = "update chitiet_pskt set makhno='" . $this->get_MaKH() . "'
                      WHERE makhno = '" . $this->get_MaKHOld() . "';";

        $sql5 = "update pskt set makh_nh='" . $this->get_MaKH() . "'
                      WHERE makh_nh = '" . $this->get_MaKHOld() . "';";


        $this->query($sql2);
        $this->query($sql3);
        $this->query($sql4);
        $this->query($sql5);
    }

    public function suaMaKHCha()
    {
        $sql = "update makh set makhcha='" . $this->get_MaKH() . "'
                      WHERE makhcha = '" . $this->get_MaKHOld() . "';";

        $this->query($sql);
    }

    public function suaRank()
    {
        $sql = "update makh set rank=rank+1
                      WHERE makh = '" . $this->get_MaKH() . "';";
        $this->query($sql);
    }

    public function xoaMaKH()
    {
        $sql = "delete from makh where makh='" . $this->get_MaKH() . "'";
        $this->query($sql);
    }

    public function xoaNoMaKH()
    {
        $sql = "delete from sdcn where sott='" . $this->get_SoTT() . "'";
        $this->query($sql);
    }
    function loadListMaKH_DuThua($parentid = 0, $printto = 10)
    { // c?p 1 la cha
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = $this->get_orderby() . " and ";
        $sql = "SELECT sott,makh,masothue,tenkh,makhcha,diachi,dienthoai,ngaytra,loaitien,manhom,ghichu,(select count(*) from cnkh WHERE cnkh.makh = makh.makh GROUP BY makh HAVING SUM(nodk)!=0 or SUM(codk)!=0 or SUM(cops)!=0 or SUM(nops)!=0) as choxoa FROM makh WHERE $sql_w makhcha = '$parentid' and niendo='".($_SESSION['NienDo']-1)."'  order by makh ";
        $this->query($sql);
        $i = 0;
        while ($data = $this->fetch()) {
            $i++;
            $data['STT'] = $i;
            $trees[] = $data;
            $sql1 = "SELECT sott,makh,masothue,tenkh,makhcha,diachi,dienthoai,ngaytra,loaitien,manhom,ghichu,(select count(*) from cnkh WHERE cnkh.makh = makh.makh GROUP BY makh HAVING SUM(nodk)!=0 or SUM(codk)!=0 or SUM(cops)!=0 or SUM(nops)!=0) as choxoa FROM makh WHERE $sql_w makhcha ='" . $data['makh'] . "' and niendo='".($_SESSION['NienDo']-1)."' order by makh ";
            $query = $this->re_query($sql1);
            while ($data1 = $this->re_fetch($query)) {
                if ($printto == 1) {
                    break;
                }
                $i++;
                $data1['tenkh'] = "&nbsp;&nbsp;&nbsp;&nbsp;".$data1['tenkh'];
                $trees[] = $data1;
                $sql2 = "SELECT sott,makh,masothue,tenkh,makhcha,diachi,dienthoai,ngaytra,loaitien,manhom,ghichu.(select count(*) from cnkh WHERE cnkh.makh = makh.makh GROUP BY makh HAVING SUM(nodk)!=0 or SUM(codk)!=0 or SUM(cops)!=0 or SUM(nops)!=0) as choxoa FROM makh WHERE $sql_w makhcha ='" . $data1['makh'] . "' and niendo='".($_SESSION['NienDo']-1)."' order by makh ";
                $query1 = $this->re_query($sql2);
                while ($data2 = $this->re_fetch($query1)) {
                    if ($printto == 2) {
                        break;
                    }
                    $i++;
                    $data2['tenkh'] = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$data2['tenkh'];
                    $trees[] = $data2;
                }
            }
        }
        return $trees;
    }

    function LayDanhSachKhongCha()
    {
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = $this->get_orderby() . " and ";
        $sql = "SELECT makh,tenkh,makhcha FROM makh WHERE $sql_w makhcha != '0'  order by makh ";
        $this->query($sql);
        while ($data = $this->fetch()) {
            $str = "";
            $trees[$data['makh']][] = $data['makhcha'];
            $str=$data['makh']."=>".$data['makhcha'];
            $sql1 = "SELECT makh,tenkh,makhcha FROM makh WHERE $sql_w makh ='" . $data['makhcha'] . "' order by makh ";
            $query = $this->re_query($sql1);
            while ($data1 = $this->re_fetch($query)) {
                $str.="=>".$data1['makhcha'];
                //$trees[$data['makh']][$data1['makh']][] = $data1['makhcha'];
                $sql2 = "SELECT makh,tenkh,makhcha FROM makh WHERE $sql_w makh ='" . $data1['makhcha'] . "' order by makh ";
                $query1 = $this->re_query($sql2);
                while ($data2 = $this->re_fetch($query1)) {
                    $str.="=>".$data2['makhcha'];
                    //$trees[$data['makh']][$data1['makh']][$data2['makh']][] = $data2['makhcha'];
                }
            }
            $trees[$data['makh']] = $str;
        }
        return $trees;
    }

    public function xoaMaKH_DuThua($MaKH)
    {
        $sql = "delete from makh where makh in ('" . $MaKH . "')";
        $this->query($sql);
    }
}

?>
