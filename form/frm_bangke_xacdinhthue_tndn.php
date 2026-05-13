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
<div id="dialog-tokhaithue_tndn" title="Quyết toán thuế TNDN...">
    <p class="validateTips"></p>
    <form method="post" id="Form-chinh" enctype="multipart/form-data">

        <fieldset style="background-color: #afd9ee">
            <legend>Xác định kết quả kinh doanh <?php echo $_SESSION['NienDo']; ?></legend>
            <table border="0" style="width: 100%;">
                <tr>
                    <td><input name="rd_thangtonkho" type="radio" id="rd_congdonthangtonkho" checked="checked"></td>
                    <td>Từ ngày</td>
                    <td align="right"><input type="date" name="tungay" style="width:130px;" id="tungay"
                                             class="text ui-widget-content ui-corner-all"
                                             value="<?php if($_SESSION['TuNgay']!=""){ echo $_SESSION['TuNgay'];}else{echo $_SESSION['NienDo'] . "-" . date("m-d");} ?>"/></td>
                    <td>Đến ngày</td>
                    <td align="right">
                        <input type="date" name="denngay" id="denngay" style="width:130px;"
                               class="text ui-widget-content ui-corner-all"
                               value="<?php if($_SESSION['DenNgay']!=""){ echo $_SESSION['DenNgay'];}else{echo $_SESSION['NienDo'] . "-" . date("m-d");} ?>"/></td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
            </table>
        </fieldset>
        <fieldset style="background-color: #afd9ee">
            <table border="0" style="width: 100%;">
                <tr>
                    <td>Một số chỉ tiêu về điều chỉnh tăng hoặc giảm thu nhập bạn phải tự xác định, bấm vào nút <b style="color:red">Thay đổi</b> để nhập vào</td>
                </tr>
            </table>
        </fieldset>
        <fieldset style="background-color: #afd9ee">
            <legend>Chuyển lỗ năm trước</legend>
            <table border="0" style="width: 100%;">
                <tr>
                    <td>
                  <table width="100%" border="0">
                    <tr>
                      <td><input type="checkbox" name="chb_lotuhoatdongkd" id="chb_lotuhoatdongkd" />
                      </td>
                      <td>Lỗ từ hoạt động SXKD</td>
                      <td><input disabled="disabled" type="number" name="lotuhoatdongkd" style="width:100%;" id="lotuhoatdongkd" class="text ui-widget-content ui-corner-all" value=""></td>
                    </tr>
                    <tr>
                      <td><input type="checkbox" name="chb_lotucqsdd" id="chb_lotucqsdd" /></td>
                      <td>Lỗ từ CQSDĐ, CQTĐ</td>
                      <td><input disabled="disabled" type="number" name="lotucqsdd" style="width:100%;" id="lotucqsdd" class="text ui-widget-content ui-corner-all" value=""></td>
                    </tr>
                  </table></td>
                </tr>
            </table>
        </fieldset>
        <fieldset style="background-color: #afd9ee;">
            <legend>Mẫu báo cáo</legend>
            <table width="100%">
                <tr>
                  <td><select name="maubaocao" id="maubaocao" style="width:100%;height:25px">
                      <option value="phuluc">Phụ lục 03-1A/TNDN</option>
                      <option value="tokhai">Tờ khai quyết toán thuế TNDN Mẫu số 03/TNDN</option>
                      <option value="phulucchuyenlo">Phụ lục chuyển lỗ từ hoạt động SXKD Mẫu số 03-2A/TNDN</option>
                      <option value="phulucuudia">Phụ lục thuế TNDN ưu đãi Mẫu số 03-3A/TNDN</option>
                      <option value="phulucgdlk">Phụ lục GDLK NĐ132</option>
                  </select></td>
                </tr>
            </table>
        </fieldset>
        <fieldset style="background-color: #afd9ee;">
            <legend>Thiết lập số liệu</legend>
            <table width="100%">
                <tr>
                  <td>
                  <button id="thietlapcachtinhsolieu" type="button" style="width:100%;border:1px solid #990" class="ui-button ui-corner-all ui-widget">Thiết lập cách tính số liệu...</button></td>
                </tr>
            </table>
        </fieldset>
       
        <fieldset style="background-color: #afd9ee;">
            <table>
                <tr>
                    <td><input type="checkbox" name="xacdinhthuetndn" id="xacdinhthuetndn"></td>
                    <td>&nbsp;Hạch toán thuế TNDN phải nộp</td>
                </tr>
                <tr>
                    <td><input type="checkbox" name="tudongcpkhongduoctru" id="tudongcpkhongduoctru"></td>
                    <td>&nbsp;Tự động cập nhật chi phí không được trừ</td>
                </tr>
            </table>
        </fieldset>
    </form>
