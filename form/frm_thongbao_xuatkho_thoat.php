<?php
session_start();
$ChuoiTruyVan = $_SERVER['QUERY_STRING'];
?>
<style>
    #dialog-thongbao_xuatkho fieldset {
        border: 1px solid #a1daf2 !important;
        font-weight: bold !important;
    }
</style>
<script>
    $(function () {
        $("#dialog-thongbao_xuatkho").dialog({
            resizable: false,
            height: "auto",
            width: 450,
            modal: true
        });
        $("#dialog-thongbao_xuatkho").keydown(function (event) {//--------------Các phím tắt
            if (event.keyCode == Keys.ESCAPE) {
                xoadialog_thongbao_xuatkho();
                xoadialog_phieuxuatkho();
            }
        });
        function xoadialog_thongbao_xuatkho() {
            reset_dialog(".dialog-thongbao_xuatkho");
            reset_dialog(".dialog_main_thongbao");
        }

        function xoadialog_phieuxuatkho() {// đóng form
            reset_dialog(".dialog-xuatkho");
            reset_dialog(".dialog_main_xuatkho");
        }

        function xoaform_phieuthuchi($mangsang) {//------------------------------------------------------------------------------------
            if($mangsang==1) {
                $("#sotien1").val("");
                $("#sotien2").val("");

                $("#sotien3").val("");
                $("#sotien4").val("");
				
                $("#STT").val("");
                $("#sophieu").val("");
                $("#tongtien").val("");
                $("#tienchietkhau").val("");
                $("#tongcong").val("");
                $("#tongtien_cu").val("");
                $("#tongcong_cu").val("");
				$("#sohoadon").val("");
				$("#dangthem").val("");
            }else{
                $("#sotien1").val("");
                $("#sotien2").val("");
                $("#STT").val("");
                $("#sophieu").val("");
                $("#tongtien").val("");
                $("#tongcong").val("");
                $("#tongtien_cu").val("");
                $("#tongcong_cu").val("");

                $("#tkco").attr("disabled", false);
                $("#btnstt").attr("disabled", false);
                $("#STT").attr("disabled", false);
                $("#STT").focus();
				$("#dangthem").val("");


                $("#ngayghiso").val("<?php echo date("Y-m-d") ?>");
                $("#loaict").val("");
                $("#mauso").val("<?php echo $_SESSION['txt_mauhoadon']; ?>");
                $("#kyhieu").val("");
                $("#sohoadon").val("");
                $("#ngayhoadon").val("");

                $("#makhachhang").val("");
                $("#tenkhachhang").val("");
                $("#diachi").val("");
                $("#masothue").val("");

                $("#makhachhang2").val("");
                $("#tenkhachhang2").val("");
                $("#diachi2").val("");


                $("#mabophan").val("0001");
                $("#bophan").val("Toàn bộ");
                $("#hanthanhtoan").val("");
                $("#cothuegtgt").val("");


                $("#manoidung").val("100014");
                $("#noidung").val("Xuất bán hàng thu tiền mặt");

                $("#chonloaisp").val("");
                $("#makho").val("0001");
                $("#tenkho").val("Toàn bộ");






                $("#tkno1").val("");
                $("#tkno2").val("");
                $("#tkco1").val("");
                $("#tkco2").val("");

                $("#tkno3").val("");
                $("#tkno4").val("");
                $("#tkco3").val("");
                $("#tkco4").val("");

                $("#sotien1").val("");
                $("#sotien2").val("");

                $("#sotien3").val("");
                $("#sotien4").val("");

                $("#tongtien").val("");

                $("#sotiennt1").val("");
                $("#sotiennt2").val("");

                $("#sotiennt3").val("");
                $("#sotiennt4").val("");
                $("#tongtiennt").val("");

                $("#tongtien").val("");

                $("#tongso").val("");
                $("#tienhang").val("");
                $("#tienchietkhau").val("");
                $("#thue").val("");

                $("#ghichu").val("");
            }

            readonlyInput();

        }//-------------------------------------------------------------------------------------------------------

        $("#dialog-thongbao_xuatkho").keydown(function (event) {
            if (event.keyCode == Keys.ESCAPE) {
                reset_dialog(".dialog-thongbao_xuatkho");
                reset_dialog(".dialog_main");
            }
        });
        $("#tieptuc").click(function () {
            $mangsang=0;
            if ($("#mangsang").is(":checked")) {
                $mangsang=1;
            }
            $(".validateTips").text("");
            xoaform_phieuthuchi($mangsang);
            xoadialog_thongbao_xuatkho();
        });
        $("#ketthuc").click(function () {
            xoadialog_thongbao_xuatkho();
            xoadialog_phieuxuatkho();
        });
        $("#InPhieuNhapKho").click(function () {
            $('.dialog_main_thongtin_nhapxuatkho').load('form/frm_insolieu_xuatkho.php?<?php echo $ChuoiTruyVan; ?>');

        });
        function readonlyInput() {
            $("#phieuthu").attr("disabled", false);
            $("#phieuchi").attr("disabled", false);
            $("#btntkco").attr("disabled", false);
            $("#tkco").attr("disabled", false);
            $("#btnstt").attr("disabled", false);
            $("#STT").attr("disabled", false);
            $("#STT").focus();


            $("#ngayghiso").attr("disabled", true);
            $("#loaict").attr("disabled", true);
            $("#mauso").attr("disabled", true);
            $("#kyhieu").attr("disabled", true);
            $("#sohoadon").attr("disabled", true);
            $("#ngayhoadon").attr("disabled", true);

            $("#NhapSoLuongDongGia").attr("disabled", true);


            $("#btnmakh").attr("disabled", true);
            $("#makhachhang").attr("disabled", true);
            $("#tenkhachhang").attr("disabled", true);
            $("#diachi").attr("disabled", true);
            $("#masothue").attr("disabled", true);

            $("#btnmakh2").attr("disabled", true);
            $("#makhachhang2").attr("disabled", true);
            $("#tenkhachhang2").attr("disabled", true);
            $("#diachi2").attr("disabled", true);


            $("#btnbophan").attr("disabled", true);
            $("#mabophan").attr("disabled", true);
            $("#bophan").attr("disabled", true);
            $("#hanthanhtoan").attr("disabled", true);
            $("#cothuegtgt").attr("disabled", true);

            $("#btnnoidung1").attr("disabled", true);
            $("#btnnoidung2").attr("disabled", true);

            $("#manoidung1").attr("disabled", true);
            $("#manoidung2").attr("disabled", true);

            $("#noidung1").attr("disabled", true);
            $("#noidung2").attr("disabled", true);

            $("#btntkno1").attr("disabled", true);
            $("#btntkno2").attr("disabled", true);


            $("#tkno1").attr("disabled", true);
            $("#tkno2").attr("disabled", true);
            $("#tkco1").attr("disabled", true);
            $("#tkco2").attr("disabled", true);
            $("#sotien1").attr("disabled", true);
            $("#sotien2").attr("disabled", true);
            $("#tongtien").attr("disabled", true);
            $("#ghichu").attr("disabled", true);
        }
    });
