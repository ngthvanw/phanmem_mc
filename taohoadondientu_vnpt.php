<?php
session_start();
unset($_SESSION["NOIDUNGBANHOADONDT"]);
$Str = "<?xml version='1.0' encoding='utf-8'?>";
$data = $Str.$_GET['data'];
require("config.php");
$loaihd = ($_GET['loaihoadon']);
$DuongDan = str_replace(",",":",$_SESSION['txt_hddt_duongdan']);
if ($loaihd == 1 || $loaihd == 2 || $loaihd == 3) {
    $Query_str = "ImportInvByPattern";
    if(trim($_SESSION['txt_seritoken']) != '') {
        $url = "https://{$DuongDan}/PublishService.asmx?op=ImportInvByPattern";
    }else{
        $url = "https://{$DuongDan}/PublishService.asmx?op=ImportInvByPattern";
    }
}else if ($loaihd == 8) {
    $url = "https://{$DuongDan}/PublishService.asmx?op=ImportInvByPattern";
    $Query_str = "ImportInvByPattern";
}
//echo $data;
function callAPI($method, $url, $data,$Query_str)
{
    $curl = curl_init();
    switch ($method) {
        case "POST":
            curl_setopt($curl, CURLOPT_POST, 1);
            if ($data)
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
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

    curl_setopt($curl, CURLOPT_HTTPHEADER, array(
        'SOAPAction: "http://tempuri.org/'.$Query_str.'"',
        'Content-Type: text/xml; charset=utf-8',
    ));
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    // EXECUTE:
    // file log `curl.log` nằm tại thư mục relative là `../tmp/`
    $fp = fopen('curl.log', 'a');

    // cho phép `curl` xuất thông tin về kết nối
    //curl_setopt($curl, CURLOPT_VERBOSE, true);
    // xuất thông tin lỗi ra file log
    //curl_setopt($curl, CURLOPT_STDERR, $fp);
    $res = '{
        "errorCode": "INVOICE_ISSUED_DATE_INVALID",
                        "description": "Không kết nối được tới máy chủ !"
                    }';
    $result = curl_exec($curl);
    if (!$result) {
        die($res);
    }
    curl_close($curl);
    // đóng file log
    //fclose($fp);
    return $result;
}
if ($loaihd == 1 || $loaihd == 2 || $loaihd == 3 || $loaihd==7 || $loaihd==8) {
    $res = callAPI("POST", $url, $data,$Query_str);
    if($loaihd == 8){// NẾU LẬP HÓA ĐƠN NHÁP

        $xml = simplexml_load_string($res);
        $data = $xml->xpath("//soap:Body/*")[0];
        $details = $data->children("http://tempuri.org/");
        $kq_trave = $details->ImportInvByPatternResult;
        $kq = explode(";",$kq_trave);
        if(substr($kq[0],0,3)=="ERR"){
            $res = '{
        "errorCode": "INVOICE_ISSUED_DATE_INVALID",
                        "description": "'.$kq[0].'"
                    }';
            echo $res;
        }else{
            if($arr_res['errorCode']=="" && $loaihd==8){
                $arr_res['result']['supplierTaxCode']="";
                $arr_res['result']['invoiceNo']=$_SESSION['txt_kyhieu']."0000000";
                $arr_res['result']['transactionID']="";
                $arr_res['result']['reservationCode']="";
            }
            echo json_encode($arr_res);
        }
    }else{
        echo $res;
        $arr_res = json_decode($res,true);
    }

}
?>