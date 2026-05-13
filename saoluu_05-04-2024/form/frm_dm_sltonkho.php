<?php
session_start();
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

    tr td.mauhong {
        background-color:rgba(143,230,74,0.53);
    }
    tr.green td { background: lightgreen;}

</style>
<script>
    $height_sltondk = 0;
    $height_sltondk = 0;
    $height_sltondk = getHeight();
    $width_sltondk = getWidth();
    $(function () {
        var $dir_module_sltonkho = "";
        $dir_module_sltonkho = "modules/soluongtonkho/";//--------------------------------------------Thay đổi khi copy
        function xoadialog_sltonkho() { // ----------------------đóng form
            reset_dialog(".dialog-soluongtonkho");
            reset_dialog(".dialog_main_sltonkho");
        }

        $("#dialog-soluongtonkho").dialog({ // ------------------Gọi dialog
            resizable: false,
            height: $height_sltondk,
            width: $width_sltondk,
            modal: true

        });
        $("#dialog-soluongtonkho").keydown(function (event) {//--------------Các phím tắt
            var $grid_pb = $("#grid_editing_sltonkho").closest('.pq-grid');//---- Lưới----------------
            if (event.keyCode == Keys.F7 || event.keyCode == Keys.F8) {
                var rowSelect = getRowSelect();//------ Lấy đối tượng được chọn
                if (rowSelect == false) {
                    alert_f("Chú Ý", "fa fa-warning", "red", "Bạn cần chọn dữ liệu trước khi thực hiện !");
                }
            }
            if (event.keyCode == Keys.F4) {
                $('.dialog_main_sltonkho_themvao').load('form/frm_dm_sltonkho_themvao.php');
            }
            if (event.keyCode == Keys.F8) { // Xóa
                if (rowSelect != false){
                    if (isEditing($grid_pb)) {
                        return false;
                    }
                    var rowData = rowSelect[0].rowData;
                    deleteRow(rowData, $grid_pb);
                }
            }
            var rowEditting = $("#grid_editing_sltonkho").pqGrid("getRowsByClass", {cls: 'pq-row-edit'});//---Lấy đối tượng đang sửa
            if ($('div').hasClass('jconfirm') == false) {

                if (event.keyCode == Keys.ESCAPE && $('div').hasClass('jconfirm') == false && rowEditting.length < 1) {
                    change_data_quit_sltonkho();
                }
            } else {
                return false;
            }
        }); // end phím tắt

        function change_data_quit_sltonkho() { // Cảnh báo thoát khi thay đổi dữ liệu////////////////////////////////////////////////////
            var $grid_pb = $("#grid_editing_sltonkho").closest('.pq-grid');//---- Lưới----------------
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
                                    xoadialog_sltonkho();
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
                                xoadialog_sltonkho();
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
        var matk_select = function (ui) {
            var $cell = ui.$cell,
                rowData = ui.rowData,
                dataIndx = ui.dataIndx,
                cls = ui.cls, width = ui.column.minWidth,
                dc = $.trim(rowData[dataIndx]);
            $cell.css('padding', '0');

            var $inp = $("<input type='text'  name='" + dataIndx + "' class='" + cls + " pq-cell-editor pg-cel-define' />")
                .appendTo($cell)
                .val(dc).keypress(function (e) {
                    //console.log(e);
                    //$('.dialog_main3').load("form/frm_dm_httk_select.php?idstyle=grid_editing_sltonkho");
                });
        }
        var manhomvattu_select = function (ui) {
            var $cell = ui.$cell,
                rowData = ui.rowData,
                dataIndx = ui.dataIndx,
                cls = ui.cls, width = ui.column.minWidth,
                dc = $.trim(rowData[dataIndx]);
            $cell.css('padding', '0');

            var $inp = $("<input type='text'  name='" + dataIndx + "' class='" + cls + " pq-cell-editor pg-cel-define' readonly />")
                .appendTo($cell)
                .val(dc).keypress(function (e) {

                    //if(typeof $(".dialog-manhom_vatu_select").html()=="undefined"){
                    $('.dialog_main_manhomvt').load("form/frm_dm_manhom_select.php?idstyle=grid_editing_sltonkho");
                    //}
                });
        }
        var formart_num = function (ui) {
            var $cell = ui.$cell,
                rowData = ui.rowData,
                dataIndx = ui.dataIndx,
                cls = ui.cls, width = ui.column.minWidth,
                dc = $.trim(rowData[dataIndx]);
            $cell.css('padding', '0');

            var $inp = $("<input type='text'  name='" + dataIndx + "' class='" + cls + " pq-cell-editor pg-cel-define' />")
                .appendTo($cell)
                .val(dc).keyup(function () {
                    var value = $(".pq-editor-focus").val();
                    $(".pq-editor-focus").val(FormatNumber(value));

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
        function addRow($grid, $obj_addrow="") {
            if (isEditing($grid)) {
                return false;
            }
            //append empty row in the first row.     
            if ($obj_addrow != "") {
                var rowData = $obj_addrow;
            } else {
                var rowData = {
                    mavt: "",
                    tenvt: "",
                    mavtcha: "",
                    matk: "",
                    quycach: "",
                    dvt: "",
                    dvtp: "",
                    kl: "",
                    kt: "",
                    giaban: "",
                    giabansi: "",
                    giamua: "",
                    rate: "",
                    mark: "",
                    congvao: "",
                    trura: "",
                    dp: "",
                    min: "",
                    max: "",
                    muc: "",
                    ghichu: ""
                }; //empty row template
            }
            $grid.pqGrid("addRow", {rowIndxPage: 0, rowData: rowData});

            var $tr = $grid.pqGrid("getRow", {rowIndxPage: 0});
            if ($tr) {
                //simulate click on edit button.
                $tr.find("button.edit_btn").click();
            }
        }

        //----------------------------Hàm xóa dữ kiệu------------------------------------------
        function deleteRow(rowData, $grid) {
            var rowData = rowData;
            var ma = rowData.mavt;
            var sott = rowData.sott;
            if($('div').hasClass('jconfirm')==false){
                $.confirm({
                    title: "Chú ý",icon: "fa fa-times-circle",type: "red",
                    content: "Bạn có muốn xóa hàng có mã "+ (ma)+"  không ?"+'<br/>Nhấn phím <strong style="color:blue;">[Y]</strong> để đồng ý phím <strong style="color:red;">[N]</strong> để hủy bỏ ',
                    buttons: {"Đồng ý": {keys: ['Y'],action: function () {


                        $.ajax($.extend({}, ajaxObj, {
                            context: $grid,
                            url: $dir_module_sltonkho+"del.php",
                            data: { id: sott,ma:ma },
                            success: function (result) {
                                this.pqGrid("commit");
                                this.pqGrid("refreshDataAndView");
                            },
                            error: function () {
                                this.pqGrid("removeClass", { rowData: rowData, cls: 'pq-row-delete' });
                                this.pqGrid("rollback");
                            }
                        }));
                    }},
                        "Hủy bỏ": {keys: ['N'],action: function () {

                        }}
                    }
                });
            }
        }

        //------------------------------Thây đổi row khi nhấp edit-----------------------------------
        function editRow(rowIndx, $grid) {

            $grid.pqGrid("addClass", {rowIndx: rowIndx, cls: 'pq-row-edit'});

            //change edit button to update button and delete to cancel.
            var selectCell = (getRowSelect());
            if (selectCell == false) {
                var dataIndex = 1;
            } else {
                //var dataIndex = selectCell[0].dataIndx;
                var dataIndex = 1;
            }
            if (dataIndex == 1) {
                $grid.pqGrid("editFirstCellInRow", {rowIndx: rowIndx});
            } else {
                $grid.pqGrid("editCell", {rowIndx: rowIndx, dataIndx: dataIndex});
            }
            var $tr = $grid.pqGrid("getRow", {rowIndx: rowIndx}),
                $btn = $tr.find("button.edit_btn");
            $btn.button("option", {label: "", "icons": {primary: "ui-icon-disk"}})
                .unbind("click")
                .click(function (evt) {
                    evt.preventDefault();
                    return update(rowIndx, $grid);

                });
            $btn.next().button("option", {label: "", "icons": {primary: "ui-icon-cancel"}})
                .unbind("click")
                .click(function (evt) {
                    $grid.pqGrid("quitEditMode");
                    $grid.pqGrid("removeClass", {rowIndx: rowIndx, cls: 'pq-row-edit'});
                    $grid.pqGrid("refreshRow", {rowIndx: rowIndx});
                    $grid.pqGrid("rollback");
                });
        }

        //---------------------------Cập nhật row-----------------------------------------
function ThanhTien($SoLuong, $DonGia,$ThanhTienNhap) {
            $soluong = parseFloat($SoLuong);// Lấy số lượng nhập vào

            $dongia = parseFloat($DonGia);// Lấy đơn giá nhập vào
            $thanhtien = Math.round(($soluong * $dongia)); // thành tiền  = bằng số lượng * đơn giá (Làm tròn thành tiền)
            //alert($ThanhTienNhap);
            if($ThanhTienNhap==0 || $ThanhTienNhap==$thanhtien || $ThanhTienNhap=="" || isNaN($ThanhTienNhap)== true){
                return $thanhtien
            }else{
                return $ThanhTienNhap;
            }
        }
        //--------------------------------Khai báo lưới---------------------------------------.
		var obj = {
            hwrap: false,
            //resizable: true,
            rowBorders: true,
			//virtualX: true, virtualY: true,
			height:$height_sltondk-60,
            width:$width_sltondk-15,
            //virtualX: true,
            numberCell: { show: true },
			filterModel: { on: true, mode: "AND", header: true },
            trackModel: { on: true }, //to turn on the track changes.            
            scrollModel: {
                autoFit: true
            },
            toolbar: {
                items: [
                    {
                        type: 'button',
                        label: "Nhập Excel",
                        icon: 'ui-icon-document',
                        listeners: [{
                            "click": function (evt) {
                                window.open('form/frm_tai_excel_tonkho.php', 'updatedata', 'height=1000','width=2000')
                            }
                        }]
                    },
                    {
                        type: 'button',
                        label: "Xuất Excel",
                        icon: 'ui-icon-document',
                        listeners: [{
                            "click": function (evt) {
                                $("#grid_editing_sltonkho").pqGrid("exportCsv", {url: "export_xuatexcel.php"});
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
					//console.log(recIndx);

                    var obj = rowList[0],
                        rowIndx = obj.rowIndx,
                        newRow = obj.newRow,
						oldRow = obj.oldRow,
                        type = obj.type,
                        rowData = obj.rowData;
					
					
                $soluong = parseFloat(rowData.slck.toString().replace(/,/g, ""));

                $dongia = parseFloat(rowData.gtvnck.toString().replace(/,/g, ""));
                $thanhtiennhap = parseFloat(rowData.dgxvnd.toString().replace(/,/g, ""));

				$soluongcu = oldRow.slck;
                $soluongmoi = newRow.slck;
                $donggiacu = oldRow.gtvnck;
                $donggiamoi = newRow.gtvnck;
				if(($soluongcu!=$soluongmoi) || $donggiacu!=$donggiamoi){
                    $thanhtiennhap=0;
                }
               
				$thanhtien = ThanhTien($soluong,$dongia,$thanhtiennhap)
				rowData.dgxvnd = Math.round($thanhtien);

                $dongiatinh = ($thanhtien/$soluong);
                $dongiatinh = $dongiatinh.toFixed(3);
                rowData.gtvnck = $dongiatinh.toString();

					var url="";
					if (type == 'update') {                        
                        var valid = grid.isValid({ rowData: rowData, allowInvalid: true }).valid;
                        if (valid) {
                            if (rowData[recIndx] == null) {
                                url = $dir_module_sltonkho+"add_tkdk.php";
                            }
                            else {
                                url = $dir_module_sltonkho+"add_tkdk.php";
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
                         success: function () {   
							$grid.pqGrid("refreshRow", {rowIndx: rowIndx});
							tongtienhienco();
                        }
                    });
					$grid.pqGrid("refreshRow", {rowIndx: rowIndx});
               }
            },
            colModel: [//-------------------------------------------Khai báo các cột trong lưới-----------------------
                {title: "SoTT", dataType: "string", dataIndx: "sott", editable: false, width: 0, hidden: true},
				{title: "STT", dataType: "integer", dataIndx: "STT", editable: false, width: 0, hidden: true},
                {
                    title: "Mã VT",
                    dataType: "string",
                    editable: false,
                    dataIndx: "mavt",
                    minWidth: 90,
                    sortable: true,
                    filter: {
                        type: 'textbox',
                        condition: 'begin',
                        listeners: ['keyup']
                    }

                },
                {title: "Tên hàng", minWidth: 200, dataType: "string", editable: true, dataIndx: "tenvt",
                    filter: { type: 'textbox', condition: 'begin', listeners: ['keyup'] }
                },
                {
                    title: "Số hiệu",
                    minWidth: 60,
                    dataType: "string",
                    align: "center",
                    editable: false,
                    dataIndx: "matk",
                    filter: { type: 'textbox', condition: 'begin', listeners: ['keyup'] }
                },
                {title: "ĐVT", minWidth: 60, dataType: "string", align: "center", editable: true, dataIndx: "dvt",
                    filter: { type: 'textbox', condition: 'begin', listeners: ['keyup'] }
                },
                {
                    title: "Số lượng tồn", minWidth: 100, dataType: "string", align: "right", dataIndx: "slck",
                    editor: {
                        type: "number"
                    },
                    validations: [
                        {type: 'maxLen', value: 16, msg: "Số lượng tồng phải nhỏ hơn 17 số !"},
                    ],
                    render: function (ui) {

                        var val = DinhDangSo(ui.rowData.slck);
                        return val;
                    },
                    filter: { type: 'textbox', condition: 'begin', listeners: ['keyup'] }
                },
                {
                    title: "Đơn giá", minWidth: 100, dataType: "string", align: "right", dataIndx: "gtvnck",
                    editor: {
                        type: "number"
                    },
                    validations: [
                        {type: 'maxLen', value: 16, msg: "Giá mua phải nhỏ hơn 17 số !"},
                    ],
                    render: function (ui) {
                        var val = DinhDangSo(ui.rowData.gtvnck);
                        return val;
                    },
                        filter: { type: 'textbox', condition: 'begin', listeners: ['keyup'] }
                },
                {
                    title: "Thành tiền",
                    minWidth: 130,
                    dataType: "string",
                    align: "right",
                    editable: true,
                    dataIndx: "dgxvnd",
                    editor: {
                        type: "number"
                    },
                    validations: [
                        {type: 'maxLen', value: 16, msg: "Giá mua phải nhỏ hơn 17 số !"},
                    ],
                    render: function (ui) {
                        var val = ui.rowData.dgxvnd;
                        return $.number(val,0,".",",");
                    },
                    filter: { type: 'textbox', condition: 'begin', listeners: ['keyup'] }
                },
                {
                    title: "Thuế suất",
                    minWidth: 80,
                    dataType: "string",
                    align: "center",
                    editable: true,
                    dataIndx: "rate",
                    validations: [
                        {type: 'minLen', value: 1, msg: "Thuế xuất không được trống !"},
                        {type: 'maxLen', value: 2, msg: "Thuế xuất không được quá 2 số !"}
                    ],
                    render: function (ui) {
                        var rate = ui.rowData.rate;
                        return rate + "%";
                    }
                },

                {
                    title: "Kho hàng",
                    minWidth: 140,
                    dataType: "string",
                    editable: false,
                    align: "center",
                    dataIndx: "makho",
                    filter: { type: "select",
                        condition: 'equal',
                        prepend: { '': '--Tất cả--' },
                        valueIndx: "makho",
                        labelIndx: "tenkho",
                        listeners: ['change']
                    },
                    render: function (ui) {

                        var ten = ui.rowData.tenkho;
                        return ten;
                    }
                },

                {
                    title: "Quy cách",
                    minWidth: 100,
                    dataType: "string",
                    editable: true,
                    align: "center",
                    dataIndx: "quycach"
                },
                {
                    title: "Mã nhóm",
                    minWidth: 150,
                    dataType: "string",
                    editable: false,
                    align: "left",
                    dataIndx: "manhom",
                    validations: [
                        {type: 'minLen', value: 1, msg: "Mã nhóm không được trống !"},
                    ],
                    editor: {
                        type: manhomvattu_select
                    },
                    filter: {
                        type: "select",
                        condition: 'equal',
                        prepend: {'': '--Tất cả--'},
                        valueIndx: "manhom",
                        labelIndx: "tennhom",
                        listeners: ['change']
                    },
                    render: function (ui) {

                        var tennhom = ui.rowData.tennhom;
                        return tennhom;
                    }
                },
                {title: "Tên nhóm", minWidth: 80, dataType: "string", align: "left", hidden: true, dataIndx: "tennhom"},
                {title: "Tên kho", minWidth: 80, dataType: "string", align: "left", hidden: true, dataIndx: "tenkho"},

            ],//-----------------------------------------Kết thúc các cột---------------------------------------
            pageModel: { type: "local", rPP: 200, strRpp: "{0}", strDisplay: "{0} từ {1} của {2}" },
            dataModel: {
                dataType: "JSON",
                location: "remote",
                recIndx: "sott",
                url: $dir_module_sltonkho+"list.php",//-- Load danh sách lên lưới
                getData: function (dataJSON) {
                var data = dataJSON.data;
                return { data: data };
            }
		}};

        var totalData;
        function calculateSummary() {
            var
                $thanhtien = 0,
                $soluong = 0,
                data = $("#grid_editing_sltonkho").pqGrid('option', 'dataModel.data');
            try {
                data.forEach(row => {
                    $thanhtien+= parseFloat(row['dgxvnd']);
                    $soluong+= parseFloat(row['slck']);
            })
            }catch (e) {

            }
            totalData = { tenvt: "<b>TỔNG CỘNG</b>", slck: $soluong, dgxvnd: $thanhtien,rate:0,gtvnck:0, pq_rowcls: 'green' };
        }

        var $summary = "";

        obj.render = function (evt, ui) {
            $summary = $("<div class='pq-grid-summary'  ></div>")
                .prependTo($(".pq-grid-bottom", this));
            calculateSummary();
        }

        obj.cellSave = function (evt, ui) {
            obj.refresh.call(this);
        }
        obj.refresh = function (evt, ui) {
            calculateSummary();
            var data = [totalData]; //2 dimensional array
            var obj = { data: data, $cont: $summary }
            $(this).pqGrid("createTable", obj);
        }


        var $grid = $("#grid_editing_sltonkho").pqGrid(obj);
        $grid.one("pqgridload", function (evt, ui) {

            var column = $grid.pqGrid("getColumn", {dataIndx: "manhom"});
            var filter = column.filter;
            filter.cache = null;
            filter.options = $grid.pqGrid("getData", {dataIndx: ["tennhom", "manhom"]});// lấy 1 hoặc nhiều dataindex

            var column = $grid.pqGrid("getColumn", { dataIndx: "makho" });
            var filter = column.filter;
            filter.cache = null;
            filter.options = $grid.pqGrid("getData", {dataIndx: ["tenkho", "makho"]});// lấy 1 hoặc nhiều dataindex
            $("#grid_editing_sltonkho .pq-search-txt").focus();
            $grid.pqGrid("refreshHeader");
        });

        function tongtienhienco(){
            filterObject = [];
            var CM = $("#grid_editing_sltonkho").pqGrid("getColModel");
            for (var i = 0, len = CM.length; i < len; i++) {
                var dataIndx = CM[i].dataIndx;
                var filter=CM[i].filter;
                if(typeof filter != "undefined" ){
                    var condition = filter.condition;
                    var value = filter.value;
                }
                if(typeof value != "undefined" ) {
                    filterObject.push({dataIndx: dataIndx, condition: condition, value: value});
                }
            }
            $pq_filter = "{\"mode\":\"AND\",\"data\":"+JSON.stringify(filterObject)+"}";
            var $data;
            $.ajax({// Kiểm tra xem STT có tồn tại hay không
                url: $dir_module_sltonkho + "tongtienhientaicuatonkho.php",
                async: false,
                data:{pq_filter:$pq_filter},
                success: function (response) {
                    $data = $.parseJSON(response);
                }
            });
            return $data;
        }

        window.CallParent = function() {
            $("#grid_editing_sltonkho").pqGrid("refreshDataAndView");
        }

        //use refresh & refreshRow events to display jQueryUI buttons and bind events.
        function getRowSelect() { // --------------------Lấy dữ liệu theo dòng trên gird----------------------                 
            var arr = $("#grid_editing_sltonkho").pqGrid("selection", {
                type: 'cell',
                method: 'getSelection'
            }); //Lấy giá trị đang chọn
            if (arr && arr.length > 0) {
                return arr;
            } else {
                return false;
            }
        }
		function isEditCell(rowIndex,dataIndx) { // --------------------Lấy dữ liệu theo dòng trên gird----------------------                 
             var isEdit = false;
			  isEdit = $("#grid_editing_sltonkho").pqGrid("isDirty"); //Lấy giá trị đang chọn
             
             return isEdit;
         }
 //-----------------------------Hết lưới---------------------------------------------------------------------
        //-----------------------------Hết lưới---------------------------------------------------------------------
    });
</script>
<div id="dialog-soluongtonkho"
     title="Số lượng tồn kho đầu kỳ... (ENTER : Sửa,Lưu , F4 : Thêm tồn kho, F8: Xoá tồn kho,ESC: Thoát)">
    <!-- dialog -->
    <div id="grid_editing_sltonkho" style="margin:5px auto;border: 0px !important;"></div>
</div>