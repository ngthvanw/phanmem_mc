<?php 
session_start();
    require("../config.php");
function load_doanhngiep($dir){
        $fp1 = @fopen($dir."/".'info.db', "r"); // đọc thông tin chung
        $string_info = explode(":",giaima2chieu(fgets($fp1)));
        fclose($fp1);
    return ($string_info);
}
$arr_doanhnghiep = load_doanhngiep($driver."/datafile/".$_SESSION['MST']);
?>
  <style>
    #Form-chinh label{margin-top:7px;float: left; border:0px solid red;width:150px;display:block !important; font-weight: bold !important;font-size: 12px;font-family: Arial,Lucida Grande, Lucida Sans, sans-serif;}
    #Form-chinh input {float: left; display:block !important; font-weight: bold !important;font-size: 12px;font-family: Arial,Lucida Grande, Lucida Sans, sans-serif;}
    #Form-chinh input.text {float: left; margin-bottom:4px !important; width:100%; padding: .4em !important;font-size: 12px;font-family: Arial,Lucida Grande, Lucida Sans, sans-serif;font-weight: normal; }
    #Form-chinh fieldset { padding:0;padding-top: 6px; border:1px solid #7cc3f9; margin-top:0px; }
    #Form-chinh .td-left input.text {float: left; margin-bottom:4px !important; width:60%; padding: .4em !important;font-size: 12px;font-family: Arial,Lucida Grande, Lucida Sans, sans-serif;font-weight: normal; }
    #Form-chinh select{font-size: 12px;font-weight: bold;}
    #Form-chinh h1 { font-size: 1.2em; margin: .6em 0; }
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
<div id="dialog-doanh_nghiep" title="Cập nhật thông tin doanh nghiệp ">
    <form method="post" id="Form-chinh" enctype="multipart/form-data">
        <fieldset>
            <table class="table-dialog">
                <tr>
                    <td colspan="2">
                        <label for="name">MST(<span class="red">*</span>)</label>
                        <input style="width:65%" type="text" name="MST" id="MST" value="<?php echo $arr_doanhnghiep[0] ?>" required="require" accept="" readonly="true" placeholder="Mã số thuế" class="text ui-widget-content ui-corner-all" />
                    </td>

                </tr>
                <tr>
                    <td colspan="2">
                        <label for="name">Tên doanh nghiệp(<span class="red">*</span>)</label>
                        <input style="width:65%" type="text" name="TenDN" id="TenDN" value="<?php echo $arr_doanhnghiep[1] ?>" required="require" accept="" class="text ui-widget-content ui-corner-all" />
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <label for="password">Địa chỉ </label>
                       <input style="width:65%" type="text" name="DiaChi" id="DiaChi" value="<?php echo $arr_doanhnghiep[2] ?>" required="require" accept="" class="text ui-widget-content ui-corner-all" />
                    </td>
                </tr>
                 <tr>
                    <td colspan="2">
                        <label for="password">Quận/Huyện</label>
                       <input style="width:65%" type="text" name="QuanHuyen" id="QuanHuyen" value="<?php echo $arr_doanhnghiep[3] ?>" required="require" accept="" class="text ui-widget-content ui-corner-all" />
                    </td>
                </tr>
                 <tr>
                    <td colspan="2">
                        <label for="password">Tỉnh/Thành phố</label>
                       <input style="width:65%" type="text" name="TinhTP" id="TinhTP" value="<?php echo $arr_doanhnghiep[4] ?>" required="require" accept="" class="text ui-widget-content ui-corner-all" />
                    </td>
                </tr>
                 <tr>
                    <td colspan="2">
                      <label for="password">Điện thoại</label>
                       <input style="width:65%" type="text" name="DienThoai" id="DienThoai" value="<?php echo $arr_doanhnghiep[5] ?>" required="require" accept="" class="text ui-widget-content ui-corner-all" />
                    </td>
                </tr>
                <tr>
                  <td colspan="2">
                    <label for="password">Email</label>
                     <input style="width:65%" type="text" name="Email" id="Email" value="<?php echo $arr_doanhnghiep[6] ?>" required="require" accept="" class="text ui-widget-content ui-corner-all" />
                    </td>
                </tr>
                <tr>
                  <td colspan="2">
                    <label for="password">Hình thức sở hữu vốn</label>
                     <input style="width:65%" type="text" name="hinhthucsohuuvon" id="hinhthucsohuuvon" value="<?php echo $arr_doanhnghiep[8] ?>" required="require" accept="" class="text ui-widget-content ui-corner-all" />
                    </td>
                </tr>
                <tr>
                  <td colspan="2">
                    <label for="password">Lĩnh vực kinh doanh</label>
                     <input style="width:65%" type="text" name="linhvuckinhdoanh" id="linhvuckinhdoanh" value="<?php echo $arr_doanhnghiep[9] ?>" required="require" accept="" class="text ui-widget-content ui-corner-all" />
                    </td>
                </tr>
                <tr>
                  <td colspan="2">
                    <label for="password">Ngành nghề kinh doanh</label>
                    <textarea style="width:65%;text-align:left;"  name="nganhnghekinhdoanh" id="nganhnghekinhdoanh" class="text ui-widget-content ui-corner-all" ><?php echo $arr_doanhnghiep[10] ?></textarea>
                    </td>
                </tr>
                <tr>
                  <td colspan="2"><label for="password2">Loại hình DN</label>
                    <select class="text ui-widget-content ui-corner-all" style="height:25px;width:65%" name="LoaiHinhDoanhNghiep" id="LoaiHinhDoanhNghiep">
                      <option <?php if($arr_doanhnghiep[11]==1) echo "selected"; ?> value="1">Công ty TNHH 1 Thành Viên</option>
                      <option <?php if($arr_doanhnghiep[11]==2) echo "selected"; ?> value="2">Công ty TNHH 2 Thành Viên trở lên</option>
                      <option <?php if($arr_doanhnghiep[11]==3) echo "selected"; ?> value="3">Công ty Cổ Phần</option>
                      <option <?php if($arr_doanhnghiep[11]==4) echo "selected"; ?> value="4">Doanh nghiệp tư nhân</option>
                      <option <?php if($arr_doanhnghiep[11]==5) echo "selected"; ?> value="5">Công ty Hợp Danh</option>
                  </select></td>
                </tr>
                <tr>
                  <td colspan="2"><label for="password2">Loại hình</label>
                    <select class="text ui-widget-content ui-corner-all" style="height:25px;width:65%" name="LoaiHinh" id="LoaiHinh">
                      <option <?php if($arr_doanhnghiep[7]==1) echo "selected"; ?> value="1">Thương mại</option>
                      <option <?php if($arr_doanhnghiep[7]==2) echo "selected"; ?> value="2">Xây dựng</option>
                  </select></td>
                </tr>
            </table>
      <!-- Allow form submission with keyboard without duplicating the dialog button -->
      <input type="submit" accesskey="enter" tabindex="-1" style="position:absolute; top:-1000px"/>
    </fieldset>
  </form>
