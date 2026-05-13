<!DOCTYPE HTML>
<html lang="vi">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="icon/favicon.ico"/>
    <meta http-equiv="content-type" content="text/html"/>
    <meta name="author" content="ketoanchienthuat.com"/>

    <script type="text/javascript" src="js/jquery.min.js"></script>

    <link rel="stylesheet" type="text/css" href="css/main.css"/>
    <link rel="stylesheet" type="text/css" href="css/color_menu.css"/>
    <script src="js/function.js"></script>

    <script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
	
    <!-- dialog jquery ui -->
    <link rel="stylesheet" href="css/jquery-ui.min.css"/>
    <script src="js/jquery-ui.js"></script>
	 <script type="text/javascript" src="number/jquery.number.js"></script>
	 
	  <!-- dialog jquery ui
    <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.1/themes/base/jquery-ui.css" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>    
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"></script>
	-->
	
	<!-- CSS -->
	<link href="https://cdn.jsdelivr.net/npm/tom-select/dist/css/tom-select.css" rel="stylesheet">
	<!-- JavaScript -->
	<script src="https://cdn.jsdelivr.net/npm/tom-select/dist/js/tom-select.complete.min.js"></script>


    <!--PQ Grid files-->
    <link rel="stylesheet" href="grid/pqgrid.min.css"/>
    <script src="grid/pqgrid.min.js"></script>
    <!--PQ Grid Office theme-->
    <link rel="stylesheet" href="grid/themes/office/pqgrid.css"/>

    <link rel="stylesheet" href="comfirm/libs/bundled.css"/>
    <link rel="stylesheet" href="comfirm/demo.css"/>
    <!-- jquery-confirm files -->
    <link rel="stylesheet" type="text/css" href="css/jquery-confirm.css"/>
    <script type="text/javascript" src="js/jquery-confirm.js"></script>

    <style>
	*{
		font-family: "Times New Roman", Times, serif !important;
	}
	    .loader_sub_2 {
            margin: 200px auto;
            z-index: 20000;
			filter: Alpha(Opacity=100);
        }
        #loader_bg_loading_2 {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: #aaa;
            filter: Alpha(Opacity=60);
			text-align:center;
        }
		
        .loader_sub {
            width: 200px;
            height: 101px;
            margin: 200px auto;
            z-index: 2000;
        }
        @keyframes loading {
            0% {
                transform: translate(-9px, -25px) rotate(0deg);
            }
            100% {
                transform: translate(-9px, -25px) rotate(360deg);
            }
        }
        #loader_bg_loading {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: #aaa;
            opacity: .3;
            filter: Alpha(Opacity=20);
        }
        #fixNav {
            width: 100%;
            height: 40px;
            background-color: #7ec6e3;
            display: block;
            box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.5); /*Đổ bóng cho menu*/
            position: fixed; /*Cho menu cố định 1 vị trí với top và left*/
            bottom: 0; /*Nằm trên cùng*/
            left: 0; /*Nằm sát bên trái*/
        }
        /* Hover cho submenu */
    </style>
    <script type="text/javascript">
        <?php if(isset($_SESSION['NienDo'])){ ?>
        window.addEventListener("beforeunload", function (e) {
            var confirmationMessage = "Are you sure you want to leave this page without placing the order ?";
            (e || window.event).returnValue = confirmationMessage;
            return confirmationMessage;

        });
        <?php } ?>
        var brow = browserName();
        if (brow != "Chrome" && brow!="Firefox") {
            alert("Bạn cần phải sử dụng trình duyệt chrome hoặc cốc cốc hoặc firefox để sử dụng phần mềm !");
        }
    </script>
    <!--End of Tawk.to Script-->
    <title>PHẦN MỀM KẾ TOÁN CHIẾN THUẬT - <?php echo($_SESSION['TenCongTy']); ?></title>
</head>
<body style="padding-left: 2px;padding-right: 2px;">
<div style="margin-top:-20px" id="box">
    <table id="border-box" cellspacing="0" cellpadding="0">
        <tr>
            <td colspan="2">
                <table id="top-banner" style="height:50px;background-color: #7ec6e3;">
                    <tr>
                        <td style="width: 20%; border: 0px solid red;"><span style="margin-left: 10px;"><img
                                        src="logo/logo.png" height="45px"/></span></td>
                        <td style="width: 30%;">
                            <div class="clock">
                                <div id="Date"></div>
                                <ul class="dongho">
                                    <li id="hours"></li>
                                    <li id="point">:</li>
                                    <li id="min"></li>
                                    <li id="point">:</li>
                                    <li id="sec"></li>
                                </ul>
                            </div>
                        </td>
                        <td style="width:50%;border: 0px solid blue;text-align: right;">
                            <span id="info_login" style="margin-right: 10px;color: #000;font-weight: bold;font-size: 12px;">
                                <?php echo $_SESSION['MST'] . "-" . $_SESSION['TenCongTy'] . " - NIÊN ĐỘ: " . $_SESSION['NienDo']; ?>
                                | Tên đăng nhập : <?php echo $_SESSION['User'] ?>
                            </span>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>