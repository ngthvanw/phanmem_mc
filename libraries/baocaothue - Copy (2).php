<?php

class baocaothue extends database
{
    public $tungay;
    public $Thang_Quy;

    /**
     * @return mixed
     */
    public function getThangQuy()
    {
        return $this->Thang_Quy;
    }

    /**
     * @param mixed $Thang_Quy
     */
    public function setThangQuy($Thang_Quy)
    {
        $this->Thang_Quy = $Thang_Quy;
    }

    public $denngay;
    public $intheothuesuat;
    public $intheochungtu;
    public $sapxeptheohoadon;
    public $theothongtu;
    public $kieuin;
    public $str_Oderby;
    public $str_Oderby2;
    public $tringorder;

    /**
     * @return mixed
     */
    public function getTringorder()
    {
        return $this->tringorder;
    }

    /**
     * @param mixed $tringorder
     */
    public function setTringorder($tringorder)
    {
        $this->tringorder = $tringorder;
    }

    /**
     * @return mixed
     */
    public function getTungay()
    {
        return $this->tungay;
    }

    /**
     * @param mixed $tungay
     */
    public function setTungay($tungay)
    {
        $this->tungay = $tungay;
    }

    /**
     * @return mixed
     */
    public function getDenngay()
    {
        return $this->denngay;
    }

    /**
     * @param mixed $denngay
     */
    public function setDenngay($denngay)
    {
        $this->denngay = $denngay;
    }

    /**
     * @return mixed
     */
    public function getIntheothuesuat()
    {
        return $this->intheothuesuat;
    }

    /**
     * @param mixed $intheothuesuat
     */
    public function setIntheothuesuat($intheothuesuat)
    {
        $this->intheothuesuat = $intheothuesuat;
    }

    /**
     * @return mixed
     */
    public function getIntheochungtu()
    {
        return $this->intheochungtu;
    }

    /**
     * @param mixed $intheochungtu
     */
    public function setIntheochungtu($intheochungtu)
    {
        $this->intheochungtu = $intheochungtu;
    }

    /**
     * @return mixed
     */
    public function getSapxeptheohoadon()
    {
        return $this->sapxeptheohoadon;
    }

    /**
     * @param mixed $sapxeptheohoadon
     */
    public function setSapxeptheohoadon($sapxeptheohoadon)
    {
        $this->sapxeptheohoadon = $sapxeptheohoadon;
    }

    /**
     * @return mixed
     */
    public function getTheothongtu()
    {
        return $this->theothongtu;
    }

    /**
     * @param mixed $theothongtu
     */
    public function setTheothongtu($theothongtu)
    {
        $this->theothongtu = $theothongtu;
    }

    /**
     * @return mixed
     */
    public function getKieuin()
    {
        return $this->kieuin;
    }

    /**
     * @param mixed $kieuin
     */
    public function setKieuin($kieuin)
    {
        $this->kieuin = $kieuin;
    }

    /**
     * @return mixed
     */
    public function getStrOderby()
    {
        return $this->str_Oderby;
    }

    /**
     * @param mixed $str_Oderby
     */
    public function setStrOderby($str_Oderby)
    {
        $this->str_Oderby = $str_Oderby;
    }

    /**
     * @return mixed
     */
    public function getStrOderby2()
    {
        return $this->str_Oderby2;
    }

    /**
     * @param mixed $str_Oderby2
     */
    public function setStrOderby2($str_Oderby2)
    {
        $this->str_Oderby2 = $str_Oderby2;
    }


    public function __construct()
    {
        $this->connect();
    }

    public function __destruct()
    {
        $this->disconnect();
    }

    public function set_str($str)
    {
        $this->str = $str;
    }

    public function get_str()
    {
        return $this->str;
    }

    public function load_danhsach_banra($ListKHCHa,$sapxeptheohoadon)
    {
        $sql = " SELECT seri,sct,ngayhoadon,ngayghiso,tenkh,masothue,tenvt,thanhtien,thue,chuthich,psvt.mapskt,psvt.makh from psvt inner join chitiet_psvt on (psvt.sophieu=chitiet_psvt.sophieu) where loaiphieu=2 and maloai =1 and psvt.loaitokhai!=0  " . $this->getStrOderby() . "
         union all
         SELECT seri,sct,ngayhoadon,ngayghiso,tenkh,masothue,chitiet_pskt.noidung1 as tenvt,gtvnd1 as thanhtien,gtvnd2 as thue,chuthich,pskt.mapskt,pskt.makh from pskt inner join chitiet_pskt on (pskt.sophieu=chitiet_pskt.sophieu) left join mand on (chitiet_pskt.mand1=mand.mand) where pskt.loaiphieu in(1,3,5) and maloai =1 and loaitokhai!=0 " . $this->getStrOderby2() . " 
         order by $sapxeptheohoadon
         ";
        $this->query($sql);
        if ($this->num_rows() == 0) {
            return FALSE;
        } else {
            while ($data = $this->fetch()) {
                if($ListKHCHa!=""){
                    $data['tenkh'] = $ListKHCHa[$data['makh']]['tenkh'];
                    $data['masothue'] = $ListKHCHa[$data['makh']]['masothue'];
                }
                $row[] = $data;
            }
            return $row;
        }
    }

