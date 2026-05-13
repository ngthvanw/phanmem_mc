<?php
include("../../config.php");
$tendatabase = $_GET['tendatabase'];
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
$dbname = $tendatabase;
mysqli_select_db($cnn,$dbname);


mysqli_query($cnn,"INSERT duyetbangcdtk(tentk,matk,nodk,codk,nops,cops,nock,cock,cap,_nock,_cock,matkcha) SELECT tentk,matk,nodk,codk,nops,cops,nock,cock,cap,_nock,_cock,matkcha FROM bangcdtk where matk NOT in (select matk FROM duyetbangcdtk);");

mysqli_query($cnn,"DELETE FROM duyetbangcdtk WHERE matk not in (select matk FROM bangcdtk) ");

mysqli_query($cnn,"UPDATE duyetbangcdtk JOIN bangcdtk 
                            ON duyetbangcdtk.matk = bangcdtk.matk
                            SET
                             duyetbangcdtk.nodk = bangcdtk.nodk,
                                duyetbangcdtk.codk = bangcdtk.codk,
                                duyetbangcdtk.nops = bangcdtk.nops,
                                duyetbangcdtk.cops = bangcdtk.cops,
                                duyetbangcdtk.nock = bangcdtk.nock,
                                duyetbangcdtk.cock = bangcdtk.cock
                                ");

$sql = "select duyetbangcdtk.* from duyetbangcdtk INNER join bangcdtk on (duyetbangcdtk.matk = bangcdtk.matk ) ORDER by bangcdtk.sott";
$query = mysqli_query($cnn,$sql);
while ($result = mysqli_fetch_assoc($query)){
    $data[] = $result;
}

mysqli_close($cnn);

echo "{\"data\":".json_encode($data) ." }" ;
?>