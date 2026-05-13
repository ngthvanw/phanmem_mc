<?php
function callAPI($method, $url, $data){
    $curl = curl_init();
    switch ($method){
        case "POST":

            curl_setopt($curl, CURLOPT_POST, 1);
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
        'Authorization: Basic MDEwMDEwOTEwNi05OTc6MTExMTExYUBB',
        'Content-Type: application/json',
    ));
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

    echo $result = curl_exec($curl);
		$fp = fopen('curl.log', 'a');
    // EXECUTE:
	// cho phép `curl` xuất thông tin về kết nối
curl_setopt($curl, CURLOPT_VERBOSE, true);
// xuất thông tin lỗi ra file log
curl_setopt($curl, CURLOPT_STDERR, $fp);
    if(!$result){die("Connection Failure");}
    curl_close($curl);
	// đóng file log
fclose($fp);
    return $result;
}
    $data = '{ "generalInvoiceInfo":{
    "invoiceType":"01GTKT",
                    "invoiceNo":"AA/16E0000001",
                    "templateCode":"01GTKT0/020",
                    "invoiceIssuedDate":1519440853000,
                    "currencyCode":"VND",
                    "adjustmentType":"1",
                    "paymentStatus":true,
                    "paymentType":"TM",
                    "paymentTypeName":"TM",
                    "cusGetInvoiceRight":true,
                    "buyerIdNo":"123456789",
                    "buyerIdType":"1"
            },
                "buyerInfo":{
        "buyerName":"Lương Thị Huyền",
                        "buyerLegalName":"",
                        "buyerTaxCode":"",
                        "buyerAddressLine":"HN VN",
                        "buyerPhoneNumber":"09880830406",
                        "buyerEmail":"",
                        "buyerIdNo":"123456789",
                        "buyerIdType":"1"
                },
                "sellerInfo":{
        "sellerLegalName":"Supplier perfom test 1",
                        "sellerTaxCode":"0100109106-501",
                        "sellerAddressLine":"test",
                        "sellerPhoneNumber":"0123456789",
                        "sellerEmail":"PerformanceTest1@viettel.com.vn",
                        "sellerBankName":"vtbank",
                        "sellerBankAccount":"23423424"
                },
                "extAttribute":[

    ],
                    "payments":[
                    {
                        "paymentMethodName":"TM"
                    }
                ],
                    "deliveryInfo":{

    },
                "itemInfo":[
                    {
                        "lineNumber":1,
                        "itemCode":"ENGLISH_COURSE",
                        "itemName":"Khóa học tiếng anh",
                        "unitName":"khóa học",
                        "unitPrice":3500000.0,
                        "quantity":10.0,
                        "itemTotalAmountWithoutTax":35000000,
                        "taxPercentage":10.0,
                        "taxAmount":0.0,
                        "discount":0.0,
                        "itemDiscount":150000.0
                    }
                ],
                    "discountItemInfo":[

    ],
                    "summarizeInfo":{
        "sumOfTotalLineAmountWithoutTax":35000000,
                        "totalAmountWithoutTax":35000000,
                        "totalTaxAmount":3500000.0,
                        "totalAmountWithTax":38500000,
                        "totalAmountWithTaxInWords":"Ba mươi tám triệu năm trăm nghìn đồng chẵn",
                        "discountAmount":0.0,
                        "taxPercentage":10.0
                },
                "taxBreakdowns":[
                    {
                        "taxPercentage":10.0,
                        "taxableAmount":35000000,
                        "taxAmount":3500000.0
                    }
                ]
            }';
echo callAPI("POST","https://e-invoice.com.vn:8443/InvoiceAPI/InvoiceWS/createInvoice/0100109106-997",$data);


?>