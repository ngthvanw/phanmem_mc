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
    var objngay = {
        hwrap: false,
        //resizable: true,
        rowBorders: true,
        //virtualX: true, virtualY: true,
        height:$height-120,
        width:$width-70,
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
                { type: '<span>Chọn tháng : </span>' },
                { type: 'select',attr:'id=thangthongke', options: [ { "1":"Tháng 1"},{ "2":"Tháng 2"},{ "3":"Tháng 3"},{ "4":"Tháng 4"},{ "5":"Tháng 5"},{ "6":"Tháng 6"},{ "7":"Tháng 7"},{ "8":"Tháng 8"},{ "9":"Tháng 9"},{ "10":"Tháng 10"},{ "11":"Tháng 11"},{ "12":"Tháng 12"}],
                    listeners: [
                        {
                            change: function (evt) {
                                $thangthongke = $("#thangthongke").val();
                                //$( ".selector" ).pqGrid( {dataModel: { postData: {gridId:23, table: "products"} }} );
                                $("#tabs-0").load("form/gird_bangthongke_thanhpham.php?thangthongke="+$thangthongke);
                                $("#grid_editing_thongkethanhpham").pqGrid("refreshDataAndView");
                            }
                        }
                    ]
                },
                {
                    type: 'button',
                    label: "Xuất từ Excel",
                    icon: 'ui-icon-document',
                    listeners: [{
                        "click": function (evt) {
                            $("#grid_editing_thongkethanhpham").pqGrid("exportCsv", { url:"export_xuatexcel.php" });
                        }
                    }]
                },
                {
                    type: 'button',
                    label: "Nhập Excel",
                    icon: 'ui-icon-document',
                    listeners: [{
                        "click": function (evt) {
                            window.open('form/frm_tai_excel_dutru_window.php', 'updatedata', 'height=1000','width=2000')
                        }
                    }]
                },
                {type: "<span style='color:red;font-weight:bold;'> <?php echo "ĐANG XEM THÁNG ".$Thang; ?></span>"},
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
        title: "Bảng thống kê thành phẩm",
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
                        url = $dir_module_dmsanpham+"add_slvlsxtktp.php";
                    }
                    else {
                        url = $dir_module_dmsanpham+"add_slvlsxtktp.php";
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
                        //tongtienhienco();
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
                minWidth: 120,
                dataType: "float",
                align: "right",
                editable: false,
                dataIndx: "n32",
                render: function (ui) {
                    var rowData = ui.rowData;
                    var dataIndx = ui.dataIndx;
                    rowData.pq_cellcls = rowData.pq_cellcls || {};
                    var value = parseFloat(ui.rowData.n1)+parseFloat(ui.rowData.n2)+parseFloat(ui.rowData.n3)+parseFloat(ui.rowData.n4)+parseFloat(ui.rowData.n5)+parseFloat(ui.rowData.n6)+parseFloat(ui.rowData.n7)+parseFloat(ui.rowData.n8)+parseFloat(ui.rowData.n9)+parseFloat(ui.rowData.n10)+parseFloat(ui.rowData.n11)+parseFloat(ui.rowData.n12)+parseFloat(ui.rowData.n13)+parseFloat(ui.rowData.n14)+parseFloat(ui.rowData.n15)+parseFloat(ui.rowData.n16)+parseFloat(ui.rowData.n17)+parseFloat(ui.rowData.n18)+parseFloat(ui.rowData.n19)+parseFloat(ui.rowData.n20)+parseFloat(ui.rowData.n21)+parseFloat(ui.rowData.n22)+parseFloat(ui.rowData.n23)+parseFloat(ui.rowData.n24)+parseFloat(ui.rowData.n25)+parseFloat(ui.rowData.n26)+parseFloat(ui.rowData.n27)+parseFloat(ui.rowData.n28)+parseFloat(ui.rowData.n29)+parseFloat(ui.rowData.n30)+parseFloat(ui.rowData.n31);
                    rowData.pq_cellcls[dataIndx] = 'green';
                    return $.number(value, <?php echo (int)($_SESSION['txthienthisole']); ?>, ".", ",");
                },
            },
            {
                title: "Ngày 1",
                minWidth: 120,
                dataType: "float",
                align: "right",
                editable: true,
                dataIndx: "n1",
                render: function (ui) {
                    var value = ui.rowData.n1;
                    return $.number(value, 2, ".", ",");
                },
            },
            {
                title: "Ngày 2",
                minWidth: 120,
                dataType: "float",
                align: "right",
                editable: true,
                dataIndx: "n2",
                render: function (ui) {
                    var value = ui.rowData.n2;
                    return $.number(value, 2, ".", ",");
                },

            },
            {
                title: "Ngày 3",
                minWidth: 120,
                dataType: "float",
                align: "right",
                editable: true,
                dataIndx: "n3",
                render: function (ui) {
                    var value = ui.rowData.n3;
                    return $.number(value, 2, ".", ",");
                },
            },
            {
                title: "Ngày 4",
                minWidth: 120,
                dataType: "float",
                align: "right",
                editable: true,
                dataIndx: "n4",
                render: function (ui) {
                    var value = ui.rowData.n4;
                    return $.number(value, 2, ".", ",");
                },
            },
            {
                title: "Ngày 5",
                minWidth: 120,
                dataType: "float",
                align: "right",
                editable: true,
                dataIndx: "n5",
                render: function (ui) {
                    var value = ui.rowData.n5;
                    return $.number(value, 2, ".", ",");
                },
            },
            {
                title: "Ngày 6",
                minWidth: 120,
                dataType: "float",
                align: "right",
                editable: true,
                dataIndx: "n6",
                render: function (ui) {
                    var value = ui.rowData.n6;
                    return $.number(value, 2, ".", ",");
                },
            },
            {
                title: "Ngày 7",
                minWidth: 120,
                dataType: "float",
                align: "right",
                editable: true,
                dataIndx: "n7",
                render: function (ui) {
                    var value = ui.rowData.n7;
                    return $.number(value, 2, ".", ",");
                },
            },
            {
                title: "Ngày 8",
                minWidth: 120,
                dataType: "float",
                align: "right",
                editable: true,
                dataIndx: "n8",
                render: function (ui) {
                    var value = ui.rowData.n8;
                    return $.number(value, 2, ".", ",");
                },
            },
            {
                title: "Ngày 9",
                minWidth: 120,
                dataType: "float",
                align: "right",
                editable: true,
                dataIndx: "n9",
                render: function (ui) {
                    var value = ui.rowData.n9;
                    return $.number(value, 2, ".", ",");
                },
            },
            {
                title: "Ngày 10",
                minWidth: 120,
                dataType: "float",
                align: "right",
                editable: true,
                dataIndx: "n10",
                render: function (ui) {
                    var value = ui.rowData.n10;
                    return $.number(value, 2, ".", ",");
                },
            },
            {
                title: "Ngày 11",
                minWidth: 120,
                dataType: "float",
                align: "right",
                editable: true,
                dataIndx: "n11",
                render: function (ui) {
                    var value = ui.rowData.n11;
                    return $.number(value, 2, ".", ",");
                },
            },
            {
                title: "Ngày 12",
                minWidth: 120,
                dataType: "float",
                align: "right",
                editable: true,
                dataIndx: "n12",
                render: function (ui) {
                    var value = ui.rowData.n12;
                    return $.number(value, 2, ".", ",");
                },
            },
            {
                title: "Ngày 13",
                minWidth: 120,
                dataType: "float",
                align: "right",
                editable: true,
                dataIndx: "n13",
                render: function (ui) {
                    var value = ui.rowData.n13;
                    return $.number(value, 2, ".", ",");
                },
            },
            {
                title: "Ngày 14",
                minWidth: 120,
                dataType: "float",
                align: "right",
                editable: true,
                dataIndx: "n14",
                render: function (ui) {
                    var value = ui.rowData.n14;
                    return $.number(value, 2, ".", ",");
                },
            },
            {
                title: "Ngày 15",
                minWidth: 120,
                dataType: "float",
                align: "right",
                editable: true,
                dataIndx: "n15",
                render: function (ui) {
                    var value = ui.rowData.n15;
                    return $.number(value, 2, ".", ",");
                },
            },
            {
                title: "Ngày 16",
                minWidth: 120,
                dataType: "float",
                align: "false",
                editable: true,
                dataIndx: "n16",
                render: function (ui) {
                    var value = ui.rowData.n16;
                    return $.number(value, 2, ".", ",");
                },
            },
            {
                title: "Ngày 17",
                minWidth: 120,
                dataType: "float",
                align: "right",
                editable: true,
                dataIndx: "n17",
                render: function (ui) {
                    var value = ui.rowData.n17;
                    return $.number(value, 2, ".", ",");
                },
            },
            {
                title: "Ngày 18",
                minWidth: 120,
                dataType: "float",
                align: "right",
                editable: true,
                dataIndx: "n18",
                render: function (ui) {
                    var value = ui.rowData.n18;
                    return $.number(value, 2, ".", ",");
                },
            },
            {
                title: "Ngày 19",
                minWidth: 120,
                dataType: "float",
                align: "right",
                editable: true,
                dataIndx: "n19",
                render: function (ui) {
                    var value = ui.rowData.n19;
                    return $.number(value, 2, ".", ",");
                },
            },
            {
                title: "Ngày 20",
                minWidth: 120,
                dataType: "float",
                align: "right",
                editable: true,
                dataIndx: "n20",
                render: function (ui) {
                    var value = ui.rowData.n20;
                    return $.number(value, 2, ".", ",");
                },
            },
            {
                title: "Ngày 21",
                minWidth: 120,
                dataType: "float",
                align: "right",
                editable: true,
                dataIndx: "n21",
                render: function (ui) {
                    var value = ui.rowData.n21;
                    return $.number(value, 2, ".", ",");
                },
            },
            {
                title: "Ngày 22",
                minWidth: 120,
                dataType: "float",
                align: "right",
                editable: true,
                dataIndx: "n22",
                render: function (ui) {
                    var value = ui.rowData.n22;
                    return $.number(value, 2, ".", ",");
                },
            },
            {
                title: "Ngày 23",
                minWidth: 120,
                dataType: "float",
                align: "right",
                editable: true,
                dataIndx: "n23",
                render: function (ui) {
                    var value = ui.rowData.n23;
                    return $.number(value, 2, ".", ",");
                },
            },
            {
                title: "Ngày 24",
                minWidth: 120,
                dataType: "float",
                align: "right",
                editable: true,
                dataIndx: "n24",
                render: function (ui) {
                    var value = ui.rowData.n24;
                    return $.number(value, 2, ".", ",");
                },
            },
            {
                title: "Ngày 25",
                minWidth: 120,
                dataType: "float",
                align: "right",
                editable: true,
                dataIndx: "n25",
                render: function (ui) {
                    var value = ui.rowData.n25;
                    return $.number(value, 2, ".", ",");
                },
            },
            {
                title: "Ngày 26",
                minWidth: 120,
                dataType: "float",
                align: "right",
                editable: true,
                dataIndx: "n26",
                render: function (ui) {
                    var value = ui.rowData.n26;
                    return $.number(value, 2, ".", ",");
                },
            },
            {
                title: "Ngày 27",
                minWidth: 120,
                dataType: "float",
                align: "right",
                editable: true,
                dataIndx: "n27",
                render: function (ui) {
                    var value = ui.rowData.n27;
                    return $.number(value, 2, ".", ",");
                },
            },
            {
                title: "Ngày 28",
                minWidth: 120,
                dataType: "float",
                align: "right",
                editable: true,
                dataIndx: "n28",
                render: function (ui) {
                    var value = ui.rowData.n28;
                    return $.number(value, 2, ".", ",");
                },
            },
            {
                title: "Ngày 29",
                minWidth: 120,
                dataType: "float",
                align: "right",
                editable: true,
                dataIndx: "n29",
                render: function (ui) {
                    var value = ui.rowData.n29;
                    return $.number(value, 2, ".", ",");
                },
            },
            {
                title: "Ngày 30",
                minWidth: 120,
                dataType: "float",
                align: "right",
                editable: true,
                dataIndx: "n30",
                render: function (ui) {
                    var value = ui.rowData.n30;
                    return $.number(value, 2, ".", ",");
                },
            },
            {
                title: "Ngày 31",
                minWidth: 120,
                dataType: "float",
                align: "right",
                editable: true,
                dataIndx: "n31",
                render: function (ui) {
                    var value = ui.rowData.n31;
                    return $.number(value, 2, ".", ",");
                },
            },
        ],//-----------------------------------------Kết thúc các cột---------------------------------------
        pageModel: {type: "local", rPP: 100, strRpp: "{0}", strDisplay: "{0} đến {1} của {2}"},
        dataModel: {
            dataType: "JSON",
            location: "remote",
            recIndx: "sott",
            postData: {thangthongke:<?php echo $Thang; ?>},
            url: $dir_module_dmsanpham+"list_thongkethanhpham.php",//-- Load danh sách lên lưới
            getData: function (dataJSON) {
                var data = dataJSON.data;
                return { data: data };
            }
        }};
    var $gridngay = $("#grid_editing_thongkethanhpham").pqGrid(objngay);

    $gridngay.one("pqgridload", function (evt, ui) {
        $("#thangthongke").val(<?php echo $Thang; ?>);
    });
    // End grid theo ngày


    //-----------------------------Hết lưới---------------------------------------------------------------------

    //------------------------End lưới--------------------------------------
</script>
<div id="grid_editing_thongkethanhpham" style="margin:5px auto;border: 0px !important;"></div>
