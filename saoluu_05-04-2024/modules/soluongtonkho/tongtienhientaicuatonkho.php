<?php	

include("../../config.php");

$OBJCT = new soluongton();
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
                if($text!="")
                    $fc[] = $dataIndx . " like '%".$text."%'";
            }
            else if ($condition == "notcontain")
            {
                if($text!="")
                    $fc[] = $dataIndx . " not like '%" .$text."%'";
            }
            else if ($condition == "begin") {
                if($text!="")
                    $fc[] = $dataIndx . " like '%" . $text . "%'";
            }
            else if ($condition == "end")
            {
                if($text!="")
                    $fc[] = $dataIndx . " like ".$text;
            }
            else if ($condition == "equal")
            {
                if($text!="" && $dataIndx!='tennhom' and $dataIndx!='tenkho' and $dataIndx!='quycach')
                    $fc[] = $dataIndx . " = ".$text;
            }
            else if ($condition == "notequal")
            {
                if($text!="")
                    $fc[] = $dataIndx . " != ".$text;
            }
            else if ($condition == "empty")
            {
                if($text!="")
                    $fc[] = "ifnull(" . $dataIndx . ",'')=''";
            }
            else if ($condition == "notempty")
            {
                if($text!="")
                    $fc[] = "ifnull(" . $dataIndx . ",'')!=''";
            }
            else if ($condition == "less" ||$condition == "lte")
            {
                if($text!="")
                    $fc[] = $dataIndx . " <= ".$text;
            }
            else if ($condition == "great" ||$condition == "gte")
            {
                if($text!="")
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
    $pq_filter = ($_GET["pq_filter"]);
    $dsf = FilterHelper::deSerializeFilter($pq_filter);
    $search  = array('makho', 'manhom','tenvt','dvt','matk','mavt','thaythe');
    $replace = array('makho.makho', 'manhom.manhom','thaythe.tenkd','thaythe.dvt','tk.matk','thaythe.mavt','mavt');
    $string= (str_replace($search,$replace,$dsf->query));
    $filterQuery = $string;
}
$OBJCT->set_orderby(trim($filterQuery));
$data = $OBJCT->layTongTienTonKho();
echo "{\"data\":".json_encode($data) ." }" ;


