<?php
require("../config.php");
$cur_thang = date("n");
?>
<style>
    #Form-chinh label {
        margin-top: 3px;
        float: left;
        border: 0px solid red;
        width: 100%;
        display: block !important;
        font-weight: bold !important;
        font-size: 12px;
        font-family: Arial, Lucida Grande, Lucida Sans, sans-serif;
    }

    #Form-chinh input {
        float: left;
        display: block !important;
        font-weight: bold !important;
        font-size: 12px;
        font-family: Arial, Lucida Grande, Lucida Sans, sans-serif;
    }

    #Form-chinh input.text {
        float: left;
        margin-bottom: 0px !important;
        width: 100%;
        padding: 1px !important;
        font-size: 12px;
        font-family: Arial, Lucida Grande, Lucida Sans, sans-serif;
        font-weight: normal;
    }

    #Form-chinh input.button {
        height: 21px;
        font-weight: bold;
        border: 1px solid white;
        text-align: center;
    }

    #Form-chinh input.checkbox {
        margin-top: 6px;
    }

    #Form-chinh fieldset {
        padding: 1px;
        padding-top: 0px;
        border: 1px solid #09F;
        margin-top: 0px;
    }

    input[disabled='disabled'] {
        color: gray;
        background-color: gray;
    }

    #Form-chinh input:focus {
        border: 1px solid red;
        color: red;
    }

    #Form-chinh legend {
        padding: 0;
        padding-top: 0px;
        margin-top: 0px;
        font-weight: bold;
        font-size: 14px;
    }

    #Form-chinh .td-left input.text {
        float: left;
        margin-bottom: 4px !important;
        width: 60%;
        padding: .4em !important;
        font-size: 12px;
        font-family: Arial, Lucida Grande, Lucida Sans, sans-serif;
        font-weight: normal;
    }

    #Form-chinh select {
        font-size: 12px;
        font-weight: bold;
    }

    #Form-chinh h1 {
        font-size: 1.2em;
        margin: .6em 0;
    }

    div#users-contain {
        width: 350px;
        margin: 20px 0;
    }

    div#users-contain table {
        margin: 1em 0;
        border-collapse: collapse;
        width: 100%;
    }

    div#users-contain table td, div#users-contain table th {
        border: 1px solid #eee;
        padding: .6em 10px;
        text-align: left;
    }

    .ui-dialog .ui-state-error {
        padding: .3em;
    }

    .validateTips {
        border: 1px solid transparent;
        padding: 1px;
        margin-top: 0px !important;
        margin-bottom: 0px !important;
        color: red;
        font-weight: bold;
        text-align: center;
        font-size: 12px;
    }

    .ui-draggable, .ui-droppable {
        background-position: top;
    }

    .table-dialog {
        width: 98%;
    }

    .red {
        color: red;
    }

    .table-dialog .td-left {
        width: 50%;
        padding-right: 20px;
    }

    .table-dialog .td-right {
        width: 50%;
    }

    .table-dialog .td-right input {
        float: left;
        margin-bottom: 4px !important;
        width: 65% !important;
    }

    .table-dialog .td-left input {
        float: left;
        margin-bottom: 4px !important;
        width: 60% !important;
    }

    /* auto complex ma tk cha  */
    .custom-combobox {
        position: relative;
        display: inline-block;
    }

    .custom-combobox-toggle {
        position: absolute;
        top: 0;
        bottom: 0;
        margin-left: -1px;
        padding: 0;
    }

    .custom-combobox-input {
        margin: 0;
        padding: 5px 10px;
    }

    .ui-menu {
        z-index: 999999999 !important;
    }

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
        border: 2px dashed red;
    }
    tr.green td { background: lightgreen;}
