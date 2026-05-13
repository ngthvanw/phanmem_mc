<?php
session_start();
require("../config.php");
if (!isset($_SESSION['User'])) {
    session_destroy();
    redirect("../login.php");
}

if (!isset($_SESSION['NienDo'])) {
    redirect("../niendo.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHẦN MỀM QUẢN LÝ KẾ TOÁN</title>

    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css"/>
    <link rel="stylesheet" type="text/css" href="css/local.css"/>

    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>

    <style>

        div {
            padding-bottom: 20px;
        }

    </style>
    <script>
        $(document).ajaxStart(function () {
            $("#wait").css("display", "block");
        });
        $(document).ajaxComplete(function () {
            $("#wait").css("display", "none");
        });
        $(function () {
            $dir_module_sltonkho = "../modules/soluongtonkho/";////////////////Khai báo đường dẫn vào mudole
            $dir_module_nhapkho = "../modules/psmavattu/";//----------------Lưới


            $("#xemtruockhiin_insolieu_thuchi").click(function () {
                var parsedJson = "";
                $TenPhieu_ThuChi = "BẢNG KÊ GIÁ TRỊ VẬT TƯ,SẢN PHẨM, HÀNG HÓA";
                $NgayLap_InPhieuThuChi = "";

                $thangtk = $("#tuthang").val();
                $congdontuthang = $("#tuthang").val();
                $congdondenthang = $("#tinhlaituthang").val();
                $tungay = $("#congdontungay").val();
                $denngay = $("#condondenngay").val();
                $Insotonkho = $("#Insotonkho").val();
                $tinhlaituthang = $("#tinhlaituthang").val();
                $Inxoasoam = $("#Inxoasoam").val();
                $sole = 2;
                $sxtheonhommathang = $("#sxtheonhommathang").prop("checked");
                $congdon = 0;
                if ($("#rd_congdonthangtonkho").prop("checked")) {
                    $congdon = 1;
                }

                $chuyentonkho = $("#KhoaSoVaChuyenTonKho").prop("checked");

                for ($i = $thangtk; $i <= $tinhlaituthang; $i++) {
                    $.ajax({// Chuyển tồn kho cho năm mới
                        url: $dir_module_sltonkho + "laythongtininphieutkchitiettheothang.php",
                        async: false,
                        data: {thangtk: $i},
                        success: function (response) {// Thêm tồn kho mới vào
                            //if(response.trim()!="")
                            //alert("Mặt hàng âm tháng "+$i+ " \n"+response);
                        }
                    });
                }

                $NgayLap_InPhieuThuChi = "";

                $.ajax({// Lấy thông tin phiếu và lưu vào session
                    url: $dir_module_nhapkho + "m_laythongtininphieutkchitietthang_theonhom.php",
                    data: {
                        thangtk: $thangtk,
                        sole: $sole,
                        congdontuthang: $congdontuthang,
                        congdondenthang: $congdondenthang,
                        congdon: $congdon,
                        Inxoasoam: $Inxoasoam,
                        tenphieu: $TenPhieu_ThuChi
                    },
                    async: false,
                    success: function (response) {
                    }
                });

                window.open("../modules/psmavattu/inphieutkthang_theonhom.php?sole=<?php echo $sole ?>", "mywindow", "menubar=0,resizable=1");

            });

        });
    </script>
</head>
<body>

<div id="wrapper">
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">PHẦN MỀM KẾ TOÁN - NĂM <?php echo $_SESSION['NienDo']; ?></a>
        </div>
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav side-nav">
                <li><a href="../niendo.php"><i class="fa fa-bullseye"></i> NIÊN ĐỘ </a></li>
                <li><a href="thu_chi.php"><i class="fa fa-university"></i> THU/CHI </a></li>
                <li><a href="lai_lo.php"><i class="fa fa-money"></i> LÃI/LỖ</a></li>
                <li><a href="tonkho.php"><i class="fa fa-globe"></i> TỒN KHO</a></li>
                <li><a href="congno.php"><i class="fa fa-list-ol"></i> CÔNG NỢ </a></li>
                <li><a href="giathanh.php"><i class="fa fa-font"></i> GIÁ THÀNH</a></li>
            </ul>
        </div>
    </nav>

    <div>
        <div class="row text-center">
            <h2>TỒN KHO</h2>
        </div>

        <div>
            <label for="tuthang" class="col-md-2">
                Từ tháng:
            </label>
            <div class="col-md-9">
                <select name="tuthang" id="tuthang" class="form-control">
                    <option selected value="1">Tháng 1</option>
                    <option value="2">Tháng 2</option>
                    <option value="3">Tháng 3</option>
                    <option value="4">Tháng 4</option>
                    <option value="5">Tháng 5</option>
                    <option value="6">Tháng 6</option>
                    <option value="7">Tháng 7</option>
                    <option value="8">Tháng 8</option>
                    <option value="9">Tháng 9</option>
                    <option value="10">Tháng 10</option>
                    <option value="11">Tháng 11</option>
                    <option value="12">Tháng 12</option>
                </select>
            </div>
        </div>

        <div>
            <label for="tuthang" class="col-md-2">
                Đến tháng:
            </label>
            <div class="col-md-9">
                <select name="tinhlaituthang" id="tinhlaituthang" class="form-control">
                    <option <?php if (date("m") == 1) {
                        echo "selected";
                    } ?> value="1">Tháng 1
                    </option>
                    <option <?php if (date("m") == 2) {
                        echo "selected";
                    } ?> value="2">Tháng 2
                    </option>
                    <option <?php if (date("m") == 3) {
                        echo "selected";
                    } ?> value="3">Tháng 3
                    </option>
                    <option <?php if (date("m") == 4) {
                        echo "selected";
                    } ?> value="4">Tháng 4
                    </option>
                    <option <?php if (date("m") == 5) {
                        echo "selected";
                    } ?> value="5">Tháng 5
                    </option>
                    <option <?php if (date("m") == 6) {
                        echo "selected";
                    } ?> value="6">Tháng 6
                    </option>
                    <option <?php if (date("m") == 7) {
                        echo "selected";
                    } ?> value="7">Tháng 7
                    </option>
                    <option <?php if (date("m") == 8) {
                        echo "selected";
                    } ?> value="8">Tháng 8
                    </option>
                    <option <?php if (date("m") == 9) {
                        echo "selected";
                    } ?> value="9">Tháng 9
                    </option>
                    <option <?php if (date("m") == 10) {
                        echo "selected";
                    } ?> value="10">Tháng 10
                    </option>
                    <option <?php if (date("m") == 11) {
                        echo "selected";
                    } ?> value="11">Tháng 11
                    </option>
                    <option <?php if (date("m") == 12) {
                        echo "selected";
                    } ?> value="12">Tháng 12
                    </option>
                </select>
            </div>
        </div>

        <div style="display: none">
            <input style="margin:5px;" name="rd_thangtonkho" type="radio" id="rd_thangtonkho" checked="checked">
            <input style="margin:5px;" name="rd_thangtonkho" type="radio" id="rd_congdonthangtonkho">
            <label for="Insotonkho" class="col-md-2">
                BỘ PHẬN:
            </label>
            <div class="col-md-9">
                <select name="Insotonkho" id="Insotonkho" class="form-control">
                    <option value="1">Chỉ in tồn kho</option>
                </select>
            </div>
        </div>

        <div style="display: none">
            <label for="Inxoasoam" class="col-md-2">
                BỘ PHẬN:
            </label>
            <div class="col-md-9">
                <select name="Inxoasoam" id="Inxoasoam" class="form-control">
                    <option value="1">In toàn bộ</option>
                </select>
            </div>
        </div>

        <div style="display: none">
            <label for="Inxoasoam" class="col-md-2">
                BỘ PHẬN:
            </label>
            <div class="col-md-9">
                <select name="Inxoasoam" id="Inxoasoam" class="form-control">
                    <option value="1">In toàn bộ</option>
                </select>
            </div>
        </div>

        <div>
            <div class="col-md-9">
                <div id="wait" style="width:69px;position:absolute;left:42%;padding:0px;display: none;"><img
                            src='../images/process1.gif' width="64" height="64"/><br>Đang xử lý..
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-10">
                <button type="button" style="width: 99%" class="btn btn-info btn-lg " id="xemtruockhiin_insolieu_thuchi"
                        data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Đang xử lý">
                    &nbsp;&nbsp;&nbsp;Xem&nbsp;&nbsp;&nbsp;
                </button>
            </div>
        </div>
    </div>
</div>

</body>
</html>
