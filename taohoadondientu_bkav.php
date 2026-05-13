<?php
ini_set('memory_limit', '128M');
ini_set('upload_max_filesize', '128M');
ini_set('post_max_size', '128M');
ini_set('file_uploads', 'On');
ini_set('max_execution_time', '300');
ini_set('file_uploads', 'On');

session_start();
unset($_SESSION["NOIDUNGBANHOADONDT"]);
$CommandData = base64_encode(json_encode($_GET['data'], JSON_UNESCAPED_UNICODE));
$data_arr = array("partnerGUID" => $_SESSION['txt_PartnerGUID'], "CommandData" => $CommandData);
$data = json_encode($data_arr);
require("config.php");
//debug(json_encode($data_arr,JSON_UNESCAPED_UNICODE));
$loaihd = ($_GET['loaihoadon']);
$DuongDan = str_replace(",", ":", $_SESSION['txt_hddt_duongdan']);
$url = "https://{$DuongDan}/ExecCommand";
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
            if ($data)
				curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
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
        'Authorization: Basic ' . base64_encode($_SESSION['txt_hddt_tendangnhap'] . ":" . $_SESSION['txt_hddt_matkhau']),
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
if ($loaihd == 1 || $loaihd == 2 || $loaihd == 3 || $loaihd == 12 || $loaihd == 8 || $loaihd == 13) {// Nếu lập hoá đơn gốc
    $SoHoaDon_Mang = array(1 => '000000',
        2 => '00000',
        3 => '0000',
        4 => '000',
        5 => '00',
        6 => '0',
    );
    $data_res_base = json_decode($res, true);
    $data_res_enbase = json_decode(base64_decode($data_res_base['d']), true);
    $res_bkav = json_decode($data_res_enbase['Object'], true);

    if (($res_bkav[0]['Status'] == 1) || ($data_res_enbase['Status']==1)) {
        $arr_res = array("errorCode" => "INVOICE_ISSUED_DATE_INVALID",
            "description" => $res_bkav[0]['MessLog'].$data_res_enbase['Object']
        );
    } else {
        $arr_res['result']['supplierTaxCode'] = $_SESSION['MST'];
        $arr_res['result']['invoiceNo'] = $res_bkav[0]['InvoiceSerial'] . $SoHoaDon_Mang[strlen($res_bkav[0]['InvoiceNo'])] . $res_bkav[0]['InvoiceNo'];
        $arr_res['result']['transactionID'] = $res_bkav[0]['InvoiceGUID'];
        $arr_res['result']['reservationCode'] = $res_bkav[0]['MTC'];
        if ($loaihd == 1) {
            $CommandData_Mang_Ky = array("CmdType" => 205,
                "CommandObject" => $res_bkav[0]['InvoiceGUID']);
            $CommandData_Mang = base64_encode(json_encode($CommandData_Mang_Ky, JSON_UNESCAPED_UNICODE));
            $data_ky = array("partnerGUID" => $_SESSION['txt_PartnerGUID'], "CommandData" => $CommandData_Mang);
            $data_ky_json = json_encode($data_ky);
            callAPI("POST", $url, $data_ky_json);
        }
    }
    echo json_encode($arr_res);
}else if ($loaihd == 9) {
    if(trim($_SESSION['txt_seritoken'])!=""){
        $data_res_base = json_decode($res, true);
        $data_res_enbase = json_decode(base64_decode($data_res_base['d']), true);
        $res_bkav = json_decode($data_res_enbase['Object'], true);
        $arr_res['errorCode'] = 0;
        $arr_res['description'] = "";
        $arr_res['result']['hashString'] = $res_bkav['XML'];
        echo json_encode($arr_res);
    }else {
        $SoHoaDon_Mang = array(1 => '000000',
            2 => '00000',
            3 => '0000',
            4 => '000',
            5 => '00',
            6 => '0',
        );
        $data_res_base = json_decode($res, true);
        $data_res_enbase = json_decode(base64_decode($data_res_base['d']), true);
        $res_bkav = json_decode($data_res_enbase['Object'], true);

        $CommandData_Mang_Ky = array("CmdType" => 205,
            "CommandObject" => $res_bkav['Invoice']['InvoiceGUID']);
        $CommandData_Mang = base64_encode(json_encode($CommandData_Mang_Ky, JSON_UNESCAPED_UNICODE));
        $data_ky = array("partnerGUID" => $_SESSION['txt_PartnerGUID'], "CommandData" => $CommandData_Mang);
        $data_ky_json = json_encode($data_ky);
        $res1 = callAPI("POST", $url, $data_ky_json);

        $data_res_base1 = json_decode($res1, true);
        $data_res_enbase1 = json_decode(base64_decode($data_res_base1['d']), true);

        if ($res_bkav['Status'] == 1) {
            $arr_res = array("errorCode" => "INVOICE_ISSUED_DATE_INVALID",
                "description" => $data_res_enbase1['Object']
            );
        } else {
            $arr_res['result']['supplierTaxCode'] = $_SESSION['MST'];
            $arr_res['result']['invoiceNo'] = $res_bkav['Invoice']['InvoiceSerial'] . $SoHoaDon_Mang[strlen($res_bkav['Invoice']['InvoiceNo'])] . $res_bkav['Invoice']['InvoiceNo'];
            $arr_res['result']['transactionID'] = $res_bkav['Invoice']['InvoiceGUID'];
            $arr_res['result']['reservationCode'] = $res_bkav['Invoice']['InvoiceCode'];
        }
        echo json_encode($arr_res);
    }

} else if ($loaihd == 4) {
    $data_res_base = json_decode($res, true);
    $data_res_enbase = json_decode(base64_decode($data_res_base['d']), true);
    $res_bkav = json_decode($data_res_enbase['Object'], true);
    if ($res_bkav[0]['Status'] == 1) {
        $arr_res = array("errorCode" => "INVOICE_ISSUED_DATE_INVALID",
            "description" => $data_res_enbase['Object']
        );
    } else {
        $arr_res['result']['supplierTaxCode'] = $_SESSION['MST'];
        $arr_res['result']['invoiceNo'] = $res_bkav[0]['InvoiceSerial'] . $SoHoaDon_Mang[strlen($res_bkav[0]['InvoiceNo'])] . $res_bkav[0]['InvoiceNo'];
        $arr_res['result']['transactionID'] = $res_bkav[0]['InvoiceGUID'];
        $arr_res['result']['reservationCode'] = $res_bkav[0]['MTC'];
    }
    echo json_encode($arr_res);
}else if ($loaihd == 7) {
    $data_res_base = json_decode($res, true);
    $data_res_enbase = json_decode(base64_decode($data_res_base['d']), true);
    $res_bkav = json_decode($data_res_enbase['Object'], true);

    if ($res_bkav[0]['Status'] == 1) {
        $arr_res = array("errorCode" => "INVOICE_ISSUED_DATE_INVALID",
            "description" => $data_res_enbase['Object']
        );
    } else {
        $http = explode("/",$DuongDan);
        $arr_res['errorCode'] = "";
        $arr_res['description'] = "";
        $arr_res['fileToBytes'] = $res_bkav['PDF'];
        $arr_res['fileName'] = 'HDDT';
    }

    $_SESSION["NOIDUNGBANHOADONDT"] = $arr_res;
    echo  json_encode($arr_res);
}else if ($loaihd == 20) {
    $data_res_base = json_decode($res, true);
    $data_res_enbase = json_decode(base64_decode($data_res_base['d']), true);
    $res_bkav = json_decode($data_res_enbase['Object'], true);
    if ($res_bkav[0]['Status'] == 1) {
        $arr_res = array("errorCode" => "INVOICE_ISSUED_DATE_INVALID",
            "description" => $data_res_enbase['Object']
        );
    } else {
		
		// Đang điều chỉnh
		$parsedUrl = parse_url($url);
		$baseUrl = $parsedUrl['scheme'] . '://' . $parsedUrl['host'];
		$pdfUrl = $baseUrl.$res_bkav[0]['MessLog'];
		$ch = curl_init($pdfUrl);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Bỏ qua kiểm tra SSL nếu cần
		$pdfContent = curl_exec($ch);
		if (curl_errno($ch)) {
			echo 'Lỗi cURL: ' . curl_error($ch);
		} else if ($pdfContent !== false) {
			// Mã hóa nội dung PDF thành Base64
			$base64 = base64_encode($pdfContent);
		} else {
			echo "Không thể tải tệp PDF từ URL.";
		}
		curl_close($ch);
		
		// Đang điều chỉnh

        $http = explode("/",$DuongDan);
        $arr_res['errorCode'] = "";
        $arr_res['description'] = "";
        $arr_res['fileToBytes'] = $base64;
        $arr_res['fileName'] = 'HDDT';		
    }
    $_SESSION["NOIDUNGBANHOADONDT"] = $arr_res;
    echo  json_encode($arr_res);
}

?>