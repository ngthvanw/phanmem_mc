<?php $LoaiToKhai = $_GET['loaitokhai']; ?>
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
    $width = getWidth()-200;
    $(function() {
        //$('#dialog-thietlap_tokhai_phuluckqkd').find('button').first().focus();
        var $dir_module_baocaothue="";
        $dir_module_baocaothue = "modules/baocaothue/";//--------------------------------------------Thay đổi khi copy
        $dir_module_httk = "modules/httk/";//--------------------------------------------Thay đổi khi copy
        function xoadialog_makh() { // ----------------------đóng form 
            reset_dialog(".dialog-thietlap_tokhai_phuluckqkd");
            reset_dialog(".dialog_main_thietlap_tokhai_phuluc");
        }
        $("#dialog-thietlap_tokhai_phuluckqkd").dialog({ // ------------------Gọi dialog
            resizable: false,
            height: $height,
            width: $width,
            modal: true

        });
     $("#dialog-thietlap_tokhai_phuluckqkd").keydown(function(event) {//--------------Các phím tắt
        var $grid_pb = $("#grid_editing_bangcandoi_ketoan").closest('.pq-grid');//---- Lưới----------------
         if ( event.keyCode == Keys.F7 || event.keyCode == Keys.F8) {
                var rowSelect = getRowSelect();//------ Lấy đối tượng được chọn
                if(rowSelect==false){
                    alert_f("Chú Ý","fa fa-warning","red","Bạn cần chọn dữ liệu trước khi thực hiện !");
                }
            }
        var rowEditting = $( "#grid_editing_bangcandoi_ketoan" ).pqGrid( "getRowsByClass", { cls : 'pq-row-edit' } );//---Lấy đối tượng đang sửa
          if ( $('div').hasClass('jconfirm')==false) {
             if (event.keyCode == Keys.F4) {
                  rowIndex = 0;
                  //addRow(rowIndx,'maso',$grid_pb);
             }
             if (event.keyCode == Keys.F7) { // copy
                if (rowSelect != false){

                   var rowIndx = rowSelect[0].rowIndx;
                   var rowData = rowSelect[0].rowData;
                   //---------------Khai báo các cell khi dùng lệnh copy-----------------------------------------
                   //--------------------------------------------Thay đổi khi copy---------------------------------
                    var _dataRow = {maso : rowData.maso,chitieu :rowData.chitieu,machitieu :rowData.machitieu,sotien :rowData.sotien,machitieucha :rowData.machitieucha};
                    //addRow(rowIndx,'maso',$grid_pb,_dataRow);
                }
             }
             if (event.keyCode == Keys.F8) { // Xóa
                 if (rowSelect != false){
                    if (isEditing($grid_pb)) {
                        return false;
                    }
                    var rowData = rowSelect[0].rowData;
                    //deleteRow(rowData, $grid_pb);
                }
             }
             if (event.keyCode == Keys.ESCAPE && $('div').hasClass('jconfirm')==false&&rowEditting.length<1) {
                 change_data_quit_makh();
             }
        }else{
            return false;
         }
     }); // end phím tắt
     function change_data_quit_makh() { // Cảnh báo thoát khi thay đổi dữ liệu////////////////////////////////////////////////////
        var $grid_pb = $("#grid_editing_bangcandoi_ketoan").closest('.pq-grid');//---- Lưới----------------
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
                                    xoadialog_makh();
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
                        xoadialog_makh();
                    }},
                    "Hủy bỏ":{ keys: ['N'],action: function () {

                                }
                        }
                }
            });
        }
    }


    //----------------------------------------------------Bắt đầu lưới-----------------------------------------
    var httk_select = function (ui) {
            var $cell = ui.$cell,
                rowData = ui.rowData,
                dataIndx = ui.dataIndx,
                cls = ui.cls,width=ui.column.minWidth,
                dc = $.trim(rowData[dataIndx]);
            $cell.css('padding', '0');

            var $inp = $("<input type='text'  name='" + dataIndx + "' class='" + cls + " pq-cell-editor pg-cel-define' readonly />")
            .appendTo($cell)
            .val(dc).keypress(function(){
                 $('.dialog_main_httk').load("form/frm_dm_httk_select.php?idstyle=grid_editing_bangcandoi_ketoan");
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
                var rowData =$obj_addrow;
            }else{
                var rowData = {maso:"",chitieu :"",machitieu :"",sotien :"",machitieucha :""};
			}
			//rowData.makh = $ma;
		   if(typeof rowIndx == 'undefined')
				rowIndx=0;
            $grid.pqGrid("addRow", { rowIndx: rowIndx, rowData: rowData });

            $grid.pqGrid("setSelection", { rowIndx: rowIndx, dataIndx: $name});
            $grid.pqGrid("editFirstCellInRow", { rowIndx: (rowIndx) });
       }
        //----------------------------Hàm xóa dữ kiệu------------------------------------------
        function deleteRow(rowData, $grid) {
            var rowData = rowData;
            var ma = rowData.makh;
            var sott = rowData.sott;
                if($('div').hasClass('jconfirm')==false){
                    $.confirm({
                        title: "Chú ý",icon: "fa fa-times-circle",type: "red",
                        content: "Bạn có muốn xóa hàng có mã "+ (ma)+"  không ?"+'<br/>Nhấn phím <strong style="color:blue;">[Y]</strong> để đồng ý phím <strong style="color:red;">[N]</strong> để hủy bỏ ',
                        buttons: {"Đồng ý": {keys: ['Y'],action: function () {


                                $.ajax($.extend({}, ajaxObj, {
                                    context: $grid,
                                    url: $dir_module_baocaothue+"delcdkt.php",
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

        //---------------------------Cập nhật row-----------------------------------------

        //--------------------------------Khai báo lưới---------------------------------------.
        var objtokhaiphuluc = {
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

                    var obj = rowList[0],
                        rowIndx = obj.rowIndx,
                        newRow = obj.newRow,
                        type = obj.type,
                        rowData = obj.rowData;
                var column = $("#grid_editing_bangcandoi_ketoan").pqGrid( "getData", { dataIndx: ['sotien', 'machitieu','matk','tkno'] } );

					var url="";
					if (type == 'update') {
                        var valid = grid.isValid({ rowData: rowData, allowInvalid: true }).valid;
                        if (valid) {
						if(rowData.mavt==""){
							var timemili = Date.now();
							rowData.mavt=timemili;
						}
                            if (rowData[recIndx] == null) {
                                //url = $dir_module_baocaothue+"add_tokhai_thuetndn.php";
                                url = $dir_module_baocaothue+"edit_sotien_tokhai.php";
                            }
                            else {
                                //url = $dir_module_baocaothue+"edit_tokhai_thuetndn.php";
                                url = $dir_module_baocaothue+"edit_sotien_tokhai.php";
                            }
                        }
                    }
                if (valid) {
                    $.ajax({
                        url: url,
                        data: {string:column},
                        dataType: "json",
                        type: "GET",
                        async: true,
                         success: function (res) {
							$grid.pqGrid("refreshDataAndView");
                        },
                        complete: function () {
                            $grid.pqGrid("refreshDataAndView");
                        }
                    });
               }
            },
colModel: [//-------------------------------------------Khai báo các cột trong lưới-----------------------
                    { title: "SoTT", dataType: "integer", dataIndx: "sott", editable: false, width: 0, hidden:true },
                    { title: "STT", dataType: "string",editable: false, dataIndx: "maso", width: 20,sortable: false,align:"center",
                     },

                     { title: "Chỉ tiêu", width: 300,editable: false, dataType: "string", dataIndx: "chitieu",sortable: false,
                        validations: [
                            { type: 'minLen', value: 1, msg: "Tên tài sản nguồn vônd không được trống !" }
                        ]
                    },
					{ title: "Mã chỉ tiêu",editable: false, dataType: "string", dataIndx: "machitieu", width: 40,sortable: false,align:"center",},
                    { title: "Số tiền", width: 50, dataType: "integer", dataIndx: "sotien",align:"right",
                        render: function (ui) {// Tính toán Tiền thuế và đưa lên lưới
                            //return FormatNumber(ui.rowData.sotien.toString());
                            return $.number(ui.rowData.sotien,0,".",",");
                        },
                        editable: function(ui){
                            var machitieu=ui.rowData.machitieu;

                            if(machitieu=="" || machitieu=="3" ||machitieu=="9" || machitieu=="15" || machitieu=="18" || machitieu=="19" ||machitieu=="B1" || machitieu=="B8" || machitieu=="B12" || machitieu=="B14" || machitieu=="C1" || machitieu=="C4" ||machitieu=="C6" || machitieu=="C10" ||machitieu=="C16" ||machitieu=="D" ||machitieu=="D1" ||machitieu=="E" ||machitieu=="G" ||machitieu=="G1" ||machitieu=="G2" ||machitieu=="G3" ||machitieu=="H" ||machitieu=="I"){
                                return false;
                            }else{
                                return true;
                            }
                        }
                    },
                    { title: "Mã Chỉ tiêu cha",editable: false, width: 30, dataType: "string", align: "center", dataIndx: "machitieucha",sortable: false
                    },
    { title: "TK Nợ", dataType: "string", dataIndx: "tkno", width: 20,sortable: false,
        editable: function(ui){
            var machitieu=ui.rowData.machitieu;

            if(machitieu=="" || machitieu=="3" ||machitieu=="9" || machitieu=="15" || machitieu=="18" || machitieu=="19" ||machitieu=="B1" || machitieu=="B8" || machitieu=="B12" || machitieu=="B14" || machitieu=="C1" || machitieu=="C4" ||machitieu=="C6" || machitieu=="C10" ||machitieu=="C16" ||machitieu=="D" ||machitieu=="D1" ||machitieu=="E" ||machitieu=="G" ||machitieu=="G1" ||machitieu=="G2" ||machitieu=="G3" ||machitieu=="H" ||machitieu=="I"){
                return false;
            }else{
                return true;
            }
        }
    },
    { title: "TK Có", dataType: "string", dataIndx: "matk", width: 20,sortable: false,
        editable: function(ui){
            var machitieu=ui.rowData.machitieu;

            if(machitieu=="" || machitieu=="10" ||machitieu=="20" || machitieu=="30" || machitieu=="40" || machitieu=="50" ||machitieu=="60"){
                return false;
            }else{
                return true;
            }
        }
    },
            ],//-----------------------------------------Kết thúc các cột---------------------------------------
            pageModel: { type: "local", rPP: 200, strRpp: "{0}", strDisplay: "{0} đến {1} của {2}" },
            dataModel: {
                dataType: "JSON",
                location: "remote",
                recIndx: "sott",
                postData: {loaitokhai:"<?php echo $LoaiToKhai; ?>"},
                url: $dir_module_baocaothue+"list_tokhai_thuetndn.php",//-- Load danh sách lên lưới
                getData: function (dataJSON) {
                var data = dataJSON.data;
                return { curPage: dataJSON.curPage, totalRecords: dataJSON.totalRecords, data: data };
            }
		}};
        var $grid = $("#grid_editing_bangcandoi_ketoan").pqGrid(objtokhaiphuluc);

        //use refresh & refreshRow events to display jQueryUI buttons and bind events. 
        function getRowSelect() { // --------------------Lấy dữ liệu theo dòng trên gird----------------------                 
             var arr = $("#grid_editing_bangcandoi_ketoan").pqGrid("selection", {
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
			  isEdit = $("#grid_editing_bangcandoi_ketoan").pqGrid("isDirty"); //Lấy giá trị đang chọn

             return isEdit;
         }

		 setTimeout(function(){
		$("#grid_editing_bangcandoi_ketoan .pq-search-hd-field").focus();
	},100);
 //-----------------------------Hết lưới---------------------------------------------------------------------

    });
</script>
<div id="dialog-thietlap_tokhai_phuluckqkd" title="<?php if($LoaiToKhai=='TNDN') echo 'THIẾT LẬP TỜ KHAI TNDN'; else echo 'THIẾT LẬP PHỤ LỤC XÁC ĐỊNH KQKD';?>"><!-- dialog -->
  <div id="grid_editing_bangcandoi_ketoan" style="margin:5px auto;border: 0px !important;"></div>
</div>