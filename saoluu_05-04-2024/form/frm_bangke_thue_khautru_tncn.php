<?php
require("../config.php");
$cur_thang = date("n");
function load_ppkhaithue($dir)
{
    $fp1 = @fopen($dir . "/" . 'phuongphapkhaithue.db', "r"); // đọc thông tin chung
    $string_info = fgets($fp1);
    fclose($fp1);
    if ($string_info == "") {
        $string_info = 1;
    }
    return ($string_info);
}

$ppkhautru = load_ppkhaithue($driver . "/datafile/" . $_SESSION['MST']."/".$_SESSION['NienDo']);

?>
<style>
    #Form-chinh label {
        margin-top: 3px;
        float: left;
        border: 0px solid red;
        width: 100%;
        display: block !important;
        font-weight: bold !important;
        font-size: 12px;
        font-family: Arial, Lucida Grande, Lucida Sans, sans-serif;
    }

    #Form-chinh input {
        float: left;
        display: block !important;
        font-weight: bold !important;
        font-size: 12px;
        font-family: Arial, Lucida Grande, Lucida Sans, sans-serif;
    }

    #Form-chinh input.text {
        float: left;
        margin-bottom: 0px !important;
        width: 100%;
        padding: 1px !important;
        font-size: 12px;
        font-family: Arial, Lucida Grande, Lucida Sans, sans-serif;
        font-weight: normal;
    }

    #Form-chinh input.button {
        height: 21px;
        font-weight: bold;
        border: 1px solid white;
        text-align: center;
    }

    #Form-chinh input.checkbox {
        margin-top: 6px;
    }

    #Form-chinh fieldset {
        padding: 1px;
        padding-top: 0px;
        border: 1px solid #09F;
        margin-top: 0px;
    }

    input[disabled='disabled'] {
        color: gray;
        background-color: gray;
    }

    #Form-chinh input:focus {
        border: 1px solid red;
        color: red;
    }

    #Form-chinh legend {
        padding: 0;
        padding-top: 0px;
        margin-top: 0px;
        font-weight: bold;
        font-size: 14px;
    }

    #Form-chinh .td-left input.text {
        float: left;
        margin-bottom: 4px !important;
        width: 60%;
        padding: .4em !important;
        font-size: 12px;
        font-family: Arial, Lucida Grande, Lucida Sans, sans-serif;
        font-weight: normal;
    }

    #Form-chinh select {
        font-size: 12px;
        font-weight: bold;
    }

    #Form-chinh h1 {
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

    #capnhatsolieu:hover {
        background-color: blue !important;
        cursor: wait;
    }


</style>
<div id="dialog-bangke_thue_gtgt" title="Tờ khai khấu trừ thuế TNCN">
    <p class="validateTips"></p>
    <form method="post" id="Form-chinh" enctype="multipart/form-data">
        <fieldset style="background-color: #afd9ee">
            <legend>Kỳ tính của năm <?php echo $_SESSION['NienDo']; ?></legend>
            <table border="0" style="width: 100%;">
                <tr style="display:block;">
                    <td><input name="rd_thangtonkho" type="radio" id="rd_thangtonkho" checked="checked"></td>
                    <td>Tháng</td>
                    <td>
                        <select name="namtinhthue" id="namtinhthue" style="height: 20px">
                            <option value="">--Chọn--</option>
                            <?php
                            $nam1 = date("Y",strtotime($_SESSION['kyketoan_tungay']));
                            $nam2 = date("Y",strtotime($_SESSION['kyketoan_denngay']));
                            for($n=$nam1;$n<=$nam2;$n++){
                                ?>
                                <option value="<?php echo $n; ?>"><?php echo "Năm " . $n; ?></option>
                                <?php
                            }
                            ?>
                        </select>
                        <select name="thangtinhthue" id="thangtinhthue" style="height:20px;">
                            <option value="">--Chọn--</option>
                        </select>
                    </td>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;Loại tờ khai&nbsp;&nbsp;</td>
                    <td><select name="loaitokhai" id="loaitokhai" style="height:20px;">
                            <option value="1">Khai lần 1</option>
                            <option value="0">Khai bổ sung</option>
                        </select></td>
                </tr>
                <tr style="display:none;">
                    <td><input name="rd_thangtonkho" type="radio" id="rd_congdonthangtonkho"></td>
                    <td>Từ ngày</td>
                    <td align="right"><input type="date" name="congdontuthang" style="width:130px;" id="congdontuthang"
                                             class="text ui-widget-content ui-corner-all"
                                             value="<?php if ($_SESSION['TuNgay'] != "") {
                                                 echo $_SESSION['TuNgay'];
                                             } else {
                                                 echo $_SESSION['NienDo'] . "-" . date("m-d");
                                             } ?>"/></td>
                    <td>Đến ngày</td>
                    <td align="right">
                        <input type="date" name="congdondenthang" id="congdondenthang" style="width:130px;"
                               class="text ui-widget-content ui-corner-all"
                               value="<?php if ($_SESSION['DenNgay'] != "") {
                                   echo $_SESSION['DenNgay'];
                               } else {
                                   echo $_SESSION['NienDo'] . "-" . date("m-d");
                               } ?>"/></td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
            </table>
        </fieldset>
        <fieldset style="background-color: #afd9ee;">
            <legend>Thiết lập số liệu</legend>
            <table width="100%">
                <tr>
                    <td>
                        <button id="thietlapcachtinhsolieu" type="button" style="width:100%;border:1px solid #990" class="ui-button ui-corner-all ui-widget">Thiết lập cách tính số liệu...</button></td>
                </tr>
            </table>
        </fieldset>
    </form>
