<?php
include("../../config.php");
$OBJ = new vonchusohuu();
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
$OBJ->set_orderby($filterQuery." tanggiam ='$loaiphieu'");
$result = $OBJ->loadListPSMaTaiSan();
$TongVonDieuLe=0;
$TongVonGop  =0;
$TongVonDieuLeTrongKy  =0;
$TongVonGopTrongKy  =0;
$TongVonChuaGop=0;
foreach ($result as $item){
    $TongVonDieuLe+=$item['vondieule'];
    $TongVonGop+=$item['vongop'];
    $TongVonDieuLeTrongKy+=$item['vondieuletrongky'];
    $TongVonGopTrongKy+=$item['vongoptrongky'];
    $TongVonChuaGop+=$item['vonchuagop'];
}
//debug($result);
$result_xuat = array("TongVonDieuLe"=>$TongVonDieuLe,"TongVonGop"=>$TongVonGop,"TongVonDieuLeTrongKy"=>$TongVonDieuLeTrongKy,"TongVonGopTrongKy"=>$TongVonGopTrongKy,"TongVonChuaGop"=>$TongVonChuaGop);
echo "{\"data\":".json_encode($result_xuat) ." }" ;
?>