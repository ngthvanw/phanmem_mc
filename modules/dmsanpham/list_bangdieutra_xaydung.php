<?php
include("../../config.php");
$OBJ = new dmsanpham();
$quy = $_GET['quy'];
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
                if($dataIndx=='tenvt')
                    $fc[] = $dataIndx . " like '%".khu_dau_vn($text)."%'";
                else
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
    $pq_filter = ($_GET["pq_filter"]);
    $dsf = FilterHelper::deSerializeFilter($pq_filter);
    $string = (str_replace("manhom","a.manhom",$dsf->query));
    $filterQuery = khu_dau_vn(str_replace("tenvt","tenkd",$string));
}
$OBJ->re_query(" insert into bangdieutraxaydung_congtrinh(mact,tenct,giatrihopdong,ngaykhoicong,ngayhoanthanh,quy,mactcha) select masp,tensp,gthopdong,ngaykhoicong,ngayhoanthanh,{$quy},maspcha from masp where loaisp='CT' and masp not in (select mact from bangdieutraxaydung_congtrinh where quy='{$quy}') ");

$OBJ->re_query(" DELETE FROM bangdieutraxaydung_congtrinh WHERE mact not in (select masp FROM masp) ");

$OBJ->re_query("UPDATE bangdieutraxaydung_congtrinh JOIN masp 
                            ON bangdieutraxaydung_congtrinh.mact = masp.masp
                            SET bangdieutraxaydung_congtrinh.giatrihopdong = masp.gthopdong,
                                bangdieutraxaydung_congtrinh.ngaykhoicong = masp.ngaykhoicong,
                                bangdieutraxaydung_congtrinh.ngayhoanthanh = masp.ngayhoanthanh,
                                bangdieutraxaydung_congtrinh.mactcha = masp.maspcha,
                                bangdieutraxaydung_congtrinh.tenct = masp.tensp
                            ");


if ( isset($_GET["pq_filter"]))
{
    $pq_filter = khu_dau_vn($_GET["pq_filter"]);
    $dsf = FilterHelper::deSerializeFilter($pq_filter);
    $dsf->query;
    $filterQuery = khu_dau_vn(str_replace("tensp","tenkd",$dsf->query));
}
if($filterQuery==""){
    $filterQuery.=" quy='{$quy}'";
}else{
    $filterQuery.=" and quy='{$quy}'";
}
$OBJ->set_orderby($filterQuery);
if(isset($_GET['pq_filter'])){
    $result = $OBJ->loadListMaCT_DOANHTHUTHUCTE_W();
}else{
    $result = $OBJ->loadListMaCT_BANGDIEUTRAXAYDUNG();
}
echo "{\"data\":".json_encode($result) ." }" ;
?>