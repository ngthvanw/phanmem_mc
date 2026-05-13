<?php
$NgayHD = $_GET['ngayhd'];
$LoapPhieu = $_GET['loaiphieu'];
$SoPhieu = $_GET['sophieu'];
$tenkho = $_GET['tenkho'];
$hopdong = $_GET['hopdong'];
$hinhthucvanchuyen = $_GET['hinhthucvanchuyen'];
$tennguoilap = $_GET['tennguoilap'];
$ketoantruong = $_GET['ketoantruong'];
$giamdoc = $_GET['giamdoc'];


$SoPhieu = $_GET['sophieu'];
?>
<style>
    #dialog-insolieu_nhapkho fieldset {
        border: 1px solid #a1daf2 !important;
        font-weight: bold !important;
    }
</style>
<script>
    $(function () {
        $("#dialog-insolieu_nhapkho").dialog({
            resizable: false,
            height: "auto",
            width: 600,
            modal: true
        });
        $("#dialog-insolieu_nhapkho").keydown(function (event) {//--------------Các phím tắt
            if (event.keyCode == Keys.ESCAPE) {
                xoadialog_insolieu_thuchi();
				$("#tieptuc").focus();
            }
        });
        function xoadialog_insolieu_thuchi() {
            reset_dialog(".dialog-insolieu_nhapkho");
            reset_dialog(".dialog_main_insolieu_thuchi");
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
            xoadialog_insolieu_thuchi();
			$("#tieptuc").focus();
        });
		$("#batđauin_insolieu_thuchi").focus();

        $("#batđauin_insolieu_thuchi").click(function () {
            var parsedJson = "";

            var $sophieu =<?php echo $SoPhieu ?>;
            var $ngayhd = <?php echo $NgayHD ?>;
			var $loaiphieu =<?php echo $LoapPhieu ?>;
            var $NgayLap = $("#NgayLap_InPhieuThuChi").val();
            var $TenPhieu = $("#TenPhieu_ThuChi").val();
            var $tenkho = "<?php echo $tenkho ?>";
            var $hopdong = "<?php echo $hopdong ?>";
            var $hinhthucvanchuyen = "<?php echo $hinhthucvanchuyen ?>";
            var $tennguoilap = "<?php echo $tennguoilap ?>";
            var $ketoantruong = "<?php echo $ketoantruong ?>";
            var $giamdoc = "<?php echo $giamdoc ?>";
			 var $tuphieu = $("#NgayLap_TuPhieuSo").val().trim();
            var $denphieu = $("#NgayLap_DenPhieuSo").val().trim();
            $.ajax({// Lấy thông tin phiếu và lưu vào session
                url: $dir_module_nhapkho + "laythongtininphieuhoadon.php",
                data: {
                    sophieu: $sophieu,
					tuphieu: $tuphieu,
                    denphieu: $denphieu,
					loaiphieu: $loaiphieu,
                    ngayhd: $ngayhd,
                    ngaylap: $NgayLap,
                    tenphieu: $TenPhieu,
                    tenkho: $tenkho,
                    hopdong: $hopdong,
                    hinhthucvanchuyen: $hinhthucvanchuyen,
                    tennguoilap: $tennguoilap,
                    ketoantruong: $ketoantruong,
                    giamdoc: $giamdoc,

                },
                async: false,
                success: function (response) {
                    //parsedJson =(response);
                }
            });
            // window.open($dir_module_manv_chamcong+'exportexcel.php?json='+encode64(parsedJson)+"&mactnhom="+(stringmact_nhom)+"&tuan="+encode64($tuan));
            //$('.dialog_main_print').load("form/print_phieuthu_chi.php");
            loadiFrame('modules/psmavattu/inphieu.php');
            $("#ifr_inphieuthuchi").load(
                function () {
                    window.frames['ifr_inphieuthuchi'].focus();
                    window.frames['ifr_inphieuthuchi'].print();
                }
            );
        });
        $("#xemtruockhiin_insolieu_thuchi").click(function () {
            var parsedJson = "";

            var $sophieu =<?php echo $SoPhieu ?>;
			
            var $ngayhd = <?php echo $NgayHD ?>;
            var $NgayLap = $("#NgayLap_InPhieuThuChi").val();
            var $TenPhieu = $("#TenPhieu_ThuChi").val();
            var $tenkho = "<?php echo $tenkho ?>";
            var $hopdong = "<?php echo $hopdong ?>";
            var $hinhthucvanchuyen = "<?php echo $hinhthucvanchuyen ?>";
            var $tennguoilap = "<?php echo $tennguoilap ?>";
            var $ketoantruong = "<?php echo $ketoantruong ?>";
            var $giamdoc = "<?php echo $giamdoc ?>";
			var $loaiphieu =<?php echo $LoapPhieu ?>;
            var $tuphieu = $("#NgayLap_TuPhieuSo").val().trim();
            var $denphieu = $("#NgayLap_DenPhieuSo").val().trim();
            $.ajax({// Lấy thông tin phiếu và lưu vào session
                url: $dir_module_nhapkho + "laythongtininphieuhoadon.php",
                data: {
                    sophieu: $sophieu,
                    loaiphieu: $loaiphieu,
                    tuphieu: $tuphieu,
                    denphieu: $denphieu,
                    ngayhd: $ngayhd,
                    ngaylap: $NgayLap,
                    tenphieu: $TenPhieu,
                    tenkho: $tenkho,
                    hopdong: $hopdong,
                    hinhthucvanchuyen: $hinhthucvanchuyen,
                    tennguoilap: $tennguoilap,
                    ketoantruong: $ketoantruong,
                    giamdoc: $giamdoc,

                },
                async: false,
                success: function (response) {
                    //parsedJson =(response);
                }
            });
            // window.open($dir_module_manv_chamcong+'exportexcel.php?json='+encode64(parsedJson)+"&mactnhom="+(stringmact_nhom)+"&tuan="+encode64($tuan));
            $('.dialog_main_print').load("form/print_phieunhap_xuat.php?tuphieu="+$tuphieu+"&denphieu="+$denphieu);
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
                            <td width="30%">Tiêu đề</td>
                            <td width="70%">
                                <label for="TenPhieu_ThuChi"></label>
                                <input type="text" name="TenPhieu_ThuChi" style="width:100%" id="TenPhieu_ThuChi"
                                       value="<?php if ($LoapPhieu == 1) echo 'PHIẾU NHẬP KHO'; else echo 'PHIẾU XUẤT KHO'; ?>"/>
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
                          <td>Từ phiếu</td>
                          <td><input type="number" name="NgayLap_InPhieuThuChi2" style="width:20%"
                                       value="<?php echo $SoPhieu; ?>" id="NgayLap_TuPhieuSo"/>
                            đến 
                              <input type="number" name="NgayLap_DenPhieuSo" style="width:20%"
                                       value="<?php echo $SoPhieu; ?>" id="NgayLap_DenPhieuSo"/>
                          </td>
                        </tr>
                    </table>
                </fieldset>
            </td>
            <td style="width: 30%;" valign="top">
                <fieldset style="margin-top:10px;">
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