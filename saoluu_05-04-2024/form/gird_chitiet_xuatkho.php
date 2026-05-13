<?php
$SoPhieu = $_GET['sophieu'];
$list = $_GET['list']
?>
<script>

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
        wrap: false,
        hwrap: false,
        resizable: true,
        columnBorders: true,
        numberCell: {show: true},
        track: true, //to turn on the track changes.
        //freezeRows: 1,
        sorting: 'local',
        sortIndx: 'mavt',
        sortDir: 'up',
        title: null,
        height: 200,
        width: 780,
        showBottom: false,
        selectionModel: {type: 'cell', mode: 'single'},
        filterModel: {
            on: true,
            mode: "AND",
            header: true
        }, // lọc dữ liệu trên header
        hoverMode: 'cell',
        editModel: {
//onBlur: 'validate',
            saveKey: $.ui.keyCode.ENTER
        },
        editor: {type: 'textbox', select: true,},
        validation: {
            icon: 'ui-icon-info'
        },
        colModel: [//-------------------------------------------Khai báo các cột trong lưới-----------------------
            {title: "SoTT", dataType: "integer", dataIndx: "sott", editable: false, width: 0, hidden: true,align: "center"},
            {title: "Mã VT", dataType: "string", dataIndx: "mavt", minWidth: 100, sortable: true, editable: false},
            {title: "Tên VT", minWidth: 180, dataType: "string", dataIndx: "tenvt", editable: false,},
            {title: "ĐVT", minWidth: 70, dataType: "string", align: "center", dataIndx: "dvt", editable: false,},
            {title: "Số lượng", minWidth: 70, dataType: "string", align: "right", dataIndx: "soluongnhap",
                render: function (ui) {
                    return FormatNumber(ui.rowData.soluongnhap);
                }
            },
            {title: "Đơn giá", minWidth: 85, dataType: "string", align: "right", dataIndx: "donggianhap",
                render: function (ui) {
                    return FormatNumber(ui.rowData.donggianhap);
                }
            },
            {title: "Thành tiền", minWidth: 100, dataType: "string", align: "right", dataIndx: "thanhtien", editable: false,
                render: function (ui) {
                    var thanhtien = ui.rowData.thanhtien; // Lấy số lượng nhập

                    return FormatNumber(thanhtien.toString());
                }
            },
            {title: "TS(%)", minWidth: 55, dataType: "integer", align: "center", dataIndx: "thuesuat", editable: true,
                render: function (ui) {
                    var rate = ui.rowData.thuesuat;
                    return rate + "%";
                }
            },
            {title: "Thuế", minWidth: 100, dataType: "integer", dataIndx: "thue", editable: false, align: "right",
                render: function (ui) {
                    var rate = ui.rowData.thue;

                    return FormatNumber(rate.toString());
                }
            },
            {title: "CK(%)", minWidth: 55, dataType: "string", align: "center", dataIndx: "chietkhau",
                render: function (ui) {

                    return (ui.rowData.chietkhau)+"%";
                }
            },
            {title: "Chiết khấu", minWidth: 55, dataType: "string", align: "right", dataIndx: "tienchietkhau",
                render: function (ui) {

                    return FormatNumber(ui.rowData.tienchietkhau);
                }
            }

        ],//-----------------------------------------Kết thúc các cột---------------------------------------
        dataModel: {
            dataType: "JSON",
            location: "remote",
            recIndx: "sott",
            url: $dir_module_chitiet_vattu + "list_danhsachdakho.php",//-- Load danh sách lên lưới
            postData: {sophieu: "<?php echo $SoPhieu; ?>",list:<?php echo $list; ?>},
            getData: function (dataJSON) {
                var data = dataJSON.data;
                return { curPage: dataJSON.curPage, totalRecords: dataJSON.totalRecords, data: data };
            }
        },
        cellBeforeSave: function (evt, ui) {
            var $grid = $(this);
            var isValid = $grid.pqGrid("isValid", ui);
            if (!isValid.valid) {
                return false;
            }
        },
//make rows editable selectively.
        editable: function (ui) {
            var $grid = $(this);
            var rowIndx = ui.rowIndx;
            if ($grid.pqGrid("hasClass", {rowIndx: rowIndx, cls: 'pq-row-edit'}) == true) {
                return true;
            }
            else {
                return false;
            }
        }
    };
    var $grid = $("#grid_editing_chitiet_nhapkho").pqGrid(obj);

    //-----------------------------Hết lưới---------------------------------------------------------------------

    //------------------------End lưới--------------------------------------
</script>
<div id="grid_editing_chitiet_nhapkho" style="margin:5px auto;border: 0px !important;"></div>
