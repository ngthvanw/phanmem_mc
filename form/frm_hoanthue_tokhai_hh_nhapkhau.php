<style>
div.pq-grid *
    {
        font-size:12px;    
        font-family:Verdana;
        line-height:17px;
    }    
    img.ui-datepicker-trigger
    {
        margin-top:2px;
    }
    .ui-autocomplete {
        max-height: 200px;        
        overflow-y: auto;
        /* prevent horizontal scrollbar */
        overflow-x: hidden;
    }    
    /*div.pq-grid :focus{
        outline:none;        
    }*/
    .pq-grid .pq-editor-focus
    {
        outline:none;
        border:1px solid #bbb;    
        border-radius:6px;
        background-image: linear-gradient(#e6e6e6, #fefefe);

        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#e6e6e6', endColorstr='#fefefe'); 
        background: -webkit-gradient(linear, left top, left bottom, from(#e6e6e6), to(#fefefe)); 
        background: -moz-linear-gradient(top,  #e6e6e6,  #fefefe); /* for firefox 3.6+ */	        
    }
    input.pq-date-editor
    {
        padding:2px;vertical-align:bottom;width:78px;z-index:4;position:relative;
    }
    input.pg-cel-define{
         padding:2px;vertical-align:bottom;width:100%;z-index:4;position:relative;
    }
    input.pq-ac-editor
    {
        padding:2px;z-index:4;position:relative;
    }
    .pq-row-edit{
        border:2px dashed red;
    }
    #form-chinh:focus{
        border: 1px solid darkslategrey;
    }
	tr.rownotsave td
	{
		background:#FA5882;
		color:Green;    
	}
	tr td.rownotsave
	{
		background:#FA5882;
		color:yellow;
	}

</style>
<script>
    $height = getHeight();
    $width = getWidth();
    $(function() {
        var $dir_module_hoanthue="";
        $dir_module_hoanthue = "modules/hoanthuegtgt/";//--------------------------------------------Thay đổi khi copy
        $dir_module_httk = "modules/httk/";//--------------------------------------------Thay đổi khi copy
        $dir_module_manhomkh = "modules/manhomkh/";//--------------------------------------------Thay đổi khi copy
        function xoadialog_makh_select() { // ----------------------đóng form 
            reset_dialog(".dialog-makhachhang_Select");
            reset_dialog(".dialog_main_makh");
        }
        //if(typeof $(".dialog-makhachhang_Select").html()=="undefined"){
            $("#dialog-makhachhang_Select").dialog({ // ------------------Gọi dialog 
                resizable: false,
                height: $height,
                width: $width-20,
                modal: true
    
            });
       // }
     $("#dialog-makhachhang_Select").on('keydown',function(event) {//--------------Các phím tắt
              if (event.keyCode == Keys.F4) {
				  $(".themmoi").trigger("click");
              }
              if (event.keyCode == Keys.F7) { // copy
					$(".saochep").trigger("click");
              }
             if (event.keyCode == Keys.F8) { // Xóa
                 $(".xoadulieu").trigger("click");
             }
             if (event.keyCode == Keys.ESCAPE ) {
				 $(".thoatcuaso").trigger("click");
             }
     }); // end phím tắt
 
    function change_data_quit_makh_select() { // Cảnh báo thoát khi thay đổi dữ liệu////////////////////////////////////////////////////
            var $grid_pb = $("#grid_editing_makh_select").closest('.pq-grid');//---- Lưới----------------
            var isEditing = rows = $grid_pb.pqGrid("getRowsByClass", {cls: 'pq-row-edit'});
            $isEdit = false;
            if (isEditing.length > 0) {
                $isEdit = true;
            }
            if ($isEdit) {
                if ($('div').hasClass('jconfirm') == false) {
                    $.confirm({
                        title: 'Thông báo',
                        content: ' Dữ liệu đã được thay đổi bạn có muốn lưu không.<br/>Nhấn phím <strong style="color:blue;">[Y]</strong> để đồng ý phím <strong style="color:red;">[N]</strong> để hủy bỏ ',
                        icon: 'fa fa-warning',
                        type: 'red',
                        buttons: {
                            "Đồng ý": {
                                keys: ['Y'], action: function () {
                                    $grid_pb.find(".pq-editor-focus").focus();
                                }
                            },
                            "Hủy bỏ": {
                                keys: ['N'], action: function () {
                                    xoadialog_makh_select();
                                }
                            }
                        }
                    });
                }
            } else {
                $.confirm({
                    title: 'Thông báo',
                    content: 'Bạn đang chuẩn bị thoát cửa sổ này ? .<br/>Nhấn phím <strong style="color:blue;">[Y]</strong> để đồng ý phím <strong style="color:red;">[N]</strong> để hủy bỏ ',
                    icon: 'fa fa-warning',
                    type: 'red',
                    buttons: {
                        "Đồng ý": {
                            keys: ['Y'], action: function () {
                                xoadialog_makh_select();
                            }
                        },
                        "Hủy bỏ": {
                            keys: ['N'], action: function () {

                            }
                        }
                    }
                });
            }
        }
     
    //----------------------------------------------------Bắt đầu lưới-----------------------------------------
        var ajaxObj = {
            dataType: "JSON",
            beforeSend: function () {
                this.pqGrid("showLoading");
            },
            complete: function () {
                this.pqGrid("hideLoading");
            },
            error: function () {
                this.pqGrid("rollback");
            }
        };

        //--------------------------Kiểm tra xem lưới có đang sửa không ---------------------------------------
        //-------------------------Thêm mới dữ liệu-------------------------------------------------------
        function addRow(rowIndx,$name='',$grid,$obj_addrow="") {
            //append empty row in the first row.{
            if($obj_addrow!=""){
                var rowData =$obj_addrow;
            }else{
                var rowData = {
                            maloaihinh: "",
                            tokhaiso: "",
                            ngaydangky: "",
                            nuocnhapkhau: "",
                            loaitien: "",
                            giatrivnd :"",
                            chungtuthanhtoan: "",
                            ghichu: "" 
                    }; //empty row template
           }
            
            if(typeof rowIndx == 'undefined')
                rowIndx=0;
            $grid.pqGrid("addRow", { rowIndx: rowIndx, rowData: rowData });
			$grid.pqGrid( "addClass", {rowIndx: rowIndx, cls: 'rownotsave'} );
            $grid.pqGrid("setSelection", { rowIndx: rowIndx, dataIndx: $name});
            $grid.pqGrid("editFirstCellInRow", { rowIndx: (rowIndx) });
        }
        //----------------------------Hàm xóa dữ kiệu------------------------------------------
		  function deleteRow(rowData, $grid) {
            var rowData = rowData;
            var sophieu = rowData.sophieu;
            if($('div').hasClass('jconfirm')==false){
                $.confirm({
                    title: "Chú ý",icon: "fa fa-times-circle",type: "red",
                    content: "Bạn có muốn xóa hàng có mã "+ (sophieu)+"  không ?"+'<br/>Nhấn phím <strong style="color:blue;">[Y]</strong> để đồng ý phím <strong style="color:red;">[N]</strong> để hủy bỏ ',
                    buttons: {"Đồng ý": {keys: ['Y'],action: function () {


                        $.ajax($.extend({}, ajaxObj, {
                            context: $grid,
                            url: $dir_module_hoanthue+"del.php",
                            data: { id: sophieu},
                            success: function (result) {
                                this.pqGrid("commit");
                                this.pqGrid("refreshDataAndView");
                            },
                            error: function () {
                                this.pqGrid("removeClass", { rowData: rowData, cls: 'pq-row-delete' });
                                this.pqGrid("rollback");
                            }
                        }));
                    }},
                        "Hủy bỏ": {keys: ['N'],action: function () {
                           
                        }}
                    }
                });
            }
        }
		//-- Xây dựng chức năng
		function themmoi() {
			var $grid_pb = $("#grid_editing_makh_select").closest('.pq-grid');//---- Lưới----------------
			  var rowSelect = getRowSelect();//------ Lấy đối tượng được chọn
			  if(rowSelect==false){
				  var colM = $("#grid_editing_makh_select").pqGrid("option", "colModel");
				  colM[1].editable = true;
				  $("#grid_editing_makh_select").pqGrid("option", "colModel", colM);
				  addRow(rowIndx,'',$grid_pb);
			  }else {
				  var rowIndx = rowSelect[0].rowIndx;
				  var rowData = rowSelect[0].rowData;
				  var _dataRow = {
					  maloaihinh: "",
					  tokhaiso: "",
					  ngaydangky: "",
					  nuocnhapkhau: "",
					  loaitien: "",
					  giatrivnd :"",
					  chungtuthanhtoan: "",
					  ghichu: ""
				  };
				  var colM = $("#grid_editing_makh_select").pqGrid("option", "colModel");
				  $("#grid_editing_makh_select").pqGrid("option", "colModel", colM);
				  addRow(rowIndx+1,'makh',$grid_pb,_dataRow);
			  }
		}
		function saochep() {
			var $grid_pb = $("#grid_editing_makh_select").closest('.pq-grid');//---- Lưới----------------
			var rowSelect = getRowSelect();//------ Lấy đối tượng được chọn
			if(rowSelect==false){
				alert("Bạn cần chọn dữ liệu trước khi thực hiện !");
			}
 		  if (rowSelect != false){
			  var rowIndx = rowSelect[0].rowIndx;
			  var rowData = rowSelect[0].rowData;
			  //---------------Khai báo các cell khi dùng lệnh copy-----------------------------------------
			  //--------------------------------------------Thay đổi khi copy---------------------------------
			  var colM = $("#grid_editing_makh_select").pqGrid("option", "colModel");
			  colM[1].editable = true;
			  $("#grid_editing_makh_select").pqGrid("option", "colModel", colM);

			  var _dataRow = {maloaihinh : rowData.maloaihinh,tokhaiso :rowData.tokhaiso,ngaydangky :rowData.ngaydangky,nuocnhapkhau :rowData.nuocnhapkhau,giatringoaite :"",loaitien :rowData.loaitien,giatrivnd :"",chungtuthanhtoan :rowData.chungtuthanhtoan,ghichu :""};
			  addRow(rowIndx+1,'makh',$grid_pb,_dataRow);
		  }
		}

		function xoadulieu() {
			var $grid_pb = $("#grid_editing_makh_select").closest('.pq-grid');//---- Lưới----------------
			var rowSelect = getRowSelect();//------ Lấy đối tượng được chọn
			if(rowSelect==false){
				alert("Bạn cần chọn dữ liệu trước khi thực hiện !");
			}
			if (rowSelect != false){
					var rowData = rowSelect[0].rowData;
					deleteRow(rowData, $grid_pb);
				}
		}
		
		function thoatcuaso() {
			var $grid_pb = $("#grid_editing_makh_select").closest('.pq-grid');//---- Lưới----------------
			var rowSelect = getRowSelect();//------ Lấy đối tượng được chọn
			var rowEditting = $("#grid_editing_makh_select").pqGrid("getRowsByClass", {cls: 'pq-row-edit'});//---Lấy đối tượng đang sửa
			if ($('div').hasClass('jconfirm')==false && rowEditting.length<1) {
                 change_data_quit_makh_select();
             }
		}
		//-- Kết thúc xây dựng chức năng
        //------------------------------Thây đổi row khi nhấp edit-----------------------------------
        //--------------------------------Khai báo lưới---------------------------------------.
		var obj_makh = {
            hwrap: false,
            //resizable: true,
            rowBorders: true,
            virtualX: true, virtualY: true,
            height: $height - 58,
            width: $width - 40,
            //virtualX: true,
            numberCell: {show: true},
            filterModel: {on: true, mode: "AND", header: true},
            trackModel: {on: true}, //to turn on the track changes.
            scrollModel: {
                autoFit: false
            },
			toolbar: {
                items: [
				{
                        type: 'button',
                        label: "Thêm [F4]",
                        icon: 'ui-icon-plus',
						cls: 'themmoi',
                        listeners: [{
                            "click": function (evt) {
                                themmoi();
                            }
                        }]
                    },
					{
                        type: 'button',
                        label: "Sao chép [F7]",
                        icon: 'ui-icon-copy',
						cls: 'saochep',
                        listeners: [{
                            "click": function (evt) {
                                saochep();
                            }
                        }]
                    },
					{
                        type: 'button',
                        label: "Xoá [F8]",
                        icon: 'ui-icon-trash',
						cls: 'xoadulieu',
                        listeners: [{
                            "click": function (evt) {
                                xoadulieu();
                            }
                        }]
                    },
                    {
                        type: 'button',
                        label: "Xuất Excel",
                        icon: 'ui-icon-document',
                        listeners: [{
                            "click": function (evt) {
                                const url = $dir_module_hoanthue + "xuatexcel_tokhai_hh_nhapkhau.php";
                                window.open(url, '_blank');
                            }
                        }]
                    },
					{
                        type: 'button',
                        label: "Thoát [ESC]",
                        icon: 'ui-icon-closethick',
						cls: 'thoatcuaso',
                        listeners: [{
                            "click": function (evt) {
                                thoatcuaso();
                            }
                        }]
                    },					
			
                ]
            },
            freezeCols: 4,
            historyModel: {
                checkEditableAdd: true
            },
            editModel: {
                allowInvalid: false,
                saveKey: $.ui.keyCode.ENTER
            },
            editor: {
                select: true
            },
            title: "",
            change: function (evt, ui) {// Khi dữ liệu thay đổi              
                if (ui.source == 'commit' || ui.source == 'rollback') {
                    return;
                }
                var $grid = $(this),
                    grid = $grid.pqGrid('getInstance').grid;
                var rowList = ui.rowList,
                    recIndx = grid.option('dataModel').recIndx;
					//console.log(recIndx);

                var obj = rowList[0],
                    rowIndx = obj.rowIndx,
                    newRow = obj.newRow,
                    type = obj.type,
                    rowData = obj.rowData;

                var url="";
                if (type == 'update') {                        
                    var valid = grid.isValid({ rowData: rowData, allowInvalid: true }).valid;
                    if (valid) {
                        if (rowData[recIndx] == null) {
                            url = $dir_module_hoanthue+"add.php?loaitokhai=N";
                        }
                        else {
                            url = $dir_module_hoanthue+"edit.php";
                        }
                    }
                }
                if (valid) {
                    $.ajax({
                        url: url,
                        data: rowData,
                        dataType: "json",
                        type: "GET",
                        async: true,
                        success: function (res) {   
						if (rowData[recIndx] == null) {
								rowData.sophieu = res.recId;
							}
							$grid.pqGrid("refreshRow", {rowIndx: rowIndx});
                            $grid.pqGrid( "removeClass", {rowIndx: rowIndx, cls: 'rownotsave'} );
                            var colM = $("#grid_editing_makh_select").pqGrid("option", "colModel");
                            colM[1].editable = false;
                            $("#grid_editing_makh_select").pqGrid("option", "colModel", colM);
                        },
                    });
               }
            },
            colModel: [//-------------------------------------------Khai báo các cột trong lưới-----------------------
                { title: "Lưu", dataType: "string", dataIndx: "sophieu", editable: false, width: 0, hidden:false,align: "center",
                    render: function (ui) {
                        var $val  = ui.rowData.sophieu;
                        if($val==0 || $val=="" || typeof $val == 'undefined'){
                            return "<img src='icon/uncheck.png' width='20px'/>";
                        } else {
                            return "<img src='icon/check.png' width='20px' />";
                        }
                    },},

                { title: "Mã loại hình", dataType: "string", dataIndx: "maloaihinh", minWidth: 200,sortable: true,
                    editor: {type: "select", options: [{"": "-- CHỌN MÃ LOẠI HÌNH --"},{"A11": "A11 - Nhập kinh doanh tiêu dùng"}, {"A12": "A12 - Nhập kinh doanh sản xuất"}]},
                    validations: [
                        {type: 'minLen', value: 1, msg: "Mã loại hình không được trống !"},
                    ],
                    render: function (ui) {
                        var $value = ui.rowData.maloaihinh;
                        if ($value == "") {
                            return "-- CHỌN MÃ LOẠI HÌNH --";
                        }else if ($value == "A11") {
                            return "A11 - Nhập kinh doanh tiêu dùng";
                        } else if ($value == "A12") {
                            return "A12 - Nhập kinh doanh sản xuất";
                        }
                    },
                    filter: {
                        type: 'textbox',
                        condition: 'begin',
                        listeners: ['keyup']
                    }
                },
                { title: "Tờ khai số", minWidth: 150, dataType: "string", dataIndx: "tokhaiso",
                    validations: [
                        {type: 'minLen', value: 1, msg: "Số tờ khai không được trống !"},
                    ],
                    filter: {
                        type: 'textbox',
                        condition: 'begin',
                        listeners: ['keyup']
                    },
                    editor: {
                        type: "textbox",
                        cls: "tokhaiso"
                    }
                },
                { title: "Ngày đăng ký", minWidth: 120, dataType: "string", align: "left", dataIndx: "ngaydangky",
                    validations: [
                        {type: 'minLen', value: 1, msg: "Ngày đăng ký không được trống !"},
                    ],
                    render:function( ui ){
                        var $yyyy_mm_dd = ui.rowData.ngaydangky;
                        return Format_dd_mm_yyyy($yyyy_mm_dd);
                    },
                    editor: {
                        type: 'date'
                    },
                },
                { title: "Nước xuất khấu", minWidth: 150, dataType: "string", dataIndx: "nuocnhapkhau",hidden: false,
                    validations: [
                        {type: 'minLen', value: 1, msg: "Nước xuất khẩu không được trống !"},
                    ],
                },
                { title: "Giá trị ngoại tệ", minWidth: 120, dataType: "string", align: "right", dataIndx: "giatringoaite",
                    validations: [
                        {type: 'minLen', value: 1, msg: "Giá trị ngoại tệ không được trống !"},
                    ],
                    render: function (ui) {
                        var val = DinhDangSo(ui.rowData.giatringoaite);
                        return val;
                    },
                    filter: {
                        type: 'textbox',
                        condition: 'begin',
                        listeners: ['keyup']
                    }
                },
                {
                    title: "Loại Tiền tệ", minWidth: 80, dataType: "string", align: "center", dataIndx: "loaitien",
                    editor: {type: "select", options: [{"": "-- CHỌN LOẠI TIỀN TỆ--"},{"VND": "VIỆT NAM ĐỒNG"}, {"AUD": "ÚC -DOLLAR"}, {"CAD": "CANADA - DOLLAR"}, {"EUR": "EURO"}, {"GBP": "ANH - BẢNG"}, {"JPY": "NHẬT - YÊN"}, {"KRW": "HÀN QUỐC - WON	"}, {"SGD": "SINGAPORE - DOLLAR"}, {"USD": "MỸ - DOLLAR"}]},
                    validations: [
                        {type: 'minLen', value: 1, msg: "Loại tiền tệ không được trống !"},
                    ],
                    render: function (ui) {
                        var $value = ui.rowData.loaitien;
                        if ($value == "-- CHỌN LOẠI TIỀN TỆ--") {
                            return "VIỆT NAM ĐỒNG";
                        }else if ($value == "VND") {
                            return "VIỆT NAM ĐỒNG";
                        } else if ($value == "AUD") {
                            return "ÚC - DOLLAR";
                        }else if ($value == "CAD") {
                            return "CANADA - DOLLAR";
                        }else if ($value == "EUR") {
                            return "EURO";
                        }else if ($value == "GBP") {
                            return "ANH - BẢNG";
                        }else if ($value == "JPY") {
                            return "NHẬT - YÊN";
                        }else if ($value == "KRW") {
                            return "HÀN QUỐC - WON";
                        }else if ($value == "SGD") {
                            return "SINGAPORE DOLLAR";
                        }else if ($value == "USD") {
                            return "MỸ - DOLLAR";
                        }
                    }
                },
                { title: "Trị giá VNĐ", minWidth: 120, dataType: "string", align: "right", dataIndx: "giatrivnd",
                    validations: [
                        {type: 'minLen', value: 1, msg: "Giá trị VNĐ không được trống !"},
                    ],
                    render: function (ui) {
                        var val = ui.rowData.giatrivnd;
                        return $.number(val,0,".",",");
                    },
                    filter: {
                        type: 'textbox',
                        condition: 'begin',
                        listeners: ['keyup']
                    }
                },
                { title: "Chứng từ thanh toán", minWidth: 200, dataType: "string", align: "left", dataIndx: "chungtuthanhtoan",
                    validations: [
                        {type: 'minLen', value: 1, msg: "Chứng từ thanh toán không được trống !"},
                    ],
                    filter: {
                        type: 'textbox',
                        condition: 'begin',
                        listeners: ['keyup']
                    }
                },
                { title: "Chú thích", minWidth: 150, dataType: "string", align: "left", dataIndx: "ghichu",
                    editor: { type: "textarea", attr: "rows=3" }
                }
            ],//-----------------------------------------Kết thúc các cột---------------------------------------
            pageModel: { type: "local", rPP: 200, strRpp: "{0}", strDisplay: "{0} từ {1} của {2}" },
			dataModel: {
                dataType: "JSON",
                location: "remote",
                recIndx: "sophieu",
                url: $dir_module_hoanthue+"list.php?loaitokhai=N",//-- Load danh sách lên lưới
                getData: function (dataJSON) {
					var data = dataJSON.data;
					return {data: data };
				}
			},
            load: function (evt, ui) {
                var grid = $(this).pqGrid('getInstance').grid,
                    data = grid.option('dataModel').data;
                grid.isValid({ data: data, allowInvalid: true });
            },cellBeforeSave: function (evt, ui) {
                var $grid = $(this);
                var isValid = $grid.pqGrid("isValid", ui);
                if (!isValid.valid) {
                    return false;
                }
            },

        };
        var $grid = $("#grid_editing_makh_select").pqGrid(obj_makh);
        $grid.one("pqgridload", function (evt, ui) {// Lấy DS List box
            $("#grid_editing_makh_select .pq-search-txt[name='maloaihinh']").focus();
        });
        function getRowSelect() { // --------------------Lấy dữ liệu theo dòng trên gird----------------------                 
             var arr = $("#grid_editing_makh_select").pqGrid("selection", {
                 type: 'cell',
                 method: 'getSelection'
             }); //Lấy giá trị đang chọn
             if (arr && arr.length > 0) {
                 return arr;
             } else {
                 return false;
             }
         } 
		 function isEditCell(rowIndex,dataIndx) { // --------------------Lấy dữ liệu theo dòng trên gird----------------------                 
             var isEdit = false;
			  isEdit = $("#grid_editing_makh_select").pqGrid("isDirty"); //Lấy giá trị đang chọn
             
             return isEdit;
         }
	
 //-----------------------------Hết lưới--------------------------------------------------------------------- 
    }); 
</script>    
<div id="dialog-makhachhang_Select" title="TỜ KHAI HÀNG HOÁ NHẬP KHẨU (Enter: Để chọn mã KH ,F4: Thêm , F7: Sao chép , F8: Xóa )"><!-- dialog -->
  <div id="grid_editing_makh_select" style="margin:5px auto;border: 0px !important;"></div>
</div>