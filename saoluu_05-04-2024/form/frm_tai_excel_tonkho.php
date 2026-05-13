<?php
$class = $_GET['id'];
?>
<!DOCTYPE HTML>
<html lang="vi">
<head>
    <meta charset="utf-8"/>
    <title>NHẬP TỒN KHO EXCEL</title>
    <link rel="shortcut icon" type="image/x-icon" href="icon/favicon.ico"/>
    <meta http-equiv="content-type" content="text/html"/>
    <meta name="author" content="ketoanchienthuat.com"/>


    <script type="text/javascript" src="../js/jquery.js"></script>

    <script type="text/javascript" src="../js/jquery.easing.1.3.js"></script>
    <script type="text/javascript" src="../js/script.js"></script>
    <script type="text/javascript" src="../js/jquery.min.js"></script>
    <script type="text/javascript" src="../number/jquery.number.js"></script>


    <!-- dialog jquery ui-->
    <link rel="stylesheet" href="../css/jquery-ui.min.css"/>
    <script src="../js/jquery-ui.js"></script>

    <!-- menu right -->
    <link href="../src/jquery.contextMenu.css" rel="stylesheet" type="text/css"/>
    <script src="../src/jquery.contextMenu.js" type="text/javascript"></script>
    <script src="../js/function_window.js"></script>

    <!--PQ Grid files-->
    <link rel="stylesheet" href="../grid/pqgrid.min.css"/>
    <script src="../grid/pqgrid.min.js"></script>
    <!--PQ Grid Office theme-->
    <link rel="stylesheet" href="../grid/themes/office/pqgrid.css"/>

    <link rel="stylesheet" href="../comfirm/libs/bundled.css"/>
    <link rel="stylesheet" href="../comfirm/demo.css"/>
    <!-- jquery-confirm files -->
    <link rel="stylesheet" type="text/css" href="../css/jquery-confirm.css"/>
    <script type="text/javascript" src="../js/jquery-confirm.js"></script>
    <style>
        div.pq-grid * {
            font-size: 12px;
            font-family: Verdana;
            line-height: 17px;
        }

        img.ui-datepicker-trigger {
            margin-top: 2px;
        }

        .ui-autocomplete {
            max-height: 200px;
            overflow-y: auto;
            /* prevent horizontal scrollbar */
            overflow-x: hidden;
        }

        /*div.pq-grid :focus{
            outline:none;
        }*/
        .pq-grid .pq-editor-focus {
            outline: none;
            border: 1px solid #bbb;
            border-radius: 6px;
            background-image: linear-gradient(#e6e6e6, #fefefe);

            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#e6e6e6', endColorstr='#fefefe');
            background: -webkit-gradient(linear, left top, left bottom, from(#e6e6e6), to(#fefefe));
            background: -moz-linear-gradient(top, #e6e6e6, #fefefe); /* for firefox 3.6+ */
        }

        input.pq-date-editor {
            padding: 2px;
            vertical-align: bottom;
            width: 78px;
            z-index: 4;
            position: relative;
        }

        input.pg-cel-define {
            padding: 2px;
            vertical-align: bottom;
            width: 100%;
            z-index: 4;
            position: relative;
        }

        input.pq-ac-editor {
            padding: 2px;
            z-index: 4;
            position: relative;
        }

        .pq-row-edit {
            border: 2px dashed red;
        }

        span.saving {
            display: none;
            font-size: large;
            background: yellow;
            color: Red;
            font-weight: normal;
            margin-left: 20px;
        }

        .ui-widget-overlay {
            z-index: 0 !important;
            width: 0px !important;;
        }

        fieldset {
            padding: 1px;
            padding-top: 0px;
            border: 1px solid #09F;
            margin-top: 0px;
        }

    </style>
    <script>
        $height = getHeight() - 500;
        $width = getWidth();
        $(function () {
            var $dir_module_mavattu = "";
            $dir_module_mavattu = "../modules/mavattu/";//--------------------------------------------Thay đổi khi copy
            var $dir_module_manhom = "../modules/manhomvattu/";//
            var $dir_module_chitiet_vattu = "../modules/ps_chitiet_mavt/";//--------------------------------------------Thay đổi khi copy

            var $listmakhachhang = "";// Danh sách khách hàng

            $(window).on('resize', function () {
                window.location = location.href;
            });
            //-----------------------------Hết lưới---------------------------------------------------------------------
            $("#tailen").on("click", function () {
                if ($("#NhaCungCap").val() == -1) {
                    alert("Vui lòng chọn nhà cung cấp hoá đơn!");
                    $("#NhaCungCap").focus();
                    return false;
                }
                if (window.File && window.FileReader && window.FileList && window.Blob) {
                    var fname = $('#filedulieu').val();
                    if (fname == "")  //thuc hien dieu gi do neu dung luong file vuot qua 1MB
                    {
                        alert("Tập tin không tòn tại. Vui lòng chọn tập tin.");
                        return false;
                    }
                } else {
                    alert("Trình duyệt không hỗ trợ. Vui lòng chọn trình duyệt khác!");
                    return false;
                }

                var file_data = $("#filedulieu").prop("files")[0];
                var form_data = new FormData();
                form_data.append("file", file_data);
                $.confirm({// Cảnh báo khi phục hồi dữ liệu
                    title: 'Chú ý',
                    content: 'Bạn có muốn tải lên dữ liệu từ tập tin này không ?',
                    icon: 'fa fa-warning',
                    type: 'red',
                    buttons: {
                        "Đồng ý": {
                            keys: ['Y'], action: function () {
                                var FileJonson = "";
                                $.ajax({// Lấy nội dung của file cần phục hồi
                                    url: $dir_module_chitiet_vattu + "ajaxupload_tonkho.php",
                                    type: "POST",
                                    data: form_data,
                                    async: false,
                                    enctype: 'multipart/form-data',
                                    processData: false,  // tell jQuery not to process the data
                                    contentType: false,  // tell jQuery not to set contentType
                                    cache: false,
                                    success: function (data) {
                                        //alert(data);
                                    }
                                });
                                $.confirm({
                                    title: 'Thông báo',
                                    type: 'green',
                                    method: 'POST',
                                    async: false,
                                    contentType: 'multipart/form-data',
                                    data: {'nhacungcap': 'Excel'},
                                    content: 'url:' + $dir_module_chitiet_vattu + 'uploadphuchoi_tonkho.php',
                                    contentLoaded: function (data) {
                                        //alert(data);
                                        //self.setContentAppend('<div>Tải dữ liệu thành công</div>');
                                    },
                                    buttons: {
                                        "Thoát": {
                                            keys: ['Y'], btnClass: 'btn-green', action: function () {
                                                $("#Form_taifile")[0].reset();
                                                window.opener.CallParent();
                                                window.close();
                                            }
                                        }
                                    }
                                });
                            }
                        },
                        "Hủy bỏ": {
                            keys: ['N'], action: function () {

                            }
                        }
                    }
                });
            });
        });
    </script>
</head>
<body>
<form method="post" id="Form_taifile" enctype="multipart/form-data">
    <fieldset
            style="padding-bottom: 20px;z-index: 100100 !important;background-color: #afd9ee;border: white 1px solid;">
        <legend><b>Tập tin</b></legend>
        <table border="0" style="width: 100%;margin-bottom: 1px;">
            <tr>
                <td width="150px;">
                    </td>
                <td colspan="2" width="300px;"><input type="file" id="filedulieu" accept=".xls,.xlsx,.xml"></td>
                <td><input type="button" id="tailen" style="color: red;font-weight: bold;border: red 1px solid;"
                           value="Tải dữ liệu"></td>
                <td><a href="../tmp/maubangke_tonkho.xlsx"><b>Mẫu bảng kê</b></a></td>
            </tr>

        </table>
    </fieldset>
</form>
</body>
</html>