<?php
require("../config.php");
$cur_thang = date("n");
function load_chinhanh($dir){
    $fp = @fopen($dir . '/chinhanh.db', "r");
    while (!feof($fp)) {
        $string_info = fgets($fp);
    }
    return json_decode($string_info, true);
}
$ChiNhanh = load_chinhanh($driver."/datafile/".$_SESSION['MST']."/".$_SESSION['NienDo']);
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
<div id="dialog-bangke_hanghoa_muavao" title="BẢNG KÊ HÓA ĐƠN, DỊCH VỤ, HÀNG HÓA MUA VÀO...">
    <p class="validateTips"></p>
    <form method="post" id="Form-chinh" enctype="multipart/form-data">
        <fieldset style="background-color: #afd9ee">
            <legend>Kỳ tính của năm <?php echo $_SESSION['NienDo']; ?></legend>
            <table border="0" style="width: 100%;">
                <tr style="display:none;">
                    <td><input name="rd_thangtonkho" type="radio" id="rd_thangtonkho"></td>
                    <td>Tháng</td>
                    <td>
                        <select name="tuthang" id="tuthang">
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
                    <td>Tính lại từ</td>
                    <td>
                        <select name="tinhlaituthang" id="tinhlaituthang">
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
                </tr>
                <tr>
                    <td><input name="KyTinh" type="radio" id="KyTinh" checked="checked"></td>
                    <td>Kỳ tính</td>
                    <td align="left">
                            <select id="chon_ky" style="width:130px;height:25px;magrin: bottom 1px;">
                                <option value="">-- Chọn kỳ --</option>
                                <option value="nam">Năm nay</option>
                                <option value="q1">Quý 1</option>
                                <option value="q2">Quý 2</option>
                                <option value="q3">Quý 3</option>
                                <option value="q4">Quý 4</option>
                                <option value="m1">Tháng 1</option>
                                <option value="m2">Tháng 2</option>
                                <option value="m3">Tháng 3</option>
                                <option value="m4">Tháng 4</option>
                                <option value="m5">Tháng 5</option>
                                <option value="m6">Tháng 6</option>
                                <option value="m7">Tháng 7</option>
                                <option value="m8">Tháng 8</option>
                                <option value="m9">Tháng 9</option>
                                <option value="m10">Tháng 10</option>
                                <option value="m11">Tháng 11</option>
                                <option value="m12">Tháng 12</option>
                            </select>
                    </td>
                    <td></td>
                    <td align="right"></td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td><input name="rd_thangtonkho" type="radio" id="rd_congdonthangtonkho" checked="checked"></td>
                    <td>Từ ngày</td>
                    <td align="right"><input type="date" name="congdontuthang" style="width:130px; height:25px" id="congdontuthang"
                                             class="text ui-widget-content ui-corner-all"
                                             value="<?php if($_SESSION['TuNgay']!=""){ echo $_SESSION['TuNgay'];}else{echo $_SESSION['NienDo'] . "-" . date("m-d");} ?>"/></td>
                    <td>Đến ngày</td>
                    <td align="right">
                        <input type="date" name="congdondenthang" id="congdondenthang" style="width:130px; height:25px"
                               class="text ui-widget-content ui-corner-all"
                               value="<?php if($_SESSION['DenNgay']!=""){ echo $_SESSION['DenNgay'];}else{echo $_SESSION['NienDo'] . "-" . date("m-d");} ?>"/></td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
            </table>
        </fieldset>
        <fieldset style="background-color: #afd9ee">
            <legend>Trình bày</legend>
            <table border="0" style="width: 100%;">
                <tr>
                    <td width="30%"><b>Thuế suất :</b></td>
                    <td width="70%">
                        <table style="width: 100%" border="0">
                            <tr>
                                <td> <input style="margin-top: 5px;" checked="true" type="checkbox" name="Intheothuesuat[]" value="10">&nbsp;10%</td>
                                <td> <input style="margin-top: 5px;" checked="true" type="checkbox" name="Intheothuesuat[]" value="5">&nbsp;5%</td>
                                <td> <input style="margin-top: 5px;" checked="true" type="checkbox" name="Intheothuesuat[]" value="0">&nbsp;0%</td>
                            </tr>
                            <tr>
                                <td> <input style="margin-top: 5px;" checked="true" type="checkbox" name="Intheothuesuat[]" value="k">&nbsp;Không chịu thuế</td>
                                <td> <input style="margin-top: 5px;" checked="true" type="checkbox" name="Intheothuesuat[]" value="kk">&nbsp;Không kê khai</td>
                                <td><input style="margin-top: 5px;" checked="true" type="checkbox" name="Intheothuesuat[]" value="8">&nbsp;8%</td>
                            </tr>
                        </table>
                     </td>
                </tr>
                <tr>
                    <td><b>Chứng từ :

                        </b></td>
                    <td>
                        <select name="Intheochungtu" style="width:100%;height:25px;" id="Intheochungtu">
                            <option value="1">Hóa đơn GTGT</option>
                            <option value="2">Hóa đơn bán hàng</option>
							<option value="3">Bảng kê 01/ TNDN</option>
                            <option value="4">Chứng từ khác</option>
							<option value="5">Chứng từ khác(Thuế GTGT)</option>

                        </select>
                    </td>
                </tr>
                <tr>
                    <td><b>Sắp xếp : </b></td>
                    <td>
                        <select name="sapxeptheohoadon" id="sapxeptheohoadon" style="width:100%;height:25px;">
                            <option value="mapskt">Số thứ tự</option>
                            <option value="loaiphieu">Loại phiếu</option>
                            <option value="loaiphieu,mapskt">Loại phiếu,Số thứ tự</option>
                            <option value="sct">Số hóa đơn</option>
                            <option value="ngayghiso">Ngày ghi sổ</option>
                            <option value="ngayhoadon">Ngày hóa đơn</option>
                            <option value="makh">Khách hàng</option>

                        </select>
                    </td>
                </tr>
                <tr>
                    <td><b style="font-size: 14px;">Loại bảng kê:</b></td>
                    <td><select name="kieuin" style="width:100%;height:25px;" id="kieuin">
                      <option value="2">Tổng hợp</option>
                      <option value="1">Chi tiết</option>
                  </select></td>
                </tr>
                <tr>
                    <td><b style="font-size: 14px;">Bảng kê:</b></td>
                    <td><select name="loaibangke" style="width:100%;height:25px;" id="loaibangke">
							<option value="ALL">-- TẤT CẢ--</option>
                            <option selected value="1">Lần 1</option>
                            <option value="0">Bổ sung</option>
                        </select></td>
                </tr>
                <tr>
                    <td><b style="font-size: 14px;">Loại tờ khai</b></td>
                    <td><select name="loaithue" style="width:100%;height:25px;" id="loaithue">
                            <option value="0">Tờ khai thuế GTGT khấu trừ</option>
                            <option value="1">Tờ khai thuế GTGT cho dự án đầu tư</option>
                        </select></td>
                </tr>
                <tr>
                    <td><b style="font-size: 14px;">Chi nhánh</b></td>
                    <td>
                        <select name="ChiNhanhCongTy" id="ChiNhanhCongTy" class="text ui-widget-content ui-corner-all" style="width:100%;height:25px;">
                            <option selected value="ALL">-- TẤT CẢ--</option>
                            <?php
                            foreach ($ChiNhanh as $ItemCN){
                                $dau = "";
                                $selected ="";
                                if($ItemCN[2]!=0){
                                    $dau = "--";
                                }
                                echo "<option value='" . $ItemCN[0] . "'". $selected.">" .$dau." ".$ItemCN[1]. "</option>";
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                 <tr>
                    <td><b style="font-size: 14px;">Loại tiền tệ</b></td>
                    <td><select name="LoaiNgoaiTe" id="LoaiNgoaiTe" style="width:100%;height:25px;">
                            <option selected value="VND">Tiền Việt Nam</option>
                            <option value="NT">Ngoại Tệ</option>
                        </select></td>
                </tr>
                <tr style="display: none;">
                    <td colspan="2">&nbsp;<b>Sắp xếp khi in</b></td>
                </tr>
                <tr style="display: none;">
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
        <fieldset style="background-color: #afd9ee;display:none">
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
            LoaiNgoaiTe = $("#LoaiNgoaiTe"),


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
                .add(LoaiNgoaiTe)

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
                $("#Intheothuesuat").focus();
            }
        })

        $("#Intheothuesuat").keydown(function (event) {// Gọi table mã nội dung để chọn
            if (event.keyCode == Keys.ENTER) { // copy
                $("#Intheochungtu").focus();
            }
        })
        $("#Intheochungtu").keydown(function (event) {// Gọi table mã nội dung để chọn
            if (event.keyCode == Keys.ENTER) { // copy
                $("#sapxeptheohoadon").focus();
            }
        })
        $("#sapxeptheohoadon").keydown(function (event) {// Gọi table mã nội dung để chọn
            if (event.keyCode == Keys.ENTER) { // copy
                $("#kieuin").focus();
            }
        })
        $("#kieuin").keydown(function (event) {// Gọi table mã nội dung để chọn
            if (event.keyCode == Keys.ENTER) { // copy
                $("#LoaiNgoaiTe").focus();
            }
        })
        $("#LoaiNgoaiTe").keydown(function (event) {// Gọi table mã nội dung để chọn
            if (event.keyCode == Keys.ENTER) { // copy
                $("#sxtheonhommathang").focus();
            }
        })

        $("#sxtheonhommathang").keydown(function (event) {// Gọi table mã nội dung để chọn
            if (event.keyCode == Keys.ENTER) { // copy
                $("#KhoaSoVaChuyenTonKho").focus();
            }
        })

        $("#congdontuthang").change(function (event) {// Gọi table mã nội dung để chọn
            $tuthang = $("#congdontuthang").val();
            $denthang = $("#congdondenthang").val();
            if ($tuthang > $denthang) {
                //$("#congdontuthang").val($tuthang);
                $("#congdondenthang option[value=" + $tuthang + "]").attr('selected', 'selected');
            }
        })
        $("#congdondenthang").change(function (event) {// Gọi table mã nội dung để chọn
            $tuthang = $("#congdontuthang").val();
            $denthang = $("#congdondenthang").val();
            if ($tuthang > $denthang) {
                //$("#congdontuthang").val($tuthang);
                $("#congdontuthang option[value=" + $denthang + "]").attr('selected', 'selected');
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
			valid = valid && checkNull($("#congdontuthang"), " Kiểm tra ngày nhập ");
			valid = valid && checkNull($("#congdondenthang"), " Kiểm tra ngày nhập ");


            $tungay = $("#congdontuthang").val();
            $denngay = $("#congdondenthang").val();
            $Intheothuesuat = $("input[name='Intheothuesuat[]']:checked").map(function(){return $(this).val();}).get();
            $Intheochungtu = $("#Intheochungtu").val();

            $sapxeptheohoadon = $("#sapxeptheohoadon").val();
            $LoaiNgoaiTe = $("#LoaiNgoaiTe").val();

            $kieuin = $("#kieuin").val();
            $loaibangke = $("#loaibangke").val();
            $loaithue = $("#loaithue").val();
            $chinhanh = $("#ChiNhanhCongTy").val();

            if (valid) {
                $('.dialog_main_thongbao').load("form/frm_insolieu_bangke_muavao.php?tungay=" + $tungay + "&denngay=" + $denngay + "&intheothuesuat=" + $Intheothuesuat + "&intheochungtu=" + $Intheochungtu+ "&sapxeptheohoadon=" + $sapxeptheohoadon+ "&loaingoaite=" + $LoaiNgoaiTe+ "&kieuin=" + $kieuin+"&loaibangke="+$loaibangke+"&loaithue="+$loaithue+"&chinhanh="+$chinhanh);
            }


            return valid;
        }

        function xoadialog_bangketoankho() {// đóng form
            reset_dialog(".dialog-bangke_hanghoa_muavao");
            reset_dialog(".dialog_main_bangke_hanghoa_muavao");
        }

        dialog = $("#dialog-bangke_hanghoa_muavao").dialog({
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
    document.getElementById("chon_ky").addEventListener("change", function() {
    var now = new Date();
    var year = <?php echo $_SESSION['NienDo']; ?>;
    var from = "";
    var to = "";

    switch(this.value) {
        case "nam":
            from = year + "-01-01";
            to   = year + "-12-31";
            break;
        case "q1":
            from = year + "-01-01";
            to   = year + "-03-31";
            break;
        case "q2":
            from = year + "-04-01";
            to   = year + "-06-30";
            break;
        case "q3":
            from = year + "-07-01";
            to   = year + "-09-30";
            break;
        case "q4":
            from = year + "-10-01";
            to   = year + "-12-31";
            break;
        default:
            if (this.value.startsWith("m")) {
                var month = this.value.substring(1); // lấy số tháng
                var lastDay = new Date(year, month, 0).getDate(); // ngày cuối tháng
                from = year + "-" + (month.padStart ? month.padStart(2,'0') : ('0'+month).slice(-2)) + "-01";
                to   = year + "-" + (month.padStart ? month.padStart(2,'0') : ('0'+month).slice(-2)) + "-" + lastDay;
            }
            break;
    }

    if (from && to) {
        document.getElementById("congdontuthang").value = from;
        document.getElementById("congdondenthang").value = to;
    }
});
</script>