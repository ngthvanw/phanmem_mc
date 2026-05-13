<?php
require("../config.php");
$cur_thang = date("n");
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
<div id="dialog-baocao_kqkd" title="Xác định kết quả kinh doanh...">
    <p class="validateTips"></p>
    <form method="post" id="Form-chinh" enctype="multipart/form-data">
        <fieldset style="background-color: #afd9ee">
            <legend>Kỳ tính của năm <?php echo $_SESSION['NienDo']; ?></legend>
            <table border="0" style="width: 100%;">
                <tr>
                    <td width="5px;"><input name="rd_kytinh" type="radio" id="rd_kytinhtheonam" checked="checked"></td>
                    <td width="80px;"><strong>Theo năm</strong></td>
                    <td width="350px;">&nbsp;</td>
                </tr>
                <tr>
                    <td><input name="rd_kytinh" type="radio" id="rd_kytinhtheoquy"/></td>
                    <td><strong>Theo quý</strong></td>
                    <td><select disabled="disabled" style="width:100px;height:22px;" name="txt_TheoQuy"
                                id="txt_TheoQuy">
                            <option value="I">Quý I</option>
                            <option value="II">Quý II</option>
                            <option value="III">Quý III</option>
                            <option value="VI">Quý IV</option>
                        </select></td>
                </tr>
            </table>
        </fieldset>
        <fieldset style="background-color: #afd9ee">
            <legend>Lọc nội dung chi phí lãi vay( Mã số 23)</legend>
            <table border="0" style="width: 100%;">
                <tr style="display:block">
                    <td>&nbsp;</b></td>
                </tr>
                <tr style="display:block">
                    <td><input type="checkbox" style="margin-top:5px" name="chk_xacdinh_chiphilaivay"
                               id="chk_xacdinh_chiphilaivay"/>
                        Xác định chi phí lãi vay = chi phí tài chính
                    </td>
                </tr>
            </table>
        </fieldset>
        <fieldset style="background-color: #afd9ee;display:none;">
            <legend>Chuyển số tồn kho sang năm mới</legend>
            <table>
                <tr>
                    <td><input type="checkbox" name="KhoaSoVaChuyenTonKho" id="KhoaSoVaChuyenTonKho"></td>
                    <td>&nbsp;Khóa sổ và chuyển tồn kho sang năm mới</td>
                </tr>
            </table>
        </fieldset>
    </form>
</div>

