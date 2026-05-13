<?php
session_start();
require("../config.php");
$cur_thang = date("n");
?>
<style>
    #Form-phuchoi label {
        margin-top: 7px;
        float: left;
        border: 0px solid red;
        width: 150px;
        display: block !important;
        font-weight: bold !important;
        font-size: 12px;
        font-family: Arial, Lucida Grande, Lucida Sans, sans-serif;
    }

    #Form-phuchoi input {
        float: left;
        display: block !important;
        font-weight: bold !important;
        font-size: 12px;
        font-family: Arial, Lucida Grande, Lucida Sans, sans-serif;
    }

    #Form-phuchoi input.text {
        float: left;
        margin-bottom: 4px !important;
        width: 100%;
        padding: .4em !important;
        font-size: 12px;
        font-family: Arial, Lucida Grande, Lucida Sans, sans-serif;
        font-weight: normal;
    }

    #Form-phuchoi fieldset {
        padding: 0;
        padding-top: 6px;
        border: 1px solid #09F;
        margin-top: 0px;
    }

    #Form-phuchoi .td-left input.text {
        float: left;
        margin-bottom: 4px !important;
        width: 60%;
        padding: .4em !important;
        font-size: 12px;
        font-family: Arial, Lucida Grande, Lucida Sans, sans-serif;
        font-weight: normal;
    }

    #Form-phuchoi select {
        font-size: 12px;
        font-weight: bold;
    }

    #Form-phuchoi h1 {
        font-size: 1.2em;
        margin: .6em 0;
    }

    div#users-contain {
        width: 350px;
        margin: 20px 0;
    }

    div#users-contain table {
        margin: 1em 0;
        border-collapse: collapse;
        width: 100%;
    }

    div#users-contain table td, div#users-contain table th {
        border: 1px solid #eee;
        padding: .6em 10px;
        text-align: left;
    }

    .ui-dialog .ui-state-error {
        padding: .3em;
    }

    .validateTips {
        border: 1px solid transparent;
        padding: 1px;
        margin-top: 0px !important;
        margin-bottom: 0px !important;
        color: red;
        font-weight: bold;
        text-align: center;
        font-size: 12px;
    }

    .ui-draggable, .ui-droppable {
        background-position: top;
    }

    .table-dialog_phuchoi_ListFile {
        width: 98%;
    }

    .red {
        color: red;
    }

    .table-dialog_phuchoi_ListFile .td-left {
        width: 50%;
        padding-right: 20px;
    }

    .table-dialog_phuchoi_ListFile .td-right {
        width: 50%;
    }

    .table-dialog_phuchoi_ListFile .td-right input {
        float: left;
        margin-bottom: 4px !important;
        width: 65% !important;
    }

    .table-dialog_phuchoi_ListFile .td-left input {
        float: left;
        margin-bottom: 4px !important;
        width: 60% !important;
    }

    /* auto complex ma tk cha  */
    .custom-combobox {
        position: relative;
        display: inline-block;
    }

    .table-dialog_phuchoi_File {
        width: 98%;
    }

    .red {
        color: red;
    }

    .table-dialog_phuchoi_File .td-left {
        width: 50%;
        padding-right: 20px;
    }

    .table-dialog_phuchoi_File .td-right {
        width: 50%;
    }

    .table-dialog_phuchoi_File .td-right input {
        float: left;
        margin-bottom: 4px !important;
        width: 65% !important;
    }

    .table-dialog_phuchoi_File .td-left input {
        float: left;
        margin-bottom: 4px !important;
        width: 60% !important;
    }

    /* auto complex ma tk cha  */
    .custom-combobox {
        position: relative;
        display: inline-block;
    }

    .custom-combobox-toggle {
        position: absolute;
        top: 0;
        bottom: 0;
        margin-left: -1px;
        padding: 0;
    }

    .custom-combobox-input {
        margin: 0;
        padding: 5px 10px;
    }

    .ui-menu {
        z-index: 999999999 !important;
    }
