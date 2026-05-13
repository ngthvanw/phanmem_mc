<?php
$class = $_GET['id'];
$sophieu = $_GET['sophieu'];
$loaiphieu = $_GET['loaiphieu'];
?>
<!DOCTYPE HTML>
<html lang="vi">
<head>
    <meta charset="utf-8"/>
    <title>NHẬP HOÁ ĐƠN ĐIỆN TỬ</title>
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

            $.ajax({// Load danh sách mã khách hàng
                url: $dir_module_mavattu + "listall.php",
                async: false,
                dataType: "json",
                success: function (response) {

                    $array = (response);
                    for (var i = 0; i < $array.length; i++) {
                        $listmakhachhang += '<option value=' + $array[i].mavt + '>' + bodauTiengViet($array[i].tenvt) + '</option>';
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
            $("#grid_editing_mavt").keydown(function (event) {//--------------Các phím tắt
                var $grid_pb = $("#grid_editing_mavt").closest('.pq-grid');//---- Lưới----------------
                if (event.keyCode == Keys.F7 || event.keyCode == Keys.F8) {
                    var rowSelect = getRowSelect();//------ Lấy đối tượng được chọn

                    if (rowSelect == false) {
                        alert_f("Chú Ý", "fa fa-warning", "red", "Bạn cần chọn dữ liệu trước khi thực hiện !");
                    }
                }
                var rowEditting = $("#grid_editing_mavt").pqGrid("getRowsByClass", {cls: 'pq-row-edit'});//---Lấy đối tượng đang sửa
                if ($('div').hasClass('jconfirm') == false) {
                    if (event.keyCode == Keys.ESCAPE && $('div').hasClass('jconfirm') == false && rowEditting.length < 1) {
                        change_data_quit_mavattu();
                    }
                } else {
                    return false;
                }
            }); // end phím tắt

            function change_data_quit_mavattu() { // Cảnh báo thoát khi thay đổi dữ liệu////////////////////////////////////////////////////
                var $grid_pb = $("#grid_editing_mavt").closest('.pq-grid');//---- Lưới----------------
                var isEditing = rows = $grid_pb.pqGrid("getRowsByClass", {cls: 'pq-row-edit'});
                $isEdit = false;
                if (isEditing.length > 0) {
                    $isEdit = true;
                }
                {
                    $TTHoaDon1 = $("#TTHoaDon1").val();
                    $.confirm({
                        title: 'Thông báo',
                        content: 'Bạn có muốn sao chép danh sách này không? .<br/>Nhấn<strong style="color:blue;"> chức năng tương ứng</strong> để đồng ý sao chép.',
                        icon: 'fa fa-warning',
                        type: 'red',
                        buttons: {
                            <?php if($loaiphieu==""){ ?>
                            "Nhập phiếu Nhập/Xuất kho": {
                                keys: ['Y'], action: function () {
                                    $.confirm({
                                        title: 'Thông báo',
                                        type: 'green',
                                        autoClose: 'Thoát|1000',
                                        method: 'POST',
                                        content: 'url:' + $dir_module_chitiet_vattu + 'chepdulieu_sangphieunhapxuat.php?sophieu=<?php echo $sophieu; ?>&TTHoaDon=' + encodeURIComponent($TTHoaDon1),
                                        contentLoaded: function () {
                                        },
                                        buttons: {
                                            "Thoát": {
                                                keys: ['Y'], btnClass: 'btn-green', action: function () {
                                                    $mauso = document.getElementById("mauso").value;

                                                    if ($mauso != "") {
                                                        window.opener.document.getElementById("ngayghiso").value = document.getElementById("ngayghiso").value;
                                                        window.opener.document.getElementById("ngayhoadon").value = document.getElementById("ngayhoadon").value;
                                                        window.opener.document.getElementById("ngaykhaithue").value = document.getElementById("ngayghiso").value;
                                                        window.opener.document.getElementById("loaict").value = document.getElementById("mauso").value;
                                                        window.opener.document.getElementById("mauso").value = document.getElementById("mauso").value;
                                                        window.opener.document.getElementById("kyhieu").value = document.getElementById("kyhieu").value;
                                                        window.opener.document.getElementById("sohoadon").value = document.getElementById("sohoadon").value;
                                                    }
                                                    $masothue = document.getElementById("masothue").value;

                                                    if ($masothue != "") {
                                                        window.opener.document.getElementById("makhachhang").value = document.getElementById("masothue").value;
                                                        window.opener.document.getElementById("masothue").value = document.getElementById("masothue").value;
                                                        window.opener.document.getElementById("tenkhachhang").value = document.getElementById("tenkhachhang").value;
                                                        window.opener.document.getElementById("diachi").value = document.getElementById("diachi").value;
                                                    }

													window.opener.CallParent();
                                                    window.close();
                                                }
                                            }
                                        }
                                    });
                                }
                            },
                            /*"Nhập tồn kho đầu kỳ": {
                                keys: ['Y'], action: function () {
                                    $.confirm({
                                        title: 'Thông báo',
                                        type: 'green',
                                        autoClose: 'Thoát|1000',
                                        method: 'POST',
                                        content: 'url:' + $dir_module_chitiet_vattu + 'chepdulieu_sangtonkho.php?sophieu=<?php echo $sophieu; ?>',
                                        contentLoaded: function () {
                                        },
                                        buttons: {
                                            "Thoát": {
                                                keys: ['Y'], btnClass: 'btn-green', action: function () {
                                                    //window.opener.CallParent();
                                                    window.close();
                                                }
                                            }
                                        }
                                    });
                                }
                            },*/
                            <?php } ?>
                            <?php if($loaiphieu=="TC"){ ?>
                            "Nhập phiếu Thu/Chi/Khác": {
                                keys: ['Y'], action: function () {
                                    $.confirm({
                                        title: 'Thông báo',
                                        type: 'green',
                                        autoClose: 'Thoát|1000',
                                        method: 'POST',
                                        content: 'url:' + $dir_module_chitiet_vattu + 'chepdulieu_sangphieuthu_chi_khac.php?sophieu=<?php echo $sophieu; ?>&TTHoaDon=' + encodeURIComponent($TTHoaDon1),
                                        contentLoaded: function () {
                                        },
                                        buttons: {
                                            "Thoát": {
                                                keys: ['Y'], btnClass: 'btn-green', action: function () {
                                                    $mauso = document.getElementById("mauso").value;

                                                    if ($mauso != "") {
                                                        window.opener.document.getElementById("ngayghiso").value = document.getElementById("ngayghiso").value;
                                                        window.opener.document.getElementById("ngayhoadon").value = document.getElementById("ngayhoadon").value;
                                                        window.opener.document.getElementById("ngaykhaithue").value = document.getElementById("ngayghiso").value;
                                                        window.opener.document.getElementById("loaict").value = document.getElementById("mauso").value;
                                                        window.opener.document.getElementById("mauso").value = document.getElementById("mauso").value;
                                                        window.opener.document.getElementById("kyhieu").value = document.getElementById("kyhieu").value;
                                                        window.opener.document.getElementById("sohoadon").value = document.getElementById("sohoadon").value;
                                                    }
                                                    $masothue = document.getElementById("masothue").value;

                                                    if ($masothue != "") {
                                                        window.opener.document.getElementById("makhachhang").value = document.getElementById("masothue").value;
                                                        window.opener.document.getElementById("masothue").value = document.getElementById("masothue").value;
                                                        window.opener.document.getElementById("tenkhachhang").value = document.getElementById("tenkhachhang").value;
                                                        window.opener.document.getElementById("diachi").value = document.getElementById("diachi").value;

                                                        window.opener.document.getElementById("makhachhang2").value = document.getElementById("masothue").value;
                                                        window.opener.document.getElementById("masothue2").value = document.getElementById("masothue").value;
                                                        window.opener.document.getElementById("tenkhachhang2").value = document.getElementById("tenkhachhang").value;
                                                        window.opener.document.getElementById("diachi2").value = document.getElementById("diachi").value;
                                                        try {
                                                            window.opener.document.getElementById("makhachhang3").value = document.getElementById("masothue").value;
                                                            window.opener.document.getElementById("tenkhachhang3").value = document.getElementById("tenkhachhang").value;
                                                        }catch (e) {

                                                        }
                                                                                                            }
                                                    var data_noidung = $("#grid_editing_mavt").pqGrid( "getData", { dataIndx: ['tenvt', 'thanhtien','tienthue'] } );
                                                    $noidung = "";
                                                    $tongtienhang = 0;
                                                    $tongtienthue = 0;
                                                    $dauphay =", ";
                                                    $data_length = data_noidung.length;
                                                    for (var i = 0; i < $data_length; i++){
                                                        if(i==($data_length-1)){
                                                            $dauphay = "";
                                                        }
                                                        $noidung+=data_noidung[i].tenvt+$dauphay;
                                                        $tongtienhang+=parseFloat(data_noidung[i].thanhtien);
                                                        $tongtienthue+=parseFloat(data_noidung[i].tienthue);
                                                    }
                                                    window.opener.document.getElementById("noidung1").value = $noidung;
                                                    window.opener.document.getElementById("sotien1").value = $tongtienhang;
                                                    window.opener.document.getElementById("sotien2").value = $tongtienthue;
                                                    //console.log($noidung);
                                                    //window.opener.CallParent();
                                                    window.close();
                                                }
                                            }
                                        }
                                    });
                                }
                            },
                            <?php } ?>
                            "Thoát": {
                                keys: ['N'], action: function () {
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


            //----------------------------------------------------Bắt đầu lưới-----------------------------------------
            var matk_select = function (ui) {
                var $cell = ui.$cell,
                    rowData = ui.rowData,
                    dataIndx = ui.dataIndx,
                    cls = ui.cls, width = ui.column.minWidth,
                    dc = $.trim(rowData[dataIndx]);
                $cell.css('padding', '0');

                var $inp = $("<input type='text'  name='" + dataIndx + "' class='" + cls + " pq-cell-editor pg-cel-define' />")
                    .appendTo($cell)
                    .val(dc).keypress(function (e) {
                    });
            }
            var manhomvattu_select = function (ui) {
                var $cell = ui.$cell,
                    rowData = ui.rowData,
                    dataIndx = ui.dataIndx,
                    cls = ui.cls, width = ui.column.minWidth,
                    dc = $.trim(rowData[dataIndx]);
                $cell.css('padding', '0');

                var $inp = $("<input type='text'  name='" + dataIndx + "' class='" + cls + " pq-cell-editor pg-cel-define' readonly />")
                    .appendTo($cell)
                    .val(dc).keypress(function (e) {

                        //if(typeof $(".dialog-manhom_vatu_select").html()=="undefined"){
                        $('.dialog_main_manhomvt').load("form/frm_dm_manhom_select.php?idstyle=grid_editing_mavt");
                        //}
                    });
            }
            var formart_num = function (ui) {
                var $cell = ui.$cell,
                    rowData = ui.rowData,
                    dataIndx = ui.dataIndx,
                    cls = ui.cls, width = ui.column.minWidth,
                    dc = $.trim(rowData[dataIndx]);
                $cell.css('padding', '0');

                var $inp = $("<input type='text'  name='" + dataIndx + "' class='" + cls + " pq-cell-editor pg-cel-define' />")
                    .appendTo($cell)
                    .val(dc).keyup(function () {
                        var value = $(".pq-editor-focus").val();
                        $(".pq-editor-focus").val(FormatNumber(value));

                    });
            }
            var ajaxObj = {
                dataType: "JSON",
                beforeSend: function () {
                    this.pqGrid("showLoading");
                },
                complete: function () {
                    this.pqGrid("hideLoading");
                },
                error: function () {
                    this.pqGrid("rollback");
                }
            };

            //--------------------------Kiểm tra xem lưới có đang sửa không ---------------------------------------
            function isEditing($grid) {
                var rows = $grid.pqGrid("getRowsByClass", {cls: 'pq-row-edit'});
                if (rows.length > 0) {
                    //focus on editor if any
                    $grid.find(".pq-editor-focus").focus();
                    return true;
                }
                return false;
            }

            //-------------------------Thêm mới dữ liệu-------------------------------------------------------
            function addRow(rowIndx, $name='mavt', $grid, $obj_addrow="") {
                //append empty row in the first row.
                $ma = "";
                $.ajax({
                    url: $dir_module_mavattu + "taoma.php",
                    async: false,
                    success: function (response) {
                        $ma = response;
                    }
                });
                if ($obj_addrow != "") {
                    var rowData = $obj_addrow;
                } else {
                    var rowData = {
                        mavt: "",
                        tenvt: "",
                        mavtcha: "",
                        matk: "",
                        quycach: "",
                        dvt: "",
                        dvtp: "",
                        loaivl: "",
                        kl: "",
                        kt: "",
                        giaban: "",
                        giabansi: "",
                        giamua: "",
                        rate: "",
                        mark: "",
                        congvao: "",
                        trura: "",
                        dp: "",
                        min: "",
                        max: "",
                        muc: "",
                        ghichu: ""
                    }; //empty row template
                }
                rowData.mavt = $ma;
                if (typeof rowIndx == 'undefined')
                    rowIndx = 0;
                $grid.pqGrid("addRow", {rowIndx: rowIndx, rowData: rowData});

                $grid.pqGrid("setSelection", {rowIndx: rowIndx, dataIndx: $name});
                $grid.pqGrid("editFirstCellInRow", {rowIndx: (rowIndx)});
            }

            //----------------------------Hàm xóa dữ kiệu------------------------------------------
            function deleteRow(rowData, $grid) {
                var rowData = rowData;
                var ma = rowData.mavt;
                var sott = rowData.sott;
                if ($('div').hasClass('jconfirm') == false) {
                    $.confirm({
                        title: "Chú ý", icon: "fa fa-times-circle", type: "red",
                        content: "Bạn có muốn xóa hàng có mã " + (ma) + "  không ?" + '<br/>Nhấn phím <strong style="color:blue;">[Y]</strong> để đồng ý phím <strong style="color:red;">[N]</strong> để hủy bỏ ',
                        buttons: {
                            "Đồng ý": {
                                keys: ['Y'], action: function () {


                                    $.ajax($.extend({}, ajaxObj, {
                                        context: $grid,
                                        url: $dir_module_mavattu + "del.php",
                                        data: {id: sott, ma: ma},
                                        success: function (result) {
                                            this.pqGrid("commit");
                                            this.pqGrid("refreshDataAndView");
                                        },
                                        error: function () {
                                            this.pqGrid("removeClass", {rowData: rowData, cls: 'pq-row-delete'});
                                            this.pqGrid("rollback");
                                        }
                                    }));
                                }
                            },
                            "Hủy bỏ": {
                                keys: ['N'], action: function () {

                                }
                            }
                        }
                    });
                }
            }

            // Bắt đầu từ đây
            //--------------------------------Khai báo lưới---------------------------------------.
            var objmavt = {
                hwrap: false,
                resizable: true,
                rowBorders: true,
                height: 350,
                width: $width - 30,
                virtualX: true,
                freezeCols: 4,
                numberCell: {show: true},
                filterModel: {on: true, mode: "AND", header: true},
                trackModel: {on: true}, //to turn on the track changes.
                scrollModel: {
                    //autoFit: true
                },
                historyModel: {
                    checkEditableAdd: true
                },
                editModel: {
                    allowInvalid: false,
                    saveKey: $.ui.keyCode.ENTER
                },
                editor: {
                    select: true
                },
                //pageModel: { type: "local", rPP: 50 },
                title: "",
                change: function (evt, ui) {// Khi dữ liệu thay đổi

                    if (ui.source == 'commit' || ui.source == 'rollback') {
                        return;
                    }
                    var $grid = $(this),
                        grid = $grid.pqGrid('getInstance').grid;
                    var rowList = ui.rowList,
                        recIndx = grid.option('dataModel').recIndx;
                    //console.log(recIndx);

                    var obj = rowList[0],
                        rowIndx = obj.rowIndx,
                        newRow = obj.newRow,
                        type = obj.type,
                        rowData = obj.rowData;
                    $mavt = rowData.mavt;
                    mavtdoi = rowData.mavt;
                    var $datamavt = 0;
                    $.ajax({
                        url: $dir_module_chitiet_vattu + "getmavt.php", // Bao gồm cả add và edit
                        type: "get", // chọn phương thức gửi là get
                        async: false,
                        data: { // Danh sách các thuộc tính sẽ gửi đi
                            mavt: mavtdoi,
                        },
                        success: function (result) {
                            $datamavt = $.parseJSON(result);
                        }
                    });
                    if (mavtdoi == "") {
                        return false;
                    }
                    if ($datamavt == "0") {
                        alert("Mã vật tư không tồn tại trong hệ thống ! Vui Lòng nhập lại mã khác !");
                        $grid.pqGrid("rollback");
                        return false;
                    } else {
                        var res = confirm("Hệ thống sẽ thay đổi mã vật tư thành Mã: " + mavtdoi + " . \n Bạn có muốn tiếp tục thay đổi không ?");
                        if (!res) {
                            $grid.pqGrid("rollback");
                            return false;
                        }
                    }
                    rowData.tenvt = $datamavt.tenvt;
                    rowData.dvt = $datamavt.dvt;

                    var url = "";
                    if (type == 'update') {
                        var valid = grid.isValid({rowData: rowData, allowInvalid: true}).valid;
                        if (valid) {
                            if (rowData[recIndx] == null) {
                                url = $dir_module_mavattu + "edit_chitiet_nhaphoadon.php";
                            }
                            else {
                                url = $dir_module_mavattu + "edit_chitiet_nhaphoadon.php";
                            }
                        }
                    }
                    if (valid) {
                        $.ajax({
                            url: url,
                            data: rowData,
                            dataType: "json",
                            type: "GET",
                            async: true,
                            success: function (res) {
                                if (rowData[recIndx] == null) {
                                    rowData.sott = res.recId;
                                }
                                $grid.pqGrid("refreshRow", {rowIndx: rowIndx});
                                //$(".ui-state-highlight").focus();

                                var colM = $("#grid_editing_mavt").pqGrid("option", "colModel");
                                //colM[2].editable = false;
                                $("#grid_editing_mavt").pqGrid("option", "colModel", colM);
                            },
                        });
                    }
                },
                colModel: [//-------------------------------------------Khai báo các cột trong lưới-----------------------
                    {
                        title: "Lưu",
                        dataType: "integer",
                        dataIndx: "sott",
                        editable: false,
                        width: 0,
                        hidden: false,
                        align: "center",
                        render: function (ui) {
                            var $val = ui.rowData.sott;
                            if ($val == 0 || $val == "" || typeof $val == 'undefined') {
                                return "<img src='../icon/uncheck.png' width='20px'/>";
                            } else {
                                return "<img src='../icon/check.png' width='20px' />";
                            }
                        },
                    },
                    {
                        title: "STT",
                        dataType: "string",
                        dataIndx: "STT",
                        editable: false,
                        width: 10,
                        hidden: true,
                        align: "center"
                    },
                    {
                        title: "Mã VT",
                        dataType: "string",
                        dataIndx: "mavt",
                        minWidth: 110,
                        sortable: true,
                        editable: true,
                        editor: {
                            type: "textbox",
                            cls: "listmakhachhang",
                            attr: "list='listmakhachhang' id='idlistmakhachhang'"
                        },
                        filter: {
                            type: 'textbox',
                            condition: 'begin',
                            listeners: ['keyup']
                        }
                    },
                    {
                        title: "Tên VT", minWidth: 200, dataType: "string", dataIndx: "tenvt", editable: true,
                        validations: [
                            {type: 'minLen', value: 1, msg: "Tên vật tư hàng hóa không được trống !"}
                        ],
                        filter: {
                            type: 'textbox',
                            condition: 'begin',
                            listeners: ['keyup']
                        }
                    },
                    {
                        title: "Mã nhóm",
                        minWidth: 120,
                        dataType: "string",
                        align: "left",
                        dataIndx: "manhom",
                        editable: true,
                        validations: [
                            {type: 'minLen', value: 1, msg: "Mã nhóm không được trống !"},
                        ],
                        editor: {
                            type: "select", options: function (ui) {
                                //remote validation
                                var parsedJson = "";
                                $.ajax({
                                    url: $dir_module_manhom + "cb_manhomvt.php",
                                    data: {},
                                    async: false,
                                    success: function (response) {
                                        parsedJson = $.parseJSON(response);
                                    }
                                });
                                return parsedJson;
                            }
                        },
                        filter: {
                            type: "select",
                            condition: 'equal',
                            prepend: {'': '--Tất cả--'},
                            valueIndx: "manhom",
                            labelIndx: "tennhom",
                            listeners: ['change']
                        },
                        render: function (ui) {

                            var tennhom = ui.rowData.tennhom;
                            return tennhom;
                        }
                    },
                    {
                        title: "Loại NVL",
                        minWidth: 100,
                        dataType: "string",
                        align: "left",
                        dataIndx: "loaivl",
                        editable: true,
                        editable: false,
                        editor: {
                            type: "select", options: function (ui) {
                                var parsedJson = [{"": "Nguyên vật liệu"}, {"NC": "Nhân công"}, {"SXC": "CP Sản xuất chung"}, {"CM": "Ca máy"}];
                                return parsedJson;
                            }
                        },
                        render: function (ui) {
                            {
                                var parsedJson = [{"id": "", "name": "Nguyên vật liệu"}, {
                                    "id": "NC",
                                    "name": "Nhân công"
                                }, {"id": "SXC", "name": "CP Sản xuất chung"}, {"id": "CM", "name": "Ca máy"}];
                                var value = ui.rowData.loaivl;
                                $tenloai = "";
                                $.each(parsedJson, function (key, item) {
                                    if (item.id == value) {
                                        $tenloai = item.name;
                                    }
                                });


                                return $tenloai;
                            }
                        }
                    },
                    {
                        title: "Tên nhóm",
                        minWidth: 80,
                        dataType: "string",
                        align: "left",
                        hidden: true,
                        dataIndx: "tennhom"
                    },
                    {
                        title: "Mã TK",
                        minWidth: 60,
                        dataType: "string",
                        dataIndx: "matk",
                        align: "center",
                        editable: true
                    },
                    {
                        title: "TK doanh thu",
                        minWidth: 100,
                        dataType: "string",
                        dataIndx: "tkdoanhthu",
                        align: "center",
                        editable: true
                    },
                    {
                        title: "Đơn vị tính",
                        minWidth: 80,
                        dataType: "string",
                        align: "center",
                        dataIndx: "dvt",
                        editable: true
                    },
                    {
                        title: "Số lượng",
                        minWidth: 120,
                        dataType: "string",
                        align: "right",
                        dataIndx: "soluong",
                        hidden: false,
                        editable: false,
                        render: function (ui) {
                            var kl = ui.rowData.soluong;
                            return $.number(kl);
                        }
                    },
                    {
                        title: "Đơn giá",
                        minWidth: 120,
                        dataType: "string",
                        align: "right",
                        dataIndx: "dongia",
                        hidden: false,
                        editable: false,
                        render: function (ui) {
                            var kt = ui.rowData.dongia;
                            return $.number(kt);
                        }
                    },
                    {
                        title: "Thành tiền chưa CK",
                        minWidth: 150,
                        dataType: "string",
                        align: "right",
                        dataIndx: "thanhtienchuack",
                        hidden: false,
                        editable: false,
                        render: function (ui) {
                            var giaban = ui.rowData.thanhtienchuack;
                            return $.number(giaban);
                        },
                    },
                    {
                        title: "Thành tiền",
                        minWidth: 150,
                        dataType: "string",
                        align: "right",
                        dataIndx: "thanhtien",
                        hidden: false,
                        editable: false,
                        render: function (ui) {
                            var giaban = ui.rowData.thanhtien;
                            return $.number(giaban);
                        },
                    },
                    {
                        title: "Chiết khấu",
                        minWidth: 150,
                        dataType: "string",
                        align: "right",
                        dataIndx: "chietkhau",
                        hidden: false,
                        editable: false,
                        render: function (ui) {
                            var giaban = ui.rowData.chietkhau;
                            return $.number(giaban);
                        },
                    },
                    {
                        title: "Thuế(%)",
                        minWidth: 70,
                        dataType: "string",
                        align: "center",
                        dataIndx: "thuesuat",
                        editable: true,
                        render: function (ui) {
                            var rate = ui.rowData.thuesuat;
                            return rate + "%";
                        }
                    },
                    {
                        title: "Tiền thuế",
                        minWidth: 100,
                        dataType: "string",
                        align: "right",
                        dataIndx: "tienthue",
                        hidden: false,
                        editable: false,
                        render: function (ui) {
                            var giabansi = ui.rowData.tienthue;
                            return $.number(giabansi);
                        }
                    }
                ],//,
                pageModel: {type: "local", rPP: 200, strRpp: "{0}", strDisplay: "{0} đến {1} của {2}"},
                dataModel: {
                    dataType: "JSON",
                    location: "remote",
                    recIndx: "sott",
                    url: $dir_module_mavattu + "list_nhaphoadon.php?sophieu=<?php echo $sophieu; ?>",//-- Load danh sách lên lưới
                    getData: function (dataJSON) {
                        var data = dataJSON.data;
                        return {data: data};
                    }
                }
            };

            var $grid = $("#grid_editing_mavt").pqGrid(objmavt);

            // Kết thúc tại đây
            $grid.one("pqgridload", function (evt, ui) {
                try {
                    var column = $grid.pqGrid("getColumn", {dataIndx: "manhom"});
                    var filter = column.filter;
                    filter.cache = null;
                    filter.options = $grid.pqGrid("getData", {dataIndx: ["tennhom", "manhom"]});// lấy 1 hoặc nhiều dataindex
                } catch (err) {

                }
                $grid.pqGrid("refreshHeader");
            });

            //use refresh & refreshRow events to display jQueryUI buttons and bind events.
            function getRowSelect() { // --------------------Lấy dữ liệu theo dòng trên gird----------------------
                var arr = $("#grid_editing_mavt").pqGrid("selection", {
                    type: 'cell',
                    method: 'getSelection'
                }); //Lấy giá trị đang chọn
                if (arr && arr.length > 0) {
                    return arr;
                } else {
                    return false;
                }
            }

            function isEditCell(rowIndex, dataIndx) { // --------------------Lấy dữ liệu theo dòng trên gird----------------------
                var isEdit = false;
                isEdit = $("#grid_editing_mavt").pqGrid("isDirty"); //Lấy giá trị đang chọn

                return isEdit;
            }

            setTimeout(function () {
                $("#grid_editing_mavt .pq-search-hd-field").focus();
            }, 100);
            //-----------------------------Hết lưới---------------------------------------------------------------------
            $("#tailen").on("click", function () {
                $NhaCungCap = $("#NhaCungCap").val();
                $manhom = $("#nhomhang").val();
                $matkhang = $("#matkhang").val();
                $matkdoanhthu = $("#matkdoanhthu").val();
                if ($("#NhaCungCap").val() == -1) {
                    alert("Vui lòng chọn nhà cung cấp hoá đơn!");
                    $("#NhaCungCap").focus();
                    return false;
                }
                if (window.File && window.FileReader && window.FileList && window.Blob) {
                    // lay dung luong va kieu file tu the input file
                    //var fsize = $('#filedulieu')[0].files[0].size;
                    //var ftype = $('#filedulieu')[0].files[0].type;
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
                if ($("#manhom").val() == -1) {
                    alert("Vui lòng chọn mã nhóm hàng vật tư!");
                    $("#manhom").focus();
                    return false;
                }
                if ($("#matkhang").val() == -1) {
                    alert("Vui lòng chọn mã tài khoản vật tư!");
                    $("#matkhang").focus();
                    return false;
                }
                if ($("#matkdoanhthu").val() == -1) {
                    alert("Vui lòng chọn mã tài khoản doanh thu!");
                    $("#matkdoanhthu").focus();
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
                                    url: $dir_module_chitiet_vattu + "ajaxupload.php",
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
									boxWidth: '100%',
                                    useBootstrap: false,
                                    method: 'POST',
                                    async: false,
                                    contentType: 'multipart/form-data',
                                    data: {'nhacungcap': $NhaCungCap},
                                    content: 'url:' + $dir_module_chitiet_vattu + 'uploadphuchoi.php?nhacungcap=' + $NhaCungCap + '&sophieu=<?php echo $sophieu; ?>&manhom=' + $manhom + '&matkhang=' + $matkhang + '&matkdoanhthu=' + $matkdoanhthu+'&loaiphieu=<?php echo $loaiphieu; ?>',
                                    contentLoaded: function (data) {
                                        //alert(data);
                                        //self.setContentAppend('<div>Tải dữ liệu thành công</div>');
                                    },
                                    buttons: {
                                        "Thoát": {
                                            keys: ['Y'], btnClass: 'btn-green', action: function () {
                                                $TTHoaDon = $("#TTHoaDon").val();
                                                $TTHoaDon_MaHoa = $("#TTHoaDon_MaHoa").val();
                                                $("#TTHoaDon1").val($TTHoaDon_MaHoa);
                                                $TTHoaDon_ARR = $TTHoaDon.split("@!@");
                                                //console.log($TTHoaDon_ARR);
                                                $("#masothue").val($TTHoaDon_ARR[0]);
                                                $("#tenkhachhang").val($TTHoaDon_ARR[1]);
                                                $("#diachi").val($TTHoaDon_ARR[2]);
                                                $("#mauso").val($TTHoaDon_ARR[3]);
                                                $("#kyhieu").val($TTHoaDon_ARR[4]);
                                                $("#sohoadon").val(parseInt($TTHoaDon_ARR[5]));
                                                $("#ngayghiso").val($TTHoaDon_ARR[6]);
                                                $("#ngayhoadon").val($TTHoaDon_ARR[6]);
                                                $("#Form_taifile")[0].reset();
                                                $("#grid_editing_mavt").pqGrid("refreshDataAndView");
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
        <legend><b>Tập tin hoá đơn</b></legend>
        <table border="0" style="width: 100%;margin-bottom: 1px;">
            <tr>
                <td width="150px;">
                    <select style="width: 98%" id="NhaCungCap">
                        <option value="-1">Chọn nhà cung cấp</option>
                        
                        <?php if($loaiphieu==""){ ?>
							<option value="TT78">---1.Thông tư 78</option>
							<option value="Excel">---2.Thêm chi tiết hàng hoá bàng EXCEL</option>
							<option value="Excel_NP_NX">---3.Thêm nhiều phiếu bằng EXCEL</option>
                        <?php }else{
							?>
							<option value="TT78">---1.Thông tư 78</option>
							<option value="Excel_NP_TC">---2.Thêm nhiều phiếu bằng EXCEL</option>
							<?php
						} ?>
                    </select></td>
                <td colspan="2" width="300px;"><input type="file" id="filedulieu" accept=".xls,.xlsx,.xml"></td>
                <?php
                if($loaiphieu=='TC'){
                    ?>
                    <td><a href="../tmp/mau_thu_chi.xlsx"><b>Mẫu bảng kê</b></a></td>
                <?php
                }else{
                    ?>
                    <td><a href="../tmp/maubangke.xlsx"><b>Mẫu bảng kê số 2</b></a></td>
                    <td><a href="../tmp/mau_nhap_xuat.xlsx"><b>Mẫu bảng kê số 3</b></a></td>
                <?php
                }
                ?>
            </tr>
            <tr>
                <td width="150px;">
                    <select style="width: 98%" id="nhomhang">
                        <option value="-1">Chọn nhóm hàng</option>
                    </select>
                </td>
                <td width="150px;">
                    <select style="width: 98%" id="matkhang">
                        <option value="-1">Chọn Mã TK</option>
                        <option value="151">151-Hàng mua đang đi đường</option>
                        <option value="152">152-Nguyên liệu, vật liệu</option>
                        <option value="153">153-Công cụ, dụng cụ</option>
                        <option value="154">154-Chi phí sản xuất, kinh doanh dở dang</option>
                        <option value="155">155-Thành Phẩm</option>
                        <optgroup label="156-Hàng hoá">
                            <option value="1561">1561-Giá mua hàng hoá</option>
                            <option value="1562">1562-Chi phí thu mua hàng hoá</option>
                        </optgroup>
                        <option value="157">157-Hàng gửi đi bán</option>
                    </select>
                </td>
                <td width="150px;">
                    <select style="width: 98%" id="matkdoanhthu">
                        <option value="-1">Chọn Mã TK DT</option>
                        <optgroup label="511-Doanh thu bán hàng và cung cấp dịch vụ">
                            <option value="5111">5111-Doanh thu bán hàng hoá</option>
                            <option value="5112">5112-Doanh thu bán thành phẩm</option>
                            <option value="5113">5113-Doanh thu cung cấp dịch vụ</option>
                            <option value="5118">5118-Doanh thu khác</option>
                        </optgroup>
                    </select>
                </td>
                <td><input type="button" id="tailen" style="color: red;font-weight: bold;border: red 1px solid;"
                           value="Tải dữ liệu"></td>
            </tr>
        </table>
    </fieldset>
</form>
<fieldset style="padding-bottom: 20px;z-index: 100100 !important;background-color: #afd9ee;border: white 1px solid;">
    <legend><b>Thông tin hoá đơn</b></legend>
    <table border="0" style="width: 100%;margin-bottom: 1px;">
        <tr>
            <td width="150px;"><b>Ngày ghi sổ</b></td>
            <td><input type="date" id="ngayghiso"></td>
            <td width="150px;"><b>Ngày hoá đơn</b></td>
            <td><input type="date" id="ngayhoadon"></td>
        </tr>
        <tr>
            <td width="150px;"><b>Mẫu số</b></td>
            <td><input type="text" id="mauso"></td>
            <td width="150px;"><b>Mã số thuế</b></td>
            <td><input type="text" id="masothue"></td>
        </tr>
        <tr>
            <td width="150px;"><b>Ký hiệu</b></td>
            <td><input type="text" id="kyhieu"></td>
            <td width="150px;"><b>Tên khách hàng</b></td>
            <td><input style="width: 100%" type="text" id="tenkhachhang"></td>
        </tr>
        <tr>
            <td width="150px;"><b>Số hoá đơn</b></td>
            <td><input type="text" id="sohoadon"></td>
            <td width="150px;"><b>Địa chỉ</b></td>
            <td><input style="width: 100%" type="text" id="diachi"> <input type="hidden" id="TTHoaDon1" value=""></td>
        </tr>
    </table>
</fieldset>
<fieldset style="padding-bottom: 20px;z-index: 100100 !important;background-color: #afd9ee;border: white 1px solid;">
    <legend><b>CHI TIẾT HOÁ ĐƠN</b></legend>
    <div id="grid_editing_mavt" style="margin:5px auto;border: 0px !important;"></div>
</fieldset>
</body>
</html>