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
<div id="dialog-bangke_tonghopno_khachhang" title="Bảng tổng hợp nợ khách hàng...">
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
                    <td><input name="rd_thangtonkho" type="radio" id="rd_congdonthangtonkho" checked="checked"></td>
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
                </tr>
            </table>
        </fieldset>
        <fieldset style="background-color: #afd9ee">
            <legend>Trình bày</legend>
            <table border="0" style="width: 100%;">
                <tr>
                    <td width="30%"><b>Khách hàng:</b></td>
                    <td width="70%">
					<select name="MaKhachHang" style="width:100%;height:25px;" id="MaKhachHang">
						<option VALUE="ALL">TẤT CẢ - KHÁCH HÀNG</option>
                    </select>
					</td>
                </tr>
            </table>
        </fieldset>
        <fieldset style="background-color: #afd9ee;">
            <legend>Lọc theo</legend>
            <table width='100%' border='0'>
                <tr>
                    <td width="50%"><input type="hidden" name="KhoaSoVaChuyenTonKho" id="KhoaSoVaChuyenTonKho">
                        <select name="mataikhoan" id="mataikhoan" style="width:90%;height:25px;">
                                <option VALUE="ALL">&nbsp;&nbsp;TẤT CẢ - TÀI KHOẢN</option>
                                <option value="131">&nbsp;&nbsp;131-Phải thu của khách hàng</option>
                            <optgroup label="&nbsp;&nbsp;136-Phải thu nội bộ" >
                                <option value="1361">&nbsp;&nbsp;&nbsp;&nbsp;1361-Vốn kinh doanh ở đơn vị trực thuộc</option>
                                <option value="1368">&nbsp;&nbsp;&nbsp;&nbsp;1368-Phải thu nội bộ khác</option>
                            </optgroup>
                            <optgroup label="&nbsp;&nbsp;138-Phải thu khác" >
                                <option value="1386">&nbsp;&nbsp;&nbsp;&nbsp;1386-Cầm cố, thế chấp, ký quỹ, ký cược</option>
                                <option value="1388">&nbsp;&nbsp;&nbsp;&nbsp;1388-Phải thu khác</option>
                            </optgroup>
                            <option value="141">&nbsp;&nbsp;141-Tạm ứng</option>
                            <option value="244">&nbsp;&nbsp;244-Cầm cố, thuế châp, ký quỹ, ký cược</option>
                                <option value="331">&nbsp;&nbsp;331-Phải trả người bán</option>
                            <option value="335">&nbsp;&nbsp;335-Chi phí phải trả</option>
							<optgroup label="&nbsp;&nbsp;336-Phải trả nội bộ">
                                <option value="3361">&nbsp;&nbsp;&nbsp;&nbsp;3361-Phải trả nội bộ về vốn kinh doanh</option>
                                <option value="3368">&nbsp;&nbsp;&nbsp;&nbsp;3368-Phải trả nội bộ khác</option>
                            </optgroup>
                            <optgroup label="&nbsp;&nbsp;338-Phải trả, phải nộp khác">
                                <option value="3386">&nbsp;&nbsp;&nbsp;&nbsp;3386-Nhận ký quỹ, ký cược</option>
                                <option value="3387">&nbsp;&nbsp;&nbsp;&nbsp;3387-Doanh thu chưa thực hiện</option>
                                <option value="3388">&nbsp;&nbsp;&nbsp;&nbsp;3388-Phải trả, phải nộp khác</option>
                            </optgroup>
							<optgroup label="&nbsp;&nbsp;341-Vay và nợ thuê tài chính" >
                                <optgroup label="&nbsp;&nbsp;&nbsp;&nbsp;3411-Các khoản đi vay" >
                                    <option value="34111">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;34111-Các khoản đi vay ngắn hạn</option>
                                    <option value="34112">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;34112-Các khoản đi vay dài hạn</option>
                                </optgroup>
                                <option value="3412">&nbsp;&nbsp;&nbsp;3412-Nợ thuê tài chính</option>
                            </optgroup>
                            <option value="344">&nbsp;&nbsp;344-Nhận ký quỹ, ký cược</option>							
                        </select>
                    </td>
                    <td width="50%" align="right">
                        <select name="loaitien" style="width:90%;height:25px;" id="loaitien">
                            <option value="ALL">TẤT CẢ - LOẠI TIỀN</option>
                            <option value="VND">TIỀN VIỆT NAM</option>
                            <option value="NT">TIỀN NGOẠI TỆ</option>
                        </select>
                    </td>
                </tr>
                                <tr>
                  <td><select name="nhomkhachhang" id="nhomkhachhang" style="width:90%;height:25px;margin-top:10px;">
						<option value="ALL">TẤT CẢ - NHÓM KHÁCH HÀNG</option>
                  </select></td>
                  <td align="right">
					 <select name="congdontheo" id="congdontheo" style="width:90%;height:25px;">
                            <option selected value="">CỘNG DỒN THEO</option>
                            <option value="manhom">NHÓM KHÁCH HÀNG</option>
                        </select>
				  </td>
                </tr>
                <tr>
                    <td><input style="margin:5px;" type="checkbox" name="XemTongHop" id="XemTongHop"/>
                        <strong>Xem tổng hợp công nợ</strong></td>
                    <td align="right">&nbsp;</td>
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
	$dir_module_manhomkh = "modules/manhomkh/";////////////////Khai báo đường dẫn vào mudole
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
            MaKhachHang = $("#MaKhachHang"),
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
                .add(MaKhachHang)
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
                $("#MaKhachHang").focus();
            }
        })

        $("#MaKhachHang").keydown(function (event) {// Gọi table mã nội dung để chọn
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
                $("#theothongtu").focus();
            }
        })
        $("#theothongtu").keydown(function (event) {// Gọi table mã nội dung để chọn
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
        function load_cb_khachhang() {
            $.ajax({
                url: $dir_module_makhachhang + "listall_cb.php",
                async: true,
                success: function (response) {
                    $("#MaKhachHang").html(response);
                }
            });
        }
        load_cb_khachhang();
		
		function loadcb_tkcongno(){
			$.ajax({
					url: $dir_module_matk + "cb_matkcongno.php",
					async: true,
					success: function (response) {
						$("#mataikhoan").html(response);
					}
				});
		}
		loadcb_tkcongno();
		
		function loadcb_manhomkh(){
		$.ajax({
				url: $dir_module_manhomkh + "cb_manhomkh.php",
				async: true,
				success: function (response) {
					$("#nhomkhachhang").html(response);
				}
			});
		}
		loadcb_manhomkh();
		
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

            $makhachhang = $("#MaKhachHang").val();

            $mataikhoan = $("#mataikhoan").val();
            $nhomkhachhang = $("#nhomkhachhang").val();

            $loaitien = $("#loaitien").val();
            $theothongtu = $("#theothongtu").val();
            $congdontheo = $("#congdontheo").val();
            $xemtonghop = $('#XemTongHop').prop('checked');

            $kieuin = $("#kieuin").val();

            if (valid) {
			if (confirm("Dữ liệu đã tồn tại. Bạn có muốn ghi đè dữ liệu không ?") == true) {
			                  $.confirm({
                    title: 'Cập nhật thành công',
                    type: 'green',
                    autoClose: 'OK|1000',
                    content: function () {
                        var self = this;
                        return $.ajax({
                            url: $dir_module_makhachhang + "themdskhcongno.php",
                            dataType: 'json',
                            method: 'get',
                            data: {
                                tungay: $tungay,
                                denngay: $denngay,
                                mataikhoan: $mataikhoan,
                                loaitien: $loaitien,
                                theothongtu: $theothongtu,
                                makhachhang: $makhachhang,
								nhomkhachhang:$nhomkhachhang,
                                congdontheo: $congdontheo,
                            },
                        });
                    },
                    buttons: {
                        "OK": {
                            keys: ['Y'], action: function () {
                                $('.dialog_main_thongbao').load("form/frm_insolieu_tonghopno_khachhang.php?tungay=" + $tungay + "&denngay=" + $denngay + "&mataikhoan=" + $mataikhoan + "&loaitien=" + $loaitien + "&congdontheo=" + $congdontheo + "&kieuin=" + $kieuin + "&makhachhang=" + $makhachhang + "&nhomkhachhang=" + $nhomkhachhang + "&xemtonghop=" + $xemtonghop);
                            }
                        }
                    }
                });
			} else {
			 $('.dialog_main_thongbao').load("form/frm_insolieu_tonghopno_khachhang.php?tungay=" + $tungay + "&denngay=" + $denngay + "&mataikhoan=" + $mataikhoan + "&loaitien=" + $loaitien + "&congdontheo=" + $congdontheo + "&kieuin=" + $kieuin + "&makhachhang=" + $makhachhang + "&nhomkhachhang=" + $nhomkhachhang + "&xemtonghop=" + $xemtonghop);
			}
            }
            return valid;
        }

        function xoadialog_bangketoankho() {// đóng form
            reset_dialog(".dialog-bangke_tonghopno_khachhang");
            reset_dialog(".dialog_main_bangke_tonghopno_khachhang");
        }

        dialog = $("#dialog-bangke_tonghopno_khachhang").dialog({
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