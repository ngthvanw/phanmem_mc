<?php
include("../../config.php");
$OBJ = new soluongton();
$OBJKHO = new makho();
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

$filterQuery = "";
$filterParam = array();

if ( isset($_GET["pq_filter"]))
{
    $pq_filter = ($_GET["pq_filter"]);
    $dsf = FilterHelper::deSerializeFilter($pq_filter);
    $search  = array('makho', 'manhom','tenvt','dvt','matk','mavt','thaythe');
    $replace = array('makho.makho', 'manhom.manhom','thaythe.tenkd','thaythe.dvt','tk.matk','thaythe.mavt','mavt');
    $string= (str_replace($search,$replace,$dsf->query));
    $filterQuery = $string;
}
$OBJ->re_query("UPDATE tk,mavt
                SET tk.tenvt = mavt.tenvt,
                    tk.matk = mavt.matk,
                    tk.dvt = mavt.dvt,
                    tk.rate = mavt.rate,
                    tk.manhom = mavt.manhom
                WHERE tk.mavt = mavt.mavt");
$OBJ->re_query("UPDATE tk
                SET dgxvnd = 0
                WHERE slck = 0");//// Xoá thành tiền nếu số lượng cuối kỳ là 0

///
$OBJ->set_orderby(trim($filterQuery));
$result = $OBJ->loadListMaVT();
echo "{\"data\":".json_encode($result) ." }" ;
?>