<?php
unset($_SESSION['NHAPKHOCT']);
$sottphieukhac = $_GET['sottphieukhac'];
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
<div id="dialog-tangtaisan" title="GIẢM TÀI SẢN CỐ ĐỊNH (F8: XOÁ PHIẾU)">
    <p class="validateTips"> </p>
    <form method="post" id="Form-chinh" enctype="multipart/form-data">
        <fieldset style="background-color: #afd9ee">
            <table class="table-dialog" style="vertical-align: middle;width: 100%" border="0">
                <tr>
                    <td width="56%" style="padding: 2px" colspan="2"><span style="padding: 2px;text-align:right">
                      <input type="button" name="btnstt" id="btnstt" class="button" value="Số TT..."/>
                        <input type="number" name="STT" id="STT" min="1" value="" style="width: 40%"
                               placeholder="Số TT" class="text ui-widget-content ui-corner-all"/>
                        <input type="hidden" name="sophieu" id="sophieu" value="" style="width: 100%"
                               placeholder="Số TT" class="text ui-widget-content ui-corner-all"/>
						<input type='hidden' id='dangthem'/>
                    </td>
                    <td width="17%" style="padding: 2px"><label for="name13"> Ngày ghi sổ :</label></td>
                    <td width="27%"><span style="padding: 2px">
                      <input type="date" name="ngayghiso" value="<?php echo date("Y-m-d") ?>" style="width:97%" id="ngayghiso"
                               required="require"
                               placeholder="Ngày ghi sổ" class="text ui-widget-content ui-corner-all"/>
                    </span></td>

                </tr>
                 <tr>
                 <td width="17%" style="padding: 2px"><label for="name13"> Tham chiếu :</label></td>
                    <td width="56%" style="padding: 2px"><span style="padding: 2px;text-align:right">
                      <input type="text" name="thamchieu" id="thamchieu" min="1" value="" style="width: 90%"
                               placeholder="Tham chiếu" class="text ui-widget-content ui-corner-all"/></td>
                         
                               
                   <td width="17%" style="padding: 2px"><label for="name13"> Ngày :</label></td>
                    <td width="27%"><span style="padding: 2px">
                      <input type="date" name="ngay" value="<?php echo date("Y-m-d") ?>" style="width:97%" id="ngay"
                               required="require"
                               placeholder="Ngày ghi sổ" class="text ui-widget-content ui-corner-all"/>
                    </span></td>

                </tr>
            </table>
        </fieldset>
        <fieldset style="background-color: #afd9ee">

            <table class="table-dialog" style="vertical-align: middle;width: 100%" border="0">
                <tr>
                  <td style="padding: 2px"><label for="name"> Nội dung</label></td>
                  <td style="padding: 2px"><input type="hidden" name="btnnoidung" id="btnnoidung"
                                                                class="button" value="..."/>
                    <input type="text" name="manoidung" value="_ATS04" list="listmanoidung" id="manoidung" required="required" style="width: 20%"
                               placeholder="Mã nội dung" class="text ui-widget-content ui-corner-all" />
                               <datalist id="listmanoidung"></datalist>
                    <input name="noidung" type="text" value="Giảm do thanh lý, nhượng bán" disabled="disabled" required="required" class="text ui-widget-content ui-corner-all" id="noidung"
                               placeholder="Nội dung" style="width: 75%"/>
                    <input type="hidden" id="tknond"/>
                    <input type="hidden" id="tcnond"/></td>
                </tr>
                <tr>
                    <td style="padding: 2px">
                        <select class="text ui-widget-content ui-corner-all" id="chonloaisp"
                                style="width: 100%;height:20px;">
                            <option value="">Không có SP/CT</option>
                            <option value="SP">Sản Phẩm</option>
                            <option value="CT">Công Trình</option>
                        </select></td>
                    <td style="padding: 2px">
                        <input type="hidden" name="btnmakho" id="btnmakho"
                               class="button" value="..."/>
                        <input type="text" name="makho" value="0001" list="listmabophan" id="makho" required
                               style="width: 20%"
                               placeholder="Mã Bộ Phận" class="text ui-widget-content ui-corner-all"/>
                        <datalist id="listmabophan"></datalist>
                        <input name="tenkho" type="text" disabled="disabled" required
                               class="text ui-widget-content ui-corner-all" id="tenkho"
                               placeholder="Bộ Phận" style="width: 75%" value="Toàn bộ"/></td>
                </tr>
            </table>
        </fieldset>

      <fieldset style="background-color: #afd9ee">
        <legend>Tài sản cố định</legend>

          <table width="100%" border="0">
             
               <tr>
                  <td><label for="name11">Tài sản:</label></td>
                  <td colspan="5"><input name="mataisan" type="text" disabled="disabled"
                               class="text ui-widget-content ui-corner-all" id="mataisan" style="width: 20%" value=""/>
                  <input name="tentaisan" type="text"
                               class="text ui-widget-content ui-corner-all" id="tentaisan" style="width: 80%" value=""/></td>
                  <td width="22%"><span style="padding: 0px">
                    <input type="button" name="btntimtaisan" id="btntimtaisan"
                                                                class="button" value="Tìm tài sản"/>
                  </span></td>
              </tr>
              <tr>
                  <td><label for="name5">Tài khoản :</label></td>
                  <td width="13%"><input name="matk" type="text"
                               class="text ui-widget-content ui-corner-all" id="matk" style="width: 70%" value=""/></td>
                               <td width="13%">&nbsp;</td>
                                <td width="16%"><label for="name17">Nhóm TS:</label></td>
                  <td colspan="3"><span style="padding: 2px">
                               <select style="width: 98%;height:20px;" id="NhomTS" class="text ui-widget-content ui-corner-all">
                                 <option value="2111">Nhà cửa, vật kiến trúc</option>
                                 <option value="2112">Máy móc, thiết bị</option>
                                 <option value="2113">Phương tiện vận tải, truyền dẫn</option>
                                 <option value="2114">Thiết bị, dụng cụ quản lý</option>
                                 <option value="2115">Cây lâu năm, súc vật làm việc và cho sản phẩm</option>
                                 <option value="2118">TSCĐ khác</option>
                                 <option value="2131">Quyền sử dụng đất</option>
                                 <option value="2132">Quyền phát hành</option>
                                 <option value="2133">Bản quyền, bằng sáng chế</option>
                                 <option value="2134">Nhãn hiệu, tên thương mại</option>
                                 <option value="2135">Chương trình phần mềm</option>
                                 <option value="2136">Giấy phép và giấy phép nhượng quyền</option>
                                 <option value="2138">TSCĐ vô hình khác</option>
                               </select>
                <datalist id="listNhomTS"></datalist></td>
              </tr>
              <tr>
                  <td width="11%"><label for="name4"> Công suất:</label></td>
                  <td colspan="2"><input type="text" name="congsuat" id="congsuat" value="" style="width: 100%"
                               class="text ui-widget-content ui-corner-all"/></td>
                  <td>&nbsp;</td>
                  <td colspan="2"><label for="name18">Nước SX:</label></td>
                  <td><input type="text" name="nuocsanxuat" id="nuocsanxuat" value="" style="width: 100%"
                               class="text ui-widget-content ui-corner-all"/></td>
              </tr>
              <tr>
                  <td><label for="name3"> ĐV Tính:</label></td>
                  <td ><input type="text" name="donvitinh" id="donvitinh" value="" style="width: 100%"
                               class="text ui-widget-content ui-corner-all"/></td>
                                <td><label for="name5">Số lượng:</label></td>
                  <td><input type="text" name="soluong" id="soluong" value="" style="width: 100%"
                               class="text ui-widget-content ui-corner-all"/></td>
                  <td width="19%"><label for="name16">Ngày sử dụng :</label></td>
                  <td colspan="2"><span style="padding: 2px">
                    <input type="date" name="ngaysudung" value="<?php echo date("Y-m-d") ?>" style="width:97%" id="ngaysudung"
                               required="required"
                               placeholder="Ngày ghi sổ" class="text ui-widget-content ui-corner-all"/>
                  </span></td>
              </tr>
              <tr>
                  <td><label for="name2"> Nguyên giá :</label></td>
                  <td colspan="2"><input type="text" name="nguyengia" onkeyup="return format_munber(this.value,'#nguyengia')" id="nguyengia" value="" style="width: 100%"
                               class="text ui-widget-content ui-corner-all"/></td>
                  <td colspan="2" align="right"><label for="name14">Giá trị còn lại :</label></td>
                <td colspan="2"><input type="text" name="giatriconlai" onkeyup="return format_munber(this.value,'#giatriconlai')" id="giatriconlai" value="" style="width: 100%"
                               class="text ui-widget-content ui-corner-all"/></td>
              </tr>
              <tr>
                  <td><label for="name9">TGSD:</label></td>
                  <td colspan="2"><input type="text" name="thoigiansudung" id="thoigiansudung" value="" style="width: 70%"
                               class="text ui-widget-content ui-corner-all"/>
                  &nbsp;tháng </td>
                  <td colspan="2" align="right"><label for="name10"> Tỷ lệ KH:</label></td>
                <td colspan="2"><input type="text" name="tylekhachhang" id="tylekhachhang" value="" style="width: 100%"
                               class="text ui-widget-content ui-corner-all"/></td>
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
         <legend>Mức khấu hao</legend>
           <table class="table-dialog" style="vertical-align: middle;width: 100%" border="0">
                <tr>
                  <td width="13%"><label for="name"> &nbsp;&nbsp;&nbsp;Tháng :</label></td>
                    <td width="24%"><input name="khauhaothang" type="text"
                               class="text ui-widget-content ui-corner-all" id="khauhaothang" style="width: 80%" onkeyup="return format_munber(this.value,'#khauhaothang')" value="" readonly="readonly"/></td>
                    <td width="7%"><label for="name"> Quý :</label></td>
                    <td width="24%"><input name="khauhaoquy" type="text"
                               class="text ui-widget-content ui-corner-all" id="khauhaoquy" style="width: 80%" value="" readonly="readonly"/></td>
                    <td width="9%"><label for="name"> Năm :</label></td>
                    <td width="23%"><input name="khauhaonam" type="text"
                               class="text ui-widget-content ui-corner-all" id="khauhaonam" style="width: 80%" value="" readonly="readonly"/></td>

                </tr>
            </table>
        </fieldset>
      <fieldset style="background-color: #afd9ee">
         <legend>Khi trích hao mòn tính vào chi phí, thực hiện định khoản sau</legend>
        <table class="table-dialog" style="vertical-align: middle;width: 100%" border="0">
                <tr>
                  <td><label for="name7"> &nbsp;&nbsp;&nbsp;Tài khoản nợ :</label></td>
                    <td><input name="tkno" type="text"
                               class="text ui-widget-content ui-corner-all" id="tkno" style="width: 50%" list="listtaikhoan" value=""/>
                               <datalist id="listtaikhoan"></datalist>
                  </td>
                    <td><label for="name8"> &nbsp;&nbsp;&nbsp;Tài khoản có :</label></td>
                    <td><input name="tkco" type="text"
                               class="text ui-widget-content ui-corner-all" id="tkco" style="width: 50%" list="listtaikhoan" value=""/></td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>

                </tr>
        </table>
      </fieldset>
        <fieldset style="background-color: #afd9ee">
            <table class="table-dialog" style="vertical-align: middle;width: 100%" border="0">
                <tr>
                    <td width="10%"><label for="name"> Ghi chú :	</label></td>
                    <td width="90%">
                        <textarea id="ghichu" style="width: 100%;height:40px;" class="text ui-widget-content ui-corner-all"></textarea>
                    </td>

                </tr>
                <tr>
                  <td align="right"><input type="checkbox" name="mangsang" id="mangsang" style="margin-left:30px;margin-top:3px;" /></td>
                  <td><label for="name">Mang sang	</label></td>
                </tr>
            </table>
        </fieldset>
    </form>
