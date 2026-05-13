<?php

class mact extends database
{
    public $tringorder;

    public $MaCT;
    public $MaCTCha;
    public $TenCT;
    public $TenKD;
    public $MaKH;
    public $DiaChi;
    public $SoHD;
    public $NgayHD;
    public $NgayKC;
    public $NgayHT;
    public $GiaTriHD;
    public $VatLieu;
    public $NhanCong;
    public $May;
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

    public function set_TenCT($TenCT)
    {
        $this->TenCT = $TenCT;
    }

    public function get_TenCT()
    {
        return $this->TenCT;
    }

    public function set_TenKD($TenKD)
    {
        $this->TenKD = $TenKD;
    }

    public function get_TenKD()
    {
        return $this->TenKD;
    }

    public function set_MaKH($MaKH)
    {
        $this->MaKH = $MaKH;
    }

    public function get_MaKH()
    {
        return $this->MaKH;
    }

    public function set_SoHD($SoHD)
    {
        $this->SoHD = $SoHD;
    }

    public function get_SoHD()
    {
        return $this->SoHD;
    }

    public function set_NgayHD($NgayHD)
    {
        $this->NgayHD = $NgayHD;
    }

    public function get_NgayHD()
    {
        return $this->NgayHD;
    }

    public function set_NgayKC($NgayKC)
    {
        $this->NgayKC = $NgayKC;
    }

    public function get_NgayKC()
    {
        return $this->NgayKC;
    }

    public function set_NgayHT($NgayHT)
    {
        $this->NgayHT = $NgayHT;
    }

    public function get_NgayHT()
    {
        return $this->NgayHT;
    }

    public function set_GiaTriHD($GiaTriHD)
    {
        $this->GiaTriHD = $GiaTriHD;
    }

    public function get_GiaTriHD()
    {
        return $this->GiaTriHD;
    }

    public function set_VatLieu($VatLieu)
    {
        $this->VatLieu = $VatLieu;
    }

    public function get_VatLieu()
    {
        return $this->VatLieu;
    }

    public function set_NhanCong($NhanCong)
    {
        $this->NhanCong = $NhanCong;
    }

    public function get_NhanCong()
    {
        return $this->NhanCong;
    }

    public function set_May($May)
    {
        $this->May = $May;
    }

    public function get_May()
    {
        return $this->May;
    }

    public function set_DiaChi($DiaChi)
    {
        $this->DiaChi = $DiaChi;
    }

