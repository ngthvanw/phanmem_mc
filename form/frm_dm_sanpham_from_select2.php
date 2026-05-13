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

</style>
<script>
    $height = getHeight();
    $width = getWidth()-50;
    $(function() {
        var $dir_module_dmsanpham="";
         $dir_module_dmsanpham = "modules/dmsanpham/";//--------------------------------------------Thay đổi khi copy
        function xoadialog_mact() { // ----------------------đóng form 
            reset_dialog(".dialog-danhmuc_sanpham");
            reset_dialog(".dialog_main_danhmuc_sanpham");
        }
		 if (typeof $(".dialog-danhmuc_sanpham").html() == "undefined") {
			$("#dialog-danhmuc_sanpham").dialog({ // ------------------Gọi dialog
				resizable: false,
				height: $height,
				width: $width,
				modal: true

			});
		 }
     $("#dialog-danhmuc_sanpham").keydown(function(event) {//--------------Các phím tắt
        var $grid_pb = $("#grid_editing_danhmuc_sanpham").closest('.pq-grid');//---- Lưới----------------
         if (event.keyCode == Keys.F7 || event.keyCode == Keys.F8 || event.keyCode == Keys.INSERT) {
                var rowSelect = getRowSelect();//------ Lấy đối tượng được chọn
                if(rowSelect==false){
                    alert_f("Chú Ý","fa fa-warning","red","Bạn cần chọn dữ liệu trước khi thực hiện !");
                }
            }
        var rowEditting = $( "#grid_editing_danhmuc_sanpham" ).pqGrid( "getRowsByClass", { cls : 'pq-row-edit' } );//---Lấy đối tượng đang sửa
          if ( $('div').hasClass('jconfirm')==false) {
              if (event.keyCode == Keys.F4) {
                  var rowSelect = getRowSelect();//------ Lấy đối tượng được chọn
                  if(rowSelect==false){
                      var colM = $("#grid_editing_danhmuc_sanpham").pqGrid("option", "colModel");
                      colM[1].editable = true;
                      $("#grid_editing_danhmuc_sanpham").pqGrid("option", "colModel", colM);
                      addRow(rowIndx,'masp',$grid_pb);
                  }else {
                      var rowIndx = rowSelect[0].rowIndx;
                      var rowData = rowSelect[0].rowData;
                      var colM = $("#grid_editing_danhmuc_sanpham").pqGrid("option", "colModel");
                      colM[1].editable = true;
                      $("#grid_editing_danhmuc_sanpham").pqGrid("option", "colModel", colM);
                      var _dataRow = {masp : rowData.masp,tensp :rowData.tensp,maspcha :rowData.masp,dvt :rowData.dvt};
                      addRow(rowIndx+1,'masp',$grid_pb,_dataRow);
                  }
              }
              if (event.keyCode == Keys.F7) { // copy
                  if (rowSelect != false){

                      var rowIndx = rowSelect[0].rowIndx;
                      var rowData = rowSelect[0].rowData;
                      //---------------Khai báo các cell khi dùng lệnh copy-----------------------------------------
                      var colM = $("#grid_editing_danhmuc_sanpham").pqGrid("option", "colModel");
                      colM[1].editable = true;
                      $("#grid_editing_danhmuc_sanpham").pqGrid("option", "colModel", colM);
                      //--------------------------------------------Thay đổi khi copy---------------------------------
                      var _dataRow = {masp : rowData.masp,tensp :rowData.tensp,maspcha :rowData.maspcha,dvt :rowData.dvt};
                      addRow(rowIndx+1,'masp',$grid_pb,_dataRow);
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
              if (event.keyCode == Keys.INSERT) { // Xóa
                  var rowData = rowSelect[0].rowData;
                  $("#mataisan").val(rowData.masp);
                  $("#tentaisan").val(rowData.tensp);
                  $("#tentaisan").focus();

                  xoadialog_mact();
              }
             if (event.keyCode == Keys.ESCAPE && $('div').hasClass('jconfirm')==false&&rowEditting.length<1) {
                 change_data_quit_mact();
             }
        }else{
            return false;
         } 
     } );// end phím tắt

        function change_data_quit_mact() { // Cảnh báo thoát khi thay đổi dữ liệu////////////////////////////////////////////////////
            var $grid_pb = $("#grid_editing_danhmuc_sanpham").closest('.pq-grid');//---- Lưới----------------
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
                                xoadialog_mact();
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
                            xoadialog_mact();
                        }},
                        "Hủy bỏ":{ keys: ['N'],action: function () {

                        }
                        }
                    }
                });
            }
        }
     
     
    //----------------------------------------------------Bắt đầu lưới-----------------------------------------
    var makh_select = function (ui) {
            var $cell = ui.$cell,
                rowData = ui.rowData,
                dataIndx = ui.dataIndx,
                cls = ui.cls,width=ui.column.minWidth,
                dc = $.trim(rowData[dataIndx]);
            $cell.css('padding', '0');

            var $inp = $("<input type='text'  name='" + dataIndx + "' class='" + cls + " pq-cell-editor pg-cel-define' readonly />")
            .appendTo($cell)
            .val(dc).keypress(function(){
                 $('.dialog_main_makh').load("form/frm_dm_makh_select.php?idstyle=grid_editing_danhmuc_sanpham");
            });            
        }
    var formart_num = function (ui) {
            var $cell = ui.$cell,
                rowData = ui.rowData,
                dataIndx = ui.dataIndx,
                cls = ui.cls,width=ui.column.minWidth,
                dc = $.trim(rowData[dataIndx]);
            $cell.css('padding', '0');

            var $inp = $("<input type='text'  name='" + dataIndx + "' class='" + cls + " pq-cell-editor pg-cel-define' />")
            .appendTo($cell)
            .val(dc).keyup(function(){
                var value= $(".pq-editor-focus").val();
                $(".pq-editor-focus").val(FormatInt(value));

            });            
        }
        
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
            $ma="";
            if($obj_addrow!=""){
                $.ajax({
                    url:  $dir_module_dmsanpham+"taoma.php",
                    async: false,
                    data:{
                        makhcha:$obj_addrow.maspcha
                    },
                    success: function (response) {
                        $ma = response;
                    }
                });
                var rowData =$obj_addrow;
            }else{
                $.ajax({
                    url:  $dir_module_dmsanpham+"taoma.php",
                    async: false,
                    data:{
                        makhcha:"0"
                    },
                    success: function (response) {
                        $ma = response;
                    }
                });
                var rowData = {tensp:"",masp:"",maspcha:"0",dvt:""}; //empty row template
            }
            rowData.masp = $ma;
            if(typeof rowIndx == 'undefined')
                rowIndx=0;
            $grid.pqGrid("addRow", { rowIndx: rowIndx, rowData: rowData });

            $grid.pqGrid("setSelection", { rowIndx: rowIndx, dataIndx: $name});
            $grid.pqGrid("editFirstCellInRow", { rowIndx: (rowIndx) });
        }

        //----------------------------Hàm xóa dữ kiệu------------------------------------------
        function deleteRow(rowData, $grid) {
            var rowData = rowData;
            var ma = rowData.masp;
            var sott = rowData.sott;
                if($('div').hasClass('jconfirm')==false){
                    $.confirm({
                        title: "Chú ý",icon: "fa fa-times-circle",type: "red",
                        content: "Bạn có muốn xóa hàng có mã "+ (ma)+"  không ?"+'<br/>Nhấn phím <strong style="color:blue;">[Y]</strong> để đồng ý phím <strong style="color:red;">[N]</strong> để hủy bỏ ',
                        buttons: {"Đồng ý": {keys: ['Y'],action: function () {

                
                                $.ajax($.extend({}, ajaxObj, {
                                    context: $grid,
                                    url:  $dir_module_dmsanpham+"del.php",
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

        //------------------------------Thây đổi row khi nhấp edit-----------------------------------
        function editRow(rowIndx, $grid) {

            $grid.pqGrid("addClass", {rowIndx: rowIndx, cls: 'pq-row-edit'});
            //change edit button to update button and delete to cancel.
            var selectCell = (getRowSelect());
            if (selectCell == false) {
                var dataIndex = 1;
            } else {
                var dataIndex = selectCell[0].dataIndx;
            }
            if (dataIndex == 1) {
                $grid.pqGrid("editFirstCellInRow", {rowIndx: rowIndx});
            } else {
                $grid.pqGrid("editCell", {rowIndx: rowIndx, dataIndx: dataIndex});
            }
            var $tr = $grid.pqGrid("getRow", {rowIndx: rowIndx}),
                $btn = $tr.find("button.edit_btn");
            $btn.button("option", {label: "", "icons": {primary: "ui-icon-disk"}})
                .unbind("click")
                .click(function (evt) {
                    evt.preventDefault();
                    return update(rowIndx, $grid);

                });
            $btn.next().button("option", {label: "", "icons": {primary: "ui-icon-cancel"}})
                .unbind("click")
                .click(function (evt) {
                    $grid.pqGrid("quitEditMode");
                    $grid.pqGrid("removeClass", {rowIndx: rowIndx, cls: 'pq-row-edit'});
                    $grid.pqGrid("refreshRow", {rowIndx: rowIndx});
                    $grid.pqGrid("rollback");
                });
        }

        //--------------------------------Khai báo lưới---------------------------------------.
       var obj = {
            hwrap: false,
            //resizable: true,
            rowBorders: true,
			 virtualX: true, virtualY: true,
			height:$height-58,
            width:$width-20,
            //virtualX: true,
            numberCell: { show: true },
			filterModel: { on: true, mode: "AND", header: true },
            trackModel: { on: true }, //to turn on the track changes.            
            scrollModel: {
                autoFit: true
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
                                url =  $dir_module_dmsanpham+"add.php";
                            }
                            else {
                                url =  $dir_module_dmsanpham+"edit.php";
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
                             var colM = $("#grid_editing_danhmuc_sanpham").pqGrid("option", "colModel");
                             colM[1].editable = false;
                             $("#grid_editing_danhmuc_sanpham").pqGrid("option", "colModel", colM);
                        },
                    });
               }
            },
            colModel: [//-------------------------------------------Khai báo các cột trong lưới-----------------------
                { title: "SoTT", dataType: "integer", dataIndx: "sott", editable: false, width: 0, hidden:true, },
                { title: "Mã SP", dataType: "string", dataIndx: "masp", minWidth: 80,sortable: true,editable:false,
                    validations: [
                        { type: 'minLen', value: 1, msg: "Mã sản phẩm không được trống !" },
                        { type: 'maxLen', value: 14, msg: "Mã sản phảm không lớn hơn 14 ký tự !" },
                        { type: function (ui) {
                            var value = ui.value,
                                _found = false,sott = ui.rowData.sott;
                            //remote validation
                            $.ajax({
                                url:  $dir_module_dmsanpham+"checkkey.php",
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
                    ],
                    filter: {
                        type: 'textbox',
                        condition: 'begin',
                        listeners: ['keyup']
                    }
                },
                { title: "Tên SP", minWidth: 200, dataType: "string", dataIndx: "tensp",
                    validations: [
                        { type: 'minLen', value: 1, msg: "Tên sản phẩm không được trống !" }
                    ],
                    filter: {
                        type: 'textbox',
                        condition: 'begin',
                        listeners: ['keyup']
                    }
                },
                { title: "Mã SP cha", minWidth: 80, dataType: "string", align: "left", dataIndx: "maspcha",hidden:false,
                    validations: [
                        { type: 'minLen', value: 1, msg: "Mã sản phẩm cha không được trống !" },
                        { type: 'maxLen', value: 14, msg: "Mã sản phẩm cha không lớn hơn 14 ký tự !" },
                        { type: function (ui) {
                            var value = ui.value,
                                _found = false,sott = ui.rowData.sott;
                            //remote validation
                            $.ajax({
                                url:  $dir_module_dmsanpham+"checkkeycha.php",
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
                    ]
                },
				{ title: "ĐVT", minWidth: 200, dataType: "string", dataIndx: "dvt",
                    validations: [
                        { type: 'minLen', value: 1, msg: "Đơn vị tính không được trống !" }
                    ],
                    filter: {
                        type: 'textbox',
                        condition: 'begin',
                        listeners: ['keyup']
                    }
                },

            ],//,
			pageModel: { type: "local", rPP: 20, strRpp: "{0}", strDisplay: "{0} đến {1} của {2}" },
            dataModel: {
                dataType: "JSON",
                location: "remote",
                recIndx: "sott",
                url:  $dir_module_dmsanpham+"list.php",//-- Load danh sách lên lưới
                getData: function (dataJSON) {
                var data = dataJSON.data;
                return {data: data };
            }
		}};
        var $grid = $("#grid_editing_danhmuc_sanpham").pqGrid(obj);
        $grid.one("pqgridload", function (evt, ui) {
                try {
                    $find = $("#grid_editing_danhmuc_sanpham .pq-grid-table td:nth-child(1):contains('<?php echo $ma; ?>')");

                    if (typeof($find[0]) == "undefined") {
                        $find = $("#grid_editing_danhmuc_sanpham .pq-grid-table td:nth-child(1)");
                        $find[5].focus();
                        $("#grid_editing_danhmuc_sanpham").pqGrid("setSelection", {rowIndx: 0, colIndx: 1});
                    } else {
                        $find[0].focus();
                        $colIndx = $("#grid_editing_danhmuc_sanpham .pq-grid-table td:nth-child(1):contains('<?php echo $ma; ?>')").attr('pq-col-indx');
                        $rowIndx = $("#grid_editing_danhmuc_sanpham .pq-grid-table td:nth-child(1):contains('<?php echo $ma; ?>')").parent().attr('pq-row-indx');
                        $("#grid_editing_danhmuc_sanpham").pqGrid("setSelection", {
                            rowIndx: $rowIndx,
                            colIndx: $colIndx
                        });
                    }
                }catch (err){
                    $("#grid_editing_danhmuc_sanpham .pq-search-hd-field").focus();
                }

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
             var arr = $("#grid_editing_danhmuc_sanpham").pqGrid("selection", {
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
			  isEdit = $("#grid_editing_danhmuc_sanpham").pqGrid("isDirty"); //Lấy giá trị đang chọn
             
             return isEdit;
         }

 //-----------------------------Hết lưới---------------------------------------------------------------------       
            
    });     
</script>    
<div id="dialog-danhmuc_sanpham" title="CHỌN DANH MỤC SẢM PHẨM (INSERT : CHỌN, ENTER : SỬA VÀ LƯU , F7: SAO CHÉP , F8: XÓA , ESC : THOÁT)"><!-- dialog -->
  <div id="grid_editing_danhmuc_sanpham" style="margin:5px auto;border: 0px !important;"></div>
</div>