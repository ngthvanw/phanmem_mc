<?php
session_start();
?>
<style>
    #dialog-thietlap fieldset {
        border: 1px solid #a1daf2 !important;
        font-weight: bold !important;
    }
    a:hover {
        color: blue;
    }
</style>
<script>
    $dir_module_saoluu = "modules/saoluu/";////////////////Khai báo đường dẫn vào mudole
    $(function () {
        $("#dialog-thietlap").dialog({
            resizable: false,
            height: "auto",
            width: 600,
            modal: true,
            buttons: {
                "Đồng ý": ChucNang_ChuyenNienDo,
                "Kết thúc": function () {
                    xoadialog();
                }
            }
        });
        function xoadialog() {
            reset_dialog(".dialog-thietlap");
            reset_dialog(".dialog_main");
        }

        $("#dialog-thietlap").keydown(function (event) {
            if (event.keyCode == Keys.ESCAPE) {
                xoadialog();
            }
        });
        function ChucNang_ChuyenNienDo() {
            $tontai_data = "0";
            $thihanh = false;
            $thanhphanchuyen = "";
            $('input[name="thanhphanchuyen"]:checked').each(function() {
                $thanhphanchuyen+=this.value+",";
            });
            $chuyentatcatonkho = $("#chuyentatcatonkho").prop("checked");

            $.ajax({
                url: $dir_module_saoluu + "kiemtra_datatontai_truoc.php",
                async: false,
                success: function (response) {
                    $tontai_data = response;
                }
            });
            if($tontai_data==0) {// Nếu không tồn tại data -- Tạo mới và chuyển đầu kỳ
                alert("KHÔNG THỂ CẬP NHẬT BỔ SUNG . KHÔNG TỒN TẠI NIÊN ĐỘ <?php echo ($_SESSION['NienDo']-1) ?> .");
            }else{
                var result = confirm("DỮ LIỆU NIÊN ĐỘ <?php echo $_SESSION['NienDo']; ?> ĐÃ TỒN TẠI. BẠN CÓ MUỐN THỰC HIỆN CHỨC NĂNG NÀY ? \n HỆ THỐNG SẼ TỰ ĐỘNG ĐỔI MÃ NẾU BỊ TRÙNG .");
                if (result) {
                    $.confirm({// Tạo mới database
                        title: 'Thông báo',
                        type: 'green',
                        content: 'url:' + $dir_module_saoluu +'chuyenniendo_nammoi_trung.php?thanhphanchuyen='+$thanhphanchuyen+'&chuyentatcatonkho='+$chuyentatcatonkho,
                        contentLoaded: function (data, status, xhr) {
                        },

                        buttons: {
                            "Kết thúc": {
                                keys: ['Y'], action: function () {

                                }
                            }
                        }
                    });
                }else{
                    $thihanh = false;
                }
            }

        }
    });
