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
$cnn = mysqli_connect($mysql_host, $mysql_username, $mysql_password);
$dbname = "dulieuchung";
mysqli_select_db($cnn,$dbname);

$sql = "select * from logfile_user_{$noiluu_phanmem} where 0=0 $filterQuery order by sott DESC limit 0,100";
$query = mysqli_query($cnn,$sql);
$sott=1;
while ($result = mysqli_fetch_assoc($query)){
	
	$cnn_db = mysqli_connect($mysql_host, $mysql_username, $mysql_password);
	$dbname_db = $_SESSION['TIENTO'].$result['tendatabase']."_".$_SESSION['NienDo'];
	mysqli_select_db($cnn_db,$dbname_db);
	$sql_count = "select count(sott) as sodong from chitiet_pskt where thoigiannhap>='".$result['ngaynhap']." 00:00:00' and thoigiannhap<='".$result['ngaynhap']." 23:59:59'
				union all
				 select count(sott) as sodong from psvt where thoigiannhap>='".$result['ngaynhap']." 00:00:00' and thoigiannhap<='".$result['ngaynhap']." 23:59:59'
	";
	$query_count = mysqli_query($cnn_db,$sql_count);
	$tongsl = 0;
	while ($result_count = mysqli_fetch_assoc($query_count)){
		$tongsl+=$result_count['sodong'];
	}
	$result['slchungtu'] = $tongsl;
	mysqli_close($cnn_db);
    $data[] = $result;
    $sott++;
}
//debug($data);
//$result = $OBJ->loadListPhieuKiemTra();
mysqli_close($cnn);
echo "{\"data\":".json_encode($data) ." }" ;
?>