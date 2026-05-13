<?php
$IDstyle = $_GET['idstyle'];// lấy ID css để truyền mã vào lưới mã công trình
$IDInput_str = $_GET['idinput'];
$IDInput_Arr = explode("***", $IDInput_str);
$IDfocus = $_GET['idfocus'];
$LoaiPhieu = $_GET['loaiphieu'];
$ma = $_GET['ma'];
if($_GET['plnoidung']==""){
    $PLNoiDung='ALL';
}else {
    $PLNoiDung = $_GET['plnoidung'];
}
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
    tr td.mauhong{
        background-color: pink;
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
    $width = getWidth() - 50;
    $(function () {
        $dir_module_manoidung_select = "modules/manoidung/";//--------------------------------------------Thay đổi khi copy
        $dir_module_mavattu = "modules/mavattu/";//--------------------------------------------Thay đổi khi copy
		$dir_module_httk = "modules/httk/";
        function xoadialog_manoidung_select() { // ----------------------đóng form
            reset_dialog(".dialog-manoidung_select");
            reset_dialog(".dialog_main_manoidung");
        }

        if (typeof $(".dialog-manoidung_select").html() == "undefined") {
            $("#dialog-manoidung_select").dialog({ // ------------------Gọi dialog
                resizable: false,
                height: $height,
                width: $width,
                modal: true

            });
        }
        $("#dialog-manoidung_select").keydown(function (event) {//--------------Các phím tắt
            var $grid_pb = $("#grid_editing_manoidung_select").closest('.pq-grid');//---- Lưới----------------
            if (event.keyCode == Keys.F7 || event.keyCode == Keys.F8 || event.keyCode == Keys.INSERT) {
                var rowSelect = getRowSelect();//------ Lấy đối tượng được chọn
                if (rowSelect == false) {
                    alert_f("Chú Ý", "fa fa-warning", "red", "Bạn cần chọn dữ liệu trước khi thực hiện !");
                }
            }
            var rowEditting = $("#grid_editing_manoidung_select").pqGrid("getRowsByClass", {cls: 'pq-row-edit'});//---Lấy đối tượng đang sửa
            if ($('div').hasClass('jconfirm') == false) {
			 if (event.keyCode == Keys.F4) {
                  rowIndex = 0;
                 var rowSelect = getRowSelect();

                 var colM=$( "#grid_editing_manoidung_select" ).pqGrid( "option" , "colModel" );
                 colM[2].editable = true;
                 $( "#grid_editing_manoidung_select" ).pqGrid( "option", "colModel", colM);

                 if(rowSelect!=false)
                     var rowIndx = rowSelect[0].rowIndx+1;
                  addRow(rowIndx,'mand',$grid_pb);
              }
              if (event.keyCode == Keys.F7) { // copy
                  if (rowSelect != false){

                      var rowIndx = rowSelect[0].rowIndx;
                      var rowData = rowSelect[0].rowData;
                      //---------------Khai báo các cell khi dùng lệnh copy-----------------------------------------
                      //--------------------------------------------Thay đổi khi copy---------------------------------
                      var colM=$( "#grid_editing_manoidung_select" ).pqGrid( "option" , "colModel" );
                      colM[2].editable = true;
                      $( "#grid_editing_manoidung_select" ).pqGrid( "option", "colModel", colM);
                      var _dataRow = {
                            mand: rowData.mand,
                            tennoidung: rowData.tennoidung,
                            mapl: rowData.mapl,
                            rate_tax: rowData.rate_tax,
                            tkno: rowData.tkno,
                            tkco: rowData.tkco,
                            ghichu: rowData.ghichu
                        };
                      addRow(rowIndx+1,'mand',$grid_pb,_dataRow);
                  }
              }
             if (event.keyCode == Keys.F8) { // Xóa
                 if (rowSelect != false){
                   
                    var rowData = rowSelect[0].rowData;
                    deleteRow(rowData, $grid_pb);
                }
             }
               
                if (event.keyCode == Keys.INSERT) {
                    if (!isEditing($grid_pb)) {
                        $ma = rowSelect[0].rowData.mand;
                        $ten = rowSelect[0].rowData.tennoidung;
                        $tkno = rowSelect[0].rowData.tkno;
                        $tkco = rowSelect[0].rowData.tkco;
                        $thuesuat = rowSelect[0].rowData.rate_tax;
                        $sott = rowSelect[0].rowData.sott;
                        if($sott==0 || $sott=="" || typeof $sott == 'undefined'){
                            alert("Nội dung chưa được lưu, vui lòng lưu dữ liệu trước khi chọn nội dung ! ");
                            return false;
                        }
                        <?php
                        if($LoaiPhieu == 1 || $LoaiPhieu == 3){
                        ?>
                        $data = new Array($ma, $ten, $tkco, $ten, $tkno, $thuesuat,$tkco,$tkco,$tkco);
                        <?php
                        }  if($LoaiPhieu == 2 || $LoaiPhieu == 4){

                        ?>
                        $data = new Array($ma, $ten, $tkno, $ten, $tkco, $thuesuat,$tkno,$tkno,$tkno);
                        <?php
                        }
                        ?>

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
                        xoadialog_manoidung_select();
                    }
                }
                if (event.keyCode == Keys.ESCAPE && $('div').hasClass('jconfirm') == false && rowEditting.length < 1) {
                    change_data_quit_manoidung_select();
					$("#<?php echo $IDInput_Arr[0]; ?>").focus();
                }
            } else {
                return false;
            }
        }); // end phím tắt

        function change_data_quit_manoidung_select() { // Cảnh báo thoát khi thay đổi dữ liệu////////////////////////////////////////////////////
			xoadialog_manoidung_select();
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
		function addRow(rowIndx,$name='mavt',$grid,$obj_addrow="") {
            //append empty row in the first row.
			$ma="";
			$.ajax({
				url: $dir_module_manoidung_select+"taoma.php",
				async: false,
				success: function (response) {
					$ma = response;
				}
			});	
            if($obj_addrow!=""){
                var rowData =$obj_addrow;
            }else{
                var rowData = {mand: "", tennoidung: "", mapl: "", rate_tax: "", tkno: "", tkco: "", ghichu: ""};
            }
			rowData.mand = $ma;
			if(typeof rowIndx == 'undefined')
			rowIndx=0;
			$grid.pqGrid("setSelection", { rowIndx: rowIndx, dataIndx: $name});
            $grid.pqGrid("addRow", { rowIndx: rowIndx, rowData: rowData });

          $grid.pqGrid( "addClass", {rowIndx: rowIndx, cls: 'rownotsave'} );
            $grid.pqGrid("editFirstCellInRow", { rowIndx: (rowIndx) });
        }
        //----------------------------Hàm xóa dữ kiệu------------------------------------------
		  function deleteRow(rowData,$grid) {
            var rowData = rowData;
            var ma = rowData.mand;
            var sott = rowData.sott;
            if($('div').hasClass('jconfirm')==false){
                $.confirm({
                    title: "Chú ý",icon: "fa fa-times-circle",type: "red",
                    content: "Bạn có muốn xóa hàng có mã "+ (ma)+"  không ?"+'<br/>Nhấn phím <strong style="color:blue;">[Y]</strong> để đồng ý phím <strong style="color:red;">[N]</strong> để hủy bỏ ',
                    buttons: {"Đồng ý": {keys: ['Y'],action: function () {


                        $.ajax($.extend({}, ajaxObj, {
                            context: $grid,
                            url: $dir_module_manoidung_select+"del.php",
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
        //-------------------------Thêm mới dữ liệu-------------------------------------------------------

        //--------------------------------Khai báo lưới---------------------------------------.
 		var obj_mand = {
            hwrap: false,
            vwrap: false,
            //resizable: true,
            rowBorders: true,
			height:$height-58,
            width:$width-20,
            //virtualX: true,
            numberCell: { show: true },
			filterModel: { on: true, mode: "AND", header: true },
            trackModel: { on: true }, //to turn on the track changes.            
            scrollModel: {
                autoFit: false
            },
            historyModel: {
                checkEditableAdd: true
            },            
            editModel: {
                allowInvalid: true,
                saveKey: $.ui.keyCode.ENTER
            },
            freezeCols: 4,
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
							if(rowData.mand==""){
								var timemili = Date.now();
								rowData.mand=timemili.toString().substr(-6);
								//rowData.makhcha="0";
							}
                            if (rowData[recIndx] == null) {
                                url = $dir_module_manoidung_select+"add.php";
                            }
                            else {
                                url = $dir_module_manoidung_select+"edit.php";
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
                             var colM=$( "#grid_editing_manoidung_select" ).pqGrid( "option" , "colModel" );
                             colM[2].editable = false;
                             $( "#grid_editing_manoidung_select" ).pqGrid( "option", "colModel", colM);
                        },
                    });
               }
            },
            colModel: [//-------------------------------------------Khai báo các cột trong lưới-----------------------
                { title: "Lưu", dataType: "integer", dataIndx: "sott", editable: false, width: 0, hidden:false,align: "center",
                    render: function (ui) {
                        var $val  = ui.rowData.sott;
                        if($val==0 || $val=="" || typeof $val == 'undefined'){
                            return "<img src='icon/uncheck.png' width='20px'/>";
                        } else {
                            return "<img src='icon/check.png' width='20px' />";
                        }
                    },},
				{ title: "STT", dataType: "string", dataIndx: "STT", editable: false, width:10, hidden:true,align: "center" },
                {
                    title: "Mã ND", dataType: "string", dataIndx: "mand", width: 80, sortable: true,editable:false,
                    validations: [
                        {
                            type: function (ui) {
								isEdit = isEditCell();
								if(isEdit){
                                var value = ui.value,
                                    _found = false, sott = ui.rowData.sott;
                                //remote validation
                                $.ajax({
                                    url: $dir_module_manoidung_select + "checkkey.php",
                                    data: {'id': value, 'sott': sott},
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
                        { type: 'regexp', value: '^[0-9a-zA-Z_.-]{0,14}$', msg: 'Mã không có dấu và không có khoản trắng' },

                    ],
                    filter: {
                        type: 'textbox',
                        condition: 'begin',
                        listeners: ['keyup']
                    },
                    render: function (ui) {
                        var rowData = ui.rowData,
                            dataIndx = ui.dataIndx;

                        rowData.pq_cellcls = rowData.pq_cellcls || {};
                        if (rowData.mand== 100000 || rowData.mand== 100001 || rowData.mand== 100002 || rowData.mand== 100003 || rowData.mand== 100010 || rowData.mand== 100011 || rowData.mand== 100014 || rowData.mand== 100020 || rowData.mand== 100037) {//if change is negative.
                            rowData.pq_cellcls[dataIndx] = 'mauhong';
                            return rowData.mand;
                        }
                        else { //if change >= 0
                            return  rowData.mand;
                        }
                    }
                },
                {
                    title: "Nội dung tiếng Việt", width: 250, dataType: "string", dataIndx: "tennoidung",
                    validations: [
                        {type: 'minLen', value: 1, msg: "Nội dung không được trống !"}
                    ],
                    filter: {
                        type: 'textbox',
                        condition: 'begin',
                        listeners: ['keyup']
                    }
                },
                {
                    title: "Nội dung tiếng Anh", width: 165, dataType: "string", dataIndx: "tennoidung_en",hidden:false,
                    filter: {
                        type: 'textbox',
                        condition: 'begin',
                        listeners: ['keyup']
                    }
                },
                {
                    title: "Nội dung tiếng Trung", width: 165, dataType: "string", dataIndx: "tennoidung_cn",hidden:false,
                    filter: {
                        type: 'textbox',
                        condition: 'begin',
                        listeners: ['keyup']
                    }
                },
                {
                    title: "Phân loại",
                    width: 100,
                    dataType: "string",
                    align: "right",
                    dataIndx: "mapl",
                    render: function (ui) {
                        return ui.rowData.tenpl
                    },
                    validations: [
                        {type: 'minLen', value: 1, msg: "Trường này không được trống !"},
                    ],
                    filter: {
                        type: "select",
                        condition: 'equal',
                        prepend: {'': '--Tất cả--'},
                        valueIndx: "mapl",
                        labelIndx: "tenpl",
                        listeners: ['change']
                    },
                    editor: {
                        type: "select", options: function (ui) {
                            //remote validation
                            var parsedJson = "";
                            $.ajax({
                                url: $dir_module_manoidung_select + "cb_mapl.php",
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
                {title: "Phân loại", width: 140, dataType: "string", align: "right", dataIndx: "tenpl", hidden: true},
                {
                    title: "TS(%)",
                    width: 60,
                    dataType: "string",
                    align: "right",
                    dataIndx: "rate_tax",
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
                        var rate = ui.rowData.rate_tax;
                        return rate+"%";
                    }
                },
                {title: "TK nợ", width: 70, dataType: "string", align: "right", dataIndx: "tkno",
                    filter: {
                        type: 'textbox',
                        condition: 'begin',
                        listeners: ['keyup']
                    },
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

                                if(_found==false && value!=""){
                                   
                                    //$('.dialog_main_httk').load("form/frm_dm_httk_select.php?idstyle=grid_editing_manoidung_select");
									ui.msg ="Mã TK "+ value + " không nằm trong bảng hệ thống tài khoản !";
									return false;
                                }
								}
								return true;
                            }
                            },
                        ],
				editor: { type:'number'},
				},
                {title: "TK có", width: 70, dataType: "string", align: "right", dataIndx: "tkco",
                    filter: {
                        type: 'textbox',
                        condition: 'begin',
                        listeners: ['keyup']
                    },
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

                                if(_found==false && value!=""){
                                   
                                    //$('.dialog_main_httk').load("form/frm_dm_httk_select.php?idstyle=grid_editing_manoidung_select");
									ui.msg ="Mã TK "+ value + " không nằm trong bảng hệ thống tài khoản !";
									return false;
                                }
								}
								return true;
                            }
                            },
                        ],
				editor: { type:'number'}
				},
                {
                    title: "Chú thích", width: 150, dataType: "string", align: "right", dataIndx: "ghichu",
                    editor: {type: "textarea", attr: "rows=3"}
                }
            ],//-----------------------------------------Kết thúc các cột---------------------------------------
            pageModel: { type: "local", rPP: 200, strRpp: "{0}", strDisplay: "{0} đến {1} của {2}" },
            dataModel: {
                dataType: "JSON",
                location: "remote",
                recIndx: "sott",
                url: $dir_module_manoidung_select + "list.php",//-- Load danh sách lên lưới
                postData: {plnoidung:"<?php echo $PLNoiDung; ?>"},
                getData: function (response) {
                    return {data: response.data};
                }
            },

            load: function (evt, ui) {
                var grid = $(this).pqGrid('getInstance').grid,
                    data = grid.option('dataModel').data;
                
                grid.isValid({ data: data, allowInvalid: true });
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
        var $grid = $("#grid_editing_manoidung_select").pqGrid(obj_mand);
        $grid.one("pqgridload", function (evt, ui) {// Lấy DS List box
            var column = $grid.pqGrid("getColumn", {dataIndx: "mapl"});
            var filter = column.filter;
            filter.cache = null;
            filter.options = $grid.pqGrid("getData", {dataIndx: ["tenpl", "mapl"]});// lấy 1 hoặc nhiều dataindex
            $grid.pqGrid("refreshHeader");
            $("#grid_editing_manoidung_select .pq-search-hd-field[name='tennoidung']").focus();
        });
        //use refresh & refreshRow events to display jQueryUI buttons and bind events.
        function getRowSelect() { // --------------------Lấy dữ liệu theo dòng trên gird----------------------                 
            var arr = $("#grid_editing_manoidung_select").pqGrid("selection", {
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
			  isEdit = $("#grid_editing_manoidung_select").pqGrid("isDirty"); //Lấy giá trị đang chọn
             
             return isEdit;
         }

        //-----------------------------Hết lưới---------------------------------------------------------------------
    });

</script>
<div id="dialog-manoidung_select"
     title="Thông tin nội dung (ENTER : Sửa,Lưu , F4: Thêm mới , F7: Sao chép , F8: Xóa ,INSERT : Chọn dữ liệu)"><!-- dialog -->
    <div id="grid_editing_manoidung_select" style="margin:5px auto;border: 0px !important;"></div>
</div>