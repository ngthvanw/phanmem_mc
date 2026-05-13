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
$OBJ->re_query("INSERT INTO `plthuetndnuudai` (`machitieu`, `chitieu`,`machitieucha`) VALUES ('1.1', 'Doanh nghiệp sản xuất mới thành lập từ dự án đầu tư.','1')");
$OBJ->re_query("INSERT INTO `plthuetndnuudai` (`machitieu`, `chitieu`,`machitieucha`) VALUES ('1.2', 'Doanh nghiệp di chuyển địa điểm ra khỏi đô thị theo quy hoạch đã được cơ quan có thẩm quyền phê duyệt.','1')");
$OBJ->re_query("INSERT INTO `plthuetndnuudai` (`machitieu`, `chitieu`,`machitieucha`) VALUES ('1.3', 'Doanh nghiệp mới thành lập từ dự án đầu tư vào ngành nghề, lĩnh vực ưu đãi đầu tư.','1')");
$OBJ->re_query("INSERT INTO `plthuetndnuudai` (`machitieu`, `chitieu`,`machitieucha`) VALUES ('1.4', 'Doanh nghiệp mới thành lập từ dự án đầu tư vào ngành nghề, lĩnh vực đặc biệt ưu đãi đầu tư.','1')");
$OBJ->re_query("INSERT INTO `plthuetndnuudai` (`machitieu`, `chitieu`,`machitieucha`) VALUES ('1.5', 'Doanh nghiệp mới thành lập từ dự án đầu tư vào nghành nghề, lĩnh vực ưu đãi đầu tư theo quy định tại Nghị định số 124/2008/NĐ-CP.','1')");
$OBJ->re_query("INSERT INTO `plthuetndnuudai` (`machitieu`, `chitieu`,`machitieucha`) VALUES ('1.6', 'Doanh nghiệp mới thành lập từ dự án đầu tư vào địa bàn thuộc Danh mục địa bàn có điều kiện kinh tế - xã hội khó khăn.','1')");
$OBJ->re_query("INSERT INTO `plthuetndnuudai` (`machitieu`, `chitieu`,`machitieucha`) VALUES ('1.7', 'Doanh nghiệp mới thành lập từ dự án đầu tư vào địa bàn thuộc Danh mục địa bàn có điều kiện kinh tế - xã hội đặc biệt khó khăn, khu kinh tế, khu công nghệ cao.','1')");
$OBJ->re_query("INSERT INTO `plthuetndnuudai` (`machitieu`, `chitieu`,`machitieucha`) VALUES ('1.8', 'Doanh nghiệp thành lập mới trong lĩnh vực xã hội hoá hoặc có thu nhập từ hoạt động xã hội hoá.','1')");
$OBJ->re_query("INSERT INTO `plthuetndnuudai` (`machitieu`, `chitieu`,`machitieucha`) VALUES ('1.9', 'Hợp tác xã dịch vụ nông nghiệp, Quỹ tín dụng nhân dân.','1')");
$OBJ->re_query("INSERT INTO `plthuetndnuudai` (`machitieu`, `chitieu`,`machitieucha`) VALUES ('1.10', 'Ưu đãi theo Giấy phép đầu tư, Giấy chứng nhận ưu đãi đầu tư.','1')");
$OBJ->re_query("INSERT INTO `plthuetndnuudai` (`machitieu`, `chitieu`,`machitieucha`) VALUES ('1.11', ' Ưu đãi khác')");

$result = $OBJ->loadDanhSachToKhai_TNDN_PLdkuudai();
//debug($result);
echo "{\"data\":".json_encode($result) ." }" ;
?>