<?php
session_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');
?>
<!DOCTYPE HTML>
<html lang="vi">
<head>
    <meta charset="utf-8"/>
    <title>BẢNG KÊ MUA VÀO - BÁN RA</title>
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
                            thang: "",
                            loaibangke: "1",
                            gtmuavao: "",
                            thuemuavao: "",
                            dtbanra: "",
                            thuebanra: "",
                            teptin: "",
                            nguoilap: "",
                            ngaylap: "",
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
                        thang: "",
                        loaibangke: "1",
                        gtmuavao: "",
                        thuemuavao: "",
                        dtbanra: "",
                        thuebanra: "",
                        teptin: "",
                        nguoilap: "",
                        ngaylap: "",
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
                    thang: "",
                    loaibangke: "1",
                    gtmuavao: "",
                    thuemuavao: "",
                    dtbanra: "",
                    thuebanra: "",
                    teptin: "",
                    nguoilap: "",
                    ngaylap: "<?php echo date("Y-m-d H:i:s"); ?>",
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
                                    url: $dir_module_banggiaonhan + "del_muavao_banra.php",
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
                            if ((rowData.ngaynhap == "0000-00-00 00:00:00" || typeof rowData.ngaynhap == "undefined")) {
                                rowData.ngaynhap = "<?php echo date("Y-m-d H:i:s"); ?>";
                            }
                            rowData.nguoinhap = "<?php echo $_SESSION['User'] ?>";
                            url = $dir_module_banggiaonhan + "add_muavao_banra.php";
                        }else {
                            if ((rowData.ngaynhap == "0000-00-00 00:00:00" || typeof rowData.ngaynhap == "undefined")) {
                                rowData.ngaynhap = "<?php echo date("Y-m-d H:i:s"); ?>";
                            }
                            rowData.nguoinhap = "<?php echo $_SESSION['User'] ?>";
                            url = $dir_module_banggiaonhan + "edit_muavao_banra.php";
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
                { title: "Lưu", dataType: "integer", dataIndx: "sott", editable: false, width: 10, hidden:false,align: "center",
                    render: function (ui) {
                        var $val  = ui.rowData.sott;
                        var rowIndx  = ui.rowIndx;
                        if($val==0 || $val=="" || typeof $val == 'undefined'){
                            return "<img src='../icon/uncheck.png' width='20px'/>";
                        } else {
                            return "<img src='../icon/check.png' width='20px' />";
                        }
                    }
                },
                {
                    title: "Tháng/Quý",
                    dataType: "string",
                    dataIndx: "thang",
                    width: 70,
                    align: "center",
                    editable: true,
                    editor: {
                        type: "select",
                        options: [{"": "--Chọn--"},{"I": "Quý I"},{"II": "Quý II"},{"III": "Quý III"},{"IV": "Quý IV"},{"1": "Tháng 01"},{"2": "Tháng 02"},{"3": "Tháng 03"},{"4": "Tháng 04"},{"5": "Tháng 05"},{"6": "Tháng 06"},{"7": "Tháng 07"},{"8": "Tháng 08"},{"9": "Tháng 09"},{"10": "Tháng 10"},{"11": "Tháng 11"},{"12": "Tháng 12"}]
                    },
                    validations: [
                        {type: 'minLen', value: 1, msg: "Tháng/Quý không được trống !"}
                    ],
                    filter: {type: 'textbox', condition: 'contain', listeners: ['keyup']}
                },
                {
                    title: "Loại bảng kê",
                    minWidth: 80,
                    dataType: "string",
                    align: "center",
                    dataIndx: "loaibangke",
                    editor: {
                        type: "select",
                        options: [{"1": "Lần 1"},{"0": "Bổ sung"}]
                    },
                    filter: {type: 'textbox', condition: 'contain', listeners: ['keyup']}
                },
                {
                    title: "Giá trị mua vào",
                    minWidth: 150,
                    dataType: "string",
                    align: "right",
                    dataIndx: "gtmuavao",
                    validations: [
                        {type: 'minLen', value: 1, msg: "Giá trị mua vào không được trống !"}
                    ],
                    filter: {type: 'textbox', condition: 'contain', listeners: ['keyup']},
                    render: function (ui) {// Hiện số tiền tính toán lên lưới
                        return $.number(ui.rowData.gtmuavao,0,".",",");
                    }
                },
                {
                    title: "Thuế mua vào",
                    minWidth: 150,
                    dataType: "string",
                    align: "right",
                    dataIndx: "thuemuavao",
                    validations: [
                        {type: 'minLen', value: 1, msg: "Thuế GTGT mua vào không được trống !"}
                    ],
                    filter: {type: 'textbox', condition: 'contain', listeners: ['keyup']},
                    render: function (ui) {// Hiện số tiền tính toán lên lưới
                        return $.number(ui.rowData.thuemuavao,0,".",",");
                    }
                },
                {
                    title: "DT bán ra",
                    minWidth: 150,
                    dataType: "string",
                    align: "right",
                    dataIndx: "dtbanra",
                    validations: [
                        {type: 'minLen', value: 1, msg: "Doanh thu bán ra không được trống !"}
                    ],
                    filter: {type: 'textbox', condition: 'contain', listeners: ['keyup']},
                    render: function (ui) {// Hiện số tiền tính toán lên lưới
                        return $.number(ui.rowData.dtbanra,0,".",",");
                    }
                },
                {
                    title: "Thuế bán ra",
                    minWidth: 150,
                    dataType: "string",
                    align: "right",
                    dataIndx: "thuebanra",
                    validations: [
                        {type: 'minLen', value: 1, msg: "Thuế GTGT bán ra không được trống !"}
                    ],
                    filter: {type: 'textbox', condition: 'contain', listeners: ['keyup']},
                    render: function (ui) {// Hiện số tiền tính toán lên lưới
                        return $.number(ui.rowData.thuebanra,0,".",",");
                    }
                },
                {
                    title: "Đường dẫn tệp",
                    minWidth: 100,
                    dataType: "string",
                    align: "center",
                    dataIndx: "teptin",
                    validations: [
                        {type: 'minLen', value: 1, msg: "Tệp tin đính kèm không được trống !"}
                    ],
                    render: function (ui) {// Hiện số tiền tính toán lên lưới
                        if(ui.rowData.teptin==""){
                            return "";
                        }else{
                            return ".........";
                        }

                    }
                },
                {
                    title: "Xem Tệp",
                    minWidth: 100,
                    dataType: "string",
                    align: "center",
                    dataIndx: "xemteptin",
                    editable: false,
                    render: function (ui) {// Hiện số tiền tính toán lên lưới
                        return "<a target='_blank' href='"+ui.rowData.teptin+"'>XEM</a>";
                    }

                },
                {
                    title: "Người lập",
                    minWidth: 100,
                    dataType: "string",
                    align: "left",
                    dataIndx: "nguoinhap",
                    editable: false

                },
                {
                    title: "Ngày lập",
                    minWidth: 100,
                    dataType: "string",
                    align: "left",
                    dataIndx: "ngaynhap",
                    editable: false

                },
                {
                    title: "Ghi chú", minWidth: 150, dataType: "string", align: "left", dataIndx: "ghichu",editable:true,
                    editor: {type: "textarea", attr: "rows=5"}
                }
            ],//-----------------------------------------Kết thúc các cột--------------------------------------
            pageModel: {type: "local", rPP: 200, strRpp: "{0}", strDisplay: "{0} đến {1} của {2}"},
            dataModel: {
                dataType: "JSON",
                location: "remote",
                recIndx: "sott",
                url: $dir_module_banggiaonhan + "list_muavao_banra.php",//-- Load danh sách lên lưới
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
     title="BẢNG KÊ MUA VÀO - BÁN RA (F4: THÊM MỚI, F7: SAO CHÉP, F8: XOÁ)"><!-- dialog -->
    <div id="grid_editing_thongke_phanmem" style="margin:5px auto;border: 0px !important;"></div>
</div>
</body>
</html>