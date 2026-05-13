<?php
session_start();
$tungay = $_GET['tungay'];
$denngay = $_GET['denngay'];

$nam =$_SESSION['NienDo'];
$tonghopcanam =$_GET['tonghopcanam'];

$quy = LayQuy($denngay,$nam);

function LayQuy($thang,$nam){
    if($thang==1 ||$thang==2||$thang==3 ){
        $str=" Quý 1 năm ".$nam;
    }
    if($thang==4 ||$thang==5||$thang==6 ){
        $str=" Quý 2 năm ".$nam;
    }
    if($thang==7 ||$thang==8||$thang==9 ){
        $str=" Quý 3 năm ".$nam;
    }
    if($thang==10 ||$thang==11||$thang==12 ){
        $str=" Quý 4 năm ".$nam;
    }
    return $str;
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
        $dir_module_baocaothue = "modules/baocaothue/";
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
                url: $dir_module_baocaothue + "laythongtinbaocaohoadon.php",
                data: {
                    tungay:"<?php echo $tungay; ?>",
                    denngay:"<?php echo $denngay ?>",
                    intheothuesuat:"<?php echo $intheothuesuat ?>",
                    intheochungtu:"<?php echo $intheochungtu ?>",
                    sapxeptheohoadon:'<?php echo $sapxeptheohoadon ?>',
                    tenphieu:$("#TenPhieu_ThuChi").val(),
                    ngaylap:$("#NgayLap_InPhieuThuChi").val(),
                    ngayhoadon:$("#NgayHoaDon_InPhieu_ThuChi").val()
                },
                async: false,
                success: function (response) {
                }
            });
            if($("#XuatExcel").prop("checked") == true){
                window.open($dir_module_baocaothue+"xuatexcelbangkemuavao.php");
            }else{
                loadiFrame('tcpdf/baocao/inbangke_tinhinh_sudung_hoadon.php?sole=<?php echo $sole ?>');
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
                url: $dir_module_baocaothue + "laythongtinbaocaohoadon.php",
                data: {
                    tungay:"<?php echo $tungay; ?>",
                    denngay:"<?php echo $denngay ?>",
                    intheothuesuat:"<?php echo $intheothuesuat ?>",
                    intheochungtu:"<?php echo $intheochungtu ?>",
                    sapxeptheohoadon:"<?php echo $sapxeptheohoadon ?>",
                    tonghopcanam:"<?php echo $tonghopcanam ?>",
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
            $('.dialog_main_print').load("form/print_bangke_baocao_hoadon.php?quy=<?php echo $denngay ?>");
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
                                       value="BÁO CÁO THANH QUYẾT TOÁN HÓA ĐƠN HÀNG QUÝ"/>
                            </td>
                        </tr>
                        <tr>
                            <td>Ngày HĐ</td>
                            <td><input type="text" name="NgayHoaDon_InPhieu_ThuChi" style="width:100%"
                                       id="NgayHoaDon_InPhieu_ThuChi" value="<?php if($tonghopcanam=='true'){ echo "Năm ".$nam;}else {echo " Quý ".$denngay." năm ".$nam;} ?>"/></td>
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