<?php
require ("../config.php");
$Thangtk = $_GET['thangtk'];
$sole = $_GET['sole'];
$congdontuthang = $_GET['congdontuthang'];
$congdondenthang = $_GET['congdondenthang'];
$congdon = $_GET['congdon'];
$Inxoasoam = $_GET['Inxoasoam'];
$loctheotk = $_GET['loctheotk'];
$loctheokho = $_GET['loctheokho'];
$PhuongPhapTinhGiaVon = $_GET['PhuongPhapTinhGiaVon'];
if($congdon==0){
    $ngayhoadon="Tháng ".$_GET['thangtk']."-".$_SESSION['NienDo'];
}else{
    $ngayhoadon="Từ tháng ".$congdontuthang." đến tháng ".$congdondenthang;
}
?>
<style>
    #dialog-insolieu_nhapkho fieldset {
        border: 1px solid #a1daf2 !important;
        font-weight: bold !important;
    }
</style>
<script>
    $(function () {
        $dir_module_nhapkho = "modules/psmavattu/";
        $("#dialog-insolieu_nhapkho").dialog({
            resizable: false,
            height: "auto",
            width: 650,
            modal: true
        });
        $("#dialog-insolieu_nhapkho").keydown(function (event) {//--------------Các phím tắt
            if (event.keyCode == Keys.ESCAPE) {
                xoadialog_insolieu_thuchi();
            }
        });
        function xoadialog_insolieu_thuchi() {
            reset_dialog(".dialog-insolieu_nhapkho");
            reset_dialog(".dialog_main_thongtin_nhapxuatkho");
        }

        //----- Di chuyển các trường
        $("#TenPhieu_ThuChi").keydown(function (event) {//--------------Các phím tắt
            if (event.keyCode == Keys.ENTER) {
                $("#NgayHoaDon_InPhieu_ThuChi").focus();
            }
        });
        $("#NgayHoaDon_InPhieu_ThuChi").keydown(function (event) {//--------------Các phím tắt
            if (event.keyCode == Keys.ENTER) {
                $("#NgayLap_InPhieuThuChi").focus();
            }
        });
        $("#NgayLap_InPhieuThuChi").keydown(function (event) {//--------------Các phím tắt
            if (event.keyCode == Keys.ENTER) {
                $("#XuatExcel").focus();
            }
        });

        $("#XuatExcel").keydown(function (event) {//--------------Các phím tắt
            if (event.keyCode == Keys.ENTER) {
                $("#batđauin_insolieu_thuchi").focus();
            }
        });
        //--Kết thúc di chuyễn các trường

        $("#ketthuc_insolieu_thuchi").click(function () {
            xoadialog_insolieu_thuchi();
        });

        $("#batđauin_insolieu_thuchi").click(function () {
            var parsedJson = "";
            $TenPhieu_ThuChi = $("#TenPhieu_ThuChi").val();
            $NgayLap_InPhieuThuChi = $("#NgayLap_InPhieuThuChi").val();
            $NgayHoaDon_InPhieu_ThuChi = $("#NgayHoaDon_InPhieu_ThuChi").val();
            $PhuongPhapTinhGiaVon = '<?php echo $PhuongPhapTinhGiaVon; ?>';
            $gomnhommavt = $("#gomnhommavt").prop("checked");
            $.ajax({// Lấy thông tin phiếu và lưu vào session
                url: $dir_module_nhapkho + "laythongtininphieutkchitietthang_theonhom.php",
                data: {
                    thangtk:<?php echo $Thangtk; ?>,
                    sole:<?php echo $sole ?>,
                    congdontuthang:"<?php echo $congdontuthang ?>",
                    congdondenthang:"<?php echo $congdondenthang ?>",
                    congdon:<?php echo $congdon ?>,
					Inxoasoam:<?php echo $Inxoasoam ?>,
					loctheotk:'<?php echo $loctheotk ?>',
                    loctheokho:'<?php echo $loctheokho ?>',
                    tenphieu:$TenPhieu_ThuChi,
                    ngayhoadon:$NgayHoaDon_InPhieu_ThuChi,
                    ngaylap:$NgayLap_InPhieuThuChi,
                    PhuongPhapTinhGiaVon:$PhuongPhapTinhGiaVon,
                    gomnhommavt:$gomnhommavt
                },
                async: false,
                success: function (response) {
                }
            });
            if($("#XuatExcel").prop("checked") == true){
                window.open($dir_module_nhapkho+"xuatexceltkchitiet_theonhom.php?sole=<?php echo $sole ?>");
            }else{
                if($PhuongPhapTinhGiaVon=='2'){

                    if($gomnhommavt==false){
                        loadiFrame('modules/psmavattu/inphieutkchitietthang_theonhom_lienhoan.php?sole=<?php echo $sole ?>');
                    }else{
                        loadiFrame('modules/psmavattu/inphieutkchitietthang_theonhom.php?sole=<?php echo $sole ?>');
                    }
                }else {
                    loadiFrame('modules/psmavattu/inphieutkchitietthang_theonhom.php?sole=<?php echo $sole ?>');
                }
                $("#ifr_inphieuthuchi").load(
                    function () {
                        window.frames['ifr_inphieuthuchi'].focus();
                        window.frames['ifr_inphieuthuchi'].print();
                    }
                );
            }
        });
        $("#xemtruockhiin_insolieu_thuchi").click(function () {
            var parsedJson = "";
            $TenPhieu_ThuChi = $("#TenPhieu_ThuChi").val();
            $NgayLap_InPhieuThuChi = $("#NgayLap_InPhieuThuChi").val();
            $NgayHoaDon_InPhieu_ThuChi = $("#NgayHoaDon_InPhieu_ThuChi").val();
            $gomnhommavt = $("#gomnhommavt").prop("checked");
            $PhuongPhapTinhGiaVon = '<?php echo $PhuongPhapTinhGiaVon; ?>';
            //console.log($gomnhommavt);
            $.ajax({// Lấy thông tin phiếu và lưu vào session
                url: $dir_module_nhapkho + "laythongtininphieutkchitietthang_theonhom.php",
                data: {
                    thangtk:<?php echo $Thangtk; ?>,
                    sole:<?php echo $sole ?>,
                    congdontuthang:"<?php echo $congdontuthang ?>",
                    congdondenthang:"<?php echo $congdondenthang ?>",
                    congdon:<?php echo $congdon ?>,
					Inxoasoam:<?php echo $Inxoasoam ?>,
					loctheotk:'<?php echo $loctheotk ?>',
                    loctheokho:'<?php echo $loctheokho ?>',
                    tenphieu:$TenPhieu_ThuChi,
                    ngayhoadon:$NgayHoaDon_InPhieu_ThuChi,
                    ngaylap:$NgayLap_InPhieuThuChi,
                    PhuongPhapTinhGiaVon:$PhuongPhapTinhGiaVon,
                    gomnhommavt:$gomnhommavt
                },
                async: false,
                success: function (response) {
                }
            });
            //$('.dialog_main_print').load("form/print_phieutkchitietthang_theonhom.php?sole=<?php echo $sole ?>");
            if($PhuongPhapTinhGiaVon=='2'){
                if($gomnhommavt==false){
                    window.open("modules/psmavattu/inphieutkchitietthang_theonhom_lienhoan.php?sole=<?php echo $sole ?>", "bangke_tonkho_lienhoan", "menubar=0,resizable=1");
                }else{
                    window.open("modules/psmavattu/inphieutkchitietthang_theonhom.php?sole=<?php echo $sole ?>", "bangke_tonkho", "menubar=0,resizable=1");
                }
            }else {
                window.open("modules/psmavattu/inphieutkchitietthang_theonhom.php?sole=<?php echo $sole ?>", "bangke_tonkho", "menubar=0,resizable=1");
            }
        });
        function callPrint(iframeId) {
            var PDF = document.getElementById(iframeId);
            PDF.focus();
            PDF.contentWindow.print();
        }

        function loadiFrame(src) {
            $("#iframeplaceholder").html("<iframe id='ifr_inphieuthuchi' name='ifr_inphieuthuchi' src='" + src + "' />");
        }
    });

