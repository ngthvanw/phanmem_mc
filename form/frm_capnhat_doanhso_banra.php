<?php
    session_start();
 require("../config.php"); ?>
  <style>
    #Form-CapNhap_MatKhau label{margin-top:7px;float: left; border:0px solid red;width:130px;display:block !important; font-weight: bold !important;font-size: 12px;font-family: Arial,Lucida Grande, Lucida Sans, sans-serif;}
    #Form-CapNhap_MatKhau input {float: left; display:block !important; font-weight: bold !important;font-size: 12px;font-family: Arial,Lucida Grande, Lucida Sans, sans-serif;}
    #Form-CapNhap_MatKhau input.text {float: left; margin-bottom:4px !important; width:100%; padding: .4em !important;font-size: 12px;font-family: Arial,Lucida Grande, Lucida Sans, sans-serif;font-weight: normal; }
    #Form-CapNhap_MatKhau fieldset { padding:0;padding-top: 6px; border:1px solid #7cc3f9; margin-top:0px; }
    #Form-CapNhap_MatKhau .td-left input.text {float: left; margin-bottom:4px !important; width:60%; padding: .4em !important;font-size: 12px;font-family: Arial,Lucida Grande, Lucida Sans, sans-serif;font-weight: normal; }
    #Form-CapNhap_MatKhau select{font-size: 12px;font-weight: bold;}
    #Form-CapNhap_MatKhau h1 { font-size: 1.2em; margin: .6em 0; }
    div#users-contain { width: 350px; margin: 20px 0; }
    div#users-contain table { margin: 1em 0; border-collapse: collapse; width: 100%; }
    div#users-contain table td, div#users-contain table th { border: 1px solid #eee; padding: .6em 10px; text-align: left; }
    .ui-dialog .ui-state-error { padding: .3em; }
    .validateTips { border: 1px solid transparent; padding: 0.3em;margin-top: 0px !important;margin-bottom: 0px !important;color: red;font-weight: bold;text-align: center; }
    .ui-draggable, .ui-droppable {
	background-position: top;   
}
    .table-dialog{
        width: 98%;
    }
    .red{color:red;}
    .table-dialog .td-left{
        width: 50%;
        padding-right:20px;
    }
    .table-dialog .td-right{
        width: 50%;
    }
    .table-dialog .td-right input{
        float: left; margin-bottom:4px !important; width:65% !important;
        }
    .table-dialog .td-left input{
        float: left; margin-bottom:4px !important; width:60% !important;
        }/* auto complex ma tk cha  */
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
  .ui-menu{
	  z-index:999999999 !important;
  }
