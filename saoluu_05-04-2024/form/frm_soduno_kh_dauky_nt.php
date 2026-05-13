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

    tr td.mauhong {
        background-color:rgba(143,230,74,0.53);
    }
    tr.green td { background: lightgreen;}
</style>
<script>
    $height = getHeight();
    $width = getWidth() - 50;
    $(function () {
        //$('#dialog-soduno_khachhang').find('button').first().focus();
        var $dir_module_makh = "";
        $dir_module_makh = "modules/makhachhang/";//--------------------------------------------Thay đổi khi copy
        $dir_module_httk = "modules/httk/";//--------------------------------------------Thay đổi khi copy
        function xoadialog_makh() { // ----------------------đóng form 
            reset_dialog(".dialog-soduno_khachhang");
            reset_dialog(".dialog_main_soduno_kh_dauky");
        }

        $("#dialog-soduno_khachhang").dialog({ // ------------------Gọi dialog
            resizable: false,
            height: $height,
            width: $width,
            modal: true

        });
        $("#dialog-soduno_khachhang").keydown(function (event) {//--------------Các phím tắt
            var $grid_pb = $("#grid_editing_soduno_kh_dauky").closest('.pq-grid');//---- Lưới----------------
            if (event.keyCode == Keys.F7 || event.keyCode == Keys.F8) {
                var rowSelect = getRowSelect();//------ Lấy đối tượng được chọn
                if (rowSelect == false) {
                    alert_f("Chú Ý", "fa fa-warning", "red", "Bạn cần chọn dữ liệu trước khi thực hiện !");
                }
            }
            var rowEditting = $("#grid_editing_soduno_kh_dauky").pqGrid("getRowsByClass", {cls: 'pq-row-edit'});//---Lấy đối tượng đang sửa
            if ($('div').hasClass('jconfirm') == false) {
                if (event.keyCode == Keys.F8) { // Xóa
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
        function change_data_quit_makh() { // Cảnh báo thoát khi thay đổi dữ liệu////////////////////////////////////////////////////
            var $grid_pb = $("#grid_editing_soduno_kh_dauky").closest('.pq-grid');//---- Lưới----------------
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
                    $('.dialog_main_httk').load("form/frm_dm_httk_select.php?idstyle=grid_editing_soduno_kh_dauky");
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
            if ($obj_addrow != "") {
                var rowData = $obj_addrow;
            } else {
                var rowData = {
                    makh: "",
                    masothue: "",
                    tenkh: "",
                    makhcha: "",
                    dienthoai: "",
                    diachi: "",
                    ngaytra: "0000-00-00",
                    ghichu: ""
                }; //empty row template
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
                                    url: $dir_module_makh + "delnodk.php",
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

        function ThanhTien($SoLuong, $DonGia, $ThanhTienNhap) {
            $ThanhTien = Math.round($SoLuong * $DonGia); // Tiền thuế = Thành tiền * % thuế xuất (Làm tròn tiền thuế)
            if ($ThanhTienNhap == 0 || $ThanhTienNhap == $ThanhTien || $ThanhTienNhap == "" || isNaN($ThanhTienNhap) == true) {
                return $ThanhTien
            } else {
                return $ThanhTienNhap;
            }
        }

        //---------------------------Cập nhật row-----------------------------------------

        //--------------------------------Khai báo lưới---------------------------------------.
        var objmakhdk = {
            hwrap: true,
            //resizable: true,
            rowBorders: true,
            virtualX: true, virtualY: false,
            height: $height - 58,
            width: $width - 28,
            freezeCols:4,
            //virtualX: true,
            numberCell: {show: true},
            filterModel: {on: true, mode: "AND", header: true},
            trackModel: {on: true}, //to turn on the track changes.
            scrollModel: {
                autoFit: true
            },
            historyModel: {
                checkEditableAdd: true
            },
            toolbar: {
                items: [
                    { type: "<label for='wrapText'>Chọn TK công nợ &nbsp;&nbsp;&nbsp;&nbsp;</label>" },
                    { type: 'select', style: 'margin-right:5px;',options:  function (ui) {
                            var $TKCongNo = "";
                            $.ajax({// Kiểm tra mã tk có trông bản hay không
                                url: $dir_module_httk + "loadTKCongNo.php",
                                async: false,
                                success: function (response) {
                                    $TKCongNo = $.parseJSON(response);
                                }
                            });
                            return $TKCongNo;
                        }, attr: 'id=matkcongno', listeners: [
                            {
                                change: function (evt) {
                                    $grid.pqGrid( "option", "dataModel.postData", function( ui ){
                                        var $matkcongno  = $("#matkcongno").val();
                                        var $checkxemtatca = $("#xemtatca").prop("checked");
                                        var $checkxemchitietno = $("#xemchitietno").prop("checked");
                                        if($checkxemtatca==true){
                                            $xemtatca = 1;
                                        }else{
                                            $xemtatca = 0;
                                        }

                                        if($checkxemchitietno==true){
                                            $xemchitietno = 1;
                                        }else{
                                            $xemchitietno = 0;
                                        }
                                        return {xemtatca: $xemtatca,xemchitiet: $xemchitietno, tkcongno:$matkcongno,loaitien:'NT'};
                                    } );
                                    $grid.pqGrid("refreshDataAndView");
                                }
                            }
                        ]
                    },
                    { type: 'checkbox', style: 'margin-right:5px;', attr: 'id=xemchitietno checked=true', listeners: [
                            {
                                change: function (evt) {
                                    if ($(this).is(":checked")) {
                                        $grid.pqGrid( "option", "dataModel.postData", function( ui ){
                                            $("#xemtatca").prop("checked",false);
                                            $matkcongno  = $("#matkcongno").val();
                                            return {xemtatca: "0",xemchitiet: "1",tkcongno:$matkcongno,loaitien:'NT'};
                                        } );
                                    }
                                    else {
                                        $grid.pqGrid( "option", "dataModel.postData", function( ui ){
                                            $("#xemtatca").prop("checked",false);
                                            $matkcongno  = $("#matkcongno").val();
                                            return {xemtatca: "0",xemchitiet: "0",tkcongno:$matkcongno,loaitien:'NT'};
                                        } );
                                    }
                                    $grid.pqGrid("refreshDataAndView");
                                }
                            }
                        ]
                    },
                    { type: "<label for='wrapText'>Xem chi tiết công nợ&nbsp;&nbsp;&nbsp;&nbsp;</label>" },
                    { type: 'checkbox', style: 'margin-right:5px;', attr: 'id=xemtatca ', listeners: [
                            {
                                change: function (evt) {
                                    if ($(this).is(":checked")) {
                                        $grid.pqGrid( "option", "dataModel.postData", function( ui ){
                                            $("#xemchitietno").prop("checked",true);
                                            $matkcongno  = $("#matkcongno").val();
                                            return {xemtatca: "1",xemchitiet: "1",tkcongno:$matkcongno,loaitien:'NT'};
                                        } );
                                    }
                                    else {
                                        $grid.pqGrid( "option", "dataModel.postData", function( ui ){
                                            $("#xemchitietno").prop("checked",true);
                                            $matkcongno  = $("#matkcongno").val();
                                            return {xemtatca: "0",xemchitiet: "1",tkcongno:$matkcongno,loaitien:'NT'};
                                        } );
                                    }
                                    $grid.pqGrid("refreshDataAndView");
                                }
                            }
                        ]
                    },
                    { type: "<label for='wrapText'>Xem tất cả không theo cấp&nbsp;&nbsp;&nbsp;</label>" },
                    {
                        type: 'button',
                        label: "Xuất Excel",
                        icon: 'ui-icon-document',
                        listeners: [{
                            "click": function (evt) {
                                $("#grid_editing_soduno_kh_dauky").pqGrid("exportCsv", { url: "export_xuatexcel.php" });
                            }
                        }]
                    }
                ]
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

                var obj = rowList[0],
                    rowIndx = obj.rowIndx,
                    newRow = obj.newRow,
                    oldRow = obj.oldRow,
                    type = obj.type,
                    rowData = obj.rowData;
                try {
                    $tygiapt = parseFloat(rowData.tygiapt.toString().toString().split(",").join(""));// Lấy số lượng nhập vào
                    $tygiaptr = parseFloat(rowData.tygiaptr.toString().toString().split(",").join(""));// Lấy số lượng nhập vào

                    $thanhtienntpt = parseFloat(rowData.thanhtienntpt.toString().toString().split(",").join(""));// Lấy đơn giá nhập vào
                    $thanhtienntptr = parseFloat(rowData.thanhtienntptr.toString().toString().split(",").join(""));// Lấy đơn giá nhập vào

                    $tienvnptnhap = parseFloat(rowData.sdkno.toString().split(",").join(""));// Lấy đơn giá nhập vào
                    $tienvnptrnhap = parseFloat(rowData.sdkco.toString().split(",").join(""));// Lấy đơn giá nhập vào

                    $tygiaptcu = oldRow.tygiapt;
                    $tygiaptmoi = newRow.tygiapt;

                    $thanhtienntptcu = oldRow.thanhtienntpt;
                    $thanhtienntptmoi = newRow.thanhtienntpt;

                    if (($tygiaptcu != $tygiaptmoi) || $thanhtienntptcu != $thanhtienntptmoi) {
                        $tienvnptnhap = 0;
                    }

                    $tygiaptrcu = oldRow.tygiaptr;
                    $tygiaptrmoi = newRow.tygiaptr;

                    $thanhtienntptrcu = oldRow.thanhtienntptr;
                    $thanhtienntptrmoi = newRow.thanhtienntptr;

                    if (($tygiaptrcu != $tygiaptrmoi) || $thanhtienntptrcu != $thanhtienntptrmoi) {
                        $tienvnptrnhap = 0;
                    }


                    rowData.sdkno = Math.round(ThanhTien($tygiapt, $thanhtienntpt, $tienvnptnhap));
                    rowData.sdkco = Math.round(ThanhTien($tygiaptr, $thanhtienntptr, $tienvnptrnhap));
                }catch (e){

                }

                var url = "";
                if (type == 'update') {
                    var valid = grid.isValid({rowData: rowData, allowInvalid: true}).valid;
                    if (valid) {
                        if (rowData[recIndx] == null) {
                            url = $dir_module_makh + "addsddk.php";
                        }
                        else {
                            url = $dir_module_makh + "editsddk.php";
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
                            var colM = $("#grid_editing_soduno_kh_dauky").pqGrid("option", "colModel");
                            colM[1].editable = false;
                            $("#grid_editing_soduno_kh_dauky").pqGrid("option", "colModel", colM);
                        },
                    });
                }
            },
            colModel: [//-------------------------------------------Khai báo các cột trong lưới-----------------------
                {title: "Số TT", dataType: "integer", dataIndx: "sott", editable: false, width: 0, hidden: true},
                {
                    title: "Mã KH", dataType: "string", dataIndx: "makh", minWidth: 100, sortable: true,editable: true,
                    validations: [
                        {type: 'minLen', value: 2, msg: "Mã tài khoản phải có 2 đến 14 ký tự !"},
                        {type: 'maxLen', value: 14, msg: "Mã tài khoản phải có 2 đến 14 ký tự !"},
                    ],
                    filter: {
                        type: 'textbox',
                        condition: 'begin',
                        listeners: ['keyup']
                    },
                    render: function (ui) {
                        var rowData = ui.rowData,
                            dataIndx = ui.dataIndx;

                        rowData.pq_cellcls = rowData.pq_cellcls || {};
                        if (rowData.makhcha == 0) {//if change is negative.
                            rowData.pq_cellcls[dataIndx] = 'mauhong';
                            return rowData.makh;
                        }
                        else { //if change >= 0
                            return rowData.makh;
                        }
                    }
                },
                {
                    title: "Mã số thuế", minWidth: 120, dataType: "string", dataIndx: "masothue",editable: true,
                    filter: {
                        type: 'textbox',
                        condition: 'begin',
                        listeners: ['keyup']
                    }
                },
                {
                    title: "Tên KH", minWidth: 300, dataType: "string", dataIndx: "tenkh",editable: true,
                    validations: [
                        {type: 'minLen', value: 1, msg: "Tên tài khoản không được trống !"}
                    ],
                    filter: {
                        type: 'textbox',
                        condition: 'begin',
                        listeners: ['keyup']
                    }
                },
                {
                    title: "Tỷ giá PT", minWidth: 120, dataType: "integer", dataIndx: "tygiapt", align: "right",
                    render: function (ui) {
                        var $value = ui.rowData.tygiapt;
                        return $.number($value, 0, ".", ",");
                    }
                },
                {
                    title: "Tiền NT PT", minWidth: 120, dataType: "float", dataIndx: "thanhtienntpt", align: "right",
                    render: function (ui) {
                        var $value = ui.rowData.thanhtienntpt;
                        return $.number($value, 3, ".", ",");
                    }
                },
                {
                    title: "Tiền VN phải thu", minWidth: 120, dataType: "integer", dataIndx: "sdkno", align: "right",
                    render: function (ui) {
                        var $value = ui.rowData.sdkno;
                        return $.number($value, 0, ".", ",");
                    }
                },
                {
                    title: "Tỷ giá PTr", minWidth: 120, dataType: "integer", dataIndx: "tygiaptr", align: "right",
                    render: function (ui) {
                        var $value = ui.rowData.tygiaptr;
                        return $.number($value, 0, ".", ",");
                    }
                },
                {
                    title: "Tiền NT PTr", minWidth: 120, dataType: "float", dataIndx: "thanhtienntptr", align: "right",
                    render: function (ui) {
                        var $value = ui.rowData.thanhtienntptr;
                        return $.number($value, 3, ".", ",");
                    }
                },
                {
                    title: "Tiền VN phải trả", minWidth: 120, dataType: "integer", dataIndx: "sdkco", align: "right",
                    render: function (ui) {
                        var $value = ui.rowData.sdkco;
                        return $.number($value, 0, ".", ",");
                    }
                },
                {
                    title: "Mã TK", minWidth: 100, dataType: "string", dataIndx: "matk",
                    validations: [
                        {type: 'maxLen', value: 6, msg: "Mã tài khoản phải ít hơn 6 số !"},
                        {
                            type: function (ui) {
                                isEdit = isEditCell();
                                if (isEdit) {
                                    var value = ui.value;
                                    sott = ui.rowData.sott;
                                    _found = false;
                                    $.ajax({// Kiểm tra mã tk có trông bản hay không
                                        url: $dir_module_httk + "checkkeytontai.php",
                                        data: {'id': value, 'sott': sott},
                                        async: false,
                                        success: function (response) {
                                            if (response == 1) {
                                                _found = true;
                                            }
                                        }
                                    });

                                    if (_found == false && value != "") {

                                        //$('.dialog_main_httk').load("form/frm_dm_httk_select.php?idstyle=grid_editing_soduno_kh_dauky_select");
                                        ui.msg = "Mã TK " + value + " không nằm trong bảng hệ thống tài khoản !";
                                        return false;
                                    }
                                }
                            }
                        }
                    ],
                    editor: {
                        type: 'number'
                    }
                },
                {
                    title: "Mã KH cha", minWidth: 80, dataType: "string", align: "left", dataIndx: "makhcha",editable: true,
                    validations: [
                        {type: 'minLen', value: 1, msg: "Mã khách hàng cha không được trống !"},
                        {
                            type: function (ui) {
                                isEdit = isEditCell();
                                if (isEdit) {
                                    var value = ui.value,
                                        _found = false, sott = ui.rowData.sott;
                                    //remote validation
                                    $.ajax({
                                        url: $dir_module_makh + "checkkeycha.php",
                                        data: {'id': value, 'sott': sott},
                                        async: false,
                                        success: function (response) {
                                            if (response == 1) {
                                                _found = true;
                                            }
                                        }
                                    });
                                    if (_found) {
                                        ui.msg = value + " không tồn tại trong hệ thống";
                                        return false;
                                    }
                                }
                            }
                        }
                    ],
                    filter: {
                        type: 'textbox',
                        condition: 'begin',
                        listeners: ['keyup']
                    },
                },
                {title: "Địa chỉ", minWidth: 250, dataType: "string", align: "left", dataIndx: "diachi",editable: true,},
                {title: "Điện thoại", minWidth: 100, dataType: "string", align: "left", dataIndx: "dienthoai",editable: true,},
                {
                    title: "Chú thích", minWidth: 150, dataType: "string", align: "left", dataIndx: "ghichu",
                    editor: {type: "textarea", attr: "rows=3"}
                },
                {
                    title: "Loại Tiền tệ", minWidth: 60, dataType: "string", align: "center", dataIndx: "loaitien",editable: false,
                    editor: {type: "select", options: [{"VND": "VIỆT NAM ĐỒNG"}, {"AUD": "ÚC -DOLLAR"}, {"CAD": "CANADA - DOLLAR"}, {"EUR": "EURO"}, {"GBP": "ANH - BẢNG"}, {"JPY": "NHẬT - YÊN"}, {"KRW": "HÀN QUỐC - WON	"}, {"SGD": "SINGAPORE - DOLLAR"}, {"USD": "MỸ - DOLLAR"}]},
                    render: function (ui) {
                        var $value = ui.rowData.loaitien;
                        if ($value == "VND") {
                            return "VIỆT NAM ĐỒNG";
                        } else if ($value == "AUD") {
                            return "ÚC - DOLLAR";
                        }else if ($value == "CAD") {
                            return "CANADA - DOLLAR";
                        }else if ($value == "EUR") {
                            return "EURO";
                        }else if ($value == "GBP") {
                            return "ANH - BẢNG";
                        }else if ($value == "JPY") {
                            return "NHẬT - YÊN";
                        }else if ($value == "KRW") {
                            return "HÀN QUỐC - WON";
                        }else if ($value == "SGD") {
                            return "SINGAPORE DOLLAR";
                        }else if ($value == "USD") {
                            return "MỸ - DOLLAR";
                        }
                    }
                }
            ],//-----------------------------------------Kết thúc các cột---------------------------------------
            pageModel: {type: "local", rPP: 200, strRpp: "{0}", strDisplay: "{0} đến {1} của {2}"},
            dataModel: {
                dataType: "JSON",
                location: "remote",
                recIndx: "sott",
                postData: {xemchitiet: "1",loaitien:"NT"},
                url: $dir_module_makh + "listnodk.php",//-- Load danh sách lên lưới
                getData: function (dataJSON) {
                    var data = dataJSON.data;
                    return {curPage: dataJSON.curPage, totalRecords: dataJSON.totalRecords, data: data};
                }
            }
        };
        function calculateSummary() {
            arrayData = tongtiendauky();
            $TongPhaiThu = arrayData.data.TongPhaiThu;
            $TongPhaiTra = arrayData.data.TongPhaiTra;
            $TongNTPhaiThu = arrayData.data.TongNTPhaiThu;
            $TongNTPhaiTra = arrayData.data.TongNTPhaiTra;
            totalData = { tenkh: "<b>TỔNG CỘNG</b>", sdkno: $TongPhaiThu, sdkco: $TongPhaiTra, thanhtienntpt: $TongNTPhaiThu, thanhtienntptr: $TongNTPhaiTra, pq_rowcls: 'green' };
        }

        var $summary = "";

        objmakhdk.render = function (evt, ui) {
            $summary = $("<div class='pq-grid-summary'  ></div>")
                .prependTo($(".pq-grid-bottom", this));
            calculateSummary();
        }

        objmakhdk.editorEnd = function (evt, ui) {
            calculateSummary();
            objmakhdk.refresh.call(this);
        }

        objmakhdk.load = function (evt, ui) {
            calculateSummary();
            objmakhdk.refresh.call(this);
        }

        objmakhdk.refresh = function (evt, ui) {
            var data = [totalData]; //JSON (array of objects)
            var objmakhdk = { data: data, $cont: $summary }
            $(this).pqGrid("createTable", objmakhdk);
        }

        var $grid = $("#grid_editing_soduno_kh_dauky").pqGrid(objmakhdk);

        $grid.one("pqgridload", function (evt, ui) {
            $("#grid_editing_soduno_kh_dauky .pq-search-hd-field").focus();
        });

        function tongtiendauky() {
            $data=""
            $.ajax({// Kiểm tra xem STT có tồn tại hay không
                url: $dir_module_makh + "tongtiendauky.php",
                data: {loaitien:"NT"},
                async: false,
                success: function (response) {
                    $data = $.parseJSON(response);
                }
            });
            return $data;
        }

        //use refresh & refreshRow events to display jQueryUI buttons and bind events. 
        function getRowSelect() { // --------------------Lấy dữ liệu theo dòng trên gird----------------------                 
            var arr = $("#grid_editing_soduno_kh_dauky").pqGrid("selection", {
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
            isEdit = $("#grid_editing_soduno_kh_dauky").pqGrid("isDirty"); //Lấy giá trị đang chọn

            return isEdit;
        }

        //-----------------------------Hết lưới---------------------------------------------------------------------

    });
</script>
<div id="dialog-soduno_khachhang" title="SỐ DƯ NỢ KHÁCH HÀNG ĐẦU KỲ - NGOẠI TỆ (F8: XÓA )">
    <!-- dialog -->
    <div id="grid_editing_soduno_kh_dauky" style="margin:5px auto;border: 0px !important;"></div>
</div>