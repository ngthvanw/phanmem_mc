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

    #table_chitiet tr td {
        border: 1px solid #4297d7;
        margin: 1px;
        padding: 1px;
    }

    #table_chitiet .table_head td {
        text-align: center;
        font-weight: bold;
    }

    #table_tonghop tr > td {
        border: 1px solid #09F;
    }
</style>
<div id="dialog-tangtaisan" title="BẢNG KÊ CHI TIỀN (F8: XOÁ BẢNG KÊ)">
    <p class="validateTips"></p>
    <form method="post" id="Form-chinh" enctype="multipart/form-data">
        <table border="0" width="100%">
            <tr>
                <td width="100%">
                    <fieldset style="background-color: #afd9ee;border: 0px solid">
                        <table class="table-dialog" style="vertical-align: middle;width: 100%" border="0"
                               id="table_tonghop">
                            <tr>
                                <td width="20%" style="padding: 2px;"><label for="name"> Mã bảng chi :</label></td>
                                <td width="80%" style="padding: 2px;"><input name="mabangchi" type="text" value=""
                                                                             autocomplete="off"
                                                                             required=""
                                                                             class="text ui-widget-content ui-corner-all"
                                                                             id="mabangchi" list="listmabangke"
                                                                             placeholder="Mã bảng chi"
                                                                             style="width: 100%">
                                    <datalist id="listmabangke"></datalist>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding: 2px;"><label for="name"> Họ tên người chi :</label></td>
                                <td style="padding: 2px;"><input name="hotennguoichi" type="text" value="" required=""
                                                                 class="text ui-widget-content ui-corner-all"
                                                                 id="hotennguoichi" placeholder="Họ và tên người chi "
                                                                 style="width: 100%"></td>
                            </tr>
                            <tr>
                                <td style="padding: 2px;"><label for="name"> Bộ phận :</label></td>
                                <td style="padding: 2px;"><input name="bophan" type="text" value="" required=""
                                                                 class="text ui-widget-content ui-corner-all"
                                                                 id="bophan" placeholder="Bộ phận " style="width: 100%">
                                </td>
                            </tr>
                            <tr>
                                <td style="padding: 2px;"><label for="name"> Chi cho công việc:</label></td>
                                <td style="padding: 2px;"><input name="lydochi" type="text" value="" required=""
                                                                 class="text ui-widget-content ui-corner-all"
                                                                 id="lydochi" placeholder="Chi cho công việc"
                                                                 style="width: 100%"></td>
                            </tr>
                            <tr>
                                <td style="padding: 2px;"><label for="name"> Ngày:</label></td>
                                <td style="padding: 2px;"><input name="ngay" type="date" value="" required=""
                                                                 class="text ui-widget-content ui-corner-all"
                                                                 id="ngay" placeholder="Chi cho công việc"
                                                                 style="width: 100%"></td>
                            </tr>
                            <tr>
                                <td width="100%" style="padding: 2px;height: 280px;" colspan="2"
                                    id="gird_danhsach_bangke_chitien"></td>
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
                // var js_arr = response.js_arr;
                for (var i = 0; i < $array.length; i++) {
                    //alert($array[i].makh);
                    $listmabangke += '<option value=' + $array[i].mabangke + '>' + $array[i].mabangke + '-' + bodauTiengViet($array[i].hotennguoichi) + '</option>';
                }
            }
        });

        $("#listmabangke").html($listmabangke);
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
        $("#hotennguoichi").keydown(function (event) {// Gọi table mã nội dung để chọn
            if (event.keyCode == Keys.ENTER) { // copy
                $("#bophan").focus();
            }
        })
        $("#bophan").keydown(function (event) {// Gọi table mã nội dung để chọn
            if (event.keyCode == Keys.ENTER) { // copy
                $("#lydochi").focus();
            }
        })
        $("#lydochi").keydown(function (event) {// Gọi table mã nội dung để chọn
            if (event.keyCode == Keys.ENTER) { // copy
                $("#ngay").focus();
            }
        })

        function xoabangkechitien($ma) {
            if ($ma == "") {
                alert("Mã bảng kê không được trống");
            } else {
                $.ajax({
                    url: $dir_module_bangkechitien + "xoabangkechitien.php",
                    async: false,
                    data: {mabangke: $ma},
                    success: function (response) {
                        $data = response;
                    }
                });
            }
        }

        $("#ngay").focus(function (event) {// Gọi table mã nội dung để chọn
            $ngay = $("#ngay").val();
            if ($ngay == "") { // copy
                $("#ngay").val("<?php echo date("Y-m-d") ?>");
            }
        })
        function checkSTT(STT) {// Check key khi nhấn enter
            $STT = $("#" + STT).val().trim();
            if ($STT == "") {//Nếu số thứ tự null sẽ tạo số mới tự động tăng theo mã
                var $data;
                $.ajax({
                    url: $dir_module_bangkechitien + "taomapskt.php",
                    async: false,
                    success: function (response) {
                        $data = response;
                    }
                });

                $.ajax({// Tạo số phiếu
                    url: $dir_module_bangkechitien + "nhapbangketmp.php",
                    async: false,
                    data: {mabangke: parseInt($data)},
                    success: function (response) {
                    }
                });
                $("#" + STT).val(parseInt($data));
                $("#gird_danhsach_bangke_chitien").load("form/gird_chitiet_bangke_chitien.php?mabangke=" + $STT);
                $("#mabangchi").attr("disabled", true);
                $("#hotennguoichi").focus();

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
                    if ($('div').hasClass('jconfirm') == false) {
                        $.confirm({
                            title: 'LƯU Ý',
                            content: ' Không tìm thấy chứng từ này<br/>Muốn chèn số chứng từ này vào không .<br/>Nhấn phím <strong style="color:blue;">[Y]</strong> để ĐỒNG Ý <strong style="color:blue;">[N]</strong> để HỦY BỎ ',
                            icon: 'fa fa-warning',
                            type: 'red',
                            buttons: {
                                "ĐỒNG Ý": {
                                    keys: ['Y'], action: function () {
                                        var $data;
                                        $.ajax({
                                            url: $dir_module_bangkechitien + "taomapskt.php",
                                            async: false,
                                            success: function (response) {
                                                $data = response;
                                            }
                                        });

                                        $.ajax({// Tạo số phiếu
                                            url: $dir_module_bangkechitien + "nhapbangketmp.php",
                                            async: false,
                                            data: {mabangke: parseInt($data)},
                                            success: function (response) {
                                            }
                                        });
                                        $("#" + STT).val(parseInt($data));
                                        $("#gird_danhsach_bangke_chitien").load("form/gird_chitiet_bangke_chitien.php?mabangke=" + $STT);
                                        $("#mabangchi").attr("disabled", true);
                                        $("#hotennguoichi").focus();
                                    }
                                },
                                "HỦY BỎ": {
                                    keys: ['N'], action: function () {

                                    }
                                }
                            }
                        });
                    }
                } else {
                    $data = "";
                    $.ajax({
                        url: $dir_module_bangkechitien + "laythongtinbangke.php",
                        data: {ma: $STT},
                        async: false,
                        success: function (response) {
                            $data = $.parseJSON(response);
                        }
                    });
                    $("#mabangchi").attr("disabled", true);
                    $("#mabangchi").val($data.mabangke);
                    $("#hotennguoichi").val($data.hotennguoichi);
                    $("#bophan").val($data.bophan);
                    $("#lydochi").val($data.lydochi);
                    $("#ngay").val($data.ngaychi);
                    $("#gird_danhsach_bangke_chitien").load("form/gird_chitiet_bangke_chitien.php?mabangke=" + $STT);
                    $("#hotennguoichi").focus();
                }
            }
        }

        function ChucNang_nhapkho() {// Xử lý khi nhấp button đồng ý
            var valid = true;

            allFields.removeClass("ui-state-error");// kiem tra du lieu

            valid = valid && checkNull($("#mabangchi"), " Mã bảng kê  ");
            valid = valid && checkNull($("#hotennguoichi"), " Họ và tên người chi ");
            valid = valid && checkNull($("#bophan"), " Bộ phận ");
            valid = valid && checkNull($("#lydochi"), " Lý do chi ");
            valid = valid && checkNull($("#ngay"), " Ngày ");
            //valid = valid && checkSoHoaDonTrung();
            $mabangke = $("#mabangchi").val().trim();

            if (valid) {
                $.ajax({
                    url: $dir_module_bangkechitien + "nhapbangke.php", // Bao gồm cả add và edit
                    type: "get", // chọn phương thức gửi là get
                    dateType: "text", // dữ liệu trả về dạng text
                    data: { // Danh sách các thuộc tính sẽ gửi đi
                        mabangke: $("#mabangchi").val().trim(),
                        hotennguoichi: $("#hotennguoichi").val().trim(),
                        bophan: $("#bophan").val().trim(),
                        lydochi: $("#lydochi").val().trim(),
                        ngay: $("#ngay").val().trim(),
                    },
                    success: function (result) {
                        $('.dialog_main_thongbao').load('form/frm_thongbao_bangkechi.php?mabangke=' + $mabangke);
                    }
                });
            }

            return valid;
        }

        function xoadialog_nhapkho() {// đóng form
            reset_dialog(".dialog-tangtaisan");
            reset_dialog(".dialog_main_dinhmuc_sanpham");
        }

        $("#Form-chinh").keydown(function (event) {// Gọi table mã nội dung để chọn
            if (event.keyCode == Keys.F8) { // copy
                $ma = $("#mabangchi").val();

                if ($ma != "") {
                    var answer = confirm("Bạn có muốn xóa bảng kê chi tiền này ?");
                    if (answer) {
                        xoabangkechitien($ma);
                        $("#mabangchi").attr("disabled", false);
                        $("#mabangchi").val("");
                        $("#mabangchi").focus();
                    }

                }

            }
        })

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
            height: 520,
            width: 720,
            modal: true,
            buttons: {
                "Đồng ý": ChucNang_nhapkho,
                "Kết thúc": function () {
                    $mabangke = $("#mabangchi").val().trim();
                    $.ajax({// Load danh sách mã khách hàng
                        url: $dir_module_bangkechitien + "del_bangke_null.php",
                        async: false,
                        dataType: "json",
                        data: {mabangke: $mabangke},
                        success: function (response) {
                        }
                    });
                    change_data_quit_mavattu();
                }
            }
        });
        dialog.dialog("open");
    });
</script>