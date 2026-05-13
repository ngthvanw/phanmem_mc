<?php
session_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');

// Lấy Token hoá đơn MISA
function get_Token_MiSA($MauSo,$KyHieu){
    $DuongDan = $_SESSION['txt_hddt_duongdan'];
    $user = $_SESSION['txt_hddt_tendangnhap'];
    $pass =  $_SESSION['txt_hddt_matkhau'] ;
    $mauso =  $MauSo;
    $kyhieu = $KyHieu;
    $DuongDan = str_replace(",",":",$DuongDan);
    $url = "https://{$DuongDan}/oauth";
    $C_OR_K = substr($kyhieu,0,1);
    if($C_OR_K=="C"){
        $url_temp = "https://{$DuongDan}/v3common/code/template";
    }else{
        $url_temp = "https://{$DuongDan}/v3common/template";
    }
    $data = "grant_type=password&username=".$user."&password=".$pass;
    $HTTPHEADER = array(
        'TaxCode:'.$_SESSION['MST'],
        'Content-Type: text/plain',
    );
    $Token_json = callAPI("POST", $url, $data,$HTTPHEADER);
    $TonKen_Arr = json_decode($Token_json,true);
    $TonKen = $TonKen_Arr['access_token'];
    // === GHI TOKEN VÀO FILE ===
    $tokenFile = __DIR__. '/datafile/'.$_SESSION['MST'].'/token_misa.txt'; // đường dẫn lưu file token
    // Nếu file tồn tại và quá 1 tuần thì xóa
    if (file_exists($tokenFile)) {
        $lastModified = filemtime($tokenFile);
        $oneWeek = 1 * 24 * 60 * 60; // 1 ngày = 604800 giây
        if ((time() - $lastModified) > $oneWeek) {
            unlink($tokenFile); // xóa file cũ
			// Ghi token mới vào file
			file_put_contents($tokenFile, $TonKen);
        }
    }else{
		file_put_contents($tokenFile, $TonKen);
	}
    // === ĐỌC LẠI TOKEN TỪ FILE ===
    $tokenFromFile = file_get_contents($tokenFile);
    $_SESSION['txt_PartnerToken'] = $tokenFromFile;

    $TonKen = $tokenFromFile;
    $HTTPHEADER_TEMP = array(
        'Authorization: Bearer '.$TonKen,
        'TaxCode:'.$_SESSION['MST'],
        'Content-Type: application/json',
    );
    $data_temp_arr = array("TypeInvoice"=> $mauso,
        "TaxCode"=> $_SESSION['MST'],
        "UserName"=> $user,
        "Password"=> $pass
    );
    $data_temp = json_encode($data_temp_arr);
    $Template_Json = callAPI("POST", $url_temp, $data_temp,$HTTPHEADER_TEMP);
    $Template_Arr = json_decode($Template_Json,true);
    $Data_Temp_Arr_Tmp = json_decode($Template_Arr['data'],true);
    $targetInvSeries = $mauso.$kyhieu;
    foreach ($Data_Temp_Arr_Tmp as $item) {
        if ($item['InvSeries'] == $targetInvSeries) {
            $Data_Temp_Arr = $item;
            break; // dừng khi tìm thấy
        }
    }
    $_SESSION['InvoiceTemplateID'] = $Data_Temp_Arr['IPTemplateID'];
}
// End Lấy Token hoá đơn MISA

function getGUID($microtime){
    $charid = (md5($microtime));
    $hyphen = chr(45);// "-"
    $uuid = substr($charid, 0, 8).$hyphen
            .substr($charid, 8, 4).$hyphen
            .substr($charid,12, 4).$hyphen
            .substr($charid,16, 4).$hyphen
            .substr($charid,20,12);// ""
    return $uuid;
}

unset($_SESSION["NOIDUNGBANHOADONDT"]);
$Time_HD = date("H:i:s");
$array_hoadon = $_GET['data'];
$NgayHoaDon = $array_hoadon[0]['InvDate']." ".$Time_HD;
$array_hoadon[0]['InvDate'] = $NgayHoaDon;
$MauSo = substr($array_hoadon[0]['InvSeries'],0,1);
$KyHieu = substr($array_hoadon[0]['InvSeries'],1,6);
$RefID = $array_hoadon[0]['RefID'];
$RefID_AF = getGUID($RefID);
get_Token_MiSA($MauSo,$KyHieu);
$array_hoadon[0]['RefID'] = $RefID_AF;
$array_hoadon[0]['InvoiceTemplateID'] = $_SESSION['InvoiceTemplateID'];// Cập nhật lại ID mẫu hoá đơn

