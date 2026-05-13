<?php
session_start();
$tungay = $_GET['tungay'];
$denngay = $_GET['denngay'];
$intheothuesuat = $_GET['intheothuesuat'];
$intheochungtu = $_GET['intheochungtu'];
$sapxeptheohoadon = $_GET['sapxeptheohoadon'];
$theothongtu = $_GET['theothongtu'];
$kieuin = $_GET['kieuin'];

$time = strtotime($denngay);
$thang =date("m",$time);
$nam =date("Y",$time);
$timetungay = strtotime($tungay);
$timedenngay = strtotime($denngay);
$tungay_fm .= date("d-m-Y", $timetungay);
$denngay_fm .= date("d-m-Y", $timedenngay);

$quy = "Từ ngày ".$tungay_fm." đến ngày ".$denngay_fm;


?>
<style>
    #dialog-insolieu_candoi_tk fieldset {
        border: 1px solid #a1daf2 !important;
        font-weight: bold !important;
    }
</style>
<script>
    $(function () {
        $dir_module_ketoantonghop = "modules/ketoantonghop/";
        $("#dialog-insolieu_candoi_tk").dialog({
            resizable: false,
            height: "auto",
            width: 650,
            modal: true
        });
        $("#dialog-insolieu_candoi_tk").keydown(function (event) {//--------------Các phím tắt
            if (event.keyCode == Keys.ESCAPE) {
                xoadialog_insolieu_thuchi();
            }
        });
        function xoadialog_insolieu_thuchi() {
            reset_dialog(".dialog-insolieu_candoi_tk");
            reset_dialog(".dialog_main_thongbao");
        }

        //----- Di chuyển các trường
        $("#TenPhieu_ThuChi").keydown(function (event) {//--------------Các phím tắt
            if (event.keyCode == Keys.ENTER) {
                $("#NgayHoaDon_InPhieu_ThuChi").focus();
            }
        });
        $("#NgayHoaDon_InPhieu_ThuChi").keydown(function (event) {//--------------Các phím tắt
            if (event.keyCode == Keys.ENTER) {
                $("#NgayLap_InPhieuThuChi").focus();
            }
        });
        $("#NgayLap_InPhieuThuChi").keydown(function (event) {//--------------Các phím tắt
            if (event.keyCode == Keys.ENTER) {
                $("#XuatExcel").focus();
            }
        });

        $("#XuatExcel").keydown(function (event) {//--------------Các phím tắt
            if (event.keyCode == Keys.ENTER) {
                $("#batđauin_insolieu_thuchi").focus();
            }
        });
        //--Kết thúc di chuyễn các trường

        $("#ketthuc_insolieu_thuchi").click(function () {
            xoadialog_insolieu_thuchi();
        });

        $("#batđauin_insolieu_thuchi").click(function () {
            var parsedJson = "";
            $TenPhieu_ThuChi = $("#TenPhieu_ThuChi").val();
            $NgayLap_InPhieuThuChi = $("#NgayLap_InPhieuThuChi").val();
            $.ajax({// Lấy thông tin phiếu và lưu vào session
                url: $dir_module_ketoantonghop + "laythongtininphieu_bangcandoi_ketoan.php",
                data: {
                    tungay:"<?php echo $tungay; ?>",
                    denngay:"<?php echo $denngay ?>",
                    intheothuesuat:"<?php echo $intheothuesuat ?>",
                    intheochungtu:"<?php echo $intheochungtu ?>",
                    sapxeptheohoadon:'<?php echo $sapxeptheohoadon ?>',
                    tenphieu:$("#TenPhieu_ThuChi").val(),
                    ngaylap:$("#NgayLap_InPhieuThuChi").val(),
                    ngayhoadon:$("#NgayHoaDon_InPhieu_ThuChi").val(),
                },
                async: false,
                success: function (response) {
                }
            });
            if($("#XuatExcel").prop("checked") == true){
                window.open($dir_module_ketoantonghop+"xuatexceltkchitiet.php?sole=<?php echo $sole ?>");
            }else{
				
				<?php
				if($_SESSION['theothongtu']=="tt200"){
			?>
				loadiFrame('tcpdf/baocao/inbang_candoi_ketoan_tt200.php?sole=<?php echo $sole ?>');
			<?php
				}else{
			?>
				loadiFrame('tcpdf/baocao/inbang_candoi_ketoan.php?sole=<?php echo $sole ?>');
			<?php		
				}
			?>
                
                $("#ifr_inphieuthuchi").load(
                    function () {
                        window.frames['ifr_inphieuthuchi'].focus();
                        window.frames['ifr_inphieuthuchi'].print();
                    }
                );
            }
        });
        $("#xemtruockhiin_insolieu_thuchi").click(function () {
            var parsedJson = "";
            $TenPhieu_ThuChi = $("#TenPhieu_ThuChi").val();
            $NgayLap_InPhieuThuChi = $("#NgayLap_InPhieuThuChi").val();
            $.ajax({// Lấy thông tin phiếu và lưu vào session
                url: $dir_module_ketoantonghop + "laythongtininphieu_bangcandoi_ketoan.php",
                data: {
                    tungay:"<?php echo $tungay; ?>",
                    denngay:"<?php echo $denngay ?>",
                    intheothuesuat:"<?php echo $intheothuesuat ?>",
                    intheochungtu:"<?php echo $intheochungtu ?>",
                    sapxeptheohoadon:"<?php echo $sapxeptheohoadon ?>",
                    tenphieu:$("#TenPhieu_ThuChi").val(),
                    ngaylap:$("#NgayLap_InPhieuThuChi").val(),
                    ngayhoadon:$("#NgayHoaDon_InPhieu_ThuChi").val(),
                },
                async: false,
                success: function (response) {
                }
            });

            //$('.dialog_main_print').load("form/print_bangcandoi_ketoan.php?keuin?=<?php echo $kieuin; ?>");
			<?php
				if($_SESSION['theothongtu']=="tt200"){
			?>
				window.open("tcpdf/baocao/inbang_candoi_ketoan_tt200.php","bankemuavao","menubar=0,resizable=1");
			<?php
				}else{
			?>
			window.open("tcpdf/baocao/inbang_candoi_ketoan.php","bankemuavao","menubar=0,resizable=1");
			<?php		
				}
			?>
			
        });
        function callPrint(iframeId) {
            var PDF = document.getElementById(iframeId);
            PDF.focus();
            PDF.contentWindow.print();
        }

        function loadiFrame(src) {
            $("#iframeplaceholder").html("<iframe id='ifr_inphieuthuchi' name='ifr_inphieuthuchi' src='" + src + "' />");
        }
    });

