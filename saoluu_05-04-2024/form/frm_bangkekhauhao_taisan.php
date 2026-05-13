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
<div id="dialog-bangkekhauhao_taisan" title="Bảng kê khấu hao tài sản...">
    <p class="validateTips"></p>
    <form method="post" id="Form-chinh" enctype="multipart/form-data">
        <fieldset style="background-color: #afd9ee">
            <legend>Kỳ tính của năm <?php echo $_SESSION['NienDo']; ?></legend>
            <table border="0" style="width: 100%;">
                <tr>
                    <td><input name="rd_thangtonkho" type="radio" id="rd_thangtonkho" checked="checked"></td>
                    <td>Tháng</td>
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
                    <td>Tính đến tháng</td>
                    <td>
                        <select name="denthang" style="height:20px;width:100px;" id="denthang">
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
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr style="display:none">
                    <td><input name="rd_thangtonkho" type="radio" id="rd_congdonthangtonkho"></td>
                    <td>Từ ngày</td>
                    <td align="right"><input type="date" name="congdontuthang" style="width:130px;" id="congdontuthang"
                                             class="text ui-widget-content ui-corner-all"
                                             value="<?php if ($_SESSION['TuNgay'] != "") {
                                                 echo $_SESSION['TuNgay'];
                                             } else {
                                                 echo $_SESSION['NienDo'] . "-" . date("m-d");
                                             } ?>"/></td>
                    <td>Đến ngày</td>
                    <td align="right">
                        <input type="date" name="congdondenthang" id="congdondenthang" style="width:130px;"
                               class="text ui-widget-content ui-corner-all"
                               value="<?php if ($_SESSION['DenNgay'] != "") {
                                   echo $_SESSION['DenNgay'];
                               } else {
                                   echo $_SESSION['NienDo'] . "-" . date("m-d");
                               } ?>"/></td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
            </table>
        </fieldset>
        <fieldset style="background-color: #afd9ee;display:none;">
            <legend>Lựa chọn</legend>
            <table border="0" style="width: 100%;">
                <tr>
                    <td>
                        <select name="Insotonkho" style="height:20px;" id="Insotonkho">
                            <option value="1">Chỉ in tồn kho</option>
                            <option value="2">In toàn bộ cả phần nhập xuất tồn</option>
                            <option value="3">In số tồn với số vốn gần nhất</option>
                            <option value="4">In số tồn với giá bán gần nhất</option>
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
                        <select name="LocTheoTK" id="LocTheoTK" style="height:20px;">
                            <option value="1">Chỉ in tồn kho</option>
                            <option value="2">In toàn bộ cả phần nhập xuất tồn</option>
                            <option value="3">In số tồn với số vốn gần nhất</option>
                            <option value="4">In số tồn với giá bán gần nhất</option>
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
                            <option value="1">Bình quân tháng</option>
                            <option value="2">Theo giá đính danh</option>
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
                        </table>
                    </td>
                </tr>
            </table>
        </fieldset>
                <fieldset style="background-color: #afd9ee">
            <legend>Không tính khấu hao các tài sản sau</legend>
            <table WIDTH="100%">
                <tr>
                    <td>
                        <button onclick="$('.dialog_main_mataisan').load('form/frm_danhsach_mataisan_khongkhauhao.php');" type="button" style="width:100%;border:1px solid #990" class="ui-button ui-corner-all ui-widget">CHỌN TÀI SẢN KHÔNG TÍNH KHẤU HAO...</button></td>
                </tr>
            </table>
        </fieldset>
         <fieldset style="background-color: #afd9ee">
            <legend>Lựa chọn khác</legend>
            <table>
                <tr>
                    <td><input type="checkbox" name="xoakhauhaodatrichtrongky" id="xoakhauhaodatrichtrongky"></td>
                    <td>&nbsp;Xóa khấu hao đã trích trong kỳ</td>
                </tr>
                 <tr style="display: none">
                    <td><input type="checkbox" name="xoakhauhaodatrichtrongky" id="ghidekhauhaodatrich"></td>
                    <td>&nbsp;Ghi đè nếu có số liệu khấu hao đã trích</td>
                </tr>
                 <tr>
                    <td><input type="checkbox" name="xoakhauhaodatrichtrongky" id="khongtaobuttoandinhkhoan"></td>
                    <td>&nbsp;Không tạo bút toán định khoản</td>
                </tr>
            </table>
        </fieldset>
        <fieldset style="background-color: #afd9ee">
            <legend></legend>
            <table>
                <tr>
                    <td><input type="checkbox" name="tonghopcanam" id="tonghopcanam"></td>
                    <td>&nbsp;Tổng hợp số khấu hao cả năm</td>
                </tr>
            </table>
        </fieldset>
        <fieldset style="background-color: #afd9ee">
            <legend>Khấu hao theo</legend>
            <table width="100%">
                <tr>
                    <td>
                        <select style="height:25px;width:100%;" id="khauhaotheo">
                            <option value="">CHỌN KHẤU HAO TÀI SẢN</option>
                            <option value="ngayhoadon">--KHẤU HAO THEO NGÀY SỬ DỤNG TÀI SẢN(NGÀY HÓA ĐƠN)</option>
                            <option value="ngayghiso">--KHẤU HAO THEO NGÀY GHI SỔ TÀI SẢN</option>
                        </select>
                    </td>
                </tr>
            </table>
        </fieldset>
		<fieldset style="background-color: #afd9ee">
            <legend>Khấu hao tài sản không đúng tỷ lệ khấu hao</legend>
            <table width="100%">
                <tr>
                    <td>
                        <select style="height:25px;width:100%;" id="khauhaotaisanhetkhauhao">
                            <option value="">CHỌN KHẤU HAO TÀI SẢN KHÔNG ĐÚNG TỶ LỆ KHẤU HAO</option>
                            <option value="theodungtyle">--KHẤU HAO TÀI SẢN THEO ĐÚNG TỶ LỆ CHO PHÉP VƯỢT KHUNG</option>
                            <option value="phanbohetthangcuoi">--KHẤU HAO HẾT GIÁ TRỊ CÒN LẠI VÀO KỲ PHÂN BỔ CUỐI</option>
                        </select>
                    </td>
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
    $dir_module_manoidung = "modules/manoidung/";////////////////Khai báo đường dẫn vào mudole
    $dir_module_ps_kt = "modules/pskt/";//----------------Lưới
    ///$dir_module_phieuthuchi = "modules/psmavattu/";//----------------Lưới
    $dir_module_nhapkho = "modules/psmavattu/";//----------------Lưới
    $dir_module_matk = "modules/httk/";////////////////Khai báo đường dẫn vào mudole
    $dir_module_mataisan = "modules/mataisan/";////////////////Khai báo đường dẫn vào mudole
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
            $denthang = parseInt($("#denthang").val());

            $("#denthang option[value=" + $tuthang + "]").attr('selected', 'selected');
        })
        $("#denthang").change(function (event) {// Gọi table mã nội dung để chọn
            $tuthang = $("#tuthang").val();
            $denthang = $("#denthang").val();
            if ($tuthang > $denthang) {
                $("#tuthang option[value=" + $denthang + "]").attr('selected', 'selected');
            }
        })


