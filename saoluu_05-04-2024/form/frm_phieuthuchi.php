<?php
session_start();
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

    #trvanbanthoathuan {
        display: none;
    }

</style>
<div id="dialog-phieuthuchi" title="TIỀN MẶT, TIỀN GỞI NGÂN HÀNG...(F8: XOÁ PHIẾU)">
    <p class="validateTips"></p>
    <form method="post" id="Form-chinh" enctype="multipart/form-data">
        <fieldset style="background-color: #afd9ee">
            <table class="table-dialog" style="vertical-align: middle;width: 780PX" border="0">
                <tr>
                    <td width="22" style="padding: 2px;text-align:center"><input type="radio" name="loaiphieu"
                                                                                 id="phieuthu"
                                                                                 value="phieuthu"/></td>
                    <td width="72">
                        <label id="lbphieuthu" for="name2">Phiếu thu</label>
                    </td>
                    <td width="22" style="padding: 2px;text-align:center"><input name="loaiphieu" type="radio"
                                                                                 id="phieuchi" value="phieuchi"
                                                                                 checked="checked"/></td>
                    <td width="220">
                        <label id="lbphieuchi" for="name3">Phiếu chi</label>
                    </td>
                    <td width="59" style="padding: 2px"><input type="button" name="btntkco" id="btntkco" class="button"
                                                               value="TK có..."/></td>
                    <td width="309"><span style="padding: 2px">
                      <input type="text" name="tkco" value="1111" id="tkco" list="listmataikhoan" required="required"
                             style="width: 16%"
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
                               placeholder="Số TT" class="text ui-widget-content ui-corner-all" autocomplete='off'/>
                        <input type="hidden" name="sophieu" id="sophieu" value="" style="width: 100%"
                               placeholder="Số TT" class="text ui-widget-content ui-corner-all"/>
                    </td>
                    <td width="12%" style="padding: 2px">
                        <label for="name"> Ngày ghi sổ</label>
                    </td>
                    <td width="29%">
                        <input style="width: 150px;" type="date" name="ngayghiso" value="<?php echo date("Y-m-d") ?>"
                               id="ngayghiso"
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
                               style="width: 22%"
                               placeholder="Mã KH" class="text ui-widget-content ui-corner-all"
                        />
                        <datalist id="listmakhachhang"></datalist>
                        <input name="tenkhachhang" type="text" required
                               class="text ui-widget-content ui-corner-all" id="tenkhachhang"
                               placeholder="Tên khách hàng"
                               style="width: 78%"/></td>
                </tr>
                <tr style="<?php echo (($_SESSION['thietlaphddt'] == '1') ? '' : 'display:none'); ?>">
                    <td width="11%" style="padding: 2px">
                        <label for="name"> <input type="checkbox" id="latencanhan"
                                                  style="margin-top: 2px;"> <abbr title="Tên cá nhân trên hóa đơn điện tử">Tên CN:</abbr></label>
                    </td>
                    <td colspan="3" style="padding: 2px">
                        <input name="tencanhan" type="text" required
                               class="text ui-widget-content ui-corner-all" id="tencanhan" disabled
                               placeholder="Tên cá nhân hiển thị trên hóa đơn điện tử" autocomplete="off"
                               style="width: 100%"/></td>
                </tr>
                <tr>
                    <td style="padding: 2px"><label for="name"> Địa chỉ :</label></td>
                    <td width="41%" style="padding: 2px"><input type="text" name="diachi" value="" id="diachi" required
                                                                placeholder="Địa chỉ"
                                                                class="text ui-widget-content ui-corner-all"/></td>
                    <td width="8%" colspan="-2" style="padding: 2px">
                        <label for="name"> MST</label></td>
                    <td width="40%" colspan="-2">
                        <table width="100%">
                            <tr>
                                <td width="70%"><input type="text" name="masothue" value="" id="masothue" required
                                           placeholder="Mã số thuế" class="text ui-widget-content ui-corner-all"/></td>
                                <td width="30%">&nbsp; <a id="kiemtramst" style="color: blue; font-weight: bold;cursor: pointer;">Kiểm tra MST</a></td>
                            </tr>
                        </table>
                    </td>

                </tr>
            </table>
        </fieldset>
        <fieldset style="background-color: #afd9ee">
            <legend>Chi tiết phát sinh</legend>
            <table class="table-dialog" style="vertical-align: middle;width: 780PX" border="0">
                <tr>
                    <td><input name="datamau" type="hidden" id="datamau" value=""/>
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
                        <input type="button" class="button" disabled="disabled" name="btntim" id="btntim" value="Tìm"/>&nbsp;&nbsp;
                        <input type="button" class="button"id="nhaptuxml" value="Nhập từ XML"/>
                    </td>
                </tr>
                <tr>
                    <td width="220" style="padding: 2px" valign="top">
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
                                        <option value="5">Chứng từ khác(Thuế GTGT)</option>
                                    </select></td>
                            </tr>
                            <tr>
                                <td><label for="name5"> Mẫu số</label></td>
                                <td><input style="text-transform: uppercase" type="text" name="mauso"
                                           value="<?php echo $_SESSION['txt_mauhoadon']; ?>"
                                           id="mauso" required="require" list="masohoadon" autocomplete="off"
                                           placeholder="Mẫu số" class="text ui-widget-content ui-corner-all"/>

                                    <datalist id="masohoadon">
                                        <option value="01GTKT0/001">
                                        <option value="01GTKT0/002">
                                        <option value="01GTKT0/003">
                                        <option value="01GTKT0/004">

                                        <option value="01GTKT1/001">
                                        <option value="01GTKT1/002">
                                        <option value="01GTKT1/003">
                                        <option value="01GTKT1/004">
                                        <option value="01GTKT2/001">
                                        <option value="01GTKT2/002">
                                        <option value="01GTKT2/003">
                                        <option value="01GTKT3/004">
                                        <option value="01GTKT3/001">
                                        <option value="01GTKT3/002">
                                        <option value="01GTKT3/003">
                                        <option value="01GTKT3/004">

                                        <option value="02GTTT1/001">
                                        <option value="02GTTT1/002">
                                        <option value="02GTTT1/003">
                                        <option value="02GTTT1/004">
                                        <option value="02GTTT2/001">
                                        <option value="02GTTT2/002">
                                        <option value="02GTTT2/003">
                                        <option value="02GTTT3/004">
                                        <option value="02GTTT3/001">
                                        <option value="02GTTT3/002">
                                        <option value="02GTTT3/003">
                                        <option value="02GTTT3/004">
                                    </datalist>

                                </td>
                            </tr>
                            <tr>
                                <td><label for="name5"> Ký hiệu</label></td>
                                <td><input style="text-transform: uppercase" type="text" name="kyhieu" value="<?php echo $_SESSION['txt_kyhieu'] ?>"
                                           id="kyhieu" required="require"
                                           placeholder="Ký hiệu" onkeyup="return KhuDauTiengViet(this.value,'#kyhieu')"
                                           class="text ui-widget-content ui-corner-all"/>
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
                            <tr>
                                <td><label for="name"><input type="checkbox" id="congaykhaithue"
                                                             style="margin-top: 2px;"> <abbr title="NGÀY KHAI THUẾ">Ngày
                                            KT</abbr></label></td>
                                <td><input type="date" name="ngaykhaithue" value="" id="ngaykhaithue" required="require"
                                           style="width: 100%"
                                           placeholder="Ngày khai thuế" class="text ui-widget-content ui-corner-all"/>
                                </td>
                            </tr>
                            <tr style="<?php echo (($_SESSION['chungtuthamchieu'] == '1') ? '' : 'display:none'); ?>">
                                <td><label for="name"><abbr title="SỐ CHỨNG TỪ THAM CHIẾU">SỐ CT</abbr></label></td>
                                <td><input type="text" name="chungtuthamchieu" value="" autocomplete="off" id="chungtuthamchieu" required="require"
                                           style="width: 100%"
                                           placeholder="Chứng từ tham chiếu" class="text ui-widget-content ui-corner-all"/>
                                </td>
                            </tr>
                            <tr style="<?php echo (($_SESSION['phanloaihanghoadauvao'] == '1') ? '' : 'display:none'); ?>">
                                <td><label for="name"></td>
                                <td><select style="width:100%;" id="loaihanghoadichvu" class="text ui-widget-content ui-corner-all">
                                        <option value="1">1. Hàng hóa dịch vụ dùng riêng cho SXKD chịu thuế GTGT và sử dụng cho các hoạt động cung cấp hàng hóa, dịch vụ không kê khai, nộp thuế GTGT đủ điều kiện khấu trừ thuế</option>
                                        <option value="2">2. Hàng hóa, dịch vụ không đủ điều kiện khấu trừ</option>
                                        <option value="3">3. Hàng hóa, dịch vụ dùng chung cho SXKD chịu thuế và không chịu thuế đủ điều kiện khấu trừ thuế</option>
                                    </select>
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
                                <td><label for="name8"> Mã số thuế:</label></td>
                                <td>
                                    <input type="text"
                                           name="masothue2" id="masothue2"
                                           required="required" style="width: 100%"
                                           placeholder="Mã số thuế" class="text ui-widget-content ui-corner-all"
                                    /></td>
                                <td>
                                    <table width="100%" border="0">
                                        <tr>
                                            <td width="15%" style="text-align:center;padding: 5px;" valign="middle">
                                                <input
                                                        name="lacongtrinh" type="checkbox" class="checkbox"
                                                        id="lacongtrinh" value="1"/></td>
                                            <td width="85%"><label for="name10"><abbr title="ĐƠN VỊ KHÔNG CÓ MÃ SỐ THUẾ THÌ CHỌN LÀ TÊN ĐƠN VỊ">Tên đơn vị không MST</abbr></label></td>
                                        </tr>
                                    </table>
                            </tr>
                            <tr>
                                <td><label for="name9"> Địa chỉ :</label></td>
                                <td><input type="text" name="diachi2" value="" id="diachi2" required="required"
                                           placeholder="Địa chỉ"
                                           class="text ui-widget-content ui-corner-all"/></td>
                                <td>
                                    <table width="100%" border="0">
                                        <tr>
                                            <td width="15%" style="text-align:center;padding: 5px;" valign="middle">
                                                <input
                                                        name="mangsang" type="checkbox" class="checkbox"
                                                        id="mangsang" value="1"/></td>
                                            <td width="85%"><label for="name10">Mang sang</label></td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td><label for="name"><input type="checkbox" id="latknganhang" style="margin-top: 2px;">STK ngân hàng:</label></td>
                                <td colspan="2">
                                    <input type="text"
                                           name="matknganhang" id="matknganhang"
                                           required="required" style="width: 25%" disabled
                                           placeholder="Số TK NH" class="text ui-widget-content ui-corner-all"
                                    />
                                    <input name="tentknganhang" type="text" required="required"
                                           class="text ui-widget-content ui-corner-all" id="tentknganhang"
                                           placeholder="Tên TK ngân hàng" disabled
                                           style="width: 69%"/></td>
                            </tr>
                            <tr>
                                <td><select class="text ui-widget-content ui-corner-all" id="chonloaisp"
                                            style="width: 100%;height:20px;">
                                        <option value="">Không có SP/CT</option>
                                        <option value="SP">Sản Phẩm</option>
                                        <option value="CT">Công Trình</option>
                                        <option value="HD">Hợp Đồng</option>
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
                                            <td width="4%"></td>
                                            <td style="<?php echo (($_SESSION['ngoaite'] == '1') ? '' : 'display:none'); ?>" colspan="2">
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
                                            <td colspan="2" align="right" style="<?php echo (($_SESSION['thietlaphddt'] == '1') ? '' : 'display:none'); ?>"><b style="font-size: 12px;">HĐĐT:&nbsp;</b>
                                            </td>
                                            <td align="right" width="21%" style="<?php echo (($_SESSION['thietlaphddt'] == '1') ? '' : 'display:none'); ?>">
                                                <?php
                                                if($_SESSION['nhacungcaphddt']=='viettel'){
                                                    ?>
                                                    <select id="hoadondientu" style="width: 100%;height:20px;">
                                                        <?php
                                                        if($_SESSION['chukysodaky']=='1'){
                                                            ?>
                                                            <option value="0">0.Không lập HĐĐT</option>
                                                            <option value="1">1.Lập hoá đơn gốc</option>
                                                            <option value="8">5.Lập hóa đơn nháp</option>
                                                            <option value="11">6.Xem đơn nháp</option>
                                                            <option value="9">7.Đã phát hành</option>
                                                        <?php }else{
                                                            ?>
                                                            <option value="0">0.Không lập HĐĐT</option>
                                                            <option value="8">5.Lập hóa đơn nháp</option>
                                                            <option value="11">6.Xem đơn nháp</option>
                                                            <option value="9">7.Đã phát hành</option>
                                                            <?php
                                                        }
                                                        ?>
                                                    </select>
                                                    <?php
                                                }else if($_SESSION['nhacungcaphddt']=='bkav'){
                                                    ?>
                                                    <select id="hoadondientu" style="width: 100%;height:20px;">
                                                        <?php
                                                        if($_SESSION['chukysodaky']=='1'){
                                                            ?>
                                                            <option value="0">0.Không lập HĐĐT</option>
                                                            <option value="1">1.Lập hoá đơn gốc - Ký số</option>
                                                            <option value="12">2.Lập hoá đơn gốc - Không ký số</option>
                                                            <option value="8">6.Lập hóa đơn nháp</option>
                                                            <option value="13">7.Cập nhật hoá đơn</option>
                                                            <option value="9">8.Ký hoá đơn </option>
                                                        <?php }else{
                                                            ?>
                                                            <option value="0">0.Không lập HĐĐT</option>
                                                            <option value="12">1.Lập hoá đơn gốc - Không ký số</option>
                                                            <option value="8">5.Lập hóa đơn nháp</option>
                                                            <option value="13">6.Cập nhật hoá đơn</option>
                                                            <option value="9">7.Ký hoá đơn </option>
                                                            <?php
                                                        }
                                                        ?>
                                                    </select>
                                                    <?php
                                                }else if($_SESSION['nhacungcaphddt']=='vnpt'){
                                                    ?>
                                                    <select id="hoadondientu" style="width: 100%;height:20px;">
                                                        <?php
                                                        if($_SESSION['chukysodaky']=='1'){
                                                            ?>
                                                            <option value="0">0.Không lập HĐĐT</option>
                                                            <option value="1">1.Lập hoá đơn gốc</option>
                                                            <option value="8">2.Lập hóa đơn nháp</option>
                                                            <option value="9">3.Đã phát hành</option>
                                                        <?php }else{
                                                            ?>
                                                            <option value="0">0.Không lập HĐĐT</option>
                                                            <option value="8">2.Lập hóa đơn nháp</option>
                                                            <option value="9">3.Đã phát hành</option>
                                                            <?php
                                                        }
                                                        ?>
                                                    </select>
                                                    <?php
                                                }else if($_SESSION['nhacungcaphddt']=='misa'){// Mới thêm misa
                                                    ?>
                                                    <select id="hoadondientu" style="width: 100%;height:20px;">
                                                        <?php
                                                        if($_SESSION['chukysodaky']=='1'){
                                                            ?>
                                                            <option value="0">0.Không lập HĐĐT</option>
                                                            <option value="1">1.Lập hoá đơn gốc</option>
                                                            <option value="8">5.Lập hóa đơn nháp</option>
                                                            <option value="11">6.Xem đơn nháp</option>
                                                            <option value="9">7.Đã phát hành</option>
                                                        <?php }else{
                                                            ?>
                                                            <option value="0">0.Không lập HĐĐT</option>
                                                            <option value="8">1.Lập hóa đơn nháp</option>
                                                            <option value="13">2.Cập nhật hoá đơn</option>
                                                            <option value="9">3.Đã phát hành</option>
                                                            <?php
                                                        }
                                                        ?>
                                                    </select>
                                                    <?php
                                                }else{
                                                    ?>
                                                    <select id="hoadondientu" style="width: 100%;height:20px;">
                                                        <option value="0">0.Không lập HĐĐT</option>
                                                    </select>
                                                    <?php

                                                }
                                                ?>
                                                <input type="hidden" id="MaBiMatHoaDon">
                                                <input type="hidden" id="LoaiHoaDonDienTu">
                                                <input type="hidden" id="hashString">
                                                <input type="hidden" id="chukysodaky">
                                            </td>
                                            <td width=""></td>
                                            <td width=""><b style="font-size: 11px;background-color: orange;<?php echo (($_SESSION['thietlaphddt'] == '1') ? '' : 'display:none'); ?>"
                                                            id="TXTLoaiHoaDonDienTu">CHƯA LẬP HĐĐT</b></td>
                                        </tr>
                                        <tr id="trvanbanthoathuan">
                                            <td width="4%">&nbsp;</td>
                                            <td colspan="2"><b style="font-size: 12px;">
                                                    <?php
                                                    if($_SESSION['nhacungcaphddt']=='viettel'){
                                                        echo "VB thoả thuận";
                                                    }else  if($_SESSION['nhacungcaphddt']=='bkav'){
                                                        echo "<abbr title=[".$_SESSION['txt_mauhoadon']."]_[".$_SESSION['txt_kyhieu']."]_[00000000]>Hoá đơn gốc<abbr>";
                                                    }
                                                    ?>
                                                </b></td>
                                            <td colspan="2" align="left">
                                                <input type="text"
                                                       class="text ui-widget-content ui-corner-all"
                                                       style="width:100%;text-align:right"
                                                       name="vanbanthoathuan" id="vanbanthoathuan"/>
                                            </td>
                                            <td align="right" width="21%"><b id="NgayThoaThuanVB"
                                                                             style="font-size: 12px;">Ngày thoả
                                                    thuận:</b></td>
                                            <td width="4%"></td>
                                            <td width="21%"><input type="date" style="text-align: right;"
                                                                   name="ngaythoathuan"
                                                                   value="<?php echo date("Y-m-d") ?>"
                                                                   id="ngaythoathuan"
                                                                   required="require"
                                                                   placeholder="Ngày ghi sổ"
                                                                   class="text ui-widget-content ui-corner-all"/></td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">

                                            </td>
                                            <td colspan="2" align="left" style="<?php echo (($_SESSION['duandautu'] == '1') ? '' : 'display:none'); ?>">&nbsp;&nbsp;
                                                <input name="duandautu" type="checkbox" class="checkbox" style="margin-left: 5px;"
                                                       id="duandautu" value="1"/><b style="font-size: 12px;">D.A Đầu tư</b>
                                            </td>
                                            <td colspan="2" style="<?php echo (($_SESSION['giam30thuegtgt'] == '1') ? '' : 'display:none'); ?>" align="left" width="21%"><input style="margin-top:5px;" type="checkbox" name="giam30theonghiquyet" id="giam30theonghiquyet" />
                                                <b style="font-size: 12px;"> &nbsp;Giảm theo NQ</b></td>
                                            <td width="21%"></td>
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
                                <td width="36%"><input  name="sotien1" type="text"
                                                        onkeyup="return format_munber(this.value,'#sotien1')"
                                                        class="text ui-widget-content ui-corner-all" id="sotien1"
                                                        style="width: 100%;text-align:right" value=""
                                    /></td>
                                <td width="36%"><input name="sotiennt1" type="text" <?php echo (($_SESSION['ngoaite'] == '1') ? '' : 'disabled=true'); ?>
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
                                <td width="36%"><input name="sotiennt2" type="text" <?php echo (($_SESSION['ngoaite'] == '1') ? '' : 'disabled=true'); ?>
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
                                <td><textarea name="ghichu" class="text ui-widget-content ui-corner-all" rows="2" id="ghichu"
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
            if (!(regexp.test(o.val()))) {
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


        $("#Form-chinh").keydown(function (event) {// Gọi table mã nội dung để chọn
            if (event.keyCode == Keys.ESCAPE) { // copy
                //$('.dialog_main_thongbao').load('form/frm_thongbao_huy_thuchi.php');
            } else if (event.keyCode == Keys.F8) { // copy
                $("#btnxoa").trigger("click");
            } else if (event.keyCode == Keys.F4) { // copy
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
                $("#tkco").focus();
            }
        })
        $(phieuchi).keydown(function (event) {// Gọi table mã nội dung để chọn
            if (event.keyCode == Keys.ENTER) { // copy
                $("#tkco").focus();
            }
        })

        ////////////////////////////////////////////////////////////////////////
        $(phieuthu).change(function (event) {// Gọi table mã nội dung để chọn
            $("#loaihanghoadichvu").html("<option value='0'>---Không chọn---</option><option value='5'>Doanh thu hàng hoá, dịch vụ chịu thuê xuất 0% và không chịu thuế</option><option value='1'>Phân phối, cung cấp hàng hoá</option><option value='2'>Dịch vụ, xây dựng không bao thầu nguyên vật liệu</option> <option value='3'>Sản xuất, vận tải, dịch vụ có gắn với hàng hoá, xây dựng có bao thầu nguyên vật liệu</option><option value='4'>Hoạt động kinh doanh khác</option>");
        })
        $(phieuchi).change(function (event) {// Gọi table mã nội dung để chọn
            $("#loaihanghoadichvu").html("<option value='1'>1. Hàng hóa dịch vụ dùng riêng cho SXKD chịu thuế GTGT và sử dụng cho các hoạt động cung cấp hàng hóa, dịch vụ không kê khai, nộp thuế GTGT đủ điều kiện khấu trừ thuế </option> <option value='2'>2. Hàng hóa, dịch vụ không đủ điều kiện khấu trừ </option> <option value='3'>3. Hàng hóa, dịch vụ dùng chung cho SXKD chịu thuế và không chịu thuế đủ điều kiện khấu trừ thuế </option>");
        })
        ///////////////////////////////////////

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
                if ($tkco == 112116)
                    $LoaiPhieu = 55;
                if ($tkco == 112117)
                    $LoaiPhieu = 57;
                if ($tkco == 112118)
                    $LoaiPhieu = 59;
                if ($tkco == 112119)
                    $LoaiPhieu = 61;
                if ($tkco == 112120)
                    $LoaiPhieu = 63;

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
                if ($tkco == 112116)
                    $LoaiPhieu = 56;
                if ($tkco == 112117)
                    $LoaiPhieu = 58;
                if ($tkco == 112118)
                    $LoaiPhieu = 60;
                if ($tkco == 112119)
                    $LoaiPhieu = 62;
                if ($tkco == 112120)
                    $LoaiPhieu = 64;

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
                $("#manoidung1").focus();
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
        });

        $("#ghichu").keydown(function (event) {// Gọi table mã nội dung để chọn
            if (event.keyCode == Keys.ENTER) { // copy
                ChucNang_ThuChi();
            }
        });

        $("#hoadondientu").change(function (event) {// Gọi table mã nội dung để chọn
            HidenNgayThoaThuan();
            $LoaiHoaDon = $("#hoadondientu").val();
            if ($LoaiHoaDon == 11) {
                $KQ = confirm("Bạn có muốn tạo hoá đơn nháp này không?\n Lưu ý: Hoá đơn tạo nháp sẽ không được tạo trên hệ thống hoá đơn điện tử.");
                if ($KQ) {
                    $res = {
                        "errorCode": "INVOICE_ISSUED_DATE_INVALID",
                        "description": "Không kết nối được tới máy chủ !"
                    }

                    $latendonvi = $("#lacongtrinh").is(":checked");
                    if ($latendonvi == false && $("#masothue2").val().trim() == "") {// Cảnh báo khi xuất hóa đơn điện tử khi không có MST
                        $thongbao = "";
                        $thongbao = "CẢNH BÁO \n\n Bạn đang chuẩn bị xuất hóa đơn điện tử với thông tin hiển thị ở vị trí [HỌ TÊN NGƯỜI MUA HÀNG].\n\n Bạn có muốn tiếp tục không ?";
                        var result1 = confirm($thongbao);
                        if (!result1) {
                            return false;
                        }
                    }

                    $loaihoadondientu = $("#hoadondientu").val();
                    var $VanBanThoaThuan = $("#vanbanthoathuan").val();
                    var $NgayLapVanBan = $("#ngaythoathuan").val();
                    $NgayLapVanBan = $NgayLapVanBan.split("-");

                    var $NgayHoaDon = $("#ngayhoadon").val();
                    $NgayHoaDon = $NgayHoaDon.split("-");

                    var newDate = $NgayHoaDon[1] + "," + $NgayHoaDon[2] + "," + $NgayHoaDon[0] + " 00:00:00";
                    var newDateNVB = $NgayLapVanBan[1] + "," + $NgayLapVanBan[2] + "," + $NgayLapVanBan[0] + " 00:00:00";
                    $NgayLapHoaDon = ((new Date(newDate).getTime()));
                    $NgayLapHoaDonCu = ((new Date(newDateNVB).getTime()));
                    $latendonvi = $("#lacongtrinh").is(":checked");

                    $tencanhan = "";
                    $tendonvi = "";
                    if ($("#masothue2").val().trim() == "" && $latendonvi == false) {
                        $tencanhan = $("#tenkhachhang2").val().trim().split("&#039;").join("'");
                    } else {
                        $tendonvi = $("#tenkhachhang2").val().trim().split("&#039;").join("'");
                        $tencanhan = $("#tencanhan").val().trim();
                    }
                    $phantramthue = $("#thuesuat1").val();
                    if ($phantramthue == 'K' || $phantramthue == 'k') {
                        $phantramthue = -2;
                    }
                    {// Lập hoá đơn gốc
                        $MauHoaDon = $("#mauso").val().length;
                        if($MauHoaDon>6){
                            $invoiceType = $("#mauso").val().substr(0, 6);
                        }else{
                            $invoiceType = $("#mauso").val().substr(0, 1);
                        }
                        var $data = {
                            "generalInvoiceInfo": {
                                "invoiceType": $invoiceType,
                                "templateCode": $("#mauso").val(),
                                "invoiceSeries": $("#kyhieu").val().trim().toUpperCase(),
                                "invoiceIssuedDate": $NgayLapHoaDon,
                                "currencyCode": "VND",
                                "adjustmentType": "1",
                                "paymentStatus": true,
                                "paymentType": "TM/CK",
                                "paymentTypeName": "TM/CK",
                                "cusGetInvoiceRight": true,
                                "buyerIdNo": $("#makhachhang2").val(),
                                "buyerIdType": "1"
                            },
                            "buyerInfo": {
                                "buyerName": $tencanhan,
                                "buyerLegalName": $tendonvi,
                                "buyerTaxCode": $("#masothue2").val(),
                                "buyerAddressLine": $("#diachi2").val(),
                                "buyerPhoneNumber": "",
                                "buyerEmail": "",
                                "buyerIdNo": $("#makhachhang2").val(),
                                "buyerIdType": "1",
                                "buyerBankAccount": $("#matknganhang").val().trim(),
                                "buyerBankName": $("#tentknganhang").val().trim()
                            },
                            "sellerInfo": {
                                "sellerLegalName": "<?php echo $_SESSION['TenCongTy']; ?>",
                                "sellerTaxCode": "<?php echo $_SESSION['MST']; ?>",
                                "sellerAddressLine": "<?php echo $_SESSION['DiaChi']; ?>",
                                "sellerPhoneNumber": "<?php echo $_SESSION['DienThoai']; ?>",
                                "sellerEmail": "<?php echo $_SESSION['Email']; ?>",
                                "sellerBankName": "<?php echo $_SESSION['txt_tennganhang']; ?>",
                                "sellerBankAccount": "<?php echo $_SESSION['txt_sotaikhoan']; ?>"
                            },
                            "extAttribute": [],
                            "payments": [
                                {
                                    "paymentMethodName": "TM/CK"
                                }
                            ],
                            "deliveryInfo": {},
                            "itemInfo": [
                                {
                                    "lineNumber": 1,
                                    "itemCode": $("#manoidung1").val().trim(),
                                    "itemName": $("#noidung1").val().trim(),
                                    "unitName": "",// Đơn vị tính
                                    "itemTotalAmountWithoutTax": Math.abs($("#sotien1").val().toString().split(",").join("")),
                                    "itemTotalAmountWithTax": Math.abs($("#sotien1").val().toString().split(",").join("")) + Math.abs($("#sotien2").val().toString().split(",").join("")),
                                    "taxPercentage": $phantramthue,
                                    "taxAmount": Math.abs($("#sotien2").val().toString().split(",").join("")),
                                    "discount": 0.0,
                                    "itemDiscount": 0.0
                                }
                            ],
                            "discountItemInfo": [],
                            "summarizeInfo": {
                                "sumOfTotalLineAmountWithoutTax": Math.abs($("#sotien1").val().toString().split(",").join("")),
                                "totalAmountWithoutTax": Math.abs($("#sotien1").val().toString().split(",").join("")),
                                "totalTaxAmount": Math.abs($("#sotien2").val().toString().split(",").join("")),
                                "totalAmountWithTax": Math.abs($("#tongtien").val().toString().split(",").join("")),
                                "totalAmountWithTaxInWords": "",
                                "discountAmount": 0.0,
                                "taxPercentage": $phantramthue
                            },
                            "taxBreakdowns": [
                                {
                                    "taxPercentage": $phantramthue,
                                    "taxableAmount": Math.abs($("#sotien1").val().toString().split(",").join("")),
                                    "taxAmount": Math.abs($("#sotien2").val().toString().split(",").join(""))
                                }
                            ]
                        };
                        $ketqua = "";
                        $.ajax({// Load danh sách mã khách hàng
                            url: "xemnhaphoadondientu.php",
                            dataType: 'json',
                            async: false,
                            data: {data: $data},
                            success: function (response) {
                                $ketqua = response;
                                if ($ketqua.errorCode == null) {
                                    $("#hoadondientu").val(0);
                                    window.open("tcpdf/baocao/inbang_hoadon_dientu_nhap.php", "inhoadondtnhap", "menubar=0,resizable=0");
                                }
                            }
                        });
                    }
                }
            }
        });

        function HidenNgayThoaThuan(){
            $val = $("#hoadondientu").val();
            if ($val == '2' || $val == '3' || $val == '4' || $val == '5' || $val == '6') {
                if ($val == '2' || $val == '3') {
                    $("#NgayThoaThuanVB").text("Ngày HĐ gốc");
                } else {
                    $("#NgayThoaThuanVB").text("Ngày thoả thuận");
                }
                $("#trvanbanthoathuan").show();
            } else {
                $("#trvanbanthoathuan").hide();
            }
        }

        function LapHoaDonDienTu($LoaiHoaDon, $data) {
            $ketqua = "";

            $KQ = confirm("Bạn có muốn tạo hoá đơn này không?\n Lưu ý: Hoá đơn điện tử sau khi tạo sẽ không được thay đổi.");
            if ($KQ) {
                $.ajax({// Load danh sách mã khách hàng
                    url: "taohoadondientu.php",
                    async: false,
                    data: {data: $data, loaihoadon: $LoaiHoaDon},
                    success: function (response) {
                        $ketqua = response;
                    }
                });
                return $ketqua;
            }else{
                false;
            }
        }
        function LapHoaDonDienTu_misa($LoaiHoaDon, $data) {
            $ketqua = "";
            $KQ = confirm("Bạn có muốn tạo hoá đơn này không?\n Lưu ý: Hoá đơn điện tử sau khi tạo sẽ không được thay đổi.");
            if ($KQ) {
                $.ajax({// Load danh sách mã khách hàng
                    url: "taohoadondientu_misa.php",
                    async: false,
                    data: {data: $data, loaihoadon: $LoaiHoaDon},
                    success: function (response) {
                        $ketqua = response;
                    }
                });
                return $ketqua;
            }else{
                false;
            }
        }

        function LapHoaDonDienTu_vnpt($LoaiHoaDon, $data) {
            $ketqua = "";

            $KQ = confirm("Bạn có muốn tạo hoá đơn này không?\n Lưu ý: Hoá đơn điện tử sau khi tạo sẽ không được thay đổi.");
            if ($KQ) {
                $.ajax({// Load danh sách mã khách hàng
                    url: "taohoadondientu_vnpt.php",
                    async: false,
                    data: {data: $data, loaihoadon: $LoaiHoaDon},
                    success: function (response) {
                        $ketqua = response;
                    }
                });
                return $ketqua;
            }else{
                false;
            }
        }

        function LapHoaDonDienTu_bkav($LoaiHoaDon, $data) {
            $chukyso = $("#chukysodaky").val().trim();
            $ketqua = "";
            $res = {
                "errorCode": "INVOICE_ISSUED_DATE_INVALID",
                "description": "Không kết nối được tới máy chủ !"
            }
            if(($LoaiHoaDon==9) && "<?php echo $_SESSION['txt_seritoken'] ?>"!=""){
                var $data = {
                    "CmdType":809,
                    "CommandObject":$("#sophieu").val().trim()
                }
                $.ajax({// Load danh sách mã khách hàng
                    url: "taohoadondientu_bkav.php",
                    async: false,
                    data: {data: $data, loaihoadon: $LoaiHoaDon},
                    success: function (response) {
                        $res = $.parseJSON(response);
                    }
                });
                if ($res.errorCode !== 0) {
                    $alert = alert($res.description + " .");
                    $("#hoadondientu").val(0);
                    return false;
                }else{
                    $hashString = $res.result.hashString;
                    $mauso = $("#mauso").val().trim();
                    $("#hashString").val($hashString);
                    signXml();
                    $chukyso = $("#chukysodaky").val();
                }
                return false;
            }
            $KQ = confirm("Bạn có muốn tạo hoá đơn này không?\n Lưu ý: Hoá đơn điện tử sau khi tạo sẽ không được thay đổi.");
            if ($KQ) {
                $.ajax({// Load danh sách mã khách hàng
                    url: "taohoadondientu_bkav.php",
                    async: false,
                    data: {data: $data, loaihoadon: $LoaiHoaDon},
                    success: function (response) {
                        $ketqua = response;
                    }
                });
                return $ketqua;
            }else{
                false;
            }
        }


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
                if ($tkco == 112116)
                    $LoaiPhieu = 55;
                if ($tkco == 112117)
                    $LoaiPhieu = 57;
                if ($tkco == 112118)
                    $LoaiPhieu = 59;
                if ($tkco == 112119)
                    $LoaiPhieu = 61;
                if ($tkco == 112120)
                    $LoaiPhieu = 63;

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
                if ($tkco == 112116)
                    $LoaiPhieu = 56;
                if ($tkco == 112117)
                    $LoaiPhieu = 58;
                if ($tkco == 112118)
                    $LoaiPhieu = 60;
                if ($tkco == 112119)
                    $LoaiPhieu = 62;
                if ($tkco == 112120)
                    $LoaiPhieu = 64;

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

            }
            $sophieu = sophieu.val();
            $sohoadon = sohoadon.val().trim();
            $makhachhang = makhachhang.val().trim();
            $kyhieu = $("#kyhieu").val().trim().toUpperCase();
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
            $kyhieu = $("#kyhieu").val().trim().toUpperCase();
            $ngayhoadon = $("#ngayhoadon").val().trim();
            $tongtien = $("#tongtien").val().trim();
            $sottpsct = $("#sottpsct").val().trim();
            $loaict = $("#loaict").val().trim();
            $tk = $("#tkco").val().trim();
            if ($LoaiPhieu % 2==0 && ($loaict == 1 || $loaict == 2)) {
                $.ajax({
                    url: $dir_module_ps_kt + "kiemtrasohoadon_vuotthuchi.php",
                    data: {
                        loaiphieu: $LoaiPhieu,
                        makh: $makhachhang,
                        ngayhoadon: $ngayhoadon,
                        tongtien: $tongtien,
                        sohoadon: $sohoadon,
                        kyhieu: $kyhieu,
                        sottpsct: $sottpsct,
                        tk: $tk
                    },
                    async: false,
                    success: function (response) {
                        $data = (response.trim());
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
                if ($tkco == 112116)
                    $LoaiPhieu = 55;
                if ($tkco == 112117)
                    $LoaiPhieu = 57;
                if ($tkco == 112118)
                    $LoaiPhieu = 59;
                if ($tkco == 112119)
                    $LoaiPhieu = 61;
                if ($tkco == 112120)
                    $LoaiPhieu = 63;

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
                if ($tkco == 112116)
                    $LoaiPhieu = 56;
                if ($tkco == 112117)
                    $LoaiPhieu = 58;
                if ($tkco == 112118)
                    $LoaiPhieu = 60;
                if ($tkco == 112119)
                    $LoaiPhieu = 62;
                if ($tkco == 112120)
                    $LoaiPhieu = 64;

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

            }
            $('.dialog_main_pskt_phieuthu').load('form/frm_ps_kt_phieuthu.php?idstyle=Form-chinh&idinput=STT&idfocus=STT&loaiphieu=' + $LoaiPhieu);
        });

        $("#STT").focus(function (event) {// Gọi table khách hàng để chọn
            var $LoaiPhieu = 1;
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
                if ($tkco == 112116)
                    $LoaiPhieu = 55;
                if ($tkco == 112117)
                    $LoaiPhieu = 57;
                if ($tkco == 112118)
                    $LoaiPhieu = 59;
                if ($tkco == 112119)
                    $LoaiPhieu = 61;
                if ($tkco == 112120)
                    $LoaiPhieu = 63;

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
                if ($tkco == 112116)
                    $LoaiPhieu = 56;
                if ($tkco == 112117)
                    $LoaiPhieu = 58;
                if ($tkco == 112118)
                    $LoaiPhieu = 60;
                if ($tkco == 112119)
                    $LoaiPhieu = 62;
                if ($tkco == 112120)
                    $LoaiPhieu = 64;

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

            }
            if ($LoaiPhieu == 1 || $LoaiPhieu == 2) {
                $("#lbphieuthu").text("Phiếu thu");
                $("#lbphieuchi").text("Phiếu chi");
            } else {
                $("#lbphieuthu").text("Gửi vào");
                $("#lbphieuchi").text("Rút ra");
            }
        });

        btntim.click(function (event) {// Gọi table khách hàng để chọn
            var $sophieu = sophieu.val().trim();
            var $tkco = tkco.val().trim();
            $('.dialog_main_chitiet_pskt_phieuthu').load('form/frm_chitiet_ps_kt_phieuthu.php?idstyle=Form-chinh&idinput=STT&idfocus=STT&sophieu=' + $sophieu);
        });
        $("#nhaptuxml").click(function (event) {// Gọi table khách hàng để chọn
            var $sophieu = sophieu.val().trim();
            if($sophieu==""){
                alert("Chưa nhập số chứng từ");
            }else {
                window.open('form/frm_tai_xml_hoadon_window.php?sophieu=' + $sophieu + '&loaiphieu=TC', 'updatedata', 'height=1000', 'width=2000');
            }
        });
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

        $("#tkno1").focusout(function (event) {// Gọi table mã nội dung để chọn
            $tkno = $("#tkno1").val().trim();
            if ($tkno == "621") { // copy
                $("#CTCT").attr("disabled", false);
            } else {
                $("#CTCT").attr("disabled", true);
            }
        });

        $(tkco).focusout(function (event) {// Gọi table mã nội dung để chọn
            $tkco = tkco.val().trim();
            if ($('.dialog_main_httk').html() == "") { // copy
                goitablehttk($tkco);
            }
        });

        $(tkno1).focusout(function (event) {// Gọi table mã nội dung để chọn
            $tkno1= tkno1.val().trim();
            if ($('.dialog_main_httk').html() == "") { // copy
                goitablehttktkno1($tkno1);
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

        function goitablehttktkno1($vale) {
            $tkno1 = tkno1.val().trim();
            if ($vale == "") {// nếu tk nợ trống thì bật tra bảng
                $('.dialog_main_httk').load("form/frm_dm_httk_form_select.php?idstyle=Form-chinh&idinput=tkno1***tentkno1&idfocus=STT&ma=" + $tkno1);
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
                    //tentkco.val($data.tentk);
                } else {
                    $('.dialog_main_httk').load("form/frm_dm_httk_form_select.php?idstyle=Form-chinh&idinput=tkno1***tentkno1&idfocus=STT&ma=" + $tkno1);
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
                $('.dialog_main_makh').load("form/frm_dm_makh_form_select.php?idstyle=Form-chinh&idinput=makhachhang***tenkhachhang***diachi***masothue***makhachhang2***tenkhachhang2***diachi2***masothue2&idfocus=loaict&ma=" + $("#makhachhang").val());
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


                    //if(makhachhang2.val().trim()=="") {
                    makhachhang2.val($data.makh);
                    tenkhachhang2.val($data.tenkh);
                    diachi2.val($data.diachi);
                    $("#masothue2").val($data.masothue);
                    //}

                    //loaict.focus();

                } else {
                    $('.dialog_main_makh').load("form/frm_dm_makh_form_select.php?idstyle=Form-chinh&idinput=makhachhang***tenkhachhang***diachi***masothue***makhachhang2***tenkhachhang2***diachi2***masothue2&idfocus=loaict&ma='" + $("#makhachhang").val().trim()+"'");
                }
            }
        }

        function goitablemakhachhang2($vale) {
            if ($vale == "") {// nếu tk nợ trống thì bật tra bảng
                $('.dialog_main_makh').load("form/frm_dm_makh_form_select.php?idstyle=Form-chinh&idinput=makhachhang2***tenkhachhang2***diachi2***masothue2&idfocus=btnbophan");
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
                    $("#masothue2").val($data.masothue);

                    //mabophan.focus();

                } else {
                    $('.dialog_main_makh').load("form/frm_dm_makh_form_select.php?idstyle=Form-chinh&idinput=makhachhang2***tenkhachhang2***diachi2***masothue2&idfocus=btnbophan&ma=" + $("#makhachhang2").val().trim());
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
                        if ($LoaiPhieu == 1)
                            tkno1.val($data.tkco);
                        if ($LoaiPhieu == 2)
                            tkno1.val($data.tkno);
                    }

                    thuesuat1.val($data.rate_tax);

                } else {
                    $('.dialog_main_manoidung').load("form/frm_dm_manoidung_form_select.php?idstyle=Form-chinh&idinput=manoidung1***noidung1***tkno1***ghichu***datamau***thuesuat1&idfocus=sotien1&loaiphieu=" + $LoaiPhieu + "&ma=" + $("#manoidung1").val().trim());
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
                    $('.dialog_main_manoidung').load("form/frm_dm_manoidung_form_select.php?idstyle=Form-chinh&idinput=manoidung2***noidung2***tkno2&idfocus=sotien2&loaiphieu=" + $LoaiPhieu + "&ma=" + $("#manoidung2").val().trim());
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
                }else if ($loaisp == "HD") {
                    $('.dialog_main_danhmuc_sanpham').load("form/frm_dm_hopdong_form_select.php?idstyle=Form-chinh&idinput=mabophan***bophan&idfocus=tygia&ma=" + $("#mabophan").val());
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
                        $('.dialog_main_danhmuc_sanpham').load("form/frm_dm_sanpham_from_select.php?idstyle=Form-chinh&idinput=mabophan***bophan&idfocus=tygia&ma=" + $("#mabophan").val().trim());
                    } else if ($loaisp == "CT") {
                        $('.dialog_main_danhmuc_sanpham').load("form/frm_dm_congtrinh_form_select.php?idstyle=Form-chinh&idinput=mabophan***bophan&idfocus=tygia&ma=" + $("#mabophan").val().trim());
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
        /////// Giảm theo nghị quyết///////////////////////////////////
        function giam30theonghidinh(){
            var $ThueSuatGiamTheoNghiQuyet = 1;
            var giam30thuegtgt = $("#giam30theonghiquyet").is(":checked");
            $TuNgayGiamThue  = new Date("2021/11/01");
            $TuNgayGiamThue_20  = new Date("2022/02/01");
            $TuNgayGiamThue_12  = new Date("2023/07/01");
            $DenNgayGiamThue = new Date("2021/12/31");
            $DenNgayGiamThue_20 = new Date("2023/01/01");
            $DenNgayGiamThue_12 = new Date("2024/07/01");
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
        ///////// Bắt đầu số tiền 1 --------------------------------------------------
        $(sotien1).focusout(function (event) {// Gọi table mã nội dung để chọn
            $sotien1 = sotien1.val().trim().replace(/,/gi, "");
            $sotien2 = sotien2.val().trim().replace(/,/gi, "");
            $tongtien_cu = tongtien_cu.val().trim().replace(/,/gi, "");
            $tongtiensosanh = $("#tongtien").val().trim().replace(/,/gi, "");
            $tongcong_cu = tongcong_cu.val().trim().replace(/,/gi, "");
            $tongcong = tongcong.val().trim().replace(/,/gi, "");
            $phantramthue =thuesuat1.val().trim();
            $ThueSuatGiamTheoNghiQuyet = 1;
            if ($phantramthue == 'K' || $phantramthue == 'k' || $phantramthue == 'kk' || $phantramthue == 'KK') {
                $phantramthue = 0 ;
            }
            $thuesuat1 = Math.round(parseFloat($phantramthue));
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
                ////////////////////////////////////////////////////////////////////////////////
                $ThueSuatGiamTheoNghiQuyet = giam30theonghidinh();
                ////////////////////////////////////////////////////////////////////////////////
                if ($sotien2 == 0) {
                    $sotien2 = Math.round(parseFloat($sotien1) * ($thuesuat1 / 100));// Thuế suất không giảm
                    if($ThueSuatGiamTheoNghiQuyet=='0.7'){// Giảm 30% thuế GTGT
                        $sotien2 = Math.round(parseFloat($sotien1) * ($thuesuat1 / 100)*$ThueSuatGiamTheoNghiQuyet);
                    }else if($ThueSuatGiamTheoNghiQuyet=='0.8'){// Giảm 20% thuế GTGT chỉ giảm hàng hoá 10%
                        if($thuesuat1=="10"){
                            $sotien2 = Math.round(parseFloat($sotien1) * ($thuesuat1 / 100)*$ThueSuatGiamTheoNghiQuyet);
                        }
                    }
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
                        ////////////////////////////////////////////////////////////////////////////////
                        $ThueSuatGiamTheoNghiQuyet = giam30theonghidinh();
                        ////////////////////////////////////////////////////////////////////////////////
                    }
                    if (phieuchi.is(":checked")) {
                        manoidung2.val("100000");
                        noidung2.val("Thuế GTGT đầu vào");
                        tkno2.val("1331");
                    }
                    $sotien_tmp = Math.round(parseFloat($sotien1) / (1 + ($thuesuat1 / 100)));
                    if ($sotien2 == 0) {
                        $sotien2 = Math.round((parseFloat($sotien1) - ($sotien_tmp)));
                        if($ThueSuatGiamTheoNghiQuyet=='0.7'){// Giảm 30% thuế GTGT
                            $sotien2 = Math.round((parseFloat($sotien1) - ($sotien_tmp))*$ThueSuatGiamTheoNghiQuyet);
                        }else if($ThueSuatGiamTheoNghiQuyet=='0.8'){// Giảm 20% thuế GTGT chỉ giảm hàng hoá 10%
                            if($thuesuat1=="10"){
                                $sotien2 = Math.round((parseFloat($sotien1) - ($sotien_tmp))*$ThueSuatGiamTheoNghiQuyet);
                            }
                        }

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
            var valid = true;
            allFields.removeClass("ui-state-error");// kiem tra du lieu
            $tkco = $("#tkco").val();
            $tkno1 = $("#tkno1").val();
            $tkno2 = $("#tkno2").val();
            $tkco1 = $("#tkco1").val();
            $tkco2 = $("#tkco2").val();
            $tongtien = parseFloat($("#tongtien").val().replace(/,/g, ""));
            valid = valid && checkNull(STT, " Số TT  ");
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
            $loitk = true;
            if(($tkco.substring(0,3)!=111 && $tkco.substring(0,3)!=112) && $loitk ){
                alert("Không thể sử dụng tài khoản "+$tkco+" trong phiếu thu chi .");
                tkco.focus();
                $loitk = false;
                valid = false;
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
                        $res = (data);
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
                if ($tkco == 112116)
                    $LoaiPhieu = 55;
                if ($tkco == 112117)
                    $LoaiPhieu = 57;
                if ($tkco == 112118)
                    $LoaiPhieu = 59;
                if ($tkco == 112119)
                    $LoaiPhieu = 61;
                if ($tkco == 112120)
                    $LoaiPhieu = 63;

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
                if ($tkco == 112116)
                    $LoaiPhieu = 56;
                if ($tkco == 112117)
                    $LoaiPhieu = 58;
                if ($tkco == 112118)
                    $LoaiPhieu = 60;
                if ($tkco == 112119)
                    $LoaiPhieu = 62;
                if ($tkco == 112120)
                    $LoaiPhieu = 64;

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
            valid = valid && checkNull(tkco, " Mã tài khoản ");
            valid = valid && checkNull(makhachhang, " Mã khách hàng ");
            valid = valid && checkNull($('#tenkhachhang'), " Tên khách hàng  ");

            valid = valid && checkNull(ngayghiso, " Ngày ghi sổ ");
            $loaict = 1;
            $loaict = $("#loaict").val();
            if ($loaict == 1 || $loaict == 2) {
                valid = valid && checkNull(mauso, " Mẫu số hoá đơn  ");
                var Reg_MauSo = new RegExp("^[0-9a-zA-Z_./-]{0,14}$");
                valid = valid && checkRegexp(mauso, Reg_MauSo, " Mẫu số hoá đơn không được có khoảng trắng .");
                valid = valid && checkNull(kyhieu, " Ký hiệu hoá đơn  ");
                valid = valid && checkNull(sohoadon, " Số hoá đơn  ");
                valid = valid && checkNull($('#diachi'), " Địa chỉ khách hàng  ");
            }

            $masothue = masothue.val().trim();
            if($masothue!=""){
                var Reg_masothue = new RegExp("^[0-9-]{10,14}$");
                valid = valid && checkRegexp(masothue,Reg_masothue, " Mã số thuế không đúng định dạng .");
            }


            valid = valid && checkNull(ngayhoadon, " Ngày hoá đơn  ");
            valid = valid && checkNull($('#ngaykhaithue'), " Ngày khai thuế  ");

            valid = valid && checkNull(manoidung1, " Mã nội dung ");
            valid = valid && checkNull(mabophan, " Mã bộ phận ");
            valid = valid && checkNull(tkno1, " Mã tài khoản ");
            valid = valid && checkNull(sotien1, " Số tiền ");
            $SoTien2 = $('#sotien2').val().trim();
            if($SoTien2!="" && $SoTien2!=0){
                valid = valid && checkNull($('#manoidung2'), " Nội dung ");
                valid = valid && checkNull($('#tkno2'), " Tài khoản ");
            }

            valid = valid && checkNull($('#ChiNhanhCongTy'), " Chi nhánh ");

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

            var date_hoadon = new Date($("#ngayhoadon").val());
            var date_ghiso = new Date($("#ngayghiso").val());

            var ngayghiso_ngayhoadon = (date_ghiso.getTime() - date_hoadon.getTime());
            if (ngayghiso_ngayhoadon < 0) {
                $thongbao = "";
                $thongbao = "CHÚ Ý \n\n Ngày ghi sổ hạch toán trước ngày hóa đơn . Tiền thuế GTGT sẽ được hạch toán theo ngày hóa đơn hoặc ngày khai thuế . \n\n Bạn có muốn tiếp tục không ?";
                var result1 = confirm($thongbao);
                if (!result1) {
                    return false;
                }
            }

            if (($tkco == $tkno1 && $tkco != "" && $tkno1 != "") || ($tkco == $tkno2 && $tkco != "" && $tkno2 != "")) {
                $thongbao = "";
                $thongbao = "CẢNH BÁO \n\n Tài khoản đối ứng giống nhau . Bạn có muốn tiếp tục không ?";
                var result1 = confirm($thongbao);
                if (!result1) {
                    return false;
                }
            }

            if (($LoaiPhieu % 2) == 0 && $("#chonloaisp").val() == 0 && ($tkco.substring(0,3) == 621 || $tkco.substring(0,3) == 622 || $tkco.substring(0,3) == 623 || $tkco.substring(0,3) == 627 || $tkno1.substring(0,3) == 621 || $tkno1.substring(0,3) == 622 || $tkno1.substring(0,3) == 623 || $tkno1.substring(0,3) == 627 || $tkno2.substring(0,3) == 621 || $tkno2.substring(0,3) == 622 || $tkno2.substring(0,3) == 623 || $tkno2.substring(0,3) == 627)) {
                alert("Tài khoản bạn chọn có liên quan đến SẢN PHẨM hoặc CÔNG TRÌNH. \nVui lòng chọn loại SẢN PHẨM hoặc CÔNG TRÌNH trong phiếu !");
                $("#chonloaisp").focus();
                return false;
            }

            $LoaiCT = loaict.val().trim();

            var $congaykhaithue = 0;
            if ($("#congaykhaithue").is(":checked")) {
                $congaykhaithue = 1;
            }
            var $ngaykhithue = $("#ngaykhaithue").val();

            $hoadondientu = $("#hoadondientu").val();
            $loaihoadondientu = 0;
            if (valid && $LoaiPhieu == 1 && $LoaiCT == '1' && $hoadondientu != 0 && $loaitokhai == '1' && "<?php echo $_SESSION['thietlaphddt'] ?>" == "1" && "<?php echo $_SESSION['txt_hddt_tendangnhap'] ?>" != "" && "<?php echo $_SESSION['txt_hddt_matkhau'] ?>" != "" && "<?php echo $_SESSION['txt_hddt_duongdan'] ?>" != "") {// Nếu là phiếu chi và loại chứng từ là thuế GTGT thì thực hiện lập hoá đơn điện tử
                alert("CẢNH BÁO \nKHÔNG THỂ LẬP HÓA ĐƠN ĐIỆN TỬ Ở NÚT THÊM NÀY.");
                return false;
            }

            if ($loaitokhai == 0) {
                var result = confirm("Bạn đang chọn tờ khai bổ sung ! Bạn có muốn tiếp tục nhập ?");
                if (result == false) {
                    $("#sohoadon").focus();
                    return false;
                }
            }
            $tencanhan = $("#tencanhan").val().trim();
            $LaCongTrinh = 0;
            if ($("#lacongtrinh").is(":checked")) {
                $LaCongTrinh = 1;
            }
            $DuAnDauTu = 0;
            if ($("#duandautu").is(":checked")) {
                $DuAnDauTu = 1;
            }

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
                            mabimat: $("#MaBiMatHoaDon").val(),
                            loaihddt: $loaihoadondientu,
                            congaykhaithue: $congaykhaithue,
                            ngaykhaithue: $ngaykhithue,
                            loaihanghoadichvu: $("#loaihanghoadichvu").val(),
                            chungtuthamchieu: $("#chungtuthamchieu").val(),
                            tencanhan:$tencanhan,
                            lacongtrinh:$LaCongTrinh,
                            duandautu:$DuAnDauTu,
                            chinhanh:$("#ChiNhanhCongTy").val()
                        },
                        success: function (result) {
                            //$('.dialog_main_thongbao').load('form/frm_thongbao_thuchi.php?loaiphieu=' + $LoaiPhieu + '&ngayhd=' + ngayhoadon.val().trim() + '&sophieu=' + sophieu.val().trim());
                            $tongcongtien = tongcong.val().trim();
                            $sottpsct = getSoTTPSKTMAX();
                            $("#ThamChieuTS").text("Tham chiếu: " + $sottpsct);
                            sottpsct.val($sottpsct);
                            sotien1.val("");
                            sotien2.val("");
                            tongtien.val("");
                            $("#sotiennt1").val("");
                            $("#sotiennt2").val("");
                            $("#tongtiennt").val("");
                            $("#sohoadon").val("");

                            $("#tongcong_cu").val($tongcongtien);

                        }
                    });
                    $('#btnketiep').attr('page', 2);
                    btnketiep.attr("disabled", false);
                    $("#kyhieu").focus();
                }
            }
        });
        $(sohoadon).focus(function (event) {// Gọi table mã nội dung để chọn
            $data = "";
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
                if ($tkco == 112116)
                    $LoaiPhieu = 55;
                if ($tkco == 112117)
                    $LoaiPhieu = 57;
                if ($tkco == 112118)
                    $LoaiPhieu = 59;
                if ($tkco == 112119)
                    $LoaiPhieu = 61;
                if ($tkco == 112120)
                    $LoaiPhieu = 63;

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
                if ($tkco == 112116)
                    $LoaiPhieu = 56;
                if ($tkco == 112117)
                    $LoaiPhieu = 58;
                if ($tkco == 112118)
                    $LoaiPhieu = 60;
                if ($tkco == 112119)
                    $LoaiPhieu = 62;
                if ($tkco == 112120)
                    $LoaiPhieu = 64;

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

            }

            $KyHieu = $("#kyhieu").val();
            $sohoadon = sohoadon.val();
            $loaict = $("#loaict").val();
            //alert($sohoadon);
            if ($sohoadon == "" && $LoaiPhieu == 1 && ($loaict == 1 || $loaict == 2)) {
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
                if ($tkco == 112116)
                    $LoaiPhieu = 55;
                if ($tkco == 112117)
                    $LoaiPhieu = 57;
                if ($tkco == 112118)
                    $LoaiPhieu = 59;
                if ($tkco == 112119)
                    $LoaiPhieu = 61;
                if ($tkco == 112120)
                    $LoaiPhieu = 63;

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
                if ($tkco == 112116)
                    $LoaiPhieu = 56;
                if ($tkco == 112117)
                    $LoaiPhieu = 58;
                if ($tkco == 112118)
                    $LoaiPhieu = 60;
                if ($tkco == 112119)
                    $LoaiPhieu = 62;
                if ($tkco == 112120)
                    $LoaiPhieu = 64;

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
            //$("#btnthem" ).trigger( "click" );
            $page = btnketiep.attr("page");
            $sophieu = sophieu.val();
            phantrang($page, $sophieu);
        });


        ///////////////////////////////////////////////////////////////////////
        $(loaict).change(function () {// Lấy tên khách hàng , địa chỉ , mst
            $loaict = loaict.val();
            if ($loaict == 1) {
                mauso.val("1");
                cothuegtgt.attr("checked", true);
                $("#cothuegtgt").attr("disabled", true);
            }
            if ($loaict == 2) {
				mauso.val("2");
                cothuegtgt.attr("checked", false);
                $('#cothuegtgt').removeAttr("disabled");
            }
            if ($loaict == 3) {
                cothuegtgt.attr("checked", false);
                $('#cothuegtgt').removeAttr("disabled");
            }
            if ($loaict == 4) {
                mauso.val("");
                cothuegtgt.attr("checked", false);
                $('#cothuegtgt').removeAttr("disabled");
            }
            if ($loaict == 5) {
                mauso.val("");
                cothuegtgt.attr("checked", false);
            }
        });

        $(ngayhoadon).focus(function () {
            if (ngayhoadon.val() == "") {
                ngayhoadon.val(ngayghiso.val());
            }
        });

        $("#congaykhaithue").change(function () {// Lấy tên khách hàng , địa chỉ , mst
            if ($("#congaykhaithue").is(":checked")) {
                $("#ngaykhaithue").attr("disabled", false);
            } else {
                $ngayhoadon = $("#ngayhoadon").val();
                $("#ngaykhaithue").val($ngayhoadon);
                $("#ngaykhaithue").attr("disabled", true);
            }
        });

        $("#latencanhan").change(function () {// Lấy tên khách hàng , địa chỉ , mst
            if ($("#latencanhan").is(":checked")) {
                $("#tencanhan").attr("disabled", false);
            } else {
                $("#tencanhan").attr("disabled", true);
            }
        });

        $("#latknganhang").change(function () {// Lấy tên khách hàng , địa chỉ , mst
            if ($("#latknganhang").is(":checked")) {
                $("#matknganhang").attr("disabled", false);
                $("#tentknganhang").attr("disabled", false);
            } else {
                $("#matknganhang").attr("disabled", true);
                $("#tentknganhang").attr("disabled", true);
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
                    if (ngaykhaithue_ngayghiso < 0 && date_khaithue == "") {
                        $("#ngaykhaithue").val(ngayghiso.val());
                    }
                } else {
                    if (ngaykhaithue_ngayhoadon < 0 && date_khaithue == "") {
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
                    if (ngaykhaithue_ngayghiso < 0 && date_khaithue == "") {
                        $("#ngaykhaithue").val(ngayghiso.val());
                    }
                } else {
                    if (ngaykhaithue_ngayhoadon < 0 && date_khaithue == "") {
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
            $("#latencanhan").attr("checked", false);
            $("#latknganhang").attr("checked", false);
            $("#lacongtrinh").attr("checked", false);
            $("#duandautu").attr("checked", false);
            $("#tencanhan").attr("disabled", true);
            $("#tencanhan").val("");
            $("#matknganhang").attr("disabled", true);
            $("#tentknganhang").attr("disabled", true);

            $("#matknganhang").val("");
            $("#tentknganhang").val("");
            $("#chungtuthamchieu").val("");

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
                if ($tkco == 112116)
                    $LoaiPhieu = 55;
                if ($tkco == 112117)
                    $LoaiPhieu = 57;
                if ($tkco == 112118)
                    $LoaiPhieu = 59;
                if ($tkco == 112119)
                    $LoaiPhieu = 61;
                if ($tkco == 112120)
                    $LoaiPhieu = 63;

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
                if ($tkco == 112116)
                    $LoaiPhieu = 56;
                if ($tkco == 112117)
                    $LoaiPhieu = 58;
                if ($tkco == 112118)
                    $LoaiPhieu = 60;
                if ($tkco == 112119)
                    $LoaiPhieu = 62;
                if ($tkco == 112120)
                    $LoaiPhieu = 64;

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

            }
            if($LoaiPhieu!=1){
                $("#hoadondientu").attr("disabled", true);
            }else{
                $("#hoadondientu").removeAttr("disabled");
            }
            if ($STT == "") {//Nếu số thứ tự null sẽ tạo số mới tự động tăng theo mã
                var $data;
                var $sophieu = 1;

                if(($tkco.toString().substring(0,3)!=111 && $tkco.toString().substring(0,3)!=112)){
                    alert("LỖI \n\n Không thể sử dụng tài khoản "+$tkco+" trong phiếu thu chi .");

                    tkco.focus();
                    return false;
                }

                function create() {
                    $.ajax({
                        url: $dir_module_ps_kt + "taomapskt.php",
                        async: false,
                        data: {lp: $LoaiPhieu},
                        success: function (response) {
                            $data = parseInt(response.trim());
                            STT.val(parseInt($data));
                        }
                    });
                    $.ajax({// Tạo số phiếu
                        url: $dir_module_ps_kt + "taosophieu.php",
                        data: {loaiphieu: $LoaiPhieu, mapskt: parseInt($data)},
                        async: false,
                        success: function (response) {
                            $sophieu = (response.trim());
                            sophieu.val($sophieu);
                            $("#ThamChieuTS").text("Tham chiếu: " + $sophieu);
                        }
                    });
                    $sottpsct = getSoTTPSKTMAX();
                    $("#sottpsct").val($sottpsct);
                }

                var number = Math.floor(Math.random() * 2000);
                setTimeout(create, number);


                $ngayghiso = layngayghiso($LoaiPhieu);
                $("#ngayghiso").val($ngayghiso.trim());
                $("#ngayhoadon").val("");

                //$("#makhachhang2").val("");
                //$("#tenkhachhang2").val("");
                /// $("#diachi2").val("");
                // $("#masothue2").val("");

                $("#congaykhaithue").attr("checked", false);
                $("#ngaykhaithue").val("");
                $("#loaihanghoadichvu").val(1);

                $("#sohoadon").val("");
                $("#chungtugoc").attr("checked", false);
                $("#chiphikhongloaitru").attr("checked", false);
                $('#hoadondientu option[value="1"]').removeAttr("disabled");
                $('#hoadondientu option[value="2"]').removeAttr("disabled");
                $('#hoadondientu option[value="3"]').removeAttr("disabled");
                $('#hoadondientu option[value="4"]').removeAttr("disabled");
                $('#hoadondientu option[value="8"]').removeAttr("disabled");
                $('#hoadondientu option[value="9"]').attr("disabled");
                $('#hoadondientu option[value="12"]').removeAttr("disabled");
                $("#TXTLoaiHoaDonDienTu").text("CHƯA LẬP HOÁ ĐƠN");

                $('#hoadondientu').val(0);
                HidenNgayThoaThuan();
                $("#cothuegtgt").attr("disabled", true);

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

                    if(($tkco.toString().substring(0,3)!=111 && $tkco.toString().substring(0,3)!=112)){
                        alert("LỖI \n\n Không thể sử dụng tài khoản "+$tkco+" trong phiếu thu chi .");
                        tkco.focus();
                        return false;
                    }

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
                                        $("#ThamChieuTS").text("Tham chiếu: " + $sottpsct);
                                        $("#chungtugoc").attr("checked", false);
                                        $("#ngayhoadon").val("");
                                        $("#congaykhaithue").attr("checked", false);
                                        $("#ngaykhaithue").val("");

                                        $("#makhachhang2").val("");
                                        $("#tenkhachhang2").val("");
                                        $("#diachi2").val("");
                                        $("#masothue2").val("");

                                        $("#sohoadon").val("");
                                        $("#chiphikhongloaitru").attr("checked", false);
                                        $("#loaihanghoadichvu").val(1);

                                        $('#hoadondientu').val(0);
                                        HidenNgayThoaThuan();


                                        $('#hoadondientu option[value="1"]').removeAttr("disabled");
                                        $('#hoadondientu option[value="2"]').removeAttr("disabled");
                                        $('#hoadondientu option[value="3"]').removeAttr("disabled");
                                        $('#hoadondientu option[value="4"]').removeAttr("disabled");
                                        $('#hoadondientu option[value="8"]').removeAttr("disabled");
                                        $('#hoadondientu option[value="9"]').attr("disabled");
                                        $('#hoadondientu option[value="12"]').removeAttr("disabled");
                                        $("#TXTLoaiHoaDonDienTu").text("CHƯA LẬP HOÁ ĐƠN");
                                        $("#cothuegtgt").attr("disabled", true);
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

                        $("#tencanhan").val($data.tencanhan);
                        $("#ChiNhanhCongTy").val($data.machinhanh);
                        sophieu.val($data.sophieu);
                        $("#ThamChieuTS").text("Tham chiếu: " + $data.sophieu+"");

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
                                            $("#ThamChieuTS").text("Tham chiếu: " + $sottpsct);
                                            $("#chungtugoc").attr("checked", false);
                                            $("#ngayhoadon").val("");
                                            $("#chiphikhongloaitru").attr("checked", false);
                                            $("#cothuegtgt").attr("disabled", true);
                                            $("#loaihanghoadichvu").val(1);
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
            $("#ThamChieuTS").text("Tham chiếu: " + $data.sott);
            kyhieu.val($data.seri);
            sohoadon.val($data.sct);
            ngayhoadon.val($data.ngayhoadon);

            $("#loaihanghoadichvu").val($data.loaihanghoadichvu);
            $("#chungtuthamchieu").val($data.chungtuthamchieu);
            makhachhang2.val($data.makhno);
            tenkhachhang2.val($data.tenkhachhang);
            $("#masothue2").val($data.masothuekh);
            diachi2.val($data.diachikh);
            if ($data.lacongtrinh == 1) {
                $("#lacongtrinh").attr("checked", true);
            } else {
                $("#lacongtrinh").attr("checked", false);
            }/////
            if ($data.duandautu == 1) {
                $("#duandautu").attr("checked", true);
            } else {
                $("#duandautu").attr("checked", false);
            }/////
            $cothuegtgt = $data.cothuegtgt;
            if ($cothuegtgt == 1) {
                cothuegtgt.attr("checked", true);
                $("#cothuegtgt").attr("disabled", true);
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

            $("#MaBiMatHoaDon").val($data.mabimat);

            $congaykhaithue = $data.congaykhaithue;
            if ($congaykhaithue == 1) {
                $("#congaykhaithue").attr("checked", true);
                $("#ngaykhaithue").attr("disabled", false);
            } else {
                $("#congaykhaithue").attr("checked", false);
                $("#ngaykhaithue").attr("disabled", true);
            }
            $("#ngaykhaithue").val($data.ngaykhaithue);

            $("#LoaiHoaDonDienTu").val($data.loaihddt);
            if ($data.loaihddt == 0) {
                $("#TXTLoaiHoaDonDienTu").text("CHƯA LẬP HOÁ ĐƠN");
                $('#hoadondientu option[value="1"]').removeAttr("disabled");
                $('#hoadondientu option[value="2"]').removeAttr("disabled");
                $('#hoadondientu option[value="3"]').removeAttr("disabled");
                $('#hoadondientu option[value="4"]').removeAttr("disabled");
                $('#hoadondientu option[value="8"]').removeAttr("disabled");
                $('#hoadondientu option[value="9"]').attr("disabled", "true");
            } else if ($data.loaihddt == 1) {

                $("#TXTLoaiHoaDonDienTu").text("HOÁ ĐƠN GỐC");
                $('#hoadondientu option[value="1"]').attr("disabled", "true");
                $('#hoadondientu option[value="2"]').attr("disabled", "true");
                $('#hoadondientu option[value="3"]').attr("disabled", "true");
                $('#hoadondientu option[value="4"]').removeAttr("disabled");
                $('#hoadondientu option[value="8"]').attr("disabled", "true");
                $('#hoadondientu option[value="9"]').attr("disabled", "true");
                $('#hoadondientu option[value="12"]').attr("disabled", "true");
                $('#hoadondientu option[value="13"]').attr("disabled", "true");
                $('#TXTLoaiHoaDonDienTu').css({"background-color": "blue", "font-size": "11px", "color": "white"});

            } else if ($data.loaihddt == 8) {

                $("#TXTLoaiHoaDonDienTu").text("HÓA ĐƠN NHÁP");
                $('#hoadondientu option[value="1"]').attr("disabled", "true");
                $('#hoadondientu option[value="2"]').attr("disabled", "true");
                $('#hoadondientu option[value="3"]').attr("disabled", "true");
                $('#hoadondientu option[value="4"]').attr("disabled", "true");
                $('#hoadondientu option[value="8"]').attr("disabled", "true");
                $('#hoadondientu option[value="12"]').attr("disabled", "true");
                $('#hoadondientu option[value="9"]').removeAttr("disabled");
                $('#hoadondientu option[value="13"]').removeAttr("disabled");
                $('#TXTLoaiHoaDonDienTu').css({"background-color": "yewllo", "font-size": "11px", "color": "white"});

            } else if ($data.loaihddt == 9) {
                $("#TXTLoaiHoaDonDienTu").text("HÓA ĐƠN GỐC");
                $('#hoadondientu option[value="1"]').attr("disabled", "true");
                $('#hoadondientu option[value="2"]').attr("disabled", "true");
                $('#hoadondientu option[value="3"]').attr("disabled", "true");
                $('#hoadondientu option[value="4"]').removeAttr("disabled", "true");
                $('#hoadondientu option[value="8"]').attr("disabled", "true");
                $('#hoadondientu option[value="9"]').attr("disabled", "true");
                $('#hoadondientu option[value="12"]').attr("disabled", "true");
                $('#hoadondientu option[value="13"]').attr("disabled", "true");
                $('#TXTLoaiHoaDonDienTu').css({"background-color": "blue", "font-size": "11px", "color": "white"});
            } else if ($data.loaihddt == 2) {
                $('#hoadondientu option[value="1"]').attr("disabled", "true");
                $('#hoadondientu option[value="2"]').attr("disabled", "true");
                $('#hoadondientu option[value="3"]').attr("disabled", "true");
                $('#hoadondientu option[value="4"]').attr("disabled", "true");
                $('#hoadondientu option[value="8"]').attr("disabled", "true");
                ///////// VIETTEL
                <?php
                if($_SESSION['nhacungcaphddt']=='viettel'){?>
                $("#TXTLoaiHoaDonDienTu").text("ĐIỀU CHỈNH TIỀN");
                $('#hoadondientu option[value="9"]').attr("disabled", "true");
                <?php
                }else if($_SESSION['nhacungcaphddt']=='bkav'){?>
                $("#TXTLoaiHoaDonDienTu").text("HOÁ ĐƠN ĐIỀU CHỈNH");
                $('#hoadondientu option[value="9"]').removeAttr("disabled", "true");
                <?php
                }
                ?>
                ///////// BKAV

                $('#hoadondientu option[value="12"]').attr("disabled", "true");
                $('#TXTLoaiHoaDonDienTu').css({"background-color": "yellow", "font-size": "11px", "color": "black"});

            } else if ($data.loaihddt == 3) {
                $("#TXTLoaiHoaDonDienTu").text("ĐIỀU CHỈNH TIỀN");
                $('#hoadondientu option[value="1"]').attr("disabled", "true");
                $('#hoadondientu option[value="2"]').attr("disabled", "true");
                $('#hoadondientu option[value="3"]').attr("disabled", "true");
                $('#hoadondientu option[value="4"]').attr("disabled", "true");
                $('#hoadondientu option[value="8"]').attr("disabled", "true");
                $('#hoadondientu option[value="9"]').attr("disabled", "true");
                ///////// VIETTEL
                <?php
                if($_SESSION['nhacungcaphddt']=='viettel'){?>
                $("#TXTLoaiHoaDonDienTu").text("ĐIỀU CHỈNH TIỀN");
                $('#hoadondientu option[value="9"]').attr("disabled", "true");
                <?php
                }else if($_SESSION['nhacungcaphddt']=='bkav'){?>
                $("#TXTLoaiHoaDonDienTu").text("HOÁ ĐƠN THAY THẾ");
                $('#hoadondientu option[value="9"]').removeAttr("disabled", "true");
                <?php
                }
                ?>
                ///////// BKAV
                $('#hoadondientu option[value="12"]').attr("disabled", "true");
                $('#TXTLoaiHoaDonDienTu').css({"background-color": "yellow", "font-size": "11px", "color": "black"});
            } else if ($data.loaihddt == 4) {
                $("#TXTLoaiHoaDonDienTu").text("HOÁ ĐƠN HUỶ");
                $('#hoadondientu option[value="1"]').attr("disabled", "true");
                $('#hoadondientu option[value="2"]').attr("disabled", "true");
                $('#hoadondientu option[value="3"]').attr("disabled", "true");
                $('#hoadondientu option[value="4"]').attr("disabled", "true");
                $('#hoadondientu option[value="8"]').attr("disabled", "true");
                $('#hoadondientu option[value="9"]').attr("disabled", "true");
                $('#hoadondientu option[value="12"]').attr("disabled", "true");
                $('#hoadondientu option[value="13"]').attr("disabled", "true");
                $('#TXTLoaiHoaDonDienTu').css({"background-color": "red", "font-size": "11px", "color": "white"});
            }else if ($data.loaihddt == 12) {
                $("#TXTLoaiHoaDonDienTu").text("ĐÃ CẤP SỐ - NHÁP");
                $('#hoadondientu option[value="1"]').attr("disabled", "true");
                $('#hoadondientu option[value="2"]').attr("disabled", "true");
                $('#hoadondientu option[value="3"]').attr("disabled", "true");
                $('#hoadondientu option[value="4"]').removeAttr("disabled", "true");
                $('#hoadondientu option[value="13"]').removeAttr("disabled", "true");
                $('#hoadondientu option[value="9"]').removeAttr("disabled", "true");
                $('#hoadondientu option[value="8"]').attr("disabled", "true");
                $('#hoadondientu option[value="12"]').attr("disabled", "true");
                $('#TXTLoaiHoaDonDienTu').css({"background-color": "blue", "font-size": "11px", "color": "white"});
            }
            $("#hoadondientu").val("0");

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

            ghichu.val($data.chuthich);

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
            if (event.keyCode == Keys.ENTER || event.keyCode == Keys.TAB) { //
                notReadonlyInput();
                readonlySubmitSTT();
                $RSTT = checkSTT(STT);
                if($RSTT==false){
                    return false;
                }
                STT.attr("disabled", true);
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
            $("#ngaykhaithue").attr("disabled", true);


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
            //$("#cothuegtgt").attr("disabled", false);

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
            $loitk = true;
            if(($tkco.substring(0,3)!=111 && $tkco.substring(0,3)!=112) && $loitk ){
                alert("Không thể sử dụng tài khoản "+$tkco+" trong phiếu thu chi .");
                tkco.focus();
                $loitk = false;
                valid = false;
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
                if ($tkco == 112116)
                    $LoaiPhieu = 55;
                if ($tkco == 112117)
                    $LoaiPhieu = 57;
                if ($tkco == 112118)
                    $LoaiPhieu = 59;
                if ($tkco == 112119)
                    $LoaiPhieu = 61;
                if ($tkco == 112120)
                    $LoaiPhieu = 63;

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
                if ($tkco == 112116)
                    $LoaiPhieu = 56;
                if ($tkco == 112117)
                    $LoaiPhieu = 58;
                if ($tkco == 112118)
                    $LoaiPhieu = 60;
                if ($tkco == 112119)
                    $LoaiPhieu = 62;
                if ($tkco == 112120)
                    $LoaiPhieu = 64;

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

                valid = valid && checkNull(tkco, " Mã tài khoản ");
                valid = valid && checkNull(makhachhang, " Mã khách hàng ");
                valid = valid && checkNull($('#tenkhachhang'), " Tên khách hàng  ");

                valid = valid && checkNull(ngayghiso, " Ngày ghi sổ ");
                $loaict = 1;
                $loaict = $("#loaict").val();
                if ($loaict == 1 || $loaict == 2) {
                    valid = valid && checkNull(mauso, " Mẫu số hoá đơn  ");
                    var Reg_MauSo = new RegExp("^[0-9a-zA-Z_./-]{0,14}$");
                    valid = valid && checkRegexp(mauso, Reg_MauSo, " Mẫu số hoá đơn không được có khoảng trắng .");
                    valid = valid && checkNull(kyhieu, " Ký hiệu hoá đơn  ");
                    valid = valid && checkNull(sohoadon, " Số hoá đơn  ");

                    valid = valid && checkNull($('#makhachhang2'), " Mã khách hàng trên hóa ");
                    valid = valid && checkNull($('#tenkhachhang2'), " Tên khách hàng trên hóa ");
                    valid = valid && checkNull($('#diachi2'), " Địa chỉ khách hàng trên hóa ");
                }

                $masothue = masothue.val().trim();
                if($masothue!=""){
                    var Reg_masothue = new RegExp("^[0-9-]{10,14}$");
                    valid = valid && checkRegexp(masothue,Reg_masothue, " Mã số thuế không đúng định dạng .");
                }

                valid = valid && checkNull(ngayhoadon, " Ngày hoá đơn  ");
                valid = valid && checkNull($('#ngaykhaithue'), " Ngày khai thuế  ");

                valid = valid && checkNull(manoidung1, " Mã nội dung ");
                valid = valid && checkNull(mabophan, " Mã bộ phận ");
                valid = valid && checkNull(tkno1, " Mã tài khoản ");
                valid = valid && checkNull(sotien1, " Số tiền ");
                $SoTien2 = $('#sotien2').val().trim();
                if($SoTien2!="" && $SoTien2!=0){
                    valid = valid && checkNull($('#manoidung2'), " Nội dung ");
                    valid = valid && checkNull($('#tkno2'), " Tài khoản ");
                }

                valid = valid && checkNull($('#ChiNhanhCongTy'), " Chi nhánh ");

                valid = valid && checkChonCapTongHop('matk','matkcha',$('#tkco'),'Mã tài khoản ');
                valid = valid && checkChonCapTongHop('matk','matkcha',$('#tkno1'),'Mã tài khoản ');
                valid = valid && checkChonCapTongHop('matk','matkcha',$('#tkno2'),'Mã tài khoản ');
                valid = valid && checkChonCapTongHop('makh','makhcha',$('#makhachhang'),'Mã khách hàng ');
                if (checkSoHoaDonTrung().trim() != "K") {
                    $thongbao = checkSoHoaDonTrung();
                    var result = confirm($thongbao);
                    if (result) {
                    } else {
                        return false;
                        $("#sohoadon").focus();
                    }
                }

                if (checkSoHoaDonTrung_Vuot($LoaiPhieu).trim() != "K") {
                    $thongbao = checkSoHoaDonTrung_Vuot($LoaiPhieu);
                    var result1 = confirm($thongbao);
                    if (result1) {
                    } else {
                        return false;
                        $("#sohoadon").focus();
                    }
                }

                var date_hoadon = new Date($("#ngayhoadon").val());
                var date_ghiso = new Date($("#ngayghiso").val());

                var ngayghiso_ngayhoadon = (date_ghiso.getTime() - date_hoadon.getTime());
                if (ngayghiso_ngayhoadon < 0) {
                    $thongbao = "";
                    $thongbao = "CHÚ Ý \n\n Ngày ghi sổ hạch toán trước ngày hóa đơn . Tiền thuế GTGT sẽ được hạch toán theo ngày hóa đơn hoặc ngày khai thuế . \n\n Bạn có muốn tiếp tục không ?";
                    var result1 = confirm($thongbao);
                    if (!result1) {
                        return false;
                    }
                }

                if (($tkco == $tkno1 && $tkco != "" && $tkno1 != "") || ($tkco == $tkno2 && $tkco != "" && $tkno2 != "")) {
                    $thongbao = "";
                    $thongbao = "CẢNH BÁO \n\n Tài khoản đối ứng giống nhau . Bạn có muốn tiếp tục không ?";
                    var result1 = confirm($thongbao);
                    if (!result1) {
                        return false;
                    }
                }

                if (($LoaiPhieu % 2) == 0 && $("#chonloaisp").val() == 0 && ($tkco.substring(0,3) == 621 || $tkco.substring(0,3) == 622 || $tkco.substring(0,3) == 623 || $tkco.substring(0,3) == 627 || $tkno1.substring(0,3) == 621 || $tkno1.substring(0,3) == 622 || $tkno1.substring(0,3) == 623 || $tkno1.substring(0,3) == 627 || $tkno2.substring(0,3) == 621 || $tkno2.substring(0,3) == 622 || $tkno2.substring(0,3) == 623 || $tkno2.substring(0,3) == 627)) {
                    alert("Tài khoản bạn chọn có liên quan đến SẢN PHẨM hoặc CÔNG TRÌNH. \nVui lòng chọn loại SẢN PHẨM hoặc CÔNG TRÌNH trong phiếu !");
                    $("#chonloaisp").focus();
                    return false;
                }

                $LoaiCT = loaict.val().trim();

                var $congaykhaithue = 0;
                if ($("#congaykhaithue").is(":checked")) {
                    $congaykhaithue = 1;
                }
                var $ngaykhithue = $("#ngaykhaithue").val();

                $hoadondientu = $("#hoadondientu").val();
                $loaihoadondientu = 0;
                if('<?php echo $_SESSION['nhacungcaphddt']; ?>'=='viettel') {////// HOÁ ĐƠN ĐIỆN TỬ CỦA VIETTEL
                    if ("<?php echo $_SESSION['thietlaphddt'] ?>" == "1") {
                        if (valid && $LoaiPhieu == 1 && ($LoaiCT == '1' || $LoaiCT == '2') && $hoadondientu != 0 && $hoadondientu != 9 && $loaitokhai == '1' && "<?php echo $_SESSION['txt_hddt_tendangnhap'] ?>" != "" && "<?php echo $_SESSION['txt_hddt_matkhau'] ?>" != "" && "<?php echo $_SESSION['txt_hddt_duongdan'] ?>" != "") {// Nếu là phiếu chi và loại chứng từ là thuế GTGT thì thực hiện lập hoá đơn điện tử
                            $res = {
                                "errorCode": "INVOICE_ISSUED_DATE_INVALID",
                                "description": "Không kết nối được tới máy chủ !"
                            }

                            $latendonvi = $("#lacongtrinh").is(":checked");
                            if ($latendonvi == false && $("#masothue2").val().trim() == "" && $hoadondientu != 4) {// Cảnh báo khi xuất hóa đơn điện tử khi không có MST
                                $thongbao = "";
                                $thongbao = "CẢNH BÁO \n\n Bạn đang chuẩn bị xuất hóa đơn điện tử với thông tin hiển thị ở vị trí [HỌ TÊN NGƯỜI MUA HÀNG].\n\n Bạn có muốn tiếp tục không ?";
                                var result1 = confirm($thongbao);
                                if (!result1) {
                                    return false;
                                }
                            }

                            $loaihoadondientu = $("#hoadondientu").val();
                            var $VanBanThoaThuan = $("#vanbanthoathuan").val();
                            var $NgayLapVanBan = $("#ngaythoathuan").val();
                            $NgayLapVanBan = $NgayLapVanBan.split("-");

                            var $NgayHoaDon = $("#ngayhoadon").val();
                            $NgayHoaDon = $NgayHoaDon.split("-");

                            var newDate = $NgayHoaDon[1] + "," + $NgayHoaDon[2] + "," + $NgayHoaDon[0] + " 00:00:00";
                            var newDateNVB = $NgayLapVanBan[1] + "," + $NgayLapVanBan[2] + "," + $NgayLapVanBan[0] + " 00:00:00";
                            $NgayLapHoaDon = ((new Date(newDate).getTime()));
                            $NgayLapHoaDonCu = ((new Date(newDateNVB).getTime()));
                            $latendonvi = $("#lacongtrinh").is(":checked");

                            $tencanhan = "";
                            $tendonvi = "";
                            if ($("#masothue2").val().trim() == "" && $latendonvi == false) {
                                $tencanhan = $("#tenkhachhang2").val().trim().split("&#039;").join("'");
                            } else {
                                $tendonvi = $("#tenkhachhang2").val().trim().split("&#039;").join("'");
                                $tencanhan = $("#tencanhan").val().trim();
                            }
                            $phantramthue = $("#thuesuat1").val();
                            if ($phantramthue == 'K' || $phantramthue == 'k') {
                                $phantramthue = -2;
                            }else if ($phantramthue == '0'){
                                $phantramthue = 0;
                            }else if ($phantramthue == '5'){
                                $phantramthue = 5;
                                $ThueSuatGiamTheoNghiQuyet = giam30theonghidinh();
                                if($ThueSuatGiamTheoNghiQuyet=='0.7'){
                                    $phantramthue = 3.5;
                                }
                            }else if ($phantramthue == '10'){
                                $phantramthue = 10;
                                $ThueSuatGiamTheoNghiQuyet = giam30theonghidinh();
                                if($ThueSuatGiamTheoNghiQuyet=='0.7'){
                                    $phantramthue = 7;
                                }else if($ThueSuatGiamTheoNghiQuyet=='0.8'){
                                    $phantramthue = 8;// Thuế suất viettel dự đoán là 8, Khi có công văn sẽ sửa sao
                                }
                            }
                            if ($hoadondientu == '1' || $hoadondientu == '8') {// Lập hoá đơn gốc
                                $MauHoaDon = $("#mauso").val().length;
                                if($MauHoaDon>6){
                                    $invoiceType = $("#mauso").val().substr(0, 6);
                                }else{
                                    $invoiceType = $("#mauso").val().substr(0, 1);
                                }
                                var $data = {
                                    "generalInvoiceInfo": {
                                        "invoiceType": $invoiceType,
                                        "templateCode": $("#mauso").val(),
                                        "invoiceSeries": $("#kyhieu").val().trim().toUpperCase(),
                                        "transactionUuid": $("#sophieu").val().trim(),
                                        "invoiceIssuedDate": $NgayLapHoaDon,
                                        "currencyCode": "VND",
                                        "adjustmentType": "1",
                                        "paymentStatus": true,
                                        "paymentType": "TM/CK",
                                        "paymentTypeName": "TM/CK",
                                        "cusGetInvoiceRight": true,
                                        "buyerIdNo": $("#makhachhang2").val(),
                                        "buyerIdType": "1"
                                    },
                                    "buyerInfo": {
                                        "buyerName": $tencanhan,
                                        "buyerLegalName": $tendonvi,
                                        "buyerTaxCode": $("#masothue2").val(),
                                        "buyerAddressLine": $("#diachi2").val(),
                                        "buyerPhoneNumber": "",
                                        "buyerEmail": "",
                                        "buyerIdNo": $("#makhachhang2").val(),
                                        "buyerIdType": "1",
                                        "buyerBankAccount": $("#matknganhang").val().trim(),
                                        "buyerBankName": $("#tentknganhang").val().trim()
                                    },
                                    "sellerInfo": {
                                        "sellerLegalName": "<?php echo $_SESSION['TenCongTy']; ?>",
                                        "sellerTaxCode": "<?php echo $_SESSION['MST']; ?>",
                                        "sellerAddressLine": "<?php echo $_SESSION['DiaChi']; ?>",
                                        "sellerPhoneNumber": "<?php echo $_SESSION['DienThoai']; ?>",
                                        "sellerEmail": "<?php echo $_SESSION['Email']; ?>",
                                        "sellerBankName": "<?php echo $_SESSION['txt_tennganhang']; ?>",
                                        "sellerBankAccount": "<?php echo $_SESSION['txt_sotaikhoan']; ?>"
                                    },
                                    "extAttribute": [],
                                    "payments": [
                                        {
                                            "paymentMethodName": "TM/CK"
                                        }
                                    ],
                                    "deliveryInfo": {},
                                    "itemInfo": [
                                        {
                                            "lineNumber": 1,
                                            "itemCode": $("#manoidung1").val().trim(),
                                            "itemName": $("#noidung1").val().trim(),
                                            "unitName": "",// Đơn vị tính
                                            "itemTotalAmountWithoutTax": Math.abs($("#sotien1").val().toString().split(",").join("")),
                                            "itemTotalAmountWithTax": Math.abs($("#sotien1").val().toString().split(",").join("")) + Math.abs($("#sotien2").val().toString().split(",").join("")),
                                            "taxPercentage": $phantramthue,
                                            "taxAmount": Math.abs($("#sotien2").val().toString().split(",").join("")),
                                            "discount": 0.0,
                                            "itemDiscount": 0.0
                                        }
                                    ],
                                    "discountItemInfo": [],
                                    "summarizeInfo": {
                                        "sumOfTotalLineAmountWithoutTax": Math.abs($("#sotien1").val().toString().split(",").join("")),
                                        "totalAmountWithoutTax": Math.abs($("#sotien1").val().toString().split(",").join("")),
                                        "totalTaxAmount": Math.abs($("#sotien2").val().toString().split(",").join("")),
                                        "totalAmountWithTax": Math.abs($("#tongtien").val().toString().split(",").join("")),
                                        "totalAmountWithTaxInWords": "",
                                        "discountAmount": 0.0,
                                        "taxPercentage": $phantramthue
                                    },
                                    "taxBreakdowns": [
                                        {
                                            "taxPercentage": $phantramthue,
                                            "taxableAmount": Math.abs($("#sotien1").val().toString().split(",").join("")),
                                            "taxAmount": Math.abs($("#sotien2").val().toString().split(",").join(""))
                                        }
                                    ]
                                };
                                $res = $.parseJSON(LapHoaDonDienTu($hoadondientu, $data));

                            }

                            if ($res.errorCode != "") {
                                $alert = alert($res.description + " .");
                                valid = false;
                            } else {
                                if ($hoadondientu != 4) {
                                    $("#MaBiMatHoaDon").val($res.result['reservationCode']);
                                    $("#LoaiHoaDonDienTu").val($hoadondientu);
                                    $invoiceNo = $res.result['invoiceNo'];
                                    $kyhieu = $invoiceNo.slice(0, 6);
                                    $sohoadon = $invoiceNo.slice(6);
                                    $("#kyhieu").val($kyhieu);
                                    if ($sohoadon != '0000000') {
                                        $("#sohoadon").val($sohoadon);
                                    }
                                    if ($hoadondientu == 8) {
                                        alert("THÔNG BÁO \n HOÁ ĐƠN ĐIỆN TỬ LẬP NHÁP THÀNH CÔNG. VUI LÒNG KÝ SỐ TRÊN HỆ THỐNG PHẦN MỀM NHÀ CUNG CẤP DỊCH VỤ.");
                                    } else {
                                        alert("THÔNG BÁO \n HOÁ ĐƠN ĐIỆN TỬ LẬP THÀNH CÔNG VỚI MÃ SỐ BÍ MẬT : " + $res.result['reservationCode'] + " VÀ SỐ HOÁ ĐƠN : " + $res.result['invoiceNo']);
                                    }
                                } else {
                                    $("#btnxoa").trigger("click");
                                }
                            }
                        }
                    }
                    if ($("#hoadondientu").val() == '9') {
                        $loaihoadondientu = 1;
                        if ($("#sohoadon").val().trim() == 0) {
                            alert("CẢNH BÁO\nCHƯA CẬP NHẬT LẠI SỐ HÓA ĐƠN CHO HÓA ĐƠN ĐIỆN TỬ NÀY. \n VUI LÒNG CẬP NHẬT LẠI SỐ HÓA ĐƠN NÀY.");
                            $("#sohoadon").focus();
                            return false;
                        }
                    }
                }else if('<?php echo $_SESSION['nhacungcaphddt']; ?>'=='bkav') {////// HOÁ ĐƠN ĐIỆN TỬ CỦA BKAV
                    if (valid && $LoaiPhieu == 1 && ($loaict == '1' || $loaict == '2') && $hoadondientu != 0 && $loaitokhai == '1' && "<?php echo $_SESSION['thietlaphddt'] ?>" == "1" && "<?php echo $_SESSION['txt_hddt_tendangnhap'] ?>" != "" && "<?php echo $_SESSION['txt_hddt_matkhau'] ?>" != "" && "<?php echo $_SESSION['txt_hddt_duongdan'] ?>" != "") {// Nếu là phiếu chi và loại chứng từ là thuế GTGT thì thực hiện lập hoá đơn điện tử
                        $res = {
                            "errorCode": "INVOICE_ISSUED_DATE_INVALID",
                            "description": "Không kết nối được tới máy chủ !"
                        }

                        $latendonvi = $("#lacongtrinh").is(":checked");
                        if ($latendonvi == false && $("#masothue").val().trim() == "" && $hoadondientu != 4) {// Cảnh báo khi xuất hóa đơn điện tử khi không có MST
                            $thongbao = "";
                            $thongbao = "CẢNH BÁO \n\n Bạn đang chuẩn bị xuất hóa đơn điện tử với thông tin hiển thị ở vị trí [HỌ TÊN NGƯỜI MUA HÀNG].\n\n Bạn có muốn tiếp tục không ?";
                            var result1 = confirm($thongbao);
                            if (!result1) {
                                return false;
                            }
                        }

                        $loaihoadondientu = $("#hoadondientu").val();
                        $ThanhToan = "TM/CK";

                        var arrobjchitiet = [];
                        $phantramthue = 0;

                        var objchitiet = new Object();

                        $phantramthue = $("#thuesuat1").val().trim();
                        if($loaict==1){
                            if (($phantramthue == 'K' || $phantramthue == 'k')) {
                                $phantramthue = 4;
                            }else if ($phantramthue == '0'){
                                $phantramthue = 1;
                            }else if ($phantramthue == '5'){
                                $phantramthue = 2;
                                $ThueSuatGiamTheoNghiQuyet = giam30theonghidinh();
                                if($ThueSuatGiamTheoNghiQuyet=='0.7'){
                                    $phantramthue = 7;
                                }
                            }else if ($phantramthue == '8'){
                                $phantramthue = 9;
                            }else if ($phantramthue == '10'){
                                $phantramthue = 3;
                                $ThueSuatGiamTheoNghiQuyet = giam30theonghidinh();
                                if($ThueSuatGiamTheoNghiQuyet=='0.7'){
                                    $phantramthue = 8;
                                }else if($ThueSuatGiamTheoNghiQuyet=='0.8'){
                                    $phantramthue = 9;// Thuế suất BKAV dự đoán là 9, Khi có công văn sẽ sửa sao
                                }
                            }
                        }else if($loaict==2){
                            $phantramthue = 4;
                        }
                        var $soluongnhap = 0;
                        var $donggianhap = 0;
                        $donvitinh = "";
                        if ($soluongnhap == "") {
                            $donvitinh = "";
                        }
                        objchitiet.itemName = $("#noidung1").val().trim();
                        objchitiet.unitName = $donvitinh;

                        if ($soluongnhap != "") {
                            objchitiet.Qty = $soluongnhap;
                            objchitiet.Price = $donggianhap;
                        }
                        $IsIncrease=null;
                        if($hoadondientu==3){
                            if($("#sotien1").val().toString().split(",").join("")>=0){
                                $IsIncrease=true;
                            }else{
                                $IsIncrease=false;
                            }
                        }

                        objchitiet.Amount = Math.abs($("#sotien1").val().toString().split(",").join(""));
                        objchitiet.TaxRateID = $phantramthue,
                            objchitiet.TaxAmount = Math.abs($("#sotien2").val().toString().split(",").join("")),
                            objchitiet.IsDiscount = false;
                        objchitiet.IsIncrease = $IsIncrease;
                        objchitiet.ItemTypeID=  0;
                        arrobjchitiet.push(objchitiet);

                        var $VanBanThoaThuan = $("#vanbanthoathuan").val();
                        var $NgayLapVanBan = $("#ngaythoathuan").val();
                        $NgayLapVanBan = $NgayLapVanBan.split("-");

                        var $NgayHoaDon = $("#ngayhoadon").val();
                        $NgayHoaDon = $NgayHoaDon.split("-");

                        var newDate = $NgayHoaDon[1] + "," + $NgayHoaDon[2] + "," + $NgayHoaDon[0] + " 07:00:00";
                        var newDateNVB = $NgayLapVanBan[1] + "," + $NgayLapVanBan[2] + "," + $NgayLapVanBan[0] + " 07:00:00";
                        $NgayLapHoaDon = ((new Date(newDate).toISOString()));
                        $NgayLapHoaDonCu = ((new Date(newDateNVB).toISOString()));

                        $latendonvi = $("#lacongtrinh").is(":checked");
                        $tencanhan = "";
                        $tendonvi = "";
                        if ($("#masothue2").val().trim() == "" && $latendonvi == false) {
                            $tencanhan = $("#tenkhachhang2").val().trim().split("&#039;").join("'");
                        } else {
                            $tendonvi = $("#tenkhachhang2").val().trim().split("&#039;").join("'");
                            $tencanhan = $("#tencanhan").val().trim();
                        }
                        if ($hoadondientu == '1' || $hoadondientu == '12') {// Lập hoá đơn gốc
                            var $data = {
                                "CmdType":112,
                                "CommandObject":[
                                    {
                                        "Invoice":{
                                            "InvoiceTypeID":$LoaiCT,
                                            "InvoiceDate":$NgayLapHoaDon,
                                            "BuyerName":$tencanhan,
                                            "BuyerTaxCode":$("#masothue2").val(),
                                            "BuyerUnitName":$tendonvi,
                                            "BuyerAddress":$("#diachi2").val(),
                                            "BuyerBankAccount": $("#matknganhang").val().trim()+"-"+$("#tentknganhang").val().trim(),
                                            "PayMethodID":3,
                                            "ReceiveTypeID":4,
                                            "ReceiverEmail":"",
                                            "ReceiverMobile":"",
                                            "ReceiverAddress":"",
                                            "ReceiverName":"",
                                            "Note":"",
                                            "BillCode":"",
                                            "CurrencyID":"VND",
                                            "ExchangeRate":1.0,
                                            "InvoiceForm":$("#mauso").val().toUpperCase(),
                                            "InvoiceSerial":$("#kyhieu").val().toUpperCase(),
                                            "InvoiceNo":0,
                                            "OriginalInvoiceIdentify":""
                                        },
                                        "ListInvoiceDetailsWS":arrobjchitiet,
                                        "ListInvoiceAttachFileWS":[
                                            {
                                                "FileName":"Test",
                                                "FileExtension":"docx",
                                                "FileContent":""
                                            },
                                            {
                                                "FileName":"Test",
                                                "FileExtension":"docx",
                                                "FileContent":""
                                            }
                                        ],
                                        "PartnerInvoiceID":$("#sophieu").val().trim(),
                                        "PartnerInvoiceStringID":'',
                                    }
                                ]
                            };
                            $res = $.parseJSON(LapHoaDonDienTu_bkav($hoadondientu, $data));

                        }else if ($hoadondientu == '2') {  /// Hoá đơn điều chỉnh
                            var $data = {
                                "CmdType":121,
                                "CommandObject":[
                                    {
                                        "Invoice":{
                                            "InvoiceTypeID":$LoaiCT,
                                            "InvoiceDate":$NgayLapHoaDon,
                                            "BuyerName":$tencanhan,
                                            "BuyerTaxCode":$("#masothue2").val(),
                                            "BuyerUnitName":$tendonvi,
                                            "BuyerAddress":$("#diachi2").val(),
                                            "BuyerBankAccount": $("#matknganhang").val().trim()+"-"+$("#tentknganhang").val().trim(),
                                            "PayMethodID":3,
                                            "ReceiveTypeID":4,
                                            "ReceiverEmail":"",
                                            "ReceiverMobile":"",
                                            "ReceiverAddress":"",
                                            "ReceiverName":"",
                                            "Note":"",
                                            "BillCode":"",
                                            "CurrencyID":"VND",
                                            "ExchangeRate":1.0,
                                            "InvoiceForm":$("#mauso").val().toUpperCase(),
                                            "InvoiceSerial":$("#kyhieu").val().toUpperCase(),
                                            "InvoiceNo":0,
                                            "OriginalInvoiceIdentify":$VanBanThoaThuan //// [01GTKT0/001]_[AB/19E]_[0000001]" Hoá đơn gốc cần chỉnh sửa hoặc thay thế
                                        },
                                        "ListInvoiceDetailsWS":arrobjchitiet,
                                        "ListInvoiceAttachFileWS":[
                                            {
                                                "FileName":"Test",
                                                "FileExtension":"docx",
                                                "FileContent":""
                                            },
                                            {
                                                "FileName":"Test",
                                                "FileExtension":"docx",
                                                "FileContent":""
                                            }
                                        ],
                                        "PartnerInvoiceID":$("#sophieu").val().trim(),
                                        "PartnerInvoiceStringID":'',
                                    }
                                ]
                            };
                            $res = $.parseJSON(LapHoaDonDienTu_bkav($hoadondientu, $data));

                        }else if ($hoadondientu == '3') {  //Hoá đơn thay thế
                            var $data = {
                                "CmdType":120,
                                "CommandObject":[
                                    {
                                        "Invoice":{
                                            "InvoiceTypeID":$LoaiCT,
                                            "InvoiceDate":$NgayLapHoaDon,
                                            "BuyerName":$tencanhan,
                                            "BuyerTaxCode":$("#masothue2").val(),
                                            "BuyerUnitName":$tendonvi,
                                            "BuyerAddress":$("#diachi2").val(),
                                            "BuyerBankAccount": $("#matknganhang").val().trim()+"-"+$("#tentknganhang").val().trim(),
                                            "PayMethodID":3,
                                            "ReceiveTypeID":4,
                                            "ReceiverEmail":"",
                                            "ReceiverMobile":"",
                                            "ReceiverAddress":"",
                                            "ReceiverName":"",
                                            "Note":"",
                                            "BillCode":"",
                                            "CurrencyID":"VND",
                                            "ExchangeRate":1.0,
                                            "InvoiceForm":$("#mauso").val().toUpperCase(),
                                            "InvoiceSerial":$("#kyhieu").val().toUpperCase(),
                                            "InvoiceNo":0,
                                            "OriginalInvoiceIdentify":$VanBanThoaThuan //// [01GTKT0/001]_[AB/19E]_[0000001]" Hoá đơn gốc cần chỉnh sửa hoặc thay thế
                                        },
                                        "ListInvoiceDetailsWS":arrobjchitiet,
                                        "ListInvoiceAttachFileWS":[
                                            {
                                                "FileName":"Test",
                                                "FileExtension":"docx",
                                                "FileContent":""
                                            },
                                            {
                                                "FileName":"Test",
                                                "FileExtension":"docx",
                                                "FileContent":""
                                            }
                                        ],
                                        "PartnerInvoiceID":$("#sophieu").val().trim(),
                                        "PartnerInvoiceStringID":'',
                                    }
                                ]
                            };
                            $res = $.parseJSON(LapHoaDonDienTu_bkav($hoadondientu, $data));

                        } else if ($hoadondientu == '13') {// Lập hoá đơn gốc
                            var $data = {
                                "CmdType":200,
                                "CommandObject":[
                                    {
                                        "Invoice":{
                                            "InvoiceTypeID":$LoaiCT,
                                            "InvoiceDate":$NgayLapHoaDon,
                                            "BuyerName":$tencanhan,
                                            "BuyerTaxCode":$("#masothue2").val(),
                                            "BuyerUnitName":$tendonvi,
                                            "BuyerAddress":$("#diachi2").val(),
                                            "BuyerBankAccount": $("#matknganhang").val().trim()+"-"+$("#tentknganhang").val().trim(),
                                            "PayMethodID":3,
                                            "ReceiveTypeID":4,
                                            "ReceiverEmail":"",
                                            "ReceiverMobile":"",
                                            "ReceiverAddress":"",
                                            "ReceiverName":"",
                                            "Note":"",
                                            "BillCode":"",
                                            "CurrencyID":"VND",
                                            "ExchangeRate":1.0,
                                            "InvoiceForm":$("#mauso").val().toUpperCase(),
                                            "InvoiceSerial":$("#kyhieu").val().toUpperCase(),
                                            "InvoiceNo":0,
                                            "OriginalInvoiceIdentify":""
                                        },
                                        "ListInvoiceDetailsWS":arrobjchitiet,
                                        "ListInvoiceAttachFileWS":[
                                            {
                                                "FileName":"Test",
                                                "FileExtension":"docx",
                                                "FileContent":""
                                            },
                                            {
                                                "FileName":"Test",
                                                "FileExtension":"docx",
                                                "FileContent":""
                                            }
                                        ],
                                        "PartnerInvoiceID":$("#sophieu").val().trim(),
                                        "PartnerInvoiceStringID":'',
                                    }
                                ]
                            };
                            $res = $.parseJSON(LapHoaDonDienTu_bkav($hoadondientu, $data));

                        }else if ($hoadondientu == '9') {// Lập hoá đơn gốc
                            var $data = {
                                "CmdType":800,
                                "CommandObject":$("#sophieu").val().trim(),
                            };
                            $res = $.parseJSON(LapHoaDonDienTu_bkav($hoadondientu, $data));

                        }else if ($hoadondientu == '8'){/////// Lập nháp hoá đơn tiện tử
                            var $data = {
                                "CmdType":100,
                                "CommandObject":[
                                    {
                                        "Invoice":{
                                            "InvoiceTypeID":$LoaiCT,
                                            "InvoiceDate":$NgayLapHoaDon,
                                            "BuyerName":$tencanhan,
                                            "BuyerTaxCode":$("#masothue2").val(),
                                            "BuyerUnitName":$tendonvi,
                                            "BuyerAddress":$("#diachi2").val(),
                                            "BuyerBankAccount": $("#matknganhang").val().trim()+"-"+$("#tentknganhang").val().trim(),
                                            "PayMethodID":3,
                                            "ReceiveTypeID":4,
                                            "ReceiverEmail":"",
                                            "ReceiverMobile":"",
                                            "ReceiverAddress":"",
                                            "ReceiverName":"",
                                            "Note":"",
                                            "BillCode":"",
                                            "CurrencyID":"VND",
                                            "ExchangeRate":1.0,
                                            "InvoiceForm":$("#mauso").val().toUpperCase(),
                                            "InvoiceSerial":$("#kyhieu").val().toUpperCase(),
                                            "InvoiceNo":0,
                                            "OriginalInvoiceIdentify":""
                                        },
                                        "ListInvoiceDetailsWS":arrobjchitiet,
                                        "ListInvoiceAttachFileWS":[
                                            {
                                                "FileName":"Test",
                                                "FileExtension":"docx",
                                                "FileContent":""
                                            },
                                            {
                                                "FileName":"Test",
                                                "FileExtension":"docx",
                                                "FileContent":""
                                            }
                                        ],
                                        "PartnerInvoiceID":$("#sophieu").val().trim(),
                                        "PartnerInvoiceStringID":'',
                                    }
                                ]
                            };
                            $res = $.parseJSON(LapHoaDonDienTu_bkav($hoadondientu, $data));
                        } else if ($hoadondientu == '4') {
                            var $data = {
                                "CmdType": 202,
                                "CommandObject": [{
                                    "PartnerInvoiceID": $("#sophieu").val().trim(),
                                    "PartnerInvoiceStringID": ""
                                }]
                            }

                            $res = $.parseJSON(LapHoaDonDienTu_bkav(4, $data));

                        }

                        if ($res.errorCode != null) {
                            $alert = alert($res.description + " .");
                            valid = false;
                        } else {
                            if ($hoadondientu != 4) {
                                $("#MaBiMatHoaDon").val($res.result['reservationCode']);
                                $("#LoaiHoaDonDienTu").val($hoadondientu);
                                $invoiceNo = $res.result['invoiceNo'];
                                $kyhieu = $invoiceNo.slice(0, 6);
                                $sohoadon = $invoiceNo.slice(6, 13);
                                $("#kyhieu").val($kyhieu);
                                if ($sohoadon != '0000000') {
                                    $("#sohoadon").val($sohoadon);
                                }
                                if ($hoadondientu == 8) {
                                    alert("THÔNG BÁO \n HOÁ ĐƠN ĐIỆN TỬ LẬP NHÁP THÀNH CÔNG. VUI LÒNG KÝ SỐ TRÊN HỆ THỐNG PHẦN MỀM NHÀ CUNG CẤP DỊCH VỤ.");
                                } else {
                                    alert("THÔNG BÁO \n HOÁ ĐƠN ĐIỆN TỬ LẬP THÀNH CÔNG VỚI MÃ SỐ BÍ MẬT : " + $res.result['reservationCode'] + " VÀ SỐ HOÁ ĐƠN : " + $res.result['invoiceNo']);
                                }
                            }
                        }
                    }
                }else if('<?php echo $_SESSION['nhacungcaphddt']; ?>'=='vnpt'){
                    if ("<?php echo $_SESSION['thietlaphddt'] ?>" == "1") {
                        if (valid && $LoaiPhieu == 1 && ($LoaiCT == '1' || $LoaiCT == '2') && $hoadondientu != 0 && $hoadondientu != 9 && $loaitokhai == '1' && "<?php echo $_SESSION['txt_hddt_tendangnhap'] ?>" != "" && "<?php echo $_SESSION['txt_hddt_matkhau'] ?>" != "" && "<?php echo $_SESSION['txt_hddt_duongdan'] ?>" != "") {// Nếu là phiếu chi và loại chứng từ là thuế GTGT thì thực hiện lập hoá đơn điện tử
                            $res = {
                                "errorCode": "INVOICE_ISSUED_DATE_INVALID",
                                "description": "Không kết nối được tới máy chủ !"
                            }

                            $latendonvi = $("#lacongtrinh").is(":checked");
                            if ($latendonvi == false && $("#masothue2").val().trim() == "" && $hoadondientu != 4) {// Cảnh báo khi xuất hóa đơn điện tử khi không có MST
                                $thongbao = "";
                                $thongbao = "CẢNH BÁO \n\n Bạn đang chuẩn bị xuất hóa đơn điện tử với thông tin hiển thị ở vị trí [HỌ TÊN NGƯỜI MUA HÀNG].\n\n Bạn có muốn tiếp tục không ?";
                                var result1 = confirm($thongbao);
                                if (!result1) {
                                    return false;
                                }
                            }

                            $loaihoadondientu = $("#hoadondientu").val();
                            var $VanBanThoaThuan = $("#vanbanthoathuan").val();
                            var $NgayLapVanBan = $("#ngaythoathuan").val();
                            $NgayLapVanBan = $NgayLapVanBan.split("-");

                            var $NgayHoaDon = $("#ngayhoadon").val();
                            $NgayHoaDon_ChuyenDoi = new Date($NgayHoaDon);

                            var dHD = $NgayHoaDon_ChuyenDoi.getDate();
                            var mHD = $NgayHoaDon_ChuyenDoi.getMonth() + 1; //Month from 0 to 11
                            var yHD = $NgayHoaDon_ChuyenDoi.getFullYear();

                            var $NgayLapHoaDon = (dHD <= 9 ? '0' + dHD : dHD)  + "/" + ((mHD<=9 ? '0' + mHD : mHD)) + "/" + yHD;
                            var $NgayLapHoaDonCu = $NgayLapVanBan[1] + "/" + $NgayLapVanBan[2] + "/" + $NgayLapVanBan[0];
                            //$NgayLapHoaDon = ((new Date(newDate).getTime()));
                            //$NgayLapHoaDonCu = ((new Date(newDateNVB).getTime()));
                            $latendonvi = $("#lacongtrinh").is(":checked");

                            $tencanhan = "";
                            $tendonvi = "";
                            if ($("#masothue2").val().trim() == "" && $latendonvi == false) {
                                $tencanhan = $("#tenkhachhang2").val().trim().split("&#039;").join("'");
                            } else {
                                $tendonvi = $("#tenkhachhang2").val().trim().split("&#039;").join("'");
                                $tencanhan = $("#tencanhan").val().trim();
                            }
                            $phantramthue = $("#thuesuat1").val();
                            if ($phantramthue == 'K' || $phantramthue == 'k') {
                                $phantramthue = -2;
                            }else if ($phantramthue == '0'){
                                $phantramthue = 0;
                            }else if ($phantramthue == '5'){
                                $phantramthue = 5;
                                $ThueSuatGiamTheoNghiQuyet = giam30theonghidinh();
                                if($ThueSuatGiamTheoNghiQuyet=='0.7'){
                                    $phantramthue = 3.5;
                                }
                            }else if ($phantramthue == '10'){
                                $phantramthue = 10;
                                $ThueSuatGiamTheoNghiQuyet = giam30theonghidinh();
                                if($ThueSuatGiamTheoNghiQuyet=='0.7'){
                                    $phantramthue = 7;
                                }else if($ThueSuatGiamTheoNghiQuyet=='0.8'){
                                    $phantramthue = 8;// Thuế suất viettel dự đoán là 8, Khi có công văn sẽ sửa sao
                                }
                            }
                            if ($hoadondientu == '1' || $hoadondientu == '8') {// Lập hoá đơn gốc
                                var $data = "<soap:Envelope xmlns:xsi=\"http://www.w3.org/2001/XMLSchema-instance\" xmlns:xsd=\"http://www.w3.org/2001/XMLSchema\" xmlns:soap=\"http://schemas.xmlsoap.org/soap/envelope/\">"+
                                    "  <soap:Body>"+
                                    "    <ImportInvByPattern xmlns=\"http://tempuri.org/\">"+
                                    "      <Account><?php echo $_SESSION['txt_PartnerGUID']; ?></Account>"+
                                    "      <ACpass><?php echo $_SESSION['txt_hddt_matkhau']; ?></ACpass>"+
                                    "      <xmlInvData><![CDATA[<Invoices>" +
                                    "<Inv>" +
                                    "<key>"+$("#sophieu").val().trim()+"</key>" +
                                    "<Invoice>" +
                                    "<CusCode>"+$("#makhachhang2").val()+"</CusCode>" +
                                    "<CusName>"+$tendonvi+"</CusName>" +
                                    "<Buyer>"+$tencanhan+"</Buyer>" +
                                    "<CusAddress>"+$("#diachi2").val()+"</CusAddress>" +
                                    "<CusPhone></CusPhone><CusTaxCode>"+$("#masothue2").val()+"</CusTaxCode>" +
                                    "<PaymentMethod>TM/CK</PaymentMethod>" +
                                    "<KindOfService/>" +
                                    "<CusBankNo>"+$("#matknganhang").val().trim()+"</CusBankNo>" +
                                    "<Extra></Extra>" +
                                    "<Products>" +
                                    "<Product>" +
                                    "<Remark>1</Remark>" +
                                    "<ProdName>"+$("#noidung1").val().trim()+"</ProdName>" +
                                    "<ProdUnit></ProdUnit>" +
                                    "<ProdQuantity></ProdQuantity>" +
                                    "<ProdPrice></ProdPrice>" +
                                    "<Extra2></Extra2>" +
                                    "<Total>"+Math.abs($("#sotien1").val().toString().split(",").join(""))+"</Total>" +
                                    "</Product>" +
                                    "</Products>" +
                                    "<VATAmount>"+Math.abs($("#sotien2").val().toString().split(",").join(""))+"</VATAmount>" +
                                    "<VATRate>"+$phantramthue+"</VATRate>" +
                                    "<Total>"+Math.abs($("#sotien1").val().toString().split(",").join(""))+"</Total>" +
                                    "<Amount>"+Math.abs($("#tongtien").val().toString().split(",").join(""))+"</Amount>" +
                                    "<AmountInWords>"+DOCSO.doc(Math.abs($("#tongtien").val().toString().split(",").join("")))+"</AmountInWords>" +
                                    "<ArisingDate>"+$NgayLapHoaDon+"</ArisingDate>" +
                                    "<PaymentStatus>1</PaymentStatus>" +
                                    "</Invoice>" +
                                    "</Inv>" +
                                    "</Invoices>" +
                                    "      ]]></xmlInvData>"+
                                    "      <username><?php echo $_SESSION['txt_hddt_tendangnhap']; ?></username>"+
                                    "      <password><?php echo $_SESSION['txt_hddt_matkhau']; ?></password>"+
                                    "      <pattern>"+$("#mauso").val().toUpperCase()+"</pattern>"+
                                    "      <serial>"+$("#kyhieu").val().trim().toUpperCase()+"</serial>"+
                                    "      <convert>0</convert>"+
                                    "    </ImportInvByPattern>"+
                                    "  </soap:Body>"+
                                    "</soap:Envelope>";
                                $res = $.parseJSON(LapHoaDonDienTu_vnpt($hoadondientu, $data));

                            }

                            if ($res.errorCode != null) {
                                $alert = alert($res.description + " .");
                                valid = false;
                            } else {
                                if ($hoadondientu != 4) {
                                    $("#MaBiMatHoaDon").val($res.result['reservationCode']);
                                    $("#LoaiHoaDonDienTu").val($hoadondientu);
                                    $invoiceNo = $res.result['invoiceNo'];
                                    $kyhieu = $invoiceNo.slice(0, 6);
                                    $sohoadon = $invoiceNo.slice(6, 13);
                                    $("#kyhieu").val($kyhieu);
                                    if ($sohoadon != '0000000') {
                                        $("#sohoadon").val($sohoadon);
                                    }
                                    if ($hoadondientu == 8) {
                                        alert("THÔNG BÁO \n HOÁ ĐƠN ĐIỆN TỬ LẬP NHÁP THÀNH CÔNG. VUI LÒNG KÝ SỐ TRÊN HỆ THỐNG PHẦN MỀM NHÀ CUNG CẤP DỊCH VỤ.");
                                    } else {
                                        alert("THÔNG BÁO \n HOÁ ĐƠN ĐIỆN TỬ LẬP THÀNH CÔNG VỚI MÃ SỐ BÍ MẬT : " + $res.result['reservationCode'] + " VÀ SỐ HOÁ ĐƠN : " + $res.result['invoiceNo']);
                                    }
                                } else {
                                    $("#btnxoa").trigger("click");
                                }
                            }
                        }
                    }
                    if ($("#hoadondientu").val() == '9') {
                        $loaihoadondientu = 1;
                        if ($("#sohoadon").val().trim() == 0) {
                            alert("CẢNH BÁO\nCHƯA CẬP NHẬT LẠI SỐ HÓA ĐƠN CHO HÓA ĐƠN ĐIỆN TỬ NÀY. \n VUI LÒNG CẬP NHẬT LẠI SỐ HÓA ĐƠN NÀY.");
                            $("#sohoadon").focus();
                            return false;
                        }
                    }
                }else if('<?php echo $_SESSION['nhacungcaphddt']; ?>'=='misa') {////// HOÁ ĐƠN ĐIỆN TỬ CỦA MISA
                    if ("<?php echo $_SESSION['thietlaphddt'] ?>" == "1") {
                        if (valid && $LoaiPhieu == 1 && ($LoaiCT == '1' || $LoaiCT == '2') && $hoadondientu != 0 && $hoadondientu != 9 && $loaitokhai == '1' && "<?php echo $_SESSION['txt_hddt_tendangnhap'] ?>" != "" && "<?php echo $_SESSION['txt_hddt_matkhau'] ?>" != "" && "<?php echo $_SESSION['txt_hddt_duongdan'] ?>" != "") {// Nếu là phiếu chi và loại chứng từ là thuế GTGT thì thực hiện lập hoá đơn điện tử
                            $res = {
                                "errorCode": "INVOICE_ISSUED_DATE_INVALID",
                                "description": "Không kết nối được tới máy chủ !"
                            }

                            $latendonvi = $("#lacongtrinh").is(":checked");
                            if ($latendonvi == false && $("#masothue2").val().trim() == "" && $hoadondientu != 4) {// Cảnh báo khi xuất hóa đơn điện tử khi không có MST
                                $thongbao = "";
                                $thongbao = "CẢNH BÁO \n\n Bạn đang chuẩn bị xuất hóa đơn điện tử với thông tin hiển thị ở vị trí [HỌ TÊN NGƯỜI MUA HÀNG].\n\n Bạn có muốn tiếp tục không ?";
                                var result1 = confirm($thongbao);
                                if (!result1) {
                                    return false;
                                }
                            }

                            $loaihoadondientu = $("#hoadondientu").val();
                            var $VanBanThoaThuan = $("#vanbanthoathuan").val();
                            var $NgayLapVanBan = $("#ngaythoathuan").val();
                            $NgayLapVanBan = $NgayLapVanBan.split("-");

                            var $NgayHoaDon = $("#ngayhoadon").val();
                            //$NgayHoaDon = $NgayHoaDon.split("-");

                            var newDate = $NgayHoaDon[1] + "," + $NgayHoaDon[2] + "," + $NgayHoaDon[0] + " 00:00:00";
                            var newDateNVB = $NgayLapVanBan[1] + "," + $NgayLapVanBan[2] + "," + $NgayLapVanBan[0] + " 00:00:00";
                            $NgayLapHoaDon = $NgayHoaDon;
                            $NgayLapHoaDonCu = ((new Date(newDateNVB).getTime()));
                            $latendonvi = $("#lacongtrinh").is(":checked");

                            $tencanhan = "";
                            $tendonvi = "";
                            if ($("#masothue2").val().trim() == "" && $latendonvi == false) {
                                $tencanhan = $("#tenkhachhang2").val().trim().split("&#039;").join("'");
                            } else {
                                $tendonvi = $("#tenkhachhang2").val().trim().split("&#039;").join("'");
                                $tencanhan = $("#tencanhan").val().trim();
                            }
                            $phantramthue = $("#thuesuat1").val();
                            $sottpsct = $("#sottpsct").val();

                            if ($phantramthue == 'K' || $phantramthue == 'k') {
                                $phantramthue = -1;
                            }else if ($phantramthue == '0'){
                                $phantramthue = 0;
                            }else if ($phantramthue == '5'){
                                $phantramthue = 5;
                                $ThueSuatGiamTheoNghiQuyet = giam30theonghidinh();
                                if($ThueSuatGiamTheoNghiQuyet=='0.7'){
                                    $phantramthue = 3.5;
                                }
                            }else if ($phantramthue == '10'){
                                $phantramthue = 10;
                                $ThueSuatGiamTheoNghiQuyet = giam30theonghidinh();
                                if($ThueSuatGiamTheoNghiQuyet=='0.7'){
                                    $phantramthue = 7;
                                }else if($ThueSuatGiamTheoNghiQuyet=='0.8'){
                                    $phantramthue = 8;// Thuế suất viettel dự đoán là 8, Khi có công văn sẽ sửa sao
                                }
                            }
                            if ($hoadondientu == '1' || $hoadondientu == '8') {// Lập hoá đơn gốc
                                $MauHoaDon = $("#mauso").val().length;
                                if($MauHoaDon>6){
                                    $invoiceType = $("#mauso").val().substr(0, 6);
                                }else{
                                    $invoiceType = $("#mauso").val().substr(0, 1);
                                }
                                var $data = [
                                                {
                                                "RefID": $("#sophieu").val().trim(),
                                                "CompanyID": "<?php echo $_SESSION['CompanyID']; ?>",
                                                "OrganizationUnitID": "<?php echo $_SESSION['OrganizationUnitID']; ?>",
                                                "SourceType": 0,
                                                "InvTemplateNo": $invoiceType,
                                                "InvoiceType": $invoiceType,
                                                "InvSeries": $invoiceType+$("#kyhieu").val().trim().toUpperCase(),
                                                "InvDate": $NgayLapHoaDon,
                                                "InvNo": "<Chưa cấp số>",
                                                "PublishStatus": 0,
                                                "AccountObjectID": "",
                                                "AccountObjectTaxCode": $("#masothue2").val(),
                                                "AccountObjectName": $tendonvi,
                                                "AccountObjectCode": $("#makhachhang2").val(),
                                                "AccountObjectAddress": $("#diachi2").val(),
                                                "ContactName": $tencanhan,
                                                "ReceiverName": "",
                                                "SendInvoiceStatus": 0,
                                                "SendNumber": 0,
                                                "IsInvoiceReceipted": false,
                                                "PaymentMethod": "TM/CK",
                                                "CurrencyCode": "VND",
                                                "CurrencyID": "VND",
                                                "ExchangeRate": 1.0,
                                                "DiscountRate": 0.0,
                                                "IsMoreVATRate": true,
                                                "VATRate": 10.0,
                                                "TotalSaleAmountOC": Math.abs($("#sotien1").val().toString().split(",").join("")),
                                                "TotalSaleAmount": Math.abs($("#sotien1").val().toString().split(",").join("")),
                                                "TotalAmountWithoutVAT": Math.abs($("#sotien1").val().toString().split(",").join("")),
                                                "TotalAmountWithoutVATOC": Math.abs($("#sotien1").val().toString().split(",").join("")),
                                                "TotalVATAmountOC": Math.abs($("#sotien2").val().toString().split(",").join("")),
                                                "TotalVATAmount": Math.abs($("#sotien2").val().toString().split(",").join("")),
                                                "TotalAmountOC": Math.abs($("#tongtien").val().toString().split(",").join("")),
                                                "TotalAmount": Math.abs($("#tongtien").val().toString().split(",").join("")),
                                                "TotalDiscountAmount": 0.0,
                                                "TotalDiscountAmountOC": 0.0,
                                                "EInvoiceStatus": 1,
                                                "IsInvoiceDiscount": false,
                                                "TypeDiscount": 0,
                                                "SortOrder": 0,
                                                "IsInvoiceDeleted": false,
                                                "InvoiceTemplateID": "<?php echo $_SESSION['InvoiceTemplateID']; ?>",
                                                "UserID": "<?php echo $_SESSION['UserIDMS']; ?>",
                                                "EditVersion": 0,
                                                "InvoiceDetails":[
                                                    {
                                                        "RefDetailID":$sottpsct,
                                                        "RefID" :  $("#sophieu").val().trim(),
                                                        "Description" : $("#noidung1").val().trim(),
                                                        "UnitName" : "",
                                                        "Quantity" : "",
                                                        "UnitPrice" : "",
                                                        "AmountOC" : Math.abs($("#sotien1").val().toString().split(",").join("")),
                                                        "Amount" : Math.abs($("#sotien1").val().toString().split(",").join("")),
                                                        "DiscountRate" : 0.0,
                                                        "DiscountAmountOC" : 0.0,
                                                        "DiscountAmount" :  0.0,
                                                        "VATRate" : $phantramthue,
                                                        "VATAmountOC" :  Math.abs($("#sotien2").val().toString().split(",").join("")),
                                                        "VATAmount" :  Math.abs($("#sotien2").val().toString().split(",").join("")),
                                                        "SortOrder" : 1,
                                                        "IsPromotion" : false,
                                                        "InventoryItemType" : 0,
                                                        "SortOrderView" : 1
                                                    }
                                                ]
                                            }
                                    ];
                                $res = $.parseJSON(LapHoaDonDienTu_misa($hoadondientu, $data));

                            }

                            if ($res.errorCode != "") {
                                $alert = alert($res.description + " .");
                                valid = false;
                            } else {
                                if ($hoadondientu != 4) {
                                    $("#MaBiMatHoaDon").val($res.result['reservationCode']);
                                    $("#LoaiHoaDonDienTu").val($hoadondientu);
                                    $invoiceNo = $res.result['invoiceNo'];
                                    $kyhieu = $invoiceNo.slice(0, 6);
                                    $sohoadon = $invoiceNo.slice(6);
                                    $("#kyhieu").val($kyhieu);
                                    if ($sohoadon != '0000000') {
                                        $("#sohoadon").val($sohoadon);
                                    }
                                    if ($hoadondientu == 8) {
                                        alert("THÔNG BÁO \n HOÁ ĐƠN ĐIỆN TỬ LẬP NHÁP THÀNH CÔNG. VUI LÒNG KÝ SỐ TRÊN HỆ THỐNG PHẦN MỀM NHÀ CUNG CẤP DỊCH VỤ.");
                                    } else {
                                        alert("THÔNG BÁO \n HOÁ ĐƠN ĐIỆN TỬ LẬP THÀNH CÔNG VỚI MÃ SỐ BÍ MẬT : " + $res.result['reservationCode'] + " VÀ SỐ HOÁ ĐƠN : " + $res.result['invoiceNo']);
                                    }
                                } else {
                                    $("#btnxoa").trigger("click");
                                }
                            }
                        }
                    }
                    if ($("#hoadondientu").val() == '9') {
                        $loaihoadondientu = 1;
                        if ($("#sohoadon").val().trim() == 0) {
                            alert("CẢNH BÁO\nCHƯA CẬP NHẬT LẠI SỐ HÓA ĐƠN CHO HÓA ĐƠN ĐIỆN TỬ NÀY. \n VUI LÒNG CẬP NHẬT LẠI SỐ HÓA ĐƠN NÀY.");
                            $("#sohoadon").focus();
                            return false;
                        }
                    }
                }// hết hoá đơn MISA

                $mauso = mauso.val().trim().toUpperCase();
                $kyhieu = kyhieu.val().trim().toUpperCase();
                $tencanhan = $("#tencanhan").val().trim();
                $LaCongTrinh = 0;
                if ($("#lacongtrinh").is(":checked")) {
                    $LaCongTrinh = 1;
                }
                $DuAnDauTu = 0;
                if ($("#duandautu").is(":checked")) {
                    $DuAnDauTu = 1;
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
                            kyhieu: $kyhieu,
                            mauso: $mauso,
                            sohoadon: sohoadon.val().trim(),
                            ngayhoadon: ngayhoadon.val().trim(),

                            btnmakh: btnmakh.val().trim(),
                            makhachhang: makhachhang.val().trim(),
                            tenkhachhang: tenkhachhang.val().trim(),
                            diachi: diachi.val().trim(),
                            masothue: masothue.val().trim(),

                            btnmakh2: btnmakh2.val().trim(),
                            masothue2: $("#masothue2").val().trim(),
                            makhachhang2: makhachhang2.val().trim(),
                            tenkhachhang2: tenkhachhang2.val().trim(),
                            diachi2: diachi2.val().trim(),
                            mangsang: mangsang.val().trim(),

                            mabophan: mabophan.val().trim(),
                            bophan: bophan.val().trim(),

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
                            mabimat: $("#MaBiMatHoaDon").val(),
                            loaihddt: $loaihoadondientu,
                            congaykhaithue: $congaykhaithue,
                            ngaykhaithue: $ngaykhithue,
                            loaihanghoadichvu: $("#loaihanghoadichvu").val(),
                            chungtuthamchieu: $("#chungtuthamchieu").val(),
                            tencanhan:$tencanhan,
                            lacongtrinh:$LaCongTrinh,
                            duandautu:$DuAnDauTu,
                            chinhanh:$("#ChiNhanhCongTy").val()
                        },
                        success: function (result) {
                            $sottthamchieutaisan = 0;
                            if(<?php echo $_SESSION['NienDo'] ?>>2023){
                                $sottthamchieutaisan = $("#sottpsct").val().trim();
                            }else{
                                $sottthamchieutaisan = $("#sophieu").val().trim();
                            }
                            if ($LoaiPhieu%2==0 && (tkno1.val().trim().substring(0,3) == "211"|| tkno2.val().trim().substring(0,3) == "211" || (tkno1.val().trim().substring(0,3) == "242") || (tkno1.val().trim().substring(0,3) == "241") || tkno1.val().trim() == "1562")) {
                                if ((tkno1.val().trim().substring(0,3) == "211" || tkno2.val().trim().substring(0,3) == "211")) {
                                    if (window.confirm("Số liệu phát sinh này liên quan đến tài sản cố định . \n Muốn hiển thị cửa sổ nhập tài sản ?")) {
                                        xoadialog_phieuthuchi();
                                        $('.dialog_main_tangtaisan').load('form/frm_tangtaisan.php?sottphieukhac=' + $sottthamchieutaisan + '&form=frm_phieuthuchi&nguyengia=' + sotien1.val().trim() + '&tk=' + tkno1.val().trim() + '&ngayghiso=' + ngayghiso.val().trim());

                                    } else {
                                        if ($('.dialog_main_thongbao').html() == "") { // copy
                                            $('.dialog_main_thongbao').load('form/frm_thongbao_thuchi.php?loaiphieu=' + $LoaiPhieu + '&ngayhd=' + ngayhoadon.val().trim() + '&sophieu=' + sophieu.val().trim() + '&mapskt=' + STT.val().trim() + '&invoiceNo=' + $kyhieu + '' + $("#sohoadon").val().trim() + '&mabimat=' + $("#MaBiMatHoaDon").val() + '&mauso=' + $mauso);
                                        }
                                    }
                                } else if ((tkno1.val().trim().substring(0,3) == "242")) {// Nếu có phát sinh công cụ , dụng cụ
                                    if (window.confirm("Số liệu phát sinh nànày liên quan đến công cụ dụng cụ . \n Muốn hiển thị cửa sổ nhập công cụ dụng cụ ?")) {
                                        xoadialog_phieuthuchi();
                                        $('.dialog_main_tangtaisan').load('form/frm_tang_chiphi_tratruoc.php?sottphieukhac=' + $sottthamchieutaisan + '&form=frm_phieuthuchi&nguyengia=' + sotien1.val().trim() + '&tk=' + tkno1.val().trim() + '&ngayghiso=' + ngayghiso.val().trim());

                                    } else {
                                        if ($('.dialog_main_thongbao').html() == "") { // copy
                                            $('.dialog_main_thongbao').load('form/frm_thongbao_thuchi.php?loaiphieu=' + $LoaiPhieu + '&ngayhd=' + ngayhoadon.val().trim() + '&sophieu=' + sophieu.val().trim() + '&mapskt=' + STT.val().trim() + '&invoiceNo=' + $kyhieu + '' + $("#sohoadon").val().trim() + '&mabimat=' + $("#MaBiMatHoaDon").val() + '&mauso=' + $mauso);
                                        }
                                    }
                                } else if ((tkno1.val().trim().substring(0,3) == "241")) {// Nếu có phát sinh công cụ , dụng cụ
                                    if (window.confirm("Số liệu phát sinh này liên quan đến xây dựng cơ bản dở dang . \n Muốn hiển thị cửa sổ nhập xây dựng cơ bản dở dang ?")) {
                                        xoadialog_phieuthuchi();
                                        $('.dialog_main_tangtaisan').load('form/frm_tang_xdcoban_dodang.php?sottphieukhac=' + $sottthamchieutaisan + '&form=frm_phieuthuchi&nguyengia=' + sotien1.val().trim() + '&tk=' + tkno1.val().trim() + '&ngayghiso=' + ngayghiso.val().trim());

                                    } else {
                                        if ($('.dialog_main_thongbao').html() == "") { // copy
                                            $('.dialog_main_thongbao').load('form/frm_thongbao_thuchi.php?loaiphieu=' + $LoaiPhieu + '&ngayhd=' + ngayhoadon.val().trim() + '&sophieu=' + sophieu.val().trim() + '&mapskt=' + STT.val().trim() + '&invoiceNo=' + $kyhieu + '' + $("#sohoadon").val().trim() + '&mabimat=' + $("#MaBiMatHoaDon").val() + '&mauso=' + $mauso);
                                        }
                                    }
                                }else if ((tkno1.val().trim() == "1562")) {// Nếu có phát sinh công cụ , dụng cụ
                                    if (window.confirm("Số liệu phát sinh này liên quan đến chi phí mua hàng . \n Muốn hiển thị cửa sổ chi tiết từng mặt hàng ?")) {
                                        $('.dialog_main_thongbao').load('form/frm_thongbao_thuchi.php?loaiphieu=' + $LoaiPhieu + '&ngayhd=' + ngayhoadon.val().trim() + '&sophieu=' + sophieu.val().trim() + '&mapskt=' + STT.val().trim() + '&invoiceNo=' + $kyhieu + '' + $("#sohoadon").val().trim() + '&mabimat=' + $("#MaBiMatHoaDon").val() + '&mauso=' + $mauso);

                                        $('.dialog_main_mavt').load('form/frm_dm_mavt_chitiet.php?sottpsct=' + sottpsct.val().trim());
                                    } else {
                                        if ($('.dialog_main_thongbao').html() == "") { // copy
                                            $('.dialog_main_thongbao').load('form/frm_thongbao_thuchi.php?loaiphieu=' + $LoaiPhieu + '&ngayhd=' + ngayhoadon.val().trim() + '&sophieu=' + sophieu.val().trim() + '&mapskt=' + STT.val().trim() + '&invoiceNo=' + $kyhieu + '' + $("#sohoadon").val().trim() + '&mabimat=' + $("#MaBiMatHoaDon").val() + '&mauso=' + $mauso);
                                        }
                                    }
                                } else {
                                    if ($('.dialog_main_thongbao').html() == "") { // copy
                                        $('.dialog_main_thongbao').load('form/frm_thongbao_thuchi.php?loaiphieu=' + $LoaiPhieu + '&ngayhd=' + ngayhoadon.val().trim() + '&sophieu=' + sophieu.val().trim() + '&mapskt=' + STT.val().trim() + '&invoiceNo=' + $kyhieu + '' + $("#sohoadon").val().trim() + '&mabimat=' + $("#MaBiMatHoaDon").val() + '&mauso=' + $mauso);
                                    }
                                }
                            } else {
                                if ($('.dialog_main_thongbao').html() == "") { // copy
                                    $('.dialog_main_thongbao').load('form/frm_thongbao_thuchi.php?loaiphieu=' + $LoaiPhieu + '&ngayhd=' + ngayhoadon.val().trim() + '&sophieu=' + sophieu.val().trim() + '&mapskt=' + STT.val().trim() + '&invoiceNo=' + $kyhieu + '' + $("#sohoadon").val().trim() + '&mabimat=' + $("#MaBiMatHoaDon").val() + '&mauso=' + $mauso);
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