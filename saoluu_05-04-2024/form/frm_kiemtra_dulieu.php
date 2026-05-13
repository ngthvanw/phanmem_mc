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
        $("#check_khachhang_chacon").click(function () {
            $.confirm({
                title: 'THÔNG BÁO . ',
                type: 'green',
                buttons: {
                    "KẾT THÚC": {
                        btnClass: 'btn-blue',
                        action: function () {
                        }
                    }

                },
                content: 'url:' + $dir_module_kiemtradulieu + 'kiemtra_khachhang_chacon.php',
                contentLoaded: function (data, status, xhr) {

                }
            });

        });
        $("#kiemtra_tonghop_chitiet_nhapxuatkho").click(function () {
            $.confirm({
                title: 'THÔNG BÁO . ',
                type: 'green',
                buttons: {
                    "KẾT THÚC": {
                        btnClass: 'btn-blue',
                        action: function () {
                        }
                    }

                },
                content: 'url:' + $dir_module_kiemtradulieu + 'kiemtra_tonghop_chitiet_nhapxuatkho.php',
                contentLoaded: function (data, status, xhr) {

                }
            });
        });

        $("#kiemtra_tonghop_chitiet_nhapkho").click(function () {
            $.confirm({
                title: 'THÔNG BÁO . ',
                type: 'green',
                columnClass: 'xlarge',
                buttons: {
                    "KẾT THÚC": {
                        btnClass: 'btn-blue',
                        action: function () {
                        }
                    }

                },
                content: 'url:' + $dir_module_kiemtradulieu + 'kiemtra_tonghop_chitiet_nhapton_theothang.php',
                contentLoaded: function (data, status, xhr) {

                }
            });
        });

        $("#kiemtra_tonghop_chitiet_xuatkho").click(function () {
            $.confirm({
                title: 'THÔNG BÁO . ',
                type: 'green',
                columnClass: 'xlarge',
                buttons: {
                    "KẾT THÚC": {
                        btnClass: 'btn-blue',
                        action: function () {
                        }
                    }

                },
                content: 'url:' + $dir_module_kiemtradulieu + 'kiemtra_tonghop_chitiet_xuatton_theothang.php',
                contentLoaded: function (data, status, xhr) {

                }
            });
        });
		
		$("#kiemtra_tonghop_chitiet_phieu_nhap_xuat").click(function () {
            $.confirm({
                title: 'THÔNG BÁO . ',
                type: 'green',
                columnClass: 'xlarge',
                buttons: {
                    "KẾT THÚC": {
                        btnClass: 'btn-blue',
                        action: function () {
                        }
                    }

                },
                content: 'url:' + $dir_module_kiemtradulieu + 'kiemtra_tonghop_chitiet_phieu_nhap_xuat.php',
                contentLoaded: function (data, status, xhr) {

                }
            });
        });

        $("#check_chitiet_tonghop_ccdc").click(function () {
            $.confirm({
                title: 'THÔNG BÁO . ',
                type: 'green',
                columnClass: 'xlarge',
                buttons: {
                    "KẾT THÚC": {
                        btnClass: 'btn-blue',
                        action: function () {
                        }
                    }

                },
                content: 'url:' + $dir_module_kiemtradulieu + 'kiemtra_tonghop_chitiet_cptt.php',
                contentLoaded: function (data, status, xhr) {

                }
            });
        });
        $("#check_chitiet_trungma_ccdc").click(function () {
            $.confirm({
                title: 'THÔNG BÁO . ',
                type: 'green',
                columnClass: 'xlarge',
                buttons: {
                    "KẾT THÚC": {
                        btnClass: 'btn-blue',
                        action: function () {
                        }
                    }

                },
                content: 'url:' + $dir_module_kiemtradulieu + 'kiemtra_trungma_cptt.php',
                contentLoaded: function (data, status, xhr) {

                }
            });
        });

        $("#kiemtrahoadon_bathopphap").click(function () {
            $.confirm({
                title: 'THÔNG BÁO . ',
                type: 'green',
                columnClass: 'xlarge',
                buttons: {
                    "IN DANH SÁCH": {
                        btnClass: 'btn-blue',
                        action: function () {
                            window.open( $dir_module_kiemtradulieu + 'kiemtra_hoadon_bathopphap.php', "HDBHP");
                        }
                    },
                    "KẾT THÚC": {
                        btnClass: 'btn-blue',
                        action: function () {
                        }
                    }

                },
                content: 'url:' + $dir_module_kiemtradulieu + 'kiemtra_hoadon_bathopphap.php',
                contentLoaded: function (data, status, xhr) {

                }
            });
        });
    });
