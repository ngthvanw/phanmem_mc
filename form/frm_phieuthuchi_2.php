<?php
require("../config.php");
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
        z-index: 999999999 !important;
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
<div id="dialog-phieuthuchi" title="TIỀN MẶT, TIỀN GỞI NGÂN HÀNG...">
    <p class="validateTips">&nbsp;</p>
    <form method="post" id="Form-chinh" enctype="multipart/form-data">
        <fieldset style="background-color: #afd9ee">
            <table class="table-dialog" style="vertical-align: middle;width: 780PX" border="0">
                <tr>
                    <td width="22" style="padding: 2px;text-align:center"><input type="radio" name="loaiphieu"
                                                                                 id="phieuthu"
                                                                                 value="phieuthu"/></td>
                    <td width="72">
                        <label for="name2">Phiếu thu</label>
                    </td>
                    <td width="22" style="padding: 2px;;text-align:center"><input name="loaiphieu" type="radio"
                                                                                  id="phieuchi" value="phieuchi"
                                                                                  checked="checked"/></td>
                    <td width="220">
                        <label for="name3">Phiếu chi</label>
                    </td>
                    <td width="59" style="padding: 2px"><input type="button" name="btntkco" id="btntkco" class="button"
                                                               value="TK có..."/></td>
                    <td width="309"><span style="padding: 2px">
                      <input type="text" name="tkco" value="1111" id="tkco" list="listmataikhoan" required="required"
                             style="width: 15%"
                             placeholder="Mã TK" class="text ui-widget-content ui-corner-all"/>
                             <datalist id="listmataikhoan"></datalist>
                      <input name="tentkco" type="text" disabled="disabled" required="required"
                             class="text ui-widget-content ui-corner-all" id="tentkco"
                             placeholder="Tài khoản" style="width: 82%" value="Tiền Việt Nam"/>
                    </span></td>

                </tr>
            </table>
            <table border="0" class="table-dialog" style="vertical-align: middle;width: 780PX">
                <tr>
                    <td align="right" valign="middle" width="" style="padding: 2px;text-align:right"><input
                                type="button" name="btnstt" id="btnstt" class="button" value="Số TT..."/></td>
                    <td width="17%">
                        <input type="number" name="STT" id="STT" min="1" value="" style="width: 100%"
                               placeholder="Số TT" class="text ui-widget-content ui-corner-all"/>
                        <input type="hidden" name="sophieu" id="sophieu" value="" style="width: 100%"
                               placeholder="Số TT" class="text ui-widget-content ui-corner-all"/>
                    </td>
                    <td width="12%" style="padding: 2px">
                        <label for="name"> Ngày ghi sổ</label>
                    </td>
                    <td width="29%">
                        <input type="date" name="ngayghiso" value="<?php echo date("Y-m-d") ?>" id="ngayghiso"
                               required="require"
                               placeholder="Ngày ghi sổ" class="text ui-widget-content ui-corner-all"/>
                    </td>
                    <td width="11%" style="padding: 2px">&nbsp;</td>
                    <td width="20%">&nbsp;</td>

                </tr>
            </table>
            <table class="table-dialog" style="vertical-align: middle;width: 780PX" border="0">
                <tr>
                    <td width="11%" style="padding: 2px">
                        <label for="name"> Khách hàng:</label>
                    </td>
                    <td colspan="3" style="padding: 2px"><input type="hidden" class="button" name="btnmakh" id="btnmakh"
                                                                value="..."/>
                        <input type="text" onkeyup="return KhuDauTiengViet(this.value,'#makhachhang')"
                               name="makhachhang" value="" id="makhachhang" list="listmakhachhang" required
                               style="width: 20%"
                               placeholder="Mã KH" class="text ui-widget-content ui-corner-all"
                        />
                        <datalist id="listmakhachhang"></datalist>
                        <input name="tenkhachhang" type="text" required
                               class="text ui-widget-content ui-corner-all" id="tenkhachhang"
                               placeholder="Tên khách hàng"
                               style="width: 76%"/></td>
                </tr>
                <tr>
                    <td style="padding: 2px"><label for="name"> Địa chỉ :</label></td>
                    <td width="41%" style="padding: 2px"><input type="text" name="diachi" value="" id="diachi" required
                                                                placeholder="Địa chỉ"
                                                                class="text ui-widget-content ui-corner-all"/></td>
                    <td width="8%" colspan="-2" style="padding: 2px">
                        <label for="name"> MST</label></td>
                    <td width="40%" colspan="-2">
                        <input type="text" name="masothue" value="" id="masothue" required
                               placeholder="Mã số thuế" class="text ui-widget-content ui-corner-all"/>
                    </td>

                </tr>
            </table>
        </fieldset>
        <fieldset style="background-color: #afd9ee">
            <legend>Chi tiết phát sinh</legend>
            <table class="table-dialog" style="vertical-align: middle;width: 780PX" border="0">
                <tr>
                    <td><input name="datamau" type="hidden" id="datamau" value=""/></td>
                    <td style="text-align:right"><input type="button" class="button" style="margin-right:3px;"
                                                        name="btnthem" id="btnthem" value="Thêm"/>&nbsp;
                        <input type="button" class="button" style="margin-right:3px;" disabled="disabled" name="btnxoa"
                               id="btnxoa"
                               value="Xóa"/>&nbsp;
                        <input type="button" disabled="disabled" class="button" style="margin-right:3px;"
                               name="btnvedau" id="btnvedau"
                               value="Về đầu"/>
                        <input type="button" class="button" disabled="disabled" style="margin-right:3px;"
                               name="btnvetruoc" id="btnvetruoc"
                               value="Về trước"/>&nbsp;
                        <input type="button" class="button" disabled="disabled" style="margin-right:3px;"
                               name="btnketiep" id="btnketiep"
                               value="Kế tiếp"/>&nbsp;&nbsp;
                        <input type="button" class="button" style="margin-right:3px;" disabled="disabled"
                               name="btnvecuoi" id="btnvecuoi"
                               value="Về cuối"/>&nbsp;
                        <input type="button" class="button" disabled="disabled" name="btntim" id="btntim" value="Tìm"/>
                    </td>
                </tr>
                <tr>
                    <td width="220" style="padding: 2px">
                        <table width="100%" border="0">
                            <tr>
                                <td width="29%"><label for="name4">Loại CT</label></td>
                                <td width="71%"><select name="loaict" size="1" style="width: 100%;height:20px;"
                                                        id="loaict"
                                                        class="text ui-widget-content ui-corner-all">
                                        <option value="1" selected="selected">Hóa đơn GTGT</option>
                                        <option value="2">Hóa đơn bán hàng</option>
                                        <option value="3">Bảng kê 01/ TNDN</option>
                                        <option value="4">Chứng từ khác</option>
                                    </select></td>
                            </tr>
                            <tr>
                                <td><label for="name5"> Mẫu số</label></td>
                                <td><input style="text-transform: uppercase" type="text" name="mauso"
                                           value="01GTKT1-001"
                                           id="mauso" required="require"
                                           placeholder="Mẫu số" class="text ui-widget-content ui-corner-all"/>
                                </td>
                            </tr>
                            <tr>
                                <td><label for="name5"> Ký hiệu</label></td>
                                <td><input style="text-transform: uppercase" type="text" name="kyhieu" value=""
                                           id="kyhieu" required="require"
                                           placeholder="Ký hiệu" class="text ui-widget-content ui-corner-all"/>
                                    <input type="hidden" id="sottpsct" value=""/>
                                </td>
                            </tr>
                            <tr>
                                <td><label for="name6"> Số HĐ </label></td>
                                <td><input type="text" name="sohoadon" value="" id="sohoadon" required="require"
                                           placeholder="Số hóa đơn" class="text ui-widget-content ui-corner-all"/></td>
                            </tr>
                            <tr>
                                <td><label for="name7"> Ngày HĐ</label></td>
                                <td><input type="date" name="ngayhoadon" value="" id="ngayhoadon" required="require"
                                           style="width: 100%"
                                           placeholder="Ngày hóa đơn" class="text ui-widget-content ui-corner-all"/>
                                </td>
                            </tr>
                        </table>
                    </td>
                    <td width="494" style="padding: 2px">
                        <table width="100%" border="0">
                            <tr>
                                <td><label for="name8"> Khách hàng:</label></td>
                                <td colspan="2"><input type="hidden" class="button" name="btnmakh2" id="btnmakh2"
                                                       value="..."/>
                                    <input type="text" onkeyup="return KhuDauTiengViet(this.value,'#makhachhang2')"
                                           name="makhachhang2" list="listmakhachhang2" id="makhachhang2"
                                           required="required" style="width: 25%"
                                           placeholder="Mã KH" class="text ui-widget-content ui-corner-all"
                                    />
                                    <datalist id="listmakhachhang2"></datalist>
                                    <input name="tenkhachhang2" type="text" required="required"
                                           class="text ui-widget-content ui-corner-all" id="tenkhachhang2"
                                           placeholder="Tên khách hàng"
                                           style="width: 69%"/></td>
                            </tr>
                            <tr>
                                <td><label for="name9"> Địa chỉ :</label></td>
                                <td><input type="text" name="diachi2" value="" id="diachi2" required="required"
                                           placeholder="Địa chỉ"
                                           class="text ui-widget-content ui-corner-all"/></td>
                                <td>
                                    <table width="100%" border="0">
                                        <tr>
                                            <td width="15%" style="text-align:center" valign="middle"><input
                                                        name="mangsang" type="checkbox" class="checkbox"
                                                        id="mangsang" value="1"/></td>
                                            <td width="85%"><label for="name10">Mang sang</label></td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td><select class="text ui-widget-content ui-corner-all" id="chonloaisp"
                                            style="width: 100%;height:20px;">
                                        <option value="">Không có SP/CT</option>
                                        <option value="SP">Sản Phẩm</option>
                                        <option value="CT">Công Trình</option>
                                    </select></td>
                                <td colspan="2" id="users-contain"><input type="hidden" class="button" name="btnbophan"
                                                                          id="btnbophan"
                                                                          value="..."/>
                                    <input type="text" name="mabophan" value="0001"
                                           required="required" style="width: 20%"
                                           placeholder="Mã BP" list="listmabophan" id="mabophan"
                                           class="text ui-widget-content ui-corner-all"
                                    />
                                    <datalist id="listmabophan"></datalist>
                                    <input name="bophan" type="text" required="required"
                                           class="text ui-widget-content ui-corner-all" id="bophan"
                                           placeholder="Nội dung"
                                           style="width: 74%" value="Toàn bộ"/></td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <table width="100%" border="0">
                                        <tr>
                                            <td width="4%"><input name="cothuegtgt" type="checkbox" class="checkbox"
                                                                  id="cothuegtgt" value="1" checked="checked"/></td>
                                            <td width="21%"><b style="font-size: 12px;">&nbsp;Có thuế GTGT</b></td>
                                            <td width="4%"><input name="baogonthue" type="checkbox" class="checkbox"
                                                                  id="baogomthue" value="1"/></td>
                                            <td width="21%"><b style="font-size: 12px;">&nbsp;Bao gồm thuế</b></td>
                                            <td width="4%"><input name="chungtugoc" type="checkbox" class="checkbox"
                                                                  id="chungtugoc" value="1"/></td>
                                            <td width="21%"><b style="font-size: 12px;"><abbr
                                                            title="THIẾU CHỨNG TỪ GỐC">&nbsp;Thiếu CT gốc<abbr></b></td>
                                            <td width="4%"><input name="chiphikhongloaitru" type="checkbox"
                                                                  class="checkbox"
                                                                  id="chiphikhongloaitru" value="1"/></td>
                                            <td width="21%"><b style="font-size: 12px;"><abbr
                                                            title="CHI PHÍ KHÔNG ĐƯỢC TRỪ">&nbsp;CP Không ĐT<abbr></b>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td width="4%">&nbsp;</td>
                                            <td colspan="2">
                                                <table width="100%" border="0">
                                                    <tr>
                                                        <td width="35%"><b style="font-size: 12px;">Tỷ giá:&nbsp;</b>
                                                        </td>
                                                        <td width="65%"><input type="text"
                                                                               class="text ui-widget-content ui-corner-all"
                                                                               style="width:100%;text-align:right"
                                                                               name="tygia" id="tygia"
                                                                               onkeyup="return format_munber(this.value,'#tygia')"/>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td width="21%">&nbsp;</td>
                                            <td width="4%">&nbsp;</td>
                                            <td colspan="2" align="right">&nbsp;</td>
                                            <td width="21%">&nbsp;</td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </fieldset>
        <fieldset style="background-color: #afd9ee">
            <legend>Nội dung</legend>
            <table class="table-dialog" style="vertical-align: middle;width: 780px" border="0">
                <tr>
                    <td style="padding: 2px">
                        <table width="100%" border="0">
                            <tr>
                                <td width="5%">&nbsp;</td>
                                <td width="15%"><label for="name12">Nội dung</label></td>
                                <td width="19%"><label id="lbltranghientai" for="name15"></label></td>
                                <td width="5%"><input name="loaitokhai" type="radio" id="khaichinhthuc"
                                                      checked="checked"/></td>
                                <td width="25%"><label for="name12">Khai lần 1</label></td>
                                <td width="5%"><input type="radio" name="loaitokhai" id="khaibosung"/></td>
                                <td width="25%"><label for="name12">Khai bổ sung</label></td>
                            </tr>
                        </table>
                    </td>
                    <td style="padding: 2px">
                        <table width="100%" border="0">
                            <tr>
                                <td width="9%">&nbsp;</td>
                                <td width="19%"><label id="lbltkno" for="name13"> TK nợ</label></td>
                                <td width="36%"><label for="name14" style="width:100%">Số tiền VN</label></td>
                                <td width="36%"><label for="name14" style="width:100%">Số tiền NT</label></td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td width="63%" style="padding: 2px"><input type="hidden" name="btnnoidung1" id="btnnoidung1"
                                                                class="button" value="..."/>
                        <input type="text" name="manoidung1" list="listmanoidung1" value="" id="manoidung1"
                               required="required"
                               style="width: 15%"
                               placeholder="Mã ND" class="text ui-widget-content ui-corner-all"/>
                        <input type="hidden" name="manoidung1copy" value="" id="manoidung1copy" required="required"
                               style="width: 15%"
                               placeholder="Mã ND" class="text ui-widget-content ui-corner-all"/>
                        <datalist id="listmanoidung1"></datalist>
                        <input type="text" name="noidung1" id="noidung1" required="required" style="width: 78%"
                               placeholder="Nội dung" class="text ui-widget-content ui-corner-all"/>
                        <input type="button" name="CTCT" id="CTCT" class="button" title="Nhập chi tiết công trình"
                               value="CT" disabled="disabled"/></td>
                    <td width="37%" style="padding: 2px">
                        <table width="100%" border="0">
                            <tr>
                                <td width="9%"><input type="button" name="btntkno1" id="btntkno1"
                                                      class="button"
                                                      value="..."/></td>
                                <td width="19%"><input type="text" name="tkno1" id="tkno1" value="" style="width: 100%"
                                                       class="text ui-widget-content ui-corner-all"/></td>
                                <td width="36%"><input name="sotien1" type="text"
                                                       onkeyup="return format_munber(this.value,'#sotien1')"
                                                       class="text ui-widget-content ui-corner-all" id="sotien1"
                                                       style="width: 100%;text-align:right" value=""
                                    /></td>
                                <td width="36%"><input name="sotiennt1" type="text"
                                                       onkeyup="return format_munber(this.value,'#sotiennt1')"
                                                       class="text ui-widget-content ui-corner-all" id="sotiennt1"
                                                       style="width: 100%;text-align:right" value=""
                                    /></td>
                            </tr>
                        </table>
                        <input name="thuesuat1" type="hidden"
                               class="text ui-widget-content ui-corner-all" id="thuesuat1"
                               style="width: 71%;text-align:right" value=""
                               tabindex="-1"/></td>
                </tr>
                <tr>
                    <td style="padding: 2px"><input type="hidden" name="btnnoidung2" id="btnnoidung2" class="button"
                                                    value="..."/>
                        <input type="text" name="manoidung2" value="" list="listmanoidung2" id="manoidung2"
                               required="required"
                               style="width: 15%"
                               placeholder="Mã ND" class="text ui-widget-content ui-corner-all"/>
                        <datalist id="listmanoidung2"></datalist>
                        <input type="text" name="noidung2" id="noidung2" required="required" style="width: 78%"
                               placeholder="Nội dung" class="text ui-widget-content ui-corner-all"/></td>
                    <td style="padding: 2px">
                        <table width="100%" border="0">

                            <tr>
                                <td width="9%"><input type="button" name="btntkno2" id="btntkno2" class="button"
                                                      value="..."/></td>
                                <td width="19%"><input type="text" name="tkno2" id="tkno2" value=""
                                                       style="width: 100%"
                                                       class="text ui-widget-content ui-corner-all"/></td>
                                <td width="36%"><input name="sotien2" type="text"
                                                       onkeyup="return format_munber(this.value,'#sotien2')"
                                                       class="text ui-widget-content ui-corner-all" id="sotien2"
                                                       style="width: 100%;text-align:right" value=""
                                    /></td>
                                <td width="36%"><input name="sotiennt2" type="text"
                                                       onkeyup="return format_munber(this.value,'#sotiennt2')"
                                                       class="text ui-widget-content ui-corner-all" id="sotiennt2"
                                                       style="width: 100%;text-align:right" value=""
                                    /></td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td style="padding: 2px">
                        <table width="100%" border="0">
                            <tr>
                                <td width="35%"><label id="ThamChieuTS" for="name20"></label></td>
                                <td width="27%"><label for="name16">Hạn thanh toán :</label></td>
                                <td width="38%"><input type="hidden" name="ngaythanhtoan" id="ngaythanhtoan" value=""
                                                       style="width: 100%"
                                                       class="text ui-widget-content ui-corner-all"/>
                                    <input type="date" name="hanthanhtoan" id="hanthanhtoan" value="" style="width: 98%"
                                           class="text ui-widget-content ui-corner-all"/></td>
                            </tr>
                        </table>
                    </td>
                    <td style="padding: 2px">
                        <table width="100%" border="0">
                            <tr>
                                <td width="28%"><label for="name17">Cộng :</label></td>
                                <td width="72%"><input name="tongtien" type="text"
                                                       class="text ui-widget-content ui-corner-all" id="tongtien"
                                                       style="width: 50%;color:#900;text-align:right" value=""
                                                       disabled="disabled"/>
                                    <input name="tongtiennt" type="text"
                                           class="text ui-widget-content ui-corner-all" id="tongtiennt"
                                           style="width: 50%;color:#900;text-align:right" value=""
                                           disabled="disabled"/>

                                    <input name="tongtien_cu" type="hidden"
                                           class="text ui-widget-content ui-corner-all" id="tongtien_cu"
                                           style="width: 100%;color:#900;text-align:right" value=""
                                           disabled="disabled"/></td>
                            </tr>
                        </table>
                    </td>
                </tr>

            </table>
        </fieldset>
        <fieldset style="background-color: #afd9ee">
            <legend>&nbsp;</legend>
            <table class="table-dialog" style="vertical-align: middle;width: 780PX" border="0">
                <tr>
                    <td width="63%">
                        <table width="100%" border="0">
                            <tr>
                                <td><label for="name18">Diễn giải:</label></td>
                                <td><textarea name="ghichu" class="text ui-widget-content ui-corner-all" id="ghichu"
                                              style="width: 100%"></textarea></td>
                            </tr>
                        </table>
                    </td>
                    <td width="37%" valign="top">
                        <table width="100%" border="0">
                            <tr>
                                <td width="28%"><label for="name19">Tổng cộng :</label></td>
                                <td width="72%"><input name="tongcong" type="text"
                                                       class="text ui-widget-content ui-corner-all" id="tongcong"
                                                       style="width: 50%;text-align:right" value=""
                                                       disabled="disabled"/>
                                    <input name="tongcongnt" type="text"
                                           class="text ui-widget-content ui-corner-all" id="tongcongnt"
                                           style="width: 50%;text-align:right" value=""
                                           disabled="disabled"/>
                                    <input name="tongcong_cu" type="hidden"
                                           class="text ui-widget-content ui-corner-all" id="tongcong_cu"
                                           style="width: 100%;text-align:right" value=""
                                           disabled="disabled"/></td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </fieldset>
        <fieldset style="background-color: #ffffff">
            <table class="table-dialog" style="vertical-align: middle;width: 780PX" border="0">
                <tr>
                    <td width="63%">
                        <table width="100%" border="0">
                            <tr>
                                <td style="color: red; font-weight: bold" id="tongsodutk"></td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </fieldset>
    </form>
