<?php
require("../config.php");
$OBJ = new baocaothue();
$sql = "select * from kyketoan";
$res = $OBJ->re_query($sql);
$data = $OBJ->re_fetch($res);
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
        padding: 1px !important;
        font-size: 12px;
        font-family: Arial, Lucida Grande, Lucida Sans, sans-serif;
        font-weight: normal;
    }

    #Form-chinh input.button {
        height: 21px;
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
        background-color: gray;
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
</style>
<div id="dialog-hinhthuc_khaibaothue" title="Thiết lập kỳ kế toán...">
<p class="validateTips"> </p>
    <form method="post" id="Form-chinh" enctype="multipart/form-data">
        <fieldset style="background-color: #afd9ee" >
            <table border="0" style="width: 100%;">
                <tr>
                    <td style="padding-top:3px;"><label for="PhuongPhapTinhThue">Từ ngày</label></td>
                    <td><input style="text-align: right" type="date" value="<?php echo $data['tungay']; ?>" name="kyketoan_tungay" id="kyketoan_tungay" class="text ui-widget-content ui-corner-all" ></td>
                    <td style="padding-top:3px;"><label for="PhuongPhapTinhThue">&nbsp;&nbsp;Đến ngày</label></td>
                    <td><input style="text-align: right" value="<?php echo $data['denngay']; ?>" type="date" name="kyketoan_denngay" id="kyketoan_denngay" class="text ui-widget-content ui-corner-all" ></td>
                </tr>
            </table>
        </fieldset>
    </form>
</div>

