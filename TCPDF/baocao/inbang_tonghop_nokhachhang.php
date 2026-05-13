<?php
session_start();
$DATACIBANRA = $_SESSION["LISTTONGHOPNO"];
?>
<html>
<head><title>Bảng tổng hợp công nợ khách hàng (Nhấn CTRL + P để in , ALT + F4 để thoát)</title>

    <style type="text/css" class="init">
        .dataTable {
            font-family: "Times New Roman", Georgia, Serif;
            border-collapse: collapse;
            width: 100%;
        }
        .dataTable td{
            padding: 1px 2px;
			font-size: 13px;

        }
        .dataTable .td_full, th {
            border: 1px solid #000000;
            text-align: center;
            font-size: 13px;
            padding: 1px 2px;
        }
        .dataTable .td_first {
            border: 1px dashed #000000;
            border-left: 1px solid #000000;
        }

        .dataTable .td_center {
            border-bottom: 1px dashed #000000;
            border-left: 1px solid #000000;
        }

        .dataTable .td_end {
            border: 1px dashed #000000;
            border-left: 1px solid #000000;
            border-right: 1px solid #000000;
        }
        body{
            width: 297mm;
			margin: 2px;
			padding: 2px;
        }
        .page_break{
            page-break-inside: avoid;
        }
		@page {
			size: A4 landscape;
			margin-left: 4mm;
            margin-right: 10mm;

			}


		@media print {
			#Header, #Footer { display: none !important; }
            .no-print, .no-print * {
                display: none !important;
            }
		}

		#Header, #Footer { display: none !important; }
		 @media print
   {
      p.bodyText {font-family:times,georgia, serif;}
   }

    </style>
    <meta charset="utf-8">
    <script type="text/javascript" src="../../js/jquery.js"></script>
    <script type="text/javascript" src="../../js/jquery.table2excel.js"></script>
    <script type="text/javascript" language="javascript">
        $(document).ready(function() {
            $dir_module_user = "../../modules/user/";////////////////Khai báo đường dẫn vào mudole
            $("#TrinhDuyet").click(function(event){
                $res = confirm("Bạn có muốn đăng ký trình duyệt bản cân đối tài khoản này không ?");
                if($res){
                    $.ajax({// Kiểm tra xem STT có tồn tại hay không
                        url: $dir_module_user + "themtrinhky.php",
                        async: false,
                        success: function (response) {
                            alert("Đăng ký trình ký thành công .");
                        }
                    });
                }
            });
            $("#DuyetBanCanDoi").click(function () {
                window.open("../../form/frm_duyet_congnokhachhang.php?mst=<?php echo $_SESSION['MST'] ?>&tencongty=<?php echo $_SESSION['TenCongTy'] ?>&tendatabase=<?php echo $_SESSION['TIENTO'].$_SESSION['MST'].'_'.$_SESSION['NienDo']; ?>","Danhsach_bangcongno_khachhang","height="+(screen.height-80)+",width="+screen.width);
            });
			$(document).on('click','#xuatexcel',function(e) {
				var result = 'data:application/vnd.ms-excel,' + encodeURIComponent($('.BangInExcel').html());
				var link = document.createElement("a");
				document.body.appendChild(link);
				link.download = "Cong_No_KH_" + new Date().toISOString().replace(/[\-\:\.]/g, "") + ".xls",
				link.href = result;
				link.click();
			});
            $(document).on('click','#CapNhatCongNo',function(e) {
                $(".dataTable tr").each(function(){
                    // Lấy giá trị cột "Có" (ví dụ cột cuối cùng)
                    var duCo = $(this).find("td").eq(9).text().trim(); 
                    var maTK = $(this).find("td").eq(3).text().trim(); 
                    var maSo = $(this).find("td").eq(1).text().trim(); // cột Mã số
                    if(duCo !== "" && !isNaN(duCo.replace(/\./g,"")) && maTK==131) {
                        // Nếu có số dư Có thì gọi AJAX update
                        $.ajax({
                            url: "../../update_xuatkho_ghino.php",// Cập nhật lại nọi dung thanh toán là "Xuất bán hàng ghi nợ"
                            type: "POST",
                            data: { maSo: maSo, duCo: duCo,maTK: maTK },
                            success: function(res){
                                console.log("Update thành công: " + res);
                            },
                            error: function(){
                                console.log("Lỗi khi update " + maSo);
                            }
                        });
                    }
                });
			});
        });
    </script>