</style>
<div id="dialog-phuchoi" title="ĐÁNH LẠI THỨ TỰ PHIẾU...">
    <p class="validateTips"></p>
    <fieldset style="background-color: #afd9ee; border: 1px solid #09F">
        <legend>Chọn tháng</legend>
        <form method="post" id="Form-phuchoi" enctype="multipart/form-data">
            <table border="0" style="width: 100%;">
                <tr>
                    <td>Từ</td>
                    <td>
                        <select name="tuthang" style="height:20px;width:100px;" id="tuthang">
                            <?php
                            for ($i = 1; $i <= 12; $i++) {
                                $select = "";
                                if ($i == $cur_thang)
                                    $select = "selected";
                                ?>
                                <option <?php echo $select; ?>
                                        value="<?php echo $i; ?>"><?php echo "Tháng " . $i; ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </td>
                    <td>Đến</td>
                    <td>
                        <select name="denthang" style="height:20px;width:100px;" id="denthang">
                            <?php
                            for ($i = 1; $i <= 12; $i++) {
                                $select = "";
                                if ($i == $cur_thang)
                                    $select = "selected";
                                ?>
                                <option <?php echo $select; ?>
                                        value="<?php echo $i; ?>"><?php echo "Tháng " . $i; ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </td>
                </tr>
            </table>
    </fieldset>
    <fieldset style="background-color: #afd9ee; border: 1px solid #09F">
        <legend>chọn phiếu đầu vào</legend>
        <table border="0" width="100%">
            <tr>
                <td><input type="checkbox" name="PhieuNhap" class="PhieuNhap" value=""/> Phiếu nhập kho</td>
                <td><input type="checkbox" name="PhieuThu" class="PhieuThu" value=""/> Phiếu Chi</td>
            </tr>
            <tr>
                <td><input type="checkbox" name="PhieuGhiCo" class="PhieuGhiCo" value=""/> Phiếu ghi có</td>
                <td><input type="checkbox" name="PhieuNganHang" class="PhieuNganHang" value=""/> Phiếu ngân hàng</td>
            </tr>
        </table>
        </form>
    </fieldset>
    <fieldset style="background-color: #afd9ee; border: 1px solid #09F">
        <legend>chọn phiếu đầu ra</legend>
        <table border="0" width="100%">
            <tr>
                <td><input type="checkbox" name="PhieuXuatSX" class="PhieuXuatSX" value=""/> Phiếu xuất kho SX</td>
                <td></td>
            </tr>
            <tr>
                <td><input type="checkbox" name="PhieuXuat" class="PhieuXuat" value=""/> Phiếu xuất kho</td>
                <td><input type="checkbox" name="PhieuChi" class="PhieuChi" value=""/> Phiếu Thu</td>
            </tr>
            <tr>
                <td><input type="checkbox" name="PhieuGhiNo" class="PhieuGhiNo" value=""/> Phiếu ghi Nợ</td>
                <td><input type="checkbox" name="PhieuNganHangThu" class="PhieuNganHangThu" value=""/> Phiếu ngân hàng</td>
            </tr>
        </table>
        </form>
    </fieldset>
    <fieldset style="background-color: #afd9ee; border: 1px solid #09F">
        <legend>Tuỳ chọn</legend>
        <table border="0" width="100%">
            <tr>
                <td><select style="width: 100%" id="loaidanhdau">
                        <option value="">Đánh số theo</option>
                        <option value="1">Theo số tự nhiên</option>
                        <option value="2">Ghép theo định dạng XX-MM001</option>
                    </select></td>
                <td></td>
            </tr>
        </table>
        </form>
    </fieldset>
</div>
<script>
    $dir_module_psvattu = "modules/psmavattu/"; ////////////////Khai báo đường dẫn vào mudole-----------------------------

    $(function () {
        var dialog, form,
            emailRegex = /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/,
            FilePhucHoi = $(".phuchoi"),
            FileUpload = $("#fileUpload"),
            allFields = $([]).add(FilePhucHoi).add(FileUpload),
            tips = $(".validateTips"); // ///////////////////////////////////////////////////////////////////////////////khai bao bien

        function updateTips(t) { // Hiện thông báo khi lỗi
            tips
                .text(t)
                .addClass("ui-state-highlight");
            setTimeout(function () {
                tips.removeClass("ui-state-highlight", 1500);
            }, 500);
        }

        function checkNull(o, n) {
            if (o.val() == "") {
                o.addClass("ui-state-error");
                updateTips(n + " không được trống .");
                o.focus();
                return false;
            } else {
                return true;
            }
        }

        function checkRadion(o) {
            if (o.is(":checked") == false) {
                o.addClass("ui-state-error");
                updateTips(" Chưa chọn dữ liệu phục hồi .");
                o.focus();
                return false;
            } else {
                return true;
            }
        }


        function xoadialog_phuchoi() { // đóng form 
            reset_dialog(".dialog-phuchoi");
            reset_dialog(".dialog_main_danhlaisophieu");
        }


        function ChucNang_DanhDauLai() {
            var valid = true;
            allFields.removeClass("ui-state-error"); // kiem tra du lieu
            $chonfile = $(".chonListPhucHoi:checked").val();
            $phieunhap = $(".PhieuNhap").prop("checked");
            $PhieuThu = $(".PhieuThu").prop("checked");
            $PhieuGhiCo = $(".PhieuGhiCo").prop("checked");
            $PhieuNganHang = $(".PhieuNganHang").prop("checked");

            $phieuxuat = $(".PhieuXuat").prop("checked");
            $phieuxuatsx = $(".PhieuXuatSX").prop("checked");
            $Phieuchi = $(".PhieuChi").prop("checked");
            $PhieuGhiNo = $(".PhieuGhiNo").prop("checked");
            $PhieuNganHangThu = $(".PhieuNganHangThu").prop("checked");

            $TuNgay = $("#tuthang").val();
            $DenThang = $("#denthang").val();
            $loaidanhdau = $("#loaidanhdau").val();

            $str_phieunhap = 0;
            $str_phieuthu = 0;// Phiếu chi
            $str_phieughico = 0;
            $str_phieunganhang = 0;
            if ($phieunhap) {
                $str_phieunhap = 1;
            }

            if ($PhieuThu) {
                $str_phieuthu = 1;
            }

            if ($PhieuGhiCo) {
                $str_phieughico = 1;
            }

            if ($PhieuNganHang) {
                $str_phieunganhang = 1;
            }

            $str_phieuxuat = 0;
            $str_phieuxuatsx = 0;
            $str_phieuchi = 0;// Phiếu thu
            $str_phieughino = 0;
            $str_phieunganhangthu = 0;
            if ($phieuxuat) {
                $str_phieuxuat = 1;
            }
            if ($phieuxuatsx) {
                $str_phieuxuatsx = 1;
            }

            if ($Phieuchi) {
                $str_phieuchi = 1;
            }

            if ($PhieuGhiNo) {
                $str_phieughino = 1;
            }

            if ($PhieuNganHangThu) {
                $str_phieunganhangthu = 1;
            }
            valid = valid && checkNull($("#loaidanhdau"), " Loại đánh dấu ");

            if (valid) {
                $.confirm({// Cảnh báo khi phục hồi dữ liệu
                    title: 'Chú ý',
                    content: 'Thứ tự các phiếu sẽ bị thay đổi toàn bộ . Bạn có đồng ý không ?<br/>Nhấn phím <strong style="color:blue;">[Y]</strong> để đồng ý phím <strong style="color:red;">[N]</strong> để hủy bỏ ',
                    icon: 'fa fa-warning',
                    type: 'red',
                    buttons: {
                        "Đồng ý": {
                            keys: ['Y'], action: function () {
                                $.confirm({
                                    title: 'Thông báo',
                                    type: 'green',
                                    method: 'POST',
                                    contentType: 'multipart/form-data',
                                    content: 'url:' + $dir_module_psvattu + 'danhdaulai_phieu.php?phieunganhang=' + $str_phieunganhang + '&phieunhap=' + $str_phieunhap + '&phieuthu=' + $str_phieuthu + '&phieughico=' + $str_phieughico +'&phieunganhangthu=' + $str_phieunganhangthu + '&phieuxuat=' + $str_phieuxuat + '&phieuxuatsx=' + $str_phieuxuatsx + '&phieuchi=' + $str_phieuchi + '&phieughino=' + $str_phieughino +'&tuthang=' + $TuNgay + '&denthang=' + $DenThang+ '&loaidanhdau=' + $loaidanhdau,
                                    contentLoaded: function () {
                                    },
                                    buttons: {
                                        "Thoát": {
                                            keys: ['Y'], btnClass: 'btn-green', action: function () {
                                                //$("#Form-saoluu")[0].reset();
                                            }
                                        }
                                    }
                                });
                            }
                        },
                        "Hủy bỏ": {
                            keys: ['N'], action: function () {

                            }
                        }
                    }
                });
            }
            return valid;
        }

        dialog = $("#dialog-phuchoi").dialog({
            autoOpen: false,
            height: "auto",
            width: 400,
            modal: true,
            buttons: {
                "Đồng ý": ChucNang_DanhDauLai,
                "Kết thúc": function () {
                    xoadialog_phuchoi();
                }
            }
        });
        form = dialog.find("#Form-phuchoi").on("submit", function (event) {
            event.preventDefault();
            ChucNang_DanhDauLai();
        });
        dialog.dialog("open");

    });
</script>