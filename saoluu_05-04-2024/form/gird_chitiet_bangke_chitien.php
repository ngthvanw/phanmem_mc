<?php
    $mabangke = $_GET['mabangke'];
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
    $dir_module_bangkechitien = "modules/bangkechitien/";//----------------Lưới
    var obj = {
        wrap: true,
        hwrap: true,
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
        width: 700,
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
            {title: "Số hiệu", dataType: "string", dataIndx: "sott", minWidth: 100, sortable: true, editable: false,align: "center"},
            {title: "Ngày tháng", dataType: "string", dataIndx: "ngaychi", minWidth: 100, sortable: true, editable: false,
                render: function (ui) {
                    var $yyyy_mm_dd = ui.rowData.ngaychi;
                    return Format_dd_mm_yyyy($yyyy_mm_dd);
                },},
            {title: "Nội dung chi", minWidth: 300, dataType: "string", dataIndx: "noidungchi", editable: false},
            {title: "Số tiền", minWidth: 100, dataType: "string", align: "right", dataIndx: "sotien",
                render: function (ui) {
                    return $.number(ui.rowData.sotien,0,".",",");
                }
            },
            {
                title: "", editable: false, minWidth: 60, sortable: false,
                render: function (ui) {
                    return "<button type='button' class='delete_btn'>Xoá</button>";
                }
            }

        ],//-----------------------------------------Kết thúc các cột---------------------------------------
        dataModel: {
            dataType: "JSON",
            location: "remote",
            recIndx: "sott",
            url: $dir_module_bangkechitien + "listall_bangke_chitien.php",//-- Load danh sách lên lưới
            postData: {mabangke: "<?php echo $mabangke; ?>"},
            getData: function (dataJSON) {
                var data = dataJSON.data;
                return {data: data };
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
        },
        refresh: function () {
            $("#grid_editing_chitiet_nhapkho").find("button.delete_btn").button({icons: {primary: 'ui-icon-scissors'}})
                .unbind("click")
                .bind("click", function (evt) {
                    var $tr = $(this).closest("tr");
                    var rowIndx = $grid.pqGrid("getRowIndx", {$tr: $tr}).rowIndx;
                    var rowData = $("#grid_editing_chitiet_nhapkho").pqGrid( "getRowData", {rowIndx: rowIndx} );
                    $sott = rowData.sott;
                    res = confirm("Bạn có muốn xoá dòng này không ?");
                    if (res) {
                        $.ajax({// Load danh sách mã khách hàng
                            url: $dir_module_bangkechitien + "del.php",
                            async: false,
                            dataType: "json",
                            data: {sott:$sott},
                            success: function (response) {
                                $grid.pqGrid("deleteRow", {rowIndx: rowIndx});
                            }
                        });
                        $grid.pqGrid("deleteRow", {rowIndx: rowIndx});
                    }
                });
        }
    };
    var $grid = $("#grid_editing_chitiet_nhapkho").pqGrid(obj);

    //-----------------------------Hết lưới---------------------------------------------------------------------

    //------------------------End lưới--------------------------------------
</script>
<div id="grid_editing_chitiet_nhapkho" style="margin:5px auto;border: 0px !important;"></div>
