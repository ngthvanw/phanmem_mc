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
    $width = getWidth()-50;
    $(function() {
        var $dir_module_mavattu="";
        $dir_module_mavattu = "modules/mavattu/";//--------------------------------------------Thay đổi khi copy
        $dir_module_manhom = "modules/manhomvattu/";//
        function xoadialog_mavattu() { // ----------------------đóng form 
            reset_dialog(".dialog-mavattu_select_tk");
            reset_dialog(".dialog_main_mavt_select_tk");
        }
        $("#dialog-mavattu_select_tk").dialog({ // ------------------Gọi dialog
            resizable: false,
            height: $height,
            width: $width,
            modal: true

        });
     $("#dialog-mavattu_select_tk").keydown(function(event) {//--------------Các phím tắt
        var $grid_pb = $("#grid_editing_mavt_select").closest('.pq-grid');//---- Lưới----------------
         if (event.keyCode == Keys.F7 || event.keyCode == Keys.F8 || event.keyCode == Keys.ENTER) {
                var rowSelect = getRowSelect();//------ Lấy đối tượng được chọn
                if(rowSelect==false){
                    alert_f("Chú Ý","fa fa-warning","red","Bạn cần chọn dữ liệu trước khi thực hiện !");
                }
            }
        var rowEditting = $( "#grid_editing_mavt_select" ).pqGrid( "getRowsByClass", { cls : 'pq-row-edit' } );//---Lấy đối tượng đang sửa
          if ( $('div').hasClass('jconfirm')==false) {
              if (event.keyCode == Keys.F4) {

                  var rowSelect = getRowSelect();
                  if(rowSelect==false){
                      rowIndx = 0;
                  }else{
                      var rowIndx = rowSelect[0].rowIndx+1;
                  }
                  var colM=$( "#grid_editing_mavt_select" ).pqGrid( "option" , "colModel" );
                  colM[2].editable = true;
                  $( "#grid_editing_mavt_select" ).pqGrid( "option", "colModel", colM);

                  addRow(rowIndx,'mavt',$grid_pb);
              }
              if (event.keyCode == Keys.F7) { // copy
                  if (rowSelect != false){

                      var rowIndx = rowSelect[0].rowIndx;
                      var rowData = rowSelect[0].rowData;
                      var colM=$( "#grid_editing_mavt_select" ).pqGrid( "option" , "colModel" );
                      colM[2].editable = true;
                      $( "#grid_editing_mavt_select" ).pqGrid( "option", "colModel", colM);
                      //---------------Khai báo các cell khi dùng lệnh copy-----------------------------------------
                      //--------------------------------------------Thay đổi khi copy---------------------------------
                      var _dataRow = {mavt : rowData.mavt,tenvt :rowData.tenvt,manhom :rowData.manhom,loaivl:"",matk :rowData.matk,tkdoanhthu :rowData.tkdoanhthu,quycach :rowData.quycach,dvt :rowData.dvt,dvtp :rowData.dvtp,kl :rowData.kl,kt :rowData.kt,giaban :rowData.giaban,giabansi :rowData.giabansi,giamua :rowData.giamua,rate :rowData.rate,mark :rowData.mark,congvao :rowData.congvao,trura :rowData.trura,dp :rowData.dp,min :rowData.min,max :rowData.max,muc :rowData.muc,ghichu :rowData.ghichu};
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

             if ((event.keyCode == Keys.ESCAPE||event.keyCode == Keys.INSERT) && $('div').hasClass('jconfirm')==false&&rowEditting.length<1) {
                 $.confirm({
                     title: 'Cập nhật tồn kho hiện tại thành công !',
                     type: 'green',
                     autoClose: 'OK|1000',
                     content: 'url:themsltk_hientai_khinhapmavt.php',
                     contentLoaded: function (data, status, xhr) {
                     },
                     buttons: {
                         "OK": {
                             keys: ['Y'], action: function () {
                                 $("#grid_editing_nhapchitiet_nhapkho").pqGrid("refreshDataAndView");
                                 $("#grid_editing_nhapchitiet_nhapkho").one("pqgridload", function (evt, ui) {
                                     $("#grid_editing_nhapchitiet_nhapkho .pq-search-txt").focus();
                                 });
                                 xoadialog_mavattu();
                             }
                         }
                     }
                 });
             }
        }else{
            return false;
         } 
     }); // end phím tắt

     function change_data_quit_mavattu() { // Cảnh báo thoát khi thay đổi dữ liệu////////////////////////////////////////////////////
        var $grid_pb = $("#grid_editing_mavt_select").closest('.pq-grid');//---- Lưới----------------
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
                                    xoadialog_mavattu();
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
                        xoadialog_mavattu();
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
                 //$('.dialog_main3').load("form/frm_dm_httk_select.php?idstyle=grid_editing_mavt_select");
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
                    $('.dialog_main_manhomvt').load("form/frm_dm_manhom_select.php?idstyle=grid_editing_mavt_select");
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
			$ma="";
			$.ajax({
				url: $dir_module_mavattu+"taoma.php",
				async: false,
				success: function (response) {
					$ma = response;
				}
			});
            if($obj_addrow!=""){
                var rowData =$obj_addrow;
            }else{
                var rowData = {mavt:"",tenvt:"",mavtcha:"",matk:"",quycach :"",loaivl:"",dvt :"",dvtp :"",kl :"",kt :"",giaban :"",giabansi :"",giamua :"",rate :"",mark :"",congvao :"",trura :"",dp :"",min :"",max :"",muc :"",ghichu :""}; //empty row template
            }
			rowData.mavt = $ma;
			if(typeof rowIndx == 'undefined')
				rowIndx=0;
			$grid.pqGrid("setSelection", { rowIndx: rowIndx, dataIndx: $name});
            $grid.pqGrid("addRow", { rowIndx: rowIndx, rowData: rowData });
$grid.pqGrid( "addClass", {rowIndx: rowIndx, cls: 'rownotsave'} );
          
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
                            url: $dir_module_mavattu+"del.php",
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
        //--------------------------------Khai báo lưới---------------------------------------.
        var objmavt = {
            hwrap: true,
            resizable: true,
            rowBorders: true,
            height:$height-58,
            width:$width-20,
            virtualX: false,
            virtualY: false,
            freezeCols:4,
            numberCell: { show: true },
            filterModel: { on: true, mode: "AND", header: true },
            trackModel: { on: true }, //to turn on the track changes.
            scrollModel: {
                //autoFit: true
            },
            historyModel: {
                checkEditableAdd: true
            },
            editModel: {
                allowInvalid: true,
                saveKey: $.ui.keyCode.ENTER
            },
            editor: {
                select: true
            },
            //pageModel: { type: "local", rPP: 50 },
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
                            url = $dir_module_mavattu+"add.php";
                        }
                        else {
                            url = $dir_module_mavattu+"edit.php";
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
                            $grid.pqGrid( "removeClass", {rowIndx: rowIndx, cls: 'rownotsave'} );

                            var colM = $("#grid_editing_mavt").pqGrid("option", "colModel");
                            colM[2].editable = false;
                            $("#grid_editing_mavt").pqGrid("option", "colModel", colM);
                        },
                    });
                }
            },
            colModel: [//-------------------------------------------Khai báo các cột trong lưới-----------------------
                { title: "Lưu", dataType: "integer", dataIndx: "sott", editable: false, width: 15, hidden:false,align: "center",
                    render: function (ui) {
                        var $val  = ui.rowData.sott;
                        if($val==0 || $val=="" || typeof $val == 'undefined'){
                            return "<img src='icon/uncheck.png' width='20px'/>";
                        } else {
                            return "<img src='icon/check.png' width='20px' />";
                        }
                    },},
                { title: "STT", dataType: "string", dataIndx: "STT", editable: false, width:10, hidden:true,align: "center" },
                { title: "Mã VT", dataType: "string", dataIndx: "mavt", minWidth: 110,sortable: true,editable:false,

                    validations: [
                        { type: function (ui) {
                            isEdit = isEditCell();
                            if(isEdit){
                                var value = ui.value,
                                    _found = false,sott = ui.rowData.sott;
                                $.ajax({
                                    url: $dir_module_mavattu+"checkkey.php",
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
                        },
                        { type: 'regexp', value: '^[0-9a-zA-Z_.-]{0,20}$', msg: 'Mã không có dấu và không có khoản trắng' },
                        { type: 'minLen', value: 1, msg: "Mã vật tư hàng hóa không được trống !" }

                    ],
                    filter: {
                        type: 'textbox',
                        condition: 'begin',
                        listeners: ['keyup']
                    }
                },
                { title: "Tên VT", minWidth: 200, dataType: "string", dataIndx: "tenvt",
                    validations: [
                        {type: 'minLen', value: 1, msg: "Tên vật tư không được trống !"},
                        {type: 'maxLen', value: 500, msg: "Tên vật tư không được vượt quá 500 ký tự !"}
                    ],
                    filter: {
                        type: 'textbox',
                        condition: 'against',
                        listeners: ['keyup']
                    },
                    editor: {type: "textarea", attr: "rows=3"}
                },
                { title: "Mã VT tham chiếu", dataType: "string", dataIndx: "mavttt", minWidth: 110,sortable: true,editable:true,

                    validations: [
                        { type: 'regexp', value: '^[0-9a-zA-Z_.-]{0,20}$', msg: 'Mã không có dấu và không có khoản trắng' },

                    ],
                    filter: {
                        type: 'textbox',
                        condition: 'begin',
                        listeners: ['keyup']
                    }
                },
                { title: "Mã nhóm", minWidth: 120, dataType: "string", align: "left", dataIndx: "manhom",
                    validations: [
                        { type: 'minLen', value: 1, msg: "Mã nhóm không được trống !" },
                    ],
                    editor: {
                        type: "select", options: function (ui) {
                            //remote validation
                            var parsedJson = "";
                            $.ajax({
                                url: $dir_module_manhom + "cb_manhomvt.php",
                                data: {},
                                async: false,
                                success: function (response) {
                                    parsedJson = $.parseJSON(response);
                                }
                            });
                            return parsedJson;
                        }
                    },
                    filter: {
                        type: "select",
                        condition: 'equal',
                        prepend: { '': '--Tất cả--' },
                        valueIndx: "manhom",
                        labelIndx: "tennhom",
                        listeners: ['change']
                    },
                    render:function( ui ){

                        var tennhom = ui.rowData.tennhom;
                        return tennhom;
                    }
                },
                {
                    title: "Loại NVL", minWidth: 100, dataType: "string", align: "left", dataIndx: "loaivl", editable: true,
                    editor: {type: "select",options: function (ui) {
                        var parsedJson = [ { "":"Nguyên vật liệu"}, {"NC": "Nhân công"}, {"SXC": "CP Sản xuất chung"}, {"CM": "Ca máy"}] ;
                        return parsedJson;
                    }},
                    render: function (ui) {{
                        var parsedJson = [ { "id":"","name":"Nguyên vật liệu"}, {"id":"NC","name":"Nhân công"}, {"id":"SXC","name":"CP Sản xuất chung"}, {"id":"CM","name":"Ca máy"}] ;
                        var value = ui.rowData.loaivl;
                        $tenloai="";
                        $.each(parsedJson, function(key, item) {
                            if(item.id==value){
                                $tenloai =item.name;
                            }
                        });


                        return $tenloai;
                    }
                    }
                },
                { title: "Tên nhóm", minWidth: 80, dataType: "string", align: "left", hidden:true, dataIndx: "tennhom"},
                { title: "Mã TK", minWidth: 60, dataType:"integer", dataIndx: "matk", align: "center",
                    validations: [
                        { type: function (ui) {
                                var value = ui.value.toString();
                                var manhom = ui.rowData.manhom;
                                if(manhom!='1200') {
                                    if (value.substr(0,2)!=15) {
                                        ui.msg = "Mã TK " + value + " phải nằm trong mã TK từ 151 - 159 !";
                                        return false;
                                    }
                                }
                            }
                        },
                    ],
					filter: {
                        type: 'textbox',
                        condition: 'begin',
                        listeners: ['keyup']
                    }
                },
                { title: "TK doanh thu", minWidth: 60, dataType:"integer", dataIndx: "tkdoanhthu", align: "center",
                    validations: [
                        { type: function (ui) {
                                var value = ui.value.toString();
                                if(value.substr(0,3)!=511 && value.substr(0,3)!=711){
                                    ui.msg ="Mã TK "+ value + " không phải tài khoản doanh thu !";
                                    return false;
                                }
                            }
                        },
                    ],
					filter: {
                        type: 'textbox',
                        condition: 'begin',
                        listeners: ['keyup']
                    }
                },

                { title: "Quy cách", minWidth: 80, dataType: "string", align: "left", dataIndx: "quycach"},
                { title: "ĐVT", minWidth: 80, dataType: "string", align: "center", dataIndx: "dvt",
                    validations: [
                        { type: 'minLen', value: 1, msg: "Đơn vị tính chính không được trống !" },
                    ]
                },
                {
                    title: "TS(%)",
                    width: 60,
                    dataType: "string",
                    align: "right",
                    dataIndx: "rate",
                    filter: {
                        type: 'textbox',
                        condition: 'begin',
                        listeners: ['keyup']
                    },
                    validations: [
                        { type: 'minLen', value: 1, msg: "Thuế suất không được trống !" },
                    ],
                    editor: {
                        type: "select", options: function (ui) {
                            //remote validation
                            var parsedJson = "";
                            $.ajax({
                                url: $dir_module_mavattu + "cb_thuesuat.php",
                                data: {},
                                async: false,
                                success: function (response) {
                                    parsedJson = $.parseJSON(response);
                                }
                            });
                            return parsedJson;
                        }
                    },
                    render:function( ui ){
                        var rate = ui.rowData.rate;
                        return rate+"%";
                    }
                },
                {
                    title: "CP mua hàng", minWidth: 70, dataType: "string", align: "center", dataIndx: "pbchiphi",
                    editor: {type: "select", options: [{"0": "KHÔNG"}, {"1": "CÓ"}]},
                    render: function (ui) {
                        var $value = ui.rowData.pbchiphi;
                        if ($value == 0) {
                            return "KHÔNG";
                        } else {
                            return "CÓ";
                        }
                    },
                    filter: { type: "select",
                        condition: 'equal',
                        prepend: { '': '--Tất cả--','1':'CÓ','0':'KHÔNG'},
                        valueIndx: "pbchiphi",
                        labelIndx: "pbchiphi",
                        listeners: ['change']
                    }
                },
                { title: "ĐVT phụ", minWidth: 80, dataType: "string", align: "center", dataIndx: "dvtp"},
                { title: "Hệ số", minWidth: 90, dataType: "string", align: "right", dataIndx: "heso",hidden:false,
                    editor: {
                        type: formart_num
                    },
                    render:function( ui ){
                        var val = ui.rowData.heso;
                        return FormatNumber(val);
                    }
                },
                { title: "khối lượng", minWidth: 120, dataType: "string", align: "left", dataIndx: "kl",hidden:true,
                    editor: {
                        type: formart_num
                    },
                    validations: [
                        { type: 'maxLen', value: 9, msg: "khối lượng phải nhỏ hơn 10 số !" }
                    ],
                    render:function( ui ){
                        var kl = ui.rowData.kl;
                        return FormatNumber(kl);
                    }
                },
                { title: "kt", minWidth: 120, dataType: "string", align: "left", dataIndx: "kt",hidden:true,
                    editor: {
                        type: formart_num
                    },
                    validations: [
                        { type: 'maxLen', value: 9, msg: "Giá trị hợp đồng phải nhỏ hơn 10 số !" }
                    ],
                    render:function( ui ){
                        var kt = ui.rowData.kt;
                        return FormatNumber(kt);
                    }
                },
                { title: "Giá vốn", minWidth: 120, dataType: "string", align: "right", dataIndx: "giamua",
                    editor: {
                        type: formart_num
                    },
                    validations: [
                        { type: 'maxLen', value: 16, msg: "Giá mua phải nhỏ hơn 17 số !" },
                    ],
                    render:function( ui ){
                        var giamua = ui.rowData.giamua;
                        return FormatNumber(giamua);
                    }
                },
                { title: "Giá bán", minWidth: 120, dataType: "string", align: "right", dataIndx: "giaban",
                    editor: {
                        type: formart_num
                    },
                    validations: [
                        { type: 'maxLen', value: 16, msg: "Giá bán phải nhỏ hơn 17 số !" }
                    ],
                    render:function( ui ){
                        var giaban = ui.rowData.giaban;
                        return FormatNumber(giaban);
                    },
                    //filter: { type: 'textbox', condition: "between", listeners: ['keyup'] }
                },
                { title: "Giá bán sỉ", minWidth: 120, dataType: "string", align: "right", dataIndx: "giabansi",
                    editor: {
                        type: formart_num
                    },
                    validations: [
                        { type: 'maxLen', value: 16, msg: "Giá bán sỉ phải nhỏ hơn 17 số !" },
                    ],
                    render:function( ui ){
                        var giabansi = ui.rowData.giabansi;
                        return FormatNumber(giabansi);
                    }
                },

                { title: "Mark", minWidth: 60, dataType: "string", align: "left", dataIndx: "mark",hidden:true,
                    validations: [
                        { type: 'maxLen', value: 1, msg: "Mark không được lớn hơn 1 ký tự !" },
                    ]
                },
                { title: "Cộng vào giá", minWidth: 150, dataType: "string", align: "left", dataIndx: "congvao",hidden:true,
                    editor: {
                        type: formart_num
                    },
                    validations: [
                        { type: 'maxLen', value: 16, msg: "Giá cộng vào phải nhỏ hơn 17 số !" },
                    ],
                    render:function( ui ){
                        var congvao = ui.rowData.congvao;
                        return FormatNumber(congvao);
                    }
                },
                { title: "Trừ ra giá", minWidth: 150, dataType: "string", align: "left", dataIndx: "trura",hidden:true,
                    editor: {
                        type: formart_num
                    },
                    validations: [
                        //{ type: 'maxLen', value: 16, msg: "Giá trừ ra vào phải nhỏ hơn 17 số !" },
                    ],
                    render:function( ui ){
                        var trura = ui.rowData.trura;
                        return FormatNumber(trura);
                    }
                },
                { title: "CK(%)", minWidth: 60, dataType: "string", dataIndx: "dp",align: "center",
                    validations: [
                        { type: 'maxLen', value: 2, msg: "Chiết khấu phải nhỏ hơn 2 số !" }
                    ],
                    render:function( ui ){
                        var dp = ui.rowData.dp;
                        return dp+"%";
                    }
                },
                { title: "Hạn mức TK nhỏ nhất", minWidth: 100, dataType: "string", align: "right", dataIndx: "min",hidden:false,
                    editor: {
                        type: formart_num
                    },
                    validations: [
                        { type: 'maxLen', value: 10, msg: "Hạn mức tồn kho nhỏ nhất phải nhỏ hơn 11 số !" }
                    ],
                    render:function( ui ){
                        var min = ui.rowData.min;
                        return FormatNumber(min);
                    }
                },
                { title: "Hạn mức TK lớn nhất", minWidth: 100, dataType: "string", align: "right", dataIndx: "max",hidden:false,
                    editor: {
                        type: formart_num
                    },
                    validations: [
                        { type: 'maxLen', value: 10, msg: "Hạn mức tồn kho lớn nhất phải nhỏ hơn 11 số !" },
                    ],
                    render:function( ui ){
                        var max = ui.rowData.max;
                        return FormatNumber(max);
                    }
                },
                { title: "Mức", minWidth: 150, dataType: "string", align: "left", dataIndx: "muc",hidden:true,
                    editor: {
                        type: formart_num
                    },
                    validations: [
                        { type: 'maxLen', value: 16, msg: "muc phải nhỏ hơn 17 số !" },
                    ],
                    render:function( ui ){
                        var muc = ui.rowData.muc;
                        return FormatNumber(muc);
                    }
                },
                { title: "Chú thích", minWidth: 150, dataType: "string", align: "left", dataIndx: "ghichu",
                    editor: { type: "textarea", attr: "rows=3" }
                }
            ],//,
            pageModel: {type: "remote", rPP: 200},
            dataModel: {
                dataType: "JSON",
                location: "remote",
                recIndx: "sott",
                url: $dir_module_mavattu+"list.php",//-- Load danh sách lên lưới
                getData: function (dataJSON) {
                    var data = dataJSON.data;
                    return {curPage: dataJSON.curPage, totalRecords: dataJSON.totalRecords, data: data};
                }
            }};
        var $grid = $("#grid_editing_mavt_select").pqGrid(objmavt);
        $grid.one("pqgridload", function (evt, ui) {
            try {
                var column = $grid.pqGrid("getColumn", {dataIndx: "manhom"});
                var filter = column.filter;
                filter.cache = null;
                filter.options = $grid.pqGrid("getData", {dataIndx: ["tennhom", "manhom"]});// lấy 1 hoặc nhiều dataindex
                $("#grid_editing_mavt_select .pq-search-hd-field[name='tenvt']").focus();
            }catch (err){
                $("#grid_editing_mavt_select .pq-search-hd-field[name='tenvt']").focus();
            }
				$grid.pqGrid("refreshHeader");
            $("#grid_editing_mavt_select .pq-search-hd-field[name='tenvt'").focus();
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
             var arr = $("#grid_editing_mavt_select").pqGrid("selection", {
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
			  isEdit = $("#grid_editing_mavt_select").pqGrid("isDirty"); //Lấy giá trị đang chọn
             
             return isEdit;
         }
 //-----------------------------Hết lưới---------------------------------------------------------------------
    });     
</script>    
<div id="dialog-mavattu_select_tk" title="Danh mục vật tư, hàng hóa... (k: hàng hóa không chịu thuế) (ESC : Thoát)"><!-- dialog -->
  <div id="grid_editing_mavt_select" style="margin:5px auto;border: 0px !important;"></div>
</div>