<?php 
    $matk = $_GET['id'];
        $warring = "Bạn có chắc xóa mã tài khoản $matk không ? ";

?>
  <script>
  $( function() {
    $dir_module="modules/httk/"
    function xoa(){
                $.ajax({
                    url : $dir_module+"del.php", // gửi ajax đến file result.php
                    type : "get", // chọn phương thức gửi là get
                    dateType:"text", // dữ liệu trả về dạng text
                    data : { // Danh sách các thuộc tính sẽ gửi đi
                            Del: true,
                            id :"<?php echo ($matk); ?>"

                    },
                    success : function (result){
                        // Sau khi gửi và kết quả trả về thành công thì gán nội dung trả về
                        if(result==1){
                            dialog.dialog("close");
                            $tieude=("Chú_ý");
                            $info=("Không_thể_xóa_dữ_liệu_,vui_lòng_kiểm_tra_trước_khi_xóa_.");
                            $('.dialog_main_thongbao').load("form/thongbao.php?title="+$tieude+"&info="+$info);                            
                        }else{
                            dialog_thongbao.dialog("open");
                            setTimeout(function(){
                            dialog_thongbao.dialog("close");
    
                            },500)
                            dialog.dialog("close");
                        }
                    }
                });
    }
    dialog = $( "#dialog-form" ).dialog({
      autoOpen: true,
      height: 200,
      width: 320,
      modal: true,
      buttons: {
        "Đồng ý":xoa,
        "Hủy bỏ": function() {
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
