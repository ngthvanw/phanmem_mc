<?php
include("../../config.php");
$OBJ = new baocaothue();
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
function load_AllPhanquyen($driver) {
    // Tạo một mảng chứa phân quyền
    $users_permissions = array();
    try {
        // Kết nối với cơ sở dữ liệu SQLite
        $db = new PDO('sqlite:' . $driver . '/datafile/thongtinchung.db');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Thực hiện truy vấn để lấy tất cả username và permissions
        $stmt = $db->query("SELECT username, permissions FROM users");
        
        // Lặp qua từng dòng dữ liệu
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // Giải mã permissions từ JSON
            $permissions = json_decode($row['permissions'], true);
            // Thêm vào mảng với key là username và value là permissions
            $users_permissions[$row['username']] = $permissions;
        }
    } catch (PDOException $e) {
        echo "Lỗi kết nối hoặc truy vấn: " . $e->getMessage();
    }
    return $users_permissions; // Trả về mảng key-value
}
$arr_doanhnghiep = load_doanhngiep($driver . "/datafile");
$PhanQuyen = load_AllPhanquyen($driver);// Lấy Danh sách của tất cả user chứa danh sách MST
foreach ($PhanQuyen as $kUser=> $itemUser){
    foreach ($itemUser as $itemDSKiemTra){
        if(array_key_exists($itemDSKiemTra,$dataDanhSachCTYKiemTra)){
            $arr_doanhnghiep[$itemDSKiemTra]['tendangnhap'] = $arr_doanhnghiep[$itemDSKiemTra]['tendangnhap'].",".$kUser;
        }else{
            $arr_doanhnghiep[$itemDSKiemTra]['tendangnhap'] = $kUser;
        }
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

$filterQuery = "";
$filterParam = array();
if ( isset($_GET["pq_filter"]))
{
    $pq_filter = khu_dau_vn_thay_phantram($_GET["pq_filter"]);
    $dsf = FilterHelper::deSerializeFilter($pq_filter);
    $filterQuery = " and ".khu_dau_vn($dsf->query);
}
$where_ct = " ";

$dbname = "dulieuchung";
$OBJ->re_query("delete from {$dbname}.tmp_danhsach_congty_kiemtra_{$noiluu_phanmem}");
$OBJ->re_query("ALTER TABLE {$dbname}.tmp_danhsach_congty_kiemtra_{$noiluu_phanmem} AUTO_INCREMENT=1;");
$OBJ->re_query("update {$dbname}.danhsach_phancong_{$noiluu_phanmem} set trangthaidn='DANG_HOAT_DONG' where trangthaidn ='';");
foreach ($dataDanhSachCTYKiemTra as $kMST => $itemDS){
    if($itemDS[1]!='') {
        $values .= "('{$kMST}','{$itemDS[1]}','{$itemDS[2]}','{$itemDS[3]}','{$itemDS[4]}','{$itemDS[5]}','{$itemDS['user']}'),";
    }
}
$inser_tmp = "insert into {$dbname}.tmp_danhsach_congty_kiemtra_{$noiluu_phanmem}(masothue,tencongty,diachi,duong,huyen,tinh,nguoiphutrach) VALUE ".substr($values,0,-1);
$OBJ->re_query($inser_tmp);
$OBJ->re_query("INSERT {$dbname}.danhsach_phancong_{$noiluu_phanmem}(masothue,tencongty,nguoiphutrach) select masothue,tencongty,nguoiphutrach FROM {$dbname}.tmp_danhsach_congty_kiemtra_{$noiluu_phanmem} where masothue NOT in (select masothue FROM {$dbname}.danhsach_phancong_{$noiluu_phanmem});");
$OBJ->re_query("DELETE FROM {$dbname}.danhsach_phancong_{$noiluu_phanmem} WHERE masothue NOT in (select masothue FROM danhsach_phancong_{$noiluu_phanmem}) or tencongty='' ");
$OBJ->re_query("UPDATE {$dbname}.danhsach_phancong_{$noiluu_phanmem} JOIN {$dbname}.tmp_danhsach_congty_kiemtra_{$noiluu_phanmem}
                            ON {$dbname}.danhsach_phancong_{$noiluu_phanmem}.masothue = {$dbname}.tmp_danhsach_congty_kiemtra_{$noiluu_phanmem}.masothue
                            SET
                             {$dbname}.danhsach_phancong_{$noiluu_phanmem}.tencongty = {$dbname}.tmp_danhsach_congty_kiemtra_{$noiluu_phanmem}.tencongty,
                             {$dbname}.danhsach_phancong_{$noiluu_phanmem}.tendangnhap = {$dbname}.tmp_danhsach_congty_kiemtra_{$noiluu_phanmem}.tendangnhap");

$sql = "select * from {$dbname}.danhsach_phancong_{$noiluu_phanmem} where tencongty!='' $filterQuery $where_ct ORDER BY truongnhom DESC,nguoiphutrach";
$query = $OBJ->re_query($sql);
$sott=1;
while ($result = $OBJ->re_fetch($query)){
    $dbname_db = $_SESSION['TIENTO'].$result['masothue']."_".$_SESSION['NienDo'];
    $sql_count = "select count(*) as sodong from {$dbname_db}.nhatkykiemphieu where loaiphieu='9'";
    $query_count = $OBJ->re_query($sql_count);
    $tongsltokhai = 0;
    $result_count = $OBJ->re_fetch($query_count);
    $tongsltokhai=$result_count['sodong'];
    $result['sltokhai'] = $tongsltokhai;

    $sql_count_ = "select count(*) as sodong from {$dbname_db}.nhatkykiemphieu where loaiphieu='10'";
    $query_count_ = $OBJ->re_query($sql_count_);
    $tongslhoadon = 0;
    $result_count = $OBJ->re_query($query_count_);
    $tongslhoadon=$result_count['sodong'];
    $result['slhoadon'] = $tongslhoadon;
    $data[] = $result;
}
echo "{\"data\":".json_encode($data) ."}" ;
?>