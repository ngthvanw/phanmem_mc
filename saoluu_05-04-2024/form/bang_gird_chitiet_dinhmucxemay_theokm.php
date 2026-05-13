<?php
session_start();
$masp = $_GET['masp'];
$list = $_GET['list'];
$loaidinhmucsp = $_GET['loaidinhmucsp'];
$soluongspuocluong = $_GET['soluongspuocluong'];
?>
<script>

    //--------------------------------Khai báo lưới---------------------------------------.
    var objnc = {
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
                allowInvalid: true,
                saveKey: $.ui.keyCode.ENTER
            },
            editor: {
                select: true
            },
            title: "Danh sách loại đường (INSERT: Lấy danh sách , ENTER: Sửa và Lưu)",
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

                $dinhmuc = parseFloat(rowData.sokm);
                $tylehaohoc = parseFloat(rowData.litkmdau);

                $dinhmuckecakhauhao = ($dinhmuc * $tylehaohoc);
                rowData.tongdau = ($dinhmuckecakhauhao);
                rowData.masp = <?php echo $masp; ?>;

                if (true) {
                    $.ajax({
                        url: $dir_module_dmsanpham + "edit_chitiet_xemay.php",
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
                    title: "Mã đường", dataType: "string", dataIndx: "maloaiduong", width: 80, sortable: true, editable: false,
                    filter: {
                        type: 'textbox',
                        condition: 'begin',
                        listeners: ['keyup']
                    }
                },
                {
                    title: "Tên đường", width: 200, dataType: "string", dataIndx: "tenduong", editable: false,
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
                    title: "ĐVT", width: 70, dataType: "string", align: "center", dataIndx: "dvt", editable: false,hidden: true,
                    validations: [
                        {type: 'minLen', value: 1, msg: "Đơn vị tính chính không được trống !"},
                    ]
                },
                {
                    title: "số kilomet",
                    width: 80,
                    dataType: "float",
                    align: "right",
                    editable: true,
                    dataIndx: "sokm",
                    render: function (ui) {
                        var val = ui.rowData.sokm;
                        return $.number(val,2,".",",");;
                    }
                },
                {
                    title: "Lít/Km dầu", width: 70, dataType: "float", align: "right", dataIndx: "litkmdau",
                    render: function (ui) {
                        var val = ui.rowData.litkmdau;
                        return $.number(val,2,".",",");
                    }
                },
                {
                    title: "Tổng dầu",
                    width: 85,
                    dataType: "string",
                    align: "right",
                    editable: false,
                    dataIndx: "tongdau",
                    render: function (ui) {
                        var val = ui.rowData.tongdau;
                        return $.number(val,4,".",",");
                    }

                },
                {
                    title: "Tổng dầu ước lượng",
                    width: 85,
                    dataType: "string",
                    align: "right",
                    editable: false,
                    render: function (ui) {
                        var val = (ui.rowData.tongdau);
                        return $.number(val*<?php echo $soluongspuocluong; ?>,4,".",",");
                    }

                }
            ],
            pageModel: {type: "local", rPP: 100, strRpp: "{0}", strDisplay: "{0} đến {1} của {2}"}
            ,
            dataModel: {
                dataType: "JSON",
                location: "remote",
                recIndx: "sott",
                url: $dir_module_dmsanpham + "listdinhmuc_xemay.php",//-- Load danh sách lên lưới
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

    function calculateSummary() {
        arrayData = tongtiendauky();
        $tongduno = arrayData.data.duno;
        $tongduco = arrayData.data.duco;
        if($tongduno!=$tongduco){
            //alert("Tổng dư nợ và tổng dư có không bằng nhau !");
        }
        totalData = { matk: "", tentk: "<b>TỔNG CỘNG</b>", tenduong:'TỔNG CỘNG',sokm: $tongduno, tongdau: $tongduco, pq_rowcls: 'green' };
    }
    var $summary = "";

    objnc.render = function (evt, ui) {
        $summary = $("<div class='pq-grid-summary'  ></div>")
            .prependTo($(".pq-grid-bottom", this));
        calculateSummary();
    }

    objnc.cellSave = function (evt, ui) {
        calculateSummary();
        objnc.refresh.call(this);
    }

    objnc.refresh = function (evt, ui) {
        var data = [totalData]; //JSON (array of objects)
        var obj = { data: data, $cont: $summary }
        $(this).pqGrid("createTable", obj);
    }

    $("#grid_editing_chitiet_nhapkho").pqGrid(objnc);

    function tongtiendauky() {
        $data=""
        $.ajax({// Kiểm tra xem STT có tồn tại hay không
            url: $dir_module_dmsanpham + "tongtien_xemay.php",
            async: false,
            data:{masp:<?php echo $masp; ?>,loaidinhmucsp:<?php echo $loaidinhmucsp; ?>},
            success: function (response) {
                $data = $.parseJSON(response);
            }
        });
        return $data;
    }

    //-----------------------------Hết lưới---------------------------------------------------------------------

    //------------------------End lưới--------------------------------------
    setTimeout(function () {
        $("#grid_editing_chitiet_nhapkho .pq-search-hd-field").focus();
    }, 500);
</script>
<div id="grid_editing_chitiet_nhapkho" style="margin:5px auto;border: 0px !important;"></div>
