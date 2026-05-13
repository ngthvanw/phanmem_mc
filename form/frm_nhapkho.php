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
    input[disabled='disabled']{
        color:gray;
    }
    #Form-chinh input:focus{
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
<div id="dialog-nhapkho" title="Nhập kho hàng hóa,vật tư...(F8 : Xóa phiếu)">
    <p class="validateTips"> </p>
    <form method="post" id="Form-chinh" enctype="multipart/form-data">
        <fieldset style="background-color: #afd9ee">
            <table class="table-dialog" style="vertical-align: middle;width: 100%" border="0">
                <tr>
                    <td style="padding: 2px"><span style="padding: 2px;text-align:right">
                      <input type="button" name="btnstt" id="btnstt" class="button" value="Số TT..."/>
                        <input type="number" name="STT" id="STT" min="1" value="" style="width: 60%"
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
                        <label for="name"> Loại CT</label>
                    </td>
                    <td width="27%">
                        <select name="loaict" size="1" style="width: 100%;height:20px;" id="loaict"
                                class="text ui-widget-content ui-corner-all">
                            <option value="1" selected="selected">Hóa đơn GTGT</option>
                            <option value="2">Hóa đơn bán hàng</option>
                            <option value="3">Bảng kê 01/ TNDN</option>
                            <option value="4">Chứng từ khác</option>
							<option value="5">Chứng từ khác(Thuế GTGT)</option>
                        </select>
                    </td>

                </tr>
            </table>
        </fieldset>
        <fieldset style="background-color: #afd9ee">
            <legend>Chứng từ</legend>
            <table class="table-dialog" style="vertical-align: middle;width: 100%" border="0">
                <tr>
                    <td width="50px;" >
                        <label for="name"> Ký hiệu</label>
                    </td>
                    <td width="60px;">
                        <input type="text" name="kyhieu" value="" id="kyhieu" onkeyup="return KhuDauTiengViet(this.value,'#kyhieu')" required="require"
                               placeholder="Ký hiệu" style="text-transform:uppercase" maxlength="10" class="text ui-widget-content ui-corner-all"/>
                    </td>
                    <td width="45px" >
                        <label for="name"> Số HĐ</label>
                    </td>
                    <td width="75px" >
                        <input type="text" name="sohoadon" maxlength="12" value="" id="sohoadon" required="require"
                               placeholder="Số hóa đơn" class="text ui-widget-content ui-corner-all"/>
                    </td>
                    <td width="55px" >
                        <label for="name">&nbsp;Ngày HĐ</label>
                    </td>
                    <td width="50px" >
                        <input type="date" name="ngayhoadon" value="" id="ngayhoadon" required="require"
                               style="width: 99%"
                               placeholder="Ngày hợp đồng" class="text ui-widget-content ui-corner-all"/>
                    </td>
                    <td width="65px" >
                        <label for="name"><input type="checkbox" id="congaykhaithue" style="margin-top: 2px;"> <abbr title="NGÀY KHAI THUẾ BAO GỒM KHAI CHÍNH THỨC VÀ KHAI BỔ SUNG">Ngày KT</abbr></label>
                    </td>
                    <td width="40px" >
                        <input type="date" name="ngaykhaithue" value="" id="ngaykhaithue" required="require"
                               style="width: 99%"
                               placeholder="Ngày khai thuế" class="text ui-widget-content ui-corner-all"/>
                    </td>
                    <td width="50px" >
                        <label for="name">Mẫu số</label>
                    </td>
                    <td width="90px">
                        <input type="text" name="mauso" id="mauso" style="width: 96%" list="masohoadon" autocomplete="off"
                               placeholder="Mẫu số" value="1" class="text ui-widget-content ui-corner-all"/>

                        <datalist id="masohoadon">
                            <option value="1">
                        </datalist>

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
                        <input type="text" onkeyup="return KhuDauTiengViet(this.value,'#makhachhang')" name="makhachhang" value="" id="makhachhang" required
                               style="width: 22%;text-transform:uppercase" list="listmakhachhang"
                               placeholder="Mã khách hàng" class="text ui-widget-content ui-corner-all"
                        /><datalist id="listmakhachhang"></datalist>
                        <input name="tenkhachhang" type="text" disabled="disabled" required
                               class="text ui-widget-content ui-corner-all" id="tenkhachhang" placeholder="Tên khách hàng"
                               style="width: 77.5%"/></td>
                </tr>
                <tr>
                    <td colspan="2" style="padding: 2px"><label for="name"> Địa chỉ :</label></td>
                    <td colspan="4" style="padding: 2px"><input name="diachi" type="text" disabled="disabled" required
                                                                class="text ui-widget-content ui-corner-all" id="diachi"
                                                                placeholder="Địa chỉ" value=""/></td>
                    <td style="padding: 2px">
                        <label for="name"> MST</label></td>
                    <td>
                        <table width="100%">
                            <tr>
                                <td width="70%"><input type="text" name="masothue" value="" id="masothue" required
                                                       placeholder="Mã số thuế" class="text ui-widget-content ui-corner-all"/></td>
                                <td width="30%">&nbsp; <a id="kiemtramst" style="color: blue; font-weight: bold;cursor: pointer;">Kiểm tra MST</a></td>
                            </tr>
                        </table>
                    </td>

                </tr>
                <tr>
                    <td colspan="2" style="padding: 2px">
                        <label for="name"> Nội dung</label></td>
                    <td colspan="6" style="padding: 2px">
                        <input type="hidden" name="btnnoidung" id="btnnoidung"
                                                                class="button" value="..."/>
                        <input type="text" onkeyup="return KhuDauTiengViet(this.value,'#manoidung')" name="manoidung" value="100010" id="manoidung" list="listmanoidung" required style="width: 22%"
                               placeholder="Mã nội dung" class="text ui-widget-content ui-corner-all" />
                               <datalist id="listmanoidung"></datalist>
                  <input name="noidung" type="text" value="Mua hàng trả tiền mặt" disabled="disabled" required class="text ui-widget-content ui-corner-all" id="noidung"
                               placeholder="Nội dung" style="width: 77.5%"/><input type="hidden" id="tknond"/><input type="hidden" id="tcnond"/></td>
                </tr>
                <tr>
                    <td colspan="2" style="padding: 2px">
                        <input id="t" type="hidden">
                        <select class="text ui-widget-content ui-corner-all" id="chonloaisp" style="width: 100%;height:20px;">
                            <option value="">Không có SP/CT</option>
                            <option value="SP">Sản Phẩm</option>
                            <option value="CT">Công Trình</option>
                            <option value="HD">Hợp Đồng</option>
                        </select></td>
                    <td colspan="6" style="padding: 2px">
                        <input type="hidden" name="btnmakho" id="btnmakho"
                                                                class="button" value="..."/>
                        <input type="text" onkeyup="return KhuDauTiengViet(this.value,'#makho')" name="makho" value="0001" id="makho" list="listmakho" required style="width: 22%"
                               placeholder="Mã Bộ Phận" class="text ui-widget-content ui-corner-all" />
                               <datalist id="listmakho"></datalist>
                  <input name="tenkho" type="text" disabled="disabled" required class="text ui-widget-content ui-corner-all" id="tenkho"
                               placeholder="Bộ Phận" style="width: 77.5%" value="Toàn bộ"/></td>
                </tr>
                <tr>
                  <td colspan="2" style="padding: 2px"><label for="name7">Nhập vào kho</label></td>
                  <td colspan="6" style="padding: 2px"><select name="NhapTuKho" size="1"
                                id="NhapTuKho"  class="text ui-widget-content ui-corner-all" style="width: 100%;height:20px;">
                    
                    
                  </select></td>
                </tr>
            </table>
        </fieldset>
        <fieldset style="background-color: #afd9ee">
            <legend>Nhập số liệu</legend>
            <table class="table-dialog" style="vertical-align: middle;width: 100%" border="0">
                <tr>
                    <td width="180" style="padding: 2px">
                        <input name="cothuegtgt" type="checkbox" class="checkbox" id="cothuegtgt" value="1" checked="checked"> <b style="font-size: 12px;">
                            &nbsp;Có thuế GTGT</b>
                    </td>
                    <td width="190">
                        <input type="checkbox" class="checkbox" value="1" id="baogomthue"> <b style="font-size: 12px;">
                            &nbsp;Bao gồm thuế</b>
                    </td>
                     <td width="180">
                        <input type="checkbox" class="checkbox" value="1" id="chietkhau"> <b style="font-size: 12px;">
                            &nbsp;Chiết khấu</b>
                    </td>
                     <td width="180">
                        <input type="checkbox" class="checkbox" value="1" id="mangsang"> <b style="font-size: 12px;">
                            &nbsp;Mang sang</b>
                    </td>
                    <td width="180"><input type="checkbox" class="checkbox" id="chungtugoc" value="1" />
                    <b style="font-size: 12px;"><abbr title="THIẾU CHỨNG TỪ GỐC">&nbsp;Thiếu CT gốc<abbr></b></td>
                    
                    <td width="180"><input type="checkbox" class="checkbox" id="chiphikhongloaitru" value="1" />
                    <b style="font-size: 12px;"><abbr title="CHI PHÍ KHÔNG ĐƯỢC TRỪ">&nbsp;CP KHÔNG ĐT<abbr></b></td>
                    <td width="200"><input type="button"  name="NhapSoLuongDongGia" id="NhapSoLuongDongGia" value="Nhập số lượng, đơn giá..." class="button" /></td>

                </tr>
                <tr>
                  <td colspan="2" style="padding: 2px"></b>
                  <table border="0" style="width: 100%"><tr>
                          <td style="width: 50%"><input style="margin-top:5px;" name="loaitokhai" type="radio" id="khaichinhthuc" checked="checked" />
                              <b style="font-size: 12px;">&nbsp;Khai lần 1</td>
                          <td style="width: 50%"><input style="margin-top:5px;" type="radio" name="loaitokhai" id="khaibosung" />
                              <b style="font-size: 12px;">&nbsp;Khai bổ sung</b></td>
                      </tr></table>
                  </td>
                  <td colspan="2">
                      <input style="margin-top:5px;" type="checkbox" name="giam30theonghiquyet" id="giam30theonghiquyet" />
                      <b style="font-size: 12px;">&nbsp;Giảm theo NQ</b>
                      <b style="font-size: 12px;<?php echo (($_SESSION['duandautu'] == '1') ? '' : 'display:none'); ?>">
                      <input name="duandautu" type="checkbox" class="checkbox" style="margin-left: 0px;"
                                         id="duandautu" value="1"/>&nbsp;&nbsp;D.A Đầu tư</b>
                  </td>
                  <td>&nbsp
                      <select style="width:90%;<?php echo (($_SESSION['phanloaihanghoadauvao'] == '1') ? '' : 'display:none'); ?>" id="loaihanghoadichvu">
                          <option value="1">1. Hàng hóa dịch vụ dùng riêng cho SXKD chịu thuế GTGT và sử dụng cho các hoạt động cung cấp hàng hóa, dịch vụ không kê khai, nộp thuế GTGT đủ điều kiện khấu trừ thuế</option>
                          <option value="2">2. Hàng hóa, dịch vụ không đủ điều kiện khấu trừ</option>
                          <option value="3">3. Hàng hóa, dịch vụ dùng chung cho SXKD chịu thuế và không chịu thuế đủ điều kiện khấu trừ thuế</option>
                      </select>
                  </td>
                  <td>&nbsp<b style="font-size: 12px;<?php echo (($_SESSION['chungtuthamchieu'] == '1') ? '' : 'display:none'); ?>">&nbsp Số tham chiếu </b></td>
                  <td style="<?php echo (($_SESSION['chungtuthamchieu'] == '1') ? '' : 'display:none'); ?>">&nbsp<input type="text" name="chungtuthamchieu" value="" autocomplete="off" id="chungtuthamchieu" required="require"
                                  style="width: 97%"
                                  placeholder="Chứng từ tham chiếu" class="text ui-widget-content ui-corner-all"/></td>
                </tr>
            </table>
        </fieldset>
        <fieldset style="background-color: #afd9ee">
            <table width="100%" border="0" style="height:205px;background-color:#FFF;">
                <tr>
                    <td> <div id="gird_chitiet_nhapkho" style="margin:5px auto;border: 0px !important;"></div></td>

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
                    </td>
                    <td width="13%" style="text-align:right;"><label for="name">Định khoản</label></td>
                    <td width="12%" style="text-align:center;"><label for="name"> TK nợ</label></td>
                    <td width="12%" style="text-align:center;"><label for="name"> TK có</label></td>
                    <td width="30%" style="text-align:center;"><label for="name" style="width:50%"> Số tiền</label><label for="name" style="width:50%"> Số tiền NT</label></td>
                </tr>
                <tr>
                    <td colspan="2"></td>
                    <td width="15%"></td>
                    <td></td>
                    <td><span style="padding: 2px">
                      <input type="button" name="btntkno1" id="btntkno1"
                                                                class="button"
                                                                value="..."/>
                  </span>                      <input type="text" name="tkno1" id="tkno1" value="" style="width: 60%"
                               class="text ui-widget-content ui-corner-all"/></td>
                    <td><span style="padding: 2px">
                      <input type="button" name="btntkco1" id="btntkco1"
                                                                class="button"
                                                                value="..."/>
                  </span>                      <input type="text" name="tkco1" id="tkco1" value="" style="width: 60%"
                               class="text ui-widget-content ui-corner-all"/></td>
                    <td><input name="sotien1" type="text"
                               class="text ui-widget-content ui-corner-all" id="sotien1" style="width: 50%;text-align:right;" value=""
                               disabled="disabled" tabindex="-1"/>
                    <input name="sotiennt1" type="text"
                               class="text ui-widget-content ui-corner-all" id="sotiennt1" style="width: 50%;text-align:right;" value=""
                               disabled="disabled" tabindex="-1"/></td>
                </tr>
                <tr>
                    <td colspan="2"><label for="name">Hạn thanh toán :</label></td>
                    <td width="15%"><input type="hidden" name="ngaythanhtoan" id="ngaythanhtoan" value=""
                                           style="width: 100%"
                                           class="text ui-widget-content ui-corner-all"/>
                        <input type="date" name="hanthanhtoan" id="hanthanhtoan" value="" style="width: 100%"
                               class="text ui-widget-content ui-corner-all"/></td>
                    <td></td>
                    <td><span style="padding: 2px">
                      <input type="button" name="btntkno2" id="btntkno2"
                                                                class="button"
                                                                value="..."/>
                  </span>                      <input name="tkno2" type="text"
                               class="text ui-widget-content ui-corner-all" id="tkno2" style="width: 60%" value=""/></td>
                    <td><span style="padding: 2px">
                      <input type="button" name="btntkco2" id="btntkco2"
                                                                class="button"
                                                                value="..."/>
                  </span>                      <input type="text" name="tkco2" id="tkco2" value="" style="width: 60%"
                               class="text ui-widget-content ui-corner-all"/></td>
                    <td><input name="sotien2" type="text"
                               class="text ui-widget-content ui-corner-all" id="sotien2" style="width: 50%;text-align:right;" value=""
                               disabled="disabled" tabindex="-1"/>
                    <input name="sotiennt2" type="text"
                               class="text ui-widget-content ui-corner-all" id="sotiennt2" style="width: 50%;text-align:right;" value=""
                               disabled="disabled" tabindex="-1"/></td>
                </tr>
                <tr>
                    <td><label for="name5">Chiết khấu :</label></td>
                    <td colspan="2"><input name="tienchietkhau" type="text"
                                           class="text ui-widget-content ui-corner-all" id="tienchietkhau"
                                           style="width: 100%;text-align:right;" value="" disabled="disabled" tabindex="-1"/></td>
                    <td>&nbsp;</td>
                    <td><span style="padding: 2px">
                      <input type="button" name="btntkno3" id="btntkno3"
                                                                class="button"
                                                                value="..."/>
                  </span>                      <input name="tkno3" type="text"
                               class="text ui-widget-content ui-corner-all" id="tkno3" style="width: 60%" value=""/></td>
                    <td><span style="padding: 2px">
                      <input type="button" name="btntkco3" id="btntkco3"
                                                                class="button"
                                                                value="..."/>
                  </span>                      <input type="text" name="tkco3" id="tkco3" value="" style="width: 60%"
                               class="text ui-widget-content ui-corner-all"/></td>
                    <td><input name="sotien3" type="text"
                               class="text ui-widget-content ui-corner-all" id="sotien3" style="width: 50%;text-align:right;" value=""
                               disabled="disabled" tabindex="-1"/>
                    <input name="sotiennt3" type="text"
                               class="text ui-widget-content ui-corner-all" id="sotiennt3" style="width: 50%;text-align:right;" value=""
                               disabled="disabled" tabindex="-1"/></td>
                </tr>
                <tr>
                    <td width="11%"><label for="name4"> Tiền hàng :</label></td>
                    <td colspan="2"><input name="tienhang" type="text"
                                           class="text ui-widget-content ui-corner-all" id="tienhang"
                                           style="width: 100%;text-align:right;" value="" disabled="disabled" tabindex="-1"/></td>
                    <td>&nbsp;</td>
                    <td><span style="padding: 2px">
                      <input type="button" name="btntkno4" id="btntkno4"
                                                                class="button"
                                                                value="..."/>
                  </span>                      <input name="tkno4" type="text"
                               class="text ui-widget-content ui-corner-all" id="tkno4" style="width: 60%" value=""/></td>
                    <td><span style="padding: 2px">
                      <input type="button" name="btntkco4" id="btntkco4"
                                                                class="button"
                                                                value="..."/>
                  </span>                      <input type="text" name="tkco4" id="tkco4" value="" style="width: 60%"
                               class="text ui-widget-content ui-corner-all"/></td>
                    <td><input name="sotien4" type="text"
                               class="text ui-widget-content ui-corner-all" id="sotien4" style="width: 50%;text-align:right;" value=""
                               disabled="disabled" tabindex="-1"/>
                      <input name="sotiennt4" type="text"
                               class="text ui-widget-content ui-corner-all" id="sotiennt4" style="width: 50%;text-align:right;" value=""
                               disabled="disabled" tabindex="-1"/></td>
                </tr>
				<tr>
                    <td><label for="name3"> Thuế :</label></td>
                    <td colspan="2"><input name="thue" type="text"
                                           class="text ui-widget-content ui-corner-all" id="thue" style="width: 100%;text-align:right;"
                                           value="" disabled="disabled" tabindex="-1"/></td>
                    <td>&nbsp;</td>
                    <td><span style="padding: 2px">
                      <input type="button" name="btntkno5" id="btntkno5"
                                                                class="button"
                                                                value="..."/>
                  </span>                      <input name="tkno4" type="text"
                               class="text ui-widget-content ui-corner-all" id="tkno5" style="width: 60%" value=""/></td>
                    <td><span style="padding: 2px">
                      <input type="button" name="btntkco4" id="btntkco4"
                                                                class="button"
                                                                value="..."/>
                  </span>                      <input type="text" name="tkco5" id="tkco5" value="" style="width: 60%"
                               class="text ui-widget-content ui-corner-all"/></td>
                    <td><input name="sotien5" type="text"
                               class="text ui-widget-content ui-corner-all" id="sotien5" style="width: 50%;text-align:right;" value=""
                               disabled="disabled" tabindex="-1"/>
                      <input name="sotiennt5" type="text"
                               class="text ui-widget-content ui-corner-all" id="sotiennt5" style="width: 50%;text-align:right;" value=""
                               disabled="disabled" tabindex="-1"/></td>
                </tr>
                 <tr>
                    <td><label for="name8"> Phí MT:</label></td>
                    <td colspan="2"><input name="phimoitruong" type="text"
                                           class="text ui-widget-content ui-corner-all" id="phimoitruong" style="width: 100%;text-align:right;"
                                           value="" disabled="disabled" tabindex="-1"/></td>
                    <td align="right">&nbsp;</td>
                    <td>&nbsp;</td>
                    <td align="right"><label for="name6"> Tổng tiền :&nbsp;</label></td>
                   <td><input name="tongtien" type="text"
                                           class="text ui-widget-content ui-corner-all" id="tongtien"
                                           style="width: 50%;text-align:right;" value="" disabled="disabled"/>
                    <input name="tongtiennt" type="text"
                                           class="text ui-widget-content ui-corner-all" id="tongtiennt"
                                           style="width: 50%;text-align:right;" value="" disabled="disabled"/></td>
                </tr>
                <tr>
                    <td><label for="name2"> Tổng số :</label></td>
                    <td colspan="2"><input name="tongso" type="text"
                                           class="text ui-widget-content ui-corner-all" id="tongso" style="width: 100%;text-align:right;"
                                           value="" disabled="disabled" tabindex="-1"/></td>
                    <td>&nbsp;</td>
                  <td>
                  <label for="name6">CK doanh số :</label></td>
                    <td colspan="2">
                    <input type="text" name="chietkhaudoanhso" id="chietkhaudoanhso" value="" style="width: 100%;text-align:right;"
                               class="text ui-widget-content ui-corner-all" onkeyup="return format_munber(this.value,'#chietkhaudoanhso')"/></td>
                </tr>
                              
            </table>
        </fieldset>
        <fieldset style="background-color: #afd9ee">
            <table class="table-dialog" style="vertical-align: middle;width: 100%" border="0">
                <tr>
                    <td width="9%"><label for="name"> Ghi chú :</label></td>
                    <td width="91%">
                        <textarea id="ghichu" style="width: 100%;height:30px;" class="text ui-widget-content ui-corner-all"></textarea>
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
        {
        /////////////////////////////////////////////////////// Danh sách Autocomplex
        var $listmakhachhang = "";// Danh sách khách hàng
		
        $.ajax({// Load danh sách mã khách hàng
            url: $dir_module_makhachhang + "listall.php",
            dataType: "json",
            success: function (response) {

                $array = (response);
                // var js_arr = response.js_arr;
                for (var i = 0; i < $array.length; i++) {
                    //alert($array[i].makh);
                    $listmakhachhang+='<option value='+$array[i].makh+'>'+$array[i].masothue+'-'+bodauTiengViet($array[i].tenkh)+'</option>';
                }
				$("#listmakhachhang").html($listmakhachhang);
			}
        });

        var $listmanoidung = new Array();// Danh sách mã nội dung
        $.ajax({// Load danh sách mã khách hàng
            url: $dir_module_manoidung + "listall.php",
            dataType: "json",
			data:{mapl:"NHAP"},
            success: function (response) {
                $array = (response);
                for (var i = 0; i < $array.length; i++) {
                    //alert($array[i].makh);
                    $listmanoidung+='<option value='+$array[i].mand+'>'+bodauTiengViet($array[i].tennoidung)+'</option>';
                }
				$("#listmanoidung").html($listmanoidung);
            }
        });

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
				$("#listmakho").html($listmakho);
            }
        });
    }
