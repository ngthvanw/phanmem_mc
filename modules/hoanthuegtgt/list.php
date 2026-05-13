<?php
include("../../config.php");
$loaitokhai = check_data($_GET['loaitokhai']);
$OBJ = new makhachhang;
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
            else if ($condition == "great")
            {
                $fc[] = $dataIndx . " > ".$text;                                                               
            }
            else if ($condition == "against")
            {
                //if($text!="") {
                //$fc[] = " MATCH " . $dataIndx . " AGAINST ('\"" . $text . "\" IN BOOLEAN MODE')";
                //}else{
                $fc[] = $dataIndx . " like '%".$text."%'";
                //}
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

$SQL_ThemBang = "CREATE TABLE `tokhai_hh_nhap_xuatkhau` ( `sott` INT NOT NULL AUTO_INCREMENT , `sophieu` CHAR(32) NOT NULL , `maloaihinh` CHAR(5) NOT NULL , `tokhaiso` CHAR(50) NOT NULL , `ngaydangky` DATE NOT NULL , `nuocnhapkhau` VARCHAR(200) NOT NULL , `giatringoaite` DOUBLE NOT NULL , `loaitien` CHAR(3) NOT NULL , `giatrivnd` BIGINT(20) NOT NULL , `chungtuthanhtoan` CHAR(50) NOT NULL , `ghichu` TEXT NOT NULL , `ngaytao` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , `loaitokhai` CHAR NOT NULL , PRIMARY KEY (`sott`), UNIQUE `sophieu` (`sophieu`)) ENGINE = InnoDB;";
$query = $OBJ->re_query($SQL_ThemBang);
//orders.php
$filterQuery = "";
$filterParam = array();

if ( isset($_GET["pq_filter"]))
{
    $pq_filter = khu_dau_vn($_GET["pq_filter"]);
    $dsf = FilterHelper::deSerializeFilter($pq_filter);
    $filterQuery = khu_dau_vn(str_replace("tenkh","tenkd",$dsf->query));
}
function loadList_ToKhai($loaitokhai,$filterQuery)
{
    global $OBJ;
    $trees = array();
    $fill = $filterQuery;
    if ($fill != "")
        $sql_w = " and " . $filterQuery;
    $sql = "SELECT * from tokhai_hh_nhap_xuatkhau WHERE loaitokhai = '".$loaitokhai."' $sql_w  order by sott ";
    $query_list = $OBJ->re_query($sql);
    while ($data = $OBJ->re_fetch($query_list)) {
        $trees[] = $data;
    }
    return $trees;
}
$data = loadList_ToKhai($loaitokhai,$filterQuery);
echo "{\"data\":".json_encode($data) ." }" ;
?>