<?php
include("../../config.php");
$tendatabase = $_GET['tendatabase'];
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

$mysql_host = $_SESSION['HOST'];
$mysql_username = $_SESSION['USER_DB'];
// MySQL password
$mysql_password = $_SESSION['PASS_DB'];
$cnn = mysqli_connect($mysql_host, $mysql_username, $mysql_password);
$dbname = $tendatabase;
mysqli_select_db($cnn,$dbname);

mysqli_query($cnn,"CREATE TABLE `duyettonkho` (
                                                      `sott` int(11) NOT NULL,
                                                      `mavt` char(20) NOT NULL,
                                                      `tenvt` varchar(200) NOT NULL,
                                                      `matk` int(6) NOT NULL,
                                                      `dvt` varchar(50) NOT NULL,
                                                      `soluong` double NOT NULL,
                                                      `dongia` double(15,3) NOT NULL,
                                                      `thanhtien` bigint(20) NOT NULL,
                                                      `soluongnhap` double(12,3) NOT NULL,
                                                      `thanhtiennhap` bigint(20) NOT NULL,
                                                      `soluongxuat` double(12,3) NOT NULL,
                                                      `thanhtienxuat` bigint(20) NOT NULL,
                                                      `thanhtientonck` bigint(20) NOT NULL,
                                                      `dongiabinhquan` double(15,3) NOT NULL,
                                                      `soluongtonck` double(12,3) NOT NULL,
                                                      `thuesuat` char(2) NOT NULL,
                                                      `makho` char(4) NOT NULL,
                                                      `tenkho` varchar(200) NOT NULL,
                                                      `quycach` varchar(50) NOT NULL,
                                                      `manhom` varchar(6) NOT NULL,
                                                      `tennhom` varchar(200) NOT NULL,
                                                      `thang` int(2) NOT NULL,
                                                      `giaban` double(10,2) NOT NULL,
                                                      `sophieu_nxk` bigint(20) NOT NULL,
                                                      `ngs` date NOT NULL,
                                                      `nhd` date NOT NULL,
                                                      `sottct` char(10) NOT NULL,
                                                      `nguoiduyet` varchar(20) NOT NULL,
                                                      `matkcha` varchar(6) NOT NULL,
                                                      `truongnhomduyet` int(1) NOT NULL,
                                                      `giamdocduyet` int(1) NOT NULL,
                                                      `ngaytruongphong` datetime NOT NULL,
                                                      `ngaygiamdoc` datetime NOT NULL,
                                                      `_soluongtonckduyet` bigint(20) NOT NULL,
                                                      `_thanhtientonckduyet` bigint(20) NOT NULL,
                                                      `ghichu` text NOT NULL,
                                                      `nhanvienduyet` int(1) NOT NULL
                                                    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;");


mysqli_query($cnn,"ALTER TABLE `duyettonkho` ADD PRIMARY KEY (`sott`);");
mysqli_query($cnn,"ALTER TABLE `duyettonkho` MODIFY `sott` int(11) NOT NULL AUTO_INCREMENT;");

mysqli_query($cnn,"INSERT into duyettonkho(mavt,tenvt,dvt,matk,soluongtonck,dongiabinhquan,thanhtientonck,_soluongtonckduyet,_thanhtientonckduyet) SELECT mavt,tenvt,dvt,matk,soluongtonck,dongiabinhquan,thanhtientonck,0,0 FROM tkthang where thang ='12' and soluongtonck>0 and mavt NOT in (select mavt FROM duyettonkho);");

mysqli_query($cnn,"ALTER TABLE `duyettonkho` ADD `canhbao` INT(1) NOT NULL;");
mysqli_query($cnn,"DELETE FROM duyettonkho WHERE mavt NOT in (select mavt FROM tkthang where thang ='12') ");

mysqli_query($cnn,"UPDATE duyettonkho JOIN tkthang 
                            ON duyettonkho.mavt = tkthang.mavt
                            SET
                                duyettonkho.soluongtonck = tkthang.soluongtonck,
                                duyettonkho.dongiabinhquan = tkthang.dongiabinhquan,
                                duyettonkho.thanhtientonck = tkthang.thanhtientonck
                            WHERE tkthang.thang ='12'
                                ");

$sql = "select * from duyettonkho where 0=0 and soluongtonck>0 {$filterQuery} order by matk,tenvt";
$query = mysqli_query($cnn,$sql);
while ($result = mysqli_fetch_assoc($query)){
    $data[] = $result;
}

mysqli_close($cnn);

echo "{\"data\":".json_encode($data) ." }" ;
?>