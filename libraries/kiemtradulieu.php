<?php
class kiemtradulieu extends database
{
    public $tringorder;

    public function set_orderby($string)
    {
        $this->tringorder = $string;
    }

    public function get_orderby()
    {
        return $this->tringorder;
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

}

?>
