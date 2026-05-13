<?php
require("../config.php");
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
    .ui-tabs .ui-tabs-panel {
        padding: 0 !important;
    }
    div.pq-grid tr td.disabled{
        text-shadow: 0 1px 0 #fff;
        background:#ddd;
    }
    #kemteptinuudai{
        height: 100%;
    }
    fieldset {
        padding: 1px;
        padding-top: 0px;
        border: 1px solid #09F;
        margin-top: 0px;
    }

</style>
<script>
    $height = getHeight();
    $width = getWidth() - 100;
    $(function () {
        //$('#dialog-thietlap_tokhai_phuluckqkd').find('button').first().focus();
        $( "#tabs" ).tabs();
        var $dir_module_baocaothue = "";
        $dir_module_baocaothue = "modules/baocaothue/";//--------------------------------------------Thay đổi khi copy
        $dir_module_httk = "modules/httk/";//--------------------------------------------Thay đổi khi copy
        $dir_module_saoluu = "modules/saoluu/"; ////////////////Khai báo đường dẫn vào mudole-----------------------------
        function xoadialog_makh() { // ----------------------đóng form 
            reset_dialog(".dialog-thietlap_tokhai_phuluckqkd");
            reset_dialog(".dialog_main_thietlap_tokhai_phuluc");
        }

        $("#dialog-thietlap_tokhai_phuluckqkd").dialog({ // ------------------Gọi dialog
            resizable: false,
            height: $height,
            width: $width,
            modal: true

        });
        $("#dialog-thietlap_tokhai_phuluckqkd").keydown(function (event) {//--------------Các phím tắt
            var $grid_pb = $("#grid_editing_bangcandoi_ketoan").closest('.pq-grid');//---- Lưới----------------
            if (event.keyCode == Keys.F7 || event.keyCode == Keys.F8) {
                var rowSelect = getRowSelect();//------ Lấy đối tượng được chọn
                if (rowSelect == false) {
                    alert_f("Chú Ý", "fa fa-warning", "red", "Bạn cần chọn dữ liệu trước khi thực hiện !");
                }
            }
            var rowEditting = $("#grid_editing_bangcandoi_ketoan").pqGrid("getRowsByClass", {cls: 'pq-row-edit'});//---Lấy đối tượng đang sửa
            if ($('div').hasClass('jconfirm') == false) {
                if (event.keyCode == Keys.F4) {
                    rowIndex = 0;
                    //addRow(rowIndx,'maso',$grid_pb);
                }
                if (event.keyCode == Keys.F7) { // copy
                    if (rowSelect != false) {

                        var rowIndx = rowSelect[0].rowIndx;
                        var rowData = rowSelect[0].rowData;
                        //---------------Khai báo các cell khi dùng lệnh copy-----------------------------------------
                        //--------------------------------------------Thay đổi khi copy---------------------------------
                        var _dataRow = {
                            maso: rowData.maso,
                            chitieu: rowData.chitieu,
                            machitieu: rowData.machitieu,
                            sotien: rowData.sotien,
                            machitieucha: rowData.machitieucha
                        };
                        //addRow(rowIndx,'maso',$grid_pb,_dataRow);
                    }
                }
                if (event.keyCode == Keys.F8) { // Xóa
                    if (rowSelect != false) {
                        if (isEditing($grid_pb)) {
                            return false;
                        }
                        var rowData = rowSelect[0].rowData;
                        //deleteRow(rowData, $grid_pb);
                    }
                }
                if (event.keyCode == Keys.ESCAPE && $('div').hasClass('jconfirm') == false && rowEditting.length < 1) {
                    change_data_quit_makh();
                }
            } else {
                return false;
            }
        }); // end phím tắt
        function change_data_quit_makh() { // Cảnh báo thoát khi thay đổi dữ liệu////////////////////////////////////////////////////
            var $grid_pb = $("#grid_editing_bangcandoi_ketoan").closest('.pq-grid');//---- Lưới----------------
            var isEditing = rows = $grid_pb.pqGrid("getRowsByClass", {cls: 'pq-row-edit'});
            $isEdit = false;
            if (isEditing.length > 0) {
                $isEdit = true;
            }
            if ($isEdit) {
                if ($('div').hasClass('jconfirm') == false) {
                    $.confirm({
                        title: 'Thông báo',
                        content: ' Dữ liệu đã được thay đổi bạn có muốn lưu không.<br/>Nhấn phím <strong style="color:blue;">[Y]</strong> để đồng ý phím <strong style="color:red;">[N]</strong> để hủy bỏ ',
                        icon: 'fa fa-warning',
                        type: 'red',
                        buttons: {
                            "Đồng ý": {
                                keys: ['Y'], action: function () {
                                    $grid_pb.find(".pq-editor-focus").focus();
                                }
                            },
                            "Hủy bỏ": {
                                keys: ['N'], action: function () {
                                    xoadialog_makh();
                                }
                            }
                        }
                    });
                }
            } else {
                $.confirm({
                    title: 'Thông báo',
                    content: 'Bạn đang chuẩn bị thoát cửa sổ này ? .<br/>Nhấn phím <strong style="color:blue;">[Y]</strong> để đồng ý phím <strong style="color:red;">[N]</strong> để hủy bỏ ',
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
                    $('.dialog_main_httk').load("form/frm_dm_httk_select.php?idstyle=grid_editing_bangcandoi_ketoan");
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

            if ($obj_addrow != "") {
                var rowData = $obj_addrow;
            } else {
                var rowData = {maso: "", chitieu: "", machitieu: "", sotien: "", machitieucha: ""};
            }
            //rowData.makh = $ma;
            if (typeof rowIndx == 'undefined')
                rowIndx = 0;
            $grid.pqGrid("addRow", {rowIndx: rowIndx, rowData: rowData});

            $grid.pqGrid("setSelection", {rowIndx: rowIndx, dataIndx: $name});
            $grid.pqGrid("editFirstCellInRow", {rowIndx: (rowIndx)});
        }

        //----------------------------Hàm xóa dữ kiệu------------------------------------------
        function deleteRow(rowData, $grid) {
            var rowData = rowData;
            var ma = rowData.makh;
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
                                    url: $dir_module_baocaothue + "delcdkt.php",
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

        //--------------------------------Khai báo lưới điều kiện ưu đãi---------------------------------------.
        var objtokhaiphuluc = {
            hwrap: true,
            vwrap: false,
            //resizable: true,
            rowBorders: true,
            virtualX: true, virtualY: true,
            height: $height - 95,
            width: $width - 27,
            numberCell: {show: true},
            filterModel: {on: true, mode: "AND", header: true},
            trackModel: {on: true}, //to turn on the track changes.
            scrollModel: {
                autoFit: false
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
            title: "",
            change: function (evt, ui) {// Khi dữ liệu thay đổi                

                if (ui.source == 'commit' || ui.source == 'rollback') {
                    return;
                }
                var $grid = $(this),
                    grid = $grid.pqGrid('getInstance').grid;
                var rowList = ui.rowList,
                    recIndx = grid.option('dataModel').recIndx;

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
                            //url = $dir_module_baocaothue+"add_tokhai_thuetndn.php";
                            url = $dir_module_baocaothue + "edit_sotien_tokhai_pldkuudai.php";
                        }
                        else {
                            //url = $dir_module_baocaothue+"edit_tokhai_thuetndn.php";
                            url = $dir_module_baocaothue + "edit_sotien_tokhai_pldkuudai.php";
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
                            $grid.pqGrid("refreshRow", {rowIndx: rowIndx});
                        },
                        complete: function () {
                            $grid.pqGrid("refreshRow", {rowIndx: rowIndx});
                        }
                    });
                }
            },
            colModel: [//-------------------------------------------Khai báo các cột trong lưới-----------------------
                {title: "SoTT", dataType: "integer", dataIndx: "sott", editable: false, width: 0, hidden: true},
                {
                    title: "Chọn",
                    width: 70,
                    editable: true,
                    dataType: "string",
                    dataIndx: "chonuudai",
                    sortable: false,
                    align: "center",
                    editor: {type: "select", options: [{"0": "KHÔNG"}, {"1": "CHỌN"}]},
                    render: function (ui) {
                        var $value = ui.rowData.chonuudai;
                        if ($value == 1) {
                            return "[ X ]";
                        } else {
                            return "[&nbsp;&nbsp;&nbsp;&nbsp;]";
                        }
                    }
                },
                {
                    title: "Điều kiện ưu đãi",
                    width: 800,
                    editable: false,
                    dataType: "string",
                    dataIndx: "chitieu",
                    sortable: false,
                    align: "left",
                },


            ],//-----------------------------------------Kết thúc các cột---------------------------------------
            pageModel: {type: "local", rPP: 300, strRpp: "{0}", strDisplay: "{0} đến {1} của {2}"},
            dataModel: {
                dataType: "JSON",
                location: "remote",
                recIndx: "sott",
                url: $dir_module_baocaothue + "list_tokhai_thuetndn_pldkuudai.php",//-- Load danh sách lên lưới
                getData: function (dataJSON) {
                    var data = dataJSON.data;
                    return {curPage: dataJSON.curPage, totalRecords: dataJSON.totalRecords, data: data};
                }
            }
        };
        var $grid = $("#grid_editing_bangcandoi_ketoan").pqGrid(objtokhaiphuluc);
        /////////////////////////////Kết thúc lưới điều kiện ưu đãi//////////////////////////////////////////////////

        //--------------------------------Khai báo lưới mức độ ưu đãi---------------------------------------.
        var objtokhaiphulucmucdouudai = {
            hwrap: true,
            vwrap: false,
            //resizable: true,
            rowBorders: true,
            virtualX: true, virtualY: true,
            height: $height - 105,
            width: $width - 35,
            numberCell: {show: true},
            filterModel: {on: true, mode: "AND", header: true},
            trackModel: {on: true}, //to turn on the track changes.
            scrollModel: {
                autoFit: false
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
            title: "",
            change: function (evt, ui) {// Khi dữ liệu thay đổi

                if (ui.source == 'commit' || ui.source == 'rollback') {
                    return;
                }
                var $grid = $(this),
                    grid = $grid.pqGrid('getInstance').grid;
                var rowList = ui.rowList,
                    recIndx = grid.option('dataModel').recIndx;

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
                            //url = $dir_module_baocaothue+"add_tokhai_thuetndn.php";
                            url = $dir_module_baocaothue + "edit_sotien_tokhai_plmucdouudai.php";
                        }
                        else {
                            //url = $dir_module_baocaothue+"edit_tokhai_thuetndn.php";
                            url = $dir_module_baocaothue + "edit_sotien_tokhai_plmucdouudai.php";
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
                            $grid.pqGrid("refreshRow", {rowIndx: rowIndx});
                        },
                        complete: function () {
                            $grid.pqGrid("refreshRow", {rowIndx: rowIndx});
                        }
                    });
                }
            },
            colModel: [//-------------------------------------------Khai báo các cột trong lưới-----------------------
                {title: "SoTT", dataType: "integer", dataIndx: "sott", editable: false, width: 0, hidden: true},
                {
                    title: "STT",
                    width: 70,
                    editable: false,
                    dataType: "string",
                    dataIndx: "machitieu",
                    sortable: false,
                    align: "center",
                },
                {
                    title: "Điều kiện ưu đãi",
                    width: 800,
                    editable: false,
                    dataType: "string",
                    dataIndx: "chitieu",
                    sortable: false,
                    align: "left",
                },
                {
                    title: "% ưu đãi",
                    width: 70,
                    dataType: "integer",
                    dataIndx: "phantram",
                    sortable: false,
                    align: "center",
                    editable: function(ui){
                        var machitieu=ui.rowData.machitieu;
                        if(machitieu=="2.1"){
                            return true;
                        }else{
                            return false;
                        }
                    },
                    render: function (ui) {
                        var $value = ui.rowData.phantram;
                        if ($value == 0) {
                            return "";
                        } else {
                            return $value;
                        }
                    }
                },
                {
                    title: "Số năm",
                    width: 70,
                    dataType: "integer",
                    dataIndx: "nam",
                    sortable: false,
                    align: "center",
                    editable: function(ui){
                        var machitieu=ui.rowData.machitieu;
                        if(machitieu=="2.1"){
                            return false;
                        }else{
                            return true;
                        }
                    }
                },
                {
                    title: "Kẽ từ năm",
                    width: 70,
                    editable: true,
                    dataType: "integer",
                    dataIndx: "ketunam",
                    sortable: false,
                    align: "right",
                    editable: function(ui){
                        var machitieu=ui.rowData.machitieu;
                        if(machitieu=="2.1"){
                            return false;
                        }else{
                            return true;
                        }
                    }
                }


            ],//-----------------------------------------Kết thúc các cột---------------------------------------
            pageModel: {type: "local", rPP: 300, strRpp: "{0}", strDisplay: "{0} đến {1} của {2}"},
            dataModel: {
                dataType: "JSON",
                location: "remote",
                recIndx: "sott",
                url: $dir_module_baocaothue + "list_tokhai_thuetndn_plmucdouudai.php",//-- Load danh sách lên lưới
                getData: function (dataJSON) {
                    var data = dataJSON.data;
                    return {curPage: dataJSON.curPage, totalRecords: dataJSON.totalRecords, data: data};
                }
            }
        };
        var $grid = $("#grid_editing_mucdouudai").pqGrid(objtokhaiphulucmucdouudai);
        /////////////////////////////Kết thúc lưới mức độ ưu đãi//////////////////////////////////////////////////

        //--------------------------------Khai báo lưới số thuế ưu đãi---------------------------------------.
        var objtokhaiphulucsothueuudai = {
            hwrap: true,
            vwrap: false,
            //resizable: true,
            rowBorders: true,
            virtualX: true, virtualY: true,
            height: $height - 105,
            width: $width - 35,
            numberCell: {show: true},
            filterModel: {on: true, mode: "AND", header: true},
            trackModel: {on: true}, //to turn on the track changes.
            scrollModel: {
                autoFit: false
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
            title: "",
            change: function (evt, ui) {// Khi dữ liệu thay đổi

                if (ui.source == 'commit' || ui.source == 'rollback') {
                    return;
                }
                var $grid = $(this),
                    grid = $grid.pqGrid('getInstance').grid;
                var rowList = ui.rowList,
                    recIndx = grid.option('dataModel').recIndx;

                var obj = rowList[0],
                    rowIndx = obj.rowIndx,
                    newRow = obj.newRow,
                    type = obj.type,
                    rowData = obj.rowData;
                var column = $("#grid_editing_sothueduocuudai").pqGrid( "getData", { dataIndx: ['sott','sotien', 'machitieu'] } );
                var url = "";
                if (type == 'update') {
                    var valid = grid.isValid({rowData: rowData, allowInvalid: true}).valid;
                    if (valid) {
                        if (rowData[recIndx] == null) {
                            //url = $dir_module_baocaothue+"add_tokhai_thuetndn.php";
                            url = $dir_module_baocaothue + "edit_sotien_tokhai_plsothueuudai.php";
                        }
                        else {
                            //url = $dir_module_baocaothue+"edit_tokhai_thuetndn.php";
                            url = $dir_module_baocaothue + "edit_sotien_tokhai_plsothueuudai.php";
                        }
                    }
                }
                if (valid) {
                    $.ajax({
                        url: url,
                        data: {string:column},
                        dataType: "json",
                        type: "GET",
                        async: true,
                        success: function (res) {
                            $grid.pqGrid("refreshDataAndView");
                        },
                        complete: function () {
                            $grid.pqGrid("refreshDataAndView");
                        }
                    });
                }
            },
            colModel: [//-------------------------------------------Khai báo các cột trong lưới-----------------------
                {title: "SoTT", dataType: "integer", dataIndx: "sott", editable: false, width: 0, hidden: true},
                {
                    title: "STT",
                    width: 70,
                    editable: false,
                    dataType: "string",
                    dataIndx: "machitieu",
                    sortable: false,
                    align: "center",
                },
                {
                    title: "Chỉ tiêu",
                    width: 800,
                    editable: false,
                    dataType: "string",
                    dataIndx: "chitieu",
                    sortable: false,
                    align: "left",
                },
                {
                    title: "Mã chỉ tiêu",
                    width: 80,
                    editable: false,
                    dataType: "string",
                    dataIndx: "machitieutk",
                    sortable: false,
                    align: "center",
                    render:function( ui ){
                        var val = ui.rowData.machitieu;
                        if(val=='3.1'){
                            return "[1]";
                        }else if(val=='3.2'){
                            return "[2]";
                        } else if(val=='3.3'){
                            return "[3]";
                        }else if(val=='3.4'){
                            return "[4]";
                        }else if(val=='4.1'){
                            return "[5]";
                        }else if(val=='4.2'){
                            return "[6]";
                        }else if(val=='4.3'){
                            return "[7]";
                        }else if(val=='4.4'){
                            return "[8]";
                        }else if(val=='4.5'){
                            return "[9]";
                        }
                    },
                },
                {
                    title: "Số tiền",
                    width: 70,
                    dataType: "integer",
                    dataIndx: "sotien",
                    sortable: false,
                    align: "right",
                    render:function( ui ){
                        var giatri_hd = ui.rowData.sotien;
                        return $.number(giatri_hd,0,".",",");
                    },
                    editable: function(ui){
                        var machitieu=ui.rowData.machitieu;

                        if(machitieu=="3" || machitieu=="3.2" ||machitieu=="3.4" ||machitieu=="4" ||machitieu=="4.3" ||machitieu=="4.5"){
                            return true;
                        }else{
                            return true;
                        }
                    }
                },


            ],//-----------------------------------------Kết thúc các cột---------------------------------------
            pageModel: {type: "local", rPP: 300, strRpp: "{0}", strDisplay: "{0} đến {1} của {2}"},
            dataModel: {
                dataType: "JSON",
                location: "remote",
                recIndx: "sott",
                url: $dir_module_baocaothue + "list_tokhai_thuetndn_plsothueuudai.php",//-- Load danh sách lên lưới
                getData: function (dataJSON) {
                    var data = dataJSON.data;
                    return {curPage: dataJSON.curPage, totalRecords: dataJSON.totalRecords, data: data};
                }
            }
        };
        var $grid = $("#grid_editing_sothueduocuudai").pqGrid(objtokhaiphulucsothueuudai);
        /////////////////////////////Kết thúc lưới số thuế ưu đãi//////////////////////////////////////////////////

        $("#tab_dieukienuudai").click(function () {
            $("#grid_editing_bangcandoi_ketoan").pqGrid( "refreshDataAndView" );
        });

        $("#tab_mucdouudai").click(function () {
            $("#grid_editing_mucdouudai").pqGrid( "refreshDataAndView" );
        });


        $("#tab_sothueduocuudai").click(function () {
            $("#grid_editing_sothueduocuudai").pqGrid( "refreshDataAndView" );
        });

        $("#tab_dinhkemuudai").click(function () {
            //kemteptinuudai
        });

        //use refresh & refreshRow events to display jQueryUI buttons and bind events. 
        function getRowSelect() { // --------------------Lấy dữ liệu theo dòng trên gird----------------------                 
            var arr = $("#grid_editing_bangcandoi_ketoan").pqGrid("selection", {
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
            isEdit = $("#grid_editing_bangcandoi_ketoan").pqGrid("isDirty"); //Lấy giá trị đang chọn
            return isEdit;
        }

        //-----------------------------Hết lưới---------------------------------------------------------------------
        function taifilebackup($file){
            window.location.href = $file;
        }
        $("#tailen").on("click", function() {
            if (window.File && window.FileReader && window.FileList && window.Blob)
            {
                // lay dung luong va kieu file tu the input file
                var fsize = $('#fileuudai')[0].files[0].size;
                var ftype = $('#fileuudai')[0].files[0].type;
                var fname = $('#fileuudai').val();
                console.log(fsize);
                console.log(ftype);
                if(fname=="")  //thuc hien dieu gi do neu dung luong file vuot qua 1MB
                {
                    alert("Tập tin không tòn tại. Vui lòng chọn tập tin.");
                    return false;
                }
                if(ftype!="application/vnd.ms-excel" && ftype!="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet")  //thuc hien dieu gi do neu dung luong file vuot qua 1MB
                {
                    alert("Chỉ được tải tệp tin excel lên hệ thống. Vui lòng chọn tệp khác!");
                    return false;
                }
                if(fsize>2097152)  //thuc hien dieu gi do neu dung luong file vuot qua 1MB
                {
                    alert("Tập tin không được vượt quá 5Mb ! Vui lòng chọn lại.");
                    return false;
                }
            }else{
                alert("Trình duyệt không hỗ trợ. Vui lòng chọn trình duyệt khác!");
                return false;
            }

            var file_data = $("#fileuudai").prop("files")[0];
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
                                url: $dir_module_saoluu + "ajaxupload.php",
                                type: "POST",
                                data: form_data,
                                async: false,
                                enctype: 'multipart/form-data',
                                processData: false,  // tell jQuery not to process the data
                                contentType: false ,  // tell jQuery not to set contentType
                                cache: false,
                                success: function (data) {
                                }
                            });
                            $.confirm({
                                title: 'Thông báo',
                                type: 'green',
                                method: 'POST',
                                async: false,
                                contentType: 'multipart/form-data',
                                content: 'url:' + $dir_module_saoluu + 'uploadphuchoi.php',
                                contentLoaded: function () {
                                },
                                buttons: {
                                    "Thoát": {
                                        keys: ['Y'], btnClass: 'btn-green', action: function () {
                                            $("#Form_taifile")[0].reset();
                                            $.ajax({
                                                url: $dir_module_saoluu+"load_list_backup.php",
                                                async: false,
                                                success: function (response) {
                                                    $(".table-dialog_saoluu").html(response);
                                                }
                                            });
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
        $(".xoafile").on("click", function() {
            $sott = this.getAttribute('sid');
            $fid = this.getAttribute('fid');
            if('<?php echo $_SESSION['Level'] ?>'!=5 || '<?php echo $_SESSION['Level'] ?>'!=6){
                $.confirm({// Cảnh báo khi phục hồi dữ liệu
                    title: 'Chú ý',
                    content: 'Bạn muốn xoá tập tin này không ?',
                    icon: 'fa fa-warning',
                    type: 'red',
                    buttons: {
                        "Đồng ý": {
                            keys: ['Y'], action: function () {
                                $.confirm({
                                    title: 'Thông báo',
                                    type: 'green',
                                    method: 'GET',
                                    async: false,
                                    contentType: 'multipart/form-data',
                                    content: 'url:' + $dir_module_saoluu + 'xoa_list_backup.php?sott='+$sott+'&fid='+$fid,
                                    contentLoaded: function () {
                                    },
                                    buttons: {
                                        "Thoát": {
                                            keys: ['Y'], btnClass: 'btn-green', action: function () {
                                                $("#Form_taifile")[0].reset();
                                                $.ajax({
                                                    url: $dir_module_saoluu+"load_list_backup.php",
                                                    async: false,
                                                    success: function (response) {
                                                        $(".table-dialog_saoluu").html(response);
                                                    }
                                                });
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
            }else{
                alert("Bạn không có quyền xoá tập tin này");
                return false;
            }
        });

    });
</script>
<div id="dialog-thietlap_tokhai_phuluckqkd" title="THIẾT LẬP PHỤ LỤC THUẾ THU NHẬP DOANH NGHIỆP ĐƯỢC ƯU ĐÃI (Nếu thuế suất ưu đãi<0 thì phần mềm sẽ không tự động tính)"><!-- dialog -->
    <div id="tabs" style="padding: 0px;">
        <ul>
            <li><a href="#tabs-0" id="tab_dieukienuudai" >Điều kiện ưu đãi</a></li>
            <li><a href="#tabs-1" id="tab_mucdouudai">Mức độ ưu đãi</a></li>
            <li><a href="#tabs-2" id="tab_sothueduocuudai">Xác định số thuế được ưu đãi</a></li>
            <li><a href="#tabs-3" id="tab_dinhkemuudai">Đính kèm tệp số thuế được ưu đãi</a></li>
        </ul>
        <div id="tabs-0">
            <div id="grid_editing_bangcandoi_ketoan" style="margin:0px;border: 0px !important;"></div>
        </div>
        <div id="tabs-1">
            <div id="grid_editing_mucdouudai" style="margin:5px auto;border: 0px !important;"></div>
        </div>
        <div id="tabs-2">
            <div id="grid_editing_sothueduocuudai" style="margin:5px auto;border: 0px !important;"></div>
        </div>
        <div id="tabs-3">
            <div id="kemteptinuudai" style="margin:5px auto;border: 0px !important;">
                <form  method="post" id="Form_taifile" enctype="multipart/form-data">
                <fieldset style="margin-top: 10px">
                    <legend><b>Chọn tập tin</b></legend>
                    <table border="0" width="100%"><tr>
                            <td width="10%" align="right"><b>Tệp ưu đãi &nbsp;&nbsp;&nbsp;</b></td>
                            <td width="20%" ><input type="file" name="fileuudai" id="fileuudai"></td>
                            <td width="70%" ><input STYLE="color: red;font-weight: bold; border: 1px solid red" type="button" accept=".xls,.xlsx" name="tailen" id="tailen" value="TẢI LÊN"></td>
                        </tr></table>
                </fieldset>
                <fieldset style="margin-top: 10px">
                    <LEGEND><b>Danh sách file đính kèm phụ lục ưu đãi</b></LEGEND>
                    <table class="table-dialog_saoluu" border="0" width="100%">
                        <tr style="background-color:#51b4dc ">
                            <td style="border: 1px solid #51b4dc;font-weight: bold;" align="center" width="10%">STT</td>
                            <td style="border: 1px solid #51b4dc;font-weight: bold;" align="center" width="40%" >MST</td>
                            <td style="border: 1px solid #51b4dc;font-weight: bold;" align="center" width="40%" >Ngày</td>
                            <td style="border: 1px solid #51b4dc;font-weight: bold;" align="center" width="10%" >Chức năng</td>
                        </tr>
                        <?php
                        $OBJBK = new backup;
                        $ListBackup = $OBJBK->LoadListBackup();
						$OBJBK->re_query("delete from saoluu where year(ngayluu)<'2020'");
                        $i=0;
                        foreach($ListBackup as $ItemBackup){
                            $i++;
                            ?>
                            <tr table-dialog_saoluu style="text-align: center;">
                                <td style="border: 1px solid #51b4dc;"><?php echo $ItemBackup['STT']; ?></td>
                                <td style="border: 1px solid #51b4dc;" align="center"><a onclick="window.location.href='<?php echo $URI."/backup/".$_SESSION['MST']."_".$_SESSION['NienDo']."/".$ItemBackup['tenfile']; ?>'" href="#" ><?php echo $ItemBackup['tenfile']; ?></a></td>
                                <td style="border: 1px solid #51b4dc;"><?php echo date("d/m/Y h:m:s",strtotime($ItemBackup['ngayluu'])); ?></td>
                                <td style="border: 1px solid #51b4dc;"><a sid="<?php echo $ItemBackup['sott']; ?>" fid="<?php echo $ItemBackup['tenfile']; ?>" class="xoafile" href="#" >Xoá</a></td>
                            </tr>
                            <?php
                        }
                        ?>
                    </table>
                </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>