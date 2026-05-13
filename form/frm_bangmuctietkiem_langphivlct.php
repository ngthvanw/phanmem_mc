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

    tr td.green{
        background-color:rgba(143,230,74,0.53);
    }

</style>
<div id="dialog-baocao_sudung_hoadon" title="BẢNG TỔNG HỢP MỨC TIẾT KIỆM/LÃNG PHÍ VL CÔNG TRÌNH...">
    <p class="validateTips"></p>
    <form method="post" id="Form-chinh" enctype="multipart/form-data">
        <fieldset style="background-color: #afd9ee">
            <legend>Thời gian</legend>
            <table border="0" style="width: 100%;">
                <tr style="display:block;">
                    <td><b>&nbsp;&nbsp;Từ ngày</b>&nbsp;&nbsp;</td>
                    <td><input type="date" name="TuNgay" style="width:130px;" id="TuNgay" class="text ui-widget-content ui-corner-all" value="<?php echo $_SESSION['NienDo']; ?>-01-01"></td>
                    <td><b>&nbsp;&nbsp;Đến ngày</b>&nbsp;&nbsp;</td>
                    <td><input type="date" name="DenNgay" style="width:130px;" id="DenNgay" class="text ui-widget-content ui-corner-all" value="<?php echo $_SESSION['NienDo']; ?>-12-31"></td>
                    <td><b>&nbsp;&nbsp;Lọc theo</b>&nbsp;&nbsp;</td>
                    <td>
                        <select id="LocTheoLoai">
                            <option value="621">Chi phí nguyên vật liệu</option>
                            <option value="623">Chi phí ca Máy</option>
                            <option value="627">Chi phí SXC</option>
                        </select>
                    </td>

                </tr>
            </table>
        </fieldset>
        <fieldset style="background-color: #afd9ee">
            <legend>DANH MỤC CÔNG TRÌNH</legend>
            <table border="0" style="width: 100%;">
                <tr style="display:block;">
                    <td></td>
                    <td>&nbsp</td>
                    <td><div id="grid_editing_bangchitiet_hanghoa"  style="height:400px;"></div></td>
                    <td width="50px"></td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
            </table>
        </fieldset>
        <fieldset style="background-color: #afd9ee;display:none;">
            <legend>Tự động xử lý</legend>
            <table border="0" style="width: 100%;">
                <tr>
                    <td><input style="margin:6px;" name="tudongtaobuttoan" type="checkbox" value="" id="tudongtaobuttoan" />
                    Tự động tạo bút toán phát sinh</td>
                </tr>
            </table>
        </fieldset>
    </form>
</div>