</script>
<div id="dialog-thongbao_xuatkho" title="Tiếp tục hoặc kết thúc">
    <p>
    <table style="width: 100%;">
        <tr>
            <td style="width: 50%;">
                <fieldset>
                    <legend>Mẫu in</legend>
                    <button disabled="true"
                            class="ui-button ui-widget ui-corner-all" style="width: 100%;margin-bottom: 2px;"><span
                                style="font-size: 16px;">In hóa đơn...</span></button>
                    <button id="InPhieuNhapKho" disabled="true"
                            class="ui-button ui-widget ui-corner-all" style="width: 100%;margin-bottom: 2px;"><span
                                style="font-size: 16px;">In phiếu nhập kho...</span></button>

                </fieldset>
            </td>
            <td style="width: 50%;padding-top: 10px;" valign="top">
                <fieldset style="padding-top: 15px;">
                    <button id="tieptuc" class="ui-button ui-widget ui-corner-all"
                            style="width: 100%;margin-bottom: 2px;"><span
                                style="font-size: 16px;">Tiếp tục</span></button>
                    <button id="ketthuc" class="ui-button ui-widget ui-corner-all" style="width: 100%;"><span
                                style="font-size: 16px;">Kết thúc</span></button>
                </fieldset>
            </td>
        </tr>
    </table>
    </p>
</div>