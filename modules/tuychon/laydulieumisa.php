<?php
session_start();
$DuongDan = ($_GET['duongdan']);
$user = ($_GET['user']);
$pass = ($_GET['pass']);
$mauso = ($_GET['mauso']);
$kyhieu = ($_GET['kyhieu']);
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

function callAPI($method, $url, $data,$HTTPHEADER)
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
    curl_setopt($curl, CURLOPT_HTTPHEADER,$HTTPHEADER);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    // EXECUTE:

    $result = curl_exec($curl);
    if (!$result) {
        die("Lỗi kết nối");
    }
    curl_close($curl);
    return $result;
}
$Token_json = callAPI("POST", $url, $data,$HTTPHEADER);
$TonKen_Arr = json_decode($Token_json,true);
$TonKen = $TonKen_Arr['access_token'];
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
//var_dump($TonKen_Arr);
$targetInvSeries = $mauso.$kyhieu;
foreach ($Data_Temp_Arr_Tmp as $item) {
    if ($item['InvSeries'] == $targetInvSeries) {
        $Data_Temp_Arr = $item;
        break; // dừng khi tìm thấy
    }
}
$ChuoiTraVe = array(
                        "Token"=>$TonKen,
                        "OrganizationUnitID"=>$TonKen_Arr['OrganizationUnitID'],
                        "CompanyID"=>$TonKen_Arr['CompanyID'],
                        "UserID"=>$TonKen_Arr['UserID'],
                        "InvoiceTemplateID"=>$Data_Temp_Arr['IPTemplateID'],
                        "C_OR_K"=>$C_OR_K
                    );
echo json_encode($ChuoiTraVe);