foreach ($array_hoadon[0]['InvoiceDetails'] as $key=> $Item_InvoiceDetails){
    $RefDetailID = $Item_InvoiceDetails['RefDetailID'];
    $RefDetailID_AF = getGUID($RefDetailID);
    $array_hoadon[0]['InvoiceDetails'][$key]['RefDetailID'] = $RefDetailID_AF;
    $array_hoadon[0]['InvoiceDetails'][$key]['RefID'] = $RefID_AF;
}

require("config.php");
$loaihd = ($_GET['loaihoadon']);
$DuongDan = str_replace(",",":",$_SESSION['txt_hddt_duongdan']);
if ($loaihd == 1 || $loaihd == 2 || $loaihd == 3) {

}else if ($loaihd == 8) {
    if($_SESSION['C_OR_K']=="K"){
        $url = "https://{$DuongDan}/v3sainvoice";
    }else{
        $url = "https://{$DuongDan}/v3sainvoice/Code";
    }

}else if ($loaihd == 13) {
    $array_hoadon[0]['EditVersion'] = 1;
    if($_SESSION['C_OR_K']=="K"){
        $url = "https://{$DuongDan}/v3sainvoice";
    }else{
        $url = "https://{$DuongDan}/v3sainvoice/Code";
    }

}
$data = json_encode($array_hoadon);
function callAPI($method, $url, $data)
{
    $curl = curl_init();
    switch ($method) {
        case "POST":
            curl_setopt($curl, CURLOPT_POST, 1);
            if ($data) {
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            }
            break;
        case "GET":
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
            //if ($data)
            //curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            break;
        case "PUT":
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
            if ($data)
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            break;
        default:
            if ($data)
                $url = sprintf("%s?%s", $url, http_build_query($data));
    }
    // OPTIONS:
    curl_setopt($curl, CURLOPT_URL, $url);
    $HTTPHEADER = array(
        'Authorization: Bearer '.$_SESSION['txt_PartnerToken'],
        'TaxCode:'.$_SESSION['MST'],
        'Content-Type: application/json',
    );
    curl_setopt($curl, CURLOPT_HTTPHEADER,$HTTPHEADER);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    //curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BEARER);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    // EXECUTE:
    $res = '{
        "errorCode": "INVOICE_ISSUED_DATE_INVALID",
                        "description": "Không kết nối được tới máy chủ !"
                    }';

    $result = curl_exec($curl);
    if (!$result) {
        die($res);
    }
    curl_close($curl);
    return $result;
}
if ($loaihd == 1 || $loaihd == 2 || $loaihd == 3 || $loaihd==7 || $loaihd==8 || $loaihd==13) {
    $res = callAPI("POST", $url, $data);
    if($loaihd == 8 || $loaihd == 13){// NẾU LẬP HÓA ĐƠN NHÁP
        $arr_res_data = json_decode($res,true);
        $arr_res = json_decode($arr_res_data['data'],true);
		//echo "<pre>";
		//print_r($arr_res_data);
		//echo "</pre>";
        $arr_res['errorCode']="";
        $arr_res['description']="";
        if($arr_res[$RefID_AF]['ErrorMessage']!=""){
            $arr_res['errorCode'] = 1;
            $arr_res['description'] = $arr_res[$RefID_AF]['ErrorMessage'];
        }
        if($arr_res['errorCode']==null){
            $arr_res['errorCode'] = "";
        }
        if($arr_res['errorCode']=="" && $loaihd==8){
            $arr_res['result']['supplierTaxCode']="";
            $arr_res['result']['invoiceNo']=$KyHieu."0000000";
            $arr_res['result']['transactionID']="";
            $arr_res['result']['reservationCode']="";
        }
        if($arr_res['errorCode']=="" && $loaihd==13){
            $arr_res['result']['supplierTaxCode']="";
            $arr_res['result']['invoiceNo']=$KyHieu."0000000";
            $arr_res['result']['transactionID']="";
            $arr_res['result']['reservationCode']="";
        }
        echo json_encode($arr_res);
    }else{
        $arr_res = json_decode($res,true);
        $arr_res['errorCode'] = $arr_res['code'];
        $arr_res['description'] = $arr_res['data'];
        if($arr_res['errorCode']==null){
            $arr_res['errorCode'] = "";
        }
        if($arr_res['errorCode']=="" && ($loaihd==7)){
            $_SESSION["NOIDUNGBANHOADONDT"] = $arr_res;
        }
        echo json_encode($arr_res);
    }

} else if ($loaihd == 4 || $loaihd == 9) {
    $res = callAPI("GET", $url, $data);
    if($loaihd == 9){
        $arr_res = json_decode($res,true);
        $_SESSION["NOIDUNGBANHOADONDT"] = $arr_res;
    }
    echo $res;
}
?>