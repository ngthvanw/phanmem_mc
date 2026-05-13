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
    tr.rownotsave td
    {
        background:lightgreen;
    }
    tr td.rownotsave
    {
        background:lightgreen;
    }

</style>
<script>
    $(function () {
        $height = getHeight()-10;
        $width = getWidth() - 20;
        $("#tabs").tabs();
        $dir_module_user = "modules/user/";//--------------------------------------------Thay đổi khi copy
        function xoadialog_manhomvt() { // ----------------------đóng form
            reset_dialog(".dialog-nhommakh");
            reset_dialog(".dialog_main_makh");
        }

        $("#dialog-nhommakh").dialog({ // ------------------Gọi dialog
            resizable: false,
            height: $height,
            width: $width,
            modal: true

        });
        $("#dialog-nhommakh").keydown(function (event) {//--------------Các phím tắt
            var $grid_pb = $("#grid_editing_manhom_makh").closest('.pq-grid');//---- Lưới----------------
            if (event.keyCode == Keys.F7 || event.keyCode == Keys.F8) {
                var rowSelect = getRowSelect();//------ Lấy đối tượng được chọn
                if (rowSelect == false) {
                    alert_f("Chú Ý", "fa fa-warning", "red", "Bạn cần chọn dữ liệu trước khi thực hiện !");
                }
            }
            var rowEditting = $("#grid_editing_manhom_makh").pqGrid("getRowsByClass", {cls: 'pq-row-edit'});//---Lấy đối tượng đang sửa
            if ($('div').hasClass('jconfirm') == false) {
                if (event.keyCode == Keys.F4) {
                    rowIndx = 0;
                    var colM = $("#grid_editing_manhom_makh").pqGrid("option", "colModel");
                    colM[1].editable = true;
                    $("#grid_editing_manhom_makh").pqGrid("option", "colModel", colM);

                    addRow(rowIndx, 'manhom', $grid_pb);
                }
                if (event.keyCode == Keys.F7) { // copy

                    var rowIndx = rowSelect[0].rowIndx;
                    var rowData = rowSelect[0].rowData;
                    var colM = $("#grid_editing_manhom_makh").pqGrid("option", "colModel");
                    colM[1].editable = true;
                    $("#grid_editing_manhom_makh").pqGrid("option", "colModel", colM);

                    //---------------Khai báo các cell khi dùng lệnh copy-----------------------------------------
                    //--------------------------------------------Thay đổi khi copy---------------------------------
                    var _dataRow = {tendoanhnghiep: rowData.tendoanhnghiep, masothue: rowData.masothue, tendangnhap: rowData.tendangnhap, phidichvu: rowData.phidichvu};
                    addRow(rowIndx, 'manhom', $grid_pb, _dataRow);
                }
                if (event.keyCode == Keys.F8) { // Xóa
                    if (rowSelect != false) {
                        if (isEditing($grid_pb)) {
                            return false;
                        }
                        var rowData = rowSelect[0].rowData;
                        deleteRow(rowData, $grid_pb);
                    }
                }
                if (event.keyCode == Keys.ESCAPE && $('div').hasClass('jconfirm') == false) {
                    change_data_quit_httk_select();
                }
            } else {
                return false;
            }
        }); // end phím tắt
        function change_data_quit_httk_select() { // Cảnh báo thoát khi thay đổi dữ liệu////////////////////////////////////////////////////

            $.confirm({
                title: 'Thông báo',
                content: 'Bạn đang chuẩn bị thoát cửa sổ này ? .<br/>Nhấn phím <strong style="color:blue;">[Y]</strong> để đồng ý phím <strong style="color:red;">[N]</strong> để hủy bỏ ',
                icon: 'fa fa-warning',
                type: 'red',
                buttons: {
                    "Đồng ý": {
                        keys: ['Y'], action: function () {
                            xoadialog_manhomvt();
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
        function addRow(rowIndx, $name='tendangnhap', $grid, $obj_addrow="") {

            if ($obj_addrow != "") {
                var rowData = $obj_addrow;
            } else {
                var rowData =  {tendoanhnghiep: "", masothue: "", tendangnhap: "",phidichvu:""};
            }

            if (typeof rowIndx == 'undefined')
                rowIndx = 0;
            $grid.pqGrid("addRow", {rowIndx: rowIndx, rowData: rowData});

            $grid.pqGrid("setSelection", {rowIndx: rowIndx, dataIndx: $name});
            $grid.pqGrid("editFirstCellInRow", {rowIndx: (rowIndx)});
        }

        //----------------------------Hàm xóa dữ kiệu------------------------------------------
        function deleteRow(rowData, $grid) {
            var rowData = rowData;
            var ma = rowData.tendangnhap;
            var sott = rowData.sott;
            if ($('div').hasClass('jconfirm') == false) {
                $.confirm({
                    title: "Chú ý", icon: "fa fa-times-circle", type: "red",
                    content: "Bạn có muốn xóa hàng có tên người dùng " + (ma) + "  không ?" + '<br/>Nhấn phím <strong style="color:blue;">[Y]</strong> để đồng ý phím <strong style="color:red;">[N]</strong> để hủy bỏ ',
                    buttons: {
                        "Đồng ý": {
                            keys: ['Y'], action: function () {


                                $.ajax($.extend({}, ajaxObj, {
                                    context: $grid,
                                    url: $dir_module_user + "del_phancong_khaithue.php",
                                    data: {id: sott, ma: ma},
                                    success: function (result) {
                                        this.pqGrid("commit");
                                        this.pqGrid("refreshDataAndView");
                                    },
                                    error: function () {
                                        this.pqGrid("removeClass", {rowData: rowData, cls: 'pq-row-delete'});
                                        this.pqGrid("commit");
                                        this.pqGrid("refreshDataAndView");
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

        $("#tab_bangtonghop").click(function () {
            $("#tabs-1").load("form/gird_bangphancong_khaithue_tonghop.php");
        });

        function tongcongtien() {
            var $tennguoidung  = $("#tennguoidung").val();
            var $nam  = $("#nam").val();
            $data=""
            $.ajax({// Kiểm tra xem STT có tồn tại hay không
                url: $dir_module_user + "tongcongtien.php",
                data:{tennguoidung:$tennguoidung,nam:$nam},
                async: false,
                success: function (response) {
                    $data = $.parseJSON(response);
                }
            });
            return $data;
        }

        //--------------------------------Khai báo lưới---------------------------------------.
        var objmanhomkh = {
            hwrap: true,
            vwrap: false,
            //resizable: true,
            rowBorders: true,
            height: $height - 110,
            width: $width - 15,
            //virtualX: true,
            freezeCols:6,
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
                allowInvalid: true,
                saveKey: $.ui.keyCode.ENTER
            },
            editor: {
                select: true
            },
            toolbar: {
                items: [
                    { type: "<label for='wrapText'>Chọn Tên &nbsp;&nbsp;&nbsp;&nbsp;</label>" },
                    { type: 'select', style: 'margin-right:5px;',options: function (ui) {
                               var opts = "";
                                $.ajax({
                                    url: $dir_module_user+ "cb_user_phancong.php",
                                    dataType: "json",
                                    type: "GET",
                                    async: false,
                                    success: function (res) {
                                        opts = res;
                                    },
                                });
                                return opts;
                            },
                            attr: 'id=tennguoidung', listeners: [
                            {
                                change: function (evt) {
                                    $grid.pqGrid( "option", "dataModel.postData", function( ui ){
                                        var $tennguoidung  = $("#tennguoidung").val();
                                        var $nam  = $("#nam").val();
                                        return {tennguoidung:$tennguoidung,nam:$nam};
                                    } );
                                    $grid.pqGrid("refreshDataAndView");
                                }
                            }
                        ]
                    },
                    { type: 'select', style: 'margin-right:5px;',options: function (ui) {
                            var d = new Date();
                            var nam = d.getFullYear();
                            var opts = [{ '': 'CHỌN NĂM'}];
                            for (var i = nam; i >= 2015 ; i--) {
                                var obj = {};
                                obj[i] = i;
                                opts.push(obj);
                            }
                            return opts;
                        },
                        attr: 'id=nam', listeners: [
                            {
                                change: function (evt) {
                                    $grid.pqGrid( "option", "dataModel.postData", function( ui ){
                                        var $tennguoidung  = $("#tennguoidung").val();
                                        var $nam  = $("#nam").val();
                                        return {tennguoidung:$tennguoidung,nam:$nam};
                                    } );
                                    $grid.pqGrid("refreshDataAndView");
                                }
                            }
                        ]
                    },
                    { type: 'select', style: 'margin-right:5px;',options: function (ui) {
                            var opts = [{ '': '--CHỌN THÁNG--'},{ 'thang1': '----THÁNG 1'},{ 'thang2': '----THÁNG 2'},{ 'thang3': '----THÁNG 3'},{ 'thang4': '----THÁNG 4'},{ 'thang5': '----THÁNG 5'},{ 'thang6': '----THÁNG 6'},{ 'thang7': '----THÁNG 7'},{ 'thang8': '----THÁNG 8'},{ 'thang9': '----THÁNG 9'},{ 'thang10': '----THÁNG 10'},{ 'thang11': '----THÁNG 11'},{ 'thang12': '----THÁNG 12'},{ 'phidichvu': '----PHÍ DỊCH VỤ'}];
                            return opts;
                        },
                        attr: 'id=thangcapnhat'
                    },
                    {
                        type: 'button',
                        label: "Cập nhật",
                        icon: 'ui-icon-document',
                        listeners: [{
                            "click": function (evt) {
                                $thangcapnhat = $("#thangcapnhat").val();
                                $tennguoidung= $("#tennguoidung").val();
                                $nam= $("#nam").val();
                                if($thangcapnhat==""){
                                    alert("Vui lòng chọn tháng trước khi cập nhật");
                                    return false;
                                }
                                if($nam==""){
                                    alert("Vui lòng chọn năm trước khi cập nhật");
                                    return false;
                                }
                                if($tennguoidung==""){
                                    alert("Vui lòng chọn tên trước khi cập nhật");
                                    return false;
                                }
                                if(confirm("Bạn có muốn cập nhật phí dịch vụ vào tháng này không ?")){
                                    $.ajax({
                                        url: $dir_module_user+ "capnhatphidichvu.php",
                                        data: {thang:$thangcapnhat,tennguoidung:$tennguoidung,nam:$nam},
                                        dataType: "json",
                                        type: "GET",
                                        async: false,
                                        success: function (res) {
                                        },
                                    });
                                    $grid.pqGrid("refreshDataAndView");
                                }

                            }
                        }]
                    },
                    {
                        type: 'button',
                        label: "Xuất Excel",
                        icon: 'ui-icon-document',
                        listeners: [{
                            "click": function (evt) {
                                $grid.pqGrid("exportCsv", { url: "export_xuatexcel.php" });
                            }
                        }]
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
                            url = $dir_module_user + "add_phancong_khaithue.php";
                        }
                        else {
                            url = $dir_module_user + "edit_phancong_khaithue.php";
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
                            var colM = $("#grid_editing_manhom_makh").pqGrid("option", "colModel");
                            colM[1].editable = false;
                            $("#grid_editing_manhom_makh").pqGrid("option", "colModel", colM);


                        },
                    });
                }
            },
            colModel: [//-------------------------------------------Khai báo các cột trong lưới-----------------------
                { title: "Lưu", dataType: "integer", dataIndx: "sott", editable: false, width: 0, hidden:false,align:"center",
                    render: function (ui) {
                        var $val  = ui.rowData.sott;
                        if($val==0 || $val=="" || typeof $val == 'undefined'){
                            return "<img src='icon/uncheck.png' width='20px'/>";
                        } else {
                            return "<img src='icon/check.png' width='20px' />";
                        }
                    },},
                {
                    title: "Mã số thuế", minWidth: 100, dataType: "string", dataIndx: "masothue",
                    filter: {
                        type: 'textbox',
                        condition: 'begin',
                        listeners: ['keyup']
                    },
                    editor: {
                        type: "textbox",
                        cls: "masothue"
                    },
                    validations: [
                        {type: 'minLen', value: 1, msg:  "MST không được trống !"},
                    ],
                    render: function (ui) {
                        var rowData = ui.rowData,
                            dataIndx = ui.dataIndx;

                        rowData.pq_cellcls = rowData.pq_cellcls || {};
                        if (rowData.masothue=="BHXH" || rowData.masothue == 'LUONGTHANG') {//if change is negative.
                            rowData.pq_cellcls[dataIndx] = 'rownotsave';
                            return rowData.masothue;
                        }
                        else { //if change >= 0
                            return  rowData.masothue;
                        }
                    },
                    editable: function (ui) {
                        var $masothue = ui.rowData.masothue;
                        if ($masothue == 'BHXH'|| $masothue == 'LUONGTHANG') {
                            return false;
                        } else {
                            return true;
                        }
                    }
                },
                {
                    title: "Phụ trách", minWidth: 120, dataType: "string", dataIndx: "tendangnhap",editable: function (ui) {
                        var $masothue = ui.rowData.masothue;
                        if ($masothue == 'BHXH' || $masothue == 'LUONGTHANG') {
                            return false;
                        } else {
                            return true;
                        }
                    },
                    editor: {type: "select",options: function (ui) {
                            //remote validation
                            var parsedJson = "" ;
                            $.ajax({// Load danh sách mã khách hàng
                                url: $dir_module_user + "cb_user_phancong.php",
                                async: false,
                                success: function (response) {
                                    parsedJson = $.parseJSON(response);
                                }
                            });
                            return parsedJson;
                        }
                    }
                },
                {
                    title: "Tên doanh nghiệp",
                    dataType: "string",
                    dataIndx: "tendoanhnghiep",
                    width: 200,
                    sortable: true,
                    editable: function (ui) {
                        var $masothue = ui.rowData.masothue;
                        if ($masothue == 'BHXH'|| $masothue == 'LUONGTHANG') {
                            return false;
                        } else {
                            return true;
                        }
                    },
                    validations: [
                        {type: 'minLen', value: 1, msg:  "Tên doanh nghiệp không được trống !"},
                    ],
                    filter: {
                        type: 'textbox',
                        condition: 'begin',
                        listeners: ['keyup']
                    }
                },
                {
                    title: "Năm", width: 60, dataType: "number", dataIndx: "nam",align:"center",
                    editable: function (ui) {
                        var $masothue = ui.rowData.masothue;
                        if ($masothue == 'BHXH'|| $masothue == 'LUONGTHANG') {
                            return false;
                        } else {
                            return true;
                        }
                    },
                    validations: [
                        {type: 'minLen', value: 4, msg:  "Năm không được nhỏ hơn 4 ký tự"},
                        {type: 'maxLen', value: 4, msg:  "Năm không được lớn hơn 4 ký tự"}
                    ],
                    editor: {
                        type: "select", options: function (ui) {
                            var d = new Date();
                            var nam = d.getFullYear();
                            var opts = [{'': 'CHỌN NĂM'}];
                            for (var i = nam; i >= 2015; i--) {
                                var obj = {};
                                obj[i] = i;
                                opts.push(obj);
                            }
                            return opts;
                        }
                    }
                },
                {
                    title: "Giá phí", width: 100, dataType: "number", dataIndx: "phidichvu",align:"right",editable: function (ui) {
                        var $masothue = ui.rowData.masothue;
                        if ($masothue == 'BHXH' || $masothue == 'LUONGTHANG') {
                            return false;
                        } else {
                            return true;
                        }
                    },
                    render: function (ui) {
                        var val = ui.rowData.phidichvu;
                        if(val==0 || val==""){
                            return "-";
                        }else{
                            return $.number(val,0,".",",");
                        }
                    }
                },
                {
                    title: "Tháng 1", width: 100, dataType: "number", dataIndx: "thang1",align:"right",
                    render: function (ui) {
                        var val = ui.rowData.thang1;
                        if(val==0 || val==""){
                            return "-";
                        }else{
                            return $.number(val,0,".",",");
                        }
                    }
                },
                {
                    title: "Tháng 2", width: 100, dataType: "number", dataIndx: "thang2",align:"right",
                    render: function (ui) {
                        var val = ui.rowData.thang2;
                        if(val==0 || val==""){
                            return "-";
                        }else{
                            return $.number(val,0,".",",");
                        }
                    }
                },
                {
                    title: "Tháng 3", width: 100, dataType: "number", dataIndx: "thang3",align:"right",
                    render: function (ui) {
                        var val = ui.rowData.thang3;
                        if(val==0 || val==""){
                            return "-";
                        }else{
                            return $.number(val,0,".",",");
                        }
                    }
                },
                {
                    title: "Tháng 4", width: 100, dataType: "number", dataIndx: "thang4",align:"right",
                    render: function (ui) {
                        var val = ui.rowData.thang4;
                        if(val==0 || val==""){
                            return "-";
                        }else{
                            return $.number(val,0,".",",");
                        }
                    }
                },
                {
                    title: "Tháng 5", width: 100, dataType: "number", dataIndx: "thang5",align:"right",
                    render: function (ui) {
                        var val = ui.rowData.thang5;
                        if(val==0 || val==""){
                            return "-";
                        }else{
                            return $.number(val,0,".",",");
                        }
                    }
                },
                {
                    title: "Tháng 6", width: 100, dataType: "number", dataIndx: "thang6",align:"right",
                    render: function (ui) {
                        var val = ui.rowData.thang6;
                        if(val==0 || val==""){
                            return "-";
                        }else{
                            return $.number(val,0,".",",");
                        }
                    }
                },
                {
                    title: "Tháng 7", width: 100, dataType: "number", dataIndx: "thang7",align:"right",
                    render: function (ui) {
                        var val = ui.rowData.thang7;
                        if(val==0 || val==""){
                            return "-";
                        }else{
                            return $.number(val,0,".",",");
                        }
                    }
                },
                {
                    title: "Tháng 8", width: 100, dataType: "number", dataIndx: "thang8",align:"right",
                    render: function (ui) {
                        var val = ui.rowData.thang8;
                        if(val==0 || val==""){
                            return "-";
                        }else{
                            return $.number(val,0,".",",");
                        }
                    }
                },
                {
                    title: "Tháng 9", width: 100, dataType: "number", dataIndx: "thang9",align:"right",
                    render: function (ui) {
                        var val = ui.rowData.thang9;
                        if(val==0 || val==""){
                            return "-";
                        }else{
                            return $.number(val,0,".",",");
                        }
                    }
                },
                {
                    title: "Tháng 10", width: 100, dataType: "number", dataIndx: "thang10",align:"right",
                    render: function (ui) {
                        var val = ui.rowData.thang10;
                        if(val==0 || val==""){
                            return "-";
                        }else{
                            return $.number(val,0,".",",");
                        }
                    }
                },
                {
                    title: "Tháng 11", width: 100, dataType: "number", dataIndx: "thang11",align:"right",
                    render: function (ui) {
                        var val = ui.rowData.thang11;
                        if(val==0 || val==""){
                            return "-";
                        }else{
                            return $.number(val,0,".",",");
                        }
                    }
                },
                {
                    title: "Tháng 12", width: 100, dataType: "number", dataIndx: "thang12",align:"right",
                    render: function (ui) {
                        var val = ui.rowData.thang12;
                        if(val==0 || val==""){
                            return "-";
                        }else{
                            return $.number(val,0,".",",");
                        }
                    }
                },
                { title: "Ghi chú", minWidth: 200, dataType: "string", dataIndx: "ghichu",
                    editor: {type: "textarea", attr: "rows=3"}
                },

            ],//-----------------------------------------Kết thúc các cột---------------------------------------
            pageModel: {type: "local", rPP: 200, strRpp: "{0}", strDisplay: "{0} đến {1} của {2}"},
            dataModel: {
                dataType: "JSON",
                location: "remote",
                recIndx: "sott",
                url: $dir_module_user + "list_danhsach_phancong_khaithue.php",//-- Load danh sách lên lưới
                getData: function (response) {
                    return {data: response.data};
                }
            },
            load: function (evt, ui) {
                var grid = $(this).pqGrid('getInstance').grid,
                    data = grid.option('dataModel').data;
                    grid.isValid({data: data, allowInvalid: true});
            }
        };
        function calculateSummary() {
            arrayData = tongcongtien();
            $thang1 = arrayData.data.thang1;
            $thang2 = arrayData.data.thang2;
            $thang3 = arrayData.data.thang3;
            $thang4 = arrayData.data.thang4;
            $thang5 = arrayData.data.thang5;
            $thang6 = arrayData.data.thang6;
            $thang7 = arrayData.data.thang7;
            $thang8 = arrayData.data.thang8;
            $thang9 = arrayData.data.thang9;
            $thang10 = arrayData.data.thang10;
            $thang11 = arrayData.data.thang11;
            $thang12 = arrayData.data.thang12;
			
			$tmpthang1 = arrayData.data.tmpthang1;
            $tmpthang2 = arrayData.data.tmpthang2;
            $tmpthang3 = arrayData.data.tmpthang3;
            $tmpthang4 = arrayData.data.tmpthang4;
            $tmpthang5 = arrayData.data.tmpthang5;
            $tmpthang6 = arrayData.data.tmpthang6;
            $tmpthang7 = arrayData.data.tmpthang7;
            $tmpthang8 = arrayData.data.tmpthang8;
            $tmpthang9 = arrayData.data.tmpthang9;
            $tmpthang10 = arrayData.data.tmpthang10;
            $tmpthang11 = arrayData.data.tmpthang11;
            $tmpthang12 = arrayData.data.tmpthang12;
			
            $thuesuat = 1.1;
            $thuethang1 = ($thang1/$thuesuat)*0.1;
            $thuethang2 = ($thang2/$thuesuat)*0.1;
            $thuethang3 = ($thang3/$thuesuat)*0.1;
            $thuethang4 = ($thang4/$thuesuat)*0.1;
            $thuethang5 = ($thang5/$thuesuat)*0.1;
            $thuethang6 = ($thang6/$thuesuat)*0.1;
            $thuethang7 = ($thang7/$thuesuat)*0.1;
            $thuethang8 = ($thang8/$thuesuat)*0.1;
            $thuethang9 = ($thang9/$thuesuat)*0.1;
            $thuethang10 = ($thang10/$thuesuat)*0.1;
            $thuethang11 = ($thang11/$thuesuat)*0.1;
            $thuethang12 = ($thang12/$thuesuat)*0.1;


            $DTThuanthang1 = $thang1-$thuethang1;
            $DTThuanthang2 = $thang2-$thuethang2;
            $DTThuanthang3 = $thang3-$thuethang3;
            $DTThuanthang4 = $thang4-$thuethang4;
            $DTThuanthang5 = $thang5-$thuethang5;
            $DTThuanthang6 = $thang6-$thuethang6;
            $DTThuanthang7 = $thang7-$thuethang7;
            $DTThuanthang8 = $thang8-$thuethang8;
            $DTThuanthang9 = $thang9-$thuethang9;
            $DTThuanthang10 = $thang10-$thuethang10;
            $DTThuanthang11 = $thang11-$thuethang11;
            $DTThuanthang12 = $thang12-$thuethang12;

            $Phantramluong = 0.3;
            $Luongthang1 = $DTThuanthang1*$Phantramluong;
            $Luongthang2 = $DTThuanthang2*$Phantramluong;
            $Luongthang3 = $DTThuanthang3*$Phantramluong;
            $Luongthang4 = $DTThuanthang4*$Phantramluong;
            $Luongthang5 = $DTThuanthang5*$Phantramluong;
            $Luongthang6 = $DTThuanthang6*$Phantramluong;
            $Luongthang7 = $DTThuanthang7*$Phantramluong;
            $Luongthang8 = $DTThuanthang8*$Phantramluong;
            $Luongthang9 = $DTThuanthang9*$Phantramluong;
            $Luongthang10 = $DTThuanthang10*$Phantramluong;
            $Luongthang11 = $DTThuanthang11*$Phantramluong;
            $Luongthang12 = $DTThuanthang12*$Phantramluong;

            $bhthang1 = arrayData.data.bhthang1;
            $bhthang2 = arrayData.data.bhthang2;
            $bhthang3 = arrayData.data.bhthang3;
            $bhthang4 = arrayData.data.bhthang4;
            $bhthang5 = arrayData.data.bhthang5;
            $bhthang6 = arrayData.data.bhthang6;
            $bhthang7 = arrayData.data.bhthang7;
            $bhthang8 = arrayData.data.bhthang8;
            $bhthang9 = arrayData.data.bhthang9;
            $bhthang10 = arrayData.data.bhthang10;
            $bhthang11 = arrayData.data.bhthang11;
            $bhthang12 = arrayData.data.bhthang12;

            $ChenhLechthang1 = $Luongthang1-$tmpthang1-$bhthang1;
            $ChenhLechthang2 = $Luongthang2-$tmpthang2-$bhthang2;
            $ChenhLechthang3 = $Luongthang3-$tmpthang3-$bhthang3;
            $ChenhLechthang4 = $Luongthang4-$tmpthang4-$bhthang4;
            $ChenhLechthang5 = $Luongthang5-$tmpthang5-$bhthang5;
            $ChenhLechthang6 = $Luongthang6-$tmpthang6-$bhthang6;
            $ChenhLechthang7 = $Luongthang7-$tmpthang7-$bhthang7;
            $ChenhLechthang8 = $Luongthang8-$tmpthang8-$bhthang8;
            $ChenhLechthang9 = $Luongthang9-$tmpthang9-$bhthang9;
            $ChenhLechthang10 = $Luongthang10-$tmpthang10-$bhthang10;
            $ChenhLechthang11 = $Luongthang11-$tmpthang11-$bhthang11;
            $ChenhLechthang12 = $Luongthang12-$tmpthang12-$bhthang12;

            totalData = {sott:"10000",masothue: "", tendoanhnghiep: "<b>TỔNG CỘNG</b>",phidichvu:0,thang1: $thang1,thang2: $thang2,thang3: $thang3,thang4: $thang4,thang5: $thang5,thang6: $thang6,thang7: $thang7,thang8: $thang8,thang9: $thang9,thang10: $thang10,thang11: $thang11,thang12: $thang12,ghichu:"", pq_rowcls: 'rownotsave' };
            totalThueGTGT = {sott:"10000",masothue: "", tendoanhnghiep: "<b>Thuế GTGT</b>",phidichvu:0,thang1: $thuethang1,thang2: $thuethang2,thang3: $thuethang3,thang4: $thuethang4,thang5: $thuethang5,thang6: $thuethang6,thang7: $thuethang7,thang8: $thuethang8,thang9: $thuethang9,thang10: $thuethang10,thang11: $thuethang11,thang12: $thuethang12,ghichu:"", pq_rowcls: 'rownotsave' };
            totalDTThuan = {sott:"10000",masothue: "", tendoanhnghiep: "<b>Doanh thu thuần</b>",phidichvu:0,thang1: $DTThuanthang1,thang2: $DTThuanthang2,thang3: $DTThuanthang3,thang4: $DTThuanthang4,thang5: $DTThuanthang5,thang6: $DTThuanthang6,thang7: $DTThuanthang7,thang8: $DTThuanthang8,thang9: $DTThuanthang9,thang10: $DTThuanthang10,thang11: $DTThuanthang11,thang12: $DTThuanthang12,ghichu:"", pq_rowcls: 'rownotsave' };
            totalLuong = {sott:"10000",masothue: "", tendoanhnghiep: "<b>Tiền lương</b>",phidichvu:0,thang1: $Luongthang1,thang2: $Luongthang2,thang3: $Luongthang3,thang4: $Luongthang4,thang5: $Luongthang5,thang6: $Luongthang6,thang7: $Luongthang7,thang8: $Luongthang8,thang9: $Luongthang9,thang10: $Luongthang10,thang11: $Luongthang11,thang12: $Luongthang12,ghichu:"", pq_rowcls: 'rownotsave' };
			totaltmpLuong = {sott:"10000",masothue: "", tendoanhnghiep: "<b>Đã tạm ứng</b>",phidichvu:0,thang1: $tmpthang1,thang2: $tmpthang2,thang3: $tmpthang3,thang4: $tmpthang4,thang5: $tmpthang5,thang6: $tmpthang6,thang7: $tmpthang7,thang8: $tmpthang8,thang9: $tmpthang9,thang10: $tmpthang10,thang11: $tmpthang11,thang12: $tmpthang12,ghichu:"", pq_rowcls: 'rownotsave' };
            totalBaoHiem = {sott:"10000",masothue: "", tendoanhnghiep: "<b>Bảo hiểm xã hội</b>",phidichvu:0,thang1: $bhthang1,thang2: $bhthang2,thang3: $bhthang3,thang4: $bhthang4,thang5: $bhthang5,thang6: $bhthang6,thang7: $bhthang7,thang8: $bhthang8,thang9: $bhthang9,thang10: $bhthang10,thang11: $bhthang11,thang12: $bhthang12,ghichu:"", pq_rowcls: 'rownotsave' };
            totalChenhLech = {sott:"10000",masothue: "", tendoanhnghiep: "<b>Chênh lệch</b>",phidichvu:0,thang1: $ChenhLechthang1,thang2: $ChenhLechthang2,thang3: $ChenhLechthang3,thang4: $ChenhLechthang4,thang5: $ChenhLechthang5,thang6: $ChenhLechthang6,thang7: $ChenhLechthang7,thang8: $ChenhLechthang8,thang9: $ChenhLechthang9,thang10: $ChenhLechthang10,thang11: $ChenhLechthang11,thang12: $ChenhLechthang12,ghichu:"", pq_rowcls: 'rownotsave' };
        }

        var $summary = "";

        objmanhomkh.render = function (evt, ui) {
            $summary = $("<div class='pq-grid-summary'  ></div>")
                .prependTo($(".pq-grid-bottom", this));
            calculateSummary();
        }

        objmanhomkh.editorEnd = function (evt, ui) {
            calculateSummary();
            objmanhomkh.refresh.call(this);
        }

        objmanhomkh.load = function (evt, ui) {
            calculateSummary();
            objmanhomkh.refresh.call(this);
        }

        objmanhomkh.refresh = function (evt, ui) {
            var data = [totalData,totalDTThuan,totalLuong,totalBaoHiem,totaltmpLuong,totalChenhLech]; //JSON (array of objects)
            var obj = { data: data, $cont: $summary }
            $(this).pqGrid("createTable", obj);
        }
        var $grid = $("#grid_editing_manhom_makh").pqGrid(objmanhomkh);
        $grid.one("pqgridload", function (evt, ui) {
            $grid.pqGrid( "option", "dataModel.postData", function( ui ){
                var $tennguoidung  = $("#tennguoidung").val();
                var $nam  = $("#nam").val();
                return {tennguoidung:$tennguoidung,nam:$nam};
            } );
            $grid.pqGrid("refreshDataAndView");
        });

        //use refresh & refreshRow events to display jQueryUI buttons and bind events.
        function getRowSelect() { // --------------------Lấy dữ liệu theo dòng trên gird----------------------
            var arr = $("#grid_editing_manhom_makh").pqGrid("selection", {
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
            isEdit = $("#grid_editing_manhom_makh").pqGrid("isDirty"); //Lấy giá trị đang chọn

            return isEdit;
        }

        //-----------------------------Hết lưới---------------------------------------------------------------------
    });
</script>
<div id="dialog-nhommakh"
     title="PHÂN CÔNG KHAI THUẾ VÀ KIỂM SOÁT CHẤT LƯỢNG DỊCH VỤ (ENTER : Sửa,Lưu , F4 : Thêm mới , F7: Sao chép , F8: Xóa , ESC: Thoát">
    <!-- dialog -->
    <div id="tabs" style="padding: 0px;">
        <ul>
            <li><a href="#tabs-0">CHI TIẾT</a></li>
            <li><a href="#tabs-1" id="tab_bangtonghop">TỔNG HỢP</a></li>
        </ul>
        <div id="tabs-0">
            <div id="grid_editing_manhom_makh" style="margin:5px auto;border: 0px !important;"></div>
        </div>
        <div id="tabs-1">
        </div>
    </div>
</div>

