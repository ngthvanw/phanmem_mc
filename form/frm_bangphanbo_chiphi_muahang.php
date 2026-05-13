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
<div id="dialog-bangkekhauhao_taisan" title="BẢNG PHÂN BỐ CHI PHÍ MUA HÀNG...">
    <p class="validateTips"></p>
    <form method="post" id="Form-chinh" enctype="multipart/form-data">
        <fieldset style="background-color: #afd9ee">
            <legend>Kỳ tính của năm <?php echo $_SESSION['NienDo']; ?></legend>
            <table border="0" style="width: 100%;">
                <tr>
                    <td><input name="rd_thangtonkho" type="radio" id="rd_thangtonkho" checked="checked"></td>
                    <td>Tháng</td>
                    <td>
                        <select name="tuthang" style="height:25px;width:100px;" id="tuthang">
						<option value="">Từ tháng</option>
                            <?php
                            for ($i = 1; $i <= 12; $i++) {
                                $select = "";
                                if ($i == $cur_thang)
                                    $select = "";
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
                        <select name="denthang" style="height:25px;width:100px;" id="denthang">
						<option value="">Đến tháng</option>
                            <?php
                            for ($i = 1; $i <= 12; $i++) {
                                $select = "";
                                if ($i == $cur_thang)
                                    $select = "";
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

        <fieldset style="background-color: #afd9ee;">
            <legend>Lựa chọn</legend>
            <table border="0" style="width: 100%;">
                <tr>
                    <td>
                        <select name="phanbotheo" style="height:25px;width:100%" id="phanbotheo">
                            <option value="">Lựa chọn phân bổ chi phí mua hàng theo</option>
                            <option value="soluongnhap">1. Số lượng nhập kho hàng hoá</option>
                            <option value="thanhtiennhap">2. Thành tiền nhập kho hàng hoá(khuyên dùng)</option>
                        </select>
                    </td>
                </tr>
            </table>
        </fieldset>
         <fieldset style="background-color: #afd9ee">
            <legend>Lựa chọn khác</legend>
            <table>
                <tr>
                    <td><input type="checkbox" name="xoakhauhaodatrichtrongky" id="xoakhauhaodatrichtrongky"></td>
                    <td>&nbsp; Xóa phân bổ trong kỳ</td>
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
                    <td>&nbsp;Tổng hợp số phân bổ cả năm</td>
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
    $dir_module_mavt = "modules/mavattu/";////////////////Khai báo đường dẫn vào mudole
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
		$("#btntaisankhongkhauhao").click(function(e) {
            $('.dialog_main_danhmuc_cptratruoc').load('form/frm_danhsach_macptratruoc_khongkhauhao.php');
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
			var valid = true;
            allFields.removeClass("ui-state-error");// kiem tra du lieu
            $tuthang = parseInt($("#tuthang").val());
            $denthang = parseInt($("#denthang").val());
            $tonghopcanam = $("#tonghopcanam").prop("checked");
            $phanbotheo = $("#phanbotheo").val();
            $khongtaobuttoandinhkhoan = $("#khongtaobuttoandinhkhoan").prop("checked");
            $xoakhauhaodatrichtrongky = $("#xoakhauhaodatrichtrongky").prop("checked");
			valid = valid && checkNull($("#tuthang"), " Từ tháng ");
			valid = valid && checkNull($("#denthang"), " Đến tháng ");
			valid = valid && checkNull($("#phanbotheo"), " Phương thức phân bổ ");
			if (valid) {
            if ($tonghopcanam == false) {
                for ($i = $tuthang; $i <= $denthang; $i++) {
                    $.ajax({
                        url: $dir_module_mavt + "thembangpbchiphi.php",
                        dataType: 'json',
                        data: {tuthang: $i, denthang: $i, tonghopcanam: $tonghopcanam,khongtaobuttoandinhkhoan:$khongtaobuttoandinhkhoan,xoakhauhaodatrichtrongky:$xoakhauhaodatrichtrongky,phanbotheo:$phanbotheo},
                        method: 'get',
                        async: false,
                        success: function (response) {
							console.log(response);
						}
                    });
                }
                $('.dialog_main_thongbao').load("form/frm_insolieu_bangke_phanbocpmuahang.php?tuthang=" + $tuthang + "&denthang=" + $denthang + "&tonghopcanam=" + $tonghopcanam);
            }else{
                for ($i = 1; $i <= 12; $i++) {
                    $.ajax({
                        url: $dir_module_mavt + "thembangpbchiphi.php",
                        dataType: 'json',
                        data: {tuthang: $i, denthang: $i, tonghopcanam: $tonghopcanam,khongtaobuttoandinhkhoan:$khongtaobuttoandinhkhoan,xoakhauhaodatrichtrongky:$xoakhauhaodatrichtrongky,phanbotheo:$phanbotheo},
                        method: 'get',
                        async: false,
                        success: function (response) {
							console.log(response);
                        }
                    });
                }
                $('.dialog_main_thongbao').load("form/frm_insolieu_bangke_phanbocpmuahang.php?tuthang=" + $tuthang + "&denthang=" + $denthang + "&tonghopcanam=" + $tonghopcanam);
            }
			 $("#Form-chinh")[0].reset();
		}
		return valid;
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