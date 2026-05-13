<?php
session_start();
$SoPhieu = $_GET['sophieu'];
$list = $_GET['list'];
$cothuegtgt = $_GET['thuegtgt'];
$cochietkhau = $_GET['cochietkhau'];
$baogomthue = $_GET['baogomthue'];
$ngayghiso = $_GET['ngayghiso'];
$makho = $_GET['makho'];
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
    $dir_module_sltonkho = "modules/soluongtonkho/";////////////////Khai báo đường dẫn vào mudole
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
                    $("#dialog-bangchitiet_nhapkho").load("form/gird_bangchitiet_xuatkho_sanxuat.php?list=1&sophieu=<?php echo $SoPhieu; ?>&thuegtgt=<?php echo $cothuegtgt; ?>&cochietkhau=<?php echo $cochietkhau; ?>&baogomthue=<?php echo $baogomthue; ?>&ngayghiso=<?php echo $ngayghiso; ?>&makho=<?php echo $makho; ?>");
                }
                if ((event.keyCode == Keys.ESCAPE) && $('div').hasClass('jconfirm') == false && rowEditting.length < 1) {
                    if ('<?php echo $_SESSION['phuongphaptonkho']; ?>'=="2" && '<?php echo $_SESSION['capnhatgiavontucthoi']; ?>'=="1") {
                        $.confirm({
                            title: 'Cập nhật giá vốn thành công.',
                            type: 'green',
                            autoClose: 'OK|1000',
                            content: function () {
                                var self = this;
                                return $.ajax({// Chuyển tồn kho cho năm mới
                                    url: $dir_module_sltonkho + "capnhatgiavon_xuatsanxuat_lienhoan.php",
                                    async: false,
                                    data: {
                                        thangtk: $("#ngayghiso").val().trim(),
                                        sophieu: $("#sophieu").val()
                                    },
                                    success: function (response) {// Thêm tồn kho mới vào

                                    }
                                });
                            },
                            buttons: {
                                "OK": function () {
                                    xoadialog_bangchitiet_nhapkho();
                                }
                            }
                        });
                    } else {
                        xoadialog_bangchitiet_nhapkho();
                    }

                    $("#gird_chitiet_xuatkho").load("form/gird_chitiet_xuatkho_sanxuat.php?sophieu=<?php echo $SoPhieu; ?>&list=0");
                    var $data = 0;
                    $sophieu = $("#sophieu").val();
                    $.ajax({// Kiểm tra xem STT có tồn tại hay không
                        url: $dir_module_nhapkho + "laythongtindinhkhoanxuatkho_sx.php",
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
                    $tkno =$dataMand.tkno;
                    $tkco =$dataMand.tkco;
                    i=0;


                    for ($k = 1; $k < 6; $k++) {
                        $("#tkco" + $k).val("");
                        $("#tkno" + $k).val("");
                        $("#sotien" + $k).val("");
                        $("#sotiennt" + $k).val("");
                    }
                    //if($tkco==""){
                        $.each($data, function (i, item) {// Lấy danh sách tk có , tk nợ
                            i++;
                            $("#tkco" + i).val(item.matk);
                            $("#tkno" + i).val($tkno);
                            $sotien = item.sotien;
                            $("#sotien" + i).val($.number($sotien,0,".",","));
                            $tongtien += parseFloat($sotien);
                            if (i < $lengh) {
                                $tonghang += parseFloat($sotien);
                            }
                        });
                    /*}else{
                        $.each($data, function (i, item) {// Lấy danh sách tk có , tk nợ
                            i++;
                            $sotien = item.sotien;
                            $tongtien += parseFloat($sotien);
                            if (i < $lengh) {
                                $tonghang += parseFloat($sotien);
                            }
                        });
                    }*/
                    //console.log($data);

                    $tongthue = Math.round($data[$lengh - 1].sotien);
                    $tongthue = Math.round($tongthue);
                    $tongtien = Math.round($tongtien);
                    $tonghang = Math.round($tonghang);

                    $("#tongtien").val(FormatNumber($tongtien.toString()));
                    $("#tienchietkhau").val(0);
                    $("#tongso").val(FormatNumber($tongtien.toString()));
                    $("#tienhang").val(FormatNumber($tonghang.toString()));// Tiền hàng
                    $("#thue").val(FormatNumber($tongthue.toString()));//Tiền thuế
                    $TongCPhiMT=0;
                    $.ajax({// Lấy tổng chiết khấu
                        url: $dir_module_nhapkho + "laytongphimoitruong.php",
                        data: {sophieu: $sophieu},
                        async: false,
                        success: function (response) {
                            $TongCPhiMT =response;
                        }
                    });
                    $("#phimoitruong").val($.number($TongCPhiMT,0,".",","));//Tiền thuế
                    $ngayhoadon = $("#ngayhoadon").val();
                    $("#hanthanhtoan").val($ngayhoadon);
                    if($tkco!=""){
                        $("#tkno1").val($tkno);
                        $("#sotien1").val(FormatNumber($tonghang.toString()));
                        //$("#sotien2").val(FormatNumber($tongthue.toString()));
                        //$("#tkno2").val($tkno);
                        $("#tkco1").val($tkco);
                        //$("#tkco2").val("33311");
                    }

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
                        $LoaiPhieu=3;// Nhập kho
                        var $cothuegtgt = 0;
                        if ($("#cothuegtgt").is(":checked")) {
                            $cothuegtgt = 1;
                        }
                        var $chungtugoc = 0;
                        if ($("#chungtugoc").is(":checked")) {
                            $chungtugoc = 1;
                        }

                        var $chiphikhongloaitru = 0;
                        if ($("#chiphikhongloaitru").is(":checked")) {
                            $chiphikhongloaitru = 1;
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
                                NhapTuKho: $("#NhapTuKho").val(),
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
                                chungtugoc: $chungtugoc,
                                loaisp:$("#chonloaisp").val(),
                                chiphikhongloaitru: $chiphikhongloaitru,
                            },
                            success: function (result) {
                                //$('.dialog_main_thongbao').load('form/frm_thongbao_nhapkho.php?loaiphieu=' + $LoaiPhieu + '&ngayhd=' + ngayhoadon.val().trim() + '&sophieu=' + sophieu.val().trim()+ '&tenkho=' + encodeURI(tenkho.val().trim()));
                            }
                        });
                    }
                    $("#ghichu").focus();
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

