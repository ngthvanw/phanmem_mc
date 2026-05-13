<?php
require("../config.php");
$mabangke = $_GET['mabangke'];
?>
<style>
    #Form-chinh label {
        margin-top: 3px;
        float: left;
        border: 0px solid red;
        width: 100%;
        display: block !important;
        font-weight: bold !important;
        font-size: 12px;
        font-family: Arial, Lucida Grande, Lucida Sans, sans-serif;
    }

    #Form-chinh input {
        float: left;
        display: block !important;
        font-weight: bold !important;
        font-size: 12px;
        font-family: Arial, Lucida Grande, Lucida Sans, sans-serif;
    }

    #Form-chinh input.text {
        float: left;
        margin-bottom: 0px !important;
        width: 100%;
        height: 20px;
        padding: 1px !important;
        font-size: 12px;
        font-family: Arial, Lucida Grande, Lucida Sans, sans-serif;
        font-weight: normal;
    }

    #Form-chinh input.button {
        height: 19px;
        font-weight: bold;
        border: 1px solid white;
        text-align: center;
    }

    #Form-chinh input.checkbox {
        margin-top: 6px;
    }

    #Form-chinh fieldset {
        padding: 1px;
        padding-top: 0px;
        border: 1px solid #09F;
        margin-top: 0px;
    }

    input[disabled='disabled'] {
        color: gray;
    }

    #Form-chinh input:focus {
        border: 1px solid red;
        color: red;
    }

    #Form-chinh legend {
        padding: 0;
        padding-top: 0px;
        margin-top: 0px;
        font-weight: bold;
        font-size: 14px;
    }

    #Form-chinh .td-left input.text {
        float: left;
        margin-bottom: 4px !important;
        width: 60%;
        padding: .4em !important;
        font-size: 12px;
        font-family: Arial, Lucida Grande, Lucida Sans, sans-serif;
        font-weight: normal;
    }

    #Form-chinh select {
        font-size: 12px;
        font-weight: bold;
    }

    #Form-chinh h1 {
        font-size: 1.2em;
        margin: .6em 0;
    }

    div#users-contain {
        width: 350px;
        margin: 20px 0;
    }

    div#users-contain table {
        margin: 1em 0;
        border-collapse: collapse;
        width: 100%;
    }

    div#users-contain table td, div#users-contain table th {
        border: 1px solid #eee;
        padding: .6em 10px;
        text-align: left;
    }

    .ui-dialog .ui-state-error {
        padding: .3em;
    }

    .validateTips {
        border: 1px solid transparent;
        padding: 1px;
        margin-top: 0px !important;
        margin-bottom: 0px !important;
        color: red;
        font-weight: bold;
        text-align: center;
        font-size: 12px;
    }

    .ui-draggable, .ui-droppable {
        background-position: top;
    }

    .table-dialog {
        width: 98%;
    }

    .red {
        color: red;
    }

    .table-dialog .td-left {
        width: 50%;
        padding-right: 20px;
    }

    .table-dialog .td-right {
        width: 50%;
    }

    .table-dialog .td-right input {
        float: left;
        margin-bottom: 4px !important;
        width: 65% !important;
    }

    .table-dialog .td-left input {
        float: left;
        margin-bottom: 4px !important;
        width: 60% !important;
    }

    /* auto complex ma tk cha  */
    .custom-combobox {
        position: relative;
        display: inline-block;
    }

    .custom-combobox-toggle {
        position: absolute;
        top: 0;
        bottom: 0;
        margin-left: -1px;
        padding: 0;
    }

    .custom-combobox-input {
        margin: 0;
        padding: 5px 10px;
    }

    .ui-menu {
        z-index: 999999999 !important;
    }

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

    #table_chitiet tr td {
        border: 1px solid #4297d7;
        margin: 1px;
        padding: 1px;
    }

    #table_chitiet .table_head td {
        text-align: center;
        font-weight: bold;
    }
    #table_tonghop tr td{
        border: 1px solid  #09F;
    }

    .pq-grid{
        box-shadow: 4px 4px 10px 0px rgba(50, 50, 50, 0.75);
        margin-bottom: 12px;
    }
    div.pq-toolbar button
    {
        margin:0px 5px;
    }
    button.delete_btn
    {
        margin:-3px 0px;
    }
    tr.pq-row-delete
    {
        text-decoration:line-through;
    }
    tr.pq-row-delete td
    {
        background-color:pink;
    }
    span.saving
    {
        display:none;
        font-size:large;
        background:yellow;
        color:Red;
        font-weight:normal;
        margin-left:20px;
    }