</style>
<div id="dialog-capnhat_matkhau" title="Cập nhật chi tiết doanh số bán ra ">
<p class="validateTips"></p>
    <form method="post" id="Form-CapNhap_MatKhau" enctype="multipart/form-data">
        <fieldset>
            <table class="table-dialog">
                <tr>
                    <td colspan="2">
                        <table style="width: 100%" border="0">
                            <tr>
                                <td style="width: 27%" >&nbsp;</td>
                                <td style="width: 30%"><label for="name" style="font-weight: bold;">&nbsp;Doanh thu</label></td>
                                <td style="width: 30%"><label for="name" style="font-weight: bold;">&nbsp;Thuế</label></td>
                            </tr>
                        </table>
                    </td>

                </tr>
				<tr>
                    <td colspan="2">
                        <label for="name" style="font-weight: bold;">Không kê khai thuế</label><input type="text" onkeyup="format_munber(this.value,'#KhongKeKhaiThue')" name="KhongKeKhaiThue" id="KhongKeKhaiThue" required=""  value="" class="text ui-widget-content ui-corner-all" autocomplete="off" style="width:35%;text-align: right;" />
                                                                        <input type="text" onkeyup="format_munber(this.value,'#ThueKhongKeKhaiThue')" name="ThueKhongKeKhaiThue" id="ThueKhongKeKhaiThue" required=""  value="" class="text ui-widget-content ui-corner-all" autocomplete="off" style="width:30%;text-align: right;" />
                    </td>

                </tr>
                <tr>
                    <td colspan="2">
                        <label for="name" style="font-weight: bold;">Không chịu thuế</label><input type="text" onkeyup="format_munber(this.value,'#KhongChiuThue')" name="KhongChiuThue" id="KhongChiuThue" required=""  value="" class="text ui-widget-content ui-corner-all" autocomplete="off" style="width:35%;text-align: right;" />
                                                                        <input type="text" onkeyup="format_munber(this.value,'#ThueKhongChiuThue')" name="ThueKhongChiuThue" id="ThueKhongChiuThue" required=""  value="" class="text ui-widget-content ui-corner-all" autocomplete="off" style="width:30%;text-align: right;" />
                    </td>

                </tr>
                <tr>
                    <td colspan="2">
                        <label for="name" style="font-weight: bold;">&nbsp;&nbsp;0%</label><input type="text" onkeyup="format_munber(this.value,'#KhongPhanTram')" name="KhongPhanTram" id="KhongPhanTram" required=""  value="" class="text ui-widget-content ui-corner-all" autocomplete="off" style="width:35%;text-align: right;" />
                                                                  <input type="text" onkeyup="format_munber(this.value,'#ThueKhongPhanTram')" name="ThueKhongPhanTram" id="ThueKhongPhanTram" required=""  value="" class="text ui-widget-content ui-corner-all" autocomplete="off" style="width:30%;text-align: right;" />
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <label for="name" style="font-weight: bold;">&nbsp;&nbsp;5%</label><input type="text" onkeyup="format_munber(this.value,'#NamPhanTram')" name="NamPhanTram" id="NamPhanTram" required=""  value="" class="text ui-widget-content ui-corner-all" autocomplete="off" style="width:35%;text-align: right;" />
                                                                  <input type="text" onkeyup="format_munber(this.value,'#ThueNamPhanTram')" name="ThueNamPhanTram" id="ThueNamPhanTram" required=""  value="" class="text ui-widget-content ui-corner-all" autocomplete="off" style="width:30%;text-align: right;" />
                    </td>
                </tr>
                <tr>
                <td colspan="2"><label for="name" style="font-weight: bold;">&nbsp;&nbsp;10%</label><input type="text" onkeyup="format_munber(this.value,'#MuoiPhanTram')" name="MuoiPhanTram" id="MuoiPhanTram" required=""  value="" class="text ui-widget-content ui-corner-all" autocomplete="off" style="width:35%;text-align: right;" />
                                                                            <input type="text" onkeyup="format_munber(this.value,'#ThueMuoiPhanTram')" name="ThueMuoiPhanTram" id="ThueMuoiPhanTram" required=""  value="" class="text ui-widget-content ui-corner-all" autocomplete="off" style="width:30%;text-align: right;" />
                </td>
                </tr>
            </table>
      <!-- Allow form submission with keyboard without duplicating the dialog button -->
      <input type="submit" accesskey="enter" tabindex="-1" style="position:absolute; top:-1000px"/>
    </fieldset>
        <fieldset>
            <table class="table-dialog">
                <tr>
                    <td colspan="2">
                        <label for="name" style="font-weight: bold;">Tổng cộng</label><input type="text" onkeyup="format_munber(this.value,'#TongDoanhSo')" readonly="readonly" name="TongDoanhSo" id="TongDoanhSo" required=""  value="" class="text ui-widget-content ui-corner-all" style="width:35%;text-align: right;" />
                                                                        <input type="text" onkeyup="format_munber(this.value,'#ThueTongDoanhSo')" readonly="readonly" name="ThueTongDoanhSo" id="ThueTongDoanhSo" required=""  value="" class="text ui-widget-content ui-corner-all" style="width:30%;text-align: right;" />
                    </td>

                </tr>
            </table>
            <!-- Allow form submission with keyboard without duplicating the dialog button -->
        </fieldset>
  </form>
