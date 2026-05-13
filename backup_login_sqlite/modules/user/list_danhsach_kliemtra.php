<?php
include("../../config.php");

$pathname = "datafile/"; // đường dẫn chứa data của công ty
function load_doanhngiep($dir)
{
    $filelist = array();
    if ($handle = opendir($dir)) {
        while ($entry = readdir($handle)) {
            if (is_dir($dir . "/" . $entry) && $entry != "." && $entry != "..") {
                $filelist[] = $entry;
                $fp1 = @fopen($dir . "/" . $entry . "/" . 'info.db', "r"); // đọc thông tin chung
                 $data = explode(":", giaima2chieu(fgets($fp1)));
                $string_info[$data[0]] = $data;
            }
        }
        closedir($handle);
    }
    return ($string_info);
}

function load_Phanquyen($dir)
{// Lấy danh sách phân quyền hiện tại
    $fp = @fopen($dir . '/phanquyen.db', "r");
    while (!feof($fp)) {
        $string_user = fgets($fp);
    }
    return json_decode($string_user, true);
}

function load_User($dir)
{
    $fp = @fopen($dir . '/user.db', "r");
    while (!feof($fp)) {
        $string_user[] = explode(":", fgets($fp));
    }
    return $string_user;
}


$arr_doanhnghiep = load_doanhngiep($driver . "/datafile");

$PhanQuyen = load_Phanquyen($driver . "/datafile");// Lấy Danh sách của tất cả user chứa danh sách MST

foreach ($PhanQuyen as $kUser=> $itemUser){
    foreach ($itemUser as $itemDSKiemTra){
        $arr_doanhnghiep[$itemDSKiemTra]['user'] = $kUser;
       $dataDanhSachCTYKiemTra[$itemDSKiemTra] = $arr_doanhnghiep[$itemDSKiemTra];
    }
}

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


//orders.php
$filterQuery = "";
$filterParam = array();
if ( isset($_GET["pq_filter"]))
{
    $pq_filter = khu_dau_vn($_GET["pq_filter"]);
    $dsf = FilterHelper::deSerializeFilter($pq_filter);
    $filterQuery = " and ".khu_dau_vn($dsf->query);
}
$where_ct = " ";

$mysql_host = $_SESSION['HOST'];
$mysql_username = $_SESSION['USER_DB'];
// MySQL password
$mysql_password = $_SESSION['PASS_DB'];
$cnn = mysqli_connect($mysql_host, $mysql_username, $mysql_password);
$dbname = "dulieuchung";
mysqli_select_db($cnn,$dbname);

mysqli_query($cnn,"delete from tmp_danhsach_congty_kiemtra_{$noiluu_phanmem}");
mysqli_query($cnn,"ALTER TABLE tmp_danhsach_congty_kiemtra_{$noiluu_phanmem} AUTO_INCREMENT=1;");


foreach ($dataDanhSachCTYKiemTra as $kMST => $itemDS){
    if($kMST!="" && $kMST!="ALL" && $itemDS[1]!=""){
        $values.="('{$kMST}','{$itemDS[1]}','{$itemDS[2]}','{$itemDS[3]}','{$itemDS[4]}','{$itemDS[5]}','{$itemDS[user]}'),";
    }
}
$inser_tmp = "insert into tmp_danhsach_congty_kiemtra_{$noiluu_phanmem}(masothue,tencongty,diachi,duong,huyen,tinh,nguoiphutrach) VALUE ".substr($values,0,-1);

mysqli_query($cnn,$inser_tmp);

mysqli_query($cnn,"INSERT danhsach_congty_kiemtra_{$noiluu_phanmem}(masothue,tencongty,nguoiphutrach) select masothue,tencongty,nguoiphutrach FROM tmp_danhsach_congty_kiemtra_{$noiluu_phanmem} where masothue NOT in (select masothue FROM danhsach_congty_kiemtra_{$noiluu_phanmem});");

mysqli_query($cnn,"DELETE FROM danhsach_congty_kiemtra_{$noiluu_phanmem} WHERE masothue NOT in (select masothue FROM tmp_danhsach_congty_kiemtra_{$noiluu_phanmem}) ");

mysqli_query($cnn,"UPDATE danhsach_congty_kiemtra_{$noiluu_phanmem} JOIN tmp_danhsach_congty_kiemtra_{$noiluu_phanmem}
                            ON danhsach_congty_kiemtra_{$noiluu_phanmem}.masothue = tmp_danhsach_congty_kiemtra_{$noiluu_phanmem}.masothue
                            SET
                             danhsach_congty_kiemtra_{$noiluu_phanmem}.tencongty = tmp_danhsach_congty_kiemtra_{$noiluu_phanmem}.tencongty");

$sql = "select * from danhsach_congty_kiemtra_{$noiluu_phanmem} where 0=0 $filterQuery $where_ct ORDER BY masothue,ngaykiemtra,nguoiphutrach";
$query = mysqli_query($cnn,$sql);
$sott=1;
while ($result = mysqli_fetch_assoc($query)){
    $data[] = $result;
}

mysql_close($cnn);
echo "{\"data\":".json_encode($data) ." }" ;
?>