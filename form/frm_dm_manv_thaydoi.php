<?php
$thang = $_GET['thang'];
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
            if (event.keyCode == Keys.F8) { // Xóa
                if (rowSelect != false) {
                    if (isEditing($grid_pb)) {
                        return false;
                    }
                    var rowData = rowSelect[0].rowData;
                    deleteRow(rowData, $grid_pb);
                }
            }
            if (event.keyCode == Keys.INSERT) { // Xóa
                var cmnd = prompt("Nhập vào số CMND (dùng (;) hoặc (,) để thêm nhiều nhân viên)", "");
                if (cmnd != null && cmnd!="") {
                    $.confirm({
                        title: 'Thông báo',
                        type: 'green',
                        autoClose: 'OK|1000',
                        content: function () {
                            var self = this;
                            return $.ajax({
                                url: $dir_module_manv + "them_nhanvien_vaobangluong.php?thang=<?php echo $thang ?>&socmnd="+cmnd,
                                async: false
                            }).done(function (response) {
                                self.setContent( response);
                                $("#grid_editing_manhanvien").pqGrid("refreshDataAndView");
                            })
                        },
                        buttons: {
                            "OK": {
                                keys: ['Y'], action: function () {

                                }
                            }
                        }
                    });
                }
            }

            var rowEditting = $("#grid_editing_manhanvien").pqGrid("getRowsByClass", {cls: 'pq-row-edit'});//---Lấy đối tượng đang sửa
            if ($('div').hasClass('jconfirm') == false) {

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
                            $.confirm({
                                title: 'Tạo bút toán tự động thành công ',
                                type: 'green',
                                autoClose: 'OK|1000',
                                content: function () {
                                    var self = this;
                                    return $.ajax({
                                        url: $dir_module_manv + "taobuttoan_tudongbangluong.php",
                                        async: false,
                                        data: {txttinhluongtheo:'<?php echo $thang ?>'},
                                    });
                                },
                                buttons: {
                                    "OK": {
                                        keys: ['Y'], action: function () {
                                            xoadialog_manhanvien();
                                        }
                                    }
                                }
                            });
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

            $grid.pqGrid("setSelection", {rowIndx: rowIndx, dataIndx: $name});
            $grid.pqGrid("editFirstCellInRow", {rowIndx: (rowIndx)});
        }

        //----------------------------Hàm xóa dữ kiệu------------------------------------------
        function deleteRow(rowData, $grid) {
            var rowData = rowData;
            var ma = rowData.manv;
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
                                    url: $dir_module_manv + "del_bangluong.php",
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
                allowInvalid: false,
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
                            url = $dir_module_manv + "edit_bangluong.php";
                        }
                        else {
                            url = $dir_module_manv + "edit_bangluong.php";
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
                    title: "Số CMND", minWidth: 100, dataType: "string", align: "left", dataIndx: "socmnd",editable: false,
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
                    title: "Tên NV", minWidth: 200, dataType: "string", dataIndx: "tennv",editable: false,
                    validations: [
                        {type: 'minLen', value: 1, msg: "Tên nhân viên không được trống !"}
                    ],
                    filter: {
                        type: 'textbox',
                        condition: 'begin',
                        listeners: ['keyup']
                    }
                },
                { title: "Chức danh", width: 100, dataType: "string", align: "left", dataIndx: "chucvu",editable: false,
                    validations: [
                        { type: 'minLen', value: 1, msg: "Mã nhân viên phải có 9 -12 số !" }
                    ]
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
                    editor: {
                        type: "number"
                    },
                    render: function (ui) {
                        var $value = ui.rowData.tienangiuaca;
                        return $.number($value,0,".",",");
                    }
                },
                {
                    title: "Phụ cấp Ko đóng BHXH", minWidth: 100, dataType: "integer", align: "right", dataIndx: "phucapkhongdungbhxh",
                    editor: {
                        type: "number"
                    },
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
                    title: "Phụ cấp CV", minWidth: 100, dataType: "integer", align: "right", dataIndx: "phucapchucvu", hidden:false,
                    editor: {
                        type: "number"
                    },
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
                    title: "Mã TK-CP 1", minWidth: 100, dataType: "string", dataIndx: "matk1", editable: true,
                    editor: {type: "select",options: function (ui) {
                        //remote validation
                        var parsedJson = "" ;
                        $.ajax({// Load danh sách mã khách hàng
                            url: $dir_module_httk + "cb_manhomhttk.php",
                            async: false,
                            data:{ma:'154,622,627,641,642,421,411'},
                            success: function (response) {
                                parsedJson = $.parseJSON(response);
                            }
                        });
                        return parsedJson;
                    }},
                },

                {
                    title: "Tỷ lệ TK-CP", minWidth: 60, dataType: "float", align: "right", dataIndx: "phantramtk",
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
                            data:{ma:'154,622,627,641,642,421,411'},
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
                }
            ],//-----------------------------------------Kết thúc các cột---------------------------------------
            pageModel: { type: "local", rPP: 200, strRpp: "{0}", strDisplay: "{0} đến {1} của {2}" },
            dataModel: {
                dataType: "JSON",
                location: "remote",
                recIndx: "sott",
                url: $dir_module_manv + "list_bangluong.php",//-- Load danh sách lên lưới
                postData: {thang:'<?php echo $thang; ?>'},
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

        function tongtienluongthang($thang){
            var $data;
            $.ajax({// Kiểm tra xem STT có tồn tại hay không
                url: $dir_module_manv + "tongtienluongthang.php?thang="+$thang,
                async: false,
                success: function (response) {
                    $data = $.parseJSON(response);

                }
            });
            return $data;
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
     title="THAY DỔI BẢNG LƯƠNG NHÂN VIÊN (INSERT : THÊM, ENTER : Sửa,Lưu)"><!-- dialog -->
    <div id="grid_editing_manhanvien" style="margin:5px auto;border: 0px !important;"></div>
</div>