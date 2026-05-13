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
</style>
<script>
    $height = getHeight();
    $width = getWidth() - 50;
    $(function () {
        var $dir_module_vonchusohuu = "";
        $dir_module_vonchusohuu = "modules/vonchusohuu/";//----------------Lưới
        $dir_module_httk = "modules/httk/";//--------------------------------------------Thay đổi khi copy
        $dir_module_mabophan = "modules/mabp/";//--------------------------------------------Thay đổi khi copy
        $dir_module_manhomts = "modules/manhomvattu/";//--------------------------------------------Thay đổi khi copy
        $dir_module_makhachhang = "modules/makhachhang/";//
        {
            var $listmakhachhang = "";// Danh sách khách hàng

            $.ajax({// Load danh sách mã khách hàng
                url: $dir_module_makhachhang + "listall.php",
                async: false,
                dataType: "json",
                success: function (response) {

                    $array = (response);
                    // var js_arr = response.js_arr;
                    for (var i = 0; i < $array.length; i++) {
                        //alert($array[i].makh);
                        $listmakhachhang += '<option value=' + $array[i].makh + '>' + $array[i].masothue + '-' + bodauTiengViet($array[i].tenkh) + '</option>';
                    }
                }
            });

            $("#listmakhachhang").html($listmakhachhang);
        }
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
                        colM[1].editable = true;
                        $("#grid_editing_mats").pqGrid("option", "colModel", colM);
                        addRow(rowIndx,'mats',$grid_pb,"");
                    }else {
                        var rowIndx = rowSelect[0].rowIndx;
                        var rowData = rowSelect[0].rowData;
                        var colM = $("#grid_editing_mats").pqGrid("option", "colModel");
                        colM[1].editable = true;
                        $("#grid_editing_mats").pqGrid("option", "colModel", colM);
                        var _dataRow = {
                            mapsvoncsh: "",
                            makh: "",
                            vondieule: "",
                            vongop: "",
                            vondieuletrongky:"0",
                            vongoptrongky:"0",
                            tanggiam: "0"
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
                        colM[1].editable = true;
                        $("#grid_editing_mats").pqGrid("option", "colModel", colM);
                        //--------------------------------------------Thay đổi khi copy---------------------------------
                        var _dataRow = {
                            mapsvoncsh: rowData.mapsvoncsh,
                            makh: rowData.makh,
                            vondieule: rowData.vondieule,
                            vongop: rowData.vongop,
                            vondieuletrongky:rowData.vondieuletrongky,
                            vongoptrongky:rowData.vongoptrongky,
                            tanggiam: rowData.tanggiam
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
                    url: $dir_module_vonchusohuu+"taomapsts.php",
                    async: false,
                    data:{
                        tanggiam:"0"
                    },
                    success: function (response) {
                        $ma = response;
                    }
                });
                var rowData =$obj_addrow;
            }else{
                $.ajax({
                    url: $dir_module_vonchusohuu+"taomapsts.php",
                    async: false,
                    data:{
                        tanggiam:"0"
                    },
                    success: function (response) {
                        $ma = response;
                    }
                });
                var rowData = {
                    mapsvoncsh:"",
                    makh: "",
                    vondieule: "0",
                    vongop: "0",
                    tanggiam: "0",
                    vondieuletrongky:"0",
                    vongoptrongky:"0"
                }; //empty row template
            }
            rowData.mapsvoncsh = $ma;
            if(typeof rowIndx == 'undefined')
                rowIndx=0;
            $grid.pqGrid("addRow", { rowIndx: rowIndx, rowData: rowData });

            $grid.pqGrid("setSelection", { rowIndx: rowIndx, dataIndx: $name});
            $grid.pqGrid("editFirstCellInRow", { rowIndx: (rowIndx) });
        }

        //----------------------------Hàm xóa dữ kiệu------------------------------------------
        function deleteRow(rowData, $grid) {
            var rowData = rowData;
            var ma = rowData.mapsvoncsh;
            var loaiphieu = "0";
            if ($('div').hasClass('jconfirm') == false) {
                $.confirm({
                    title: "Chú ý", icon: "fa fa-times-circle", type: "red",
                    content: "Bạn có muốn xóa hàng có mã " + (ma) + "  không ?" + '<br/>Nhấn phím <strong style="color:blue;">[Y]</strong> để đồng ý phím <strong style="color:red;">[N]</strong> để hủy bỏ ',
                    buttons: {
                        "Đồng ý": {
                            keys: ['Y'], action: function () {


                                $.ajax($.extend({}, ajaxObj, {
                                    context: $grid,
                                    url: $dir_module_vonchusohuu + "del_phieu.php",
                                    data: {loaiphieu: loaiphieu, sophieu: ma},
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
                    url = $dir_module_vonchusohuu + "add.php";
                }
                else {
                    //url to  update records.
                    url = $dir_module_vonchusohuu + "edit.php";
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
            hwrap: true,
            resizable: true,
            rowBorders: true,
            virtualX: true,
            virtualY: true,
            height: $height - 65,
            width: $width - 30,
            freezeCols:3,
            numberCell: {show: true},
            filterModel: {on: true, mode: "AND", header: true},
            trackModel: {on: true}, //to turn on the track changes.
            scrollModel: {
                //autoFit: true
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
                if(type=="add"){
                    rowData=obj.newRow;
                }
                $vondieule = parseInt(rowData.vondieule);
                $vongop = parseInt(rowData.vongop);
                $vondieuletrongky = parseInt(rowData.vondieuletrongky);
                $vongoptrongky = parseInt(rowData.vongoptrongky);

                $vonchuagop =($vondieule+$vondieuletrongky)-($vongop+$vongoptrongky);

                rowData.vonchuagop = $vonchuagop;
                var url = "";
                if (type == 'update') {
                    var valid = grid.isValid({rowData: rowData, allowInvalid: true}).valid;
                    if (valid) {
                        if (rowData[recIndx] == null) {
                            url = $dir_module_vonchusohuu + "addpsts.php";
                        }
                        else {
                            url = $dir_module_vonchusohuu + "editpsts.php";
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
                            $grid.pqGrid("refreshColumn", {rowIndx: 5});
                        },
                    });
                }
            },
            colModel: [//-------------------------------------------Khai báo các cột trong lưới-----------------------
                {title: "SoTT", dataType: "integer", dataIndx: "sott", editable: false, width: 0, hidden: true},
                {title: "Mã PS ", dataType: "integer", dataIndx: "mapsvoncsh", editable: false, width: 0, hidden: true},
                {
                    title: "Tên sáng lập viên", minWidth: 200, dataType: "string", dataIndx: "makh",
                    validations: [
                        {
                            type: function (ui) {
                                isEdit = isEditCell();
                                if (isEdit) {

                                    var value = ui.value,
                                        _found = false, sott = ui.rowData.sott;
                                    if (value != "") {
                                        //remote validation
                                        $.ajax({
                                            url: $dir_module_makhachhang + "checkkeycha.php",
                                            data: {'id': value, 'sott': sott},
                                            async: false,
                                            success: function (response) {
                                                if (response == 1) {
                                                    _found = true;
                                                }
                                            }
                                        });
                                        if (_found) {
                                            window.open("form/frm_dm_makh_window.php?id=idlistmakhachhang", "makhachhang_window", "location=1,status=1,scrollbars=1, width=" + $width + ",height=" + $height);
                                            return false;
                                        }
                                    }
                                }
                            }
                        },
                        {type: 'minLen', value: 1, msg: "Không được trống  !"},
                    ],
                    editor: {
                        type: "textbox",
                        cls: "listmakhachhang",
                        attr: "list='listmakhachhang' id='idlistmakhachhang'"
                    },
                    render: function (ui) {
                        isEdit = isEditCell();
                        if (isEdit) {
                            var $ma = ui.rowData.makh;
                            var $ten = "abc";// Danh sách khách hàng
                            $.ajax({// Load danh sách mã khách hàng
                                url: $dir_module_makhachhang + "gettentheo_table.php",
                                async: false,
                                data: {ma: $ma, table: "makh", columw: "makh", columget: "tenkh"},
                                success: function (response) {
                                    $ten = response;
                                }
                            });
                            return $ten;
                        } else {
                            var $tennhom = ui.rowData.tenkh;
                            return $tennhom;
                        }
                    },
                    filter: { type: 'textbox', condition: "begin", listeners: ['keyup'] }
                },
                {
                    title: "Vốn điều lệ đầu kỳ",
                    dataType: "string",
                    dataIndx: "vondieule",
                    minWidth: 110,
                    sortable: true,
                    editable: true,
                    align: "right",
                    validations: [
                        {type: 'minLen', value: 1, msg: "Vốn điều lệ không được trống  !"},
                    ],
                    render: function (ui) {
                        var $val = ui.rowData.vondieule;
                        return $.number($val,0,".",",");
                    },
                    editor:{
                        type:"number"
                    },
                },
                {
                    title: "Vốn điều lệ đầu kỳ (USD)",
                    dataType: "string",
                    dataIndx: "vondieuleusd",
                    minWidth: 110,
                    sortable: true,
                    editable: true,
                    align: "right",
                    validations: [
                        {type: 'minLen', value: 1, msg: "Vốn điều lệ không được trống  !"},
                    ],
                    render: function (ui) {
                        var $val = ui.rowData.vondieuleusd;
                        return $.number($val,0,".",",");
                    },
                    editor:{
                        type:"number"
                    }
                },
                {
                    title: "Tăng/Giảm vốn điều lệ", minWidth: 110, dataType: "string", dataIndx: "vondieuletrongky", editable: true,align: "right",
                    validations: [
                        {type: 'minLen', value: 1, msg: "Không được trống  !"},
                    ],
                    render: function (ui) {
                        var $val = ui.rowData.vondieuletrongky;
                        return $.number($val,0,".",",");
                    },

                },
                {
                    title: "Tăng/Giảm vốn điều lệ (USD)", minWidth: 110, dataType: "string", dataIndx: "vondieuletrongkyusd", editable: true,align: "right",
                    validations: [
                        {type: 'minLen', value: 1, msg: "Không được trống  !"},
                    ],
                    render: function (ui) {
                        var $val = ui.rowData.vondieuletrongkyusd;
                        return $.number($val,0,".",",");
                    },

                },
                {
                    title: "Tổng vốn điều lệ", minWidth: 120, dataType: "string", dataIndx: "tongdl", editable: false,align: "right",
                    render: function (ui) {
                        var $val = parseInt(ui.rowData.vondieuletrongky)+parseInt(ui.rowData.vondieule);
                        return $.number($val,0,".",",");
                    },

                },
                {
                    title: "Tổng vốn điều lệ (USD)", minWidth: 120, dataType: "string", dataIndx: "tongdl", editable: false,align: "right",
                    render: function (ui) {
                        var $val = parseInt(ui.rowData.vondieuletrongkyusd)+parseInt(ui.rowData.vondieuleusd);
                        return $.number($val,0,".",",");
                    },

                },

                {
                    title: "Tỷ lệ", minWidth: 80, dataType: "string", align: "center", dataIndx: "tyle", editable: false,
                    render: function (ui) {
                        var $vondieule=0;
                        var $vondieuletrongky=0;
                        $TyLe=0;
                        $TongVonDieuLe=0;
                        $TongVonDieuLeTrongKy=0;
                         $vondieule = parseInt(ui.rowData.vondieule);
                         $vondieuletrongky = parseInt(ui.rowData.vondieuletrongky);

                        arrayData = tongtiendauky();
                        $TongVonDieuLe = parseInt(arrayData.data.TongVonDieuLe);

                        $TongVonDieuLeTrongKy = parseInt(arrayData.data.TongVonDieuLeTrongKy);
                        $TyLe = (((($vondieule+$vondieuletrongky)/($TongVonDieuLe+$TongVonDieuLeTrongKy))*100)).toFixed(2);
                        return $TyLe+"%";
                    },
                },
                {
                    title: "Vốn đã góp đầu kỳ", minWidth: 110, dataType: "string", align: "right", dataIndx: "vongop", editable: true,
                    validations: [
                        {type: 'minLen', value: 1, msg: "Vốn góp đầu kỳ không được trống !"},
                    ],
                    render: function (ui) {
                        var $val = ui.rowData.vongop;
                        return $.number($val,0,".",",");
                    },
                    editor:{
                        type:"number"
                    }
                },
                {
                    title: "Vốn đã góp đầu kỳ (USD)", minWidth: 110, dataType: "string", align: "right", dataIndx: "vongopusd", editable: true,
                    validations: [
                        {type: 'minLen', value: 1, msg: "Vốn góp đầu kỳ không được trống !"},
                    ],
                    render: function (ui) {
                        var $val = ui.rowData.vongopusd;
                        return $.number($val,0,".",",");
                    },
                    editor:{
                        type:"number"
                    }
                },
                {
                    title: "Tăng/Giảm vốn trong kỳ",
                    minWidth: 110,
                    align: "right",
                    dataIndx: "vongoptrongky",
                    editable: true,
                    render: function (ui) {
                        var $val = ui.rowData.vongoptrongky;
                        return $.number($val,0,".",",");
                    },
                    editor:{
                        type:"number"
                    },
                    validations: [
                        {type: 'minLen', value: 1, msg: "Không được trống  !"},
                    ],
                },
                {
                    title: "Tăng/Giảm vốn trong kỳ (USD)",
                    minWidth: 110,
                    align: "right",
                    dataIndx: "vongoptrongkyusd",
                    editable: true,
                    render: function (ui) {
                        var $val = ui.rowData.vongoptrongkyusd;
                        return $.number($val,0,".",",");
                    },
                    editor:{
                        type:"number"
                    },
                    validations: [
                        {type: 'minLen', value: 1, msg: "Không được trống  !"},
                    ],
                },
                {
                    title: "Tổng vốn đã góp", minWidth: 120, dataType: "string", dataIndx: "tongdg", editable: false,align: "right",
                    render: function (ui) {
                        var $val = parseInt(ui.rowData.vongoptrongky)+parseInt(ui.rowData.vongop);
                        return $.number($val,0,".",",");
                    },

                },
                {
                    title: "Tổng vốn đã góp (USD)", minWidth: 120, dataType: "string", dataIndx: "tongdg", editable: false,align: "right",
                    render: function (ui) {
                        var $val = parseInt(ui.rowData.vongoptrongkyusd)+parseInt(ui.rowData.vongopusd);
                        return $.number($val,0,".",",");
                    },

                },
                {
                    title: "Vốn chưa góp", minWidth: 150, dataType: "string", align: "right", dataIndx: "vonchuagop", editable: false,
                    render: function (ui) {
                        var $val = ui.rowData.vonchuagop;
                        return $.number($val,0,".",",");
                    },
                },
                {
                    title: "Vốn chưa góp (USD)", minWidth: 150, dataType: "string", align: "right", dataIndx: "vonchuagopusd", editable: false,
                    render: function (ui) {
                        var $val = ui.rowData.vonchuagopusd;
                        return $.number($val,0,".",",");
                    },
                }
            ],//-----------------------------------------Kết thúc các cột--------------------------------
            pageModel: { type: "local", rPP: 20, strRpp: "{0}", strDisplay: "{0} đến {1} của {2}" },
			dataModel: {
                dataType: "JSON",
                location: "remote",
                recIndx: "sott",
                postData: {loaiphieu:<?php echo '0'; ?>},
                url: $dir_module_vonchusohuu + "list_tanggiam.php",//-- Load danh sách lên lưới
                getData: function (dataJSON) {
                    var data = dataJSON.data;
                    //console.log(data);
                    return {curPage: dataJSON.curPage, totalRecords: dataJSON.totalRecords, data: data};
                }
            }
        };
        function calculateSummary() {
            arrayData = tongtiendauky();
            $TongVonDieuLe = arrayData.data.TongVonDieuLe;
            $TongVonGop = arrayData.data.TongVonGop;
            $TongVonDieuLeTrongKy = arrayData.data.TongVonDieuLeTrongKy;
            $TongVonGopTrongKy = arrayData.data.TongVonGopTrongKy;
            $TongVonChuaGop = arrayData.data.TongVonChuaGop;
            totalData = { makh: "<b>TỔNG CỘNG</b>", vondieule: $TongVonDieuLe, vongop: $TongVonGop,vondieuletrongky:$TongVonDieuLeTrongKy,vongoptrongky:$TongVonGopTrongKy,vonchuagop:$TongVonChuaGop,tyle:"100%", pq_rowcls: 'green' };
        }
        var $summary = "";

        obj.render = function (evt, ui) {
            $summary = $("<div class='pq-grid-summary'  ></div>")
                .prependTo($(".pq-grid-bottom", this));
            calculateSummary();
        }

        obj.cellSave = function (evt, ui) {
            calculateSummary();
            obj.refresh.call(this);
        }

        obj.refresh = function (evt, ui) {
            var data = [totalData]; //JSON (array of objects)
            var obj = { data: data, $cont: $summary }
            $(this).pqGrid("createTable", obj);
        }
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
        function tongtiendauky() {
            $data=""
            $.ajax({// Kiểm tra xem STT có tồn tại hay không
                url: $dir_module_vonchusohuu + "tongtiendauky.php",
                async: false,
                data:{tanggiam:"0"},
                success: function (response) {
                    $data = $.parseJSON(response);
                }
            });
            return $data;
        }
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
<div id="dialog-dm_cptratruoc" title="SỐ DƯ CHI TIẾT VỐN CHỦ SỞ HỮU... (ENTER: Sửa và Lưu, F4: Thêm, F7: Sao chép ,F8 : Xóa , ESC : Thoát )"><!-- dialog -->
    <div id="grid_editing_mats" style="margin:5px auto;border: 0px !important;"></div>
    <datalist id="listmakhachhang"></datalist>
</div>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                         