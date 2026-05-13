<style>
    #dialog-thietlap fieldset {
        border: 1px solid #a1daf2 !important;
        font-weight: bold !important;
    }
</style>
<script>
    $(function () {
        $("#dialog-thietlap").dialog({
            resizable: false,
            height: "auto",
            width: 600,
            modal: true,
            buttons: {
                "Kết thúc": function () {
                    $(this).dialog("close");
                    xoadialog();
                }
            }
        });
        function xoadialog() {
            reset_dialog(".dialog-thietlap");
            reset_dialog(".dialog_main_thietlap");
        }

        $("#dialog-thietlap").keydown(function (event) {
            if (event.keyCode == Keys.ESCAPE) {
                reset_dialog(".dialog-thietlap");
                reset_dialog(".dialog_main_thietlap");
            }
        });
    });
</script>
<div id="dialog-thietlap" title="THIẾT LẬP BAN ĐẦU">
    <p>
    <table style="width: 100%;">
        <tr>
            <td style="width: 50%;" valign="top">
                <fieldset>
                    <legend>Thiết lập danh mục</legend>
                    <button onclick="$('.dialog_main_danhmuc_cptratruoc').load('form/frm_danhsach_macptratruoc.php');"
                            class="ui-button ui-widget ui-corner-all ui-state-hover"
                            style="width: 100%;margin-bottom: 2px;"><span style="font-size: 16px;">Danh mục chi phí trả trước</span>
                    </button>

                   <button onclick="$('.dialog_main_httk').load('form/frm_dm_httk.php');"
                           class="ui-button ui-widget ui-corner-all" style="width: 100%;margin-bottom: 2px;"><span
                               style="font-size: 16px;">Hệ thống tài khoản sử dụng</span></button>

                   <button onclick="$('.dialog_main_bangcandoiketoan').load('form/frm_dm_bangcangdoi_ketoan.php');"
                           class="ui-button ui-widget ui-corner-all" style="width: 100%;"><span
                               style="font-size: 16px;">Bảng BC tình hình tài chính</span></button>
               </fieldset>
           </td>
           <td valign="top" style="width: 50%;">
               <fieldset>
                   <legend>Thiết lập số dư đầu kỳ</legend>
                   <!--<button onclick="$('.dialog_main_thietlapmataisan').load('form/frm_thietlap_taisan.php');" class="ui-button ui-widget ui-corner-all" style="width: 100%;margin-bottom: 2px;"><span
                               style="font-size: 16px;">Số dư tài sản cố định</span></button>
                   <br/>
                   <button onclick="$('.dialog_main_sltonkho').load('form/frm_dm_sltonkho.php');" class="ui-button ui-widget ui-corner-all" style="width: 100%;margin-bottom: 2px;"><span
                               style="font-size: 16px;">Số dư hàng tồn kho</span></button>-->

                   <!--<button onclick="$('.dialog_main_sodu_hoadon').load('form/frm_dm_sodung_hoadon.php');" class="ui-button ui-widget ui-corner-all" style="width: 100%;margin-bottom: 2px;"><span
                  style="font-size: 16px;">Số dư hàng hóa dơn</span></button>-->
                   <button onclick="$('.dialog_main_danhmuc_cptratruoc').load('form/frm_thietlap_vonchusohuu.php');"
                           class="ui-button ui-widget ui-corner-all ui-state-hover"
                           style="width: 100%;margin-bottom: 2px;"><span style="font-size: 16px;">Số dư vốn chủ sở hữu</span>
                   </button>

      <button onclick="$('.dialog_main_soduno_kh_dauky').load('form/frm_soduno_kh_dauky.php');" class="ui-button ui-widget ui-corner-all" style="width: 100%;margin-bottom: 2px;"><span
                  style="font-size: 16px;">Số dư nợ KH TIỀN VIỆT NAM</span></button>
                   <button onclick="$('.dialog_main_soduno_kh_dauky').load('form/frm_soduno_kh_dauky_nt.php');" class="ui-button ui-widget ui-corner-all" style="width: 100%;margin-bottom: 2px;"><span
                               style="font-size: 16px;">Số dư nợ KH TIỀN NGOẠI TỆ</span></button>
      <button onclick="$('.dialog_main_sodu_tk').load('form/frm_dm_sodu_tk.php');" class="ui-button ui-widget ui-corner-all" style="width: 100%;margin-bottom: 2px;"><span
                  style="font-size: 16px;">Số dư các tài khoản</span></button>
                   <button onclick="$('.dialog_main_hinhthuc_khaibaothue').load('form/frm_thietlap_kyketoan.php');" class="ui-button ui-widget ui-corner-all" style="width: 100%;margin-bottom: 2px;"><span
                               style="font-size: 16px;">Kỳ kế toán</span></button>
      <!--<button class="ui-button ui-widget ui-corner-all" style="width: 100%;"><span
                 style="font-size: 16px;">Chi tiết số dư theo bộ phận</span></button>-->
              </fieldset>
          </td>
      </tr>
  </table>
  </p>
</div>