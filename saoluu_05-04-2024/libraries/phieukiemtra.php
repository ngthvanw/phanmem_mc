<?php

class phieukiemtra extends database
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

    public $sdkno;
    public $sdkco;

    public $soct;
    public $noidung;
    public $LoaiPhieu;

    /**
     * @return mixed
     */
    public function getLoaiPhieu()
    {
        return $this->LoaiPhieu;
    }

    /**
     * @param mixed $LoaiPhieu
     */
    public function setLoaiPhieu($LoaiPhieu)
    {
        $this->LoaiPhieu = $LoaiPhieu;
    }

    /**
     * @return mixed
     */
    public function getSoct()
    {
        return $this->soct;
    }

    /**
     * @param mixed $soct
     */
    public function setSoct($soct)
    {
        $this->soct = $soct;
    }

    /**
     * @return mixed
     */
    public function getNoidung()
    {
        return $this->noidung;
    }

    /**
     * @param mixed $noidung
     */
    public function setNoidung($noidung)
    {
        $this->noidung = $noidung;
    }

    /**
     * @return mixed
     */
    public function getChinhsua()
    {
        return $this->chinhsua;
    }

    /**
     * @param mixed $chinhsua
     */
    public function setChinhsua($chinhsua)
    {
        $this->chinhsua = $chinhsua;
    }

    /**
     * @return mixed
     */
    public function getKetoanvien()
    {
        return $this->ketoanvien;
    }

    /**
     * @param mixed $ketoanvien
     */
    public function setKetoanvien($ketoanvien)
    {
        $this->ketoanvien = $ketoanvien;
    }

    /**
     * @return mixed
     */
    public function getTruongnhom()
    {
        return $this->truongnhom;
    }

    /**
     * @param mixed $truongnhom
     */
    public function setTruongnhom($truongnhom)
    {
        $this->truongnhom = $truongnhom;
    }

    /**
     * @return mixed
     */
    public function getBangiamdoc()
    {
        return $this->bangiamdoc;
    }

    /**
     * @param mixed $bangiamdoc
     */
    public function setBangiamdoc($bangiamdoc)
    {
        $this->bangiamdoc = $bangiamdoc;
    }

    /**
     * @return mixed
     */
    public function getThoigianbatdau()
    {
        return $this->thoigianbatdau;
    }

    /**
     * @param mixed $thoigianbatdau
     */
    public function setThoigianbatdau($thoigianbatdau)
    {
        $this->thoigianbatdau = $thoigianbatdau;
    }

    /**
     * @return mixed
     */
    public function getThoigianketthuc()
    {
        return $this->thoigianketthuc;
    }

    /**
     * @param mixed $thoigianketthuc
     */
    public function setThoigianketthuc($thoigianketthuc)
    {
        $this->thoigianketthuc = $thoigianketthuc;
    }

    /**
     * @return mixed
     */
    public function getKetoancapnhat()
    {
        return $this->ketoancapnhat;
    }

    /**
     * @param mixed $ketoancapnhat
     */
    public function setKetoancapnhat($ketoancapnhat)
    {
        $this->ketoancapnhat = $ketoancapnhat;
    }

    /**
     * @return mixed
     */
    public function getTruongnhomcapnhat()
    {
        return $this->truongnhomcapnhat;
    }

    /**
     * @param mixed $truongnhomcapnhat
     */
    public function setTruongnhomcapnhat($truongnhomcapnhat)
    {
        $this->truongnhomcapnhat = $truongnhomcapnhat;
    }

    /**
     * @return mixed
     */
    public function getGiamdoccapnhat()
    {
        return $this->giamdoccapnhat;
    }

    /**
     * @param mixed $giamdoccapnhat
     */
    public function setGiamdoccapnhat($giamdoccapnhat)
    {
        $this->giamdoccapnhat = $giamdoccapnhat;
    }
    public $chinhsua;
    public $ketoanvien;
    public $truongnhom;
    public $bangiamdoc;
    public $thoigianbatdau;
    public $thoigianketthuc;
    public $ketoancapnhat;
    public $truongnhomcapnhat;
    public $giamdoccapnhat;


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
        $sql = "select max(sott) as sott from bangkiemtrachungtu";
        $this->query($sql);
        if ($this->num_rows() == 1) {
            $data = $this->fetch();
            return $data['sott'] + 1;
        } else {
            return 1;
        }
    }

    public function createSoLan($LoaiPhieu)
    {
        $sql = "select max(lanthu) as sott from nhatkykiemphieu where loaiphieu=$LoaiPhieu";
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

    function loadListPhieuKiemTra()
    {
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = " and " . $this->get_orderby();
        $sql = "SELECT * FROM bangkiemtrachungtu WHERE 0=0 $sql_w  order by sott DESC";
        $this->query($sql);
        $i = 0;
        while ($data = $this->fetch()) {
            $i++;
            $data['STT'] = $i;
            $trees[] = $data;
        }
        return $trees;
    }
    function loadListDanhSachGiaoNhan($noiluu_phanmem)
    {
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = " and " . $this->get_orderby();
        $sql = "SELECT * FROM phpmyadmin.danhsach_giaonhan_chungtu_{$noiluu_phanmem} WHERE 0=0 $sql_w  order by bosung DESC,sott DESC LIMIT 500";
        $this->query($sql);
        $i = 0;
        while ($data = $this->fetch()) {
            $i++;
            $data['STT'] = $i;
            $trees[] = $data;
        }
        return $trees;
    }
    function loadListDanhSachBangKe_MuaVao_BanRa()
    {
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = " and " . $this->get_orderby();
        $sql = "SELECT * FROM bangkemuavao_banra WHERE 0=0 $sql_w  order by thang DESC";
        $this->query($sql);
        $i = 0;
        while ($data = $this->fetch()) {
            $i++;
            $data['STT'] = $i;
            $trees[] = $data;
        }
        return $trees;
    }

    function loadListDanhSachThuQuanLy($noiluu_phanmem)
    {
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = " and " . $this->get_orderby();
        $sql = "SELECT * FROM phpmyadmin.danhsach_thuquanly_{$noiluu_phanmem} WHERE 0=0 $sql_w  order by sott";
        $this->query($sql);
        $i = 0;
        while ($data = $this->fetch()) {
            $i++;
            $data['STT'] = $i;
            $trees[] = $data;
        }
        return $trees;
    }
    function loadListDanhSach_DNBatHopPhap($noiluu_phanmem)
    {
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = " and " . $this->get_orderby();
        $sql = "SELECT * FROM dulieuchung.doanhnghiep_bathopphap WHERE 0=0 $sql_w  order by masothue";
        $this->query($sql);
        $i = 0;
        while ($data = $this->fetch()) {
            $i++;
            $data['STT'] = $i;
            $trees[] = $data;
        }
        return $trees;
    }
    function loadListDanhSachHopDongDL()
    {
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = " and " . $this->get_orderby();
        $sql = "SELECT * FROM danhsach_hopdong_daily WHERE 0=0 $sql_w  order by namhd desc";
        $this->query($sql);
        $i = 0;
        while ($data = $this->fetch()) {
            $i++;
            $data['STT'] = $i;
            $trees[] = $data;
        }
        return $trees;
    }
    function loadListDanhSachKeHoach($noiluu_phanmem)
    {
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = " and " . $this->get_orderby();
        $sql = "SELECT * FROM phpmyadmin.danhsach_kehoach_{$noiluu_phanmem} WHERE 0=0 $sql_w  order by sott,nguoigui limit 200";
        $this->query($sql);
        $i = 0;
        while ($data = $this->fetch()) {
            $i++;
            $data['STT'] = $i;
            $trees[] = $data;
        }
        return $trees;
    }

    function loadListDanhSachNhatKyLamViec()
    {
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = " and " . $this->get_orderby();
        $sql = "SELECT * FROM nhatkylamviec WHERE 0=0 $sql_w  order by thoigianghi DESC LIMIT 500";
        $this->query($sql);
        $i = 0;
        while ($data = $this->fetch()) {
            $i++;
            $trees[] = $data;
        }
        return $trees;
    }
    function loadListMaKHNODK_W()
    {
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = " and " . $this->get_orderby();
        $sql = "SELECT makh.tenkh,sdcn.makh,sdcn.matk,sdkno,sdkco,makh.makhcha,makh.diachi,makh.dienthoai,makh.ngaytra,makh.ghichu,sdcn.sott FROM makh inner join sdcn on (makh.makh = sdcn.makh ) WHERE 0=0 $sql_w  order by makh.tenkh ";
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
                $ma = explode("-", $data[makh]);
                $sopt = count($ma) - 1;
                $trees[$ma[$sopt]] = $ma;
            }
            return $trees;
        }
    }

    function loadListMaKH($parentid = 0, $printto = 10)
    { // c?p 1 la cha
        //$cb_loaitk = $this->get_Cb_LoaiTK();
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = $this->get_orderby() . " and ";
        $sql = "SELECT * FROM makh WHERE $sql_w makhcha = '$parentid'  order by tenkh DESC ";
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

    function loadListMaKH_CB($parentid = 0, $printto = 10)
    { // c?p 1 la cha
        //$cb_loaitk = $this->get_Cb_LoaiTK();
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = $this->get_orderby() . " and ";
        $sql = "SELECT * FROM makh WHERE $sql_w makhcha = '$parentid'  order by tenkh DESC ";
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

    function loadListMaKHNODK($parentid = 0, $printto = 10)
    { // c?p 1 la cha
        //$cb_loaitk = $this->get_Cb_LoaiTK();
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = $this->get_orderby() . " and ";
        $sql = "SELECT makh.tenkh,sdcn.makh,sdcn.matk,sdkno,sdkco,makh.makhcha,makh.diachi,makh.dienthoai,makh.ngaytra,makh.ghichu,sdcn.sott from makh inner join sdcn on (makh.makh = sdcn.makh ) WHERE $sql_w makh.makhcha = '$parentid'  order by makh.tenkh DESC ";
        $this->query($sql);
        $i = 0;
        while ($data = $this->fetch()) {
            $i++;
            $data['STT'] = $i;
            $trees[] = $data;
            $sql1 = "SELECT makh.tenkh,sdcn.makh,sdcn.matk,sdkno,sdkco,makh.makhcha,makh.diachi,makh.dienthoai,makh.ngaytra,makh.ghichu,sdcn.sott FROM makh inner join sdcn on (makh.makh = sdcn.makh ) WHERE $sql_w makh.makhcha ='" . $data['makh'] . "' order by makh.makh ";
            $query = $this->re_query($sql1);
            while ($data1 = $this->re_fetch($query)) {
                if ($printto == 1) {
                    break;
                }
                $i++;
                $data1['STT'] = $i;
                $trees[] = $data1;
                $sql2 = "SELECT makh.tenkh,sdcn.makh,sdcn.matk,sdkno,sdkco,makh.makhcha,makh.diachi,makh.dienthoai,makh.ngaytra,makh.ghichu,sdcn.sott FROM makh inner join sdcn on (makh.makh = sdcn.makh ) WHERE $sql_w makh.makhcha ='" . $data1['makh'] . "' order by makh.makh ";
                $query1 = $this->re_query($sql2);
                while ($data2 = $this->re_fetch($query1)) {
                    if ($printto == 2) {
                        break;
                    }
                    $i++;
                    $data2['STT'] = $i;
                    $trees[] = $data2;
                    $sql3 = "SELECT makh.tenkh,sdcn.makh,sdcn.matk,sdkno,sdkco,makh.makhcha,makh.diachi,makh.dienthoai,makh.ngaytra,makh.ghichu,sdcn.sott FROM makh inner join sdcn on (makh.makh = sdcn.makh )  WHERE $sql_w makh.makhcha ='" . $data2['makh'] . "' order by makh.makh ";
                    $query3 = $this->re_query($sql3);
                    while ($data3 = $this->re_fetch($query3)) {
                        if ($printto == 3) {
                            break;
                        }
                        $i++;
                        $data3['STT'] = $i;
                        $trees[] = $data3;
                        $sql4 = "SELECT makh.tenkh,sdcn.makh,sdcn.matk,sdkno,sdkco,makh.makhcha,makh.diachi,makh.dienthoai,makh.ngaytra,makh.ghichu,sdcn.sott FROM makh inner join sdcn on (makh.makh = sdcn.makh ) WHERE $sql_w makh.makhcha ='" . $data3['makh'] . "' order by makh.makh ";
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

    public function loadListNhatKy()
    {
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = " and ".$this->get_orderby() . " ";
        $sql = "select * from nhatkykiemphieu where 0=0 $sql_w order by lanthu DESC ";
        $this->query($sql);
        while ($data = $this->fetch()) {
            $row[] = $data;
        }
        return $row;
    }

    public function loadListNhatKy_LayMaxMin()
    {
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = " and ".$this->get_orderby() . " ";
        $sql = "select (tuso) as tuso,(denso) as denso from nhatkykiemphieu where 0=0 $sql_w  order by lanthu DESC ";
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

    public function themSoDuDKKH($sql)
    {
        $sql = "INSERT INTO sdcn (makh,makhcha) 
				SELECT makh,makhcha
				FROM makh
				WHERE makh not in (select makh from sdcn)";
        $this->query($sql);
    }

    public function themPhieu()
    {
        $sql = "INSERT INTO bangkiemtrachungtu (sott,soct,noidung,chinhsua,ketoanvien,truongnhom,bangiamdoc,loaiphieu,thoigianbatdau) 
       VALUES ('" . $this->get_SoTT() . "','" . $this->getSoct() . "','" . $this->getNoidung() . "','" . $this->getChinhsua() . "','" . $this->getKetoanvien() . "', '" . $this->getTruongnhom() . "','" . $this->getBangiamdoc() . "','" . $this->getLoaiPhieu() . "','".$this->getThoigianbatdau()."');";
        $this->query($sql);
    }

    public function themPhieuNhatKy($lanthu,$tuso,$denso,$ngaynhap,$gionhap,$loaiphieu,$nguoinhap,$gt1,$gt2,$matk,$ngaycuoi,$truongnhomduyet=0,$giamdocduyet=0,$nguoiduyet="",$ngayduyet="",$ghichu="",$machinhanh="")
    {
        $sql = "INSERT INTO nhatkykiemphieu (lanthu,tuso,denso,ngaynhap,gionhap,loaiphieu,nguoinhap,gt1,gt2,ngaycuoi,matk,truongnhomduyet,giamdocduyet,nguoiduyet,ngayduyet,ghichu,machinhanh) 
       VALUES ('" . $lanthu . "','" . $tuso . "','" . $denso . "','" . $ngaynhap . "','" . $gionhap . "', '" . $loaiphieu . "','" . $nguoinhap . "','".$gt1."','".$gt2."','".$ngaycuoi."','".$matk."','".$truongnhomduyet."','".$giamdocduyet."','".$nguoiduyet."','".$ngayduyet."','".$ghichu."','".$machinhanh."');";
        $this->query($sql);
    }
    public function suaPhieuNhatKy($sott,$truongnhomduyet=0,$giamdocduyet=0,$nguoiduyet="",$ngayduyet="",$ghichu="")
    {
         $sql = "update nhatkykiemphieu set truongnhomduyet='" . $truongnhomduyet . "',giamdocduyet='" . $giamdocduyet . "',nguoiduyet='" . $nguoiduyet . "',ngayduyet='" . $ngayduyet . "',ghichu='" . $ghichu . "'
                  WHERE sott = '" . $sott . "'";
        $this->query($sql);
    }

    public function themMaKHSDKY()
    {
        $sql = "INSERT INTO sdcn (makh,sdkno,sdkco,matk) 
       VALUES ('" . $this->get_MaKH() . "','" . $this->getsdkno() . "','" . $this->getsdkco() . "','" . $this->get_MaTK() . "')";
        $this->query($sql);
    }

    public function suaMaKHSDKY()
    {
        $sql = "update sdcn set sdkno='" . $this->getsdkno() . "',sdkco='" . $this->getsdkco() . "',matk='" . $this->get_MaTK() . "'
                  WHERE sott = '" . $this->get_SoTT() . "'";
        $this->query($sql);
    }

    public function suaPhieu()
    {
        $sql = "update bangkiemtrachungtu set 
                soct='" . $this->getSoct() . "',
                noidung='" . $this->getNoidung() . "',
                chinhsua='" . $this->getChinhsua() . "',
                ketoanvien='" . $this->getKetoanvien() . "',
                truongnhom='" . $this->getTruongnhom() . "',
                bangiamdoc='" . $this->getBangiamdoc() . "',
                loaiphieu='" . $this->getLoaiPhieu() . "',
                ketoancapnhat='" . $this->getKetoancapnhat() . "',
                truongnhomcapnhat='" . $this->getTruongnhomcapnhat() . "',
                giamdoccapnhat='" . $this->getGiamdoccapnhat() . "'
                
                WHERE sott = '" . $this->get_SoTT() . "'";
        $this->query($sql);
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

    public function xoaPhieu()
    {
        $sql = "delete from bangkiemtrachungtu where sott='" . $this->get_SoTT() . "'";
        $this->query($sql);
    }
	
	    public function xoaPhieu_NhatKy()
    {
        $sql = "delete from nhatkykiemphieu where sott='" . $this->get_SoTT() . "'";
        $this->query($sql);
    }

    public function xoaNoMaKH()
    {
        $sql = "delete from sdcn where sott='" . $this->get_SoTT() . "'";
        $this->query($sql);
    }
}

?>