    public function load_danhsach_banra_group($ListKHCHa,$sapxeptheohoadon)
    {
        $sql = " SELECT seri,sct,ngayhoadon,ngayghiso,tenkh,masothue,tenvt,sum(thanhtien) as thanhtien,sum(thue) as thue,chuthich,psvt.mapskt,psvt.makh from psvt inner join chitiet_psvt on (psvt.sophieu=chitiet_psvt.sophieu) where loaiphieu=2 and maloai =1 and psvt.loaitokhai!=0  " . $this->getStrOderby() . " group by chitiet_psvt.sophieu,sct,seri,makh,loaiphieu 
         union all
         SELECT seri,sct,ngayhoadon,ngayghiso,tenkh,masothue,chitiet_pskt.noidung1 as tenvt,sum(gtvnd1) as thanhtien,sum(gtvnd2) as thue,chuthich,pskt.mapskt,pskt.makh from pskt inner join chitiet_pskt on (pskt.sophieu=chitiet_pskt.sophieu) left join mand on (chitiet_pskt.mand1=mand.mand) where pskt.loaiphieu in(1,3,5) and maloai =1 and loaitokhai!=0 " . $this->getStrOderby2() . " group by chitiet_pskt.sophieu,sct,seri,pskt.makh,pskt.loaiphieu 
         order by $sapxeptheohoadon
         ";
        $this->query($sql);
        if ($this->num_rows() == 0) {
            return FALSE;
        } else {
            while ($data = $this->fetch()) {
                if($ListKHCHa!=""){
                    $data['tenkh'] = $ListKHCHa[$data['makh']]['tenkh'];
                    $data['masothue'] = $ListKHCHa[$data['makh']]['masothue'];
                }
                $row[] = $data;
            }
            return $row;
        }
    }

    public function load_danhsach_banra_bosung_group($ListKHCHa,$sapxeptheohoadon)
    {
        $sql = " SELECT seri,sct,ngayhoadon,ngayghiso,tenkh,masothue,tenvt,sum(thanhtien) as thanhtien,sum(thue) as thue,chuthich,psvt.mapskt,psvt.makh from psvt inner join chitiet_psvt on (psvt.sophieu=chitiet_psvt.sophieu) where loaiphieu=2 and maloai =1 and psvt.loaitokhai=0  " . $this->getStrOderby() . " group by chitiet_psvt.sophieu,sct,seri,makh,loaiphieu
                union all
                  SELECT seri,sct,ngayhoadon,ngayghiso,tenkh,masothue,chitiet_pskt.noidung1 as tenvt,sum(gtvnd1) as thanhtien,sum(gtvnd2) as thue,chuthich,pskt.mapskt,pskt.makh from pskt inner join chitiet_pskt on (pskt.sophieu=chitiet_pskt.sophieu) where pskt.loaiphieu in(1,3,5) and maloai =1 and loaitokhai=0 " . $this->getStrOderby2() . " group by chitiet_pskt.sophieu,sct,seri,pskt.makh,pskt.loaiphieu 
         order by $sapxeptheohoadon
         ";
        $this->query($sql);
        if ($this->num_rows() == 0) {
            return FALSE;
        } else {
            while ($data = $this->fetch()) {
                if($ListKHCHa!=""){
                    $data['tenkh'] = $ListKHCHa[$data['makh']]['tenkh'];
                    $data['masothue'] = $ListKHCHa[$data['makh']]['masothue'];
                }
                $row[] = $data;
            }
            return $row;
        }
    }

