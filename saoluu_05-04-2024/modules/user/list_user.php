<?php
include("../../config.php");
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
            $text2 = $filter->value2;
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
            else if ($condition == "between")
            {
                $fc[] = $dataIndx . " >= '".$text."' and ".$dataIndx . " <= '".$text2."'";
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
function load_User($dir){
    $fp = @fopen($dir.'/user.db', "r");
    while(!feof($fp)){
        $string_user[] =  explode(":",fgets($fp));
    }
    return $string_user;
}
$data_arr = load_User($driver."/datafile");

function load_Phanquyen($dir)
{// Lấy danh sách phân quyền hiện tại
    $fp = @fopen($dir . '/phanquyen.db', "r");
    while (!feof($fp)) {
        $string_user = fgets($fp);
    }
    return json_decode($string_user, true);
}
$data_quyen_arr = load_Phanquyen($driver."/datafile");

$i=0;
foreach ($data_arr as $item){
    if($item[1]!="" ){
        $data[$i]['tendangnhap'] = $item[0];
        $data[$i]['matkhau'] = $item[1];
        $data[$i]['level'] = $item[2];
        $data[$i]['khoadulieu'] = $item[3];
        $data[$i]['sott'] = $item[4];
        $data[$i]['themdn'] = str_replace("\n",0,substr($item[5],0,1));
        $data[$i]['thongke'] = str_replace("\n",0,substr($item[6],0,1));
        $data[$i]['doanhnghiepquanly'] = implode(";",$data_quyen_arr[$item[0]]);
        $i++;
    }

}
echo "{\"data\":".json_encode($data) ." }" ;
?>