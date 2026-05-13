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
<div id="dialog-bangke_hanghoa_laigop" title="Chi tiết nhập, xuất kho hàng...">
    <p class="validateTips"></p>
    <form method="post" id="Form-chinh" enctype="multipart/form-data">
        <fieldset style="background-color: #afd9ee">
            <legend>Kỳ tính của năm <?php echo $_SESSION['NienDo']; ?></legend>
            <table border="0" style="width: 100%;">
                <tr>
                    <td></td>
                    <td>Nhập/xuất</td>
                    <td align="left">
                        <select name="nhapxuatkho" style="width:95%;height:25px;" id="nhapxuatkho">
                            <option value="1">Xuất kho</option>
                            <option value="2">Nhập kho</option>
                            <option value="4">Sổ nhật ký mua hàng</option>
                            <option value="5">Sổ nhật ký bán hàng</option>
                        </select>
                    </td>
                    <td></td>
                    <td align="right"></td>
                </tr>
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
                    <td width="100px"><b>Nội dung:</b></td>
                    <td><select name="theonoidung" style="width:190px;height:25px;" id="theonoidung">
                            <option value="ALL">In toàn bộ</option>
                        </select></td>
                    <td width="100px"><b>Khách hàng:</b></td>
                    <td>
                        <select name="theokhachhang" style="width:190px;;height:25px;" id="theokhachhang">
                            <option value="ALL">In toàn bộ</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><b>Tài khoản:

                        </b></td>
                    <td>
                        <select name="theotaikhoan" style="width:190px;;height:25px;" id="theotaikhoan">
                            <option value="ALL">TẤT CẢ - TÀI KHOẢN</option>
                            <option value="152">152 - Nguyên liệu, vật liệu</option>
                            <option value="153">153 - Công cụ, dụng cụ</option>
                            <option value="155">155 - Thành phẩm</option>
                            <optgroup label="156 - Hàng hóa">
                                <option value="1561">1561 - Giá mua hàng hóa</option>
                                <option value="1562">1562 - Chi phí thumua hàng hóa</option>
                            </optgroup>
                            <option value="157">157 - Hàng gửi đi bán</option>
                        </select>
                    </td>
                    <td><b>Kho hàng:

                        </b></td>
                    <td>
                        <select name="LocTheoKho" id="LocTheoKho" style="height:25px; width:190px;">
                            <option value="ALL">Tất cả các kho</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><b>Nhóm hàng:

                        </b></td>
                    <td>
                        <select name="LocTheoNhomHang" style="width:190px;;height:25px;" id="LocTheoNhomHang">
                        </select>
                    </td>
                    <td><b>Xuất kho:</b></td>
                    <td><select name="LocTheoLoaiXK" id="LocTheoLoaiXK" style="height:25px; width:190px;">
                            <option value="ALL">TẤT CẢ XUẤT KHO</option>
                            <option value="2">Xuất kho bán</option>
                            <option value="3">Xuất kho SX</option>
                        </select></td>
                </tr>
                <tr>
                    <td><b>Bộ phận:

                        </b></td>
                    <td>
                        <select name="theobophan" style="height:25px; width:190px;" id="LocTheoBoPhan">

                        </select>
                    </td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <table style="width: 100%">
                            <tr>
                                <td><input style="margin:5px;" name="xemtatcahanghoa" type="checkbox"
                                           id="xemtatcahanghoa"
                                           checked="checked">Xem tất cả hàng hóa
                                </td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>

                            </tr>
                        </table>
                    </td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td style="height:400px;" colspan="4">
                        <div id="grid_editing_bangchitiet_hanghoa" style="height:350;"></div>
                    </td>
                </tr>
                <tr>
                    <td colspan="2"></td>
                </tr>
            </table>
        </fieldset>
        <fieldset style="background-color: #afd9ee;">
            <legend>Sắp xếp</legend>
            <table width='100%' border='0'>
                <tr>
                    <td width="50%"><input type="hidden" name="KhoaSoVaChuyenTonKho" id="KhoaSoVaChuyenTonKho">
                        <select name="sapxephanghoa" id="sapxephanghoa" style="width:90%;height:25px;">
                            <option value="maspkt">Số thứ tự</option>
                            <option value="ngayghiso">Ngày ghi sổ</option>
                            <option value="ngayhoadon">Ngày hóa đơn</option>
                            <option value="makh">Khách hàng</option>
                            <option selected="selected" value="mavt">Tên hàng</option>
                        </select>
                    </td>
                    <td width="50%" align="right"><input type="hidden" id="mavattu"/>
                        <select name="congdonhanghoa" id="congdonhanghoa" style="width:90%;height:25px;">
                            <option selected="selected" value="0">Không cộng dồn</option>
                            <option value="1">Cộng dồn theo</option>
                        </select></td>
                </tr>
            </table>
        </fieldset>
    </form>
</div>

