<?php
include("../../config.php");
$OBJ = new mataisan();
class ColumnHelper
{
    public static function isValidColumn($dataIndx)
    {
        if (preg_match('/^[a-z,A-Z_]*$/', $dataIndx))
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
            else if ($condition == "less" ||$condition == "lte")
            {
                $fc[] = $dataIndx . " <= ".$text;
            }
            else if ($condition == "great" ||$condition == "gte")
            {
                $fc[] = $dataIndx . " >= ".$text;
            }
            else if ($condition == "between")
            {
                $fc[] = $dataIndx . " >= ".$text;
                $fc[] = $dataIndx . " <= ".$filter->value2;
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

$OBJ->re_query("CREATE TABLE `sanluong_khauhao_taisan` ( `sott` BIGINT NOT NULL AUTO_INCREMENT , `mats` VARCHAR(20) NOT NULL,`matscha` VARCHAR(20) NOT NULL , `tents` VARCHAR(1000) NOT NULL , `thang1` BIGINT NOT NULL DEFAULT '0' , `thang2` BIGINT NOT NULL DEFAULT '0' , `thang3` BIGINT NOT NULL DEFAULT '0' , `thang4` BIGINT NOT NULL DEFAULT '0' , `thang5` BIGINT NOT NULL DEFAULT '0' , `thang6` BIGINT NOT NULL DEFAULT '0' , `thang7` BIGINT NOT NULL DEFAULT '0' , `thang8` BIGINT NOT NULL DEFAULT '0' , `thang9` BIGINT NOT NULL DEFAULT '0' , `thang10` BIGINT NOT NULL DEFAULT '0' , `thang11` BIGINT NOT NULL DEFAULT '0' , `thang12` BIGINT NOT NULL DEFAULT '0' , `tongcong` BIGINT NOT NULL,`tenkd` VARCHAR(1000) NOT NULL , PRIMARY KEY (`sott`)) ENGINE = InnoDB;");
$OBJ->re_query("ALTER TABLE `sanluong_khauhao_taisan` ADD UNIQUE(`mats`);");
$OBJ->re_query("INSERT INTO sanluong_khauhao_taisan(mats,tents,matscha,tenkd) SELECT mats,tents,matscha,tenkd FROM mats");
$OBJ->re_query("UPDATE `sanluong_khauhao_taisan` set tongcong = thang1+thang2+thang3+thang4+thang5+thang6+thang7+thang8+thang9+thang10+thang11+thang12");
$OBJ->re_query("UPDATE mats a INNER JOIN sanluong_khauhao_taisan b ON a.mats = b.mats SET b.tents = a.tents,b.tenkd = a.tenkd");

$filterQuery = "";
$filterParam = array();
if (isset($_GET["pq_filter"]))
{
    $pq_filter = khu_dau_vn($_GET["pq_filter"]);
    $dsf = FilterHelper::deSerializeFilter($pq_filter);
    $filterQuery = khu_dau_vn(str_replace("tents","tenkd",$dsf->query));
}
//echo $filterQuery;
$OBJ->set_orderby($filterQuery);
if(isset($_GET['pq_filter'])){
    $result = $OBJ->loadListAllDSMaTaiSan_SanLuong_W();
}else{
    $result = $OBJ->loadListAllDSMaTaiSan_SanLuong();
}
echo "{\"data\":".json_encode($result) ." }" ;
?>