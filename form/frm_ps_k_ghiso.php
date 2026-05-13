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
        border: 2px dashed #ff0000;
    }

</style>
<script>
    $height = getHeight();
    $width = getWidth() - 50;
    $(function () {
        var $dir_module_ps_k_ghiso = "";
        $dir_module_ps_k_ghiso = "modules/pskghiso/";//--------------------------------------------Thay đổi khi copy
        $dir_module_ps_kt= "modules/pskt/";
        $dir_module_makh = "modules/makhachhang/";
        $dir_module_httk = "modules/httk/";
        function xoadialog_ps_kt() { // ----------------------đóng form
            reset_dialog(".dialog-ps_k_ghiso");
            reset_dialog(".dialog_main_psk_ghiso");
        }

        $("#dialog-ps_k_ghiso").dialog({ // ------------------Gọi dialog
            resizable: false,
            height: $height,
            width: $width,
            modal: true

        });
        $("#dialog-ps_k_ghiso").keydown(function (event) {//--------------Các phím tắt
            var $grid_pb = $("#grid_editing_ps_k_ghiso").closest('.pq-grid');//---- Lưới----------------
            if (event.keyCode == Keys.F2 || event.keyCode == Keys.F7 || event.keyCode == Keys.F8 || event.keyCode == Keys.INSERT) {
                var rowSelect = getRowSelect();//------ Lấy đối tượng được chọn
                if (rowSelect == false) {
                    alert_f("Chú Ý", "fa fa-warning", "red", "Bạn cần chọn dữ liệu trước khi thực hiện !");
                }
            }
            var rowEditting = $("#grid_editing_ps_k_ghiso").pqGrid("getRowsByClass", {cls: 'pq-row-edit'});//---Lấy đối tượng đang sửa
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
                            lp: rowData.lp,
                            makh: rowData.makh,
                            tkco: rowData.tkco,
                            tenkh: rowData.tenkh,
                            address: rowData.address,
                            masothue: rowData.masothue,
                            loaict: rowData.loaict,
                            mauso: rowData.mauso,
                            seri: rowData.seri,
                            sct: rowData.sct,
                            ngay: rowData.date,
                            mand: rowData.mand,
                            noidung: rowData.noidung,
                            date: rowData.date,
                            datehd: rowData.datehd,
                            datett: rowData.datett,
                            ghichu: rowData.chuthich
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
                        var sott = update(rowIndx, $grid_pb);
                    }
                }
                if (event.keyCode == Keys.INSERT) { // Lưu và thêm chi tiết phát sinh kế toán
                    if (isEditing($grid_pb)) {
                        var rowIndx = rowEditting[0].rowIndx;
                        update(rowIndx, $grid_pb);
                        var rowData = $grid.pqGrid("getRowData", {rowIndx: rowIndx});
                        var mapskt = rowData.mapskt;
                        $('.dialog_main_chitiet_pskt').load("form/frm_chitiet_ps_k_ghiso.php?sott=" + mapskt);
                    }else{
                        if (rowSelect != false) {
                            var rowData = rowSelect[0].rowData;
                            var mapskt = rowData.mapskt;
                            $('.dialog_main_chitiet_pskt').load("form/frm_chitiet_ps_k_ghiso.php?sott=" + mapskt);
                        }
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
                    change_data_quit_ps_kt();
                }
            } else {
                return false;
            }
        }); // end phím tắt
       /* $.contextMenu('destroy');
        $.contextMenu({// Menu chuột phải
            selector: '#grid_editing_ps_k_ghiso',
            build: function ($trigger, e) {
                return {
                    callback: function (key, options) {
                        var $grid_pb = $("#grid_editing_ps_k_ghiso").closest('.pq-grid');
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
                                lp: rowData.lp,
                                makh: rowData.makh,
                                tenkh: rowData.tenkh,
                                address: rowData.address,
                                masothue: rowData.masothue,
                                loaict: rowData.loaict,
                                mauso: rowData.mauso,
                                seri: rowData.seri,
                                sct: rowData.sct,
                                ngay: rowData.date,
                                mand: rowData.mand,
                                noidung: rowData.noidung,
                                date: rowData.date,
                                datehd: rowData.datehd,
                                datett: rowData.datett,
                                ghichu: rowData.chuthich
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
        }; // end right menu*/
        function change_data_quit_ps_kt() { // Cảnh báo thoát khi thay đổi dữ liệu////////////////////////////////////////////////////
            var $grid_pb = $("#grid_editing_ps_k_ghiso").closest('.pq-grid');//---- Lưới----------------
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
                                    xoadialog_ps_kt();
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
                                xoadialog_ps_kt();
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
                    //$('.dialog_main3').load("form/frm_dm_httk_select.php?idstyle=grid_editing_ps_mavt");
                });
        }
        var manoidung_select = function (ui) {
            var $cell = ui.$cell,
                rowData = ui.rowData,
                dataIndx = ui.dataIndx,
                cls = ui.cls, width = ui.column.minWidth,
                dc = $.trim(rowData[dataIndx]);
            $cell.css('padding', '0');

            var $inp = $("<input type='text'  name='" + dataIndx + "' class='" + cls + " pq-cell-editor pg-cel-define' readonly />")
                .appendTo($cell)
                .val(dc).keypress(function (e) {
                    $('.dialog_main_manoidung').load("form/frm_dm_manoidung_select.php?idstyle=grid_editing_ps_k_ghiso");
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
            var mapskt =1;
            $.ajax({
                url: $dir_module_ps_kt+"taomapskt.php",// tao mã phiếu pskt
                async: false,
                success: function (response) {
                    mapskt = response;
                }
            });

            if ($obj_addrow != "") {
                var rowData = $obj_addrow;
            } else {
                var rowData = {
                    lp: "",
                    makh: "",
                    tkco: 911,
                    tenkh: "",
                    address: "",
                    masothue: "",
                    loaict: "",
                    mauso: "",
                    seri: "",
                    sct: "",
                    ngay: "",
                    mand: "",
                    noidung: "",
                    date: "<?php echo date("Y-m-d") ?>",
                    datehd: "",
                    datett: "",
                    ghichu: ""
                }; //empty row template
            }
            rowData.mapskt = mapskt;
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
                                var ma = rowData.mapskt;

                                $.ajax($.extend({}, ajaxObj, {
                                    context: $grid,
                                    url: $dir_module_ps_k_ghiso + "del.php",
                                    data: {id: sott, ma: ma},
                                    success: function (result) {
                                        if(result.result =="fail"){
                                            alert("Phiếu này đang được sử dụng !");
                                            this.pqGrid("rollback");
                                        }else {
                                            this.pqGrid("commit");
                                            this.pqGrid("refreshDataAndView");
                                        }
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
            if (dataIndex == 1 || dataIndex == "tenkh" || dataIndex == "address" || dataIndex == "masothue" || dataIndex == "sott") {
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
                    url = $dir_module_ps_k_ghiso + "add.php";
                }
                else {
                    //url to  update records.
                    url = $dir_module_ps_k_ghiso + "edit.php";
                }
                var sott = "";
                $.ajax($.extend({}, ajaxObj, {
                    context: $grid,
                    url: url,
                    data: rowData,
                    success: function (response) {
                        var recIndx = this.pqGrid("option", "dataModel.recIndx");
                        if (rowData[recIndx] == null) {
                            rowData[recIndx] = response.recId;
                            sott = response.recId;
                        }

                        this.pqGrid("removeClass", {rowIndx: rowIndx, cls: 'pq-row-edit'});
                        this.pqGrid("commit");
                        $grid.pqGrid("refreshDataAndView");
                    }
                }));
                //console.log(rowData.sott);
                //return sott;
            } else {
                $grid.pqGrid("quitEditMode");
                $grid.pqGrid("removeClass", {rowIndx: rowIndx, cls: 'pq-row-edit'});
                $grid.pqGrid("refreshRow", {rowIndx: rowIndx});
            }
        }

        var makh_select = function (ui) {
            var $cell = ui.$cell,
                rowData = ui.rowData,
                dataIndx = ui.dataIndx,
                cls = ui.cls, width = ui.column.minWidth,
                dc = $.trim(rowData[dataIndx]);
            $cell.css('padding', '0');

            var $inp = $("<input type='text'  name='" + dataIndx + "' class='" + cls + " pq-cell-editor pg-cel-define' readonly />")
                .appendTo($cell)
                .val(dc).keypress(function () {
                    $('.dialog_main_makh').load("form/frm_dm_makh_select.php?idstyle=grid_editing_ps_k_ghiso");
                });
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
            freezeCols: 3,
            sorting: 'local',
            sortIndx: 'sott',
            sortDir: 'up',
            title: null,
            height: $height - 56,
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
                                //xoadialog_ps_kt();
                                change_data_quit_ps_kt();
                            }
                        }
                    ]
                    }
                    ,
                    {
                        type: 'button',
                        label: "In Phiếu",
                        icon: 'ui-icon-document',
                        listeners: [{
                            "click": function (evt) {
                                var parsedJson = "";
                                var stringmact_nhom = "";
                                var rowSelect = getRowSelect();//------ Lấy đối tượng được chọn
                                if (rowSelect == false) {
                                    alert_f("Chú Ý", "fa fa-warning", "red", "Bạn cần chọn dữ liệu trước khi thực hiện !");
                                } else {
                                    $mapskt = rowSelect[0].rowData.mapskt;
                                    $.ajax({// Lấy thông tin phiếu và lưu vào session
                                        url: $dir_module_ps_k_ghiso + "laythongtinphieu.php",
                                        data: {
                                            mapskt: $mapskt,
                                        },
                                        async: false,
                                        success: function (response) {
                                            //parsedJson =(response);
                                        }
                                    });
                                    // window.open($dir_module_manv_chamcong+'exportexcel.php?json='+encode64(parsedJson)+"&mactnhom="+(stringmact_nhom)+"&tuan="+encode64($tuan));
                                    $('.dialog_main_print').load("form/print_phieu_ghiso.php");
                                }
                            }
                        }]
                    }
                ]
            },
            scrollModel: {
                autoFit: false // Kéo rộng cột
            },
            selectionModel: {type: 'cell', mode: 'single'},
            filterModel: {
                on: true,
                mode: "AND",
                header: true
            }, // lọc dữ liệu trên header
            hoverMode: 'cell', // di chuyển chuột trên từng cột
            editModel: {
                //onBlur: 'validate',
                saveKey: $.ui.keyCode.ENTER
            },
            editor: {type: 'textbox', select: true,},
            validation: {
                icon: 'ui-icon-info'
            },
            colModel: [//-------------------------------------------Khai báo các cột trong lưới-----------------------
                {
                    title: "Số TT", dataType: "integer", dataIndx: "sott", editable: false, width: 0, hidden: true
                },
                {
                    title: "Sửa|Xóa",
                    editable: false,
                    minWidth: 75,
                    align: "center",
                    sortable: false,
                    render: function (ui) {
                        return "<button type='button' class='edit_btn'></button>\
                            <button type='button' class='delete_btn'></button>\
                            <button type='button' class='view_btn'></button>";
                    }
                },
                {
                    title: "Số TT", dataType: "integer", dataIndx: "mapskt", editable: true, width: 0, hidden: false,// Mã cửa pkst
                    filter: {
                        type: 'textbox',
                        condition: 'begin',
                        listeners: ['keyup']
                    },
                    validations: [
                        {
                            type: 'minLen',
                            value: 1,
                            msg: "Số thứ tự không được trống"
                        },
                        {
                            type: 'maxLen',
                            value: 6,
                            msg: "Số thứ tự phải"
                        },
                        {
                            type: function (ui) {
                                var value = ui.value,
                                    _found = false, sott = ui.rowData.sott;
                                //remote validation
                                $.ajax({
                                    url: $dir_module_ps_k_ghiso + "checkkey.php",
                                    data: {'id': value},
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
                    ]
                },
                {
                    title: "Loại phiếu", dataType: "string", dataIndx: "lp", minWidth: 120, sortable: true,
                    editor: {
                        type: "select", options: function (ui) {
                            //remote validation
                            var parsedJson = "";
                            $.ajax({
                                url: $dir_module_ps_k_ghiso + "cb_loaiphieu.php",
                                data: {},
                                async: false,
                                success: function (response) {
                                    parsedJson = $.parseJSON(response);
                                }
                            });
                            return [{"3":"Ghi Có"}];
                        }
                    },
                    render: function (ui) {
                        return "Ghi Có";
                    }
                },
                {
                    title: "TK có", minWidth: 50, dataType: "integer", dataIndx: "tkco",
                    validations: [
                        {type: 'minLen', value: 1, msg: "Tài khoản nợ không được trống !"},
                        {
                            type: function (ui) {
                                var value = ui.value,
                                    _found = false, sott = ui.rowData.sott;
                                //remote validation
                                $.ajax({
                                    url: $dir_module_httk + "checkkey.php",
                                    data: {'id': value},
                                    async: false,
                                    success: function (response) {
                                        if (response == 1) {
                                            _found = true;
                                        }
                                    }
                                });
                                if (_found) {
                                    //ui.msg = value + " đã tồn tại trong hệ thống";
                                    // return false;
                                } else {
                                    ui.msg = value + " không tồn tại trông hệ thống tài khoản !";
                                    $('.dialog_main_httk').load("form/frm_dm_httk_select.php?idstyle=grid_editing_ps_k_ghiso");
                                    return false;
                                }
                            }
                        }
                        ,
                    ]
                },
                {
                    title: "Mã KH", minWidth: 100, dataType: "string", dataIndx: "makh",
                    validations: [
                        { type: 'minLen', value: 1, msg: "Mã khách hàng không được trống" },
                        { type: function (ui) {
                            var value = ui.value,
                                _found = false,sott = ui.rowData.sott;
                            $.ajax({
                                url: $dir_module_makh+"checkkey.php",
                                data: { 'id': value},
                                async: false,
                                success: function (response) {
                                    if (response == 1) {
                                        _found = true;
                                    }
                                }
                            });
                            if (!_found) {
                                ui.msg = value + " không tồn tại trông danh sách khách hàng !";
                                $('.dialog_main_makh').load("form/frm_dm_makh_select.php?idstyle=grid_editing_ps_k_ghiso");
                                return false;
                            }
                        }
                        }
                    ],
                    editor: {
                        //type: makh_select,
                    },
                    filter: {
                        type: 'textbox',
                        condition: 'begin',
                        listeners: ['keyup']
                    }
                },
                {
                    title: "Tên KH",
                    minWidth: 300,
                    dataType: "string",
                    align: "left",
                    dataIndx: "tenkh",
                    editable: false,

                },
                {
                    title: "Địa chỉ",
                    minWidth: 200,
                    dataType: "string",
                    align: "left",
                    dataIndx: "diachi",
                    editable: false,

                },
                {
                    title: "MST", minWidth: 100, dataType: "integer", dataIndx: "masothue", editable: false
                },
                {
                    title: "Số CT gốc",
                    minWidth: 70,
                    dataType: "string",
                    align: "left",
                    dataIndx: "soctgoc",
                    editable: false,
                    render: function (ui) {
                        var $mapskt = ui.rowData.mapskt;
                        var $Ten = "";
                        $.ajax({
                            url: $dir_module_ps_k_ghiso + "load_ctpskt.php",
                            data: {mapskt: $mapskt},
                            async: false,
                            success: function (response) {
                                $Row = $.parseJSON(response);
                            }
                        });
                        return $Row.soluong;
                    }
                },
                {
                    title: "Ngày ghi sổ", minWidth: 120, dataType: "string", align: "left", dataIndx: "date",
                    render: function (ui) {
                        var $yyyy_mm_dd = ui.rowData.date;
                        return Format_dd_mm_yyyy($yyyy_mm_dd);
                    },
                    editor: {
                        type: 'date'
                    }
                },
                {
                    title: "Diễn giải", minWidth: 150, dataType: "string", align: "center", dataIndx: "chuthich",
                    editor: {type: "textarea", attr: "rows=3"}
                },
                {
                    title: "Tổng tiền",
                    minWidth: 100,
                    dataType: "string",
                    align: "left",
                    dataIndx: "tonggtvn",
                    editable: false,
                }
            ],//-----------------------------------------Kết thúc các cột---------------------------------------
            dataModel: {
                dataType: "JSON",
                location: "remote",
                recIndx: "sott",
                url: $dir_module_ps_k_ghiso + "list.php",//-- Load danh sách lên lưới
                getData: function (response) {
                    return {data: response.data};
                }
            },
            detailModel: {
                cache: true,
                collapseIcon: "ui-icon-plus",
                expandIcon: "ui-icon-minus"
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
        var $grid = $("#grid_editing_ps_k_ghiso").pqGrid(obj);

        /* $grid.one("pqgridload", function (evt, ui) {
         var column = $grid.pqGrid("getColumn", {dataIndx: "manhom"});
         var filter = column.filter;
         filter.cache = null;
         filter.options = $grid.pqGrid("getData", {dataIndx: ["tennhom", "manhom"]});// lấy 1 hoặc nhiều dataindex
         $grid.pqGrid("refreshHeader");
         });*/
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
            $grid.find("button.view_btn").button({icons: {primary: 'ui-icon-note'}})// button xem chi tiết
                .unbind("click")
                .bind("click", function (evt, ui) {
                    var $tr = $(this).closest("tr"),
                        rowIndx = $grid.pqGrid("getRowIndx", {$tr: $tr}).rowIndx;// Lấy vị trí của hàng đang sửa

                    var rowData = $grid.pqGrid("getRowData", {rowIndx: rowIndx});
                    var mapskt = rowData.mapskt;
                    $('.dialog_main_chitiet_pskt').load("form/frm_chitiet_ps_k_ghiso.php?sott=" + mapskt);
                });

            //rows which were in edit mode before refresh, put them in edit mode again.
            var rows = $grid.pqGrid("getRowsByClass", {cls: 'pq-row-edit'});
            if (rows.length > 0) {
                var rowIndx = rows[0].rowIndx;
                editRow(rowIndx, $grid);
            }
        });
        function getRowSelect() { // --------------------Lấy dữ liệu theo dòng trên gird----------------------
            var arr = $("#grid_editing_ps_k_ghiso").pqGrid("selection", {
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
<div id="dialog-ps_k_ghiso"
     title="Phát sinh ghi sổ... (F2: Sửa , F7: Sao chép , F8: Xóa , F9: Lưu , END : Hủy dòng đang sửa, INSERT: Thêm chi tiết phiếu chi  )">
    <!-- dialog -->
    <div id="grid_editing_ps_k_ghiso" style="margin:5px auto;border: 0px !important;"></div>
</div>