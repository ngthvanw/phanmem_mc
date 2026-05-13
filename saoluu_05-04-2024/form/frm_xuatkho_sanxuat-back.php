<?php
unset($_SESSION['NHAPKHOCT']);
require("../config.php");
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
        height: 20px;
        padding: 1px !important;
        font-size: 12px;
        font-family: Arial, Lucida Grande, Lucida Sans, sans-serif;
        font-weight: normal;
    }

    #Form-chinh input.button {
        height: 19px;
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
        z-index: 50000 !important;
    }
	.ui-widget {
		font-size: 13px;
	}  
    div.pq-grid * {
        font-size: 12px;
        font-family: Verdana;
        line-height: 17px;
    }

    img.ui-datepicker-trigger {
        margin-top: 2px;
    }

    .ui-autocomplete {
        max-height: 200px;
        overflow-y: auto;
        /* prevent horizontal scrollbar */
        overflow-x: hidden;
    }

    /*div.pq-grid :focus{
        outline:none;
    }*/
    .pq-grid .pq-editor-focus {
        outline: none;
        border: 1px solid #bbb;
        border-radius: 6px;
        background-image: linear-gradient(#e6e6e6, #fefefe);

        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#e6e6e6', endColorstr='#fefefe');
        background: -webkit-gradient(linear, left top, left bottom, from(#e6e6e6), to(#fefefe));
        background: -moz-linear-gradient(top, #e6e6e6, #fefefe); /* for firefox 3.6+ */
    }

    input.pq-date-editor {
        padding: 2px;
        vertical-align: bottom;
        width: 78px;
        z-index: 4;
        position: relative;
    }

    input.pg-cel-define {
        padding: 2px;
        vertical-align: bottom;
        width: 100%;
        z-index: 4;
        position: relative;
    }

    input.pq-ac-editor {
        padding: 2px;
        z-index: 4;
        position: relative;
    }

    .pq-row-edit {
        border: 2px dashed red;
    }
</style>
<div id="dialog-xuatkho" title="XUẤT KHO SẢN XUẤT...(F8 : Xóa phiếu)">
    <p class="validateTips"></p>
    <form method="post" id="Form-chinh" enctype="multipart/form-data">
        <fieldset style="background-color: #afd9ee">
            <table class="table-dialog" style="vertical-align: middle;width: 100%" border="0">
                <tr>
                    <td style="padding: 2px"><span style="padding: 2px;text-align:right">
                      <input type="button" name="btnstt" id="btnstt" class="button" value="Số TT..."/>
                        <input type="number" name="STT" min="1" id="STT" value="" style="width: 60%"
                               placeholder="Số TT" class="text ui-widget-content ui-corner-all" autocomplete='off'/>
                        <input type="hidden" name="sophieu" id="sophieu" value="" style="width: 100%"
                               placeholder="Số TT" class="text ui-widget-content ui-corner-all"/>
							   <input type='hidden' id='dangthem'/>
                    </td>
                    <td width="19%" style="padding: 2px">
                        <label for="name"> Ngày ghi sổ</label>
                    </td>
                    <td width="25%">
                        <input type="date" name="ngayghiso" value="<?php echo date("Y-m-d") ?>" id="ngayghiso"
                               required="require"
                               placeholder="Ngày ghi sổ" class="text ui-widget-content ui-corner-all"/>
                    </td>
                    <td width="8%" style="padding: 2px">
                        <label for="name">&nbsp;&nbsp;Ngày</label>
                    </td>
                    <td width="27%">
                        <select name="loaict" size="1" style="width: 100%;height:20px;display:none;" id="loaict"
                                class="text ui-widget-content ui-corner-all">
                            <option value="1" selected="selected">Hóa đơn GTGT</option>
                            <option value="2">Hóa đơn bán hàng</option>
                            <option value="3">Bảng kê 01/ TNDN</option>
                            <option selected="selected" value="4">Chứng từ khác</option>
                        </select>
                        <input type="date" name="ngayhoadon" value="" id="ngayhoadon" required="require"
                               style="width: 95%"
                               placeholder="Ngày hợp đồng" class="text ui-widget-content ui-corner-all"/>
                    </td>

                </tr>
            </table>
        </fieldset>
        <fieldset style="background-color: #afd9ee">
            <legend>Chứng từ</legend>
            <table class="table-dialog" style="vertical-align: middle;width: 100%" border="0-">
                <tr style="display:none;">
                    <td width="30px;">
                        <label for="name"> Ký hiệu</label>
                    </td>
                    <td width="60px;">
                        <input type="text" name="kyhieu" value="" id="kyhieu" required="require"
                               placeholder="Ký hiệu" style="text-transform:uppercase"
                               class="text ui-widget-content ui-corner-all"/>
                    </td>
                    <td width="30px">
                        <label for="name"> Số HĐ</label>
                    </td>
                    <td width="60px">
                        <input type="text" name="sohoadon" value="" id="sohoadon" required="require"
                               placeholder="Số hóa đơn" class="text ui-widget-content ui-corner-all"/>
                    </td>
                    <td width="30px">
                        <label for="name"> ngày</label>
                    </td>
                    <td width="50px">
                        
                    </td>
                    <td width="30px">
                        <label for="name">Mẫu số</label>
                    </td>
                    <td width="80px">
                        <input type="text" name="mauso" id="mauso" style="width: 96%"
                               placeholder="Mẫu số" value="01GTKT-3LL" class="text ui-widget-content ui-corner-all"/>
                    </td>

                </tr>
            </table>

            <table class="table-dialog" style="vertical-align: middle;width: 100%" border="0">
                <tr>
                    <td colspan="2" style="padding: 2px">
                        <label for="name"> Khách hàng:</label>
                    </td>
                    <td colspan="6" style="padding: 2px">
                        <input type="hidden" class="button" name="btnmakh" id="btnmakh"
                               value="..."/>
                        <input type="text" name="makhachhang" value="" id="makhachhang" required
                               style="width: 22%;text-transform:uppercase" list="listmakhachhang"
                               placeholder="Mã khách hàng" class="text ui-widget-content ui-corner-all"
                        /><datalist id="listmakhachhang"></datalist>
                        <input name="tenkhachhang" type="text" required
                               class="text ui-widget-content ui-corner-all" id="tenkhachhang"
                               placeholder="Tên khách hàng"
                               style="width: 77.5%"/></td>
                </tr>
                <tr>
                    <td colspan="2" style="padding: 2px"><label for="name"> Địa chỉ :</label></td>
                    <td colspan="4" style="padding: 2px"><input name="diachi" type="text" required
                                                                class="text ui-widget-content ui-corner-all" id="diachi"
                                                                placeholder="Địa chỉ" value=""/></td>
                    <td style="padding: 2px">
                        <label for="name"> MST</label></td>
                    <td>
                        <input name="masothue" type="text" disabled="disabled" required
                               class="text ui-widget-content ui-corner-all" id="masothue"
                               placeholder="Mã số thuế" style="width:98%" value=""/>
                    </td>

                </tr>
                <tr>
                    <td colspan="2" style="padding: 2px">
                        <label for="name"> Nội dung</label></td>
                    <td colspan="6" style="padding: 2px">
                        <input type="hidden" name="btnnoidung" id="btnnoidung"
                               class="button" value="..."/>
                        <input type="text" name="manoidung" value="_XKHSX" id="manoidung" list="listmanoidung" required style="width: 22%"
                               placeholder="Mã nội dung" class="text ui-widget-content ui-corner-all" />
                               <datalist id="listmanoidung"></datalist>
                        <input name="noidung" type="text" disabled="disabled" value="Xuất kho sản xuất"
                               required class="text ui-widget-content ui-corner-all" id="noidung"
                               placeholder="Nội dung" style="width: 77.5%"/></td>
                </tr>
                <tr>
                    <td colspan="2" style="padding: 2px">
                        <select class="text ui-widget-content ui-corner-all" id="chonloaisp" style="width: 100%;height:20px;">
                            <option value="">Không có SP/CT</option>
                            <option value="SP">Sản Phẩm</option>
                            <option value="CT">Công Trình</option>
                            <option value="HD">Hợp Đồng</option>
                        </select></td>
                    <td colspan="6" style="padding: 2px">
                        <input type="hidden" name="btnmakho" id="btnmakho"
                               class="button" value="..."/>
                        <input type="text" name="makho" value="0001" id="makho" list="listmakho" required style="width: 22%"
                               placeholder="Mã Bộ Phận" class="text ui-widget-content ui-corner-all" />
                               <datalist id="listmakho"></datalist>
                        <input name="tenkho" type="text" disabled="disabled" required
                               class="text ui-widget-content ui-corner-all" id="tenkho"
                               placeholder="Bộ Phận" value="Toàn bộ" style="width: 77.5%"/></td>
                </tr>
                <tr>
                    <td colspan="2" style="padding: 2px"><label for="name7">Xuất từ kho</label></td>
                    <td colspan="6" style="padding: 2px"><select name="NhapTuKho" size="1"
                                                                 class="text ui-widget-content ui-corner-all"
                                                                 id="NhapTuKho" style="width: 100%;height:20px;">


                        </select></td>
                </tr>
            </table>
        </fieldset>
        <fieldset style="background-color: #afd9ee">
            <legend>Nhập số liệu</legend>
            <table class="table-dialog" style="vertical-align: middle;width: 100%" border="0">
                <tr>
                    <td width="180px" style="padding: 2px">
                        <input name="cothuegtgt" type="hidden" class="checkbox" id="cothuegtgt" value="1"> <b style="font-size: 12px;display:none;">
                            &nbsp;Có thuế GTGT</b>
                    </td>
                    <td width="190px">
                        <input type="hidden" class="checkbox" value="1" id="baogomthue"> <b style="font-size: 12px;display:none;">
                            &nbsp;Bao gồm thuế</b>
                    </td>
                     <td width="180px">
                        <input type="hidden" class="checkbox" value="1" id="chietkhau"> <b style="font-size: 12px;display:none;">
                            &nbsp;Chiết khấu</b>
                    </td>
                     <td width="180px">
                        <input type="checkbox" class="checkbox" value="1" id="mangsang"> <b style="font-size: 12px;">
                            &nbsp;Mang sang</b>
                    </td>
                    <td width="180px"><input type="checkbox" class="checkbox" id="chungtugoc" value="1" />
                    <b style="font-size: 12px;"><abbr title="Thiếu chứng từ gốc">&nbsp;Thiếu CT gốc<abbr></b></td>
                    <td width="180px"><input type="checkbox" class="checkbox" id="chiphikhongloaitru" value="1" />
                    <b style="font-size: 12px;"><abbr title="CHI PHÍ KHÔNG ĐƯỢC LOẠI TRỪ">&nbsp;CP Không LT<abbr></b></td>
                    <td width="200px"><input type="button"  name="NhapSoLuongDongGia" id="NhapSoLuongDongGia" value="Nhập số lượng, đơn giá..." class="button" /></td>
              </tr>
               <tr style="display:none">
                  <td colspan="2" style="padding: 2px"><input style="margin-top:5px;" name="loaitokhai" type="radio" id="khaichinhthuc" checked="checked" />
                  <b style="font-size: 12px;">&nbsp;Khai lần 1</b></td>
                  <td colspan="2"><input style="margin-top:5px;" type="radio" name="loaitokhai" id="khaibosung" />
                  <b style="font-size: 12px;">&nbsp;Khai bổ sung</b></td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
            </table>
        </fieldset>
        <fieldset style="background-color: #afd9ee">
            <table width="100%" border="0" style="height:205px;background-color:#FFF;">
                <tr>
                    <td>
                        <div id="gird_chitiet_xuatkho" style="margin:5px auto;border: 0px !important;"></div>
                    </td>

                </tr>
            </table>
        </fieldset>
        <fieldset style="background-color: #afd9ee">

            <table width="100%" border="0">
                <tr>
                    <td colspan="3">
                        <select name="ChiNhanhCongTy" id="ChiNhanhCongTy" class="text ui-widget-content ui-corner-all" style="width:100%;height:20px;<?php echo (($_SESSION['hienthichinhanh'] == '1') ? '' : 'display:none'); ?>">
                            <?php
                            foreach ($ChiNhanh as $ItemCN){
                                $dau = "";
                                $selected ="";
                                if($ItemCN[2]!=0){
                                    $dau = "--";
                                }
                                if($ItemCN[0]==$_SESSION['ChiNhanh']){
                                    $selected = "selected";
                                }
                                echo "<option value='" . $ItemCN[0] . "'". $selected.">" .$dau." ".$ItemCN[1]. "</option>";
                            }
                            ?>
                        </select>
                        <input type="hidden" name="ngaythanhtoan" id="ngaythanhtoan" value=""
                               style="width: 100%"
                               class="text ui-widget-content ui-corner-all"/>
                        <input type="hidden" name="hanthanhtoan" id="hanthanhtoan" value="" style="width: 100%"
                               class="text ui-widget-content ui-corner-all"/>
                    </td>
                    <td width="13%" style="text-align:right;"><label for="name">Định khoản</label></td>
                    <td width="14%" style="text-align:center;"><label for="name"> TK nợ</label></td>
                    <td width="14%" style="text-align:center;"><label for="name"> TK có</label></td>
                    <td width="26%" style="text-align:center;"><label for="name"> Số tiền</label></td>
                </tr>
                <tr>
                    <td><label for="name5">Chiết khấu :</label></td>
                    <td colspan="2"><input name="tienchietkhau" type="text"
                                           class="text ui-widget-content ui-corner-all" id="tienchietkhau"
                                           style="width: 100%;text-align:right;" value="" disabled="disabled"
                                           tabindex="-1"/></td>
                    <td>&nbsp;</td>
                    <td><span style="padding: 2px">
                      <input type="button" name="btntkno1" id="btntkno1"
                             class="button"
                             value="..."/>
                  </span> <input type="text" name="tkno1" id="tkno1" value="" style="width: 70%"
                                 class="text ui-widget-content ui-corner-all"/></td>
                    <td><span style="padding: 2px">
                      <input type="button" name="btntkco1" id="btntkco1"
                             class="button"
                             value="..."/>
                  </span> <input type="text" name="tkco1" id="tkco1" value="" style="width: 70%"
                                 class="text ui-widget-content ui-corner-all"/></td>
                    <td><input name="sotien1" type="text"
                               class="text ui-widget-content ui-corner-all" id="sotien1"
                               style="width: 100%;text-align:right;" value=""
                               disabled="disabled" tabindex="-1"/></td>
                </tr>
                <tr>
                    <td width="11%"><label for="name4"> Tiền hàng :</label></td>
                    <td colspan="2"><input name="tienhang" type="text"
                                           class="text ui-widget-content ui-corner-all" id="tienhang"
                                           style="width: 100%;text-align:right;" value="" disabled="disabled"
                                           tabindex="-1"/></td>
                    <td>&nbsp;</td>
                    <td><span style="padding: 2px">
                      <input type="button" name="btntkno2" id="btntkno2"
                             class="button"
                             value="..."/>
                  </span> <input name="tkno2" type="text"
                                 class="text ui-widget-content ui-corner-all" id="tkno2" style="width: 70%" value=""
                                 disabled="disabled"/></td>
                    <td><span style="padding: 2px">
                      <input type="button" name="btntkco2" id="btntkco2"
                             class="button"
                             value="..."/>
                  </span> <input type="text" name="tkco2" id="tkco2" value="" style="width: 70%"
                                 class="text ui-widget-content ui-corner-all"/></td>
                    <td><input name="sotien2" type="text"
                               class="text ui-widget-content ui-corner-all" id="sotien2"
                               style="width: 100%;text-align:right;" value=""
                               disabled="disabled" tabindex="-1"/></td>
                </tr>
                <tr>
                    <td><label for="name3"> Thuế :</label></td>
                    <td colspan="2"><input name="thue" type="text"
                                           class="text ui-widget-content ui-corner-all" id="thue" style="width: 100%;text-align:right;"
                                           value="" disabled="disabled" tabindex="-1"/></td>
                    <td>&nbsp;</td>
                    <td><span style="padding: 2px">
                      <input type="button" name="btntkno3" id="btntkno3"
                                                                class="button"
                                                                value="..."/>
                  </span>                      <input name="tkno3" type="text"
                               class="text ui-widget-content ui-corner-all" id="tkno3" style="width: 70%" value=""
                               disabled="disabled"/></td>
                    <td><span style="padding: 2px">
                      <input type="button" name="btntkco3" id="btntkco2"
                                                                class="button"
                                                                value="..."/>
                  </span>                      <input type="text" name="tkco3" id="tkco3" value="" style="width: 70%"
                               class="text ui-widget-content ui-corner-all"/></td>
                    <td><input name="sotien3" type="text"
                               class="text ui-widget-content ui-corner-all" id="sotien3" style="width: 100%;text-align:right;" value=""
                               disabled="disabled" tabindex="-1"/></td>
                </tr>
                <tr style="display:none;">
                    <td><label for="name2"> Tổng số :</label></td>
                    <td colspan="2"><input name="tongso" type="text"
                                           class="text ui-widget-content ui-corner-all" id="tongso"
                                           style="width: 100%;text-align:right;"
                                           value="" disabled="disabled" tabindex="-1"/></td>
                    <td>&nbsp;</td>
                    <td><label for="name6"> Tổng tiền :</label></td>
                    <td colspan="2"><input name="tongtien" type="text"
                               class="text ui-widget-content ui-corner-all" id="tongtien"
                               style="width: 100%;text-align:right;" value="" disabled="disabled"/></td>
                </tr>
                <tr style="display:none">
                    <td>&nbsp;</td>
                    <td width="7%">&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td><input name="tkno5" type="text"
                               class="text ui-widget-content ui-corner-all" id="tkno5" style="width: 100%" value=""
                               disabled="disabled"/></td>
                    <td><input type="text" name="tkco5" id="tkco5" value="" style="width: 100%"
                               class="text ui-widget-content ui-corner-all"/></td>
                    <td><input name="sotien5" type="text"
                               class="text ui-widget-content ui-corner-all" id="sotien5" style="width: 100%" value=""
                               disabled="disabled"/></td>
                </tr>
                <tr style="display:none">
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td></td>
                    <td colspan="2"></td>
                </tr>
            </table>
        </fieldset>
        <fieldset style="background-color: #afd9ee">
            <table class="table-dialog" style="vertical-align: middle;width: 100%" border="0">
                <tr>
                    <td width="9%"><label for="name"> Ghi chú :</label></td>
                    <td width="91%">
                        <textarea id="ghichu" style="width: 100%;height:40px;"
                                  class="text ui-widget-content ui-corner-all"></textarea>
                    </td>

                </tr>
            </table>
        </fieldset>
    </form>
</div>

<script>
    $height = 300;
    $width = 800;
    //$dir_module_nhapkho = "modules/mabp/";////////////////Khai báo đường dẫn vào mudole
    $dir_module_makhachhang = "modules/makhachhang/";////////////////Khai báo đường dẫn vào mudole
    $dir_module_makho = "modules/makho/";////////////////Khai báo đường dẫn vào mudole

    $dir_module_matk = "modules/httk/";
    $dir_module_manoidung = "modules/manoidung/";////////////////Khai báo đường dẫn vào mudole
    $dir_module_dmsanpham = "modules/dmsanpham/";////////////////Khai báo đường dẫn vào mudole
    $dir_module_chitiet_vattu = "modules/ps_chitiet_mavt/";//----------------Lưới
    $dir_module_nhapkho = "modules/psmavattu/";//----------------Lưới
    $(function () {
        /////////////////////////////////////////////////////// Danh sách Autocomplex
        {
        var $listmakhachhang = "";// Danh sách khách hàng
		
        $.ajax({// Load danh sách mã khách hàng
            url: $dir_module_makhachhang + "listall.php",
            async: false,
            dataType: "json",
            success: function (response) {

                $array = (response);
                // var js_arr = response.js_arr;
                for (var i = 0; i < $array.length; i++) {
                    //alert($array[i].makh);
                    $listmakhachhang+='<option value='+$array[i].makh+'>'+$array[i].masothue+'-'+bodauTiengViet($array[i].tenkh)+'</option>';
                }
            }
        });

        $("#listmakhachhang").html($listmakhachhang);

        var $listmanoidung = new Array();// Danh sách mã nội dung
        $.ajax({// Load danh sách mã khách hàng
            url: $dir_module_manoidung + "listall.php",
            async: false,
            dataType: "json",
			data:{mapl:"NHAP"},
            success: function (response) {
                $array = (response);
                for (var i = 0; i < $array.length; i++) {
                    //alert($array[i].makh);
                    $listmanoidung+='<option value='+$array[i].mand+'>'+bodauTiengViet($array[i].tennoidung)+'</option>';
                }
            }
        });

        $("#listmanoidung").html($listmanoidung);

        var $listmakho = new Array();// Danh sách mã nội dung
        $.ajax({// Load danh sách mã khách hàng
            url: $dir_module_dmsanpham + "listall.php",
            async: false,
            dataType: "json",
            success: function (response) {
                $array = (response);
                for (var i = 0; i < $array.length; i++) {
                    //alert($array[i].makh);
                    $listmakho+='<option value='+$array[i].masp+'>'+bodauTiengViet($array[i].tensp)+'</option>';
                }
            }
        });

        $("#listmakho").html($listmakho);
    }
        /////////////////////////////////////////////Kết thúc Danh sách Autocomplex
        disabledInput();
        var dialog, form,
            emailRegex = /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/,
            btnstt = $("#btnstt"),
            STT = $("#STT"),
            sophieu = $("#sophieu"),
            ngayghiso = $("#ngayghiso"),
            loaict = $("#loaict"),
            mauso = $("#mauso"),
            kyhieu = $("#kyhieu"),
            sohoadon = $("#sohoadon"),
            ngayhoadon = $("#ngayhoadon"),
            btnmakh = $("#btnmakh"),
            makhachhang = $("#makhachhang"),
            tenkhachhang = $("#tenkhachhang"),
            diachi = $("#diachi"),
            masothue = $("#masothue"),

            btnmand = $("#btnnoidung"),
            manoidung = $("#manoidung"),
            noidung = $("#noidung"),

            btnmakho = $("#btnmakho"),
            makho = $("#makho"),
            tenkho = $("#tenkho"),


            ngaythanhtoan = $("#hanthanhtoan"),
            cothuegtgt = $("#cothuegtgt"),

            btntkno1 = $("#btntkno1"),
            btntkno2 = $("#btntkno2"),
            btntkco1 = $("#btntkco1"),
            btntkco2 = $("#btntkco2"),
            tkno1 = $("#tkno1"),
            tkno2 = $("#tkno2"),
            tkco1 = $("#tkco1"),
            tkco2 = $("#tkco2"),
            sotien1 = $("#sotien1"),
            sotien2 = $("#sotien2"),
            tongtien = $("#tongtien"),
            tienhang = $("#tienhang"),
            tienchietkhau = $("#tienchietkhau"),
            tienthue = $("#thue"),
            tongcong = $("#tongso"),
            ghichu = $("#ghichu"),


            allFields = $([]).add(STT)/////////////////////////////////////////////////////////////////////////////////////
                .add(ngayghiso)
                .add(loaict)
                .add(mauso)
                .add(kyhieu)
                .add(sohoadon)
                .add(sohoadon)
                .add(ngayhoadon)
                .add(tenkhachhang)
                .add(masothue)
                .add(manoidung)
                .add(noidung)
                .add(makho)
                .add(tenkho)
                .add(cothuegtgt)
                .add(ngaythanhtoan)
                .add(tkno1)
                .add(tkno2)
                .add(tkco1)
                .add(tkco2)
                .add(sotien1)
                .add(sotien2)
                .add(tongtien)
                .add(ghichu),
            tips = $(".validateTips"); // ///////////////////////////////////////////////////////////////////////////////khai bao bien

        function updateTips(t) {// Hiện thông báo khi lỗi
            tips
                .text(t)
                .addClass("ui-state-highlight");
            setTimeout(function () {
                tips.removeClass("ui-state-highlight", 1500);
            }, 500);
        }

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

        function checkChonCapTongHop(table,column,o, n) {// Check key khi nhấn submit
            var kq = 0;
            var key = o.val();
            if (key != "") {

                $.ajax({// Load danh sách mã khách hàng
                    url: $dir_module_matk + "kiemtracaptonghop.php",
                    async: false,
                    data:{'table':table,'column':column,'value':key},
                    dataType: "json",
                    success: function (response) {
                        kq = response;
                    }
                });
                if(kq!=0){
                    o.addClass("ui-state-error");
                    updateTips(key + " là cấp tổng hợp ! Vui lòng chọn lại cấp chi tiết !");
                    return false;
                }else{
                    return true;
                }

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

        $("#Form-chinh").keydown(function (event) {//--------------Các phím tắt
            if (event.keyCode == Keys.INSERT) {// Sửa
                $sophieu = sophieu.val();
                $("#gird_chitiet_xuatkho").load("form/gird_chitiet_xuatkho_sanxuat.php?sophieu=" + $sophieu + "&list=1");// Nếu list là 1 thì load union

            }
        })
        $("#Form-chinh").keydown(function (event) {// Gọi table mã nội dung để chọn
            if (event.keyCode == Keys.ESCAPE) { // copy
               /* $them = $("#dangthem").val();
                if ($them == "add") {
                    var r = confirm("Dữ liệu chưa được lưu ? Bạn có muốn thoát không ?");
                    if (r == true) {
                        $('.dialog_main_thongbao').load('form/frm_thongbao_xuatkho_thoat.php');
                    } else {

                    }
                } else {
                    $('.dialog_main_thongbao').load('form/frm_thongbao_xuatkho_thoat.php');
                }*/
            }
            if (event.keyCode == Keys.F8) { // copy
                $sophieu = $("#sophieu").val();
                if ($sophieu != "") {
                    var answer = confirm("Bạn có muốn xóa phiếu này ?");
                    if (answer) {
                        $.ajax({
                            url: $dir_module_nhapkho + "del_phieu.php",
                            data: {
                                sophieu: $sophieu,
                                STT: STT.val().trim(),
                                ngayghiso: ngayghiso.val().trim(),
                                loaict: loaict.val().trim(),
                                mauso: mauso.val().trim(),
                                kyhieu: kyhieu.val().trim(),
                                sohoadon: sohoadon.val().trim(),
                                ngayhoadon: ngayhoadon.val().trim(),
                                makhachhang: makhachhang.val().trim(),
                                tenkhachhang: tenkhachhang.val().trim(),
                                loaiphieu: 3,
                                diachi: diachi.val().trim(),
                                masothue: masothue.val().trim(),
                                manoidung: manoidung.val().trim(),
                                noidung: noidung.val().trim(),
                                makho: makho.val().trim(),
                                tenkho: tenkho.val().trim(),
                                ngaythanhtoan: ngaythanhtoan.val().trim(),
                                tkno1: tkno1.val().trim(),
                                tkno2: tkno2.val().trim(),
                                tkno3: $("#tkno3").val().trim(),
                                tkco1: tkco1.val().trim(),
                                tkco2: tkco2.val().trim(),
                                tkco3: $("#tkco3").val().trim(),
                                sotien1: sotien1.val().trim(),
                                sotien2: sotien2.val().trim(),
                                sotien3: $("#sotien3").val().trim(),
                                tongtien: tongtien.val().trim(),
                                sotiennt1: 0,
                                sotiennt2: 0,
                                sotiennt3: 0,
                                tongtiennt: 0,
                                tienhang: tienhang.val().trim(),
                                tienchietkhau: tienchietkhau.val().trim(),
                                tienthue: tienthue.val().trim(),
                                tongcong: tongcong.val().trim(),
                                ghichu: ghichu.val().trim(),
                                NhapTuKho: $("#NhapTuKho").val(),
                                loaisp: $("#chonloaisp").val(),
                                dathem: 1,
                                mabimat: $("#MaBiMatHoaDon").val(),

                            },
                            async: false,
                            success: function (response) {
                                $data = (response);
                            }
                        });
                        $("#STT").attr("disabled", false);
                        $("#STT").val("");
                        $("#STT").focus();
                    }

                }

            }
        })

        function checkSoHoaDonTrung() {// Check key khi nhấn submit
            $data = "K";
            $LoaiPhieu = 3;
            $sophieu = sophieu.val();
            $sohoadon = sohoadon.val().trim();
            $kyhieu = $("#kyhieu").val().trim();
            $makhachhang = makhachhang.val().trim();
            if ($sohoadon != "") {
                $.ajax({
                    url: $dir_module_nhapkho + "kiemtrasohoadon.php",
                    data: {
                        loaiphieu: $LoaiPhieu,
                        sohoadon: $sohoadon,
                        sophieu: $sophieu,
                        makh: $makhachhang,
                        kyhieu: $kyhieu
                    },
                    async: false,
                    success: function (response) {
                        $data = (response);
                    }
                });
            }
            return $data;
        }

        ////end phím tắt-----------------------------------
        ///-------------------------Di chuyễn các phần tử bằng enter----------------

        $(ngayghiso).keydown(function (event) {// Gọi table mã nội dung để chọn
            if (event.keyCode == Keys.ENTER) { // copy
                $("#ngayhoadon").focus();
            }
        })
        $(loaict).keydown(function (event) {// Gọi table mã nội dung để chọn
            if (event.keyCode == Keys.ENTER) { // copy
                $(kyhieu).focus();
            }
        })
        $(kyhieu).keydown(function (event) {// Gọi table mã nội dung để chọn
            if (event.keyCode == Keys.ENTER) { // copy
                $(sohoadon).focus();
            }
        })
        $(sohoadon).keydown(function (event) {// Gọi table mã nội dung để chọn
            if (event.keyCode == Keys.ENTER) { // copy
                    $(ngayhoadon).focus();
            }
        })
        $(sohoadon).focus(function (event) {// Gọi table mã nội dung để chọn
            $data = "";
            $LoaiPhieu = 3;
            $KyHieu = $("#kyhieu").val();
            $sohoadon = sohoadon.val();
            //alert($sohoadon);
            if ($sohoadon == "") {
                $.ajax({
                    url: $dir_module_nhapkho + "laysohoadonmax.php",
                    data: {'loaiphieu': $LoaiPhieu, 'kyhieu': $KyHieu},
                    async: false,
                    success: function (response) {
                        $data = (response);
                    }
                });
                $sohoadon = sohoadon.val($data);
            }
        })
        $(ngayhoadon).keydown(function (event) {// Gọi table mã nội dung để chọn
            if (event.keyCode == Keys.ENTER) { // copy
                $(makhachhang).focus();
            }
        })
        $(makhachhang).keydown(function (event) {// Gọi table mã nội dung để chọn
            if (event.keyCode == Keys.ENTER) { // copy
                $(manoidung).focus();
            }
        })
		
		$("#tenkhachhang").keydown(function (event) {// Gọi table mã nội dung để chọn
            if (event.keyCode == Keys.ENTER) { // copy
                $("#diachi").focus();
            }
        })
		$("#diachi").keydown(function (event) {// Gọi table mã nội dung để chọn
            if (event.keyCode == Keys.ENTER) { // copy
                $(manoidung).focus();
            }
        })

        $(manoidung).keydown(function (event) {// Gọi table mã nội dung để chọn
            if (event.keyCode == Keys.ENTER) { // copy
                $("#chonloaisp").focus();
            }
        })

        $("#chonloaisp").keydown(function (event) {// Gọi table mã nội dung để chọn
            if (event.keyCode == Keys.ENTER) { // copy
                $(makho).focus();
            }
        })

        $(makho).keydown(function (event) {// Gọi table mã nội dung để chọn
            if (event.keyCode == Keys.ENTER) { // copy
                $("#NhapTuKho").focus();
            }
        })

        $("#NhapTuKho").keydown(function (event) {// Gọi table mã nội dung để chọn
            if (event.keyCode == Keys.ENTER) { // copy
                $("#mangsang").focus();
            }
        })

        $("#cothuegtgt").keydown(function (event) {// Gọi table mã nội dung để chọn
            if (event.keyCode == Keys.ENTER) { // copy
                $("#baogomthue").focus();
            }
        });

        $("#noidung").keydown(function (event) {// Gọi table mã nội dung để chọn
            if (event.keyCode == Keys.ENTER || event.keyCode == Keys.TAB) { // copy
                $noidung = $("#noidung").val();
                $(ghichu).val($noidung);
                $(makho).focus();
            }
        })

        $("#baogomthue").keydown(function (event) {// Gọi table mã nội dung để chọn
            if (event.keyCode == Keys.ENTER) { // copy
                $("#chietkhau").focus();
            }
        })

        $("#chietkhau").keydown(function (event) {// Gọi table mã nội dung để chọn
            if (event.keyCode == Keys.ENTER) { // copy
                $("#mangsang").focus();
            }
        })
        $("#mangsang").keydown(function (event) {// Gọi table mã nội dung để chọn
            if (event.keyCode == Keys.ENTER) { // copy
                $("#NhapSoLuongDongGia").focus();
            }
        })

        $("#NhapSoLuongDongGia").keydown(function (event) {// Gọi table mã nội dung để chọn
            if (event.keyCode == Keys.TAB) { // copy
                $("#hanthanhtoan").focus();
            }
        })

        $("#hanthanhtoan").keydown(function (event) {// Gọi table mã nội dung để chọn
            if (event.keyCode == Keys.ENTER) { // copy
                $("#ghichu").focus();
            }
        })

        $("#ghichu").keydown(function (event) {// Gọi table mã nội dung để chọn
            if (event.keyCode == Keys.ENTER) { // copy
                $("#ghichu").focus();
            }
        })


///-------------------Kết thúc--------------------------------
        //////////Begin ma kh////////////////////////////
        $(btnstt).click(function (event) {// Gọi table khách hàng để chọn
            $('.dialog_main_ds_nhapkho').load("form/frm_ds_nhapkho.php?idstyle=Form-chinh&idinput=STT&idfocus=STT&loaiphieu=3");
        });

        $(btnmakh).click(function (event) {// Gọi table khách hàng để chọn
		if ($('.dialog_main_makh').html()=="") { // copy
            $('.dialog_main_makh').load("form/frm_dm_makh_form_select.php?idstyle=Form-chinh&idinput=makhachhang***tenkhachhang***diachi***masothue***makhachhang2***tenkhachhang2***diachi2&idfocus=tenkhachhang&ma="+$("#makhachhang").val());
        }
		});

        $(makhachhang).focusout(function (event) {// Gọi table mã nội dung để chọn
            $makh = makhachhang.val().trim();
            if ($('.dialog_main_makh').html()=="") { // copy
            goitablemakhachhang($makh);
            }
        });

        function goitablemakhachhang($vale) {
            if ($vale == "") {// nếu tk nợ trống thì bật tra bảng
                $('.dialog_main_makh').load("form/frm_dm_makh_form_select.php?idstyle=Form-chinh&idinput=makhachhang***tenkhachhang***diachi***masothue***makhachhang2***tenkhachhang2***diachi2&idfocus=tenkhachhang");
            } else {// nếu tk có không trống
                $data = "";
                $.ajax({
                    url: $dir_module_makhachhang + "laythongtinkhachhang.php",
                    data: {'ma': $vale},
                    async: false,
                    success: function (response) {
                        $data = $.parseJSON(response);
                    }
                });
                if ($data != null) { // Nếu tk có tòn tại trong hệ thống tài khoản thì lấy giá trị và gán vào textbox
                    makhachhang.val($data.makh);
                    tenkhachhang.val($data.tenkh);
                    diachi.val($data.diachi);
                    masothue.val($data.masothue);

                    //manoidung.focus();

                } else {
                    $('.dialog_main_makh').load("form/frm_dm_makh_form_select.php?idstyle=Form-chinh&idinput=makhachhang***tenkhachhang***diachi***masothue***makhachhang2***tenkhachhang2***diachi2&idfocus=manoidung&ma="+$("#makhachhang").val().trim());
                }
            }
        }

        //---------------------End maKH--------------
        function layngayghiso($loaiphieu) {
            $data = "";
            $LoaiPhieu = $loaiphieu;
            $.ajax({
                url: $dir_module_nhapkho + "layngayghiso.php",
                data: {'loaiphieu': $LoaiPhieu},
                async: false,
                success: function (response) {
                    $data = (response);
                }
            });
            return ($data.trim());
        }

        //////////Begin ma kh////////////////////////////
        $(btnmand).click(function (event) {// Gọi table khách hàng để chọn
		if ($('.dialog_main_manoidung').html()=="") { // copy
            $('.dialog_main_manoidung').load("form/frm_dm_manoidung_form_select.php?idstyle=Form-chinh&idinput=manoidung***noidung***tkno1***ghichu***t***t***t***tkno2&idfocus=makho&loaiphieu=3&plnoidung=XUAT&ma="+$("#manoidung").val());
        }
		});
        $("#NhapSoLuongDongGia").click(function () {
            $sophieu = sophieu.val();
            $list = 0;
            var $cothuegtgt = 0;
            if (cothuegtgt.is(":checked")) {
                $cothuegtgt = 1;
            }
            var $cochietkhau = 0;
            if ($('#chietkhau').is(":checked")) {
                $cochietkhau = 1;
            }
            var $baogomthue = 0;
            if ($('#baogomthue').is(":checked")) {
                $baogomthue = 1;
            }
            var $ngayghiso=1;
            $ngayghiso = $("#ngayghiso").val();
            $makho = $("#NhapTuKho").val();
            $('.dialog_main_bangchitiet_nhapkho').load('form/frm_bangchitiet_xuatkho_sanxuat.php?sophieu=' + $sophieu + '&list=' + $list + '&thuegtgt=' + $cothuegtgt + '&cochietkhau=' + $cochietkhau + '&baogomthue=' + $baogomthue+'&ngayghiso='+$ngayghiso+'&makho='+$makho);
        });
        $(manoidung).focusout(function (event) {// Gọi table mã nội dung để chọn
            $ma = manoidung.val().trim();
			if ($('.dialog_main_manoidung').html()=="") { // copy
            goitablemanoidung($ma);
			}
        });

        $ma = noidung.val().trim();

        function goitablemanoidung($vale) {
            if ($vale == "") {// nếu tk nợ trống thì bật tra bảng
                $('.dialog_main_manoidung').load("form/frm_dm_manoidung_form_select.php?idstyle=Form-chinh&idinput=manoidung***noidung***tkno1***ghichu***t***t***t***tkno2&idfocus=chonloaisp&loaiphieu=3&plnoidung=XUAT&ma="+$("#manoidung").val());
            } else {// nếu tk có không trống
                $data = "";
                $.ajax({
                    url: $dir_module_manoidung + "laythongtin.php",
                    data: {'ma': $vale},
                    async: false,
                    success: function (response) {
                        $data = $.parseJSON(response);
                    }
                });
                if ($data != null) { // Nếu tk có tòn tại trong hệ thống tài khoản thì lấy giá trị và gán vào textbox
                    manoidung.val($data.mand);
                    noidung.val($data.tennoidung);
                    tkno1.val($data.tkno);
                    tkno2.val($data.tkno);

                    $("#chonloaisp").focus();

                } else {
                    $('.dialog_main_manoidung').load("form/frm_dm_manoidung_form_select.php?idstyle=Form-chinh&idinput=manoidung***noidung&idfocus=chonloaisp&loaiphieu=3&plnoidung=XUAT&ma="+$("#manoidung").val().trim());
                }
            }
        }

        //////////Begin ma kho////////////////////////////
        $(btnmakho).click(function (event) {// Gọi table khách hàng để chọn
			if ($('.dialog_main_mact').html()=="") { // copy
            $('.dialog_main_mact').load("form/frm_dm_mact_form_select.php?idstyle=Form-chinh&idinput=makho***tenkho&idfocus=NhapTuKho&ma="+$("#makho").val());
			}
		});
        $(makho).focusout(function (event) {// Gọi table mã nội dung để chọn
            $ma = makho.val().trim();
            if ($('.dialog_main_danhmuc_sanpham').html()=="") { // copy
                goitablemakho($ma);
                //$("#cothuegtgt").focus();
            }
        });

        function goitablemakho($vale) {
            $loaisp = $("#chonloaisp").val();
            if ($vale == "") {// nếu tk nợ trống thì bật tra bảng
                if($loaisp=="SP"){
                    $('.dialog_main_danhmuc_sanpham').load("form/frm_dm_sanpham_from_select.php?idstyle=Form-chinh&idinput=makho***tenkho&idfocus=NhapTuKho&ma="+$("#makho").val().trim());
                }else  if($loaisp=="CT"){
                    $('.dialog_main_danhmuc_sanpham').load("form/frm_dm_congtrinh_form_select.php?idstyle=Form-chinh&idinput=makho***tenkho&idfocus=NhapTuKho&ma="+$("#makho").val().trim());
                }else  if($loaisp=="HD") {
                    $('.dialog_main_danhmuc_sanpham').load("form/frm_dm_hopdong_form_select.php?idstyle=Form-chinh&idinput=makho***tenkho&idfocus=NhapTuKho&ma="+$("#makho").val().trim());
                }else{
                    makho.val("0001");
                    tenkho.val("Toàn Bộ");
                }
            } else {// nếu tk có không trống
                $data = "";
                $.ajax({
                    url: $dir_module_dmsanpham + "laythongtin.php",
                    data: {'ma': $vale},
                    async: false,
                    success: function (response) {
                        $data = $.parseJSON(response);
                    }
                });
                if ($data != null) { // Nếu tk có tòn tại trong hệ thống tài khoản thì lấy giá trị và gán vào textbox
                    makho.val($data.masp);
                    tenkho.val($data.tensp);

                } else {
                    if($loaisp=="SP"){
                        $('.dialog_main_danhmuc_sanpham').load("form/frm_dm_sanpham_from_select.php?idstyle=Form-chinh&idinput=makho***tenkho&idfocus=NhapTuKho&ma="+$("#makho").val().trim());
                    }else  if($loaisp=="CT"){
                        $('.dialog_main_danhmuc_sanpham').load("form/frm_dm_congtrinh_form_select.php?idstyle=Form-chinh&idinput=makho***tenkho&idfocus=NhapTuKho&ma="+$("#makho").val().trim());
                    }else{
                        makho.val("0001");
                        tenkho.val("Toàn Bộ");
                    }
                }
            }
        }
        //////////End ma kho////////////////////////////

        function load_cb_khohang() {
            $.ajax({
                url: $dir_module_makho + "listall_cb.php",
                async: false,
                success: function (response) {
                    $("#NhapTuKho").html(response);
                }
            });
        }

        load_cb_khohang();

        //////////End ma kho////////////////////////////
        /////////Bắt đầu tk ///////////////////////////
        $(btntkno1).click(function (event) {// Gọi table khách hàng để chọn
            $tkno1 = tkno1.val().trim();
			if ($('.dialog_main_httk').html()=="") { // copy
            $('.dialog_main_httk').load("form/frm_dm_httk_form_select.php?idstyle=Form-chinh&idinput=tkno1&idfocus=ghichu&ma=" + $tkno1);
			}
		});
        $(tkno1).focusout(function (event) {// Gọi table mã nội dung để chọn
            $tkno1 = tkno1.val().trim();
            if ($('.dialog_main_httk').html()=="") { // copy
            goitablehttk($tkno1);
            }
        });
        function goitablehttk($vale) {
            $tkno1 = tkno1.val().trim();
            if ($vale == "") {// nếu tk nợ trống thì bật tra bảng
                $('.dialog_main_httk').load("form/frm_dm_httk_form_select.php?idstyle=Form-chinh&idinput=tkno1&idfocus=ghichu&ma=" + $tkno1);
            } else {// nếu tk có không trống
                $data = "";
                $.ajax({
                    url: $dir_module_matk + "laythongtin.php",
                    data: {'ma': $vale},
                    async: false,
                    success: function (response) {
                        $data = $.parseJSON(response);
                    }
                });
                if ($data != null) { // Nếu tk có tòn tại trong hệ thống tài khoản thì lấy giá trị và gán vào textbox
                    //ghichu.focus();
                } else {
                    $('.dialog_main_httk').load("form/frm_dm_httk_form_select.php?idstyle=Form-chinh&idinput=tkno1&idfocus=ghichu&ma=" + $tkno1);
                }
            }
        }

        $(btntkno2).click(function (event) {// Gọi table khách hàng để chọn
            $tkno2 = tkno2.val().trim();
			if ($('.dialog_main_httk').html()=="") { // copy
            $('.dialog_main_httk').load("form/frm_dm_httk_form_select.php?idstyle=Form-chinh&idinput=tkno2&idfocus=ghichu&ma=" + $tkno2);
			}
		});
        $(tkno2).focusout(function (event) {// Gọi table mã nội dung để chọn
            $tkno2 = tkno1.val().trim();
            if ($('.dialog_main_httk').html()=="") { // copy
            goitablehttk2($tkno2);
            }
        });
        function goitablehttk2($vale) {
            $tkno2 = tkno2.val().trim();
            if ($vale == "") {// nếu tk nợ trống thì bật tra bảng
                $('.dialog_main_httk').load("form/frm_dm_httk_form_select.php?idstyle=Form-chinh&idinput=tkno2&idfocus=ghichu&ma=" + $tkno2);
            } else {// nếu tk có không trống
                $data = "";
                $.ajax({
                    url: $dir_module_matk + "laythongtin.php",
                    data: {'ma': $vale},
                    async: false,
                    success: function (response) {
                        $data = $.parseJSON(response);
                    }
                });
                if ($data != null) { // Nếu tk có tòn tại trong hệ thống tài khoản thì lấy giá trị và gán vào textbox
                    //ghichu.focus();
                } else {
                    $('.dialog_main_httk').load("form/frm_dm_httk_form_select.php?idstyle=Form-chinh&idinput=tkno2&idfocus=ghichu&ma=" + $tkno2);
                }
            }
        }

        $(btntkco1).click(function (event) {// Gọi table khách hàng để chọn
            $tkco1 = tkco1.val().trim();
			if ($('.dialog_main_httk').html()=="") { // copy
            $('.dialog_main_httk').load("form/frm_dm_httk_form_select.php?idstyle=Form-chinh&idinput=tkco1&idfocus=ghichu&ma=" + $tkco1);
			}
		});
        $(tkco1).focusout(function (event) {// Gọi table mã nội dung để chọn
            $tkco1 = tkco1.val().trim();
            if ($('.dialog_main_httk').html()=="") { // copy
            goitablehttkco1($tkco1);
            }
        });
        function goitablehttkco1($vale) {
            $tkco1 = tkco1.val().trim();
            if ($vale == "") {// nếu tk nợ trống thì bật tra bảng
                $('.dialog_main_httk').load("form/frm_dm_httk_form_select.php?idstyle=Form-chinh&idinput=tkco1&idfocus=ghichu&ma=" + $tkco1);
            } else {// nếu tk có không trống
                $data = "";
                $.ajax({
                    url: $dir_module_matk + "laythongtin.php",
                    data: {'ma': $vale},
                    async: false,
                    success: function (response) {
                        $data = $.parseJSON(response);
                    }
                });
                if ($data != null) { // Nếu tk có tòn tại trong hệ thống tài khoản thì lấy giá trị và gán vào textbox
                    //ghichu.focus();
                } else {
                    $('.dialog_main_httk').load("form/frm_dm_httk_form_select.php?idstyle=Form-chinh&idinput=tkco1&idfocus=ghichu&ma=" + $tkco1);
                }
            }
        }

        $(btntkco2).click(function (event) {// Gọi table khách hàng để chọn
            $tkco2 = tkco2.val().trim();
			if ($('.dialog_main_httk').html()=="") { // copy
            $('.dialog_main_httk').load("form/frm_dm_httk_form_select.php?idstyle=Form-chinh&idinput=tkco2&idfocus=ghichu&ma=" + $tkco2);
			}
		});
        $(tkco2).focusout(function (event) {// Gọi table mã nội dung để chọn
            $tkco2 = tkco2.val().trim();
            if ($('.dialog_main_httk').html()=="") { // copy
            goitablehttkco2($tkco2);
            }
        });
        function goitablehttkco2($vale) {
            $tkco2 = tkco2.val().trim();
            if ($vale == "") {// nếu tk nợ trống thì bật tra bảng
                $('.dialog_main_httk').load("form/frm_dm_httk_form_select.php?idstyle=Form-chinh&idinput=tkco2&idfocus=ghichu&ma=" + $tkco2);
            } else {// nếu tk có không trống
                $data = "";
                $.ajax({
                    url: $dir_module_matk + "laythongtin.php",
                    data: {'ma': $vale},
                    async: false,
                    success: function (response) {
                        $data = $.parseJSON(response);
                    }
                });
                if ($data != null) { // Nếu tk có tòn tại trong hệ thống tài khoản thì lấy giá trị và gán vào textbox
                    //ghichu.focus();
                } else {
                    $('.dialog_main_httk').load("form/frm_dm_httk_form_select.php?idstyle=Form-chinh&idinput=tkco2&idfocus=ghichu&ma=" + $tkco2);
                }
            }
        }

        ////////Kết thúc tk///////////////////////////
        ///////////////////////////////////////////////////////////////////////
        $(loaict).change(function () {// Lấy tên khách hàng , địa chỉ , mst
            $loaict = loaict.val();
            if ($loaict == 1) {
                mauso.val("01GTKT0/001");
                cothuegtgt.attr("checked", true)
            }
            if ($loaict == 2) {
                mauso.val("02GTTT-3LL");
                cothuegtgt.attr("checked", false)
            }
            if ($loaict == 3) {
                cothuegtgt.attr("checked", false)
            }
            if ($loaict == 4) {
                mauso.val("");
                cothuegtgt.attr("checked", false)
            }
        });

        $(ngayhoadon).focus(function () {
            ngayhoadon.val(ngayghiso.val());
        });

        //---------------------End ma nội dung--------------

        $(ngayhoadon).focus(function () {
            ngayhoadon.val(ngayghiso.val());
        });

        function checkSTT(STT) {// Check key khi nhấn enter
            $STT = STT.val().trim();
            $sophieu = sophieu.val().trim();
            var $LoaiPhieu = 3;// Phiếu nhập kho

            if ($STT == "") {//Nếu số thứ tự null sẽ tạo số mới tự động tăng theo mã
                var $data;
                var $sophieu = 1;
                function create() {
                    $.ajax({
                        url: $dir_module_nhapkho + "taomapskt.php",
                        async: false,
                        data: {lp: $LoaiPhieu},
                        success: function (response) {
                            $data = parseInt(response.trim());
                            STT.val(parseInt($data));
                        }
                    });
                    $.ajax({// Tạo số phiếu
                        url: $dir_module_nhapkho + "taosophieu.php",
                        async: false,
                        data: {mapskt: parseInt($data), loaiphieu: $LoaiPhieu},
                        success: function (response) {
                            $sophieu = parseInt(response.trim());
                            sophieu.val($sophieu);
                            $("#gird_chitiet_xuatkho").load("form/gird_chitiet_xuatkho_sanxuat.php?sophieu=" + $sophieu + "&list=0");
                        }
                    });
                }
                var number = Math.floor(Math.random() * 2000);
                setTimeout(create,number);

                $("#dangthem").val("add");
                
                STT.attr("disabled", true);
                btnstt.attr("disabled", true);
                $("#baogomthue").attr("checked", false);
                notdisabledInput();

                $ngayghiso = layngayghiso($LoaiPhieu);
                $("#ngayghiso").val($ngayghiso);
				$("#chungtugoc").attr("checked", false);
				$("#chiphikhongloaitru").attr("checked", false);
				$("#khaichinhthuc").attr("checked", true);
                ngayghiso.focus();

            } else {// Nếu không trống kiểm tra xem có tồn tại hay không
                var $checkphieuthuchi = 0;
                $.ajax({// Kiểm tra xem STT có tồn tại hay không
                    url: $dir_module_nhapkho + "checkkey.php",
                    data: {ma: parseInt($STT), lp: $LoaiPhieu},
                    async: false,
                    success: function (response) {
                        $checkphieuthuchi = response;
                    }
                });
                if ($checkphieuthuchi == 0) {
                    if ($('div').hasClass('jconfirm') == false) {
                        $.confirm({
                            title: 'LƯU Ý',
                            content: ' Không tìm thấy chứng từ này<br/>Muốn chèn số chứng từ này vào không .<br/>Nhấn phím <strong style="color:blue;">[Y]</strong> để ĐỒNG Ý <strong style="color:blue;">[N]</strong> để HỦY BỎ ',
                            icon: 'fa fa-warning',
                            type: 'red',
                            buttons: {
                                "ĐỒNG Ý": {
                                    keys: ['Y'], action: function () {
                                        STT.attr("disabled", true);
                                        btnstt.attr("disabled", true);
                                        notdisabledInput();
                                        var $sophieu = 1;
                                        $.ajax({
                                            url: $dir_module_nhapkho + "taomapskt.php",
                                            async: false,
                                            data: {lp: $LoaiPhieu,mapskt:parseInt($STT)},
                                            success: function (response) {
                                            }
                                        });
                                        $.ajax({// Tạo số phiếu
                                            url: $dir_module_nhapkho + "taosophieu.php",
                                            data:{mapskt:$STT,loaiphieu:$LoaiPhieu},
                                            async: false,
                                            success: function (response) {
                                                $sophieu = response;
                                            }
                                        });
                                        $sophieu = $sophieu.trim();
                                        sophieu.val($sophieu);
                                        $("#dangthem").val("add");
                                        $("#gird_chitiet_xuatkho").load("form/gird_chitiet_xuatkho_sanxuat.php?sophieu=" + $sophieu + "&list=0");
                                        $ngayghiso = layngayghiso($LoaiPhieu);
                                        $("#ngayghiso").val($ngayghiso);
										$("#chungtugoc").attr("checked", false);
				                        $("#chiphikhongloaitru").attr("checked", false);
				                        $("#khaichinhthuc").attr("checked", true);
                                        ngayghiso.focus();
                                    }
                                },
                                "HỦY BỎ": {
                                    keys: ['N'], action: function () {

                                    }
                                }
                            }
                        });
                    }
                } else {
                    $data = "";
                    $.ajax({
                        url: $dir_module_nhapkho + "laythongtinphieunhap.php",
                        data: {ma: $STT, lp: $LoaiPhieu},
                        async: false,
                        success: function (response) {
                            $data = $.parseJSON(response);
                        }
                    });
                    STT.attr("disabled", true);
                    btnstt.attr("disabled", true);
                    notdisabledInput();
                    ngayghiso.val($data.ngayghiso);
                    $sophieu = $data.sophieu;
                    sophieu.val($sophieu);
                    $("#loaict").val($data.maloai);

                    makhachhang.val($data.makh);
                    tenkhachhang.val($data.tenkh);
                    diachi.val($data.diachi);
                    masothue.val($data.masothue);

                    kyhieu.val($data.seri);
                    sohoadon.val($data.sct);
                    $("#mauso").val($data.mauso);
                    ngayhoadon.val($data.ngayhoadon);
                    ngaythanhtoan.val($data.ngaythanhtoan);

                    manoidung.val($data.mand);
                    noidung.val($data.noidung);

                    makho.val($data.makho);
                    tenkho.val($data.tenkho);

                    $("#chonloaisp").val($data.loaisp);
                    $("#ChiNhanhCongTy").val($data.machinhanh);
                    $NhapTuKho = $data.kho.trim();
                    $("#NhapTuKho").val($NhapTuKho);

                    tienhang.val(FormatNumber($data.tienhang));
                    $("#tienchietkhau").val(FormatNumber($data.tienchietkhau));
                    tienthue.val(FormatNumber($data.tienthue));
                    tongcong.val(FormatNumber($data.tongcong));
                    laydinhkhoan_chitietpsvt();
                    if ($data.cothuegtgt == 1) {
                        cothuegtgt.attr("checked", true);
                    } else {
                        cothuegtgt.attr("checked", false);
                    }/////
                    if ($data.cochietkhau == 1) {
                        $("#chietkhau").attr("checked", true);
                    } else {
                        $("#chietkhau").attr("checked", false);
                    }/////
                    if ($data.cobaogomthue == 1) {
                        $("#baogomthue").attr("checked", true);
                    } else {
                        $("#baogomthue").attr("checked", false);
                    }/////
					$chungtugoc = $data.chungtugoc;
            if ($chungtugoc == 0) {
                $("#chungtugoc").attr("checked", true);
            } else {
                $("#chungtugoc").attr("checked", false);
            }
			
			$chiphikhongloaitru = $data.chiphikhongloaitru;
					if ($chiphikhongloaitru == 1) {
						$("#chiphikhongloaitru").attr("checked", true);
					} else {
						$("#chiphikhongloaitru").attr("checked", false);
					}
					
                    $("#gird_chitiet_xuatkho").load("form/gird_chitiet_xuatkho_sanxuat.php?sophieu=" + $sophieu + "&list=0");

				$loaitokhai = $data.loaitokhai;
			if ($loaitokhai == 1) {
				$("#khaichinhthuc").attr("checked", true);
			} else {
				$("#khaibosung").attr("checked", true);
			}
                    ghichu.val($data.chuthich);
                    ngayghiso.focus();
                }
            }
        }

        function laydinhkhoan_chitietpsvt() {
            $sophieu = $("#sophieu").val();
            $.ajax({// Kiểm tra xem STT có tồn tại hay không
                url: $dir_module_nhapkho + "laythongtintabledinhkhoan.php",
                data: {sophieu: $sophieu},
                async: false,
                success: function (response) {
                    $data = $.parseJSON(response);
                }
            });
            $tongtien = 0;
            $tongcong = 0;
            $tonghang = 0;
            $tongthue = 0;
            $lengh = $data.length;
            $.each($data, function (i, item) {
                i++;
                $("#tkno" + i).val(item.tkno);
                $("#tkco" + i).val(item.tkco);
                $sotien = item.sotien;
                $("#sotien" + i).val(FormatNumber($sotien.toString()));
                $tongtien += parseFloat($sotien);
                if (i < $lengh) {
                    $tonghang += parseFloat($sotien);
                }
            });
            $tongthue = $data[$lengh - 1].sotien;
            $("#tongtien").val(FormatNumber($tongtien.toString()));
            $("#tongso").val(FormatNumber($tongtien.toString()));
            $tonghang = parseFloat($tonghang);
            $("#tienhang").val(FormatNumber($tonghang.toString()));// Tiền hàng
            $("#thue").val(FormatNumber($tongthue.toString()));//Tiền thuế
        }

        $(STT).keydown(function (event) {// Gọi table khách hàng để chọn
            if (event.keyCode == Keys.ENTER || event.keyCode == Keys.TAB) { //
                checkSTT(STT);
            }
        });
        function disabledInput() {
            $("#ngayghiso").attr("disabled", true);
            $("#loaict").attr("disabled", true);
            $("#mauso").attr("disabled", true);
            $("#kyhieu").attr("disabled", true);
            $("#sohoadon").attr("disabled", true);
            $("#ngayhoadon").attr("disabled", true);
            $("#makhachhang").attr("disabled", true);
            $("#tenkhachhang").attr("disabled", true);
            $("#diachi").attr("disabled", true);
            $("#masothue").attr("disabled", true);
            $("#manoidung").attr("disabled", true);
            $("#noidung").attr("disabled", true);
            $("#makho").attr("disabled", true);

            $("#NhapSoLuongDongGia").attr("disabled", true);
            $("#tenkho").attr("disabled", true);
            $("#ngaythanhtoan").attr("disabled", true);
            $("#cothegtgt").attr("disabled", true);
            $("#tkno1").attr("disabled", true);
            $("#tkno2").attr("disabled", true);
            $("#tkco1").attr("disabled", true);
            $("#tkco2").attr("disabled", true);
            $("#sotien1").attr("disabled", true);
            $("#sotien2").attr("disabled", true);
            $("#tongtien").attr("disabled", true);
            $("#ghichu").attr("disabled", true);

            $("#btnmakh").attr("disabled", true);
            $("#btnnoidung").attr("disabled", true);
            $("#btnmakho").attr("disabled", true);
            $("#btntkno1").attr("disabled", true);
            $("#btntkno2").attr("disabled", true);
            $("#btntkco1").attr("disabled", true);
            $("#btntkco2").attr("disabled", true);


        }

        function notdisabledInput() {
            $("#ngayghiso").attr("disabled", false);
            $("#loaict").attr("disabled", false);
            $("#mauso").attr("disabled", false);
            $("#kyhieu").attr("disabled", false);
            $("#sohoadon").attr("disabled", false);
            $("#ngayhoadon").attr("disabled", false);
            $("#makhachhang").attr("disabled", false);
            $("#tenkhachhang").attr("disabled", false);
            $("#diachi").attr("disabled", false);
            $("#cothuegtgt").attr("disabled", false);

            $("#manoidung").attr("disabled", false);
            $("#noidung").attr("disabled", false);
            $("#makho").attr("disabled", false);

            $("#NhapSoLuongDongGia").attr("disabled", false);

            $("#ngaythanhtoan").attr("disabled", false);
            $("#hanthanhtoan").attr("disabled", false);
            $("#cothegtgt").attr("disabled", false);
            $("#tkno1").attr("disabled", false);
            $("#tkno2").attr("disabled", false);
            $("#tkco1").attr("disabled", false);
            $("#tkco2").attr("disabled", false);
            $("#ghichu").attr("disabled", false);

            $("#btnmakh").attr("disabled", false);
            $("#btnnoidung").attr("disabled", false);
            $("#btnmakho").attr("disabled", false);
            $("#btntkno1").attr("disabled", false);
            $("#btntkno2").attr("disabled", false);
            $("#btntkco1").attr("disabled", false);
            $("#btntkco2").attr("disabled", false);
        }


        function xoaform() {//------------------------------------------------------------------------------------
            $("#Loai").val("Add");
            $("#MaBP").val("");
            $("#TenKho").val("");
            $("#DiaChi").val("");
            $("#ChuThich").val("");
            $("#MaBP").focus();

        }//-------------------------------------------------------------------------------------------------------

        function ChucNang_nhapkho() {// Xử lý khi nhấp button đồng ý
            var valid = true;
            allFields.removeClass("ui-state-error");// kiem tra du lieu
            $tkno1 = $("#tkno1").val();
            $tkno2 = $("#tkno2").val();
            $tkco1 = $("#tkco1").val();
            $tkco2 = $("#tkco2").val();
            $tongtien = parseFloat($("#tongtien").val().replace(/,/g, ""));

            $NgayGhiSo = new Date($("#ngayghiso").val());
            $KyKeToan_TuNgay = new Date("<?php echo $_SESSION['kyketoan_tungay']; ?>");
            $KyKeToan_DenNgay = new Date("<?php echo $_SESSION['kyketoan_denngay']; ?>");
            $NamGhiSo = $NgayGhiSo.getTime();
            $NamKyKeToan_TuNgay = $KyKeToan_TuNgay.getTime();
            $NamKyKeToan_denNgay = $KyKeToan_DenNgay.getTime();

            if ($NamGhiSo<$NamKyKeToan_TuNgay || $NamGhiSo>$NamKyKeToan_denNgay)
            {
                alert("Ngày ghi sổ không nằm trong năm tài chính <?php echo $_SESSION['NienDo']; ?> ! Vui lòng nhập lại .");
                ngayghiso.focus();
                return false;
            }

            {

                valid = valid && checkNull(STT, " Số TT  ");
                valid = valid && checkNull(makhachhang, " Mã khách hàng ");
                valid = valid && checkNull(manoidung, " Mã nội dung ");
                valid = valid && checkNull(makho, " Mã kho ");
                valid = valid && checkChonCapTongHop('makh','makhcha',$('#makhachhang'),'Mã khách hàng ');
                if (checkSoHoaDonTrung().trim() != "K") {
                    $thongbao = checkSoHoaDonTrung();
                    var result = confirm($thongbao);
                    if (result) {
                        valid = valid && true;
                    } else {
                        valid = valid && false;
                        $("#sohoadon").focus();
                    }
                }
                $LoaiPhieu = 3;// Nhập kho
                var $cothuegtgt = 0;
                if (cothuegtgt.is(":checked")) {
                    $cothuegtgt = 1;
                }
                $baogomthue = 0;
                if ($("#baogomthue").is(":checked")) {
                    $baogomthue = 1;
                }

                $chietkhau = 0;
                if ($("#chietkhau").is(":checked")) {
                    $chietkhau = 1;
                }

                var $chungtugoc = 1;
                if ($("#chungtugoc").is(":checked")) {
                    $chungtugoc = 0;
                }
				
				
                var $chiphikhongloaitru = 0;
                if ($("#chiphikhongloaitru").is(":checked")) {
                    $chiphikhongloaitru = 1;
                }
				
				$loaitokhai = 1;// tờ khai bổ sung
				if ($("#khaichinhthuc").prop("checked")) {
					$loaitokhai = 1;// tờ khai bổ sung
				}else{
					$loaitokhai = 0;// tờ khai bổ sung	
				}
				

                if (valid) {
                    $.ajax({
                        url: $dir_module_nhapkho + "nhapkho.php", // Bao gồm cả add và edit
                        type: "get", // chọn phương thức gửi là get
                        dateType: "text", // dữ liệu trả về dạng text
                        data: { // Danh sách các thuộc tính sẽ gửi đi
                            STT: STT.val().trim(),
                            ngayghiso: ngayghiso.val().trim(),
                            loaict: loaict.val().trim(),
                            mauso: mauso.val().trim().replace(/ /g, ''),
                            kyhieu: kyhieu.val().trim(),
                            sohoadon: sohoadon.val().trim(),
                            ngayhoadon: ngayhoadon.val().trim(),
                            makhachhang: makhachhang.val().trim(),
                            tenkhachhang: tenkhachhang.val().trim(),
                            loaiphieu: $LoaiPhieu,
                            sophieu: sophieu.val(),
                            diachi: diachi.val().trim(),
                            masothue: masothue.val().trim(),
                            manoidung: manoidung.val().trim(),
                            noidung: noidung.val().trim(),
                            makho: makho.val().trim(),
                            tenkho: tenkho.val().trim(),
                            ngaythanhtoan: ngaythanhtoan.val().trim(),
                            cothuegtgt: $cothuegtgt,
                            baogomthue: $baogomthue,
                            chietkhau: $chietkhau,
                            tkno1: tkno1.val().trim(),
                            tkno2: tkno2.val().trim(),
							tkno3: $("#tkno3").val().trim(),
                            tkco1: tkco1.val().trim(),
                            tkco2: tkco2.val().trim(),
							tkco3: $("#tkco3").val().trim(),
                            sotien1: sotien1.val().trim(),
                            sotien2: sotien2.val().trim(),
							sotien3: $("#sotien3").val().trim(),
                            tongtien: tongtien.val().trim(),
                            tienhang: tienhang.val().trim(),
                            tienchietkhau: tienchietkhau.val().trim(),
                            tienthue: tienthue.val().trim(),
                            tongcong: tongcong.val().trim(),
                            ghichu: ghichu.val().trim(),
                            NhapTuKho: $("#NhapTuKho").val(),
							chungtugoc: $chungtugoc,
							chiphikhongloaitru: $chiphikhongloaitru,
							loaitokhai: '1',
                            loaisp:$("#chonloaisp").val(),
                            dathem: 1,
                            chinhanh:$("#ChiNhanhCongTy").val()
                        },
                        success: function (result) {
                           if ((tkno1.val().trim().substring(0,3) == "242") || (tkno2.val().trim().substring(0,3) == "242")) {
                                if (window.confirm("Số liệu phát sinh này liên quan đến công cụ dụng cụ . \n Muốn hiển thị cửa sổ nhập công cụ dụng cụ ?")) {
                                    xoadialog_nhapkho();
                                    $('.dialog_main_tangtaisan').load('form/frm_tang_chiphi_tratruoc.php?sottphieukhac=' + sophieu.val().trim() + '&form=frm_xuatkho_sanxuat&nguyengia=' + sotien1.val().trim() + '&tk=' + tkno1.val().trim() + '&ngayghiso=' + ngayghiso.val().trim());

                                } else {
                                    if ($('.dialog_main_thongbao').html() == "") { // copy
                                        $('.dialog_main_thongbao').load('form/frm_thongbao_xuatkho.php?loaiphieu=' + $LoaiPhieu + '&ngayhd=' + ngayhoadon.val().trim() + '&sophieu=' + STT.val().trim() + '&tenkho=' + encodeURI(tenkho.val().trim()));
                                    }
                                }
                            }else if ((tkno1.val().trim().substring(0,4) == "241") || (tkno2.val().trim().substring(0,4) == "241") ) {
                               if (window.confirm("Số liệu phát sinh này liên quan đến xây dựng cơ bản dở dang . \n Muốn hiển thị cửa sổ nhập xây dựng cơ bản dở dang ?")) {
                                   xoadialog_nhapkho();
                                   $('.dialog_main_tangtaisan').load('form/frm_tang_xdcoban_dodang.php?sottphieukhac=' + sophieu.val().trim() + '&form=frm_xuatkho_sanxuat&nguyengia=' + sotien1.val().trim() + '&tk=' + tkno1.val().trim() + '&ngayghiso=' + ngayghiso.val().trim());

                               } else {
                                   if ($('.dialog_main_thongbao').html() == "") { // copy
                                       $('.dialog_main_thongbao').load('form/frm_thongbao_xuatkho.php?loaiphieu=' + $LoaiPhieu + '&ngayhd=' + ngayhoadon.val().trim() + '&sophieu=' + STT.val().trim() + '&tenkho=' + encodeURI(tenkho.val().trim()));
                                   }
                               }
                           }else if ((tkno1.val().trim() == "1562")) {// Nếu có phát sinh công cụ , dụng cụ
                                if (window.confirm("Số liệu phát sinh này liên quan đến chi phí mua hàng . \n Muốn hiển thị cửa sổ chi tiết từng mặt hàng ?")) {
                                    $('.dialog_main_thongbao').load('form/frm_thongbao_xuatkho.php?loaiphieu=' + $LoaiPhieu + '&ngayhd=' + ngayhoadon.val().trim() + '&sophieu=' + STT.val().trim() + '&tenkho=' + encodeURI(tenkho.val().trim()));

                                    $('.dialog_main_mavt').load('form/frm_dm_mavt_chitiet.php?loai=xksx&sottpsct=' + sophieu.val().trim());
                                } else {
                                    if ($('.dialog_main_thongbao').html() == "") { // copy
                                        $('.dialog_main_thongbao').load('form/frm_thongbao_xuatkho.php?loaiphieu=' + $LoaiPhieu + '&ngayhd=' + ngayhoadon.val().trim() + '&sophieu=' + STT.val().trim() + '&tenkho=' + encodeURI(tenkho.val().trim()));
                                    }
                                }
                            }else {
                                       $('.dialog_main_thongbao').load('form/frm_thongbao_xuatkho.php?loaiphieu=' + $LoaiPhieu + '&ngayhd=' + ngayhoadon.val().trim() + '&sophieu=' + STT.val().trim() + '&tenkho=' + encodeURI(tenkho.val().trim()));
                           }
                        }
                    });
                }
            }
            return valid;
        }

        function xoadialog_nhapkho() {// đóng form
            reset_dialog(".dialog-xuatkho");
            reset_dialog(".dialog_main_xuatkho");

        }

        dialog = $("#dialog-xuatkho").dialog({
            autoOpen: false,
            height: "auto",
            width: $width,
            modal: true,
            buttons: {
                "Đồng ý": ChucNang_nhapkho,
                "Kết thúc": function () {
                    $sott = $("#STT").val();
                    if ($sott != "") {
                        $.ajax({// Xóa các chi tiết không tồn tại
                            url: $dir_module_chitiet_vattu + "delpsctvt.php",
                            async: false,
                            success: function (response) {
                                //$data = response;
                            }
                        });
                    }
                    $('.dialog_main_thongbao').load('form/frm_thongbao_xuatkho_thoat.php');
                }
            }
        });
        dialog.dialog("open");

    });
</script>