<?php
$NgayHD = $_GET['ngayhd'];
$LoaiPhieu = $_GET['loaiphieu'];
$SoPhieu = $_GET['sophieu'];
$MaPSKT = $_GET['mapskt'];
?>
<style>
    #dialog-insolieu_thuchi fieldset {
        border: 1px solid #a1daf2 !important;
        font-weight: bold !important;
    }
</style>
<script>
    $dir_module_ps_kt_khac_khac = "modules/psktkhac/";//----------------Lưới
    $(function () {
        $("#dialog-insolieu_thuchi").dialog({
            resizable: false,
            height: "auto",
            width: 600,
            modal: true
        });
        $("#dialog-insolieu_thuchi").keydown(function (event) {//--------------Các phím tắt
            if (event.keyCode == Keys.ESCAPE) {
                xoadialog_insolieu_thuchi();
            }
        });
        function xoadialog_insolieu_thuchi() {
            reset_dialog(".dialog-insolieu_thuchi");
            reset_dialog(".dialog_main_insolieu_thuchi");
        }


        $("#ketthuc_insolieu_thuchi").click(function () {
            xoadialog_insolieu_thuchi();
			$("#tieptuc").focus();
        });

        $("#batđauin_insolieu_thuchi").click(function () {
            var parsedJson = "";

            var $sophieu =<?php echo $SoPhieu ?>;
			var $loaiphieu =<?php echo $LoaiPhieu ?>;
            var $ngayhd = <?php echo $NgayHD ?>;
			 var $TuPhieu = $("#TuPhieu").val();
            var $DenPhieu = $("#DenPhieu").val();
            var $NgayLap = $("#NgayLap_InPhieuThuChi").val();
            var $TenPhieu = $("#TenPhieu_ThuChi").val();
            $.ajax({// Lấy thông tin phiếu và lưu vào session
                url: $dir_module_ps_kt_khac + "laythongtininphieuthuchi.php",
                data: {
                    sophieu: $sophieu,
                    loaiphieu: $loaiphieu,
					tuphieu: $TuPhieu,
                    denphieu: $DenPhieu,
                    ngayhd:$ngayhd,
                    ngaylap:$NgayLap,
                    tenphieu:$TenPhieu,
                },
                async: false,
                success: function (response) {
                    //parsedJson =(response);
                }
            });
            // window.open($dir_module_manv_chamcong+'exportexcel.php?json='+encode64(parsedJson)+"&mactnhom="+(stringmact_nhom)+"&tuan="+encode64($tuan));
            //$('.dialog_main_print').load("form/print_phieuthu_chi.php");
            loadiFrame('TCPDF/baocao/inphieu_hachtoan.php');
            $("#ifr_inphieuthuchi").load(
                function() {
                    window.frames['ifr_inphieuthuchi'].focus();
                    window.frames['ifr_inphieuthuchi'].print();
                }
            );
        });
        $("#xemtruockhiin_insolieu_thuchi").click(function () {
            var parsedJson = "";

            var $sophieu =<?php echo $SoPhieu ?>;
			var $loaiphieu =<?php echo $LoaiPhieu ?>;
            var $ngayhd = <?php echo $NgayHD ?>;
			 var $TuPhieu = $("#TuPhieu").val();
            var $DenPhieu = $("#DenPhieu").val();
            var $NgayLap = $("#NgayLap_InPhieuThuChi").val();
            var $TenPhieu = $("#TenPhieu_ThuChi").val();
            $.ajax({// Lấy thông tin phiếu và lưu vào session
                url: $dir_module_ps_kt_khac + "laythongtininphieuthuchi.php",
                data: {
                    sophieu: $sophieu,
					loaiphieu: $loaiphieu,
					tuphieu: $TuPhieu,
                    denphieu: $DenPhieu,
                    ngayhd:$ngayhd,
                    ngaylap:$NgayLap,
                    tenphieu:$TenPhieu,
                },
                async: false,
                success: function (response) {
                    //parsedJson =(response);
                }
            });
            // window.open($dir_module_manv_chamcong+'exportexcel.php?json='+encode64(parsedJson)+"&mactnhom="+(stringmact_nhom)+"&tuan="+encode64($tuan));
            $('.dialog_main_print').load("form/print_phieu_khac.php?loaiphieu=<?php echo $LoaiPhieu; ?>&tuphieu="+$TuPhieu+"&denphieu="+$DenPhieu);
        });
        function callPrint(iframeId) {
            var PDF = document.getElementById(iframeId);
            PDF.focus();
            PDF.contentWindow.print();
        }
        function loadiFrame(src)
        {
            $("#iframeplaceholder").html("<iframe id='ifr_inphieuthuchi' name='ifr_inphieuthuchi' src='" + src + "' />");
        }
		$("#batđauin_insolieu_thuchi").focus();
    });

</script>
<div id="dialog-insolieu_thuchi" title="In số liệu">
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
                                       value="<?php if ($LoapPhieu == 3) echo 'PHIẾU HẠCH TOÁN'; else echo 'PHIẾU HẠCH TOÁN'; ?>"/>
                            </td>
                        </tr>
                        <tr>
                            <td>Ngày HĐ</td>
                            <td><input type="date" name="NgayHoaDon_InPhieu_ThuChi" style="width:100%"
                                       id="NgayHoaDon_InPhieu_ThuChi" value="<?php echo $NgayHD; ?>"/></td>
                        </tr>
                        <tr>
                            <td>Ngày Lập</td>
                            <td><input type="date" name="NgayLap_InPhieuThuChi" style="width:100%"
                                       value="<?php echo date("Y-m-d"); ?>" id="NgayLap_InPhieuThuChi"/></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>Từ Phiếu<input type="text" name="TuPhieu" style="width:50px"
                                       value="<?php echo $MaPSKT; ?>" id="TuPhieu"/>
								Đến Phiếu<input type="text" name="DenPhieu" style="width:50px"
                                       value="<?php echo $MaPSKT; ?>" id="DenPhieu"/>
									   </td>
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