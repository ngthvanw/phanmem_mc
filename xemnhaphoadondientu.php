<?php
session_start();
unset($_SESSION["NOIDUNGBANHOADONDTNHAP"]);
$array_hoadon = $_GET['data'];
$array_hoadon['generalInvoiceInfo']['paymentStatus'] = true;
$array_hoadon['generalInvoiceInfo']['cusGetInvoiceRight'] = true;
$data = json_encode($array_hoadon);
require("config.php");
$loaihd = ($_GET['loaihoadon']);
$DuongDan = str_replace(",",":",$_SESSION['txt_hddt_duongdan']);
$url = "https://{$DuongDan}/InvoiceAPI/InvoiceUtilsWS/createInvoiceDraftPreview/" . $_SESSION['txt_hddt_tendangnhap'];

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
    $res = callAPI("POST", $url, $data);
echo $res;
$_SESSION["NOIDUNGBANHOADONDTNHAP"] = json_decode ($res,true);
?>