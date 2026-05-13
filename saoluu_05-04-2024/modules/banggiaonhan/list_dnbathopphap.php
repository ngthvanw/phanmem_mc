<?php
include("../../config.php");
$OBJ = new phieukiemtra;
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

$OBJ->re_query("CREATE DATABASE dulieuchung;");
$OBJ->re_query("CREATE TABLE `dulieuchung`.`doanhnghiep_bathopphap` ( `sott` BIGINT NOT NULL AUTO_INCREMENT , `masothue` CHAR(20) NOT NULL , `tencongty` VARCHAR(500) NOT NULL , `diachi` TEXT NOT NULL , `nguoigui` CHAR(20) NOT NULL , `ngaygui` DATETIME NOT NULL , `ghichu` TEXT NOT NULL , `tenkd` VARCHAR(500) NOT NULL , PRIMARY KEY (`sott`), UNIQUE (`masothue`)) ENGINE = InnoDB;");
$OBJ->re_query("ALTER TABLE `dulieuchung`.`doanhnghiep_bathopphap` ADD `nguonthongtin` VARCHAR(50) NOT NULL;");
$filterQuery = "";
$filterParam = array();

if ( isset($_GET["pq_filter"]))
{
    $pq_filter = khu_dau_vn_thay_phantram($_GET["pq_filter"]);
    $dsf = FilterHelper::deSerializeFilter($pq_filter);
    $filterQuery = khu_dau_vn(str_replace("tencongty","tenkd",$dsf->query));
}
$OBJ->set_orderby($filterQuery);
$result = $OBJ->loadListDanhSach_DNBatHopPhap("");

echo "{\"data\":".json_encode($result,JSON_UNESCAPED_UNICODE) ." }" ;
//debug($result);
?>