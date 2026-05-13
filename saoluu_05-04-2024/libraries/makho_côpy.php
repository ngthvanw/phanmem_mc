<?php

class makho extends database
{
    public $tringorder;

    public $MaKho;
    public $TenKho;
    public $TenKhoKD;
    public $DiaChi;
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

    public function set_MaKho($MaKho)
    {
        $this->MaKho = $MaKho;
    }

    public function get_MaKho()
    {
        return $this->MaKho;
    }

    public function set_TenKho($TenKho)
    {
        $this->TenKho = $TenKho;
    }

    public function get_TenKho()
    {
        return $this->TenKho;
    }

    public function set_TenKhoKD($TenKhoKD)
    {
        $this->TenKhoKD = $TenKhoKD;
    }

    public function get_TenKhoKD()
    {
        return $this->TenKhoKD;
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
        $sql = "select * from makho where makho='" . $this->get_MaKho() . "' and sott!=" . $this->get_SoTT() . "";
        $this->query($sql);
        if ($this->num_rows() >= 1) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function createSoTT()
    {
        $sql = "select max(sott) as sott from makho";
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
        $sql = "select * from makho  where makho='" . $this->get_MaKho() . "'";
        $this->query($sql);
        if ($this->num_rows() >= 1) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    /*function loadListMaKho($parentid =0){
            $trees = array();
            $fill = $this->get_orderby();
            if($fill!="")
                    $sql_w = $this->get_orderby()." and ";
            $sql = "SELECT * FROM makho WHERE $sql_w ma = $parentid ";
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
    public function loadListMaKho()
    {
        $trees = array();
        $fill = $this->get_orderby();
        if ($fill != "")
            $sql_w = " and " . $this->get_orderby();
        $sql = "select * from makho where 0=0 $sql_w  order by makho";
        $this->query($sql);

        $i = 0;
        while ($data = $this->fetch()) {
            $i++;
            $data['STT'] = $i;
            $trees[] = $data;
        }
        return $trees;
    }

    public function getMaKho()
    {
        $sql = "select * from makho where makho='" . $this->get_MaKho() . "'";
        $this->query($sql);
        if ($this->num_rows() == 0) {
            return 0;
        } else {
            return $this->fetch();
        }
    }

    public function themMaKho()
    {
        $sql = "INSERT INTO makho (sott,makho,tenkho,tenkhokd,diachi,ghichu) 
                       VALUES ('" . $this->get_SoTT() . "','" . $this->get_MaKho() . "', '" . $this->get_TenKho() . "', '" . $this->get_TenKhoKD() . "', '" . $this->get_DiaChi() . "','" . $this->get_ChuThich() . "' );";
        $this->query($sql);
    }

    public function suaMaKho()
    {
        $sql = "update makho set makho='" . $this->get_MaKho() . "',tenkho='" . $this->get_TenKho() . "',tenkhokd='" . $this->get_TenKhoKD() . "',diachi='" . $this->get_DiaChi() . "',ghichu='" . $this->get_ChuThich() . "'
                  WHERE sott = '" . $this->get_SoTT() . "'";
        $this->query($sql);
    }

    public function xoaMaKho()
    {
        $sql = "delete from makho where sott='" . $this->get_SoTT() . "'";
        $this->query($sql);
    }
}

?>
