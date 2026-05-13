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
function load_ppkhaithue($dir)
{
    $fp1 = @fopen($dir . "/" . 'phuongphapkhaithue.db', "r"); // đọc thông tin chung
    $string_info = fgets($fp1);
    fclose($fp1);
    if ($string_info == "") {
        $string_info = 1;
    }
    return ($string_info);
}

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

$dbname = "dulieuchung";

$sql = "select masothue,tencongty as tendoanhnghiep,UPPER(nguoiphutrach) tendangnhap from {$dbname}.danhsach_phancong_{$noiluu_phanmem} WHERE trangthaidn='DANG_HOAT_DONG' ORDER BY nguoiphutrach,masothue";
$query =$OBJ->re_query($sql);
$sott=1;

$Thang_Quy = $khaitheo."-".$nam;
while ($result =$OBJ->re_fetch($query)){
    $CSDL_DoanhNghiep = $_SESSION['TIENTO'].$result['masothue']."_".$nam;
    $ppkhautru = substr(load_ppkhaithue($driver . "/datafile/" . $result['masothue']."/".$nam),0,1);
    $sql_sub = "SELECT thang,ngayduyet,truongnhomduyet,giamdocduyet FROM {$CSDL_DoanhNghiep}.tokhaithue LEFT JOIN {$CSDL_DoanhNghiep}.nhatkykiemphieu on thang = tuso WHERE thang = '".$Thang_Quy."' and loaitokhai = 1 and (loaiphieu=9 or loaiphieu is NULL) and niendo=0 GROUP BY thang";
    $query_sub = $OBJ->re_query($sql_sub);
    $data_sub = $OBJ->re_fetch($query_sub);
    if($query_sub=="0"){
        $result['tokhaithang'] = "Loi";
    }else{
        $result['tokhaithang'] = $data_sub['thang'];
    }
    if($data_sub['ngayduyet']!=""){
        $result['ngayduyet'] = date("H:m:s d/m/Y",strtotime($data_sub['ngayduyet']));
    }else{
        $result['ngayduyet'] = "";
    }

    $result['truongnhomduyet'] = $data_sub['truongnhomduyet'];
    $result['giamdocduyet'] = $data_sub['giamdocduyet'];

    if($loaitokhai=="Thang" && $ppkhautru==1){
        if($nguoiphutrach=="ALL"){
            if($trangthai=="0"){
                if( $data_sub['truongnhomduyet'] == 0 && $data_sub['giamdocduyet']==0){
                    $data[] = $result;
                }

            }else if($trangthai==1){
                if( $data_sub['truongnhomduyet'] == "1" || $data_sub['giamdocduyet']=="1"){
                    $data[] = $result;
                }
            }else{
                $data[] = $result;
            }
        }else{
            if($trangthai=="0"){
                if( $data_sub['truongnhomduyet'] == 0 && $data_sub['giamdocduyet']==0 && $result['tendangnhap']==strtoupper($nguoiphutrach)){
                    $data[] = $result;
                }

            }else if($trangthai==1){
                if( ($data_sub['truongnhomduyet'] == "1" || $data_sub['giamdocduyet']=="1") && $result['tendangnhap']==strtoupper($nguoiphutrach)){
                    $data[] = $result;
                }
            }else{
                if($result['tendangnhap']==$nguoiphutrach) {
                    $data[] = $result;
                }
            }
        }

    }
    if($loaitokhai=="Quy" && $ppkhautru!=1){
        if($nguoiphutrach=="ALL"){
            if($trangthai=="0"){
                if( $data_sub['truongnhomduyet'] == 0 && $data_sub['giamdocduyet']==0){
                    $data[] = $result;
                }

            }else if($trangthai=="1"){
                if( $data_sub['truongnhomduyet'] == "1" || $data_sub['giamdocduyet']=="1"){
                    $data[] = $result;
                }
            }else{

                $data[] = $result;
            }
        }else{
            if($trangthai=="0"){
                if( $data_sub['truongnhomduyet'] == 0 && $data_sub['giamdocduyet']==0 && $result['tendangnhap']==strtoupper($nguoiphutrach)){
                    $data[] = $result;
                }

            }else if($trangthai=="1"){
                if( ($data_sub['truongnhomduyet'] == "1" || $data_sub['giamdocduyet']=="1") && $result['tendangnhap']==strtoupper($nguoiphutrach)){
                    $data[] = $result;
                }
            }else{
                if($result['tendangnhap']==strtoupper($nguoiphutrach)) {
                    $data[] = $result;
                }
            }
        }

    }
}
unset($_SESSION["THONGKETOKHAI"]);
foreach ($data as $itemData){
    if($itemData['tokhaithang']!='Loi') {
        $DuLieuLoc[] = $itemData;
    }
}
$_SESSION["THONGKETOKHAI"] = $DuLieuLoc;

echo "{\"data\":".json_encode($DuLieuLoc) ."}" ;
?>