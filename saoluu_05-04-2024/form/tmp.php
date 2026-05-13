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
        var $dir_module_mact="";
        $dir_module_mact = "modules/macongtrinh/";//--------------------------------------------Thay đổi khi copy
        function xoadialog_mact() { // ----------------------đóng form 
            reset_dialog(".dialog-macongtrinh");
            reset_dialog(".dialog_main_mact");
        }
        $("#dialog-macongtrinh").dialog({ // ------------------Gọi dialog 
            resizable: false,
            height: $height,
            width: $width,
            modal: true

        });
     $("#dialog-macongtrinh").keydown(function(event) {//--------------Các phím tắt
        var $grid_pb = $("#grid_editing_mact").closest('.pq-grid');//---- Lưới----------------
         if (event.keyCode == Keys.F2 || event.keyCode == Keys.F7 || event.keyCode == Keys.F8) {
                var rowSelect = getRowSelect();//------ Lấy đối tượng được chọn
                if(rowSelect==false){
                    alert_f("Chú Ý","fa fa-warning","red","Bạn cần chọn dữ liệu trước khi thực hiện !");
                }
            }
        var rowEditting = $( "#grid_editing_mact" ).pqGrid( "getRowsByClass", { cls : 'pq-row-edit' } );//---Lấy đối tượng đang sửa
          if ( $('div').hasClass('jconfirm')==false) {
             if (event.keyCode == Keys.F4) {
                  addRow($grid_pb);
             }
             if (event.keyCode == Keys.F2) {// Sửa
                 if (rowSelect != false){
                   if (isEditing($grid_pb)) {
                        return false;
                   }
                   var rowIndx = rowSelect[0].rowIndx;
                   editRow(rowIndx, $grid_pb);
                   return false; 
                }
             }
             if (event.keyCode == Keys.F7) { // copy
                if (rowSelect != false){
                    
                   var rowIndx = rowSelect[0].rowIndx;
                   var rowData = rowSelect[0].rowData;
                   //---------------Khai báo các cell khi dùng lệnh copy-----------------------------------------
                   //--------------------------------------------Thay đổi khi copy---------------------------------
                    var _dataRow = {mact : rowData.mact,tenct :rowData.tenct,mactcha :rowData.mactcha,makh :rowData.makh,diachi :rowData.diachi,so_hd :rowData.so_hd,ngayhd :rowData.ngayhd,ngay_kc :rowData.ngay_kc,ngay_ht :rowData.ngay_ht,giatri_hd :rowData.giatri_hd,vatlieu :rowData.vatlieu,nhancong :rowData.nhancong,may :rowData.may};
                    addRow($grid_pb,_dataRow);
                }
             }
             if (event.keyCode == Keys.F8) { // Xóa
                 if (rowSelect != false){
                    if (isEditing($grid_pb)) {
                        return false;
                    }
                    var rowIndx = rowSelect[0].rowIndx;
                    deleteRow(rowIndx, $grid_pb);
                }
             }
             if (event.keyCode == Keys.F9) { // Lưu
                if (isEditing($grid_pb)) {
                    var rowIndx = rowEditting[0].rowIndx;
                    update(rowIndx, $grid_pb);
                }
             }
             if (event.keyCode == Keys.END) { // Hủy bỏ hàng đang xóa
                 if (isEditing($grid_pb)) {                 
                    var rowIndx = rowEditting[0].rowIndx;
                    $grid_pb.pqGrid("quitEditMode");
                    $grid_pb.pqGrid("removeClass", { rowIndx: rowIndx, cls: 'pq-row-edit' });
                    $grid_pb.pqGrid("refreshRow", { rowIndx: rowIndx });
                    $grid_pb.pqGrid("rollback");
                }
             }
             if (event.keyCode == Keys.ESCAPE && $('div').hasClass('jconfirm')==false&&rowEditting.length<1) {
                 change_data_quit_mact();
             }
        }else{
            return false;
         } 
     }); // end phím tắt
     $.contextMenu('destroy');
     $.contextMenu({// Menu chuột phải
             selector: '.pq-grid-table',
             build: function($trigger, e) {
                 return {
                     callback: function(key, options) {
                         var $grid_pb = $("#grid_editing_mact").closest('.pq-grid');
                         var rowSelect = getRowSelect();
                         if(rowSelect==false){
                            alert_f("Chú Ý","fa fa-warning","red","Bạn cần chọn dữ liệu trước khi thực hiện !");
                        }
                         if (key == "Edit") {
                            if (rowSelect != false){
                               if (isEditing($grid_pb)) {
                                    return false;
                               }
                               var rowIndx = rowSelect[0].rowIndx;
                               editRow(rowIndx, $grid_pb);
                               return false; 
                            }
                         }
                         if (key == "Copy") {
                            var rowIndx = rowSelect[0].rowIndx;
                            //--------------------------------------------Thay đổi khi copy--------------------------
                            var rowData = rowSelect[0].rowData;
                            var _dataRow = {mact : rowData.mact,tenct :rowData.tenct,mactcha :rowData.mactcha,makh :rowData.makh,diachi :rowData.diachi,so_hd :rowData.so_hd,ngayhd :rowData.ngayhd,ngay_kc :rowData.ngay_kc,ngay_ht :rowData.ngay_ht,giatri_hd :rowData.giatri_hd,vatlieu :rowData.vatlieu,nhancong :rowData.nhancong,may :rowData.may};
                                addRow($grid_pb,_dataRow);
                         }
                         if (key == "Add") {
                             addRow($grid_pb);
                         }
                         if (key == "Del") {
                            if (rowSelect != false){
                                 if (isEditing($grid_pb)) {
                                    return false;
                                }
                                var rowIndx = rowSelect[0].rowIndx;
                                deleteRow(rowIndx, $grid_pb);
                            }
                         }

                     },
                     items: items
                 };
             }
         });
     var m;
     var items = {
         "Add": {
             name: "Thêm (F4)",
             icon: "add"
         },
         "Edit": {
             name: "Sửa (F2)",
             icon: "edit"
         },

         "Copy": {
             name: "Sao Chép (F7)",
             icon: "copy"
         },
         "Del": {
             name: "Xóa (F8) ",
             icon: "delete"
         }
     }; // end right menu   
     function change_data_quit_mact() { // Cảnh báo thoát khi thay đổi dữ liệu////////////////////////////////////////////////////
        var $grid_pb = $("#grid_editing_mact").closest('.pq-grid');//---- Lưới----------------
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
                 $('.dialog_main_makh').load("form/frm_dm_makh_select.php?idstyle=grid_editing_mact");
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
        function addRow($grid,$obj_addrow="") {
            if (isEditing($grid)) {
                return false;
            }
            //append empty row in the first row.     
            if($obj_addrow!=""){
                var rowData =$obj_addrow;
            }else{                      
                var rowData = {mact:"",tenct:"",mactcha:"",makh:"",diachi :"",so_hd :"",ngayhd :"0000-00-00",ngay_kc :"0000-00-00",ngay_ht :"0000-00-00",giatri_hd :"",vatlieu :"",nhancong :"",may :""}; //empty row template
           }
            $grid.pqGrid("addRow", { rowIndxPage: 0, rowData: rowData });

            var $tr = $grid.pqGrid("getRow", { rowIndxPage: 0 });
            if ($tr) {
                //simulate click on edit button.
                $tr.find("button.edit_btn").click();
            }
        }
        //----------------------------Hàm xóa dữ kiệu------------------------------------------
        function deleteRow(rowIndx, $grid) {
            $grid.pqGrid("addClass", { rowIndx: rowIndx, cls: 'pq-row-delete' });
            var rowData = $grid.pqGrid("getRowData", { rowIndx: rowIndx });
            //var ans = window.confirm("Bạn có muốn xóa dòng số " + (rowIndx + 1) + " không ?");
                if($('div').hasClass('jconfirm')==false){
                    $.confirm({
                        title: "Chú ý",icon: "fa fa-times-circle",type: "red",
                        content: "Bạn có muốn xóa hàng số"+ (rowIndx + 1)+"  không ?"+'<br/>Nhấn phím <strong style="color:blue;">[Y]</strong> để đồng ý phím <strong style="color:red;">[N]</strong> để hủy bỏ ',
                        buttons: {"Đồng ý": {keys: ['Y'],action: function () {
                                 $grid.pqGrid("deleteRow", { rowIndx: rowIndx, effect: true });

                                var sott = $grid.pqGrid("getRecId", { rowIndx: rowIndx });
                                var rowData = ( $grid.pqGrid( "getRowData", {rowIndx: rowIndx} ));
                                var ma = rowData.mact;
                
                                $.ajax($.extend({}, ajaxObj, {
                                    context: $grid,
                                    url: $dir_module_mact+"del.php",
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
                                $grid.pqGrid("removeClass", { rowIndx: rowIndx, cls: 'pq-row-delete' });
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
                    url = $dir_module_mact+"add.php";
                }
                else {
                    //url to  update records.
                     url = $dir_module_mact+"edit.php";
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
            wrap: false,
            hwrap: false,
            resizable: true,
            columnBorders: true,
            numberCell: { show: true },
            track: true, //to turn on the track changes.
            freezeRows:1,
            freezeCols: 5,
            sorting: 'local',
            sortIndx: 'mact',
            sortDir: 'up',
            //flexHeight: true,
            title:null,
            height:$height-58,
            width:$width-14,
            toolbar: {
                items: [
                    { type: 'button', icon: 'ui-icon-plus', label: 'Thêm mới(F4)', listeners: [
                        { "click": function (evt, ui) {
                            var $grid = $(this).closest('.pq-grid');
                            addRow($grid);
                        }
                        }
                    ]
                    },
                    { type: 'button', icon: 'ui-icon-circle-close', label: 'Kết thúc', listeners: [
                        { "click": function (evt, ui) {
                            //xoadialog_mact();
                            change_data_quit_mact();
                        }
                        }
                    ]
                    }
                ]
            },
            scrollModel: {
                autoFit: true
            },
            selectionModel: { type: 'cell', mode: 'single' },
            filterModel: {
             on: true,
             mode: "AND",
             header: true
            }, // lọc dữ liệu trên header
            hoverMode: 'cell',
            editModel: {
                //onBlur: 'validate',
                saveKey: $.ui.keyCode.ENTER
            },
            editor: { type: 'textbox', select: true,  },
            validation: {
                icon: 'ui-icon-info'
            },
            colModel: [//-------------------------------------------Khai báo các cột trong lưới-----------------------
                    { title: "SoTT", dataType: "integer", dataIndx: "sott", editable: false, width: 0, hidden:true },
                    { title: "Mã CT", dataType: "string", dataIndx: "mact", minWidth: 80,sortable: true,
                        validations: [
                            { type: 'minLen', value: 2, msg: "Mã tài khoản phải có 2 ký tự !" },
                            { type: 'maxLen', value: 7, msg: "Mã tài khoản phải có 6 ký tự !" },
                            { type: function (ui) {
                                    var value = ui.value,
                                        _found = false,sott = ui.rowData.sott;
                                    //remote validation
                                    $.ajax({
                                        url: $dir_module_mact+"checkkey.php",
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
                     { title: "Tên CT", minWidth: 200, dataType: "string", dataIndx: "tenct",
                        validations: [
                            { type: 'minLen', value: 1, msg: "Tên tài khoản không được trống !" }
                        ],
                        filter: {
                             type: 'textbox',
                             condition: 'begin',
                             listeners: ['keyup']
                         }
                    },
                    { title: "Mã CT Cha", minWidth: 80, dataType: "string", align: "left", dataIndx: "mactcha",                    
                            validations: [
                            { type: 'minLen', value: 1, msg: "Mã công trình cha không được trống !" },
                            { type: 'maxLen', value: 7, msg: "Mã công trình cha không lớn hơn 6 ký tự !" },
                            { type: function (ui) {
                                    var value = ui.value,
                                        _found = false,sott = ui.rowData.sott;
                                    //remote validation
                                    $.ajax({
                                        url: $dir_module_mact+"checkkeycha.php",
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
                    { title: "Mã KH", minWidth: 100, dataType: "string", dataIndx: "makh",
                         validations: [
                            { type: 'minLen', value: 2, msg: "Mã khách hàng phải có từ 3-11 ký tự !" },
                            { type: 'maxLen', value: 11, msg: "Mã khách hàng phải có từ 3-11 ký tự !" }
                        ],
                        editor: {
        		            type: makh_select
        		        }                        
                    },
                    { title: "Địa chỉ", minWidth: 120, dataType: "string", align: "left", dataIndx: "diachi"},
                    { title: "Số HĐ", minWidth: 100, dataType: "string", align: "left", dataIndx: "so_hd",
                     filter: {
                             type: 'textbox',
                             condition: 'begin',
                             listeners: ['keyup']
                         },
                        validations: [
                            //{ type: 'minLen', value: 6, msg: "Mã tài khoản phải có 6 ký tự !" },
                           // { type: 'maxLen', value: 6, msg: "Mã tài khoản phải có 6 ký tự !" },
                            { type: function (ui) {
                                    var value = ui.value,
                                        _found = false,sott = ui.rowData.sott;
                                    //remote validation
                                    $.ajax({
                                        url: $dir_module_mact+"checksohd.php",
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
                        ]
                    },
                    { title: "Ngày HĐ", minWidth: 120, dataType: "string", align: "left", dataIndx: "ngayhd",
                        render:function( ui ){
                                var $yyyy_mm_dd = ui.rowData.ngayhd;
                                return Format_dd_mm_yyyy($yyyy_mm_dd);
                            },
                        editor: {
        		            type: 'date'
        		        },
                        /*validations: [
                            { type: 'regexp', value: '^[0-9]{2}-[0-9]{2}-[0-9]{4}$', msg: 'Không đúng định dạng dd-mm-yyyy ' }
                        ]*/
                    },
                    { title: "Ngày khởi công", minWidth: 120, dataType: "string", align: "left", dataIndx: "ngay_kc",
                        render:function( ui ){
                            var $yyyy_mm_dd = ui.rowData.ngay_kc;
                            return Format_dd_mm_yyyy($yyyy_mm_dd);
                        },
                        editor: {
        		            type: 'date'
        		        },
                        /*validations: [
                            { type: 'regexp', value: '^[0-9]{2}-[0-9]{2}-[0-9]{4}$', msg: 'Không đúng định dạng dd-mm-yyyy ' }
                        ]*/
                    },
                    { title: "Ngày hoàn thành", minWidth: 120, dataType: "string", align: "left", dataIndx: "ngay_ht",
                        render:function( ui ){
                            var $yyyy_mm_dd = ui.rowData.ngay_ht;
                            return Format_dd_mm_yyyy($yyyy_mm_dd);
                        },
                        editor: {
        		            type: 'date'
        		        },
                        /*validations: [
                            { type: 'regexp', value: '^[0-9]{2}-[0-9]{2}-[0-9]{4}$', msg: 'Không đúng định dạng dd-mm-yyyy ' }
                        ]*/
                    },
                    { title: "Giá trị HĐ", minWidth: 150, dataType: "string", align: "left", dataIndx: "giatri_hd",
                        editor: {
        		            type: formart_num
        		        },
                         validations: [
                            { type: 'maxLen', value: 15, msg: "Giá trị hợp đồng phải nhỏ hơn 15 số !" }
                            ],
                          render:function( ui ){
                                var giatri_hd = ui.rowData.giatri_hd;
                                return FormatNumber(giatri_hd);
                          },
                           filter: { type: 'textbox', condition: "between", listeners: ['keyup'] }
                    },
                    { title: "Cho phí vật liệu", minWidth: 150, dataType: "string", align: "left", dataIndx: "vatlieu",
                        editor: {
        		            type: formart_num
        		        },
                        validations: [
                            { type: 'maxLen', value: 15, msg: "Giá trị vật liệu phải nhỏ hơn 15 số !" },
                            { type: function (ui) {
                                //console.log(ui);
                                    var ngaykc = ui.rowData.ngay_kc,ngayht = ui.rowData.ngay_ht,vatlieu = ui.value,
                                        _found = false;
                                    var mili = diff_date(NgayHienHanh(),ngayht);
                                    var mili1 = diff_date(NgayHienHanh(),ngaykc);
                                    var check =false,mes = "";
                                    if(mili>0 && vatlieu!=""){
                                        check =true;
                                       mes+="Chi phí vật liệu không được phát sinh sau ngày hoàn thành !<br/>";
                                    }
                                    if(mili1!=0 && vatlieu!=""){
                                        check =true;
                                        mes+="Chi phí vật liệu không được phát sinh trước và sau ngày khởi công !<br/>";
                                    }
                                    var isDirty = $grid.pqGrid("isDirty");
                                    var isEdit;
                                    try {
                                    isEdit =ui.rowData.pq_cellcls.vatlieu;
                                    }
                                    catch(err) {
                                            var isEdit="undefined";
                                    }
                                    if(check && isDirty && typeof isEdit!="undefined"){
                                        alert_f("Chú Ý","fa fa-warning","red",mes);
                                    }
                                }
                            }
                        ],
                         render:function( ui ){
                                var vatlieu = ui.rowData.vatlieu;
                                return FormatNumber(vatlieu);
                          } 
                    },
                    { title: "Chi phí nhân công", minWidth: 150, dataType: "string", align: "left", dataIndx: "nhancong",
                        editor: {
        		            type: formart_num
        		        },
                        validations: [
                                { type: 'maxLen', value: 15, msg: "Giá trị nhân công phải nhỏ hơn 15 số !" },
                                { type: function (ui) {
                                    var ngaykc = ui.rowData.ngay_kc,ngayht = ui.rowData.ngay_ht,nhancong = ui.value,
                                        _found = false;
                                    var mili = diff_date(NgayHienHanh(),ngayht);
                                    var mili1 = diff_date(NgayHienHanh(),ngaykc);
                                    var check =false,mes = "";
                                    if(mili>0 && nhancong!=""){
                                        check =true;
                                       mes+="Chi phí nhân công không được phát sinh sau ngày hoàn thành !<br/>";
                                    }
                                    if(mili1!=0 && nhancong!=""){
                                        check =true;
                                        mes+="Chi phí nhân công không được phát sinh trước và sau ngày khởi công !<br/>";
                                    }
                                    var isDirty = $grid.pqGrid("isDirty");
                                    var isEdit;
                                    try {
                                        isEdit =ui.rowData.pq_cellcls.nhancong;
                                    }
                                    catch(err) {
                                        var isEdit="undefined";
                                    }
                                    if(check && isDirty && typeof isEdit!="undefined"){
                                        alert_f("Chú Ý","fa fa-warning","red",mes);
                                    }
                                }
                            }
                        ],
                         render:function( ui ){
                                var nhancong = ui.rowData.nhancong;
                                return FormatNumber(nhancong);
                          }                        
                    },
                    { title: "Chi phí máy", minWidth: 150, dataType: "string", align: "left", dataIndx: "may",
                        editor: {
        		            type: formart_num
        		        },
                        validations: [
                            { type: 'maxLen', value: 15, msg: "Giá trị máy phải nhỏ hơn 15 số !" },
                            { type: function (ui) {
                                    var ngaykc = ui.rowData.ngay_kc,ngayht = ui.rowData.ngay_ht,may = ui.value,
                                        _found = false;
                                    var mili = diff_date(NgayHienHanh(),ngayht);
                                    var mili1 = diff_date(NgayHienHanh(),ngaykc);
                                    var check =false,mes = "";
                                    if(mili>0 && may!=""){
                                        check =true;
                                       mes+="Chi phí máy không được phát sinh sau ngày hoàn thành !<br/>";
                                    }
                                    if(mili1!=0 && may!=""){
                                        check =true;
                                        mes+="Chi phí máy không được phát sinh trước và sau ngày khởi công !<br/>";
                                    }
                                    var isDirty = $grid.pqGrid("isDirty");
                                    var isEdit;
                                    try {
                                        isEdit =ui.rowData.pq_cellcls.may;
                                    }
                                    catch(err) {
                                        var isEdit="undefined";
                                    }
                                    if(check && isDirty && typeof isEdit!="undefined"){
                                        alert_f("Chú Ý","fa fa-warning","red",mes);
                                    }
                                    if(check && isDirty && typeof isEdit!="undefined"){
                                        alert_f("Chú Ý","fa fa-warning","red",mes);
                                    }
                                }
                            }
                        ],
                        render:function( ui ){
                                var may = ui.rowData.may;
                                return FormatNumber(may);
                        } 
                    }
            ],//-----------------------------------------Kết thúc các cột---------------------------------------
            dataModel: {
                dataType: "JSON",
                location: "remote",
                recIndx: "sott",
                url: $dir_module_mact+"list.php",//-- Load danh sách lên lưới
                getData: function (response) {
                    return { data: response.data};
                }
            },
            cellBeforeSave: function (evt, ui) {
                var $grid = $(this);
                var isValid = $grid.pqGrid("isValid", ui);
                if (!isValid.valid) {
                    return false;
                }
            },
            //make rows editable selectively.
            editable: function (ui) {
                var $grid = $(this);
                var rowIndx = ui.rowIndx;
                if ($grid.pqGrid("hasClass", { rowIndx: rowIndx, cls: 'pq-row-edit' }) == true) {
                    return true;
                }
                else {
                    return false;
                }
            }
        };
        var $grid = $("#grid_editing_mact").pqGrid(obj);
        /*$grid.one("pqgridload", function (evt, ui) {
				var column = $grid.pqGrid("getColumn", { dataIndx:"loaitk" });
				var filter = column.filter;
				filter.cache = null;               
				filter.options = $grid.pqGrid("getData", { dataIndx: ["tenloaitk","loaitk"] });// lấy 1 hoặc nhiều dataindex
				$grid.pqGrid("refreshHeader");
			});*/
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
             var arr = $("#grid_editing_mact").pqGrid("selection", {
                 type: 'cell',
                 method: 'getSelection'
             }); //Lấy giá trị đang chọn
             if (arr && arr.length > 0) {
                 return arr;
             } else {
                 return false;
             }
         } 
 //-----------------------------Hết lưới---------------------------------------------------------------------       
            
    });     
</script>    
<div id="dialog-macongtrinh" title="Thông tin công trình (F2: Sửa , F7: Sao chép , F8: Xóa , F9: Lưu , END : Hủy dòng đang sửa)"><!-- dialog -->
  <div id="grid_editing_mact" style="margin:5px auto;border: 0px !important;"></div>
</div>