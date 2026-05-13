<?php
include("../../config.php");
$OBJ = new ps_chitiet_mavattu();
$tendangnhap = check_data($_GET['tennguoidung']);
$nam = check_data($_GET['nam']);

class ColumnHelper
{
    public static function isValidColumn($dataIndx)
    {
        if (preg_match('/^[a-z,A-Z]*$/', $dataIndx))
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}
class FilterHelper
{
    public static function deSerializeFilter($pq_filter)
    {
        $filterObj = json_decode($pq_filter);

        $mode = $filterObj->mode;
        $filters = $filterObj->data;

        $fc = array();
        $param= array();

        foreach ($filters as $filter)
        {
            $dataIndx = $filter->dataIndx;
            if (ColumnHelper::isValidColumn($dataIndx) == false)
            {
                throw new Exception("Invalid column name");
            }
            $text = $filter->value;
            $text2 = $filter->value2;
            $condition = $filter->condition;

            if ($condition == "contain")
            {
                $fc[] = $dataIndx . " like '%".$text."%'";
            }
            else if ($condition == "notcontain")
            {
                $fc[] = $dataIndx . " not like '%" .$text."%'";
            }
            else if ($condition == "begin")
            {
                $fc[] = $dataIndx . " like '%".$text."%'";
            }
            else if ($condition == "end")
            {
                $fc[] = $dataIndx . " like ".$text;
            }
            else if ($condition == "equal")
            {
                $fc[] = $dataIndx . " = ".$text;
            }
            else if ($condition == "notequal")
            {
                $fc[] = $dataIndx . " != ".$text;
            }
            else if ($condition == "empty")
            {
                $fc[] = "ifnull(" . $dataIndx . ",'')=''";
            }
            else if ($condition == "notempty")
            {
                $fc[] = "ifnull(" . $dataIndx . ",'')!=''";
            }
            else if ($condition == "less")
            {
                $fc[] = $dataIndx . " < ".$text;
            }
            else if ($condition == "between")
            {
                $fc[] = $dataIndx . " >= '".$text."' and ".$dataIndx . " <= '".$text2."'";
            }
            else if ($condition == "great")
            {
                $fc[] = $dataIndx . " > ".$text;
            }
        }
        $query = "";
        if (sizeof($filters) > 0)
        {
            $query = " " . join(" ".$mode." ", $fc);
        }

        $ds = new stdClass();
        $ds->query = $query;
        return $ds;
    }
}//end of class


//orders.php
$filterQuery = "";
$filterParam = array();
if ( isset($_GET["pq_filter"]))
{
    $pq_filter = khu_dau_vn_thay_phantram($_GET["pq_filter"]);
    $dsf = FilterHelper::deSerializeFilter($pq_filter);
    $filterQuery = " and ".($dsf->query);
}
$where_ct = " ";

$dbname = "dulieuchung";
$OBJ->re_query("CREATE TABLE {$dbname}.`phancongkhaithue_{$noiluu_phanmem}` ( `sott` BIGINT NOT NULL AUTO_INCREMENT , `tendoanhnghiep` VARCHAR(500) NOT NULL , `thang1` BIGINT NOT NULL , `thang2` BIGINT NOT NULL , `thang3` BIGINT NOT NULL , `thang4` BIGINT NOT NULL , `thang5` BIGINT NOT NULL , `thang6` BIGINT NOT NULL , `thang7` BIGINT NOT NULL , `thang8` BIGINT NOT NULL , `thang9` BIGINT NOT NULL , `thang10` BIGINT NOT NULL , `thang11` BIGINT NOT NULL , `thang12` BIGINT NOT NULL, `phidichvu` BIGINT NOT NULL, `nam` INT NOT NULL , `matong` INT NOT NULL , `ghichu` TEXT NOT NULL , `tendangnhap` CHAR(20) NOT NULL , `masothue` CHAR(14) NOT NULL , PRIMARY KEY (`sott`), INDEX (`tendangnhap`)) ENGINE = InnoDB;");

if($nam!="" && $tendangnhap!=""){
    $OBJ->re_query("INSERT INTO {$dbname}.phancongkhaithue_{$noiluu_phanmem}(masothue,tendoanhnghiep,tendangnhap,phidichvu,nam) select masothue,tencongty,nguoiphutrach,phidichvu,'{$nam}' nam FROM {$dbname}.danhsach_phancong_{$noiluu_phanmem} where masothue NOT in (select masothue FROM {$dbname}.phancongkhaithue_{$noiluu_phanmem} where nam='{$nam}');");
    $OBJ->re_query("INSERT INTO {$dbname}.phancongkhaithue_{$noiluu_phanmem}(masothue,tendoanhnghiep,tendangnhap,nam,matong) SELECT 'BHXH','BẢO HIỂM XÃ HỘI','{$tendangnhap}','{$nam}',1 where NOT EXISTS (select masothue FROM {$dbname}.phancongkhaithue_{$noiluu_phanmem} b where b.nam='{$nam}' and  tendangnhap='{$tendangnhap}' and masothue='BHXH');");
    $OBJ->re_query("INSERT INTO {$dbname}.phancongkhaithue_{$noiluu_phanmem}(masothue,tendoanhnghiep,tendangnhap,nam,matong) SELECT 'LUONGTHANG','LƯƠNG TẠM ỨNG','{$tendangnhap}','{$nam}',2 where NOT EXISTS (select masothue FROM {$dbname}.phancongkhaithue_{$noiluu_phanmem} b where b.nam='{$nam}' and  tendangnhap='{$tendangnhap}' and masothue='LUONGTHANG');");
}

$sql = "select * from {$dbname}.phancongkhaithue_{$noiluu_phanmem} where tendangnhap = '{$tendangnhap}' and nam='{$nam}' ORDER BY masothue,matong";
$query =$OBJ->re_query($sql);
$sott=1;
while ($result =$OBJ->re_fetch($query)){
    $data[] = $result;
}
echo "{\"data\":".json_encode($data) ."}" ;
?>