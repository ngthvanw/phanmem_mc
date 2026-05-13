<?php
session_start();
$_SESSION['TuNgay'] = $_SESSION['NienDo']."-01-01";
$_SESSION['DenNgay'] = $_SESSION['NienDo']."-".date("m-d");
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

    <!-- you need to include the shieldui css and js assets in order for the charts to work -->
    <link rel="stylesheet" type="text/css" href="https://www.shieldui.com/shared/components/latest/css/light-bootstrap/all.min.css" />
    <script type="text/javascript" src="https://www.shieldui.com/shared/components/latest/js/shieldui-all.min.js"></script>
    <script type="text/javascript" src="https://www.prepbootstrap.com/Content/js/gridData.js"></script>
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

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-3">
                    <div class="panel panel-default ">
                        <div class="panel-body alert-info">
                            <div class="col-xs-5">
                                <i class="fa fa-university fa-5x"></i>
                            </div>
                            <div class="col-xs-5 text-right">
                                <p class="alerts-heading"></p>
                                <p class="alerts-text"><a href="thu_chi.php">THU/CHI</a></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="panel panel-default ">
                        <div class="panel-body alert-info">
                            <div class="col-xs-5">
                                <i class="fa fa-money fa-5x"></i>
                            </div>
                            <div class="col-xs-5 text-right">
                                <p class="alerts-heading"></p>
                                <p class="alerts-text"><a href="lai_lo.php">LÃI/LỖ</a></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="panel panel-default ">
                        <div class="panel-body alert-info">
                            <div class="col-xs-5">
                                <i class="fa fa-twitter fa-5x"></i>
                            </div>
                            <div class="col-xs-5 text-right">
                                <p class="alerts-heading"></p>
                                <p class="alerts-text"><a href="tonkho.php">TỒN KHO</a></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="panel panel-default ">
                        <div class="panel-body alert-info">
                            <div class="col-xs-5">
                                <i class="fa fa-download fa-5x"></i>
                            </div>
                            <div class="col-xs-5 text-right">
                                <p class="alerts-heading"></p>
                                <p class="alerts-text"><a href="congno.php">CÔNG NỢ</a></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="panel panel-default ">
                        <div class="panel-body alert-info">
                            <div class="col-xs-5">
                                <i class="fa fa-list-ul fa-5x"></i>
                            </div>
                            <div class="col-xs-5 text-right">
                                <p class="alerts-heading"></p>
                                <p class="alerts-text"><a href="congno.php">GIÁ THÀNH</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- /#wrapper -->

    <script type="text/javascript">
        jQuery(function ($) {
            var performance = [12, 43, 34, 22, 12, 33, 4, 17, 22, 34, 54, 67],
                visits = [123, 323, 143, 132, 274, 223, 143, 156, 223, 223],
                budget = [23, 19, 11, 34, 42, 52, 35, 22, 37, 45, 55, 57],
                sales = [11, 9, 31, 34, 42, 52, 35, 22, 37, 45, 55, 57],
                targets = [17, 19, 5, 4, 62, 62, 75, 12, 47, 55, 65, 67],
                avrg = [117, 119, 95, 114, 162, 162, 175, 112, 147, 155, 265, 167];

            $("#shieldui-chart1").shieldChart({
                primaryHeader: {
                    text: "Visitors"
                },
                exportOptions: {
                    image: false,
                    print: false
                },
                dataSeries: [{
                    seriesType: "area",
                    collectionAlias: "Q Data",
                    data: performance
                }]
            });

            $("#shieldui-chart2").shieldChart({
                primaryHeader: {
                    text: "Login Data"
                },
                exportOptions: {
                    image: false,
                    print: false
                },
                dataSeries: [
                    {
                        seriesType: "polarbar",
                        collectionAlias: "Logins",
                        data: visits
                    },
                    {
                        seriesType: "polarbar",
                        collectionAlias: "Avg Visit Duration",
                        data: avrg
                    }
                ]
            });

            $("#shieldui-chart3").shieldChart({
                primaryHeader: {
                    text: "Sales Data"
                },
                dataSeries: [
                    {
                        seriesType: "bar",
                        collectionAlias: "Budget",
                        data: budget
                    },
                    {
                        seriesType: "bar",
                        collectionAlias: "Sales",
                        data: sales
                    },
                    {
                        seriesType: "spline",
                        collectionAlias: "Targets",
                        data: targets
                    }
                ]
            });

            $("#shieldui-grid1").shieldGrid({
                dataSource: {
                    data: gridData
                },
                sorting: {
                    multiple: true
                },
                paging: {
                    pageSize: 7,
                    pageLinksCount: 4
                },
                selection: {
                    type: "row",
                    multiple: true,
                    toggle: false
                },
                columns: [
                    { field: "id", width: "70px", title: "ID" },
                    { field: "name", title: "Person Name" },
                    { field: "company", title: "Company Name" },
                    { field: "email", title: "Email Address", width: "270px" }
                ]
            });
        });
    </script>
</body>
</html>
