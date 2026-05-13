<?php
include("../../config.php");
$OBJ = new dmsanpham();
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
                if($dataIndx=='tenvt')
                    $fc[] = $dataIndx . " like '%".khu_dau_vn($text)."%'";
                else
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

$result = $OBJ->loadListSoDuTruVLSX();//

$thang1=0;
$thang2=0;
$thang3=0;
$thang4=0;
$thang5=0;
$thang6=0;
$thang7=0;
$thang8=0;
$thang9=0;
$thang10=0;
$thang11=0;
$thang12=0;
$thang13=0;
foreach ($result as $item){
    $thang1+=$item['thang1'];
    $thang2+=$item['thang2'];
    $thang3+=$item['thang3'];
    $thang4+=$item['thang4'];
    $thang5+=$item['thang5'];
    $thang6+=$item['thang6'];
    $thang7+=$item['thang7'];
    $thang8+=$item['thang8'];
    $thang9+=$item['thang9'];
    $thang10+=$item['thang10'];
    $thang11+=$item['thang11'];
    $thang12+=$item['thang12'];
}
$result_xuat = array(
                    "thang1"=>$thang1,
                    "thang2"=>$thang2,
                    "thang3"=>$thang3,
                    "thang4"=>$thang4,
                    "thang5"=>$thang5,
                    "thang6"=>$thang6,
                    "thang7"=>$thang7,
                    "thang8"=>$thang8,
                    "thang9"=>$thang9,
                    "thang10"=>$thang10,
                    "thang11"=>$thang11,
                    "thang12"=>$thang12,
                    );
echo "{\"data\":".json_encode($result_xuat) ." }" ;
?>