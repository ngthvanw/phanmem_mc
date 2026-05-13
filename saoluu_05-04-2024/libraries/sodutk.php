<?php

class sodutk extends database
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
    public $TyGia;

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
    public function getNguyenTe()
    {
        return $this->NguyenTe;
    }

    /**
     * @param mixed $NguyenTe
     */
    public function setNguyenTe($NguyenTe)
    {
        $this->NguyenTe = $NguyenTe;
    }// Thu? su?t
    public $NguyenTe;// Thu? su?t

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

    public $SLCK;

    /**
     * @return mixed
     */
    public function getSLCK()
    {
        return $this->SLCK;
    }

    /**
     * @param mixed $SLCK
     */
    public function setSLCK($SLCK)
    {
        $this->SLCK = $SLCK;
    }

    public $dgxvnd;

    /**
     * @return mixed
     */
    public function getDgxvnd()
    {
        return $this->dgxvnd;
    }

    /**
     * @param mixed $dgxvnd
     */
    public function setDgxvnd($dgxvnd)
    {
        $this->dgxvnd = $dgxvnd;
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

    public $SoDuCo;

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

    public $SoDuNo;

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

    public $cttheobophan;
    public $chitiettheond;

    /**
     * @return mixed
     */
    public function getCttheobophan()
    {
        return $this->cttheobophan;
    }

    /**
     * @param mixed $cttheobophan
     */
    public function setCttheobophan($cttheobophan)
    {
        $this->cttheobophan = $cttheobophan;
    }

    /**
     * @return mixed
     */
    public function getChitiettheond()
    {
        return $this->chitiettheond;
    }

    /**
     * @param mixed $chitiettheond
     */
    public function setChitiettheond($chitiettheond)
    {
        $this->chitiettheond = $chitiettheond;
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

    public function checkMaVT()
    {
        $sql = "select * from tk where mavt='" . $this->get_MaVT() . "'";
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

    function loadListMaVT_W()
    {
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = " and " . $this->get_orderby();
        $sql = "SELECT * FROM mavt WHERE 0=0 $sql_w and (matk like '1%' or  matk like '2%' or matk like '3%' or  matk like '4%')  order by mavt";
        $this->query($sql);
        $i = 0;
        while ($data = $this->fetch()) {
            $i++;
            $data['STT'] = $i;
            $trees[] = $data;
        }
        return $trees;
    }

    function loadListDuNoDK($parentid = 0, $printto)
    {
        //$cb_loaitk1 = $this->get_Cb_LoaiTK();
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = $this->get_orderby() . " and ";
        $sql = "SELECT * FROM sdtkdk WHERE $sql_w matkcha = $parentid and (matk like '1%' or  matk like '2%' or matk like '3%' or  matk like '4%')  order by matk";
        $result = $this->re_query($sql);
        $i = 0;
        while ($data = $this->re_fetch($result)) {// Lấy thông tin tài khoản cấp 1
            $i++;
            $data['STT'] = $i;
            $data['tentk'] = $data['tentk'];
            $data['ctsoduno'] = 0;
            $data['ctsoduco'] = 0;
            if ($data['cttheobophan'] == 1) {
                if (substr($data['matk'], 0, 2) == 15) {
                    $sqltk = "SELECT sum(dgxvnd) as soduno,0 as soduco FROM tk WHERE matk='" . $data['matk'] . "' group by matk order by matk ";
                    $resulttk = $this->re_query($sqltk);
                    $datatk = $this->re_fetch($resulttk);
                    $data['soduno'] = $datatk['soduno'];
                    $data['soduco'] = $datatk['soduco'];

                    $data['ctsoduno'] = $datatk['soduno'];
                    $data['ctsoduco'] = $datatk['soduco'];

                    if ($datatk['soduno'] == "") {
                        $data['soduno'] = 0;
                        $data['ctsoduno'] = 0;
                    }
                    if ($datatk['soduco'] == "") {
                        $data['soduco'] = 0;
                        $data['ctsoduco'] = 0;
                    }
                    $sql_up="";
                    $sql_up="update sdtkdk set soduno='".$datatk['soduno']."',soduco='".$datatk['soduco']."' where matk='". $data['matk']."'";
                    $this->re_query($sql_up);
                }
                if ((substr($data['matk'], 0, 3) == 211)|| (substr($data['matk'], 0, 3) == 212) || (substr($data['matk'], 0, 3) == 213)) {
                    $sqltk = "SELECT sum(nguyengia) as soduno,0 as soduco FROM psts WHERE matk='" . $data['matk'] . "' and tanggiam=0 group by matk order by matk ";
                    $resulttk = $this->re_query($sqltk);
                    $datatk = $this->re_fetch($resulttk);
                    $data['soduno'] = $datatk['soduno'];
                    $data['soduco'] = $datatk['soduco'];

                    $data['ctsoduno'] = $datatk['soduno'];
                    $data['ctsoduco'] = $datatk['soduco'];
                    if ($datatk['soduno'] == "") {
                        $data['soduno'] = 0;
                        $data['ctsoduno'] = 0;
                    }
                    if ($datatk['soduco'] == "") {
                        $data['soduco'] = 0;
                        $data['ctsoduco'] = 0;
                    }
                    $sql_up="";
                    $sql_up="update sdtkdk set soduno='".$datatk['soduno']."',soduco='".$datatk['soduco']."' where matk='". $data['matk']."'";
                    $this->re_query($sql_up);
                }
                if ($data['matk'] == 2141) {
                    if($_SESSION['theothongtu']=="tt200"){
                        $sqltk = "SELECT 0 as soduno,(sum(nguyengia)-sum(giatriconlai)) as soduco FROM psts WHERE tanggiam=0 and giatriconlai>=0 and SUBSTRING(matk, 1, 3) ='211' group by matk order by matk ";
                    }else{
                        $sqltk = "SELECT 0 as soduno,(sum(nguyengia)-sum(giatriconlai)) as soduco FROM psts WHERE tanggiam=0 and giatriconlai>=0 and matk='2111' group by matk order by matk ";
                    }
                    $resulttk = $this->re_query($sqltk);
                    $datatk = $this->re_fetch($resulttk);
                    $data['soduno'] = $datatk['soduno'];
                    $data['soduco'] = $datatk['soduco'];

                    $data['ctsoduno'] = $datatk['soduno'];
                    $data['ctsoduco'] = $datatk['soduco'];
                    if ($datatk['soduno'] == "") {
                        $data['soduno'] = 0;
                        $data['ctsoduno'] = 0;
                    }
                    if ($datatk['soduco'] == "") {
                        $data['soduco'] = 0;
                        $data['ctsoduco'] = 0;
                    }
                    $sql_up="";
                    $sql_up="update sdtkdk set soduno='".$datatk['soduno']."',soduco='".$datatk['soduco']."' where matk='". $data['matk']."'";
                    $this->re_query($sql_up);
                }
                if ($data['matk'] == 2143) {
                    if($_SESSION['theothongtu']=="tt200"){
                        $sqltk = "SELECT 0 as soduno,(sum(nguyengia)-sum(giatriconlai)) as soduco FROM psts WHERE tanggiam=0 and giatriconlai>=0 and SUBSTRING(matk, 1, 3) ='212' group by matk order by matk ";
                    }else{
                        $sqltk = "SELECT 0 as soduno,(sum(nguyengia)-sum(giatriconlai)) as soduco FROM psts WHERE tanggiam=0 and giatriconlai>=0 and matk='2112' group by matk order by matk ";
                    }
                    $resulttk = $this->re_query($sqltk);
                    $datatk = $this->re_fetch($resulttk);
                    $data['soduno'] = $datatk['soduno'];
                    $data['soduco'] = $datatk['soduco'];

                    $data['ctsoduno'] = $datatk['soduno'];
                    $data['ctsoduco'] = $datatk['soduco'];
                    if ($datatk['soduno'] == "") {
                        $data['soduno'] = 0;
                        $data['ctsoduno'] = 0;
                    }
                    if ($datatk['soduco'] == "") {
                        $data['soduco'] = 0;
                        $data['ctsoduco'] = 0;
                    }
                    $sql_up="";
                    $sql_up="update sdtkdk set soduno='".$datatk['soduno']."',soduco='".$datatk['soduco']."' where matk='". $data['matk']."'";
                    $this->re_query($sql_up);
                }
                if ($data['matk'] == 2143) {
                    if($_SESSION['theothongtu']=="tt200"){
                        $sqltk = "SELECT 0 as soduno,(sum(nguyengia)-sum(giatriconlai)) as soduco FROM psts WHERE tanggiam=0 and giatriconlai>=0 and SUBSTRING(matk, 1, 3) ='213' group by matk order by matk ";
                    }else{
                        $sqltk = "SELECT 0 as soduno,(sum(nguyengia)-sum(giatriconlai)) as soduco FROM psts WHERE tanggiam=0 and giatriconlai>=0 and matk='2113' group by matk order by matk ";
                    }
                    $resulttk = $this->re_query($sqltk);
                    $datatk = $this->re_fetch($resulttk);
                    $data['soduno'] = $datatk['soduno'];
                    $data['soduco'] = $datatk['soduco'];

                    $data['ctsoduno'] = $datatk['soduno'];
                    $data['ctsoduco'] = $datatk['soduco'];
                    if ($datatk['soduno'] == "") {
                        $data['soduno'] = 0;
                        $data['ctsoduno'] = 0;
                    }
                    if ($datatk['soduco'] == "") {
                        $data['soduco'] = 0;
                        $data['ctsoduco'] = 0;
                    }
                    $sql_up="";
                    $sql_up="update sdtkdk set soduno='".$datatk['soduno']."',soduco='".$datatk['soduco']."' where matk='". $data['matk']."'";
                    $this->re_query($sql_up);
                }
                if (substr($data['matk'], 0, 3) == 242 || substr($data['matk'], 0, 3) == 241) {
                    $sqltk = "SELECT sum(giatriconlai) as soduno,0 as soduco FROM pscptt WHERE matk='" . $data['matk'] . "' and tanggiam=0 group by matk order by matk ";
                    $resulttk = $this->re_query($sqltk);
                    $datatk = $this->re_fetch($resulttk);
                    $data['soduno'] = $datatk['soduno'];
                    $data['soduco'] = $datatk['soduco'];

                    $data['ctsoduno'] = $datatk['soduno'];
                    $data['ctsoduco'] = $datatk['soduco'];

                    if ($datatk['soduno'] == "") {
                        $data['soduno'] = 0;
                        $data['ctsoduno'] = 0;
                    }
                    if ($datatk['soduco'] == "") {
                        $data['soduco'] = 0;
                        $data['ctsoduco'] = 0;
                    }
                    $sql_up="";
                    $sql_up="update sdtkdk set soduno='".$datatk['soduno']."',soduco='".$datatk['soduco']."' where matk='". $data['matk']."'";
                    $this->re_query($sql_up);
                }
                if ((substr($data['matk'], 0, 3) == 131) || (substr($data['matk'], 0, 3) == 331)) {
                    $sqltk = "SELECT sum(sdkno) as soduno,sum(sdkco) as soduco FROM sdcn WHERE matk='" . $data['matk'] . "' group by matk order by matk ";
                    $resulttk = $this->re_query($sqltk);
                    $datatk = $this->re_fetch($resulttk);
                    $data['soduno'] = $datatk['soduno'];
                    $data['soduco'] = $datatk['soduco'];
                    $data['ctsoduno'] = $datatk['soduno'];
                    $data['ctsoduco'] = $datatk['soduco'];

                    if ($datatk['soduno'] == "") {
                        $data['soduno'] = 0;
                        $data['ctsoduno'] = 0;
                    }
                    if ($datatk['soduco'] == "") {
                        $data['soduco'] = 0;
                        $data['ctsoduco'] = 0;
                    }
                    $sql_up="";
                    $sql_up="update sdtkdk set soduno='".$datatk['soduno']."',soduco='".$datatk['soduco']."' where matk='". $data['matk']."'";
                    $this->re_query($sql_up);
                }

                if ((($data['matk']) == 1386) || (($data['matk']) == 1388) || (($data['matk']) == 3388) || (($data['matk']) == 3387) || (substr($data['matk'], 0, 3) == 335) || (substr($data['matk'], 0, 3) == 341) || (substr($data['matk'], 0, 3) == 136)|| (substr($data['matk'], 0, 3) == 244)|| (substr($data['matk'], 0, 3) == 344)|| (substr($data['matk'], 0, 3) == 141)) {
                    $sqltk = "SELECT sum(sdkno) as soduno,sum(sdkco) as soduco FROM sdcn WHERE matk='" . $data['matk'] . "' group by matk order by matk ";
                    $resulttk = $this->re_query($sqltk);
                    $datatk = $this->re_fetch($resulttk);

                    $tmp = $datatk['soduno'] - $datatk['soduco'];
                    if ($tmp >= 0) {
                        $data['soduno'] = abs($tmp);
                        $data['soduco'] = 0;
                        $data['ctsoduno'] = abs($tmp);
                        $data['ctsoduco'] = 0;
                        $sql_up = "";
                        $sql_up = "update sdtkdk set soduno='" . abs($tmp) . "',soduco='0' where matk='" . $data['matk'] . "'";
                        $this->re_query($sql_up);
                    } else {
                        $data['soduno'] = 0;
                        $data['soduco'] = abs($tmp);
                        $data['ctsoduno'] = 0;
                        $data['ctsoduco'] = abs($tmp);

                        $sql_up = "";
                        $sql_up = "update sdtkdk set soduno='0',soduco='" . abs($tmp) . "' where matk='" . $data['matk'] . "'";
                        $this->re_query($sql_up);
                    }
                }

                if ($data['matk'] == 4111) {
                    $sqltk = "SELECT 0 as soduno,sum(vongop) as soduco FROM psvoncsh WHERE tanggiam=0 ";
                    $resulttk = $this->re_query($sqltk);
                    $datatk = $this->re_fetch($resulttk);
                    $data['soduno'] = $datatk['soduno'];
                    $data['soduco'] = $datatk['soduco'];

                    $data['ctsoduno'] = $datatk['soduno'];
                    $data['ctsoduco'] = $datatk['soduco'];

                    if ($datatk['soduno'] == "") {
                        $data['soduno'] = 0;
                        $data['ctsoduno'] = 0;
                    }
                    if ($datatk['soduco'] == "") {
                        $data['soduco'] = 0;
                        $data['ctsoduco'] = 0;
                    }
                    $sql_up="";
                    $sql_up="update sdtkdk set soduno='".$datatk['soduno']."',soduco='".$datatk['soduco']."' where matk='". $data['matk']."'";
                    $this->re_query($sql_up);
                }
            }
            $trees[] = $data;
            $sql1 = "SELECT * FROM sdtkdk WHERE $sql_w matkcha =" . $data['matk'] . " order by matk ";
            $query = $this->re_query($sql1);
            while ($data1 = $this->re_fetch($query)) {// Lấy thông tin tài khoản cấp 2
                if ($printto == 1) {
                    break;
                }
                $i++;
                $data1['STT'] = $i;
                $data1['tentk'] = "&nbsp;&nbsp;&nbsp;" . $data1['tentk'];
                $data1['ctsoduno'] = 0;
                $data1['ctsoduco'] = 0;
                if ($data1['cttheobophan'] == 1) {
                    if (substr($data1['matk'], 0, 2) == 15) {
                        $sqltk = "SELECT sum(dgxvnd) as soduno,0 as soduco FROM tk WHERE matk='" . $data1['matk'] . "' group by matk order by matk ";
                        $resulttk = $this->re_query($sqltk);
                        $datatk = $this->re_fetch($resulttk);
                        $data1['soduno'] = $datatk['soduno'];
                        $data1['soduco'] = $datatk['soduco'];
                        if ($datatk['soduno'] == "") {
                            $data1['soduno'] = 0;
                            $data1['ctsoduno'] = 0;
                        }
                        if ($datatk['soduco'] == "") {
                            $data1['soduco'] = 0;
                            $data1['ctsoduco'] = 0;
                        }
                        $sql_up="";
                        $sql_up="update sdtkdk set soduno='".$datatk['soduno']."',soduco='".$datatk['soduco']."' where matk='". $data1['matk']."'";
                        $this->re_query($sql_up);

                    }
                    if ((substr($data['matk'], 0, 3) == 211)|| (substr($data['matk'], 0, 3) == 212) || (substr($data['matk'], 0, 3) == 213)) {
                        $sqltk = "SELECT sum(nguyengia) as soduno,0 as soduco FROM psts WHERE matk='" . $data1['matk'] . "' and tanggiam=0 group by matk order by matk ";
                        $resulttk = $this->re_query($sqltk);
                        $datatk = $this->re_fetch($resulttk);
                        $data1['soduno'] = $datatk['soduno'];
                        $data1['soduco'] = $datatk['soduco'];

                        $data1['ctsoduno'] = $datatk['soduno'];
                        $data1['ctsoduco'] = $datatk['soduco'];

                        if ($datatk['soduno'] == "") {
                            $data1['soduno'] = 0;
                            $data1['ctsoduno'] = 0;
                        }
                        if ($datatk['soduco'] == "") {
                            $data1['soduco'] = 0;
                            $data1['ctsoduco'] = 0;
                        }
                        $sql_up="";
                        $sql_up="update sdtkdk set soduno='".$datatk['soduno']."',soduco='".$datatk['soduco']."' where matk='". $data1['matk']."'";
                        $this->re_query($sql_up);
                    }
                    if ($data1['matk'] == 2141) {
                        if($_SESSION['theothongtu']=="tt200"){
                            $sqltk = "SELECT 0 as soduno,(sum(nguyengia)-sum(giatriconlai)) as soduco FROM psts WHERE tanggiam=0 and giatriconlai>=0 and SUBSTRING(matk, 1, 3) ='211' group by matk order by matk ";
                        }else{
                            $sqltk = "SELECT 0 as soduno,(sum(nguyengia)-sum(giatriconlai)) as soduco FROM psts WHERE tanggiam=0 and giatriconlai>=0 and matk='2111' group by matk order by matk ";
                        }
                        $resulttk = $this->re_query($sqltk);
                        $datatk = $this->re_fetch($resulttk);
                        $data1['soduno'] = $datatk['soduno'];
                        $data1['soduco'] = $datatk['soduco'];

                        $data1['ctsoduno'] = $datatk['soduno'];
                        $data1['ctsoduco'] = $datatk['soduco'];
                        if ($datatk['soduno'] == "") {
                            $data1['soduno'] = 0;
                            $data1['ctsoduno'] = 0;
                        }
                        if ($datatk['soduco'] == "") {
                            $data1['soduco'] = 0;
                            $data1['ctsoduco'] = 0;
                        }
                        $sql_up="";
                        $sql_up="update sdtkdk set soduno='".$datatk['soduno']."',soduco='".$datatk['soduco']."' where matk='". $data1['matk']."'";
                        $this->re_query($sql_up);
                    }
                    if ($data1['matk'] == 2142) {
                        if($_SESSION['theothongtu']=="tt200"){
                            $sqltk = "SELECT 0 as soduno,(sum(nguyengia)-sum(giatriconlai)) as soduco FROM psts WHERE tanggiam=0 and giatriconlai>=0 and SUBSTRING(matk, 1, 3) ='212' group by matk order by matk ";
                        }else{
                            $sqltk = "SELECT 0 as soduno,(sum(nguyengia)-sum(giatriconlai)) as soduco FROM psts WHERE tanggiam=0 and giatriconlai>=0 and matk='2112' group by matk order by matk ";
                        }
                        $resulttk = $this->re_query($sqltk);
                        $datatk = $this->re_fetch($resulttk);
                        $data1['soduno'] = $datatk['soduno'];
                        $data1['soduco'] = $datatk['soduco'];

                        $data1['ctsoduno'] = $datatk['soduno'];
                        $data1['ctsoduco'] = $datatk['soduco'];
                        if ($datatk['soduno'] == "") {
                            $data1['soduno'] = 0;
                            $data1['ctsoduno'] = 0;
                        }
                        if ($datatk['soduco'] == "") {
                            $data1['soduco'] = 0;
                            $data1['ctsoduco'] = 0;
                        }
                        $sql_up="";
                        $sql_up="update sdtkdk set soduno='".$datatk['soduno']."',soduco='".$datatk['soduco']."' where matk='". $data1['matk']."'";
                        $this->re_query($sql_up);
                    }
                    if ($data1['matk'] == 2143) {
                        if($_SESSION['theothongtu']=="tt200"){
                            $sqltk = "SELECT 0 as soduno,(sum(nguyengia)-sum(giatriconlai)) as soduco FROM psts WHERE tanggiam=0 and giatriconlai>=0 and SUBSTRING(matk, 1, 3) ='213' group by matk order by matk ";
                        }else{
                            $sqltk = "SELECT 0 as soduno,(sum(nguyengia)-sum(giatriconlai)) as soduco FROM psts WHERE tanggiam=0 and giatriconlai>=0 and matk='2113' group by matk order by matk ";
                        }                        $resulttk = $this->re_query($sqltk);
                        $datatk = $this->re_fetch($resulttk);
                        $data1['soduno'] = $datatk['soduno'];
                        $data1['soduco'] = $datatk['soduco'];

                        $data1['ctsoduno'] = $datatk['soduno'];
                        $data1['ctsoduco'] = $datatk['soduco'];
                        if ($datatk['soduno'] == "") {
                            $data1['soduno'] = 0;
                            $data1['ctsoduno'] = 0;
                        }
                        if ($datatk['soduco'] == "") {
                            $data1['soduco'] = 0;
                            $data1['ctsoduco'] = 0;
                        }
                        $sql_up="";
                        $sql_up="update sdtkdk set soduno='".$datatk['soduno']."',soduco='".$datatk['soduco']."' where matk='". $data1['matk']."'";
                        $this->re_query($sql_up);
                    }
                    if (substr($data1['matk'], 0, 3) == 242 || substr($data1['matk'], 0, 3) == 241) {
                        $sqltk = "SELECT sum(giatriconlai) as soduno,0 as soduco FROM pscptt WHERE matk='" . $data1['matk'] . "' and tanggiam=0 group by matk order by matk ";
                        $resulttk = $this->re_query($sqltk);
                        $datatk = $this->re_fetch($resulttk);
                        $data1['soduno'] = $datatk['soduno'];
                        $data1['soduco'] = $datatk['soduco'];

                        $data1['ctsoduno'] = $datatk['soduno'];
                        $data1['ctsoduco'] = $datatk['soduco'];

                        if ($datatk['soduno'] == "") {
                            $data1['soduno'] = 0;
                            $data1['ctsoduno'] = 0;
                        }
                        if ($datatk['soduco'] == "") {
                            $data1['soduco'] = 0;
                            $data1['ctsoduco'] = 0;
                        }
                        $sql_up="";
                        $sql_up="update sdtkdk set soduno='".$datatk['soduno']."',soduco='".$datatk['soduco']."' where matk='". $data1['matk']."'";
                        $this->re_query($sql_up);
                    }
                    if ((substr($data1['matk'], 0, 3) == 131) || (substr($data1['matk'], 0, 3) == 331)) {
                        $sqltk = "SELECT sum(sdkno) as soduno,sum(sdkco) as soduco FROM sdcn WHERE matk='" . $data1['matk'] . "' group by matk order by matk ";
                        $resulttk = $this->re_query($sqltk);
                        $datatk = $this->re_fetch($resulttk);
                        $data1['soduno'] = $datatk['soduno'];
                        $data1['soduco'] = $datatk['soduco'];
                        $data1['ctsoduno'] = $datatk['soduno'];
                        $data1['ctsoduco'] = $datatk['soduco'];

                        if ($datatk['soduno'] == "") {
                            $data1['soduno'] = 0;
                            $data1['ctsoduno'] = 0;
                        }
                        if ($datatk['soduco'] == "") {
                            $data1['soduco'] = 0;
                            $data1['ctsoduco'] = 0;
                        }
                        $sql_up="";
                        $sql_up="update sdtkdk set soduno='".$datatk['soduno']."',soduco='".$datatk['soduco']."' where matk='". $data1['matk']."'";
                        $this->re_query($sql_up);
                    }

                    if ( (($data1['matk']) == 1386) || (($data1['matk']) == 1388) || (($data1['matk']) == 3388) || (($data1['matk']) == 3387) || (substr($data1['matk'], 0, 3) == 335) || (substr($data1['matk'], 0, 3) == 341) || (substr($data1['matk'], 0, 3) == 136)|| (substr($data1['matk'], 0, 3) == 244)|| (substr($data1['matk'], 0, 3) == 344)|| (substr($data1['matk'], 0, 3) == 141) ) {
                        $sqltk = "SELECT sum(sdkno) as soduno,sum(sdkco) as soduco FROM sdcn WHERE matk='" . $data1['matk'] . "' group by matk order by matk ";
                        $resulttk = $this->re_query($sqltk);
                        $datatk = $this->re_fetch($resulttk);

                        $tmp = $datatk['soduno']-$datatk['soduco'];
                        if($tmp>=0){
                            $data1['soduno'] = abs($tmp);
                            $data1['soduco'] = 0;
                            $data1['ctsoduno'] = abs($tmp);
                            $data1['ctsoduco'] = 0;
                            $sql_up="";
                            $sql_up="update sdtkdk set soduno='".abs($tmp)."',soduco='0' where matk='". $data1['matk']."'";
                            $this->re_query($sql_up);
                        }else{
                            $data1['soduno'] = 0;
                            $data1['soduco'] = abs($tmp);
                            $data1['ctsoduno'] = 0;
                            $data1['ctsoduco'] = abs($tmp);

                            $sql_up="";
                            $sql_up="update sdtkdk set soduno='0',soduco='".abs($tmp)."' where matk='". $data1['matk']."'";
                            $this->re_query($sql_up);
                        }

                    }

                    if ($data1['matk'] == 4111) {
                        $sqltk = "SELECT 0 as soduno,sum(vongop) as soduco FROM psvoncsh WHERE tanggiam=0 ";
                        $resulttk = $this->re_query($sqltk);
                        $datatk = $this->re_fetch($resulttk);
                        $data1['soduno'] = $datatk['soduno'];
                        $data1['soduco'] = $datatk['soduco'];

                        $data1['ctsoduno'] = $datatk['soduno'];
                        $data1['ctsoduco'] = $datatk['soduco'];

                        if ($datatk['soduno'] == "") {
                            $data1['soduno'] = 0;
                            $data1['ctsoduno'] = 0;
                        }
                        if ($datatk['soduco'] == "") {
                            $data1['soduco'] = 0;
                            $data1['ctsoduco'] = 0;
                        }
                        $sql_up="";
                        $sql_up="update sdtkdk set soduno='".$datatk['soduno']."',soduco='".$datatk['soduco']."' where matk='". $data1['matk']."'";
                        $this->re_query($sql_up);
                    }
                }
                $trees[] = $data1;
                $sql2 = "SELECT * FROM sdtkdk WHERE $sql_w matkcha =" . $data1['matk'] . " order by matk ";
                $query1 = $this->re_query($sql2);
                while ($data2 = $this->re_fetch($query1)) {// Lấy thông tin tài khoản cấp 3
                    if ($printto == 2) {
                        break;
                    }
                    $i++;
                    $data2['STT'] = $i;
                    $data2['tentk'] = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" . $data2['tentk'];
                    $data2['ctsoduno'] = 0;
                    $data2['ctsoduco'] = 0;
                    if ($data2['cttheobophan'] == 1) {
                        if (substr($data2['matk'], 0, 2) == 15) {
                            $sqltk = "SELECT sum(dgxvnd) as soduno,0 as soduco FROM tk WHERE matk='" . $data2['matk'] . "' group by matk order by matk ";
                            $resulttk = $this->re_query($sqltk);
                            $datatk = $this->re_fetch($resulttk);
                            $data2['soduno'] = $datatk['soduno'];
                            $data2['soduco'] = $datatk['soduco'];

                            $data2['ctsoduno'] = $datatk['soduno'];
                            $data2['ctsoduco'] = $datatk['soduco'];

                            if ($datatk['soduno'] == "") {
                                $data2['soduno'] = 0;
                                $data2['ctsoduno'] = 0;
                            }
                            if ($datatk['soduco'] == "") {
                                $data2['soduco'] = 0;
                                $data2['ctsoduco'] = 0;
                            }
                            $sql_up="";
                            $sql_up="update sdtkdk set soduno='".$datatk['soduno']."',soduco='".$datatk['soduco']."' where matk='". $data2['matk']."'";
                            $this->re_query($sql_up);
                        }
                        if ((substr($data['matk'], 0, 3) == 211)|| (substr($data['matk'], 0, 3) == 212) || (substr($data['matk'], 0, 3) == 213)) {
                            $sqltk = "SELECT sum(nguyengia) as soduno,0 as soduco FROM psts WHERE matk='" . $data2['matk'] . "' and tanggiam=0 group by matk order by matk ";
                            $resulttk = $this->re_query($sqltk);
                            $datatk = $this->re_fetch($resulttk);
                            $data2['soduno'] = $datatk['soduno'];
                            $data2['soduco'] = $datatk['soduco'];

                            $data2['ctsoduno'] = $datatk['soduno'];
                            $data2['ctsoduco'] = $datatk['soduco'];
                            if ($datatk['soduno'] == "") {
                                $data2['soduno'] = 0;
                                $data2['ctsoduno'] = 0;
                            }
                            if ($datatk['soduco'] == "") {
                                $data2['soduco'] = 0;
                                $data2['ctsoduco'] = 0;
                            }
                            $sql_up="";
                            $sql_up="update sdtkdk set soduno='".$datatk['soduno']."',soduco='".$datatk['soduco']."' where matk='". $data2['matk']."'";
                            $this->re_query($sql_up);
                        }
                        if ($data2['matk'] == 2141) {
                            if($_SESSION['theothongtu']=="tt200"){
                                $sqltk = "SELECT 0 as soduno,(sum(nguyengia)-sum(giatriconlai)) as soduco FROM psts WHERE tanggiam=0 and giatriconlai>=0 and SUBSTRING(matk, 1, 3) ='211' group by matk order by matk ";
                            }else{
                                $sqltk = "SELECT 0 as soduno,(sum(nguyengia)-sum(giatriconlai)) as soduco FROM psts WHERE tanggiam=0 and giatriconlai>=0 and matk='2111' group by matk order by matk ";
                            }                              $resulttk = $this->re_query($sqltk);
                            $datatk = $this->re_fetch($resulttk);
                            $data2['soduno'] = $datatk['soduno'];
                            $data2['soduco'] = $datatk['soduco'];

                            $data2['ctsoduno'] = $datatk['soduno'];
                            $data2['ctsoduco'] = $datatk['soduco'];
                            if ($datatk['soduno'] == "") {
                                $data2['soduno'] = 0;
                                $data2['ctsoduno'] = 0;
                            }
                            if ($datatk['soduco'] == "") {
                                $data2['soduco'] = 0;
                                $data2['ctsoduco'] = 0;
                            }
                            $sql_up="";
                            $sql_up="update sdtkdk set soduno='".$datatk['soduno']."',soduco='".$datatk['soduco']."' where matk='". $data2['matk']."'";
                            $this->re_query($sql_up);
                        }

                        if ($data2['matk'] == 2142) {
                            if($_SESSION['theothongtu']=="tt200"){
                                $sqltk = "SELECT 0 as soduno,(sum(nguyengia)-sum(giatriconlai)) as soduco FROM psts WHERE tanggiam=0 and giatriconlai>=0 and SUBSTRING(matk, 1, 3) ='212' group by matk order by matk ";
                            }else{
                                $sqltk = "SELECT 0 as soduno,(sum(nguyengia)-sum(giatriconlai)) as soduco FROM psts WHERE tanggiam=0 and giatriconlai>=0 and matk='2112' group by matk order by matk ";
                            }
                            $resulttk = $this->re_query($sqltk);
                            $datatk = $this->re_fetch($resulttk);
                            $data2['soduno'] = $datatk['soduno'];
                            $data2['soduco'] = $datatk['soduco'];

                            $data2['ctsoduno'] = $datatk['soduno'];
                            $data2['ctsoduco'] = $datatk['soduco'];
                            if ($datatk['soduno'] == "") {
                                $data2['soduno'] = 0;
                                $data2['ctsoduno'] = 0;
                            }
                            if ($datatk['soduco'] == "") {
                                $data2['soduco'] = 0;
                                $data2['ctsoduco'] = 0;
                            }
                            $sql_up="";
                            $sql_up="update sdtkdk set soduno='".$datatk['soduno']."',soduco='".$datatk['soduco']."' where matk='". $data2['matk']."'";
                            $this->re_query($sql_up);
                        }

                        if ($data2['matk'] == 2143) {
                            if($_SESSION['theothongtu']=="tt200"){
                                $sqltk = "SELECT 0 as soduno,(sum(nguyengia)-sum(giatriconlai)) as soduco FROM psts WHERE tanggiam=0 and giatriconlai>=0 and SUBSTRING(matk, 1, 3) ='213' group by matk order by matk ";
                            }else{
                                $sqltk = "SELECT 0 as soduno,(sum(nguyengia)-sum(giatriconlai)) as soduco FROM psts WHERE tanggiam=0 and giatriconlai>=0 and matk='2113' group by matk order by matk ";
                            }                              $resulttk = $this->re_query($sqltk);
                            $datatk = $this->re_fetch($resulttk);
                            $data2['soduno'] = $datatk['soduno'];
                            $data2['soduco'] = $datatk['soduco'];

                            $data2['ctsoduno'] = $datatk['soduno'];
                            $data2['ctsoduco'] = $datatk['soduco'];
                            if ($datatk['soduno'] == "") {
                                $data2['soduno'] = 0;
                                $data2['ctsoduno'] = 0;
                            }
                            if ($datatk['soduco'] == "") {
                                $data2['soduco'] = 0;
                                $data2['ctsoduco'] = 0;
                            }
                            $sql_up="";
                            $sql_up="update sdtkdk set soduno='".$datatk['soduno']."',soduco='".$datatk['soduco']."' where matk='". $data2['matk']."'";
                            $this->re_query($sql_up);
                        }
                        if (substr($data2['matk'], 0, 3) == 242 || substr($data2['matk'], 0, 3) == 241) {
                            $sqltk = "SELECT sum(giatriconlai) as soduno,0 as soduco FROM pscptt WHERE matk='" . $data2['matk'] . "' and tanggiam=0 group by matk order by matk ";
                            $resulttk = $this->re_query($sqltk);
                            $datatk = $this->re_fetch($resulttk);
                            $data2['soduno'] = $datatk['soduno'];
                            $data2['soduco'] = $datatk['soduco'];

                            $data2['ctsoduno'] = $datatk['soduno'];
                            $data2['ctsoduco'] = $datatk['soduco'];
                            if ($datatk['soduno'] == "") {
                                $data2['soduno'] = 0;
                                $data2['ctsoduno'] = 0;
                            }
                            if ($datatk['soduco'] == "") {
                                $data2['soduco'] = 0;
                                $data2['ctsoduco'] = 0;
                            }
                            $sql_up="";
                            $sql_up="update sdtkdk set soduno='".$datatk['soduno']."',soduco='".$datatk['soduco']."' where matk='". $data2['matk']."'";
                            $this->re_query($sql_up);
                        }
                        if ((substr($data2['matk'], 0, 3) == 131) || (substr($data2['matk'], 0, 3) == 331)) {
                            $sqltk = "SELECT sum(sdkno) as soduno,sum(sdkco) as soduco FROM sdcn WHERE matk='" . $data2['matk'] . "' group by matk order by matk ";
                            $resulttk = $this->re_query($sqltk);
                            $datatk = $this->re_fetch($resulttk);
                            $data2['soduno'] = $datatk['soduno'];
                            $data2['soduco'] = $datatk['soduco'];
                            $data2['ctsoduno'] = $datatk['soduno'];
                            $data2['ctsoduco'] = $datatk['soduco'];
                            if ($datatk['soduno'] == "") {
                                $data2['soduno'] = 0;
                                $data2['ctsoduno'] = 0;
                            }
                            if ($datatk['soduco'] == "") {
                                $data2['soduco'] = 0;
                                $data2['ctsoduco'] = 0;
                            }
                            $sql_up="";
                            $sql_up="update sdtkdk set soduno='".$datatk['soduno']."',soduco='".$datatk['soduco']."' where matk='". $data2['matk']."'";
                            $this->re_query($sql_up);
                        }
                        if ( (($data2['matk']) == 1386) || (($data2['matk']) == 1388) || (($data2['matk']) == 3388) || (($data2['matk']) == 3387) || (substr($data2['matk'], 0, 3) == 335) || (substr($data2['matk'], 0, 3) == 341) || (substr($data2['matk'], 0, 3) == 136)|| (substr($data2['matk'], 0, 3) == 244)|| (substr($data2['matk'], 0, 3) == 344)|| (substr($data2['matk'], 0, 3) == 141) ) {
                            $sqltk = "SELECT sum(sdkno) as soduno,sum(sdkco) as soduco FROM sdcn WHERE matk='" . $data2['matk'] . "' group by matk order by matk ";
                            $resulttk = $this->re_query($sqltk);
                            $datatk = $this->re_fetch($resulttk);

                            $tmp = $datatk['soduno'] - $datatk['soduco'];
                            if ($tmp >= 0) {
                                $data2['soduno'] = abs($tmp);
                                $data2['soduco'] = 0;
                                $data2['ctsoduno'] = abs($tmp);
                                $data2['ctsoduco'] = 0;
                                $sql_up = "";
                                $sql_up = "update sdtkdk set soduno='" . abs($tmp) . "',soduco='0' where matk='" . $data2['matk'] . "'";
                                $this->re_query($sql_up);
                            } else {
                                $data2['soduno'] = 0;
                                $data2['soduco'] = abs($tmp);
                                $data2['ctsoduno'] = 0;
                                $data2['ctsoduco'] = abs($tmp);

                                $sql_up = "";
                                $sql_up = "update sdtkdk set soduno='0',soduco='" . abs($tmp) . "' where matk='" . $data2['matk'] . "'";
                                $this->re_query($sql_up);
                            }
                        }
                        if ($data2['matk'] == 4111) {
                            $sqltk = "SELECT 0 as soduno,sum(vongop) as soduco FROM psvoncsh WHERE tanggiam=0 ";
                            $resulttk = $this->re_query($sqltk);
                            $datatk = $this->re_fetch($resulttk);
                            $data2['soduno'] = $datatk['soduno'];
                            $data2['soduco'] = $datatk['soduco'];

                            $data2['ctsoduno'] = $datatk['soduno'];
                            $data2['ctsoduco'] = $datatk['soduco'];

                            if ($datatk['soduno'] == "") {
                                $data2['soduno'] = 0;
                                $data2['ctsoduno'] = 0;
                            }
                            if ($datatk['soduco'] == "") {
                                $data2['soduco'] = 0;
                                $data2['ctsoduco'] = 0;
                            }
                            $sql_up="";
                            $sql_up="update sdtkdk set soduno='".$datatk['soduno']."',soduco='".$datatk['soduco']."' where matk='". $data2['matk']."'";
                            $this->re_query($sql_up);
                        }
                    }
                    $trees[] = $data2;
                }
            }
        }
        return $trees;
    }

    public function tongsodudauky()
    {
        $sql = "select sum(soduno) as soduno,sum(soduco) as soduco from sdtkdk ";
        $this->query($sql);
        if ($this->num_rows() == 0) {
            return 0;
        } else {
            return $this->fetch_all();
        }
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

    public function themMaVT()
    {
        $sql = "INSERT INTO tk (mavt, tenvt,matk, quycach, dvt,gtvnck,rate,manhom,tennhom,slck,dgxvnd,tenkd)
                       VALUES ('" . $this->get_MaVT() . "', '" . $this->get_TenVT() . "','" . $this->get_MaTK() . "','" . $this->get_QuyCach() . "','" . $this->get_DVT() . "','" . $this->get_GiaMua() . "','" . $this->get_Rate() . "','" . $this->get_MaNhom() . "','" . $this->get_TenNhom() . "'," . $this->getSLCK() . ",'" . $this->getDgxvnd() . "','" . $this->get_TenKD() . "' );";
        $this->query($sql);
    }

    public function suaMaVT()
    {
        $sql = "update tk set 
                    tenvt='" . $this->get_TenVT() . "', 
                    matk ='" . $this->get_MaTK() . "',
                    quycach= '" . $this->get_QuyCach() . "',
                    dvt= '" . $this->get_DVT() . "',
                    gtvnck='" . $this->get_GiaMua() . "',
                    rate= '" . $this->get_Rate() . "',
                    manhom='" . $this->get_MaNhom() . "',
                    tennhom='" . $this->get_TenNhom() . "',
                    slck=" . $this->getSLCK() . ",
                    dgxvnd='" . $this->getDgxvnd() . "',
                    tenkd='" . $this->get_TenKD() . "'
        WHERE mavt = '" . $this->get_MaVT() . "'";
        $this->query($sql);
    }

    public function xoaMaVT()
    {
        $sql = "delete from mavt where mavt='" . $this->get_MaVT() . "'";
        $this->query($sql);
    }

    function themdstk()
    {
        $sql = "INSERT INTO sdtkdk(matk,tentk,matkcha) SELECT matk,tentk,matkcha FROM matk where matk NOT in (select matk FROM sdtkdk)";
        $this->query($sql);
    }

    function updatesodutk()
    {
        $sql = "update sdtkdk set 
                    soduno='" . $this->getSoDuNo() . "', 
                    soduco ='" . $this->getSoDuCo() . "',
                    tygia='" . $this->getTyGia() . "', 
                    sotiennt ='" . $this->getNguyenTe() . "',
                    cttheobophan= '" . $this->getCttheobophan() . "',
                    chitiettheond= '" . $this->getChitiettheond() . "'           
        WHERE sott = '" . $this->get_SoTT() . "'";
        $this->query($sql);
    }
}

?>
