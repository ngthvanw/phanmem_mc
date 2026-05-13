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

    tr td.mauhong {
        background-color: pink;
    }

    tr td.green {
        background-color: lightgreen;
    }

    tr.green td {
        background: lightgreen;
    }

    .ui-tabs .ui-tabs-panel {
        padding: 0 !important;
    }
</style>
<script>
    $height = getHeight();
    $width = getWidth() - 50;
    $(function () {
        $("#tabs").tabs();
        var $dir_module_dmsanpham = "";
        $dir_module_dmsanpham = "modules/dmsanpham/";//--------------------------------------------Thay đổi khi copy
        function xoadialog_sltonkho() { // ----------------------đóng form
            reset_dialog(".dialog-bangke_soluongvlxuatkhau");
            reset_dialog(".dialog_main_dinhmuc_sanpham");
        }

        $("#dialog-bangke_soluongvlxuatkhau").dialog({ // ------------------Gọi dialog
            resizable: false,
            height: $height,
            width: $width,
            modal: true

        });
        $("#dialog-bangke_soluongvlxuatkhau").keydown(function (event) {//--------------Các phím tắt
            var $grid_pb = $("#grid_editing_sltonkho").closest('.pq-grid');//---- Lưới----------------
            if (event.keyCode == Keys.F7 || event.keyCode == Keys.F8) {
                var rowSelect = getRowSelect();//------ Lấy đối tượng được chọn
                if (rowSelect == false) {
                    alert_f("Chú Ý", "fa fa-warning", "red", "Bạn cần chọn dữ liệu trước khi thực hiện !");
                }
            }
            var rowEditting = $("#grid_editing_sltonkho").pqGrid("getRowsByClass", {cls: 'pq-row-edit'});//---Lấy đối tượng đang sửa
            if ($('div').hasClass('jconfirm') == false) {

                if (event.keyCode == Keys.ESCAPE && $('div').hasClass('jconfirm') == false && rowEditting.length < 1) {
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
                                $.confirm({
                                    title: 'Đã tạo bảng dự trừ VLSX thành công',
                                    type: 'green',
                                    autoClose: 'OK|1000',
                                    content: function () {
                                        var self = this;
                                        return $.ajax({
                                            url: $dir_module_dmsanpham + "thembangdutruvlxddk.php",
                                            dataType: 'json',
                                            method: 'get'
                                        });
                                    },
                                    buttons: {
                                        "OK": {
                                            keys: ['Y'], action: function () {
                                                xoadialog_sltonkho();
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
                    //$('.dialog_main3').load("form/frm_dm_httk_select.php?idstyle=grid_editing_sltonkho");
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
                    $('.dialog_main_manhomvt').load("form/frm_dm_manhom_select.php?idstyle=grid_editing_sltonkho");
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
                                    url: $dir_module_dmsanpham + "del.php",
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

        //--------------------------------Khai báo lưới---------------------------------------.

        var objth = {
            hwrap: false,
            //resizable: true,
            rowBorders: true,
            //virtualX: true, virtualY: true,
            height: $height - 120,
            width: $width - 30,
            freezeCols: 7,
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
                    },
                    {
                        type: 'button',
                        label: "Xuất Excel",
                        icon: 'ui-icon-document',
                        listeners: [{
                            "click": function (evt) {
                                $("#grid_editing_bangtonghopdutru").pqGrid("exportCsv", {url: "export_xuatexcel.php"});
                            }
                        }]
                    },
                    {
                        type: 'button',
                        label: "Tính định mức theo ngày",
                        icon: 'ui-icon-document',
                        listeners: [{
                            "click": function (evt) {
                                window.open('form/tinhdinhmuc_theongay.php', 'updatedata', 'height=1000','width=2000')
                            }
                        }]
                    },
                ]
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
            title: "Bảng tổng hợp dự trù vật tư sản xuất",
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
                            url = $dir_module_dmsanpham + "add_slvlsx.php";
                        }
                        else {
                            url = $dir_module_dmsanpham + "add_slvlsx.php";
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

                        },
                        complete: function () {
                            //tongtienhienco();
                        }
                    });
                    $grid.pqGrid("refreshRow", {rowIndx: rowIndx});
                }
            },
            colModel: [//-------------------------------------------Khai báo các cột trong lưới-----------------------
                {title: "SoTT", dataType: "integer", dataIndx: "sott", editable: false, width: 0, hidden: true},
                {title: "STT", dataType: "integer", dataIndx: "STT", editable: false, width: 0, hidden: true},
                {
                    title: "Mã VT",
                    dataType: "string",
                    editable: false,
                    dataIndx: "mavt",
                    minWidth: 100,
                    sortable: true,
                    filter: {type: 'textbox', condition: 'begin', listeners: ['keyup']}

                },
                {
                    title: "Tên VT",
                    minWidth: 250,
                    dataType: "string",
                    dataIndx: "tenvt",
                    editable: false,
                    filter: {type: 'textbox', condition: 'begin', listeners: ['keyup']}
                },
                {
                    title: "ĐVT",
                    dataType: "string",
                    editable: false,
                    align: "center",
                    dataIndx: "dvt",
                    minWidth: 100,
                    sortable: true,
                },
                {
                    title: "Tổng cộng",
                    minWidth: 150,
                    dataType: "float",
                    align: "right",
                    editable: false,
                    dataIndx: "tongcong",
                    render: function (ui) {
                        var thang1 = parseFloat(ui.rowData.thang1);
                        var thang2 = parseFloat(ui.rowData.thang2);
                        var thang3 = parseFloat(ui.rowData.thang3);
                        var thang4 = parseFloat(ui.rowData.thang4);
                        var thang5 = parseFloat(ui.rowData.thang5);
                        var thang6 = parseFloat(ui.rowData.thang6);
                        var thang7 = parseFloat(ui.rowData.thang7);
                        var thang8 = parseFloat(ui.rowData.thang8);
                        var thang9 =parseFloat( ui.rowData.thang9);
                        var thang10 =parseFloat( ui.rowData.thang10);
                        var thang11 = parseFloat(ui.rowData.thang11);
                        var thang12 = parseFloat(ui.rowData.thang12);
                        $tong = (thang1)+(thang2)+(thang3)+(thang4)+(thang5)+(thang6)+(thang7)+(thang8)+(thang9)+(thang10)+(thang11)+(thang12);
                        return $.number($tong, <?php echo (int)($_SESSION['txthienthisole']); ?>, ".", ",");
                    },
                },
                {
                    title: "Tháng 1",
                    minWidth: 120,
                    dataType: "float",
                    align: "right",
                    editable: false,
                    dataIndx: "thang1",
                    render: function (ui) {
                        var value = ui.rowData.thang1;
                        return $.number(value, <?php echo (int)($_SESSION['txthienthisole']); ?>, ".", ",");
                    },
                },
                {
                    title: "Tháng 2",
                    minWidth: 120,
                    dataType: "float",
                    align: "right",
                    editable: false,
                    dataIndx: "thang2",
                    render: function (ui) {
                        var value = ui.rowData.thang2;
                        return $.number(value, <?php echo (int)($_SESSION['txthienthisole']); ?>, ".", ",");
                    },

                },
                {
                    title: "Tháng 3",
                    minWidth: 120,
                    dataType: "float",
                    align: "right",
                    editable: false,
                    dataIndx: "thang3",
                    render: function (ui) {
                        var value = ui.rowData.thang3;
                        return $.number(value, <?php echo (int)($_SESSION['txthienthisole']); ?>, ".", ",");
                    },
                },
                {
                    title: "Tháng 4",
                    minWidth: 120,
                    dataType: "float",
                    align: "right",
                    editable: false,
                    dataIndx: "thang4",
                    render: function (ui) {
                        var value = ui.rowData.thang4;
                        return $.number(value, <?php echo (int)($_SESSION['txthienthisole']); ?>, ".", ",");
                    },
                },
                {
                    title: "Tháng 5",
                    minWidth: 120,
                    dataType: "float",
                    align: "right",
                    editable: false,
                    dataIndx: "thang5",
                    render: function (ui) {
                        var value = ui.rowData.thang5;
                        return $.number(value, <?php echo (int)($_SESSION['txthienthisole']); ?>, ".", ",");
                    },
                },
                {
                    title: "Tháng 6",
                    minWidth: 120,
                    dataType: "float",
                    align: "right",
                    editable: false,
                    dataIndx: "thang6",
                    render: function (ui) {
                        var value = ui.rowData.thang6;
                        return $.number(value, <?php echo (int)($_SESSION['txthienthisole']); ?>, ".", ",");
                    },
                },
                {
                    title: "Tháng 7",
                    minWidth: 120,
                    dataType: "float",
                    align: "right",
                    editable: false,
                    dataIndx: "thang7",
                    render: function (ui) {
                        var value = ui.rowData.thang7;
                        return $.number(value, <?php echo (int)($_SESSION['txthienthisole']); ?>, ".", ",");
                    },
                },
                {
                    title: "Tháng 8",
                    minWidth: 120,
                    dataType: "float",
                    align: "right",
                    editable: false,
                    dataIndx: "thang8",
                    render: function (ui) {
                        var value = ui.rowData.thang8;
                        return $.number(value, <?php echo (int)($_SESSION['txthienthisole']); ?>, ".", ",");
                    },
                },
                {
                    title: "Tháng 9",
                    minWidth: 120,
                    dataType: "float",
                    align: "right",
                    editable: false,
                    dataIndx: "thang9",
                    render: function (ui) {
                        var value = ui.rowData.thang9;
                        return $.number(value, <?php echo (int)($_SESSION['txthienthisole']); ?>, ".", ",");
                    },
                },
                {
                    title: "Tháng 10",
                    minWidth: 120,
                    dataType: "float",
                    align: "right",
                    editable: false,
                    dataIndx: "thang10",
                    render: function (ui) {
                        var value = ui.rowData.thang10;
                        return $.number(value, <?php echo (int)($_SESSION['txthienthisole']); ?>, ".", ",");
                    },
                },
                {
                    title: "Tháng 11",
                    minWidth: 120,
                    dataType: "float",
                    align: "right",
                    editable: true,
                    dataIndx: "thang11",
                    render: function (ui) {
                        var value = ui.rowData.thang11;
                        return $.number(value, <?php echo (int)($_SESSION['txthienthisole']); ?>, ".", ",");
                    },
                },
                {
                    title: "Tháng 12",
                    minWidth: 120,
                    dataType: "float",
                    align: "right",
                    editable: true,
                    dataIndx: "thang12",
                    render: function (ui) {
                        var value = ui.rowData.thang12;
                        return $.number(value, <?php echo (int)($_SESSION['txthienthisole']); ?>, ".", ",");
                    },
                },
            ],//-----------------------------------------Kết thúc các cột---------------------------------------
            pageModel: {type: "local", rPP: 100, strRpp: "{0}", strDisplay: "{0} đến {1} của {2}"},
            dataModel: {
                dataType: "JSON",
                location: "remote",
                recIndx: "sott",
                url: $dir_module_dmsanpham + "list_tonghopdutruvlsx.php",//-- Load danh sách lên lưới
                getData: function (dataJSON) {
                    var data = dataJSON.data;
                    return {data: data};
                }
            }
        };
        var $grid = $("#grid_editing_bangtonghopdutru").pqGrid(objth);

        //use refresh & refreshRow events to display jQueryUI buttons and bind events.

        // Grird bảng dự trù theo ngày
        var objngay = {
            hwrap: false,
            //resizable: true,
            rowBorders: true,
            //virtualX: true, virtualY: true,
            height: $height - 120,
            width: $width - 30,
            freezeCols: 6,
            //virtualX: true,
            numberCell: {show: true},
            filterModel: {on: true, mode: "AND", header: true},
            trackModel: {on: true}, //to turn on the track changes.
            scrollModel: {
                autoFit: true
            },
            toolbar: {
                items: [
                    {type: '<span>Chọn tháng : </span>'},
                    {
                        type: 'select',
                        attr: 'id=thangthongke',
                        options: [{"1": "1"}, {"2": "2"}, {"3": "3"}, {"4": "4"}, {"5": "5"}, {"6": "6"}, {"7": "7"}, {"8": "8"}, {"9": "9"}, {"10": "10"}, {"11": "11"}, {"12": "12"}],
                        listeners: [
                            {
                                change: function (evt) {
                                    $thangthongke = $("#thangthongke").val();
                                    //$( ".selector" ).pqGrid( {dataModel: { postData: {gridId:23, table: "products"} }} );
                                    $("#tabs-0").load("form/gird_bangthongke_thanhpham.php?thangthongke=" + $thangthongke);
                                    $("#grid_editing_thongkethanhpham").pqGrid("refreshDataAndView");
                                }
                            }
                        ]
                    },
                    {
                        type: 'button',
                        label: "Xuất từ Excel",
                        icon: 'ui-icon-document',
                        listeners: [{
                            "click": function (evt) {
                                $("#grid_editing_thongkethanhpham").pqGrid("exportCsv", { url:"export_xuatexcel.php" });
                            }
                        }]
                    },
                    {
                        type: 'button',
                        label: "Nhập Excel",
                        icon: 'ui-icon-document',
                        listeners: [{
                            "click": function (evt) {
                                window.open('form/frm_tai_excel_dutru_window.php', 'updatedata', 'height=1000','width=2000')
                            }
                        }]
                    },
                    {
                        type: 'button',
                        label: " Tự động nhập dự trù từ xuất kho",
                        icon: 'ui-icon-copy',
                        listeners: [{
                            "click": function (evt) {
                                $.confirm({
                                    title: 'Đã tạo bảng dự trừ VLSX thành công',
                                    type: 'green',
                                    autoClose: 'OK|1000',
                                    content: function () {
                                        var self = this;
                                        return $.ajax({
                                            url: $dir_module_dmsanpham + "themsoluongdutru_tuxuatkho.php?thang="+$('#thangthongke').val(),
                                            dataType: 'json',
                                            method: 'get'
                                        });
                                    },
                                    buttons: {
                                        "OK": {
                                            keys: ['Y'],
                                            action: function() {
                                                $("#grid_editing_thongkethanhpham").pqGrid("refreshDataAndView");
                                            }
                                        }
                                    }
                                });

                            }
                        }]
                    },
                ]
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
            title: "Bảng thống kê thành phẩm",
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
                            url = $dir_module_dmsanpham + "add_slvlsxtktp.php";
                        }
                        else {
                            url = $dir_module_dmsanpham + "add_slvlsxtktp.php";
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

                        },
                        complete: function () {
                            //tongtienhienco();
                        }
                    });
                    $grid.pqGrid("refreshRow", {rowIndx: rowIndx});
                }
            },
            colModel: [//-------------------------------------------Khai báo các cột trong lưới-----------------------
                {title: "SoTT", dataType: "integer", dataIndx: "sott", editable: false, width: 0, hidden: true},
                {title: "STT", dataType: "integer", dataIndx: "STT", editable: false, width: 0, hidden: true},
                {
                    title: "Mã SP",
                    dataType: "string",
                    editable: false,
                    dataIndx: "masp",
                    minWidth: 100,
                    sortable: true,
                    render: function (ui) {
                        var rowData = ui.rowData,
                            dataIndx = ui.dataIndx;

                        rowData.pq_cellcls = rowData.pq_cellcls || {};
                        if (rowData.maspcha == 0) {//if change is negative.
                            rowData.pq_cellcls[dataIndx] = 'mauhong';
                            return rowData.masp;
                        }
                        else { //if change >= 0
                            return rowData.masp;
                        }
                    },
                    filter: {type: 'textbox', condition: 'begin', listeners: ['keyup']}

                },
                {
                    title: "Tên SP",
                    minWidth: 250,
                    dataType: "string",
                    dataIndx: "tensp",
                    editable: false,
                    filter: {type: 'textbox', condition: 'begin', listeners: ['keyup']}
                },
                {
                    title: "Mã SP Cha",
                    dataType: "string",
                    editable: false,
                    dataIndx: "maspcha",
                    minWidth: 100,
                    sortable: true,
                },
                {
                    title: "Tổng cộng",
                    minWidth: 120,
                    dataType: "float",
                    align: "right",
                    editable: false,
                    dataIndx: "n32",
                    render: function (ui) {
                        var rowData = ui.rowData;
                        var dataIndx = ui.dataIndx;
                        rowData.pq_cellcls = rowData.pq_cellcls || {};
                        var value = parseFloat(ui.rowData.n1)+parseFloat(ui.rowData.n2)+parseFloat(ui.rowData.n3)+parseFloat(ui.rowData.n4)+parseFloat(ui.rowData.n5)+parseFloat(ui.rowData.n6)+parseFloat(ui.rowData.n7)+parseFloat(ui.rowData.n8)+parseFloat(ui.rowData.n9)+parseFloat(ui.rowData.n10)+parseFloat(ui.rowData.n11)+parseFloat(ui.rowData.n12)+parseFloat(ui.rowData.n13)+parseFloat(ui.rowData.n14)+parseFloat(ui.rowData.n15)+parseFloat(ui.rowData.n16)+parseFloat(ui.rowData.n17)+parseFloat(ui.rowData.n18)+parseFloat(ui.rowData.n19)+parseFloat(ui.rowData.n20)+parseFloat(ui.rowData.n21)+parseFloat(ui.rowData.n22)+parseFloat(ui.rowData.n23)+parseFloat(ui.rowData.n24)+parseFloat(ui.rowData.n25)+parseFloat(ui.rowData.n26)+parseFloat(ui.rowData.n27)+parseFloat(ui.rowData.n28)+parseFloat(ui.rowData.n29)+parseFloat(ui.rowData.n30)+parseFloat(ui.rowData.n31);
                        rowData.pq_cellcls[dataIndx] = 'green';
                        return $.number(value, <?php echo (int)($_SESSION['txthienthisole']); ?>, ".", ",");
                    },
                },
                {
                    title: "Ngày 1",
                    minWidth: 120,
                    dataType: "float",
                    align: "right",
                    editable: true,
                    dataIndx: "n1",
                    render: function (ui) {
                        var value = ui.rowData.n1;
                        return $.number(value, <?php echo (int)($_SESSION['txthienthisole']); ?>, ".", ",");
                    },
                },
                {
                    title: "Ngày 2",
                    minWidth: 120,
                    dataType: "float",
                    align: "right",
                    editable: true,
                    dataIndx: "n2",
                    render: function (ui) {
                        var value = ui.rowData.n2;
                        return $.number(value, <?php echo (int)($_SESSION['txthienthisole']); ?>, ".", ",");
                    },

                },
                {
                    title: "Ngày 3",
                    minWidth: 120,
                    dataType: "float",
                    align: "right",
                    editable: true,
                    dataIndx: "n3",
                    render: function (ui) {
                        var value = ui.rowData.n3;
                        return $.number(value, <?php echo (int)($_SESSION['txthienthisole']); ?>, ".", ",");
                    },
                },
                {
                    title: "Ngày 4",
                    minWidth: 120,
                    dataType: "float",
                    align: "right",
                    editable: true,
                    dataIndx: "n4",
                    render: function (ui) {
                        var value = ui.rowData.n4;
                        return $.number(value, <?php echo (int)($_SESSION['txthienthisole']); ?>, ".", ",");
                    },
                },
                {
                    title: "Ngày 5",
                    minWidth: 120,
                    dataType: "float",
                    align: "right",
                    editable: true,
                    dataIndx: "n5",
                    render: function (ui) {
                        var value = ui.rowData.n5;
                        return $.number(value, <?php echo (int)($_SESSION['txthienthisole']); ?>, ".", ",");
                    },
                },
                {
                    title: "Ngày 6",
                    minWidth: 120,
                    dataType: "float",
                    align: "right",
                    editable: true,
                    dataIndx: "n6",
                    render: function (ui) {
                        var value = ui.rowData.n6;
                        return $.number(value, <?php echo (int)($_SESSION['txthienthisole']); ?>, ".", ",");
                    },
                },
                {
                    title: "Ngày 7",
                    minWidth: 120,
                    dataType: "float",
                    align: "right",
                    editable: true,
                    dataIndx: "n7",
                    render: function (ui) {
                        var value = ui.rowData.n7;
                        return $.number(value, <?php echo (int)($_SESSION['txthienthisole']); ?>, ".", ",");
                    },
                },
                {
                    title: "Ngày 8",
                    minWidth: 120,
                    dataType: "float",
                    align: "right",
                    editable: true,
                    dataIndx: "n8",
                    render: function (ui) {
                        var value = ui.rowData.n8;
                        return $.number(value, <?php echo (int)($_SESSION['txthienthisole']); ?>, ".", ",");
                    },
                },
                {
                    title: "Ngày 9",
                    minWidth: 120,
                    dataType: "float",
                    align: "right",
                    editable: true,
                    dataIndx: "n9",
                    render: function (ui) {
                        var value = ui.rowData.n9;
                        return $.number(value, <?php echo (int)($_SESSION['txthienthisole']); ?>, ".", ",");
                    },
                },
                {
                    title: "Ngày 10",
                    minWidth: 120,
                    dataType: "float",
                    align: "right",
                    editable: true,
                    dataIndx: "n10",
                    render: function (ui) {
                        var value = ui.rowData.n10;
                        return $.number(value, <?php echo (int)($_SESSION['txthienthisole']); ?>, ".", ",");
                    },
                },
                {
                    title: "Ngày 11",
                    minWidth: 120,
                    dataType: "float",
                    align: "right",
                    editable: true,
                    dataIndx: "n11",
                    render: function (ui) {
                        var value = ui.rowData.n11;
                        return $.number(value, <?php echo (int)($_SESSION['txthienthisole']); ?>, ".", ",");
                    },
                },
                {
                    title: "Ngày 12",
                    minWidth: 120,
                    dataType: "float",
                    align: "right",
                    editable: true,
                    dataIndx: "n12",
                    render: function (ui) {
                        var value = ui.rowData.n12;
                        return $.number(value, <?php echo (int)($_SESSION['txthienthisole']); ?>, ".", ",");
                    },
                },
                {
                    title: "Ngày 13",
                    minWidth: 120,
                    dataType: "float",
                    align: "right",
                    editable: true,
                    dataIndx: "n13",
                    render: function (ui) {
                        var value = ui.rowData.n13;
                        return $.number(value, <?php echo (int)($_SESSION['txthienthisole']); ?>, ".", ",");
                    },
                },
                {
                    title: "Ngày 14",
                    minWidth: 120,
                    dataType: "float",
                    align: "right",
                    editable: true,
                    dataIndx: "n14",
                    render: function (ui) {
                        var value = ui.rowData.n14;
                        return $.number(value, <?php echo (int)($_SESSION['txthienthisole']); ?>, ".", ",");
                    },
                },
                {
                    title: "Ngày 15",
                    minWidth: 120,
                    dataType: "float",
                    align: "right",
                    editable: true,
                    dataIndx: "n15",
                    render: function (ui) {
                        var value = ui.rowData.n15;
                        return $.number(value, <?php echo (int)($_SESSION['txthienthisole']); ?>, ".", ",");
                    },
                },
                {
                    title: "Ngày 16",
                    minWidth: 120,
                    dataType: "float",
                    align: "right",
                    editable: true,
                    dataIndx: "n16",
                    render: function (ui) {
                        var value = ui.rowData.n16;
                        return $.number(value, <?php echo (int)($_SESSION['txthienthisole']); ?>, ".", ",");
                    },
                },
                {
                    title: "Ngày 17",
                    minWidth: 120,
                    dataType: "float",
                    align: "right",
                    editable: true,
                    dataIndx: "n17",
                    render: function (ui) {
                        var value = ui.rowData.n17;
                        return $.number(value, <?php echo (int)($_SESSION['txthienthisole']); ?>, ".", ",");
                    },
                },
                {
                    title: "Ngày 18",
                    minWidth: 120,
                    dataType: "float",
                    align: "right",
                    editable: true,
                    dataIndx: "n18",
                    render: function (ui) {
                        var value = ui.rowData.n18;
                        return $.number(value, <?php echo (int)($_SESSION['txthienthisole']); ?>, ".", ",");
                    },
                },
                {
                    title: "Ngày 19",
                    minWidth: 120,
                    dataType: "float",
                    align: "right",
                    editable: true,
                    dataIndx: "n19",
                    render: function (ui) {
                        var value = ui.rowData.n19;
                        return $.number(value, <?php echo (int)($_SESSION['txthienthisole']); ?>, ".", ",");
                    },
                },
                {
                    title: "Ngày 20",
                    minWidth: 120,
                    dataType: "float",
                    align: "right",
                    editable: true,
                    dataIndx: "n20",
                    render: function (ui) {
                        var value = ui.rowData.n20;
                        return $.number(value, <?php echo (int)($_SESSION['txthienthisole']); ?>, ".", ",");
                    },
                },
                {
                    title: "Ngày 21",
                    minWidth: 120,
                    dataType: "float",
                    align: "right",
                    editable: true,
                    dataIndx: "n21",
                    render: function (ui) {
                        var value = ui.rowData.n21;
                        return $.number(value, <?php echo (int)($_SESSION['txthienthisole']); ?>, ".", ",");
                    },
                },
                {
                    title: "Ngày 22",
                    minWidth: 120,
                    dataType: "float",
                    align: "right",
                    editable: true,
                    dataIndx: "n22",
                    render: function (ui) {
                        var value = ui.rowData.n22;
                        return $.number(value, <?php echo (int)($_SESSION['txthienthisole']); ?>, ".", ",");
                    },
                },
                {
                    title: "Ngày 23",
                    minWidth: 120,
                    dataType: "float",
                    align: "right",
                    editable: true,
                    dataIndx: "n23",
                    render: function (ui) {
                        var value = ui.rowData.n23;
                        return $.number(value, <?php echo (int)($_SESSION['txthienthisole']); ?>, ".", ",");
                    },
                },
                {
                    title: "Ngày 24",
                    minWidth: 120,
                    dataType: "float",
                    align: "right",
                    editable: true,
                    dataIndx: "n24",
                    render: function (ui) {
                        var value = ui.rowData.n24;
                        return $.number(value, <?php echo (int)($_SESSION['txthienthisole']); ?>, ".", ",");
                    },
                },
                {
                    title: "Ngày 25",
                    minWidth: 120,
                    dataType: "float",
                    align: "right",
                    editable: true,
                    dataIndx: "n25",
                    render: function (ui) {
                        var value = ui.rowData.n25;
                        return $.number(value, <?php echo (int)($_SESSION['txthienthisole']); ?>, ".", ",");
                    },
                },
                {
                    title: "Ngày 26",
                    minWidth: 120,
                    dataType: "float",
                    align: "right",
                    editable: true,
                    dataIndx: "n26",
                    render: function (ui) {
                        var value = ui.rowData.n26;
                        return $.number(value, <?php echo (int)($_SESSION['txthienthisole']); ?>, ".", ",");
                    },
                },
                {
                    title: "Ngày 27",
                    minWidth: 120,
                    dataType: "float",
                    align: "right",
                    editable: true,
                    dataIndx: "n27",
                    render: function (ui) {
                        var value = ui.rowData.n27;
                        return $.number(value, <?php echo (int)($_SESSION['txthienthisole']); ?>, ".", ",");
                    },
                },
                {
                    title: "Ngày 28",
                    minWidth: 120,
                    dataType: "float",
                    align: "right",
                    editable: true,
                    dataIndx: "n28",
                    render: function (ui) {
                        var value = ui.rowData.n28;
                        return $.number(value, <?php echo (int)($_SESSION['txthienthisole']); ?>, ".", ",");
                    },
                },
                {
                    title: "Ngày 29",
                    minWidth: 120,
                    dataType: "float",
                    align: "right",
                    editable: true,
                    dataIndx: "n29",
                    render: function (ui) {
                        var value = ui.rowData.n29;
                        return $.number(value, <?php echo (int)($_SESSION['txthienthisole']); ?>, ".", ",");
                    },
                },
                {
                    title: "Ngày 30",
                    minWidth: 120,
                    dataType: "float",
                    align: "right",
                    editable: true,
                    dataIndx: "n30",
                    render: function (ui) {
                        var value = ui.rowData.n30;
                        return $.number(value, <?php echo (int)($_SESSION['txthienthisole']); ?>, ".", ",");
                    },
                },
                {
                    title: "Ngày 31",
                    minWidth: 120,
                    dataType: "float",
                    align: "right",
                    editable: true,
                    dataIndx: "n31",
                    render: function (ui) {
                        var value = ui.rowData.n31;
                        return $.number(value, <?php echo (int)($_SESSION['txthienthisole']); ?>, ".", ",");
                    },
                },
            ],//-----------------------------------------Kết thúc các cột---------------------------------------
            pageModel: {type: "local", rPP: 100, strRpp: "{0}", strDisplay: "{0} đến {1} của {2}"},
            dataModel: {
                dataType: "JSON",
                location: "remote",
                recIndx: "sott",
                postData: {thangthongke: 1},
                url: $dir_module_dmsanpham + "list_thongkethanhpham.php",//-- Load danh sách lên lưới
                getData: function (dataJSON) {
                    var data = dataJSON.data;
                    return {data: data};
                }
            }
        };
        var $gridngay = $("#grid_editing_thongkethanhpham").pqGrid(objngay);
        // End grid theo ngày
        $("#tab_bangtonghopdutru").click(function () {
            var r = confirm("Bạn có muốn tạo mới bảng tổng hợp vật tư không ?");
            if (r == true) {
            $.confirm({
                title: 'Đã tạo bảng tổng hợp vật tư thành công',
                type: 'green',
                autoClose: 'OK|1000',
                content: function () {
                    var self = this;
                    return $.ajax({
                        url: $dir_module_dmsanpham + "thembangdutruvlxddk.php",
                        dataType: 'json',
                        method: 'get'
                    });
                },
                buttons: {
                    "OK": {
                        keys: ['Y'], action: function () {
                            $("#grid_editing_bangtonghopdutru").pqGrid("refreshDataAndView");
                        }
                    }
                }
            });
        }else{
                $("#grid_editing_bangtonghopdutru").pqGrid("refreshDataAndView");
            }
        });

        $("#tab_bangkhautruvtsx").click(function () {
            var r = confirm("Bạn có muốn tạo mới bảng dự trù VLSX không ?");
            if (r == true) {
                $.confirm({
                    title: 'Đã tạo bảng dự trừ VLSX thành công',
                    type: 'green',
                    autoClose: 'OK|1000',
                    content: function () {
                        var self = this;
                        return $.ajax({
                            url: $dir_module_dmsanpham + "thembangdutruvatlieu.php",
                            dataType: 'json',
                            method: 'get'
                        });
                    },
                    buttons: {
                        "OK": {
                            keys: ['Y'], action: function () {
                                $("#tabs-1").load("form/gird_bangkhautruvlsx.php");
                            }
                        }
                    }
                });
            }else{
                $("#tabs-1").load("form/gird_bangkhautruvlsx.php");
            }
        });


        function getRowSelect() { // --------------------Lấy dữ liệu theo dòng trên gird----------------------                 
            var arr = $("#grid_editing_sltonkho").pqGrid("selection", {
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
            isEdit = $("#grid_editing_sltonkho").pqGrid("isDirty"); //Lấy giá trị đang chọn

            return isEdit;
        }

        //-----------------------------Hết lưới---------------------------------------------------------------------
        setTimeout(function () {
            $Name = $("#grid_editing_sltonkho .pq-search-txt").focus();
        }, 100);
        window.CallParent = function() {
            $("#grid_editing_thongkethanhpham").pqGrid("refreshDataAndView");
        }
        //-----------------------------Hết lưới---------------------------------------------------------------------
    });
</script>
<div id="dialog-bangke_soluongvlxuatkhau"
     title="BẢNG DỰ TRÙ VẬT LIỆU SẢN XUẤT...(ENTER : SỬA VÀ LƯU , ESC: Thoát)">
    <!-- dialog -->
    <div id="tabs" style="padding: 0px;">
        <ul>
            <li><a href="#tabs-0">Thống kê thành phẩm</a></li>
            <li><a href="#tabs-1" id="tab_bangkhautruvtsx">Bảng dự trù vlsx</a></li>
            <li><a href="#tabs-2" id="tab_bangtonghopdutru">Bảng tổng hợp vật tư sản xuất</a></li>
        </ul>
        <div id="tabs-0">
            <div id="grid_editing_thongkethanhpham" style="margin:0px;border: 0px !important;"></div>
        </div>
        <div id="tabs-1">
            <div id="grid_editing_sltonkho" style="margin:0px;border: 0px !important;"></div>
        </div>
        <div id="tabs-2">
            <div id="grid_editing_bangtonghopdutru" style="margin:0px;border: 0px !important;"></div>
        </div>
    </div>
</div>