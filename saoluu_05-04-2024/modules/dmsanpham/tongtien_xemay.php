<?php
include("../../config.php");
$masp = $_GET['masp'];
$list = $_GET['list'];
$loaidinhmucsp = $_GET['loaidinhmucsp'];
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
    $string = khu_dau_vn(str_replace("manhom", "mavt.manhom", $dsf->query));
    $filterQuery = khu_dau_vn(str_replace("tenvt", "tenkd", $string));
}
//$check=$OBJ->kiemtraphieuvt(); // Kiểm tra xem phiếu này có nhâp vật tư chưa
if ($list == 0) {
    if($loaidinhmucsp=="ALL")
        $OBJ->set_orderby(" ct.mats='" . $masp . "' ");
    else
        $OBJ->set_orderby(" ct.mats='" . $masp . "' and maloaiduong.pptinh='".$loaidinhmucsp."' ");

    $result = $OBJ->loadListLoaiDuong();
} else {
    $OBJ->set_orderby($filterQuery);
    $result = $OBJ->loadListLoaiDuongUnion($masp,$loaidinhmucsp);
}


$TongKM=0;
$TongDau =0;
foreach ($result as $item){
    $TongKM+=$item['sokm'];
    $TongDau+=$item['tongdau'];
}
$result_xuat = array("duno"=>$TongKM,"duco"=>$TongDau);
echo "{\"data\":".json_encode($result_xuat) ." }" ;
?>