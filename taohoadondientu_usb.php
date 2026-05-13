<?php
session_start();
unset($_SESSION["NOIDUNGBANHOADONDT"]);
if(trim($_SESSION['txt_seritoken']) != '') {
    $_GET['data']['generalInvoiceInfo']['certificateSerial']=$_SESSION['txt_seritoken'];
}
$data = json_encode($_GET['data']);
require("config.php");
$loaihd = ($_GET['loaihoadon']);
$DuongDan = str_replace(",",":",$_SESSION['txt_hddt_duongdan']);
if ($loaihd == 1 || $loaihd == 2 || $loaihd == 3) {
        $url = "https://{$DuongDan}/InvoiceAPI/InvoiceWS/createInvoiceUsbTokenGetHash/" . $_SESSION['txt_hddt_tendangnhap'];
}else if ($loaihd == 8) {
        $url = "https://{$DuongDan}/InvoiceAPI/InvoiceWS/createOrUpdateInvoiceDraft/" . $_SESSION['txt_hddt_tendangnhap'];
}else if ($loaihd == 4) {
    $url = "https://{$DuongDan}/InvoiceAPI/InvoiceWS/cancelTransactionInvoice?supplierTaxCode=" . $_GET['data']['supplierTaxCode'] . "&invoiceNo=" . $_GET['data']['invoiceNo'] . "&strIssueDate=" . $_GET['data']['strIssueDate'] . "&additionalReferenceDesc=" . $_GET['data']['additionalReferenceDesc'] . "&additionalReferenceDate=" . $_GET['data']['additionalReferenceDate'];
} else if ($loaihd == 7) {
    $url = "https://{$DuongDan}/InvoiceAPI/InvoiceUtilsWS/getInvoiceRepresentationFile";
}
//debug($_GET['data']);
function callAPI($method, $url, $data)
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
    //curl_setopt($curl, CURLOPT_INTERFACE, "146.196.65.92");

    curl_setopt($curl, CURLOPT_HTTPHEADER, array(
        'Authorization: Basic ' . base64_encode($_SESSION['txt_hddt_tendangnhap'] . ":" . $_SESSION['txt_hddt_matkhau']),
        'Content-Type: application/json',
    ));
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
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

if ($loaihd == 1 || $loaihd == 2 || $loaihd == 3 || $loaihd==7 || $loaihd==8) {
    $res = callAPI("POST", $url, $data);
    if($loaihd == 8){// NẾU LẬP HÓA ĐƠN NHÁP
        $arr_res = json_decode($res,true);
        if($arr_res['errorCode']=="" && $loaihd==8){
            $arr_res['result']['supplierTaxCode']="";
            $arr_res['result']['invoiceNo']=$_GET['data']['generalInvoiceInfo']['invoiceSeries']."0000000";
            $arr_res['result']['transactionID']="";
            $arr_res['result']['reservationCode']="";
        }

        echo json_encode($arr_res);
    }else{
        echo $res;
        $arr_res = json_decode($res,true);
        if($arr_res['errorCode']==null && $loaihd==7){
            $_SESSION["NOIDUNGBANHOADONDT"] = $arr_res;
        }
    }

} else if ($loaihd == 4) {
   $res = callAPI("GET", $url, $data);
    echo $res;
}

?>