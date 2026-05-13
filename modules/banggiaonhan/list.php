<?php
include("../../config.php");
$OBJ = new phieukiemtra;
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
    $pq_filter = khu_dau_vn_thay_phantram($_GET["pq_filter"]);
    $dsf = FilterHelper::deSerializeFilter($pq_filter);
    $filterQuery = khu_dau_vn(str_replace("tencongty","tenkd",$dsf->query));
}
if(isset($_GET['pq_filter'])){
    if($_SESSION['Level']=="1"){
        $OBJ->set_orderby("  1=1 and ".$filterQuery);
    }else{
        $OBJ->set_orderby(" (nguoigiao='".$_SESSION['User']."' or  nguoinhan='".$_SESSION['User']."') and ".$filterQuery);
    }
    $result = $OBJ->loadListDanhSachGiaoNhan($noiluu_phanmem);
}else{
    if($_SESSION['Level']=="1"){
        $OBJ->set_orderby("  1=1  ".$filterQuery);
    }else{
        $OBJ->set_orderby(" (nguoigiao='".$_SESSION['User']."' or  nguoinhan='".$_SESSION['User']."') ".$filterQuery);
    }
     $result = $OBJ->loadListDanhSachGiaoNhan($noiluu_phanmem);
}
echo "{\"data\":".json_encode($result,JSON_UNESCAPED_UNICODE) ." }" ;
//debug($result);
?>