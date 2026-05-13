<?php
include("../../config.php");
$LoaiToKhai = $_GET['loaitokhai'];
$ThangTinhThue = $_GET['thangtinhthue'];
$NamTinhThue = $_GET['namtinhthue'];
$OBJ = new baocaothue();
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

$OBJ->re_query("CREATE TABLE `tokhai_05kk_tncn` ( `sott` INT NOT NULL AUTO_INCREMENT , `maso` CHAR(5) NOT NULL , `chitieu` VARCHAR(1000) NOT NULL , `machitieu` INT NOT NULL , `machitieucha` INT NOT NULL , `donvitinh` VARCHAR(10) NOT NULL , `sotien` BIGINT NOT NULL , `namtinhthue` INT(4) NOT NULL , `kytinhthue` CHAR(5) NOT NULL , `loaitokhai` INT(1) NOT NULL , PRIMARY KEY (`sott`)) ENGINE = InnoDB;");
$result_sl = $OBJ->re_query("select count(*) as sott from tokhai_05kk_tncn where namtinhthue='{$NamTinhThue}' and kytinhthue='{$ThangTinhThue}' and loaitokhai='{$LoaiToKhai}'");
$data_sl = $OBJ->re_fetch($result_sl);

if($data_sl['sott']=='0'){
    $OBJ->re_query("INSERT INTO `tokhai_05kk_tncn`(`maso`, `chitieu`, `machitieu`, `machitieucha`, `donvitinh`, `sotien`, `namtinhthue`, `kytinhthue`, `loaitokhai`)
                VALUES ('1','Tổng số người lao động:','21','0','Người','','{$NamTinhThue}','{$ThangTinhThue}','{$LoaiToKhai}'),
                       ('','Trong đó: Cá nhân cư trú có hợp đồng lao động','22','21','Người','','{$NamTinhThue}','{$ThangTinhThue}','{$LoaiToKhai}'),
                       ('2','Tổng số cá nhân đã khấu trừ thuế [23]=[24]+[25]','23','0','Người','','{$NamTinhThue}','{$ThangTinhThue}','{$LoaiToKhai}'),
                       ('2.1','Cá nhân cư trú','24','23','Người','','{$NamTinhThue}','{$ThangTinhThue}','{$LoaiToKhai}'),
                       ('2.2','Cá nhân không cư trú','25','23','Người','','{$NamTinhThue}','{$ThangTinhThue}','{$LoaiToKhai}'),
                       ('3','Tổng thu nhập chịu thuế (TNCT) trả cho cá nhân [26]=[27]+[28]','26','0','VNĐ','','{$NamTinhThue}','{$ThangTinhThue}','{$LoaiToKhai}'),
                       ('3.1','Cá nhân cư trú','27','26','VNĐ','','{$NamTinhThue}','{$ThangTinhThue}','{$LoaiToKhai}'),
                       ('3.2','Cá nhân không cư trú','28','26','VNĐ','','{$NamTinhThue}','{$ThangTinhThue}','{$LoaiToKhai}'),
                       ('4','Tổng TNCT trả cho cá nhân thuộc diện phải khấu trừ thuế [29]=[30]+[31]','29','0','VNĐ','','{$NamTinhThue}','{$ThangTinhThue}','{$LoaiToKhai}'),
                       ('4.1','Cá nhân cư trú','30','29','VNĐ','','{$NamTinhThue}','{$ThangTinhThue}','{$LoaiToKhai}'),
                       ('4.2','Cá nhân không cư trú','31','29','VNĐ','','{$NamTinhThue}','{$ThangTinhThue}','{$LoaiToKhai}'),
                       ('5','Tổng số thuế thu nhập cá nhân đã khấu trừ [32]=[33]+[34]','32','0','VNĐ','','{$NamTinhThue}','{$ThangTinhThue}','{$LoaiToKhai}'),
                       ('5.1','Cá nhân cư trú','33','32','VNĐ','','{$NamTinhThue}','{$ThangTinhThue}','{$LoaiToKhai}'),
                       ('5.2','Cá nhân không cư trú','34','29','VNĐ','','{$NamTinhThue}','{$ThangTinhThue}','{$LoaiToKhai}'),
                       ('6','Tổng TNCT từ tiền phí mua bảo hiểm nhân thọ, bảo hiểm không bắt buộc khác của doanh nghiệp bảo hiểm không thành lập tại Việt Nam cho người lao động','35','0','VNĐ','','{$NamTinhThue}','{$ThangTinhThue}','{$LoaiToKhai}'),
                       ('7','Tổng số thuế TNCN đã khấu trừ trên tiền phí mua bảo hiểm nhân thọ, bảo hiểm không bắt buộc khác của doanh nghiệp bảo hiểm không thành lập tại Việt Nam cho người lao động','36','0','VNĐ','','{$NamTinhThue}','{$ThangTinhThue}','{$LoaiToKhai}')
                ");
}
$filterQuery = "";
$LoaiToKhai = $_GET['loaitokhai'];

$filterParam = array();

if ( isset($_GET["pq_filter"]))
{
    $pq_filter = khu_dau_vn($_GET["pq_filter"]);
    $dsf = FilterHelper::deSerializeFilter($pq_filter);
    $string = khu_dau_vn(str_replace("manhom","mavt.manhom",$dsf->query));
    $filterQuery = khu_dau_vn(str_replace("tenvt","tenkd",$string));
} 
$OBJ->setStrOderby(" namtinhthue='{$NamTinhThue}' and kytinhthue='{$ThangTinhThue}' and loaitokhai='{$LoaiToKhai}' ");
$result = $OBJ->loadDanhSachToKhai_KhauTru_Thue_TNCN();
//debug($result);
echo "{\"data\":".json_encode($result) ." }" ;
?>