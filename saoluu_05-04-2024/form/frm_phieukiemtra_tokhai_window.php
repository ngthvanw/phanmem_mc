<?php
session_start();
$hiden_nhanvien = "";
$hiden_truongphong = "";
$khoadong_nv = "";
if ($_SESSION['Level'] == 3) {
    $hiden_nhanvien = "hidden:true,";
    $khoadong_nv="editable: false,";
}
if ($_SESSION['Level'] == 2) {
    $hiden_truongphong = "hidden:true,";
}
$LoaiPhieu = $_GET['loaiphieu'];
$TuPhieu = $_GET['tuphieu'];
$DenPhieu = $_GET['denphieu'];
$gt1 = $_GET['gt1'];
$gt2 = $_GET['gt2'];
$machinhanh = $_GET['machinhanh'];
?>
<!DOCTYPE HTML>
<html lang="vi">
<head>
    <meta charset="utf-8"/>
    <title>PHIẾU KIỂM TRA CHỨNG TỪ KẾ TOÁN</title>
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
        var $dir_module_phieukiemtra = "";
        $dir_module_phieukiemtra = "../modules/phieukiemtra/";//--------------------------------------------Thay đổi khi copy
        $dir_module_httk = "../modules/httk/";//--------------------------------------------Thay đổi khi copy
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
            var $grid_pb = $("#grid_editing_makh").closest('.pq-grid');//---- Lưới----------------
            if (event.keyCode == Keys.F7 || event.keyCode == Keys.F8 || event.keyCode == Keys.INSERT) {
                var rowSelect = getRowSelect();//------ Lấy đối tượng được chọn
                if (rowSelect == false) {
                    alert_f("Chú Ý", "fa fa-warning", "red", "Bạn cần chọn dữ liệu trước khi thực hiện !");
                }
            }
            var rowEditting = $("#grid_editing_makh").pqGrid("getRowsByClass", {cls: 'pq-row-edit'});//---Lấy đối tượng đang sửa
            if ($('div').hasClass('jconfirm') == false) {
                if (event.keyCode == Keys.F4) {
                    if(<?php echo $_SESSION['Level'] ?>==3){
                        alert("Bạn không có quyền thực hiện thao tác này !");
                        return false;
                    }
                    var rowSelect = getRowSelect();//------ Lấy đối tượng được chọn
                    var _dataRow = {
                        soct: "",
                        noidung: "",
                        chinhsua: "",
                        ketoanvien: 0,
                        truongnhom: 0,
                        bangiamdoc: 0,
                    };
                    if (rowSelect == false) {
                        addRow(0, 'soct', $grid_pb,_dataRow);
                    } else {
                        var rowIndx = rowSelect[0].rowIndx;

                        addRow(rowIndx + 1, 'soct', $grid_pb, _dataRow);
                    }
                }
                if (event.keyCode == Keys.F7) { // copy
                    if(<?php echo $_SESSION['Level'] ?>==3){
                        alert("Bạn không có quyền thực hiện thao tác này !");
                        return false;
                    }
                    if (rowSelect != false) {

                        var rowIndx = rowSelect[0].rowIndx;
                        var rowData = rowSelect[0].rowData;
                        //---------------Khai báo các cell khi dùng lệnh copy-----------------------------------------
                        //--------------------------------------------Thay đổi khi copy---------------------------------
                        var colM = $("#grid_editing_makh").pqGrid("option", "colModel");
                        colM[1].editable = true;
                        $("#grid_editing_makh").pqGrid("option", "colModel", colM);
                        var _dataRow = {
                            soct: rowData.soct,
                            noidung: rowData.noidung,
                            chinhsua: rowData.chinhsua,
                            ketoanvien: rowData.ketoanvien,
                            truongnhom: rowData.truongnhom,
                            bangiamdoc: rowData.bangiamdoc
                        };
                        addRow(rowIndx + 1, 'soct', $grid_pb, _dataRow);
                    }
                }
                if (event.keyCode == Keys.F8) { // Xóa
                    if(<?php echo $_SESSION['Level'] ?>==3){
                        alert("Bạn không có quyền thực hiện thao tác này !");
                        return false;
                    }
                    if (rowSelect != false) {
                        if (isEditing($grid_pb)) {
                            return false;
                        }
                        var rowData = rowSelect[0].rowData;
                        deleteRow(rowData, $grid_pb);
                    }
                }
                if (event.keyCode == Keys.ESCAPE && $('div').hasClass('jconfirm') == false && rowEditting.length < 1) {
                    change_data_quit_makh();
                }
            } else {
                return false;
            }
        }); // end phím tắt
        function change_data_quit_makh() { // Cảnh báo thoát khi thay đổi dữ liệu////////////////////////////////////////////////////{
            if(<?php echo $_SESSION['Level']; ?>==3)
            {
                $.confirm({
                    title: 'CHÚ Ý',
                    content: 'Bạn có muốn thoát khỏi cửa sổ này không ? .<br/>Nhấn phím <strong style="color:blue;">[Y]</strong> thoát phím <strong style="color:red;">[N]</strong> để thoát ',
                    icon: 'fa fa-warning',
                    type: 'red',
                    buttons: {
                        "ĐỒNG Ý": {
                            keys: ['Y'], action: function () {

                                        window.close();
                            }
                        },
                        "THOÁT": {
                            keys: ['N'], action: function () {
                                window.close();
                            }
                        }
                    }
                });
            }else{
                $.confirm({
                    title: 'CHÚ Ý',
                    content: 'Hệ thống sẽ tự tạo nhật ký kiểm tra từ phiếu số <?php echo $TuPhieu; ?> đến số <?php echo $DenPhieu; ?> . Bạn có muốn tạo không ? .<br/>Nhấn phím <strong style="color:blue;">[Y]</strong> để lưu và thoát phím <strong style="color:red;">[N]</strong> để hủy bỏ và thoát ',
                    icon: 'fa fa-warning',
                    type: 'red',
                    buttons: {
                        "GHI NHẬT KÝ": {
                            keys: ['Y'], action: function () {
                                $.ajax({// Lấy thông tin phiếu và lưu vào session
                                    url: $dir_module_phieukiemtra + "nhapnhatky_kiemtraphieu.php",
                                    data: {
                                        tuphieu: '<?php echo $TuPhieu; ?>',
                                        denphieu: '<?php echo $DenPhieu; ?>',
                                        loaiphieu: '<?php echo $LoaiPhieu; ?>',
                                        gt1: '<?php echo $gt1; ?>',
                                        gt2: '<?php echo $gt2 ?>',
                                        machinhanh: '<?php echo $machinhanh ?>',
                                    },
                                    async: false,
                                    success: function (response) {
                                        window.close();
                                    }
                                });
                            }
                        },
                        "THOÁT KHÔNG GHI": {
                            keys: ['N'], action: function () {
                                window.close();
                            }
                        }
                    }
                });
            }
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
                    $('.dialog_main_httk').load("form/frm_dm_httk_select.php?idstyle=grid_editing_makh");
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
                                    url: $dir_module_phieukiemtra + "del.php",
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
            hwrap: false,
            //resizable: true,
            rowBorders: true,
            virtualX: true, virtualY: true,
            height: $height - 58,
            width: $width - 20,
            //virtualX: true,
            numberCell: {show: false},
            filterModel: {on: true, mode: "AND", header: true},
            trackModel: {on: true}, //to turn on the track changes.
            scrollModel: {
                autoFit: true
            },
            historyModel: {
                checkEditableAdd: true
            },
            editModel: {
                allowInvalid: true,
                saveKey: $.ui.keyCode.ENTER
            },
            editor: {
                select: true
            },
            toolbar: {
                items: [
                    { type: 'button', icon: 'ui-icon-circle-close', label: 'Kết thúc', listeners: [
                        { "click": function (evt, ui) {
                            change_data_quit_makh();
                        }
                        }
                    ]
                    }
                ]
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
                            url = $dir_module_phieukiemtra + "add.php";
                        }
                        else {
                            url = $dir_module_phieukiemtra + "edit.php";
                        }
                    }
                }
                if (valid) {
                        rowData.loaiphieu = '<?php echo $LoaiPhieu; ?>';
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
                            /*var colM = $("#grid_editing_makh").pqGrid("option", "colModel");
                             colM[1].editable = false;
                             $("#grid_editing_makh").pqGrid("option", "colModel", colM);*/
                        },
                    });
                }
            },
            colModel: [//-------------------------------------------Khai báo các cột trong lưới-----------------------
                {title: "Số TT", dataType: "integer", dataIndx: "sott", width: 0, hidden: true},
                {
                    title: "Tháng/Quý",
                    dataType: "string",
                    dataIndx: "soct",
                    minWidth: 80,
                    sortable: true,
                    <?php echo $khoadong_nv; ?>
                    align: "center",
                    validations: [
                        {type: 'minLen', value: 1, msg: "Mã tài khoản phải có 1 đến 14 ký tự !"},
                        {type: 'maxLen', value: 14, msg: "Mã tài khoản phải có 1 đến 14 ký tự !"},
                    ],
                    filter: {type: 'textbox', condition: "begin", listeners: ['keyup']}
                },
                {
                    title: "Phát hiện nội dung sai sót", minWidth: 300, dataType: "string", dataIndx: "noidung",
                    <?php echo $khoadong_nv; ?>
                    editor: {type: 'textarea', attr: 'rows=3'},
                    validations: [
                        {type: 'minLen', value: 1, msg: "Nội dung không được trống !"}
                    ]
                },
                {
                    title: "Yêu cầu chỉnh sửa ", minWidth: 250, dataType: "string", align: "left", dataIndx: "chinhsua",
                    <?php echo $khoadong_nv; ?>
                    editor: {type: 'textarea', attr: 'rows=3'}
                },
                {
                    title: "Kế toán viên", minWidth: 100, dataType: "integer", align: "center", dataIndx: "ketoanvien",
                    filter: { type: "select",
                        condition: 'equal',
                        prepend: { '': '----Tất cả----' },
                        options: function (ui) {
                            //remote validation
                            var parsedJson = [ { 0:"CHƯA SỬA"}, {1: "ĐÃ SỬA"}] ;
                            return parsedJson;
                        },
                        listeners: ['change']
                    },
                    editor: {type: "select",options: function (ui) {
                        //remote validation
                        var parsedJson = [ { 0:"CHƯA SỬA"}, {1: "ĐÃ SỬA"}] ;
                        return parsedJson;
                    }},
                    render: function (ui) {
                        var value = ui.rowData.ketoanvien;
                        if (value == 1) {
                            return "<img src='../icon/check.png' width='20px'/>";
                        } else {
                            return "<img src='../icon/uncheck.png' width='20px' />";
                        }
                    }
                },
                {
                    title: "Trưởng nhóm", minWidth: 100, dataType: "integer", align: "center", dataIndx: "truongnhom",
                    <?php echo $hiden_nhanvien; ?>
                    filter: { type: "select",
                        condition: 'equal',
                        prepend: { '': '----Tất cả----' },
                        options: function (ui) {
                            //remote validation
                            var parsedJson = [ { 0:"CHƯA DUYỆT"}, {1: "ĐÃ DUYỆT"}] ;
                            return parsedJson;
                        },
                        listeners: ['change']
                    },
                    editor: {type: "select",options: function (ui) {
                        //remote validation
                        var parsedJson = [ { 0:"CHƯA DUYỆT"}, {1: "ĐÃ DUYỆT"}] ;
                        return parsedJson;
                    }},
                    render: function (ui) {
                        var value = ui.rowData.truongnhom;
                        if (value == 1) {
                            return "<img src='../icon/check.png' width='20px'/>";
                        } else {
                            return "<img src='../icon/uncheck.png' width='20px' />";
                        }
                    }
                },
                {
                    title: "Ban giám đốc", minWidth: 100, dataType: "integer", align: "center", dataIndx: "bangiamdoc",
                    <?php echo $hiden_truongphong . $hiden_nhanvien; ?>
                    filter: { type: "select",
                        condition: 'equal',
                        prepend: { '': '----Tất cả----' },
                        options: function (ui) {
                            //remote validation
                            var parsedJson = [ { 0:"CHƯA DUYỆT"}, {1: "ĐÃ DUYỆT"}] ;
                            return parsedJson;
                        },
                        listeners: ['change']
                    },
                    editor: {type: "select",options: function (ui) {
                        //remote validation
                        var parsedJson = [ { 0:"CHƯA DUYỆT"}, {1: "ĐÃ DUYỆT"}] ;
                        return parsedJson;
                    }},
                    render: function (ui) {
                        var value = ui.rowData.bangiamdoc;
                        if (value == 1) {
                            return "<img src='../icon/check.png' width='20px'/>";
                        } else {
                            return "<img src='../icon/uncheck.png' width='20px' />";
                        }
                    }
                },
                {
                    title: "Chứng từ",
                    minWidth: 100,
                    dataType: "string",
                    align: "center",
                    dataIndx: "loaiphieu",
                    editable: false,
                    render: function (ui) {
                        var value = ui.rowData.loaiphieu;
                        if (value == 1) {
                            return "NHẬP KHO";
                        } else if (value == 2) {
                            return "XUẤT KHO"
                        } else if (value == 3) {
                            return "PHIẾU THU"
                        } else if (value == 4) {
                            return "PHIẾU CHI"
                        } else if (value == 5) {
                            return "PHIẾU GHI CÓ"
                        } else if (value == 6) {
                            return "PHIẾU GHI NỢ"
                        } else if (value == 7) {
                            return "NGÂN HÀNG GỞI VÀO"
                        }else if (value == 8) {
                            return "NGÂN HÀNG RÚT RA"
                        }else if (value == 9) {
                            return "TỜ KHAI THUẾ"
                        }else if (value == 10) {
                            return "BÁO CÁO HÓA ĐƠN"
                        }
                    }
                },
                {
                    title: "TG nhập",
                    minWidth: 80,
                    dataType: "string",
                    align: "center",
                    dataIndx: "thoigianbatdau",
                    <?php echo $hiden_truongphong.$hiden_nhanvien; ?>
                    editable: false,
                    render: function (ui) {
                        var value = (parseFloat((ui.rowData.thoigianbatdau) / 86400) * 86400000);
                        if (value > 86400000) {
                            var $datenhap = new Date(value);
                            return $datenhap.toLocaleTimeString() + " " + $datenhap.toLocaleDateString();
                        } else {
                            return "";
                        }
                    }
                },
                {
                    title: "KT cập nhật",
                    minWidth: 80,
                    dataType: "string",
                    align: "center",
                    dataIndx: "ketoancapnhat",
                    <?php echo $hiden_truongphong.$hiden_nhanvien; ?>
                    editable: false,
                    render: function (ui) {
                        var value = (parseFloat((ui.rowData.ketoancapnhat) / 86400) * 86400000);
                        if (value > 86400000) {
                            var $datenhap = new Date(value);
                            return $datenhap.toLocaleTimeString() + " " + $datenhap.toLocaleDateString();
                        } else {
                            return "";
                        }
                    }
                },
                {
                    title: "TN cập nhật",
                    minWidth: 80,
                    dataType: "string",
                    align: "center",
                    dataIndx: "truongnhomcapnhat",
                    <?php echo $hiden_truongphong.$hiden_nhanvien; ?>
                    editable: false,
                    render: function (ui) {
                        var value = (parseFloat((ui.rowData.truongnhomcapnhat) / 86400) * 86400000);
                        if (value > 86400000) {
                            var $datenhap = new Date(value);
                            return $datenhap.toLocaleTimeString() + " " + $datenhap.toLocaleDateString();
                        } else {
                            return "";
                        }
                    }
                },
                {
                    title: "GĐ cập nhật",
                    minWidth: 80,
                    dataType: "string",
                    align: "center",
                    dataIndx: "giamdoccapnhat",
                    <?php echo $hiden_truongphong.$hiden_nhanvien; ?>
                    editable: false,
                    render: function (ui) {
                        var value = (parseFloat((ui.rowData.giamdoccapnhat) / 86400) * 86400000);
                        if (value > 86400000) {
                            var $datenhap = new Date(value);
                            return $datenhap.toLocaleTimeString() + " " + $datenhap.toLocaleDateString();
                        } else {
                            return "";
                        }
                    }
                }
            ],//-----------------------------------------Kết thúc các cột--------------------------------------
            pageModel: {type: "local", rPP: 300, strRpp: "{0}", strDisplay: "{0} đến {1} của {2}"},
            dataModel: {
                dataType: "JSON",
                location: "remote",
                recIndx: "sott",
                postData: {loaiphieu: '<?php echo $LoaiPhieu; ?>'},
                url: $dir_module_phieukiemtra + "list.php",//-- Load danh sách lên lưới
                getData: function (dataJSON) {
                    var data = dataJSON.data;
                    return {curPage: dataJSON.curPage, totalRecords: dataJSON.totalRecords, data: data};
                }
            }
        };
        var $grid = $("#grid_editing_makh").pqGrid(obj);

        //use refresh & refreshRow events to display jQueryUI buttons and bind events. 
        function getRowSelect() { // --------------------Lấy dữ liệu theo dòng trên gird----------------------                 
            var arr = $("#grid_editing_makh").pqGrid("selection", {
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
            isEdit = $("#grid_editing_makh").pqGrid("isDirty"); //Lấy giá trị đang chọn

            return isEdit;
        }

        setTimeout(function () {
            $("#grid_editing_makh .pq-search-hd-field").focus();
        }, 100);
        //-----------------------------Hết lưới---------------------------------------------------------------------

    });
</script>
<div id="dialog-makhachhang"
     title="PHIẾU KIỂM TRA CHỨNG TỪ KẾ TOÁN (ENTER : Sửa,Lưu ,F4: Thêm mới  , F7: Sao chép , F8: Xóa )"><!-- dialog -->
    <div id="grid_editing_makh" style="margin:5px auto;border: 0px !important;"></div>
</div>
</body>
</html>