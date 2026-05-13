<?php
session_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');
?>
<!DOCTYPE HTML>
<html lang="vi">
<head>
    <meta charset="utf-8"/>
    <title>BẢNG TỔNG HỢP DANH SÁCH GIAO NHẬN CHỨNG TỪ</title>
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

    </style>
</head>
<body>
<script>
    $height = getHeight();
    $width = getWidth();
    $(function () {
        var $dir_module_banggiaonhan = "";
        $dir_module_banggiaonhan = "../modules/banggiaonhan/";//--------------------------------------------Thay đổi khi copy
        $dir_module_user = "../modules/user/";//--------------------------------------------Thay đổi khi copy
        function xoadialog_makh() { // ----------------------đóng form
            reset_dialog(".dialog-makhachhang");
            reset_dialog(".dialog_main_makh");
        }

        $("#dialog-makhachhang").dialog({ // ------------------Gọi dialog
            resizable: false,
            height: $height,
            width: $width,
            modal: true

        });
        $("#dialog-makhachhang").keydown(function (event) {//--------------Các phím tắt
            var $grid_pb = $("#grid_editing_thongke_phanmem").closest('.pq-grid');//---- Lưới----------------
            if (event.keyCode == Keys.F7 || event.keyCode == Keys.F8 || event.keyCode == Keys.INSERT) {
                var rowSelect = getRowSelect();//------ Lấy đối tượng được chọn
                if (rowSelect == false) {
                    alert_f("Chú Ý", "fa fa-warning", "red", "Bạn cần chọn dữ liệu trước khi thực hiện !");
                }
            }
            var rowEditting = $("#grid_editing_thongke_phanmem").pqGrid("getRowsByClass", {cls: 'pq-row-edit'});//---Lấy đối tượng đang sửa
            if ($('div').hasClass('jconfirm') == false) {
                if (event.keyCode == Keys.ESCAPE && $('div').hasClass('jconfirm') == false && rowEditting.length < 1) {
                    change_data_quit_makh();
                }
                if (event.keyCode == Keys.F4) {
                    var rowSelect = getRowSelect();//------ Lấy đối tượng được chọn
                    if (rowSelect == false) {
                        var colM = $("#grid_editing_thongke_phanmem").pqGrid("option", "colModel");
                        colM[1].editable = true;
                        $("#grid_editing_thongke_phanmem").pqGrid("option", "colModel", colM);

                        addRow(rowIndx, 'masothue', $grid_pb);
                    } else {
                        var rowIndx = rowSelect[0].rowIndx;
                        var rowData = rowSelect[0].rowData;
                        var _dataRow = {
                            masothue: "",
                            tencongty: "",
                            nguoigiao: "",
                            hotennguoigiao: "",
                            ngaygiao: "",
                            nguoinhan: "",
                            hotennguoinhan: "",
                            noidung: "",
                            nguoigiaoky: "",
                            ngaynguoigiaoky: "",
                            nguoinhanky: "",
                            ngaynguoinhanky: "",
                            ghichu: ""
                        };
                        var colM = $("#grid_editing_thongke_phanmem").pqGrid("option", "colModel");
                        colM[1].editable = true;
                        $("#grid_editing_thongke_phanmem").pqGrid("option", "colModel", colM);

                        addRow(rowIndx + 1, 'masothue', $grid_pb, _dataRow);
                    }
                }
            } else {
                return false;
            }
            if (event.keyCode == Keys.F7) { // copy
                if (rowSelect != false) {

                    var rowIndx = rowSelect[0].rowIndx;
                    var rowData = rowSelect[0].rowData;
                    //---------------Khai báo các cell khi dùng lệnh copy-----------------------------------------
                    //--------------------------------------------Thay đổi khi copy---------------------------------
                    var colM = $("#grid_editing_thongke_phanmem").pqGrid("option", "colModel");
                    colM[1].editable = true;
                    $("#grid_editing_thongke_phanmem").pqGrid("option", "colModel", colM);

                    var _dataRow = {
                        masothue: rowData.masothue,
                        tencongty: rowData.tencongty,
                        nguoigiao: "",
                        hotennguoigiao: "",
                        ngaygiao: "",
                        nguoinhan: "",
                        hotennguoinhan: "",
                        noidung: "",
                        nguoigiaoky: "",
                        ngaynguoigiaoky: "",
                        nguoinhanky: "",
                        ngaynguoinhanky: "",
                        ghichu: ""
                    };
                    addRow(rowIndx + 1, 'masothue', $grid_pb, _dataRow);
                }
            }
            if (event.keyCode == Keys.F8) { // Xóa
                if (rowSelect != false) {
                    if ("<?php echo trim($_SESSION['Level']); ?>" == "1") {
                        var rowData = rowSelect[0].rowData;
                        deleteRow(rowData, $grid_pb);
                    } else {
                        alert("THÔNG BÁO \n\n BẠN KHÔNG CÓ QUYỀN XOÁ DÒNG NÀY .");
                    }
                }
            }
        }); // end phím tắt
        function change_data_quit_makh() { // Cảnh báo thoát khi thay đổi dữ liệu////////////////////////////////////////////////////{
            $.confirm({
                title: 'Thông báo',
                content: 'Dữ liệu chưa được chọn bạn có muốn thoát cửa sổ này ? .<br/>Nhấn phím <strong style="color:blue;">[Y]</strong> để đồng ý phím <strong style="color:red;">[N]</strong> để hủy bỏ ',
                icon: 'fa fa-warning',
                type: 'red',
                buttons: {
                    "Đồng ý": {
                        keys: ['Y'], action: function () {
                            window.close();
                        }
                    },
                    "Hủy bỏ": {
                        keys: ['N'], action: function () {

                        }
                    }
                }
            });
        }


        //----------------------------------------------------Bắt đầu lưới-----------------------------------------
        var httk_select = function (ui) {
            var $cell = ui.$cell,
                rowData = ui.rowData,
                dataIndx = ui.dataIndx,
                cls = ui.cls, width = ui.column.minWidth,
                dc = $.trim(rowData[dataIndx]);
            $cell.css('padding', '0');

            var $inp = $("<input type='text'  name='" + dataIndx + "' class='" + cls + " pq-cell-editor pg-cel-define' readonly />")
                .appendTo($cell)
                .val(dc).keypress(function () {
                    $('.dialog_main_httk').load("form/frm_dm_httk_select.php?idstyle=grid_editing_thongke_phanmem");
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
        function addRow(rowIndx, $name='', $grid, $obj_addrow="") {
            //append empty row in the first row.
            if ($obj_addrow != "") {
                var dataRow = $obj_addrow;
            } else {
                var dataRow = {
                    masothue: "",
                    tencongty: "",
                    nguoigiao: "",
                    hotennguoigiao: "",
                    ngaygiao: "<?php echo date("Y-m-d H:i:s"); ?>",
                    nguoinhan: "",
                    hotennguoinhan: "",
                    noidung: "",
                    nguoigiaoky: "",
                    ngaynguoigiaoky: "",
                    nguoinhanky: "",
                    ngaynguoinhanky: "",
                    ghichu: ""
                };
            }

            var rowData = dataRow; //empty row template
            if (typeof rowIndx == 'undefined')
                rowIndx = 0;
            $grid.pqGrid("addRow", {rowIndx: rowIndx, rowData: rowData});

            $grid.pqGrid("setSelection", {rowIndx: rowIndx, dataIndx: $name});
            $grid.pqGrid("editFirstCellInRow", {rowIndx: (rowIndx)});
        }

        //----------------------------Hàm xóa dữ kiệu------------------------------------------
        function deleteRow(rowData, $grid) {
            var rowData = rowData;
            //var ma = rowData.soct;
            var sott = rowData.sott;
            if ($('div').hasClass('jconfirm') == false) {
                $.confirm({
                    title: "Chú ý", icon: "fa fa-times-circle", type: "red",
                    content: "Bạn có muốn xóa hàng có số TT " + (sott) + "  không ?" + '<br/>Nhấn phím <strong style="color:blue;">[Y]</strong> để đồng ý phím <strong style="color:red;">[N]</strong> để hủy bỏ ',
                    buttons: {
                        "Đồng ý": {
                            keys: ['Y'], action: function () {


                                $.ajax($.extend({}, ajaxObj, {
                                    context: $grid,
                                    url: $dir_module_banggiaonhan + "del.php",
                                    data: {id: sott},
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

        //---------------------------Cập nhật row-----------------------------------------

        //--------------------------------Khai báo lưới---------------------------------------.
        var obj = {
            hwrap: true,
            //resizable: true,
            rowBorders: true,
            virtualX: false, virtualY: false,
            height: $height - 58,
            width: $width - 20,
            //virtualX: true,
            numberCell: {show: true},
            filterModel: {on: true, mode: "AND", header: true},
            trackModel: {on: true}, //to turn on the track changes.
            historyModel: {
                checkEditableAdd: true
            },
            editModel: {
                allowInvalid: false,
                saveKey: $.ui.keyCode.ENTER
            },
            freezeCols: 3,
            editor: {
                select: true
            },
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

                var url = "";
                if (type == 'update') {
                    var valid = grid.isValid({rowData: rowData, allowInvalid: true}).valid;
                    if (valid) {
                        if (rowData[recIndx] == null) {
                            if ((rowData.ngaygiao == "0000-00-00 00:00:00" || rowData.ngaygiao == "" || typeof rowData.ngaygiao == "undefined")) {
                                rowData.ngaygiao = "<?php echo date("Y-m-d H:i:s"); ?>";
                            }
                            if (rowData.nguoigiaoky == "1" && (rowData.ngaynguoigiaoky == "0000-00-00 00:00:00" || rowData.ngaynguoigiaoky == "" || typeof rowData.ngaynguoigiaoky == "undefined")) {
                                rowData.ngaynguoigiaoky = "<?php echo date("Y-m-d H:i:s"); ?>";
                            }
                            if (rowData.nguoinhanky == "1" && (rowData.ngaynguoinhanky == "0000-00-00 00:00:00" || rowData.ngaynguoinhanky == "" || typeof rowData.ngaynguoinhanky == "undefined")) {
                                rowData.ngaynguoinhanky = "<?php echo date("Y-m-d H:i:s"); ?>";
                            }
                            url = $dir_module_banggiaonhan + "add.php";
                        }
                        else {
                            if (rowData.nguoigiaoky == "1" && (rowData.ngaynguoigiaoky == "0000-00-00 00:00:00" || rowData.ngaynguoigiaoky == "" || typeof rowData.ngaynguoigiaoky == "undefined")) {
                                rowData.ngaynguoigiaoky = "<?php echo date("Y-m-d H:i:s"); ?>";
                            }
                            if (rowData.nguoinhanky == "1" && (rowData.ngaynguoinhanky == "0000-00-00 00:00:00" || rowData.ngaynguoinhanky == "" || typeof rowData.ngaynguoinhanky == "undefined")) {
                                rowData.ngaynguoinhanky = "<?php echo date("Y-m-d H:i:s"); ?>";
                            }
                            url = $dir_module_banggiaonhan + "edit.php";
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
                                rowData.bosung = res.recId;
                            }
                            $grid.pqGrid("refreshRow", {rowIndx: rowIndx});
                        },
                    });
                }
            },
            colModel: [//-------------------------------------------Khai báo các cột trong lưới-----------------------
                {
                    title: "Số phiếu",
                    dataType: "integer",
                    dataIndx: "sott",
                    width: 10,
                    align: "center",
                    editable: false,
                    filter: {type: 'textbox', condition: 'contain', listeners: ['keyup']}
                },
                {
                    title: "Mã số thuế ",
                    minWidth: 110,
                    dataType: "string",
                    align: "left",
                    dataIndx: "masothue",
                    editable: function (ui) {
                        var rowData = ui.rowData;
                        try {
                            $nguoinhanky = rowData.nguoinhanky;
                        }catch (e){
                            $nguoinhanky = 0;
                        }

                        try {
                            $nguoigiaoky = rowData.nguoigiaoky;
                        }catch (e){
                            $nguoigiaoky = 0;
                        }

                        if ($nguoinhanky == 1 && $nguoigiaoky == 1 && ("<?php echo trim($_SESSION['Level'] !="1" ); ?>")) {
                            return false;
                        } else {
                            return true;
                        }
                    },
                    validations: [
                        {type: 'minLen', value: 10, msg: "Mã số thuế từ 10 đến 14 số !"},
                        {type: 'maxLen', value: 14, msg: "Mã số thuế từ 10 đến 14 số !"}
                    ],
                    filter: {type: 'textbox', condition: 'contain', listeners: ['keyup']}
                },
                {
                    title: "Tên công ty",
                    minWidth: 200,
                    dataType: "string",
                    align: "left",
                    dataIndx: "tencongty",
                    editable: function (ui) {
                        var rowData = ui.rowData;
                        try {
                            $nguoinhanky = rowData.nguoinhanky;
                        }catch (e){
                            $nguoinhanky = 0;
                        }

                        try {
                            $nguoigiaoky = rowData.nguoigiaoky;
                        }catch (e){
                            $nguoigiaoky = 0;
                        }
                        if ($nguoinhanky == 1 && $nguoigiaoky == 1 && ("<?php echo trim($_SESSION['Level'] !="1" ); ?>")) {
                            return false;
                        } else {
                            return true;
                        }
                    },
                    validations: [
                        {type: 'minLen', value: 1, msg: "Tên công ty không được trống !"}
                    ],
                    filter: {type: 'textbox', condition: 'contain', listeners: ['keyup']}
                },
                {
                    title: "Người giao",
                    minWidth: 70,
                    dataType: "string",
                    dataIndx: "nguoigiao",
                    editable: function (ui) {
                        var rowData = ui.rowData;
                        try {
                            $nguoinhanky = rowData.nguoinhanky;
                        }catch (e){
                            $nguoinhanky = 0;
                        }

                        try {
                            $nguoigiaoky = rowData.nguoigiaoky;
                        }catch (e){
                            $nguoigiaoky = 0;
                        }
                        if ($nguoinhanky == 1 && $nguoigiaoky == 1) {
                            return false;
                        } else {
                            return true;
                        }
                    },
                    editor: {
                        type: "select",
                        options: [{"<?php echo $_SESSION['User']; ?>": "<?php echo $_SESSION['User']; ?>"}]
                    },
                    validations: [
                        {type: 'minLen', value: 1, msg: "Tên công ty không được trống !"}
                    ],
                    filter: {type: 'textbox', condition: 'contain', listeners: ['keyup']}
                },
                {
                    title: "Họ tên người giao",
                    minWidth: 150,
                    dataType: "string",
                    dataIndx: "hotennguoigiao",
                    editable: function (ui) {
                        var rowData = ui.rowData;
                        try {
                            $nguoinhanky = rowData.nguoinhanky;
                        }catch (e){
                            $nguoinhanky = 0;
                        }

                        try {
                            $nguoigiaoky = rowData.nguoigiaoky;
                        }catch (e){
                            $nguoigiaoky = 0;
                        }
                        if ($nguoinhanky == 1 && $nguoigiaoky == 1) {
                            return false;
                        } else {
                            return true;
                        }
                    },
                    validations: [
                        {type: 'minLen', value: 1, msg: "Tên công ty không được trống !"}
                    ]
                },
                {
                    title: "Ngày giao",
                    minWidth: 100,
                    dataType: "string",
                    align: "left",
                    dataIndx: "ngaygiao",
                    editable: false,
                    filter: {type: 'textbox', condition: "contain", listeners: ['keyup']},

                },
                {
                    title: "Người nhận", minWidth: 70, dataType: "string", dataIndx: "nguoinhan",editable: function (ui) {
                    var rowData = ui.rowData;
                    try {
                        $nguoinhanky = rowData.nguoinhanky;
                    }catch (e){
                        $nguoinhanky = 0;
                    }

                    try {
                        $nguoigiaoky = rowData.nguoigiaoky;
                    }catch (e){
                        $nguoigiaoky = 0;
                    }
                    if ($nguoinhanky == 1 && $nguoigiaoky == 1) {
                        return false;
                    } else {
                        return true;
                    }
                },
                    editor: {
                        type: "select", options: function (ui) {
                            //remote validation
                            var parsedJson = "";
                            $.ajax({// Load danh sách mã khách hàng
                                url: $dir_module_user + "cb_user.php",
                                async: false,
                                success: function (response) {
                                    parsedJson = $.parseJSON(response);
                                }
                            });
                            return parsedJson;
                        }
                    },
                    validations: [
                        {type: 'minLen', value: 1, msg: "Tên công ty không được trống !"}
                    ],
                    filter: {type: 'textbox', condition: 'contain', listeners: ['keyup']}
                },
                {
                    title: "Họ tên người nhận",
                    minWidth: 150,
                    dataType: "string",
                    dataIndx: "hotennguoinhan",
                    editable: function (ui) {
                        var rowData = ui.rowData;
                        try {
                            $nguoinhanky = rowData.nguoinhanky;
                        }catch (e){
                            $nguoinhanky = 0;
                        }

                        try {
                            $nguoigiaoky = rowData.nguoigiaoky;
                        }catch (e){
                            $nguoigiaoky = 0;
                        }
                        if ($nguoinhanky == 1 && $nguoigiaoky == 1) {
                            return false;
                        } else {
                            return true;
                        }
                    },
                    validations: [
                        {type: 'minLen', value: 1, msg: "Tên công ty không được trống !"}
                    ]
                },
                {
                    title: "Nội dung giao nhận", minWidth: 300, dataType: "string", align: "left", dataIndx: "noidung",
                    editable: function (ui) {
                        var rowData = ui.rowData;
                        try {
                            $nguoinhanky = rowData.nguoinhanky;
                        }catch (e){
                            $nguoinhanky = 0;
                        }

                        try {
                            $nguoigiaoky = rowData.nguoigiaoky;
                        }catch (e){
                            $nguoigiaoky = 0;
                        }
                        if ($nguoinhanky == 1 && $nguoigiaoky == 1 && ("<?php echo trim($_SESSION['Level'] !="1" ); ?>")) {
                            return false;
                        } else {
                            return true;
                        }
                    },
                    validations: [
                        {type: 'minLen', value: 1, msg: "Tên công ty không được trống !"}
                    ],
                    editor: {type: "textarea", attr: "rows=5"}
                },
                {
                    title: "Người giao ký",
                    minWidth: 80,
                    dataType: "integer",
                    align: "center",
                    dataIndx: "nguoigiaoky",
                    editable: function (ui) {
                        var rowData = ui.rowData;
                        try {
                            $nguoinhanky = rowData.nguoinhanky;
                        }catch (e){
                            $nguoinhanky = 0;
                        }

                        try {
                            $nguoigiaoky = rowData.nguoigiaoky;
                        }catch (e){
                            $nguoigiaoky = 0;
                        }
                        try {
                            $nguoigiao = rowData.nguoigiao;
                        }catch (e){
                            $nguoigiao = "0";
                        }
                        if (($nguoinhanky == 1 && $nguoigiaoky == 1)|| ($nguoigiaoky == 1) || ($nguoigiao != "<?php echo trim($_SESSION['User']); ?>") ) {
                            return false;
                        } else {
                            return true;
                        }
                    },
                    editor: {type: "select", options: [{"0": "CHƯA KÝ NHẬN"}, {"1": "KÝ NHẬN"}]},
                    render: function (ui) {
                        var value = ui.rowData.nguoigiaoky;
                        if (value == '1') {
                            return "<img src='../icon/check.png' alt='Đã ký' width='30px'/>";
                        } else {
                            return "<img src='../icon/uncheck.png' alt='Chưa ký' width='30px' />";
                        }
                    }

                },
                {
                    title: "Ngày ký",
                    minWidth: 100,
                    dataType: "string",
                    align: "left",
                    dataIndx: "ngaynguoigiaoky",
                    editable: false

                },
                {
                    title: "Người nhận ký",
                    minWidth: 80,
                    dataType: "integer",
                    align: "center",
                    dataIndx: "nguoinhanky",
                    editable: function (ui) {
                        var rowData = ui.rowData;
                        try {
                            $nguoinhanky = rowData.nguoinhanky;
                        }catch (e){
                            $nguoinhanky = 0;
                        }

                        try {
                            $nguoigiaoky = rowData.nguoigiaoky;
                        }catch (e){
                            $nguoigiaoky = 0;
                        }
                        try {
                            $nguoinhan = rowData.nguoinhan;
                        }catch (e){
                            $nguoinhan = "0";
                        }
                        if (($nguoinhanky == 1 && $nguoigiaoky == 1) || ($nguoinhanky == 1) || ($nguoinhan != "<?php echo trim($_SESSION['User']); ?>")) {
                            return false;
                        } else {
                            return true;
                        }
                    },
                    editor: {type: "select", options: [{"0": "CHƯA KÝ NHẬN"}, {"1": "KÝ NHẬN"}]},
                    render: function (ui) {
                        var value = ui.rowData.nguoinhanky;
                        if (value == '1') {
                            return "<img src='../icon/check.png' alt='Đã ký' width='30px'/>";
                        } else {
                            return "<img src='../icon/uncheck.png' alt='Chưa ký' width='30px' />";
                        }
                    }

                },
                {
                    title: "Ngày ký",
                    minWidth: 100,
                    dataType: "string",
                    align: "left",
                    dataIndx: "ngaynguoinhanky",
                    editable: false

                },
                {
                    title: "Ghi chú", minWidth: 150, dataType: "string", align: "left", dataIndx: "ghichu",editable: function (ui) {
                    var rowData = ui.rowData;
                    try {
                        $nguoinhanky = rowData.nguoinhanky;
                    }catch (e){
                        $nguoinhanky = 0;
                    }

                    try {
                        $nguoigiaoky = rowData.nguoigiaoky;
                    }catch (e){
                        $nguoigiaoky = 0;
                    }
                    if ($nguoinhanky == 1 && $nguoigiaoky == 1 && ("<?php echo trim($_SESSION['Level'] !="1" ); ?>")) {
                        return false;
                    } else {
                        return true;
                    }
                },
                    editor: {type: "textarea", attr: "rows=5"}
                },
                {
                    title: "Số phiếu bổ sung",
                    minWidth: 100,
                    dataType: "integer",
                    align: "center",
                    dataIndx: "bosung",
                    editable: function (ui) {
                        var rowData = ui.rowData;
                        try {
                            $nguoinhanky = rowData.nguoinhanky;
                        }catch (e){
                            $nguoinhanky = 0;
                        }

                        try {
                            $nguoigiaoky = rowData.nguoigiaoky;
                        }catch (e){
                            $nguoigiaoky = 0;
                        }
                        if ($nguoinhanky == 1 && $nguoigiaoky == 1 && ("<?php echo trim($_SESSION['Level'] !="1" ); ?>")) {
                            return false;
                        } else {
                            return true;
                        }
                    },
                    filter: {type: 'textbox', condition: 'contain', listeners: ['keyup']}

                },
            ],//-----------------------------------------Kết thúc các cột--------------------------------------
            pageModel: {type: "local", rPP: 200, strRpp: "{0}", strDisplay: "{0} đến {1} của {2}"},
            dataModel: {
                dataType: "JSON",
                location: "remote",
                recIndx: "sott",
                url: $dir_module_banggiaonhan + "list.php",//-- Load danh sách lên lưới
                getData: function (dataJSON) {
                    var data = dataJSON.data;
                    return {curPage: dataJSON.curPage, totalRecords: dataJSON.totalRecords, data: data};
                }
            }
        };
        var $grid = $("#grid_editing_thongke_phanmem").pqGrid(obj);

        //use refresh & refreshRow events to display jQueryUI buttons and bind events.
        function getRowSelect() { // --------------------Lấy dữ liệu theo dòng trên gird----------------------
            var arr = $("#grid_editing_thongke_phanmem").pqGrid("selection", {
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
            isEdit = $("#grid_editing_thongke_phanmem").pqGrid("isDirty"); //Lấy giá trị đang chọn

            return isEdit;
        }

        $grid.one("pqgridload", function (evt, ui) {// Lấy DS List box
            $("#grid_editing_thongke_phanmem .pq-search-hd-field[name='tencongty']").focus();
        });
        //-----------------------------Hết lưới---------------------------------------------------------------------

    });
</script>
<div id="dialog-makhachhang"
     title="BẢNG TỔNG HỢP DANH SÁCH GIAO NHẬN CHỨNG TỪ(F4: THÊM MỚI, F7: SAO CHÉP, F8: XOÁ)"><!-- dialog -->
    <div id="grid_editing_thongke_phanmem" style="margin:5px auto;border: 0px !important;"></div>
</div>
</body>
</html>