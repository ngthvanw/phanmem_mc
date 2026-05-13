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
    $height = getHeight();
    $width = getWidth() - 50;
    $(function () {
        var $dir_module_ps_mavattu = "";
        $dir_module_ps_mavattu = "modules/psmavattu/";//--------------------------------------------Thay đổi khi copy
        function xoadialog_ps_mavattu() { // ----------------------đóng form 
            reset_dialog(".dialog-ps_mavattu");
            reset_dialog(".dialog_main_psmavt");
        }

        $("#dialog-ps_mavattu").dialog({ // ------------------Gọi dialog
            resizable: false,
            height: $height,
            width: $width,
            modal: true

        });
        $("#dialog-ps_mavattu").keydown(function (event) {//--------------Các phím tắt
            var $grid_pb = $("#grid_editing_ps_mavt").closest('.pq-grid');//---- Lưới----------------
            if (event.keyCode == Keys.F2 || event.keyCode == Keys.F7 || event.keyCode == Keys.F8) {
                var rowSelect = getRowSelect();//------ Lấy đối tượng được chọn
                if (rowSelect == false) {
                    alert_f("Chú Ý", "fa fa-warning", "red", "Bạn cần chọn dữ liệu trước khi thực hiện !");
                }
            }
            var rowEditting = $("#grid_editing_ps_mavt").pqGrid("getRowsByClass", {cls: 'pq-row-edit'});//---Lấy đối tượng đang sửa
            if ($('div').hasClass('jconfirm') == false) {
                if (event.keyCode == Keys.F4) {
                    addRow($grid_pb);
                }
                if (event.keyCode == Keys.F2) {// Sửa
                    if (rowSelect != false) {
                        if (isEditing($grid_pb)) {
                            return false;
                        }
                        var rowIndx = rowSelect[0].rowIndx;
                        editRow(rowIndx, $grid_pb);
                        return false;
                    }
                }
                if (event.keyCode == Keys.F7) { // copy
                    if (rowSelect != false) {

                        var rowIndx = rowSelect[0].rowIndx;
                        var rowData = rowSelect[0].rowData;
                        //---------------Khai báo các cell khi dùng lệnh copy-----------------------------------------
                        //--------------------------------------------Thay đổi khi copy---------------------------------
                        var _dataRow = {
                            mavt: rowData.mavt,
                            tenvt: rowData.tenvt,
                            manhom: rowData.manhom,
                            matk: rowData.matk,
                            quycach: rowData.quycach,
                            dvt: rowData.dvt,
                            dvtp: rowData.dvtp,
                            kl: rowData.kl,
                            kt: rowData.kt,
                            giaban: rowData.giaban,
                            giabansi: rowData.giabansi,
                            giamua: rowData.giamua,
                            rate: rowData.rate,
                            mark: rowData.mark,
                            congvao: rowData.congvao,
                            trura: rowData.trura,
                            dp: rowData.dp,
                            min: rowData.min,
                            max: rowData.max,
                            muc: rowData.muc,
                            ghichu: rowData.ghichu
                        };
                        addRow($grid_pb, _dataRow);
                    }
                }
                if (event.keyCode == Keys.F8) { // Xóa
                    if (rowSelect != false) {
                        if (isEditing($grid_pb)) {
                            return false;
                        }
                        var rowIndx = rowSelect[0].rowIndx;
                        deleteRow(rowIndx, $grid_pb);
                    }
                }
                if (event.keyCode == Keys.F9) { // Lưu
                    if (isEditing($grid_pb)) {
                        var rowIndx = rowEditting[0].rowIndx;
                        update(rowIndx, $grid_pb);
                    }
                }
                if (event.keyCode == Keys.END) { // Hủy bỏ hàng đang xóa
                    if (isEditing($grid_pb)) {
                        var rowIndx = rowEditting[0].rowIndx;
                        $grid_pb.pqGrid("quitEditMode");
                        $grid_pb.pqGrid("removeClass", {rowIndx: rowIndx, cls: 'pq-row-edit'});
                        $grid_pb.pqGrid("refreshRow", {rowIndx: rowIndx});
                        $grid_pb.pqGrid("rollback");
                    }
                }
                if (event.keyCode == Keys.ESCAPE && $('div').hasClass('jconfirm') == false && rowEditting.length < 1) {
                    change_data_quit_ps_mavattu();
                }
            } else {
                return false;
            }
        }); // end phím tắt
        $.contextMenu('destroy');
        $.contextMenu({// Menu chuột phải
            selector: '#grid_editing_ps_mavt',
            build: function ($trigger, e) {
                return {
                    callback: function (key, options) {
                        var $grid_pb = $("#grid_editing_ps_mavt").closest('.pq-grid');
                        var rowSelect = getRowSelect();
                        if (rowSelect == false) {
                            alert_f("Chú Ý", "fa fa-warning", "red", "Bạn cần chọn dữ liệu trước khi thực hiện !");
                        }
                        if (key == "Edit") {
                            if (rowSelect != false) {
                                if (isEditing($grid_pb)) {
                                    return false;
                                }
                                var rowIndx = rowSelect[0].rowIndx;
                                editRow(rowIndx, $grid_pb);
                                return false;
                            }
                        }
                        if (key == "Copy") {
                            var rowIndx = rowSelect[0].rowIndx;
                            //--------------------------------------------Thay đổi khi copy--------------------------
                            var rowData = rowSelect[0].rowData;
                            var _dataRow = {
                                mavt: rowData.mavt,
                                tenvt: rowData.tenvt,
                                manhom: rowData.manhom,
                                matk: rowData.matk,
                                quycach: rowData.quycach,
                                dvt: rowData.dvt,
                                dvtp: rowData.dvtp,
                                kl: rowData.kl,
                                kt: rowData.kt,
                                giaban: rowData.giaban,
                                giabansi: rowData.giabansi,
                                giamua: rowData.giamua,
                                rate: rowData.rate,
                                mark: rowData.mark,
                                congvao: rowData.congvao,
                                trura: rowData.trura,
                                dp: rowData.dp,
                                min: rowData.min,
                                max: rowData.max,
                                muc: rowData.muc,
                                ghichu: rowData.ghichu
                            };
                            addRow($grid_pb, _dataRow);
                        }
                        if (key == "Add") {
                            addRow($grid_pb);
                        }
                        if (key == "Del") {
                            if (rowSelect != false) {
                                if (isEditing($grid_pb)) {
                                    return false;
                                }
                                var rowIndx = rowSelect[0].rowIndx;
                                deleteRow(rowIndx, $grid_pb);
                            }
                        }

                    },
                    items: items
                };
            }
        });
        var m;
        var items = {
            "Add": {
                name: "Thêm (F4)",
                icon: "add"
            },
            "Edit": {
                name: "Sửa (F2)",
                icon: "edit"
            },

            "Copy": {
                name: "Sao Chép (F7)",
                icon: "copy"
            },
            "Del": {
                name: "Xóa (F8) ",
                icon: "delete"
            }
        }; // end right menu
        function change_data_quit_ps_mavattu() { // Cảnh báo thoát khi thay đổi dữ liệu////////////////////////////////////////////////////
            var $grid_pb = $("#grid_editing_ps_mavt").closest('.pq-grid');//---- Lưới----------------
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
                                    xoadialog_ps_mavattu();
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
                                xoadialog_ps_mavattu();
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
                    //$('.dialog_main3').load("form/frm_dm_httk_select.php?idstyle=grid_editing_ps_mavt");
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
                    $('.dialog_main_manhomvt').load("form/frm_dm_manhom_select.php?idstyle=grid_editing_ps_mavt");
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
                                    url: $dir_module_ps_mavattu + "del.php",
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
                var dataIndex = selectCell[0].dataIndx;
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
        function update(rowIndx, $grid) {

            if ($grid.pqGrid("saveEditCell") == false) {
                return false;
            }

            var isValid = $grid.pqGrid("isValid", {rowIndx: rowIndx}).valid;
            if (!isValid) {//Kiểm tra có sửa dữ liệu không
                return false;
            }
            var isDirty = $grid.pqGrid("isDirty");
            if (isDirty) {
                var url,
                    rowData = $grid.pqGrid("getRowData", {rowIndx: rowIndx}),
                    recIndx = $grid.pqGrid("option", "dataModel.recIndx");

                $grid.pqGrid("removeClass", {rowIndx: rowIndx, cls: 'pq-row-edit'});

                if (rowData[recIndx] == null) {
                    //url to add records.
                    url = $dir_module_ps_mavattu + "add.php";
                }
                else {
                    //url to  update records.
                    url = $dir_module_ps_mavattu + "edit.php";
                }
                $.ajax($.extend({}, ajaxObj, {
                    context: $grid,
                    url: url,
                    data: rowData,
                    success: function (response) {
                        var recIndx = this.pqGrid("option", "dataModel.recIndx");
                        if (rowData[recIndx] == null) {
                            rowData[recIndx] = response.recId;
                        }
                        this.pqGrid("removeClass", {rowIndx: rowIndx, cls: 'pq-row-edit'});
                        this.pqGrid("commit");
                        $grid.pqGrid("refreshDataAndView");
                    }
                }));
            } else {
                $grid.pqGrid("quitEditMode");
                $grid.pqGrid("removeClass", {rowIndx: rowIndx, cls: 'pq-row-edit'});
                $grid.pqGrid("refreshRow", {rowIndx: rowIndx});
            }
        }

        //--------------------------------Khai báo lưới---------------------------------------.
        var obj = {
            wrap: false,
            hwrap: false,
            resizable: true,
            columnBorders: true,
            numberCell: {show: true},
            track: true, //to turn on the track changes.
            freezeRows: 1,
            freezeCols: 7,
            sorting: 'local',
            sortIndx: 'mavt',
            sortDir: 'up',
            //flexHeight: true,
            title: null,
            height: $height - 58,
            width: $width - 14,
            toolbar: {
                items: [
                    {
                        type: 'button', icon: 'ui-icon-plus', label: 'Thêm mới(F4)', listeners: [
                        {
                            "click": function (evt, ui) {
                                var $grid = $(this).closest('.pq-grid');
                                addRow($grid);
                            }
                        }
                    ]
                    },
                    {
                        type: 'button', icon: 'ui-icon-circle-close', label: 'Kết thúc', listeners: [
                        {
                            "click": function (evt, ui) {
                                //xoadialog_ps_mavattu();
                                change_data_quit_ps_mavattu();
                            }
                        }
                    ]
                    }
                ]
            },
            scrollModel: {
                autoFit: true
            },
            selectionModel: {type: 'cell', mode: 'single'},
            filterModel: {
                on: true,
                mode: "AND",
                header: true
            }, // lọc dữ liệu trên header
            hoverMode: 'cell',
            editModel: {
                //onBlur: 'validate',
                saveKey: $.ui.keyCode.ENTER
            },
            editor: {type: 'textbox', select: true,},
            validation: {
                icon: 'ui-icon-info'
            },
            colModel: [//-------------------------------------------Khai báo các cột trong lưới-----------------------
                {title: "SoTT", dataType: "integer", dataIndx: "sott", editable: false, width: 0, hidden: true},
                {
                    title: "Sửa|Xóa",
                    editable: false,
                    minWidth: 65,
                    align: "center",
                    sortable: false,
                    render: function (ui) {
                        return "<button type='button' class='edit_btn'></button>\
                            <button type='button' class='delete_btn'></button>";
                    }
                },
                {
                    title: "Mã VT", dataType: "string", dataIndx: "mavt", minWidth: 150, sortable: true,
                    validations: [
                        {
                            type: 'minLen',
                            value: 2,
                            msg: "Mã vật tư phải có từ 2 ký tự đến 14 ! Nhập vào 00 để mã vật tư tự phát sinh !"
                        },
                        {
                            type: 'maxLen',
                            value: 14,
                            msg: "Mã vật tư phải có từ 2 ký tự đến 14 ! Nhập vào 00 để mã vật tư tự phát sinh !"
                        },
                        {
                            type: function (ui) {
                                var value = ui.value,
                                    _found = false, sott = ui.rowData.sott;
                                //remote validation
                                $.ajax({
                                    url: $dir_module_ps_mavattu + "checkkey.php",
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
                    ],
                    filter: {
                        type: 'textbox',
                        condition: 'begin',
                        listeners: ['keyup']
                    }
                },
                {
                    title: "Tên VT", minWidth: 200, dataType: "string", dataIndx: "tenvt",
                    validations: [
                        {type: 'minLen', value: 1, msg: "Tên vật tư hàng hóa không được trống !"}
                    ],
                    filter: {
                        type: 'textbox',
                        condition: 'begin',
                        listeners: ['keyup']
                    }
                },
                {
                    title: "Mã nhóm", minWidth: 150, dataType: "string", align: "left", dataIndx: "manhom",
                    validations: [
                        {type: 'minLen', value: 1, msg: "Mã nhóm không được trống !"},
                    ],
                    editor: {
                        type: manhomvattu_select
                    },
                    filter: {
                        type: "select",
                        condition: 'equal',
                        prepend: {'': '--Tất cả--'},
                        valueIndx: "manhom",
                        labelIndx: "tennhom",
                        listeners: ['change']
                    },
                    render: function (ui) {

                        var tennhom = ui.rowData.tennhom;
                        return tennhom;
                    }
                },
                {title: "Tên nhóm", minWidth: 80, dataType: "string", align: "left", hidden: true, dataIndx: "tennhom"},
                {
                    title: "Mã TK", minWidth: 100, dataType: "integer", dataIndx: "matk",
                    validations: [
                        {
                            type: function (ui) {
                                var value = ui.value;
                                if (value < 151 || value > 159) {
                                    ui.msg = "Mã TK " + value + " phải nằm trong mã TK từ 151 - 159 !";
                                    $('.dialog_main_httk').load("form/frm_dm_httk_mavt_select.php?idstyle=grid_editing_ps_mavt");
                                    return false;
                                }
                            }
                        },
                    ]
                },

                {title: "Quy cách", minWidth: 120, dataType: "string", align: "left", dataIndx: "quycach"},
                {
                    title: "Đơn vị tính", minWidth: 100, dataType: "string", align: "left", dataIndx: "dvt",
                    validations: [
                        {type: 'minLen', value: 1, msg: "Đơn vị tính chính không được trống !"},
                    ]
                },
                {title: "Đơn vị tính phụ", minWidth: 120, dataType: "string", align: "left", dataIndx: "dvtp"},
                {
                    title: "khối lượng", minWidth: 120, dataType: "string", align: "left", dataIndx: "kl",
                    editor: {
                        type: formart_num
                    },
                    validations: [
                        {type: 'maxLen', value: 9, msg: "khối lượng phải nhỏ hơn 10 số !"}
                    ],
                    render: function (ui) {
                        var kl = ui.rowData.kl;
                        return FormatNumber(kl);
                    }
                },
                {
                    title: "kt", minWidth: 120, dataType: "string", align: "left", dataIndx: "kt",
                    editor: {
                        type: formart_num
                    },
                    validations: [
                        {type: 'maxLen', value: 9, msg: "Giá trị hợp đồng phải nhỏ hơn 10 số !"}
                    ],
                    render: function (ui) {
                        var kt = ui.rowData.kt;
                        return FormatNumber(kt);
                    }
                },
                {
                    title: "Giá bán", minWidth: 150, dataType: "string", align: "left", dataIndx: "giaban",
                    editor: {
                        type: formart_num
                    },
                    validations: [
                        {type: 'maxLen', value: 16, msg: "Giá bán phải nhỏ hơn 17 số !"}
                    ],
                    render: function (ui) {
                        var giaban = ui.rowData.giaban;
                        return FormatNumber(giaban);
                    },
                    //filter: { type: 'textbox', condition: "between", listeners: ['keyup'] }
                },
                {
                    title: "Giá bán sỉ", minWidth: 150, dataType: "string", align: "left", dataIndx: "giabansi",
                    editor: {
                        type: formart_num
                    },
                    validations: [
                        {type: 'maxLen', value: 16, msg: "Giá bán sỉ phải nhỏ hơn 17 số !"},
                    ],
                    render: function (ui) {
                        var giabansi = ui.rowData.giabansi;
                        return FormatNumber(giabansi);
                    }
                },
                {
                    title: "Giá vốn", minWidth: 150, dataType: "string", align: "left", dataIndx: "giamua",
                    editor: {
                        type: formart_num
                    },
                    validations: [
                        {type: 'maxLen', value: 16, msg: "Giá mua phải nhỏ hơn 17 số !"},
                    ],
                    render: function (ui) {
                        var giamua = ui.rowData.giamua;
                        return FormatNumber(giamua);
                    }
                },
                {
                    title: "Thuế suất(%)", minWidth: 100, dataType: "integer", align: "left", dataIndx: "rate",
                    validations: [
                        {type: 'minLen', value: 1, msg: "Thuế xuất không được trống !"},
                        {type: 'maxLen', value: 2, msg: "Thuế xuất không được quá 2 số !"}
                    ],
                    render: function (ui) {
                        var rate = ui.rowData.rate;
                        return rate + "%";
                    }
                },
                {
                    title: "Mark", minWidth: 60, dataType: "string", align: "left", dataIndx: "mark",
                    validations: [
                        {type: 'maxLen', value: 1, msg: "Mark không được lớn hơn 1 ký tự !"},
                    ]
                },
                {
                    title: "Cộng vào giá", minWidth: 150, dataType: "string", align: "left", dataIndx: "congvao",
                    editor: {
                        type: formart_num
                    },
                    validations: [
                        {type: 'maxLen', value: 16, msg: "Giá cộng vào phải nhỏ hơn 17 số !"},
                    ],
                    render: function (ui) {
                        var congvao = ui.rowData.congvao;
                        return FormatNumber(congvao);
                    }
                },
                {
                    title: "Trừ ra giá", minWidth: 150, dataType: "string", align: "left", dataIndx: "trura",
                    editor: {
                        type: formart_num
                    },
                    validations: [
                        //{ type: 'maxLen', value: 16, msg: "Giá trừ ra vào phải nhỏ hơn 17 số !" },
                    ],
                    render: function (ui) {
                        var trura = ui.rowData.trura;
                        return FormatNumber(trura);
                    }
                },
                {
                    title: "Chiết khấu (%)", minWidth: 80, dataType: "integer", dataIndx: "dp",
                    validations: [
                        {type: 'maxLen', value: 2, msg: "Chiết khấu phải nhỏ hơn 2 số !"}
                    ],
                    render: function (ui) {
                        var dp = ui.rowData.dp;
                        return dp + "%";
                    }
                },
                {
                    title: "Hạn mức tồn kho nhỏ nhất",
                    minWidth: 150,
                    dataType: "string",
                    align: "left",
                    dataIndx: "min",
                    editor: {
                        type: formart_num
                    },
                    validations: [
                        {type: 'maxLen', value: 10, msg: "Hạn mức tồn kho nhỏ nhất phải nhỏ hơn 11 số !"}
                    ],
                    render: function (ui) {
                        var min = ui.rowData.min;
                        return FormatNumber(min);
                    }
                },
                {
                    title: "Hạn mức tồn kho lớn nhất",
                    minWidth: 150,
                    dataType: "string",
                    align: "left",
                    dataIndx: "max",
                    editor: {
                        type: formart_num
                    },
                    validations: [
                        {type: 'maxLen', value: 10, msg: "Hạn mức tồn kho lớn nhất phải nhỏ hơn 11 số !"},
                    ],
                    render: function (ui) {
                        var max = ui.rowData.max;
                        return FormatNumber(max);
                    }
                },
                {
                    title: "Mức", minWidth: 150, dataType: "string", align: "left", dataIndx: "muc",
                    editor: {
                        type: formart_num
                    },
                    validations: [
                        {type: 'maxLen', value: 16, msg: "muc phải nhỏ hơn 17 số !"},
                    ],
                    render: function (ui) {
                        var muc = ui.rowData.muc;
                        return FormatNumber(muc);
                    }
                },
                {
                    title: "Chú thích", minWidth: 150, dataType: "string", align: "left", dataIndx: "ghichu",
                    editor: {type: "textarea", attr: "rows=3"}
                }
            ],//-----------------------------------------Kết thúc các cột---------------------------------------
            dataModel: {
                dataType: "JSON",
                location: "remote",
                recIndx: "sott",
                url: $dir_module_ps_mavattu + "list.php",//-- Load danh sách lên lưới
                getData: function (response) {
                    return {data: response.data};
                }
            },
            cellBeforeSave: function (evt, ui) {
                var $grid = $(this);
                var isValid = $grid.pqGrid("isValid", ui);
                if (!isValid.valid) {
                    return false;
                }
            },
            //make rows editable selectively.
            editable: function (ui) {
                var $grid = $(this);
                var rowIndx = ui.rowIndx;
                if ($grid.pqGrid("hasClass", {rowIndx: rowIndx, cls: 'pq-row-edit'}) == true) {
                    return true;
                }
                else {
                    return false;
                }
            }
        };
        var $grid = $("#grid_editing_ps_mavt").pqGrid(obj);
        $grid.one("pqgridload", function (evt, ui) {
            var column = $grid.pqGrid("getColumn", {dataIndx: "manhom"});
            var filter = column.filter;
            filter.cache = null;
            filter.options = $grid.pqGrid("getData", {dataIndx: ["tennhom", "manhom"]});// lấy 1 hoặc nhiều dataindex
            $grid.pqGrid("refreshHeader");
        });
        //use refresh & refreshRow events to display jQueryUI buttons and bind events.
        $grid.on('pqgridrefresh pqgridrefreshrow', function () {
            //debugger;
            var $grid = $(this);
            //delete button
            $grid.find("button.delete_btn").button({icons: {primary: 'ui-icon-close'}})
                .unbind("click")
                .bind("click", function (evt) {
                    if (isEditing($grid)) {
                        return false;
                    }
                    var $tr = $(this).closest("tr"),
                        rowIndx = $grid.pqGrid("getRowIndx", {$tr: $tr}).rowIndx;
                    deleteRow(rowIndx, $grid);
                });
            //edit button
            $grid.find("button.edit_btn").button({icons: {primary: 'ui-icon-pencil'}})
                .unbind("click")
                .bind("click", function (evt) {
                    if (isEditing($grid)) {
                        return false;
                    }
                    var $tr = $(this).closest("tr"),
                        rowIndx = $grid.pqGrid("getRowIndx", {$tr: $tr}).rowIndx;

                    editRow(rowIndx, $grid);
                    return false;
                });

            //rows which were in edit mode before refresh, put them in edit mode again.
            var rows = $grid.pqGrid("getRowsByClass", {cls: 'pq-row-edit'});
            if (rows.length > 0) {
                var rowIndx = rows[0].rowIndx;
                editRow(rowIndx, $grid);
            }
        });
        function getRowSelect() { // --------------------Lấy dữ liệu theo dòng trên gird----------------------                 
            var arr = $("#grid_editing_ps_mavt").pqGrid("selection", {
                type: 'cell',
                method: 'getSelection'
            }); //Lấy giá trị đang chọn
            if (arr && arr.length > 0) {
                return arr;
            } else {
                return false;
            }
        }

        //-----------------------------Hết lưới---------------------------------------------------------------------

    });
</script>
<div id="dialog-ps_mavattu"
     title="Phát sinh vật tư, hàng hóa... (F2: Sửa , F7: Sao chép , F8: Xóa , F9: Lưu , END : Hủy dòng đang sửa)">
    <!-- dialog -->
    <div id="grid_editing_ps_mavt" style="margin:5px auto;border: 0px !important;"></div>
</div>