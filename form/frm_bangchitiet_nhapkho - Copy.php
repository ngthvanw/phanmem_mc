<?php
$SoPhieu = $_GET['sophieu'];
$list = $_GET['list'];
$cothuegtgt = $_GET['thuegtgt'];
$cochietkhau = $_GET['cochietkhau'];
$query_string - $_SERVER['QUERY_STRING'];
?>
<script>
    $height = getHeight();
    $width = getWidth() - 200;
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
            if (event.keyCode == Keys.F2 || event.keyCode == Keys.F4) {
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
                if (event.keyCode == Keys.F2) {// Sửa
                    if (rowSelect != false) {
                        if (isEditing($grid_pb)) {
                            return false;
                        }
                        var rowIndx = rowSelect[0].rowIndx;
                        editRow(rowIndx, $grid_pb);
                        return false;
                    }
                }

                if (event.keyCode == Keys.F9) { // Lưu
                    if (isEditing($grid_pb)) {
                        var rowIndx = rowEditting[0].rowIndx;
                        update(rowIndx, $grid_pb);
                    }
                }

                if (event.keyCode == Keys.END) { // Hủy bỏ hàng đang xóa
                    if (isEditing($grid_pb)) {
                        var rowIndx = rowEditting[0].rowIndx;
                        $grid_pb.pqGrid("quitEditMode");
                        $grid_pb.pqGrid("removeClass", {rowIndx: rowIndx, cls: 'pq-row-edit'});
                        $grid_pb.pqGrid("refreshRow", {rowIndx: rowIndx});
                        $grid_pb.pqGrid("rollback");
                    }
                }
                if (event.keyCode == Keys.INSERT) { // Hủy bỏ hàng đang xóa
                    $("#dialog-bangchitiet_nhapkho").load("form/gird_bangchitiet_nhapkho.php?list=1&sophieu=<?php echo $SoPhieu; ?>&thuegtgt=<?php echo $cothuegtgt; ?>&cochietkhau=<?php echo $cochietkhau; ?>");
                }
                if ((event.keyCode == Keys.ESCAPE || event.keyCode == Keys.ENTER) && $('div').hasClass('jconfirm') == false && rowEditting.length < 1) {
                    xoadialog_bangchitiet_nhapkho();
                    $("#gird_chitiet_nhapkho").load("form/gird_chitiet_nhapkho.php?sophieu=<?php echo $SoPhieu; ?>&list=0");
                    var $data = 0;
                    $sophieu = $("#sophieu").val();
                    $.ajax({// Kiểm tra xem STT có tồn tại hay không
                        url: $dir_module_nhapkho + "laythongtindinhkhoan.php",
                        data: {sophieu: $sophieu},
                        async: false,
                        success: function (response) {
                            $data = $.parseJSON(response);
                        }
                    });
                    $TongChietKhau=0;
                    $.ajax({// Lấy tổng chiết khấu
                        url: $dir_module_nhapkho + "laytongchietkhau.php",
                        data: {sophieu: $sophieu},
                        async: false,
                        success: function (response) {
                            $TongChietKhau =response;
                        }
                    });
                    $tongtien = 0;
                    $tongcong = 0;
                    $tonghang = 0;
                    $tongthue = 0;
                    $lengh = $data.length;

                    $dataMand="";
                    $mand = $("#manoidung").val().trim();
                    $.ajax({// Lấy TK từ mã nội dung
                        url: $dir_module_manoidung + "laythongtin.php",
                        data: {ma: $mand},
                        async: false,
                        success: function (response) {
                            $dataMand =$.parseJSON(response);
                        }
                    });
                    $tkco =$dataMand.tkco;

                    $.each($data, function (i, item) {// Lấy danh sách tk có , tk nợ
                        i++;
                        $("#tkno" + i).val(item.matk);
                        $("#tkco" + i).val($tkco);
                        $sotien = item.sotien;
                        $("#sotien" + i).val(FormatNumber($sotien.toString()));
                        $tongtien += parseFloat($sotien);
                        if (i < $lengh) {
                            $tonghang += $sotien;
                        }
                    });
                    $tongthue = Math.round($data[$lengh - 1].sotien);
                    $tongthue = Math.round($tongthue);
                    $tongtien = Math.round($tongtien);
                    $tonghang = Math.round($tonghang);

                    $("#tongtien").val(FormatNumber($tongtien.toString()));
                    $("#tienchietkhau").val(($TongChietKhau));
                    $("#tongso").val(FormatNumber($tongtien.toString()));
                    $("#tienhang").val(FormatNumber($tonghang.toString()));// Tiền hàng
                    $("#thue").val(FormatNumber($tongthue.toString()));//Tiền thuế
                    $ngayhoadon = $("#ngayhoadon").val();
                    $("#hanthanhtoan").val($ngayhoadon);

                    $("#tkco2").val($tkco);
                    $("#tkco1").val($tkco);
                    $("#tkno2").val("1331");

                    //////////////// Them phieu nhap
                    var valid=false;
                    $.ajax({// Kiểm tra xem STT có tồn tại hay không
                        url: $dir_module_chitiet_vattu + "checksophieu.php",
                        data: {sophieu: $sophieu},
                        async: false,
                        success: function (response) {
                            $data =response;
                            if($data==1)
                                valid=true;
                            else
                                valid = false;
                        }
                    });
                    if (valid) {
                        $LoaiPhieu=1;// Nhập kho
                        var $cothuegtgt = 0;
                        if ($("#cothuegtgt").is(":checked")) {
                            $cothuegtgt = 1;
                        }
                        $.ajax({
                            url: $dir_module_nhapkho + "nhapkho.php", // Bao gồm cả add và edit
                            type: "get", // chọn phương thức gửi là get
                            dateType: "text", // dữ liệu trả về dạng text
                            data: { // Danh sách các thuộc tính sẽ gửi đi
                                STT: $("#STT").val().trim(),
                                ngayghiso: $("#ngayghiso").val().trim(),
                                loaict: $("#loaict").val().trim(),
                                mauso: $("#mauso").val().trim(),
                                kyhieu: $("#kyhieu").val().trim(),
                                sohoadon: $("#sohoadon").val().trim(),
                                ngayhoadon: $("#ngayhoadon").val().trim(),
                                makhachhang: $("#makhachhang").val().trim(),
                                tenkhachhang: $("#tenkhachhang").val().trim(),
                                loaiphieu: $LoaiPhieu,
                                sophieu: $("#sophieu").val(),
                                diachi: $("#diachi").val().trim(),
                                masothue: $("#masothue").val().trim(),
                                manoidung: $("#manoidung").val().trim(),
                                noidung: $("#noidung").val().trim(),
                                makho: $("#makho").val().trim(),
                                tenkho: $("#tenkho").val().trim(),
                                ngaythanhtoan: $("#ngaythanhtoan").val().trim(),
                                cothuegtgt: $cothuegtgt,
                                tkno1: $("#tkno1").val().trim(),
                                tkno2: $("#tkno2").val().trim(),
                                tkco1: $("#tkco1").val().trim(),
                                tkco2: $("#tkco2").val().trim(),
                                sotien1: $("#sotien1").val().trim(),
                                sotien2: $("#sotien2").val().trim(),
                                tongtien: $("#tongtien").val().trim(),
                                tienhang: $("#tienhang").val().trim(),
                                tienchietkhau: $("#tienchietkhau").val().trim(),
                                tienthue: $("#thue").val().trim(),
                                tongcong: $("#tongso").val().trim(),
                                ghichu: $("#ghichu").val().trim(),
                            },
                            success: function (result) {
                                //$('.dialog_main_thongbao').load('form/frm_thongbao_nhapkho.php?loaiphieu=' + $LoaiPhieu + '&ngayhd=' + ngayhoadon.val().trim() + '&sophieu=' + sophieu.val().trim()+ '&tenkho=' + encodeURI(tenkho.val().trim()));
                            }
                        });
                    }
                    $("#hanthanhtoan").focus();
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
                    soluongnhap:"100",
                    donggianhap: "120000",
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
        function update(rowIndx, $grid) {

            if ($grid.pqGrid("saveEditCell") == false) {
                return false;
            }

            var isValid = $grid.pqGrid("isValid", {rowIndx: rowIndx}).valid;
            if (!isValid) {//Kiểm tra có sửa dữ liệu không
                return false;
            }
            var isDirty = $grid.pqGrid("isDirty");
            isDirty = true;
            if (isDirty) {
                var url,
                    rowData = $grid.pqGrid("getRowData", {rowIndx: rowIndx}),
                    recIndx = $grid.pqGrid("option", "dataModel.recIndx");

                $grid.pqGrid("removeClass", {rowIndx: rowIndx, cls: 'pq-row-edit'});

                if (rowData[recIndx] == null) {
//url to add records.
                    url = $dir_module_chitiet_vattu + "edit.php";
                }
                else {
//url to  update records.
                    url = $dir_module_chitiet_vattu + "edit.php";
                }
                //rowData.mapskt = 1;

                $soluong = parseFloat(rowData.soluongnhap.toString().toString().split(",").join(""));// Lấy số lượng nhập vào

                $dongia = parseFloat(rowData.donggianhap.toString().toString().split(",").join(""));// Lấy đơn giá nhập vào

                $TienThueNhap = parseFloat(rowData.thue.toString().split(",").join(""));// Lấy đơn giá nhập vào
                // $thanhtien = Math.round($soluong * $dongia); // thành tiền  = bằng số lượng * đơn giá (Làm tròn thành tiền)

                //rowData.thanhtien = $thanhtien; // Đưa thành tiền vào mảng

                $thuesuat = parseFloat(rowData.thuesuat.toString().split(",").join("")); // Lấy % thuế suất nhập vào
                //$tienthue = Math.round($thanhtien * ($thuesuat / 100)); // Tiền thuế = Thành tiền * % thuế xuất (Làm tròn tiền thuế)



                $chietkhau = parseFloat(rowData.chietkhau.toString().split(",").join("")); // Lấy % chiết khấu nhập nhập vào

                $tienchietkhaunhap = parseFloat(rowData.tienchietkhau.toString().split(",").join("")); // Lấy % chiết khấu nhập nhập vào

                $thanhtiennhap = parseFloat(rowData.thanhtien.toString().split(",").join(""));

                $TienChietKhau_rowData =ChietKhau($soluong, $dongia, $chietkhau,$tienchietkhaunhap,$thanhtiennhap);
                //console.log($TienChietKhau_rowData);

                rowData.tienchietkhau = $TienChietKhau_rowData;
                rowData.thanhtien = $ThanhTien_rowData = ThanhTien($soluong, $dongia,$TienChietKhau_rowData,$thanhtiennhap); // Đưa thành tiền vào mảng
                rowData.thue = $TienThue_rowData = Thue($soluong, $dongia, $thuesuat,$TienThueNhap,$TienChietKhau_rowData,$thanhtiennhap); // Đưa tiền thuế vào mạng

                rowData.sophieu = <?php echo $SoPhieu; ?>;


                $.ajax($.extend({}, ajaxObj, {
                    context: $grid,
                    url: url,
                    data: rowData,
                    success: function (response) {
                        var recIndx = this.pqGrid("option", "dataModel.recIndx");
                        //alert(rowData[recIndx]);
                        if (rowData[recIndx] == "") {
                            rowData[recIndx] = response.recId;
                        }
                        this.pqGrid("removeClass", {rowIndx: rowIndx, cls: 'pq-row-edit'});
                        this.pqGrid("commit");
                        $grid.pqGrid("refreshRow", {rowIndx: rowIndx});
                    }
                }));
            } else {
                $grid.pqGrid("quitEditMode");
                $grid.pqGrid("removeClass", {rowIndx: rowIndx, cls: 'pq-row-edit'});
                $grid.pqGrid("refreshRow", {rowIndx: rowIndx});
            }
        }

        function ThanhTien($SoLuong, $DonGia,$TienChietKhau,$ThanhTienNhap) {
            $soluong = parseFloat($SoLuong);// Lấy số lượng nhập vào

            $dongia = parseFloat($DonGia);// Lấy đơn giá nhập vào

            $chietkhau = parseFloat($TienChietKhau);
            $thanhtien = Math.round(($soluong * $dongia)-$chietkhau); // thành tiền  = bằng số lượng * đơn giá (Làm tròn thành tiền)
            //alert($ThanhTienNhap);
            if($ThanhTienNhap==0 || $ThanhTienNhap==$thanhtien || $ThanhTienNhap=="" || isNaN($ThanhTienNhap)== true){
                return $thanhtien
            }else{
                return $ThanhTienNhap;
            }
        }

        function Thue($SoLuong, $DonGia, $PhanTramThue,$TienThueNhap,$TienChietKhau,$ThanhTienNhap) {

            $thanhtien = ThanhTien($SoLuong, $DonGia,$TienChietKhau,$ThanhTienNhap);

            $tienthue = Math.round($thanhtien * ($PhanTramThue / 100)); // Tiền thuế = Thành tiền * % thuế xuất (Làm tròn tiền thuế)

            if($TienThueNhap==0 || $TienThueNhap==$tienthue || $TienThueNhap=="" || isNaN($TienThueNhap)== true){
            return $tienthue
            }else{
            return $TienThueNhap;
            }
        }

        function ChietKhau($SoLuong, $DonGia, $PhanTram,$TienChietKhauNhap,$ThanhTienNhap) {
            $thanhtien = ThanhTien($SoLuong, $DonGia,0,$ThanhTienNhap);
            $tienchietkhau = Math.round($thanhtien * ($PhanTram / 100)); // Tiền thuế = Thành tiền * % thuế xuất (Làm tròn tiền thuế)
            if($TienChietKhauNhap==0 || $TienChietKhauNhap==$tienchietkhau || $TienChietKhauNhap=="" || isNaN($TienChietKhauNhap)== true){
                return $tienchietkhau
            }else{
              return $TienChietKhauNhap;
            }
        }

        function TinhTonKho($SLTon, $SLNhap, $SLCu) {
            $SLHienTai = $SLNhap - $SLCu;
            $TonHienTai = $SLTon + ($SLHienTai);
            return $TonHienTai;
        }

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
            sortIndx: 'tenvt',
            sortDir: 'up',
//flexHeight: true,
            title: null,
            height: $height - 70,
            width: $width - 65,
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
                {
                    title: "SoTT",
                    dataType: "integer",
                    dataIndx: "sott",
                    editable: false,
                    width: 0,
                    hidden: true,
                    align: "center"
                },
                {title: "Mã VT", dataType: "string", dataIndx: "mavt", width: 100, sortable: true, editable: false,
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
                    title: "Số lượng tồn",
                    width: 100,
                    dataType: "string",
                    align: "center",
                    editable: false,
                    dataIndx: "soluongton",
                    editor: {
                        type: formart_num
                    },
                    render: function (ui) {// Tính toán Tiền thuế và đưa lên lưới
                        var SLTon = ui.rowData.soluongton; // lấy số lượng tồn
                        var re = /,/gi;
                        var soluong = ui.rowData.soluongnhap.toString().split(",").join("");// Lấy số lượng nhập

                        var soluongcu = ui.rowData.slcu.toString().split(",").join("");// Lấy số lượng nhập

                        var str = ui.rowData.donggianhap; // Lấy đơn giá nhập
                        var donggia = str.toString().split(",").join("");
                        var tongtien = TinhTonKho(SLTon, soluong, soluongcu);

                        return (tongtien.toString());
                    }
                },
                {
                    title: "Số lượng", width: 70, dataType: "string", align: "right", dataIndx: "soluongnhap",
                    editor: {
                        type: formart_num
                    },
                    validations: [
                        {type: 'minLen', value: 1, msg: "Số Lượng nhập không được trống !"},
                    ],
                    render: function (ui) {
                        return FormatNumber(ui.rowData.soluongnhap);
                    }
                },
                {
                    title: "Đơn giá", width: 85, dataType: "string", align: "right", dataIndx: "donggianhap",
                    editor: {
                        type: formart_num
                    },
                    validations: [
                        {type: 'minLen', value: 1, msg: "Đơn giá không được trống !"},
                        {type: 'maxLen', value: 16, msg: "Giá mua phải nhỏ hơn 17 số !"},
                    ],
                    render: function (ui) {

                        return FormatNumber(ui.rowData.donggianhap);
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
                        type: formart_num
                    },
                    render: function (ui) {// Hiện số tiền tính toán lên lưới
                        /*var re = /,/gi;

                        var rate = ui.rowData.chietkhau; // lấy % chiết khấu

                        var soluong = ui.rowData.soluongnhap.toString().split(",").join(""); // Lấy số lượng nhập

                        var str = ui.rowData.donggianhap; // Lấy đơn giá nhập
                        var donggia = str.toString().split(",").join(""); // Loại bỏ dấu , trong số

                        $thanhtiennhap_str = ui.rowData.thanhtien;

                        $thanhtiennhap = $thanhtiennhap_str;

                        var ThueChietKhauNhap_str = ui.rowData.tienchietkhau; // Lấy đơn giá nhập


                        var TienChietKhau = ChietKhau(soluong, donggia, rate,ThueChietKhauNhap_str,$thanhtiennhap);



                        var tongtien = ThanhTien(soluong, donggia,TienChietKhau,$thanhtiennhap);
                        console.log(ui);*/

                        return FormatNumber(ui.rowData.thanhtien.toString());
                    }
                },
                {
                    title: "TS(%)", width: 55, dataType: "integer", align: "center", dataIndx: "thuesuat",
                    editable: true,
                    validations: [
                        {type: 'minLen', value: 1, msg: "Thuế xuất không được trống !"},
                        {type: 'maxLen', value: 2, msg: "Thuế xuất không được quá 2 số !"}
                    ],
                    render: function (ui) {
                        var rate = ui.rowData.thuesuat;
                        return rate + "%";
                    }
                },
                {
                    title: "Thuế", width: 100, dataType: "string", dataIndx: "thue", editable: true, align: "center",
                    editor: {
                        type: formart_num
                    },
                    render: function (ui) {// Tính toán Tiền thuế và đưa lên lưới
                        /*var rate = ui.rowData.thuesuat; // lấy % thuế suất
                        var re = /,/gi;
                        var soluong = ui.rowData.soluongnhap.toString().split(",").join("");// Lấy số lượng nhập

                        var chietkhau = ui.rowData.chietkhau; // lấy % chiết khấu

                        var str = ui.rowData.donggianhap; // Lấy đơn giá nhập
                        var donggia = str.toString().split(",").join("");

                        var ThueNhap_str = ui.rowData.thue; // Lấy đơn giá nhập
                        //var ThueNhap = ThueNhap_str.toString().split(",").join("");

                        $thanhtiennhap_str = ui.rowData.thanhtien;

                        $thanhtiennhap = $thanhtiennhap_str;

                        var ThueChietKhauNhap_str = ui.rowData.tienchietkhau; // Lấy đơn giá nhập
                        var TienChietKhau = ChietKhau(soluong, donggia, chietkhau,ThueChietKhauNhap_str,$thanhtiennhap);

                        var tongtien = Thue(soluong, donggia, rate,ThueNhap_str,TienChietKhau,$thanhtiennhap);*/

                        return FormatNumber(ui.rowData.thue.toString());
                    }
                },
                {
                    title: "CK(%)", width: 55, dataType: "string", align: "center", dataIndx: "chietkhau",
                    editor: {
                        type: formart_num
                    },
                    render: function (ui) {

                        var rate = ui.rowData.chietkhau;
                        return rate + "%";
                    }
                },
                {
                    title: "Chiết khấu", width: 50, dataType: "string", align: "center", dataIndx: "tienchietkhau",
                    editor: {
                        type: formart_num
                    },
                    render: function (ui) {// Tính toán Tiền thuế và đưa lên lưới
                       /* var rate = ui.rowData.chietkhau; // lấy % chiết khấu
                        var re = /,/gi;
                        var soluong = ui.rowData.soluongnhap.toString().split(",").join("");// Lấy số lượng nhập

                        var str = ui.rowData.donggianhap; // Lấy đơn giá nhập
                        var donggia = str.toString().split(",").join("");
                        var ThueChietKhauNhap_str = ui.rowData.tienchietkhau; // Lấy đơn giá nhập
                        $thanhtiennhap_str = ui.rowData.thanhtien;

                        $thanhtiennhap = $thanhtiennhap_str;

                        var tongtien = ChietKhau(soluong, donggia, rate,ThueChietKhauNhap_str,$thanhtiennhap);*/

                        return FormatNumber(ui.rowData.tienchietkhau.toString());
                    }
                }

            ],//-----------------------------------------Kết thúc các cột---------------------------------------
            dataModel: {
                dataType: "JSON",
                location: "remote",
                recIndx: "sott",
                url: $dir_module_chitiet_vattu + "list.php",//-- Load danh sách lên lưới
                postData: {sophieu: <?php echo $SoPhieu; ?>, list:<?php echo $list; ?>,cothuegtgt:<?php echo $cothuegtgt; ?>,cochietkhau:<?php echo $cochietkhau; ?>},
                getData: function (response) {
                    return {data: response.data};
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
        var $grid = $("#grid_editing_nhapchitiet_nhapkho").pqGrid(obj);

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

        //-----------------------------Hết lưới---------------------------------------------------------------------

        //------------------------End lưới--------------------------------------
    });
</script>
<div id="dialog-bangchitiet_nhapkho"
     title="Nhập đơn giá, số lượng hàng hóa vật tư.... (ESC: Thoát , F4: Thêm vật tư, INSERT: Lấy danh sách tồn kho, F2: Sửa, F9: Lưu , END : Hủy dòng đang sửa)"><!-- dialog -->
    <div id="grid_editing_nhapchitiet_nhapkho" style="margin:5px auto;border: 0px !important;"></div>
</div>
