<?php
require("../config.php");
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
<div id="dialog-tangtaisan" title="THỐNG KÊ DUYỆT TỜ KHAI THUẾ GTGT">
    <p class="validateTips"></p>
    <form method="post" id="Form-chinh" enctype="multipart/form-data">
        <table border="0" width="100%">
            <tr>
                <td width="100%">
                    <fieldset style="background-color: #afd9ee;border: 0px solid">
                        <table class="table-dialog" style="vertical-align: middle;width: 100%" border="0" cellspacing="10" cellpadding="10" id="table_tonghop">
                            <tr>
                                <td width="10%" style="padding: 2px;"><label for="name"> Niên độ</label></td>
                                <td width="90%" style="padding: 2px;"><input name="niendo" type="text" value="<?php echo $_SESSION['NienDo'] ?>" autocomplete="off"
                                                                             required=""
                                                                             class="text ui-widget-content ui-corner-all"
                                                                             id="niendo"  placeholder="Niên Độ"
                                                                             style="width: 100%">
                                </td>
                            </tr>
                            <tr>
                                <td style="padding: 2px;"><label for="name">Doanh nghiệp khai thuế GTGT</label></td>
                                <td style="padding: 2px;">
                                    <table style="border: 0px solid whitesmoke;">
                                        <tr>
                                            <td style="text-align: left;border: black 0px solid;">Theo tháng </td>
                                            <td width="10px" style="border: black 0px solid;text-align: center;"><input type="radio" style="margin: 5px;" name="khaithuetheo" id="khaitheothang"></td>
                                            <td style="border: black 0px solid;">
                                                <select disabled="true" style="width: 150px;height:25px" id="sel_khaitheothang">
                                                    <option value="">--- Chọn Tháng ---</option>
                                                    <option value="1">Tháng 1</option>
                                                    <option value="2">Tháng 2</option>
                                                    <option value="3">Tháng 3</option>
                                                    <option value="4">Tháng 4</option>
                                                    <option value="5">Tháng 5</option>
                                                    <option value="6">Tháng 6</option>
                                                    <option value="7">Tháng 7</option>
                                                    <option value="8">Tháng 8</option>
                                                    <option value="9">Tháng 9</option>
                                                    <option value="10">Tháng 10</option>
                                                    <option value="11">Tháng 11</option>
                                                    <option value="12">Tháng 12</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: left;border: black 0px solid;">Theo quý </td>
                                            <td style="border: black 0px solid;"><input checked style="margin: 5px;" type="radio" name="khaithuetheo" id="khaitheoquy"></td>
                                            <td style="border: black 0px solid;" >
                                                <select style="width: 150px;height:25px" id="sel_khaitheoquy">
                                                    <option value="">--- Chọn Quý ---</option>
                                                    <option value="I">Quý I</option>
                                                    <option value="II">Quý II</option>
                                                    <option value="III">Quý III</option>
                                                    <option value="IV">Quý IV</option>
                                                </select>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding: 2px;"><label for="name">Trạng thái</label></td>
                                <td style="padding: 2px;">
                                    <select style="width: 150px;height:25px" id="trangthai">
                                        <option value="ALL">--- Tất cả ---</option>
                                        <option value="0">Chưa duyệt</option>
                                        <option value="1">Đã duyệt</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding: 2px;"><label for="name">Người phụ trách</label></td>
                                <td style="padding: 2px;">
                                    <select style="width: 150px;height:25px" id="nguoiphutrach">
                                        <option value="ALL">--- Tất cả ---</option>
                                    </select>
                                </td>
                            </tr>

                            <tr >
                                <td style="padding: 2px;"></td>
                                <td style="padding: 2px;">
                                    <table>
                                        <tr>
                                            <td width="200px" style="border: black 0px solid;"><button type="button" ID="thongke" class="ui-button ui-corner-all ui-widget">THỐNG KÊ</button></td>
                                            <td width="200px" style="border: black 0px solid;"><button type="button" ID="xuatbaocao" class="ui-button ui-corner-all ui-widget">XUẤT BÁO CÁO</button></td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td width="90%" style="padding: 2px;" colspan="2">
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
    $dir_module_makhachhang = "modules/makhachhang/";////////////////Khai báo đường dẫn vào mudole
    $dir_module_matk = "modules/httk/";
    $dir_module_manoidung = "modules/manoidung/";////////////////Khai báo đường dẫn vào mudole
    $dir_module_mact = "modules/macongtrinh/";////////////////Khai báo đường dẫn vào mudole
    $dir_module_chitiet_vattu = "modules/ps_chitiet_mavt/";//----------------Lưới
    $dir_module_dmsanpham = "modules/dmsanpham/";//----------------Lưới
    $dir_module_nhomtaisan = "modules/nhomtaisan/";//----------------Lưới
    $dir_module_bangkechitien = "modules/bangkechitien/";//----------------Lưới
    $dir_module_user = "modules/user/";

    $(function () {
        /////////////////////////////////////////////////////// Danh sách Autocomplex

        var obj = {
            hwrap: true,
            resizable: true,
            rowBorders: false,
            virtualX: true,
            height: getHeight()-330,
            width: getWidth()-35,
            numberCell: {show: true},
            trackModel: {on: true}, //to turn on the track changes
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
            colModel: [
                {
                    title: "Mã số thuế", width: 100, dataType: "string", align: "left", dataIndx: "masothue"
                },
                {
                    title: "Tên công ty", width: 300, dataType: "string", dataIndx: "tendoanhnghiep"
                },
                {
                    title: "Người phụ trách", width: 80, dataType: "string", align: "left", dataIndx: "tendangnhap"
                },
                {
                    title: "Tháng/Quý ", width: 80, dataType: "string", align: "center", dataIndx: "tokhaithang"
                },
                {
                    title: "Ngày duyệt",
                    width: 150,
                    dataType: "string",
                    align: "left",
                    dataIndx: "ngayduyet"
                },
                {
                    title: "TN duyệt", width: 100, dataType: "string", align: "center", dataIndx: "truongnhomduyet",
                    render: function (ui) {
                        var value = ui.rowData.truongnhomduyet;
                        if (value == '1') {
                            return "<img src='icon/check.png' alt='Đang chờ duyệt' width='20px'/>";
                        }else {
                            return "<img src='icon/uncheck.png' alt='Đã duyệt' width='20px' />";
                        }
                    }
                },
                {
                    title: "GĐ duyệt", width: 100, dataType: "string", align: "center", dataIndx: "giamdocduyet",
                    render: function (ui) {
                        var value = ui.rowData.giamdocduyet;
                        if (value == '1') {
                            return "<img src='icon/check.png' alt='Đang chờ duyệt' width='20px'/>";
                        }else {
                            return "<img src='icon/uncheck.png' alt='Đã duyệt' width='20px' />";
                        }
                    }
                }
            ],
            pageModel: { type: "local", rPP: 300, strRpp: "{0}", strDisplay: "{0} đến {1} của {2}" },
            dataModel: {
                dataType: "JSON",
                location: "remote",
                recIndx: "sott",
                url: $dir_module_user + "danhsach_thongke_duyettokhai.php", //for ASP.NET
                getData: function (response) {
                    return {data: response.data};
                }
            },
            load: function (evt, ui) {
                var grid = $(this).pqGrid('getInstance').grid,
                    data = grid.option('dataModel').data;
                var ret = grid.isValid({data: data, allowInvalid: false});
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

        function ChucNang_ThongKe() {// Xử lý khi nhấp button đồng ý
            var valid = true;

            allFields.removeClass("ui-state-error");// kiem tra du lieu

            valid = valid && checkNull($("#niendo"), " Niên độ  ");
            $LoaiToKhai = "Quy";
            if ($("#khaitheothang").prop("checked")) {
                $LoaiToKhai = "Thang";
                sel_khaitheo = $("#sel_khaitheothang").val();
                valid = valid && checkNull($("#sel_khaitheothang"), " Tháng  ");
            }else{
                $LoaiToKhai = "Quy";
                sel_khaitheo = $("#sel_khaitheoquy").val();
                valid = valid && checkNull($("#sel_khaitheoquy"), " Quý  ");
            }
            if (valid) {
                niendo = $("#niendo").val().trim();
                khaitheo = sel_khaitheo;
                trangthai = $("#trangthai").val().trim();
                nguoiphutrach = $("#nguoiphutrach").val().trim();
                $grid.pqGrid( "option", "dataModel.postData", function( ui ){
                    return {niendo:niendo,khaitheo:khaitheo,trangthai:trangthai,nguoiphutrach:nguoiphutrach,loaitokhai:$LoaiToKhai};
                } );
                $grid.pqGrid("refreshDataAndView");
            }

            return valid;
        }

        function xoadialog_nhapkho() {// đóng form
            reset_dialog(".dialog-tangtaisan");
            reset_dialog(".dialog_main_dinhmuc_sanpham");
        }

        $("#khaitheothang").change(function () {
            $("#sel_khaitheothang").attr("disabled", false);
            $("#sel_khaitheoquy").attr("disabled", true);
        });
        $("#khaitheoquy").change(function () {
            $("#sel_khaitheothang").attr("disabled", true);
            $("#sel_khaitheoquy").attr("disabled", false);
        });
        function loadcb_user() {
            $.ajax({
                url: $dir_module_user + "cb_user_phancong_html.php",
                async: false,
                success: function (response) {
                    $("#nguoiphutrach").html(response);
                }
            });
        }

        loadcb_user();

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
            height: getHeight(),
            width: getWidth(),
            modal: true,
            buttons: {
                "Kết thúc": function () {
                    change_data_quit_mavattu();
                }
            }
        });
        dialog.dialog("open");
        $("#thongke").click(function (event) {// Gọi table mã nội dung để chọn
            ChucNang_ThongKe();
        });

        $("#xuatbaocao").click(function (event) {// Gọi table mã nội dung để chọn
            $LoaiToKhai = "Quy";
            if ($("#khaitheothang").prop("checked")) {
                $LoaiToKhai = "Thang";
                sel_khaitheo = $("#sel_khaitheothang").val();
            }else{
                $LoaiToKhai = "Quy";
                sel_khaitheo = $("#sel_khaitheoquy").val();
            }
                niendo = $("#niendo").val().trim();
                khaitheo = sel_khaitheo;
                trangthai = $("#trangthai").val().trim();
                nguoiphutrach = $("#nguoiphutrach").val().trim();
            window.open("tcpdf/baocao/inbangke_thongke_tokhai_gtgt.php?niendo="+niendo+"&khaitheo="+khaitheo+"&trangthai="+trangthai+"&nguoiphutrach="+nguoiphutrach+"&loaitokhai="+$LoaiToKhai,"ThongKeToKhai","menubar=0,resizable=0");
        });
    });
</script>