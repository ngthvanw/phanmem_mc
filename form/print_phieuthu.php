<?php 
    require("../config.php");
$TuPhieu = $_GET['tuphieu'];
$DenPhieu = $_GET['denphieu'];
?>
    <link rel="stylesheet" href="pdf_lib/libs/pure-min.css"/>
    <link rel="stylesheet" href="pdf_lib/libs/grids-responsive-min.css"/>
  <style>
    #Form-chinh label{margin-top:7px;float: left; border:0px solid red;width:100px;display:block !important; font-weight: bold !important;font-size: 12px;font-family: Arial,Lucida Grande, Lucida Sans, sans-serif;}
    #Form-chinh input {float: left; display:block !important; font-weight: bold !important;font-size: 12px;font-family: Arial,Lucida Grande, Lucida Sans, sans-serif;}
    #Form-chinh input.text {float: left; margin-bottom:4px !important; width:100%; padding: .4em !important;font-size: 12px;font-family: Arial,Lucida Grande, Lucida Sans, sans-serif;font-weight: normal; }
    #Form-chinh fieldset { padding:0;padding-top: 6px; border:1px solid #7cc3f9; margin-top:0px; }
    #Form-chinh .td-left input.text {float: left; margin-bottom:4px !important; width:60%; padding: .4em !important;font-size: 12px;font-family: Arial,Lucida Grande, Lucida Sans, sans-serif;font-weight: normal; }
    #Form-chinh select{font-size: 12px;font-weight: bold;}
    #Form-chinh h1 { font-size: 1.2em; margin: .6em 0; }
    div#users-contain { width: 350px; margin: 20px 0; }
    div#users-contain table { margin: 1em 0; border-collapse: collapse; width: 100%; }
    div#users-contain table td, div#users-contain table th { border: 1px solid #eee; padding: .6em 10px; text-align: left; }
    .ui-dialog .ui-state-error { padding: .3em; }
    .validateTips { border: 1px solid transparent; padding: 0.3em;margin-top: 0px !important;margin-bottom: 0px !important;color: red;font-weight: bold;text-align: center; }
    .ui-draggable, .ui-droppable {
	background-position: top;   
}
    .table-dialog{
        width: 98%;
    }
    .red{color:red;}
    .table-dialog .td-left{
        width: 50%;
        padding-right:20px;
    }
    .table-dialog .td-right{
        width: 50%;
    }
    .table-dialog .td-right input{
        float: left; margin-bottom:4px !important; width:65% !important;
        }
    .table-dialog .td-left input{
        float: left; margin-bottom:4px !important; width:60% !important;
        }/* auto complex ma tk cha  */
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
  .ui-menu{
	  z-index:999999999 !important;
  }
          * {box-sizing: border-box;}

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
    <div style="width: 500px;;" id="dialog-print_bangluong" title="In phiếu thu">
            <iframe id="fred" style="border:1px solid #666CCC" title="PDF in an i-Frame" src="modules/psktphieuthu/inphieuthu_chi.php" frameborder="1" scrolling="auto" height="600" width="100%" ></iframe>
</div>
  <script>
   $dir_module_manhom = "modules/manhom/";
   $dir_module_mact = "modules/macongtrinh/";
   $dir_module_manv_chamcong = "modules/manhanvien_chamcong/"; ////////////////Khai báo đường dẫn vào mudole-----------------------------
  $("#download-btn").click(function(){// button xem 
    var parsedJson="";
    var stringmact_nhom="";
      $.ajax({// lấy danh sách bảng chấm công
            url: $dir_module_manv_chamcong+"load_chamcong.php",
            data: {
                    mactcon:$("#HangMuc").val(),
                    tuan:$("#TuTuan").val(),
                    dentuan:$("#DenTuan").val(),
                    mabp:$("#Nhom").val(),
                  },
            async: false,
            success: function (response) {
                parsedJson =(response);
            }
        });
        $.ajax({// Lấy tên các ma ct và tên mã nhóm
            url: $dir_module_manv_chamcong+"load_nhom_ct.php",
            data: {
                    mactcon:$("#HangMuc").val(),
                    mact:$("#CongTrinh").val(),
                    mabp:$("#Nhom").val(),
                  },
            async: false,
            success: function (response) {
                stringmact_nhom = (response);
            }
        });
        //$tuan = $(".filterWeeks").val();
        //mabp=$(".filterMaBP").val(); 
        //mact=$(".filterMaCT").val();   
        //$('#fred').attr('href.php');  

       // window.open($dir_module_manv_chamcong+'exportexcel.php?json='+encode64(parsedJson)+"&mactnhom="+(stringmact_nhom)+"&tuan="+encode64($tuan));
       //$('.dialog_main_print').load("form/print_bangluong.php",{json:encode64(parsedJson),mactnhom:(stringmact_nhom),tuan:encode64($tuan),manhom:mabp});
  });
  $("#Nhom").change(function(){
   load_hangmuc_print_bangluong(this.value);
   load_mact_print_bangluong(this.value);
  })
    function Load_TuTuan($Tuan){
        $.ajax({
            url: $dir_module_manv_chamcong+"date_option.php",
            data: { 'tutuan': $Tuan },
            async: false,
            success: function (response) {
                $("#TuTuan").html(response);
            }
        });
    }
    $("#TuTuan").load($dir_module_manv_chamcong+"date_option.php?tuan=<?php echo $tuan ?>");
    $("#DenTuan").load($dir_module_manv_chamcong+"date_option.php?tuan=<?php echo $tuan ?>");
    $("#Nhom").load($dir_module_manhom+"load_mabp_option.php?manhom=<?php echo $manhom ?>");
    $("#CongTrinh").load($dir_module_mact+"load_mact_option.php?mabp=<?php echo $manhom ?>");
    $("#HangMuc").load($dir_module_mact+"load_mact_con_option.php?mabp=<?php echo $manhom ?>");
    function load_hangmuc_print_bangluong(mabp){
        $.ajax({
            url: $dir_module_mact+"load_mact_con_option.php",
            data: { 'mabp': mabp },
            async: false,
            success: function (response) {
                $("#HangMuc").html(response);
            }
        });
    }
    function load_mact_print_bangluong(mabp){
        $.ajax({
            url: $dir_module_mact+"load_mact_option.php",
            data: { 'mabp': mabp },
            async: false,
            success: function (response) {
                $("#CongTrinh").html(response);
            }
        });
    }
$(function() {
         function xoadialog_print_bangluong() { // đóng form 
                reset_dialog(".dialog-print_bangluong");
                reset_dialog(".dialog_main_print");
        }
        dialog = $("#dialog-print_bangluong").dialog({
                autoOpen: false,
                height: getHeight(),
                width: getWidth(),
                modal: true,
                buttons: {
                        "Kết thúc": function() {
                                xoadialog_print_bangluong();
                        }
                }
        });
        form = dialog.find("#Form-chinh").on("submit", function(event) {
                event.preventDefault();
        });
        dialog.dialog("open");

});
  </script>