<script>
    $height = getHeight();
    $width = 750;
    $dir_module_dmsanpham = "modules/dmsanpham/";////////////////Khai báo đường dẫn vào mudole
    $(function () {

        var obj = {
            hwrap: false,
            resizable: true,
            rowBorders: true,
            height:$height-180,
            width:750-50,
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
                { title: "STT", dataType: "string", dataIndx: "STT", editable: false, width:10, hidden:true,align: "center"

                },
                { title: "Mã CT", dataType: "string", dataIndx: "masp", width: 150,sortable: true,
                    filter: {
                        type: 'textbox',
                        condition: 'begin',
                        listeners: ['keyup']
                    },
                    render: function (ui) {
                        var rowData = ui.rowData,
                            dataIndx = ui.dataIndx;

                        rowData.pq_cellcls = rowData.pq_cellcls || {};
                        if (rowData.CAP==2) {//if change is negative.
                            rowData.pq_cellcls[dataIndx] = 'green';
                            return rowData.masp;
                        }
                        else { //if change >= 0
                            return  rowData.masp;
                        }
                    }
                },
                { title: "Tên CT", width: 380, dataType: "string", dataIndx: "tensp",
                    validations: [
                        { type: 'minLen', value: 1, msg: "Tên vật tư hàng hóa không được trống !" }
                    ],
                    filter: {
                        type: 'textbox',
                        condition: 'begin',
                        listeners: ['keyup']
                    }

                },
                { title: "Loại", dataType: "string", dataIndx: "loaisp", width: 20,sortable: true},
                { title: "", dataIndx: "select", width: 5, align: "center", type:'checkBoxSelection', cls: 'ui-state-default', resizable: false, sortable:false }
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
                $("#khautrughangthang").focus();
            }
        })
        $("#khautrughangthang").keydown(function (event) {// Gọi table mã nội dung để chọn
            if (event.keyCode == Keys.ENTER) { // copy
                $("#thuedenghihoan").focus();
            }
        })

        $("#thuedenghihoan").keydown(function (event) {// Gọi table mã nội dung để chọn
            if (event.keyCode == Keys.ENTER) { // copy
                $("#doanhsogtgtkhautru").focus();
            }
        })
        $("#doanhsogtgtkhautru").keydown(function (event) {// Gọi table mã nội dung để chọn
            if (event.keyCode == Keys.ENTER) { // copy
                $("#thuegtgtkhautru").focus();
            }
        })
        $("#thuegtgtkhautru").keydown(function (event) {// Gọi table mã nội dung để chọn
            if (event.keyCode == Keys.ENTER) { // copy
                $("#doanhsogtgtdaura").focus();
            }
        })
        $("#doanhsogtgtdaura").keydown(function (event) {// Gọi table mã nội dung để chọn
            if (event.keyCode == Keys.ENTER) { // copy
                $("#thuegtgtdaura").focus();
            }
        })
        $("#thuegtgtdaura").keydown(function (event) {// Gọi table mã nội dung để chọn
            if (event.keyCode == Keys.ENTER) { // copy
                $("#thuegtgtngoaitinh").focus();
            }
        })

        $("#thuegtgtngoaitinh").keydown(function (event) {// Gọi table mã nội dung để chọn
            if (event.keyCode == Keys.ENTER) { // copy
                $("#thuegtgtmuavaoduandautu").focus();
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

        $("#thietlapsoduhoadon").click(function (event) {// Gọi table mã nội dung để chọn
            $('.dialog_main_sodu_hoadon').load('form/frm_dm_sodung_hoadon.php');
        })

        $("#sohoadonmuavaotrongnam").click(function (event) {// Gọi table mã nội dung để chọn
            $('.dialog_main_sodu_hoadon').load('form/frm_dm_sodung_hoadon_trongky.php');
        })
        $("#sohoadonmattralai").click(function (event) {// Gọi table mã nội dung để chọn
            $('.dialog_main_sodu_hoadon').load('form/frm_dm_sodung_hoadon_trongky_xoa.php');
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

            var $grid = $("#grid_editing_bangchitiet_hanghoa");
            $TuNgay = $("#TuNgay").val();
            $DenNgay = $("#DenNgay").val();
            $LocTheoLoai = $("#LocTheoLoai").val();
            var  selarray = $grid.pqGrid('selection', { type: 'row', method: 'getSelection' });
            var ids = [];
            for (var i = 0, len = selarray.length; i < len; i++) {
                var rowData = selarray[i].rowData;

                ids+=rowData.masp+",";
            }
            $masp = ids;

            if (valid) {
                $.confirm({
                    title: 'Cập nhật thành công',
                    type: 'green',
                    autoClose: 'OK|1000',
                    content: function(){
                        var self = this;
                        return $.ajax({
                            url: $dir_module_dmsanpham + "thembang_tietkiem_langphi_vlct.php",
                            async: false,
                            data: {mact: $masp,tungay:$TuNgay,denngay:$DenNgay,LocTheoLoai:$LocTheoLoai},
                        });
                    },
                    buttons: {
                        "OK": {
                            keys: ['Y'], action: function () {
                                $('.dialog_main_thongbao').load("form/frm_insolieu_bangtietkiem_langphi_vlct.php?mact=" + $masp+"&tungay="+$TuNgay+"&denngay="+$DenNgay );
                            }
                        }
                    }
                });
            }

            return valid;
        }

        function xoadialog_bangketoankho() {// đóng form
            reset_dialog(".dialog-baocao_sudung_hoadon");
            reset_dialog(".dialog_main_baocao_sudung_hoadon");
        }

        dialog = $("#dialog-baocao_sudung_hoadon").dialog({
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