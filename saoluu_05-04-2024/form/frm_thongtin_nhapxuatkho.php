<?php
$NgayHD = $_GET['ngayhd'];
$LoaiPhieu = $_GET['loaiphieu'];
$SoPhieu = $_GET['sophieu'];
$TenKho = $_GET['tenkho'];
?>
<style>
    #dialog-thongtin_nhapxuatkho fieldset {
        border: 1px solid #a1daf2 !important;
        font-weight: bold !important;
    }
</style>
<script>
    $(function () {
        $("#dialog-thongtin_nhapxuatkho").dialog({
            resizable: false,
            height: "auto",
            width: 600,
            modal: true
        });
        $("#dialog-thongtin_nhapxuatkho").keydown(function (event) {//--------------Các phím tắt
            if (event.keyCode == Keys.ESCAPE) {
                xoadialog_thongtin_nhapxuatkho();
            }
        });
// Di chuyễn
        $("#TenKho").keydown(function (event) {//--------------Các phím tắt
            if (event.keyCode == Keys.ENTER) {
                $("#HopDong").focus();
            }
        });
        $("#HopDong").keydown(function (event) {//--------------Các phím tắt
            if (event.keyCode == Keys.ENTER) {
                $("#HinhThucVanChuyen").focus();
            }
        });
        $("#HinhThucVanChuyen").keydown(function (event) {//--------------Các phím tắt
            if (event.keyCode == Keys.ENTER) {
                $("#TenNguoiLap").focus();
            }
        });
        $("#TenNguoiLap").keydown(function (event) {//--------------Các phím tắt
            if (event.keyCode == Keys.ENTER) {
                $("#KeToanTruong").focus();
            }
        });
        $("#KeToanTruong").keydown(function (event) {//--------------Các phím tắt
            if (event.keyCode == Keys.ENTER) {
                $("#GiamDoc").focus();
            }
        });

        $("#GiamDoc").keydown(function (event) {//--------------Các phím tắt
            if (event.keyCode == Keys.ENTER) {
                $("#TiepTuc").focus();
            }
        });


        // End Di chuyễn

        function xoadialog_thongtin_nhapxuatkho() {
            reset_dialog(".dialog-thongtin_nhapxuatkho");
            reset_dialog(".dialog_main_thongtin_nhapxuatkho");
        }
		$("#TiepTuc").focus();

        $("#TiepTuc").click(function () {
            $TenKho = $("#TenKho").val().trim();
            $HopDong = $("#HopDong").val().trim();
            $HinhThucVanChuyen = $("#HinhThucVanChuyen").val().trim();
            $TenNguoiLap = $("#TenNguoiLap").val().trim();
            $KeToanTruong = $("#KeToanTruong").val().trim();
            $GiamDoc = $("#GiamDoc").val().trim();
            $chuoitruyvan = 'sophieu=<?php echo $SoPhieu ?>&loaiphieu=<?php echo $LoaiPhieu; ?>&ngayhd=<?php echo $NgayHD; ?>&tenkho='+$TenKho+'&hopdong='+$HopDong+'&hinhthucvanchuyen='+$HinhThucVanChuyen+'&tennguoilap='+$TenNguoiLap+'&ketoantruong='+$KeToanTruong+'&giamdoc='+$GiamDoc;
            $('.dialog_main_insolieu_thuchi').load('form/frm_insolieu_nhapkho.php?'+encodeURI($chuoitruyvan));
            xoadialog_thongtin_nhapxuatkho();
        });

    });

</script>
<div id="dialog-thongtin_nhapxuatkho" title="Lựa chọn khi in phiếu nhập xuất kho...">
    <p>
    <table style="width: 100%;">
        <tr>
            <td style="width: 99%;" valign="top">
                <fieldset>
                    <legend>Lựa chọn                   </legend>
                    <table width="100%" border="0">
                        <tr>
                            <td style="width:30%">Tên kho</td>
                            <td>
                                <label for="TenKho"></label>
                                <input name="TenKho" type="text" class="text ui-widget-content ui-corner-all" id="TenKho" value="<?php echo $TenKho; ?>" style="width:100%"/>
                            </td>
                      </tr>
                        <tr>
                            <td>Hợp đồng</td>
                            <td><input name="HopDong" type="text" class="text ui-widget-content ui-corner-all"
                                       id="HopDong" style="width:100%"/></td>
                        </tr>
                        <tr>
                            <td>Hình thức vận chuyển</td>
                            <td><input name="HinhThucVanChuyen" type="text" class="text ui-widget-content ui-corner-all" id="HinhThucVanChuyen" style="width:100%"/></td>
                        </tr>
                        <tr>
                          <td>Tên người lập</td>
                          <td><input name="TenNguoiLap" type="text" class="text ui-widget-content ui-corner-all" id="TenNguoiLap" style="width:100%"/></td>
                        </tr>
                        <tr>
                          <td>Kế toán trưởng</td>
                          <td><input name="KeToanTruong" type="text" class="text ui-widget-content ui-corner-all" id="KeToanTruong" style="width:100%"/></td>
                        </tr>
                        <tr>
                          <td>Giám đốc</td>
                          <td><input name="GiamDoc" type="text" class="text ui-widget-content ui-corner-all" id="GiamDoc" style="width:100%"/></td>
                        </tr>
                  </table>
                </fieldset>
            </td>
           
        </tr>
        <tr>
        <td style="text-align: center">
                    <button id="TiepTuc" class="ui-button ui-widget ui-corner-all"
                            style="width:100px;margin: 2px;"><span
                                style="font-size: 16px;">Tiếp tục</span></button>

        </td>
        </tr>
    </table>
    </p>
</div>