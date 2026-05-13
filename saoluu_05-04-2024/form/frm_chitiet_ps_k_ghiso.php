<?php
$MaPSKT = $_GET['sott'];
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
        border: 2px dashed #ff0000;
    }

</style>
<script>
    $height = getHeight() - 100;
    $width = getWidth() - 150;
    $(function () {
        var $dir_module_chitiet_ps_k_ghiso = "";
        $dir_module_chitiet_ps_k_ghiso = "modules/chitietpskghiso/";//--------------------------------------------Thay đổi khi copy
        $dir_module_manoidung = "modules/manoidung/";//--------------------------------------------Thay đổi khi copy
        $dir_module_httk_select = "modules/httk/";

        function xoadialog_chitiet_ps_kt() { // ----------------------đóng form
            reset_dialog(".dialog-chitiet_ps_k_ghiso");
            reset_dialog(".dialog_main_chitiet_pskt");
            $("#grid_editing_ps_k_ghiso :button").first().focus();
        }

        $("#dialog-chitiet_ps_k_ghiso").dialog({ // ------------------Gọi dialog
            resizable: false,
            height: $height,
            width: $width,
            modal: true

        });
        $("#dialog-chitiet_ps_k_ghiso").keydown(function (event) {//--------------Các phím tắt
            var $grid_pb = $("#grid_editing_chitiet_ps_k_ghiso").closest('.pq-grid');//---- Lưới----------------
            if (event.keyCode == Keys.F2 || event.keyCode == Keys.F7 || event.keyCode == Keys.F8) {
                var rowSelect = getRowSelect();//------ Lấy đối tượng được chọn
                if (rowSelect == false) {
                    alert_f("Chú Ý", "fa fa-warning", "red", "Bạn cần chọn dữ liệu trước khi thực hiện !");
                }
            }
            var rowEditting = $("#grid_editing_chitiet_ps_k_ghiso").pqGrid("getRowsByClass", {cls: 'pq-row-edit'});//---Lấy đối tượng đang sửa
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
                            tenkh: rowData.tenkh,
                            mapskt: rowData.mapskt,
                            address: rowData.address,
                            masothue: rowData.masothue,
                            loaict: rowData.loaict,
                            mauso: rowData.mauso,
                            seri: rowData.seri,
                            sct: rowData.sct,
                            ngay: rowData.date,
                            mand: rowData.mand,
                            mand2: rowData.mand2,
                            gtvnd2: rowData.gtvnd2,
                            noidung2: rowData.noidung2,
                            tkno2: rowData.tkno2,
                            noidung: rowData.noidung,
                            tkno: rowData.tkno,
                            gtvnd: rowData.gtvnd,
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
                    change_data_quit_chitiet_ps_kt();
                }
            } else {
                return false;
            }
        }); // end phím tắt
        /* $.contextMenu('destroy');
         $.contextMenu({// Menu chuột phải
         selector: '#grid_editing_chitiet_ps_k_ghiso',
         build: function ($trigger, e) {
         return {
         callback: function (key, options) {
         var $grid_pb = $("#grid_editing_chitiet_ps_k_ghiso").closest('.pq-grid');
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
         mapskt: rowData.mapskt,
         address: rowData.address,
         masothue: rowData.masothue,
         loaict: rowData.loaict,
         mauso: rowData.mauso,
         seri: rowData.seri,
         sct: rowData.sct,
         ngay: rowData.date,
         mand: rowData.mand,
         noidung: rowData.noidung,
         tkno: rowData.tkno,
         gtvnd: rowData.gtvnd,
         mand2: rowData.mand2,
         gtvnd2: rowData.gtvnd2,
         noidung2: rowData.noidung2,
         tkno2: rowData.tkno2,
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
        function change_data_quit_chitiet_ps_kt() { // Cảnh báo thoát khi thay đổi dữ liệu////////////////////////////////////////////////////
            var $grid_pb = $("#grid_editing_chitiet_ps_k_ghiso").closest('.pq-grid');//---- Lưới----------------
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
                                    $grid_pb.find("#grid_editing_ps_kt").focus();
                                }
                            },
                            "Hủy bỏ": {
                                keys: ['N'], action: function () {
                                    $("#grid_editing_ps_k_ghiso").pqGrid("refreshDataAndView");
                                    xoadialog_chitiet_ps_kt();
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
                                $("#grid_editing_ps_k_ghiso").pqGrid("refreshDataAndView");
                                xoadialog_chitiet_ps_kt();
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

        var taomauso = function (ui) {// Tạo Mẩu số khi đã chọn loại phiếu
            var $cell = ui.$cell,
                rowData = ui.rowData,
                dataIndx = ui.dataIndx,
                cls = ui.cls, width = ui.column.minWidth,
                dc = $.trim(rowData[dataIndx]);
            //if (rowData.mauso == "") {
            if (rowData.maloai == 1) {
                dc = "01 GTKT-3LL";
            } else if (rowData.maloai == 2) {
                dc = "02 GTTT-3LL ";
            }
            //}
            $cell.css('padding', '0');

            var $inp = $("<input type='text'  name='" + dataIndx + "' class='" + cls + " pq-cell-editor pg-cel-define' />")
                .appendTo($cell)
                .val(dc);
        }/////////////////////////////////////////////////////////////////////
        var taoghichu = function (ui) {// Lấy TK nợ 1 khi chọn mã nội dung
            var $cell = ui.$cell,
                rowData = ui.rowData,
                dataIndx = ui.dataIndx,
                cls = ui.cls, width = ui.column.minWidth,
                dc = $.trim(rowData[dataIndx]);
                //console.log(rowData);
            if (rowData.ghichu == "") {
                $.ajax({// Lấy TK nợ
                    url: $dir_module_manoidung + "laytkno.php",
                    data: {

                        mand: rowData.mand,
                    },
                    async: false,
                    success: function (response) {
                        $noidung = $.parseJSON((response));
                        dc = $noidung.tennoidung;
                    }
                });
            }
            $cell.css('padding', '0');

            var $inp = $("<input type='text'  name='" + dataIndx + "' class='" + cls + " pq-cell-editor pg-cel-define' />")
                .appendTo($cell)
                .val(dc);
        }/////////////////////////////////////////////////////////////////////
        var laytkno = function (ui) {// Lấy TK nợ 1 khi chọn mã nội dung
            var $cell = ui.$cell,
                rowData = ui.rowData,
                dataIndx = ui.dataIndx,
                cls = ui.cls, width = ui.column.minWidth,
                dc = $.trim(rowData[dataIndx]);

            if (rowData.tkno == "") {
                $.ajax({// Lấy TK nợ
                    url: $dir_module_manoidung + "laytkno.php",
                    data: {

                        mand: rowData.mand,
                    },
                    async: false,
                    success: function (response) {
                        $noidung = $.parseJSON((response));
                        dc = $noidung.tkno;
                    }
                });
            }
            $cell.css('padding', '0');

            var $inp = $("<input type='text'  name='" + dataIndx + "' class='" + cls + " pq-cell-editor pg-cel-define' />")
                .appendTo($cell)
                .val(dc);
        }/////////////////////////////////////////////////////////////////////
        var laytkno2 = function (ui) {// Lấy TK nợ 2 khi chọn mã nội dung
            var $cell = ui.$cell,
                rowData = ui.rowData,
                dataIndx = ui.dataIndx,
                cls = ui.cls, width = ui.column.minWidth,
                dc = $.trim(rowData[dataIndx]);

            if (rowData.tkno2 == "") {
                $.ajax({// Lấy TK nợ
                    url: $dir_module_manoidung + "laytkno.php",
                    data: {

                        mand: rowData.mand2,
                    },
                    async: false,
                    success: function (response) {
                        $noidung = $.parseJSON((response));
                        dc = $noidung.tkno;
                    }
                });
            }
            $cell.css('padding', '0');

            var $inp = $("<input type='text'  name='" + dataIndx + "' class='" + cls + " pq-cell-editor pg-cel-define' />")
                .appendTo($cell)
                .val(dc);
        }/////////////////////////////////////////////////////////////////////
        var laymanoidung2 = function (ui) {// Lấy TK nợ 2 khi chọn mã nội dung
            var $cell = ui.$cell,
                rowData = ui.rowData,
                dataIndx = ui.dataIndx,
                cls = ui.cls, width = ui.column.minWidth,
                dc = $.trim(rowData[dataIndx]);

            if (rowData.mand2 == "" && rowData.maloai == 1) {
                $.ajax({// Lấy TK nợ
                    url: $dir_module_manoidung + "laymandbangtkno.php",
                    data: {

                        mand: rowData.mand2,
                    },
                    async: false,
                    success: function (response) {
                        $noidung = $.parseJSON((response));
                        dc = $noidung.mand;
                    }
                });
            }
            $cell.css('padding', '0');

            var $inp = $("<input type='text'  name='" + dataIndx + "' class='" + cls + " pq-cell-editor pg-cel-define' />")
                .appendTo($cell)
                .val(dc);
        }/////////////////////////////////////////////////////////////////////
        var laysotien2 = function (ui) {// Lấy TK nợ 2 khi chọn mã nội dung
            var $cell = ui.$cell,
                rowData = ui.rowData,
                dataIndx = ui.dataIndx,
                cls = ui.cls, width = ui.column.minWidth,
                dc = $.trim(rowData[dataIndx]);

            if (rowData.maloai == 1) {
                $.ajax({// Lấy TK nợ
                    url: $dir_module_manoidung + "laytkno.php",
                    data: {

                        mand: rowData.mand,
                    },
                    async: false,
                    success: function (response) {
                        $noidung = $.parseJSON((response));
                        $phantramvat = $noidung.rate_tax;
                        var re = /,/gi;
                        dc = parseFloat(rowData.gtvnd.replace(re, "")) * parseFloat($phantramvat / 100);
                    }
                });
            }
            $cell.css('padding', '0');

            var $inp = $("<input type='text'  name='" + dataIndx + "' class='" + cls + " pq-cell-editor pg-cel-define' />")
                .appendTo($cell)
                .val(dc);
        }/////////////////////////////////////////////////////////////////////

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
                    $('.dialog_main_manoidung').load("form/frm_dm_manoidung_select.php?idstyle=grid_editing_chitiet_ps_k_ghiso");
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
                    lp: "",
                    makh: "",
                    tenkh: "",
                    mapskt: "<?php echo $MaPSKT ?>",
                    address: "",
                    masothue: "",
                    loaict: "",
                    mauso: "",
                    seri: "",
                    sct: "",
                    ngay: "",
                    mand: "",
                    tkno: "",
                    gtvnd: "",
                    mand2: "",
                    gtvnd2: "",
                    noidung2: "",
                    tkno2: "",
                    noidung: "",
                    date: "<?php echo date("Y-m-d") ?>",
                    datehd: "<?php echo date("Y-m-d") ?>",
                    datett: "<?php echo date("Y-m-d") ?>",
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
                                    url: $dir_module_chitiet_ps_k_ghiso + "del.php",
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
            if (dataIndex == 1 || dataIndex == "mapskt" || dataIndex == "tennoidung") {
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

                //rowData.mapskt1 = 111;
                //console.log(rowData);

                $grid.pqGrid("removeClass", {rowIndx: rowIndx, cls: 'pq-row-edit'});

                if (rowData[recIndx] == null) {
                    //url to add records.
                    url = $dir_module_chitiet_ps_k_ghiso + "add.php";
                }
                else {
                    //url to  update records.
                    url = $dir_module_chitiet_ps_k_ghiso + "edit.php";
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
                    $('.dialog_main_makh').load("form/frm_dm_makh_select.php?idstyle=grid_editing_chitiet_ps_k_ghiso");
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
            freezeCols: 5,
            sorting: 'local',
            sortIndx: 'sott',
            sortDir: 'up',
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
                                //xoadialog_chitiet_ps_kt();
                                change_data_quit_chitiet_ps_kt();
                            }
                        }
                    ]
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
                saveKey: $.ui.keyCode.ENTER,
                keyUpDown: false,
                clicksToEdit: 1
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
                    minWidth: 75,
                    align: "center",
                    sortable: false,
                    render: function (ui) {
                        return "<button type='button' class='edit_btn'></button>\
                            <button type='button' class='delete_btn'></button>";
                    }
                },
                /*{
                 title: "Loại phiếu", dataType: "string", dataIndx: "lp", minWidth: 150, sortable: true,
                 filter: {
                 type: "select",
                 condition: 'equal',
                 prepend: {'': '--Tất cả--'},
                 listeners: ['change'],
                 options: function (ui) {
                 //remote validation
                 var parsedJson = "";
                 $.ajax({
                 url: $dir_module_chitiet_ps_k_ghiso + "cb_loaiphieu.php",
                 data: {},
                 async: false,
                 success: function (response) {
                 parsedJson = $.parseJSON(response);
                 }
                 });
                 return parsedJson;
                 }
                 },
                 editor: {
                 type: "select", options: function (ui) {
                 //remote validation
                 var parsedJson = "";
                 $.ajax({
                 url: $dir_module_chitiet_ps_k_ghiso + "cb_loaiphieu.php",
                 data: {},
                 async: false,
                 success: function (response) {
                 parsedJson = $.parseJSON(response);
                 }
                 });
                 return parsedJson;
                 }
                 },
                 render: function (ui) {
                 var $maloaict = ui.rowData.lp;
                 var $TenLoai = "";
                 $.ajax({
                 url: $dir_module_chitiet_ps_k_ghiso + "ten_loaiphieu.php",
                 data: {ma: $maloaict},
                 async: false,
                 success: function (response) {
                 $TenLoai = response;
                 }
                 });
                 return $TenLoai;
                 }
                 },
                 {
                 title: "Mã KH", minWidth: 100, dataType: "string", dataIndx: "makh",
                 validations: [
                 {type: 'minLen', value: 1, msg: "Mã khách hàng không được trống !"}
                 ],
                 editor: {
                 type: makh_select,
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
                 render: function (ui) {
                 var $makh = ui.rowData.makh;
                 var $Ten = "";
                 $.ajax({
                 url: $dir_module_chitiet_ps_k_ghiso + "gettenkh.php",
                 data: {makh: $makh},
                 async: false,
                 success: function (response) {
                 $Ten = $.parseJSON(response);
                 }
                 });
                 return $Ten.tenkh;
                 }
                 },
                 {
                 title: "Địa chỉ",
                 minWidth: 200,
                 dataType: "string",
                 align: "left",
                 dataIndx: "address",
                 editable: false,
                 render: function (ui) {
                 var $makh = ui.rowData.makh;
                 var $DiaChi = "";
                 $.ajax({
                 url: $dir_module_chitiet_ps_k_ghiso + "gettenkh.php",
                 data: {makh: $makh},
                 async: false,
                 success: function (response) {
                 $DiaChi = $.parseJSON(response);
                 }
                 });
                 return $DiaChi.diachi;
                 }
                 },
                 {
                 title: "MST", minWidth: 100, dataType: "integer", dataIndx: "masothue", editable: false,
                 render: function (ui) {
                 var $makh = ui.rowData.makh;
                 var $MST = "";
                 $.ajax({
                 url: $dir_module_chitiet_ps_k_ghiso + "gettenkh.php",
                 data: {makh: $makh},
                 async: false,
                 success: function (response) {
                 $MST = $.parseJSON(response);
                 }
                 });
                 return $MST.masothue;
                 }
                 },*/
                {title: "Số TT", dataType: "integer", dataIndx: "mapskt", editable: false, width: 0, hidden: false},

                {
                    title: "Loại CT", minWidth: 120, dataType: "string", align: "left", dataIndx: "maloai",
                    filter: {
                        type: "select",
                        condition: 'equal',
                        prepend: {'': '--Tất cả--'},
                        listeners: ['change'],
                        options: function (ui) {
                            //remote validation
                            var parsedJson = "";
                            $.ajax({
                                url: $dir_module_chitiet_ps_k_ghiso + "cb_loaict.php",
                                data: {},
                                async: false,
                                success: function (response) {
                                    parsedJson = $.parseJSON(response);
                                }
                            });
                            return parsedJson;
                        }
                    },
                    editor: {
                        type: "select", options: function (ui) {
                            //remote validation
                            var parsedJson = "";
                            $.ajax({
                                url: $dir_module_chitiet_ps_k_ghiso + "cb_loaict.php",
                                data: {},
                                async: false,
                                success: function (response) {
                                    parsedJson = $.parseJSON(response);
                                }
                            });
                            return parsedJson;
                        }
                    },
                    render: function (ui) {
                        var $maloaict = ui.rowData.maloai;
                        var $TenLoai = "";
                        $.ajax({
                            url: $dir_module_chitiet_ps_k_ghiso + "ten_loaict.php",
                            data: {ma: $maloaict},
                            async: false,
                            success: function (response) {
                                $TenLoai = response;
                            }
                        });
                        return $TenLoai;
                    },
                    validations: [
                        {type: 'minLen', value: 1, msg: "Loại chứng từ không được trống!"}
                    ]
                },
                {
                    title: "Mẩu số", minWidth: 100, dataType: "string", align: "left", dataIndx: "mauso",
                    editor: {
                        type: taomauso,
                    }
                },
                {title: "Ký hiệu", minWidth: 120, dataType: "string", align: "left", dataIndx: "seri"},
                {title: "Số HĐ", minWidth: 120, dataType: "string", align: "left", dataIndx: "sct"},
                /*{
                 title: "Ngày", minWidth: 120, dataType: "string", align: "left", dataIndx: "date",
                 render: function (ui) {
                 var $yyyy_mm_dd = ui.rowData.date;
                 return Format_dd_mm_yyyy($yyyy_mm_dd);
                 },
                 editor: {
                 type: 'date'
                 }
                 },*/
                {
                    title: "Mã ND", minWidth: 150, dataType: "string", align: "left", dataIndx: "mand",
                    validations: [
                        {type: 'minLen', value: 1, msg: "Mã nội dung không được trống !"},
                        {
                            type: function (ui) {
                                var value = ui.value,
                                    _found = false, sott = ui.rowData.sott;
                                //remote validation
                                $.ajax({
                                    url: $dir_module_manoidung + "checkkey.php",
                                    data: {'id': value},
                                    async: false,
                                    success: function (response) {
                                        if (response == 1) {
                                            _found = true;
                                        }
                                    }
                                });
                                if (!_found) {
                                    ui.msg = value + " Không tồn tại trong danh sách nội dung !";
                                    $('.dialog_main_manoidung').load("form/frm_dm_manoidung_select.php?idstyle=grid_editing_chitiet_ps_k_ghiso");
                                    return false;
                                }
                            }
                        }
                    ]
                },
                {
                    title: "Nội dung",
                    minWidth: 150,
                    dataType: "string",
                    align: "left",
                    editable: false,
                    dataIndx: "tennoidung"
                },
                {
                    title: "TK nợ", minWidth: 150, dataType: "string", align: "left", dataIndx: "tkno_mand",
                    editor: {
                        type: laytkno,
                    },
                    validations: [
                        {type: 'minLen', value: 1, msg: "Tài khoản nợ không được trống !"},
                        {
                            type: function (ui) {
                                var value = ui.value,
                                    _found = false, sott = ui.rowData.sott;
                                //remote validation
                                $.ajax({
                                    url: $dir_module_httk_select + "checkkey.php",
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
                                    $('.dialog_main_httk').load("form/frm_dm_httk_select.php?idstyle=grid_editing_chitiet_ps_k_ghiso");
                                    return false;
                                }
                            }
                        }
                        ,
                    ]
                },
                {
                    title: "Số tiền", minWidth: 150, dataType: "string", align: "left", dataIndx: "gtvnd",
                    editor: {
                        type: formart_num
                    },
                    validations: [
                        {type: 'minLen', value: 1, msg: "Số tiền của nội dung không được trống !"},
                        {type: 'maxLen', value: 15, msg: "số tiền của nội dung phải nhỏ hơn 15 số!"}
                    ],
                    render: function (ui) {
                        var gtvnd = ui.rowData.gtvnd;
                        return FormatNumber(gtvnd);
                    },
                    //filter: { type: 'textbox', condition: "between", listeners: ['keyup'] }
                },
                {
                    title: "Mã ND 2", minWidth: 150, dataType: "string", align: "left", dataIndx: "mand2",
                    validations: [
                        {
                            type: function (ui) {
                                var value = ui.value,
                                    _found = false, sott = ui.rowData.sott;
                                if (value != "") {
                                    //remote validation
                                    $.ajax({
                                        url: $dir_module_manoidung + "checkkey.php",
                                        data: {'id': value},
                                        async: false,
                                        success: function (response) {
                                            if (response == 1) {
                                                _found = true;
                                            }
                                        }
                                    });
                                    if (!_found) {
                                        ui.msg = value + " Không tồn tại trong danh sách nội dung !";
                                        $('.dialog_main_manoidung').load("form/frm_dm_manoidung_select.php?idstyle=grid_editing_chitiet_ps_k_ghiso");
                                        return false;
                                    }
                                }
                            }
                        }
                    ],
                    editor: {
                        type: laymanoidung2,
                    }
                },
                {
                    title: "Nội dung 2",
                    minWidth: 150,
                    dataType: "string",
                    align: "left",
                    editable: false,
                    dataIndx: "tennoidung2"
                },
                {
                    title: "TK nợ 2", minWidth: 150, dataType: "string", align: "left", dataIndx: "tkno_mand2",
                    editor: {
                        type: laytkno2,
                    },
                    validations: [
                        {
                            type: function (ui) {
                                var value = ui.value,
                                    _found = false, sott = ui.rowData.sott;
                                //remote validation
                                if (ui.rowData.mand2 != null) {
                                    $.ajax({
                                        url: $dir_module_httk_select + "checkkey.php",
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
                                        $('.dialog_main_httk').load("form/frm_dm_httk_select.php?idstyle=grid_editing_chitiet_ps_k_ghiso");
                                        return false;
                                    }
                                }
                            }
                        }
                        ,
                    ]
                },
                {
                    title: "Số tiền 2", minWidth: 150, dataType: "string", align: "left", dataIndx: "gtvnd2",
                    editor: {
                        type: laysotien2
                    },
                    validations: [
                        {type: 'maxLen', value: 15, msg: "Giá trị hợp đồng phải nhỏ hơn 15 số !"}
                    ],
                    render: function (ui) {
                        var gtvnd = ui.rowData.gtvnd2;
                        return FormatNumber(gtvnd);
                    },
                },
                //filter: { type: 'textbox', condition: "between", listeners: ['keyup'] }

                {
                    title: "Ngày HĐ", minWidth: 150, dataType: "string", align: "left", dataIndx: "datehd",
                    render: function (ui) {
                        var $yyyy_mm_dd = ui.rowData.datehd;
                        return Format_dd_mm_yyyy($yyyy_mm_dd);
                    },
                    editor: {
                        type: 'date'
                    }
                },
                {
                    title: "Ngày T.Toán", minWidth: 100, dataType: "string", align: "left", dataIndx: "datett",
                    render: function (ui) {
                        var $yyyy_mm_dd = ui.rowData.datett;
                        return Format_dd_mm_yyyy($yyyy_mm_dd);
                    },
                    editor: {
                        type: 'date'
                    }
                },
                {
                    title: "Diễn giải", minWidth: 150, dataType: "string", align: "center", dataIndx: "chuthich",
                    editor: {type: taoghichu}
                }
            ],//-----------------------------------------Kết thúc các cột---------------------------------------
            dataModel: {
                dataType: "JSON",
                location: "remote",
                recIndx: "sott",
                postData: function (ui) {
                    return {mapskt:<?php echo $MaPSKT; ?>};
                },
                url: $dir_module_chitiet_ps_k_ghiso + "list.php",//-- Load danh sách lên lưới
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
        var $grid = $("#grid_editing_chitiet_ps_k_ghiso").pqGrid(obj);

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

            //rows which were in edit mode before refresh, put them in edit mode again.
            var rows = $grid.pqGrid("getRowsByClass", {cls: 'pq-row-edit'});
            if (rows.length > 0) {
                var rowIndx = rows[0].rowIndx;
                editRow(rowIndx, $grid);
            }
        });
        function getRowSelect() { // --------------------Lấy dữ liệu theo dòng trên gird----------------------                 
            var arr = $("#grid_editing_chitiet_ps_k_ghiso").pqGrid("selection", {
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
<div id="dialog-chitiet_ps_k_ghiso"
     title="Chi tiết Phát sinh ghi sổ ... (F2: Sửa , F7: Sao chép , F8: Xóa , F9: Lưu , END : Hủy dòng đang sửa)">
    <!-- dialog -->
    <div id="grid_editing_chitiet_ps_k_ghiso" style="margin:5px auto;border: 0px !important;"></div>
</div>