</style>
<div id="dialog-bangchitiet_socai" title="GIÁ THÀNH SẢN PHẨM...">
    <p class="validateTips"></p>
    <form method="post" id="Form-chinh" enctype="multipart/form-data">
        <fieldset style="background-color: #afd9ee">
            <legend>Kỳ tính của năm <?php echo $_SESSION['NienDo']; ?></legend>
            <table border="0" style="width: 100%;">
                <tr>
                    <td><input name="rd_thangtonkho" type="radio" id="rd_thangtonkho" checked></td>
                    <td width="60px;">Tháng</td>
                    <td width="600px;">
                        <select name="thanggiathanhtieuchuan" id="thanggiathanhtieuchuan">
                            <?php
                            for ($i = 1; $i <= 12; $i++) {
                                $select = "";
                                if ($i == $cur_thang)
                                    $select = "selected";
                                ?>
                                <option <?php echo $select; ?>
                                        value="<?php echo $i; ?>"><?php echo "Tháng " . $i; ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </td>

                </tr>
            </table>
        </fieldset>
        <fieldset style="background-color: #afd9ee">
          <legend>Chọn sản phẩm           </legend>
            <table border="0" style="width: 100%;">
                <tr>
                    <td colspan="2">
					<select name="Intheothuesuat" style="width:100%;height:25px;display:none;" id="Intheothuesuat">
                      <option value="1">Tài khoản cấp 1</option>
                      <option selected="selected" value="2">Tài khoản cấp 2</option>
                      <option value="3">Tài khoản cấp 3</option>
                  </select>
				  <div id="grid_editing_bangchitiet_hanghoa"  style="height:400px;"></div>

				  </td>
                </tr>
            </table>
        </fieldset>
        <fieldset style="background-color: #afd9ee;">
            <table>
                <tr>
                    <td><input type="checkbox" style="margin:5px;" name="xemtonghopmasp" id="xemtonghopmasp" checked disabled> Xem tổng hợp</td>
                    <td></b><input type="hidden" id="mavattu"/></td>
                </tr>
            </table>
        </fieldset>
    </form>
</div>

<script>
    $height = 650;
    $width = 710;
    $dir_module_mabp = "modules/mabp/";////////////////Khai báo đường dẫn vào mudole
	$dir_module_mact = "modules/macongtrinh/";////////////////Khai báo đường dẫn vào mudole
    $dir_module_makhachhang = "modules/makhachhang/";////////////////Khai báo đường dẫn vào mudole
    $dir_module_manoidung = "modules/manoidung/";////////////////Khai báo đường dẫn vào mudole
    $dir_module_ps_kt = "modules/pskt/";//----------------Lưới
    ///$dir_module_phieuthuchi = "modules/psmavattu/";//----------------Lưới
    $dir_module_nhapkho = "modules/psmavattu/";//----------------Lưới
    $dir_module_mavattu = "modules/mavattu/";//----------------Lưới
    $dir_module_dmsanpham = "modules/dmsanpham/";////////////////Khai báo đường dẫn vào mudole
    $(function () {
		
		//---------------------------------------------------------------------------------------------

        var objmasp = {
            hwrap: false,
            resizable: true,
            rowBorders: true,
            height:450-18,
            width:697-20,
            virtualX: true,
            numberCell: { show: true },
            filterModel: { on: true, mode: "AND", header: true },
            trackModel: { on: true }, //to turn on the track changes.
			selectionModel: { type: 'row' },
            scrollModel: {
                //autoFit: true
            },
			editable: false,
            selectionModel: { type: 'none', subtype:'incr', cbHeader:false, cbAll:false},
            editModel: {
                allowInvalid: true,
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

                var url="";
                if (type == 'update') {
                    var valid = grid.isValid({ rowData: rowData, allowInvalid: true }).valid;
                    if (valid) {
						if(rowData.mavt==""){
					var timemili = Date.now();
					rowData.mavt=timemili;
				}
                        if (rowData[recIndx] == null) {
                            url = $dir_module_mavattu+"add.php";
                        }
                        else {
                            url = $dir_module_mavattu+"edit.php";
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
                        beforeSend: function (jqXHR, settings) {
                            //$(".saving", $grid).show();
                        },
                         success: function (res) {   
						if (rowData[recIndx] == null) {
								rowData.sott = res.recId;
							}
                            $grid.pqGrid("refreshRow", {rowIndx: rowIndx});
                          
                        },
                        complete: function () {
                             //$(".ui-state-highlight").focus();
                        }
                    });
                }
            },
            colModel: [//-------------------------------------------Khai báo các cột trong lưới-----------------------
                { title: "SoTT", dataType: "integer", dataIndx: "sott", editable: false, width: 0, hidden:true },
				{ title: "STT", dataType: "string", dataIndx: "STT", editable: false, width:10, hidden:true,align: "center" },
                { title: "Mã SP", dataType: "string", dataIndx: "masp", width: 150,sortable: true,
           
                    filter: {
                        type: 'textbox',
                        condition: 'begin',
                        listeners: ['keyup']
                    },
                    render: function (ui) {
                        var rowData = ui.rowData,
                            dataIndx = ui.dataIndx;

                        rowData.pq_cellcls = rowData.pq_cellcls || {};
                        if (rowData.maspcha=="0") {//if change is negative.
                            rowData.pq_cellcls[dataIndx] = 'green';
                            return rowData.masp;
                        }
                        else { //if change >= 0
                            return  rowData.masp;
                        }
                    }
                },
                { title: "Tên SP", width: 300, dataType: "string", dataIndx: "tensp",
                    validations: [
                        { type: 'minLen', value: 1, msg: "Tên vật tư hàng hóa không được trống !" }
                    ],
                    filter: {
                        type: 'textbox',
                        condition: 'begin',
                        listeners: ['keyup']
                    }
		},
                { title: "Mã SP Cha", dataType: "string", dataIndx: "maspcha", width: 120,sortable: true,

                    filter: {
                        type: 'textbox',
                        condition: 'begin',
                        listeners: ['keyup']
                    }
                },
		{ title: "", dataIndx: "state", width: 5, align: "center", type:'checkBoxSelection', cls: 'ui-state-default', resizable: false, sortable:false }
            ],//,
            pageModel: { type: "local", rPP: 200, strRpp: "{0}", strDisplay: "{0} đến {1} của {2}" },
            dataModel: {
                dataType: "JSON",
                location: "remote",
                recIndx: "sott",
                url: $dir_module_dmsanpham+"list.php",//-- Load danh sách lên lưới
                postData: {loaisp:'SP'},
                getData: function (dataJSON) {
                var data = dataJSON.data;
				$("#mavattu").val("");
                return {data: data };
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
        var $grid = $("#grid_editing_bangchitiet_hanghoa").pqGrid(objmasp);
		$select_arr = [];
		$grid.on( "pqgridrowselect", function( event, ui ) {
			$mavt = ui.rowData.masp;
			$mavatu = $("#mavattu").val();
			if($mavatu==""){
				$mavattu_arr = new Array();
			}else{
				$mavattu_arr = $mavatu.split(",");
			}
			
			if(parseInt($mavattu_arr.indexOf($mavt))==-1)
				$mavattu_arr.push($mavt);
			
			$mavattu_str = $mavattu_arr.toString();
			$("#mavattu").val($mavattu_str);

		} );
		$grid.on( "pqgridrowunselect", function( event, ui ) {
			if(typeof ui.rows !="undefined")
				ui.rows[0].rowData.masp
			if(typeof ui.rowData !="undefined")
				$mavt = ui.rowData.masp;
		
				$mavatu = $("#mavattu").val();
				$mavattu_arr = $mavatu.split(",");
				if(parseInt($mavattu_arr.indexOf($mavt))!=-1){
					$vitri = parseInt($mavattu_arr.indexOf($mavt))
					$mavattu_arr.splice($vitri, 1);
				}
				$mavattu_str = $mavattu_arr.toString();
				$("#mavattu").val($mavattu_str);
		} );
		function loadcb_mabp(){
			$.ajax({
					url: $dir_module_mact + "listcb_mact.php",
					async: false,
					success: function (response) {
						$("#theobophan").html(response);
					}
				});
		}
		//loadcb_mabp();
		function loadcb_manoidung(){
			$.ajax({
					url: $dir_module_manoidung + "listcb_mand.php",
					async: false,
					success: function (response) {
						$("#theonoidung").html(response);
					}
				});
		}
		//loadcb_manoidung();

		//---------------------------------------------------------------------------------------------
        readonlyInput();
        var dialog, form,
            emailRegex = /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/,
            rd_thangtonkho = $("#rd_thangtonkho"),
            tuthang = $("#tuthang"),
            tinhlaituthang = $("#tinhlaituthang"),

            rd_congdonthangtonkho = $("#rd_congdonthangtonkho"),
            congdontuthang = $("#congdontuthang"),
            congdondenthang = $("#congdondenthang"),
            Intheothuesuat = $("#Intheothuesuat"),
            Intheochungtu = $("#Intheochungtu"),
            sapxeptheohoadon = $("#sapxeptheohoadon"),
            kieuin = $("#kieuin"),
            theothongtu = $("#theothongtu"),


            allFields = $([]).add(rd_thangtonkho)/////////////////////////////////////////////////////////////////////////////////////
                .add(tuthang)
                .add(tinhlaituthang)
                .add(rd_congdonthangtonkho)
                .add(congdontuthang)
                .add(congdondenthang)
                .add(Intheothuesuat)
                .add(Intheochungtu)
                .add(sapxeptheohoadon)
                .add(kieuin)
                .add(theothongtu)

        tips = $(".validateTips"); // ///////////////////////////////////////////////////////////////////////////////khai bao bien

        function updateTips(t) {// Hiện thông báo khi lỗi
            tips
                .text(t)
                .addClass("ui-state-highlight");
            setTimeout(function () {
                tips.removeClass("ui-state-highlight", 1500);
            }, 500);
        }

        function checkLength(o, n, min, max) {// Kiểm tra chiều dài chuổi nhập vào
            if (o.val().length > max || o.val().length < min) {
                o.addClass("ui-state-error");
                updateTips("Chiều dài của " + n + " phải nằm giữa " +
                    min + " và " + max + ".");
                o.focus();
                return false;
            } else {
                return true;
            }
        }

        function checkNum(o, n) {// Kiểm tra chiều dài chuổi nhập vào
            if (o.val()) {
                o.addClass("ui-state-error");
                updateTips(n + " không phải số .");
                o.focus();
                return false;
            } else {
                return true;
            }
        }

        function checkNull(o, n) {
            if (o.val() == "") {
                o.addClass("ui-state-error");
                updateTips(n + " không được trống .");
                o.focus();
                return false;
            } else {
                return true;
            }
        }

        function checkSelect(o, n) {
            if (o.val() == "-1") {
                o.addClass("ui-state-error");
                updateTips(n + " không được trống .");
                o.focus();
                return false;
            } else {
                return true;
            }
        }

        function checkRegexp(o, regexp, n) {
            if (!( regexp.test(o.val()) )) {
                o.addClass("ui-state-error");
                updateTips(n);
                return false;
            } else {
                return true;
            }
        }

        function sosanhngay(ngaybd, ngaykt) {
            if ($ngaydb > $ngaykt) {
                $("#congdondenthang").addClass("ui-state-error");
                updateTips("Ngày bắt đầu lớn hơn ngày kết thúc !");
                $("#congdondenthang").focus();
                return false;
            } else {
                return true;
            }
        }

        function checkKey(Ma, n) {// Check key khi nhấn submit
            var Checkkey = $("#CheckKeyMaBP").val();
            if (Checkkey == 1) {
                Ma.addClass("ui-state-error");
                updateTips(n + " đã tồn tại ! Vui lòng nhập lại !");
                return false;
            } else {
                return true;
            }
        }

        rd_thangtonkho.change(function () {
            readonlyCheckThang();
        });
        rd_congdonthangtonkho.change(function () {
            readonlyCheckCongDon();
        });

///-------------------------Di chuyễn các phần tử bằng enter----------------

        $("#rd_congdonthangtonkho").keydown(function (event) {// Gọi table mã nội dung để chọn
            if (event.keyCode == Keys.ENTER) { // copy
                $("#congdontuthang").focus();
            }
        })
        $("#congdontuthang").keydown(function (event) {// Gọi table mã nội dung để chọn
            if (event.keyCode == Keys.ENTER) { // copy
                $("#congdondenthang").focus();
            }
        })

        $("#congdondenthang").keydown(function (event) {// Gọi table mã nội dung để chọn
            if (event.keyCode == Keys.ENTER) { // copy
                $("#Intheothuesuat").focus();
            }
        })

        $("#Intheothuesuat").keydown(function (event) {// Gọi table mã nội dung để chọn
            if (event.keyCode == Keys.ENTER) { // copy
                $("#xemchitiet").focus();
            }
        })
        $("#Intheochungtu").keydown(function (event) {// Gọi table mã nội dung để chọn
            if (event.keyCode == Keys.ENTER) { // copy
                $("#sapxeptheohoadon").focus();
            }
        })
        $("#sapxeptheohoadon").keydown(function (event) {// Gọi table mã nội dung để chọn
            if (event.keyCode == Keys.ENTER) { // copy
                $("#kieuin").focus();
            }
        })
        $("#kieuin").keydown(function (event) {// Gọi table mã nội dung để chọn
            if (event.keyCode == Keys.ENTER) { // copy
                $("#theothongtu").focus();
            }
        })
        $("#theothongtu").keydown(function (event) {// Gọi table mã nội dung để chọn
            if (event.keyCode == Keys.ENTER) { // copy
                $("#sxtheonhommathang").focus();
            }
        })

        $("#sxtheonhommathang").keydown(function (event) {// Gọi table mã nội dung để chọn
            if (event.keyCode == Keys.ENTER) { // copy
                $("#KhoaSoVaChuyenTonKho").focus();
            }
        })

        $("#congdontuthang").change(function (event) {// Gọi table mã nội dung để chọn
            $tuthang = $("#congdontuthang").val();
            $denthang = $("#congdondenthang").val();
            if ($tuthang > $denthang) {
                //$("#congdontuthang").val($tuthang);
                $("#congdondenthang option[value=" + $tuthang + "]").attr('selected', 'selected');
            }
        })
        $("#congdondenthang").change(function (event) {// Gọi table mã nội dung để chọn
            $tuthang = $("#congdontuthang").val();
            $denthang = $("#congdondenthang").val();
            if ($tuthang > $denthang) {
                //$("#congdontuthang").val($tuthang);
                $("#congdontuthang option[value=" + $denthang + "]").attr('selected', 'selected');
            }
        })


///-------------------Kết thúc--------------------------------
        function readonlyCheckThang() {
            congdontuthang.attr("disabled", true);
            congdondenthang.attr("disabled", true);

            tuthang.attr("disabled", false);
            tinhlaituthang.attr("disabled", false);
            sole.attr("disabled", false);
            Insotonkho.attr("disabled", false);
            Ingiatritonkho.attr("disabled", false);
            giatrilonhon.attr("disabled", false);
        }

        function readonlyCheckCongDon() {
            congdontuthang.attr("disabled", false);
            congdondenthang.attr("disabled", false);

            tuthang.attr("disabled", true);
            tinhlaituthang.attr("disabled", true);
            sole.attr("disabled", true);
            Insotonkho.attr("disabled", true);
            Ingiatritonkho.attr("disabled", true);
            giatrilonhon.attr("disabled", true);
        }

        function readonlySubmitSTT() {
        }

        function readonlyNonSubmitSTT() {
        }

        function readonlyInput() {

        }

        function notReadonlyInput() {

        }


        function xoaform_phieuthuchi($mangsang) {//------------------------------------------------------------------------------------
        }//-------------------------------------------------------------------------------------------------------

        function ChucNang_ThuChi() {// Xử lý khi nhấp button đồng ý
            var valid = true;
            allFields.removeClass("ui-state-error");// kiem tra du lieu
            valid = valid && checkNull($("#congdontuthang"), " Kiểm tra ngày nhập ");
            valid = valid && checkNull($("#congdondenthang"), " Kiểm tra ngày nhập ");

            $tungay = $("#thanggiathanhtieuchuan").val();
            $denngay = $("#congdondenthang").val();
            $mavt = $("#mavattu").val();
            $theobophan = $("#theobophan").val();
            $noidung = $("#theonoidung").val();
            $sapxep = $("#sapxep").val();
            $congdonsocai = $("#congdonsocai").val();
            $xemtonghopmasp = $("#xemtonghopmasp").prop("checked");

            checktontai = true;
            $.ajax({// Kiểm tra tồn kho trước
                url: $dir_module_dmsanpham + "kiemtragiathanhtieuchuanthang.php",
                data: {thang: $tungay},
                async: false,
                success: function (response) {
                    if (response == 1) {
                        checktontai = true;
                    } else {
                        checktontai = false;
                    }
                }
            });
            if (checktontai == true){
                var res = confirm("Giá thành tiêu chuẩn đã tồn tại .\n Bạn có muốn tạo giá thành mới ?\n Nhấn [OK] tiếp tục [HỦY] để in giá thành sãn có .");
            if (res) {
                var res1 = confirm("CẢNH BÁO\n\n CẬP NHẬT MỚI GIÁ THÀNH SẼ LÀM SAI LỆCH GIÁ THÀNH TIÊU CHUẨN HIỆN TẠI?\n\n NHẤN [OK] TẠO MỚI [HỦY] ĐỂ IN GIÁ THÀNH CÓ SẴN CÓ.");
                if (res1) {
                    valid = true;
                }else{
                    $('.dialog_main_thongbao').load("form/frm_insolieu_bangchitiet_giathanh_tieuchuan.php?tungay=" + $tungay + "&denngay=" + $denngay + "&sapxep=" + $sapxep + "&matk=" + $mavt + "&theobophan=" + $theobophan + "&theonoidung=" + $noidung + "&congdonsocai=" + $congdonsocai + "&xemtonghopmasp=" + $xemtonghopmasp);
                    valid = false;
                }
            } else {
                $('.dialog_main_thongbao').load("form/frm_insolieu_bangchitiet_giathanh_tieuchuan.php?tungay=" + $tungay + "&denngay=" + $denngay + "&sapxep=" + $sapxep + "&matk=" + $mavt + "&theobophan=" + $theobophan + "&theonoidung=" + $noidung + "&congdonsocai=" + $congdonsocai + "&xemtonghopmasp=" + $xemtonghopmasp);
                valid = false;
            }
        }


            $xemchitiet=0;
            if($("#xemchitiet").prop("checked") == true){
                $xemchitiet=1;
            }

            if (valid) {
                $.confirm({
                    title: 'Cập nhật thành công',
                    type: 'green',
                    autoClose: 'OK|1000',
                    content: function(){
                        var self = this;
                        return $.ajax({
                            url: $dir_module_dmsanpham + "themthongtingiathanhtieuchuan.php",
                            dataType: 'json',
                            method: 'get',
                            data: {
                                tungay:$tungay,
                                xemtonghopmasp:$xemtonghopmasp,
                            },
                        });
                    },
                    buttons: {
                        "OK": {
                            keys: ['Y'], action: function () {
                                $('.dialog_main_thongbao').load("form/frm_insolieu_bangchitiet_giathanh_tieuchuan.php?tungay=" + $tungay + "&denngay=" + $denngay + "&sapxep=" + $sapxep+"&matk=" + $mavt+"&theobophan=" + $theobophan+"&theonoidung=" + $noidung+"&congdonsocai=" + $congdonsocai+"&xemtonghopmasp=" + $xemtonghopmasp);
                            }
                        }
                    }
                });
            }

            return valid;
        }

        function xoadialog_bangketoankho() {// đóng form
            reset_dialog(".dialog-bangchitiet_socai");
            reset_dialog(".dialog_main_bangchitiet_socai");
        }

        dialog = $("#dialog-bangchitiet_socai").dialog({
            autoOpen: false,
            height: $height,
            width: $width,
            modal: true,
            buttons: {
                "Thay đổi giá thành": function () {
                    $('.dialog_main_sodu_tk').load('form/frm_thaydoi_giathanh_tieuchuan.php');
                },
                "Đồng ý": ChucNang_ThuChi,
                "Kết thúc": function () {
                    if ($("#Loai").val() == "Add" && $("#MaBP").val() != "") {
                        $.confirm({
                            title: 'Thông báo',
                            content: ' Dữ liệu đã được thay đổi bạn có muốn lưu không.',
                            icon: 'fa fa-warning',
                            buttons: {
                                "Đồng ý": function () {
                                },
                                "Hủy bỏ": function () {
                                    xoadialog_bangketoankho();
                                }
                            }
                        });
                    } else {
                        xoadialog_bangketoankho();
                    }
                }
            }
        });

        dialog.dialog("open");

    })
    ;
</script>