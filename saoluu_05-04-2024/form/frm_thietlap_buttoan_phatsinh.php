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
    tr td.mauhong{
        background-color:rgba(143,230,74,0.53);
    }

</style>
<script>
    $height = getHeight();
    $width = getWidth() - 50;
    $(function () {
        //$('#dialog-buttoan_phatsinh').find('button').first().focus();
        var $dir_module_ketoantonghop = "";
        $dir_module_ketoantonghop = "modules/ketoantonghop/";//--------------------------------------------Thay đổi khi copy
        $dir_module_httk = "modules/httk/";//--------------------------------------------Thay đổi khi copy
        function xoadialog_makh() { // ----------------------đóng form 
            reset_dialog(".dialog-buttoan_phatsinh");
            reset_dialog(".dialog_main_thietlap_buttoan_phatsinh");
        }

        $("#dialog-buttoan_phatsinh").dialog({ // ------------------Gọi dialog
            resizable: false,
            height: $height,
            width: $width,
            modal: true

        });
        $("#dialog-buttoan_phatsinh").keydown(function (event) {//--------------Các phím tắt
            var $grid_pb = $("#grid_editing_buttoan_phatsinh").closest('.pq-grid');//---- Lưới----------------
            if (event.keyCode == Keys.F7 || event.keyCode == Keys.F8) {
                var rowSelect = getRowSelect();//------ Lấy đối tượng được chọn
                if (rowSelect == false) {
                    alert_f("Chú Ý", "fa fa-warning", "red", "Bạn cần chọn dữ liệu trước khi thực hiện !");
                }
            }
            var rowEditting = $("#grid_editing_buttoan_phatsinh").pqGrid("getRowsByClass", {cls: 'pq-row-edit'});//---Lấy đối tượng đang sửa
            if ($('div').hasClass('jconfirm') == false) {
                if (event.keyCode == Keys.F2) {
                    $confirm = confirm("Bạn chuẩn bị xoá dữ liệu . Bạn có chắn chắn không ?");
                    if($confirm){
                        $.ajax({
                            url: $dir_module_ketoantonghop + "xoasotien.php",
                            async: false,
                            success: function (response) {
                                $("#grid_editing_buttoan_phatsinh").pqGrid("refreshDataAndView");
                                $("#grid_editing_buttoan_phatsinh .pq-search-hd-field").focus();
                            }
                        });
                    }
                }
                if (event.keyCode == Keys.F4) {
                    var rowSelect = getRowSelect();//------ Lấy đối tượng được chọn
                    if(rowSelect==false){
                        rowIndx=-1;
                    }else{
                        var rowIndx = rowSelect[0].rowIndx;
                    }
                    addRow(rowIndx + 1, 'maso', $grid_pb, _dataRow);
                }
                if (event.keyCode == Keys.F7) { // copy
                    if (rowSelect != false) {

                        var rowIndx = rowSelect[0].rowIndx;
                        var rowData = rowSelect[0].rowData;
                        //---------------Khai báo các cell khi dùng lệnh copy-----------------------------------------
                        //--------------------------------------------Thay đổi khi copy---------------------------------
                        var _dataRow = {
                            maso: rowData.maso,
                            noidung: rowData.noidung,
                            tkchinh: rowData.tkchinh,
                            tkno: rowData.tkno,
                            tkco: rowData.tkco,
                            sotien: 0,
                            phantram: rowData.phantram,
                            mabp: rowData.mabp
                        };
                        addRow(rowIndx + 1, 'maso', $grid_pb, _dataRow);
                    }
                }
                if (event.keyCode == Keys.F8) { // Xóa
                    if (rowSelect != false) {
                        if (isEditing($grid_pb)) {
                            return false;
                        }
                        var rowData = rowSelect[0].rowData;
                        deleteRow(rowData, $grid_pb);
                        $grid_pb.pqGrid("refreshDataAndView");
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
            var $grid_pb = $("#grid_editing_buttoan_phatsinh").closest('.pq-grid');//---- Lưới----------------
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
                    $('.dialog_main_httk').load("form/frm_dm_httk_select.php?idstyle=grid_editing_buttoan_phatsinh");
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
        function addRow(rowIndx, $name='maso', $grid, $obj_addrow="") {
            //append empty row in the first row.     
            $ma = "";
            if ($obj_addrow != "") {
                var rowData = $obj_addrow;
            } else {
                var rowData = {maso: "", noidung: "", tkchinh: "", tkno: "", tkco: "", sotien: 0,phamtram:1, mabp: "0001"}; //empty row template
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
            var ma = rowData.maso;
            var sott = rowData.sott;
            if ($('div').hasClass('jconfirm') == false) {
                if(ma=="KCLNNT" || ma=="KCLONT" || ma=="KCTNDN" || ma=="KCLAKD" || ma=="KCLOKD" || ma=="KCTHDN" || rowData.maso=="KCCPBH"|| rowData.maso=="KCCPKD"|| rowData.maso=="KCTNKC"|| rowData.maso=="KCCPHD"){
                    alert("Mã số này không được xóa ! Vui lòng chọn mã khác !");
                    return false;
                }
                $.confirm({
                    title: "Chú ý", icon: "fa fa-times-circle", type: "red",
                    content: "Bạn có muốn xóa hàng có mã " + (ma) + "  không ?" + '<br/>Nhấn phím <strong style="color:blue;">[Y]</strong> để đồng ý phím <strong style="color:red;">[N]</strong> để hủy bỏ ',
                    buttons: {
                        "Đồng ý": {
                            keys: ['Y'], action: function () {
                                $.ajax($.extend({}, ajaxObj, {
                                    context: $grid,
                                    url: $dir_module_ketoantonghop + "delbtps.php",
                                    data: {id: sott, ma: ma},
                                    success: function (result) {
                                        this.pqGrid("commit");
                                        $("#grid_editing_buttoan_phatsinh").pqGrid("refreshDataAndView");
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
            virtualX: true, virtualY: false,
            height: $height - 58,
            width: $width - 20,
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
                    type = obj.type,
                    rowData = obj.rowData;

                var url = "";
                if (type == 'update') {
                    var valid = grid.isValid({rowData: rowData, allowInvalid: true}).valid;
                    if (valid) {
                        if (rowData[recIndx] == null) {
                            url = $dir_module_ketoantonghop + "addbtps.php";
                        }
                        else {
                            url = $dir_module_ketoantonghop + "editbtps.php";
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
                        },
                    });
                }
            },
            colModel: [//-------------------------------------------Khai báo các cột trong lưới-----------------------
                {title: "Số TT", dataType: "integer", dataIndx: "sott", minWidth: 30, editable: false,hidden:true,},
                {
                    title: "Tự động", minWidth: 30, dataType: "integer", align: "center", dataIndx: "tudong",
                    editor: {type: "select",options: function (ui) {
                        //remote validation
                        var parsedJson = [ { 0:"KHÔNG"}, {1: "CÓ"}] ;
                        return parsedJson;
                    }},
                    render: function (ui) {
                        var value = ui.rowData.tudong;
                        if (value == 1) {
                            return "CÓ";
                        } else {
                            return "KHÔNG";
                        }
                    }
                },
                {
                    title: "Mã số", dataType: "string", dataIndx: "maso", minWidth: 60, sortable: true,
                    validations: [
                        {type: 'minLen', value: 5, msg: "Mã số không được nhở hơn 5 ký tự !"},
                        {type: 'maxLen', value: 6, msg: "Mã số phải không được quá 6 ký tự !"},
                        {
                            type: function (ui) {
                                isEdit = isEditCell();
                                if (isEdit) {
                                    var value = ui.value,
                                        _found = false, sott = ui.rowData.sott;
                                    $.ajax({
                                        url: $dir_module_ketoantonghop + "checkkeybtps.php",
                                        data: {'id': value, 'sott': sott},
                                        async: false,
                                        success: function (response) {
                                            if (response == 1) {
                                                _found = true;
                                            }
                                        }
                                    });
                                    if (_found) {
                                        ui.msg = value + " đã tồn tại trong hệ thống";
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
                    editable: function (ui) {
                        var rowData = ui.rowData,
                            dataIndx = ui.dataIndx;
                        //make cell read only if country in this row is present in countries list.
                        if (rowData.maso== "KCLNNT" || rowData.maso== "KCLONT" || rowData.maso== "KCTNDN" || rowData.maso== "KCLAKD" || rowData.maso== "KCLOKD" || rowData.maso=="KCTHDN" || rowData.maso=="KCCPBH"|| rowData.maso=="KCCPBH"|| rowData.maso=="KCCPKD"|| rowData.maso=="KCTNKC"|| rowData.maso=="KCCPHD" || rowData.maso=="KCNSDN") {//if change is negative.
                            return false;
                        }
                        else {
                            return true;
                        }
                    },
                    render: function (ui) {
                        var rowData = ui.rowData,
                            dataIndx = ui.dataIndx;

                        rowData.pq_cellcls = rowData.pq_cellcls || {};
                        if (rowData.maso== "KCLNNT" || rowData.maso== "KCLONT" || rowData.maso== "KCTNDN" || rowData.maso== "KCLAKD" || rowData.maso== "KCLOKD" || rowData.maso=="KCTHDN" || rowData.maso=="KCCPBH"|| rowData.maso=="KCCPHT"|| rowData.maso=="KCCPKD"|| rowData.maso=="KCTNKC"|| rowData.maso=="KCCPHD" || rowData.maso=="KCNSDN") {//if change is negative.
                            rowData.pq_cellcls[dataIndx] = 'mauhong';
                            return rowData.mand;
                        }
                        else { //if change >= 0
                            return  rowData.mand;
                        }
                    }
                },
                {
                    title: "Nội dung", minWidth: 300, dataType: "string", dataIndx: "noidung",
                    filter: {
                        type: 'textbox',
                        condition: 'begin',
                        listeners: ['keyup']
                    }
                },
                {
                    title: "TK chính", minWidth: 30, dataType: "string", dataIndx: "tkchinh",
                    validations: [
                        {type: 'minLen', value: 1, msg: "Tên tài khoản không được trống !"}
                    ]
                },
                {
                    title: "TK có", minWidth: 30, dataType: "integer", dataIndx: "tkco"},
                {
                    title: "TK nợ", minWidth: 30, dataType: "integer", align: "left", dataIndx: "tkno"},
                {
                    title: "Số tiền", minWidth: 100, dataType: "string", align: "right", dataIndx: "sotien",editable: false,
                    render: function (ui) {// Tính toán Tiền thuế và đưa lên lưới
                        $sotien = ui.rowData.sotien;
                        return $.number($sotien) ;
                    }
                },
                {title: "Phần trăm", minWidth: 100, dataType: "float", align: "right", dataIndx: "phantram"}
                ,
                {title: "Mã BP", minWidth: 40, dataType: "string", align: "left", dataIndx: "mabp"},
            ],//-----------------------------------------Kết thúc các cột--------------------------------------
            pageModel: {type: "local", rPP: 300, strRpp: "{0}", strDisplay: "{0} to {1} của {2}"},
            dataModel: {
                dataType: "JSON",
                location: "remote",
                recIndx: "sott",
                url: $dir_module_ketoantonghop + "listbtps.php",//-- Load danh sách lên lưới
                getData: function (dataJSON) {
                    var data = dataJSON.data;
                    return {curPage: dataJSON.curPage, totalRecords: dataJSON.totalRecords, data: data};
                }
            }
        };
        var $grid = $("#grid_editing_buttoan_phatsinh").pqGrid(obj);

        //use refresh & refreshRow events to display jQueryUI buttons and bind events. 
        function getRowSelect() { // --------------------Lấy dữ liệu theo dòng trên gird----------------------                 
            var arr = $("#grid_editing_buttoan_phatsinh").pqGrid("selection", {
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
            isEdit = $("#grid_editing_buttoan_phatsinh").pqGrid("isDirty"); //Lấy giá trị đang chọn

            return isEdit;
        }

        setTimeout(function () {
            $("#grid_editing_buttoan_phatsinh .pq-search-hd-field").focus();
        }, 100);
        //-----------------------------Hết lưới---------------------------------------------------------------------

    });
</script>
<div id="dialog-buttoan_phatsinh" title="THIẾT LẬP BÚT TOÁN PHÁT SINH (F2: Xóa số tiền , F4: Thêm mới  , F7: Sao chép , F8: Xóa )">
    <!-- dialog -->
    <div id="grid_editing_buttoan_phatsinh" style="margin:5px auto;border: 0px !important;"></div>
</div>