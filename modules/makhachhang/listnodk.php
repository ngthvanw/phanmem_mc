<?php
include("../../config.php");
$OBJ = new makhachhang;
$xemchitiet = (int)$_GET['xemchitiet'];
$xemtatca = (int)$_GET['xemtatca'];
$tkcongno = $_GET['tkcongno'];
if($_GET['loaitien']==""){
    $loaitien="";
}else{
    $loaitien="NT";
}

class ColumnHelper
{
    public static function isValidColumn($dataIndx)
    {
        if (preg_match('/^[a-z,A-Z]*$/', $dataIndx)) {
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
            } else if ($condition == "less") {
                $fc[] = $dataIndx . " < " . $text;
            } else if ($condition == "great") {
                $fc[] = $dataIndx . " > " . $text;
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

if (isset($_GET["pq_filter"])) {
    $pq_filter = khu_dau_vn($_GET["pq_filter"]);
    $dsf = FilterHelper::deSerializeFilter($pq_filter);
    $search = ['tenkh', 'makh', 'masothue','matk'];
    $replace = ['tenkd', 'makh.makh', 'makh.masothue','sdcn.matk'];
    $filterQuery = khu_dau_vn(str_replace($search, $replace, $dsf->query));
}
$OBJ->set_orderby($filterQuery);
$OBJ->themSoDuDKKH($tkcongno);
$OBJ->re_query(" DELETE FROM sdcn WHERE makh not in (select makh FROM makh) or sdcn.matk ='' ");
if (isset($_GET['pq_filter'])) {
    $result = $OBJ->loadListMaKHNODK_W($loaitien,$tkcongno);
} else {
    if($xemtatca=="1"){
        $result = $OBJ->loadListMaKHNODK_W($loaitien,$tkcongno);
    }else{
        $result = $OBJ->loadListMaKHNODK(0,$loaitien,$tkcongno);
    }
}
$key = 0;
foreach ($result as $Items) {
    if ($xemchitiet == 0) {
        if ($Items['makhcha'] == "0") {
            $data[$key] = $Items;
            $key++;
        }
    } else {
        $data[$key] = $Items;
        $key++;
    }
}
//debug($data);
echo "{\"data\":" . json_encode($data) . " }";
?>