</script>
<div id="dialog-insolieu_candoi_tk" title="In số liệu">
    <p>
    <div style="display: none;" id="iframeplaceholder"></div>
    <table style="width: 100%;">
        <tr>
            <td style="width: 70%;" valign="top">
                <fieldset>
                    <legend>Thiết lập</legend>
                    <table width="100%" border="0">
                        <tr>
                            <td>Tiêu đề</td>
                            <td>
                                <label for="TenPhieu_ThuChi"></label>
                                <input type="text" name="TenPhieu_ThuChi" style="width:100%" id="TenPhieu_ThuChi"
                                       value="<?php if($_SESSION['theothongtu']=='tt200'){ echo "BẢNG CÂN ĐỐI KẾ TOÁN";}else{ echo "BÁO CÁO TÌNH HÌNH TÀI CHÍNH";} ?>"/>
                            </td>
                        </tr>
                        <tr>
                            <td>Ngày HĐ</td>
                            <td><input type="text" name="NgayHoaDon_InPhieu_ThuChi" style="width:100%"
                                       id="NgayHoaDon_InPhieu_ThuChi" value="<?php echo $denngay_fm;  ?>"/></td>
                        </tr>
                        <tr>
                            <td>Ngày Lập</td>
                            <td><input type="date" name="NgayLap_InPhieuThuChi" style="width:100%"
                                       value="<?php echo date("Y-m-d"); ?>" id="NgayLap_InPhieuThuChi"/></td>
                        </tr>
                        <tr>
                          <td style="text-align:right">
                            &nbsp;&nbsp;<input type="checkbox" name="XuatExcel" id="XuatExcel" />
                            </td>
                          <td>Xuất excel</td>
                        </tr>
                    </table>
                </fieldset>
            </td>
            <td style="width: 30%;">
                <fieldset>
                    <button id="batđauin_insolieu_thuchi" class="ui-button ui-widget ui-corner-all"
                            style="width: 100%;margin-bottom: 2px;"><span
                                style="font-size: 16px;">Bắt đầu in</span></button>
                    <button id="xemtruockhiin_insolieu_thuchi" class="ui-button ui-widget ui-corner-all"
                            style="width: 100%;;margin-bottom: 2px;"><span
                                style="font-size: 16px;">Xem</span></button>
                    <button id="xuatexcel_insolieu_thuchi" class="ui-button ui-widget ui-corner-all"
                            style="width: 100%;;margin-bottom: 2px;display: none;"><span
                                style="font-size: 16px;">Xuất excel</span></button>
                    <button id="ketthuc_insolieu_thuchi" class="ui-button ui-widget ui-corner-all"
                            style="width: 100%;;margin-bottom: 2px;"><span
                                style="font-size: 16px;">Kết thúc</span></button>
                </fieldset>
            </td>
        </tr>
    </table>
    </p>
</div>