<style>
    #dialog-thietlap fieldset {
        border: 1px solid #a1daf2 !important;
        font-weight: bold !important;
    }
</style>
<script>
    $(function () {
        $dir_module_kiemtradulieu = "modules/kiemtradulieu/";////////////////Khai báo đường dẫn vào mudole
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
<div id="dialog-thietlap" title="KIỂM TRA DỮ LIỆU BÁO CÁO TÀI CHÍNH">
    <p>
    <table style="width: 100%;">
        <tr>
            <td style="width: 50%;" valign="top">
                <fieldset>
                    <legend></legend>
                    <button onclick="$('.dialog_main').load('form/frm_kiemtra_quytienmat.php');"
                            class="ui-button ui-widget ui-corner-all ui-state-hover"
                            style="width: 100%;margin-bottom: 2px;"><span style="font-size: 16px;">KIỂM TRA QUỸ TIỀN MẶT</span>
                    </button>

                   <button id="kiemtra_tonghop_chitiet_nhapxuatkho"
                           class="ui-button ui-widget ui-corner-all" style="width: 100%;margin-bottom: 2px;"><span
                               style="font-size: 16px;">Kiểm tra nhập xuất kho</span></button>

                   <button onclick="$('.dialog_main_bangcandoiketoan').load('form/frm_dm_bangcangdoi_ketoan.php');"
                           class="ui-button ui-widget ui-corner-all" style="width: 100%;"><span
                               style="font-size: 16px;">Bảng cân đối kế toán</span></button>
               </fieldset>
           </td>
           <td valign="top" style="width: 50%;">
               <fieldset>
                   <legend></legend>

                   <button onclick="$('.dialog_main_baocao_kqkd').load('form/frm_baocao_phantich_kqkd.php');"
                           class="ui-button ui-widget ui-corner-all ui-state-hover"
                           style="width: 100%;margin-bottom: 2px;"><span style="font-size: 16px;">BẢNG PHÂN TÍCH KQKD</span>
                   </button>

      <button onclick="$('.dialog_main_soduno_kh_dauky').load('form/frm_soduno_kh_dauky.php');" class="ui-button ui-widget ui-corner-all" style="width: 100%;margin-bottom: 2px;"><span
                  style="font-size: 16px;">Số dư nợ KH TIỀN VIỆT NAM</span></button>
                   <button onclick="$('.dialog_main_soduno_kh_dauky').load('form/frm_soduno_kh_dauky_nt.php');" class="ui-button ui-widget ui-corner-all" style="width: 100%;margin-bottom: 2px;"><span
                               style="font-size: 16px;">Số dư nợ KH TIỀN NGOẠI TỆ</span></button>
              </fieldset>
          </td>
      </tr>
  </table>
  </p>
</div>