</div>
  <script>
  $dir_module_doanh_nghiep = "modules/doanhnghiep/"; ////////////////Khai báo đường dẫn vào mudole-----------------------------
$(function() {
        var dialog, form,
                emailRegex = /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/,
                MST = $("#MST"),
                TenDN = $("#TenDN"),
                DiaChi = $("#DiaChi"),
                allFields = $([]).add(MST) /////////////////////////////////////////////////////////////////////////////////////
                .add(TenDN)
                .add(DiaChi),
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

        function xoadialog_doanh_nghiep() { // đóng form 
                reset_dialog(".dialog-doanh_nghiep");
                reset_dialog(".dialog_main_doanh_nghiep");
        }


        function ChucNang() {
                var valid = true;
                allFields.removeClass("ui-state-error"); // kiem tra du lieu

                valid = valid && checkNull(TenDN, " Tên doanh nghiệp ");
                $act = "edit";
                if (valid) {
                        $.ajax({
                                url: $dir_module_doanh_nghiep + $act + ".php", // Thay dổi file
                                type: "get", // chọn phương thức gửi là get
                                dateType: "text", // dữ liệu trả về dạng text
                                data: { // Danh sách các thuộc tính sẽ gửi đi
                                        MST: MST.val(),
                                        TenDN: TenDN.val(),
                                        DiaChi: DiaChi.val(),
                                        QuanHuyen: $("#QuanHuyen").val(),
                                        ThanhPho: $("#TinhTP").val(),
                                        DienThoai: $("#DienThoai").val(),
                                        Email: $("#Email").val(),
										LoaiHinh: $("#LoaiHinh").val(),
										LoaiHinhDoanhNghiep: $("#LoaiHinhDoanhNghiep").val(),
										HinhThucSoHuuVon: $("#hinhthucsohuuvon").val(),
										LinhVucKinhDoanh: $("#linhvuckinhdoanh").val(),
										NganhNgheKinhDoanh: $("#nganhnghekinhdoanh").val(),
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
                                                        }
                                                }
                                        });
                                }
                        });
                }
                return valid;
        }

        dialog = $("#dialog-doanh_nghiep").dialog({
                autoOpen: false,
                height: "auto",
                width: 500,
                modal: true,
                buttons: {
                        "Lưu": ChucNang,
                        "Kết thúc": function() {
                                xoadialog_doanh_nghiep();
                        }
                }
        });
        form = dialog.find("#Form-chinh").on("submit", function(event) {
                event.preventDefault();
                ChucNang();
        });
        dialog.dialog("open");

});
  </script>