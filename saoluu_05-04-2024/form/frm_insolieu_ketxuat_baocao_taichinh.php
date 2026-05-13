<?php
session_start();
$tungay = $_GET['tungay'];
$denngay = $_GET['denngay'];
$timetungay = strtotime($tungay);
$timedenngay = strtotime($denngay);
$tungay_fm = date("d/m/Y", $timetungay);
$denngay_fm = date("d/m/Y", $timedenngay);

$_SESSION['TuNgay'] = $tungay;
$_SESSION['DenNgay'] = $denngay;

$bangchiphitc = $_GET['bangchiphitc'];

$ngayhoadon = "(bắt đầu từ ngày ".$tungay_fm." kết thúc đến ".$denngay_fm.")";

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

        $("#XuatExcel").change(function () {
            $("#XuatXML").prop("checked",false);
        });

        $("#XuatXML").change(function () {
            $("#XuatExcel").prop("checked",false);
        });

        $("#batđauin_insolieu_thuchi").click(function () {
            var parsedJson = "";
            $TenPhieu_ThuChi = $("#TenPhieu_ThuChi").val();
            $NgayLap_InPhieuThuChi = $("#NgayLap_InPhieuThuChi").val();
            $version = $("#version").val();
            $Xuat = $("#XuatXML").prop("checked");
            if($Xuat==true){// Xuất XML
                $.confirm({
                    title: 'Cập nhật thành công',
                    type: 'green',
                    autoClose: 'OK|1000',
                    content: function(){
                        var self = this;
                        return $.ajax({
                            url: $dir_module_ketoantonghop + "xuatxmlbaocao_taitinh.php",
                            dataType: 'json',
                            method: 'get',
                            data: {
                                tungay:"<?php echo $tungay; ?>",
                                denngay:"<?php echo $denngay ?>",
                                quy:"<?php echo $quy ?>",
                                tenphieu:$("#TenPhieu_ThuChi").val(),
                                ngaylap:$("#NgayLap_InPhieuThuChi").val(),
                                ngayhoadon:$("#NgayHoaDon_InPhieu_ThuChi").val(),
                                version:$version
                            },
                        });
                    },
                    buttons: {
                        "OK": {
                            keys: ['Y'], action: function () {
                                if($("#XuatXML").prop("checked") == true){
                                    window.open("<?php echo $_SESSION['URI']."/datafile/".$_SESSION['MST']."/".$_SESSION['NienDo'].""."/"; ?>"+"133_B01A_BCTC_"+$version+".xml");
                                }else{
                                    loadiFrame('tcpdf/baocao/inbang_xacdinh_kqkd.php');
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
            }else{// Xuất EXCEL
                $.confirm({
                    title: 'Cập nhật thành công',
                    type: 'green',
                    autoClose: 'OK|1000',
                    content: function(){
                        var self = this;
                        return $.ajax({
                            url: $dir_module_ketoantonghop + "xuatexcelbaocao_taitinh.php",
                            dataType: 'json',
                            method: 'get',
                            data: {
                                tungay:"<?php echo $tungay; ?>",
                                denngay:"<?php echo $denngay ?>",
                                quy:"<?php echo $quy ?>",
                                tenphieu:$("#TenPhieu_ThuChi").val(),
                                ngaylap:$("#NgayLap_InPhieuThuChi").val(),
                                ngayhoadon:$("#NgayHoaDon_InPhieu_ThuChi").val(),
                                version:$version
                            },
                        });
                    },
                    buttons: {
                        "OK": {
                            keys: ['Y'], action: function () {
                                if($("#XuatExcel").prop("checked") == true){
                                    window.open("<?php echo $_SESSION['URI']."/datafile/".$_SESSION['MST']."/".$_SESSION['NienDo'].""."/baocaotaichinh.xls"; ?>");
                                }else{
                                    loadiFrame('tcpdf/baocao/inbang_xacdinh_kqkd.php');
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
            }

        });
        $("#xemtruockhiin_insolieu_thuchi").click(function () {
            var parsedJson = "";
            $TenPhieu_ThuChi = $("#TenPhieu_ThuChi").val();
            $NgayLap_InPhieuThuChi = $("#NgayLap_InPhieuThuChi").val();;
            $version = $("#version").val();
            $Xuat = $("#XuatXML").prop("checked");
            if($Xuat==true) {// Xuất XML
                $.confirm({
                    title: 'Cập nhật thành công',
                    type: 'green',
                    autoClose: 'OK|1000',
                    content: function(){
                        var self = this;
                        return $.ajax({
                            url: $dir_module_ketoantonghop + "xuatxmlbaocao_taitinh.php",
                            dataType: 'json',
                            method: 'get',
                            data: {
                                tungay:"<?php echo $tungay; ?>",
                                denngay:"<?php echo $denngay ?>",
                                quy:"<?php echo $quy ?>",
                                tenphieu:$("#TenPhieu_ThuChi").val(),
                                ngaylap:$("#NgayLap_InPhieuThuChi").val(),
                                ngayhoadon:$("#NgayHoaDon_InPhieu_ThuChi").val(),
                                version:$version
                            },
                        });
                    },
                    buttons: {
                        "OK": {
                            keys: ['Y'], action: function () {
                                window.open("<?php echo $_SESSION['URI']."/datafile/".$_SESSION['MST']."/".$_SESSION['NienDo'].""."/"; ?>"+"133_B01A_BCTC_"+$version+".xml","baocaotaichinh","menubar=0,resizable=1");
                            }
                        }
                    }
                });
            }else{
                $.confirm({
                    title: 'Cập nhật thành công',
                    type: 'green',
                    autoClose: 'OK|1000',
                    content: function(){
                        var self = this;
                        return $.ajax({
                            url: $dir_module_ketoantonghop + "xuatexcelbaocao_taitinh.php",
                            dataType: 'json',
                            method: 'get',
                            data: {
                                tungay:"<?php echo $tungay; ?>",
                                denngay:"<?php echo $denngay ?>",
                                quy:"<?php echo $quy ?>",
                                tenphieu:$("#TenPhieu_ThuChi").val(),
                                ngaylap:$("#NgayLap_InPhieuThuChi").val(),
                                ngayhoadon:$("#NgayHoaDon_InPhieu_ThuChi").val(),
                                version:$version
                            },
                        });
                    },
                    buttons: {
                        "OK": {
                            keys: ['Y'], action: function () {
                                window.open("https://sheet.zoho.com/sheet/view.do?url=<?php echo $_SESSION['URI']."/datafile/".$_SESSION['MST']."/".$_SESSION['NienDo']."/baocaotaichinh.xls" ?>","baocaotaichinh","menubar=0,resizable=1");
                            }
                        }
                    }
                });
            }

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
                                       value="KẾT XUẤT BÁO CÁO TÀI CHÍNH"/>
                            </td>
                        </tr>
                        <tr>
                            <td>Ngày HĐ</td>
                            <td><input type="text" name="NgayHoaDon_InPhieu_ThuChi" style="width:100%"
                                       id="NgayHoaDon_InPhieu_ThuChi" value="<?php echo $ngayhoadon;  ?>"/></td>
                        </tr>
                        <tr>
                            <td>Ngày Lập</td>
                            <td><input type="date" name="NgayLap_InPhieuThuChi" style="width:100%"
                                       value="<?php echo date("Y-m-d"); ?>" id="NgayLap_InPhieuThuChi"/></td>
                        </tr>
                        <tr>
                          <td style="text-align:right"><br/>
                            &nbsp;&nbsp;<input type="checkbox" name="XuatExcel" id="XuatExcel" /> Xuất excel
                            </td>
                          <td><br/>&nbsp;&nbsp;<input type="checkbox" checked name="XuatXML" id="XuatXML" /> Xuất XML <select id="version">
                                  <option value="3.0.x">HTKK 3.x</option>
                                  <option selected value="4.0.x">HTKK 4.x</option>
                              </select></td>
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