</div>
<script>
$( function() {
    $dir_module = "modules/capnhatmatkhau/"; //Khai báo đường dẫn vào mudole
function xoadialog(){
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
                setTimeout(function() {
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
        function checkConfirm(o,o1,n,n1) { // Kiểm tra chiều dài chuổi nhập vào
            if (o.val().trim()!=o1.val().trim()) {
                 o.addClass("ui-state-error");
                   updateTips(  n + " và " +
                n1 + " không giống nhau .");
                  o.focus();
                    return false;
            } else {
                    return true;
            }
        }
    function checkRegexp(o, regexp, n) {
        if (!( regexp.test(o.val()))) {
            o.addClass("ui-state-error");
            updateTips(n);
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
    function checkTonTai(o,o1,n) { // Kiểm tra user va password có tồn tại không
            var TenDangNhap = o.val().trim();
            var MatKhau = o1.val().trim();
            var _found = false;
             $.ajax({
                    type: 'POST',
                    url: $dir_module+"checkkey.php",
                    data: {'user':TenDangNhap,'pass':MatKhau },
                    async: false,
                    success: function (response) {
                        if (response == 1) {
                            _found = true;
                        }
                    }
                });
            if(!_found){
                o.addClass("ui-state-error");
                updateTips(n + " không đúng .");
                return false;
            }else{
                return true;
            }
        }
        function loaddoanhso_banra() {
            $chitietdsdaura_json = $.parseJSON($("#chitietdsdaura").val());
			console.log($chitietdsdaura_json);
            try{
                $("#KhongKeKhaiThue").val($.number($chitietdsdaura_json.chitienbr.kk.tongtien,0,".",","));
                $("#KhongChiuThue").val($.number($chitietdsdaura_json.chitienbr.k.tongtien,0,".",","));
                $("#KhongPhanTram").val($.number($chitietdsdaura_json.chitienbr[0].tongtien,0,".",","));
                $("#NamPhanTram").val($.number($chitietdsdaura_json.chitienbr[5].tongtien,0,".",","));
                $("#MuoiPhanTram").val($.number($chitietdsdaura_json.chitienbr[10].tongtien,0,".",","));

                $("#ThueKhongKeKhaiThue").val($.number($chitietdsdaura_json.chitienbr.kk.tongthue,0,".",","));
                $("#ThueKhongChiuThue").val($.number($chitietdsdaura_json.chitienbr.k.tongthue,0,".",","));
                $("#ThueKhongPhanTram").val($.number($chitietdsdaura_json.chitienbr[0].tongthue,0,".",","));
                $("#ThueNamPhanTram").val($.number($chitietdsdaura_json.chitienbr[5].tongthue,0,".",","));
                $("#ThueMuoiPhanTram").val($.number($chitietdsdaura_json.chitienbr[10].tongthue,0,".",","));
            }catch (e) {
                $("#KhongKeKhaiThue").val(0);
                $("#KhongChiuThue").val(0);
                $("#KhongPhanTram").val(0);
                $("#NamPhanTram").val(0);
                $("#MuoiPhanTram").val(0);

                $("#ThueKhongKeKhaiThue").val(0);
                $("#ThueKhongChiuThue").val(0);
                $("#ThueKhongPhanTram").val(0);
                $("#ThueNamPhanTram").val(0);
                $("#ThueMuoiPhanTram").val(0);
            }
            $tongdoanhsobanra = $("#doanhsogtgtdaura").val();
            $tongthuedoanhsobanra = $("#thuegtgtdaura").val();

            $("#TongDoanhSo").val($tongdoanhsobanra);
            $("#ThueTongDoanhSo").val($tongthuedoanhsobanra);
        }
    loaddoanhso_banra();
    function tinhtongdoanhso() {
        $tongcong = 0;
        $KhongKeKhaiThue = $("#KhongKeKhaiThue").val().toString().split(",").join("");
        $KhongChiuThue = $("#KhongChiuThue").val().toString().split(",").join("");
        $KhongPhanTram = $("#KhongPhanTram").val().toString().split(",").join("");
        $NamPhanTram = $("#NamPhanTram").val().toString().split(",").join("");
        $MuoiPhanTram = $("#MuoiPhanTram").val().toString().split(",").join("");
        $tongcong = parseInt($KhongKeKhaiThue)+parseInt($KhongChiuThue)+parseInt($KhongPhanTram)+parseInt($NamPhanTram)+parseInt($MuoiPhanTram);
        ///console.log($tongcong);
        return $tongcong;
    }
    function tinhtongthuedoanhso() {
        $tongcong = 0;
        $ThueKhongKeKhaiThue = $("#ThueKhongKeKhaiThue").val().toString().split(",").join("");
        $ThueKhongChiuThue = $("#ThueKhongChiuThue").val().toString().split(",").join("");
        $ThueKhongPhanTram = $("#ThueKhongPhanTram").val().toString().split(",").join("");
        $ThueNamPhanTram = $("#ThueNamPhanTram").val().toString().split(",").join("");
        $ThueMuoiPhanTram = $("#ThueMuoiPhanTram").val().toString().split(",").join("");
        $tongcong = parseInt($ThueKhongKeKhaiThue)+parseInt($ThueKhongChiuThue)+parseInt($ThueKhongPhanTram)+parseInt($ThueNamPhanTram)+parseInt($ThueMuoiPhanTram);
        ///console.log($tongcong);
        return $tongcong;
    }
	$("#KhongKeKhaiThue").keyup(function(){
        $tongcong = tinhtongdoanhso();
        $("#TongDoanhSo").val($.number($tongcong,0,".",","));
    });
    $("#KhongChiuThue").keyup(function(){
        $tongcong = tinhtongdoanhso();
        $("#TongDoanhSo").val($.number($tongcong,0,".",","));
    });
    $("#KhongPhanTram").keyup(function(){
        $tongcong = tinhtongdoanhso();
        $("#TongDoanhSo").val($.number($tongcong,0,".",","));
    });
    $("#NamPhanTram").keyup(function(){
        $tongcong = tinhtongdoanhso();
        $("#TongDoanhSo").val($.number($tongcong,0,".",","));
    });
    $("#MuoiPhanTram").keyup(function(){
        $tongcong = tinhtongdoanhso();
        $("#TongDoanhSo").val($.number($tongcong,0,".",","));
    });

    $("#ThueKhongKeKhaiThue").keyup(function(){
        $tongcong = tinhtongthuedoanhso();
        $("#ThueTongDoanhSo").val($.number($tongcong,0,".",","));
    });
    $("#ThueKhongChiuThue").keyup(function(){
        $tongcong = tinhtongthuedoanhso();
        $("#ThueTongDoanhSo").val($.number($tongcong,0,".",","));
    });
    $("#ThueKhongPhanTram").keyup(function(){
        $tongcong = tinhtongthuedoanhso();
        $("#ThueTongDoanhSo").val($.number($tongcong,0,".",","));
    });
    $("#ThueNamPhanTram").keyup(function(){
        $tongcong = tinhtongthuedoanhso();
        $("#ThueTongDoanhSo").val($.number($tongcong,0,".",","));
    });
    $("#ThueMuoiPhanTram").keyup(function(){
        $tongcong = tinhtongthuedoanhso();
        $("#ThueTongDoanhSo").val($.number($tongcong,0,".",","));
    });

 function ChucNang_CapNhat_MatKhau(){
     var chitietds_json = '{"tongtien":0,"tongthue":0,"tongtienbr":0,"tongthuebr":0,"chitienbr":{"0":{"tongtien":0,"tongthue":0},"5":{"tongtien":0,"tongthue":0},"10":{"tongtien":0,"tongthue":0},"0":{"tongtien":0,"tongthue":0},"k":{"tongtien":0,"tongthue":0},"kk":{"tongtien":0,"tongthue":0}}}';
     chitietds = $.parseJSON(chitietds_json);
     $KhongKeKhaiThue = $("#KhongKeKhaiThue").val().toString().split(",").join("");
     $KhongChiuThue = $("#KhongChiuThue").val().toString().split(",").join("");
     $KhongPhanTram = $("#KhongPhanTram").val().toString().split(",").join("");
     $NamPhanTram = $("#NamPhanTram").val().toString().split(",").join("");
     $MuoiPhanTram = $("#MuoiPhanTram").val().toString().split(",").join("");
     $tongdoanhsobanra = $("#TongDoanhSo").val();

     $ThueKhongKeKhaiThue = $("#ThueKhongKeKhaiThue").val().toString().split(",").join("");
     $ThueKhongChiuThue = $("#ThueKhongChiuThue").val().toString().split(",").join("");
     $ThueKhongPhanTram = $("#ThueKhongPhanTram").val().toString().split(",").join("");
     $ThueNamPhanTram = $("#ThueNamPhanTram").val().toString().split(",").join("");
     $ThueMuoiPhanTram = $("#ThueMuoiPhanTram").val().toString().split(",").join("");
     $thuetongdoanhsobanra = $("#ThueTongDoanhSo").val();

     chitietds.tongtienbr = $tongdoanhsobanra;
     chitietds.chitienbr.kk.tongtien = $KhongKeKhaiThue;
     chitietds.chitienbr.k.tongtien = $KhongChiuThue;
     chitietds.chitienbr[0].tongtien = $KhongPhanTram;
     chitietds.chitienbr[5].tongtien = $NamPhanTram;
     chitietds.chitienbr[10].tongtien = $MuoiPhanTram;

     chitietds.tongthuebr = $thuetongdoanhsobanra;
     chitietds.chitienbr.kk.tongthue = $ThueKhongKeKhaiThue;
     chitietds.chitienbr.k.tongthue = $ThueKhongChiuThue;
     chitietds.chitienbr[0].tongthue = $ThueKhongPhanTram;
     chitietds.chitienbr[5].tongthue = $ThueNamPhanTram;
     chitietds.chitienbr[10].tongthue = $ThueMuoiPhanTram;

     var string = JSON.stringify(chitietds);

     $("#chitietdsdaura").val(string);
     $("#doanhsogtgtdaura").val($tongdoanhsobanra);
     $("#thuegtgtdaura").val($thuetongdoanhsobanra);
     xoadialog();
 }
dialog =$( "#dialog-capnhat_matkhau").dialog({
  resizable: false,
  height: "auto",
  width: 450,
  modal: true,
  buttons: {
    "Đồng ý":ChucNang_CapNhat_MatKhau,
    "Kết thúc": function() {
      $( this ).dialog( "close" );
	  xoadialog();
    }
  }
});
form = dialog.find("#Form-CapNhap_MatKhau").on("submit", function(event) {
                event.preventDefault();
                ChucNang_CapNhat_MatKhau();
        });
} );
</script>