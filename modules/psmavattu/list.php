<?php
include("../../config.php");
$OBJ = new psmavattu();
$OBJCT = new ps_chitiet_mavattu();

$OBJCT->xoachitietvattu();
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
                $fc[] = "MONTH(".$dataIndx . ") >= ".$text;
                $fc[] = "MONTH(".$dataIndx . ") <= ".$filter->value2;
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
$LoaiPhieu = $_GET['loaiphieu'];
$OBJ->setLP($LoaiPhieu);
$filterParam = array();

if ( isset($_GET["pq_filter"]))
{
    $pq_filter = ($_GET["pq_filter"]);
    $dsf = FilterHelper::deSerializeFilter($pq_filter);
    $string = (str_replace("manhom","mavt.manhom",$dsf->query));
    $filterQuery = (str_replace("makh","makh",$string));
} 
//echo $filterQuery;
$OBJ->set_orderby($filterQuery);

$pq_curPage = $_GET["pq_curpage"];
$pq_rPP=$_GET["pq_rpp"];

if ($filterQuery != "")
    $sql_w = " and " . $filterQuery;

$sql = "SELECT count(sott) as dong FROM psvt WHERE loaiphieu='" . $LoaiPhieu . "' {$sql_w}";

$query = $OBJ->re_query($sql);
$res = $OBJ->re_fetch($query);
$total_Records = $res['dong'];

$skip = ($pq_rPP * ($pq_curPage - 1));

if ($skip >= $total_Records)
{
    $pq_curPage = ceil($total_Records / $pq_rPP);
    $skip = ($pq_rPP * ($pq_curPage - 1));
}
if($pq_rPP==""){
    $pq_rPP=150;
    $skip=0;
    $pq_curPage=0;
}
if($skip<0){
    $skip=0;
}
$OBJ->setLimit(" limit ".$skip." , ".$pq_rPP);

$result = $OBJ->loadListPSVT();

echo "{\"totalRecords\":" . $total_Records . ",\"curPage\":" . $pq_curPage . ",\"data\":".json_encode($result) ." }" ;
?>