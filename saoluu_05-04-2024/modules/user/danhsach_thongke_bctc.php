<?php
include("../../config.php");
$OBJ = new ps_chitiet_mavattu();
$tendangnhap = check_data($_GET['tennguoidung']);
$nam = check_data($_GET['niendo']);
$khaitheo = check_data($_GET['khaitheo']);
$trangthai = check_data($_GET['trangthai']);
$loaitokhai = check_data($_GET['loaitokhai']);
$nguoiphutrach = check_data($_GET['nguoiphutrach']);

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
    $pq_filter = khu_dau_vn_thay_phantram($_GET["pq_filter"]);
    $dsf = FilterHelper::deSerializeFilter($pq_filter);
    $filterQuery = " and ".($dsf->query);
}
$where_ct = " ";

$dbname = "phpmyadmin";

$sql = "select masothue,tencongty as tendoanhnghiep,UPPER(nguoiphutrach) tendangnhap from {$dbname}.danhsach_phancong_{$noiluu_phanmem}  ORDER BY nguoiphutrach,masothue";
$query =$OBJ->re_query($sql);
$sott=1;

$Thang_Quy = $khaitheo."-".$nam;
while ($result =$OBJ->re_fetch($query)){
    $CSDL_DoanhNghiep = $_SESSION['TIENTO'].$result['masothue']."_".$nam;
    $sql_sub = "SELECT niendo,log as ngayduyet,trangthai FROM {$dbname}.danhsach_congty_trinhky_{$noiluu_phanmem} where niendo='{$nam}' and masothue='".$result['masothue']."'";
    $query_sub = $OBJ->re_query($sql_sub);
    $data_sub = $OBJ->re_fetch($query_sub);
    if($data_sub['ngayduyet']!=""){
        $result['ngayduyet'] = $data_sub['ngayduyet'];
    }else{
        $result['ngayduyet'] = "";
    }
    $result['truongnhomduyet'] = $data_sub['trangthai'];
    $result['tokhaithang'] = $data_sub['niendo'];
        if($nguoiphutrach=="ALL"){
            if($trangthai=="0"){
                if( $data_sub['trangthai'] == ""){
                    $data[] = $result;
                }

            }else if($trangthai=="1"){
                if( $data_sub['trangthai'] == "CD" || $data_sub['trangthai'] == "DD" || $data_sub['trangthai'] == "TL" || $data_sub['trangthai'] == "TN"){
                    $data[] = $result;
                }
            }else{
                $data[] = $result;
            }
        }else{
            if($trangthai=="0"){
                if( $data_sub['trangthai'] == ""){
                    $data[] = $result;
                }

            }else if($trangthai=="1"){
                if( $data_sub['trangthai'] == "CD" || $data_sub['trangthai'] == "DD" || $data_sub['trangthai'] == "TL" || $data_sub['trangthai'] == "TN"){
                    $data[] = $result;
                }
            }else{
                if($result['tendangnhap']==strtoupper($nguoiphutrach)) {
                    $data[] = $result;
                }
            }
        }
}
unset($_SESSION["THONGKEBCTC"]);
$_SESSION["THONGKEBCTC"] = $data;
echo "{\"data\":".json_encode($data) ."}" ;
?>