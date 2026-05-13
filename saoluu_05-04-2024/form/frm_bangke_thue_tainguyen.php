<?php
require("../config.php");
$ppkhautru = 1;
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


</style>
<div id="dialog-bangke_thue_gtgt" title="Tờ khai thuế tài nguyên ">
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
                            <option selected value="">-- CHỌN--</option>
                            <?php
                            if ($ppkhautru == 1) {
                                for ($i = 1; $i <= 12; $i++) {
                                    $select = "";
                                    if ($i == $cur_thang)
                                        $select = "selected";
                                    ?>
                                    <option <?php echo $select; ?>
                                            value="<?php echo $i; ?>"><?php echo "Tháng " . $i; ?></option>
                                    <?php
                                }
                            } else {
                                ?>
                                }
                                <option value="I">Quý 1</option>
                                <option value="II">Quý 2</option>
                                <option value="III">Quý 3</option>
                                <option value="IV">Quý 4</option>
                                <option value="V">Cả năm</option>
                                <?php
                            }
                            ?>
                        </select>
                    </td>
                    <td>&nbsp;&nbsp;&nbsp;Loại tờ khai</td>
                    <td><select name="loaitokhai" id="loaitokhai" style="height:20px;">
                            <option value="1">Khai lần 1</option>
                            <option value="0">Khai bổ sung</option>
                        </select></td>
                </tr>
            </table>
        </fieldset>
        <fieldset style="background-color: #afd9ee;">
            <legend>Thiết lập số liệu</legend>
            <table style="font-size: 14px" border="1" width="100%">
                <tr>
                    <th style="text-align: center" rowspan="2">STT</th>
                    <th style="text-align: center" rowspan="2">Loại tài nguyên</th>
                    <th style="text-align: center" colspan="2">Số lượng tài nguyên</th>
                    <th style="text-align: center" rowspan="2">Giá tính thuế</th>
                    <th style="text-align: center" rowspan="2">Thuế suất</th>
                    <th style="text-align: center" rowspan="2">Mức thuế ấn định</th>
                    <th style="text-align: center" rowspan="2">Số thuế PS trong kỳ</th>
                    <th style="text-align: center" rowspan="2">Số thuế miễn giảm</th>
                    <th style="text-align: center" rowspan="2">Số thuế phải nộp trong kỳ</th>
                </tr>
                <tr style="text-align: center">
                    <th style="text-align: center" >ĐVT</th>
                    <th style="text-align: center">Sản lượng</th>
                </tr>
                <tr>
                    <td style="text-align: center;width: 50px;" >(1)</td>
                    <td style="text-align: center;width: 350px;" >(2)</td>
                    <td style="text-align: center;width: 70px;" >(3)</td>
                    <td style="text-align: center;width: 100px;" >(4)</td>
                    <td style="text-align: center;width: 100px;" >(5)</td>
                    <td style="text-align: center;width: 50px;" >(6)</td>
                    <td style="text-align: center;width: 150px;" >(7)</td>
                    <td style="text-align: center;width: 150px;" >(8)=(4)X(5)x(6) hoặc (8)=(4)x(7)</td>
                    <td style="text-align: center;width: 150px;" >(9)</td>
                    <td style="text-align: center;width: 150px;" >(10)=(8)X(9)</td>
                </tr>
                <tr>
                    <th style="text-align: center;" >I</th>
                    <th style="text-align: left;" >Khoán sản do cơ sở tự khai thác:</th>
                    <th style="text-align: center;" ></th>
                    <th style="text-align: center;" ></th>
                    <th style="text-align: center;" ></th>
                    <th style="text-align: center;" ></th>
                    <th style="text-align: center;" ></th>
                    <th style="text-align: center;" ></th>
                    <th style="text-align: center;" ></th>
                    <th style="text-align: center;" ></th>
                </tr>
                <tr>
                    <td style="text-align: center;" >1</td>
                    <td style="text-align: left;" ><select id="loaitainguyentukhaithac" style="width: 100%">
                            <option value="0000"></option>
                            <option value="0001">Cát vàng</option>
                            <option value="0002">Cát trắng</option>
                            <option value="0003">Cát loại cát khác</option>
                            <option value="0004">Cát vàng (tận thu)</option>
                            <option value="0005">Cát trắng (tận thu)</option>
                            <option value="0006">Cát loại cát khác (tận thu)</option>
                            <option value="0007">Đất khai thác để san lấp, xây dựng công trình</option>
                        </select></td>
                    <td style="text-align: center;" ><select id="dvt" style="width: 100%">
                            <option value="0001">M3</option>
                        </select></td>
                    <td style="text-align: center;" ><input style="width: 100%;text-align: right" type="text" onkeyup="return format_munber(this.value,'#soluongtukhaithac')" name="soluongtukhaithac" id="soluongtukhaithac"></td>
                    <td style="text-align: center;" ><input style="width: 100%;text-align: right" type="text" onkeyup="return format_munber(this.value,'#mucphitukhaithac')" name="mucphitukhaithac" id="mucphitukhaithac"></td>
                    <td style="text-align: center;" ><input style="width: 100%;text-align: right" type="text" name="thuesuat" id="thuesuat"></td>
                    <td style="text-align: center;" ><input style="width: 100%;text-align: right" type="text" onkeyup="return format_munber(this.value,'#mucthueandinh')" name="mucthueandinh" id="mucthueandinh"></td>
                    <td style="text-align: center;" ><input style="width: 100%;text-align: right" readonly="true" type="text" onkeyup="return format_munber(this.value,'#thuepstrongky')"  name="thuepstrongky" id="thuepstrongky"></td>
                    <td style="text-align: center;" ><input style="width: 100%;text-align: right" type="text" onkeyup="return format_munber(this.value,'#thuemiengiam')"  name="thuemiengiam" id="thuemiengiam"></td>
                    <td style="text-align: center;" ><input style="width: 100%;text-align: right" readonly="true" type="text" onkeyup="return format_munber(this.value,'#thanhtientukhaithac')"  name="thanhtientukhaithac" id="thanhtientukhaithac"></td>
                </tr>

            </table>
        </fieldset>
    </form>
