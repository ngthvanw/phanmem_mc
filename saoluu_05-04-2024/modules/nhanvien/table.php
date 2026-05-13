<script>
    $height = 1000;
    $width = 1000;
        $dir_module = "modules/makhachhang/";//--------------------------------------------Thay đổi khi copy


    $(function () {
                var dateEditor = function (ui) {
            var $cell = ui.$cell,
                rowData = ui.rowData,
                dataIndx = ui.dataIndx,
                cls = ui.cls,
                dc = $.trim(rowData[dataIndx]);
            $cell.css('padding', '0');

            var $inp = $("<input type='text' name='" + dataIndx + "' class='" + cls + " pq-date-editor' />")
            .appendTo($cell)
            .val(dc).datepicker({
                changeMonth: true,
                changeYear: true,
                onClose: function () {
                    $inp.focus();
                }
            });
            //.focus();
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

        //to check whether any row is currently being edited.
        function isEditing($grid) {
            var rows = $grid.pqGrid("getRowsByClass", { cls: 'pq-row-edit' });
            if (rows.length > 0) {
                //focus on editor if any 
                $grid.find(".pq-editor-focus").focus();
                return true;
            }
            return false;
        }
        //called by add button in toolbar.
        function addRow($grid) {
            if (isEditing($grid)) {
                return false;
            }
            //append empty row in the first row.                            
            var rowData = { UnitPrice: 0, UnitsInStock: 0, UnitsOnOrder: 0, Discontinued: false }; //empty row template
            $grid.pqGrid("addRow", { rowIndxPage: 0, rowData: rowData });

            var $tr = $grid.pqGrid("getRow", { rowIndxPage: 0 });
            if ($tr) {
                //simulate click on edit button.
                $tr.find("button.edit_btn").click();
            }
        }
        //called by delete button.
        function deleteRow(rowIndx, $grid) {
            $grid.pqGrid("addClass", { rowIndx: rowIndx, cls: 'pq-row-delete' });
            var rowData = $grid.pqGrid("getRowData", { rowIndx: rowIndx });
            var ans = window.confirm("Are you sure to delete row No " + (rowIndx + 1) + "?");

            if (ans) {
                $grid.pqGrid("deleteRow", { rowIndx: rowIndx, effect: true });

                var ProductID = $grid.pqGrid("getRecId", { rowIndx: rowIndx });

                $.ajax($.extend({}, ajaxObj, {
                    context: $grid,
                    url: "/pro/products/delete",
                    //url: "/pro/products.php?pq_delete=1",//for PHP
                    data: { ProductID: ProductID },
                    success: function () {
                        $grid.pqGrid("commit");
                        $grid.pqGrid("refreshDataAndView");
                    },
                    error: function () {
                        //debugger;
                        $grid.pqGrid("removeClass", { rowData: rowData, cls: 'pq-row-delete' });
                        $grid.pqGrid("rollback");
                    }
                }));
            }
            else {
                $grid.pqGrid("removeClass", { rowIndx: rowIndx, cls: 'pq-row-delete' });
            }
        }
        //called by edit button.
        function editRow(rowIndx, $grid) {

            $grid.pqGrid("addClass", { rowIndx: rowIndx, cls: 'pq-row-edit' });
            $grid.pqGrid("editFirstCellInRow", { rowIndx: rowIndx });

            //change edit button to update button and delete to cancel.
            var $tr = $grid.pqGrid("getRow", { rowIndx: rowIndx }),
                $btn = $tr.find("button.edit_btn");
            $btn.button("option", { label: "Update", "icons": { primary: "ui-icon-check"} })
                .unbind("click")
                .click(function (evt) {
                    evt.preventDefault();
                    return update(rowIndx, $grid);
                });
            $btn.next().button("option", { label: "Cancel", "icons": { primary: "ui-icon-cancel"} })
                .unbind("click")
                .click(function (evt) {
                    $grid.pqGrid("quitEditMode");
                    $grid.pqGrid("removeClass", { rowIndx: rowIndx, cls: 'pq-row-edit' });
                    $grid.pqGrid("refreshRow", { rowIndx: rowIndx });
                    $grid.pqGrid("rollback");
                });
        }
        //called by update button.
        function update(rowIndx, $grid) {
            if (!$grid.pqGrid("saveEditCell")) {
                return false;
            }

            var rowData = $grid.pqGrid("getRowData", { rowIndx: rowIndx });
            var isValid = $grid.pqGrid("isValid", { rowData: rowData }).valid;
            if (!isValid) {
                return false;
            }
            var isDirty = $grid.pqGrid("isDirty");
            if (isDirty) {
                var recIndx = $grid.pqGrid("option", "dataModel.recIndx");

                $grid.pqGrid("removeClass", { rowIndx: rowIndx, cls: 'pq-row-edit' });

                var url;
                if (rowData[recIndx] == null) {
                    //url to add records.
                    url = "/pro/products/add";
                    //url = "/pro/products.php?pq_add=1";for PHP
                }
                else {
                    //url to  update records.
                    url = "/pro/products/update";
                    //url = "/pro/products.php?pq_update=1";for PHP
                }
                $.ajax($.extend({}, ajaxObj, {
                    context: $grid,
                    url: url,
                    data: rowData,
                    success: function (response) {
                        var recIndx = $grid.pqGrid("option", "dataModel.recIndx");
                        if (rowData[recIndx] == null) {
                            rowData[recIndx] = response.recId;
                        }
                        $grid.pqGrid("removeClass", { rowIndx: rowIndx, cls: 'pq-row-edit' });
                        $grid.pqGrid("commit");
                    }
                }));
            }
            else {
                $grid.pqGrid("quitEditMode");
                $grid.pqGrid("removeClass", { rowIndx: rowIndx, cls: 'pq-row-edit' });
                $grid.pqGrid("refreshRow", { rowIndx: rowIndx });
            }
        }
        //define the grid.
        var obj = {
            width: 920,
            height: 400,
            wrap: false,
            hwrap: false,
            resizable: true,
            columnBorders: false,
            sortable: false,
            numberCell: { show: false },
            track: true, //to turn on the track changes.
            flexHeight: true,
            toolbar: {
                items: [
                    { type: 'button', icon: 'ui-icon-plus', label: 'Add Product', listeners: [
                        { "click": function (evt, ui) {
                            var $grid = $(this).closest('.pq-grid');
                            addRow($grid);
                            //debugger;
                        }
                        }
                    ]
                    }
                ]
            },
            scrollModel: {
                autoFit: true
            },
            selectionModel: {
                type: 'cell'
            },
            hoverMode: 'cell',
            editModel: {
                saveKey: $.ui.keyCode.ENTER
            },
            editor: { type: 'textbox', select: true },
            validation: {
                icon: 'ui-icon-info'
            },
            title: "<b>Inline Editing</b>",

            colModel: [
                    { title: "Product ID", dataType: "integer", dataIndx: "ProductID", editable: false, hidden: false, width: 80 },
                    { title: "Product Name", width: 185, dataType: "string", dataIndx: "ProductName",
                        validations: [
                            { type: 'minLen', value: 1, msg: "Required" },
                            { type: 'maxLen', value: 40, msg: "length should be <= 40" }
                        ]
                    },
                    { title: "Quantity Per Unit", width: 140, dataType: "string", align: "right", dataIndx: "QuantityPerUnit",
                        validations: [
                            { type: 'minLen', value: 1, msg: "Required." },
                            { type: 'maxLen', value: 20, msg: "length should be <= 20" }
                        ]
                    },
                    { title: "Unit Price", width: 100, dataType: "float", align: "right", dataIndx: "UnitPrice",
                        validations: [
                            { type: 'gt', value: 0.5, msg: "should be > 0.5" }
                        ],
                        render: function (ui) {
                            return "$" + parseFloat(ui.cellData).toFixed(2);
                        },
                        editor: {
		            type: dateEditor
		        }
                    },
                    { title: "Units In Stock", width: 100, dataType: "integer", align: "right", dataIndx: "UnitsInStock",
                        validations: [
                            { type: 'gte', value: 1, msg: "should be >= 1" }
                        ]
                    },
                    { title: "Units On Order", width: 100, dataType: "integer", align: "right", hidden: true, dataIndx: "UnitsOnOrder",
                        validations: [
                            { type: 'gte', value: 0, msg: "should be >= 0" }
                        ]
                    },
                    { title: "Discontinued", width: 100, dataType: "bool", align: "center", dataIndx: "Discontinued",
                        editor: { type: "checkbox", style: "margin:3px 5px;" }
                    },
                    { title: "", editable: false, minWidth: 165, sortable: false, render: function (ui) {
                        return "<button type='button' class='edit_btn'>Edit</button>\
                            <button type='button' class='delete_btn'>Delete</button>";
                    }
                    }
            ],
            dataModel: {
                dataType: "JSON",
                location: "remote",
                recIndx: "ProductID",
               url: $dir_module+"list.php",//-- Load danh sách lên lưới
                //url: "/pro/products.php",//for PHP
                getData: function (response) {
                    return { data: response.data, curPage: response.curPage, totalRecords: response.totalRecords };
                }
            },
            pageModel: { type: "remote" },
            //save the cell when cell loses focus.
            quitEditMode: function (evt, ui) {
                var $grid = $(this);
                if (evt.keyCode != $.ui.keyCode.ESCAPE) {
                    $grid.pqGrid("saveEditCell");
                }
            },
            //make rows editable selectively.
            editable: function (ui) {
                var $grid = $(this);
                var rowIndx = ui.rowIndx;
                if ($grid.pqGrid("hasClass", { rowIndx: rowIndx, cls: 'pq-row-edit' }) == true) {
                    return true;
                }
                else {
                    return false;
                }
            },
            //use refresh event to display jQueryUI buttons and bind events.
            refresh: function () {
                //debugger;
                var $grid = $(this);
                if (!$grid) {
                    return;
                }
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
            },
            cellBeforeSave: function (evt, ui) {
                var $grid = $(this);
                var isValid = $grid.pqGrid("isValid", ui);
                if (!isValid.valid) {
                    //evt.preventDefault();                    
                    return false;
                }
            }
        };
        $("#grid_editing").pqGrid(obj);
    });

</script>    

  <div id="grid_editing" style="margin:5px auto;border: 0px !important;"></div>