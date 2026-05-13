<?php
include("../../config.php");
$masp = $_GET['masp'];
$mahm = $_GET['mahm'];
$xemtonghop = $_GET['xemtonghop'];
$list = $_GET['list'];
$OBJ = new dmsanpham();

class ColumnHelper
{
    public static function isValidColumn($dataIndx)
    {
        if (preg_match('/^[a-z,A-Z_]*$/', $dataIndx)) {
            return true;
        } else {
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
        $param = array();

        foreach ($filters as $filter) {
            $dataIndx = $filter->dataIndx;
            if (ColumnHelper::isValidColumn($dataIndx) == false) {
                throw new Exception("Invalid column name");
            }
            $text = $filter->value;
            $condition = $filter->condition;

            if ($condition == "contain") {
                $fc[] = $dataIndx . " like '%" . $text . "%'";
            } else if ($condition == "notcontain") {
                $fc[] = $dataIndx . " not like '%" . $text . "%'";
            } else if ($condition == "begin") {
                $fc[] = $dataIndx . " like '%" . $text . "%'";
            } else if ($condition == "end") {
                $fc[] = $dataIndx . " like " . $text;
            } else if ($condition == "equal") {
                $fc[] = $dataIndx . " = " . $text;
            } else if ($condition == "notequal") {
                $fc[] = $dataIndx . " != " . $text;
            } else if ($condition == "empty") {
                $fc[] = "ifnull(" . $dataIndx . ",'')=''";
            } else if ($condition == "notempty") {
                $fc[] = "ifnull(" . $dataIndx . ",'')!=''";
            } else if ($condition == "less" || $condition == "lte") {
                $fc[] = $dataIndx . " <= " . $text;
            } else if ($condition == "great" || $condition == "gte") {
                $fc[] = $dataIndx . " >= " . $text;
            } else if ($condition == "between") {
                $fc[] = $dataIndx . " >= " . $text;
                $fc[] = $dataIndx . " <= " . $filter->value2;
            }
        }
        $query = "";
        if (sizeof($filters) > 0) {
            $query = " " . join(" " . $mode . " ", $fc);
        }

        $ds = new stdClass();
        $ds->query = $query;
        return $ds;
    }
}//end of class


//orders.php
$filterQuery = "";
$filterParam = array();
$LoadUnion = $_GET['list'];

if (isset($_GET["pq_filter"])) {
    $pq_filter = khu_dau_vn($_GET["pq_filter"]);
    $dsf = FilterHelper::deSerializeFilter($pq_filter);

    $search = array("manhom", "tenvt", "mavt");
    $replace   = array("mavt.manhom", "tenkd", "ct.mavt");

    $filterQuery = str_replace($search, $replace, $dsf->query);

}
//$check=$OBJ->kiemtraphieuvt(); // Kiểm tra xem phiếu này có nhâp vật tư chưa
if($xemtonghop=="false") {
    if ($list == 0) {
        if($filterQuery!=""){
            $filterQuery = " and " . $filterQuery;
        }
        $OBJ->set_orderby(" ct.masp='" . $masp . "' and ct.mahm='" . $mahm . "' ".$filterQuery);
        $result = $OBJ->loadListMaVT_CT_Vatlieu();
    } else {
        $OBJ->set_orderby($filterQuery);
        $result = $OBJ->loadListMaVT_CT_Vatlieu_Union($masp, $mahm);
    }
}else{// Nếu xem tổng hợp
    $OBJ->set_orderby(" ct.masp='" . $masp . "' ");
    $result = $OBJ->loadListMaVT_CT_Vatlieu_TongHop();
}
if(isset($_SESSION['DSDINHMUCCONGTRINH']) && array_key_exists(0,$result)==false){
    foreach ($_SESSION['DSDINHMUCCONGTRINH'] as $item){
        $item['masp'] = $masp;
        $item['mahm'] = $mahm;
        $result_cp[] = $item;
    }
    $result = $result_cp;
}


//debug($result);
echo "{\"data\":" . json_encode($result) . " }";
?>