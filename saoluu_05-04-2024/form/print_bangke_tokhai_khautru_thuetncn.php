<?php
require("../config.php");
//debug($_SESSION["TOKHAITHUE"]);
$ThueGTGTPhaiNop = $_SESSION["TOKHAITHUE"]['VI3']['thue'];
$ThueGTGTChuaKT = $_SESSION["TOKHAITHUE"]['VI4']['thue'];
$query = $_SERVER['QUERY_STRING'];
$thang = $_GET['thangtinhthue'];
$namtinhthue = $_GET['namtinhthue'];
$loaitokhai = $_GET['loaitokhai'];
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

$ppkhautru = load_ppkhaithue($driver . "/datafile/" . $_SESSION['MST']);
$nhomnganh = substr($ppkhautru, 4, 1);
$tonghanghoadichvuchieuthue = $_SESSION["TOKHAITHUE"]['II2b']['gthh']+$_SESSION["TOKHAITHUE"]['II2c']['gthh'];
$doanhthunhom1 = 0;
$thuenhom1 = 0;

$doanhthunhom2 = 0;
$thuenhom2 = 0;

$doanhthunhom3 = 0;
$thuenhom3 = 0;

$doanhthunhom4 = 0;
$thuenhom4 = 0;

if($nhomnganh=="1"){
    $doanhthunhom1 = $tonghanghoadichvuchieuthue;
    $thuenhom1 = round($tonghanghoadichvuchieuthue*0.01);
}else if($nhomnganh=="2") {
    $doanhthunhom2 = $tonghanghoadichvuchieuthue;
    $thuenhom2 = round($tonghanghoadichvuchieuthue*0.05);
}else if($nhomnganh=="3") {
    $doanhthunhom3 = $tonghanghoadichvuchieuthue;
    $thuenhom3 = round($tonghanghoadichvuchieuthue*0.03);
}else if($nhomnganh=="4") {
    $doanhthunhom4 = $tonghanghoadichvuchieuthue;
    $thuenhom4 = round($tonghanghoadichvuchieuthue*0.02);
}

$tongdoanhthu = $_SESSION["TOKHAITHUE"]['II2']['gthh']+$_SESSION["TOKHAITHUE"]['II2b']['gthh']+$_SESSION["TOKHAITHUE"]['II2c']['gthh']+$_SESSION["TOKHAITHUE"]['II3']['gthh'];
$tongthue = $_SESSION["TOKHAITHUE"]['II2']['thue']+$_SESSION["TOKHAITHUE"]['II2b']['thue']+$_SESSION["TOKHAITHUE"]['II2c']['thue']+$_SESSION["TOKHAITHUE"]['II3']['thue'];

?>
<link rel="stylesheet" href="pdf_lib/libs/pure-min.css"/>
<link rel="stylesheet" href="pdf_lib/libs/grids-responsive-min.css"/>
<style>
    #Form-chinh label {
        margin-top: 7px;
        float: left;
        border: 0px solid red;
        width: 100px;
        display: block !important;
        font-weight: bold !important;
        font-size: 12px;
        font-family: Arial, Lucida Grande, Lucida Sans, sans-serif;
    }

    #Form-chinh input {
        float: left;
        display: block !important;
        font-weight: bold !important;
        font-size: 12px;
        font-family: Arial, Lucida Grande, Lucida Sans, sans-serif;
    }

    #Form-chinh input.text {
        float: left;
        margin-bottom: 4px !important;
        width: 100%;
        padding: .4em !important;
        font-size: 12px;
        font-family: Arial, Lucida Grande, Lucida Sans, sans-serif;
        font-weight: normal;
    }

    #Form-chinh fieldset {
        padding: 0;
        padding-top: 6px;
        border: 1px solid #7cc3f9;
        margin-top: 0px;
    }

    #Form-chinh .td-left input.text {
        float: left;
        margin-bottom: 4px !important;
        width: 60%;
        padding: .4em !important;
        font-size: 12px;
        font-family: Arial, Lucida Grande, Lucida Sans, sans-serif;
        font-weight: normal;
    }

    #Form-chinh select {
        font-size: 12px;
        font-weight: bold;
    }

    #Form-chinh h1 {
        font-size: 1.2em;
        margin: .6em 0;
    }

    div#users-contain {
        width: 350px;
        margin: 20px 0;
    }

    div#users-contain table {
        margin: 1em 0;
        border-collapse: collapse;
        width: 100%;
    }

    div#users-contain table td, div#users-contain table th {
        border: 1px solid #eee;
        padding: .6em 10px;
        text-align: left;
    }

    .ui-dialog .ui-state-error {
        padding: .3em;
    }

    .validateTips {
        border: 1px solid transparent;
        padding: 0.3em;
        margin-top: 0px !important;
        margin-bottom: 0px !important;
        color: red;
        font-weight: bold;
        text-align: center;
    }

    .ui-draggable, .ui-droppable {
        background-position: top;
    }

    .table-dialog {
        width: 98%;
    }

    .red {
        color: red;
    }

    .table-dialog .td-left {
        width: 50%;
        padding-right: 20px;
    }

    .table-dialog .td-right {
        width: 50%;
    }

    .table-dialog .td-right input {
        float: left;
        margin-bottom: 4px !important;
        width: 65% !important;
    }

    .table-dialog .td-left input {
        float: left;
        margin-bottom: 4px !important;
        width: 60% !important;
    }

    /* auto complex ma tk cha  */
    .custom-combobox {
        position: relative;
        display: inline-block;
    }

    .custom-combobox-toggle {
        position: absolute;
        top: 0;
        bottom: 0;
        margin-left: -1px;
        padding: 0;
    }

    .custom-combobox-input {
        margin: 0;
        padding: 5px 10px;
    }

    .ui-menu {
        z-index: 999999999 !important;
    }

    * {
        box-sizing: border-box;
    }

    html, body {
        height: 100%;
        overflow: hidden;
    }

    .navbar {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        background: #e74c3c;
        border-bottom: 5px solid #c0392b;
        height: 50px;
        white-space: nowrap;
        overflow-x: auto;
        overflow-y: hidden;
        padding: 0 10px;
    }

    .navbar h1 {
        font-size: 20px;
        color: #fff;
    }

    .menu {
        padding: 0;
        list-style: none;
    }

    .menu li {
        vertical-align: top;
        text-decoration: none;
        font-weight: bold;
        font-family: sans-serif;
        padding: 10px 0;
        line-height: 25px;
    }

    #panel {
        background: #141f2b;
        padding: 10px;
        height: 100%;
    }

    #panel .editor {
        background: #fff;
    }

    #wrapper {
        overflow: hidden;
        height: 100%;
        background: rgba(193, 193, 193, 1);
    }

    #output {
        width: 100%;
        height: 100%;
        background: rgba(193, 193, 193, 1);
    }
