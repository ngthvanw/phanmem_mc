<?php

class ketoantonghop extends database
{
    public $tungay;
    public $denngay;
    public $intheothuesuat;
    public $intheochungtu;
    public $sapxeptheohoadon;
    public $theothongtu;
    public $kieuin;
    public $str_Oderby;
    public $str_Oderby2;
    public $str_Oderby3;

    /**
     * @return mixed
     */
    public function getStrOderby3()
    {
        return $this->str_Oderby3;
    }

    /**
     * @param mixed $str_Oderby3
     */
    public function setStrOderby3($str_Oderby3)
    {
        $this->str_Oderby3 = $str_Oderby3;
    }

    public $str_Oderby4;

    /**
     * @return mixed
     */
    public function getStrOderby4()
    {
        return $this->str_Oderby4;
    }

    /**
     * @param mixed $str_Oderby4
     */
    public function setStrOderby4($str_Oderby4)
    {
        $this->str_Oderby4 = $str_Oderby4;
    }

    public $str_Oderby5;

    /**
     * @return mixed
     */
    public function getStrOderby5()
    {
        return $this->str_Oderby5;
    }

    /**
     * @param mixed $str_Oderby5
     */
    public function setStrOderby5($str_Oderby5)
    {
        $this->str_Oderby5 = $str_Oderby5;
    }

    /**
     * @return mixed
     */
    public $str_Oderby6;

    /**
     * @return mixed
     */
    public function getStrOderby6()
    {
        return $this->str_Oderby6;
    }

    /**
     * @param mixed $str_Oderby6
     */
    public function setStrOderby6($str_Oderby6)
    {
        $this->str_Oderby6 = $str_Oderby6;
    }

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

    public $tringorder;

    public function set_orderby($string)
    {
        $this->tringorder = $string;
    }

    public function get_orderby()
    {
        return $this->tringorder;
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

    public function load_danhsach_banra()
    {
        $sql = "SELECT seri,sct,ngayghiso,tenkh,masothue,tenvt,thanhtien,thue,chuthich from psvt inner join chitiet_psvt on (psvt.sophieu=chitiet_psvt.sophieu) where loaiphieu=2  " . $this->getStrOderby() . "
                  UNION ALL
                  SELECT seri,sct,ngayghiso,tenkh,masothue,chuthich,gtvnd1 as thanhtien,gtvnd2 as thue,chuthich from pskt inner join chitiet_pskt on (pskt.sophieu=chitiet_pskt.sophieu) where pskt.loaiphieu in(1,4) " . $this->getStrOderby2();
        $this->query($sql);
        if ($this->num_rows() == 0) {
            return FALSE;
        } else {
            while ($data = $this->fetch()) {
                $row[] = $data;
            }
            return $row;
        }
    }

    public function load_danhsach_sonhatky_chi()
    {
        $sql = "
                    SELECT 2 as phanloai,psvt.mapskt as sophieu,psvt.noidung as noidung1,ghichu1 as noidung2,psvt.ngayghiso,psvt.seri,psvt.ngayhoadon,ghichu1 as ghichu,dinhkhoan_psvt.tkno as tk,dinhkhoan_psvt.sotien as tienno ,0 as tienno4,dinhkhoan_psvt.tkco as tk1,0 as tk2,dinhkhoan_psvt.sotien as tienco1,0 as tienco2 FROM psvt INNER JOIN dinhkhoan_psvt on(psvt.sophieu=dinhkhoan_psvt.sophieu) where psvt.loaiphieu in(1)
                  UNION ALL
                    SELECT 2 as phanloai,pskt.mapskt as sophieu,noidung1,noidung2,pskt.ngayghiso,chitiet_pskt.seri,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,pskt.tkco as tk,chitiet_pskt.gtvnd1 as tienco,chitiet_pskt.gtvnd2 as tienco4,chitiet_pskt.tkno1 as tk1,chitiet_pskt.tkno2 as tk2,chitiet_pskt.gtvnd1 as tienno1,chitiet_pskt.gtvnd2 as tienno2 FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where pskt.loaiphieu in(2,4,6,8,10,12,14,16,18,20,22,24,26,28,30,32,34,36,38,40,42,44,46,48,50,52,54,56,58,60,62,64,66,68,70,72,74,76,78,80,82,84,86,88,90,92,94)  " . $this->getStrOderby();

        $this->query($sql);
        if ($this->num_rows() == 0) {
            return FALSE;
        } else {
            $i = 0;
            while ($data = $this->fetch()) {
                $i = $i + 2;
                $data['timengayghi'] = strtotime($data['ngayghiso']) + $i;
                $row[$data['timengayghi']] = $data;
            }
            return $row;
        }
    }

    public function load_danhsach_sonhatky_thu()
    {
        $sql = "  SELECT 1 as phanloai,psvt.mapskt as sophieu,psvt.noidung as noidung1,ghichu1 as noidung2,psvt.ngayghiso,psvt.seri,psvt.ngayhoadon,ghichu1 as ghichu,dinhkhoan_psvt.tkno as tk,dinhkhoan_psvt.sotien as tienno ,0 as tienno4,dinhkhoan_psvt.tkco as tk1,0 as tk2,dinhkhoan_psvt.sotien as tienco1,0 as tienco2 FROM psvt INNER JOIN dinhkhoan_psvt on(psvt.sophieu=dinhkhoan_psvt.sophieu) where psvt.loaiphieu in(2,3)
                UNION ALL
                  SELECT 1 as phanloai,pskt.mapskt as sophieu,noidung1,noidung2,pskt.ngayghiso,chitiet_pskt.seri,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,pskt.tkco as tk,chitiet_pskt.gtvnd1 as tienno,chitiet_pskt.gtvnd2 as tienno4,chitiet_pskt.tkno1 as tk1,chitiet_pskt.tkno2 as tk2,chitiet_pskt.gtvnd1 as tienco1,chitiet_pskt.gtvnd2 as tienco2 FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where pskt.loaiphieu in(1,3,5,7,9,11,13,15,17,19,21,23,25,27,29,31,33,35,37,39,41,43,45,47,49,51,53,55,57,59,61,63,65,67,69,71,73,75,77,79,81,83,85,87,89,91,93)  " . $this->getStrOderby();
        $this->query($sql);
        if ($this->num_rows() == 0) {
            return FALSE;
        } else {
            $i = 0;
            while ($data = $this->fetch()) {
                $i++;
                $data['timengayghi'] = strtotime($data['ngayghiso']) + $i;
                $row[$data['timengayghi']] = $data;
            }
            return $row;
        }
    }

////// Lấy số đầu kỳ cho bảng cd kế toán từ bảng kế toán-------------------
    public function load_danhsach_bangcdtk()
    {
        $sql = "SELECT * from bangcdtk ";
        $this->query($sql);
        if ($this->num_rows() == 0) {
            return FALSE;
        } else {
            $i = 0;
            while ($data = $this->fetch()) {
                $i++;
                $row[$data['matk']] = $data;
            }
            return $row;
        }
    }

    public function load_danhsach_bangcdtk_tt200()
    {
        $sql = "SELECT * from bangcdtk ";
        $this->query($sql);
        if ($this->num_rows() == 0) {
            return FALSE;
        } else {
            $i = 0;
            while ($data = $this->fetch()) {
                $i++;
                $row[$data['matk']][0] = $data;
            }
            return $row;
        }
    }
////// End Lấy số đầu kỳ cho bảng cd kế toán từ bảng kế toán-------------------
////////// Lấy nợ có cho bảng cân đối tài khoản

    public function load_danhsach_cobangcdtk()
    {
        $sql = "SELECT pskt.tkco as tk,chitiet_pskt.gtvnd1 as tienco,chitiet_pskt.gtvnd2 as tienco4,chitiet_pskt.tkno1 as tk1,chitiet_pskt.tkno2 as tk2,chitiet_pskt.gtvnd1 as tienno1,chitiet_pskt.gtvnd2 as tienno2 FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where pskt.loaiphieu in(2,4,6,8,10,12,14,16,18,20,22,24,26,28,30,32,34,36,38,40,42,44,46,48,50,52,54,56,58,60,62,64)  " . $this->getStrOderby() . "
                union all
                SELECT dinhkhoan_psvt.tkco as tk,dinhkhoan_psvt.sotien as tienco,0 as tienco4,dinhkhoan_psvt.tkno as tk1,0 as tk2,dinhkhoan_psvt.sotien , 0 as tienno2 FROM psvt INNER JOIN dinhkhoan_psvt on(psvt.sophieu=dinhkhoan_psvt.sophieu) where psvt.loaiphieu in(2)  " . $this->getStrOderby();

        $this->query($sql);
        if ($this->num_rows() == 0) {
            return FALSE;
        } else {
            $i = 0;
            while ($data = $this->fetch()) {
                $i = $i + 2;
                $data['timengayghi'] = strtotime($data['ngayghiso']) + $i;
                $row[$data['timengayghi']] = $data;
            }
            return $row;
        }
    }

    public function load_danhsach_nobangcdtk()
    {
        $sql = "SELECT pskt.tkco as tk,chitiet_pskt.gtvnd1 as tienno,chitiet_pskt.gtvnd2 as tienno4,chitiet_pskt.tkno1 as tk1,chitiet_pskt.tkno2 as tk2,chitiet_pskt.gtvnd1 as tienco1,chitiet_pskt.gtvnd2 as tienco2 FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where pskt.loaiphieu in(1,3,5,7,9,11,13,15,17,19,21,23,25,27,29,31,33,35,37,39,41,43,45,47,49,51,53,55,57,59,61,63,89)  " . $this->getStrOderby() . "
                union all
                SELECT dinhkhoan_psvt.tkco as tk,dinhkhoan_psvt.sotien as tienco,0 as tienco4,dinhkhoan_psvt.tkno as tk1,0 as tk2,dinhkhoan_psvt.sotien , 0 as tienno2 FROM psvt INNER JOIN dinhkhoan_psvt on(psvt.sophieu=dinhkhoan_psvt.sophieu) where psvt.loaiphieu in(1)  " . $this->getStrOderby();
        $this->query($sql);
        if ($this->num_rows() == 0) {
            return FALSE;
        } else {
            $i = 0;
            while ($data = $this->fetch()) {
                $i++;
                $data['timengayghi'] = strtotime($data['ngayghiso']) + $i;
                $row[$data['timengayghi']] = $data;
            }
            return $row;
        }
    }

///////////Kết thúc cho bảng cân đối tài khoản
    public function load_danhsach_socai_dauky($matk)
    {
        $sql = "SELECT * FROM sdtkdk where matk in (" . $matk . ") ";
        $result = $this->re_query($sql);
        while ($data = $this->re_fetch($result)) {
            $trees[$data['matk']] = $data;
        }
        return $trees;
    }

    public function load_danhsach_socai_dk_chitiet_theoCT()
    {
        $sql = "SELECT mact,soduno as tienno,soduco as tienco FROM cpdodangdk";
        $result = $this->re_query($sql);
        while ($data = $this->re_fetch($result)) {
            $trees[$data['mact']] = $data;
        }
        return $trees;
    }

    public function load_danhsach_socai_dk_chitiet_theoCT_241()
    {
        $sql = "SELECT mabp as mact,sum(giatriconlai) as tienno,0 as tienco,matk FROM pscptt where tanggiam=0 and substring(matk,1,3)='241' and mabp!='0001' group by matk,mabp";
        $result = $this->re_query($sql);
        while ($data = $this->re_fetch($result)) {
            $trees[$data['matk']][$data['mact']] = $data;
        }
        return $trees;
    }

    public function load_danhsach_taikhoannoco_bangcdkt($matk, $theonoidung, $sapxep)
    {// Lấy danh sách phiếu chi trong sổ cái
        if ($theonoidung == 'ALL') {
            $sql_mand1 = " ";
            $sql_mand2 = " ";
        } else {
            $sql_mand1 = " and mand1='" . $theonoidung . "'";
            $sql_mand2 = " and mand2='" . $theonoidung . "'";
            $sql_mand3 = " and mand='" . $theonoidung . "'";
        }
        $sql = "SELECT pskt.loaiphieu,pskt.tkco as tk,chitiet_pskt.mapskt as sophieu,noidung1 as noidung,mand1 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,(chitiet_pskt.gtvnd1) as tienco,0 as tienno,chitiet_pskt.tkno1 as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where   pskt.loaiphieu in(2,4,6,8,10,12,14,16,18,20,22,24,26,28,30,32,34,36,38,40,42,44,46,48,50,52,54,56,58,60,62,64,66,68) and mabp!='' $sql_mand1  " . $this->getStrOderby() . "
        union all
            SELECT pskt.loaiphieu,pskt.tkco as tk,chitiet_pskt.mapskt as sophieu,noidung2 as noidung,mand2 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,chitiet_pskt.gtvnd2 as tienco,0 as tienno,chitiet_pskt.tkno2 as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  chitiet_pskt.tkno2!=0 and pskt.loaiphieu in(2,4,6,8,10,12,14,16,18,20,22,24,26,28,30,32,34,36,38,40,42,44,46,48,50,52,54,56,58,60,62,64,66,68) and mabp!='' $sql_mand2  " . $this->getStrOderby() . " 
        union all
            SELECT pskt.loaiphieu,tkno1 as tk,chitiet_pskt.mapskt as sophieu,noidung1 as noidung,mand1 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,chitiet_pskt.gtvnd1 as tienco,0 as tienno,pskt.tkco as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  pskt.loaiphieu in(1,3,5,7,9,11,13,15,17,19,21,23,25,27,29,31,33,35,37,39,41,43,45,47,49,51,53,55,57,59,61,63,65,67,69,71,73,75,77,79,81,83,85,87,89) and mabp!='' $sql_mand1  " . $this->getStrOderby() . " 
        union all
            SELECT pskt.loaiphieu,tkno2 as tk,chitiet_pskt.mapskt as sophieu,noidung2 as noidung,mand2 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,chitiet_pskt.gtvnd2 as tienco,0 as tienno,pskt.tkco as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  pskt.loaiphieu in(1,3,5,7,9,11,13,15,17,19,21,23,25,27,29,31,33,35,37,39,41,43,45,47,49,51,53,55,57,59,61,63,65,67,69,71,73,75,77,79,81,83,85,87,89) and mabp!='' $sql_mand2  " . $this->getStrOderby() . "
        union all
            SELECT pskt.loaiphieu,pskt.tkco as tk,chitiet_pskt.mapskt as sophieu,noidung1 as noidung,mand1 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,0 as tienco,chitiet_pskt.gtvnd1 as tienno,chitiet_pskt.tkno1 as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  pskt.loaiphieu in(1,3,5,7,9,11,13,15,17,19,21,23,25,27,29,31,33,35,37,39,41,43,45,47,49,51,53,55,57,59,61,63,65,67,69,71,73,75,77,79,81,83,85,87,89) and mabp!=''  $sql_mand1  " . $this->getStrOderby() . "
        union all
            SELECT pskt.loaiphieu,pskt.tkco as tk,chitiet_pskt.mapskt as sophieu,noidung2 as noidung,mand2 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,0 as tienco,chitiet_pskt.gtvnd2 as tienno,chitiet_pskt.tkno2 as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  chitiet_pskt.tkno2!=0 and pskt.loaiphieu in(1,3,5,7,9,11,13,15,17,19,21,23,25,27,29,31,33,35,37,39,41,43,45,47,49,51,53,55,57,59,61,63,65,67,69,71,73,75,77,79,81,83,85,87,89) and mabp!='' $sql_mand2 " . $this->getStrOderby() . "
        union all
            SELECT pskt.loaiphieu,tkno1 as tk,chitiet_pskt.mapskt as sophieu,noidung1 as noidung,mand1 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,0 as tienco,chitiet_pskt.gtvnd1 as tienno,pskt.tkco as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  pskt.loaiphieu in(2,4,6,8,10,12,14,16,18,20,22,24,26,28,30,32,34,36,38,40,42,44,46,48,50,52,54,56,58,60,62,64,66,68) and mabp!=''  $sql_mand1  " . $this->getStrOderby() . "
        union all
            SELECT pskt.loaiphieu,tkno2 as tk,chitiet_pskt.mapskt as sophieu,noidung2 as noidung,mand2 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,0 as tienco,chitiet_pskt.gtvnd2 as tienno,pskt.tkco as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  pskt.loaiphieu in(2,4,6,8,10,12,14,16,18,20,22,24,26,28,30,32,34,36,38,40,42,44,46,48,50,52,54,56,58,60,62,64,66,68) and mabp!=''  $sql_mand2 " . $this->getStrOderby() . "
        union all
            SELECT psvt.loaiphieu,dinhkhoan_psvt.tkno as tk,mapskt as sophieu,noidung as noidung,mand as mand,ngayghiso,sct,ngayhoadon,chuthich,0 as tienco,sotien as tienno,dinhkhoan_psvt.tkco as tkdu,MONTH(ngayghiso) as thang,dinhkhoan_psvt.sott FROM psvt INNER JOIN dinhkhoan_psvt on(psvt.sophieu=dinhkhoan_psvt.sophieu) where 0=0   $sql_mand3 " . $this->getStrOderby2() . "
        union all
            SELECT psvt.loaiphieu,dinhkhoan_psvt.tkco as tk,mapskt as sophieu,noidung as noidung,mand as mand,ngayghiso,sct,ngayhoadon,chuthich,sotien as tienco,0 as tienno,dinhkhoan_psvt.tkno as tkdu,MONTH(ngayghiso) as thang,dinhkhoan_psvt.sott FROM psvt INNER JOIN dinhkhoan_psvt on(psvt.sophieu=dinhkhoan_psvt.sophieu) where 0=0  $sql_mand3 " . $this->getStrOderby2() . "
order by $sapxep,sophieu";


        $this->query($sql);
        $row = array();
        $i = 0;
        while ($data = $this->fetch()) {
            $tk = $data['tk'];
            $tkdu = $data['tkdu'];
            if ($data['tkdu'] == "1331") {
                if ($data['mand'] == "") {
                    $data['noidung'] = "Thuế GTGT đầu vào";
                    $data['mand'] = "100000";
                }
            }
            if ($data['tkdu'] == "1332") {
                if ($data['mand'] == "") {
                    $data['noidung'] = "Thuế GTGT được khấu trừ của TSCĐ";
                }
            }
            if ($data['tkdu'] == "33311") {
                if ($data['mand'] == "") {
                    $data['noidung'] = "Thuế GTGT đầu ra";
                    $data['mand'] = "100001";
                }
            }
            if ($data['tkdu'] == "33312") {
                if ($data['mand'] == "") {
                    $data['noidung'] = "Thuế GTGT hàng hóa nhập khẩu";
                }
            }
            $row[$tk][] = $data;
        }
        return $row;


    }

    public function load_danhsach_socai_theotk_no_co($matk_str, $theonoidung, $tkdu)
    {// Lấy danh sách phiếu chi trong sổ cái
        $matk_arr = explode(",", $matk_str);
        $matk = implode("','", $matk_arr);
        $tkdu = str_replace(",", "','", $tkdu);
        if ($theonoidung == 'ALL') {
            $sql_mand1 = " ";
            $sql_mand2 = " ";
        } else {
            $sql_mand1 = " and mand1='" . $theonoidung . "'";
            $sql_mand2 = " and mand2='" . $theonoidung . "'";
            $sql_mand3 = " and mand='" . $theonoidung . "'";
        }
        $sql = "
				SELECT pskt.loaiphieu,pskt.tkco as tk,chitiet_pskt.mapskt as sophieu,noidung1 as noidung,mand1 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,sum(chitiet_pskt.gtvnd1) as tienco,0 as tienno,chitiet_pskt.tkno1 as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where chitiet_pskt.tkno1 in ('" . $tkdu . "') and   pskt.loaiphieu in(2,4,6,8,10,12,14,16,18,20,22,24,26,28,30,32,34,36,38,40,42,44,46,48,50,52,54,56,58,60,62,64,66,68,70) and pskt.tkco in ('" . $matk . "') $sql_mand1  " . $this->getStrOderby() . " group by pskt.tkco
                union all
                    SELECT pskt.loaiphieu,pskt.tkco as tk,chitiet_pskt.mapskt as sophieu,noidung2 as noidung,mand2 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,sum(chitiet_pskt.gtvnd2) as tienco,0 as tienno,chitiet_pskt.tkno2 as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where chitiet_pskt.tkno2 in ('" . $tkdu . "') and  chitiet_pskt.tkno2!=0 and pskt.loaiphieu in(2,4,6,8,10,12,14,16,18,20,22,24,26,28,30,32,34,36,38,40,42,44,46,48,50,52,54,56,58,60,62,64,66,68,70) and pskt.tkco in ('" . $matk . "') $sql_mand2  " . $this->getStrOderby() . " group by pskt.tkco
                union all
                    SELECT pskt.loaiphieu,tkno1 as tk,chitiet_pskt.mapskt as sophieu,noidung1 as noidung,mand1 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,sum(chitiet_pskt.gtvnd1) as tienco,0 as tienno,pskt.tkco as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where pskt.tkco in('" . $tkdu . "') and  pskt.loaiphieu in(1,3,5,7,9,11,13,15,17,19,21,23,25,27,29,31,33,35,37,39,41,43,45,47,49,51,53,55,57,59,61,63,65,67,69,71,73,75,77,79,81,83,85,87,89,91) and tkno1 in ('" . $matk . "') $sql_mand1  " . $this->getStrOderby() . "  group by tkno1
                union all
                    SELECT pskt.loaiphieu,tkno2 as tk,chitiet_pskt.mapskt as sophieu,noidung2 as noidung,mand2 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,sum(chitiet_pskt.gtvnd2) as tienco,0 as tienno,pskt.tkco as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where pskt.tkco in('" . $tkdu . "') and  pskt.loaiphieu in(1,3,5,7,9,11,13,15,17,19,21,23,25,27,29,31,33,35,37,39,41,43,45,47,49,51,53,55,57,59,61,63,65,67,69,71,73,75,77,79,81,83,85,87,89,91) and tkno2 in ('" . $matk . "') $sql_mand2  " . $this->getStrOderby() . " group by  pskt.tkco
                union all
                    SELECT pskt.loaiphieu,pskt.tkco as tk,chitiet_pskt.mapskt as sophieu,noidung1 as noidung,mand1 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,0 as tienco,sum(chitiet_pskt.gtvnd1) as tienno,chitiet_pskt.tkno1 as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where chitiet_pskt.tkno1 in('" . $tkdu . "') and  pskt.loaiphieu in(1,3,5,7,9,11,13,15,17,19,21,23,25,27,29,31,33,35,37,39,41,43,45,47,49,51,53,55,57,59,61,63,65,67,69,71,73,75,77,79,81,83,85,87,89,91) and pskt.tkco in ('" . $matk . "') $sql_mand1  " . $this->getStrOderby() . " group by pskt.tkco
                union all
                    SELECT pskt.loaiphieu,pskt.tkco as tk,chitiet_pskt.mapskt as sophieu,noidung2 as noidung,mand2 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,0 as tienco,sum(chitiet_pskt.gtvnd2) as tienno,chitiet_pskt.tkno2 as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where chitiet_pskt.tkno2 in ('" . $tkdu . "') and  chitiet_pskt.tkno2!=0 and pskt.loaiphieu in(1,3,5,7,9,11,13,15,17,19,21,23,25,27,29,31,33,35,37,39,41,43,45,47,49,51,53,55,57,59,61,63,65,67,69,71,73,75,77,79,81,83,85,87,89,91) and pskt.tkco in ('" . $matk . "') $sql_mand2 " . $this->getStrOderby() . " group by pskt.tkco
                union all
                    SELECT pskt.loaiphieu,tkno1 as tk,chitiet_pskt.mapskt as sophieu,noidung1 as noidung,mand1 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,0 as tienco,sum(chitiet_pskt.gtvnd1) as tienno,pskt.tkco as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where pskt.tkco in('" . $tkdu . "') and  pskt.loaiphieu in(2,4,6,8,10,12,14,16,18,20,22,24,26,28,30,32,34,36,38,40,42,44,46,48,50,52,54,56,58,60,62,64,66,68,70) and tkno1 in ('" . $matk . "') $sql_mand1  " . $this->getStrOderby() . "  group by tkno1
                union all
                    SELECT pskt.loaiphieu,tkno2 as tk,chitiet_pskt.mapskt as sophieu,noidung2 as noidung,mand2 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,0 as tienco,sum(chitiet_pskt.gtvnd2) as tienno,pskt.tkco as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where pskt.tkco in('" . $tkdu . "') and  pskt.loaiphieu in(2,4,6,8,10,12,14,16,18,20,22,24,26,28,30,32,34,36,38,40,42,44,46,48,50,52,54,56,58,60,62,64,66,68,70) and tkno2 in ('" . $matk . "') $sql_mand2 " . $this->getStrOderby() . " group by tkno2
                union all
                    SELECT psvt.loaiphieu,dinhkhoan_psvt.tkno as tk,mapskt as sophieu,noidung as noidung,mand as mand,ngayghiso,sct,ngayhoadon,chuthich,0 as tienco,sum(sotien) as tienno,dinhkhoan_psvt.tkco as tkdu,MONTH(ngayghiso) as thang,dinhkhoan_psvt.sott FROM psvt INNER JOIN dinhkhoan_psvt on(psvt.sophieu=dinhkhoan_psvt.sophieu) where dinhkhoan_psvt.tkco in ('" . $tkdu . "') and dinhkhoan_psvt.tkno in ('" . $matk . "') $sql_mand3 " . $this->getStrOderby2() . " group by dinhkhoan_psvt.tkno
                union all
                    SELECT psvt.loaiphieu,dinhkhoan_psvt.tkco as tk,mapskt as sophieu,noidung as noidung,mand as mand,ngayghiso,sct,ngayhoadon,chuthich,sum(sotien) as tienco,0 as tienno,dinhkhoan_psvt.tkno as tkdu,MONTH(ngayghiso) as thang,dinhkhoan_psvt.sott FROM psvt INNER JOIN dinhkhoan_psvt on(psvt.sophieu=dinhkhoan_psvt.sophieu) where dinhkhoan_psvt.tkno in('" . $tkdu . "') and dinhkhoan_psvt.tkco in ('" . $matk . "') $sql_mand3 " . $this->getStrOderby2() . " group by dinhkhoan_psvt.tkco";

        $this->query($sql);
        $row = array();
        $i = 0;
        while ($data = $this->fetch()) {
            $tk = $data['tk'];
            $tienco = 0;
            $tienno = 0;
            if (array_key_exists($tk, $row)) {
                $tienco = $row[$tk][tienco] + $data[tienco];
                $tienno = $row[$tk][tienno] + $data[tienno];
            } else {
                $tienco = $data[tienco];
                $tienno = $data[tienno];
            }
            $row[$tk] = $data;
            $row[$tk][tienco] = $tienco;
            $row[$tk][tienno] = $tienno;
        }
        return $row;

    }


    public function load_danhsach_socai_dk_theotk($matk_str, $theonoidung, $sapxep)
    {// Lấy danh sách phiếu chi trong sổ cái
        $matk_arr = explode(",", $matk_str);
        $matk = implode("','", $matk_arr);
        if ($theonoidung == 'ALL') {
            $sql_mand1 = " ";
            $sql_mand2 = " ";
        } else {
            $sql_mand1 = " and mand1='" . $theonoidung . "'";
            $sql_mand2 = " and mand2='" . $theonoidung . "'";
            $sql_mand3 = " and mand='" . $theonoidung . "'";
        }
        $sql = " SELECT 0 as loaiphieu,matk as tk,0 as sophieu,0 as noidung, 0 as mand, 0 as ngayghiso,0 as sct,0 as ngayhoadon,0 as chuthich,soduco as tienco,soduno as tienno,0 as tkdu,0 as thang,0 as sott FROM sdtkdk where matk in ('" . $matk . "') group by matk
				union all
				SELECT pskt.loaiphieu,pskt.tkco as tk,chitiet_pskt.mapskt as sophieu,noidung1 as noidung,mand1 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,sum(chitiet_pskt.gtvnd1) as tienco,0 as tienno,chitiet_pskt.tkno1 as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where   pskt.loaiphieu in(2,4,6,8,10,12,14,16,18,20,22,24,26,28,30,32,34,36,38,40,42,44,46,48,50,52,54,56,58,60,62,64,66,68,70) and pskt.tkco in ('" . $matk . "') $sql_mand1  " . $this->getStrOderby() . " group by pskt.tkco
                union all
                    SELECT pskt.loaiphieu,pskt.tkco as tk,chitiet_pskt.mapskt as sophieu,noidung2 as noidung,mand2 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,sum(chitiet_pskt.gtvnd2) as tienco,0 as tienno,chitiet_pskt.tkno2 as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  chitiet_pskt.tkno2!=0 and pskt.loaiphieu in(2,4,6,8,10,12,14,16,18,20,22,24,26,28,30,32,34,36,38,40,42,44,46,48,50,52,54,56,58,60,62,64,66,68,70) and pskt.tkco in ('" . $matk . "') $sql_mand2  " . $this->getStrOderby() . " group by pskt.tkco
                union all
                    SELECT pskt.loaiphieu,tkno1 as tk,chitiet_pskt.mapskt as sophieu,noidung1 as noidung,mand1 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,sum(chitiet_pskt.gtvnd1) as tienco,0 as tienno,pskt.tkco as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  pskt.loaiphieu in(1,3,5,7,9,11,13,15,17,19,21,23,25,27,29,31,33,35,37,39,41,43,45,47,49,51,53,55,57,59,61,63,65,67,69,71,73,75,77,79,81,83,85,87,89,91) and tkno1 in ('" . $matk . "') $sql_mand1  " . $this->getStrOderby() . "  group by tkno1
                union all
                    SELECT pskt.loaiphieu,tkno2 as tk,chitiet_pskt.mapskt as sophieu,noidung2 as noidung,mand2 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,sum(chitiet_pskt.gtvnd2) as tienco,0 as tienno,pskt.tkco as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  pskt.loaiphieu in(1,3,5,7,9,11,13,15,17,19,21,23,25,27,29,31,33,35,37,39,41,43,45,47,49,51,53,55,57,59,61,63,65,67,69,71,73,75,77,79,81,83,85,87,89,91) and tkno2 in ('" . $matk . "') $sql_mand2  " . $this->getStrOderby() . " group by  pskt.tkco
                union all
                    SELECT pskt.loaiphieu,pskt.tkco as tk,chitiet_pskt.mapskt as sophieu,noidung1 as noidung,mand1 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,0 as tienco,sum(chitiet_pskt.gtvnd1) as tienno,chitiet_pskt.tkno1 as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  pskt.loaiphieu in(1,3,5,7,9,11,13,15,17,19,21,23,25,27,29,31,33,35,37,39,41,43,45,47,49,51,53,55,57,59,61,63,65,67,69,71,73,75,77,79,81,83,85,87,89,91) and pskt.tkco in ('" . $matk . "') $sql_mand1  " . $this->getStrOderby() . " group by pskt.tkco
                union all
                    SELECT pskt.loaiphieu,pskt.tkco as tk,chitiet_pskt.mapskt as sophieu,noidung2 as noidung,mand2 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,0 as tienco,sum(chitiet_pskt.gtvnd2) as tienno,chitiet_pskt.tkno2 as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  chitiet_pskt.tkno2!=0 and pskt.loaiphieu in(1,3,5,7,9,11,13,15,17,19,21,23,25,27,29,31,33,35,37,39,41,43,45,47,49,51,53,55,57,59,61,63,65,67,69,71,73,75,77,79,81,83,85,87,89,91) and pskt.tkco in ('" . $matk . "') $sql_mand2 " . $this->getStrOderby() . " group by pskt.tkco
                union all
                    SELECT pskt.loaiphieu,tkno1 as tk,chitiet_pskt.mapskt as sophieu,noidung1 as noidung,mand1 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,0 as tienco,sum(chitiet_pskt.gtvnd1) as tienno,pskt.tkco as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  pskt.loaiphieu in(2,4,6,8,10,12,14,16,18,20,22,24,26,28,30,32,34,36,38,40,42,44,46,48,50,52,54,56,58,60,62,64,66,68,70) and tkno1 in ('" . $matk . "') $sql_mand1  " . $this->getStrOderby() . "  group by tkno1
                union all
                    SELECT pskt.loaiphieu,tkno2 as tk,chitiet_pskt.mapskt as sophieu,noidung2 as noidung,mand2 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,0 as tienco,sum(chitiet_pskt.gtvnd2) as tienno,pskt.tkco as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  pskt.loaiphieu in(2,4,6,8,10,12,14,16,18,20,22,24,26,28,30,32,34,36,38,40,42,44,46,48,50,52,54,56,58,60,62,64,66,68,70) and tkno2 in ('" . $matk . "') $sql_mand2 " . $this->getStrOderby() . " group by tkno2
                union all
                    SELECT psvt.loaiphieu,dinhkhoan_psvt.tkno as tk,mapskt as sophieu,noidung as noidung,mand as mand,ngayghiso,sct,ngayhoadon,chuthich,0 as tienco,sum(sotien) as tienno,dinhkhoan_psvt.tkco as tkdu,MONTH(ngayghiso) as thang,dinhkhoan_psvt.sott FROM psvt INNER JOIN dinhkhoan_psvt on(psvt.sophieu=dinhkhoan_psvt.sophieu) where 0=0 and dinhkhoan_psvt.tkno in ('" . $matk . "') $sql_mand3 " . $this->getStrOderby2() . " group by dinhkhoan_psvt.tkno
                union all
                    SELECT psvt.loaiphieu,dinhkhoan_psvt.tkco as tk,mapskt as sophieu,noidung as noidung,mand as mand,ngayghiso,sct,ngayhoadon,chuthich,sum(sotien) as tienco,0 as tienno,dinhkhoan_psvt.tkno as tkdu,MONTH(ngayghiso) as thang,dinhkhoan_psvt.sott FROM psvt INNER JOIN dinhkhoan_psvt on(psvt.sophieu=dinhkhoan_psvt.sophieu) where 0=0 and dinhkhoan_psvt.tkco in ('" . $matk . "') $sql_mand3 " . $this->getStrOderby2() . " group by dinhkhoan_psvt.tkco
        order by $sapxep,sophieu";

        $this->query($sql);
        $row = array();
        $i = 0;
        while ($data = $this->fetch()) {
            $tk = $data['tk'];
            $tienco = 0;
            $tienno = 0;
            if (array_key_exists($tk, $row)) {
                $tienco = $row[$tk][tienco] + $data[tienco];
                $tienno = $row[$tk][tienno] + $data[tienno];
            } else {
                $tienco = $data[tienco];
                $tienno = $data[tienno];
            }
            $row[$tk] = $data;
            $row[$tk][tienco] = $tienco;
            $row[$tk][tienno] = $tienno;
        }
        return $row;

    }

    public function load_danhsach_socai_theotk_nhomtheo_ngayghiso($matk_str, $theonoidung, $sapxep)
    {// Lấy danh sách phiếu chi trong sổ cái
        $matk_arr = explode(",", $matk_str);
        $matk = implode("','", $matk_arr);
        if ($theonoidung == 'ALL') {
            $sql_mand1 = " ";
            $sql_mand2 = " ";
        } else {
            $sql_mand1 = " and mand1='" . $theonoidung . "'";
            $sql_mand2 = " and mand2='" . $theonoidung . "'";
            $sql_mand3 = " and mand='" . $theonoidung . "'";
        }
        $sql = " select  loaiphieu,tk,sophieu,noidung,mand,ngayghiso,sct,ngayhoadon,sum(tienco) as tienco,sum(tienno) as tienno,tkdu,thang from (
                    SELECT 0 as loaiphieu,matk as tk,0 as sophieu,0 as noidung, 0 as mand, 0 as ngayghiso,0 as sct,0 as ngayhoadon,0 as chuthich,soduco as tienco,soduno as tienno,0 as tkdu,0 as thang,0 as sott FROM sdtkdk where matk in ('" . $matk . "') group by matk,ngayghiso
				union all
				    SELECT pskt.loaiphieu,pskt.tkco as tk,chitiet_pskt.mapskt as sophieu,noidung1 as noidung,mand1 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,sum(chitiet_pskt.gtvnd1) as tienco,0 as tienno,chitiet_pskt.tkno1 as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where   pskt.loaiphieu in(2,4,6,8,10,12,14,16,18,20,22,24,26,28,30,32,34,36,38,40,42,44,46,48,50,52,54,56,58,60,62,64,66,68,70) and pskt.tkco in ('" . $matk . "') $sql_mand1  " . $this->getStrOderby() . " group by pskt.tkco,ngayghiso
                union all
                    SELECT pskt.loaiphieu,pskt.tkco as tk,chitiet_pskt.mapskt as sophieu,noidung2 as noidung,mand2 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,sum(chitiet_pskt.gtvnd2) as tienco,0 as tienno,chitiet_pskt.tkno2 as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  chitiet_pskt.tkno2!=0 and pskt.loaiphieu in(2,4,6,8,10,12,14,16,18,20,22,24,26,28,30,32,34,36,38,40,42,44,46,48,50,52,54,56,58,60,62,64,66,68,70) and pskt.tkco in ('" . $matk . "') $sql_mand2  " . $this->getStrOderby() . " group by pskt.tkco,ngayghiso
                union all
                    SELECT pskt.loaiphieu,tkno1 as tk,chitiet_pskt.mapskt as sophieu,noidung1 as noidung,mand1 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,sum(chitiet_pskt.gtvnd1) as tienco,0 as tienno,pskt.tkco as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  pskt.loaiphieu in(1,3,5,7,9,11,13,15,17,19,21,23,25,27,29,31,33,35,37,39,41,43,45,47,49,51,53,55,57,59,61,63,65,67,69,71,73,75,77,79,81,83,85,87,89,91) and tkno1 in ('" . $matk . "') $sql_mand1  " . $this->getStrOderby() . "  group by tkno1,ngayghiso
                union all
                    SELECT pskt.loaiphieu,tkno2 as tk,chitiet_pskt.mapskt as sophieu,noidung2 as noidung,mand2 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,sum(chitiet_pskt.gtvnd2) as tienco,0 as tienno,pskt.tkco as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  pskt.loaiphieu in(1,3,5,7,9,11,13,15,17,19,21,23,25,27,29,31,33,35,37,39,41,43,45,47,49,51,53,55,57,59,61,63,65,67,69,71,73,75,77,79,81,83,85,87,89,91) and tkno2 in ('" . $matk . "') $sql_mand2  " . $this->getStrOderby() . " group by  pskt.tkco,ngayghiso
                union all
                    SELECT pskt.loaiphieu,pskt.tkco as tk,chitiet_pskt.mapskt as sophieu,noidung1 as noidung,mand1 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,0 as tienco,sum(chitiet_pskt.gtvnd1) as tienno,chitiet_pskt.tkno1 as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  pskt.loaiphieu in(1,3,5,7,9,11,13,15,17,19,21,23,25,27,29,31,33,35,37,39,41,43,45,47,49,51,53,55,57,59,61,63,65,67,69,71,73,75,77,79,81,83,85,87,89,91) and pskt.tkco in ('" . $matk . "') $sql_mand1  " . $this->getStrOderby() . " group by pskt.tkco,ngayghiso
                union all
                    SELECT pskt.loaiphieu,pskt.tkco as tk,chitiet_pskt.mapskt as sophieu,noidung2 as noidung,mand2 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,0 as tienco,sum(chitiet_pskt.gtvnd2) as tienno,chitiet_pskt.tkno2 as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  chitiet_pskt.tkno2!=0 and pskt.loaiphieu in(1,3,5,7,9,11,13,15,17,19,21,23,25,27,29,31,33,35,37,39,41,43,45,47,49,51,53,55,57,59,61,63,65,67,69,71,73,75,77,79,81,83,85,87,89,91) and pskt.tkco in ('" . $matk . "') $sql_mand2 " . $this->getStrOderby() . " group by pskt.tkco,ngayghiso
                union all
                    SELECT pskt.loaiphieu,tkno1 as tk,chitiet_pskt.mapskt as sophieu,noidung1 as noidung,mand1 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,0 as tienco,sum(chitiet_pskt.gtvnd1) as tienno,pskt.tkco as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  pskt.loaiphieu in(2,4,6,8,10,12,14,16,18,20,22,24,26,28,30,32,34,36,38,40,42,44,46,48,50,52,54,56,58,60,62,64,66,68,70) and tkno1 in ('" . $matk . "') $sql_mand1  " . $this->getStrOderby() . "  group by tkno1,ngayghiso
                union all
                    SELECT pskt.loaiphieu,tkno2 as tk,chitiet_pskt.mapskt as sophieu,noidung2 as noidung,mand2 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,0 as tienco,sum(chitiet_pskt.gtvnd2) as tienno,pskt.tkco as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  pskt.loaiphieu in(2,4,6,8,10,12,14,16,18,20,22,24,26,28,30,32,34,36,38,40,42,44,46,48,50,52,54,56,58,60,62,64,66,68,70) and tkno2 in ('" . $matk . "') $sql_mand2 " . $this->getStrOderby() . " group by tkno2,ngayghiso
                union all
                    SELECT psvt.loaiphieu,dinhkhoan_psvt.tkno as tk,mapskt as sophieu,noidung as noidung,mand as mand,ngayghiso,sct,ngayhoadon,chuthich,0 as tienco,sum(sotien) as tienno,dinhkhoan_psvt.tkco as tkdu,MONTH(ngayghiso) as thang,dinhkhoan_psvt.sott FROM psvt INNER JOIN dinhkhoan_psvt on(psvt.sophieu=dinhkhoan_psvt.sophieu) where 0=0 and dinhkhoan_psvt.tkno in ('" . $matk . "') $sql_mand3 " . $this->getStrOderby2() . " group by dinhkhoan_psvt.tkno,ngayghiso
                union all
                    SELECT psvt.loaiphieu,dinhkhoan_psvt.tkco as tk,mapskt as sophieu,noidung as noidung,mand as mand,ngayghiso,sct,ngayhoadon,chuthich,sum(sotien) as tienco,0 as tienno,dinhkhoan_psvt.tkno as tkdu,MONTH(ngayghiso) as thang,dinhkhoan_psvt.sott FROM psvt INNER JOIN dinhkhoan_psvt on(psvt.sophieu=dinhkhoan_psvt.sophieu) where 0=0 and dinhkhoan_psvt.tkco in ('" . $matk . "') $sql_mand3 " . $this->getStrOderby2() . " group by dinhkhoan_psvt.tkco,ngayghiso
        ) x
        group by ngayghiso
        ";

        $this->query($sql);
        $row = array();
        $i = 0;
        while ($data = $this->fetch()) {
            $row[] = $data;

        }
        return $row;

    }

    public function load_danhsach_dk_theotk_ngoaite($matk_str, $theonoidung, $sapxep)
    {// Lấy danh sách phiếu chi trong sổ cái
        $matk_arr = explode(",", $matk_str);
        $matk = implode("','", $matk_arr);
        if ($theonoidung == 'ALL') {
            $sql_mand1 = " ";
            $sql_mand2 = " ";
        } else {
            $sql_mand1 = " and mand1='" . $theonoidung . "'";
            $sql_mand2 = " and mand2='" . $theonoidung . "'";
            $sql_mand3 = " and mand='" . $theonoidung . "'";
        }
        $sql = " SELECT 0 as loaiphieu,matk as tk,0 as sophieu,0 as noidung, 0 as mand, 0 as ngayghiso,0 as sct,0 as ngayhoadon,0 as chuthich,soduco as tienco,soduno as tienno,0 as tkdu,0 as thang,0 as sott,tygia,sotiennt FROM sdtkdk where matk in ('" . $matk . "') group by matk
                  order by $sapxep,sophieu";

        $this->query($sql);
        $row = array();
        $i = 0;
        while ($data = $this->fetch()) {
            $tk = $data['tk'];
            $tienco = 0;
            $tienno = 0;
            if (array_key_exists($tk, $row)) {
                $tienco = $row[$tk]['tienco'] + $data['tienco'];
                $tienno = $row[$tk]['tienno'] + $data['tienno'];
            } else {
                $tienco = $data['tienco'];
                $tienno = $data[tienno];
            }
            $row[$tk] = $data;
            $row[$tk]['tienco'] = $tienco;
            $row[$tk]['tienno'] = $tienno;
        }
        return $row;

    }

    public function load_danhsach_socai_dk_theotk_ngoaite($matk_str, $theonoidung, $sapxep)
    {// Lấy danh sách phiếu chi trong sổ cái
        $matk_arr = explode(",", $matk_str);
        $matk = implode("','", $matk_arr);
        if ($theonoidung == 'ALL') {
            $sql_mand1 = " ";
            $sql_mand2 = " ";
        } else {
            $sql_mand1 = " and mand1='" . $theonoidung . "'";
            $sql_mand2 = " and mand2='" . $theonoidung . "'";
            $sql_mand3 = " and mand='" . $theonoidung . "'";
        }
        $sql = "
                    SELECT pskt.makh,pskt.tenkh,pskt.loaiphieu,pskt.tkco as tk,pskt.mapskt as sophieu,noidung1 as noidung,mand1 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,(chitiet_pskt.gtvnd1) as tienco,0 as tienno,(chitiet_pskt.sotiennt) as tienntco,0 as tienntno,chitiet_pskt.tygia as tygiaco,0 as tygiano,chitiet_pskt.tkno1 as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,3 as sapxep,pskt.sophieu as phieuso FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where pskt.loaiphieu=chitiet_pskt.loaiphieu  and  pskt.loaiphieu in(2,4,6,8,10,12,14,16,18,20,22,24,26,28,30,32,34,36,38,40,42,44,46,48,50,52,54,56,58,60,62,64,66,68) and pskt.tkco in ('" . $matk . "') $sql_mand1  " . $this->getStrOderby() . "
                union all
                    SELECT pskt.makh,pskt.tenkh,pskt.loaiphieu,pskt.tkco as tk,pskt.mapskt as sophieu,noidung2 as noidung,mand2 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,chitiet_pskt.gtvnd2 as tienco,0 as tienno,(chitiet_pskt.sotiennt1) as tienntco,0 as tienntno,chitiet_pskt.tygia as tygiaco,0 as tygiano,chitiet_pskt.tkno2 as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,3 as sapxep,pskt.sophieu as phieuso FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  chitiet_pskt.tkno2!=0 and pskt.loaiphieu in(2,4,6,8,10,12,14,16,18,20,22,24,26,28,30,32,34,36,38,40,42,44,46,48,50,52,54,56,58,60,62,64,66,68) and pskt.tkco in ('" . $matk . "') $sql_mand2  " . $this->getStrOderby() . " 
                union all
                    SELECT pskt.makh,pskt.tenkh,pskt.loaiphieu,tkno1 as tk,pskt.mapskt as sophieu,noidung1 as noidung,mand1 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,chitiet_pskt.gtvnd1 as tienco,0 as tienno,(chitiet_pskt.sotiennt) as tienntco,0 as tienntno,chitiet_pskt.tygia as tygiaco,0 as tygiano,pskt.tkco as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,4 as sapxep,pskt.sophieu as phieuso FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where   pskt.loaiphieu in(1,3,5,7,9,11,13,15,17,19,21,23,25,27,29,31,33,35,37,39,41,43,45,47,49,51,53,55,57,59,61,63,65,67,69,71,73,75,77,79,81,83,85,87,89) and tkno1 in ('" . $matk . "') $sql_mand1  " . $this->getStrOderby() . " 
                union all
                    SELECT pskt.makh,pskt.tenkh,pskt.loaiphieu,tkno2 as tk,pskt.mapskt as sophieu,noidung2 as noidung,mand2 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,chitiet_pskt.gtvnd2 as tienco,0 as tienno,(chitiet_pskt.sotiennt1) as tienntco,0 as tienntno,chitiet_pskt.tygia as tygiaco,0 as tygiano,pskt.tkco as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,4 as sapxep,pskt.sophieu as phieuso FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  chitiet_pskt.tygia!=0 and  pskt.loaiphieu in(1,3,5,7,9,11,13,15,17,19,21,23,25,27,29,31,33,35,37,39,41,43,45,47,49,51,53,55,57,59,61,63,65,67,69,71,73,75,77,79,81,83,85,87,89) and tkno2 in ('" . $matk . "') $sql_mand2  " . $this->getStrOderby() . "
                union all
                    SELECT pskt.makh,pskt.tenkh,pskt.loaiphieu,pskt.tkco as tk,pskt.mapskt as sophieu,noidung1 as noidung,mand1 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,0 as tienco,chitiet_pskt.gtvnd1 as tienno,0 as tienntco,(chitiet_pskt.sotiennt) as tienntno,0 as tygiaco,chitiet_pskt.tygia as tygiano,chitiet_pskt.tkno1 as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,4 as sapxep,pskt.sophieu as phieuso FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where   pskt.loaiphieu in(1,3,5,7,9,11,13,15,17,19,21,23,25,27,29,31,33,35,37,39,41,43,45,47,49,51,53,55,57,59,61,63,65,67,69,71,73,75,77,79,81,83,85,87,89) and pskt.tkco in ('" . $matk . "') $sql_mand1  " . $this->getStrOderby() . "
                union all
                    SELECT pskt.makh,pskt.tenkh,pskt.loaiphieu,pskt.tkco as tk,pskt.mapskt as sophieu,noidung2 as noidung,mand2 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,0 as tienco,chitiet_pskt.gtvnd2 as tienno,0 as tienntco,(chitiet_pskt.sotiennt1) as tienntno,0 as tygiaco,chitiet_pskt.tygia as tygiano,chitiet_pskt.tkno2 as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,4 as sapxep,pskt.sophieu as phieuso FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where chitiet_pskt.tygia!=0 and  chitiet_pskt.tkno2!=0 and pskt.loaiphieu in(1,3,5,7,9,11,13,15,17,19,21,23,25,27,29,31,33,35,37,39,41,43,45,47,49,51,53,55,57,59,61,63,65,67,69,71,73,75,77,79,81,83,85,87,89) and pskt.tkco in ('" . $matk . "') $sql_mand2 " . $this->getStrOderby() . "
                union all
                    SELECT pskt.makh,pskt.tenkh,pskt.loaiphieu,tkno1 as tk,pskt.mapskt as sophieu,noidung1 as noidung,mand1 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,0 as tienco,chitiet_pskt.gtvnd1 as tienno,0 as tienntco,(chitiet_pskt.sotiennt) as tienntno,0 as tygiaco,chitiet_pskt.tygia as tygiano,pskt.tkco as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,3 as sapxep,pskt.sophieu as phieuso FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  pskt.loaiphieu in(2,4,6,8,10,12,14,16,18,20,22,24,26,28,30,32,34,36,38,40,42,44,46,48,50,52,54,56,58,60,62,64,66,68) and tkno1 in ('" . $matk . "') $sql_mand1  " . $this->getStrOderby() . "
                union all
                    SELECT pskt.makh,pskt.tenkh,pskt.loaiphieu,tkno2 as tk,pskt.mapskt as sophieu,noidung2 as noidung,mand2 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,0 as tienco,chitiet_pskt.gtvnd2 as tienno,0 as tienntco,(chitiet_pskt.sotiennt1) as tienntno,0 as tygiaco,chitiet_pskt.tygia as tygiano,pskt.tkco as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,3 as sapxep,pskt.sophieu as phieuso FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  pskt.loaiphieu in(2,4,6,8,10,12,14,16,18,20,22,24,26,28,30,32,34,36,38,40,42,44,46,48,50,52,54,56,58,60,62,64,66,68) and tkno2 in ('" . $matk . "') $sql_mand2 " . $this->getStrOderby() . "
                union all
                    SELECT psvt.makh,psvt.tenkh,psvt.loaiphieu,dinhkhoan_psvt.tkno as tk,mapskt as sophieu,noidung as noidung,mand as mand,ngayghiso,sct,ngayhoadon,chuthich,0 as tienco,sotien as tienno,0 as tienntco,(sotiennt) as tienntno,0 as tygiaco,0 as tygiano,dinhkhoan_psvt.tkco as tkdu,MONTH(ngayghiso) as thang,dinhkhoan_psvt.sott,1 as sapxep,psvt.sophieu as phieuso FROM psvt INNER JOIN dinhkhoan_psvt on(psvt.sophieu=dinhkhoan_psvt.sophieu) where sotiennt!=0 and dinhkhoan_psvt.tkno in ('" . $matk . "') $sql_mand3 " . $this->getStrOderby2() . "
                union all
                    SELECT psvt.makh,psvt.tenkh,psvt.loaiphieu,dinhkhoan_psvt.tkco as tk,mapskt as sophieu,noidung as noidung,mand as mand,ngayghiso,sct,ngayhoadon,chuthich,sotien as tienco,0 as tienno,sotiennt as tienntco,0 as tienntno,0 as tygiaco,0 as tygiano,dinhkhoan_psvt.tkno as tkdu,MONTH(ngayghiso) as thang,dinhkhoan_psvt.sott,1 as sapxep,psvt.sophieu as phieuso FROM psvt INNER JOIN dinhkhoan_psvt on(psvt.sophieu=dinhkhoan_psvt.sophieu) where sotiennt!=0 and dinhkhoan_psvt.tkco in ('" . $matk . "') $sql_mand3 " . $this->getStrOderby2() . "
        order by $sapxep,sapxep DESC,tienno,sott DESC
            ";


        $this->query($sql);
        $row = array();
        $i = 0;
        $tongno = 0;
        $tongco = 0;
        $tongntno = 0;
        $tongntco = 0;
        $mangreturn = array();
        while ($data = $this->fetch()) {
            $tk = $data['tk'];

            if (array_key_exists($tk, $row)) {
                $row[$tk]['tienco'] += $data['tienco'];
                $row[$tk]['tienno'] += $data['tienno'];
                $row[$tk]['tienntco'] += $data['tienntco'];
                $row[$tk]['tienntno'] += $data['tienntno'];
            } else {
                $row[$tk]['tienco'] = $data['tienco'];
                $row[$tk]['tienno'] = $data['tienno'];
                $row[$tk]['tienntco'] = $data['tienntco'];
                $row[$tk]['tienntno'] = $data['tienntno'];
            }
        }
        return $row;

    }

    public function load_danhsach_socai_chi_theotk($matk_str, $theonoidung, $sapxep)
    {// Lấy danh sách phiếu chi trong sổ cái
        $matk_arr = explode(",", $matk_str);
        $matk = implode("','", $matk_arr);
        if ($theonoidung == 'ALL') {
            $sql_mand1 = " ";
            $sql_mand2 = " ";
        } else {
            $sql_mand1 = " and mand1='" . $theonoidung . "'";
            $sql_mand2 = " and mand2='" . $theonoidung . "'";
            $sql_mand3 = " and mand='" . $theonoidung . "'";
        }
        $sql = "SELECT * FROM (SELECT pskt.sophieu as maphieu,pskt.loaiphieu,pskt.tkco as tk,pskt.mapskt as sophieu,noidung1 as noidung,mand1 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,(chitiet_pskt.gtvnd1) as tienco,0 as tienno,chitiet_pskt.tkno1 as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,pskt.loaiphieu as sapxep FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where pskt.loaiphieu=chitiet_pskt.loaiphieu  and  pskt.loaiphieu in(2,4,6,8,10,12,14,16,18,20,22,24,26,28,30,32,34,36,38,40,42,44,46,48,50,52,54,56,58,60,62,64,66,68,70) and pskt.tkco in ('" . $matk . "') $sql_mand1  " . $this->getStrOderby() . "
                union all
                    SELECT pskt.sophieu as maphieu,pskt.loaiphieu,pskt.tkco as tk,pskt.mapskt as sophieu,noidung2 as noidung,mand2 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,chitiet_pskt.gtvnd2 as tienco,0 as tienno,chitiet_pskt.tkno2 as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,pskt.loaiphieu as sapxep FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  chitiet_pskt.tkno2!=0 and pskt.loaiphieu in(2,4,6,8,10,12,14,16,18,20,22,24,26,28,30,32,34,36,38,40,42,44,46,48,50,52,54,56,58,60,62,64,66,68,70) and pskt.tkco in ('" . $matk . "') $sql_mand2  " . $this->getStrOderby() . " 
                union all
                    SELECT pskt.sophieu as maphieu,pskt.loaiphieu,tkno1 as tk,pskt.mapskt as sophieu,noidung1 as noidung,mand1 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,chitiet_pskt.gtvnd1 as tienco,0 as tienno,pskt.tkco as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,pskt.loaiphieu as sapxep FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  pskt.loaiphieu in(1,3,5,7,9,11,13,15,17,19,21,23,25,27,29,31,33,35,37,39,41,43,45,47,49,51,53,55,57,59,61,63,65,67,69,71,73,75,77,79,81,83,85,87,89,91) and tkno1 in ('" . $matk . "') $sql_mand1  " . $this->getStrOderby() . " 
                union all
                    SELECT pskt.sophieu as maphieu,pskt.loaiphieu,tkno2 as tk,pskt.mapskt as sophieu,noidung2 as noidung,mand2 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,chitiet_pskt.gtvnd2 as tienco,0 as tienno,pskt.tkco as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,pskt.loaiphieu as sapxep FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  pskt.loaiphieu in(1,3,5,7,9,11,13,15,17,19,21,23,25,27,29,31,33,35,37,39,41,43,45,47,49,51,53,55,57,59,61,63,65,67,69,71,73,75,77,79,81,83,85,87,89,91) and tkno2 in ('" . $matk . "') $sql_mand2  " . $this->getStrOderby() . "
                union all
                    SELECT pskt.sophieu as maphieu,pskt.loaiphieu,pskt.tkco as tk,pskt.mapskt as sophieu,noidung1 as noidung,mand1 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,0 as tienco,chitiet_pskt.gtvnd1 as tienno,chitiet_pskt.tkno1 as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,pskt.loaiphieu as sapxep FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  pskt.loaiphieu in(1,3,5,7,9,11,13,15,17,19,21,23,25,27,29,31,33,35,37,39,41,43,45,47,49,51,53,55,57,59,61,63,65,67,69,71,73,75,77,79,81,83,85,87,89,91) and pskt.tkco in ('" . $matk . "') $sql_mand1  " . $this->getStrOderby() . "
                union all
                    SELECT pskt.sophieu as maphieu,pskt.loaiphieu,pskt.tkco as tk,pskt.mapskt as sophieu,noidung2 as noidung,mand2 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,0 as tienco,chitiet_pskt.gtvnd2 as tienno,chitiet_pskt.tkno2 as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,pskt.loaiphieu as sapxep FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  chitiet_pskt.tkno2!=0 and pskt.loaiphieu in(1,3,5,7,9,11,13,15,17,19,21,23,25,27,29,31,33,35,37,39,41,43,45,47,49,51,53,55,57,59,61,63,65,67,69,71,73,75,77,79,81,83,85,87,89,91) and pskt.tkco in ('" . $matk . "') $sql_mand2 " . $this->getStrOderby() . "
                union all
                    SELECT pskt.sophieu as maphieu,pskt.loaiphieu,tkno1 as tk,pskt.mapskt as sophieu,noidung1 as noidung,mand1 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,0 as tienco,chitiet_pskt.gtvnd1 as tienno,pskt.tkco as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,pskt.loaiphieu as sapxep FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  pskt.loaiphieu in(2,4,6,8,10,12,14,16,18,20,22,24,26,28,30,32,34,36,38,40,42,44,46,48,50,52,54,56,58,60,62,64,66,68,70) and tkno1 in ('" . $matk . "') $sql_mand1  " . $this->getStrOderby() . "
                union all
                    SELECT pskt.sophieu as maphieu,pskt.loaiphieu,tkno2 as tk,pskt.mapskt as sophieu,noidung2 as noidung,mand2 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,0 as tienco,chitiet_pskt.gtvnd2 as tienno,pskt.tkco as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,pskt.loaiphieu as sapxep FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  pskt.loaiphieu in(2,4,6,8,10,12,14,16,18,20,22,24,26,28,30,32,34,36,38,40,42,44,46,48,50,52,54,56,58,60,62,64,66,68,70) and tkno2 in ('" . $matk . "') $sql_mand2 " . $this->getStrOderby() . "
                union all
                    SELECT psvt.sophieu as maphieu,psvt.loaiphieu,dinhkhoan_psvt.tkno as tk,mapskt as sophieu,noidung as noidung,mand as mand,ngayghiso,sct,ngayhoadon,chuthich,0 as tienco,sotien as tienno,dinhkhoan_psvt.tkco as tkdu,MONTH(ngayghiso) as thang,dinhkhoan_psvt.sott,1 as sapxep FROM psvt INNER JOIN dinhkhoan_psvt on(psvt.sophieu=dinhkhoan_psvt.sophieu) where 0=0 and dinhkhoan_psvt.tkno in ('" . $matk . "') $sql_mand3 " . $this->getStrOderby2() . "
                union all
                    SELECT psvt.sophieu as maphieu,psvt.loaiphieu,dinhkhoan_psvt.tkco as tk,mapskt as sophieu,noidung as noidung,mand as mand,ngayghiso,sct,ngayhoadon,chuthich,sotien as tienco,0 as tienno,dinhkhoan_psvt.tkno as tkdu,MONTH(ngayghiso) as thang,dinhkhoan_psvt.sott,1 as sapxep FROM psvt INNER JOIN dinhkhoan_psvt on(psvt.sophieu=dinhkhoan_psvt.sophieu) where 0=0 and dinhkhoan_psvt.tkco in ('" . $matk . "') $sql_mand3 " . $this->getStrOderby2() . ") X
        WHERE 0=0 ".$this->getStrOderby3()." order by ngayghiso,$sapxep,sapxep,sophieu,maphieu ASC";

        $this->query($sql);
        $row = array();
        $i = 0;
        while ($data = $this->fetch()) {
            $tk = $data['tk'];
            $tkdu = $data['tkdu'];
            if ($data['tkdu'] == "1331") {
                if ($data['mand'] == "") {
                    $data['noidung'] = "Thuế GTGT đầu vào";
                    $data['mand'] = "100000";
                }
            }
            if ($data['tkdu'] == "1332") {
                if ($data['mand'] == "") {
                    $data['noidung'] = "Thuế GTGT được khấu trừ của TSCĐ";
                }
            }
            if ($data['tkdu'] == "33311") {
                if ($data['mand'] == "") {
                    $data['noidung'] = "Thuế GTGT đầu ra";
                    $data['mand'] = "100001";
                }
            }
            if ($data['tkdu'] == "33312") {
                if ($data['mand'] == "") {
                    $data['noidung'] = "Thuế GTGT hàng hóa nhập khẩu";
                }
            }
            if ($theonoidung == 'ALL') {
                $row[$tk][] = $data;
            } else {
                if ($theonoidung == $data['mand'])
                    $row[$tk][] = $data;
            }
        }
        return $row;

    }

    public function load_danhsach_socai_chi_theotk_congdon($matk_str, $theonoidung, $sapxep,$congdon)
    {// Lấy danh sách phiếu chi trong sổ cái
        $matk_arr = explode(",", $matk_str);
        $matk = implode("','", $matk_arr);
        if ($theonoidung == 'ALL') {
            $sql_mand1 = " ";
            $sql_mand2 = " ";
        } else {
            $sql_mand1 = " and mand1='" . $theonoidung . "'";
            $sql_mand2 = " and mand2='" . $theonoidung . "'";
            $sql_mand3 = " and mand='" . $theonoidung . "'";
        }
        $sql = "select maphieu,loaiphieu,tk,sophieu,noidung,manoidung,mabophan,ngayghiso,sct,ngayhoadon,chuthich,sum(tienco) tienco,sum(tienno) tienno,tkdu,thang,sott,sapxep from

                (SELECT pskt.sophieu as maphieu,pskt.loaiphieu,pskt.tkco as tk,pskt.mapskt as sophieu,noidung1 as noidung,mand1 as manoidung,chitiet_pskt.mabp as mabophan,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,(chitiet_pskt.gtvnd1) as tienco,0 as tienno,chitiet_pskt.tkno1 as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,3 as sapxep FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where pskt.loaiphieu=chitiet_pskt.loaiphieu  and  pskt.loaiphieu in(2,4,6,8,10,12,14,16,18,20,22,24,26,28,30,32,34,36,38,40,42,44,46,48,50,52,54,56,58,60,62,64,66,68,70) and pskt.tkco in ('" . $matk . "') $sql_mand1  " . $this->getStrOderby() . "
                union all
                    SELECT pskt.sophieu as maphieu,pskt.loaiphieu,pskt.tkco as tk,pskt.mapskt as sophieu,noidung2 as noidung,mand2 as manoidung,chitiet_pskt.mabp as mabophan,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,chitiet_pskt.gtvnd2 as tienco,0 as tienno,chitiet_pskt.tkno2 as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,3 as sapxep FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  chitiet_pskt.tkno2!=0 and pskt.loaiphieu in(2,4,6,8,10,12,14,16,18,20,22,24,26,28,30,32,34,36,38,40,42,44,46,48,50,52,54,56,58,60,62,64,66,68,70) and pskt.tkco in ('" . $matk . "') $sql_mand2  " . $this->getStrOderby() . " 
                union all
                    SELECT pskt.sophieu as maphieu,pskt.loaiphieu,tkno1 as tk,pskt.mapskt as sophieu,noidung1 as noidung,mand1 as manoidung,chitiet_pskt.mabp as mabophan,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,chitiet_pskt.gtvnd1 as tienco,0 as tienno,pskt.tkco as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,4 as sapxep FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  pskt.loaiphieu in(1,3,5,7,9,11,13,15,17,19,21,23,25,27,29,31,33,35,37,39,41,43,45,47,49,51,53,55,57,59,61,63,65,67,69,71,73,75,77,79,81,83,85,87,89,91) and tkno1 in ('" . $matk . "') $sql_mand1  " . $this->getStrOderby() . " 
                union all
                    SELECT pskt.sophieu as maphieu,pskt.loaiphieu,tkno2 as tk,pskt.mapskt as sophieu,noidung2 as noidung,mand2 as manoidung,chitiet_pskt.mabp as mabophan,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,chitiet_pskt.gtvnd2 as tienco,0 as tienno,pskt.tkco as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,4 as sapxep FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  pskt.loaiphieu in(1,3,5,7,9,11,13,15,17,19,21,23,25,27,29,31,33,35,37,39,41,43,45,47,49,51,53,55,57,59,61,63,65,67,69,71,73,75,77,79,81,83,85,87,89,91) and tkno2 in ('" . $matk . "') $sql_mand2  " . $this->getStrOderby() . "
                union all
                    SELECT pskt.sophieu as maphieu,pskt.loaiphieu,pskt.tkco as tk,pskt.mapskt as sophieu,noidung1 as noidung,mand1 as manoidung,chitiet_pskt.mabp as mabophan,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,0 as tienco,chitiet_pskt.gtvnd1 as tienno,chitiet_pskt.tkno1 as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,4 as sapxep FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  pskt.loaiphieu in(1,3,5,7,9,11,13,15,17,19,21,23,25,27,29,31,33,35,37,39,41,43,45,47,49,51,53,55,57,59,61,63,65,67,69,71,73,75,77,79,81,83,85,87,89,91) and pskt.tkco in ('" . $matk . "') $sql_mand1  " . $this->getStrOderby() . "
                union all
                    SELECT pskt.sophieu as maphieu,pskt.loaiphieu,pskt.tkco as tk,pskt.mapskt as sophieu,noidung2 as noidung,mand2 as manoidung,chitiet_pskt.mabp as mabophan,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,0 as tienco,chitiet_pskt.gtvnd2 as tienno,chitiet_pskt.tkno2 as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,4 as sapxep FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  chitiet_pskt.tkno2!=0 and pskt.loaiphieu in(1,3,5,7,9,11,13,15,17,19,21,23,25,27,29,31,33,35,37,39,41,43,45,47,49,51,53,55,57,59,61,63,65,67,69,71,73,75,77,79,81,83,85,87,89,91) and pskt.tkco in ('" . $matk . "') $sql_mand2 " . $this->getStrOderby() . "
                union all
                    SELECT pskt.sophieu as maphieu,pskt.loaiphieu,tkno1 as tk,pskt.mapskt as sophieu,noidung1 as noidung,mand1 as manoidung,chitiet_pskt.mabp as mabophan,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,0 as tienco,chitiet_pskt.gtvnd1 as tienno,pskt.tkco as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,3 as sapxep FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  pskt.loaiphieu in(2,4,6,8,10,12,14,16,18,20,22,24,26,28,30,32,34,36,38,40,42,44,46,48,50,52,54,56,58,60,62,64,66,68,70) and tkno1 in ('" . $matk . "') $sql_mand1  " . $this->getStrOderby() . "
                union all
                    SELECT pskt.sophieu as maphieu,pskt.loaiphieu,tkno2 as tk,pskt.mapskt as sophieu,noidung2 as noidung,mand2 as manoidung,chitiet_pskt.mabp as mabophan,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,0 as tienco,chitiet_pskt.gtvnd2 as tienno,pskt.tkco as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,3 as sapxep FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  pskt.loaiphieu in(2,4,6,8,10,12,14,16,18,20,22,24,26,28,30,32,34,36,38,40,42,44,46,48,50,52,54,56,58,60,62,64,66,68,70) and tkno2 in ('" . $matk . "') $sql_mand2 " . $this->getStrOderby() . "
                union all
                    SELECT psvt.sophieu as maphieu,psvt.loaiphieu,dinhkhoan_psvt.tkno as tk,mapskt as sophieu,noidung as noidung,mand as manoidung,psvt.makho as mabophan,ngayghiso,sct,ngayhoadon,chuthich,0 as tienco,sotien as tienno,dinhkhoan_psvt.tkco as tkdu,MONTH(ngayghiso) as thang,dinhkhoan_psvt.sott,1 as sapxep FROM psvt INNER JOIN dinhkhoan_psvt on(psvt.sophieu=dinhkhoan_psvt.sophieu) where 0=0 and dinhkhoan_psvt.tkno in ('" . $matk . "') $sql_mand3 " . $this->getStrOderby2() . "
                union all
                    SELECT psvt.sophieu as maphieu,psvt.loaiphieu,dinhkhoan_psvt.tkco as tk,mapskt as sophieu,noidung as noidung,mand as manoidung,psvt.makho as mabophan,ngayghiso,sct,ngayhoadon,chuthich,sotien as tienco,0 as tienno,dinhkhoan_psvt.tkno as tkdu,MONTH(ngayghiso) as thang,dinhkhoan_psvt.sott,1 as sapxep FROM psvt INNER JOIN dinhkhoan_psvt on(psvt.sophieu=dinhkhoan_psvt.sophieu) where 0=0 and dinhkhoan_psvt.tkco in ('" . $matk . "') $sql_mand3 " . $this->getStrOderby2() . "
        order by ngayghiso,maphieu ASC,sapxep DESC,$sapxep) tbl_socai where 0=0 " . $this->getStrOderby3() . " group by $congdon";

        $this->query($sql);
        $row = array();
        $i = 0;
        while ($data = $this->fetch()) {
            $tk = $data['tk'];
            $tkdu = $data['tkdu'];
            if ($data['tkdu'] == "1331") {
                if ($data['mand'] == "") {
                    $data['noidung'] = "Thuế GTGT đầu vào";
                    $data['mand'] = "100000";
                }
            }
            if ($data['tkdu'] == "1332") {
                if ($data['mand'] == "") {
                    $data['noidung'] = "Thuế GTGT được khấu trừ của TSCĐ";
                }
            }
            if ($data['tkdu'] == "33311") {
                if ($data['mand'] == "") {
                    $data['noidung'] = "Thuế GTGT đầu ra";
                    $data['mand'] = "100001";
                }
            }
            if ($data['tkdu'] == "33312") {
                if ($data['mand'] == "") {
                    $data['noidung'] = "Thuế GTGT hàng hóa nhập khẩu";
                }
            }

            $row[$tk][$data[$congdon]] = $data;
        }
        return $row;

    }

    public function load_danhsach_socai_chi_theotk_congdon_theobp_noidung($matk_str, $theonoidung, $sapxep,$congdon)
    {// Lấy danh sách phiếu chi trong sổ cái
        $matk_arr = explode(",", $matk_str);
        $matk = implode("','", $matk_arr);
        if ($theonoidung == 'ALL') {
            $sql_mand1 = " ";
            $sql_mand2 = " ";
        } else {
            $sql_mand1 = " and mand1='" . $theonoidung . "'";
            $sql_mand2 = " and mand2='" . $theonoidung . "'";
            $sql_mand3 = " and mand='" . $theonoidung . "'";
        }
        $sql = "select maphieu,loaiphieu,tk,sophieu,noidung,manoidung,mabophan,ngayghiso,sct,ngayhoadon,chuthich,sum(tienco) tienco,sum(tienno) tienno,tkdu,thang,sott,sapxep from

                (SELECT pskt.sophieu as maphieu,pskt.loaiphieu,pskt.tkco as tk,pskt.mapskt as sophieu,noidung1 as noidung,mand1 as manoidung,chitiet_pskt.mabp as mabophan,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,(chitiet_pskt.gtvnd1) as tienco,0 as tienno,chitiet_pskt.tkno1 as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,3 as sapxep FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where pskt.loaiphieu=chitiet_pskt.loaiphieu  and  pskt.loaiphieu in(2,4,6,8,10,12,14,16,18,20,22,24,26,28,30,32,34,36,38,40,42,44,46,48,50,52,54,56,58,60,62,64,66,68,70) and pskt.tkco in ('" . $matk . "') $sql_mand1  " . $this->getStrOderby() . "
                union all
                    SELECT pskt.sophieu as maphieu,pskt.loaiphieu,pskt.tkco as tk,pskt.mapskt as sophieu,noidung2 as noidung,mand2 as manoidung,chitiet_pskt.mabp as mabophan,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,chitiet_pskt.gtvnd2 as tienco,0 as tienno,chitiet_pskt.tkno2 as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,3 as sapxep FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  chitiet_pskt.tkno2!=0 and pskt.loaiphieu in(2,4,6,8,10,12,14,16,18,20,22,24,26,28,30,32,34,36,38,40,42,44,46,48,50,52,54,56,58,60,62,64,66,68,70) and pskt.tkco in ('" . $matk . "') $sql_mand2  " . $this->getStrOderby() . " 
                union all
                    SELECT pskt.sophieu as maphieu,pskt.loaiphieu,tkno1 as tk,pskt.mapskt as sophieu,noidung1 as noidung,mand1 as manoidung,chitiet_pskt.mabp as mabophan,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,chitiet_pskt.gtvnd1 as tienco,0 as tienno,pskt.tkco as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,4 as sapxep FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  pskt.loaiphieu in(1,3,5,7,9,11,13,15,17,19,21,23,25,27,29,31,33,35,37,39,41,43,45,47,49,51,53,55,57,59,61,63,65,67,69,71,73,75,77,79,81,83,85,87,89,91) and tkno1 in ('" . $matk . "') $sql_mand1  " . $this->getStrOderby() . " 
                union all
                    SELECT pskt.sophieu as maphieu,pskt.loaiphieu,tkno2 as tk,pskt.mapskt as sophieu,noidung2 as noidung,mand2 as manoidung,chitiet_pskt.mabp as mabophan,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,chitiet_pskt.gtvnd2 as tienco,0 as tienno,pskt.tkco as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,4 as sapxep FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  pskt.loaiphieu in(1,3,5,7,9,11,13,15,17,19,21,23,25,27,29,31,33,35,37,39,41,43,45,47,49,51,53,55,57,59,61,63,65,67,69,71,73,75,77,79,81,83,85,87,89,91) and tkno2 in ('" . $matk . "') $sql_mand2  " . $this->getStrOderby() . "
                union all
                    SELECT pskt.sophieu as maphieu,pskt.loaiphieu,pskt.tkco as tk,pskt.mapskt as sophieu,noidung1 as noidung,mand1 as manoidung,chitiet_pskt.mabp as mabophan,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,0 as tienco,chitiet_pskt.gtvnd1 as tienno,chitiet_pskt.tkno1 as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,4 as sapxep FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  pskt.loaiphieu in(1,3,5,7,9,11,13,15,17,19,21,23,25,27,29,31,33,35,37,39,41,43,45,47,49,51,53,55,57,59,61,63,65,67,69,71,73,75,77,79,81,83,85,87,89,91) and pskt.tkco in ('" . $matk . "') $sql_mand1  " . $this->getStrOderby() . "
                union all
                    SELECT pskt.sophieu as maphieu,pskt.loaiphieu,pskt.tkco as tk,pskt.mapskt as sophieu,noidung2 as noidung,mand2 as manoidung,chitiet_pskt.mabp as mabophan,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,0 as tienco,chitiet_pskt.gtvnd2 as tienno,chitiet_pskt.tkno2 as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,4 as sapxep FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  chitiet_pskt.tkno2!=0 and pskt.loaiphieu in(1,3,5,7,9,11,13,15,17,19,21,23,25,27,29,31,33,35,37,39,41,43,45,47,49,51,53,55,57,59,61,63,65,67,69,71,73,75,77,79,81,83,85,87,89,91) and pskt.tkco in ('" . $matk . "') $sql_mand2 " . $this->getStrOderby() . "
                union all
                    SELECT pskt.sophieu as maphieu,pskt.loaiphieu,tkno1 as tk,pskt.mapskt as sophieu,noidung1 as noidung,mand1 as manoidung,chitiet_pskt.mabp as mabophan,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,0 as tienco,chitiet_pskt.gtvnd1 as tienno,pskt.tkco as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,3 as sapxep FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  pskt.loaiphieu in(2,4,6,8,10,12,14,16,18,20,22,24,26,28,30,32,34,36,38,40,42,44,46,48,50,52,54,56,58,60,62,64,66,68,70) and tkno1 in ('" . $matk . "') $sql_mand1  " . $this->getStrOderby() . "
                union all
                    SELECT pskt.sophieu as maphieu,pskt.loaiphieu,tkno2 as tk,pskt.mapskt as sophieu,noidung2 as noidung,mand2 as manoidung,chitiet_pskt.mabp as mabophan,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,0 as tienco,chitiet_pskt.gtvnd2 as tienno,pskt.tkco as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,3 as sapxep FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  pskt.loaiphieu in(2,4,6,8,10,12,14,16,18,20,22,24,26,28,30,32,34,36,38,40,42,44,46,48,50,52,54,56,58,60,62,64,66,68,70) and tkno2 in ('" . $matk . "') $sql_mand2 " . $this->getStrOderby() . "
                union all
                    SELECT psvt.sophieu as maphieu,psvt.loaiphieu,dinhkhoan_psvt.tkno as tk,mapskt as sophieu,noidung as noidung,mand as manoidung,psvt.makho as mabophan,ngayghiso,sct,ngayhoadon,chuthich,0 as tienco,sotien as tienno,dinhkhoan_psvt.tkco as tkdu,MONTH(ngayghiso) as thang,dinhkhoan_psvt.sott,1 as sapxep FROM psvt INNER JOIN dinhkhoan_psvt on(psvt.sophieu=dinhkhoan_psvt.sophieu) where 0=0 and dinhkhoan_psvt.tkno in ('" . $matk . "') $sql_mand3 " . $this->getStrOderby2() . "
                union all
                    SELECT psvt.sophieu as maphieu,psvt.loaiphieu,dinhkhoan_psvt.tkco as tk,mapskt as sophieu,noidung as noidung,mand as manoidung,psvt.makho as mabophan,ngayghiso,sct,ngayhoadon,chuthich,sotien as tienco,0 as tienno,dinhkhoan_psvt.tkno as tkdu,MONTH(ngayghiso) as thang,dinhkhoan_psvt.sott,1 as sapxep FROM psvt INNER JOIN dinhkhoan_psvt on(psvt.sophieu=dinhkhoan_psvt.sophieu) where 0=0 and dinhkhoan_psvt.tkco in ('" . $matk . "') $sql_mand3 " . $this->getStrOderby2() . "
        order by ngayghiso,maphieu ASC,sapxep DESC,$sapxep) tbl_socai where 0=0 " . $this->getStrOderby3() . " group by $congdon";

        $this->query($sql);
        $row = array();
        $i = 0;
        while ($data = $this->fetch()) {
            $tk = $data['tk'];
            $tkdu = $data['tkdu'];
            if ($data['tkdu'] == "1331") {
                if ($data['mand'] == "") {
                    $data['noidung'] = "Thuế GTGT đầu vào";
                    $data['mand'] = "100000";
                }
            }
            if ($data['tkdu'] == "1332") {
                if ($data['mand'] == "") {
                    $data['noidung'] = "Thuế GTGT được khấu trừ của TSCĐ";
                }
            }
            if ($data['tkdu'] == "33311") {
                if ($data['mand'] == "") {
                    $data['noidung'] = "Thuế GTGT đầu ra";
                    $data['mand'] = "100001";
                }
            }
            if ($data['tkdu'] == "33312") {
                if ($data['mand'] == "") {
                    $data['noidung'] = "Thuế GTGT hàng hóa nhập khẩu";
                }
            }

            $row[$tk][$data['mabophan']][$data['manoidung']] = $data;
        }
        return $row;

    }

    public function load_danhsach_socai_chi_theotk_ngoaite($matk_str, $theonoidung, $sapxep)
    {// Lấy danh sách phiếu chi trong sổ cái
        $matk_arr = explode(",", $matk_str);
        $matk = implode("','", $matk_arr);
        if ($theonoidung == 'ALL') {
            $sql_mand1 = " ";
            $sql_mand2 = " ";
        } else {
            $sql_mand1 = " and mand1='" . $theonoidung . "'";
            $sql_mand2 = " and mand2='" . $theonoidung . "'";
            $sql_mand3 = " and mand='" . $theonoidung . "'";
        }
        $sql = "SELECT pskt.makh,pskt.tenkh,pskt.loaiphieu,pskt.tkco as tk,pskt.mapskt as sophieu,noidung1 as noidung,mand1 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,(chitiet_pskt.gtvnd1) as tienco,0 as tienno,(chitiet_pskt.sotiennt) as tienntco,0 as tienntno,chitiet_pskt.tygia as tygiaco,0 as tygiano,chitiet_pskt.tkno1 as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,3 as sapxep,pskt.sophieu as phieuso FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where pskt.loaiphieu=chitiet_pskt.loaiphieu  and  pskt.loaiphieu in(2,4,6,8,10,12,14,16,18,20,22,24,26,28,30,32,34,36,38,40,42,44,46,48,50,52,54,56,58,60,62,64,66,68) and pskt.tkco in ('" . $matk . "') $sql_mand1  " . $this->getStrOderby() . "
                union all
                    SELECT pskt.makh,pskt.tenkh,pskt.loaiphieu,pskt.tkco as tk,pskt.mapskt as sophieu,noidung2 as noidung,mand2 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,chitiet_pskt.gtvnd2 as tienco,0 as tienno,(chitiet_pskt.sotiennt1) as tienntco,0 as tienntno,chitiet_pskt.tygia as tygiaco,0 as tygiano,chitiet_pskt.tkno2 as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,3 as sapxep,pskt.sophieu as phieuso FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  chitiet_pskt.tkno2!=0 and pskt.loaiphieu in(2,4,6,8,10,12,14,16,18,20,22,24,26,28,30,32,34,36,38,40,42,44,46,48,50,52,54,56,58,60,62,64,66,68) and pskt.tkco in ('" . $matk . "') $sql_mand2  " . $this->getStrOderby() . " 
                union all
                    SELECT pskt.makh,pskt.tenkh,pskt.loaiphieu,tkno1 as tk,pskt.mapskt as sophieu,noidung1 as noidung,mand1 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,chitiet_pskt.gtvnd1 as tienco,0 as tienno,(chitiet_pskt.sotiennt) as tienntco,0 as tienntno,chitiet_pskt.tygia as tygiaco,0 as tygiano,pskt.tkco as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,4 as sapxep,pskt.sophieu as phieuso FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where   pskt.loaiphieu in(1,3,5,7,9,11,13,15,17,19,21,23,25,27,29,31,33,35,37,39,41,43,45,47,49,51,53,55,57,59,61,63,65,67,69,71,73,75,77,79,81,83,85,87,89) and tkno1 in ('" . $matk . "') $sql_mand1  " . $this->getStrOderby() . " 
                union all
                    SELECT pskt.makh,pskt.tenkh,pskt.loaiphieu,tkno2 as tk,pskt.mapskt as sophieu,noidung2 as noidung,mand2 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,chitiet_pskt.gtvnd2 as tienco,0 as tienno,(chitiet_pskt.sotiennt1) as tienntco,0 as tienntno,chitiet_pskt.tygia as tygiaco,0 as tygiano,pskt.tkco as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,4 as sapxep,pskt.sophieu as phieuso FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  chitiet_pskt.tygia!=0 and  pskt.loaiphieu in(1,3,5,7,9,11,13,15,17,19,21,23,25,27,29,31,33,35,37,39,41,43,45,47,49,51,53,55,57,59,61,63,65,67,69,71,73,75,77,79,81,83,85,87,89) and tkno2 in ('" . $matk . "') $sql_mand2  " . $this->getStrOderby() . "
                union all
                    SELECT pskt.makh,pskt.tenkh,pskt.loaiphieu,pskt.tkco as tk,pskt.mapskt as sophieu,noidung1 as noidung,mand1 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,0 as tienco,chitiet_pskt.gtvnd1 as tienno,0 as tienntco,(chitiet_pskt.sotiennt) as tienntno,0 as tygiaco,chitiet_pskt.tygia as tygiano,chitiet_pskt.tkno1 as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,4 as sapxep,pskt.sophieu as phieuso FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where   pskt.loaiphieu in(1,3,5,7,9,11,13,15,17,19,21,23,25,27,29,31,33,35,37,39,41,43,45,47,49,51,53,55,57,59,61,63,65,67,69,71,73,75,77,79,81,83,85,87,89) and pskt.tkco in ('" . $matk . "') $sql_mand1  " . $this->getStrOderby() . "
                union all
                    SELECT pskt.makh,pskt.tenkh,pskt.loaiphieu,pskt.tkco as tk,pskt.mapskt as sophieu,noidung2 as noidung,mand2 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,0 as tienco,chitiet_pskt.gtvnd2 as tienno,0 as tienntco,(chitiet_pskt.sotiennt1) as tienntno,0 as tygiaco,chitiet_pskt.tygia as tygiano,chitiet_pskt.tkno2 as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,4 as sapxep,pskt.sophieu as phieuso FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where chitiet_pskt.tygia!=0 and  chitiet_pskt.tkno2!=0 and pskt.loaiphieu in(1,3,5,7,9,11,13,15,17,19,21,23,25,27,29,31,33,35,37,39,41,43,45,47,49,51,53,55,57,59,61,63,65,67,69,71,73,75,77,79,81,83,85,87,89) and pskt.tkco in ('" . $matk . "') $sql_mand2 " . $this->getStrOderby() . "
                union all
                    SELECT pskt.makh,pskt.tenkh,pskt.loaiphieu,tkno1 as tk,pskt.mapskt as sophieu,noidung1 as noidung,mand1 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,0 as tienco,chitiet_pskt.gtvnd1 as tienno,0 as tienntco,(chitiet_pskt.sotiennt) as tienntno,0 as tygiaco,chitiet_pskt.tygia as tygiano,pskt.tkco as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,3 as sapxep,pskt.sophieu as phieuso FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  pskt.loaiphieu in(2,4,6,8,10,12,14,16,18,20,22,24,26,28,30,32,34,36,38,40,42,44,46,48,50,52,54,56,58,60,62,64,66,68) and tkno1 in ('" . $matk . "') $sql_mand1  " . $this->getStrOderby() . "
                union all
                    SELECT pskt.makh,pskt.tenkh,pskt.loaiphieu,tkno2 as tk,pskt.mapskt as sophieu,noidung2 as noidung,mand2 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,0 as tienco,chitiet_pskt.gtvnd2 as tienno,0 as tienntco,(chitiet_pskt.sotiennt1) as tienntno,0 as tygiaco,chitiet_pskt.tygia as tygiano,pskt.tkco as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,3 as sapxep,pskt.sophieu as phieuso FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  pskt.loaiphieu in(2,4,6,8,10,12,14,16,18,20,22,24,26,28,30,32,34,36,38,40,42,44,46,48,50,52,54,56,58,60,62,64,66,68) and tkno2 in ('" . $matk . "') $sql_mand2 " . $this->getStrOderby() . "
                union all
                    SELECT psvt.makh,psvt.tenkh,psvt.loaiphieu,dinhkhoan_psvt.tkno as tk,mapskt as sophieu,noidung as noidung,mand as mand,ngayghiso,sct,ngayhoadon,chuthich,0 as tienco,sotien as tienno,0 as tienntco,(sotiennt) as tienntno,0 as tygiaco,0 as tygiano,dinhkhoan_psvt.tkco as tkdu,MONTH(ngayghiso) as thang,dinhkhoan_psvt.sott,1 as sapxep,psvt.sophieu as phieuso FROM psvt INNER JOIN dinhkhoan_psvt on(psvt.sophieu=dinhkhoan_psvt.sophieu) where sotiennt!=0 and dinhkhoan_psvt.tkno in ('" . $matk . "') $sql_mand3 " . $this->getStrOderby2() . "
                union all
                    SELECT psvt.makh,psvt.tenkh,psvt.loaiphieu,dinhkhoan_psvt.tkco as tk,mapskt as sophieu,noidung as noidung,mand as mand,ngayghiso,sct,ngayhoadon,chuthich,sotien as tienco,0 as tienno,sotiennt as tienntco,0 as tienntno,0 as tygiaco,0 as tygiano,dinhkhoan_psvt.tkno as tkdu,MONTH(ngayghiso) as thang,dinhkhoan_psvt.sott,1 as sapxep,psvt.sophieu as phieuso FROM psvt INNER JOIN dinhkhoan_psvt on(psvt.sophieu=dinhkhoan_psvt.sophieu) where sotiennt!=0 and dinhkhoan_psvt.tkco in ('" . $matk . "') $sql_mand3 " . $this->getStrOderby2() . "
        order by ngayghiso,sapxep DESC,tienno,sott DESC";

        $this->query($sql);
        $row = array();
        $i = 0;
        while ($data = $this->fetch()) {
            $tk = $data['tk'];
            $tkdu = $data['tkdu'];
            if ($data['tkdu'] == "1331") {
                if ($data['mand'] == "") {
                    $data['noidung'] = "Thuế GTGT đầu vào";
                    $data['mand'] = "100000";
                }
            }
            if ($data['tkdu'] == "1332") {
                if ($data['mand'] == "") {
                    $data['noidung'] = "Thuế GTGT được khấu trừ của TSCĐ";
                }
            }
            if ($data['tkdu'] == "33311") {
                if ($data['mand'] == "") {
                    $data['noidung'] = "Thuế GTGT đầu ra";
                    $data['mand'] = "100001";
                }
            }
            if ($data['tkdu'] == "33312") {
                if ($data['mand'] == "") {
                    $data['noidung'] = "Thuế GTGT hàng hóa nhập khẩu";
                }
            }
            if ($theonoidung == 'ALL') {
                $row[$tk][] = $data;
            } else {
                if ($theonoidung == $data['mand'])
                    $row[$tk][] = $data;
            }
        }
        return $row;

    }

    public function load_danhsach_socai_theotk_bosung($matk_str, $theonoidung, $sapxep)/// Lấy sổ cái tờ khai bổ sung
    {// Lấy danh sách phiếu chi trong sổ cái
        $matk_arr = explode(",", $matk_str);
        $matk = implode("','", $matk_arr);
        if ($theonoidung == 'ALL') {
            $sql_mand1 = " ";
            $sql_mand2 = " ";
        } else {
            $sql_mand1 = " and mand1='" . $theonoidung . "'";
            $sql_mand2 = " and mand2='" . $theonoidung . "'";
            $sql_mand3 = " and mand='" . $theonoidung . "'";
        }
        $sql = "SELECT pskt.loaiphieu,pskt.tkco as tk,pskt.mapskt as sophieu,noidung1 as noidung,mand1 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,(chitiet_pskt.gtvnd1) as tienco,0 as tienno,chitiet_pskt.tkno1 as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,3 as sapxep FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  loaitokhai='0' and  pskt.loaiphieu in(2,4,6,8,10,12,14,16,18,20,22,24,26,28,30,32,34,36,38,40,42,44,46,48,50,52,54,56,58,60,62,64,66,68) and pskt.tkco in ('" . $matk . "') $sql_mand1  " . $this->getStrOderby() . "
                union all
                    SELECT pskt.loaiphieu,pskt.tkco as tk,pskt.mapskt as sophieu,noidung2 as noidung,mand2 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,chitiet_pskt.gtvnd2 as tienco,0 as tienno,chitiet_pskt.tkno2 as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,3 as sapxep FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  loaitokhai='0' and chitiet_pskt.tkno2!=0 and pskt.loaiphieu in(2,4,6,8,10,12,14,16,18,20,22,24,26,28,30,32,34,36,38,40,42,44,46,48,50,52,54,56,58,60,62,64,66,68) and pskt.tkco in ('" . $matk . "') $sql_mand2  " . $this->getStrOderby() . " 
                union all
                    SELECT pskt.loaiphieu,tkno1 as tk,pskt.mapskt as sophieu,noidung1 as noidung,mand1 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,chitiet_pskt.gtvnd1 as tienco,0 as tienno,pskt.tkco as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,4 as sapxep FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  loaitokhai='0' and pskt.loaiphieu in(1,3,5,7,9,11,13,15,17,19,21,23,25,27,29,31,33,35,37,39,41,43,45,47,49,51,53,55,57,59,61,63,65,67,69,71,73,75,77,79,81,83,85,87,89) and tkno1 in ('" . $matk . "') $sql_mand1  " . $this->getStrOderby() . " 
                union all
                    SELECT pskt.loaiphieu,tkno2 as tk,pskt.mapskt as sophieu,noidung2 as noidung,mand2 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,chitiet_pskt.gtvnd2 as tienco,0 as tienno,pskt.tkco as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,4 as sapxep FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  loaitokhai='0' and pskt.loaiphieu in(1,3,5,7,9,11,13,15,17,19,21,23,25,27,29,31,33,35,37,39,41,43,45,47,49,51,53,55,57,59,61,63,65,67,69,71,73,75,77,79,81,83,85,87,89) and tkno2 in ('" . $matk . "') $sql_mand2  " . $this->getStrOderby() . "
                union all
                    SELECT pskt.loaiphieu,pskt.tkco as tk,pskt.mapskt as sophieu,noidung1 as noidung,mand1 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,0 as tienco,chitiet_pskt.gtvnd1 as tienno,chitiet_pskt.tkno1 as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,4 as sapxep FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  loaitokhai='0' and pskt.loaiphieu in(1,3,5,7,9,11,13,15,17,19,21,23,25,27,29,31,33,35,37,39,41,43,45,47,49,51,53,55,57,59,61,63,65,67,69,71,73,75,77,79,81,83,85,87,89) and pskt.tkco in ('" . $matk . "') $sql_mand1  " . $this->getStrOderby() . "
                union all
                    SELECT pskt.loaiphieu,pskt.tkco as tk,pskt.mapskt as sophieu,noidung2 as noidung,mand2 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,0 as tienco,chitiet_pskt.gtvnd2 as tienno,chitiet_pskt.tkno2 as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,4 as sapxep FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  loaitokhai='0' and chitiet_pskt.tkno2!=0 and pskt.loaiphieu in(1,3,5,7,9,11,13,15,17,19,21,23,25,27,29,31,33,35,37,39,41,43,45,47,49,51,53,55,57,59,61,63,65,67,69,71,73,75,77,79,81,83,85,87,89) and pskt.tkco in ('" . $matk . "') $sql_mand2 " . $this->getStrOderby() . "
                union all
                    SELECT pskt.loaiphieu,tkno1 as tk,pskt.mapskt as sophieu,noidung1 as noidung,mand1 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,0 as tienco,chitiet_pskt.gtvnd1 as tienno,pskt.tkco as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,3 as sapxep FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  loaitokhai='0' and pskt.loaiphieu in(2,4,6,8,10,12,14,16,18,20,22,24,26,28,30,32,34,36,38,40,42,44,46,48,50,52,54,56,58,60,62,64,66,68) and tkno1 in ('" . $matk . "') $sql_mand1  " . $this->getStrOderby() . "
                union all
                    SELECT pskt.loaiphieu,tkno2 as tk,pskt.mapskt as sophieu,noidung2 as noidung,mand2 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,0 as tienco,chitiet_pskt.gtvnd2 as tienno,pskt.tkco as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,3 as sapxep FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  loaitokhai='0' and pskt.loaiphieu in(2,4,6,8,10,12,14,16,18,20,22,24,26,28,30,32,34,36,38,40,42,44,46,48,50,52,54,56,58,60,62,64,66,68) and tkno2 in ('" . $matk . "') $sql_mand2 " . $this->getStrOderby() . "
                union all
                    SELECT psvt.loaiphieu,dinhkhoan_psvt.tkno as tk,mapskt as sophieu,noidung as noidung,mand as mand,ngayghiso,sct,ngayhoadon,chuthich,0 as tienco,sotien as tienno,dinhkhoan_psvt.tkco as tkdu,MONTH(ngayghiso) as thang,dinhkhoan_psvt.sott,1 as sapxep FROM psvt INNER JOIN dinhkhoan_psvt on(psvt.sophieu=dinhkhoan_psvt.sophieu) where 0=0  and loaitokhai='0' and dinhkhoan_psvt.tkno in ('" . $matk . "') $sql_mand3 " . $this->getStrOderby2() . "
                union all
                    SELECT psvt.loaiphieu,dinhkhoan_psvt.tkco as tk,mapskt as sophieu,noidung as noidung,mand as mand,ngayghiso,sct,ngayhoadon,chuthich,sotien as tienco,0 as tienno,dinhkhoan_psvt.tkno as tkdu,MONTH(ngayghiso) as thang,dinhkhoan_psvt.sott,1 as sapxep FROM psvt INNER JOIN dinhkhoan_psvt on(psvt.sophieu=dinhkhoan_psvt.sophieu) where 0=0  and loaitokhai='0' and dinhkhoan_psvt.tkco in ('" . $matk . "') $sql_mand3 " . $this->getStrOderby2() . "
        order by $sapxep,sapxep DESC,tienno DESC";

        $this->query($sql);
        $row = array();
        $i = 0;
        while ($data = $this->fetch()) {
            $tk = $data['tk'];
            $tkdu = $data['tkdu'];
            if ($data['tkdu'] == "1331") {
                if ($data['mand'] == "") {
                    $data['noidung'] = "Thuế GTGT đầu vào";
                    $data['mand'] = "100000";
                }
            }
            if ($data['tkdu'] == "1332") {
                if ($data['mand'] == "") {
                    $data['noidung'] = "Thuế GTGT được khấu trừ của TSCĐ";
                }
            }
            if ($data['tkdu'] == "33311") {
                if ($data['mand'] == "") {
                    $data['noidung'] = "Thuế GTGT đầu ra";
                    $data['mand'] = "100001";
                }
            }
            if ($data['tkdu'] == "33312") {
                if ($data['mand'] == "") {
                    $data['noidung'] = "Thuế GTGT hàng hóa nhập khẩu";
                }
            }
            if ($theonoidung == 'ALL') {
                $row[] = $data;
            } else {
                if ($theonoidung == $data['mand'])
                    $row[] = $data;
            }
        }
        return $row;

    }

    public function load_danhsach_socai_theotk_chinhthuc($matk_str, $theonoidung, $sapxep)/// Lấy sổ cái tờ khai bổ sung
    {// Lấy danh sách phiếu chi trong sổ cái
        $matk_arr = explode(",", $matk_str);
        $matk = implode("','", $matk_arr);
        if ($theonoidung == 'ALL') {
            $sql_mand1 = " ";
            $sql_mand2 = " ";
        } else {
            $sql_mand1 = " and mand1='" . $theonoidung . "'";
            $sql_mand2 = " and mand2='" . $theonoidung . "'";
            $sql_mand3 = " and mand='" . $theonoidung . "'";
        }
        $sql = "SELECT pskt.loaiphieu,pskt.tkco as tk,pskt.mapskt as sophieu,noidung1 as noidung,mand1 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,(chitiet_pskt.gtvnd1) as tienco,0 as tienno,chitiet_pskt.tkno1 as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,3 as sapxep FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  loaitokhai='1' and  pskt.loaiphieu in(2,4,6,8,10,12,14,16,18,20,22,24,26,28,30,32,34,36,38,40,42,44,46,48,50,52,54,56,58,60,62,64,66,68) and pskt.tkco in ('" . $matk . "') $sql_mand1  " . $this->getStrOderby() . "
                union all
                    SELECT pskt.loaiphieu,pskt.tkco as tk,pskt.mapskt as sophieu,noidung2 as noidung,mand2 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,chitiet_pskt.gtvnd2 as tienco,0 as tienno,chitiet_pskt.tkno2 as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,3 as sapxep FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  loaitokhai='1' and chitiet_pskt.tkno2!=0 and pskt.loaiphieu in(2,4,6,8,10,12,14,16,18,20,22,24,26,28,30,32,34,36,38,40,42,44,46,48,50,52,54,56,58,60,62,64,66,68) and pskt.tkco in ('" . $matk . "') $sql_mand2  " . $this->getStrOderby() . " 
                union all
                    SELECT pskt.loaiphieu,tkno1 as tk,pskt.mapskt as sophieu,noidung1 as noidung,mand1 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,chitiet_pskt.gtvnd1 as tienco,0 as tienno,pskt.tkco as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,4 as sapxep FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  loaitokhai='1' and pskt.loaiphieu in(1,3,5,7,9,11,13,15,17,19,21,23,25,27,29,31,33,35,37,39,41,43,45,47,49,51,53,55,57,59,61,63,65,67,69,71,73,75,77,79,81,83,85,87,89) and tkno1 in ('" . $matk . "') $sql_mand1  " . $this->getStrOderby() . " 
                union all
                    SELECT pskt.loaiphieu,tkno2 as tk,pskt.mapskt as sophieu,noidung2 as noidung,mand2 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,chitiet_pskt.gtvnd2 as tienco,0 as tienno,pskt.tkco as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,4 as sapxep FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  loaitokhai='1' and pskt.loaiphieu in(1,3,5,7,9,11,13,15,17,19,21,23,25,27,29,31,33,35,37,39,41,43,45,47,49,51,53,55,57,59,61,63,65,67,69,71,73,75,77,79,81,83,85,87,89) and tkno2 in ('" . $matk . "') $sql_mand2  " . $this->getStrOderby() . "
                union all
                    SELECT pskt.loaiphieu,pskt.tkco as tk,pskt.mapskt as sophieu,noidung1 as noidung,mand1 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,0 as tienco,chitiet_pskt.gtvnd1 as tienno,chitiet_pskt.tkno1 as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,4 as sapxep FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  loaitokhai='1' and pskt.loaiphieu in(1,3,5,7,9,11,13,15,17,19,21,23,25,27,29,31,33,35,37,39,41,43,45,47,49,51,53,55,57,59,61,63,65,67,69,71,73,75,77,79,81,83,85,87,89) and pskt.tkco in ('" . $matk . "') $sql_mand1  " . $this->getStrOderby() . "
                union all
                    SELECT pskt.loaiphieu,pskt.tkco as tk,pskt.mapskt as sophieu,noidung2 as noidung,mand2 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,0 as tienco,chitiet_pskt.gtvnd2 as tienno,chitiet_pskt.tkno2 as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,4 as sapxep FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  loaitokhai='1' and chitiet_pskt.tkno2!=0 and pskt.loaiphieu in(1,3,5,7,9,11,13,15,17,19,21,23,25,27,29,31,33,35,37,39,41,43,45,47,49,51,53,55,57,59,61,63,65,67,69,71,73,75,77,79,81,83,85,87,89) and pskt.tkco in ('" . $matk . "') $sql_mand2 " . $this->getStrOderby() . "
                union all
                    SELECT pskt.loaiphieu,tkno1 as tk,pskt.mapskt as sophieu,noidung1 as noidung,mand1 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,0 as tienco,chitiet_pskt.gtvnd1 as tienno,pskt.tkco as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,3 as sapxep FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  loaitokhai='1' and pskt.loaiphieu in(2,4,6,8,10,12,14,16,18,20,22,24,26,28,30,32,34,36,38,40,42,44,46,48,50,52,54,56,58,60,62,64,66,68) and tkno1 in ('" . $matk . "') $sql_mand1  " . $this->getStrOderby() . "
                union all
                    SELECT pskt.loaiphieu,tkno2 as tk,pskt.mapskt as sophieu,noidung2 as noidung,mand2 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,0 as tienco,chitiet_pskt.gtvnd2 as tienno,pskt.tkco as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,3 as sapxep FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  loaitokhai='1' and pskt.loaiphieu in(2,4,6,8,10,12,14,16,18,20,22,24,26,28,30,32,34,36,38,40,42,44,46,48,50,52,54,56,58,60,62,64,66,68) and tkno2 in ('" . $matk . "') $sql_mand2 " . $this->getStrOderby() . "
                union all
                    SELECT psvt.loaiphieu,dinhkhoan_psvt.tkno as tk,mapskt as sophieu,noidung as noidung,mand as mand,ngayghiso,sct,ngayhoadon,chuthich,0 as tienco,sotien as tienno,dinhkhoan_psvt.tkco as tkdu,MONTH(ngayghiso) as thang,dinhkhoan_psvt.sott,1 as sapxep FROM psvt INNER JOIN dinhkhoan_psvt on(psvt.sophieu=dinhkhoan_psvt.sophieu) where 0=0  and loaitokhai='1' and dinhkhoan_psvt.tkno in ('" . $matk . "') $sql_mand3 " . $this->getStrOderby2() . "
                union all
                    SELECT psvt.loaiphieu,dinhkhoan_psvt.tkco as tk,mapskt as sophieu,noidung as noidung,mand as mand,ngayghiso,sct,ngayhoadon,chuthich,sotien as tienco,0 as tienno,dinhkhoan_psvt.tkno as tkdu,MONTH(ngayghiso) as thang,dinhkhoan_psvt.sott,1 as sapxep FROM psvt INNER JOIN dinhkhoan_psvt on(psvt.sophieu=dinhkhoan_psvt.sophieu) where 0=0  and loaitokhai='1' and dinhkhoan_psvt.tkco in ('" . $matk . "') $sql_mand3 " . $this->getStrOderby2() . "
        order by $sapxep,sapxep DESC,tienno DESC";

        $this->query($sql);
        $row = array();
        $i = 0;
        while ($data = $this->fetch()) {
            $tk = $data['tk'];
            $tkdu = $data['tkdu'];
            if ($data['tkdu'] == "1331") {
                if ($data['mand'] == "") {
                    $data['noidung'] = "Thuế GTGT đầu vào";
                    $data['mand'] = "100000";
                }
            }
            if ($data['tkdu'] == "1332") {
                if ($data['mand'] == "") {
                    $data['noidung'] = "Thuế GTGT được khấu trừ của TSCĐ";
                }
            }
            if ($data['tkdu'] == "33311") {
                if ($data['mand'] == "") {
                    $data['noidung'] = "Thuế GTGT đầu ra";
                    $data['mand'] = "100001";
                }
            }
            if ($data['tkdu'] == "33312") {
                if ($data['mand'] == "") {
                    $data['noidung'] = "Thuế GTGT hàng hóa nhập khẩu";
                }
            }
            if ($theonoidung == 'ALL') {
                $row[] = $data;
            } else {
                if ($theonoidung == $data['mand'])
                    $row[] = $data;
            }
        }
        return $row;

    }


    public function LayTongDuNoCuaTaiKhoan($matk_str, $theonoidung, $sapxep)
    {// load_danhsach_socai_chi_theotk() là 1
        $matk_arr = explode(",", $matk_str);
        $matk = implode("','", $matk_arr);
        if ($theonoidung == 'ALL') {
            $sql_mand1 = " ";
            $sql_mand2 = " ";
        } else {
            $sql_mand1 = " and mand1='" . $theonoidung . "'";
            $sql_mand2 = " and mand2='" . $theonoidung . "'";
            $sql_mand3 = " and mand='" . $theonoidung . "'";
        }
        $sql = "SELECT pskt.tkco as tk,(chitiet_pskt.gtvnd1) as tienco,0 as tienno,4 as sapxep FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where   pskt.loaiphieu in(2,4,6,8,10,12,14,16,18,20,22,24,26,28,30,32,34,36,38,40,42,44,46,48,50,52,54,56,58,60,62,64,66,68) and pskt.tkco in ('" . $matk . "') $sql_mand1  " . $this->getStrOderby() . "
                union all
                    SELECT pskt.tkco as tk,chitiet_pskt.gtvnd2 as tienco,0 as tienno,4 as sapxep FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  chitiet_pskt.tkno2!=0 and pskt.loaiphieu in(2,4,6,8,10,12,14,16,18,20,22,24,26,28,30,32,34,36,38,40,42,44,46,48,50,52,54,56,58,60,62,64,66,68) and pskt.tkco in ('" . $matk . "') $sql_mand2  " . $this->getStrOderby() . " 
                union all
                    SELECT tkno1 as tk,chitiet_pskt.gtvnd1 as tienco,0 as tienno,1 as sapxep FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  pskt.loaiphieu in(1,3,5,7,9,11,13,15,17,19,21,23,25,27,29,31,33,35,37,39,41,43,45,47,49,51,53,55,57,59,61,63,65,67,69,71,73,75,77,79,81,83,85,87,89) and tkno1 in ('" . $matk . "') $sql_mand1  " . $this->getStrOderby() . " 
                union all
                    SELECT tkno2 as tk,chitiet_pskt.gtvnd2 as tienco,0 as tienno,1 as sapxep FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  pskt.loaiphieu in(1,3,5,7,9,11,13,15,17,19,21,23,25,27,29,31,33,35,37,39,41,43,45,47,49,51,53,55,57,59,61,63,65,67,69,71,73,75,77,79,81,83,85,87,89) and tkno2 in ('" . $matk . "') $sql_mand2  " . $this->getStrOderby() . "
                union all
                    SELECT pskt.tkco as tk,0 as tienco,chitiet_pskt.gtvnd1 as tienno,3 as sapxep FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  pskt.loaiphieu in(1,3,5,7,9,11,13,15,17,19,21,23,25,27,29,31,33,35,37,39,41,43,45,47,49,51,53,55,57,59,61,63,65,67,69,71,73,75,77,79,81,83,85,87,89) and pskt.tkco in ('" . $matk . "') $sql_mand1  " . $this->getStrOderby() . "
                union all
                    SELECT pskt.tkco as tk,0 as tienco,chitiet_pskt.gtvnd2 as tienno,3 as sapxep FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  chitiet_pskt.tkno2!=0 and pskt.loaiphieu in(1,3,5,7,9,11,13,15,17,19,21,23,25,27,29,31,33,35,37,39,41,43,45,47,49,51,53,55,57,59,61,63,65,67,69,71,73,75,77,79,81,83,85,87,89) and pskt.tkco in ('" . $matk . "') $sql_mand2 " . $this->getStrOderby() . "
                union all
                    SELECT tkno1 as tk,0 as tienco,chitiet_pskt.gtvnd1 as tienno,4 as sapxep FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  pskt.loaiphieu in(2,4,6,8,10,12,14,16,18,20,22,24,26,28,30,32,34,36,38,40,42,44,46,48,50,52,54,56,58,60,62,64,66,68) and tkno1 in ('" . $matk . "') $sql_mand1  " . $this->getStrOderby() . "
                union all
                    SELECT tkno2 as tk,0 as tienco,chitiet_pskt.gtvnd2 as tienno,4 as sapxep FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  pskt.loaiphieu in(2,4,6,8,10,12,14,16,18,20,22,24,26,28,30,32,34,36,38,40,42,44,46,48,50,52,54,56,58,60,62,64,66,68) and tkno2 in ('" . $matk . "') $sql_mand2 " . $this->getStrOderby() . "
                union all
                    SELECT dinhkhoan_psvt.tkno as tk,0 as tienco,sotien as tienno,1 as sapxep FROM psvt INNER JOIN dinhkhoan_psvt on(psvt.sophieu=dinhkhoan_psvt.sophieu) where 0=0 and dinhkhoan_psvt.tkno in ('" . $matk . "') $sql_mand3 " . $this->getStrOderby2() . "
                union all
                    SELECT dinhkhoan_psvt.tkco as tk,sotien as tienco,0 as tienno,1 as sapxep FROM psvt INNER JOIN dinhkhoan_psvt on(psvt.sophieu=dinhkhoan_psvt.sophieu) where 0=0 and dinhkhoan_psvt.tkco in ('" . $matk . "') $sql_mand3 " . $this->getStrOderby2();

        $this->query($sql);
        $row = array();
        $i = 0;
        while ($data = $this->fetch()) {
            $tk = $data['tk'];
            $row[$tk][] = $data;
        }
        return $row;

    }

    public function load_danhsach_no_co_theocongtrinh($matk_str, $theonoidung, $sapxep)// Không lấy mã 77 do mã 77 đã phan bổ rùi
    {// Lấy danh sách phiếu chi trong sổ cái
        $matk_arr = explode(",", $matk_str);
        $matk = implode("','", $matk_arr);
        $tongtienco = 0;
        $tongtienno = 0;
        if ($theonoidung == 'ALL') {
            $sql_mand1 = " ";
            $sql_mand2 = " ";
        } else {
            $sql_mand1 = " and mand1='" . $theonoidung . "'";
            $sql_mand2 = " and mand2='" . $theonoidung . "'";
            $sql_mand3 = " and mand='" . $theonoidung . "'";
        }
        $sql = "SELECT pskt.loaiphieu,pskt.tkco as tk,pskt.mapskt as sophieu,noidung1 as noidung,mand1 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,(chitiet_pskt.gtvnd1) as tienco,0 as tienno,chitiet_pskt.tkno1 as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,4 as sapxep,chitiet_pskt.mabp,chitiet_pskt.loaisp FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where   pskt.loaiphieu in(2,4,6,8,10,12,14,16,18,20,22,24,26,28,30,32,34,36,38,40,42,44,46,48,50,52,54,56,58,60,62,64,66,68) and pskt.tkco in ('" . $matk . "') $sql_mand1  " . $this->getStrOderby() . "
                union all
                    SELECT pskt.loaiphieu,pskt.tkco as tk,pskt.mapskt as sophieu,noidung2 as noidung,mand2 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,chitiet_pskt.gtvnd2 as tienco,0 as tienno,chitiet_pskt.tkno2 as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,4 as sapxep,chitiet_pskt.mabp,chitiet_pskt.loaisp FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  chitiet_pskt.tkno2!=0 and pskt.loaiphieu in(2,4,6,8,10,12,14,16,18,20,22,24,26,28,30,32,34,36,38,40,42,44,46,48,50,52,54,56,58,60,62,64,66,68) and pskt.tkco in ('" . $matk . "') $sql_mand2  " . $this->getStrOderby() . " 
                union all
                    SELECT pskt.loaiphieu,tkno1 as tk,pskt.mapskt as sophieu,noidung1 as noidung,mand1 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,chitiet_pskt.gtvnd1 as tienco,0 as tienno,pskt.tkco as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,1 as sapxep,chitiet_pskt.mabp,chitiet_pskt.loaisp FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  pskt.loaiphieu in(1,3,5,7,9,11,13,15,17,19,21,23,25,27,29,31,33,35,37,39,41,43,45,47,49,51,53,55,57,59,61,63,65,67,69,71,73,75,81,83) and tkno1 in ('" . $matk . "') $sql_mand1  " . $this->getStrOderby() . " 
                union all
                    SELECT pskt.loaiphieu,tkno2 as tk,pskt.mapskt as sophieu,noidung2 as noidung,mand2 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,chitiet_pskt.gtvnd2 as tienco,0 as tienno,pskt.tkco as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,1 as sapxep,chitiet_pskt.mabp,chitiet_pskt.loaisp FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  pskt.loaiphieu in(1,3,5,7,9,11,13,15,17,19,21,23,25,27,29,31,33,35,37,39,41,43,45,47,49,51,53,55,57,59,61,63,65,67,69,71,73,75,81,83) and tkno2 in ('" . $matk . "') $sql_mand2  " . $this->getStrOderby() . "
                union all
                    SELECT pskt.loaiphieu,pskt.tkco as tk,pskt.mapskt as sophieu,noidung1 as noidung,mand1 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,0 as tienco,chitiet_pskt.gtvnd1 as tienno,chitiet_pskt.tkno1 as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,3 as sapxep,chitiet_pskt.mabp,chitiet_pskt.loaisp FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  pskt.loaiphieu in(1,3,5,7,9,11,13,15,17,19,21,23,25,27,29,31,33,35,37,39,41,43,45,47,49,51,53,55,57,59,61,63,65,67,69,71,73,75,81,83) and pskt.tkco in ('" . $matk . "') $sql_mand1  " . $this->getStrOderby() . "
                union all
                    SELECT pskt.loaiphieu,pskt.tkco as tk,pskt.mapskt as sophieu,noidung2 as noidung,mand2 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,0 as tienco,chitiet_pskt.gtvnd2 as tienno,chitiet_pskt.tkno2 as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,3 as sapxep,chitiet_pskt.mabp,chitiet_pskt.loaisp FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  chitiet_pskt.tkno2!=0 and pskt.loaiphieu in(1,3,5,7,9,11,13,15,17,19,21,23,25,27,29,31,33,35,37,39,41,43,45,47,49,51,53,55,57,59,61,63,65,67,69,71,73,75,81,83) and pskt.tkco in ('" . $matk . "') $sql_mand2 " . $this->getStrOderby() . "
                union all
                    SELECT pskt.loaiphieu,tkno1 as tk,pskt.mapskt as sophieu,noidung1 as noidung,mand1 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,0 as tienco,chitiet_pskt.gtvnd1 as tienno,pskt.tkco as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,4 as sapxep,chitiet_pskt.mabp,chitiet_pskt.loaisp FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  pskt.loaiphieu in(2,4,6,8,10,12,14,16,18,20,22,24,26,28,30,32,34,36,38,40,42,44,46,48,50,52,54,56,58,60,62,64,66,68) and tkno1 in ('" . $matk . "') $sql_mand1  " . $this->getStrOderby() . "
                union all
                    SELECT pskt.loaiphieu,tkno2 as tk,pskt.mapskt as sophieu,noidung2 as noidung,mand2 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,0 as tienco,chitiet_pskt.gtvnd2 as tienno,pskt.tkco as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,4 as sapxep,chitiet_pskt.mabp,chitiet_pskt.loaisp FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  pskt.loaiphieu in(2,4,6,8,10,12,14,16,18,20,22,24,26,28,30,32,34,36,38,40,42,44,46,48,50,52,54,56,58,60,62,64,66,68) and tkno2 in ('" . $matk . "') $sql_mand2 " . $this->getStrOderby() . "
                union all
                   SELECT psvt.loaiphieu,dinhkhoan_psvt.tkno as tk,mapskt as sophieu,noidung as noidung,mand as mand,ngayghiso,sct,ngayhoadon,chuthich,0 as tienco,sotien as tienno,dinhkhoan_psvt.tkco as tkdu,MONTH(ngayghiso) as thang,dinhkhoan_psvt.sott,1 as sapxep,psvt.makho as mabp,psvt.loaisp FROM psvt INNER JOIN dinhkhoan_psvt on(psvt.sophieu=dinhkhoan_psvt.sophieu) where 0=0  and dinhkhoan_psvt.tkno in ('" . $matk . "') $sql_mand3 " . $this->getStrOderby2() . "
                union all
                    SELECT psvt.loaiphieu,dinhkhoan_psvt.tkco as tk,mapskt as sophieu,noidung as noidung,mand as mand,ngayghiso,sct,ngayhoadon,chuthich,sotien as tienco,0 as tienno,dinhkhoan_psvt.tkno as tkdu,MONTH(ngayghiso) as thang,dinhkhoan_psvt.sott,1 as sapxep,psvt.makho as mabp,psvt.loaisp FROM psvt INNER JOIN dinhkhoan_psvt on(psvt.sophieu=dinhkhoan_psvt.sophieu) where 0=0  and dinhkhoan_psvt.tkco in ('" . $matk . "') $sql_mand3 " . $this->getStrOderby2() . "
         order by sott";

        $this->query($sql);
        $row = array();
        $i = 0;
        while ($data = $this->fetch()) {
            $tk = $data['tk'];
            $tkdu = $data['tkdu'];
            if ($data['tkdu'] == "1331") {
                if ($data['mand'] == "") {
                    $data['noidung'] = "Thuế GTGT đầu vào";
                    $data['mand'] = "100000";
                }
            }
            if ($data['tkdu'] == "1332") {
                if ($data['mand'] == "") {
                    $data['noidung'] = "Thuế GTGT được khấu trừ của TSCĐ";
                }
            }
            if ($data['tkdu'] == "33311") {
                if ($data['mand'] == "") {
                    $data['noidung'] = "Thuế GTGT đầu ra";
                    $data['mand'] = "100001";
                }
            }
            if ($data['tkdu'] == "33312") {
                if ($data['mand'] == "") {
                    $data['noidung'] = "Thuế GTGT hàng hóa nhập khẩu";
                }
            }
            $theomabp = $data['mabp'];
            $data['tienco'] += $row[$theomabp]['tienco'];
            $data['tienno'] += $row[$theomabp]['tienno'];

            $row[$theomabp] = $data;
        }
        return $row;

    }
    public function load_danhsach_no_co_theocongtrinh_tungtaikhoan($matk_str, $theonoidung, $sapxep)// Không lấy mã 77 do mã 77 đã phan bổ rùi
    {// Lấy danh sách phiếu chi trong sổ cái
        $matk_arr = explode(",", $matk_str);
        $matk = implode("','", $matk_arr);
        $tongtienco = 0;
        $tongtienno = 0;
        if ($theonoidung == 'ALL') {
            $sql_mand1 = " ";
            $sql_mand2 = " ";
        } else {
            $sql_mand1 = " and mand1='" . $theonoidung . "'";
            $sql_mand2 = " and mand2='" . $theonoidung . "'";
            $sql_mand3 = " and mand='" . $theonoidung . "'";
        }
        $sql = "SELECT pskt.loaiphieu,pskt.tkco as tk,pskt.mapskt as sophieu,noidung1 as noidung,mand1 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,(chitiet_pskt.gtvnd1) as tienco,0 as tienno,chitiet_pskt.tkno1 as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,4 as sapxep,chitiet_pskt.mabp,chitiet_pskt.loaisp FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where   pskt.loaiphieu in(2,4,6,8,10,12,14,16,18,20,22,24,26,28,30,32,34,36,38,40,42,44,46,48,50,52,54,56,58,60,62,64,66,68) and pskt.tkco in ('" . $matk . "') $sql_mand1  " . $this->getStrOderby() . "
                union all
                    SELECT pskt.loaiphieu,pskt.tkco as tk,pskt.mapskt as sophieu,noidung2 as noidung,mand2 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,chitiet_pskt.gtvnd2 as tienco,0 as tienno,chitiet_pskt.tkno2 as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,4 as sapxep,chitiet_pskt.mabp,chitiet_pskt.loaisp FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  chitiet_pskt.tkno2!=0 and pskt.loaiphieu in(2,4,6,8,10,12,14,16,18,20,22,24,26,28,30,32,34,36,38,40,42,44,46,48,50,52,54,56,58,60,62,64,66,68) and pskt.tkco in ('" . $matk . "') $sql_mand2  " . $this->getStrOderby() . " 
                union all
                    SELECT pskt.loaiphieu,tkno1 as tk,pskt.mapskt as sophieu,noidung1 as noidung,mand1 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,chitiet_pskt.gtvnd1 as tienco,0 as tienno,pskt.tkco as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,1 as sapxep,chitiet_pskt.mabp,chitiet_pskt.loaisp FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  pskt.loaiphieu in(1,3,5,7,9,11,13,15,17,19,21,23,25,27,29,31,33,35,37,39,41,43,45,47,49,51,53,55,57,59,61,63,65,67,69,71,73,75,81,83) and tkno1 in ('" . $matk . "') $sql_mand1  " . $this->getStrOderby() . " 
                union all
                    SELECT pskt.loaiphieu,tkno2 as tk,pskt.mapskt as sophieu,noidung2 as noidung,mand2 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,chitiet_pskt.gtvnd2 as tienco,0 as tienno,pskt.tkco as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,1 as sapxep,chitiet_pskt.mabp,chitiet_pskt.loaisp FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  pskt.loaiphieu in(1,3,5,7,9,11,13,15,17,19,21,23,25,27,29,31,33,35,37,39,41,43,45,47,49,51,53,55,57,59,61,63,65,67,69,71,73,75,81,83) and tkno2 in ('" . $matk . "') $sql_mand2  " . $this->getStrOderby() . "
                union all
                    SELECT pskt.loaiphieu,pskt.tkco as tk,pskt.mapskt as sophieu,noidung1 as noidung,mand1 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,0 as tienco,chitiet_pskt.gtvnd1 as tienno,chitiet_pskt.tkno1 as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,3 as sapxep,chitiet_pskt.mabp,chitiet_pskt.loaisp FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  pskt.loaiphieu in(1,3,5,7,9,11,13,15,17,19,21,23,25,27,29,31,33,35,37,39,41,43,45,47,49,51,53,55,57,59,61,63,65,67,69,71,73,75,81,83) and pskt.tkco in ('" . $matk . "') $sql_mand1  " . $this->getStrOderby() . "
                union all
                    SELECT pskt.loaiphieu,pskt.tkco as tk,pskt.mapskt as sophieu,noidung2 as noidung,mand2 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,0 as tienco,chitiet_pskt.gtvnd2 as tienno,chitiet_pskt.tkno2 as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,3 as sapxep,chitiet_pskt.mabp,chitiet_pskt.loaisp FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  chitiet_pskt.tkno2!=0 and pskt.loaiphieu in(1,3,5,7,9,11,13,15,17,19,21,23,25,27,29,31,33,35,37,39,41,43,45,47,49,51,53,55,57,59,61,63,65,67,69,71,73,75,81,83) and pskt.tkco in ('" . $matk . "') $sql_mand2 " . $this->getStrOderby() . "
                union all
                    SELECT pskt.loaiphieu,tkno1 as tk,pskt.mapskt as sophieu,noidung1 as noidung,mand1 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,0 as tienco,chitiet_pskt.gtvnd1 as tienno,pskt.tkco as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,4 as sapxep,chitiet_pskt.mabp,chitiet_pskt.loaisp FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  pskt.loaiphieu in(2,4,6,8,10,12,14,16,18,20,22,24,26,28,30,32,34,36,38,40,42,44,46,48,50,52,54,56,58,60,62,64,66,68) and tkno1 in ('" . $matk . "') $sql_mand1  " . $this->getStrOderby() . "
                union all
                    SELECT pskt.loaiphieu,tkno2 as tk,pskt.mapskt as sophieu,noidung2 as noidung,mand2 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,0 as tienco,chitiet_pskt.gtvnd2 as tienno,pskt.tkco as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,4 as sapxep,chitiet_pskt.mabp,chitiet_pskt.loaisp FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  pskt.loaiphieu in(2,4,6,8,10,12,14,16,18,20,22,24,26,28,30,32,34,36,38,40,42,44,46,48,50,52,54,56,58,60,62,64,66,68) and tkno2 in ('" . $matk . "') $sql_mand2 " . $this->getStrOderby() . "
                union all
                   SELECT psvt.loaiphieu,dinhkhoan_psvt.tkno as tk,mapskt as sophieu,noidung as noidung,mand as mand,ngayghiso,sct,ngayhoadon,chuthich,0 as tienco,sotien as tienno,dinhkhoan_psvt.tkco as tkdu,MONTH(ngayghiso) as thang,dinhkhoan_psvt.sott,1 as sapxep,psvt.makho as mabp,psvt.loaisp FROM psvt INNER JOIN dinhkhoan_psvt on(psvt.sophieu=dinhkhoan_psvt.sophieu) where 0=0  and dinhkhoan_psvt.tkno in ('" . $matk . "') $sql_mand3 " . $this->getStrOderby2() . "
                union all
                    SELECT psvt.loaiphieu,dinhkhoan_psvt.tkco as tk,mapskt as sophieu,noidung as noidung,mand as mand,ngayghiso,sct,ngayhoadon,chuthich,sotien as tienco,0 as tienno,dinhkhoan_psvt.tkno as tkdu,MONTH(ngayghiso) as thang,dinhkhoan_psvt.sott,1 as sapxep,psvt.makho as mabp,psvt.loaisp FROM psvt INNER JOIN dinhkhoan_psvt on(psvt.sophieu=dinhkhoan_psvt.sophieu) where 0=0  and dinhkhoan_psvt.tkco in ('" . $matk . "') $sql_mand3 " . $this->getStrOderby2() . "
         order by sott";

        $this->query($sql);
        $row = array();
        $i = 0;
        while ($data = $this->fetch()) {
            $tk = $data['tk'];
            $tkdu = $data['tkdu'];
            if ($data['tkdu'] == "1331") {
                if ($data['mand'] == "") {
                    $data['noidung'] = "Thuế GTGT đầu vào";
                    $data['mand'] = "100000";
                }
            }
            if ($data['tkdu'] == "1332") {
                if ($data['mand'] == "") {
                    $data['noidung'] = "Thuế GTGT được khấu trừ của TSCĐ";
                }
            }
            if ($data['tkdu'] == "33311") {
                if ($data['mand'] == "") {
                    $data['noidung'] = "Thuế GTGT đầu ra";
                    $data['mand'] = "100001";
                }
            }
            if ($data['tkdu'] == "33312") {
                if ($data['mand'] == "") {
                    $data['noidung'] = "Thuế GTGT hàng hóa nhập khẩu";
                }
            }
            $theomabp = $data['mabp'];
            $data['tienco'] += $row[$theomabp][$tk]['tienco'];
            $data['tienno'] += $row[$theomabp][$tk]['tienno'];

            $row[$theomabp][$tk] = $data;
        }
        return $row;

    }

    public function load_danhsach_no_co_theocongtrinh_CPKhongDuocTru($matk_str, $theonoidung, $sapxep)// Không lấy mã 77 do mã 77 đã phan bổ rùi
    {// Lấy danh sách phiếu chi trong sổ cái
        $matk_arr = explode(",", $matk_str);
        $matk = implode("','", $matk_arr);
        $tongtienco = 0;
        $tongtienno = 0;
        if ($theonoidung == 'ALL') {
            $sql_mand1 = " ";
            $sql_mand2 = " ";
        } else {
            $sql_mand1 = " and mand1='" . $theonoidung . "'";
            $sql_mand2 = " and mand2='" . $theonoidung . "'";
            $sql_mand3 = " and mand='" . $theonoidung . "'";
        }
        $sql = "SELECT pskt.loaiphieu,pskt.tkco as tk,pskt.mapskt as sophieu,noidung1 as noidung,mand1 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,(chitiet_pskt.gtvnd1) as tienco,0 as tienno,chitiet_pskt.tkno1 as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,4 as sapxep,chitiet_pskt.mabp,chitiet_pskt.loaisp FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where   pskt.loaiphieu in(2,4,6,8,10,12,14,16,18,20,22,24,26,28,30,32,34,36,38,40,42,44,46,48,50,52,54,56,58,60,62,64,66,68) and pskt.tkco in ('" . $matk . "') and chiphikhongloaitru=1 and duyetcpduoctru=1 $sql_mand1  " . $this->getStrOderby() . "
                union all
                    SELECT pskt.loaiphieu,pskt.tkco as tk,pskt.mapskt as sophieu,noidung2 as noidung,mand2 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,chitiet_pskt.gtvnd2 as tienco,0 as tienno,chitiet_pskt.tkno2 as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,4 as sapxep,chitiet_pskt.mabp,chitiet_pskt.loaisp FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  chitiet_pskt.tkno2!=0 and pskt.loaiphieu in(2,4,6,8,10,12,14,16,18,20,22,24,26,28,30,32,34,36,38,40,42,44,46,48,50,52,54,56,58,60,62,64,66,68) and pskt.tkco in ('" . $matk . "') and chiphikhongloaitru=1 and duyetcpduoctru=1 $sql_mand2  " . $this->getStrOderby() . " 
                union all
                    SELECT pskt.loaiphieu,tkno1 as tk,pskt.mapskt as sophieu,noidung1 as noidung,mand1 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,chitiet_pskt.gtvnd1 as tienco,0 as tienno,pskt.tkco as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,1 as sapxep,chitiet_pskt.mabp,chitiet_pskt.loaisp FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  pskt.loaiphieu in(1,3,5,7,9,11,13,15,17,19,21,23,25,27,29,31,33,35,37,39,41,43,45,47,49,51,53,55,57,59,61,63,65,67,69,71,73,75,81,83) and tkno1 in ('" . $matk . "') and chiphikhongloaitru=1 and duyetcpduoctru=1 $sql_mand1  " . $this->getStrOderby() . " 
                union all
                    SELECT pskt.loaiphieu,tkno2 as tk,pskt.mapskt as sophieu,noidung2 as noidung,mand2 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,chitiet_pskt.gtvnd2 as tienco,0 as tienno,pskt.tkco as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,1 as sapxep,chitiet_pskt.mabp,chitiet_pskt.loaisp FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  pskt.loaiphieu in(1,3,5,7,9,11,13,15,17,19,21,23,25,27,29,31,33,35,37,39,41,43,45,47,49,51,53,55,57,59,61,63,65,67,69,71,73,75,81,83) and tkno2 in ('" . $matk . "') and chiphikhongloaitru=1 and duyetcpduoctru=1 $sql_mand2  " . $this->getStrOderby() . "
                union all
                    SELECT pskt.loaiphieu,pskt.tkco as tk,pskt.mapskt as sophieu,noidung1 as noidung,mand1 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,0 as tienco,chitiet_pskt.gtvnd1 as tienno,chitiet_pskt.tkno1 as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,3 as sapxep,chitiet_pskt.mabp,chitiet_pskt.loaisp FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  pskt.loaiphieu in(1,3,5,7,9,11,13,15,17,19,21,23,25,27,29,31,33,35,37,39,41,43,45,47,49,51,53,55,57,59,61,63,65,67,69,71,73,75,81,83) and pskt.tkco in ('" . $matk . "') and chiphikhongloaitru=1 and duyetcpduoctru=1  $sql_mand1  " . $this->getStrOderby() . "
                union all
                    SELECT pskt.loaiphieu,pskt.tkco as tk,pskt.mapskt as sophieu,noidung2 as noidung,mand2 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,0 as tienco,chitiet_pskt.gtvnd2 as tienno,chitiet_pskt.tkno2 as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,3 as sapxep,chitiet_pskt.mabp,chitiet_pskt.loaisp FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  chitiet_pskt.tkno2!=0 and pskt.loaiphieu in(1,3,5,7,9,11,13,15,17,19,21,23,25,27,29,31,33,35,37,39,41,43,45,47,49,51,53,55,57,59,61,63,65,67,69,71,73,75,81,83) and pskt.tkco in ('" . $matk . "') and chiphikhongloaitru=1 and duyetcpduoctru=1 $sql_mand2 " . $this->getStrOderby() . "
                union all
                    SELECT pskt.loaiphieu,tkno1 as tk,pskt.mapskt as sophieu,noidung1 as noidung,mand1 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,0 as tienco,chitiet_pskt.gtvnd1 as tienno,pskt.tkco as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,4 as sapxep,chitiet_pskt.mabp,chitiet_pskt.loaisp FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  pskt.loaiphieu in(2,4,6,8,10,12,14,16,18,20,22,24,26,28,30,32,34,36,38,40,42,44,46,48,50,52,54,56,58,60,62,64,66,68) and tkno1 in ('" . $matk . "') and chiphikhongloaitru=1 and duyetcpduoctru=1 $sql_mand1  " . $this->getStrOderby() . "
                union all
                    SELECT pskt.loaiphieu,tkno2 as tk,pskt.mapskt as sophieu,noidung2 as noidung,mand2 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,0 as tienco,chitiet_pskt.gtvnd2 as tienno,pskt.tkco as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,4 as sapxep,chitiet_pskt.mabp,chitiet_pskt.loaisp FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  pskt.loaiphieu in(2,4,6,8,10,12,14,16,18,20,22,24,26,28,30,32,34,36,38,40,42,44,46,48,50,52,54,56,58,60,62,64,66,68) and tkno2 in ('" . $matk . "') and chiphikhongloaitru=1 and duyetcpduoctru=1 $sql_mand2 " . $this->getStrOderby() . "
                union all
                   SELECT psvt.loaiphieu,dinhkhoan_psvt.tkno as tk,mapskt as sophieu,noidung as noidung,mand as mand,ngayghiso,sct,ngayhoadon,chuthich,0 as tienco,sotien as tienno,dinhkhoan_psvt.tkco as tkdu,MONTH(ngayghiso) as thang,dinhkhoan_psvt.sott,1 as sapxep,psvt.makho as mabp,psvt.loaisp FROM psvt INNER JOIN dinhkhoan_psvt on(psvt.sophieu=dinhkhoan_psvt.sophieu) where chiphikhongloaitru=1  and dinhkhoan_psvt.tkno in ('" . $matk . "') $sql_mand3 " . $this->getStrOderby2() . "
                union all
                    SELECT psvt.loaiphieu,dinhkhoan_psvt.tkco as tk,mapskt as sophieu,noidung as noidung,mand as mand,ngayghiso,sct,ngayhoadon,chuthich,sotien as tienco,0 as tienno,dinhkhoan_psvt.tkno as tkdu,MONTH(ngayghiso) as thang,dinhkhoan_psvt.sott,1 as sapxep,psvt.makho as mabp,psvt.loaisp FROM psvt INNER JOIN dinhkhoan_psvt on(psvt.sophieu=dinhkhoan_psvt.sophieu) where chiphikhongloaitru=1  and dinhkhoan_psvt.tkco in ('" . $matk . "') $sql_mand3 " . $this->getStrOderby2() . "
         order by sott";

        $this->query($sql);
        $row = array();
        $i = 0;
        while ($data = $this->fetch()) {
            $tk = $data['tk'];
            $tkdu = $data['tkdu'];
            if ($data['tkdu'] == "1331") {
                if ($data['mand'] == "") {
                    $data['noidung'] = "Thuế GTGT đầu vào";
                    $data['mand'] = "100000";
                }
            }
            if ($data['tkdu'] == "1332") {
                if ($data['mand'] == "") {
                    $data['noidung'] = "Thuế GTGT được khấu trừ của TSCĐ";
                }
            }
            if ($data['tkdu'] == "33311") {
                if ($data['mand'] == "") {
                    $data['noidung'] = "Thuế GTGT đầu ra";
                    $data['mand'] = "100001";
                }
            }
            if ($data['tkdu'] == "33312") {
                if ($data['mand'] == "") {
                    $data['noidung'] = "Thuế GTGT hàng hóa nhập khẩu";
                }
            }
            $theomabp = $data['mabp'];
            $data['tienco'] += $row[$theomabp]['tienco'];
            $data['tienno'] += $row[$theomabp]['tienno'];

            $row[$theomabp] = $data;
        }
        return $row;
    }

    public function load_danhsach_no_co_doanhthuthuan_theocongtrinh($matk_str, $theonoidung, $sapxep)
    {// Lấy danh sách phiếu chi trong sổ cái
        $matk_arr = explode(",", $matk_str);
        $matk = implode("','", $matk_arr);
        $tongtienco = 0;
        $tongtienno = 0;
        if ($theonoidung == 'ALL') {
            $sql_mand1 = " ";
            $sql_mand2 = " ";
        } else {
            $sql_mand1 = " and mand1='" . $theonoidung . "'";
            $sql_mand2 = " and mand2='" . $theonoidung . "'";
            $sql_mand3 = " and mand='" . $theonoidung . "'";
        }
        $sql = "SELECT pskt.loaiphieu,pskt.tkco as tk,pskt.mapskt as sophieu,noidung1 as noidung,mand1 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,(chitiet_pskt.gtvnd1) as tienco,0 as tienno,chitiet_pskt.tkno1 as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,4 as sapxep,chitiet_pskt.mabp,chitiet_pskt.loaisp FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where   pskt.loaiphieu in(2,4,6,8,10,12,14,16,18,20,22,24,26,28,30,32,34,36,38,40,42,44,46,48,50,52,54,56,58,60,62,64,66,68) and pskt.tkco in ('" . $matk . "') $sql_mand1  " . $this->getStrOderby() . "
                union all
                    SELECT pskt.loaiphieu,pskt.tkco as tk,pskt.mapskt as sophieu,noidung2 as noidung,mand2 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,chitiet_pskt.gtvnd2 as tienco,0 as tienno,chitiet_pskt.tkno2 as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,4 as sapxep,chitiet_pskt.mabp,chitiet_pskt.loaisp FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  chitiet_pskt.tkno2!=0 and pskt.loaiphieu in(2,4,6,8,10,12,14,16,18,20,22,24,26,28,30,32,34,36,38,40,42,44,46,48,50,52,54,56,58,60,62,64,66,68) and pskt.tkco in ('" . $matk . "') $sql_mand2  " . $this->getStrOderby() . " 
                union all
                    SELECT pskt.loaiphieu,tkno1 as tk,pskt.mapskt as sophieu,noidung1 as noidung,mand1 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,chitiet_pskt.gtvnd1 as tienco,0 as tienno,pskt.tkco as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,1 as sapxep,chitiet_pskt.mabp,chitiet_pskt.loaisp FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  pskt.loaiphieu in(1,3,5,7,9,11,13,15,17,19,21,23,25,27,29,31,33,35,37,39,41,43,45,47,49,51,53,55,57,59,61,63,65,67,69,71,73,75) and tkno1 in ('" . $matk . "') $sql_mand1  " . $this->getStrOderby() . " 
                union all
                    SELECT pskt.loaiphieu,tkno2 as tk,pskt.mapskt as sophieu,noidung2 as noidung,mand2 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,chitiet_pskt.gtvnd2 as tienco,0 as tienno,pskt.tkco as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,1 as sapxep,chitiet_pskt.mabp,chitiet_pskt.loaisp FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  pskt.loaiphieu in(1,3,5,7,9,11,13,15,17,19,21,23,25,27,29,31,33,35,37,39,41,43,45,47,49,51,53,55,57,59,61,63,65,67,69,71,73,75) and tkno2 in ('" . $matk . "') $sql_mand2  " . $this->getStrOderby() . "
                union all
                    SELECT pskt.loaiphieu,pskt.tkco as tk,pskt.mapskt as sophieu,noidung1 as noidung,mand1 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,0 as tienco,chitiet_pskt.gtvnd1 as tienno,chitiet_pskt.tkno1 as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,3 as sapxep,chitiet_pskt.mabp,chitiet_pskt.loaisp FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  pskt.loaiphieu in(1,3,5,7,9,11,13,15,17,19,21,23,25,27,29,31,33,35,37,39,41,43,45,47,49,51,53,55,57,59,61,63,65,67,69,71,73,75) and pskt.tkco in ('" . $matk . "') $sql_mand1  " . $this->getStrOderby() . "
                union all
                    SELECT pskt.loaiphieu,pskt.tkco as tk,pskt.mapskt as sophieu,noidung2 as noidung,mand2 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,0 as tienco,chitiet_pskt.gtvnd2 as tienno,chitiet_pskt.tkno2 as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,3 as sapxep,chitiet_pskt.mabp,chitiet_pskt.loaisp FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  chitiet_pskt.tkno2!=0 and pskt.loaiphieu in(1,3,5,7,9,11,13,15,17,19,21,23,25,27,29,31,33,35,37,39,41,43,45,47,49,51,53,55,57,59,61,63,65,67,69,71,73,75) and pskt.tkco in ('" . $matk . "') $sql_mand2 " . $this->getStrOderby() . "
                union all
                    SELECT pskt.loaiphieu,tkno1 as tk,pskt.mapskt as sophieu,noidung1 as noidung,mand1 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,0 as tienco,chitiet_pskt.gtvnd1 as tienno,pskt.tkco as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,4 as sapxep,chitiet_pskt.mabp,chitiet_pskt.loaisp FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  pskt.loaiphieu in(2,4,6,8,10,12,14,16,18,20,22,24,26,28,30,32,34,36,38,40,42,44,46,48,50,52,54,56,58,60,62,64,66,68) and tkno1 in ('" . $matk . "') $sql_mand1  " . $this->getStrOderby() . "
                union all
                    SELECT pskt.loaiphieu,tkno2 as tk,pskt.mapskt as sophieu,noidung2 as noidung,mand2 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,0 as tienco,chitiet_pskt.gtvnd2 as tienno,pskt.tkco as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,4 as sapxep,chitiet_pskt.mabp,chitiet_pskt.loaisp FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  pskt.loaiphieu in(2,4,6,8,10,12,14,16,18,20,22,24,26,28,30,32,34,36,38,40,42,44,46,48,50,52,54,56,58,60,62,64,66,68) and tkno2 in ('" . $matk . "') $sql_mand2 " . $this->getStrOderby() . "
                union all
                   SELECT psvt.loaiphieu,dinhkhoan_psvt.tkno as tk,psvt.mapskt as sophieu,noidung as noidung,mand as mand,ngayghiso,sct,ngayhoadon,chuthich,0 as tienco,thanhtien as tienno,dinhkhoan_psvt.tkco as tkdu,MONTH(ngayghiso) as thang,dinhkhoan_psvt.sott,1 as sapxep,chitiet_psvt.mavt as mabp,psvt.loaisp FROM psvt INNER JOIN dinhkhoan_psvt on(psvt.sophieu=dinhkhoan_psvt.sophieu) INNER JOIN chitiet_psvt on (psvt.sophieu = chitiet_psvt.sophieu) INNER JOIN masp on (chitiet_psvt.mavt = masp.masp) where 0=0  and dinhkhoan_psvt.tkno in ('" . $matk . "') $sql_mand3 " . $this->getStrOderby2() . "
                union all
                    SELECT psvt.loaiphieu,dinhkhoan_psvt.tkco as tk,psvt.mapskt as sophieu,noidung as noidung,mand as mand,ngayghiso,sct,ngayhoadon,chuthich,thanhtien as tienco,0 as tienno,dinhkhoan_psvt.tkno as tkdu,MONTH(ngayghiso) as thang,dinhkhoan_psvt.sott,1 as sapxep,chitiet_psvt.mavt as mabp,psvt.loaisp FROM psvt INNER JOIN dinhkhoan_psvt on(psvt.sophieu=dinhkhoan_psvt.sophieu) INNER JOIN chitiet_psvt on (psvt.sophieu = chitiet_psvt.sophieu) INNER JOIN masp on (chitiet_psvt.mavt = masp.masp) where 0=0  and dinhkhoan_psvt.tkco in ('" . $matk . "') $sql_mand3 " . $this->getStrOderby2() . "
         order by sott";

        $this->query($sql);
        $row = array();
        $i = 0;
        while ($data = $this->fetch()) {
            $tk = $data['tk'];
            $tkdu = $data['tkdu'];
            if ($data['tkdu'] == "1331") {
                if ($data['mand'] == "") {
                    $data['noidung'] = "Thuế GTGT đầu vào";
                    $data['mand'] = "100000";
                }
            }
            if ($data['tkdu'] == "1332") {
                if ($data['mand'] == "") {
                    $data['noidung'] = "Thuế GTGT được khấu trừ của TSCĐ";
                }
            }
            if ($data['tkdu'] == "33311") {
                if ($data['mand'] == "") {
                    $data['noidung'] = "Thuế GTGT đầu ra";
                    $data['mand'] = "100001";
                }
            }
            if ($data['tkdu'] == "33312") {
                if ($data['mand'] == "") {
                    $data['noidung'] = "Thuế GTGT hàng hóa nhập khẩu";
                }
            }
            $theomabp = $data['mabp'];
            $data['tienco'] += $row[$theomabp]['tienco'];
            $data['tienno'] += $row[$theomabp]['tienno'];

            $row[$theomabp] = $data;
        }
        return $row;

    }

    public function load_danhsach_no_co_CPSXChungToanBo($matk_str, $theonoidung, $sapxep)
    {// Lấy danh sách phiếu chi trong sổ cái
        $matk_arr = explode(",", $matk_str);
        $matk = implode("','", $matk_arr);
        $tongtienco = 0;
        $tongtienno = 0;
        if ($theonoidung == 'ALL') {
            $sql_mand1 = " ";
            $sql_mand2 = " ";
        } else {
            $sql_mand1 = " and mand1='" . $theonoidung . "'";
            $sql_mand2 = " and mand2='" . $theonoidung . "'";
            $sql_mand3 = " and mand='" . $theonoidung . "'";
        }
        $sql = "SELECT pskt.loaiphieu,pskt.tkco as tk,pskt.mapskt as sophieu,noidung1 as noidung,mand1 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,(chitiet_pskt.gtvnd1) as tienco,0 as tienno,chitiet_pskt.tkno1 as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,4 as sapxep,chitiet_pskt.mabp,chitiet_pskt.loaisp FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where   pskt.loaiphieu in(2,4,6,8,10,12,14,16,18,20,22,24,26,28,30,32,34,36,38,40,42,44,46,48,50,52,54,56,58,60,62,64,66,68) and pskt.tkco in ('" . $matk . "') $sql_mand1  " . $this->getStrOderby() . "
                union all
                    SELECT pskt.loaiphieu,pskt.tkco as tk,pskt.mapskt as sophieu,noidung2 as noidung,mand2 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,chitiet_pskt.gtvnd2 as tienco,0 as tienno,chitiet_pskt.tkno2 as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,4 as sapxep,chitiet_pskt.mabp,chitiet_pskt.loaisp FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  chitiet_pskt.tkno2!=0 and pskt.loaiphieu in(2,4,6,8,10,12,14,16,18,20,22,24,26,28,30,32,34,36,38,40,42,44,46,48,50,52,54,56,58,60,62,64,66,68) and pskt.tkco in ('" . $matk . "') $sql_mand2  " . $this->getStrOderby() . " 
                union all
                    SELECT pskt.loaiphieu,tkno1 as tk,pskt.mapskt as sophieu,noidung1 as noidung,mand1 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,chitiet_pskt.gtvnd1 as tienco,0 as tienno,pskt.tkco as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,1 as sapxep,chitiet_pskt.mabp,chitiet_pskt.loaisp FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  pskt.loaiphieu in(1,3,5,7,9,11,13,15,17,19,21,23,25,27,29,31,33,35,37,39,41,43,45,47,49,51,53,55,57,59,61,63,65,67,69,71,73,75,77,79,81,83,85,87,89) and tkno1 in ('" . $matk . "') $sql_mand1  " . $this->getStrOderby() . " 
                union all
                    SELECT pskt.loaiphieu,tkno2 as tk,pskt.mapskt as sophieu,noidung2 as noidung,mand2 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,chitiet_pskt.gtvnd2 as tienco,0 as tienno,pskt.tkco as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,1 as sapxep,chitiet_pskt.mabp,chitiet_pskt.loaisp FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  pskt.loaiphieu in(1,3,5,7,9,11,13,15,17,19,21,23,25,27,29,31,33,35,37,39,41,43,45,47,49,51,53,55,57,59,61,63,65,67,69,71,73,75,77,79,81,83,85,87,89) and tkno2 in ('" . $matk . "') $sql_mand2  " . $this->getStrOderby() . "
                union all
                    SELECT pskt.loaiphieu,pskt.tkco as tk,pskt.mapskt as sophieu,noidung1 as noidung,mand1 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,0 as tienco,chitiet_pskt.gtvnd1 as tienno,chitiet_pskt.tkno1 as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,3 as sapxep,chitiet_pskt.mabp,chitiet_pskt.loaisp FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  pskt.loaiphieu in(1,3,5,7,9,11,13,15,17,19,21,23,25,27,29,31,33,35,37,39,41,43,45,47,49,51,53,55,57,59,61,63,65,67,69,71,73,75,77,79,81,83,85,87,89) and pskt.tkco in ('" . $matk . "') $sql_mand1  " . $this->getStrOderby() . "
                union all
                    SELECT pskt.loaiphieu,pskt.tkco as tk,pskt.mapskt as sophieu,noidung2 as noidung,mand2 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,0 as tienco,chitiet_pskt.gtvnd2 as tienno,chitiet_pskt.tkno2 as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,3 as sapxep,chitiet_pskt.mabp,chitiet_pskt.loaisp FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  chitiet_pskt.tkno2!=0 and pskt.loaiphieu in(1,3,5,7,9,11,13,15,17,19,21,23,25,27,29,31,33,35,37,39,41,43,45,47,49,51,53,55,57,59,61,63,65,67,69,71,73,75,77,79,81,83,85,87,89) and pskt.tkco in ('" . $matk . "') $sql_mand2 " . $this->getStrOderby() . "
                union all
                    SELECT pskt.loaiphieu,tkno1 as tk,pskt.mapskt as sophieu,noidung1 as noidung,mand1 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,0 as tienco,chitiet_pskt.gtvnd1 as tienno,pskt.tkco as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,4 as sapxep,chitiet_pskt.mabp,chitiet_pskt.loaisp FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  pskt.loaiphieu in(2,4,6,8,10,12,14,16,18,20,22,24,26,28,30,32,34,36,38,40,42,44,46,48,50,52,54,56,58,60,62,64,66,68) and tkno1 in ('" . $matk . "') $sql_mand1  " . $this->getStrOderby() . "
                union all
                    SELECT pskt.loaiphieu,tkno2 as tk,pskt.mapskt as sophieu,noidung2 as noidung,mand2 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,0 as tienco,chitiet_pskt.gtvnd2 as tienno,pskt.tkco as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,4 as sapxep,chitiet_pskt.mabp,chitiet_pskt.loaisp FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  pskt.loaiphieu in(2,4,6,8,10,12,14,16,18,20,22,24,26,28,30,32,34,36,38,40,42,44,46,48,50,52,54,56,58,60,62,64,66,68) and tkno2 in ('" . $matk . "') $sql_mand2 " . $this->getStrOderby() . "
                union all
                   SELECT psvt.loaiphieu,dinhkhoan_psvt.tkno as tk,mapskt as sophieu,noidung as noidung,mand as mand,ngayghiso,sct,ngayhoadon,chuthich,0 as tienco,sotien as tienno,dinhkhoan_psvt.tkco as tkdu,MONTH(ngayghiso) as thang,dinhkhoan_psvt.sott,1 as sapxep,psvt.makho as mabp,psvt.loaisp FROM psvt INNER JOIN dinhkhoan_psvt on(psvt.sophieu=dinhkhoan_psvt.sophieu) where 0=0  and dinhkhoan_psvt.tkno in ('" . $matk . "') $sql_mand3 " . $this->getStrOderby2() . "
                union all
                    SELECT psvt.loaiphieu,dinhkhoan_psvt.tkco as tk,mapskt as sophieu,noidung as noidung,mand as mand,ngayghiso,sct,ngayhoadon,chuthich,sotien as tienco,0 as tienno,dinhkhoan_psvt.tkno as tkdu,MONTH(ngayghiso) as thang,dinhkhoan_psvt.sott,1 as sapxep,psvt.makho as mabp,psvt.loaisp FROM psvt INNER JOIN dinhkhoan_psvt on(psvt.sophieu=dinhkhoan_psvt.sophieu) where 0=0  and dinhkhoan_psvt.tkco in ('" . $matk . "') $sql_mand3 " . $this->getStrOderby2() . "
         order by sott";

        $this->query($sql);
        $row = array();
        $i = 0;
        while ($data = $this->fetch()) {
            $tk = $data['tk'];
            $tkdu = $data['tkdu'];
            if ($data['tkdu'] == "1331") {
                if ($data['mand'] == "") {
                    $data['noidung'] = "Thuế GTGT đầu vào";
                    $data['mand'] = "100000";
                }
            }
            if ($data['tkdu'] == "1332") {
                if ($data['mand'] == "") {
                    $data['noidung'] = "Thuế GTGT được khấu trừ của TSCĐ";
                }
            }
            if ($data['tkdu'] == "33311") {
                if ($data['mand'] == "") {
                    $data['noidung'] = "Thuế GTGT đầu ra";
                    $data['mand'] = "100001";
                }
            }
            if ($data['tkdu'] == "33312") {
                if ($data['mand'] == "") {
                    $data['noidung'] = "Thuế GTGT hàng hóa nhập khẩu";
                }
            }
            $row[] = $data;
        }
        return $row;

    }


    public function load_danhsach_doanhthuthuchien_theotungcongtrinh($matk_str, $theonoidung, $sapxep)
    {// Lấy danh sách phiếu chi trong sổ cái

        $sql = "select mact as mabp,doanhthuthucte as tienco,0 as tienno,tyle,gtcongtrinh,loaisp from bangdoanhthuthucte INNER JOIN  masp on (bangdoanhthuthucte.mact = masp.masp)WHERE doanhthuthucte!=0";

        $this->query($sql);
        $row = array();
        $i = 0;
        while ($data = $this->fetch()) {

            $theomabp = $data['mabp'];
            $data['tienco'] += $row[$theomabp]['tienco'];
            $data['tienno'] += $row[$theomabp]['tienno'];

            $row[$theomabp] = $data;
        }
        return $row;

    }

    public function load_danhsach_no_co_theocongtrinh_cpsxchungbp($matk_str, $theonoidung, $sapxep)
    {// Lấy danh sách phiếu chi trong sổ cái
        $matk_arr = explode(",", $matk_str);
        $matk = implode("','", $matk_arr);
        $tongtienco = 0;
        $tongtienno = 0;
        if ($theonoidung == 'ALL') {
            $sql_mand1 = " ";
            $sql_mand2 = " ";
        } else {
            $sql_mand1 = " and mand1='" . $theonoidung . "'";
            $sql_mand2 = " and mand2='" . $theonoidung . "'";
            $sql_mand3 = " and mand='" . $theonoidung . "'";
        }
        $sql = "SELECT pskt.loaiphieu,pskt.tkco as tk,pskt.mapskt as sophieu,noidung1 as noidung,mand1 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,(chitiet_pskt.gtvnd1) as tienco,0 as tienno,chitiet_pskt.tkno1 as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,4 as sapxep,chitiet_pskt.mabp,chitiet_pskt.loaisp FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where   pskt.loaiphieu in(100) and pskt.tkco in ('" . $matk . "') $sql_mand1  " . $this->getStrOderby() . "
                union all
                    SELECT pskt.loaiphieu,pskt.tkco as tk,pskt.mapskt as sophieu,noidung2 as noidung,mand2 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,chitiet_pskt.gtvnd2 as tienco,0 as tienno,chitiet_pskt.tkno2 as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,4 as sapxep,chitiet_pskt.mabp,chitiet_pskt.loaisp FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  chitiet_pskt.tkno2!=0 and pskt.loaiphieu in(100) and pskt.tkco in ('" . $matk . "') $sql_mand2  " . $this->getStrOderby() . " 
                union all
                    SELECT pskt.loaiphieu,tkno1 as tk,pskt.mapskt as sophieu,noidung1 as noidung,mand1 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,chitiet_pskt.gtvnd1 as tienco,0 as tienno,pskt.tkco as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,1 as sapxep,chitiet_pskt.mabp,chitiet_pskt.loaisp FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  pskt.loaiphieu in('77','0') and tkno1 in ('" . $matk . "') $sql_mand1  " . $this->getStrOderby() . " 
                union all
                    SELECT pskt.loaiphieu,tkno2 as tk,pskt.mapskt as sophieu,noidung2 as noidung,mand2 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,chitiet_pskt.gtvnd2 as tienco,0 as tienno,pskt.tkco as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,1 as sapxep,chitiet_pskt.mabp,chitiet_pskt.loaisp FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  pskt.loaiphieu in('77','0') and tkno2 in ('" . $matk . "') $sql_mand2  " . $this->getStrOderby() . "
                union all
                    SELECT pskt.loaiphieu,pskt.tkco as tk,pskt.mapskt as sophieu,noidung1 as noidung,mand1 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,0 as tienco,chitiet_pskt.gtvnd1 as tienno,chitiet_pskt.tkno1 as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,3 as sapxep,chitiet_pskt.mabp,chitiet_pskt.loaisp FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  pskt.loaiphieu in('77','0') and pskt.tkco in ('" . $matk . "') $sql_mand1  " . $this->getStrOderby() . "
                union all
                    SELECT pskt.loaiphieu,pskt.tkco as tk,pskt.mapskt as sophieu,noidung2 as noidung,mand2 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,0 as tienco,chitiet_pskt.gtvnd2 as tienno,chitiet_pskt.tkno2 as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,3 as sapxep,chitiet_pskt.mabp,chitiet_pskt.loaisp FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  chitiet_pskt.tkno2!=0 and pskt.loaiphieu in('77','0') and pskt.tkco in ('" . $matk . "') $sql_mand2 " . $this->getStrOderby() . "
                union all
                    SELECT pskt.loaiphieu,tkno1 as tk,pskt.mapskt as sophieu,noidung1 as noidung,mand1 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,0 as tienco,chitiet_pskt.gtvnd1 as tienno,pskt.tkco as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,4 as sapxep,chitiet_pskt.mabp,chitiet_pskt.loaisp FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  pskt.loaiphieu in(100) and tkno1 in ('" . $matk . "') $sql_mand1  " . $this->getStrOderby() . "
                union all
                    SELECT pskt.loaiphieu,tkno2 as tk,pskt.mapskt as sophieu,noidung2 as noidung,mand2 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,0 as tienco,chitiet_pskt.gtvnd2 as tienno,pskt.tkco as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,4 as sapxep,chitiet_pskt.mabp,chitiet_pskt.loaisp FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  pskt.loaiphieu in(100) and tkno2 in ('" . $matk . "') $sql_mand2 " . $this->getStrOderby() . "
         order by sott";

        $this->query($sql);
        $row = array();
        $i = 0;
        while ($data = $this->fetch()) {
            $tk = $data['tk'];
            $tkdu = $data['tkdu'];
            if ($data['tkdu'] == "1331") {
                if ($data['mand'] == "") {
                    $data['noidung'] = "Thuế GTGT đầu vào";
                    $data['mand'] = "100000";
                }
            }
            if ($data['tkdu'] == "1332") {
                if ($data['mand'] == "") {
                    $data['noidung'] = "Thuế GTGT được khấu trừ của TSCĐ";
                }
            }
            if ($data['tkdu'] == "33311") {
                if ($data['mand'] == "") {
                    $data['noidung'] = "Thuế GTGT đầu ra";
                    $data['mand'] = "100001";
                }
            }
            if ($data['tkdu'] == "33312") {
                if ($data['mand'] == "") {
                    $data['noidung'] = "Thuế GTGT hàng hóa nhập khẩu";
                }
            }
            $theomabp = $data['mabp'];
            $data['tienco'] += $row[$theomabp]['tienco'];
            $data['tienno'] += $row[$theomabp]['tienno'];

            $row[$theomabp] = $data;
        }
        return $row;

    }

    public function load_danhsach_no_co_theocongtrinh_cpsxchungbp_sp($matk_str, $theonoidung, $sapxep)
    {// Lấy danh sách phiếu chi trong sổ cái
        $matk_arr = explode(",", $matk_str);
        $matk = implode("','", $matk_arr);
        $tongtienco = 0;
        $tongtienno = 0;
        if ($theonoidung == 'ALL') {
            $sql_mand1 = " ";
            $sql_mand2 = " ";
        } else {
            $sql_mand1 = " and mand1='" . $theonoidung . "'";
            $sql_mand2 = " and mand2='" . $theonoidung . "'";
            $sql_mand3 = " and mand='" . $theonoidung . "'";
        }
        $sql = "SELECT pskt.loaiphieu,pskt.tkco as tk,pskt.mapskt as sophieu,noidung1 as noidung,mand1 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,(chitiet_pskt.gtvnd1) as tienco,0 as tienno,chitiet_pskt.tkno1 as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,4 as sapxep,chitiet_pskt.mabp,chitiet_pskt.loaisp FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where   pskt.loaiphieu in(100) and pskt.tkco in ('" . $matk . "') $sql_mand1  " . $this->getStrOderby() . "
                union all
                    SELECT pskt.loaiphieu,pskt.tkco as tk,pskt.mapskt as sophieu,noidung2 as noidung,mand2 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,chitiet_pskt.gtvnd2 as tienco,0 as tienno,chitiet_pskt.tkno2 as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,4 as sapxep,chitiet_pskt.mabp,chitiet_pskt.loaisp FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  chitiet_pskt.tkno2!=0 and pskt.loaiphieu in(100) and pskt.tkco in ('" . $matk . "') $sql_mand2  " . $this->getStrOderby() . " 
                union all
                    SELECT pskt.loaiphieu,tkno1 as tk,pskt.mapskt as sophieu,noidung1 as noidung,mand1 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,chitiet_pskt.gtvnd1 as tienco,0 as tienno,pskt.tkco as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,1 as sapxep,chitiet_pskt.mabp,chitiet_pskt.loaisp FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  pskt.loaiphieu in('95') and tkno1 in ('" . $matk . "') $sql_mand1  " . $this->getStrOderby() . " 
                union all
                    SELECT pskt.loaiphieu,tkno2 as tk,pskt.mapskt as sophieu,noidung2 as noidung,mand2 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,chitiet_pskt.gtvnd2 as tienco,0 as tienno,pskt.tkco as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,1 as sapxep,chitiet_pskt.mabp,chitiet_pskt.loaisp FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  pskt.loaiphieu in('95') and tkno2 in ('" . $matk . "') $sql_mand2  " . $this->getStrOderby() . "
                union all
                    SELECT pskt.loaiphieu,pskt.tkco as tk,pskt.mapskt as sophieu,noidung1 as noidung,mand1 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,0 as tienco,chitiet_pskt.gtvnd1 as tienno,chitiet_pskt.tkno1 as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,3 as sapxep,chitiet_pskt.mabp,chitiet_pskt.loaisp FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  pskt.loaiphieu in('95') and pskt.tkco in ('" . $matk . "') $sql_mand1  " . $this->getStrOderby() . "
                union all
                    SELECT pskt.loaiphieu,pskt.tkco as tk,pskt.mapskt as sophieu,noidung2 as noidung,mand2 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,0 as tienco,chitiet_pskt.gtvnd2 as tienno,chitiet_pskt.tkno2 as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,3 as sapxep,chitiet_pskt.mabp,chitiet_pskt.loaisp FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  chitiet_pskt.tkno2!=0 and pskt.loaiphieu in('95') and pskt.tkco in ('" . $matk . "') $sql_mand2 " . $this->getStrOderby() . "
                union all
                    SELECT pskt.loaiphieu,tkno1 as tk,pskt.mapskt as sophieu,noidung1 as noidung,mand1 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,0 as tienco,chitiet_pskt.gtvnd1 as tienno,pskt.tkco as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,4 as sapxep,chitiet_pskt.mabp,chitiet_pskt.loaisp FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  pskt.loaiphieu in(100) and tkno1 in ('" . $matk . "') $sql_mand1  " . $this->getStrOderby() . "
                union all
                    SELECT pskt.loaiphieu,tkno2 as tk,pskt.mapskt as sophieu,noidung2 as noidung,mand2 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,0 as tienco,chitiet_pskt.gtvnd2 as tienno,pskt.tkco as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,4 as sapxep,chitiet_pskt.mabp,chitiet_pskt.loaisp FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  pskt.loaiphieu in(100) and tkno2 in ('" . $matk . "') $sql_mand2 " . $this->getStrOderby() . "
         order by sott";

        $this->query($sql);
        $row = array();
        $i = 0;
        while ($data = $this->fetch()) {
            $tk = $data['tk'];
            $tkdu = $data['tkdu'];
            if ($data['tkdu'] == "1331") {
                if ($data['mand'] == "") {
                    $data['noidung'] = "Thuế GTGT đầu vào";
                    $data['mand'] = "100000";
                }
            }
            if ($data['tkdu'] == "1332") {
                if ($data['mand'] == "") {
                    $data['noidung'] = "Thuế GTGT được khấu trừ của TSCĐ";
                }
            }
            if ($data['tkdu'] == "33311") {
                if ($data['mand'] == "") {
                    $data['noidung'] = "Thuế GTGT đầu ra";
                    $data['mand'] = "100001";
                }
            }
            if ($data['tkdu'] == "33312") {
                if ($data['mand'] == "") {
                    $data['noidung'] = "Thuế GTGT hàng hóa nhập khẩu";
                }
            }
            $theomabp = $data['mabp'];
            $data['tienco'] += $row[$theomabp]['tienco'];
            $data['tienno'] += $row[$theomabp]['tienno'];

            $row[$theomabp] = $data;
        }
        return $row;

    }

    function loadMaKHALL_TraVeChuoiMaTK($matk = 0)
    { // c?p 1 la cha
        $trees = array();
        $matk = str_replace(",","','",$matk);
        $matk_arr = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = $this->get_orderby() . " and ";
        $sql = "SELECT matk FROM matk WHERE $sql_w matk in('" . $matk . "')  order by matk DESC ";
        $this->query($sql);
        while ($data = $this->fetch()) {
            $matk_arr[$data['matk'] . "-" . $data['matk']] = $data['matk'];
            $sql1 = "SELECT matk FROM matk WHERE $sql_w matkcha ='" . $data['matk'] . "' order by matk ";
            $query = $this->re_query($sql1);
            while ($data1 = $this->re_fetch($query)) {
                $matk_arr[$data['matk'] . "-" . $data1['matk']] = $data1['matk'];
                $sql2 = "SELECT matk FROM matk WHERE $sql_w matkcha ='" . $data1['matk'] . "' order by matk ";
                $query1 = $this->re_query($sql2);
                while ($data2 = $this->re_fetch($query1)) {
                    $matk_arr[$data['matk'] . "-" . $data2['matk']] = $data2['matk'];
                }
            }
        }
        return $matk_arr;
    }


    public function load_danhsach_no_co_theocongtrinh_giathanh($matk_str, $theonoidung, $tkdu)// Khong lấy phiếu 79 bút toán tự tạo
    {// Lấy danh sách phiếu chi trong sổ cái
        $matk_arr = explode(",", $matk_str);
        $matk = implode("','", $matk_arr);
        $tongtienco = 0;
        $tongtienno = 0;
        if ($theonoidung == 'ALL') {
            $sql_mand1 = " ";
            $sql_mand2 = " ";
        } else {
            $sql_mand1 = " and mand1='" . $theonoidung . "'";
            $sql_mand2 = " and mand2='" . $theonoidung . "'";
            $sql_mand3 = " and mand='" . $theonoidung . "'";
        }
        $sql = "SELECT pskt.loaiphieu,pskt.tkco as tk,pskt.mapskt as sophieu,noidung1 as noidung,mand1 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,(chitiet_pskt.gtvnd1) as tienco,0 as tienno,chitiet_pskt.tkno1 as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,4 as sapxep,chitiet_pskt.mabp,chitiet_pskt.loaisp FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where   pskt.loaiphieu in(2,4,6,8,10,12,14,16,18,20,22,24,26,28,30,32,34,36,38,40,42,44,46,48,50,52,54,56,58,60,62,64,66,68) and pskt.tkco in ('" . $matk . "') and chitiet_pskt.tkno1 in ('" . $tkdu . "') $sql_mand1  " . $this->getStrOderby() . "
                union all
                    SELECT pskt.loaiphieu,pskt.tkco as tk,pskt.mapskt as sophieu,noidung2 as noidung,mand2 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,chitiet_pskt.gtvnd2 as tienco,0 as tienno,chitiet_pskt.tkno2 as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,4 as sapxep,chitiet_pskt.mabp,chitiet_pskt.loaisp FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  chitiet_pskt.tkno2!=0 and pskt.loaiphieu in(2,4,6,8,10,12,14,16,18,20,22,24,26,28,30,32,34,36,38,40,42,44,46,48,50,52,54,56,58,60,62,64,66,68) and pskt.tkco in ('" . $matk . "') and chitiet_pskt.tkno2 in ('" . $tkdu . "') $sql_mand2  " . $this->getStrOderby() . " 
                union all
                    SELECT pskt.loaiphieu,tkno1 as tk,pskt.mapskt as sophieu,noidung1 as noidung,mand1 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,chitiet_pskt.gtvnd1 as tienco,0 as tienno,pskt.tkco as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,1 as sapxep,chitiet_pskt.mabp,chitiet_pskt.loaisp FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  pskt.loaiphieu in(1,3,5,7,9,11,13,15,17,19,21,23,25,27,29,31,33,35,37,39,41,43,45,47,49,51,53,55,57,59,61,63,65,67,69,71,73,75,77,81,83) and tkno1 in ('" . $matk . "') and pskt.tkco in ('" . $tkdu . "') $sql_mand1  " . $this->getStrOderby() . " 
                union all
                    SELECT pskt.loaiphieu,tkno2 as tk,pskt.mapskt as sophieu,noidung2 as noidung,mand2 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,chitiet_pskt.gtvnd2 as tienco,0 as tienno,pskt.tkco as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,1 as sapxep,chitiet_pskt.mabp,chitiet_pskt.loaisp FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  pskt.loaiphieu in(1,3,5,7,9,11,13,15,17,19,21,23,25,27,29,31,33,35,37,39,41,43,45,47,49,51,53,55,57,59,61,63,65,67,69,71,73,75,77,81,83) and tkno2 in ('" . $matk . "') and pskt.tkco in ('" . $tkdu . "') $sql_mand2  " . $this->getStrOderby() . "
                union all
                    SELECT pskt.loaiphieu,pskt.tkco as tk,pskt.mapskt as sophieu,noidung1 as noidung,mand1 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,0 as tienco,chitiet_pskt.gtvnd1 as tienno,chitiet_pskt.tkno1 as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,3 as sapxep,chitiet_pskt.mabp,chitiet_pskt.loaisp FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  pskt.loaiphieu in(1,3,5,7,9,11,13,15,17,19,21,23,25,27,29,31,33,35,37,39,41,43,45,47,49,51,53,55,57,59,61,63,65,67,69,71,73,75,77,81,83) and pskt.tkco in ('" . $matk . "') and chitiet_pskt.tkno1 in ('" . $tkdu . "') $sql_mand1  " . $this->getStrOderby() . "
                union all
                    SELECT pskt.loaiphieu,pskt.tkco as tk,pskt.mapskt as sophieu,noidung2 as noidung,mand2 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,0 as tienco,chitiet_pskt.gtvnd2 as tienno,chitiet_pskt.tkno2 as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,3 as sapxep,chitiet_pskt.mabp,chitiet_pskt.loaisp FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  chitiet_pskt.tkno2!=0 and pskt.loaiphieu in(1,3,5,7,9,11,13,15,17,19,21,23,25,27,29,31,33,35,37,39,41,43,45,47,49,51,53,55,57,59,61,63,65,67,69,71,73,75,77,81,83) and pskt.tkco in ('" . $matk . "') and chitiet_pskt.tkno2 in ('" . $tkdu . "') $sql_mand2 " . $this->getStrOderby() . "
                union all
                    SELECT pskt.loaiphieu,tkno1 as tk,pskt.mapskt as sophieu,noidung1 as noidung,mand1 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,0 as tienco,chitiet_pskt.gtvnd1 as tienno,pskt.tkco as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,4 as sapxep,chitiet_pskt.mabp,chitiet_pskt.loaisp FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  pskt.loaiphieu in(2,4,6,8,10,12,14,16,18,20,22,24,26,28,30,32,34,36,38,40,42,44,46,48,50,52,54,56,58,60,62,64,66,68) and tkno1 in ('" . $matk . "') and pskt.tkco in ('" . $tkdu . "') $sql_mand1  " . $this->getStrOderby() . "
                union all
                    SELECT pskt.loaiphieu,tkno2 as tk,pskt.mapskt as sophieu,noidung2 as noidung,mand2 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,0 as tienco,chitiet_pskt.gtvnd2 as tienno,pskt.tkco as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,4 as sapxep,chitiet_pskt.mabp,chitiet_pskt.loaisp FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  pskt.loaiphieu in(2,4,6,8,10,12,14,16,18,20,22,24,26,28,30,32,34,36,38,40,42,44,46,48,50,52,54,56,58,60,62,64,66,68) and tkno2 in ('" . $matk . "') and pskt.tkco in ('" . $tkdu . "') $sql_mand2 " . $this->getStrOderby() . "
                union all
                   SELECT psvt.loaiphieu,dinhkhoan_psvt.tkno as tk,mapskt as sophieu,noidung as noidung,mand as mand,ngayghiso,sct,ngayhoadon,chuthich,0 as tienco,sotien as tienno,dinhkhoan_psvt.tkco as tkdu,MONTH(ngayghiso) as thang,dinhkhoan_psvt.sott,1 as sapxep,psvt.makho as mabp,psvt.loaisp FROM psvt INNER JOIN dinhkhoan_psvt on(psvt.sophieu=dinhkhoan_psvt.sophieu) where 0=0  and dinhkhoan_psvt.tkno in ('" . $matk . "') and dinhkhoan_psvt.tkco in ('" . $tkdu . "') $sql_mand3 " . $this->getStrOderby2() . "
                union all
                    SELECT psvt.loaiphieu,dinhkhoan_psvt.tkco as tk,mapskt as sophieu,noidung as noidung,mand as mand,ngayghiso,sct,ngayhoadon,chuthich,sotien as tienco,0 as tienno,dinhkhoan_psvt.tkno as tkdu,MONTH(ngayghiso) as thang,dinhkhoan_psvt.sott,1 as sapxep,psvt.makho as mabp,psvt.loaisp FROM psvt INNER JOIN dinhkhoan_psvt on(psvt.sophieu=dinhkhoan_psvt.sophieu) where 0=0  and dinhkhoan_psvt.tkco in ('" . $matk . "') and dinhkhoan_psvt.tkco in ('" . $tkdu . "') $sql_mand3 " . $this->getStrOderby2() . "

         order by sott";

        $this->query($sql);
        $row = array();
        $i = 0;
        while ($data = $this->fetch()) {
            $tk = $data['tk'];
            $tkdu = $data['tkdu'];
            if ($data['tkdu'] == "1331") {
                if ($data['mand'] == "") {
                    $data['noidung'] = "Thuế GTGT đầu vào";
                    $data['mand'] = "100000";
                }
            }
            if ($data['tkdu'] == "1332") {
                if ($data['mand'] == "") {
                    $data['noidung'] = "Thuế GTGT được khấu trừ của TSCĐ";
                }
            }
            if ($data['tkdu'] == "33311") {
                if ($data['mand'] == "") {
                    $data['noidung'] = "Thuế GTGT đầu ra";
                    $data['mand'] = "100001";
                }
            }
            if ($data['tkdu'] == "33312") {
                if ($data['mand'] == "") {
                    $data['noidung'] = "Thuế GTGT hàng hóa nhập khẩu";
                }
            }
            $theomabp = $data['mabp'];
            $data['tienco'] += $row[$theomabp]['tienco'];
            $data['tienno'] += $row[$theomabp]['tienno'];

            $row[$theomabp] = $data;
        }
        return $row;

    }

    public function load_danhsach_no_co_theocongtrinh_taikhoan154_khong_632($matk_str, $theonoidung, $tkdu)// Không lấy đối ứng 632 . Không lấy bút toán phát sinh phân bổ 75 bút toán sản phẩm , 79 bút toán tự động chuyển qua 154 của từng công trình
    {// Lấy danh sách phiếu chi trong sổ cái
        $matk_arr = explode(",", $matk_str);
        $matk = implode("','", $matk_arr);
        $tongtienco = 0;
        $tongtienno = 0;
        if ($theonoidung == 'ALL') {
            $sql_mand1 = " ";
            $sql_mand2 = " ";
        } else {
            $sql_mand1 = " and mand1='" . $theonoidung . "'";
            $sql_mand2 = " and mand2='" . $theonoidung . "'";
            $sql_mand3 = " and mand='" . $theonoidung . "'";
        }
        $sql = "SELECT pskt.loaiphieu,pskt.tkco as tk,pskt.mapskt as sophieu,noidung1 as noidung,mand1 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,(chitiet_pskt.gtvnd1) as tienco,0 as tienno,chitiet_pskt.tkno1 as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,4 as sapxep,chitiet_pskt.mabp,chitiet_pskt.loaisp FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where   pskt.loaiphieu in(2,4,6,8,10,12,14,16,18,20,22,24,26,28,30,32,34,36,38,40,42,44,46,48,50,52,54,56,58,60,62,64,66,68) and pskt.tkco in ('" . $matk . "') and chitiet_pskt.tkno1 !='{$tkdu}' $sql_mand1  " . $this->getStrOderby() . "
                union all
                    SELECT pskt.loaiphieu,pskt.tkco as tk,pskt.mapskt as sophieu,noidung2 as noidung,mand2 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,chitiet_pskt.gtvnd2 as tienco,0 as tienno,chitiet_pskt.tkno2 as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,4 as sapxep,chitiet_pskt.mabp,chitiet_pskt.loaisp FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  chitiet_pskt.tkno2!=0 and pskt.loaiphieu in(2,4,6,8,10,12,14,16,18,20,22,24,26,28,30,32,34,36,38,40,42,44,46,48,50,52,54,56,58,60,62,64,66,68) and pskt.tkco in ('" . $matk . "') and chitiet_pskt.tkno2 !='{$tkdu}' $sql_mand2  " . $this->getStrOderby() . " 
                union all
                    SELECT pskt.loaiphieu,tkno1 as tk,pskt.mapskt as sophieu,noidung1 as noidung,mand1 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,chitiet_pskt.gtvnd1 as tienco,0 as tienno,pskt.tkco as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,1 as sapxep,chitiet_pskt.mabp,chitiet_pskt.loaisp FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  pskt.loaiphieu in(1,3,5,7,9,11,13,15,17,19,21,23,25,27,29,31,33,35,37,39,41,43,45,47,49,51,53,55,57,59,61,63,65,67,69,71,73,77,81,83) and tkno1 in ('" . $matk . "') and pskt.tkco !='{$tkdu}' $sql_mand1  " . $this->getStrOderby() . " 
                union all
                    SELECT pskt.loaiphieu,tkno2 as tk,pskt.mapskt as sophieu,noidung2 as noidung,mand2 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,chitiet_pskt.gtvnd2 as tienco,0 as tienno,pskt.tkco as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,1 as sapxep,chitiet_pskt.mabp,chitiet_pskt.loaisp FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  pskt.loaiphieu in(1,3,5,7,9,11,13,15,17,19,21,23,25,27,29,31,33,35,37,39,41,43,45,47,49,51,53,55,57,59,61,63,65,67,69,71,73,77,81,83) and tkno2 in ('" . $matk . "') and pskt.tkco !='{$tkdu}' $sql_mand2  " . $this->getStrOderby() . "
                union all
                    SELECT pskt.loaiphieu,pskt.tkco as tk,pskt.mapskt as sophieu,noidung1 as noidung,mand1 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,0 as tienco,chitiet_pskt.gtvnd1 as tienno,chitiet_pskt.tkno1 as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,3 as sapxep,chitiet_pskt.mabp,chitiet_pskt.loaisp FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  pskt.loaiphieu in(1,3,5,7,9,11,13,15,17,19,21,23,25,27,29,31,33,35,37,39,41,43,45,47,49,51,53,55,57,59,61,63,65,67,69,71,73,77,81,83) and pskt.tkco in ('" . $matk . "') and chitiet_pskt.tkno1 !='{$tkdu}' $sql_mand1  " . $this->getStrOderby() . "
                union all
                    SELECT pskt.loaiphieu,pskt.tkco as tk,pskt.mapskt as sophieu,noidung2 as noidung,mand2 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,0 as tienco,chitiet_pskt.gtvnd2 as tienno,chitiet_pskt.tkno2 as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,3 as sapxep,chitiet_pskt.mabp,chitiet_pskt.loaisp FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  chitiet_pskt.tkno2!=0 and pskt.loaiphieu in(1,3,5,7,9,11,13,15,17,19,21,23,25,27,29,31,33,35,37,39,41,43,45,47,49,51,53,55,57,59,61,63,65,67,69,71,73,77,81,83) and pskt.tkco in ('" . $matk . "') and chitiet_pskt.tkno2 !='{$tkdu}' $sql_mand2 " . $this->getStrOderby() . "
                union all
                    SELECT pskt.loaiphieu,tkno1 as tk,pskt.mapskt as sophieu,noidung1 as noidung,mand1 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,0 as tienco,chitiet_pskt.gtvnd1 as tienno,pskt.tkco as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,4 as sapxep,chitiet_pskt.mabp,chitiet_pskt.loaisp FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  pskt.loaiphieu in(2,4,6,8,10,12,14,16,18,20,22,24,26,28,30,32,34,36,38,40,42,44,46,48,50,52,54,56,58,60,62,64,66,68) and tkno1 in ('" . $matk . "') and pskt.tkco !='{$tkdu}' $sql_mand1  " . $this->getStrOderby() . "
                union all
                    SELECT pskt.loaiphieu,tkno2 as tk,pskt.mapskt as sophieu,noidung2 as noidung,mand2 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,0 as tienco,chitiet_pskt.gtvnd2 as tienno,pskt.tkco as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,4 as sapxep,chitiet_pskt.mabp,chitiet_pskt.loaisp FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  pskt.loaiphieu in(2,4,6,8,10,12,14,16,18,20,22,24,26,28,30,32,34,36,38,40,42,44,46,48,50,52,54,56,58,60,62,64,66,68) and tkno2 in ('" . $matk . "') and pskt.tkco !='{$tkdu}' $sql_mand2 " . $this->getStrOderby() . "
                union all
                   SELECT psvt.loaiphieu,dinhkhoan_psvt.tkno as tk,mapskt as sophieu,noidung as noidung,mand as mand,ngayghiso,sct,ngayhoadon,chuthich,0 as tienco,sotien as tienno,dinhkhoan_psvt.tkco as tkdu,MONTH(ngayghiso) as thang,dinhkhoan_psvt.sott,1 as sapxep,psvt.makho as mabp,psvt.loaisp FROM psvt INNER JOIN dinhkhoan_psvt on(psvt.sophieu=dinhkhoan_psvt.sophieu) where 0=0  and dinhkhoan_psvt.tkno in ('" . $matk . "') and dinhkhoan_psvt.tkco !='{$tkdu}' $sql_mand3 " . $this->getStrOderby2() . "
                union all
                    SELECT psvt.loaiphieu,dinhkhoan_psvt.tkco as tk,mapskt as sophieu,noidung as noidung,mand as mand,ngayghiso,sct,ngayhoadon,chuthich,sotien as tienco,0 as tienno,dinhkhoan_psvt.tkno as tkdu,MONTH(ngayghiso) as thang,dinhkhoan_psvt.sott,1 as sapxep,psvt.makho as mabp,psvt.loaisp FROM psvt INNER JOIN dinhkhoan_psvt on(psvt.sophieu=dinhkhoan_psvt.sophieu) where 0=0  and dinhkhoan_psvt.tkco in ('" . $matk . "') and dinhkhoan_psvt.tkco !='{$tkdu}' $sql_mand3 " . $this->getStrOderby2() . "

         order by sott";

        $this->query($sql);
        $row = array();
        $i = 0;
        while ($data = $this->fetch()) {
            $tk = $data['tk'];
            $tkdu = $data['tkdu'];
            if ($data['tkdu'] == "1331") {
                if ($data['mand'] == "") {
                    $data['noidung'] = "Thuế GTGT đầu vào";
                    $data['mand'] = "100000";
                }
            }
            if ($data['tkdu'] == "1332") {
                if ($data['mand'] == "") {
                    $data['noidung'] = "Thuế GTGT được khấu trừ của TSCĐ";
                }
            }
            if ($data['tkdu'] == "33311") {
                if ($data['mand'] == "") {
                    $data['noidung'] = "Thuế GTGT đầu ra";
                    $data['mand'] = "100001";
                }
            }
            if ($data['tkdu'] == "33312") {
                if ($data['mand'] == "") {
                    $data['noidung'] = "Thuế GTGT hàng hóa nhập khẩu";
                }
            }
            $theomabp = $data['mabp'];
            $data['tienco'] += $row[$theomabp]['tienco'];
            $data['tienno'] += $row[$theomabp]['tienno'];

            $row[$theomabp] = $data;
        }
        return $row;

    }

    public function load_danhsach_no_co_theocongtrinh_taikhoan154_khong_632_CT_Khoan($matk_str, $theonoidung, $tkdu)// Không lấy đối ứng 632 . Không lấy bút toán phát sinh phân bổ 75 bút toán sản phẩm , 79 bút toán tự động chuyển qua 154 của từng công trình
    {// Lấy danh sách phiếu chi trong sổ cái
        $matk_arr = explode(",", $matk_str);
        $matk = implode("','", $matk_arr);
        $tongtienco = 0;
        $tongtienno = 0;
        if ($theonoidung == 'ALL') {
            $sql_mand1 = " ";
            $sql_mand2 = " ";
        } else {
            $sql_mand1 = " and mand1='" . $theonoidung . "'";
            $sql_mand2 = " and mand2='" . $theonoidung . "'";
            $sql_mand3 = " and mand='" . $theonoidung . "'";
        }
        $sql = "SELECT pskt.loaiphieu,pskt.tkco as tk,pskt.mapskt as sophieu,noidung1 as noidung,mand1 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,(chitiet_pskt.gtvnd1) as tienco,0 as tienno,chitiet_pskt.tkno1 as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,4 as sapxep,chitiet_pskt.mabp,chitiet_pskt.loaisp FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where   pskt.loaiphieu in(2,4,6,8,10,12,14,16,18,20,22,24,26,28,30,32,34,36,38,40,42,44,46,48,50,52,54,56,58,60,62,64,66,68) and pskt.tkco in ('" . $matk . "') and chitiet_pskt.tkno1 !='{$tkdu}' $sql_mand1  " . $this->getStrOderby() . "
                union all
                    SELECT pskt.loaiphieu,pskt.tkco as tk,pskt.mapskt as sophieu,noidung2 as noidung,mand2 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,chitiet_pskt.gtvnd2 as tienco,0 as tienno,chitiet_pskt.tkno2 as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,4 as sapxep,chitiet_pskt.mabp,chitiet_pskt.loaisp FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  chitiet_pskt.tkno2!=0 and pskt.loaiphieu in(2,4,6,8,10,12,14,16,18,20,22,24,26,28,30,32,34,36,38,40,42,44,46,48,50,52,54,56,58,60,62,64,66,68) and pskt.tkco in ('" . $matk . "') and chitiet_pskt.tkno2 !='{$tkdu}' $sql_mand2  " . $this->getStrOderby() . " 
                union all
                    SELECT pskt.loaiphieu,tkno1 as tk,pskt.mapskt as sophieu,noidung1 as noidung,mand1 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,chitiet_pskt.gtvnd1 as tienco,0 as tienno,pskt.tkco as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,1 as sapxep,chitiet_pskt.mabp,chitiet_pskt.loaisp FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  pskt.loaiphieu in(1,3,5,7,9,11,13,15,17,19,21,23,25,27,29,31,33,35,37,39,41,43,45,47,49,51,53,55,57,59,61,63,65,67,69,71,73,81,83) and tkno1 in ('" . $matk . "') and pskt.tkco !='{$tkdu}' $sql_mand1  " . $this->getStrOderby() . " 
                union all
                    SELECT pskt.loaiphieu,tkno2 as tk,pskt.mapskt as sophieu,noidung2 as noidung,mand2 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,chitiet_pskt.gtvnd2 as tienco,0 as tienno,pskt.tkco as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,1 as sapxep,chitiet_pskt.mabp,chitiet_pskt.loaisp FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  pskt.loaiphieu in(1,3,5,7,9,11,13,15,17,19,21,23,25,27,29,31,33,35,37,39,41,43,45,47,49,51,53,55,57,59,61,63,65,67,69,71,73,81,83) and tkno2 in ('" . $matk . "') and pskt.tkco !='{$tkdu}' $sql_mand2  " . $this->getStrOderby() . "
                union all
                    SELECT pskt.loaiphieu,pskt.tkco as tk,pskt.mapskt as sophieu,noidung1 as noidung,mand1 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,0 as tienco,chitiet_pskt.gtvnd1 as tienno,chitiet_pskt.tkno1 as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,3 as sapxep,chitiet_pskt.mabp,chitiet_pskt.loaisp FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  pskt.loaiphieu in(1,3,5,7,9,11,13,15,17,19,21,23,25,27,29,31,33,35,37,39,41,43,45,47,49,51,53,55,57,59,61,63,65,67,69,71,73,81,83) and pskt.tkco in ('" . $matk . "') and chitiet_pskt.tkno1 !='{$tkdu}' $sql_mand1  " . $this->getStrOderby() . "
                union all
                    SELECT pskt.loaiphieu,pskt.tkco as tk,pskt.mapskt as sophieu,noidung2 as noidung,mand2 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,0 as tienco,chitiet_pskt.gtvnd2 as tienno,chitiet_pskt.tkno2 as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,3 as sapxep,chitiet_pskt.mabp,chitiet_pskt.loaisp FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  chitiet_pskt.tkno2!=0 and pskt.loaiphieu in(1,3,5,7,9,11,13,15,17,19,21,23,25,27,29,31,33,35,37,39,41,43,45,47,49,51,53,55,57,59,61,63,65,67,69,71,73,81,83) and pskt.tkco in ('" . $matk . "') and chitiet_pskt.tkno2 !='{$tkdu}' $sql_mand2 " . $this->getStrOderby() . "
                union all
                    SELECT pskt.loaiphieu,tkno1 as tk,pskt.mapskt as sophieu,noidung1 as noidung,mand1 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,0 as tienco,chitiet_pskt.gtvnd1 as tienno,pskt.tkco as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,4 as sapxep,chitiet_pskt.mabp,chitiet_pskt.loaisp FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  pskt.loaiphieu in(2,4,6,8,10,12,14,16,18,20,22,24,26,28,30,32,34,36,38,40,42,44,46,48,50,52,54,56,58,60,62,64,66,68) and tkno1 in ('" . $matk . "') and pskt.tkco !='{$tkdu}' $sql_mand1  " . $this->getStrOderby() . "
                union all
                    SELECT pskt.loaiphieu,tkno2 as tk,pskt.mapskt as sophieu,noidung2 as noidung,mand2 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,0 as tienco,chitiet_pskt.gtvnd2 as tienno,pskt.tkco as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,4 as sapxep,chitiet_pskt.mabp,chitiet_pskt.loaisp FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  pskt.loaiphieu in(2,4,6,8,10,12,14,16,18,20,22,24,26,28,30,32,34,36,38,40,42,44,46,48,50,52,54,56,58,60,62,64,66,68) and tkno2 in ('" . $matk . "') and pskt.tkco !='{$tkdu}' $sql_mand2 " . $this->getStrOderby() . "
                union all
                   SELECT psvt.loaiphieu,dinhkhoan_psvt.tkno as tk,mapskt as sophieu,noidung as noidung,mand as mand,ngayghiso,sct,ngayhoadon,chuthich,0 as tienco,sotien as tienno,dinhkhoan_psvt.tkco as tkdu,MONTH(ngayghiso) as thang,dinhkhoan_psvt.sott,1 as sapxep,psvt.makho as mabp,psvt.loaisp FROM psvt INNER JOIN dinhkhoan_psvt on(psvt.sophieu=dinhkhoan_psvt.sophieu) where 0=0  and dinhkhoan_psvt.tkno in ('" . $matk . "') and dinhkhoan_psvt.tkco !='{$tkdu}' $sql_mand3 " . $this->getStrOderby2() . "
                union all
                    SELECT psvt.loaiphieu,dinhkhoan_psvt.tkco as tk,mapskt as sophieu,noidung as noidung,mand as mand,ngayghiso,sct,ngayhoadon,chuthich,sotien as tienco,0 as tienno,dinhkhoan_psvt.tkno as tkdu,MONTH(ngayghiso) as thang,dinhkhoan_psvt.sott,1 as sapxep,psvt.makho as mabp,psvt.loaisp FROM psvt INNER JOIN dinhkhoan_psvt on(psvt.sophieu=dinhkhoan_psvt.sophieu) where 0=0  and dinhkhoan_psvt.tkco in ('" . $matk . "') and dinhkhoan_psvt.tkco !='{$tkdu}' $sql_mand3 " . $this->getStrOderby2() . "

         order by sott";

        $this->query($sql);
        $row = array();
        $i = 0;
        while ($data = $this->fetch()) {
            $tk = $data['tk'];
            $tkdu = $data['tkdu'];
            if ($data['tkdu'] == "1331") {
                if ($data['mand'] == "") {
                    $data['noidung'] = "Thuế GTGT đầu vào";
                    $data['mand'] = "100000";
                }
            }
            if ($data['tkdu'] == "1332") {
                if ($data['mand'] == "") {
                    $data['noidung'] = "Thuế GTGT được khấu trừ của TSCĐ";
                }
            }
            if ($data['tkdu'] == "33311") {
                if ($data['mand'] == "") {
                    $data['noidung'] = "Thuế GTGT đầu ra";
                    $data['mand'] = "100001";
                }
            }
            if ($data['tkdu'] == "33312") {
                if ($data['mand'] == "") {
                    $data['noidung'] = "Thuế GTGT hàng hóa nhập khẩu";
                }
            }
            $theomabp = $data['mabp'];
            $data['tienco'] += $row[$theomabp]['tienco'];
            $data['tienno'] += $row[$theomabp]['tienno'];

            $row[$theomabp] = $data;
        }
        return $row;

    }

    public function load_danhsach_no_co_theocongtrinh_taikhoan154_khong_632_khong_phanbo($matk_str, $theonoidung, $tkdu)// Không lấy đối ứng 632 . Không lấy bút toán phát sinh phân bổ 75 bút toán sản phẩm , 79 bút toán tự động chuyển qua 154 của từng công trình
    {// Lấy danh sách phiếu chi trong sổ cái
        $matk_arr = explode(",", $matk_str);
        $matk = implode("','", $matk_arr);
        $tongtienco = 0;
        $tongtienno = 0;
        if ($theonoidung == 'ALL') {
            $sql_mand1 = " ";
            $sql_mand2 = " ";
        } else {
            $sql_mand1 = " and mand1='" . $theonoidung . "'";
            $sql_mand2 = " and mand2='" . $theonoidung . "'";
            $sql_mand3 = " and mand='" . $theonoidung . "'";
        }
        $sql = "SELECT pskt.loaiphieu,pskt.tkco as tk,pskt.mapskt as sophieu,noidung1 as noidung,mand1 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,(chitiet_pskt.gtvnd1) as tienco,0 as tienno,chitiet_pskt.tkno1 as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,4 as sapxep,chitiet_pskt.mabp,chitiet_pskt.loaisp FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where   pskt.loaiphieu in(2,4,6,8,10,12,14,16,18,20,22,24,26,28,30,32,34,36,38,40,42,44,46,48,50,52,54,56,58,60,62,64,66,68) and pskt.tkco in ('" . $matk . "') and chitiet_pskt.tkno1 !='{$tkdu}' $sql_mand1  " . $this->getStrOderby() . "
                union all
                    SELECT pskt.loaiphieu,pskt.tkco as tk,pskt.mapskt as sophieu,noidung2 as noidung,mand2 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,chitiet_pskt.gtvnd2 as tienco,0 as tienno,chitiet_pskt.tkno2 as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,4 as sapxep,chitiet_pskt.mabp,chitiet_pskt.loaisp FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  chitiet_pskt.tkno2!=0 and pskt.loaiphieu in(2,4,6,8,10,12,14,16,18,20,22,24,26,28,30,32,34,36,38,40,42,44,46,48,50,52,54,56,58,60,62,64,66,68) and pskt.tkco in ('" . $matk . "') and chitiet_pskt.tkno2 !='{$tkdu}' $sql_mand2  " . $this->getStrOderby() . " 
                union all
                    SELECT pskt.loaiphieu,tkno1 as tk,pskt.mapskt as sophieu,noidung1 as noidung,mand1 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,chitiet_pskt.gtvnd1 as tienco,0 as tienno,pskt.tkco as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,1 as sapxep,chitiet_pskt.mabp,chitiet_pskt.loaisp FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  pskt.loaiphieu in(1,3,5,7,9,11,13,15,17,19,21,23,25,27,29,31,33,35,37,39,41,43,45,47,49,51,53,55,57,59,61,63,65,67,69,71,73,81,83) and tkno1 in ('" . $matk . "') and pskt.tkco !='{$tkdu}' $sql_mand1  " . $this->getStrOderby() . " 
                union all
                    SELECT pskt.loaiphieu,tkno2 as tk,pskt.mapskt as sophieu,noidung2 as noidung,mand2 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,chitiet_pskt.gtvnd2 as tienco,0 as tienno,pskt.tkco as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,1 as sapxep,chitiet_pskt.mabp,chitiet_pskt.loaisp FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  pskt.loaiphieu in(1,3,5,7,9,11,13,15,17,19,21,23,25,27,29,31,33,35,37,39,41,43,45,47,49,51,53,55,57,59,61,63,65,67,69,71,73,81,83) and tkno2 in ('" . $matk . "') and pskt.tkco !='{$tkdu}' $sql_mand2  " . $this->getStrOderby() . "
                union all
                    SELECT pskt.loaiphieu,pskt.tkco as tk,pskt.mapskt as sophieu,noidung1 as noidung,mand1 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,0 as tienco,chitiet_pskt.gtvnd1 as tienno,chitiet_pskt.tkno1 as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,3 as sapxep,chitiet_pskt.mabp,chitiet_pskt.loaisp FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  pskt.loaiphieu in(1,3,5,7,9,11,13,15,17,19,21,23,25,27,29,31,33,35,37,39,41,43,45,47,49,51,53,55,57,59,61,63,65,67,69,71,73,81,83) and pskt.tkco in ('" . $matk . "') and chitiet_pskt.tkno1 !='{$tkdu}' $sql_mand1  " . $this->getStrOderby() . "
                union all
                    SELECT pskt.loaiphieu,pskt.tkco as tk,pskt.mapskt as sophieu,noidung2 as noidung,mand2 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,0 as tienco,chitiet_pskt.gtvnd2 as tienno,chitiet_pskt.tkno2 as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,3 as sapxep,chitiet_pskt.mabp,chitiet_pskt.loaisp FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  chitiet_pskt.tkno2!=0 and pskt.loaiphieu in(1,3,5,7,9,11,13,15,17,19,21,23,25,27,29,31,33,35,37,39,41,43,45,47,49,51,53,55,57,59,61,63,65,67,69,71,73,81,83) and pskt.tkco in ('" . $matk . "') and chitiet_pskt.tkno2 !='{$tkdu}' $sql_mand2 " . $this->getStrOderby() . "
                union all
                    SELECT pskt.loaiphieu,tkno1 as tk,pskt.mapskt as sophieu,noidung1 as noidung,mand1 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,0 as tienco,chitiet_pskt.gtvnd1 as tienno,pskt.tkco as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,4 as sapxep,chitiet_pskt.mabp,chitiet_pskt.loaisp FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  pskt.loaiphieu in(2,4,6,8,10,12,14,16,18,20,22,24,26,28,30,32,34,36,38,40,42,44,46,48,50,52,54,56,58,60,62,64,66,68) and tkno1 in ('" . $matk . "') and pskt.tkco !='{$tkdu}' $sql_mand1  " . $this->getStrOderby() . "
                union all
                    SELECT pskt.loaiphieu,tkno2 as tk,pskt.mapskt as sophieu,noidung2 as noidung,mand2 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,0 as tienco,chitiet_pskt.gtvnd2 as tienno,pskt.tkco as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,4 as sapxep,chitiet_pskt.mabp,chitiet_pskt.loaisp FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  pskt.loaiphieu in(2,4,6,8,10,12,14,16,18,20,22,24,26,28,30,32,34,36,38,40,42,44,46,48,50,52,54,56,58,60,62,64,66,68) and tkno2 in ('" . $matk . "') and pskt.tkco !='{$tkdu}' $sql_mand2 " . $this->getStrOderby() . "
                union all
                   SELECT psvt.loaiphieu,dinhkhoan_psvt.tkno as tk,mapskt as sophieu,noidung as noidung,mand as mand,ngayghiso,sct,ngayhoadon,chuthich,0 as tienco,sotien as tienno,dinhkhoan_psvt.tkco as tkdu,MONTH(ngayghiso) as thang,dinhkhoan_psvt.sott,1 as sapxep,psvt.makho as mabp,psvt.loaisp FROM psvt INNER JOIN dinhkhoan_psvt on(psvt.sophieu=dinhkhoan_psvt.sophieu) where 0=0  and dinhkhoan_psvt.tkno in ('" . $matk . "') and dinhkhoan_psvt.tkco !='{$tkdu}' $sql_mand3 " . $this->getStrOderby2() . "
                union all
                    SELECT psvt.loaiphieu,dinhkhoan_psvt.tkco as tk,mapskt as sophieu,noidung as noidung,mand as mand,ngayghiso,sct,ngayhoadon,chuthich,sotien as tienco,0 as tienno,dinhkhoan_psvt.tkno as tkdu,MONTH(ngayghiso) as thang,dinhkhoan_psvt.sott,1 as sapxep,psvt.makho as mabp,psvt.loaisp FROM psvt INNER JOIN dinhkhoan_psvt on(psvt.sophieu=dinhkhoan_psvt.sophieu) where 0=0  and dinhkhoan_psvt.tkco in ('" . $matk . "') and dinhkhoan_psvt.tkco !='{$tkdu}' $sql_mand3 " . $this->getStrOderby2() . "

         order by sott";

        $this->query($sql);
        $row = array();
        $i = 0;
        while ($data = $this->fetch()) {
            $tk = $data['tk'];
            $tkdu = $data['tkdu'];
            if ($data['tkdu'] == "1331") {
                if ($data['mand'] == "") {
                    $data['noidung'] = "Thuế GTGT đầu vào";
                    $data['mand'] = "100000";
                }
            }
            if ($data['tkdu'] == "1332") {
                if ($data['mand'] == "") {
                    $data['noidung'] = "Thuế GTGT được khấu trừ của TSCĐ";
                }
            }
            if ($data['tkdu'] == "33311") {
                if ($data['mand'] == "") {
                    $data['noidung'] = "Thuế GTGT đầu ra";
                    $data['mand'] = "100001";
                }
            }
            if ($data['tkdu'] == "33312") {
                if ($data['mand'] == "") {
                    $data['noidung'] = "Thuế GTGT hàng hóa nhập khẩu";
                }
            }
            $theomabp = $data['mabp'];
            $data['tienco'] += $row[$theomabp]['tienco'];
            $data['tienno'] += $row[$theomabp]['tienno'];

            $row[$theomabp] = $data;
        }
        return $row;

    }

    public function load_danhsach_no_co_giavonhanghoa($matk_str, $theonoidung, $tkdu)
    {// Lấy danh sách phiếu chi trong sổ cái
        $matk_arr = explode(",", $matk_str);
        $matk = implode("','", $matk_arr);
        $tongtienco = 0;
        $tongtienno = 0;
        if ($theonoidung == 'ALL') {
            $sql_mand1 = " ";
            $sql_mand2 = " ";
        } else {
            $sql_mand1 = " and mand1='" . $theonoidung . "'";
            $sql_mand2 = " and mand2='" . $theonoidung . "'";
            $sql_mand3 = " and mand='" . $theonoidung . "'";
        }
        $sql = "SELECT pskt.loaiphieu,pskt.tkco as tk,pskt.mapskt as sophieu,noidung1 as noidung,mand1 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,(chitiet_pskt.gtvnd1) as tienco,0 as tienno,chitiet_pskt.tkno1 as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,4 as sapxep,chitiet_pskt.mabp FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where   pskt.loaiphieu in(2,4,6,8,10,12,14,16,18,20,22,24,26,28,30,32,34,36,38,40,42,44,46,48,50,52,54,56,58,60,62,64,66,68) and pskt.tkco in ('" . $matk . "') and chitiet_pskt.tkno1 in ('" . $tkdu . "') $sql_mand1  " . $this->getStrOderby() . "
                union all
                    SELECT pskt.loaiphieu,pskt.tkco as tk,pskt.mapskt as sophieu,noidung2 as noidung,mand2 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,chitiet_pskt.gtvnd2 as tienco,0 as tienno,chitiet_pskt.tkno2 as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,4 as sapxep,chitiet_pskt.mabp FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  chitiet_pskt.tkno2!=0 and pskt.loaiphieu in(2,4,6,8,10,12,14,16,18,20,22,24,26,28,30,32,34,36,38,40,42,44,46,48,50,52,54,56,58,60,62,64,66,68) and pskt.tkco in ('" . $matk . "') and chitiet_pskt.tkno2 in ('" . $tkdu . "') $sql_mand2  " . $this->getStrOderby() . " 
                union all
                    SELECT pskt.loaiphieu,tkno1 as tk,pskt.mapskt as sophieu,noidung1 as noidung,mand1 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,chitiet_pskt.gtvnd1 as tienco,0 as tienno,pskt.tkco as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,1 as sapxep,chitiet_pskt.mabp FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  pskt.loaiphieu in(1,3,5,7,9,11,13,15,17,19,21,23,25,27,29,31,33,35,37,39,41,43,45,47,49,51,53,55,57,59,61,63,65,67,69,71,73,75,77,79,81,83,85,87,89) and tkno1 in ('" . $matk . "') and pskt.tkco in ('" . $tkdu . "') $sql_mand1  " . $this->getStrOderby() . " 
                union all
                    SELECT pskt.loaiphieu,tkno2 as tk,pskt.mapskt as sophieu,noidung2 as noidung,mand2 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,chitiet_pskt.gtvnd2 as tienco,0 as tienno,pskt.tkco as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,1 as sapxep,chitiet_pskt.mabp FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  pskt.loaiphieu in(1,3,5,7,9,11,13,15,17,19,21,23,25,27,29,31,33,35,37,39,41,43,45,47,49,51,53,55,57,59,61,63,65,67,69,71,73,75,77,79,81,83,85,87,89) and tkno2 in ('" . $matk . "') and pskt.tkco in ('" . $tkdu . "') $sql_mand2  " . $this->getStrOderby() . "
                union all
                    SELECT pskt.loaiphieu,pskt.tkco as tk,pskt.mapskt as sophieu,noidung1 as noidung,mand1 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,0 as tienco,chitiet_pskt.gtvnd1 as tienno,chitiet_pskt.tkno1 as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,3 as sapxep,chitiet_pskt.mabp FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  pskt.loaiphieu in(1,3,5,7,9,11,13,15,17,19,21,23,25,27,29,31,33,35,37,39,41,43,45,47,49,51,53,55,57,59,61,63,65,67,69,71,73,75,77,79,81,83,85,87,89) and pskt.tkco in ('" . $matk . "') and chitiet_pskt.tkno1 in ('" . $tkdu . "') $sql_mand1  " . $this->getStrOderby() . "
                union all
                    SELECT pskt.loaiphieu,pskt.tkco as tk,pskt.mapskt as sophieu,noidung2 as noidung,mand2 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,0 as tienco,chitiet_pskt.gtvnd2 as tienno,chitiet_pskt.tkno2 as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,3 as sapxep,chitiet_pskt.mabp FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  chitiet_pskt.tkno2!=0 and pskt.loaiphieu in(1,3,5,7,9,11,13,15,17,19,21,23,25,27,29,31,33,35,37,39,41,43,45,47,49,51,53,55,57,59,61,63,65,67,69,71,73,75,77,79,81,83,85,87,89) and pskt.tkco in ('" . $matk . "') and chitiet_pskt.tkno2 in ('" . $tkdu . "') $sql_mand2 " . $this->getStrOderby() . "
                union all
                    SELECT pskt.loaiphieu,tkno1 as tk,pskt.mapskt as sophieu,noidung1 as noidung,mand1 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,0 as tienco,chitiet_pskt.gtvnd1 as tienno,pskt.tkco as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,4 as sapxep,chitiet_pskt.mabp FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  pskt.loaiphieu in(2,4,6,8,10,12,14,16,18,20,22,24,26,28,30,32,34,36,38,40,42,44,46,48,50,52,54,56,58,60,62,64,66,68) and tkno1 in ('" . $matk . "') and pskt.tkco in ('" . $tkdu . "') $sql_mand1  " . $this->getStrOderby() . "
                union all
                    SELECT pskt.loaiphieu,tkno2 as tk,pskt.mapskt as sophieu,noidung2 as noidung,mand2 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,0 as tienco,chitiet_pskt.gtvnd2 as tienno,pskt.tkco as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,4 as sapxep,chitiet_pskt.mabp FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  pskt.loaiphieu in(2,4,6,8,10,12,14,16,18,20,22,24,26,28,30,32,34,36,38,40,42,44,46,48,50,52,54,56,58,60,62,64,66,68) and tkno2 in ('" . $matk . "') and pskt.tkco in ('" . $tkdu . "') $sql_mand2 " . $this->getStrOderby() . "
                union all
                    SELECT psvt.loaiphieu,dinhkhoan_psvt.tkno as tk,mapskt as sophieu,noidung as noidung,mand as mand,ngayghiso,sct,ngayhoadon,chuthich,0 as tienco,sotien as tienno,dinhkhoan_psvt.tkco as tkdu,MONTH(ngayghiso) as thang,dinhkhoan_psvt.sott,1 as sapxep,'' as mabp FROM psvt INNER JOIN dinhkhoan_psvt on(psvt.sophieu=dinhkhoan_psvt.sophieu) where 0=0 and dinhkhoan_psvt.tkno in ('" . $matk . "') and dinhkhoan_psvt.tkco in ('" . $tkdu . "')  $sql_mand3 " . $this->getStrOderby2() . "
                union all
                    SELECT psvt.loaiphieu,dinhkhoan_psvt.tkco as tk,mapskt as sophieu,noidung as noidung,mand as mand,ngayghiso,sct,ngayhoadon,chuthich,sotien as tienco,0 as tienno,dinhkhoan_psvt.tkno as tkdu,MONTH(ngayghiso) as thang,dinhkhoan_psvt.sott,1 as sapxep,'' as mabp FROM psvt INNER JOIN dinhkhoan_psvt on(psvt.sophieu=dinhkhoan_psvt.sophieu) where 0=0 and dinhkhoan_psvt.tkco in ('" . $matk . "') and dinhkhoan_psvt.tkno in ('" . $tkdu . "') $sql_mand3 " . $this->getStrOderby2() . "

         order by sott";

        $this->query($sql);
        $row = array();
        $i = 0;
        $tienno = 0;
        $tienco = 0;
        while ($data = $this->fetch()) {
            $tk = $data['tk'];
            $tkdu = $data['tkdu'];
            if ($data['tkdu'] == "1331") {
                if ($data['mand'] == "") {
                    $data['noidung'] = "Thuế GTGT đầu vào";
                    $data['mand'] = "100000";
                }
            }
            if ($data['tkdu'] == "1332") {
                if ($data['mand'] == "") {
                    $data['noidung'] = "Thuế GTGT được khấu trừ của TSCĐ";
                }
            }
            if ($data['tkdu'] == "33311") {
                if ($data['mand'] == "") {
                    $data['noidung'] = "Thuế GTGT đầu ra";
                    $data['mand'] = "100001";
                }
            }
            if ($data['tkdu'] == "33312") {
                if ($data['mand'] == "") {
                    $data['noidung'] = "Thuế GTGT hàng hóa nhập khẩu";
                }
            }
            $tienno += $data['tienno'];
            $tienco += $data['tienco'];

        }
        $row['tienco'] = $tienco;
        $row['tienno'] = $tienno;
        return $row;

    }

    public function load_danhsach_no_co_giavonhanghoa_namtruoc($matk_str, $theonoidung, $tkdu, $dataabase)
    {// Lấy danh sách phiếu chi trong sổ cái
        $matk_arr = explode(",", $matk_str);
        $matk = implode("','", $matk_arr);
        $tongtienco = 0;
        $tongtienno = 0;
        if ($theonoidung == 'ALL') {
            $sql_mand1 = " ";
            $sql_mand2 = " ";
        } else {
            $sql_mand1 = " and mand1='" . $theonoidung . "'";
            $sql_mand2 = " and mand2='" . $theonoidung . "'";
            $sql_mand3 = " and mand='" . $theonoidung . "'";
        }
        $sql = "SELECT pskt.loaiphieu,pskt.tkco as tk,pskt.mapskt as sophieu,noidung1 as noidung,mand1 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,(chitiet_pskt.gtvnd1) as tienco,0 as tienno,chitiet_pskt.tkno1 as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,4 as sapxep,chitiet_pskt.mabp FROM {$dataabase}.pskt pskt INNER JOIN {$dataabase}.chitiet_pskt chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where   pskt.loaiphieu in(2,4,6,8,10,12,14,16,18,20,22,24,26,28,30,32,34,36,38,40,42,44,46,48,50,52,54,56,58,60,62,64,66,68) and pskt.tkco in ('" . $matk . "') and chitiet_pskt.tkno1 in ('" . $tkdu . "') $sql_mand1  " . $this->getStrOderby() . "
                union all
                    SELECT pskt.loaiphieu,pskt.tkco as tk,pskt.mapskt as sophieu,noidung2 as noidung,mand2 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,chitiet_pskt.gtvnd2 as tienco,0 as tienno,chitiet_pskt.tkno2 as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,4 as sapxep,chitiet_pskt.mabp FROM {$dataabase}.pskt pskt INNER JOIN {$dataabase}.chitiet_pskt chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  chitiet_pskt.tkno2!=0 and pskt.loaiphieu in(2,4,6,8,10,12,14,16,18,20,22,24,26,28,30,32,34,36,38,40,42,44,46,48,50,52,54,56,58,60,62,64,66,68) and pskt.tkco in ('" . $matk . "') and chitiet_pskt.tkno2 in ('" . $tkdu . "') $sql_mand2  " . $this->getStrOderby() . " 
                union all
                    SELECT pskt.loaiphieu,tkno1 as tk,pskt.mapskt as sophieu,noidung1 as noidung,mand1 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,chitiet_pskt.gtvnd1 as tienco,0 as tienno,pskt.tkco as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,1 as sapxep,chitiet_pskt.mabp FROM pskt FROM {$dataabase}.pskt pskt INNER JOIN {$dataabase}.chitiet_pskt chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  pskt.loaiphieu in(1,3,5,7,9,11,13,15,17,19,21,23,25,27,29,31,33,35,37,39,41,43,45,47,49,51,53,55,57,59,61,63,65,67,69,71,73,75,77,79,81,83,85,87,89) and tkno1 in ('" . $matk . "') and pskt.tkco in ('" . $tkdu . "') $sql_mand1  " . $this->getStrOderby() . " 
                union all
                    SELECT pskt.loaiphieu,tkno2 as tk,pskt.mapskt as sophieu,noidung2 as noidung,mand2 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,chitiet_pskt.gtvnd2 as tienco,0 as tienno,pskt.tkco as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,1 as sapxep,chitiet_pskt.mabp FROM {$dataabase}.pskt pskt INNER JOIN {$dataabase}.chitiet_pskt chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  pskt.loaiphieu in(1,3,5,7,9,11,13,15,17,19,21,23,25,27,29,31,33,35,37,39,41,43,45,47,49,51,53,55,57,59,61,63,65,67,69,71,73,75,77,79,81,83,85,87,89) and tkno2 in ('" . $matk . "') and pskt.tkco in ('" . $tkdu . "') $sql_mand2  " . $this->getStrOderby() . "
                union all
                    SELECT pskt.loaiphieu,pskt.tkco as tk,pskt.mapskt as sophieu,noidung1 as noidung,mand1 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,0 as tienco,chitiet_pskt.gtvnd1 as tienno,chitiet_pskt.tkno1 as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,3 as sapxep,chitiet_pskt.mabp FROM {$dataabase}.pskt pskt INNER JOIN {$dataabase}.chitiet_pskt chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  pskt.loaiphieu in(1,3,5,7,9,11,13,15,17,19,21,23,25,27,29,31,33,35,37,39,41,43,45,47,49,51,53,55,57,59,61,63,65,67,69,71,73,75,77,79,81,83,85,87,89) and pskt.tkco in ('" . $matk . "') and chitiet_pskt.tkno1 in ('" . $tkdu . "') $sql_mand1  " . $this->getStrOderby() . "
                union all
                    SELECT pskt.loaiphieu,pskt.tkco as tk,pskt.mapskt as sophieu,noidung2 as noidung,mand2 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,0 as tienco,chitiet_pskt.gtvnd2 as tienno,chitiet_pskt.tkno2 as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,3 as sapxep,chitiet_pskt.mabp FROM {$dataabase}.pskt pskt INNER JOIN {$dataabase}.chitiet_pskt chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  chitiet_pskt.tkno2!=0 and pskt.loaiphieu in(1,3,5,7,9,11,13,15,17,19,21,23,25,27,29,31,33,35,37,39,41,43,45,47,49,51,53,55,57,59,61,63,65,67,69,71,73,75,77,79,81,83,85,87,89) and pskt.tkco in ('" . $matk . "') and chitiet_pskt.tkno2 in ('" . $tkdu . "') $sql_mand2 " . $this->getStrOderby() . "
                union all
                    SELECT pskt.loaiphieu,tkno1 as tk,pskt.mapskt as sophieu,noidung1 as noidung,mand1 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,0 as tienco,chitiet_pskt.gtvnd1 as tienno,pskt.tkco as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,4 as sapxep,chitiet_pskt.mabp FROM {$dataabase}.pskt pskt INNER JOIN {$dataabase}.chitiet_pskt chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  pskt.loaiphieu in(2,4,6,8,10,12,14,16,18,20,22,24,26,28,30,32,34,36,38,40,42,44,46,48,50,52,54,56,58,60,62,64,66,68) and tkno1 in ('" . $matk . "') and pskt.tkco in ('" . $tkdu . "') $sql_mand1  " . $this->getStrOderby() . "
                union all
                    SELECT pskt.loaiphieu,tkno2 as tk,pskt.mapskt as sophieu,noidung2 as noidung,mand2 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,0 as tienco,chitiet_pskt.gtvnd2 as tienno,pskt.tkco as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,4 as sapxep,chitiet_pskt.mabp FROM {$dataabase}.pskt pskt INNER JOIN {$dataabase}.chitiet_pskt chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  pskt.loaiphieu in(2,4,6,8,10,12,14,16,18,20,22,24,26,28,30,32,34,36,38,40,42,44,46,48,50,52,54,56,58,60,62,64,66,68) and tkno2 in ('" . $matk . "') and pskt.tkco in ('" . $tkdu . "') $sql_mand2 " . $this->getStrOderby() . "
                union all
                    SELECT psvt.loaiphieu,dinhkhoan_psvt.tkno as tk,mapskt as sophieu,noidung as noidung,mand as mand,ngayghiso,sct,ngayhoadon,chuthich,0 as tienco,sotien as tienno,dinhkhoan_psvt.tkco as tkdu,MONTH(ngayghiso) as thang,dinhkhoan_psvt.sott,1 as sapxep,'' as mabp FROM {$dataabase}.psvt psvt INNER JOIN {$dataabase}.dinhkhoan_psvt dinhkhoan_psvt on(psvt.sophieu=dinhkhoan_psvt.sophieu) where 0=0 and dinhkhoan_psvt.tkno in ('" . $matk . "') and dinhkhoan_psvt.tkco in ('" . $tkdu . "')  $sql_mand3 " . $this->getStrOderby2() . "
                union all
                    SELECT psvt.loaiphieu,dinhkhoan_psvt.tkco as tk,mapskt as sophieu,noidung as noidung,mand as mand,ngayghiso,sct,ngayhoadon,chuthich,sotien as tienco,0 as tienno,dinhkhoan_psvt.tkno as tkdu,MONTH(ngayghiso) as thang,dinhkhoan_psvt.sott,1 as sapxep,'' as mabp FROM {$dataabase}.psvt psvt INNER JOIN {$dataabase}.dinhkhoan_psvt dinhkhoan_psvt on(psvt.sophieu=dinhkhoan_psvt.sophieu) where 0=0 and dinhkhoan_psvt.tkco in ('" . $matk . "') and dinhkhoan_psvt.tkno in ('" . $tkdu . "') $sql_mand3 " . $this->getStrOderby2() . "

         order by sott";

        $this->query($sql);
        $row = array();
        $i = 0;
        $tienno = 0;
        $tienco = 0;
        while ($data = $this->fetch()) {
            $tk = $data['tk'];
            $tkdu = $data['tkdu'];
            if ($data['tkdu'] == "1331") {
                if ($data['mand'] == "") {
                    $data['noidung'] = "Thuế GTGT đầu vào";
                    $data['mand'] = "100000";
                }
            }
            if ($data['tkdu'] == "1332") {
                if ($data['mand'] == "") {
                    $data['noidung'] = "Thuế GTGT được khấu trừ của TSCĐ";
                }
            }
            if ($data['tkdu'] == "33311") {
                if ($data['mand'] == "") {
                    $data['noidung'] = "Thuế GTGT đầu ra";
                    $data['mand'] = "100001";
                }
            }
            if ($data['tkdu'] == "33312") {
                if ($data['mand'] == "") {
                    $data['noidung'] = "Thuế GTGT hàng hóa nhập khẩu";
                }
            }
            $tienno += $data['tienno'];
            $tienco += $data['tienco'];

        }
        $row['tienco'] = $tienco;
        $row['tienno'] = $tienno;
        return $row;

    }

    public function load_danhsach_no_co_giamgiavonhanghoa($matk_str, $theonoidung, $tkdu)
    {// Lấy danh sách phiếu chi trong sổ cái
        $matk_arr = explode(",", $matk_str);
        $matk = implode("','", $matk_arr);
        $tienco = 0;
        $tienno = 0;
        if ($theonoidung == 'ALL') {
            $sql_mand1 = " ";
            $sql_mand2 = " ";
        } else {
            $sql_mand1 = " and mand1='" . $theonoidung . "'";
            $sql_mand2 = " and mand2='" . $theonoidung . "'";
            $sql_mand3 = " and mand='" . $theonoidung . "'";
        }
        $sql = "SELECT pskt.loaiphieu,pskt.tkco as tk,pskt.mapskt as sophieu,noidung1 as noidung,mand1 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,(chitiet_pskt.gtvnd1) as tienco,0 as tienno,chitiet_pskt.tkno1 as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,4 as sapxep,chitiet_pskt.mabp FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where   pskt.loaiphieu in(2,4,6,8,10,12,14,16,18,20,22,24,26,28,30,32,34,36,38,40,42,44,46,48,50,52,54,56,58,60,62,64,66,68) and pskt.tkco in ('" . $matk . "') and chitiet_pskt.tkno1 not in ('" . $tkdu . "') $sql_mand1  " . $this->getStrOderby() . "
                union all
                    SELECT pskt.loaiphieu,pskt.tkco as tk,pskt.mapskt as sophieu,noidung2 as noidung,mand2 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,chitiet_pskt.gtvnd2 as tienco,0 as tienno,chitiet_pskt.tkno2 as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,4 as sapxep,chitiet_pskt.mabp FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  chitiet_pskt.tkno2!=0 and pskt.loaiphieu in(2,4,6,8,10,12,14,16,18,20,22,24,26,28,30,32,34,36,38,40,42,44,46,48,50,52,54,56,58,60,62,64,66,68) and pskt.tkco in ('" . $matk . "') and chitiet_pskt.tkno2 not in ('" . $tkdu . "') $sql_mand2  " . $this->getStrOderby() . " 
                union all
                    SELECT pskt.loaiphieu,tkno1 as tk,pskt.mapskt as sophieu,noidung1 as noidung,mand1 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,chitiet_pskt.gtvnd1 as tienco,0 as tienno,pskt.tkco as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,1 as sapxep,chitiet_pskt.mabp FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  pskt.loaiphieu in(1,3,5,7,9,11,13,15,17,19,21,23,25,27,29,31,33,35,37,39,41,43,45,47,49,51,53,55,57,59,61,63,65,67,69,71,73,75,77,79,81,83,85,87,89) and tkno1 in ('" . $matk . "') and pskt.tkco not in ('" . $tkdu . "') $sql_mand1  " . $this->getStrOderby() . " 
                union all
                    SELECT pskt.loaiphieu,tkno2 as tk,pskt.mapskt as sophieu,noidung2 as noidung,mand2 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,chitiet_pskt.gtvnd2 as tienco,0 as tienno,pskt.tkco as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,1 as sapxep,chitiet_pskt.mabp FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  pskt.loaiphieu in(1,3,5,7,9,11,13,15,17,19,21,23,25,27,29,31,33,35,37,39,41,43,45,47,49,51,53,55,57,59,61,63,65,67,69,71,73,75,77,79,81,83,85,87,89) and tkno2 in ('" . $matk . "') and pskt.tkco not in ('" . $tkdu . "') $sql_mand2  " . $this->getStrOderby() . "
                union all
                    SELECT pskt.loaiphieu,pskt.tkco as tk,pskt.mapskt as sophieu,noidung1 as noidung,mand1 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,0 as tienco,chitiet_pskt.gtvnd1 as tienno,chitiet_pskt.tkno1 as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,3 as sapxep,chitiet_pskt.mabp FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  pskt.loaiphieu in(1,3,5,7,9,11,13,15,17,19,21,23,25,27,29,31,33,35,37,39,41,43,45,47,49,51,53,55,57,59,61,63,65,67,69,71,73,75,77,79,81,83,85,87,89) and pskt.tkco in ('" . $matk . "') and chitiet_pskt.tkno1 not in ('" . $tkdu . "') $sql_mand1  " . $this->getStrOderby() . "
                union all
                    SELECT pskt.loaiphieu,pskt.tkco as tk,pskt.mapskt as sophieu,noidung2 as noidung,mand2 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,0 as tienco,chitiet_pskt.gtvnd2 as tienno,chitiet_pskt.tkno2 as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,3 as sapxep,chitiet_pskt.mabp FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  chitiet_pskt.tkno2!=0 and pskt.loaiphieu in(1,3,5,7,9,11,13,15,17,19,21,23,25,27,29,31,33,35,37,39,41,43,45,47,49,51,53,55,57,59,61,63,65,67,69,71,73,75,77,79,81,83,85,87,89) and pskt.tkco in ('" . $matk . "') and chitiet_pskt.tkno2 not in ('" . $tkdu . "') $sql_mand2 " . $this->getStrOderby() . "
                union all
                    SELECT pskt.loaiphieu,tkno1 as tk,pskt.mapskt as sophieu,noidung1 as noidung,mand1 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,0 as tienco,chitiet_pskt.gtvnd1 as tienno,pskt.tkco as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,4 as sapxep,chitiet_pskt.mabp FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  pskt.loaiphieu in(2,4,6,8,10,12,14,16,18,20,22,24,26,28,30,32,34,36,38,40,42,44,46,48,50,52,54,56,58,60,62,64,66,68) and tkno1 in ('" . $matk . "') and pskt.tkco not in ('" . $tkdu . "') $sql_mand1  " . $this->getStrOderby() . "
                union all
                    SELECT pskt.loaiphieu,tkno2 as tk,pskt.mapskt as sophieu,noidung2 as noidung,mand2 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,0 as tienco,chitiet_pskt.gtvnd2 as tienno,pskt.tkco as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,4 as sapxep,chitiet_pskt.mabp FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  pskt.loaiphieu in(2,4,6,8,10,12,14,16,18,20,22,24,26,28,30,32,34,36,38,40,42,44,46,48,50,52,54,56,58,60,62,64,66,68) and tkno2 in ('" . $matk . "') and pskt.tkco not in ('" . $tkdu . "') $sql_mand2 " . $this->getStrOderby() . "
                union all
                    SELECT psvt.loaiphieu,dinhkhoan_psvt.tkno as tk,mapskt as sophieu,noidung as noidung,mand as mand,ngayghiso,sct,ngayhoadon,chuthich,0 as tienco,sotien as tienno,dinhkhoan_psvt.tkco as tkdu,MONTH(ngayghiso) as thang,dinhkhoan_psvt.sott,1 as sapxep,'' as mabp FROM psvt INNER JOIN dinhkhoan_psvt on(psvt.sophieu=dinhkhoan_psvt.sophieu) where 0=0 and dinhkhoan_psvt.tkno in ('" . $matk . "') and dinhkhoan_psvt.tkco not in ('" . $tkdu . "')  $sql_mand3 " . $this->getStrOderby2() . "
                union all
                    SELECT psvt.loaiphieu,dinhkhoan_psvt.tkco as tk,mapskt as sophieu,noidung as noidung,mand as mand,ngayghiso,sct,ngayhoadon,chuthich,sotien as tienco,0 as tienno,dinhkhoan_psvt.tkno as tkdu,MONTH(ngayghiso) as thang,dinhkhoan_psvt.sott,1 as sapxep,'' as mabp FROM psvt INNER JOIN dinhkhoan_psvt on(psvt.sophieu=dinhkhoan_psvt.sophieu) where 0=0 and dinhkhoan_psvt.tkco in ('" . $matk . "') and dinhkhoan_psvt.tkno not in ('" . $tkdu . "') $sql_mand3 " . $this->getStrOderby2() . "

         order by sott";

        $this->query($sql);
        $row = array();
        $i = 0;
        $tienno = 0;
        $tienco = 0;
        while ($data = $this->fetch()) {
            $tk = $data['tk'];
            $tkdu = $data['tkdu'];
            if ($data['tkdu'] == "1331") {
                if ($data['mand'] == "") {
                    $data['noidung'] = "Thuế GTGT đầu vào";
                    $data['mand'] = "100000";
                }
            }
            if ($data['tkdu'] == "1332") {
                if ($data['mand'] == "") {
                    $data['noidung'] = "Thuế GTGT được khấu trừ của TSCĐ";
                }
            }
            if ($data['tkdu'] == "33311") {
                if ($data['mand'] == "") {
                    $data['noidung'] = "Thuế GTGT đầu ra";
                    $data['mand'] = "100001";
                }
            }
            if ($data['tkdu'] == "33312") {
                if ($data['mand'] == "") {
                    $data['noidung'] = "Thuế GTGT hàng hóa nhập khẩu";
                }
            }
            $tienno += $data['tienno'];
            $tienco += $data['tienco'];
            //$row[] =$data;
        }
        $row['tienco'] = $tienco;
        $row['tienno'] = $tienno;
        return $row;

    }

    public function load_danhsach_no_co_giamgiavonhanghoa_namtruoc($matk_str, $theonoidung, $tkdu, $database)
    {// Lấy danh sách phiếu chi trong sổ cái
        $matk_arr = explode(",", $matk_str);
        $matk = implode("','", $matk_arr);
        $tienco = 0;
        $tienno = 0;
        if ($theonoidung == 'ALL') {
            $sql_mand1 = " ";
            $sql_mand2 = " ";
        } else {
            $sql_mand1 = " and mand1='" . $theonoidung . "'";
            $sql_mand2 = " and mand2='" . $theonoidung . "'";
            $sql_mand3 = " and mand='" . $theonoidung . "'";
        }
        $sql = "SELECT pskt.loaiphieu,pskt.tkco as tk,pskt.mapskt as sophieu,noidung1 as noidung,mand1 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,(chitiet_pskt.gtvnd1) as tienco,0 as tienno,chitiet_pskt.tkno1 as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,4 as sapxep,chitiet_pskt.mabp FROM {$database}.pskt pskt INNER JOIN {$database}.chitiet_pskt chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where   pskt.loaiphieu in(2,4,6,8,10,12,14,16,18,20,22,24,26,28,30,32,34,36,38,40,42,44,46,48,50,52,54,56,58,60,62,64,66,68) and pskt.tkco in ('" . $matk . "') and chitiet_pskt.tkno1 not in ('" . $tkdu . "') $sql_mand1  " . $this->getStrOderby() . "
                union all
                    SELECT pskt.loaiphieu,pskt.tkco as tk,pskt.mapskt as sophieu,noidung2 as noidung,mand2 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,chitiet_pskt.gtvnd2 as tienco,0 as tienno,chitiet_pskt.tkno2 as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,4 as sapxep,chitiet_pskt.mabp FROM {$database}.pskt pskt INNER JOIN {$database}.chitiet_pskt chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  chitiet_pskt.tkno2!=0 and pskt.loaiphieu in(2,4,6,8,10,12,14,16,18,20,22,24,26,28,30,32,34,36,38,40,42,44,46,48,50,52,54,56,58,60,62,64,66,68) and pskt.tkco in ('" . $matk . "') and chitiet_pskt.tkno2 not in ('" . $tkdu . "') $sql_mand2  " . $this->getStrOderby() . " 
                union all
                    SELECT pskt.loaiphieu,tkno1 as tk,pskt.mapskt as sophieu,noidung1 as noidung,mand1 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,chitiet_pskt.gtvnd1 as tienco,0 as tienno,pskt.tkco as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,1 as sapxep,chitiet_pskt.mabp FROM {$database}.pskt pskt INNER JOIN {$database}.chitiet_pskt chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  pskt.loaiphieu in(1,3,5,7,9,11,13,15,17,19,21,23,25,27,29,31,33,35,37,39,41,43,45,47,49,51,53,55,57,59,61,63,65,67,69,71,73,75,77,79,81,83,85,87,89) and tkno1 in ('" . $matk . "') and pskt.tkco not in ('" . $tkdu . "') $sql_mand1  " . $this->getStrOderby() . " 
                union all
                    SELECT pskt.loaiphieu,tkno2 as tk,pskt.mapskt as sophieu,noidung2 as noidung,mand2 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,chitiet_pskt.gtvnd2 as tienco,0 as tienno,pskt.tkco as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,1 as sapxep,chitiet_pskt.mabp FROM {$database}.pskt pskt INNER JOIN {$database}.chitiet_pskt chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  pskt.loaiphieu in(1,3,5,7,9,11,13,15,17,19,21,23,25,27,29,31,33,35,37,39,41,43,45,47,49,51,53,55,57,59,61,63,65,67,69,71,73,75,77,79,81,83,85,87,89) and tkno2 in ('" . $matk . "') and pskt.tkco not in ('" . $tkdu . "') $sql_mand2  " . $this->getStrOderby() . "
                union all
                    SELECT pskt.loaiphieu,pskt.tkco as tk,pskt.mapskt as sophieu,noidung1 as noidung,mand1 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,0 as tienco,chitiet_pskt.gtvnd1 as tienno,chitiet_pskt.tkno1 as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,3 as sapxep,chitiet_pskt.mabp FROM {$database}.pskt pskt INNER JOIN {$database}.chitiet_pskt chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  pskt.loaiphieu in(1,3,5,7,9,11,13,15,17,19,21,23,25,27,29,31,33,35,37,39,41,43,45,47,49,51,53,55,57,59,61,63,65,67,69,71,73,75,77,79,81,83,85,87,89) and pskt.tkco in ('" . $matk . "') and chitiet_pskt.tkno1 not in ('" . $tkdu . "') $sql_mand1  " . $this->getStrOderby() . "
                union all
                    SELECT pskt.loaiphieu,pskt.tkco as tk,pskt.mapskt as sophieu,noidung2 as noidung,mand2 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,0 as tienco,chitiet_pskt.gtvnd2 as tienno,chitiet_pskt.tkno2 as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,3 as sapxep,chitiet_pskt.mabp FROM {$database}.pskt pskt INNER JOIN {$database}.chitiet_pskt chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  chitiet_pskt.tkno2!=0 and pskt.loaiphieu in(1,3,5,7,9,11,13,15,17,19,21,23,25,27,29,31,33,35,37,39,41,43,45,47,49,51,53,55,57,59,61,63,65,67,69,71,73,75,77,79,81,83,85,87,89) and pskt.tkco in ('" . $matk . "') and chitiet_pskt.tkno2 not in ('" . $tkdu . "') $sql_mand2 " . $this->getStrOderby() . "
                union all
                    SELECT pskt.loaiphieu,tkno1 as tk,pskt.mapskt as sophieu,noidung1 as noidung,mand1 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,0 as tienco,chitiet_pskt.gtvnd1 as tienno,pskt.tkco as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,4 as sapxep,chitiet_pskt.mabp FROM {$database}.pskt pskt INNER JOIN {$database}.chitiet_pskt chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  pskt.loaiphieu in(2,4,6,8,10,12,14,16,18,20,22,24,26,28,30,32,34,36,38,40,42,44,46,48,50,52,54,56,58,60,62,64,66,68) and tkno1 in ('" . $matk . "') and pskt.tkco not in ('" . $tkdu . "') $sql_mand1  " . $this->getStrOderby() . "
                union all
                    SELECT pskt.loaiphieu,tkno2 as tk,pskt.mapskt as sophieu,noidung2 as noidung,mand2 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,0 as tienco,chitiet_pskt.gtvnd2 as tienno,pskt.tkco as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,4 as sapxep,chitiet_pskt.mabp FROM {$database}.pskt pskt INNER JOIN {$database}.chitiet_pskt chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  pskt.loaiphieu in(2,4,6,8,10,12,14,16,18,20,22,24,26,28,30,32,34,36,38,40,42,44,46,48,50,52,54,56,58,60,62,64,66,68) and tkno2 in ('" . $matk . "') and pskt.tkco not in ('" . $tkdu . "') $sql_mand2 " . $this->getStrOderby() . "
                union all
                    SELECT psvt.loaiphieu,dinhkhoan_psvt.tkno as tk,mapskt as sophieu,noidung as noidung,mand as mand,ngayghiso,sct,ngayhoadon,chuthich,0 as tienco,sotien as tienno,dinhkhoan_psvt.tkco as tkdu,MONTH(ngayghiso) as thang,dinhkhoan_psvt.sott,1 as sapxep,'' as mabp FROM {$database}.psvt psvt INNER JOIN {$database}.dinhkhoan_psvt dinhkhoan_psvt on(psvt.sophieu=dinhkhoan_psvt.sophieu) where 0=0 and dinhkhoan_psvt.tkno in ('" . $matk . "') and dinhkhoan_psvt.tkco not in ('" . $tkdu . "')  $sql_mand3 " . $this->getStrOderby2() . "
                union all
                    SELECT psvt.loaiphieu,dinhkhoan_psvt.tkco as tk,mapskt as sophieu,noidung as noidung,mand as mand,ngayghiso,sct,ngayhoadon,chuthich,sotien as tienco,0 as tienno,dinhkhoan_psvt.tkno as tkdu,MONTH(ngayghiso) as thang,dinhkhoan_psvt.sott,1 as sapxep,'' as mabp FROM {$database}.psvt psvt INNER JOIN {$database}.dinhkhoan_psvt dinhkhoan_psvt on(psvt.sophieu=dinhkhoan_psvt.sophieu) where 0=0 and dinhkhoan_psvt.tkco in ('" . $matk . "') and dinhkhoan_psvt.tkno not in ('" . $tkdu . "') $sql_mand3 " . $this->getStrOderby2() . "

         order by sott";

        $this->query($sql);
        $row = array();
        $i = 0;
        $tienno = 0;
        $tienco = 0;
        while ($data = $this->fetch()) {
            $tk = $data['tk'];
            $tkdu = $data['tkdu'];
            if ($data['tkdu'] == "1331") {
                if ($data['mand'] == "") {
                    $data['noidung'] = "Thuế GTGT đầu vào";
                    $data['mand'] = "100000";
                }
            }
            if ($data['tkdu'] == "1332") {
                if ($data['mand'] == "") {
                    $data['noidung'] = "Thuế GTGT được khấu trừ của TSCĐ";
                }
            }
            if ($data['tkdu'] == "33311") {
                if ($data['mand'] == "") {
                    $data['noidung'] = "Thuế GTGT đầu ra";
                    $data['mand'] = "100001";
                }
            }
            if ($data['tkdu'] == "33312") {
                if ($data['mand'] == "") {
                    $data['noidung'] = "Thuế GTGT hàng hóa nhập khẩu";
                }
            }
            $tienno += $data['tienno'];
            $tienco += $data['tienco'];
            //$row[] =$data;
        }
        $row['tienco'] = $tienco;
        $row['tienno'] = $tienno;
        return $row;

    }


    public function load_tongduno_thuchi_theotk($matk_str, $theonoidung, $sapxep)
    {// Lấy danh sách phiếu chi trong sổ cái
        $matk_arr = explode(",", $matk_str);
        $matk = implode("','", $matk_arr);
        if ($theonoidung == 'ALL') {
            $sql_mand1 = " ";
            $sql_mand2 = " ";
        } else {
            $sql_mand1 = " and mand1='" . $theonoidung . "'";
            $sql_mand2 = " and mand2='" . $theonoidung . "'";
            $sql_mand3 = " and mand='" . $theonoidung . "'";
        }
        $sql = "SELECT pskt.loaiphieu,pskt.tkco as tk,chitiet_pskt.mapskt as sophieu,noidung1 as noidung,mand1 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,sum(chitiet_pskt.gtvnd1) as tienco,0 as tienno,chitiet_pskt.tkno1 as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where   pskt.loaiphieu in(2,4,6,8,10,12,14,16,18,20,22,24,26,28,30,32,34,36,38,40,42,44,46,48,50,52,54,56,58,60,62,64,66,68) and pskt.tkco in ('" . $matk . "') $sql_mand1  " . $this->getStrOderby() . " group by pskt.tkco
                union all
                    SELECT pskt.loaiphieu,pskt.tkco as tk,chitiet_pskt.mapskt as sophieu,noidung2 as noidung,mand2 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,sum(chitiet_pskt.gtvnd2) as tienco,0 as tienno,chitiet_pskt.tkno2 as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  chitiet_pskt.tkno2!=0 and pskt.loaiphieu in(2,4,6,8,10,12,14,16,18,20,22,24,26,28,30,32,34,36,38,40,42,44,46,48,50,52,54,56,58,60,62,64,66,68) and pskt.tkco in ('" . $matk . "') $sql_mand2  " . $this->getStrOderby() . " group by pskt.tkco 
                union all
                    SELECT pskt.loaiphieu,tkno1 as tk,chitiet_pskt.mapskt as sophieu,noidung1 as noidung,mand1 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,sum(chitiet_pskt.gtvnd1) as tienco,0 as tienno,pskt.tkco as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  pskt.loaiphieu in(1,3,5,7,9,11,13,15,17,19,21,23,25,27,29,31,33,35,37,39,41,43,45,47,49,51,53,55,57,59,61,63,65,67,69,71,73,75,77,79,81,83,85,87,89) and tkno1 in ('" . $matk . "') $sql_mand1  " . $this->getStrOderby() . " group by tkno1 
                union all
                    SELECT pskt.loaiphieu,tkno2 as tk,chitiet_pskt.mapskt as sophieu,noidung2 as noidung,mand2 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,sum(chitiet_pskt.gtvnd2) as tienco,0 as tienno,pskt.tkco as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  pskt.loaiphieu in(1,3,5,7,9,11,13,15,17,19,21,23,25,27,29,31,33,35,37,39,41,43,45,47,49,51,53,55,57,59,61,63,65,67,69,71,73,75,77,79,81,83,85,87,89) and tkno2 in ('" . $matk . "') $sql_mand2  " . $this->getStrOderby() . "  group by tkno2
                union all
                    SELECT pskt.loaiphieu,pskt.tkco as tk,chitiet_pskt.mapskt as sophieu,noidung1 as noidung,mand1 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,0 as tienco,sum(chitiet_pskt.gtvnd1) as tienno,chitiet_pskt.tkno1 as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  pskt.loaiphieu in(1,3,5,7,9,11,13,15,17,19,21,23,25,27,29,31,33,35,37,39,41,43,45,47,49,51,53,55,57,59,61,63,65,67,69,71,73,75,77,79,81,83,85,87,89) and pskt.tkco in ('" . $matk . "') $sql_mand1  " . $this->getStrOderby() . " group by pskt.tkco
                union all
                    SELECT pskt.loaiphieu,pskt.tkco as tk,chitiet_pskt.mapskt as sophieu,noidung2 as noidung,mand2 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,0 as tienco,sum(chitiet_pskt.gtvnd2) as tienno,chitiet_pskt.tkno2 as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  chitiet_pskt.tkno2!=0 and pskt.loaiphieu in(1,3,5,7,9,11,13,15,17,19,21,23,25,27,29,31,33,35,37,39,41,43,45,47,49,51,53,55,57,59,61,63,65,67,69,71,73,75,77,79,81,83,85,87,89) and pskt.tkco in ('" . $matk . "') $sql_mand2 " . $this->getStrOderby() . "  group by pskt.tkco
                union all
                    SELECT pskt.loaiphieu,tkno1 as tk,chitiet_pskt.mapskt as sophieu,noidung1 as noidung,mand1 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,0 as tienco,sum(chitiet_pskt.gtvnd1) as tienno,pskt.tkco as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  pskt.loaiphieu in(2,4,6,8,10,12,14,16,18,20,22,24,26,28,30,32,34,36,38,40,42,44,46,48,50,52,54,56,58,60,62,64,66,68) and tkno1 in ('" . $matk . "') $sql_mand1  " . $this->getStrOderby() . "  group by tkno1
                union all
                    SELECT pskt.loaiphieu,tkno2 as tk,chitiet_pskt.mapskt as sophieu,noidung2 as noidung,mand2 as mand,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,0 as tienco,(chitiet_pskt.gtvnd2) as tienno,pskt.tkco as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  pskt.loaiphieu in(2,4,6,8,10,12,14,16,18,20,22,24,26,28,30,32,34,36,38,40,42,44,46,48,50,52,54,56,58,60,62,64,66,68) and tkno2 in ('" . $matk . "') $sql_mand2 " . $this->getStrOderby() . " group by tkno2
                union all
                    SELECT psvt.loaiphieu,dinhkhoan_psvt.tkno as tk,mapskt as sophieu,noidung as noidung,mand as mand,ngayghiso,sct,ngayhoadon,chuthich,0 as tienco,sum(sotien) as tienno,dinhkhoan_psvt.tkco as tkdu,MONTH(ngayghiso) as thang,dinhkhoan_psvt.sott FROM psvt INNER JOIN dinhkhoan_psvt on(psvt.sophieu=dinhkhoan_psvt.sophieu) where 0=0  and dinhkhoan_psvt.tkno in ('" . $matk . "') $sql_mand3 " . $this->getStrOderby2() . " group by dinhkhoan_psvt.tkno
                union all
                    SELECT psvt.loaiphieu,dinhkhoan_psvt.tkco as tk,mapskt as sophieu,noidung as noidung,mand as mand,ngayghiso,sct,ngayhoadon,chuthich,sum(sotien) as tienco,0 as tienno,dinhkhoan_psvt.tkno as tkdu,MONTH(ngayghiso) as thang,dinhkhoan_psvt.sott FROM psvt INNER JOIN dinhkhoan_psvt on(psvt.sophieu=dinhkhoan_psvt.sophieu) where 0=0  and dinhkhoan_psvt.tkco in ('" . $matk . "') $sql_mand3 " . $this->getStrOderby2() . " group by dinhkhoan_psvt.tkco
        ";

        $this->query($sql);
        $row = array();
        $i = 0;
        while ($data = $this->fetch()) {
            $tk = $data['tk'];
            //$tkdu = $data['tkdu'];
            $row[$tk][] = $data;
        }
        return $row;

    }

    public function load_danhsach_taikhoannoco_chitietnokh($matk_str, $theonoidung, $sapxep)
    {// Lấy danh sách phiếu chi trong sổ cái
        $matk_arr = explode(",", $matk_str);
        $matk = implode("','", $matk_arr);
        if ($theonoidung == 'ALL') {
            $sql_mand1 = " ";
            $sql_mand2 = " ";
        } else {
            $sql_mand1 = " and mand1='" . $theonoidung . "'";
            $sql_mand2 = " and mand2='" . $theonoidung . "'";
            $sql_mand3 = " and mand='" . $theonoidung . "'";
        }
        $sql = "SELECT pskt.mapskt,pskt.loaiphieu,pskt.tkco as tk,chitiet_pskt.mapskt as sophieu,noidung1 as noidung,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,chitiet_pskt.gtvnd1 as tienco,0 as tienno,chitiet_pskt.sotiennt as tienntco,0 as tienntno,chitiet_pskt.tkno1 as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  pskt.loaiphieu in(2,4,6,8,10,12,14,16,18,20,22,24,26,28,30,32,34,36,38,40,42,44,46,48,50,52,54,56,58,60,62,64,66,68) and (makh=makh_nh or makh_nh='')  and tkco in ('" . $matk . "') $sql_mand1  " . $this->getStrOderby() . "
                union all
                    SELECT pskt.mapskt,pskt.loaiphieu,pskt.tkco as tk,chitiet_pskt.mapskt as sophieu,noidung2 as noidung,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,chitiet_pskt.gtvnd2 as tienco,0 as tienno,chitiet_pskt.sotiennt1 as tienntco,0 as tienntno,chitiet_pskt.tkno2 as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  chitiet_pskt.tkno2!=0 and pskt.loaiphieu in(2,4,6,8,10,12,14,16,18,20,22,24,26,28,30,32,34,36,38,40,42,44,46,48,50,52,54,56,58,60,62,64,66,68) and (makh=makh_nh or makh_nh='') and tkco in ('" . $matk . "') $sql_mand2  " . $this->getStrOderby() . "  
                union all
                    SELECT pskt.mapskt,pskt.loaiphieu,tkno1 as tk,chitiet_pskt.mapskt as sophieu,noidung1 as noidung,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,chitiet_pskt.gtvnd1 as tienco,0 as tienno,chitiet_pskt.sotiennt as tienntco,0 as tienntno,pskt.tkco as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  pskt.loaiphieu in(1,3,5,7,9,11,13,15,17,19,21,23,25,27,29,31,33,35,37,39,41,43,45,47,49,51,53,55,57,59,61,63,65,67,69,71,73,75,77,79,81,83,85,87,89) and (makh=makh_nh or makh_nh='') and tkno1 in ('" . $matk . "') $sql_mand1  " . $this->getStrOderby() . "  
                union all
                    SELECT pskt.mapskt,pskt.loaiphieu,tkno2 as tk,chitiet_pskt.mapskt as sophieu,noidung2 as noidung,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,chitiet_pskt.gtvnd2 as tienco,0 as tienno,chitiet_pskt.sotiennt1 as tienntco,0 as tienntno,pskt.tkco as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  pskt.loaiphieu in(1,3,5,7,9,11,13,15,17,19,21,23,25,27,29,31,33,35,37,39,41,43,45,47,49,51,53,55,57,59,61,63,65,67,69,71,73,75,77,79,81,83,85,87,89) and (makh=makh_nh or makh_nh='') and tkno2 in ('" . $matk . "') $sql_mand2  " . $this->getStrOderby() . "  
                union all
                    SELECT pskt.mapskt,pskt.loaiphieu,pskt.tkco as tk,chitiet_pskt.mapskt as sophieu,noidung1 as noidung,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,0 as tienco,chitiet_pskt.gtvnd1 as tienno,0 as tienntco,chitiet_pskt.sotiennt as tienntno,chitiet_pskt.tkno1 as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  pskt.loaiphieu in(1,3,5,7,9,11,13,15,17,19,21,23,25,27,29,31,33,35,37,39,41,43,45,47,49,51,53,55,57,59,61,63,65,67,69,71,73,75,77,79,81,83,85,87,89) and (makh=makh_nh or makh_nh='') and tkco in ('" . $matk . "') $sql_mand1  " . $this->getStrOderby() . "
                union all 
                    SELECT pskt.mapskt,pskt.loaiphieu,pskt.tkco as tk,chitiet_pskt.mapskt as sophieu,noidung2 as noidung,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,0 as tienco,chitiet_pskt.gtvnd2 as tienno,0 as tienntco,chitiet_pskt.sotiennt1 as tienntno,chitiet_pskt.tkno2 as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  chitiet_pskt.tkno2!=0 and pskt.loaiphieu in(1,3,5,7,9,11,13,15,17,19,21,23,25,27,29,31,33,35,37,39,41,43,45,47,49,51,53,55,57,59,61,63,65,67,69,71,73,75,77,79,81,83,85,87,89) and (makh=makh_nh or makh_nh='') and tkco in ('" . $matk . "') $sql_mand2 " . $this->getStrOderby() . "  
                union all
                    SELECT pskt.mapskt,pskt.loaiphieu,tkno1 as tk,chitiet_pskt.mapskt as sophieu,noidung1 as noidung,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,0 as tienco,chitiet_pskt.gtvnd1 as tienno,0 as tienntco,chitiet_pskt.sotiennt as tienntno,pskt.tkco as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  pskt.loaiphieu in(2,4,6,8,10,12,14,16,18,20,22,24,26,28,30,32,34,36,38,40,42,44,46,48,50,52,54,56,58,60,62,64,66,68) and (makh=makh_nh or makh_nh='') and tkno1 in ('" . $matk . "') $sql_mand1  " . $this->getStrOderby() . "  
                union all
                    SELECT pskt.mapskt,pskt.loaiphieu,tkno2 as tk,chitiet_pskt.mapskt as sophieu,noidung2 as noidung,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,0 as tienco,chitiet_pskt.gtvnd2 as tienno,0 as tienntco,chitiet_pskt.sotiennt1 as tienntno,pskt.tkco as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  pskt.loaiphieu in(2,4,6,8,10,12,14,16,18,20,22,24,26,28,30,32,34,36,38,40,42,44,46,48,50,52,54,56,58,60,62,64,66,68) and (makh=makh_nh or makh_nh='') and tkno2 in ('" . $matk . "') $sql_mand2 " . $this->getStrOderby() . "
                union all
				
					SELECT pskt.mapskt,pskt.loaiphieu,pskt.tkco as tk,chitiet_pskt.mapskt as sophieu,noidung1 as noidung,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,0 as tienco,chitiet_pskt.gtvnd1 as tienno,0 as tienntco,chitiet_pskt.sotiennt as tienntno, chitiet_pskt.tkno1 as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  pskt.loaiphieu in(3) and (makh!=makh_nh and makh_nh!='') and tkco in ('" . $matk . "') $sql_mand1  " . $this->getStrOderby3() . "

union  all
   SELECT pskt.mapskt,pskt.loaiphieu,pskt.tkco as tk,chitiet_pskt.mapskt as sophieu,noidung2 as noidung,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,0 as tienco,chitiet_pskt.gtvnd2 as tienno,0 as tienntco,chitiet_pskt.sotiennt1 as tienntno, chitiet_pskt.tkno2 as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  pskt.loaiphieu in(3) and (makh!=makh_nh and makh_nh!='') and tkco in ('" . $matk . "') $sql_mand1  " . $this->getStrOderby3() . "

            union all 
                SELECT pskt.mapskt,pskt.loaiphieu,chitiet_pskt.tkno1 as tk,chitiet_pskt.mapskt as sophieu,noidung1 as noidung,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich, chitiet_pskt.gtvnd1 as tienco,0 as tienno, chitiet_pskt.sotiennt as tienntco,0 as tienntno, tkco as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  chitiet_pskt.tkno1!=0 and pskt.loaiphieu in(3) and (makh!=makh_nh and makh_nh!='') and chitiet_pskt.tkno1 in ('" . $matk . "') $sql_mand2 " . $this->getStrOderby4() . "  

union all
                SELECT pskt.mapskt,pskt.loaiphieu,chitiet_pskt.tkno2 as tk,chitiet_pskt.mapskt as sophieu,noidung2 as noidung,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich, chitiet_pskt.gtvnd2 as tienco,0 as tienno, chitiet_pskt.sotiennt1 as tienntco,0 as tienntno, tkco as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  chitiet_pskt.tkno2!=0 and pskt.loaiphieu in(3) and (makh!=makh_nh and makh_nh!='') and chitiet_pskt.tkno2 in ('" . $matk . "') $sql_mand2 " . $this->getStrOderby4() . "  
            union all 

                SELECT pskt.mapskt,pskt.loaiphieu,pskt.tkco as tk,chitiet_pskt.mapskt as sophieu,noidung1 as noidung,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich, chitiet_pskt.gtvnd1 as tienco,0 as tienno, chitiet_pskt.sotiennt as tienntco,0 as tienntno, chitiet_pskt.tkno1  as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  chitiet_pskt.tkno1!=0 and pskt.loaiphieu in(4) and (makh!=makh_nh and makh_nh!='') and tkco in ('" . $matk . "') $sql_mand2 " . $this->getStrOderby3() . "  

union all 
                SELECT pskt.mapskt,pskt.loaiphieu,pskt.tkco as tk,chitiet_pskt.mapskt as sophieu,noidung2 as noidung,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich, chitiet_pskt.gtvnd2 as tienco,0  as tienno, chitiet_pskt.sotiennt1 as tienntco,0 as tienntno, chitiet_pskt.tkno2  as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  chitiet_pskt.tkno2!=0 and pskt.loaiphieu in(4) and (makh!=makh_nh and makh_nh!='') and tkco in ('" . $matk . "') $sql_mand2 " . $this->getStrOderby3() . "  

            union all

   SELECT pskt.mapskt,pskt.loaiphieu,chitiet_pskt.tkno1 as tk,chitiet_pskt.mapskt as sophieu,noidung1 as noidung,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,0 as tienco,chitiet_pskt.gtvnd1 as tienno,0 as tienntco,chitiet_pskt.sotiennt as tienntno, tkco as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  pskt.loaiphieu in(4) and (makh!=makh_nh and makh_nh!='') and chitiet_pskt.tkno1 in ('" . $matk . "') $sql_mand1  " . $this->getStrOderby4() . "

union all 
   SELECT pskt.mapskt,pskt.loaiphieu,chitiet_pskt.tkno2 as tk,chitiet_pskt.mapskt as sophieu,noidung2 as noidung,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,0 as tienco,chitiet_pskt.gtvnd2 as tienno,0 as tienntco,chitiet_pskt.sotiennt1 as tienntno, tkco as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  pskt.loaiphieu in(4) and (makh!=makh_nh and makh_nh!='') and chitiet_pskt.tkno2 in ('" . $matk . "') $sql_mand1  " . $this->getStrOderby4() . "

      union all

				
                    SELECT psvt.mapskt,psvt.loaiphieu,dinhkhoan_psvt.tkno as tk,mapskt as sophieu,noidung as noidung,ngayghiso,sct,ngayhoadon,chuthich,0 as tienco,sotien as tienno,0 as tienntco,sotiennt as tienntno,dinhkhoan_psvt.tkco as tkdu,MONTH(ngayghiso) as thang,dinhkhoan_psvt.sott FROM psvt INNER JOIN dinhkhoan_psvt on(psvt.sophieu=dinhkhoan_psvt.sophieu) where 0=0  and dinhkhoan_psvt.tkno in ('" . $matk . "') $sql_mand3 " . $this->getStrOderby2() . "
                union all
                    SELECT psvt.mapskt,psvt.loaiphieu,dinhkhoan_psvt.tkco as tk,mapskt as sophieu,noidung as noidung,ngayghiso,sct,ngayhoadon,chuthich,sotien as tienco,0 as tienno,sotiennt as tienntco,0 as tienntno,dinhkhoan_psvt.tkno as tkdu,MONTH(ngayghiso) as thang,dinhkhoan_psvt.sott FROM psvt INNER JOIN dinhkhoan_psvt on(psvt.sophieu=dinhkhoan_psvt.sophieu) where 0=0  and dinhkhoan_psvt.tkco in ('" . $matk . "') $sql_mand3 " . $this->getStrOderby2() . "
                order by $sapxep,sott";

        $this->query($sql);
        $row = array();
        $i = 0;
        while ($data = $this->fetch()) {
            $tk = $data['tk'];
            $tkdu = $data['tkdu'];
            if ($data['tkdu'] == "1331") {
                if ($data['noidung'] == "") {
                    $data['noidung'] = "Thuế GTGT đầu vào";
                    $data['mand'] = "100000";
                }
            }
            if ($data['tkdu'] == "1332") {
                if ($data['noidung'] == "") {
                    $data['noidung'] = "Thuế GTGT được khấu trừ của TSCĐ";
                }
            }
            if ($data['tkdu'] == "33311") {
                if ($data['noidung'] == "") {
                    $data['noidung'] = "Thuế GTGT đầu ra";
                    $data['mand'] = "100001";
                }
            }
            if ($data['tkdu'] == "33312") {
                if ($data['mand'] == "") {
                    $data['noidung'] = "Thuế GTGT hàng hóa nhập khẩu";
                }
            }
            $row[$data['thang']][] = $data;
        }
        return $row;

    }

    public function load_danhsach_socai_thu_theotk($matk)// khong sử dụng cho sổ cái
    {
        $sql = "SELECT pskt.tkco as tk,chitiet_pskt.mapskt as sophieu,noidung1 as noidung,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,0 as tienco,chitiet_pskt.gtvnd1 as tienno,chitiet_pskt.tkno1 as tkdu,MONTH(ngayghiso) as thang FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where pskt.loaiphieu in(1,3,5,7,9,11,13,15,17,19,21,23,25,27,29,31,33,35,37,39,41,43,45,47,49,51,53,55,57,59,61,63,65,67,69,71,73,75) and tkco in ($matk)  " . $this->getStrOderby() . "
              union all
                SELECT pskt.tkco as tk,chitiet_pskt.mapskt as sophieu,noidung2 as noidung,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,0 as tienco,chitiet_pskt.gtvnd2 as tienno,chitiet_pskt.tkno2 as tkdu,MONTH(ngayghiso) as thang FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where pskt.loaiphieu in(1,3,5,7,9,11,13,15,17,19,21,23,25,27,29,31,33,35,37,39,41,43,45,47,49,51,53,55,57,59,61,63,65,67,69,71,73,75,77,79,81,83,85,87,89) and tkco in ($matk)  " . $this->getStrOderby() . "  
              union all
                SELECT tkno1 as tk,chitiet_pskt.mapskt as sophieu,noidung1 as noidung,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,0 as tienco,chitiet_pskt.gtvnd1 as tienno,pskt.tkco as tkdu,MONTH(ngayghiso) as thang FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where pskt.loaiphieu in(2,4,6,8,10,12,14,16,18,20,22,24,26,28,30,32,34,36,38,40,42,44,46,48,50,52,54,56,58,60,62,64) and tkno1 in ($matk)  " . $this->getStrOderby() . "  
              union all
                SELECT tkno2 as tk,chitiet_pskt.mapskt as sophieu,noidung2 as noidung,pskt.ngayghiso,chitiet_pskt.sct,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,0 as tienco,chitiet_pskt.gtvnd2 as tienno,pskt.tkco as tkdu,MONTH(ngayghiso) as thang FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where pskt.loaiphieu in(2,4,6,8,10,12,14,16,18,20,22,24,26,28,30,32,34,36,38,40,42,44,46,48,50,52,54,56,58,60,62,64) and tkno2 in ($matk)  " . $this->getStrOderby() . "  
        order by ngayghiso";

        $this->query($sql);
        $row = array();
        $i = 0;
        while ($data = $this->fetch()) {
            $tk = $data['tk'];
            $row[$tk][] = $data;
        }
        return $row;
    }

    public function load_danhsach_dodang_dk()// khong sử dụng cho sổ cái
    {
        $sql = "select cpdodangdk.*,masp.loaisp from cpdodangdk INNER JOIN masp on (cpdodangdk.mact = masp.masp)";

        $this->query($sql);
        $row = array();
        $i = 0;
        while ($data = $this->fetch()) {
            $mact = $data['mact'];
            $row[$mact] = $data;
        }
        return $row;
    }

    public function load_danhsach_giathanh_tieuchuan()// khong sử dụng cho sổ cái
    {
        $sql = "select masp,sum(thanhtien) as giathanh from banggiathanhtieuchuan GROUP BY masp";

        $this->query($sql);
        $row = array();
        $i = 0;
        while ($data = $this->fetch()) {
            $mact = $data['masp'];
            $row[$mact] = $data;
        }
        return $row;
    }

    public function load_danhsach_congtrinh_dodang_chuaphancap($ListCT, $dodangdauky, $arrayNL, $arrayNC, $arrayMay, $arrayCPSXC, $dataDoanhThuThuan, $TongDoanhThuThuan, $TongCPSXCTong, $dataGiaThanh, $TongCPSXSPTong, $TongDoanhThuThuanSP, $dataDoanhThuThuanSP, $dataCPNCTong, $TongCPNCCTTong, $TongCPNCPSPTong, $TongCPNC622CTTong, $TongCPNCP622SPTong, $SoTienPhanBoCap1, $SoTienPhanBoCap2,$SoTienPhanBo627CTCap1,$SoTienPhanBo623CTCap1,$SoTienPhanBo622CTCap1)// khong sử dụng cho sổ cái
    {
        $row = array();
        $i = 0;
        $mactluu = "";
        $tongtiensxcpb = 0;
        $tongtienncpb = 0;
        $tongtiennc622pb = 0;
        $tongtiensxcpbsp = 0;
        $tongtienncpbsp = 0;
        $tongtiencamaypbsp = 0;
        foreach ($ListCT as $KMaCT => $iTiem) {
            $mact = $KMaCT;
            $dodangdk = $dodangdauky[$mact]['soduno'] - $dodangdauky[$mact]['soduco'];
            $data['sotiendk'] = $dodangdk;
            $data['loaisp'] = $iTiem['loaisp'];
            $data['sotiennl'] = $arrayNL[$mact]['tienno'];
            $data['sotiennc'] = $arrayNC[$mact]['tienno'];
            $data['sotienmay'] = $arrayMay[$mact]['tienno'];
            $data['sotiencpsxc'] = $arrayCPSXC[$mact]['tienno'];

            $giathanh = $arrayCPSXC[$mact]['tienno'];

            $data['giathanh'] = $giathanh;

            if ($iTiem['loaisp'] == "CT") {// Nếu là cong trình thì thực hiện theo doanh thu thực hiện
                $doanthuthuan = ($dataDoanhThuThuan[$mact]['tienco'] - $dataDoanhThuThuan[$mact]['tienno']);
                $sotiencpsxcpb = round((($TongCPSXCTong / $TongDoanhThuThuan) * $doanthuthuan));
                $sotiencpncpb = round((($TongCPNCCTTong / $TongDoanhThuThuan) * $doanthuthuan));//////// Ca máy phân bổ
                $sotiencpnc622pb = round((($TongCPNC622CTTong / $TongDoanhThuThuan) * $doanthuthuan));
                $data['sotiencpsxcpb'] = $sotiencpsxcpb+$SoTienPhanBo627CTCap1[$mact];
                $data['sotienncpb'] = $sotiencpncpb+$SoTienPhanBo623CTCap1[$mact];
                $data['sotiennc622pb'] = $sotiencpnc622pb+$SoTienPhanBo622CTCap1[$mact];
                $data['sotienpbcpsxccap1'] = 0;
                $data['sotienpbcpsxccap2'] = 0;
                $tongtiensxcpb += $sotiencpsxcpb;
                $tongtiennc622pb += $sotiencpnc622pb;
                $tongtienncpb += $sotiencpncpb;
            } else {
                $doanthuthuan = ($dataDoanhThuThuanSP[$mact]['tienco']);
                $sotiencpsxcpb = round((($TongCPSXSPTong / $TongDoanhThuThuanSP) * $doanthuthuan));
                $sotiencpncsppb = round((($TongCPNCPSPTong / $TongDoanhThuThuanSP) * $doanthuthuan));
                $sotiencpnc622pb = round((($TongCPNCP622SPTong / $TongDoanhThuThuanSP) * $doanthuthuan));
                $data['sotiencpsxcpb'] = $sotiencpsxcpb;
                $data['sotienncpb'] = $sotiencpncsppb;
                $data['sotienpbcpsxccap1'] = $SoTienPhanBoCap1[$mact];
                $data['sotienpbcpsxccap2'] = $SoTienPhanBoCap2[$mact];
                $data['sotiennc622pb'] = $sotiencpnc622pb;
                $tongtiensxcpbsp += $sotiencpsxcpb;
                $tongtiennc622pb += $sotiencpnc622pb;
                $tongtienncpbsp += $sotiencpnc622pb;
                $tongtiencamaypbsp += $sotiencpncsppb;

            }


            $data['doanhthuthuan'] = $doanthuthuan;
            $tongcong = $data['sotiennl'] + $data['sotiennc'] + $data['sotienmay'] + $data['sotiencpsxc'] + $sotiencpsxcpb;
            $data['tongcong'] = $tongcong;

            $data['doanhthuhopdong'] = $dataDoanhThuThuan[$mact]['gtcongtrinh'];
            $data['tylethucte'] = $dataDoanhThuThuan[$mact]['tyle'];

            $data['tylenl'] = (($arrayNL[$mact]['tienno'] - $arrayNL[$mact]['tienco']) / $tongcong) * 100;
            $data['tylenc'] = (($arrayNC[$mact]['tienno'] - $arrayNC[$mact]['tienco']) / $tongcong) * 100;
            $data['tylemay'] = (($arrayMay[$mact]['tienno'] - $arrayMay[$mact]['tienco']) / $tongcong) * 100;
            $data['tylecpsxc'] = (($arrayCPSXC[$mact]['tienno'] - $arrayCPSXC[$mact]['tienco']) / $tongcong) * 100;
            $data['tylecpsxcpb'] = (($sotiencpsxcpb) / $tongcong) * 100;

            $data['lailo'] = $doanthuthuan - $giathanh;
            $data['dodangck'] = ($dodangdk + $tongcong) - $giathanh;


            if ($i == 0 && $doanthuthuan > 0) {
                $i++;
                $mactluu = $mact;
                $loaisp = $iTiem['loaisp'];
            }

            $row[$mact] = $data;
        }

        if ($mactluu != "") {
            if ($loaisp == "CT") {// Nếu là cong trình thì thực hiện theo doanh thu thực hiện
                $row[$mactluu]['sotiencpsxcpb'] = $row[$mactluu]['sotiencpsxcpb'] - ($tongtiensxcpb - $TongCPSXCTong);
                $row[$mactluu]['sotienncpb'] = $row[$mactluu]['sotienncpb'] - ($tongtienncpb - $TongCPNCCTTong);
                $row[$mactluu]['sotiennc622pb'] = $row[$mactluu]['sotiennc622pb'] - ($tongtiennc622pb - $TongCPNC622CTTong);
            } else {
                $row[$mactluu]['sotiencpsxcpb'] = $row[$mactluu]['sotiencpsxcpb'] - ($tongtiensxcpbsp - $TongCPSXSPTong);
                $row[$mactluu]['sotiennc622pb'] = $row[$mactluu]['sotiennc622pb'] - ($tongtienncpbsp - $TongCPNCP622SPTong);
                $row[$mactluu]['sotienncpb'] = $row[$mactluu]['sotienncpb'] - ($tongtiencamaypbsp - $TongCPNCPSPTong);
            }
        }
        return $row;
    }

    public function load_danhsach_congtrinh_dodang_chuaphancap_cocpsxpb($ListCT, $dodangdauky, $arrayNL, $arrayNC, $arrayMay, $arrayCPSXC, $dataDoanhThuThuan, $TongDoanhThuThuan, $TongCPSXCTong, $dataGiaThanh, $dataCPSXCPB, $dataGiaThanhTieuChuan, $HeSoTungSanPham, $DataNCTieuChuan, $TongNCThucTe, $dataSoLuongXuatkhoThanhPham, $DataNVLTieuChuan, $DataCPSXCTieuChuan, $DataMayTieuChuan, $dataSoLuongDuTruSanPham, $sophieu, $tutaobuttoan, $dataNCPB, $masp, $dataNC622PB, $dataTong154, $dataPhanBoPhanXuong,$dataMay_CTTheoTK,$dataCPSXC_CTTheoTK,$dataNC622PBSP,$dataTongCTKhoan,$denngay)// khong sử dụng cho sổ cái
    {
        $array_masp = explode(",", $masp);
        $value_pskt = "";
        $value_pskt_632 = "";
        $value_chitiet_pskt = "";
        $value_chitiet_pskt_632 = "";
        $sql_emp_pskt = "delete from pskt where loaiphieu='79'";
        $this->re_query($sql_emp_pskt);

        $sql_emp_chitiet_pskt = "delete from chitiet_pskt where loaiphieu='79' ";
        $this->re_query($sql_emp_chitiet_pskt);

        $sql_tongtien_nhapsp = "select sum(chitiet_psvt.thanhtien) as thanhtien from chitiet_psvt INNER JOIN masp on (masp.masp = mavt) INNER JOIN psvt on (psvt.sophieu = chitiet_psvt.sophieu) WHERE psvt.loaiphieu = 1";
        $res_tongtien_nhapsp = $this->re_query($sql_tongtien_nhapsp);
        $data_tongtien_nhapsp = $this->re_fetch($res_tongtien_nhapsp);
        $tongtien_nhapsp = $data_tongtien_nhapsp['thanhtien'];

        $row = array();
        $i = 0;
        $mactluu = "";
        $tongtiensxcpb = 0;
        $tongtienncsp = 0;
        $this->query("update masp set chonchuyen=''");
        foreach ($ListCT as $KMaCT => $iTiem) {
            $mact = $KMaCT;
            $dodangdk = $dodangdauky[$mact]['soduno'] - $dodangdauky[$mact]['soduco'];
            $data['sotiendk'] = $dodangdk;
            $TongTienCPSXCPB = $dataCPSXCPB[$mact]['tienco'] - $dataCPSXCPB[$mact]['tienno'];
            $TongTienNC622PB = $dataNC622PB[$mact]['tienco'] - $dataNC622PB[$mact]['tienno'];
            $TongTienNCPB = $dataNCPB[$mact]['tienco'] - $dataNCPB[$mact]['tienno'];
            $data['sotiennl'] = $sotiennl = $arrayNL[$mact]['tienno'];
            $data['sotienmay'] = $sotienmay = $arrayMay[$mact]['tienno'];
            $tongtiensxcsp = 0;
            if ($iTiem['loaisp'] == "SP") {
                $TongTienKhoan = 0;
                if ($sotiennl == 0 && $_SESSION['MST']!='2100647732') {// Do TV Fam không có nguyên liệu làm PM chạy sai
                    $data['sotiencpsxc'] = $sotiencpsxc = 0;
                } else {
                    $data['sotiencpsxc'] = $sotiencpsxc = $arrayCPSXC[$mact]['tienno'] + $dataPhanBoPhanXuong[$mact]['sotienpbcpsxccap1'] + $dataPhanBoPhanXuong[$mact]['sotienpbcpsxccap2'];
                    $tongtiensxcsp += $sotiencpsxc;
               }
            } else {
                $TongTienKhoan = $dataTongCTKhoan[$mact]['tienno'] - $dataTongCTKhoan[$mact]['tienco'];
                $data['sotiencpsxc'] = $sotiencpsxc = $arrayCPSXC[$mact]['tienno'];
            }

            $data['sotiennltieuchuan'] = $sotiennltieuchuan = round($DataNVLTieuChuan[$mact] * $dataSoLuongDuTruSanPham[$mact]);
            $data['sotienmaytieuchuan'] = $sotienmaytieuchuan = round($DataMayTieuChuan[$mact] * $dataSoLuongDuTruSanPham[$mact]);
            $data['sotiencpsxctieuchuan'] = $sotiencpsxctieuchuan = round($DataCPSXCTieuChuan[$mact] * $dataSoLuongDuTruSanPham[$mact]);
            $data['sotiennctieuchuan'] = $sotiennctieuchuan = round($DataNCTieuChuan[$mact] * $dataSoLuongDuTruSanPham[$mact]);


            $tylephantram = abs($TongTienCPSXCPB) / ($TongTienCPSXCPB + $sotiencpsxc);
            $TienCPSXChungTieuChuan = round($sotiencpsxctieuchuan * $tylephantram);
            $TienCPSXRiengTieuChuan = ($sotiencpsxctieuchuan - $TienCPSXChungTieuChuan);

            $data['tiencpsxchungtieuchuan'] = $TienCPSXChungTieuChuan;
            $data['tiencpsxriengtieuchuan'] = $TienCPSXRiengTieuChuan;

            $tylephantram623 = abs($TongTienNCPB) / ($TongTienNCPB + $sotienmay);
            $TienCPSXChungTieuChuan623 = round($sotienmaytieuchuan * $tylephantram623);
            $TienCPSXRiengTieuChuan623 = ($sotienmaytieuchuan - $TienCPSXChungTieuChuan623);

            $data['tiencpmaychungtieuchuan'] = $TienCPSXChungTieuChuan623;
            $data['tiencpmayriengtieuchuan'] = $TienCPSXRiengTieuChuan623;

            $data_tongtien_nhapsp_hientai = abs($sotiennltieuchuan) + abs($sotiennctieuchuan) + abs($TienCPSXRiengTieuChuan623) + ($TienCPSXRiengTieuChuan);


            if ($iTiem['loaisp'] == "SP") {
                $tongtien_nhapsp = $tongtien_nhapsp - $data_tongtien_nhapsp_hientai;
                if (abs($tongtien_nhapsp) < 10) {
                    $sotiennltieuchuan = $sotiennltieuchuan + $tongtien_nhapsp;
                }
                $giathanh = round($dataGiaThanhTieuChuan[$mact]['giathanh']);
                $sotiennc = round($HeSoTungSanPham[$mact] * $DataNCTieuChuan[$mact] * $dataSoLuongDuTruSanPham[$mact]);
                $TongNCThucThueCuaSPCha += $arrayNC[$mact]['tienno']+$dataNC622PBSP[$mact]['tienco'];
                $tongtienncsp += $sotiennc;
                $data['sotiennc'] = $sotiennc;
                if ($i == 0 && $sotiennc > 0) {
                    $i++;
                    $mactluu = $mact;
                }
            } else {
                $data['sotiennc'] = $sotiennc = $arrayNC[$mact]['tienno'];
                $giathanh = round($dataGiaThanh[$mact]['tienno'] - $dataGiaThanh[$mact]['tienco']);
            }
            $doanthuthuan = ($dataDoanhThuThuan[$mact]['tienco'] - $dataDoanhThuThuan[$mact]['tienno']);
            $sotiencpsxcpb = $TongTienCPSXCPB;
            $sotienncpb = $TongTienNCPB;
            $sotiennc622pb = $TongTienNC622PB;
            $data['sotiencpsxcpb'] = $sotiencpsxcpb;
            $data['sotienncpb'] = $sotienncpb;
            $data['sotiennc622pb'] = $sotiennc622pb;
            $tongtiensxcpb += $sotiencpsxcpb;
            $tongtienncpb += $sotienncpb;
            $data['doanhthuthuan'] = $doanthuthuan;
            $data['ctkhoan'] = $TongTienKhoan;
            $tongcong = $data['sotiennl'] + $data['sotiennc'] + $data['sotienmay'] + $data['sotiencpsxc'] + $sotiencpsxcpb + $sotienncpb + $sotiennc622pb+$TongTienKhoan;
            $data['tongcong'] = $tongcong;

            $data['tylenl'] = (($arrayNL[$mact]['tienno']) / $tongcong) * 100;
            $data['tylenc'] = (($arrayNC[$mact]['tienno']) / $tongcong) * 100;
            $data['tylemay'] = (($arrayMay[$mact]['tienno']) / $tongcong) * 100;
            $data['tylecpsxc'] = (($arrayCPSXC[$mact]['tienno']) / $tongcong) * 100;
            $data['tylecpsxcpb'] = (($sotiencpsxcpb) / $tongcong) * 100;

            $data['loaisp'] = $iTiem['loaisp'];

            if ($iTiem['loaisp'] == "SP") {
                $data['dodangck'] = 0;
                $giathanhtoanbo = round($dodangdk + $tongcong - $data['dodangck']);
                $data['giathanhtoanbo'] = $giathanhtoanbo;
                $data['giathanhdonvi'] = round($giathanhtoanbo / $dataSoLuongDuTruSanPham[$mact]);
                $data['giathanh'] = $giathanh;

                $value_pskt .= "('" . $sophieu . "','1','" . $denngay . "','154','79','" . abs($sotiennltieuchuan + $sotiennctieuchuan) . "'),('" . ($sophieu + 1) . "','1','" . $denngay . "','154','79','" . abs($TienCPSXRiengTieuChuan623 + $TienCPSXRiengTieuChuan+$TienCPSXChungTieuChuan) . "'),";
                $value_chitiet_pskt .= "('" . 1 . "','" . $denngay . "','" . abs($sotiennltieuchuan) . "','" . abs($sotiennctieuchuan) . "','{$KMaCT}','{$KMaCT}','{$iTiem['loaisp']}','100093','Kết chuyển CP nguyên vật liệu tiêu chuẩn - SP:{$KMaCT} ','100093','Kết chuyển CP nhân công tiêu chuẩn - SP:{$KMaCT} ','621','622','" . abs($sotiennltieuchuan + $sotiennctieuchuan) . "','4','79','" . $sophieu . "'),('" . 1 . "','" . $denngay . "','" . abs($TienCPSXRiengTieuChuan623) . "','" . abs($TienCPSXRiengTieuChuan+$TienCPSXChungTieuChuan) . "','{$KMaCT}','{$KMaCT}','{$iTiem['loaisp']}','100093','Kết chuyển CP máy tiêu chuẩn - SP:{$KMaCT} ','100093','Kết chuyển CP sản xuất chung tiêu chuẩn - SP:{$KMaCT} ','623','627','" . abs($TienCPSXRiengTieuChuan623 + $TienCPSXRiengTieuChuan+$TienCPSXChungTieuChuan) . "','4','79','" . ($sophieu + 1) . "'),";
                $sophieu += 2;

            } else {// nếu là công trình
                $value_pskt .= "('" . $sophieu . "','1','" . $denngay . "','154','79','" . abs($sotiennl + $sotiennc) . "'),('" . ($sophieu + 1) . "','1','" . $denngay . "','154','79','" . abs($sotienmay + $sotiencpsxc) . "'),";
                $value_chitiet_pskt .= "('" . 1 . "','" . $denngay . "','" . abs($sotiennl) . "','" . abs($sotiennc) . "','{$KMaCT}','{$KMaCT}','{$iTiem['loaisp']}','100093','Kết chuyển CP nguyên vật liệu - CT:{$KMaCT}','100093','Kết chuyển CP nhân công - CT:{$KMaCT}','621','622','" . abs($sotiennl + $sotiennc) . "','4','79','" . $sophieu . "'),('" . 1 . "','" . $denngay . "','" . abs($sotienmay) . "','" . abs($sotiencpsxc) . "','{$KMaCT}','{$KMaCT}','{$iTiem['loaisp']}','100093','Kết chuyển CP máy - CT:{$KMaCT}','100093','Kết chuyển CP sản xuất chung - CT:{$KMaCT} ','623','627','" . abs($sotienmay + $sotiencpsxc) . "','4','79','" . ($sophieu + 1) . "'),";
                $sophieu += 2;
                if (in_array($mact, $array_masp)) {// Nếu công trình tự động kết chuyển
                    $giathanh = round($tongcong + $dodangdk);
                    $value_pskt_632 .= "('" . $sophieu . "','1','" . $denngay . "','632','79','" . abs($giathanh) . "'),";
                    $value_chitiet_pskt_632 .= "('" . 1 . "','" . $denngay . "','" . abs($giathanh) . "','0','{$KMaCT}','{$KMaCT}','{$iTiem['loaisp']}','100093','Kết chuyển giá vốn - CT:{$KMaCT}','100093','Kết chuyển giá vốn - CT:{$KMaCT}','154','154','" . abs($giathanh) . "','4','79','" . $sophieu . "'),";
                    $data['giathanh'] = $giathanh;
                    $data['tongcong'] = $tongcong;
                    $this->query("update masp set chonchuyen='1' where masp='{$mact}'");
                } else {// Nếu công trình tự chuyển tay
                    $data['tongcong'] =$tongcong;
                    $giathanh = round($dataGiaThanh[$mact]['tienno'] - $dataGiaThanh[$mact]['tienco']);
                    $data['giathanh'] = $giathanh;
                }
                $sophieu += 1;

                $data['dodangck'] = ($dodangdk + $tongcong) - $giathanh;
                $data['lailo'] = $doanthuthuan - $giathanh;
                $data['giathanhtoanbo'] = 0;
                $data['giathanhdonvi'] = 0;
            }

            $row[$mact] = $data;
        }

        if ($mactluu != "") {
            $row[$mactluu]['sotiennc'] = $row[$mactluu]['sotiennc'] - ($tongtienncsp - $TongNCThucThueCuaSPCha);
        }
        $sql_pskt = "insert into pskt(sophieu,mapskt,ngayghiso,tkco,loaiphieu,tongcong) VALUE " . substr($value_pskt, 0, -1);
        $sql_chitiet_pskt = "insert into chitiet_pskt(mapskt,ngayhoadon,gtvnd1,gtvnd2,mabp,bophan,loaisp,mand1,noidung1,mand2,noidung2,tkno1,tkno2,tongtien,maloai,loaiphieu,sophieu) VALUE " . substr($value_chitiet_pskt, 0, -1);
        $sql_pskt_632 = "insert into pskt(sophieu,mapskt,ngayghiso,tkco,loaiphieu,tongcong) VALUE " . substr($value_pskt_632, 0, -1);
        $sql_chitiet_pskt_632 = "insert into chitiet_pskt(mapskt,ngayhoadon,gtvnd1,gtvnd2,mabp,bophan,loaisp,mand1,noidung1,mand2,noidung2,tkno1,tkno2,tongtien,maloai,loaiphieu,sophieu) VALUE " . substr($value_chitiet_pskt_632, 0, -1);


        if ($tutaobuttoan == "true") {
            $this->re_query($sql_pskt);
            $this->re_query($sql_chitiet_pskt);

            $this->re_query($sql_pskt_632);
            $this->re_query($sql_chitiet_pskt_632);
        }
        return $row;
    }

///------------------------ Tổng hợp công nợ-------------------------------------------------
    public function load_danhsach_sonhatky_ghino()
    {
        $sql = "SELECT pskt.sophieu,ngayghiso,chitiet_pskt.ngayhoadon,pskt.tkco as tk,pskt.makh,chitiet_pskt.gtvnd1 as psno,makh_nh,pskt.loaiphieu,chitiet_pskt.sotiennt as psnont FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where pskt.loaiphieu in(1,3,5,7,9,11,13,15,17,19,21,23,25,27,29,31,33,35,37,39,41,43,45,47,49,51,53,55,57,59,61,63,87,89) and mabp!=''  " . $this->getStrOderby5() . "
            union all
                SELECT pskt.sophieu,ngayghiso,chitiet_pskt.ngayhoadon,pskt.tkco as tk,pskt.makh,chitiet_pskt.gtvnd2 as psno,makh_nh,pskt.loaiphieu,chitiet_pskt.sotiennt1 as psnont FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where pskt.loaiphieu in(1,3,5,7,9,11,13,15,17,19,21,23,25,27,29,31,33,35,37,39,41,43,45,47,49,51,53,55,57,59,61,63,87,89) and mabp!=''  " . $this->getStrOderby5() . "
            union all
                SELECT pskt.sophieu,ngayghiso,chitiet_pskt.ngayhoadon,chitiet_pskt.tkno1 as tk,pskt.makh,chitiet_pskt.gtvnd1 as psno,makh_nh,pskt.loaiphieu,chitiet_pskt.sotiennt as psnont FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where pskt.loaiphieu in(2,4,6,8,10,12,14,16,18,20,22,24,26,28,30,32,34,36,38,40,42,44,46,48,50,52,54,56,58,60,62,64) and mabp!=''  " . $this->getStrOderby() . "
            union all
                SELECT pskt.sophieu,ngayghiso,chitiet_pskt.ngayhoadon,chitiet_pskt.tkno2 as tk,pskt.makh,chitiet_pskt.gtvnd2 as psno,makh_nh,pskt.loaiphieu,chitiet_pskt.sotiennt1 as psnont FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where pskt.loaiphieu in(2,4,6,8,10,12,14,16,18,20,22,24,26,28,30,32,34,36,38,40,42,44,46,48,50,52,54,56,58,60,62,64) and mabp!=''  " . $this->getStrOderby3() . "
            union all
                SELECT psvt.sophieu,ngayghiso,ngayhoadon,dinhkhoan_psvt.tkno as tk,makh,dinhkhoan_psvt.sotien as psno,makh as makh_nh,psvt.loaiphieu,dinhkhoan_psvt.sotiennt as psnont FROM psvt INNER JOIN dinhkhoan_psvt on (psvt.sophieu = dinhkhoan_psvt.sophieu) where psvt.loaiphieu in(2) " . $this->getStrOderby2();

        $this->query($sql);

        $row = array();
        if ($this->num_rows() == 0) {
            return FALSE;
        } else {
            $i = 0;
            while ($data = $this->fetch()) {
                if ($data['loaiphieu'] == "3" || $data['loaiphieu'] == "4") {
                    if (trim($data['makh']) == trim($data['makh_nh']) || trim($data['makh_nh']) == "") {
                        $ma = $data['makh'] . $data['tk'];
                    } else {
                        if ($data['loaiphieu'] == "3") {
                            $ma = $data['makh_nh'] . $data['tk'];
                        } else {
                            $ma = $data['makh'] . $data['tk'];
                        }
                    }
                } else {
                    $ma = $data['makh'] . $data['tk'];
                }
                $tongpsno = number_format($data['psno'] + $row[$ma]['psno'],0,".","");
                $tongpsnont = number_format($data['psnont'] + $row[$ma]['psnont'],0,".","");
                $row[$ma] = $data;
                $row[$ma]['psno'] = $tongpsno;
                $row[$ma]['psnont'] = $tongpsnont;

            }
            return $row;
        }
    }

    public function load_danhsach_taikhoannoco_bangke_banhangchitietnokh($matk_str, $theonoidung, $sapxep)
    {// Lấy danh sách phiếu chi trong sổ cái
        $matk_arr = explode(",", $matk_str);
        $matk = implode("','", $matk_arr);
        if ($theonoidung == 'ALL') {
            $sql_mand1 = " ";
            $sql_mand2 = " ";
        } else {
            $sql_mand1 = " and mand1='" . $theonoidung . "'";
            $sql_mand2 = " and mand2='" . $theonoidung . "'";
            $sql_mand3 = " and mand='" . $theonoidung . "'";
        }
        $sql = "SELECT pskt.mapskt,pskt.loaiphieu,pskt.tkco as tk,chitiet_pskt.mapskt as sophieu,noidung1 as noidung,pskt.ngayghiso,0 as dvt,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,chitiet_pskt.gtvnd1 as tienco,0 as tienno,0 as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,0 as soluong FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  pskt.loaiphieu in(2,4,6,8,10,12,14,16,18,20,22,24,26,28,30,32,34,36,38,40,42,44,46,48,50,52,54,56,58,60,62,64,66,68) and tkco in ('" . $matk . "') $sql_mand1  " . $this->getStrOderby() . "
                union all
                    SELECT pskt.mapskt,pskt.loaiphieu,pskt.tkco as tk,chitiet_pskt.mapskt as sophieu,noidung2 as noidung,pskt.ngayghiso,0 as dvt,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,chitiet_pskt.gtvnd2 as tienco,0 as tienno,0 as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,0 as soluong FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  chitiet_pskt.tkno2!=0 and pskt.loaiphieu in(2,4,6,8,10,12,14,16,18,20,22,24,26,28,30,32,34,36,38,40,42,44,46,48,50,52,54,56,58,60,62,64,66,68) and tkco in ('" . $matk . "') $sql_mand2  " . $this->getStrOderby() . "  
                union all
                    SELECT pskt.mapskt,pskt.loaiphieu,tkno1 as tk,chitiet_pskt.mapskt as sophieu,noidung1 as noidung,pskt.ngayghiso,0 as dvt,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,chitiet_pskt.gtvnd1 as tienco,0 as tienno,0 as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,0 as soluong FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  pskt.loaiphieu in(1,3,5,7,9,11,13,15,17,19,21,23,25,27,29,31,33,35,37,39,41,43,45,47,49,51,53,55,57,59,61,63,65,67,69) and tkno1 in ('" . $matk . "') $sql_mand1  " . $this->getStrOderby() . "  
                union all
                    SELECT pskt.mapskt,pskt.loaiphieu,tkno2 as tk,chitiet_pskt.mapskt as sophieu,noidung2 as noidung,pskt.ngayghiso,0 as dvt,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,chitiet_pskt.gtvnd2 as tienco,0 as tienno,0 as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,0 as soluong FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  pskt.loaiphieu in(1,3,5,7,9,11,13,15,17,19,21,23,25,27,29,31,33,35,37,39,41,43,45,47,49,51,53,55,57,59,61,63,65,67,69) and tkno2 in ('" . $matk . "') $sql_mand2  " . $this->getStrOderby() . "  
                union all
                    SELECT pskt.mapskt,pskt.loaiphieu,pskt.tkco as tk,chitiet_pskt.mapskt as sophieu,noidung1 as noidung,pskt.ngayghiso,0 as dvt,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,0 as tienco,chitiet_pskt.gtvnd1 as tienno,0 as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,0 as soluong FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  pskt.loaiphieu in(1,3,5,7,9,11,13,15,17,19,21,23,25,27,29,31,33,35,37,39,41,43,45,47,49,51,53,55,57,59,61,63,65,67,69) and tkco in ('" . $matk . "') $sql_mand1  " . $this->getStrOderby() . "
                union all
                    SELECT pskt.mapskt,pskt.loaiphieu,pskt.tkco as tk,chitiet_pskt.mapskt as sophieu,noidung2 as noidung,pskt.ngayghiso,0 as dvt,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,0 as tienco,chitiet_pskt.gtvnd2 as tienno,0 as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,0 as soluong FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  chitiet_pskt.tkno2!=0 and pskt.loaiphieu in(1,3,5,7,9,11,13,15,17,19,21,23,25,27,29,31,33,35,37,39,41,43,45,47,49,51,53,55,57,59,61,63,65,67,69) and tkco in ('" . $matk . "') $sql_mand2 " . $this->getStrOderby() . "  
                union all
                    SELECT pskt.mapskt,pskt.loaiphieu,tkno1 as tk,chitiet_pskt.mapskt as sophieu,noidung1 as noidung,pskt.ngayghiso,0 as dvt,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,0 as tienco,chitiet_pskt.gtvnd1 as tienno,0 as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,0 as soluong FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  pskt.loaiphieu in(2,4,6,8,10,12,14,16,18,20,22,24,26,28,30,32,34,36,38,40,42,44,46,48,50,52,54,56,58,60,62,64,66,68) and tkno1 in ('" . $matk . "') $sql_mand1  " . $this->getStrOderby() . "  
                union
                    SELECT pskt.mapskt,pskt.loaiphieu,tkno2 as tk,chitiet_pskt.mapskt as sophieu,noidung2 as noidung,pskt.ngayghiso,0 as dvt,chitiet_pskt.ngayhoadon,chitiet_pskt.chuthich,0 as tienco,chitiet_pskt.gtvnd2 as tienno,0 as tkdu,MONTH(ngayghiso) as thang,chitiet_pskt.sott,0 as soluong FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where  pskt.loaiphieu in(2,4,6,8,10,12,14,16,18,20,22,24,26,28,30,32,34,36,38,40,42,44,46,48,50,52,54,56,58,60,62,64,66,68) and tkno2 in ('" . $matk . "') $sql_mand2 " . $this->getStrOderby() . "
                union all
                    SELECT psvt.mapskt,psvt.loaiphieu,dinhkhoan_psvt.tkno as tk,psvt.mapskt as sophieu,chitiet_psvt.tenvt as noidung,psvt.ngayghiso,chitiet_psvt.dvt,psvt.ngayhoadon,psvt.chuthich,0 as tienco,thanhtien+chitiet_psvt.thue as tienno,chitiet_psvt.donggianhap as tkdu,MONTH(ngayghiso) as thang,psvt.sott,chitiet_psvt.soluongnhap as soluong FROM psvt INNER JOIN dinhkhoan_psvt on(psvt.sophieu=dinhkhoan_psvt.sophieu) inner JOIN chitiet_psvt on(psvt.sophieu=chitiet_psvt.sophieu) where 0=0  and dinhkhoan_psvt.tkno in ('" . $matk . "') $sql_mand3 " . $this->getStrOderby2() . "
                union
                    SELECT psvt.mapskt,psvt.loaiphieu,dinhkhoan_psvt.tkco as tk,psvt.mapskt as sophieu,chitiet_psvt.tenvt as noidung,psvt.ngayghiso,chitiet_psvt.dvt,psvt.ngayhoadon,psvt.chuthich,thanhtien+chitiet_psvt.thue as tienco,0 as tienno,chitiet_psvt.donggianhap as tkdu,MONTH(ngayghiso) as thang,psvt.sott,chitiet_psvt.soluongnhap as soluong FROM psvt INNER JOIN dinhkhoan_psvt on(psvt.sophieu=dinhkhoan_psvt.sophieu) inner JOIN chitiet_psvt on(psvt.sophieu=chitiet_psvt.sophieu) where 0=0  and dinhkhoan_psvt.tkco in ('" . $matk . "') $sql_mand3 " . $this->getStrOderby2() . "
                order by $sapxep,sott";

        $this->query($sql);
        $row = array();
        $i = 0;
        while ($data = $this->fetch()) {
            $tk = $data['tk'];
            $row[$data['thang']][] = $data;
        }
        return $row;

    }

    public function load_danhsach_sonhatky_ghico()
    {
        $sql = "SELECT pskt.sophieu,ngayghiso,chitiet_pskt.ngayhoadon,pskt.tkco as tk,pskt.makh,chitiet_pskt.gtvnd1 as psco,makh_nh,pskt.loaiphieu,chitiet_pskt.sotiennt as pscont FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where pskt.loaiphieu in(2,4,6,8,10,12,14,16,18,20,22,24,26,28,30,32,34,36,38,40,42,44,46,48,50,52,54,56,58,60,62,64) and mabp!=''  " . $this->getStrOderby5() . "
            union all
                SELECT pskt.sophieu,ngayghiso,chitiet_pskt.ngayhoadon,pskt.tkco as tk,pskt.makh,chitiet_pskt.gtvnd2 as psco,makh_nh,pskt.loaiphieu,chitiet_pskt.sotiennt1 as pscont FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where pskt.loaiphieu in(2,4,6,8,10,12,14,16,18,20,22,24,26,28,30,32,34,36,38,40,42,44,46,48,50,52,54,56,58,60,62,64) and mabp!=''  " . $this->getStrOderby5() . "
            union all
                SELECT pskt.sophieu,ngayghiso,chitiet_pskt.ngayhoadon,chitiet_pskt.tkno1 as tk,pskt.makh,chitiet_pskt.gtvnd1 as psco,makh_nh,pskt.loaiphieu,chitiet_pskt.sotiennt as pscont FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where pskt.loaiphieu in(1,3,5,7,9,11,13,15,17,19,21,23,25,27,29,31,33,35,37,39,41,43,45,47,49,51,53,55,57,59,61,63,87,89) and mabp!=''  " . $this->getStrOderby() . "
            union all
                SELECT pskt.sophieu,ngayghiso,chitiet_pskt.ngayhoadon,chitiet_pskt.tkno2 as tk,pskt.makh,chitiet_pskt.gtvnd2 as psco,makh_nh,pskt.loaiphieu,chitiet_pskt.sotiennt1 as pscont FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where pskt.loaiphieu in(1,3,5,7,9,11,13,15,17,19,21,23,25,27,29,31,33,35,37,39,41,43,45,47,49,51,53,55,57,59,61,63,87,89) and mabp!=''  " . $this->getStrOderby3() . "
            union all 
                SELECT psvt.sophieu,ngayghiso,ngayhoadon,dinhkhoan_psvt.tkco as tk,makh,dinhkhoan_psvt.sotien as psco,makh as makh_nh,psvt.loaiphieu,dinhkhoan_psvt.sotiennt as pscont FROM psvt INNER JOIN dinhkhoan_psvt on (psvt.sophieu = dinhkhoan_psvt.sophieu) where psvt.loaiphieu in(1) " . $this->getStrOderby4();
        $this->query($sql);
        if ($this->num_rows() == 0) {
            return FALSE;
        } else {
            $i = 0;
            while ($data = $this->fetch()) {

                if ($data['loaiphieu'] == "3" || $data['loaiphieu'] == "4") {
                    if (trim($data['makh']) == trim($data['makh_nh']) || trim($data['makh_nh']) == "") {
                        $ma = $data['makh'] . $data['tk'];
                    } else {
                        if ($data['loaiphieu'] == "4") {
                            $ma = $data['makh_nh'] . $data['tk'];
                        } else {
                            $ma = $data['makh'] . $data['tk'];
                        }
                    }
                } else {
                    $ma = $data['makh'] . $data['tk'];
                }

                $tongpsco = $data['psco'] + $row[$ma]['psco'];
                $tongpscont = $data['pscont'] + $row[$ma]['pscont'];

                $row[$ma] = $data;
                $row[$ma]['psco'] = $tongpsco;
                $row[$ma]['pscont'] = $tongpscont;
            }
            return $row;
        }
    }

    ///-------------------Danh sách công nợ chi tiết----------------------------------------
    public function load_danhsach_sonhatky_ghino_chitiet()
    {
        //SELECT chitiet_pskt.sct,chitiet_pskt.mapskt,ngayghiso,chitiet_pskt.ngayhoadon,chitiet_pskt.tkno1 as tk,pskt.makh,pskt.tongcong as psno,chitiet_pskt.noidung1 as noidung FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where pskt.loaiphieu in(4)  " . $this->getStrOderby5() . "
        $sql = "
                SELECT chitiet_pskt.sct,chitiet_pskt.mapskt,ngayghiso,chitiet_pskt.ngayhoadon,pskt.tkco as tk,pskt.makh,chitiet_pskt.gtvnd1 as psno,chitiet_pskt.noidung1 as noidung FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where pskt.loaiphieu in(4,6,8,10,12,14,16,18,20,22,24,26,28,30,32,34,36,38,40,42,44,46,48,50,52,54,56,58,60,62,64)  " . $this->getStrOderby() . "
            union all
                SELECT chitiet_pskt.sct,chitiet_pskt.mapskt,ngayghiso,chitiet_pskt.ngayhoadon,pskt.tkco as tk,pskt.makh,chitiet_pskt.gtvnd2 as psno,chitiet_pskt.noidung2 as noidung FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where pskt.loaiphieu in(4,6,8,10,12,14,16,18,20,22,24,26,28,30,32,34,36,38,40,42,44,46,48,50,52,54,56,58,60,62,64)  " . $this->getStrOderby3() . "
            union all 
                SELECT psvt.sct,psvt.mapskt,ngayghiso,ngayhoadon,dinhkhoan_psvt.tkco as tk,makh,dinhkhoan_psvt.sotien as psno,noidung FROM psvt INNER JOIN dinhkhoan_psvt on (psvt.sophieu = dinhkhoan_psvt.sophieu) where psvt.loaiphieu in(2) " . $this->getStrOderby2();

        $this->query($sql);
        $row = array();
        if ($this->num_rows() == 0) {
            return FALSE;
        } else {
            $i = 0;
            while ($data = $this->fetch()) {
                $i = $i + 2;
                $timengayghi = $data['timengayghi'] = strtotime($data['ngayghiso']) + $i;
                if ($data['tkdu'] == "1331") {
                    if ($data['noidung'] == "") {
                        $data['noidung'] = "Thuế GTGT đầu vào";
                        $data['mand'] = "100000";
                    }
                }
                if ($data['tkdu'] == "1332") {
                    if ($data['noidung'] == "") {
                        $data['noidung'] = "Thuế GTGT được khấu trừ của TSCĐ";
                    }
                }
                if ($data['tkdu'] == "33311") {
                    if ($data['noidung'] == "") {
                        $data['noidung'] = "Thuế GTGT đầu ra";
                        $data['mand'] = "100001";
                    }
                }
                if ($data['tkdu'] == "33312") {
                    if ($data['mand'] == "") {
                        $data['noidung'] = "Thuế GTGT hàng hóa nhập khẩu";
                    }
                }
                $row[$timengayghi] = $data;

                //$row[] = $data;
                //$row[$ma]['psno'] = $tongpsno;

            }
            return $row;
        }
    }

    public function load_danhsach_sonhatky_ghico_chitiet()
    {
        //SELECT chitiet_pskt.sct,chitiet_pskt.mapskt,ngayghiso,chitiet_pskt.ngayhoadon,chitiet_pskt.tkno1 as tk,pskt.makh,pskt.tongcong as psco,chitiet_pskt.noidung1 as noidung FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where pskt.loaiphieu in(3)  " . $this->getStrOderby5() . "
        $sql = "
                SELECT chitiet_pskt.sct,chitiet_pskt.mapskt,ngayghiso,chitiet_pskt.ngayhoadon,pskt.tkco as tk,pskt.makh,chitiet_pskt.gtvnd1 as psco,chitiet_pskt.noidung1 as noidung FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where pskt.loaiphieu in(3,5,7,9,11,13,15,17,19,21,23,25,27,29,31,33,35,37,39,41,43,45,47,49,51,53,55,57,59,61,63)  " . $this->getStrOderby() . "
            union all
                SELECT chitiet_pskt.sct,chitiet_pskt.mapskt,ngayghiso,chitiet_pskt.ngayhoadon,pskt.tkco as tk,pskt.makh,chitiet_pskt.gtvnd2 as psco,chitiet_pskt.noidung2 as noidung FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where pskt.loaiphieu in(3,5,7,9,11,13,15,17,19,21,23,25,27,29,31,33,35,37,39,41,43,45,47,49,51,53,55,57,59,61,63)  " . $this->getStrOderby3() . "
            union all 
                SELECT psvt.sct,psvt.mapskt,ngayghiso,ngayhoadon,dinhkhoan_psvt.tkno as tk,makh,dinhkhoan_psvt.sotien as psco,noidung FROM psvt INNER JOIN dinhkhoan_psvt on (psvt.sophieu = dinhkhoan_psvt.sophieu) where psvt.loaiphieu in(1) " . $this->getStrOderby4();
        $this->query($sql);
        if ($this->num_rows() == 0) {
            return FALSE;
        } else {
            $i = 0;
            $tongpsco = 0;
            while ($data = $this->fetch()) {
                $i = $i + 2;
                $timengayghi = $data['timengayghi'] = strtotime($data['ngayghiso']) + $i;
                if ($data['tkdu'] == "1331") {
                    if ($data['noidung'] == "") {
                        $data['noidung'] = "Thuế GTGT đầu vào";
                        $data['mand'] = "100000";
                    }
                }
                if ($data['tkdu'] == "1332") {
                    if ($data['noidung'] == "") {
                        $data['noidung'] = "Thuế GTGT được khấu trừ của TSCĐ";
                    }
                }
                if ($data['tkdu'] == "33311") {
                    if ($data['noidung'] == "") {
                        $data['noidung'] = "Thuế GTGT đầu ra";
                        $data['mand'] = "100001";
                    }
                }
                if ($data['tkdu'] == "33312") {
                    if ($data['mand'] == "") {
                        $data['noidung'] = "Thuế GTGT hàng hóa nhập khẩu";
                    }
                }
                $row[$timengayghi] = $data;
            }
            return $row;
        }
    }

    //-------------------Kết thúc công nợ chi tiết-------------------------------------====

    function load_danhsach_bangcd_tk($parentid = 0, $printto, $array_no)
    {
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = $this->get_orderby() . " and ";
        $sql = "SELECT matk.matk,matk.tentk,matk.matkcha,sdtkdk.soduno,sdtkdk.soduco FROM matk LEFT JOIN  sdtkdk on (matk.matk = sdtkdk.matk)  WHERE $sql_w matk.matkcha = $parentid  order by CAST(matk.matk AS UNSIGNED)";
        $result = $this->re_query($sql);
        $i = 1;
        $cap1 = 1;

        while ($data = $this->re_fetch($result)) {// Lấy dữ liệu tk cấp 1
            $data['STT'] = $i;
            $data['CAP'] = 1;
            $data['sodunops'] = $array_no[$data['matk']]['sodunops'];
            $data['soducops'] = $array_no[$data['matk']]['soducops'];

            $data['tentk'] = $data['tentk'];
            $trees[$data['matk']] = $data;
            $cap1++;
            $i++;
            $sql1 = "SELECT matk.matk,matk.tentk,matk.matkcha,sdtkdk.soduno,sdtkdk.soduco FROM matk LEFT JOIN  sdtkdk on (matk.matk = sdtkdk.matk)  WHERE $sql_w matk.matkcha ='{$data['matk']}'  order by CAST(matk.matk AS UNSIGNED)";
            $query = $this->re_query($sql1);

            $cap2 = $cap1;
            $tongnodk = 0;
            $tongcodk = 0;

            $tongnops = 0;
            $tongcops = 0;

            $tongnodk += $data['soduno'];
            $tongcodk += $data['soduco'];

            $tongnops += $data['sodunops'];
            $tongcops += $data['soducops'];

            while ($data1 = $this->re_fetch($query)) {
                if ($printto == 1) {
                    break;
                }
                $data1['STT'] = $i;
                $data1['CAP'] = 2;
                $data1['sodunops'] = $array_no[$data1['matk']]['sodunops'];
                $data1['soducops'] = $array_no[$data1['matk']]['soducops'];

                $tongnodk += $data1['soduno'];
                $tongcodk += $data1['soduco'];

                $tongnops += $data1['sodunops'];
                $tongcops += $data1['soducops'];

                $data1['tentk'] = "&nbsp;&nbsp;&nbsp;" . $data1['tentk'];
                $trees[$data1['matk']] = $data1;
                $cap2++;
                $i++;
                //$sql2 = "SELECT * FROM sdtkdk WHERE $sql_w matkcha =" . $data1['matk'] . " order by matk ";
                $sql2 = "SELECT matk.matk,matk.tentk,matk.matkcha,sdtkdk.soduno,sdtkdk.soduco FROM matk LEFT JOIN  sdtkdk on (matk.matk = sdtkdk.matk)  WHERE $sql_w matk.matkcha ='{$data1['matk'] }'  order by CAST(matk.matk AS UNSIGNED)";
                $query1 = $this->re_query($sql2);
                $cap3 = $cap2;
                $tongnodk3 = 0;
                $tongcodk3 = 0;

                $tongnops3 = 0;
                $tongcops3 = 0;
                $tongnodk3 += $data1['soduno'];
                $tongcodk3 += $data1['soduco'];

                $tongnops3 += $data1['sodunops'];
                $tongcops3 += $data1['soducops'];
                while ($data2 = $this->re_fetch($query1)) {
                    if ($printto == 2) {
                        break;
                    }
                    $data2['STT'] = $i;
                    $data2['CAP'] = 3;
                    $data2['sodunops'] = $array_no[$data2['matk']]['sodunops'];
                    $data2['soducops'] = $array_no[$data2['matk']]['soducops'];

                    $tongnodk3 += $data2['soduno'];
                    $tongcodk3 += $data2['soduco'];

                    $tongnops3 += $data2['sodunops'];
                    $tongcops3 += $data2['soducops'];

                    $tongnodk += $data2['soduno'];
                    $tongcodk += $data2['soduco'];

                    $tongnops += $data2['sodunops'];
                    $tongcops += $data2['soducops'];

                    $cap3++;
                    $i++;
                    $data2['tentk'] = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" . $data2['tentk'];
                    $trees[$data2['matk']] = $data2;
                }
                $trees[$data1['matk']]['tongduno'] = $tongnodk3;
                $trees[$data1['matk']]['tongduco'] = $tongcodk3;
                $trees[$data1['matk']]['tongdunops'] = $tongnops3;
                $trees[$data1['matk']]['tongducops'] = $tongcops3;
            }
            $trees[$data['matk']]['tongduno'] = $tongnodk;
            $trees[$data['matk']]['tongduco'] = $tongcodk;
            $trees[$data['matk']]['tongdunops'] = $tongnops;
            $trees[$data['matk']]['tongducops'] = $tongcops;


            $tongcktinh = ($tongnodk + $tongnops) - ($tongcodk + $tongcops);

            if ($tongcktinh >= 0) {
                $tongnock = ($tongnodk + $tongnops) - ($tongcodk + $tongcops);
                $trees[$data['matk']]['tongdunock'] = $tongnock;
            } else {
                $tongcock = ($tongcodk + $tongcops) - ($tongnodk + $tongnops);
                $trees[$data['matk']]['tongducock'] = $tongcock;
            }
        }
        return $trees;
    }

    function load_danhsach_bangcd_tk_tmp()
    {
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = $this->get_orderby() . " and ";
        $sql = "SELECT sott,matk,tentk,nodk as tongduno,codk as tongduco,nops as tongdunops,cops as tongducops,nock as tongdunock,cock as tongducock,_nock as _tongdunock,_cock as _tongducock,cap as CAP FROM bangcdtk where 0=0 $sql_ct order by sott";
        $result = $this->re_query($sql);
        while ($data = $this->re_fetch($result)) {
            $trees[$data['matk']] = $data;
        }
        return $trees;
    }

    function load_danhsach_bangcd_tk_tmp_namtruoc($database)
    {
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = $this->get_orderby() . " and ";
        $sql = "SELECT sott,matk,tentk,nodk as tongduno,codk as tongduco,nops as tongdunops,cops as tongducops,nock as tongdunock,cock as tongducock,cap as CAP FROM {$database}.bangcdtk where 0=0 $sql_ct order by sott";
        $result = $this->re_query($sql);
        while ($data = $this->re_fetch($result)) {
            $trees[$data['matk']] = $data;
        }
        return $trees;
    }


    function load_danhsach_bangcd_tk_tmp_dk()
    {
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = $this->get_orderby() . " and ";
        $sql = "SELECT * FROM sdtkdk where 0=0 $sql_ct order by sott";
        $result = $this->re_query($sql);
        while ($data = $this->re_fetch($result)) {
            $trees[$data['matk']] = $data;
        }
        return $trees;
    }

    function load_danhsach_bangcd_tk_tmp_chuakc()
    {
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = $this->get_orderby() . " and ";
        $sql = "SELECT sott,matk,tentk,nodk as tongduno,codk as tongduco,nops as tongdunops,cops as tongducops,nock as tongdunock,cock as tongducock,cap as CAP FROM tmp_bangcdtk order by sott";
        $result = $this->re_query($sql);
        while ($data = $this->re_fetch($result)) {
            $trees[$data['matk']] = $data;
        }
        return $trees;
    }

    function load_danhsach_bangxdkqkd()
    {
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = $this->get_orderby() . " and ";
        $sql = "SELECT * FROM tokhaitndn where loaitokhai='XDKQKD' order by machitieu";
        $result = $this->re_query($sql);
        $i = 1;
        $cap1 = 1;

        while ($data = $this->re_fetch($result)) {
            $trees[] = $data;
        }
        return $trees;
    }

    function load_danhsach_bangplxdkqkd()
    {
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = $this->get_orderby() . " and ";
        $sql = "SELECT * FROM tokhaitndn where $sql_w loaitokhai='PLKQKD' order by sott";
        $result = $this->re_query($sql);
        $i = 1;
        $cap1 = 1;

        while ($data = $this->re_fetch($result)) {
            $trees[] = $data;
        }
        return $trees;
    }

    function load_danhsach_bangtndn()
    {
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = $this->get_orderby() . " and ";
        $sql = "SELECT * FROM tokhaitndn where loaitokhai='TNDN' order by sott";
        $result = $this->re_query($sql);
        $i = 1;
        $cap1 = 1;

        while ($data = $this->re_fetch($result)) {
            $trees[] = $data;
        }
        return $trees;
    }

    function load_danhsach_bangxdkqkd_dacodulieu($quy)
    {
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = $this->get_orderby() . " and ";
        $sql = "SELECT * FROM tmp_kqhdkd where quy='" . $quy . "' order by sott";
        $result = $this->re_query($sql);
        $i = 1;
        $cap1 = 1;

        while ($data = $this->re_fetch($result)) {
            $trees[$data['maso']] = $data;
        }
        return $trees;
    }

    function load_danhsach_bangcd_ketoan_dacodulieu()
    {
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = $this->get_orderby() . " and ";
        $sql = "SELECT * FROM bangcdkt order by sott";
        $result = $this->re_query($sql);
        $i = 1;
        $cap1 = 1;

        while ($data = $this->re_fetch($result)) {
            $trees[$data['maso']] = $data;
        }
        return $trees;
    }
    function load_danhsach_thietlap_bangcd_ketoan()
    {
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = $this->get_orderby() . " and ";
        $sql = "SELECT * FROM bangcdkt order by sott";
        $result = $this->re_query($sql);
        $i = 1;
        $cap1 = 1;

        while ($data = $this->re_fetch($result)) {
            $trees[] = $data;
        }
        return $trees;
    }


    function them_danhsach_bangcd_ketoan($parentid = 0, $printto, $array_bangcdtk)
    {
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = $this->get_orderby() . " and ";
        $sql = "SELECT * FROM sdkt WHERE 0=0 $sql_w order by matsnv";
        $result = $this->re_query($sql);
        $value="";
        while ($data = $this->re_fetch($result)) {// Cấp 1
            $array_cdkt = explode(",", $data['matk']);
            $sdktdk = 0;
            $sdktck = 0;
            foreach ($array_cdkt as $itemCDKT) {
                if ($data['loaitk'] == 'CO') {
                    $sdktdk += $array_bangcdtk[$itemCDKT]['codk'];
                    $sdktck += $array_bangcdtk[$itemCDKT]['cock'];
                } else if ($data['loaitk'] == 'NO') {
                    $sdktdk += $array_bangcdtk[$itemCDKT]['nodk'];
                    $sdktck += $array_bangcdtk[$itemCDKT]['nock'];
                } else if ($data['loaitk'] == 'NTCDN') {
                    $tempDK = ($array_bangcdtk[$itemCDKT]['nodk'] - $array_bangcdtk[$itemCDKT]['codk']);
                    $tempDKTien = ($tempDK > 0 ? $tempDK : 0);
                    $sdktdk += $tempDKTien;
                    $sdktck += $array_bangcdtk[$itemCDKT]['nock'];
                } else if ($data['loaitk'] == 'CTN') {
                    $sdktdk += $array_bangcdtk[$itemCDKT]['codk'] - $array_bangcdtk[$itemCDKT]['nodk'];
                    $sdktck += $array_bangcdtk[$itemCDKT]['cock'] - $array_bangcdtk[$itemCDKT]['nock'];
                } else if ($data['loaitk'] == 'CTNDC') {
                    $tempDK = ($array_bangcdtk[$itemCDKT]['codk'] - $array_bangcdtk[$itemCDKT]['nodk']);
                    $tempDKTien = ($tempDK > 0 ? $tempDK : 0);
                    $sdktdk += $tempDKTien;
                    $sdktck += $array_bangcdtk[$itemCDKT]['cock'];
                }
            }
            $value.= "('".$data['matk']."','".$data['matsnv']."','".$data['tentsnv']."','".$data['maso']."','".$data['matsnvcha']."','".$data['loaitsnv']."','".$sdktdk."','".$sdktck."','".$data['CAP']."'),";
            $data['sodudk'] = $sdktdk;
            $data['soduck'] = $sdktck;
            $trees[] = $data;
        }
        $this->re_query("delete from bangcdkt");
        $sql_ins = "insert into bangcdkt(matk,matsnv,tentsnv,maso,matsnvcha,loaitsnv,sodudk,soduck,cap) VALUE ".substr($value, 0,-1);
        $this->re_query($sql_ins);
        return $trees;
    }
    function load_danhsach_bangcd_ketoan()
    {
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = $this->get_orderby() . " and ";
        $sql = "SELECT * FROM bangcdkt WHERE matsnvcha=0 $sql_w order by matsnv";
        $result = $this->re_query($sql);
        while ($data = $this->re_fetch($result)) {// Cấp 1
            $data['CAP']=1;
            $trees[$data['matsnv']]=$data;
            $sql2 = "SELECT * FROM bangcdkt WHERE matsnvcha='".$data['matsnv']."' $sql_w order by matsnv";
            $result2 = $this->re_query($sql2);
            while ($data2 = $this->re_fetch($result2)) {// Cấp 1
                $data2['CAP']=2;
                $data2['tentsnv']= "&nbsp;".$data2['tentsnv'];
                $trees[$data2['matsnv']]=$data2;
                $sql3 = "SELECT * FROM bangcdkt WHERE matsnvcha='".$data['matsnv']."' $sql_w order by matsnv";
                $result3 = $this->re_query($sql3);
                while ($data3 = $this->re_fetch($result3)) {// Cấp 1
                    $data3['CAP']=3;
                    $data3['tentsnv']= "&nbsp;&nbsp;".$data3['tentsnv'];
                    $trees[$data3['matsnv']]=$data3;

                }

            }

        }
        return $trees;
    }

    function load_danhsach_bangcd_ketoan_tt200()
    {
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = $this->get_orderby() . " and ";
        $sql = "SELECT * FROM bangcdkt WHERE matsnvcha=0 $sql_w order by matsnv";
        $result = $this->re_query($sql);
        while ($data = $this->re_fetch($result)) {// Cấp 1
            $data['CAP']=1;
            $trees[$data['matsnv']]=$data;
            $sql2 = "SELECT * FROM bangcdkt WHERE matsnvcha='".$data['matsnv']."' $sql_w order by matsnv";
            $result2 = $this->re_query($sql2);
            while ($data2 = $this->re_fetch($result2)) {// Cấp 1
                $data2['CAP']=2;
                $data2['tentsnv']= "&nbsp;".$data2['tentsnv'];
                $trees[$data2['matsnv']]=$data2;
                $sql3 = "SELECT * FROM bangcdkt WHERE matsnvcha='".$data2['matsnv']."' $sql_w order by matsnv";
                $result3 = $this->re_query($sql3);
                while ($data3 = $this->re_fetch($result3)) {// Cấp 1
                    $data3['CAP']=3;
                    $data3['tentsnv']= "&nbsp;&nbsp;".$data3['tentsnv'];
                    $trees[$data3['matsnv']]=$data3;

                }

            }

        }
        return $trees;
    }

    function them_danhsach_bangcd_ketoan_tt200($parentid = 0, $printto, $array_bangcdtk)
    {
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = $this->get_orderby() . " and ";
        $sql = "SELECT * FROM sdkt WHERE 0=0 $sql_w order by matsnv";
        $result = $this->re_query($sql);
        $value="";
        while ($data = $this->re_fetch($result)) {// Cấp 1
            $array_cdkt = explode(",", $data['matk']);
            $phanloai = $data['phanloai'];
            $sdktdk = 0;
            $sdktck = 0;
            foreach ($array_cdkt as $itemCDKT) {
                if ($data['loaitk'] == 'CO') {
                    $sdktdk += $array_bangcdtk[$itemCDKT][$phanloai]['codk'];
                    $sdktck += $array_bangcdtk[$itemCDKT][$phanloai]['cock'];
                } else if ($data['loaitk'] == 'NO') {
                    $sdktdk += $array_bangcdtk[$itemCDKT][$phanloai]['nodk'];
                    $sdktck += $array_bangcdtk[$itemCDKT][$phanloai]['nock'];
                } else if ($data['loaitk'] == 'NTCDN') {
                    $tempDK = ($array_bangcdtk[$itemCDKT][$phanloai]['nodk'] - $array_bangcdtk[$itemCDKT][$phanloai]['codk']);
                    $tempDKTien = ($tempDK > 0 ? $tempDK : 0);
                    $sdktdk += $tempDKTien;
                    $sdktck += $array_bangcdtk[$itemCDKT][$phanloai]['nock'];
                } else if ($data['loaitk'] == 'CTN') {
                    $sdktdk += $array_bangcdtk[$itemCDKT][$phanloai]['codk'] - $array_bangcdtk[$itemCDKT][$phanloai]['nodk'];
                    $sdktck += $array_bangcdtk[$itemCDKT][$phanloai]['cock'] - $array_bangcdtk[$itemCDKT][$phanloai]['nock'];
                } else if ($data['loaitk'] == 'CTNDC') {
                    $tempDK = ($array_bangcdtk[$itemCDKT][$phanloai]['codk'] - $array_bangcdtk[$itemCDKT][$phanloai]['nodk']);
                    $tempDKTien = ($tempDK > 0 ? $tempDK : 0);
                    $sdktdk += $tempDKTien;
                    $sdktck += $array_bangcdtk[$itemCDKT][$phanloai]['cock'];
                }
            }
            $value.= "('".$data['matk']."','".$data['matsnv']."','".$data['tentsnv']."','".$data['maso']."','".$data['matsnvcha']."','".$data['loaitsnv']."','".$sdktdk."','".$sdktck."','".$data['CAP']."'),";
            $data['sodudk'] = $sdktdk;
            $data['soduck'] = $sdktck;
            $trees[] = $data;
        }
        $this->re_query("delete from bangcdkt");
        $sql_ins = "insert into bangcdkt(matk,matsnv,tentsnv,maso,matsnvcha,loaitsnv,sodudk,soduck,cap) VALUE ".substr($value, 0,-1);
        $this->re_query($sql_ins);
        return $trees;
    }


    function load_danhsach_nokhachhang($makh, $printto, $array_no, $array_co, $sql_mkh, $dataNoDK, $dataNo_dk, $dataCo_dk)
    {
        //debug($array_no);
        if ($makh == "ALL") {
            $SQL_MAKH = "makh.makhcha = '0'";
        } else {
            $SQL_MAKH = "makh.makh = '" . $makh . "'";
        }
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = $this->get_orderby() . " and ";
        $sql = "SELECT tmp_dskhcn.makh,makh.tenkh,tmp_dskhcn.matk,0 as soduno,0 as soduco,makh.makhcha,makh.loaitien,makh.manhom FROM tmp_dskhcn inner join makh on(tmp_dskhcn.makh = makh.makh) WHERE $sql_w $SQL_MAKH and tmp_dskhcn.matk!='' $sql_mkh  order by tmp_dskhcn.matk,makh.makh";
        $result = $this->re_query($sql);
        $i = 1;
        $cap1 = 1;

        while ($data = $this->re_fetch($result)) {////// Cấp 1
            $data['STT'] = $i;
            $data['CAP'] = 1;

            $tongnock1 = 0;
            $tongcock1 = 0;

            $tongnock2 = 0;
            $tongcock2 = 0;

            $tongnock3 = 0;
            $tongcock3 = 0;


            $ma = $data['makh'] . $data['matk'];

            $data['sodunops'] = $array_no[$ma]['psno'];
            $data['soducops'] = $array_co[$ma]['psco'];

            $tmpdk = ($dataNoDK[$ma]['soduno'] + $dataNo_dk[$ma]['psno'])-($dataNoDK[$ma]['soduco'] + $dataCo_dk[$ma]['psco']);

            if($tmpdk>=0){
                $data['soduno'] = $tmpdk;
                $data['soduco'] = 0;
            }else{
                $data['soduno'] = 0;
                $data['soduco'] = abs($tmpdk);
            }

            $data['sodunontps'] = $array_no[$ma]['psnont'];
            $data['soducontps'] = $array_co[$ma]['pscont'];

            $data['sodunont'] = $dataNoDK[$ma]['sodunont'] + $dataNo_dk[$ma]['psnont'];
            $data['soducont'] = $dataNoDK[$ma]['soducont'] + $dataCo_dk[$ma]['pscont'];


            $data['tenkh'] = $data['tenkh'];
            $trees[$data['makh'] . $data['matk']] = $data;
            $cap1++;
            $i++;
            $sql1 = "SELECT tmp_dskhcn.makh,makh.tenkh,tmp_dskhcn.matk,0 as soduno,0 as soduco,makh.makhcha,makh.loaitien,makh.manhom FROM tmp_dskhcn inner join makh on(tmp_dskhcn.makh = makh.makh) WHERE $sql_w makh.makhcha ='" . $data['makh'] . "' and tmp_dskhcn.matk!='' and tmp_dskhcn.matk=" . $data['matk'] . " order by tmp_dskhcn.matk,makh.makh ";
            $query = $this->re_query($sql1);

            $cap2 = $cap1;

            $tongnodk = 0;
            $tongcodk = 0;

            $tongnops = 0;
            $tongcops = 0;

            $tongnontdk = 0;
            $tongcontdk = 0;

            $tongnontps = 0;
            $tongcontps = 0;

            $tongnops += $data['sodunops'];
            $tongcops += $data['soducops'];

            $tongnodk += $data['soduno'];
            $tongcodk += $data['soduco'];

            $tongnontps += $data['sodunontps'];
            $tongcontps += $data['soducontps'];

            $tongnontdk += $data['sodunont'];
            $tongcontdk += $data['soducont'];

            $tongcktinh1 = ($data['soduno'] + $data['sodunops']) - ($data['soduco'] + $data['soducops']);
            if ($tongcktinh1 >= 0) {
                $tongnock1 += abs($tongcktinh1);
            } else {
                $tongcock1 += abs($tongcktinh1);
            }


            while ($data1 = $this->re_fetch($query)) {// Cấp 2
                if ($printto == 1) {
                    break;
                }
                $data1['STT'] = $i;
                $data1['CAP'] = 2;
                $ma = $data1['makh'] . $data1['matk'];

                $data1['sodunops'] = $array_no[$ma]['psno'];
                $data1['soducops'] = $array_co[$ma]['psco'];

                $tmpdk = ($dataNoDK[$ma]['soduno'] + $dataNo_dk[$ma]['psno'])-($dataNoDK[$ma]['soduco'] + $dataCo_dk[$ma]['psco']);

                if($tmpdk>=0){
                    $data1['soduno'] = $tmpdk;
                    $data1['soduco'] = 0;
                }else{
                    $data1['soduno'] = 0;
                    $data1['soduco'] = abs($tmpdk);
                }

                $data1['sodunontps'] = $array_no[$ma]['psnont'];
                $data1['soducontps'] = $array_co[$ma]['pscont'];

                $data1['sodunont'] = $dataNoDK[$ma]['sodunont'] + $dataNo_dk[$ma]['psnont'];
                $data1['soducont'] = $dataNoDK[$ma]['soducont'] + $dataCo_dk[$ma]['pscont'];

                $tongnodk += $data1['soduno'];
                $tongcodk += $data1['soduco'];

                $tongnops += $data1['sodunops'];
                $tongcops += $data1['soducops'];

                $tongnontdk += $data1['sodunont'];
                $tongcontdk += $data1['soducont'];

                $tongnontps += $data1['sodunontps'];
                $tongcontps += $data1['soducontps'];


                $data1['tenkh'] = "&nbsp;&nbsp;&nbsp;" . $data1['tenkh'];
                $trees[$data1['makh'] . $data1['matk']] = $data1;
                $cap2++;
                $i++;
                $sql2 = "SELECT tmp_dskhcn.makh,makh.tenkh,tmp_dskhcn.matk,0 as soduno,0 as soduco,makh.makhcha,makh.loaitien,makh.manhom FROM tmp_dskhcn inner join makh on(tmp_dskhcn.makh = makh.makh) WHERE $sql_w makh.makhcha ='" . $data1['makh'] . "' and tmp_dskhcn.matk!='' and tmp_dskhcn.matk=" . $data1['matk'] . " order by tmp_dskhcn.matk,makh.makh ";
                $query1 = $this->re_query($sql2);
                $cap3 = $cap2;
                $tongnodk3 = 0;
                $tongcodk3 = 0;

                $tongnops3 = 0;
                $tongcops3 = 0;

                $tongnontdk3 = 0;
                $tongcontdk3 = 0;

                $tongnontps3 = 0;
                $tongcontps3 = 0;

                $tongnops3 += $data1['sodunops'];
                $tongcops3 += $data1['soducops'];

                $tongnodk3 += $data1['soduno'];
                $tongcodk3 += $data1['soduco'];

                $tongnontps3 += $data1['sodunontps'];
                $tongcontps3 += $data1['soducontps'];

                $tongnontdk3 += $data1['sodunont'];
                $tongcontdk3 += $data1['soducont'];

                $tongcktinh2 = ($data1['soduno'] + $data1['sodunops']) - ($data1['soduco'] + $data1['soducops']);
                if ($tongcktinh2 >= 0) {
                    $tongnock2 += abs($tongcktinh2);
                } else {
                    $tongcock2 += abs($tongcktinh2);
                }

                while ($data2 = $this->re_fetch($query1)) {////// Cấp 3
                    if ($printto == 2) {
                        break;
                    }
                    $data2['STT'] = $i;
                    $data2['CAP'] = 3;

                    $ma = $data2['makh'] . $data2['matk'];

                    $data2['sodunops'] = $array_no[$ma]['psno'];
                    $data2['soducops'] = $array_co[$ma]['psco'];

                    $tmpdk = ($dataNoDK[$ma]['soduno'] + $dataNo_dk[$ma]['psno'])-($dataNoDK[$ma]['soduco'] + $dataCo_dk[$ma]['psco']);

                    if($tmpdk>=0){
                        $data2['soduno'] = $tmpdk;
                        $data2['soduco'] = 0;
                    }else{
                        $data2['soduno'] = 0;
                        $data2['soduco'] = abs($tmpdk);
                    }

                    $data2['sodunontps'] = $array_no[$ma]['psnont'];
                    $data2['soducontps'] = $array_co[$ma]['pscont'];


                    $data2['sodunont'] = $dataNoDK[$ma]['sodunont'] + $dataNo_dk[$ma]['psnont'];
                    $data2['soducont'] = $dataNoDK[$ma]['soducont'] + $dataCo_dk[$ma]['pscont'];

                    $tongnodk3 += $data2['soduno'];
                    $tongcodk3 += $data2['soduco'];

                    $tongnops3 += $data2['sodunops'];
                    $tongcops3 += $data2['soducops'];

                    $tongnontdk3 += $data2['sodunont'];
                    $tongcontdk3 += $data2['soducont'];

                    $tongnontps3 += $data2['sodunontps'];
                    $tongcontps3 += $data2['soducontps'];

                    $tongnodk += $data2['soduno'];
                    $tongcodk += $data2['soduco'];

                    $tongnops += $data2['sodunops'];
                    $tongcops += $data2['soducops'];

                    $tongnontdk += $data2['sodunont'];
                    $tongcontdk += $data2['soducont'];

                    $tongnontps += $data2['sodunontps'];
                    $tongcontps += $data2['soducontps'];

                    $tongcktinh3 = ($data2['soduno'] + $data2['sodunops']) - ($data2['soduco'] + $data2['soducops']);
                    if ($tongcktinh3 >= 0) {
                        $tongnock3 += abs($tongcktinh3);
                    } else {
                        $tongcock3 += abs($tongcktinh3);
                    }

                    $cap3++;
                    $i++;
                    $data2['tenkh'] = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" . $data2['tenkh'];
                    $trees[$data2['makh'] . $data2['matk']] = $data2;
                }//// Cấp 3

                $trees[$data1['makh'] . $data1['matk']]['tongduno'] = $tongnodk3;
                $trees[$data1['makh'] . $data1['matk']]['tongduco'] = $tongcodk3;

                $trees[$data1['makh'] . $data1['matk']]['tongdunops'] = $tongnops3;
                $trees[$data1['makh'] . $data1['matk']]['tongducops'] = $tongcops3;

                $trees[$data1['makh'] . $data1['matk']]['tongdunont'] = $tongnontdk3;
                $trees[$data1['makh'] . $data1['matk']]['tongducont'] = $tongcontdk3;

                $trees[$data1['makh'] . $data1['matk']]['tongdunontps'] = $tongnontps3;
                $trees[$data1['makh'] . $data1['matk']]['tongducontps'] = $tongcontps3;
            }// cấp 2
            if ($_SESSION['butrucongno'] == 1 && $data['matk'] == 131) {
                $tongdktinh = ($tongnodk - $tongcodk);
                if ($tongdktinh >= 0) {
                    $tongnodk = abs($tongdktinh);
                    $tongcodk = 0;
                } else {
                    $tongnodk = 0;
                    $tongcodk = abs($tongdktinh);
                }
            }
            $trees[$data['makh'] . $data['matk']]['tongduno'] = $tongnodk;
            $trees[$data['makh'] . $data['matk']]['tongduco'] = $tongcodk;

            $trees[$data['makh'] . $data['matk']]['tongdunops'] = $tongnops;
            $trees[$data['makh'] . $data['matk']]['tongducops'] = $tongcops;

            $trees[$data['makh'] . $data['matk']]['tongdunont'] = $tongnontdk;
            $trees[$data['makh'] . $data['matk']]['tongducont'] = $tongcontdk;

            $trees[$data['makh'] . $data['matk']]['tongdunontps'] = $tongnontps;
            $trees[$data['makh'] . $data['matk']]['tongducontps'] = $tongcontps;

            $trees[$data['makh'] . $data['matk']]['tongdunock'] = $tongnock3 + $tongnock2 + $tongnock1;
            $trees[$data['makh'] . $data['matk']]['tongducock'] = $tongcock3 + $tongcock2 + $tongcock1;

            /*
            $tongcktinh = ($tongnodk + $tongnops) - ($tongcodk + $tongcops);

            $tongcknttinh = ($tongnontdk + $tongnontps) - ($tongcontdk + $tongcontps);

            if ($tongcktinh >= 0) {
                $tongnock = ($tongnodk + $tongnops) - ($tongcodk + $tongcops);
                $trees[$data['makh'] . $data['matk']]['tongdunock'] = $tongnock;
            } else {
                $tongcock = ($tongcodk + $tongcops) - ($tongnodk + $tongnops);
                $trees[$data['makh'] . $data['matk']]['tongducock'] = $tongcock;
            }*/
            $tongcknttinh = ($tongnontdk + $tongnontps) - ($tongcontdk + $tongcontps);
            if ($tongcknttinh >= 0) {
                $tongnontck = ($tongnontdk + $tongnontps) - ($tongcontdk + $tongcontps);
                $trees[$data['makh'] . $data['matk']]['tongdunontck'] = $tongnontck;
            } else {
                $tongcontck = ($tongcontdk + $tongcontps) - ($tongnontdk + $tongnontps);
                $trees[$data['makh'] . $data['matk']]['tongducontck'] = $tongcontck;
            }


        }// cấp 1
        return $trees;
    }

    function load_danhsach_nokhachhang_dk($parentid, $sql_mkh)
    {
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = $this->get_orderby() . " and ";
        $sql = "SELECT sdcn.makh,sdcn.matk,sum(sdkno) as soduno,sum(sdkco) as soduco,makh.makhcha,sum(thanhtienntpt) as sodunont,sum(thanhtienntptr) as soducont FROM sdcn inner join makh on(sdcn.makh = makh.makh) WHERE $sql_w makh.makhcha = '" . $parentid . "' and sdcn.matk!='' $sql_mkh  GROUP by makh,matk  order by sdcn.matk";
        $result = $this->re_query($sql);
        $i = 1;
        $cap1 = 1;

        while ($data = $this->re_fetch($result)) {
            $data['STT'] = $i;
            $data['CAP'] = 1;
            $ma = $data['makh'] . $data['matk'];

            $data['sodunops'] = $array_no[$ma]['psno'];
            $data['soducops'] = $array_co[$ma]['psco'];

            $data['tenkh'] = $data['tenkh'];
            $trees[$data['makh'] . $data['matk']] = $data;
            $cap1++;
            $i++;
            $sql1 = "SELECT sdcn.makh,sdcn.matk,sdkno as soduno,sdkco as soduco,makh.makhcha,thanhtienntpt as sodunont,thanhtienntptr as soducont FROM sdcn inner join makh on(sdcn.makh = makh.makh) WHERE $sql_w makh.makhcha ='" . $data['makh'] . "' and sdcn.matk!='' and sdcn.matk=" . $data['matk'] . " order by matk ";
            $query = $this->re_query($sql1);

            $cap2 = $cap1;

            $tongnodk = 0;
            $tongcodk = 0;

            $tongnontdk = 0;
            $tongcontdk = 0;

            $tongnops = 0;
            $tongcops = 0;

            $tongnops += $data['sodunops'];
            $tongcops += $data['soducops'];

            $tongnodk += $data['soduno'];
            $tongcodk += $data['soduco'];

            $tongnontdk += $data['sodunont'];
            $tongcontdk += $data['soducont'];

            while ($data1 = $this->re_fetch($query)) {
                if ($printto == 1) {
                    break;
                }
                $data1['STT'] = $i;
                $data1['CAP'] = 2;
                $ma = $data1['makh'] . $data1['matk'];
                $data1['sodunops'] = $array_no[$ma]['psno'];
                $data1['soducops'] = $array_co[$ma]['psco'];

                $tongnodk += $data1['soduno'];
                $tongcodk += $data1['soduco'];

                $tongnontdk += $data1['soduntno'];
                $tongcontdk += $data1['soduntco'];

                $tongnops += $data1['sodunops'];
                $tongcops += $data1['soducops'];

                $data1['tenkh'] = "&nbsp;&nbsp;&nbsp;" . $data1['tenkh'];
                $trees[$data1['makh'] . $data1['matk']] = $data1;
                $cap2++;
                $i++;
                $sql2 = "SELECT sdcn.makh,sdcn.matk,sdkno as soduno,sdkco as soduco,makh.makhcha,thanhtienntpt as sodunont,thanhtienntptr as soducont FROM sdcn inner join makh on(sdcn.makh = makh.makh) WHERE $sql_w makh.makhcha ='" . $data1['makh'] . "' and sdcn.matk!='' and sdcn.matk=" . $data1['matk'] . " order by matk ";
                $query1 = $this->re_query($sql2);
                $cap3 = $cap2;

                $tongnodk3 = 0;
                $tongcodk3 = 0;

                $tongnontdk3 = 0;
                $tongcontdk3 = 0;

                $tongnops3 = 0;
                $tongcops3 = 0;

                $tongnock3 = 0;
                $tongcock3 = 0;

                $tongnops3 += $data1['sodunops'];
                $tongcops3 += $data1['soducops'];

                $tongnodk3 += $data1['soduno'];
                $tongcodk3 += $data1['soduco'];

                $tongnontdk3 += $data1['soduntno'];
                $tongcontdk3 += $data1['soduntco'];

                while ($data2 = $this->re_fetch($query1)) {
                    if ($printto == 2) {
                        break;
                    }
                    $data2['STT'] = $i;
                    $data2['CAP'] = 3;

                    $ma = $data2['makh'] . $data2['matk'];

                    $data2['sodunops'] = $array_no[$ma]['psno'];
                    $data2['soducops'] = $array_co[$ma]['psco'];

                    $tongnodk3 += $data2['soduno'];
                    $tongcodk3 += $data2['soduco'];

                    $tongnontdk3 += $data2['soduntno'];
                    $tongcontdk3 += $data2['soduntco'];

                    $tongnops3 += $data2['sodunops'];
                    $tongcops3 += $data2['soducops'];

                    $tongnodk += $data2['soduno'];
                    $tongcodk += $data2['soduco'];

                    $tongnontdk += $data2['soduntno'];
                    $tongcontdk += $data2['soduntco'];

                    $tongnops += $data2['sodunops'];
                    $tongcops += $data2['soducops'];

                    /// Tính cuối kỳ khách hàng cấp 3
                    $tongcktinh3 = ($tongnodk3 + $tongnops3) - ($tongcodk3 + $tongcops3);
                    if ($tongcktinh3 >= 0) {
                        $tongnock3 = ($tongnodk3 + $tongnops3) - ($tongcodk3 + $tongcops3);
                    } else {
                        $tongcock3 = ($tongcodk3 + $tongcops3) - ($tongnodk3 + $tongnops3);
                    }

                    $data2['tongdunock'] = $tongnock3;
                    $data2['tongducock'] = $tongcock3;


                    $cap3++;
                    $i++;
                    $data2['tenkh'] = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" . $data2['tenkh'];
                    $trees[$data2['makh'] . $data2['matk']] = $data2;
                }///// Kết thúc cấp 3
                $trees[$data1['makh'] . $data1['matk']]['tongduno'] = $tongnodk3;
                $trees[$data1['makh'] . $data1['matk']]['tongduco'] = $tongcodk3;

                $trees[$data1['makh'] . $data1['matk']]['tongdunont'] = $tongnontdk3;
                $trees[$data1['makh'] . $data1['matk']]['tongducont'] = $tongcontdk3;

                $trees[$data1['makh'] . $data1['matk']]['tongdunops'] = $tongnops3;
                $trees[$data1['makh'] . $data1['matk']]['tongducops'] = $tongcops3;

                /// Tính cuối kỳ khách hàng cấp 3
                $tongcktinh2 = ($tongnodk3 + $tongnops3) - ($tongcodk3 + $tongcops3);
                if ($tongcktinh2 >= 0) {
                    $tongnock2 = ($tongnodk3 + $tongnops3) - ($tongcodk3 + $tongcops3);
                } else {
                    $tongcock3 = ($tongcodk3 + $tongcops3) - ($tongnodk3 + $tongnops3);
                }

                $data2['tongdunock'] = $tongnock3;
                $data2['tongducock'] = $tongcock3;


            }/// kết thúc cấp 2
            $trees[$data['makh'] . $data['matk']]['tongduno'] = $tongnodk;
            $trees[$data['makh'] . $data['matk']]['tongduco'] = $tongcodk;

            $trees[$data['makh'] . $data['matk']]['tongdunont'] = $tongnontdk;
            $trees[$data['makh'] . $data['matk']]['tongducont'] = $tongcontdk;

            $trees[$data['makh'] . $data['matk']]['tongdunops'] = $tongnops;
            $trees[$data['makh'] . $data['matk']]['tongducops'] = $tongcops;


            $tongcktinh = ($tongnodk + $tongnops) - ($tongcodk + $tongcops);
            if ($tongcktinh >= 0) {
                $tongnock = ($tongnodk + $tongnops) - ($tongcodk + $tongcops);
                $trees[$data['makh'] . $data['matk']]['tongdunock'] = $tongnock;
            } else {
                $tongcock = ($tongcodk + $tongcops) - ($tongnodk + $tongnops);
                $trees[$data['makh'] . $data['matk']]['tongducock'] = $tongcock;
            }

            $tongcknttinh = ($tongnontdk + $tongnontps) - ($tongcontdk + $tongcontps);
            if ($tongcknttinh >= 0) {
                $tongnontck = ($tongnontdk + $tongnontps) - ($tongcontdk + $tongcontps);
                $trees[$data['makh'] . $data['matk']]['tongdunontck'] = $tongnontck;
            } else {
                $tongcontck = ($tongcontdk + $tongcontps) - ($tongnontdk + $tongnontps);
                $trees[$data['makh'] . $data['matk']]['tongducontck'] = $tongcontck;
            }


        }/// kết thúc cấp 1
        return $trees;
    }

    function load_danhsach_congno()
    {
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = $this->get_orderby();
        $sql = "SELECT makh,tenkh,matk,nodk as soduno,codk as soduco,nops as sodunops,cops as soducops,nock as tongdunock,cock as tongducock,makhcha,nontdk as sodunont,contdk as soducont,nontps as sodunontps,contps as soducontps,nontck as tongdunontck,contck as tongducontck,loaitien,nock_,cock_ FROM cnkh where 0=0 {$sql_w} ";
        $result = $this->re_query($sql);
        $i = 1;
        while ($data = $this->re_fetch($result)) {
            $i++;
            $trees[] = $data;
        }
        return $trees;
    }

    function load_danhsach_bangno_khachhang()
    {
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = $this->get_orderby();
        $sql = "SELECT matk,sum(nock_) as nock,sum(cock_) as cock FROM cnkh where 0=0 {$sql_w} group by matk ";
        $result = $this->re_query($sql);
        $i = 1;
        while ($data = $this->re_fetch($result)) {
            $i++;
            $trees[$data['matk']] = $data;
        }
        return $trees;
    }
    function load_danhsach_bangno_khachhang_tt200()
    {
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = $this->get_orderby();
        $sql = "SELECT matk,sum(nock_) as nock,sum(cock_) as cock,phanloai FROM cnkh where 0=0 {$sql_w} group by matk,phanloai ";
        $result = $this->re_query($sql);
        $i = 1;
        while ($data = $this->re_fetch($result)) {
            $i++;
            if($data['matk']=='131' || $data['matk']=='331' || $data['matk']=='1388' || $data['matk']=='3388'){
                $trees[$data['matk']][$data['phanloai']] = $data;
            }else{
                $tmp = $data ['nock']-$data ['cock'];
                if($tmp>0){
                    $data ['nock'] = abs($tmp);
                    $data ['cock'] = 0;
                }else{
                    $data ['nock'] = 0;
                    $data ['cock'] = abs($tmp);
                }
                $trees[$data['matk']][$data['phanloai']] = $data;
            }
        }
        return $trees;
    }
    function load_danhsach_bangno_khachhang_cobutru()
    {
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = $this->get_orderby();
        $sql = "SELECT matk,sum(nodk) as nodk,sum(codk) as codk,sum(nock) as nock,sum(cock) as cock FROM cnkh where makhcha=0 {$sql_w} group by matk ";
        $result = $this->re_query($sql);
        $i = 1;
        while ($data = $this->re_fetch($result)) {
            $i++;
            $trees[$data['matk']] = $data;
        }
        return $trees;
    }

    function load_danhsach_bangno_khachhang_dk()
    {
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = $this->get_orderby();
        $sql = "SELECT sum(sdkno) as nodk,sum(sdkco) as codk,matk FROM sdcn group by matk ";
        $result = $this->re_query($sql);
        $i = 1;
        while ($data = $this->re_fetch($result)) {
            $i++;
            $trees[$data['matk']] = $data;
        }
        return $trees;
    }

    function loadListBangCDKT($parentid = 0, $printto = 10)
    { // c?p 1 la cha
        //$cb_loaitk = $this->get_Cb_LoaiTK();
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = $this->get_orderby() . " and ";
        $sql = "SELECT * FROM sdkt WHERE $sql_w matsnvcha = '$parentid'  order by matsnv ";
        $this->query($sql);
        $i = 0;
        while ($data = $this->fetch()) {
            $i++;
            $data['STT'] = $i;
            $trees[] = $data;
            $sql1 = "SELECT * FROM sdkt WHERE $sql_w matsnvcha ='" . $data['matsnv'] . "' order by matsnv ASC";
            $query = $this->re_query($sql1);
            while ($data1 = $this->re_fetch($query)) {
                if ($printto == 1) {
                    break;
                }
                $i++;
                $data1['STT'] = $i;
                $trees[] = $data1;
                $sql2 = "SELECT * FROM sdkt WHERE $sql_w matsnvcha ='" . $data1['matsnv'] . "' order by matsnv ";
                $query1 = $this->re_query($sql2);
                while ($data2 = $this->re_fetch($query1)) {
                    if ($printto == 2) {
                        break;
                    }
                    $i++;
                    $data2['STT'] = $i;
                    $trees[] = $data2;
                    $sql3 = "SELECT * FROM sdkt WHERE $sql_w matsnvcha ='" . $data2['matsnv'] . "' order by matsnv ";
                    $query3 = $this->re_query($sql3);
                    while ($data3 = $this->re_fetch($query3)) {
                        if ($printto == 3) {
                            break;
                        }
                        $i++;
                        $data3['STT'] = $i;
                        $trees[] = $data3;
                        $sql4 = "SELECT * FROM sdkt WHERE $sql_w matsnvcha ='" . $data3['matsnv'] . "' order by matsnv ";
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

    public
    function createSoTT()
    {
        $sql = "select max(sott) as sott from sdkt";
        $this->query($sql);
        if ($this->num_rows() == 1) {
            $data = $this->fetch();
            return $data['sott'] + 1;
        } else {
            return 1;
        }
    }

    function themcdkt($stt, $matsnv, $tentsnv, $matk, $maso, $matsnvcha, $loaitsnv)
    {
        $sql = "insert into sdkt(sott,matk,matsnv,tentsnv,maso,matsnvcha,loaitsnv) values('" . $stt . "','" . $matk . "','" . $matsnv . "','" . $tentsnv . "','" . $maso . "','" . $matsnvcha . "','" . $loaitsnv . "')";
        $this->query($sql);
    }

    function suacdkt($stt, $matsnv, $tentsnv, $matk, $maso, $matsnvcha, $loaitsnv, $loaitk)
    {
        $sql = "update sdkt set
									matk='" . $matk . "',
									matsnv='" . $matsnv . "',
									tentsnv='" . $tentsnv . "',
									maso='" . $maso . "',
									matsnvcha='" . $matsnvcha . "',
									loaitsnv='" . $loaitsnv . "',
									loaitk='" . $loaitk . "'
									where sott='" . $stt . "'";
        $this->query($sql);
    }

    function xoacdkt($stt)
    {
        $sql = "delete from sdkt where sott='" . $stt . "'";
        $this->query($sql);
    }

////////////////////////////////Bút toán phát sinh
    function load_danhsachbuttoan_phatsinh()
    {
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = $this->get_orderby() . " and ";
        $sql = "SELECT * FROM buttoanps where $sql_w 0=0";
        $result = $this->re_query($sql);
        $i = 1;
        while ($data = $this->re_fetch($result)) {
            $i++;
            $trees[] = $data;
        }
        return $trees;
    }

    function load_danhsach_tokhai_thue($ppkhautru)
    {
        $trees = array();
        $fill = $this->get_orderby();
        $nam = $_SESSION['NienDo'];
        if ($ppkhautru == "1") {
            $sql = "SELECT 4 as loaiphieu,33311 as tk,sott as sophieu,thue as tienco,0 as tienno,SUBSTRING_INDEX(thang,'-', 1) thang,'gtgt' as 'tokhai' FROM tokhaithue where (SUBSTRING_INDEX(thang,'-', 1) in('1','2','3','4','5','6','7','8','9','11','12') and ((loaitokhai = 1 and (select COUNT(*) from tokhaithue a WHERE a.thang=tokhaithue.thang and matkhai='VI1' and loaitokhai ='0' ))=0) or (loaitokhai ='0')) and matkhai='VI1'
                    UNION ALL 
                    SELECT 4 as loaiphieu,33311 as tk,sott as sophieu,thue as tienco,0 as tienno,SUBSTRING_INDEX(thang,'-', 1) thang,'vanglai' as 'tokhai' FROM tokhaithue where (SUBSTRING_INDEX(thang,'-', 1) in('1','2','3','4','5','6','7','8','9','11','12') and ((loaitokhai = 1 and (select COUNT(*) from tokhaithue a WHERE a.thang=tokhaithue.thang and matkhai='VI1' and loaitokhai ='0' ))=0) or (loaitokhai ='0')) and matkhai='V' ORDER BY thang ";
        }else {
            echo $sql = "SELECT DISTINCT 4 as loaiphieu,33311 as tk,sott as sophieu,thue as tienco,0 as tienno,SUBSTRING_INDEX(thang,'-', 1) thang,'gtgt' as 'tokhai' FROM tokhaithue where (SUBSTRING_INDEX(thang,'-', 1) in('I','II','III','IV') and ((loaitokhai = 1 and (select COUNT(*) from tokhaithue a WHERE a.thang=tokhaithue.thang and matkhai='VI1' and loaitokhai ='0' ))=0 or (loaitokhai ='0'))) and matkhai='VI1'
                    UNION ALL 
                    SELECT DISTINCT 4 as loaiphieu,33311 as tk,sott as sophieu,thue as tienco,0 as tienno,SUBSTRING_INDEX(thang,'-', 1) thang,'vanglai' as 'tokhai' FROM tokhaithue where (SUBSTRING_INDEX(thang,'-', 1) in('I','II','III','IV') and ((loaitokhai = 1 and (select COUNT(*) from tokhaithue a WHERE a.thang=tokhaithue.thang and matkhai='VI1' and loaitokhai ='0' ))=0 or (loaitokhai ='0'))) and matkhai='V' ORDER BY thang";
        }
        $result = $this->re_query($sql);
        $i = 1;
        while ($data = $this->re_fetch($result)) {
            $i++;
            $trees[] = $data;
        }
        return $trees;
    }

    function load_danhsachbuttoan_phatsinh_va_thempskt($dataKetChuyen, $tungay, $denngay, $sophieu)
    {
        //debug($dataKetChuyen);
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = $this->get_orderby() . " and ";
        $sql = "SELECT * FROM buttoanps";
        $result = $this->re_query($sql);
        $i = 1;
        $value_sql_update = "";
        $sql_emp_pskt = "delete from pskt where loaiphieu='66' ";// xóa bút toán trong file pskt
        $this->re_query($sql_emp_pskt);

        $sql_emp_chitiet_pskt = "delete from chitiet_pskt where loaiphieu='66' "; // xóa bút toán trong file chitiet_pskt
        $this->re_query($sql_emp_chitiet_pskt);
        $tongco911 = 0;
        $tongno911 = 0;

        while ($dataCT = $this->re_fetch($result)) {
            $sophieu++;
            $i = $dataCT['sott'];
            $phantram = "phantram" . $dataCT['maso'];
            $sott = "sott" . $dataCT['maso'];
            $tudong = $dataCT['tudong'];

            $$sott = $dataCT['sott'];// Lấy sott làm biến
            $$phantram = $dataCT['phantram'];
            $sotien = abs($dataKetChuyen[$dataCT['tkchinh']][0]);
            $ngay = $denngay;
            if ($dataCT['maso'] == "KCLNNT" || $dataCT['maso'] == "KCLONT") {// nếu kết chuyễn nắm trước
                $sotien = 0;
                $ngay = $tungay;
                if ($dataCT['maso'] == "KCLNNT" && $dataKetChuyen[$dataCT['tkchinh']][1] > 0) {
                    $sotien = abs($dataKetChuyen[$dataCT['tkchinh']][1]);
                    $ngay = $tungay;
                }
                if ($dataCT['maso'] == "KCLONT" && $dataKetChuyen[$dataCT['tkchinh']][1] < 0) {
                    $sotien = abs($dataKetChuyen[$dataCT['tkchinh']][1]);
                    $ngay = $tungay;
                }
            }

            if ($dataCT['tkco'] == 911 && $tudong != "0") {
                $tongco911 += $sotien;
            }
            if ($dataCT['tkno'] == 911 && $tudong != "0") {
                $tongno911 += $sotien;
            }

            if ($dataCT['tkno'] == 6421 && $tudong != "0") {
                $tongno6421 += $sotien;
            }

            if ($dataCT['tkno'] == 6422 && $tudong != "0") {
                $tongno6422 += $sotien;
            }

            if ($dataCT['tkno'] == 811 && $tudong != "0") {
                $tongno811 += $sotien;
            }

            if ($tudong != "0") {
                {
                    $value_sql_update = "update buttoanps set sotien='" . $sotien . "' where sott='" . $dataCT['sott'] . "'";
                    $this->re_query($value_sql_update);
                    $value_pskt .= "('" . $sophieu . "','" . $i . "','" . $ngay . "','" . $dataCT['tkco'] . "','66','" . abs($sotien) . "',NULL,''),";
                    $value_chitiet_pskt .= "('" . $i . "','" . $ngay . "','" . abs($sotien) . "','0001','Toàn bộ','" . $dataCT['maso'] . "','" . $dataCT['noidung'] . "','" . $dataCT['tkno'] . "','" . abs($sotien) . "','4','66','" . $sophieu . "'),";
                }
            }
        }
        $sql_pskt = "insert into pskt(sophieu,mapskt,ngayghiso,tkco,loaiphieu,tongcong,makh,tenkh) VALUE " . substr($value_pskt, 0, -1);
        $sql_chitiet_pskt = "insert into chitiet_pskt(mapskt,ngayhoadon,gtvnd1,mabp,bophan,mand1,noidung1,tkno1,tongtien,maloai,loaiphieu,sophieu) VALUE " . substr($value_chitiet_pskt, 0, -1);
        $tongtien911 = $tongco911 - ($tongno911 + $tongno6421 + $tongno6422 + $tongno811);
        $this->re_query($sql_pskt);
        $this->re_query($sql_chitiet_pskt);

        if ($tongtien911 < 0) {// Nếu tổng tiền tài khoản 911 < 0 thì bút toán phát sinh lỗ
            $this->re_query("update buttoanps set sotien=" . abs($tongtien911) . " where sott='" . $sottKCLOKD . "'");
            $this->re_query("update pskt set tongcong=" . abs($tongtien911) . " where mapskt=" . $sottKCLOKD . " and loaiphieu=66");
            $this->re_query("update chitiet_pskt set gtvnd1=" . abs($tongtien911) . ",tongtien='" . abs($tongtien911) . "' where mapskt=" . $sottKCLOKD . " and loaiphieu=66");

        } else { // nếu < 0 thì chia làm 2 1. thuế TNDN 2. lãi kinh doanh
            $thuetndn = ($tongtien911 * $phantramKCTNDN);
            $loinhuansauthue = $tongtien911 - $thuetndn;
            $this->re_query("update buttoanps set sotien=" . abs($thuetndn) . " where sott='" . $sottKCTNDN . "'");
            $this->re_query("update buttoanps set sotien=" . abs($loinhuansauthue) . " where sott='" . $sottKCLAKD . "'");
            $this->re_query("update buttoanps set sotien=" . abs($thuetndn) . " where sott='" . $sottKCTHDN . "'");

            $this->re_query("update pskt set tongcong=" . abs($thuetndn) . " where mapskt='" . $sottKCTNDN . "' and loaiphieu=66");
            $this->re_query("update chitiet_pskt set gtvnd1=" . abs($thuetndn) . ",tongtien='" . abs($thuetndn) . "' where mapskt='" . $sottKCTNDN . "' and loaiphieu=66");

            $this->re_query("update pskt set tongcong=" . abs($loinhuansauthue) . " where mapskt=" . $sottKCLAKD . " and loaiphieu=66");
            $this->re_query("update chitiet_pskt set gtvnd1=" . abs($loinhuansauthue) . ",tongtien='" . abs($loinhuansauthue) . "' where mapskt='" . $sottKCLAKD . "' and loaiphieu=66");

            $this->re_query("update pskt set tongcong=" . abs($thuetndn) . " where mapskt='" . $sottKCTHDN . "' and loaiphieu=66");
            $this->re_query("update chitiet_pskt set gtvnd1=" . abs($thuetndn) . ",tongtien='" . abs($thuetndn) . "' where mapskt='" . $sottKCTHDN . "' and loaiphieu=66");

        }

        //  Update tk 6421
        $this->re_query("update buttoanps set sotien=sotien+" . abs($tongno6421) . " where sott='" . $sottKCCPBH . "'");
        $this->re_query("update pskt set tongcong=tongcong+" . abs($tongno6421) . " where mapskt='" . $sottKCCPBH . "' and loaiphieu=66");
        $this->re_query("update chitiet_pskt set gtvnd1=gtvnd1+" . abs($tongno6421) . ",tongtien=tongtien+'" . abs($tongno6421) . "' where mapskt='" . $sottKCCPBH . "' and loaiphieu=66");

        //  Update tk 6422
        $this->re_query("update buttoanps set sotien=sotien+" . abs($tongno6422) . " where sott='" . $sottKCCPKD . "'");
        $this->re_query("update pskt set tongcong=tongcong+" . abs($tongno6422) . " where mapskt='" . $sottKCCPKD . "' and loaiphieu=66");
        $this->re_query("update chitiet_pskt set gtvnd1=gtvnd1+" . abs($tongno6422) . ",tongtien=tongtien+'" . abs($tongno6422) . "' where mapskt='" . $sottKCCPKD . "' and loaiphieu=66");

        //  Update tk 811
        $this->re_query("update buttoanps set sotien=sotien+" . abs($tongno811) . " where sott='" . $sottKCCPHD . "'");
        $this->re_query("update pskt set tongcong=tongcong+" . abs($tongno811) . " where mapskt='" . $sottKCCPHD . "' and loaiphieu=66");
        $this->re_query("update chitiet_pskt set gtvnd1=gtvnd1+" . abs($tongno811) . ",tongtien=tongtien+'" . abs($tongno811) . "' where mapskt='" . $sottKCCPHD . "' and loaiphieu=66");

        return $trees;
    }

    function load_danhsachbuttoan_phatsinh_va_thempskt_tt200($dataKetChuyen, $tungay, $denngay, $sophieu)
    {
        //debug($dataKetChuyen);
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = $this->get_orderby() . " and ";
        $sql = "SELECT * FROM buttoanps";
        $result = $this->re_query($sql);
        $i = 1;
        $value_sql_update = "";
        $sql_emp_pskt = "delete from pskt where loaiphieu='66' ";// xóa bút toán trong file pskt
        $this->re_query($sql_emp_pskt);

        $sql_emp_chitiet_pskt = "delete from chitiet_pskt where loaiphieu='66' "; // xóa bút toán trong file chitiet_pskt
        $this->re_query($sql_emp_chitiet_pskt);
        $tongco911 = 0;
        $tongno911 = 0;

        while ($dataCT = $this->re_fetch($result)) {
            $sophieu++;
            $i = $dataCT['sott'];
            $phantram = "phantram" . $dataCT['maso'];
            $sott = "sott" . $dataCT['maso'];
            $tudong = $dataCT['tudong'];

            $$sott = $dataCT['sott'];// Lấy sott làm biến
            $$phantram = $dataCT['phantram'];
            $sotien = abs($dataKetChuyen[$dataCT['tkchinh']][0]);
            $ngay = $denngay;
            if ($dataCT['maso'] == "KCLNNT" || $dataCT['maso'] == "KCLONT") {// nếu kết chuyễn nắm trước
                $sotien = 0;
                $ngay = $tungay;
                if ($dataCT['maso'] == "KCLNNT" && $dataKetChuyen[$dataCT['tkchinh']][1] > 0) {
                    $sotien = abs($dataKetChuyen[$dataCT['tkchinh']][1]);
                    $ngay = $tungay;
                }
                if ($dataCT['maso'] == "KCLONT" && $dataKetChuyen[$dataCT['tkchinh']][1] < 0) {
                    $sotien = abs($dataKetChuyen[$dataCT['tkchinh']][1]);
                    $ngay = $tungay;
                }
            }

            if ($dataCT['tkco'] == 911 && $tudong != "0") {
                $tongco911 += $sotien;
            }
            if ($dataCT['tkno'] == 911 && $tudong != "0") {
                $tongno911 += $sotien;
            }

            if ($dataCT['tkno'] == 6421 && $tudong != "0") {
                $tongno6421 += $sotien;
            }

            if ($dataCT['tkno'] == 6422 && $tudong != "0") {
                $tongno6422 += $sotien;
            }
            if ($dataCT['tkno'] == 6423 && $tudong != "0") {
                $tongno6423 += $sotien;
            }

            if ($dataCT['tkno'] == 6424 && $tudong != "0") {
                $tongno6424 += $sotien;
            }
            if ($dataCT['tkno'] == 6425 && $tudong != "0") {
                $tongno6425 += $sotien;
            }

            if ($dataCT['tkno'] == 6426 && $tudong != "0") {
                $tongno6426 += $sotien;
            }
            if ($dataCT['tkno'] == 6427 && $tudong != "0") {
                $tongno6427 += $sotien;
            }

            if ($dataCT['tkno'] == 6428 && $tudong != "0") {
                $tongno6428 += $sotien;
            }
            if ($dataCT['tkno'] == 6429 && $tudong != "0") {
                $tongno6429 += $sotien;
            }

            if ($dataCT['tkno'] == 6411 && $tudong != "0") {
                $tongno6411 += $sotien;
            }

            if ($dataCT['tkno'] == 6412 && $tudong != "0") {
                $tongno6412 += $sotien;
            }
            if ($dataCT['tkno'] == 6413 && $tudong != "0") {
                $tongno6413 += $sotien;
            }

            if ($dataCT['tkno'] == 6414 && $tudong != "0") {
                $tongno6414 += $sotien;
            }
            if ($dataCT['tkno'] == 6415 && $tudong != "0") {
                $tongno6415 += $sotien;
            }

            if ($dataCT['tkno'] == 6416 && $tudong != "0") {
                $tongno6416 += $sotien;
            }
            if ($dataCT['tkno'] == 6417 && $tudong != "0") {
                $tongno6417 += $sotien;
            }

            if ($dataCT['tkno'] == 6418 && $tudong != "0") {
                $tongno6418 += $sotien;
            }



            if ($dataCT['tkno'] == 811 && $tudong != "0") {
                $tongno811 += $sotien;
            }

            if ($tudong != "0") {
                {
                    $value_sql_update = "update buttoanps set sotien='" . $sotien . "' where sott='" . $dataCT['sott'] . "'";
                    $this->re_query($value_sql_update);
                    $value_pskt .= "('" . $sophieu . "','" . $i . "','" . $ngay . "','" . $dataCT['tkco'] . "','66','" . ($sotien) . "',NULL,''),";
                    $value_chitiet_pskt .= "('" . $i . "','" . $ngay . "','" . ($sotien) . "','0001','Toàn bộ','" . $dataCT['maso'] . "','" . $dataCT['noidung'] . "','" . $dataCT['tkno'] . "','" . ($sotien) . "','4','66','" . $sophieu . "'),";
                }
            }
        }
        $sql_pskt = "insert into pskt(sophieu,mapskt,ngayghiso,tkco,loaiphieu,tongcong,makh,tenkh) VALUE " . substr($value_pskt, 0, -1);
        $sql_chitiet_pskt = "insert into chitiet_pskt(mapskt,ngayhoadon,gtvnd1,mabp,bophan,mand1,noidung1,tkno1,tongtien,maloai,loaiphieu,sophieu) VALUE " . substr($value_chitiet_pskt, 0, -1);
        $tongtien911 = $tongco911 - ($tongno911 + $tongno6421 + $tongno6422+ $tongno6423 + $tongno6424+ $tongno6425 + $tongno6426+ $tongno6427 + $tongno6428+ $tongno6429+ $tongno6411 + $tongno6412+ $tongno6413 + $tongno6414+ $tongno6415 + $tongno6416+ $tongno6417 + $tongno6418 + $tongno811);
        $this->re_query($sql_pskt);
        $this->re_query($sql_chitiet_pskt);

        if ($tongtien911 < 0) {// Nếu tổng tiền tài khoản 911 < 0 thì bút toán phát sinh lỗ
            $this->re_query("update buttoanps set sotien=" . abs($tongtien911) . " where sott='" . $sottKCLOKD . "'");
            $this->re_query("update pskt set tongcong=" . abs($tongtien911) . " where mapskt=" . $sottKCLOKD . " and loaiphieu=66");
            $this->re_query("update chitiet_pskt set gtvnd1=" . abs($tongtien911) . ",tongtien='" . abs($tongtien911) . "' where mapskt=" . $sottKCLOKD . " and loaiphieu=66");

        } else { // nếu < 0 thì chia làm 2 1. thuế TNDN 2. lãi kinh doanh
            $thuetndn = ($tongtien911 * $phantramKCTNDN);
            $loinhuansauthue = $tongtien911 - $thuetndn;
            $this->re_query("update buttoanps set sotien=" . abs($thuetndn) . " where sott='" . $sottKCTNDN . "'");
            $this->re_query("update buttoanps set sotien=" . abs($loinhuansauthue) . " where sott='" . $sottKCLAKD . "'");
            $this->re_query("update buttoanps set sotien=" . abs($thuetndn) . " where sott='" . $sottKCTHDN . "'");

            $this->re_query("update pskt set tongcong=" . abs($thuetndn) . " where mapskt='" . $sottKCTNDN . "' and loaiphieu=66");
            $this->re_query("update chitiet_pskt set gtvnd1=" . abs($thuetndn) . ",tongtien='" . abs($thuetndn) . "' where mapskt='" . $sottKCTNDN . "' and loaiphieu=66");

            $this->re_query("update pskt set tongcong=" . abs($loinhuansauthue) . " where mapskt=" . $sottKCLAKD . " and loaiphieu=66");
            $this->re_query("update chitiet_pskt set gtvnd1=" . abs($loinhuansauthue) . ",tongtien='" . abs($loinhuansauthue) . "' where mapskt='" . $sottKCLAKD . "' and loaiphieu=66");

            $this->re_query("update pskt set tongcong=" . abs($thuetndn) . " where mapskt='" . $sottKCTHDN . "' and loaiphieu=66");
            $this->re_query("update chitiet_pskt set gtvnd1=" . abs($thuetndn) . ",tongtien='" . abs($thuetndn) . "' where mapskt='" . $sottKCTHDN . "' and loaiphieu=66");

        }

        //  Update tk 6421
        $this->re_query("update buttoanps set sotien=sotien+" . abs($tongno6421) . " where sott='" . $sottKCCPBH . "'");
        $this->re_query("update pskt set tongcong=tongcong+" . abs($tongno6421) . " where mapskt='" . $sottKCCPBH . "' and loaiphieu=66");
        $this->re_query("update chitiet_pskt set gtvnd1=gtvnd1+" . abs($tongno6421) . ",tongtien=tongtien+'" . abs($tongno6421) . "' where mapskt='" . $sottKCCPBH . "' and loaiphieu=66");

        //  Update tk 6422
        $this->re_query("update buttoanps set sotien=sotien+" . abs($tongno6422) . " where sott='" . $sottKCCPKD . "'");
        $this->re_query("update pskt set tongcong=tongcong+" . abs($tongno6422) . " where mapskt='" . $sottKCCPKD . "' and loaiphieu=66");
        $this->re_query("update chitiet_pskt set gtvnd1=gtvnd1+" . abs($tongno6422) . ",tongtien=tongtien+'" . abs($tongno6422) . "' where mapskt='" . $sottKCCPKD . "' and loaiphieu=66");

        //  Update tk 6421
        $this->re_query("update buttoanps set sotien=sotien+" . abs($tongno6423) . " where sott='" . $sottKC6423 . "'");
        $this->re_query("update pskt set tongcong=tongcong+" . abs($tongno6423) . " where mapskt='" . $sottKC6423 . "' and loaiphieu=66");
        $this->re_query("update chitiet_pskt set gtvnd1=gtvnd1+" . abs($tongno6423) . ",tongtien=tongtien+'" . abs($tongno6423) . "' where mapskt='" . $sottKC6423 . "' and loaiphieu=66");

        //  Update tk 6421
        $this->re_query("update buttoanps set sotien=sotien+" . abs($tongno6424) . " where sott='" . $sottKC6424 . "'");
        $this->re_query("update pskt set tongcong=tongcong+" . abs($tongno6424) . " where mapskt='" . $sottKC6424 . "' and loaiphieu=66");
        $this->re_query("update chitiet_pskt set gtvnd1=gtvnd1+" . abs($tongno6424) . ",tongtien=tongtien+'" . abs($tongno6424) . "' where mapskt='" . $sottKC6424 . "' and loaiphieu=66");

        //  Update tk 6421
        $this->re_query("update buttoanps set sotien=sotien+" . abs($tongno6425) . " where sott='" . $sottKC6425 . "'");
        $this->re_query("update pskt set tongcong=tongcong+" . abs($tongno6425) . " where mapskt='" . $sottKC645 . "' and loaiphieu=66");
        $this->re_query("update chitiet_pskt set gtvnd1=gtvnd1+" . abs($tongno6425) . ",tongtien=tongtien+'" . abs($tongno6425) . "' where mapskt='" . $sottKC6425 . "' and loaiphieu=66");

        //  Update tk 6421
        $this->re_query("update buttoanps set sotien=sotien+" . abs($tongno6426) . " where sott='" . $sottKC6426 . "'");
        $this->re_query("update pskt set tongcong=tongcong+" . abs($tongno6426) . " where mapskt='" . $sottKC6426 . "' and loaiphieu=66");
        $this->re_query("update chitiet_pskt set gtvnd1=gtvnd1+" . abs($tongno6426) . ",tongtien=tongtien+'" . abs($tongno6426) . "' where mapskt='" . $sottKC6426 . "' and loaiphieu=66");

        //  Update tk 6421
        $this->re_query("update buttoanps set sotien=sotien+" . abs($tongno6427) . " where sott='" . $sottKC6427 . "'");
        $this->re_query("update pskt set tongcong=tongcong+" . abs($tongno6427) . " where mapskt='" . $sottKC647 . "' and loaiphieu=66");
        $this->re_query("update chitiet_pskt set gtvnd1=gtvnd1+" . abs($tongno6427) . ",tongtien=tongtien+'" . abs($tongno6427) . "' where mapskt='" . $sottKC6427 . "' and loaiphieu=66");

        //  Update tk 6421
        $this->re_query("update buttoanps set sotien=sotien+" . abs($tongno6428) . " where sott='" . $sottKC6428 . "'");
        $this->re_query("update pskt set tongcong=tongcong+" . abs($tongno6428) . " where mapskt='" . $sottKC6428 . "' and loaiphieu=66");
        $this->re_query("update chitiet_pskt set gtvnd1=gtvnd1+" . abs($tongno6428) . ",tongtien=tongtien+'" . abs($tongno6428) . "' where mapskt='" . $sottKC6428 . "' and loaiphieu=66");

        //  Update tk 6421
        $this->re_query("update buttoanps set sotien=sotien+" . abs($tongno6429) . " where sott='" . $sottKC6429 . "'");
        $this->re_query("update pskt set tongcong=tongcong+" . abs($tongno6429) . " where mapskt='" . $sottKC6429 . "' and loaiphieu=66");
        $this->re_query("update chitiet_pskt set gtvnd1=gtvnd1+" . abs($tongno6429) . ",tongtien=tongtien+'" . abs($tongno6429) . "' where mapskt='" . $sottKC6429 . "' and loaiphieu=66");

        //  Update tk 6421
        $this->re_query("update buttoanps set sotien=sotien+" . abs($tongno6411) . " where sott='" . $sottKC6411 . "'");
        $this->re_query("update pskt set tongcong=tongcong+" . abs($tongno6411) . " where mapskt='" . $sottKC6411 . "' and loaiphieu=66");
        $this->re_query("update chitiet_pskt set gtvnd1=gtvnd1+" . abs($tongno6411) . ",tongtien=tongtien+'" . abs($tongno6411) . "' where mapskt='" . $sottKC6411 . "' and loaiphieu=66");

        //  Update tk 6422
        $this->re_query("update buttoanps set sotien=sotien+" . abs($tongno6412) . " where sott='" . $sottKC6412 . "'");
        $this->re_query("update pskt set tongcong=tongcong+" . abs($tongno6412) . " where mapskt='" . $sottKC6412 . "' and loaiphieu=66");
        $this->re_query("update chitiet_pskt set gtvnd1=gtvnd1+" . abs($tongno6412) . ",tongtien=tongtien+'" . abs($tongno6412) . "' where mapskt='" . $sottKC6412 . "' and loaiphieu=66");

        //  Update tk 6421
        $this->re_query("update buttoanps set sotien=sotien+" . abs($tongno6413) . " where sott='" . $sottKC6413 . "'");
        $this->re_query("update pskt set tongcong=tongcong+" . abs($tongno6413) . " where mapskt='" . $sottKC6413 . "' and loaiphieu=66");
        $this->re_query("update chitiet_pskt set gtvnd1=gtvnd1+" . abs($tongno6413) . ",tongtien=tongtien+'" . abs($tongno6413) . "' where mapskt='" . $sottKC6413 . "' and loaiphieu=66");

        //  Update tk 6421
        $this->re_query("update buttoanps set sotien=sotien+" . abs($tongno6414) . " where sott='" . $sottKC6414 . "'");
        $this->re_query("update pskt set tongcong=tongcong+" . abs($tongno6414) . " where mapskt='" . $sottKC6414 . "' and loaiphieu=66");
        $this->re_query("update chitiet_pskt set gtvnd1=gtvnd1+" . abs($tongno6414) . ",tongtien=tongtien+'" . abs($tongno6414) . "' where mapskt='" . $sottKC6414 . "' and loaiphieu=66");

        //  Update tk 6421
        $this->re_query("update buttoanps set sotien=sotien+" . abs($tongno6415) . " where sott='" . $sottKC6415 . "'");
        $this->re_query("update pskt set tongcong=tongcong+" . abs($tongno6415) . " where mapskt='" . $sottKC615 . "' and loaiphieu=66");
        $this->re_query("update chitiet_pskt set gtvnd1=gtvnd1+" . abs($tongno6415) . ",tongtien=tongtien+'" . abs($tongno6415) . "' where mapskt='" . $sottKC6415 . "' and loaiphieu=66");

        //  Update tk 6421
        $this->re_query("update buttoanps set sotien=sotien+" . abs($tongno6416) . " where sott='" . $sottKC6416 . "'");
        $this->re_query("update pskt set tongcong=tongcong+" . abs($tongno6416) . " where mapskt='" . $sottKC6416 . "' and loaiphieu=66");
        $this->re_query("update chitiet_pskt set gtvnd1=gtvnd1+" . abs($tongno6416) . ",tongtien=tongtien+'" . abs($tongno6416) . "' where mapskt='" . $sottKC6416 . "' and loaiphieu=66");

        //  Update tk 6421
        $this->re_query("update buttoanps set sotien=sotien+" . abs($tongno6417) . " where sott='" . $sottKC6417 . "'");
        $this->re_query("update pskt set tongcong=tongcong+" . abs($tongno6417) . " where mapskt='" . $sottKC6417 . "' and loaiphieu=66");
        $this->re_query("update chitiet_pskt set gtvnd1=gtvnd1+" . abs($tongno6417) . ",tongtien=tongtien+'" . abs($tongno6417) . "' where mapskt='" . $sottKC6417 . "' and loaiphieu=66");

        //  Update tk 6421
        $this->re_query("update buttoanps set sotien=sotien+" . abs($tongno6418) . " where sott='" . $sottKC6418 . "'");
        $this->re_query("update pskt set tongcong=tongcong+" . abs($tongno6418) . " where mapskt='" . $sottKC6418 . "' and loaiphieu=66");
        $this->re_query("update chitiet_pskt set gtvnd1=gtvnd1+" . abs($tongno6418) . ",tongtien=tongtien+'" . abs($tongno6418) . "' where mapskt='" . $sottKC6418 . "' and loaiphieu=66");

        //  Update tk 811
        $this->re_query("update buttoanps set sotien=sotien+" . abs($tongno811) . " where sott='" . $sottKCCPHD . "'");
        $this->re_query("update pskt set tongcong=tongcong+" . abs($tongno811) . " where mapskt='" . $sottKCCPHD . "' and loaiphieu=66");
        $this->re_query("update chitiet_pskt set gtvnd1=gtvnd1+" . abs($tongno811) . ",tongtien=tongtien+'" . abs($tongno811) . "' where mapskt='" . $sottKCCPHD . "' and loaiphieu=66");

        return $trees;
    }

////////////////////////////////End bút toán phát sinh
    public
    function SumSoTienBTPS()
    {
        $sql = "select sum(sotien) as sotien from buttoanps";
        $this->query($sql);
        $data = $this->fetch();
        return $data['sotien'];
    }

    public
    function SumSoTienPLXDKQKD()
    {
        $sql = "select sum(sotien) as sotien from tokhaitndn where loaitokhai='PLKQKD'";
        $this->query($sql);
        $data = $this->fetch();
        return $data['sotien'];
    }

    public
    function SumSoTienTNDN()
    {
        $sql = "select sum(sotien) as sotien from tokhaitndn where loaitokhai='TNDN'";
        $this->query($sql);
        $data = $this->fetch();
        return $data['sotien'];
    }

    public
    function SumSoTienKQKD($Quy)
    {
        $sql = "select sum(namnay) as sotien from tmp_kqhdkd where quy='" . $Quy . "'";
        $this->query($sql);
        $data = $this->fetch();
        return $data['sotien'];
    }

    function xoasotien_kcps()
    {
        $sql = "update buttoanps set sotien='0'";
        $this->query($sql);
    }

    function xoabuttoan_ps()
    {
        $sql = "delete from pskt where loaiphieu=66";
        $sql1 = "delete from chitiet_pskt where loaiphieu=66";
        $this->query($sql);
        $this->query($sql1);
    }

    function xoabtps($stt)
    {
        $sql = "delete from buttoanps where sott='" . $stt . "'";
        $this->query($sql);
    }

    public
    function checkKeyBTPSTrung($maso, $sott)
    {
        $sql = "select * from buttoanps where maso='" . $maso . "' and sott!='" . $sott . "'";
        $this->query($sql);
        if ($this->num_rows() >= 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function thembtps($sott, $maso, $noidung, $tkchinh, $tkno, $tkco, $phantram, $mabp)
    {
        $sql = "insert into buttoanps(sott,maso,noidung,tkchinh,tkno,tkco,phantram,mabp) values('" . $sott . "','" . $maso . "','" . $noidung . "','" . $tkchinh . "','" . $tkno . "','" . $tkco . "','" . $phantram . "','" . $mabp . "')";
        $this->query($sql);
    }

    function suabtps($sott, $maso, $noidung, $tkchinh, $tkno, $tkco, $phantram, $mabp, $tudong)
    {
        $sql = "update buttoanps set
									noidung='" . $noidung . "',
									tkchinh='" . $tkchinh . "',
									tkno='" . $tkno . "',
									tkco='" . $tkco . "',
									phantram='" . $phantram . "',
									mabp='" . $mabp . "',
									tudong='" . $tudong . "'
									where sott='" . $sott . "'";
        $this->query($sql);
    }

    public
    function createSoTTBTPS()
    {
        $sql = "select max(sott) as sott from buttoanps";
        $this->query($sql);
        if ($this->num_rows() == 1) {
            $data = $this->fetch();
            return $data['sott'] + 1;
        } else {
            return 1;
        }
    }

    public function load_danhsach_thuno_chuyenkhoan_cuakhachhang()// Lấy tất cả phiếu thu của khách hàng để tính lương khoáng cho nhân viên
    {
        $sql = "SELECT pskt.sophieu,ngayghiso,chitiet_pskt.ngayhoadon,chitiet_pskt.tkno1 as tk,pskt.makh,chitiet_pskt.gtvnd1 as psco,makh_nh,pskt.loaiphieu,chitiet_pskt.sotiennt as pscont FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where pskt.loaiphieu in(1,5,7,9,11,13,15,17,19,21,23,25,27,29,31,33,35,37,39,41,43,45,47,49,51,53,55,57,59,61,63,65,67,69,71,73,75,77,79,81,83,85,87,89) and mabp!=''  " . $this->getStrOderby() . "
            union all
                SELECT pskt.sophieu,ngayghiso,chitiet_pskt.ngayhoadon,chitiet_pskt.tkno2 as tk,pskt.makh,chitiet_pskt.gtvnd2 as psco,makh_nh,pskt.loaiphieu,chitiet_pskt.sotiennt1 as pscont FROM pskt INNER JOIN chitiet_pskt on(pskt.sophieu=chitiet_pskt.sophieu) where pskt.loaiphieu in(1,5,7,9,11,13,15,17,19,21,23,25,27,29,31,33,35,37,39,41,43,45,47,49,51,53,55,57,59,61,63,65,67,69,71,73,75,77,79,81,83,85,87,89) and mabp!=''  " . $this->getStrOderby3();

        $this->query($sql);

        $row = array();
        if ($this->num_rows() == 0) {
            return FALSE;
        } else {
            $i = 0;
            while ($data = $this->fetch()) {
                if ($data['loaiphieu'] == 3 || $data['loaiphieu'] == 4) {
                    if (trim($data['makh']) == trim($data['makh_nh']) || trim($data['makh_nh']) == "") {
                        $ma = $data['makh'];
                    } else {
                        if ($data['loaiphieu'] == 3) {
                            $ma = $data['makh_nh'];
                        } else {
                            $ma = $data['makh'];
                        }
                    }
                } else {
                    $ma = $data['makh'];
                }
                $tongpsno = $data['psno'] + $row[$ma]['psno'];
                $tongpsnont = $data['psnont'] + $row[$ma]['psnont'];
                $row[$ma] = $data;
                $row[$ma]['psno'] = $tongpsno;
                $row[$ma]['psnont'] = $tongpsnont;

            }
            return $row;
        }
    }

    function load_danhsach_phancap_thu_nokhachhang($dataIN)
    {

        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = $this->get_orderby() . " and ";
        $sql = "SELECT makh,tenkh,makhcha from makh where makhcha='0'";
        $result = $this->re_query($sql);
        $i = 1;

        while ($data = $this->re_fetch($result)) {
            $data['STT'] = $i;
            $data['CAP'] = 1;
            $trees[$data['makh']] = $data;

            $i++;
            $sql1 = "SELECT makh,tenkh,makhcha from makh where makhcha='{$data['makh']}'";
            $query = $this->re_query($sql1);
            $tongcops1 = 0;
            while ($data1 = $this->re_fetch($query)) {

                $data1['STT'] = $i;
                $data1['CAP'] = 2;
                $tongcops1 += $dataIN[$data1['makh']]['psco'];
                //$trees[$data1['makh']] = $data1;
                $i++;
                $sql2 = "SELECT makh,tenkh,makhcha from makh where makhcha='{$data1['makh']}'";
                $query1 = $this->re_query($sql2);

                $tongcops2 = 0;

                while ($data2 = $this->re_fetch($query1)) {

                    $data2['STT'] = $i;
                    $data2['CAP'] = 3;
                    $data2['soducops'] = $dataIN[$data2['makh']]['psco'];
                    $tongcops2 += $dataIN[$data2['makh']]['psco'];
                    //$trees[$data2['makh']] = $data2;
                }

                //$trees[$data1['makh']]['soducops'] = $dataIN[$data1['makh']]['psco']+$tongcops2;
            }
            $trees[$data['makh']]['soducops'] = $dataIN[$data['makh']]['psco'] + $tongcops1;

        }
        return $trees;
    }

    function kiemtra_tonghop_chitiet_nhapxuatkho()
    {
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = $this->get_orderby();
        $sql = "SELECT psvt.mapskt,sct,sum(chitiet_psvt.thanhtien) as thanhtienct,(psvt.tienhang) as thanhtienth,chitiet_psvt.sophieu,loaiphieu FROM `chitiet_psvt` INNER JOIN psvt on (chitiet_psvt.sophieu = psvt.sophieu) WHERE loaiphieu!=3 GROUP by psvt.sophieu HAVING thanhtienct!=thanhtienth order by psvt.sophieu";
        $this->query($sql);
        while ($data = $this->fetch()) {
            $trees[] = $data;
        }
        return $trees;
    }
    function load_danhsach_bangno_khachhang_dk_tt200()
    {
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = $this->get_orderby();
        $sql = "SELECT sum(sdkno) as nodk,sum(sdkco) as codk,matk,phanloai FROM sdcn group by matk,phanloai ";
        $result = $this->re_query($sql);
        $i = 1;
        while ($data = $this->re_fetch($result)) {
            $i++;
            if($data['matk']=='131' || $data['matk']=='331' || $data['matk']=='1388' || $data['matk']=='3388'){
                $trees[$data['matk']][$data['phanloai']] = $data;
            }else{
                $tmp = $data ['nodk']-$data ['codk'];
                if($tmp>0){
                    $data ['nodk'] = abs($tmp);
                    $data ['codk'] = 0;
                }else{
                    $data ['nodk'] = 0;
                    $data ['codk'] = abs($tmp);
                }
                $trees[$data['matk']][$data['phanloai']] = $data;
            }
        }
        return $trees;
    }
}


?>