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

    .ui-tabs .ui-tabs-panel {
        padding: 0 !important;
    }
    tr.rownotsave td
    {
        background:lightgreen;
    }
    tr td.rownotsave
    {
        background:lightgreen;
    }

</style>
<script>
    $(function () {
        $height = getHeight()-10;
        $width = getWidth() - 20;
        $("#tabs").tabs();
        $dir_module_user = "modules/user/";//--------------------------------------------Thay đổi khi copy
        function xoadialog_manhomvt() { // ----------------------đóng form
            reset_dialog(".dialog-nhommakh");
            reset_dialog(".dialog_main_makh");
        }

        $("#dialog-nhommakh").dialog({ // ------------------Gọi dialog
            resizable: false,
            height: $height,
            width: $width,
            modal: true

        });
        $("#dialog-nhommakh").keydown(function (event) {//--------------Các phím tắt
            var $grid_pb = $("#grid_editing_sltonkho").closest('.pq-grid');//---- Lưới----------------
            if (event.keyCode == Keys.F7 || event.keyCode == Keys.F8) {
                var rowSelect = getRowSelect();//------ Lấy đối tượng được chọn
                if (rowSelect == false) {
                    alert_f("Chú Ý", "fa fa-warning", "red", "Bạn cần chọn dữ liệu trước khi thực hiện !");
                }
            }
            var rowEditting = $("#grid_editing_sltonkho").pqGrid("getRowsByClass", {cls: 'pq-row-edit'});//---Lấy đối tượng đang sửa
            if ($('div').hasClass('jconfirm') == false) {
                if (event.keyCode == Keys.F4) {
                    rowIndx = 0;
                    var colM = $("#grid_editing_sltonkho").pqGrid("option", "colModel");
                    colM[1].editable = true;
                    $("#grid_editing_sltonkho").pqGrid("option", "colModel", colM);

                    addRow(rowIndx, 'manhom', $grid_pb);
                }
                if (event.keyCode == Keys.F7) { // copy

                    var rowIndx = rowSelect[0].rowIndx;
                    var rowData = rowSelect[0].rowData;
                    var colM = $("#grid_editing_sltonkho").pqGrid("option", "colModel");
                    colM[1].editable = true;
                    $("#grid_editing_sltonkho").pqGrid("option", "colModel", colM);

                    //---------------Khai báo các cell khi dùng lệnh copy-----------------------------------------
                    //--------------------------------------------Thay đổi khi copy---------------------------------
                    var _dataRow = {tendoanhnghiep: rowData.tendoanhnghiep, masothue: rowData.masothue, tendangnhap: rowData.tendangnhap, phidichvu: rowData.phidichvu};
                    addRow(rowIndx, 'manhom', $grid_pb, _dataRow);
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
                            xoadialog_manhomvt();
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
        function addRow(rowIndx, $name='tendangnhap', $grid, $obj_addrow="") {

            if ($obj_addrow != "") {
                var rowData = $obj_addrow;
            } else {
                var rowData =  {tendoanhnghiep: "", masothue: "", tendangnhap: "",phidichvu:""};
            }

            if (typeof rowIndx == 'undefined')
                rowIndx = 0;
            $grid.pqGrid("addRow", {rowIndx: rowIndx, rowData: rowData});

            $grid.pqGrid("setSelection", {rowIndx: rowIndx, dataIndx: $name});
            $grid.pqGrid("editFirstCellInRow", {rowIndx: (rowIndx)});
        }

        //----------------------------Hàm xóa dữ kiệu------------------------------------------
        function deleteRow(rowData, $grid) {
            var rowData = rowData;
            var ma = rowData.tendangnhap;
            var sott = rowData.sott;
            if ($('div').hasClass('jconfirm') == false) {
                $.confirm({
                    title: "Chú ý", icon: "fa fa-times-circle", type: "red",
                    content: "Bạn có muốn xóa hàng có tên người dùng " + (ma) + "  không ?" + '<br/>Nhấn phím <strong style="color:blue;">[Y]</strong> để đồng ý phím <strong style="color:red;">[N]</strong> để hủy bỏ ',
                    buttons: {
                        "Đồng ý": {
                            keys: ['Y'], action: function () {


                                $.ajax($.extend({}, ajaxObj, {
                                    context: $grid,
                                    url: $dir_module_user + "del_phancong_khaithue.php",
                                    data: {id: sott, ma: ma},
                                    success: function (result) {
                                        this.pqGrid("commit");
                                        this.pqGrid("refreshDataAndView");
                                    },
                                    error: function () {
                                        this.pqGrid("removeClass", {rowData: rowData, cls: 'pq-row-delete'});
                                        this.pqGrid("commit");
                                        this.pqGrid("refreshDataAndView");
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

        $("#tab_bangtonghop").click(function () {
            $("#tabs-1").load("form/gird_bangphancong_khaithue_tonghop.php");
        });

        function tongcongtien() {
            $tuthang = $("#tuthang").val();
            $denthang = $("#denthang").val();
            $namtonghop= $("#namtonghop").val();
            $data=""
            $.ajax({// Kiểm tra xem STT có tồn tại hay không
                url: $dir_module_user + "tongcong_tonghop_phancong_khaithue.php",
                data:{nam:$namtonghop,tuthang:$tuthang,denthang:$denthang},
                async: false,
                success: function (response) {
                    $data = $.parseJSON(response);
                }
            });
            return $data;
        }

        //--------------------------------Khai báo lưới---------------------------------------.
        var objmanhomkh = {
            hwrap: true,
            vwrap: false,
            //resizable: true,
            rowBorders: true,
            height: $height - 110,
            width: $width - 15,
            //virtualX: true,
            freezeCols:6,
            numberCell: {show: true},
            filterModel: {on: true, mode: "AND", header: true},
            trackModel: {on: true}, //to turn on the track changes.
            scrollModel: {
                autoFit: false
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
            toolbar: {
                items: [
                    { type: "<label for='wrapText'>&nbsp;&nbsp;&nbsp;&nbsp;</label>" },
                    { type: 'select', style: 'margin-right:5px;',options: function (ui) {
                            var d = new Date();
                            var nam = d.getFullYear();
                            var opts = [{ '': 'CHỌN NĂM'}];
                            for (var i = nam; i >= 2015 ; i--) {
                                var obj = {};
                                obj[i] = i;
                                opts.push(obj);
                            }
                            return opts;
                        },
                        attr: 'id=namtonghop', listeners: [
                            {
                                change: function (evt) {
                                    $grid.pqGrid( "option", "dataModel.postData", function( ui ){
                                        var $namtonghop  = $("#namtonghop").val();
                                        return {nam:$namtonghop};
                                    } );
                                    $grid.pqGrid("refreshDataAndView");
                                }
                            }
                        ]
                    },
                    { type: 'select', style: 'margin-right:5px;',options: function (ui) {
                            var opts = [{ '': '--TỪ THÁNG--'},{ '1': '----THÁNG 1'},{ '2': '----THÁNG 2'},{ '3': '----THÁNG 3'},{ '4': '----THÁNG 4'},{ '5': '----THÁNG 5'},{ '6': '----THÁNG 6'},{ '7': '----THÁNG 7'},{ '8': '----THÁNG 8'},{ '9': '----THÁNG 9'},{ '10': '----THÁNG 10'},{ '11': '----THÁNG 11'},{ '12': '----THÁNG 12'}];
                            return opts;
                        },
                        attr: 'id=tuthang'
                    },
                    { type: 'select', style: 'margin-right:5px;',options: function (ui) {
                            var opts = [{ '': '--ĐẾN THÁNG--'},{ '1': '----THÁNG 1'},{ '2': '----THÁNG 2'},{ '3': '----THÁNG 3'},{ '4': '----THÁNG 4'},{ '5': '----THÁNG 5'},{ '6': '----THÁNG 6'},{ '7': '----THÁNG 7'},{ '8': '----THÁNG 8'},{ '9': '----THÁNG 9'},{ '10': '----THÁNG 10'},{ '11': '----THÁNG 11'},{ '12': '----THÁNG 12'}];
                            return opts;
                        },
                        attr: 'id=denthang'
                    },
                    {
                        type: 'button',
                        label: "XEM TỔNG HỢP",
                        icon: 'ui-icon-document',
                        listeners: [{
                            "click": function (evt) {
                                $tuthang = $("#tuthang").val();
                                $denthang = $("#denthang").val();
                                $namtonghop= $("#namtonghop").val();
                                if($tuthang=="" || $denthang==""){
                                    alert("Vui lòng chọn tháng trước khi xem ");
                                    return false;
                                }
								//alert($tuthang);
								//alert($denthang);
                                //if($tuthang>$denthang){
                                    //alert("Từ tháng không được nhỏ hơn đến tháng ");
                                    //return false;
                                //}
                                if($namtonghop==""){
                                    alert("Vui lòng chọn năm trước khi xem");
                                    return false;
                                }
                                $grid.pqGrid( "option", "dataModel.postData", function( ui ){
                                    $tuthang = $("#tuthang").val();
                                    $denthang = $("#denthang").val();
                                    $namtonghop= $("#namtonghop").val();
                                    return {nam:$namtonghop,tuthang:$tuthang,denthang:$denthang};
                                } );
                                $grid.pqGrid("refreshDataAndView");
                            }
                        }]
                    },
                    {
                        type: 'button',
                        label: "Xuất Excel",
                        icon: 'ui-icon-document',
                        listeners: [{
                            "click": function (evt) {
                                $grid.pqGrid("exportCsv", { url: "export_xuatexcel.php" });
                            }
                        }]
                    }
                ]
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
                if (type == 'update') {
                    var valid = grid.isValid({rowData: rowData, allowInvalid: true}).valid;
                    if (valid) {
                        if (rowData[recIndx] == null) {
                            url = $dir_module_user + "add_phancong_khaithue.php";
                        }
                        else {
                            url = $dir_module_user + "edit_phancong_khaithue.php";
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
                            var colM = $("#grid_editing_sltonkho").pqGrid("option", "colModel");
                            colM[1].editable = false;
                            $("#grid_editing_sltonkho").pqGrid("option", "colModel", colM);


                        },
                    });
                }
            },
            colModel: [//-------------------------------------------Khai báo các cột trong lưới-----------------------
                { title: "Lưu", dataType: "integer", dataIndx: "sott", editable: false, width: 0, hidden:true,align:"center",
                    render: function (ui) {
                        var $val  = ui.rowData.sott;
                        if($val==0 || $val=="" || typeof $val == 'undefined'){
                            return "<img src='icon/uncheck.png' width='20px'/>";
                        } else {
                            return "<img src='icon/check.png' width='20px' />";
                        }
                    },},
                {
                    title: "Phụ trách", minWidth: 140, dataType: "string", dataIndx: "tendangnhap",editable: false,
                    editor: {type: "select",options: function (ui) {
                            var parsedJson = "" ;
                            $.ajax({
                                url: $dir_module_user + "cb_user_phancong.php",
                                async: false,
                                success: function (response) {
                                    parsedJson = $.parseJSON(response);
                                }
                            });
                            return parsedJson;
                        }
                    },
                    filter: {
                        type: 'textbox',
                        condition: 'begin',
                        listeners: ['keyup']
                    }
                },
                {
                    title: "Năm", width: 60, dataType: "number", dataIndx: "nam",align:"center",editable: false,
                    validations: [
                        {type: 'minLen', value: 4, msg:  "Năm không được nhỏ hơn 4 ký tự"},
                        {type: 'maxLen', value: 4, msg:  "Năm không được lớn hơn 4 ký tự"}
                    ],
                    editor: {
                        type: "select", options: function (ui) {
                            var d = new Date();
                            var nam = d.getFullYear();
                            var opts = [{'': 'CHỌN NĂM'}];
                            for (var i = nam; i >= 2015; i--) {
                                var obj = {};
                                obj[i] = i;
                                opts.push(obj);
                            }
                            return opts;
                        }
                    }
                },
                {
                    title: "Doanh thu", width: 100, dataType: "number", dataIndx: "doanhthu",align:"right",editable:false,
                    render: function (ui) {
                        var val = ui.rowData.doanhthu;
                        if(val==0 || val==""){
                            return "-";
                        }else{
                            return $.number(val,0,".",",");
                        }
                    }
                },
                {
                    title: "Lương T.Ứ", width: 100, dataType: "number", dataIndx: "luongtamung",align:"right",editable:false,
                    render: function (ui) {
                        var val = ui.rowData.luongtamung;
                        if(val==0 || val==""){
                            return "-";
                        }else{
                            return $.number(val,0,".",",");
                        }
                    }
                },
                {
                    title: "Tỷ trọng", width: 60, dataType: "number", dataIndx: "tytrongluongtamung",align:"center",editable:false,
                    render: function (ui) {
                        var val = ui.rowData.tytrongluongtamung;
                        return $.number(val,2,".",",")+"%";
                    }
                },
                {
                    title: "BHXH", width: 100, dataType: "number", dataIndx: "bhxh",align:"right",editable:false,
                    render: function (ui) {
                        var val = ui.rowData.bhxh;
                        if(val==0 || val==""){
                            return "-";
                        }else{
                            return $.number(val,0,".",",");
                        }
                    }
                },
                {
                    title: "Tỷ trọng", width: 60, dataType: "number", dataIndx: "tytrongbhxh",align:"center",editable:false,
                    render: function (ui) {
                        var val = ui.rowData.tytrongbhxh;
                        return $.number(val,2,".",",")+"%";
                    }
                },
                {
                    title: "Chênh lệch biên", width: 120, dataType: "number", dataIndx: "chenhlechbien",align:"right",editable:false,
                    render: function (ui) {
                        var val = ui.rowData.chenhlechbien;
                        if(val==0 || val==""){
                            return "-";
                        }else{
                            return $.number(val,0,".",",");
                        }
                    }
                },
                {
                    title: "Tỷ trọng", width: 60, dataType: "number", dataIndx: "tytrongchenhlechbien",align:"center",editable:false,
                    render: function (ui) {
                        var val = ui.rowData.tytrongchenhlechbien;
                        return $.number(val,2,".",",")+"%";
                    }
                },
                {
                    title: "Lương khoán 30%", width: 100, dataType: "number", dataIndx: "luongkhoan30",align:"right",editable:false,
                    render: function (ui) {
                        var val = ui.rowData.luongkhoan30;
                        if(val==0 || val==""){
                            return "-";
                        }else{
                            return $.number(val,0,".",",");
                        }
                    }
                },
                {
                    title: "Lương khoán 2%", width: 100, dataType: "number", dataIndx: "luongkhoan2",align:"right",editable:false,
                    render: function (ui) {
                        var val = ui.rowData.luongkhoan2;
                        if(val==0 || val==""){
                            return "-";
                        }else{
                            return $.number(val,0,".",",");
                        }
                    }
                },
                {
                    title: "TỔNG LƯƠNG", width: 120, dataType: "number", dataIndx: "tongluong",align:"right",editable:false,
                    render: function (ui) {
                        var val = ui.rowData.tongluong;
                        if(val==0 || val==""){
                            return "-";
                        }else{
                            return $.number(val,0,".",",");
                        }
                    }
                },
                {
                    title: "Tiền thưởng", width: 100, dataType: "number", dataIndx: "tienthuong",align:"right",editable:false,
                    render: function (ui) {
                        var val = ui.rowData.tienthuong;
                        if(val==0 || val==""){
                            return "-";
                        }else{
                            return $.number(val,0,".",",");
                        }
                    }
                },
				{
                    title: "Chênh lệch 30%", width: 120, dataType: "number", dataIndx: "chenhlech30",align:"right",editable:false,
                    render: function (ui) {
                        var val = ui.rowData.chenhlech30;
                        if(val==0 || val==""){
                            return "-";
                        }else{
                            return $.number(val,0,".",",");
                        }
                    }
                }

            ],//-----------------------------------------Kết thúc các cột---------------------------------------
            pageModel: {type: "local", rPP: 200, strRpp: "{0}", strDisplay: "{0} đến {1} của {2}"},
            dataModel: {
                dataType: "JSON",
                location: "remote",
                recIndx: "sott",
                url: $dir_module_user + "list_danhsach_tonghop_phancong_khaithue.php",//-- Load danh sách lên lưới
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
        function calculateSummary() {
            arrayData = tongcongtien();
            $doanhthu = arrayData.data.doanhthu;
            $luongtamung = arrayData.data.luongtamung;
            $bhxh = arrayData.data.bhxh;
            $luongkhoan30 = arrayData.data.luongkhoan30;
            $luongkhoan2 = arrayData.data.luongkhoan2;
            $tongluong = arrayData.data.tongluong;
            $tienthuong = arrayData.data.tienthuong;
            $chenhlechbien = arrayData.data.chenhlechbien;
            $chenhlech30 = arrayData.data.chenhlech30;

            totalData = {tendangnhap: "<b>TỔNG CỘNG</b>",doanhthu: $doanhthu,luongtamung: $luongtamung,bhxh: $bhxh,luongkhoan30: $luongkhoan30,luongkhoan2: $luongkhoan2,tongluong: $tongluong,tienthuong: $tienthuong,chenhlechbien: $chenhlechbien,chenhlech30: $chenhlech30, pq_rowcls: 'rownotsave' };
         }

        var $summary = "";

        objmanhomkh.render = function (evt, ui) {
            $summary = $("<div class='pq-grid-summary'  ></div>")
                .prependTo($(".pq-grid-bottom", this));
            calculateSummary();
        }

        objmanhomkh.editorEnd = function (evt, ui) {
            calculateSummary();
            objmanhomkh.refresh.call(this);
        }

        objmanhomkh.load = function (evt, ui) {
            calculateSummary();
            objmanhomkh.refresh.call(this);
        }

        objmanhomkh.refresh = function (evt, ui) {
            var data = [totalData]; //JSON (array of objects)
            var obj = { data: data, $cont: $summary }
            $(this).pqGrid("createTable", obj);
        }
        var $grid = $("#grid_editing_sltonkho").pqGrid(objmanhomkh);
        $grid.one("pqgridload", function (evt, ui) {
            $grid.pqGrid( "option", "dataModel.postData", function( ui ){
                $tuthang = $("#tuthang").val();
                $denthang = $("#denthang").val();
                $namtonghop= $("#namtonghop").val();
                return {nam:$namtonghop,tuthang:$tuthang,denthang:$denthang};
            } );
            $grid.pqGrid("refreshDataAndView");
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

        function isEditCell(rowIndex, dataIndx) { // --------------------Lấy dữ liệu theo dòng trên gird----------------------
            var isEdit = false;
            isEdit = $("#grid_editing_sltonkho").pqGrid("isDirty"); //Lấy giá trị đang chọn

            return isEdit;
        }

        //-----------------------------Hết lưới---------------------------------------------------------------------
    });
</script>

<div id="grid_editing_sltonkho" style="margin:0px;border: 0px !important;"></div>