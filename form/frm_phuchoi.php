<?php
session_start();
require("../config.php");
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
        border: 1px solid #7cc3f9;
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
        padding: 0.3em;
        margin-top: 0px !important;
        margin-bottom: 0px !important;
        color: red;
        font-weight: bold;
        text-align: center;
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
<div id="dialog-phuchoi" title="Phục hồi dữ liệu doanh nghiệp... ">
    <p class="validateTips"></p>
    <form method="post" id="Form-saoluu" enctype="multipart/form-data">
        &nbsp;&nbsp;<input type="radio" name="chonListPhucHoi" class="chonListPhucHoi" checked="true" value="chonList"/>
        Chọn danh sách&nbsp;&nbsp;&nbsp;
        <input type="radio" name="chonListPhucHoi" class="chonListPhucHoi" value="chonFile"/> Chọn tập tin
        <table class="table-dialog_phuchoi_ListFile" border=1 style=" width:100%;border: 1px solid #51b4dc;">
            <tr style="text-align: center;font-weight: bold;">
                <td width="10%">STT</td>
                <td width="10%" >Tập tin</td>
                <td width="40%">Nội dung</td>
                <td width="30%">Ngày sao lưu</td>
                <td width="10%">Phục hồi</td>
            </tr>
            <?php
            $OBJBK = new backup;
            $ListFile = $driver."/backup/".$_SESSION['MST']."_".$_SESSION['NienDo']."/";
            $ListBackup = scandir($ListFile);
            $i = 0;
            foreach ($ListBackup as $ItemBackup) {
            if($ItemBackup!="." && $ItemBackup!="..") {
                $i++;
                ?>
                <tr style="text-align: center;">
                    <td><?php echo $i; ?></td>
                    <td><a onclick="window.location.href='<?php echo $URI."/backup/".$_SESSION['MST']."_".$_SESSION['NienDo']."/".$ItemBackup; ?>'" href="#" >Tải</a></td>
                    <td align="left"><?php echo $ItemBackup; ?></td>
                    <td><?php echo date("d/m/Y h:m:s", (filemtime($ListFile.$ItemBackup))); ?></td>
                    <td><input type="radio" name="phuchoi" class="phuchoi"
                               value="<?php echo $ItemBackup; ?>"/></td>
                </tr>
                <?php
            }
            }
            ?>
        </table>

        <table class="table-dialog_phuchoi_File" border=1 style="border: 1px solid #51b4dc;display:none;">
            <tr style="text-align: center;font-weight: bold;">
                <td>Chọn tập tin</td>
                <td><input style="text-align: left;" type="file" name="fileUpload" id="fileUpload"/></td>
            </tr>
        </table>
        <!-- Allow form submission with keyboard without duplicating the dialog button -->
        <input type="submit" accesskey="enter" tabindex="-1" style="position:absolute; top:-1000px"/>
    </form>
</div>
<script>
    $dir_module_saoluu = "modules/saoluu/"; ////////////////Khai báo đường dẫn vào mudole-----------------------------
    function taifilebackup($file) {
        window.open($file);
    }
    $(".chonListPhucHoi").click(function () {
        if ($(this).is(":checked")) {
            $LoaiFile = $(this).val();
            if ($LoaiFile == "chonList") {
                $(".table-dialog_phuchoi_ListFile").show();
                $(".table-dialog_phuchoi_File").hide();
            } else {
                $(".table-dialog_phuchoi_File").show();
                $(".table-dialog_phuchoi_ListFile").hide();
            }

        }
    });
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
            reset_dialog(".dialog_main_phuchoi");
        }


        function ChucNang_saoluu() {
            var valid = true;
            allFields.removeClass("ui-state-error"); // kiem tra du lieu
            $chonfile = $(".chonListPhucHoi:checked").val();
            if ($chonfile == "chonList") {
                valid = valid && checkRadion(FilePhucHoi);
                $act = "phuchoi";
                FilePhucHoi_Value = $(".phuchoi:checked").val();
            } else {
                valid = valid && checkNull(FileUpload, "Tập tin ");
                $act = "uploadphuchoi";
                var form_Data = new FormData();
                $fileData = ($("#fileUpload").prop("files")[0]);
                form_Data.append("file", $fileData);
                FilePhucHoi_Value = $fileData;
            }
            if (valid) {
                $.confirm({// Cảnh báo khi phục hồi dữ liệu
                    title: 'Chú ý',
                    content: 'Dữ liệu hiện tại sẽ bị mất hoàn toàn .Bạn có muốn tiếp tục phục hồi ?<br/>Nhấn phím <strong style="color:blue;">[Y]</strong> để đồng ý phím <strong style="color:red;">[N]</strong> để hủy bỏ ',
                    icon: 'fa fa-warning',
                    type: 'red',
                    buttons: {
                        "Đồng ý": {
                            keys: ['Y'], action: function () {
                                var FileJonson = "";
                                $.ajax({// Lấy nội dung của file cần phục hồi
                                    url: $dir_module_saoluu + "ajaxupload_saoluu_phuchoi.php",
                                    type: "POST",
                                    data: form_Data,
                                    enctype: 'multipart/form-data',
                                    processData: false,  // tell jQuery not to process the data
                                    contentType: false ,  // tell jQuery not to set contentType
                                    cache: false,
                                    success: function (data) {
                                        //alert(data);
                                    }
                                });
                                $.confirm({
                                    title: 'Thông báo',
                                    type: 'green',
                                    method: 'POST',
                                    contentType: 'multipart/form-data',
                                    //data:{FilePhucHoi_Value},
                                    content: 'url:' + $dir_module_saoluu + $act + '.php?filename=' + FilePhucHoi_Value,
                                    contentLoaded: function () {
                                    },
                                    buttons: {
                                        "Thoát": {
                                            keys: ['Y'], btnClass: 'btn-green', action: function () {
                                                $("#Form-saoluu")[0].reset();
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
            width: 700,
            modal: true,
            buttons: {
                "Phục hồi": ChucNang_saoluu,
                "Kết thúc": function () {
                    xoadialog_phuchoi();
                }
            }
        });
        form = dialog.find("#Form-phuchoi").on("submit", function (event) {
            event.preventDefault();
            ChucNang_saoluu();
        });
        dialog.dialog("open");

    });
</script>