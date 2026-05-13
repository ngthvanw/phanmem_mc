<?php
unset($_SESSION['NHAPKHOCT']);
$sottphieukhac = $_GET['sottphieukhac'];
require("../config.php");
?>
<style>
    #Form-chinh label {
        margin-top: 3px;
        float: left;
        border: 0px solid red;
        width: 100%;
        display: block !important;
        font-weight: bold !important;
        font-size: 12px;
        font-family: Arial, Lucida Grande, Lucida Sans, sans-serif;
    }
	#gird_danhsach_sanpham{
		font-size:12px !important;
		font-family: Arial;
	}
    tr td.mauhong {
        background-color:rgba(143,230,74,0.53);
    }
    tr.green td { background: lightgreen;}
</style>
<div id="dialog-tangtaisan" title="NHẬP ĐỊNH MỨC XE MÁY">
    <p class="validateTips"></p>
    <form method="post" id="Form-chinh" enctype="multipart/form-data">
        <table border="0" width="100%">
            <tr>
                <td width="40%" valign="top">
                    <fieldset style="background-color: #afd9ee;border: 0px solid">
                        <table class="table-dialog" style="vertical-align: middle;width: 100%" border="0">
                            <tr>
                                <td width="100%" style="padding: 2px;height:250px;" id="gird_danhsach_sanpham"></td>

                            </tr>
                        </table>
                    </fieldset>
                </td>
                <td width="60%" valign="top">

                    <fieldset style="background-color: #afd9ee;border: 0px solid">
                        <table style="vertical-align: middle;width: 100%;" border="0">
                            <tr>
                                <td style="width:20%"><label for="name11">Tài sản:</label></td>
                                <td style="width:20%">
                                    <input name="masp" type="text" class="text ui-widget-content ui-corner-all"
                                           style="width:100%"
                                           disabled="disabled" id="masp" value=""/>
                                </td>
                                <td style="width:60%">
                                    <input name="tensp" type="text" style="width:100%"
                                           class="text ui-widget-content ui-corner-all" id="tensp"
                                           value=""/>
                                </td>
                            </tr>
                            <tr>
                                <td style="width:20%"><label for="name11">Chọn loại định mức</label></td>
                                <td style="width:20%">
                                    <select id="loaidinhmucsp" style="height: 25px;">
                                        <option value="1">Theo đoạn đường</option>
                                        <option value="2">Theo kilomet</option>
                                    </select>
                                </td>
                                <td style="width:60%">
                                    <table width="100%" border="0">
                                        <tr>
                                            <td width="30%"><label>Số Kilomet:</label></td>
                                            <td width=40%"><input name="soluonguocluong" type="text" style="width:98%;text-align: right;"
                                                       class="text ui-widget-content ui-corner-all" id="soluonguocluong"
                                                       value="1"/></td>
                                                       <td width="30%" style="text-align:left;"><label id="donvitinh"> Chuyến</label></td>
                                        </tr>
                                    </table>


                                </td>
                            </tr>
                        </table>
                    </fieldset>
                    <fieldset style="background-color: #afd9ee;border: 0px solid">
                        <table style="vertical-align: middle;width: 100%;" border="0">
                            <tr>
                                <td width="100%" colspan="3" id="gird_chitiet_dinhmuc">
                                    <label style="color: red"><b>Chọn sản phẩm để xem định mức</b></label>
                                </td>
                            </tr>
                        </table>
                    </fieldset>

                </td>
            </tr>
        </table>
    </form>
</div>

