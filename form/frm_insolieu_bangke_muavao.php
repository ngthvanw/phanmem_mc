<?php
session_start();
require("../config.php");
$tungay = $_GET['tungay'];
$denngay = $_GET['denngay'];
$intheothuesuat = $_GET['intheothuesuat'];
$intheochungtu = $_GET['intheochungtu'];
$sapxeptheohoadon = $_GET['sapxeptheohoadon'];
$loaingoaite = $_GET['loaingoaite'];
$kieuin = $_GET['kieuin'];
$loaibangke = $_GET['loaibangke'];
$loaithue = $_GET['loaithue'];
$chinhanh = $_GET['chinhanh'];

$time = strtotime($denngay);
$thang =date("m",$time);
$nam =date("Y",$time);

function load_ppkhaithue($dir)
{
    $fp1 = @fopen($dir . "/" . 'phuongphapkhaithue.db', "r"); // đọc thông tin chung
    $string_info = fgets($fp1);
    fclose($fp1);
    if ($string_info == "") {
        $string_info = 1;
    }
    return ($string_info);
}

$ppkhautru = load_ppkhaithue($driver . "/datafile/" . $_SESSION['MST']."/".$_SESSION['NienDo']);

if(substr($ppkhautru, 0,1)=="1"){
    $quy = LayThang($thang,$nam);
}else{
    $quy = LayQuy($thang,$nam);
}


function LayQuy($thang,$nam){
    if($thang==1 ||$thang==2||$thang==3 ){
        $str=" Quý 1 năm ".$nam;
    }
    if($thang==4 ||$thang==5||$thang==6 ){
        $str=" Quý 2 năm ".$nam;
    }
    if($thang==7 ||$thang==8||$thang==9 ){
        $str=" Quý 3 năm ".$nam;
    }
    if($thang==10 ||$thang==11||$thang==12 ){
        $str=" Quý 4 năm ".$nam;
    }
    return $str;
}

function LayThang($thang,$nam){
    $str=" Tháng {$thang} năm ".$nam;
    return $str;
}

?>
<style>
    #dialog-insolieu_nhapkho fieldset {
        border: 1px solid #a1daf2 !important;
        font-weight: bold !important;
    }