</div>

<script>
    $height = 300;
    $width = 800;
    $dir_module_dmsanpham = "modules/dmsanpham/";////////////////Khai báo đường dẫn vào mudole
    $dir_module_makhachhang = "modules/makhachhang/";////////////////Khai báo đường dẫn vào mudole
    $dir_module_manoidung = "modules/manoidung/";////////////////Khai báo đường dẫn vào mudole
    $dir_module_ps_kt = "modules/pskt/";//----------------Lưới
    ///$dir_module_phieuthuchi = "modules/psmavattu/";//----------------Lưới
    $dir_module_matk = "modules/httk/";////////////////Khai báo đường dẫn vào mudole
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
                        $listmakhachhang += '<option value=' + $array[i].makh + '>' + $array[i].masothue + '-' + bodauTiengViet($array[i].tenkh) + '</option>';
                    }
                }
            });

            $("#listmakhachhang").html($listmakhachhang);
            $("#listmakhachhang1").html($listmakhachhang);
            $("#listmakhachhang2").html($listmakhachhang);


            var $listmanoidung = new Array();// Danh sách mã nội dung
            $.ajax({// Load danh sách mã khách hàng
                url: $dir_module_manoidung + "listall.php",
                async: false,
                dataType: "json",
                data: {mapl: "THU,CHI"},
                success: function (response) {
                    $array = (response);
                    for (var i = 0; i < $array.length; i++) {
                        //alert($array[i].makh);
                        $listmanoidung += '<option value=' + $array[i].mand + '>' + bodauTiengViet($array[i].tennoidung) + '</option>';
                    }
                }
            });

            $("#listmanoidung1").html($listmanoidung);
            $("#listmanoidung2").html($listmanoidung);

/// bắt dầu mã bộ phận
            var $listmabophan = new Array();// Danh sách mã nội dung
            $.ajax({// Load danh sách mã khách hàng
                url: $dir_module_dmsanpham + "listall.php",
                async: false,
                dataType: "json",
                success: function (response) {
                    $array = (response);
                    for (var i = 0; i < $array.length; i++) {
                        //alert($array[i].makh);
                        $listmabophan += '<option value=' + $array[i].masp + '>' + bodauTiengViet($array[i].tensp) + '</option>';
                    }
                }
            });

            $("#listmabophan").html($listmabophan);
            ////// kết thúc mã bộ phận

            var $listmataikhoan = new Array();// Danh sách mã nội dung
            $.ajax({// Load danh sách mã khách hàng
                url: $dir_module_matk + "listall.php",
                async: false,
                dataType: "json",
                success: function (response) {
                    $array = (response);
                    for (var i = 0; i < $array.length; i++) {
                        //alert($array[i].makh);
                        $listmataikhoan += '<option value=' + $array[i].matk + '>' + bodauTiengViet($array[i].tentk) + '</option>';
                    }
                }
            });

            $("#listmataikhoan").html($listmataikhoan);

        }

        readonlyInput();
        var dialog, form,
            emailRegex = /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/,
            STT = $("#STT"),
            btnstt = $("#btnstt"),
            sottpsct = $("#sottpsct"),

            phieuthu = $("#phieuthu"),
            phieuchi = $("#phieuchi"),
            sophieu = $("#sophieu"),
            btnthem = $("#btnthem"),
            btnvetruoc = $("#btnvetruoc"),
            btnxoa = $("#btnxoa"),
            btnketiep = $("#btnketiep"),
            btnvedau = $("#btnvedau"),
            btnvecuoi = $("#btnvecuoi"),
            btntim = $("#btntim"),

            btntkco = $("#btntkco"),
            tkco = $("#tkco"),
            tentkco = $("#tentkco"),
            lbltranghientai = $("lbltranghientai"),

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

            btnmakh2 = $("#btnmakh2"),
            makhachhang2 = $("#makhachhang2"),
            tenkhachhang2 = $("#tenkhachhang2"),
            diachi2 = $("#diachi2"),
            mangsang = $("#mangsang"),

            btnbophan = $("#btnbophan"),
            mabophan = $("#mabophan"),
            bophan = $("#bophan"),

            cothuegtgt = $("#cothuegtgt"),

            baogomthue = $("#baogomthue"),
            thuesuat1 = $("#thuesuat1"),

            btnnoidung1 = $("#btnnoidung1"),
            manoidung1 = $("#manoidung1"),
            noidung1 = $("#noidung1"),

            btnnoidung2 = $("#btnnoidung2"),
            manoidung2 = $("#manoidung2"),
            noidung2 = $("#noidung2"),

            btntkco1 = $("#btntkco1"),
            btntkco2 = $("#btntkco2"),
            tkno1 = $("#tkno1"),
            tkno2 = $("#tkno2"),
            sotien1 = $("#sotien1"),
            sotien2 = $("#sotien2"),

            hanthanhtoan = $("#hanthanhtoan"),
            tongtien = $("#tongtien"),
            tongtien_cu = $("#tongtien_cu"),

            tongcong = $("#tongcong"),

            tongcong_cu = $("#tongcong_cu"),
            ghichu = $("#ghichu"),


            allFields = $([]).add(STT)/////////////////////////////////////////////////////////////////////////////////////
                .add(phieuthu)
                .add(phieuchi)
                .add(tkco)
                .add(tentkco)
                .add(ngayghiso)
                .add(loaict)
                .add(mauso)
                .add(kyhieu)
                .add(sohoadon)
                .add(makhachhang)
                .add(tenkhachhang)
                .add(diachi)
                .add(masothue)
                .add(ngayhoadon)
                .add(makhachhang2)
                .add(tenkhachhang2)
                .add(diachi2)
                .add(mabophan)
                .add(bophan)
                .add(cothuegtgt)
                .add(baogomthue)
                .add(manoidung1)
                .add(noidung1)
                .add(manoidung2)
                .add(noidung2)
                .add(tkno1)
                .add(tkno2).add(sotien1)
                .add(sotien2)
                .add(hanthanhtoan)
                .add(tongtien)
                .add(tongcong)
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

        $("#Form-chinh").keydown(function (event) {// Gọi table mã nội dung để chọn
            if (event.keyCode == Keys.ESCAPE) { // copy
                //$('.dialog_main_thongbao').load('form/frm_thongbao_huy_thuchi.php');
            }
        })
        $("#CTCT").click(function () {
            try {
                $CTCT = $("#mabophan").val();
                $check_luu = (kiemtrakhoadulieu(ngayghiso.val().trim(), 1, STT.val().trim()));
                if ($check_luu != "") {
                    alert($check_luu);
                    return false;
                }
                $sophieu = sophieu.val();
                $list = 0;

                if ($('.dialog_main_bangchitiet_nhapkho').html() == "") { // copy
                    $('.dialog_main_bangchitiet_nhapkho').load('form/frm_bangchitiet_xuatkho_chitietct.php?sophieu=' + $sophieu + '&list=' + $list + '&mact=' + $CTCT);
                }
            } catch (err) {

            }
        });
