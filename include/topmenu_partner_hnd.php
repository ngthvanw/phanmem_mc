<?php
$user  = $_SESSION['User'];
$HienThi = "";
?>
<tr>
    <td colspan="2">
        <div class="main_menu">
            <link href="topmenu/css/sm-core-css.css" rel="stylesheet" type="text/css" />
            <link href="topmenu/css/sm-blue/sm-blue.css" rel="stylesheet" type="text/css" />

            <script src="js/jquery.contextMenu.js"></script>
            <script src="js/jquery.ui.position.min.js"></script>
            <link rel="stylesheet" href="js/jquery.contextMenu.min.css">

            <script type="text/javascript" src="topmenu/jquery.smartmenus.js"></script>
            <script type="text/javascript" src="topmenu/addons/keyboard/jquery.smartmenus.keyboard.js"></script>

            <script type="text/javascript">
                $(function() {
                    $('#main-menu').smartmenus({
                        subMenusSubOffsetX: 1,
                        subMenusSubOffsetY: -8
                    });
                    $('#main-menu').smartmenus('keyboardSetHotkey', 123, 'shiftKey');
                });
            </script>

            <nav id="main-nav" role="navigation" style="z-index: 9 !important;">
                <ul id="main-menu" class="sm sm-blue">
                    <li style="background: url('icon/nokh.gif') no-repeat left center;<?php echo $HienThi; ?>">
                        <h2><a href="#"><?php echo HienNgonNgu($_SESSION['NGONNGU'],"Đối tác","Partners","伙伴"); ?></a></h2>
                        <ul>
                            <li style="background: url('icon/1.gif') no-repeat left center;">
                                <a href="#" onclick="$('.dialog_main_dinhmuc_sanpham').load('form/frm_bangthanhtoan_khonghoadon.php');">
                                    <?php echo HienNgonNgu($_SESSION['NGONNGU'],"Bảng kê HH không hóa đơn","List of goods without invoices","没有发票的商品清单"); ?>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
            <div class="clear"></div>
        </div>
    </td>
</tr>