<script>
    //$$dir_module_dmsanpham = "modules/mabp/";////////////////Khai báo đường dẫn vào mudole
    $dir_module_makhachhang = "modules/makhachhang/";////////////////Khai báo đường dẫn vào mudole
    $dir_module_matk = "modules/httk/";
    $dir_module_manoidung = "modules/manoidung/";////////////////Khai báo đường dẫn vào mudole
    $dir_module_mact = "modules/macongtrinh/";////////////////Khai báo đường dẫn vào mudole
    $dir_module_chitiet_vattu = "modules/ps_chitiet_mavt/";//----------------Lưới
    $dir_module_dmsanpham = "modules/dmsanpham/";//----------------Lưới
    $dir_module_nhomtaisan = "modules/nhomtaisan/";//----------------Lưới
    $dir_module_mataisan = "modules/mataisan/";//----------------Lưới
    $(function () {
        //--------------------------------Khai báo lưới---------------------------------------.
        var obj = {
            hwrap: true,
            //resizable: true,
            rowBorders: true,
            virtualX: true, virtualY: true,
            height: getHeight()-150,
            width: 350,
            //virtualX: true,
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
            selectionModel: {type: 'row'},
            title: "DANH SÁCH TÀI SẢN (INSERT:Lấy DS loại đường)",
            colModel: [//-------------------------------------------Khai báo các cột trong lưới-----------------------
                {title: "SoTT", dataType: "integer", dataIndx: "sott", editable: false, width: 0, hidden: true,},
                {
                    title: "Mã TS", dataType: "string", dataIndx: "mats", minWidth: 100, sortable: true, editable: false,
                    validations: [
                        {type: 'minLen', value: 1, msg: "Mã sản phẩm không được trống !"},
                        {type: 'maxLen', value: 14, msg: "Mã sản phảm không lớn hơn 14 ký tự !"},
                        {
                            type: function (ui) {
                                var value = ui.value,
                                    _found = false, sott = ui.rowData.sott;
                                //remote validation
                                $.ajax({
                                    url: $dir_module_dmsanpham + "checkkey.php",
                                    data: {'id': value, 'sott': sott},
                                    async: false,
                                    success: function (response) {
                                        if (response == 1) {
                                            _found = true;
                                        }
                                    }
                                });
                                if (_found) {
                                    ui.msg = value + " đã tồn tại trong hệ thống";
                                    return false;
                                }
                            }
                        }
                    ],
                    filter: {
                        type: 'textbox',
                        condition: 'begin',
                        listeners: ['keyup']
                    },
                    render: function (ui) {
                        var rowData = ui.rowData,
                            dataIndx = ui.dataIndx;

                        rowData.pq_cellcls = rowData.pq_cellcls || {};
                        if (rowData.matscha == 0) {//if change is negative.
                            rowData.pq_cellcls[dataIndx] = 'mauhong';
                            return rowData.mats;
                        }
                        else { //if change >= 0
                            return rowData.mats;
                        }
                    }
                },
                {
                    title: "Tên TS", minWidth: 200, dataType: "string", dataIndx: "tents", editable: false,
                    validations: [
                        {type: 'minLen', value: 1, msg: "Tên sản phẩm không được trống !"}
                    ],
                    filter: {
                        type: 'textbox',
                        condition: 'begin',
                        listeners: ['keyup']
                    }
                },
                {
                    title: "ĐVT", minWidth: 80, dataType: "string", dataIndx: "dvt", editable: false,
                    validations: [
                        {type: 'minLen', value: 1, msg: "Đơn vị tính không được trống !"}
                    ],
                    filter: {
                        type: 'textbox',
                        condition: 'begin',
                        listeners: ['keyup']
                    }
                },
				{
                    title: "Mã TS Cha", minWidth: 80, dataType: "string", dataIndx: "matscha", editable: false,
                    validations: [
                        {type: 'minLen', value: 1, msg: "Đơn vị tính không được trống !"}
                    ]
                },
                {
                    title: " ", minWidth: 20, dataType: "string", dataIndx: "slnguyenlieu", editable: false,align: "center",
                    validations: [
                        {type: 'minLen', value: 1, msg: "Đơn vị tính không được trống !"}
                    ]
                },
            ],//,
            //pageModel: { type: "local", rPP: 20, strRpp: "{0}", strDisplay: "{0} đến {1} của {2}" },
            dataModel: {
                dataType: "JSON",
                location: "remote",
                recIndx: "sott",
                //postData: {loaisp:'SP'},
                url: $dir_module_mataisan + "listallmats.php",//-- Load danh sách lên lưới
                getData: function (dataJSON) {
                    var data = dataJSON.data;
                    return {data: data};
                }
            }
        };
        obj.rowSelect = function (evt, ui) {
            if (ui.rowData) {
                var masp = ui.rowData.mats;
                var tensp = ui.rowData.tents;
                var dvt = ui.rowData.dvt;
                var $soluongspuocluong = $("#soluonguocluong").val();
                $("#loaidinhmucsp").val("1");
                $("#masp").val(masp);
                $("#tensp").val(tensp);
                $("#donvitinh").text("Chuyến");
                $("#gird_chitiet_dinhmuc").load("form/bang_gird_chitiet_dinhmucxemay_theoduong.php?masp='" + masp + "'&list=0&loaidinhmucsp='1'&soluongspuocluong='"+$soluongspuocluong+"'");// Lấy danh sách chưa có nhập
            }
        }
        var $grid = $("#gird_danhsach_sanpham").pqGrid(obj);
/////////////////////////////////////////////Kết thúc Danh sách Autocomplex
        var dialog, form,
            emailRegex = /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/,
            btnstt = $("#btnstt"),
            STT = $("#STT"),
            sophieu = $("#sophieu"),
            ngayghiso = $("#ngayghiso"),
            loaict = $("#loaict"),
            mauso = $("#mauso"),
            kyhieu = $("#kyhieu"),
            sohoadon = $("#sohoadon"),
            ngayhoadon = $("#ngayhoadon"),
            btnmakh = $("#btnmakh"),
            makhachhang = $("#makhachhang"),
            tenkhachhang = $("#tenkhachhang"),
            diachi = $("#diachi"),
            masothue = $("#masothue"),

            btnmand = $("#btnnoidung"),
            manoidung = $("#manoidung"),
            noidung = $("#noidung"),

            btnmakho = $("#btnmakho"),
            makho = $("#makho"),
            tenkho = $("#tenkho"),


            ngaythanhtoan = $("#hanthanhtoan"),
            cothuegtgt = $("#cothuegtgt"),

            btntkno1 = $("#btntkno1"),
            btntkno2 = $("#btntkno2"),
            btntkco1 = $("#btntkco1"),
            btntkco2 = $("#btntkco2"),
            tkno1 = $("#tkno1"),
            tkno2 = $("#tkno2"),
            tkco1 = $("#tkco1"),
            tkco2 = $("#tkco2"),
            sotien1 = $("#sotien1"),
            sotien2 = $("#sotien2"),
            tongtien = $("#tongtien"),
            tienhang = $("#tienhang"),
            tienchietkhau = $("#tienchietkhau"),
            tienthue = $("#thue"),
            tongcong = $("#tongso"),
            ghichu = $("#ghichu"),


            allFields = $([]).add(STT)/////////////////////////////////////////////////////////////////////////////////////
                .add(ngayghiso)
                .add(loaict)
                .add(mauso)
                .add(kyhieu)
                .add(sohoadon)
                .add(sohoadon)
                .add(ngayhoadon)
                .add(tenkhachhang)
                .add(masothue)
                .add(manoidung)
                .add(noidung)
                .add(makho)
                .add(tenkho)
                .add(cothuegtgt)
                .add(ngaythanhtoan)
                .add(tkno1)
                .add(tkno2)
                .add(tkco1)
                .add(tkco2)
                .add(sotien1)
                .add(sotien2)
                .add(tongtien)
                .add(ghichu),
            tips = $(".validateTips"); // ///////////////////////////////////////////////////////////////////////////////khai bao bien

        function updateTips(t) {// Hiện thông báo khi lỗi
            tips
                .text(t)
                .addClass("ui-state-highlight");
            setTimeout(function () {
                tips.removeClass("ui-state-highlight", 1500);
            }, 500);
        }

        function checkLength(o, n, min, max) {// Kiểm tra chiều dài chuổi nhập vào
            if (o.val().length > max || o.val().length < min) {
                o.addClass("ui-state-error");
                updateTips("Chiều dài của " + n + " phải nằm giữa " +
                    min + " và " + max + ".");
                o.focus();
                return false;
            } else {
                return true;
            }
        }

        function checkNum(o, n) {// Kiểm tra chiều dài chuổi nhập vào
            if (o.val()) {
                o.addClass("ui-state-error");
                updateTips(n + " không phải số .");
                o.focus();
                return false;
            } else {
                return true;
            }
        }

        function checkNull(o, n) {
            if (o.val() == "") {
                o.addClass("ui-state-error");
                updateTips(n + " không được trống .");
                o.focus();
                return false;
            } else {
                return true;
            }
        }

        function checkSelect(o, n) {
            if (o.val() == "-1") {
                o.addClass("ui-state-error");
                updateTips(n + " không được trống .");
                o.focus();
                return false;
            } else {
                return true;
            }
        }

        function checkRegexp(o, regexp, n) {
            if (!( regexp.test(o.val()) )) {
                o.addClass("ui-state-error");
                updateTips(n);
                return false;
            } else {
                return true;
            }
        }

        $("#loaidinhmucsp").change(function () {
            var masp = $("#masp").val();
            var tensp = $("#tensp").val();

            var $soluongspuocluong = $("#soluonguocluong").val();

            $loaidinhmucsp =  $("#loaidinhmucsp").val();

            if (masp!="" && tensp!="") {
                if($loaidinhmucsp=="1")
                    $("#gird_chitiet_dinhmuc").load("form/bang_gird_chitiet_dinhmucxemay_theoduong.php?masp='" + masp + "'&list=0&loaidinhmucsp='1'&soluongspuocluong='"+$soluongspuocluong+"'");// Lấy danh sách chưa có nhập
                  else
                    $("#gird_chitiet_dinhmuc").load("form/bang_gird_chitiet_dinhmucxemay_theokm.php?masp='" + masp + "'&list=0&loaidinhmucsp='"+$loaidinhmucsp+"'&soluongspuocluong='"+$soluongspuocluong+"'");// Lấy danh sách chưa có nhập

            }
        });

        $("#soluonguocluong").change(function () {
            var masp = $("#masp").val();
            var tensp = $("#tensp").val();

            var $soluongspuocluong = $("#soluonguocluong").val();

            $loaidinhmucsp =  $("#loaidinhmucsp").val();

            if (masp!="" && tensp!="") {
                if($loaidinhmucsp=="1")
                    $("#gird_chitiet_dinhmuc").load("form/bang_gird_chitiet_dinhmucxemay_theoduong.php?masp='" + masp + "'&list=0&loaidinhmucsp='1'&soluongspuocluong='"+$soluongspuocluong+"'");// Lấy danh sách chưa có nhập
                else
                    $("#gird_chitiet_dinhmuc").load("form/bang_gird_chitiet_dinhmucxemay_theokm.php?masp='" + masp + "'&list=0&loaidinhmucsp='"+$loaidinhmucsp+"'&soluongspuocluong='"+$soluongspuocluong+"'");// Lấy danh sách chưa có nhập

            }
        });

        $("#Form-chinh").keydown(function (event) {//--------------Các phím tắt
            if (event.keyCode == Keys.INSERT) {// Sửa
                //alert(12);
                //$( "#grid_editing_chitiet_nhapkho" ).pqGrid( {dataModel: { postDataOnce: {list:1} }} );
               // $("#grid_editing_chitiet_nhapkho").pqGrid( "refreshDataAndView" );
                var masp = $("#masp").val();
                if(masp==""){
                    alert("Chưa chọn tài sản cần nhập !");
                }else{
                    var $soluongspuocluong = $("#soluonguocluong").val();
                    $loaidinhmucsp =  $("#loaidinhmucsp").val();

                    if($loaidinhmucsp=="1")
                        $("#gird_chitiet_dinhmuc").load("form/bang_gird_chitiet_dinhmucxemay_theoduong.php?masp='" + masp + "'&list=1&loaidinhmucsp='1'&soluongspuocluong='"+$soluongspuocluong+"'");// Lấy danh sách chưa có nhập
                    else
                        $("#gird_chitiet_dinhmuc").load("form/bang_gird_chitiet_dinhmucxemay_theokm.php?masp='" + masp + "'&list=1&loaidinhmucsp='"+$loaidinhmucsp+"'&soluongspuocluong='"+$soluongspuocluong+"'");// Lấy danh sách chưa có nhập
                }
            }
            if (event.keyCode == Keys.ESCAPE) {// Sửa
                change_data_quit_mavattu();
            }
        })

        ////end phím tắt-----------------------------------


        function ChucNang_nhapkho() {// Xử lý khi nhấp button đồng ý
            var valid = true;

            allFields.removeClass("ui-state-error");// kiem tra du lieu

            valid = valid && checkNull(STT, " Số TT  ");
            valid = valid && checkNull(makhachhang, " Mã khách hàng ");
            valid = valid && checkNull(manoidung, " Mã nội dung ");
            valid = valid && checkNull(makho, " Mã kho ");
            //valid = valid && checkSoHoaDonTrung();

            if (valid) {
                $.ajax({
                    url: $$dir_module_dmsanpham + "addpsts.php", // Bao gồm cả add và edit
                    type: "get", // chọn phương thức gửi là get
                    dateType: "text", // dữ liệu trả về dạng text
                    data: { // Danh sách các thuộc tính sẽ gửi đi
                        STT: STT.val().trim(),
                        ngayghiso: ngayghiso.val().trim(),
                        ngayhoadon: $("#ngay").val().trim(),
                        mataisan: $("#mataisan").val().trim(),
                        tentaisan: $("#tentaisan").val().trim(),
                        manoidung: $("#manoidung").val().trim(),
                        noidung: $("#noidung").val().trim(),
                        mabp: $("#makho").val().trim(),
                        bophan: $("#tenkho").val().trim(),
                        matk: $("#matk").val().trim(),
                        NhomTS: $("#NhomTS").val().trim(),
                        congsuat: $("#congsuat").val().trim(),
                        nuocsanxuat: $("#nuocsanxuat").val().trim(),
                        donvitinh: $("#donvitinh").val().trim(),
                        soluong: $("#soluong").val().trim(),
                        ngaysudung: $("#ngaysudung").val().trim(),
                        nguyengia: $("#nguyengia").val().trim(),
                        giatriconlai: $("#giatriconlai").val().trim(),
                        tylekhachhang: $("#tylekhachhang").val().trim(),
                        thoigiansudung: $("#thoigiansudung").val().trim(),
                        khauhaothang: $("#khauhaothang").val().trim(),
                        khauhaoquy: $("#khauhaoquy").val().trim(),
                        khauhaonam: $("#khauhaonam").val().trim(),
                        tkno: $("#tkno").val().trim(),
                        tkco: $("#tkco").val().trim(),
                        ghichu: $("#ghichu").val().trim(),
                        tanggiam: 0,
                    },
                    success: function (result) {
                        $('.dialog_main_thongbao').load('form/frm_thongbao_tang_taisan.php?sottphieukhac=<?php echo $sottphieukhac ?>');
                    }
                });
            }

            return valid;
        }

        function xoadialog_nhapkho() {// đóng form
            reset_dialog(".dialog-tangtaisan");
            reset_dialog(".dialog_main_dinhmuc_sanpham");
        }

        function change_data_quit_mavattu() { // Cảnh báo thoát khi thay đổi dữ liệu////////////////////////////////////////////////////
            {
                $.confirm({
                    title: 'Thông báo',
                    content: 'Bạn đang chuẩn bị thoát cửa sổ này ? .<br/>Nhấn phím <strong style="color:blue;">[Y]</strong> để đồng ý phím <strong style="color:red;">[N]</strong> để hủy bỏ ',
                    icon: 'fa fa-warning',
                    type: 'red',
                    buttons: {
                        "Đồng ý": {
                            keys: ['Y'], action: function () {
                                xoadialog_nhapkho();
                            }
                        },
                        "Hủy bỏ": {
                            keys: ['N'], action: function () {

                            }
                        }
                    }
                });
            }
        }

        dialog = $("#dialog-tangtaisan").dialog({
            autoOpen: false,
            height: getHeight(),
            width: getWidth(),
            modal: true,
            buttons: {
                "Kết thúc": function () {
                    change_data_quit_mavattu();
                }
            }
        });
        dialog.dialog("open");

    });
</script>