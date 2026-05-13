<?php
$IDstyle = $_GET['idstyle'];// lấy ID css để truyền mã vào lưới mã công trình
$IDInput_str = $_GET['idinput'];
$IDInput_Arr = explode("***", $IDInput_str);
$IDfocus = $_GET['idfocus'];
$ma = $_GET['ma'];
//$( "#grid_editing" ).pqGrid( "setSelection", {rowIndx: 9,colIndx: 3} );
                 //$( "#grid_editing" ).find('.pq-cell-select').focus();
?>
<style>
    div.pq-grid * {
        font-size: 12px;
        font-family: Verdana;
        line-height: 17px;
    }

    img.ui-datepicker-trigger {
        margin-top: 2px;
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
    .pq-grid .pq-editor-focus {
        outline: none;
        border: 1px solid #bbb;
        border-radius: 6px;
        background-image: linear-gradient(#e6e6e6, #fefefe);

        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#e6e6e6', endColorstr='#fefefe');
        background: -webkit-gradient(linear, left top, left bottom, from(#e6e6e6), to(#fefefe));
        background: -moz-linear-gradient(top, #e6e6e6, #fefefe); /* for firefox 3.6+ */
    }

    input.pq-date-editor {
        padding: 2px;
        vertical-align: bottom;
        width: 78px;
        z-index: 4;
        position: relative;
    }

    input.pq-ac-editor {
        padding: 2px;
        z-index: 4;
        position: relative;
    }

    .pq-row-edit {
        border: 2px dashed red;
    }

</style>
<script>
    $height = getHeight() - 50;
    $width = getWidth() - 150;
    $(function () {
        $dir_module_httk_select = "modules/httk/";//--------------------------------------------Thay đổi khi copy
        function xoadialog_httk_select() { // ----------------------đóng form 
            reset_dialog(".dialog-httk_select");
            reset_dialog(".dialog_main_httk");
        }


        if (typeof $(".dialog-httk_select").html() == "undefined") {// Chỉ gọi dialo khi chưa hiện
            $("#dialog-httk_select").dialog({ // ------------------Gọi dialog 
                resizable: false,
                height: $height,
                width: $width,
                modal: true

            });
       }
        $("#dialog-httk_select").keydown(function (event) {//--------------Các phím tắt
			 if (event.keyCode == Keys.F4) {
				  $(".themmoi").trigger("click");
			  }
			 if (event.keyCode == Keys.F7) { // copy
				$(".saochep").trigger("click");
			  }
			 if (event.keyCode == Keys.F8) { // Xóa
				 $(".xoadulieu").trigger("click");
			 }
			 if (event.keyCode == Keys.INSERT) {
				$(".chondulieu").trigger("click");
			 }
			 if (event.keyCode == Keys.ESCAPE ) {
				 $(".thoatcuaso").trigger("click");
			 }
        }); // end phím tắt
		//-- Xây dựng chức năng
		function themmoi() {
			var $grid_pb = $("#grid_editing_httk_select").closest('.pq-grid');//---- Lưới----------------
			  var rowSelect = getRowSelect();//------ Lấy đối tượng được chọn
                   rowIndx = 0;
                    var rowSelect = getRowSelect()
                    if(rowSelect!=false)
                        var rowIndx = rowSelect[0].rowIndx+1;
                  addRow(rowIndx,'matk',$grid_pb);
		}
		function saochep() {
			var $grid_pb = $("#grid_editing_httk_select").closest('.pq-grid');//---- Lưới----------------
			var rowSelect = getRowSelect();//------ Lấy đối tượng được chọn
			if(rowSelect==false){
				alert("Bạn cần chọn dữ liệu trước khi thực hiện !");
			}
		  if (rowSelect != false){
			var rowIndx = rowSelect[0].rowIndx;
			  var rowData = rowSelect[0].rowData;
			  //---------------Khai báo các cell khi dùng lệnh copy-----------------------------------------
			  //--------------------------------------------Thay đổi khi copy---------------------------------
			  var _dataRow = {matk :rowData.matk,tentk :rowData.tentk,matkcha :rowData.matkcha,loaitk :rowData.loaitk,nhomtk :rowData.nhomtk,mats :rowData.mats,mangv :rowData.mangv,ghichu :rowData.ghichu,tenloaitk :rowData.tenloaitk};
			  addRow(rowIndx+1,'matk',$grid_pb,_dataRow);
		  }
		}
		function xoadulieu() {
			var $grid_pb = $("#grid_editing_httk_select").closest('.pq-grid');//---- Lưới----------------
			var rowSelect = getRowSelect();//------ Lấy đối tượng được chọn
			if(rowSelect==false){
				alert("Bạn cần chọn dữ liệu trước khi thực hiện !");
			}
			if (rowSelect != false){                   
				var rowData = rowSelect[0].rowData;
				deleteRow(rowData, $grid_pb);
			}
		}
		
		function chondulieu() {
			var $grid_pb = $("#grid_editing_httk_select").closest('.pq-grid');//---- Lưới----------------
			var rowSelect = getRowSelect();//------ Lấy đối tượng được chọn
			if(rowSelect==false){
				alert("Bạn cần chọn dữ liệu trước khi thực hiện !");
			}
			if (rowSelect != false){
				$ma = rowSelect[0].rowData.matk;
				$ten = rowSelect[0].rowData.tentk;

				$data = new Array($ma, $ten)
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
				$.ajax({
					url: $dir_module_httk_select + "updaterank.php",
					data: {'id': $ma},
					async: false,
					success: function (response) {
					}
				});
				xoadialog_httk_select();
			}
		}
		
		function thoatcuaso() {
			var $grid_pb = $("#grid_editing_httk_select").closest('.pq-grid');//---- Lưới----------------
			var rowSelect = getRowSelect();//------ Lấy đối tượng được chọn
			var rowEditting = $("#grid_editing_httk_select").pqGrid("getRowsByClass", {cls: 'pq-row-edit'});//---Lấy đối tượng đang sửa
			if ($('div').hasClass('jconfirm')==false && rowEditting.length<1) {
				change_data_quit_httk_select();
				$("#<?php echo $IDstyle; ?> #<?php echo $IDInput_Arr['0']; ?>").focus();
             }
		}
		//-- Kết thúc xây dựng chức năng
        function change_data_quit_httk_select() { // Cảnh báo thoát khi thay đổi dữ liệu////////////////////////////////////////////////////{
             xoadialog_httk_select();
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
            var rows = $grid.pqGrid("getRowsByClass", {cls: 'pq-row-edit'});
            if (rows.length > 0) {
                //focus on editor if any 
                $grid.find(".pq-editor-focus").focus();
                return true;
            }
            return false;
        }

        //-------------------------Thêm mới dữ liệu-------------------------------------------------------
        //------------------------------Thây đổi row khi nhấp edit-----------------------------------
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
            //resizable: true,
            rowBorders: true,
            virtualX: true, virtualY: true,
            height: $height - 53,
            width: $width - 18,
            //virtualX: true,
            numberCell: {show: true},
            filterModel: {on: true, mode: "AND", header: true},
            trackModel: {on: true}, //to turn on the track changes.
            scrollModel: {
                autoFit: true
            },
            historyModel: {
                checkEditableAdd: true
            },
            freezeCols: 5,
            editModel: {
                allowInvalid: false,
                saveKey: $.ui.keyCode.ENTER
            },
            editor: {
                select: true
            },
			toolbar: {
                items: [
				{
                        type: 'button',
                        label: "Thêm [F4]",
                        icon: 'ui-icon-plus',
						cls: 'themmoi',
                        listeners: [{
                            "click": function (evt) {
                                themmoi();
                            }
                        }]
                    },
					{
                        type: 'button',
                        label: "Sao chép [F7]",
                        icon: 'ui-icon-copy',
						cls: 'saochep',
                        listeners: [{
                            "click": function (evt) {
                                saochep();
                            }
                        }]
                    },
					{
                        type: 'button',
                        label: "Xoá [F8]",
                        icon: 'ui-icon-trash',
						cls: 'xoadulieu',
                        listeners: [{
                            "click": function (evt) {
                                xoadulieu();
                            }
                        }]
                    },
					{
                        type: 'button',
                        label: "Chọn [Ins]",
                        icon: 'ui-icon-check',
						cls: 'chondulieu',
                        listeners: [{
                            "click": function (evt) {
                                chondulieu();
                            }
                        }]
                    },
                    {
                        type: 'button',
                        label: "Xuất Excel",
                        icon: 'ui-icon-document',
                        listeners: [{
                            "click": function (evt) {
                                $("#grid_editing_httk_select").pqGrid("exportCsv", {url: "export_xuatexcel.php"});
                            }
                        }]
                    },
					{
                        type: 'button',
                        label: "Thoát [ESC]",
                        icon: 'ui-icon-closethick',
						cls: 'thoatcuaso',
                        listeners: [{
                            "click": function (evt) {
                                thoatcuaso();
                            }
                        }]
                    },					
			
                ]
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
                        },
                    });
               }
            },
            colModel: [//-------------------------------------------Khai báo các cột trong lưới-----------------------
                { title: "Lưu", dataType: "integer", dataIndx: "sott", editable: false, width: 0, hidden:false, align:"center",
                    render: function (ui) {
                        var $val  = ui.rowData.sott;
                        if($val==0 || $val=="" || typeof $val == 'undefined'){
                            return "<img src='icon/uncheck.png' width='20px'/>";
                        } else {
                            return "<img src='icon/check.png' width='20px' />";
                        }
                    },},
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
			pageModel: { type: "local", rPP: 300, strRpp: "{0}", strDisplay: "{0} đến {1} của {2}" },
            dataModel: {
                dataType: "JSON",
                location: "remote",
                recIndx: "sott",
                url: $dir_module_httk_select+"list.php",//-- Load danh sách lên lưới
                getData: function (response) {
                    return { data: response.data};
                }
            }
        };
        var $grid = $("#grid_editing_httk_select").pqGrid(obj);
        $grid.one("pqgridload", function (evt, ui) {
			$("#grid_editing_httk_select .pq-search-txt").focus();
        });
        //use refresh & refreshRow events to display jQueryUI buttons and bind events.
		
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
        //-----------------------------Hết lưới---------------------------------------------------------------------
		 function isEditCell(rowIndex,dataIndx) { // --------------------Lấy dữ liệu theo dòng trên gird----------------------                 
             var isEdit = false;
			  isEdit = $("#grid_editing_httk_select").pqGrid("isDirty"); //Lấy giá trị đang chọn             
             return isEdit;
         }
 //-----------------------------Hết lưới---------------------------------------------------------------------       

    });

</script>
<div id="dialog-httk_select"
     title="Chọn mã tài khoản (Enter: Để chọn mã ,F4: Thêm , F2: Sửa , F7: Sao chép , F8: Xóa , F9: Lưu , END : Hủy dòng đang sửa)">
    <!-- dialog -->
    <div id="grid_editing_httk_select" style="margin:5px auto;border: 0px !important;"></div>
</div>