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
        z-index: 50000 !important;
    }
	.ui-widget {
		font-size: 13px;
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
<div id="dialog-bangke_chitietno_khachhang" title="Sổ chi tiết thanh toán...">
    <p class="validateTips"></p>
    <form method="post" id="Form-chinh" enctype="multipart/form-data">
    <fieldset>
    	<table border="0" style="width: 100%;">
        	<tr>
            	<td><span style="padding: 2px">
            	  <input type="hidden" class="button" name="btnmakh" id="btnmakh"
                               value="..."/>
            	</span><span style="padding: 2px">
            	<input type="text" name="makhachhang" value="" id="makhachhang" required="required"  onkeyup="return KhuDauTiengViet(this.value,'#makhachhang')"
                               style="width: 22%;text-transform:uppercase" list="listmakhachhang"
                               placeholder="Mã khách hàng" class="text ui-widget-content ui-corner-all"
                        /><datalist id="listmakhachhang"></datalist>
            	<input name="tenkhachhang" type="text" disabled="disabled"  required="required"
                               class="text ui-widget-content ui-corner-all" id="tenkhachhang"
                               placeholder="Tên khách hàng"
                               style="width: 70%"/>
            	</span></td>
                
            </tr>
        	<tr>
        	  <td><span style="padding: 2px">
        	    <input type="hidden" name="btntkco" id="btntkco" class="button"
                                                               value="..."/>
                <input type="text" name="tkco" list="listtaikhoan" value="" id="tkco" required="required" style="width: 22%"
                             placeholder="Mã TK" class="text ui-widget-content ui-corner-all"/>
              <input name="tentkco" type="text" disabled="disabled" required="required"
                             class="text ui-widget-content ui-corner-all" id="tentkco"
                             placeholder="Tài khoản" style="width: 70%" value="Tiền Việt Nam"/>
							 <datalist id="listtaikhoan" ></datalist>
        	  </span></td>
      	  </tr>
        </table>
    </fieldset>
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
                                             value="<?php if($_SESSION['TuNgay']!=""){ echo $_SESSION['TuNgay'];}else{echo $_SESSION['NienDo'] . "-" . date("m-d");} ?>"/></td>
                    <td>Đến ngày</td>
                    <td align="right">
                        <input type="date" name="congdondenthang" id="congdondenthang" style="width:130px;"
                               class="text ui-widget-content ui-corner-all"
                               value="<?php if($_SESSION['DenNgay']!=""){ echo $_SESSION['DenNgay'];}else{echo $_SESSION['NienDo'] . "-" . date("m-d");} ?>"/></td>
                </tr>
            </table>
        </fieldset>
        <fieldset style="background-color: #afd9ee;display:none;">
            <legend>Trình bày</legend>
            <table border="0" style="width: 100%;">
                <tr>
                    <td><b>Thuế suất :</b></td>
                    <td><select name="Intheothuesuat" style="width:100%;height:25px;" id="Intheothuesuat">
                            <option value="1">In toàn bộ</option>
                            <option value="2">Hàng thuế suất 0%</option>
                            <option value="3">Hàng thuế suất 5%</option>
                            <option value="4">Hàng thuế suất 10%</option>
                            <option value="5">Hàng thuế suất 20%</option>
                            <option>Hàng không chịu thuế</option>
                        </select></td>
                </tr>
                <tr>
                    <td><b>Chứng từ :

                        </b></td>
                    <td>
                        <select name="Intheochungtu" style="width:100%;height:25px;" id="Intheochungtu">
                            <option value="1">Hóa đơn GTGT</option>
                            <option value="2">Hóa đơn bán hàng</option>
                            <option value="3">Bảng kê 01 /TNDN</option>
                            <option value="4">HĐ mua hàng/HĐ mua NLTS</option>
                            <option value="5">Chứng từ khác</option>
                            <option value="6">Toàn bộ</option>
                        </select>
                    </td>
                </tr>
                
                <tr>
                    <td><b style="font-size: 14px;">Mẫu in :</b></td>
                    <td><select name="theothongtu" id="theothongtu" style="width:100%;height:25px;">
                            <option value="1">TT 127 ngày 27-12-2004</option>
                            <option value="2">TT 32 ngày 09-04-2007</option>
                            <option value="3">TT 60 ngày 14-06-2007</option>
                            <option selected value="4">TT 28 ngày 28-02-2011</option>
                        </select></td>
                </tr>
                <tr>
                    <td colspan="2">&nbsp;<b>Sắp xếp khi in</b></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <table style="width: 100%">
                            <tr>
                                <td><input name="inphanmuahanghoa" type="checkbox" id="inphanmuahanghoa"
                                           checked="checked"></td>
                                <td>In phần mua hàng</td>
                                <td><input name="baogomgiatribangkhong" type="checkbox" id="baogomgiatribangkhong"
                                           checked="checked"></td>
                                <td>Bao gồm giá trị hàng mua = 0</td>
                               
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </fieldset>
        <fieldset style="background-color: #afd9ee;">
            <legend>Sắp xếp</legend>
            <table width='100%' border='0'>
                <tr>
                    <td width="50%"><input type="hidden" name="KhoaSoVaChuyenTonKho" id="KhoaSoVaChuyenTonKho">
					<select name="sapxeptheohoadon" id="sapxeptheohoadon" style="width:90%;height:25px;">
                            <option value="1">Không sắp xếp</option>
                            <option value="2">Ngày ghi sổ</option>
                            <option value="3">Ngày hóa đơn</option>
                            <option value="4">Khách hàng</option>
                            <option value="5">Tên hàng</option>
                            <option value="6">Thuế suất</option>
                        </select>
					</td>
                    <td width="50%" align="right">
                        <select name="loaingoaite" style="width:90%;height:25px;" id="loaingoaite">
                            <option value="VND">VIỆT NAM ĐỒNG</option>
                            <option value="NT">NGOẠI TỆ</option>
                        </select>
						<select name="kieuin" style="width:90%;height:25px;display: none;" id="kieuin">
                            <option value="1">In dọc</option>
                            <option selected value="2">In ngang</option>
                        </select>
					</td>
                </tr>
            </table>
        </fieldset>
		<fieldset style="background-color: #afd9ee;">
            <legend>Cộng dồn</legend>
            <table width='100%' border='0'>
                <tr>
                    <td width="50%"><input type="hidden" name="KhoaSoVaChuyenTonKho" id="KhoaSoVaChuyenTonKho">
					<select name="congdonhanghoa" id="congdonhanghoa" style="width:90%;height:25px;">
                            <option value="1">Không cộng dồn</option>
                            <option value="2">Ngày ghi sổ</option>
                            <option value="3">Ngày hóa đơn</option>
                            <option value="4">Khách hàng</option>
                            <option value="5">Tên hàng</option>
                            <option value="6">Thuế suất</option>
                        </select>
					</td>
                    <td width="50%" align="right">

					</td>
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

        var $listmakhachhang = "";// Danh sách khách hàng

        $.ajax({// Load danh sách mã khách hàng
            url: $dir_module_makhachhang + "listall.php",
            dataType: "json",
            success: function (response) {
                $array = (response);
                // var js_arr = response.js_arr;
                for (var i = 0; i < $array.length; i++) {
                    //alert($array[i].makh);
                    $listmakhachhang+='<option value='+$array[i].makh+'>'+$array[i].masothue+'-'+bodauTiengViet($array[i].tenkh)+'</option>';
                }
				$("#listmakhachhang").html($listmakhachhang);
            }
        });
		
	   var $listmataikhoan = new Array();// Danh sách mã nội dung
        $.ajax({// Load danh sách mã khách hàng
            url: $dir_module_matk + "listall_w.php",
			data:{matk:"131,331,311,3388,1388,141,315,335,3386,34111,34112,3412,3414"},
            dataType: "json",
            success: function (response) {
                $array = (response);
                for (var i = 0; i < $array.length; i++) {
                    //alert($array[i].makh);
                    $listmataikhoan+='<option value='+$array[i].matk+'>'+bodauTiengViet($array[i].tentk)+'</option>';
                }
				$("#listtaikhoan").html($listmataikhoan);
            }
        });

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

        $("#makhachhang").keydown(function (event) {// Gọi table mã nội dung để chọn
            if (event.keyCode == Keys.ENTER) { // copy
                $("#tkco").focus();
            }
        })
        $("#tkco").keydown(function (event) {// Gọi table mã nội dung để chọn
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
		
		$("#btnmakh").click(function (event) {// Gọi table khách hàng để chọn
            $('.dialog_main_makh').load("form/frm_dm_makh_form_select.php?idstyle=Form-chinh&idinput=makhachhang***tenkhachhang***diachi***masothue***makhachhang2***tenkhachhang2***diachi2&idfocus=btntkco&ma="+$("#makhachhang").val());
        });
		
		 $("#btntkco").click(function (event) {// Gọi table khách hàng để chọn
            //$tkco = tkco.val().trim();
            $('.dialog_main_httk').load("form/frm_dm_httk_form_select.php?idstyle=Form-chinh&idinput=tkco***tentkco&idfocus=congdontuthang&ma="+$("#tkco").val());
        });


        $("#makhachhang").focusout(function (event) {// Gọi table mã nội dung để chọn
            $makh = $("#makhachhang").val().trim();
            if ($('.dialog_main_makh').html()=="") { // copy
                goitablemakhachhang($makh);
            }
        });

        function goitablemakhachhang($vale) {
            if ($vale == "") {// nếu tk nợ trống thì bật tra bảng
                $('.dialog_main_makh').load("form/frm_dm_makh_form_select.php?idstyle=Form-chinh&idinput=makhachhang***tenkhachhang***diachi***masothue***makhachhang2***tenkhachhang2***diachi2&idfocus=tenkhachhang");
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
                    $("#makhachhang").val($data.makh);
                    $("#tenkhachhang").val($data.tenkh);

                    //manoidung.focus();

                } else {
                    $('.dialog_main_makh').load("form/frm_dm_makh_form_select.php?idstyle=Form-chinh&idinput=makhachhang***tenkhachhang***diachi***masothue***makhachhang2***tenkhachhang2***diachi2&idfocus=manoidung&ma="+$("#makhachhang").val());
                }
            }
        }

        $("#tkco").focusout(function (event) {// Gọi table mã nội dung để chọn
            $tkno1 = $("#tkco").val().trim();
            if ($('.dialog_main_httk').html()=="") { // copy
                goitablehttk($tkno1);
            }
        });
        function goitablehttk($vale) {
            $tkno1 = $("#tkco").val().trim();
            if ($vale == "") {// nếu tk nợ trống thì bật tra bảng
                $('.dialog_main_httk').load("form/frm_dm_httk_form_select.php?idstyle=Form-chinh&idinput=tkco&idfocus=congdontuthang&ma=" + $tkno1);
            } else {// nếu tk có không trống
                $data = "";
                $.ajax({
                    url: $dir_module_matk + "laythongtin.php",
                    data: {'ma': $vale},
                    async: false,
                    success: function (response) {
                        $data = $.parseJSON(response);
                    }
                });
                if ($data != null) { // Nếu tk có tòn tại trong hệ thống tài khoản thì lấy giá trị và gán vào textbox
                    $("#tkco").val($data.matk);
                    $("#tentkco").val($data.tentk);
                    $("#congdontuthang").focus();
                } else {
                    $('.dialog_main_httk').load("form/frm_dm_httk_form_select.php?idstyle=Form-chinh&idinput=tkco&idfocus=congdontuthang&ma=" + $tkno1);
                }
            }
        }

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
			
			valid = valid && checkNull($("#makhachhang"), " Mã khách hàng ");
			valid = valid && checkNull($("#tkco"), " Mã tài khoản ");
			valid = valid && checkNull($("#congdontuthang"), " Kiểm tra ngày nhập ");
			valid = valid && checkNull($("#congdondenthang"), " Kiểm tra ngày nhập ");

            $tungay = $("#congdontuthang").val();
            $denngay = $("#congdondenthang").val();
			
            $nhapxuatkho = $("#nhapxuatkho").val();
			
            $sapxeptheohoadon = $("#sapxeptheohoadon").val();
            $Intheochungtu = $("#Intheochungtu").val();

            $sapxeptheohoadon = $("#sapxeptheohoadon").val();
            $theothongtu = $("#theothongtu").val();
            $congdonhanghoa = $("#congdonhanghoa").val();

            $makhachhang = $("#makhachhang").val();
            $matk = $("#tkco").val();

            $kieuin = $("#kieuin").val();
            $loaingoaite = $("#loaingoaite").val();

            if (valid) {
                $('.dialog_main_thongbao').load("form/frm_insolieu_chitietno_khachhang.php?tungay=" + $tungay + "&denngay=" + $denngay + "&intheochungtu=" + $Intheochungtu+ "&sapxeptheohoadon=" + $sapxeptheohoadon+ "&theothongtu=" + $theothongtu+ "&loaingoaite=" + $loaingoaite+ "&nhapxuatkho=" + $nhapxuatkho+ "&congdonhanghoa=" + $congdonhanghoa+ "&makhachhang=" + $makhachhang+ "&matk=" + $matk);
                
            }


            return valid;
        }

        function xoadialog_bangketoankho() {// đóng form
            reset_dialog(".dialog-bangke_chitietno_khachhang");
            reset_dialog(".dialog_main_bangke_chitietno_khachhang");
        }

        dialog = $("#dialog-bangke_chitietno_khachhang").dialog({
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