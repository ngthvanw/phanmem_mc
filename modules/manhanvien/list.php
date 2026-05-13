<?php
include("../../config.php");
$OBJ = new manhanvien;
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
                $fc[] = $dataIndx . " = '".$text."'";                               
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


//orders.php
$filterQuery = "";
$filterParam = array();
if ( isset($_GET["pq_filter"]))
{
    $pq_filter = khu_dau_vn($_GET["pq_filter"]);
    $dsf = FilterHelper::deSerializeFilter($pq_filter);
    $filterQuery = khu_dau_vn(str_replace("tennv","manhanvien.tenkd",$dsf->query));
} 
$OBJ->set_orderby($filterQuery);   
$result = $OBJ->loadListMaNV();
$OBJ->re_query("ALTER TABLE `manhanvien` ADD `phicongdoan` BIGINT NOT NULL AFTER `phucapchucvu`;");
$OBJ->re_query("ALTER TABLE `manhanvien` ADD `baohiemyt` BIGINT NOT NULL AFTER `baohiem`, ADD `baohiemtn` BIGINT NOT NULL AFTER `baohiemyt`, ADD `kinhphicongdoan` BIGINT NOT NULL AFTER `baohiemtn`, ADD `dn_baohiem` BIGINT NOT NULL AFTER `kinhphicongdoan`, ADD `dn_baohiemyt` BIGINT NOT NULL AFTER `dn_baohiem`, ADD `dn_baohiemtn` BIGINT NOT NULL AFTER `dn_baohiemyt`;");

$OBJ->re_query("UPDATE bangluongnhanvien JOIN manhanvien 
                            ON bangluongnhanvien.manv = manhanvien.manhanvien
                            SET bangluongnhanvien.tennv = manhanvien.tennv,
                                bangluongnhanvien.chucvu = manhanvien.chucdanh,
                                bangluongnhanvien.socmnd = manhanvien.socmnd
							");
//debug($result);
echo "{\"data\":".json_encode($result) ." }" ;