<?php
session_start();
require("../config.php");
function load_tuychon()
{
    /*
    $fp1 = @fopen($dir . "/" . 'tuychon.db', "r"); // đọc thông tin chung
    $string_info = explode(":", fgets($fp1));
    fclose($fp1);
    return ($string_info);
     */
    $OBJ = new ps_chitiet_mavattu();
    $sql = "select noidung from thongtinchung where sott = 1";
    $res = $OBJ->re_query($sql);
    $data = $OBJ->re_fetch($res);
    $string_info = explode(":",$data['noidung']);
    return ($string_info);
}
$arr_doanhnghiep = load_tuychon();

?>

<style>
    #Form-CapNhap_MatKhau label {
        margin-top: 7px;
        float: left;
        border: 0px solid red;
        width: 130px;
        display: block !important;
        font-weight: bold !important;
        font-size: 12px;
        font-family: Arial, Lucida Grande, Lucida Sans, sans-serif;
    }

    #Form-CapNhap_MatKhau input {
        float: left;
        display: block !important;
        font-weight: bold !important;
        font-size: 12px;
        font-family: Arial, Lucida Grande, Lucida Sans, sans-serif;
    }

    #Form-CapNhap_MatKhau input.text {
        float: left;
        margin-bottom: 4px !important;
        width: 100%;
        padding: .4em !important;
        font-size: 12px;
        font-family: Arial, Lucida Grande, Lucida Sans, sans-serif;
        font-weight: normal;
    }

    #Form-CapNhap_MatKhau fieldset {
        padding: 0;
        padding-top: 6px;
        border: 1px solid #7cc3f9;
        margin-top: 0px;
    }

    #Form-CapNhap_MatKhau .td-left input.text {
        float: left;
        margin-bottom: 4px !important;
        width: 60%;
        padding: .4em !important;
        font-size: 12px;
        font-family: Arial, Lucida Grande, Lucida Sans, sans-serif;
        font-weight: normal;
    }

    #Form-CapNhap_MatKhau select {
        font-size: 12px;
        font-weight: bold;
    }

    #Form-CapNhap_MatKhau h1 {
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

    .table-dialog {
        width: 98%;
    }

    .red {
        color: red;
    }

    .table-dialog .td-left {
        width: 50%;
        padding-right: 20px;
    }

    .table-dialog .td-right {
        width: 50%;
    }

    .table-dialog .td-right input {
        float: left;
        margin-bottom: 4px !important;
        width: 65% !important;
    }

    .table-dialog .td-left input {
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
<div id="dialog-capnhat_matkhau" title="THAY ĐỔI CÁC TÙY CHỌN">
    <p class="validateTips"></p>
    <form method="post" id="Form-CapNhap_MatKhau" enctype="multipart/form-data">
        <fieldset>
            <legend><b>Thiết lập ngôn ngữ</b></legend>
            <table class="table-dialog" border="0" cellpadding="10" cellspacing="5">
                <tr>
                    <td width="120">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ngôn ngữ</td>
                    <td width="10" valign="bottom"><input type="radio" <?php if($_SESSION['NGONNGU']=="VN" ||$_SESSION['NGONNGU']=="" ){echo 'checked=checked'; } ?> name="cbngonngu" id="tiengviet"></td>
                    <td width="100"><img src="images/vni.png" width="30px"></td>
                    <td width="10" valign="bottom"><input type="radio" <?php if($_SESSION['NGONNGU']=="CN" ){echo 'checked=checked'; } ?> name="cbngonngu" id="tiengtrung"></td>
                    <td width="100"><img src="images/china.png" width="30px"></td>
                    <td width="10" valign="bottom"><input type="radio" <?php if($_SESSION['NGONNGU']=="EN" ){echo 'checked=checked'; } ?> name="cbngonngu" id="tienganh"></td>
                    <td width="100"><img src="images/eng.png" width="30px"></td>
                </tr>
            </table>
        </fieldset>
        <fieldset>
            <legend><b>Thiết lập khóa dữ liệu</b></legend>
            <table class="table-dialog" border="0" cellpadding="10" cellspacing="5">
                <tr>
                    <td width="7"><input type="checkbox" <?php if ($arr_doanhnghiep[0] == 1) echo "checked"; ?>
                                         name="chk_khoadulieu" id="chk_khoadulieu"/></td>
                    <td width="120">Khóa dữ liệu đến ngày</td>
                    <td width="100"><input value="<?php echo $arr_doanhnghiep[1] ?>" type="date" name="txt_khoadulieu"
                                           id="txt_khoadulieu" style="width:150px;;text-align:right;"/></td>
                </tr>
                <tr>
                    <td><input name="chk_hiensole" disabled="disabled" type="checkbox" id="chk_hiensole"
                               checked="checked"/></td>
                    <td>Hiện thị số lẽ</td>
                    <td><input type="number" name="txt_hienthisole" value="<?php echo $arr_doanhnghiep[2] ?>"
                               id="txt_hienthisole" min="0" max="8"
                               style="width:150px;text-align:right;margin-top:5px;"/></td>
                </tr>
                <tr>
                    <td><input type="checkbox" <?php if ($arr_doanhnghiep[5] == 1) echo "checked"; ?>
                               name="khoadulieukhiduyet" id="khoadulieukhiduyet"/></td>
                    <td colspan="2">Khóa dữ liệu khi đã duyệt hồ sơ</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td><input name="chk_khoaketoanvien" <?php if ($arr_doanhnghiep[3] == 1) echo "checked"; ?>
                               type="checkbox" id="chk_khoaketoanvien" style="margin-top:5px;"/>&nbsp;Áp dụng cho kế toán viên
                    </td>
                    <td><input name="chk_khoakhachang"
                               type="checkbox" <?php if ($arr_doanhnghiep[4] == 1) echo "checked"; ?>
                               id="chk_khoakhachang" style="margin-top:5px;"/>&nbsp;Áp dụng cho khách hàng
                    </td>
                </tr>
            </table>
            <!-- Allow form submission with keyboard without duplicating the dialog button -->
            <input type="submit" accesskey="enter" tabindex="-1" style="position:absolute; top:-1000px"/>
        </fieldset>
        <fieldset>
            <legend><b>Công nợ</b></legend>
            <table class="table-dialog" border="0" cellpadding="10" cellspacing="5">
                <tr>
                    <td width="5"><input type="checkbox" <?php if ($arr_doanhnghiep[29] == 1) echo "checked"; ?>
                                         name="butrucongno" id="butrucongno"/></td>
                    <td width="310px">Bù trừ công nợ chủ đầu tư</td>
                </tr>
            </table>
        </fieldset>
         <fieldset>
            <legend><b>Thiết lập nhập liệu</b></legend>
            <table class="table-dialog" border="0" cellpadding="10" cellspacing="5">
                <tr>
                    <td width="5"><input type="checkbox" <?php if ($arr_doanhnghiep[36] == 1) echo "checked"; ?>
                                         name="giam30thuegtgt" id="giam30thuegtgt"/></td>
                    <td width="310px">&nbsp;Giảm thuế GTGT</td>
                    <td width="5"><input type="checkbox" <?php if ($arr_doanhnghiep[37] == 1) echo "checked"; ?>
                                         name="hienthichinhanh" id="hienthichinhanh"/></td>
                    <td width="310px">&nbsp;Chi nhánh công ty</td>
                </tr>
                <tr>
                    <td width="5"><input type="checkbox" <?php if ($arr_doanhnghiep[38] == 1) echo "checked"; ?>
                                         name="ngoaite" id="ngoaite"/></td>
                    <td width="310px">&nbsp;Ngoại tệ</td>
                    <td width="5"><input type="checkbox" <?php if ($arr_doanhnghiep[39] == 1) echo "checked"; ?>
                                         name="duandautu" id="duandautu"/></td>
                    <td width="310px">&nbsp;Dự án đầu tư</td>
                </tr>
                <tr>
                    <td width="5"><input type="checkbox" <?php if ($arr_doanhnghiep[40] == 1) echo "checked"; ?>
                                         name="phanloaihanghoa" id="phanloaihanghoa"/></td>
                    <td width="310px">&nbsp;Phân loại hàng hoá đầu vào</td>
                    <td width="5"><input type="checkbox" <?php if ($arr_doanhnghiep[41] == 1) echo "checked"; ?>
                                         name="chungtuthamchieu" id="chungtuthamchieu"/></td>
                    <td width="310px">&nbsp;Chứng từ tham chiếu</td>
                </tr>
            </table>
        </fieldset>
        <fieldset>
            <legend><b>Định dạng số phiếu</b></legend>
            <table class="table-dialog" border="0" cellpadding="10" cellspacing="5">
                <tr>
                    <td width="5"><input type="checkbox" <?php if ($arr_doanhnghiep[30] == 1) echo "checked"; ?>
                                         name="dinhdangsophieu" id="dinhdangsophieu"/></td>
                    <td width="310px">Số phiếu theo định dạng số tự nhiên</td>
                </tr>
                <tr>
                    <td width="5"><input type="checkbox" <?php if ($arr_doanhnghiep[35] == 1) echo "checked"; ?>
                                         name="tudongtinhdongia" id="tudongtinhdongia"/></td>
                    <td width="310px">Tự động tính đơn giá nhập xuất kho</td>
                </tr>
            </table>
        </fieldset>
        <fieldset>
            <legend><b>Phương pháp tồn kho</b></legend>
            <table class="table-dialog" border="0" cellpadding="10" cellspacing="5">
                <tr>
                    <td width="10px"></td>
                    <td width="130px">Phương pháp tồn kho</td>
                    <td width="180px">
                        <select id="phuongphaptonkho" style="height: 20px;width: 100%;">
                            <option <?php if($_SESSION['phuongphaptonkho']=="1"){echo 'selected=selected'; } ?> value="1">Bình quân tháng</option>
                            <option <?php if($_SESSION['phuongphaptonkho']=="2"){echo 'selected=selected'; } ?> value="2">Bình quân liên hoàn</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><input type="checkbox" <?php if ($_SESSION['capnhatgiavontucthoi'] == 1) echo "checked"; ?>
                               name="capnhatgiavontucthoi" id="capnhatgiavontucthoi"/></td>
                    <td width="130px">
                        Cập nhật giá tự động
                    </td>
                    <td width="180px"></td>
                </tr>
            </table>
        </fieldset>
        <fieldset>
            <legend><b>Loại hình doanh nghiệp</b></legend>
            <table class="table-dialog" border="0" cellpadding="10" cellspacing="5">
                <tr>
                    <td width="5"><input type="radio" name="checkboxdoanhnghiep" id="doanhnghieplon" <?php if($_SESSION['loaihinhdoanhnghiep']=="lon"){echo 'checked=checked'; } ?>
                                         style="margin-top: 4px;"></td>
                    <td width="130">Doanh nghiệp lớn</td>
                    <td width="180"><select id="thongtudoanhnghieplon"  disabled="disabled"
                                            style="height: 20px;width: 100%;">
                            <option value="">---------- Chọn thông tư ----------</option>
                            <option <?php if($_SESSION['theothongtu']=="tt200"){echo 'selected=selected'; } ?> value="tt200">Theo thông tư 200 - Ngày 22/12/2014</option>
                        </select></td>
                </tr>
                <tr>
                    <td><input name="checkboxdoanhnghiep" type="radio" id="doanhnghiepvuavanho" style="margin-top: 4px;"  <?php if($_SESSION['loaihinhdoanhnghiep']=="nho"){echo 'checked=checked'; } ?>
                        ></td>
                    <td>Doanh nghiệp vừa và nhỏ</td>
                    <td><select id="thongtudoanhnghiepvuavanho" style="height: 20px;width: 100%;">
                            <option value="">---------- Chọn thông tư ----------</option>
                            <option <?php if($_SESSION['theothongtu']=="tt133"){echo 'selected=selected'; } ?> value="tt133">Theo thông tư 133 - Ngày 26/08/2016</option>
                        </select></td>
                </tr>
                <tr>
                    <td><input type="radio" name="checkboxdoanhnghiep" id="doanhnghiepsieunho"  <?php if($_SESSION['loaihinhdoanhnghiep']=="sieunho"){echo 'checked=checked'; } ?> style="margin-top: 4px;">
                    </td>
                    <td>Hộ kinh doanh</td>
                    <td><select id="thongtudoanhnghiepsieunho" disabled="disabled" style="height: 20px;width: 100%;">
                            <option value="">---------- Chọn thông tư ----------</option>
                            <option <?php if($_SESSION['theothongtu']=="tt40"){echo 'selected=selected'; } ?> value="tt40">Theo thông tư 40 - Ngày 01/08/2021</option>
                        </select></td>
                </tr>
            </table>
        </fieldset>
        <fieldset>
            <legend><b>Thông tin nhân sự </b></legend>
            <table class="table-dialog" border="0" cellpadding="10" cellspacing="5">
                <tr>
                    <td width="5"></td>
                    <td width="130">Giám đốc</td>
                    <td width="180"><input value="<?php echo $arr_doanhnghiep[12]; ?>" type="text" name="txttengiamdoc" id="txttengiamdoc" style="width:100%;;text-align:left;margin-top:5px;"></td>
                </tr>
                <tr>
                    <td width="5"></td>
                    <td width="130">Kế toán trưởng</td>
                    <td width="180"><input value="<?php echo $arr_doanhnghiep[13]; ?>" type="text" name="txtketoantruong" id="txtketoantruong" style="width:100%;;text-align:left;margin-top:5px;"></td>
                </tr>
                <tr>
                    <td width="5"></td>
                    <td width="130">Thủ quỹ</td>
                    <td width="180"><input value="<?php echo $arr_doanhnghiep[14]; ?>" type="text" name="txtthuquy" id="txtthuquy" style="width:100%;;text-align:left;margin-top:5px;"></td>
                </tr>
                <tr>
                    <td width="5"></td>
                    <td width="130">Người lập phiếu</td>
                    <td width="180"><input value="<?php echo $arr_doanhnghiep[15]; ?>" type="text" name="txtnguoilapphieu" id="txtnguoilapphieu" style="width:100%;;text-align:left;margin-top:5px;"></td>
                </tr>

            </table>
        </fieldset>
        <fieldset>
            <legend><b>Hóa đơn điện tử</b></legend>
            <table class="table-dialog" border="0" cellpadding="10" cellspacing="5">
                <tr>
                    <td width="5"><input type="checkbox" <?php if ($arr_doanhnghiep[8] == 1) echo "checked"; ?>
                                         name="thietlaphddt" id="thietlaphddt"/></td>
                    <td width="130">Nhà cung cấp</td>
                    <td width="180"><select id="nhacungcaphddt" style="height: 20px;width: 100%;">
                            <option value="">---------- Chọn nhà cung cấp ----------</option>
                            <option <?php if($_SESSION['nhacungcaphddt']=="viettel"){echo 'selected=selected'; } ?> value="viettel">HĐĐT VIETTEL</option>
                            <option <?php if($_SESSION['nhacungcaphddt']=="vnpt"){echo 'selected=selected'; } ?> value="vnpt">HĐĐT VNPT</option>
                            <option <?php if($_SESSION['nhacungcaphddt']=="bkav"){echo 'selected=selected'; } ?> value="bkav">HĐĐT BKAV</option>
                            <option <?php if($_SESSION['nhacungcaphddt']=="misa"){echo 'selected=selected'; } ?> value="misa">HĐĐT MISA</option>
                        </select></td>
                </tr>
                <tr>
                    <td width="5"></td>
                    <td width="130">Đường dẫn</td>
                    <td width="180"><input value="<?php echo $arr_doanhnghiep[9] ?>" type="url" name="txt_hddt_duongdan"
                                           id="txt_hddt_duongdan" style="width:100%;;text-align:left;margin-top:5px;"/></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>Tên đăng nhập</td>
                    <td><input autocomplete="off" value="<?php echo $arr_doanhnghiep[10] ?>" type="text" name="txt_hddt_tendangnhap"
                                           id="txt_hddt_tendangnhap" style="width:100%;;text-align:left;margin-top:5px;"/></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>Mật khẩu</td>
                    <td><input autocomplete="off" value="<?php echo $arr_doanhnghiep[11] ?>" type="text" name="txt_hddt_matkhau"
                                           id="txt_hddt_matkhau" style="width:100%;;text-align:left;margin-top:5px;"/></td>
                </tr>

                <tr>
                    <td>&nbsp;</td>
                    <td>Seri Token</td>
                    <td><input autocomplete="off" value="<?php echo $arr_doanhnghiep[27] ?>" type="text" name="txt_seritoken"
                               id="txt_seritoken" style="width:100%;;text-align:left;margin-top:5px;"/></td>
                </tr>

                <tr>
                    <td>&nbsp;</td>
                    <td>Partner GUID <a id="laydlmisa" title="Lấy dữ liệu từ misa" style="color: #0000CC;">Lấy DL</a></td>
                    <td><input autocomplete="off" value="<?php echo $arr_doanhnghiep[33] ?>" type="text" name="txt_PartnerGUID"
                               id="txt_PartnerGUID" style="width:100%;;text-align:left;margin-top:5px;"/></td>
                </tr>

                <tr>
                    <td>&nbsp;</td>
                    <td>Partner Token </td>
                    <td><input autocomplete="off" value="<?php echo base64_decode($arr_doanhnghiep[34]) ?>" type="text" name="txt_PartnerToken"
                               id="txt_PartnerToken" style="width:100%;;text-align:left;margin-top:5px;"/></td>
                </tr>

                <tr>
                    <td>&nbsp;</td>
                    <td>Chữ ký server</td>
                    <td><input autocomplete="off" value="<?php echo $arr_doanhnghiep[28] ?>" type="text" name="chukysodaky"
                               id="chukysodaky" style="width:100%;;text-align:left;margin-top:5px;"/></td>
                </tr>

                <tr>
                    <td>&nbsp;</td>
                    <td>Mẫu số</td>
                    <td><input autocomplete="off" value="<?php echo $arr_doanhnghiep[16] ?>" type="text" name="txt_mauhoadon"
                               id="txt_mauhoadon" style="width:100%;;text-align:left;margin-top:5px;"/></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>Ký hiệu</td>
                    <td><input autocomplete="off" value="<?php echo $arr_doanhnghiep[17] ?>" type="text" name="txt_kyhieu"
                               id="txt_kyhieu" style="width:100%;;text-align:left;margin-top:5px;"/></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>Số tài khoản</td>
                    <td><input autocomplete="off" value="<?php echo $arr_doanhnghiep[18] ?>" type="text" name="txt_sotaikhoan"
                               id="txt_sotaikhoan" style="width:100%;;text-align:left;margin-top:5px;"/></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>Tên ngân hàng</td>
                    <td><input autocomplete="off" value="<?php echo $arr_doanhnghiep[19] ?>" type="text" name="txt_tennganhang"
                               id="txt_tennganhang" style="width:100%;;text-align:left;margin-top:5px;"/></td>
                </tr>
            </table>
        </fieldset>

        <fieldset>
            <legend><b>Thông tin đại lý thuế</b></legend>
            <table class="table-dialog" border="0" cellpadding="10" cellspacing="5">
                <tr>
                    <td width="5"><input type="checkbox" <?php if ($arr_doanhnghiep[21] == 1) echo "checked"; ?>
                                         name="thietlapdailythue" id="thietlapdailythue"/></td>
                    <td width="130">Đại lý thuế</td>
                    <td width="180"></td>
                </tr>
                <tr>
                    <td width="5"></td>
                    <td width="130">Mã số thuế</td>
                    <td width="180"><input value="<?php echo $arr_doanhnghiep[22] ?>" type="text" name="txt_masothue_daily"
                                           id="txt_masothue_daily" style="width:100%;;text-align:left;margin-top:5px;"/></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>Tên đại lý</td>
                    <td><input autocomplete="off" value="<?php echo $arr_doanhnghiep[23] ?>" type="text" name="txt_tencongtydaily"
                               id="txt_tencongtydaily" style="width:100%;;text-align:left;margin-top:5px;"/></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>Họ và tên</td>
                    <td><input autocomplete="off" value="<?php echo $arr_doanhnghiep[24] ?>" type="text" name="txt_hovatendaily"
                               id="txt_hovatendaily" style="width:100%;;text-align:left;margin-top:5px;"/></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>Số  chứng chỉ</td>
                    <td><input autocomplete="off" value="<?php echo $arr_doanhnghiep[25] ?>" type="text" name="txt_chungchindaily"
                               id="txt_chungchindaily" style="width:100%;;text-align:left;margin-top:5px;"/></td>
                </tr>
            </table>
        </fieldset>
    </form>
</div>
<script>
    $(function () {
        $dir_module_tuychon = "modules/tuychon/"; //Khai báo đường dẫn vào mudole
        function xoadialog() {
            reset_dialog(".dialog-capnhat_matkhau");
        }

        var dialog, form,
            emailRegex = /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/,
            TenDangNhap = $("#TenDangNhap"),
            MatKhauCu = $("#MatKhauCu"),
            MatKhauMoi = $("#MatKhauMoi"),
            XacNhan = $("#XacNhan"),
            allFields = $([]).add(TenDangNhap).add(MatKhauCu).add(MatKhauMoi).add(XacNhan),
            tips = $(".validateTips");

        function updateTips(t) { // Hiện thông báo khi lỗi
            tips.text(t).addClass("ui-state-highlight");
            setTimeout(function () {
                tips.removeClass("ui-state-highlight", 1500);
            }, 500);
        }

        function checkLength(o, n, min, max) { // Kiểm tra chiều dài chuổi nhập vào
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

        $("#doanhnghieplon").change(function () {
            $("#thongtudoanhnghieplon").prop('disabled', false);

            $("#thongtudoanhnghiepvuavanho").prop('disabled', true);
            $("#thongtudoanhnghiepsieunho").prop('disabled', true);

            $("#thongtudoanhnghiepvuavanho").val("");
            $("#thongtudoanhnghiepsieunho").val("");
        });

        $("#doanhnghiepvuavanho").change(function () {
            $("#thongtudoanhnghiepvuavanho").prop('disabled', false);

            $("#thongtudoanhnghieplon").prop('disabled', true);
            $("#thongtudoanhnghiepsieunho").prop('disabled', true);

            $("#thongtudoanhnghieplon").val("");
            $("#thongtudoanhnghiepsieunho").val("");
        });

        $("#doanhnghiepsieunho").change(function () {
            $("#thongtudoanhnghiepsieunho").prop('disabled', false);

            $("#thongtudoanhnghiepvuavanho").prop('disabled', true);
            $("#thongtudoanhnghieplon").prop('disabled', true);

            $("#thongtudoanhnghiepvuavanho").val("");
            $("#thongtudoanhnghieplon").val("");
        });

        function checkConfirm(o, o1, n, n1) { // Kiểm tra chiều dài chuổi nhập vào
            if (o.val().trim() != o1.val().trim()) {
                o.addClass("ui-state-error");
                updateTips(n + " và " +
                    n1 + " không giống nhau .");
                o.focus();
                return false;
            } else {
                return true;
            }
        }

        function checkNum(o, n) { // Kiểm tra chiều dài chuổi nhập vào
            if (isNaN(o.val()) == true) {
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

        function checkTonTai(o, o1, n) { // Kiểm tra user va password có tồn tại không
            var TenDangNhap = o.val().trim();
            var MatKhau = o1.val().trim();
            var _found = false;
            $.ajax({
                type: 'POST',
                url: $dir_module_tuychon + "checkkey.php",
                data: {'user': TenDangNhap, 'pass': MatKhau},
                async: false,
                success: function (response) {
                    if (response == 1) {
                        _found = true;
                    }
                }
            });
            if (!_found) {
                o.addClass("ui-state-error");
                updateTips(n + " không đúng .");
                return false;
            } else {
                return true;
            }
        }
        $("#laydlmisa").click(function () {
            $txt_hddt_duongdan = $("#txt_hddt_duongdan").val();
            $txt_hddt_tendangnhap = $("#txt_hddt_tendangnhap").val();
            $txt_hddt_matkhau = $("#txt_hddt_matkhau").val();
            $txt_mauhoadon = $("#txt_mauhoadon").val();
            $txt_kyhieu = $("#txt_kyhieu").val();
            if($txt_hddt_duongdan!="" && $txt_hddt_tendangnhap!=""&&$txt_hddt_matkhau!="" && $txt_mauhoadon!="" && $txt_kyhieu!=""){
                $.ajax({
                    type: 'GET',
                    url: $dir_module_tuychon + "laydulieumisa.php",
                    data: {'duongdan':$txt_hddt_duongdan,'user': $txt_hddt_tendangnhap, 'pass': $txt_hddt_matkhau,'mauso':$txt_mauhoadon,'kyhieu':$txt_kyhieu},
                    async: false,
                    success: function (response) {
                        $data = JSON.parse(response);
                        $("#txt_PartnerToken").val($data.Token);
                        console.log($data);
                        $STR_PartnerGUID = $data.OrganizationUnitID+"@"+$data.CompanyID+"@"+$data.UserID+"@"+$data.InvoiceTemplateID+"@"+$data.C_OR_K;
                        $("#txt_PartnerGUID").val($STR_PartnerGUID);
                    }
                });
            }else{
                alert("Chưa nhập thông tin đăng nhập hoá đơn điện tử MISA");
            }
        });

        function ChucNang_CapNhat_MatKhau() {
            var valid = true;
            allFields.removeClass("ui-state-error"); // kiem tra du lieu
            $khoadulieu = 1;
            $khoadulieukhiduyet = 1;
            $apdungketoan = 1;
            $apdungkhachhang = 1;
            var $loaihinhdoanhnghiep = "nho";
            var $thongtudoanhnghiep = "tt133";
            var $iddoanhnghiep;

            if ($("#doanhnghiepvuavanho").prop("checked")) {
                $thongtudoanhnghiep = $("#thongtudoanhnghiepvuavanho").val();
                $loaihinhdoanhnghiep = "nho";
                $iddoanhnghiep="#thongtudoanhnghiepvuavanho";
            }

            if ($("#doanhnghieplon").prop("checked")) {
                $thongtudoanhnghiep = $("#thongtudoanhnghieplon").val();
                $loaihinhdoanhnghiep = "lon";
                $iddoanhnghiep="#thongtudoanhnghieplon";
            }

            if ($("#doanhnghiepsieunho").prop("checked")) {
                $thongtudoanhnghiep = $("#thongtudoanhnghiepsieunho").val();
                $loaihinhdoanhnghiep = "sieunho";
                $iddoanhnghiep="#thongtudoanhnghiepsieunho";
            }

            //--
            $ngonngu = "VN";
            if ($("#tiengviet").prop("checked")) {
                $ngonngu = "VN";
            }

            if ($("#tiengtrung").prop("checked")) {
                $ngonngu = "CN";
            }

            if ($("#tienganh").prop("checked")) {
                $ngonngu = "EN";
            }
            //--

            valid = valid && checkNull($($iddoanhnghiep), " Theo thông tư ");

            if ($("#chk_khoadulieu").is(":checked")) {
                valid = valid && checkNull($("#txt_khoadulieu"), " Ngày khóa dữ liệu ");
                $loaihinhdoanhnghiep = "sieunho";
            } else {
                $khoadulieu = 0;
            }

            if ($("#chk_khoaketoanvien").is(":checked")) {
                $apdungketoan = 1;
            } else {
                $apdungketoan = 0;
            }

            if ($("#chk_khoakhachang").is(":checked")) {
                $apdungkhachhang = 1;
            } else {
                $apdungkhachhang = 0;
            }

            if ($("#khoadulieukhiduyet").is(":checked")) {
                $khoadulieukhiduyet = 1;
            } else {
                $khoadulieukhiduyet = 0;
            }
			
			if ($("#thietlaphddt").is(":checked")) {
                $thietlaphddt = 1;
            } else {
                $thietlaphddt = 0;
            }
			$txt_hddt_duongdan = $("#txt_hddt_duongdan").val();
			$txt_hddt_tendangnhap = $("#txt_hddt_tendangnhap").val();
			$txt_hddt_matkhau = $("#txt_hddt_matkhau").val();
			$txttengiamdoc = $("#txttengiamdoc").val();
			$txtketoantruong = $("#txtketoantruong").val();
			$txtthuquy = $("#txtthuquy").val();
			$txtnguoilapphieu = $("#txtnguoilapphieu").val();
			$txt_mauhoadon = $("#txt_mauhoadon").val();
			$txt_kyhieu = $("#txt_kyhieu").val();
			$txt_sotaikhoan = $("#txt_sotaikhoan").val();
			$txt_tennganhang = $("#txt_tennganhang").val();
			$nhacungcaphddt = $("#nhacungcaphddt").val();

            if ($("#thietlapdailythue").is(":checked")) {
                $thietlapdailythue = 1;
            } else {
                $thietlapdailythue = 0;
            }

            if ($("#butrucongno").is(":checked")) {
                $butrucongno = 1;
            } else {
                $butrucongno = 0;
            }

            if ($("#giam30thuegtgt").is(":checked")) {
                $giam30thuegtgt = 1;
            } else {
                $giam30thuegtgt = 0;
            }

            if ($("#hienthichinhanh").is(":checked")) {
                $hienthichinhanh = 1;
            } else {
                $hienthichinhanh = 0;
            }

                        if ($("#dinhdangsophieu").is(":checked")) {
                $dinhdangsophieu = 1;
            } else {
                $dinhdangsophieu = 0;
            }

            if ($("#tudongtinhdongia").is(":checked")) {
                $tudongtinhdongia = 1;
            } else {
                $tudongtinhdongia = 0;
            }

            if ($("#capnhatgiavontucthoi").is(":checked")) {
                $capnhatgiavontucthoi = 1;
            } else {
                $capnhatgiavontucthoi = 0;
            }

            if ($("#ngoaite").is(":checked")) {
                $ngoaite = 1;
            } else {
                $ngoaite = 0;
            }

            if ($("#duandautu").is(":checked")) {
                $duandautu = 1;
            } else {
                $duandautu = 0;
            }
            if ($("#phanloaihanghoa").is(":checked")) {
                $phanloaihanghoa = 1;
            } else {
                $phanloaihanghoa = 0;
            }
            if ($("#chungtuthamchieu").is(":checked")) {
                $chungtuthamchieu = 1;
            } else {
                $chungtuthamchieu = 0;
            }

            $txt_masothue_daily = $("#txt_masothue_daily").val();
            $txt_tencongtydaily = $("#txt_tencongtydaily").val();
            $txt_hovatendaily = $("#txt_hovatendaily").val();
            $txt_chungchindaily = $("#txt_chungchindaily").val();
            $txt_seritoken = $("#txt_seritoken").val();
            $chukysodaky = $("#chukysodaky").val();
            $phuongphaptonkho = $("#phuongphaptonkho").val();
            $txt_PartnerGUID = $("#txt_PartnerGUID").val();
            $txt_PartnerToken = $("#txt_PartnerToken").val();

            if (valid) {
                $.ajax({
                    url: $dir_module_tuychon + "edit.php", // Thay dổi file
                    type: "GET", // chọn phương thức gửi là get
                    dateType: "text", // dữ liệu trả về dạng text
                    data: { // Danh sách các thuộc tính sẽ gửi đi
                        chkkhoadulieu: $khoadulieu,
                        txtkhoadulieu: $("#txt_khoadulieu").val(),
                        txthienthisole: $("#txt_hienthisole").val(),
                        apdungketoan: $apdungketoan,
                        apdungkhachhang: $apdungkhachhang,
                        khoadulieukhiduyet: $khoadulieukhiduyet,
                        loaihinhdoanhnghiep: $loaihinhdoanhnghiep,
                        theothongtu: $thongtudoanhnghiep,
						thietlaphddt: $thietlaphddt,
						txt_hddt_duongdan: $txt_hddt_duongdan,
						txt_hddt_tendangnhap: $txt_hddt_tendangnhap,
						txt_hddt_matkhau: $txt_hddt_matkhau,
                        txttengiamdoc: $txttengiamdoc,
                        txtketoantruong: $txtketoantruong,
                        txtthuquy: $txtthuquy,
                        txtnguoilapphieu: $txtnguoilapphieu,
                        txt_mauhoadon: $txt_mauhoadon,
                        txt_kyhieu: $txt_kyhieu,
                        txt_sotaikhoan: $txt_sotaikhoan,
                        txt_tennganhang: $txt_tennganhang,
                        nhacungcaphddt: $nhacungcaphddt,
                        thietlapdailythue:$thietlapdailythue,
                        txt_masothue_daily :$txt_masothue_daily,
                        txt_tencongtydaily:$txt_tencongtydaily,
                        txt_hovatendaily :$txt_hovatendaily,
                        txt_chungchindaily :$txt_chungchindaily,
                        ngonngu:$ngonngu,
                        txt_seritoken:$txt_seritoken,
                        chukysodaky:$chukysodaky,
                        butrucongno:$butrucongno,
                        dinhdangsophieu:$dinhdangsophieu,
                        phuongphaptonkho:$phuongphaptonkho,
                        capnhatgiavontucthoi:$capnhatgiavontucthoi,
                        txt_PartnerGUID:$txt_PartnerGUID,
                        txt_PartnerToken:$txt_PartnerToken,
                        tudongtinhdongia:$tudongtinhdongia,
                        giam30thuegtgt:$giam30thuegtgt,
                        hienthichinhanh:$hienthichinhanh,
                        ngoaite:$ngoaite,
                        duandautu:$duandautu,
                        phanloaihanghoa:$phanloaihanghoa,
                        chungtuthamchieu:$chungtuthamchieu,
                    },
                    success: function (result) {
                        // Sau khi gửi và kết quả trả về thành công thì gán nội dung trả về
                        $('.validateTips').html(result);
                        $.confirm({
                            title: 'Thông báo',
                            content: ' Cập nhật dữ liệu thành công.',
                            autoClose: 'OK|1000',
                            icon: 'fa fa-spinner fa-spin',
                            type: 'green',
                            buttons: {
                                OK: function () {
                                    xoadialog();
                                }
                            }
                        });
                    }
                });
            }
            return valid;
        }

        dialog = $("#dialog-capnhat_matkhau").dialog({
            resizable: false,
            height: 600,
            width: 500,
            modal: true,
            buttons: {
                "Đồng ý": ChucNang_CapNhat_MatKhau,
                "Kết thúc": function () {
                    $(this).dialog("close");
                    xoadialog();
                }
            }
        });
        form = dialog.find("#Form-CapNhap_MatKhau").on("submit", function (event) {
            event.preventDefault();
            ChucNang_CapNhat_MatKhau();
        });
    });
</script>