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
	tr.green td { background: lightgreen;}
	tr td.green{ background:lightgreen; color:Red;font-weight:bold;}

</style>
<script>
    $height = getHeight();
    $width = getWidth() - 50;
    $(function () {
        $dir_module_manv = "modules/manhanvien/";//--------------------------------------------Thay đổi khi copy
        $dir_module_mabp = "modules/mabp/";//--------------------------------------------Thay đổi khi copy
        $dir_module_manhom = "modules/manhomvattu/";//--------------------------------------------Thay đổi khi copy
        $dir_module_makh = "modules/makhachhang/";//--------------------------------------------Thay đổi khi copy
        $dir_module_httk = "modules/httk/";//--------------------------------------------Thay đổi khi copy
        function xoadialog_manhanvien() { // ----------------------đóng form
            reset_dialog(".dialog-manhanvien");
            reset_dialog(".dialog_main_manhanvien");
        }

        $("#dialog-manhanvien").dialog({ // ------------------Gọi dialog
            resizable: false,
            height: $height,
            width: $width,
            modal: true

        });
        $("#dialog-manhanvien").keydown(function (event) {//--------------Các phím tắt
            var $grid_pb = $("#grid_editing_manhanvien").closest('.pq-grid');//---- Lưới----------------
            if (event.keyCode == Keys.F7 || event.keyCode == Keys.F8) {
                var rowSelect = getRowSelect();//------ Lấy đối tượng được chọn
                if (rowSelect == false) {
                    alert_f("Chú Ý", "fa fa-warning", "red", "Bạn cần chọn dữ liệu trước khi thực hiện !");
                }
            }
            var rowEditting = $("#grid_editing_manhanvien").pqGrid("getRowsByClass", {cls: 'pq-row-edit'});//---Lấy đối tượng đang sửa
            if ($('div').hasClass('jconfirm') == false) {
                if (event.keyCode == Keys.F4) {
                    rowIndx = 0;
                    addRow(rowIndx, 'manhanvien', $grid_pb);
                }
                if (event.keyCode == Keys.F7) { // copy

                    var rowIndx = rowSelect[0].rowIndx;
                    var rowData = rowSelect[0].rowData;
                    //---------------Khai báo các cell khi dùng lệnh copy-----------------------------------------
                    //--------------------------------------------Thay đổi khi copy---------------------------------
                    var _dataRow = {
                        manhanvien: rowData.manhanvien,
                        tennv: rowData.tennv,
                        socmnd: rowData.socmnd,
                        gioitinh: rowData.gioitinh,
                        diachi: rowData.diachi,
                        dienthoai: rowData.dienthoai,
                        chucdanh: rowData.chucdanh,
                        trinhdo: rowData.trinhdo,
                        luongcb: rowData.luongcb,
                        namsinh: rowData.namsinh,
                        tinhluong: "CB",
                        phantramthang: rowData.phantramthang,
                        phantramquy: rowData.phantramquy,
                        phantramnam: rowData.phantramnam,
                        ghichu: rowData.ghichu
                    };
                    addRow(rowIndx, 'manhanvien', $grid_pb, _dataRow);
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
                            xoadialog_manhanvien();
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
        function addRow(rowIndx, $name='manhanvien', $grid, $obj_addrow="") {
            $ma="";
            $.ajax({
                url: $dir_module_manv+"taoma.php",
                async: false,
                success: function (response) {
                    $ma = response;
                }
            });
            if ($obj_addrow != "") {
                var rowData = $obj_addrow;
            } else {
                var rowData = {
                    manhanvien: "",
                    tennv: "",
                    mabp: "",
                    socmnd: "",
                    gioitinh: "",
                    diachi: "",
                    dienthoai: "",
                    luongcb: "",
                    namsinh: "",
                    tinhluong: "CB",
                    phantramthang: "0",
                    phantramquy: "0",
                    phantramnam: "0",
                    ghichu: ""
                };
            }
            rowData.manhanvien = $ma;
            if(typeof rowIndx == 'undefined')
                rowIndx=0;
            $grid.pqGrid("addRow", {rowIndx: rowIndx, rowData: rowData});
			$grid.pqGrid( "addClass", {rowIndx: rowIndx, cls: 'rownotsave'} );
            $grid.pqGrid("setSelection", {rowIndx: rowIndx, dataIndx: $name});
            $grid.pqGrid("editFirstCellInRow", {rowIndx: (rowIndx)});
        }

        //----------------------------Hàm xóa dữ kiệu------------------------------------------
        function deleteRow(rowData, $grid) {
            var rowData = rowData;
            var ma = rowData.manhanvien;
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
                                    url: $dir_module_manv + "del.php",
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

        //--------------------------------Khai báo lưới---------------------------------------.
        var objmanv = {
            hwrap: true,
            vwrap: false,
            //resizable: true,
            rowBorders: true,
            height: $height - 59,
            width: $width - 12,
            //virtualX: true,
            freezeCols:5,
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
                                $("#grid_editing_manhanvien").pqGrid("exportCsv", {url: "export_xuatexcel.php"});
                            }
                        }]
                    }
                ]
            },
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
                var obj = rowList[0],
                    rowIndx = obj.rowIndx,
                    newRow = obj.newRow,
                    type = obj.type,
                    rowData = obj.rowData;

                var url = "";
                try{
                    var $ma = rowData.mabp;
                }catch (e){
                    var $ma = "";
                }
                var $ten="";


                $.ajax({// Load danh sách mã khách hàng
                    url: $dir_module_makh + "gettentheo_table.php",
                    async: false,
                    data:{ma:$ma,table:"mabp",columw:"mabp",columget:"tenbp"},
                    success: function (response) {
                        $ten = response;
                    }
                });

                try{
                    rowData.tenbp = $ten;
                }catch (e){

                }

                if (type == 'update') {
                    var valid = grid.isValid({rowData: rowData, allowInvalid: true}).valid;
                    if (valid) {
                        if (rowData[recIndx] == null) {
                            url = $dir_module_manv + "add.php";
                        }
                        else {
                            url = $dir_module_manv + "edit.php";
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
                        },
                    });
                }
            },
            colModel: [//-------------------------------------------Khai báo các cột trong lưới-----------------------
                { title: "Lưu", dataType: "integer", dataIndx: "sott", editable: false, width: 0, hidden:false,align: "center",
                    render: function (ui) {
                        var $val  = ui.rowData.sott;
                        if($val==0 || $val=="" || typeof $val == 'undefined'){
                            return "<img src='icon/uncheck.png' width='20px'/>";
                        } else {
                            return "<img src='icon/check.png' width='20px' />";
                        }
                    },},
                {
                    title: "Mã NV",
                    dataType: "string",
                    dataIndx: "manhanvien",
                    minWidth: 80,
                    sortable: true,
                    editable: true,
                    hidden: true,
                    filter: {
                        type: 'textbox',
                        condition: 'begin',
                        listeners: ['keyup']
                    }
                },
                {
                    title: "Số CMND", minWidth: 100, dataType: "string", align: "left", dataIndx: "socmnd",
                    validations: [
                        { type: function (ui) {
                            isEdit = isEditCell();
                            if(isEdit){
                                var value = ui.value,
                                    _found = false,sott = ui.rowData.sott;
                                $lengh = value.toString().length;
                                $.ajax({
                                    url: $dir_module_manv+"checkkey.php",
                                    data: { 'id': value,'sott':sott },
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
                                if ($lengh!=9 && $lengh!=12) {
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
                {
                    title: "Mã số thuế", minWidth: 150, dataType: "string", dataIndx: "masothue",
                    validations: [
                        {type: 'maxLen', value: 10, msg: "Mã số thuế không được quá 10 số !"}
                    ],
                    filter: {
                        type: 'textbox',
                        condition: 'begin',
                        listeners: ['keyup']
                    }
                },
                {
                    title: "Tên NV", minWidth: 200, dataType: "string", dataIndx: "tennv",
                    validations: [
                        {type: 'minLen', value: 1, msg: "Tên nhân viên không được trống !"}
                    ],
                    filter: {
                        type: 'textbox',
                        condition: 'begin',
                        listeners: ['keyup']
                    }
                },
                {
                    title: "Loại BP", minWidth: 100, dataType: "string", dataIndx: "loaibp", editable: true,
                    editor: {type: "select",options: function (ui) {
                        //remote validation
                         var parsedJson = [{'':'Không có SP/CT'},{'CT':'Công trình'},{'SP':'Sản phẩm'},{'HD':'Hợp đồng'}] ;
                        return parsedJson;
                    }},
                },
                {
                    title: "Bộ phận", minWidth: 150, dataType: "string", align: "left", dataIndx: "mabp",
                    validations: [
                        {type: 'minLen', value: 1, msg: "Mã bộ phận không được trống !"},
                    ],
                    editor: {
                        type: "select", options: function (ui) {
                            //remote validation
                            var parsedJson = "";
                            $.ajax({
                                url: $dir_module_mabp + "cb_manhom.php",
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
                        if(isEdit) {
                            var $ma = ui.rowData.mabp;
                            var $ten = "abc";// Danh sách khách hàng
                            $.ajax({// Load danh sách mã khách hàng
                                url: $dir_module_makh + "gettentheo_table.php",
                                async: false,
                                data:{ma:$ma,table:"mabp",columw:"mabp",columget:"tenbp"},
                                success: function (response) {
                                    $ten = response;
                                }
                            });
                            return $ten;
                        }else {
                            var tennhom = ui.rowData.tenbp;
                            return tennhom;
                        }
                    }
                },
                {title: "Tên nhóm", minWidth: 80, dataType: "string", align: "left", hidden: true, dataIndx: "tenbp"},
                { title: "Trình độ", width: 100, dataType: "string", align: "left", dataIndx: "trinhdo",
                    editor: {type: "select", options: [{"1": "Đại Học"}, {"2": "Cao Đẳng"}, {"3": "Trung cấp"}, {"4": "Phổ Thông"}, {"5": "Khác"}]},
                    validations: [
                        { type: 'minLen', value: 1, msg: "Mã nhóm không được trống !" }
                    ],
                    render: function (ui) {
                        var $value = ui.rowData.trinhdo;
                        if ($value == "1") {
                            return "Đại Học";
                        }else if ($value == "2"){
                            return "Cao Đẳng";
                        }else if ($value == "3"){
                            return "Trung cấp";
                        }else if ($value == "4"){
                            return "Phổ Thông";
                        }else if ($value == "5"){
                            return "Khác";
                        }
                    }
                },
                { title: "Chức danh", width: 100, dataType: "string", align: "left", dataIndx: "chucdanh",
                    validations: [
                        { type: 'minLen', value: 1, msg: "Mã nhân viên phải có 9 -12 số !" }
                    ]
                },

                {
                    title: "Giới tính", minWidth: 70, dataType: "string", align: "center", dataIndx: "gioitinh",
                    editor: {type: "select", options: [{"1": "Nam"}, {"0": "Nữ"}]},
                    render: function (ui) {
                        var $value = ui.rowData.gioitinh;
                        if ($value == 0) {
                            return "Nữ";
                        } else {
                            return "Nam";
                        }
                    }
                },
                {title: "Địa chỉ", minWidth: 250, dataType: "string", align: "left", dataIndx: "diachi"},
                {
                    title: "Điện thoại", minWidth: 120, dataType: "string", align: "left", dataIndx: "dienthoai",
                    editor: {
                        type: "number"
                    }
                },
                {
                    title: "Lương CB", minWidth: 100, dataType: "string", align: "right", dataIndx: "luongcb",
                    editor: {
                        type: "number"
                    },
                    validations: [
                        {type: 'maxLen', value: 10, msg: "Lương cơ bản phải nhỏ hơn 10 số !"}
                    ],
                    render: function (ui) {
                        var $value = ui.rowData.luongcb;
                        return $.number($value,0,".",",");
                    }
                },
                {
                    title: "Tiền ăn giữa ca", minWidth: 100, dataType: "integer", align: "right", dataIndx: "tienangiuaca",
                    render: function (ui) {
                        var $value = ui.rowData.tienangiuaca;
                        return $.number($value,0,".",",");
                    }
                },
                {
                    title: "Phụ cấp Ko đóng BHXH", minWidth: 100, dataType: "integer", align: "right", dataIndx: "phucapkhongdungbhxh",
                    render: function (ui) {
                        var $value = ui.rowData.phucapkhongdungbhxh;
                        return $.number($value,0,".",",");
                    }
                },
				{
                    title: "TỔNG NHẬN", minWidth: 100, dataType: "integer", align: "right", dataIndx: "tongnhan",editable: false,cls:"green",
                    render: function (ui) {
                        var $value = parseInt(ui.rowData.luongcb)+parseInt(ui.rowData.tienangiuaca)+parseInt(ui.rowData.phucapkhongdungbhxh);
                        return $.number($value,0,".",",");
                    }
                },
                {
                    title: "Phụ cấp CV", minWidth: 100, dataType: "integer", align: "right", dataIndx: "phucapchucvu",
                    render: function (ui) {
                        var $value = ui.rowData.phucapchucvu;
                        return $.number($value,0,".",",");
                    }
                },
				{
                    title: "Phí CĐ (1%)", minWidth: 100, dataType: "integer", align: "right", dataIndx: "phicongdoan",
                    render: function (ui) {
                        var $value = ui.rowData.phicongdoan;
                        return $.number($value,0,".",",");
                    }
                },
                {
                    title: "BHXH (8%)", minWidth: 100, dataType: "integer", align: "right", dataIndx: "baohiem",
                    render: function (ui) {
                        var $value = ui.rowData.baohiem;
                        return $.number($value,0,".",",");
                    }
                },
				{
                    title: "BHYT (1.5%)", minWidth: 100, dataType: "integer", align: "right", dataIndx: "baohiemyt",
                    render: function (ui) {
                        var $value = ui.rowData.baohiemyt;
                        return $.number($value,0,".",",");
                    }
                },
				{
                    title: "BHTN (1%)", minWidth: 100, dataType: "integer", align: "right", dataIndx: "baohiemtn",
                    render: function (ui) {
                        var $value = ui.rowData.baohiemtn;
                        return $.number($value,0,".",",");
                    }
                },
				{
                    title: "TỔNG BHXH NV", minWidth: 100, dataType: "integer", align: "right", dataIndx: "tongnhan",editable: false,cls:"green",
                    render: function (ui) {
                        var $value = parseInt(ui.rowData.phicongdoan)+parseInt(ui.rowData.baohiem)+parseInt(ui.rowData.baohiemyt)+parseInt(ui.rowData.baohiemtn);
                        return $.number($value,0,".",",");
                    }
                },
                {
                    title: "Thuế thu nhập", minWidth: 100, dataType: "integer", align: "right", dataIndx: "thuethunhap",
                    render: function (ui) {
                        var $value = ui.rowData.thuethunhap;
                        return $.number($value,0,".",",");
                    }
                },
				{
                    title: "DN trích KPCĐ (2%)", minWidth: 100, dataType: "integer", align: "right", dataIndx: "kinhphicongdoan",
                    render: function (ui) {
                        var $value = ui.rowData.kinhphicongdoan;
                        return $.number($value,0,".",",");
                    }
                },
                {
                    title: "DN trích BHXH (17.5%)", minWidth: 100, dataType: "integer", align: "right", dataIndx: "dn_baohiem",
                    render: function (ui) {
                        var $value = ui.rowData.dn_baohiem;
                        return $.number($value,0,".",",");
                    }
                },
				{
                    title: "DN trích BHYT (3%)", minWidth: 100, dataType: "integer", align: "right", dataIndx: "dn_baohiemyt",
                    render: function (ui) {
                        var $value = ui.rowData.dn_baohiemyt;
                        return $.number($value,0,".",",");
                    }
                },
				{
                    title: "DN trích BHTN (1%)", minWidth: 100, dataType: "integer", align: "right", dataIndx: "dn_baohiemtn",
                    render: function (ui) {
                        var $value = ui.rowData.dn_baohiemtn;
                        return $.number($value,0,".",",");
                    }
                },
				{
                    title: "TỔNG BHXH DN", minWidth: 100, dataType: "integer", align: "right", dataIndx: "tongnhan",editable: false,cls:"green",
                    render: function (ui) {
                        var $value = parseInt(ui.rowData.kinhphicongdoan)+parseInt(ui.rowData.dn_baohiem)+parseInt(ui.rowData.dn_baohiemyt)+parseInt(ui.rowData.dn_baohiemtn);
                        return $.number($value,0,".",",");
                    }
                },
                {
                    title: "Năm sinh", minWidth: 150, dataType: "string", align: "right", dataIndx: "namsinh",
                    render: function (ui) {
                        var $yyyy_mm_dd = ui.rowData.namsinh;
                        return Format_dd_mm_yyyy($yyyy_mm_dd);
                    },
                    editor: {
                        type: 'date'
                    },
                },
                {
                    title: "Mã TK-CP 1", minWidth: 100, dataType: "string", dataIndx: "matk1", editable: true,
                    validations: [
                        {type: 'minLen', value: 1, msg: "Mã TK không được trống !"}
                    ],
                    editor: {type: "select",options: function (ui) {
                        //remote validation
                        var parsedJson = "" ;
                        $.ajax({// Load danh sách mã khách hàng
                            url: $dir_module_httk + "cb_manhomhttk.php",
                            async: false,
                            data:{ma:'622,627,641,642,421,411'},
                            success: function (response) {
                                parsedJson = $.parseJSON(response);
                            }
                        });
                        return parsedJson;
                    }},
                },
                {
                    title: "Tỷ lệ TK-CP", minWidth: 60, dataType: "string", align: "right", dataIndx: "phantramtk",
                    editor: {
                        type: "number"
                    },
                    validations: [
                        { type: 'minLen', value: 2, msg: "Tỷ lệ TK Chi phí không được nhỏ hơn 10%  !" }
                    ],
                    render: function (ui) {
                        var $value = ui.rowData.phantramtk;
                        return $value+"%";
                    }
                },
                {
                    title: "Mã TK-CP 2", minWidth: 100, dataType: "string", dataIndx: "matk2", editable: true,
                    editor: {type: "select",options: function (ui) {
                        //remote validation
                        var parsedJson = "" ;
                        $.ajax({// Load danh sách mã khách hàng
                            url: $dir_module_httk + "cb_manhomhttk.php",
                            async: false,
                            data:{ma:'622,627,641,642,421,411'},
                            success: function (response) {
                                parsedJson = $.parseJSON(response);
                            }
                        });
                        return parsedJson;
                    }},
                },
                {
                    title: "% tháng", minWidth: 60, dataType: "float", align: "right", dataIndx: "phantramthang",hidden:true,
                    render: function (ui) {
                        var $value = ui.rowData.phantramthang;
                        return $value+"%";
                    }
                },
                {
                    title: "% quý", minWidth: 60, dataType: "float", align: "right", dataIndx: "phantramquy",hidden:true,
                    render: function (ui) {
                        var $value = ui.rowData.phantramquy;
                        return $value+"%";
                    }
                },
                {
                    title: "% năm", minWidth: 60, dataType: "float", align: "right", dataIndx: "phantramnam",hidden:true,
                    render: function (ui) {
                        var $value = ui.rowData.phantramnam;
                        return $value+"%";
                    }
                },
                {
                    title: "Ngày BĐ hợp đồng", minWidth: 150, dataType: "string", align: "right", dataIndx: "ngaybdhopdong",hidden:true,
                    render: function (ui) {
                        var $yyyy_mm_dd = ui.rowData.ngaybdhopdong;
                        return Format_dd_mm_yyyy($yyyy_mm_dd);
                    },
                    editor: {
                        type: 'date'
                    },
                },
                {
                    title: "Ngày KT hợp đồng", minWidth: 150, dataType: "string", align: "right", dataIndx: "ngaykthopdong",hidden:true,
                    render: function (ui) {
                        var $yyyy_mm_dd = ui.rowData.ngaykthopdong;
                        return Format_dd_mm_yyyy($yyyy_mm_dd);
                    },
                    editor: {
                        type: 'date'
                    },
                },
                {
                    title: "Chú thích", minWidth: 200, dataType: "string", align: "left", dataIndx: "ghichu",
                    editor: {type: "textarea", attr: "rows=3"}
                },
                {
                    title: "Tổng giảm trừ gia cảnh", minWidth: 120, dataType: "integer", align: "right", dataIndx: "giamtrugiacanh",
                    render: function (ui) {
                        var $value = ui.rowData.giamtrugiacanh;
                        return $.number($value,0,".",",");
                    }
                },
                { title: "Tính Lương", width: 100, dataType: "string", align: "left", dataIndx: "tinhluong",
                    editor: {type: "select", options: [{"CB": "Theo lương CB"}, {"SP": "Theo lương SP"}]},
                    validations: [
                        { type: 'minLen', value: 1, msg: "Mã nhóm không được trống !" }
                    ],
                    render: function (ui) {
                        var $value = ui.rowData.tinhluong;
                        if ($value == "CB") {
                            return "Theo lương CB";
                        } else if ($value == "SP") {
                            return "Theo lương SP";
                        }
                    }
                },
                {
                    title: "Sắp xếp", minWidth: 50, dataType: "integer", align: "center", dataIndx: "sapxep",
                    editor: {
                        type: "number"
                    }
                },
            ],//-----------------------------------------Kết thúc các cột---------------------------------------
            pageModel: { type: "local", rPP: 200, strRpp: "{0}", strDisplay: "{0} đến {1} của {2}" },
            dataModel: {
                dataType: "JSON",
                location: "remote",
                recIndx: "sott",
                url: $dir_module_manv + "list.php",//-- Load danh sách lên lưới
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
		var totalData;
        function calculateSummary() {
            var
					$luongcb= 0,
					$phucapchucvu =0,
					$phicongdoan = 0,
					$baohiem = 0,
					$baohiemyt = 0,
					$baohiemtn = 0,
					$kinhphicongdoan = 0,
					$dn_baohiem = 0,
					$dn_baohiemyt = 0,
					$dn_baohiemtn = 0,
					$tienangiuaca = 0,
					$phucapkhongdungbhxh = 0,
					$thuethunhap = 0,
					$giamtrugiacanh = 0,
                data = $("#grid_editing_manhanvien").pqGrid('option', 'dataModel.data');
            try {
                data.forEach(row => {					
					$luongcb+= parseFloat(row['luongcb']);
					$phucapchucvu+= parseFloat(row['phucapchucvu']);
					
					$phicongdoan += parseFloat(row['phicongdoan']);
					$baohiem += parseFloat(row['baohiem']);
					$baohiemyt += parseFloat(row['baohiemyt']);
					$baohiemtn += parseFloat(row['baohiemtn']);
					
					$kinhphicongdoan += parseFloat(row['kinhphicongdoan']);
					$dn_baohiem += parseFloat(row['dn_baohiem']);
					$dn_baohiemyt += parseFloat(row['dn_baohiemyt']);
					$dn_baohiemtn += parseFloat(row['dn_baohiemtn']);
					
					$tienangiuaca += parseFloat(row['tienangiuaca']);					
					$phucapkhongdungbhxh += parseFloat(row['phucapkhongdungbhxh']);
					$thuethunhap += parseFloat(row['thuethunhap']);
					$giamtrugiacanh += parseFloat(row['giamtrugiacanh']);
            })
            }catch (e) {

            }
            totalData = { tennv: "<b>TỔNG CỘNG</b>",luongcb: $luongcb, phucapchucvu: $phucapchucvu,baohiem:$baohiem,tienangiuaca:$tienangiuaca,phucapkhongdungbhxh:$phucapkhongdungbhxh,thuethunhap:$thuethunhap,phicongdoan:$phicongdoan,baohiemyt:$baohiemyt,baohiemtn:$baohiemtn,kinhphicongdoan:$kinhphicongdoan,dn_baohiem:$dn_baohiem,dn_baohiemyt:$dn_baohiemyt,dn_baohiemtn:$dn_baohiemtn,giamtrugiacanh:$giamtrugiacanh,phantramtk:0, pq_rowcls: 'green'};
        }

        var $summary = "";

        objmanv.render = function (evt, ui) {
            $summary = $("<div class='pq-grid-summary'  ></div>")
                .prependTo($(".pq-grid-bottom", this));
            calculateSummary();
        }

        objmanv.cellSave = function (evt, ui) {
            objmanv.refresh.call(this);
        }
        objmanv.refresh = function (evt, ui) {
            calculateSummary();
            var data = [totalData]; //2 dimensional array
            var objmanv = { data: data, $cont: $summary }
            $(this).pqGrid("createTable", objmanv);
        }
        var $grid = $("#grid_editing_manhanvien").pqGrid(objmanv);

        //use refresh & refreshRow events to display jQueryUI buttons and bind events.
        function getRowSelect() { // --------------------Lấy dữ liệu theo dòng trên gird----------------------
            var arr = $("#grid_editing_manhanvien").pqGrid("selection", {
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
            isEdit = $("#grid_editing_manhanvien").pqGrid("isDirty"); //Lấy giá trị đang chọn

            return isEdit;
        }

        //-----------------------------Hết lưới---------------------------------------------------------------------
        setTimeout(function () {
            $("#grid_editing_manhanvien .pq-search-hd-field").focus();
        }, 100);
    });
</script>
<div id="dialog-manhanvien"
     title="DANH SÁCH NHÂN VIÊN (ENTER : Sửa,Lưu ,F4 : Thêm mới, F7: Sao chép , F8: Xóa)"><!-- dialog -->
    <div id="grid_editing_manhanvien" style="margin:5px auto;border: 0px !important;"></div>
</div>