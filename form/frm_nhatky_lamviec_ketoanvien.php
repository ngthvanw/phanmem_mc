<?php
session_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');
?>
    <style>
        div.pq-grid * {
            font-size: 12px;
            font-family: Verdana;
            line-height: 17px;
        }

        img.ui-datepicker-trigger {
            margin-top: 2px;
        }

        .ui-autocomplete {
            max-height: 200px;
            overflow-y: auto;
            /* prevent horizontal scrollbar */
            overflow-x: hidden;
        }

        /*div.pq-grid :focus{
            outline:none;
        }*/
        .pq-grid .pq-editor-focus {
            outline: none;
            border: 1px solid #bbb;
            border-radius: 6px;
            background-image: linear-gradient(#e6e6e6, #fefefe);

            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#e6e6e6', endColorstr='#fefefe');
            background: -webkit-gradient(linear, left top, left bottom, from(#e6e6e6), to(#fefefe));
            background: -moz-linear-gradient(top, #e6e6e6, #fefefe); /* for firefox 3.6+ */
        }

        input.pq-date-editor {
            padding: 2px;
            vertical-align: bottom;
            width: 78px;
            z-index: 4;
            position: relative;
        }

        input.pg-cel-define {
            padding: 2px;
            vertical-align: bottom;
            width: 100%;
            z-index: 4;
            position: relative;
        }

        input.pq-ac-editor {
            padding: 2px;
            z-index: 4;
            position: relative;
        }

        .pq-row-edit {
            border: 2px dashed red;
        }
        fieldset {
            padding: 1px;
            padding-top: 0px;
            border: 1px solid #09F;
            margin-top: 0px;
        }
        legend{
            font-weight: bold;
        }
        .nhatky_kiemtoan{
            width: 100%;border: 1px solid green;
        }

    </style>
<script>
    $height = getHeight()-10;
    $width = getWidth()-20;
    $(function () {
        var $dir_module_banggiaonhan = "";
        $dir_module_banggiaonhan = "modules/banggiaonhan/";//--------------------------------------------Thay đổi khi copy
        $dir_module_user = "../modules/user/";//--------------------------------------------Thay đổi khi copy
        function xoadialog_makh() { // ----------------------đóng form
            reset_dialog(".dialog-makhachhang");
            reset_dialog(".dialog_main_makh");
        }

        $("#dialog-makhachhang").dialog({ // ------------------Gọi dialog
            resizable: false,
            height: $height,
            width: $width,
            modal: true,
            buttons: {
                "KẾT THÚC": change_data_quit_makh,
            }
        });
        $("#dialog-makhachhang").keydown(function (event) {//--------------Các phím tắt
            var $grid_pb = $("#grid_editing_thongke_phanmem").closest('.pq-grid');//---- Lưới----------------
            if (event.keyCode == Keys.F7 || event.keyCode == Keys.F8 || event.keyCode == Keys.INSERT) {
                var rowSelect = getRowSelect();//------ Lấy đối tượng được chọn
                if (rowSelect == false) {
                    alert_f("Chú Ý", "fa fa-warning", "red", "Bạn cần chọn dữ liệu trước khi thực hiện !");
                }
            }
            var rowEditting = $("#grid_editing_thongke_phanmem").pqGrid("getRowsByClass", {cls: 'pq-row-edit'});//---Lấy đối tượng đang sửa
            if ($('div').hasClass('jconfirm') == false) {
                if (event.keyCode == Keys.ESCAPE && $('div').hasClass('jconfirm') == false && rowEditting.length < 1) {
                    change_data_quit_makh();
                }
            } else {
                return false;
            }
        });

        function change_data_quit_makh() { // Cảnh báo thoát khi thay đổi dữ liệu////////////////////////////////////////////////////{
            $.confirm({
                title: 'Thông báo',
                content: 'Bạn có muốn thoát cửa sổ này ? .<br/>Nhấn phím <strong style="color:blue;">[Y]</strong> để đồng ý phím <strong style="color:red;">[N]</strong> để hủy bỏ ',
                icon: 'fa fa-warning',
                type: 'red',
                buttons: {
                    "Đồng ý": {
                        keys: ['Y'], action: function () {
                           xoadialog_makh();
                        }
                    },
                    "Hủy bỏ": {
                        keys: ['N'], action: function () {

                        }
                    }
                }
            });
        }
    });
</script>
<div id="dialog-makhachhang"
     title="DANH SÁCH NHẬT KÝ LẢM VIỆC KẾ TOÁN VIÊN"><!-- dialog -->
    <fieldset>
        <legend>Nhập tệp nhật ký làm việc</legend>
        <table style="width: 100%;border: 1px solid green;border-spacing: 1px;padding: 5px;" border="1" class="nhatky_kiemtoan">
            <tr style="text-align: center;">
                <th style="padding: 2px;" width="10%">Tuần</th>
                <th style="padding: 2px;" width="70%">Tệp tin</th>
                <th style="padding: 2px;" width="20%">Chức năng</th>
            </tr>
            <tr >
                <td ><select style="width: 100%;" class="text ui-widget-content ui-corner-all">
                        <option value="">--Chọn tuần--</option>
                        <option value="1">Tuần 01</option>
                    </select></td>
                <td ><input type="file"></td>
                <td >
                    <input style="color: red;font-weight: bold; border: 1px solid red" type="button" accept=".xls,.xlsx" name="tailen" id="tailen" value="Tải lên">
                </td>
            </tr>
        </table>
    </fieldset>
    <fieldset>
        <legend>Danh sách nhật ký làm việc kế toán</legend>
        <table style="width: 100%;border: 1px solid green;border-spacing: 1px;padding: 5px;" border="1" class="nhatky_kiemtoan">
            <tr>
                <th style="text-align: center;" width="5%">STT</th>
                <th style="text-align: center;" width="10%">Tuần</th>
                <th style="text-align: center;" width="55%">Tệp tin</th>
                <th style="text-align: center;" width="10%">Trưởng nhóm duyệt</th>
                <th style="text-align: center;" width="10%">Giám dốc duyệt</th>
                <th style="text-align: center;" width="10%">Chức năng</th>
            </tr>
            <tr>
                <td style="text-align: center;">STT</td>
                <td style="text-align: center;">Tuần</td>
                <td style="padding: 1px;">Tệp tin</td>
                <td style="text-align: center;">Trưởng nhóm duyệt</td>
                <td style="text-align: center;">Giám dốc duyệt</td>
                <td style="text-align: center;">Chức năng</td>
            </tr>
        </table>
    </fieldset>
</div>