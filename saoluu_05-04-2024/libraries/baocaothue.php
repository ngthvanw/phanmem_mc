<?php

class baocaothue extends database
{
    public $denngay;
    public $intheothuesuat;
    public $intheochungtu;
    public $sapxeptheohoadon;
    public $theothongtu;
    public $kieuin;
    public $str_Oderby;
    public $str_Oderby2;
    public $tringorder;

    public function set_orderby($string)
    {
        $this->tringorder = $string;
    }

    public function get_orderby()
    {
        return $this->tringorder;
    }
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

    public function load_danhsach_banra($ListKHCHa,$sapxeptheohoadon,$loaibangke)
    {
        if($loaibangke==""){
            $loaibangke=1;
        }
        if($loaibangke=="ALL"){
            $Str_loaitokhai = "";
            $Str_loaitokhai_psvt = "";
        }else{
            $Str_loaitokhai =" and loaitokhai='".$loaibangke."'";
            $Str_loaitokhai_psvt =" and psvt.loaitokhai='".$loaibangke."'";
        }
        $sql = " SELECT seri,sct,ngayhoadon,ngayghiso,tenkh,masothue,tenvt,thanhtien,thue,chuthich,psvt.mapskt,psvt.makh,100 loaiphieu,thuesuat from psvt inner join chitiet_psvt on (psvt.sophieu=chitiet_psvt.sophieu) where loaiphieu=2 {$Str_loaitokhai_psvt} " . $this->getStrOderby() . "
         union all
         SELECT seri,sct,ngayhoadon,ngayghiso,tenkh,masothue,chitiet_pskt.noidung1 as tenvt,gtvnd1 as thanhtien,gtvnd2 as thue,chuthich,pskt.mapskt,pskt.makh,pskt.loaiphieu,thuesuat1 as thuesuat from pskt inner join chitiet_pskt on (pskt.sophieu=chitiet_pskt.sophieu) left join mand on (chitiet_pskt.mand1=mand.mand) where ((pskt.loaiphieu in(1,3,5,7,9,11,13,15,17,19,21,23,25,27,29,31,33,35,37,39,41,43,45,47,49,51,53,55,57,59,61,63,91))) {$Str_loaitokhai} " . $this->getStrOderby2() . " 
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

    public function load_danhsach_banra_group($ListKHCHa,$sapxeptheohoadon,$loaibangke)
    {
        if($loaibangke==""){
            $loaibangke=1;
        }
        if($loaibangke=="ALL"){
            $Str_loaitokhai = "";
            $Str_loaitokhai_psvt = "";
        }else{
            $Str_loaitokhai =" and loaitokhai='".$loaibangke."'";
            $Str_loaitokhai_psvt =" and psvt.loaitokhai='".$loaibangke."'";
        }
        $sql = " SELECT seri,sct,ngayhoadon,ngayghiso,tenkh,masothue,tenvt,sum(thanhtien) as thanhtien,sum(thue) as thue,chuthich,psvt.mapskt,psvt.makh,100 loaiphieu,thuesuat from psvt inner join chitiet_psvt on (psvt.sophieu=chitiet_psvt.sophieu) where loaiphieu=2 {$Str_loaitokhai_psvt} " . $this->getStrOderby() . " group by chitiet_psvt.sophieu,sct,seri,makh,loaiphieu 
         union all
         SELECT seri,sct,ngayhoadon,ngayghiso,tenkh,masothue,chitiet_pskt.noidung1 as tenvt,sum(gtvnd1) as thanhtien,sum(gtvnd2) as thue,chuthich,pskt.mapskt,pskt.makh,pskt.loaiphieu,thuesuat1 as thuesuat from pskt inner join chitiet_pskt on (pskt.sophieu=chitiet_pskt.sophieu) left join mand on (chitiet_pskt.mand1=mand.mand) where pskt.loaiphieu in(1,3,5,7,9,11,13,15,17,19,21,23,25,27,29,31,33,35,37,39,41,43,45,47,49,51,53,55,57,59,61,63,91) {$Str_loaitokhai} " . $this->getStrOderby2() . " group by chitiet_pskt.sophieu,sct,seri,pskt.makh,pskt.loaiphieu 
         union all
         SELECT seri,sct,ngayhoadon,ngayghiso,tenkh,masothue,chitiet_pskt.noidung1 as tenvt,(sum(gtvnd1)) as thanhtien,(sum(gtvnd2)) as thue,chuthich,pskt.mapskt,pskt.makh,pskt.loaiphieu, thuesuat1 as thuesuat from pskt inner join chitiet_pskt on (pskt.sophieu=chitiet_pskt.sophieu) left join mand on (chitiet_pskt.mand1=mand.mand) where pskt.loaiphieu in(2,4,6,8,10,12,14,16,18,20,22,24,26,28,30,32,34,36,38,40,42,44,46,48,50,52,54,56,58,60,62,64,70) and pskt.tkco in('33311') {$Str_loaitokhai} " . $this->getStrOderby2() . " group by chitiet_pskt.sophieu,sct,seri,pskt.makh,pskt.loaiphieu         
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
                  SELECT seri,sct,ngayhoadon,ngayghiso,tenkh,masothue,chitiet_pskt.noidung1 as tenvt,sum(gtvnd1) as thanhtien,sum(gtvnd2) as thue,chuthich,pskt.mapskt,pskt.makh from pskt inner join chitiet_pskt on (pskt.sophieu=chitiet_pskt.sophieu) where pskt.loaiphieu in(1,3,5,7,9,11,13,15,17,19,21,23,25,27,29,31,33,35,37,39,41,43,45,47,49,51,53,55,57,59,61,63,91) and maloai =1 and loaitokhai=0 " . $this->getStrOderby2() . " group by chitiet_pskt.sophieu,sct,seri,pskt.makh,pskt.loaiphieu 
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

    public function load_danhsach_banra_bosung_group_PPTT($ListKHCHa,$sapxeptheohoadon)
    {
        $sql = " SELECT seri,sct,ngayhoadon,ngayghiso,tenkh,masothue,tenvt,sum(thanhtien) as thanhtien,sum(thue) as thue,chuthich,psvt.mapskt,psvt.makh from psvt inner join chitiet_psvt on (psvt.sophieu=chitiet_psvt.sophieu) where loaiphieu=2 and psvt.loaitokhai=0  " . $this->getStrOderby() . " group by chitiet_psvt.sophieu,sct,seri,makh,loaiphieu
                union all
                  SELECT seri,sct,ngayhoadon,ngayghiso,tenkh,masothue,chitiet_pskt.noidung1 as tenvt,sum(gtvnd1) as thanhtien,sum(gtvnd2) as thue,chuthich,pskt.mapskt,pskt.makh from pskt inner join chitiet_pskt on (pskt.sophieu=chitiet_pskt.sophieu) where pskt.loaiphieu in(1,3,5,7,9,11,13,15,17,19,21,23,25,27,29,31,33,35,37,39,41,43,45,47,49,51,53,55,57,59,61,63,91) and loaitokhai=0 " . $this->getStrOderby2() . " group by chitiet_pskt.sophieu,sct,seri,pskt.makh,pskt.loaiphieu 
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
        $sql = " SELECT seri,sct,ngayhoadon as ngayghiso,tenkh,masothue,chitiet_pskt.noidung1 as tenvt,sum(gtvnd1) as thanhtien,sum(gtvnd2) as thue,chuthich,pskt.mapskt,pskt.makh from pskt inner join chitiet_pskt on (pskt.sophieu=chitiet_pskt.sophieu) where (pskt.loaiphieu in(1,3,5,7,9,11,13,15,17,19,21,23,25,27,29,31,33,35,37,39,41,43,45,47,49,51,53,55,57,59,61,63,91) or (pskt.loaiphieu in(2,4,6,8,10,12,14,16,18,20,22,24,26,28,30,32,34,36,38,40,42,44,46,48,50,52,54,56,58,60,62,64,70) and pskt.tkco = '33311') ) and maloai =1 " . $this->getStrOderby2() . " group by chitiet_pskt.sophieu,sct,seri,pskt.makh order by ngayghiso,sct ";
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

    public function load_danhsach_muavao($SapXep,$ListKHCHa,$loaibangke)
    {
        if($loaibangke==""){
            $loaibangke=1;
        }
        if($loaibangke=="ALL"){
            $Str_loaitokhai = "";
        }else{
            $Str_loaitokhai =" and loaitokhai='".$loaibangke."'";
        }
        $sql = "SELECT seri,sct,ngayhoadon,ngayghiso,tenkh,thuesuat,masothue,tenvt,thanhtien, thue,chuthich,psvt.mapskt,ngaythanhtoan,psvt.makh,loaihanghoadichvu,100 loaiphieu,dvt,soluongnhap,donggianhap from psvt inner join chitiet_psvt on (psvt.sophieu=chitiet_psvt.sophieu) where loaiphieu=1 {$Str_loaitokhai} " . $this->getStrOderby() . " 
              union all
                SELECT seri,sct,ngayhoadon,ngayghiso,pskt.tenkh,thuesuat1 as thuesuat,masothue,chitiet_pskt.noidung1 as tenvt,gtvnd1 as thanhtien,gtvnd2 as thue,chuthich,pskt.mapskt,ngaythanhtoan,pskt.makh,loaihanghoadichvu,pskt.loaiphieu,'' as dvt,'' as soluongnhap,'' as donggianhap from pskt inner join chitiet_pskt on (pskt.sophieu=chitiet_pskt.sophieu) where pskt.loaiphieu in(2,4,6,8,10,12,14,16,18,20,22,24,26,28,30,32,34,36,38,40,42,44,46,48,50,52,54,56,58,60,62,64,70) {$Str_loaitokhai} " . $this->getStrOderby2() . "  
              union all
                SELECT seri,sct,ngayhoadon,ngayghiso,pskt.tenkh,thuesuat1 as thuesuat,masothue,chitiet_pskt.noidung1 as tenvt,(gtvnd1) as thanhtien,(gtvnd2) as thue,chuthich,pskt.mapskt,ngaythanhtoan,pskt.makh,loaihanghoadichvu,pskt.loaiphieu,'' as dvt,'' as soluongnhap,'' as donggianhap from pskt inner join chitiet_pskt on (pskt.sophieu=chitiet_pskt.sophieu) where ((pskt.loaiphieu in(1,3,5,7,9,11,13,15,17,19,21,23,25,27,29,31,33,35,37,39,41,43,45,47,49,51,53,55,57,59,61,63,91) and chitiet_pskt.tkno2 in ('1331','1332'))) {$Str_loaitokhai} " . $this->getStrOderby2() . "             
              order by " . $SapXep . ",sct ";
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

    public function load_danhsach_muavao_group($SapXep,$ListKHCHa,$loaibangke)
    {
        if($loaibangke==""){
            $loaibangke=1;
        }
        if($loaibangke=="ALL"){
            $Str_loaitokhai = "";
            $Str_loaitokhai_psvt = "";
        }else{
            $Str_loaitokhai =" and loaitokhai='".$loaibangke."'";
            $Str_loaitokhai_psvt =" and psvt.loaitokhai='".$loaibangke."'";
        }
       $sql = " SELECT seri,sct,ngayhoadon,ngayghiso,tenkh,thuesuat,masothue,tenvt,sum(thanhtien) as thanhtien,sum(thue) as thue,chuthich,psvt.mapskt,ngaythanhtoan,psvt.makh,'1331' as matkthue,psvt.sophieu,loaihanghoadichvu,dvt,sum(soluongnhap) as soluongnhap, sum(donggianhap) as donggianhap from psvt inner join chitiet_psvt on (psvt.sophieu=chitiet_psvt.sophieu) where loaiphieu=1 {$Str_loaitokhai_psvt} " . $this->getStrOderby() . " group by chitiet_psvt.sophieu,sct,seri,makh,loaiphieu order by $SapXep ";
        $this->query($sql);
        if ($this->num_rows() == 0) {
            return FALSE;
        } else {
            $i = 0;
            while ($data = $this->fetch()) {
                $i++;
                $data['timengayghi'] = strtotime($data['ngayghiso']) + $i;
                $data['tkco'] = $this->TKCoDinhKhoan($data['sophieu']);
                if($ListKHCHa!=""){
                    $data['tenkh'] = $ListKHCHa[$data['makh']]['tenkh'];
                    $data['masothue'] = $ListKHCHa[$data['makh']]['masothue'];
                }
                $row[] = $data;
            }
            return $row;
        }
    }

    public function load_danhsach_muavao_group_kiemtra_nganhang($SapXep,$ListKHCHa)
    {
        $sql = " SELECT seri,sct,ngayhoadon,ngayghiso,tenkh,thuesuat,masothue,tenvt,sum(thanhtien) as thanhtien,sum(thue) as thue,chuthich,psvt.mapskt,ngaythanhtoan,psvt.makh,'1331' as matkthue,psvt.sophieu from psvt inner join chitiet_psvt on (psvt.sophieu=chitiet_psvt.sophieu) where loaiphieu=1 and maloai in (1,2) and psvt.loaitokhai!=0  " . $this->getStrOderby() . " group by chitiet_psvt.sophieu,sct,seri,makh,loaiphieu order by $SapXep ";
        $this->query($sql);
        if ($this->num_rows() == 0) {
            return FALSE;
        } else {
            $i = 0;
            while ($data = $this->fetch()) {
                $i++;
                $data['timengayghi'] = strtotime($data['ngayghiso']) + $i;
                $data['tkco'] = $this->TKCoDinhKhoan($data['sophieu']);
                if($ListKHCHa!=""){
                    $data['tenkh'] = $ListKHCHa[$data['makh']]['tenkh'];
                    $data['masothue'] = $ListKHCHa[$data['makh']]['masothue'];
                }
                $row[] = $data;
            }
            return $row;
        }
    }

    public function kiemtra_khachkhang_vuot20trieu()
    {
        $sql = "select sum(thanhtien+thue) as tongtien,tmp_bangke_daura.* from tmp_bangke_daura WHERE tkco = '1111' GROUP BY ngayhoadon,makh";
        $this->query($sql);
        if ($this->num_rows() == 0) {
            return FALSE;
        } else {
            $i = 0;
            while ($data = $this->fetch()) {
                $i++;
                $row[] = $data;
            }
            return $row;
        }
    }

    public function load_danhsach_buttoan_phatsinh()
    {
        $sql = " SELECT * from buttoanps ";
        $this->query($sql);
        if ($this->num_rows() == 0) {
            return FALSE;
        } else {
            $i = 0;
            while ($data = $this->fetch()) {
                $row[] = $data;
            }
            return $row;
        }
    }

    public function load_danhsach_buttoan_phatsinh_cokeylama()
    {
        $sql = " SELECT * from buttoanps ";
        $this->query($sql);
        if ($this->num_rows() == 0) {
            return FALSE;
        } else {
            $i = 0;
            while ($data = $this->fetch()) {
                $row[$data['maso']] = $data;
            }
            return $row;
        }
    }

    public function load_danhsach_muavao2_group($SapXep,$ListKHCHa,$loaibangke)
    {
        if($loaibangke==""){
            $loaibangke=1;
        }
        if($loaibangke=="ALL"){
            $Str_loaitokhai = "";
            $Str_loaitokhai_psvt = "";
        }else{
            $Str_loaitokhai =" and loaitokhai='".$loaibangke."'";
            $Str_loaitokhai_psvt =" and psvt.loaitokhai='".$loaibangke."'";
        }
        $sql = " 
                SELECT seri,sct,ngayhoadon,ngayghiso,pskt.tenkh,thuesuat1 as thuesuat,masothue,chitiet_pskt.noidung1 as tenvt,sum(gtvnd1) as thanhtien,sum(gtvnd2) as thue,chuthich,pskt.mapskt,ngaythanhtoan,pskt.makh,chitiet_pskt.tkno2 as matkthue,pskt.loaiphieu,pskt.tkco,loaihanghoadichvu,'' as dvt,'' as soluongnhap, '' as donggianhap from pskt inner join chitiet_pskt on (pskt.sophieu=chitiet_pskt.sophieu) where pskt.loaiphieu in(2,4,6,8,10,12,14,16,18,20,22,24,26,28,30,32,34,36,38,40,42,44,46,48,50,52,54,56,58,60,62,64,70) {$Str_loaitokhai} " . $this->getStrOderby2() . " group by pskt.sophieu,sct,seri,pskt.makh,pskt.loaiphieu,chitiet_pskt.tkno2 
                union all
                SELECT seri,sct,ngayhoadon,ngayghiso,pskt.tenkh,thuesuat1 as thuesuat,masothue,chitiet_pskt.noidung1 as tenvt,(sum(gtvnd1)) as thanhtien,(sum(gtvnd2)) as thue,chuthich,pskt.mapskt,ngaythanhtoan,pskt.makh,pskt.tkco as matkthue,pskt.loaiphieu,pskt.tkco,loaihanghoadichvu,'' as dvt,'' as soluongnhap, '' as donggianhap from pskt inner join chitiet_pskt on (pskt.sophieu=chitiet_pskt.sophieu) where pskt.loaiphieu in(1,3,5,7,9,11,13,15,17,19,21,23,25,27,29,31,33,35,37,39,41,43,45,47,49,51,53,55,57,59,61,63,91) and pskt.tkco in ('1331','1332') {$Str_loaitokhai}" . $this->getStrOderby2() . " group by pskt.sophieu,sct,seri,pskt.makh,pskt.loaiphieu,chitiet_pskt.tkno2 
        order by loaiphieu," . $SapXep . ",sct";
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

    public function load_danhsach_muavao2_group_kiemtra_nganhang($SapXep,$ListKHCHa)
    {
        $sql = " 
                SELECT seri,sct,ngayhoadon,ngayghiso,pskt.tenkh,thuesuat1 as thuesuat,masothue,chitiet_pskt.noidung1 as tenvt,sum(gtvnd1) as thanhtien,sum(gtvnd2) as thue,chuthich,pskt.mapskt,ngaythanhtoan,pskt.makh,chitiet_pskt.tkno2 as matkthue,pskt.loaiphieu,pskt.tkco from pskt inner join chitiet_pskt on (pskt.sophieu=chitiet_pskt.sophieu) where pskt.loaiphieu in(2,4,6,8,10,12,14,16,18,20,22,24,26,28,30,32,34,36,38,40,42,44,46,48,50,52,54,56,58,60,62,64) and chitiet_pskt.tkno2 in ('1331','1332') and maloai  in (1,2) and loaitokhai!=0 " . $this->getStrOderby2() . " group by pskt.sophieu,sct,seri,pskt.makh,pskt.loaiphieu,chitiet_pskt.tkno2 
                union all
                SELECT seri,sct,ngayhoadon,ngayghiso,pskt.tenkh,thuesuat1 as thuesuat,masothue,chitiet_pskt.noidung1 as tenvt,-sum(gtvnd1) as thanhtien,-sum(gtvnd2) as thue,chuthich,pskt.mapskt,ngaythanhtoan,pskt.makh,pskt.tkco as matkthue,pskt.loaiphieu,pskt.tkco from pskt inner join chitiet_pskt on (pskt.sophieu=chitiet_pskt.sophieu) where pskt.loaiphieu in(2,4,6,8,10,12,14,16,18,20,22,24,26,28,30,32,34,36,38,40,42,44,46,48,50,52,54,56,58,60,62,64) and pskt.tkco in ('1331','1332') and maloai  in (1,2) and loaitokhai!=0 " . $this->getStrOderby2() . " group by pskt.sophieu,sct,seri,pskt.makh,pskt.loaiphieu,chitiet_pskt.tkno2 
                union all
                SELECT seri,sct,ngayhoadon,ngayghiso,pskt.tenkh,thuesuat1 as thuesuat,masothue,chitiet_pskt.noidung1 as tenvt,(sum(gtvnd1)) as thanhtien,(sum(gtvnd2)) as thue,chuthich,pskt.mapskt,ngaythanhtoan,pskt.makh,pskt.tkco as matkthue,pskt.loaiphieu,pskt.tkco from pskt inner join chitiet_pskt on (pskt.sophieu=chitiet_pskt.sophieu) where pskt.loaiphieu in(1,3,5,7,9,11,13,15,17,19,21,23,25,27,29,31,33,35,37,39,41,43,45,47,49,51,53,55,57,59,61,63) and pskt.tkco in ('1331','1332') and maloai in (1,2) and loaitokhai!=0 " . $this->getStrOderby2() . " group by pskt.sophieu,sct,seri,pskt.makh,pskt.loaiphieu,chitiet_pskt.tkno2 
                 union all
                SELECT seri,sct,ngayhoadon,ngayghiso,pskt.tenkh,thuesuat1 as thuesuat,masothue,chitiet_pskt.noidung1 as tenvt,(-sum(gtvnd1)) as thanhtien,(-sum(gtvnd2)) as thue,chuthich,pskt.mapskt,ngaythanhtoan,pskt.makh,chitiet_pskt.tkno2 as matkthue,pskt.loaiphieu,pskt.tkco from pskt inner join chitiet_pskt on (pskt.sophieu=chitiet_pskt.sophieu) where pskt.loaiphieu in(1,3,5,7,9,11,13,15,17,19,21,23,25,27,29,31,33,35,37,39,41,43,45,47,49,51,53,55,57,59,61,63) and chitiet_pskt.tkno2 in ('1331','1332') and maloai in (1,2) and loaitokhai!=0 " . $this->getStrOderby2() . " group by pskt.sophieu,sct,seri,pskt.makh,pskt.loaiphieu,chitiet_pskt.tkno2 

        order by loaiphieu," . $SapXep . ",sct";
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

    function TKCoDinhKhoan($sophieu)
    {// Tính phát sinh nhập trong khoản thời gian nhất định
        $sql = "select tkco from dinhkhoan_psvt where sophieu='{$sophieu}' group by sophieu ";// Nhập hàng trông tháng
        $query = $this->re_query($sql);
        $data = $this->re_fetch($query);
        return $data['tkco'];
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
        $sql = " SELECT seri,sct,ngayhoadon,ngayghiso,pskt.tenkh,thuesuat1 as thuesuat,masothue,chitiet_pskt.noidung1 as tenvt,sum(gtvnd1) as thanhtien,sum(gtvnd2) as thue,chuthich,pskt.mapskt,ngaythanhtoan,pskt.makh from pskt inner join chitiet_pskt on (pskt.sophieu=chitiet_pskt.sophieu) where pskt.loaiphieu in(2,4,6,8,10,12,14,16,18,20,22,24,26,28,30,32,34,36,38,40,42,44,46,48,50,52,54,56,58,60,62,64,70) and maloai =1 and loaitokhai=0 " . $this->getStrOderby2() . " group by pskt.sophieu,sct,seri,pskt.makh,pskt.loaiphieu order by " . $SapXep . ",sct";
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


    public function checkTonTaiDuLieu($machinhanh)
    {
        $SQL_W_ChiNhanh ="";
        if($machinhanh=="" || $machinhanh=="ALL"){

        }else{
            $SQL_W_ChiNhanh =" and machinhanh='".$machinhanh."'";
        }
        $sql = "select * from tokhaithue where thang='" . $this->getThangQuy() . "' {$SQL_W_ChiNhanh} ";
        $this->query($sql);
        if ($this->num_rows() >= 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function checkTonTaiDuLieu_BVMT()
    {
        $sql = "select * from tokhaithue_bvmt where thang='" . $this->getThangQuy() . "'";
        $this->query($sql);
        if ($this->num_rows() >= 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function checkTonTaiDuLieu_TN()
    {
        $sql = "select * from tokhaithue_tn where thang='" . $this->getThangQuy() . "'";
        $this->query($sql);
        if ($this->num_rows() >= 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function checkTonTaiDuLieu_KhauTru_TNCN($thangtinhthue,$namtinhthue,$loaitokhai)
    {
        $sql = "select * from tokhai_05kk_tncn where kytinhthue='" . $thangtinhthue . "' and namtinhthue='" . $namtinhthue . "' and loaitokhai='" . $loaitokhai . "' ";
        $this->query($sql);
        if ($this->num_rows() >= 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function checkTonTaiDuLieu_DauTu()
    {
        $sql = "select * from tokhaithue_dautu where thang='" . $this->getThangQuy() . "'";
        $this->query($sql);
        if ($this->num_rows() >= 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function checkDuLieuToKhaiKhao($machinhanh="")
    {
        $SQL_W_ChiNhanh ="";
        if($machinhanh=="" || $machinhanh=="ALL"){

        }else{
            $SQL_W_ChiNhanh =" and machinhanh='".$machinhanh."'";
        }
        $sql = "select * from nhatkykiemphieu where tuso='" . $this->getThangQuy() . "' and loaiphieu='9' and niendo=0 {$SQL_W_ChiNhanh} ";
        $this->query($sql);
        if ($this->num_rows() >= 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function checkDuLieuToKhaiKhai_KhauTru_TNCN($machinhanh="")
    {
        $SQL_W_ChiNhanh ="";
        if($machinhanh=="" || $machinhanh=="ALL"){

        }else{
            $SQL_W_ChiNhanh =" and machinhanh='".$machinhanh."'";
        }
        $sql = "select * from nhatkykiemphieu where tuso='" . $this->getThangQuy() . "' and loaiphieu='17' and niendo=0 {$SQL_W_ChiNhanh}";
        $this->query($sql);
        if ($this->num_rows() >= 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function checkDuLieuToKhaiKhao_DauTu()
    {
        $sql = "select * from nhatkykiemphieu where tuso='" . $this->getThangQuy() . "' and loaiphieu='13' and niendo=0";
        $this->query($sql);
        if ($this->num_rows() >= 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    public function ThemToKhaiThue_BVMT($loaiks,$tenloai,$maloaiks,$dvt,$soluong,$mucphi,$thanhtien,$loaitokhai,$thang,$tendvt)// Thêm tờ khai thuế chính thức
    {
        $sqldl = "delete from tokhaithue_bvmt where thang='" . $thang . "' and loaitokhai='".$loaitokhai."'";
        $this->query($sqldl);
        $sql = "Insert into tokhaithue_bvmt(loaiks,tenloai,maloaiks,dvt,soluong,mucphi,thanhtien,loaitokhai,thang,tendvt) 
                                     values('" . $loaiks . "','" . $tenloai . "','" . $maloaiks . "','" . $dvt . "','".$soluong."','".$mucphi."','".$thanhtien."','".$loaitokhai."','".$thang."','".$tendvt."');                                                               ";
        $this->query($sql);
    }

    public function ThemToKhaiThue_TN($loaiks,$tenloai,$maloaiks,$dvt,$soluong,$mucphi,$thanhtien,$loaitokhai,$thang,$tendvt,$thuesuat,$thueandinh,$thuephatsinh,$thuegiam)// Thêm tờ khai thuế chính thức
    {
        $sqldl = "delete from tokhaithue_tn where thang='" . $thang . "' and loaitokhai='".$loaitokhai."'";
        $this->query($sqldl);
        $sql = "Insert into tokhaithue_tn(loaiks,tenloai,maloaiks,dvt,soluong,mucphi,thanhtien,loaitokhai,thang,tendvt,thuesuat,thueandinh,thuephatsinh,thuegiam) 
                                     values('" . $loaiks . "','" . $tenloai . "','" . $maloaiks . "','" . $dvt . "','".$soluong."','".$mucphi."','".$thanhtien."','".$loaitokhai."','".$thang."','".$tendvt."','".$thuesuat."','".$thueandinh."','".$thuephatsinh."','".$thuegiam."');                                                               ";
        $this->query($sql);
    }

    public function ThemToKhaiThue($T21, $T22, $T23, $T24, $T25, $T26, $T27, $T28, $T29, $T30, $T31, $T32, $T33, $T34, $T35, $T36, $T37a, $T37b, $T38a, $T38b, $T39, $T40, $T40a, $T40b, $T41, $T42, $T43, $thang,$loaitokhai,$doanhthuthuekhautru,$thuegtgtkhautru,$doanhthuthuedaura,$thuegtgtdaura,$lydotanggiam,$chitietdsbr,$thuegtgttanggiam,$loikhaibosung,$T32a,$machinhanh="")// Thêm tờ khai thuế chính thức
    {
        $sqldl = "delete from tokhaithue where thang='" . $thang . "' and loaitokhai='".$loaitokhai."' and machinhanh='{$machinhanh}'";
        $this->query($sqldl);
        $sql = "Insert into tokhaithue(matkhai,gthh,thue,thang,loaitokhai,lydotanggiam,chitietdsbr,thuegtgttanggiam,loikhaibosung,machinhanh) values
                                                                        ('A','" . $T21 . "','" . $T21 . "','" . $thang . "','".$loaitokhai."','','','','".$loikhaibosung."','".$machinhanh."'),
                                                                        ('B','','" . $T22 . "','" . $thang . "','".$loaitokhai."','','','','".$loikhaibosung."','".$machinhanh."'),
                                                                        ('C','','','" . $thang . "','".$loaitokhai."','','','','".$loikhaibosung."','".$machinhanh."'),
                                                                        ('I','','','" . $thang . "','".$loaitokhai."','','','','".$loikhaibosung."','".$machinhanh."'),
                                                                        ('I1','" . $T23 . "','" . $T24 . "','" . $thang . "','".$loaitokhai."','','','','".$loikhaibosung."','".$machinhanh."'),
                                                                        ('I2','','" . $T25 . "','" . $thang . "','".$loaitokhai."','','','','".$loikhaibosung."','".$machinhanh."'),
                                                                        ('II','','','" . $thang . "','".$loaitokhai."','','','','".$loikhaibosung."','".$machinhanh."'),
                                                                        ('II1','" . $T26 . "','','" . $thang . "','".$loaitokhai."','','','','".$loikhaibosung."','".$machinhanh."'),
                                                                        ('II2','" . $T27 . "','" . $T28 . "','" . $thang . "','".$loaitokhai."','','','','".$loikhaibosung."','".$machinhanh."'),
                                                                        ('II2a','','" . $T29 . "','" . $thang . "','".$loaitokhai."','','','','".$loikhaibosung."','".$machinhanh."'),
                                                                        ('II2b','" . $T30 . "','" . $T31 . "','" . $thang . "','".$loaitokhai."','','','','".$loikhaibosung."','".$machinhanh."'),
                                                                        ('II2c','" . $T32 . "','" . $T33 . "','" . $thang . "','".$loaitokhai."','','','','".$loikhaibosung."','".$machinhanh."'),
                                                                       ('II2d','" . $T32a . "','0','" . $thang . "','".$loaitokhai."','','','','".$loikhaibosung."','".$machinhanh."'),
                                                                        ('II3','" . $T34 . "','" . $T35 . "','" . $thang . "','".$loaitokhai."','','','','".$loikhaibosung."','".$machinhanh."'),
                                                                        ('III','','" . $T36 . "','" . $thang . "','".$loaitokhai."','','','','".$loikhaibosung."','".$machinhanh."'),
                                                                        ('IV','','','" . $thang . "','".$loaitokhai."','','','','".$loikhaibosung."','".$machinhanh."'),
                                                                        ('IV1','" . $T37a . "','" . $T37b . "','" . $thang . "','".$loaitokhai."','','','','".$loikhaibosung."','".$machinhanh."'),
                                                                        ('IV2','" . $T38a . "','" . $T38b . "','" . $thang . "','".$loaitokhai."','','','','".$loikhaibosung."','".$machinhanh."'),
                                                                        ('V','','" . $T39 . "','" . $thang . "','".$loaitokhai."','','','','".$loikhaibosung."','".$machinhanh."'),
                                                                        ('VI','','','" . $thang . "','".$loaitokhai."','','','','".$loikhaibosung."','".$machinhanh."'),
                                                                        ('VI1','','" . $T40a . "','" . $thang . "','".$loaitokhai."','','','','".$loikhaibosung."','".$machinhanh."'),
                                                                        ('VI2','','" . $T40b . "','" . $thang . "','".$loaitokhai."','','','','".$loikhaibosung."','".$machinhanh."'),
                                                                        ('VI3','','" . $T40 . "','" . $thang . "','".$loaitokhai."','','','','".$loikhaibosung."','".$machinhanh."'),
                                                                        ('VI4','','" . $T41 . "','" . $thang . "','".$loaitokhai."','','','','".$loikhaibosung."','".$machinhanh."'),
                                                                        ('VI41','','" . $T42 . "','" . $thang . "','".$loaitokhai."','','','','".$loikhaibosung."','".$machinhanh."'),
                                                                        ('VI42','','" . $T43 . "','" . $thang . "','".$loaitokhai."','','','','".$loikhaibosung."','".$machinhanh."'),
                                                                        ('VI111','" . $doanhthuthuekhautru . "','" . $thuegtgtkhautru . "','" . $thang . "','".$loaitokhai."','','','','".$loikhaibosung."','".$machinhanh."'),
                                                                        ('VI112','" . $doanhthuthuedaura . "','" . $thuegtgtdaura . "','" . $thang . "','".$loaitokhai."','','','','".$loikhaibosung."','".$machinhanh."'),
                                                                        ('LDTG','0','0','" . $thang . "','".$loaitokhai."','".$lydotanggiam."','','','".$loikhaibosung."','".$machinhanh."'),
                                                                        ('CTBR','0','0','" . $thang . "','".$loaitokhai."','','".$chitietdsbr."','','".$loikhaibosung."','".$machinhanh."'),
                                                                        ('THTG','0','0','" . $thang . "','".$loaitokhai."','','','".$thuegtgttanggiam."','".$loikhaibosung."','".$machinhanh."')";
        $this->query($sql);
    }

    public function ThemToKhaiThue_DauTu($T21, $T22, $T23, $T24, $T25, $T26, $T27, $T28, $T29, $T30, $T31, $T32, $T33, $T34, $T35, $T36, $T37a, $T37b, $T38a, $T38b, $T39, $T40, $T40a, $T40b, $T41, $T42, $T43, $thang,$loaitokhai,$doanhthuthuekhautru,$thuegtgtkhautru,$doanhthuthuedaura,$thuegtgtdaura,$lydotanggiam,$chitietdsbr,$thuegtgttanggiam)// Thêm tờ khai thuế chính thức
    {
        $sqldl = "delete from tokhaithue_dautu where thang='" . $thang . "' and loaitokhai='".$loaitokhai."'";
        $this->query($sqldl);
        $sql = "Insert into tokhaithue_dautu(matkhai,gthh,thue,thang,loaitokhai,lydotanggiam,chitietdsbr,thuegtgttanggiam) values
                                                                        ('A','" . $T21 . "','" . $T21 . "','" . $thang . "','".$loaitokhai."','','',''),
                                                                        ('B','','" . $T22 . "','" . $thang . "','".$loaitokhai."','','',''),
                                                                        ('C','','','" . $thang . "','".$loaitokhai."','','',''),
                                                                        ('I','','','" . $thang . "','".$loaitokhai."','','',''),
                                                                        ('I1','" . $T23 . "','" . $T24 . "','" . $thang . "','".$loaitokhai."','','',''),
                                                                        ('I2','','" . $T25 . "','" . $thang . "','".$loaitokhai."','','',''),
                                                                        ('II','','','" . $thang . "','".$loaitokhai."','','',''),
                                                                        ('II1','" . $T26 . "','','" . $thang . "','".$loaitokhai."','','',''),
                                                                        ('II2','" . $T27 . "','" . $T28 . "','" . $thang . "','".$loaitokhai."','','',''),
                                                                        ('II2a','','" . $T29 . "','" . $thang . "','".$loaitokhai."','','',''),
                                                                        ('II2b','" . $T30 . "','" . $T31 . "','" . $thang . "','".$loaitokhai."','','',''),
                                                                        ('II2c','" . $T32 . "','" . $T33 . "','" . $thang . "','".$loaitokhai."','','',''),
                                                                        ('II3','" . $T34 . "','" . $T35 . "','" . $thang . "','".$loaitokhai."','','',''),
                                                                        ('III','','" . $T36 . "','" . $thang . "','".$loaitokhai."','','',''),
                                                                        ('IV','','','" . $thang . "','".$loaitokhai."','','',''),
                                                                        ('IV1','" . $T37a . "','" . $T37b . "','" . $thang . "','".$loaitokhai."','','',''),
                                                                        ('IV2','" . $T38a . "','" . $T38b . "','" . $thang . "','".$loaitokhai."','','',''),
                                                                        ('V','','" . $T39 . "','" . $thang . "','".$loaitokhai."','','',''),
                                                                        ('VI','','','" . $thang . "','".$loaitokhai."','','',''),
                                                                        ('VI1','','" . $T40a . "','" . $thang . "','".$loaitokhai."','','',''),
                                                                        ('VI2','','" . $T40b . "','" . $thang . "','".$loaitokhai."','','',''),
                                                                        ('VI3','','" . $T40 . "','" . $thang . "','".$loaitokhai."','','',''),
                                                                        ('VI4','','" . $T41 . "','" . $thang . "','".$loaitokhai."','','',''),
                                                                        ('VI41','','" . $T42 . "','" . $thang . "','".$loaitokhai."','','',''),
                                                                        ('VI42','','" . $T43 . "','" . $thang . "','".$loaitokhai."','','',''),
                                                                        ('VI111','" . $doanhthuthuekhautru . "','" . $thuegtgtkhautru . "','" . $thang . "','".$loaitokhai."','','',''),
                                                                        ('VI112','" . $doanhthuthuedaura . "','" . $thuegtgtdaura . "','" . $thang . "','".$loaitokhai."','','',''),
                                                                        ('LDTG','0','0','" . $thang . "','".$loaitokhai."','".$lydotanggiam."','',''),
                                                                        ('CTBR','0','0','" . $thang . "','".$loaitokhai."','','".$chitietdsbr."',''),
                                                                        ('THTG','0','0','" . $thang . "','".$loaitokhai."','','','".$thuegtgttanggiam."')";
        $this->query($sql);
    }

    public function load_danhsach_tokhai($thang,$loaitokhai,$machinhanh="")
    {
        $SQL_W_ChiNhanh ="";
        if($machinhanh=="" || $machinhanh=="ALL"){

        }else{
            $SQL_W_ChiNhanh =" and machinhanh='".$machinhanh."'";
        }
        $sql = "select * from tokhaithue where thang='" . $thang . "' and loaitokhai='" . $loaitokhai . "' {$SQL_W_ChiNhanh} ";
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
    public function load_danhsach_tokhai_BVMT($thang,$loaitokhai)
    {
        $sql = "select * from tokhaithue_bvmt where thang='" . $thang . "' and loaitokhai='" . $loaitokhai . "'";

        $this->query($sql);
        if ($this->num_rows() == 0) {
            return 0;
        } else {
            $i = 0;
            while ($data = $this->fetch()) {
                $i++;
                $matkhai = $data['maloaiks'];
                $row[$matkhai] = $data;
            }
            return $row;
        }
    }
    public function load_danhsach_tokhai_TN($thang,$loaitokhai)
    {
        $sql = "select * from tokhaithue_tn where thang='" . $thang . "' and loaitokhai='" . $loaitokhai . "'";

        $this->query($sql);
        if ($this->num_rows() == 0) {
            return 0;
        } else {
            $i = 0;
            while ($data = $this->fetch()) {
                $i++;
                $matkhai = $data['maloaiks'];
                $row[$matkhai] = $data;
            }
            return $row;
        }
    }
    public function load_danhsach_tokhai_khautru_thuetncn($thang,$nam,$loaitokhai)
    {
        $sql = "select * from tokhai_05kk_tncn where kytinhthue='" . $thang . "' and namtinhthue='" . $nam . "' and loaitokhai='" . $loaitokhai . "'";

        $this->query($sql);
        if ($this->num_rows() == 0) {
            return 0;
        } else {
            $i = 0;
            while ($data = $this->fetch()) {
                $i++;
                $row[] = $data;
            }
            return $row;
        }
    }

public function load_danhsach_tokhai_dautu($thang,$loaitokhai)
{
    $sql = "select * from tokhaithue_dautu where thang='" . $thang . "' and loaitokhai='" . $loaitokhai . "'";

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

    function loadDanhSach_DoiSoat_HoaDon_xoa_trongky($Quy)
    {
        $trees = array();
        $fill = $this->get_orderby();
        if($fill!="")
        $sql_w = " and ".$this->get_orderby() ;
        $sql = "SELECT * from doichieu_xoahoadon  WHERE 0=0 and quy ='".$Quy."' $sql_w  order by hoadon";
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
            $trees[$data['kyhieu']] = $data;
        }
        return $trees;
    }

    function loadDanhSachBCHoaDonXuat($TuNgay, $DenNgay)
    {
        $trees = array();
        //$fill = $this->get_orderby();
        //if($fill!="")
        //$sql_w = " and ".$this->get_orderby() ;
        $sql = "SELECT seri as kyhieu,sct as sohoadon,maloai from psvt  WHERE 0=0 and  ngayhoadon>='" . $TuNgay . "' and ngayhoadon<='" . $DenNgay . "' and loaiphieu=2  and  maloai in(1,2) and loaitokhai=1
                union all
                SELECT seri as kyhieu,sct as sohoadon,maloai from psvt  WHERE 0=0 and  ngayhoadon>='" . $TuNgay . "' and ngayhoadon<='" . $DenNgay . "' and ngayghiso>='" . $TuNgay . "' and ngayghiso<='" . $DenNgay . "' and loaiphieu=2  and  maloai in(1,2) and loaitokhai=0
         ";
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
        $sql = "SELECT tontuso as tuso,tondenso as denso,kyhieu,mauso,soquyen,sott,loaiphieu as loaphieu from tonkhohoadon  WHERE 0=0 and quy='".$quy."'";
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

    function loadDanhSachDoiSoatHoaDonXoa($quy)
    {
        $trees = array();
        //$fill = $this->get_orderby();
        //if($fill!="")
        //$sql_w = " and ".$this->get_orderby() ;
        $sql = "SELECT * from doichieu_xoahoadon  WHERE quy='".$quy."'";
        $this->query($sql);
        $i = 0;
        while ($data = $this->fetch()) {
            $i++;
            $data['STT'] = $i;
            $trees[] = $data;
        }
        return $trees;
    }


    function loadDanhSachBCHoaDonTon_CaNam()
    {
        $trees = array();
        //$fill = $this->get_orderby();
        //if($fill!="")
        //$sql_w = " and ".$this->get_orderby() ;
        $sql = "SELECT * from tonkhohoadon order by quy";
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
        $sql = "SELECT seri as kyhieu,sct as sohoadon,maloai from chitiet_pskt  WHERE 0=0 and  ngayhoadon>='" . $TuNgay . "' and ngayhoadon<='" . $DenNgay . "' and  maloai in (1,2) and loaiphieu in(1,3) and loaitokhai=1
                union all
                SELECT chitiet_pskt.seri as kyhieu,chitiet_pskt.sct as sohoadon,chitiet_pskt.maloai from chitiet_pskt inner join pskt on (chitiet_pskt.sophieu=pskt.sophieu)  WHERE chitiet_pskt.ngayhoadon>='" . $TuNgay . "' and chitiet_pskt.ngayhoadon<='" . $DenNgay . "' and pskt.ngayghiso>='" . $TuNgay . "' and pskt.ngayghiso<='" . $DenNgay . "' and  chitiet_pskt.maloai in (1,2) and chitiet_pskt.loaiphieu in(1,3) and chitiet_pskt.loaitokhai=0
         ";
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
    function loadDanhSachToKhai_KhauTru_Thue_TNCN()
    {
        $trees = array();
        $fill = $this->getStrOderby();
        if($fill!="")
            $sql_w = " and ".$this->getStrOderby() ;
        $sql = "SELECT * from tokhai_05kk_tncn WHERE 0=0 $sql_w order by sott";
        $this->query($sql);
        $i = 0;
        while ($data = $this->fetch()) {
            $i++;
            $data['STT'] = $i;

            $trees[] = $data;
        }
        return $trees;
    }

    function loadDanhSachLuuChuyen_TienTe()
    {
        $trees = array();
        $fill = $this->getStrOderby();
        if($fill!="")
            $sql_w = " and ".$this->getStrOderby() ;
        $sql = "SELECT * from luuchuyentiente WHERE 0=0 $sql_w order by sott";
        $this->query($sql);
        $i = 0;
        while ($data = $this->fetch()) {
            $i++;
            $data['STT'] = $i;

            $trees[] = $data;
        }
        return $trees;
    }

    function loadDanhSachToKhai_TNDN_PLChuyenLo($nam)
    {
        $trees = array();
        $fill = $this->getStrOderby();
        if($fill!="")
            $sql_w = " and ".$this->getStrOderby() ;
        $sql = "SELECT * from plchuyenlo WHERE SUBSTRING(maso,1,4)= '{$nam}' $sql_w order by nampslo ASC";
        $this->query($sql);
        $i = 0;
        while ($data = $this->fetch()) {
            $i++;
            $data['STT'] = $i;
            $trees[] = $data;
        }
        return $trees;
    }
    function loadDanhSachToKhai_TNDN_PLGDLK($nam)
    {
        $trees = array();
        $fill = $this->getStrOderby();
        if($fill!="")
            $sql_w = " and ".$this->getStrOderby() ;
        $sql = "SELECT * from plgdlk WHERE SUBSTRING(maso,1,4)= '{$nam}' $sql_w order by namps DESC limit 5";
        $this->query($sql);
        $i = 0;
        while ($data = $this->fetch()) {
            $i++;
            $data['STT'] = $i;
            $trees[] = $data;
        }
        return $trees;
    }

    function loadDanhSachToKhai_TNDN_PLdkuudai()
    {
        $trees = array();
        $fill = $this->getStrOderby();
        if($fill!="")
            $sql_w = " and ".$this->getStrOderby() ;
        $sql = "SELECT * from plthuetndnuudai WHERE machitieucha = '1' $sql_w order by machitieu ASC";
        $this->query($sql);
        $i = 0;
        while ($data = $this->fetch()) {
            $i++;
            $data['STT'] = $i;
            $trees[] = $data;
        }
        return $trees;
    }

    function loadDanhSachToKhai_TNDN_PLmucdouudai()
    {
        $trees = array();
        $fill = $this->getStrOderby();
        if($fill!="")
            $sql_w = " and ".$this->getStrOderby() ;
        $sql = "SELECT * from plthuetndnuudai WHERE machitieucha = '2' $sql_w order by machitieu ASC";
        $this->query($sql);
        $i = 0;
        while ($data = $this->fetch()) {
            $i++;
            $data['STT'] = $i;
            $trees[] = $data;
        }
        return $trees;
    }
    function loadDanhSachToKhai_TNDN_PLsothueuudai()
    {
        $trees = array();
        $fill = $this->getStrOderby();
        if($fill!="")
            $sql_w = " and ".$this->getStrOderby() ;
        $sql = "SELECT * from plthuetndnuudai WHERE machitieucha = '3' $sql_w order by machitieu ASC";
        $this->query($sql);
        $i = 0;
        while ($data = $this->fetch()) {
            $i++;
            $data['STT'] = $i;
            $trees[] = $data;
        }
        return $trees;
    }
    function loadDanhSachToKhai_TNDN_PLUuDai()
    {
        $trees = array();
        $fill = $this->getStrOderby();
        if($fill!="")
            $sql_w = " and ".$this->getStrOderby() ;
        $sql = "SELECT * from plthuetndnuudai WHERE 0=0 $sql_w order by machitieu ASC";
        $this->query($sql);
        $i = 0;
        while ($data = $this->fetch()) {
            $i++;
            $trees[$data['machitieu']] = $data;
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
    function themSoDu_HDDK($sott,$loaiphieu, $soquyen, $kyhieu, $tuso, $denso,$quy,$mauso,$huy,$sudung,$loaphieu)
    {
        $sql = "insert into sodu_hoadon_dauky_nhap(sott,kyhieu,tuso,denso,loaiphieu,quy,soquyen,mauso,huy,sudung,loaphieu) values('".$sott."','" . $kyhieu . "','" . $tuso . "','" . $denso . "','" . $loaiphieu . "','" . $quy . "','" . $soquyen . "','" . $mauso . "','".$huy."','".$sudung."','".$loaphieu."')";
        $this->query($sql);
    }

    function xoaSoDu_HDDK($sott)
    {
        $sql = "delete from sodu_hoadon_dauky_nhap where sott=$sott";
        $this->query($sql);
    }
    function suaSoDu_HDDK($sott,$loaiphieu, $soquyen, $kyhieu, $tuso, $denso,$quy,$mauso,$huy,$sudung,$loaphieu)
    {
        $sql = "update sodu_hoadon_dauky_nhap set
									kyhieu='" . $kyhieu . "',
									tuso='" . $tuso . "',
									denso='" . $denso . "',
									loaiphieu='" . $loaiphieu . "',
									loaphieu='" . $loaphieu . "',
									quy='" . $quy . "',
									soquyen='" . $soquyen . "',
									huy='" . $huy . "',
									mauso='" . $mauso . "',
									sudung='" . $sudung . "'
									where sott='" . $sott . "'";
        $this->query($sql);
    }

    function suaDoiSoat_HoaDon_Xoa($sott,$hoadon, $hople, $liendo, $thaythe, $ghichu)
    {
        $sql = "update doichieu_xoahoadon set
									hoadon='" . $hoadon . "',
									hople='" . $hople . "',
									liendo='" . $liendo . "',
									thaythe='" . $thaythe . "',
									ghichu='" . $ghichu . "'
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
	function loadDanhSachLuuChuyen_TienTe_CoMa()
    {
        $trees = array();
        $fill = $this->getStrOderby();
        if($fill!="")
            $sql_w = " and ".$this->getStrOderby() ;
        $sql = "SELECT * from luuchuyentiente WHERE 0=0 $sql_w order by sott";
        $this->query($sql);
        $i = 0;
        while ($data = $this->fetch()) {
            $i++;
            $data['STT'] = $i;

            $trees[$data['maso']] = $data;
        }
        return $trees;
    }
}


?>