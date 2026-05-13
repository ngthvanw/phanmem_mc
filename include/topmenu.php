<?php
$user  = $_SESSION['User'];
$HienThi = "";
?>
<tr>
    <td colspan="2">
        <div class="main_menu">
            <!-- SmartMenus core CSS (required) -->
            <link href="topmenu/css/sm-core-css.css" rel="stylesheet" type="text/css" />

            <!-- "sm-blue" menu theme (optional, you can use your own CSS, too) -->
            <link href="topmenu/css/sm-blue/sm-blue.css" rel="stylesheet" type="text/css" />

            <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
            <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
            <![endif]-->
            <script src="js/jquery.contextMenu.js"></script>
            <script src="js/jquery.ui.position.min.js"></script>
            <link rel="stylesheet" href="js/jquery.contextMenu.min.css">

            <!-- jQuery -->


            <!-- SmartMenus jQuery plugin -->
            <script type="text/javascript" src="topmenu/jquery.smartmenus.js"></script>

            <!-- SmartMenus jQuery Keyboard Addon -->
            <script type="text/javascript" src="topmenu/addons/keyboard/jquery.smartmenus.keyboard.js"></script>

            <!-- SmartMenus jQuery init -->
            <script type="text/javascript">
                $(function()
                {
                    $('#main-menu').smartmenus(
                        {
                            subMenusSubOffsetX: 1,
                            subMenusSubOffsetY: -8
                        });
                    $('#main-menu').smartmenus('keyboardSetHotkey', 123, 'shiftKey');

                });
            </script>
            <nav id="main-nav" role="navigation" style="z-index: 9 !important;">
                <ul id="main-menu" class="sm sm-blue">
                    <li style="background: url('icon/thietlap.png') no-repeat left center;"><!-- Menu Thiết lập -->
                        <h2><a href="#"><?php echo HienNgonNgu($_SESSION['NGONNGU'],"Thiết Lập","Setting","设置"); ?></a></h2>

                        <ul>
                            <li style="background: url('icon/1.gif') no-repeat left center;<?php  ?>"><a href="<?php echo $URI."/niendo.php"; ?>"><?php echo HienNgonNgu($_SESSION['NGONNGU'],"Niên độ","Fare","年"); ?></a></li>
                            <li onclick="$('.dialog_main_hinhthuc_khaibaothue').load('form/frm_chon_chinhanh.php');" style="background: url('icon/2.gif') no-repeat left center;"><a href="#"><?php echo HienNgonNgu($_SESSION['NGONNGU'],"Chi nhánh","Set up tax return","设置纳税申报表"); ?></a></li>
                            <li style="background: url('icon/2.gif') no-repeat left center;"><a onclick="$('.dialog_main').load('form/frm_capnhat_matkhau.php');" href="#"><?php echo HienNgonNgu($_SESSION['NGONNGU'],"Đổi mật khẩu","Change password","
更改密码"); ?></a></li>
                            <li style="background: url('icon/3.gif') no-repeat left center;<?php echo $HienThi; ?>"><a onclick="$('.dialog_main').load('form/frm_thaydoi_thongtin_hienthi.php');" href="#"><?php echo HienNgonNgu($_SESSION['NGONNGU'],"Đổi thông tin hiển thị","Change display information","更改显示信息"); ?></a></li>
                            <li style="background: url('icon/4.gif') no-repeat left center;"><a href="<?php echo $URI."/doanhnghiep.php"; ?>"><?php echo HienNgonNgu($_SESSION['NGONNGU'],"Chuyển công ty","Transfer company","转让公司"); ?></a></li>

                            <?php if($_SESSION['Level']!=5 && $_SESSION['Level']!=6 ){ ?>
                                <li style="background: url('icon/5.gif') no-repeat left center;<?php echo $HienThi; ?>"><a href="saoluu" target="_blank"><?php echo HienNgonNgu($_SESSION['NGONNGU'],"Sao lưu & phục hồi dữ liệu","Backup & restore data","备份和恢复数据"); ?></a>
                                    <!--<ul>
                                    <li style="background: url('icon/1.gif') no-repeat left center;"><a onclick="$('.dialog_main_saoluu').load('form/frm_saoluu.php');" href="#"><?php echo HienNgonNgu($_SESSION['NGONNGU'],"Sao lưu dữ liệu","Sao lưu dữ liệu","Sao lưu"); ?></a></li>
                                    <li style="background: url('icon/2.gif') no-repeat left center;"><a onclick="$('.dialog_main_phuchoi').load('form/frm_phuchoi.php');" href="#"><?php echo HienNgonNgu($_SESSION['NGONNGU'],"Phục hồi dữ liệu","Phục hồi","Phục hồi"); ?></a></li>
                                </ul>-->
                                </li>

                                <li style="background: url('icon/6.gif') no-repeat left center;<?php echo $HienThi; ?>"><a onclick="$('.dialog_main_thietlap').load('form/frm_thietlap.php');" href="#"><?php echo HienNgonNgu($_SESSION['NGONNGU'],"Thiết lập ban đầu","
Initial setup","初始设置"); ?></a></li>
                                <li style="background: url('icon/7.gif') no-repeat left center;<?php echo $HienThi; ?>"><a onclick="$('.dialog_main').load('form/frm_tuychon.php');" href="#"><?php echo HienNgonNgu($_SESSION['NGONNGU'],"Tùy chọn","Option","选项"); ?></a></li>
                                <li style="background: url('icon/8.gif') no-repeat left center;<?php echo $HienThi; ?>"><a onclick="$('.dialog_main_doanh_nghiep').load('form/frm_doanh_nghiep.php');" href="#"><?php echo HienNgonNgu($_SESSION['NGONNGU'],"Doanh nghiệp","Company","业务"); ?></a></li>
                                <li style="background: url('icon/9.gif') no-repeat left center;<?php echo $HienThi; ?>"><a href="#"><?php echo HienNgonNgu($_SESSION['NGONNGU'],"Cập nhật dữ liệu","Updating data","
更新数据"); ?></a>
                                    <ul>
                                        <li style="background: url('icon/1.gif') no-repeat left center;"><a onclick="window.open('update.php', 'updatedata', 'height=200','width=200')" href="#"><?php echo HienNgonNgu($_SESSION['NGONNGU'],"Cập nhật dữ liệu mới","Update new data","更新新数据"); ?></a></li>
                                        <li style="background: url('icon/2.gif') no-repeat left center;"><a onclick="window.open('form/frm_dm_thaydoi_mavt_nhapxuat_window.php', 'updatedata', 'height=200','width=200')" href="#"><?php echo HienNgonNgu($_SESSION['NGONNGU'],"Thay đổi mã vật tư trong nhập/xuất","Change the input / output code","更改输入/输出代码"); ?></a></li>
                                    </ul>
                                </li>
                            <?php } ?>
                            <!--<li style="background: url('icon/8.gif') no-repeat left center;"><a href="#">Thiết lập máy in...</a></li>-->
                            <li onclick="$('.dialog_main_hinhthuc_khaibaothue').load('form/frm_baotri_dulieu.php');" style="background: url('icon/10.gif') no-repeat left center;"><a href="#"><?php echo HienNgonNgu($_SESSION['NGONNGU'],"Bảo trì dữ liệu","Lock all data","锁定所有数据"); ?></a></li>
                            <li style="background: url('icon/10.gif') no-repeat left center;"><a onclick="$('.dialog_main_makh').load('form/frm_danhsach_hopdong_daily.php');" href="#"><?php echo HienNgonNgu($_SESSION['NGONNGU'],"Thông tin hợp đồng","Forwarding list","转发列表"); ?></a></li>
                            <li onclick="$('.dialog_main_hinhthuc_khaibaothue').load('form/frm_khoadulieu_khiduyet_bctc.php');" style="background: url('icon/11.gif') no-repeat left center;"><a href="#"><?php echo HienNgonNgu($_SESSION['NGONNGU'],"Khoá toàn bộ dữ liệu","Lock all data","
锁定所有数据"); ?></a></li>

                            <li style="background: url('icon/12.gif') no-repeat left center;"><a <a onclick="$('.dialog_main').load('form/frm_ketthuc.php');" href="#"><?php echo HienNgonNgu($_SESSION['NGONNGU'],"Thoát chương trình","Exit program","退出计划"); ?></a></li>
                        </ul>

                    </li><!-- End Menu Thiết lập -->
                    <li style="background: url('icon/khohang.png') no-repeat left center;"><!-- Menu Kho hàng -->
                        <h2><a  href="#"><?php echo HienNgonNgu($_SESSION['NGONNGU'],"Kho hàng","warehouse","仓库"); ?></a></h2>
                        <?php if($_SESSION['Level']!=5 && $_SESSION['Level']!=6 ){ ?>
                            <ul>
                                <li style="background: url('icon/1.gif') no-repeat left center;<?php echo $HienThi; ?>"><a onclick="$('.dialog_main_sltonkho').load('form/frm_dm_sltonkho.php');" href="#"><?php echo HienNgonNgu($_SESSION['NGONNGU'],"Số dư hàng tồn kho","Outstanding balance","出色的平衡"); ?></a></li>
                                <li style="background: url('icon/2.gif') no-repeat left center;<?php echo $HienThi; ?>"><a onclick="$('.dialog_main2').load('form/frm_dm_makho.php');" href="#"><?php echo HienNgonNgu($_SESSION['NGONNGU'],"Danh mục kho hàng","Inventory list","库存清单"); ?></a></li>
                                <li style="background: url('icon/3.gif') no-repeat left center;"><a onclick="$('.dialog_main_manhomvt').load('form/frm_dm_manhom.php');" href="#"><?php echo HienNgonNgu($_SESSION['NGONNGU'],"Nhóm vật tư, hàng hóa","Group of supplies","用品组"); ?></a></li>
                                <li style="background: url('icon/4.gif') no-repeat left center;"><a onclick="$('.dialog_main_mavt').load('form/frm_dm_mavt.php');" href="#"><?php echo HienNgonNgu($_SESSION['NGONNGU'],"Danh mục vật tư, hàng hóa","List of supplies and goods","物资和货物清单"); ?></a></li>
                                <li ><a>---------------------------------</a></li>
                                <li style="background: url('icon/5.gif') no-repeat left center;<?php echo $HienThi; ?>"><a onclick="$('.dialog_main_nhapkho').load('form/frm_nhapkho.php');" href="#"><?php echo HienNgonNgu($_SESSION['NGONNGU'],"Nhập kho","Enter the warehouse","进入仓库"); ?></a></li>
                                <li style="background: url('icon/6.gif') no-repeat left center;<?php echo $HienThi; ?>"><a onclick="$('.dialog_main_xuatkho').load('form/frm_xuatkho.php');" href="#"><?php echo HienNgonNgu($_SESSION['NGONNGU'],"Xuất kho","Out of stock","缺货"); ?></a></li>
                                <li style="background: url('icon/7.gif') no-repeat left center;<?php echo $HienThi; ?>"><a onclick="$('.dialog_main_xuatkho').load('form/frm_xuatkho_sanxuat.php');" href="#"><?php echo HienNgonNgu($_SESSION['NGONNGU'],"Xuất kho sản xuất","Exporting production","出口生产"); ?></a></li>
                                <li style="background: url('icon/8.gif') no-repeat left center;<?php echo $HienThi; ?>"><a onclick="$('.dialog_main_bangketonkho').load('form/frm_bangketonkho.php');" href="#"><?php echo HienNgonNgu($_SESSION['NGONNGU'],"Bảng tổng hợp vật tư, hàng hóa","Summary of materials and goods","材料和货物摘要"); ?></a></li>

                                <li style="background: url('icon/9.gif') no-repeat left center;<?php echo $HienThi; ?>"><a onclick="$('.dialog_main_bangke_hanghoa_laigop').load('form/frm_bangke_hanghoa_laigop.php');" href="#"><?php echo HienNgonNgu($_SESSION['NGONNGU'],"Lọc dữ liệu nhập xuất","Filter input data","过滤输入数据"); ?></a></li>
                                <li style="background: url('icon/10.gif') no-repeat left center;<?php echo $HienThi; ?>"><a onclick="$('.dialog_main_bangchitiet_hanghoa').load('form/frm_bangchitiet_hanghoa.php');" href="#"><?php echo HienNgonNgu($_SESSION['NGONNGU'],"Sổ chi tiết vật tư hàng hóa","Detailed book of materials","详细的材料清单"); ?></a></li>
                                <li style="background: url('icon/11.gif') no-repeat left center;<?php echo $HienThi; ?>"><a onclick="$('.dialog_main_bangke_khauhaotaisan').load('form/frm_bangphanbo_chiphi_muahang.php');" href="#"><?php echo HienNgonNgu($_SESSION['NGONNGU'],"Phân bổ chi phí mua hàng","Allocation of purchase costs","分配购买成本"); ?></a></li>
                                <li style="background: url('icon/12.gif') no-repeat left center;<?php echo $HienThi; ?>"><a onclick="$('.dialog_main_danhlaisophieu').load('form/frm_danhdaulai_sophieu.php');" href="#"><?php echo HienNgonNgu($_SESSION['NGONNGU'],"Đánh lại thứ tự số phiếu","Re-order the votes","重新订票"); ?></a></li>
                            </ul>
                        <?php } ?>
                    </li><!-- End Menu Kho hàng -->
                    <li style="background: url('icon/tien.gif') no-repeat left center;<?php echo $HienThi; ?>"><!-- Menu Tiền -->
                        <h2><a  href="#"><?php echo HienNgonNgu($_SESSION['NGONNGU'],"Tiền","CASH","钱面对"); ?></a></h2>
                        <?php if($_SESSION['Level']!=5 && $_SESSION['Level']!=6 ){ ?>
                            <ul>
                                <li style="background: url('icon/1.gif') no-repeat left center;"><a href="#" onclick="$('.dialog_main_pskt').load('form/frm_phieuthuchi.php');"><?php echo HienNgonNgu($_SESSION['NGONNGU'],"Nhập phiếu thu, chi","Input receipts and expenses","输入收据和费用"); ?></a></li>
                                <li style="background: url('icon/2.gif') no-repeat left center;"><a href="#" onclick="$('.dialog_main_bangchitiet_socai').load('form/frm_bangchitiet_soquy.php');" ><?php echo HienNgonNgu($_SESSION['NGONNGU'],"Sổ quỹ và báo cáo quỹ","Funds and fund reports","资金和基金报告"); ?></a></li>
                                <li style="background: url('icon/3.gif') no-repeat left center;"><a href="#" ><?php echo HienNgonNgu($_SESSION['NGONNGU'],"Bảng kê chi tiền","Statement of payments","付款说明"); ?></a>
                                    <ul>
                                        <li style="background: url('icon/1.gif') no-repeat left center;"><a href="#" onclick="$('.dialog_main_dinhmuc_sanpham').load('form/frm_bangke_chitien.php');" ><?php echo HienNgonNgu($_SESSION['NGONNGU'],"Lập bảng kê chi tiền","Make a statement of expenses","说明费用"); ?></a></li>
                                        <li style="background: url('icon/2.gif') no-repeat left center;"><a href="#" onclick="$('.dialog_main_dinhmuc_sanpham').load('form/frm_bangthanhtoan_tienthuengoai.php');" ><?php echo HienNgonNgu($_SESSION['NGONNGU'],"Bảng thanh toán tiền thuê ngoài","Outward Payments Table","外向支付表"); ?></a></li>
                                        <li style="background: url('icon/3.gif') no-repeat left center;"><a href="#" onclick="$('.dialog_main_dinhmuc_sanpham').load('form/frm_bangthanhtoan_khonghoadon.php');" ><?php echo HienNgonNgu($_SESSION['NGONNGU'],"Bảng kê HH không hoá đơn","List of goods without invoices","没有发票的商品清单"); ?></a></li>
                                    </ul>
                                </li>
                            </ul>
                        <?php } ?>
                    </li><!--End Menu Tài sản -->
                    <li style="background: url('icon/taisan.gif') no-repeat left center;<?php echo $HienThi; ?>"><!-- Menu tài sản -->
                        <h2><a  href="#"><?php echo HienNgonNgu($_SESSION['NGONNGU'],"Tài sản","Asset","资产"); ?></a></h2>
                        <ul>
                            <?php if($_SESSION['Level']!=5 && $_SESSION['Level']!=6 ){ ?>
                            <li style="background: url('icon/1.gif') no-repeat left center;"><a href="#"><?php echo HienNgonNgu($_SESSION['NGONNGU'],"Tài sản","Asset","资产"); ?></a>
                                <ul>
                                    <li style="background: url('icon/1.gif') no-repeat left center;"><a onclick="$('.dialog_main_tangtaisan').load('form/frm_thietlap_taisan.php');"  href="#"><?php echo HienNgonNgu($_SESSION['NGONNGU'],"Số dư tài sản cố định","Balance of fixed assets","固定资产余额"); ?></a></li>
                                    <li style="background: url('icon/2.gif') no-repeat left center;"><a onclick="$('.dialog_main_mataisan').load('form/frm_danhsach_mataisan.php');" href="#"><?php echo HienNgonNgu($_SESSION['NGONNGU'],"Danh sách tài sản","Property list","物业清单"); ?></a></li>
                                    <li ><a href="#">-------------------------</a></li>
                                    <li style="background: url('icon/3.gif') no-repeat left center;"><a onclick="$('.dialog_main_tangtaisan').load('form/frm_tangtaisan.php');" href="#"><?php echo HienNgonNgu($_SESSION['NGONNGU'],"Tăng tài sản","Increase property","增加财产"); ?></a></li>
                                    <li style="background: url('icon/4.gif') no-repeat left center;"><a onclick="$('.dialog_main_tangtaisan').load('form/frm_giamtaisan.php');"  href="#"><?php echo HienNgonNgu($_SESSION['NGONNGU'],"Giảm tài sản","Reduce property","减少财产"); ?></a></li>
                                    <li style="background: url('icon/5.gif') no-repeat left center;"><a onclick="$('.dialog_main_bangke_khauhaotaisan').load('form/frm_bangkekhauhao_taisan.php');" href="#"><?php echo HienNgonNgu($_SESSION['NGONNGU'],"Khấu hao tài sản","Depreciation","资产折旧"); ?></a></li>
                                    <li style="background: url('icon/6.gif') no-repeat left center;"><a onclick="$('.dialog_main_bangkekhai_taisan').load('form/frm_bangkekhai_taisan.php');" href="#"><?php echo HienNgonNgu($_SESSION['NGONNGU'],"Bảng kê khai tài sản","Asset declaration","资产申报"); ?></a></li>
									<li style="background: url('icon/7.gif') no-repeat left center;"><a onclick="$('.dialog_main_bangkekhai_taisan').load('form/frm_tang_giam_taisan.php');" href="#"><?php echo HienNgonNgu($_SESSION['NGONNGU'],"Bảng kê tăng/giảm tài sản","Asset declaration","资产申报"); ?></a></li>
                                </ul>
                            </li>
                            <li style="background: url('icon/2.gif') no-repeat left center;<?php echo $HienThi; ?>"><a href="#"><?php echo HienNgonNgu($_SESSION['NGONNGU'],"Chi phí trả trước","Prepaid expenses","预付费用"); ?></a>
                                <ul>
                                    <li style="background: url('icon/1.gif') no-repeat left center;"><a onclick="$('.dialog_main_tangtaisan').load('form/frm_thietlap_chiphi_tratruoc.php');"  href="#"><?php echo HienNgonNgu($_SESSION['NGONNGU'],"Số dư CP trả trước","Prepaid expenses","预付费用"); ?></a></li>
                                    <li style="background: url('icon/2.gif') no-repeat left center;"><a onclick="$('.dialog_main_tangtaisan').load('form/frm_tang_chiphi_tratruoc.php');" href="#"><?php echo HienNgonNgu($_SESSION['NGONNGU'],"Tăng chi phí trả trước","Increase your upfront costs","增加前期成本"); ?></a></li>
                                    <li style="background: url('icon/3.gif') no-repeat left center;"><a onclick="$('.dialog_main_tangtaisan').load('form/frm_giam_chiphi_tratruoc.php');"  href="#"><?php echo HienNgonNgu($_SESSION['NGONNGU'],"Giảm chi phí trả trước","Reduce upfront costs","降低前期成本"); ?></a></li>
                                    <li style="background: url('icon/4.gif') no-repeat left center;"><a onclick="$('.dialog_main_bangke_khauhaotaisan').load('form/frm_bangphanbo_chiphi_tratruoc.php');" href="#"><?php echo HienNgonNgu($_SESSION['NGONNGU'],"Phân bổ chi phí","Cost allocation","成本分配"); ?></a></li>
                                </ul>
                            </li>
                            <li style="background: url('icon/3.gif') no-repeat left center;<?php echo $HienThi; ?>"><a href="#"><?php echo HienNgonNgu($_SESSION['NGONNGU'],"Xây dựng cơ bản dở dang","Prepaid expenses","预付费用"); ?></a>
                                <ul>
                                    <li style="background: url('icon/1.gif') no-repeat left center;"><a onclick="$('.dialog_main_tangtaisan').load('form/frm_thietlap_xdcoban_dodang.php');"  href="#"><?php echo HienNgonNgu($_SESSION['NGONNGU'],"Số dư XD cơ bản","Prepaid expenses","预付费用"); ?></a></li>
                                    <li style="background: url('icon/2.gif') no-repeat left center;"><a onclick="$('.dialog_main_tangtaisan').load('form/frm_tang_xdcoban_dodang.php');" href="#"><?php echo HienNgonNgu($_SESSION['NGONNGU'],"Tăng xây dựng cơ bản","Increase your upfront costs","增加前期成本"); ?></a></li>
                                    <li style="background: url('icon/3.gif') no-repeat left center;"><a onclick="$('.dialog_main_tangtaisan').load('form/frm_giam_xdcoban_dodang.php');"  href="#"><?php echo HienNgonNgu($_SESSION['NGONNGU'],"Giảm xây dựng cơ bản","Reduce upfront costs","降低前期成本"); ?></a></li>
                                    <li style="background: url('icon/4.gif') no-repeat left center;"><a onclick="$('.dialog_main_bangke_khauhaotaisan').load('form/frm_bangphanbo_xdcoban_dodang.php');" href="#"><?php echo HienNgonNgu($_SESSION['NGONNGU'],"Phân bổ xây dựng cơ bản","Cost allocation","成本分配"); ?></a></li>
                                </ul>
                            </li>
                        </ul>
                        <?php } ?>
                    </li><!--End Menu Tài sản -->
                    <li style="background: url('icon/tienluong.gif') no-repeat left center;"><!-- Menu tiền lương -->
                        <h2><a  href="#"><?php echo HienNgonNgu($_SESSION['NGONNGU'],"Giá thành","Price","Price"); ?></a></h2>
                        <?php if($_SESSION['Level']){ ?>
                            <ul>
                                <li style="background: url('icon/1.gif') no-repeat left center;"><a href="#"><?php echo HienNgonNgu($_SESSION['NGONNGU'],"Sản phẩm","List of Products and Works","Sản phẩm"); ?></a>
                                    <ul>
                                        <li style="background: url('icon/1.gif') no-repeat left center;<?php echo $HienThi; ?>"><a onclick="$('.dialog_main_danhmuc_sanpham').load('form/frm_dm_sanpham.php');"  href="#"><?php echo HienNgonNgu($_SESSION['NGONNGU'],"Danh mục sản phẩm","Product portfolio","产品目录"); ?></a></li>
                                        <li style="background: url('icon/2.gif') no-repeat left center;"><a onclick="$('.dialog_main_dinhmuc_sanpham').load('form/frm_dm_sodu_cpdodang_dk_sp.php');" href="#">Chi phí dở dang đầu kỳ...</a></li>
                                        <li style="background: url('icon/3.gif') no-repeat left center;"><a onclick="$('.dialog_main_bangcandoitaikhoan').load('form/frm_bangpbcpsxc_sp.php');" href="#">Lập bảng PB CPSXC...</a></li>
                                        <li style="background: url('icon/4.gif') no-repeat left center;"><a onclick="$('.dialog_main_bangcandoitaikhoan').load('form/frm_bangcpdodang_cuoiky_sp.php');" href="#">Chi phí dở dang cuối kỳ (PP giá thành tiêu chuẩn)</a></li>
                                        <li style="background: url('icon/4.gif') no-repeat left center;"><a onclick="$('.dialog_main_bangcandoitaikhoan').load('form/frm_bangcpdodang_cuoiky_sp_tyle.php');" href="#">Chi phí dở dang cuối kỳ (PP phân bổ NVL)</a></li>
                                        <li style="background: url('icon/5.gif') no-repeat left center;"><a onclick="$('.dialog_main_bangcandoitaikhoan').load('form/frm_bangcpdodang_cuoiky_congdoan.php');" href="#">Chi phí dở dang cuối kỳ theo công đoạn...</a></li>
                                    </ul>
                                </li>
                                <li style="background: url('icon/2.gif') no-repeat left center;"><a href="#"><?php echo HienNgonNgu($_SESSION['NGONNGU'],"Công trình","List of Products and Works","Công trình"); ?></a>
                                    <ul>
                                        <li style="background: url('icon/1.gif') no-repeat left center;"><a onclick="$('.dialog_main_danhmuc_sanpham').load('form/frm_dm_congtrinh.php');" href="#"><?php echo HienNgonNgu($_SESSION['NGONNGU'],"Danh mục công trình/Dịch vụ","List of works","作品清单"); ?></a></li>
                                        <li style="background: url('icon/2.gif') no-repeat left center;"><a onclick="$('.dialog_main_dinhmuc_sanpham').load('form/frm_dm_sodu_cpdodang_dk_ct.php');" href="#">Chi phí dở dang đầu kỳ...</a></li>
                                        <li style="background: url('icon/3.gif') no-repeat left center;"><a onclick="$('.dialog_main_bangcandoitaikhoan').load('form/frm_bangpbcpsxc_ct.php');" href="#">Lập bảng PB CPSXC...</a></li>
                                        <li style="background: url('icon/4.gif') no-repeat left center;"><a onclick="$('.dialog_main_bangcandoitaikhoan').load('form/frm_bangcpdodang_cuoiky_ct.php');" href="#">Chi phí dở dang cuối kỳ...</a></li>
                                    </ul>
                                </li>
                                <li style="background: url('icon/3.gif') no-repeat left center;"><a href="#"><?php echo HienNgonNgu($_SESSION['NGONNGU'],"Hợp đồng","List of Products and Works","Hợp đồng"); ?></a>
                                    <ul>
                                        <li style="background: url('icon/1.gif') no-repeat left center;"><a onclick="$('.dialog_main_danhmuc_sanpham').load('form/frm_dm_hopdong.php');" href="#"><?php echo HienNgonNgu($_SESSION['NGONNGU'],"Danh mục hợp đồng","List of works","作品清单"); ?></a></li>
                                        <li style="background: url('icon/2.gif') no-repeat left center;"><a onclick="$('.dialog_main_dinhmuc_sanpham').load('form/frm_dm_sodu_cpdodang_dk_hd.php');" href="#">Chi phí dở dang đầu kỳ...</a></li>
                                        <li style="background: url('icon/3.gif') no-repeat left center;"><a onclick="$('.dialog_main_bangcandoitaikhoan').load('form/frm_bangpbcpsxc_hd.php');" href="#">Lập bảng PB CPSXC...</a></li>
                                        <li style="background: url('icon/4.gif') no-repeat left center;"><a onclick="$('.dialog_main_bangcandoitaikhoan').load('form/frm_bangcpdodang_cuoiky_hd.php');" href="#">Chi phí dở dang cuối kỳ...</a></li>
                                    </ul>
                                </li>
                                <li ><a href="#">-------------------------</a></li>
                                <li style="background: url('icon/2.gif') no-repeat left center;"><a href="#"><?php echo HienNgonNgu($_SESSION['NGONNGU'],"Định mức","Quota","规范"); ?></a>
                                    <ul>
                                        <li style="background: url('icon/1.gif') no-repeat left center;<?php echo $HienThi; ?>"><a onclick="$('.dialog_main_dinhmuc_sanpham').load('form/frm_bang_dinhmuc_sanpham.php');" href="#"><?php echo HienNgonNgu($_SESSION['NGONNGU'],"Định mức sản phẩm","Product norms","产品规范"); ?></a></li>
                                        <li style="background: url('icon/2.gif') no-repeat left center;"><a onclick="$('.dialog_main_dinhmuc_sanpham').load('form/frm_bang_dinhmuc_congtrinh.php');" href="#"><?php echo HienNgonNgu($_SESSION['NGONNGU'],"Dự toán công trình","Project cost estimate","项目成本估算"); ?></a></li>
                                        <li style="background: url('icon/3.gif') no-repeat left center;<?php echo $HienThi; ?>"><a onclick="$('.dialog_main_dinhmuc_sanpham').load('form/frm_bang_dinhmuc_hopdong.php');" href="#"><?php echo HienNgonNgu($_SESSION['NGONNGU'],"Định mức hợp đồng","Product norms","产品规范"); ?></a></li>
                                        <li style="background: url('icon/4.gif') no-repeat left center;<?php echo $HienThi; ?>"><a onclick="$('.dialog_main_dinhmuc_sanpham').load('form/frm_bang_dinhmuc_xemay.php');" href="#"><?php echo HienNgonNgu($_SESSION['NGONNGU'],"Định mức xe máy","Vehicle norm","车辆规范"); ?></a></li>
                                    </ul>
                                </li>
                                <li style="background: url('icon/4.gif') no-repeat left center;<?php echo $HienThi; ?>" onclick="$('.dialog_main_dinhmuc_sanpham').load('form/frm_bangke_soluongvlxuatkhau.php');" ><a href="#">Bảng dự trù VLSX...</a></li>
                                <li style="background: url('icon/5.gif') no-repeat left center;<?php echo $HienThi; ?>"><a href="#">Mức TK/LP vật liệu</a>
                                    <ul>
                                        <li style="background: url('icon/1.gif') no-repeat left center;<?php echo $HienThi; ?>" onclick="$('.dialog_main_baocao_sudung_hoadon').load('form/frm_bangmuctietkiem_langphivlsx.php');"><a title="Mức tiết kiệm/lãng phí VLSX" href="#">Mức TK/LP VL sản xuất...</a></li>
                                        <li style="background: url('icon/2.gif') no-repeat left center;<?php echo $HienThi; ?>" onclick="$('.dialog_main_baocao_sudung_hoadon').load('form/frm_bangmuctietkiem_langphivlct.php');"><a title="Mức tiết kiệm/lãng phí VLSX" href="#">Mức TK/LP VL công trình...</a></li>
                                    </ul>
                                </li>
                                <li style="background: url('icon/6.gif') no-repeat left center;<?php echo $HienThi; ?>"><a href="#">Tính lương...</a>
                                    <ul>
                                        <li style="background: url('icon/1.gif') no-repeat left center;"><a onclick="$('.dialog_main_manv').load('form/frm_dm_manv.php');" href="#">Danh sách nhân viên...</a></li>
                                        <li style="background: url('icon/2.gif') no-repeat left center;"><a onclick="$('.dialog_main_mabophan').load('form/frm_dm_mabp.php');" href="#">Danh mục bộ phận...</a></li>
                                        <li style="background: url('icon/3.gif') no-repeat left center;"><a onclick="$('.dialog_main_baocao_sudung_hoadon').load('form/frm_bangluong_nhanvien.php');" href="#">Bảng lương nhân viên...</a></li>
                                        <li style="background: url('icon/4.gif') no-repeat left center;"><a onclick="$('.dialog_main_thietminh_baocao_taichinh').load('form/frm_baocao_tokhai_quyettoan.php');" href="#">Tờ khai quyết toán thuế TNCN...</a></li>
                                    </ul>
                                </li>
                                <li style="background: url('icon/7.gif') no-repeat left center;<?php echo $HienThi; ?>"><a href="#">Giá thành...</a>
                                    <ul>
                                        <li style="background: url('icon/1.gif') no-repeat left center;"><a onclick="$('.dialog_main_bangchitiet_socai').load('form/frm_bangchitiet_giathanh_tieuchuan.php');"  href="#">Giá thành tiêu chuẩn...</a></li>
                                    </ul>
                                </li>
                            </ul>
                        <?php } ?>
                    </li><!--End Menu tiền lương -->
                    <li style="background: url('icon/thue.gif') no-repeat left center;<?php echo $HienThi; ?>"><!-- Menu Báo cáo thuế-->
                        <h2><a  href="#"><?php echo HienNgonNgu($_SESSION['NGONNGU'],"Báo cáo thuế","tax reports","税务报告"); ?></a></h2>
                        <?php if($_SESSION['Level']!=5 && $_SESSION['Level']!=6 ){ ?>
                            <ul>
                                <li style="background: url('icon/1.gif') no-repeat left center; <?php if($_SESSION['theothongtu']!='tt40' ){ echo "display:none;"; } ?>"><a href="#"><?php echo HienNgonNgu($_SESSION['NGONNGU'],"Hộ kinh doanh","Value-added tax return","增值税申报表"); ?></a>
                                    <ul>
                                        <li onclick="$('.dialog_main_bangke_thue_gtgt').load('form/frm_bangke_thue_gtgt.php');" style="background: url('icon/1.gif') no-repeat left center;"><a href="#"><?php echo HienNgonNgu($_SESSION['NGONNGU'],"Tờ khai thuế 01/CNKD","Value-added tax return","增值税申报表"); ?></a></li>
                                        <li  onclick="$('.dialog_main_bangke_hanghoa_muavao').load('form/frm_bangke_hanghoa_muavao.php');" style="background: url('icon/2.gif') no-repeat left center;"><a href="#"><?php echo HienNgonNgu($_SESSION['NGONNGU'],"Bảng kê 01-2/BK-HĐKD","List of goods and services purchased","购买的商品和服务清单"); ?></a></li>
                                    </ul>
                                </li>
                                <li style="background: url('icon/1.gif') no-repeat left center;"><a href="#"><?php echo HienNgonNgu($_SESSION['NGONNGU'],"Tờ khai thuế giá trị gia tăng","Value-added tax return","增值税申报表"); ?></a>
                                    <ul>
                                        <li onclick="$('.dialog_main_bangke_thue_gtgt').load('form/frm_bangke_thue_gtgt.php');" style="background: url('icon/1.gif') no-repeat left center;"><a href="#"><?php echo HienNgonNgu($_SESSION['NGONNGU'],"Tờ khai thuế giá trị gia tăng","Value-added tax return","增值税申报表"); ?></a></li>
                                        <li onclick="$('.dialog_main_bangke_thue_gtgt').load('form/frm_bangke_thue_gtgt_dautu.php');" style="background: url('icon/2.gif') no-repeat left center;"><a href="#"><?php echo HienNgonNgu($_SESSION['NGONNGU'],"Tờ khai thuế giá trị gia tăng dành cho dự án đầu tư","Value-added tax return","增值税申报表"); ?></a></li>
                                        <li  onclick="$('.dialog_main_bangke_hanghoa_muavao').load('form/frm_bangke_hanghoa_muavao.php');" style="background: url('icon/3.gif') no-repeat left center;"><a href="#"><?php echo HienNgonNgu($_SESSION['NGONNGU'],"Bảng kê hàng hóa, dịch vụ mua vào","List of goods and services purchased","购买的商品和服务清单"); ?></a></li>
                                        <li onclick="$('.dialog_main_bangke_hanghoa_banra').load('form/frm_bangke_hanghoa_banra.php');" style="background: url('icon/4.gif') no-repeat left center;"><a href="#"><?php echo HienNgonNgu($_SESSION['NGONNGU'],"Bảng kê hàng hóa, dịch vụ bán ra","List of goods and services sold","已售商品和服务清单"); ?></a></li>
                                        <li onclick="$('.dialog_main_bangchitiet_socai').load('form/frm_bangchitiet_tinhhinh_thanhtoan_ngansach.php');" style="background: url('icon/5.gif') no-repeat left center;"><a href="#"><?php echo HienNgonNgu($_SESSION['NGONNGU'],"Sổ chi tiết thuế GTGT","Value-added tax books","增值税书"); ?></a></li>
                                        <li onclick="$('.dialog_main_hinhthuc_khaibaothue').load('form/frm_hinhthuc_khaibaothue.php');" style="background: url('icon/6.gif') no-repeat left center;"><a href="#"><?php echo HienNgonNgu($_SESSION['NGONNGU'],"Thiết lập kỳ khai thuế","Set up tax return","设置纳税申报表"); ?></a></li>
                                        <li onclick="$('.dialog_main_bangke_hanghoa_banra').load('form/frm_bangke_phuluc_giamthue_gtgt.php');" style="background: url('icon/7.gif') no-repeat left center;"><a href="#"><?php echo HienNgonNgu($_SESSION['NGONNGU'],"Phụ lục giảm thuế GTGT","",""); ?></a></li>
                                    </ul>
                                </li>
                                <li style="background: url('icon/2.gif') no-repeat left center;"><a onclick="$('.dialog_main_thietlap').load('form/frm_kiemtra_dulieu.php');" href="#">Hoàn thuế GTGT</a>
                                    <ul>
                                        <li style="background: url('icon/1.gif') no-repeat left center;"><a onclick="$('.dialog_main_makh').load('form/frm_hoanthue_tokhai_hh_nhapkhau.php');" href="#">Tờ khai hàng hoá nhập khẩu (BKNK)</a></li>
                                        <li style="background: url('icon/2.gif') no-repeat left center;"><a onclick="$('.dialog_main_makh').load('form/frm_hoanthue_tokhai_hh_xuatkhau.php');" href="#">Tờ khai hàng hoá xuất khẩu (01-2HT)</a></li>
                                    </ul>
                                </li>
                                <li style="background: url('icon/2.gif') no-repeat left center;"><a href="#"><?php echo HienNgonNgu($_SESSION['NGONNGU'],"Tờ khai thuế TNCN","Value-added tax return","增值税申报表"); ?></a>
                                    <ul>
                                        <li onclick="$('.dialog_main_bangke_thue_gtgt').load('form/frm_bangke_thue_khautru_tncn.php');" style="background: url('icon/1.gif') no-repeat left center;"><a href="#"><?php echo HienNgonNgu($_SESSION['NGONNGU'],"Khấu trừ thuế TNCN","Value-added tax return","增值税申报表"); ?></a></li>
                                    </ul>
                                </li>

                                <li onclick="$('.dialog_main_bangke_thue_gtgt').load('form/frm_bangke_thue_tainguyen.php');" style="background: url('icon/3.gif') no-repeat left center;"><a href="#"><?php echo HienNgonNgu($_SESSION['NGONNGU'],"Tờ khai thuế tài nguyên","Natural resource tax return","自然资源纳税申报表"); ?></a></li>
                                <li onclick="$('.dialog_main_bangke_thue_gtgt').load('form/frm_bangke_thue_tnmt.php');" style="background: url('icon/4.gif') no-repeat left center;"><a href="#"><?php echo HienNgonNgu($_SESSION['NGONNGU'],"Tờ khai phí bảo vệ môi trường","Environmental fee declaration","环保费申报"); ?></a></li>
                                <li onclick="$('.dialog_main_bangke_thue_gtgt').load('form/frm_bangke_thue_tnmt.php');" style="background: url('icon/5.gif') no-repeat left center;"><a href="#"><?php echo HienNgonNgu($_SESSION['NGONNGU'],"Tờ khai Thuế TTĐB","Special Consumption Tax declaration","特殊消费税申报单"); ?></a></li>
                                <li onclick="$('.dialog_main_bangchitiet_socai').load('form/frm_tinhhinh_thanhtoan_ngansach.php');" style="background: url('icon/6.gif') no-repeat left center;"><a href="#"><?php echo HienNgonNgu($_SESSION['NGONNGU'],"Tình hình thanh toán ngân sách","Budget payment situation","预算支付情况"); ?></a></li>

                                <li onclick="$('.dialog_main_tokhai_thuetndn').load('form/frm_bangke_xacdinhthue_tndn.php');" style="background: url('icon/7.gif') no-repeat left center;"><a href="#"><?php echo HienNgonNgu($_SESSION['NGONNGU'],"Quyết toán thuế TNDN","Finalization of corporate income tax","企业所得税的最终确定"); ?></a></li>
                                <li onclick="$('.dialog_main_baocao_sudung_hoadon').load('form/frm_baocao_sudung_hoadon.php');" style="background: url('icon/8.gif') no-repeat left center;"><a href="#"><?php echo HienNgonNgu($_SESSION['NGONNGU'],"Báo cáo sử dụng hóa đơn","Report using invoice","使用发票报告"); ?></a>
                            </ul>
                        <?php } ?>
                    </li><!--End Menu Báo cáo thuế -->
                    <li style="background: url('icon/nokh.gif') no-repeat left center;<?php echo $HienThi; ?>"><!-- Menu Nợ khách hàng-->
                        <?php if($_SESSION['Level']!=5 && $_SESSION['Level']!=6 ){ ?>
                            <h2><a  href="#"><?php echo HienNgonNgu($_SESSION['NGONNGU'],"Nợ khách hàng","Debt customers","债务客户"); ?></a></h2>
                            <ul>
                                <li style="background: url('icon/1.gif') no-repeat left center;"><a onclick="$('.dialog_main_makh').load('form/frm_dm_nhommakh.php');" href="#"><?php echo HienNgonNgu($_SESSION['NGONNGU'],"Nhóm khách hàng","Customer group","客户群"); ?></a></li>
                                <li style="background: url('icon/2.gif') no-repeat left center;"><a onclick="$('.dialog_main_makh').load('form/frm_dm_makh.php');" href="#"><?php echo HienNgonNgu($_SESSION['NGONNGU'],"Danh sách mã khách hàng","List of customer codes","客户代码列表"); ?></a></li>
                                <li ><a href="#">................</a></li>
                                <li style="background: url('icon/3.gif') no-repeat left center;"><a onclick="$('.dialog_main_bangke_chitietno_khachhang').load('form/frm_bangke_chitietno_khachhang.php');" href="#"><?php echo HienNgonNgu($_SESSION['NGONNGU'],"Chi tiết nợ khách hàng","Details of customer debt","客户债务的详细信息"); ?></a></li>
                                <li onclick="$('.dialog_main_bangke_tonghopno_khachhang').load('form/frm_bangke_tonghopno_khachhang.php');"  style="background: url('icon/4.gif') no-repeat left center;"><a href="#"><?php echo HienNgonNgu($_SESSION['NGONNGU'],"Bảng tổng hợp nợ khách hàng","Summary table of customer debt","客户债务汇总表"); ?></a></li>
                                <li onclick="$('.dialog_main_bangke_chitietno_khachhang').load('form/frm_gopmahang.php');"  style="background: url('icon/5.gif') no-repeat left center;"><a href="#"><?php echo HienNgonNgu($_SESSION['NGONNGU'],"Gộp mã khách hàng","Customer code","客户代码"); ?></a></li>
                            </ul>
                        <?php } ?>
                    </li><!--End Menu Nợ khách hàng -->
                    <li style="background: url('icon/tonghop.gif') no-repeat left center;<?php echo $HienThi; ?>"><!-- Menu Kế toán tổng hợp-->
                        <h2><a  href="#"><?php echo HienNgonNgu($_SESSION['NGONNGU'],"Kế toán tổng hợp","General Accounting","一般会计师"); ?></a></h2>
                        <?php if($_SESSION['Level']!=5 && $_SESSION['Level']!=6 ){ ?>
                            <ul>
                                <li style="background: url('icon/1.gif') no-repeat left center;"><a onclick="$('.dialog_main_pskt').load('form/frm_phieukhac.php');" href="#"><?php echo HienNgonNgu($_SESSION['NGONNGU'],"Nhập phiếu định khoản","Enter the ticket slip","输入票据单"); ?></a></li>
                                <!--<li style="background: url('icon/1.gif') no-repeat left center;"><a onclick="$('.dialog_main_psk_ghiso').load('form/frm_ps_k_ghiso.php');" href="#">Bút toán phát sinh khác...</a></li>-->
                                <!--<li style="background: url('icon/1.gif') no-repeat left center;"><a onclick="$('.dialog_main_psk_ghino').load('form/frm_ps_k_ghino.php');" href="#">Bút toán phát sinh khác...</a></li>-->
                                <li style="background: url('icon/2.gif') no-repeat left center;"><a onclick="$('.dialog_main_thietlap').load('form/frm_kiemtra_dulieu.php');" href="#">Kiểm tra dữ liệu...</a>
                                    <ul>
                                        <li style="background: url('icon/1.gif') no-repeat left center;"><a onclick="$('.dialog_main_thietlap').load('form/frm_kiemtra_dulieu.php');" href="#">Kiểm tra dữ liệu...</a></li>
                                        <li style="background: url('icon/2.gif') no-repeat left center;"><a onclick="$('.dialog_main_thietlap').load('form/frm_kiemtra_dulieu_duthua.php');" href="#">Dữ liệu dư thừa...</a></li>
                                        <li style="background: url('icon/3.gif') no-repeat left center;"><a onclick="$('.dialog_main_bangke_hanghoa_muavao').load('form/frm_kiemtra_thanhtoan_quanganhang.php');" href="#">Kiểm tra thanh toán qua ngân hàng...</a></li>
                                        <li style="background: url('icon/3.gif') no-repeat left center;"><a onclick="$('.dialog_main_thietlap').load('form/frm_kiemtra_dulieu_bctc.php');" href="#">Kiểm tra BCTC...</a></li>
                                    </ul>
                                </li>
                                <li style="background: url('icon/3.gif') no-repeat left center;"><a onclick="$('.dialog_main_xacdinh_kqkd').load('form/frm_xacdinh_ketquakinhdoanh.php');" href="#">Xác định kết quả kinh doanh...</a></li>
                                <li style="background: url('icon/4.gif') no-repeat left center;"><a onclick="$('.dialog_main_sonhatky').load('form/frm_sonhatky.php');" href="#">Sổ nhật ký...</a></li>
                                <li style="background: url('icon/5.gif') no-repeat left center;"><a onclick="$('.dialog_main_bangcandoitaikhoan').load('form/frm_bangcandoitaikhoan.php');" href="#">Bảng cân đối tài khoản...</a></li>
                                <li style="background: url('icon/6.gif') no-repeat left center;"><a onclick="$('.dialog_main_bangchitiet_socai').load('form/frm_bangchitiet_socai.php');" href="#">Sổ cái...</a></li>

                                <li style="background: url('icon/8.gif') no-repeat left center;"><a onclick="$('.dialog_main_bangcandoiketoan').load('form/frm_bangcandoiketoan.php');" href="#"><?php if($_SESSION['theothongtu']=='tt200'){ echo "Bảng cân đối kế toán";}else{ echo "Báo cáo tình hình tài chính";} ?></a></li>

                                <li style="background: url('icon/9.gif') no-repeat left center;"><a onclick="$('.dialog_main_baocao_kqkd').load('form/frm_baocao_kqkd.php');" href="#">Kết quả kinh doanh...</a></li>
                                <li style="background: url('icon/10.gif') no-repeat left center;"><a onclick="$('.dialog_main_bangcandoiketoan').load('form/frm_bangluuchuyen_tiente.php');" href="#">Báo cáo lưu chuyển tiền tệ...</a></li>
                                <li style="background: url('icon/11.gif') no-repeat left center;"><a onclick="$('.dialog_main_thietminh_baocao_taichinh').load('form/frm_baocao_thietminh_taichinh.php');" href="#">Thuyết minh báo cáo tài chính...</a></li>
                                <li style="background: url('icon/11.gif') no-repeat left center;"><a onclick="$('.dialog_main_thietminh_baocao_taichinh').load('form/frm_ketxuat_baocao_taichinh.php');" href="#">Kết xuất BCTC...</a></li>
                                <li style="background: url('icon/12.gif') no-repeat left center;"><a href="#" >Chuyển niên độ ...</a>
                                    <ul>
                                        <li style="background: url('icon/1.gif') no-repeat left center;"><a href="#" onclick="$('.dialog_main_thietlap').load('form/frm_chuyenniendo_nammoi.php');" >Chuyển niên độ sang năm <?php echo $_SESSION['NienDo']+1; ?> </a>
                                        <li style="background: url('icon/2.gif') no-repeat left center;"><a href="#" onclick="$('.dialog_main_thietlap').load('form/frm_chuyenniendo_bosung.php');" >Cập nhật niên độ bổ sung </a></li>
                                    </ul>
                                </li>
                            </ul>
                        <?php } ?>
                    </li><!--End Menu Kế toán tổng hợp -->
                    <li style="background: url('icon/thongke.gif') no-repeat left center;<?php echo $HienThi; ?>"><!-- Menu Kế toán tổng hợp-->
                        <h2><a  href="#"><?php echo HienNgonNgu($_SESSION['NGONNGU'],"Thống kê","statistical","统计"); ?></a></h2>
                        <?php if($_SESSION['Level']!=5 && $_SESSION['Level']!=6 ){ ?>
                            <ul>
                                <li style="background: url('icon/1.gif') no-repeat left center;"><a onclick="$('.dialog_main_ds_nhapkho').load('form/frm_danhsach_tatca_chungtu.php');" href="#"><?php echo HienNgonNgu($_SESSION['NGONNGU'],"Danh sách chứng từ","Missing original documents","缺少原始文件"); ?></a></li>
                                <li style="background: url('icon/2.gif') no-repeat left center;"><a onclick="$('.dialog_main_ds_nhapkho').load('form/frm_danhsach_khongchungtugoc.php');" href="#"><?php echo HienNgonNgu($_SESSION['NGONNGU'],"Thiếu chứng từ gốc","Missing original documents","缺少原始文件"); ?></a></li>
                                <li style="background: url('icon/3.gif') no-repeat left center;"><a onclick="$('.dialog_main_ds_nhapkho').load('form/frm_danhsach_cpkhongduoctru.php');" href="#"><?php echo HienNgonNgu($_SESSION['NGONNGU'],"Chi phí không được trừ","Cost is not deducted","不扣除成本"); ?></a></li>
                                <?php if($_SESSION['Level']==1){ ?>
                                    <li style="background: url('icon/4.gif') no-repeat left center;"><a onclick='window.open("form/frm_thongke_truycap_window.php","thongketruycap","height="+(getHeight()-80)+",width="+getWidth());' href="#"><?php echo HienNgonNgu($_SESSION['NGONNGU'],"Thống kê truy cập","Statistical access","访问统计"); ?></a></li>
                                    <li style="background: url('icon/5.gif') no-repeat left center;"><a onclick='window.open("form/frm_thongke_tonghop_truycap_window.php","thongketonghoptruycap","height="+(getHeight()-80)+",width="+getWidth());' href="#"><?php echo HienNgonNgu($_SESSION['NGONNGU'],"Thống kê tổng hợp truy cập","Statistics aggregate access","统计聚合访问"); ?></a></li>
                                <?php } ?>
                                <li style="background: url('icon/6.gif') no-repeat left center;"><a onclick='window.open("form/frm_phieukiemtra_chungtu_tonghop_window.php?loaiphieu=ALL","thongketruycap_tonghop","height="+(getHeight()-80)+",width="+getWidth());' href="#"><?php echo HienNgonNgu($_SESSION['NGONNGU'],"Phiếu kiểm tra hóa đơn","Invoice check slip","发票检查单"); ?></a></li>
                                <li style="background: url('icon/7.gif') no-repeat left center;"><a onclick='window.open("form/frm_danhsach_conty_trinhduyet.php","Danhsach_congty_trinhduyet","height="+(getHeight()-80)+",width="+getWidth());' href="#"><?php echo HienNgonNgu($_SESSION['NGONNGU'],"Danh sách trình duyệt","Browser list","浏览器列表"); ?></a></li>
                                <li style="background: url('icon/8.gif') no-repeat left center;"><a onclick='window.open("form/frm_danhsach_conty_giaonhan.php","Danhsach_congty_giaonhan","height="+(getHeight()-80)+",width="+getWidth());' href="#"><?php echo HienNgonNgu($_SESSION['NGONNGU'],"Danh sách giao nhận","Forwarding list","转发列表"); ?></a></li>
                                <li style="background: url('icon/8.gif') no-repeat left center;"><a onclick='window.open("form/frm_danhsach_tonghop_muavao_banra.php","frm_danhsach_tonghop_muavao_banra","height="+(getHeight()-80)+",width="+getWidth());' href="#"><?php echo HienNgonNgu($_SESSION['NGONNGU'],"Bảng kê mua vào - bán ra","Forwarding list","转发列表"); ?></a></li>
                                <?php if($_SESSION['Level']==1){ ?>
                                    <li style="background: url('icon/9.gif') no-repeat left center;"><a onclick='window.open("form/frm_danhsach_nhatky_lamviec.php","DanhSach_NhatKy_LamViec","height="+(getHeight()-80)+",width="+getWidth());' href="#"><?php echo HienNgonNgu($_SESSION['NGONNGU'],"Nhật ký làm việc","work diary","工作日记"); ?></a></li>
                                    <li style="background: url('icon/10.gif') no-repeat left center;"><a onclick="$('.dialog_main_makh').load('form/frm_danhsach_thu_quanly.php');" href="#"><?php echo HienNgonNgu($_SESSION['NGONNGU'],"Danh sách thư quản lý","Forwarding list","转发列表"); ?></a></li>
                                <?php } ?>
                                <li style="background: url('icon/11.gif') no-repeat left center;"><a onclick="$('.dialog_main_makh').load('form/frm_danhsach_dangky_kehach.php');" href="#"><?php echo HienNgonNgu($_SESSION['NGONNGU'],"Đăng ký kế hoạch tuần","Forwarding list","转发列表"); ?></a></li>
                            </ul>
                        <?php } ?>
                    </li><!--End Menu Kế toán tổng hợp -->
                    <?php if($_SESSION['Level']==1 || $_SESSION['Level']==2 || $_SESSION['Level']==3){ ?>
                        <li style="background: url('icon/quanly.gif') no-repeat left center;"><!-- Menu Kế toán tổng hợp-->
                            <h2><a  href="#"><?php echo HienNgonNgu($_SESSION['NGONNGU'],"Quản lý","Manage","管理"); ?></a></h2>
                            <ul>
                                <?php if($_SESSION['Level']==1 || $_SESSION['Level']==2 || $_SESSION['Level']==3){ ?>
                                    <li style="background: url('icon/1.gif') no-repeat left center;"><a onclick='window.open("form/frm_danhsach_phancong_giaoviec.php","Danhsach_phancong_giaoviec","height="+(getHeight()-80)+",width="+getWidth());' href="#"><?php echo HienNgonNgu($_SESSION['NGONNGU'],"Quản lý doanh nghiệp","Assignment list - job assignment","作业列表 - 作业分配"); ?></a></li>
                                <?php } if($_SESSION['Level']==1){ ?>
                                    <li style="background: url('icon/2.gif') no-repeat left center;display: none;"><a onclick="$('.dialog_main_thietlap').load('form/frm_phanquyen.php');" href="#"><?php echo HienNgonNgu($_SESSION['NGONNGU'],"Phân quyền","Decentralization","下放"); ?></a></li>
                                    <li style="background: url('icon/3.gif') no-repeat left center;"><a onclick="$('.dialog_main_makh').load('form/frm_dm_nguoidung.php');" href="#"><?php echo HienNgonNgu($_SESSION['NGONNGU'],"Quản lý người dùng","Quản lý người dùng","Quản lý người dùng"); ?></a></li>
                                    <li style="background: url('icon/4.gif') no-repeat left center;"><a onclick="$('.dialog_main_dinhmuc_sanpham').load('form/frm_bangthongke_bc.php');" href="#"><?php echo HienNgonNgu($_SESSION['NGONNGU'],"Thống kê BCTC","Forwarding list","转发列表"); ?></a></li>
                                <?php } if($_SESSION['Level']==1 || $_SESSION['Level']==2 || $_SESSION['Level']==3){ ?>
								<li style="background: url('icon/4.gif') no-repeat left center;"><a onclick="$('.dialog_main_dinhmuc_sanpham').load('form/frm_bangthongke_duyettokhai_thuegtgt.php');" href="#"><?php echo HienNgonNgu($_SESSION['NGONNGU'],"Thống kê tờ khai thuế GTGT","Forwarding list","转发列表"); ?></a></li>
                                    <li style="background: url('icon/5.gif') no-repeat left center;"><a onclick="$('.dialog_main_makh').load('form/frm_dm_phancong_khaithue.php');" href="#"><?php echo HienNgonNgu($_SESSION['NGONNGU'],"Quản lý phân công khai thuế","Quản lý phân công khai thuế","Quản lý phân công khai thuế"); ?></a></li>
                                    <li style="background: url('icon/6.gif') no-repeat left center;"><a onclick='window.open("form/frm_danhsach_thanh_kiemtra.php","Danhsach_congty_thanhkiemtra","height="+(getHeight()-80)+",width="+getWidth());' href="#"><?php echo HienNgonNgu($_SESSION['NGONNGU'],"Danh sách thanh - kiểm tra","Browser list","浏览器列表"); ?></a></li>
                                    <li style="background: url('icon/7.gif') no-repeat left center;"><a onclick="$('.dialog_main_makh').load('form/frm_nhatky_lamviec_ketoanvien.php');" href="#"><?php echo HienNgonNgu($_SESSION['NGONNGU'],"Nhật ký làm việc kế toán viên","Forwarding list","转发列表"); ?></a></li>
                                <?php } ?>
                            </ul>
                        </li><!--End Menu Kế toán tổng hợp -->
                    <?php } ?>
                    <li style="background: url('icon/help.gif') no-repeat left center;"><!-- Menu Kế toán tổng hợp-->
                        <h2><a  href="#"><?php echo HienNgonNgu($_SESSION['NGONNGU'],"Trợ giúp","Help","帮助"); ?></a></h2>
                        <ul>
                            <li style="background: url('icon/1.gif') no-repeat left center;"><a  href="#"><?php echo HienNgonNgu($_SESSION['NGONNGU'],"Khách hàng","Customer","顾客"); ?></a>
                                <ul>
                                    <li style="background: url('icon/1.gif') no-repeat left center;"><a onclick="$('.dialog_main_bangcandoitaikhoan').load('form/frm_bangdieutra_xaydung_ct.php');" href="#"><?php echo HienNgonNgu($_SESSION['NGONNGU'],"Bảng điều tra công trình XD","Construction survey panel","施工调查小组"); ?></a></li>
                                </ul>
                            </li>
                        </ul>
                    </li><!--End Menu Kế toán tổng hợp -->

                </ul>
            </nav>
            <div class="clear"></div>
        </div>
    </td>
</tr>