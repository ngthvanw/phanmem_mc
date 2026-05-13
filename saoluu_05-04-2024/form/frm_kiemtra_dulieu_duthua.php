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
        $("#kiemtra_dulieu_duthua_mavt").click(function () {
            $('.dialog_main_bangchitiet_hanghoa').load('form/frm_dulieuduthua_mavt.php');
        });
        $("#kiemtra_dulieu_duthua_makh").click(function () {
            $('.dialog_main_bangchitiet_hanghoa').load('form/frm_dulieuduthua_makh.php');
        });
        $("#kiemtra_dulieu_duthua_mact").click(function () {
            $('.dialog_main_bangchitiet_hanghoa').load('form/frm_dulieuduthua_mact.php');
        });
        $("#kiemtra_tonghop_chitiet_nhapxuatkho").click(function () {
            $.confirm({
                title: 'THÔNG BÁO . ',
                type: 'green',
                buttons: {
                    "KẾT THÚC": {
                        btnClass: 'btn-blue',
                        action: function(){}
                    }

                 },
                content: 'url:'+ $dir_module_kiemtradulieu + 'kiemtra_tonghop_chitiet_nhapxuatkho.php',
                contentLoaded: function(data, status, xhr){

                }
            });
    });
    });
</script>
<div id="dialog-thietlap" title="KIỂM TRA DỮ LIỆU DƯ THỪA">
    <p>
    <table style="width: 100%;">
        <tr>
            <td style="width: 50%;" valign="top">
                <fieldset>
                    <legend></legend>
                    <button id="kiemtra_dulieu_duthua_mavt"
                            class="ui-button ui-widget ui-corner-all ui-state-hover"
                            style="width: 100%;margin-bottom: 2px;"><span style="font-size: 16px;">Kiểm tra mã vật tư</span>
                    </button>

                   <button id="kiemtra_dulieu_duthua_makh"
                           class="ui-button ui-widget ui-corner-all" style="width: 100%;margin-bottom: 2px;"><span
                               style="font-size: 16px;">Kiểm tra mã khách hàng</span></button>

               </fieldset>
           </td>
           <td valign="top" style="width: 50%;">
               <fieldset>
                   <legend></legend>
                     <button id="kiemtra_dulieu_duthua_masp"
                           class="ui-button ui-widget ui-corner-all ui-state-hover"
                           style="width: 100%;margin-bottom: 2px;"><span style="font-size: 16px;">Kiểm tra mã sản phẩm</span>
                   </button>

                   <button id="kiemtra_dulieu_duthua_mact"
                           class="ui-button ui-widget ui-corner-all" style="width: 100%;"><span
                               style="font-size: 16px;">Kiểm tra mã công trình</span></button>
               </fieldset>
          </td>
      </tr>
  </table>
  </p>
</div>