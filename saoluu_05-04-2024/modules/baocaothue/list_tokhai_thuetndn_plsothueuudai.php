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
$OBJ->re_query("INSERT INTO `plthuetndnuudai` (`machitieu`, `chitieu`,`machitieucha`) VALUES ('3', 'Xác định số thuế TNDN chênh lệch do doanh nghiệp hưởng thuế suất ưu đãi','3')");
$OBJ->re_query("INSERT INTO `plthuetndnuudai` (`machitieu`, `chitieu`,`machitieucha`) VALUES ('3.1', 'Tổng thu nhập tính thuế được hưởng thuế suất ưu đãi','3')");
$OBJ->re_query("INSERT INTO `plthuetndnuudai` (`machitieu`, `chitieu`,`machitieucha`) VALUES ('3.2', 'Thuế TNDN tính theo thuế suất ưu đãi','3')");
$OBJ->re_query("INSERT INTO `plthuetndnuudai` (`machitieu`, `chitieu`,`machitieucha`) VALUES ('3.3', 'Thuế TNDN tính theo thuế suất phổ thông (20%)','3')");
$OBJ->re_query("INSERT INTO `plthuetndnuudai` (`machitieu`, `chitieu`,`machitieucha`) VALUES ('3.4', 'Thuế TNDN chênh lệch ([4]=[3]-[2])','3')");
$OBJ->re_query("INSERT INTO `plthuetndnuudai` (`machitieu`, `chitieu`,`machitieucha`) VALUES ('4', 'Xác định số thuế được miễn, giảm trong kỳ tính thuế','3')");
$OBJ->re_query("INSERT INTO `plthuetndnuudai` (`machitieu`, `chitieu`,`machitieucha`) VALUES ('4.1', 'Tổng thu nhập tính thuế được miễn thuế hoặc giảm thuế','3')");
$OBJ->re_query("INSERT INTO `plthuetndnuudai` (`machitieu`, `chitieu`,`machitieucha`) VALUES ('4.2', 'Thuế suất thuế TNDN ưu đãi áp dụng (%)','3')");
$OBJ->re_query("INSERT INTO `plthuetndnuudai` (`machitieu`, `chitieu`,`machitieucha`) VALUES ('4.3', 'Thuế thu nhập doanh nghiệp phải nộp','3')");
$OBJ->re_query("INSERT INTO `plthuetndnuudai` (`machitieu`, `chitieu`,`machitieucha`) VALUES ('4.4', 'Tỷ lệ thuế TNDN được miễn hoặc giảm (%)','3')");
$OBJ->re_query("INSERT INTO `plthuetndnuudai` (`machitieu`, `chitieu`,`machitieucha`) VALUES ('4.5', 'Thuế TNDN được miễn, giảm','3')");

$OBJ->re_query("UPDATE `plthuetndnuudai` SET  chitieu = 'Thuế TNDN tính theo thuế suất phổ thông (20%)' WHERE machitieu = '3.3'");

$result = $OBJ->loadDanhSachToKhai_TNDN_PLsothueuudai();
//debug($result);
echo "{\"data\":".json_encode($result) ." }" ;
?>