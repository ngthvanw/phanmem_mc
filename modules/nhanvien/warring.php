<?php 
    $title = $_GET['title'];
    if($title==1){
        $warring = "Vui lòng chọn dữ liệu để xóa !";
    }
    if($title==2){
        $warring = "Vui lòng chọn dữ liệu để sửa !";
    }
    if($title==3){
        $warring = "Không thể chọn lớn hơn 2 dòng !";
    }
?>
  <script>
  $( function() {
    dialog = $( "#dialog-form" ).dialog({
      autoOpen: true,
      height: 200,
      width: 320,
      modal: true,
      buttons: {
        Cancel: function() {
          dialog.dialog("close");
        }
      }
    });

    dialog.dialog("open");
  } );
  </script>
<div id="dialog-form" title="Cảnh báo">
      <table>
        <tr>
            <td><img src="<?php echo $URI; ?>images/canhbao.jpg" style="width: 40px;" /></td>
            <td><span style="margin-top: -10px;"><?php echo $warring; ?></span></td>
        </tr>
      </table>
</div>
