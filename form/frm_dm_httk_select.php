<?php
    $IDstyle = $_GET['idstyle'];// lấy ID css để truyền mã vào lưới mã công trình
?>
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
    input.pq-ac-editor
    {
        padding:2px;z-index:4;position:relative;
    }
    .pq-row-edit{
        border:2px dashed red;
    }    

</style>
<script>
    $height = getHeight()-50;
    $width = getWidth()-150;
    $(function() {
        $dir_module_httk_select = "modules/httk/";//--------------------------------------------Thay đổi khi copy
        function xoadialog_httk_select() { // ----------------------đóng form 
            reset_dialog(".dialog-httk_select");
            reset_dialog(".dialog_main_httk");
        }
		//reset_dialog(".dialog-httk_select");
        //if(typeof $(".dialog-httk_select").html()=="undefined"){// Chỉ gọi dialo khi chưa hiện
            $("#dialog-httk_select").dialog({ // ------------------Gọi dialog 
                resizable: false,
                height: $height,
                width: $width,
                modal: true
    
            });
        //}
     $("#dialog-httk_select").keydown(function(event) {//--------------Các phím tắt
        var $grid_pb = $("#grid_editing_httk_select").closest('.pq-grid');//---- Lưới----------------
         if (event.keyCode == Keys.F4 || event.keyCode == Keys.F7 || event.keyCode == Keys.F8 || event.keyCode == Keys.INSERT) {
                var rowSelect = getRowSelect();//------ Lấy đối tượng được chọn
                if(rowSelect==false){
                    alert_f("Chú Ý","fa fa-warning","red","Bạn cần chọn dữ liệu trước khi thực hiện !");
                }
            }
        var rowEditting = $( "#grid_editing_httk_select" ).pqGrid( "getRowsByClass", { cls : 'pq-row-edit' } );//---Lấy đối tượng đang sửa
          if ( $('div').hasClass('jconfirm')==false) {
				if (event.keyCode == Keys.F4) {
                  rowIndex = rowSelect[0].rowIndex;
                  addRow(rowIndx,'matk',$grid_pb);
              }
              if (event.keyCode == Keys.F7) { // copy
                  if (rowSelect != false){

                      var rowIndx = rowSelect[0].rowIndx;
                      var rowData = rowSelect[0].rowData;
                      //---------------Khai báo các cell khi dùng lệnh copy-----------------------------------------
                      //--------------------------------------------Thay đổi khi copy---------------------------------
                      var _dataRow = {matk :rowData.matk,tentk :rowData.tentk,matkcha :rowData.matkcha,loaitk :rowData.loaitk,nhomtk :rowData.nhomtk,mats :rowData.mats,mangv :rowData.mangv,ghichu :rowData.ghichu,tenloaitk :rowData.tenloaitk};
                      addRow(rowIndx,'matk',$grid_pb,_dataRow);
                  }
              }
             if (event.keyCode == Keys.F8) { // Xóa
                 if (rowSelect != false){
                    if (isEditing($grid_pb)) {
                        return false;
                    }
                    var rowData = rowSelect[0].rowData;
                    deleteRow(rowData, $grid_pb);
                }
             }

             if (event.keyCode == Keys.INSERT) {
                $ma = rowSelect[0].rowData.matk;
                $("#<?php echo $IDstyle; ?> .pq-editor-focus").val($ma);
                $("#<?php echo $IDstyle; ?> .pq-editor-focus").focus();
                $.ajax({
                    url: $dir_module_httk_select+"updaterank.php",
                    data: { 'id': $ma},
                    async: false,
                    success: function (response) {
                    }
                });
                xoadialog_httk_select();
             }
             if (event.keyCode == Keys.ESCAPE && $('div').hasClass('jconfirm')==false&&rowEditting.length<1) {
                 change_data_quit_httk_select();
             }
        }else{
            return false;
         } 
     }); // end phím tắt  
     function change_data_quit_httk_select() { // Cảnh báo thoát khi thay đổi dữ liệu////////////////////////////////////////////////////
        var $grid_pb = $("#grid_editing_httk_select").closest('.pq-grid');//---- Lưới----------------
        var isEditing = rows = $grid_pb.pqGrid("getRowsByClass", { cls: 'pq-row-edit' });
        $isEdit = false;
        if (isEditing.length > 0) {
                $isEdit = true;
        }
        if ($isEdit) {
         if ($('div').hasClass('jconfirm')==false) {
            $.confirm({
                title: 'Thông báo',
                content: ' Dữ liệu đã được thay đổi bạn có muốn lưu không.<br/>Nhấn phím <strong style="color:blue;">[Y]</strong> để đồng ý phím <strong style="color:red;">[N]</strong> để hủy bỏ ',
                icon: 'fa fa-warning',
                type: 'red',
                buttons: {
                    "Đồng ý": { keys: ['Y'],action: function () {
                        $grid_pb.find(".pq-editor-focus").focus();
                    }},
                    "Hủy bỏ":{ keys: ['N'],action: function () {
                                    xoadialog_httk_select();
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
                    "Đồng ý": { keys: ['Y'],action: function () {
                        xoadialog_httk_select();
                    }},
                    "Hủy bỏ":{ keys: ['N'],action: function () {
                                    
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
        function isEditing($grid) {
            var rows = $grid.pqGrid("getRowsByClass", { cls: 'pq-row-edit' });
            if (rows.length > 0) {
                //focus on editor if any 
                $grid.find(".pq-editor-focus").focus();
                return true;
            }
            return false;
        }
        //-------------------------Thêm mới dữ liệu-------------------------------------------------------
 function addRow(rowIndx,$name='mavt',$grid,$obj_addrow="") {
            //append empty row in the first row.
            if($obj_addrow!=""){
                var rowData =$obj_addrow;
            }else{
                var rowData = {matk : "",tentk :"",matkcha :"",loaitk :"",nhomtk :"",mats :"",mangv :"",ghichu :"",tenloaitk :""};
            }
            $grid.pqGrid("addRow", { rowIndx: rowIndx, rowData: rowData });

            $grid.pqGrid("setSelection", { rowIndx: rowIndx, dataIndx: $name});
            $grid.pqGrid("editFirstCellInRow", { rowIndx: (rowIndx) });
        }
        //----------------------------Hàm xóa dữ kiệu------------------------------------------
		  function deleteRow(rowData, $grid) {
            var rowData = rowData;
            var ma = rowData.matk;
            var sott = rowData.sott;
            if($('div').hasClass('jconfirm')==false){
                $.confirm({
                    title: "Chú ý",icon: "fa fa-times-circle",type: "red",
                    content: "Bạn có muốn xóa hàng có mã "+ (ma)+"  không ?"+'<br/>Nhấn phím <strong style="color:blue;">[Y]</strong> để đồng ý phím <strong style="color:red;">[N]</strong> để hủy bỏ ',
                    buttons: {"Đồng ý": {keys: ['Y'],action: function () {


                        $.ajax($.extend({}, ajaxObj, {
                            context: $grid,
                            url: $dir_module_httk_select+"del.php",
                            data: { id: sott,ma:ma },
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
        //--------------------------------Khai báo lưới---------------------------------------.
		var obj = {
            hwrap: false,
            vwrap: false,
            //resizable: true,
            rowBorders: true,
			height:$height-59,
            width:$width-12,
            //virtualX: true,
            numberCell: { show: false },
			filterModel: { on: true, mode: "AND", header: true },
            trackModel: { on: true }, //to turn on the track changes.            
            scrollModel: {
                autoFit: false
            },
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
							if(rowData.makh==""){
								var timemili = Date.now();
								rowData.makh="0"+timemili;
								//rowData.makhcha="0";
							}
                            if (rowData[recIndx] == null) {
                                url = $dir_module_httk_select+"add.php";
                            }
                            else {
                                url = $dir_module_httk_select+"edit.php";
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
								rowData.sott = res.recId;
							}
							$grid.pqGrid("refreshRow", {rowIndx: rowIndx});
                            //$(".ui-state-highlight").focus();
                        },
                    });
               }
            },
            colModel: [//-------------------------------------------Khai báo các cột trong lưới-----------------------
                    { title: "SoTT", dataType: "string", dataIndx: "sott", editable: false, width: 0, hidden:true },
                    { title: "Mã TK", dataType: "string", dataIndx: "matk", minWidth: 80,sortable: true,
                        validations: [
                            { type: 'minLen', value: 3, msg: "Mã tài khoản phải có 3 đến 10 ký tự !" },
                            { type: 'maxLen', value: 10, msg: "Mã tài khoản phải có 3 đến 10 ký tự !" },
                            { type: function (ui) {
								isEdit = isEditCell();
								if(isEdit){
                                    var value = ui.value,
                                        _found = false,sott = ui.rowData.sott;
                                    //remote validation
                                    $.ajax({
                                        url: $dir_module_httk_select+"checkkey.php",
                                        data: { 'id': value,'sott':sott },
                                        async: false,
                                        success: function (response) {
                                            if (response == 1) {
                                                _found = true;
                                            }
                                        }
                                    });
                                    if (_found) {
                                        ui.msg = value + " đã tồn tại trong hệ thống";
                                        return false;
                                    }
							}
                                }
                            }
                        ],
                        filter: {
                             type: 'textbox',
                             condition: 'begin',
                             listeners: ['keyup']
                         },
						 editor:{type:"number"}
                     },
                    { title: "Tên TK", minWidth: 200, dataType: "string", dataIndx: "tentk",
                        validations: [
                            { type: 'minLen', value: 1, msg: "Tên tài khoản không được trống !" }
                        ]
                    },
                    { title: "Mã TK cha", minWidth: 60, dataType: "string", align: "left", dataIndx: "matkcha",                    
                            validations: [
                            { type: 'minLen', value: 1, msg: "Mã tài khoản cha không được trống !" },
                            { type: function (ui) {
								isEdit = isEditCell();
								if(isEdit){
                                    var value = ui.value,
                                        _found = false,sott = ui.rowData.sott;
                                    //remote validation
                                    $.ajax({
                                        url: $dir_module_httk_select+"checkkeycha.php",
                                        data: { 'id': value,'sott':sott },
                                        async: false,
                                        success: function (response) {
                                            if (response == 1) {
                                                _found = true;
                                            }
                                        }
                                    });
                                    if (_found) {
                                        ui.msg = value + " không tồn tại trong hệ thống";
                                        return false;
                                    }
							}
                                }
                            }
                        ],
						 editor:{type:"number"}
                    },
                    { title: "Loại TK", minWidth: 120, dataType: "string", align: "left", dataIndx: "loaitk",render:function( ui ){return ui.rowData.tenloaitk},
                          filter: { 
            				type: "select",
                	        condition: 'equal',
                	        prepend: { '': '--Tất cả--' },
                	        valueIndx: "loaitk",
                	        labelIndx: "tenloaitk",
                	        listeners: ['change']
                	    },
                        editor: { type: "select",options: function(ui){
                                    //remote validation
                                    var parsedJson="";
                                    $.ajax({
                                        url: $dir_module_httk_select+"cb_loaitk.php",
                                        data: { },
                                        async: false,
                                        success: function (response) {
                                            parsedJson = $.parseJSON(response);
                                           //console.log(response);
                                           //return parsedJson;
                                        }
                                    });
                                    return parsedJson;
                                }
                        },
                        validations: [
                            { type: 'minLen', value: 1, msg: "Loại tài khoản không được trống !" }
                        ]
                    },
                    {title: "Phân loại",dataIndx: "tenloaitk",hidden:true,minWidth: 0},
                    { title: "Nhóm TK", minWidth: 60, dataType: "string", align: "right", dataIndx: "nhomtk",
                        editor: { type: "select",options: function(ui){
                                    var parsedJson="";
                                    $.ajax({
                                        url: $dir_module_httk_select+"cb_nhomtk.php",
                                        data: { },
                                        async: false,
                                        success: function (response) {
                                            parsedJson = $.parseJSON(response);
                                        }
                                    });
                                    return parsedJson;
                                }
                        },
                        validations: [
                            { type: 'minLen', value: 1, msg: "Nhóm tài khoản không được trống !" }
                        ]
                    },
                    { title: "Mã TS trên bảng CĐKT", minWWidth: 80, dataType: "string", align: "right", dataIndx: "mats",
                        //validations: [
                            //{ type: 'minLen', value: 1, msg: "Loại tài khoản không được trống !" }
                        //]
                    },
                    { title: "Mã Ng.Vốn trên bảng CĐKT", minWidth: 80, dataType: "string", align: "right", dataIndx: "mangv",
                        //validations: [
                            //{ type: 'minLen', value: 1, msg: "Loại tài khoản không được trống !" }
                        //]
                    },
                    { title: "Chú thích", minWidth: 150, dataType: "string", align: "left", dataIndx: "ghichu",
                        editor: { type: "textarea", attr: "rows=3" }
                    }
            ],//-----------------------------------------Kết thúc các cột---------------------------------------
            dataModel: {
                dataType: "JSON",
                location: "remote",
                recIndx: "sott",
                url: $dir_module_httk_select+"list.php",//-- Load danh sách lên lưới
                getData: function (response) {
                    return { data: response.data};
                }
            },
            load: function (evt, ui) {
                var grid = $(this).pqGrid('getInstance').grid,
                    data = grid.option('dataModel').data;
                
                grid.isValid({ data: data, allowInvalid: true });
            }
        };
        var $grid = $("#grid_editing_httk_select").pqGrid(obj);
        $grid.one("pqgridload", function (evt, ui) {
				var column = $grid.pqGrid("getColumn", { dataIndx:"loaitk" });
				var filter = column.filter;
				filter.cache = null;               
				filter.options = $grid.pqGrid("getData", { dataIndx: ["tenloaitk","loaitk"] });// lấy 1 hoặc nhiều dataindex
				$grid.pqGrid("refreshHeader");
			});
        //use refresh & refreshRow events to display jQueryUI buttons and bind events.
        $grid.on('pqgridrefresh pqgridrefreshrow', function () {
            //debugger;
            var $grid = $(this);
            //delete button
            $grid.find("button.delete_btn").button({ icons: { primary: 'ui-icon-close'} })
            .unbind("click")
            .bind("click", function (evt) {
                if (isEditing($grid)) {
                    return false;
                }
                var $tr = $(this).closest("tr"),
                    rowIndx = $grid.pqGrid("getRowIndx", { $tr: $tr }).rowIndx;
                deleteRow(rowIndx, $grid);
            });
            //edit button
            $grid.find("button.edit_btn").button({ icons: { primary: 'ui-icon-pencil'} })
            .unbind("click")
            .bind("click", function (evt) {
                if (isEditing($grid)) {
                    return false;
                }
                var $tr = $(this).closest("tr"),
                    rowIndx = $grid.pqGrid("getRowIndx", { $tr: $tr }).rowIndx;

                editRow(rowIndx, $grid);
                return false;
            });

            //rows which were in edit mode before refresh, put them in edit mode again.
            var rows = $grid.pqGrid("getRowsByClass", { cls: 'pq-row-edit' });
            if (rows.length > 0) {
                var rowIndx = rows[0].rowIndx;
                editRow(rowIndx, $grid);
            }
        }); 
        function getRowSelect() { // --------------------Lấy dữ liệu theo dòng trên gird----------------------                 
             var arr = $("#grid_editing_httk_select").pqGrid("selection", {
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
			  isEdit = $("#grid_editing_httk_select").pqGrid("isDirty"); //Lấy giá trị đang chọn
             
             return isEdit;
         }
 //-----------------------------Hết lưới---------------------------------------------------------------------       
                  		setTimeout(function(){
		$("#grid_editing_httk_select .pq-search-hd-field").focus();
	},1000);
    });     
</script>
<div id="dialog-httk_select" title="Chọn mã tài khoản (Enter: Để chọn mã ,F4: Thêm , F2: Sửa , F7: Sao chép , F8: Xóa , F9: Lưu , END : Hủy dòng đang sửa)"><!-- dialog -->
  <div id="grid_editing_httk_select" style="margin:5px auto;border: 0px !important;"></div>
</div>