<script>
    $height = 300;
    $width = 450;
    $dir_module_mabp = "modules/mabp/";////////////////Khai báo đường dẫn vào mudole
    $dir_module_makhachhang = "modules/makhachhang/";////////////////Khai báo đường dẫn vào mudole
    $dir_module_manoidung = "modules/manoidung/";////////////////Khai báo đường dẫn vào mudole
    $dir_module_ps_kt = "modules/pskt/";//----------------Lưới
    $dir_module_ketoantonghop = "modules/ketoantonghop/";//----------------Lưới
    $dir_module_nhapkho = "modules/psmavattu/";//----------------Lưới
    $dir_module_matk = "modules/httk/";////////////////Khai báo đường dẫn vào mudole
    $(function () {
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

        function sosanhngay(ngaybd, ngaykt) {
            if ($ngaydb > $ngaykt) {
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

///-------------------------Di chuyễn các phần tử bằng enter----------------

        $("#rd_kytinhtheonam").change(function (event) {// Gọi table mã nội dung để chọn
            $("#txt_TheoQuy").attr("disabled", true);
        })
        $("#rd_kytinhtheoquy").change(function (event) {// Gọi table mã nội dung để chọn
            $("#txt_TheoQuy").attr("disabled", false);
        })


///-------------------Kết thúc--------------------------------

        function ChucNang_ThuChi() {// Xử lý khi nhấp button đồng ý
            var valid = true;
            allFields.removeClass("ui-state-error");// kiem tra du lieu

            $quy = "V";
            if ($("#rd_kytinhtheonam").prop("checked") == true) {
                $quy = "V";
            } else {
                $quy = $("#txt_TheoQuy").val();
            }
            $bangchiphitc = 0;
            if ($("#chk_xacdinh_chiphilaivay").prop("checked") == true) {
                $bangchiphitc = 0;
            }

            if (valid) {
                $tontai = false;
                $.ajax({
                    url: $dir_module_ketoantonghop + "checktontaikqkd.php",
                    async: false,
                    data:{quy:$quy},
                    success: function (response) {
                        if (parseInt(response) !=0 && response.trim() !="") {
                            $tontai = true;
                        }
                    }
                });
                if ($tontai) {
                    var result = confirm("Đã tồn tại bảng xác định kết quả kinh doanh ! Bạn có muốn ghi đè ?");
                    if (result) {
                        $.confirm({
                            title: 'Thành công',
                            type: 'green',
                            autoClose: 'OK|1000',
                            content: function(){
                                var self = this;
                                return $.ajax({
                                    url: $dir_module_ketoantonghop + "themphieu_ketqua_hoatdong_kinhdoanh.php",
                                    dataType: 'json',
                                    method: 'get',
                                    data: {
                                        quy:$quy,
                                    },
                                });
                            },
                            buttons: {
                                "OK": {
                                    keys: ['Y'], action: function () {
                                        $('.dialog_main_thongbao').load("form/frm_insolieu_ketqua_hoatdong_kinhdoanh.php?quy=" + $quy + "&bangchiphitc=" + $bangchiphitc);
                                    }
                                }
                            }
                        });
                    }else{
                        $('.dialog_main_thongbao').load("form/frm_insolieu_ketqua_hoatdong_kinhdoanh.php?quy=" + $quy + "&bangchiphitc=" + $bangchiphitc);
                    }
                }else{
                    $.confirm({
                        title: 'Thành công',
                        type: 'green',
                        autoClose: 'OK|1000',
                        content: function(){
                            var self = this;
                            return $.ajax({
                                url: $dir_module_ketoantonghop + "themphieu_ketqua_hoatdong_kinhdoanh.php",
                                dataType: 'json',
                                method: 'get',
                                data: {
                                    quy:$quy,
                                },
                            });
                        },
                        buttons: {
                            "OK": {
                                keys: ['Y'], action: function () {
                                    $('.dialog_main_thongbao').load("form/frm_insolieu_ketqua_hoatdong_kinhdoanh.php?quy=" + $quy + "&bangchiphitc=" + $bangchiphitc);
                                }
                            }
                        }
                    });
                }
            }


            return valid;
        }

        function xoadialog_bangketoankho() {// đóng form
            reset_dialog(".dialog-baocao_kqkd");
            reset_dialog(".dialog_main_baocao_kqkd");
        }
        function GoiThietLap_SoDuDK(){
                $('.dialog_main_thietlap_tokhai_phuluc').load("form/frm_thietlap_tokhaiyhue_xdkqkd.php?loaitokhai=XDKQKD");
        }

        dialog = $("#dialog-baocao_kqkd").dialog({
            autoOpen: false,
            height: "auto",
            width: $width,
            modal: true,
            buttons: {
                "Thay đổi số ĐK":GoiThietLap_SoDuDK,
                "Đồng ý": ChucNang_ThuChi,
                "Kết thúc": function () {
                    if ($("#Loai").val() == "Add" && $("#MaBP").val() != "") {
                        $.confirm({
                            title: 'Thông báo',
                            content: ' Dữ liệu đã được thay đổi bạn có muốn lưu không.',
                            icon: 'fa fa-warning',
                            buttons: {
                                "Đồng ý": function () {
                                },
                                "Hủy bỏ": function () {
                                    xoadialog_bangketoankho();
                                }
                            }
                        });
                    } else {
                        xoadialog_bangketoankho();
                    }
                }
            }
        });

        dialog.dialog("open");

    })
    ;
</script>