<?php
ini_set('max_execution_time', 300);
require("../../config.php");
$OBJ = new ps_chitiet_mavattu();
$NhaCungCap = $_GET['nhacungcap'];
$manhom = $_GET['manhom'];
$matkhang = $_GET['matkhang'];
$matkdoanhthu = $_GET['matkdoanhthu'];
$SoPhieu = $_GET['sophieu'];
$xmlString = trim($_SESSION['DataPhucHoi']);

$find_tax = array("","-1","-2","8","%",'KCT');
$replace_tax = array("K","K","K","10","10",'K');
//////////////////////////////////////////////////////////////////////////////////////////////
$OBJ->re_query("CREATE TABLE `nhaphoadon` ( `sott` INT NOT NULL AUTO_INCREMENT , `mavt` CHAR(20) NOT NULL , `tenvt` VARCHAR(500) NOT NULL , `dvt` VARCHAR(50) NOT NULL , `manhom` CHAR(10) NOT NULL , `matk` CHAR(10) NOT NULL , `tkdoanhthu` CHAR(10) NOT NULL , `tenkd` VARCHAR(500) NOT NULL , `soluong` DOUBLE(15,3) NOT NULL , `dongia` DOUBLE(15,3) NOT NULL , `thanhtien` BIGINT NOT NULL , `chietkhau` BIGINT NOT NULL , `thuesuat` CHAR(4) NOT NULL , `tienthue` BIGINT NOT NULL, `sophieu` BIGINT NOT NULL , PRIMARY KEY (`sott`), INDEX `id_mavt` (`mavt`)) ENGINE = InnoDB;");
if($NhaCungCap=='Einvoice'){

    $sxe = new SimpleXMLElement($xmlString);

    $ns = $sxe->getNamespaces(true);

    $child = $sxe->children($ns['inv']);
    $data = $child->invoice->invoiceData->items;
    $sql_in = "INSERT INTO nhaphoadon(mavt,tenvt,dvt,manhom,matk,tkdoanhthu,tenkd,soluong,dongia,thanhtien,thuesuat,tienthue,sophieu) VALUES ";
   $val="";
    foreach ($data->item as $item)
    {
        $val.="('".str_replace(" ","_",trim($item->itemCode))."','".check_data($item->itemName)."','".$item->unitName."','".$manhom."','".$matkhang."','".$matkdoanhthu."','".check_data(khu_dau_vn($item->itemName))."',".$item->quantity.",".$item->unitPrice.",".$item->itemTotalAmountWithoutVat.",'".str_replace($find_tax,$replace_tax,$item->vatPercentage)."',".$item->vatAmount.",'".$SoPhieu."'),";
    }
    $SQL_INS = $sql_in.substr($val,0,-1);
    $OBJ->re_query("delete from nhaphoadon where sophieu='".$SoPhieu."'");
    $OBJ->re_query($SQL_INS);
} else if($NhaCungCap=='TT78'){
    $child = new SimpleXMLElement($xmlString);
	
    $data = $child->DLHDon->NDHDon->DSHHDVu;
    $TTHoaDon = $child->DLHDon->NDHDon->NBan->MST."@!@".$child->DLHDon->NDHDon->NBan->Ten."@!@".$child->DLHDon->NDHDon->NBan->DChi."@!@".$child->DLHDon->TTChung->KHMSHDon."@!@".$child->DLHDon->TTChung->KHHDon."@!@".$child->DLHDon->TTChung->SHDon."@!@".$child->DLHDon->TTChung->NLap;
    $sql_in = "INSERT INTO nhaphoadon(mavt,tenvt,dvt,manhom,matk,tkdoanhthu,tenkd,soluong,dongia,thanhtien,thuesuat,tienthue,sophieu) VALUES ";
    $val="";
    foreach ($data->HHDVu as $item)
    {

        $val.="('".str_replace(" ","_",trim($item->MHHDVu))."','".check_data($item->THHDVu)."','".$item->DVTinh."','".$manhom."','".$matkhang."','".$matkdoanhthu."','".check_data(khu_dau_vn($item->THHDVu))."',".$item->SLuong.",".$item->DGia.",".round($item->ThTien).",'".str_replace($find_tax,$replace_tax,$item->TSuat)."',".round(($item->ThTien*($item->TSuat/100))).",'".$SoPhieu."'),";
    }
    $SQL_INS = $sql_in.substr($val,0,-1);
    $OBJ->re_query("delete from nhaphoadon where sophieu='".$SoPhieu."'");
    $OBJ->re_query($SQL_INS);
}else if($NhaCungCap=='Vinvoice'){
    $child = new SimpleXMLElement($xmlString);

    $data = $child->Content->Products;

    $sql_in = "INSERT INTO nhaphoadon(mavt,tenvt,dvt,manhom,matk,tkdoanhthu,tenkd,soluong,dongia,thanhtien,thuesuat,tienthue,sophieu) VALUES ";
    $val="";
    foreach ($data->Product as $item)
    {
        $val.="('".str_replace(" ","_",trim($item->Code))."','".check_data($item->ProdName)."','".$item->ProdUnit."','".$manhom."','".$matkhang."','".$matkdoanhthu."','".check_data(khu_dau_vn($item->ProdName))."',".$item->ProdQuantity.",".$item->ProdPrice.",".$item->Amount.",'".str_replace($find_tax,$replace_tax,$item->VATRate)."',".$item->VATAmount.",'".$SoPhieu."'),";
    }
    $SQL_INS = $sql_in.substr($val,0,-1);
    $OBJ->re_query("delete from nhaphoadon where sophieu='".$SoPhieu."'");
    $OBJ->re_query($SQL_INS);
}else if($NhaCungCap=='MISA' || $NhaCungCap=='VIETTEL'){
    $sxe = new SimpleXMLElement($xmlString);

    $ns = $sxe->getNamespaces(true);

    $child = $sxe->children($ns['inv']);
    $data = $child->invoiceData->items;

    $sql_in = "INSERT INTO nhaphoadon(mavt,tenvt,dvt,manhom,matk,tkdoanhthu,tenkd,soluong,dongia,thanhtien,thuesuat,tienthue,sophieu) VALUES ";
    $val="";
    foreach ($data->item as $item)
    {
        $val.="('".str_replace(" ","_",trim($item->itemCode))."','".check_data($item->itemName)."','".$item->unitName."','".$manhom."','".$matkhang."','".$matkdoanhthu."','".check_data(khu_dau_vn($item->itemName))."',".$item->quantity.",".$item->unitPrice.",".$item->itemTotalAmountWithoutVat.",'".str_replace($find_tax,$replace_tax,$item->vatPercentage)."',".$item->vatAmount.",'".$SoPhieu."'),";
    }
    $SQL_INS = $sql_in.substr($val,0,-1);
    $OBJ->re_query("delete from nhaphoadon where sophieu='".$SoPhieu."'");
    $OBJ->re_query($SQL_INS);
}else if($NhaCungCap=='VIETTEL'){
    $sxe = new SimpleXMLElement($xmlString);

    $ns = $sxe->getNamespaces(true);

    $child = $sxe->children($ns['inv']);
    $data = $child->invoiceData->items;

    $sql_in = "INSERT INTO nhaphoadon(mavt,tenvt,dvt,manhom,matk,tkdoanhthu,tenkd,soluong,dongia,thanhtien,thuesuat,tienthue,sophieu) VALUES ";
    $val="";
    foreach ($data->item as $item)
    {
        $val.="('".str_replace(" ","_",trim($item->itemCode))."','".check_data($item->itemName)."','".$item->unitName."','".$manhom."','".$matkhang."','".$matkdoanhthu."','".check_data(khu_dau_vn($item->itemName))."',".$item->quantity.",".$item->unitPrice.",".$item->itemTotalAmountWithoutVat.",'".str_replace($find_tax,$replace_tax,$item->vatPercentage)."',".$item->vatAmount.",'".$SoPhieu."'),";
    }
    $SQL_INS = $sql_in.substr($val,0,-1);
    $OBJ->re_query("delete from nhaphoadon where sophieu='".$SoPhieu."'");
    $OBJ->re_query($SQL_INS);
}else if($NhaCungCap=='BKAV'){
    $sxe = new SimpleXMLElement($xmlString);
    $ns = $sxe->getNamespaces(true);
    $child = $sxe->children($ns['inv']);
    $data = $child->invoiceData->items;

    $sql_in = "INSERT INTO nhaphoadon(mavt,tenvt,dvt,manhom,matk,tkdoanhthu,tenkd,soluong,dongia,thanhtien,thuesuat,tienthue,sophieu) VALUES ";
    $val="";
    foreach ($data->item as $item)
    {
        $val.="('".str_replace(" ","_",trim($item->itemCode))."','".check_data($item->itemName)."','".$item->unitName."','".$manhom."','".$matkhang."','".$matkdoanhthu."','".check_data(khu_dau_vn($item->itemName))."',".$item->quantity.",".$item->unitPrice.",".$item->itemTotalAmountWithoutVat.",'".str_replace($find_tax,$replace_tax,$item->vatPercentage)."',".$item->vatAmount.",'".$SoPhieu."'),";
    }
    $SQL_INS = $sql_in.substr($val,0,-1);
    $OBJ->re_query("delete from nhaphoadon where sophieu='".$SoPhieu."'");
    $OBJ->re_query($SQL_INS);
}else if($NhaCungCap=='TS24'){
    $sxe = new SimpleXMLElement($xmlString);
    $ns = $sxe->getNamespaces(true);
    $child = $sxe->children($ns['inv']);
    $data = $child->invoices->invoice->invoiceData->items;
    $sql_in = "INSERT INTO nhaphoadon(mavt,tenvt,dvt,manhom,matk,tkdoanhthu,tenkd,soluong,dongia,thanhtien,thuesuat,tienthue,sophieu) VALUES ";
    $val="";
    foreach ($data->item as $item)
    {
        $mahang = $item->itemCode;
        $val.="('".str_replace(" ","_",trim($mahang))."','".check_data($item->itemName)."','".$item->unitName."','".$manhom."','".$matkhang."','".$matkdoanhthu."','".check_data(khu_dau_vn($item->itemName))."',".$item->quantity.",".$item->unitPrice.",".$item->itemTotalAmountWithoutVat.",'".str_replace($find_tax,$replace_tax,$item->vatPercentage)."',".$item->vatAmount.",'".$SoPhieu."'),";
    }
    $SQL_INS = $sql_in.substr($val,0,-1);
    $OBJ->re_query("delete from nhaphoadon where sophieu='".$SoPhieu."'");
    $OBJ->re_query($SQL_INS);
}else if($NhaCungCap=='Excel'){
    $data = $_SESSION['DataExcel'];
    $sql_in = "INSERT INTO nhaphoadon(mavt,tenvt,dvt,manhom,matk,tkdoanhthu,tenkd,soluong,dongia,thanhtien,thuesuat,tienthue,sophieu) VALUES ";
    $val="";
    foreach ($data as $k=>$item)
    {
        if($k!=0 && $item[1]!=""){
            $val.="('".strtoupper(str_replace(" ","_",trim($item[1])))."','".check_data($item[2])."','".$item[3]."','".$manhom."','".$matkhang."','".$matkdoanhthu."','".check_data(khu_dau_vn($item[2]))."',".$item[4].",".round($item[5],3).",".round($item[6]).",'".$item[7]."',".$item[8].",'".$SoPhieu."'),";
        }
    }
    $SQL_INS = $sql_in.substr($val,0,-1);
    $OBJ->re_query("delete from nhaphoadon where sophieu='".$SoPhieu."'");
    $OBJ->re_query($SQL_INS);
}
 echo "<input type='hidden' id='TTHoaDon' value='".$TTHoaDon."'><input type='hidden' id='TTHoaDon_MaHoa' value='".base64_encode($TTHoaDon)."'>Tải dữ liệu thành công .<br/> Nhấn phím <strong style=\"color:blue;\">[Y]</strong> để thoát ... ";
 unset($_SESSION['DataExcel']);
 unset($_SESSION['DataPhucHoi']);
?>