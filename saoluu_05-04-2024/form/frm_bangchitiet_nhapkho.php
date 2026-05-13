<?php
session_start();
$SoPhieu = $_GET['sophieu'];
$list = $_GET['list'];
$cothuegtgt = $_GET['thuegtgt'];
$cochietkhau = $_GET['cochietkhau'];
$baogomthue = $_GET['baogomthue'];
$makho = $_GET['makho'];
$query_string - $_SERVER['QUERY_STRING'];

$ngayghiso = $_GET['ngayghiso'];
$thang_ngayghiso = date("n",strtotime($ngayghiso));

?>
<style>
    tr td.green{
             background-color:rgba(143,230,74,0.53);
         }

    tr td.tomato{
        background-color:#FF6347;
    }

</style>
<script>
    $height = getHeight()-20;
    $width = getWidth()-20;
    $dir_module_makho = "modules/makho/";////////////////Khai báo đường dẫn vào mudole
    $dir_module_mavattu = "modules/mavattu/";//--------------------------------------------Thay đổi khi copy
    $dir_module_manoidung = "modules/manoidung/";
    $(function () {
        $dir_module_chitiet_vattu = "modules/ps_chitiet_mavt/";//--------------------------------------------Thay đổi khi copy
        function xoadialog_bangchitiet_nhapkho() { // ----------------------đóng form
            reset_dialog(".dialog-bangchitiet_nhapkho");
            reset_dialog(".dialog_main_bangchitiet_nhapkho");
        }

        $("#dialog-bangchitiet_nhapkho").dialog({ // ------------------Gọi dialog
            resizable: false,
            height: $height,
            width: $width,
            modal: true

        });
        //-------------------------Lưới-----------------------------------------
        $("#grid_editing_nhapchitiet_nhapkho").keydown(function (event) {//--------------Các phím tắt
            var $grid_pb = $("#grid_editing_nhapchitiet_nhapkho").closest('.pq-grid');//---- Lưới----------------
            if (event.keyCode == Keys.F7) { // Hủy bỏ hàng đang xóa
                $res = confirm("CẢNH BÁO! \n\n BẠN ĐANG CHUẨN BỊ SAO CHÉP DANH SÁCH VẬT TƯ HÀNG HOÁ TỪ PHIẾU KHÁC. CHỨC NĂNG NÀY SẼ LÀM THAY ĐỔI DỮ LIỆU PHIẾU NHẬP HIỆN TẠI. \n\n BẠN CÓ MUỐN TIẾP TỤC KHÔNG ?");
                if($res){
					var $loaiphieu = prompt("NHẬP LOẠI PHIẾU ĐỂ SAO CHÉP DANH SÁCH VẬT TƯ, HÀNG HOÁ \n 1. Nhập Kho \n 2. Xuất kho", "1");
					if ($loaiphieu == 1 || $loaiphieu == 2) {
						var sophieu = prompt("NHẬP SỐ PHIẾU ĐỂ SAO CHÉP DANH SÁCH VẬT TƯ, HÀNG HOÁ", "");
						if (sophieu != null) {// Kiểm tra số phiếu nếu không lỗi thì cho copy
							$sophieuhientai = $("#sophieu").val().trim(); /// Là số phiếu
							$.ajax({// Lấy tổng chiết khấu
								url: $dir_module_nhapkho + "saochepdanhsachhanghoa.php",// Lấy tồng thuế NK,TTĐB,VC,BX
								data: {mapsktsaochep: sophieu,sophieuhientai: $sophieuhientai,loaiphieu:$loaiphieu},
								async: false,
								success: function (response) {
									$data = response.trim();
									if($data!=""){
										alert($data);
									}else{
										$("#dialog-bangchitiet_nhapkho").load("form/gird_bangchitiet_nhapkho.php?list=0&sophieu=<?php echo $SoPhieu; ?>&thuegtgt=<?php echo $cothuegtgt; ?>&cochietkhau=<?php echo $cochietkhau; ?>&baogomthue=<?php echo $baogomthue; ?>&ngayghiso=<?php echo $ngayghiso; ?>&makho=<?php echo $makho; ?>");
									}
								}
							});
						}
					}
                }
            }
            if (event.keyCode == Keys.F10) { // Hủy bỏ hàng đang xóa
                $res = confirm("BẠN CÓ MUỐN PHÂN BỔ CHIẾT KHẤU KHÔNG ?");
                if($res){
                    var sotienchietkhau = prompt("NHẬP VÀO SỐ TIỀN CHIẾT KHẤU CẦN PHÂN BỔ", "");
                    if (sotienchietkhau != null) {
                        $sophieuhientai = $("#sophieu").val().trim(); /// Là số phiếu
                        $.ajax({// Lấy tổng chiết khấu
                            url: $dir_module_nhapkho + "phanbochietkhau.php",// Lấy tồng thuế NK,TTĐB,VC,BX
                            data: {sotienchietkhau: sotienchietkhau,sophieuhientai: $sophieuhientai,loaiphieu:1},
                            async: false,
                            success: function (response) {
                                $data = response.trim();
                                if($data!=""){
                                    alert($data);
                                }else{
                                    $("#dialog-bangchitiet_nhapkho").load("form/gird_bangchitiet_nhapkho.php?list=0&sophieu=<?php echo $SoPhieu; ?>&thuegtgt=<?php echo $cothuegtgt; ?>&cochietkhau=<?php echo $cochietkhau; ?>&baogomthue=<?php echo $baogomthue; ?>&ngayghiso=<?php echo $ngayghiso; ?>&makho=<?php echo $makho; ?>");
                                }
                            }
                        });
                    }
                }
            }
            if ($('div').hasClass('jconfirm') == false) {
                if (event.keyCode == Keys.F2) { // copy
                    var rowSelect = getRowSelect();
                    if (rowSelect != false){
                        var rowIndx = rowSelect[0].rowIndx;
                        var rowData = rowSelect[0].rowData;
                        $sott = rowData.sott;
                        $mavt = rowData.mavt;
                        $soluong = rowData.soluongnhap;
                        $thanhtien = rowData.thanhtienchuack;
                        if($sott!=0){
                            var $comfrim = confirm("Bạn có muốn chuyển từ đơn vị chính sang đơn vị phụ không ?");
                            if ($comfrim == true) {
                                $.ajax({// Lấy tổng chiết khấu
                                    url: $dir_module_nhapkho + "chuyendonvi.php",// Lấy tồng thuế NK,TTĐB,VC,BX
                                    data: {sott: $sott,mavt: $mavt,sophieu:'<?php echo $SoPhieu; ?>',soluong:$soluong,thanhtien:$thanhtien},
                                    async: false,
                                    success: function (response) {
                                        $("#dialog-bangchitiet_nhapkho").load("form/gird_bangchitiet_nhapkho.php?list=0&sophieu=<?php echo $SoPhieu; ?>&thuegtgt=<?php echo $cothuegtgt; ?>&cochietkhau=<?php echo $cochietkhau; ?>&baogomthue=<?php echo $baogomthue; ?>&ngayghiso=<?php echo $ngayghiso; ?>&makho=<?php echo $makho; ?>");
                                    }
                                });
                            }
                        }else {
                            alert("Chưa nhập số lượng. Vui lòng nhập số lượng trước khi chuyển đơn vị.");
                        }
                    }
                }
                if (event.keyCode == Keys.F4) {
                    $(".dialog_main_mavt_select_tk").load("form/frm_dm_mavt_select_tk.php");
                }
                if (event.keyCode == Keys.INSERT || event.keyCode == Keys.F9) { // Hủy bỏ hàng đang xóa
                    $("#dialog-bangchitiet_nhapkho").load("form/gird_bangchitiet_nhapkho.php?list=1&sophieu=<?php echo $SoPhieu; ?>&thuegtgt=<?php echo $cothuegtgt; ?>&cochietkhau=<?php echo $cochietkhau; ?>&baogomthue=<?php echo $baogomthue; ?>&ngayghiso=<?php echo $ngayghiso; ?>&makho=<?php echo $makho; ?>");
                }
                if (event.keyCode == Keys.ESCAPE) {
                    xoadialog_bangchitiet_nhapkho();
                    $("#gird_chitiet_nhapkho").load("form/gird_chitiet_nhapkho.php?sophieu=<?php echo $SoPhieu; ?>&list=0");
                    var $data = 0;
                    $sophieu = $("#sophieu").val();
                    $.ajax({// Kiểm tra xem STT có tồn tại hay không
                        url: $dir_module_nhapkho + "laythongtindinhkhoan.php",
                        data: {sophieu: $sophieu},
                        async: false,
                        success: function (response) {
                            $data = $.parseJSON(response);
                        }
                    });

                    $TongChietKhau=0;
                    $TongThueNK=0;
                    $TongTTDB=0;
                    $TongTTNT=0;
                    $.ajax({// Lấy tổng chiết khấu
                        url: $dir_module_nhapkho + "laytongchietkhau.php",// Lấy tồng thuế NK,TTĐB,VC,BX
                        data: {sophieu: $sophieu},
                        async: false,
                        success: function (response) {
                            $TongJonson = $.parseJSON(response);
                            $TongChietKhau =$TongJonson.tongchietkhau;
                            $TongThueNK =$TongJonson.tongthuenk;
                            $TongTTDB =$TongJonson.tongttdb;
                            $TongTTNT =$TongTTNT.tongttnt;
                        }
                    });

                    $tongtien = 0;
                    $tongcong = 0;
                    $tonghang = 0;
                    $tongthue = 0;
                    $tongtiennt=0;
                    $lengh = $data.length;

                    $dataMand="";
                    $mand = $("#manoidung").val().trim();
                    $.ajax({// Lấy TK từ mã nội dung
                        url: $dir_module_manoidung + "laythongtin.php",
                        data: {ma: $mand},
                        async: false,
                        success: function (response) {
                            $dataMand =$.parseJSON(response);
                        }
                    });
                    $tkco =$dataMand.tkco;
					i=0;

                    for ($k = 1; $k < 6; $k++) {
                        $("#tkco" + $k).val("");
                        $("#tkno" + $k).val("");
                        $("#sotien" + $k).val("");
                        $("#sotiennt" + $k).val("");
                    }
					
                    $.each($data, function (i, item) {// Lấy danh sách tk có , tk nợ
                        i++;
						$matk = item.matk.toString();
						if($matk.search("-")!=-1){
							
						vitri=$matk.search("-");
						$("#tkno" + i).val($matk.substr(0,(vitri)));
                        $("#tkco" + i).val($matk.substr((vitri+1)));
                        $sotien = item.sotien;
                        $sotiennt = item.sotiennt;
                        $("#sotien" + i).val(FormatNumber($sotien.toString()));
                        $("#sotiennt" + i).val(FormatNumber($sotiennt.toString()));
							
						}else{
							$("#tkno" + i).val(item.matk);
							$("#tkco" + i).val($tkco);
							$sotien = item.sotien;
							$sotiennt = item.sotiennt;
							$("#sotien" + i).val(FormatNumber($sotien.toString()));
							$("#sotiennt" + i).val(FormatNumber($sotiennt.toString()));
						}
                        
                        $tongtien += parseFloat($sotien);
                        $tongtiennt += parseFloat($sotiennt);
                        if (i < $lengh) {
                            $tonghang += parseFloat($sotien);
                        }
                    });

                    $tongthue = Math.round($data[$lengh - 1].sotien);
                    $tongthue = Math.round($tongthue);
                    $tongtien = Math.round($tongtien);
                    $tonghang = Math.round($tonghang);



                    $("#tongtien").val(FormatNumber($tongtien.toString()));
                    $("#tienchietkhau").val($.number($TongChietKhau,0,".",","));
                    $("#tongso").val(FormatNumber($tongtien.toString()));
                    $("#tienhang").val(FormatNumber($tonghang.toString()));// Tiền hàng
                    $("#thue").val(FormatNumber($tongthue.toString()));//Tiền thuế
                    $("#tongtiennt").val(FormatNumber($tongtiennt.toString()));
                    $TongCPhiMT=0;
                    $.ajax({// Lấy tổng chiết khấu
                        url: $dir_module_nhapkho + "laytongphimoitruong.php",
                        data: {sophieu: $sophieu},
                        async: false,
                        success: function (response) {
                            $TongCPhiMT =response;
                        }
                    });
                    $("#phimoitruong").val($.number($TongCPhiMT,0,".",","));//Tiền thuế
                    $ngayhoadon = $("#ngayhoadon").val();
                    $("#hanthanhtoan").val($ngayhoadon);

                    $("#tkno"+ i).val("1331");

                    //////////////// Them phieu nhap
                    var valid=true;
                    /*$.ajax({// Kiểm tra xem STT có tồn tại hay không
                        url: $dir_module_chitiet_vattu + "checksophieu.php",
                        data: {sophieu: $sophieu},
                        async: false,
                        success: function (response) {
                            $data =response;
                            if($data==1)
                                valid=true;
                            else
                                valid = false;
                        }
                    });*/
                    //console.log(valid);
                    if (valid) {
                        $LoaiPhieu=1;// Nhập kho
                        var $cothuegtgt = 0;
                        if ($("#cothuegtgt").is(":checked")) {
                            $cothuegtgt = 1;
                        }
                        var $chungtugoc = 1;
                        if ($("#chungtugoc").is(":checked")) {
                            $chungtugoc = 0;
                        }

                        var $chiphikhongloaitru = 0;
                        if ($("#chiphikhongloaitru").is(":checked")) {
                            $chiphikhongloaitru = 1;
                        }

                        $loaitokhai = 1;// tờ khai bổ sung
                        if ($("#khaichinhthuc").prop("checked")) {
                            $loaitokhai = 1;// tờ khai bổ sung
                        }else{
                            $loaitokhai = 0;// tờ khai bổ sung
                        }

                        $.ajax({
                            url: $dir_module_nhapkho + "nhapkho.php", // Bao gồm cả add và edit
                            type: "get", // chọn phương thức gửi là get
                            dateType: "text", // dữ liệu trả về dạng text
                            data: { // Danh sách các thuộc tính sẽ gửi đi
                                STT: $("#STT").val().trim(),
                                ngayghiso: $("#ngayghiso").val().trim(),
                                loaict: $("#loaict").val().trim(),
                                mauso: $("#mauso").val().trim(),
                                kyhieu: $("#kyhieu").val().trim(),
                                sohoadon: $("#sohoadon").val().trim(),
                                ngayhoadon: $("#ngayhoadon").val().trim(),
                                makhachhang: $("#makhachhang").val().trim(),
                                tenkhachhang: $("#tenkhachhang").val().trim(),
                                NhapTuKho: $("#NhapTuKho").val(),
                                loaiphieu: $LoaiPhieu,
                                sophieu: $("#sophieu").val(),
                                diachi: $("#diachi").val().trim(),
                                masothue: $("#masothue").val().trim(),
                                manoidung: $("#manoidung").val().trim(),
                                noidung: $("#noidung").val().trim(),
                                makho: $("#makho").val().trim(),
                                tenkho: $("#tenkho").val().trim(),
                                ngaythanhtoan: $("#ngaythanhtoan").val().trim(),
                                ngaykhaithue: $("#ngaykhaithue").val().trim(),
                                cothuegtgt: $cothuegtgt,
                                tkno1: $("#tkno1").val().trim(),
                                tkno2: $("#tkno2").val().trim(),
                                tkno3: $("#tkno3").val().trim(),
                                tkco1: $("#tkco1").val().trim(),
                                tkco2: $("#tkco2").val().trim(),
                                tkco3: $("#tkco3").val().trim(),
                                sotien1: $("#sotien1").val().trim(),
                                sotien2: $("#sotien2").val().trim(),
                                sotien3: $("#sotien3").val().trim(),
                                tongtien: $("#tongtien").val().trim(),
                                sotiennt1: $("#sotiennt1").val().trim(),
                                sotiennt2: $("#sotiennt2").val().trim(),
                                sotiennt3: $("#sotiennt3").val().trim(),
                                tongtiennt: $("#tongtiennt").val().trim(),
                                tienhang: $("#tienhang").val().trim(),
                                tienchietkhau: $("#tienchietkhau").val().trim(),
                                tienthue: $("#thue").val().trim(),
                                tongcong: $("#tongso").val().trim(),
                                ghichu: $("#ghichu").val().trim(),
                                chietkhaudoanhso: $("#chietkhaudoanhso").val(),
                                chungtugoc: $chungtugoc,
                                chiphikhongloaitru: $chiphikhongloaitru,
                                loaisp:$("#chonloaisp").val(),
                                loaihanghoadichvu: $("#loaihanghoadichvu").val(),
                                loaitokhai: $loaitokhai,
                                chinhanh:$("#ChiNhanhCongTy").val()
                            },
                            success: function (result) {
                                //$('.dialog_main_thongbao').load('form/frm_thongbao_nhapkho.php?loaiphieu=' + $LoaiPhieu + '&ngayhd=' + ngayhoadon.val().trim() + '&sophieu=' + sophieu.val().trim()+ '&tenkho=' + encodeURI(tenkho.val().trim()));
                            }
                        });
                    }
                    $("#hanthanhtoan").focus();
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
                .val(dc).keydown(function (event) {
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

        //-------------------------Thêm mới dữ liệu-------------------------------------------------------
        function addRow(rowIndx,$name='mavt',$grid,$obj_addrow="") {
            //append empty row in the first row.
            if($obj_addrow!=""){
                var rowData =$obj_addrow;
            }else{
                var rowData = {mavt:"",tenvt:"",dvt:"",soluongton :"0",soluongnhap :"0",donggianhap :"0",thanhtien :"0",thuesuat :"10",thue :"0",chietkhau :"0",tienchietkhau :"0"}; //empty row template
            }
            $grid.pqGrid("addRow", { rowIndx: rowIndx, rowData: rowData });

            $grid.pqGrid("setSelection", { rowIndx: rowIndx, dataIndx: $name});
            $grid.pqGrid("editFirstCellInRow", { rowIndx: (rowIndx) });
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

        function ThanhTien($SoLuong, $DonGia,$TienChietKhau,$ThanhTienNhap,$thuenk,$thuettdb,$thanhtienpmt,$phivc,$phibx,$thanhtiennt) {
            $soluong = parseFloat($SoLuong);// Lấy số lượng nhập vào

            $dongia = parseFloat($DonGia);// Lấy đơn giá nhập vào
            if(isNaN($TienChietKhau)== true){
                $chietkhau = 0;
            }else{
                $chietkhau = parseFloat($TienChietKhau);
            }

            $thanhtienchuathue = Math.round(($soluong * $dongia)); // thành tiền  = bằng số lượng * đơn giá (Làm tròn thành tiền)
            $thanhtien = $thanhtienchuathue+$thuenk+$thuettdb+$thanhtienpmt+$phivc+$phibx+$thanhtiennt;
            if($ThanhTienNhap==0 || $ThanhTienNhap==$thanhtien || $ThanhTienNhap=="" || isNaN($ThanhTienNhap)== true){
                return $thanhtien
            }else{
                return $ThanhTienNhap;
            }
        }

        function ThanhTienNT($SoLuong, $DonGia, $ThanhTienNTNhap) {

            $ThanhTienNT = ($SoLuong * $DonGia); // Tiền thuế = Thành tiền * % thuế xuất (Làm tròn tiền thuế)

            if ($ThanhTienNTNhap == 0 || $ThanhTienNTNhap == $ThanhTienNT || $ThanhTienNTNhap == "" || isNaN($ThanhTienNTNhap) == true) {
                return $ThanhTienNT
            } else {
                return $ThanhTienNTNhap;
            }
        }
        /////// Giảm theo nghị quyết///////////////////////////////////
        function giam30theonghidinh(){
            var $ThueSuatGiamTheoNghiQuyet = 1;
            var giam30thuegtgt = $("#giam30theonghiquyet").is(":checked");
            $TuNgayGiamThue  = new Date("2021/11/01");
            $TuNgayGiamThue_20  = new Date("2022/02/01");
            $TuNgayGiamThue_12  = new Date("2023/07/01");
            $DenNgayGiamThue = new Date("2021/12/31");
            $DenNgayGiamThue_20 = new Date("2023/01/01");
            $DenNgayGiamThue_12 = new Date("2024/07/01");
            $NgayLapHoaDon = new Date($("#ngayhoadon").val());
            if(giam30thuegtgt==true && ($NgayLapHoaDon.getTime()>=$TuNgayGiamThue.getTime() && $NgayLapHoaDon.getTime()<=$DenNgayGiamThue.getTime())){
                $ThueSuatGiamTheoNghiQuyet = 0.7;
            }else if(giam30thuegtgt==true && ($NgayLapHoaDon.getTime()>=$TuNgayGiamThue_20.getTime() && $NgayLapHoaDon.getTime()<=$DenNgayGiamThue_20.getTime())) {
                $ThueSuatGiamTheoNghiQuyet = 0.8;
            }else if(giam30thuegtgt==true && ($NgayLapHoaDon.getTime()>=$TuNgayGiamThue_12.getTime() && $NgayLapHoaDon.getTime()<=$DenNgayGiamThue_12.getTime())) {
                $ThueSuatGiamTheoNghiQuyet = 0.8;
            }
            return $ThueSuatGiamTheoNghiQuyet;
        }
        /////// Kết thúc Giảm theo nghị quyết///////////////////////////////////
        function Thue($thanhtien, $PhanTramThue, $TienThueNhap, $TienChietKhau, $ThanhTienNhap) {
            ////////////////////////////////////////////////////////////////////////////////
            $ThueSuatGiamTheoNghiQuyet = giam30theonghidinh();
            ////////////////////////////////////////////////////////////////////////////////
            $tienthue = Math.round($thanhtien * ($PhanTramThue / 100)); // Tiền thuế = Thành tiền * % thuế xuất (Làm tròn tiền thuế)

            if($ThueSuatGiamTheoNghiQuyet=='0.7'){// Giảm 30% thuế GTGT
                $tienthue = Math.round($thanhtien * ($PhanTramThue / 100) * $ThueSuatGiamTheoNghiQuyet); // Tiền thuế = Thành tiền * % thuế xuất (Làm tròn tiền thuế)
            }else if($ThueSuatGiamTheoNghiQuyet=='0.8'){// Giảm 20% thuế GTGT chỉ giảm hàng hoá 10%
                if($PhanTramThue=="10"){
                    $tienthue = Math.round($thanhtien * ($PhanTramThue / 100) * $ThueSuatGiamTheoNghiQuyet); // Tiền thuế = Thành tiền * % thuế xuất (Làm tròn tiền thuế)
                }
            }

            if ($TienThueNhap == 0 || $TienThueNhap == $tienthue || $TienThueNhap == "" || isNaN($TienThueNhap) == true) {
                return $tienthue
            } else {
                return $TienThueNhap;
            }
        }

        function ChietKhau($SoLuong, $DonGia, $PhanTram,$TienChietKhauNhap,$ThanhTienNhap,$thuenk,$thuettdb,$thanhtienpmt,$phivc,$phibx,$thanhtiennt) {
            $thanhtien = ThanhTien($SoLuong, $DonGia,0,$ThanhTienNhap,$thuenk,$thuettdb,$thanhtienpmt,$phivc,$phibx,$thanhtiennt);
            $tienchietkhau = Math.round($thanhtien * ($PhanTram / 100)); // Tiền thuế = Thành tiền * % thuế xuất (Làm tròn tiền thuế)
            if($TienChietKhauNhap==0 || $TienChietKhauNhap==$tienchietkhau || $TienChietKhauNhap=="" || isNaN($TienChietKhauNhap)== true){
                return $tienchietkhau
            }else{
                return $TienChietKhauNhap;
            }
        }

        function TinhTonKho($SLTon, $SLNhap, $SLCu) {
            $SLHienTai = parseFloat($SLNhap) - parseFloat($SLCu);
            $TonHienTai = parseFloat($SLTon)  +($SLHienTai);
            return $TonHienTai;
        }

        //--------------------------------Khai báo lưới---------------------------------------.
		var objnhapkho = {
            hwrap: false,
            resizable: true,
            rowBorders: true,
			height:$height-55,
            width:$width-20,
            freezeCols:4,
            virtualX: false,
            numberCell: { show: true },
			filterModel: { on: true, mode: "AND", header: true },
            trackModel: { on: true }, //to turn on the track changes.
			toolbar: {
                items: [
                    {
                        type: 'button',
                        label: "Nhập XML",
                        icon: 'ui-icon-document',
                        listeners: [{
                            "click": function (evt) {
                                window.open('form/frm_tai_xml_hoadon_window.php?sophieu=<?php echo $SoPhieu; ?>', 'updatedata', 'height=1000','width=2000')
                            }
                        }]
                    },
                    {
                        type: 'button',
                        label: "Xuất Excel",
                        icon: 'ui-icon-document',
                        listeners: [{
                            "click": function (evt) {
                                $("#grid_editing_nhapchitiet_nhapkho").pqGrid("exportCsv", { url:"export_xuatexcel.php" });
                            }
                        }]
                    },
                    {
                        type: 'button', icon: 'ui-icon-refresh', label: 'Cập nhật tồn hiện tại', listeners: [
                        {
                            "click": function (evt, ui) {
                                $.confirm({
                                    title: 'Cập nhật thành công',
                                    type: 'green',
                                    autoClose: 'OK|1000',
                                    content: 'url:themsltk_hientai.php',
                                    contentLoaded: function (data, status, xhr) {
                                    },
                                    buttons: {
                                        "OK": {
                                            keys: ['Y'], action: function () {
                                                $("#grid_editing_nhapchitiet_nhapkho").pqGrid("refreshDataAndView");
                                            }
                                        }
                                    }
                                });
                            }
                        }
                    ]
                    },
                    {
                        type: "<span id='tongtienhienco' style='color:red'></span>"
                    }
                ]
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

                    var obj = rowList[0],
                        rowIndx = obj.rowIndx,
                        newRow = obj.newRow,
                        oldRow = obj.oldRow,
                        type = obj.type,
                        rowData = obj.rowData;
                        rowIndx = obj.rowIndx;

                    $mavt = rowData.mavt;
                    $mavtthaydoi = newRow.mavt;

                    var $datamavt = 0;
                    $.ajax({
                        url: $dir_module_chitiet_vattu + "getmavt.php", // Bao gồm cả add và edit
                        type: "get", // chọn phương thức gửi là get
                        async: false,
                        data: { // Danh sách các thuộc tính sẽ gửi đi
                            mavt: $mavt,
                        },
                        success: function (result) {
                            $datamavt =$.parseJSON(result);
                        }
                    });
                if($datamavt=="0"){
                    alert("Mã vật tư không tồn tại trong hệ thống ! Vui Lòng nhập lại mã khác !");
                    $grid.pqGrid( "rollback" );
                    return false;
                }

                $soluong = (isNaN(rowData.soluongnhap)==true)?(0):(parseFloat(rowData.soluongnhap.toString().split(",").join("")));// Lấy số lượng nhập vào

                $dongia = (isNaN(rowData.donggianhap)==true)?(0):(parseFloat(rowData.donggianhap.toString().split(",").join("")));// Lấy số lượng nhập vào

                //$dongia = parseFloat(rowData.donggianhap.toString().split(",").join(""));// Lấy đơn giá nhập vào

                $TienThueNhap = (isNaN(rowData.thue)==true)?(0):(parseFloat(rowData.thue.toString().split(",").join("")));// Lấy số lượng nhập vào

                //$TienThueNhap = parseFloat(rowData.thue.toString().split(",").join(""));// Lấy đơn giá nhập vào

                $thuesuat = (isNaN(rowData.thuesuat)==true)?(0):(parseFloat(rowData.thuesuat.toString().split(",").join("")));// Lấy số lượng nhập vào

                //$thuesuat = parseFloat(rowData.thuesuat.toString().split(",").join("")); // Lấy % thuế suất nhập vào

                if(<?php echo $cothuegtgt; ?>==0){
                    $thuesuat = parseFloat(0); // Lấy % thuế suất nhập vào
                }

                $chietkhau = (isNaN(rowData.chietkhau)==true)?(0):(parseFloat(rowData.chietkhau.toString().split(",").join("")));// Lấy số lượng nhập vào

                //$chietkhau = parseFloat(rowData.chietkhau.toString().split(",").join("")); // Lấy % chiết khấu nhập nhập vào

                $tienchietkhaunhap = (isNaN(rowData.tienchietkhau)==true)?(0):(parseFloat(rowData.tienchietkhau.toString().split(",").join("")));// Lấy số lượng nhập vào

                //$tienchietkhaunhap = parseFloat(rowData.tienchietkhau.toString().split(",").join("")); // Lấy % chiết khấu nhập nhập vào
                $ThanhTienNTNhap = parseFloat(rowData.thanhtiennt.toString().split(",").join(""));// Lấy đơn giá nhập vào

                $thanhtiennhap = (isNaN(rowData.thanhtienchuack)==true)?(0):(parseFloat(rowData.thanhtienchuack.toString().split(",").join("")));// Lấy số lượng nhập vào

                //$thanhtiennhap = parseFloat(rowData.thanhtienchuack.toString().split(",").join(""));

                $thuenk = parseFloat(rowData.thuenk.toString().split(",").join(""));

                $thuettdb = parseFloat(rowData.thuettdb.toString().split(",").join(""));

                $phivc = parseFloat(rowData.phivc.toString().split(",").join(""));

                $phibx = parseFloat(rowData.phibx.toString().split(",").join(""));

                $soluongcu = oldRow.soluongnhap;
                $soluongmoi = newRow.soluongnhap;

                $donggiacu = oldRow.donggianhap;
                $donggiamoi = newRow.donggianhap;

                $thanhtiencu = oldRow.thanhtienchuack;
                $thientienmoi = newRow.thanhtienchuack;

				$tienchietkhaucu = oldRow.tienchietkhau;
                $tienchietkhaumoi = newRow.tienchietkhau;

                $chietkhaucu = oldRow.chietkhau;
                $chietkhaumoi = newRow.chietkhau;

                $dongiamtcu = oldRow.dongiamt;
                $dongiamtmoi = newRow.dongiamt;

                $baogomthue = <?php echo $baogomthue; ?>;

                if(parseFloat($baogomthue)==1){
                    if($donggiacu!=$donggiamoi){
                        $dongia = Math.round($dongia / (1+($thuesuat/100)), 2);
                    }
                }
                rowData.donggianhap = $dongia.toString();

                if(($soluongcu!=$soluongmoi) || $donggiacu!=$donggiamoi){
                    $thanhtiennhap=0;
                    $TienThueNhap=0;
                    $ThanhTienNTNhap=0;
                }
                if($thanhtiencu!=$thientienmoi || $tienchietkhaucu!=$tienchietkhaumoi){
                    $TienThueNhap=0;
                }

                $thanhtienmtcu = oldRow.thanhtienmt;
                $thientienmtmoi = newRow.thanhtienmt;

                $thuenkcu = oldRow.thuenk;
                $thuenkmoi = newRow.thuenk;

                $thuettdbcu = oldRow.thuettdb;
                $thuettdbmoi = newRow.thuettdb;

                $phivccu = oldRow.phivc;
                $phibxcu = oldRow.phibx;
                $phivcmoi = newRow.phivc;
                $phibxmoi = newRow.phibx;

                $tygiantcu = oldRow.tygiant;
                $nguyententcu = oldRow.nguyentent;
                $tygiantmoi = newRow.tygiant;
                $nguyententmoi = newRow.nguyentent;


                $thanhtienntcu = oldRow.thanhtiennt;
                $thanhtienntmoi = newRow.thanhtiennt;

                $thuesuatcu = oldRow.thuesuat;
                $thuesuatmoi = newRow.thuesuat;

                if ($thanhtienntcu != $thanhtienntmoi) {
                    $thanhtiennhap = 0;
                }

                $tygiant = parseFloat(rowData.tygiant.toString().toString().split(",").join(""));// Lấy đơn giá nhập vào
                $nguyentent = parseFloat(rowData.nguyentent.toString().toString().split(",").join(""));// Lấy đơn giá nhập vào

                if(($thuenkcu!=$thuenkmoi) || ($thuettdbcu!=$thuettdbmoi) || ($dongiamtcu!=$dongiamtmoi) || ($phivccu!=$phivcmoi) || ($phibxcu!=$phibxmoi) || ($tygiantcu!=$tygiantmoi) || ($nguyententcu!=$nguyententmoi) || ($thuesuatcu != $thuesuatmoi)){
                    $thanhtiennhap=0;
                    $TienThueNhap=0;
                    $ThanhTienNTNhap=0;
                }

                $thanhtiennt= ThanhTienNT($soluong,$nguyentent,$ThanhTienNTNhap);

                rowData.thanhtiennt = $thanhtiennt;

                $thanhtienquydoivnd = Math.round($thanhtiennt*$tygiant);

                $dongiamt = parseFloat(rowData.dongiamt.toString().split(",").join(""));// Lấy đơn giá nhập vào

                $thanhtienpmt = $soluong*$dongiamt;

                if ($chietkhaucu != $chietkhaumoi) {
                    $tienchietkhaunhap = 0;
                }

                $TienChietKhau_rowData =ChietKhau($soluong, $dongia, $chietkhau,$tienchietkhaunhap,$thanhtiennhap,$thuenk,$thuettdb,$thanhtienpmt,$phivc,$phibx,$thanhtienquydoivnd);

                rowData.tienchietkhau = $TienChietKhau_rowData;

                $ThanhTien_ChuaCK = ThanhTien($soluong, $dongia,$TienChietKhau_rowData,$thanhtiennhap,$thuenk,$thuettdb,$thanhtienpmt,$phivc,$phibx,$thanhtienquydoivnd); // Đưa thành tiền vào mảng

                rowData.thanhtienchuack = $ThanhTien_ChuaCK;

				$thanhtien = $ThanhTien_ChuaCK - $TienChietKhau_rowData;


                rowData.thanhtienmt = $thanhtienpmt;
                
                if(typeof $mavtthaydoi =='undefined') {

                }else {
                    rowData.tenvt = $datamavt.tenvt;
                }

                rowData.dvt = $datamavt.dvt;

                rowData.thanhtien = $thanhtien;

                if ($chietkhaucu != $chietkhaumoi) {
                    $TienThueNhap = 0;
                }
                rowData.thue = $TienThue_rowData = Thue($thanhtien,$thuesuat,$TienThueNhap,$TienChietKhau_rowData,$TienThueNhap); // Đưa tiền thuế vào mạng

                rowData.sophieu = <?php echo $SoPhieu; ?>;
				rowData.loaiphieu = 1;

                var SLTon = rowData.soluongton; // lấy số lượng tồn
                var re = /,/gi;
                var soluong = rowData.soluongnhap.toString().split(",").join("");// Lấy số lượng nhập

                var soluongcu = rowData.slcu.toString().split(",").join("");// Lấy số lượng nhập

                var str = rowData.donggianhap; // Lấy đơn giá nhập
                try{
                    var donggia = str.toString().split(",").join("");
                }catch (e) {
                    var donggia = 0;
                }
                if ((($thanhtiencu!=$thientienmoi) || ($soluongcu!=$soluongmoi)) && "<?php echo $_SESSION['tudongtinhdongia']; ?>"=="1") {
                $dongiatinh = Math.round(($ThanhTien_ChuaCK/soluong),3);
                rowData.donggianhap = $dongiatinh.toString();
            }
                rowData.soluongton = TinhTonKho(SLTon, soluong, soluongcu);
                rowData.slcu = soluong;


                if (true) {
                    $.ajax({
                        url: $dir_module_chitiet_vattu + "edit.php",
                        data: rowData,
                        dataType: "json",
                        type: "GET",
                        async: true,
                        success: function (res) {
							if(res.recId!="success")
							rowData.sott = res.recId;
							$grid.pqGrid("refreshRow", {rowIndx: rowIndx});
							tongtienhienco();
                        },
                    });
               }
            },
            colModel: [//-------------------------------------------Khai báo các cột trong lưới-----------------------
                {title: "SoTT",dataType: "integer",dataIndx: "sott",editable: false,width: 0,hidden: true,align: "center"},
                {title: "Mã VT", dataType: "string", dataIndx: "mavt", minWidth: 110, sortable: true, editable: true,
                    filter: {
                        type: 'textbox',
                        condition: 'begin',
                        listeners: ['keyup']
                    },
                    render: function (ui) {
                        var rowData = ui.rowData,
                            dataIndx = ui.dataIndx;

                        rowData.pq_cellcls = rowData.pq_cellcls || {};
                        if (rowData.sott!=0) {//if change is negative.
                            rowData.pq_cellcls[dataIndx] = 'green';
                            return rowData.mavt;
                        }
                        else { //if change >= 0
                            return  rowData.mavt;
                        }
                    }
                },
                { title: "Tên VT", minWidth: 200, dataType: "string", dataIndx: "tenvt",
                    validations: [
                        {type: 'minLen', value: 1, msg: "Tên vật tư không được trống !"},
                        {type: 'maxLen', value: 500, msg: "Tên vật tư không được vượt quá 500 ký tự !"}
                    ],
                    filter: {
                        type: 'textbox',
                        condition: 'against',
                        listeners: ['keyup']
                    },
                    editor: {type: "textarea", attr: "rows=3"}
                },
                {
                    title: "ĐVT", minWidth: 70, dataType: "string", align: "center", dataIndx: "dvt", editable: false,
                    validations: [
                        {type: 'minLen', value: 1, msg: "Đơn vị tính chính không được trống !"},
                    ]
                },
                {
                    title: "SL tồn",
                    minWidth: 80,
                    dataType: "string",
                    align: "right",
                    editable: false,
                    dataIndx: "soluongton",
                    editor: {
                        type: formart_num
                    },
                    render: function (ui) {// Hiện số tiền tính toán lên lưới
                        var rowData = ui.rowData,
                            dataIndx = ui.dataIndx;
                        rowData.pq_cellcls = rowData.pq_cellcls || {};
                        if (rowData.soluongton>=0) {//if change is negative.
                            rowData.pq_cellcls[dataIndx] = 'green';
                        }else{
                            rowData.pq_cellcls[dataIndx] = 'tomato';
                        }
                        return $.number(ui.rowData.soluongton,3,'.',',');
                    }
                },
                {
                    title: "Số lượng", minWidth: 70, dataType: "string", align: "right", dataIndx: "soluongnhap",
                    editor: {
                        type: "number"
                    },
                    validations: [
                        {type: 'minLen', value: 1, msg: "Số Lượng nhập không được trống !"},
                    ],
                    render: function (ui) {
                        return FormatNumber(ui.rowData.soluongnhap);
                    }
                },
                {
                    title: "Đơn giá", minWidth: 90, dataType: "string", align: "right", dataIndx: "donggianhap",
                    editor: {
                        type: "number"
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
                    title: "Giá vốn",
                    minWidth: 85,
                    dataType: "string",
                    align: "right",
                    dataIndx: "gianhap",
                    editable: false,

                    render: function (ui) {
                        return FormatNumber(ui.rowData.gianhap.toString());
                    }
                },
				{
                    title: "TT Chưa CK",
                    minWidth: 110,
                    dataType: "string",
                    align: "right",
                    dataIndx: "thanhtienchuack",
                    editable: true,
                    editor: {
                       type: "number"
                    },
                    render: function (ui) {// Hiện số tiền tính toán lên lưới
                        return FormatNumber(ui.rowData.thanhtienchuack.toString());
                    }
                },
                {
                    title: "Thành tiền",
                    minWidth: 110,
                    dataType: "string",
                    align: "right",
                    dataIndx: "thanhtien",
                    editable: false,
                    editor: {
                       type: "number"
                    },
                    render: function (ui) {// Hiện số tiền tính toán lên lưới
                        return FormatNumber(ui.rowData.thanhtien.toString());
                    }
                },
                {
                    title: "TS(%)",
                    width: 60,
                    dataType: "string",
                    align: "right",
                    dataIndx: "thuesuat",
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
                        var rate = ui.rowData.thuesuat;
                        return rate+"%";
                    }
                },
                {
                    title: "Thuế GTGT", minWidth: 100, dataType: "string", dataIndx: "thue", editable: true, align: "right",
                    editor: {
                       type: "number"
                    },
                    render: function (ui) {// Tính toán Tiền thuế và đưa lên lưới
                        return FormatNumber(ui.rowData.thue.toString());
                    }
                },
                {
                    title: "Tỷ giá",
                    minWidth: 85,
                    dataType: "integer",
                    align: "right",
                    dataIndx: "tygiant",
                    editable: true,
                    render: function (ui) {
                        return $.number( ui.rowData.tygiant,0, '.', ',' );
                    }
                },
                {
                    title: "Nguyên tệ",
                    minWidth: 100,
                    dataType: "float",
                    align: "right",
                    dataIndx: "nguyentent",
                    editable: true,
                    render: function (ui) {// Hiện số tiền tính toán lên lưới
                        return FormatNumber(ui.rowData.nguyentent.toString());
                    }
                },
                {
                    title: "Thành tiền NT",
                    minWidth: 100,
                    dataType: "float",
                    align: "right",
                    dataIndx: "thanhtiennt",
                    editable: true,
                    render: function (ui) {// Hiện số tiền tính toán lên lưới
                        return FormatNumber(ui.rowData.thanhtiennt.toString());
                    }
                },
                {
                    title: "Thuế NK", minWidth: 100, dataType: "string", dataIndx: "thuenk", editable: true, align: "right",
                    hidden: false,
                    editor: {
                        type: "number"
                    },
                    render: function (ui) {// Tính toán Tiền thuế và đưa lên lưới
                        return FormatNumber(ui.rowData.thuenk.toString());
                    }
                },
                {
                    title: "Thuế TTĐB", minWidth: 100, dataType: "string", dataIndx: "thuettdb", editable: true, align: "right",
                    hidden: true,
                    editor: {
                        type: "number"
                    },
                    render: function (ui) {// Tính toán Tiền thuế và đưa lên lưới
                        return FormatNumber(ui.rowData.thuettdb.toString());
                    }
                },
                {
                    title: "CK(%)", minWidth: 55, dataType: "string", align: "center", dataIndx: "chietkhau",
                    editor: {
                        type: "number"
                    },
                    render: function (ui) {

                        var rate = ui.rowData.chietkhau;
                        return rate + "%";
                    }
                },
                {
                    title: "Chiết khấu", minWidth: 80, dataType: "string", align: "right", dataIndx: "tienchietkhau",
                    editor: {
                        type: "number"
                    },
                    render: function (ui) {// Tính toán Tiền thuế và đưa lên lưới
                        return $.number( ui.rowData.tienchietkhau, 0, '.', ',' );
                    }
                },
                {
                    title: "ĐG PMT",
                    minWidth: 85,
                    dataType: "float",
                    align: "right",
                    dataIndx: "dongiamt",
                    editable: true,
                    render: function (ui) {
                       return $.number( ui.rowData.dongiamt, 2, '.', ',' );
                    }
                },
                {
                    title: "TT phí MT",
                    minWidth: 100,
                    dataType: "integer",
                    align: "right",
                    dataIndx: "thanhtienmt",
                    editable: true,
                    render: function (ui) {// Hiện số tiền tính toán lên lưới
                        return $.number( ui.rowData.thanhtienmt,0, '.', ',' );
                    }
                },
                {
                    title: "Phí VC",
                    minWidth: 100,
                    dataType: "integer",
                    hidden: true,
                    align: "right",
                    dataIndx: "phivc",
                    editable: true,
                    render: function (ui) {// Hiện số tiền tính toán lên lưới
                        return $.number( ui.rowData.phivc,0, '.', ',' );
                    }
                },
                {
                    title: "Phí BX",
                    minWidth: 100,
                    dataType: "integer",
                    align: "right",
                    dataIndx: "phibx",
                    hidden: true,
                    editable: true,
                    render: function (ui) {// Hiện số tiền tính toán lên lưới
                        return $.number( ui.rowData.phibx,0, '.', ',' );
                    }
                }
            ],
			pageModel: { type: "remote", rPP: 100 },
            dataModel: {
                dataType: "JSON",
                location: "remote",
                recIndx: "sott",
                url: $dir_module_chitiet_vattu + "list.php",//-- Load danh sách lên lưới
                postData: {sophieu: <?php echo $SoPhieu; ?>, list:<?php echo $list; ?>,cothuegtgt:<?php echo $cothuegtgt; ?>,cochietkhau:<?php echo $cochietkhau; ?>,thangngayghiso:<?php echo $thang_ngayghiso; ?>,makho:'<?php echo $makho; ?>'},
                getData: function (dataJSON) {
                var data = dataJSON.data;
                return { curPage: dataJSON.curPage, totalRecords: dataJSON.totalRecords, data: data };
            }
            }

        };

        var $grid = $("#grid_editing_nhapchitiet_nhapkho").pqGrid(objnhapkho);
        $grid.one("pqgridload", function (evt, ui) {
            $("#grid_editing_nhapchitiet_nhapkho .pq-search-txt").focus();
            tongtienhienco();
        });
		function getRowSelect() { // --------------------Lấy dữ liệu theo dòng trên gird----------------------
             var arr = $("#grid_editing_nhapchitiet_nhapkho").pqGrid("selection", {
                 type: 'cell',
                 method: 'getSelection'
             }); //Lấy giá trị đang chọn
             if (arr && arr.length > 0) {
                 return arr;
             } else {
                 return false;
             }
         }

		 function tongtienhienco(){
			 $.ajax({// Kiểm tra xem STT có tồn tại hay không
                        url: $dir_module_chitiet_vattu + "tongtienhientaicuaphieunhap.php",
                        data: {sophieu: <?php echo $SoPhieu; ?>},
                        async: false,
                        success: function (response) {
                          $("#tongtienhienco").html(response);
                        }
               });
		 }
        window.CallParent = function() {
            $("#grid_editing_nhapchitiet_nhapkho").pqGrid("refreshDataAndView");
        }

        //-----------------------------Hết lưới---------------------------------------------------------------------
    });
</script>
<div id="dialog-bangchitiet_nhapkho"
     title="Nhập đơn giá, số lượng hàng hóa vật tư (ESC: Thoát , F4: Thêm, INSERT: Lấy danh sách, F10: Phân bổ chiết khấu, F2: Chuyển đổi)"><!-- dialog -->
    <div id="grid_editing_nhapchitiet_nhapkho" style="margin:5px auto;border: 0px !important;"></div>
</div>
