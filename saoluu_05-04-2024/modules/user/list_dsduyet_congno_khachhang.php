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

mysqli_query($cnn,"CREATE TABLE `duyetcnkh` (
                                                      `sott` int(11) NOT NULL AUTO_INCREMENT,
                                                      `makh` varchar(14) NOT NULL,
                                                      `tenkh` varchar(700) NOT NULL,
                                                      `makhcha` varchar(14) NOT NULL,
                                                      `matk` varchar(6) NOT NULL,
                                                      `nodk` bigint(20) NOT NULL,
                                                      `codk` bigint(20) NOT NULL,
                                                      `nops` bigint(20) NOT NULL,
                                                      `cops` bigint(20) NOT NULL,
                                                      `nock` bigint(20) NOT NULL,
                                                      `cock` bigint(20) NOT NULL,
                                                      `nock_` bigint(20) NOT NULL,
                                                      `cock_` bigint(20) NOT NULL,
                                                      `nontdk` double NOT NULL,
                                                      `contdk` double NOT NULL,
                                                      `nontps` double NOT NULL,
                                                      `contps` double NOT NULL,
                                                      `nontck` double NOT NULL,
                                                      `contck` double NOT NULL,
                                                      `nontck_` double NOT NULL,
                                                      `contck_` double NOT NULL,
                                                      `loaitien` char(3) NOT NULL,
                                                      `manhom` int(4) NOT NULL,
                                                      `nguoiduyet` varchar(20) NOT NULL,
                                                      `matkcha` varchar(6) NOT NULL,
                                                      `truongnhomduyet` int(1) NOT NULL,
                                                      `giamdocduyet` int(1) NOT NULL,
                                                      `ngaytruongphong` datetime NOT NULL,
                                                      `ngaygiamdoc` datetime NOT NULL,
                                                      `_nockduyet` bigint(20) NOT NULL,
                                                      `_cockduyet` bigint(20) NOT NULL,
                                                      `ghichu` text NOT NULL,
                                                      `nhanvienduyet` int(1) NOT NULL
                                                    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;");


mysqli_query($cnn,"ALTER TABLE `duyetcnkh` ADD PRIMARY KEY (`sott`);");
mysqli_query($cnn,"ALTER TABLE `duyetcnkh` MODIFY `sott` int(11) NOT NULL AUTO_INCREMENT;");

mysqli_query($cnn,"INSERT into duyetcnkh(makh,tenkh,makhcha,matk,nodk,codk,nops,cops,nock,cock,nock_,cock_,makh_matk) SELECT makh,tenkh,makhcha,matk,nodk,codk,nops,cops,nock,cock,nock_,cock_,makh_matk FROM cnkh where makh_matk NOT in (select makh_matk FROM duyetcnkh);");

mysqli_query($cnn,"ALTER TABLE `duyetcnkh` ADD `canhbao` INT(1) NOT NULL;");
mysqli_query($cnn,"DELETE FROM duyetcnkh WHERE makh_matk NOT in (select makh_matk FROM cnkh) ");

mysqli_query($cnn,"UPDATE duyetcnkh JOIN cnkh 
                            ON duyetcnkh.makh_matk = cnkh.makh_matk
                            SET
                             duyetcnkh.nodk = cnkh.nodk,
                                duyetcnkh.codk = cnkh.codk,
                                duyetcnkh.nops = cnkh.nops,
                                duyetcnkh.cops = cnkh.cops,
                                duyetcnkh.nock = cnkh.nock,
                                duyetcnkh.cock = cnkh.cock");

$sql = "select * from duyetcnkh where 0=0 {$filterQuery} order by matk";
$query = mysqli_query($cnn,$sql);
while ($result = mysqli_fetch_assoc($query)){
    $data[] = $result;
}

mysqli_close($cnn);

echo "{\"data\":".json_encode($data) ." }" ;
?>