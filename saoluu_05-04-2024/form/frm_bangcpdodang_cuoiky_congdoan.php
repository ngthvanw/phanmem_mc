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
<div id="dialog-bangcandoiketoan" title="BẢNG CHI PHÍ DỠ DANG CUỐI KỲ...">
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
                                             value="<?php if($_SESSION['TuNgay']!=""){ echo $_SESSION['TuNgay'];}else{echo $_SESSION['NienDo'] . "-" . date("m-d");} ?>"/></td>
                    <td>Đến ngày</td>
                    <td align="right">
                        <input type="date" name="congdondenthang" id="congdondenthang" style="width:130px;"
                               class="text ui-widget-content ui-corner-all"
                               value="<?php if($_SESSION['DenNgay']!=""){ echo $_SESSION['DenNgay'];}else{echo $_SESSION['NienDo'] . "-" . date("m-d");} ?>"/></td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
            </table>
        </fieldset>
        <fieldset style="background-color: #afd9ee;">
            <legend>Lọc dữ liệu</legend>
            <table border="0" style="width: 100%;">
                <tr>
                    <td colspan="2"><select name="loaisanpham" style="width:100%;height:25px;" id="loaisanpham">
                      <option value="CT">++++ CÔNG TRÌNH</option>
                      <option  value="SP">++++ SẢN PHẨM</option>
                  </select></td>
                </tr>
                <tr style="">
                    <td colspan="2"><select name="nhomcttheo" style="width:100%;height:25px;" id="nhomcttheo">
                            <option value="TENCONGTRINH">++++THEO TÊN CÔNG TRÌNH</option>
                            <option  value="DIABAN">++++THEO ĐỊA BÀN ƯU ĐÃI</option>
                        </select></td>
                </tr>
                <tr style="">
                    <td colspan="2"><select name="theocongdoan" style="width:100%;height:25px;" id="theocongdoan">
                            <option value="CD001">++++Cộng đoạn 1</option>
                            <option  value="CD002">++++Công đoạn 2</option>
                            <option  value="CD003">++++Công đoạn 3</option>
                            <option selected value="">++++Tổng hợp</option>
                        </select></td>
                </tr>
                <tr style="display:none">
                    <td><b>Sắp xếp : </b></td>
                    <td>
                        <select name="sapxeptheohoadon" id="sapxeptheohoadon" style="width:100%;height:25px;">
                            <option value="sott">Số thứ tự</option>
                            <option value="2">Ngày ghi sổ</option>
                            <option value="3">Ngày hóa đơn</option>
                            <option value="4">Khách hàng</option>
                            <option value="5">Tên hàng</option>
                            <option value="6">Thuế suất</option>
                        </select>
                    </td>
                </tr>
                <tr style="display:none">
                    <td><b style="font-size: 14px;">Kiểu in :</b></td>
                    <td><select name="kieuin" style="width:100%;height:25px;" id="kieuin">
                            <option value="1">In dọc</option>
                            <option selected value="2">In ngang</option>
                        </select></td>
                </tr>
                <tr style="display:none">
                    <td><b style="font-size: 14px;">Mẫu in :</b></td>
                    <td><select name="theothongtu" id="theothongtu" style="width:100%;height:25px;">
                            <option value="1">TT 127 ngày 27-12-2004</option>
                            <option value="2">TT 32 ngày 09-04-2007</option>
                            <option value="3">TT 60 ngày 14-06-2007</option>
                            <option selected value="4">TT 28 ngày 28-02-2011</option>
                        </select></td>
                </tr>
                <tr  style="display:block;">
                    <td colspan="2">
                    </td>
                </tr>
            </table>
        </fieldset>
        <fieldset style="background-color: #afd9ee;">
            <legend>Tự động tạo bút toán</legend>
            <table>
                <tr>
                    <td><input type="checkbox" checked name="TuDongTaoButToanPhatSinh" id="TuDongTaoButToanPhatSinh"></td>
                    <td>&nbsp;Tự động tạo bút toán phát sinh</td>
                </tr>
            </table>
        </fieldset>
        <fieldset style="background-color: #afd9ee;">
            <legend style="color: red">Tự động kết chuyển 154 sang 632</legend>
            <table>
                <tr>
                    <td><div id="grid_editing_bangchitiet_hanghoa"  style="height:400px;"></div></td>
                </tr>
            </table>
        </fieldset>
    </form>
</div>

