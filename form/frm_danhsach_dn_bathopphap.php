<?php
session_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');
?>
    <style>
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
<script>
    $height = getHeight()-10;
    $width = getWidth()-20;
    $(function () {
        var $dir_module_banggiaonhan = "";
        $dir_module_banggiaonhan = "modules/banggiaonhan/";//--------------------------------------------Thay đổi khi copy
        $dir_module_user = "../modules/user/";//--------------------------------------------Thay đổi khi copy
        function xoadialog_makh() { // ----------------------đóng form
            reset_dialog(".dialog-makhachhang");
            reset_dialog(".dialog_main_makh");
        }

        $("#dialog-makhachhang").dialog({ // ------------------Gọi dialog
            resizable: false,
            height: $height,
            width: $width,
            modal: true

        });
        $("#dialog-makhachhang").keydown(function (event) {//--------------Các phím tắt
            var $grid_pb = $("#grid_editing_thongke_phanmem").closest('.pq-grid');//---- Lưới----------------
            if (event.keyCode == Keys.F7 || event.keyCode == Keys.F8 || event.keyCode == Keys.INSERT) {
                var rowSelect = getRowSelect();//------ Lấy đối tượng được chọn
                if (rowSelect == false) {
                    alert_f("Chú Ý", "fa fa-warning", "red", "Bạn cần chọn dữ liệu trước khi thực hiện !");
                }
            }
            var rowEditting = $("#grid_editing_thongke_phanmem").pqGrid("getRowsByClass", {cls: 'pq-row-edit'});//---Lấy đối tượng đang sửa
            if ($('div').hasClass('jconfirm') == false) {
                if (event.keyCode == Keys.ESCAPE && $('div').hasClass('jconfirm') == false && rowEditting.length < 1) {
                    change_data_quit_makh();
                }
                if (event.keyCode == Keys.F4) {
                    var rowSelect = getRowSelect();//------ Lấy đối tượng được chọn
                    if (rowSelect == false) {
                        var colM = $("#grid_editing_thongke_phanmem").pqGrid("option", "colModel");
                        colM[1].editable = true;
                        $("#grid_editing_thongke_phanmem").pqGrid("option", "colModel", colM);

                        addRow(rowIndx, 'masothue', $grid_pb);
                    } else {
                        var rowIndx = rowSelect[0].rowIndx;
                        var rowData = rowSelect[0].rowData;
                        var _dataRow = {
                            masothue: "",
                            tencongty: "",
                            diachi: "",
                            nguoigui: "<?php echo $_SESSION['User'] ?>",
                            ngaygui: "<?php echo date("Y-m-d H:i:s"); ?>",
                        };
                        var colM = $("#grid_editing_thongke_phanmem").pqGrid("option", "colModel");
                        colM[1].editable = true;
                        $("#grid_editing_thongke_phanmem").pqGrid("option", "colModel", colM);

                        addRow(rowIndx + 1, 'masothue', $grid_pb, _dataRow);
                    }
                }
            } else {
                return false;
            }
            if (event.keyCode == Keys.F7) { // copy
                if (rowSelect != false) {

                    var rowIndx = rowSelect[0].rowIndx;
                    var rowData = rowSelect[0].rowData;
                    //---------------Khai báo các cell khi dùng lệnh copy-----------------------------------------
                    //--------------------------------------------Thay đổi khi copy---------------------------------
                    var colM = $("#grid_editing_thongke_phanmem").pqGrid("option", "colModel");
                    colM[1].editable = true;
                    $("#grid_editing_thongke_phanmem").pqGrid("option", "colModel", colM);

                    var _dataRow = {
                        masothue: rowData.masothue,
                        tencongty: rowData.tencongty,
                        diachi: rowData.diachi,
                        nguoigui: "<?php echo $_SESSION['User'] ?>",
                        ngaygui: "<?php echo date("Y-m-d H:i:s"); ?>",
                    };
                    addRow(rowIndx + 1, 'masothue', $grid_pb, _dataRow);
                }
            }
            if (event.keyCode == Keys.F8) { // Xóa
                if (rowSelect != false) {
                    if ("<?php echo trim($_SESSION['Level']); ?>" == "1") {
                        var rowData = rowSelect[0].rowData;
                        deleteRow(rowData, $grid_pb);
                    } else {
                        alert("THÔNG BÁO \n\n BẠN KHÔNG CÓ QUYỀN XOÁ DÒNG NÀY .");
                    }
                }
            }
        }); // end phím tắt
        function change_data_quit_makh() { // Cảnh báo thoát khi thay đổi dữ liệu////////////////////////////////////////////////////{
            $.confirm({
                title: 'Thông báo',
                content: 'Dữ liệu chưa được chọn bạn có muốn thoát cửa sổ này ? .<br/>Nhấn phím <strong style="color:blue;">[Y]</strong> để đồng ý phím <strong style="color:red;">[N]</strong> để hủy bỏ ',
                icon: 'fa fa-warning',
                type: 'red',
                buttons: {
                    "Đồng ý": {
                        keys: ['Y'], action: function () {
                           xoadialog_makh();
                        }
                    },
                    "Hủy bỏ": {
                        keys: ['N'], action: function () {

                        }
                    }
                }
            });
        }


        //----------------------------------------------------Bắt đầu lưới-----------------------------------------
        var httk_select = function (ui) {
            var $cell = ui.$cell,
                rowData = ui.rowData,
                dataIndx = ui.dataIndx,
                cls = ui.cls, width = ui.column.minWidth,
                dc = $.trim(rowData[dataIndx]);
            $cell.css('padding', '0');

            var $inp = $("<input type='text'  name='" + dataIndx + "' class='" + cls + " pq-cell-editor pg-cel-define' readonly />")
                .appendTo($cell)
                .val(dc).keypress(function () {
                    $('.dialog_main_httk').load("form/frm_dm_httk_select.php?idstyle=grid_editing_thongke_phanmem");
                });
        }
        var ajaxObj = {
            dataType: "JSON",
            beforeSend: function () {
                this.pqGrid("showLoading");
            },
            complete: function () {
                this.pqGrid("hideLoading");
            },
            error: function () {
                this.pqGrid("rollback");
            }
        };

        //--------------------------Kiểm tra xem lưới có đang sửa không ---------------------------------------
        function isEditing($grid) {
            var rows = $grid.pqGrid("getRowsByClass", {cls: 'pq-row-edit'});
            if (rows.length > 0) {
                //focus on editor if any
                $grid.find(".pq-editor-focus").focus();
                return true;
            }
            return false;
        }

        //-------------------------Thêm mới dữ liệu-------------------------------------------------------
        function addRow(rowIndx, $name='', $grid, $obj_addrow="") {
            //append empty row in the first row.
            if ($obj_addrow != "") {
                var dataRow = $obj_addrow;
            } else {
                var dataRow = {
                    masothue: "",
                    tencongty: "",
                    nguoigui: "",
                    ngaygui: "<?php echo date("Y-m-d H:i:s"); ?>",
                    trangthai: 0,
                    ghichu: ""
                };
            }

            var rowData = dataRow; //empty row template
            if (typeof rowIndx == 'undefined')
                rowIndx = 0;
            $grid.pqGrid("addRow", {rowIndx: rowIndx, rowData: rowData});

            $grid.pqGrid("setSelection", {rowIndx: rowIndx, dataIndx: $name});
            $grid.pqGrid("editFirstCellInRow", {rowIndx: (rowIndx)});
        }

        //----------------------------Hàm xóa dữ kiệu------------------------------------------
        function deleteRow(rowData, $grid) {
            var rowData = rowData;
            //var ma = rowData.soct;
            var sott = rowData.sott;
            if ($('div').hasClass('jconfirm') == false) {
                $.confirm({
                    title: "Chú ý", icon: "fa fa-times-circle", type: "red",
                    content: "Bạn có muốn xóa hàng này không ?" + '<br/>Nhấn phím <strong style="color:blue;">[Y]</strong> để đồng ý phím <strong style="color:red;">[N]</strong> để hủy bỏ ',
                    buttons: {
                        "Đồng ý": {
                            keys: ['Y'], action: function () {


                                $.ajax($.extend({}, ajaxObj, {
                                    context: $grid,
                                    url: $dir_module_banggiaonhan + "del_dnbathopphap.php",
                                    data: {id: sott},
                                    success: function (result) {
                                        this.pqGrid("commit");
                                        this.pqGrid("refreshDataAndView");
                                    },
                                    error: function () {
                                        this.pqGrid("removeClass", {rowData: rowData, cls: 'pq-row-delete'});
                                        this.pqGrid("rollback");
                                    }
                                }));
                            }
                        },
                        "Hủy bỏ": {
                            keys: ['N'], action: function () {

                            }
                        }
                    }
                });
            }
        }

        //---------------------------Cập nhật row-----------------------------------------

        //--------------------------------Khai báo lưới---------------------------------------.
        var obj = {
            hwrap: true,
            //resizable: true,
            rowBorders: true,
            virtualX: false, virtualY: false,
            height: $height - 58,
            width: $width - 20,
            //virtualX: true,
            numberCell: {show: true},
            filterModel: {on: true, mode: "AND", header: true},
            trackModel: {on: true}, //to turn on the track changes.
            historyModel: {
                checkEditableAdd: true
            },
            editModel: {
                allowInvalid: false,
                saveKey: $.ui.keyCode.ENTER
            },
            freezeCols: 3,
            editor: {
                select: true
            },
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

                try{
                    masothue = $(".masothue").val().trim();
                }catch (e){
                    masothue="";
                }
                var re = /#/gi;
                if (masothue != "" && masothue.search(re) != -1) {
                    masothue = masothue.replace('#', '');
                    $.ajax({
                        url: "modules/doannghiep/checkiscompany.php",
                        type: "GET",
                        async: false,
                        data: {id: masothue},
                        success: function (res) {
                            $data = $.parseJSON(res);
                            if ($data.Data == "") {
                                rowData.masothue = masothue.replace("#","");
                                alert("Không thể kết nối tới cổng thông tin MST! Vui lòng nhập chính xác thông tin doanh nghiệp!");
                            }else {
                                $DATA = $.parseJSON($data.Data);
                                rowData.tencongty = $DATA.companyName.toUpperCase();
                                rowData.diachi = $DATA.address;
                                rowData.masothue = $DATA.taxCode.toUpperCase();
                            }
                        }
                    });
                }

                var url = "";
                if (type == 'update') {
                    var valid = grid.isValid({rowData: rowData, allowInvalid: true}).valid;
                    if (valid) {
                        if (rowData[recIndx] == null) {
                            rowData.ngaygui = "<?php echo date("Y-m-d H:i:s"); ?>";
                            rowData.nguoigui = "<?php echo $_SESSION['User'] ?>";

                            url = $dir_module_banggiaonhan + "add_dn_bathopphap.php";
                        } else {
                            rowData.ngaygui = "<?php echo date("Y-m-d H:i:s"); ?>";
                            url = $dir_module_banggiaonhan + "edit_dn_bathopphap.php";
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
                        success: function (res) {
                            if (rowData[recIndx] == null) {
                                rowData.sott = res.recId;
                            }
                            $grid.pqGrid("refreshRow", {rowIndx: rowIndx});
                        },
                    });
                }
            },
            colModel: [//-------------------------------------------Khai báo các cột trong lưới-----------------------
                {
                    title: "Lưu", dataType: "integer", dataIndx: "sott", editable: false, width: 0, hidden: false,align: "center",
                    render: function (ui) {
                        var $val = ui.rowData.sott;
                        if ($val == 0 || $val == "" || typeof $val == 'undefined') {
                            return "<img src='icon/uncheck.png' width='20px'/>";
                        } else {
                            return "<img src='icon/check.png' width='20px' />";
                        }
                    },
                },
                {
                    title: "Mã số thuế ",
                    minWidth: 110,
                    dataType: "string",
                    align: "left",
                    dataIndx: "masothue",
                    editable: false,
                    validations: [
                        {type: 'minLen', value: 10, msg: "Mã số thuế từ 10 đến 14 số !"},
                        {type: 'maxLen', value: 14, msg: "Mã số thuế từ 10 đến 14 số !"},
                        {
                            type: 'regexp',
                            value: '^[0-9#-]{0,14}$',
                            msg: 'Mã không có dấu và không có khoản trắng'
                        },
                        {
                            type: function (ui) {
                                isEdit = isEditCell();
                                if (isEdit) {
                                    var value = ui.value,
                                        _found = false, sott = ui.rowData.sott;
                                    $.ajax({
                                        url: $dir_module_banggiaonhan + "checkkey.php",
                                        data: {'id': value, 'sott': sott},
                                        async: false,
                                        success: function (response) {
                                            if (response == 1) {
                                                _found = true;
                                            }
                                        }
                                    });
                                    if (_found) {
                                        ui.msg = value + " đã tồn tại trong hệ thống";
                                        return false;
                                    }
                                }
                            }
                        }
                    ],
                    editor: {
                        type: "textbox",
                        cls: "masothue"
                    },
                    filter: {type: 'textbox', condition: 'contain', listeners: ['keyup']}
                },
                {
                    title: "Tên công ty",
                    minWidth: 300,
                    dataType: "string",
                    align: "left",
                    dataIndx: "tencongty",
                    editor: {type: "textarea", attr: "rows=5"},
                    validations: [
                        {type: 'minLen', value: 1, msg: "Tên công ty không được trống !"}
                    ],
                    filter: {type: 'textbox', condition: 'contain', listeners: ['keyup']}
                },
                {
                    title: "Địa chỉ",
                    minWidth: 300,
                    dataType: "string",
                    align: "left",
                    dataIndx: "diachi",
                    editable: true,
                    editor: {type: "textarea", attr: "rows=5"}
                },
                {
                    title: "Nguồn thông tin",
                    minWidth: 90,
                    dataType: "string",
                    dataIndx: "nguonthongtin",
                    editable: true,
                    editor: {
                        type: "select", options: function (ui) {
                            //remote validation
                            var parsedJson = [{"": "Chọn nguồn thông tin"},{"TCucThue": "-- Tổng Cục Thuế"},{"CQDieuTra": "-- CQ Điều Tra"},{"Website": "-- Website"},{"CoQuanThue": "-- Cơ quan thuế"}];
                            return parsedJson;
                        }
                    },
                    validations: [
                        {type: 'minLen', value: 1, msg: "Trường này không được trống!"}
                    ],
                    filter: {type: 'textbox', condition: 'contain', listeners: ['keyup']}
                },
                {
                    title: "Người gửi",
                    minWidth: 90,
                    dataType: "string",
                    dataIndx: "nguoigui",
                    editable: true,
                    editor: false,
                    filter: {type: 'textbox', condition: 'contain', listeners: ['keyup']}
                },
                {
                    title: "Ngày gửi",
                    minWidth: 100,
                    dataType: "string",
                    align: "left",
                    dataIndx: "ngaygui",
                    editable: false,
                    filter: {type: 'textbox', condition: "contain", listeners: ['keyup']},

                },
                {
                    title: "Ghi chú", minWidth: 300, dataType: "string", align: "left", dataIndx: "ghichu",editable:true,
					filter: {type: 'textbox', condition: 'contain', listeners: ['keyup']},
                    editor: {type: "textarea", attr: "rows=5"}
                }
            ],//-----------------------------------------Kết thúc các cột--------------------------------------
            pageModel: {type: "local", rPP: 200, strRpp: "{0}", strDisplay: "{0} đến {1} của {2}"},
            dataModel: {
                dataType: "JSON",
                location: "remote",
                recIndx: "sott",
                url: $dir_module_banggiaonhan + "list_dnbathopphap.php",//-- Load danh sách lên lưới
                getData: function (dataJSON) {
                    var data = dataJSON.data;
                    return {curPage: dataJSON.curPage, totalRecords: dataJSON.totalRecords, data: data};
                }
            },
            refresh: function () {
                $("#grid_editing_thongke_phanmem").find(".duyetthuquanly")
                    .unbind("click")
                    .bind("click", function (evt) {
                        var $tr = $(this).closest("tr");
                        var obj = $grid.pqGrid("getRowIndx", { $tr: $tr });
                        var rowIndx = obj.rowIndx;
                        var rowData = obj.rowData;

                        var ans = window.confirm("Are you sure to delete row No " + (rowIndx + 1) + "?");
                        $grid.pqGrid("removeClass", { rowIndx: rowIndx, cls: 'pq-row-delete' });
                        if (ans) {
                            $grid.pqGrid("deleteRow", { rowIndx: rowIndx });
                        }
                    });
            }
        };
        var $grid = $("#grid_editing_thongke_phanmem").pqGrid(obj);

        //use refresh & refreshRow events to display jQueryUI buttons and bind events.
        function getRowSelect() { // --------------------Lấy dữ liệu theo dòng trên gird----------------------
            var arr = $("#grid_editing_thongke_phanmem").pqGrid("selection", {
                type: 'cell',
                method: 'getSelection'
            }); //Lấy giá trị đang chọn
            if (arr && arr.length > 0) {
                return arr;
            } else {
                return false;
            }
        }
        //edit Row

       $(".duyetthuquanly").click(function () {
        });
        function isEditCell(rowIndex, dataIndx) { // --------------------Lấy dữ liệu theo dòng trên gird----------------------
            var isEdit = false;
            isEdit = $("#grid_editing_thongke_phanmem").pqGrid("isDirty"); //Lấy giá trị đang chọn
            return isEdit;
        }

        $grid.one("pqgridload", function (evt, ui) {// Lấy DS List box
            $("#grid_editing_thongke_phanmem .pq-search-hd-field[name='tencongty']").focus();
        });
        //-----------------------------Hết lưới---------------------------------------------------------------------

    });
</script>
<div id="dialog-makhachhang"
     title="DANH SÁCH DANH NGHIỆP BẤT HỢP PHÁP (F4: THÊM MỚI, F7: SAO CHÉP, F8: XOÁ)"><!-- dialog -->
    <div id="grid_editing_thongke_phanmem" style="margin:5px auto;border: 0px !important;"></div>
</div>