</head>
<body class="dt-print-view">
<table border="0" style="background-color: #00c6ff;" width="100%" class="no-print">
    <tr>
        <td colspan=8 ><input type="button" style="color: #0000CC;font-weight: bold;border: 2px solid red;<?php echo $Display_an;  ?>" value="Duyệt bảng công nợ khách hàng" id="DuyetBanCanDoi"></td>
        <td  colspan=2 style="text-align: right;" ><input type="button" style="color: #0000CC;font-weight: bold;border: 2px solid red;" value="Xuất excel" id="xuatexcel">
                        <input type="hidden" style="color: #0000CC;font-weight: bold;border: 2px solid red;" value="Cập nhật công nợ" id="CapNhatCongNo">
    </td>
    </tr>
</table>
<div class="BangInExcel">
<?php
$html_ct="";
$html_title='
<thead>
  <tr>
    <th STYLE="border:0.5px solid #000;" width="35px" rowspan="2" align="center">&nbsp;<br/>STT</td>
    <th STYLE="border:0.5px solid #000;" width="60px" rowspan="2" align="center">&nbsp;<br/>Mã số</td>
    <th STYLE="border:0.5px solid #000;" width="200px" rowspan="2" align="center">&nbsp;<br/>Họ tên</td>
	<th STYLE="border:0.5px solid #000;" width="30px" rowspan="2" align="center">&nbsp;<br/>Số hiệu TK</td>
    <th STYLE="border:0.5px solid #000;" width="160px" colspan="2" align="center">Số dư đầu năm</td>
    <th STYLE="border:0.5px solid #000;" width="160px" colspan="2" align="center">Số phát sinh trong năm</td>
    <th STYLE="border:0.5px solid #000;" colspan="2" width="160px" align="center">Số dư cuối năm</td>
  </tr>
  <tr>
    <th STYLE="border:0.5px solid #000;">Nợ</td>
    <th STYLE="border:0.5px solid #000;" >Có</td>
    <th STYLE="border:0.5px solid #000;">Nợ</td>
    <th STYLE="border:0.5px solid #000;" >Có</td>
    <th STYLE="border:0.5px solid #000;">Nợ</td>
    <th STYLE="border:0.5px solid #000;" >Có</td>
  </tr>
  </thead>
  ';