</script>
<div id="dialog-insolieu_nhapkho" title="In số liệu">
    <p>
    <div style="display: none;" id="iframeplaceholder"></div>
    <table style="width: 100%;">
        <tr>
            <td style="width: 70%;" valign="top">
                <fieldset>
                    <legend>Thiết lập</legend>
                    <table width="100%" border="0">
                        <tr>
                            <td>Tiêu đề</td>
                            <td>
                                <label for="TenPhieu_ThuChi"></label>
                                <input type="text" name="TenPhieu_ThuChi" style="width:100%" id="TenPhieu_ThuChi"
                                       value="BẢNG TỔNG HỢP CHI TIẾT VẬT LIỆU, DỤNG CỤ, SẢN PHẨM, HÀNG HÓA"/>
                            </td>
                        </tr>
                        <tr>
                            <td>Ngày HĐ</td>
                            <td><input type="text" name="NgayHoaDon_InPhieu_ThuChi" style="width:100%"
                                       id="NgayHoaDon_InPhieu_ThuChi" value="<?php echo $ngayhoadon; ?>"/></td>
                        </tr>
                        <tr>
                            <td>Ngày Lập</td>
                            <td><input type="date" name="NgayLap_InPhieuThuChi" style="width:100%"
                                       value="<?php echo date("Y-m-d"); ?>" id="NgayLap_InPhieuThuChi"/></td>
                        </tr>
                        <tr>
                          <td style="text-align:right">
                            &nbsp;&nbsp;<input type="checkbox" name="XuatExcel" id="XuatExcel" />
                            </td>
                          <td>Xuất excel</td>
                        </tr>
                    </table>
                </fieldset>
            </td>
            <td style="width: 30%;">
                <fieldset>
                    <button id="batđauin_insolieu_thuchi" class="ui-button ui-widget ui-corner-all"
                            style="width: 100%;margin-bottom: 2px;"><span
                                style="font-size: 16px;">Bắt đầu in</span></button>
                    <button id="xemtruockhiin_insolieu_thuchi" class="ui-button ui-widget ui-corner-all"
                            style="width: 100%;;margin-bottom: 2px;"><span
                                style="font-size: 16px;">Xem</span></button>
                    <button id="xuatexcel_insolieu_thuchi" class="ui-button ui-widget ui-corner-all"
                            style="width: 100%;;margin-bottom: 2px;display: none;"><span
                                style="font-size: 16px;">Xuất excel</span></button>
                    <button id="ketthuc_insolieu_thuchi" class="ui-button ui-widget ui-corner-all"
                            style="width: 100%;;margin-bottom: 2px;"><span
                                style="font-size: 16px;">Kết thúc</span></button>
                </fieldset>
            </td>
        </tr>
    </table>
    </p>
</div>