<?php
session_start();
?>
<!DOCTYPE HTML>
<html lang="vi">
<head>
    <meta charset="utf-8"/>
    <title>QUẢN LÝ DOANH NGHIỆP</title>
    <link rel="shortcut icon" type="image/x-icon" href="icon/favicon.ico"/>
    <meta http-equiv="content-type" content="text/html"/>
    <meta name="author" content="ketoanchienthuat.com"/>


    <script type="text/javascript" src="../js/jquery.js"></script>

    <script type="text/javascript" src="../js/jquery.easing.1.3.js"></script>
    <script type="text/javascript" src="../js/script.js"></script>
    <script type="text/javascript" src="../js/jquery.min.js"></script>
    <script type="text/javascript" src="../number/jquery.number.js"></script>


    <!-- dialog jquery ui-->
    <link rel="stylesheet" href="../css/jquery-ui.min.css"/>
    <script src="../js/jquery-ui.js"></script>

    <!-- menu right -->
    <link href="../src/jquery.contextMenu.css" rel="stylesheet" type="text/css"/>
    <script src="../src/jquery.contextMenu.js" type="text/javascript"></script>
    <script src="../js/function_window.js"></script>

    <!--PQ Grid files-->
    <link rel="stylesheet" href="../grid/pqgrid.min.css"/>
    <script src="../grid/pqgrid.min.js"></script>
    <!--PQ Grid Office theme-->
    <link rel="stylesheet" href="../grid/themes/office/pqgrid.css"/>

    <link rel="stylesheet" href="../comfirm/libs/bundled.css"/>
    <link rel="stylesheet" href="../comfirm/demo.css"/>
    <!-- jquery-confirm files -->
    <link rel="stylesheet" type="text/css" href="../css/jquery-confirm.css"/>
    <script type="text/javascript" src="../js/jquery-confirm.js"></script>
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
</head>
<body>
<script>
    $height = getHeight();
    $width = getWidth();
    $(function () {
        var $dir_module_user = "";
        $dir_module_user = "../modules/user/";//--------------------------------------------Thay đổi khi copy
        function xoadialog_makh() { // ----------------------đóng form
            reset_dialog(".dialog-makhachhang");
            reset_dialog(".dialog_main_makh");
        }

        $("#dialog-makhachhang").dialog({ // ------------------Gọi dialog
            resizable: false,
            height: $height,
            width: $width,
            modal: true

        });
        $("#dialog-makhachhang").keydown(function (event) {//--------------Các phím tắt
            var $grid_pb = $("#grid_editing_thongke_phanmem").closest('.pq-grid');//---- Lưới----------------
            if (event.keyCode == Keys.F7 || event.keyCode == Keys.F8 || event.keyCode == Keys.INSERT) {
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

            var rowEditting = $("#grid_editing_thongke_phanmem").pqGrid("getRowsByClass", {cls: 'pq-row-edit'});//---Lấy đối tượng đang sửa
            if ($('div').hasClass('jconfirm') == false) {

                if (event.keyCode == Keys.ESCAPE && $('div').hasClass('jconfirm') == false && rowEditting.length < 1) {
                    change_data_quit_makh();
                }
            } else {
                return false;
            }
        }); // end phím tắt
        function change_data_quit_makh() { // Cảnh báo thoát khi thay đổi dữ liệu////////////////////////////////////////////////////{
            $.confirm({
                title: 'Thông báo',
                content: 'Dữ liệu chưa được chọn bạn có muốn thoát cửa sổ này ? .<br/>Nhấn phím <strong style="color:blue;">[Y]</strong> để đồng ý phím <strong style="color:red;">[N]</strong> để hủy bỏ ',
                icon: 'fa fa-warning',
                type: 'red',
                buttons: {
                    "Đồng ý": {
                        keys: ['Y'], action: function () {
                            window.close();
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
        var httk_select = function (ui) {
            var $cell = ui.$cell,
                rowData = ui.rowData,
                dataIndx = ui.dataIndx,
                cls = ui.cls, width = ui.column.minWidth,
                dc = $.trim(rowData[dataIndx]);
            $cell.css('padding', '0');

            var $inp = $("<input type='text'  name='" + dataIndx + "' class='" + cls + " pq-cell-editor pg-cel-define' readonly />")
                .appendTo($cell)
                .val(dc).keypress(function () {
                    $('.dialog_main_httk').load("form/frm_dm_httk_select.php?idstyle=grid_editing_thongke_phanmem");
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
        function addRow(rowIndx, $name='mavt', $grid, $obj_addrow="") {
            //append empty row in the first row.
            var rowData = $obj_addrow; //empty row template
            if (typeof rowIndx == 'undefined')
                rowIndx = 0;
            $grid.pqGrid("addRow", {rowIndx: rowIndx, rowData: rowData});

            $grid.pqGrid("setSelection", {rowIndx: rowIndx, dataIndx: $name});
            $grid.pqGrid("editFirstCellInRow", {rowIndx: (rowIndx)});
        }

        //----------------------------Hàm xóa dữ kiệu------------------------------------------
        function deleteRow(rowData, $grid) {
            var rowData = rowData;
            var ma = rowData.masothue;
            var sott = rowData.sott;
            if ($('div').hasClass('jconfirm') == false) {
                $.confirm({
                    title: "Chú ý", icon: "fa fa-times-circle", type: "red",
                    boxWidth: '700px',
                    useBootstrap: false,
                    content: "Bạn có muốn xóa mã số thuế " + (ma) + "  không ? Nếu xóa bạn sẽ không thể truy cập vào doanh nghiệp này .",
                    buttons: {
                        "Xoá thông tin doanh nghiệp": {
                            btnClass: 'btn-blue',
                            keys: ['Y'], action: function () {
                                $.ajax($.extend({}, ajaxObj, {
                                    context: $grid,
                                    url: $dir_module_user + "del_doanhnghiep.php",
                                    data: {id: sott, ma: ma,xoadulieu:'0'},
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
                        "Xoá toàn bộ dữ  liệu doanh nghiệp": {
                            btnClass: 'btn-red',
                            keys: ['Y'], action: function () {
                                $.ajax($.extend({}, ajaxObj, {
                                    context: $grid,
                                    url: $dir_module_user + "del_doanhnghiep.php",
                                    data: {id: sott, ma: ma,xoadulieu:'1'},
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

        //---------------------------Cập nhật row-----------------------------------------

        //--------------------------------Khai báo lưới---------------------------------------.
        var obj = {
            hwrap: true,
            //resizable: true,
            rowBorders: true,
            virtualX: false, virtualY: false,
            height: $height - 58,
            width: $width - 20,
            //virtualX: true,
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
                                $("#grid_editing_thongke_phanmem").pqGrid("exportCsv", { url:"../export_xuatexcel.php" });
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
                //console.log(recIndx);

                var obj = rowList[0],
                    rowIndx = obj.rowIndx,
                    newRow = obj.newRow,
                    oldRow = obj.oldRow,
                    type = obj.type,
                    rowData = obj.rowData;
                //$timkiem = rowData.tendangnhap.indexOf(oldRow.nguoiphutrach);
                try {
                    $timkiem = rowData.tendangnhap.indexOf(rowData.nguoiphutrach);
                    if($timkiem==-1){
                        $tendangnhap = rowData.tendangnhap.replace(oldRow.nguoiphutrach,rowData.nguoiphutrach);
                        rowData.tendangnhap = $tendangnhap;
                        rowData.nguoiphutrachcu = oldRow.nguoiphutrach;

                    }else{
                        rowData.tendangnhap = rowData.tendangnhap;
                    }
                }catch (ex){

                }

                var url = "";
                if (type == 'update') {
                    var valid = grid.isValid({rowData: rowData, allowInvalid: true}).valid;
                    if (valid) {
                        if (rowData[recIndx] == null) {
                            url = $dir_module_user + "edit_phancong.php";
                        }
                        else {
                            url = $dir_module_user + "edit_phancong.php";
                        }
                    }
                }
                if (valid) {
                    $.ajax({
                        url: url,
                        data: rowData,
                        dataType: "json",
                        type: "GET",
                        async: false,
                        success: function (res) {
                            if (rowData[recIndx] == null) {
                                rowData.sott = res.recId;
                            }
                            $grid.pqGrid("refreshRow", {rowIndx: rowIndx});
                        },
                    });
                    $grid.pqGrid("refreshRow", {rowIndx: rowIndx});
                }
            },
            colModel: [//-------------------------------------------Khai báo các cột trong lưới-----------------------
                {title: "Số TT", dataType: "integer", dataIndx: "sott", width: 0, hidden: true},
                {
                    title: "Mã số thuế ", minWidth: 120, dataType: "string", align: "left", dataIndx: "masothue",editable:false,
                    filter: { type: 'textbox', condition: 'contain', listeners: ['keyup'] }
                },
                {
                    title: "Tên công ty", minWidth: 300, dataType: "string", align: "left", dataIndx: "tencongty",editable:false,
                    filter: { type: 'textbox', condition: 'contain', listeners: ['keyup'] }
                },
				{
                    title: "Trạng thái", minWidth: 150, dataType: "string", align: "center", dataIndx: "trangthaidn",editable:true,
                    filter: { type: 'textbox', condition: 'contain', listeners: ['keyup'] },
					editor: {type: "select", options: [{"DANG_HOAT_DONG": "Đang hoạt động"}, {"DA_GIAI_THE": " Đã giải thể"},{"DA_TAM_NGUNG": "Tạm ngừng HĐ"},{"DA_NGHI_THUE": "Đã nghĩ DV"}]},

                },
				{
                    title: "Ngày Thành lập", minWidth: 100, dataType: "string", align: "left", dataIndx: "ngaythanhlap",editable:true,
                    render: function (ui) {
                        var value = ui.rowData.ngaythanhlap;
                            return Format_dd_mm_yyyy(value);
                    },
					editor: {
                        type: 'date'
                    },
                    filter: { type: 'textbox', condition: 'contain', listeners: ['keyup'] }

                },
                {
                    title: "Phí dịch vụ", minWidth: 100, dataType: "integer", align: "right", dataIndx: "phidichvu",editable:true,
                    render: function (ui) {
                        var value = ui.rowData.phidichvu;
                            return $.number(value,0,".",",");
                    },
                    filter: { type: 'textbox', condition: 'contain', listeners: ['keyup'] }

                },
                {
                    title: "Người phụ trách", minWidth: 120, dataType: "string", dataIndx: "nguoiphutrach",editable:true,
                    editor: {type: "select",options: function (ui) {
                        //remote validation
                        var parsedJson = "" ;
                        $.ajax({// Load danh sách mã khách hàng
                            url: $dir_module_user + "cb_user.php",
                            async: false,
                            success: function (response) {
                                parsedJson = $.parseJSON(response);
                            }
                        });
                        return parsedJson;
                    }},
                    filter: { type: 'textbox', condition: 'contain', listeners: ['keyup'] }
                },
                {
                    title: "Trưởng nhóm",
                    minWidth: 100,
                    dataType: "string",
                    align: "center",
                    dataIndx: "truongnhom",
                    editable: true,
                    editor: {type: "select",options: function (ui) {
                        //remote validation
                        var parsedJson = "" ;
                        $.ajax({// Load danh sách mã khách hàng
                            url: $dir_module_user + "cb_user_tn.php",
                            async: false,
                            success: function (response) {
                                parsedJson = $.parseJSON(response);
                            }
                        });
                        return parsedJson;
                    }},
                    filter: { type: 'textbox', condition: 'contain', listeners: ['keyup'] }

                },
                {
                    title: "Duyệt tờ khai",
                    minWidth: 80,
                    dataType: "string",
                    align: "center",
                    dataIndx: "sltokhai",
                    editable: false,
                    render:function( ui ){
                        $val = ui.rowData.sltokhai;
                        $masothue = ui.rowData.masothue;
                        $nguoinhap = ui.rowData.nguoiphutrach;
                        $tencongty = ui.rowData.tencongty;
                        $ngaynhap = ui.rowData.ngaynhap;
                        return "<a style='color:blue;' href='frm_thongke_ctduyeths_window.php?masothue="+$masothue+"&tendangnhap="+$nguoinhap+"&tencongty="+$tencongty+"&loaiphieu=9,11'>"+$val+"</a>"
                    }
                }
                ,
                {
                    title: "Duyệt BCHĐ",
                    minWidth: 80,
                    dataType: "string",
                    align: "center",
                    dataIndx: "slhoadon",
                    editable: false,
                    render:function( ui ){
                        $val = ui.rowData.slhoadon;
                        $masothue = ui.rowData.masothue;
                        $nguoinhap = ui.rowData.nguoiphutrach;
                        $tencongty = ui.rowData.tencongty;
                        $ngaynhap = ui.rowData.ngaynhap;
                        return "<a style='color:blue;' href='frm_thongke_ctduyeths_window.php?masothue="+$masothue+"&tendangnhap="+$nguoinhap+"&tencongty="+$tencongty+"&loaiphieu=10'>"+$val+"</a>"
                    }
                },
                {
                    title: "Chú thích",
                    minWidth: 200,
                    dataType: "string",
                    align: "left",
                    dataIndx: "ghichu",
                    hidden: false,
                    editable: true,
                    editor: {type: "textarea", attr: "rows=3"}
                },
                {
                    title: "Tên đăng nhập vào doanh nghiệp",
                    minWidth: 150,
                    dataType: "string",
                    align: "left",
                    dataIndx: "tendangnhap",
                    editable: false,
                },
            ],//-----------------------------------------Kết thúc các cột--------------------------------------
            pageModel: {type: "local", rPP: 200, strRpp: "{0}", strDisplay: "{0} đến {1} của {2}"},
            dataModel: {
                dataType: "JSON",
                location: "remote",
                recIndx: "sott",
                postData: {loaiphieu: '<?php echo $LoaiPhieu; ?>'},
                url: $dir_module_user + "list_danhsach_phancong.php",//-- Load danh sách lên lưới
                getData: function (dataJSON) {
                    var data = dataJSON.data;
                    return {curPage: dataJSON.curPage, totalRecords: dataJSON.totalRecords, data: data};
                }
            }
        };
        var $grid = $("#grid_editing_thongke_phanmem").pqGrid(obj);

        //use refresh & refreshRow events to display jQueryUI buttons and bind events.
        function getRowSelect() { // --------------------Lấy dữ liệu theo dòng trên gird----------------------
            var arr = $("#grid_editing_thongke_phanmem").pqGrid("selection", {
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
            isEdit = $("#grid_editing_thongke_phanmem").pqGrid("isDirty"); //Lấy giá trị đang chọn

            return isEdit;
        }

        setTimeout(function () {
            $("#grid_editing_thongke_phanmem .pq-search-hd-field").focus();
        }, 100);
        //-----------------------------Hết lưới---------------------------------------------------------------------

    });
</script>
<div id="dialog-makhachhang"
     title="QUẢN LÝ DOANH NGHIỆP"><!-- dialog -->
    <div id="grid_editing_thongke_phanmem" style="margin:5px auto;border: 0px !important;"></div>
</div>
</body>
</html>