$sott=0;
$tongdoanhthu=0;
$tongthue=0;
    foreach ($DATACIBANRA as $k=> $item) {
        if($_GET['xemtonghop']=="false"){
        $tongducodktk = 0;
        $tongdunodktk = 0;

        $tongducopstk = 0;
        $tongdunopstk = 0;

        $tongducocktk = 0;
        $tongdunocktk = 0;
        foreach ($item as $itemCT) {
            $sott++;
            $tongdoanhthu += $itemCT["thanhtien"];
            $tongthue += $itemCT["thue"];
            $imdam = "";
            if ($itemCT["makhcha"] == "0") {
                $imdam = 'style="font-weight:bold"';
            }
            $html_ct .= '
        <tr >
        <td class="td_first" align="center" ' . $imdam . ' >' . $sott . '</td>
        <td class="td_center" ' . $imdam . ' >' . strtoupper($itemCT["makh"]) . '</td>
        <td class="td_center" ' . $imdam . ' align="left">' . $itemCT["tenkh"] . '</td>
		<td class="td_center" ' . $imdam . ' align="center">' . $itemCT["matk"] . '</td>
        <td class="td_center" ' . $imdam . ' align="right">';
            if ($itemCT["tongduno"] != 0) {
                $html_ct .= $soduno = (number_format($itemCT["tongduno"] != 0) ? number_format($itemCT["tongduno"], 0, ",", ".") : "");
            } else {
                $html_ct .= $soduno = (number_format($itemCT["soduno"] != 0) ? number_format($itemCT["soduno"], 0, ",", ".") : "");
            }
            $html_ct .= '</td>
        <td class="td_center" ' . $imdam . ' align="right">';
            if ($itemCT["tongduco"] != 0) {
                $html_ct .= $soduco = (number_format($itemCT["tongduco"] != 0) ? number_format($itemCT["tongduco"], 0, ",", ".") : "");
            } else {
                $html_ct .= $soduco = (number_format($itemCT["soduco"] != 0) ? number_format($itemCT["soduco"], 0, ",", ".") : "");
            }
            $html_ct .= '</td>
        <td class="td_center" ' . $imdam . ' align="right">';
            if ($itemCT["tongdunops"] != "" || $itemCT["tongdunops"] != 0) {
                $html_ct .= $sodunops = (number_format($itemCT["tongdunops"] != 0) ? number_format($itemCT["tongdunops"], 0, ",", ".") : "");
            } else {
                $html_ct .= $sodunops = (number_format($itemCT["sodunops"] != 0) ? number_format($itemCT["sodunops"], 0, ",", ".") : "");
            }
            $html_ct .= '</td>
        <td class="td_center" ' . $imdam . ' align="right" >';
            if ($itemCT["tongducops"] != "" || $itemCT["tongdunops"] != 0) {
                $html_ct .= $soducops = (number_format($itemCT["tongducops"] != 0) ? number_format($itemCT["tongducops"], 0, ",", ".") : "");
            } else {
                $html_ct .= $soducops = (number_format($itemCT["soducops"] != 0) ? number_format($itemCT["soducops"], 0, ",", ".") : "");
            }
            $html_ct .= '</td>
        <td class="td_center" ' . $imdam . '  align="right">';
            // Xử lý Nợ cuối
            $soduno = str_replace(".", "", $soduno);
            $soduco = str_replace(".", "", $soduco);
            $sodunops = str_replace(".", "", $sodunops);
            $soducops = str_replace(".", "", $soducops);

            $soducktinh = ($soduno + $sodunops) - ($soduco + $soducops);
            $html_ct .= (number_format($itemCT["tongdunock"]) != 0) ? number_format($itemCT["tongdunock"], 0, ",", ".") : "";
            $html_ct .= '</td>
        <td class="td_end" ' . $imdam . ' align="right">';
                $html_ct .= (number_format($itemCT["tongducock"]) != 0) ? number_format($itemCT["tongducock"], 0, ",", ".") : "";
            $html_ct .= '</td>
      </tr>';
            if ($itemCT['makhcha'] == "0") {
                $tongducodk += $itemCT["soduco"];
                $tongdunodk += $itemCT["soduno"];

                $tongducops += $itemCT["soducops"];
                $tongdunops += $itemCT["sodunops"];

                /////////////////////////////////////////////
                $tongducodktk += $itemCT["soduco"];
                $tongdunodktk += $itemCT["soduno"];

                $tongducopstk += $itemCT["soducops"];
                $tongdunopstk += $itemCT["sodunops"];

            }
            if ($_SESSION['butrucongno']==1 && $itemCT['matk']==131) {// Nếu có bù trừ công nợ
                if ($itemCT['makhcha'] == "0") {
                    $tongducock += $itemCT["tongducock"];
                    $tongdunock += $itemCT["tongdunock"];

                    $tongducocktk += $itemCT["tongducock"];
                    $tongdunocktk += $itemCT["tongdunock"];
                }
            }else {
                $tongducock += $itemCT["cock_"];
                $tongdunock += $itemCT["nock_"];

                $tongducocktk += $itemCT["cock_"];
                $tongdunocktk += $itemCT["nock_"];
            }
        }
        $html_ct .= '<tr>
    <td STYLE="border:0.5px solid #000;"></td>
    <td STYLE="border:0.5px solid #000;"></td>
    <td STYLE="border:0.5px solid #000;" align="right"><b>Tổng tài khoản ' . $k . '</b></td>
	<td STYLE="border:0.5px solid #000;"></td>
    <td align="right" STYLE="border:0.5px solid #000;"><b>' . number_format($tongdunodktk, 0, ",", ".") . '</b></td>
    <td align="right" STYLE="border:0.5px solid #000;"><b>' . number_format($tongducodktk, 0, ",", ".") . '</b></td>
    <td align="right" STYLE="border:0.5px solid #000;"><b>' . number_format($tongdunopstk, 0, ",", ".") . '</b></td>
    <td align="right" STYLE="border:0.5px solid #000;"><b>' . number_format($tongducopstk, 0, ",", ".") . '</b></td>
    <td align="right" STYLE="border:0.5px solid #000;"><b>' . number_format($tongdunocktk, 0, ",", ".") . '</b></td>
    <td align="right" STYLE="border:0.5px solid #000;"><b>' . number_format($tongducocktk, 0, ",", ".") . '</b></td>
  </tr>';
    }else{// Xem tổng hợp bảng công nợ khách hàng
            $tongducodktk = 0;
            $tongdunodktk = 0;

            $tongducopstk = 0;
            $tongdunopstk = 0;

            $tongducocktk = 0;
            $tongdunocktk = 0;
            foreach ($item as $itemCT) {
                if ($itemCT['makhcha'] == "0") {

                $sott++;
                $tongdoanhthu += $itemCT["thanhtien"];
                $tongthue += $itemCT["thue"];
                $imdam = "";
                if ($itemCT["makhcha"] == "0") {
                    //$imdam = 'style="font-weight:bold"';
                }
                $html_ct .= '
        <tr >
        <td class="td_first" align="center" ' . $imdam . ' >' . $sott . '</td>
        <td class="td_center" ' . $imdam . ' >' . strtoupper($itemCT["makh"]) . '</td>
        <td class="td_center" ' . $imdam . ' align="left">' . $itemCT["tenkh"] . '</td>
		<td class="td_center" ' . $imdam . ' align="center">' . $itemCT["matk"] . '</td>
        <td class="td_center" ' . $imdam . ' align="right">';
                if ($itemCT["tongduno"] != 0) {
                    $html_ct .= $soduno = (number_format($itemCT["tongduno"] != 0) ? number_format($itemCT["tongduno"], 0, ",", ".") : "");
                } else {
                    $html_ct .= $soduno = (number_format($itemCT["soduno"] != 0) ? number_format($itemCT["soduno"], 0, ",", ".") : "");
                }
                $html_ct .= '</td>
        <td class="td_center" ' . $imdam . ' align="right">';
                if ($itemCT["tongduco"] != 0) {
                    $html_ct .= $soduco = (number_format($itemCT["tongduco"] != 0) ? number_format($itemCT["tongduco"], 0, ",", ".") : "");
                } else {
                    $html_ct .= $soduco = (number_format($itemCT["soduco"] != 0) ? number_format($itemCT["soduco"], 0, ",", ".") : "");
                }
                $html_ct .= '</td>
        <td class="td_center" ' . $imdam . ' align="right">';
                if ($itemCT["tongdunops"] != "" || $itemCT["tongdunops"] != 0) {
                    $html_ct .= $sodunops = (number_format($itemCT["tongdunops"] != 0) ? number_format($itemCT["tongdunops"], 0, ",", ".") : "");
                } else {
                    $html_ct .= $sodunops = (number_format($itemCT["sodunops"] != 0) ? number_format($itemCT["sodunops"], 0, ",", ".") : "");
                }
                $html_ct .= '</td>
        <td class="td_center" ' . $imdam . ' align="right" >';
                if ($itemCT["tongducops"] != "" || $itemCT["tongdunops"] != 0) {
                    $html_ct .= $soducops = (number_format($itemCT["tongducops"] != 0) ? number_format($itemCT["tongducops"], 0, ",", ".") : "");
                } else {
                    $html_ct .= $soducops = (number_format($itemCT["soducops"] != 0) ? number_format($itemCT["soducops"], 0, ",", ".") : "");
                }
                $html_ct .= '</td>
        <td class="td_center" ' . $imdam . '  align="right">';
                // Xử lý Nợ cuối
                $soduno = str_replace(".", "", $soduno);
                $soduco = str_replace(".", "", $soduco);
                $sodunops = str_replace(".", "", $sodunops);
                $soducops = str_replace(".", "", $soducops);

                $soducktinh = ($soduno + $sodunops) - ($soduco + $soducops);
                    $html_ct .= (number_format($itemCT["tongdunock"]) != 0) ? number_format($itemCT["tongdunock"], 0, ",", ".") : "";
                $html_ct .= '</td>
        <td class="td_end" ' . $imdam . ' align="right">';
                    $html_ct .= (number_format($itemCT["tongducock"]) != 0) ? number_format($itemCT["tongducock"], 0, ",", ".") : "";
                $html_ct .= '</td>
      </tr>';
                    $tongducodk += $itemCT["soduco"];
                    $tongdunodk += $itemCT["soduno"];

                    $tongducops += $itemCT["soducops"];
                    $tongdunops += $itemCT["sodunops"];

                    /////////////////////////////////////////////
                    $tongducodktk += $itemCT["soduco"];
                    $tongdunodktk += $itemCT["soduno"];

                    $tongducopstk += $itemCT["soducops"];
                    $tongdunopstk += $itemCT["sodunops"];

                }
                if ($_SESSION['butrucongno']==1 && $itemCT['matk']==131) {// Nếu có bù trừ công nợ
                    if ($itemCT['makhcha'] == "0") {
                        $tongducock += $itemCT["tongducock"];
                        $tongdunock += $itemCT["tongdunock"];

                        $tongducocktk += $itemCT["tongducock"];
                        $tongdunocktk += $itemCT["tongdunock"];
                    }
                }else {
                    $tongducock += $itemCT["cock_"];
                    $tongdunock += $itemCT["nock_"];

                    $tongducocktk += $itemCT["cock_"];
                    $tongdunocktk += $itemCT["nock_"];
                }
            }
            $html_ct .= '<tr>
							<td STYLE="border:0.5px solid #000;"></td>
							<td STYLE="border:0.5px solid #000;"></td>
							<td STYLE="border:0.5px solid #000;" align="right"><b>Tổng tài khoản ' . $k . '</b></td>
							<td STYLE="border:0.5px solid #000;"></td>
							<td align="right" STYLE="border:0.5px solid #000;"><b>' . number_format($tongdunodktk, 0, ",", ".") . '</b></td>
							<td align="right" STYLE="border:0.5px solid #000;"><b>' . number_format($tongducodktk, 0, ",", ".") . '</b></td>
							<td align="right" STYLE="border:0.5px solid #000;"><b>' . number_format($tongdunopstk, 0, ",", ".") . '</b></td>
							<td align="right" STYLE="border:0.5px solid #000;"><b>' . number_format($tongducopstk, 0, ",", ".") . '</b></td>
							<td align="right" STYLE="border:0.5px solid #000;"><b>' . number_format($tongdunocktk, 0, ",", ".") . '</b></td>
							 <td align="right" STYLE="border:0.5px solid #000;"><b>' . number_format($tongducocktk, 0, ",", ".") . '</b></td>
						  </tr>';
        }
}

