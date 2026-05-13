<?php
include("../../config.php");
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

$mysql_host = $_SESSION['HOST'];
$mysql_username = $_SESSION['USER_DB'];
// MySQL password
$mysql_password = $_SESSION['PASS_DB'];
$cnn = mysql_connect($mysql_host, $mysql_username, $mysql_password);
$dbname = "dulieuchung";
mysql_select_db($dbname, $cnn);

$sql = "select * from logfile_user_{$noiluu_phanmem} where 0=0 $filterQuery GROUP BY tendangnhap,tendatabase order by sott DESC limit 0,100";
$query = mysql_query($sql,$cnn);
$sott=1;
while ($result = mysql_fetch_assoc($query)){
	
	$cnn_db = mysql_connect($mysql_host, $mysql_username, $mysql_password);
	$dbname_db = $_SESSION['TIENTO'].$result['tendatabase']."_".$_SESSION['NienDo'];
	mysql_select_db($dbname_db, $cnn_db);
	$sql_count = "select count(sott) as sodong from nhatkykiemphieu where loaiphieu='9'";

	$query_count = mysql_query($sql_count,$cnn_db);
	$tongsltokhai = 0;
	$result_count = mysql_fetch_assoc($query_count);
    $tongsltokhai=$result_count['sodong'];
    $result['sltokhai'] = $tongsltokhai;

    $sql_count_ = "select count(sott) as sodong from nhatkykiemphieu where loaiphieu='10'";
    $query_count_ = mysql_query($sql_count_,$cnn_db);
    $tongslhoadon = 0;
    $result_count = mysql_fetch_assoc($query_count_);
    $tongslhoadon=$result_count['sodong'];
    $result['slhoadon'] = $tongslhoadon;
	mysql_close($cnn_db);
    $data[] = $result;
    $sott++;
}
//debug($data);
//$result = $OBJ->loadListPhieuKiemTra();
mysql_close($cnn);
echo "{\"data\":".json_encode($data) ." }" ;
?>