<?php
session_start();
$quy = $_GET['quy'];
$bangchiphitc = $_GET['bangchiphitc'];
if($quy=="V"){
    $ngayhoadon = "Năm ".$_SESSION['NienDo'];
}else{
    $ngayhoadon = "Quý ".$quy." Năm ".$_SESSION['NienDo'];
}
if($quy=="I"){
    $tungay = $_SESSION['NienDo']."-01-01";
    $denngay = $_SESSION['NienDo']."-03-31";
}
if($quy=="II"){
    $tungay = $_SESSION['NienDo']."-04-01";
    $denngay = $_SESSION['NienDo']."-06-30";
}
if($quy=="III"){
    $tungay = $_SESSION['NienDo']."-07-01";
    $denngay = $_SESSION['NienDo']."-09-30";
}
if($quy=="IV"){
    $tungay = $_SESSION['NienDo']."-10-01";
    $denngay = $_SESSION['NienDo']."-12-31";
}
if($quy=="V"){
    $tungay = $_SESSION['NienDo']."-01-01";
    $denngay = $_SESSION['NienDo']."-12-31";
}
$time = strtotime($denngay);
$thang =date("m",$time);
$nam =date("Y",$time);
$timetungay = strtotime($tungay);
$timedenngay = strtotime($denngay);
$tungay_fm .= date("d-m-Y", $timetungay);
$denngay_fm .= date("d-m-Y", $timedenngay);

?>
<style>
    #dialog-insolieu_candoi_tk fieldset {
        border: 1px solid #a1daf2 !important;
        font-weight: bold !important;
    }
</style>
<script>
    $(function () {
        $dir_module_ketoantonghop = "modules/ketoantonghop/";
        $("#dialog-insolieu_candoi_tk").dialog({
            resizable: false,
            height: "auto",
            width: 650,
            modal: true
        });
        $("#dialog-insolieu_candoi_tk").keydown(function (event) {//--------------Các phím tắt
            if (event.keyCode == Keys.ESCAPE) {
                xoadialog_insolieu_thuchi();
            }
        });
        function xoadialog_insolieu_thuchi() {
            reset_dialog(".dialog-insolieu_candoi_tk");
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
            $NgayLap_InPhieuThuChi = $("#NgayLap_InPhieuThuChi").val();;
            $.confirm({
                title: 'Cập nhật thành công',
                type: 'green',
                autoClose: 'OK|1000',
                content: function(){
                    var self = this;
                    return $.ajax({
                        url: $dir_module_ketoantonghop + "laythongtin_ketqua_hoatdong_kinhdoanh.php",
                        dataType: 'json',
                        method: 'get',
                        data: {
                            tungay:"<?php echo $tungay; ?>",
                            denngay:"<?php echo $denngay ?>",
                            quy:"<?php echo $quy ?>",
                            tenphieu:$("#TenPhieu_ThuChi").val(),
                            ngaylap:$("#NgayLap_InPhieuThuChi").val(),
                            ngayhoadon:$("#NgayHoaDon_InPhieu_ThuChi").val(),
                        },
                    });
                },
                buttons: {
                    "OK": {
                        keys: ['Y'], action: function () {
                            if($("#XuatExcel").prop("checked") == true){
                                window.open($dir_module_ketoantonghop+"xuatexceltkchitiet.php");
                            }else{
                                loadiFrame('tcpdf/baocao/inbang_xacdinh_kqkd.php');
                                $("#ifr_inphieuthuchi").load(
                                    function () {
                                        window.frames['ifr_inphieuthuchi'].focus();
                                        window.frames['ifr_inphieuthuchi'].print();
                                    }
                                );
                            }
                        }
                    }
                }
            });

        });
        $("#xemtruockhiin_insolieu_thuchi").click(function () {
            var parsedJson = "";
            $TenPhieu_ThuChi = $("#TenPhieu_ThuChi").val();
            $NgayLap_InPhieuThuChi = $("#NgayLap_InPhieuThuChi").val();;
            $.confirm({
                title: 'Cập nhật thành công',
                type: 'green',
                autoClose: 'OK|1000',
                content: function(){
                    var self = this;
                    return $.ajax({
                        url: $dir_module_ketoantonghop + "laythongtin_ketqua_hoatdong_kinhdoanh.php",
                        dataType: 'json',
                        method: 'get',
                        data: {
                            tungay:"<?php echo $tungay; ?>",
                            denngay:"<?php echo $denngay ?>",
                            quy:"<?php echo $quy ?>",
                            tenphieu:$("#TenPhieu_ThuChi").val(),
                            ngaylap:$("#NgayLap_InPhieuThuChi").val(),
                            ngayhoadon:$("#NgayHoaDon_InPhieu_ThuChi").val(),
                        },
                    });
                },
                buttons: {
                    "OK": {
                        keys: ['Y'], action: function () {
                            window.open("tcpdf/baocao/inbang_xacdinh_kqkd.php","xacdinh_kqkd","menubar=0,resizable=1");
                        }
                    }
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
    });

</script>
<div id="dialog-insolieu_candoi_tk" title="In số liệu">
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
                                       value="BÁO CÁO KẾT QUẢ HOẠT ĐỘNG KINH DOANH"/>
                            </td>
                        </tr>
                        <tr>
                            <td>Ngày HĐ</td>
                            <td><input type="text" name="NgayHoaDon_InPhieu_ThuChi" style="width:100%"
                                       id="NgayHoaDon_InPhieu_ThuChi" value="<?php echo $ngayhoadon;  ?>"/></td>
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