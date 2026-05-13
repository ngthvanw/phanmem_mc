<?php
session_start();
//require_once('tcpdf_include.php');
$DATACISONHATKY = $_SESSION["LISTCTSONHATKY"];
$tongsotk = count($DATACISONHATKY);
$display = "";
if($_SESSION['Level']!=1 && $_SESSION['Level']!=2){
    $display="display: none;";
}
?>
<html>
<head><title>IN SỔ CÁI (Nhấn CTRL + P để in , ALT + F4 để thoát)</title>


    <style type="text/css" class="init">
        .dataTable {
            font-family: "Times New Roman", Georgia, Serif;
            border-collapse: collapse;
            width: 100%;
        }

        .dataTable td {
            padding: 1px 2px;
            font-size: 15px;

        }

        .dataTable .td_full, th {
            border: 1px solid #000000;
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

        body {
            width: 210mm;
			margin: 1px;
			padding: 1px;
        }

        @page {
            size: A4;
            margin-top: 5mm;
            margin-bottom: 10mm;
        }

        @media print {
            #Header, #Footer {
                display: none !important;
            }

            .page_break {
                page-break-before: always;
            }
            .no-print, .no-print * {
                display: none !important;
            }
        }

        .ketquaduyetsocai {
            border-collapse: collapse;
            width: 100%;
        }

        .ketquaduyetsocai td, .ketquaduyetsocai th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        .ketquaduyetsocai tr:nth-child(even){background-color: #f2f2f2;}

        .ketquaduyetsocai tr:hover {background-color: #ddd;}

        .ketquaduyetsocai th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #4CAF50;
            color: white;
        }
    </style>
    <meta charset="utf-8">

    <script type="text/javascript" src="../../js/jquery.js"></script>
    <script type="text/javascript" src="../../js/jquery.number.min.js"></script>
    <script type="text/javascript" src="../../js/jquery.table2excel.js"></script>
    <script type="text/javascript" language="javascript">
        $(document).ready(function() {
            /*$('#xuatexcel').click(function(){
                    $(".BangInExcel").table2excel({
                        exclude: ".noExl",
                        name: "Excel Document Name",
                        filename: "So_Cai_" + new Date().toISOString().replace(/[\-\:\.]/g, "") + ".xls",
                        fileext: ".xls",
                        exclude_img: true,
                        exclude_links: true,
                        exclude_inputs: true,
                        preserveColors: true
                    });
            })*/
			$(document).on('click','#xuatexcel',function(e) {
				$(".BangInExcel").each(function() {
					var BOM = '\ufeff'; // BOM UTF-8
					var result = 'data:application/vnd.ms-excel;charset=utf-8,' + encodeURIComponent(BOM + $(this).html());
					var link = document.createElement("a");
					document.body.appendChild(link);
					$MaTK = ($(this).attr("MaTK"));
					link.download = $MaTK+".xls",
					link.href = result;
					link.click();
				});
			});
			
            $('.duyettaikhoan').click(function(){
                $val = this.dataset.name;
                $arr_tk = $val.split("#");
                $cof = confirm("CHÚ Ý!! \nBạn đang chuẩn bị duyệt TK: "+$arr_tk[0]+" "+$arr_tk[1]+ " có số dư: "+$.number($arr_tk[2],0,".",",")+".\n Bạn có muốn tiếp tục không?");
                if($cof){
                    $.ajax({
                        url: '../../modules/phieukiemtra/add_duyettksocai.php',
                        type: 'POST',
                        dataType: 'php',
                        data: {
                            matk:$arr_tk[0],
                            tungay_denngay: $arr_tk[1],
                            sodu:$arr_tk[2]
                        }
                    }).done(function() {
                    });
                    loadListDuyetSoCai($arr_tk[0]);
                }
            });
            function loadListDuyetSoCai($matk) {
                $(".ketquaduyetsocai").load("../../modules/phieukiemtra/list_duyettksocai.php?matk="+$matk);
            }

            $('.ketquatrave').click(function(){
                $matk = this.dataset.name;
                //alert($matk);
                loadListDuyetSoCai($matk);
            });
            $('.xoa').click(function(){
                $matk = this.dataset.name;
                $cof = confirm("CẢNH BÁO!!\nBạn có muốn xóa dòng nhật ký này không?");
                if($cof) {
                    $.ajax({
                        url: '../../modules/phieukiemtra/del_duyettksocai.php',
                        type: 'POST',
                        dataType: 'php',
                        data: {
                            matk: $matk
                        }
                    }).done(function () {
                    });
                    loadListDuyetSoCai($matk);
                }
            });

        });
    </script>
</head>
<body class="dt-print-view">
<table style="background-color: #00c6ff;" width="100%" >
    <tr>
        <td colspan="8" class="no-print"><input type="button" style="color: #0000CC;font-weight: bold;border: 2px solid red;" value="Xuất excel" id="xuatexcel"></td>
    </tr>
</table>
<?php
$sodong = 0;
foreach ($DATACISONHATKY as $k_matk => $itemTK) {// Duyet vao tk
    $sodong ++;
	echo "<div class='BangInExcel' MaTK='SoCai_".$k_matk."'>";
    $tamtinhdauky = ($_SESSION["DSDAUKY"][$k_matk]["tienco"] - $_SESSION["DSDAUKY"][$k_matk]["tienno"]);
    if ($tamtinhdauky > 0) {
        $nodkquy = 0;
        $nodk = 0;
        $codkquy = $tamtinhdauky;
        $codk = $tamtinhdauky;
    } else {
        $nodkquy = abs($tamtinhdauky);
        $nodk = abs($tamtinhdauky);
        $codkquy = 0;
        $codk = 0;
    }
    $html_ct = "";
    $html_title = '
<thead>
  <tr>
    <th  width="35px" rowspan="2">Ngày ghi sổ</th>
    <th  width="100px" colspan="3">Chứng từ</th>
    <th  width="180px" rowspan="2">&nbsp;<br/>Diễn giải</th>
    <th  width="35px" rowspan="2">TK dối ứng</th>
    <th  colspan="2" width="160px">Số tiền</th>
  </tr>
  <tr>
    <th >Số CT</th>
    <th  >Số hiệu</th>
    <th  >Ngày</th>
	<th  width="80px">Nợ</th>
    <th  width="80px" >Có</th>
  </tr>
    </thead>
  <tr>
    <td class="td_full" width="45px" ></td>
    <td class="td_full" width="35px" ></td>
    <td class="td_full" width="50px" ></td>
    <td class="td_full" width="50px" ></td>
    <td class="td_full" width="300px" align="right"><b>Số dư đầu kỳ </b></td>

    <td class="td_full" width="35px"  ></td>
    <td class="td_full" width="110px"  align="right" >';
    $html_title .= ($nodk == 0) ? "" : number_format($nodk, 0, ",", ".");
    $html_title .= '</td><td class="td_full" width="110px"  align="right" >';
    $html_title .= ($codk == 0) ? "" : number_format($codk, 0, ",", ".");
    $html_title .= '
</td>
  </tr>
  ';
    $sott = 0;
    $tongno = 0;
    $tongco = 0;
    $tongnothang = 0;
    $tongcothang = 0;
    $tongnoquy = 0;
    $tongcoquy = 0;

    $tinhquy = 0;
    foreach ($itemTK as $kthang => $itemTHANG) {
        $tongnothang = 0;
        $tongcothang = 0;
        $tinhquy += $kthang;
        foreach ($itemTHANG as $itemCT) {
            $sott++;
            $tongno += $itemCT['tienno'];
            $tongco += $itemCT['tienco'];

            $tongnothang += $itemCT['tienno'];
            $tongcothang += $itemCT['tienco'];
            if (number_format($itemCT["tienco"]) == 0 && number_format($itemCT["tienno"]) == 0) {
            } else {
                $html_ct .= '
        <tr >
        <td class="td_first" style="text-align: right; mso-number-format:\'\@\';" >';
                $timeghiso = strtotime($itemCT["ngayghiso"]);
                $html_ct .= date("d-m", $timeghiso);
                $html_ct .= '</td>
		<td class="td_center" align="center" >';
                if ($sophieuthu != $itemCT["sophieu"]) {
                    $html_ct .= $itemCT["sophieu"];// In STT phiếu thu
                    $sophieuthu = $itemCT["sophieu"];
                } else {
                    $html_ct .= "...";
                }
                $html_ct .= '</td>
        <td class="td_center" >' . $itemCT["sct"] . '</td>
        <td class="td_center" style="text-align: right; mso-number-format:\'\@\';" >';
                $time = strtotime($itemCT["ngayhoadon"]);
                $html_ct .= date("d-m", $time);
                $html_ct .= '</td>
        <td class="td_center" align="left">' . $itemCT["noidung"] . '</td>
	

	   <td class="td_center" >' . $itemCT["tkdu"] . '</td>
        <td class="td_center"  align="right">';
                $tienno1 = ($itemCT["tienno"] == 0) ? "" : number_format($itemCT["tienno"], 0, ",", ".");
                $html_ct .= $tienno1;
                $html_ct .= '</td>
        <td class="td_end"  align="right">';
                $tienco1 = ($itemCT["tienco"] == 0) ? "" : number_format($itemCT["tienco"], 0, ",", ".");
                $html_ct .= $tienco1;
                $html_ct .= '</td>
      </tr>';
            }
        }
        if($timeghiso==""){
            $timeghiso = strtotime($_SESSION['NienDo']."/01/01");
        }
        $html_ct .= '<tr>
    <td class="td_full" ></td>
    <td class="td_full"  ></td>
    <td class="td_full" ></td>
    <td class="td_full" ></td>
   ';
        if ($kthang <= 12) {
            $html_ct .= '<td class="td_full"  align="right"><b>cộng phát sinh tháng ' .date("m/Y", $timeghiso) . '</b></td>';
        } else {
            $html_ct .= '<td class="td_full"  align="right"><b>Cộng phát sinh</b></td>';
        }

        $html_ct .= '
    <td class="td_full" ></td>
    <td class="td_full" align="right" ><i>';
        $html_ct .= ($tongnothang == 0) ? "" : number_format($tongnothang, 0, ",", ".");
        $html_ct .= '</i></td>
    <td class="td_full" align="right" ><i>
    ';
        $html_ct .= ($tongcothang == 0) ? "" : number_format($tongcothang, 0, ",", ".");
        $html_ct .= '
</i></td>
  </tr>';
        $html_ct .= '<tr>
    <td class="td_full" ></td>
    <td class="td_full" ></td>
    <td class="td_full" ></td>
    <td class="td_full" ></td>';
        if ($kthang <= 12) {
            $html_ct .= '<td class="td_full"  align="right"><b>Số dư cuối tháng ' . date("m/Y", $timeghiso) . '</b></td>';
        } else {
            $html_ct .= '<td class="td_full"  align="right"><b>Số dư - ' . $kthang . ' - ' . $_SESSION["DSMAND"][$kthang]['tennoidung'] . '</b></td>';
        }

        $html_ct .= '
    <td class="td_full" ></td>
    <td class="td_full" align="right" ><b>';
        $tinhtam = ($codk + $tongcothang) - ($nodk + $tongnothang);
        if ($tinhtam > 0) {
            $nodk = 0;
            $codk = $tinhtam;
        } else {
            $nodk = abs($tinhtam);
            $codk = 0;
        }
        $html_ct .= ($nodk == 0) ? "" : number_format($nodk, 0, ",", ".");
        $html_ct .= '</b></td>
    <td class="td_full" align="right" ><b>';
        $html_ct .= ($codk == 0) ? "" : number_format($codk, 0, ",", ".");
        $html_ct .= '</b></td>
  </tr>
  ';
        $tongcoquy += $tongcothang;
        $tongnoquy += $tongnothang;
        if ($itemCT['thang'] % 3 == 0 && $kthang <= 12) {
            $Quy = $itemCT['thang'] / 3;
            $html_ct .= '<tr>
    <td class="td_full" ></td>
    <td class="td_full"  ></td>
    <td class="td_full" ></td>
    <td class="td_full" ></td>
    <td class="td_full"  align="right"><i>Cộng phát sinh quý ' . $Quy . "/" . date("Y", $timeghiso) . '</i></td>
	
    <td class="td_full" ></td>
    <td class="td_full" align="right" ><i>';
            $html_ct .= ($tongnoquy == 0) ? "" : number_format($tongnoquy, 0, ",", ".");
            $html_ct .= '</i></td>
    <td class="td_full" align="right" ><i>
    ';
            $html_ct .= ($tongcoquy == 0) ? "" : number_format($tongcoquy, 0, ",", ".");
            $html_ct .= '
</i></td>
  </tr>';
            $html_ct .= '<tr>

    <td class="td_full" ></td>
    <td class="td_full" ></td>
    <td class="td_full" ></td>
    <td class="td_full" ></td>
    <td class="td_full"  align="right"><b>Số dư cuối quý ' . $Quy . "/" . date("Y", $timeghiso) . '</b></td>
	
    <td class="td_full" ></td>
    <td class="td_full" align="right" ><b>';
            $tinhtamquy = ($codkquy + $tongcoquy) - ($nodkquy + $tongnoquy);
            if ($tinhtamquy > 0) {
                $nodkquy = 0;
                $codkquy = $tinhtamquy;
            } else {
                $nodkquy = abs($tinhtamquy);
                $codkquy = 0;
            }
            $html_ct .= ($nodkquy == 0) ? "" : number_format($nodkquy, 0, ",", ".");
            $html_ct .= '</b></td>
    <td class="td_full" align="right" ><b>';
            $html_ct .= ($codkquy == 0) ? "" : number_format($codkquy, 0, ",", ".");
            $html_ct .= '</b></td>
  </tr>
  ';
            $tongcoquy = 0;
            $tongnoquy = 0;
        }
    }

    $dunocktmp = (($tongco + $_SESSION["DSDAUKY"][$k_matk]["tienco"]) - ($tongno + $_SESSION["DSDAUKY"][$k_matk]["tienno"]));
    if ($dunocktmp > 0) {
        $tongnock = 0;
        $tongcock = abs($dunocktmp);
    } else {
        $tongnock = abs($dunocktmp);
        $tongcock = 0;
    }

    $tongtienduyet = ($tongno+$_SESSION["DSDAUKY"][$k_matk]["tienno"]) - ($tongco+$_SESSION["DSDAUKY"][$k_matk]["tienco"]);

    $html = '
<table width="100%" border="0">
  <tr>
    <td colspan=5 align="left" WIDTH="55%"><B>' . $_SESSION["TenCongTy"] . '</B><br/>' . $_SESSION["DiaChi"] . '<br/>MST:' . $_SESSION["MST"] . '</td>    
    <td align="center" WIDTH="15%"></td>
    <td align="center" colspan=2 WIDTH="30%" valign="top">
		<i>Mẫu số S03b-DNN<br/>
		(Ban hành ' . $_SESSION['THONGTUMANG'][$_SESSION['theothongtu']]['thongtu'] . ' ngày ' . $_SESSION['THONGTUMANG'][$_SESSION['theothongtu']]['ngay'] . ' của Bộ Tài Chính)</i> 
	</td>
  </tr>
</table>
<table><tr><td></td></tr></table>
<table border="0" align="center">
  <tr>
    <td colspan="8"  align="center"><b>' . $_SESSION["THONGTINPHIEU"]['tenphieu'] . '</b></td>
  </tr> <tr>
    <td colspan="8" align="center"><b>(Dùng cho hình thức kế toán Nhật ký chung)</b></td>
  </tr>
  <tr>
    <td colspan="8" align="center"><b>' . $_SESSION["THONGTINPHIEU"]['ngayhoadon'] . '</b></td>
  </tr>
  <tr>
    <td colspan="8" align="center"> <b>Tên tài khoản: ' . $_SESSION["DSHTTK"][$k_matk]['tentk'] . '</b></td>
  </tr>
    <tr>
    <td colspan="8" align="center"><b> Số hiệu: ' . $k_matk . '</b></td>
  </tr>
     <tr>
    <td colspan="8" align="center"><b> Công trình - sản phẩm : ';
    $html .= ($_SESSION["DSMABP"]['tensp'] == '') ? 'TẤT CẢ' : $_SESSION["DSMABP"]['tensp'];
    $html .='</b></td>
  </tr>
   <tr>
    <td colspan="8" align="center"><b> Loại SP/CT : ';
    $html .= ($_SESSION["DSLOAICTSP"] == '') ? 'không có SP/CT' : $_SESSION["DSLOAICTSP"];
    $html .='</b></td>
  </tr>
</table>
<table width="100%" border="0"><tr><td align="right"></td></tr></table>
<table border="1" class="dataTable" cellpadding="2" cellspacing="0" align="center" valign="middle">' . $html_title . $html_ct . '
<tr>
    <td class="td_full" ></td>
    <td class="td_full" ></td>
    <td class="td_full" ></td>
	<td class="td_full" ></td>
    <td class="td_full" align="right" ><b>Cộng số phát sinh</b></td>
    
    <td class="td_full" ></td>
    <td class="td_full" align="right" ><b>' . number_format($tongno, 0, ",", ".") . '</b></td>
    <td class="td_full" align="right" ><b>' . number_format($tongco, 0, ",", ".") . '</b></td>
  </tr>
  
  <tr>
    <td class="td_full" ></td>
    <td class="td_full" ></td>
    <td class="td_full" ></td>
	 <td class="td_full" ></td>
    <td class="td_full" align="right" ><b>Số dư cuối kỳ</b></td>
    <td class="td_full" ><input style="background-color: #00c6ff;font-size: 10px;'.$display.'" width="100%" class="no-print duyettaikhoan" data-name="'.$k_matk.'#'.$_SESSION["THONGTINPHIEU"]['ngayhoadon'].'#'.$tongtienduyet.'" type="button" value="DUYỆT"></td>
    
    <td class="td_full" align="right" ><b>';
    $html .= ($tongnock == 0) ? "" : number_format($tongnock, 0, ",", ".");
    $html .= '</b></td>
<td class="td_full" align="right" ><b>';
    $html .= ($tongcock == 0) ? "" : number_format($tongcock, 0, ",", ".");
    $html .= '</b></td>
  </tr>
</table>
<table width="100%" cellpadding="2"><tr><td colspan="8">Ghi chú: Tất cả số phát sinh đã ghi vào sổ cái</td></tr></table>
<table><tr><td colspan="8"></td></tr></table>

<table width="100%" border="0" cellpadding="2">
  <tr>
    <td colspan="4" align="center" width="35%">&nbsp;<br/>Người lập biểu</td>
    <td colspan="2" align="center" width="35%">&nbsp;<br/>Kế toán trưởng</td>
    <td colspan="2" width="30%" align="center">
    <em>Ngày ';
    $time = strtotime($_SESSION["THONGTINPHIEU"]['ngaylap']);
    $html .= date("d-m-Y", $time);
    $html .= '</em><br/>Người đại diện theo pháp luật
   </td>
  </tr>
</table>
</div>
<div style=" '.$display.'" class="no-print ketquaduyetsocai kequa_'.$k_matk.'" >
<table width="100%" style="padding-bottom:10px;" border="1" >
        <tr>
            <th style="text-align: center;" colspan="6"><b>DANH SÁCH DUYỆT SỐ DƯ TÀI KHOẢN</b></th>
        </tr>
        <tr>
            <th style="text-align: center;" colspan="6"><a style="cursor: pointer" data-name="'.$k_matk.'" class="ketquatrave">Xem chi tiết duyệt</a></th>
        </tr>
        <tr>
            <th style="text-align: center;" width="5px">STT</th>
            <th style="text-align: center;" width="15px">Mã TK</th>
            <th style="text-align: center;" width="120px">Thời gian</th>
            <th style="text-align: center;" width="50px">Số tiền</th>
            <th style="text-align: center;" width="70px">Ngày duyệt</th>
            <th style="text-align: center;" width="30px">Người duyệt</th>
        </tr>
    </table>
    </div>

';
    echo $html;
    if ($tongsotk != $sodong) {
        ?>
        <table width="100%" class="page_break">
            <tr>
                <td></td>
            </tr>
        </table>
        <?php
    }
	echo "</div>";	
}

?>
</body>
</html>