</style>
<div id="dialog-tangtaisan" title="BẢNG KÊ MUA HÀNG HOÁ,DỊCH VỤ MUA VÀO KHÔNG CÓ HOÁ ĐƠN">
    <p class="validateTips"></p>
    <form method="post" id="Form-chinh" enctype="multipart/form-data">
        <table border="0" width="100%">
            <tr>
                <td width="100%">
                    <fieldset style="background-color: #afd9ee;border: 0px solid">
                        <table class="table-dialog" style="vertical-align: middle;width: 100%" border="0" id="table_tonghop">
                            <tr>
                                <td width="20%" style="padding: 2px;"><label for="name"> Mã bảng chi :</label></td>
                                <td width="80%" style="padding: 2px;"><input name="mabangchi" type="text" value="" autocomplete="off"
                                                                             required=""
                                                                             class="text ui-widget-content ui-corner-all"
                                                                             id="mabangchi" list="listmabangke" placeholder="Mã bảng chi"
                                                                             style="width: 100%">
                                    <datalist id="listmabangke"></datalist>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding: 2px;"><label for="name"> Mã người mua :</label></td>
                                <td style="padding: 2px;"><input name="makh" type="text" value="" required=""
                                                                 class="text ui-widget-content ui-corner-all"
                                                                 id="makh" placeholder="Mã người mua " autocomplete="off" list="listmakhachhang"
                                                                 style="width: 100%"><datalist id="listmakhachhang"></datalist></td>
                            </tr>
                            <tr>
                                <td style="padding: 2px;"><label for="name"> Người phụ trách thu mua :</label></td>
                                <td style="padding: 2px;"><input name="hotennguoichi" type="text" value="" required=""
                                                                 class="text ui-widget-content ui-corner-all"
                                                                 id="hotennguoichi" placeholder="Người phụ trách thu mua " autocomplete="off" list="listmakhachhang"
                                                                 style="width: 100%"></td>
                            </tr>
                            <tr>
                                <td style="padding: 2px;"><label for="name"> Địa chỉ :</label></td>
                                <td style="padding: 2px;"><input name="bophan" type="text" value="" required=""
                                                                 class="text ui-widget-content ui-corner-all"
                                                                 id="bophan" placeholder="Địa chỉ " style="width: 100%">
                                </td>
                            </tr>
                            <tr style="display: none;">
                                <td style="padding: 2px;"><label for="name"> Đã thuê những việc sau:</label></td>
                                <td style="padding: 2px;"><input name="lydochi" type="text" value="" required=""
                                                                 class="text ui-widget-content ui-corner-all"
                                                                 id="lydochi" placeholder="Chi cho công việc"
                                                                 style="width: 100%"></td>
                            </tr>
                            <tr >
                                <td style="padding: 2px;"><label for="name"> Ngày:</label></td>
                                <td style="padding: 2px;"><input name="ngay" type="date" value="" required=""
                                                                 class="text ui-widget-content ui-corner-all"
                                                                 id="ngay" placeholder="Chi cho công việc"
                                                                 style="width: 100%"></td>
                            </tr>
                            <tr>
                                <td width="100%" style="padding: 2px;" colspan="2">
                                    <div id="grid_editing_bangthuengoai"></div>
                                </td>
                            </tr>
                        </table>
                    </fieldset>
                </td>
            </tr>
        </table>
    </form>
</div>

