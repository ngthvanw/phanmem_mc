<?php
session_start();
$thangtinhthue = $_GET['thangtinhthue'];
$namtinhthue = $_GET['namtinhthue'];
$machinhanh = $_GET['machinhanh'];
$kieuin = $_GET['kieuin'];
$loaitokhai = $_GET['loaitokhai'];
$query = $_SERVER['QUERY_STRING'];
$time = strtotime($denngay);
$thang =date("m",$time);
$nam =date("Y",$time);

$quy = LayQuy($thangtinhthue,$namtinhthue);

function LayQuy($thang,$nam){
    switch ($thang) {
        case 1:
            $str = "Tháng 1 năm ".$nam;
            break;
        case 2:
            $str = "Tháng 2 năm ".$nam;
            break;
        case 3:
            $str = "Tháng 3 năm ".$nam;
            break;
        case 4:
            $str = "Tháng 4 năm ".$nam;
            break;
        case 5:
            $str = "Tháng 5 năm ".$nam;
            break;
        case 6:
            $str = "Tháng 6 năm ".$nam;
            break;
        case 7:
            $str = "Tháng 7 năm ".$nam;
            break;
        case 8:
            $str = "Tháng 8 năm ".$nam;
            break;
        case 9:
            $str = "Tháng 9 năm ".$nam;
            break;
        case 10:
            $str = "Tháng 10 năm ".$nam;
            break;
        case 11:
            $str = "Tháng 11 năm ".$nam;
            break;
        case 12:
            $str = "Tháng 12 năm ".$nam;
            break;
        case "I":
            $str = "Quý 1 năm ".$nam;
            break;
        case "II":
            $str = "Quý 2 năm ".$nam;
            break;
        case "III":
            $str = "Quý 3 năm ".$nam;
            break;
        case "IV":
            $str = "Quý 4 năm ".$nam;
            break;
        case "V":
            $str = "Năm ".$nam;
            break;

    }
    return $str;
}

?>
<style>
    #dialog-insolieu_bangke_thue fieldset {
        border: 1px solid #a1daf2 !important;
        font-weight: bold !important;
    }
</style>
<script>
    $(function () {
        $dir_module_baocaothue = "modules/baocaothue/";
        $("#dialog-insolieu_bangke_thue").dialog({
            resizable: false,
            height: "auto",
            width: 650,
            modal: true
        });
        $("#dialog-insolieu_bangke_thue").keydown(function (event) {//--------------Các phím tắt
            if (event.keyCode == Keys.ESCAPE) {
                xoadialog_insolieu_thuchi();
            }
        });
        function xoadialog_insolieu_thuchi() {
            reset_dialog(".dialog-insolieu_bangke_thue");
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
                url: $dir_module_baocaothue + "laythongtininphieukekhaithue.php",
                data: {
                    thangtinhthue:"<?php echo $thangtinhthue; ?>",
                    namtinhthue:"<?php echo $namtinhthue; ?>",
                    machinhanh:"<?php echo $machinhanh; ?>",
                    loaitokhai:"<?php echo $loaitokhai; ?>",
                    tenphieu:$("#TenPhieu_ThuChi").val(),
                    ngaylap:$("#NgayLap_InPhieuThuChi").val(),
                    ngayhoadon:$("#NgayHoaDon_InPhieu_ThuChi").val()
                },
                async: false,
                success: function (response) {
                }
            });
            if($("#XuatExcel").prop("checked") == true){
                window.open($dir_module_baocaothue+"xuatexcelbangkebanra.php?sole=<?php echo $sole ?>");
            }else{
                loadiFrame('modules/baocaothue/inphieu_tokhai_thuegtgt_theopp_khautru.php?<?php echo $query; ?>');
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
                url: $dir_module_baocaothue + "laythongtininphieukekhaithue.php",
                data: {
                    thangtinhthue:"<?php echo $thangtinhthue; ?>",
                    namtinhthue:"<?php echo $namtinhthue; ?>",
                    machinhanh:"<?php echo $machinhanh; ?>",
                    loaitokhai:"<?php echo $loaitokhai; ?>",
                    tenphieu:$("#TenPhieu_ThuChi").val(),
                    ngaylap:$("#NgayLap_InPhieuThuChi").val(),
                    ngayhoadon:$("#NgayHoaDon_InPhieu_ThuChi").val()
                },
                async: false,
                success: function (response) {
                }
            });
            $('.dialog_main_print').load("form/print_bangke_thuegtgt_khautru.php?<?php echo $query; ?>");
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
<div id="dialog-insolieu_bangke_thue" title="In số liệu">
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
                                       value="TỜ KHAI THUẾ GIÁ TRỊ GIA TĂNG(GTGT)"/>
                            </td>
                        </tr>
                        <tr>
                            <td>Ngày HĐ</td>
                            <td><input type="text" name="NgayHoaDon_InPhieu_ThuChi" style="width:100%"
                                       id="NgayHoaDon_InPhieu_ThuChi" value="<?php echo $quy; ?>"/></td>
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