<script>
    $height =750;
    $width = 730;
    $dir_module_mabp = "modules/mabp/";////////////////Khai báo đường dẫn vào mudole
    $dir_module_makhachhang = "modules/makhachhang/";////////////////Khai báo đường dẫn vào mudole
    $dir_module_manoidung = "modules/manoidung/";////////////////Khai báo đường dẫn vào mudole
    $dir_module_ps_kt = "modules/pskt/";//----------------Lưới
    ///$dir_module_phieuthuchi = "modules/psmavattu/";//----------------Lưới
    $dir_module_nhapkho = "modules/psmavattu/";//----------------Lưới
    $dir_module_matk = "modules/httk/";////////////////Khai báo đường dẫn vào mudole
    $dir_module_dmsanpham = "modules/dmsanpham/";
    $(function () {
        //---------------------------------------------------------------------------------------------

        var obj = {
            hwrap: false,
            resizable: true,
            rowBorders: true,
            height:$height-350,
            width:720-20,
            numberCell: { show: true },
            filterModel: { on: true, mode: "AND", header: true },
            trackModel: { on: true }, //to turn on the track changes.
            selectionModel: { type: 'row' },
            scrollModel: {
                //autoFit: true
            },
            editable: false,
            selectionModel: { type: 'none', subtype:'incr', cbHeader:true, cbAll:true},
            editModel: {
                allowInvalid: true,
                saveKey: $.ui.keyCode.ENTER
            },
            editor: {
                select: true
            },
            //pageModel: { type: "local", rPP: 50 },
            title: "",
            change: function (evt, ui) {// Khi dữ liệu thay đổi

                if (ui.source == 'commit' || ui.source == 'rollback') {
                    return;
                }
                var $grid = $(this),
                    grid = $grid.pqGrid('getInstance').grid;
                var rowList = ui.rowList,
                    recIndx = grid.option('dataModel').recIndx;
                //console.log(recIndx);

                var obj = rowList[0],
                    rowIndx = obj.rowIndx,
                    newRow = obj.newRow,
                    type = obj.type,
                    rowData = obj.rowData;

                var url="";
                if (type == 'update') {
                    var valid = grid.isValid({ rowData: rowData, allowInvalid: true }).valid;
                    if (valid) {
                        if(rowData.mavt==""){
                            var timemili = Date.now();
                            rowData.mavt=timemili;
                        }
                        if (rowData[recIndx] == null) {
                           // url = $dir_module_mavattu+"add.php";
                        }
                        else {
                           // url = $dir_module_mavattu+"edit.php";
                        }
                    }
                }
                if (valid) {
                    $.ajax({
                        url: url,
                        data: rowData,
                        dataType: "json",
                        type: "GET",
                        async: true,
                        beforeSend: function (jqXHR, settings) {
                            //$(".saving", $grid).show();
                        },
                        success: function (res) {
                            if (rowData[recIndx] == null) {
                                rowData.sott = res.recId;
                            }
                            $grid.pqGrid("refreshRow", {rowIndx: rowIndx});

                        },
                        complete: function () {
                            //$(".ui-state-highlight").focus();
                        }
                    });
                }
            },
            colModel: [//-------------------------------------------Khai báo các cột trong lưới-----------------------
                { title: "SoTT", dataType: "integer", dataIndx: "sott", editable: false, width: 0, hidden:true },
                { title: "STT", dataType: "string", dataIndx: "STT", editable: false, width:10, hidden:true,align: "center" },
                { title: "Mã CT", dataType: "string", dataIndx: "masp", width: 150,sortable: true},
                { title: "Tên CT", width: 380, dataType: "string", dataIndx: "tensp",
                    validations: [
                        { type: 'minLen', value: 1, msg: "Tên vật tư hàng hóa không được trống !" }
                    ],

                },
                { title: "Loại", dataType: "string", dataIndx: "loaisp", width: 20,sortable: true},
                { title: "", dataIndx: "chonchuyen", width: 5, align: "center", type:'checkBoxSelection', cls: 'ui-state-default', resizable: false, sortable:false }
            ],//,
            pageModel: { type: "local", rPP: 200, strRpp: "{0}", strDisplay: "{0} đến {1} của {2}" },
            dataModel: {
                dataType: "JSON",
                location: "remote",
                recIndx: "sott",
                postData: {loaisp:'CT'},
                url: $dir_module_dmsanpham+"/list.php",//-- Load danh sách lên lưới
                getData: function (dataJSON) {
                    var data = dataJSON.data;
                    $("#mavattu").val("");
                    return { curPage: dataJSON.curPage, totalRecords: dataJSON.totalRecords, data: data };
                }
            },
            load: function (evt, ui) {
                var grid = $(this).pqGrid('getInstance').grid,
                    data = grid.option('dataModel').data;

                grid.isValid({ data: data, allowInvalid: true });
            },
            refresh: function () {// khi làm mới lưới
                $("#grid_editing").find("button.delete_btn").button({ icons: { primary: 'ui-icon-scissors'} })
                    .unbind("click")
                    .bind("click", function (evt) {
                        var $tr = $(this).closest("tr");
                        var rowIndx = $grid.pqGrid("getRowIndx", { $tr: $tr }).rowIndx;
                        $grid.pqGrid("deleteRow", { rowIndx: rowIndx });
                    });
            }
        };
        var $grid = $("#grid_editing_bangchitiet_hanghoa").pqGrid(obj);
        readonlyInput();
        var dialog, form,
            emailRegex = /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/,
            rd_thangtonkho = $("#rd_thangtonkho"),
            tuthang = $("#tuthang"),
            tinhlaituthang = $("#tinhlaituthang"),

            rd_congdonthangtonkho = $("#rd_congdonthangtonkho"),
            congdontuthang = $("#congdontuthang"),
            congdondenthang = $("#congdondenthang"),
            loctheocap = $("#loctheocap"),
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
                .add(loctheocap)
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
                $("#loctheocap").focus();
            }
        })

        $("#loctheocap").keydown(function (event) {// Gọi table mã nội dung để chọn
            if (event.keyCode == Keys.ENTER) { // copy
                $("#xemchitiet").focus();
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

            $tungay = $("#congdontuthang").val();
            $denngay = $("#congdondenthang").val();
			
			$loaisanpham = $("#loaisanpham").val();
			$nhomcttheo = $("#nhomcttheo").val();
			$theocongdoan = $("#theocongdoan").val();

            var $grid = $("#grid_editing_bangchitiet_hanghoa");

            var  selarray = $grid.pqGrid('selection', { type: 'row', method: 'getSelection' });
                var ids = [];
            for (var i = 0, len = selarray.length; i < len; i++) {
                var rowData = selarray[i].rowData;

                ids+=rowData.masp+",";
            }
			$masp = ids;

			$TuDongTaoButToanPhatSinh = $("#TuDongTaoButToanPhatSinh").prop("checked");
            res = confirm("Bạn đang chuẩn bị tạo bảng dở dang cuối kỳ mới, bạn có muốn tiếp tục không ?\n Nhấn [OK] để tạo dữ liệu mới , [HUỶ] để lấy dữ liệu hiện tại .");
            if(res){
                $.confirm({
                    title: 'Cập nhật thành công',
                    type: 'green',
                    autoClose: 'OK|1000',
                    content: function(){
                        var self = this;
                        return $.ajax({
                            url: $dir_module_dmsanpham + "themthongtin_tonghop_doanhthu_chiphi_congtrinh.php",
                            dataType: 'json',
                            method: 'get',
                            data: {
                                tungay:$tungay,
                                denngay:$denngay,
                                loaisanpham:$loaisanpham,
                                masp:$masp,
                                TuDongTaoButToanPhatSinh:$TuDongTaoButToanPhatSinh,
                                nhomcttheo:$nhomcttheo,
                                theocongdoan:$theocongdoan
                            },
                        });
                    },
                    buttons: {
                        "OK": {
                            keys: ['Y'], action: function () {
                                $('.dialog_main_thongbao').load("form/frm_insolieu_bangchiphidodang_cuoiky.php?tungay=" + $tungay + "&denngay=" + $denngay+ "&loaisanpham=" + $loaisanpham+ "&nhomcttheo=" + $nhomcttheo+ "&theocongdoan=" + $theocongdoan);
                            }
                        }
                    }
                });
            }else{
                $('.dialog_main_thongbao').load("form/frm_insolieu_bangchiphidodang_cuoiky.php?tungay=" + $tungay + "&denngay=" + $denngay+ "&loaisanpham=" + $loaisanpham+ "&nhomcttheo=" + $nhomcttheo+ "&theocongdoan=" + $theocongdoan);
            }

        }

        function xoadialog_bangketoankho() {// đóng form
            reset_dialog(".dialog-bangcandoiketoan");
            reset_dialog(".dialog_main_bangcandoitaikhoan");
        }

        dialog = $("#dialog-bangcandoiketoan").dialog({
            autoOpen: false,
            height: $height,
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