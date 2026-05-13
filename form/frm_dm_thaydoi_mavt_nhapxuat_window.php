<?php
$class=$_GET['id'];
?>
<!DOCTYPE HTML>
<html lang="vi">
<head>
    <meta charset="utf-8"/>
    <title>Thay đổi mã vật tư phiếu nhập/xuất</title>
    <link rel="shortcut icon" type="image/x-icon" href="icon/favicon.ico"/>
    <meta http-equiv="content-type" content="text/html" />
    <meta name="author" content="ketoanchienthuat.com" />



    <script type="text/javascript" src="../js/jquery.js"></script>

    <script type="text/javascript" src="../js/jquery.easing.1.3.js"></script>
    <script type="text/javascript" src="../js/script.js"></script>
    <script type="text/javascript" src="../js/jquery.min.js"></script>
    <script type="text/javascript" src="../number/jquery.number.js"></script>


    <!-- dialog jquery ui-->
    <link rel="stylesheet" href="../css/jquery-ui.min.css"/>
    <script src="../js/jquery-ui.js"></script>

    <!-- menu right -->
    <link href="../src/jquery.contextMenu.css" rel="stylesheet" type="text/css" />
    <script src="../src/jquery.contextMenu.js" type="text/javascript"></script>
    <script src="../js/function_window.js"></script>

    <!--PQ Grid files-->
    <link rel="stylesheet" href="../grid/pqgrid.min.css" />
    <script src="../grid/pqgrid.min.js"></script>
    <!--PQ Grid Office theme-->
    <link rel="stylesheet" href="../grid/themes/office/pqgrid.css" />

    <link rel="stylesheet" href="../comfirm/libs/bundled.css"/>
    <link rel="stylesheet" href="../comfirm/demo.css"/>
    <!-- jquery-confirm files -->
    <link rel="stylesheet" type="text/css"href="../css/jquery-confirm.css"/>
    <script type="text/javascript" src="../js/jquery-confirm.js"></script>
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
            $dir_module_mavattu = "../modules/mavattu/";//--------------------------------------------Thay đổi khi copy
            var $dir_module_manhom = "../modules/manhomvattu/";//
            var $dir_module_chitiet_vattu = "../modules/ps_chitiet_mavt/";//--------------------------------------------Thay đổi khi copy

            var $listmakhachhang = "";// Danh sách khách hàng

            $.ajax({// Load danh sách mã khách hàng
                url: $dir_module_mavattu + "listall.php",
                async: false,
                dataType: "json",
                success: function (response) {

                    $array = (response);
                    // var js_arr = response.js_arr;
                    for (var i = 0; i < $array.length; i++) {
                        $listmakhachhang += '<option value=' + $array[i].mavt + '>'+ bodauTiengViet($array[i].tenvt) + '</option>';
                    }
                }
            });

            $("#listmakhachhang").html($listmakhachhang);

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
                        content: 'Bạn đang chuẩn bị thoát cửa sổ này ? .<br/>Nhấn phím <strong style="color:blue;">[Y]</strong> để đồng ý phím <strong style="color:red;">[N]</strong> để hủy bỏ ',
                        icon: 'fa fa-warning',
                        type: 'red',
                        buttons: {
                            "Đồng ý": { keys: ['Y'],action: function () {
                                window.close();
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
                hwrap: false,
                resizable: true,
                rowBorders: true,
                height:$height-58,
                width:$width-20,
                virtualX: true,
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
                    $mavt = rowData.mavt;
                    mavtdoi  = rowData.mavtdoi;
                    var $datamavt = 0;
                    $.ajax({
                        url: $dir_module_chitiet_vattu + "getmavt.php", // Bao gồm cả add và edit
                        type: "get", // chọn phương thức gửi là get
                        async: false,
                        data: { // Danh sách các thuộc tính sẽ gửi đi
                            mavt: mavtdoi,
                        },
                        success: function (result) {
                            $datamavt = $.parseJSON(result);
                        }
                    });
                    if (mavtdoi == "" ) {
                        return false;
                    }
                    if ($datamavt == "0" ) {
                        alert("Mã vật tư không tồn tại trong hệ thống ! Vui Lòng nhập lại mã khác !");
                        $grid.pqGrid("rollback");
                        return false;
                    }else{
                        var res = confirm("Hệ thống sẽ thay đổi toàn bộ Mã: "+$mavt+" trong phiếu nhập/xuất kho thành Mã: "+mavtdoi+" . \n Bạn có muốn tiếp tục thay đổi không ?");
                        if(!res){
                            $grid.pqGrid("rollback");
                            return false;
                        }
                    }

                    rowData.tenvt = $datamavt.tenvt;

                    rowData.dvt = $datamavt.dvt;

                    var url="";
                    if (type == 'update') {
                        var valid = grid.isValid({ rowData: rowData, allowInvalid: true }).valid;
                        if (valid) {
                            if (rowData[recIndx] == null) {
                                url = $dir_module_mavattu+"edit_chitiet.php";
                            }
                            else {
                                url = $dir_module_mavattu+"edit_chitiet.php";
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
                    { title: "Lưu", dataType: "integer", dataIndx: "sott", editable: false, width: 0, hidden:false,
                        render: function (ui) {
                            var $val  = ui.rowData.sott;
                            if($val==0 || $val=="" || typeof $val == 'undefined'){
                                return "<img src='../icon/uncheck.png' width='20px'/>";
                            } else {
                                return "<img src='../icon/check.png' width='20px' />";
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
                            }
                        ],
                        filter: {
                            type: 'textbox',
                            condition: 'begin',
                            listeners: ['keyup']
                        }
                    },
                    { title: "Mã VT cần đổi", dataType: "string", dataIndx: "mavtdoi", minWidth: 110,sortable: true,
                        editor: {
                            type: "textbox",
                            cls: "listmakhachhang",
                            attr: "list='listmakhachhang' id='idlistmakhachhang'"
                        },
                        filter: {
                            type: 'textbox',
                            condition: 'begin',
                            listeners: ['keyup']
                        }
                    },
                    { title: "Tên VT", minWidth: 200, dataType: "string", dataIndx: "tenvt",editable: false,
                        validations: [
                            { type: 'minLen', value: 1, msg: "Tên vật tư hàng hóa không được trống !" }
                        ],
                        filter: {
                            type: 'textbox',
                            condition: 'begin',
                            listeners: ['keyup']
                        }
                    },
                    { title: "Mã nhóm", minWidth: 150, dataType: "string", align: "left", dataIndx: "manhom",editable: false,
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

                    { title: "Quy cách", minWidth: 80, dataType: "string", align: "left", dataIndx: "quycach",editable: false,},
                    { title: "Đơn vị tính", minWidth: 80, dataType: "string", align: "center", dataIndx: "dvt",editable: false,
                        validations: [
                            { type: 'minLen', value: 1, msg: "Đơn vị tính chính không được trống !" },
                        ]
                    },
                    { title: "Thuế suất(%)", minWidth: 100, dataType: "string", align: "center", dataIndx: "rate",editable: false,
                        validations: [
                            { type: 'minLen', value: 1, msg: "Thuế xuất không được trống !" },
                            { type: 'maxLen', value: 2, msg: "Thuế xuất không được quá 2 số !" }
                        ],
                        render:function( ui ){
                            var rate = ui.rowData.rate;
                            return rate+"%";
                        }
                    },
                    { title: "Đơn vị tính phụ", minWidth: 120, dataType: "string", align: "left", dataIndx: "dvtp",editable: false},
                    { title: "khối lượng", minWidth: 120, dataType: "string", align: "left", dataIndx: "kl",hidden:true,editable: false,
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
                    { title: "kt", minWidth: 120, dataType: "string", align: "left", dataIndx: "kt",hidden:true,editable: false,
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
                    { title: "Giá bán", minWidth: 150, dataType: "string", align: "left", dataIndx: "giaban",hidden:true,editable: false,
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
                    { title: "Giá bán sỉ", minWidth: 150, dataType: "string", align: "left", dataIndx: "giabansi",hidden:true,editable: false,
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
                    { title: "Giá vốn", minWidth: 150, dataType: "string", align: "left", dataIndx: "giamua",hidden:true,editable: false,
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

                    { title: "Mark", minWidth: 60, dataType: "string", align: "left", dataIndx: "mark",hidden:true,editable: false,
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
                    { title: "Chiết khấu (%)", minWidth: 80, dataType: "string", dataIndx: "dp",hidden:true,
                        validations: [
                            { type: 'maxLen', value: 2, msg: "Chiết khấu phải nhỏ hơn 2 số !" }
                        ],
                        render:function( ui ){
                            var dp = ui.rowData.dp;
                            return dp+"%";
                        }
                    },
                    { title: "Hạn mức tồn kho nhỏ nhất", minWidth: 150, dataType: "string", align: "left", dataIndx: "min",hidden:true,
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
                    { title: "Hạn mức tồn kho lớn nhất", minWidth: 150, dataType: "string", align: "left", dataIndx: "max",hidden:true,
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
                    { title: "Mức", minWidth: 150, dataType: "string", align: "left", dataIndx: "muc",hidden:true,hidden:true,
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
                    { title: "Chú thích", minWidth: 150, dataType: "string", align: "left", dataIndx: "ghichu",hidden:true,
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

            var $grid = $("#grid_editing_mavt").pqGrid(objmavt);

            // Kết thúc tại đây
            $grid.one("pqgridload", function (evt, ui) {
                try {
                    var column = $grid.pqGrid("getColumn", {dataIndx: "manhom"});
                    var filter = column.filter;
                    filter.cache = null;
                    filter.options = $grid.pqGrid("getData", {dataIndx: ["tennhom", "manhom"]});// lấy 1 hoặc nhiều dataindex
                }catch(err){

                }
                $grid.pqGrid("refreshHeader");
            });
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

            setTimeout(function(){
                $("#grid_editing_mavt .pq-search-hd-field").focus();
            },100);
            //-----------------------------Hết lưới---------------------------------------------------------------------

        });
    </script>
</head>
<body>
    <div id="dialog-mavattu" title="Thay đổi mã vật tư phiếu nhập/xuất"><!-- dialog -->
        <div id="grid_editing_mavt" style="margin:5px auto;border: 0px !important;"></div>
        <datalist id="listmakhachhang"></datalist>
    </div>
</body>
</html>