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
            $dir_module_psvattu = "../modules/psmavattu/";
            $("#xemtruockhiin_insolieu_thuchi").click(function () {
                var parsedJson = "";
                $TenPhieu_ThuChi = "SỔ CHI TIẾT NHẬP, XUẤT , CHUYỄN VẬT TƯ HÀNG HÓA";
                $NgayLap_InPhieuThuChi = "";

                $tungay = $("#congdontuthang").val();
                $denngay = $("#congdondenthang").val();

                $nhapxuatkho = $("#nhapxuatkho").val();

                $theonoidung = $("#theonoidung").val();
                $theokhachhang = $("#theokhachhang").val();
                $theotaikhoan = $("#theotaikhoan").val();

                $mavattu = $("#mavattu").val();
                $xemtatcahanghoa = $("#xemtatcahanghoa").prop("checked");

                $sapxephanghoa = $("#sapxephanghoa").val();

                $congdonhanghoa = $("#congdonhanghoa").val();

                $.ajax({// Lấy thông tin phiếu và lưu vào session
                    url: $dir_module_psvattu + "m_laythongtin_baocao_laigop.php",
                    data: {
                        tungay:$tungay,
                        denngay:$denngay,
                        nhapxuatkho:$nhapxuatkho,
                        theonoidung:$theonoidung,
                        theokhachhang:$theokhachhang,
                        mavattu:$mavattu,
                        xemtatcahanghoa:$xemtatcahanghoa,
                        sapxephanghoa:$sapxephanghoa,
                        congdonhanghoa:$congdonhanghoa,
                        theotaikhoan:$theotaikhoan,

                        tenphieu:$TenPhieu_ThuChi,
                        ngaylap:$("#NgayLap_InPhieuThuChi").val(),
                        ngayhoadon:$("#NgayHoaDon_InPhieu_ThuChi").val()
                    },
                    async: false,
                    success: function (response) {
                    }
                });
                if($congdonhanghoa=="1")
                    window.open("../tcpdf/baocao/inbangke_chitiet_hanghoa_laigop.php","bankelaigop","menubar=0,resizable=1");
                else
                    window.open("../tcpdf/baocao/inbangke_chitiet_hanghoa_laigop_chitiet.php","bankelaigop_chitiet","menubar=0,resizable=1");

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
            <h2>LÃI/LỖ</h2>
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
            <label for="mavattu" class="col-md-2">
                Đến ngày:
            </label>
            <div class="col-md-9">
                <input type="hidden" class="form-control" id="mavattu" value="1111" placeholder="Enter Last Name">
            </div>

        </div>
        <div style="display: none">
            <label for="nhapxuatkho" class="col-md-2">
                BỘ PHẬN:
            </label>
            <div class="col-md-9">
                <select name="nhapxuatkho" style="width:95%;height:25px;" id="nhapxuatkho">
                    <option value="1">Xuất kho</option>
                </select>
            </div>
        </div>

        <div style="display: none">
            <label for="theonoidung" class="col-md-2">
                BỘ PHẬN:
            </label>
            <div class="col-md-9">
                <select name="theonoidung" id="theonoidung" class="form-control">
                    <option value="ALL">NỘI DUNG</option>
                </select>
            </div>
        </div>

        <div style="display: none">
            <label for="theokhachhang" class="col-md-2">
                BỘ PHẬN:
            </label>
            <div class="col-md-9">
                <select name="theokhachhang" id="theokhachhang" class="form-control">
                    <option value="ALL">NỘI DUNG</option>
                </select>
            </div>
        </div>
        <div style="display: none">
            <label for="theotaikhoan" class="col-md-2">
                BỘ PHẬN:
            </label>
            <div class="col-md-9">
                <select name="theotaikhoan" id="theotaikhoan" class="form-control">
                    <option value="ALL">NỘI DUNG</option>
                </select>
            </div>
        </div>

        <div style="display: none">
            <label for="sapxephanghoa" class="col-md-2">
                BỘ PHẬN:
            </label>
            <div class="col-md-9">
                <select name="sapxephanghoa" id="sapxephanghoa" class="form-control">
                    <option value="ngayghiso">NGÀY GHI SỔ</option>
                </select>
            </div>
        </div>

        <div style="display: none">
            <label for="congdonhanghoa" class="col-md-2">
                BỘ PHẬN:
            </label>
            <div class="col-md-9">
                <select name="congdonhanghoa" id="congdonhanghoa" class="form-control">
                    <option value="1">Cộng dồn</option>
                </select>
                <input type="checkbox" checked value="" id="xemtatcahanghoa" name="xemtatcahanghoa">
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
