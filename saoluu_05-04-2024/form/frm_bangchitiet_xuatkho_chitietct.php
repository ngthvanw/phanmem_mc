<?php
$SoPhieu = $_GET['sophieu'];
$list = $_GET['list'];
$cothuegtgt = 0;
$cochietkhau =0;
$baogomthue = 0;
$mact = $_GET['mact'];
$ngayghiso = $_GET['ngayghiso'];
$thang_ngayghiso = date("n",strtotime($ngayghiso));
?>
<style>
    tr td.green{
        background-color:rgba(143,230,74,0.53);
    }
</style>
<script>
    $height = getHeight();
    $width = getWidth();
    $dir_module_makho = "modules/makho/";////////////////Khai báo đường dẫn vào mudole
    $dir_module_manoidung = "modules/manoidung/";
    $(function () {
        $dir_module_chitiet_vattu = "modules/ps_chitiet_mavt/";//--------------------------------------------Thay đổi khi copy
        function xoadialog_bangchitiet_nhapkho() { // ----------------------đóng form
            reset_dialog(".dialog-bangchitiet_nhapkho");
            reset_dialog(".dialog_main_bangchitiet_nhapkho");
        }

        $("#dialog-bangchitiet_nhapkho").dialog({ // ------------------Gọi dialog
            resizable: false,
            height: $height,
            width: $width - 55,
            modal: true

        });
        //-------------------------Lưới-----------------------------------------
        $("#grid_editing_nhapchitiet_nhapkho").keydown(function (event) {//--------------Các phím tắt
            var $grid_pb = $("#grid_editing_nhapchitiet_nhapkho").closest('.pq-grid');//---- Lưới----------------
            if (event.keyCode == Keys.F2) {
                var rowSelect = getRowSelect();//------ Lấy đối tượng được chọn
                if (rowSelect == false) {
                    alert_f("Chú Ý", "fa fa-warning", "red", "Bạn cần chọn dữ liệu trước khi thực hiện !");
                }
            }
            var rowEditting = $("#grid_editing_nhapchitiet_nhapkho").pqGrid("getRowsByClass", {cls: 'pq-row-edit'});//---Lấy đối tượng đang sửa
            if ($('div').hasClass('jconfirm') == false) {
                if (event.keyCode == Keys.F4) {
                    //addRow($grid_pb);
                    $(".dialog_main_mavt_select_tk").load("form/frm_dm_mavt_select_tk.php");
                }
                if (event.keyCode == Keys.INSERT) { // Hủy bỏ hàng đang xóa
                    $("#dialog-bangchitiet_nhapkho").load("form/gird_bangchitiet_xuatkho_chitietct.php?list=1&sophieu=<?php echo $SoPhieu; ?>&thuegtgt=<?php echo $cothuegtgt; ?>&cochietkhau=<?php echo $cochietkhau; ?>&baogomthue=<?php echo $baogomthue; ?>&ngayghiso=<?php echo $ngayghiso; ?>&mact=<?php echo $mact; ?>");
                }
                if ((event.keyCode == Keys.ESCAPE) && $('div').hasClass('jconfirm') == false && rowEditting.length < 1) {
                    $tientonghop = $("#sotien1").val();
                    $data = tongtienhienco();
                    $tongtien = $data.thanhtien;
                    if($tientonghop!=$tongtien){
                        var thongbao="Chi tiết và tổng hợp không bằng nhau ! Bạn có muốn tiên tục thực hiện ?";
                        if(confirm(thongbao)){
                            xoadialog_bangchitiet_nhapkho();
                        }
                    }else{
                        xoadialog_bangchitiet_nhapkho();
                    }

                }
            } else {
                return false;
            }
        }); // end phím tắt

        //----------------------------------------------------Bắt đầu lưới-----------------------------------------

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
        function addRow($grid, $obj_addrow="") {
            if (isEditing($grid)) {
                return false;
            }
//append empty row in the first row.
            if ($obj_addrow != "") {
                var rowData = $obj_addrow;
            } else {
                var rowData = {
                    mavt: "000001",
                    tenvt: "Trà",

                    dvt: "Lon",

                    slton: "100",
                    slcu: "0",
                    soluong: "100",
                    dongia: "120000",
                    thanhtien: "0",
                    thuesuat: "0",
                    thue: "0",
                    chietkhau: "0",
                    tienchietkhau: "10",

                }; //empty row template
            }
            $grid.pqGrid("addRow", {rowIndxPage: 0, rowData: rowData});

            var $tr = $grid.pqGrid("getRow", {rowIndxPage: 0});
            if ($tr) {
//simulate click on edit button.
                $tr.find("button.edit_btn").click();
            }
        }

        //----------------------------Hàm xóa dữ kiệu------------------------------------------
        function deleteRow(rowIndx, $grid) {
            $grid.pqGrid("addClass", {rowIndx: rowIndx, cls: 'pq-row-delete'});
            var rowData = $grid.pqGrid("getRowData", {rowIndx: rowIndx});
//var ans = window.confirm("Bạn có muốn xóa dòng số " + (rowIndx + 1) + " không ?");
            if ($('div').hasClass('jconfirm') == false) {
                $.confirm({
                    title: "Chú ý", icon: "fa fa-times-circle", type: "red",
                    content: "Bạn có muốn xóa hàng số" + (rowIndx + 1) + "  không ?" + '<br/>Nhấn phím <strong style="color:blue;">[Y]</strong> để đồng ý phím <strong style="color:red;">[N]</strong> để hủy bỏ ',
                    buttons: {
                        "Đồng ý": {
                            keys: ['Y'], action: function () {
                                $grid.pqGrid("deleteRow", {rowIndx: rowIndx, effect: true});

                                var sott = $grid.pqGrid("getRecId", {rowIndx: rowIndx});
                                var rowData = ( $grid.pqGrid("getRowData", {rowIndx: rowIndx}));
                                var ma = rowData.mavt;

                                $.ajax($.extend({}, ajaxObj, {
                                    context: $grid,
                                    url: $dir_module_chitiet_vattu + "del.php",
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
                                $grid.pqGrid("removeClass", {rowIndx: rowIndx, cls: 'pq-row-delete'});
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
            var dataIndex = 1;

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

        function ThanhTien($SoLuong, $DonGia, $TienChietKhau, $ThanhTienNhap) {
            $soluong = parseFloat($SoLuong);// Lấy số lượng nhập vào

            $dongia = parseFloat($DonGia);// Lấy đơn giá nhập vào

            $chietkhau = parseFloat($TienChietKhau);
            $thanhtien = Math.round(($soluong * $dongia)); // thành tiền  = bằng số lượng * đơn giá (Làm tròn thành tiền)
            //alert($ThanhTienNhap);
            if ($ThanhTienNhap == 0 || $ThanhTienNhap == $thanhtien || $ThanhTienNhap == "" || isNaN($ThanhTienNhap) == true) {
                return $thanhtien
            } else {
                return $ThanhTienNhap;
            }
        }

        function Thue($thanhtien, $PhanTramThue, $TienThueNhap, $TienChietKhau, $ThanhTienNhap) {

            $thanhtien = $thanhtien;

            $tienthue = Math.round($thanhtien * ($PhanTramThue / 100)); // Tiền thuế = Thành tiền * % thuế xuất (Làm tròn tiền thuế)

            if ($TienThueNhap == 0 || $TienThueNhap == $tienthue || $TienThueNhap == "" || isNaN($TienThueNhap) == true) {
                return $tienthue
            } else {
                return $TienThueNhap;
            }
        }

        function ChietKhau($SoLuong, $DonGia, $PhanTram, $TienChietKhauNhap, $ThanhTienNhap) {
            $thanhtien = ThanhTien($SoLuong, $DonGia, 0, $ThanhTienNhap);
            $tienchietkhau = Math.round($thanhtien * ($PhanTram / 100)); // Tiền thuế = Thành tiền * % thuế xuất (Làm tròn tiền thuế)
            if ($TienChietKhauNhap == 0 || $TienChietKhauNhap == $tienchietkhau || $TienChietKhauNhap == "" || isNaN($TienChietKhauNhap) == true) {
                return $tienchietkhau
            } else {
                return $TienChietKhauNhap;
            }
        }

        function ChietKhau($SoLuong, $DonGia, $PhanTram, $TienChietKhauNhap, $ThanhTienNhap) {
            $thanhtien = ThanhTien($SoLuong, $DonGia, 0, $ThanhTienNhap);
            $tienchietkhau = Math.round($thanhtien * ($PhanTram / 100)); // Tiền thuế = Thành tiền * % thuế xuất (Làm tròn tiền thuế)
            if ($TienChietKhauNhap == 0 || $TienChietKhauNhap == $tienchietkhau || $TienChietKhauNhap == "" || isNaN($TienChietKhauNhap) == true) {
                return $tienchietkhau
            } else {
                return $TienChietKhauNhap;
            }
        }

        function TinhTonKho($SLTon, $SLNhap, $SLCu) {
            $SLHienTai = parseFloat($SLNhap) - parseFloat($SLCu);
            $TonHienTai = parseFloat($SLTon) - ($SLHienTai);
            return $TonHienTai;
        }

        //--------------------------------Khai báo lưới---------------------------------------.
        var objxuatctct = {
            hwrap: false,
            resizable: true,
            rowBorders: true,
            height: $height - 75,
            width: $width - 70,
            virtualX: true,
            numberCell: {show: true},
            filterModel: {on: true, mode: "AND", header: true},
            trackModel: {on: true}, //to turn on the track changes.

            scrollModel: {
                autoFit: true
            },
            toolbar: {
                items: [
                    {
                        type: 'button', icon: 'ui-icon-refresh', label: 'Cập nhật số lượng còn lại', listeners: [
                        {
                            "click": function (evt, ui) {
                                $.confirm({
                                    title: 'Cập nhật thành công',
                                    type: 'green',
                                    autoClose: 'OK|1000',
                                    content: 'url:themsltk_hientai.php',
                                    contentLoaded: function (data, status, xhr) {
                                    },
                                    buttons: {
                                        "OK": {
                                            keys: ['Y'], action: function () {
                                                $("#grid_editing_nhapchitiet_nhapkho").pqGrid("refreshDataAndView");
                                            }
                                        }
                                    }
                                });
                            }
                        }
                    ]
                    },
                    {

                        type: function () {
                            $data = tongtienhienco();
                            $tongtien = $data.thanhtien;
                            $soluong = $data.soluong;
                            $string = "Thành tiền "+$.number($tongtien,0,".",",")+" - Số lượng: "+$.number($soluong,2,".",",");
                            return "<span id='tongtienhienco' style='color:red'>"+$string+"</span>";
                        }
                    }
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
                    oldRow = obj.oldRow,
                    type = obj.type,
                    rowData = obj.rowData;
                rowIndx = obj.rowIndx;

                $thanhtiencu = oldRow.thanhtien;
                $thientienmoi = newRow.thanhtien

                $soluongcu = oldRow.soluong;
                $soluongmoi = newRow.soluong;

                $donggiacu = oldRow.dongia;
                $donggiamoi = newRow.dongia;

                $soluong = parseFloat(rowData.soluong.toString().split(",").join(""));// Lấy số lượng nhập vào

                $dongia = parseFloat(rowData.dongia.toString().split(",").join(""));// Lấy đơn giá nhập vào

                $thanhtiennhap = parseFloat(rowData.thanhtien.toString().split(",").join(""));

                if (($soluongcu != $soluongmoi) || $donggiacu != $donggiamoi) {
                    $thanhtiennhap = 0;
                }

                $thanhtien = ThanhTien($soluong, $dongia,0,$thanhtiennhap); // Đưa thành tiền vào mảng

                rowData.thanhtien = $thanhtien;
                rowData.sophieu = <?php echo $SoPhieu; ?>;

                var SLTon = rowData.soluongton; // lấy số lượng tồn
              var soluong = rowData.soluong.toString().split(",").join("");// Lấy số lượng nhập

               var soluongcu = rowData.slcu.toString().split(",").join("");// Lấy số lượng nhập
                var str = rowData.donggianhap; // Lấy đơn giá nhập
                try{
                    var donggia = str.toString().split(",").join("");
                }catch (e) {
                    var donggia = 0;
                }

                    $dongiatinh = ($thanhtien/$soluong);
                    $dongiatinh = $dongiatinh.toFixed(3);
                    rowData.dongia = $dongiatinh.toString();

                rowData.soluongton = TinhTonKho(SLTon, soluong, soluongcu);

                if(rowData.mact==""){
                    rowData.mact = "<?php echo $mact ?>";
                }
                rowData.slcu = soluong;

                if (true) {
                    $.ajax({
                        url: $dir_module_chitiet_vattu + "edit_ctct.php",
                        data: rowData,
                        dataType: "json",
                        type: "GET",
                        async: true,

                        success: function (res) {
                            if (res.recId != "success")
                                rowData.sott = res.recId;
                            $grid.pqGrid("refreshRow", {rowIndx: rowIndx});
                            tongtienhienco();
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
                    },
                    render: function (ui) {
                        var rowData = ui.rowData,
                            dataIndx = ui.dataIndx;

                        rowData.pq_cellcls = rowData.pq_cellcls || {};
                        if (rowData.sott!=0) {//if change is negative.
                            rowData.pq_cellcls[dataIndx] = 'green';
                            return rowData.mavt;
                        }
                        else { //if change >= 0
                            return  rowData.mavt;
                        }
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
                    title: "SL còn lại",
                    width: 80,
                    dataType: "string",
                    align: "center",
                    align: "right",
                    editable: false,
                    dataIndx: "soluongton",
                    editor: {
                        type: formart_num
                    },
                    render: function (ui) {// Hiện số tiền tính toán lên lưới
                        return $.number(ui.rowData.soluongton,2,'.',',');
                    }
                },
                {
                    title: "Số lượng", width: 70, dataType: "string", align: "right", dataIndx: "soluong",
                    editor: {
                        type: "number"
                    },
                    validations: [
                        {type: 'minLen', value: 1, msg: "Số Lượng nhập không được trống !"},
                    ],
                    render: function (ui) {
                        return $.number(ui.rowData.soluong,3,".",",");
                    }
                },
                {
                    title: "Đơn giá", width: 85, dataType: "string", align: "right", dataIndx: "dongia",
                    editor: {
                        type: "number"
                    },
					editable: true,
                    validations: [
                        {type: 'minLen', value: 1, msg: "Đơn giá không được trống !"},
                        {type: 'maxLen', value: 16, msg: "Giá mua phải nhỏ hơn 17 số !"},
                    ],
                    render: function (ui) {

                        return $.number(ui.rowData.dongia,3,".",",");
                    }
                },
                {
                    title: "Thành tiền",
                    width: 110,
                    dataType: "string",
                    align: "right",
                    dataIndx: "thanhtien",
                    editable: true,
                    editor: {
                        type: "number"
                    },
                    render: function (ui) {// Hiện số tiền tính toán lên lưới
                        return $.number(ui.rowData.thanhtien,0,".",",");
                    }
                },
                {
                    title: "Mã CT",
                    width: 110,
                    dataType: "string",
                    align: "left",
                    dataIndx: "mact",
                    editable: true,
                    editor: {
                        type: "textbox",
                        cls: "listmacongtrinh",
                        attr: "list='listmacongtrinh' id='idlistmacongtrinh'"
                    },
                    validations: [
                        {type: 'minLen', value: 1, msg: "Mã công trình không được trống !"},
                    ],
                },
            ],
            pageModel: {type: "remote", rPP: 200},
            dataModel: {
                dataType: "JSON",
                location: "remote",
                recIndx: "sott",
                url: $dir_module_chitiet_vattu + "listxuatkho_chitietct.php",//-- Load danh sách lên lưới
                postData: {
                    sophieu: "<?php echo $SoPhieu; ?>",
                    list: "<?php echo $list; ?>",
                    cothuegtgt: "<?php echo $cothuegtgt; ?>",
                    cochietkhau: "<?php echo $cochietkhau; ?>",
                    mact: "<?php echo $mact; ?>"
                },
                getData: function (dataJSON) {
                    var data = dataJSON.data;
                    return {curPage: dataJSON.curPage, totalRecords: dataJSON.totalRecords, data: data};
                }
            }
        };
        var $grid = $("#grid_editing_nhapchitiet_nhapkho").pqGrid(objxuatctct);

        $grid.one("pqgridload", function (evt, ui) {
            $("#grid_editing_nhapchitiet_nhapkho .pq-search-txt").focus();
            tongtienhienco();
        });

        function getRowSelect() { // --------------------Lấy dữ liệu theo dòng trên gird----------------------
            var arr = $("#grid_editing_nhapchitiet_nhapkho").pqGrid("selection", {
                type: 'cell',
                method: 'getSelection'
            }); //Lấy giá trị đang chọn
            if (arr && arr.length > 0) {
                return arr;
            } else {
                return false;
            }
        }

        function tongtienhienco(){
            var $data;
            $.ajax({// Kiểm tra xem STT có tồn tại hay không
                url: $dir_module_chitiet_vattu + "tongtienhientaicuaphieunhap_ctct.php",
                data: {sophieu: <?php echo $SoPhieu; ?>},
                async: false,
                success: function (response) {
                    $data  =  $.parseJSON(response);
                }
            });
            return $data;
        }

        //-----------------------------Hết lưới---------------------------------------------------------------------
        //------------------------End lưới--------------------------------------
    });
</script>
<div id="dialog-bangchitiet_nhapkho"
     title="NHẬP CHI TIẾT CÔNG TRÌNH.... (ESC: Thoát , F4: Thêm vật tư, INSERT: Lấy danh sách tồn kho, F2: Sửa, F9: Lưu , END : Hủy dòng đang sửa)">
    <!-- dialog -->
    <div id="grid_editing_nhapchitiet_nhapkho" style="margin:5px auto;border: 0px !important;"></div>
</div>