</style>
<script>
    $(function () {
        $dir_module_baocaothue = "modules/baocaothue/";
        $("#dialog-insolieu_nhapkho").dialog({
            resizable: false,
            height: "auto",
            width: 650,
            modal: true
        });
        $("#dialog-insolieu_nhapkho").keydown(function (event) {//--------------Các phím tắt
            if (event.keyCode == Keys.ESCAPE) {
                xoadialog_insolieu_thuchi();
            }
        });
        function xoadialog_insolieu_thuchi() {
            reset_dialog(".dialog-insolieu_nhapkho");
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
            $.confirm({
                title: 'Cập nhật thành công',
                type: 'green',
                autoClose: 'OK|1000',
                content: function(){
                    var self = this;
                    return $.ajax({
                        url: $dir_module_baocaothue + "laythongtininphieubangkemuavao.php",
                        dataType: 'json',
                        method: 'get',
                        data: {
                            tungay:"<?php echo $tungay; ?>",
                            denngay:"<?php echo $denngay ?>",
                            intheothuesuat:"<?php echo $intheothuesuat ?>",
                            intheochungtu:"<?php echo $intheochungtu ?>",
                            sapxeptheohoadon:"<?php echo $sapxeptheohoadon ?>",
                            kieuin:"<?php echo $kieuin ?>",
                            loaibangke:"<?php echo $loaibangke ?>",
                            loaithue:"<?php echo $loaithue ?>",
                            chinhanh:"<?php echo $chinhanh ?>",
                            tenphieu:$("#TenPhieu_ThuChi").val(),
                            ngaylap:$("#NgayLap_InPhieuThuChi").val(),
                            ngayhoadon:$("#NgayHoaDon_InPhieu_ThuChi").val()
                        },
                    });
                },
                buttons: {
                    "OK": {
                        keys: ['Y'], action: function () {
                            if($("#XuatExcel").prop("checked") == true){
                                window.open($dir_module_baocaothue+"xuatexcelbangkemuavao.php");
                            }else{
								if("<?php echo $intheochungtu ?>"=='3'){
                                loadiFrame('tcpdf/baocao/inbangke_hanghoa_muavao_01.php?loaibangke=<?php echo $loaibangke ?>');
                            }else{
							   if("<?php echo $loaingoaite ?>"=="NT"){
									loadiFrame('tcpdf/baocao/inbangke_hanghoa_muavao_nt.php?loaibangke=<?php echo $loaibangke ?>');
								}else{
									loadiFrame('tcpdf/baocao/inbangke_hanghoa_muavao.php?loaibangke=<?php echo $loaibangke ?>');
								}
                            }								
                                $("#ifr_inphieuthuchi").load(
                                    function () {
                                        window.frames['ifr_inphieuthuchi'].focus();
                                        window.frames['ifr_inphieuthuchi'].print();
                                    }
                                );
                            }
                        }
                    }
                }
            });
        });
        $("#xemtruockhiin_insolieu_thuchi").click(function () {
            var parsedJson = "";
            $TenPhieu_ThuChi = $("#TenPhieu_ThuChi").val();
            $NgayLap_InPhieuThuChi = $("#NgayLap_InPhieuThuChi").val();
            $.confirm({
                title: 'Cập nhật thành công',
                type: 'green',
                autoClose: 'OK|1000',
                content: function(){
                    var self = this;
                    return $.ajax({
                        url: $dir_module_baocaothue + "laythongtininphieubangkemuavao.php",
                        dataType: 'json',
                        method: 'get',
                        data: {
                            tungay:"<?php echo $tungay; ?>",
                            denngay:"<?php echo $denngay ?>",
                            intheothuesuat:"<?php echo $intheothuesuat ?>",
                            intheochungtu:"<?php echo $intheochungtu ?>",
                            sapxeptheohoadon:"<?php echo $sapxeptheohoadon ?>",
                            kieuin:"<?php echo $kieuin ?>",
                            loaibangke:"<?php echo $loaibangke ?>",
                            loaithue:"<?php echo $loaithue ?>",
                            chinhanh:"<?php echo $chinhanh ?>",
                            tenphieu:$("#TenPhieu_ThuChi").val(),
                            ngaylap:$("#NgayLap_InPhieuThuChi").val(),
                            ngayhoadon:$("#NgayHoaDon_InPhieu_ThuChi").val()
                        },
                    });
                },
                buttons: {
                    "OK": {
                        keys: ['Y'], action: function () {
                            if("<?php echo $intheochungtu ?>"=='3'){
                                window.open("tcpdf/baocao/inbangke_hanghoa_muavao_01.php?loaibangke=<?php echo $loaibangke ?>","bankemuavao","menubar=0,resizable=1");
                            }else{
								if("<?php echo $loaingoaite ?>"=="NT"){
									window.open("tcpdf/baocao/inbangke_hanghoa_muavao_nt.php?loaibangke=<?php echo $loaibangke ?>","bankemuavao","menubar=0,resizable=1");
								}else{
									window.open("tcpdf/baocao/inbangke_hanghoa_muavao.php?loaibangke=<?php echo $loaibangke ?>","bankemuavao","menubar=0,resizable=1");
								}
                            }
                        }
                    }
                }
            });
        });
        function callPrint(iframeId) {
            var PDF = document.getElementById(iframeId);
            PDF.focus();
            PDF.contentWindow.print();
        }

        function loadiFrame(src) {
            $("#iframeplaceholder").html("<iframe id='ifr_inphieuthuchi' name='ifr_inphieuthuchi' src='" + src + "' width='0px' height='0px' />");
        }
    });

</script>
<div id="dialog-insolieu_nhapkho" title="In số liệu">
    <p>
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
                                       value="BẢNG KÊ KHAI HÓA ĐƠN, CHỨNG TỪ HÀNG HÓA, DỊCH VỤ MUA VÀO"/>
                            </td>
                        </tr>
                        <tr>
                            <td>Ngày HĐ</td>
                            <td><input type="text" name="NgayHoaDon_InPhieu_ThuChi" style="width:100%"
                                       id="NgayHoaDon_InPhieu_ThuChi" value="<?php echo "Từ ngày ".date("d-m-Y",strtotime($tungay))." đến ngày ".date("d-m-Y",strtotime($denngay));; ?>"/></td>
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
    <div id="iframeplaceholder"></div>
    </p>
</div>