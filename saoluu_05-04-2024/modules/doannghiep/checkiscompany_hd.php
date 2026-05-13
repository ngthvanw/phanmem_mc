<?php
$madoanhnghiep = trim($_GET["id"]);
$khongtontai = 0; // if là 0 thì key này chua có

session_start();
$data_dauvao = array("CmdType"=>904,
                "CommandObject"=>$madoanhnghiep);

$CommandData = base64_encode(json_encode($data_dauvao, JSON_UNESCAPED_UNICODE));
$data_arr = array("partnerGUID" => "34ec098d-4094-4045-bb40-9c15f470f2fa", "CommandData" => $CommandData);
$data = json_encode($data_arr);

$url = "https://ws.ehoadon.vn/WSPublicEhoadon.asmx/ExecCommand";
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

    curl_setopt($curl, CURLOPT_HTTPHEADER, array(
        'Authorization: Basic ' . base64_encode(  "2100462770:39564989"),
        'Content-Type: application/json',
    ));
    curl_setopt($curl, CURLOPT_BUFFERSIZE, 64000);
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
}  // Hàm API
$res = callAPI("POST", $url, $data);
$data_res_base = json_decode($res, true);
$data_res_enbase = json_decode(base64_decode($data_res_base['d']), true);
$res_bkav = json_decode($data_res_enbase['Object'], true);
if($data_res_enbase[Status]==0){
    echo $data_res_enbase['Object']['TrangThaiHoatDong'].". Ngày cập nhật cuối: ".$data_res_enbase['Object']['LastUpdate'];
}else{
    echo '{"Success":true,"ErrorCode":"","Errors":[],"Data":"","CustomData":null}';
}
?>