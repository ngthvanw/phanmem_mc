<?php

class mavattu extends database
{
    public $tringorder;

    public $MaVT;
    public $PBChiPhi;

    /**
     * @return mixed
     */
    public function getPBChiPhi()
    {
        return $this->PBChiPhi;
    }

    /**
     * @param mixed $PBChiPhi
     */
    public function setPBChiPhi($PBChiPhi)
    {
        $this->PBChiPhi = $PBChiPhi;
    }

    public $MaVTDoi;

    /**
     * @return mixed
     */
    public function getMaVTDoi()
    {
        return $this->MaVTDoi;
    }

    /**
     * @param mixed $MaVTDoi
     */
    public function setMaVTDoi($MaVTDoi)
    {
        $this->MaVTDoi = $MaVTDoi;
    }

    public $MaVTCha;
    public $TenVT;
    public $TenKD;
    public $MaTK;
    public $TKDoanhThu;

    /**
     * @return mixed
     */
    public function getTKDoanhThu()
    {
        return $this->TKDoanhThu;
    }

    /**
     * @param mixed $TKDoanhThu
     */
    public function setTKDoanhThu($TKDoanhThu)
    {
        $this->TKDoanhThu = $TKDoanhThu;
    }

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
    public $Rank1;// Thu? su?t

    public $ChuThich;
    public $LoaiVL;

    /**
     * @return mixed
     */
    public function getLoaiVL()
    {
        return $this->LoaiVL;
    }

    /**
     * @param mixed $LoaiVL
     */
    public function setLoaiVL($LoaiVL)
    {
        $this->LoaiVL = $LoaiVL;
    }

    public $SoTT;
    public $Limit;


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

    public function setLimit($Limit)
    {
        $this->Limit = $Limit;
    }

