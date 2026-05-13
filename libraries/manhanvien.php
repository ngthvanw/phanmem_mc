<?php

class manhanvien extends database
{
    public $tringorder;

    public $MaNV;
    public $TenNV;
    public $TenKD;
    public $SoCMND;
    public $DiaChi;
    public $DienThoai;
    public $NamSinh;
    public $GioiTinh;
    public $ChuThich;
    public $SoTT;
    public $NgayTao;
    public $MaBP;
    public $MaBPGoc;
    public $MaCT;
    public $LuongCB;
    public $BacTho;
    public $TrinhDo;
    public $ChucDanh;
    public $MaSoThue;
    public $NgayBDHopDong;

    public $PhanTramThang;
    public $PhanTramQuy;
    public $PhanTramNam;

    public $PhuCapChucVu;

    public $TienAnGiuaCa;
    public $PhuCapKhongDongBHXH;
    public $LoaiBP;
    public $GiamTruGiaCanh;

    /**
     * @return mixed
     */
    public function getGiamTruGiaCanh()
    {
        return $this->GiamTruGiaCanh;
    }

    /**
     * @param mixed $GiamTruGiaCanh
     */
    public function setGiamTruGiaCanh($GiamTruGiaCanh)
    {
        $this->GiamTruGiaCanh = $GiamTruGiaCanh;
    }
    public $SapXep;

    /**
     * @return mixed
     */
    public function getSapXep()
    {
        return $this->SapXep;
    }

    /**
     * @param mixed $SapXep
     */
    public function setSapXep($SapXep)
    {
        $this->SapXep = $SapXep;
    }

    /**
     * @return mixed
     */
    public function getLoaiBP()
    {
        return $this->LoaiBP;
    }

    /**
     * @param mixed $LoaiBP
     */
    public function setLoaiBP($LoaiBP)
    {
        $this->LoaiBP = $LoaiBP;
    }

    /**
     * @return mixed
     */
    public function getTienAnGiuaCa()
    {
        return $this->TienAnGiuaCa;
    }

    /**
     * @param mixed $TienAnGiuaCa
     */
    public function setTienAnGiuaCa($TienAnGiuaCa)
    {
        $this->TienAnGiuaCa = $TienAnGiuaCa;
    }

    /**
     * @return mixed
     */
    public function getPhuCapKhongDongBHXH()
    {
        return $this->PhuCapKhongDongBHXH;
    }

    /**
     * @param mixed $PhuCapKhongDongBHXH
     */
    public function setPhuCapKhongDongBHXH($PhuCapKhongDongBHXH)
    {
        $this->PhuCapKhongDongBHXH = $PhuCapKhongDongBHXH;
    }

    /**
     * @return mixed
     */
    public function getThueThuNhap()
    {
        return $this->ThueThuNhap;
    }

    /**
     * @param mixed $ThueThuNhap
     */
    public function setThueThuNhap($ThueThuNhap)
    {
        $this->ThueThuNhap = $ThueThuNhap;
    }

    /**
     * @return mixed
     */
    public function getMaTK1()
    {
        return $this->MaTK1;
    }

    /**
     * @param mixed $MaTK1
     */
    public function setMaTK1($MaTK1)
    {
        $this->MaTK1 = $MaTK1;
    }

    /**
     * @return mixed
     */
    public function getPhanTramTK()
    {
        return $this->PhanTramTK;
    }

    /**
     * @param mixed $PhanTramTK
     */
    public function setPhanTramTK($PhanTramTK)
    {
        $this->PhanTramTK = $PhanTramTK;
    }

    /**
     * @return mixed
     */
    public function getMaTK2()
    {
        return $this->MaTK2;
    }

    /**
     * @param mixed $MaTK2
     */
    public function setMaTK2($MaTK2)
    {
        $this->MaTK2 = $MaTK2;
    }
    public $ThueThuNhap;
    public $MaTK1;
    public $PhanTramTK;
    public $MaTK2;

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