</div>

<script>
    $height = 300;
    $width = 1000;
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

        $("#thietlapcachtinhsolieu").click(function () {
                $('.dialog_main_thietlap_tokhai_phuluc').load("form/frm_thietlap_tokhai_phibvmt.php");
        });

        $("#dialog-bangke_thue_gtgt").dialog({
            open: function (event, ui) {            }
        });

///-------------------------Di chuyễn các phần tử bằng enter----------------

        function TinhSoThueTNPhaiNop(){
            $soluong = $("#soluongtukhaithac").val().trim().replace(/,/gi, "");
            $dongia = $("#mucphitukhaithac").val().trim().replace(/,/gi, "");
            $thuemiengiam = $("#thuemiengiam").val().trim().replace(/,/gi, "");
            $ThueSuat = $("#thuesuat").val().trim().replace(/,/gi, "");
            $ThuePSTrongKy = Math.round(($soluong*$dongia)*($ThueSuat/100));
            $("#thuepstrongky").val($.number($ThuePSTrongKy,0,".",","));
            $ThuePhaiNop = $ThuePSTrongKy-$thuemiengiam;
            $("#thanhtientukhaithac").val($.number($ThuePhaiNop,0,".",","));
        }
        $("#soluongtukhaithac").keyup(function (event) {// Gọi table mã nội dung để chọn
            TinhSoThueTNPhaiNop();
        })
        $("#mucphitukhaithac").keyup(function (event) {// Gọi table mã nội dung để chọn
            TinhSoThueTNPhaiNop();
        })
        $("#thuesuat").keyup(function (event) {// Gọi table mã nội dung để chọn
            TinhSoThueTNPhaiNop();
        })

        $("#thuemiengiam").keyup(function (event) {// Gọi table mã nội dung để chọn
            TinhSoThueTNPhaiNop();
        })


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

        $("#namtinhthue").change(function () {
            $namtinhthue = $("#namtinhthue").val();
            $.ajax({// Thêm dữ liệu vào tokhaithue
                url: $dir_module_baocaothue + "laythangcuanam.php?namtinhthue="+$namtinhthue,
                async: false,
                success: function (response) {
                    $("#thangtinhthue").html(response);
                }
            });
        });

        $("#thangtinhthue").change(function () {
            $thangtinhthue = $("#thangtinhthue").val();
            $namtinhthue = $("#namtinhthue").val();
            $loaitokhai = $("#loaitokhai").val();
            if ($loaitokhai == 1) {//// Tờ khai chính thức
                $datakt = "";
                $data = "";
                $.ajax({// Thêm dữ liệu vào tokhaithue
                    url: $dir_module_baocaothue + "laythongtininphieukekhaithue_tn_json.php?thangtinhthue=" + $thangtinhthue + "&loaitokhai=" + $loaitokhai+"&namtinhthue="+$namtinhthue,
                    async: false,
                    success: function (response) {
                        if (response != 0) {
                            $data = $.parseJSON(response);
                            $("#soluongtukhaithac").val(FormatNumber($data.I.soluong));
                            $("#mucphitukhaithac").val(FormatNumber($data.I.mucphi));
                            $("#thanhtientukhaithac").val(FormatNumber($data.I.thanhtien));
                            $("#loaitainguyentukhaithac").val(($data.I.loaiks));
                            $("#dvt").val(($data.I.dvt));

                            $("#thuesuat").val(FormatNumber($data.I.thuesuat));
                            $("#mucthueandinh").val(FormatNumber($data.I.thueandinh));
                            $("#thuepstrongky").val(FormatNumber($data.I.thuephatsinh));
                            $("#thuemiengiam").val(FormatNumber($data.I.thuegiam));

                        } else {
                            $("#soluongtukhaithac").val("");
                            $("#mucphitukhaithac").val("");
                            $("#thanhtientukhaithac").val("");
                            $("#loaitainguyentukhaithac").val("");
                            $("#dvt").val("");
                            $("#thuesuat").val("");
                            $("#mucthueandinh").val("");
                            $("#thuepstrongky").val("");
                            $("#thuemiengiam").val("");
                            alert("Tờ khai thuế không tồn tại");
                        }
                    }
                });
            } else {

                $data = "";
                $.ajax({// Thêm dữ liệu vào tokhaithue
                    url: $dir_module_baocaothue + "laythongtininphieukekhaithue_tn_json.php?thangtinhthue=" + $thangtinhthue + "&loaitokhai=" + $loaitokhai+"&namtinhthue="+$namtinhthue,
                    async: false,
                    success: function (response) {
                        if (response != 0) {
                            $data = $.parseJSON(response);
                            $("#soluongtukhaithac").val(FormatNumber($data.I.soluong));
                            $("#mucphitukhaithac").val(FormatNumber($data.I.mucphi));
                            $("#thanhtientukhaithac").val(FormatNumber($data.I.thanhtien));
                            $("#loaitainguyentukhaithac").val(($data.I.loaiks));
                            $("#dvt").val(($data.I.dvt));
                            $("#thuesuat").val(FormatNumber($data.I.thuesuat));
                            $("#mucthueandinh").val(FormatNumber($data.I.thueandinh));
                            $("#thuepstrongky").val(FormatNumber($data.I.thuephatsinh));
                            $("#thuemiengiam").val(FormatNumber($data.I.thuegiam));

                        } else {
                            $("#soluongtukhaithac").val("");
                            $("#mucphitukhaithac").val("");
                            $("#thanhtientukhaithac").val("");
                            $("#loaitainguyentukhaithac").val("");
                            $("#dvt").val("");
                            $("#thuesuat").val("");
                            $("#mucthueandinh").val("");
                            $("#thuepstrongky").val("");
                            $("#thuemiengiam").val("");
                            alert("Tờ khai thuế không tồn tại");
                        }
                    }
                });
            }
        });

        $("#loaitokhai").change(function () {
            $thangtinhthue = $("#thangtinhthue").val();
            $namtinhthue = $("#namtinhthue").val();
            $loaitokhai = $("#loaitokhai").val();
            if ($loaitokhai == 1) {//// Tờ khai chính thức
                $datakt = "";
                $data = "";
                $.ajax({// Thêm dữ liệu vào tokhaithue
                    url: $dir_module_baocaothue + "laythongtininphieukekhaithue_tn_json.php?thangtinhthue=" + $thangtinhthue + "&loaitokhai=" + $loaitokhai+"&namtinhthue="+$namtinhthue,
                    async: false,
                    success: function (response) {
                        if (response != 0) {
                            $data = $.parseJSON(response);
                            $("#soluongtukhaithac").val(FormatNumber($data.I.soluong));
                            $("#mucphitukhaithac").val(FormatNumber($data.I.mucphi));
                            $("#thanhtientukhaithac").val(FormatNumber($data.I.thanhtien));
                            $("#loaitainguyentukhaithac").val(($data.I.loaiks));
                            $("#dvt").val(($data.I.dvt));
                            $("#thuesuat").val(FormatNumber($data.I.thuesuat));
                            $("#mucthueandinh").val(FormatNumber($data.I.thueandinh));
                            $("#thuepstrongky").val(FormatNumber($data.I.thuephatsinh));
                            $("#thuemiengiam").val(FormatNumber($data.I.thuegiam));

                        } else {
                            $("#soluongtukhaithac").val("");
                            $("#mucphitukhaithac").val("");
                            $("#thanhtientukhaithac").val("");
                            $("#loaitainguyentukhaithac").val("");
                            $("#dvt").val("");
                            $("#thuesuat").val("");
                            $("#mucthueandinh").val("");
                            $("#thuepstrongky").val("");
                            $("#thuemiengiam").val("");
                            alert("Tờ khai thuế không tồn tại");
                        }
                    }
                });
            } else {

                $data = "";
                $.ajax({// Thêm dữ liệu vào tokhaithue
                    url: $dir_module_baocaothue + "laythongtininphieukekhaithue_tn_json.php?thangtinhthue=" + $thangtinhthue + "&loaitokhai=" + $loaitokhai+"&namtinhthue="+$namtinhthue,
                    async: false,
                    success: function (response) {
                        if (response != 0) {
                            $data = $.parseJSON(response);
                            $("#soluongtukhaithac").val(FormatNumber($data.I.soluong));
                            $("#mucphitukhaithac").val(FormatNumber($data.I.mucphi));
                            $("#thanhtientukhaithac").val(FormatNumber($data.I.thanhtien));
                            $("#loaitainguyentukhaithac").val(($data.I.loaiks));
                            $("#dvt").val(($data.I.dvt));
                            $("#thuesuat").val(FormatNumber($data.I.thuesuat));
                            $("#mucthueandinh").val(FormatNumber($data.I.thueandinh));
                            $("#thuepstrongky").val(FormatNumber($data.I.thuephatsinh));
                            $("#thuemiengiam").val(FormatNumber($data.I.thuegiam));

                        } else {
                            $("#soluongtukhaithac").val("");
                            $("#mucphitukhaithac").val("");
                            $("#thanhtientukhaithac").val("");
                            $("#loaitainguyentukhaithac").val("");
                            $("#dvt").val("");
                            $("#thuesuat").val("");
                            $("#mucthueandinh").val("");
                            $("#thuepstrongky").val("");
                            $("#thuemiengiam").val("");
                            alert("Tờ khai thuế không tồn tại");
                        }
                    }
                });
            }
        });

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


            $thangtinhthue = $("#thangtinhthue").val();
            $namtinhthue = $("#namtinhthue").val();

            $loaiks = $("#loaitainguyentukhaithac").val();
            $maloaiks = "I";
            $dvt = $("#dvt").val();
            $tendvt = $("#dvt option:selected").text();
            $tenloai = $("#loaitainguyentukhaithac option:selected").text();
            $soluong = $("#soluongtukhaithac").val();
            $mucphi = $("#mucphitukhaithac").val();
            $thanhtien = $("#thanhtientukhaithac").val();
            $loaitokhai = $("#loaitokhai").val();

            $thuesuat = $("#thuesuat").val();
            $mucthueandinh = $("#mucthueandinh").val();
            $thuepstrongky = $("#thuepstrongky").val();
            $thuemiengiam = $("#thuemiengiam").val();

            valid = true;
            valid = valid && checkNull($("#thangtinhthue"), " Kỳ khai thuế ");

            if (valid) {

                $dulieutontai = false; // Dữ liệu chưa tồn tại
                $.ajax({// Chuyển tồn kho cho năm mới
                    url: $dir_module_baocaothue + "kiemtracotontaidulieukhaithue_tn.php",
                    data: {namtinhthue:$namtinhthue,thangtinhthue: $thangtinhthue,loaitokhai:$loaitokhai},
                    async: false,
                    success: function (response) {
                        if (response == 1) {
                            $dulieutontai = true;
                        }
                    }
                });
                if ($dulieutontai == true) {
                    var retVal = confirm("Tờ kê khai này đã có . Bạn có muốn ghi đè không ?");
                    if (retVal == true) {
                        $.confirm({
                            title: 'Cập nhật thành công',
                            type: 'green',
                            autoClose: 'OK|1000',
                            content: function(){
                                var self = this;
                                return $.ajax({
                                    url: $dir_module_baocaothue + "themtokhaithue_tn.php?loaiks=" + $loaiks + "&dvt=" + $dvt + "&tenloai=" + $tenloai + "&soluong=" + $soluong + "&mucphi=" + $mucphi + "&thanhtien=" + $thanhtien + "&thangtinhthue=" + $thangtinhthue + "&loaitokhai="+$loaitokhai+ "&maloaiks="+$maloaiks+ "&tendvt="+$tendvt+ "&namtinhthue="+$namtinhthue+ "&thuesuat="+$thuesuat+ "&mucthueandinh="+$mucthueandinh+ "&thuepstrongky="+$thuepstrongky+ "&thuemiengiam="+$thuemiengiam,
                                    async: false,
                                });
                            },
                            buttons: {
                                "OK": {
                                    keys: ['Y'], action: function () {
                                        $('.dialog_main_thongbao').load("form/frm_insolieu_bangke_thuetn.php?thangtinhthue=" + $thangtinhthue+"&loaitokhai="+$loaitokhai+ "&namtinhthue="+$namtinhthue);
                                    }
                                }
                            }
                        });
                    } else {
                        $('.dialog_main_thongbao').load("form/frm_insolieu_bangke_thuetn.php?thangtinhthue=" + $thangtinhthue + "&loaitokhai=" + $loaitokhai+ "&namtinhthue="+$namtinhthue);
                    }
                } else {
                    $.confirm({
                        title: 'Cập nhật thành công',
                        type: 'green',
                        autoClose: 'OK|1000',
                        content: function(){
                            var self = this;
                            return $.ajax({
                                url: $dir_module_baocaothue + "themtokhaithue_tn.php?loaiks=" + $loaiks + "&dvt=" + $dvt + "&tenloai=" + $tenloai + "&soluong=" + $soluong + "&mucphi=" + $mucphi + "&thanhtien=" + $thanhtien + "&thangtinhthue=" + $thangtinhthue + "&loaitokhai="+$loaitokhai+ "&maloaiks="+$maloaiks+ "&tendvt="+$tendvt+ "&namtinhthue="+$namtinhthue+ "&thuesuat="+$thuesuat+ "&mucthueandinh="+$mucthueandinh+ "&thuepstrongky="+$thuepstrongky+ "&thuemiengiam="+$thuemiengiam,
                                async: false,
                            });
                        },
                        buttons: {
                            "OK": {
                                keys: ['Y'], action: function () {
                                    $('.dialog_main_thongbao').load("form/frm_insolieu_bangke_thuetn.php?thangtinhthue=" + $thangtinhthue + "&loaitokhai=" + $loaitokhai+ "&namtinhthue="+$namtinhthue);
                                }
                            }
                        }
                    });
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

    })
    ;
</script>