    public function load_danhsach_banra2_group($ListKHCHa)
    {
        $sql = " SELECT seri,sct,ngayhoadon as ngayghiso,tenkh,masothue,chitiet_pskt.noidung1 as tenvt,sum(gtvnd1) as thanhtien,sum(gtvnd2) as thue,chuthich,pskt.mapskt,pskt.makh from pskt inner join chitiet_pskt on (pskt.sophieu=chitiet_pskt.sophieu) where pskt.loaiphieu in(1,3,5) and maloai =1 " . $this->getStrOderby2() . " group by chitiet_pskt.sophieu,sct,seri,pskt.makh order by ngayghiso,sct ";
        $this->query($sql);
        if ($this->num_rows() == 0) {
            return FALSE;
        } else {
            while ($data = $this->fetch()) {
                if($ListKHCHa!=""){
                    $data['tenkh'] = $ListKHCHa[$data['makh']]['tenkh'];
                    $data['masothue'] = $ListKHCHa[$data['makh']]['masothue'];
                }
                $row[] = $data;
            }
            return $row;
        }
    }

    public function load_danhsach_muavao($SapXep,$ListKHCHa)
    {
        $sql = " SELECT seri,sct,ngayhoadon,ngayghiso,tenkh,thuesuat,masothue,tenvt,thanhtien, thue,chuthich,psvt.mapskt,ngaythanhtoan,psvt.makh from psvt inner join chitiet_psvt on (psvt.sophieu=chitiet_psvt.sophieu) where loaiphieu=1 and maloai =1  " . $this->getStrOderby() . " 
                union all
              SELECT seri,sct,ngayhoadon,ngayghiso,pskt.tenkh,thuesuat1 as thuesuat,masothue,chitiet_pskt.noidung1 as tenvt,gtvnd1 as thanhtien,gtvnd2 as thue,chuthich,pskt.mapskt,ngaythanhtoan,pskt.makh from pskt inner join chitiet_pskt on (pskt.sophieu=chitiet_pskt.sophieu) where pskt.loaiphieu in(2,4,6) and maloai =1 " . $this->getStrOderby2() . "  order by " . $SapXep . ",sct ";
        $this->query($sql);
        if ($this->num_rows() == 0) {
            return FALSE;
        } else {
            $i = 0;
            while ($data = $this->fetch()) {
                $i++;
                $data['timengayghi'] = strtotime($data['ngayghiso']) + $i;
                if($ListKHCHa!=""){
                    $data['tenkh'] = $ListKHCHa[$data['makh']]['tenkh'];
                    $data['masothue'] = $ListKHCHa[$data['makh']]['masothue'];
                }
                $row[] = $data;
            }
            return $row;
        }
    }

    public function load_danhsach_muavao_group($SapXep,$ListKHCHa)
    {
       $sql = " SELECT seri,sct,ngayhoadon,ngayghiso,tenkh,thuesuat,masothue,tenvt,sum(thanhtien) as thanhtien,sum(thue) as thue,chuthich,psvt.mapskt,ngaythanhtoan,psvt.makh,'1331' as matkthue from psvt inner join chitiet_psvt on (psvt.sophieu=chitiet_psvt.sophieu) where loaiphieu=1 and maloai =1 and psvt.loaitokhai!=0  " . $this->getStrOderby() . " group by chitiet_psvt.sophieu,sct,seri,makh,loaiphieu order by $SapXep ";
        $this->query($sql);
        if ($this->num_rows() == 0) {
            return FALSE;
        } else {
            $i = 0;
            while ($data = $this->fetch()) {
                $i++;
                $data['timengayghi'] = strtotime($data['ngayghiso']) + $i;
                if($ListKHCHa!=""){
                    $data['tenkh'] = $ListKHCHa[$data['makh']]['tenkh'];
                    $data['masothue'] = $ListKHCHa[$data['makh']]['masothue'];
                }
                $row[] = $data;
            }
            return $row;
        }
    }

    public function load_danhsach_muavao2_group($SapXep,$ListKHCHa)
    {
        $sql = " SELECT seri,sct,ngayhoadon,ngayghiso,pskt.tenkh,thuesuat1 as thuesuat,masothue,chitiet_pskt.noidung1 as tenvt,sum(gtvnd1) as thanhtien,sum(gtvnd2) as thue,chuthich,pskt.mapskt,ngaythanhtoan,pskt.makh,chitiet_pskt.tkno2 as matkthue from pskt inner join chitiet_pskt on (pskt.sophieu=chitiet_pskt.sophieu) where pskt.loaiphieu in(2,4,6) and maloai =1 and loaitokhai!=0 " . $this->getStrOderby2() . " group by pskt.sophieu,sct,seri,pskt.makh,pskt.loaiphieu,chitiet_pskt.tkno2 order by pskt.loaiphieu," . $SapXep . ",sct";
        $this->query($sql);
        if ($this->num_rows() == 0) {
            return FALSE;
        } else {
            $i = 0;
            while ($data = $this->fetch()) {
                $i++;
                $data['timengayghi'] = strtotime($data['ngayghiso']) + $i;
                if($ListKHCHa!=""){
                    $data['tenkh'] = $ListKHCHa[$data['makh']]['tenkh'];
                    $data['masothue'] = $ListKHCHa[$data['makh']]['masothue'];
                }
                $row[] = $data;
            }
            return $row;
        }
    }

