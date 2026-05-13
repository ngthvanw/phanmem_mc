<?php
$loai = $_GET['loai'];
if($loai=="xdcb"){
	$LOAI = "XD";
    $ten="DANH SÁCH XÂY DỰNG CƠ BẢN DỞ DANG";
}else{
	$LOAI = "CP";
    $ten="DANH SÁCH CHI PHÍ TRẢ TRƯỚC";
}
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
        var $dir_module_danhmuccptratruoc = "";
        $dir_module_danhmuccptratruoc = "modules/danhmuccptratruoc/";//--------------------------------------------Thay đổi khi copy
        $dir_module_httk = "modules/httk/";//--------------------------------------------Thay đổi khi copy
        $dir_module_mabophan = "modules/mabp/";//--------------------------------------------Thay đổi khi copy
        $dir_module_manhomts = "modules/manhomvattu/";//--------------------------------------------Thay đổi khi copy
        function xoadialog_danhsach_taisan() { // ----------------------đóng form
            reset_dialog(".dialog-dm_cptratruoc");
            reset_dialog(".dialog_main_danhmuc_cptratruoc");
            $("#mataisan").focus();
        }

        $("#dialog-dm_cptratruoc").dialog({ // ------------------Gọi dialog
            resizable: false,
            height: $height,
            width: $width,
            modal: true

        });
        $("#dialog-dm_cptratruoc").keydown(function (event) {//--------------Các phím tắt
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
                        colM[3].editable = true;
                        $("#grid_editing_mats").pqGrid("option", "colModel", colM);
                        addRow(rowIndx,'mats',$grid_pb,"");
                    }else {
                        var rowIndx = rowSelect[0].rowIndx;
                        var rowData = rowSelect[0].rowData;
                        var colM = $("#grid_editing_mats").pqGrid("option", "colModel");
                        colM[3].editable = true;
                        $("#grid_editing_mats").pqGrid("option", "colModel", colM);
                        var _dataRow = {
                            mats: "",
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
                            khauhao:"1",
                            theodoi:1,
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
                        colM[3].editable = true;
                        $("#grid_editing_mats").pqGrid("option", "colModel", colM);
                        //--------------------------------------------Thay đổi khi copy---------------------------------
                        var _dataRow = {
                            mats: rowData.mats,
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
                            khauhao:1,
                            theodoi:1,
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
                    $sott = rowSelect[0].rowData.sott;
                    if($sott==0 || $sott=="" || typeof $sott == 'undefined'){
                        alert("Dữ liệu này chưa được lưu, vui lòng lưu dữ liệu trước khi chọn ! ");
                        return false;
                    }
                    $("#mataisan").val(rowData.mats);
                    $("#tentaisan").val(rowData.tents);
                    $("#NhomTS").val(rowData.manhomts);
                    $("#donvitinh").val(rowData.dvt);
                    $("#ngaysudung").val(rowData.ngaysd);
                    $("#tkno").val(rowData.matk);
                    $("#soluong").focus();
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
                    url: $dir_module_danhmuccptratruoc+"taoma.php",
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
                    url: $dir_module_danhmuccptratruoc+"taoma.php",
                    async: false,
                    data:{
                        makhcha:"0",
						loai:'<?php echo $LOAI; ?>'
                    },
                    success: function (response) {
                        $ma = response;
                    }
                });
                var rowData = {
                    mats: "",
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
                    khauhao:1,
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
                                    url: $dir_module_danhmuccptratruoc + "delmats.php",
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
                    url = $dir_module_danhmuccptratruoc + "add.php";
                }
                else {
                    //url to  update records.
                    url = $dir_module_danhmuccptratruoc + "edit.php";
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
            numberCell: {show: true},
            filterModel: {on: true, mode: "AND", header: true},
            trackModel: {on: true}, //to turn on the track changes.
            scrollModel: {
                autoFit: true
            },
            historyModel: {
                checkEditableAdd: true
            },
            freezeCols: 4,
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
                            url = $dir_module_danhmuccptratruoc + "addmats.php";
                        }
                        else {
                            url = $dir_module_danhmuccptratruoc + "editmats.php";
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
                { title: "Lưu", dataType: "integer", dataIndx: "sott", editable: false, width: 10, hidden:false,align: "center",
                    render: function (ui) {
                        var $val  = ui.rowData.sott;
                        var rowIndx  = ui.rowIndx;
                        if($val==0 || $val=="" || typeof $val == 'undefined'){
                            return "<img src='icon/uncheck.png' width='20px'/>";
                        } else {
                            return "<img src='icon/check.png' width='20px' />";
                        }						
                    },},
                {
                    title: "Phân bổ", minWidth: 60, dataType: "integer", align: "center", dataIndx: "khauhao",hidden:false,
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
                    title: "Theo dõi", minWidth: 60, dataType: "integer", align: "center", dataIndx: "theodoi",
                    editor: {type: "select",options: function (ui) {
                            //remote validation
                            var parsedJson = [ { 0:"KHÔNG"}, {1: "CÓ"}] ;
                            return parsedJson;
                        }},
                    render: function (ui) {
                        var value = ui.rowData.theodoi;
                        if (value == 1) {
                            return "CÓ";
                        } else {
                            return "KHÔNG";
                        }
                    }
                },
                {
                    title: "Mã",
                    dataType: "string",
                    dataIndx: "mats",
                    minWidth: 100,
                    sortable: true,
                    editable: false,
                    validations: [
                        {type: 'minLen', value: 1, msg: "Mã phải có 1 đến 14 ký tự  !"},
                        {type: 'maxLen', value: 14, msg: "Mã phải có 1 đến 14 ký tự !"},
                        {
                            type: function (ui) {
                                isEdit = isEditCell();
                                if (isEdit) {
                                    var value = ui.value,
                                        _found = false, sott = ui.rowData.sott;
                                    //remote validation
                                    $.ajax({
                                        url: $dir_module_danhmuccptratruoc + "checkkey_mataisan.php",
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
                    title: "Tên", minWidth: 200, dataType: "string", dataIndx: "tents", editable: true,
                    validations: [
                        {type: 'minLen', value: 1, msg: "Tên không được trống !"}
                    ],
                    filter: {
                        type: 'textbox',
                        condition: 'begin',
                        listeners: ['keyup']
                    },
					editor: {type: "textarea", attr: "rows=3"}
                },
                {
                    title: "Mã Cha",
                    dataType: "string",
                    dataIndx: "matscha",
                    minWidth: 100,
                    sortable: true,
                    editable: true,
                    validations: [
                        {type: 'minLen', value: 1, msg: "Mã phải có  1 đến 14 ký tự  !"},
                        {type: 'maxLen', value: 14, msg: "Mã phải có 1 đến 14 ký tự !"},
                        {
                            type: function (ui) {
                                isEdit = isEditCell();
                                if (isEdit) {
                                    var value = ui.value,
                                        _found = false, sott = ui.rowData.sott;
                                    //remote validation
                                    $.ajax({
                                        url: $dir_module_danhmuccptratruoc + "checkkey_mataisan_cha.php",
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
                                data:{ma:'154,241,242,421,611,621,622,623,627,631,632,635,641,642,811'},
                                success: function (response) {
                                    parsedJson = $.parseJSON(response);
                                }
                            });
                            return parsedJson;
                        }},
                },
                {
                    title: "ĐVT", minWidth: 100, dataType: "string", align: "center", dataIndx: "dvt", editable: true,
                    validations: [
                        {type: 'minLen', value: 1, msg: "Đơn vị tính không được trống !"},
                    ]
                },
                {
                    title: "Nhóm", minWidth: 100, dataType: "string", align: "left", dataIndx: "manhomts", editable: true,
                    validations: [
                        {type: 'minLen', value: 1, msg: "Đơn vị tính không được trống !"},
                    ],
                    editor: {type: "select",options: function (ui) {
                            <?php
                            if($loai=="xdcb"){
                            ?>
                            var parsedJson = [{"1536": "Xây dựng cơ bản"}] ;
                            <?php
                            }else{
                            ?>
                            var parsedJson = [ { "1531":"Công cụ dụng cụ"}, {"1535": "Chi phí trả trước"}] ;
                            <?php
                            }
                            ?>
                        return parsedJson;
                    }},
                    render: function (ui) {{
                        var parsedJson = [ { "id":"1531","name":"Công cụ dụng cụ"}, {"id":"1535","name":"Chi phí trả trước"}, {"id":"1536","name":"Xây dựng cơ bản"}] ;
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
                    title: "Ngày SD",
                    minWidth: 120,
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
                    title: "Chú thích", minWidth: 150, dataType: "string", align: "left", dataIndx: "chuthich",
                    editor: {type: "textarea", attr: "rows=3"}
                }
            ],//-----------------------------------------Kết thúc các cột--------------------------------
            pageModel: { type: "local", rPP: 200, strRpp: "{0}", strDisplay: "{0} đến {1} của {2}" },
			dataModel: {
                dataType: "JSON",
                location: "remote",
                recIndx: "sott",
                url: $dir_module_danhmuccptratruoc + "listallmats.php?loai=<?php echo $loai; ?>",//-- Load danh sách lên lưới
                getData: function (dataJSON) {
                    var data = dataJSON.data;
                    //console.log(data);
                    return {curPage: dataJSON.curPage, totalRecords: dataJSON.totalRecords, data: data};
                }
            }
        };
        var $grid = $("#grid_editing_mats").pqGrid(obj);
        $grid.one("pqgridload", function (evt, ui) {
			$("#grid_editing_mats .pq-search-hd-field[name='tents']").focus();
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
<div id="dialog-dm_cptratruoc" title="<?php echo $ten; ?> (ENTER: Sửa và Lưu, F4: Thêm, F7: Sao chép ,F8 : Xóa , ESC : Thoát )"><!-- dialog -->
    <div id="grid_editing_mats" style="margin:5px auto;border: 0px !important;"></div>
</div>