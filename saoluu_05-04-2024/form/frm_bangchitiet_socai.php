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
<div id="dialog-bangchitiet_socai" title="Sổ cái...">
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
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
            </table>
        </fieldset>
        <fieldset style="background-color: #afd9ee">
            <legend>Chọn tài khoản</legend>
            <table border="0" style="width: 100%;">
                <tr>
                    <td colspan="2">
                        <div id="grid_editing_bangchitiet_hanghoa" style="height:400px;"></div>

                    </td>
                </tr>
				<tr>
                    <td width="25%"><b>Lọc theo TK Đ.Ứ:
                    <td width="75%">
                        <input type="text" name="theotkdoiung" id="theotkdoiung" val="" placeholder="Dùng dấu , để tìm nhiều tài khoản đối ứng (ví dụ: 131,331)" style="width:100%;height:25px;"/>
                    </td>
                </tr>
                <tr>
                    <td width="25%"><b>Lọc theo ngày:
                    <td width="75%">
                        <select name="theongay" style="width:100%;height:25px;" id="theongay">
                            <option value="ngayghiso">Ngày ghi sổ</option>
                            <option value="ngaykhaithue">Ngày khai thuế</option>
                            <option value="ngayhoadon">Ngày hóa đơn</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td width="25%"><b>Lọc theo bộ phận:

                        </b><input type="hidden" id="mavattu"/></td>
                    <td width="75%">
                        <select name="theobophan" style="width:100%;height:25px;" id="theobophan">

                        </select>
                    </td>
                </tr>
                <tr>
                    <td><b>Lọc theo nội dung: </b></td>
                    <td><select name="theonoidung" style="width:100%;height:25px;" id="theonoidung">
                        </select></td>
                </tr>
                <tr>
                    <td><b style="font-size: 14px;">Sắp xếp theo :</b></td>
                    <td>
                        <select name="sapxep" id="sapxep" style="width:100%;height:25px;">
                            <option value="sophieu">Ngày ghi sổ ->Số TT</option>
                            <option value="ngayghiso">Ngày ghi sổ</option>
                            <option value="ngayhoadon">Ngày ghi sổ->Ngày hóa đơn</option>
                            <option value="sct">Ngày ghi sổ->Số hóa đơn</option>
                            <option value="tienco">Ngày ghi sổ->Số tiền nợ giảm</option>
                            <option value="tienno">Ngày ghi sổ->Số tiền có giảm</option>
                            <option value="noidung">Ngày ghi sổ->Nội dung</option>
							<option value="ngaykhaithue,sophieu">Ngày khai thuế ->Số TT</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><b style="font-size: 14px;">Cộng dồn:</b></td>
                    <td><select name="congdonsocai" id="congdonsocai" style="width:100%;height:25px;">
                            <option value="0">Không cộng dồn</option>
                            <option value="manoidung">Cộng dồn theo nội dung</option>
                            <option value="mabophan">Cộng dồn theo bộ phận</option>
                            <option value="mabophan,manoidung">Cộng dồn theo bộ phận, nội dung</option>
                        </select></td>
                </tr>
                <tr>
                    <td><b style="font-size: 14px;">Lọc theo SP/CT:</b></td>
                    <td><select name="loctheospct" id="loctheospct" style="width:100%;height:25px;">
                            <option value="ALL">Tất Cả</option>
                            <option value="">Không SP/CT</option>
                            <option value="SP">Sản phẩm</option>
                            <option value="CT">Công trình</option>
                            <option value="HD">Hợp đồng</option>
                        </select></td>
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
    $height = 760;
    $width = 710;
    $dir_module_mabp = "modules/mabp/";////////////////Khai báo đường dẫn vào mudole
    $dir_module_mact = "modules/macongtrinh/";////////////////Khai báo đường dẫn vào mudole
    $dir_module_makhachhang = "modules/makhachhang/";////////////////Khai báo đường dẫn vào mudole
    $dir_module_manoidung = "modules/manoidung/";////////////////Khai báo đường dẫn vào mudole
    $dir_module_ps_kt = "modules/pskt/";//----------------Lưới
    ///$dir_module_phieuthuchi = "modules/psmavattu/";//----------------Lưới
    $dir_module_nhapkho = "modules/psmavattu/";//----------------Lưới
    $dir_module_mavattu = "modules/mavattu/";//----------------Lưới
    $dir_module_matk = "modules/httk/";////////////////Khai báo đường dẫn vào mudole
    $(function () {

        //---------------------------------------------------------------------------------------------

        var obj = {
            hwrap: false,
            resizable: true,
            rowBorders: true,
            height: 425 - 30,
            width: 690 - 25,
            virtualX: true,
            numberCell: {show: true},
            filterModel: {on: true, mode: "AND", header: true},
            trackModel: {on: true}, //to turn on the track changes.
            selectionModel: {type: 'row'},
            scrollModel: {
                //autoFit: true
            },
            editable: false,
            selectionModel: {type: 'none', subtype: 'incr', cbHeader: false, cbAll: false},
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

                var url = "";
                if (type == 'update') {
                    var valid = grid.isValid({rowData: rowData, allowInvalid: true}).valid;
                    if (valid) {
                        if (rowData.mavt == "") {
                            var timemili = Date.now();
                            rowData.mavt = timemili;
                        }
                        if (rowData[recIndx] == null) {
                            url = $dir_module_mavattu + "add.php";
                        }
                        else {
                            url = $dir_module_mavattu + "edit.php";
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
                {title: "SoTT", dataType: "integer", dataIndx: "sott", editable: false, width: 0, hidden: true},
                {
                    title: "STT",
                    dataType: "string",
                    dataIndx: "STT",
                    editable: false,
                    width: 10,
                    hidden: true,
                    align: "center"
                },
                {
                    title: "Mã TK", dataType: "string", dataIndx: "matk", width: 150, sortable: true,

                    filter: {
                        type: 'textbox',
                        condition: 'regexp',
                        listeners: ['keyup']
                    }
                },
                {
                    title: "Tên TK", width: 400, dataType: "string", dataIndx: "tentk",
                    validations: [
                        {type: 'minLen', value: 1, msg: "Tên vật tư hàng hóa không được trống !"}
                    ],
                    filter: {
                        type: 'textbox',
                        condition: 'regexp',
                        listeners: ['keyup']
                    }
                },
                {
                    title: "",
                    dataIndx: "state",
                    width: 5,
                    align: "center",
                    type: 'checkBoxSelection',
                    cls: 'ui-state-default',
                    resizable: false,
                    sortable: false
                }
            ],//,
            //pageModel: { type: "remote", rPP: 100 },
            dataModel: {
                dataType: "JSON",
                location: "local",
                recIndx: "sott"
                /*url: $dir_module_matk + "list.php",//-- Load danh sách lên lưới
                getData: function (dataJSON) {
                    var data = dataJSON.data;
                    $("#mavattu").val("");
                    return {curPage: dataJSON.curPage, totalRecords: dataJSON.totalRecords, data: data};
                }*/
            },
            load: function (evt, ui) {
                var grid = $(this).pqGrid('getInstance').grid,
                    data = grid.option('dataModel').data;

                grid.isValid({data: data, allowInvalid: true});
            },
            refresh: function () {// khi làm mới lưới
                $("#grid_editing").find("button.delete_btn").button({icons: {primary: 'ui-icon-scissors'}})
                    .unbind("click")
                    .bind("click", function (evt) {
                        var $tr = $(this).closest("tr");
                        var rowIndx = $grid.pqGrid("getRowIndx", {$tr: $tr}).rowIndx;
                        $grid.pqGrid("deleteRow", {rowIndx: rowIndx});
                    });
            }
        };
        var $grid = $("#grid_editing_bangchitiet_hanghoa").pqGrid(obj);

        $grid.pqGrid("showLoading");
        $.ajax({
            url: $dir_module_matk + "list.php",//-- Load danh sách lên lưới
            //url: "/pro/customers.php",//for PHP
            dataType: "JSON",
            success: function (response) {
                //debugger;
                $grid.pqGrid("hideLoading");
                $grid.pqGrid("option", "dataModel.data", response.data);
                $grid.pqGrid("refreshDataAndView");
            }
        });


        $select_arr = [];
        $grid.on("pqgridrowselect", function (event, ui) {
            $mavt = ui.rowData.matk;
            $mavatu = $("#mavattu").val();
            if ($mavatu == "") {
                $mavattu_arr = new Array();
            } else {
                $mavattu_arr = $mavatu.split(",");
            }

            if (parseInt($mavattu_arr.indexOf($mavt)) == -1)
                $mavattu_arr.push($mavt);

            $mavattu_str = $mavattu_arr.toString();
            $("#mavattu").val($mavattu_str);

        });
        $grid.on("pqgridrowunselect", function (event, ui) {
            if (typeof ui.rows != "undefined")
                ui.rows[0].rowData.matk
            if (typeof ui.rowData != "undefined")
                $mavt = ui.rowData.matk;

            $mavatu = $("#mavattu").val();
            $mavattu_arr = $mavatu.split(",");
            if (parseInt($mavattu_arr.indexOf($mavt)) != -1) {
                $vitri = parseInt($mavattu_arr.indexOf($mavt))
                $mavattu_arr.splice($vitri, 1);
            }
            $mavattu_str = $mavattu_arr.toString();
            $("#mavattu").val($mavattu_str);
        });

        function loadcb_mabp() {
            $.ajax({
                url: $dir_module_mact + "listcb_mact.php",
                async: false,
                success: function (response) {
                    $("#theobophan").html(response);
                }
            });
        }

        loadcb_mabp();

        function loadcb_manoidung() {
            $.ajax({
                url: $dir_module_manoidung + "listcb_mand.php",
                async: false,
                success: function (response) {
                    $("#theonoidung").html(response);
                }
            });
        }

        loadcb_manoidung();

        //---------------------------------------------------------------------------------------------
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
            if (!(regexp.test(o.val()))) {
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
            valid = valid && checkNull($("#congdontuthang"), " Kiểm tra ngày nhập ");
            valid = valid && checkNull($("#congdondenthang"), " Kiểm tra ngày nhập ");

            $tungay = $("#congdontuthang").val();
            $denngay = $("#congdondenthang").val();
            $mavt = $("#mavattu").val();
            $theotkdoiung = $("#theotkdoiung").val();
            $theobophan = $("#theobophan").val();
            $theongay = $("#theongay").val();
            $loctheospct = $("#loctheospct").val();
            $noidung = $("#theonoidung").val();
            $sapxep = $("#sapxep").val();
            $congdonsocai = $("#congdonsocai").val();

            if ($mavt == "") {
                alert("Chưa chọn tài khoản");
                valid = false;
            }
            $xemchitiet = 0;
            if ($("#xemchitiet").prop("checked") == true) {
                $xemchitiet = 1;
            }

            if (valid) {
                $('.dialog_main_thongbao').load("form/frm_insolieu_bangchitiet_socai.php?tungay=" + $tungay + "&denngay=" + $denngay + "&sapxep=" + $sapxep + "&matk=" + $mavt + "&theobophan=" + $theobophan + "&theonoidung=" + $noidung + "&congdonsocai=" + $congdonsocai + "&loctheospct=" + $loctheospct+"&theongay="+$theongay+"&theotkdoiung="+$theotkdoiung);
            }

            return valid;
        }

        function xoadialog_bangketoankho() {// đóng form
            reset_dialog(".dialog-bangchitiet_socai");
            reset_dialog(".dialog_main_bangchitiet_socai");
        }

        dialog = $("#dialog-bangchitiet_socai").dialog({
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