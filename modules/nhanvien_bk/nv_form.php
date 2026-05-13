<?php 
    require("../../config.php");
    $MaNhanVien = $_GET['MaNhanVien'];
    $nhanvien = new Nhanvien;
    $nhanvien->set_MaNhanVien($MaNhanVien);
    $row = $nhanvien->getNhanVien();
    $title = "";
    $loai = $_GET['item'];
    if($loai =="Copy"){
        $namefile = "add_nhanvien";// file để ajax xử lý
         $title = "Sao chép Thông nhân viên";
    }
    if($loai =="Edit"){
        $namefile = "edit";
         $title = "Sửa thông tin nhân viên";
    }
    if($loai =="Add"){
        $namefile = "add";
         $title = "Thêm thông tin nhân viên";
    }
?>
  
  <style>
    #Form-chinh label, input { display:block !important; font-weight: bold !important;font-size: 14px;font-family: Arial,Lucida Grande, Lucida Sans, sans-serif;}
    #Form-chinh input.text { margin-bottom:12px !important; width:95% !important; padding: .4em !important;font-size: 14px;font-family: Arial,Lucida Grande, Lucida Sans, sans-serif;font-weight: normal; }
    #Form-chinh fieldset { padding:0; border:0; margin-top:25px; }
    #Form-chinh h1 { font-size: 1.2em; margin: .6em 0; }
    div#users-contain { width: 350px; margin: 20px 0; }
    div#users-contain table { margin: 1em 0; border-collapse: collapse; width: 100%; }
    div#users-contain table td, div#users-contain table th { border: 1px solid #eee; padding: .6em 10px; text-align: left; }
    .ui-dialog .ui-state-error { padding: .3em; }
    .validateTips { border: 1px solid transparent; padding: 0.3em; }
    .ui-draggable, .ui-droppable {
	background-position: top;   
}
    .table-dialog{
        width: 100%;
    }
    .red{color:red;}
    .table-dialog .td-left{
        width: 40%;
         padding-right:20px;
    }
    .table-dialog .td-right{
        width: 40%;
    }