<script>
    $height = 300;
    $width = 600;
    $dir_module_mabp = "modules/mabp/";////////////////Khai báo đường dẫn vào mudole
    $dir_module_makhachhang = "modules/makhachhang/";////////////////Khai báo đường dẫn vào mudole
    $dir_module_manoidung = "modules/manoidung/";////////////////Khai báo đường dẫn vào mudole
    $dir_module_mavattu = "modules/mavattu/";//----------------Lưới
    $dir_module_manhomvattu = "modules/manhomvattu/";//--------------------------------------------Thay đổi khi copy
    $dir_module_ps_kt = "modules/pskt/";//----------------Lưới
    $dir_module_makho = "modules/makho/";
    ///$dir_module_phieuthuchi = "modules/psmavattu/";//----------------Lưới
    $dir_module_nhapkho = "modules/psmavattu/";//----------------Lưới
    $dir_module_psvattu = "modules/psmavattu/";
    $dir_module_matk = "modules/httk/";////////////////Khai báo đường dẫn vào mudole
    $dir_module_mact = "modules/macongtrinh/";////////////////Khai báo đường dẫn vào mudole
    $(function () {
        function load_cb_khohang() {
            $.ajax({
                url: $dir_module_makho + "listall_cb.php",
                async: false,
                success: function (response) {
                    $("#LocTheoKho").html("<option value='ALL'>--- Tất cả kho hàng---</option>" + response);
                }
            });
        }

        load_cb_khohang();

        function load_cb_nhomhang() {
            $.ajax({
                url: $dir_module_manhomvattu + "listall_cb.php",
                async: false,
                success: function (response) {
                    $("#LocTheoNhomHang").html("<option value='ALL'>TẤT CẢ NHÓM HÀNG</option>"+response);
                }
            });
        }
        load_cb_nhomhang();

        function loadcb_mabp() {
            $.ajax({
                url: $dir_module_mact + "listcb_mact.php",
                async: false,
                success: function (response) {
                    $("#LocTheoBoPhan").html(response);
                }
            });
        }

        loadcb_mabp();

        //---------------------------------------------------------------------------------------------

        var obj = {
            hwrap: false,
            resizable: true,
            rowBorders: true,
            height: 450 - 58,
            width: 600 - 20,
            virtualX: false,
            numberCell: {show: true},
            filterModel: {on: true, mode: "AND", header: true},
            trackModel: {on: true}, //to turn on the track changes.
            selectionModel: {type: 'row'},
            scrollModel: {
                //autoFit: true
            },
            editable: false,
            selectionModel: { type: 'none', subtype:'incr', cbHeader:true, cbAll:true},
            editModel: {
                allowInvalid: false,
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
                    title: "Mã VT", dataType: "string", dataIndx: "mavt", width: 120, sortable: true,

                    filter: {
                        type: 'textbox',
                        condition: 'begin',
                        listeners: ['keyup']
                    }
                },
                {
                    title: "Tên VT", width: 360, dataType: "string", dataIndx: "tenvt",
                    validations: [
                        {type: 'minLen', value: 1, msg: "Tên vật tư hàng hóa không được trống !"}
                    ],
                    filter: {
                        type: 'textbox',
                        condition: 'begin',
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
            pageModel: {type: "remote", rPP: 100,rPPOptions:[100, 200, 500, 1000,2000,5000,10000]},
            dataModel: {
                dataType: "JSON",
                location: "remote",
                recIndx: "sott",
                url: $dir_module_mavattu + "list.php",//-- Load danh sách lên lưới
                getData: function (dataJSON) {
                    var data = dataJSON.data;
                    $("#mavattu").val("");
                    return {curPage: dataJSON.curPage, totalRecords: dataJSON.totalRecords, data: data};
                }
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
        $select_arr = [];
        $grid.on("pqgridrowselect", function (event, ui) {
            $mavt = ui.rowData.mavt;
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
                ui.rows[0].rowData.mavt
            if (typeof ui.rowData != "undefined")
                $mavt = ui.rowData.mavt;

            $mavatu = $("#mavattu").val();
            $mavattu_arr = $mavatu.split(",");
            if (parseInt($mavattu_arr.indexOf($mavt)) != -1) {
                $vitri = parseInt($mavattu_arr.indexOf($mavt))
                $mavattu_arr.splice($vitri, 1);
            }
            $mavattu_str = $mavattu_arr.toString();
            $("#mavattu").val($mavattu_str);
        });

        readonlyInput();

        function load_cb_khachhang() {
            $.ajax({
                url: $dir_module_makhachhang + "listall_cb.php",
                async: false,
                success: function (response) {
                    $("#theokhachhang").html(response);
                }
            });
        }

        load_cb_khachhang();

        function load_cb_manoidung() {
            $.ajax({
                url: $dir_module_manoidung + "listcb_mand.php",
                async: false,
                success: function (response) {
                    $("#theonoidung").html(response);
                }
            });
        }

        load_cb_manoidung();

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

            $nhapxuatkho = $("#nhapxuatkho").val();

            $theonoidung = $("#theonoidung").val();
            $theokhachhang = $("#theokhachhang").val();
            $theotaikhoan = $("#theotaikhoan").val();
            $loctheokho = $("#LocTheoKho").val();
            $LocTheoNhomHang = $("#LocTheoNhomHang").val();
            $LocTheoLoaiXK = $("#LocTheoLoaiXK").val();
            $LocTheoBoPhan = $("#LocTheoBoPhan").val();

            var $grid = $("#grid_editing_bangchitiet_hanghoa");
            var  selarray = $grid.pqGrid('selection', { type: 'row', method: 'getSelection' });
            var ids = [];
            for (var i = 0, len = selarray.length; i < len; i++) {
                var rowData = selarray[i].rowData;

                ids+=rowData.mavt+",";
            }
            $mavattu = ids;

            $xemtatcahanghoa = $("#xemtatcahanghoa").prop("checked");

            $sapxephanghoa = $("#sapxephanghoa").val();

            $congdonhanghoa = $("#congdonhanghoa").val();

            if (valid) {
                if ($nhapxuatkho == 1) {
                    $.confirm({
                        title: 'Cập nhật thành công',
                        type: 'green',
                        autoClose: 'OK|1000',
                        content: function () {
                            var self = this;
                            return $.ajax({
                                url: $dir_module_psvattu + "them_baocao_laigop.php",
                                dataType: 'json',
                                method: 'get',
                                data: {
                                    tungay: $tungay,
                                    denngay: $denngay,
                                    nhapxuatkho: $nhapxuatkho,
                                    theonoidung: $theonoidung,
                                    theokhachhang: $theokhachhang,
                                    LocTheoLoaiXK: $LocTheoLoaiXK,
                                    LocTheoBoPhan: $LocTheoBoPhan,
                                    mavattu: $mavattu,
                                    xemtatcahanghoa: $xemtatcahanghoa,
                                    sapxephanghoa: $sapxephanghoa,
                                    congdonhanghoa: $congdonhanghoa,
                                    theotaikhoan: $theotaikhoan,

                                },
                            });
                        },
                        buttons: {
                            "OK": {
                                keys: ['Y'], action: function () {
                                    $('.dialog_main_thongbao').load("form/frm_insolieu_bangke_laigop.php?tungay=" + $tungay + "&denngay=" + $denngay + "&theonoidung=" + $theonoidung + "&theokhachhang=" + $theokhachhang + "&mavattu=" + $mavattu + "&nhapxuatkho=" + $nhapxuatkho + "&xemtatcahanghoa=" + $xemtatcahanghoa + "&sapxephanghoa=" + $sapxephanghoa + "&congdonhanghoa=" + $congdonhanghoa + "&theotaikhoan=" + $theotaikhoan + "&loctheokho=" + $loctheokho+ "&loctheonhomhang=" + $LocTheoNhomHang);
                                }
                            }
                        }
                    });
                } else {
                    $.confirm({
                        title: 'Cập nhật thành công',
                        type: 'green',
                        autoClose: 'OK|1000',
                        content: function () {
                            var self = this;
                            return $.ajax({
                                url: $dir_module_psvattu + "them_baocao_laigop_nhapkho.php",
                                dataType: 'json',
                                method: 'get',
                                data: {
                                    tungay: $tungay,
                                    denngay: $denngay,
                                    nhapxuatkho: $nhapxuatkho,
                                    theonoidung: $theonoidung,
                                    theokhachhang: $theokhachhang,
                                    LocTheoLoaiXK: $LocTheoLoaiXK,
                                    mavattu: $mavattu,
                                    xemtatcahanghoa: $xemtatcahanghoa,
                                    sapxephanghoa: $sapxephanghoa,
                                    congdonhanghoa: $congdonhanghoa,
                                    theotaikhoan: $theotaikhoan,

                                },
                            });
                        },
                        buttons: {
                            "OK": {
                                keys: ['Y'], action: function () {
                                    $('.dialog_main_thongbao').load("form/frm_insolieu_bangke_laigop_nhapkho.php?tungay=" + $tungay + "&denngay=" + $denngay + "&theonoidung=" + $theonoidung + "&theokhachhang=" + $theokhachhang + "&mavattu=" + $mavattu + "&nhapxuatkho=" + $nhapxuatkho + "&xemtatcahanghoa=" + $xemtatcahanghoa + "&sapxephanghoa=" + $sapxephanghoa + "&congdonhanghoa=" + $congdonhanghoa + "&theotaikhoan=" + $theotaikhoan + "&loctheokho=" + $loctheokho+ "&loctheonhomhang=" + $LocTheoNhomHang);
                                }
                            }
                        }
                    });
                }
            }

            return valid;
        }

        function xoadialog_bangketoankho() {// đóng form
            reset_dialog(".dialog-bangke_hanghoa_laigop");
            reset_dialog(".dialog_main_bangke_hanghoa_laigop");
        }

        dialog = $("#dialog-bangke_hanghoa_laigop").dialog({
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