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
	
tr.rownotsave td
	{
		background:#FA5882;
		color:Green;    
	}
	tr td.rownotsave
	{
		background:#FA5882;
		color:yellow;
	}
	.pq-grid td.pink
	{
		background:pink;
	}

</style>
<script>
    $height = getHeight();
    $width = getWidth() - 50;
    $(function () {
        //$('#dialog-makhachhang').find('button').first().focus();
        var $dir_module_makh = "";
        $dir_module_makh = "modules/makhachhang/";//--------------------------------------------Thay đổi khi copy
        $dir_module_httk = "modules/httk/";//--------------------------------------------Thay đổi khi copy
        $dir_module_manhomkh = "modules/manhomkh/";//--------------------------------------------Thay đổi khi copy
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
            var $grid_pb = $("#grid_editing_makh").closest('.pq-grid');//---- Lưới----------------
            if (event.keyCode == Keys.F7 || event.keyCode == Keys.F8) {
                var rowSelect = getRowSelect();//------ Lấy đối tượng được chọn
                if (rowSelect == false) {
                    alert_f("Chú Ý", "fa fa-warning", "red", "Bạn cần chọn dữ liệu trước khi thực hiện !");
                }
            }
            var rowEditting = $("#grid_editing_makh").pqGrid("getRowsByClass", {cls: 'pq-row-edit'});//---Lấy đối tượng đang sửa
            if ($('div').hasClass('jconfirm') == false) {
                if (event.keyCode == Keys.F4) {
                    var rowSelect = getRowSelect();//------ Lấy đối tượng được chọn
                    if (rowSelect == false) {
                        var colM = $("#grid_editing_makh").pqGrid("option", "colModel");
                        colM[1].editable = true;
                        $("#grid_editing_makh").pqGrid("option", "colModel", colM);
                        addRow(rowIndx, 'makh', $grid_pb);
                    } else {
                        var rowIndx = rowSelect[0].rowIndx;
                        var rowData = rowSelect[0].rowData;
                        var colM = $("#grid_editing_makh").pqGrid("option", "colModel");
                        colM[1].editable = true;
                        $("#grid_editing_makh").pqGrid("option", "colModel", colM);
                        var _dataRow = {
                            makh: rowData.makh,
                            masothue: "",
                            tenkh: "",
                            makhcha: rowData.makh,
                            loaitien: rowData.loaitien,
                            manhom: rowData.manhom,
                            diachi: "",
                            dienthoai: "",
                            ngaytra: "",
                            ghichu: ""
                        };

                        addRow(rowIndx + 1, 'makh', $grid_pb, _dataRow);
                    }
                }
                if (event.keyCode == Keys.F7) { // copy
                    if (rowSelect != false) {

                        var rowIndx = rowSelect[0].rowIndx;
                        var rowData = rowSelect[0].rowData;
                        //---------------Khai báo các cell khi dùng lệnh copy-----------------------------------------
                        var colM = $("#grid_editing_makh").pqGrid("option", "colModel");
                        colM[1].editable = true;
                        $("#grid_editing_makh").pqGrid("option", "colModel", colM);
                        //--------------------------------------------Thay đổi khi copy---------------------------------
                        var _dataRow = {
                            makh: rowData.makh,
                            masothue: rowData.masothue,
                            tenkh: rowData.tenkh,
                            makhcha: rowData.makhcha,
                            diachi: rowData.diachi,
                            dienthoai: rowData.dienthoai,
                            ngaytra: rowData.ngaytra,
                            loaitien: rowData.loaitien,
                            manhom: rowData.manhom,
                            ghichu: rowData.ghichu
                        };
                        addRow(rowIndx + 1, 'makh', $grid_pb, _dataRow);
                    }
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
                if (event.keyCode == Keys.ESCAPE && $('div').hasClass('jconfirm') == false && rowEditting.length < 1) {
                    change_data_quit_makh();
                }
            } else {
                return false;
            }
        }); // end phím tắt
        function change_data_quit_makh() { // Cảnh báo thoát khi thay đổi dữ liệu////////////////////////////////////////////////////
            var $grid_pb = $("#grid_editing_makh").closest('.pq-grid');//---- Lưới----------------
            var isEditing = rows = $grid_pb.pqGrid("getRowsByClass", {cls: 'pq-row-edit'});
            $isEdit = false;
            if (isEditing.length > 0) {
                $isEdit = true;
            }
            if ($isEdit) {
                if ($('div').hasClass('jconfirm') == false) {
                    $.confirm({
                        title: 'Thông báo',
                        content: ' Dữ liệu đã được thay đổi bạn có muốn lưu không.<br/>Nhấn phím <strong style="color:blue;">[Y]</strong> để đồng ý phím <strong style="color:red;">[N]</strong> để hủy bỏ ',
                        icon: 'fa fa-warning',
                        type: 'red',
                        buttons: {
                            "Đồng ý": {
                                keys: ['Y'], action: function () {
                                    $grid_pb.find(".pq-editor-focus").focus();
                                }
                            },
                            "Hủy bỏ": {
                                keys: ['N'], action: function () {
                                    xoadialog_makh();
                                }
                            }
                        }
                    });
                }
            } else {
                $.confirm({
                    title: 'Thông báo',
                    content: 'Bạn đang chuẩn bị thoát cửa sổ này ? .<br/>Nhấn phím <strong style="color:blue;">[Y]</strong> để đồng ý phím <strong style="color:red;">[N]</strong> để hủy bỏ ',
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
                    $('.dialog_main_httk').load("form/frm_dm_httk_select.php?idstyle=grid_editing_makh");
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
        function addRow(rowIndx, $name='mavt', $grid, $obj_addrow="") {
            //append empty row in the first row.     
            $ma = "";
            if ($obj_addrow != "") {
                $.ajax({
                    url: $dir_module_makh + "taoma.php",
                    async: false,
                    data: {
                        makhcha: $obj_addrow.makhcha
                    },
                    success: function (response) {
                        $ma = response;
                    }
                });
                var rowData = $obj_addrow;
            } else {
                $.ajax({
                    url: $dir_module_makh + "taoma.php",
                    async: false,
                    data: {
                        makhcha: "0"
                    },
                    success: function (response) {
                        $ma = response;
                    }
                });
                var rowData = {
                    makh: "",
                    masothue: "",
                    tenkh: "",
                    makhcha: "0",
                    dienthoai: "",
                    manhom: "1001",
                    diachi: "",
                    ngaytra: "0000-00-00",
                    loaitien: "VND",
                    ghichu: ""
                }; //empty row template
            }
            rowData.makh = $ma;
            if (typeof rowIndx == 'undefined')
                rowIndx = 0;
            $grid.pqGrid("addRow", {rowIndx: rowIndx, rowData: rowData});
            $grid.pqGrid( "addClass", {rowIndx: rowIndx, cls: 'rownotsave'} );
            $grid.pqGrid("setSelection", {rowIndx: rowIndx, dataIndx: $name});
            $grid.pqGrid("editFirstCellInRow", {rowIndx: (rowIndx)});
        }

        //----------------------------Hàm xóa dữ kiệu------------------------------------------
        function deleteRow(rowData, $grid) {
            var rowData = rowData;
            var ma = rowData.makh;
            var sott = rowData.sott;
            if ($('div').hasClass('jconfirm') == false) {
                $.confirm({
                    title: "Chú ý", icon: "fa fa-times-circle", type: "red",
                    content: "Bạn có muốn xóa hàng có mã " + (ma) + "  không ?" + '<br/>Nhấn phím <strong style="color:blue;">[Y]</strong> để đồng ý phím <strong style="color:red;">[N]</strong> để hủy bỏ ',
                    buttons: {
                        "Đồng ý": {
                            keys: ['Y'], action: function () {
                                $.ajax($.extend({}, ajaxObj, {
                                    context: $grid,
                                    url: $dir_module_makh + "del.php",
                                    data: {id: sott, ma: ma},
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

        function capnhat_diachi_hangloat() {
            $.confirm({
                title: 'Xác nhận',
                type: 'orange',
                content: 'Bạn có chắc chắn muốn cập nhật tất cả địa chỉ không? Thời gian cập nhật có thể mất vài phút.',
                buttons: {
                    "Xác nhận": {
                        btnClass: 'btn-green',
                        action: function () {
                            $.confirm({
                                title: 'Thông báo',
                                type: 'green',
                                autoClose: 'OK|1000',
                                content: 'url:' + $dir_module_makh + 'capnhat_diachi_khachhang.php',
                                contentLoaded: function (data, status, xhr) {
                                    this.setContentAppend('Cập nhậtđịa chỉ thành công.');
                                },
                                buttons: {
                                    "OK": {
                                        keys: ['Y'], action: function () {
                                            $("#grid_editing_makh").pqGrid("refreshDataAndView");	
                                        }
                                    }
                                }
                            });
                        }
                    },
                    "Hủy": function () {
                        // Để trống nếu không cần thực hiện hành động khi hủy
                    }
                }
            });
		}

        //---------------------------Cập nhật row-----------------------------------------

        //--------------------------------Khai báo lưới---------------------------------------.
        var obj_makh = {
            hwrap: false,
            vwrap: false,
            resizable: true,
            rowBorders: true,
			freezeCols: 6,
            height: $height - 58,
            width: $width - 20,
            //virtualX: true,
            numberCell: {show: true},
            filterModel: {on: true, mode: "AND", header: true},
            trackModel: {on: true}, //to turn on the track changes.
            scrollModel: {
                autoFit: false
            },
            toolbar: {
                items: [
                    {
                        type: 'button',
                        label: "Xuất Excel",
                        icon: 'ui-icon-document',
                        listeners: [{
                            "click": function (evt) {
                                $("#grid_editing_makh").pqGrid("exportCsv", {url: "export_xuatexcel.php"});
                            }
                        }]
                    },
                    {
                        type: 'button',
                        label: "Cập nhật địa chỉ hàng loạt",
                        icon: 'ui-icon-refresh',
						cls: 'saochep',
                        listeners: [{
                            "click": function (evt) {
                                capnhat_diachi_hangloat();
                            }
                        }]
                    },
                ]
            },
            historyModel: {
                checkEditableAdd: true
            },
            editModel: {
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

                var obj = rowList[0],
                    rowIndx = obj.rowIndx,
                    newRow = obj.newRow,
                    type = obj.type,
                    rowData = obj.rowData;
                var url = "";
                try {
                    var $ma = rowData.manhom;
                } catch (e) {
                    var $ma = "";
                }
                var $ten = "";
                $.ajax({// Load danh sách mã khách hàng
                    url: $dir_module_makh + "gettentheo_table.php",
                    async: false,
                    data: {ma: $ma, table: "manhomkh", columw: "manhom", columget: "tennhom"},
                    success: function (response) {
                        $ten = response;
                    }
                });

                try {
                    rowData.tennhom = $ten;
                } catch (e) {

                }

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
                                rowData.tenkh = $DATA.companyName.toUpperCase();
                                rowData.diachi = $DATA.address;
                                rowData.masothue = $DATA.taxCode.toUpperCase();
                            }
                        }
                    });
                }

                if (type == 'update') {
                    var valid = grid.isValid({rowData: rowData, allowInvalid: true}).valid;
                    if (valid) {
                        if (rowData[recIndx] == null) {
                            url = $dir_module_makh + "add.php";
                        }
                        else {
                            url = $dir_module_makh + "edit.php";
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
                            $grid.pqGrid( "removeClass", {rowIndx: rowIndx, cls: 'rownotsave'} );
                            var colM = $("#grid_editing_makh").pqGrid("option", "colModel");
                            colM[1].editable = false;
                            $("#grid_editing_makh").pqGrid("option", "colModel", colM);
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
                    title: "Mã KH",
                    dataType: "string",
                    dataIndx: "makh",
                    minWidth: 100,
                    sortable: true,
                    editable: false,
                    validations: [
                        {type: 'minLen', value: 2, msg: "Mã khách hàng phải có 2 đến 14 ký tự !"},
                        {type: 'maxLen', value: 14, msg: "Mã khách hàng phải có 2 đến 14 ký tự !"},
                        {
                            type: 'regexp',
                            value: '^[0-9a-zA-Z_.-]{0,14}$',
                            msg: 'Mã không có dấu và không có khoản trắng'
                        },
                        {
                            type: function (ui) {
                                isEdit = isEditCell();
                                if (isEdit) {
                                    var value = ui.value,
                                        _found = false, sott = ui.rowData.sott;
                                    $.ajax({
                                        url: $dir_module_makh + "checkkey.php",
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
                    filter: {
                        type: 'textbox',
                        condition: 'begin',
                        listeners: ['keyup']
                    }
                },
                {
                    title: "Mã số thuế", minWidth: 100, dataType: "string", dataIndx: "masothue",
                    filter: {
                        type: 'textbox',
                        condition: 'begin',
                        listeners: ['keyup']
                    },
                    editor: {
                        type: "textbox",
                        cls: "masothue"
                    }
                },
                {
                    title: "Tên KH", minWidth: 300, dataType: "string", dataIndx: "tenkh",
                    validations: [
                        {type: 'minLen', value: 1, msg: "Tên khách hàng không được trống !"},
                        {type: 'maxLen', value: 500, msg: "Tên khách hàng không được vượt quá 500 ký tự !"}
                    ],
                    filter: {
                        type: 'textbox',
                        condition: 'against',
                        listeners: ['keyup']
                    },
                    editor: {type: "textarea", attr: "rows=3"}
                },
                {
                    title: "Mã TK", minWidth: 100, dataType: "string", dataIndx: "matk", hidden: true,
                    validations: [
                        {type: 'maxLen', value: 6, msg: "Mã tài khoản phải ít hơn 6 số !"},
                        {
                            type: function (ui) {
                                isEdit = isEditCell();
                                $sott = ui.rowData.sott;
                                if (isEdit || typeof $sott != "undefined" || $sott != "") {
                                    var value = ui.value;
                                    sott = ui.rowData.sott;
                                    _found = false;
                                    $.ajax({// Kiểm tra mã tk có trông bản hay không
                                        url: $dir_module_httk + "checkkeytontai.php",
                                        data: {'id': value, 'sott': sott},
                                        async: false,
                                        success: function (response) {
                                            if (response == 1) {
                                                _found = true;
                                            }
                                        }
                                    });

                                    if (_found == false && value != "") {
                                        ui.msg = "Mã TK " + value + " không nằm trong bảng hệ thống tài khoản !";
                                        return false;
                                    }
                                }
                            }
                        }
                    ],
                    editor: {
                        type: 'number'
                    }
                },
                {
                    title: "Mã KH cha", minWidth: 80, dataType: "string", align: "left", dataIndx: "makhcha",
                    validations: [
                        {type: 'minLen', value: 1, msg: "Mã khách hàng cha không được trống !"},
                        {
                            type: function (ui) {

                                isEdit = isEditCell();

                                if (isEdit) {
                                    var value = ui.value,
                                        _found = false, sott = ui.rowData.sott;
                                    $.ajax({
                                        url: $dir_module_makh + "checkkeycha.php",
                                        data: {'id': value, 'sott': sott},
                                        async: false,
                                        success: function (response) {
                                            if (response == 1) {// Nếu là 1 thì không tìm thấy khác hàng trong hệ thống
                                                _found = true;
                                            }
                                        }
                                    });									
                                    if (_found) {
                                        ui.msg = value + " không tồn tại trong hệ thống";
                                        return false;
                                    }
                                }
                            }
                        }
                    ],
					render: function (ui) {
						var rowData = ui.rowData,
							dataIndx = ui.dataIndx;

						rowData.pq_cellcls = rowData.pq_cellcls || {};
						var makhcha = rowData.makhcha, makh = rowData.makh;
						if (makhcha == '0' || makhcha.length == 9) {
                            return makhcha;
						} else {
							if (typeof makh === "undefined"){
									return makhcha;
							}else{
								var vitrichuoi = makh.indexOf("-");
								if (makhcha.slice(0, (vitrichuoi - 1)) != makh.slice(0, (vitrichuoi - 1))) {
									rowData.pq_cellcls[dataIndx] = 'pink';
									return makhcha;
								}
							}
						}
					},
                    filter: {
                        type: 'textbox',
                        condition: 'begin',
                        listeners: ['keyup']
                    }
                },
                {
                    title: "Mã nhóm", minWidth: 150, dataType: "string", align: "left", dataIndx: "manhom",
                    validations: [
                        {type: 'minLen', value: 1, msg: "Mã nhóm không được trống !"},
                    ],
                    editor: {
                        type: "select", options: function (ui) {
                            //remote validation
                            var parsedJson = "";
                            $.ajax({
                                url: $dir_module_manhomkh + "cb_manhom.php",
                                data: {},
                                async: false,
                                success: function (response) {
                                    parsedJson = $.parseJSON(response);
                                }
                            });
                            return parsedJson;
                        }
                    },
                    render: function (ui) {
                        isEdit = false;
                        if ((isEdit && typeof $sott == "undefined") || (isEdit && $sott != "")) {
                            var $ma = ui.rowData.manhom;
                            var $ten = "abc";// Danh sách khách hàng
                            $.ajax({// Load danh sách mã khách hàng
                                url: $dir_module_makh + "gettentheo_table.php",
                                async: false,
                                data: {ma: $ma, table: "manhomkh", columw: "manhom", columget: "tennhom"},
                                success: function (response) {
                                    $ten = response;
                                }
                            });
                            return $ten;
                        } else {
                            var tennhom = ui.rowData.tennhom;
                            return tennhom;
                        }
                    }
                },
                {
                    title: "Địa chỉ", minWidth: 250, dataType: "string", align: "left", dataIndx: "diachi",
                    editor: {type: "textarea", attr: "rows=3"}
                },
                {
                    title: "Số CMND", minWidth: 100, dataType: "string", align: "left", dataIndx: "socmnd",
                    validations: [
                        {
                            type: function (ui) {
                                isEdit = isEditCell();
                                var valuecheck = ui.value;
                                if (isEdit && valuecheck != "") {
                                    var value = ui.value,
                                        _found = false, sott = ui.rowData.sott;
                                    $lengh = value.toString().length;
                                    $.ajax({
                                        url: $dir_module_makh + "checkkey_cmnd.php",
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
                                    if ($lengh != 9 && $lengh != 12) {
                                        ui.msg = "Số CMND có chiều dài 9 hoặc 12 số !";
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
                    },
                    editor: {
                        type: "number"
                    }
                },
                {title: "Điện thoại", minWidth: 100, dataType: "string", align: "left", dataIndx: "dienthoai"},
                {
                    title: "Ngày trả", minWidth: 120, dataType: "string", align: "left", dataIndx: "ngaytra",
                    render: function (ui) {
                        var $yyyy_mm_dd = ui.rowData.ngaytra;
                        return Format_dd_mm_yyyy($yyyy_mm_dd);
                    },
                    editor: {
                        type: 'date'
                    },
                },

                {title: "Tên nhóm", minWidth: 80, dataType: "string", align: "left", hidden: true, dataIndx: "tennhom"},
                {
                    title: "Loại Tiền tệ", minWidth: 80, dataType: "string", align: "center", dataIndx: "loaitien",
                    editor: {
                        type: "select",
                        options: [{"VND": "VIỆT NAM ĐỒNG"}, {"AUD": "ÚC -DOLLAR"}, {"CAD": "CANADA - DOLLAR"}, {"EUR": "EURO"}, {"GBP": "ANH - BẢNG"}, {"JPY": "NHẬT - YÊN"}, {"KRW": "HÀN QUỐC - WON	"}, {"SGD": "SINGAPORE - DOLLAR"}, {"USD": "MỸ - DOLLAR"}]
                    },
                    render: function (ui) {
                        var $value = ui.rowData.loaitien;
                        if ($value == "VND") {
                            return "VIỆT NAM ĐỒNG";
                        } else if ($value == "AUD") {
                            return "ÚC - DOLLAR";
                        } else if ($value == "CAD") {
                            return "CANADA - DOLLAR";
                        } else if ($value == "EUR") {
                            return "EURO";
                        } else if ($value == "GBP") {
                            return "ANH - BẢNG";
                        } else if ($value == "JPY") {
                            return "NHẬT - YÊN";
                        } else if ($value == "KRW") {
                            return "HÀN QUỐC - WON";
                        } else if ($value == "SGD") {
                            return "SINGAPORE DOLLAR";
                        } else if ($value == "USD") {
                            return "MỸ - DOLLAR";
                        }
                    }
                },
                {
                    title: "Chú thích", minWidth: 150, dataType: "string", align: "left", dataIndx: "ghichu",
                    editor: {type: "textarea", attr: "rows=3"}
                }
            ],//-----------------------------------------Kết thúc các cột--------------------------------------
            pageModel: {type: "local", rPP: 200, strRpp: "{0}", strDisplay: "{0} đến {1} của {2}"},
            dataModel: {
                dataType: "JSON",
                location: "remote",
                recIndx: "sott",
                url: $dir_module_makh + "list.php",//-- Load danh sách lên lưới
                getData: function (dataJSON) {
                    var data = dataJSON.data;
                    return {curPage: dataJSON.curPage, totalRecords: dataJSON.totalRecords, data: data};
                }
            }
        };
        var $grid = $("#grid_editing_makh").pqGrid(obj_makh);

        //use refresh & refreshRow events to display jQueryUI buttons and bind events.
        $grid.one("pqgridload", function (evt, ui) {
             $("#grid_editing_makh .pq-search-hd-field[name='tenkh']").focus();
        });

        function getRowSelect() { // --------------------Lấy dữ liệu theo dòng trên gird----------------------
            var arr = $("#grid_editing_makh").pqGrid("selection", {
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
            isEdit = $("#grid_editing_makh").pqGrid("isEditableRow", {rowIndx: 3});

            return isEdit;
        }

        //-----------------------------Hết lưới---------------------------------------------------------------------

    });
</script>
<div id="dialog-makhachhang" title="Thông tin khách hàng (F4: Thêm mới  , F7: Sao chép , F8: Xóa )"><!-- dialog -->
    <div id="grid_editing_makh" style="margin:5px auto;border: 0px !important;"></div>
</div>