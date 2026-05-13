<?php
$IDstyle = $_GET['idstyle'];// lấy ID css để truyền mã vào lưới mã công trình
$IDInput_str = $_GET['idinput'];
$IDInput_Arr = explode("***", $IDInput_str);
$IDfocus = $_GET['idfocus'];
$LoaiPhieu = $_GET['loaiphieu']; // Lấy biến để truyền vào list
if ($LoaiPhieu == 1) {
    $title = "DANH SÁCH PHÁT SINH PHIẾU THU";
} else if ($LoaiPhieu == 2) {
    $title = "DANH SÁCH PHÁT SINH PHIẾU CHI";
} else if ($LoaiPhieu == 3) {
    $title = "DANH SÁCH PHÁT SINH PHIẾU NỢ";
} else if ($LoaiPhieu == 4) {
    $title = "DANH SÁCH PHÁT SINH PHIẾU CÓ";
} else if ($LoaiPhieu > 4 && $LoaiPhieu % 2 == 0) {
    $title = "DANH SÁCH PHÁT SINH PHIẾU RÚT RA";
} else if ($LoaiPhieu > 4 && $LoaiPhieu % 2 == 1) {
    $title = "DANH SÁCH PHÁT SINH PHIẾU GỞI VÀO";
}
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

    tr td.blue
    {
        background:blue;
    }
    tr td.red
    {
        background:red;
    }
    tr td.yellow
    {
        background:yellow;
    }