$html = '
		<table width="100%" border="0" style="border-bottom: 1px solid #000">
		  <tr>
			<td colspan=8 align="left"><B>'.$_SESSION["TenCongTy"].'</B><br/>'.$_SESSION["DiaChi"].'</td>    
			<td colspan=2 >MST:'.$_SESSION["MST"].'</td>
			</tr>
		</table>
		<table><tr><td></td></tr></table>
		<table border="0" width="100%" align="center">
		  <tr>
			<td align="center" colspan=10><b>'.$_SESSION["THONGTINPHIEU"]['tenphieu'].'</b></td>
		  </tr>
		  <tr>
			<td align="center" colspan=10><b>'.$_SESSION["THONGTINPHIEU"]['ngayhoadon'].'</b></td>
		  </tr>
		</table>
		<table width="100%" border="0">
		  <tr>
			<td align="right"></td>
		  </tr>
		</table>
		<table border="1" cellpadding="2" class="dataTable" cellspacing="0" align="center" valign="middle">'.$html_title.$html_ct.'
			<tr>
				<td width="30px" STYLE="border:0.5px solid #000;"></td>
				<td width="80px" STYLE="border:0.5px solid #000;"></td>
				<td width="300px" STYLE="border:0.5px solid #000;" align="right"><b>Tổng</b></td>
				<td width="30px" STYLE="border:0.5px solid #000;"></td>
				<td width="100px" align="right" STYLE="border:0.5px solid #000;"><b>'.number_format($tongdunodk,0,",",".").'</b></td>
				<td width="100px" align="right" STYLE="border:0.5px solid #000;"><b>'.number_format($tongducodk,0,",",".").'</b></td>
				<td width="100px" align="right" STYLE="border:0.5px solid #000;"><b>'.number_format($tongdunops,0,",",".").'</b></td>
				<td width="100px" align="right" STYLE="border:0.5px solid #000;"><b>'.number_format($tongducops,0,",",".").'</b></td>
				<td width="100px" align="right" STYLE="border:0.5px solid #000;"><b>'.number_format($tongdunock,0,",",".").'</b></td>
				<td width="100px" align="right" STYLE="border:0.5px solid #000;"><b>'.number_format($tongducock,0,",",".").'</b></td>
			  </tr>
			</table>
			<table><tr><td></td></tr></table>
			<table width="100%" border="0" cellpadding="2">
			  <tr>
			  <td colspan=4 align="center">&nbsp;<br/>Người lập phiếu</td>
			  <td colspan=3 align="center">&nbsp;<br/>Kế toán trưởng</td>
			  <td colspan=3 align="center">
				<em>'.$_SESSION["ThanhPho"].' Ngày ';
				$time = strtotime($_SESSION["THONGTINPHIEU"]['ngaylap']);
				$html.=date("d-m-Y",$time);
				$html.='</em><br/>Giám đốc</td>
			  </tr>
			</table>
';
echo $html;
?>
</table>
</div>
</body>
</html>