function ThanhTien($SoLuong, $DonGia,$TienChietKhau,$ThanhTienNhap) {
            $soluong = parseFloat($SoLuong);// Lấy số lượng nhập vào

            $dongia = parseFloat($DonGia);// Lấy đơn giá nhập vào

            $chietkhau = parseFloat($TienChietKhau);
            $thanhtien = Math.round(($soluong * $dongia)); // thành tiền  = bằng số lượng * đơn giá (Làm tròn thành tiền)
            //alert($ThanhTienNhap);
            if($ThanhTienNhap==0 || $ThanhTienNhap==$thanhtien || $ThanhTienNhap=="" || isNaN($ThanhTienNhap)== true){
                return $thanhtien
            }else{
                return $ThanhTienNhap;
            }
        }

        function Thue($thanhtien, $PhanTramThue,$TienThueNhap,$TienChietKhau,$ThanhTienNhap) {

            $thanhtien = $thanhtien;

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
            $SLHienTai = parseFloat($SLNhap) - parseFloat($SLCu);
            $TonHienTai = parseFloat($SLTon)  -($SLHienTai);
            return $TonHienTai;
        }

        //--------------------------------Khai báo lưới---------------------------------------.
        var objxuatkhosx = {
            hwrap: false,
            resizable: true,
            rowBorders: true,
            height:$height-75,
            width:$width-70,
            virtualX: true,
            numberCell: { show: true },
            filterModel: { on: true, mode: "AND", header: true },
            trackModel: { on: true }, //to turn on the track changes.

            scrollModel: {
                autoFit: true
            },
			toolbar: {
                items: [
                    {
                        type: 'button', icon: 'ui-icon-refresh', label: 'Cập nhật tồn hiện tại', listeners: [
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
                        type: "<span id='tongtienhienco' style='color:red'></span>"
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


                $soluong = parseFloat(rowData.soluongnhap.toString().toString().split(",").join(""));// Lấy số lượng nhập vào

                $dongia = parseFloat(rowData.donggianhap.toString().toString().split(",").join(""));// Lấy đơn giá nhập vào

                $TienThueNhap = parseFloat(rowData.thue.toString().split(",").join(""));// Lấy đơn giá nhập vào

                $thuesuat = parseFloat(rowData.thuesuat.toString().split(",").join("")); // Lấy % thuế suất nhập vào
                if(<?php echo $cothuegtgt; ?>==0){
                    $thuesuat = parseFloat(0); // Lấy % thuế suất nhập vào
                }

                $chietkhau = parseFloat(rowData.chietkhau.toString().split(",").join("")); // Lấy % chiết khấu nhập nhập vào

                $tienchietkhaunhap = parseFloat(rowData.tienchietkhau.toString().split(",").join("")); // Lấy % chiết khấu nhập nhập vào

                $thanhtiennhap = parseFloat(rowData.thanhtienchuack.toString().split(",").join(""));

                $soluongcu = oldRow.soluongnhap;
                $soluongmoi = newRow.soluongnhap;
                $donggiacu = oldRow.donggianhap;
                $donggiamoi = newRow.donggianhap;

                $thanhtiencu = oldRow.thanhtienchuack;
                $thientienmoi = newRow.thanhtienchuack;

				$tienchietkhaucu = oldRow.tienchietkhau;
                $tienchietkhaumoi = newRow.tienchietkhau;
                $baogomthue = <?php echo $baogomthue; ?>;
                if(parseFloat($baogomthue)==1){
                    if($donggiacu!=$donggiamoi){
                        $dongia = Math.round($dongia / (1+($thuesuat/100)), 2);
                    }
                }
                rowData.donggianhap = $dongia.toString();

                if(($soluongcu!=$soluongmoi) || $donggiacu!=$donggiamoi){
                    $thanhtiennhap=0;
                    $TienThueNhap=0;
                }
                if($thanhtiencu!=$thientienmoi || $tienchietkhaucu!=$tienchietkhaumoi){
                    $TienThueNhap=0;
                }

                $TienChietKhau_rowData =ChietKhau($soluong, $dongia, $chietkhau,$tienchietkhaunhap,$thanhtiennhap);

                rowData.tienchietkhau = $TienChietKhau_rowData;
				rowData.thanhtienchuack = $ThanhTien_ChuaCK = ThanhTien($soluong, $dongia,$TienChietKhau_rowData,$thanhtiennhap); // Đưa thành tiền vào mảng
				$thanhtien = $ThanhTien_ChuaCK - $TienChietKhau_rowData;
				
                rowData.thanhtien = $thanhtien;
                rowData.thue = $TienThue_rowData = Thue($thanhtien,$thuesuat,$TienThueNhap,$TienChietKhau_rowData,$TienThueNhap); // Đưa tiền thuế vào mạng

                rowData.sophieu = <?php echo $SoPhieu; ?>;
				rowData.loaiphieu = 3;
                var SLTon = rowData.soluongton; // lấy số lượng tồn
                var SLTonSP = rowData.thang<?php echo $thang_ngayghiso; ?>; // lấy số lượng tồn
                var SLTonDM = rowData.sldm; // lấy số lượng tồn

                var re = /,/gi;
                var soluong = rowData.soluongnhap.toString().split(",").join("");// Lấy số lượng nhập

                var soluongcu = rowData.slcu.toString().split(",").join("");// Lấy số lượng nhập

                var str = rowData.donggianhap; // Lấy đơn giá nhập
                var donggia = str.toString().split(",").join("");
                rowData.soluongton = TinhTonKho(SLTon, soluong, soluongcu);

                var $chonloaisp = $("#chonloaisp").val();
                if($chonloaisp=="SP"){
                    rowData.thang<?php echo $thang_ngayghiso; ?> = TinhTonKho(SLTonSP, soluong, soluongcu);
                }

                if($chonloaisp=="CT"){
                    rowData.sldm = TinhTonKho(SLTonDM, soluong, soluongcu);
                }

                rowData.slcu = soluong;

                if (true) {
                    $.ajax({
                        url: $dir_module_chitiet_vattu + "edit.php",
                        data: rowData,
                        dataType: "json",
                        type: "GET",
                        async: true,
                        
                        success: function (res) {
							if(res.recId!="success")
								rowData.sott = res.recId;
                            $grid.pqGrid("refreshRow", {rowIndx: rowIndx});
                            tongtienhienco();
                        }
                    });
                }
            },
            colModel: [//-------------------------------------------Khai báo các cột trong lưới-----------------------
                {title: "SoTT",dataType: "integer",dataIndx: "sott",editable: false,width: 0,hidden: true,align: "center"},
                {title: "Mã VT", dataType: "string", dataIndx: "mavt", width: 80, sortable: true, editable: false,
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
                        condition: 'against',
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
                    width: 80,
                    dataType: "string",
                    align: "right",
                    editable: false,
                    dataIndx: "soluongton",
                    editor: {
                        type: formart_num
                    },
                    render: function (ui) {// Hiện số tiền tính toán lên lưới
                        var rowData = ui.rowData,
                            dataIndx = ui.dataIndx;
                        rowData.pq_cellcls = rowData.pq_cellcls || {};
                        if (rowData.soluongton>=0) {//if change is negative.
                            rowData.pq_cellcls[dataIndx] = 'green';
                        }else{
                            rowData.pq_cellcls[dataIndx] = 'tomato';
                        }
                        return $.number(ui.rowData.soluongton,3,'.',',');
                    }
                },
                {
                    title: "SL dự trù",
                    width: 80,
                    dataType: "string",
                    align: "right",
                    editable: false,
                    dataIndx: "thang<?php echo $thang_ngayghiso ?>",
                    editor: {
                        type: formart_num
                    },
                    render: function (ui) {// Hiện số tiền tính toán lên lưới
                        var rowData = ui.rowData,
                            dataIndx = ui.dataIndx;
                        rowData.pq_cellcls = rowData.pq_cellcls || {};
                        if (rowData.thang<?php echo $thang_ngayghiso ?>>=0) {//if change is negative.
                            rowData.pq_cellcls[dataIndx] = 'green';
                        }else{
                            rowData.pq_cellcls[dataIndx] = 'tomato';
                        }
                        return $.number(ui.rowData.thang<?php echo $thang_ngayghiso ?>,<?php echo (int)($_SESSION['txthienthisole']); ?>,'.',',');
                    }
                },
                {
                    title: "SL định mức",
                    width: 80,
                    dataType: "string",
                    align: "right",
                    editable: false,
                    dataIndx: "sldm",
                    editor: {
                        type: formart_num
                    },
                    render: function (ui) {// Hiện số tiền tính toán lên lưới
                        var rowData = ui.rowData,
                            dataIndx = ui.dataIndx;
                        rowData.pq_cellcls = rowData.pq_cellcls || {};
                        if (rowData.sldm>=0) {//if change is negative.
                            rowData.pq_cellcls[dataIndx] = 'green';
                        }else{
                            rowData.pq_cellcls[dataIndx] = 'tomato';
                        }
                        return $.number(ui.rowData.sldm,<?php echo (int)($_SESSION['txthienthisole']); ?>,'.',',');
                    }
                },
                {
                    title: "Số lượng", width: 70, dataType: "string", align: "right", dataIndx: "soluongnhap",
                    editor: {
                        type: "number"
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
                        type: "number"
                    },
					editable: false,
                    validations: [
                        {type: 'minLen', value: 1, msg: "Đơn giá không được trống !"},
                        {type: 'maxLen', value: 16, msg: "Giá mua phải nhỏ hơn 17 số !"},
                    ],
                    render: function (ui) {
                        return $.number(ui.rowData.donggianhap,2,".",",");
                    }
                },
                {
                    title: "TT Chưa CK",
                    width: 100,
                    dataType: "string",
                    align: "right",
                    dataIndx: "thanhtienchuack",
                    editable: false,
                    editor: {
                       type: "number"
                    },
                    render: function (ui) {// Hiện số tiền tính toán lên lưới
                        return $.number(ui.rowData.thanhtienchuack,0,".",",");
                    }
                },
                {
                    title: "Thành tiền",
                    width: 110,
                    dataType: "string",
                    align: "right",
                    dataIndx: "thanhtien",
                    editable: false,
                    editor: {
                       type: formart_num
                    },
                    render: function (ui) {// Hiện số tiền tính toán lên lưới
                        return $.number(ui.rowData.thanhtien,0,".",",");
                    }
                },
				{
                    title: "Giá vốn", width: 85, dataType: "string", align: "right", dataIndx: "gianhap",editable: false,hidden: true,
                    
                    render: function (ui) {
                        return FormatNumber(ui.rowData.gianhap.toString());
                    }
                },
                {title: "TS(%)", width: 55, dataType: "string", align: "center", dataIndx: "thuesuat",editable: true,hidden: true,},
                {
                    title: "Thuế", width: 100, dataType: "string", dataIndx: "thue", editable: true, align: "center",hidden: true,
                    editor: {
                        type: "number"
                    },
                    render: function (ui) {// Tính toán Tiền thuế và đưa lên lưới

                        return FormatNumber(ui.rowData.thue.toString());
                    }
                },
                {
                    title: "CK(%)", width: 55, dataType: "string", align: "center", dataIndx: "chietkhau",hidden: true,
                    editor: {
                       type: "number"
                    },
                    render: function (ui) {

                        var rate = ui.rowData.chietkhau;
                        return rate + "%";
                    }
                },
                {
                    title: "Chiết khấu", width: 50, dataType: "string", align: "center", dataIndx: "tienchietkhau",hidden: true,
                    editor: {
                        type: "number"
                    },
                    render: function (ui) {// Tính toán Tiền thuế và đưa lên lưới
                        return FormatNumber(ui.rowData.tienchietkhau.toString());
                    }
                }
            ],
			pageModel: { type: "remote", rPP: 100 },
            dataModel: {
                dataType: "JSON",
                location: "remote",
                recIndx: "sott",
                url: $dir_module_chitiet_vattu + "listxuatkho_sanxuat.php",//-- Load danh sách lên lưới
                postData: {sophieu: <?php echo $SoPhieu; ?>, list:<?php echo $list; ?>,cothuegtgt:<?php echo $cothuegtgt; ?>,cochietkhau:<?php echo $cochietkhau; ?>,makho:'<?php echo $makho; ?>',mact:$("#makho").val()},
                getData: function (dataJSON) {
                var data = dataJSON.data;
                return { curPage: dataJSON.curPage, totalRecords: dataJSON.totalRecords, data: data };
            }
            }
        };
        var $grid = $("#grid_editing_nhapchitiet_nhapkho").pqGrid(objxuatkhosx);

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
			 $.ajax({// Kiểm tra xem STT có tồn tại hay không
                        url: $dir_module_chitiet_vattu + "tongtienhientaicuaphieunhap.php",
                        data: {sophieu: <?php echo $SoPhieu; ?>},
                        async: false,
                        success: function (response) {
                          $("#tongtienhienco").html(response);
                        }
               });
		 }
        //-----------------------------Hết lưới---------------------------------------------------------------------
        //------------------------End lưới--------------------------------------
    });
</script>

<div id="grid_editing_nhapchitiet_nhapkho" style="margin:5px auto;border: 0px !important;"></div>