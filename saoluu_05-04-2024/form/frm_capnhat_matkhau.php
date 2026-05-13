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
<div id="dialog-capnhat_matkhau" title="Cập nhật thông tin doanh nghiệp ">
<p class="validateTips"></p>
    <form method="post" id="Form-CapNhap_MatKhau" enctype="multipart/form-data">
        <fieldset>
            <table class="table-dialog">
                <tr>
                    <td colspan="2">
                        <label for="name" style="font-weight: bold;">Tên đăng nhập</label><input type="text" name="TenDangNhap" id="TenDangNhap" required=""  value="<?php echo $_SESSION['User']; ?>" readonly="true" class="text ui-widget-content ui-corner-all" style="width:65%" />
                    </td>

                </tr>
                <tr>
                    <td colspan="2">
                        <label for="name" style="font-weight: bold;">Mật khẩu cũ</label><input type="password" name="MatKhauCu" id="MatKhauCu" required=""  value="" class="text ui-widget-content ui-corner-all" style="width:65%" />
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <label for="name" style="font-weight: bold;">Mật khẩu mới</label><input type="password" name="MatKhauMoi" id="MatKhauMoi" required=""  value="" class="text ui-widget-content ui-corner-all" style="width:65%" />
                    </td>
                </tr>
                <tr>
                <td colspan="2"><label for="name" style="font-weight: bold;">Xác nhận</label><input type="password" name="XacNhan" id="XacNhan" required=""  value="" class="text ui-widget-content ui-corner-all" style="width:65%" /></td>
                </tr>
            </table>
      <!-- Allow form submission with keyboard without duplicating the dialog button -->
      <input type="submit" accesskey="enter" tabindex="-1" style="position:absolute; top:-1000px"/>
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
 function ChucNang_CapNhat_MatKhau(){
    var valid = true;
    allFields.removeClass("ui-state-error"); // kiem tra du lieu
    valid = valid && checkLength(TenDangNhap, " Tên đăng nhập ", 2, 20);
    valid = valid && checkLength(MatKhauCu, " Mật khẩu cũ ", 2, 20);
    valid = valid && checkLength(MatKhauMoi, " Mật khẩu mới ", 8, 20);
    valid = valid && checkLength(XacNhan, " Xác nhận mật khẩu ", 8, 20);
    valid = valid && checkConfirm(MatKhauMoi,XacNhan," Mật khẩu ", " Xác nhận ");
    valid = valid && checkTonTai(TenDangNhap,MatKhauCu," Tên đăng nhập hoặc mật khẩu cũ ");
     var Reg_MatKhau = new RegExp("^(?=.{8,})(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*\\W).*$");
     valid = valid && checkRegexp(MatKhauMoi,Reg_MatKhau, " Mật khẩu phải có HOA, thường, số và ký tự đặc biệt (Ví dụ : Abcd@1234).");
            if (valid) {
            $.ajax({
                url: $dir_module + "edit.php", // Thay dổi file
                type: "GET", // chọn phương thức gửi là get
                dateType: "text", // dữ liệu trả về dạng text
                data: { // Danh sách các thuộc tính sẽ gửi đi
                    pass:MatKhauMoi.val().trim(),
                    user:TenDangNhap.val().trim()
                },
                success: function(result) {
                    // Sau khi gửi và kết quả trả về thành công thì gán nội dung trả về
                    $('.validateTips').html(result);
                    $.confirm({
                        title: 'Thông báo',
                        content: ' Cập nhật dữ liệu thành công.',
                        autoClose: 'OK|1000',
                        icon: 'fa fa-spinner fa-spin',
                        type: 'green',
                        buttons: {
                            OK: function() {
                                xoadialog();
                            }
                        }
                    });
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