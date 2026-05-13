<?php
include("../../config.php");
$OBJ = new baocaothue();
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



$filterQuery = "";

$filterParam = array();

if ( isset($_GET["pq_filter"]))
{
    $pq_filter = khu_dau_vn($_GET["pq_filter"]);
    $dsf = FilterHelper::deSerializeFilter($pq_filter);
}
$OBJ->re_query("INSERT INTO `plthuetndnuudai` (`machitieu`, `chitieu`,`machitieucha`) VALUES ('2.1', ' - Thuế suất thuế thu nhập doanh nghiệp ưu đãi: [PhanTram]%','2')");
$OBJ->re_query("INSERT INTO `plthuetndnuudai` (`machitieu`, `chitieu`,`machitieucha`) VALUES ('2.2', ' - Thời hạn áp dụng thuế suất ưu đãi [SoNam] năm, kể từ năm [Nam]','2')");
$OBJ->re_query("INSERT INTO `plthuetndnuudai` (`machitieu`, `chitieu`,`machitieucha`) VALUES ('2.3', ' - Thời gian miễn thuế [SoNam] năm, kể từ năm [Nam]','2')");
$OBJ->re_query("INSERT INTO `plthuetndnuudai` (`machitieu`, `chitieu`,`machitieucha`) VALUES ('2.4', ' - Thời gian giảm 50% số thuế phải nộp: [SoNam] năm, kể từ năm [Nam]','2')");

$result = $OBJ->loadDanhSachToKhai_TNDN_PLmucdouudai();
//debug($result);
echo "{\"data\":".json_encode($result) ." }" ;
?>