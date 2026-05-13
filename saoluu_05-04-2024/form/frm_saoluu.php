<?php 
session_start();
    require("../config.php");
?>
  <style>
    #Form-saoluu label{margin-top:7px;float: left; border:0px solid red;width:150px;display:block !important; font-weight: bold !important;font-size: 12px;font-family: Arial,Lucida Grande, Lucida Sans, sans-serif;}
    #Form-saoluu input {float: left; display:block !important; font-weight: bold !important;font-size: 12px;font-family: Arial,Lucida Grande, Lucida Sans, sans-serif;}
    #Form-saoluu input.text {float: left; margin-bottom:4px !important; width:100%; padding: .4em !important;font-size: 12px;font-family: Arial,Lucida Grande, Lucida Sans, sans-serif;font-weight: normal; }
    #Form-saoluu fieldset { padding:0;padding-top: 6px; border:1px solid #7cc3f9; margin-top:0px; }
    #Form-saoluu .td-left input.text {float: left; margin-bottom:4px !important; width:60%; padding: .4em !important;font-size: 12px;font-family: Arial,Lucida Grande, Lucida Sans, sans-serif;font-weight: normal; }
    #Form-saoluu select{font-size: 12px;font-weight: bold;}
    #Form-saoluu h1 { font-size: 1.2em; margin: .6em 0; }
    div#users-contain { width: 350px; margin: 20px 0; }
    div#users-contain table { margin: 1em 0; border-collapse: collapse; width: 100%; }
    div#users-contain table td, div#users-contain table th { border: 1px solid #eee; padding: .6em 10px; text-align: left; }
    .ui-dialog .ui-state-error { padding: .3em; }
    .validateTips { border: 1px solid transparent; padding: 0.3em;margin-top: 0px !important;margin-bottom: 0px !important;color: red;font-weight: bold;text-align: center; }
    .ui-draggable, .ui-droppable {
	background-position: top;   
}
    .table-dialog_saoluu{
        width: 100%;
    }
    .red{color:red;}
    .table-dialog_saoluu .td-left{
        width: 50%;
        padding-right:20px;
    }
    .table-dialog_saoluu .td-right{
        width: 50%;
    }
    .table-dialog_saoluu .td-right input{
        float: left; margin-bottom:4px !important; width:65% !important;
        }
    .table-dialog_saoluu .td-left input{
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
<div id="dialog-saoluu" title="Sao lưu dữ liệu doanh nghiệp... ">
    <form method="post" id="Form-saoluu" enctype="multipart/form-data">
            <table class="table-dialog_saoluu" border=1 style="border: 1px solid #51b4dc">
                <tr>
                    <td style="border: 1px solid #51b4dc;font-weight: bold;" align="center" width="10%">STT</td>
                    <td style="border: 1px solid #51b4dc;font-weight: bold;" align="center" width="10%" >Tập tin</td>
                    <td style="border: 1px solid #51b4dc;font-weight: bold;" align="center" width="40%" >Nội dung</td>
                    <td style="border: 1px solid #51b4dc;font-weight: bold;" align="center" width="30%" >Ngày</td>
                    <td style="border: 1px solid #51b4dc;font-weight: bold;" align="center" width="10%" >...</td>
                </tr>
                <?php
                $OBJBK = new backup;
                $ListFile = $driver."/backup/".$_SESSION['MST']."_".$_SESSION['NienDo']."/";
                $ListBackup = scandir($ListFile);
                    //$ListBackup = $OBJBK->LoadListBackup_Retore();
                    $OBJBK->re_query("CREATE TABLE `saoluu_phuchoi` ( `sott` INT NOT NULL AUTO_INCREMENT , `mst` CHAR(50) NOT NULL , `tendn` VARCHAR(500) NOT NULL , `tenfile` VARCHAR(200) NOT NULL , `ngayluu` DATETIME NOT NULL , `noidung` VARCHAR(500) NOT NULL , PRIMARY KEY (`sott`)) ENGINE = InnoDB;");
                    $i=0;
                   foreach($ListBackup as $ItemBackup){
                if($ItemBackup!="." && $ItemBackup!="..") {
                    $i++;
                    ?>
                    <tr>
                        <td style="border: 1px solid #51b4dc;" align="center"><?php echo $i; ?></td>
                        <td style="border: 1px solid #51b4dc;" align="center"><a
                                    onclick="window.location.href='<?php echo $URI . "/backup/" . $_SESSION['MST'] . "_" . $_SESSION['NienDo'] . "/" . $ItemBackup; ?>'"
                                    href="#">Tải</a></td>
                        <td style="border: 1px solid #51b4dc;" align="left"><?php echo $ItemBackup; ?></td>
                        <td style="border: 1px solid #51b4dc;"
                            align="center"><?php echo date("d/m/Y h:m:s", (filemtime($ListFile.$ItemBackup))); ?></td>
                        <td style="border: 1px solid #51b4dc;" align="center"><a
                                    sid="<?php echo $ItemBackup['sott']; ?>" fid="<?php echo $ItemBackup; ?>"
                                    class="xoafile" href="#">Xoá</a></td>
                    </tr>
                    <?php
                }
                    }
                ?>
            </table>
      <!-- Allow form submission with keyboard without duplicating the dialog button -->
      <input type="submit" accesskey="enter" tabindex="-1" style="position:absolute; top:-1000px"/>
  </form>
</div>
  <script>
  $dir_module_saoluu = "modules/saoluu/"; ////////////////Khai báo đường dẫn vào mudole-----------------------------
  function taifilebackup($file){
            window.location.href = $file;
        }
$(function() {
        var dialog, form,
                emailRegex = /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/,
                allFields = $([]),
                tips = $(".validateTips"); // ///////////////////////////////////////////////////////////////////////////////khai bao bien

        function updateTips(t) { // Hiện thông báo khi lỗi
                tips
                        .text(t)
                        .addClass("ui-state-highlight");
                setTimeout(function() {
                        tips.removeClass("ui-state-highlight", 1500);
                }, 500);
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

        function xoadialog_saoluu() { // đóng form 
                reset_dialog(".dialog-saoluu");
                reset_dialog(".dialog_main_saoluu");
        }


        function ChucNang_saoluu() {
                var valid = true;
                allFields.removeClass("ui-state-error"); // kiem tra du lieu

                $act = "saoluu_phuchoi";
                if (valid) {
                            var noidung = prompt("Nhập vào nội dung cần sao lưu:");
                            if(noidung==null){
                                noidung="";
                            }
                            $.confirm({
                                    title: 'Thông báo',
                                    type: 'green',
                                    content: 'url:'+$dir_module_saoluu+$act+'.php?noidung='+noidung,
                                    contentLoaded: function(data, status, xhr){
                                    },
                                    
                                    buttons: {
                                        "Thoát": { keys: ['Y'],action: function () {
                                            $.ajax({
                                                        url: $dir_module_saoluu+"load_list_backup_restore.php",
                                                        async: false,
                                                        success: function (response) {
                                                            $(".table-dialog_saoluu").html(response);
                                                        }
                                                });
                                            }
                                        }
                                    }
                                });
                }
                return valid;
        }

        dialog = $("#dialog-saoluu").dialog({
                autoOpen: false,
                height: "auto",
                width: 700,
                modal: true,
                buttons: {
                        "Sao lưu": ChucNang_saoluu,
                        "Kết thúc": function() {
                                xoadialog_saoluu();
                        }
                }
        });
        form = dialog.find("#Form-saoluu").on("submit", function(event) {
                event.preventDefault();
                ChucNang_saoluu();
        });
        dialog.dialog("open");

});
  $(".xoafile").on("click", function() {
      $sott = this.getAttribute('sid');
      $fid = this.getAttribute('fid');
      $.confirm({// Cảnh báo khi phục hồi dữ liệu
          title: 'Chú ý',
          content: 'Bạn muốn xoá tập tin này không ?',
          icon: 'fa fa-warning',
          type: 'red',
          buttons: {
              "Đồng ý": {
                  keys: ['Y'], action: function () {
                      $.confirm({
                          title: 'Thông báo',
                          type: 'green',
                          method: 'get',
                          async: false,
                          contentType: 'multipart/form-data',
                          content: 'url:' + $dir_module_saoluu + 'xoa_list_backup_restore.php?sott='+$sott+'&fid='+$fid,
                          contentLoaded: function () {
                          },
                          buttons: {
                              "Thoát": {
                                  keys: ['Y'], btnClass: 'btn-green', action: function () {
                                      //$("#Form_taifile")[0].reset();
                                      $.ajax({
                                          url: $dir_module_saoluu+"load_list_backup_restore.php",
                                          async: false,
                                          success: function (response) {
                                              $(".table-dialog_saoluu").html(response);
                                          }
                                      });
                                  }
                              }
                          }
                      });
                  }
              },
              "Hủy bỏ": {
                  keys: ['N'], action: function () {

                  }
              }
          }
      });
  });
  </script>