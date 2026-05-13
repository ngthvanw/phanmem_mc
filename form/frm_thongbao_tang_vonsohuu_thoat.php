<?php
$ChuoiTruyVan = $_SERVER['QUERY_STRING'];
$sottphieukhac = $_GET['sottphieukhac'];
$form = $_GET['form'];
?>
<style>
    #dialog-thongbao_thietlap_taisan fieldset {
        border: 1px solid #a1daf2 !important;
        font-weight: bold !important;
    }
</style>
<script>
    $(function () {
        $("#dialog-thongbao_thietlap_taisan").dialog({
            resizable: false,
            height: "auto",
            width: 450,
            modal: true
        });
        $("#dialog-thongbao_thietlap_taisan").keydown(function (event) {//--------------Các phím tắt
            if (event.keyCode == Keys.ESCAPE) {
                xoadialog_thongbao_nhapkho();
                xoadialog_phieunhapkho();
            }
        });
        function xoadialog_thongbao_nhapkho() {
            reset_dialog(".dialog-thongbao_thietlap_taisan");
            reset_dialog(".dialog_main_thongbao");
        }

        function xoadialog_phieunhapkho() {// đóng form
            reset_dialog(".dialog-tangtaisan");
            reset_dialog(".dialog_main_tangtaisan");
        }

        function xoaform_phieuthuchi($mangsang) {//------------------------------------------------------------------------------------
            if($mangsang==1) {
                $("#STT").val("");
                $("#STT").focus();

            }else{
                $("#STT").val("");
                $("#makh").val("");
                $("#tenkh").val("");
                $("#makho").val("0001");
                $("#tenkho").val("Toàn bộ");
                $("#congsuat").val("");
                $("#nuocsanxuat").val("");
                $("#donvitinh").val("");
                $("#soluong").val("");

                $("#ngaysudung").val("");
                $("#vondieule").val("");
                $("#vondagop").val("");
                $("#tylekhachhang").val("");
                $("#thoigiansudung").val("");

                $("#khauhaothang").val("");
                $("#khauhaoquy").val("");
                $("#khauhaonam").val("");
                $("#tkno").val("");

                $("#tkco").val("");
                $("#ghichu").val("");
                $("#STT").focus();
                
            }

            readonlyInput();

        }//-------------------------------------------------------------------------------------------------------

        $("#dialog-thongbao_thietlap_taisan").keydown(function (event) {
            if (event.keyCode == Keys.ESCAPE) {
                reset_dialog(".dialog-thongbao_thietlap_taisan");
                reset_dialog(".dialog_main");
            }
        });
        $("#tieptuc").click(function () {
            $mangsang=0;
            if ($("#mangsang").is(":checked")) {
                $mangsang=1;
            }
            xoaform_phieuthuchi($mangsang);
            xoadialog_thongbao_nhapkho();
        });
        $("#ketthuc").click(function () {
            xoadialog_thongbao_nhapkho();
            xoadialog_phieunhapkho();
            $sottphieukhac = '<?php echo $sottphieukhac; ?>';
            if($sottphieukhac!=""){
                $('.dialog_main_pskt').load('form/<?php echo $form; ?>.php');
            }
        });
        $("#InPhieuNhapKho").click(function () {
            $('.dialog_main_thongtin_nhapxuatkho').load('form/frm_thongtin_nhapxuatkho.php?<?php echo $ChuoiTruyVan; ?>');

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
<div id="dialog-thongbao_thietlap_taisan" title="Tiếp tục hoặc kết thúc">
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