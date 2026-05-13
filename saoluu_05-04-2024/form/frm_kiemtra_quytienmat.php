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
<div id="dialog-capnhat_matkhau" title="KIỂM TRA QUỸ TIỀN MẶT">
<p class="validateTips"></p>
    <form method="post" id="Form-CapNhap_MatKhau" enctype="multipart/form-data">
        <fieldset>
            <table class="table-dialog">
                <tr>
                    <td colspan="2">
                        <label for="name" style="font-weight: bold;">Mã TK</label><input type="text" name="matk" id="matk" required="" readonly  value="1111" class="text ui-widget-content ui-corner-all" style="width:65%" />
                    </td>

                </tr>
                <tr>
                    <td colspan="2">
                        <label for="name" style="font-weight: bold;">Tên TK</label><input type="text" name="tentk" id="tentk" required=""   value="TIỀN VIỆT NAM" class="text ui-widget-content ui-corner-all" style="width:65%" />
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <label for="name" style="font-weight: bold;">Giới hạn tồn</label><input type="text" onkeyup="return format_munber(this.value,'#gioihanton')" name="gioihanton" id="gioihanton" required=""   value="" class="text ui-widget-content ui-corner-all" style="width:65%;text-align: right;" />
                    </td>
                </tr>
             </table>
      <!-- Allow form submission with keyboard without duplicating the dialog button -->
      <input type="submit" accesskey="enter" tabindex="-1" style="position:absolute; top:-1000px"/>
    </fieldset>
  </form>
</div>
<script>
$( function() {
    $dir_module_kiemtradulieu = "modules/kiemtradulieu/";////////////////Khai báo đường dẫn vào mudole
function xoadialog(){
	reset_dialog(".dialog-capnhat_matkhau");
}
 var dialog, form,
                emailRegex = /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/,
                matk = $("#matk"),
                tentk = $("#tentk"),
                 gioihanton = $("#gioihanton"),
                allFields = $([]).add(matk).add(tentk).add(gioihanton),
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

 function ChucNang_KiemTraDuLieu_BCTC(){
    var valid = true;
     valid = valid && checkNull(gioihanton, " Giới hạn tồn quỹ ");
    allFields.removeClass("ui-state-error"); // kiem tra du lieu
            if (valid) {
                $.confirm({
                    title: 'THÔNG BÁO',
                    type: 'green',
                    columnClass: 'col-md-12',
                    buttons: {
                        "KẾT THÚC": {
                            btnClass: 'btn-blue',
                            action: function(){}
                        }

                    },
                    content: 'url:'+ $dir_module_kiemtradulieu + 'kiemtradulieu_bctc.php?matk='+$("#matk").val().trim()+'&tentk='+$("#tentk").val().trim()+'&gioihanton='+$("#gioihanton").val().trim(),
                    contentLoaded: function(data, status, xhr){

                    }
                });

        }
        return valid;
    } 
dialog =$( "#dialog-capnhat_matkhau").dialog({
  resizable: false,
  height: "auto",
  width: 450,
  modal: true,
  buttons: {
    "Kiểm tra":ChucNang_KiemTraDuLieu_BCTC,
    "Kết thúc": function() {
      $( this ).dialog( "close" );
	  xoadialog();
    }
  }
});
form = dialog.find("#Form-CapNhap_MatKhau").on("submit", function(event) {
                event.preventDefault();
                ChucNang_KiemTraDuLieu_BCTC();
        });
} );
</script>