    public function load_danhsach_muavao_group_bosung($SapXep,$ListKHCHa)
    {
        $sql = " SELECT seri,sct,ngayhoadon,ngayghiso,tenkh,thuesuat,masothue,tenvt,sum(thanhtien) as thanhtien,sum(thue) as thue,chuthich,psvt.mapskt,ngaythanhtoan,psvt.makh from psvt inner join chitiet_psvt on (psvt.sophieu=chitiet_psvt.sophieu) where loaiphieu=1 and maloai =1 and psvt.loaitokhai=0  " . $this->getStrOderby() . " group by chitiet_psvt.sophieu,sct,seri,makh,loaiphieu order by $SapXep ";
        $this->query($sql);
        if ($this->num_rows() == 0) {
            return FALSE;
        } else {
            $i = 0;
            while ($data = $this->fetch()) {
                $i++;
                $data['timengayghi'] = strtotime($data['ngayghiso']) + $i;
                if($ListKHCHa!=""){
                    $data['tenkh'] = $ListKHCHa[$data['makh']]['tenkh'];
                    $data['masothue'] = $ListKHCHa[$data['makh']]['masothue'];
                }
                $row[] = $data;
            }
            return $row;
        }
    }

    public function load_danhsach_muavao2_group_bosung($SapXep,$ListKHCHa)
    {
        $sql = " SELECT seri,sct,ngayhoadon,ngayghiso,pskt.tenkh,thuesuat1 as thuesuat,masothue,chitiet_pskt.noidung1 as tenvt,sum(gtvnd1) as thanhtien,sum(gtvnd2) as thue,chuthich,pskt.mapskt,ngaythanhtoan,pskt.makh from pskt inner join chitiet_pskt on (pskt.sophieu=chitiet_pskt.sophieu) where pskt.loaiphieu in(2,4,6) and maloai =1 and loaitokhai=0 " . $this->getStrOderby2() . " group by pskt.sophieu,sct,seri,pskt.makh,pskt.loaiphieu order by " . $SapXep . ",sct";
        $this->query($sql);
        if ($this->num_rows() == 0) {
            return FALSE;
        } else {
            $i = 0;
            while ($data = $this->fetch()) {
                $i++;
                $data['timengayghi'] = strtotime($data['ngayghiso']) + $i;
                if($ListKHCHa!=""){
                    $data['tenkh'] = $ListKHCHa[$data['makh']]['tenkh'];
                    $data['masothue'] = $ListKHCHa[$data['makh']]['masothue'];
                }
                $row[] = $data;
            }
            return $row;
        }
    }


