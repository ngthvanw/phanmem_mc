<?php
session_start();
$Thang = $_GET['thangthongke'];
?>
<script>
    $dir_module_dmsanpham = "modules/dmsanpham/";//--------------------------------------------Thay đổi khi copy
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

    //--------------------------------Khai báo lưới---------------------------------------.
    var obj = {
        hwrap: false,
        //resizable: true,
        rowBorders: true,
        //virtualX: true, virtualY: true,
        height:$height-120,
        width:$width-30,
        freezeCols: 6,
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
                },
                {
                    type: 'button',
                    label: "Xuất Excel",
                    icon: 'ui-icon-document',
                    listeners: [{
                        "click": function (evt) {
                            $("#grid_editing_sltonkho").pqGrid("exportCsv", { url:"export_xuatexcel.php" });
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
        title: "Bảng dự trù vật liệu sản xuất",
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

            var url="";
            if (type == 'update') {
                var valid = grid.isValid({ rowData: rowData, allowInvalid: true }).valid;
                if (valid) {
                    if (rowData[recIndx] == null) {
                        url = $dir_module_dmsanpham+"add_slvlsx.php";
                    }
                    else {
                        url = $dir_module_dmsanpham+"add_slvlsx.php";
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
                title: "Mã SP",
                dataType: "string",
                editable: false,
                dataIndx: "masp",
                minWidth: 100,
                sortable: true,
                render: function (ui) {
                    var rowData = ui.rowData,
                        dataIndx = ui.dataIndx;

                    rowData.pq_cellcls = rowData.pq_cellcls || {};
                    if (rowData.maspcha == 0) {//if change is negative.
                        rowData.pq_cellcls[dataIndx] = 'mauhong';
                        return rowData.masp;
                    }
                    else { //if change >= 0
                        return rowData.masp;
                    }
                },
                filter: { type: 'textbox', condition: 'begin', listeners: ['keyup'] }

            },
            {title: "Tên SP", minWidth: 250, dataType: "string", editable: true, dataIndx: "tensp", editable: false,
                filter: { type: 'textbox', condition: 'begin', listeners: ['keyup'] }
            },
            {
                title: "Mã SP Cha",
                dataType: "string",
                editable: false,
                dataIndx: "maspcha",
                minWidth: 100,
                sortable: true,
            },
            {
                title: "Tổng cộng",
                minWidth: 150,
                dataType: "float",
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
                    return $.number($tong, <?php echo (int)($_SESSION['txthienthisole']); ?>, ".", ",");
                },
            },
            {
                title: "Tháng 1",
                minWidth: 120,
                dataType: "float",
                align: "right",
                editable: false,
                dataIndx: "thang1",
                render: function (ui) {
                    var value = ui.rowData.thang1;
                    return $.number(value, <?php echo (int)($_SESSION['txthienthisole']); ?>, ".", ",");
                },
            },
            {
                title: "Tháng 2",
                minWidth: 120,
                dataType: "float",
                align: "right",
                editable: false,
                dataIndx: "thang2",
                render: function (ui) {
                    var value = ui.rowData.thang2;
                    return $.number(value, <?php echo (int)($_SESSION['txthienthisole']); ?>, ".", ",");
                },

            },
            {
                title: "Tháng 3",
                minWidth: 120,
                dataType: "float",
                align: "right",
                editable: false,
                dataIndx: "thang3",
                render: function (ui) {
                    var value = ui.rowData.thang3;
                    return $.number(value, <?php echo (int)($_SESSION['txthienthisole']); ?>, ".", ",");
                },
            },
            {
                title: "Tháng 4",
                minWidth: 120,
                dataType: "float",
                align: "right",
                editable: false,
                dataIndx: "thang4",
                render: function (ui) {
                    var value = ui.rowData.thang4;
                    return $.number(value, <?php echo (int)($_SESSION['txthienthisole']); ?>, ".", ",");
                },
            },
            {
                title: "Tháng 5",
                minWidth: 120,
                dataType: "float",
                align: "right",
                editable: false,
                dataIndx: "thang5",
                render: function (ui) {
                    var value = ui.rowData.thang5;
                    return $.number(value, <?php echo (int)($_SESSION['txthienthisole']); ?>, ".", ",");
                },
            },
            {
                title: "Tháng 6",
                minWidth: 120,
                dataType: "float",
                align: "right",
                editable: false,
                dataIndx: "thang6",
                render: function (ui) {
                    var value = ui.rowData.thang6;
                    return $.number(value, <?php echo (int)($_SESSION['txthienthisole']); ?>, ".", ",");
                },
            },
            {
                title: "Tháng 7",
                minWidth: 120,
                dataType: "float",
                align: "right",
                editable: false,
                dataIndx: "thang7",
                render: function (ui) {
                    var value = ui.rowData.thang7;
                    return $.number(value, <?php echo (int)($_SESSION['txthienthisole']); ?>, ".", ",");
                },
            },
            {
                title: "Tháng 8",
                minWidth: 120,
                dataType: "float",
                align: "right",
                editable: false,
                dataIndx: "thang8",
                render: function (ui) {
                    var value = ui.rowData.thang8;
                    return $.number(value, <?php echo (int)($_SESSION['txthienthisole']); ?>, ".", ",");
                },
            },
            {
                title: "Tháng 9",
                minWidth: 120,
                dataType: "float",
                align: "right",
                editable: true,
                dataIndx: "thang9",
                render: function (ui) {
                    var value = ui.rowData.thang9;
                    return $.number(value, <?php echo (int)($_SESSION['txthienthisole']); ?>, ".", ",");
                },
            },
            {
                title: "Tháng 10",
                minWidth: 120,
                dataType: "float",
                align: "right",
                editable: false,
                dataIndx: "thang10",
                render: function (ui) {
                    var value = ui.rowData.thang10;
                    return $.number(value, <?php echo (int)($_SESSION['txthienthisole']); ?>, ".", ",");
                },
            },
            {
                title: "Tháng 11",
                minWidth: 120,
                dataType: "float",
                align: "right",
                editable: false,
                dataIndx: "thang11",
                render: function (ui) {
                    var value = ui.rowData.thang11;
                    return $.number(value, <?php echo (int)($_SESSION['txthienthisole']); ?>, ".", ",");
                },
            },
            {
                title: "Tháng 12",
                minWidth: 120,
                dataType: "float",
                align: "right",
                editable: false,
                dataIndx: "thang12",
                render: function (ui) {
                    var value = ui.rowData.thang12;
                    return $.number(value, <?php echo (int)($_SESSION['txthienthisole']); ?>, ".", ",");
                },
            },
        ],//-----------------------------------------Kết thúc các cột---------------------------------------
        pageModel: {type: "local", rPP: 100, strRpp: "{0}", strDisplay: "{0} đến {1} của {2}"},
        dataModel: {
            dataType: "JSON",
            location: "remote",
            recIndx: "sott",
            url: $dir_module_dmsanpham+"list_dutruvlsx.php",//-- Load danh sách lên lưới
            getData: function (dataJSON) {
                var data = dataJSON.data;
                return { data: data };
            }
        }};
    function calculateSummary() {
        arrayData = tongtiendauky();
        $thang1 = arrayData.data.thang1;
        $thang2 = arrayData.data.thang2;
        $thang3 = arrayData.data.thang3;
        $thang4 = arrayData.data.thang4;
        $thang5 = arrayData.data.thang5;
        $thang6 = arrayData.data.thang6;
        $thang7 = arrayData.data.thang7;
        $thang8 = arrayData.data.thang8;
        $thang9 = arrayData.data.thang9;
        $thang10 = arrayData.data.thang10;
        $thang11 = arrayData.data.thang11;
        $thang12 = arrayData.data.thang12;
        totalData = { tensp: "<b>TỔNG CỘNG</b>",thang1: $thang1, thang2: $thang2,thang3: $thang3,thang4: $thang4,thang5: $thang5,thang6: $thang6,thang7: $thang7,thang8: $thang8,thang9: $thang9,thang10: $thang10,thang11: $thang11,thang12: $thang12, pq_rowcls: 'green' };
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

    function tongtiendauky() {
        $data=""
        $.ajax({// Kiểm tra xem STT có tồn tại hay không
            url: $dir_module_dmsanpham + "tong_dutruvlsx.php",
            async: false,
            success: function (response) {
                $data = $.parseJSON(response);
            }
        });
        return $data;
    }
    var $grid = $("#grid_editing_sltonkho").pqGrid(obj);
    // End grid theo ngày


    //-----------------------------Hết lưới---------------------------------------------------------------------

    //------------------------End lưới--------------------------------------
</script>
<div id="grid_editing_sltonkho" style="margin:0px;border: 0px !important;"></div>