    /**
     * @return mixed
     */
    public function getPhuCapChucVu()
    {
        return $this->PhuCapChucVu;
    }

    /**
     * @param mixed $PhuCapChucVu
     */
    public function setPhuCapChucVu($PhuCapChucVu)
    {
        $this->PhuCapChucVu = $PhuCapChucVu;
    }

    /**
     * @return mixed
     */
    public function getBaoHiem()
    {
        return $this->BaoHiem;
    }

    /**
     * @param mixed $BaoHiem
     */
    public function setBaoHiem($BaoHiem)
    {
        $this->BaoHiem = $BaoHiem;
    }
    public $BaoHiem;
    public $PhiCongDoan;

    /**
     * @return mixed
     */
    public function getPhiCongDoan()
    {
        return $this->PhiCongDoan;
    }

    /**
     * @param mixed $PhiCongDoan
     */
    public function setPhiCongDoan($PhiCongDoan)
    {
        $this->PhiCongDoan = $PhiCongDoan;
    }
    public $BaoHiemYT;

    /**
     * @return mixed
     */
    public function getBaoHiemYT()
    {
        return $this->BaoHiemYT;
    }

    /**
     * @param mixed $BaoHiemYT
     */
    public function setBaoHiemYT($BaoHiemYT)
    {
        $this->BaoHiemYT = $BaoHiemYT;
    }
    public $BaoHiemTN;

    /**
     * @return mixed
     */
    public function getBaoHiemTN()
    {
        return $this->BaoHiemTN;
    }

    /**
     * @param mixed $BaoHiemTN
     */
    public function setBaoHiemTN($BaoHiemTN)
    {
        $this->BaoHiemTN = $BaoHiemTN;
    }
    public $KinhPhiCongDoan;

    /**
     * @return mixed
     */
    public function getKinhPhiCongDoan()
    {
        return $this->KinhPhiCongDoan;
    }

    /**
     * @param mixed $KinhPhiCongDoan
     */
    public function setKinhPhiCongDoan($KinhPhiCongDoan)
    {
        $this->KinhPhiCongDoan = $KinhPhiCongDoan;
    }
    public $DN_BaoHiemXH;

    /**
     * @return mixed
     */
    public function getDNBaoHiemXH()
    {
        return $this->DN_BaoHiemXH;
    }

    /**
     * @param mixed $DN_BaoHiemXH
     */
    public function setDNBaoHiemXH($DN_BaoHiemXH)
    {
        $this->DN_BaoHiemXH = $DN_BaoHiemXH;
    }
    public $DN_BaoHiemYT;

    /**
     * @return mixed
     */
    public function getDNBaoHiemYT()
    {
        return $this->DN_BaoHiemYT;
    }

    /**
     * @param mixed $DN_BaoHiemYT
     */
    public function setDNBaoHiemYT($DN_BaoHiemYT)
    {
        $this->DN_BaoHiemYT = $DN_BaoHiemYT;
    }
    public $DN_BaoHiemTN;

    /**
     * @return mixed
     */
    public function getDNBaoHiemTN()
    {
        return $this->DN_BaoHiemTN;
    }

    /**
     * @param mixed $DN_BaoHiemTN
     */
    public function setDNBaoHiemTN($DN_BaoHiemTN)
    {
        $this->DN_BaoHiemTN = $DN_BaoHiemTN;
    }

    /**
     * @return mixed
     */
    public function getPhanTramThang()
    {
        return $this->PhanTramThang;
    }

    /**
     * @param mixed $PhanTramThang
     */
    public function setPhanTramThang($PhanTramThang)
    {
        $this->PhanTramThang = $PhanTramThang;
    }

    /**
     * @return mixed
     */
    public function getPhanTramQuy()
    {
        return $this->PhanTramQuy;
    }

    /**
     * @param mixed $PhanTramQuy
     */
    public function setPhanTramQuy($PhanTramQuy)
    {
        $this->PhanTramQuy = $PhanTramQuy;
    }

