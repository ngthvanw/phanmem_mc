<?php
session_start();
$masp = $_GET['masp'];
$list = $_GET['list'];
$loaidinhmucsp = $_GET['loaidinhmucsp'];
$soluongspuocluong = $_GET['soluongspuocluong'];
?>
<script>

    //--------------------------------Khai báo lưới---------------------------------------.
    var objmavt = {
            hwrap: false,
            //resizable: true,
            rowBorders: true,
            virtualX: true, virtualY: true,
            resizable: true,
            height: getHeight() - 200,
            numberCell: {show: true},
            filterModel: {on: true, mode: "AND", header: true},
            trackModel: {on: true}, //to turn on the track changes.
            scrollModel: {
                autoFit: true
            },
            editModel: {
                allowInvalid: false,
                saveKey: $.ui.keyCode.ENTER
            },
            editor: {
                select: true
            },
            title: "Danh sách nguyên vật liệu (INSERT: Lấy danh sách , ENTER: Sửa và Lưu)",
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
                    oldRow = obj.oldRow,
                    type = obj.type,
                    rowData = obj.rowData;
                rowIndx = obj.rowIndx;

                $dinhmuc = parseFloat(rowData.dinhmuc);
                $tylehaohoc = parseFloat(rowData.tylehaohoc);

                $dinhmuckecakhauhao = ($dinhmuc + ($dinhmuc * ($tylehaohoc / 100)));
                rowData.dinhmuckecakhauhao = $dinhmuckecakhauhao;

                if (true) {
                    $.ajax({
                        url: $dir_module_dmsanpham + "edit_chitiet.php",
                        data: rowData,
                        dataType: "json",
                        type: "GET",
                        async: true,
                        success: function (res) {
                            $grid.pqGrid("refreshRow", {rowIndx: rowIndx});
                        },
                        complete: function () {
                            $grid.pqGrid("refreshRow", {rowIndx: rowIndx});
                        }
                    });
                }
            },
            colModel: [//-------------------------------------------Khai báo các cột trong lưới-----------------------
                {
                    title: "SoTT",
                    dataType: "integer",
                    dataIndx: "sott",
                    editable: false,
                    width: 0,
                    hidden: true,
                    align: "center"
                },
                {
                    title: "Mã VT", dataType: "string", dataIndx: "mavt", width: 80, sortable: true, editable: false,
                    filter: {
                        type: 'textbox',
                        condition: 'begin',
                        listeners: ['keyup']
                    }
                },
                {
                    title: "Tên VT", width: 200, dataType: "string", dataIndx: "tenvt", editable: false,
                    validations: [
                        {type: 'minLen', value: 1, msg: "Tên vật tư hàng hóa không được trống !"}
                    ],
                    filter: {
                        type: 'textbox',
                        condition: 'begin',
                        listeners: ['keyup']
                    }
                },
                {
                    title: "ĐVT", width: 70, dataType: "string", align: "center", dataIndx: "dvt", editable: false,
                    validations: [
                        {type: 'minLen', value: 1, msg: "Đơn vị tính chính không được trống !"},
                    ]
                },
                {
                    title: "Định mức",
                    width: 80,
                    dataType: "float",
                    align: "right",
                    editable: true,
                    dataIndx: "dinhmuc",
                },
                {
                    title: "(%) Hao hụt", width: 70, dataType: "float", align: "right", dataIndx: "tylehaohoc",
                },
                {
                    title: "ĐM có hao hụt",
                    width: 85,
                    dataType: "string",
                    align: "right",
                    editable: false,
                    dataIndx: "dinhmuckecakhauhao",
                    render: function (ui) {
                        var val = ui.rowData.dinhmuckecakhauhao;
                        return parseFloat(val).toFixed(<?php echo (int)($_SESSION['txthienthisole']); ?>);
                    }

                },
                {
                    title: "ĐM ước lượng",
                    width: 85,
                    dataType: "string",
                    align: "right",
                    editable: false,
                    render: function (ui) {
                        var val = parseFloat(ui.rowData.dinhmuckecakhauhao).toFixed(<?php echo (int)($_SESSION['txthienthisole']); ?>);
                        return parseFloat(val*<?php echo $soluongspuocluong; ?>).toFixed(<?php echo (int)($_SESSION['txthienthisole']); ?>);
                    }

                }
            ],
            pageModel: {type: "local", rPP: 100, strRpp: "{0}", strDisplay: "{0} đến {1} của {2}"}
            ,
            dataModel: {
                dataType: "JSON",
                location: "remote",
                recIndx: "sott",
                url: $dir_module_dmsanpham + "listdinhmuc_sanpham.php",//-- Load danh sách lên lưới
                postData: {
                    masp: <?php echo $masp; ?>,
                    list:<?php echo $list; ?>,
                    loaidinhmucsp:<?php echo $loaidinhmucsp; ?>
                }
                ,
                getData: function (dataJSON) {
                    var data = dataJSON.data;
                    return {data: data};
                }
            }
        }
        ;
    $("#grid_editing_chitiet_nhapkho").pqGrid(objmavt);

    //-----------------------------Hết lưới---------------------------------------------------------------------

    //------------------------End lưới--------------------------------------
    setTimeout(function () {
        $("#grid_editing_chitiet_nhapkho .pq-search-hd-field").focus();
    }, 500);
</script>
<div id="grid_editing_chitiet_nhapkho" style="margin:5px auto;border: 0px !important;"></div>
