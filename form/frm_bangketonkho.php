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
<div id="dialog-bangketoankho" title="Bảng kê nhập xuất kho hàng...">
    <p class="validateTips"></p>
    <form method="post" id="Form-chinh" enctype="multipart/form-data">
        <fieldset style="background-color: #afd9ee">
            <legend>Kỳ tính của năm <?php echo $_SESSION['NienDo']; ?></legend>
            <table border="0" style="width: 100%;">
                <tr>
                    <td>&nbsp;</td>
                    <td>Từ tháng</td>
                    <td>
                        <select name="tuthang" style="height:20px;width:100px;" id="tuthang">
                            <?php
                            for ($i = 1; $i <= 12; $i++) {
                                $select = "";
                                if ($i == $cur_thang)
                                    $select = "selected";
                                ?>
                                <option <?php echo $select; ?>
                                        value="<?php echo $i; ?>"><?php echo "Tháng " . $i; ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </td>
                    <td>Đến tháng</td>
                    <td>
                        <select name="tinhlaituthang" style="height:20px;width:100px;" id="tinhlaituthang">
                            <?php
                            for ($i = 1; $i <= 12; $i++) {
                                $select = "";
                                if ($i == $cur_thang)
                                    $select = "selected";
                                ?>
                                <option <?php echo $select; ?>
                                        value="<?php echo $i; ?>"><?php echo "Tháng " . $i; ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </td>
                    <td>Số lẻ</td>
                    <td><input name="sole" type="number"
                               class="text ui-widget-content ui-corner-all" id="sole" style="width: 35px" max="3"
                               min="0" value="0"/></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td colspan="2"><input style="margin:5px;" name="rd_thangtonkho" type="radio" id="rd_thangtonkho"
                                           checked="checked"/>
                        Theo tháng
                    </td>
                    <td colspan="2"><input style="margin:5px;" name="rd_thangtonkho" type="radio"
                                           id="rd_congdonthangtonkho"/>
                        Cộng dồn từ tháng
                    </td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
            </table>
        </fieldset>
        <fieldset style="background-color: #afd9ee">
            <legend>Lựa chọn</legend>
            <table border="0" style="width: 100%;">
                <tr>
                    <td>
                        <select name="Insotonkho" style="height:20px;" id="Insotonkho">
                            <option value="1">Chỉ in tồn kho</option>
                            <option value="2">In toàn bộ cả phần nhập xuất tồn</option>
                        </select>
                    </td>
                    <td>
                        <select name="Inxoasoam" id="Inxoasoam" style="height:20px;">
                            <option value="1">In toàn bộ</option>
                            <option value="2">Xóa số âm</option>
                            <option value="3">Chỉ in số âm</option>
                            <option value="4">In hết(bao gồm số tồn kho 0)</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><b>&nbsp;Lọc theo tài khoản</b></td>
                    <td><b>In theo giá trị tồn kho</b></td>
                </tr>
                <tr>
                    <td>
                        <select name="LocTheoTK" id="LocTheoTK" style="height:20px;width:200px">
                            <option value="ALL">Tất cả</option>
                            <option value="151">151 - Hàng mua đang đi đường</option>
                            <option value="152">152 - Nguyên liệu, vật liệu</option>
                            <option value="153">153 - Công cụ, dụng cụ</option>
                            <option value="153">154 - Chi phí sản xuất, kinh doanh dở dang</option>
                            <option value="155">155 - Thành phẩm</option>
                            <optgroup label="156 - Hàng hóa">
                                <option value="1561">1561 - Giá trị hàng mua</option>
                                <option value="1562">1562 - Chi phí mua hàng</option>
                            </optgroup>
                            <option value="157">157 - Hàng gửi đi bán</option>

                        </select>
                    </td>
                    <td>
                        <select name="Ingiatritonkho" id="Ingiatritonkho" style="width: 180px;height:20px;">
                            <option value="1">In toàn bộ</option>
                            <option value="2">In lớn hơn</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><b style="font-size: 14px;">&nbsp;Phương pháp tính giá vốn xuất kho</b></td>
                    <td><input type="number" value="" name="giatrilonhon" id="giatrilonhon" step="1000000"
                               style="width: 180px;" class="text ui-widget-content ui-corner-all"/></td>
                </tr>
                <tr>
                    <td>
                        <select name="PhuongPhapTinhGiaVon" id="PhuongPhapTinhGiaVon" style="width: 200px;height:20px;">
                            <option <?php if($_SESSION['phuongphaptonkho']=="1"){echo 'selected=selected'; } ?> value="1">Bình quân tháng</option>
                            <option <?php if($_SESSION['phuongphaptonkho']=="2"){echo 'selected=selected'; } ?> value="2">Bình quân liên hoàn</option>
                        </select>
                    </td>
                    <td>
                        <table>
                            <tr>
                                <td><input type="checkbox" name="khongdinhkhoangiavon" id="khongdinhkhoangiavon"></td>
                                <td>&nbsp;Không định khoản giá vốn</td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td><b style="font-size: 14px;">&nbsp;Lọc theo kho hàng</b></td>
                    <td><b style="font-size: 14px;">&nbsp;Lọc theo nhóm hàng</b></td>
                </tr>
                <tr>
                    <td>
                        <select name="LocTheoKho" id="LocTheoKho" style="height:20px; width:200px;">
                            <option value="ALL">Tất cả các kho</option>
                            <option value="2">In toàn bộ cả phần nhập xuất tồn</option>
                        </select>
                    </td>
                    <td><select name="LocTheoNhomHang" id="LocTheoNhomHang" style="width: 180px;height:20px;">
                            <option value="ALL">Tất cả các kho</option>
                            <option value="2">In toàn bộ cả phần nhập xuất tồn</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">&nbsp;<b>Sắp xếp khi in</b></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <table style="width: 100%">
                            <tr>
                                <td><input name="sxtheonhommathang" type="checkbox" id="sxtheonhommathang"
                                           checked="checked"></td>
                                <td>Theo nhóm mặt hàng</td>
                                <td><input name="rd_sxtheo" type="radio" id="rd_sxtheoten" checked="checked"></td>
                                <td>Theo tên</td>
                                <td><input type="radio" name="rd_sxtheo" id="rd_sxtheomaso"></td>
                                <td>Theo mã số</td>
                            </tr>
                            <tr>
                                <td><input name="tutaobuttoanphatsinh" type="checkbox" id="tutaobuttoanphatsinh"
                                    ></td>
                                <td>Tự tạo nạp giá thành tiêu chuẩn</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td><input name="gomnhommavt" type="checkbox" checked id="gomnhommavt"
                                    ></td>
                                <td>Nhóm mã hàng</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </fieldset>
        <fieldset style="background-color: #afd9ee">
            <legend></legend>
            <table>
                <tr>
                    <td width="100%"><input style="color:#F00;width:100%" name="capnhatgiavonsanxuat" type="button"
                                            id="capnhatgiavonsanxuat" value="Cập nhật giá vốn cho từng phiếu"/></td>
                </tr>
            </table>
        </fieldset>
    </form>
</div>

<script>
    $height = 300;
    $width = 530;
    $dir_module_mabp = "modules/mabp/";////////////////Khai báo đường dẫn vào mudole
    $dir_module_makhachhang = "modules/makhachhang/";////////////////Khai báo đường dẫn vào mudole
    $dir_module_manhomvattu = "modules/manhomvattu/";//--------------------------------------------Thay đổi khi copy
    $dir_module_manoidung = "modules/manoidung/";////////////////Khai báo đường dẫn vào mudole
    $dir_module_makho = "modules/makho/";
    $dir_module_ps_kt = "modules/pskt/";//----------------Lưới
    ///$dir_module_phieuthuchi = "modules/psmavattu/";//----------------Lưới
    $dir_module_nhapkho = "modules/psmavattu/";//----------------Lưới
    $dir_module_matk = "modules/httk/";////////////////Khai báo đường dẫn vào mudole
    $dir_module_sltonkho = "modules/soluongtonkho/";////////////////Khai báo đường dẫn vào mudole
    $(function () {
        readonlyInput();
        var dialog, form,
            emailRegex = /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/,
            rd_thangtonkho = $("#rd_thangtonkho"),
            tuthang = $("#tuthang"),
            tinhlaituthang = $("#tinhlaituthang"),

            sole = $("#sole"),
            rd_congdonthangtonkho = $("#rd_congdonthangtonkho"),
            congdontuthang = $("#congdontuthang"),
            congdondenthang = $("#congdondenthang"),
            Insotonkho = $("#Insotonkho"),
            Inxoasoam = $("#Inxoasoam"),
            LocTheoTK = $("#LocTheoTK"),
            Ingiatritonkho = $("#Ingiatritonkho"),
            PhuongPhapTinhGiaVon = $("#PhuongPhapTinhGiaVon"),
            giatrilonhon = $("#giatrilonhon"),

            khongdinhkhoangiavon = $("#khongdinhkhoangiavon"),
            sxtheonhommathang = $("#sxtheonhommathang"),
            rd_sxtheoten = $("#rd_sxtheoten"),
            rd_sxtheomaso = $("#rd_sxtheomaso"),

            allFields = $([]).add(rd_thangtonkho)/////////////////////////////////////////////////////////////////////////////////////
                .add(tuthang)
                .add(tinhlaituthang)
                .add(sole)
                .add(rd_congdonthangtonkho)
                .add(congdontuthang)
                .add(congdondenthang)
                .add(Insotonkho)
                .add(Inxoasoam)
                .add(LocTheoTK)
                .add(Ingiatritonkho)
                .add(PhuongPhapTinhGiaVon)
                .add(giatrilonhon)
                .add(khongdinhkhoangiavon)
                .add(sxtheonhommathang)
                .add(rd_sxtheoten)
                .add(rd_sxtheomaso),

            tips = $(".validateTips"); // ///////////////////////////////////////////////////////////////////////////////khai bao bien

        function updateTips(t) {// Hiện thông báo khi lỗi
            tips
                .text(t)
                .addClass("ui-state-highlight");
            setTimeout(function () {
                tips.removeClass("ui-state-highlight", 1500);
            }, 500);
        }

        function load_cb_khohang() {
            $.ajax({
                url: $dir_module_makho + "listall_cb.php",
                async: false,
                success: function (response) {
                    $("#LocTheoKho").html("<option value='ALL'>--- Tất cả kho hàng---</option>"+response);
                }
            });
        }
        load_cb_khohang();

        function load_cb_nhomhang() {
            $.ajax({
                url: $dir_module_manhomvattu + "listall_cb.php",
                async: false,
                success: function (response) {
                    $("#LocTheoNhomHang").html("<option value='ALL'>--- Tất cả nhóm hàng---</option>"+response);
                }
            });
        }
        load_cb_nhomhang();

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

        rd_thangtonkho.change(function () {
            readonlyCheckThang();
        });
        rd_congdonthangtonkho.change(function () {
            readonlyCheckCongDon();
        });

        $("#Insotonkho").change(function () {
            if($("#Insotonkho").val()=='2'){
                $("#Inxoasoam").val("4");
                $("#rd_congdonthangtonkho").attr('checked', true);
                $("#rd_thangtonkho").attr('checked',false);
            }else{
                $("#rd_congdonthangtonkho").attr('checked', false);
                $("#rd_thangtonkho").attr('checked',true);
                $("#Inxoasoam").val("1");
            }
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
                $("#sole").focus();
            }
        })

        $("#sole").keydown(function (event) {// Gọi table mã nội dung để chọn
            if (event.keyCode == Keys.ENTER) { // copy
                $("#Insotonkho").focus();
            }
        })
        $("#Insotonkho").keydown(function (event) {// Gọi table mã nội dung để chọn
            if (event.keyCode == Keys.ENTER) { // copy
                $("#Inxoasoam").focus();
            }
        })
        $("#Inxoasoam").keydown(function (event) {// Gọi table mã nội dung để chọn
            if (event.keyCode == Keys.ENTER) { // copy
                $("#LocTheoTK").focus();
            }
        })
        $("#LocTheoTK").keydown(function (event) {// Gọi table mã nội dung để chọn
            if (event.keyCode == Keys.ENTER) { // copy
                $("#PhuongPhapTinhGiaVon").focus();
            }
        })
        $("#PhuongPhapTinhGiaVon").keydown(function (event) {// Gọi table mã nội dung để chọn
            if (event.keyCode == Keys.ENTER) { // copy
                $("#sxtheonhommathang").focus();
            }
        })

        $("#sxtheonhommathang").keydown(function (event) {// Gọi table mã nội dung để chọn
            if (event.keyCode == Keys.ENTER) { // copy
                $("#KhoaSoVaChuyenTonKho").focus();
            }
        })

        $("#tuthang").change(function (event) {// Gọi table mã nội dung để chọn
            $tuthang = parseInt($("#tuthang").val());
            $denthang = parseInt($("#tinhlaituthang").val());

            $("#tinhlaituthang option[value=" + $tuthang + "]").attr('selected', 'selected');
        })
        $("#tinhlaituthang").change(function (event) {// Gọi table mã nội dung để chọn
            $tuthang = $("#tuthang").val();
            $denthang = $("#tinhlaituthang").val();
            if ($tuthang > $denthang) {
                $("#tuthang option[value=" + $denthang + "]").attr('selected', 'selected');
            }
        })


///-------------------Kết thúc--------------------------------
        function readonlyCheckThang() {
            congdontuthang.attr("disabled", true);
            congdondenthang.attr("disabled", true);

            sole.attr("disabled", false);
            Insotonkho.val("disabled", false);
            Insotonkho.attr("disabled", false);
            Ingiatritonkho.attr("disabled", false);
            giatrilonhon.attr("disabled", false);
            Insotonkho.val(1);
            $("#Inxoasoam").val(1);
        }

        function readonlyCheckCongDon() {
            congdontuthang.attr("disabled", false);
            congdondenthang.attr("disabled", false);
            Insotonkho.val(2);

            sole.attr("disabled", true);
            Insotonkho.attr("disabled", true);
            Ingiatritonkho.attr("disabled", true);
            giatrilonhon.attr("disabled", true);
            $("#Inxoasoam").val(4);
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
            $thangtk = $("#tuthang").val();
            $congdontuthang = $("#tuthang").val();
            $congdondenthang = $("#tinhlaituthang").val();
            $tungay = $("#congdontungay").val();
            $denngay = $("#condondenngay").val();
            $Insotonkho = $("#Insotonkho").val();
            $tinhlaituthang = $("#tinhlaituthang").val();
            $Inxoasoam = $("#Inxoasoam").val();
            $LocTheoTK = $("#LocTheoTK").val();
            $LocTheoKho = $("#LocTheoKho").val();
            $LocTheoNhomHang = $("#LocTheoNhomHang").val();
            $sole = $("#sole").val();
            $PhuongPhapTinhGiaVon = $("#PhuongPhapTinhGiaVon").val();
            $sxtheonhommathang = $("#sxtheonhommathang").prop("checked");
            $congdon = 0;
            if ($("#rd_congdonthangtonkho").prop("checked")) {
                $congdon = 1;
            }
            $tutaobuttoanphatsinh = $("#tutaobuttoanphatsinh").prop("checked")

            $ngaydb = Date.parse($congdontuthang);
            $ngaykt = Date.parse($congdondenthang);
            valid = sosanhngay($ngaydb, $ngaykt);
            $chuyentonkho = $("#KhoaSoVaChuyenTonKho").prop("checked");

            if (valid) {
                if($PhuongPhapTinhGiaVon==2){
                    $tontaithang = false;
                    $.ajax({// Chuyển tồn kho cho năm mới
                        url: $dir_module_sltonkho + "kiemtratonthang.php",
                        async: false,
                        data: {
                            thangtk: $thangtk,
                            sole: $sole,
                            congdontuthang: $congdontuthang,
                            congdondenthang: $congdondenthang,
                            congdon: $congdon
                        },
                        success: function (response) {
                            if (response == 1) {
                                $tontaithang = true;
                            } else {
                                $tontaithang = false;
                            }
                        }
                    });
                    if ($tontaithang) {// Nếu đã có thì thông báo cho lựa chọn
                            var retVal = confirm("Bạn có muốn chạy tồn kho từ tháng " + $thangtk + " đến tháng " + $tinhlaituthang + " không ? Dữ liệu cũ sẽ bị ghi đè !");
                            if (retVal == true) {
                                $.confirm({
                                    title: 'Thực thi tồn kho thành công.',
                                    type: 'green',
                                    autoClose: 'OK|1000',
                                    content: function () {
                                        var self = this;
                                        return $.ajax({// Chuyển tồn kho cho năm mới
                                            url: $dir_module_sltonkho + "laythongtininphieutkchitiettheothang.php",
                                            async: false,
                                            data: {
                                                thangtk: $tinhlaituthang,
                                                tutaobuttoanphatsinh: $tutaobuttoanphatsinh,
                                                PhuongPhapTinhGiaVon: $PhuongPhapTinhGiaVon
                                            },
                                            success: function (response) {// Thêm tồn kho mới vào

                                            }
                                        });
                                    },
                                    buttons: {
                                        "OK":function (){
                                            $res = confirm("Bạn muốn thực hiện cập nhật giá vốn cho từng phiếu xuất kho ?");
                                            if($res){
                                                $.confirm({
                                                    title: 'Cập nhật đơn giá vốn thành công',
                                                    type: 'green',
                                                    autoClose: 'OK|1000',
                                                    content: function () {
                                                        var self = this;
                                                        return $.ajax({// Chuyển tồn kho cho năm mới
                                                            url: $dir_module_sltonkho + "capnhatgiavon_xuatsanxuat.php",
                                                            data:{
                                                                PhuongPhapTinhGiaVon:$PhuongPhapTinhGiaVon
                                                            },
                                                            async: false,
                                                            success: function (response) {// Thêm tồn kho mới vào

                                                            }
                                                        });
                                                    },
                                                    buttons: {
                                                        "OK": {
                                                            keys: ['Y'], action: function () {
                                                                $('.dialog_main_thongtin_nhapxuatkho').load("form/frm_insolieu_tkchitietthang_theonhom.php?thangtk=" + $tinhlaituthang + "&sole=" + $sole + "&congdontuthang=" + $congdontuthang + "&congdondenthang=" + $congdondenthang + "&congdon=" + $congdon + "&Inxoasoam=" + $Inxoasoam+ "&loctheotk=" + $LocTheoTK+ "&loctheokho=" + $LocTheoKho+ "&loctheonhomhang=" + $LocTheoNhomHang+"&PhuongPhapTinhGiaVon="+$PhuongPhapTinhGiaVon);
                                                            }
                                                        }
                                                    }
                                                });
                                            }else{
                                                $('.dialog_main_thongtin_nhapxuatkho').load("form/frm_insolieu_tkchitietthang_theonhom.php?thangtk=" + $tinhlaituthang + "&sole=" + $sole + "&congdontuthang=" + $congdontuthang + "&congdondenthang=" + $congdondenthang + "&congdon=" + $congdon + "&Inxoasoam=" + $Inxoasoam+ "&loctheotk=" + $LocTheoTK+ "&loctheokho=" + $LocTheoKho+ "&loctheonhomhang=" + $LocTheoNhomHang+"&PhuongPhapTinhGiaVon="+$PhuongPhapTinhGiaVon);
                                            }
                                        }
                                    }
                                });
                            } else{
                            $('.dialog_main_thongtin_nhapxuatkho').load("form/frm_insolieu_tkchitietthang_theonhom.php?thangtk=" + $tinhlaituthang + "&sole=" + $sole + "&congdontuthang=" + $congdontuthang + "&congdondenthang=" + $congdondenthang + "&congdon=" + $congdon + "&Inxoasoam=" + $Inxoasoam+ "&loctheotk=" + $LocTheoTK+ "&loctheokho=" + $LocTheoKho+ "&loctheonhomhang=" + $LocTheoNhomHang+"&PhuongPhapTinhGiaVon="+$PhuongPhapTinhGiaVon);
                        }
                    }else{
                        $.confirm({
                            title: 'Thực thi tồn kho thành công.',
                            type: 'green',
                            autoClose: 'OK|1000',
                            content: function () {
                                var self = this;
                                return $.ajax({// Chuyển tồn kho cho năm mới
                                    url: $dir_module_sltonkho + "laythongtininphieutkchitiettheothang.php",
                                    async: false,
                                    data: {
                                        thangtk: $tinhlaituthang,
                                        tutaobuttoanphatsinh: $tutaobuttoanphatsinh,
                                        PhuongPhapTinhGiaVon: $PhuongPhapTinhGiaVon
                                    },
                                    success: function (response) {// Thêm tồn kho mới vào

                                    }
                                });
                            },
                            buttons: {
                                "OK":function (){
                                    $res = confirm("Bạn muốn thực hiện cập nhật giá vốn cho từng phiếu xuất kho ?");
                                    if($res){
                                        $.confirm({
                                            title: 'Cập nhật đơn giá vốn thành công',
                                            type: 'green',
                                            autoClose: 'OK|1000',
                                            content: function () {
                                                var self = this;
                                                return $.ajax({// Chuyển tồn kho cho năm mới
                                                    url: $dir_module_sltonkho + "capnhatgiavon_xuatsanxuat.php",
                                                    data:{
                                                        PhuongPhapTinhGiaVon:$PhuongPhapTinhGiaVon
                                                    },
                                                    async: false,
                                                    success: function (response) {// Thêm tồn kho mới vào

                                                    }
                                                });
                                            },
                                            buttons: {
                                                "OK": {
                                                    keys: ['Y'], action: function () {
                                                        $('.dialog_main_thongtin_nhapxuatkho').load("form/frm_insolieu_tkchitietthang_theonhom.php?thangtk=" + $tinhlaituthang + "&sole=" + $sole + "&congdontuthang=" + $congdontuthang + "&congdondenthang=" + $congdondenthang + "&congdon=" + $congdon + "&Inxoasoam=" + $Inxoasoam+ "&loctheotk=" + $LocTheoTK+ "&loctheokho=" + $LocTheoKho+ "&loctheonhomhang=" + $LocTheoNhomHang+"&PhuongPhapTinhGiaVon="+$PhuongPhapTinhGiaVon);
                                                    }
                                                }
                                            }
                                        });
                                    }else{
                                        $('.dialog_main_thongtin_nhapxuatkho').load("form/frm_insolieu_tkchitietthang_theonhom.php?thangtk=" + $tinhlaituthang + "&sole=" + $sole + "&congdontuthang=" + $congdontuthang + "&congdondenthang=" + $congdondenthang + "&congdon=" + $congdon + "&Inxoasoam=" + $Inxoasoam+ "&loctheotk=" + $LocTheoTK+ "&loctheokho=" + $LocTheoKho+ "&loctheonhomhang=" + $LocTheoNhomHang+"&PhuongPhapTinhGiaVon="+$PhuongPhapTinhGiaVon);
                                    }
                                }
                            }
                        });
                    }
                }else{// nếu không check vào chuyển tồn kho
                    $sxtheonhommathang = true;
                    if ($Insotonkho == 1) {// Nếu là 1 thì in tồn kgo không chi tiết
                        if ($sxtheonhommathang) {
                            {
                                {// ket thuc thang 1 con lai thang 2
                                    //--------------------------------------------------------------
                                    $kiemtrathangtruoc = false;
                                    $.ajax({// Kiểm tra tồn kho trước
                                        url: $dir_module_sltonkho + "kiemtratonthang.php",
                                        data: {thangtk: $thangtk - 1},
                                        async: false,
                                        success: function (response) {
                                            if (response == 1) {
                                                $kiemtrathangtruoc = true;
                                            } else {
                                                $kiemtrathangtruoc = false;
                                            }
                                        }
                                    });
                                    if ($thangtk == 1)
                                        $kiemtrathangtruoc = true;
                                    if ($kiemtrathangtruoc == false)// Nếu chưa tồn kho tháng trước thì thông báo
                                    {
                                        alert_f("Lưu ý !", "", "red", "Chưa có tồn kho tháng " + ($thangtk - 1) + " ! Vui lòng tạo tồn kho tháng " + ($thangtk - 1) + " !");
                                        return false;
                                    }
                                    $tontaithang = false;
                                    $.ajax({// Chuyển tồn kho cho năm mới
                                        url: $dir_module_sltonkho + "kiemtratonthang.php",
                                        async: false,
                                        data: {
                                            thangtk: $thangtk,
                                            sole: $sole,
                                            congdontuthang: $congdontuthang,
                                            congdondenthang: $congdondenthang,
                                            congdon: $congdon
                                        },
                                        success: function (response) {
                                            if (response == 1) {
                                                $tontaithang = true;
                                            } else {
                                                $tontaithang = false;
                                            }
                                        }
                                    });
                                    if ($tontaithang) {// Nếu đã có thì thông báo cho lựa chọn
                                        {// Nếu không bang nhau
                                            var retVal = confirm("Bạn có muốn chạy tồn kho từ tháng " + $thangtk + " đến tháng " + $tinhlaituthang + " không ? Dữ liệu cũ sẽ bị ghi đè !");
                                            if (retVal == true) {
                                                for ($i = $thangtk; $i <= $tinhlaituthang; $i++) {
                                                    $.ajax({// Chuyển tồn kho cho năm mới
                                                        url: $dir_module_sltonkho + "laythongtininphieutkchitiettheothang.php",
                                                        async: false,
                                                        data: {
                                                            thangtk: $i,
                                                            tutaobuttoanphatsinh: $tutaobuttoanphatsinh
                                                        },
                                                        success: function (response) {// Thêm tồn kho mới vào
                                                            if (response.trim() != "")
                                                                alert("Mặt hàng âm tháng " + $i + " \n" + response);
                                                        }
                                                    });
                                                }
                                                $res = confirm("Bạn muốn thực hiện cập nhật giá vốn cho từng phiếu xuất kho ?");
                                                if($res){
                                                    $.confirm({
                                                        title: 'Cập nhật đơn giá vốn thành công',
                                                        type: 'green',
                                                        autoClose: 'OK|1000',
                                                        content: function () {
                                                            var self = this;
                                                            return $.ajax({// Chuyển tồn kho cho năm mới
                                                                url: $dir_module_sltonkho + "capnhatgiavon_xuatsanxuat.php",
                                                                async: true,
                                                                success: function (response) {// Thêm tồn kho mới vào

                                                                }
                                                            });
                                                        },
                                                        buttons: {
                                                            "OK": {
                                                                keys: ['Y'], action: function () {
                                                                    $('.dialog_main_thongtin_nhapxuatkho').load("form/frm_insolieu_tkthang_theonhom.php?thangtk=" + $tinhlaituthang + "&sole=" + $sole + "&congdontuthang=" + $congdontuthang + "&congdondenthang=" + $congdondenthang + "&congdon=" + $congdon + "&Inxoasoam=" + $Inxoasoam+ "&loctheotk=" + $LocTheoTK + "&loctheokho=" + $LocTheoKho+ "&loctheonhomhang=" + $LocTheoNhomHang);
                                                                }
                                                            }
                                                        }
                                                    });
                                                }else{
                                                    $('.dialog_main_thongtin_nhapxuatkho').load("form/frm_insolieu_tkthang_theonhom.php?thangtk=" + $tinhlaituthang + "&sole=" + $sole + "&congdontuthang=" + $congdontuthang + "&congdondenthang=" + $congdondenthang + "&congdon=" + $congdon + "&Inxoasoam=" + $Inxoasoam+ "&loctheotk=" + $LocTheoTK+ "&loctheokho=" + $LocTheoKho+ "&loctheonhomhang=" + $LocTheoNhomHang);
                                                }
                                            } else {
                                                $('.dialog_main_thongtin_nhapxuatkho').load("form/frm_insolieu_tkthang_theonhom.php?thangtk=" + $tinhlaituthang + "&sole=" + $sole + "&congdontuthang=" + $congdontuthang + "&congdondenthang=" + $congdondenthang + "&congdon=" + $congdon + "&Inxoasoam=" + $Inxoasoam+ "&loctheotk=" + $LocTheoTK+ "&loctheokho=" + $LocTheoKho+ "&loctheonhomhang=" + $LocTheoNhomHang);
                                            }
                                        }
                                    } else {
                                        {// Nếu không bang nhau
                                            var retVal = true;
                                            if (retVal == true) {
                                                for ($i = $thangtk; $i <= $tinhlaituthang; $i++) {
                                                    $.ajax({// Chuyển tồn kho cho năm mới
                                                        url: $dir_module_sltonkho + "laythongtininphieutkchitiettheothang.php",
                                                        async: false,
                                                        data: {
                                                            thangtk: $i,
                                                            tutaobuttoanphatsinh: $tutaobuttoanphatsinh
                                                        },
                                                        success: function (response) {// Thêm tồn kho mới vào
                                                            if (response.trim() != "")
                                                                alert("Mặt hàng âm tháng " + $i + " \n" + response);
                                                        }
                                                    });
                                                }

                                                $res = confirm("Bạn muốn thực hiện cập nhật giá vốn cho từng phiếu xuất kho ?");
                                                if($res){
                                                    $.confirm({
                                                        title: 'Cập nhật đơn giá vốn thành công',
                                                        type: 'green',
                                                        autoClose: 'OK|1000',
                                                        content: function () {
                                                            var self = this;
                                                            return $.ajax({// Chuyển tồn kho cho năm mới
                                                                url: $dir_module_sltonkho + "capnhatgiavon_xuatsanxuat.php",
                                                                async: true,
                                                                success: function (response) {// Thêm tồn kho mới vào

                                                                }
                                                            });
                                                        },
                                                        buttons: {
                                                            "OK": {
                                                                keys: ['Y'], action: function () {
                                                                    $('.dialog_main_thongtin_nhapxuatkho').load("form/frm_insolieu_tkthang_theonhom.php?thangtk=" + $tinhlaituthang + "&sole=" + $sole + "&congdontuthang=" + $congdontuthang + "&congdondenthang=" + $congdondenthang + "&congdon=" + $congdon + "&Inxoasoam=" + $Inxoasoam+ "&loctheotk=" + $LocTheoTK+ "&loctheokho=" + $LocTheoKho+ "&loctheonhomhang=" + $LocTheoNhomHang);
                                                                }
                                                            }
                                                        }
                                                    });
                                                }else{
                                                    $('.dialog_main_thongtin_nhapxuatkho').load("form/frm_insolieu_tkthang_theonhom.php?thangtk=" + $tinhlaituthang + "&sole=" + $sole + "&congdontuthang=" + $congdontuthang + "&congdondenthang=" + $congdondenthang + "&congdon=" + $congdon + "&Inxoasoam=" + $Inxoasoam+ "&loctheotk=" + $LocTheoTK+ "&loctheokho=" + $LocTheoKho+ "&loctheonhomhang=" + $LocTheoNhomHang);
                                                }

                                            } else {
                                                $('.dialog_main_thongtin_nhapxuatkho').load("form/frm_insolieu_tkthang_theonhom.php?thangtk=" + $tinhlaituthang + "&sole=" + $sole + "&congdontuthang=" + $congdontuthang + "&congdondenthang=" + $congdondenthang + "&congdon=" + $congdon + "&Inxoasoam=" + $Inxoasoam+ "&loctheotk=" + $LocTheoTK+ "&loctheokho=" + $LocTheoKho+ "&loctheonhomhang=" + $LocTheoNhomHang);
                                            }
                                        }
                                    }
                                    //---------------------------------------------------------------
                                }
                            }
                        }
                    } else if ($Insotonkho == 2) {
                        if ($sxtheonhommathang) {
                            {
                                {// ket thuc thang 1 con lai thang 2
                                    //--------------------------------------------------------------
                                    $kiemtrathangtruoc = false;
                                    $.ajax({// Kiểm tra tồn kho trước
                                        url: $dir_module_sltonkho + "kiemtratonthang.php",
                                        data: {thangtk: $thangtk - 1},
                                        async: false,
                                        success: function (response) {
                                            if (response == 1) {
                                                $kiemtrathangtruoc = true;
                                            } else {
                                                $kiemtrathangtruoc = false;
                                            }
                                        }
                                    });

                                    if ($thangtk == 1)
                                        $tontaithang = true;

                                    $.ajax({// Chuyển tồn kho cho năm mới
                                        url: $dir_module_sltonkho + "kiemtratonthang.php",
                                        async: false,
                                        data: {
                                            thangtk: $thangtk,
                                            sole: $sole,
                                            congdontuthang: $congdontuthang,
                                            congdondenthang: $congdondenthang,
                                            congdon: $congdon
                                        },
                                        success: function (response) {
                                            if (response == 1) {
                                                $tontaithang = true;
                                            } else {
                                                $tontaithang = false;
                                            }
                                        }
                                    });

                                    if ($tontaithang) {// nếu đã có tồn kho tháng thì cảnh báo
                                        {// Nếu không bang nhau
                                            var retVal = confirm("Bạn có muốn chạy tồn kho từ tháng " + $thangtk + " đến tháng " + $tinhlaituthang + " không ? Dữ liệu cũ sẽ bị ghi đè ?");
                                            if (retVal == true) {
                                                for ($i = $thangtk; $i <= $tinhlaituthang; $i++) {
                                                    $.ajax({// Chuyển tồn kho cho năm mới
                                                        url: $dir_module_sltonkho + "laythongtininphieutkchitiettheothang.php",
                                                        async: false,
                                                        data: {
                                                            thangtk: $i,
                                                            tutaobuttoanphatsinh: $tutaobuttoanphatsinh
                                                        },
                                                        success: function (response) {// Thêm tồn kho mới vào
                                                            if (response.trim() != "")
                                                                alert("Mặt hàng âm tháng " + $i + " \n" + response);
                                                        }
                                                    });
                                                }
                                                $res = confirm("Bạn muốn thực hiện cập nhật giá vốn cho từng phiếu xuất kho ?");
                                                if($res){
                                                    $.confirm({
                                                        title: 'Cập nhật đơn giá vốn thành công',
                                                        type: 'green',
                                                        autoClose: 'OK|1000',
                                                        content: function () {
                                                            var self = this;
                                                            return $.ajax({// Chuyển tồn kho cho năm mới
                                                                url: $dir_module_sltonkho + "capnhatgiavon_xuatsanxuat.php",
                                                                async: true,
                                                                success: function (response) {// Thêm tồn kho mới vào

                                                                }
                                                            });
                                                        },
                                                        buttons: {
                                                            "OK": {
                                                                keys: ['Y'], action: function () {
                                                                    $('.dialog_main_thongtin_nhapxuatkho').load("form/frm_insolieu_tkchitietthang_theonhom.php?thangtk=" + $tinhlaituthang + "&sole=" + $sole + "&congdontuthang=" + $congdontuthang + "&congdondenthang=" + $congdondenthang + "&congdon=" + $congdon + "&Inxoasoam=" + $Inxoasoam+ "&loctheotk=" + $LocTheoTK+ "&loctheokho=" + $LocTheoKho+ "&loctheonhomhang=" + $LocTheoNhomHang);
                                                                }
                                                            }
                                                        }
                                                    });
                                                }else{
                                                    $('.dialog_main_thongtin_nhapxuatkho').load("form/frm_insolieu_tkchitietthang_theonhom.php?thangtk=" + $tinhlaituthang + "&sole=" + $sole + "&congdontuthang=" + $congdontuthang + "&congdondenthang=" + $congdondenthang + "&congdon=" + $congdon + "&Inxoasoam=" + $Inxoasoam+ "&loctheotk=" + $LocTheoTK+ "&loctheokho=" + $LocTheoKho+ "&loctheonhomhang=" + $LocTheoNhomHang);
                                                }

                                            }
                                            else {
                                                $('.dialog_main_thongtin_nhapxuatkho').load("form/frm_insolieu_tkchitietthang_theonhom.php?thangtk=" + $tinhlaituthang + "&sole=" + $sole + "&congdontuthang=" + $congdontuthang + "&congdondenthang=" + $congdondenthang + "&congdon=" + $congdon + "&Inxoasoam=" + $Inxoasoam+ "&loctheotk=" + $LocTheoTK+ "&loctheokho=" + $LocTheoKho+ "&loctheonhomhang=" + $LocTheoNhomHang);
                                            }
                                        }
                                    } else {
                                        {// Nếu không bang nhau
                                            var retVal = true;
                                            if (retVal == true) {
                                                for ($i = $thangtk; $i <= $tinhlaituthang; $i++) {
                                                    $.ajax({// Chuyển tồn kho cho năm mới
                                                        url: $dir_module_sltonkho + "laythongtininphieutkchitiettheothang.php",
                                                        async: false,
                                                        data: {
                                                            thangtk: $i,
                                                            tutaobuttoanphatsinh: $tutaobuttoanphatsinh
                                                        },
                                                        success: function (response) {// Thêm tồn kho mới vào
                                                            if (response.trim() != "")
                                                                alert("Mặt hàng âm tháng " + $i + " \n" + response);
                                                        }
                                                    });
                                                }

                                                $res = confirm("Bạn muốn thực hiện cập nhật giá vốn cho từng phiếu xuất kho ?");
                                                if($res){
                                                    $.confirm({
                                                        title: 'Cập nhật đơn giá vốn thành công',
                                                        type: 'green',
                                                        autoClose: 'OK|1000',
                                                        content: function () {
                                                            var self = this;
                                                            return $.ajax({// Chuyển tồn kho cho năm mới
                                                                url: $dir_module_sltonkho + "capnhatgiavon_xuatsanxuat.php",
                                                                async: true,
                                                                success: function (response) {// Thêm tồn kho mới vào
                                                                }
                                                            });
                                                        },
                                                        buttons: {
                                                            "OK": {
                                                                keys: ['Y'], action: function () {
                                                                    $('.dialog_main_thongtin_nhapxuatkho').load("form/frm_insolieu_tkchitietthang_theonhom.php?thangtk=" + $tinhlaituthang + "&sole=" + $sole + "&congdontuthang=" + $congdontuthang + "&congdondenthang=" + $congdondenthang + "&congdon=" + $congdon + "&Inxoasoam=" + $Inxoasoam+ "&loctheotk=" + $LocTheoTK+ "&loctheokho=" + $LocTheoKho+ "&loctheonhomhang=" + $LocTheoNhomHang);
                                                                }
                                                            }
                                                        }
                                                    });
                                                }else{
                                                    $('.dialog_main_thongtin_nhapxuatkho').load("form/frm_insolieu_tkchitietthang_theonhom.php?thangtk=" + $tinhlaituthang + "&sole=" + $sole + "&congdontuthang=" + $congdontuthang + "&congdondenthang=" + $congdondenthang + "&congdon=" + $congdon + "&Inxoasoam=" + $Inxoasoam+ "&loctheotk=" + $LocTheoTK+ "&loctheokho=" + $LocTheoKho+ "&loctheonhomhang=" + $LocTheoNhomHang);
                                                }


                                            }
                                            else {
                                                $('.dialog_main_thongtin_nhapxuatkho').load("form/frm_insolieu_tkchitietthang_theonhom.php?thangtk=" + $tinhlaituthang + "&sole=" + $sole + "&congdontuthang=" + $congdontuthang + "&congdondenthang=" + $congdondenthang + "&congdon=" + $congdon + "&Inxoasoam=" + $Inxoasoam+ "&loctheotk=" + $LocTheoTK+ "&loctheokho=" + $LocTheoKho+ "&loctheonhomhang=" + $LocTheoNhomHang);
                                            }
                                        }
                                    }
                                    //---------------------------------------------------------------
                                }
                            }

                        }

                    }
                }

            }

            return valid;
        }

        $("#capnhatgiavonsanxuat").click(function () {
            $PhuongPhapTinhGiaVon = $("#PhuongPhapTinhGiaVon").val();
            $.confirm({
                title: 'Cập nhật đơn giá vốn thành công',
                type: 'green',
                autoClose: 'OK|1000',
                content: function () {
                    var self = this;
                    return $.ajax({// Chuyển tồn kho cho năm mới
                        url: $dir_module_sltonkho + "capnhatgiavon_xuatsanxuat.php",
                        data:{
                            PhuongPhapTinhGiaVon:$PhuongPhapTinhGiaVon
                        },
                        async: true,
                        success: function (response) {// Thêm tồn kho mới vào

                        }
                    });
                },
                buttons: {
                    "OK": {}
                }
            });
        });

        function xoadialog_bangketoankho() {// đóng form
            reset_dialog(".dialog-bangketoankho");
            reset_dialog(".dialog_main_bangketonkho");
        }

        dialog = $("#dialog-bangketoankho").dialog({
            autoOpen: false,
            height: "auto",
            width: $width,
            modal: true,
            buttons: {
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