<script>
    $height = 300;
    $width = 500;
    $dir_module_mabp = "modules/mabp/";////////////////Khai báo đường dẫn vào mudole
    $dir_module_makhachhang = "modules/makhachhang/";////////////////Khai báo đường dẫn vào mudole
    $dir_module_manoidung = "modules/manoidung/";////////////////Khai báo đường dẫn vào mudole
    $dir_module_baocaothue = "modules/baocaothue/";//----------------Lưới
    ///$dir_module_phieuthuchi = "modules/psmavattu/";//----------------Lưới
    $dir_module_nhapkho = "modules/psmavattu/";//----------------Lưới
    $dir_module_matk = "modules/httk/";////////////////Khai báo đường dẫn vào mudole
    $(function () {
        readonlyInput();
        var dialog, form,
            emailRegex = /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/,
            rd_thangtonkho = $("#rd_thangtonkho"),
            tuthang = $("#tuthang"),
            tinhlaituthang = $("#tinhlaituthang"),

            rd_congdonthangtonkho = $("#rd_congdonthangtonkho"),
            congdontuthang = $("#congdontuthang"),
            congdondenthang = $("#congdondenthang"),
            Intheothuesuat = $("#Intheothuesuat"),
            Intheochungtu = $("#Intheochungtu"),
            sapxeptheohoadon = $("#sapxeptheohoadon"),
            kieuin = $("#kieuin"),
            theothongtu = $("#theothongtu"),


            allFields = $([]).add(rd_thangtonkho)/////////////////////////////////////////////////////////////////////////////////////
                .add(tuthang)
                .add(tinhlaituthang)
                .add(rd_congdonthangtonkho)
                .add(congdontuthang)
                .add(congdondenthang)
                .add(Intheothuesuat)
                .add(Intheochungtu)
                .add(sapxeptheohoadon)
                .add(kieuin)
                .add(theothongtu)

            tips = $(".validateTips"); // ///////////////////////////////////////////////////////////////////////////////khai bao bien

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
        function sosanhngay(ngaybd,ngaykt) {
            if ($ngaydb>$ngaykt) {
                $("#congdondenthang").addClass("ui-state-error");
                updateTips("Ngày bắt đầu lớn hơn ngày kết thúc !");
                $("#congdondenthang").focus();
                return false;
            } else {
                return true;
            }
        }

        function checkKey(Ma, n) {// Check key khi nhấn submit
            var Checkkey = $("#CheckKeyMaBP").val();
            if (Checkkey == 1) {
                Ma.addClass("ui-state-error");
                updateTips(n + " đã tồn tại ! Vui lòng nhập lại !");
                return false;
            } else {
                return true;
            }
        }

        rd_thangtonkho.change(function () {
            readonlyCheckThang();
        });
        rd_congdonthangtonkho.change(function () {
            readonlyCheckCongDon();
        });

///-------------------------Di chuyễn các phần tử bằng enter----------------

        $("#rd_congdonthangtonkho").keydown(function (event) {// Gọi table mã nội dung để chọn
            if (event.keyCode == Keys.ENTER) { // copy
                $("#congdontuthang").focus();
            }
        })
        $("#congdontuthang").keydown(function (event) {// Gọi table mã nội dung để chọn
            if (event.keyCode == Keys.ENTER) { // copy
                $("#congdondenthang").focus();
            }
        })

        $("#congdondenthang").keydown(function (event) {// Gọi table mã nội dung để chọn
            if (event.keyCode == Keys.ENTER) { // copy
                $("#khautrughangthang").focus();
            }
        })
        $("#khautrughangthang").keydown(function (event) {// Gọi table mã nội dung để chọn
            if (event.keyCode == Keys.ENTER) { // copy
                $("#thuedenghihoan").focus();
            }
        })

        $("#thuedenghihoan").keydown(function (event) {// Gọi table mã nội dung để chọn
            if (event.keyCode == Keys.ENTER) { // copy
                $("#doanhsogtgtkhautru").focus();
            }
        })
        $("#doanhsogtgtkhautru").keydown(function (event) {// Gọi table mã nội dung để chọn
            if (event.keyCode == Keys.ENTER) { // copy
                $("#thuegtgtkhautru").focus();
            }
        })
        $("#thuegtgtkhautru").keydown(function (event) {// Gọi table mã nội dung để chọn
            if (event.keyCode == Keys.ENTER) { // copy
                $("#doanhsogtgtdaura").focus();
            }
        })
        $("#doanhsogtgtdaura").keydown(function (event) {// Gọi table mã nội dung để chọn
            if (event.keyCode == Keys.ENTER) { // copy
                $("#thuegtgtdaura").focus();
            }
        })
        $("#thuegtgtdaura").keydown(function (event) {// Gọi table mã nội dung để chọn
            if (event.keyCode == Keys.ENTER) { // copy
                $("#thuegtgtngoaitinh").focus();
            }
        })

        $("#thuegtgtngoaitinh").keydown(function (event) {// Gọi table mã nội dung để chọn
            if (event.keyCode == Keys.ENTER) { // copy
                $("#thuegtgtmuavaoduandautu").focus();
            }
        })

        $("#congdontuthang").change(function (event) {// Gọi table mã nội dung để chọn
            $tuthang = $("#congdontuthang").val();
            $denthang = $("#congdondenthang").val();
            if($tuthang>$denthang){
                //$("#congdontuthang").val($tuthang);
                $("#congdondenthang option[value="+$tuthang+"]").attr('selected','selected');
            }
        })
        $("#congdondenthang").change(function (event) {// Gọi table mã nội dung để chọn
            $tuthang = $("#congdontuthang").val();
            $denthang = $("#congdondenthang").val();
            if($tuthang>$denthang){
                //$("#congdontuthang").val($tuthang);
                $("#congdontuthang option[value="+$denthang+"]").attr('selected','selected');
            }
        })


///-------------------Kết thúc--------------------------------
        function readonlyCheckThang() {
            congdontuthang.attr("disabled", true);
            congdondenthang.attr("disabled", true);

            tuthang.attr("disabled", false);
            tinhlaituthang.attr("disabled", false);
            sole.attr("disabled", false);
            Insotonkho.attr("disabled", false);
            Ingiatritonkho.attr("disabled", false);
            giatrilonhon.attr("disabled", false);
        }

        function readonlyCheckCongDon() {
            congdontuthang.attr("disabled", false);
            congdondenthang.attr("disabled", false);

            tuthang.attr("disabled", true);
            tinhlaituthang.attr("disabled", true);
            sole.attr("disabled", true);
            Insotonkho.attr("disabled", true);
            Ingiatritonkho.attr("disabled", true);
            giatrilonhon.attr("disabled", true);
        }

        function readonlySubmitSTT() {
        }

        function readonlyNonSubmitSTT() {
        }

        function readonlyInput() {

        }

        function notReadonlyInput() {

        }


        function xoaform_phieuthuchi($mangsang) {//------------------------------------------------------------------------------------
        }//-------------------------------------------------------------------------------------------------------

        function ChucNang_ThuChi() {// Xử lý khi nhấp button đồng ý
            var valid = true;
            allFields.removeClass("ui-state-error");// kiem tra du lieu
            valid = valid && checkNull($("#kyketoan_tungay"), " Kỳ kế toán  ");
            valid = valid && checkNull($("#kyketoan_denngay"), " Kỳ kế toán  ");
            $kyketoan_tungay = $("#kyketoan_tungay").val();
            $kyketoan_denngay = $("#kyketoan_denngay").val();
            if (valid) {
                $.ajax({
                    url: $dir_module_baocaothue+"edit_kyketoan.php", // Thay dổi file
                    type: "get", // chọn phương thức gửi là get
                    dateType: "text", // dữ liệu trả về dạng text
                    data: { // Danh sách các thuộc tính sẽ gửi đi
                        kyketoan_tungay: $("#kyketoan_tungay").val(),
                        kyketoan_denngay: $("#kyketoan_denngay").val()
                    },
                    success: function(result) {
                        // Sau khi gửi và kết quả trả về thành công thì gán nội dung trả về
                        $('.validateTips').html(result);
                        $.confirm({
                            title: 'Thông báo',
                            content: ' Cập nhật dữ liệu thành công.',
                            autoClose: 'OK|1000',
                            icon: 'fa fa-spinner fa-spin',
                            type: 'green',
                            buttons: {
                                OK: function() {
                                    xoadialog_bangketoankho();
                                }
                            }
                        });
                    }
                });
            }

            return valid;
        }

        function xoadialog_bangketoankho() {// đóng form
            reset_dialog(".dialog-hinhthuc_khaibaothue");
            reset_dialog(".dialog_main_hinhthuc_khaibaothue");
        }

        dialog = $("#dialog-hinhthuc_khaibaothue").dialog({
            autoOpen: false,
            height: "auto",
            width: $width,
            modal: true,
            buttons: {
                "Đồng ý": ChucNang_ThuChi,
                "Kết thúc": function () {
                    xoadialog_bangketoankho();
                }
            }
        });
        dialog.dialog("open");
    })
    ;
</script>