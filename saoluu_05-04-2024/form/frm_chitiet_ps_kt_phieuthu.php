<?php
$SoPhieu = $_GET['sophieu'];
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

    input.pg-cel-define {
        padding: 2px;
        vertical-align: bottom;
        width: 100%;
        z-index: 4;
        position: relative;
    }

    input.pq-ac-editor {
        padding: 2px;
        z-index: 4;
        position: relative;
    }

    .pq-row-edit {
        border: 2px dashed #ff0000;
    }

</style>
<script>
    $height = getHeight() - 100;
    $width = getWidth() - 150;
    $(function () {
        var $dir_module_chitiet_ps_kt_phieuthu = "";
        $dir_module_chitiet_ps_kt_phieuthu = "modules/chitietpsktphieuthu/";//--------------------------------------------Thay đổi khi copy
        $dir_module_manoidung = "modules/manoidung/";//--------------------------------------------Thay đổi khi copy
        $dir_module_httk_select = "modules/httk/";

        function xoadialog_chitiet_ps_kt_phieuthu() { // ----------------------đóng form
            reset_dialog(".dialog-chitiet_ps_kt_phieuthu");
            reset_dialog(".dialog_main_chitiet_pskt_phieuthu");
            $("#grid_editing_ps_kt_phieuthu :button").first().focus();
        }

        $("#dialog-chitiet_ps_kt_phieuthu").dialog({ // ------------------Gọi dialog
            resizable: false,
            height: $height,
            width: $width,
            modal: true

        });
        $("#dialog-chitiet_ps_kt_phieuthu").keydown(function (event) {//--------------Các phím tắt
            var $grid_pb = $("#grid_editing_chitiet_ps_kt_phieuthu").closest('.pq-grid');//---- Lưới----------------
            if ( event.keyCode == Keys.F8 || event.keyCode == Keys.ENTER) {
                var rowSelect = getRowSelect();//------ Lấy đối tượng được chọn
                if (rowSelect == false) {
                    alert_f("Chú Ý", "fa fa-warning", "red", "Bạn cần chọn dữ liệu trước khi thực hiện !");
                }
            }
            var rowEditting = $("#grid_editing_chitiet_ps_kt_phieuthu").pqGrid("getRowsByClass", {cls: 'pq-row-edit'});//---Lấy đối tượng đang sửa
            if ($('div').hasClass('jconfirm') == false) {

                if (event.keyCode == Keys.F8 ) { // Xóa
                    if (rowSelect != false) {
                        if (isEditing($grid_pb)) {
                            return false;
                        }
                        var rowIndx = rowSelect[0].rowIndx;
                        deleteRow(rowIndx, $grid_pb);
                    }
                }
                if (event.keyCode == Keys.ENTER) {
                    $sottpsct = rowSelect[0].rowData.sott;
                    $kyhieu = rowSelect[0].rowData.seri;
                    $sct = rowSelect[0].rowData.sct;
                    $ngayhoadon = rowSelect[0].rowData.ngayhoadon;
                    $makhachhang2= rowSelect[0].rowData.makhno;
                    $tenkhachhang2= rowSelect[0].rowData.tenkhachhang;
                    $diachi2= rowSelect[0].rowData.diachikh;
                    $mabophan= rowSelect[0].rowData.mabp;
                    $bophan= rowSelect[0].rowData.bophan;
                    $manoidung1 =rowSelect[0].rowData.mand1;
                    $noidung1=rowSelect[0].rowData.noidung1;
                    $tkno1=rowSelect[0].rowData.tkno1;
                    $sotien1=rowSelect[0].rowData.gtvnd1;

                    $manoidung2 =rowSelect[0].rowData.mand2;
                    $noidung2=rowSelect[0].rowData.noidung2;
                    $tkno2=rowSelect[0].rowData.tkno2;
                    $sotien2=rowSelect[0].rowData.gtvnd2;

                    $ghichu=rowSelect[0].rowData.chuthich;
                    $tongtien=rowSelect[0].rowData.tongtien;


                    $cothuegtgt = rowSelect[0].rowData.cothuegtgt;
                    if($cothuegtgt==1){
                        $("#cothuegtgt").attr("checked", true);
                    }else{
                        $("#cothuegtgt").attr("checked", false);
                    }

                    $("#sottpsct").val($sottpsct);
                    $("#kyhieu").val($kyhieu);
                    $("#sohoadon").val($sct);
                    $("#ngayhoadon").val($ngayhoadon);
                    $("#makhachhang2").val($makhachhang2);
                    $("#tenkhachhang2").val($tenkhachhang2);
                    $("#diachi2").val($diachi2);
                    $("#mabophan").val($mabophan);
                    $("#bophan").val($bophan);

                    $("#manoidung1").val($manoidung1);
                    $("#noidung1").val($noidung1);
                    $("#tkno1").val($tkno1);
                    $("#sotien1").val(FormatNumber($sotien1));

                    $("#manoidung2").val($manoidung2);
                    $("#noidung2").val($noidung2);
                    $("#tkno2").val($tkno2);
                    $("#sotien2").val(FormatNumber($sotien2));

                    $("#ghichu").val($ghichu);
                    $("#tongtien").val(FormatNumber($tongtien));




                    xoadialog_chitiet_ps_kt_phieuthu();
                }
                if (event.keyCode == Keys.ESCAPE && $('div').hasClass('jconfirm') == false && rowEditting.length < 1) {
                    change_data_quit_chitiet_ps_kt();
                }
            } else {
                return false;
            }
        }); // end phím tắt
        /* $.contextMenu('destroy');
         $.contextMenu({// Menu chuột phải
         selector: '#grid_editing_chitiet_ps_kt_phieuthu',
         build: function ($trigger, e) {
         return {
         callback: function (key, options) {
         var $grid_pb = $("#grid_editing_chitiet_ps_kt_phieuthu").closest('.pq-grid');
         var rowSelect = getRowSelect();
         if (rowSelect == false) {
         alert_f("Chú Ý", "fa fa-warning", "red", "Bạn cần chọn dữ liệu trước khi thực hiện !");
         }
         if (key == "Edit") {
         if (rowSelect != false) {
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
         var _dataRow = {
         lp: rowData.lp,
         makh: rowData.makh,
         tenkh: rowData.tenkh,
         mapskt: rowData.mapskt,
         address: rowData.address,
         masothue: rowData.masothue,
         loaict: rowData.loaict,
         mauso: rowData.mauso,
         seri: rowData.seri,
         sct: rowData.sct,
         ngay: rowData.date,
         mand: rowData.mand,
         noidung: rowData.noidung,
         tkno: rowData.tkno,
         gtvnd: rowData.gtvnd,
         mand2: rowData.mand2,
         gtvnd2: rowData.gtvnd2,
         noidung2: rowData.noidung2,
         tkno2: rowData.tkno2,
         date: rowData.date,
         datehd: rowData.datehd,
         datett: rowData.datett,
         ghichu: rowData.chuthich
         };
         addRow($grid_pb, _dataRow);
         }
         if (key == "Add") {
         addRow($grid_pb);
         }
         if (key == "Del") {
         if (rowSelect != false) {
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
         }; // end right menu*/
        function change_data_quit_chitiet_ps_kt() { // Cảnh báo thoát khi thay đổi dữ liệu////////////////////////////////////////////////////
            var $grid_pb = $("#grid_editing_chitiet_ps_kt_phieuthu").closest('.pq-grid');//---- Lưới----------------
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
                                    $grid_pb.find("#grid_editing_ps_kt").focus();
                                }
                            },
                            "Hủy bỏ": {
                                keys: ['N'], action: function () {
                                    $("#grid_editing_ps_kt_phieuthu").pqGrid("refreshDataAndView");
                                    xoadialog_chitiet_ps_kt_phieuthu();
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
                                $("#grid_editing_ps_kt_phieuthu").pqGrid("refreshDataAndView");
                                xoadialog_chitiet_ps_kt_phieuthu();
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
        var matk_select = function (ui) {
            var $cell = ui.$cell,
                rowData = ui.rowData,
                dataIndx = ui.dataIndx,
                cls = ui.cls, width = ui.column.minWidth,
                dc = $.trim(rowData[dataIndx]);
            $cell.css('padding', '0');

            var $inp = $("<input type='text'  name='" + dataIndx + "' class='" + cls + " pq-cell-editor pg-cel-define' />")
                .appendTo($cell)
                .val(dc).keypress(function (e) {
                    //$('.dialog_main3').load("form/frm_dm_httk_select.php?idstyle=grid_editing_ps_mavt");
                });
        }

        var taomauso = function (ui) {// Tạo Mẩu số khi đã chọn loại phiếu
            var $cell = ui.$cell,
                rowData = ui.rowData,
                dataIndx = ui.dataIndx,
                cls = ui.cls, width = ui.column.minWidth,
                dc = $.trim(rowData[dataIndx]);
            //if (rowData.mauso == "") {
            if (rowData.maloai == 1) {
                dc = "01 GTKT-3LL";
            } else if (rowData.maloai == 2) {
                dc = "02 GTTT-3LL ";
            }
            //}
            $cell.css('padding', '0');

            var $inp = $("<input type='text'  name='" + dataIndx + "' class='" + cls + " pq-cell-editor pg-cel-define' />")
                .appendTo($cell)
                .val(dc);
        }/////////////////////////////////////////////////////////////////////
        var laytkno = function (ui) {// Lấy TK nợ 1 khi chọn mã nội dung
            var $cell = ui.$cell,
                rowData = ui.rowData,
                dataIndx = ui.dataIndx,
                cls = ui.cls, width = ui.column.minWidth,
                dc = $.trim(rowData[dataIndx]);
            //console.log(ui);
            // if (rowData.tkco_mand == "") {
            $.ajax({// Lấy TK nợ
                url: $dir_module_manoidung + "laytkno.php",
                data: {

                    mand: rowData.mand,
                },
                async: false,
                success: function (response) {
                    $noidung = $.parseJSON((response));
                    dc = $noidung.tkco;
                }
            });
            //}
            $cell.css('padding', '0');

            var $inp = $("<input type='text'  name='" + dataIndx + "' class='" + cls + " pq-cell-editor pg-cel-define' />")
                .appendTo($cell)
                .val(dc);
        }/////////////////////////////////////////////////////////////////////
        var laytkno2 = function (ui) {// Lấy TK nợ 2 khi chọn mã nội dung
            var $cell = ui.$cell,
                rowData = ui.rowData,
                dataIndx = ui.dataIndx,
                cls = ui.cls, width = ui.column.minWidth,
                dc = $.trim(rowData[dataIndx]);
            // if (rowData.tkco_mand2 == "") {
            $.ajax({// Lấy TK nợ
                url: $dir_module_manoidung + "laytkno.php",
                data: {

                    mand: rowData.mand2,
                },
                async: false,
                success: function (response) {
                    $noidung = $.parseJSON((response));
                    dc = $noidung.tkco;
                }
            });
            // }
            $cell.css('padding', '0');

            var $inp = $("<input type='text'  name='" + dataIndx + "' class='" + cls + " pq-cell-editor pg-cel-define' />")
                .appendTo($cell)
                .val(dc);
        }/////////////////////////////////////////////////////////////////////
        var laymanoidung2 = function (ui) {// Lấy TK nợ 2 khi chọn mã nội dung
            var $cell = ui.$cell,
                rowData = ui.rowData,
                dataIndx = ui.dataIndx,
                cls = ui.cls, width = ui.column.minWidth,
                dc = $.trim(rowData[dataIndx]);

            if (rowData.mand2 == "" && rowData.maloai == 1) {
                $.ajax({// Lấy TK nợ
                    url: $dir_module_manoidung + "laymandbangtkco.php",
                    data: {

                        mand: rowData.mand2,
                    },
                    async: false,
                    success: function (response) {
                        $noidung = $.parseJSON((response));
                        dc = $noidung.mand;
                    }
                });
            }
            $cell.css('padding', '0');

            var $inp = $("<input type='text'  name='" + dataIndx + "' class='" + cls + " pq-cell-editor pg-cel-define' />")
                .appendTo($cell)
                .val(dc);
        }/////////////////////////////////////////////////////////////////////
        var laysotien2 = function (ui) {// Lấy TK nợ 2 khi chọn mã nội dung
            var $cell = ui.$cell,
                rowData = ui.rowData,
                dataIndx = ui.dataIndx,
                cls = ui.cls, width = ui.column.minWidth,
                dc = $.trim(rowData[dataIndx]);

            if (rowData.maloai == 1) {
                $.ajax({// Lấy TK nợ
                    url: $dir_module_manoidung + "laytkno.php",
                    data: {

                        mand: rowData.mand,
                    },
                    async: false,
                    success: function (response) {
                        $noidung = $.parseJSON((response));
                        $phantramvat = $noidung.rate_tax;
                        var re = /,/gi;
                        dc = parseFloat(rowData.gtvnd.replace(re, "")) * parseFloat($phantramvat / 100);
                    }
                });
            }
            $cell.css('padding', '0');

            var $inp = $("<input type='text'  name='" + dataIndx + "' class='" + cls + " pq-cell-editor pg-cel-define' />")
                .appendTo($cell)
                .val(dc);
        }/////////////////////////////////////////////////////////////////////

        var manoidung_select = function (ui) {
            var $cell = ui.$cell,
                rowData = ui.rowData,
                dataIndx = ui.dataIndx,
                cls = ui.cls, width = ui.column.minWidth,
                dc = $.trim(rowData[dataIndx]);
            $cell.css('padding', '0');

            var $inp = $("<input type='text'  name='" + dataIndx + "' class='" + cls + " pq-cell-editor pg-cel-define' readonly />")
                .appendTo($cell)
                .val(dc).keypress(function (e) {
                    $('.dialog_main_manoidung').load("form/frm_dm_manoidung_select.php?idstyle=grid_editing_chitiet_ps_kt_phieuthu");
                });
        }

        var formart_num = function (ui) {
            var $cell = ui.$cell,
                rowData = ui.rowData,
                dataIndx = ui.dataIndx,
                cls = ui.cls, width = ui.column.minWidth,
                dc = $.trim(rowData[dataIndx]);
            $cell.css('padding', '0');

            var $inp = $("<input type='text'  name='" + dataIndx + "' class='" + cls + " pq-cell-editor pg-cel-define' />")
                .appendTo($cell)
                .val(dc).keyup(function () {
                    var value = $(".pq-editor-focus").val();
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
            var rows = $grid.pqGrid("getRowsByClass", {cls: 'pq-row-edit'});
            if (rows.length > 0) {
                //focus on editor if any 
                $grid.find(".pq-editor-focus").focus();
                return true;
            }
            return false;
        }

        //-------------------------Thêm mới dữ liệu-------------------------------------------------------
        function addRow($grid, $obj_addrow="") {
            if (isEditing($grid)) {
                return false;
            }
            //append empty row in the first row.     
            if ($obj_addrow != "") {
                var rowData = $obj_addrow;
            } else {
                var rowData = {
                    lp: "",
                    makh: "",
                    tenkh: "",
                    mapskt: "<?php echo $MaPSKT ?>",
                    address: "",
                    masothue: "",
                    loaict: "",
                    mauso: "",
                    seri: "",
                    sct: "",
                    ngay: "",
                    mand: "",
                    tkno: "",
                    gtvnd: "",
                    mand2: "",
                    gtvnd2: "",
                    noidung2: "",
                    tkno2: "",
                    noidung: "",
                    date: "<?php echo date("Y-m-d") ?>",
                    datehd: "<?php echo date("Y-m-d") ?>",
                    datett: "<?php echo date("Y-m-d") ?>",
                    ghichu: ""
                }; //empty row template
            }
            $grid.pqGrid("addRow", {rowIndxPage: 0, rowData: rowData});

            var $tr = $grid.pqGrid("getRow", {rowIndxPage: 0});
            if ($tr) {
                //simulate click on edit button.
                $tr.find("button.edit_btn").click();
            }
        }

        //----------------------------Hàm xóa dữ kiệu------------------------------------------
        function deleteRow(rowIndx, $grid) {
            $grid.pqGrid("addClass", {rowIndx: rowIndx, cls: 'pq-row-delete'});
            var rowData = $grid.pqGrid("getRowData", {rowIndx: rowIndx});
            //var ans = window.confirm("Bạn có muốn xóa dòng số " + (rowIndx + 1) + " không ?");
            if ($('div').hasClass('jconfirm') == false) {
                $.confirm({
                    title: "Chú ý", icon: "fa fa-times-circle", type: "red",
                    content: "Bạn có muốn xóa hàng số" + (rowIndx + 1) + "  không ?" + '<br/>Nhấn phím <strong style="color:blue;">[Y]</strong> để đồng ý phím <strong style="color:red;">[N]</strong> để hủy bỏ ',
                    buttons: {
                        "Đồng ý": {
                            keys: ['Y'], action: function () {
                                $grid.pqGrid("deleteRow", {rowIndx: rowIndx, effect: true});

                                var sott = $grid.pqGrid("getRecId", {rowIndx: rowIndx});
                                var rowData = ( $grid.pqGrid("getRowData", {rowIndx: rowIndx}));
                                var ma = rowData.mavt;

                                $.ajax($.extend({}, ajaxObj, {
                                    context: $grid,
                                    url: $dir_module_chitiet_ps_kt_phieuthu + "del.php",
                                    data: {id: sott, ma: ma},
                                    success: function (result) {
                                        this.pqGrid("commit");
                                        this.pqGrid("refreshDataAndView");
                                    },
                                    error: function () {
                                        this.pqGrid("removeClass", {rowData: rowData, cls: 'pq-row-delete'});
                                        this.pqGrid("rollback");
                                    }
                                }));
                            }
                        },
                        "Hủy bỏ": {
                            keys: ['N'], action: function () {
                                $grid.pqGrid("removeClass", {rowIndx: rowIndx, cls: 'pq-row-delete'});
                            }
                        }
                    }
                });
            }
        }

        //------------------------------Thây đổi row khi nhấp edit-----------------------------------
        function editRow(rowIndx, $grid) {

            $grid.pqGrid("addClass", {rowIndx: rowIndx, cls: 'pq-row-edit'});

            //change edit button to update button and delete to cancel.
            var selectCell = (getRowSelect());
            if (selectCell == false) {
                var dataIndex = 1;
            } else {
                var dataIndex = selectCell[0].dataIndx;
            }
            if (dataIndex == 1 || dataIndex == "mapskt" || dataIndex == "tennoidung") {
                $grid.pqGrid("editFirstCellInRow", {rowIndx: rowIndx});
            } else {
                $grid.pqGrid("editCell", {rowIndx: rowIndx, dataIndx: dataIndex});
            }
            var $tr = $grid.pqGrid("getRow", {rowIndx: rowIndx}),
                $btn = $tr.find("button.edit_btn");
            $btn.button("option", {label: "", "icons": {primary: "ui-icon-disk"}})
                .unbind("click")
                .click(function (evt) {
                    evt.preventDefault();
                    return update(rowIndx, $grid);

                });
            $btn.next().button("option", {label: "", "icons": {primary: "ui-icon-cancel"}})
                .unbind("click")
                .click(function (evt) {
                    $grid.pqGrid("quitEditMode");
                    $grid.pqGrid("removeClass", {rowIndx: rowIndx, cls: 'pq-row-edit'});
                    $grid.pqGrid("refreshRow", {rowIndx: rowIndx});
                    $grid.pqGrid("rollback");
                });
        }

        //---------------------------Cập nhật row-----------------------------------------
        function update(rowIndx, $grid) {

            if ($grid.pqGrid("saveEditCell") == false) {
                return false;
            }

            var isValid = $grid.pqGrid("isValid", {rowIndx: rowIndx}).valid;
            if (!isValid) {//Kiểm tra có sửa dữ liệu không
                return false;
            }
            var isDirty = $grid.pqGrid("isDirty");
            if (isDirty) {
                var url,
                    rowData = $grid.pqGrid("getRowData", {rowIndx: rowIndx}),
                    recIndx = $grid.pqGrid("option", "dataModel.recIndx");

                //rowData.mapskt1 = 111;
                //console.log(rowData);

                $grid.pqGrid("removeClass", {rowIndx: rowIndx, cls: 'pq-row-edit'});

                if (rowData[recIndx] == null) {
                    //url to add records.
                    url = $dir_module_chitiet_ps_kt_phieuthu + "add.php";
                }
                else {
                    //url to  update records.
                    url = $dir_module_chitiet_ps_kt_phieuthu + "edit.php";
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
                        this.pqGrid("removeClass", {rowIndx: rowIndx, cls: 'pq-row-edit'});
                        this.pqGrid("commit");
                        $grid.pqGrid("refreshDataAndView");
                    }
                }));
            } else {
                $grid.pqGrid("quitEditMode");
                $grid.pqGrid("removeClass", {rowIndx: rowIndx, cls: 'pq-row-edit'});
                $grid.pqGrid("refreshRow", {rowIndx: rowIndx});
            }
        }

        var makh_select = function (ui) {
            var $cell = ui.$cell,
                rowData = ui.rowData,
                dataIndx = ui.dataIndx,
                cls = ui.cls, width = ui.column.minWidth,
                dc = $.trim(rowData[dataIndx]);
            $cell.css('padding', '0');

            var $inp = $("<input type='text'  name='" + dataIndx + "' class='" + cls + " pq-cell-editor pg-cel-define' readonly />")
                .appendTo($cell)
                .val(dc).keypress(function () {
                    $('.dialog_main_makh').load("form/frm_dm_makh_select.php?idstyle=grid_editing_chitiet_ps_kt_phieuthu");
                });
        }

        //--------------------------------Khai báo lưới---------------------------------------.
        var obj = {
            wrap: false,
            hwrap: false,
            resizable: true,
            columnBorders: true,
            numberCell: {show: true},
            track: true, //to turn on the track changes.
            freezeCols: 6,
            sorting: 'local',
            sortIndx: 'sott',
            sortDir: 'up',
            title: null,
            height: $height - 58,
            width: $width - 14,
            toolbar: {
                items: [
                    {
                        type: 'button', icon: 'ui-icon-plus', label: 'Thêm mới(F4)', listeners: [
                        {
                            "click": function (evt, ui) {
                                var $grid = $(this).closest('.pq-grid');
                                addRow($grid);
                            }
                        }
                    ]
                    },
                    {
                        type: 'button', icon: 'ui-icon-circle-close', label: 'Kết thúc', listeners: [
                        {
                            "click": function (evt, ui) {
                                //xoadialog_chitiet_ps_kt_phieuthu();
                                change_data_quit_chitiet_ps_kt();
                            }
                        }
                    ]
                    }
                ]
            },
            scrollModel: {
                autoFit: false // Kéo rộng cột
            },
            selectionModel: {type: 'cell', mode: 'single'},
            filterModel: {
                on: true,
                mode: "AND",
                header: true
            }, // lọc dữ liệu trên header
            hoverMode: 'cell', // di chuyển chuột trên từng cột
            editModel: {
                //onBlur: 'validate',
                saveKey: $.ui.keyCode.ENTER,
                keyUpDown: false,
                clicksToEdit: 1
            },
            editor: {type: 'textbox', select: true,},
            validation: {
                icon: 'ui-icon-info'
            },
            colModel: [//-------------------------------------------Khai báo các cột trong lưới-----------------------
                {title: "SoTT", dataType: "integer", dataIndx: "sott", editable: false, width: 0, hidden: true},
                {
                    title: "Sửa|Xóa",
                    editable: false,
                    minWidth: 75,
                    align: "center",
                    sortable: false,
                    render: function (ui) {
                        return "<button type='button' class='delete_btn'></button>";
                    }
                },
                {
                    title: "Loại CT", minWidth: 120, dataType: "string", align: "left", dataIndx: "maloai",
                    filter: {
                        type: "select",
                        condition: 'equal',
                        prepend: {'': '--Tất cả--'},
                        listeners: ['change'],
                        options: function (ui) {
                            //remote validation
                            var parsedJson = "";
                            $.ajax({
                                url: $dir_module_chitiet_ps_kt_phieuthu + "cb_loaict.php",
                                data: {},
                                async: false,
                                success: function (response) {
                                    parsedJson = $.parseJSON(response);
                                }
                            });
                            return parsedJson;
                        }
                    },
                    render: function (ui) {
                        var $maloaict = ui.rowData.maloai;
                        var $TenLoai = "";
                        $.ajax({
                            url: $dir_module_chitiet_ps_kt_phieuthu + "ten_loaict.php",
                            data: {ma: $maloaict},
                            async: false,
                            success: function (response) {
                                $TenLoai = response;
                            }
                        });
                        return $TenLoai;
                    },

                    validations: [
                        {type: 'minLen', value: 1, msg: "Loại chứng từ không được trống!"}
                    ]
                },
                {
                    title: "Mã KH", minWidth: 100, dataType: "string", dataIndx: "makhno",
                    validations: [
                        {type: 'minLen', value: 1, msg: "Mã khách hàng không được trống !"}
                    ],
                    editor: {
                        type: makh_select,
                    },
                    filter: {
                        type: 'textbox',
                        condition: 'begin',
                        listeners: ['keyup']
                    }
                },
                {
                    title: "Tên KH",
                    minWidth: 300,
                    dataType: "string",
                    align: "left",
                    dataIndx: "tenkhachhang",
                    editable: false,

                },
                {
                    title: "Địa chỉ",
                    minWidth: 200,
                    dataType: "string",
                    align: "left",
                    dataIndx: "diachikh",
                    editable: false,

                },

                {title: "Ký hiệu", minWidth: 120, dataType: "string", align: "left", dataIndx: "seri"},
                {title: "Số HĐ", minWidth: 120, dataType: "string", align: "left", dataIndx: "sct"},
                /*{
                 title: "Ngày", minWidth: 120, dataType: "string", align: "left", dataIndx: "date",
                 render: function (ui) {
                 var $yyyy_mm_dd = ui.rowData.date;
                 return Format_dd_mm_yyyy($yyyy_mm_dd);
                 },
                 editor: {
                 type: 'date'
                 }
                 },*/
                {
                    title: "Mã ND", minWidth: 150, dataType: "string", align: "left", dataIndx: "mand1",
                    validations: [
                        {type: 'minLen', value: 1, msg: "Mã nội dung không được trống !"},
                        {
                            type: function (ui) {
                                var value = ui.value,
                                    _found = false, sott = ui.rowData.sott;
                                //remote validation
                                $.ajax({
                                    url: $dir_module_manoidung + "checkkey.php",
                                    data: {'id': value},
                                    async: false,
                                    success: function (response) {
                                        if (response == 1) {
                                            _found = true;
                                        }
                                    }
                                });
                                if (!_found) {
                                    ui.msg = value + " Không tồn tại trong danh sách nội dung !";
                                    $('.dialog_main_manoidung').load("form/frm_dm_manoidung_select.php?idstyle=grid_editing_chitiet_ps_kt_phieuthu");
                                    return false;
                                }
                            }
                        }
                    ]
                },
                {
                    title: "Nội dung",
                    minWidth: 150,
                    dataType: "string",
                    align: "left",
                    editable: false,
                    dataIndx: "noidung1"
                },
                {
                    title: "Mã TK", minWidth: 150, dataType: "string", align: "left", dataIndx: "tkno1",
                },
                {
                    title: "Số tiền", minWidth: 150, dataType: "string", align: "left", dataIndx: "gtvnd1",
                    render: function (ui) {
                        var gtvnd = ui.rowData.gtvnd1;
                        return FormatNumber(gtvnd);
                    }
                },
                {
                    title: "Mã ND 2", minWidth: 150, dataType: "string", align: "left", dataIndx: "mand2",
                },
                {
                    title: "Nội dung 2",
                    minWidth: 150,
                    dataType: "string",
                    align: "left",
                    editable: false,
                    dataIndx: "noidung2"
                },
                {
                    title: "Mã TK 2", minWidth: 150, dataType: "string", align: "left", dataIndx: "tkno2",
                    editor: {
                        type: laytkno2,
                    },
                    validations: [
                        {
                            type: function (ui) {
                                var value = ui.value,
                                    _found = false, sott = ui.rowData.sott;
                                //remote validation
                                if (ui.rowData.mand2 != "") {
                                    $.ajax({
                                        url: $dir_module_httk_select + "checkkey.php",
                                        data: {'id': value},
                                        async: false,
                                        success: function (response) {
                                            if (response == 1) {
                                                _found = true;
                                            }
                                        }
                                    });
                                    if (_found) {
                                        //ui.msg = value + " đã tồn tại trong hệ thống";
                                        // return false;
                                    } else {
                                        ui.msg = value + " không tồn tại trông hệ thống tài khoản !";
                                        $('.dialog_main_httk').load("form/frm_dm_httk_select.php?idstyle=grid_editing_chitiet_ps_kt_phieuthu");
                                        return false;
                                    }
                                }
                            }
                        }
                        ,
                    ]
                },
                {
                    title: "Số tiền 2", minWidth: 150, dataType: "string", align: "left", dataIndx: "gtvnd2",
                    validations: [
                        {type: 'maxLen', value: 15, msg: "Giá trị hợp đồng phải nhỏ hơn 15 số !"}
                    ],
                    render: function (ui) {
                        var gtvnd = ui.rowData.gtvnd2;
                        return FormatNumber(gtvnd);
                    },
                },
                {
                    title: "Tổng tiền", minWidth: 150, dataType: "string", align: "left", dataIndx: "tongtien",
                    render: function (ui) {
                        var tongtien = ui.rowData.tongtien;
                        return FormatNumber(tongtien);
                    },
                },
                //filter: { type: 'textbox', condition: "between", listeners: ['keyup'] }

                {
                    title: "Ngày HĐ", minWidth: 150, dataType: "string", align: "left", dataIndx: "datehd",
                    render: function (ui) {
                        var $yyyy_mm_dd = ui.rowData.ngayhoadon;
                        return Format_dd_mm_yyyy($yyyy_mm_dd);
                    }

                },
                {
                    title: "Ngày T.Toán", minWidth: 100, dataType: "string", align: "left", dataIndx: "datett",
                    render: function (ui) {
                        var $yyyy_mm_dd = ui.rowData.ngaythanhtoan;
                        return Format_dd_mm_yyyy($yyyy_mm_dd);
                    }
                },

            ],//-----------------------------------------Kết thúc các cột---------------------------------------
            dataModel: {
                dataType: "JSON",
                location: "remote",
                recIndx: "sott",
                postData: function (ui) {
                    return {sophieu:<?php echo $SoPhieu; ?>};
                },
                url: $dir_module_chitiet_ps_kt_phieuthu + "list.php",//-- Load danh sách lên lưới
                getData: function (response) {
                    return {data: response.data};
                }
            },
            detailModel: {
                cache: true,
                collapseIcon: "ui-icon-plus",
                expandIcon: "ui-icon-minus"
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
                if ($grid.pqGrid("hasClass", {rowIndx: rowIndx, cls: 'pq-row-edit'}) == true) {
                    return true;
                }
                else {
                    return false;
                }
            }
        };
        var $grid = $("#grid_editing_chitiet_ps_kt_phieuthu").pqGrid(obj);

        /* $grid.one("pqgridload", function (evt, ui) {
         var column = $grid.pqGrid("getColumn", {dataIndx: "manhom"});
         var filter = column.filter;
         filter.cache = null;
         filter.options = $grid.pqGrid("getData", {dataIndx: ["tennhom", "manhom"]});// lấy 1 hoặc nhiều dataindex
         $grid.pqGrid("refreshHeader");
         });*/
        //use refresh & refreshRow events to display jQueryUI buttons and bind events.
        $grid.on('pqgridrefresh pqgridrefreshrow', function () {
            //debugger;
            var $grid = $(this);
            //delete button
            $grid.find("button.delete_btn").button({icons: {primary: 'ui-icon-close'}})
                .unbind("click")
                .bind("click", function (evt) {
                    if (isEditing($grid)) {
                        return false;
                    }
                    var $tr = $(this).closest("tr"),
                        rowIndx = $grid.pqGrid("getRowIndx", {$tr: $tr}).rowIndx;
                    deleteRow(rowIndx, $grid);
                });
            //edit button
            $grid.find("button.edit_btn").button({icons: {primary: 'ui-icon-pencil'}})
                .unbind("click")
                .bind("click", function (evt) {
                    if (isEditing($grid)) {
                        return false;
                    }
                    var $tr = $(this).closest("tr"),
                        rowIndx = $grid.pqGrid("getRowIndx", {$tr: $tr}).rowIndx;

                    editRow(rowIndx, $grid);
                    return false;
                });

            //rows which were in edit mode before refresh, put them in edit mode again.
            var rows = $grid.pqGrid("getRowsByClass", {cls: 'pq-row-edit'});
            if (rows.length > 0) {
                var rowIndx = rows[0].rowIndx;
                editRow(rowIndx, $grid);
            }
        });
        function getRowSelect() { // --------------------Lấy dữ liệu theo dòng trên gird----------------------                 
            var arr = $("#grid_editing_chitiet_ps_kt_phieuthu").pqGrid("selection", {
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
<div id="dialog-chitiet_ps_kt_phieuthu"
     title="Chi tiết phát sinh kế toán">
    <!-- dialog -->
    <div id="grid_editing_chitiet_ps_kt_phieuthu" style="margin:5px auto;border: 0px !important;"></div>
</div>