<?php
session_start();
$mst = $_GET['mst'];
$tencongty = $_GET['tencongty'];
$tendatabase = $_GET['tendatabase'];
$hiden_nhanvien = "";
$hiden_truongphong = "";
$khoadong_nv = "";
$khoadong_truongphong = "";
$Level = $_SESSION['Level'];
if ($_SESSION['Level'] == 3) {// Là nhân viên
    $hiden_nhanvien = "hidden:true,";
    $khoadong_nv = "editable: false,";
    $khoadong_truongphong = "editable: false,";
}
if ($_SESSION['Level'] == 2) {
    $hiden_truongphong = "hidden:true,";
    $khoadong_truongphong = "editable: false,";
}
?>
<!DOCTYPE HTML>
<html lang="vi">
<head>
    <meta charset="utf-8"/>
    <title>DUYỆT BẢNG CÂN ĐỐI TÀI KHOẢN - <?php echo $mst . " - " . $tencongty; ?></title>
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
        tr td.blue
        {
            background:blue;
        }
        tr td.red
        {
            background:red;
        }
        tr td.orange
        {
            background:orange;
        }
        tr.green td { background: lightgreen;}

    </style>
</head>
<body>
<script>
    $height = getHeight();
    $width = getWidth();
    $(function () {
        var $dir_module_user = "";
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
            } else {
                return false;
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
        function addRow(rowIndx, $name='mavt', $grid, $obj_addrow="") {
            //append empty row in the first row.
            var rowData = $obj_addrow; //empty row template
            if (typeof rowIndx == 'undefined')
                rowIndx = 0;
            $grid.pqGrid("addRow", {rowIndx: rowIndx, rowData: rowData});

            $grid.pqGrid("setSelection", {rowIndx: rowIndx, dataIndx: $name});
            $grid.pqGrid("editFirstCellInRow", {rowIndx: (rowIndx)});
        }

        //----------------------------Hàm xóa dữ kiệu------------------------------------------
        function deleteRow(rowData, $grid) {
            var rowData = rowData;
            var ma = rowData.soct;
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
                                    url: $dir_module_user + "del.php",
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

        //---------------------------Cập nhật row-----------------------------------------

        //--------------------------------Khai báo lưới---------------------------------------.
        var obj = {
            hwrap: true,
            wrap: true,
            //resizable: true,
            rowBorders: true,
            virtualX: true, virtualY: true,
            height: $height - 58,
            width: $width - 20,
            //virtualX: true,
            numberCell: {show: true},
            filterModel: {on: true, mode: "AND", header: true},
            trackModel: {on: true}, //to turn on the track changes.
            scrollModel: {
                autoFit: false
            },
            freezeCols: 4,
            historyModel: {
                checkEditableAdd: true
            },
            toolbar: {
                items: [
                    {
                        type: 'button', icon: ' ui-icon-contact', label: 'QUAY LẠI DANH SÁCH TRÌNH DUYỆT', listeners: [
                            {
                                "click": function (evt, ui) {
                                    window.location = "frm_danhsach_conty_trinhduyet.php";
                                }
                            }
                        ]
                    },
                    {
                        type: 'button', icon: '  ui-icon-refresh', label: 'DUYỆT HỒ SƠ   ', listeners: [
                            {
                                "click": function (evt, ui) {
                                    $.ajax({// Kiểm tra xem STT có tồn tại hay không
                                        url: $dir_module_user + "suatrinhky.php",
                                        data: {'trangthai': 'DD','tendatabase':'<?php echo $tendatabase ; ?>'},
                                        async: false,
                                        success: function (response) {
                                            if (response == 0) {
                                                alert("BẠN KHÔNG CÓ QUYỀN THỰC HIỆN CHỨC NĂNG NÀY .");
                                            } else {
                                                alert("HỒ SƠ ĐƯỢC DUYỆT THÀNH CÔNG .");
                                                window.location = "frm_danhsach_conty_trinhduyet.php";
                                            }
                                        }
                                    });
                                }
                            }
                        ]
                    },
                    {
                        type: 'button', icon: ' ui-icon-arrowrefresh-1-e', label: 'TRẢ HỒ SƠ', listeners: [
                            {
                                "click": function (evt, ui) {
                                    $.ajax({// Kiểm tra xem STT có tồn tại hay không
                                        url: $dir_module_user + "suatrinhky.php",
                                        data: {'trangthai': 'TL','tendatabase':'<?php echo $tendatabase ; ?>'},
                                        async: false,
                                        success: function (response) {
                                            if (response == 0) {
                                                alert("BẠN KHÔNG CÓ QUYỀN THỰC HIỆN CHỨC NĂNG NÀY .");
                                            } else {
                                                alert("HỒ SƠ ĐƯỢC TRẢ THÀNH CÔNG .");
                                                window.location = "frm_danhsach_conty_trinhduyet.php";
                                            }
                                        }
                                    });
                                }
                            }
                        ]
                    },
                    {
                        type: 'button', icon: ' ui-icon-arrowrefresh-1-e', label: 'TẠM NỘP', listeners: [
                            {
                                "click": function (evt, ui) {
                                    $.ajax({// Kiểm tra xem STT có tồn tại hay không
                                        url: $dir_module_user + "suatrinhky.php",
                                        data: {'trangthai': 'TN','tendatabase':'<?php echo $tendatabase ; ?>'},
                                        async: false,
                                        success: function (response) {
                                            if (response == 0) {
                                                alert("BẠN KHÔNG CÓ QUYỀN THỰC HIỆN CHỨC NĂNG NÀY .");
                                            } else {
                                                alert("HỒ SƠ TẠM NỘP THÀNH CÔNG .");
                                                window.location = "frm_danhsach_conty_trinhduyet.php";
                                            }
                                        }
                                    });
                                }
                            }
                        ]
                    }
                ]
            },
            editModel: {
                allowInvalid: false,
                saveKey: $.ui.keyCode.ENTER
            },
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
                            url = $dir_module_user + "edit.php";
                        }
                        else {
                            url = $dir_module_user + "edit.php";
                        }
                    }
                }
                if (valid) {
                    rowData._nockduyet = rowData.nock;
                    rowData._cockduyet = rowData.cock;
					$MaSoTK = rowData.matk;
					$_MaTK = $MaSoTK.substr(0, 1);
					if($_MaTK>=5){
					rowData._nockduyet = rowData.nops;
                    rowData._cockduyet = rowData.cops;
					}
                    rowData.tendatabase = '<?php echo $tendatabase; ?>';
                    rowData.nguoiduyet = '<?php echo $_SESSION['User']; ?>';
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
                        }
                    });
                    $grid.pqGrid("refreshRow", {rowIndx: rowIndx});
                }
            },
            colModel: [//-------------------------------------------Khai báo các cột trong lưới-----------------------
                {title: "Số TT", dataType: "integer", dataIndx: "sott", width: 0, hidden: true},
                {
                    title: "Mã TK ", minWidth: 60, dataType: "string", align: "left", dataIndx: "matk", editable: false,
                    filter: {type: 'textbox', condition: 'contain', listeners: ['keyup']}
                },
                {
                    title: "Tên tài khoản",
                    minWidth: 200,
                    dataType: "string",
                    align: "left",
                    dataIndx: "tentk",
                    editable: false,
                },
                {
                    title: "Mã TK cha", minWidth: 60, dataType: "string", dataIndx: "matkcha", editable: false,
                    filter: {type: 'textbox', condition: 'contain', listeners: ['keyup']}
                },
                {
                    title: "Nợ ĐK",
                    minWidth: 100,
                    dataType: "string",
                    align: "right",
                    dataIndx: "nodk",
                    editable: false,
                    hidden: false,
                    render: function (ui) {
                        var val = ui.rowData.nodk;
                        return $.number(val);
                    }

                },
                {
                    title: "Có ĐK",
                    minWidth: 100,
                    dataType: "string",
                    align: "right",
                    dataIndx: "codk",
                    editable: false,
                    hidden: false,
                    render: function (ui) {
                        var val = ui.rowData.codk;
                        return $.number(val);
                    }

                },
                {
                    title: "Nợ PS",
                    minWidth: 100,
                    dataType: "string",
                    align: "right",
                    dataIndx: "nops",
                    editable: false,
                    hidden: false,
                    render: function (ui) {
                        var val = ui.rowData.nops;
                        return $.number(val);
                    }

                },
                {
                    title: "Có PS",
                    minWidth: 100,
                    dataType: "string",
                    align: "right",
                    dataIndx: "false",
                    editable: false,
                    hidden: false,
                    render: function (ui) {
                        var val = ui.rowData.cops;
                        return $.number(val);
                    }

                },
                {
                    title: "Nợ CK",
                    minWidth: 100,
                    dataType: "string",
                    align: "right",
                    dataIndx: "nock",
                    editable: false,
                    render: function (ui) {
                        var val = ui.rowData.nock;
                        return $.number(val);
                    }

                },
                {
                    title: "Có CK",
                    minWidth: 100,
                    dataType: "string",
                    align: "right",
                    dataIndx: "cock",
                    editable: false,
                    render: function (ui) {
                        var val = ui.rowData.cock;
                        return $.number(val);
                    }

                },
                {
                    title: "Kế toán",
                    minWidth: 50,
                    dataType: "integer",
                    align: "center",
                    dataIndx: "nhanvienduyet",
                    editor: {
                        type: "select", options: function (ui) {
                            //remote validation
                            <?php
                            if ($_SESSION['Level'] == 2 || $_SESSION['Level'] == 1) {
                            ?>
                            var parsedJson = [{0: "CHƯA DUYỆT"}, {1: "ĐÃ DUYỆT"},{2: "LÀM LẠI"}];
                            <?php }else{ ?>
                            var parsedJson = [{0: "CHƯA DUYỆT"},{2: "LÀM LẠI"}];
                            <?php } ?>
                            return parsedJson;
                        }
                    },
                    render: function (ui) {
                        var value = ui.rowData.nhanvienduyet;
                        if (value == '1') {
                            return "<img src='../icon/check.png' alt='Đang chờ duyệt' width='20px'/>";
                        } else if (value == '2') {
                            return "<img src='../icon/reload.png' alt='Làm lại' width='20px' />";
                        }else {
                            return "<img src='../icon/uncheck.png' alt='Đã duyệt' width='20px' />";
                        }
                    }

                },
                {
                    title: "Trưởng nhóm duyệt",
                    minWidth: 50,
                    dataType: "integer",
                    align: "center",
                    dataIndx: "truongnhomduyet",

                    <?php echo $khoadong_nv; ?>
                    editor: {
                        type: "select", options: function (ui) {
                            //remote validation
                            var parsedJson = [{0: "CHƯA DUYỆT"}, {1: "ĐÃ DUYỆT"},{2: "LÀM LẠI"}];
                            return parsedJson;
                        }
                    },
                    render: function (ui) {
                        var value = ui.rowData.truongnhomduyet;
                        if (value == '1') {
                            return "<img src='../icon/check.png' alt='Đang chờ duyệt' width='20px'/>";
                        } else if (value == '2') {
                            return "<img src='../icon/reload.png' alt='Làm lại' width='20px' />";
                        }else {
                            return "<img src='../icon/uncheck.png' alt='Đã duyệt' width='20px' />";
                        }
                    }

                },
                {
                    title: "Giám đốc duyệt",
                    minWidth: 50,
                    dataType: "integer",
                    align: "center",
                    dataIndx: "giamdocduyet",
                    <?php echo $khoadong_nv . $khoadong_truongphong; ?>
                    editor: {
                        type: "select", options: function (ui) {
                            //remote validation
                            var parsedJson = [{0: "CHƯA DUYỆT"}, {1: "ĐÃ DUYỆT"},{2: "LÀM LẠI"}];
                            return parsedJson;
                        }
                    },
                    render: function (ui) {
                        var value = ui.rowData.giamdocduyet;
                        if (value == '1') {
                            return "<img src='../icon/check.png' alt='Đang chờ duyệt' width='20px'/>";
                        } else if (value == '2') {
                            return "<img src='../icon/reload.png' alt='Làm lại' width='20px' />";
                        }else {
                            return "<img src='../icon/uncheck.png' alt='Đã duyệt' width='20px' />";
                        }
                    }

                },
                {
                    title: "Rủi ro",
                    minWidth: 50,
                    dataType: "string",
                    align: "center",
                    dataIndx: "ruiro",
                    <?php echo $khoadong_nv . $khoadong_truongphong; ?>
                    editor: {
                        type: "select", options: function (ui) {
                            //remote validation
                            var parsedJson = [{0: "KHÔNG ĐÁNH GIÁ"},{1: "CAO"}, {2: "TRUNG BÌNH"},{3: "THẤP"}];
                            return parsedJson;
                        }
                    },
                    render: function (ui) {
                        var rowData = ui.rowData,
                            dataIndx = ui.dataIndx;

                        var value = ui.rowData.ruiro;
                        rowData.pq_cellcls = rowData.pq_cellcls || {};
                        if (value == "1") {
                            rowData.pq_cellcls[dataIndx] = 'red';
                            return "CAO";
                        } else if (value == "2") {
                            rowData.pq_cellcls[dataIndx] = 'orange';
                            return "TB";
                        }else if (value == "3") {
                            rowData.pq_cellcls[dataIndx] = 'blue';
                            return "THẤP";
                        } else {
                            return "";
                        }
                    }

                },
                {
                    title: "Nợ CK Duyệt",
                    minWidth: 100,
                    dataType: "string",
                    align: "right",
                    dataIndx: "_nockduyet",
                    editable: false,
                    render: function (ui) {
                        var val = ui.rowData._nockduyet;
                        return $.number(val);
                    }

                },
                {
                    title: "Có CK Duyệt",
                    minWidth: 100,
                    dataType: "string",
                    align: "right",
                    dataIndx: "_cockduyet",
                    editable: false,
                    render: function (ui) {
                        var val = ui.rowData._cockduyet;
                        return $.number(val);
                    }

                },
                {
                    title: "Ghi chú",
                    minWidth: 150,
                    dataType: "string",
                    align: "left",
                    dataIndx: "ghichu",
                    editable: true,
                    editor: {type:'textarea', attr:'rows=5'}
                },
                {
                    title: "Người duyệt",
                    minWidth: 30,
                    dataType: "string",
                    align: "center",
                    dataIndx: "nguoiduyet",
                    editable: false
                }
            ],//-----------------------------------------Kết thúc các cột--------------------------------------
            pageModel: {type: "local", rPP: 200, strRpp: "{0}", strDisplay: "{0} đến {1} của {2}"},
            dataModel: {
                dataType: "JSON",
                location: "remote",
                recIndx: "sott",
                postData: {tendatabase: '<?php echo $tendatabase; ?>'},
                url: $dir_module_user + "list_dsduyet_bangcd.php",//-- Load danh sách lên lưới
                getData: function (dataJSON) {
                    var data = dataJSON.data;
                    return {curPage: dataJSON.curPage, totalRecords: dataJSON.totalRecords, data: data};
                }
            }
        };

        var totalData;
        function calculateSummary() {
            var
                TongNoDK = 0,
                TongCoDK = 0,
                TongNoPS = 0,
                TongCoPS = 0,
                TongNoCK = 0,
                TongCoCK = 0,
                TongNoCKDuyet = 0,
                TongCoCKDuyet = 0,
                data = $("#grid_editing_thongke_phanmem").pqGrid('option', 'dataModel.data');
            try {
                data.forEach(row => {
                    if(row["matkcha"]=='0') {
                        TongNoDK += parseFloat(row['nodk']);
                        TongCoDK += parseFloat(row['codk']);
                        TongNoPS += parseFloat(row['nops']);
                        TongCoPS += parseFloat(row['cops']);
                        TongNoCK += parseFloat(row['nock']);
                        TongCoCK += parseFloat(row['cock']);
                    }
                TongNoCKDuyet += parseFloat(row['_nockduyet']);
                TongCoCKDuyet += parseFloat(row['_cockduyet']);
            })
            }catch (e) {

            }
            totalData = {tentk:"<b>Tổng cộng: </b>", nodk:TongNoDK, codk:TongCoDK,nops:TongNoPS,cops:TongCoPS,nock:TongNoCK,cock:TongCoCK,_nockduyet:TongNoCKDuyet,_cockduyet:TongCoCKDuyet, pq_rowcls: 'green'};
        }
        var $summary = "";
        obj.render = function (evt, ui) {
            $summary = $("<div class='pq-grid-summary'  ></div>")
                .prependTo($(".pq-grid-bottom", this));
        }
        //refresh summary whenever data changes due to edit, add, paste, undo, redo etc.
        //obj.change = function (evt, ui) {
            //obj.refresh.call(this);
        //}
        obj.cellSave = function (evt, ui) {
            obj.refresh.call(this);
        }
        obj.refresh = function (evt, ui) {
            calculateSummary();
            var data = [totalData]; //2 dimensional array
            var obj = { data: data, $cont: $summary }
            $(this).pqGrid("createTable", obj);
        }
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

        setTimeout(function () {
            $("#grid_editing_thongke_phanmem .pq-search-hd-field").focus();
        }, 100);
        //-----------------------------Hết lưới---------------------------------------------------------------------

    });
</script>
<div id="dialog-makhachhang"
     title="DUYỆT BẢNG CÂN ĐỐI TÀI KHOẢN - <?php echo $mst . " - " . $tencongty; ?>"><!-- dialog -->
    <div id="grid_editing_thongke_phanmem" style="margin:5px auto;border: 0px !important;"></div>
</div>
</body>
</html>