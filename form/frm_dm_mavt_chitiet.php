<?php
$sottpsct = $_GET['sottpsct'];
$loai = $_GET['loai'];
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
	span.saving
{
    display:none;
    font-size:large;
    background:yellow;
    color:Red;
    font-weight:normal;
    margin-left:20px;
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
            reset_dialog(".dialog-mavattu");
            reset_dialog(".dialog_main_mavt");
        }
        $("#dialog-mavattu").dialog({ // ------------------Gọi dialog
            resizable: false,
            height: $height,
            width: $width,
            modal: true

        });
     $("#dialog-mavattu").keydown(function(event) {//--------------Các phím tắt
        var $grid_pb = $("#grid_editing_mavt").closest('.pq-grid');//---- Lưới----------------
         if (event.keyCode == Keys.F7 || event.keyCode == Keys.F8) {
                var rowSelect = getRowSelect();//------ Lấy đối tượng được chọn

                if(rowSelect==false){
                    alert_f("Chú Ý","fa fa-warning","red","Bạn cần chọn dữ liệu trước khi thực hiện !");
                }
            }
        var rowEditting = $( "#grid_editing_mavt" ).pqGrid( "getRowsByClass", { cls : 'pq-row-edit' } );//---Lấy đối tượng đang sửa
          if ( $('div').hasClass('jconfirm')==false) {

             if (event.keyCode == Keys.ESCAPE && $('div').hasClass('jconfirm')==false&&rowEditting.length<1) {
                 change_data_quit_mavattu();
             }
        }else{
            return false;
         } 
     }); // end phím tắt

     function change_data_quit_mavattu() { // Cảnh báo thoát khi thay đổi dữ liệu////////////////////////////////////////////////////
        var $grid_pb = $("#grid_editing_mavt").closest('.pq-grid');//---- Lưới----------------
        var isEditing = rows = $grid_pb.pqGrid("getRowsByClass", { cls: 'pq-row-edit' });
        $isEdit = false;
        if (isEditing.length > 0) {
                $isEdit = true;
        }
        {
            $.confirm({
                title: 'Thông báo',
                content: ' DỮ LIỆU CỦA BẠN ĐÃ THAY ĐỔI .BẠN CÓ MUỐN LƯU DỮ LIỆU NÀY KHÔNG ?<br/>Nhấn phím <strong style="color:blue;">[Y]</strong> để đồng ý phím <strong style="color:red;">[N]</strong> để hủy bỏ ',
                icon: 'fa fa-warning',
                type: 'red',
                buttons: {
                    "Đồng ý": { keys: ['Y'],action: function () {
                            var $grid = $("#grid_editing_mavt");
							var  selarray = $grid.pqGrid('selection', { type: 'row', method: 'getSelection' });
							var ids = [];
							for (var i = 0, len = selarray.length; i < len; i++) {
								var rowData = selarray[i].rowData;
								ids+=rowData.mavt+",";
							}
							$mavattu = ids;
							
                            $.ajax({// Load danh sách mã khách hàng
                                url: $dir_module_mavattu + "update_mavt_pbchiphi.php",
                                async: false,
                                data:{sottpsct:<?php echo $sottpsct; ?>,mavt:$mavattu,loai:'<?php echo $loai; ?>'},
                                success: function (response) {
                                    $ten = response;
                                }
                            });
                        xoadialog_mavattu();
                    }},
                    "Hủy bỏ":{ keys: ['N'],action: function () {
                            xoadialog_mavattu();
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
                 //$('.dialog_main3').load("form/frm_dm_httk_select.php?idstyle=grid_editing_mavt");
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
                    $('.dialog_main_manhomvt').load("form/frm_dm_manhom_select.php?idstyle=grid_editing_mavt");
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
                var rowData = {mavt:"",tenvt:"",mavtcha:"",matk:"",quycach :"",dvt :"",dvtp :"",loaivl:"",kl :"",kt :"",giaban :"",giabansi :"",giamua :"",rate :"",mark :"",congvao :"",trura :"",dp :"",min :"",max :"",muc :"",ghichu :""}; //empty row template
           }
		   rowData.mavt = $ma;
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

                            }}
                        }
                    });
                }
        }
		// Bắt đầu từ đây
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
            selectionModel: { type: 'row' },
            scrollModel: {
                //autoFit: true
            },
            editable: false,
            selectionModel: { type: 'none', subtype:'incr', cbHeader:false, cbAll:true},
            editModel: {
                allowInvalid: false,
                saveKey: $.ui.keyCode.ENTER
            },
            editor: {
                select: true
            },
            toolbar: {
                items: [{
                    type: 'button',
                    label: 'KẾT THÚC',
                    listeners: [{ 'click': function () {
                            change_data_quit_mavattu();
                        }
                    }]
                }
                ]
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
                            //$(".ui-state-highlight").focus();

                             var colM = $("#grid_editing_mavt").pqGrid("option", "colModel");
                             colM[2].editable = false;
                             $("#grid_editing_mavt").pqGrid("option", "colModel", colM);
                        },
                    });
               }
            },
            colModel: [//-------------------------------------------Khai báo các cột trong lưới-----------------------
                { title: "", dataIndx: "chon", width: 5, align: "center", type:'checkBoxSelection', cls: 'ui-state-default', resizable: false, sortable:true},
                { title: "Lưu", dataType: "integer", dataIndx: "sott", editable: false, width: 20, hidden:true,align: "center",
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
                    { type: 'regexp', value: '^[a-zA-Z0-9#@*._\-]{0,20}$', msg: 'Mã không có dấu và không có khoản trắng' },

                        ],
                        filter: {
                             type: 'textbox',
                             condition: 'regexp',
                             listeners: ['keyup']
                         }
                     },
                     { title: "Tên VT", minWidth: 200, dataType: "string", dataIndx: "tenvt",editable: false,
                        validations: [
                            { type: 'minLen', value: 1, msg: "Tên vật tư hàng hóa không được trống !" }
                        ],
                        filter: {
                             type: 'textbox',
                             condition: 'regexp',
                             listeners: ['keyup']
                         }
                    },
                    { title: "Mã nhóm", minWidth: 120, dataType: "string", align: "left", dataIndx: "manhom",editable: false,
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
                        filter: { type: "select",
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
                    title: "Loại NVL", minWidth: 100, dataType: "string", align: "left", dataIndx: "loaivl", editable: true,editable: false,
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
                    { title: "Mã TK", minWidth: 60, dataType:"integer", dataIndx: "matk", align: "center",editable: false,
                         validations: [
                            { type: function (ui) {
                                    var value = ui.value;

                                        if(value!=151 && value!=152 && value!=153 && value!=154 && value!=155 && value!=156 && value!=157 && value!=158 && value!=159 && value!=1561 && value!=1562 && value!=627 && value!=621 && value!=622){
                                            ui.msg ="Mã TK "+ value + " phải nằm trong mã TK từ 151 - 159 !";
                                            return false;
                                        }
                                    }
                                },
                        ]                        
                    },

                    { title: "ĐVT", minWidth: 80, dataType: "string", align: "center", dataIndx: "dvt",editable: false,
                    validations: [
                            { type: 'minLen', value: 1, msg: "Đơn vị tính chính không được trống !" },
                        ]
                    },
                { title: "TS(%)", minWidth: 60, dataType: "string", align: "center", dataIndx: "rate",editable: false,
                    validations: [
                        { type: 'minLen', value: 1, msg: "Thuế xuất không được trống !" },
                        { type: 'maxLen', value: 2, msg: "Thuế xuất không được quá 2 số !" }
                    ],
                    render:function( ui ){
                        var rate = ui.rowData.rate;
                        return rate+"%";
                    }
                },
                {
                    title: "CP mua hàng", minWidth: 70, dataType: "string", align: "center", dataIndx: "pbchiphi",editable: false,
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
                        condition: 'regexp',
                        prepend: { '': '--Tất cả--','1':'CÓ','0':'KHÔNG'},
                        valueIndx: "pbchiphi",
                        labelIndx: "pbchiphi",
                        listeners: ['change']
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
                    { title: "Giá bán", minWidth: 120, dataType: "string", align: "right", dataIndx: "giaban",editable: false,
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
                    { title: "Giá bán sỉ", minWidth: 120, dataType: "string", align: "right", dataIndx: "giabansi",hidden:true,
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
                    { title: "Giá vốn", minWidth: 120, dataType: "string", align: "right", dataIndx: "giamua",hidden:true,editable: false,
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
                    { title: "CK(%)", minWidth: 60, dataType: "string", dataIndx: "dp",align: "center",editable: false,
                        validations: [
                            { type: 'maxLen', value: 2, msg: "Chiết khấu phải nhỏ hơn 2 số !" }
                        ],
                        render:function( ui ){
                                var dp = ui.rowData.dp;
                                return dp+"%";
                          } 
                    },
                    { title: "Hạn mức TK nhỏ nhất", minWidth: 100, dataType: "string", align: "right", dataIndx: "min",hidden:false,editable: false,
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
                    { title: "Hạn mức TK lớn nhất", minWidth: 100, dataType: "string", align: "right", dataIndx: "max",hidden:false,editable: false,
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
                    { title: "Chú thích", minWidth: 150, dataType: "string", align: "left", dataIndx: "ghichu",editable: false,
                        editor: { type: "textarea", attr: "rows=3" }
                    }
            ],//,
            pageModel: { type: "local", rPP: 300, strRpp: "{0}", strDisplay: "{0} đến {1} của {2}" },
            dataModel: {
                dataType: "JSON",
                location: "local",
                recIndx: "sott",
                /*url: $dir_module_mavattu+"list_chitiet.php?sottpsct=",//-- Load danh sách lên lưới
                getData: function (dataJSON) {
                    var data = dataJSON.data;
                    return {data: data};
                }*/
		}};

        var $grid = $("#grid_editing_mavt").pqGrid(objmavt);

        $grid.pqGrid("showLoading");
        $.ajax({
            url: $dir_module_mavattu+"list_chitiet.php?loai=<?php echo $loai; ?>&sottpsct=<?php echo $sottpsct; ?>",//-- Load danh sách lên lưới
            cache: false,
            async: true,
            dataType: "JSON",
            success: function (response) {
                var grid = $grid.pqGrid("getInstance").grid;
                grid.option("dataModel.data", response.data);

                var column = grid.getColumn({ dataIndx: "manhom" });
                var filter = column.filter;
                filter.cache = null;
                filter.options = grid.getData({ dataIndx: ["tennhom", "manhom"] });

                grid.refreshDataAndView();
                grid.hideLoading();
            }
        });

        $select_arr = [];
        $grid.on("pqgridrowselect", function (event, ui) {
            $mavt = ui.rowData.mavt;
            $mavatu = $("#mavattu").val();
            if ($mavatu == "") {
                $mavattu_arr = new Array();
            } else {
                $mavattu_arr = $mavatu.split(",");
            }

            if (parseInt($mavattu_arr.indexOf($mavt)) == -1)
                $mavattu_arr.push($mavt);

            $mavattu_str = $mavattu_arr.toString();
            $("#mavattu").val($mavattu_str);

        });
        $grid.on("pqgridrowunselect", function (event, ui) {
            if (typeof ui.rows != "undefined")
                ui.rows[0].rowData.mavt
            if (typeof ui.rowData != "undefined")
                $mavt = ui.rowData.mavt;

            $mavatu = $("#mavattu").val();
            $mavattu_arr = $mavatu.split(",");
            if (parseInt($mavattu_arr.indexOf($mavt)) != -1) {
                $vitri = parseInt($mavattu_arr.indexOf($mavt))
                $mavattu_arr.splice($vitri, 1);
            }
            $mavattu_str = $mavattu_arr.toString();
            $("#mavattu").val($mavattu_str);
        });
		
		// Kết thúc tại đây
        //use refresh & refreshRow events to display jQueryUI buttons and bind events.
        function getRowSelect() { // --------------------Lấy dữ liệu theo dòng trên gird----------------------                 
             var arr = $("#grid_editing_mavt").pqGrid("selection", {
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
			  isEdit = $("#grid_editing_mavt").pqGrid("isDirty"); //Lấy giá trị đang chọn
             
             return isEdit;
         }
	$str_mavt = "";
        $.ajax({
            url: $dir_module_mavattu + "get_mavt_pbchiphi.php",//-- Load danh sách lên lưới
            dataType: "text",
            async:false,
            data:{sottpsct:<?php echo $sottpsct; ?>,loai:'<?php echo $loai; ?>'},
            success: function (response) {
                $str_mavt = response.trim();
            }
        });
        $("#mavattu").val($str_mavt);
		 
		 setTimeout(function(){
		$("#grid_editing_mavt .pq-search-hd-field").focus();
	},100);
 //-----------------------------Hết lưới---------------------------------------------------------------------       
            
    });     
</script>    
<div id="dialog-mavattu" title="CHỌN VẬT TƯ,HÀNG HÓA CẦN PHÂN BỔ CHI PHÍ MUA HÀNG"><!-- dialog -->
    <input type="hidden" id="mavattu"/>
  <div id="grid_editing_mavt" style="margin:5px auto;border: 1px !important;"></div>
</div>