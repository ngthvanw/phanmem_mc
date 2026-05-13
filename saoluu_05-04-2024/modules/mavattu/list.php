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
            }else if ($condition == "against"){
                if($text!="") {
					$text = trim($text);
					$fc[] = " MATCH (" . $dataIndx . ") AGAINST ('+" . str_replace(" "," +",$text) . "*' IN BOOLEAN MODE)";
                }else{
					$fc[] = $dataIndx . " like '%".$text."%'";
                }
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
    $string = khu_dau_vn(str_replace("manhom","mavt.manhom",$dsf->query));
    $filterQuery = khu_dau_vn(str_replace("tenvt","tenkd",$string));
}
database::re_query("INSERT INTO `manhom` (`sott`, `manhom`, `tennhom`, `ghichu`, `rank`) VALUES ('100', '1100', 'Thành phẩm', '', '0');");
database::re_query("insert into mavt(mavt,tenvt,dvt,matk,manhom,tennhom,tenkd,`rate`,tkdoanhthu) select masp,tensp,dvt,'155','1100','Thành Phẩm',tenkd,10,'5112' from masp where masp not in (SELECT mavt from mavt) and loaisp='SP'");
database::re_query("UPDATE mavt JOIN masp 
                            ON mavt.mavt = masp.masp and masp.loaisp='SP'
                            SET mavt.tenvt = masp.tensp,
                            mavt.dvt = masp.dvt,
                            mavt.tenkd = masp.tenkd");
			
$OBJ->set_orderby($filterQuery);

$pq_curPage = $_GET["pq_curpage"];
$pq_rPP=$_GET["pq_rpp"];

$sql = "Select count(*) as dong from mavt";

$query = database::re_query($sql);
$res = database::re_fetch($query);
$total_Records = $res['dong'];

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

$OBJ->re_query("UPDATE mavt set sott=stt WHERE sott=0");
$OBJ->re_query("ALTER TABLE mavt DROP INDEX FullTenKD;");
$OBJ->re_query("ALTER TABLE `mavt` CHANGE `sott` `sott` BIGINT UNSIGNED NOT NULL;");
$OBJ->re_query("ALTER TABLE `mavt` ADD `stt` INT NOT NULL AUTO_INCREMENT, ADD UNIQUE `stt` (`stt`);");

$result = $OBJ->loadListMaVT();

echo "{\"totalRecords\":" . $total_Records . ",\"curPage\":" . $pq_curPage . ",\"data\":".json_encode($result) ." }" ;?>
