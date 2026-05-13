<?php
include("../../config.php");
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
            }else if ($condition == "against")
            {
                if($text!="") {
                $text = trim($text);
					$search = [' ','-','(',')','~',' -',' (',' )',' ~'];
					$replace   = [' +','','','','',' ',' ',' ',' '];
					$text1 = str_replace($search,$replace,$text);					
					$sql_search = " MATCH (" . $dataIndx . ") AGAINST ('+" . str_replace($search,$replace,$text1) . "*' IN BOOLEAN MODE)";
					
					$search1 = ['**','++','+*','*+','+++',' + +',' + + +'];
					$replace1   = ['*','+','*','+','+',' +',' +'];
					str_replace($search1,$replace1,$sql_search);
					$fc[] = str_replace($search1,$replace1,$sql_search);
                }else{
                $fc[] = $dataIndx . " like '%".$text."%'";
                }
            }
        }
		//debug($fc);
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
$cothuegtgt = $_GET['cothuegtgt'];
$makho = $_GET['makho'];
$cochietkhau = $_GET['cochietkhau'];
$thangngayghiso = $_GET['thangngayghiso'];
$pq_curPage = $_GET["pq_curpage"];
$pq_rPP=$_GET["pq_rpp"];
if ( isset($_GET["pq_filter"]))
{
    $pq_rPP=150;
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

    
    $sql = "Select count(sott) as dong from mavt";
    
    $query = database::re_query($sql);    
    $res = database::re_fetch($query);
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
		$pq_rPP=100;
		$skip=0;
		$pq_curPage=0;
	}
$OBJ->setLimit(" limit ".$skip." , ".$pq_rPP);
$OBJ->re_query("ALTER TABLE `mavt` ADD FULLTEXT FullTenKD(`tenkd`);");
if($LoadUnion==1){
    //$OBJ->set_orderby(" sophieu = " . $_GET['sophieu']);
    $result = $OBJ->loadListMaVTXuatUnion($thangngayghiso,$makho);
}else {
    if ($check) {
        //$OBJ->set_orderby(" sophieu = " . $_GET['sophieu']);
        $result = $OBJ->loadListMaVT($thangngayghiso,$makho);
    } else {
        $result = $OBJ->loadListMaVTXuatNotjon($thangngayghiso,$makho);
    }
}

//$result = $OBJ->loadListMaVT();
//$_SESSION["ListVT"] = json_encode($result);
//debug($result);
echo "{\"totalRecords\":" . $total_Records . ",\"curPage\":" . $pq_curPage . ",\"data\":".json_encode($result) ." }" ;
?>