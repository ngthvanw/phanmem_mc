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
        $dir_module_httk_select = "modules/httkselect/";//--------------------------------------------Thay đổi khi copy
        function xoadialog_httk_select() { // ----------------------đóng form 
            reset_dialog(".dialog-httk_mavt_select");
            reset_dialog(".dialog_main_httk");
        }
        $("#dialog-httk_mavt_select").dialog({ // ------------------Gọi dialog 
            resizable: false,
            height: $height,
            width: $width,
            modal: true

        });
     $("#dialog-httk_mavt_select").keydown(function(event) {//--------------Các phím tắt
        var $grid_pb = $("#grid_editing_httk_mavt_select").closest('.pq-grid');//---- Lưới----------------
         if (event.keyCode == Keys.ENTER) {
                var rowSelect = getRowSelect();//------ Lấy đối tượng được chọn
                if(rowSelect==false){
                    alert_f("Chú Ý","fa fa-warning","red","Bạn cần chọn dữ liệu trước khi thực hiện !");
                }
            }
        var rowEditting = $( "#grid_editing_httk_mavt_select" ).pqGrid( "getRowsByClass", { cls : 'pq-row-edit' } );//---Lấy đối tượng đang sửa
          if ( $('div').hasClass('jconfirm')==false) {
            
             if (event.keyCode == Keys.ENTER) {
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
        var $grid_pb = $("#grid_editing_httk_mavt_select").closest('.pq-grid');//---- Lưới----------------
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
        function addRow($grid,$obj_addrow="") {
            if (isEditing($grid)) {
                return false;
            }
            //append empty row in the first row.     
            if($obj_addrow!="")
                var rowData =$obj_addrow;
            else                      
               var rowData = {matk : "",tentk :"",matkcha :"",loaitk :"",nhomtk :"",mats :"",mangv :"",ghichu :"",tenloaitk :""};
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
                                var ma = rowData.matk;
                
                                $.ajax($.extend({}, ajaxObj, {
                                    context: $grid,
                                    url: $dir_module_httk_select+"del.php",
                                    data: { id: sott,ma:ma },
                                    success: function (result) {
                                        if(result.result=="fail"){
                                            alert("Mã tài khoản này đang được sử dụng !");
                                            this.pqGrid("refreshDataAndView"); 
                                        }else{
                                            this.pqGrid("commit");
                                            this.pqGrid("refreshDataAndView"); 
                                        }
                                             

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
                    url = $dir_module_httk_select+"add.php";
                }
                else {
                    //url to  update records.
                     url = $dir_module_httk_select+"edit.php";
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
            freezeCols: 4,
            sorting: 'local',
            sortIndx: 'matk',
            sortDir: 'up',
            //flexHeight: true,
            title:null,
            height:$height-58,
            width:$width-14,
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
            editor: { type: 'textbox', select: true, style: 'outline:none;' },
            validation: {
                icon: 'ui-icon-info'
            },
            colModel: [//-------------------------------------------Khai báo các cột trong lưới-----------------------
                    { title: "SoTT", dataType: "integer", dataIndx: "sott", editable: false, width: 0, hidden:true },
                    { title: "Mã TK", dataType: "integer", dataIndx: "matk", minWidth: 80,sortable: true,
                        validations: [
                            { type: 'minLen', value: 3, msg: "Mã tài khoản phải có 3 đến 10 ký tự !" },
                            { type: 'maxLen', value: 10, msg: "Mã tài khoản phải có 3 đến 10 ký tự !" },
                            { type: function (ui) {
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
                        ],
                        filter: {
                             type: 'textbox',
                             condition: 'begin',
                             listeners: ['keyup']
                         }
                     },
                    { title: "Tên TK", minWidth: 200, dataType: "string", dataIndx: "tentk",
                        validations: [
                            { type: 'minLen', value: 1, msg: "Tên tài khoản không được trống !" }
                        ]
                    },
                    { title: "Mã TK cha", minWidth: 60, dataType: "integer", align: "left", dataIndx: "matkcha",                    
                            validations: [
                            { type: 'minLen', value: 1, msg: "Mã tài khoản cha không được trống !" },
                            { type: function (ui) {
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
                        ]
                    },
                    { title: "Loại TK", minWidth: 120, dataType: "string", align: "left", dataIndx: "loaitk",render:function( ui ){return ui.rowData.tenloaitk},
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
                postData: function(ui){
                    return {matktu:151, matkden:159};
                },
                url: $dir_module_httk_select+"list_mavt_select.php",//-- Load danh sách lên lưới
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
        var $grid = $("#grid_editing_httk_mavt_select").pqGrid(obj);
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
             var arr = $("#grid_editing_httk_mavt_select").pqGrid("selection", {
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
<div id="dialog-httk_mavt_select" title="Chọn mã tài khoản (Enter: Để chọn mã TK )"><!-- dialog -->
  <div id="grid_editing_httk_mavt_select" style="margin:5px auto;border: 0px !important;"></div>
</div>