</div>

<script>
    $height = 300;
    $width = 700;
    //$dir_module_taisan = "modules/mabp/";////////////////Khai báo đường dẫn vào mudole
    $dir_module_makhachhang = "modules/makhachhang/";////////////////Khai báo đường dẫn vào mudole
    $dir_module_matk = "modules/httk/";
    $dir_module_manoidung = "modules/manoidung/";////////////////Khai báo đường dẫn vào mudole
    $dir_module_dmsanpham = "modules/dmsanpham/";////////////////Khai báo đường dẫn vào mudole
    $dir_module_chitiet_vattu = "modules/ps_chitiet_mavt/";//----------------Lưới
    $dir_module_taisan = "modules/mataisan/";//----------------Lưới
	$dir_module_nhomtaisan = "modules/nhomtaisan/";//----------------Lưới
    $(function () {
        {
        /////////////////////////////////////////////////////// Danh sách Autocomplex
        var $listmanoidung = new Array();// Danh sách mã nội dung
        $.ajax({// Load danh sách mã khách hàng
            url: $dir_module_manoidung + "listall.php",
            async: false,
            dataType: "json",
			data:{mapl:"GITS"},
            success: function (response) {
                $array = (response);
                for (var i = 0; i < $array.length; i++) {
                    //alert($array[i].makh);
                    $listmanoidung+='<option value='+$array[i].mand+'>'+bodauTiengViet($array[i].tennoidung)+'</option>';
                }
            }
        });

        $("#listmanoidung").html($listmanoidung);


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
                    $listmataikhoan+='<option value='+$array[i].matk+'>'+bodauTiengViet($array[i].tentk)+'</option>';
                }
            }
        });

        $("#listtaikhoan").html($listmataikhoan);
		
		var $listnhomtaisan = new Array();// Danh sách mã nội dung
        $.ajax({// Load danh sách mã khách hàng
            url: $dir_module_nhomtaisan + "listall.php",
            async: false,
            dataType: "json",
            success: function (response) {
                $array = (response);
                for (var i = 0; i < $array.length; i++) {
                    //alert($array[i].makh);
                    $listnhomtaisan+='<option value='+$array[i].manhom+'>'+bodauTiengViet($array[i].tennhom)+'</option>';
                }
            }
        });

        $("#listNhomTS").html($listnhomtaisan);
    }
