<?php
$IDstyle = $_GET['idstyle'];// lấy ID css để truyền mã vào lưới mã công trình
$IDInput_str = $_GET['idinput'];
$IDInput_Arr = explode("***", $IDInput_str);
$IDfocus = $_GET['idfocus'];
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
    $height = getHeight();
    $width = getWidth()-500;
    $(function() {
        $dir_module_makho = "modules/makho/";//--------------------------------------------Thay đổi khi copy
        function xoadialog() { // ----------------------đóng form 
            reset_dialog(".dialog-khohang");
            reset_dialog(".dialog_main2");
        }
        $("#dialog-khohang").dialog({ // ------------------Gọi dialog 
            resizable: false,
            height: $height,
            width: $width,
            modal: true

        });
     $("#dialog-khohang").keydown(function(event) {//--------------Các phím tắt
        var $grid_pb = $("#grid_editing_makho_form_select").closest('.pq-grid');//---- Lưới----------------
         if (event.keyCode == Keys.F7 || event.keyCode == Keys.F8 || event.keyCode == Keys.INSERT) {
                var rowSelect = getRowSelect();//------ Lấy đối tượng được chọn
                if(rowSelect==false){
                    alert_f("Chú Ý","fa fa-warning","red","Bạn cần chọn dữ liệu trước khi thực hiện !");
                }
            }
        var rowEditting = $( "#grid_editing_makho_form_select" ).pqGrid( "getRowsByClass", { cls : 'pq-row-edit' } );//---Lấy đối tượng đang sửa
          if ( $('div').hasClass('jconfirm')==false) {
             if (event.keyCode == Keys.F4) {
                 rowIndex = 0;
                  addRow(rowIndx,'makho',$grid_pb);
             }

             if (event.keyCode == Keys.F7) { // copy
                if (rowSelect != false){
                       var _dataRow = {makho :rowData.makho,tenkho :rowData.tenkho,diachi :rowData.diachi,ghichu :rowData.ghichu};
                      addRow(rowIndx,'mand',$grid_pb,_dataRow);
                }
             }
             if (event.keyCode == Keys.F8) { // Xóa
                 if (rowSelect != false){
                     var rowData = rowSelect[0].rowData;
                    deleteRow(rowData, $grid_pb);
                }
             }

              if (event.keyCode == Keys.INSERT) {
                      $ma = rowSelect[0].rowData.makho;
                      $ten = rowSelect[0].rowData.tenkho;

                      $data = new Array($ma, $ten);


                      <?php
                      $i = 0;
                      foreach ($IDInput_Arr as $IDInput){
                      ?>
                      $("#<?php echo $IDstyle; ?> #<?php echo $IDInput; ?>").val($data[<?php echo $i; ?>]);
                      <?php
                      $i++;
                      }
                      ?>
                      $("#<?php echo $IDstyle; ?> #<?php echo $IDfocus; ?>").focus();
                      /* $.ajax({
                       url: $dir_module_makho + "updaterank.php",
                       data: {'id': $ma},
                       async: false,
                       success: function (response) {
                       }
                       });*/
                      xoadialog();

				
              }
             if (event.keyCode == Keys.ESCAPE && $('div').hasClass('jconfirm')==false&&rowEditting.length<1) {
                 change_data_quit();
             }
        }else{
            return false;
         } 
     }); // end phím tắt  
     function change_data_quit() { // Cảnh báo thoát khi thay đổi dữ liệu////////////////////////////////////////////////////
        var $grid_pb = $("#grid_editing_makho_form_select").closest('.pq-grid');//---- Lưới----------------
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
                                    xoadialog();
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
                        xoadialog();
                    }},
                    "Hủy bỏ":{ keys: ['N'],action: function () {
                                    
                                }
                        }
                }
            });
        }
    }
     
     
    //----------------------------------------------------Bắt đầu lưới-----------------------------------------

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
		function addRow(rowIndx,$name='makho',$grid,$obj_addrow="") {
            //append empty row in the first row.
            if($obj_addrow!=""){
                var rowData =$obj_addrow;
            }else{
               var rowData = { makho: "0", tenkho: "", diachi: "", ghichu: "" }; //empty row template
            }
			if(typeof rowIndx == 'undefined')
				rowIndx=0;
			$grid.pqGrid("setSelection", { rowIndx: rowIndx, dataIndx: $name});
            $grid.pqGrid("addRow", { rowIndx: rowIndx, rowData: rowData });

            $grid.pqGrid("editFirstCellInRow", { rowIndx: (rowIndx) });
        }
        //----------------------------Hàm xóa dữ kiệu------------------------------------------
		  function deleteRow(rowData,$grid) {
            var rowData = rowData;
            var ma = rowData.makho;
            var sott = rowData.sott;
            if($('div').hasClass('jconfirm')==false){
                $.confirm({
                    title: "Chú ý",icon: "fa fa-times-circle",type: "red",
                    content: "Bạn có muốn xóa hàng có mã "+ (ma)+"  không ?"+'<br/>Nhấn phím <strong style="color:blue;">[Y]</strong> để đồng ý phím <strong style="color:red;">[N]</strong> để hủy bỏ ',
                    buttons: {"Đồng ý": {keys: ['Y'],action: function () {


                        $.ajax($.extend({}, ajaxObj, {
                            context: $grid,
                            url: $dir_module_makho+"del.php",
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
                           // $grid.pqGrid("removeClass", { rowIndx: rowIndx, cls: 'pq-row-delete' });
                        }}
                    }
                });
            }
        }
        //------------------------------Thây đổi row khi nhấp edit-----------------------------------
        //--------------------------------Khai báo lưới---------------------------------------.
 		var obj = {
            hwrap: false,
            vwrap: false,
            //resizable: true,
            rowBorders: true,
			height:$height-58,
            width:$width-20,
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
                            if (rowData[recIndx] == null) {
                                url = $dir_module_makho+"add.php";
                            }
                            else {
                                url = $dir_module_makho+"edit.php";
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
								rowData[recIndx] = res.recId;
							}       
							$grid.pqGrid("refreshRow", {rowIndx: rowIndx});
                            //$(".ui-state-highlight").html();
                        },
                    });
               }
            },
            colModel: [//-------------------------------------------Khai báo các cột trong lưới-----------------------
                {title: "SoTT", dataType: "integer", dataIndx: "sott", editable: false, width: 80, hidden: true},
				{ title: "STT", dataType: "string", dataIndx: "STT", editable: false, width:10, hidden:false,align: "center" },
				{ title: "Mã kho", dataType: "string", dataIndx: "makho", width: 80,sortable: true,
                        validations: [
                            { type: 'minLen', value: 4, msg: "Mã kho phải có 4 ký tự !" },
                            { type: 'maxLen', value: 4, msg: "Mã kho phải có 4 ký tự !" },
                            { type: function (ui) {
								isEdit = isEditCell();
								if(isEdit){
                                    var value = ui.value,
                                        _found = false,sott = ui.rowData.sott;
                                    //remote validation
                                    $.ajax({
                                        url: $dir_module_makho+"checkkey.php",
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
						editor: { type: "number" },
                        filter: {
                             type: 'textbox',
                             condition: 'begin',
                             listeners: ['keyup']
                         }
                     },
                    { title: "Tên kho", width: 165, dataType: "string", dataIndx: "tenkho",
                        validations: [
                            { type: 'minLen', value: 1, msg: "Tên kho không được trống !" }
                        ],
                        filter: {
                             type: 'textbox',
                             condition: 'begin',
                             listeners: ['keyup']
                         }
                    },
                    { title: "Địa chỉ", width: 140, dataType: "string", align: "left", dataIndx: "diachi"},
                    { title: "Chú thích", width: 150, dataType: "string", align: "left", dataIndx: "ghichu",
                        editor: { type: "textarea", attr: "rows=3" }
                    }
            ],//-----------------------------------------Kết thúc các cột---------------------------------------
            dataModel: {
                dataType: "JSON",
                location: "remote",
                recIndx: "sott",
                url: $dir_module_makho + "list.php",//-- Load danh sách lên lưới
                postData: {plnoidung:"<?php echo $PLNoiDung; ?>"},
                getData: function (response) {
                    return {data: response.data};
                }
            },

            load: function (evt, ui) {
                var grid = $(this).pqGrid('getInstance').grid,
                    data = grid.option('dataModel').data;
                
                grid.isValid({ data: data, allowInvalid: true });
				$(".pq-grid-table tr:eq(1)").find('td:eq(0)').focus();
            },
            refresh: function () {// khi làm mới lưới
                $("#grid_editing").find("button.delete_btn").button({ icons: { primary: 'ui-icon-scissors'} })
                .unbind("click")
                .bind("click", function (evt) {
                    var $tr = $(this).closest("tr");                    
                    var rowIndx = $grid.pqGrid("getRowIndx", { $tr: $tr }).rowIndx;
                    $grid.pqGrid("deleteRow", { rowIndx: rowIndx });
                });
            }
        };
        var $grid = $("#grid_editing_makho_form_select").pqGrid(obj);
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
             var arr = $("#grid_editing_makho_form_select").pqGrid("selection", {
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
			  isEdit = $("#grid_editing_makho_form_select").pqGrid("isDirty"); //Lấy giá trị đang chọn
             
             return isEdit;
         }
		             setTimeout(function(){
		$("#grid_editing_makho_form_select .pq-search-hd-field").focus();
	},1000);
		
 //-----------------------------Hết lưới---------------------------------------------------------------------
            
    });     
</script>    
<div id="dialog-khohang" title="Thông tin kho hàng (Enter: Để chọn mã ,F4: Thêm , F2: Sửa , F7: Sao chép , F8: Xóa , F9: Lưu , END : Hủy dòng đang sửa)"><!-- dialog -->
  <div id="grid_editing_makho_form_select" style="margin:5px auto;border: 0px !important;"></div>
</div>