</script>
<div id="dialog-thietlap" title="CẬP NHẬT BỔ SUNG SỐ DƯ TỪ NĂM <?php echo ($_SESSION['NienDo']-1) ?> VỀ NĂM <?php echo ($_SESSION['NienDo']); ?>">
    <p>
    <table style="width: 100%;">
        <tr>
            <td style="width: 50%;">
                <fieldset style="display: none;">
                    <legend>Chuyển dữ liệu sang năm <?php echo $_SESSION['NienDo'] + 1 ?></legend>
                    <table width="100%" border="0">
                        <tr>
                            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a style="color:#F00;cursor: wait;" onclick="$('.dialog_main_bangketonkho').load('form/frm_bangketonkho.php');">Xử lý tồn kho từ tháng 1 - 12
                                năm <?php echo $_SESSION['NienDo'] ?></a></td>
                        </tr>
                        <tr>
                            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a style="color:#F00;cursor: wait;" onclick="$('.dialog_main_bangke_tonghopno_khachhang').load('form/frm_bangke_tonghopno_khachhang.php');">Xử lý công nợ từ ngày 01/01/<?php echo $_SESSION['NienDo'] ?> - 31/12/<?php echo $_SESSION['NienDo'] ?></a>
                            </td>
                        </tr>
                        <tr>
                            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a style="color:#F00;cursor: wait;" onclick="$('.dialog_main_bangcandoitaikhoan').load('form/frm_bangcandoitaikhoan.php');">Xử lý số dư tài khoản từ ngày 01/01/<?php echo $_SESSION['NienDo'] ?> - 31/12/<?php echo $_SESSION['NienDo'] ?></a>
                            </td>
                        </tr>
                    </table>
                </fieldset>
                <fieldset>
                    <legend>Chọn số dư cần chuyển bổ sung từ niên độ <?php echo $_SESSION['NienDo'] - 1 ?> về niên độ <?php echo $_SESSION['NienDo'] ?> </legend>
                    <table width="100%" border="0">
                        <tr>
                            <td><input type="checkbox" name="thanhphanchuyen"  class="thanhphanchuyen" value="tonkho" ></td>
                            <td>Số dư hàng tồn kho</td>
                            <td><input type="checkbox"  name="thanhphanchuyen" class="thanhphanchuyen" value="congno" ></td>
                            <td>Số dư công nợ khách hàng</td>
                        </tr>
                        <tr>
                            <td><input type="checkbox"  name="thanhphanchuyen" class="thanhphanchuyen" value="taikhoan" ></td>
                            <td>Số dư các tài khoản</td>
                            <td><input type="checkbox"  name="thanhphanchuyen" class="thanhphanchuyen"  value="taisan" ></td>
                            <td>Số dư tài sản</td>
                        </tr>
                        <tr>
                            <td><input type="checkbox"  name="thanhphanchuyen" class="thanhphanchuyen"  value="cptratruoc" ></td>
                            <td>Số dư CP trả trước</td>
                            <td><input type="checkbox"  name="thanhphanchuyen" class="thanhphanchuyen"  value="dodang" ></td>
                            <td>Số dư dở dang</td>
                        </tr>
                        <tr>
                            <td><input type="checkbox"  name="thanhphanchuyen" class="thanhphanchuyen"  value="tokhaithuetndn" ></td>
                            <td>Tờ khai thuế TNDN</td>
                            <td><input type="checkbox"  name="thanhphanchuyen" class="thanhphanchuyen"  value="tinhhinhsdhd" ></td>
                            <td>Báo cáo tình hình SDHĐ</td>
                        </tr>
                        <tr>
                            <td><input type="checkbox"  name="thanhphanchuyen" class="thanhphanchuyen"  value="nhatkykiemtra" ></td>
                            <td>Sổ nhật ký kiểm tra</td>
                            <td><input type="checkbox"  name="thanhphanchuyen" class="thanhphanchuyen"  value="dinhmucctsp" ></td>
                            <td>Định mức SP - CT</td>
                        </tr>
                        <tr>
                            <td><input type="checkbox"  name="thanhphanchuyen" class="thanhphanchuyen"  value="dsnhanvien" ></td>
                            <td>Danh sách nhân viên</td>
                           <td><input type="checkbox"  name="thanhphanchuyen" class="thanhphanchuyen"  value="tokhaigtgtthang" ></td>
                            <td>Tờ khai thuế GTGT Tháng</td>
                        </tr>
						 <tr>
                            <td><input type="checkbox"  name="thanhphanchuyen" class="thanhphanchuyen"  value="XuLy" ></td>
                            <td>Bổ Sung</td>
                            
							 <td><input type="checkbox"  name="thanhphanchuyen" class="thanhphanchuyen"  value="tokhaigtgt" ></td>
                            <td>Tờ khai thuế GTGT Quý</td>
                        </tr>
                    </table>
                </fieldset>
                <fieldset>
                    <legend></legend>
                    <table width="100%" border="0">
                        <tr>
                            <td><input type="checkbox" name="chuyentatcatonkho" id="chuyentatcatonkho"  class="chuyentatcatonkho" value="" ></td>
                            <td>Chuyển tất cả tồn kho (Trường hợp có định mức phải chuyển tất cả kể cả tồn không bằng 0)</td>
                            <td></td>
                            <td></td>
                        </tr>
                    </table>
                </fieldset>
            </td>

        </tr>
    </table>
    </p>
</div>