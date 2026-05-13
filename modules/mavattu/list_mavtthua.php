<?php
include("../../config.php");
$OBJ = new mavattu;
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
    $filterQuery = khu_dau_vn(str_replace(array('mavt','tenvt'), array('mavt.mavt','mavt.tenkd'),$dsf->query));
}
			
$OBJ->set_orderby($filterQuery);

$pq_curPage = $_GET["pq_curpage"];
$pq_rPP=$_GET["pq_rpp"];

$sql = "SELECT mavt.mavt,mavt.tenvt,sum(tk.slck) as soluongdk,sum(chitiet_psvt.soluongnhap) as soluongps FROM mavt left join tk on (mavt.mavt = tk.mavt) left join chitiet_psvt on (mavt.mavt = chitiet_psvt.mavt) WHERE 0=0 $sql_w GROUP BY mavt.mavt HAVING soluongdk is null and soluongps is null  order by mavt.tenkd ";

$query = $OBJ->re_query($sql);
$res = $OBJ->re_num_rows($query);
$total_Records = $res;

$skip = ($pq_rPP * ($pq_curPage - 1));

if ($skip >= $total_Records)
{
    $pq_curPage = ceil($total_Records / $pq_rPP);
    $skip = ($pq_rPP * ($pq_curPage - 1));
}
if($pq_rPP==""){
    $pq_rPP=200;
    $skip=0;
    $pq_curPage=0;
}
if($skip<0){
    $skip=0;
}
$OBJ->setLimit(" limit ".$skip." , ".$pq_rPP);

$result = $OBJ->loadListMaVT_DuThua();
echo "{\"totalRecords\":" . $total_Records . ",\"curPage\":" . $pq_curPage . ",\"data\":".json_encode($result) ." }" ;?>