</style>
<script>
    $height = getHeight();
    $width = getWidth() - 50;
    $(function () {
        var $dir_module_ps_kt_phieuthu = "";
        $dir_module_ps_kt_phieuthu = "modules/psktphieuthu/";//--------------------------------------------Thay đổi khi copy
        $dir_module_ps_kt = "modules/pskt/"
        $dir_module_makh = "modules/makhachhang/";
        $dir_module_httk = "modules/httk/";
        function xoadialog_ps_kt_phieuthu() { // ----------------------đóng form
            reset_dialog(".dialog-ps_kt_phieuthu");
            reset_dialog(".dialog_main_pskt_phieuthu");
        }

        $("#dialog-ps_kt_phieuthu").dialog({ // ------------------Gọi dialog
            resizable: false,
            height: $height,
            width: $width,
            modal: true

        });
        $("#dialog-ps_kt_phieuthu").keydown(function (event) {//--------------Các phím tắt
            var $grid_pb = $("#grid_editing_ps_kt_phieuthu").closest('.pq-grid');//---- Lưới----------------
            if (event.keyCode == Keys.ENTER || event.keyCode == Keys.INSERT || event.keyCode == Keys.END) {
                var rowSelect = getRowSelect();//------ Lấy đối tượng được chọn
                if (rowSelect == false) {
                    alert_f("Chú Ý", "fa fa-warning", "red", "Bạn cần chọn dữ liệu trước khi thực hiện !");
                }
            }
            var rowEditting = $("#grid_editing_ps_kt_phieuthu").pqGrid("getRowsByClass", {cls: 'pq-row-edit'});//---Lấy đối tượng đang sửa
            if ($('div').hasClass('jconfirm') == false) {
                if (event.keyCode == Keys.END) { // Hủy bỏ hàng đang xóa
                    $sophieu = rowSelect[0].rowData.sophieu;
                    $sott = rowSelect[0].rowData.mapskt;
                    $matk = rowSelect[0].rowData.tkco;
                    var LoaiPhieuChuyen = prompt("Nhập vào LOẠI PHIẾU cần chuyển đến:\n1: Phiếu thu\n2: Phiếu chi\n3: Phiếu ghi nợ\n4: Phiếu ghi có\n5,7,..: NH gửi vào\n6,8,..: NH rút ra", "");
                    if (LoaiPhieuChuyen != null) {
                        if(LoaiPhieuChuyen<=20 && LoaiPhieuChuyen!=0) {
                            var SoPhieuChuyen = prompt("Nhập vào SỐ PHIẾU cần chuyển đến\n(Số phiếu bạn hiện tại bạn đang chuyển là số: " + $sott + "):\nNếu để trống số phiếu sẽ tự động lấy số phiếu cao nhất", "");
                                if (SoPhieuChuyen != null) {
                                    if (isNaN(SoPhieuChuyen) == false || SoPhieuChuyen === "") {
                                        var MaTKChuyen = prompt("Nhập vào MÃ TÀI KHOẢN chuyển đến\n(Mã tài khoản hiện tại bạn đang chuyển là: " + $matk + "):\nNếu để trống mã tài khoản sẽ không thay đổi.", "");
                                        if ((isNaN(MaTKChuyen) == false || MaTKChuyen === "")&&MaTKChuyen != null){
                                            $.confirm({
                                                title: 'Chuyển phiếu thành công',
                                                type: 'green',
                                                autoClose: 'OK',
                                                content: 'url:capnhatloaiphieu.php?loaiphieu=' + LoaiPhieuChuyen + '&sott=' + SoPhieuChuyen + '&sophieu=' + $sophieu + '&matk=' + MaTKChuyen,
                                                contentLoaded: function (data, status, xhr) {
                                                },
                                                buttons: {
                                                    "OK": {
                                                        keys: ['Y'], action: function () {
                                                            $("#grid_editing_ps_kt_phieuthu").pqGrid("refreshDataAndView");
                                                        }
                                                    }
                                                }
                                            });
                                        }
                                    } else {
                                        alert("Thông báo!\nKhông thể chuyển phiếu này. Vui lòng nhập lại");
                                    }
                                }
                        }else{
                            alert("Thông báo!\nKhông thể chuyển phiếu nà. Vui lòng nhập lại");
                        }
                    }
                 }
                if (event.keyCode == Keys.ENTER || event.keyCode == Keys.INSERT) {
                    $ma = rowSelect[0].rowData.mapskt;

                    $data = new Array($ma)

                    <?php
                    $i = 0;
                    foreach ($IDInput_Arr as $IDInput){
                    ?>
                    $("#<?php echo $IDstyle; ?> #<?php echo $IDInput; ?>").val($data[<?php echo $i; ?>]);
                    <?php
                    $i++;
                    }
                    ?>
                    $("#<?php echo $IDstyle; ?> #<?php echo $IDfocus; ?>").focus();
                    xoadialog_ps_kt_phieuthu();
                }
                if (event.keyCode == Keys.ESCAPE && $('div').hasClass('jconfirm') == false && rowEditting.length < 1) {
                    change_data_quit_ps_kt();
                }
            } else {
                return false;
            }
        }); // end phím tắt

        function change_data_quit_ps_kt() { // Cảnh báo thoát khi thay đổi dữ liệu////////////////////////////////////////////////////
            var $grid_pb = $("#grid_editing_ps_kt_phieuthu").closest('.pq-grid');//---- Lưới----------------
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
                                    xoadialog_ps_kt_phieuthu();
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
                                xoadialog_ps_kt_phieuthu();
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
                    $('.dialog_main_manoidung').load("form/frm_dm_manoidung_select.php?idstyle=grid_editing_ps_kt_phieuthu");
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
            //append empty row in the first row.
            var mapskt = 1;
            $.ajax({
                url: $dir_module_ps_kt + "taomapskt.php",// tao mã phiếu pskt
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
                    tenkh: "",
                    tkno: 1111,
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
                                    url: $dir_module_ps_kt_phieuthu + "del.php",
                                    data: {id: sott, ma: ma},
                                    success: function (result) {
                                        if (result.result == "fail") {
                                            alert("Phiếu này đang được sử dụng !");
                                            this.pqGrid("rollback");
                                        } else {
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
                    url = $dir_module_ps_kt_phieuthu + "add.php";
                }
                else {
                    //url to  update records.
                    url = $dir_module_ps_kt_phieuthu + "edit.php";
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
                    $('.dialog_main_makh').load("form/frm_dm_makh_select.php?idstyle=grid_editing_ps_kt_phieuthu");
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
            freezeCols: 5,
            sorting: 'local',
            sortIndx: 'sott',
            sortDir: 'up',
            title: null,
            height: $height - 60,
            width: $width - 20,
            /*toolbar: {
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
             //xoadialog_ps_kt_phieuthu();
             change_data_quit_ps_kt();
             }
             }
             ]
             }
             ,
             {
             type: 'button',
             label: "In Phiếu thu",
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
             url: $dir_module_ps_kt_phieuthu + "laythongtinphieuthu.php",
             data: {
             mapskt: $mapskt,
             },
             async: false,
             success: function (response) {
             //parsedJson =(response);
             }
             });
             // window.open($dir_module_manv_chamcong+'exportexcel.php?json='+encode64(parsedJson)+"&mactnhom="+(stringmact_nhom)+"&tuan="+encode64($tuan));
             $('.dialog_main_print').load("form/print_phieuthu.php");
             }
             }
             }]
             }
             ]
             },*/
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
                                $("#grid_editing_ps_kt_phieuthu").pqGrid("exportCsv", {url: "export_xuatexcel.php"});
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
                    title: "Số TT", dataType: "integer", dataIndx: "sophieu", editable: false, width: 0, hidden: true
                },
                {
                    title: "Số TT", dataType: "integer", dataIndx: "mapskt", editable: true, width: 80, hidden: false,align: "center",// Mã cửa pkst
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
                                    url: $dir_module_ps_kt_phieuthu + "checkkey.php",
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
                    ]
                },
                {
                    title: "Mã TK", minWidth: 50, dataType: "integer", dataIndx: "tkco",
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
                                    $('.dialog_main_httk').load("form/frm_dm_httk_select.php?idstyle=grid_editing_ps_kt_phieuthu");
                                    return false;
                                }
                            }
                        }
                        ,
                    ],
                    filter: {
                        type: 'textbox',
                        condition: 'begin',
                        listeners: ['keyup']
                    }
                },
                {
                    title: "Ngày ghi sổ", minWidth: 170, dataType: "string", align: "left", dataIndx: "ngayghiso",
                    render: function (ui) {
                        var $yyyy_mm_dd = ui.rowData.ngayghiso;
                        return Format_dd_mm_yyyy($yyyy_mm_dd);
                    },
                    filter: { type: 'textbox', condition: "between", listeners: ['keyup'] }
                },
                {
                    title: "Ngày hóa đơn", minWidth: 170, dataType: "string", align: "left", dataIndx: "ngayhoadon",
                    render: function (ui) {
                        var $yyyy_mm_dd = ui.rowData.ngayhoadon;
                        return Format_dd_mm_yyyy($yyyy_mm_dd);
                    },
                    filter: { type: 'textbox', condition: "between", listeners: ['keyup'] }
                },
                {
                    title: "Loại hoá đơn",
                    minWidth: 100,
                    dataType: "string",
                    align: "center",
                    dataIndx: "maloai",
                    editable: false,
                    render: function (ui) {
                        var value = ui.rowData.maloai;
                        if (value == 1) {
                            return "Hoá đơn GTGT";
                        } else if (value == 2){
                            return "Hoá đơn bán hàng";
                        }else if (value == 3){
                            return "Bảng kê 01/TNDN";
                        }else if (value == 4){
                            return "Chứng từ khác";
                        }else if (value == 5){
                            return "Chứng từ khác(GTGT)";
                        }else{
                            return "Không tồn tại";
                        }

                    },
                    filter: {
                        type: 'select',
                        prepend: { '': '--TẤT CẢ--' },
                        condition: 'equal',
                        options: [ {"1":"Hoá đơn GTGT"}, {"2":"Hoá đơn bán hàng"}, {"3":"Bảng kê 01/TNDN"}, {"4":"Chứng từ khác"}, {"2":"Chứng từ khác(GTGT)"}],
                        listeners: ['change']
                    }
                },
                {
                    title: "Ký hiệu", minWidth: 80, dataType: "string", align: "left", dataIndx: "seri", filter: {
                    type: 'textbox',
                    condition: 'begin',
                    listeners: ['keyup']
                }
                },
                {
                    title: "Số hóa đơn", minWidth: 80, dataType: "string", align: "left", dataIndx: "sct",
                    filter: {
                        type: 'textbox',
                        condition: 'begin',
                        listeners: ['keyup']
                    }
                },
                {
                    title: "Số TC", minWidth: 80, dataType: "string", align: "left", dataIndx: "chungtuthamchieu",
                    filter: {
                        type: 'textbox',
                        condition: 'begin',
                        listeners: ['keyup']
                    }
                },
                {
                    title: "Mã KH", minWidth: 100, dataType: "string", dataIndx: "makh",
                    validations: [
                        {type: 'minLen', value: 1, msg: "Mã khách hàng không được trống"},
                        {
                            type: function (ui) {
                                var value = ui.value,
                                    _found = false, sott = ui.rowData.sott;
                                $.ajax({
                                    url: $dir_module_makh + "checkkey.php",
                                    data: {'id': value},
                                    async: false,
                                    success: function (response) {
                                        if (response == 1) {
                                            _found = true;
                                        }
                                    }
                                });
                                if (!_found) {
                                    ui.msg = value + " không tồn tại trông danh sách khách hàng !";
                                    $('.dialog_main_makh').load("form/frm_dm_makh_select.php?idstyle=grid_editing_ps_kt_phieuthu");
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
                    minWidth: 200,
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
                    title: "MST", minWidth: 120, dataType: "integer", dataIndx: "masothue", editable: false,
                    filter: {
                        type: 'textbox',
                        condition: 'begin',
                        listeners: ['keyup']
                    }
                },
                {
                    title: "Mã ND", minWidth: 100, dataType: "integer", dataIndx: "mand1", editable: false,
                    filter: {
                        type: 'textbox',
                        condition: 'begin',
                        listeners: ['keyup']
                    }
                },
                {
                    title: "Nội dung", minWidth: 200, dataType: "integer", dataIndx: "noidung1", editable: false,
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
                    title: "Mã BP", minWidth: 100, dataType: "string", dataIndx: "mabp", editable: false,
                    filter: {
                        type: 'textbox',
                        condition: 'begin',
                        listeners: ['keyup']
                    }
                },
                {
                    title: "Bộ phận", minWidth: 200, dataType: "string", dataIndx: "bophan", editable: false,
                    filter: {
                        type: 'textbox',
                        condition: 'begin',
                        listeners: ['keyup']
                    }
                },
                {
                    title: "TK1", minWidth: 60, dataType: "string", align: "left", dataIndx: "tkno1",
                    render: function (ui) {
                        var $value = ui.rowData.tkno1;
                        if ($value != 0) {
                            return ($value);
                        } else {
                            return "";
                        }
                    },
                    filter: {
                        type: 'textbox',
                        condition: 'begin',
                        listeners: ['keyup']
                    }
                },
                {
                    title: "TK 2", minWidth: 60, dataType: "string", align: "left", dataIndx: "tkno2",
                    render: function (ui) {
                        var $value = ui.rowData.tkno2;
                        if ($value != 0) {
                            return ($value);
                        } else {
                            return "";
                        }
                    },
                    filter: {
                        type: 'textbox',
                        condition: 'begin',
                        listeners: ['keyup']
                    }
                },
                {
                    title: "Tiền",
                    minWidth: 100,
                    dataType: "string",
                    align: "right",
                    dataIndx: "gtvnd1",
                    editable: false,
                    render: function (ui) {
                        var $value = ui.rowData.gtvnd1;
                        return $.number($value);
                    },
                    filter: {
                        type: 'textbox',
                        condition: 'begin',
                        listeners: ['keyup']
                    }
                },
                {
                    title: "Thuế",
                    minWidth: 80,
                    dataType: "string",
                    align: "right",
                    dataIndx: "gtvnd2",
                    editable: false,
                    render: function (ui) {
                        var $value = ui.rowData.gtvnd2;
                        return $.number($value);
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
                    dataIndx: "tongtien",
                    editable: false,
                    render: function (ui) {
                        var $value = ui.rowData.tongcong;
                        return $.number($value);
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
                        if (value == 1) {
                            return "Khai lần đầu";
                        } else {
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
                        var rowData = ui.rowData,
                            dataIndx = ui.dataIndx;
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
            dataModel: {
                dataType: "JSON",
                location: "remote",
                recIndx: "sott",
                url: $dir_module_ps_kt_phieuthu + "list.php",//-- Load danh sách lên lưới
                postData: {loaiphieu:<?php echo $LoaiPhieu; ?>},
                getData: function (response) {
                    return {curPage: response.curPage, totalRecords: response.totalRecords,data: response.data};
                }
            },
            pageModel: { type: "remote", rPP: 150 },
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
        var $grid = $("#grid_editing_ps_kt_phieuthu").pqGrid(obj);

        $grid.one("pqgridload", function (evt, ui) {
            $("#grid_editing_ps_kt_phieuthu .pq-search-hd-field[name='sct']").focus();
        });
        function getRowSelect() { // --------------------Lấy dữ liệu theo dòng trên gird----------------------
            var arr = $("#grid_editing_ps_kt_phieuthu").pqGrid("selection", {
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
        function findcheck($val, $selecttor) {
            $gird = $("#" + $selecttor);
            $rowSelect = getRowSelect();
            //console.log($rowSelect);
            $rowIndex = 0;
            if ($rowSelect != false)
                $rowIndex = $rowSelect[0].rowIndx;
            if ($val == "") {
                $selecttor = $gird.pqGrid("setSelection", {rowIndx: 0, colIndx: 2});
                $gird.find('.pq-cell-select').focus();
            } else {
                //$td = $("#grid_editing_makho_form_select_httk_select .pq-grid-table td:contains("+$val+")").first();
                //$tr = $td.parent();
                //$rowIndex = parseInt($tr.attr("pq-row-indx"));
                // console.log($td);
                $selecttor = $gird.pqGrid("setSelection", {rowIndx: $rowIndex, colIndx: 2});
                $gird.find('.pq-cell-select').focus();
            }
        }

    });
</script>
<div id="dialog-ps_kt_phieuthu"
     title="<?php echo $title; ?>... (INSERT: Chọn phiếu)">
    <!-- dialog -->
    <div id="grid_editing_ps_kt_phieuthu" style="margin:5px auto;border: 0px !important;"></div>
</div>