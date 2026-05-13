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
<div id="dialog-phieukhac" title="PHIẾU ĐỊNH KHOẢN...(F8: XOÁ PHIẾU)">
    <p class="validateTips">&nbsp;</p>
    <form method="post" id="Form-chinh" enctype="multipart/form-data">
        <fieldset style="background-color: #afd9ee">
            <table class="table-dialog" style="vertical-align: middle;width: 780PX" border="0">
                <tr>
                    <td width="22" style="padding: 2px;text-align:center"><input type="radio" name="loaiphieu"
                                                                                 id="phieuthu"
                                                                                 value="phieuthu"/></td>
                    <td width="72">
                        <label for="name2">Ghi nợ</label>
                    </td>
                    <td width="22" style="padding: 2px;;text-align:center"><input name="loaiphieu" type="radio"
                                                                                  id="phieuchi" value="phieuchi"
                                                                                  checked="checked"/></td>
                    <td width="220">
                        <label for="name3">Ghi có</label>
                    </td>
                    <td width="59" style="padding: 2px"><input type="button" name="btntkco" id="btntkco" class="button"
                                                               value="TK có..."/></td>
                    <td width="309"><span style="padding: 2px">
                      <input type="text" name="tkco" value="911" id="tkco" list="listmataikhoan" required="required"
                             style="width: 15%"
                             placeholder="Mã TK" class="text ui-widget-content ui-corner-all"/>
                             <datalist id="listmataikhoan"></datalist>
                      <input name="tentkco" type="text" disabled="disabled" required="required"
                             class="text ui-widget-content ui-corner-all" id="tentkco"
                             placeholder="Tài khoản" style="width: 82%" value="Xác định kết quả kinh doanh"/>
                    </span></td>

                </tr>
            </table>
            <table border="0" class="table-dialog" style="vertical-align: middle;width: 780PX">
                <tr>
                    <td align="right" valign="middle" width="45px" style="padding: 2px;text-align:right">
                        <input type="button" name="btnstt" id="btnstt" class="button" value="Số TT..."/>
                    </td>
                    <td width="70px">
                        <input type="number" name="STT" id="STT" value="" min="1" style="width:80px"
                               placeholder="Số TT" class="text ui-widget-content ui-corner-all"/>
                        <input type="hidden" name="sophieu" id="sophieu" value="" style="width: 100%"
                               placeholder="Số TT" class="text ui-widget-content ui-corner-all"/>
                    </td>
                    <td width="60px" style="padding: 2px">
                        <label for="name"> Ngày ghi sổ</label>
                    </td>
                    <td width="100px">
                        <input type="date" style="width:110px" name="ngayghiso" value="<?php echo date("Y-m-d") ?>"
                               id="ngayghiso"
                               required="require"
                               placeholder="Ngày ghi sổ" class="text ui-widget-content ui-corner-all"/>
                    </td>
                    <td width="100px" style="padding: 2px"><input type="text"
                                                                  onkeyup="return KhuDauTiengViet(this.value,'#makhachhang3')"
                                                                  list="listmakhachhang1" disabled="disabled"
                                                                  name="makhachhang3" id="makhachhang3"
                                                                  required="required" style="width: 100%"
                                                                  placeholder="Mã KH"
                                                                  class="text ui-widget-content ui-corner-all"
                        />
                        <datalist id="listmakhachhang1"></datalist>
                    </td>
                    <td width="100px">&nbsp;</td>

                </tr>

                <tr>
                    <td align="right" valign="middle" width="45px" style="padding: 2px;text-align:right"></td>
                    <td width="70px">

                    </td>
                    <td width="60px" style="padding: 2px">

                    </td>
                    <td width="100px">

                    </td>
                    <td width="100px" style="padding: 2px" colspan='2'>
                        <input name="tenkhachhang3" disabled="disabled" type="text" required="required"
                               class="text ui-widget-content ui-corner-all" id="tenkhachhang3"
                               placeholder="Tên khách hàng"
                               style="width: 100%"/>
                    </td>

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
                        <input name="tenkhachhang" type="text" disabled="disabled" required
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
                        <input type="button" class="button" style="margin-right:3px;" name="btnxoa" id="btnxoa"
                               value="Xóa"/>&nbsp;
                        <input type="button" class="button" style="margin-right:3px;" name="btnvedau"
                               disabled="disabled" id="btnvedau"
                               value="Về đầu"/>
                        <input type="button" class="button" style="margin-right:3px;" disabled="disabled"
                               name="btnvetruoc" id="btnvetruoc"
                               value="Về trước"/>&nbsp;
                        <input type="button" class="button" style="margin-right:3px;" disabled="disabled"
                               name="btnketiep" id="btnketiep"
                               value="Kế tiếp"/>&nbsp;&nbsp;
                        <input type="button" class="button" style="margin-right:3px;" disabled="disabled"
                               name="btnvecuoi" id="btnvecuoi"
                               value="Về cuối"/>&nbsp;
                        <input type="button" class="button" name="btntim" id="btntim" value="Tìm"/></td>
                </tr>
                <tr>
                    <td width="220" style="padding: 2px">
                        <table width="100%" border="0">
                            <tr>
                                <td width="29%"><label for="name4">Loại CT</label></td>
                                <td width="71%"><select name="loaict" size="1" style="width: 100%" id="loaict"
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
                                           value="01GTKT2-001"
                                           id="mauso" required="require"
                                           placeholder="Mẫu số" class="text ui-widget-content ui-corner-all"/>
                                </td>
                            </tr>
                            <tr>
                                <td><label for="name5"> Ký hiệu</label></td>
                                <td><input style="text-transform: uppercase" type="text" name="kyhieu" onkeyup="return KhuDauTiengViet(this.value,'#kyhieu')" value=""
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
                                                            title="CHI PHÍ KHÔNG ĐƯỢC TRỪ">&nbsp;CP KHÔNG ĐT<abbr></b>
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
            <table class="table-dialog" style="vertical-align: middle;width: 780PX" border="0">


                <tr>
                    <td style="padding: 2px">
                        <table width="100%" border="0">
                            <tr>
                                <td width="5%">&nbsp;</td>
                                <td width="15%"><label for="name12">Nội dung</label></td>
                                <td width="19%"><label id="lbltranghientai" for="name15"></label></td>
                                <td width="5%"><input name="loaitokhai" type="radio" id="khaichinhthuc" value="ct"
                                                      checked="checked"/></td>
                                <td width="25%"><label for="name12">Khai lần 1</label></td>
                                <td width="5%"><input type="radio" name="loaitokhai" value="bp" id="khaibosung"/></td>
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
                        <datalist id="listmanoidung1"></datalist>
                        <input type="hidden" name="manoidung1copy" value="" id="manoidung1copy" required="required"
                               style="width: 15%"
                               placeholder="Mã ND" class="text ui-widget-content ui-corner-all"/>
                        <input type="text" name="noidung1" id="noidung1" required="required" style="width: 78%"
                               placeholder="Nội dung" class="text ui-widget-content ui-corner-all"/><input type="button"
                                                                                                           title="Nhập chi tiết công trình"
                                                                                                           name="CTCT"
                                                                                                           id="CTCT"
                                                                                                           class="button"
                                                                                                           value="CT"
                                                                                                           disabled="disabled"/>
                    </td>
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
                               tabindex="0"/></td>
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
    $dir_module_ps_kt_khac = "modules/psktkhac/";//----------------Lưới
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

            ngayghiso = $("#ngayghiso"),
            loaict = $("#loaict"),
            mauso = $("#mauso"),
            kyhieu = $("#kyhieu"),
            sohoadon = $("#sohoadon"),
            ngayhoadon = $("#ngayhoadon"),
            lbltranghientai = $("#lbltranghientai"),

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

            btnnoidung1 = $("#btnnoidung1"),
            manoidung1 = $("#manoidung1"),
            noidung1 = $("#noidung1"),
            thuesuat1 = $("#thuesuat1"),

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
                //$('.dialog_main_thongbao').load('form/frm_thongbao_huyphieukhac.php');
            }else if (event.keyCode == Keys.F8) { // copy
                $("#btnxoa").trigger( "click" );
            }else if (event.keyCode == Keys.F4) { // copy
                ChucNang_ThuChi();
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
                $(STT).focus();
            }
        })
        $(phieuthu).keydown(function (event) {// Gọi table mã nội dung để chọn
            if (event.keyCode == Keys.ENTER) { // copy
                $(STT).focus();
            }
        })
        $(tkco).keydown(function (event) {// Gọi table mã nội dung để chọn
            if (event.keyCode == Keys.ENTER) { // copy
                $(STT).focus();
            }
        })
        $(ngayghiso).keydown(function (event) {// Gọi table mã nội dung để chọn
            if (event.keyCode == Keys.ENTER) { // copy
                $("#makhachhang3").focus();
            }
        })

        $("#makhachhang3").keydown(function (event) {// Gọi table mã nội dung để chọn
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
        $(ngayhoadon).focus(function () {
            if (ngayhoadon.val() == "") {
                ngayhoadon.val(ngayghiso.val());
            }
        });

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
            var $LoaiPhieu = 3;
            if (phieuthu.is(":checked")) {
                $LoaiPhieu = 3;
            }
            if (phieuchi.is(":checked")) {
                $LoaiPhieu = 4;
            }
            $loaisp = $("#chonloaisp").val().trim();
            if ($loaisp == "" || $LoaiPhieu != 4) {
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
        $(manoidung1).keydown(function (event) {// Gọi table mã nội dung để chọn
            if (event.keyCode == Keys.ENTER) { // copy
                $(noidung1).focus();
            }
        })
        $(noidung1).keydown(function (event) {// Gọi table mã nội dung để chọn
            if (event.keyCode == Keys.ENTER) { // copy
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

        function checkSoHoaDonTrung() {// Check key khi nhấn submit
            $data = "K";
            var $LoaiPhieu = 3;
            if (phieuthu.is(":checked")) {
                $LoaiPhieu = 3;
            }
            if (phieuchi.is(":checked")) {
                $LoaiPhieu = 4;
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


///-------------------Kết thúc--------------------------------
        //---------------Số thứ tụ-----------------------
        btnstt.click(function (event) {// Gọi table khách hàng để chọn
            var $LoaiPhieu = 0;
            if (phieuthu.is(":checked")) {
                $LoaiPhieu = 3;
            }
            if (phieuchi.is(":checked")) {
                $LoaiPhieu = 4;
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
                $('.dialog_main_httk').load("form/frm_dm_httk_form_select.php?idstyle=Form-chinh&idinput=tkco***tentkco&idfocus=STT&ma=" + $tkco);
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
            $makh2 = makhachhang2.val().trim();
            if ($('.dialog_main_makh').html() == "") { // copy
                goitablemakhachhang2($makh2);
            }
        });
        /*$(makhachhang).blur(function (event) {// Gọi table mã nội dung để chọn
         $makh = makhachhang.val().trim();
         goitablemakhachhang($makh);

         });*/
        $("#makhachhang3").focusout(function (event) {// Gọi table mã nội dung để chọn
            $makh3 = $("#makhachhang3").val().trim();
            if ($('.dialog_main_makh').html() == "") { // copy
                goitablemakhachhang3($makh3);
            }
        });
        function goitablemakhachhang($vale) {
            if ($vale == "") {// nếu tk nợ trống thì bật tra bảng
                $('.dialog_main_makh').load("form/frm_dm_makh_form_select.php?idstyle=Form-chinh&idinput=makhachhang***tenkhachhang***diachi***masothue***makhachhang2***tenkhachhang2***diachi2&idfocus=loaict");
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

        function goitablemakhachhang3($vale) {
            if ($vale == "") {// nếu tk nợ trống thì bật tra bảng
                $('.dialog_main_makh').load("form/frm_dm_makh_form_select.php?idstyle=Form-chinh&idinput=makhachhang3***tenkhachhang3***diachi3&idfocus=makhachhang");
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

                    $("#makhachhang3").val($data.makh);
                    $("#tenkhachhang3").val($data.tenkh);
                    //diachi2.val($data.diachi);

                    $("#makhachhang").focus();

                } else {
                    $('.dialog_main_makh').load("form/frm_dm_makh_form_select.php?idstyle=Form-chinh&idinput=makhachhang3***tenkhachhang3***diachi3&idfocus=makhachhang&ma=" + $("#makhachhang3").val());
                }
            }
        }

        //---------------------End mand--------------
        //////////Begin ma kh////////////////////////////
        $(btnnoidung1).click(function (event) {// Gọi table khách hàng để chọn
            var $LoaiPhieu = 0;
            if (phieuthu.is(":checked")) {
                $LoaiPhieu = 3;
            }
            if (phieuchi.is(":checked")) {
                $LoaiPhieu = 4;
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
                $LoaiPhieu = 3;
            }
            if (phieuchi.is(":checked")) {
                $LoaiPhieu = 4;
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

        function kiemtrakhoadulieu($ngayghiso, $loaiphieu, $sophieu) {
            var $ketqua;
            $.ajax({// Load danh sách mã khách hàng
                url: "modules/tuychon/checkkhoadulieu.php",
                async: false,
                data: {ngayghiso: $ngayghiso, loaiphieu: $loaiphieu, sophieu: $sophieu},
                success: function (response) {
                    $ketqua = response.trim();
                }
            });
            return $ketqua;
        }

        function goitablemanoidung1($vale) {
            var $LoaiPhieu = 0;
            if (phieuthu.is(":checked")) {
                $LoaiPhieu = 3;
            }
            if (phieuchi.is(":checked")) {
                $LoaiPhieu = 4;
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
                    if ($LoaiPhieu == 3)
                        tkno1.val($data.tkco);
                    if ($LoaiPhieu == 4)
                        tkno1.val($data.tkno);
                    thuesuat1.val($data.rate_tax);

                    //sotien1.focus();

                } else {
                    var $LoaiPhieu = 0;
                    if (phieuthu.is(":checked")) {
                        $LoaiPhieu = 3;
                    }
                    if (phieuchi.is(":checked")) {
                        $LoaiPhieu = 4;
                    }
                    $('.dialog_main_manoidung').load("form/frm_dm_manoidung_form_select.php?idstyle=Form-chinh&idinput=manoidung1***noidung1***tkno1***ghichu***datamau***thuesuat1&idfocus=sotien1&loaiphieu=" + $LoaiPhieu + "&ma=" + $("#manoidung1").val());
                }
            }
        }

        function goitablemanoidung2($vale) {
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
                    tkno2.val($data.tkno);

                    //sotien2.focus();

                } else {
                    var $LoaiPhieu = 0;
                    if (phieuthu.is(":checked")) {
                        $LoaiPhieu = 3;
                    }
                    if (phieuchi.is(":checked")) {
                        $LoaiPhieu = 4;
                    }
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
            $sotiennt1 = 0;
            $sotiennt2 = 0;
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


        //--------Thêm mới-----------------------------------------------------
        $(btnthem).click(function (event) {// Gọi table khách hàng để chọn
            var valid = true;
            valid = valid && checkNull(STT, " Số TT  ");
            valid = valid && checkNull(makhachhang, " Mã khách hàng ");
            valid = valid && checkNull(ngayghiso, " Ngày ghi sổ ");
            $loaict=1;
            $loaict = $("#loaict").val();
            if($loaict==1){
                valid = valid && checkNull(kyhieu, " Ký hiệu hoá đơn  ");
                valid = valid && checkNull(sohoadon, " Số hoá đơn  ");
            }
            valid = valid && checkNull(ngayhoadon, " Ngày hoá đơn  ");
            valid = valid && checkNull(manoidung1, " Mã nội dung ");
            valid = valid && checkNull(mabophan, " Mã bộ phận ");
            valid = valid && checkNull(tkco, " Mã tài khoản ");
            valid = valid && checkNull(tkno1, " Mã tài khoản ");
            valid = valid && checkNull(sotien1, " Số tiền ");


            var $LoaiPhieu = 0;
            if (phieuthu.is(":checked")) {
                $LoaiPhieu = 3;
                $check_luu = (kiemtrakhoadulieu(ngayghiso.val().trim(), 5, STT.val().trim()));
            }
            if (phieuchi.is(":checked")) {
                $LoaiPhieu = 4;
                $check_luu = (kiemtrakhoadulieu(ngayghiso.val().trim(), 6, STT.val().trim()));
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

            if (checkSoHoaDonTrung().trim() != "K") {
                $thongbao = checkSoHoaDonTrung();
                var result = confirm($thongbao);
                if (result) {
                    valid = true;
                } else {
                    valid = false;
                    $("#sohoadon").focus();
                }
            }

            //// Thông báo nếu là tờ khai bổ sung

            if ($loaitokhai == 0) {
                var result = confirm("Bạn đang chọn tờ khai bổ sung ! Bạn có muốn tiếp tục nhập ?");
                if (result == false) {
                    $("#sohoadon").focus();
                    return false;
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

                        makhachhang3: $("#makhachhang3").val().trim(),
                        tenkhachhang3: $("#tenkhachhang3").val().trim(),

                        btnmakh2: btnmakh2.val().trim(),
                        makhachhang2: makhachhang2.val().trim(),
                        tenkhachhang2: tenkhachhang2.val().trim(),
                        diachi2: diachi2.val().trim(),
                        mangsang: mangsang.val().trim(),

                        mabophan: mabophan.val().trim(),
                        bophan: bophan.val().trim(),

                        cothuegtgt: cothuegtgt.val().trim(),

                        baogomthue: $baogomthue,

                        btnnoidung1: btnnoidung1.val().trim(),
                        manoidung1: manoidung1.val().trim(),
                        noidung1: noidung1.val().trim(),
                        thuesuat1: thuesuat1.val().trim(),

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
                        $tongcongtien = tongcong.val().trim();
                        $sottpsct = getSoTTPSKTMAX();
                        sotien1.val("");
                        sotien2.val("");
                        tongtien.val("");
                        $("#sotiennt1").val("");
                        $("#sotiennt2").val("");
                        $("#tongtiennt").val("");

                        sottpsct.val($sottpsct);
                        $("#tongcong_cu").val($tongcongtien);
                        $("#sohoadon").val("");

                    }
                });
                $('#btnketiep').attr('page', 2);
                btnketiep.attr("disabled", false);
                $("#kyhieu").focus();
            }
        });

        $(sohoadon).focus(function (event) {// Gọi table mã nội dung để chọn
            $data = "";
            if (phieuthu.is(":checked")) {
                $LoaiPhieu = 3;
            }
            if (phieuchi.is(":checked")) {
                $LoaiPhieu = 4;
            }

            $KyHieu = $("#kyhieu").val();
            $sohoadon = sohoadon.val();
            $loaict = $("#loaict").val();
            //alert($sohoadon);
            if ($sohoadon == "" && $LoaiPhieu==3 && $loaict==1) {
                $.ajax({
                    url: $dir_module_ps_kt + "laysohoadonmax.php",
                    data: {'loaiphieu': $LoaiPhieu, 'kyhieu': $KyHieu},
                    async: false,
                    success: function (response) {
                        $data = (response);
                    }
                });
                $sohoadon = sohoadon.val($data);
            }
        })
        btnxoa.click(function (event) {// Gọi table khách hàng để chọn
            if (phieuthu.is(":checked")) {
                $LoaiPhieu = 3;
                $check_luu = (kiemtrakhoadulieu(ngayghiso.val().trim(), 5, STT.val().trim()));
            }
            if (phieuchi.is(":checked")) {
                $LoaiPhieu = 4;
                $check_luu = (kiemtrakhoadulieu(ngayghiso.val().trim(), 6, STT.val().trim()));
            }
            if ($check_luu != "") {
                alert($check_luu);
                return false;
            }
            var $soluong = 1;
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
                    $soluong = parseInt(response.trim());
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
                mauso.val("01GTKT2-001");
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
            ngayhoadon.val(ngayghiso.val());
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
            if (phieuthu.is(":checked")) {
                $LoaiPhieu = 3;
            }
            if (phieuchi.is(":checked")) {
                $LoaiPhieu = 4;
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
                $sottpsct = getSoTTPSKTMAX();
                $("#sottpsct").val($sottpsct);
                sophieu.val($sophieu);
                $ngayghiso = layngayghiso($LoaiPhieu);

                $("#ngayghiso").val($ngayghiso.trim());

                $("#ngayhoadon").val("");

                $("#ThamChieuTS").text("Tham chiếu TS: " + $sophieu);
                $("#chungtugoc").attr("checked", false);
                $("#chiphikhongloaitru").attr("checked", false);
                STT.val(parseInt($data));

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
                                        $ngayghiso = layngayghiso($LoaiPhieu);
                                        $("#ngayghiso").val($ngayghiso.trim());
                                        $("#ngayhoadon").val("");
                                        $sottpsct = getSoTTPSKTMAX();
                                        $("#sottpsct").val($sottpsct);
                                        sophieu.val($sophieu);
                                        $("#ThamChieuTS").text("Tham chiếu TS: " + $sophieu);
                                        $("#chungtugoc").attr("checked", false);
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

                        $("#tkco").val($data.tkco);
                        $("#tentkco").val($data.tentkco);

                        tongcong.val(FormatNumber($data.tongcong.toString()));

                        tongcong_cu.val(FormatNumber($data.tongcong.toString()));

                        makhachhang.val($data.makh);
                        tenkhachhang.val($data.tenkh);

                        $("#makhachhang3").val($data.makh_nh);
                        $("#tenkhachhang3").val($data.tenkh_nh);

                        $("#tongcongnt").val(FormatNumber($data.tongcongnt.toString()));

                        diachi.val($data.diachi);
                        masothue.val($data.masothue);

                        sophieu.val($data.sophieu);
                        $("#ThamChieuTS").text("Tham chiếu TS: " + $data.sophieu);

                        ///////End PSKT----------
                        phantrang(1, $data.sophieu);


                        ghichu.val($data.chuthich);
                        ngayghiso.focus();
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

            lbltranghientai.text($data.tranghientai + "/" + $data.mapskt);

            $("#chonloaisp").val($data.loaisp);
            $("#chonloaisp").val($data.loaisp);
            if ($data.loaisp == "" || $data.loaiphieu != 4) {
                $("#CTCT").attr("disabled", true);
            } else {
                $("#CTCT").attr("disabled", false);
            }

            thuesuat1.val($data.thuesuat1);

            mabophan.val($data.mabp);
            bophan.val($data.bophan);
            hanthanhtoan.val($data.ngaythanhtoan);

            manoidung1.val($data.mand1);
            $("#manoidung1copy").val($data.mand1);
            noidung1.val($data.noidung1);

            manoidung2.val($data.mand2);
            noidung2.val($data.noidung2);

            tkno1.val($data.tkno1);
            tkno2.val($data.tkno2);

            sotien1.val(FormatNumber($data.gtvnd1));
            sotien2.val(FormatNumber($data.gtvnd2));

            tongtien.val(FormatNumber($data.tongtien));

            tongtien_cu.val(FormatNumber($data.tongtien));

            $("#tygia").val(FormatNumber($data.tygia));
            $("#sotiennt1").val(FormatNumber($data.sotiennt));
            $("#sotiennt2").val(FormatNumber($data.sotiennt1));
            $("#tongtiennt").val(FormatNumber($data.tongtiennt));


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

        function readonlySubmitSTT() {
            phieuthu.attr("disabled", true);
            phieuchi.attr("disabled", true);
            btntkco.attr("disabled", true);
            //tkco.attr("disabled", true);
            btnstt.attr("disabled", true);


        }

        function readonlyNonSubmitSTT() {
            phieuthu.attr("disabled", false);
            phieuchi.attr("disabled", false);
            btntkco.attr("disabled", false);
            STT.attr("disabled", false);
            // tkco.attr("disabled", false);
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
            $("#masothue").attr("disabled", false);

            $("#btnmakh2").attr("disabled", false);
            $("#makhachhang3").attr("disabled", false);
            $("#makhachhang2").attr("disabled", false);
            $("#tenkhachhang3").attr("disabled", false);
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

            valid = valid && checkNull(STT, " Số TT  ");
            valid = valid && checkNull(makhachhang, " Mã khách hàng ");
            valid = valid && checkNull(ngayghiso, " Ngày ghi sổ ");
            $loaict=1;
            $loaict = $("#loaict").val();
            if($loaict==1){
                valid = valid && checkNull(kyhieu, " Ký hiệu hoá đơn  ");
                valid = valid && checkNull(sohoadon, " Số hoá đơn  ");
            }
            valid = valid && checkNull(ngayhoadon, " Ngày hoá đơn  ");

            valid = valid && checkNull(manoidung1, " Mã nội dung ");

            valid = valid && checkNull(tkco, " Mã tài khoản ");
            valid = valid && checkNull(tkno1, " Mã tài khoản ");

            valid = valid && checkNull(sotien1, " Số tiền ");
            $NgayGhiSo = new Date($("#ngayghiso").val());
            $NamGhiSo = $NgayGhiSo.getFullYear();
            if (<?php echo $_SESSION['NienDo']; ?>!=$NamGhiSo)
            {
                alert("Ngày ghi sổ không nằm trong năm tài chính <?php echo $_SESSION['NienDo']; ?> ! Vui lòng nhập lại .");
                return false;
            }

            var $LoaiPhieu = 0;
            if (phieuthu.is(":checked")) {
                $LoaiPhieu = 3;
                $check_luu = (kiemtrakhoadulieu(ngayghiso.val().trim(), 5, STT.val().trim()));
            }
            if (phieuchi.is(":checked")) {
                $LoaiPhieu = 4;
                $check_luu = (kiemtrakhoadulieu(ngayghiso.val().trim(), 6, STT.val().trim()));
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
                $cothuegtgt = 1;
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
                var result = confirm("Bạn đang chọn tờ khai bổ sung ! Bạn có muốn tiếp tục nhập ?");
                if (result == false) {
                    $("#sohoadon").focus();
                    return false;
                }
            }

            if (checkSoHoaDonTrung().trim() != "K") {
                $thongbao = checkSoHoaDonTrung();
                var result = confirm($thongbao);
                if (result) {
                    valid = true;
                } else {
                    valid = false;
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
                        mauso: mauso.val().trim(),
                        kyhieu: kyhieu.val().trim(),
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

                        makhachhang3: $("#makhachhang3").val().trim(),
                        tenkhachhang3: $("#tenkhachhang3").val().trim(),

                        diachi2: diachi2.val().trim(),
                        mangsang: mangsang.val().trim(),

                        mabophan: mabophan.val().trim(),
                        bophan: bophan.val().trim(),

                        cothuegtgt: cothuegtgt.val().trim(),

                        baogomthue: $baogomthue,

                        btnnoidung1: btnnoidung1.val().trim(),
                        manoidung1: manoidung1.val().trim(),
                        noidung1: noidung1.val().trim(),
                        thuesuat1: thuesuat1.val().trim(),

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
                        if ($LoaiPhieu == 4 && (tkno1.val().trim() == "2111" || tkno1.val().trim() == "2112" || tkno1.val().trim() == "2113" || tkno2.val().trim() == "2111" || tkno2.val().trim() == "2112" || tkno2.val().trim() == "2113" || tkno1.val().trim() == "242" )) {
                            if ((tkno1.val().trim() == "2111" || tkno1.val().trim() == "2112" || tkno1.val().trim() == "2113" || tkno2.val().trim() == "2111" || tkno2.val().trim() == "2112" || tkno2.val().trim() == "2113")) {
                                if (window.confirm("Số liệu phát sinh này liên quan đến tài sản cố định . \n Muốn hiển thị cửa sổ nhập tài sản ?")) {
                                    xoadialog_phieukhac();
                                    $('.dialog_main_tangtaisan').load('form/frm_tangtaisan.php?sottphieukhac=' + sophieu.val().trim() + '&form=frm_phieukhac&nguyengia=' + sotien1.val().trim() + '&tk=' + tkno1.val().trim() + '&ngayghiso=' + ngayghiso.val().trim());

                                } else {
                                    if ($('.dialog_main_thongbao').html() == "") {
                                        $('.dialog_main_thongbao').load('form/frm_thongbao_phieukhac.php?loaiphieu=' + $LoaiPhieu + '&ngayhd=' + ngayhoadon.val().trim() + '&sophieu=' + sophieu.val().trim() + '&mapskt=' + STT.val().trim());
                                    }
                                }
                            } else if ((tkno1.val().trim() == "242")) {
                                if (window.confirm("Số liệu phát sinh này liên quan đến công cụ dụng cụ . \n Muốn hiển thị cửa sổ nhập công cụ dụng cụ ?")) {
                                    xoadialog_phieukhac();
                                    $('.dialog_main_tangtaisan').load('form/frm_tang_chiphi_tratruoc.php?sottphieukhac=' + sophieu.val().trim() + '&form=frm_phieukhac&nguyengia=' + sotien1.val().trim() + '&tk=' + tkno1.val().trim() + '&ngayghiso=' + ngayghiso.val().trim());

                                } else {
                                    if ($('.dialog_main_thongbao').html() == "") { // copy
                                        $('.dialog_main_thongbao').load('form/frm_thongbao_phieukhac.php?loaiphieu=' + $LoaiPhieu + '&ngayhd=' + ngayhoadon.val().trim() + '&sophieu=' + sophieu.val().trim() + '&mapskt=' + STT.val().trim());
                                    }
                                }
                            } else {
                                if ($('.dialog_main_thongbao').html() == "") {
                                    $('.dialog_main_thongbao').load('form/frm_thongbao_phieukhac.php?loaiphieu=' + $LoaiPhieu + '&ngayhd=' + ngayhoadon.val().trim() + '&sophieu=' + sophieu.val().trim() + '&mapskt=' + STT.val().trim());
                                }
                            }
                        } else {
                            if ($('.dialog_main_thongbao').html() == "") {
                                $('.dialog_main_thongbao').load('form/frm_thongbao_phieukhac.php?loaiphieu=' + $LoaiPhieu + '&ngayhd=' + ngayhoadon.val().trim() + '&sophieu=' + sophieu.val().trim() + '&mapskt=' + STT.val().trim());
                            }
                        }
                    }
                });
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

        function xoadialog_phieukhac() {// đóng form
            reset_dialog(".dialog-phieukhac");
            reset_dialog(".dialog_main_pskt");
        }

        dialog = $("#dialog-phieukhac").dialog({
            autoOpen: false,
            height: "auto",
            width: $width,
            modal: true,
            buttons: {
                "Đồng ý(F4)": ChucNang_ThuChi,
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
                    $('.dialog_main_thongbao').load('form/frm_thongbao_huyphieukhac.php');
                }
            }
        });

        dialog.dialog("open");

    })
    ;
</script>