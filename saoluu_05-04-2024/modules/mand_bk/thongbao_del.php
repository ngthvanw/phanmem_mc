<?php 
    require("../../config.php");
    $MaTK = $_GET['id']; 
?>
  <script>
  $dir_module = "modules/httk/";
  //$MaNhanVien = <?php echo $_GET['MaNhanVien']; ?>;
  $( function() {
       function resetdialog(){
        $(".ui-dialog").html("");
        $(".ui-datepicker").html("");
        $(".dialog_main").html("");
        
    }
    function ChucNang() {
      var valid = true;
      if ( valid ) {
                $.ajax({
                    url : $dir_module+"del.php", // gửi ajax đến file result.php
                    type : "get", // chọn phương thức gửi là get
                    dateType:"text", // dữ liệu trả về dạng text
                    data : { // Danh sách các thuộc tính sẽ gửi đi
                            Del: true,
                            MaNhanVien :"<?php echo ($MaNhanVien_str); ?>"

                    },
                    success : function (result){
                        // Sau khi gửi và kết quả trả về thành công thì gán nội dung trả về
                        dialog_thongbao.dialog("open");
                        setTimeout(function(){
                            //dialog_thongbao.dialog("close");

                        },500)
                        dialog.dialog("close");
                        $(".loadGird_main").flexReload();
                        resetdialog();
                    }
                });     
     }
      return valid;
    }
 
      dialog = $( "#dialog-form" ).dialog({
      autoOpen: false,
      height: 200,
      width: 320,
      modal: true,
      buttons: {
        "Chấp nhận": ChucNang,
        Cancel: function() {
          $(this).dialog('close');
          resetdialog();
        }
      }
    });
    form = dialog.find( "#Form-chinh" ).on( "submit", function( event ) {
      event.preventDefault();
      ChucNang();
    });
      dialog.dialog("open");
  } );  
</script>
<?php
ThongBaoFull("Thông báo","Đang xóa thông tin","process.gif");
$title = "Bạn đang chuẩn bị xóa  $count dòng dữ liệu ?";
?>
<div id="Form-chinh" title="Xác nhận">
  <form method="post"  style="display: ;">
     <table>
        <tr>
            <td><img src="<?php echo $URI; ?>/images/canhbao.jpg" style="width: 40px;" /></td>
            <td><span style="margin-top: -10px;"><?php echo $title; ?></span></td>
        </tr>
      </table>
      <input type="submit" tabindex="-1" style="position:absolute; top:-1000px"/>
  </form>
</div>
