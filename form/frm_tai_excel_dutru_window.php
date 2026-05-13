<?php
$class=$_GET['id'];
$sophieu=$_GET['sophieu'];
?>
<!DOCTYPE HTML>
<html lang="vi">
<head>
    <meta charset="utf-8"/>
        <title>NHẬP HOÁ BẢNG DỰ TRÙ SẢN XUẤT</title>
    <link rel="shortcut icon" type="image/x-icon" href="icon/favicon.ico"/>
    <meta http-equiv="content-type" content="text/html" />
    <meta name="author" content="ketoanchienthuat.com" />



    <script type="text/javascript" src="../js/jquery.js"></script>

    <script type="text/javascript" src="../js/jquery.easing.1.3.js"></script>
    <script type="text/javascript" src="../js/script.js"></script>
    <script type="text/javascript" src="../js/jquery.min.js"></script>
    <script type="text/javascript" src="../number/jquery.number.js"></script>


    <!-- dialog jquery ui-->
    <link rel="stylesheet" href="../css/jquery-ui.min.css"/>
    <script src="../js/jquery-ui.js"></script>

    <!-- menu right -->
    <link href="../src/jquery.contextMenu.css" rel="stylesheet" type="text/css" />
    <script src="../src/jquery.contextMenu.js" type="text/javascript"></script>
    <script src="../js/function_window.js"></script>

    <!--PQ Grid files-->
    <link rel="stylesheet" href="../grid/pqgrid.min.css" />
    <script src="../grid/pqgrid.min.js"></script>
    <!--PQ Grid Office theme-->
    <link rel="stylesheet" href="../grid/themes/office/pqgrid.css" />

    <link rel="stylesheet" href="../comfirm/libs/bundled.css"/>
    <link rel="stylesheet" href="../comfirm/demo.css"/>
    <!-- jquery-confirm files -->
    <link rel="stylesheet" type="text/css"href="../css/jquery-confirm.css"/>
    <script type="text/javascript" src="../js/jquery-confirm.js"></script>
    <style>
        div.pq-grid *
        {
            font-size:12px;
            font-family:Verdana;
            line-height:17px;
        }
        img.ui-datepicker-trigger
        {
            margin-top:2px;
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
        .pq-grid .pq-editor-focus
        {
            outline:none;
            border:1px solid #bbb;
            border-radius:6px;
            background-image: linear-gradient(#e6e6e6, #fefefe);

            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#e6e6e6', endColorstr='#fefefe');
            background: -webkit-gradient(linear, left top, left bottom, from(#e6e6e6), to(#fefefe));
            background: -moz-linear-gradient(top,  #e6e6e6,  #fefefe); /* for firefox 3.6+ */
        }
        input.pq-date-editor
        {
            padding:2px;vertical-align:bottom;width:78px;z-index:4;position:relative;
        }
        input.pg-cel-define{
            padding:2px;vertical-align:bottom;width:100%;z-index:4;position:relative;
        }
        input.pq-ac-editor
        {
            padding:2px;z-index:4;position:relative;
        }
        .pq-row-edit{
            border:2px dashed red;
        }
        span.saving
        {
            display:none;
            font-size:large;
            background:yellow;
            color:Red;
            font-weight:normal;
            margin-left:20px;
        }
        .ui-widget-overlay{
            z-index: 0 !important;
            width: 0px !important; ;
        }

        fieldset {
            padding: 1px;
            padding-top: 0px;
            border: 1px solid #09F;
            margin-top: 0px;
        }

    </style>
    <script>
        $height = getHeight()-500;
        $width = getWidth();
        $(function() {
            var $dir_module_mavattu="";
            $dir_module_mavattu = "../modules/mavattu/";//--------------------------------------------Thay đổi khi copy
            var $dir_module_manhom = "../modules/manhomvattu/";//
            var $dir_module_chitiet_vattu = "../modules/ps_chitiet_mavt/";//--------------------------------------------Thay đổi khi copy

            var $listmakhachhang = "";// Danh sách khách hàng

            $(window).on('resize', function(){
                window.location = location.href;
            });

            $.ajax({// Load danh sách mã khách hàng
                url: $dir_module_mavattu + "listall.php",
                async: false,
                dataType: "json",
                success: function (response) {

                    $array = (response);
                    for (var i = 0; i < $array.length; i++) {
                        $listmakhachhang += '<option value=' + $array[i].mavt + '>'+ bodauTiengViet($array[i].tenvt) + '</option>';
                    }
                }
            });


            $.ajax({
                url: $dir_module_manhom + "listall_cb.php",
                data: {},
                async: false,
                success: function (response) {
                    $("#nhomhang").append(response);
                }
            });

            $("#listmakhachhang").html($listmakhachhang);

            function xoadialog_mavattu() { // ----------------------đóng form
                reset_dialog(".dialog-mavattu");
                reset_dialog(".dialog_main_mavt");
            }
            $("#dialog-mavattu").dialog({ // ------------------Gọi dialog
                resizable: false,
                height: $height,
                width: $width,
                modal: true

            });
            $("#grid_editing_mavt").keydown(function(event) {//--------------Các phím tắt
                var $grid_pb = $("#grid_editing_mavt").closest('.pq-grid');//---- Lưới----------------
                if (event.keyCode == Keys.F7 || event.keyCode == Keys.F8) {
                    var rowSelect = getRowSelect();//------ Lấy đối tượng được chọn

                    if(rowSelect==false){
                        alert_f("Chú Ý","fa fa-warning","red","Bạn cần chọn dữ liệu trước khi thực hiện !");
                    }
                }
                var rowEditting = $( "#grid_editing_mavt" ).pqGrid( "getRowsByClass", { cls : 'pq-row-edit' } );//---Lấy đối tượng đang sửa
                if ( $('div').hasClass('jconfirm')==false) {
                    if (event.keyCode == Keys.ESCAPE && $('div').hasClass('jconfirm')==false&&rowEditting.length<1) {
                        change_data_quit_mavattu();
                    }
                }else{
                    return false;
                }
            }); // end phím tắt

            function change_data_quit_mavattu() { // Cảnh báo thoát khi thay đổi dữ liệu////////////////////////////////////////////////////
                var $grid_pb = $("#grid_editing_mavt").closest('.pq-grid');//---- Lưới----------------
                var isEditing = rows = $grid_pb.pqGrid("getRowsByClass", { cls: 'pq-row-edit' });
                $isEdit = false;
                if (isEditing.length > 0) {
                    $isEdit = true;
                }
                {
                    $TTHoaDon1 = $("#TTHoaDon1").val();
                    $.confirm({
                        title: 'Thông báo',
                        content: 'Bạn có muốn sao chép danh sách này sang phiếu nhập/xuất kho không? .<br/>Nhấn phím <strong style="color:blue;">[Y]</strong> để đồng ý sao chép sang phiếu nhập/xuất phím <strong style="color:red;">[N]</strong> để thoát không chép dữ liệu ',
                        icon: 'fa fa-warning',
                        type: 'red',
                        buttons: {
                            "Đồng ý": { keys: ['Y'],action: function () {
                                    $.confirm({
                                        title: 'Thông báo',
                                        type: 'green',
                                        autoClose: 'Thoát|1000',
                                        method: 'POST',
                                        content: 'url:' + $dir_module_chitiet_vattu + 'chepdulieu_sangphieunhapxuat.php?sophieu=<?php echo $sophieu; ?>&TTHoaDon='+$TTHoaDon1,
                                        contentLoaded: function () {
                                        },
                                        buttons: {
                                            "Thoát": {
                                                keys: ['Y'], btnClass: 'btn-green', action: function () {
                                                    //if (window.opener != null && !window.opener.closed) {
                                                    $mauso = document.getElementById("mauso").value;

                                                    if($mauso!=""){
                                                        window.opener.document.getElementById("ngayghiso").value = document.getElementById("ngayghiso").value;
                                                        window.opener.document.getElementById("ngayhoadon").value = document.getElementById("ngayhoadon").value;
                                                        window.opener.document.getElementById("ngaykhaithue").value = document.getElementById("ngayghiso").value;
                                                        window.opener.document.getElementById("loaict").value = document.getElementById("mauso").value;
                                                        window.opener.document.getElementById("mauso").value = document.getElementById("mauso").value;
                                                        window.opener.document.getElementById("kyhieu").value = document.getElementById("kyhieu").value;
                                                        window.opener.document.getElementById("sohoadon").value = document.getElementById("sohoadon").value;
                                                    }
                                                    $masothue = document.getElementById("masothue").value;

                                                    if($masothue!=""){
                                                        window.opener.document.getElementById("makhachhang").value = document.getElementById("masothue").value;
                                                        window.opener.document.getElementById("masothue").value = document.getElementById("masothue").value;
                                                        window.opener.document.getElementById("tenkhachhang").value = document.getElementById("tenkhachhang").value;
                                                        window.opener.document.getElementById("diachi").value = document.getElementById("diachi").value;
                                                    }

                                                    //}

                                                    window.opener.CallParent();
                                                    window.close();
                                                }
                                            }
                                        }
                                    });
                            }},
                            "Thoát":{ keys: ['N'],action: function () {
                                    $.confirm({
                                        title: 'Thông báo',
                                        type: 'green',
                                        autoClose: 'Thoát|1000',
                                        method: 'POST',
                                        content: 'url:' + $dir_module_chitiet_vattu + 'xoachitiet_phieunhapxuat.php?sophieu=<?php echo $sophieu; ?>',
                                        contentLoaded: function () {
                                        },
                                        buttons: {
                                            "Thoát": {
                                                keys: ['Y'], btnClass: 'btn-green', action: function () {
                                                    window.close();
                                                }
                                            }
                                        }
                                    });
                            }
                            }
                        }
                    });
                }
            }

           $("#tailen").on("click", function() {
                $NhaCungCap = $("#NhaCungCap").val();
                if($("#NhaCungCap").val()==-1){
                  alert("Vui lòng chọn nhà cung cấp hoá đơn!");
                    $("#NhaCungCap").focus();
                  return false;
                }
                if (window.File && window.FileReader && window.FileList && window.Blob)
                {
                    var fname = $('#filedulieu').val();
                    if(fname=="")  //thuc hien dieu gi do neu dung luong file vuot qua 1MB
                    {
                        alert("Tập tin không tồn tại. Vui lòng chọn tập tin.");
                        return false;
                    }
                }else{
                    alert("Trình duyệt không hỗ trợ. Vui lòng chọn trình duyệt khác!");
                    return false;
                }
                var file_data = $("#filedulieu").prop("files")[0];
                var form_data = new FormData();
                form_data.append("file", file_data);
                $.confirm({// Cảnh báo khi phục hồi dữ liệu
                    title: 'Chú ý',
                    content: 'Dữ liệu cũ sẽ bị xoá tất cả để thêm dữ liệu mới vào! Bạn có muốn tải lên dữ liệu từ tập tin này không ?',
                    icon: 'fa fa-warning',
                    type: 'red',
                    buttons: {
                        "Đồng ý": {
                            keys: ['Y'], action: function () {
                                var FileJonson = "";
                                $.ajax({// Lấy nội dung của file cần phục hồi
                                    url: $dir_module_chitiet_vattu + "ajaxupload_dutru.php",
                                    type: "POST",
                                    data: form_data,
                                    async: false,
                                    enctype: 'multipart/form-data',
                                    processData: false,  // tell jQuery not to process the data
                                    contentType: false ,  // tell jQuery not to set contentType
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
                                    data:{'nhacungcap':$NhaCungCap},
                                    content: 'url:' + $dir_module_chitiet_vattu + 'uploadphuchoi_dutru.php',
                                    contentLoaded: function (data) {
                                    },
                                    buttons: {
                                        "Thoát": {
                                            keys: ['Y'], btnClass: 'btn-green', action: function () {
                                                $("#grid_editing_thongkethanhpham").pqGrid("refreshDataAndView");
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
<form  method="post" id="Form_taifile" enctype="multipart/form-data">
<fieldset style="padding-bottom: 20px;z-index: 100100 !important;background-color: #afd9ee;border: white 1px solid;">
    <legend><b>Tập tin</b></legend>
    <table border="0" style="width: 100%;margin-bottom: 1px;">
        <tr>
            <td width="150px;" >
                <select style="width: 98%" id="NhaCungCap">
                    <option value="Excel">---EXCEL</option>
                </select></td>
            <td colspan="2" width="300px;"><input type="file" id="filedulieu" accept=".xls,.xlsx,.xml"></td>
            <td><a href="../tmp/maudutrusx.xlsx"><b>Mẫu bảng kê</b></a></td>
        </tr>
        <tr>
            <td width="150px;"></td>
            <td width="150px;"></td>
            <td width="150px;"></td>
            <td><input type="button" id="tailen" style="color: red;font-weight: bold;border: red 1px solid;" value="Tải dữ liệu"></td>
        </tr>
    </table>
</fieldset>
</form>
</body>
</html>