<style>
</style>
<script>
    $height = 600;
    $width = 860;
	$("#OpenDialog").val(2);
  $( function() {
	  $dir_module = "modules/httk/";
    $(document).keydown(function(event){
      $dialog = $(".dialog_main3").html();
      if (event.keyCode ==  Keys.F4 && $dialog=="") {
            $('.dialog_main3').load('form/frm_add_dm_httk.php?item=Add')
      }
      if (event.keyCode ==  Keys.F2 && $dialog=="") {
            $obj_rowData = getRowdata();
			$matk = $obj_rowData.matk;
			$STT = $obj_rowData.STT;
			if($obj_rowData!=false)
				$('.dialog_main3').load('form/frm_add_dm_httk.php?item=Edit&id='+$matk+'&stt='+$STT);
      }
	  if (event.keyCode == Keys.F6 && $dialog=="") {// 
            $obj_rowData = getRowdata();
			$matk = $obj_rowData.matk;
			
			$STT = $obj_rowData.STT;
			if($obj_rowData!=false)
				$('.dialog_main3').load('form/frm_add_dm_httk.php?item=Copy&id='+$matk+'&stt='+$STT);
			//alert(event.keyCode);
      }
	  	dialog_dangbat = $("#OpenDialog").val();
	   if (event.keyCode ==  Keys.ESCAPE && dialog_dangbat==2) {
            //xoadialog();
		}
}); // end phím tắt
    $.contextMenu( // menu right
    {
        selector: '.pq-grid-table',
        build: function($trigger, e)
        {
            return {
                callback: function(key, options)
                {
                    $obj_rowData = getRowdata();
					$matk = $obj_rowData.matk;
					$STT = $obj_rowData.STT;
					if(key=="Edit"){
						if($obj_rowData!=false)
							$('.dialog_main3').load('form/frm_add_dm_httk.php?item='+key+'&id='+$matk+'&stt='+$STT);
					}
					if(key=="Copy"){
						if($obj_rowData!=false)
							$('.dialog_main3').load('form/frm_add_dm_httk.php?item='+key+'&id='+$matk+'&stt='+$STT);
					}
					if(key=="Add"){
						if($obj_rowData!=false)
							$('.dialog_main3').load('form/frm_add_dm_httk.php?item='+key+'&id='+$matk);
					}
					if(key=="Del"){
						if($obj_rowData!=false){
							//$('.dialog_main3').load('form/frm_add_dm_httk.php?item='+key+'&id='+$matk+'&stt='+$STT);
							$tieude=encode64("Chú ý");
							$('.dialog_main_thongbao').load($dir_module+"warring.php?id="+$matk);  
							lammoiluoi();
						}
					}

                },
                items: items
            };
        }
    });
var m;
var items = {
    "Add":
    {
        name: "Thêm (N)",
        icon: "add"
    },
    "Edit":
    {
        name: "Sửa (E)",
        icon: "edit"
    },

    "Copy":
    {
        name: "Sao Chép (C)",
        icon: "copy"
    }
};// end right menu
	function xoadialog(){// đóng form 
		  reset_dialog(".dialog-manoidung");
          reset_dialog(".dialog_main2");
		  $("#OpenDialog").val(1);
	}
    $( "#dialog-manoidung" ).dialog({// Gọi dialog 
      resizable: false,
      height: $height,
      width:$width,
      modal: true,
      buttons: {
        "Đóng": function() {
          $( this ).dialog( "close" );
			xoadialog();
        }
      }
    });
    //define colModel
    var colM = [// Khai báo các colum
    { title: "Mã nội dung", width: 100, dataIndx: "mand",
        filter: { type: 'textbox', condition: 'begin', listeners: ['keyup'] }
    },
    { title: "Tên nội dung", minWidth: "220", dataIndx: "tennoidung",
	},
		{ title: "Loại TK", minWidth: 130, dataIndx: "loaitk"},
		{ title: "Nhóm TK", minWidth: 130, dataIndx: "nhomtk"},
		{ title: "Mã số TS trên bảng CĐKT", minWidth: "190", dataIndx: "mats"},
		{ title: "Mã số nguồn vốn trên Bảng CĐKT", minWidth: "210", dataIndx: "mangv"},
		{ title: "Chú thích", width: 100, dataIndx: "ghichu" }
	];
    //define dataModel
    var dataModel = {// load data table 
        location: "remote",
        sorting: "local",
        dataType: "JSON",
        method: "GET",
        //sortIndx: "matk",
        sortDir: "up",
        url: "modules/httk/list.php",//Lấy danh sách cần load lên
        getData: function (dataJSON) { // trả về là json
            return { data: dataJSON.data };
        }
    }
    var obj = { width: $width-20, height: $height-130, // set heigt weight gird
        dataModel: dataModel,
        colModel: colM,
       // pageModel: { type: 'local', rPP: 20 },// số dòng hiển thị khi phân trang
        editable: false, // sửa trực tiếp trên gird
        selectionModel: { type: 'cell' },
       // selectionModel: { type: 'cell' }, // chọn theo từng cell
        filterModel: { on: true, mode: "AND", header: true }, // lọc dữ liệu trên header
        //title: "Danh mục vật tư, hàng hóa...",// tiêu đề gird
        resizable: true,
        columnBorders: true,
        freezeCols: 2, // cột cố định không di chuyển khi sroll
             toolbar: { // tollbar để tạo các button
            items: [
                { type: 'button', icon: 'ui-icon-plus', label: 'Thêm mới (F4) &nbsp;', listeners: [// Tạo button Thêm
                        { "click": function (evt, ui) {
                            $('.dialog_main3').load('form/frm_add_dm_mand.php?item=Add')
                        }
                    }
                ]
                },
                { type: 'button', icon: 'ui-icon-pencil', label: 'Sửa (F2)&nbsp;', listeners: [// Tạo button sửa
                        { "click": function (evt, ui) {
                            $obj_rowData = getRowdata();
							$matk = $obj_rowData.matk;
							$STT = $obj_rowData.STT;
                            if($obj_rowData!=false){
                                $('.dialog_main3').load('form/frm_add_dm_mand.php?item=Edit&id='+$matk+'&stt='+$STT);
                            }
                        }
                    }
                ]
                },
				{ type: 'button', icon: 'ui-icon-pencil', label: 'Sao chép (F6)&nbsp;', listeners: [// Tạo button sao chép
                        { "click": function (evt, ui) {
                            $obj_rowData = getRowdata();
							$matk = $obj_rowData.matk;
							$STT = $obj_rowData.STT;
                            if($obj_rowData!=false){
                                $('.dialog_main3').load('form/frm_add_dm_mand.php?item=Copy&id='+$matk+'&stt='+$STT);
                            }
                        }
                    }
                ]
                }
            ]
        }
    };
    var $grid = $("#grid_filter").pqGrid(obj);
     function getRowdata() {   // Lấy dữ liệu theo dòng trên gird                 
            var arr = $("#grid_filter").pqGrid("selection", { type: 'cell', method: 'getSelection' });//Lấy giá trị đang chọn
            if (arr && arr.length > 0) {
                return arr[0].rowData;                                
            }
            else {
                	$tieude=("Chú_ý");
                    $info=("Bạn_cần_chọn_dữ_liệu_cần_xóa_.");
					$img = "canhbao.jpg";
                    $('.dialog_main_thongbao').load("form/thongbao.php?title="+$tieude+"&info="+$info+"&images="+$img);
                return false;
            }
        }


});      
</script>    
<div id="dialog-manoidung" title="Thông tin mã nội dung"><!-- dialog -->
  <div id="grid_filter" style="margin:5px auto;border: 0px !important;"></div>
</div>