/////////////////////////////////////////////Kết thúc Danh sách Autocomplex

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
            ngayhoadon = $("#ngay"),
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
            if (!( regexp.test(o.val()) )) {
                o.addClass("ui-state-error");
                updateTips(n);
                return false;
            } else {
                return true;
            }
        }

        function checkSoHoaDonTrung() {// Check key khi nhấn submit
            $data = "";
            $LoaiPhieu=1;
            $sophieu = sophieu.val();
            $sohoadon = sohoadon.val().trim();
			$kyhieu = $("#kyhieu").val().trim();
            $makhachhang = makhachhang.val().trim();
            $.ajax({
                url: $dir_module_taisan + "kiemtrasohoadon.php",
                data: {'loaiphieu': $LoaiPhieu,sohoadon:$sohoadon,sophieu:$sophieu,makh:$makhachhang,kyhieu:$kyhieu},
                async: false,
                success: function (response) {
                    $data = (response);
                }
            });
            if($data==0){
                return true;
            }else{
                updateTips( "Số hóa đơn không được trùng .");
                return false;
            }
        }

        $("#Form-chinh").keydown(function (event) {//--------------Các phím tắt
            if (event.keyCode == Keys.INSERT) {// Sửa
                $sophieu = sophieu.val();
                $("#gird_chitiet_nhapkho").load("form/gird_chitiet_nhapkho.php?sophieu="+$sophieu+"&list=1");// Nếu list là 1 thì load union

            }
        })
        $("#Form-chinh").keydown(function (event) {// Gọi table mã nội dung để chọn
            if (event.keyCode == Keys.ESCAPE) { // copy
				$them = $("#dangthem").val();
				if($them=="add"){
					var r = confirm("Dữ liệu chưa được lưu ? Bạn có muốn thoát không ?");
					if(r==true){
						$('.dialog_main_thongbao').load('form/frm_thongbao_nhapkho_thoat.php');
					}else{
						
					}
				}else{
					$('.dialog_main_thongbao').load('form/frm_thongbao_nhapkho_thoat.php');
				}
            }
        })
		
				        $("#Form-chinh").keydown(function (event) {// Gọi table mã nội dung để chọn
            if (event.keyCode == Keys.ESCAPE) { // copy
				/*$them = $("#dangthem").val();
				if($them=="add"){
					var r = confirm("Dữ liệu chưa được lưu ? Bạn có muốn thoát không ?");
					if(r==true){
						$('.dialog_main_thongbao').load('form/frm_thongbao_nhapkho_thoat.php');
					}else{
						
					}
				}else{
					$('.dialog_main_thongbao').load('form/frm_thongbao_nhapkho_thoat.php');
				}*/
            }
            if (event.keyCode == Keys.F8) { // Xóa phiếu
                $sophieu = $("#STT").val();
                if($sophieu!=""){
                    var answer = confirm("Bạn có muốn xóa phiếu này ?");
                    if (answer){
                        $.ajax({
                            url: $dir_module_taisan + "del_phieu.php",
                            data: {sophieu:$sophieu,loaiphieu:"2"},
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

            ////end phím tắt-----------------------------------
        ///-------------------------Di chuyễn các phần tử bằng enter----------------

        $("#ngayghiso").keydown(function (event) {// Gọi table mã nội dung để chọn
            if (event.keyCode == Keys.ENTER) { // copy
                $("#ngay").focus();
            }
        })

        $("#ngay").keydown(function (event) {// Gọi table mã nội dung để chọn
            if (event.keyCode == Keys.ENTER) { // copy
                $("#manoidung").focus();
            }
        })

        $("#manoidung").keydown(function (event) {// Gọi table mã nội dung để chọn
            if (event.keyCode == Keys.ENTER) { // copy
                $("#makho").focus();
            }
        })
        $("#chonloaisp").keydown(function (event) {// Gọi table mã nội dung để chọn
            if (event.keyCode == Keys.ENTER) { // copy
                $("#makho").focus();
            }
        })

        $("#makho").keydown(function (event) {// Gọi table mã nội dung để chọn
            if (event.keyCode == Keys.ENTER) { // copy
                $("#btntimtaisan").focus();
            }
        })
	

         $("#mataisan").keydown(function (event) {// Gọi table mã nội dung để chọn
            if (event.keyCode == Keys.ENTER) { // copy
                $("#tentaisan").focus();
            }
        })
       $("#tentaisan").keydown(function (event) {// Gọi table mã nội dung để chọn
            if (event.keyCode == Keys.ENTER) { // copy
                $("#matk").focus();
            }
        })
		$("#matk").keydown(function (event) {// Gọi table mã nội dung để chọn
            if (event.keyCode == Keys.ENTER) { // copy
				$("#NhomTS").focus();
            }
        })
        $("#NhomTS").keydown(function (event) {// Gọi table mã nội dung để chọn
            if (event.keyCode == Keys.ENTER) { // copy
                $("#congsuat").focus();
            }
        })
		$("#congsuat").keydown(function (event) {// Gọi table mã nội dung để chọn
            if (event.keyCode == Keys.ENTER) { // copy
                $("#nuocsanxuat").focus();
            }
        })


       $("#nuocsanxuat").keydown(function (event) {// Gọi table mã nội dung để chọn
            if (event.keyCode == Keys.ENTER) { // copy
                $("#donvitinh").focus();
            }
        });

        $("#donvitinh").keydown(function (event) {// Gọi table mã nội dung để chọn
            if (event.keyCode == Keys.ENTER) { // copy
                $("#soluong").focus();
            }
        })

        $("#soluong").keydown(function (event) {// Gọi table mã nội dung để chọn
            if (event.keyCode == Keys.ENTER) { // copy
                $("#ngaysudung").focus();
            }
        })
        $("#ngaysudung").keydown(function (event) {// Gọi table mã nội dung để chọn
            if (event.keyCode == Keys.ENTER) { // copy
                $("#nguyengia").focus();
            }
        })
		
		$("#nguyengia").keydown(function (event) {// Gọi table mã nội dung để chọn
            if (event.keyCode == Keys.ENTER) { // copy
                $("#giatriconlai").focus();
            }
        })

        $("#giatriconlai").keydown(function (event) {// Gọi table mã nội dung để chọn
            if (event.keyCode == Keys.ENTER) { // copy
                $("#thoigiansudung").focus();
            }
        })

        $("#thoigiansudung").keydown(function (event) {// Gọi table mã nội dung để chọn
            if (event.keyCode == Keys.ENTER) { // copy
                $("#tylekhachhang").focus();
            }
        })
		$("#tylekhachhang").keydown(function (event) {// Gọi table mã nội dung để chọn
            if (event.keyCode == Keys.ENTER) { // copy
                $("#khauhaothang").focus();
            }
        })
		
		$("#khauhaothang").keydown(function (event) {// Gọi table mã nội dung để chọn
            if (event.keyCode == Keys.ENTER) { // copy
                $("#khauhaoquy").focus();
            }
        })
		
		$("#khauhaoquy").keydown(function (event) {// Gọi table mã nội dung để chọn
            if (event.keyCode == Keys.ENTER) { // copy
                $("#khauhaonam").focus();
            }
        })
		$("#khauhaonam").keydown(function (event) {// Gọi table mã nội dung để chọn
			if (event.keyCode == Keys.ENTER) { // copy
				$("#tkno").focus();
			}
		})
		
		$("#tkno").keydown(function (event) {// Gọi table mã nội dung để chọn
			if (event.keyCode == Keys.ENTER) { // copy
				$("#tkco").focus();
			}
		})
		
		$("#tkco").keydown(function (event) {// Gọi table mã nội dung để chọn
			if (event.keyCode == Keys.ENTER) { // copy
				$("#ghichu").focus();
			}
		})

        $("#ngay").focus(function (event) {// Gọi table mã nội dung để chọn
            $ngayghiso = $("#ngayghiso").val();
            $("#ngay").val($ngayghiso);
        })

///-------------------Kết thúc--------------------------------
       function layngayghiso($loaiphieu){
            $data = "";
            $LoaiPhieu=$loaiphieu;
            $.ajax({
                url: $dir_module_taisan + "layngayghiso.php",
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
            $('.dialog_main_ds_nhapkho').load("form/frm_ds_tanggiam_taisan.php?idstyle=Form-chinh&idinput=STT&idfocus=STT&loaiphieu=2");
        });

        $(btnmakh).click(function (event) {// Gọi table khách hàng để chọn
            $('.dialog_main_makh').load("form/frm_dm_makh_form_select.php?idstyle=Form-chinh&idinput=makhachhang***tenkhachhang***diachi***masothue***makhachhang2***tenkhachhang2***diachi2&idfocus=manoidung");
        });

        $(makhachhang).focusout(function (event) {// Gọi table mã nội dung để chọn
            $makh = makhachhang.val().trim();
            //if (event.keyCode == Keys.ENTER || event.keyCode == Keys.TAB) { // copy
                goitablemakhachhang($makh);
            //}
        });

        $("#khauhaothang").focusout(function(){
            $khthang = $("#khauhaothang").val().replace(/,/gi, "");
            $khauhaothang = $khthang*3;
            $khauhaonam = $khthang*12;
            $("#khauhaoquy").val(FormatNumber($khauhaothang.toString()));
            $("#khauhaonam").val(FormatNumber($khauhaonam.toString()));
        });

        function goitablemakhachhang($vale) {
            if ($vale == "") {// nếu tk nợ trống thì bật tra bảng
                $('.dialog_main_makh').load("form/frm_dm_makh_form_select.php?idstyle=Form-chinh&idinput=makhachhang***tenkhachhang***diachi***masothue***makhachhang2***tenkhachhang2***diachi2&idfocus=manoidung");
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
                    $('.dialog_main_makh').load("form/frm_dm_makh_form_select.php?idstyle=Form-chinh&idinput=makhachhang***tenkhachhang***diachi***masothue***makhachhang2***tenkhachhang2***diachi2&idfocus=manoidung");
                }
            }
        }

        //---------------------End maKH--------------
        //////////Begin ma kh////////////////////////////
        $(btnmand).click(function (event) {// Gọi table khách hàng để chọn
            $('.dialog_main_manoidung').load("form/frm_dm_manoidung_form_select.php?idstyle=Form-chinh&idinput=manoidung***noidung***tknond***ghichu&idfocus=makho&loaiphieu=1&plnoidung=TATS");
        });
        $("#NhapSoLuongDongGia").click(function(){
            $sophieu = sophieu.val();
            $list=0;
            var $cothuegtgt = 0;
            if (cothuegtgt.is(":checked")) {
                $cothuegtgt = 1;
            }
            var $cochietkhau = 0;
            if ($('#chietkhau').is(":checked")) {
                $cochietkhau = 1;
            }
            $('.dialog_main_bangchitiet_nhapkho').load('form/frm_bangchitiet_nhapkho.php?sophieu='+$sophieu+'&list='+$list+'&thuegtgt='+$cothuegtgt+'&cochietkhau='+$cochietkhau);
        });
        $(manoidung).focusout(function (event) {// Gọi table mã nội dung để chọn
            $ma = manoidung.val().trim();
            //if (event.keyCode == Keys.ENTER || event.keyCode == Keys.TAB) { // copy
                goitablemanoidung($ma);
            //}
        });
		$("#nguyengia").focusout(function () {
            $nguyengia = $("#nguyengia").val();
            if($("#giatriconlai").val()==""){
                $("#giatriconlai").val($nguyengia);
            }
			
        });
        $("#thoigiansudung").focusout(function () {
            $nguyengia = $("#nguyengia").val().replace(/,/gi, "");
            $thoigiansudung = $("#thoigiansudung").val();
            $tienckthang = $nguyengia/$thoigiansudung;
            $tiencknam = $tienckthang*12;

            $tyleck = parseFloat(($tiencknam/$nguyengia)*100).toFixed(2);

            $("#tylekhachhang").val($tyleck);
			$khthang = Math.round((parseInt($nguyengia)*($tyleck/100))/12);
            $("#khauhaothang").val($.number($tienckthang,0,".",","));
            $("#khauhaoquy").val($.number($tienckthang*3,0,".",","));
            $("#khauhaonam").val($.number($tienckthang*12,0,".",","));
        });
        function goitablemanoidung($vale) {
            if ($vale == "") {// nếu tk nợ trống thì bật tra bảng
                $('.dialog_main_manoidung').load("form/frm_dm_manoidung_form_select.php?idstyle=Form-chinh&idinput=manoidung***noidung&idfocus=chonloaisp&loaiphieu=1&plnoidung=GITS&ma='"+$vale+"'");
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


                    //makho.focus();

                } else {
                    $('.dialog_main_manoidung').load("form/frm_dm_manoidung_form_select.php?idstyle=Form-chinh&idinput=manoidung***noidung&idfocus=chonloaisp&loaiphieu=1&plnoidung=TATS&ma='"+$vale+"'");
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
                        $('.dialog_main_danhmuc_sanpham').load("form/frm_dm_sanpham_from_select.php?idstyle=Form-chinh&idinput=makho***tenkho&idfocus=NhapTuKho&ma="+$("#makho").val());
                    }else  if($loaisp=="CT"){
                        $('.dialog_main_danhmuc_sanpham').load("form/frm_dm_congtrinh_form_select.php?idstyle=Form-chinh&idinput=makho***tenkho&idfocus=NhapTuKho&ma="+$("#makho").val());
                    }else{
                        makho.val("0001");
                        tenkho.val("Toàn Bộ");
                    }
                }
            }
        }
        //////////End ma kho////////////////////////////
		
		/*$("#NhomTS").focusout(function (event) {// Gọi table mã nội dung để chọn
            $ma = $("#NhomTS").val().trim();
            //if (event.keyCode == Keys.ENTER || event.keyCode == Keys.TAB) { // copy
                goitablemanhomts($ma);
                //$("#cothuegtgt").focus();
            //}
        });

        function goitablemanhomts($vale) {
            if ($vale == "") {// nếu tk nợ trống thì bật tra bảng
                $('.dialog_main_nhom_taisan').load("form/frm_dm_nhom_taisan_form_select.php?idstyle=Form-chinh&idinput=NhomTS***tenNhomTS&idfocus=congsuat");
            } else {// nếu tk có không trống
                $data = "";
                $.ajax({
                    url: $dir_module_nhomtaisan + "laythongtin.php",
                    data: {'ma': $vale},
                    async: false,
                    success: function (response) {
                        $data = $.parseJSON(response);
                    }
                });
                if ($data != null) { // Nếu tk có tòn tại trong hệ thống tài khoản thì lấy giá trị và gán vào textbox
                    $("#NhomTS").val($data.manhom);
                    $("#tenNhomTS").val($data.tennhom);


                    //makho.focus();

                } else {
                    $('.dialog_main_nhom_taisan').load("form/frm_dm_nhom_taisan_form_select.php?idstyle=Form-chinh&idinput=NhomTS***tenNhomTS&idfocus=congsuat");
                }
            }
        }*/
        //////////End ma kho////////////////////////////
        /////////Bắt đầu tk ///////////////////////////
        $("#matk").focusout(function (event) {// Gọi table mã nội dung để chọn
            $matk = $("#matk").val().trim();
             goitablehttk($matk);
        });
        function goitablehttk($vale) {
            if ($vale == "") {// nếu tk nợ trống thì bật tra bảng
                $('.dialog_main_httk').load("form/frm_dm_httk_form_select.php?idstyle=Form-chinh&idinput=matk&idfocus=NhomTS&ma="+$vale);
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
                } else {
                    $('.dialog_main_httk').load("form/frm_dm_httk_form_select.php?idstyle=Form-chinh&idinput=matk&idfocus=NhomTS&ma="+$vale);
                }
            }
        }

        $("#tkno").focusout(function (event) {// Gọi table mã nội dung để chọn
            $tkno = $("#tkno").val().trim();
            goitablehttk2($tkno);
        });
        function goitablehttk2($vale) {
            if ($vale == "") {// nếu tk nợ trống thì bật tra bảng
                $('.dialog_main_httk').load("form/frm_dm_httk_form_select.php?idstyle=Form-chinh&idinput=tkno&idfocus=tkco&ma="+$vale);
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
                    $('.dialog_main_httk').load("form/frm_dm_httk_form_select.php?idstyle=Form-chinh&idinput=tkno&idfocus=tkco&ma="+$vale);
                }
            }
        }

        $("#tkco").focusout(function (event) {// Gọi table mã nội dung để chọn
            $tkco = $("#tkco").val().trim();
             goitablehttk3($tkco);
        });
        function goitablehttk3($vale) {
            if ($vale == "") {// nếu tk nợ trống thì bật tra bảng
                $('.dialog_main_httk').load("form/frm_dm_httk_form_select.php?idstyle=Form-chinh&idinput=tkco&idfocus=ghichu&ma="+$vale);
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
                    $('.dialog_main_httk').load("form/frm_dm_httk_form_select.php?idstyle=Form-chinh&idinput=tkco&idfocus=ghichu&ma="+$vale);
                }
            }
        }

        ////////Kết thúc tk///////////////////////////
        ///////////////////////////////////////////////////////////////////////
        $(loaict).change(function () {// Lấy tên khách hàng , địa chỉ , mst
            $loaict = loaict.val();
            if ($loaict == 1) {
                mauso.val("01 GTKT-3LL");
                cothuegtgt.attr("checked", true)
            }
            if ($loaict == 2) {
                mauso.val("02 GTTT-3LL");
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
            if(ngayhoadon.val()==""){
                ngayhoadon.val(ngayghiso.val());
            }
        });
		
		$("#btntimtaisan").click(function(){
			$(".dialog_main_mataisan").load("form/frm_danhsach_mataisan_from_select.php");
		});

        //---------------------End ma nội dung--------------

		
		$("#mataisan").focusout(function (event) {// Gọi table khách hàng để chọn
            //if (event.keyCode == Keys.ENTER) { //
			$val = $("#mataisan").val().trim();
                checkMaTaiSan($val);
            //}
        });
		function checkMaTaiSan($val) {// Check key khi nhấn enter
            $mataisan = $val;

            if ($mataisan == "") {//Nếu số thứ tự null sẽ tạo số mới tự động tăng theo mã

                notdisabledInput();

                $(".dialog_main_mataisan").load("form/frm_danhsach_mataisan_from_select.php");
                $ngayghiso = layngayghiso($LoaiPhieu);
                $("#ngayghiso").val($ngayghiso);
                ngayghiso.focus();

            } else {// Nếu không trống kiểm tra xem có tồn tại hay không
                var $checkphieuthuchi = 0;
                $data = "";
                    $.ajax({
                        url: $dir_module_taisan + "laythongtintaisan.php",
                        data: {ma: $mataisan},
                        async: false,
                        success: function (response) {
                            $checkphieuthuchi = $.parseJSON(response);
                        }
                    });
					$data = $checkphieuthuchi[0];
                if ($checkphieuthuchi == 0) {
					$(".dialog_main_mataisan").load("form/frm_danhsach_mataisan_from_select.php");
                } else {
                    
                    $("#mataisan").val($mataisan);
                    notdisabledInput();
                    $("#tentaisan").val($data.tents);
                    $("#NhomTS").val($data.manhomts);
                    $("#congsuat").val($data.congsuat);
                    $("#nuocsanxuat").val($data.nuocsx);
                    $("#donvitinh").val($data.dvt);
                    $("#soluong").val("0");
                    $("#ngaysudung").val($data.ngaysd);
                    $("#nguyengia").val("0");
                    $("#giatriconlai").val("0");
                    $("#tylekhachhang").val("0");
                    $("#thoigiansudung").val($data.thoigiansd);
                    $("#tkno").val($data.matk);
                    
                }
		}
        }
        function checkSTT(STT) {// Check key khi nhấn enter
            $STT = $("#STT").val().trim();

            if ($STT == "") {//Nếu số thứ tự null sẽ tạo số mới tự động tăng theo mã
                var $data;
                $.ajax({
                    url: $dir_module_taisan + "taomapsts.php",// Tạo số thứ tự của phiếu
                    async: false,
                    data: {tanggiam: 2},
                    success: function (response) {
                        $data = response;
                    }
                });
                
                $sophieu = parseInt($data);
				
                $("#STT").val($sophieu);
                
                $("#STT").attr("disabled", true);
                btnstt.attr("disabled", true);

                notdisabledInput();
				
                $("#ngayghiso").focus();

            } else {// Nếu không trống kiểm tra xem có tồn tại hay không
                var $checkphieuthuchi = 0;
                $data = "";
                    $.ajax({
                        url: $dir_module_taisan + "laythongtintaisanps.php",
                        data: {maps: $STT,tanggiam:2},
                        async: false,
                        success: function (response) {
                            $checkphieuthuchi = $.parseJSON(response);
                        }
                    });
					$data = $checkphieuthuchi[0];
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
	

										//$("#mataisan").val($mataisan);
										//$("#dangthem").val("add");
										//$("#mataisan").attr("disabled", true);
										$("#STT").attr("disabled", true);
										$("#ngayghiso").attr("disabled", false);
                                        //$("#gird_chitiet_nhapkho").load("form/gird_chitiet_nhapkho.php?sophieu="+$sophieu+"&list=0");
                                        //$ngayghiso = layngayghiso($LoaiPhieu);
                                       // $("#ngayghiso").val($ngayghiso);
                                        $("#ngayghiso").focus();
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
                    
                    
                    $("#STT").val($STT);
           
                    notdisabledInput();
                    $("#mataisan").val($data.mats);
                    $("#tentaisan").val($data.tents);
                    $("#makho").val($data.mabp);
                    $("#manoidung").val($data.mand);
                    $("#tenkho").val($data.bophan);
                    $("#noidung").val($data.noidung);
                    $("#matk").val($data.matk);
                    $("#NhomTS").val($data.manhomts);
                    $("#congsuat").val($data.congsuat);
                    $("#nuocsanxuat").val($data.nuocsanxuat);
                    $("#donvitinh").val($data.dvt);
                    $("#soluong").val($data.soluong);
                    $("#ngaysudung").val($data.ngaysd);
					$("#ngayghiso").val($data.ngayghiso);
					$("#ngay").val($data.ngayhoadon);
                    $("#nguyengia").val(FormatNumber($data.nguyengia.toString()));
                    $("#giatriconlai").val(FormatNumber($data.giatriconlai.toString()));
                    $("#tylekhachhang").val($data.tylekh);
                    $("#thoigiansudung").val($data.thoigiansd);
                    $("#khauhaothang").val(FormatNumber($data.muckhthang.toString()));
                    $("#khauhaoquy").val(FormatNumber($data.muckhquy.toString()));
                    $("#khauhaonam").val(FormatNumber($data.muckhnam.toString()));
                    $("#tkno").val($data.tkno);
                    $("#tkco").val($data.tkco);
                    $("#ghichu").val($data.chuthich);
                    $("#thamchieu").val($data.thamchieu);
                    $("#chonloaisp").val($data.loaisp);
					$("#ngayghiso").focus();
					$("#STT").attr("disabled", true);
               		 btnstt.attr("disabled", true);
                    
                }
            }
        }
        function laydinhkhoan_chitietpsvt(){
            $sophieu = $("#sophieu").val();
            $.ajax({// Kiểm tra xem STT có tồn tại hay không
                url: $dir_module_taisan + "laythongtintabledinhkhoan.php",
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
            $lengh = $data.length;
            $.each($data, function(i, item) {
                i++;
                $("#tkno"+i).val(item.tkno);
                $("#tkco"+i).val(item.tkco);
                $sotien = item.sotien;
                $("#sotien"+i).val(FormatNumber($sotien.toString()));
                $tongtien+=parseFloat($sotien);
                if(i<$lengh){
                    $tonghang+=parseFloat($sotien);
                }
            });
            $tongthue = $data[$lengh-1].sotien;
            $("#tongtien").val(FormatNumber($tongtien.toString()));
            $("#tongso").val(FormatNumber($tongtien.toString()));
            $tonghang = parseFloat($tonghang);
            $("#tienhang").val(FormatNumber($tonghang.toString()));// Tiền hàng
            $("#thue").val(FormatNumber($tongthue.toString()));//Tiền thuế
        }

        $(STT).keydown(function (event) {// Gọi table khách hàng để chọn
            if (event.keyCode == Keys.ENTER) { //
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

                valid = valid && checkNull(STT, " Số TT  ");
                          valid = valid && checkNull($("#mataisan"), " Mã tài sản ");
                valid = valid && checkNull($("#soluong"), " Số lượng ");
				valid = valid && checkNull($("#matk"), " Mã tài khoản ");
				valid = valid && checkNull($("#tkno"), " Mã tài khoản nợ ");
				valid = valid && checkNull($("#tkco"), " Mã tài khoản có ");
                valid = valid && checkNull($("#makho"), " Mã bộ phận ");
                valid = valid && checkNull(manoidung, " Mã nội dung ");


            $NgayGhiSo = new Date($("#ngayghiso").val());
            $NamGhiSo = $NgayGhiSo.getFullYear();
            if(<?php echo $_SESSION['NienDo']; ?>!=$NamGhiSo){
                alert("Ngày ghi sổ không nằm trong năm tài chính <?php echo $_SESSION['NienDo']; ?> ! Vui lòng nhập lại .");
                return false;
            }

                if (valid) {
                    $.ajax({
                        url: $dir_module_taisan + "addpsts.php", // Bao gồm cả add và edit
                        type: "get", // chọn phương thức gửi là get
                        dateType: "text", // dữ liệu trả về dạng text
                        data: { // Danh sách các thuộc tính sẽ gửi đi
                            STT: STT.val().trim(),
                            ngayghiso: ngayghiso.val().trim(),
							ngayhoadon: $("#ngay").val().trim(),
                            mataisan: $("#mataisan").val().trim(),
                            tentaisan: $("#tentaisan").val().trim(),
                            manoidung: $("#manoidung").val().trim(),
                            noidung: $("#noidung").val().trim(),
                            mabp: $("#makho").val().trim(),
                            bophan: $("#tenkho").val().trim(),							
                            matk: $("#matk").val().trim(),
                            NhomTS: $("#NhomTS").val().trim(),
                            congsuat: $("#congsuat").val().trim(),
                            nuocsanxuat: $("#nuocsanxuat").val().trim(),
                            donvitinh: $("#donvitinh").val().trim(),
                            soluong: $("#soluong").val().trim(),
                            ngaysudung: $("#ngaysudung").val().trim(),
                            nguyengia: $("#nguyengia").val().trim(),
                            giatriconlai: $("#giatriconlai").val().trim(),
                            tylekhachhang: $("#tylekhachhang").val().trim(),
                            thoigiansudung: $("#thoigiansudung").val().trim(),
                            khauhaothang: $("#khauhaothang").val().trim(),
                            khauhaoquy: $("#khauhaoquy").val().trim(),
                            khauhaonam: $("#khauhaonam").val().trim(),
                            tkno: $("#tkno").val().trim(),
                            tkco: $("#tkco").val().trim(),
                            ghichu: $("#ghichu").val().trim(),
                            thamchieu: $("#thamchieu").val().trim(),
                            loaisp:$("#chonloaisp").val(),
                            tanggiam: 2,
                        },
                        success: function (result) {
                           $('.dialog_main_thongbao').load('form/frm_thongbao_tang_taisan.php?sottphieukhac=<?php echo $sottphieukhac ?>');
                        }
                    });
                }

            return valid;
        }

        function xoadialog_nhapkho() {// đóng form
            reset_dialog(".dialog-tangtaisan");
            reset_dialog(".dialog_main_tangtaisan");
        }

        dialog = $("#dialog-tangtaisan").dialog({
            autoOpen: false,
            height: "auto",
            width: $width,
            modal: true,
            buttons: {
                "Đồng ý": ChucNang_nhapkho,
                "Kết thúc": function () {
                    $('.dialog_main_thongbao').load('form/frm_thongbao_tang_taisan_thoat.php?sottphieukhac=<?php echo $sottphieukhac ?>');
                }
            }
        });
        dialog.dialog("open");

    });
</script>