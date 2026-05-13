<?php
session_start();
$tungay = $_GET['tungay'];
$denngay = $_GET['denngay'];
$intheothuesuat = $_GET['intheothuesuat'];
$intheochungtu = $_GET['intheochungtu'];
$sapxeptheohoadon = $_GET['sapxeptheohoadon'];
$theothongtu = $_GET['theothongtu'];
$kieuin = $_GET['kieuin'];
$loaisanpham = $_GET['loaisanpham'];
$nhomcttheo = $_GET['nhomcttheo'];
$theocongdoan = $_GET['theocongdoan'];
$title = "";
if ($loaisanpham == "CT") {
    $title = "BẢNG TỔNG HỢP DOANH THU - CHI PHÍ - GIÁ THÀNH CÔNG TRÌNH";
} else if ($loaisanpham == "SP") {
    $title = "BẢNG TỔNG HỢP CHI PHÍ - GIÁ THÀNH SẢN PHẨM";
} else if ($loaisanpham == "HD") {
    $title = "BẢNG TỔNG HỢP CHI PHÍ - GIÁ THÀNH HỢP ĐỒNG";
}

$time = strtotime($denngay);
$thang = date("m", $time);
$nam = date("Y", $time);
$timetungay = strtotime($tungay);
$timedenngay = strtotime($denngay);
$tungay_fm .= date("d-m-Y", $timetungay);
$denngay_fm .= date("d-m-Y", $timedenngay);

$quy = "Từ ngày " . $tungay_fm . " đến ngày " . $denngay_fm;


?>
<style>
    #dialog-insolieu_candoi_tk fieldset {
        border: 1px solid #a1daf2 !important;
        font-weight: bold !important;
    }
</style>
<script>
    $(function () {
        $dir_module_dmsanpham = "modules/dmsanpham/";
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
            $NgayLap_InPhieuThuChi = $("#NgayLap_InPhieuThuChi").val();
            $.confirm({
                title: 'Cập nhật thành công',
                type: 'green',
                autoClose: 'OK|1000',
                content: function () {
                    var self = this;
                    return $.ajax({
                        url: $dir_module_dmsanpham + "laythongtin_tonghop_doanhthu_chiphi_congtrinh.php",
                        dataType: 'json',
                        method: 'get',
                        data: {
                            tungay: "<?php echo $tungay; ?>",
                            denngay: "<?php echo $denngay ?>",
                            intheothuesuat: "<?php echo $intheothuesuat ?>",
                            intheochungtu: "<?php echo $intheochungtu ?>",
                            sapxeptheohoadon: "<?php echo $sapxeptheohoadon ?>",
                            tenphieu: $("#TenPhieu_ThuChi").val(),
                            ngaylap: $("#NgayLap_InPhieuThuChi").val(),
                            ngayhoadon: $("#NgayHoaDon_InPhieu_ThuChi").val(),
                            loaisanpham: '<?php echo $loaisanpham; ?>',
                            nhomcttheo: '<?php echo $nhomcttheo; ?>'
                        },
                    });
                },
                buttons: {
                    "OK": {
                        keys: ['Y'], action: function () {
                            if ($("#XuatExcel").prop("checked") == true) {
                                window.open($dir_module_dmsanpham + "xuatexceltk_tonghop_doanhthu_chiphi_congtrinh.php");
                            } else {
                                if ("<?php echo $loaisanpham ?>" == "CT") {
                                    if ("<?php echo $nhomcttheo ?>" == "DIABAN") {
                                        loadiFrame('tcpdf/baocao/inbang_tonghop_danhthu_chiphi_giathanh_congtrinh_theodiaban.php?sole=<?php echo $sole ?>');
                                    } else {
                                        loadiFrame('tcpdf/baocao/inbang_tonghop_danhthu_chiphi_giathanh_congtrinh.php?sole=<?php echo $sole ?>');
                                    }
                                } else if ("<?php echo $loaisanpham ?>" == "SP") {
                                    loadiFrame('tcpdf/baocao/inbang_tonghop_danhthu_chiphi_giathanh_sanpham.php?theocongdoan=<?php echo $theocongdoan ?>');
                                } else if ("<?php echo $loaisanpham ?>" == "HD") {
                                    loadiFrame('tcpdf/baocao/inbang_tonghop_danhthu_chiphi_giathanh_congtrinh.php?sole=<?php echo $sole ?>');
                                }

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
            $NgayLap_InPhieuThuChi = $("#NgayLap_InPhieuThuChi").val();
            $.confirm({
                title: 'Cập nhật thành công',
                type: 'green',
                autoClose: 'OK|1000',
                content: function () {
                    var self = this;
                    return $.ajax({
                        url: $dir_module_dmsanpham + "laythongtin_tonghop_doanhthu_chiphi_congtrinh.php",
                        dataType: 'json',
                        method: 'get',
                        data: {
                            tungay: "<?php echo $tungay; ?>",
                            denngay: "<?php echo $denngay ?>",
                            intheothuesuat: "<?php echo $intheothuesuat ?>",
                            intheochungtu: "<?php echo $intheochungtu ?>",
                            sapxeptheohoadon: "<?php echo $sapxeptheohoadon ?>",
                            tenphieu: $("#TenPhieu_ThuChi").val(),
                            ngaylap: $("#NgayLap_InPhieuThuChi").val(),
                            ngayhoadon: $("#NgayHoaDon_InPhieu_ThuChi").val(),
                            loaisanpham: '<?php echo $loaisanpham; ?>',
                            nhomcttheo: '<?php echo $nhomcttheo; ?>'
                        },
                    });
                },
                buttons: {
                    "OK": {
                        keys: ['Y'], action: function () {
                            if ("<?php echo $loaisanpham ?>" == "CT") {
                                if ("<?php echo $nhomcttheo ?>" == "DIABAN") {
                                    window.open("tcpdf/baocao/inbang_tonghop_danhthu_chiphi_giathanh_congtrinh_theodiaban.php?xemchitiet=<?php echo $xemchitiet ?>", "cpct", "menubar=0,resizable=0");
                                } else {
                                    window.open("tcpdf/baocao/inbang_tonghop_danhthu_chiphi_giathanh_congtrinh.php?xemchitiet=<?php echo $xemchitiet ?>", "cpct", "menubar=0,resizable=0");
                                }
                            }else if ("<?php echo $loaisanpham ?>" == "SP") {
                                window.open("tcpdf/baocao/inbang_tonghop_danhthu_chiphi_giathanh_sanpham.php?theocongdoan=<?php echo $theocongdoan ?>", "cpso", "menubar=0,resizable=0");
                            }else if ("<?php echo $loaisanpham ?>" == "HD") {
                                window.open("tcpdf/baocao/inbang_tonghop_danhthu_chiphi_giathanh_congtrinh.php?xemchitiet=<?php echo $xemchitiet ?>", "cpct", "menubar=0,resizable=0");
                            }
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
            $("#iframeplaceholder").html("<iframe id='ifr_inphieuthuchi' name='ifr_inphieuthuchi' src='" + src + "' width='0px' height='0px' />");
        }
    });

</script>
<div id="dialog-insolieu_candoi_tk" title="In số liệu">
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
                                       value="<?php echo $title; ?>"/>
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
                                &nbsp;&nbsp;<input type="checkbox" name="XuatExcel" id="XuatExcel"/>
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