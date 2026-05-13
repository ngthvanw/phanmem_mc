<?php 
    require("../../config.php");
    $MaDVT = $_GET['MaDVT'];
    $donvitinh = new Donvitinh;
    $donvitinh->set_MaDVT($MaDVT);
    $row = $donvitinh->getDonViTinh();
    $title = "";
    $loai = $_GET['item'];
    if($loai =="Copy"){
        $namefile = "add";// file để ajax xử lý
         $title = "Sao chép Thông đơn vị tính";
    }
    if($loai =="Edit"){
        $namefile = "edit";
         $title = "Sửa thông tin đơn vị tính";
    }
    if($loai =="Add"){
        $namefile = "add";
         $title = "Thêm thông tin đơn vị tính";
    }
?>  
  <style>
    #Form-chinh label,input { display:block !important; font-weight: bold !important;font-size: 14px;font-family: Arial,Lucida Grande, Lucida Sans, sans-serif;}
    #Form-chinh input.text,textarea { margin-bottom:12px !important; width:95% !important; padding: .4em !important;font-size: 14px;font-family: Arial,Lucida Grande, Lucida Sans, sans-serif;font-weight: normal; }
    #Form-chinh textarea { margin-bottom:12px !important; width:98% !important;font-size: 14px;font-family: Arial,Lucida Grande, Lucida Sans, sans-serif;font-weight: normal; }
    #Form-chinh fieldset { padding-left:20px;padding-right: 20px; border:1px solid #87b6da; margin-top:0px;}
    #Form-chinh legend { padding:0px; margin-top:10px;font-weight: bold;color: #2e6e9e;}
    #Form-chinh h1 { font-size: 1.2em; margin: .6em 0; }
    div#users-contain { width: 350px; margin: 20px 0; }
    div#users-contain table { margin: 1em 0; border-collapse: collapse; width: 100%; }
    div#users-contain table td, div#users-contain table th { border: 1px solid #eee; padding: .6em 10px; text-align: left; }
    .ui-dialog .ui-state-error { padding: 0; color: red; font-weight: bold;}
    .validateTips { border: 1px solid transparent; padding: 0; color: red; }
    .ui-draggable, .ui-droppable {background-position: top;}
    .table-dialog{width: 100%;}
    .red{color:red;}
    .table-dialog .td-left{width: 40%;padding-right:20px;}
    .table-dialog .td-right{width: 40%;}
</style>
<?php
    loadFormNV($title,$row,$loai);// Load form nhân viên
    function loadFormNV($title,$row,$loai){
?>
    <div id="dialog-form" title="<?php echo $title; ?>">
      <p class="validateTips">Dấu (<span class="red">*</span>) bắt buộc phải nhập .</p>
      <form method="post" id="Form-chinh"  enctype="multipart/form-data">
        <table class="table-dialog">
            <tr>
                <td class="td-left">
                    <label for="name">Mã ĐVT (<span class="red">*</span>)</label>
                    <input type="text" name="MaDVT" id="MaDVT" value="<?php if($loai=="Edit"){ echo $row['MaDVT']; } ?>" required="require" <?php if($loai=="Edit"){ ?>readonly="true" <?php } ?> accept="" placeholder="Mã đơn vị tính" class="text ui-widget-content ui-corner-all"/>
                </td>
                <td class="td-right">
                   <label for="name">Tên ĐVT (<span class="red">*</span>)</label>
                   <input type="hidden" id="CheckKey" />
                   <input type="hidden" id="loai" value="<?php echo $loai ?>" />
                   <input type="text" name="TenDVT" value="<?php echo $row['TenDVT']; ?>" id="TenDVT" required="require" placeholder="Tên đơn vị tính" class="text ui-widget-content ui-corner-all"/>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <label for="name">Ghi chú(<span class="red">*</span>)</label>
                    <textarea name="GhiChu" id="GhiChu" required="require" placeholder="Ghi chú" class="text ui-widget-content ui-corner-all" >
                        <?php echo $row['GhiChu']; ?>
                    </textarea>
                </td>
            </tr>
        </table>
          <!-- Allow form submission with keyboard without duplicating the dialog button -->
          <input type="submit" accesskey="enter" tabindex="-1" style="position:absolute; top:-1000px"/>
      </form>
    </div>
<?php
}
ThongBaoFull("Thông Báo","Đang cập nhật dữ liệu","process.gif"); // gọi hàm từ file function.php
?>
  <script>
  $dir_module = "modules/donvitinh/";///////////////////////////////////////// Sửa khi copy
  $( function() {
    var dialog, form, 
      emailRegex = /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/,
      MaDVT =      $("#MaDVT" ),
      TenDVT =      $("#TenDVT"),
      GhiChu =     $("#GhiChu"),
      allFields = $( [] ).add( MaDVT ).add( TenDVT ).add( GhiChu ),
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
          o.focus();
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
    function checkKey() {
       if($("#CheckKey").val()==1){
         $("#CheckKey").addClass( "ui-state-error");
         updateTips( " Mã đơn vị tính đã tồn tại !");
         return false;
       }else{
         return true;
       }
    }
    $("#MaDVT").blur(function(){ // kiểm tra mã khi nhấn phim
        var txt = $("#MaDVT").val();
        var loai = $("#loai").val();
        if(txt!="" && loai!="Edit"){
            $.get($dir_module+"checkkey.php", {MaDVT: txt}, function(result){
               if(result>0){
                $("#MaDVT").addClass( "ui-state-error");
                updateTips( " Mã đơn vị tính đã tồn tại !");  
                 $("#CheckKey").val("1");      
               }else{
                    $("#MaDVT").removeClass( "ui-state-error");
                    updateTips( " Có thể sử dụng mã này .");
                    $("#CheckKey").val("0");
               }
            });
        }
    });
    
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
 
      valid = valid && checkNull( MaDVT, "Mã đơn vị tính ", 2, 2 );
      valid = valid && checkLength( TenDVT, "Tên đơn vị tính", 2, 80 );
      valid = valid && checkKey();

      if ( valid ) {
                $.ajax({
                    url : $dir_module+"<?php echo $namefile;  ?>.php", // Thay dổi file
                    type : "get", // chọn phương thức gửi là get
                    dateType:"text", // dữ liệu trả về dạng text
                    data : { // Danh sách các thuộc tính sẽ gửi đi
                            Edit: true,
                            MaDVT : MaDVT.val(),
                            TenDVT : TenDVT.val(),
                            GhiChu: GhiChu.val(),
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
                        chonhanggird();
                    }
                });     
     }
      return valid;
    }
 
    dialog = $( "#dialog-form" ).dialog({
      autoOpen: false,
      height: 370,
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

      dialog.dialog("open");

  } );
  </script>