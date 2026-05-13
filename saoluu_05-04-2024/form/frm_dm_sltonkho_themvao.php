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
    $height_themvao = getHeight();
    $width_themvao = getWidth() - 100;
    $(function () {
        var $dir_module_sltonkho = "";
        $dir_module_mavattu = "modules/mavattu/";//--------------------------------------------Thay đổi khi copy
        $dir_module_manhom = "modules/manhomvattu/";//
        $dir_module_sltonkho = "modules/soluongtonkho/";//--------------------------------------------Thay đổi khi copy
        $dir_module_makho = "modules/makho/";//--------------------------------------------Thay đổi khi copy
        $dir_module_makhachhang = "modules/makhachhang/";//--------------------------------------------Thay đổi khi copy


        function xoadialog_sltonkho_themvao() { // ----------------------đóng form
            reset_dialog(".dialog-soluongtonkho_themvao");
            reset_dialog(".dialog_main_sltonkho_themvao");
        }

        $("#dialog-soluongtonkho_themvao").dialog({ // ------------------Gọi dialog
            resizable: false,
            height: $height_themvao,
            width: $width_themvao,
            modal: true

        });
        $("#dialog-soluongtonkho_themvao").keydown(function(event) {//--------------Các phím tắt
            var $grid_pb = $("#grid_editing_sltonkho_themvao").closest('.pq-grid');//---- Lưới----------------
            if (event.keyCode == Keys.F7 || event.keyCode == Keys.F8) {
                var rowSelect = getRowSelect();//------ Lấy đối tượng được chọn

                if(rowSelect==false){
                    alert_f("Chú Ý","fa fa-warning","red","Bạn cần chọn dữ liệu trước khi thực hiện !");
                }
            }
            var rowEditting = $( "#grid_editing_sltonkho_themvao" ).pqGrid( "getRowsByClass", { cls : 'pq-row-edit' } );//---Lấy đối tượng đang sửa
            if ( $('div').hasClass('jconfirm')==false) {

                if (event.keyCode == Keys.ESCAPE && $('div').hasClass('jconfirm')==false&&rowEditting.length<1) {
                    $.ajax({
                        url: $dir_module_sltonkho+"copy_data_tmp.php",
                        async: false,
                        success: function (response) {
                        }
                    });
                    xoadialog_sltonkho_themvao();
                    $("#grid_editing_sltonkho_themvao .pq-search-txt").focus();
                   // $('.dialog_main_sltonkho').load('form/frm_dm_sltonkho.php');
                    $( "#grid_editing_sltonkho" ).pqGrid("refreshDataAndView");
                }
            }else{
                return false;
            }
        }); // end phím tắt

        function change_data_quit_sltonkho_themvao() { // Cảnh báo thoát khi thay đổi dữ liệu////////////////////////////////////////////////////
            var $grid_pb = $("#grid_editing_sltonkho_themvao").closest('.pq-grid');//---- Lưới----------------
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
                                    xoadialog_sltonkho_themvao();
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
                                xoadialog_sltonkho_themvao();
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
                    //$('.dialog_main3').load("form/frm_dm_httk_select.php?idstyle=grid_editing_sltonkho_themvao");
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
                    $('.dialog_main_manhomvt').load("form/frm_dm_manhom_select.php?idstyle=grid_editing_sltonkho_themvao");
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
        function addRow_SLTon_ThemVao(rowIndx,$name='mavt',$grid,$obj_addRow_SLTon_ThemVao="") {
            //append empty row in the first row.
            $ma="";
            $.ajax({
                url: $dir_module_mavattu+"taoma.php",
                async: false,
                success: function (response) {
                    $ma = response.trim();
                }
            });
            if($obj_addRow_SLTon_ThemVao!=""){
                var _rowData =$obj_addRow_SLTon_ThemVao;
            }else{
                var _rowData = {mavt:'',tenvt:"",matk:1561,dvt :"",slck :"0",gtvnck :"0",dgxvnd :"0",rate :"0",makho :"",manhom :"",quycach :"",tennhom :"",tenkho :""}; //empty row template
            }
            _rowData.mavt = $ma;
            if(typeof rowIndx == 'undefined')
                rowIndx=0;
            $grid.pqGrid("addRow", { rowIndx: rowIndx, rowData: _rowData });

            $grid.pqGrid("setSelection", { rowIndx: rowIndx, dataIndx: $name});
            $grid.pqGrid("editFirstCellInRow", { rowIndx: (rowIndx) });
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
                            url: $dir_module_mavattu+"del.php",
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
        // Bắt đầu từ đây
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
			height:$height_themvao-80,
            width:$width_themvao-20,
            //virtualX: true,
            numberCell: { show: true },
			filterModel: { on: true, mode: "AND", header: true },
            trackModel: { on: true }, //to turn on the track changes.            
            scrollModel: {
                autoFit: true
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

                    console.log(ui);

                    var obj = rowList[0],
                        rowIndx = obj.rowIndx,
                        newRow = obj.newRow,
						oldRow = obj.oldRow,
                        type = obj.type,
                        rowData = obj.rowData;
                    if(ui.source == 'add'){
                        newRow = obj.newRow;
                        oldRow = obj.newRow;
                        rowData = obj.newRow;
                    }

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
                    editable: true,
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
                    validations: [
                        { type: 'minLen', value: 1, msg: "Tên vật tư hàng hóa không được trống !" }
                    ],
                    filter: {
                        type: 'textbox',
                        condition: 'begin',
                        listeners: ['keyup']
                    }
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
                    filter: { type: 'textbox', condition: 'begin', listeners: ['keyup'] },
                    validations: [
                        { type: 'minLen', value: 1, msg: "Đơn vị tính chính không được trống !" },
                    ]
                },
                {
                    title: "Mã nhóm",
                    minWidth: 150,
                    dataType: "string",
                    editable: true,
                    align: "left",
                    dataIndx: "manhom",
                    validations: [
                        {type: 'minLen', value: 1, msg: "Mã nhóm không được trống !"},
                    ],
                    editor: {
                        type: "select", options: function (ui) {
                            //remote validation
                            var parsedJson = "";
                            $.ajax({
                                url: $dir_module_manhom + "cb_manhomvt.php",
                                data: {},
                                async: false,
                                success: function (response) {
                                    parsedJson = $.parseJSON(response);
                                }
                            });
                            return parsedJson;
                        }
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
                        isEdit = isEditCell();
                        if(isEdit) {
                            var $ma = ui.rowData.manhom;
                            var $ten = "";// Danh sách khách hàng
                            $.ajax({// Load danh sách mã khách hàng
                                url: $dir_module_makhachhang + "gettentheo_table.php",
                                async: false,
                                data:{ma:$ma,table:"manhom",columw:"manhom",columget:"tennhom"},
                                success: function (response) {
                                    $ten = response;
                                }
                            });
                            return $ten;
                        }else {
                            var tennhom = ui.rowData.tennhom;
                            return tennhom;
                        }
                    }
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
                    editor: {
                        type: "select", options: function (ui) {
                            //remote validation
                            var parsedJson = "";
                            $.ajax({
                                url: $dir_module_makho + "cb_makho.php",
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
                        isEdit = isEditCell();
                        if(isEdit) {
                            var $ma = ui.rowData.makho;
                            var $ten = "abc";// Danh sách khách hàng
                            $.ajax({// Load danh sách mã khách hàng
                                url: $dir_module_makhachhang + "gettentheo_table.php",
                                async: false,
                                data:{ma:$ma,table:"makho",columw:"makho",columget:"tenkho"},
                                success: function (response) {
                                    $ten = response;
                                }
                            });
                            return $ten;
                        }else {
                            var ten = ui.rowData.tenkho;
                            return ten;
                        }
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

                {title: "Tên nhóm", minWidth: 80, dataType: "string", align: "left", hidden: true, dataIndx: "tennhom"},
                {title: "Tên kho", minWidth: 80, dataType: "string", align: "left", hidden: true, dataIndx: "tenkho"},

            ],//-----------------------------------------Kết thúc các cột---------------------------------------
            pageModel: { type: "local", rPP: 200, strRpp: "{0}", strDisplay: "{0} từ {1} của {2}" },
            dataModel: {
                dataType: "JSON",
                location: "remote",
                recIndx: "sott",
                url: $dir_module_sltonkho+"list_tmp_tkdk.php",//-- Load danh sách lên lưới
                getData: function (dataJSON) {
                var data = dataJSON.data;
                return { curPage: dataJSON.curPage, totalRecords: dataJSON.totalRecords, data: data };
            }
		}};
        var $grid = $("#grid_editing_sltonkho_themvao").pqGrid(obj);
        $grid.one("pqgridload", function (evt, ui) {

            var column = $grid.pqGrid("getColumn", {dataIndx: "manhom"});
            var filter = column.filter;
            filter.cache = null;
            filter.options = $grid.pqGrid("getData", {dataIndx: ["tennhom", "manhom"]});// lấy 1 hoặc nhiều dataindex

            var column = $grid.pqGrid("getColumn", { dataIndx: "makho" });
            var filter = column.filter;
            filter.cache = null;
            filter.options = $grid.pqGrid("getData", {dataIndx: ["tenkho", "makho"]});// lấy 1 hoặc nhiều dataindex

            $grid.pqGrid("refreshHeader");
        });

        //use refresh & refreshRow events to display jQueryUI buttons and bind events.
        function getRowSelect() { // --------------------Lấy dữ liệu theo dòng trên gird----------------------                 
            var arr = $("#grid_editing_sltonkho_themvao").pqGrid("selection", {
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
			  isEdit = $("#grid_editing_sltonkho_themvao").pqGrid("isDirty"); //Lấy giá trị đang chọn
             
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
		$Name = $("#grid_editing_sltonkho_themvao .pq-search-txt").focus();
		tongtienhienco();
	},100);
        //-----------------------------Hết lưới---------------------------------------------------------------------
    });
</script>
<div id="dialog-soluongtonkho_themvao"
     title="Thêm tồn kho đầu kỳ... (ENTER : Sửa,Lưu , ESC: Thoát)">
    <!-- dialog -->
    <div id="grid_editing_sltonkho_themvao" style="margin:5px auto;border: 0px !important;"></div>
    <datalist id="listmanhacungcap"></datalist>
</div>