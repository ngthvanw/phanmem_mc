<?php
session_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');
?>
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
<script>
    $height = getHeight()-10;
    $width = getWidth()-20;
    $(function () {
        var $dir_module_banggiaonhan = "";
        $dir_module_banggiaonhan = "modules/banggiaonhan/";//--------------------------------------------Thay đổi khi copy
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
                            nguoigui: "<?php echo $_SESSION['User'] ?>",
                            ngaygui: "<?php echo date("Y-m-d H:i:s"); ?>",
                            trangthai: 0,
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
                        nguoigui: "<?php echo $_SESSION['User'] ?>",
                        ngaygui: "<?php echo date("Y-m-d H:i:s"); ?>",
                        trangthai: 0,
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
                           xoadialog_makh();
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
                    nguoigui: "",
                    ngaygui: "<?php echo date("Y-m-d H:i:s"); ?>",
                    trangthai: 0,
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

                            rowData.ngaygui = "<?php echo date("Y-m-d H:i:s"); ?>";

                            url = $dir_module_banggiaonhan + "add_thuquanly.php";
                        }
                        else {
                            if (rowData.nguoigiaoky == "1" && (rowData.ngaynguoigiaoky == "0000-00-00 00:00:00" || rowData.ngaynguoigiaoky == "" || typeof rowData.ngaynguoigiaoky == "undefined")) {
                                rowData.ngaynguoigiaoky = "<?php echo date("Y-m-d H:i:s"); ?>";
                            }
                            if (rowData.nguoinhanky == "1" && (rowData.ngaynguoinhanky == "0000-00-00 00:00:00" || rowData.ngaynguoinhanky == "" || typeof rowData.ngaynguoinhanky == "undefined")) {
                                rowData.ngaynguoinhanky = "<?php echo date("Y-m-d H:i:s"); ?>";
                            }
                            url = $dir_module_banggiaonhan + "edit_thuquanly.php";
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
                    title: "Mã số thuế ",
                    minWidth: 110,
                    dataType: "string",
                    align: "left",
                    dataIndx: "mst",
                    editable: function (ui) {
                        var rowData = ui.rowData;
                        try {
                            $trangthai = rowData.trangthai;
                        }catch (e){
                            $trangthai = 0;
                        }

                        if ($trangthai == 1 && ("<?php echo trim($_SESSION['Level'] !="1" ); ?>")) {
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
                    minWidth: 300,
                    dataType: "string",
                    align: "left",
                    dataIndx: "tencongty",
                    editable: function (ui) {
                        var rowData = ui.rowData;
                        try {
                            $trangthai = rowData.trangthai;
                        }catch (e){
                            $trangthai = 0;
                        }

                        if ($trangthai == 1 && ("<?php echo trim($_SESSION['Level'] !="1" ); ?>")) {
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
                    title: "Người gửi",
                    minWidth: 90,
                    dataType: "string",
                    dataIndx: "nguoigui",
                    editable: function (ui) {
                        var rowData = ui.rowData;
                        try {
                            $trangthai = rowData.trangthai;
                        }catch (e){
                            $trangthai = 0;
                        }

                        if ($trangthai == 1 && ("<?php echo trim($_SESSION['Level'] !="1" ); ?>")) {
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
                    title: "Ngày gửi",
                    minWidth: 100,
                    dataType: "string",
                    align: "left",
                    dataIndx: "ngaygui",
                    editable: false,
                    filter: {type: 'textbox', condition: "contain", listeners: ['keyup']},

                },
                {
                    title: "Tập tin",
                    minWidth: 100,
                    dataType: "string",
                    align: "left",
                    dataIndx: "taptin",
                    editable: false

                },
                {
                    title: "Trạng thái",
                    minWidth: 100,
                    dataType: "string",
                    align: "center",
                    dataIndx: "trangthai",
                    editable: false,
                    validations: [
                        {type: 'minLen', value: 1, msg: "Tên công ty không được trống !"}
                    ],
                    editor: {type: "select", options: [{"0": "CHỜ DUYỆT"}, {"1": "DUYỆT"}, {"2": "TRẢ LẠI"}]},
                    render: function (ui) {
                        var value = ui.rowData.trangthai;
                        if (value == '0') {
                            return "<a href='#' class='duyetthuquanly'><img src='icon/choduyet.jpg' alt='Đang chờ duyệt' width='60px'/></a>";
                        } else if (value == '1') {
                            return "<a href='#'><img src='icon/daduyet.jpg' alt='Đã duyệt' width='60px' /></a>";
                        }else if (value == '2'){
                            return "<a href='#'><img src='icon/tralai.jpg' alt='Tạm nộp' width='60px' /></a>";
                        }
                    }
                },

                {
                    title: "Người duyệt",
                    minWidth: 100,
                    dataType: "integer",
                    align: "center",
                    dataIndx: "nguoiduyet",
                    editable: false
                },
                {
                    title: "Ngày ký",
                    minWidth: 120,
                    dataType: "string",
                    align: "left",
                    dataIndx: "lichsuduyet",
                    editable: false

                },

                {
                    title: "Ghi chú", minWidth: 150, dataType: "string", align: "left", dataIndx: "ghichu",editable: function (ui) {
                    var rowData = ui.rowData;
                    try {
                        $trangthai = rowData.trangthai;
                    }catch (e){
                        $trangthai = 0;
                    }

                    if ($trangthai == 1 && ("<?php echo trim($_SESSION['Level'] !="1" ); ?>")) {
                        return false;
                    } else {
                        return true;
                    }
                },
                    editor: {type: "textarea", attr: "rows=5"}
                }
            ],//-----------------------------------------Kết thúc các cột--------------------------------------
            pageModel: {type: "local", rPP: 200, strRpp: "{0}", strDisplay: "{0} đến {1} của {2}"},
            dataModel: {
                dataType: "JSON",
                location: "remote",
                recIndx: "sott",
                url: $dir_module_banggiaonhan + "list_thuquanly.php",//-- Load danh sách lên lưới
                getData: function (dataJSON) {
                    var data = dataJSON.data;
                    return {curPage: dataJSON.curPage, totalRecords: dataJSON.totalRecords, data: data};
                }
            },
            refresh: function () {
                $("#grid_editing_thongke_phanmem").find(".duyetthuquanly")
                    .unbind("click")
                    .bind("click", function (evt) {
                        var $tr = $(this).closest("tr");
                        var obj = $grid.pqGrid("getRowIndx", { $tr: $tr });
                        var rowIndx = obj.rowIndx;
                        var rowData = obj.rowData;

                        console.log();

                        var ans = window.confirm("Are you sure to delete row No " + (rowIndx + 1) + "?");
                        $grid.pqGrid("removeClass", { rowIndx: rowIndx, cls: 'pq-row-delete' });
                        if (ans) {
                            $grid.pqGrid("deleteRow", { rowIndx: rowIndx });
                        }
                    });
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
        //edit Row

       $(".duyetthuquanly").click(function () {
            //var rowIndx = getRowIndx();
            //$('.dialog_main_thongbao').load('form/frm_duyet_thuquanly.php');
           alert(123);
        });
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
     title="DANH SÁCH THƯ QUẢN LÝ (F4: THÊM MỚI, F7: SAO CHÉP, F8: XOÁ)"><!-- dialog -->
    <div id="grid_editing_thongke_phanmem" style="margin:5px auto;border: 0px !important;"></div>
</div>