    /**
     * @return mixed
     */
    public function getPhanTramNam()
    {
        return $this->PhanTramNam;
    }

    /**
     * @param mixed $PhanTramNam
     */
    public function setPhanTramNam($PhanTramNam)
    {
        $this->PhanTramNam = $PhanTramNam;
    }

    /**
     * @return mixed
     */
    public function getTinhLuong()
    {
        return $this->TinhLuong;
    }

    /**
     * @param mixed $TinhLuong
     */
    public function setTinhLuong($TinhLuong)
    {
        $this->TinhLuong = $TinhLuong;
    }
    public $TinhLuong;

    /**
     * @return mixed
     */
    public function getNgayBDHopDong()
    {
        return $this->NgayBDHopDong;
    }

    /**
     * @param mixed $NgayBDHopDong
     */
    public function setNgayBDHopDong($NgayBDHopDong)
    {
        $this->NgayBDHopDong = $NgayBDHopDong;
    }


    /**
     * @return mixed
     */
    public function getNgayKTHopDong()
    {
        return $this->NgayKTHopDong;
    }

    /**
     * @param mixed $NgayKTHopDong
     */
    public function setNgayKTHopDong($NgayKTHopDong)
    {
        $this->NgayKTHopDong = $NgayKTHopDong;
    }
    public $NgayKTHopDong;

    /**
     * @return mixed
     */
    public function getMaSoThue()
    {
        return $this->MaSoThue;
    }

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
    public function getTrinhDo()
    {
        return $this->TrinhDo;
    }

    /**
     * @param mixed $TrinhDo
     */
    public function setTrinhDo($TrinhDo)
    {
        $this->TrinhDo = $TrinhDo;
    }

    /**
     * @return mixed
     */
    public function getChucDanh()
    {
        return $this->ChucDanh;
    }

    /**
     * @param mixed $ChucDanh
     */
    public function setChucDanh($ChucDanh)
    {
        $this->ChucDanh = $ChucDanh;
    }
    public $Nam;

    /**
     * @return mixed
     */
    public function getNam()
    {
        return $this->Nam;
    }

    /**
     * @param mixed $Nam
     */
    public function setNam($Nam)
    {
        $this->Nam = $Nam;
    }

    /**
     * @return mixed
     */
    public function getBacTho()
    {
        return $this->BacTho;
    }

    /**
     * @param mixed $BacTho
     */
    public function setBacTho($BacTho)
    {
        $this->BacTho = $BacTho;
    }

    public $MaCTCha;

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

    public function set_MaNV($MaNV)
    {
        $this->MaNV = $MaNV;
    }

    public function get_MaNV()
    {
        return $this->MaNV;
    }

    public function set_TenNV($TenNV)
    {
        $this->TenNV = $TenNV;
    }

    public function get_TenNV()
    {
        return $this->TenNV;
    }

    public function set_TenKD($TenKD)
    {
        $this->TenKD = $TenKD;
    }

    public function get_TenKD()
    {
        return $this->TenKD;
    }

    public function set_SoCMND($SoCMND)
    {
        $this->SoCMND = $SoCMND;
    }

