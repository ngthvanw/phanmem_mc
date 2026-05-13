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
    $height = getHeight();
    $width = getWidth() - 50;
    $(function () {
        var $dir_module_mataisan = "";
        $dir_module_mataisan = "modules/danhmuccptratruoc/";//--------------------------------------------Thay đổi khi copy
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
            var rowEditting = $("#grid_editing_mats").pqGrid("getRowsByClass", {cls: 'pq-row-edit'});//---Lấy đối tượng đang sửa
            if ($('div').hasClass('jconfirm') == false) {
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
                autoFit: false
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
                            url = $dir_module_mataisan + "editmats_sanluong.php";
                        }
                        else {
                            url = $dir_module_mataisan + "editmats_sanluong.php";
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
                            //$(".ui-state-highlight").focus();
                        },
                    });
                }
            },
            colModel: [//-------------------------------------------Khai báo các cột trong lưới-----------------------
                { title: "Lưu", dataType: "integer", dataIndx: "sott", editable: false, width: 10, hidden:false,align: "center",
                    render: function (ui) {
                        var $val  = ui.rowData.sott;
                        if($val==0 || $val=="" || typeof $val == 'undefined'){
                            return "<img src='icon/uncheck.png' width='20px'/>";
                        } else {
                            return "<img src='icon/check.png' width='20px' />";
                        }
                    }
                },
                {
                    title: "Mã CP",
                    dataType: "string",
                    dataIndx: "mats",
                    minWidth: 100,
                    sortable: true,
                    editable: false,
                    filter: {
                        type: 'textbox',
                        condition: 'begin',
                        listeners: ['keyup']
                    }
                },
                {
                    title: "Tên CP", minWidth: 200, dataType: "string", dataIndx: "tents", editable: false,
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
                    title: "Mã CP Cha",
                    dataType: "string",
                    dataIndx: "matscha",
                    minWidth: 100,
                    sortable: true,
                    editable: false,
                    filter: {
                        type: 'textbox',
                        condition: 'begin',
                        listeners: ['keyup']
                    }
                },
                {
                    title: "Tổng cộng",
                    minWidth: 100,
                    dataType: "string",
                    align: "right",
                    editable: false,
                    dataIndx: "tongcong",
                    render: function (ui) {
                        var thang1 = parseFloat(ui.rowData.thang1);
                        var thang2 = parseFloat(ui.rowData.thang2);
                        var thang3 = parseFloat(ui.rowData.thang3);
                        var thang4 = parseFloat(ui.rowData.thang4);
                        var thang5 = parseFloat(ui.rowData.thang5);
                        var thang6 = parseFloat(ui.rowData.thang6);
                        var thang7 = parseFloat(ui.rowData.thang7);
                        var thang8 = parseFloat(ui.rowData.thang8);
                        var thang9 =parseFloat( ui.rowData.thang9);
                        var thang10 =parseFloat( ui.rowData.thang10);
                        var thang11 = parseFloat(ui.rowData.thang11);
                        var thang12 = parseFloat(ui.rowData.thang12);
                        $tong = (thang1)+(thang2)+(thang3)+(thang4)+(thang5)+(thang6)+(thang7)+(thang8)+(thang9)+(thang10)+(thang11)+(thang12);
                        return NB_Format($tong);
                    },
                },
                {
                    title: "Tháng 1", width: 80, dataType: "string", align: "right", dataIndx: "thang1",
                    editor: {
                        type: "number"
                    },
                    render: function (ui) {
                        $val = ui.rowData.thang1;
                        return NB_Format($val);
                    }
                },
                {
                    title: "Tháng 2", width: 80, dataType: "string", align: "right", dataIndx: "thang2",
                    editor: {
                        type: "number"
                    },
                    render: function (ui) {
                        $val = ui.rowData.thang2;
                        return NB_Format($val);
                    }
                },{
                    title: "Tháng 3", width: 80, dataType: "string", align: "right", dataIndx: "thang3",
                    editor: {
                        type: "number"
                    },
                    render: function (ui) {
                        $val = ui.rowData.thang3;
                        return NB_Format($val);
                    }
                },{
                    title: "Tháng 4", width: 80, dataType: "string", align: "right", dataIndx: "thang4",
                    editor: {
                        type: "number"
                    },
                    render: function (ui) {
                        $val = ui.rowData.thang4;
                        return NB_Format($val);
                    }
                },{
                    title: "Tháng 5", width: 80, dataType: "string", align: "right", dataIndx: "thang5",
                    editor: {
                        type: "number"
                    },
                    render: function (ui) {
                        $val = ui.rowData.thang5;
                        return NB_Format($val);
                    }
                },{
                    title: "Tháng 6", width: 80, dataType: "string", align: "right", dataIndx: "thang6",
                    editor: {
                        type: "number"
                    },
                    render: function (ui) {
                        $val = ui.rowData.thang6;
                        return NB_Format($val);
                    }
                },{
                    title: "Tháng 7", width: 80, dataType: "string", align: "right", dataIndx: "thang7",
                    editor: {
                        type: "number"
                    },
                    render: function (ui) {
                        $val = ui.rowData.thang7;
                        return NB_Format($val);
                    }
                },{
                    title: "Tháng 8", width: 80, dataType: "string", align: "right", dataIndx: "thang8",
                    editor: {
                        type: "number"
                    },
                    render: function (ui) {
                        $val = ui.rowData.thang8;
                        return NB_Format($val);
                    }
                },{
                    title: "Tháng 9", width: 80, dataType: "string", align: "right", dataIndx: "thang9",
                    editor: {
                        type: "number"
                    },
                    render: function (ui) {
                        $val = ui.rowData.thang9;
                        return NB_Format($val);
                    }
                },{
                    title: "Tháng 10", width: 80, dataType: "string", align: "right", dataIndx: "thang10",
                    editor: {
                        type: "number"
                    },
                    render: function (ui) {
                        $val = ui.rowData.thang10;
                        return NB_Format($val);
                    }
                },{
                    title: "Tháng 11", width: 80, dataType: "string", align: "right", dataIndx: "thang11",
                    editor: {
                        type: "number"
                    },
                    render: function (ui) {
                        $val = ui.rowData.thang11;
                        return NB_Format($val);
                    }
                },{
                    title: "Tháng 12", width: 80, dataType: "string", align: "right", dataIndx: "thang12",
                    editor: {
                        type: "number"
                    },
                    render: function (ui) {
                        $val = ui.rowData.thang12;
                        return NB_Format($val);
                    }
                }
            ],//-----------------------------------------Kết thúc các cột--------------------------------
            pageModel: { type: "local", rPP: 200, strRpp: "{0}", strDisplay: "{0} đến {1} của {2}" },
			dataModel: {
                dataType: "JSON",
                location: "remote",
                recIndx: "sott",
                url: $dir_module_mataisan + "listallmats_sanluong.php",//-- Load danh sách lên lưới
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
<div id="dialog-mataisan" title="DANH SÁCH CÔNG CỤ PHÂN BỔ THEO SẢN LƯỢNG(ENTER: Sửa,ESC : Thoát )"><!-- dialog -->
    <div id="grid_editing_mats" style="margin:5px auto;border: 0px !important;"></div>
</div>