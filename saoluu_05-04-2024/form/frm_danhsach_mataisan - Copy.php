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
        var $dir_module_mataisan="";
        $dir_module_mataisan = "modules/mataisan/";//--------------------------------------------Thay đổi khi copy
        $dir_module_httk = "modules/httk/";//--------------------------------------------Thay đổi khi copy
        $dir_module_mabophan = "modules/mabp/";//--------------------------------------------Thay đổi khi copy
        $dir_module_manhomts = "modules/manhomvattu/";//--------------------------------------------Thay đổi khi copy
        function xoadialog_danhsach_taisan() { // ----------------------đóng form
            reset_dialog(".dialog-mataisan");
            reset_dialog(".dialog_main_mataisan");
			$("#mataisan").focus();
        }
        $("#dialog-mataisan").dialog({ // ------------------Gọi dialog
            resizable: false,
            height: $height,
            width: $width,
            modal: true

        });
     $("#dialog-mataisan").keydown(function(event) {//--------------Các phím tắt
        var $grid_pb = $("#grid_editing_mats").closest('.pq-grid');//---- Lưới----------------
         if (event.keyCode == Keys.F2 || event.keyCode == Keys.F7 || event.keyCode == Keys.F8 || event.keyCode == Keys.INSERT) {
                var rowSelect = getRowSelect();//------ Lấy đối tượng được chọn
                if(rowSelect==false){
                    alert_f("Chú Ý","fa fa-warning","red","Bạn cần chọn dữ liệu trước khi thực hiện !");
                }
            }
        var rowEditting = $( "#grid_editing_mats" ).pqGrid( "getRowsByClass", { cls : 'pq-row-edit' } );//---Lấy đối tượng đang sửa
          if ( $('div').hasClass('jconfirm')==false) {
             if (event.keyCode == Keys.F4) {
                  rowIndex = 0;
                  addRow(rowIndx,'mavt',$grid_pb);
             }
             if (event.keyCode == Keys.F7) { // copy
                if (rowSelect != false){
                    
                   var rowIndx = rowSelect[0].rowIndx;
                   var rowData = rowSelect[0].rowData;
                   //---------------Khai báo các cell khi dùng lệnh copy-----------------------------------------
                   //--------------------------------------------Thay đổi khi copy---------------------------------
                    var _dataRow = {mats : rowData.mats,tents :rowData.tents,matk :rowData.matk,dvt :rowData.dvt,mabp :rowData.mabp,manhomts :rowData.manhomts,congsuat :rowData.congsuat,nuocsx :rowData.nuocsx,soluong :rowData.soluong,ngaysx :rowData.ngaysx,ngaysd :rowData.ngaysd,nguyengia :rowData.nguyengia,giatriconlai :rowData.giatriconlai,tylekh :rowData.tylekh,thoigiansd :rowData.thoigiansd,muckhthang :rowData.muckhthang,tkco :rowData.tkco,tkno :rowData.tkno,chuthich :rowData.chuthichu};
                    addRow(rowIndx,'mavt',$grid_pb,_dataRow);
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
				$("#mataisan").val(rowData.mats);
				$("#tentaisan").val(rowData.tents);
				$("#mataisan").focus();
				xoadialog_danhsach_taisan();
             }
             if (event.keyCode == Keys.ESCAPE && $('div').hasClass('jconfirm')==false&&rowEditting.length<1) {
                 change_data_quit_mavattu();
             }
        }else{
            return false;
         } 
     }); // end phím tắt

     function change_data_quit_mavattu() { // Cảnh báo thoát khi thay đổi dữ liệu////////////////////////////////////////////////////
        var $grid_pb = $("#grid_editing_mats").closest('.pq-grid');//---- Lưới----------------
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
                                    xoadialog_danhsach_taisan();
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
                        xoadialog_danhsach_taisan();
                    }},
                    "Hủy bỏ":{ keys: ['N'],action: function () {
                                    
                                }
                        }
                }
            });
        }
    }
     
     
    //----------------------------------------------------Bắt đầu lưới-----------------------------------------
    var matk_select = function (ui) {
            var $cell = ui.$cell,
                rowData = ui.rowData,
                dataIndx = ui.dataIndx,
                cls = ui.cls,width=ui.column.minWidth,
                dc = $.trim(rowData[dataIndx]);
            $cell.css('padding', '0');

            var $inp = $("<input type='text'  name='" + dataIndx + "' class='" + cls + " pq-cell-editor pg-cel-define' />")
            .appendTo($cell)
            .val(dc).keypress(function(e){
                    //console.log(e);
                 //$('.dialog_main3').load("form/frm_dm_httk_select.php?idstyle=grid_editing_mats");
            });            
    }
        var manhomvattu_select = function (ui) {
            var $cell = ui.$cell,
                rowData = ui.rowData,
                dataIndx = ui.dataIndx,
                cls = ui.cls,width=ui.column.minWidth,
                dc = $.trim(rowData[dataIndx]);
            $cell.css('padding', '0');

            var $inp = $("<input type='text'  name='" + dataIndx + "' class='" + cls + " pq-cell-editor pg-cel-define' readonly />")
            .appendTo($cell)
            .val(dc).keypress(function(e){
                
                //if(typeof $(".dialog-manhom_vatu_select").html()=="undefined"){
                    $('.dialog_main_manhomvt').load("form/frm_dm_manhom_select.php?idstyle=grid_editing_mats");
               //} 
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
                $(".pq-editor-focus").val(FormatNumber(value));

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
            if($obj_addrow!=""){
                var rowData =$obj_addrow;
            }else{                      
                var rowData = {mats:"",tents:"",matk:"",dvt:"",mabp :"",manhomts :"",congsuat :"",nuocsx :"",soluong :"",ngaysx :"0000-00-00",ngaysd :"0000-00-00",nguyengia :"",giatriconlai :"",tylekh :"",thoigiansd :"",muckhthang :"",tkco :"",tkno :"",chuthich :""}; //empty row template
           }
		   if(typeof rowIndx == 'undefined')
				rowIndx=0;
            $grid.pqGrid("addRow", { rowIndx: rowIndx, rowData: rowData });

            $grid.pqGrid("setSelection", { rowIndx: rowIndx, dataIndx: $name});
            $grid.pqGrid("editFirstCellInRow", { rowIndx: (rowIndx) });
       }
        //----------------------------Hàm xóa dữ kiệu------------------------------------------
        function deleteRow(rowData, $grid) {
            var rowData = rowData;
            var ma = rowData.mavt;
            var sott = rowData.sott;
                if($('div').hasClass('jconfirm')==false){
                    $.confirm({
                        title: "Chú ý",icon: "fa fa-times-circle",type: "red",
                        content: "Bạn có muốn xóa hàng có mã "+ (ma)+"  không ?"+'<br/>Nhấn phím <strong style="color:blue;">[Y]</strong> để đồng ý phím <strong style="color:red;">[N]</strong> để hủy bỏ ',
                        buttons: {"Đồng ý": {keys: ['Y'],action: function () {

                
                                $.ajax($.extend({}, ajaxObj, {
                                    context: $grid,
                                    url: $dir_module_mataisan+"del.php",
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

            $grid.pqGrid("addClass", { rowIndx: rowIndx, cls: 'pq-row-edit' });

            //change edit button to update button and delete to cancel.
                var selectCell = (getRowSelect());
                if(selectCell==false){
                   var  dataIndex=1;
                }else{
                   var dataIndex = selectCell[0].dataIndx;
                }
                if(dataIndex==1){
                    $grid.pqGrid("editFirstCellInRow", { rowIndx: rowIndx });
                }else{
                    $grid.pqGrid("editCell", { rowIndx: rowIndx,dataIndx: dataIndex});
                }
            var $tr = $grid.pqGrid("getRow", { rowIndx: rowIndx }),
                $btn = $tr.find("button.edit_btn");
            $btn.button("option", { label: "", "icons": { primary: "ui-icon-disk"} })
                .unbind("click")
                .click(function (evt) {
                    evt.preventDefault();
                    return update(rowIndx, $grid);
                    
                });
            $btn.next().button("option", { label: "", "icons": { primary: "ui-icon-cancel"} })
                .unbind("click")
                .click(function (evt) {
                    $grid.pqGrid("quitEditMode");
                    $grid.pqGrid("removeClass", { rowIndx: rowIndx, cls: 'pq-row-edit' });
                    $grid.pqGrid("refreshRow", { rowIndx: rowIndx });
                    $grid.pqGrid("rollback");
                });
        }
        //---------------------------Cập nhật row-----------------------------------------
        function update(rowIndx, $grid) {

            if ($grid.pqGrid("saveEditCell") == false) {
                return false;
            }

            var isValid = $grid.pqGrid("isValid", { rowIndx: rowIndx }).valid;
            if (!isValid) {//Kiểm tra có sửa dữ liệu không
                return false;
            }
            var isDirty = $grid.pqGrid("isDirty");
            if (isDirty) {
                var url,
                    rowData = $grid.pqGrid("getRowData", { rowIndx: rowIndx }),
                    recIndx = $grid.pqGrid("option", "dataModel.recIndx");

                $grid.pqGrid("removeClass", { rowIndx: rowIndx, cls: 'pq-row-edit' });

                if (rowData[recIndx] == null) {
                    //url to add records.
                    url = $dir_module_mataisan+"add.php";
                }
                else {
                    //url to  update records.
                     url = $dir_module_mataisan+"edit.php";
                }
                $.ajax($.extend({}, ajaxObj, {
                    context: $grid,
                    url: url,
                    data: rowData,
                    success: function (response) {
                        var recIndx = this.pqGrid("option", "dataModel.recIndx");
                        if (rowData[recIndx] == null) {
                            rowData[recIndx] = response.recId;
                        }
                        this.pqGrid("removeClass", { rowIndx: rowIndx, cls: 'pq-row-edit' });
                        this.pqGrid("commit");
                        $grid.pqGrid("refreshDataAndView");
                    }
                }));
            }else {
                $grid.pqGrid("quitEditMode");
                $grid.pqGrid("removeClass", { rowIndx: rowIndx, cls: 'pq-row-edit' });
                $grid.pqGrid("refreshRow", { rowIndx: rowIndx });
            }
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
            numberCell: { show: false },
			filterModel: { on: true, mode: "AND", header: true },
            trackModel: { on: true }, //to turn on the track changes.            
            scrollModel: {
                autoFit: true
            },
            historyModel: {
                checkEditableAdd: true
            },            
            
            editor: {
                select: false
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
						if(rowData.mavt==""){
							var timemili = Date.now();
							rowData.mavt=timemili;
						}
                            if (rowData[recIndx] == null) {
                                url = $dir_module_mataisan+"add.php";
                            }
                            else {
                                url = $dir_module_mataisan+"edit.php";
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
                    { title: "SoTT", dataType: "integer", dataIndx: "sott", editable: false, width: 0, hidden:true },
                    { title: "Mã TS", dataType: "string", dataIndx: "mats", minWidth: 100,sortable: true,editable: false,
                        validations: [
                            { type: 'minLen', value: 6, msg: "Mã tài sản phải có  6 ký tự  !" },
                            { type: 'maxLen', value: 6, msg: "Mã tài sản phải có 6 ký tự !" },
                            { type: function (ui) {
								isEdit = isEditCell();
								if(isEdit){
                                    var value = ui.value,
                                        _found = false,sott = ui.rowData.sott;
                                    //remote validation
                                    $.ajax({
                                        url: $dir_module_mataisan+"checkkey.php",
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
                         }
                     },
                     { title: "Tên TS", minWidth: 200, dataType: "string", dataIndx: "tents",editable: false,
                        validations: [
                            { type: 'minLen', value: 1, msg: "Tên tài sản hàng hóa không được trống !" }
                        ],
                        filter: {
                             type: 'textbox',
                             condition: 'begin',
                             listeners: ['keyup']
                         }
                    },
                    { title: "Mã TK", minWidth: 100, dataType: "integer", dataIndx: "matk",editable: false,
                         validations: [
                            { type: function (ui) {
								isEdit = isEditCell();
								if(isEdit){
                                    var value = ui.value;
                                    sott = ui.rowData.sott;
                                    _found = false;
                                $.ajax({// Kiểm tra mã tk có trông bản hay không
                                    url: $dir_module_httk+"checkkeytontai.php",
                                    data: { 'id': value,'sott':sott },
                                    async: false,
                                    success: function (response) {
                                        if (response == 1) {
                                            _found = true;
                                        }
                                    }
                                });

                                    if(_found==false){
                                        ui.msg ="Mã TK "+ value + " không nằm trong bảng hệ thống tài khoản !";
                                        $('.dialog_main_httk').load("form/frm_dm_httk_select.php?idstyle=grid_editing_mats");
                                        return false;
                                    }
							}
                                    }
                                },
                        ]                        
                    },

                    { title: "ĐVT", minWidth: 100, dataType: "string", align: "left", dataIndx: "dvt",editable: false,
                    validations: [
                            { type: 'minLen', value: 1, msg: "Đơn vị tính không được trống !" },
                        ]
                    },
                    { title: "Bộ Phận", minWidth: 120, dataType: "string", align: "left", dataIndx: "mabp",editable: false,
                        validations: [
                            { type: function (ui) {
								isEdit = isEditCell();
								if(isEdit){
                                var value = ui.value;
                                sott = ui.rowData.sott;
                                _found = false;
                                $.ajax({// Kiểm tra mã tk có trông bản hay không
                                    url: $dir_module_mabophan+"checkkeytontai.php",
                                    data: { 'id': value,'sott':sott },
                                    async: false,
                                    success: function (response) {
                                        if (response == 1) {
                                            _found = true;
                                        }
                                    }
                                });

                                if(_found==false){
                                    ui.msg ="Mã bộ phận "+ value + " không nằm trong bảng hệ thống  !";
                                    $('.dialog_main_mabophan').load("form/frm_dm_mabp_select.php?idstyle=grid_editing_mats");
                                    return false;
                                }
							}
                            }
                            },
                        ]
                    },
                    { title: "Mã Nhóm", minWidth: 120, dataType: "string", align: "left", dataIndx: "manhomts",editable: false,
                        editor: {
                            type: "select", options: function (ui) {
                                //remote validation
                                var parsedJson = "";
                                $.ajax({
                                    url: $dir_module_manhomts + "cb_manhomts.php",
                                    data: {},
                                    async: false,
                                    success: function (response) {
                                        parsedJson = $.parseJSON(response);
                                    }
                                });
                                return parsedJson;
                            }
                        }
                    },
                    { title: "Công suất", minWidth: 150, dataType: "string", align: "left", dataIndx: "congsuat",editable: false,
                        editor: {
                            type: formart_num
                        },
                        render:function( ui ){
                            var values = ui.rowData.congsuat;
                            return FormatNumber(values);
                        }

                    },
                    { title: "Nước SX", minWidth: 150, dataType: "string", align: "left", dataIndx: "nuocsx",editable: false,},
                    { title: "Số lượng", minWidth: 100, dataType: "string", align: "left", dataIndx: "soluong",editable: false,
                        editor: {
                            type: formart_num
                        },
                        validations: [
                            { type: 'minLen', value: 1, msg: "Số lượng không được trống !" }
                        ],
                        render:function( ui ){
                            var values = ui.rowData.soluong;
                            return FormatNumber(values);
                        }
                    },
                    { title: "Ngày SX", minWidth: 150, dataType: "date", align: "left", dataIndx: "ngaysx",editable: false,
                        render:function( ui ){
                            var $yyyy_mm_dd = ui.rowData.ngaysx;
                            return Format_dd_mm_yyyy($yyyy_mm_dd);
                        },
                        editor: {
                            type: 'date'
                        },
                    },
                { title: "Ngày SD", minWidth: 150, dataType: "date", align: "left", dataIndx: "ngaysd",editable: false,
                    render:function( ui ){
                        var $yyyy_mm_dd = ui.rowData.ngaysd;
                        return Format_dd_mm_yyyy($yyyy_mm_dd);
                    },
                    editor: {
                        type: 'date'
                    },
                },
                    { title: "Nguyên giá", minWidth: 150, dataType: "string", align: "left", dataIndx: "nguyengia",editable: false,
                        editor: {
                            type: formart_num
                        },
                        validations: [
                            { type: 'minLen', value: 2, msg: "Nguyên giá không được trống !" }
                        ],
                        render:function( ui ){
                            var values = ui.rowData.nguyengia;
                            return FormatNumber(values);
                        }
                    },
                    { title: "GT còn lại", minWidth: 150, dataType: "string", align: "left", dataIndx: "giatriconlai",editable: false,
                        editor: {
                            type: formart_num
                        },
                        render:function( ui ){
                            var values = ui.rowData.giatriconlai;
                            return FormatNumber(values);
                        }
                    },
                    { title: "Tỷ lệ KH", minWidth: 80, dataType: "integer", dataIndx: "tylekh",editable: false,
                    },
                    { title: "TG sử dụng", minWidth: 150, dataType: "string", align: "left", dataIndx: "thoigiansd",editable: false,
                    },
                    { title: "Mức KH tháng", minWidth: 100, dataType: "string", align: "left", dataIndx: "muckhthang",editable: false,
                        editor: {
                            type: formart_num
                        },
                        render:function( ui ){
                            var values = ui.rowData.muckhthang;
                            return FormatNumber(values);
                        }
                    },
                    { title: "TK có", minWidth: 100, dataType: "string", align: "left", dataIndx: "tkco",editable: false,
                        validations: [
                            { type: function (ui) {
								isEdit = isEditCell();
								if(isEdit){
                                var value = ui.value;
                                sott = ui.rowData.sott;
                                _found = false;
                                $.ajax({// Kiểm tra mã tk có trông bản hay không
                                    url: $dir_module_httk+"checkkeytontai.php",
                                    data: { 'id': value,'sott':sott },
                                    async: false,
                                    success: function (response) {
                                        if (response == 1) {
                                            _found = true;
                                        }
                                    }
                                });

                                if(_found==false){
                                    ui.msg ="Mã TK "+ value + " không nằm trong bảng hệ thống tài khoản !";
                                    $('.dialog_main_httk').load("form/frm_dm_httk_select.php?idstyle=grid_editing_mats");
                                    return false;
                                }
							}
                            }
                            },
                        ]
                    },
                { title: "TK nợ", minWidth: 100, dataType: "string", align: "left", dataIndx: "tkno",editable: false,
                    validations: [
                        { type: function (ui) {
							isEdit = isEditCell();
							if(isEdit){
                            var value = ui.value;
                            sott = ui.rowData.sott;
                            _found = false;
                            $.ajax({// Kiểm tra mã tk có trông bản hay không
                                url: $dir_module_httk+"checkkeytontai.php",
                                data: { 'id': value,'sott':sott },
                                async: false,
                                success: function (response) {
                                    if (response == 1) {
                                        _found = true;
                                    }
                                }
                            });

                            if(_found==false){
                                ui.msg ="Mã TK "+ value + " không nằm trong bảng hệ thống tài khoản !";
                                $('.dialog_main_httk').load("form/frm_dm_httk_select.php?idstyle=grid_editing_mats");
                                return false;
                            }
						}
                        }
                        },
                    ]
                },
                    { title: "Chú thích", minWidth: 150, dataType: "string", align: "left", dataIndx: "chuthich",
                        editor: { type: "textarea", attr: "rows=3" }
                    }
            ],//-----------------------------------------Kết thúc các cột--------------------------------
            dataModel: {
                dataType: "JSON",
                location: "remote",
                recIndx: "sott",
                url: $dir_module_mataisan+"listallts.php",//-- Load danh sách lên lưới
                getData: function (dataJSON) {
                var data = dataJSON.data;
				console.log(data);
                return { curPage: dataJSON.curPage, totalRecords: dataJSON.totalRecords, data: data };
            }
		}};
        var $grid = $("#grid_editing_mats").pqGrid(obj);
        $grid.one("pqgridload", function (evt, ui) {
				//var column = $grid.pqGrid("getColumn", { dataIndx:"manhom" });
				//var filter = column.filter;
				//filter.cache = null;
				//filter.options = $grid.pqGrid("getData", { dataIndx: ["tennhom","manhom"] });// lấy 1 hoặc nhiều dataindex
				//$grid.pqGrid("refreshHeader");
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
             var arr = $("#grid_editing_mats").pqGrid("selection", {
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
			  isEdit = $("#grid_editing_mats").pqGrid("isDirty"); //Lấy giá trị đang chọn
             
             return isEdit;
         }
		 
			setTimeout(function(){
				$("#grid_editing_mats .pq-search-hd-field").focus();
			},100);
 //-----------------------------Hết lưới---------------------------------------------------------------------       
            
    });     
</script>    
<div id="dialog-mataisan" title="Danh sách tài sản cố định... (INSERT : Chọn tài sản)"><!-- dialog -->
  <div id="grid_editing_mats" style="margin:5px auto;border: 0px !important;"></div>
</div>