</style>
<?php
loadFormNV($title,$row,$loai);// Load form nhân viên
function loadFormNV($title,$row,$loai){
    ?>
    <div id="dialog-form" title="<?php echo $title; ?>">
  <p class="validateTips">Dấu (<span class="red">*</span>) bắt buộc phải nhập .</p>
  <form method="post" id="Form-chinh"  enctype="multipart/form-data">
    <fieldset>
    <table class="table-dialog">
        <tr>
            <td colspan="2">
                <label for="name">Mã nhân viên (<span class="red">*</span>)</label>
                <input type="text" name="MaNhanVien" id="MaNhanVien" value="<?php if($loai=="Edit"){ echo $row['MaNhanVien']; } ?>" required="require" <?php if($loai=="Edit"){ ?>readonly="true" <?php } ?> accept="" placeholder="Mã nhân viên" class="text ui-widget-content ui-corner-all"/>
            </td>
        </tr>
        <tr>
            <td class="td-left">
               <label for="name">Họ và tên lót (<span class="red">*</span>)</label>
                <input type="text" name="HoNhanVien" value="<?php echo $row['HoNhanVien']; ?>" id="HoNhanVien" required="require" placeholder="Họ và tên lót" class="text ui-widget-content ui-corner-all"/>
            </td>
            <td class="td-right">
                <label for="name">Tên nhân viên (<span class="red">*</span>)</label>
                <input type="text" name="TenNhanVien" id="TenNhanVien" required="require" value="<?php echo $row['TenNhanVien']; ?>" placeholder="Tên nhân viên" class="text ui-widget-content ui-corner-all"/>
            </td>
        </tr>
        <tr>
            <td class="td-left">
               <label for="name">Ngày sinh (<span class="red">*</span>)</label>
                <input type="text" name="NgaySinh" id="NgaySinh" value="<?php echo $row['NgaySinh']; ?>" required="require" placeholder="Ngày sinh" class="text ui-widget-content ui-corner-all"/>
            </td>
            <td class="td-right">
                <label for="name">Hình ảnh </label><span style="color: blue;" id="thongbaoupfile"><?php echo "<input type='hidden' id='HinhAnhAn' name='HinhAnhAn' value='".$row['HinhAnh']."' />"; ?></span>
                <input type="file" name="HinhAnh" id="HinhAnh" value="" class="text ui-widget-content ui-corner-all"/>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <label for="email">Email(<span class="red">*</span>)</label>
                <input type="text" name="Email" id="Email" required="require" value="<?php echo $row['Email']; ?>" placeholder="Email" class="text ui-widget-content ui-corner-all"/>
            </td>
        </tr>
         <tr>
            <td colspan="2">
                <label for="email">Tên đăng nhập(<span class="red">*</span>)</label>
                <input type="text" name="TenDangNhap" id="TenDangNhap" required="require" value="<?php if($loai=="Edit"){ echo $row['TenDangNhap']; } ?>" placeholder="Tên đăng nhập" class="text ui-widget-content ui-corner-all"/>
            </td>
        </tr>
         <tr>
            <td class="td-right">
                <label for="password">Mật Khẩu(<span class="red">*</span>)</label>
                <input type="password" name="Password" id="Password" required="require" value="<?php if($loai=="Edit"){ echo $row['MatKhau']; } ?>" class="text ui-widget-content ui-corner-all"/>
            </td>
             <td class="td-right">
                <label for="password">Nhập Lại(<span class="red">*</span>)</label>
                <input type="password" name="Repassword" id="Repassword" required="require" value="<?php if($loai=="Edit"){ echo $row['MatKhau']; } ?>" class="text ui-widget-content ui-corner-all"/>
            </td>
        </tr>
    </table>
      <!-- Allow form submission with keyboard without duplicating the dialog button -->
      <input type="submit" accesskey="enter" tabindex="-1" style="position:absolute; top:-1000px"/>
    </fieldset>
  </form>
</div>
<?php
}
ThongBaoFull("Thông Báo","Đang cập nhật dữ liệu","process.gif"); // gọi hàm từ file function.php
?>
  <script>
  $dir_module = "modules/nhanvien/";
  $( function() {
    var dialog, form, 
      emailRegex = /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/,
      MaNhanVien =      $("#MaNhanVien" ),
      HoNhanVien =      $("#HoNhanVien"),
      TenNhanVien =     $("#TenNhanVien"),
      NgaySinh =        $("#NgaySinh"),
      HinhAnh =         $("#HinhAnh"),
      Email =           $("#Email"),
      TenDangNhap =     $("#TenDangNhap"),
      Password =        $("#Password"),
      Repassword =      $("#Repassword"),
      allFields = $( [] ).add( MaNhanVien ).add( HoNhanVien ).add( TenNhanVien ).add( NgaySinh ).add( HinhAnh ).add( Email ).add( TenDangNhap ).add( Password ).add( Repassword ),
      tips = $( ".validateTips" ); // khai bao bien
 
    function updateTips( t ) {
      tips
        .text( t )
        .addClass( "ui-state-highlight" );
      setTimeout(function() {
        tips.removeClass( "ui-state-highlight", 1500 );
      }, 500 );
    }
 
    function checkLength( o, n, min, max ) {
      if ( o.val().length > max || o.val().length < min ) {
        o.addClass( "ui-state-error" );
        updateTips( "Chiều dài của " + n + " phải nằm giữa " +
          min + " và " + max + "." );
        return false;
      } else {
        return true;
      }
    }
    
    function checkNull( o, n, min, max ) {
      if ( o.val().length > max || o.val().length < min ) {
        o.addClass( "ui-state-error" );
        updateTips( "Chiều dài của " + n + " phải có " +
          min + " ký tự ." );
        return false;
      } else {
        return true;
      }
    }
    
    function checkSame(o,$tring1,$string2){
        if($tring1.val()!=$string2.val()){
            o.addClass( "ui-state-error" );
            updateTips( "Hai mật khẩu không giống nhau ");
            return false;
        }else{
            return true;
        }
    }
    function resetdialog(){
        $(".ui-dialog").html("");
         $(".dialog_main").html("");
        $("#ui-datepicker-div").html("");
        
    }
    function checkRegexp( o, regexp, n ) {
      if ( !( regexp.test( o.val() ) ) ) {
        o.addClass( "ui-state-error" );
        updateTips( n );
        return false;
      } else {
        return true;
      }
    }
 
    function ChucNang() {
      var valid = true;
      allFields.removeClass("ui-state-error" );// kiem tra du lieu
 
      valid = valid && checkNull( MaNhanVien, "Mã nhân viên", 6, 6 );
      valid = valid && checkLength( HoNhanVien, "Họ nhân viên", 2, 80 );
      valid = valid && checkLength( TenNhanVien, "Tên nhân viên", 1, 16 );
      valid = valid && checkLength( NgaySinh, "Ngày sinh", 6, 16 );
      valid = valid && checkLength( Email, "Email", 6, 80 );
      valid = valid && checkLength( TenDangNhap, "Tên đăng nhập", 3, 16 );
      valid = valid && checkLength( Password, "Mật khẩu", 5, 16 );
      valid = valid && checkLength( Repassword, "Xác nhận", 5, 16 );
      //valid = valid && checkSame( Password, "Xác nhận" );
 
      //valid = valid && checkRegexp( TenNhanVien, /^[a-z]([0-9a-z_\s])+$/i, "Username may consist of a-z, 0-9, underscores, spaces and must begin with a letter." );
      valid = valid && checkRegexp( Email, emailRegex, "eg. ui@jquery.com" );
      valid = valid && checkRegexp( Password, /^([0-9a-zA-Z])+$/, "Mật khẩu chỉ chấp nhận  : chữ và số" );
      valid = valid && checkRegexp( Repassword, /^([0-9a-zA-Z])+$/, "Xác nhận mật khẩu chỉ chấp nhận  : chữ và số" );
      //alert(valid);
      if ( valid ) {
                $.ajax({
                    url : $dir_module+"<?php echo $namefile;  ?>.php", // Thay dổi file
                    type : "get", // chọn phương thức gửi là get
                    dateType:"text", // dữ liệu trả về dạng text
                    data : { // Danh sách các thuộc tính sẽ gửi đi
                            Edit: true,
                            MaNhanVien : MaNhanVien.val(),
                            HoNhanVien : HoNhanVien.val(),
                            TenNhanVien: TenNhanVien.val(),
                            NgaySinh   : NgaySinh.val(),
                            HinhAnh    : $("#HinhAnhAn").val(),
                            Email      : Email.val(),
                            TenDangNhap: TenDangNhap.val(),
                            Password   : Password.val()
                    },
                    success : function (result){
                        // Sau khi gửi và kết quả trả về thành công thì gán nội dung trả về
                        $('.validateTips').html(result);
                        dialog_thongbao.dialog("open");
                        setTimeout(function(){
                            resetdialog();  // xóa dữ liệu trên class dialog
                            dialog_thongbao.dialog("close");
                            dialog.dialog("close");
                        },500)
                         
                        $(".loadGird_main").flexReload();
                        //reFresh();
                    }
                });     
     }
      return valid;
    }
 
    dialog = $( "#dialog-form" ).dialog({
      autoOpen: false,
      height: 600,
      width: 750,
      modal: true,
      buttons: {
        "Cập nhật": ChucNang,
        Cancel: function() {
          dialog.dialog("close");
          resetdialog();
        }
      }
    });
    form = dialog.find( "#Form-chinh" ).on( "submit", function( event ) {
          event.preventDefault();
          ChucNang();
          $(".loadGird_main").flexReload();
        });

    $(function() {
            $( "#NgaySinh" ).datepicker();
         });
      dialog.dialog("open");

  } );
  
    $(document).ready(function (e) {// Upload file lên server
	$("#Form-chinh").on('change',(function(e) {
		e.preventDefault();
		$.ajax({
        	url: $dir_module+"uploadfile.php",
			type: "POST",
			data:  new FormData(this),
			contentType: false,
    	    cache: false,
			processData:false,
			success: function(data)
		    {
			  $("#thongbaoupfile").html(data);
		    },
		  	error: function() 
	    	{
	    	  //alert(345);
	    	} 	        
	   });
	}));
});
  </script>