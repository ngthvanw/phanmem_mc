<?php
include("../../config.php");
$OBJ = new makhachhang();
$sql_sl = "Select masothue from makh where masothue !='';";
$query_sl = $OBJ->re_query($sql_sl);
while ($data = $OBJ->re_fetch($query_sl)) {
    $masothue = trim($data['masothue']);
    $thongtinDN = truyvan_thongtindn($masothue);
    $thongtinDN_Arr = json_decode($thongtinDN, true );
    if($thongtinDN_Arr['Success']==1){
        $Data = json_decode($thongtinDN_Arr['Data'], true);
        $MSTCongTy = $Data['taxCode'];
        $TenCongTy = $Data['companyName'];
        $DaiChi = $Data['address'];
        $TrangThaiHoatDong = $Data['TrangThaiHoatDong'];
        $Sql_Ud = "UPDATE makh SET diachi = '$DaiChi', ghichu = '$TrangThaiHoatDong' WHERE masothue = '$MSTCongTy';";
        $query_ud = $OBJ->re_query($Sql_Ud);
    }
}
function truyvan_thongtindn($masothue){
    $madoanhnghiep = $masothue;
    $khongtontai = 0; // if là 0 thì key này chua có
    $data_dauvao = array("CmdType"=>904,
                    "CommandObject"=>$madoanhnghiep);

    $CommandData = base64_encode(json_encode($data_dauvao, JSON_UNESCAPED_UNICODE));
    $data_arr = array("partnerGUID" => "34ec098d-4094-4045-bb40-9c15f470f2fa", "CommandData" => $CommandData);
    $data = json_encode($data_arr);

    $url = "https://ws.ehoadon.vn/WSPublicEhoadon.asmx/ExecCommand";

    $res = callAPI("POST", $url, $data);
    $data_res_base = json_decode($res, true);
    $data_res_enbase = json_decode(base64_decode($data_res_base['d']), true);
    $res_bkav = json_decode($data_res_enbase['Object'], true);
    if($data_res_enbase[Status]==0){
        $data_trave = array (
            'Success' => true,
            'ErrorCode' => '',
            'Errors' =>
                array (
                ),
            'Data' => '{"taxCode":"'.$data_res_enbase['Object']['MaSoThue'].'","companyName":"'.$data_res_enbase['Object']['TenChinhThuc'].'","owner":"'.$data_res_enbase['Object']['ChuDoanhNghiep'].'","address":"'.$data_res_enbase['Object']['DiaChiGiaoDichChinh'].'","TrangThaiHoatDong":"'.$data_res_enbase['Object']['TrangThaiHoatDong'].'","LastUpdate":"'.$data_res_enbase['Object']['LastUpdate'].'"}',
            'CustomData' => NULL,
        );
        return json_encode($data_trave);
    }else{
        return  '{"Success":true,"ErrorCode":"","Errors":[],"Data":"","CustomData":null}';
    }
}
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
?>