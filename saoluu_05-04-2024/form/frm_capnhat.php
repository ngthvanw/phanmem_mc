<?php require("../config.php"); ?>
<script>
$( function() {
function xoadialog_capnhat(){
    reset_dialog(".dialog_main_capnhat");
	reset_dialog(".dialog-capnhat");
}
function capnhat(){
    $('.dialog_main').load('modules/logout/logout.php');
}
$( "#dialog-capnhat" ).dialog({
  modal: true,
  buttons: {
    "Đồng ý":capnhat,
    "Hủy bỏ": function() {
      $( this ).dialog( "close" );
	  xoadialog_capnhat();
    }
  }
});
} );
</script>
</head>
<body>
 
<div id="dialog-capnhat" title="Thông báo">
<table>
	<tr>
		<td><img src="images/hoi.jpg" style="width:50px"/></td>
		<td><strong>&nbsp;&nbsp;Đã có bản cập nhật mới. Bạn có muốn cập nhật không ?</strong></td>
	</tr>
</table>
</div>
