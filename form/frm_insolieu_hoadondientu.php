<?php
session_start();
$NgayHD = $_GET['ngayhd'];
$ngaylaphoadon_string = str_replace("-", "", $NgayHD) . "000000";
$LoaipPhieu = $_GET['loaiphieu'];
$SoPhieu = $_GET['sophieu'];
$MaPhieu = $_GET['maphieu'];
if($MaPhieu==""){
    $MaPhieu= $SoPhieu;
}
$MaPSKT = $_GET['mapskt'];
$invoiceNo = $_GET['invoiceNo'];
$KyHieu = substr($invoiceNo,0,6);
$SoHoaDon = (int)substr($invoiceNo,6);
$mauso = $_GET['mauso'];
$MaBiMat = $_GET['mabimat'];
$loaihddt = $_GET['loaihddt'];
$tenphieu = "";
if ($LoaipPhieu == 1)
    $tenphieu = 'PHIẾU THU';
else if ($LoaipPhieu == 2)
    $tenphieu = 'PHIẾU CHI';
else
    $tenphieu = 'PHIẾU HẠCH TOÁN';
?>
<style>
    #dialog-insolieu_thuchi fieldset {
        border: 1px solid #a1daf2 !important;
        font-weight: bold !important;
    }
</style>
<script>
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
            var $res = "";
            $ngayhoadon = $("#ngayhoadon").val().split("-").join("");
            if(<?php echo $loaihddt; ?>==9){
                var $data = {
                    "supplierTaxCode": "<?php echo $_SESSION['MST']; ?>",
                    "invoiceNo": "<?php echo $invoiceNo; ?>",
                    "pattern": "<?php echo $mauso; ?>",
                    "templateCode": "<?php echo $mauso; ?>",
                    "strIssueDate": $ngayhoadon+'000000'
                };
            }else{
                var $data = {
                    "supplierTaxCode": "<?php echo $_SESSION['MST']; ?>",
                    "invoiceNo": "<?php echo $invoiceNo; ?>",
                    "pattern": "<?php echo $mauso; ?>",
                    "templateCode": "<?php echo $mauso; ?>",
                    "fileType": "PDF"
                };
            }
            if('<?php echo $_SESSION['nhacungcaphddt']; ?>'=='viettel'){
                $.ajax({// Load danh sách mã khách hàng
                    url: "taohoadondientu.php",
                    async: false,
                    data: {data: $data, loaihoadon:<?php echo $loaihddt; ?>},
                    success: function (response) {
                        $res = $.parseJSON(response.trim());
                    }
                });
            }else if('<?php echo $_SESSION['nhacungcaphddt']; ?>'=='bkav'){
                                    $ngayhoadon = $("#ngayhoadon").val().split("-").join("");
                    if(<?php echo $loaihddt; ?>==7){
                        var $data = {
                            "CmdType": 808,
                            "CommandObject":'<?php echo $MaPhieu ?>'
                        };
                    }else{// In hoá đơn chuyển đổi
                        var $data = {
                            "CmdType": 804,
							"CommandObject": [{
									"PartnerInvoiceID": "<?php echo $MaPhieu ?>",			
									"PartnerInvoiceStringID": "<?php echo $MaPhieu ?>"
									}]

                        };
                    }
                    $.ajax({// Load danh sách mã khách hàng
                        url: "taohoadondientu_bkav.php",
                        async: false,
                        data: {data: $data, loaihoadon:<?php echo $loaihddt; ?>},
                        success: function (response) {
                            $res = $.parseJSON(response.trim());
                        }
                    });
            }
            if ($res.errorCode!="" ) {
                $alert = alert($res.description + " .");
                return false;
            } else {
                loadiFrame('TCPDF/baocao/inbang_hoadon_dientu.php');
                $("#ifr_inphieuthuchi").load(
                    function () {
                        window.frames['ifr_inphieuthuchi'].focus();
                        window.frames['ifr_inphieuthuchi'].print();
                    }
                );
            }
        });
        $("#xemtruockhiin_insolieu_thuchi").click(function () {
            {
                var $res = "";
                if('<?php echo $_SESSION['nhacungcaphddt']; ?>'=='viettel'){
                    $ngayhoadon = $("#ngayhoadon").val().split("-").join("");
                    if(<?php echo $loaihddt; ?>==9){
                        var $data = {
                            "supplierTaxCode": "<?php echo $_SESSION['MST']; ?>",
                            "invoiceNo": "<?php echo $invoiceNo; ?>",
                            "pattern": "<?php echo $mauso; ?>",
                            "templateCode": "<?php echo $mauso; ?>",
                            "strIssueDate": $ngayhoadon+'000000'
                        };
                    }else{
                        var $data = {
                            "supplierTaxCode": "<?php echo $_SESSION['MST']; ?>",
                            "invoiceNo": "<?php echo $invoiceNo; ?>",
                            "pattern": "<?php echo $mauso; ?>",
                            "templateCode": "<?php echo $mauso; ?>",
                            "fileType": "PDF"
                        };
                    }
                    $.ajax({// Load danh sách mã khách hàng
                        url: "taohoadondientu.php",
                        async: false,
                        data: {data: $data, loaihoadon:<?php echo $loaihddt; ?>},
                        success: function (response) {
                            $res = $.parseJSON(response.trim());
                        }
                    });
                }else if('<?php echo $_SESSION['nhacungcaphddt']; ?>'=='bkav'){
                    $ngayhoadon = $("#ngayhoadon").val().split("-").join("");
                    if(<?php echo $loaihddt; ?>==7){
                        var $data = {
                            "CmdType": 808,
                            "CommandObject":'<?php echo $MaPhieu ?>'
                        };
                    }else{
                        var $data = {
                            "CmdType": 804,
							"CommandObject": [{
									"PartnerInvoiceID": "<?php echo $MaPhieu ?>",			
									"PartnerInvoiceStringID": ""
									}]

                        };
                    }
                    $.ajax({// Load danh sách mã khách hàng
                        url: "taohoadondientu_bkav.php",
                        async: false,
                        data: {data: $data, loaihoadon:<?php echo $loaihddt; ?>},
                        success: function (response) {
                            $res = $.parseJSON(response.trim());
                        }
                    });
                }
                if ($res.errorCode != "") {
                    $alert = alert($res.description + " .");
                    return false;
                } else {
                    $('.dialog_main_print').load("form/print_phieuthu_chi_hoadondientu.php?mabimat=<?php echo $MaBiMat; ?>&invoiceNo=<?php echo $invoiceNo; ?>");
                }
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
                                       value="HÓA ĐƠN GIÁ TRỊ GIA TĂNG"/>
                            </td>
                        </tr>
                        <tr>
                            <td>Ngày HĐ</td>
                            <td><input disabled="disabled" type="date" name="NgayHoaDon_InPhieu_ThuChi"
                                       style="width:100%"
                                       id="NgayHoaDon_InPhieu_ThuChi" value="<?php echo $NgayHD; ?>"/></td>
                        </tr>
                        <tr>
                            <td>Ngày Lập</td>
                            <td><input type="date" disabled="disabled" name="NgayLap_InPhieuThuChi" style="width:100%"
                                       value="<?php echo date("Y-m-d"); ?>" id="NgayLap_InPhieuThuChi"/></td>
                        </tr>
                        <tr style="display: none;">
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