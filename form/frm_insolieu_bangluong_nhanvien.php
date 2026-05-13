<?php
session_start();
$tinhluongtheo = $_GET['tinhluongtheo'];
$txttinhluongtheo = $_GET['txttinhluongtheo'];
$hachtoanbaohientheotyle = $_GET['hachtoanbaohientheotyle'];
$nam =$_SESSION['NienDo'];
switch ($txttinhluongtheo) {
    case "1":
        $str=" Tháng 01 năm ".$nam;
        break;
    case "2":
        $str=" Tháng 02 năm ".$nam;
        break;
    case "3":
        $str=" Tháng 03 năm ".$nam;
        break;
    case "4":
        $str=" Tháng 04 năm ".$nam;
        break;
    case "5":
        $str=" Tháng 05 năm ".$nam;
        break;
    case "6":
        $str=" Tháng 06 năm ".$nam;
        break;
    case "7":
        $str=" Tháng 07 năm ".$nam;
        break;
    case "8":
        $str=" Tháng 08 năm ".$nam;
        break;
    case "9":
        $str=" Tháng 09 năm ".$nam;
        break;
    case "10":
        $str=" Tháng 10 năm ".$nam;
        break;
    case "11":
        $str=" Tháng 11 năm ".$nam;
        break;
    case "12":
        $str=" Tháng 12 năm ".$nam;
        break;
    case "I":
        $str=" Quý 1 năm ".$nam;
        break;
    case "II":
        $str=" Quý 2 năm ".$nam;
        break;
    case "III":
        $str=" Quý 3 năm ".$nam;
        break;
    case "IV":
        $str=" Quý 4 năm ".$nam;
        break;
    case "V":
        $str=" Năm ".$nam;
        break;
}
if($tinhluongtheo=="true"){
    $str=" Năm ".$nam;
    $tenphieu = "BẢNG TỔNG HỢP LƯƠNG NHÂN VIÊN ";
}else{
    $tenphieu = "BẢNG LƯƠNG NHÂN VIÊN ";
}

?>
<style>
    #dialog-thongbao_baocao_hoadon fieldset {
        border: 1px solid #a1daf2 !important;
        font-weight: bold !important;
    }
</style>
<script>
    $(function () {
        $dir_module_manv = "modules/manhanvien/";
        $("#dialog-thongbao_baocao_hoadon").dialog({
            resizable: false,
            height: "auto",
            width: 650,
            modal: true
        });
        $("#dialog-thongbao_baocao_hoadon").keydown(function (event) {//--------------Các phím tắt
            if (event.keyCode == Keys.ESCAPE) {
                xoadialog_insolieu_thuchi();
            }
        });
        function xoadialog_insolieu_thuchi() {
            reset_dialog(".dialog-thongbao_baocao_hoadon");
            reset_dialog(".dialog_main_thongbao");
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
            $.ajax({// Lấy thông tin phiếu và lưu vào session
                url: $dir_module_manv + "laythongtin_bangluong_nhanvien.php",
                data: {
                    tinhluongtheo:"<?php echo $tinhluongtheo; ?>",
                    txttinhluongtheo:"<?php echo $txttinhluongtheo ?>",
                    tenphieu:$("#TenPhieu_ThuChi").val(),
                    ngaylap:$("#NgayLap_InPhieuThuChi").val(),
                    ngayhoadon:$("#NgayHoaDon_InPhieu_ThuChi").val()
                },
                async: false,
                success: function (response) {
                }
            });
            if($("#XuatExcel").prop("checked") == true){
                window.open($dir_module_manv+"xuatexcelbangluongnhanvien.php");
            }else{
                loadiFrame('tcpdf/baocao/inbangke_bangluong_nhanvien.php');
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
            $.ajax({// Lấy thông tin phiếu và lưu vào session
                url: $dir_module_manv + "laythongtin_bangluong_nhanvien.php",
                data: {
                    tinhluongtheo:"<?php echo $tinhluongtheo; ?>",
                    txttinhluongtheo:"<?php echo $txttinhluongtheo ?>",
                    tenphieu:$("#TenPhieu_ThuChi").val(),
                    ngaylap:$("#NgayLap_InPhieuThuChi").val(),
                    ngayhoadon:$("#NgayHoaDon_InPhieu_ThuChi").val()
                },
                async: false,
                success: function (response) {
                }
            });
            //$('.dialog_main_print').load("form/print_bangke_baocao_hoadon.php?keuin?=<?php echo $kieuin; ?>");
			//window.open("tcpdf/baocao/inbangke_tinhinh_sudung_hoadon.php?sole=<?php echo $sole ?>","mywindow","menubar=0,resizable=1");
            window.open("tcpdf/baocao/inbangke_bangluong_nhanvien.php","bangluongnhanvienthang<?php echo $txttinhluongtheo ?>","menubar=0,resizable=0");
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
<div id="dialog-thongbao_baocao_hoadon" title="In số liệu">
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
                                       value="<?php echo $tenphieu; ?>"/>
                            </td>
                        </tr>
                        <tr>
                            <td>Ngày HĐ</td>
                            <td><input type="text" name="NgayHoaDon_InPhieu_ThuChi" style="width:100%"
                                       id="NgayHoaDon_InPhieu_ThuChi" value="<?php echo  $str; ?>"/></td>
                        </tr>
                        <tr>
                            <td>Ngày Lập</td>
                            <td><input type="text" name="NgayLap_InPhieuThuChi" style="width:100%"
                                       value="Trà Vinh, Ngày <?php echo date("d"); ?> tháng <?php echo date("m"); ?> năm <?php echo date("Y"); ?>" id="NgayLap_InPhieuThuChi"/></td>
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
                    <button id="thaydoi_dulieu_bangluong" onclick="$('.dialog_main_manv').load('form/frm_dm_manv_thaydoi.php?thang=<?php echo $txttinhluongtheo; ?>&hachtoanbaohientheotyle=<?php echo $hachtoanbaohientheotyle; ?>');" class="ui-button ui-widget ui-corner-all"
                            style="width: 100%;;margin-bottom: 2px;"><span
                                style="font-size: 16px;">Thay đổi</span></button>
                    <button id="ketthuc_insolieu_thuchi" class="ui-button ui-widget ui-corner-all"
                            style="width: 100%;;margin-bottom: 2px;"><span
                                style="font-size: 16px;">Kết thúc</span></button>
                </fieldset>
            </td>
        </tr>
    </table>
    </p>
</div>