///-------------------------Di chuyễn các phần tử bằng enter----------------
        $(phieuthu).keydown(function (event) {// Gọi table mã nội dung để chọn
            if (event.keyCode == Keys.ENTER) { // copy
                $("#tkco").focus();
            }
        })
        $(phieuchi).keydown(function (event) {// Gọi table mã nội dung để chọn
            if (event.keyCode == Keys.ENTER) { // copy
                $("#tkco").focus();
            }
        })

        $("#tkco").keydown(function (event) {// Gọi table mã nội dung để chọn
            if (event.keyCode == Keys.ENTER) { // copy
                $(STT).focus();
            }
        })

        $(ngayghiso).keydown(function (event) {// Gọi table mã nội dung để chọn
            if (event.keyCode == Keys.ENTER) { // copy
                $(makhachhang).focus();
            }
        })
        $(makhachhang).keydown(function (event) {// Gọi table mã nội dung để chọn
            if (event.keyCode == Keys.ENTER) { // copy
                $(loaict).focus();
            }
        })
        $(loaict).keydown(function (event) {// Gọi table mã nội dung để chọn
            if (event.keyCode == Keys.ENTER) { // copy
                $("#mauso").focus();
            }
        })

        $("#mauso").keydown(function (event) {// Gọi table mã nội dung để chọn
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
            $sohoadon = $(sohoadon).val().trim();
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
                    } else if ($lengsohoadon > 7) {
                        alert("Chiều dài số hóa đơn không vượt quá 7 số !");
                    }
                }
            }
        })
        $(ngayhoadon).keydown(function (event) {// Gọi table mã nội dung để chọn
            if (event.keyCode == Keys.ENTER) { // copy
                $(makhachhang2).focus();
            }
        })
        $(makhachhang2).keydown(function (event) {// Gọi table mã nội dung để chọn
            if (event.keyCode == Keys.ENTER) { // copy
                $(tenkhachhang2).focus();
            }
        })
        $(tenkhachhang2).keydown(function (event) {// Gọi table mã nội dung để chọn
            if (event.keyCode == Keys.ENTER) { // copy
                $(diachi2).focus();
            }
        })
        $(diachi2).keydown(function (event) {// Gọi table mã nội dung để chọn
            if (event.keyCode == Keys.ENTER) { // copy
                $(mangsang).focus();
            }
        })
        $(mangsang).keydown(function (event) {// Gọi table mã nội dung để chọn
            if (event.keyCode == Keys.ENTER) { // copy
                $("#chonloaisp").focus();
            }
        })

        $("#chonloaisp").keydown(function (event) {// Gọi table mã nội dung để chọn
            if (event.keyCode == Keys.ENTER) { // copy
                $(mabophan).focus();
            }
        })

        $("#chonloaisp").focusout(function (event) {// Gọi table mã nội dung để chọn
            var $LoaiPhieu = 0;
            if (phieuthu.is(":checked")) {
                $LoaiPhieu = 1;
                if ($tkco == 112101)
                    $LoaiPhieu = 5;
                if ($tkco == 112102)
                    $LoaiPhieu = 7;
                if ($tkco == 112103)
                    $LoaiPhieu = 9;
                if ($tkco == 112104)
                    $LoaiPhieu = 11;
                if ($tkco == 112105)
                    $LoaiPhieu = 13;
                if ($tkco == 112106)
                    $LoaiPhieu = 15;
                if ($tkco == 112107)
                    $LoaiPhieu = 17;
                if ($tkco == 112108)
                    $LoaiPhieu = 19;
                if ($tkco == 112109)
                    $LoaiPhieu = 21;
                if ($tkco == 112110)
                    $LoaiPhieu = 23;
                if ($tkco == 112111)
                    $LoaiPhieu = 25;
                if ($tkco == 112112)
                    $LoaiPhieu = 27;
                if ($tkco == 112113)
                    $LoaiPhieu = 29;
                if ($tkco == 112114)
                    $LoaiPhieu = 31;
                if ($tkco == 112115)
                    $LoaiPhieu = 33;

                if ($tkco == 112201)
                    $LoaiPhieu = 35;
                if ($tkco == 112202)
                    $LoaiPhieu = 37;
                if ($tkco == 112203)
                    $LoaiPhieu = 39;
                if ($tkco == 112204)
                    $LoaiPhieu = 41;
                if ($tkco == 112205)
                    $LoaiPhieu = 43;
                if ($tkco == 112206)
                    $LoaiPhieu = 45;
                if ($tkco == 112207)
                    $LoaiPhieu = 47;
                if ($tkco == 112208)
                    $LoaiPhieu = 49;
                if ($tkco == 112209)
                    $LoaiPhieu = 51;
                if ($tkco == 112210)
                    $LoaiPhieu = 53;
                if ($tkco == 112211)
                    $LoaiPhieu = 55;
                if ($tkco == 112212)
                    $LoaiPhieu = 57;
                if ($tkco == 112213)
                    $LoaiPhieu = 59;
                if ($tkco == 112214)
                    $LoaiPhieu = 61;
                if ($tkco == 112215)
                    $LoaiPhieu = 63;
            }
            if (phieuchi.is(":checked")) {
                $LoaiPhieu = 2;
                if ($tkco == 112101)
                    $LoaiPhieu = 6;
                if ($tkco == 112102)
                    $LoaiPhieu = 8;
                if ($tkco == 112103)
                    $LoaiPhieu = 10;
                if ($tkco == 112104)
                    $LoaiPhieu = 12;
                if ($tkco == 112105)
                    $LoaiPhieu = 14;
                if ($tkco == 112106)
                    $LoaiPhieu = 16;
                if ($tkco == 112107)
                    $LoaiPhieu = 18;
                if ($tkco == 112108)
                    $LoaiPhieu = 20;
                if ($tkco == 112109)
                    $LoaiPhieu = 22;
                if ($tkco == 112110)
                    $LoaiPhieu = 24;
                if ($tkco == 112111)
                    $LoaiPhieu = 26;
                if ($tkco == 112112)
                    $LoaiPhieu = 28;
                if ($tkco == 112113)
                    $LoaiPhieu = 30;
                if ($tkco == 112114)
                    $LoaiPhieu = 32;
                if ($tkco == 112115)
                    $LoaiPhieu = 34;

                if ($tkco == 112201)
                    $LoaiPhieu = 36;
                if ($tkco == 112202)
                    $LoaiPhieu = 38;
                if ($tkco == 112203)
                    $LoaiPhieu = 40;
                if ($tkco == 112204)
                    $LoaiPhieu = 42;
                if ($tkco == 112205)
                    $LoaiPhieu = 44;
                if ($tkco == 112206)
                    $LoaiPhieu = 46;
                if ($tkco == 112207)
                    $LoaiPhieu = 48;
                if ($tkco == 112208)
                    $LoaiPhieu = 50;
                if ($tkco == 112209)
                    $LoaiPhieu = 52;
                if ($tkco == 112210)
                    $LoaiPhieu = 54;
                if ($tkco == 112211)
                    $LoaiPhieu = 56;
                if ($tkco == 112212)
                    $LoaiPhieu = 58;
                if ($tkco == 112213)
                    $LoaiPhieu = 60;
                if ($tkco == 112214)
                    $LoaiPhieu = 62;
                if ($tkco == 112215)
                    $LoaiPhieu = 64;

            }
            $loaisp = $("#chonloaisp").val().trim();
            if ($loaisp == "" || $LoaiPhieu != 2) {
                $("#CTCT").attr("disabled", true);
            } else {
                $("#CTCT").attr("disabled", false);
            }
        })


        $(mabophan).keydown(function (event) {// Gọi table mã nội dung để chọn
            if (event.keyCode == Keys.ENTER) { // copy
                $("#tygia").focus();
            }
        })
        $(btnbophan).keydown(function (event) {// Gọi table mã nội dung để chọn
            if (event.keyCode == Keys.ENTER) { // copy
                $(manoidung1).focus();
            }
        })
        $(manoidung1).keydown(function (event) {// Gọi table mã nội dung để chọn
            if (event.keyCode == Keys.ENTER) { // copy
                $(sotien1).focus();
            }
        })
        $(noidung1).keydown(function (event) {// Gọi table mã nội dung để chọn
            if (event.keyCode == Keys.ENTER) { // copy
                $noidung1 = noidung1.val();
                $("#ghichu").val($noidung1);
                $(sotien1).focus();
            }
        })
        $(noidung2).keydown(function (event) {// Gọi table mã nội dung để chọn
            if (event.keyCode == Keys.ENTER) { // copy
                $(sotien2).focus();
            }
        })
        sotien1.keydown(function (event) {// Gọi table mã nội dung để chọn
            if (event.keyCode == Keys.ENTER) { // copy
                if (sotien1.val() != "")
                    sotien2.focus();
                else
                    sotien1.focus();
            }
        })
        sotien2.keydown(function (event) {// Gọi table mã nội dung để chọn
            if (event.keyCode == Keys.ENTER) { // copy
                ghichu.focus();
            }
        })

        $("#tygia").keydown(function (event) {// Gọi table mã nội dung để chọn
            if (event.keyCode == Keys.ENTER) { // copy
                $("#manoidung1").focus();
            }
        })

        $("#sotiennt1").keydown(function (event) {// Gọi table mã nội dung để chọn
            if (event.keyCode == Keys.ENTER) { // copy
                if ($("#sotiennt1").val() != "")
                    $("#sotiennt2").focus();
                else
                    $("#sotiennt1").focus();
            }
        })
        $("#sotiennt2").keydown(function (event) {// Gọi table mã nội dung để chọn
            if (event.keyCode == Keys.ENTER) { // copy
                ghichu.focus();
            }
        })

        function kiemtrakhoadulieu($ngayghiso, $loaiphieu, $sophieu, $matk) {
            var $ketqua;
            $.ajax({// Load danh sách mã khách hàng
                url: "modules/tuychon/checkkhoadulieu.php",
                async: false,
                data: {ngayghiso: $ngayghiso, loaiphieu: $loaiphieu, sophieu: $sophieu, matk: $matk},
                success: function (response) {
                    $ketqua = response.trim();
                }
            });
            return $ketqua;
        }

        function checkSoHoaDonTrung() {// Check key khi nhấn submit
            $data = "K";
            var $LoaiPhieu = 2;
            if (phieuthu.is(":checked")) {
                $LoaiPhieu = 1;
            }
            if (phieuchi.is(":checked")) {
                $LoaiPhieu = 2;
            }
            $sophieu = sophieu.val();
            $sohoadon = sohoadon.val().trim();
            $makhachhang = makhachhang.val().trim();
            $kyhieu = $("#kyhieu").val().trim();
            if ($sohoadon != "") {
                $.ajax({
                    url: $dir_module_ps_kt + "kiemtrasohoadon.php",
                    data: {
                        loaiphieu: $LoaiPhieu,
                        sohoadon: $sohoadon,
                        sophieu: $sophieu,
                        makh: $makhachhang,
                        kyhieu: $kyhieu
                    },
                    async: false,
                    success: function (response) {
                        $data = response;
                    }
                });
            }
            return $data;
        }

        function checkSoHoaDonTrung_Vuot($LoaiPhieu) {// Check khi vượt 20tr trên 1 ngày
            $data = "K";
            $makhachhang = makhachhang.val().trim();
            $sohoadon = sohoadon.val().trim();
            $kyhieu = $("#kyhieu").val().trim();
            $ngayhoadon = $("#ngayhoadon").val().trim();
            $tongtien = $("#tongcong").val().trim();
            $loaict = $("#loaict").val().trim();
            $tk = $("#tkco").val().trim();
            if ($sohoadon != "" && $LoaiPhieu == 2 && ($loaict == 1 || $loaict == 2)) {
                $.ajax({
                    url: $dir_module_ps_kt + "kiemtrasohoadon_vuotthuchi.php",
                    data: {
                        loaiphieu: $LoaiPhieu,
                        makh: $makhachhang,
                        ngayhoadon: $ngayhoadon,
                        tongtien: $tongtien,
                        sohoadon: $sohoadon,
                        kyhieu: $kyhieu,
                        tk: $tk
                    },
                    async: false,
                    success: function (response) {
                        $data = (response);
                    }
                });
            }
            return $data;

        }

///-------------------Kết thúc--------------------------------
        //---------------Số thứ tụ-----------------------
        btnstt.click(function (event) {// Gọi table khách hàng để chọn
            var $LoaiPhieu = 0;
            $tkco = parseInt($("#tkco").val());

            if (phieuthu.is(":checked")) {
                $LoaiPhieu = 1;
                if ($tkco == 112101)
                    $LoaiPhieu = 5;
                if ($tkco == 112102)
                    $LoaiPhieu = 7;
                if ($tkco == 112103)
                    $LoaiPhieu = 9;
                if ($tkco == 112104)
                    $LoaiPhieu = 11;
                if ($tkco == 112105)
                    $LoaiPhieu = 13;
                if ($tkco == 112106)
                    $LoaiPhieu = 15;
                if ($tkco == 112107)
                    $LoaiPhieu = 17;
                if ($tkco == 112108)
                    $LoaiPhieu = 19;
                if ($tkco == 112109)
                    $LoaiPhieu = 21;
                if ($tkco == 112110)
                    $LoaiPhieu = 23;
                if ($tkco == 112111)
                    $LoaiPhieu = 25;
                if ($tkco == 112112)
                    $LoaiPhieu = 27;
                if ($tkco == 112113)
                    $LoaiPhieu = 29;
                if ($tkco == 112114)
                    $LoaiPhieu = 31;
                if ($tkco == 112115)
                    $LoaiPhieu = 33;

                if ($tkco == 112201)
                    $LoaiPhieu = 35;
                if ($tkco == 112202)
                    $LoaiPhieu = 37;
                if ($tkco == 112203)
                    $LoaiPhieu = 39;
                if ($tkco == 112204)
                    $LoaiPhieu = 41;
                if ($tkco == 112205)
                    $LoaiPhieu = 43;
                if ($tkco == 112206)
                    $LoaiPhieu = 45;
                if ($tkco == 112207)
                    $LoaiPhieu = 47;
                if ($tkco == 112208)
                    $LoaiPhieu = 49;
                if ($tkco == 112209)
                    $LoaiPhieu = 51;
                if ($tkco == 112210)
                    $LoaiPhieu = 53;
                if ($tkco == 112211)
                    $LoaiPhieu = 55;
                if ($tkco == 112212)
                    $LoaiPhieu = 57;
                if ($tkco == 112213)
                    $LoaiPhieu = 59;
                if ($tkco == 112214)
                    $LoaiPhieu = 61;
                if ($tkco == 112215)
                    $LoaiPhieu = 63;

            }
            if (phieuchi.is(":checked")) {
                $LoaiPhieu = 2;
                if ($tkco == 112101)
                    $LoaiPhieu = 6;
                if ($tkco == 112102)
                    $LoaiPhieu = 8;
                if ($tkco == 112103)
                    $LoaiPhieu = 10;
                if ($tkco == 112104)
                    $LoaiPhieu = 12;
                if ($tkco == 112105)
                    $LoaiPhieu = 14;
                if ($tkco == 112106)
                    $LoaiPhieu = 16;
                if ($tkco == 112107)
                    $LoaiPhieu = 18;
                if ($tkco == 112108)
                    $LoaiPhieu = 20;
                if ($tkco == 112109)
                    $LoaiPhieu = 22;
                if ($tkco == 112110)
                    $LoaiPhieu = 24;
                if ($tkco == 112111)
                    $LoaiPhieu = 26;
                if ($tkco == 112112)
                    $LoaiPhieu = 28;
                if ($tkco == 112113)
                    $LoaiPhieu = 30;
                if ($tkco == 112114)
                    $LoaiPhieu = 32;
                if ($tkco == 112115)
                    $LoaiPhieu = 34;

                if ($tkco == 112201)
                    $LoaiPhieu = 36;
                if ($tkco == 112202)
                    $LoaiPhieu = 38;
                if ($tkco == 112203)
                    $LoaiPhieu = 40;
                if ($tkco == 112204)
                    $LoaiPhieu = 42;
                if ($tkco == 112205)
                    $LoaiPhieu = 44;
                if ($tkco == 112206)
                    $LoaiPhieu = 46;
                if ($tkco == 112207)
                    $LoaiPhieu = 48;
                if ($tkco == 112208)
                    $LoaiPhieu = 50;
                if ($tkco == 112209)
                    $LoaiPhieu = 52;
                if ($tkco == 112210)
                    $LoaiPhieu = 54;
                if ($tkco == 112211)
                    $LoaiPhieu = 56;
                if ($tkco == 112212)
                    $LoaiPhieu = 58;
                if ($tkco == 112213)
                    $LoaiPhieu = 60;
                if ($tkco == 112214)
                    $LoaiPhieu = 62;
                if ($tkco == 112215)
                    $LoaiPhieu = 64;

            }
            $('.dialog_main_pskt_phieuthu').load('form/frm_ps_kt_phieuthu.php?idstyle=Form-chinh&idinput=STT&idfocus=STT&loaiphieu=' + $LoaiPhieu);
        });
        btntim.click(function (event) {// Gọi table khách hàng để chọn
            var $sophieu = sophieu.val().trim();
            var $tkco = tkco.val().trim();
            $('.dialog_main_chitiet_pskt_phieuthu').load('form/frm_chitiet_ps_kt_phieuthu.php?idstyle=Form-chinh&idinput=STT&idfocus=STT&sophieu=' + $sophieu);
        });


        // --------------End số thứ tự------------------

