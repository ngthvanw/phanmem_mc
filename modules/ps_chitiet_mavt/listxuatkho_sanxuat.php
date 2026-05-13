<?php
include("../../config.php");
$mact = $_GET['mact'];
$OBJ = new ps_chitiet_mavattu();
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
                    // Thay thế các ký tự đặc biệt
                    $search = ['( ',') ', '~ ', '- ',' *',' (',' )', ' ~', ' -',' *'];
                    $replace = [' ',' ', ' ', ' ',' ',' ',' ', ' ', ' ',' '];
                    $text2 = str_replace($search, $replace, $text);
                    $text1 = preg_replace('/\s+/', ' +', $text2);

                    $sql_search = " MATCH (" . $dataIndx . ") AGAINST ('+" . $text1 . "*' IN BOOLEAN MODE)";

                    $fc[] = $sql_search;
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
$LoadUnion = $_GET['list'];
$makho = $_GET['makho'];
$cothuegtgt = $_GET['cothuegtgt'];
$cochietkhau = $_GET['cochietkhau'];
if ( isset($_GET["pq_filter"]))
{
    $pq_rPP=100;
    $pq_filter = khu_dau_vn($_GET["pq_filter"]);
    $dsf = FilterHelper::deSerializeFilter($pq_filter);
    $string = khu_dau_vn(str_replace("manhom","mavt.manhom",$dsf->query));
    $filterQuery = khu_dau_vn(str_replace("tenvt","tenkd",$string));
}
//echo $filterQuery;
$OBJ->setsophieu($_GET['sophieu']);
//$OBJ->set_MaVT();
$check=$OBJ->kiemtraphieuvt(); // Kiểm tra xem phiếu này có nhâp vật tư chưa
$OBJ->set_orderby($filterQuery);
$OBJ->setCothueGTGT($cothuegtgt);
$OBJ->setCoChietKhau($cochietkhau);
$check=$OBJ->kiemtraphieuvt(); // Kiểm tra xem phiếu này có nhâp vật tư chưa
$OBJ->set_orderby($filterQuery);
$OBJ->setCothueGTGT($cothuegtgt);
$OBJ->setCoChietKhau($cochietkhau);
$pq_curPage = $_GET["pq_curpage"];
$pq_rPP=$_GET["pq_rpp"];

$sql = "Select count(sott) as dong from mavt";

$query = $OBJ->re_query($sql);
$res = $OBJ->re_fetch($query);
$total_Records = $res['dong'];

$skip = ($pq_rPP * ($pq_curPage - 1));

if ($skip >= $total_Records)
{
    $pq_curPage = ceil($total_Records / $pq_rPP);
    $skip = ($pq_rPP * ($pq_curPage - 1));
}
if($skip<0)
    $skip=0;
if($pq_rPP==""){
    $pq_rPP=150;
    $skip=0;
    $pq_curPage=0;
}
$OBJ->setLimit(" limit ".$skip." , ".$pq_rPP);
if($LoadUnion==1){
    //$OBJ->set_orderby(" sophieu = " . $_GET['sophieu']);
    $result = $OBJ->loadListMaVTXuatUnion(1,$makho,$mact);
}else {
    if ($check) {
        //$OBJ->set_orderby(" sophieu = " . $_GET['sophieu']);
        $result = $OBJ->loadListMaVT(1,$makho,$mact);
    } else {
        $result = $OBJ->loadListMaVTXuatNotjon(1,$makho,$mact);
    }
}

//$result = $OBJ->loadListMaVT();
//$_SESSION["ListVT"] = json_encode($result);
//debug($result);
echo "{\"totalRecords\":" . $total_Records . ",\"curPage\":" . $pq_curPage . ",\"data\":".json_encode($result) ." }" ;
?>