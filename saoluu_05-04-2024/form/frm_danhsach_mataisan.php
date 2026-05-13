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

</style>
<script>
    $height = getHeight();
    $width = getWidth() - 50;
    $(function () {
        var $dir_module_mataisan = "";
        $dir_module_mataisan = "modules/mataisan/";//--------------------------------------------Thay đổi khi copy
        $dir_module_httk = "modules/httk/";//--------------------------------------------Thay đổi khi copy
        $dir_module_mabophan = "modules/mabp/";//--------------------------------------------Thay đổi khi copy
        $dir_module_manhomts = "modules/manhomvattu/";//--------------------------------------------Thay đổi khi copy
        function xoadialog_danhsach_taisan() { // ----------------------đóng form
            reset_dialog(".dialog-mataisan");
            reset_dialog(".dialog_main_mataisan");
            $("#mataisan").focus();
        }

        $("#dialog-mataisan").dialog({ // ------------------Gọi dialog
            resizable: false,
            height: $height,
            width: $width,
            modal: true

        });
        $("#dialog-mataisan").keydown(function (event) {//--------------Các phím tắt
            var $grid_pb = $("#grid_editing_mats").closest('.pq-grid');//---- Lưới----------------
            if (event.keyCode == Keys.F2 || event.keyCode == Keys.F7 || event.keyCode == Keys.F8 || event.keyCode == Keys.INSERT) {
                var rowSelect = getRowSelect();//------ Lấy đối tượng được chọn
                if (rowSelect == false) {
                    alert_f("Chú Ý", "fa fa-warning", "red", "Bạn cần chọn dữ liệu trước khi thực hiện !");
                }
            }
            var rowEditting = $("#grid_editing_mats").pqGrid("getRowsByClass", {cls: 'pq-row-edit'});//---Lấy đối tượng đang sửa
            if ($('div').hasClass('jconfirm') == false) {
                if (event.keyCode == Keys.F4) {
                    var rowSelect = getRowSelect();//------ Lấy đối tượng được chọn
                    if(rowSelect==false){
                        var colM = $("#grid_editing_mats").pqGrid("option", "colModel");
                        colM[2].editable = true;
                        $("#grid_editing_mats").pqGrid("option", "colModel", colM);
                        addRow(rowIndx,'mats',$grid_pb,"");
                    }else {
                        var rowIndx = rowSelect[0].rowIndx;
                        var rowData = rowSelect[0].rowData;
                        var colM = $("#grid_editing_mats").pqGrid("option", "colModel");
                        colM[2].editable = true;
                        $("#grid_editing_mats").pqGrid("option", "colModel", colM);
                        var _dataRow = {
                            mats: "",
                            khauhao: 1,
                            matscha: rowData.mats,
                            tents:"",
                            matk: "",
                            dvt: "",
                            mabp: "",
                            manhomts: "",
                            congsuat: "",
                            nuocsx: "",
                            soluong: "0",
                            ngaysx: "",
                            ngaysd: "",
                            nguyengia: "",
                            tylekh: "",
                            thoigiansd: "",

                            chuthich: ""
                        };
                        addRow(rowIndx+1,'mats',$grid_pb,_dataRow);
                    }
                }
                if (event.keyCode == Keys.F7) { // copy
                    if (rowSelect != false){

                        var rowIndx = rowSelect[0].rowIndx;
                        var rowData = rowSelect[0].rowData;
                        //---------------Khai báo các cell khi dùng lệnh copy-----------------------------------------
                        var colM = $("#grid_editing_mats").pqGrid("option", "colModel");
                        colM[2].editable = true;
                        $("#grid_editing_mats").pqGrid("option", "colModel", colM);
                        //--------------------------------------------Thay đổi khi copy---------------------------------
                        var _dataRow = {
                            mats: rowData.mats,
                            khauhao: 1,
                            matscha: rowData.matscha,
                            tents: rowData.tents,
                            matk: rowData.matk,
                            dvt: rowData.dvt,
                            mabp: rowData.mabp,
                            manhomts: rowData.manhomts,
                            congsuat: rowData.congsuat,
                            nuocsx: rowData.nuocsx,
                            soluong: rowData.soluong,
                            ngaysx: rowData.ngaysx,
                            ngaysd: rowData.ngaysd,
                            nguyengia: rowData.nguyengia,
                            giatriconlai: rowData.giatriconlai,
                            tylekh: rowData.tylekh,
                            thoigiansd: rowData.thoigiansd,
                            muckhthang: rowData.muckhthang,
                            tkco: rowData.tkco,
                            tkno: rowData.tkno,
                            chuthich: rowData.chuthichu
                        };
                        addRow(rowIndx+1,'manhom',$grid_pb,_dataRow);
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
                    var rowData = rowSelect[0].rowData;
                    $("#mataisan").val(rowData.mats);
                    $("#tentaisan").val(rowData.tents);
                    $("#mataisan").focus();
                    xoadialog_danhsach_taisan();
                }
                if (event.keyCode == Keys.ESCAPE && $('div').hasClass('jconfirm') == false && rowEditting.length < 1) {
                    change_data_quit_mavattu();
                }
            } else {
                return false;
            }
        }); // end phím tắt

        function change_data_quit_mavattu() { // Cảnh báo thoát khi thay đổi dữ liệu////////////////////////////////////////////////////
            var $grid_pb = $("#grid_editing_mats").closest('.pq-grid');//---- Lưới----------------
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
                                    xoadialog_danhsach_taisan();
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
                                xoadialog_danhsach_taisan();
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
                    //$('.dialog_main3').load("form/frm_dm_httk_select.php?idstyle=grid_editing_mats");
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
                    $('.dialog_main_manhomvt').load("form/frm_dm_manhom_select.php?idstyle=grid_editing_mats");
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
        function addRow(rowIndx,$name='mats',$grid,$obj_addrow="") {
            //append empty row in the first row.
            $ma="";
            if($obj_addrow!=""){
                $.ajax({
                    url: $dir_module_mataisan+"taoma.php",
                    async: false,
                    data:{
                        makhcha:$obj_addrow.matscha
                    },
                    success: function (response) {
                        $ma = response;
                    }
                });
                var rowData =$obj_addrow;
            }else{
                $.ajax({
                    url: $dir_module_mataisan+"taoma.php",
                    async: false,
                    data:{
                        makhcha:"0"
                    },
                    success: function (response) {
                        $ma = response;
                    }
                });
                var rowData = {
                    mats: "",
                    khauhao: 1,
                    matscha: "0",
                    tents: "",
                    matk: "",
                    dvt: "",
                    manhomts: "",
                    congsuat: "",
                    nuocsx: "",
                    soluong: "",
                    ngaysx: "<?php echo date("Y-m-d"); ?>",
                    ngaysd: "<?php echo date("Y-m-d"); ?>",
                    nguyengia: "",
                    giatriconlai: "",
                    tylekh: "",
                    thoigiansd: "",
                    chuthich: ""
                }; //empty row template
            }
            rowData.mats = $ma;
            if(typeof rowIndx == 'undefined')
                rowIndx=0;
            $grid.pqGrid("addRow", { rowIndx: rowIndx, rowData: rowData });
$grid.pqGrid( "addClass", {rowIndx: rowIndx, cls: 'rownotsave'} );
            $grid.pqGrid("setSelection", { rowIndx: rowIndx, dataIndx: $name});
            $grid.pqGrid("editFirstCellInRow", { rowIndx: (rowIndx) });
        }

        //----------------------------Hàm xóa dữ kiệu------------------------------------------
        function deleteRow(rowData, $grid) {
            var rowData = rowData;
            var ma = rowData.mats;
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
                                    url: $dir_module_mataisan + "delmats.php",
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

        //------------------------------Thây đổi row khi nhấp edit-----------------------------------
        function editRow(rowIndx, $grid) {

            $grid.pqGrid("addClass", {rowIndx: rowIndx, cls: 'pq-row-edit'});

            //change edit button to update button and delete to cancel.
            var selectCell = (getRowSelect());
            if (selectCell == false) {
                var dataIndex = 1;
            } else {
                var dataIndex = selectCell[0].dataIndx;
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
        function update(rowIndx, $grid) {

            if ($grid.pqGrid("saveEditCell") == false) {
                return false;
            }

            var isValid = $grid.pqGrid("isValid", {rowIndx: rowIndx}).valid;
            if (!isValid) {//Kiểm tra có sửa dữ liệu không
                return false;
            }
            var isDirty = $grid.pqGrid("isDirty");
            if (isDirty) {
                var url,
                    rowData = $grid.pqGrid("getRowData", {rowIndx: rowIndx}),
                    recIndx = $grid.pqGrid("option", "dataModel.recIndx");

                $grid.pqGrid("removeClass", {rowIndx: rowIndx, cls: 'pq-row-edit'});

                if (rowData[recIndx] == null) {
                    //url to add records.
                    url = $dir_module_mataisan + "add.php";
                }
                else {
                    //url to  update records.
                    url = $dir_module_mataisan + "edit.php";
                }
                $.ajax($.extend({}, ajaxObj, {
                    context: $grid,
                    url: url,
                    data: rowData,
                    success: function (response) {
                        var recIndx = this.pqGrid("option", "dataModel.recIndx");
                        if (rowData[recIndx] == null) {
                            rowData[recIndx] = response.recId;
                        }
                        this.pqGrid("removeClass", {rowIndx: rowIndx, cls: 'pq-row-edit'});
                        this.pqGrid("commit");
                        $grid.pqGrid("refreshDataAndView");
                    }
                }));
            } else {
                $grid.pqGrid("quitEditMode");
                $grid.pqGrid("removeClass", {rowIndx: rowIndx, cls: 'pq-row-edit'});
                $grid.pqGrid("refreshRow", {rowIndx: rowIndx});
            }
        }

        //--------------------------------Khai báo lưới---------------------------------------.
        var obj = {
            hwrap: false,
            //resizable: true,
            rowBorders: true,
            virtualX: true, virtualY: true,
            height: $height - 58,
            width: $width - 20,
            //virtualX: true,
            freezeCols: 5,
            numberCell: {show: true},
            filterModel: {on: true, mode: "AND", header: true},
            trackModel: {on: true}, //to turn on the track changes.
            scrollModel: {
                autoFit: true
            },
            historyModel: {
                checkEditableAdd: true
            },

            editor: {
                select: false
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
                            url = $dir_module_mataisan + "addmats.php";
                        }
                        else {
                            url = $dir_module_mataisan + "editmats.php";
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
                { title: "Lưu", dataType: "integer", dataIndx: "sott", editable: false, width: 10, hidden:false,
                    render: function (ui) {
                        var $val  = ui.rowData.sott;
                        if($val==0 || $val=="" || typeof $val == 'undefined'){
                            return "<img src='icon/uncheck.png' width='20px'/>";
                        } else {
                            return "<img src='icon/check.png' width='20px' />";
                        }
                    },},
                {
                    title: "Khấu hao", minWidth: 100, dataType: "integer", align: "center", dataIndx: "khauhao",hidden: true,
                    editor: {type: "select",options: function (ui) {
                        //remote validation
                        var parsedJson = [ { 0:"KHÔNG"}, {1: "CÓ"}] ;
                        return parsedJson;
                    }},
                    render: function (ui) {
                        var value = ui.rowData.khauhao;
                        if (value == 1) {
                            return "CÓ";
                        } else {
                            return "KHÔNG";
                        }
                    }
                },
                {
                    title: "Mã TS",
                    dataType: "string",
                    dataIndx: "mats",
                    minWidth: 100,
                    sortable: true,
                    editable: false,
                    validations: [
                        {type: 'minLen', value: 1, msg: "Mã tài sản phải có 1 đến 14 ký tự  !"},
                        {type: 'maxLen', value: 14, msg: "Mã tài sản phải có 1 đến 14 ký tự !"},
                        { type: 'regexp', value: '^[0-9a-zA-Z_.-]{0,14}$', msg: 'Mã không có dấu và không có khoản trắng' },

                        {
                            type: function (ui) {
                                isEdit = isEditCell();
                                if (isEdit) {
                                    var value = ui.value,
                                        _found = false, sott = ui.rowData.sott;
                                    //remote validation
                                    $.ajax({
                                        url: $dir_module_mataisan + "checkkey_mataisan.php",
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
                    title: "Tên TS", minWidth: 200, dataType: "string", dataIndx: "tents", editable: true,
                    validations: [
                        {type: 'minLen', value: 1, msg: "Tên tài sản hàng hóa không được trống !"}
                    ],
                    filter: {
                        type: 'textbox',
                        condition: 'begin',
                        listeners: ['keyup']
                    }
                },
                {
                    title: "Mã TS Cha",
                    dataType: "string",
                    dataIndx: "matscha",
                    minWidth: 100,
                    sortable: true,
                    editable: true,
                    validations: [
                        {type: 'minLen', value: 1, msg: "Mã tài sản phải có  1 đến 14 ký tự  !"},
                        {type: 'maxLen', value: 14, msg: "Mã tài sản phải có 1 đến 14 ký tự !"},
                        { type: 'regexp', value: '^[0-9a-zA-Z_-]{0,14}$', msg: 'Mã không có dấu và không có khoản trắng' },
                        {
                            type: function (ui) {
                                isEdit = isEditCell();
                                if (isEdit) {
                                    var value = ui.value,
                                        _found = false, sott = ui.rowData.sott;
                                    //remote validation
                                    $.ajax({
                                        url: $dir_module_mataisan + "checkkey_mataisan_cha.php",
                                        data: {'id': value},
                                        async: false,
                                        success: function (response) {
                                            if (response == 1) {// Không tồn tại mã tài sản cha
                                                _found = true;
                                            }
                                        }
                                    });
                                    if (_found) {
                                        ui.msg = value + " Không tồn tại trong hệ thống !";
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
                    title: "Mã TK-CP", minWidth: 100, dataType: "string", dataIndx: "matk", editable: true,
                    validations: [
                        {type: 'minLen', value: 1, msg: "Mã TK không được trống !"}
                    ],
                    editor: {type: "select",options: function (ui) {
                        //remote validation
                        var parsedJson = "" ;
                        $.ajax({// Load danh sách mã khách hàng
                            url: $dir_module_httk + "cb_manhomhttk.php",
                            async: false,
                            data:{ma:'154,214,156,411,421,611,621,622,623,627,631,632,635,641,642,811'},
                            success: function (response) {
                                parsedJson = $.parseJSON(response);
                            }
                        });
                        return parsedJson;
                    }},
                },

                {
                    title: "ĐVT", minWidth: 100, dataType: "string", align: "left", dataIndx: "dvt", editable: true,
                    validations: [
                        {type: 'minLen', value: 1, msg: "Đơn vị tính không được trống !"},
                    ]
                },
                {
                    title: "Nhóm TS", minWidth: 100, dataType: "string", align: "left", dataIndx: "manhomts", editable: true,
                    validations: [
                        {type: 'minLen', value: 1, msg: "Đơn vị tính không được trống !"},
                    ],
                    editor: {type: "select",options: function (ui) {
                        var parsedJson = [ { "2111":"Nhà cửa, vật kiến trúc"}, {"2112": "Máy móc, thiết bị"}, {"2113": "Phương tiện vận tải, truyền dẫn"}, {"2114": "Thiết bị, dụng cụ quản lý"}, {"2115": "Cây lâu năm, súc vật làm việc và cho sản phẩm"},{"2118": "TSCĐ khác"}, {"2131": "Quyền sử dụng đất"}, {"2132": "Quyền phát hành"}, {"2133": "Bản quyền, bằng sáng chế"}, {"2134": "Nhãn hiệu, tên thương mại"}, {"2135": "Chương trình phần mềm"}, {"2136": "Giấy phép và giấy phép nhượng quyền"}, {"2138": "TSCĐ vô hình khác"}] ;
                        return parsedJson;
                    }},
                    render: function (ui) {{
                        var parsedJson = [ { "id":"2111","name":"Nhà cửa, vật kiến trúc"}, {"id":"2112","name":"Máy móc, thiết bị"}, {"id":"2113","name":"Phương tiện vận tải, truyền dẫn"}, {"id":"2114","name":"Thiết bị, dụng cụ quản lý"}, {"id":"2115","name":"Cây lâu năm, súc vật làm việc và cho sản phẩm"},{"id":"2118","name": "TSCĐ khác"}, {"id":"2131","name":"Quyền sử dụng đất"}, {"2132": "Quyền phát hành"}, {"id":"2133","name":"Bản quyền, bằng sáng chế"}, {"id":"2134","name":"Nhãn hiệu, tên thương mại"}, {"id":"2115","name":"Chương trình phần mềm"}, {"id":"2136","name":"Giấy phép và giấy phép nhượng quyền"}, {"id":"2138","name":"TSCĐ vô hình khác"}] ;
                        var value = ui.rowData.manhomts;
						$tennhomts="";
                        $.each(parsedJson, function(key, item) {
								if(item.id==value){
									$tennhomts =item.name;
								}
						 });


						 return $tennhomts;
                        }
                    }
                },
                {
                    title: "Công suất",
                    minWidth: 150,
                    dataType: "string",
                    align: "left",
                    dataIndx: "congsuat",
                    editable: true,
                },
                {
                    title: "Nước SX",
                    minWidth: 150,
                    dataType: "string",
                    align: "left",
                    dataIndx: "nuocsx",
                    editable: true,
                },
                {
                    title: "Sở hữu",
                    minWidth: 150,
                    dataType: "string",
                    align: "left",
                    dataIndx: "sohuu",
                    editable: true,
                },
                {
                    title: "Ngày SX",
                    minWidth: 150,
                    dataType: "date",
                    align: "left",
                    dataIndx: "ngaysx",
                    editable: true,
                    render: function (ui) {
                        var $yyyy_mm_dd = ui.rowData.ngaysx;
                        return Format_dd_mm_yyyy($yyyy_mm_dd);
                    },
                    editor: {
                        type: 'date'
                    },
                },
                {
                    title: "Ngày SD",
                    minWidth: 150,
                    dataType: "date",
                    align: "left",
                    dataIndx: "ngaysd",
                    editable: true,
                    render: function (ui) {
                        var $yyyy_mm_dd = ui.rowData.ngaysd;
                        return Format_dd_mm_yyyy($yyyy_mm_dd);
                    },
                    editor: {
                        type: 'date'
                    },
                },
                {
                    title: "Ngày giảm TS",
                    minWidth: 150,
                    dataType: "date",
                    align: "left",
                    dataIndx: "ngaygiam",
                    editable: true,
                    render: function (ui) {
                        var $yyyy_mm_dd = ui.rowData.ngaygiam;
                        return Format_dd_mm_yyyy($yyyy_mm_dd);
                    },
                    editor: {
                        type: 'date'
                    },
                },
                {
                    title: "Mã TK giảm", minWidth: 100, dataType: "string", dataIndx: "matkgiam", editable: true,
                    validations: [
                        {
                            type: function (ui) {
                                var value = ui.value,
                                    _found = false, sott = ui.rowData.sott;

                                if (value != "") {
                                    $.ajax({
                                        url: $dir_module_httk + "checkkey.php",
                                        data: {'id': value},
                                        async: false,
                                        success: function (response) {
                                            if (response == 1) {
                                                _found = true;
                                            }
                                        }
                                    });
                                    if (_found) {
                                        //ui.msg = value + " đã tồn tại trong hệ thống";
                                        // return false;
                                    } else {
                                        ui.msg = value + " không tồn tại trông hệ thống tài khoản !";
                                        return false;
                                    }
                                }
                            }
                        }
                        ,
                    ]
                },

                {
                    title: "Chú thích", minWidth: 150, dataType: "string", align: "left", dataIndx: "chuthich",
                    editor: {type: "textarea", attr: "rows=3"}
                }
            ],//-----------------------------------------Kết thúc các cột--------------------------------
            pageModel: { type: "local", rPP: 200, strRpp: "{0}", strDisplay: "{0} đến {1} của {2}" },
			dataModel: {
                dataType: "JSON",
                location: "remote",
                recIndx: "sott",
                url: $dir_module_mataisan + "listallmats.php",//-- Load danh sách lên lưới
                getData: function (dataJSON) {
                    var data = dataJSON.data;
                    //console.log(data);
                    return {curPage: dataJSON.curPage, totalRecords: dataJSON.totalRecords, data: data};
                }
            }
        };
        var $grid = $("#grid_editing_mats").pqGrid(obj);
        $grid.one("pqgridload", function (evt, ui) {
            //var column = $grid.pqGrid("getColumn", { dataIndx:"manhom" });
            //var filter = column.filter;
            //filter.cache = null;
            //filter.options = $grid.pqGrid("getData", { dataIndx: ["tennhom","manhom"] });// lấy 1 hoặc nhiều dataindex
            //$grid.pqGrid("refreshHeader");
        });
        //use refresh & refreshRow events to display jQueryUI buttons and bind events.
        $grid.on('pqgridrefresh pqgridrefreshrow', function () {
            //debugger;
            var $grid = $(this);
            //delete button
            $grid.find("button.delete_btn").button({icons: {primary: 'ui-icon-close'}})
                .unbind("click")
                .bind("click", function (evt) {
                    if (isEditing($grid)) {
                        return false;
                    }
                    var $tr = $(this).closest("tr"),
                        rowIndx = $grid.pqGrid("getRowIndx", {$tr: $tr}).rowIndx;
                    deleteRow(rowIndx, $grid);
                });
            //edit button
            $grid.find("button.edit_btn").button({icons: {primary: 'ui-icon-pencil'}})
                .unbind("click")
                .bind("click", function (evt) {
                    if (isEditing($grid)) {
                        return false;
                    }
                    var $tr = $(this).closest("tr"),
                        rowIndx = $grid.pqGrid("getRowIndx", {$tr: $tr}).rowIndx;

                    editRow(rowIndx, $grid);
                    return false;
                });

            //rows which were in edit mode before refresh, put them in edit mode again.
            var rows = $grid.pqGrid("getRowsByClass", {cls: 'pq-row-edit'});
            if (rows.length > 0) {
                var rowIndx = rows[0].rowIndx;
                editRow(rowIndx, $grid);
            }
        });
        function getRowSelect() { // --------------------Lấy dữ liệu theo dòng trên gird----------------------                 
            var arr = $("#grid_editing_mats").pqGrid("selection", {
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
            isEdit = $("#grid_editing_mats").pqGrid("isDirty"); //Lấy giá trị đang chọn

            return isEdit;
        }

        setTimeout(function () {
            $("#grid_editing_mats .pq-search-hd-field").focus();
        }, 100);
        //-----------------------------Hết lưới---------------------------------------------------------------------

    });
</script>
<div id="dialog-mataisan" title="Danh sách tài sản cố định... (ENTER: Sửa và Lưu, F4: Thêm, F7: Sao chép ,F8 : Xóa , ESC : Thoát )"><!-- dialog -->
    <div id="grid_editing_mats" style="margin:5px auto;border: 0px !important;"></div>
</div>