    public function checkTonTaiDuLieu()
    {
        $sql = "select * from tokhaithue where thang='" . $this->getThangQuy() . "'";
        $this->query($sql);
        if ($this->num_rows() >= 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function ThemToKhaiThue($T21, $T22, $T23, $T24, $T25, $T26, $T27, $T28, $T29, $T30, $T31, $T32, $T33, $T34, $T35, $T36, $T37a, $T37b, $T38a, $T38b, $T39, $T40, $T40a, $T40b, $T41, $T42, $T43, $thang,$loaitokhai,$doanhthuthuekhautru,$thuegtgtkhautru,$doanhthuthuedaura,$thuegtgtdaura)// Thêm tờ khai thuế chính thức
    {
        $sqldl = "delete from tokhaithue where thang='" . $thang . "' and loaitokhai='".$loaitokhai."'";
        $this->query($sqldl);
       $sql = "Insert into tokhaithue(matkhai,gthh,thue,thang,loaitokhai) values('A','" . $T21 . "','" . $T21 . "','" . $thang . "','".$loaitokhai."'),
                                                                        ('B','','" . $T22 . "','" . $thang . "','".$loaitokhai."'),
                                                                        ('C','','','" . $thang . "','".$loaitokhai."'),
                                                                        ('I','','','" . $thang . "','".$loaitokhai."'),
                                                                        ('I1','" . $T23 . "','" . $T24 . "','" . $thang . "','".$loaitokhai."'),
                                                                        ('I2','','" . $T25 . "','" . $thang . "','".$loaitokhai."'),
                                                                        ('II','','','" . $thang . "','".$loaitokhai."'),
                                                                        ('II1','" . $T26 . "','','" . $thang . "','".$loaitokhai."'),
                                                                        ('II2','" . $T27 . "','" . $T28 . "','" . $thang . "','".$loaitokhai."'),
                                                                        ('II2a','','" . $T29 . "','" . $thang . "','".$loaitokhai."'),
                                                                        ('II2b','" . $T30 . "','" . $T31 . "','" . $thang . "','".$loaitokhai."'),
                                                                        ('II2c','" . $T32 . "','" . $T33 . "','" . $thang . "','".$loaitokhai."'),
                                                                        ('II3','" . $T34 . "','" . $T35 . "','" . $thang . "','".$loaitokhai."'),
                                                                        ('III','','" . $T36 . "','" . $thang . "','".$loaitokhai."'),
                                                                        ('IV','','','" . $thang . "','".$loaitokhai."'),
                                                                        ('IV1','" . $T37a . "','" . $T37b . "','" . $thang . "','".$loaitokhai."'),
                                                                        ('IV2','" . $T38a . "','" . $T38b . "','" . $thang . "','".$loaitokhai."'),
                                                                        ('V','','" . $T39 . "','" . $thang . "','".$loaitokhai."'),
                                                                        ('VI','','','" . $thang . "','".$loaitokhai."'),
                                                                        ('VI1','','" . $T40a . "','" . $thang . "','".$loaitokhai."'),
                                                                        ('VI2','','" . $T40b . "','" . $thang . "','".$loaitokhai."'),
                                                                        ('VI3','','" . $T40 . "','" . $thang . "','".$loaitokhai."'),
                                                                        ('VI4','','" . $T41 . "','" . $thang . "','".$loaitokhai."'),
                                                                        ('VI41','','" . $T42 . "','" . $thang . "','".$loaitokhai."'),
                                                                        ('VI42','','" . $T43 . "','" . $thang . "','".$loaitokhai."'),
                                                                        ('VI111','" . $doanhthuthuekhautru . "','" . $thuegtgtkhautru . "','" . $thang . "','".$loaitokhai."'),
                                                                        ('VI112','" . $doanhthuthuedaura . "','" . $thuegtgtdaura . "','" . $thang . "','".$loaitokhai."')";
        $this->query($sql);
    }

    public function load_danhsach_tokhai($thang,$loaitokhai)
{
    $sql = "select * from tokhaithue where thang='" . $thang . "' and loaitokhai='".$loaitokhai."'";
    $this->query($sql);
    if ($this->num_rows() == 0) {
        return 0;
    } else {
        $i = 0;
        while ($data = $this->fetch()) {
            $i++;
            $matkhai = $data['matkhai'];
            $row[$matkhai] = $data;
        }
        return $row;
    }
}
    public function load_danhsach_tokhai_thue($thang,$loaitokhai)
    {
        $sql = "select * from tokhaithue where thang='" . $thang . "' and loaitokhai='".$loaitokhai."'";
        $this->query($sql);
        if ($this->num_rows() == 0) {
            return 0;
        } else {
            $i = 0;
            while ($data = $this->fetch()) {
                $i++;
                $matkhai = $data['matkhai'];
                $row[$matkhai] = $data;
            }
            return $row;
        }
    }

    function loadDanhSachSoDuHoaDoan()
    {
        $trees = array();
        //$fill = $this->get_orderby();
        //if($fill!="")
        //$sql_w = " and ".$this->get_orderby() ;
        $sql = "SELECT * from sodu_hoadon_dauky_nhap  WHERE 0=0 and quy='0' and loaiphieu='DK' $sql_w  order by loaphieu";
        $this->query($sql);
        $i = 0;
        while ($data = $this->fetch()) {
            $i++;
            $data['STT'] = $i;
            $trees[] = $data;
        }
        return $trees;
    }

    function loadDanhSachSoDuHoaDoan_trongky()
    {
        $trees = array();
        //$fill = $this->get_orderby();
        //if($fill!="")
        //$sql_w = " and ".$this->get_orderby() ;
        $sql = "SELECT * from sodu_hoadon_dauky_nhap  WHERE 0=0 and quy in ('1','2','3','4') and loaiphieu='TK' $sql_w  order by loaphieu";
        $this->query($sql);
        $i = 0;
        while ($data = $this->fetch()) {
            $i++;
            $data['STT'] = $i;
            $trees[] = $data;
        }
        return $trees;
    }

    function loadDanhSachSoDuHoaDoan_trongky_xoa()
    {
        $trees = array();
        //$fill = $this->get_orderby();
        //if($fill!="")
        //$sql_w = " and ".$this->get_orderby() ;
        $sql = "SELECT * from sodu_hoadon_dauky_nhap  WHERE 0=0 and quy in ('1','2','3','4') and loaiphieu='XOA' $sql_w  order by loaphieu";
        $this->query($sql);
        $i = 0;
        while ($data = $this->fetch()) {
            $i++;
            $data['STT'] = $i;
            $trees[] = $data;
        }
        return $trees;
    }

    function loadDanhSachSoDuHoaDoan_Xoa($quy)
    {
        $trees = array();
        //$fill = $this->get_orderby();
        //if($fill!="")
        //$sql_w = " and ".$this->get_orderby() ;
        $sql = "SELECT * from sodu_hoadon_dauky_nhap  WHERE 0=0 and quy in ($quy) and loaiphieu='XOA' $sql_w  order by loaphieu";
        $this->query($sql);
        $i = 0;
        while ($data = $this->fetch()) {
            $i++;
            $mang_mat="";
            $mang_xoa="";
            $mang_huy="";
            $arr_mat = explode(",",str_replace(";",",",$data['tuso']));
            $arr_xoa = explode(",",str_replace(";",",",$data['denso']));
            $arr_huy = explode(",",str_replace(";",",",$data['huy']));
            $arr_sudung = explode(",",str_replace(";",",",$data['sudung']));
            foreach ($arr_mat as $item_mat){
                $arr_mat1 = explode("-",$item_mat);
                for ($i=min($arr_mat1);$i<=max($arr_mat1);$i++){
                    $mang_mat[]=$i;
                }
            }

            foreach ($arr_xoa as $item_xoa){
                $arr_xoa1 = explode("-",$item_xoa);
                for ($i=min($arr_xoa1);$i<=max($arr_xoa1);$i++){
                    $mang_xoa[]=$i;
                }
            }

            foreach ($arr_huy as $item_huy){
                $arr_huy1 = explode("-",$item_huy);
                for ($i=min($arr_huy1);$i<=max($arr_huy1);$i++){
                    $mang_huy[]=$i;
                }
            }

            foreach ($arr_sudung as $item_sudung){
                $arr_sudung1 = explode("-",$item_sudung);
                for ($i=min($arr_sudung1);$i<=max($arr_sudung1);$i++){
                    $mang_sudung[]= array("kyhieu"=>$data['kyhieu'],"sohoadon"=>$i,"maloai"=>"1","STT"=>"1");
                }
            }

            $data['mat'] = $mang_mat;
            $data['xoa'] = $mang_xoa;
            $data['huy'] = $mang_huy;
            $data['sudung'] = $mang_sudung;
            $trees[$data[kyhieu]] = $data;
        }
        return $trees;
    }

    function loadDanhSachBCHoaDonXuat($TuNgay, $DenNgay)
    {
        $trees = array();
        //$fill = $this->get_orderby();
        //if($fill!="")
        //$sql_w = " and ".$this->get_orderby() ;
        $sql = "SELECT seri as kyhieu,sct as sohoadon,maloai from psvt  WHERE 0=0 and  ngayhoadon>='" . $TuNgay . "' and ngayhoadon<='" . $DenNgay . "' and loaiphieu=2  and  maloai=1 ";
        $this->query($sql);
        $i = 0;
        while ($data = $this->fetch()) {
            $i++;
            $data['STT'] = $i;
            $trees[] = $data;
        }
        return $trees;
    }

    function loadDanhSachBCHoaDon_DauKy_TuBanDauKy($quy)
    {
        $trees = array();
        //$fill = $this->get_orderby();
        //if($fill!="")
        //$sql_w = " and ".$this->get_orderby() ;
        $sql = "SELECT * from sodu_hoadon_dauky_nhap  WHERE 0=0 and quy='".$quy."' and loaiphieu='DK'";
        $this->query($sql);
        $i = 0;
        while ($data = $this->fetch()) {
            $i++;
            $data['STT'] = $i;
            $trees[] = $data;
        }
        return $trees;
    }
    function loadDanhSachBCHoaDon_DauKy_TuBangTK($quy)
    {
        $trees = array();
        //$fill = $this->get_orderby();
        //if($fill!="")
        //$sql_w = " and ".$this->get_orderby() ;
        $sql = "SELECT tontuso as tuso,tondenso as denso,kyhieu,mauso,soquyen,sott from tonkhohoadon  WHERE 0=0 and quy='".$quy."'";
        $this->query($sql);
        $i = 0;
        while ($data = $this->fetch()) {
            $i++;
            $data['STT'] = $i;
            $trees[] = $data;
        }
        return $trees;
    }
    function loadDanhSachBCHoaDonTon($quy)
    {
        $trees = array();
        //$fill = $this->get_orderby();
        //if($fill!="")
        //$sql_w = " and ".$this->get_orderby() ;
        $sql = "SELECT * from tonkhohoadon  WHERE quy='".$quy."'";
        $this->query($sql);
        $i = 0;
        while ($data = $this->fetch()) {
            $i++;
            $data['STT'] = $i;
            $trees[] = $data;
        }
        return $trees;
    }

    function loadDanhSachBCHoaDon_TrongKy($quy)
    {
        $trees = array();
        //$fill = $this->get_orderby();
        //if($fill!="")
        //$sql_w = " and ".$this->get_orderby() ;
        $sql = "SELECT * from sodu_hoadon_dauky_nhap  WHERE 0=0 and  quy='" . $quy . "' and loaiphieu='TK'";
        $this->query($sql);
        $i = 0;
        while ($data = $this->fetch()) {
            $i++;
            $data['STT'] = $i;
            $trees[] = $data;
        }
        return $trees;
    }

    function loadDanhSachBCHoaDonThu($TuNgay, $DenNgay)
    {
        $trees = array();
        //$fill = $this->get_orderby();
        //if($fill!="")
        //$sql_w = " and ".$this->get_orderby() ;
        $sql = "SELECT seri as kyhieu,sct as sohoadon,maloai from chitiet_pskt  WHERE 0=0 and  ngayhoadon>='" . $TuNgay . "' and ngayhoadon<='" . $DenNgay . "' and  maloai=1 and loaiphieu in(1,3) ";
        $this->query($sql);
        $i = 0;
        while ($data = $this->fetch()) {
            $i++;
            $data['STT'] = $i;

            $trees[] = $data;
        }
        return $trees;
    }
    function loadListMaKH_CHA($parentid=0,$printto=10){ // c?p 1 la cha
        //$cb_loaitk = $this->get_Cb_LoaiTK();
        $trees = array();

        $sql = "SELECT * FROM makh WHERE $sql_w makhcha = '$parentid'  order by tenkh DESC ";
        $this->query($sql);
        $i=0;
        while($data=$this->fetch())
        {
            $i++;
            $data['STT']=$i;
            $trees[$data['makh']] = $data;
            $sql1 = "SELECT * FROM makh WHERE $sql_w makhcha ='".$data['makh']."' order by makh ";
            $query = $this->re_query($sql1);
            while($data1=$this->re_fetch($query))
            {
                if($printto==1){
                    break;
                }
                $i++;
                $data['makh1']=$data1['makh'];
                $trees[$data1['makh']] = $data;
                $sql2 = "SELECT * FROM makh WHERE $sql_w makhcha ='".$data1['makh']."' order by makh ";
                $query1 = $this->re_query($sql2);
                while($data2=$this->re_fetch($query1))
                {
                    if($printto==2){
                        break;
                    }
                    $i++;
                    $data2['makh2']=$data2['makh'];
                    $trees[$data2['makh']] = $data;
                    $sql3 = "SELECT * FROM makh WHERE $sql_w makhcha ='".$data2['makh']."' order by makh ";
                    $query3 = $this->re_query($sql3);
                    while($data3=$this->re_fetch($query3))
                    {
                        if($printto==3){
                            break;
                        }
                        $i++;
                        $data3['STT']=$i;
                        $trees[] = $data3;
                        $sql4 = "SELECT * FROM makh WHERE $sql_w makhcha ='".$data3['makh']."' order by makh ";
                        $query4 = $this->re_query($sql4);
                        while($data4=$this->re_fetch($query4))
                        {
                            $i++;
                            $data4['STT']=$i;
                            $trees[] = $data4;
                        }
                    }
                }
            }
        }
        return $trees;
    }
    function loadListMaKH($parentid=0,$printto=10){ // c?p 1 la cha
        //$cb_loaitk = $this->get_Cb_LoaiTK();
        $trees = array();

        $sql = "SELECT * FROM makh WHERE $sql_w makhcha = '$parentid'  order by tenkh DESC ";
        $this->query($sql);
        $i=0;
        while($data=$this->fetch())
        {
            $i++;
            $data['STT']=$i;
            $trees[] = $data;
            $sql1 = "SELECT * FROM makh WHERE $sql_w makhcha ='".$data['makh']."' order by makh ";
            $query = $this->re_query($sql1);
            while($data1=$this->re_fetch($query))
            {
                if($printto==1){
                    break;
                }
                $i++;
                $trees[] = $data1;
                $sql2 = "SELECT * FROM makh WHERE $sql_w makhcha ='".$data1['makh']."' order by makh ";
                $query1 = $this->re_query($sql2);
                while($data2=$this->re_fetch($query1))
                {
                    if($printto==2){
                        break;
                    }
                    $i++;
                    $trees[] = $data2;
                    $sql3 = "SELECT * FROM makh WHERE $sql_w makhcha ='".$data2['makh']."' order by makh ";
                    $query3 = $this->re_query($sql3);
                    while($data3=$this->re_fetch($query3))
                    {
                        if($printto==3){
                            break;
                        }
                        $i++;
                        $data3['STT']=$i;
                        $trees[] = $data3;
                        $sql4 = "SELECT * FROM makh WHERE $sql_w makhcha ='".$data3['makh']."' order by makh ";
                        $query4 = $this->re_query($sql4);
                        while($data4=$this->re_fetch($query4))
                        {
                            $i++;
                            $data4['STT']=$i;
                            $trees[] = $data4;
                        }
                    }
                }
            }
        }
        return $trees;
    }
    function loadDanhSachToKhai_TNDN()
    {
        $trees = array();
        $fill = $this->getStrOderby();
        if($fill!="")
        $sql_w = " and ".$this->getStrOderby() ;
        $sql = "SELECT * from tokhaitndn WHERE 0=0 $sql_w order by sott";
        $this->query($sql);
        $i = 0;
        while ($data = $this->fetch()) {
            $i++;
            $data['STT'] = $i;

            $trees[] = $data;
        }
        return $trees;
    }
    public function createSoTT()
    {
        $sql = "select max(sott) as sott from tokhaitndn";
        $this->query($sql);
        if ($this->num_rows() == 1) {
            $data = $this->fetch();
            return $data['sott'] + 1;
        } else {
            return 1;
        }
    }
    public function createSoTT_SDHD()
    {
        $sql = "select max(sott) as sott from sodu_hoadon_dauky_nhap";
        $this->query($sql);
        if ($this->num_rows() == 1) {
            $data = $this->fetch();
            return $data['sott'] + 1;
        } else {
            return 1;
        }
    }
    function themSoDu_HDDK($sott,$loaiphieu, $soquyen, $kyhieu, $tuso, $denso,$quy,$mauso,$huy,$sudung)
    {
        $sql = "insert into sodu_hoadon_dauky_nhap(sott,kyhieu,tuso,denso,loaiphieu,quy,soquyen,mauso,huy,sudung) values('".$sott."','" . $kyhieu . "','" . $tuso . "','" . $denso . "','" . $loaiphieu . "','" . $quy . "','" . $soquyen . "','" . $mauso . "','".$huy."','".$sudung."')";
        $this->query($sql);
    }

    function xoaSoDu_HDDK($sott)
    {
        $sql = "delete from sodu_hoadon_dauky_nhap where sott=$sott";
        $this->query($sql);
    }
    function suaSoDu_HDDK($sott,$loaiphieu, $soquyen, $kyhieu, $tuso, $denso,$quy,$mauso,$huy,$sudung)
    {
        $sql = "update sodu_hoadon_dauky_nhap set
									kyhieu='" . $kyhieu . "',
									tuso='" . $tuso . "',
									denso='" . $denso . "',
									loaiphieu='" . $loaiphieu . "',
									quy='" . $quy . "',
									soquyen='" . $soquyen . "',
									huy='" . $huy . "',
									mauso='" . $mauso . "',
									sudung='" . $sudung . "'
									where sott='" . $sott . "'";
        $this->query($sql);
    }
    function themToKhai_TNDN($sott,$maso, $chitieu, $machitieu, $sotien, $machitieucha)
    {
        $sql = "insert into tokhaitndn(sott,maso,chitieu,machitieu,sotien,machitieucha) values('".$sott."','" . $maso . "','" . $chitieu . "','" . $machitieu . "','" . $sotien . "','" . $machitieucha . "')";
        $this->query($sql);
    }
    function suaToKhai_TNDN($sott,$maso, $chitieu, $machitieu, $sotien, $machitieucha)
    {
        $sql = "update tokhaitndn set
									maso='" . $maso . "',
									chitieu='" . $chitieu . "',
									machitieu='" . $machitieu . "',
									sotien='" . $sotien . "',
									machitieucha='" . $machitieucha . "'
									where sott='" . $sott . "'";
        $this->query($sql);
    }
}


?>