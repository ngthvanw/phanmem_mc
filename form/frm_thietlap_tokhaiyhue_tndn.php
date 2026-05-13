<?php
require("../config.php");
$LoaiToKhai = $_GET['loaitokhai'];
$tungay = $_GET['tungay'];
$denngay = $_GET['denngay'];
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
    div.pq-grid tr td.disabled{
        text-shadow: 0 1px 0 #fff;
        background:#ddd;
    }

    .ui-tabs .ui-tabs-panel {
        padding: 0 !important;
    }
    div.pq-grid tr td.disabled{
        text-shadow: 0 1px 0 #fff;
        background:#ddd;
    }
    #kemteptinuudai{
        height: 100%;
    }
    fieldset {
        padding: 1px;
        padding-top: 0px;
        border: 1px solid #09F;
        margin-top: 0px;
    }
</style>
<script>
    $height = getHeight();
    $width = getWidth()-200;
    $( "#tabs" ).tabs();
    $(function() {
        //$('#dialog-thietlap_tokhai_thuetndn').find('button').first().focus();
        var $dir_module_baocaothue="";
        $dir_module_baocaothue = "modules/baocaothue/";//--------------------------------------------Thay đổi khi copy
        $dir_module_saoluu = "modules/saoluu/"; ////////////////Khai báo đường dẫn vào mudole-----------------------------
        $dir_module_httk = "modules/httk/";//--------------------------------------------Thay đổi khi copy
        $dir_module_ketoantonghop = "modules/ketoantonghop/";
        function xoadialog_makh() { // ----------------------đóng form 
            reset_dialog(".dialog-thietlap_tokhai_thuetndn");
            reset_dialog(".dialog_main_thietlap_tokhai_thuetndn");
        }
        $("#dialog-thietlap_tokhai_thuetndn").dialog({ // ------------------Gọi dialog
            resizable: false,
            height: $height,
            width: $width,
            modal: true

        });
     $("#dialog-thietlap_tokhai_thuetndn").keydown(function(event) {//--------------Các phím tắt
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
                            $.confirm({
                                title: 'Thực thi bảng cân đối tài khoản thành công',
                                type: 'green',
                                autoClose: 'OK|1000',
                                content: function(){
                                    var self = this;
                                    return $.ajax({
                                        url: $dir_module_ketoantonghop + "laythongtininphieu_candoi_tk.php",
                                        dataType: 'json',
                                        method: 'get',
                                        data: {
                                            tungay:"<?php echo $tungay; ?>",
                                            denngay:"<?php echo $denngay ?>",
                                            intheothuesuat:"3",
                                            intheochungtu:"<?php echo $intheochungtu ?>",
                                            sapxeptheohoadon:"sott",
                                            tenphieu:'BẢNG CÂN ĐỐI TÀI KHOẢN',
                                            ngaylap:'',
                                            ngayhoadon:'',
                                            xemchitiet:'1'
                                        },
                                    });
                                },
                                buttons: {
                                    "OK": {
                                        keys: ['Y'], action: function () {
                                            xoadialog_makh();
                                        }
                                    }
                                }
                            });
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

        $("#tailen").on("click", function() {
            $duongdan = $("#fileuudai").val();
            if($duongdan==""){
                alert("Đường dẫn không được trống");
                return;
            }
                $.confirm({// Cảnh báo khi phục hồi dữ liệu
                    title: 'Chú ý',
                    content: 'Bạn có muốn lưu đường dẫn này không ?',
                    icon: 'fa fa-warning',
                    type: 'red',
                    buttons: {
                        "Đồng ý": {
                            keys: ['Y'], action: function () {
                                var FileJonson = "";
                                $.confirm({
                                    title: 'Thông báo',
                                    type: 'green',
                                    method: 'GET',
                                    async: false,
                                    content: 'url:' + $dir_module_saoluu + 'luubienban_tndn.php?duongdan='+btoa($duongdan),
                                    contentLoaded: function () {
                                    },
                                    buttons: {
                                        "Thoát": {
                                            keys: ['Y'], btnClass: 'btn-green', action: function () {
                                                $("#Form_taifile")[0].reset();
                                                $.ajax({
                                                    url: $dir_module_saoluu + "load_list_backup_bienban_tndn.php",
                                                    async: false,
                                                    success: function (response) {
                                                        $(".table-dialog_saoluu").html(response);
                                                    }
                                                });
                                            }
                                        }
                                    }
                                });
                            }
                        },
                        "Hủy bỏ": {
                            keys: ['N'], action: function () {

                            }
                        }
                    }
                });
        });

        $(".xoafile").on("click", function() {
            $sott = this.getAttribute('sid');
            $fid = this.getAttribute('fid');
                $.confirm({// Cảnh báo khi phục hồi dữ liệu
                    title: 'Chú ý',
                    content: 'Bạn muốn xoá tập tin này không ?',
                    icon: 'fa fa-warning',
                    type: 'red',
                    buttons: {
                        "Đồng ý": {
                            keys: ['Y'], action: function () {
                                $.confirm({
                                    title: 'Thông báo',
                                    type: 'green',
                                    method: 'GET',
                                    async: false,
                                    contentType: 'multipart/form-data',
                                    content: 'url:' + $dir_module_saoluu + 'xoa_list_backup.php?sott='+$sott+'&fid='+$fid,
                                    contentLoaded: function () {
                                    },
                                    buttons: {
                                        "Thoát": {
                                            keys: ['Y'], btnClass: 'btn-green', action: function () {
                                                $("#Form_taifile")[0].reset();
                                                $.ajax({
                                                    url: $dir_module_saoluu+"load_list_backup_bienban_tndn.php",
                                                    async: false,
                                                    success: function (response) {
                                                        $(".table-dialog_saoluu").html(response);
                                                    }
                                                });
                                            }
                                        }
                                    }
                                });
                            }
                        },
                        "Hủy bỏ": {
                            keys: ['N'], action: function () {

                            }
                        }
                    }
                });
        });

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
    function TinhTongCacChiTieu($TongChiTieu,$DSMangCacChiTieu){
        if($TongChiTieu=="B1"){
            return parseInt($DSMangCacChiTieu[3].sotien)+parseInt($DSMangCacChiTieu[4].sotien)+parseInt($DSMangCacChiTieu[5].sotien)+parseInt($DSMangCacChiTieu[6].sotien)+parseInt($DSMangCacChiTieu[7].sotien);
        }
    }
        //--------------------------------Khai báo lưới---------------------------------------.
        		var objtpkhaithuetndn = {
            hwrap: false,
            //resizable: true,
            rowBorders: true,
			 virtualX: true, virtualY: true,
			height:$height-110,
            width:$width-30,
            //virtualX: true,
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
                var column = $("#grid_editing_bangcandoi_ketoan").pqGrid( "getData", { dataIndx: ['sotien', 'machitieu', 'ghichu'] } );
                    //rowData = $.parseJSON(column);

					var url="";
					if (type == 'update') {                        
                        var valid = grid.isValid({ rowData: rowData, allowInvalid: true }).valid;
                        if (valid) {
                            //if (rowData[recIndx] == null) {
                                //url = $dir_module_baocaothue+"add_tokhai_thuetndn.php";
                               // url = $dir_module_baocaothue+"edit_sotien_tokhai_tndn.php";
                           // }
                            //else {
                                //url = $dir_module_baocaothue+"edit_tokhai_thuetndn.php";
                                url = $dir_module_baocaothue+"edit_sotien_tokhai_tndn.php";
                            //}
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
                    { title: "STT", dataType: "string",editable: false, dataIndx: "maso", width: 40,sortable: false,align: "center"},
            
                     { title: "Chỉ tiêu", width: 400,editable: false, dataType: "string", dataIndx: "chitieu",sortable: false,
                        validations: [
                            { type: 'minLen', value: 1, msg: "Tên tài sản nguồn vônd không được trống !" }
                        ]
                    },
					{ title: "Mã chỉ tiêu",editable: false, dataType: "string", dataIndx: "machitieu", width: 80,sortable: false,align: "center"},
                    { title: "Số tiền", width: 200, dataType: "integer", dataIndx: "sotien",align:"right",
                        render: function (ui) {// Tính toán Tiền thuế và đưa lên lưới
                            //return FormatNumber(ui.rowData.sotien.toString());
                            return $.number(ui.rowData.sotien,0,".",",");
                        },
                        editable:true,
                    },
                    {
                        title: "Mã CT cha",editable: false, width: 80, dataType: "string", align: "center", dataIndx: "machitieucha",sortable: false,
                    },
                    { title: "Ghi chú", width: 300,editable: true, dataType: "string", dataIndx: "ghichu",sortable: false,
                        editor: {type: "textarea", attr: "rows=3"}
                    },
            ],//-----------------------------------------Kết thúc các cột--------------------------------------
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
        var $grid = $("#grid_editing_bangcandoi_ketoan").pqGrid(objtpkhaithuetndn);

        $("#tab_tokhai").click(function () {
            $("#grid_editing_bangcandoi_ketoan").pqGrid( "refreshDataAndView" );
        });

        $("#tab_bienban").click(function () {
            //kemteptinuudai
        });
       
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
<div id="dialog-thietlap_tokhai_thuetndn" title="<?php if($LoaiToKhai=='TNDN') echo 'THIẾT LẬP TỜ KHAI TNDN'; else echo 'THIẾT LẬP PHỤ LỤC XÁC ĐỊNH KQKD';?>"><!-- dialog -->

      <div id="tabs" style="padding: 0px;">
          <ul>
              <li><a href="#tabs-0" id="tab_tokhai" >Tờ Khai</a></li>
              <li><a href="#tabs-1" id="tab_bienban">Biên bản</a></li>
          </ul>
          <div id="tabs-0">
              <div id="grid_editing_bangcandoi_ketoan" style="margin:5px auto;border: 0px !important;"></div>
          </div>
          <div id="tabs-1">
              <div id="kemteptinuudai" style="margin:5px auto;border: 0px !important;">
                  <form  method="post" id="Form_taifile" enctype="multipart/form-data">
                      <fieldset style="margin-top: 10px">
                          <legend><b>Nhập vào đường dẫn tập tin</b></legend>
                          <table border="0" width="100%"><tr>
                                  <td width="10%" align="right"><b>Đường dẫn &nbsp;&nbsp;&nbsp;</b></td>
                                  <td width="40%" ><input autocomplete="off" style="width: 99%" type="text" name="fileuudai" id="fileuudai"></td>
                                  <td width="50%" ><input STYLE="color: red;font-weight: bold; border: 1px solid red" type="button"  name="tailen" id="tailen" value="Lưu"></td>
                              </tr></table>
                      </fieldset>
                      <fieldset style="margin-top: 10px">
                          <LEGEND><b>Danh sách biên bản thanh kiểm tra</b></LEGEND>
                          <table class="table-dialog_saoluu" border="0" width="100%">
                              <tr style="background-color:#51b4dc ">
                                  <td style="border: 1px solid #51b4dc;font-weight: bold;" align="center" width="10%">STT</td>
                                  <td style="border: 1px solid #51b4dc;font-weight: bold;" align="center" width="40%" >MST</td>
                                  <td style="border: 1px solid #51b4dc;font-weight: bold;" align="center" width="40%" >Ngày</td>
                                  <td style="border: 1px solid #51b4dc;font-weight: bold;" align="center" width="10%" >Chức năng</td>
                              </tr>
                              <?php
                              $OBJBK = new backup;
                              $ListBackup = $OBJBK->LoadListBackup(1);
                              $i=0;
                              foreach($ListBackup as $ItemBackup){
                                  $i++;
                                  ?>
                                  <tr table-dialog_saoluu style="text-align: center;">
                                      <td style="border: 1px solid #51b4dc;"><?php echo $ItemBackup['STT']; ?></td>
                                      <td style="border: 1px solid #51b4dc;" align="center"><a  target="_blank" href="<?php echo $ItemBackup['tenfile']; ?>" ><?php echo $ItemBackup['tenfile']; ?></a></td>
                                      <td style="border: 1px solid #51b4dc;"><?php echo date("d/m/Y h:m:s",strtotime($ItemBackup['ngayluu'])); ?></td>
                                      <td style="border: 1px solid #51b4dc;"><a sid="<?php echo $ItemBackup['sott']; ?>" fid="<?php echo $ItemBackup['tenfile']; ?>" class="xoafile" href="#" >Xoá</a></td>
                                  </tr>
                                  <?php
                              }
                              ?>
                          </table>
                      </fieldset>
                  </form>
              </div>
          </div>
      </div>
  </div>