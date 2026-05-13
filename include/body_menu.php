<table width="600" border="1" style="text-align:center;color: #0099FF;border: 1px solid #0099FF;margin-top: 10px;" cellspacing="1" cellpadding="20">
  <tr>
    <td colspan="2" style="width: 300px"><strong><?php echo HienNgonNgu($_SESSION['NGONNGU'],"Chức năng","Function","功能"); ?></strong></td>
  </tr>
  <tr>
    <td style="width: 300px"> <button onclick="$('.dialog_main_pskt').load('form/frm_phieuthuchi.php');"
                 class="ui-button ui-widget ui-corner-all" style="width: 100%;margin-bottom: 2px;"><span
                    style="font-size: 16px;"><?php echo HienNgonNgu($_SESSION['NGONNGU'],"Phiếu Thu - Chi","Receipt - Payment slip","收据 - 付款单"); ?></span></button></td>
    <td style="width: 300px"><button onclick="$('.dialog_main_nhapkho').load('form/frm_nhapkho.php');" class="ui-button ui-widget ui-corner-all" style="width: 100%;margin-bottom: 2px;"><span
                    style="font-size: 16px;"><?php echo HienNgonNgu($_SESSION['NGONNGU'],"Nhập kho","Enter the warehouse","进入仓库"); ?></span></button></td>
  </tr>
  <tr>
    <td><button onclick="$('.dialog_main_pskt').load('form/frm_phieukhac.php');" class="ui-button ui-widget ui-corner-all" style="width: 100%;margin-bottom: 2px;"><span
                    style="font-size: 16px;"><?php echo HienNgonNgu($_SESSION['NGONNGU'],"Phiếu định khoản","Enter the ticket slip","输入一张票"); ?></span></button></td>
    <td><button onclick="$('.dialog_main_xuatkho').load('form/frm_xuatkho.php');" class="ui-button ui-widget ui-corner-all" style="width: 100%;margin-bottom: 2px;"><span
                    style="font-size: 16px;"><?php echo HienNgonNgu($_SESSION['NGONNGU'],"Xuất kho","Out of Stock","仓储"); ?></span></button></td>
  </tr>
    <tr>
        <td><button onclick="$('.dialog_main_bangke_hanghoa_laigop').load('form/frm_bangke_hanghoa_laigop.php');" class="ui-button ui-widget ui-corner-all" style="width: 100%;margin-bottom: 2px;"><span
                        style="font-size: 16px;"><?php echo HienNgonNgu($_SESSION['NGONNGU'],"Chênh lệch giá","Price difference","价格差异"); ?></span></button></td>
        <td><button onclick="$('.dialog_main_bangketonkho').load('form/frm_bangketonkho.php');" class="ui-button ui-widget ui-corner-all" style="width: 100%;margin-bottom: 2px;"><span
                        style="font-size: 16px;"><?php echo HienNgonNgu($_SESSION['NGONNGU'],"Tồn kho","Inventory","盘点"); ?></span></button></td>
    </tr>
</table>
