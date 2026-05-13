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
    tr.green td { background: lightgreen;}

</style>
<script>
    $height_ds_nhapkho = getHeight();
    $width_ds_nhapkho = getWidth() - 50;
    $(function () {
        var $dir_module_mataisan = "";
        $dir_module_mataisan = "modules/mataisan/";//--------------------------------------------Thay đổi khi copy
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
            var $grid_pb = $("#grid_editing_ds_tangtaisan").closest('.pq-grid');//---- Lưới----------------
            if (event.keyCode == Keys.F2 || event.keyCode == Keys.INSERT || event.keyCode == Keys.ENTER ) {
                var rowSelect = getRowSelect();//------ Lấy đối tượng được chọn
                if (rowSelect == false) {
                    alert_f("Chú Ý", "fa fa-warning", "red", "Bạn cần chọn dữ liệu trước khi thực hiện !");
                }
            }
            var rowEditting = $("#grid_editing_ds_tangtaisan").pqGrid("getRowsByClass", {cls: 'pq-row-edit'});//---Lấy đối tượng đang sửa
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
                    $ma = rowSelect[0].rowData.mapsts;
                    $data = new Array($ma)
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
            var $grid_pb = $("#grid_editing_ds_tangtaisan").closest('.pq-grid');//---- Lưới----------------
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
                    $('.dialog_main_manoidung').load("form/frm_dm_manoidung_select.php?idstyle=grid_editing_ds_tangtaisan");
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
                url: $dir_module_mataisan+"taomapskt.php",// tao mã phiếu pskt
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
                                    url: $dir_module_mataisan + "del.php",
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
                    url = $dir_module_mataisan + "add.php";
                }
                else {
                    //url to  update records.
                    url = $dir_module_mataisan + "edit.php";
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
                    $('.dialog_main_makh').load("form/frm_dm_makh_select.php?idstyle=grid_editing_ds_tangtaisan");
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
            sorting: 'local',
            sortIndx: 'sott',
            sortDir: 'up',
            freezeCols: 6,
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
                                $("#grid_editing_ds_tangtaisan").pqGrid("exportCsv", {url: "../export_xuatexcel.php"});
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
                    title: "Số TT", dataType: "integer", dataIndx: "mapsts", editable: true, width: 0, hidden: false,align: "center",
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
                    title: "Ngày ghi sổ",
                    minWidth: 100,
                    dataType: "string",
                    align: "left",
                    dataIndx: "ngayghiso",
                    editable: false,
                    render:function( ui ){
                        $value = ui.rowData.ngayghiso;
                        return ($value);
                    }

                },
                {
                    title: "Ngày hóa đơn",
                    minWidth: 100,
                    dataType: "string",
                    align: "left",
                    dataIndx: "ngayhoadon",
                    editable: false,
                    render:function( ui ){
                        $value = ui.rowData.ngayhoadon;
                        return ($value);
                    }
                },
                {
                    title: "Mã TS",
                    minWidth: 100,
                    dataType: "string",
                    align: "left",
                    dataIndx: "mats",
                    editable: false,
					filter: {
                        type: 'textbox',
                        condition: 'begin',
                        listeners: ['keyup']
                    },

                },
                {
                    title: "Tên TS",
                    minWidth: 200,
                    dataType: "string",
                    align: "left",
                    dataIndx: "tents",
                    editable: false,
					filter: {
                        type: 'textbox',
                        condition: 'begin',
                        listeners: ['keyup']
                    },

                },
                {
                    title: "ĐVT", minWidth: 100, dataType: "string", dataIndx: "dvt",
					filter: {
                        type: 'textbox',
                        condition: 'begin',
                        listeners: ['keyup']
                    },
                },
                {
                    title: "Mã TK",
                    minWidth: 80,
                    dataType: "string",
                    align: "center",
                    dataIndx: "matk",
                    editable: false,
					filter: {
                        type: 'textbox',
                        condition: 'begin',
                        listeners: ['keyup']
                    },

                },
                {
                    title: "TK-CP",
                    minWidth: 80,
                    dataType: "string",
                    align: "center",
                    dataIndx: "tkno",
                    editable: false,
					filter: {
                        type: 'textbox',
                        condition: 'begin',
                        listeners: ['keyup']
                    },

                },
				{
                    title: "TK Có",
                    minWidth: 80,
                    dataType: "string",
                    align: "center",
                    dataIndx: "tkco",
                    editable: false,
					filter: {
                        type: 'textbox',
                        condition: 'begin',
                        listeners: ['keyup']
                    },

                },
                {
                    title: "Loại SP/CT",
                    minWidth: 120,
                    dataType: "string",
                    align: "center",
                    dataIndx: "loaisp",
                    editable: false,
                    render: function (ui) {
                        var $value = ui.rowData.loaisp;
                        if ($value == "SP") {
                            return "SẢN PHẨM";
                        } else if ($value == "CT") {
                            return "CÔNG TRÌNH";
                        } else if ($value == "HD") {
                            return "HỢP ĐỒNG";
                        }else{
                            return "KHÔNG CT/SP";
                        }
                    }

                },
                {
                    title: "Mã SP/CT",
                    minWidth: 80,
                    dataType: "string",
                    align: "center",
                    dataIndx: "mabp",
                    editable: false,

                },
                {
                    title: "Tên SP/CT",
                    minWidth: 220,
                    dataType: "string",
                    align: "left",
                    dataIndx: "bophan",
                    editable: false,

                },
                {
                    title: "Tỷ lệ KH",
                    minWidth: 80,
                    dataType: "string",
                    align: "center",
                    dataIndx: "tylekh",
                    editable: false,

                },
                {
                    title: "TG sử dụng",
                    minWidth: 80,
                    dataType: "string",
                    align: "center",
                    dataIndx: "thoigiansd",
                    editable: false,
					filter: {
                        type: 'textbox',
                        condition: 'begin',
                        listeners: ['keyup']
                    },

                },
				{
                    title: "Ngày sử dụng",
                    minWidth: 100,
                    dataType: "string",
                    align: "left",
                    dataIndx: "ngaysd",
                    editable: false,
                    render:function( ui ){
                        $value = ui.rowData.ngaysd;
                        return ($value);
                    }
                },
                {
                    title: "Số lượng",
                    minWidth: 80,
                    dataType: "string",
                    align: "center",
                    dataIndx: "soluong",
                    editable: false,
					filter: {
                        type: 'textbox',
                        condition: 'begin',
                        listeners: ['keyup']
                    },

                },
                {
                    title: "Nguyên giá",
                    minWidth: 150,
                    dataType: "string",
                    align: "right",
                    dataIndx: "nguyengia",
                    editable: false,
                    render:function( ui ){
                        $val = ui.rowData.nguyengia;
                        return $.number($val,0,".",",")
                    },
					filter: {
                        type: 'textbox',
                        condition: 'begin',
                        listeners: ['keyup']
                    },
                },
                {
                    title: "giá trị còn lại",
                    minWidth: 150,
                    dataType: "string",
                    align: "right",
                    dataIndx: "giatriconlai",
                    editable: false,
                    render:function( ui ){
                        $val = ui.rowData.giatriconlai;
                        return $.number($val,0,".",",")
                    },
					filter: {
                        type: 'textbox',
                        condition: 'begin',
                        listeners: ['keyup']
                    },

                },
                {
                    title: "Hao mòn luỹ kế",
                    minWidth: 150,
                    dataType: "string",
                    align: "right",
                    dataIndx: "giatriconlai",
                    editable: false,
                    render:function( ui ){
                        $nguyengia = ui.rowData.nguyengia;
                        $gtconlai = ui.rowData.giatriconlai;
                        $haomon = ($nguyengia-$gtconlai);
                        return $.number($haomon,0,".",",")
                    }

                }
            ],//-----------------------------------------Kết thúc các cột---------------------------------------
            pageModel: { type: "local", rPP: 200, strRpp: "{0}", strDisplay: "{0} đến {1} của {2}" },
            dataModel: {
                dataType: "JSON",
                location: "remote",
                recIndx: "sott",
                postData: {loaiphieu:<?php echo $LoaiPhieu; ?>},
                url: $dir_module_mataisan + "list_tanggiam.php",//-- Load danh sách lên lưới
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
        var totalData;
        function calculateSummary() {
            var
                $TongNguyenGia = 0,
                $TongGTConLai = 0,
                data = $("#grid_editing_ds_tangtaisan").pqGrid('option', 'dataModel.data');
            try {
                data.forEach(row => {
                $TongNguyenGia+= parseFloat(row['nguyengia']);
                $TongGTConLai+= parseFloat(row['giatriconlai']);
            })
            }catch (e) {

            }
            totalData = { mats: "", tents: "<b>TỔNG CỘNG</b>", nguyengia: $TongNguyenGia, giatriconlai: $TongGTConLai, pq_rowcls: 'green' };
        }

        var $summary = "";

        obj.render = function (evt, ui) {
            $summary = $("<div class='pq-grid-summary'  ></div>")
                .prependTo($(".pq-grid-bottom", this));
            calculateSummary();
        }

        obj.cellSave = function (evt, ui) {
            obj.refresh.call(this);
        }
        obj.refresh = function (evt, ui) {
            calculateSummary();
            var data = [totalData]; //2 dimensional array
            var obj = { data: data, $cont: $summary }
            $(this).pqGrid("createTable", obj);
        }
        var $grid = $("#grid_editing_ds_tangtaisan").pqGrid(obj);

		$grid.one("pqgridload", function (evt, ui) {
			$("#grid_editing_ds_tangtaisan .pq-search-hd-field[name='mats']").focus();
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
            $grid.find("button.view_btn").button({icons: {primary: 'ui-icon-note'}})// button xem chi tiết
                .unbind("click")
                .bind("click", function (evt, ui) {
                    var $tr = $(this).closest("tr"),
                        rowIndx = $grid.pqGrid("getRowIndx", {$tr: $tr}).rowIndx;// Lấy vị trí của hàng đang sửa

                    var rowData = $grid.pqGrid("getRowData", {rowIndx: rowIndx});
                    var mapskt = rowData.mapskt;
                    $('.dialog_main_chitiet_pskt').load("form/frm_chitiet_ps_kt.php?sott=" + mapskt);
                });

            //rows which were in edit mode before refresh, put them in edit mode again.
            var rows = $grid.pqGrid("getRowsByClass", {cls: 'pq-row-edit'});
            if (rows.length > 0) {
                var rowIndx = rows[0].rowIndx;
                editRow(rowIndx, $grid);
            }
	
        });
        function getRowSelect() { // --------------------Lấy dữ liệu theo dòng trên gird----------------------
            var arr = $("#grid_editing_ds_tangtaisan").pqGrid("selection", {
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
     title="DANH SÁCH TĂNG,GIẢM TÀI SẢN CỐ ĐỊNH... (INSERT: chọn mã, ESC: Thoát)">
    <!-- dialog -->
    <div id="grid_editing_ds_tangtaisan" style="margin:5px auto;border: 0px !important;"></div>
</div>