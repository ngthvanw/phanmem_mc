<script>
    //-------------------------Lưới-----------------------------------------
    $("#grid_editing_chitiet_nhapkho").keydown(function (event) {//--------------Các phím tắt
        var $grid_pb = $("#grid_editing_chitiet_nhapkho").closest('.pq-grid');//---- Lưới----------------
        if (event.keyCode == Keys.F2 || event.keyCode == Keys.F7 || event.keyCode == Keys.F8) {
            var rowSelect = getRowSelect();//------ Lấy đối tượng được chọn
            if (rowSelect == false) {
                alert_f("Chú Ý", "fa fa-warning", "red", "Bạn cần chọn dữ liệu trước khi thực hiện !");
            }
        }
        var rowEditting = $("#grid_editing_chitiet_nhapkho").pqGrid("getRowsByClass", {cls: 'pq-row-edit'});//---Lấy đối tượng đang sửa
        if ($('div').hasClass('jconfirm') == false) {
            if (event.keyCode == Keys.F4) {
                addRow($grid_pb);
            }
            if (event.keyCode == Keys.F2) {// Sửa
                if (rowSelect != false) {
                    if (isEditing($grid_pb)) {
                        return false;
                    }
                    var rowIndx = rowSelect[0].rowIndx;
                    editRow(rowIndx, $grid_pb);
                    return false;
                }
            }

            if (event.keyCode == Keys.F9) { // Lưu
                if (isEditing($grid_pb)) {
                    var rowIndx = rowEditting[0].rowIndx;
                    update(rowIndx, $grid_pb);
                    tkno1.val("1111");
                    tkno2.val("1111");
                    tkco1.val("1111");
                    tkco2.val("1331");
                }
            }
            if (event.keyCode == Keys.END) { // Hủy bỏ hàng đang xóa
                if (isEditing($grid_pb)) {
                    var rowIndx = rowEditting[0].rowIndx;
                    $grid_pb.pqGrid("quitEditMode");
                    $grid_pb.pqGrid("removeClass", {rowIndx: rowIndx, cls: 'pq-row-edit'});
                    $grid_pb.pqGrid("refreshRow", {rowIndx: rowIndx});
                    $grid_pb.pqGrid("rollback");
                }
            }
            if (event.keyCode == Keys.ESCAPE && $('div').hasClass('jconfirm') == false && rowEditting.length < 1) {
//  change_data_quit_chitiet_nhapkho();
            }
        } else {
            return false;
        }
    }); // end phím tắt

    //----------------------------------------------------Bắt đầu lưới-----------------------------------------

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
                mavt: "",
                tenvt: "",
                mavtcha: "",
                matk: "",
                quycach: "",
                dvt: "",
                dvtp: "",
                kl: "",
                kt: "",
                giaban: "",
                giabansi: "",
                giamua: "",
                rate: "",
                mark: "",
                congvao: "",
                trura: "",
                dp: "",
                min: "",
                max: "",
                muc: "",
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
                                url: $dir_module_chitiet_vattu + "del.php",
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
        var dataIndex = 1;

        if (dataIndex == 1) {
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

            $grid.pqGrid("removeClass", {rowIndx: rowIndx, cls: 'pq-row-edit'});

            if (rowData[recIndx] == null) {
//url to add records.
                url = $dir_module_chitiet_vattu + "add.php";
            }
            else {
//url to  update records.
                url = $dir_module_chitiet_vattu + "edit.php";
            }
            rowData.mapskt = 1;

            $soluong = parseFloat(rowData.soluongnhap);
            $dongia = parseFloat(rowData.donggianhap);
            $thanhtien = $soluong * $dongia;

            rowData.thanhtien = $thanhtien;
            $thuesuat = parseFloat(rowData.thuesuat);
            $tienthue = $thanhtien * ($thuesuat / 100);

            rowData.thue = $tienthue;
            console.log(rowData);

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
                    $grid.pqGrid("refreshRow", {rowIndx: rowIndx});
                }
            }));
        } else {
            $grid.pqGrid("quitEditMode");
            $grid.pqGrid("removeClass", {rowIndx: rowIndx, cls: 'pq-row-edit'});
            $grid.pqGrid("refreshRow", {rowIndx: rowIndx});
        }
    }

    //--------------------------------Khai báo lưới---------------------------------------.
    var obj = {
        wrap: false,
        hwrap: false,
        resizable: true,
        columnBorders: true,
        numberCell: {show: true},
        track: true, //to turn on the track changes.
        freezeRows: 1,
        sorting: 'local',
        sortIndx: 'mavt',
        sortDir: 'up',
//flexHeight: true,
        title: null,
        height: $height - 58,
        width: $width - 20,
        showBottom: false,
        scrollModel: {
            autoFit: true
        },
        selectionModel: {type: 'cell', mode: 'single'},
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
        editor: {type: 'textbox', select: true,},
        validation: {
            icon: 'ui-icon-info'
        },
        colModel: [//-------------------------------------------Khai báo các cột trong lưới-----------------------
            {title: "SoTT", dataType: "integer", dataIndx: "sott", editable: false, width: 0, hidden: true},
            {
                title: "Mã VT", dataType: "string", dataIndx: "mavt", minWidth: 100, sortable: true, editable: false,
                validations: [
                    {
                        type: 'minLen',
                        value: 2,
                        msg: "Mã vật tư phải có từ 2 ký tự đến 14 ! Nhập vào 00 để mã vật tư tự phát sinh !"
                    },
                    {
                        type: 'maxLen',
                        value: 14,
                        msg: "Mã vật tư phải có từ 2 ký tự đến 14 ! Nhập vào 00 để mã vật tư tự phát sinh !"
                    },
                    {
                        type: function (ui) {
                            var value = ui.value,
                                _found = false, sott = ui.rowData.sott;
//remote validation
                            $.ajax({
                                url: $dir_module_chitiet_vattu + "checkkey.php",
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
                ]
            },
            {
                title: "Tên VT", minWidth: 180, dataType: "string", dataIndx: "tenvt", editable: false,
                validations: [
                    {type: 'minLen', value: 1, msg: "Tên vật tư hàng hóa không được trống !"}
                ]
            },
            {
                title: "ĐVT", minWidth: 90, dataType: "string", align: "left", dataIndx: "dvt", editable: false,
                validations: [
                    {type: 'minLen', value: 1, msg: "Đơn vị tính chính không được trống !"},
                ]
            },
            {
                title: "số lượng", minWidth: 80, dataType: "string", align: "left", dataIndx: "soluongnhap",
                editor: {
                    type: formart_num
                }/*,
             render: function (ui) {
             var giamua = ui.rowData.soluongtong;
             return FormatNumber(giamua);
             }*/,
                validations: [
                    {type: 'minLen', value: 1, msg: "Số Lượng nhập không được trống !"},
                ]
            },
            {
                title: "Đơn giá", minWidth: 80, dataType: "string", align: "left", dataIndx: "donggianhap",
                editor: {
                    type: formart_num
                },
                validations: [
                    {type: 'minLen', value: 1, msg: "Đơn giá không được trống !"},
                    {type: 'maxLen', value: 16, msg: "Giá mua phải nhỏ hơn 17 số !"},
                ],
                render: function (ui) {

                    return FormatNumber(ui.rowData.donggianhap);
                }
            },
            {
                title: "Thành tiền",
                minWidth: 100,
                dataType: "string",
                align: "left",
                dataIndx: "thanhtien",
                editable: false,
                editor: {
                    type: formart_num
                }, /*,
             validations: [
             {type: 'maxLen', value: 16, msg: "Giá mua phải nhỏ hơn 17 số !"},
             ],*/
                render: function (ui) {
                    var re = /,/gi;
                    var soluong = ui.rowData.soluongnhap.replace(re, "");

                    var str = ui.rowData.donggianhap;
                    var donggia = str.replace(re, "");
                    var tongtien = parseFloat(donggia) * parseFloat(soluong);

                    return FormatNumber(tongtien.toString());
                }
            },
            {
                title: "Mã nhóm",
                minWidth: 150,
                dataType: "string",
                align: "left",
                hidden: true,
                dataIndx: "manhom",
                editable: false,
                validations: [
                    {type: 'minLen', value: 1, msg: "Mã nhóm không được trống !"},
                ],
                editor: {
//type: manhomvattu_select
                },
                filter: {
                    type: "select",
                    condition: 'equal',
                    prepend: {'': '--Tất cả--'},
                    valueIndx: "manhom",
                    labelIndx: "tennhom",
                    listeners: ['change']
                },
                render: function (ui) {

                    var tennhom = ui.rowData.tennhom;
                    return tennhom;
                }
            },
            {title: "Tên nhóm", minWidth: 80, dataType: "string", align: "left", hidden: true, dataIndx: "tennhom"},
            {
                title: "TS(%)",
                minWidth: 60,
                dataType: "integer",
                align: "center",
                dataIndx: "thuesuat",
                editable: true,
                validations: [
                    {type: 'minLen', value: 1, msg: "Thuế xuất không được trống !"},
                    {type: 'maxLen', value: 2, msg: "Thuế xuất không được quá 2 số !"}
                ],
                render: function (ui) {
                    var rate = ui.rowData.thuesuat;
                    return rate + "%";
                }
            },
            {
                title: "Thuế", minWidth: 100, dataType: "integer", dataIndx: "thue", editable: false, align: "center",
                render: function (ui) {
                    var rate = ui.rowData.thuesuat;
                    var rate = ui.rowData.thuesuat;
                    var re = /,/gi;
                    var soluong = ui.rowData.soluongnhap.replace(re, "");

                    var str = ui.rowData.donggianhap;
                    var donggia = str.replace(re, "");
                    var tongtien = (parseFloat(donggia) * parseFloat(soluong)) * (rate / 100);

                    return FormatNumber(tongtien.toString());
                }
            },

        ],//-----------------------------------------Kết thúc các cột---------------------------------------
        dataModel: {
            dataType: "JSON",
            location: "remote",
            recIndx: "sott",
            url: $dir_module_chitiet_vattu + "list.php",//-- Load danh sách lên lưới
            postData: {mapskt: 1},
            getData: function (response) {
                return {data: response.data};
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
            if ($grid.pqGrid("hasClass", {rowIndx: rowIndx, cls: 'pq-row-edit'}) == true) {
                return true;
            }
            else {
                return false;
            }
        }
    };
    var $grid = $("#grid_editing_chitiet_nhapkho").pqGrid(obj);
    $grid.one("pqgridload", function (evt, ui) {
        var column = $grid.pqGrid("getColumn", {dataIndx: "manhom"});
        var filter = column.filter;
        filter.cache = null;
        filter.options = $grid.pqGrid("getData", {dataIndx: ["tennhom", "manhom"]});// lấy 1 hoặc nhiều dataindex
        $grid.pqGrid("refreshHeader");
    });

    function getRowSelect() { // --------------------Lấy dữ liệu theo dòng trên gird----------------------
        var arr = $("#grid_editing_chitiet_nhapkho").pqGrid("selection", {
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

    //------------------------End lưới--------------------------------------
</script>
<div id="grid_editing_chitiet_nhapkho" style="margin:5px auto;border: 0px !important;"></div>
