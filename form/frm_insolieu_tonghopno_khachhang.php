<?php
session_start();
$tungay = $_GET['tungay'];
$denngay = $_GET['denngay'];
$mataikhoan = $_GET['mataikhoan'];
$makhachhang = $_GET['makhachhang'];
$intheochungtu = $_GET['intheochungtu'];
$loaitien = $_GET['loaitien'];
$congdontheo = $_GET['congdontheo'];
$kieuin = $_GET['kieuin'];

$nhapxuatkho = $_GET['nhapxuatkho'];
$nhomkhachhang = $_GET['nhomkhachhang'];
$xemtonghop = $_GET['xemtonghop'];
$butrucongno = $_GET['butrucongno'];

$time = strtotime($denngay);
$thang =date("m",$time);
$nam =date("Y",$time);

$timetungay = strtotime($tungay);
$timedenngay = strtotime($denngay);
$tungay_fm .= date("d-m-Y", $timetungay);
$denngay_fm .= date("d-m-Y", $timedenngay);

$quy = "Từ ngày ".$tungay_fm." đến ngày ".$denngay_fm;

//$quy = LayQuy($thang,$nam);

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
    #dialog-insolieu_bangke_laigop fieldset {
        border: 1px solid #a1daf2 !important;
        font-weight: bold !important;
    }
</style>
<script>
    $(function () {
        $dir_module_psvattu_ketoantonghop = "modules/ketoantonghop/";
        $("#dialog-insolieu_bangke_laigop").dialog({
            resizable: false,
            height: "auto",
            width: 650,
            modal: true
        });
        $("#dialog-insolieu_bangke_laigop").keydown(function (event) {//--------------Các phím tắt
            if (event.keyCode == Keys.ESCAPE) {
                xoadialog_insolieu_thuchi();
            }
        });
        function xoadialog_insolieu_thuchi() {
            reset_dialog(".dialog-insolieu_bangke_laigop");
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
                url: $dir_module_psvattu_ketoantonghop + "laythongtininphieu_bangtonghop_nokhachhang.php",
                data: {
                    tungay:"<?php echo $tungay; ?>",
                    denngay:"<?php echo $denngay ?>",
                    makhachhang:"<?php echo $makhachhang ?>",
                    mataikhoan:'<?php echo $mataikhoan ?>',
                    nhomkhachhang:'<?php echo $nhomkhachhang ?>',
                    loaitien:'<?php echo $loaitien ?>',
                    tenphieu:$("#TenPhieu_ThuChi").val(),
                    ngaylap:$("#NgayLap_InPhieuThuChi").val(),
                    ngayhoadon:$("#NgayHoaDon_InPhieu_ThuChi").val()
                },
                async: false,
                success: function (response) {
                }
            });
            if($("#XuatExcel").prop("checked") == true){
                window.open($dir_module_psvattu_ketoantonghop+"xuatexcelbangkemuavao.php");
            }else{
                if('<?php echo $loaitien ?>'=='NT') {
                    loadiFrame('tcpdf/baocao/inbang_tonghop_nokhachhang_nt.php?xemtonghop=<?php echo $xemtonghop; ?>');
                }else{
					if('<?php echo $congdontheo ?>'=='manhom'){
						loadiFrame('tcpdf/baocao/inbang_tonghop_nokhachhang_theomanhom.php?xemtonghop=<?php echo $xemtonghop; ?>');
					}else{
						loadiFrame('tcpdf/baocao/inbang_tonghop_nokhachhang.php?xemtonghop=<?php echo $xemtonghop; ?>');
					}
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
            $.ajax({// Lấy thông tin phiếu và lưu vào session
                url: $dir_module_psvattu_ketoantonghop + "laythongtininphieu_bangtonghop_nokhachhang.php",
                data: {
                    tungay:"<?php echo $tungay; ?>",
                    denngay:"<?php echo $denngay ?>",
                    makhachhang:"<?php echo $makhachhang ?>",
                    mataikhoan:'<?php echo $mataikhoan ?>',
                    nhomkhachhang:'<?php echo $nhomkhachhang ?>',
                    loaitien:'<?php echo $loaitien ?>',
                    tenphieu:$("#TenPhieu_ThuChi").val(),
                    ngaylap:$("#NgayLap_InPhieuThuChi").val(),
                    ngayhoadon:$("#NgayHoaDon_InPhieu_ThuChi").val()
                },
                async: false,
                success: function (response) {
                }
            });
            if('<?php echo $loaitien ?>'=='NT'){
                window.open("tcpdf/baocao/inbang_tonghop_nokhachhang_nt.php?xemtonghop=<?php echo $xemtonghop; ?>","tonghopnokhachhang","menubar=0,resizable=0");
            }else{
				if('<?php echo $congdontheo ?>'=='manhom'){
						window.open("tcpdf/baocao/inbang_tonghop_nokhachhang_theomanhom.php?xemtonghop=<?php echo $xemtonghop; ?>","tonghopnokhachhang","menubar=0,resizable=0");
					}else{
						window.open("tcpdf/baocao/inbang_tonghop_nokhachhang.php?xemtonghop=<?php echo $xemtonghop; ?>","tonghopnokhachhang","menubar=0,resizable=0");
					}
            }
        });
        function callPrint(iframeId) {
            var PDF = document.getElementById(iframeId);
            PDF.focus();
            PDF.contentWindow.print();
        }

        function loadiFrame(src) {
            $("#iframeplaceholder").html("<iframe id='ifr_inphieuthuchi' name='ifr_inphieuthuchi' src='" + src + "' width='0px' height='0px' />");
        }
    });

</script>
<div id="dialog-insolieu_bangke_laigop" title="In số liệu">
    <p>
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
                                       value="BẢNG TỔNG HỢP NỢ KHÁCH HÀNG"/>
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
    <div id="iframeplaceholder"></div>
    </p>
</div>