// Khai báo các btntkco trên form
        $(btntkco).click(function (event) {// Gọi table khách hàng để chọn
            $tkco = tkco.val().trim();
            if ($('.dialog_main_httk').html() == "") { // copy
                $('.dialog_main_httk').load("form/frm_dm_httk_form_select_soquy.php?idstyle=Form-chinh&idinput=tkco***tentkco&idfocus=STT&ma=" + $tkco);
            }
        });

        $(btntkno1).click(function (event) {// Gọi table khách hàng để chọn
            if ($('.dialog_main_httk').html() == "") { // copy
                $('.dialog_main_httk').load("form/frm_dm_httk_form_select.php?idstyle=Form-chinh&idinput=tkno1&idfocus=sotien1&ma=" + $("#tkno1").val());
            }
        });

        $(btntkno2).click(function (event) {// Gọi table khách hàng để chọn
            if ($('.dialog_main_httk').html() == "") { // copy
                $('.dialog_main_httk').load("form/frm_dm_httk_form_select.php?idstyle=Form-chinh&idinput=tkno2&idfocus=sotien2&ma=" + $("#tkno2").val());
            }
        });

        $(tkco).focusout(function (event) {// Gọi table mã nội dung để chọn
            $tkco = tkco.val().trim();
            if ($('.dialog_main_httk').html() == "") { // copy
                goitablehttk($tkco);
            }
        });
        /*$(tkco).blur(function (event) {// Gọi table mã nội dung để chọn
         $tkco = tkco.val().trim();
         goitablehttk($tkco);
         });*/
        function goitablehttk($vale) {
            $tkco = tkco.val().trim();
            if ($vale == "") {// nếu tk nợ trống thì bật tra bảng
                $('.dialog_main_httk').load("form/frm_dm_httk_form_select.php?idstyle=Form-chinh&idinput=tkco***tentkco&idfocus=STT&ma=" + $tkco);
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
                    tentkco.val($data.tentk);
                    //STT.focus();
                } else {
                    $('.dialog_main_httk').load("form/frm_dm_httk_form_select.php?idstyle=Form-chinh&idinput=tkco***tentkco&idfocus=STT&ma=" + $tkco);
                }
            }
        }

        ///////////End TKco /////////////////////////
        //////////Begin ma kh////////////////////////////
        $(btnmakh).click(function (event) {// Gọi table khách hàng để chọn
            if ($('.dialog_main_makh').html() == "") { // copy
                $('.dialog_main_makh').load("form/frm_dm_makh_form_select.php?idstyle=Form-chinh&idinput=makhachhang***tenkhachhang***diachi***masothue***makhachhang2***tenkhachhang2***diachi2&idfocus=loaict&ma=" + $("#makhachhang").val());
            }
        });
        $(btnmakh2).click(function (event) {// Gọi table khách hàng để chọn
            if ($('.dialog_main_makh').html() == "") { // copy
                $('.dialog_main_makh').load("form/frm_dm_makh_form_select.php?idstyle=Form-chinh&idinput=makhachhang***tenkhachhang***diachi***masothue&idfocus=loaict&ma=" + $("#makhachhang2").val());
            }
        });

        $(makhachhang).focusout(function (event) {// Gọi table mã nội dung để chọn
            $makh = makhachhang.val().trim();
            if ($('.dialog_main_makh').html() == "") { // copy
                goitablemakhachhang($makh);
            }
        });

        $(makhachhang2).focusout(function (event) {// Gọi table mã nội dung để chọn
            $makh = makhachhang2.val().trim();
            if ($('.dialog_main_makh').html() == "") { // copy
                goitablemakhachhang2($makh);
            }
        });
        /*$(makhachhang).blur(function (event) {// Gọi table mã nội dung để chọn
         $makh = makhachhang.val().trim();
         goitablemakhachhang($makh);

         });*/
        function goitablemakhachhang($vale) {
            if ($vale == "") {// nếu tk nợ trống thì bật tra bảng
                $('.dialog_main_makh').load("form/frm_dm_makh_form_select.php?idstyle=Form-chinh&idinput=makhachhang***tenkhachhang***diachi***masothue***makhachhang2***tenkhachhang2***diachi2&idfocus=loaict&ma=" + $("#makhachhang").val());
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


                    makhachhang2.val($data.makh);
                    tenkhachhang2.val($data.tenkh);
                    diachi2.val($data.diachi);

                    //loaict.focus();

                } else {
                    $('.dialog_main_makh').load("form/frm_dm_makh_form_select.php?idstyle=Form-chinh&idinput=makhachhang***tenkhachhang***diachi***masothue***makhachhang2***tenkhachhang2***diachi2&idfocus=loaict&ma=" + $("#makhachhang").val());
                }
            }
        }

        function goitablemakhachhang2($vale) {
            if ($vale == "") {// nếu tk nợ trống thì bật tra bảng
                $('.dialog_main_makh').load("form/frm_dm_makh_form_select.php?idstyle=Form-chinh&idinput=makhachhang2***tenkhachhang2***diachi2&idfocus=btnbophan");
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

                    makhachhang2.val($data.makh);
                    tenkhachhang2.val($data.tenkh);
                    diachi2.val($data.diachi);

                    //mabophan.focus();

                } else {
                    $('.dialog_main_makh').load("form/frm_dm_makh_form_select.php?idstyle=Form-chinh&idinput=makhachhang2***tenkhachhang2***diachi2&idfocus=btnbophan&ma=" + $("#makhachhang2").val());
                }
            }
        }

        //---------------------End mand--------------
        //////////Begin ma kh////////////////////////////
        $(btnnoidung1).click(function (event) {// Gọi table khách hàng để chọn
            var $LoaiPhieu = 0;
            if (phieuthu.is(":checked")) {
                $LoaiPhieu = 1;
            }
            if (phieuchi.is(":checked")) {
                $LoaiPhieu = 2;
            }
            if ($('.dialog_main_manoidung').html() == "") { // copy
                $('.dialog_main_manoidung').load("form/frm_dm_manoidung_form_select.php?idstyle=Form-chinh&idinput=manoidung1***noidung1***tkno1***ghichu***datamau***thuesuat1&idfocus=sotien1&loaiphieu=" + $LoaiPhieu + "&ma=" + $("#manoidung1").val());
            }
        });
        phieuchi.change(function () {
            btntkco.val("TK có");
            $("#lbltkno").text("TK nợ");
        });
        phieuthu.change(function () {
            btntkco.val("TK nợ");
            $("#lbltkno").text("TK có");
        });
        $(btnnoidung2).click(function (event) {// Gọi table khách hàng để chọn
            var $LoaiPhieu = 0;
            if (phieuthu.is(":checked")) {
                $LoaiPhieu = 1;
            }
            if (phieuchi.is(":checked")) {
                $LoaiPhieu = 2;
            }
            if ($('.dialog_main_manoidung').html() == "") { // copy
                $('.dialog_main_manoidung').load("form/frm_dm_manoidung_form_select.php?idstyle=Form-chinh&idinput=manoidung2***noidung2***tkno2&idfocus=sotien2&loaiphieu=" + $LoaiPhieu + "&ma=" + $("#manoidung2").val());
            }
        });


        $(manoidung1).focusout(function (event) {// Gọi table mã nội dung để chọn
            $ma = manoidung1.val().trim();
            if ($('.dialog_main_manoidung').html() == "") { // copy
                goitablemanoidung1($ma);
            }
        });

        $(noidung1).focusout(function (event) {// Gọi table mã nội dung để chọn
            $ma = noidung1.val().trim();
            //if (event.keyCode == Keys.ENTER) { // copy
            ghichu.val($ma);
            //}
        });

        $(manoidung2).focusout(function (event) {// Gọi table mã nội dung để chọn
            $ma = manoidung2.val().trim();
            if ($('.dialog_main_manoidung').html() == "") { // copy
                goitablemanoidung2($ma);
            }
        });

        function goitablemanoidung1($vale) {
            var $LoaiPhieu = 0;
            if (phieuthu.is(":checked")) {
                $LoaiPhieu = 1;
            }
            if (phieuchi.is(":checked")) {
                $LoaiPhieu = 2;
            }
            if ($vale == "") {// nếu tk nợ trống thì bật tra bảng
                $('.dialog_main_manoidung').load("form/frm_dm_manoidung_form_select.php?idstyle=Form-chinh&idinput=manoidung1***noidung1***tkno1***ghichu***datamau***thuesuat1&idfocus=sotien1&loaiphieu=" + $LoaiPhieu);
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
                    $manoidungcopy = $("#manoidung1copy").val();
                    $tennoidung = noidung1.val().trim();
                    manoidung1.val($data.mand);
                    if ($manoidungcopy == "" || $manoidungcopy != $data.mand || $tennoidung == "") {
                        noidung1.val($data.tennoidung);
                        ghichu.val($data.tennoidung);
                    }

                    if ($LoaiPhieu == 1)
                        tkno1.val($data.tkco);
                    if ($LoaiPhieu == 2)
                        tkno1.val($data.tkno);

                    thuesuat1.val($data.rate_tax);

                    //noidung1.focus();

                } else {
                    $('.dialog_main_manoidung').load("form/frm_dm_manoidung_form_select.php?idstyle=Form-chinh&idinput=manoidung1***noidung1***tkno1***ghichu***datamau***thuesuat1&idfocus=sotien1&loaiphieu=" + $LoaiPhieu + "&ma=" + $("#manoidung1").val());
                }
            }
        }

        function goitablemanoidung2($vale) {
            var $LoaiPhieu = 0;
            if (phieuthu.is(":checked")) {
                $LoaiPhieu = 1;
            }
            if (phieuchi.is(":checked")) {
                $LoaiPhieu = 2;
            }
            if ($vale != "") {// nếu tk có không trống

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
                    manoidung2.val($data.mand);
                    noidung2.val($data.tennoidung);
                    if ($LoaiPhieu == 1)
                        tkno2.val($data.tkco);
                    if ($LoaiPhieu == 2)
                        tkno2.val($data.tkno);


                } else {
                    $('.dialog_main_manoidung').load("form/frm_dm_manoidung_form_select.php?idstyle=Form-chinh&idinput=manoidung2***noidung2***tkno2&idfocus=sotien2&loaiphieu=" + $LoaiPhieu + "&ma=" + $("#manoidung2").val());
                }
            }
        }

        //---------------------End ma nội dung--------------
        // Khai báo các mã bộ phận trên form
        $(btnbophan).click(function (event) {// Gọi table khách hàng để chọn
            if ($('.dialog_main_mact').html() == "") { // copy
                $('.dialog_main_mact').load("form/frm_dm_mact_form_select.php?idstyle=Form-chinh&idinput=mabophan***bophan&idfocus=manoidung1&ma=" + $("#mabophan").val());
            }
        });

        $(mabophan).focusout(function (event) {// Gọi table mã nội dung để chọn
            $ma = mabophan.val().trim();
            if ($('.dialog_main_danhmuc_sanpham').html() == "") { // copy
                goitablebbophan($ma);
            }
        });

        function goitablebbophan($vale) {
            $loaisp = $("#chonloaisp").val();
            if ($vale == "") {// nếu tk nợ trống thì bật tra bảng
                if ($loaisp == "SP") {
                    $('.dialog_main_danhmuc_sanpham').load("form/frm_dm_sanpham_from_select.php?idstyle=Form-chinh&idinput=mabophan***bophan&idfocus=tygia&ma=" + $("#mabophan").val());
                } else if ($loaisp == "CT") {
                    $('.dialog_main_danhmuc_sanpham').load("form/frm_dm_congtrinh_form_select.php?idstyle=Form-chinh&idinput=mabophan***bophan&idfocus=tygia&ma=" + $("#mabophan").val());
                } else {
                    mabophan.val("0001");
                    bophan.val("Toàn Bộ");
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
                    if ($loaisp == "") {
                        mabophan.val("0001");
                        bophan.val("Toàn Bộ");
                    } else {
                        mabophan.val($data.masp);
                        bophan.val($data.tensp);
                    }

                    $("#tygia").focus();
                } else {
                    if ($loaisp == "SP") {
                        $('.dialog_main_danhmuc_sanpham').load("form/frm_dm_sanpham_from_select.php?idstyle=Form-chinh&idinput=mabophan***bophan&idfocus=tygia&ma=" + $("#mabophan").val());
                    } else if ($loaisp == "CT") {
                        $('.dialog_main_danhmuc_sanpham').load("form/frm_dm_congtrinh_form_select.php?idstyle=Form-chinh&idinput=mabophan***bophan&idfocus=tygia&ma=" + $("#mabophan").val());
                    } else {
                        mabophan.val("0001");
                        bophan.val("Toàn Bộ");
                    }
                }
            }
        }

        ///////////End mã bộ phận /////////////////////////
        ///////////End mã bộ phận /////////////////////////
        function tongtienphieu($sophieu, $sottcuaphieu, $tongtien, $tongtiennt) {
            $tongcongtien = 0;
            $.ajax({// Kiểm tra xem STT có tồn tại hay không
                url: $dir_module_ps_kt + "laytongtienphieu.php",
                async: false,
                data: {sophieu: $sophieu, sottpskt: $sottcuaphieu, tongtien: $tongtien, tongtiennt: $tongtiennt},
                success: function (response) {
                    $tongcongtien = $.parseJSON(response);
                }
            });
            return $tongcongtien;

        }

        ///////////End mã bộ phận /////////////////////////
        ///////// Bắt đầu số tiền 1 --------------------------------------------------
        $(sotien1).focusout(function (event) {// Gọi table mã nội dung để chọn
            $sotien1 = sotien1.val().trim().replace(/,/gi, "");
            $sotien2 = sotien2.val().trim().replace(/,/gi, "");
            $tongtien_cu = tongtien_cu.val().trim().replace(/,/gi, "");
            $tongtiensosanh = $("#tongtien").val().trim().replace(/,/gi, "");
            $tongcong_cu = tongcong_cu.val().trim().replace(/,/gi, "");
            $tongcong = tongcong.val().trim().replace(/,/gi, "");
            $thuesuat1 = Math.round(parseFloat(thuesuat1.val().trim()));
            $sotiennt1 = 0;
            $sotiennt2 = 0;
            if ($sotien2 == "")
                $sotien2 = 0;
            if ($tongcong == "")
                $tongcong = 0;
            $tongtien = 0;
            $sum = $tongcong;

            if (cothuegtgt.is(":checked") && $("#baogomthue").is(":checked") == false) {// Chua bao gom thue
                var $LoaiPhieu = 0;
                if (phieuthu.is(":checked")) {
                    manoidung2.val("100001");
                    noidung2.val("Thuế GTGT đầu ra");
                    tkno2.val("33311");
                }
                if (phieuchi.is(":checked")) {
                    manoidung2.val("100000");
                    noidung2.val("Thuế GTGT đầu vào");
                    tkno2.val("1331");
                }
                if ($sotien2 == 0) {
                    $sotien2 = Math.round(parseFloat($sotien1) * ($thuesuat1 / 100));
                    sotien2.val(FormatNumber($sotien2.toString()));
                }

            }
            if (cothuegtgt.is(":checked") && $("#baogomthue").is(":checked")) {// Co bao gom thue
                $tongtien12 = parseInt($sotien1) + parseInt($sotien2);
                if (parseInt($sotien2) == 0) {
                    var $LoaiPhieu = 0;
                    if (phieuthu.is(":checked")) {
                        manoidung2.val("100001");
                        noidung2.val("Thuế GTGT đầu ra");
                        tkno2.val("33311");
                    }
                    if (phieuchi.is(":checked")) {
                        manoidung2.val("100000");
                        noidung2.val("Thuế GTGT đầu vào");
                        tkno2.val("1331");
                    }
                    $sotien_tmp = Math.round(parseFloat($sotien1) / (1 + ($thuesuat1 / 100)));
                    if ($sotien2 == 0) {
                        $sotien2 = Math.round(parseFloat($sotien1) - ($sotien_tmp));
                        sotien2.val(FormatNumber($sotien2.toString()));
                    }
                    sotien1.val(FormatNumber($sotien_tmp.toString()));
                    $sotien1 = $sotien_tmp;
                }
            }
            if ($sotien1 != "") {
                $tongtien = parseFloat($sotien1) + parseFloat($sotien2);
                $tongtiennt = parseFloat($sotiennt1) + parseFloat($sotiennt2);
            }
            $sum = tongtienphieu($("#sophieu").val(), $("#sottpsct").val(), $tongtien, $tongtiennt);

            tongtien.val(FormatNumber($tongtien.toString()));
            $("#tongtiennt").val(FormatNumber($tongtiennt.toString()));
            tongcong.val(FormatNumber($sum.tongtien.toString()));
            $("#tongcongnt").val(FormatNumber($sum.tongtiennt.toString()));
        })
        //------------------Kết thúc số tiền 2------------------------------------=
        ///////// Bắt đầu số tiền 1 --------------------------------------------------
        $(sotien2).focusout(function (event) {// Gọi table mã nội dung để chọn
            $sotien1 = sotien1.val().trim().replace(/,/gi, "");
            $sotien2 = sotien2.val().trim().replace(/,/gi, "");
            $sotiennt1 = 0;
            $sotiennt2 = 0;
            $tongtien_cu = tongtien_cu.val().trim().replace(/,/gi, "");
            $tongcong_cu = tongcong_cu.val().trim().replace(/,/gi, "");
            $tongcong = tongcong.val().trim().replace(/,/gi, "");
            $thuesuat1 = parseFloat(thuesuat1.val().trim());
            if ($sotien2 == "")
                $sotien2 = 0;
            if ($tongcong == "")
                $tongcong = 0;
            $tongtien = 0;
            $sum = $tongcong;
            $tongtiennt = 0;
            if ($sotien1 != "") {
                $tongtien = parseFloat($sotien1) + parseFloat($sotien2);
                $tongtiennt = parseFloat($sotiennt1) + parseFloat($sotiennt2);
            }
            $sum = tongtienphieu($("#sophieu").val(), $("#sottpsct").val(), $tongtien, $tongtiennt);

            tongtien.val(FormatNumber($tongtien.toString()));
            $("#tongtiennt").val(FormatNumber($tongtiennt.toString()));
            tongcong.val(FormatNumber($sum.tongtien.toString()));
            $("#tongcongnt").val(FormatNumber($sum.tongtiennt.toString()));
        })
        //------------------Kết thúc số tiền 2------------------------------------=

        ///////// BẮT ĐẦU SỐ TIỀN NGOẠI TỆ --------------------------------------------------
        $("#sotiennt1").focusout(function (event) {// Gọi table mã nội dung để chọn

            $tygia = $("#tygia").val().trim().replace(/,/gi, "").trim();
            $sotiennt1 = $("#sotiennt1").val().trim().replace(/,/gi, "").trim();
            if ($tygia == "") {
                $tygia = 0;
            }
            if ($sotiennt1 == "") {
                $sotiennt1 = 0;
            }

            if ($tygia == 0 || $sotiennt1 == 0) {// Nếu tỷ giá và số tiền ngoại 1 bằng 0 thì sẽ không tính số tiền 1
                $sotien1 = sotien1.val().trim().replace(/,/gi, "");
                $sotien2 = sotien2.val().trim().replace(/,/gi, "");
            } else {
                console.log(sotien1.val());
                if (sotien1.val().trim().replace(/,/gi, "") == "0" || sotien1.val().trim().replace(/,/gi, "") == "") {
                    $sotien1 = Math.round($tygia * $sotiennt1);
                } else {
                    $sotien1 = sotien1.val().trim().replace(/,/gi, "");
                }

                $sotien2 = sotien2.val().trim().replace(/,/gi, "");
                $("#sotien1").val(FormatNumber($sotien1.toString()));
            }

            $tongtien_cu = tongtien_cu.val().trim().replace(/,/gi, "");
            $tongtiensosanh = $("#tongtien").val().trim().replace(/,/gi, "");
            $tongcong_cu = tongcong_cu.val().trim().replace(/,/gi, "");
            $tongcong = tongcong.val().trim().replace(/,/gi, "");
            $thuesuat1 = Math.round(parseFloat(thuesuat1.val().trim()));
            if ($sotien2 == "")
                $sotien2 = 0;
            if ($tongcong == "")
                $tongcong = 0;
            $tongtien = 0;
            $sum = $tongcong;

            if (cothuegtgt.is(":checked") && $("#baogomthue").is(":checked") == false) {// Chua bao gom thue
                var $LoaiPhieu = 0;
                if (phieuthu.is(":checked")) {
                    manoidung2.val("100001");
                    noidung2.val("Thuế GTGT đầu ra");
                    tkno2.val("33311");
                }
                if (phieuchi.is(":checked")) {
                    manoidung2.val("100000");
                    noidung2.val("Thuế GTGT đầu vào");
                    tkno2.val("1331");
                }
                if ($sotien2 == 0) {
                    $sotien2 = Math.round(parseFloat($sotien1) * ($thuesuat1 / 100));
                    sotien2.val(FormatNumber($sotien2.toString()));
                }

                $sotiennt2 = Math.round(parseFloat($sotiennt1) * ($thuesuat1 / 100));
                $("#sotiennt2").val(FormatNumber($sotiennt2.toString()));

            }
            if (cothuegtgt.is(":checked") && $("#baogomthue").is(":checked")) {// Co bao gom thue
                $tongtien12 = parseInt($sotien1) + parseInt($sotien2);
                if (parseInt($sotien2) == 0) {
                    var $LoaiPhieu = 0;
                    if (phieuthu.is(":checked")) {
                        manoidung2.val("100001");
                        noidung2.val("Thuế GTGT đầu ra");
                        tkno2.val("33311");
                    }
                    if (phieuchi.is(":checked")) {
                        manoidung2.val("100000");
                        noidung2.val("Thuế GTGT đầu vào");
                        tkno2.val("1331");
                    }
                    $sotien_tmp = Math.round(parseFloat($sotien1) / (1 + ($thuesuat1 / 100)));
                    if ($sotien2 == 0) {
                        $sotien2 = Math.round(parseFloat($sotien1) - ($sotien_tmp));
                        sotien2.val(FormatNumber($sotien2.toString()));
                    }
                    sotien1.val(FormatNumber($sotien_tmp.toString()));
                    $sotien1 = $sotien_tmp;
                }

            }
            if ($sotien1 != "") {
                $tongtien = parseFloat($sotien1) + parseFloat($sotien2);
                $tongtiennt = parseFloat($sotiennt1) + parseFloat($sotiennt2);
            }
            $sum = tongtienphieu($("#sophieu").val(), $("#sottpsct").val(), $tongtien, $tongtiennt);


            tongtien.val(FormatNumber($tongtien.toString()));
            $("#tongtiennt").val(FormatNumber($tongtiennt.toString()));
            tongcong.val(FormatNumber($sum.tongtien.toString()));
            $("#tongcongnt").val(FormatNumber($sum.tongtiennt.toString()));
        })
        //------------------Kết thúc số tiền 2------------------------------------=
        ///////// BẮT ĐẦU SỐ TIỀN NGOẠI TỆ --------------------------------------------------
        $("#sotiennt2").focusout(function (event) {// Gọi table mã nội dung để chọn
            $sotien1 = sotien1.val().trim().replace(/,/gi, "");
            $sotien2 = sotien2.val().trim().replace(/,/gi, "");
            $tongtien_cu = tongtien_cu.val().trim().replace(/,/gi, "");
            $tongcong_cu = tongcong_cu.val().trim().replace(/,/gi, "");
            $tongcong = tongcong.val().trim().replace(/,/gi, "");

            $tygia = $("#tygia").val().trim().replace(/,/gi, "").trim();

            $sotiennt1 = $("#sotiennt1").val().trim().replace(/,/gi, "").trim();
            $sotiennt2 = $("#sotiennt2").val().trim().replace(/,/gi, "").trim();

            if ($tygia == "") {
                $tygia = 0;
            }
            if ($sotiennt1 == "") {
                $sotiennt1 = 0;
            }

            if ($tygia == 0 || $sotiennt2 == 0) {// Nếu tỷ giá và số tiền ngoại 1 bằng 0 thì sẽ không tính số tiền 1
                $sotien2 = sotien2.val().trim().replace(/,/gi, "");
            } else {
                $sotien2 = Math.round($tygia * $sotiennt2);

                $("#sotien2").val(FormatNumber($sotien2.toString()));
            }

            if ($sotien2 == "")
                $sotien2 = 0;
            if ($tongcong == "")
                $tongcong = 0;
            $tongtien = 0;
            $sum = $tongcong;
            if ($sotien1 != "") {
                $tongtien = parseFloat($sotien1) + parseFloat($sotien2);
                $tongtiennt = parseFloat($sotiennt1) + parseFloat($sotiennt2);
            }
            $sum = tongtienphieu($("#sophieu").val(), $("#sottpsct").val(), $tongtien, $tongtiennt);

            tongtien.val(FormatNumber($tongtien.toString()));
            $("#tongtiennt").val(FormatNumber($tongtiennt.toString()));
            tongcong.val(FormatNumber($sum.tongtien.toString()));
            $("#tongcongnt").val(FormatNumber($sum.tongtiennt.toString()));
        })
        //------------------Kết thúc số tiền 2------------------------------------=
        ///-----------------KẾT THÚC SỐ TIỀN NGOẠI TỆ-------------------------------
        function getSoTTPSKTMAX() {// Check key khi nhấn submit
            var $data = 1;
            $.ajax({
                url: $dir_module_ps_kt + "laysottcuaphieu.php",
                async: false,
                success: function (response) {
                    $data = parseInt(response);
                }
            });
            return $data;
        }

        //--------Thêm mới-----------------------------------------------------
        $(btnthem).click(function (event) {// Gọi table khách hàng để chọn
            //btnthem.attr("disabled", true);
            $tkco = $("#tkco").val();
            $tkno1 = $("#tkno1").val();
            $tkno2 = $("#tkno2").val();
            $tkco1 = $("#tkco1").val();
            $tkco2 = $("#tkco2").val();
            $sotien1 = $("#sotien1").val().trim();
            $tongtien = parseFloat($("#tongtien").val().replace(/,/g, ""));
            var $LoaiPhieu = 0;
            $tkco = parseInt($("#tkco").val());
            var valid = true;

            if (phieuthu.is(":checked")) {
                $LoaiPhieu = 1;
                if ($tkco == 112101)
                    $LoaiPhieu = 5;
                if ($tkco == 112102)
                    $LoaiPhieu = 7;
                if ($tkco == 112103)
                    $LoaiPhieu = 9;
                if ($tkco == 112104)
                    $LoaiPhieu = 11;
                if ($tkco == 112105)
                    $LoaiPhieu = 13;
                if ($tkco == 112106)
                    $LoaiPhieu = 15;
                if ($tkco == 112107)
                    $LoaiPhieu = 17;
                if ($tkco == 112108)
                    $LoaiPhieu = 19;
                if ($tkco == 112109)
                    $LoaiPhieu = 21;
                if ($tkco == 112110)
                    $LoaiPhieu = 23;
                if ($tkco == 112111)
                    $LoaiPhieu = 25;
                if ($tkco == 112112)
                    $LoaiPhieu = 27;
                if ($tkco == 112113)
                    $LoaiPhieu = 29;
                if ($tkco == 112114)
                    $LoaiPhieu = 31;
                if ($tkco == 112115)
                    $LoaiPhieu = 33;

                if ($tkco == 112201)
                    $LoaiPhieu = 35;
                if ($tkco == 112202)
                    $LoaiPhieu = 37;
                if ($tkco == 112203)
                    $LoaiPhieu = 39;
                if ($tkco == 112204)
                    $LoaiPhieu = 41;
                if ($tkco == 112205)
                    $LoaiPhieu = 43;
                if ($tkco == 112206)
                    $LoaiPhieu = 45;
                if ($tkco == 112207)
                    $LoaiPhieu = 47;
                if ($tkco == 112208)
                    $LoaiPhieu = 49;
                if ($tkco == 112209)
                    $LoaiPhieu = 51;
                if ($tkco == 112210)
                    $LoaiPhieu = 53;
                if ($tkco == 112211)
                    $LoaiPhieu = 55;
                if ($tkco == 112212)
                    $LoaiPhieu = 57;
                if ($tkco == 112213)
                    $LoaiPhieu = 59;
                if ($tkco == 112214)
                    $LoaiPhieu = 61;
                if ($tkco == 112215)
                    $LoaiPhieu = 63;

            }
            if (phieuchi.is(":checked")) {
                $LoaiPhieu = 2;
                if ($tkco == 112101)
                    $LoaiPhieu = 6;
                if ($tkco == 112102)
                    $LoaiPhieu = 8;
                if ($tkco == 112103)
                    $LoaiPhieu = 10;
                if ($tkco == 112104)
                    $LoaiPhieu = 12;
                if ($tkco == 112105)
                    $LoaiPhieu = 14;
                if ($tkco == 112106)
                    $LoaiPhieu = 16;
                if ($tkco == 112107)
                    $LoaiPhieu = 18;
                if ($tkco == 112108)
                    $LoaiPhieu = 20;
                if ($tkco == 112109)
                    $LoaiPhieu = 22;
                if ($tkco == 112110)
                    $LoaiPhieu = 24;
                if ($tkco == 112111)
                    $LoaiPhieu = 26;
                if ($tkco == 112112)
                    $LoaiPhieu = 28;
                if ($tkco == 112113)
                    $LoaiPhieu = 30;
                if ($tkco == 112114)
                    $LoaiPhieu = 32;
                if ($tkco == 112115)
                    $LoaiPhieu = 34;

                if ($tkco == 112201)
                    $LoaiPhieu = 36;
                if ($tkco == 112202)
                    $LoaiPhieu = 38;
                if ($tkco == 112203)
                    $LoaiPhieu = 40;
                if ($tkco == 112204)
                    $LoaiPhieu = 42;
                if ($tkco == 112205)
                    $LoaiPhieu = 44;
                if ($tkco == 112206)
                    $LoaiPhieu = 46;
                if ($tkco == 112207)
                    $LoaiPhieu = 48;
                if ($tkco == 112208)
                    $LoaiPhieu = 50;
                if ($tkco == 112209)
                    $LoaiPhieu = 52;
                if ($tkco == 112210)
                    $LoaiPhieu = 54;
                if ($tkco == 112211)
                    $LoaiPhieu = 56;
                if ($tkco == 112212)
                    $LoaiPhieu = 58;
                if ($tkco == 112213)
                    $LoaiPhieu = 60;
                if ($tkco == 112214)
                    $LoaiPhieu = 62;
                if ($tkco == 112215)
                    $LoaiPhieu = 64;

            }
            var $chiphikhongloaitru = 0;
            if ($("#chiphikhongloaitru").is(":checked")) {
                $chiphikhongloaitru = 1;
            }
            if ($LoaiPhieu == 1) {
                $check_luu = (kiemtrakhoadulieu(ngayghiso.val().trim(), 3, STT.val().trim()));
            } else if ($LoaiPhieu != 1 && $LoaiPhieu % 2 != 0) {
                $check_luu = (kiemtrakhoadulieu(ngayghiso.val().trim(), 7, STT.val().trim(), $("#tkco").val()));
            }
            if ($LoaiPhieu == 2) {
                $check_luu = (kiemtrakhoadulieu(ngayghiso.val().trim(), 4, STT.val().trim()));
            } else if ($LoaiPhieu != 2 && $LoaiPhieu % 2 == 0) {
                $check_luu = (kiemtrakhoadulieu(ngayghiso.val().trim(), 8, STT.val().trim(), $("#tkco").val()));
            }
            if ($check_luu != "") {
                alert($check_luu);
                return false;
            }
            var $cothuegtgt = 0;
            if (cothuegtgt.is(":checked")) {
                $cothuegtgt = 1;
            }

            var $baogomthue = 0;
            if (baogomthue.is(":checked")) {
                $baogomthue = 1;
            }
            var $chungtugoc = 1;
            if ($("#chungtugoc").is(":checked")) {
                $chungtugoc = 0;
            }
            $loaitokhai = 1;// tờ khai bổ sung
            if ($("#khaichinhthuc").prop("checked")) {
                $loaitokhai = 1;// tờ khai bổ sung
            } else {
                $loaitokhai = 0;// tờ khai bổ sung
            }
            //// Thông báo nếu là tờ khai bổ sung

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

            if (checkSoHoaDonTrung_Vuot($LoaiPhieu).trim() != "K") {
                $thongbao = checkSoHoaDonTrung_Vuot($LoaiPhieu);
                var result1 = confirm($thongbao);
                if (result1) {
                    valid = valid && true;
                } else {
                    valid = valid && false;
                    $("#sohoadon").focus();
                }
            }

            if ($loaitokhai == 0) {
                var result = confirm("Bạn đang chọn tờ khai bổ sung ! Bạn có muốn tiếp tục nhập ?");
                if (result == false) {
                    $("#sohoadon").focus();
                    return false;
                }
            }
            valid = valid && checkNull(STT, " Số TT  ");
            valid = valid && checkNull(makhachhang, " Mã khách hàng ");
            valid = valid && checkNull(ngayghiso, " Ngày ghi sổ ");

            valid = valid && checkNull(manoidung1, " Mã nội dung ");
            valid = valid && checkNull(mabophan, " Mã bộ phận ");
            valid = valid && checkNull(tkco, " Mã tài khoản ");
            valid = valid && checkNull(tkno1, " Mã tài khoản ");
            valid = valid && checkNull(sotien1, " Số tiền ");

            {
                if (valid) {
                    $.ajax({

                        url: $dir_module_ps_kt + "nhapphieuthuchi.php", // Bao gồm cả add và edit
                        type: "get", // chọn phương thức gửi là get
                        dateType: "text", // dữ liệu trả về dạng text
                        data: { // Danh sách các thuộc tính sẽ gửi đi

                            mapskt: STT.val().trim(),
                            sottpsct: sottpsct.val().trim(),


                            loaiphieu: $LoaiPhieu,
                            sophieu: sophieu.val().trim(),

                            btntkco: btntkco.val().trim(),
                            tkco: tkco.val().trim(),
                            tentkco: tentkco.val().trim(),

                            ngayghiso: ngayghiso.val().trim(),
                            loaict: loaict.val().trim(),
                            kyhieu: kyhieu.val().trim(),
                            mauso: mauso.val().trim(),
                            sohoadon: sohoadon.val().trim(),
                            ngayhoadon: ngayhoadon.val().trim(),

                            btnmakh: btnmakh.val().trim(),
                            makhachhang: makhachhang.val().trim(),
                            tenkhachhang: tenkhachhang.val().trim(),
                            diachi: diachi.val().trim(),
                            masothue: masothue.val().trim(),

                            btnmakh2: btnmakh2.val().trim(),
                            makhachhang2: makhachhang2.val().trim(),
                            tenkhachhang2: tenkhachhang2.val().trim(),
                            diachi2: diachi2.val().trim(),
                            mangsang: mangsang.val().trim(),

                            mabophan: mabophan.val().trim(),
                            bophan: bophan.val().trim(),

                            cothuegtgt: cothuegtgt.val().trim(),

                            baogomthue: $baogomthue,
                            thuesuat1: thuesuat1.val().trim(),

                            btnnoidung1: btnnoidung1.val().trim(),
                            manoidung1: manoidung1.val().trim(),
                            noidung1: noidung1.val().trim(),

                            btnnoidung2: btnnoidung2.val().trim(),
                            manoidung2: manoidung2.val().trim(),
                            noidung2: noidung2.val().trim(),

                            tkno1: tkno1.val().trim(),
                            tkno2: tkno2.val().trim(),
                            sotien1: sotien1.val().trim(),
                            sotien2: sotien2.val().trim(),

                            hanthanhtoan: hanthanhtoan.val().trim(),
                            tongtien: tongtien.val().trim(),

                            tygia: $("#tygia").val().trim(),
                            sotiennt1: $("#sotiennt1").val().trim(),
                            sotiennt2: $("#sotiennt2").val().trim(),
                            tongtiennt: $("#tongtiennt").val().trim(),
                            tongcongnt: $("#tongcongnt").val().trim(),

                            tongcong: tongcong.val().trim(),
                            ghichu: ghichu.val().trim(),
                            cothuegtgt: $cothuegtgt,
                            chungtugoc: $chungtugoc,
                            chiphikhongloaitru: $chiphikhongloaitru,
                            loaitokhai: $loaitokhai,
                            loaisp: $("#chonloaisp").val(),
                            dathem: 1,
                        },
                        success: function (result) {
                            //$('.dialog_main_thongbao').load('form/frm_thongbao_thuchi.php?loaiphieu=' + $LoaiPhieu + '&ngayhd=' + ngayhoadon.val().trim() + '&sophieu=' + sophieu.val().trim());
                            $tongcongtien = tongcong.val().trim();
                            $sottpsct = getSoTTPSKTMAX();
                            sottpsct.val($sottpsct);
                            sotien1.val("");
                            sotien2.val("");
                            tongtien.val("");
                            $("#sotiennt1").val("");
                            $("#sotiennt2").val("");
                            $("#tongtiennt").val("");

                            $("#tongcong_cu").val($tongcongtien);
                        }
                    });
                }
            }
        });
        btnxoa.click(function (event) {// Gọi table khách hàng để chọn
            var $LoaiPhieu = 0;
            $tkco = $("#tkco").val();

            if (phieuthu.is(":checked")) {
                $LoaiPhieu = 1;
                if ($tkco == 112101)
                    $LoaiPhieu = 5;
                if ($tkco == 112102)
                    $LoaiPhieu = 7;
                if ($tkco == 112103)
                    $LoaiPhieu = 9;
                if ($tkco == 112104)
                    $LoaiPhieu = 11;
                if ($tkco == 112105)
                    $LoaiPhieu = 13;
                if ($tkco == 112106)
                    $LoaiPhieu = 15;
                if ($tkco == 112107)
                    $LoaiPhieu = 17;
                if ($tkco == 112108)
                    $LoaiPhieu = 19;
                if ($tkco == 112109)
                    $LoaiPhieu = 21;
                if ($tkco == 112110)
                    $LoaiPhieu = 23;
                if ($tkco == 112111)
                    $LoaiPhieu = 25;
                if ($tkco == 112112)
                    $LoaiPhieu = 27;
                if ($tkco == 112113)
                    $LoaiPhieu = 29;
                if ($tkco == 112114)
                    $LoaiPhieu = 31;
                if ($tkco == 112115)
                    $LoaiPhieu = 33;

                if ($tkco == 112201)
                    $LoaiPhieu = 35;
                if ($tkco == 112202)
                    $LoaiPhieu = 37;
                if ($tkco == 112203)
                    $LoaiPhieu = 39;
                if ($tkco == 112204)
                    $LoaiPhieu = 41;
                if ($tkco == 112205)
                    $LoaiPhieu = 43;
                if ($tkco == 112206)
                    $LoaiPhieu = 45;
                if ($tkco == 112207)
                    $LoaiPhieu = 47;
                if ($tkco == 112208)
                    $LoaiPhieu = 49;
                if ($tkco == 112209)
                    $LoaiPhieu = 51;
                if ($tkco == 112210)
                    $LoaiPhieu = 53;
                if ($tkco == 112211)
                    $LoaiPhieu = 55;
                if ($tkco == 112212)
                    $LoaiPhieu = 57;
                if ($tkco == 112213)
                    $LoaiPhieu = 59;
                if ($tkco == 112214)
                    $LoaiPhieu = 61;
                if ($tkco == 112215)
                    $LoaiPhieu = 63;

            }
            if (phieuchi.is(":checked")) {
                $LoaiPhieu = 2;
                if ($tkco == 112101)
                    $LoaiPhieu = 6;
                if ($tkco == 112102)
                    $LoaiPhieu = 8;
                if ($tkco == 112103)
                    $LoaiPhieu = 10;
                if ($tkco == 112104)
                    $LoaiPhieu = 12;
                if ($tkco == 112105)
                    $LoaiPhieu = 14;
                if ($tkco == 112106)
                    $LoaiPhieu = 16;
                if ($tkco == 112107)
                    $LoaiPhieu = 18;
                if ($tkco == 112108)
                    $LoaiPhieu = 20;
                if ($tkco == 112109)
                    $LoaiPhieu = 22;
                if ($tkco == 112110)
                    $LoaiPhieu = 24;
                if ($tkco == 112111)
                    $LoaiPhieu = 26;
                if ($tkco == 112112)
                    $LoaiPhieu = 28;
                if ($tkco == 112113)
                    $LoaiPhieu = 30;
                if ($tkco == 112114)
                    $LoaiPhieu = 32;
                if ($tkco == 112115)
                    $LoaiPhieu = 34;

                if ($tkco == 112201)
                    $LoaiPhieu = 36;
                if ($tkco == 112202)
                    $LoaiPhieu = 38;
                if ($tkco == 112203)
                    $LoaiPhieu = 40;
                if ($tkco == 112204)
                    $LoaiPhieu = 42;
                if ($tkco == 112205)
                    $LoaiPhieu = 44;
                if ($tkco == 112206)
                    $LoaiPhieu = 46;
                if ($tkco == 112207)
                    $LoaiPhieu = 48;
                if ($tkco == 112208)
                    $LoaiPhieu = 50;
                if ($tkco == 112209)
                    $LoaiPhieu = 52;
                if ($tkco == 112210)
                    $LoaiPhieu = 54;
                if ($tkco == 112211)
                    $LoaiPhieu = 56;
                if ($tkco == 112212)
                    $LoaiPhieu = 58;
                if ($tkco == 112213)
                    $LoaiPhieu = 60;
                if ($tkco == 112214)
                    $LoaiPhieu = 62;
                if ($tkco == 112215)
                    $LoaiPhieu = 64;

            }
            //alert($LoaiPhieu);

            if ($LoaiPhieu == 1) {
                $check_luu = (kiemtrakhoadulieu(ngayghiso.val().trim(), 3, STT.val().trim()));
            } else if ($LoaiPhieu != 1 && $LoaiPhieu % 2 != 0) {
                $check_luu = (kiemtrakhoadulieu(ngayghiso.val().trim(), 7, STT.val().trim(), $("#tkco").val()));
            }
            if ($LoaiPhieu == 2) {
                $check_luu = (kiemtrakhoadulieu(ngayghiso.val().trim(), 4, STT.val().trim()));
            } else if ($LoaiPhieu != 2 && $LoaiPhieu % 2 == 0) {
                $check_luu = (kiemtrakhoadulieu(ngayghiso.val().trim(), 8, STT.val().trim(), $("#tkco").val()));
            }
            if ($check_luu != "") {
                alert($check_luu);
                return false;
            }
            var $soluong;
            $page = 1;
            $sophieu = sophieu.val();
            $sottpsct = sottpsct.val();
            $tongtien = tongtien.val().replace(/,/gi, "");
            $tongcong = tongcong.val().replace(/,/gi, "")
            $.ajax({// Kiểm tra xem còn bao nhiêu tập tin để xóa
                url: $dir_module_ps_kt + "kiemtraconbaonhieudongchitiet.php",
                async: false,
                data: {sophieu: $sophieu},
                success: function (response) {
                    $soluong = parseInt(response);
                }
            });
            if ($soluong == 1) {
                if ($('div').hasClass('jconfirm') == false) {
                    $.confirm({
                        title: 'LƯU Ý',
                        content: 'Bạn có muốn xóa phiếu này không ?<br/>Nhấn phím <strong style="color:blue;">[Y]</strong> để ĐỒNG Ý <strong style="color:blue;">[N]</strong> để HỦY BỎ ',
                        icon: 'fa fa-warning',
                        type: 'red',
                        buttons: {
                            "ĐỒNG Ý": {
                                keys: ['Y'], action: function () {
                                    $.ajax({// Kiểm tra xem còn bao nhiêu tập tin để xóa
                                        url: $dir_module_ps_kt + "del.php",
                                        async: false,
                                        data: {sophieu: $sophieu, soluong: $soluong, sottpsct: $sottpsct},
                                        success: function (response) {
                                            $data = response;
                                        }
                                    });
                                    xoaform_phieuthuchi(1);
                                    readonlyNonSubmitSTT();
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
                if ($('div').hasClass('jconfirm') == false) {
                    $.confirm({
                        title: 'LƯU Ý',
                        content: 'Bạn có muốn xóa phiếu này không ?<br/>Nhấn phím <strong style="color:blue;">[Y]</strong> để ĐỒNG Ý <strong style="color:blue;">[N]</strong> để HỦY BỎ ',
                        icon: 'fa fa-warning',
                        type: 'red',
                        buttons: {
                            "ĐỒNG Ý": {
                                keys: ['Y'], action: function () {
                                    $tongdatru = parseFloat($tongcong) - parseFloat($tongtien);
                                    $.ajax({// Kiểm tra xem còn bao nhiêu tập tin để xóa
                                        url: $dir_module_ps_kt + "del.php",
                                        async: false,
                                        data: {
                                            sophieu: $sophieu,
                                            soluong: $soluong,
                                            sottpsct: $sottpsct,
                                            tongcong: $tongdatru
                                        },
                                        success: function (response) {
                                            $data = response;
                                        }
                                    });
                                    phantrang($page, $sophieu);
                                    $sum = tongtienphieu($("#sophieu").val(), $("#sottpsct").val(), 0);
                                    tongcong.val(FormatNumber($sum.toString()));
                                    tongcong_cu.val(FormatNumber($tongdatru.toString()));
                                }
                            },
                            "HỦY BỎ": {
                                keys: ['N'], action: function () {

                                }
                            }
                        }
                    });
                }
            }
        });
        btnvedau.click(function (event) {// Gọi table khách hàng để chọn
            $page = btnvedau.attr("page");
            $sophieu = sophieu.val();
            phantrang($page, $sophieu);
        });
        btnvecuoi.click(function (event) {// Gọi table khách hàng để chọn
            $page = btnvecuoi.attr("page");
            $sophieu = sophieu.val();
            phantrang($page, $sophieu);
        });
        btnvetruoc.click(function (event) {// Gọi table khách hàng để chọn
            $page = btnvetruoc.attr("page");
            $sophieu = sophieu.val();
            phantrang($page, $sophieu);
        });
        btnketiep.click(function (event) {// Gọi table khách hàng để chọn
            $page = btnketiep.attr("page");
            $sophieu = sophieu.val();
            phantrang($page, $sophieu);
        });


        ///////////////////////////////////////////////////////////////////////
        $(loaict).change(function () {// Lấy tên khách hàng , địa chỉ , mst
            $loaict = loaict.val();
            if ($loaict == 1) {
                mauso.val("01GTKT1-001");
                cothuegtgt.attr("checked", true)
            }
            if ($loaict == 2) {
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
            if (ngayhoadon.val() == "") {
                ngayhoadon.val(ngayghiso.val());
            }
        });
        function layngayghiso($LoaiPhieu) {
            var $data;
            $.ajax({
                url: $dir_module_ps_kt + "laythongtinngayghiso.php",
                async: false,
                data: {lp: $LoaiPhieu},
                success: function (response) {
                    $data = response;
                }
            });
            return $data;
        }

        function checkSTT(STT) {// Check key khi nhấn enter
            $STT = STT.val().trim();
            $sophieu = sophieu.val().trim();
            var $LoaiPhieu = 0;
            $tkco = parseInt($("#tkco").val());
            if (phieuthu.is(":checked")) {
                $LoaiPhieu = 1;
                if ($tkco == 112101)
                    $LoaiPhieu = 5;
                if ($tkco == 112102)
                    $LoaiPhieu = 7;
                if ($tkco == 112103)
                    $LoaiPhieu = 9;
                if ($tkco == 112104)
                    $LoaiPhieu = 11;
                if ($tkco == 112105)
                    $LoaiPhieu = 13;
                if ($tkco == 112106)
                    $LoaiPhieu = 15;
                if ($tkco == 112107)
                    $LoaiPhieu = 17;
                if ($tkco == 112108)
                    $LoaiPhieu = 19;
                if ($tkco == 112109)
                    $LoaiPhieu = 21;
                if ($tkco == 112110)
                    $LoaiPhieu = 23;
                if ($tkco == 112111)
                    $LoaiPhieu = 25;
                if ($tkco == 112112)
                    $LoaiPhieu = 27;
                if ($tkco == 112113)
                    $LoaiPhieu = 29;
                if ($tkco == 112114)
                    $LoaiPhieu = 31;
                if ($tkco == 112115)
                    $LoaiPhieu = 33;

                if ($tkco == 112201)
                    $LoaiPhieu = 35;
                if ($tkco == 112202)
                    $LoaiPhieu = 37;
                if ($tkco == 112203)
                    $LoaiPhieu = 39;
                if ($tkco == 112204)
                    $LoaiPhieu = 41;
                if ($tkco == 112205)
                    $LoaiPhieu = 43;
                if ($tkco == 112206)
                    $LoaiPhieu = 45;
                if ($tkco == 112207)
                    $LoaiPhieu = 47;
                if ($tkco == 112208)
                    $LoaiPhieu = 49;
                if ($tkco == 112209)
                    $LoaiPhieu = 51;
                if ($tkco == 112210)
                    $LoaiPhieu = 53;
                if ($tkco == 112211)
                    $LoaiPhieu = 55;
                if ($tkco == 112212)
                    $LoaiPhieu = 57;
                if ($tkco == 112213)
                    $LoaiPhieu = 59;
                if ($tkco == 112214)
                    $LoaiPhieu = 61;
                if ($tkco == 112215)
                    $LoaiPhieu = 63;
            }
            if (phieuchi.is(":checked")) {
                $LoaiPhieu = 2;
                if ($tkco == 112101)
                    $LoaiPhieu = 6;
                if ($tkco == 112102)
                    $LoaiPhieu = 8;
                if ($tkco == 112103)
                    $LoaiPhieu = 10;
                if ($tkco == 112104)
                    $LoaiPhieu = 12;
                if ($tkco == 112105)
                    $LoaiPhieu = 14;
                if ($tkco == 112106)
                    $LoaiPhieu = 16;
                if ($tkco == 112107)
                    $LoaiPhieu = 18;
                if ($tkco == 112108)
                    $LoaiPhieu = 20;
                if ($tkco == 112109)
                    $LoaiPhieu = 22;
                if ($tkco == 112110)
                    $LoaiPhieu = 24;
                if ($tkco == 112111)
                    $LoaiPhieu = 26;
                if ($tkco == 112112)
                    $LoaiPhieu = 28;
                if ($tkco == 112113)
                    $LoaiPhieu = 30;
                if ($tkco == 112114)
                    $LoaiPhieu = 32;
                if ($tkco == 112115)
                    $LoaiPhieu = 34;

                if ($tkco == 112201)
                    $LoaiPhieu = 36;
                if ($tkco == 112202)
                    $LoaiPhieu = 38;
                if ($tkco == 112203)
                    $LoaiPhieu = 40;
                if ($tkco == 112204)
                    $LoaiPhieu = 42;
                if ($tkco == 112205)
                    $LoaiPhieu = 44;
                if ($tkco == 112206)
                    $LoaiPhieu = 46;
                if ($tkco == 112207)
                    $LoaiPhieu = 48;
                if ($tkco == 112208)
                    $LoaiPhieu = 50;
                if ($tkco == 112209)
                    $LoaiPhieu = 52;
                if ($tkco == 112210)
                    $LoaiPhieu = 54;
                if ($tkco == 112211)
                    $LoaiPhieu = 56;
                if ($tkco == 112212)
                    $LoaiPhieu = 58;
                if ($tkco == 112213)
                    $LoaiPhieu = 60;
                if ($tkco == 112214)
                    $LoaiPhieu = 62;
                if ($tkco == 112215)
                    $LoaiPhieu = 64;

            }
            if ($STT == "") {//Nếu số thứ tự null sẽ tạo số mới tự động tăng theo mã
                var $data;
                $.ajax({
                    url: $dir_module_ps_kt + "taomapskt.php",
                    async: false,
                    data: {lp: $LoaiPhieu},
                    success: function (response) {
                        $data = response;
                    }
                });
                var $sophieu = 1;
                $.ajax({// Tạo số phiếu
                    url: $dir_module_ps_kt + "taosophieu.php",
                    data: {loaiphieu: $LoaiPhieu, mapskt: parseInt($data)},
                    async: false,
                    success: function (response) {
                        $sophieu = parseInt(response);
                    }
                });
                sophieu.val($sophieu);
                $("#ThamChieuTS").text("Tham chiếu TS: " + $sophieu);
                STT.val(parseInt($data));

                $sottpsct = getSoTTPSKTMAX();
                $("#sottpsct").val($sottpsct);
                $ngayghiso = layngayghiso($LoaiPhieu);
                $("#ngayghiso").val($ngayghiso.trim());
                $("#ngayhoadon").val("");
                $("#chungtugoc").attr("checked", false);
                $("#chiphikhongloaitru").attr("checked", false);

            } else {// Nếu không trống kiểm tra xem có tồn tại hay không
                var $checkphieuthuchi = 0;
                $.ajax({// Kiểm tra xem STT có tồn tại hay không
                    url: $dir_module_ps_kt + "checkkey.php",
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
                                        notReadonlyInput();
                                        var $sophieu = 1;
                                        $.ajax({// Tạo số phiếu
                                            url: $dir_module_ps_kt + "taosophieu.php",
                                            data: {loaiphieu: $LoaiPhieu, mapskt: parseInt($STT)},
                                            async: false,
                                            success: function (response) {
                                                $sophieu = parseInt(response);
                                            }
                                        });
                                        $sottpsct = getSoTTPSKTMAX();
                                        $("#sottpsct").val($sottpsct);
                                        sophieu.val($sophieu);
                                        $("#ThamChieuTS").text("Tham chiếu TS: " + $sophieu);
                                        $("#chungtugoc").attr("checked", false);
                                        $("#ngayhoadon").val("");
                                        $("#chiphikhongloaitru").attr("checked", false);
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
                        url: $dir_module_ps_kt + "laythongtinphieu.php",
                        data: {ma: $STT, lp: $LoaiPhieu},
                        async: false,
                        success: function (response) {
                            $data = $.parseJSON(response);
                        }
                    });

                    try {
                        ngayghiso.val($data.ngayghiso);
                        tongcong.val(FormatNumber($data.tongcong.toString()));

                        $("#tongcongnt").val(FormatNumber($data.tongcongnt.toString()));

                        tongcong_cu.val(FormatNumber($data.tongcong.toString()));

                        $("#tkco").val($data.tkco);
                        $("#tentkco").val($data.tentkco);

                        makhachhang.val($data.makh);
                        tenkhachhang.val($data.tenkh);
                        diachi.val($data.diachi);
                        masothue.val($data.masothue);

                        sophieu.val($data.sophieu);
                        $("#ThamChieuTS").text("Tham chiếu TS: " + $data.sophieu);

                        ///////End PSKT----------
                        phantrang(1, $data.sophieu);


                        ghichu.val($data.chuthich);
                    } catch (e) {
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
                                            notReadonlyInput();
                                            var $sophieu = 1;
                                            $.ajax({// Tạo số phiếu
                                                url: $dir_module_ps_kt + "taosophieu.php",
                                                data: {loaiphieu: $LoaiPhieu, mapskt: parseInt($STT)},
                                                async: false,
                                                success: function (response) {
                                                    $sophieu = parseInt(response);
                                                }
                                            });
                                            $sottpsct = getSoTTPSKTMAX();
                                            $("#sottpsct").val($sottpsct);
                                            sophieu.val($sophieu);
                                            $("#ThamChieuTS").text("Tham chiếu TS: " + $sophieu);
                                            $("#chungtugoc").attr("checked", false);
                                            $("#ngayhoadon").val("");
                                            $("#chiphikhongloaitru").attr("checked", false);
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
                    }


                    ngayghiso.focus();
                }
            }
            $.ajax({
                url: $dir_module_ps_kt + "dunotaikhoan.php", // Bao gồm cả add và edit
                type: "get", // chọn phương thức gửi là get
                dateType: "text", // dữ liệu trả về dạng text
                data: { // Danh sách các thuộc tính sẽ gửi đi
                    matk: tkco.val().trim()
                },
                success: function (result) {
                    $("#tongsodutk").html(result);
                }
            });
        }

        function phantrang($page, $sophieu) {
            $data = "";
            $.ajax({
                url: $dir_module_ps_kt + "phantrang.php",
                data: {page: $page, sophieu: $sophieu},
                async: false,
                success: function (response) {
                    $data = $.parseJSON(response);
                }
            });
            loaict.val($data.maloai);
            mauso.val($data.mauso);
            sottpsct.val($data.sott);
            kyhieu.val($data.seri);
            sohoadon.val($data.sct);
            ngayhoadon.val($data.ngayhoadon);


            makhachhang2.val($data.makhno);
            tenkhachhang2.val($data.tenkhachhang);
            diachi2.val($data.diachikh);
            $cothuegtgt = $data.cothuegtgt;
            if ($cothuegtgt == 1) {
                cothuegtgt.attr("checked", true);
            } else {
                cothuegtgt.attr("checked", false);
            }

            $baogomthue = $data.baogomthue;
            if ($baogomthue == 1) {
                baogomthue.attr("checked", true);
            } else {
                baogomthue.attr("checked", false);
            }

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


            //lbltranghientai.text($data.tranghientai+"/"+$data.mapskt);
            $("#lbltranghientai").text($data.tranghientai + "/" + $data.mapskt);
            mabophan.val($data.mabp);
            bophan.val($data.bophan);
            hanthanhtoan.val($data.ngaythanhtoan);

            manoidung1.val($data.mand1);
            $("#manoidung1copy").val($data.mand1);
            noidung1.val($data.noidung1);

            thuesuat1.val($data.thuesuat1);

            manoidung2.val($data.mand2);
            noidung2.val($data.noidung2);

            $("#chonloaisp").val($data.loaisp);
            if ($data.loaisp == "" || $data.loaiphieu != 2) {
                $("#CTCT").attr("disabled", true);
            } else {
                $("#CTCT").attr("disabled", false);
            }

            tkno1.val($data.tkno1);
            tkno2.val($data.tkno2);

            sotien1.val(FormatNumber($data.gtvnd1));
            sotien2.val(FormatNumber($data.gtvnd2));

            $("#tygia").val(FormatNumber($data.tygia));
            $("#sotiennt1").val(FormatNumber($data.sotiennt));
            $("#sotiennt2").val(FormatNumber($data.sotiennt1));
            $("#tongtiennt").val(FormatNumber($data.tongtiennt));

            tongtien.val(FormatNumber($data.tongtien));

            tongtien_cu.val(FormatNumber($data.tongtien));

            //điều khiển button-------------
            if ($data.vetruoc != 0) {
                btnvetruoc.attr("disabled", false);
                btnvetruoc.attr("page", $data.vetruoc);
            } else {
                btnvetruoc.attr("page", $data.vetruoc);
                btnvetruoc.attr("disabled", true);
            }
            if ($data.ketiep != 0) {
                btnketiep.attr("disabled", false);
                btnketiep.attr("page", $data.ketiep);
            } else {
                btnketiep.attr("page", $data.ketiep);
                btnketiep.attr("disabled", true);
            }
            if ($data.dautrang != 0) {
                btnvedau.attr("page", $data.dautrang);
                btnvedau.attr("disabled", false);
            } else {
                btnvedau.attr("page", $data.dautrang);
                btnvedau.attr("disabled", true);
            }
            if ($data.cuoitrang != 0) {
                btnvecuoi.attr("disabled", false);
                btnvecuoi.attr("page", $data.cuoitrang);
            } else {
                btnvecuoi.attr("page", $data.cuoitrang);
                btnvecuoi.attr("disabled", true);
            }
        }

        $(STT).keydown(function (event) {// Gọi table khách hàng để chọn
            if (event.keyCode == Keys.ENTER) { //
                checkSTT(STT);
                STT.attr("disabled", true);
                notReadonlyInput();
                readonlySubmitSTT();
                ngayghiso.focus();
            }
        });
        /*btnvedau.click(function () {
         $data = "";
         $sophieu = sophieu.val().trim();
         $.ajax({
         url: $dir_module_ps_kt + "load_ctpskt.php",
         data: {sophieu: $sophieu},
         async: false,
         success: function (response) {
         $data = $.parseJSON(response);
         }
         });
         });*/
        function readonlySubmitSTT() {
            phieuthu.attr("disabled", true);
            phieuchi.attr("disabled", true);
            btntkco.attr("disabled", true);
            tkco.attr("disabled", true);
            btnstt.attr("disabled", true);


        }

        function readonlyNonSubmitSTT() {
            phieuthu.attr("disabled", false);
            phieuchi.attr("disabled", false);
            btntkco.attr("disabled", false);
            STT.attr("disabled", false);
            tkco.attr("disabled", false);
            btnstt.attr("disabled", false);


        }

        function readonlyInput() {
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
            $("#cothuegtgt").attr("disabled", true);

            $("#btnnoidung1").attr("disabled", true);
            $("#btnnoidung2").attr("disabled", true);

            $("#manoidung1").attr("disabled", true);
            $("#manoidung2").attr("disabled", true);

            $("#noidung1").attr("disabled", true);
            $("#noidung2").attr("disabled", true);

            $("#btntkno1").attr("disabled", true);
            $("#btntkno2").attr("disabled", true);
            $("#btnthem").attr("disabled", true);
            $("#btntim").attr("disabled", true);
            $("#btnxoa").attr("disabled", true);


            $("#tkno1").attr("disabled", true);
            $("#tkno2").attr("disabled", true);
            $("#tkco1").attr("disabled", true);
            $("#tkco2").attr("disabled", true);
            $("#sotien1").attr("disabled", true);
            $("#sotien2").attr("disabled", true);
            $("#tongtien").attr("disabled", true);
            $("#ghichu").attr("disabled", true);
        }

        function notReadonlyInput() {
            $("#ngayghiso").attr("disabled", false);
            $("#loaict").attr("disabled", false);
            $("#mauso").attr("disabled", false);
            $("#kyhieu").attr("disabled", false);
            $("#sohoadon").attr("disabled", false);
            $("#ngayhoadon").attr("disabled", false);


            $("#btnmakh").attr("disabled", false);
            $("#makhachhang").attr("disabled", false);
            $("#tenkhachhang").attr("disabled", false);
            $("#diachi").attr("disabled", false);
            $("#masothue").attr("disabled", false);

            $("#btnmakh2").attr("disabled", false);
            $("#makhachhang2").attr("disabled", false);
            $("#tenkhachhang2").attr("disabled", false);
            $("#diachi2").attr("disabled", false);


            $("#btnbophan").attr("disabled", false);
            $("#mabophan").attr("disabled", false);
            // $("#bophan").attr("disabled", false);
            $("#hanthanhtoan").attr("disabled", false);
            $("#cothuegtgt").attr("disabled", false);

            $("#btnnoidung1").attr("disabled", false);
            $("#btnnoidung2").attr("disabled", false);

            $("#manoidung1").attr("disabled", false);
            $("#manoidung2").attr("disabled", false);
            $("#btnthem").attr("disabled", false);
            $("#btntim").attr("disabled", false);
            $("#btnxoa").attr("disabled", false);

            $("#noidung1").attr("disabled", false);
            $("#noidung2").attr("disabled", false);

            $("#btntkno1").attr("disabled", false);
            $("#btntkno2").attr("disabled", false);


            $("#tkno1").attr("disabled", false);
            $("#tkno2").attr("disabled", false);
            $("#tkco1").attr("disabled", false);
            $("#tkco2").attr("disabled", false);
            $("#sotien1").attr("disabled", false);
            $("#sotien2").attr("disabled", false);
            //$("#tongtien").attr("disabled", false);
            $("#ghichu").attr("disabled", false);
        }


        function xoaform_phieuthuchi($mangsang) {//------------------------------------------------------------------------------------
            if ($mangsang == 1) {
                $("#sotien1").val("");
                $("#sotien2").val("");
                $("#STT").val("");
                $("#sophieu").val("");
                $("#tongtien").val("");
                $("#tongcong").val("");
                $("#tongtien_cu").val("");
                $("#tongcong_cu").val("");
            } else {
                $("#sotien1").val("");
                $("#sotien2").val("");
                $("#STT").val("");
                $("#sophieu").val("");
                $("#tongtien").val("");
                $("#tongcong").val("");
                $("#tongtien_cu").val("");
                $("#tongcong_cu").val("");

                $("#tkco").attr("disabled", false);
                $("#btnstt").attr("disabled", false);
                $("#STT").attr("disabled", false);
                $("#STT").focus();


                $("#ngayghiso").val("");
                $("#loaict").val("");
                $("#mauso").val("");
                $("#kyhieu").val("");
                $("#sohoadon").val("");
                $("#ngayhoadon").val("");

                $("#makhachhang").val("");
                $("#tenkhachhang").val("");
                $("#diachi").val("");
                $("#masothue").val("");

                $("#makhachhang2").val("");
                $("#tenkhachhang2").val("");
                $("#diachi2").val("");


                $("#mabophan").val("0001");
                $("#bophan").val("Toàn bộ");
                $("#hanthanhtoan").val("");
                $("#cothuegtgt").val("");


                $("#manoidung1").val("");
                $("#manoidung2").val("");

                $("#noidung1").val("");
                $("#noidung2").val("");


                $("#tkno1").val("");
                $("#tkno2").val("");
                $("#tkco1").val("");
                $("#tkco2").val("");
                $("#sotien1").val("");
                $("#sotien2").val("");
                $("#tongtien").val("");
                $("#ghichu").val("");
            }

            readonlyInput();

        }//-------------------------------------------------------------------------------------------------------

        function ChucNang_ThuChi() {// Xử lý khi nhấp button đồng ý
            var valid = true;
            allFields.removeClass("ui-state-error");// kiem tra du lieu
            $tkco = $("#tkco").val();
            $tkno1 = $("#tkno1").val();
            $tkno2 = $("#tkno2").val();
            $tkco1 = $("#tkco1").val();
            $tkco2 = $("#tkco2").val();
            $tongtien = parseFloat($("#tongtien").val().replace(/,/g, ""));
            $LoaiCT = loaict.val().trim();

            $NgayGhiSo = new Date($("#ngayghiso").val());
            $NamGhiSo = $NgayGhiSo.getFullYear();
            if (<?php echo $_SESSION['NienDo']; ?>!=$NamGhiSo)
            {
                alert("Ngày ghi sổ không nằm trong năm tài chính <?php echo $_SESSION['NienDo']; ?> ! Vui lòng nhập lại .");
                return false;
            }

            var $LoaiPhieu = 0;
            $tkco = $("#tkco").val();

            if (phieuthu.is(":checked")) {
                $LoaiPhieu = 1;
                if ($tkco == 112101)
                    $LoaiPhieu = 5;
                if ($tkco == 112102)
                    $LoaiPhieu = 7;
                if ($tkco == 112103)
                    $LoaiPhieu = 9;
                if ($tkco == 112104)
                    $LoaiPhieu = 11;
                if ($tkco == 112105)
                    $LoaiPhieu = 13;
                if ($tkco == 112106)
                    $LoaiPhieu = 15;
                if ($tkco == 112107)
                    $LoaiPhieu = 17;
                if ($tkco == 112108)
                    $LoaiPhieu = 19;
                if ($tkco == 112109)
                    $LoaiPhieu = 21;
                if ($tkco == 112110)
                    $LoaiPhieu = 23;
                if ($tkco == 112111)
                    $LoaiPhieu = 25;
                if ($tkco == 112112)
                    $LoaiPhieu = 27;
                if ($tkco == 112113)
                    $LoaiPhieu = 29;
                if ($tkco == 112114)
                    $LoaiPhieu = 31;
                if ($tkco == 112115)
                    $LoaiPhieu = 33;

                if ($tkco == 112201)
                    $LoaiPhieu = 35;
                if ($tkco == 112202)
                    $LoaiPhieu = 37;
                if ($tkco == 112203)
                    $LoaiPhieu = 39;
                if ($tkco == 112204)
                    $LoaiPhieu = 41;
                if ($tkco == 112205)
                    $LoaiPhieu = 43;
                if ($tkco == 112206)
                    $LoaiPhieu = 45;
                if ($tkco == 112207)
                    $LoaiPhieu = 47;
                if ($tkco == 112208)
                    $LoaiPhieu = 49;
                if ($tkco == 112209)
                    $LoaiPhieu = 51;
                if ($tkco == 112210)
                    $LoaiPhieu = 53;
                if ($tkco == 112211)
                    $LoaiPhieu = 55;
                if ($tkco == 112212)
                    $LoaiPhieu = 57;
                if ($tkco == 112213)
                    $LoaiPhieu = 59;
                if ($tkco == 112214)
                    $LoaiPhieu = 61;
                if ($tkco == 112215)
                    $LoaiPhieu = 63;

            }
            if (phieuchi.is(":checked")) {
                $LoaiPhieu = 2;
                if ($tkco == 112101)
                    $LoaiPhieu = 6;
                if ($tkco == 112102)
                    $LoaiPhieu = 8;
                if ($tkco == 112103)
                    $LoaiPhieu = 10;
                if ($tkco == 112104)
                    $LoaiPhieu = 12;
                if ($tkco == 112105)
                    $LoaiPhieu = 14;
                if ($tkco == 112106)
                    $LoaiPhieu = 16;
                if ($tkco == 112107)
                    $LoaiPhieu = 18;
                if ($tkco == 112108)
                    $LoaiPhieu = 20;
                if ($tkco == 112109)
                    $LoaiPhieu = 22;
                if ($tkco == 112110)
                    $LoaiPhieu = 24;
                if ($tkco == 112111)
                    $LoaiPhieu = 26;
                if ($tkco == 112112)
                    $LoaiPhieu = 28;
                if ($tkco == 112113)
                    $LoaiPhieu = 30;
                if ($tkco == 112114)
                    $LoaiPhieu = 32;
                if ($tkco == 112115)
                    $LoaiPhieu = 34;

                if ($tkco == 112201)
                    $LoaiPhieu = 36;
                if ($tkco == 112202)
                    $LoaiPhieu = 38;
                if ($tkco == 112203)
                    $LoaiPhieu = 40;
                if ($tkco == 112204)
                    $LoaiPhieu = 42;
                if ($tkco == 112205)
                    $LoaiPhieu = 44;
                if ($tkco == 112206)
                    $LoaiPhieu = 46;
                if ($tkco == 112207)
                    $LoaiPhieu = 48;
                if ($tkco == 112208)
                    $LoaiPhieu = 50;
                if ($tkco == 112209)
                    $LoaiPhieu = 52;
                if ($tkco == 112210)
                    $LoaiPhieu = 54;
                if ($tkco == 112211)
                    $LoaiPhieu = 56;
                if ($tkco == 112212)
                    $LoaiPhieu = 58;
                if ($tkco == 112213)
                    $LoaiPhieu = 60;
                if ($tkco == 112214)
                    $LoaiPhieu = 62;
                if ($tkco == 112215)
                    $LoaiPhieu = 64;

            }
            //alert($LoaiPhieu);

            if ($LoaiPhieu == 1) {
                $check_luu = (kiemtrakhoadulieu(ngayghiso.val().trim(), 3, STT.val().trim()));
            } else if ($LoaiPhieu != 1 && $LoaiPhieu % 2 != 0) {
                $check_luu = (kiemtrakhoadulieu(ngayghiso.val().trim(), 7, STT.val().trim(), $("#tkco").val()));
            }
            if ($LoaiPhieu == 2) {
                $check_luu = (kiemtrakhoadulieu(ngayghiso.val().trim(), 4, STT.val().trim()));
            } else if ($LoaiPhieu != 2 && $LoaiPhieu % 2 == 0) {
                $check_luu = (kiemtrakhoadulieu(ngayghiso.val().trim(), 8, STT.val().trim(), $("#tkco").val()));
            }
            if ($check_luu != "") {
                alert($check_luu);
                return false;
            }

            var $cothuegtgt = 0;
            if (cothuegtgt.is(":checked")) {
                $cothuegtgt = 1;
            }
            var $baogomthue = 0;
            if (baogomthue.is(":checked")) {
                $baogomthue = 1;
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
            } else {
                $loaitokhai = 0;// tờ khai bổ sung
            }

            //// Thông báo nếu là tờ khai bổ sung

            if ($loaitokhai == 0) {
                var result = confirm("Bạn đang chọn tờ khai bổ ! Bạn có muốn tiếp tục nhập ?");
                if (result == false) {
                    $("#sohoadon").focus();
                    return false;
                }
            }

            {
                valid = valid && checkNull(STT, " Số TT  ");
                valid = valid && checkNull(tkco, " Mã tài khoản ");
                valid = valid && checkNull(makhachhang, " Mã khách hàng ");
                valid = valid && checkNull(ngayghiso, " Ngày ghi sổ ");
                valid = valid && checkNull(ngayhoadon, " Ngày hoá đơn ");

                valid = valid && checkNull(manoidung1, " Mã nội dung ");
                valid = valid && checkNull(mabophan, " Mã bộ phận ");
                valid = valid && checkNull(tkno1, " Mã tài khoản ");
                valid = valid && checkNull(sotien1, " Số tiền ");
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

                if (checkSoHoaDonTrung_Vuot($LoaiPhieu).trim() != "K") {
                    $thongbao = checkSoHoaDonTrung_Vuot($LoaiPhieu);
                    var result1 = confirm($thongbao);
                    if (result1) {
                        valid = valid && true;
                    } else {
                        valid = valid && false;
                        $("#sohoadon").focus();
                    }
                }


                if (valid) {
                    $.ajax({

                        url: $dir_module_ps_kt + "nhapphieuthuchi.php", // Bao gồm cả add và edit
                        type: "get", // chọn phương thức gửi là get
                        dateType: "text", // dữ liệu trả về dạng text
                        data: { // Danh sách các thuộc tính sẽ gửi đi

                            mapskt: STT.val().trim(),
                            sottpsct: sottpsct.val().trim(),


                            loaiphieu: $LoaiPhieu,
                            sophieu: sophieu.val().trim(),

                            btntkco: btntkco.val().trim(),
                            tkco: tkco.val().trim(),
                            tentkco: tentkco.val().trim(),

                            ngayghiso: ngayghiso.val().trim(),
                            loaict: loaict.val().trim(),
                            kyhieu: kyhieu.val().trim(),
                            mauso: mauso.val().trim(),
                            sohoadon: sohoadon.val().trim(),
                            ngayhoadon: ngayhoadon.val().trim(),

                            btnmakh: btnmakh.val().trim(),
                            makhachhang: makhachhang.val().trim(),
                            tenkhachhang: tenkhachhang.val().trim(),
                            diachi: diachi.val().trim(),
                            masothue: masothue.val().trim(),

                            btnmakh2: btnmakh2.val().trim(),
                            makhachhang2: makhachhang2.val().trim(),
                            tenkhachhang2: tenkhachhang2.val().trim(),
                            diachi2: diachi2.val().trim(),
                            mangsang: mangsang.val().trim(),

                            mabophan: mabophan.val().trim(),
                            bophan: bophan.val().trim(),

                            cothuegtgt: cothuegtgt.val().trim(),

                            baogomthue: $baogomthue,
                            thuesuat1: thuesuat1.val().trim(),

                            btnnoidung1: btnnoidung1.val().trim(),
                            manoidung1: manoidung1.val().trim(),
                            noidung1: noidung1.val().trim(),

                            btnnoidung2: btnnoidung2.val().trim(),
                            manoidung2: manoidung2.val().trim(),
                            noidung2: noidung2.val().trim(),

                            tkno1: tkno1.val().trim(),
                            tkno2: tkno2.val().trim(),
                            sotien1: sotien1.val().trim(),
                            sotien2: sotien2.val().trim(),

                            hanthanhtoan: hanthanhtoan.val().trim(),
                            tongtien: tongtien.val().trim(),

                            tongcong: tongcong.val().trim(),

                            tygia: $("#tygia").val().trim(),
                            sotiennt1: $("#sotiennt1").val().trim(),
                            sotiennt2: $("#sotiennt2").val().trim(),
                            tongtiennt: $("#tongtiennt").val().trim(),
                            tongcongnt: $("#tongcongnt").val().trim(),

                            ghichu: ghichu.val().trim(),
                            cothuegtgt: $cothuegtgt,
                            chungtugoc: $chungtugoc,
                            chiphikhongloaitru: $chiphikhongloaitru,
                            loaitokhai: $loaitokhai,
                            loaisp: $("#chonloaisp").val(),
                            dathem: 1,
                        },
                        success: function (result) {
                            if ($LoaiPhieu == 2 && (tkno1.val().trim() == "2111" || tkno1.val().trim() == "2112" || tkno1.val().trim() == "2113" || tkno2.val().trim() == "2111" || tkno2.val().trim() == "2112" || tkno2.val().trim() == "2113" || tkno1.val().trim() == "242" )) {
                                if ((tkno1.val().trim() == "2111" || tkno1.val().trim() == "2112" || tkno1.val().trim() == "2113" || tkno2.val().trim() == "2111" || tkno2.val().trim() == "2112" || tkno2.val().trim() == "2113")) {
                                    if (window.confirm("Số liệu phát sinh này liên quan đến tài sản cố định . \n Muốn hiển thị cửa sổ nhập tài sản ?")) {
                                        xoadialog_phieuthuchi();
                                        $('.dialog_main_tangtaisan').load('form/frm_tangtaisan.php?sottphieukhac=' + sophieu.val().trim() + '&form=frm_phieuthuchi&nguyengia=' + sotien1.val().trim() + '&tk=' + tkno1.val().trim() + '&ngayghiso=' + ngayghiso.val().trim());

                                    } else {
                                        if ($('.dialog_main_thongbao').html() == "") { // copy
                                            $('.dialog_main_thongbao').load('form/frm_thongbao_thuchi.php?loaiphieu=' + $LoaiPhieu + '&ngayhd=' + ngayhoadon.val().trim() + '&sophieu=' + sophieu.val().trim() + '&mapskt=' + STT.val().trim());
                                        }
                                    }
                                } else if ((tkno1.val().trim() == "242")) {// Nếu có phát sinh công cụ , dụng cụ
                                    if (window.confirm("Số liệu phát sinh này liên quan đến công cụ dụng cụ . \n Muốn hiển thị cửa sổ nhập công cụ dụng cụ ?")) {
                                        xoadialog_phieuthuchi();
                                        $('.dialog_main_tangtaisan').load('form/frm_tang_chiphi_tratruoc.php?sottphieukhac=' + sophieu.val().trim() + '&form=frm_phieuthuchi&nguyengia=' + sotien1.val().trim() + '&tk=' + tkno1.val().trim() + '&ngayghiso=' + ngayghiso.val().trim());

                                    } else {
                                        if ($('.dialog_main_thongbao').html() == "") { // copy
                                            $('.dialog_main_thongbao').load('form/frm_thongbao_thuchi.php?loaiphieu=' + $LoaiPhieu + '&ngayhd=' + ngayhoadon.val().trim() + '&sophieu=' + sophieu.val().trim() + '&mapskt=' + STT.val().trim());
                                        }
                                    }
                                } else {
                                    if ($('.dialog_main_thongbao').html() == "") { // copy
                                        $('.dialog_main_thongbao').load('form/frm_thongbao_thuchi.php?loaiphieu=' + $LoaiPhieu + '&ngayhd=' + ngayhoadon.val().trim() + '&sophieu=' + sophieu.val().trim() + '&mapskt=' + STT.val().trim());
                                    }
                                }
                            } else {
                                if ($('.dialog_main_thongbao').html() == "") { // copy
                                    $('.dialog_main_thongbao').load('form/frm_thongbao_thuchi.php?loaiphieu=' + $LoaiPhieu + '&ngayhd=' + ngayhoadon.val().trim() + '&sophieu=' + sophieu.val().trim() + '&mapskt=' + STT.val().trim());
                                }
                            }
                        }
                    });
                }
            }
            $.ajax({
                url: $dir_module_ps_kt + "dunotaikhoan.php", // Bao gồm cả add và edit
                type: "get", // chọn phương thức gửi là get
                dateType: "text", // dữ liệu trả về dạng text
                data: { // Danh sách các thuộc tính sẽ gửi đi
                    matk: tkco.val().trim()
                },
                success: function (result) {
                    $("#tongsodutk").html(result);
                }
            });

            return valid;
        }

        function xoadialog_phieuthuchi() {// đóng form
            reset_dialog(".dialog-phieuthuchi");
            reset_dialog(".dialog_main_pskt");
        }

        dialog = $("#dialog-phieuthuchi").dialog({
            autoOpen: false,
            height: "auto",
            width: $width,
            modal: true,
            buttons: {
                "Đồng ý": ChucNang_ThuChi,
                "Kết thúc": function () {
                    $sott = $("#STT").val();
                    if ($sott != "") {
                        $.ajax({// Xóa các chi tiết không tồn tại
                            url: $dir_module_ps_kt + "delpsctkt.php",
                            async: false,
                            success: function (response) {
                                //$data = response;
                            }
                        });
                    }
                    $('.dialog_main_thongbao').load('form/frm_thongbao_huy_thuchi.php');

                }
            }
        });

        $(function () {
            $("#NgayTao").datepicker();
        });
        dialog.dialog("open");

    })
    ;
</script>