</style>
<div style="width: 500px;;" id="dialog_insolieu_nhapxuat" title="In số liệu ">
    <iframe id="fred" style="border:1px solid #666CCC" title="" src="modules/baocaothue/inphieu_tokhai_khautru_thuetncn.php?<?php echo $query; ?>&nhomnganh=<?php echo substr($ppkhautru, 4, 1) ?>"
            frameborder="1" scrolling="auto" height="100%" width="100%"></iframe>
</div>
<script>
    $(function () {
        $dir_module_baocaothue = "modules/baocaothue/";
        function xoadialog_print_insolieu_thuchi() { // đóng form
            reset_dialog(".dialog_insolieu_nhapxuat");
            reset_dialog(".dialog_main_print");
        }

        $("#dialog_insolieu_nhapxuat").keydown(function (event) {//--------------Các phím tắt
            if (event.keyCode == Keys.ESCAPE) {
                xoadialog_print_insolieu_thuchi();
            }
        });
        dialog = $("#dialog_insolieu_nhapxuat").dialog({
            autoOpen: false,
            height: getHeight(),
            width: getWidth(),
            modal: true,
            buttons: {
                "Xuất XML": function () {
                    if("<?php echo $loaitokhai ?>"==1){
                        $.ajax({// Lấy thông tin phiếu và lưu vào session
                            url: $dir_module_baocaothue + "xuatxml_tokhaithue.php",
                            data: {
                                thangtinhthue:"<?php echo $thang; ?>",
                                loaitokhai:"<?php echo $loaitokhai; ?>",
                                tenphieu:$("#TenPhieu_ThuChi").val(),
                                ngaylap:$("#NgayLap_InPhieuThuChi").val(),
                                ngayhoadon:$("#NgayHoaDon_InPhieu_ThuChi").val()
                            },
                            async: false,
                            success: function (response) {
                                window.open("<?php echo $_SESSION['URI']."/datafile/".$_SESSION['MST']."/".$_SESSION['NienDo'].""."/"; ?>"+"01_GTGT.xml","baocaotaichinh","menubar=0,resizable=1");
                            }
                        });
                    }else{
                        alert("Chưa hỗ trợ chức năng này.");
                    }
                },
                "Sổ nhật ký tờ khai": function () {
					if("<?php echo $loaitokhai ?>"==1){
						window.open('form/frm_phieukiemtra_nhatky_tokhai_thuegtgt_window.php?loaiphieu=17','kiemtraphieuthu17','height='+(getHeight()-80)+',width='+getWidth());
					}else{
						window.open('form/frm_phieukiemtra_nhatky_tokhai_thuegtgt_window.php?loaiphieu=19','kiemtraphieuthu19','height='+(getHeight()-80)+',width='+getWidth());
					}
                },
                "Phiếu kiểm tra": function () {
					if("<?php echo $loaitokhai ?>"==1){
						window.open('form/frm_phieukiemtra_tokhai_thuegtgt_window.php?loaiphieu=17&tuphieu=<?php echo $thang."-".$namtinhthue;; ?>&denphieu=<?php echo $DenPhieu; ?>&gt1=<?php echo $tongthue; ?>&gt2=<?php echo 0; ?>','kiemtraphieuthu17','height='+(getHeight()-80)+',width='+getWidth());
						
					}else{
						window.open('form/frm_phieukiemtra_tokhai_thuegtgt_window.php?loaiphieu=19&tuphieu=<?php echo $thang."-".$namtinhthue;; ?>&denphieu=<?php echo $DenPhieu; ?>&gt1=<?php echo $tongthue; ?>&gt2=<?php echo 0; ?>','kiemtraphieuthu19','height='+(getHeight()-80)+',width='+getWidth());
						
					}
                },
                "Kết thúc": function () {
                    xoadialog_print_insolieu_thuchi();
                }
            }
        });
        form = dialog.find("#Form-chinh").on("submit", function (event) {
            event.preventDefault();
        });
        dialog.dialog("open");
    });
</script>