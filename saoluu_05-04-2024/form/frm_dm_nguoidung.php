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
    $(function () {
        $height = getHeight();
        $width = getWidth() - 200;
        $dir_module_user = "modules/user/";//--------------------------------------------Thay đổi khi copy
        function xoadialog_manhomvt() { // ----------------------đóng form
            reset_dialog(".dialog-nhommakh");
            reset_dialog(".dialog_main_makh");
        }

        $("#dialog-nhommakh").dialog({ // ------------------Gọi dialog
            resizable: false,
            height: $height,
            width: $width,
            modal: true

        });
        $("#dialog-nhommakh").keydown(function (event) {//--------------Các phím tắt
            var $grid_pb = $("#grid_editing_manhom_makh").closest('.pq-grid');//---- Lưới----------------
            if (event.keyCode == Keys.F7 || event.keyCode == Keys.F8) {
                var rowSelect = getRowSelect();//------ Lấy đối tượng được chọn
                if (rowSelect == false) {
                    alert_f("Chú Ý", "fa fa-warning", "red", "Bạn cần chọn dữ liệu trước khi thực hiện !");
                }
            }
            var rowEditting = $("#grid_editing_manhom_makh").pqGrid("getRowsByClass", {cls: 'pq-row-edit'});//---Lấy đối tượng đang sửa
            if ($('div').hasClass('jconfirm') == false) {
                if (event.keyCode == Keys.F4) {
                    rowIndx = 0;
                    var colM = $("#grid_editing_manhom_makh").pqGrid("option", "colModel");
                    colM[1].editable = true;
                    $("#grid_editing_manhom_makh").pqGrid("option", "colModel", colM);

                    addRow(rowIndx, 'manhom', $grid_pb);
                }
                if (event.keyCode == Keys.F7) { // copy

                    var rowIndx = rowSelect[0].rowIndx;
                    var rowData = rowSelect[0].rowData;
                    var colM = $("#grid_editing_manhom_makh").pqGrid("option", "colModel");
                    colM[1].editable = true;
                    $("#grid_editing_manhom_makh").pqGrid("option", "colModel", colM);

                    //---------------Khai báo các cell khi dùng lệnh copy-----------------------------------------
                    //--------------------------------------------Thay đổi khi copy---------------------------------
                    var _dataRow = {tennguoidung: rowData.tennguoidung, level: rowData.level, khoadulieu: rowData.khoadulieu};
                    addRow(rowIndx, 'manhom', $grid_pb, _dataRow);
                }
                if (event.keyCode == Keys.F8) { // Xóa
                    if (rowSelect != false) {
                        if (isEditing($grid_pb)) {
                            return false;
                        }
                        var rowData = rowSelect[0].rowData;
                        deleteRow(rowData, $grid_pb);
                    }
                }

                if (event.keyCode == Keys.ESCAPE && $('div').hasClass('jconfirm') == false) {
                    change_data_quit_httk_select();
                }
            } else {
                return false;
            }
        }); // end phím tắt
        function change_data_quit_httk_select() { // Cảnh báo thoát khi thay đổi dữ liệu////////////////////////////////////////////////////

            $.confirm({
                title: 'Thông báo',
                content: 'Bạn đang chuẩn bị thoát cửa sổ này ? .<br/>Nhấn phím <strong style="color:blue;">[Y]</strong> để đồng ý phím <strong style="color:red;">[N]</strong> để hủy bỏ ',
                icon: 'fa fa-warning',
                type: 'red',
                buttons: {
                    "Đồng ý": {
                        keys: ['Y'], action: function () {
                            xoadialog_manhomvt();
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
        function addRow(rowIndx, $name='tendangnhap', $grid, $obj_addrow="") {
            $ma = "";
            $.ajax({
                url: $dir_module_user + "taoma_user.php",
                async: false,
                success: function (response) {
                    $ma = response;
                }
            });
            if ($obj_addrow != "") {
                var rowData = $obj_addrow;
            } else {
                var rowData =  {sott:$ma,tennguoidung: "", level: "3", khoadulieu: "1"};
            }
            rowData.manhom = $ma;
            if (typeof rowIndx == 'undefined')
                rowIndx = 0;
            $grid.pqGrid("addRow", {rowIndx: rowIndx, rowData: rowData});

            $grid.pqGrid("setSelection", {rowIndx: rowIndx, dataIndx: $name});
            $grid.pqGrid("editFirstCellInRow", {rowIndx: (rowIndx)});
        }

        //----------------------------Hàm xóa dữ kiệu------------------------------------------
        function deleteRow(rowData, $grid) {
            var rowData = rowData;
            var ma = rowData.tendangnhap;
            var sott = rowData.sott;
            if ($('div').hasClass('jconfirm') == false) {
                $.confirm({
                    title: "Chú ý", icon: "fa fa-times-circle", type: "red",
                    content: "Bạn có muốn xóa hàng có tên người dùng " + (ma) + "  không ?" + '<br/>Nhấn phím <strong style="color:blue;">[Y]</strong> để đồng ý phím <strong style="color:red;">[N]</strong> để hủy bỏ ',
                    buttons: {
                        "Đồng ý": {
                            keys: ['Y'], action: function () {


                                $.ajax($.extend({}, ajaxObj, {
                                    context: $grid,
                                    url: $dir_module_user + "del_user.php",
                                    data: {id: sott, ma: ma},
                                    success: function (result) {
                                        this.pqGrid("commit");
                                        this.pqGrid("refreshDataAndView");
                                    },
                                    error: function () {
                                        this.pqGrid("removeClass", {rowData: rowData, cls: 'pq-row-delete'});
                                        this.pqGrid("commit");
                                        this.pqGrid("refreshDataAndView");
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

        //--------------------------------Khai báo lưới---------------------------------------.
        var objmanhomkh = {
            hwrap: true,
            vwrap: false,
            //resizable: true,
            rowBorders: true,
            height: $height - 59,
            width: $width - 12,
            //virtualX: true,
            numberCell: {show: true},
            filterModel: {on: true, mode: "AND", header: true},
            trackModel: {on: true}, //to turn on the track changes.
            scrollModel: {
                autoFit: false
            },
            freezeCols:2,
            historyModel: {
                checkEditableAdd: true
            },
            editModel: {
                allowInvalid: true,
                saveKey: $.ui.keyCode.ENTER
            },
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

                var url = "";
                if (type == 'update') {
                    var valid = grid.isValid({rowData: rowData, allowInvalid: true}).valid;
                    if (valid) {
                        if (rowData[recIndx] == null) {
                            url = $dir_module_user + "add_user.php";
                        }
                        else {
                            url = $dir_module_user + "edit_user.php";
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
                            var colM = $("#grid_editing_manhom_makh").pqGrid("option", "colModel");
                            colM[1].editable = false;
                            $("#grid_editing_manhom_makh").pqGrid("option", "colModel", colM);


                        },
                    });
                }
            },
            colModel: [//-------------------------------------------Khai báo các cột trong lưới-----------------------
                { title: "Lưu", dataType: "integer", dataIndx: "sott", editable: false, width: 0, hidden:false,align:"center",
                    render: function (ui) {
                        var $val  = ui.rowData.sott;
                        if($val==0 || $val=="" || typeof $val == 'undefined'){
                            return "<img src='icon/uncheck.png' width='20px'/>";
                        } else {
                            return "<img src='icon/check.png' width='20px' />";
                        }
                    },},
                {
                    title: "Tên đăng nhập",
                    dataType: "string",
                    dataIndx: "tendangnhap",
                    width: 140,
                    sortable: true,
                    editable: false,
                    validations: [
                        {type: 'minLen', value: 2, msg:  "Tên đăng nhập phải có từ 2 đến 15 ký tự !"},
                        {type: 'maxLen', value: 15, msg: "Tên đăng nhập phải có từ 2 đến 15 ký tự !"},
                        {
                            type: function (ui) {
                                isEdit = isEditCell();
                                if (isEdit) {
                                    var value = ui.value,
                                        _found = false, sott = ui.rowData.sott;
                                    //remote validation
                                    $.ajax({
                                        url: $dir_module_user + "checkkey_user.php",
                                        data: {'tendangnhap': value, 'sott': sott},
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
                    filter: {
                        type: 'textbox',
                        condition: 'begin',
                        listeners: ['keyup']
                    }
                },
                {
                    title: "Mật khẩu", width: 250, dataType: "string", dataIndx: "matkhau",
                    validations: [
                        {type: 'minLen', value: 8, msg:  "Tên đăng nhập phải có từ 8 đến 32 ký tự !"},
                        {type: 'maxLen', value: 32, msg: "Tên đăng nhập phải có từ 8 đến 32 ký tự !"}
                        ]
                },
                {
                    title: "Nhóm người dùng", width: 140, dataType: "string", dataIndx: "level",align:"center",
                    editor: {type: "select", options: [{"1": "GIÁM ĐỐC"}, {"2": "TRƯỞNG NHÓM"}, {"3": "KẾ TOÁN VIÊN"}]},
                    render: function (ui) {
                        var $value = ui.rowData.level;
                        if ($value == "1") {
                            return "GIÁM ĐỐC";
                        } else if ($value == "2") {
                            return "TRƯỞNG NHÓM";
                        }else {
                            return "KẾ TOÁN VIÊN";
                        }
                    }
                },
                {
                    title: "Quyền", width: 100, dataType: "string", dataIndx: "khoadulieu",align:"center",
                    editor: {type: "select", options: [{"1": "TOÀN QUYỀN"}, {"2": "CHỈ ĐỌC"}]},
                    render: function (ui) {
                        var $value = ui.rowData.khoadulieu;
                        if ($value == "1") {
                            return "TOÀN QUYỀN";
                        } else {
                            return "CHỈ ĐỌC";
                        }
                    }
                },
                {
                    title: "Doanh nghiệp quản lý (Dùng (;) để thêm doanh nghiệp )",
                    width: 250,
                    dataType: "string",
                    dataIndx: "doanhnghiepquanly",
                    align: "left",
                    editor: {type: "textarea", attr: "rows=6"}

                },
                {
                    title: "Thêm DN", width: 100, dataType: "string", dataIndx: "themdn",align:"center",
                    editor: {type: "select", options: [{"0": "KHÔNG"}, {"1": "CÓ"}]},
                    render: function (ui) {
                        var $value = ui.rowData.themdn;
                        if ($value == "1") {
                            return "CÓ";
                        }else {
                            return "KHÔNG";
                        }
                    }
                },
                {
                    title: "Thống kê", width: 100, dataType: "string", dataIndx: "thongke",align:"center",
                    editor: {type: "select", options: [{"0": "KHÔNG"}, {"1": "CÓ"}]},
                    render: function (ui) {
                        var $value = ui.rowData.thongke;
                        if ($value == "1") {
                            return "CÓ";
                        }else {
                            return "KHÔNG";
                        }
                    }
                },

            ],//-----------------------------------------Kết thúc các cột---------------------------------------
            pageModel: {type: "local", rPP: 200, strRpp: "{0}", strDisplay: "{0} đến {1} của {2}"},
            dataModel: {
                dataType: "JSON",
                location: "remote",
                recIndx: "sott",
                url: $dir_module_user + "list_user.php",//-- Load danh sách lên lưới
                getData: function (response) {
                    return {data: response.data};
                }
            },
            load: function (evt, ui) {
                var grid = $(this).pqGrid('getInstance').grid,
                    data = grid.option('dataModel').data;

                grid.isValid({data: data, allowInvalid: true});
            }
        };
        var $grid = $("#grid_editing_manhom_makh").pqGrid(objmanhomkh);

        //use refresh & refreshRow events to display jQueryUI buttons and bind events.
        function getRowSelect() { // --------------------Lấy dữ liệu theo dòng trên gird----------------------
            var arr = $("#grid_editing_manhom_makh").pqGrid("selection", {
                type: 'cell',
                method: 'getSelection'
            }); //Lấy giá trị đang chọn
            if (arr && arr.length > 0) {
                return arr;
            } else {
                return false;
            }
        }

        function isEditCell(rowIndex, dataIndx) { // --------------------Lấy dữ liệu theo dòng trên gird----------------------
            var isEdit = false;
            isEdit = $("#grid_editing_manhom_makh").pqGrid("isDirty"); //Lấy giá trị đang chọn

            return isEdit;
        }

        //-----------------------------Hết lưới---------------------------------------------------------------------
        setTimeout(function () {
            $("#grid_editing_manhom_makh .pq-search-hd-field").focus();
        }, 100);
    });
</script>
<div id="dialog-nhommakh"
     title="DANH SÁCH NGƯỜI DÙNG.... (ENTER : Sửa,Lưu , F4 : Thêm mới , F7: Sao chép , F8: Xóa , ESC: Thoát">
    <!-- dialog -->
    <div id="grid_editing_manhom_makh" style="margin:5px auto;border: 0px !important;"></div>
</div>

