<?php
$IDstyle = $_GET['idstyle'];// lấy ID css để truyền mã vào lưới mã công trình
$IDInput_str = $_GET['idinput'];
$IDInput_Arr = explode("***", $IDInput_str);
$IDfocus = $_GET['idfocus'];
$LoaiPhieu = $_GET['loaiphieu']; // Lấy biến để truyền vào list
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
    $height_ds_nhapkho = getHeight();
    $width_ds_nhapkho = getWidth() - 50;
    $(function () {
        var $dir_module_dsnhapkho = "";
        $dir_module_dsnhapkho = "modules/psmavattu/";//--------------------------------------------Thay đổi khi copy
        $dir_module_makh = "modules/makhachhang/";
        $dir_module_httk = "modules/httk/";
        function xoadialog_ds_nhapkho() { // ----------------------đóng form
            reset_dialog(".dialog-ds_nhapkho");
            reset_dialog(".dialog_main_ds_nhapkho");
        }

        $("#dialog-ds_nhapkho").dialog({ // ------------------Gọi dialog
            resizable: false,
            height: $height_ds_nhapkho,
            width: $width_ds_nhapkho,
            modal: true

        });
        $("#dialog-ds_nhapkho").keydown(function (event) {//--------------Các phím tắt
            var $grid_pb = $("#grid_editing_ds_nhapkho").closest('.pq-grid');//---- Lưới----------------
            if (event.keyCode == Keys.F2 || event.keyCode == Keys.INSERT || event.keyCode == Keys.ENTER ) {
                var rowSelect = getRowSelect();//------ Lấy đối tượng được chọn
                if (rowSelect == false) {
                    alert_f("Chú Ý", "fa fa-warning", "red", "Bạn cần chọn dữ liệu trước khi thực hiện !");
                }
            }
            var rowEditting = $("#grid_editing_ds_nhapkho").pqGrid("getRowsByClass", {cls: 'pq-row-edit'});//---Lấy đối tượng đang sửa
            if ($('div').hasClass('jconfirm') == false) {

                if (event.keyCode == Keys.END) { // Hủy bỏ hàng đang xóa
                    if (isEditing($grid_pb)) {
                        var rowIndx = rowEditting[0].rowIndx;
                        $grid_pb.pqGrid("quitEditMode");
                        $grid_pb.pqGrid("removeClass", {rowIndx: rowIndx, cls: 'pq-row-edit'});
                        $grid_pb.pqGrid("refreshRow", {rowIndx: rowIndx});
                        $grid_pb.pqGrid("rollback");
                    }
                }
			if (event.keyCode == Keys.INSERT || event.keyCode == Keys.ENTER) {
                    $ma = rowSelect[0].rowData.mapskt;
                    $ten = rowSelect[0].rowData.tenkh;
                    $tkno = rowSelect[0].rowData.tkno;
                    $masothue = rowSelect[0].rowData.masothue;
                    $diachi = rowSelect[0].rowData.diachi;

                    $data = new Array($ma, $ten,$diachi,$masothue,$ma,$ten,$diachi)
                    <?php
                    $i=0;
                    foreach ($IDInput_Arr as $IDInput){
                    ?>
                    $("#<?php echo $IDstyle; ?> #<?php echo $IDInput; ?>").val($data[<?php echo $i; ?>]);
                    <?php
                    $i++;
                    }
                    ?>
                    $("#<?php echo $IDstyle; ?> #<?php echo $IDfocus; ?>").focus();
                    xoadialog_ds_nhapkho();
                }
                if (event.keyCode == Keys.ESCAPE && $('div').hasClass('jconfirm') == false && rowEditting.length < 1) {
                    change_data_quit_nhapkho();
                }
            } else {
                return false;
            }
        }); // end phím tắt
        function change_data_quit_nhapkho() { // Cảnh báo thoát khi thay đổi dữ liệu////////////////////////////////////////////////////
            var $grid_pb = $("#grid_editing_ds_nhapkho").closest('.pq-grid');//---- Lưới----------------
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
                                    xoadialog_ds_nhapkho();
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
                                xoadialog_ds_nhapkho();
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
                    $('.dialog_main_manoidung').load("form/frm_dm_manoidung_select.php?idstyle=grid_editing_ds_nhapkho");
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
                url: $dir_module_dsnhapkho+"taomapskt.php",// tao mã phiếu pskt
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
                    tkco: 1111,
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
            rowData.mapskt=mapskt;
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
                                    url: $dir_module_dsnhapkho + "del.php",
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
                    url = $dir_module_dsnhapkho + "add.php";
                }
                else {
                    //url to  update records.
                    url = $dir_module_dsnhapkho + "edit.php";
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
                    $('.dialog_main_makh').load("form/frm_dm_makh_select.php?idstyle=grid_editing_ds_nhapkho");
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
            freezeCols:4,
            sorting: 'local',
            sortIndx: 'sott',
            sortDir: 'up',
            title: null,
            height: $height_ds_nhapkho - 60,
            width: $width_ds_nhapkho - 20,
            scrollModel: {
                autoFit: false // Kéo rộng cột
            },
            toolbar: {
                items: [
                    {
                        type: 'button',
                        label: "Xuất Excel",
                        icon: 'ui-icon-document',
                        listeners: [{
                            "click": function (evt) {
                                $("#grid_editing_ds_nhapkho").pqGrid("exportCsv", { url: "export_xuatexcel.php" });
                            }
                        }]
                    }
                ]
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
                    title: "Số TT", dataType: "integer", dataIndx: "mapskt", editable: true, width: 100, hidden: false,align: "left",// Mã cửa pkst
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
                        }
                    ]
                },
                {
                    title: "Ngày ghi sổ", minWidth: 170, dataType: "string", align: "left", dataIndx: "ngayghiso",
                    render: function (ui) {
                        var $yyyy_mm_dd = ui.rowData.ngayghiso;
                        return Format_dd_mm_yyyy($yyyy_mm_dd);
                    },
                    editor: {
                        type: 'date'
                    },
                    filter: { type: 'textbox', condition: "between", listeners: ['keyup'] }
                },
                {
                    title: "Ngày hóa đơn", minWidth: 170, dataType: "string", align: "left", dataIndx: "ngayhoadon",
                    render: function (ui) {
                        var $yyyy_mm_dd = ui.rowData.ngayhoadon;
                        return Format_dd_mm_yyyy($yyyy_mm_dd);
                    },
                    editor: {
                        type: 'date'
                    },
                    filter: { type: 'textbox', condition: "between", listeners: ['keyup'] }
                },
                {
                    title: "Ký hiệu",
                    minWidth: 100,
                    dataType: "string",
                    align: "left",
                    dataIndx: "seri",
                    editable: false,
                    filter: {
                        type: 'textbox',
                        condition: 'begin',
                        listeners: ['keyup']
                    }

                },
                {
                    title: "Số HĐ",
                    minWidth: 80,
                    dataType: "string",
                    align: "left",
                    dataIndx: "sct",
                    editable: false,
                    filter: {
                        type: 'textbox',
                        condition: 'begin',
                        listeners: ['keyup']
                    }

                },
                {
                    title: "Mã KH", minWidth: 100, dataType: "string", dataIndx: "makh",
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
                    filter: {
                        type: 'textbox',
                        condition: 'begin',
                        listeners: ['keyup']
                    }

                },
                {
                    title: "Địa chỉ",
                    minWidth: 200,
                    dataType: "string",
                    align: "left",
                    dataIndx: "diachi",
                    editable: false,
                    filter: {
                        type: 'textbox',
                        condition: 'begin',
                        listeners: ['keyup']
                    }
                },
                {
                    title: "MST", minWidth: 100, dataType: "integer", dataIndx: "masothue", editable: false,
                    filter: {
                        type: 'textbox',
                        condition: 'begin',
                        listeners: ['keyup']
                    }
                },
                {
                    title: "Loại", minWidth: 40, dataType: "string", dataIndx: "loaisp", editable: false,align:"center",
                    filter: {
                        type: 'textbox',
                        condition: 'begin',
                        listeners: ['keyup']
                    }
                },
                {
                    title: "Mã BP", minWidth: 100, dataType: "string", dataIndx: "makho", editable: false,
                    filter: {
                        type: 'textbox',
                        condition: 'begin',
                        listeners: ['keyup']
                    }
                },
                {
                    title: "Bộ phận", minWidth: 200, dataType: "string", dataIndx: "tenkho", editable: false,
                    filter: {
                        type: 'textbox',
                        condition: 'begin',
                        listeners: ['keyup']
                    }
                },
                {
                    title: "Nội dung",
                    minWidth: 200,
                    dataType: "string",
                    align: "left",
                    dataIndx: "noidung",
                    editable: false,


                },
                {
                    title: "Tiền hàng ",
                    minWidth: 100,
                    dataType: "string",
                    align: "right",
                    dataIndx: "tienhang",
                    editable: false,
                    render: function (ui) {
                        var value = ui.rowData.tienhang;
                        return FormatNumber(value.toString());
                    },
                    filter: {
                        type: 'textbox',
                        condition: 'begin',
                        listeners: ['keyup']
                    }
                },
                {
                    title: "Tiền thuế ",
                    minWidth: 100,
                    dataType: "string",
                    align: "right",
                    dataIndx: "tienthue",
                    editable: false,
                    render: function (ui) {
                        var value = ui.rowData.tienthue;
                        return FormatNumber(value.toString());
                    },
                    filter: {
                        type: 'textbox',
                        condition: 'begin',
                        listeners: ['keyup']
                    }
                },

                {
                    title: "Tổng tiền",
                    minWidth: 100,
                    dataType: "string",
                    align: "right",
                    dataIndx: "tongcong",
                    editable: false,
                    render: function (ui) {
                        var value = ui.rowData.tongcong;
                        return FormatNumber(value.toString());
                    },
                    filter: {
                        type: 'textbox',
                        condition: 'begin',
                        listeners: ['keyup']
                    }
                },
                {
                    title: "Loại tờ khai",
                    minWidth: 100,
                    dataType: "string",
                    align: "center",
                    dataIndx: "loaitokhai",
                    editable: false,
                    render: function (ui) {
                        var value = ui.rowData.loaitokhai;
                        if(value==1){
                            return "Khai lần đầu";
                        }else{
                            return "Khai bổ sung";
                        }

                    },
                    filter: {
                        type: 'select',
                        prepend: { '': '--TẤT CẢ--' },
                        condition: 'equal',
                        options: [ {"1":"Khai lần đầu"}, {"0":"Khai bổ sung"}],
                        listeners: ['change']
                    }

                },
                {
                    title: "Hoá đơn điện tử",
                    minWidth: 120,
                    dataType: "string",
                    align: "left",
                    dataIndx: "loaihddt",
                    editable: false,
                    render: function (ui) {
                        var value = ui.rowData.loaihddt;
                        if (value == 1) {
                            return "Đã phát hành";
                        } else if (value == 2) {
                            return "Điều chỉnh TT";
                        } else if (value == 3) {
                            return "Điều chỉnh Tiền";
                        }else if (value == 4) {
                            return "Huỷ hoá đơn";
                        }else if (value == 8) {
                            return "Hóa đơn nháp";
                        } else {
                            return "Chưa lập HĐ";
                        }

                    },
                    filter: {
                        type: 'select',
                        prepend: { '': '--TẤT CẢ--' },
                        condition: 'equal',
                        options: [ {"1":"Đã phát hành"}, {"2":"Điều chỉnh TT"}, {"3":"Điều chỉnh tiền"}, {"4":"Hủy hóa đơn"},{"8":"Hóa đơn nháp"}, {"0":"Chưa lập HĐ"}],
                        listeners: ['change']
                    }

                },
                {
                    title: "Diễn giải", minWidth: 150, dataType: "string", align: "center", dataIndx: "chuthich",
                    editor: {type: "textarea", attr: "rows=3"}
                },
                {
                    title: "Mã chi nhánh",
                    minWidth: 120,
                    dataType: "string",
                    align: "right",
                    dataIndx: "machinhanh",
                    editable: false,
                    filter: {
                        type: 'textbox',
                        condition: 'begin',
                        listeners: ['keyup']
                    }
                }
            ],//-----------------------------------------Kết thúc các cột---------------------------------------
			pageModel: { type: "remote", rPP: 150 },
            dataModel: {
                dataType: "JSON",
                location: "remote",
                recIndx: "sott",
                postData: {loaiphieu:<?php echo $LoaiPhieu; ?>},
                url: $dir_module_dsnhapkho + "list.php",//-- Load danh sách lên lưới
                getData: function (dataJSON) {
                var data = dataJSON.data;
                return { curPage: dataJSON.curPage, totalRecords: dataJSON.totalRecords, data: data };
                    
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
        var $grid = $("#grid_editing_ds_nhapkho").pqGrid(obj);

        $grid.one("pqgridload", function (evt, ui) {
            $("#grid_editing_ds_nhapkho .pq-search-hd-field[name='sct']").focus();
        });

        function getRowSelect() { // --------------------Lấy dữ liệu theo dòng trên gird----------------------
            var arr = $("#grid_editing_ds_nhapkho").pqGrid("selection", {
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
<div id="dialog-ds_nhapkho"
     title="Danh sách phiếu nhập, xuất kho... (INSERT: chọn mã, ESC: Thoát)">
    <!-- dialog -->
    <div id="grid_editing_ds_nhapkho" style="margin:5px auto;border: 0px !important;"></div>
</div>