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
            $dir_module_makhachhang = "../modules/makhachhang/";
            $dir_module_psvattu_ketoantonghop = "../modules/ketoantonghop/";
            $("#xemtruockhiin_insolieu_thuchi").click(function () {
                var parsedJson = "";
                $TenPhieu_ThuChi = "Sổ Quỹ";
                $NgayLap_InPhieuThuChi = "";

                $tungay = $("#congdontuthang").val();
                $denngay = $("#congdondenthang").val();

                $makhachhang = $("#MaKhachHang").val();

                $mataikhoan = $("#mataikhoan").val();
                $nhomkhachhang = $("#nhomkhachhang").val();

                $loaitien = $("#loaitien").val();
                $theothongtu = $("#theothongtu").val();
                $congdonhanghoa = $("#congdonhanghoa").val();
                $xemtonghop = $('#XemTongHop').prop('checked');

                $.ajax({// Lấy thông tin phiếu và lưu vào session
                    url: $dir_module_makhachhang + "themdskhcongno.php",
                    data: {
                        tungay: $tungay,
                        denngay: $denngay,
                        mataikhoan: $mataikhoan,
                        loaitien: $loaitien,
                        theothongtu: $theothongtu,
                        makhachhang: $makhachhang,
                        nhomkhachhang:$nhomkhachhang,

                    },
                    async: false,
                    success: function (response) {
                    }
                });

                $TenPhieu_ThuChi = "BẢNG TỔNG HỢP CÔNG NỢ";
                $NgayLap_InPhieuThuChi = "";
                $.ajax({// Lấy thông tin phiếu và lưu vào session
                    url: $dir_module_psvattu_ketoantonghop + "m_laythongtininphieu_bangtonghop_nokhachhang.php",
                    data: {
                        tungay:$tungay,
                        denngay:$denngay,
                        makhachhang:$makhachhang,
                        mataikhoan:$mataikhoan,
                        nhomkhachhang:$nhomkhachhang,
                        loaitien:$loaitien,
                        tenphieu:$TenPhieu_ThuChi,
                        ngaylap:$("#NgayLap_InPhieuThuChi").val(),
                        ngayhoadon:$("#NgayHoaDon_InPhieu_ThuChi").val()
                    },
                    async: false,
                    success: function (response) {
                    }
                });
                if($loaitien=='NT'){
                    window.open("../tcpdf/baocao/inbang_tonghop_nokhachhang_nt.php?xemtonghop=false","tonghopnokhachhang","menubar=0,resizable=0");
                }else{
                    window.open("../tcpdf/baocao/inbang_tonghop_nokhachhang.php?xemtonghop=false","tonghopnokhachhang","menubar=0,resizable=0");
                }

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
            <h2>TỔNG HỢP CÔNG NỢ</h2>
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

        <div style="display: none">
            <label for="MaKhachHang" class="col-md-2">
                BỘ PHẬN:
            </label>
            <div class="col-md-9">
                <select name="MaKhachHang" id="MaKhachHang" class="form-control">
                    <option value="ALL">0001 - TẤT CẢ</option>
                </select>
            </div>
        </div>

        <div style="display: none">
            <label for="mataikhoan" class="col-md-2">
                BỘ PHẬN:
            </label>
            <div class="col-md-9">
                <select name="mataikhoan" id="mataikhoan" class="form-control">
                    <option value="ALL">NỘI DUNG</option>
                </select>
            </div>
        </div>

        <div style="display: none">
            <label for="loaitien" class="col-md-2">
                BỘ PHẬN:
            </label>
            <div class="col-md-9">
                <select name="sapxep" id="loaitien" class="form-control">
                    <option value="ALL">TẤT CẢ</option>
                </select>
            </div>
        </div>

        <div style="display: none">
            <label for="nhomkhachhang" class="col-md-2">
                BỘ PHẬN:
            </label>
            <div class="col-md-9">
                <select name="nhomkhachhang" id="nhomkhachhang" class="form-control">
                    <option value="ALL">TẤT CẢ</option>
                    <input type="checkbox" id="XemTongHop" />
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
