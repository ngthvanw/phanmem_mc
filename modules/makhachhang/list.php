<?php
include("../../config.php");
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


//orders.php
$filterQuery = "";
$filterParam = array();
$pq_curPage = $_GET["pq_curpage"];
    $pq_rPP=$_GET["pq_rpp"];
    if(isset($_GET['pq_filter'])){
    $sql = "Select count(*) as dong from makh where ";
}else{
     $sql = "Select count(*) as dong from makh where makh=0 ";
}
    
    
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
		$pq_rPP=100;
		$skip=0;
		$pq_curPage=0;
	}
	if($skip<0){
		$skip=0;
	}
$OBJ->setLimit(" limit ".$skip." , ".$pq_rPP);

if ( isset($_GET["pq_filter"]))
{
    $pq_filter = khu_dau_vn($_GET["pq_filter"]);
    $dsf = FilterHelper::deSerializeFilter($pq_filter);
    $filterQuery = khu_dau_vn(str_replace("tenkh","tenkd",$dsf->query));
}
$OBJ->re_query("UPDATE makh set sott=stt WHERE sott=0");
$OBJ->re_query("ALTER TABLE makh DROP INDEX FullTenKD;");
$OBJ->re_query("ALTER TABLE `makh` CHANGE `sott` `sott` BIGINT UNSIGNED NOT NULL;");
$OBJ->re_query("ALTER TABLE `makh` ADD `stt` INT NOT NULL AUTO_INCREMENT, ADD UNIQUE `stt` (`stt`);");

$OBJ->set_orderby($filterQuery);
if(isset($_GET['pq_filter'])){
    $result = $OBJ->loadListMaKH_W();
}else{
     $result = $OBJ->loadListMaKH();
}
echo "{\"data\":".json_encode($result,JSON_UNESCAPED_UNICODE) ." }" ;
//debug($result);
?>