</div>

<script>
    $height = 300;
    $width = 450;
    $dir_module_mabp = "modules/mabp/";////////////////Khai báo đường dẫn vào mudole
    $dir_module_ketoantonghop = "modules/ketoantonghop/";////////////////Khai báo đường dẫn vào mudole
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
		$("#chb_lotuhoatdongkd").click(function(){
			if($('#chb_lotuhoatdongkd').is(':checked')){
				$("#lotuhoatdongkd").prop( "disabled", false );
			}else{
				$("#lotuhoatdongkd").prop( "disabled", true );
			}
		});
		$("#chb_lotucqsdd").click(function(){
			if($('#chb_lotucqsdd').is(':checked')){
				$("#lotucqsdd").prop( "disabled", false );
			}else{
				$("#lotucqsdd").prop( "disabled", true );
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
                $("#Intheothuesuat").focus();
            }
        })

        $("#Intheothuesuat").keydown(function (event) {// Gọi table mã nội dung để chọn
            if (event.keyCode == Keys.ENTER) { // copy
                $("#xacdinhthuetndn").focus();
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

        $("#thietlapcachtinhsolieu").click(function () {
            $maubaocao = $("#maubaocao").val();
            if($maubaocao=="tokhai"){
                $('.dialog_main_thietlap_tokhai_thuetndn').load("form/frm_thietlap_tokhaiyhue_tndn.php?loaitokhai=TNDN");
            }else if($maubaocao=='phuluc'){
                $('.dialog_main_thietlap_tokhai_phuluc').load("form/frm_thietlap_tokhaiyhue_phuluc.php?loaitokhai=PLKQKD");
            }else if($maubaocao=='phulucuudia'){
                $('.dialog_main_thietlap_tokhai_phuluc').load("form/frm_thietlap_tokhaithue_phuluc_uudai.php");
            }else if($maubaocao=='phulucchuyenlo'){
                $('.dialog_main_thietlap_tokhai_phuluc').load("form/frm_thietlap_tokhaithue_phuluc_chuyenlo.php");
            }else if($maubaocao=='phulucgdlk'){
                $('.dialog_main_thietlap_tokhai_phuluc').load("form/frm_thietlap_tokhaithue_phuluc_gdlk.php");
            }

        });

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

        function ChucNang_ThiHanh() {// Xử lý khi nhấp button đồng ý
            var valid = true;
            allFields.removeClass("ui-state-error");// kiem tra du lieu

            $tungay = $("#congdontuthang").val();
            $denngay = $("#congdondenthang").val();
            $Intheothuesuat = $("#Intheothuesuat").val();
            $Intheochungtu = $("#Intheochungtu").val();

            $sapxeptheohoadon = $("#sapxeptheohoadon").val();
            $theothongtu = $("#theothongtu").val();

            $kieuin = $("#kieuin").val();
            $xacdinhthuetndn=0;
            if($("#xacdinhthuetndn").prop("checked") == true){
                $xacdinhthuetndn=1;
            }
            $tudongcpkhongduoctru=0;
            if($("#tudongcpkhongduoctru").prop("checked") == true){
                $tudongcpkhongduoctru=1;
            }
            $loaitokhai = $("#maubaocao").val();
            if ($loaitokhai=="phuluc") {
                $tontai = false;
                $.ajax({
                    url: $dir_module_ketoantonghop + "checktontaiphuluckd.php",
                    async: false,
                    success: function (response) {
                        if (parseInt(response) !=0 && response !="") {
                            $tontai = true;
                        }
                    }
                });

                if($tontai){// Nếu đã tồn tại phụ lục
                    var result = confirm("Đã tồn tại phụ lục ! Bạn có muốn ghi đè ?");
                    if (result) {
                        $.confirm({// Chay lai bảng cân đối tài khoản
                            title: 'Thành công',
                            type: 'green',
                            autoClose: 'OK|1000',
                            content: function () {
                                var self = this;
                                return $.ajax({
                                    url: $dir_module_ketoantonghop + "thucthiphuluc.php",
                                    dataType: 'json',
                                    method: 'get'
                                });
                            },
                            buttons: {
                                "OK": {
                                    keys: ['Y'], action: function () {

                                    }
                                }
                            }
                        });
                    }
                }else {// Chưa tồn tại phụ lục
                    $.confirm({// Chay lai bảng cân đối tài khoản
                        title: 'Thành công',
                        type: 'green',
                        autoClose: 'OK|1000',
                        content: function () {
                            var self = this;
                            return $.ajax({
                                url: $dir_module_ketoantonghop + "thucthiphuluc.php",
                                dataType: 'json',
                                method: 'get'
                            });
                        },
                        buttons: {
                            "OK": {
                                keys: ['Y'], action: function () {

                                }
                            }
                        }
                    });
                }
            }else if ($loaitokhai=="tokhai"){
                $tontai = false;
                $.ajax({
                    url: $dir_module_ketoantonghop + "checktontaitndn.php",
                    async: false,
                    success: function (response) {
                        if (parseInt(response) !=0 && response !="") {
                            $tontai = true;
                        }
                    }
                });
                if($tontai){
                    var result = confirm("Đã tồn tại thuế thu nhập doanh nghiệp ! Bạn có muốn ghi đè ?");
                    if (result) {
                        $.confirm({// Chay lai bảng cân đối tài khoản
                            title: 'Thành công',
                            type: 'green',
                            autoClose: 'OK|1000',
                            content: function () {
                                var self = this;
                                return $.ajax({
                                    url: $dir_module_ketoantonghop + "thucthitndn.php?tudongcpkhongduoctru="+$tudongcpkhongduoctru,
                                    dataType: 'json',
                                    method: 'get'
                                });
                            },
                            buttons: {
                                "OK": {
                                    keys: ['Y'], action: function () {

                                    }
                                }
                            }
                        });
                    }
                }else {
                    $.confirm({// Chay lai bảng cân đối tài khoản
                        title: 'Thành công',
                        type: 'green',
                        autoClose: 'OK|1000',
                        content: function () {
                            var self = this;
                            return $.ajax({
                                url: $dir_module_ketoantonghop + "thucthitndn.php?tudongcpkhongduoctru="+$tudongcpkhongduoctru,
                                dataType: 'json',
                                method: 'get'
                            });
                        },
                        buttons: {
                            "OK": {
                                keys: ['Y'], action: function () {

                                }
                            }
                        }
                    });
                }
            }else{
                alert("PHỤ LỤC NÀY CHỈ CẦN [THAY ĐỔI] VÀ [IN ẤN] !");
            }

            return valid;
        }
        function ChucNang_InAn() {// Xử lý khi nhấp button đồng ý
            $maubaocao = $("#maubaocao").val();
            if($maubaocao=="tokhai"){
                $('.dialog_main_thongbao').load("form/frm_insolieu_tokhaithue_tndn.php");
            }else if($maubaocao=='phuluc'){
                $('.dialog_main_thongbao').load("form/frm_insolieu_phuluc_kqkd.php");
            }else if($maubaocao=='phulucuudia'){
                $('.dialog_main_thongbao').load("form/frm_insolieu_phuluc_uudia.php");
            }else if($maubaocao=='phulucchuyenlo'){
                $('.dialog_main_thongbao').load("form/frm_insolieu_phuluc_chuyenlo.php");
            }else if($maubaocao=='phulucgdlk'){
                $('.dialog_main_thongbao').load("form/frm_insolieu_phuluc_gdlk.php");
            }
        }

        function xoadialog_bangketoankho() {// đóng form
            reset_dialog(".dialog-tokhaithue_tndn");
            reset_dialog(".dialog_main_tokhai_thuetndn");
        }
		function GoiThietLap_ToKhai(){
            $maubaocao = $("#maubaocao").val();
            $tungay = $("#tungay").val();
            $denngay = $("#denngay").val();
            if($maubaocao=="tokhai"){
                $('.dialog_main_thietlap_tokhai_thuetndn').load("form/frm_thietlap_tokhaiyhue_tndn.php?loaitokhai=TNDN&tungay="+$tungay+"&denngay="+$denngay);
            }else if($maubaocao=='phuluc'){
                $('.dialog_main_thietlap_tokhai_phuluc').load("form/frm_thietlap_tokhaiyhue_phuluc.php?loaitokhai=PLKQKD");
            }else if($maubaocao=='phulucuudia'){
                $('.dialog_main_thietlap_tokhai_phuluc').load("form/frm_thietlap_tokhaithue_phuluc_uudai.php");
            }else if($maubaocao=='phulucchuyenlo'){
                $('.dialog_main_thietlap_tokhai_phuluc').load("form/frm_thietlap_tokhaithue_phuluc_chuyenlo.php");
            }else if($maubaocao=='phulucgdlk'){
                $('.dialog_main_thietlap_tokhai_phuluc').load("form/frm_thietlap_tokhaithue_phuluc_gdlk.php");
            }
		}

        dialog = $("#dialog-tokhaithue_tndn").dialog({
            autoOpen: false,
            height: "auto",
            width: $width,
            modal: true,
            buttons: {
				"Thi hành": ChucNang_ThiHanh,
				"Thay đổi": GoiThietLap_ToKhai,
                "In ấn": ChucNang_InAn,
                "Kết thúc": function () {
                    xoadialog_bangketoankho();
                }
            }
        });

        dialog.dialog("open");

    })
    ;
</script>