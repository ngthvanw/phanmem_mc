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
        $param = array();

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

$filterQuery = "";
$filterParam = array();

$search  = array('tendangnhap', 'doanhnghiepquanly');
$replace = array('username', 'permissions');

if ( isset($_GET["pq_filter"]))
{
    $pq_filter = khu_dau_vn($_GET["pq_filter"]);
    $dsf = FilterHelper::deSerializeFilter($pq_filter);
    $string = $dsf->query;
	$filterQuery = " and ".khu_dau_vn(str_replace($search,$replace,$string));
}

// Kết nối tới SQLite
try {
    $db = new PDO('sqlite:' . $driver . '/datafile/thongtinchung.db');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Lấy dữ liệu từ bảng users
    $stmt = $db->query("SELECT * FROM users where 0=0 ".$filterQuery ." order by level,username");
    $data_arr = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $data = array();
    $i = 0;
    foreach ($data_arr as $item) {
        if ($item['password'] != "") {
            $data[$i]['tendangnhap'] = $item['username'];
            $data[$i]['matkhau'] = $item['password'];
            $data[$i]['level'] = $item['level'];
            $data[$i]['khoadulieu'] = $item['khoadulieu'];
            $data[$i]['sott'] = $item['sott'];
            $data[$i]['themdn'] = str_replace("\n", 0, substr($item['themdn'], 0, 1));
            $data[$i]['thongke'] = str_replace("\n", 0, substr($item['thongke'], 0, 1));
            $data[$i]['doanhnghiepquanly'] = implode(";", json_decode($item['permissions'], true)); // Giả sử cột permissions là JSON
            $i++;
        }
    }

    echo "{\"data\":".json_encode($data) ." }";

} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

// Đóng kết nối
$db = null;
?>
