<html>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript">
        function doAjax() {
            var url = "https://e-invoice.com.vn:8443/InvoiceAPI/InvoiceWS/createInvoice/0100109106-997";
            var $data = { "generalInvoiceInfo":{
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
        };

            $.ajax({
                "url" : url,
                "async" : true,
                "beforeSend" : function(obj){
                    //console.log(obj);
                },
                ip: "146.196.65.92",
                crossDomain: true,
                withCredentials: true,
                "contentType" : 'application/json',
                //"crossDomain" : true,  // uncommenting this doesnt help either
                "headers" : {
                    "Authorization": "Basic " + btoa( "0100109106-997:111111a@A")
                },
                "dataType" : 'json',
                "type" : 'POST',
                "data" : ($data),
                "error" : function(err){
                    console.log('new post creation failed');
                    console.log(err);
                },
                "success" : function(resp){
                    console.log('new post created');
                    console.log(resp);
                }
            });
        }
        doAjax();
    </script>
</head>

<body>
<div id="id01"></div>
</body>
</html>