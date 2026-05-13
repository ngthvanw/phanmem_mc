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
$filterQuery = "";
$filterParam = array();
$result = $OBJ->re_query("CREATE TABLE `danhsach_hopdong_daily` ( `sott` INT NOT NULL AUTO_INCREMENT , `namhd` INT(4) NOT NULL , `ngaybd` DATE NOT NULL , `ngaykt` DATE NOT NULL,`giadichvu` DOUBLE NOT NULL, `teptin` TEXT NOT NULL , `nguoinhap` CHAR NOT NULL , `ngaynhap` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , `ngaythaydoi` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , `ghichu` TEXT NOT NULL , PRIMARY KEY (`sott`)) ENGINE = InnoDB;");
if ( isset($_GET["pq_filter"]))
{
    $pq_filter = khu_dau_vn_thay_phantram($_GET["pq_filter"]);
    $dsf = FilterHelper::deSerializeFilter($pq_filter);
    $filterQuery = khu_dau_vn(str_replace("tencongty","tenkd",$dsf->query));
}
$result = $OBJ->loadListDanhSachHopDongDL();

echo "{\"data\":".json_encode($result,JSON_UNESCAPED_UNICODE) ." }" ;
?>