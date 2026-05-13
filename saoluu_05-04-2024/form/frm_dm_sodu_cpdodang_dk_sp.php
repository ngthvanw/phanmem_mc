<?php
session_start();
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
    tr.green td { background: lightgreen;}
    tr td.mauhong{
        background-color: pink;
    }

    .ui-tabs .ui-tabs-panel {
        padding: 0 !important;
    }

</style>
<script>
    $height = getHeight();
    $width = getWidth() - 50;
    $(function () {
        $( "#tabs" ).tabs();
        var $dir_module_dmsanpham = "";
        $dir_module_dmsanpham = "modules/dmsanpham/";//--------------------------------------------Thay đổi khi copy\
        function xoadialog_sltonkho() { // ----------------------đóng form
            reset_dialog(".dialog-sodu_cpdodang_dk");
            reset_dialog(".dialog_main_dinhmuc_sanpham");
        }

        $("#dialog-sodu_cpdodang_dk").dialog({ // ------------------Gọi dialog
            resizable: false,
            height: $height,
            width: $width,
            modal: true

        });
        $("#dialog-sodu_cpdodang_dk").keydown(function (event) {//--------------Các phím tắt
            var $grid_pb = $("#grid_editing_cpdodang_dk").closest('.pq-grid');//---- Lưới----------------
            if (event.keyCode == Keys.F2 || event.keyCode == Keys.F7 || event.keyCode == Keys.F8) {
                var rowSelect = getRowSelect();//------ Lấy đối tượng được chọn
                if (rowSelect == false) {
                    alert_f("Chú Ý", "fa fa-warning", "red", "Bạn cần chọn dữ liệu trước khi thực hiện !");
                }
            }

            var rowEditting = $("#grid_editing_cpdodang_dk").pqGrid("getRowsByClass", {cls: 'pq-row-edit'});//---Lấy đối tượng đang sửa
            if ($('div').hasClass('jconfirm') == false) {

                if (event.keyCode == Keys.ESCAPE) {
						change_data_quit_sltonkho();
                }
            } else {
                return false;
            }
        }); // end phím tắt

        function change_data_quit_sltonkho() { // Cảnh báo thoát khi thay đổi dữ liệu////////////////////////////////////////////////////
			{
                $.confirm({
                    title: 'Thông báo',
                    content: 'Bạn đang chuẩn bị thoát cửa sổ này ? .<br/>Nhấn phím <strong style="color:blue;">[Y]</strong> để đồng ý phím <strong style="color:red;">[N]</strong> để hủy bỏ ',
                    icon: 'fa fa-warning',
                    type: 'red',
                    buttons: {
                        "Đồng ý": {
                            keys: ['Y'], action: function () {
                                xoadialog_sltonkho();
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
                    //console.log(e);
                    //$('.dialog_main3').load("form/frm_dm_httk_select.php?idstyle=grid_editing_cpdodang_dk");
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
                    $('.dialog_main_manhomvt').load("form/frm_dm_manhom_select.php?idstyle=grid_editing_cpdodang_dk");
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
        function addRow($grid, $obj_addrow="") {
            if (isEditing($grid)) {
                return false;
            }
            //append empty row in the first row.
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
            $grid.pqGrid("addRow", {rowIndxPage: 0, rowData: rowData});

            var $tr = $grid.pqGrid("getRow", {rowIndxPage: 0});
            if ($tr) {
                //simulate click on edit button.
                $tr.find("button.edit_btn").click();
            }
        }

        //----------------------------Hàm xóa dữ kiệu------------------------------------------
        function deleteRow(rowIndx, $grid) {
            $grid.pqGrid("addClass", {rowIndx: rowIndx, cls: 'pq-row-delete'});
            var rowData = $grid.pqGrid("getRowData", {rowIndx: rowIndx});
            //var ans = window.confirm("Bạn có muốn xóa dòng số " + (rowIndx + 1) + " không ?");
            if ($('div').hasClass('jconfirm') == false) {
                $.confirm({
                    title: "Chú ý", icon: "fa fa-times-circle", type: "red",
                    content: "Bạn có muốn xóa hàng số" + (rowIndx + 1) + "  không ?" + '<br/>Nhấn phím <strong style="color:blue;">[Y]</strong> để đồng ý phím <strong style="color:red;">[N]</strong> để hủy bỏ ',
                    buttons: {
                        "Đồng ý": {
                            keys: ['Y'], action: function () {
                                $grid.pqGrid("deleteRow", {rowIndx: rowIndx, effect: true});

                                var sott = $grid.pqGrid("getRecId", {rowIndx: rowIndx});
                                var rowData = ( $grid.pqGrid("getRowData", {rowIndx: rowIndx}));
                                var ma = rowData.mavt;

                                $.ajax($.extend({}, ajaxObj, {
                                    context: $grid,
                                    url: $dir_module_sltonkho + "del.php",
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
                                $grid.pqGrid("removeClass", {rowIndx: rowIndx, cls: 'pq-row-delete'});
                            }
                        }
                    }
                });
            }
        }

        //------------------------------Thây đổi row khi nhấp edit-----------------------------------
        function editRow(rowIndx, $grid) {

            $grid.pqGrid("addClass", {rowIndx: rowIndx, cls: 'pq-row-edit'});

            //change edit button to update button and delete to cancel.
            var selectCell = (getRowSelect());
            if (selectCell == false) {
                var dataIndex = 1;
            } else {
                //var dataIndex = selectCell[0].dataIndx;
                var dataIndex = 1;
            }
            if (dataIndex == 1) {
                $grid.pqGrid("editFirstCellInRow", {rowIndx: rowIndx});
            } else {
                $grid.pqGrid("editCell", {rowIndx: rowIndx, dataIndx: dataIndex});
            }
            var $tr = $grid.pqGrid("getRow", {rowIndx: rowIndx}),
                $btn = $tr.find("button.edit_btn");
            $btn.button("option", {label: "", "icons": {primary: "ui-icon-disk"}})
                .unbind("click")
                .click(function (evt) {
                    evt.preventDefault();
                    return update(rowIndx, $grid);

                });
            $btn.next().button("option", {label: "", "icons": {primary: "ui-icon-cancel"}})
                .unbind("click")
                .click(function (evt) {
                    $grid.pqGrid("quitEditMode");
                    $grid.pqGrid("removeClass", {rowIndx: rowIndx, cls: 'pq-row-edit'});
                    $grid.pqGrid("refreshRow", {rowIndx: rowIndx});
                    $grid.pqGrid("rollback");
                });
        }

        //---------------------------Cập nhật row-----------------------------------------
        function ThanhTien($SoLuong, $DonGia, $ThanhTienNhap) {
            $soluong = parseFloat($SoLuong);// Lấy số lượng nhập vào

            $dongia = parseFloat($DonGia);// Lấy đơn giá nhập vào
            $thanhtien = Math.round(($soluong * $dongia)); // thành tiền  = bằng số lượng * đơn giá (Làm tròn thành tiền)
            //alert($ThanhTienNhap);
            if ($ThanhTienNhap == 0 || $ThanhTienNhap == $thanhtien || $ThanhTienNhap == "" || isNaN($ThanhTienNhap) == true) {
                return $thanhtien
            } else {
                return $ThanhTienNhap;
            }
        }

        //--------------------------------Khai báo lưới đầu kỳ công trình---------------------------------------.
        var objcpctdk = {
            hwrap: false,
            //resizable: true,
            rowBorders: true,
            //virtualX: true, virtualY: true,
            height: $height - 120,
            width: $width - 30,
            //virtualX: true,
            numberCell: {show: true},
            filterModel: {on: true, mode: "AND", header: true},
            trackModel: {on: true}, //to turn on the track changes.
            scrollModel: {
                autoFit: true
            },
            toolbar: {
                items: [
                    {
                        type: "<span id='tongtienhienco' style='color:red'></span>"
                    }
                ]
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
                    oldRow = obj.oldRow,
                    type = obj.type,
                    rowData = obj.rowData;


                var url = "";
                if (type == 'update') {
                    var valid = grid.isValid({rowData: rowData, allowInvalid: true}).valid;
                    if (valid) {
                        if (rowData[recIndx] == null) {
                            url = $dir_module_dmsanpham + "edit_soducp_dk.php";
                        }
                        else {
                            url = $dir_module_dmsanpham + "edit_soducp_dk.php";
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
                        success: function () {
                            $grid.pqGrid("refreshRow", {rowIndx: rowIndx});
                        }
                    });
                    $grid.pqGrid("refreshRow", {rowIndx: rowIndx});
                }
            },
            colModel: [//-------------------------------------------Khai báo các cột trong lưới-----------------------
                {title: "SoTT", dataType: "integer", dataIndx: "sott", editable: false, width: 0, hidden: true},
                {
                    title: "Mã CT",
                    dataType: "string",
                    editable: false,
                    dataIndx: "mact",
                    width: 80,
                    sortable: true,
                    filter: { type: 'textbox', condition: 'begin', listeners: ['keyup'] },
                    render: function (ui) {
                        var rowData = ui.rowData,
                            dataIndx = ui.dataIndx;

                        rowData.pq_cellcls = rowData.pq_cellcls || {};
                        if (rowData.maspcha== 0 ) {//if change is negative.
                            rowData.pq_cellcls[dataIndx] = 'mauhong';
                            return rowData.mact;
                        }
                        else { //if change >= 0
                            return  rowData.mact;
                        }
                    }

                },
                {
                    title: "Tên CT", width: 350, dataType: "string", editable: false, dataIndx: "tensp",
                    filter: { type: 'textbox', condition: 'begin', listeners: ['keyup'] }
                },
                {
                    title: "Mã CT cha",
                    width: 80,
                    dataType: "string",
                    align: "left",
                    editable: false,
                    dataIndx: "maspcha",
                    filter: { type: 'textbox', condition: 'begin', listeners: ['keyup'] }
                },
                {
                    title: "Số tiền",
                    width: 120,
                    dataType: "integer",
                    align: "right",
                    editable: true,
                    dataIndx: "soduno",
                    render: function (ui) {
                        var value = ui.rowData.soduno;
                        return $.number(value, 0, ".", ",");
                    }
                },

                {
                    title: "Số dư có",
                    width: 150,
                    dataType: "integer",
                    align: "right",
                    hidden: true,
                    editable: true,
                    dataIndx: "soduco",
                    render: function (ui) {
                        var value = ui.rowData.soduco;
                        return $.number(value, 0, ".", ",");
                    }
                }

            ],//-----------------------------------------Kết thúc các cột---------------------------------------
            pageModel: {type: "local", rPP: 200, strRpp: "{0}", strDisplay: "{0} đến {1} của {2}"},
            dataModel: {
                dataType: "JSON",
                location: "remote",
                recIndx: "sott",
                url: $dir_module_dmsanpham + "list_cpdodang_dk.php",//-- Load danh sách lên lưới
                getData: function (response) {
                    return {data: response.data};
                }
            }
        };
        function calculateSummary() {
            arrayData = tongtiendauky();
            $tongduno = arrayData.data.soduno;
            $tongduco = arrayData.data.soduco;
            if($tongduno!=$tongduco){
                //alert("Tổng dư nợ và tổng dư có không bằng nhau !");
            }
            totalData = { mact: "", tensp: "<b>TỔNG CỘNG</b>", soduno: $tongduno, soduco: $tongduco, pq_rowcls: 'green' };
        }

        var $summary = "";

        objcpctdk.render = function (evt, ui) {
            $summary = $("<div class='pq-grid-summary'  ></div>")
                .prependTo($(".pq-grid-bottom", this));
            calculateSummary();
        }

        objcpctdk.cellSave = function (evt, ui) {
            calculateSummary();
            objcpctdk.refresh.call(this);
        }

        objcpctdk.refresh = function (evt, ui) {
            var data = [totalData]; //JSON (array of objects)
            var obj = { data: data, $cont: $summary }
            $(this).pqGrid("createTable", obj);
        }
        var $grid = $("#grid_editing_cpdodang_dk").pqGrid(objcpctdk);

        /////////////////////////////Kết thúc lưới công trình//////////////////////////////////////////////////

        //--------------------------------Khai báo lưới đầu kỳ công trình---------------------------------------.
        var objcpspdk = {
            hwrap: false,
            //resizable: true,
            rowBorders: true,
            //virtualX: true, virtualY: true,
            height: $height - 120,
            width: $width - 30,
            //virtualX: true,
            numberCell: {show: true},
            filterModel: {on: true, mode: "AND", header: true},
            trackModel: {on: true}, //to turn on the track changes.
            scrollModel: {
                autoFit: true
            },
            toolbar: {
                items: [
                    {
                        type: "<span id='tongtienhienco' style='color:red'></span>"
                    }
                ]
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
                    oldRow = obj.oldRow,
                    type = obj.type,
                    rowData = obj.rowData;


                var url = "";
                if (type == 'update') {
                    var valid = grid.isValid({rowData: rowData, allowInvalid: true}).valid;
                    if (valid) {
                        if (rowData[recIndx] == null) {
                            url = $dir_module_dmsanpham + "edit_soducp_dk.php";
                        }
                        else {
                            url = $dir_module_dmsanpham + "edit_soducp_dk.php";
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
                        success: function () {
                            $grid.pqGrid("refreshRow", {rowIndx: rowIndx});
                        }
                    });
                    $grid.pqGrid("refreshRow", {rowIndx: rowIndx});
                }
            },
            colModel: [//-------------------------------------------Khai báo các cột trong lưới-----------------------
                {title: "SoTT", dataType: "integer", dataIndx: "sott", editable: false, width: 0, hidden: true},
                {
                    title: "Mã SP",
                    dataType: "string",
                    editable: false,
                    dataIndx: "mact",
                    width: 80,
                    sortable: true,
                    filter: { type: 'textbox', condition: 'begin', listeners: ['keyup'] },
                    render: function (ui) {
                        var rowData = ui.rowData,
                            dataIndx = ui.dataIndx;

                        rowData.pq_cellcls = rowData.pq_cellcls || {};
                        if (rowData.maspcha== 0 ) {//if change is negative.
                            rowData.pq_cellcls[dataIndx] = 'mauhong';
                            return rowData.mact;
                        }
                        else { //if change >= 0
                            return  rowData.mact;
                        }
                    }

                },
                {
                    title: "Tên SP", width: 350, dataType: "string", editable: false, dataIndx: "tensp",
                    filter: { type: 'textbox', condition: 'begin', listeners: ['keyup'] }
                },
                {
                    title: "Mã SP cha",
                    width: 80,
                    dataType: "string",
                    align: "left",
                    editable: false,
                    dataIndx: "maspcha",
                    filter: { type: 'textbox', condition: 'begin', listeners: ['keyup'] }
                },
                {
                    title: "Số tiền",
                    width: 120,
                    dataType: "integer",
                    align: "right",
                    editable: true,
                    dataIndx: "soduno",
                    render: function (ui) {
                        var value = ui.rowData.soduno;
                        return $.number(value, 0, ".", ",");
                    }
                },

                {
                    title: "Số dư có",
                    width: 150,
                    dataType: "integer",
                    align: "right",
                    hidden: true,
                    editable: true,
                    dataIndx: "soduco",
                    render: function (ui) {
                        var value = ui.rowData.soduco;
                        return $.number(value, 0, ".", ",");
                    }
                }

            ],//-----------------------------------------Kết thúc các cột---------------------------------------
            pageModel: {type: "local", rPP: 200, strRpp: "{0}", strDisplay: "{0} đến {1} của {2}"},
            dataModel: {
                dataType: "JSON",
                location: "remote",
                recIndx: "sott",
                url: $dir_module_dmsanpham + "list_cpdodang_sp_dk.php",//-- Load danh sách lên lưới
                getData: function (response) {
                    return {data: response.data};
                }
            }
        };
        function calculateSummarySP() {
            arrayData = tongtiendaukySP();
            $tongduno = arrayData.data.soduno;
            $tongduco = arrayData.data.soduco;
            if($tongduno!=$tongduco){
                //alert("Tổng dư nợ và tổng dư có không bằng nhau !");
            }
            totalDataSP = { mact: "", tensp: "<b>TỔNG CỘNG</b>", soduno: $tongduno, soduco: $tongduco, pq_rowcls: 'green' };
        }

        var $summarySP = "";

        objcpspdk.render = function (evt, ui) {
            $summarySP = $("<div class='pq-grid-summary'  ></div>")
                .prependTo($(".pq-grid-bottom", this));
            calculateSummarySP();
        }

        objcpspdk.cellSave = function (evt, ui) {
            calculateSummarySP();
            objcpspdk.refresh.call(this);
        }

        objcpspdk.refresh = function (evt, ui) {
            var data = [totalDataSP]; //JSON (array of objects)
            var obj = { data: data, $cont: $summarySP }
            $(this).pqGrid("createTable", obj);
        }
        var $grid = $("#grid_editing_cpspdodang_dk").pqGrid(objcpspdk);

        /////////////////////////////Kết thúc lưới công trình//////////////////////////////////////////////////

        //use refresh & refreshRow events to display jQueryUI buttons and bind events.
        function getRowSelect() { // --------------------Lấy dữ liệu theo dòng trên gird----------------------
            var arr = $("#grid_editing_cpdodang_dk").pqGrid("selection", {
                type: 'cell',
                method: 'getSelection'
            }); //Lấy giá trị đang chọn
            if (arr && arr.length > 0) {
                return arr;
            } else {
                return false;
            }
        }

        $("#tab_bangđoangspdk").click(function () {
            $("#grid_editing_cpspdodang_dk").pqGrid( "refreshDataAndView" );
        });


        function tongtiendauky() {
            $data=""
            $.ajax({// Kiểm tra xem STT có tồn tại hay không
                url: $dir_module_dmsanpham + "tongtien_spdodang_dauky.php",
                async: false,
                success: function (response) {
                    $data = $.parseJSON(response);
                }
            });
            return $data;
        }


        function tongtiendaukySP() {
            $data=""
            $.ajax({// Kiểm tra xem STT có tồn tại hay không
                url: $dir_module_dmsanpham + "tongtien_spdodang_sp_dauky.php",
                async: false,
                success: function (response) {
                    $data = $.parseJSON(response);
                }
            });
            return $data;
        }


        //-----------------------------Hết lưới---------------------------------------------------------------------
    });
</script>
<div id="dialog-sodu_cpdodang_dk"
     title="CHI PHÍ DỞ DANG ĐẦU KỲ... (ENTER : Sửa và Lưu , ESC : Thoát )">

    <div id="tabs" style="padding: 0px;">
        <ul>
            <li><a href="#tabs-1" id="tab_bangđoangspdk">SẢN PHẨM</a></li>
            <li style="display: none;"><a href="#tabs-0" >CÔNG TRÌNH</a></li>
        </ul>
        <div id="tabs-1">
            <div id="grid_editing_cpspdodang_dk" style="margin:0px;border: 0px !important;"></div>
        </div>
        <div id="tabs-0">
            <div id="grid_editing_cpdodang_dk" style="margin:0px;border: 0px !important;"></div>
        </div>
    </div>
    <!-- dialog -->
</div>