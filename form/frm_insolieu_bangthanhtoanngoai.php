<?php
$mabangke = $_GET['mabangke'];
?>
<style>
    #dialog-insolieu_xuatkho fieldset {
        border: 1px solid #a1daf2 !important;
        font-weight: bold !important;
    }
</style>
<script>
    $(function () {
        $dir_module_makhachhang = "modules/makhachhang/";////////////////Khai báo đường dẫn vào mudole
        $dir_module_matk = "modules/httk/";
        $dir_module_manoidung = "modules/manoidung/";////////////////Khai báo đường dẫn vào mudole
        $dir_module_mact = "modules/macongtrinh/";////////////////Khai báo đường dẫn vào mudole
        $dir_module_chitiet_vattu = "modules/ps_chitiet_mavt/";//----------------Lưới
        $dir_module_dmsanpham = "modules/dmsanpham/";//----------------Lưới
        $dir_module_nhomtaisan = "modules/nhomtaisan/";//----------------Lưới
        $dir_module_bangkechitien = "modules/bangkechitien/";//----------------Lưới
        $("#dialog-insolieu_xuatkho").dialog({
            resizable: false,
            height: "auto",
            width: 600,
            modal: true
        });
        $("#dialog-insolieu_xuatkho").keydown(function (event) {//--------------Các phím tắt
            if (event.keyCode == Keys.ESCAPE) {
                xoadialog_insolieu_xuatkho();
            }
        });
        function xoadialog_insolieu_xuatkho() {
            reset_dialog(".dialog-insolieu_xuatkho");
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
                $("#batđauin_insolieu_thuchi").focus();
            }
        });
        //--Kết thúc di chuyễn các trường

        $("#ketthuc_insolieu_thuchi").click(function () {
            xoadialog_insolieu_xuatkho();
			$("#tieptuc").focus();
        });

        $("#batđauin_insolieu_thuchi").click(function () {
            var parsedJson = "";
            $ten = $("#TenPhieu_ThuChi").val();
            $ngaylap = $("#NgayLap_InPhieuThuChi").val();

            $.ajax({// Lấy thông tin phiếu và lưu vào session
                url: $dir_module_bangkechitien + "laythongtininphieunhapxuat.php",
                data: {


                },
                async: false,
                success: function (response) {
                    //parsedJson =(response);
                }
            });
            loadiFrame('tcpdf/baocao/inbangke_thuengoai.php?ten='+$ten+'&ngaylap='+$ngaylap);
            $("#ifr_inphieuthuchi").load(
                function () {
                    window.frames['ifr_inphieuthuchi'].focus();
                    window.frames['ifr_inphieuthuchi'].print();
                }
            );
        });
        $("#xemtruockhiin_insolieu_xuatkho").click(function () {
$ten = $("#TenPhieu_ThuChi").val();
$ngaylap = $("#NgayLap_InPhieuThuChi").val();
            window.open("tcpdf/baocao/inbangke_thuengoai.php?ten="+$ten+"&ngaylap="+$ngaylap,"bangke_THUENGOAI","menubar=0,resizable=0");
        });

        $("#xuatexcel_insolieu_thuchi").click(function () {
            var parsedJson = "";

            $.ajax({// Lấy thông tin phiếu và lưu vào session
                url: $dir_module_bangkechitien + "laythongtininphieunhapxuat.php",
                data: {


                },
                async: false,
                success: function (response) {
                    window.open($dir_module_bangkechitien+"xuatexcelphieuxuatkho.php?sole=<?php echo $sole ?>");
                }
            });
        });

        function callPrint(iframeId) {
            var PDF = document.getElementById(iframeId);
            PDF.focus();
            PDF.contentWindow.print();
        }

        function loadiFrame(src) {
            $("#iframeplaceholder").html("<iframe id='ifr_inphieuthuchi' name='ifr_inphieuthuchi' src='" + src + "' />");
        }
		$("#batđauin_insolieu_thuchi").focus();
    });

</script>
<div id="dialog-insolieu_xuatkho" title="In số liệu">
    <p>
    <div style="display: none;" id="iframeplaceholder"></div>
    <table style="width: 100%;">
        <tr>
            <td style="width: 70%;" valign="top">
                <fieldset>
                    <legend>Thiết lập</legend>
                    <table width="100%" border="0">
                        <tr>
                            <td width="30%">Tiêu đề</td>
                            <td width="70%">
                                <label for="TenPhieu_ThuChi"></label>
                                <input type="text" name="TenPhieu_ThuChi" style="width:100%" id="TenPhieu_ThuChi"
                                       value="<?php if ($LoapPhieu == 1) echo 'BẢNG THANH TOÁN TIỀN THUÊ NGOÀI'; else echo 'BẢNG THANH TOÁN TIỀN THUÊ NGOÀI'; ?>"/>
                            </td>
                        </tr>
                        <tr>
                            <td>Ngày HĐ</td>
                            <td><input type="text" name="NgayHoaDon_InPhieu_ThuChi" style="width:100%"
                                       id="NgayHoaDon_InPhieu_ThuChi" value="<?php echo "Ngày ".date("d")." tháng ".date("m")." năm ".date("Y"); ?>"/></td>
                        </tr>
                        <tr>
                            <td>Ngày Lập</td>
                            <td><input type="text" name="NgayLap_InPhieuThuChi" style="width:100%"
                                       value="<?php echo "Ngày ".date("d")." tháng ".date("m")." năm ".date("Y"); ?>" id="NgayLap_InPhieuThuChi"/></td>
                        </tr>
                    </table>
                </fieldset>
            </td>
            <td style="width: 30%;">
                <fieldset>
                    <button id="batđauin_insolieu_thuchi" class="ui-button ui-widget ui-corner-all"
                            style="width: 100%;margin-bottom: 2px;"><span
                                style="font-size: 16px;">Bắt đầu in</span></button>
                    <button id="xemtruockhiin_insolieu_xuatkho" class="ui-button ui-widget ui-corner-all"
                            style="width: 100%;;margin-bottom: 2px;"><span
                                style="font-size: 16px;">Xem</span></button>

                    <button id="ketthuc_insolieu_thuchi" class="ui-button ui-widget ui-corner-all"
                            style="width: 100%;;margin-bottom: 2px;"><span
                                style="font-size: 16px;">Kết thúc</span></button>
                </fieldset>
            </td>
        </tr>
    </table>
    </p>
</div>