    public function get_DiaChi()
    {
        return $this->DiaChi;
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
        $sql = "select * from mact where mact='" . $this->get_MaCT() . "' and sott!=" . $this->get_SoTT() . "";
        $this->query($sql);
        if ($this->num_rows() >= 1) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function checkSoHDTrung()
    {
        $sql = "select * from mact where so_hd='" . $this->get_SoHD() . "' and sott!=" . $this->get_SoTT() . "";
        $this->query($sql);
        if ($this->num_rows() >= 1) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function checkXoa()
    {
        $sql = "select * from mact  where mact='" . $this->get_MaCT() . "'";
        $this->query($sql);
        if ($this->num_rows() >= 1) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function checkKeyChaTrung()
    {
        $sql = "select * from mact where mact='" . $this->get_MaCTCha() . "'";
        $this->query($sql);
        if ($this->num_rows() >= 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function createSoTT()
    {
        $sql = "select max(sott) as sott from mact";
        $this->query($sql);
        if ($this->num_rows() == 1) {
            $data = $this->fetch();
            return $data['sott'] + 1;
        } else {
            return 1;
        }
    }

    function loadListMaCT_W()
{
    $trees = array();
    $fill = $this->get_orderby();
    if ($fill != "")
        $sql_w = " and " . $this->get_orderby();
    $sql = "SELECT * FROM mact WHERE 0=0 $sql_w  order by mact";
    $this->query($sql);
    $i = 0;
    while ($data = $this->fetch()) {
        $i++;
        $data['STT'] = $i;
        $trees[] = $data;
    }
    return $trees;
}

    function loadListMaCT_CoKeyLaMa()
    {
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = " and " . $this->get_orderby();
        $sql = "SELECT * FROM mact WHERE 0=0 $sql_w  order by mact";
        $this->query($sql);
        $i = 0;
        while ($data = $this->fetch()) {
            $i++;
            $data['STT'] = $i;
            $trees[$data['mact']] = $data;
        }
        return $trees;
    }

    function loadListMaCT($parentid = 0, $printto = 10)
    {
        //$cb_loaitk = $this->get_Cb_LoaiTK();
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = $this->get_orderby() . " and ";
        $sql = "SELECT * FROM mact WHERE $sql_w mactcha = '$parentid'  order by mact";
        $this->query($sql);
        $i = 0;
        while ($data = $this->fetch()) {
            $i++;
            $data['STT'] = $i;
            //$MaLoaiTK = $data['loaitk'];
            //$data['tenloaitk']=$cb_loaitk[$MaLoaiTK];
            $trees[] = $data;
            $sql1 = "SELECT * FROM mact WHERE $sql_w mactcha ='" . $data['mact'] . "' order by mact ";
            $query = $this->re_query($sql1);
            while ($data1 = $this->re_fetch($query)) {
                if ($printto == 1) {
                    break;
                }
                $i++;
                $data1['STT'] = $i;
                //$MaLoaiTK = $data1['loaitk'];
                //	$data1['tenloaitk']=$cb_loaitk[$MaLoaiTK];
                $trees[] = $data1;
                $sql2 = "SELECT * FROM mact WHERE $sql_w mactcha ='" . $data1['mact'] . "' order by mact ";
                $query1 = $this->re_query($sql2);
                while ($data2 = $this->re_fetch($query1)) {
                    if ($printto == 2) {
                        break;
                    }
                    $i++;
                    $data2['STT'] = $i;
                    //$MaLoaiTK = $data2['loaitk'];
                    //$data2['tenloaitk']=$cb_loaitk[$MaLoaiTK];
                    $trees[] = $data2;
                    $sql3 = "SELECT * FROM mact WHERE $sql_w mactcha ='" . $data2['mact'] . "' order by mact ";
                    $query3 = $this->re_query($sql3);
                    while ($data3 = $this->re_fetch($query3)) {
                        if ($printto == 3) {
                            break;
                        }
                        $i++;
                        $data3['STT'] = $i;
                        //$MaLoaiTK = $data2['loaitk'];
                        //$data2['tenloaitk']=$cb_loaitk[$MaLoaiTK];
                        $trees[] = $data3;
                        $sql4 = "SELECT * FROM mact WHERE $sql_w mactcha ='" . $data3['mact'] . "' order by mact ";
                        $query4 = $this->re_query($sql4);
                        while ($data4 = $this->re_fetch($query4)) {
                            $i++;
                            $data4['STT'] = $i;
                            //$MaLoaiTK = $data2['loaitk'];
                            //$data2['tenloaitk']=$cb_loaitk[$MaLoaiTK];
                            $trees[] = $data4;
                        }
                    }
                }
            }
        }
        return $trees;
    }

    /*public function loadListMaCT(){
        $fill = $this->get_orderby();
            if($fill!="")
                    $sql_w = " and ".$this->get_orderby();
        $sql="select * from mact where 0=0 $sql_w " ;
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

    public function getMaCT()
    {
        $sql = "select * from mact where mact='" . $this->get_MaCT() . "'";
        $this->query($sql);
        if ($this->num_rows() == 0) {
            return 0;
        } else {
            return $this->fetch();
        }
    }


    public function themMaCT()
    {
        $sql = "INSERT INTO mact (sott, mact, tenct,mactcha, makh, diachi, so_hd,ngayhd,ngay_kc,ngay_ht,giatri_hd,vatlieu,nhancong,may,tenkd)
                       VALUES ('" . $this->get_SoTT() . "','" . $this->get_MaCT() . "', '" . $this->get_TenCT() . "','" . $this->get_MaCTCha() . "', '" . $this->get_MaKH() . "','" . $this->get_DiaChi() . "','" . $this->get_SoHD() . "','" . $this->get_NgayHD() . "','" . $this->get_NgayKC() . "','" . $this->get_NgayHT() . "','" . $this->get_GiaTriHD() . "','" . $this->get_VatLieu() . "','" . $this->get_NhanCong() . "','" . $this->get_May() . "', '" . $this->get_TenKD() . "' );";
        $this->query($sql);
    }

    public function suaMaCT()
    {
        $sql = "update mact set mact='" . $this->get_MaCT() . "',tenct='" . $this->get_TenCT() . "',mactcha='" . $this->get_MaCTCha() . "',tenkd='" . $this->get_TenKD() . "',makh='" . $this->get_MaKH() . "',diachi='" . $this->get_DiaChi() . "',so_hd='" . $this->get_SoHD() . "',ngayhd='" . $this->get_NgayHD() . "',ngay_kc='" . $this->get_NgayKC() . "',ngay_ht='" . $this->get_NgayHT() . "',giatri_hd='" . $this->get_GiaTriHD() . "',vatlieu='" . $this->get_VatLieu() . "',nhancong='" . $this->get_NhanCong() . "',may='" . $this->get_May() . "'
                  WHERE sott = '" . $this->get_SoTT() . "'";
        $this->query($sql);
    }

    public function xoaMaCT()
    {
        $sql = "delete from mact where mact='" . $this->get_MaCT() . "'";
        $this->query($sql);
    }

    function loadListMaCTCon($makhcha)
    {
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = " and " . $this->get_orderby();
        $sql = "SELECT mact from mact WHERE mactcha='" . $makhcha . "'";
        $this->query($sql);
        $i = 0;
        $num = $this->num_rows();
        if ($num == 0) {
            return 0;
        } else {
            while ($data = $this->fetch()) {
                $i++;
                $ma = explode("-", $data[mact]);
                $sopt = count($ma) - 1;
                $trees[$ma[$sopt]] = $ma;
            }
            return $trees;
        }
    }
}

?>
