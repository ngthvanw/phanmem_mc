<?php
include("../../config.php");
$OBJ = new baocaothue();
$OBJ->re_query("CREATE TABLE `plgdlk` 
                                    ( `sott` INT NOT NULL AUTO_INCREMENT , 
                                      `maso` CHAR(10) NOT NULL , 
                                      `namps` INT(5) NOT NULL,
                                      `chiphilaivay` BIGINT NOT NULL , 
                                      `laitiengui` BIGINT NOT NULL , 
                                      `laivaytrutiengui` BIGINT NOT NULL , 
                                      `chiphikhauhao` BIGINT NOT NULL , 
                                      `loinhuanthuan` BIGINT NOT NULL , 
                                      `ebitda` BIGINT NOT NULL , 
                                      `laivayduoctru` BIGINT NOT NULL , 
                                      `chiphilaivaykhongduoctru` BIGINT NOT NULL , 
                                      `chiphilaivaykhongduoctruchuyentiep` BIGINT NOT NULL , 
                                      `ghichu` TEXT NOT NULL , 
                    PRIMARY KEY (`sott`), UNIQUE `umaso` (`maso`)) ENGINE = InnoDB;");
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


//orders.php
$filterQuery = "";

$filterParam = array();

if ( isset($_GET["pq_filter"]))
{
    $pq_filter = khu_dau_vn($_GET["pq_filter"]);
    $dsf = FilterHelper::deSerializeFilter($pq_filter);
}
$nam = $_SESSION['NienDo'];
$val="";
$namnamtruoc = $nam-5;

for ($i=($nam);$i>=$namnamtruoc;$i--){
    $val= "('".$i."','".$nam.'_'.$i."')";
    $OBJ->re_query("insert into plgdlk(namps,maso) value ".$val);
}
$result = $OBJ->loadDanhSachToKhai_TNDN_PLGDLK($_SESSION['NienDo']);

echo "{\"data\":".json_encode($result) ." }" ;
?>