    public function get_SoCMND()
    {
        return $this->SoCMND;
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

    public function set_LuongCB($LuongCB)
    {
        $this->LuongCB = $LuongCB;
    }

    public function get_LuongCB()
    {
        return $this->LuongCB;
    }

    public function set_NamSinh($NamSinh)
    {
        $this->NamSinh = $NamSinh;
    }

    public function get_NamSinh()
    {
        return $this->NamSinh;
    }

    public function set_GioiTinh($GioiTinh)
    {
        $this->GioiTinh = $GioiTinh;
    }

    public function get_GioiTinh()
    {
        return $this->GioiTinh;
    }

    public function set_ChuThich($ChuThich)
    {
        $this->ChuThich = $ChuThich;
    }

    public function get_ChuThich()
    {
        return $this->ChuThich;
    }

    public function set_NgayTao($NgayTao)
    {
        $this->NgayTao = $NgayTao;
    }

    public function get_NgayTao()
    {
        return $this->NgayTao;
    }

    public function set_MaBP($MaBP)
    {
        $this->MaBP = $MaBP;
    }

    public function get_MaBP()
    {
        return $this->MaBP;
    }

    public function set_MaBPGoc($MaBPGoc)
    {
        $this->MaBPGoc = $MaBPGoc;
    }

    public function get_MaBPGoc()
    {
        return $this->MaBPGoc;
    }

    public function set_MaCT($MaCT)
    {
        $this->MaCT = $MaCT;
    }

    public function get_MaCT()
    {
        return $this->MaCT;
    }

    public function set_MaCTCha($MaCTCha)
    {
        $this->MaCTCha = $MaCTCha;
    }

    public function get_MaCTCha()
    {
        return $this->MaCTCha;
    }

    public function checkKeyTrung()
    {
        $sql = "select * from manhanvien where socmnd='" . $this->get_SoCMND() . "' and sott!=" . $this->get_SoTT() . "";
        $this->query($sql);
        if ($this->num_rows() >= 1) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function checkBangLuongNhanVien()
    {
        $sql = "select * from bangluongnhanvien where thang ='" . $this->getThang() . "'";
        $this->query($sql);
        if ($this->num_rows() >= 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function ThemBangLuongNhanVien($datadoanhthu,$tinhluongtheo,$txttinhluongtheo)
    {
        $sql = "select * from manhanvien";
        $this->query($sql);
        $this->re_query("delete from bangluongnhanvien WHERE thang='{$txttinhluongtheo}'");
        $val="";
        while($data=$this->fetch()){
            $tongdoanhthu = $datadoanhthu[$data['socmnd']]['soducops'];
            $doanhthu = round($tongdoanhthu/1.1);
            $thuegtgt = $tongdoanhthu - $doanhthu;
            $luongkhoang = round($doanhthu * ($data['phantramthang']/100));
            if($data['tinhluong']=="CB"){
                $luongkhoang=0;
            }
            $val.="('".$data['manhanvien']."','".$data['tennv']."','".$data['chucdanh']."','".$data['trinhdo']."','".$data['luongcb']."','".$doanhthu."','".$luongkhoang."','".$data['phucapchucvu']."','".$data['baohiem']."','".$txttinhluongtheo."','".$thuegtgt."','".$data['socmnd']."','".$data['phantramthang']."','".$data['phantramquy']."','".$data['phantramnam']."'),";
        }

        $sql_in = "insert into bangluongnhanvien(manv,tennv,chucvu,trinhdo,luongcb,doanhthu,luongkhoan,phucapchucvu,baohiem,thang,thuegtgt,socmnd,phantramthang,phantramquy,phantramnam) VALUE ".substr($val,0,-1);
        $this->query($sql_in);
    }
    public function LoadBangLuongNhanVien()
    {
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = " and " . $this->get_orderby();
        $sql = "select * from bangluongnhanvien where 0=0 $sql_w ";
        $this->query($sql);
        if ($this->num_rows() == 0) {
            return $trees;
        } else {
            $i = 0;
            while ($data = $this->fetch()) {
                $i++;
                $trees[] = $data;
            }
        }
        return $trees;
     }

    public function LoadBangLuongNhanVienTongHop()
    {
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = " and " . $this->get_orderby();
        $sql = "SELECT manv,tennv,chucvu,trinhdo,sum(luongcb) as luongcb,sum(phucapchucvu) as phucapchucvu,sum(baohiem+baohiemyt+baohiemtn) as baohiem,socmnd,sum(tienangiuaca) as tienangiuaca,sum(phucapkhongdungbhxh) as phucapkhongdungbhxh,sum(thuethunhap) as thuethunhap,matk1,phantramtk,matk2,loaibp,sapxep FROM bangluongnhanvien WHERE 0=0 GROUP BY manv";
        $this->query($sql);
        if ($this->num_rows() == 0) {
            return $trees;
        } else {
            $i = 0;
            while ($data = $this->fetch()) {
                $i++;
                $trees[] = $data;
            }
        }
        return $trees;
    }


    public function checkXoa()
    {
        $sql = "select * from mabp  where mabp='" . $this->get_MaBP() . "'";
        $this->query($sql);
        if ($this->num_rows() >= 1) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function createSoTT()
    {
        $sub = rand(10,99);
        $ID = trim(trim($_SESSION['UserID']).time()).$sub;
        return (float)$ID;
    }

    public function createSoTTCTLuong()
    {
        $sql = "select max(sott) as sott from chitietluong";
        $this->query($sql);
        if ($this->num_rows() == 1) {
            $data = $this->fetch();
            return $data['sott'] + 1;
        } else {
            return 1;
        }
    }

    /*function loadListMaNV($parentid =0){
            $trees = array();
            $fill = $this->get_orderby();
            if($fill!="")
                    $sql_w = $this->get_orderby()." and ";
            $sql = "SELECT * FROM MaNV WHERE $sql_w ma = $parentid ";
            $this->query($sql);
            $i=0;
            while($data=$this->fetch())
            {
                $i++;
                $data['STT']=$i;
                $trees[] = $data;
                $sql1 = "SELECT * FROM matk WHERE $sql_w DiaChi =".$data['matk'];
                $query = mysql_query($sql1);
                while($data1=mysql_fetch_assoc($query))
                {
                    $i++;
                    $data1['STT']=$i;
                    $trees[] = $data1;
                    $sql2 = "SELECT * FROM matk WHERE $sql_w DiaChi =".$data1['matk'];
                    $query1 = mysql_query($sql2);
                    while($data2=mysql_fetch_assoc($query1))
                    {
                        $i++;
                        $data2['STT']=$i;
                        $trees[] = $data2;
                    }
                }
            }
            return $trees;
    } */
    public function loadListMaNV()
    {
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = " and " . $this->get_orderby();
        $sql = "select manhanvien.*,tenbp from manhanvien INNER JOIN mabp on (manhanvien.mabp = mabp.mabp) where 0=0 $sql_w  order by sapxep";
        $this->query($sql);
        if ($this->num_rows() == 0) {
            return $trees;
        } else {
            $i = 0;
            while ($data = $this->fetch()) {
                $i++;
                $data['STT'] = $i;
                $row[] = $data;
            }
            return $row;
        }
    }

    public function loadListTMPButToan()
    {
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = " and " . $this->get_orderby();
        $sql = "select tkno,tkco1,sum(sotien1) as tongtien,loaisp from tmp_hachtoanluongthang where sotien1>0 and tkno!='' and tkco1!=0 GROUP BY tkno,tkco1,loaisp";
        $this->query($sql);
        if ($this->num_rows() == 0) {
            return $trees;
        } else {
            $i = 0;
            while ($data = $this->fetch()) {
                $i++;
                $data['STT'] = $i;
                $row[] = $data;
            }
            return $row;
        }
    }

    public function loadListBangLuongMaNV($thang)
    {
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = " and " . $this->get_orderby();
        $sql = "select * from bangluongnhanvien where thang='{$thang}' $sql_w ";
        $this->query($sql);
        if ($this->num_rows() == 0) {
            return $trees;
        } else {
            $i = 0;
            while ($data = $this->fetch()) {
                $i++;
                $data['STT'] = $i;
                $row[] = $data;
            }
            return $row;
        }
    }

    public function TongLuongNhanVienThang($thang)
    {
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = " and " . $this->get_orderby();
        $sql = "select sum(luongcb) as luongcb,sum(phucapchucvu) as phucapchucvu,sum(baohiem) as baohiem,sum(tienangiuaca) as tienangiuaca,sum(phucapkhongdungbhxh) as phucapkhongdungbhxh,sum(thuethunhap) as thuethunhap from bangluongnhanvien where thang='{$thang}' group by thang";
        $this->query($sql);
        if ($this->num_rows() == 0) {
            return $trees;
        } else {
            $i = 0;
            while ($data = $this->fetch()) {
                $i++;
                $data['STT'] = $i;
                $row = $data;
            }
            return $row;
        }
    }


    public function loadListMaNV_CoLuongCT($Nam)
    {
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = " and " . $this->get_orderby();
        $sql = "select * from manhanvien inner JOIN manhom on (manhanvien.mabp = manhom.manhom) inner join chitietluong on (manhanvien.socmnd = chitietluong.socmnd) where 0=0 and nam=$Nam $sql_w ";
        $this->query($sql);
        if ($this->num_rows() == 0) {
            return $trees;
        } else {
            $i = 0;
            while ($data = $this->fetch()) {
                $i++;
                $data['STT'] = $i;
                $row[] = $data;
            }
            return $row;
        }
    }

    public function loadListMaNVJoin()
    {
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = " and " . $this->get_orderby();
        $sql = "select * from manhanvien inner join manhom on (manhanvien.mabp = manhom.mabp) inner join mact on (manhom.mact = mact.mact) where 0=0 $sql_w ";
        $this->query($sql);
        if ($this->num_rows() == 0) {
            return $trees;
        } else {
            $i = 0;
            while ($data = $this->fetch()) {
                $i++;
                $this->set_MaCT($data['mactcha']);
                $data['STT'] = $i;
                $row[] = $data;
            }
            return $row;
        }
    }

    public function getTenCTCha()
    {
        $sql = "select * from mact where mact='" . $this->get_MaCT() . "'";
        $this->query($sql);
        if ($this->num_rows() == 0) {
            return 0;
        } else {
            return $this->fetch();
        }
    }

    public function getMaNV()
    {
        $sql = "select * from manhanvien where MaNV='" . $this->get_MaNV() . "'";
        $this->query($sql);
        if ($this->num_rows() == 0) {
            return 0;
        } else {
            return $this->fetch();
        }
    }

    public function themMaNV()
    {
        $sql = "INSERT INTO manhanvien (sott,tennv,tenkd,socmnd,diachi,gioitinh,dienthoai,luongcb,namsinh,ghichu,chucdanh,trinhdo,mabp,masothue,ngaybdhopdong,ngaykthopdong,phantramthang,phantramquy,phantramnam,tinhluong,phucapchucvu,baohiem,tienangiuaca,phucapkhongdungbhxh,thuethunhap,matk1,phantramtk,matk2,loaibp,sapxep,giamtrugiacanh,phicongdoan,baohiemyt,baohiemtn,kinhphicongdoan,dn_baohiem,dn_baohiemyt,dn_baohiemtn) 
                       VALUES ('" . $this->get_SoTT() . "', '" . $this->get_TenNV() . "', '" . $this->get_TenKD() . "', '" . $this->get_SoCMND() . "','" . $this->get_DiaChi() . "','" . $this->get_GioiTinh() . "','" . $this->get_DienThoai() . "','" . $this->get_LuongCB() . "','" . $this->get_NamSinh() . "','" . $this->get_ChuThich() . "','" . $this->getChucDanh() . "','" . $this->getTrinhDo() . "','" . $this->get_MaBP() . "','" . $this->getMaSoThue() . "','" . $this->getNgayBDHopDong() . "','" . $this->getNgayKTHopDong() . "','" . $this->getPhanTramThang() . "','" . $this->getPhanTramQuy() . "','" . $this->getPhanTramNam() . "','" . $this->getTinhLuong() . "','" . $this->getPhuCapChucVu() . "','" . $this->getBaoHiem() . "','" . $this->getTienAnGiuaCa() . "','" . $this->getPhuCapKhongDongBHXH() . "','" . $this->getThueThuNhap() . "','" . $this->getMaTK1() . "','" . $this->getPhanTramTK() . "','" . $this->getMaTK2() . "','" . $this->getLoaiBP() . "','" . $this->getSapXep() . "','" . $this->getGiamTruGiaCanh() . "','" . $this->getPhiCongDoan() . "','" . $this->getBaoHiemYT() . "','" . $this->getBaoHiemTN() . "','" . $this->getKinhPhiCongDoan() . "','" . $this->getDNBaoHiemXH() . "','" . $this->getDNBaoHiemYT() . "','" . $this->getDNBaoHiemTN() . "' );";
        $this->query($sql);
    }

    public function suaMaNV()
    {
       $sql = "update manhanvien set tennv='" . $this->get_TenNV() . "',tenkd='" . $this->get_TenKD() . "',trinhdo='" . $this->getTrinhDo() . "',socmnd='" . $this->get_SoCMND() . "',diachi='" . $this->get_DiaChi() . "',gioitinh='" . $this->get_GioiTinh() . "',dienthoai='" . $this->get_DienThoai() . "',luongcb='" . $this->get_LuongCB() . "',namsinh='" . $this->get_NamSinh() . "',ghichu='" . $this->get_ChuThich() . "',chucdanh='" . $this->getChucDanh() . "',mabp='" . $this->get_MaBP() . "',masothue='" . $this->getMaSoThue() . "',ngaybdhopdong='" . $this->getNgayBDHopDong() . "',ngaykthopdong='" . $this->getNgayKTHopDong() . "',phantramthang='" . $this->getPhanTramThang() . "',phantramquy='" . $this->getPhanTramQuy() . "',phantramnam='" . $this->getPhanTramNam() . "',tinhluong='" . $this->getTinhLuong() . "',phucapchucvu='" . $this->getPhuCapChucVu() . "',baohiem='" . $this->getBaoHiem() . "',tienangiuaca='" . $this->getTienAnGiuaCa() . "',phucapkhongdungbhxh='" . $this->getPhuCapKhongDongBHXH() . "',thuethunhap='" . $this->getThueThuNhap() . "',matk1='" . $this->getMaTK1() . "',phantramtk='" . $this->getPhanTramTK() . "',matk2='" . $this->getMaTK2() . "',loaibp='" . $this->getLoaiBP() . "',sapxep='" . $this->getSapXep() . "',giamtrugiacanh='" . $this->getGiamTruGiaCanh() . "',phicongdoan ='" . $this->getPhiCongDoan() . "',baohiemyt='" . $this->getBaoHiemYT() . "',baohiemtn ='" . $this->getBaoHiemTN() . "',kinhphicongdoan ='" . $this->getKinhPhiCongDoan() . "',dn_baohiem ='" . $this->getDNBaoHiemXH() . "',
dn_baohiemyt = '" . $this->getDNBaoHiemYT() . "',dn_baohiemtn ='" . $this->getDNBaoHiemTN() . "'
                  WHERE sott = '" . $this->get_SoTT() . "'";
        $this->query($sql);
    }
    public function suaBangLuongMaNV()
    {
        $sql = "update bangluongnhanvien set luongcb='" . $this->get_LuongCB() . "',phucapchucvu='" . $this->getPhuCapChucVu() . "',baohiem='" . $this->getBaoHiem() . "',tienangiuaca='" . $this->getTienAnGiuaCa() . "',phucapkhongdungbhxh='" . $this->getPhuCapKhongDongBHXH() . "',thuethunhap='" . $this->getThueThuNhap() . "',matk1='" . $this->getMaTK1() . "',phantramtk='" . $this->getPhanTramTK() . "',matk2='" . $this->getMaTK2() . "',loaibp='" . $this->getLoaiBP() . "',phicongdoan ='" . $this->getPhiCongDoan() . "',baohiemyt='" . $this->getBaoHiemYT() . "',baohiemtn ='" . $this->getBaoHiemTN() . "',kinhphicongdoan ='" . $this->getKinhPhiCongDoan() . "',dn_baohiem ='" . $this->getDNBaoHiemXH() . "',
dn_baohiemyt = '" . $this->getDNBaoHiemYT() . "',dn_baohiemtn ='" . $this->getDNBaoHiemTN() . "'
                  WHERE sott = '" . $this->get_SoTT() . "'";
        $this->query($sql);
    }

    public function suaTenNV_ChamCong()
    {
        $sql = "update bangcong set tennv='" . $this->get_TenNV() . "'
                  WHERE manv = '" . $this->get_MaNV() . "'";
        $this->query($sql);
    }

    public function xoaMaNV()
    {
        $sql = "delete from manhanvien where sott='" . $this->get_SoTT() . "'";
        $this->query($sql);
    }

    public function xoaBangLuongMaNV()
    {
        $sql = "delete from bangluongnhanvien where sott='" . $this->get_SoTT() . "'";
        $this->query($sql);
    }

    public function themCTLuong()
    {
        $sql = "INSERT INTO chitietluong (sott,socmnd,nam,luong) 
                       VALUES ('" . $this->get_SoTT() . "','" . $this->get_SoCMND() . "', '" . $this->getNam() . "','" . $this->get_LuongCB() . "' );";
        $this->query($sql);
    }

    public function suaCTLuong()
    {
        $sql = "update chitietluong set socmnd='" . $this->get_SoCMND() . "',nam='" . $this->getNam() . "',luong='".$this->get_LuongCB()."'
                  WHERE sott = '" . $this->get_SoTT() . "'";
        $this->query($sql);
    }

    public function xoaCTLuong()
    {
        $sql = "delete from chitietluong where sott='" . $this->get_SoTT() . "'";
        $this->query($sql);
    }

    public function loadListMaNVCTLuong()
    {
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = " and " . $this->get_orderby();
        $sql = "select * from manhanvien inner JOIN manhom on (manhanvien.mabp = manhom.manhom) where 0=0 $sql_w order by manhanvien.sott DESC ";
        $this->query($sql);
        if ($this->num_rows() == 0) {
            return $trees;
        } else {
            $i = 0;
            while ($data = $this->fetch()) {
                $i++;
                $data['STT'] = $i;
                $row[] = $data;
            }
            return $row;
        }
    }

    public function loadListMaNVCTLuong_Form()
    {
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = " and " . $this->get_orderby();
        $sql = "select * from manhanvien inner JOIN chitietluong on (manhanvien.socmnd = chitietluong.socmnd) where 0=0 $sql_w order by chitietluong.sott DESC ";
        $this->query($sql);
        if ($this->num_rows() == 0) {
            return $trees;
        } else {
            $i = 0;
            while ($data = $this->fetch()) {
                $i++;
                $data['STT'] = $i;
                $row[] = $data;
            }
            return $row;
        }
    }

    public function loadListCTLuongNhanVien_CoKeyLaMa()
    {
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = " and " . $this->get_orderby();
        $sql = "select * from chitietluong where 0=0 $sql_w order by sott DESC ";
        $this->query($sql);
        if ($this->num_rows() == 0) {
            return $trees;
        } else {
            $i = 0;
            while ($data = $this->fetch()) {
                $i++;
                $row[$data[socmnd]][$data[nam]] = $data[luong];
            }
            return $row;
        }
    }

    public function CB_ListMaNhanVien_Json(){
        $trees = array();
        $fill = $this->get_orderby();
        if($fill!="")
            $sql_w = " and ".$this->get_orderby();
        $sql="select * from manhanvien where 0=0 $sql_w  order by socmnd DESC" ;
        $this->query($sql);
        $i=0;
        while($data=$this->fetch()){
            $i++;
            $manhom = $data['socmnd'];
            $tennhom = $data['tennv'];
            $trees[]=array($manhom=>$tennhom);
        }
        return $trees;
    }
}

?>