</div>
<script>
    $height = 300;
    $width = 500;
    $dir_module_mabp = "modules/mabp/";////////////////Khai báo đường dẫn vào mudole
    $dir_module_makhachhang = "modules/makhachhang/";////////////////Khai báo đường dẫn vào mudole
    $dir_module_manoidung = "modules/manoidung/";////////////////Khai báo đường dẫn vào mudole
    $dir_module_ps_kt = "modules/pskt/";//----------------Lưới
    ///$dir_module_phieuthuchi = "modules/psmavattu/";//----------------Lưới
    $dir_module_baocaothue = "modules/baocaothue/";//----------------Lưới
    $dir_module_matk = "modules/httk/";////////////////Khai báo đường dẫn vào mudole
    $(function () {
        readonlyInput();
        var dialog, form,
            emailRegex = /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/,
            rd_thangtonkho = $("#rd_thangtonkho"),
            tuthang = $("#tuthang"),
            tinhlaituthang = $("#tinhlaituthang"),

            rd_congdonthangtonkho = $("#rd_congdonthangtonkho"),
            congdontuthang = $("#congdontuthang"),
            congdondenthang = $("#congdondenthang"),
            Intheothuesuat = $("#Intheothuesuat"),
            Intheochungtu = $("#Intheochungtu"),
            sapxeptheohoadon = $("#sapxeptheohoadon"),
            kieuin = $("#kieuin"),
            theothongtu = $("#theothongtu"),


            allFields = $([]).add(rd_thangtonkho)/////////////////////////////////////////////////////////////////////////////////////
                .add(tuthang)
                .add(tinhlaituthang)
                .add(rd_congdonthangtonkho)
                .add(congdontuthang)
                .add(congdondenthang)
                .add(Intheothuesuat)
                .add(Intheochungtu)
                .add(sapxeptheohoadon)
                .add(kieuin)
                .add(theothongtu)

        tips = $(".validateTips"); // ///////////////////////////////////////////////////////////////////////////////khai bao bien

        function updateTips(t) {// Hiện thông báo khi lỗi
            tips
                .text(t)
                .addClass("ui-state-highlight");
            setTimeout(function () {
                tips.removeClass("ui-state-highlight", 1500);
            }, 500);
        }

        $("#dialog-bangke_thue_gtgt").keydown(function (event) {//--------------Các phím tắt
            if (event.keyCode == Keys.ESCAPE) {
                xoadialog_bangketoankho();
            }
        });

        function checkLength(o, n, min, max) {// Kiểm tra chiều dài chuổi nhập vào
            if (o.val().length > max || o.val().length < min) {
                o.addClass("ui-state-error");
                updateTips("Chiều dài của " + n + " phải nằm giữa " +
                    min + " và " + max + ".");
                o.focus();
                return false;
            } else {
                return true;
            }
        }

        function checkNum(o, n) {// Kiểm tra chiều dài chuổi nhập vào
            if (o.val()) {
                o.addClass("ui-state-error");
                updateTips(n + " không phải số .");
                o.focus();
                return false;
            } else {
                return true;
            }
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

        function checkSelect(o, n) {
            if (o.val() == "-1") {
                o.addClass("ui-state-error");
                updateTips(n + " không được trống .");
                o.focus();
                return false;
            } else {
                return true;
            }
        }

        function checkRegexp(o, regexp, n) {
            if (!( regexp.test(o.val()) )) {
                o.addClass("ui-state-error");
                updateTips(n);
                return false;
            } else {
                return true;
            }
        }

        function sosanhngay(ngaybd, ngaykt) {
            if ($ngaydb > $ngaykt) {
                $("#congdondenthang").addClass("ui-state-error");
                updateTips("Ngày bắt đầu lớn hơn ngày kết thúc !");
                $("#congdondenthang").focus();
                return false;
            } else {
                return true;
            }
        }

        function checkKey(Ma, n) {// Check key khi nhấn submit
            var Checkkey = $("#CheckKeyMaBP").val();
            if (Checkkey == 1) {
                Ma.addClass("ui-state-error");
                updateTips(n + " đã tồn tại ! Vui lòng nhập lại !");
                return false;
            } else {
                return true;
            }
        }

        rd_thangtonkho.change(function () {
            readonlyCheckThang();
        });
        rd_congdonthangtonkho.change(function () {
            readonlyCheckCongDon();
        });
        $("#namtinhthue").change(function () {
            $namtinhthue = $("#namtinhthue").val();
            $.ajax({// Thêm dữ liệu vào tokhaithue
                url: $dir_module_baocaothue + "layquycuanam.php?namtinhthue="+$namtinhthue,
                async: false,
                success: function (response) {
                    $("#thangtinhthue").html(response);
                }
            });
        });

///-------------------Kết thúc--------------------------------
        function readonlyCheckThang() {
            congdontuthang.attr("disabled", true);
            congdondenthang.attr("disabled", true);

            tuthang.attr("disabled", false);
            tinhlaituthang.attr("disabled", false);
            sole.attr("disabled", false);
            Insotonkho.attr("disabled", false);
            Ingiatritonkho.attr("disabled", false);
            giatrilonhon.attr("disabled", false);
        }

        function readonlyCheckCongDon() {
            congdontuthang.attr("disabled", false);
            congdondenthang.attr("disabled", false);

            tuthang.attr("disabled", true);
            tinhlaituthang.attr("disabled", true);
            sole.attr("disabled", true);
            Insotonkho.attr("disabled", true);
            Ingiatritonkho.attr("disabled", true);
            giatrilonhon.attr("disabled", true);
        }

        $("#thietlapcachtinhsolieu").click(function () {
            var $thangtinhthue = $("#thangtinhthue").val();
            var $LoaiToKhai = $("#loaitokhai").val();
            var $namtinhthue = $("#namtinhthue").val();
            if($thangtinhthue!=""){
                $('.dialog_main_thietlap_tokhai_phuluc').load('form/frm_thietlap_khautru_thuetncn.php?thangtinhthue='+$thangtinhthue+'&loaitokhai='+$LoaiToKhai+'&namtinhthue='+$namtinhthue);
            }else{
                alert("Vui lòng chọn kỳ tính thuế.");
            }
        });

        function readonlySubmitSTT() {
        }

        function readonlyNonSubmitSTT() {
        }

        function readonlyInput() {

        }

        function notReadonlyInput() {

        }


        function xoaform_phieuthuchi($mangsang) {//------------------------------------------------------------------------------------
        }//-------------------------------------------------------------------------------------------------------

        function ChucNang_ThuChi() {// Xử lý khi nhấp button đồng ý
            var valid = true;
            allFields.removeClass("ui-state-error");// kiem tra du lieu
            $thangtinhthue = $("#thangtinhthue").val();
            $namtinhthue = $("#namtinhthue").val();

            $loaitokhai = $("#loaitokhai").val();
            valid = valid && checkNull($("#thangtinhthue"), " Kỳ tính thuế  ");

            $dulieutontai = false; // Dữ liệu chưa tồn tại
            $.ajax({// Chuyển tồn kho cho năm mới
                url: $dir_module_baocaothue + "kiemtracotontaidulieukhai_khautru_tncn.php",
                data: {thangtinhthue: $thangtinhthue, loaitokhai: $loaitokhai,namtinhthue:$namtinhthue},
                async: false,
                success: function (response) {
                    if (response == 1) {
                        $dulieutontai = true;
                    }
                }
            });
            $dulieukhoa = 0;
            $.ajax({// Chuyển tồn kho cho năm mới
                url: $dir_module_baocaothue + "kiemtrakhaithuebikhoa_pptt.php",
                data: {thangtinhthue: $thangtinhthue, loaitokhai: $loaitokhai,namtinhthue:$namtinhthue},
                async: false,
                success: function (response) {
                    if (response == 1) {
                        $dulieukhoa = true;
                    }
                }
            });

            if (valid) {
                $('.dialog_main_thongbao').load("form/frm_insolieu_bangke_tokhai_khautru_thuetncn.php?thangtinhthue=" + $thangtinhthue + "&loaitokhai=" + $loaitokhai+"&namtinhthue="+$namtinhthue);
            }
            return valid;
        }

        function xoadialog_bangketoankho() {// đóng form
            reset_dialog(".dialog-bangke_thue_gtgt");
            reset_dialog(".dialog_main_bangke_thue_gtgt");
        }

        dialog = $("#dialog-bangke_thue_gtgt").dialog({
            autoOpen: false,
            height: "auto",
            width: $width,
            modal: true,
            buttons: {
                "Đồng ý": ChucNang_ThuChi,
                "Kết thúc": function () {
                    if ($("#Loai").val() == "Add" && $("#MaBP").val() != "") {
                        $.confirm({
                            title: 'Thông báo',
                            content: ' Dữ liệu đã được thay đổi bạn có muốn lưu không.',
                            icon: 'fa fa-warning',
                            buttons: {
                                "Đồng ý": function () {
                                },
                                "Hủy bỏ": function () {
                                    xoadialog_bangketoankho();
                                }
                            }
                        });
                    } else {
                        xoadialog_bangketoankho();
                    }
                }
            }
        });
        dialog.dialog("open");
        //-------------------------------
    })
    ;
</script>