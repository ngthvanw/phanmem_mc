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
    tr.green td { background: lightgreen;}

</style>
<script>
    $height = getHeight();
    $width = getWidth() - 50;
    $(function () {
        var $dir_module_sodutk = "";
        $dir_module_sodutk = "modules/sodutk/";//--------------------------------------------Thay đổi khi copy
        function xoadialog_sltonkho() { // ----------------------đóng form
            reset_dialog(".dialog-sodutk");
            reset_dialog(".dialog_main_sodu_tk");
        }

        $("#dialog-sodutk").dialog({ // ------------------Gọi dialog
            resizable: false,
            height: $height,
            width: $width,
            modal: true

        });
        $("#dialog-sodutk").keydown(function (event) {//--------------Các phím tắt
            var $grid_pb = $("#grid_editing_sltonkho").closest('.pq-grid');//---- Lưới----------------
            if (event.keyCode == Keys.F2 || event.keyCode == Keys.F7 || event.keyCode == Keys.F8) {
                var rowSelect = getRowSelect();//------ Lấy đối tượng được chọn
                if (rowSelect == false) {
                    alert_f("Chú Ý", "fa fa-warning", "red", "Bạn cần chọn dữ liệu trước khi thực hiện !");
                }
            }

            var rowEditting = $("#grid_editing_sltonkho").pqGrid("getRowsByClass", {cls: 'pq-row-edit'});//---Lấy đối tượng đang sửa
            if ($('div').hasClass('jconfirm') == false) {

                if (event.keyCode == Keys.ESCAPE) {
					arrayData = tongtiendauky();
					$tongduno = arrayData.data.duno;
					$tongduco = arrayData.data.duco;
					if($tongduno!=$tongduco){
						var res = confirm("Tổng dư nợ và tổng dư có không bằng nhau ! Bạn có muốn tiếp tục ?");
						if(res){
							change_data_quit_sltonkho();
						}
					}else{
						change_data_quit_sltonkho();
					}
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
                                xoadialog_sltonkho();
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
                                    url: $dir_module_sltonkho + "del.php",
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
        var obj = {
            hwrap: false,
            //resizable: true,
            rowBorders: true,
            //virtualX: true, virtualY: true,
            height: $height - 70,
            width: $width - 30,
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
                    }
                ]
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
                    oldRow = obj.oldRow,
                    type = obj.type,
                    rowData = obj.rowData;


                var url = "";
                if (type == 'update') {
                    var valid = grid.isValid({rowData: rowData, allowInvalid: true}).valid;
                    if (valid) {
                        if (rowData[recIndx] == null) {
                            url = $dir_module_sodutk + "edit.php";
                        }
                        else {
                            url = $dir_module_sodutk + "edit.php";
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
                        }
                    });
                    $grid.pqGrid("refreshRow", {rowIndx: rowIndx});
                }
            },
            colModel: [//-------------------------------------------Khai báo các cột trong lưới-----------------------
                {title: "SoTT", dataType: "integer", dataIndx: "sott", editable: false, width: 0, hidden: true},
                {
                    title: "Mã TK",
                    dataType: "string",
                    editable: false,
                    dataIndx: "matk",
                    width: 80,
                    sortable: true,

                },
                {
                    title: "Tên tài khoản", width: 350, dataType: "string", editable: false, dataIndx: "tentk",
                },
                {
                    title: "Số dư nợ",
                    width: 120,
                    dataType: "integer",
                    align: "right",
                    editable: true,
                    dataIndx: "soduno",
                    render: function (ui) {
                        var value = ui.rowData.soduno;
                        return $.number(value, 0, ".", ",");
                    },
                    validations: [
                        {
                            type: function (ui) {
                                isEdit = isEditCell();
                                if (isEdit) {
                                    var value = ui.value,
                                        _found=true,
                                        chitiet = ui.rowData.cttheobophan,
                                        ctsoduno = ui.rowData.ctsoduno,
                                        ctsoduco = ui.rowData.ctsoduco;
                                    if(chitiet==1){
                                        if(value!=ctsoduno){
                                            _found = window.confirm("Chi tiết và tổng hợp không giống nhau ! \n Vui lòng xem lại !");
                                        }
                                    }

                                    if (!_found) {
                                        ui.msg ="Chi tiết và tổng hợp không giống nhau ! ";
                                        return false;
                                    }
                                }
                            }
                        }
                    ]
                },
                {
                    title: "Số dư có",
                    width: 150,
                    dataType: "integer",
                    align: "right",
                    editable: true,
                    dataIndx: "soduco",
                    render: function (ui) {
                        var value = ui.rowData.soduco;
                        return $.number(value, 0, ".", ",");
                    },
                    validations: [
                        {
                            type: function (ui) {
                                isEdit = isEditCell();
                                if (isEdit) {
                                    var value = ui.value,
                                        _found=true,
                                        chitiet = ui.rowData.cttheobophan,
                                        ctsoduno = ui.rowData.ctsoduno,
                                        ctsoduco = ui.rowData.ctsoduco;
                                    if(chitiet==1){
                                        if(value!=ctsoduco){
                                            _found = window.confirm("Chi tiết và tổng hợp không giống nhau ! \n Vui lòng xem lại !");
                                        }
                                    }

                                    if (!_found) {
                                        ui.msg ="Chi tiết và tổng hợp không giống nhau ! ";
                                        return false;
                                    }
                                }
                            }
                        }
                    ]
                },
                {
                    title: "Tổng dư nợ",
                    width: 150,
                    dataType: "integer",
                    align: "right",
                    editable: true,
                    dataIndx: "ctsoduno",
                    hidden: true
                },
                {
                    title: "Tổng dư có",
                    width: 150,
                    dataType: "integer",
                    align: "right",
                    editable: true,
                    dataIndx: "ctsoduco",
                    hidden: true

                },
                {
                    title: "Tỷ giá",
                    width: 80,
                    dataType: "integer",
                    align: "right",
                    editable: true,
                    dataIndx: "tygia",
                    hidden: false,
                    render: function (ui) {
                        var value = ui.rowData.tygia;
                        return $.number(value, 0, ".", ",");
                    },
                },
                {
                    title: "Tiền NT",
                    width: 100,
                    dataType: "float",
                    align: "right",
                    editable: true,
                    dataIndx: "sotiennt",
                    hidden: false,
                    render: function (ui) {
                        var value = ui.rowData.sotiennt;
                        return $.number(value, 3, ".", ",");
                    },
                },
                {
                    title: "CT theo bộ phận",
                    width: 190,
                    dataType: "string",
                    align: "center",
                    editable: true,
                    dataIndx: "cttheobophan",
                    validations: [
                        {type: 'maxLen', value: 1, msg: "Nhập vào 1 ký tự !"}
                    ],
                    editor: {type: "select",options: function (ui) {
                        //remote validation
                        var parsedJson = [ { 0:"KHÔNG"}, {1: "CHI TIẾT"}] ;
                        return parsedJson;
                    }},
                    render: function (ui) {
                        var value = ui.rowData.cttheobophan;
                        if (value == 0) {
                            return "";
                        } else {
                            return "CHI TIẾT";
                        }
                    }
                }

            ],//-----------------------------------------Kết thúc các cột---------------------------------------
            pageModel: {type: "local", rPP: 200, strRpp: "{0}", strDisplay: "{0} đến {1} của {2}"},
            dataModel: {
                dataType: "JSON",
                location: "remote",
                recIndx: "sott",
                url: $dir_module_sodutk + "list.php",//-- Load danh sách lên lưới
                getData: function (response) {
                    return {data: response.data};
                }
            }
        };

        var totalData;
        function calculateSummary() {
            var
                $tongduno = 0,
                $tongduco = 0,
                data = $("#grid_editing_sltonkho").pqGrid('option', 'dataModel.data');
            try {
                data.forEach(row => {
                    $tongduno+= parseFloat(row['soduno']);
                    $tongduco+= parseFloat(row['soduco']);
                if($tongduno!=$tongduco){
                    //alert("Tổng dư nợ và tổng dư có không bằng nhau !");
                }
            })
            }catch (e) {

            }
            totalData = { matk: "", tentk: "<b>TỔNG CỘNG</b>", soduno: $tongduno, soduco: $tongduco,cttheobophan:0, pq_rowcls: 'green' };
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
        var $grid = $("#grid_editing_sltonkho").pqGrid(obj);

        //use refresh & refreshRow events to display jQueryUI buttons and bind events.
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

        function tongtiendauky() {
            $data=""
            $.ajax({// Kiểm tra xem STT có tồn tại hay không
                url: $dir_module_sodutk + "tongtiendauky.php",
                async: false,
                success: function (response) {
                    $data = $.parseJSON(response);
                }
            });
            return $data;
        }

        //-----------------------------Hết lưới---------------------------------------------------------------------
        /*setTimeout(function () {
            $Name = $("#grid_editing_sltonkho .pq-search-txt").focus();
            tongtienhienco();
        }, 100);*/
        //-----------------------------Hết lưới---------------------------------------------------------------------
    });
</script>
<div id="dialog-sodutk"
     title="SỐ DƯ CÁC TÀI KHOẢN... (ENTER : Sửa và Lưu , ESC : Thoát )">
    <!-- dialog -->
    <div id="grid_editing_sltonkho" style="margin:5px auto;border: 0px !important;"></div>
</div>