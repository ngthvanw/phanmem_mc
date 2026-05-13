<?php
session_start();
require("../config.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHẦN MỀM QUẢN LÝ KẾ TOÁN</title>

    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="css/local.css" />

    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>

    <style>

        div {
            padding-bottom:20px;
        }

    </style>
    <script>
        $(function () {
            $dir_module_dmsanpham = "../modules/dmsanpham/";
            $("#xemtruockhiin_insolieu_thuchi").click(function () {
                var parsedJson = "";
                $TenPhieu_ThuChi = "BẢNG TỔNG HỢP GIÁ THÀNH";
                $NgayLap_InPhieuThuChi = "";

                $tungay = $("#congdontuthang").val();
                $denngay = $("#congdondenthang").val();

                $loaisanpham = $("#loaisanpham").val();

                $.ajax({// Lấy thông tin phiếu và lưu vào session
                    url: $dir_module_dmsanpham + "m_themthongtin_tonghop_doanhthu_chiphi_congtrinh.php",
                    data: {
                        tungay:$tungay,
                        denngay:$denngay,
                        loaisanpham:$loaisanpham,
                    },
                    async: false,
                    success: function (response) {
                    }
                });

                $.ajax({
                    url: $dir_module_dmsanpham + "m_laythongtin_tonghop_doanhthu_chiphi_congtrinh.php",
                    dataType: 'json',
                    method: 'get',
                    data: {
                        tungay:$tungay,
                        denngay:$denngay,

                        tenphieu:$TenPhieu_ThuChi,
                        ngaylap:$("#NgayLap_InPhieuThuChi").val(),
                        ngayhoadon:$("#NgayHoaDon_InPhieu_ThuChi").val(),
                        loaisanpham:$loaisanpham
                    },
                    async: false,
                    success: function (response) {

                    }
                });
                if($loaisanpham=="CT")
                    window.open("../tcpdf/baocao/inbang_tonghop_danhthu_chiphi_giathanh_congtrinh.php","cpct","menubar=0,resizable=0");
                else
                    window.open("../tcpdf/baocao/inbang_tonghop_danhthu_chiphi_giathanh_sanpham.php","cpso","menubar=0,resizable=0");
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
                <li ><a href="../niendo.php"><i class="fa fa-bullseye"></i> NIÊN ĐỘ </a></li>
                <li ><a href="thu_chi.php"><i class="fa fa-university"></i> THU/CHI </a></li>
                <li><a href="lai_lo.php"><i class="fa fa-money"></i> LÃI/LỖ</a></li>
                <li><a href="tonkho.php"><i class="fa fa-globe"></i> TỒN KHO</a></li>
                <li><a href="congno.php"><i class="fa fa-list-ol"></i> CÔNG NỢ </a></li>
                <li><a href="giathanh.php"><i class="fa fa-font"></i> GIÁ THÀNH</a></li>
            </ul>
        </div>
    </nav>

    <div>
        <div class="row text-center">
            <h2>GIÁ THÀNH</h2>
        </div>
        <div>
            <label for="congdontuthang" class="col-md-2">
                Từ ngày:
            </label>
            <div class="col-md-9">
                <input type="date"  value="<?php echo $_SESSION['TuNgay']; ?>" class="form-control" id="congdontuthang" placeholder="Enter First Name">
            </div>
        </div>
        <div>
            <label for="congdondenthang" class="col-md-2">
                Đến ngày:
            </label>
            <div class="col-md-9">
                <input type="date" class="form-control" value="<?php echo $_SESSION['DenNgay']; ?>" id="congdondenthang" placeholder="Enter Last Name">
            </div>

        </div>

        <div >
            <label for="loaisanpham" class="col-md-2">
                BỘ PHẬN:
            </label>
            <div class="col-md-9">
                <select name="loaisanpham" id="loaisanpham" class="form-control">
                    <option value="CT">CÔNG TRÌNH</option>
                    <option value="SP">SẢN PHẨM</option>
                </select>
            </div>
        </div>

        <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-10">
                <button id="xemtruockhiin_insolieu_thuchi" style="width: 99%" type="submit" class="btn btn-info">
                    &nbsp;&nbsp;&nbsp;Xem&nbsp;&nbsp;&nbsp;
                </button>
            </div>
        </div>

    </div>
</div>

</body>
</html>
