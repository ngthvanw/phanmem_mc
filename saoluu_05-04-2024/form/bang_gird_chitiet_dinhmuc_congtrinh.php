<?php
session_start();
$masp = $_GET['masp'];
$mahm = $_GET['mahm'];
$xemtonghop = $_GET['xemtonghop'];
$list = $_GET['list'];
?>
<script>

    //--------------------------------Khai báo lưới---------------------------------------.
    var objmavt = {
            hwrap: false,
            //resizable: true,
            rowBorders: true,
            virtualX: true, virtualY: true,
            resizable: true,
            height: getHeight() - 247,
            numberCell: {show: true},
            filterModel: {on: true, mode: "AND", header: true},
            trackModel: {on: true}, //to turn on the track changes.
            scrollModel: {
                autoFit: true
            },
            editModel: {
                allowInvalid: true,
                saveKey: $.ui.keyCode.ENTER
            },
            editor: {
                select: true
            },
            title: "Danh sách vật tư (INSERT: Lấy danh sách , ENTER: Sửa và Lưu)",
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

                $soluong = parseFloat(rowData.soluong);
                $dongia = parseFloat(rowData.dongia);
                //$tylehaohoc = parseFloat(rowData.tylehaohoc);

                $thanhtien = ($soluong * $dongia);
                rowData.thanhtien = $thanhtien;

                if (true) {
                    $.ajax({
                        url: $dir_module_dmsanpham + "edit_chitiet_ct_vatlieu.php",
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
                    title: "Số lượng",
                    width: 80,
                    dataType: "float",
                    align: "center",
                    editable: true,
                    dataIndx: "soluong",
                },
                {
                    title: "Đơn giá", width: 70, dataType: "float", align: "right", dataIndx: "dongia",
                    render: function (ui) {
                        var val = ui.rowData.dongia;
                        return $.number(val, 0, ".", ",");
                    }
                },
                {
                    title: "Thành tiền",
                    width: 85,
                    dataType: "string",
                    align: "right",
                    editable: false,
                    dataIndx: "thanhtien",
                    render: function (ui) {
                        var val = ui.rowData.thanhtien;
                        return $.number(val, 0, ".", ",");
                    }

                },
                {
                    title: "Thuế", width: 70, dataType: "float", align: "right", dataIndx: "thue",
                    render: function (ui) {
                        var val = ui.rowData.thue;
                        return $.number(val, 0, ".", ",");
                    }
                },
            ],
            pageModel: {type: "local", rPP: 100, strRpp: "{0}", strDisplay: "{0} đến {1} của {2}"}
        };
    var arrayData = tongtiendauky();
    objmavt.dataModel={
        dataType: "JSON",
        location: "remote",
        recIndx: "sott",
        url: $dir_module_dmsanpham + "listdinhmuc_ct_vatlieu.php",//-- Load danh sách lên lưới
        postData: {
            masp: <?php echo $masp; ?>,
            mahm: <?php echo $mahm; ?>,
            xemtonghop: <?php echo $xemtonghop; ?>,
            list:<?php echo $list; ?>}
        ,getData: function (dataJSON) {
            var data = dataJSON.data;
            return {data: data};
        }
    }
    var totalData = 0;
    //calculate sum of 3rd and 4th column.
    function calculateSummary() {
        var soluong = arrayData.data.tongsoluong;
            thanhtien = arrayData.data.tongthanhtien;

        totalData = { tenvt: "<b>Tổng cộng</b>", mavt: "", soluong: soluong, thanhtien: thanhtien, pq_rowcls: 'green' };
    }

    var $summary = "";
    objmavt.render = function (evt, ui) {
        $summary = $("<div class='pq-grid-summary'  ></div>")
            .prependTo($(".pq-grid-bottom", this));
        calculateSummary();
    }
    objmavt.cellBeforeSave = function (evt, ui) {
        //debugger;
        var cd = ui.newVal;
        if (cd == "") {
            return false;
        }
    }
    //refresh summary whenever a value in any cell changes.
    objmavt.cellSave = function (evt, ui) {
        calculateSummary();
        objmavt.refresh.call(this);
    }
    objmavt.refresh = function (evt, ui) {
        var data = [totalData]; //JSON (array of objects)
        var objmavt = { data: data, $cont: $summary }
        $(this).pqGrid("createTable", objmavt);
    }
    $("#grid_editing_chitiet_nhapkho").pqGrid(objmavt);
    function tongtiendauky() {
        $data=""
        $.ajax({// Kiểm tra xem STT có tồn tại hay không
            url: $dir_module_dmsanpham + "tongtiendauky.php",
            async: false,
            data:{ masp: <?php echo $masp; ?>,
                   mahm: <?php echo $mahm; ?>,
                   xemtonghop: <?php echo $xemtonghop; ?>,
                   list:<?php echo $list; ?>},
            success: function (response) {
                $data = $.parseJSON(response);
            }
        });
        return $data;
    }

    //-----------------------------Hết lưới---------------------------------------------------------------------

    //------------------------End lưới--------------------------------------
    setTimeout(function(){
        $("#grid_editing_chitiet_nhapkho .pq-search-hd-field").focus();
    },500);
</script>
<div id="grid_editing_chitiet_nhapkho" style="margin:5px auto;border: 0px !important;"></div>
