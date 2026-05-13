<style>
    #dialog-thongbao_thuchi fieldset {
        border: 1px solid #a1daf2 !important;
        font-weight: bold !important;
    }
</style>
<script>
    $dir_module_ps_kt_khac = "modules/psktkhac/";//----------------Lưới
    $(function () {
        $("#dialog-thongbao_thuchi").dialog({
            resizable: false,
            height: "auto",
            width: 450,
            modal: true
        });
        $("#dialog-thongbao_thuchi").keydown(function (event) {//--------------Các phím tắt
            if (event.keyCode == Keys.ESCAPE) {
                xoadialog_thongbao_thuchi();
                xoadialog_phieukhac();
            }
        });
        function xoadialog_thongbao_thuchi() {
            reset_dialog(".dialog-thongbao_thuchi");
            reset_dialog(".dialog_main_thongbao");
        }

        function xoadialog_phieukhac() {// đóng form
            reset_dialog(".dialog-phieukhac");
            reset_dialog(".dialog_main_pskt");
        }

        function xoaform_phieuthuchi($mangsang) {//------------------------------------------------------------------------------------
            if($mangsang==1) {
                $("#sotien1").val("");
                $("#sotien2").val("");
                $("#STT").val("");
                $("#ngayhoadon").val("");
                $("#sophieu").val("");
                $("#tongtien").val("");
                $("#tongcong").val("");
                $("#tongtien_cu").val("");
                $("#tongcong_cu").val("");

                $("#sotiennt1").val("");
                $("#sotiennt2").val("");
                $("#tongtiennt").val("");
                $("#tongcongnt").val("");
            }else{
                $("#STT").val("");
                $("#sophieu").val("");
                $("#tongcong").val("");
                $("#tongtien_cu").val("");
                $("#tongcong_cu").val("");

                $("#tkco").attr("disabled", false);
                $("#btnstt").attr("disabled", false);
                $("#STT").attr("disabled", false);
                $("#STT").focus();


                $("#ngayghiso").val("<?php echo date("Y-m-d"); ?>");
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
                $("#masothue2").val("");
                $("#diachi2").val("");
				
				 $("#makhachhang3").val("");
                $("#tenkhachhang3").val("");


                $("#mabophan").val("0001");
                $("#bophan").val("Toàn bộ");
                $("#hanthanhtoan").val("");
                $("#cothuegtgt").attr("checked", true);


                $("#manoidung1").val("");
                $("#manoidung2").val("");
                $("#manoidung1copy").val("");

                $("#noidung1").val("");
                $("#noidung2").val("");

                $("#chonloaisp").val("");



                $("#tkno1").val("");
                $("#tkno2").val("");
                $("#tkco1").val("");
                $("#tkco2").val("");
                $("#sotien1").val("");
                $("#sotien2").val("");
                $("#tongtien").val("");
                $("#ghichu").val("");

                $("#sotiennt1").val("");
                $("#sotiennt2").val("");
                $("#tongtiennt").val("");
                $("#tongcongnt").val("");

            }
            $("#manoidung1copy").val("");

            readonlyInput();

        }//-------------------------------------------------------------------------------------------------------

        $("#dialog-thongbao_thuchi").keydown(function (event) {
            if (event.keyCode == Keys.ESCAPE) {
                reset_dialog(".dialog-thongbao_thuchi");
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
            xoadialog_thongbao_thuchi();
        });
        $("#ketthuc").click(function () {
            xoadialog_thongbao_thuchi();
            xoadialog_phieukhac();
        });
    });
</script>
<div id="dialog-thongbao_thuchi" title="DUYỆT THƯ QUẢN LÝ">
    <p>
    <table style="width: 100%;">
        <tr>
            <td style="width: 50%;">
                <fieldset>
                    <legend>Mẫu in</legend>
                    <button id="inphieuthuchi"
                            class="ui-button ui-widget ui-corner-all" style="width: 100%;margin-bottom: 2px;"><span
                                style="font-size: 14px;">In phiếu định khoản...</span></button>
                    <button id="inphieuthuchi_hoadondientu"
                            class="ui-button ui-widget ui-corner-all" style="width: 100%;margin-bottom: 2px;"><span
                                style="font-size: 14px;">In hóa đơn ĐT...</span></button>
                    <button disabled="true"
                            class="ui-button ui-widget ui-corner-all" style="width: 100%;margin-bottom: 2px;display: none"><span
                                style="font-size: 16px;">In nhập kho...</span></button>

                </fieldset>
            </td>
            <td style="width: 50%;;padding-top: 10px;" valign="top">
                <fieldset style="padding-top:15px;">
                    <button id="tieptuc" class="ui-button ui-widget ui-corner-all"
                            style="width: 100%;margin-bottom: 2px;"><span
                                style="font-size: 14px;">Tiếp tục</span></button>
                    <button id="ketthuc" class="ui-button ui-widget ui-corner-all" style="width: 100%;"><span
                                style="font-size: 14px;">Kết thúc</span></button>
                </fieldset>
            </td>
        </tr>
    </table>
    </p>
</div>