    public function getLimit()
    {
        return $this->Limit;
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
        $sql = "select * from tk  where mavt='" . $this->get_MaVT() . "' and slck!=0";
        $this->query($sql);
        if ($this->num_rows() >= 1) {
            return TRUE;
        } else {
            return FALSE;
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
        $sql = "SELECT * FROM mavt WHERE 0=0 $sql_w  order by mavt";
        $this->query($sql);
        $i = 0;
        while ($data = $this->fetch()) {
            $i++;
            $data['STT'] = $i;
            $trees[] = $data;
        }
        return $trees;
    }

    function loadListMaVT($parentid = 0)
    {
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = " and " . $this->get_orderby();
        $sql = "SELECT mavt.*,manhom.tennhom FROM mavt inner join manhom on (mavt.manhom = manhom.manhom) WHERE 0=0 $sql_w  order by tenkd " . $this->getLimit();
        $this->query($sql);
        $i = 0;
        while ($data = $this->fetch()) {
            $i++;
            $data['STT'] = $i;
            $trees[] = $data;
        }
        return $trees;
    }

    function loadListMaVT_ChiTiet($sottpsct)
    {
        $res = $this->re_query("select mavt_pbchiphi from chitiet_pskt where sott='{$sottpsct}'");
        $data_chitiet = $this->re_fetch($res);
        $mavt_arr = explode(",", $data_chitiet['mavt_pbchiphi']);

        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = " and " . $this->get_orderby();
        $sql = "SELECT mavt.*,manhom.tennhom FROM mavt inner join manhom on (mavt.manhom = manhom.manhom) WHERE pbchiphi=1 $sql_w  order by tenkd ";
        $this->query($sql);
        $i = 0;
        while ($data = $this->fetch()) {
            $i++;
            $data['STT'] = $i;
            if (in_array($data['mavt'], $mavt_arr)) {
                $data['chon'] = 1;
            } else {
                $data['chon'] = 0;
            }
            $trees[] = $data;
        }
        return $trees;
    }

    function loadListMaVT_DuThua()
    {
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = " and " . $this->get_orderby();
        $sql = "SELECT mavt.*,sum(tk.slck) as soluongck FROM mavt inner join tk on (mavt.mavt = tk.mavt) WHERE mavt.niendo='" . ($_SESSION['NienDo'] - 1) . "' $sql_w GROUP BY mavt.mavt HAVING soluongck=0  order by mavt.tenkd " . $this->getLimit();
        $this->query($sql);
        $i = 0;
        while ($data = $this->fetch()) {
            $i++;
            $trees[] = $data;
        }
        return $trees;
    }

    function loadListMaVT_Json($parentid = 0)
    {
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = " and " . $this->get_orderby();
        $sql = "SELECT mavt,tenvt FROM mavt ";
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
        $sql = "SELECT mavt.*,manhom.tennhom FROM mavt inner join manhom on (mavt.manhom = manhom.manhom) WHERE mavt not in (select mavt from tk) $sql_w  order by mavt";
        $this->query($sql);
        $i = 0;
        while ($data = $this->fetch()) {
            $i++;
            $data['STT'] = $i;
            $trees[] = $data;
        }
        return $trees;
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
        $sql = "INSERT INTO mavt (sott, mavt, tenvt,ghichu, matk, quycach, dvt,dvtp,kl,kt,min,muc,max,giaban,giabansi,giamua,rate,mark,congvao,trura,dp,manhom,tennhom,tenkd,loaivl,pbchiphi,tkdoanhthu)
                       VALUES ('" . $this->get_SoTT() . "','" . $this->get_MaVT() . "', '" . $this->get_TenVT() . "','" . $this->get_ChuThich() . "', '" . $this->get_MaTK() . "','" . $this->get_QuyCach() . "','" . $this->get_DVT() . "','" . $this->get_DVTP() . "','" . $this->get_KL() . "','" . $this->get_KT() . "','" . $this->get_Min() . "','" . $this->get_Max() . "','" . $this->get_Muc() . "','" . $this->get_GiaBan() . "','" . $this->get_GiaBanSi() . "','" . $this->get_GiaMua() . "','" . $this->get_Rate() . "','" . $this->get_Mark() . "','" . $this->get_CongVao() . "','" . $this->get_TruRa() . "','" . $this->get_DP() . "','" . $this->get_MaNhom() . "','" . $this->get_TenNhom() . "','" . $this->get_TenKD() . "','" . $this->getLoaiVL() . "','" . $this->getPBChiPhi() . "','" . $this->getTKDoanhThu() . "' );";
        $this->query($sql);
    }

    public function ThemTKHK()
    {
        $sql = "INSERT INTO tmp_tkhientai(mavt,slton,giavon)
                       VALUES ('" . $this->get_MaVT() . "',0,0);";
        $this->query($sql);
    }

    public function suaMaVT()
    {
        $sql = "update mavt set tenvt='" . $this->get_TenVT() . "',ghichu='" . $this->get_ChuThich() . "',tenkd='" . $this->get_TenKD() . "',matk='" . $this->get_MaTK() . "',quycach='" . $this->get_QuyCach() . "',dvt='" . $this->get_DVT() . "',dvtp='" . $this->get_DVTP() . "',kl='" . $this->get_KL() . "',kt='" . $this->get_KT() . "',min='" . $this->get_Min() . "',max='" . $this->get_Max() . "',muc='" . $this->get_Muc() . "',giaban='" . $this->get_GiaBan() . "',giabansi='" . $this->get_GiaBanSi() . "',giamua='" . $this->get_GiaMua() . "',rate='" . $this->get_Rate() . "',mark='" . $this->get_Mark() . "',congvao='" . $this->get_CongVao() . "',trura='" . $this->get_TruRa() . "',dp='" . $this->get_DP() . "',manhom='" . $this->get_MaNhom() . "',tennhom='" . $this->get_TenNhom() . "',loaivl='" . $this->getLoaiVL() . "',pbchiphi='" . $this->getPBChiPhi() . "',tkdoanhthu='" . $this->getTKDoanhThu() . "'
                  WHERE sott = '" . $this->get_SoTT() . "'";
        $sql_ps = "update chitiet_psvt set tenvt = '" . $this->get_TenVT() . "',dvt='" . $this->get_DVT() . "',tenkd='" . $this->get_TenKD() . "' where mavt = '" . $this->get_MaVT() . "' ";
        $this->re_query($sql);
        $this->re_query($sql_ps);
    }

    public function suaMaVT_ChiTietNhapXuat()
    {
        $sql_ps = "update chitiet_psvt set tenvt = '" . $this->get_TenVT() . "',dvt='" . $this->get_DVT() . "',tenkd='" . $this->get_TenKD() . "',mavt = '" . $this->getMaVTDoi() . "' where mavt = '" . $this->get_MaVT() . "' ";
        $this->re_query($sql_ps);

    }

    public function xoaMaVT()
    {
        $sql = "delete from mavt where mavt='" . $this->get_MaVT() . "'";
        $this->query($sql);
    }

    public function xoaMaVT_DuThua($mavt)
    {
        $sqltk = "delete from tk where mavt in ('{$mavt}')";
        $this->query($sqltk);

        $sqlmavt = "delete from mavt where mavt in ('{$mavt}')";
        $this->query($sqlmavt);
    }

    function ThemBangPhanBoChiPhi($tuthang, $denthang, $sophieu, $NgayCuoiThang, $khongtaobuttoandinhkhoan,$xoaphanbocp)
    {
        $sql1 = "select mavt_pbchiphi,sum(gtvnd1) as thanhtien from pskt inner join chitiet_pskt on (pskt.sophieu=chitiet_pskt.sophieu) where month(ngayghiso)='{$tuthang}' and chitiet_pskt.loaiphieu in(2,4) and mavt_pbchiphi!='' and tkno1='1562' group by mavt_pbchiphi
                                          union all 
                                          select mavt_pbchiphi,sum(gtvnd1) as thanhtien from pskt inner join chitiet_pskt on (pskt.sophieu=chitiet_pskt.sophieu) where month(ngayghiso)='{$tuthang}' and chitiet_pskt.loaiphieu in(2,4) and mavt_pbchiphi!='' and tkno2='1562' group by mavt_pbchiphi
                                    ";
        $res = $this->re_query($sql1);
        $data_chitiet = $this->re_fetch_all($res);

        $this->re_query("UPDATE psvt a JOIN chitiet_psvt b 
                                         ON a.sophieu = b.sophieu 
                                         SET b.cpmuahang = 0 
                                         where month(a.ngayghiso)={$tuthang} and a.loaiphieu=1"
        );// Cập nhật chi phí mua hàng về 0

        $tongcpmuahang = 0;
        $string_mavtpb = "";
        foreach ($data_chitiet as $item_chitiet) {
            $tongcpmuahang += $item_chitiet['thanhtien'];
            $string_mavtpb .= $item_chitiet['mavt_pbchiphi'] . ",";
        }
        $mavt_pb_arr = explode(",", substr($string_mavtpb, 0, -1));
        $str_mavt_pb = implode("','", array_unique($mavt_pb_arr));

        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = " and " . $this->get_orderby();
        $sql = "SELECT mavt,tenvt,dvt,sum(soluongnhap) as soluongnhap,avg(donggianhap) as donggianhap,sum(thanhtien) as thanhtien,chitiet_psvt.sophieu as sophieu FROM psvt inner join chitiet_psvt on (psvt.sophieu = chitiet_psvt.sophieu) WHERE month(ngayghiso)='{$tuthang}' and loaiphieu='1' and mavt in ('{$str_mavt_pb}') group by mavt";
        $this->query($sql);
        $tongtiennhap = 0;
        $tongluongnhap = 0;
        while ($data = $this->fetch()) {
            $tongtiennhap += $data['thanhtien'];
            $tongluongnhap += $data['soluongnhap'];
            $trees[] = $data;
        }// Lấy danh sách các mặt hàng phân bổ trong tháng đó

        $tongcpphanbo = 0;
        $leng = count($trees);
        $i = 0;
        $sql_val = "";
        $this->re_query("delete from bangchiphiphanbo where thang='{$tuthang}'");

        foreach ($trees as $k => $itemtrees) {// Duyệt tất cả các hóa đơn có mặt hàng CP mua hàng trong tháng
            $i++;

            $sql2 = "SELECT mavt,chitiet_psvt.sott,psvt.kho,sum(soluongnhap) as soluongnhap,sum(thanhtien) as thanhtien,psvt.sophieu FROM psvt inner join chitiet_psvt on (psvt.sophieu = chitiet_psvt.sophieu) WHERE month(ngayghiso)='{$tuthang}' and loaiphieu='1' and mavt = '" . $itemtrees['mavt'] . "' group by psvt.kho";
            $res2 = $this->re_query($sql2);
            $data_mavt = $this->re_fetch_all($res2);

            $leng_mavt_kho = count($data_mavt);
            if ($leng == $i) {// Nếu là mavt cuối cùng thì phân bổ hết cho mặt hàng đó
                $cpphanbo = $tongcpmuahang - $tongcpphanbo;// Chi phí phân bổ của từng mặt hàng
                $cpphanbo_1mathang = ($tongcpmuahang / $tongtiennhap);
                $j=0;
                $tongcpphanbotungkho=0;
                foreach ($data_mavt as $item_data_mavt) {//Duyệt từng kho
                    $j++;
                    if ($leng_mavt_kho == $j) {// Nếu là kho hàng cuối
                        $cpphanbotungkho = $cpphanbo - $tongcpphanbotungkho;
                        $sql_val .= "('" . $itemtrees['mavt'] . "','" . $itemtrees['tenvt'] . "','" . $itemtrees['dvt'] . "','" . $item_data_mavt['soluongnhap'] . "','" . $itemtrees['donggianhap'] . "','" . $item_data_mavt['thanhtien'] . "','" . $cpphanbotungkho . "','" . $tuthang . "','" . $item_data_mavt['kho'] . "'),";

                        if($xoaphanbocp=="false") {
                            $this->re_query("UPDATE chitiet_psvt 
                                         SET cpmuahang =" . $cpphanbotungkho . " 
                                         where sott='" . $item_data_mavt['sott'] . "'"
                            );// Cập nhật chi phí mua hàng mã vạt tư
                        }
                    } else {// else là kho hàng không cuối
                        $cpphanbotungkho = round($cpphanbo_1mathang * $item_data_mavt['thanhtien']);
                        $sql_val .= "('" . $itemtrees['mavt'] . "','" . $itemtrees['tenvt'] . "','" . $itemtrees['dvt'] . "','" . $item_data_mavt['soluongnhap'] . "','" . $itemtrees['donggianhap'] . "','" . $item_data_mavt['thanhtien'] . "','" . $cpphanbotungkho . "','" . $tuthang . "','" . $item_data_mavt['kho'] . "'),";
                        if($xoaphanbocp=="false") {
                            $this->re_query("UPDATE chitiet_psvt 
                                         SET cpmuahang =" . $cpphanbotungkho . " 
                                         where sott='" . $item_data_mavt['sott'] . "'"
                            );// Cập nhật chi phí mua hàng mã vạt tư
                        }
                    }
                    $tongcpphanbotungkho+=$cpphanbotungkho;
                }
            } else {// Phân bổ cho mặt hàng không phải là cuối cùng
                echo "Mặt hàng không cuối - ";
                $cpphanbo = round(($tongcpmuahang / $tongtiennhap) * $itemtrees['thanhtien']);// Chi phí phân bổ của từng mặt hàng
                $cpphanbo_1mathang = ($tongcpmuahang / $tongtiennhap);
                $j=0;
                $tongcpphanbotungkho=0;

                foreach ($data_mavt as $item_data_mavt) {
                    $j++;
                    if ($leng_mavt_kho == $j) {
                        $cpphanbotungkho = $cpphanbo - $tongcpphanbotungkho;
                        $sql_val .= "('" . $itemtrees['mavt'] . "','" . $itemtrees['tenvt'] . "','" . $itemtrees['dvt'] . "','" . $item_data_mavt['soluongnhap'] . "','" . $itemtrees['donggianhap'] . "','" . $item_data_mavt['thanhtien'] . "','" . $cpphanbotungkho . "','" . $tuthang . "','" . $item_data_mavt['kho'] . "'),";
                        if($xoaphanbocp=="false") {
                            $this->re_query("UPDATE chitiet_psvt 
                                         SET cpmuahang =" . $cpphanbotungkho . " 
                                         where sott='" . $item_data_mavt['sott'] . "'"
                            );// Cập nhật chi phí mua hàng mã vạt tư
                        }
                    } else {
                        $cpphanbotungkho = round($cpphanbo_1mathang * $item_data_mavt['thanhtien']);
                        $sql_val .= "('" . $itemtrees['mavt'] . "','" . $itemtrees['tenvt'] . "','" . $itemtrees['dvt'] . "','" . $item_data_mavt['soluongnhap'] . "','" . $itemtrees['donggianhap'] . "','" . $item_data_mavt['thanhtien'] . "','" . $cpphanbotungkho . "','" . $tuthang . "','" . $item_data_mavt['kho'] . "'),";
                        if($xoaphanbocp=="false") {
                            $this->re_query("UPDATE chitiet_psvt 
                                         SET cpmuahang =" . $cpphanbotungkho . " 
                                         where sott='" . $item_data_mavt['sott'] . "'"
                            );// Cập nhật chi phí mua hàng mã vạt tư
                        }
                    }
                    $tongcpphanbotungkho+=$cpphanbotungkho;
                }
            }
            $tongcpphanbo += $cpphanbo;
            $trees[$k]['cpphanbo'] = $cpphanbo;
        }

        $sql_emp_pskt = "delete from pskt where month(ngayghiso)='" . $tuthang . "' and loaiphieu=89 ";
        $this->re_query($sql_emp_pskt);
        $sql_emp_chitiet_pskt = "delete from chitiet_pskt where month(ngayhoadon)='" . $tuthang . "' and loaiphieu=89 ";
        $this->re_query($sql_emp_chitiet_pskt);

        $value_pskt = "('" . $sophieu . "','1','" . $NgayCuoiThang . "','1561','89','" . $tongcpphanbo . "'),";
        $value_chitiet_pskt = "('1','" . $NgayCuoiThang . "','" . $tongcpphanbo . "','0001','Toàn Bộ','100091','Kết chuyển chi phí mua hàng tháng $tuthang - $_SESSION[NienDo]','1562','" . $tongcpphanbo . "','4','89','" . $sophieu . "',''),";

        $sql_pskt = "insert into pskt(sophieu,mapskt,ngayghiso,tkco,loaiphieu,tongcong) VALUE " . substr($value_pskt, 0, -1);
        $sql_chitiet_pskt = "insert into chitiet_pskt(mapskt,ngayhoadon,gtvnd1,mabp,bophan,mand1,noidung1,tkno1,tongtien,maloai,loaiphieu,sophieu,loaisp) VALUE " . substr($value_chitiet_pskt, 0, -1);

        if ($khongtaobuttoandinhkhoan == "false") {
            $this->re_query($sql_pskt);
            $this->re_query($sql_chitiet_pskt);
        }

        $sql_ins = "insert into bangchiphiphanbo(mavt,tenvt,dvt,soluong,dongia,thanhtien,cpphanbo,thang,khohang) value " . substr($sql_val, 0, -1);
        $this->re_query($sql_ins);

    }

    public function loadListPBChiPhiMuaHang($tuthang, $denthang, $CaNam)
    {
        if ($CaNam) {
            $sql = "select mavt,tenvt,dvt,sum(soluong) as soluong,avg(dongia) as dongia,sum(thanhtien) as thanhtien,sum(cpphanbo) as cpphanbo,tenkho,makho from bangchiphiphanbo inner join makho on(khohang=makho) group by khohang,mavt ORDER by khohang";
        } else {
            $sql = "select mavt,tenvt,dvt,sum(soluong) as soluong,avg(dongia) as dongia,sum(thanhtien) as thanhtien,sum(cpphanbo) as cpphanbo,tenkho,makho from bangchiphiphanbo inner join makho on(khohang=makho) where thang='" . $denthang . "' group by khohang,mavt ORDER by khohang";
        }
        $this->query($sql);
        if ($this->num_rows() == 0) {
            return 0;
        } else {
            return $this->fetch_all();
        }
    }
}

?>