///-------------------Kết thúc--------------------------------
        function readonlyCheckThang() {
            congdontuthang.attr("disabled", true);
            congdondenthang.attr("disabled", true);

            tuthang.attr("disabled", false);
            tinhlaituthang.attr("disabled", false);
            sole.attr("disabled", false);
            Insotonkho.val("disabled", false);
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
            $tuthang = $("#tuthang").val();
            $denthang = $("#denthang").val();
            $tonghopcanam = $("#tonghopcanam").prop("checked");
            $khauhaotheo = $("#khauhaotheo").val();
            $khauhaotaisanhetkhauhao = $("#khauhaotaisanhetkhauhao").val();
            $xoakhauhaodatrichtrongky = $("#xoakhauhaodatrichtrongky").prop("checked");
            $khongtaobuttoandinhkhoan = $("#khongtaobuttoandinhkhoan").prop("checked");
            if($khauhaotheo==""){
                alert("CHƯA CHỌN KHẤU HAO TÀI SẢN THEO NGÀY .");
                $("#khauhaotheo").focus();
                return false;
            }
			if($khauhaotaisanhetkhauhao==""){
                alert("CHƯA CHỌN KHẤU HAO TÀI SẢN KHÔNG ĐÚNG TỶ LỆ .");
                $("#khauhaotaisanhetkhauhao").focus();
                return false;
            }
			
			

            if ($tonghopcanam == false) {
                if (confirm("Dữ liệu đã tồn tại. bạn có muốn ghi đè không ?")) {
                    for ($i = $tuthang; $i <= $denthang; $i++) {
                        $.ajax({
                            url: $dir_module_mataisan + "themkhauhaotaisan.php",
                            data: {
                                tuthang: $i,
                                denthang: $i,
                                tonghopcanam: $tonghopcanam,
                                xoakhauhaodatrichtrongky: $xoakhauhaodatrichtrongky,
                                khongtaobuttoandinhkhoan: $khongtaobuttoandinhkhoan,
                                khauhaotheo: $khauhaotheo,
                                khauhaotaisanhetkhauhao: $khauhaotaisanhetkhauhao
                            },
                            async: false,
                            success: function (response) {
								if (response.trim() != "")
                                   alert("Mã tài sản: " + response+" vượt quá thời gian khấu hao theo quy định trong tháng " + $i + "\n Vui lòng kiểm tra tài sản này!");
                            }
                        });
                    }
                    $('.dialog_main_thongbao').load("form/frm_insolieu_bangke_khauhao.php?tuthang=" + $tuthang + "&denthang=" + $denthang + "&tonghopcanam=" + $tonghopcanam);
                }else{
                    $('.dialog_main_thongbao').load("form/frm_insolieu_bangke_khauhao.php?tuthang=" + $tuthang + "&denthang=" + $denthang + "&tonghopcanam=" + $tonghopcanam);
                }
            }else{
                if (confirm("Dữ liệu đã tồn tại. bạn có muốn ghi đè không ?")) {
                    for ($i = 1; $i <= 12; $i++) {
                        $.ajax({
                            url: $dir_module_mataisan + "themkhauhaotaisan.php",
                            dataType: 'json',
                            data: {
                                tuthang: $i,
                                denthang: $i,
                                tonghopcanam: $tonghopcanam,
                                xoakhauhaodatrichtrongky: $xoakhauhaodatrichtrongky,
                                khongtaobuttoandinhkhoan: $khongtaobuttoandinhkhoan,
                                khauhaotheo: $khauhaotheo,
								khauhaotaisanhetkhauhao: $khauhaotaisanhetkhauhao
                            },
                            method: 'get',
                            async: false,
                            success: function (response) {
								
                            }
                        });
                    }
                    $('.dialog_main_thongbao').load("form/frm_insolieu_bangke_khauhao.php?tuthang=" + $tuthang + "&denthang=" + $denthang + "&tonghopcanam=" + $tonghopcanam);
                }else{
                    $('.dialog_main_thongbao').load("form/frm_insolieu_bangke_khauhao.php?tuthang=" + $tuthang + "&denthang=" + $denthang + "&tonghopcanam=" + $tonghopcanam);
                }
            }

        }

        function xoadialog_bangketoankho() {// đóng form
            reset_dialog(".dialog-bangkekhauhao_taisan");
            reset_dialog(".dialog_main_bangke_khauhaotaisan");
        }

        dialog = $("#dialog-bangkekhauhao_taisan").dialog({
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