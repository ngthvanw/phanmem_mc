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


//orders.php
$OBJ->re_query("CREATE TABLE `bangkemuavao_banra` ( `sott` INT NOT NULL AUTO_INCREMENT , `thang` CHAR(5) NOT NULL , `loaibangke` INT NOT NULL DEFAULT '1' , `gtmuavao` BIGINT NOT NULL , `thuemuavao` BIGINT NOT NULL , `dtbanra` BIGINT NOT NULL , `thuebanra` BIGINT NOT NULL , `teptin` VARCHAR(1000) NOT NULL , `nguoinhap` CHAR(20) NOT NULL , `ngaynhap` DATETIME NOT NULL , `ghichu` TEXT NOT NULL , PRIMARY KEY (`sott`)) ENGINE = InnoDB;");
$filterQuery = "";
$filterParam = array();

if ( isset($_GET["pq_filter"]))
{
    $pq_filter = khu_dau_vn_thay_phantram($_GET["pq_filter"]);
    $dsf = FilterHelper::deSerializeFilter($pq_filter);
    $filterQuery = khu_dau_vn(str_replace("tencongty","tenkd",$dsf->query));
}
if(isset($_GET['pq_filter'])){
    $result = $OBJ->loadListDanhSachBangKe_MuaVao_BanRa();
}else{
    $result = $OBJ->loadListDanhSachBangKe_MuaVao_BanRa();
}
echo "{\"data\":".json_encode($result,JSON_UNESCAPED_UNICODE) ." }" ;
?>