/////////////////////////////////////////////Kết thúc Danh sách Autocomplex

        //-------------------------------------------------------------------

        //-------------------------------------------------------------------

        disabledInput();
        var dialog, form,
            emailRegex = /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/,
            btnstt=$("#btnstt"),
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

            btnmand= $("#btnnoidung"),
            manoidung = $("#manoidung"),
            noidung = $("#noidung"),

            btnmakho =$("#btnmakho"),
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
            if (!( regexp.test(o.val().trim()) )) {
                o.addClass("ui-state-error");
                updateTips(n);
                return false;
            } else {
                return true;
            }
        }

        function checkSoHoaDonTrung() {// Check key khi nhấn submit
            $data = "K";
            $LoaiPhieu=1;
            $sophieu = sophieu.val();
            $sohoadon = sohoadon.val().trim();
			$kyhieu = $("#kyhieu").val().trim();
            $makhachhang = makhachhang.val().trim();
            if($sohoadon!="") {
                $.ajax({
                    url: $dir_module_nhapkho + "kiemtrasohoadon.php",
                    data: {
                        'loaiphieu': $LoaiPhieu,
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
        function checkSoHoaDonTrung_Vuot() {// Check khi vượt 20tr trên 1 ngày
            $data = "K";
            $LoaiPhieu=1;
            $makhachhang = makhachhang.val().trim();
            $sohoadon = sohoadon.val().trim();
            $kyhieu = $("#kyhieu").val().trim();
            $ngayhoadon = $("#ngayhoadon").val().trim();
            $tongtien = $("#tongtien").val().trim();
            $tk = $("#tkco1").val().trim();
            $sottpsct= $("#STT").val().trim();
            $loaict = $("#loaict").val().trim();
            if($sohoadon!="" && ($loaict == 1 || $loaict == 2)) {
                $.ajax({
                    url: $dir_module_nhapkho + "kiemtrasohoadon_vuot.php",
                    data: {
                        loaiphieu: $LoaiPhieu,
                        makh: $makhachhang,
                        ngayhoadon: $ngayhoadon,
                        tongtien:$tongtien,
                        sohoadon: $sohoadon,
                        kyhieu: $kyhieu,
                        tk: $tk,
                        sottpsct: $sottpsct
                    },
                    async: false,
                    success: function (response) {
                        $data = (response);
                    }
                });
            }
            return $data;

        }		
		function kiemtrakhackykekhai(){
			let $NienDo = "<?php echo $_SESSION['NienDo']; ?>";
			let $Str_PPKeKhaiThue = "<?php echo $_SESSION['PhuongPhapKeKhaiThueGTGT']; ?>";
			let $PPKeKhaiThue = $Str_PPKeKhaiThue.split(";")[0];
			$NgayKhaiThue = $("#ngaykhaithue").val();
			let Date_NgayKhaiThue = new Date($NgayKhaiThue);
			let Month_NgayKhaiThue = Date_NgayKhaiThue.getMonth(); // Thêm 1 để lấy tháng từ 1 đến 12
			$NgayHoaDon = $("#ngayhoadon").val();			
			let Date_NgayHoaDon = new Date($NgayHoaDon);
			let Month_NgayHoaDon = Date_NgayHoaDon.getMonth(); // Thêm 1 để lấy tháng từ 1 đến 12
			
			if($NienDo>2021){
				if($PPKeKhaiThue==2){// Kê khai theo quý
					let Quy_KhaiThue = Math.floor((Month_NgayKhaiThue)/3);
					let Quy_HoaDon = Math.floor((Month_NgayHoaDon)/3);
					if(Quy_HoaDon!=Quy_KhaiThue){
						return false;
					}
				}else{// Kê khai theo tháng
					if(Month_NgayHoaDon!=Month_NgayKhaiThue){
						return false;
					}
				}
			}
			return true;
        }
		
        function kiemtrakhoadulieu($ngayghiso,$loaiphieu,$sophieu){
            var $ketqua;
            $.ajax({// Load danh sách mã khách hàng
                url:"modules/tuychon/checkkhoadulieu.php",
                async: false,
                data:{ngayghiso:$ngayghiso,loaiphieu:$loaiphieu,sophieu:$sophieu},
                success: function (response) {
                    $ketqua= response.trim();
                }
            });
            return $ketqua;
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

        $("#Form-chinh").keydown(function (event) {//--------------Các phím tắt
            if (event.keyCode == Keys.INSERT) {// Sửa
                $sophieu = sophieu.val();
                $("#gird_chitiet_nhapkho").load("form/gird_chitiet_nhapkho.php?sophieu="+$sophieu+"&list=1");// Nếu list là 1 thì load union

            }
        })
        $("#Form-chinh").keydown(function (event) {// Gọi table mã nội dung để chọn
            if (event.keyCode == Keys.F8) { // copy
                $sophieu = $("#sophieu").val();
                $check_luu = (kiemtrakhoadulieu(ngayghiso.val().trim(),2,STT.val().trim()));
                if($check_luu!=""){
                    alert($check_luu);
                    return false;
                }
                if($sophieu!=""){
                    var answer = confirm("Bạn có muốn xóa phiếu này ?");
                    if (answer){
                        $.ajax({
                            url: $dir_module_nhapkho + "del_phieu.php",
                            data: {
                                sophieu:$sophieu,
                                STT: STT.val().trim(),
                                ngayghiso: ngayghiso.val().trim(),
                                loaict: loaict.val().trim(),
                                mauso: mauso.val().trim(),
                                kyhieu: kyhieu.val().trim(),
                                sohoadon: sohoadon.val().trim(),
                                ngayhoadon: ngayhoadon.val().trim(),
                                makhachhang: makhachhang.val().trim(),
                                tenkhachhang: tenkhachhang.val().trim(),
                                loaiphieu: 1,
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
                                sotiennt1: $("#sotiennt1").val().trim(),
                                sotiennt2: $("#sotiennt2").val().trim(),
                                sotiennt3: $("#sotiennt3").val().trim(),
                                tongtiennt: $("#tongtiennt").val().trim(),
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

            }else if (event.keyCode == Keys.F4) { // copy
                ChucNang_nhapkho();
            }
        })

            ////end phím tắt-----------------------------------
        ///-------------------------Di chuyễn các phần tử bằng enter----------------

        $(ngayghiso).keydown(function (event) {// Gọi table mã nội dung để chọn
            if (event.keyCode == Keys.ENTER) { // copy
                $(loaict).focus();
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

        $(sohoadon).focusout(function (event) {// Gọi table mã nội dung để chọn
            /*$sohoadon = $(sohoadon).val().trim();
            if ($sohoadon != "") {

                $intsohoadon = parseInt($sohoadon);
                if (Number.isNaN($intsohoadon) == false) {
                    $lengsohoadon = $intsohoadon.toString().length;
                    if ($lengsohoadon == 1) {
                        $(sohoadon).val("000000" + $intsohoadon);
                    } else if ($lengsohoadon == 2) {
                        $(sohoadon).val("00000" + $intsohoadon);
                    } else if ($lengsohoadon == 3) {
                        $(sohoadon).val("0000" + $intsohoadon);
                    } else if ($lengsohoadon == 4) {
                        $(sohoadon).val("000" + $intsohoadon);
                    } else if ($lengsohoadon == 5) {
                        $(sohoadon).val("00" + $intsohoadon);
                    } else if ($lengsohoadon == 6) {
                        $(sohoadon).val("0" + $intsohoadon);
                    } else if ($lengsohoadon == 7) {
                        $(sohoadon).val($intsohoadon);
                    }
                }
            }*/
        })
	

        $(ngayhoadon).keydown(function (event) {// Gọi table mã nội dung để chọn
            if (event.keyCode == Keys.ENTER) { // copy
                $(mauso).focus();
            }
        })

        $(mauso).keydown(function (event) {// Gọi table mã nội dung để chọn
            if (event.keyCode == Keys.ENTER) { // copy
                $(makhachhang).focus();
            }
        })
        $(makhachhang).keydown(function (event) {// Gọi table mã nội dung để chọn
            if (event.keyCode == Keys.ENTER) { // copy
                $(manoidung).focus();
            }
        })
		$("#noidung").keydown(function (event) {// Gọi table mã nội dung để chọn
            if (event.keyCode == Keys.ENTER) { // copy
                $noidung = $("#noidung").val();
				$(ghichu).val($noidung);
				$(makho).focus();
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
                $(cothuegtgt).focus();
            }
        })


        $("#cothuegtgt").keydown(function (event) {// Gọi table mã nội dung để chọn
            if (event.keyCode == Keys.ENTER) { // copy
                $("#baogomthue").focus();
            }
        });

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
                ChucNang_nhapkho();
            }
        })

        $("#ghichu").keydown(function (event) {// Gọi table mã nội dung để chọn
            if (event.keyCode == Keys.ENTER) { // copy
                $("#ghichu").focus();
            }
        })

///-------------------Kết thúc--------------------------------
       function layngayghiso($loaiphieu){
            $data = "";
            $LoaiPhieu=$loaiphieu;
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
        $(btnstt).click(function (event) {// Gọi table khách hàng để chọn
            $('.dialog_main_ds_nhapkho').load("form/frm_ds_nhapkho.php?idstyle=Form-chinh&idinput=STT&idfocus=STT&loaiphieu=1");
        });

        $(btnmakh).click(function (event) {// Gọi table khách hàng để chọn
		if ($('.dialog_main_makh').html()=="") { // copy
            $('.dialog_main_makh').load("form/frm_dm_makh_form_select.php?idstyle=Form-chinh&idinput=makhachhang***tenkhachhang***diachi***masothue***makhachhang2***tenkhachhang2***diachi2&idfocus=manoidung&ma="+$("#makhachhang").val());
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
                $('.dialog_main_makh').load("form/frm_dm_makh_form_select.php?idstyle=Form-chinh&idinput=makhachhang***tenkhachhang***diachi***masothue***makhachhang2***tenkhachhang2***diachi2&idfocus=manoidung&ma="+$("#makhachhang").val());
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
        //////////Begin ma kh////////////////////////////
        $(btnmand).click(function (event) {// Gọi table khách hàng để chọn
		if ($('.dialog_main_manoidung').html()=="") { // copy
            $('.dialog_main_manoidung').load("form/frm_dm_manoidung_form_select.php?idstyle=Form-chinh&idinput=manoidung***noidung***tkco1***ghichu***t***t***tkco2***tkco3&idfocus=makho&loaiphieu=1&plnoidung=NHAP&ma="+$("#manoidung").val());
        }
		});
        $("#NhapSoLuongDongGia").click(function(){
            try {
                $check_luu = (kiemtrakhoadulieu(ngayghiso.val().trim(), 1, STT.val().trim()));
                if ($check_luu != "") {
                    alert($check_luu);
                    return false;
                }
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

                if ($('.dialog_main_bangchitiet_nhapkho').html() == "") { // copy
                    $('.dialog_main_bangchitiet_nhapkho').load('form/frm_bangchitiet_nhapkho.php?sophieu=' + $sophieu + '&list=' + $list + '&thuegtgt=' + $cothuegtgt + '&cochietkhau=' + $cochietkhau + '&baogomthue=' + $baogomthue+'&ngayghiso='+$ngayghiso+'&makho='+$makho);
                }
            }catch (err){

            }
		});
        $(manoidung).focusout(function (event) {// Gọi table mã nội dung để chọn
            $ma = manoidung.val().trim();
            if ($('.dialog_main_manoidung').html()=="") { // copy
                goitablemanoidung($ma);
            }
        });

        function goitablemanoidung($vale) {
            if ($vale == "") {// nếu tk nợ trống thì bật tra bảng
                $('.dialog_main_manoidung').load("form/frm_dm_manoidung_form_select.php?idstyle=Form-chinh&idinput=manoidung***noidung***tkco1***ghichu***t***t***tkco2***tkco3&idfocus=chonloaisp&loaiphieu=1&plnoidung=NHAP");
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
                    if($manoidungcu!=$data.mand){
                        noidung.val($data.tennoidung);
                    }else{
						if($noidungcu==""){// Nếu không có Tên nội dung
							noidung.val($data.tennoidung);
						}else{// Nếu đã có nội dụng cũ thì lấy nọi dung cũ không đổi nội dung khác
							noidung.val($noidungcu);
						}
					}
                    $("#tkco1").val($data.tkco);
                    $("#tkco2").val($data.tkco);
                    $("#tkco3").val($data.tkco);


                    //makho.focus();

                } else {
                    $('.dialog_main_manoidung').load("form/frm_dm_manoidung_form_select.php?idstyle=Form-chinh&idinput=manoidung***noidung&idfocus=chonloaisp&loaiphieu=1&plnoidung=NHAP&ma="+$("#manoidung").val().trim());
                }
            }
        }
        //////////Begin ma kho////////////////////////////
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
                    $('.dialog_main_danhmuc_sanpham').load("form/frm_dm_sanpham_from_select.php?idstyle=Form-chinh&idinput=makho***tenkho&idfocus=NhapTuKho&ma="+$("#makho").val());
                }else  if($loaisp=="CT"){
                    $('.dialog_main_danhmuc_sanpham').load("form/frm_dm_congtrinh_form_select.php?idstyle=Form-chinh&idinput=makho***tenkho&idfocus=NhapTuKho&ma="+$("#makho").val());
                }else  if($loaisp=="HD"){
                    $('.dialog_main_danhmuc_sanpham').load("form/frm_dm_hopdong_form_select.php?idstyle=Form-chinh&idinput=makho***tenkho&idfocus=NhapTuKho&ma="+$("#makho").val());
                }
                else{
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
                    if($loaisp=="") {
                        makho.val("0001");
                        tenkho.val("Toàn Bộ");
                    }else{
                        makho.val($data.masp);
                        tenkho.val($data.tensp);
                    }


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

        $("#kiemtramst").click(function (event) {// Gọi table khách hàng để chọn
            var masothue = $("#masothue").val().trim();
            if(masothue==""){
                alert("Chưa nhập mã số thuế !");
            }else {
                $.confirm({
                    buttons: {
                        'Đóng': function () {

                        }
                    },
                    content: function(){
                        var self = this;
                        self.setContent('');
                        self.setTitle('Thông báo');
                        return $.ajax({
                            url: 'modules/doannghiep/checkiscompany.php?id='+masothue,
                            dataType: 'json',
                            method: 'get'
                        }).done(function (response) {
                            $DATA = $.parseJSON(response.Data);
                            self.setContentAppend($DATA.TrangThaiHoatDong+". Cập nhật lần cuối: "+$DATA.LastUpdate);
                        });
                    }
                });
            }
        });
        //////////End ma kho////////////////////////////
        /////////Bắt đầu tk ///////////////////////////
        $(btntkno1).click(function (event) {// Gọi table khách hàng để chọn
            $tkno1 = tkno1.val().trim();
			if ($('.dialog_main_httk').html()=="") { // copy
            $('.dialog_main_httk').load("form/frm_dm_httk_form_select.php?idstyle=Form-chinh&idinput=tkno1&idfocus=ghichu&ma="+$tkno1);
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
                $('.dialog_main_httk').load("form/frm_dm_httk_form_select.php?idstyle=Form-chinh&idinput=tkno1&idfocus=ghichu&ma="+$tkno1);
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
                    ghichu.focus();
                } else {
                    $('.dialog_main_httk').load("form/frm_dm_httk_form_select.php?idstyle=Form-chinh&idinput=tkno1&idfocus=ghichu&ma="+$tkno1);
                }
            }
        }

        $(btntkno2).click(function (event) {// Gọi table khách hàng để chọn
            $tkno2 = tkno2.val().trim();
			if ($('.dialog_main_httk').html()=="") { // copy

            $('.dialog_main_httk').load("form/frm_dm_httk_form_select.php?idstyle=Form-chinh&idinput=tkno2&idfocus=ghichu&ma="+$tkno2);
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
                $('.dialog_main_httk').load("form/frm_dm_httk_form_select.php?idstyle=Form-chinh&idinput=tkno2&idfocus=ghichu&ma="+$tkno2);
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
                    $('.dialog_main_httk').load("form/frm_dm_httk_form_select.php?idstyle=Form-chinh&idinput=tkno2&idfocus=ghichu&ma="+$tkno2);
                }
            }
        }

        $(btntkco1).click(function (event) {// Gọi table khách hàng để chọn
            $tkco1 = tkco1.val().trim();
			if ($('.dialog_main_httk').html()=="") { // copy
            $('.dialog_main_httk').load("form/frm_dm_httk_form_select.php?idstyle=Form-chinh&idinput=tkco1&idfocus=ghichu&ma="+$tkco1);
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
                $('.dialog_main_httk').load("form/frm_dm_httk_form_select.php?idstyle=Form-chinh&idinput=tkco1&idfocus=ghichu&ma="+$tkco1);
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
                    $('.dialog_main_httk').load("form/frm_dm_httk_form_select.php?idstyle=Form-chinh&idinput=tkco1&idfocus=ghichu&ma="+$tkco1);
                }
            }
        }

        $(btntkco2).click(function (event) {// Gọi table khách hàng để chọn
            $tkco2 = tkco2.val().trim();
			if ($('.dialog_main_httk').html()=="") { // copy
            $('.dialog_main_httk').load("form/frm_dm_httk_form_select.php?idstyle=Form-chinh&idinput=tkco2&idfocus=ghichu&ma="+$tkco2);
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
                $('.dialog_main_httk').load("form/frm_dm_httk_form_select.php?idstyle=Form-chinh&idinput=tkco2&idfocus=ghichu&ma="+$tkco2);
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
                    $('.dialog_main_httk').load("form/frm_dm_httk_form_select.php?idstyle=Form-chinh&idinput=tkco2&idfocus=ghichu&ma="+$tkco2);
                }
            }
        }
        ////////Kết thúc tk///////////////////////////
        ///////////////////////////////////////////////////////////////////////
        $(loaict).change(function () {// Lấy tên khách hàng , địa chỉ , mst
            $loaict = loaict.val();
            if ($loaict == 1) {
                mauso.val("1");
                cothuegtgt.attr("checked", true)
            }
            if ($loaict == 2) {
                mauso.val("2");
                cothuegtgt.attr("checked", false)
            }
            if ($loaict == 3) {
                cothuegtgt.attr("checked", false)
            }
            if ($loaict == 4) {
                mauso.val("");
                cothuegtgt.attr("checked", false)
            }
			if ($loaict == 5) {
                cothuegtgt.attr("checked", false)
            }
        });

        $("#congaykhaithue").change(function () {// Lấy tên khách hàng , địa chỉ , mst
            if ($("#congaykhaithue").is(":checked")) {
                $("#ngaykhaithue").attr("disabled", false);
            }else{
                $ngayhoadon = $("#ngayhoadon").val();
                $("#ngaykhaithue").val($ngayhoadon);
                $("#ngaykhaithue").attr("disabled", true);
            }
        });


        $(ngayhoadon).focus(function () {
            if (ngayhoadon.val() == "") {
                ngayhoadon.val(ngayghiso.val());
            }
        });

        $(ngayhoadon).focusout(function () {
            var date_hoadon = new Date(ngayhoadon.val());
            var date_khaithue = new Date($("#ngaykhaithue").val());
            var date_ghiso = new Date(ngayghiso.val());

            var ngaykhaithue_ngayhoadon = (date_khaithue.getTime() - date_hoadon.getTime());
            var ngayghiso_ngayhoadon = (date_ghiso.getTime() - date_hoadon.getTime());
            var ngaykhaithue_ngayghiso = (date_khaithue.getTime() - date_ghiso.getTime());

            if ($("#congaykhaithue").is(":checked")) {
                if (ngayghiso_ngayhoadon >= 0) {
                    if (ngaykhaithue_ngayghiso < 0 && date_khaithue=="") {
                        $("#ngaykhaithue").val(ngayghiso.val());
                    }
                } else {
                    if (ngaykhaithue_ngayhoadon < 0 && date_khaithue=="") {
                        $("#ngaykhaithue").val(ngayhoadon.val());
                    }
                }

            } else {
                if (ngayghiso_ngayhoadon >= 0) {
                    $("#ngaykhaithue").val(ngayghiso.val());
                } else {
                    $("#ngaykhaithue").val(ngayhoadon.val());
                }
            }
        });
        $(ngayghiso).focusout(function () {
            var date_hoadon = new Date(ngayhoadon.val());
            var date_khaithue = new Date($("#ngaykhaithue").val());
            var date_ghiso = new Date(ngayghiso.val());

            var ngaykhaithue_ngayhoadon = (date_khaithue.getTime() - date_hoadon.getTime());
            var ngayghiso_ngayhoadon = (date_ghiso.getTime() - date_hoadon.getTime());
            var ngaykhaithue_ngayghiso = (date_khaithue.getTime() - date_ghiso.getTime());

            if ($("#congaykhaithue").is(":checked")) {
                if (ngayghiso_ngayhoadon >= 0) {
                    if (ngaykhaithue_ngayghiso < 0 && date_khaithue=="") {
                        $("#ngaykhaithue").val(ngayghiso.val());
                    }
                } else {
                    if (ngaykhaithue_ngayhoadon < 0 && date_khaithue=="") {
                        $("#ngaykhaithue").val(ngayhoadon.val());
                    }
                }

            } else {
                if (ngayghiso_ngayhoadon >= 0) {
                    $("#ngaykhaithue").val(ngayghiso.val());
                } else {
                    $("#ngaykhaithue").val(ngayhoadon.val());
                }
            }
        });

        //---------------------End ma nội dung--------------
		
		function load_cb_khohang(){
			$.ajax({
					url: $dir_module_makho + "listall_cb.php",
					async: false,
					success: function (response) {
						$("#NhapTuKho").html(response);
					}
				});	
		}
		load_cb_khohang();

        function checkSTT(STT) {// Check key khi nhấn enter
            $STT = STT.val().trim();
            $sophieu = sophieu.val().trim();
			$manoidungcu ="";
			$noidungcu ="";
            var $LoaiPhieu = 1;// Phiếu nhập kho

            if ($STT == "") {//Nếu số thứ tự null sẽ tạo số mới tự động tăng theo mã
                var $data;
                var $sophieu = 1;
                function create() {
                $.ajax({
                    url: $dir_module_nhapkho + "taomapskt.php",
                    async: false,
                    data: {lp: $LoaiPhieu},
                    success: function (response) {
                        $data = (response.trim());
                        STT.val(($data));
                    }
                });
                $.ajax({// Tạo số phiếu
                    url: $dir_module_nhapkho + "taosophieu.php",
                    async: false,
                    data:{mapskt:parseInt($data),loaiphieu:$LoaiPhieu},
                    success: function (response) {
                        $sophieu = (response.trim());
                        sophieu.val($sophieu);
                        $("#gird_chitiet_nhapkho").load("form/gird_chitiet_nhapkho.php?sophieu="+$sophieu+"&list=0");
                    }
                });
				notdisabledInput();
                }
                var number = Math.floor(Math.random() * 2000);
                setTimeout(create,number);
				$("#ngayghiso").attr("disabled", false);

				$("#dangthem").val("add");
                STT.attr("disabled", true);
                btnstt.attr("disabled", true);
				$("#baogomthue").attr("checked",false);


                $ngayghiso = layngayghiso($LoaiPhieu);
                $("#ngayghiso").val($ngayghiso);

                $("#ngayhoadon").val("");
                $("#congaykhaithue").attr("checked", false);
                $("#ngaykhaithue").val("");
                $("#sohoadon").val("");
                $("#loaihanghoadichvu").val(1);
				$("#chungtugoc").attr("checked", false);
                $("#duandautu").attr("checked", false);

                $("#chiphikhongloaitru").attr("checked", false);
				$("#chietkhaudoanhso").val("0");
				$("#khaichinhthuc").attr("checked", true);
                ngayghiso.focus();

            } else {// Nếu không trống kiểm tra xem có tồn tại hay không
                var $checkphieuthuchi = 0;
                $.ajax({// Kiểm tra xem STT có tồn tại hay không
                    url: $dir_module_nhapkho + "checkkey.php",
                    data: {ma: $STT, lp: $LoaiPhieu},
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
                                            data: {lp: $LoaiPhieu,mapskt:($STT)},
                                            success: function (response) {
                                            }
                                        });
                                        $.ajax({// Tạo số phiếu
                                            url: $dir_module_nhapkho + "taosophieu.php",
                                            async: false,
                                            data:{mapskt:parseInt($STT),loaiphieu:$LoaiPhieu},
                                            success: function (response) {
                                                $sophieu = response;
                                            }
                                        });
                                        $sophieu = $sophieu.trim();
                                        sophieu.val($sophieu);
										
										$("#dangthem").val("add");
                                        $("#gird_chitiet_nhapkho").load("form/gird_chitiet_nhapkho.php?sophieu="+$sophieu+"&list=0");
                                        $ngayghiso = layngayghiso($LoaiPhieu);
                                        $("#ngayghiso").val($ngayghiso);

                                        $("#loaihanghoadichvu").val(1);
                                        $("#ngayhoadon").val("");
                                        $("#congaykhaithue").attr("checked", false);
                                        $("#ngaykhaithue").val("");
                                        $("#sohoadon").val("");

										$("#chungtugoc").attr("checked", false);
										$("#chiphikhongloaitru").attr("checked", false);
										$("#chietkhaudoanhso").val("0");
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
                    $sophieu =$data.sophieu;
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

                    $manoidungcu = $data.mand;
                    $noidungcu = $data.noidung;

                    makho.val($data.makho);
                    tenkho.val($data.tenkho);
                    $NhapTuKho = $data.kho.trim();
				

                    $("#NhapTuKho").val($NhapTuKho);
                    $("#chonloaisp").val($data.loaisp);

                    $("#ChiNhanhCongTy").val($data.machinhanh);

                    tienhang.val(FormatNumber($data.tienhang));
                    //console.log($data.tienhang);
                    $("#tienchietkhau").val(FormatNumber($data.tienchietkhau));
                    $("#phimoitruong").val(FormatNumber($data.phimoitruong));
					$("#chietkhaudoanhso").val($.number($data.chietkhaudoanhso,0,".",","));
                    laydinhkhoan_chitietpsvt();
                    tienthue.val(FormatNumber($data.tienthue));
                    tongcong.val(FormatNumber($data.tongcong));
                    if($data.cothuegtgt==1){
                        cothuegtgt.attr("checked",true);
                    }else{
                        cothuegtgt.attr("checked",false);
                    }/////
                    if($data.cochietkhau==1){
                        $("#chietkhau").attr("checked",true);
                    }else{
                        $("#chietkhau").attr("checked",false);
                    }/////
                    if($data.cobaogomthue==1){
                        $("#baogomthue").attr("checked",true);
                    }else{
                        $("#baogomthue").attr("checked",false);
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
					
					$loaitokhai = $data.loaitokhai;
                    if ($loaitokhai == 1) {
                        $("#khaichinhthuc").attr("checked", true);
                    } else {
                        $("#khaibosung").attr("checked", true);
                    }

                    if ($data.duandautu == 1) {
                        $("#duandautu").attr("checked", true);
                    } else {
                        $("#duandautu").attr("checked", false);
                    }/////

                    $congaykhaithue = $data.congaykhaithue;
                    if ($congaykhaithue == 1) {
                        $("#congaykhaithue").attr("checked", true);
                        $("#ngaykhaithue").attr("disabled", false);
                    } else {
                        $("#congaykhaithue").attr("checked", false);
                        $("#ngaykhaithue").attr("disabled", true);
                    }
                    $("#ngaykhaithue").val($data.ngaykhaithue);
                    $("#loaihanghoadichvu").val($data.loaihanghoadichvu);
                    $("#gird_chitiet_nhapkho").load("form/gird_chitiet_nhapkho.php?sophieu="+$sophieu+"&list=0");


                    ghichu.val($data.chuthich);
                    ngayghiso.focus();
                }
            }
        }
        function laydinhkhoan_chitietpsvt(){
            $sophieu = $("#sophieu").val();
            $.ajax({// Kiểm tra xem STT có tồn tại hay không
                url: $dir_module_nhapkho + "laythongtintabledinhkhoan.php",
                data: {sophieu: $sophieu},
                async: false,
                success: function (response) {
                    $data = $.parseJSON(response);
                }
            });
            $tongtien=0;
            $tongcong=0;
            $tonghang=0;
            $tongthue=0;
			$tongtiennt=0;
            $lengh = $data.length;
            $.each($data, function(i, item) {
                i++;
                $("#tkno"+i).val(item.tkno);
                $("#tkco"+i).val(item.tkco);
                $sotien = item.sotien;
				$sotiennt = item.sotiennt;
                $("#sotien"+i).val(FormatNumber($sotien.toString()));
				$("#sotiennt"+i).val(FormatNumber($sotiennt.toString()));
                $tongtien+=parseFloat($sotien);
				$tongtiennt+=parseFloat($sotiennt);
                if(i<$lengh){
                    $tonghang+=parseFloat($sotien);
                }
            });
            $tongthue = $data[$lengh-1].sotien;
            $("#tongtien").val(FormatNumber($tongtien.toString()));
			$("#tongtiennt").val(FormatNumber($tongtiennt.toString()));
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
            $("#ngaykhaithue").attr("disabled", true);
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
            $("#masothue").attr("disabled", false);

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

        /////// Giảm theo nghị quyết///////////////////////////////////
        function giam30theonghidinh(){
            var $ThueSuatGiamTheoNghiQuyet = 1;
            var giam30thuegtgt = $("#giam30theonghiquyet").is(":checked");
            $TuNgayGiamThue  = new Date("2021/11/01");
            $TuNgayGiamThue_20  = new Date("2022/02/01");
            $TuNgayGiamThue_12  = new Date("2023/07/01");
            $DenNgayGiamThue = new Date("2021/12/31");
            $DenNgayGiamThue_20 = new Date("2023/01/01");
            $DenNgayGiamThue_12 = new Date("2027/01/01");
            $NgayLapHoaDon = new Date($("#ngayhoadon").val());
            if(giam30thuegtgt==true && ($NgayLapHoaDon.getTime()>=$TuNgayGiamThue.getTime() && $NgayLapHoaDon.getTime()<=$DenNgayGiamThue.getTime())){
                $ThueSuatGiamTheoNghiQuyet = 0.7;
            }else if(giam30thuegtgt==true && ($NgayLapHoaDon.getTime()>=$TuNgayGiamThue_20.getTime() && $NgayLapHoaDon.getTime()<=$DenNgayGiamThue_20.getTime())) {
                $ThueSuatGiamTheoNghiQuyet = 0.8;
            }else if(giam30thuegtgt==true && ($NgayLapHoaDon.getTime()>=$TuNgayGiamThue_12.getTime() && $NgayLapHoaDon.getTime()<=$DenNgayGiamThue_12.getTime())) {
                $ThueSuatGiamTheoNghiQuyet = 0.8;
            }
            return $ThueSuatGiamTheoNghiQuyet;
        }
        /////// Kết thúc Giảm theo nghị quyết///////////////////////////////////

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
            $tkno1 = $("#tkno1").val();
            $tkno2 = $("#tkno2").val();
            $tkco1 = $("#tkco1").val();
            $tkco2 = $("#tkco2").val();
            $NgayGhiSo = new Date($("#ngayghiso").val());
            $KyKeToan_TuNgay = new Date("<?php echo $_SESSION['kyketoan_tungay']; ?>");
            $KyKeToan_DenNgay = new Date("<?php echo $_SESSION['kyketoan_denngay']; ?>");
            $NamGhiSo = $NgayGhiSo.getTime();
            $NamKyKeToan_TuNgay = $KyKeToan_TuNgay.getTime();
            $NamKyKeToan_denNgay = $KyKeToan_DenNgay.getTime();

            if ($NamGhiSo<$NamKyKeToan_TuNgay || $NamGhiSo>$NamKyKeToan_denNgay){
                alert("Ngày ghi sổ không nằm trong năm tài chính <?php echo $_SESSION['NienDo']; ?> ! Vui lòng nhập lại .");
                ngayghiso.focus();
                return false;
            }

            {
                $ngayghisovuot = false;
                var apicall = 'nowtime.php';
                $.ajax({
                    url: apicall,
                    method: 'GET',
                    async: false,
                    success: function (data) {
                        $res = $.parseJSON(data);
                        var dserver = new Date($res.currentDateTime);
                        var dclient = new Date($("#ngayghiso").val());
                        var timeSerVer = dserver.getTime();
                        var timeClient = dclient.getTime();
						
                        $HieuSo = timeSerVer - timeClient;
                        if ($HieuSo < 0) {
                            $ngayghisovuot = true;
                        }
                    }
                });
                if ($ngayghisovuot) {
                    alert("CHÚ Ý \n\n Ngày ghi sổ không được vượt quá ngày hiện hành ! Vui lòng nhập lại .");
                    $("#ngayghiso").focus();
                    return false;
                }

                $ngayhoadonvuot = false;
                $.ajax({
                    url: apicall,
                    method: 'GET',
                    async: false,
                    success: function (data) {
                        $res = $.parseJSON(data);
                        var dserver = new Date($res.currentDateTime);
                        var dclient = new Date($("#ngayhoadon").val());
                        var timeSerVer = dserver.getTime();
                        var timeClient = dclient.getTime();
                        $HieuSo = timeSerVer - timeClient;
                        if ($HieuSo < 0) {
                            $ngayhoadonvuot = true;
                        }
                    }
                });
                if ($ngayhoadonvuot) {
                    alert("CHÚ Ý \n\n Ngày hóa đơn không được vượt quá ngày hiện hành ! Vui lòng nhập lại .");
                    $("#ngayhoadon").focus();
                    return false;
                }
            }
            $tongtien = parseFloat($("#tongtien").val().replace(/,/g, ""));
            {
                allFields.removeClass("ui-state-error");// kiem tra du lieu

                valid = valid && checkNull(STT, " Số TT  ");
                $loaict=1;
                $loaict = $("#loaict").val();
                if ($loaict == 1 || $loaict==2) {
                    valid = valid && checkNull(mauso, " Mẫu số hoá đơn  ");
                    var Reg_MauSo = new RegExp("^[0-9a-zA-Z_./-]{0,14}$");
                    valid = valid && checkRegexp(mauso,Reg_MauSo, " Mẫu số hoá đơn không được có khoảng trắng .");
                    valid = valid && checkNull(kyhieu, " Ký hiệu hoá đơn  ");
                    valid = valid && checkNull(sohoadon, " Số hoá đơn  ");
                    valid = valid && checkNull($('#diachi'), " Địa chỉ khách hàng  ");
                }

                $masothue = masothue.val().trim();
                if($masothue!=""){
                    var Reg_masothue = new RegExp("^[0-9-]{10,14}$");
                    valid = valid && checkRegexp(masothue,Reg_masothue, " Mã số thuế không đúng định dạng .");
                }
                valid = valid && checkNull($('#ChiNhanhCongTy'), " Chi nhánh ");
                valid = valid && checkNull(ngayghiso, " Ngày ghi sổ  ");
                valid = valid && checkNull(ngayhoadon, " Ngày hoá đơn  ");
                valid = valid && checkNull($('#ngaykhaithue'), " Ngày khai thuế  ");
                valid = valid && checkNull(makhachhang, " Mã khách hàng ");
				valid = valid && checkNull($('#tenkhachhang'), " Tên khách hàng  ");
                valid = valid && checkNull(manoidung, " Mã nội dung ");
                valid = valid && checkNull(makho, " Mã kho ");
                valid = valid && checkNull(tkco1, " Tài khoản có ");
                valid = valid && checkNull(tkno1, " Tài khoản nợ ");
                valid = valid && checkChonCapTongHop('makh','makhcha',$('#makhachhang'),'Mã khách hàng ');

                for (let i = 1; i <= 5; i++) {
                    const tkco = $("#tkco" + i);
                    const tkno = $("#tkno" + i);

                    if (tkco.val() !== "") {
                        valid = valid && checkChonCapTongHop('matk', 'matkcha', tkco, tkco.val());
                    }
                    if (tkno.val() !== "") {
                        valid = valid && checkChonCapTongHop('matk', 'matkcha', tkno, tkno.val());
                    }
                }

                if(checkSoHoaDonTrung().trim()!="K"){
                    $thongbao = checkSoHoaDonTrung();
                    var result = confirm($thongbao);
                    if (result) {
                        valid = valid && true;
                    }else{
                        valid = valid && false;
                        $("#sohoadon").focus();
                    }
                }

                if(checkSoHoaDonTrung_Vuot().trim()!="K"){
                    $thongbao = checkSoHoaDonTrung_Vuot();
                    var result1 = confirm($thongbao);
                    if (result1) {
                        valid = valid && true;
                    }else{
                        valid = valid && false;
                        $("#sohoadon").focus();
                    }
                }

                $LoaiPhieu = 1;// Nhập kho
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
				//// Thông báo nếu là tờ khai bổ sung

                if ($loaitokhai==0) {
                    var result = confirm("Bạn đang chọn tờ khai bổ sung ! Bạn có muốn tiếp tục nhập ?");
                    if(result==false){
                        $("#sohoadon").focus();
                        return false;
                    }
                }

                var $congaykhaithue = 0;
                if ($("#congaykhaithue").is(":checked")) {
                    $congaykhaithue = 1;
                }
                var $ngaykhithue = $("#ngaykhaithue").val();

                $check_luu = (kiemtrakhoadulieu(ngayghiso.val().trim(),1,STT.val().trim()));
                if($check_luu!=""){
                    alert($check_luu);
                    return false;
                }

                var date_hoadon = new Date(ngayhoadon.val());
                var date_ghiso = new Date(ngayghiso.val());

                var ngayghiso_ngayhoadon = (date_ghiso.getTime() - date_hoadon.getTime());
                if(ngayghiso_ngayhoadon<0){
                    $thongbao = "";
                    $thongbao = "CHÚ Ý \n\n Ngày ghi sổ hạch toán trước ngày hóa đơn . Tiền thuế GTGT sẽ được hạch toán theo ngày hóa đơn hoặc ngày khai thuế . \n\n Bạn có muốn tiếp tục không ?";
                    var result1 = confirm($thongbao);
                    if (!result1) {
                        return false;
                    }
                }

                if (($tkco1==$tkno1 && $tkco1!="" && $tkno1!="")||($tkco2==$tkno2 && $tkco2!="" && $tkno2!="") ) {
                    $thongbao = "";
                    $thongbao = "CẢNH BÁO \n Tài khoản đối ứng giống nhau . Bạn có muốn tiếp tục không ?";
                    var result1 = confirm($thongbao);
                    if (!result1) {
                        return false;
                    }
                }
                $DuAnDauTu = 0;
                if ($("#duandautu").is(":checked")) {
                    $DuAnDauTu = 1;
                }
				$kiemtrakhackykekhai = kiemtrakhackykekhai();
				if (!$kiemtrakhackykekhai && ($loaict == 1)) {
					$thongbao = "";
                    $thongbao = "CẢNH BÁO \n Hoá đơn kê khai không cùng kỳ kê khai thuế. Bạn có muốn tiếp tục không ?";
                    var result1 = confirm($thongbao);
                    if (!result1) {
						$("#ngayhoadon").focus();
                        return false;
                    }
				}
                if (valid) {
                    $mauso = mauso.val().trim().toUpperCase();
                    $kyhieu = kyhieu.val().trim().toUpperCase();
                    $.ajax({
                        url: $dir_module_nhapkho + "nhapkho.php", // Bao gồm cả add và edit
                        type: "get", // chọn phương thức gửi là get
                        dateType: "text", // dữ liệu trả về dạng text
                        data: { // Danh sách các thuộc tính sẽ gửi đi
                            STT: STT.val().trim(),
                            ngayghiso: ngayghiso.val().trim(),
                            loaict: loaict.val().trim(),
                            mauso: $mauso,
                            kyhieu: $kyhieu,
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
                            thanhtienmt: $("#phimoitruong").val().trim(),
                            tongtien: tongtien.val().trim(),
                            sotiennt1: $("#sotiennt1").val().trim(),
                            sotiennt2: $("#sotiennt2").val().trim(),
                            sotiennt3: $("#sotiennt3").val().trim(),
                            tongtiennt: $("#tongtiennt").val().trim(),
                            tienhang: tienhang.val().trim(),
                            tienchietkhau: tienchietkhau.val().trim(),
                            tienthue: tienthue.val().trim(),
                            tongcong: tongcong.val().trim(),
                            ghichu: ghichu.val().trim(),
                            NhapTuKho: $("#NhapTuKho").val(),
							chietkhaudoanhso: $("#chietkhaudoanhso").val(),
							chungtugoc: $chungtugoc,
							chiphikhongloaitru: $chiphikhongloaitru,
							loaitokhai: $loaitokhai,
                            loaisp:$("#chonloaisp").val(),
                            dathem: 1,
                            congaykhaithue: $congaykhaithue,
                            ngaykhaithue: $ngaykhithue,
                            loaihanghoadichvu: $("#loaihanghoadichvu").val(),
                            duandautu:$DuAnDauTu,
                            chinhanh:$("#ChiNhanhCongTy").val()

                        },
                        success: function (result) {
                            $('.dialog_main_thongbao').load('form/frm_thongbao_nhapkho.php?loaiphieu=' + $LoaiPhieu + '&ngayhd=' + ngayhoadon.val().trim() + '&sophieu=' + STT.val().trim() + '&tenkho=' + encodeURI(tenkho.val().trim()));
                        }
                    });
                }
            }

            return valid;
        }

        function xoadialog_nhapkho() {// đóng form
            reset_dialog(".dialog-nhapkho");
            reset_dialog(".dialog_main_nhapkho");
        }

        dialog = $("#dialog-nhapkho").dialog({
            autoOpen: false,
            height: "auto",
            width: $width,
            modal: true,
            buttons: {
                "Đồng ý(F4)": ChucNang_nhapkho,
                "Kết thúc": function () {
					$sott = $("#STT").val();
					if($sott!=""){
						$.ajax({// Xóa các chi tiết không tồn tại
							url: $dir_module_chitiet_vattu + "delpsctvt.php",
							async: false,
							success: function (response) {
								//$data = response;
							}
						});
					}
                    $('.dialog_main_thongbao').load('form/frm_thongbao_nhapkho_thoat.php');
                }
            }
        });
        dialog.dialog("open");

    });
</script>