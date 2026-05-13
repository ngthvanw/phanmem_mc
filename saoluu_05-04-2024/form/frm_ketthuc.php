<?php require("../config.php"); ?>
<script>
$( function() {
function xoadialog(){
	reset_dialog(".dialog-message");
}
function thoat(){
    $('.dialog_main').load('modules/logout/logout.php');
	            $.confirm({
                title: 'Cập nhật thành công',
                type: 'green',
                autoClose: 'OK|1000',
                content: function(){
                    var self = this;
                    return $.ajax({
                        url:"modules/logout/logout.php",
                        dataType: 'json',
                        method: 'get'
                    });
                },
                buttons: {
                    "OK": {
                        keys: ['Y'], action: function () {
                          
                        }
                    }
                }
            });
}
$( "#dialog-message" ).dialog({
  modal: true,
  buttons: {
    "Đồng ý":thoat,
    "Hủy bỏ": function() {
      $( this ).dialog( "close" );
	  xoadialog();
    }
  }
});
} );
</script>
</head>
<body>
 
<div id="dialog-message" title="Chú ý">
<table>
	<tr>
		<td><img src="images/canhbao.jpg" style="width:50px"/></td>
		<td><strong>&nbsp;&nbsp;Bạn muốn thoát khỏi phần mềm ?</strong></td>
	</tr>
</table>
</div>
