<?php
$IDstyle = $_GET['idstyle'];// lấy ID css để truyền mã vào lưới mã công trình
$IDInput_str = $_GET['idinput'];
$IDInput_Arr = explode("***", $IDInput_str);
$IDfocus = $_GET['idfocus'];
$LoaiPhieu = $_GET['loaiphieu'];
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

</style>
<script>
    $height = getHeight();
    $width = getWidth() - 50;
    $(function () {
        $dir_module_sudu_hoadon_select = "modules/baocaothue/";//--------------------------------------------Thay đổi khi copy
		$dir_module_httk = "modules/httk/";
        function xoadialog_manoidung_select() { // ----------------------đóng form
            reset_dialog(".dialog-sodu_hoadon");
            reset_dialog(".dialog_main_sodu_hoadon");
        }

        if (typeof $(".dialog-sodu_hoadon").html() == "undefined") {
            $("#dialog-sodu_hoadon").dialog({ // ------------------Gọi dialog
                resizable: false,
                height: $height,
                width: $width,
                modal: true

            });
        }
        $("#dialog-sodu_hoadon").keydown(function (event) {//--------------Các phím tắt
            var $grid_pb = $("#grid_editing_sodu_hoadon").closest('.pq-grid');//---- Lưới----------------
            if (event.keyCode == Keys.F7 || event.keyCode == Keys.F8 || event.keyCode == Keys.INSERT) {
                var rowSelect = getRowSelect();//------ Lấy đối tượng được chọn
                if (rowSelect == false) {
                    alert_f("Chú Ý", "fa fa-warning", "red", "Bạn cần chọn dữ liệu trước khi thực hiện !");
                }
            }
            var rowEditting = $("#grid_editing_sodu_hoadon").pqGrid("getRowsByClass", {cls: 'pq-row-edit'});//---Lấy đối tượng đang sửa
            if ($('div').hasClass('jconfirm') == false) {
			 if (event.keyCode == Keys.F4) {
                  rowIndex = 0;
                  addRow(rowIndx,'loaiphieu',$grid_pb);
              }
              if (event.keyCode == Keys.F7) { // copy
                  if (rowSelect != false){

                      var rowIndx = rowSelect[0].rowIndx;
                      var rowData = rowSelect[0].rowData;
                      //---------------Khai báo các cell khi dùng lệnh copy-----------------------------------------
                      //--------------------------------------------Thay đổi khi copy---------------------------------
                       var _dataRow = {loaiphieu: rowData.loaiphieu, soquyen:rowData.soquyen, kyhieu: rowData.kyhieu, tuso: rowData.tuso, denso: rowData.denso, soluong: rowData.soluong, mauso: rowData.mauso,quy:rowData.quy,loaiphieu: "TK"};
                      addRow(rowIndx,'loaiphieu',$grid_pb,_dataRow);
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
                        <?php
                        if($LoaiPhieu == 1 || $LoaiPhieu == 3){
                        ?>
                        $data = new Array($ma, $ten, $tkco, $ten, $tkno, $thuesuat);
                        <?php
                        }  if($LoaiPhieu == 2 || $LoaiPhieu == 4){

                        ?>
                        $data = new Array($ma, $ten, $tkno, $ten, $tkco, $thuesuat);
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
                        $.ajax({
                            url: $dir_module_sudu_hoadon_select + "updaterank.php",
                            data: {'id': $ma},
                            async: false,
                            success: function (response) {
                            }
                        });
                        xoadialog_manoidung_select();
                    }
                }
                if (event.keyCode == Keys.ESCAPE && $('div').hasClass('jconfirm') == false && rowEditting.length < 1) {
                    change_data_quit_manoidung_select();
                }
            } else {
                return false;
            }
        }); // end phím tắt

        function change_data_quit_manoidung_select() { // Cảnh báo thoát khi thay đổi dữ liệu////////////////////////////////////////////////////
            var $grid_pb = $("#grid_editing_sodu_hoadon").closest('.pq-grid');//---- Lưới----------------
            var isEditing = rows = $grid_pb.pqGrid("getRowsByClass", {cls: 'pq-row-edit'});
            $isEdit = false;
            if (isEditing.length > 0) {
                $isEdit = true;
            }
            if ($isEdit) {
                if ($('div').hasClass('jconfirm') == false) {
                    $.confirm({
                        title: 'Thông báo',
                        content: ' Dữ liệu đã được thay đổi bạn có muốn lưu không.<br/>Nhấn phím <strong style="color:blue;">[Y]</strong> để đồng ý phím <strong style="color:red;">[N]</strong> để hủy bỏ ',
                        icon: 'fa fa-warning',
                        type: 'red',
                        buttons: {
                            "Đồng ý": {
                                keys: ['Y'], action: function () {
                                    $grid_pb.find(".pq-editor-focus").focus();
                                }
                            },
                            "Hủy bỏ": {
                                keys: ['N'], action: function () {
                                    xoadialog_manoidung_select();
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
                        "Đồng ý": {
                            keys: ['Y'], action: function () {
                                xoadialog_manoidung_select();
                            }
                        },
                        "Hủy bỏ": {
                            keys: ['N'], action: function () {

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
            var rowData = {loaiphieu: "1", soquyen: "", kyhieu: "", tuso: "", denso: "", soluong: "", mauso: "",quy:"0",loaiphieu: "TK"};

			if(typeof rowIndx == 'undefined')
			rowIndx=0;
			$grid.pqGrid("setSelection", { rowIndx: rowIndx, dataIndx: $name});
            $grid.pqGrid("addRow", { rowIndx: rowIndx, rowData: rowData });

          
            $grid.pqGrid("editFirstCellInRow", { rowIndx: (rowIndx) });
        }
        //----------------------------Hàm xóa dữ kiệu------------------------------------------
		  function deleteRow(rowData,$grid) {
            var rowData = rowData;
            var ma = rowData.sott;
            var sott = rowData.sott;
            if($('div').hasClass('jconfirm')==false){
                $.confirm({
                    title: "Chú ý",icon: "fa fa-times-circle",type: "red",
                    content: "Bạn có muốn xóa hàng có mã "+ (ma)+"  không ?"+'<br/>Nhấn phím <strong style="color:blue;">[Y]</strong> để đồng ý phím <strong style="color:red;">[N]</strong> để hủy bỏ ',
                    buttons: {"Đồng ý": {keys: ['Y'],action: function () {


                        $.ajax($.extend({}, ajaxObj, {
                            context: $grid,
                            url: $dir_module_sudu_hoadon_select+"del_sodu_hddk.php",
                            data: { id: sott,ma:ma },
                            success: function () {
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
 		var obj = {
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
                                url = $dir_module_sudu_hoadon_select+"add_sodu_hddk.php";
                            }
                            else {
                                url = $dir_module_sudu_hoadon_select+"edit_sodu_hddk.php";
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
                {title: "SoTT", dataType: "integer", dataIndx: "sott", editable: false, width: 80, hidden: true},
				{ title: "STT", dataType: "string", dataIndx: "STT", editable: false, width:10, hidden:true,align: "center" },
                {
                    title: "Loại hóa đơn", dataType: "string", dataIndx: "loaphieu", width: 200, sortable: true,
                    filter: {
                        type: 'textbox',
                        condition: 'begin',
                        listeners: ['keyup']
                    },
                    editor: {
                        type: "select", options: function (ui) {
                            //remote validation
                            var parsedJson = $.parseJSON('[{"1":"Hóa đơn GTGT"},{"2":"Hóa đơn bán hàng"},{"4":"Hóa đơn GTGT không xử lý tồn"}]');

                            return parsedJson;
                        }
                    },
                    render: function (ui) {
                        var value = ui.rowData.loaphieu;
                        if (value == 1) {
                            return "Hóa đơn GTGT";
                        }else if(value == 2){
                            return "Hóa đơn bán hàng";
                        }else if(value == 4){
                            return "Hóa đơn GTGT không xử lý tồn";
                        }
                    }
                },
                {
                    title: "Số tờ/quyển", width: 165, dataType: "string", dataIndx: "soquyen",
                    validations: [
                        {type: 'minLen', value: 1, msg: "Nội dung không được trống !"}
                    ],
                    filter: {
                        type: 'textbox',
                        condition: 'begin',
                        listeners: ['keyup']
                    }
                },
                {title: "Mẫu số", width: 100, dataType: "string", align: "right", dataIndx: "mauso",
                    validations: [
                        {type: 'minLen', value: 1, msg: "Trường này không được trống !"}
                    ]
                },
                {
                    title: "Ký hiệu",
                    width: 100,
                    dataType: "string",
                    align: "center",
                    dataIndx: "kyhieu"
                    
                },
                {
                    title: "Quý",
                    width: 100,
                    dataType: "string",
                    align: "center",
                    dataIndx: "quy",
                    hidden: false,
                    editor: {
                        type: "select", options: function (ui) {
                            var parsedJson = $.parseJSON('[{"1":"Quý I"},{"2":"Quý II"},{"3":"Quý III"},{"4":"Quý IV"}]');
                            return parsedJson;
                        }
                    },
                    render: function (ui) {
                        var value = ui.rowData.quy;
                        if (value == "1") {
                            return "Quý I";
                        }else if (value == "2") {
                            return "Quý II";
                        }else if (value == "3") {
                            return "Quý III";
                        }else if (value == "4") {
                            return "Quý IV";
                        }
                    }

                },
                {title: "Từ số", width: 80, dataType: "string", align: "center", dataIndx: "tuso",
                    validations: [
                        {type: 'minLen', value: 1, msg: "Trường này không được trống !"}
                    ]
                },
                {title: "Đến số", width: 80, dataType: "string", align: "center", dataIndx: "denso",
                    validations: [
                        {type: 'minLen', value: 1, msg: "Trường này không được trống !"}
                    ]
                },
                {title: "Số lương", width: 80, dataType: "string", align: "center",editable:false,
                    render: function (ui) {
                        var tuphieu = ui.rowData.tuso;
                        var denphieu = ui.rowData.denso;
                        return parseInt((denphieu-tuphieu)+1);
                    }
                },
                {title: "Loại Phiếu", width: 100, dataType: "string", align: "right", dataIndx: "loaiphieu", hidden: true}
                
            ],//-----------------------------------------Kết thúc các cột---------------------------------------
            pageModel: { type: "local", rPP: 300, strRpp: "{0}", strDisplay: "{0} đến {1} của {2}" },
            dataModel: {
                dataType: "JSON",
                location: "remote",
                recIndx: "sott",
                url: $dir_module_sudu_hoadon_select + "list_sodu_hoadon_trongky.php",//-- Load danh sách lên lưới
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
        var $grid = $("#grid_editing_sodu_hoadon").pqGrid(obj);

        //use refresh & refreshRow events to display jQueryUI buttons and bind events.
        function getRowSelect() { // --------------------Lấy dữ liệu theo dòng trên gird----------------------                 
            var arr = $("#grid_editing_sodu_hoadon").pqGrid("selection", {
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
			  isEdit = $("#grid_editing_sodu_hoadon").pqGrid("isDirty"); //Lấy giá trị đang chọn
             
             return isEdit;
         }

        //-----------------------------Hết lưới---------------------------------------------------------------------
		setTimeout(function(){
		$("#grid_editing_sodu_hoadon .pq-search-txt").focus();
	},100);
    });

</script>
<div id="dialog-sodu_hoadon"
     title="SỐ HÓA ĐƠN NHẬP TRONG KỲ (F4: Thêm mới , F7: Sao chép , F8: Xóa ,ESC : THOÁT)"><!-- dialog -->
    <div id="grid_editing_sodu_hoadon" style="margin:5px auto;border: 0px !important;"></div>
</div>