<script>
    //$$dir_module_dmsanpham = "modules/mabp/";////////////////Khai báo đường dẫn vào mudole
    $dir_module_makhachhang = "modules/makhachhang/";////////////////Khai báo đường dẫn vào mudole
    $dir_module_matk = "modules/httk/";
    $dir_module_manoidung = "modules/manoidung/";////////////////Khai báo đường dẫn vào mudole
    $dir_module_mact = "modules/macongtrinh/";////////////////Khai báo đường dẫn vào mudole
    $dir_module_chitiet_vattu = "modules/ps_chitiet_mavt/";//----------------Lưới
    $dir_module_dmsanpham = "modules/dmsanpham/";//----------------Lưới
    $dir_module_nhomtaisan = "modules/nhomtaisan/";//----------------Lưới
    $dir_module_bangkechitien = "modules/bangkechitien/";//----------------Lưới
    $(function () {
        /////////////////////////////////////////////////////// Danh sách Autocomplex
        var $listmabangke = "";// Danh sách khách hàng

        $.ajax({// Load danh sách mã khách hàng
            url: $dir_module_bangkechitien + "listall.php",
            async: false,
            dataType: "json",
            success: function (response) {
                $array = (response);
                for (var i = 0; i < $array.length; i++) {
                    $listmabangke+='<option value='+$array[i].mabangke+'>'+$array[i].mabangke+'-'+bodauTiengViet($array[i].hotennguoichi)+'</option>';
                }
            }
        });

        $("#listmabangke").html($listmabangke);

        var $listmakhachhang = "";// Danh sách khách hàng

        $.ajax({// Load danh sách mã khách hàng
            url: $dir_module_makhachhang + "listall.php",
            async: false,
            dataType: "json",
            success: function (response) {

                $array = (response);
                // var js_arr = response.js_arr;
                for (var i = 0; i < $array.length; i++) {
                    if($array[i].manhom=='1010') {
                        $listmakhachhang += '<option value=' + $array[i].makh + '>' + $array[i].socmnd + '-' + bodauTiengViet($array[i].tenkh) + '-' +$array[i].tenkh+'</option>';
                    }
                }
            }
        });

        $("#listmakhachhang").html($listmakhachhang);

        var obj = {
            hwrap: true,
            resizable: true,
            rowBorders: false,
            virtualX: true,
            numberCell: {show: true},
            trackModel: {on: true}, //to turn on the track changes.
            toolbar: {
                items: [
                    {
                        type: 'button', icon: 'ui-icon-plus', label: 'Thêm dòng', listener: {
                        "click": function (evt, ui) {
                            //append empty row at the end.
                            var rowData = {ngaymuahang:'<?php echo date("Y-m-d"); ?>',hoten: '', diachi:'',socong:1,dongia:0,thanhtien:0,thuetncn:0,thuclinh:0}; //empty row
                            var rowIndx = $grid.pqGrid("addRow", {rowData: rowData});
                            $grid.pqGrid("goToPage", {rowIndx: rowIndx});
                            $grid.pqGrid("setSelection", null);
                            $grid.pqGrid("setSelection", {rowIndx: rowIndx, dataIndx: 'ProductName'});
                            $grid.pqGrid("editFirstCellInRow", {rowIndx: rowIndx});
                        }
                    }
                    },
                    {type: 'separator'},
                    {
                        type: 'button', icon: 'ui-icon-arrowreturn-1-s', label: 'Undo', cls: 'changes', listener: {
                        "click": function (evt, ui) {
                            $grid.pqGrid("history", {method: 'undo'});
                        }
                    },
                        options: {disabled: true}
                    },
                    {
                        type: 'button', icon: 'ui-icon-arrowrefresh-1-s', label: 'Redo', listener: {
                        "click": function (evt, ui) {
                            $grid.pqGrid("history", {method: 'redo'});
                        }
                    },
                        options: {disabled: true}
                    },
                    {
                        type: "<span class='saving'>Đang lưu...</span>"
                    }
                ]
            },
            scrollModel: {
                autoFit: true
            },
            historyModel: {
                checkEditableAdd: true
            },
            editModel: {
                //allowInvalid: true,
                saveKey: $.ui.keyCode.ENTER,
                uponSave: 'next'
            },
            editor: {
                select: true
            },
            change: function (evt, ui) {
                //debugger;
                if (ui.source == 'commit' || ui.source == 'rollback') {
                    return;
                }
                var $grid = $(this),
                    grid = $grid.pqGrid('getInstance').grid;
                var rowList = ui.rowList,
                    addList = [],
                    recIndx = grid.option('dataModel').recIndx,
                    deleteList = [],
                    updateList = [];

                for (var i = 0; i < rowList.length; i++) {
                    var obj = rowList[i],
                        rowIndx = obj.rowIndx,
                        newRow = obj.newRow,
                        type = obj.type,
                        rowData = obj.rowData;
                    if (type == 'add') {
                        var valid = grid.isValid({rowData: newRow, allowInvalid: true}).valid;
                        if (valid) {
                            addList.push(newRow);
                        }
                    }
                    else if (type == 'update') {
                        var valid = grid.isValid({rowData: rowData, allowInvalid: true}).valid;
                        if (valid) {
                            rowData.thanhtien = Math.round(rowData.dongia*rowData.socong);
                            rowData.thuclinh = rowData.thanhtien - rowData.thuetncn;
                            if (rowData[recIndx] == null) {
                                addList.push(rowData);
                            } else {
                                updateList.push(rowData);
                            }
                            $("#grid_editing_bangthuengoai").pqGrid("refreshRow", {rowIndx: rowIndx});
                            $("#grid_editing_bangthuengoai").find("button.delete_btn").button({icons: {primary: 'ui-icon-scissors'}})
                                .unbind("click")
                                .bind("click", function (evt) {
                                    var $tr = $(this).closest("tr");
                                    var rowIndx = $grid.pqGrid("getRowIndx", {$tr: $tr}).rowIndx;
                                    res = confirm("Bạn có muốn xoá dòng này không ?");
                                    if (res) {
                                        $grid.pqGrid("deleteRow", {rowIndx: rowIndx});
                                    }
                                });
                        }
                    }
                    else if (type == 'delete') {
                        if (rowData[recIndx] != null) {
                            deleteList.push(rowData);
                        }
                    }
                }
                if (addList.length || updateList.length || deleteList.length) {
                    $.ajax({
                        url: $dir_module_bangkechitien + "list.php", //for ASP.NET
                        data: {
                            list: JSON.stringify({
                                updateList: updateList,
                                addList: addList,
                                deleteList: deleteList
                            })
                        },
                        dataType: "json",
                        type: "POST",
                        async: true,
                        beforeSend: function (jqXHR, settings) {
                            $(".saving", $grid).show();
                        },
                        success: function (changes) {
                            //commit the changes.
                            grid.commit({type: 'add', rows: changes.addList});
                            grid.commit({type: 'update', rows: changes.updateList});
                            grid.commit({type: 'delete', rows: changes.deleteList});
                        },
                        complete: function () {
                            $(".saving", $grid).hide();
                        }
                    });
                }
            },
            history: function (evt, ui) {
                var $grid = $(this);
                if (ui.canUndo != null) {
                    $("button.changes", $grid).button("option", {disabled: !ui.canUndo});
                }
                if (ui.canRedo != null) {
                    $("button:contains('Redo')", $grid).button("option", "disabled", !ui.canRedo);
                }
                $("button:contains('Undo')", $grid).button("option", {label: 'Undo (' + ui.num_undo + ')'});
                $("button:contains('Redo')", $grid).button("option", {label: 'Redo (' + ui.num_redo + ')'});
            },
            colModel: [
                {
                    title: "Ngày mua hàng", width: 120, dataType: "string", align: "right", dataIndx: "ngaymuahang",
                    render: function (ui) {
                        var $yyyy_mm_dd = ui.rowData.ngaymuahang;
                        return Format_dd_mm_yyyy($yyyy_mm_dd);
                    },
                    editor: {
                        type: 'date'
                    },
                    validations: [{type: 'nonEmpty', msg: "Không được trống"}]
                },
                {
                    title: "Họ và Tên người bán", width: 165, dataType: "string", dataIndx: "hoten",
                    validations: [
                        {type: 'nonEmpty', msg: "Không được trống"},
                    ]
                },
                {
                    title: "Địa chỉ", width: 140, dataType: "string", align: "left", dataIndx: "diachi"
                },
                {
                    title: "Số CMND", width: 140, dataType: "string", align: "left", dataIndx: "socmnd"
                },
                {
                    title: "Tên hàng",
                    width: 150,
                    dataType: "string",
                    align: "left",
                    dataIndx: "noidung",
                    validations: [
                        {type: 'nonEmpty', msg: "Không được trống"},
                    ],
                    editor: {type: "textarea", attr: "rows=4"},
                },
                {
                    title: "Số Lượng", width: 70, dataType: "float", align: "right", dataIndx: "socong",
                    validations: [{type: 'nonEmpty', msg: "Không được trống"}]
                },
                {
                    title: "Đơn giá", width: 100, dataType: "integer", align: "right", dataIndx: "dongia",
                    validations: [{type: 'nonEmpty', msg: "Không được trống"}],
                    render: function (ui) {
                        var cellData = ui.cellData;
                        return $.number(cellData, 0, ".", ",");
                    }
                },
                {
                    title: "Thành tiền", width: 100, dataType: "integer", align: "right", dataIndx: "thanhtien",editable: false
                    , render: function (ui) {
                    var cellData = ui.cellData;
                    return $.number(cellData, 0, ".", ",");
                }
                },
                {
                    title: "Ghi chú", width: 100, dataType: "integer", align: "right", dataIndx: "ghichu",editable: true
                    ,
                editor: {type: "textarea", attr: "rows=4"},
                },
                {
                    title: "", editable: false, minWidth: 83, sortable: false,
                    render: function (ui) {
                        return "<button type='button' class='delete_btn'>Xoá</button>";
                    }
                }
            ],
            dataModel: {
                dataType: "JSON",
                location: "remote",
                recIndx: "ProductID",
                url: $dir_module_bangkechitien + "list.php", //for ASP.NET
                //url: "/pro/products.php", //for PHP
                getData: function (response) {
                    return {data: response.data};
                }
            },
            load: function (evt, ui) {
                var grid = $(this).pqGrid('getInstance').grid,
                    data = grid.option('dataModel').data;
                var ret = grid.isValid({data: data, allowInvalid: false});
            },
            refresh: function () {
                $("#grid_editing_bangthuengoai").find("button.delete_btn").button({icons: {primary: 'ui-icon-scissors'}})
                    .unbind("click")
                    .bind("click", function (evt) {
                        var $tr = $(this).closest("tr");
                        var rowIndx = $grid.pqGrid("getRowIndx", {$tr: $tr}).rowIndx;
                        res = confirm("Bạn có muốn xoá dòng này không ?");
                        if (res) {
                            $grid.pqGrid("deleteRow", {rowIndx: rowIndx});
                        }
                    });
            }
        };
        var $grid = $("#grid_editing_bangthuengoai").pqGrid(obj);
        //--------------------------------Khai báo lưới---------------------------------------.
        var dialog, form,
            emailRegex = /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/,
            btnstt = $("#btnstt"),
            allFields = $([]).add(btnstt),
            tips = $(".validateTips");

        function updateTips(t) {// Hiện thông báo khi lỗi
            tips
                .text(t)
                .addClass("ui-state-highlight");
            setTimeout(function () {
                tips.removeClass("ui-state-highlight", 1500);
            }, 500);
        }

        function checkLength(o, n, min, max) {// Kiểm tra chiều dài chuổi nhập vào
            if (o.val().length > max || o.val().length < min) {
                o.addClass("ui-state-error");
                updateTips("Chiều dài của " + n + " phải nằm giữa " +
                    min + " và " + max + ".");
                o.focus();
                return false;
            } else {
                return true;
            }
        }

        function checkNum(o, n) {// Kiểm tra chiều dài chuổi nhập vào
            if (o.val()) {
                o.addClass("ui-state-error");
                updateTips(n + " không phải số .");
                o.focus();
                return false;
            } else {
                return true;
            }
        }

        function checkNull(o, n) {
            if (o.val() == "") {
                o.addClass("ui-state-error");
                updateTips(n + " không được trống .");
                o.focus();
                return false;
            } else {
                return true;
            }
        }

        function checkSelect(o, n) {
            if (o.val() == "-1") {
                o.addClass("ui-state-error");
                updateTips(n + " không được trống .");
                o.focus();
                return false;
            } else {
                return true;
            }
        }

        function checkRegexp(o, regexp, n) {
            if (!( regexp.test(o.val()) )) {
                o.addClass("ui-state-error");
                updateTips(n);
                return false;
            } else {
                return true;
            }
        }

        ////end phím tắt-----------------------------------
        $("#mabangchi").keydown(function (event) {// Gọi table khách hàng để chọn
            if (event.keyCode == Keys.ENTER || event.keyCode == Keys.TAB) { //
                checkSTT("mabangchi");
            }
        });
        $("#makh").keydown(function (event) {// Gọi table mã nội dung để chọn
            if (event.keyCode == Keys.ENTER) { // copy
                $("#hotennguoichi").focus();
            }
        });
        $("#hotennguoichi").keydown(function (event) {// Gọi table mã nội dung để chọn
            if (event.keyCode == Keys.ENTER) { // copy
                $("#bophan").focus();
            }
        });
        $("#bophan").keydown(function (event) {// Gọi table mã nội dung để chọn
            if (event.keyCode == Keys.ENTER) { // copy
                $("#ngay").focus();
            }
        });

        $("#ngay").focus(function (event) {// Gọi table mã nội dung để chọn
            $ngay = $("#ngay").val();
            if ($ngay == "") { // copy
                $("#ngay").val("<?php echo  date("Y-m-d") ?>");
            }
        })

        function checkSTT(STT) {// Check key khi nhấn enter
            $STT = $("#" + STT).val().trim();
            if ($STT == "") {//Nếu số thứ tự null sẽ tạo số mới tự động tăng theo mã
                alert("Mã bảng kê chi tiền không được trống !");
                $("#mabangchi").focus();
            } else {// Nếu không trống kiểm tra xem có tồn tại hay không
                var $checkphieuthuchi = 0;
                $.ajax({// Kiểm tra xem STT có tồn tại hay không
                    url: $dir_module_bangkechitien + "checkkey.php",
                    data: {ma: $STT},
                    async: false,
                    success: function (response) {
                        $checkphieuthuchi = response;
                    }
                });
                if ($checkphieuthuchi == 0) {
                    alert("Mã bảng kê chi tiền không tồn tại ! Vui Lòng nhập lại");
                    $("#mabangchi").focus();
                } else {
                    $("#makh").focus();
                }
            }
        }
        $("#makh").focusout(function (event) {// Gọi table mã nội dung để chọn
            $makh = $("#makh").val().trim();
            if ($('.dialog_main_makh').html()=="") { // copy
                goitablemakhachhang($makh);
            }
        });

        function goitablemakhachhang($vale) {
            if ($vale == "") {// nếu tk nợ trống thì bật tra bảng
                $('.dialog_main_makh').load("form/frm_dm_makh_form_select.php?idstyle=Form-chinh&idinput=makh***hotennguoichi***bophan***masothue***makhachhang2***tenkhachhang2***diachi2&idfocus=hotennguoichi&ma="+$("#makh").val());
            } else {// nếu tk có không trống
                $data = "";
                $.ajax({
                    url: $dir_module_makhachhang + "laythongtinkhachhang.php",
                    data: {'ma': $vale},
                    async: false,
                    success: function (response) {
                        $data = $.parseJSON(response);
                    }
                });
                if ($data != null) { // Nếu tk có tòn tại trong hệ thống tài khoản thì lấy giá trị và gán vào textbox
                    $("#makh").val($data.makh);
                    $("#hotennguoichi").val($data.tenkh);
                    $("#bophan").val($data.diachi);
                    masothue.val($data.masothue);

                    //manoidung.focus();

                } else {
                    $('.dialog_main_makh').load("form/frm_dm_makh_form_select.php?idstyle=Form-chinh&idinput=makh***hotennguoichi***diachi***masothue***makhachhang2***tenkhachhang2***diachi2&idfocus=makh&ma="+$("#makh").val());
                }
            }
        }

        function ChucNang_nhapkho() {// Xử lý khi nhấp button đồng ý
            var valid = true;

            allFields.removeClass("ui-state-error");// kiem tra du lieu

            valid = valid && checkNull($("#mabangchi"), " Mã bảng kê  ");
            valid = valid && checkNull($("#makh"), " Mã người thu mua  ");
            valid = valid && checkNull($("#hotennguoichi"), " Họ và tên người thu mua ");
            valid = valid && checkNull($("#bophan"), " Bộ phận ");
            //valid = valid && checkNull($("#lydochi"), " Lý do chi ");
            valid = valid && checkNull($("#ngay"), " Ngày ");
            //valid = valid && checkSoHoaDonTrung();
            $mabangke = $("#mabangchi").val().trim();
            var $checkphieuthuchi = 0;
            $.ajax({// Kiểm tra xem STT có tồn tại hay không
                url: $dir_module_bangkechitien + "checkkey.php",
                data: {ma: $mabangke},
                async: false,
                success: function (response) {
                    $checkphieuthuchi = response;
                }
            });
            if ($checkphieuthuchi == 0) {
                alert("Mã bảng kê chi tiền không tồn tại ! Vui Lòng nhập lại");
                $("#mabangchi").focus();
            }

            var danhsach = $( "#grid_editing_bangthuengoai" ).pqGrid( "getData", { dataIndx: ['ngaymuahang','hoten', 'diachi','socmnd','noidung','socong','dongia','thanhtien','ghichu'] } );
            if (valid) {
                $.ajax({
                    url: $dir_module_bangkechitien + "nhapbangkekhonghoadon.php", // Bao gồm cả add và edit
                    type: "get", // chọn phương thức gửi là get
                    dateType: "text", // dữ liệu trả về dạng text
                    data: { // Danh sách các thuộc tính sẽ gửi đi
                        mabangke: $("#mabangchi").val().trim(),
                        hotennguoichi: $("#hotennguoichi").val().trim(),
                        bophan: $("#bophan").val().trim(),
                        lydochi: $("#lydochi").val().trim(),
                        ngay: $("#ngay").val().trim(),
                        danhsach:danhsach,
                    },
                    success: function (result) {
                        $('.dialog_main_thongbao').load('form/frm_thongbao_bangthanhtoan_khonghoadon.php?mabangke=' + $mabangke);
                    }
                });
            }

            return valid;
        }

        function xoadialog_nhapkho() {// đóng form
            reset_dialog(".dialog-tangtaisan");
            reset_dialog(".dialog_main_dinhmuc_sanpham");
        }

        function change_data_quit_mavattu() { // Cảnh báo thoát khi thay đổi dữ liệu////////////////////////////////////////////////////
            {
                $.confirm({
                    title: 'Thông báo',
                    content: 'Bạn đang chuẩn bị thoát cửa sổ này ? .<br/>Nhấn phím <strong style="color:blue;">[Y]</strong> để đồng ý phím <strong style="color:red;">[N]</strong> để hủy bỏ ',
                    icon: 'fa fa-warning',
                    type: 'red',
                    buttons: {
                        "Đồng ý": {
                            keys: ['Y'], action: function () {
                                xoadialog_nhapkho();
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

        dialog = $("#dialog-tangtaisan").dialog({
            autoOpen: false,
            height: getHeight()-100,
            width: getWidth()-100,
            modal: true,
            buttons: {
                "Đồng ý": ChucNang_nhapkho,
                "Kết thúc": function () {
                    change_data_quit_mavattu();
                }
            }
        });
        dialog.dialog("open");
        if('<?php echo $mabangke ?>'!=""){
            $("#mabangchi").val(<?php echo $mabangke; ?>);
            checkSTT("mabangchi");
        }
    });
</script>