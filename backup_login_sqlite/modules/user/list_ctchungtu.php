<?php
include("../../config.php");
$masothue = $_GET['masothue'];
$ngaynhap = $_GET['ngaynhap'];
$tencongty = $_GET['tencongty'];
$tendangnhap = $_GET['tendangnhap'];
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
$cnn_db = mysql_connect($mysql_host, $mysql_username, $mysql_password);
$dbname_db = $_SESSION['TIENTO'].$masothue."_".$_SESSION['NienDo'];
mysql_select_db($dbname_db, $cnn_db);
$sql_count = "select count(sott) as soluong,'PHIẾU THU' as loaiphieu from chitiet_pskt where thoigiannhap>='".$ngaynhap." 00:00:00' and thoigiannhap<='".$ngaynhap." 23:59:59' and loaiphieu=1
				union all
				select count(sott) as soluong,'PHIẾU CHI' as loaiphieu from chitiet_pskt where thoigiannhap>='".$ngaynhap." 00:00:00' and thoigiannhap<='".$ngaynhap." 23:59:59' and loaiphieu=2
			union all
			  select count(sott) as soluong,'PHIẾU NHẬP KHO' as loaiphieu from psvt where thoigiannhap>='".$ngaynhap." 00:00:00' and thoigiannhap<='".$ngaynhap." 23:59:59' and loaiphieu=1
			  union all
			  select count(sott) as soluong,'PHIẾU XUẤT KHO' as loaiphieu from psvt where thoigiannhap>='".$ngaynhap." 00:00:00' and thoigiannhap<='".$ngaynhap." 23:59:59' and loaiphieu=2
			  union all
			  select count(sott) as soluong,'PHIẾU GHI NỢ' as loaiphieu from chitiet_pskt where thoigiannhap>='".$ngaynhap." 00:00:00' and thoigiannhap<='".$ngaynhap." 23:59:59' and loaiphieu=3
			  union all
			  select count(sott) as soluong,'PHIẾU GHI CÓ' as loaiphieu from chitiet_pskt where thoigiannhap>='".$ngaynhap." 00:00:00' and thoigiannhap<='".$ngaynhap." 23:59:59' and loaiphieu=4
			  union all
			  select count(sott) as soluong,'PHIẾU NH RÚT RA' as loaiphieu from chitiet_pskt where thoigiannhap>='".$ngaynhap." 00:00:00' and thoigiannhap<='".$ngaynhap." 23:59:59' and loaiphieu>=5 and loaiphieu<=64 and loaiphieu%2!=0
			  union all
			  select count(sott) as soluong,'PHIẾU NH GỬI VÀO' as loaiphieu from chitiet_pskt where thoigiannhap>='".$ngaynhap." 00:00:00' and thoigiannhap<='".$ngaynhap." 23:59:59' and loaiphieu>=5 and loaiphieu<=64 and loaiphieu%2=0
";
$query_count = mysql_query($sql_count,$cnn_db);
$tongsl = 0;
while ($result_count = mysql_fetch_assoc($query_count)){
	$result_count['masothue']=$masothue;
	$result_count['tencongty']=$tencongty;
	$result_count['ngaynhap']=$ngaynhap;
	$result_count['tendangnhap']=$tendangnhap;
	$data[] = $result_count;
}
mysql_close($cnn_db);

echo "{\"data\":".json_encode($data) ." }" ;
?>