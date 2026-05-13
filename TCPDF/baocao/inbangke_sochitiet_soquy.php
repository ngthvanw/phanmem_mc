<?php
session_start();
$DATACISONHATKY = $_SESSION["LISTCTSONHATKY"];
$tongsotk = count($DATACISONHATKY);
$display = "";
if($_SESSION['Level']!=1 && $_SESSION['Level']!=2){
    $display="display: none;";
}
?>
<html>
<head><title>In sổ quỹ (Nhấn CTRL + P để in , ALT + F4 để thoát)</title>
    <style type="text/css" class="init">
        .dataTable {
    font-family: "Times New Roman", Georgia, Serif;
            border-collapse: collapse;
            width: 100%;
        }
        .dataTable td{
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

        body{
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
    #Header, #Footer { display: none !important; }
    .page_break{
        page-break-before:always;
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
          $(document).on('click','#xuatexcel',function(e) {
				$(".BangInExcel").each(function() {
					var result = 'data:application/vnd.ms-excel,' + encodeURIComponent($(this).html());
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
<table style="background-color: #00c6ff;" width="100%" class="no-print">
    <tr>
        <td><input type="button" style="color: #0000CC;font-weight: bold;border: 2px solid red;" value="Xuất excel" id="xuatexcel"></td>
        <td></td>
    </tr>
</table>
<?php
$sodong = 0;
foreach ($DATACISONHATKY as $k_matk=>$itemTK) {// Duyet vao tk
    $sodong++;
	echo "<div class='BangInExcel' MaTK='SoQuy_".$k_matk."'>";
    $tongtienduyet = 0;
    $html_ct = "";
    $sotontien = $_SESSION["DSDAUKY"][$k_matk]["tienno"]-$_SESSION["DSDAUKY"][$k_matk]["tienco"];
    $html_title = '
<thead>
  <tr>
    <th  rowspan="2">&nbsp;<br/>Ngày ghi sổ</th>
    <th  rowspan="2">Ngày chứng từ</th>
    <th  colspan="2">Chứng từ</th>
    <th  rowspan="2">&nbsp;<br/>Diễn giải</th>
    <th  rowspan="2">TK dối ứng</th>
    <th  colspan="2" >Số tiền</th>
    <th  colspan="2"></th>
  </tr>
  <tr>';
  if(substr($k_matk,0,3)==111){
	  $html_title.='<th  >Thu</th><th>Chi</th>';
  }else{
	  $html_title.='<th>Gửi vào</th><th>Rút ra</th>';
  }
	$html_title.='
	<th  width="80px">Nợ</th>
    <th  width="80px" >Có</th>
   <th >Số tồn</th>
    <th>Ghi chú</th>
  </tr>
    </thead>
  <tr>
    <td class="td_full" width="45px" ></td>
    <td class="td_full" width="45px" ></td>
    <td class="td_full" width="45px" ></td>
    <td class="td_full" width="50px" ></td>
    <td class="td_full" width="200px" align="right"><b>Tồn quỹ đầu kỳ </b></td>
	<td class="td_full" width="30px" ></td>
    <td class="td_full" width="100px"  align="right" >';
    $html_title.='</td><td class="td_full" width="100px"  align="right" >';
    $html_title.='
</td>
	<td class="td_full" width="100px" align="right"  ><b>';
    $html_title.=($sotontien == 0) ? "" : number_format($sotontien,0,",",".");
    $html_title.='</b></td>
    <td class="td_full" width="20px"></td>
  </tr>
  ';
    $sott = 0;
    $tongno = 0;
    $tongco = 0;
    $tongnothang=0;
    $tongcothang=0;
    $nodk = $_SESSION["DSDAUKY"][$k_matk]["tienno"];
    $codk = $_SESSION["DSDAUKY"][$k_matk]["tienco"];
    foreach ($itemTK as $kthang => $itemTHANG) {
        $tongnothang = 0;
        $tongcothang = 0;
        foreach ($itemTHANG as $itemCT) {
            $sott++;
            $sotontien = $sotontien + ($itemCT['tienno'] - $itemCT['tienco']);
            $tongno += $itemCT['tienno'];
            $tongco += $itemCT['tienco'];

            $tongnothang += $itemCT['tienno'];
            $tongcothang += $itemCT['tienco'];
            if (number_format($itemCT["tienco"]) == 0 && number_format($itemCT["tienno"]) == 0) {
            }else{
            $html_ct .= '
        <tr >
        <td class="td_first" >';
			if($timeghiso!=strtotime($itemCT["ngayghiso"])){
            $timeghiso = strtotime($itemCT["ngayghiso"]);
            $html_ct .= date("d-m", $timeghiso);
			}
            $html_ct .= '</td>
			<td class="td_center" >';
			if($time!=strtotime($itemCT["ngayhoadon"])){
            $time = strtotime($itemCT["ngayhoadon"]);
            $html_ct .= date("d-m", $time);
			}
            $html_ct .= '</td>
        <td class="td_center" align="center">'; 
			if($itemCT["tienno"]!=0){
				if($sophieuthu!=$itemCT["sophieu"]){
					$html_ct .=$itemCT["sophieu"];// In STT phiếu thu
					$sophieuthu = $itemCT["sophieu"];
				}else{
                    $html_ct .="...";
                }
			}
			 
		$html_ct .='</td>
		<td class="td_center" align="center">'; 
			if($itemCT["tienco"]!=0){
				if($sophieuchi!=$itemCT["sophieu"]){
					$html_ct .=$itemCT["sophieu"];// In STT phiếu thu
					$sophieuchi = $itemCT["sophieu"];
				}else{
                    $html_ct .="...";
                }
			}
			 
		$html_ct .='</td>
        
        <td class="td_center" align="left">' . $itemCT["noidung"] . '</td>

	   <td class="td_center" >' . $itemCT["tkdu"] . '</td>
        <td class="td_center"  align="right">';
            $tienno1 = ($itemCT["tienno"] == 0) ? "" : number_format($itemCT["tienno"], 0, ",", ".");
            $html_ct .= $tienno1;
            $html_ct .= '</td>
        <td class="td_center"  align="right">';
            $tienco1 = ($itemCT["tienco"] == 0) ? "" : number_format($itemCT["tienco"], 0, ",", ".");
            $html_ct .= $tienco1;
            $html_ct .= '</td>
		 <td class="td_center"  align="right">';
            $tienco1 = ($sotontien == 0) ? "" : number_format($sotontien, 0, ",", ".");
            $html_ct .= $tienco1;
            $html_ct .= '</td>
        <td class="td_end" >&nbsp;</td>
      </tr>';
        }
        }
        $html_ct.='<tr>
    <td class="td_full" ></td>
    <td class="td_full" ></td>
    <td class="td_full" ></td>
    <td class="td_full" ></td>
    ';
        if ( $kthang <= 12) {

            $html_ct.='<td class="td_full"  align="right"><b>cộng phát sinh tháng ' . $itemCT['thang'] . "/" . date("Y", $timeghiso) . '</b></td>';
        }else{
            $html_ct.='<td class="td_full"  align="right"><b>Cộng phát sinh</b></td>';
        }

        $html_ct.='
	<td class="td_full"  ></td>

    <td class="td_full" align="right" ><i>';
        $html_ct.=($tongnothang == 0) ? "" : number_format($tongnothang,0,",",".");
        $html_ct.='</i></td>
    <td class="td_full" align="right" ><i>
    ';
        $html_ct.=($tongcothang == 0) ? "" : number_format($tongcothang,0,",",".");
        $html_ct.='
</i></td>
	<td class="td_full"  align="right"><b>';
            $tienco1 = ($sotontien == 0) ? "" : number_format($sotontien,0,",",".");
        $html_ct .= $tienco1;
            $html_ct .= '</b></td>
    <td class="td_full" ></td>
  </tr>
  <tr>
    <td class="td_full" ></td>
    <td class="td_full" ></td>
    <td class="td_full" ></td>
    <td class="td_full" ></td>
    ';
        if ($kthang <= 12) {
            $html_ct.='<td class="td_full"  align="right"><b>Số dư cuối tháng ' . $itemCT['thang'] . "/" . date("Y", $timeghiso) . '</b></td>';
        }else{
            $html_ct.='<td class="td_full"  align="right"><b>Số dư - ' . $kthang. ' - '.$_SESSION["DSMAND"][$kthang]['tennoidung'].'</b></td>';
        }

        $html_ct.='
	<td class="td_full" ></td>
    <td class="td_full" align="right" ><b>';
        $tinhtam = ($nodk+$tongnothang)-($codk+$tongcothang);
        if($tinhtam>0){
            $nodk = $tinhtam;
            $codk = 0;
        }else{
            $nodk = 0;
            $codk = abs($tinhtam);
        }
        $html_ct.=($nodk == 0) ? "" : number_format($nodk,0,",",".");
        $html_ct.='</b></td>
    <td class="td_full" align="right" ><b>';
        $html_ct.=($codk == 0) ? "" : number_format($codk,0,",",".");
        $html_ct.='</b>
<td class="td_full"  align="right"><b>';
            $tienco1 = ($sotontien == 0) ? "" : number_format($sotontien,0,",",".");
            $html_ct .= $tienco1;
            $html_ct .= '</b></td>
    <td class="td_full" ></td>
  </tr>
  ';
    }
    $tongtienduyet = ($tongno+$_SESSION["DSDAUKY"][$k_matk]["tienno"]) - ($tongco+$_SESSION["DSDAUKY"][$k_matk]["tienco"]);

    $html = '
<table width="100%" border="0">
  <tr>
    <td colspan="6" align="left" WIDTH="55%"><B>' . $_SESSION["TenCongTy"] . '</B><br/>' . $_SESSION["DiaChi"] . '<br/>MST:' . $_SESSION["MST"] . '</td>    
    <td align="center" WIDTH="20%"></td>
    <td align="center" colspan="3" WIDTH="25%">
		<i>Mẫu số S03b-DNN<br/>
        (Ban hành '.$_SESSION['THONGTUMANG'][$_SESSION['theothongtu']]['thongtu'].' ngày '.$_SESSION['THONGTUMANG'][$_SESSION['theothongtu']]['ngay'].' của Bộ Tài Chính)</i> 
	</td>
  </tr>
</table>
<table><tr><td></td></tr></table>
<table border="0" align="center">
  <tr>
    <td colspan="10" align="center"><b>' . $_SESSION["THONGTINPHIEU"]['tenphieu'] . '</b></td>
  </tr> <tr>
    <td colspan="10"  align="center"><b>(Dùng cho hình thức kế toán Nhật ký chung)</b></td>
  </tr>
  <tr>
    <td colspan="10" align="center"><b>' . $_SESSION["THONGTINPHIEU"]['ngayhoadon'] . '</b></td>
  </tr>
  <tr>
    <td colspan="10" align="center"> <b>Tên tài khoản: ' . $_SESSION["DSHTTK"][$k_matk]['tentk'] . '</b></td>
  </tr>
    <tr>
    <td colspan="10" align="center"><b> Số hiệu: ' . $k_matk . '</b></td>
  </tr>
  <tr>
    <td colspan="10" align="center"><b> Công trình - sản phẩm : ' . $_SESSION["DSMABP"]['tensp'] . '</b></td>
  </tr>
</table>
<table width="100%" border="0">
  <tr>
    <td align="right"></td>
  </tr>
</table>
<table border="1" class="dataTable" cellpadding="2" cellspacing="0" align="center" valign="middle">' . $html_title . $html_ct . '
<tr>
    <td class="td_full" ></td>
    <td class="td_full" ></td>
    <td class="td_full" ></td>
	 <td class="td_full" ></td>
    <td class="td_full" ><b>Tổng</b></td>
    <td class="td_full" ><input style="background-color: #00c6ff;font-size: 10px;'.$display.'" width="100%" class="no-print duyettaikhoan" data-name="'.$k_matk.'#'.$_SESSION["THONGTINPHIEU"]['ngayhoadon'].'#'.$tongtienduyet.'" type="button" value="DUYỆT"></td>
    <td class="td_full" align="right" ><b>' . number_format($tongno,0,",",".") . '</b></td>
    <td class="td_full" align="right" ><b>' . number_format($tongco,0,",",".") . '</b></td>
        <td class="td_full" ></td>
    <td class="td_full" ></td>
  </tr>
</table>
<table width="100%" cellpadding="2"><tr><td colspan="10">Ghi chú: Tất cả số phát sinh đã ghi vào sổ cái</td></tr></table>
<table><tr><td></td></tr></table>

<table width="100%" border="0" cellpadding="2">
  <tr>
  <td colspan="4" align="center" width="35%">&nbsp;<br/>Người lập biểu</td>
    <td colspan="3" align="center" width="35%">&nbsp;<br/>Kế toán trưởng</td>
    <td colspan="3" width="30%" rowspan="2" align="center">
    <em>Ngày ';
    $time = strtotime($_SESSION["THONGTINPHIEU"]['ngaylap']);
    $html .= date("d-m-Y", $time);
    $html .= '</em><br/>Người đại diện theo pháp luật
   </td>
  </tr>
  <tr>
    <td></td>
  </tr>
</table>
</div>
<div style=" '.$display.'" class="no-print ketquaduyetsocai kequa_'.$k_matk.'" >
<table width="100%" border="1" >
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
';
    echo $html;
if($tongsotk!=$sodong) {
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

