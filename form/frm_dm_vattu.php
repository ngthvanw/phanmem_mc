<style>
</style>
<script>
    $height = 600;
    $width = 860;
  $( function() {
    $( "#dialog-vattu" ).dialog({
      resizable: false,
      height: $height,
      width:$width,
      modal: true,
      buttons: {
        "Đóng": function() {
          $( this ).dialog( "close" );
          reset_dialog(".dialog-vattu");
          reset_dialog(".dialog_main2");
        }
      }
    });
    function pqDatePicker(ui) {// data picker
        var $this = $(this);
        $this
            .css({ zIndex: 1001111, position: "relative" })
            .datepicker({
                yearRange: "-20:+0", //20 years prior to present.
                changeYear: true,
                changeMonth: true,
                showButtonPanel: true,
                onClose: function (evt, ui) {
                    $(this).focus();
                }
            });
        //default From date
        $this.filter(".pq-from").datepicker("option", "defaultDate", new Date("01/01/1996")); // set nagy mặt định
        //default To date
        $this.filter(".pq-to").datepicker("option", "defaultDate", new Date("12/31/1998"));
    } // end data picker
    //define colModel
    var colM = [// Khai báo các colum
    { title: "ShipCountry", width: 100, dataIndx: "ShipCountry",
        filter: { type: 'textbox', condition: 'begin', listeners: ['change'] }
    },
    { title: "Customer Name", width: 120, dataIndx: "ContactName",
        filter: { type: 'textbox', condition: 'begin', listeners: ['change'] }
    },
    { title: "Order ID", minWidth: 130, dataIndx: "OrderID", dataType: "integer",
        filter: { type: 'textbox', condition: "between", listeners: ['change'] }
    },
	{ title: "Order Date", minWidth: "190", dataIndx: "OrderDate", dataType: "date",
	    filter: { type: 'textbox', condition: "between", init: pqDatePicker, listeners: ['change'] }
	},
    { title: "Shipping Region", width: 130, dataIndx: "ShipRegion",
        filter: { type: 'select',
            //attr: "multiple", //for multiple
            //style:"height:120px;",//for multiple
            condition: 'equal', 
            //condition: 'range', //for multiple
            valueIndx: "ShipRegion",
            labelIndx: "ShipRegion",
            groupIndx: "ShipCountry",
            prepend: { '': '--Select--' },
            listeners: ['change']
        }
    },
    { title: "Paid", width: 100, dataIndx: "paid", dataType: "bool", align: "center",
        filter: { type: "checkbox", subtype: 'triple', condition: "equal", listeners: ['click'] }
    },
	{ title: "Shipping Via", width: 100, dataIndx: "ShipVia",
	    filter: { type: "select",
	        condition: 'equal',
	        prepend: { '': '--Select--' },
	        valueIndx: "ShipVia",
	        labelIndx: "ShipVia",
	        listeners: ['change']
	    }
	},
	{ title: "Required Date", width: 100, dataIndx: "RequiredDate", dataType: "date" },
	{ title: "Shipped Date", width: 100, dataIndx: "ShippedDate", dataType: "date" },
    { title: "Freight", width: 100, align: "right", dataIndx: "Freight", dataType: "float" },
    { title: "Shipping Name", width: 150, dataIndx: "ShipName" },
    { title: "Shipping Address", width: 270, dataIndx: "ShipAddress" },
    { title: "Shipping City", width: 100, dataIndx: "ShipCity" },
    { title: "Shipping Postal Code", width: 300, dataIndx: "ShipPostalCode" }

	];
    //define dataModel
    var dataModel = {// laod data table 
        location: "remote",
        sorting: "local",
        dataType: "JSON",
        method: "GET",
        sortIndx: "OrderID",
        sortDir: "up",
        url: "grid/pro/orders.php",//Lấy danh sách cần load lên
        getData: function (dataJSON) { // trả về là json
            return { data: dataJSON.data };
        }
    }
    var obj = { width: $width-20, height: $height-130, // set heigt weight gird
        dataModel: dataModel,
        colModel: colM,
        pageModel: { type: 'local', rPP: 20 },// số dòng hiển thị khi phân trang
        editable: false, // sửa trực tiếp trên gird
        selectionModel: { type: 'cell' }, // chọn theo từng cell
        filterModel: { on: true, mode: "AND", header: true }, // lọc dữ liệu trên header
        //title: "Danh mục vật tư, hàng hóa...",// tiêu đề gird
        resizable: true,
        columnBorders: true,
        freezeCols: 2, // cột cố định không di chuyển khi sroll
             toolbar: { // tollbar để tạo các button
            items: [
                { type: 'button', icon: 'ui-icon-plus', label: 'Thêm mới', listeners: [
                        { "click": function (evt, ui) {
                            $('.dialog_main3').load('form/frm_add_dm_vattu.php?item=Add')
                        }
                    }
                ]
                }
            ]
        }
    };
    var $grid = $("#grid_filter").pqGrid(obj);

    //load shipregion and shipvia dropdowns in first load event.                
    $grid.one("pqgridload", function (evt, ui) {
        var column = $grid.pqGrid("getColumn", { dataIndx: "ShipRegion" });
        var filter = column.filter;
        filter.cache = null;
        filter.options = $grid.pqGrid("getData", { dataIndx: ["ShipCountry", "ShipRegion"] });

        var column = $grid.pqGrid("getColumn", { dataIndx: "ShipVia" });
        var filter = column.filter;
        filter.cache = null;
        filter.options = $grid.pqGrid("getData", { dataIndx: ["ShipVia"] });

        $grid.pqGrid("refreshHeader");
    });
});      
</script>    
<div id="dialog-vattu" title="Thiết lập ban đầu">
  <div id="grid_filter" style="margin:5px auto;border: 0px !important;"></div>
</div>