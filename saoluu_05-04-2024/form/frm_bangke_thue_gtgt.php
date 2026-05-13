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
function load_chinhanh($dir){
    $fp = @fopen($dir . '/chinhanh.db', "r");
    while (!feof($fp)) {
        $string_info = fgets($fp);
    }
    return json_decode($string_info, true);
}
$ChiNhanh = load_chinhanh($driver."/datafile/".$_SESSION['MST']."/".$_SESSION['NienDo']);

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
<div id="dialog-bangke_thue_gtgt" title="Tờ khai thuế GTGT...">
    <p class="validateTips"></p>
    <form method="post" id="Form-chinh" enctype="multipart/form-data">
        <fieldset style="background-color: #afd9ee">
            <legend>Kỳ tính của năm <?php echo $_SESSION['NienDo']; ?></legend>
            <table border="0" style="width: 100%;">
                <tr style="display:block;">
                    <td colspan="5">
                        <select name="ChiNhanhCongTy" id="ChiNhanhCongTy" class="text ui-widget-content ui-corner-all" style="width:90%;height:22px;<?php echo (($_SESSION['hienthichinhanh'] == '1') ? '' : 'display:none'); ?>">
                            <?php
                            foreach ($ChiNhanh as $ItemCN){
                                $dau = "";
                                $selected ="";
                                if($ItemCN[2]!=0){
                                    $dau = "--";
                                }
                                echo "<option value='" . $ItemCN[0] . "'". $selected.">" .$dau." ".$ItemCN[1]. "</option>";
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr style="display:block;">
                    <td><input name="rd_thangtonkho" type="radio" id="rd_thangtonkho" checked="checked"></td>
                    <td>Tháng&nbsp;</td>
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
        <fieldset style="background-color: #afd9ee;display:none">
            <legend>Trình bày</legend>
            <table border="0" style="width: 100%;">
                <tr>
                    <td><b>Thuế suất :</b></td>
                    <td><select name="Intheothuesuat" style="width:100%;height:25px;" id="Intheothuesuat">
                            <option value="1">In toàn bộ</option>
                            <option value="2">Hàng thuế suất 0%</option>
                            <option value="3">Hàng thuế suất 5%</option>
                            <option value="4">Hàng thuế suất 10%</option>
                            <option value="5">Hàng thuế suất 20%</option>
                            <option>Hàng không chịu thuế</option>
                        </select></td>
                </tr>
                <tr>
                    <td><b>Chứng từ :

                        </b></td>
                    <td>
                        <select name="Intheochungtu" style="width:100%;height:25px;" id="Intheochungtu">
                            <option value="1">Hóa đơn GTGT</option>
                            <option value="2">Hóa đơn bán hàng</option>
                            <option value="3">Bảng kê 01 /TNDN</option>
                            <option value="4">HĐ mua hàng/HĐ mua NLTS</option>
                            <option value="5">Chứng từ khác</option>
                            <option value="6">Toàn bộ</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><b>Sắp xếp : </b></td>
                    <td>
                        <select name="sapxeptheohoadon" id="sapxeptheohoadon" style="width:100%;height:25px;">
                            <option value="1">Số thứ tự</option>
                            <option value="2">Ngày ghi sổ</option>
                            <option value="3">Ngày hóa đơn</option>
                            <option value="4">Khách hàng</option>
                            <option value="5">Tên hàng</option>
                            <option value="6">Thuế suất</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><b style="font-size: 14px;">Kiểu in :</b></td>
                    <td><select name="kieuin" style="width:100%;height:25px;" id="kieuin">
                            <option value="1">In dọc</option>
                            <option value="2">In ngang</option>
                        </select></td>
                </tr>
                <tr>
                    <td><b style="font-size: 14px;">Mẫu in :</b></td>
                    <td><select name="theothongtu" id="theothongtu" style="width:100%;height:25px;">
                            <option value="1">TT 127 ngày 27-12-2004</option>
                            <option value="2">TT 32 ngày 09-04-2007</option>
                            <option value="3">TT 60 ngày 14-06-2007</option>
                            <option value="4">TT 28 ngày 28-02-2011</option>
                        </select></td>
                </tr>
                <tr>
                    <td colspan="2">&nbsp;<b>Sắp xếp khi in</b></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <table style="width: 100%">
                            <tr>
                                <td><input name="sxtheonhommathang" type="checkbox" id="sxtheonhommathang"
                                           checked="checked"></td>
                                <td>Theo nhóm mặt hàng</td>
                                <td><input name="rd_sxtheo" type="radio" id="rd_sxtheoten" checked="checked"></td>
                                <td>Theo tên</td>
                                <td><input type="radio" name="rd_sxtheo" id="rd_sxtheomaso"></td>
                                <td>Theo mã số</td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </fieldset>
        <fieldset style="background-color: #afd9ee">
            <legend>Lựa chọn</legend>
            <table border="0" style="width: 100%;">
                <tr>
                    <td width="6px;" style="padding-top:3px;"><input name="khautrughangthang" id="khautrughangthang"
                                                                     type="checkbox" value="" checked="checked"/></td>
                    <td colspan="2">&nbsp;Khấu trừ thuế GTGT hàng tháng</td>
                </tr>
                <tr>
                    <td width="6px;" style="padding-top:3px;"></td>
                    <td width="190px">Thuế GTGT kỳ trước</td>
                    <td><input name="thuegtgtkytruoc" type="text" id="thuegtgtkytruoc"
                               onkeyup="return format_munber(this.value,'#thuegtgtkytruoc')"
                               class="text ui-widget-content ui-corner-all"/></td>
                </tr>
                <tr>
                    <td style="padding-top:3px;"></td>
                    <td>Số thuế đề nghị hoàn:</td>
                    <td><input name="thuedenghihoan" type="text" id="thuedenghihoan"
                               onkeyup="return format_munber(this.value,'#thuedenghihoan')"
                               class="text ui-widget-content ui-corner-all"/></td>
                </tr>
                <tr>
                    <td style="padding-top:3px;"></td>
                    <td>Thuế GTGT khấu trừ kỳ này</td>
                    <td><input name="thuegtgtduockhautrukynay" type="text" id="thuegtgtduockhautrukynay"
                               onkeyup="return format_munber(this.value,'#thuegtgtduockhautrukynay')"
                               class="text ui-widget-content ui-corner-all"/></td>
                </tr>
            </table>
        </fieldset>
        <fieldset style="background-color: #afd9ee">
            <legend>Điều chỉnh tăng[+],giảm[-] kỳ trước &nbsp;&nbsp;
                <blink id="capnhatsolieu" style="color:#F00;text-decoration:none;" href="#"
                       title="Click vào để lấy số liệu tự động">Nhấp vào cập nhật số liệu
                </blink>
            </legend>
            <table border="0" style="width: 100%;">
                <tr>
                    <td colspan="3"><span style="color:#600">&nbsp;Điều chỉnh tăng/giảm thuế GTGT được khấu trừ</span></td>
                </tr>
                <tr>
                    <td width="50px;" style="padding-top:3px;"></td>
                    <td width="165px">Thuế GTGT:
                    </td>
                    <td>
                        <input name="thuegtgttanggiam" type="text"
                               class="text ui-widget-content ui-corner-all" id="thuegtgttanggiam" arr
                               onkeyup="return format_munber(this.value,'#thuegtgttanggiam')"/></td>
                </tr>
                <tr>
                    <td colspan="3"><span style="color:#600">&nbsp;Điều chỉnh thuế GTGT được khấu trừ</span></td>
                </tr>
                <tr>
                    <td width="50px;" style="padding-top:3px;"></td>
                    <td width="165px">Doanh số:
                    </td>
                    <td>
                        <input name="doanhsogtgtkhautru" type="text"
                               class="text ui-widget-content ui-corner-all" id="doanhsogtgtkhautru" readonly
                               onkeyup="return format_munber(this.value,'#doanhsogtgtkhautru')"/></td>
                </tr>
                <tr>
                    <td width="50px;" style="padding-top:3px;"></td>
                    <td width="165px">Thuế GTGT</td>
                    <td>
                        <input name="thuegtgtkhautru" type="text"
                               class="text ui-widget-content ui-corner-all" id="thuegtgtkhautru" readonly
                               onkeyup="return format_munber(this.value,'#thuegtgtkhautru')"/></td>
                </tr>
                <tr>
                    <td colspan="3"><span style="color:#600">&nbsp;Điều chỉnh thuế GTGT đầu ra</span></td>
                </tr>
                <tr>
                    <td width="50px;" style="padding-top:3px;"></td>
                    <td width="165px">
                    <table>
                        <tr>
                            <td width="120px">Doanh số:</td>
                            <td width="45px" style="text-align: right;"><a onclick="$('.dialog_main').load('form/frm_capnhat_doanhso_banra.php');" href="#"><b style="color: red;">Sửa</b></a></td>
                        </tr>
                    </table>
                    </td>
                    <td>
                        <input name="doanhsogtgtdaura" type="text" readonly="readonly"
                               class="text ui-widget-content ui-corner-all" id="doanhsogtgtdaura"
                               onkeyup="return format_munber(this.value,'#doanhsogtgtdaura')"/></td>
                </tr>
                <tr>
                    <td width="50px;" style="padding-top:3px;"></td>
                    <td width="165px">Thuế GTGT</td>
                    <td>
                        <input name="thuegtgtdaura" type="text" readonly
                               class="text ui-widget-content ui-corner-all" id="thuegtgtdaura"
                               onkeyup="return format_munber(this.value,'#thuegtgtdaura')"/>
                        <input name="chitietdsdaura" type="hidden"
                               class="text ui-widget-content ui-corner-all" id="chitietdsdaura"/>
                    </td>
                </tr>
                <tr>
                    <td colspan="3" style="padding-top:3px;">
                        <fieldset style="cursor: pointer;">
                            <legend id="fslydothanggiamtokhai" TITLE="Nhấp vào để nhập lý do" style="color: blue;font-weight: bold;">LÝ DO ĐIỀU CHỈNH TĂNG/GIẢM TRONG KỲ </legend>
                        <textarea style="width: 100%;display: none;" id="lydothanggiamtokhai" rows="4"></textarea>
                        </fieldset>
                        <fieldset id="LoiDoKhaiBoSung" style="cursor: pointer;display: none;">
                            <legend  TITLE="" style="color: red;font-weight: bold;">LỖI DO KHAI BỔ SUNG BỞI</legend>
                            <table border="0" WIDTH="50%">
                                <tr style="text-align: left;">
                                    <td><input style="margin-top: 4px;" type="radio" id="ketoan" name="loitokhai" value="1">&nbsp;<b>Kế toán </b></td>
                                    <td><input style="margin-top: 4px;" type="radio" id="khachhang" name="loitokhai" value="2">&nbsp;<b>Khách hàng</b></td>
                                </tr>
                            </table>

                        </fieldset>
                    </td>
                </tr>
            </table>
        </fieldset>
        <fieldset style="background-color: #afd9ee">
            <legend></legend>
            <table border="0" style="width: 100%;">
                <tr>
                    <td colspan="3"><span style="color:#600">&nbsp;Thuế GTGT đã nộp ở địa phương khác của hoạt động kinh doanh xây dựng, lắp đặt  bán hàng, bất động sản ngoại tỉnh </span>
                    </td>
                </tr>
                <tr>
                    <td width="50" style="padding-top:3px;"></td>
                    <td width="165">&nbsp;</td>
                    <td>
                        <input name="thuegtgtngoaitinh" type="text" id="thuegtgtngoaitinh"
                               onkeyup="return format_munber(this.value,'#thuegtgtngoaitinh')"
                               class="text ui-widget-content ui-corner-all"/></td>
                </tr>
                <tr>
                    <td colspan="3"><span style="color:#600">&nbsp;Thuế GTGT mua vào của các dự án đầu tư được bù trừ với thuế GTGT còn phải nộp của hoạt động sản xuất kinh doanh cùng kỳ tính thuế </span>
                    </td>
                </tr>
                <tr>
                    <td width="50" style="padding-top:3px;"></td>
                    <td width="165">&nbsp;</td>
                    <td>
                        <input name="thuegtgtmuavaoduandautu" type="text" id="thuegtgtmuavaoduandautu"
                               onkeyup="return format_munber(this.value,'#thuegtgtmuavaoduandautu')"
                               class="text ui-widget-content ui-corner-all"/></td>
                </tr>
            </table>
        </fieldset>
        <fieldset style="background-color: #afd9ee;display: none;">
            <legend></legend>
            <table>
                <tr>
                    <td><input type="checkbox" name="ThucHienKhauTru" id="ThucHienKhauTru"></td>
                    <td>&nbsp Cho phép thực hiện khấu trừ khi khoá tờ khai</td>
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
            if (o.val() == "" || typeof o.val() == "undefined") {
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
        $("#ChiNhanhCongTy").change(function () {
           $("#namtinhthue").val("");
           $("#thangtinhthue").val("");
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
        $("#capnhatsolieu").click(function () {
            $loaitokhai = $("#loaitokhai").val();
            $thangtinhthue = $("#thangtinhthue").val();
            $namtinhthue = $("#namtinhthue").val();
            $machinhanh = $("#ChiNhanhCongTy").val();
            if($loaitokhai!=1){// tờ khai bổ sung
            $.confirm({
                title: 'Lấy số liệu tăng/giảm  thành công',
                type: 'green',
                autoClose: 'OK|1000',
                content: function () {
                    var self = this;
                    return $.ajax({
                        url: $dir_module_baocaothue + "capnhattanggiamkytruoc.php?thangtinhthue=" + $thangtinhthue + "&loaitokhai=" + $loaitokhai+"&namtinhthue="+$namtinhthue+"&machinhanh="+$machinhanh,
                        async: false,
                        success: function (response) {
                            if (response != 0) {
                                $data = $.parseJSON(response);
                                $DoanhThu = ($data.tongtien);
                                $TienThue = ($data.tongthue);

                                $DoanhThuBR = ($data.tongtienbr);
                                $TienThueBR = ($data.tongthuebr);

                                $ChiTietBR = (response.trim());

                                $("#doanhsogtgtdaura").val(($.number(($DoanhThuBR), 0, ".", ",")));
                                $("#thuegtgtdaura").val($.number(($TienThueBR), 0, ".", ","));

                                $("#doanhsogtgtkhautru").val(($.number(($DoanhThu), 0, ".", ",")));
                                $("#thuegtgtkhautru").val($.number(($TienThue), 0, ".", ","));

                                $("#chitietdsdaura").val($ChiTietBR);
                            }
                        }
                    });
                },
                buttons: {
                    "OK": {
                        keys: ['Y'], action: function () {

                        }
                    }
                }
            });
        }else{// Kết thúc bổ sung
                $("#doanhsogtgtdaura").val(0);
                $("#thuegtgtdaura").val(0);

                $("#doanhsogtgtkhautru").val(0);
                $("#thuegtgtkhautru").val(0);
            }
        });
        $("#loaitokhai").change(function () {
            $thangtinhthue = $("#thangtinhthue").val();
            $namtinhthue = $("#namtinhthue").val();
            $loaitokhai = $("#loaitokhai").val();
            $machinhanh = $("#ChiNhanhCongTy").val();
            if ($loaitokhai == 1) {
                $("#LoiDoKhaiBoSung").hide();
                $datakt = "";
                $.ajax({// Thêm dữ liệu vào tokhaithue
                    url: $dir_module_baocaothue + "laythonggtgtkytruoc.php?thangtinhthue=" + $thangtinhthue + "&loaitokhai=1&namtinhthue="+$namtinhthue+"&machinhanh="+$machinhanh,
                    async: false,
                    success: function (response) {
                        if (response != 0) {
                            $datakt = $.parseJSON(response);
                            $("#thuegtgtkytruoc").val(FormatNumber($datakt.VI42.thue));
                        } else {
                            alert_f("Chú ý", "", "red", "Thuế GTGT kỳ trước không tồn tại !");
                            $("#thuegtgtkytruoc").val("");
                        }
                    }
                });
                $data = "";
                $.ajax({// Thêm dữ liệu vào tokhaithue
                    url: $dir_module_baocaothue + "laythongtininphieukekhaithue_json.php?thangtinhthue=" + $thangtinhthue + "&loaitokhai=" + $loaitokhai+"&namtinhthue="+$namtinhthue+"&machinhanh="+$machinhanh,
                    async: false,
                    success: function (response) {
                        if (response != 0) {
                            try {
                                $data = $.parseJSON(response);
                                $("#thuedenghihoan").val(FormatNumber($data.VI41.thue));
                                $("#thuegtgtngoaitinh").val(FormatNumber($data.V.thue));
                                $("#thuegtgtmuavaoduandautu").val(FormatNumber($data.VI2.thue));
                                if ($data.I1.thue == $data.I2.thue) {
                                    $("#thuegtgtduockhautrukynay").val("");
                                } else {
                                    $("#thuegtgtduockhautrukynay").val(FormatNumber($data.I2.thue));
                                }

                                try{
                                    $("#lydothanggiamtokhai").val($data.LDTG.lydotanggiam);
                                }catch (e) {
                                    $("#lydothanggiamtokhai").val("");
                                }
                                try{
                                    $("#chitietdsdaura").val($data.CTBR.chitietdsbr);
                                }catch (e) {
                                    $("#chitietdsdaura").val("");
                                }
                                try{
                                    $("#thuegtgttanggiam").val($data.THTG.thuegtgttanggiam);
                                }catch (e) {
                                    $("#thuegtgttanggiam").val(0);
                                }
                                $thuedaura = parseFloat($data.VI112.thue);
                                $doanhthudaura = parseFloat($data.VI112.gthh);

                                $thuekhautru = parseFloat($data.VI111.thue);
                                $doanhthukhautru = parseFloat($data.VI111.gthh);

                                $("#doanhsogtgtdaura").val(($.number($doanhthudaura, 0, ".", ",")));
                                $("#thuegtgtdaura").val($.number($thuedaura, 0, ".", ","));

                                $("#doanhsogtgtkhautru").val(($.number($doanhthukhautru, 0, ".", ",")));
                                $("#thuegtgtkhautru").val($.number($thuekhautru, 0, ".", ","));
                            } catch (err) {
                                $data = $.parseJSON(response);

                                $thuedaura = parseFloat($data.IV2.thue);
                                $doanhthudaura = parseFloat($data.IV2.gthh);

                                $thuekhautru = parseFloat($data.IV1.thue);
                                $doanhthukhautru = parseFloat($data.IV1.gthh);

                                try{
                                    $("#lydothanggiamtokhai").val($data.LDTG.lydotanggiam);
                                }catch (e) {
                                    $("#lydothanggiamtokhai").val("");
                                }
                                try{
                                    $("#chitietdsdaura").val($data.CTBR.chitietdsbr);
                                }catch (e) {
                                    $("#chitietdsdaura").val("");
                                }

                                try{
                                    $("#thuegtgttanggiam").val($data.THTG.thuegtgttanggiam);
                                }catch (e) {
                                    $("#thuegtgttanggiam").val(0);
                                }

                                $("#doanhsogtgtdaura").val(($.number($doanhthudaura, 0, ".", ",")));
                                $("#thuegtgtdaura").val($.number($thuedaura, 0, ".", ","));

                                $("#doanhsogtgtkhautru").val(($.number($doanhthukhautru, 0, ".", ",")));
                                $("#thuegtgtkhautru").val($.number($thuekhautru, 0, ".", ","));
                            }
                        } else {


                            $("#thuedenghihoan").val("");
                            $("#thuegtgtngoaitinh").val("");
                            $("#thuegtgtmuavaoduandautu").val("");
                            $("#doanhsogtgtdaura").val("");
                            $("#thuegtgtdaura").val("");
                            $("#thuegtgttanggiam").val("");

                            $("#doanhsogtgtkhautru").val("");
                            $("#thuegtgtkhautru").val("");
                            $("#thuegtgtduockhautrukynay").val("");
                            $("#lydothanggiamtokhai").val("");
                            $("#chitietdsdaura").val("");

                        }
                    }
                });
            } else {/// Nếu đổi tờ khai bổ sung
                $("#LoiDoKhaiBoSung").show();
                $datakt = "";
                $.ajax({// Thêm dữ liệu vào tokhaithue
                    url: $dir_module_baocaothue + "laythonggtgtkytruoc.php?thangtinhthue=" + $thangtinhthue + "&loaitokhai=1&namtinhthue="+$namtinhthue+"&machinhanh="+$machinhanh,
                    async: false,
                    success: function (response) {
                        if (response != 0) {
                            $datakt = $.parseJSON(response);
                            $("#thuegtgtkytruoc").val(FormatNumber($datakt.VI42.thue));
                        } else {
                            alert_f("Chú ý", "", "red", "Thuế GTGT kỳ trước không tồn tại !");
                            $("#thuegtgtkytruoc").val("");
                        }
                    }
                });
                $data = "";
                $.ajax({// Thêm dữ liệu vào tokhaithue
                    url: $dir_module_baocaothue + "laythongtininphieukekhaithue_json.php?thangtinhthue=" + $thangtinhthue + "&loaitokhai=" + $loaitokhai+"&namtinhthue="+$namtinhthue+"&machinhanh="+$machinhanh,
                    async: false,
                    success: function (response) {
                        if (response != 0) {
                            try {
                                $data = $.parseJSON(response);
                                $("#thuedenghihoan").val(FormatNumber($data.VI41.thue));
                                $("#thuegtgtngoaitinh").val(FormatNumber($data.V.thue));
                                $("#thuegtgtmuavaoduandautu").val(FormatNumber($data.VI2.thue));
                                if ($data.I1.thue == $data.I2.thue) {
                                    $("#thuegtgtduockhautrukynay").val("");
                                } else {
                                    if ($data.I1.thue == $data.I2.thue) {
                                        $("#thuegtgtduockhautrukynay").val("");
                                    } else {
                                        $("#thuegtgtduockhautrukynay").val(FormatNumber($data.I2.thue));
                                    }
                                }
                                try{
                                    $("#lydothanggiamtokhai").val($data.LDTG.lydotanggiam);
                                }catch (e) {
                                    $("#lydothanggiamtokhai").val("");
                                }

                                try{
                                    $("#chitietdsdaura").val($data.CTBR.chitietdsbr);
                                }catch (e) {
                                    $("#chitietdsdaura").val("");
                                }

                                try{
                                    $("#thuegtgttanggiam").val($data.THTG.thuegtgttanggiam);
                                }catch (e) {
                                    $("#thuegtgttanggiam").val(0);
                                }

                                $thuedaura = parseFloat($data.VI112.thue);
                                $doanhthudaura = parseFloat($data.VI112.gthh);

                                $thuekhautru = parseFloat($data.VI111.thue);
                                $doanhthukhautru = parseFloat($data.VI111.gthh);

                                $("#doanhsogtgtdaura").val(($.number($doanhthudaura, 0, ".", ",")));
                                $("#thuegtgtdaura").val($.number($thuedaura, 0, ".", ","));

                                $("#doanhsogtgtkhautru").val(($.number($doanhthukhautru, 0, ".", ",")));
                                $("#thuegtgtkhautru").val($.number($thuekhautru, 0, ".", ","));
                                $("#thuegtgtkhautru").val($.number($thuekhautru, 0, ".", ","));

                                $loikhaibosung = parseFloat($data.VI111.loikhaibosung);
                                if($loikhaibosung!=0){
                                    $( "#ketoan" ).prop( "disabled", true );
                                    $( "#khachhang" ).prop( "disabled", true );
                                    if($loikhaibosung==1){
                                        $( "#ketoan" ).prop( "checked", true );
                                    }
                                    if($loikhaibosung==2){
                                        $( "#khachhang" ).prop( "checked", true );
                                    }
                                }else{
                                    $( "#ketoan" ).prop( "checked", false );
                                    $( "#khachhang" ).prop( "checked", false );
                                    $( "#ketoan" ).prop( "disabled", false );
                                    $( "#khachhang" ).prop( "disabled", false );
                                }
                            } catch (err) {
                                $data = $.parseJSON(response);

                                $thuedaura = parseFloat($data.IV2.thue);
                                $doanhthudaura = parseFloat($data.IV2.gthh);

                                $thuekhautru = parseFloat($data.IV1.thue);
                                $doanhthukhautru = parseFloat($data.IV1.gthh);

                                try{
                                    $("#lydothanggiamtokhai").val($data.LDTG.lydotanggiam);
                                }catch (e) {
                                    $("#lydothanggiamtokhai").val("");
                                }

                                try{
                                    $("#chitietdsdaura").val($data.CTBR.chitietdsbr);
                                }catch (e) {
                                    $("#chitietdsdaura").val("");
                                }

                                try{
                                    $("#thuegtgttanggiam").val($data.THTG.thuegtgttanggiam);
                                }catch (e) {
                                    $("#thuegtgttanggiam").val(0);
                                }

                                $("#doanhsogtgtdaura").val(($.number($doanhthudaura, 0, ".", ",")));
                                $("#thuegtgtdaura").val($.number($thuedaura, 0, ".", ","));

                                $("#doanhsogtgtkhautru").val(($.number($doanhthukhautru, 0, ".", ",")));
                                $("#thuegtgtkhautru").val($.number($thuekhautru, 0, ".", ","));

                                $loikhaibosung = parseFloat($data.VI111.loikhaibosung);
                                if($loikhaibosung!=0){
                                    $( "#ketoan" ).attr( "checked", true );
                                    $( "#khachhang" ).prop( "checked", false );
                                    $( "#ketoan" ).prop( "disabled", true );
                                    $( "#khachhang" ).prop( "disabled", true );
                                    if($loikhaibosung==1){
                                        $( "#ketoan" ).prop( "checked", true );
                                    }
                                    if($loikhaibosung==2){
                                        $( "#khachhang" ).prop( "checked", true );
                                    }
                                }else{
                                    $( "#ketoan" ).prop( "checked", false );
                                    $( "#khachhang" ).prop( "checked", false );
                                    $( "#ketoan" ).prop( "disabled", false );
                                    $( "#khachhang" ).prop( "disabled", false );
                                }
                            }
                        } else {


                            $("#thuedenghihoan").val("");
                            $("#thuegtgtngoaitinh").val("");
                            $("#thuegtgtmuavaoduandautu").val("");
                            $("#doanhsogtgtdaura").val("");

                            $("#thuegtgtdaura").val("");
                            $("#doanhsogtgtkhautru").val("");
                            $("#thuegtgtkhautru").val("");
                            $("#thuegtgtduockhautrukynay").val("");

                            $("#lydothanggiamtokhai").val("");
                            $("#chitietdsdaura").val("");
                            $( "#ketoan" ).prop( "checked", false );
                            $( "#khachhang" ).prop( "checked", false );
                            $( "#ketoan" ).prop( "disabled", false );
                            $( "#khachhang" ).prop( "disabled", false );
                        }
                    }
                });
            }
        });

        $("#thangtinhthue").change(function () {
            $thangtinhthue = $("#thangtinhthue").val();
            $namtinhthue = $("#namtinhthue").val();
            $machinhanh = $("#ChiNhanhCongTy").val();
            $("#loaitokhai").val(1);
            $("#LoiDoKhaiBoSung").hide();
            $loaitokhai = $("#loaitokhai").val();
            if ($loaitokhai == 1) {//// Tờ khai chính thức
                $datakt = "";
                $.ajax({// Thêm dữ liệu vào tokhaithue
                    url: $dir_module_baocaothue + "laythonggtgtkytruoc.php?thangtinhthue=" + $thangtinhthue + "&loaitokhai=1&namtinhthue="+$namtinhthue+"&machinhanh="+$machinhanh,
                    async: false,
                    success: function (response) {
                        if (response != 0) {
                            $datakt = $.parseJSON(response);
                            $("#thuegtgtkytruoc").val(FormatNumber($datakt.VI42.thue));
                        } else {
                            alert_f("Chú ý", "", "red", "Thuế GTGT kỳ trước không tồn tại !");
                            $("#thuegtgtkytruoc").val("");
                        }
                    }
                });
                $data = "";
                $.ajax({// Thêm dữ liệu vào tokhaithue
                    url: $dir_module_baocaothue + "laythongtininphieukekhaithue_json.php?thangtinhthue=" + $thangtinhthue + "&loaitokhai=" + $loaitokhai+"&namtinhthue="+$namtinhthue+"&machinhanh="+$machinhanh,
                    async: false,
                    success: function (response) {
                        if (response != 0) {
                            try {
                                $data = $.parseJSON(response);
                                $("#thuedenghihoan").val(FormatNumber($data.VI41.thue));
                                $("#thuegtgtngoaitinh").val(FormatNumber($data.V.thue));
                                $("#thuegtgtmuavaoduandautu").val(FormatNumber($data.VI2.thue));

                                if ($data.I1.thue == $data.I2.thue) {
                                    $("#thuegtgtduockhautrukynay").val("");
                                } else {
                                    $("#thuegtgtduockhautrukynay").val(FormatNumber($data.I2.thue));
                                }
                                try{
                                    $("#lydothanggiamtokhai").val($data.LDTG.lydotanggiam);
                                }catch (e) {
                                    $("#lydothanggiamtokhai").val("");
                                }

                                try{
                                    $("#chitietdsdaura").val($data.CTBR.chitietdsbr);
                                }catch (e) {
                                    $("#chitietdsdaura").val("");
                                }

                                try{
                                    $("#thuegtgttanggiam").val($data.THTG.thuegtgttanggiam);
                                }catch (e) {
                                    $("#thuegtgttanggiam").val(0);
                                }

                                $thuedaura = parseFloat($data.VI112.thue);
                                $doanhthudaura = parseFloat($data.VI112.gthh);

                                $thuekhautru = parseFloat($data.VI111.thue);
                                $doanhthukhautru = parseFloat($data.VI111.gthh);

                                $("#doanhsogtgtdaura").val(($.number($doanhthudaura, 0, ".", ",")));
                                $("#thuegtgtdaura").val($.number($thuedaura, 0, ".", ","));

                                $("#doanhsogtgtkhautru").val(($.number($doanhthukhautru, 0, ".", ",")));
                                $("#thuegtgtkhautru").val($.number($thuekhautru, 0, ".", ","));
                            } catch (err) {
                                $data = $.parseJSON(response);

                                $thuedaura = parseFloat($data.IV2.thue);
                                $doanhthudaura = parseFloat($data.IV2.gthh);

                                $thuekhautru = parseFloat($data.IV1.thue);
                                $doanhthukhautru = parseFloat($data.IV1.gthh);

                                try{
                                    $("#lydothanggiamtokhai").val($data.LDTG.lydotanggiam);
                                }catch (e) {
                                    $("#lydothanggiamtokhai").val("");
                                }

                                try{
                                    $("#chitietdsdaura").val($data.CTBR.chitietdsbr);
                                }catch (e) {
                                    $("#chitietdsdaura").val("");
                                }

                                try{
                                    $("#thuegtgttanggiam").val($data.THTG.thuegtgttanggiam);
                                }catch (e) {
                                    $("#thuegtgttanggiam").val(0);
                                }

                                $("#doanhsogtgtdaura").val(($.number($doanhthudaura, 0, ".", ",")));
                                $("#thuegtgtdaura").val($.number($thuedaura, 0, ".", ","));

                                $("#doanhsogtgtkhautru").val(($.number($doanhthukhautru, 0, ".", ",")));
                                $("#thuegtgtkhautru").val($.number($thuekhautru, 0, ".", ","));
                            }
                        } else {

                            $("#thuedenghihoan").val("");
                            $("#thuegtgtngoaitinh").val("");
                            $("#thuegtgtmuavaoduandautu").val("");
                            $("#doanhsogtgtdaura").val("");
                            $("#thuegtgtdaura").val("");

                            $("#doanhsogtgtkhautru").val("");
                            $("#thuegtgtkhautru").val("");
                            $("#thuegtgtduockhautrukynay").val("");
                            $("#lydothanggiamtokhai").val("");
                            $("#chitietdsdaura").val("");

                        }
                    }
                });
            } else {
                $datakt = "";
                $.ajax({// Thêm dữ liệu vào tokhaithue
                    url: $dir_module_baocaothue + "laythonggtgtkytruoc.php?thangtinhthue=" + $thangtinhthue + "&loaitokhai=1&namtinhthue="+$namtinhthue+"&machinhanh="+$machinhanh,
                    async: false,
                    success: function (response) {
                        if (response != 0) {
                            $datakt = $.parseJSON(response);
                            $("#thuegtgtkytruoc").val(FormatNumber($datakt.VI42.thue));
                        } else {
                            alert_f("Chú ý", "", "red", "Thuế GTGT kỳ trước không tồn tại !");
                            $("#thuegtgtkytruoc").val("");
                        }
                    }
                });
                $data = "";
                $.ajax({// Thêm dữ liệu vào tokhaithue
                    url: $dir_module_baocaothue + "laythongtininphieukekhaithue_json.php?thangtinhthue=" + $thangtinhthue + "&loaitokhai=" + $loaitokhai+"&namtinhthue="+$namtinhthue+"&machinhanh="+$machinhanh,
                    async: false,
                    success: function (response) {
                        if (response != 0) {
                            try {
                                $data = $.parseJSON(response);
                                $("#thuedenghihoan").val(FormatNumber($data.VI41.thue));
                                $("#thuegtgtngoaitinh").val(FormatNumber($data.V.thue));
                                $("#thuegtgtmuavaoduandautu").val(FormatNumber($data.VI2.thue));
                                if ($data.I1.thue == $data.I2.thue) {
                                    $("#thuegtgtduockhautrukynay").val("");
                                } else {
                                    $("#thuegtgtduockhautrukynay").val(FormatNumber($data.I2.thue));
                                }
                                try{
                                    $("#lydothanggiamtokhai").val($data.LDTG.lydotanggiam);
                                }catch (e) {
                                    $("#lydothanggiamtokhai").val("");
                                }
                                try{
                                    $("#chitietdsdaura").val($data.CTBR.chitietdsbr);
                                }catch (e) {
                                    $("#chitietdsdaura").val("");
                                }

                                try{
                                    $("#thuegtgttanggiam").val($data.THTG.thuegtgttanggiam);
                                }catch (e) {
                                    $("#thuegtgttanggiam").val(0);
                                }

                                $thuedaura = parseFloat($data.VI112.thue);
                                $doanhthudaura = parseFloat($data.VI112.gthh);

                                $thuekhautru = parseFloat($data.VI111.thue);
                                $doanhthukhautru = parseFloat($data.VI111.gthh);

                                $("#doanhsogtgtdaura").val(($.number($doanhthudaura, 0, ".", ",")));
                                $("#thuegtgtdaura").val($.number($thuedaura, 0, ".", ","));

                                $("#doanhsogtgtkhautru").val(($.number($doanhthukhautru, 0, ".", ",")));
                                $("#thuegtgtkhautru").val($.number($thuekhautru, 0, ".", ","));
                            } catch (err) {
                                $data = $.parseJSON(response);

                                $thuedaura = parseFloat($data.IV2.thue);
                                $doanhthudaura = parseFloat($data.IV2.gthh);

                                $thuekhautru = parseFloat($data.IV1.thue);
                                $doanhthukhautru = parseFloat($data.IV1.gthh);

                                try{
                                    $("#lydothanggiamtokhai").val($data.LDTG.lydotanggiam);
                                }catch (e) {
                                    $("#lydothanggiamtokhai").val("");
                                }

                                try{
                                    $("#chitietdsdaura").val($data.CTBR.chitietdsbr);
                                }catch (e) {
                                    $("#chitietdsdaura").val("");
                                }

                                try{
                                    $("#thuegtgttanggiam").val($data.THTG.thuegtgttanggiam);
                                }catch (e) {
                                    $("#thuegtgttanggiam").val(0);
                                }

                                $("#doanhsogtgtdaura").val(($.number($doanhthudaura, 0, ".", ",")));
                                $("#thuegtgtdaura").val($.number($thuedaura, 0, ".", ","));

                                $("#doanhsogtgtkhautru").val(($.number($doanhthukhautru, 0, ".", ",")));
                                $("#thuegtgtkhautru").val($.number($thuekhautru, 0, ".", ","));
                            }
                        } else {

                            $("#thuedenghihoan").val("");
                            $("#thuegtgtngoaitinh").val("");
                            $("#thuegtgtmuavaoduandautu").val("");
                            $("#doanhsogtgtdaura").val("");
                            $("#thuegtgtdaura").val("");

                            $("#doanhsogtgtkhautru").val("");
                            $("#thuegtgtkhautru").val("");
                            $("#thuegtgtduockhautrukynay").val("");
                            $("#lydothanggiamtokhai").val("");
                            $("#chitietdsdaura").val("");

                        }
                    }
                });
            }
        });

///-------------------------Di chuyễn các phần tử bằng enter----------------
        $("#fslydothanggiamtokhai").click(function () {
            $("#lydothanggiamtokhai").toggle();
        });
        $("#thangtinhthue").keydown(function (event) {// Gọi table mã nội dung để chọn
            if (event.keyCode == Keys.ENTER) { // copy
                $("#thuegtgtkytruoc").focus();
            }
        })
        $("#thuegtgtkytruoc").keydown(function (event) {// Gọi table mã nội dung để chọn
            if (event.keyCode == Keys.ENTER) { // copy
                $("#thuedenghihoan").focus();
            }
        })

        $("#congdondenthang").keydown(function (event) {// Gọi table mã nội dung để chọn
            if (event.keyCode == Keys.ENTER) { // copy
                $("#khautrughangthang").focus();
            }
        })
        $("#khautrughangthang").keydown(function (event) {// Gọi table mã nội dung để chọn
            if (event.keyCode == Keys.ENTER) { // copy
                $("#thuedenghihoan").focus();
            }
        })

        $("#thuedenghihoan").keydown(function (event) {// Gọi table mã nội dung để chọn
            if (event.keyCode == Keys.ENTER) { // copy
                $("#doanhsogtgtkhautru").focus();
            }
        })
        $("#doanhsogtgtkhautru").keydown(function (event) {// Gọi table mã nội dung để chọn
            if (event.keyCode == Keys.ENTER) { // copy
                $("#thuegtgtkhautru").focus();
            }
        })
        $("#thuegtgtkhautru").keydown(function (event) {// Gọi table mã nội dung để chọn
            if (event.keyCode == Keys.ENTER) { // copy
                $("#doanhsogtgtdaura").focus();
            }
        })
        $("#doanhsogtgtdaura").keydown(function (event) {// Gọi table mã nội dung để chọn
            if (event.keyCode == Keys.ENTER) { // copy
                $("#thuegtgtdaura").focus();
            }
        })
        $("#thuegtgtdaura").keydown(function (event) {// Gọi table mã nội dung để chọn
            if (event.keyCode == Keys.ENTER) { // copy
                $("#thuegtgtngoaitinh").focus();
            }
        })

        $("#thuegtgtngoaitinh").keydown(function (event) {// Gọi table mã nội dung để chọn
            if (event.keyCode == Keys.ENTER) { // copy
                $("#thuegtgtmuavaoduandautu").focus();
            }
        })

        $("#congdontuthang").change(function (event) {// Gọi table mã nội dung để chọn
            $tuthang = $("#congdontuthang").val();
            $denthang = $("#congdondenthang").val();
            if ($tuthang > $denthang) {
                //$("#congdontuthang").val($tuthang);
                $("#congdondenthang option[value=" + $tuthang + "]").attr('selected', 'selected');
            }
        })
        $("#congdondenthang").change(function (event) {// Gọi table mã nội dung để chọn
            $tuthang = $("#congdontuthang").val();
            $denthang = $("#congdondenthang").val();
            if ($tuthang > $denthang) {
                //$("#congdontuthang").val($tuthang);
                $("#congdontuthang option[value=" + $denthang + "]").attr('selected', 'selected');
            }
        })


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
            $thangtk = $("#tuthang").val();
            $thangtinhthue = $("#thangtinhthue").val();
            $congdontuthang = $("#congdontuthang").val();
            $congdondenthang = $("#congdondenthang").val();
            $namtinhthue = $("#namtinhthue").val();
            $machinhanh = $("#ChiNhanhCongTy").val();
            $tungay = $("#congdontungay").val();
            $denngay = $("#condondenngay").val();

            $thuegtgtkytruoc = $("#thuegtgtkytruoc").val();
            $thuedenghihoan = $("#thuedenghihoan").val();

            $thuegtgtduockhautrukynay = $("#thuegtgtduockhautrukynay").val();

            $doanhsogtgtkhautru = $("#doanhsogtgtkhautru").val();
            $thuegtgtkhautru = $("#thuegtgtkhautru").val();

            $doanhsogtgtdaura = $("#doanhsogtgtdaura").val();
            $chitietdaura = $("#chitietdsdaura").val().trim();
            $thuegtgtdaura = $("#thuegtgtdaura").val();
            $lydotanggiam = $("#lydothanggiamtokhai").val();
            $thuegtgttanggiam = $("#thuegtgttanggiam").val();

            $thuegtgtngoaitinh = $("#thuegtgtngoaitinh").val();
            $thuegtgtmuavaoduandautu = $("#thuegtgtmuavaoduandautu").val();
            $khautruhangthang = $("#khautrughangthang").prop("checked");
            $congdon = 0;
            if ($("#rd_congdonthangtonkho").prop("checked")) {
                $congdon = 1;
            }
            $ngaydb = Date.parse($congdontuthang);
            $ngaykt = Date.parse($congdondenthang);
            valid = true;
            $ThucHienKhauTru = $("#ThucHienKhauTru").prop("checked");

            $loaitokhai = $("#loaitokhai").val();
            $LoiKhaiBoSung = 0;
            if($loaitokhai==0){
                valid = valid && checkNull($( "input[name='loitokhai']:checked" ), " Lỗi do khai bổ sung ");
                $LoiKhaiBoSung = $( "input[name='loitokhai']:checked").val();
            }

            valid = valid && checkNull($("#thangtinhthue"), " Kỳ tính thuế  ");

            if (valid) {
                if ('<?php echo substr($ppkhautru, 2, 1) ?>' == 2) {// Nếu khe khai theo phương pháp trược tiếp doanh thu
                    if ($thangtinhthue != "V") {
                        $dulieutontai = false; // Dữ liệu chưa tồn tại
                        $.ajax({// Chuyển tồn kho cho năm mới
                            url: $dir_module_baocaothue + "kiemtracotontaidulieukhaithue_pptt.php",
                            data: {thangtinhthue: $thangtinhthue, loaitokhai: $loaitokhai,namtinhthue:$namtinhthue,machinhanh:$machinhanh},
                            async: false,
                            success: function (response) {
                                if (response == 1) {
                                    $dulieutontai = true;
                                }
                            }
                        });
                        $dulieukhoa = 0;
                        $.ajax({// Kiểm tra nhật ký tờ khai đã được duyệt chưa ?
                            url: $dir_module_baocaothue + "kiemtrakhaithuebikhoa_pptt.php",
                            data: {thangtinhthue: $thangtinhthue, loaitokhai: $loaitokhai,namtinhthue:$namtinhthue,machinhanh:$machinhanh},
                            async: false,
                            success: function (response) {
                                if (response == 1) {
                                    $dulieukhoa = true;
                                }
                            }
                        });

                        if ($dulieutontai == true) {
                            if ($dulieukhoa && $loaitokhai == 1) {
                                alert("CHÚ Ý.\n\nTỜ KHAI THUẾ CHÍNH THỨC NÀY ĐÃ ĐƯỢC DUYỆT. BẠN KHÔNG THỂ THAY ĐỔI TỜ KHAI NÀY.\n\nNHẤN [OK] ĐỂ XEM TỜ KHAI!");
                                $('.dialog_main_thongbao').load("form/frm_insolieu_bangke_thuegtgt_khautru_pptt.php?thangtinhthue=" + $thangtinhthue + "&loaitokhai=" + $loaitokhai+"&namtinhthue="+$namtinhthue+"&machinhanh="+$machinhanh);

                            } else {
                                var retVal = confirm("Tờ kê khai thuế GTGT này đã có . Bạn có muốn ghi đè không ?");
                                if (retVal == true) {
                                    $.confirm({
                                        title: 'Cập nhật thành công',
                                        type: 'green',
                                        autoClose: 'OK|1000',
                                        content: function () {
                                            var self = this;
                                            return $.ajax({
                                                url: $dir_module_baocaothue + "themtokhaithue_pptt.php?thuedenghihoan=" + $thuedenghihoan + "&doanhsogtgtkhautru=" + $doanhsogtgtkhautru + "&thuegtgtkhautru=" + $thuegtgtkhautru + "&doanhsogtgtdaura=" + $doanhsogtgtdaura + "&thuegtgtdaura=" + $thuegtgtdaura + "&thuegtgtngoaitinh=" + $thuegtgtngoaitinh + "&thuegtgtmuavaoduandautu=" + $thuegtgtmuavaoduandautu + "&thangtinhthue=" + $thangtinhthue + "&thuegtgtkytruoc=" + $thuegtgtkytruoc + "&loaitokhai=" + $loaitokhai + "&khautruhangthang=" + $khautruhangthang + "&thuegtgtduockhautrukynay=" + $thuegtgtduockhautrukynay + "&lydotanggiam=" + $lydotanggiam + "&chitietdaura=" + $chitietdaura+ "&thuegtgttanggiam=" + $thuegtgttanggiam+"&namtinhthue="+$namtinhthue+"&loikhaibosung="+$LoiKhaiBoSung+"&machinhanh="+$machinhanh+"&dulieukhoa="+$dulieukhoa+"&ThucHienKhauTru="+$ThucHienKhauTru,
                                                success: function (result) {
                                                    if (result.trim() == 1) {
                                                        alert("CẢNH BÁO! \n\nTỔNG DOANH THU BÁN RA TRÊN TỜ KHAI KHÔNG KHỚP VỚI DOANH THU BÁN HÀNG VÀ CUNG CẤP DỊCH VỤ TRÊN SỔ CHI TIẾT.");
                                                    }
                                                }
                                            });
                                        },
                                        buttons: {
                                            "OK": {
                                                keys: ['Y'], action: function () {
                                                    $('.dialog_main_thongbao').load("form/frm_insolieu_bangke_thuegtgt_khautru_pptt.php?thangtinhthue=" + $thangtinhthue + "&loaitokhai=" + $loaitokhai+"&namtinhthue="+$namtinhthue+"&machinhanh="+$machinhanh);
                                                }
                                            }
                                        }
                                    });
                                } else {
                                    $('.dialog_main_thongbao').load("form/frm_insolieu_bangke_thuegtgt_khautru_pptt.php?thangtinhthue=" + $thangtinhthue + "&loaitokhai=" + $loaitokhai+"&namtinhthue="+$namtinhthue+"&machinhanh="+$machinhanh);
                                }

                            }
                        } else {
                            $.confirm({
                                title: 'Cập nhật thành công',
                                type: 'green',
                                autoClose: 'OK|1000',
                                content: function () {
                                    var self = this;
                                    return $.ajax({
                                        url: $dir_module_baocaothue + "themtokhaithue_pptt.php?thuedenghihoan=" + $thuedenghihoan + "&doanhsogtgtkhautru=" + $doanhsogtgtkhautru + "&doanhsogtgtdaura=" + $doanhsogtgtdaura + "&thuegtgtdaura=" + $thuegtgtdaura + "&thuegtgtngoaitinh=" + $thuegtgtngoaitinh + "&thuegtgtmuavaoduandautu=" + $thuegtgtmuavaoduandautu + "&thangtinhthue=" + $thangtinhthue + "&thuegtgtkytruoc=" + $thuegtgtkytruoc + "&loaitokhai=" + $loaitokhai + "&lydotanggiam=" + $lydotanggiam + "&chitietdaura=" + $chitietdaura+ "&thuegtgttanggiam=" + $thuegtgttanggiam+"&namtinhthue="+$namtinhthue+"&loikhaibosung="+$LoiKhaiBoSung+"&machinhanh="+$machinhanh+"&dulieukhoa="+$dulieukhoa+"&ThucHienKhauTru="+$ThucHienKhauTru,
                                        success: function (result) {
                                        }
                                    });
                                },
                                buttons: {
                                    "OK": {
                                        keys: ['Y'], action: function () {
                                            $('.dialog_main_thongbao').load("form/frm_insolieu_bangke_thuegtgt_khautru_pptt.php?thangtinhthue=" + $thangtinhthue + "&loaitokhai=" + $loaitokhai+"&namtinhthue="+$namtinhthue+"&machinhanh="+$machinhanh);
                                        }
                                    }
                                }
                            });
                        }
                    }
                }else{
                if ($thangtinhthue != "V") {
                    $dulieutontai = false; // Dữ liệu chưa tồn tại
                    $.ajax({// Chuyển tồn kho cho năm mới
                        url: $dir_module_baocaothue + "kiemtracotontaidulieukhaithue.php",
                        data: {thangtinhthue: $thangtinhthue, loaitokhai: $loaitokhai,namtinhthue:$namtinhthue,machinhanh:$machinhanh},
                        async: false,
                        success: function (response) {
                            if (response == 1) {
                                $dulieutontai = true;
                            }
                        }
                    });
                    $dulieukhoa = 0;
                    $.ajax({// Chuyển tồn kho cho năm mới
                        url: $dir_module_baocaothue + "kiemtrakhaithuebikhoa.php",
                        data: {thangtinhthue: $thangtinhthue, loaitokhai: $loaitokhai,namtinhthue:$namtinhthue,machinhanh:$machinhanh},
                        async: false,
                        success: function (response) {
                            if (response == 1) {
                                $dulieukhoa = true;
                            }
                        }
                    });

                    if ($dulieutontai == true) {
                        if ($dulieukhoa && $loaitokhai == 1) {
                            alert("CHÚ Ý.\n\nTỜ KHAI THUẾ CHÍNH THỨC NÀY ĐÃ ĐƯỢC DUYỆT. BẠN KHÔNG THỂ THAY ĐỔI TỜ KHAI NÀY.\n\nNHẤN [OK] ĐỂ XEM TỜ KHAI!");
                            $('.dialog_main_thongbao').load("form/frm_insolieu_bangke_thuegtgt_khautru.php?thangtinhthue=" + $thangtinhthue + "&loaitokhai=" + $loaitokhai+"&namtinhthue="+$namtinhthue+"&machinhanh="+$machinhanh);

                        } else {
                            var retVal = confirm("Tờ kê khai thuế GTGT này đã có . Bạn có muốn ghi đè không ?");
                            if (retVal == true) {
                                $.confirm({
                                    title: 'Cập nhật thành công',
                                    type: 'green',
                                    autoClose: 'OK|1000',
                                    content: function () {
                                        var self = this;
                                        return $.ajax({
                                            url: $dir_module_baocaothue + "themtokhaithue.php?thuedenghihoan=" + $thuedenghihoan + "&doanhsogtgtkhautru=" + $doanhsogtgtkhautru + "&thuegtgtkhautru=" + $thuegtgtkhautru + "&doanhsogtgtdaura=" + $doanhsogtgtdaura + "&thuegtgtdaura=" + $thuegtgtdaura + "&thuegtgtngoaitinh=" + $thuegtgtngoaitinh + "&thuegtgtmuavaoduandautu=" + $thuegtgtmuavaoduandautu + "&thangtinhthue=" + $thangtinhthue + "&thuegtgtkytruoc=" + $thuegtgtkytruoc + "&loaitokhai=" + $loaitokhai + "&khautruhangthang=" + $khautruhangthang + "&thuegtgtduockhautrukynay=" + $thuegtgtduockhautrukynay + "&lydotanggiam=" + $lydotanggiam + "&chitietdaura=" + $chitietdaura+ "&thuegtgttanggiam=" + $thuegtgttanggiam+"&namtinhthue="+$namtinhthue+"&loikhaibosung="+$LoiKhaiBoSung+"&machinhanh="+$machinhanh+"&dulieukhoa="+$dulieukhoa+"&ThucHienKhauTru="+$ThucHienKhauTru,
                                            success: function (result) {
                                                if (result.trim() == 1) {
                                                    alert("CẢNH BÁO! \n\nTỔNG DOANH THU BÁN RA TRÊN TỜ KHAI KHÔNG KHỚP VỚI DOANH THU BÁN HÀNG VÀ CUNG CẤP DỊCH VỤ TRÊN SỔ CHI TIẾT.");
                                                }
                                            }
                                        });
                                    },
                                    buttons: {
                                        "OK": {
                                            keys: ['Y'], action: function () {
                                                $('.dialog_main_thongbao').load("form/frm_insolieu_bangke_thuegtgt_khautru.php?thangtinhthue=" + $thangtinhthue + "&loaitokhai=" + $loaitokhai+"&namtinhthue="+$namtinhthue+"&machinhanh="+$machinhanh);
                                            }
                                        }
                                    }
                                });
                            } else {
                                $('.dialog_main_thongbao').load("form/frm_insolieu_bangke_thuegtgt_khautru.php?thangtinhthue=" + $thangtinhthue + "&loaitokhai=" + $loaitokhai+"&namtinhthue="+$namtinhthue+"&machinhanh="+$machinhanh);
                            }

                        }
                    } else {
                        $.confirm({
                            title: 'Cập nhật thành công',
                            type: 'green',
                            autoClose: 'OK|1000',
                            content: function () {
                                var self = this;
                                return $.ajax({
                                    url: $dir_module_baocaothue + "themtokhaithue.php?thuedenghihoan=" + $thuedenghihoan + "&doanhsogtgtkhautru=" + $doanhsogtgtkhautru + "&doanhsogtgtdaura=" + $doanhsogtgtdaura + "&thuegtgtdaura=" + $thuegtgtdaura + "&thuegtgtngoaitinh=" + $thuegtgtngoaitinh + "&thuegtgtmuavaoduandautu=" + $thuegtgtmuavaoduandautu + "&thangtinhthue=" + $thangtinhthue + "&thuegtgtkytruoc=" + $thuegtgtkytruoc + "&loaitokhai=" + $loaitokhai + "&lydotanggiam=" + $lydotanggiam + "&chitietdaura=" + $chitietdaura+ "&thuegtgttanggiam=" + $thuegtgttanggiam+"&namtinhthue="+$namtinhthue+"&loikhaibosung="+$LoiKhaiBoSung+"&machinhanh="+$machinhanh+"&dulieukhoa="+$dulieukhoa+"&ThucHienKhauTru="+$ThucHienKhauTru,
                                    success: function (result) {
                                    }
                                });
                            },
                            buttons: {
                                "OK": {
                                    keys: ['Y'], action: function () {
                                        $('.dialog_main_thongbao').load("form/frm_insolieu_bangke_thuegtgt_khautru.php?thangtinhthue=" + $thangtinhthue + "&loaitokhai=" + $loaitokhai+"&namtinhthue="+$namtinhthue+"&machinhanh="+$machinhanh);
                                    }
                                }
                            }
                        });
                    }
                } else {
                    alert("Chức năng này chưa hoạt động !");
                }
            }
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
        function getThongTinDauKySauKhiMoForm() {

            $thangtinhthue = $("#thangtinhthue").val();
            $namtinhthue = $("#namtinhthue").val();
            $loaitokhai = $("#loaitokhai").val();
            $machinhanh = $("#ChiNhanhCongTy").val();
            $datakt = "";
            $.ajax({// Thêm dữ liệu vào tokhaithue
                url: $dir_module_baocaothue + "laythonggtgtkytruoc.php?thangtinhthue=" + $thangtinhthue + "&loaitokhai=1&namtinhthue="+$namtinhthue+"&machinhanh="+$machinhanh,
                async: false,
                success: function (response) {
                    if (response != 0) {
                        $datakt = $.parseJSON(response);
                        $("#thuegtgtkytruoc").val(FormatNumber($datakt.VI42.thue));
                    } else {
                        alert_f("Chú ý", "", "red", "Thuế GTGT kỳ trước không tồn tại !");
                        $("#thuegtgtkytruoc").val("");
                    }
                }
            });
            $data = "";
            $.ajax({// Thêm dữ liệu vào tokhaithue
                url: $dir_module_baocaothue + "laythongtininphieukekhaithue_json.php?thangtinhthue=" + $thangtinhthue + "&loaitokhai=" + $loaitokhai+"&namtinhthue="+$namtinhthue+"&machinhanh="+$machinhanh,
                async: false,
                success: function (response) {
                    if (response != 0) {
                        try {
                            $data = $.parseJSON(response);
                            $("#thuedenghihoan").val(FormatNumber($data.VI41.thue));
                            $("#thuegtgtngoaitinh").val(FormatNumber($data.V.thue));
                            $("#thuegtgtmuavaoduandautu").val(FormatNumber($data.VI2.thue));
                            if ($data.I1.thue == $data.I2.thue) {
                                $("#thuegtgtduockhautrukynay").val("");
                            } else {
                                $("#thuegtgtduockhautrukynay").val(FormatNumber($data.I2.thue));
                            }
                            try{
                                $("#lydothanggiamtokhai").val($data.LDTG.lydotanggiam);
                            }catch (e) {
                                $("#lydothanggiamtokhai").val("");
                            }

                            try{
                                $("#chitietdsdaura").val($data.CTBR.chitietdsbr);
                            }catch (e) {
                                $("#chitietdsdaura").val("");
                            }

                            $thuedaura = parseFloat($data.VI112.thue);
                            $doanhthudaura = parseFloat($data.VI112.gthh);

                            $thuekhautru = parseFloat($data.VI111.thue);
                            $doanhthukhautru = parseFloat($data.VI111.gthh);

                            $("#doanhsogtgtdaura").val(($.number($doanhthudaura, 0, ".", ",")));
                            $("#thuegtgtdaura").val($.number($thuedaura, 0, ".", ","));

                            $("#doanhsogtgtkhautru").val(($.number($doanhthukhautru, 0, ".", ",")));
                            $("#thuegtgtkhautru").val($.number($thuekhautru, 0, ".", ","));
                        } catch (err) {
                            $data = $.parseJSON(response);

                            $thuedaura = parseFloat($data.IV2.thue);
                            $doanhthudaura = parseFloat($data.IV2.gthh);

                            $thuekhautru = parseFloat($data.IV1.thue);
                            $doanhthukhautru = parseFloat($data.IV1.gthh);

                            try{
                                $("#lydothanggiamtokhai").val($data.LDTG.lydotanggiam);
                            }catch (e) {
                                $("#lydothanggiamtokhai").val("");
                            }

                            try{
                                $("#chitietdsdaura").val($data.CTBR.chitietdsbr);
                            }catch (e) {
                                $("#chitietdsdaura").val("");
                            }

                            $("#doanhsogtgtdaura").val(($.number($doanhthudaura, 0, ".", ",")));
                            $("#thuegtgtdaura").val($.number($thuedaura, 0, ".", ","));

                            $("#doanhsogtgtkhautru").val(($.number($doanhthukhautru, 0, ".", ",")));
                            $("#thuegtgtkhautru").val($.number($thuekhautru, 0, ".", ","));
                        }
                    } else {
                        $("#thuedenghihoan").val("");
                        $("#thuegtgtngoaitinh").val("");
                        $("#thuegtgtmuavaoduandautu").val("");

                        $("#doanhsogtgtdaura").val("");
                        $("#thuegtgtdaura").val("");

                        $("#doanhsogtgtkhautru").val("");
                        $("#thuegtgtkhautru").val("");

                        $("#thuegtgtduockhautrukynay").val("");
                        $("#lydothanggiamtokhai").val("");
                        $("#chitietdsdaura").val("");
                    }
                }
            });
        }

        //--------------------------------
        var isOpen = $("#dialog-bangke_thue_gtgt").dialog("isOpen");
        if (isOpen) {
            //getThongTinDauKySauKhiMoForm();
        }
    })
    ;
</script>