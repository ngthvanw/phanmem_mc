<?php
include("../../config.php");
$ListDSCongTy = $_SESSION['LISTDN'];
$ALL = false;
if(in_array('ALL', $ListDSCongTy)){
    $ALL = true;
}else{
    $ALL = false;
}
$string_DSCT =  implode("','",$ListDSCongTy);
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
            $text2 = $filter->value2;
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
            else if ($condition == "between")
            {
                $fc[] = $dataIndx . " >= '".$text."' and ".$dataIndx . " <= '".$text2."'";
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
    $filterQuery = " and ".khu_dau_vn($dsf->query);
}
$where_ct = " ";
if($ALL){

}else{
    $where_ct = " and masothue in ('{$string_DSCT}') ";
}
$mysql_host = $_SESSION['HOST'];
$mysql_username = $_SESSION['USER_DB'];
// MySQL password
$mysql_password = $_SESSION['PASS_DB'];
$cnn = mysql_connect($mysql_host, $mysql_username, $mysql_password);
$dbname = "dulieuchung";
mysql_select_db($dbname, $cnn);

$sql = "select * from (select *,1 sapxep from danhsach_congty_trinhky_{$noiluu_phanmem} where trangthai= 'CD'
        UNION ALL 
        select *,2 sapxep from danhsach_congty_trinhky_{$noiluu_phanmem} where trangthai= 'TL'
        UNION ALL 
        select *,3 sapxep from danhsach_congty_trinhky_{$noiluu_phanmem} where trangthai= 'TN' 
        UNION ALL 
        select *,4 sapxep from danhsach_congty_trinhky_{$noiluu_phanmem} where trangthai= 'DD' ) as x where 0=0 $filterQuery $where_ct order by niendo DESC,sapxep";
$query = mysql_query($sql,$cnn);
$sott=1;
while ($result = mysql_fetch_assoc($query)){

	$result['slchungtu'] = $tongsl;
	mysql_close($cnn_db);
    $data[] = $result;
    $sott++;
}

mysql_close($cnn);
echo "{\"data\":".json_encode($data) ." }" ;
?>