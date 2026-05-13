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

</style>
<script>
    $height = getHeight()-10;
    $width = getWidth() - 60;
    $(function () {
        var $dir_module_sltonkho = "";
        $dir_module_sltonkho = "modules/soluongtonkho/";//--------------------------------------------Thay đổi khi copy
        function xoadialog_sltonkho() { // ----------------------đóng form
            reset_dialog(".dialog-soluongtonkho");
            reset_dialog(".dialog_main_sltonkho");
        }

        $("#dialog-soluongtonkho").dialog({ // ------------------Gọi dialog
            resizable: false,
            height: $height,
            width: $width,
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
        function deleteRow(rowIndx, $grid) {
            $grid.pqGrid("addClass", {rowIndx: rowIndx, cls: 'pq-row-delete'});
            var rowData = $grid.pqGrid("getRowData", {rowIndx: rowIndx});
            //var ans = window.confirm("Bạn có muốn xóa dòng số " + (rowIndx + 1) + " không ?");
            if ($('div').hasClass('jconfirm') == false) {
                $.confirm({
                    title: "Chú ý", icon: "fa fa-times-circle", type: "red",
                    content: "Bạn có muốn xóa hàng số" + (rowIndx + 1) + "  không ?" + '<br/>Nhấn phím <strong style="color:blue;">[Y]</strong> để đồng ý phím <strong style="color:red;">[N]</strong> để hủy bỏ ',
                    buttons: {
                        "Đồng ý": {
                            keys: ['Y'], action: function () {
                                $grid.pqGrid("deleteRow", {rowIndx: rowIndx, effect: true});

                                var sott = $grid.pqGrid("getRecId", {rowIndx: rowIndx});
                                var rowData = ( $grid.pqGrid("getRowData", {rowIndx: rowIndx}));
                                var ma = rowData.mavt;

                                $.ajax($.extend({}, ajaxObj, {
                                    context: $grid,
                                    url: $dir_module_sltonkho + "del.php",
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
                                $grid.pqGrid("removeClass", {rowIndx: rowIndx, cls: 'pq-row-delete'});
                            }
                        }
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
			height:$height-70,
            width:$width-30,
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
                        type: "<span id='tongtienhienco' style='color:red'></span>"
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

					var url="";
					if (type == 'update') {                        
                        var valid = grid.isValid({ rowData: rowData, allowInvalid: true }).valid;
                        if (valid) {
                            if (rowData[recIndx] == null) {
                                url = $dir_module_sltonkho+"add.php";
                            }
                            else {
                                url = $dir_module_sltonkho+"add.php";
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
							
                        },
                        complete: function () {
                           tongtienhienco();
                        }
                    });
					$grid.pqGrid("refreshRow", {rowIndx: rowIndx});
               }
            },
            colModel: [//-------------------------------------------Khai báo các cột trong lưới-----------------------
                {title: "SoTT", dataType: "integer", dataIndx: "sott", editable: false, width: 0, hidden: true},
				{title: "STT", dataType: "integer", dataIndx: "STT", editable: false, width: 0, hidden: true},
                {
                    title: "Mã VT",
                    dataType: "string",
                    editable: false,
                    dataIndx: "mavt",
                    minWidth: 120,
                    sortable: true,
                    filter: { type: 'textbox', condition: 'begin', listeners: ['keyup'] }

                },
                {title: "Tên hàng", minWidth: 200, dataType: "string", editable: true, dataIndx: "tenvt",
                    filter: { type: 'textbox', condition: 'begin', listeners: ['keyup'] }
                },
                {
                    title: "Số hiệu",
                    minWidth: 60,
                    dataType: "string",
                    align: "center",
                    editable: true,
                    dataIndx: "matk"
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
                        {type: 'maxLen', value: 16, msg: "Giá mua phải nhỏ hơn 17 số !"},
                    ],
                    render: function (ui) {
                        var giamua = ui.rowData.slck;
                        return FormatNumber(giamua.toString());
                    }
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
                        var giamua = ui.rowData.gtvnck;
                        return FormatNumber(giamua.toString());
                    }
                },
                {
                    title: "Thành tiền",
                    minWidth: 100,
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
                        var giamua = ui.rowData.dgxvnd;
                        return FormatNumber(giamua.toString());
                    }
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
                    minWidth: 100,
                    dataType: "string",
                    editable: true,
                    align: "center",
                    dataIndx: "khohang"
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

            ],//-----------------------------------------Kết thúc các cột---------------------------------------
            pageModel: { type: "remote", rPP: 200 },
            dataModel: {
                dataType: "JSON",
                location: "remote",
                recIndx: "sott",
                url: $dir_module_sltonkho+"list.php",//-- Load danh sách lên lưới
                getData: function (dataJSON) {
                var data = dataJSON.data;
                return { curPage: dataJSON.curPage, totalRecords: dataJSON.totalRecords, data: data };
            }
		}};
        var $grid = $("#grid_editing_sltonkho").pqGrid(obj);
        $grid.one("pqgridload", function (evt, ui) {
            try {
                var column = $grid.pqGrid("getColumn", {dataIndx: "manhom"});
                var filter = column.filter;
                filter.cache = null;
                filter.options = $grid.pqGrid("getData", {dataIndx: ["tennhom", "manhom"]});// lấy 1 hoặc nhiều dataindex
            }catch(err){

            }
            $grid.pqGrid("refreshHeader");
        });
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
		 function tongtienhienco(){
			 $.ajax({// Kiểm tra xem STT có tồn tại hay không
                        url: $dir_module_sltonkho + "tongtienhientaicuatonkho.php",
                        async: false,
                        success: function (response) {
                          $("#tongtienhienco").html(response);
                        }
               });
		 }
 //-----------------------------Hết lưới---------------------------------------------------------------------       
            setTimeout(function(){
		$Name = $("#grid_editing_sltonkho .pq-search-txt").focus();
		tongtienhienco();
	},100);
        //-----------------------------Hết lưới---------------------------------------------------------------------
    });
</script>
<div id="dialog-soluongtonkho"
     title="Số lượng tồn kho đầu kỳ...(k: hàng hóa không chịu thuế) (ESC: Thoát)">
    <!-- dialog -->
    <div id="grid_editing_sltonkho" style="margin:5px auto;border: 0px !important;"></div>
</div>