</script>
<div id="dialog-thietlap" title="KIỂM TRA DỮ LIỆU">
    <p>
    <table style="width: 100%;">
        <tr>
            <td style="width: 50%;" valign="top">
                <fieldset>
                    <button id="check_khachhang_chacon"
                            class="ui-button ui-widget ui-corner-all ui-state-hover"
                            style="width: 100%;margin-bottom: 2px;"><span style="font-size: 16px;">Kiểm tra DS Khách Hàng</span>
                    </button>

                    <button id="kiemtra_tonghop_chitiet_nhapxuatkho"
                            class="ui-button ui-widget ui-corner-all" style="width: 100%;margin-bottom: 2px;"><span
                                style="font-size: 16px;">Kiểm tra nhập xuất kho</span></button>

                    <button id="kiemtra_tonghop_chitiet_nhapkho"
                            class="ui-button ui-widget ui-corner-all" style="width: 100%;margin-bottom: 2px;"><span
                                style="font-size: 16px;">Kiểm tra tổng hợp-chi tiết nhập tồn theo tháng</span></button>

                    <button id="kiemtra_tonghop_chitiet_xuatkho"
                            class="ui-button ui-widget ui-corner-all" style="width: 100%;margin-bottom: 2px;"><span
                                style="font-size: 16px;">Kiểm tra tổng hợp-chi tiết xuất tồn theo tháng</span></button>
					<button id="kiemtra_tonghop_chitiet_phieu_nhap_xuat"
                            class="ui-button ui-widget ui-corner-all" style="width: 100%;margin-bottom: 2px;"><span
                                style="font-size: 16px;">Kiểm tra tổng hợp- chi tiết phiếu nhập xuất kho</span></button>
                </fieldset>
            </td>
            <td valign="top" style="width: 50%;">
                <fieldset>
                    <button id="check_chitiet_tonghop_ccdc"
                            class="ui-button ui-widget ui-corner-all ui-state-hover"
                            style="width: 100%;margin-bottom: 2px;"><span style="font-size: 16px;">Kiểm tra CPTT chưa nhập chi tiết</span>
                    </button>
                    <button id="check_chitiet_trungma_ccdc"
                            class="ui-button ui-widget ui-corner-all ui-state-hover"
                            style="width: 100%;margin-bottom: 2px;"><span style="font-size: 16px;">Kiểm tra CPTT trùng mã</span>
                    </button>

                    <button onclick="$('.dialog_main_soduno_kh_dauky').load('form/frm_soduno_kh_dauky.php');"
                            class="ui-button ui-widget ui-corner-all" style="width: 100%;margin-bottom: 2px;"><span
                                style="font-size: 16px;">Số dư nợ KH TIỀN VIỆT NAM</span></button>
                    <button onclick="$('.dialog_main_soduno_kh_dauky').load('form/frm_soduno_kh_dauky_nt.php');"
                            class="ui-button ui-widget ui-corner-all" style="width: 100%;margin-bottom: 2px;"><span
                                style="font-size: 16px;">Số dư nợ KH TIỀN NGOẠI TỆ</span></button>
                    <button onclick="$('.dialog_main_sodu_tk').load('form/frm_dm_sodu_tk.php');"
                            class="ui-button ui-widget ui-corner-all" style="width: 100%;margin-bottom: 2px;"><span
                                style="font-size: 16px;">Số dư các tài khoản</span></button>
                    <button onclick="$('.dialog_main_makh').load('form/frm_danhsach_dn_bathopphap.php');"
                            class="ui-button ui-widget ui-corner-all" style="width: 100%;margin-bottom: 2px;"><span
                                style="font-size: 16px;">DANH SÁCH DN BẤT HỢP PHÁT</span></button>
                    <button id="kiemtrahoadon_bathopphap"
                            class="ui-button ui-widget ui-corner-all ui-state-hover"
                            style="width: 100%;margin-bottom: 2px;"><span style="font-size: 16px;">KIỂM TRA HOÁ ĐƠN BẤT HỢP PHÁP</span>
                    </button>
                </fieldset>
            </td>
        </tr>
    </table>
    </p>
</div>