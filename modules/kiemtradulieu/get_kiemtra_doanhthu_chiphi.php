<?php
include("../../config.php");
$matk = "511,711,632,641,642,811";
$OBJCT = new  ketoantonghop();
$nam = $_SESSION['NienDo'];

$OBJCT = new ketoantonghop();
$OBJHTTK = new hethongtaikhoan();
$OBJMACT = new dmsanpham();
$OBJMANOIDUNG = new manoidung();
$DATA_LISTMABP = $OBJMACT->loadListMaCT_CoKeyLaMa();
$DATA_LISTMAND = $OBJMANOIDUNG->loadListMaNoiDung_CoKeyLaMa();

$theobophan = "ALL";
$theonoidung = "ALL";
$congdontheosocai = 0;
$theobophan = '0001';
if($theobophan==='0001'){
	$sql_mabp = " and mabp!=''";
    $sql_mabp1 = " and makho!=''";
}else{
    $chuoimactsp_re = substr($OBJMACT->loadMaKHALL_TraVeChuoiMaCTSP($theobophan),0,-1);
    $mactsp_string = str_replace(",","','",$chuoimactsp_re);
	$sql_mabp = " and mabp in ('".$mactsp_string."')";
	$sql_mabp1 = " and makho in ('".$mactsp_string."')";
}

$intheothuesuat = $_GET['intheothuesuat'];
$intheochungtu= $_GET['intheochungtu'];
$sapxep= 'ngayghiso';
$tenphieu= $_GET['tenphieu'];
$ngaylap= $_GET['ngaylap'];
$str_w="";
$str_w2="";

$str_w=" and ngayghiso >='".$_SESSION['NienDo']."-01-01' and ngayghiso< '".$_SESSION['NienDo']."-01-01'  ".$sql_mabp;
$OBJCT->setStrOderby($str_w);
$str_w2=" and ngayghiso >='".$_SESSION['NienDo']."-01-01' and ngayghiso<'".$_SESSION['NienDo']."-01-01'  ".$sql_mabp1;
$OBJCT->setStrOderby2($str_w2);
$dauky = $OBJCT->load_danhsach_socai_dk_theotk($matk,$theonoidung,$sapxep);
$str_w2=" and ngayghiso >='".$_SESSION['NienDo']."-01-01' and ngayghiso<='".$_SESSION['NienDo']."-12-31'  ".$sql_mabp1;
$OBJCT->setStrOderby2($str_w2);
$str_w=" and ngayghiso >='".$_SESSION['NienDo']."-01-01' and ngayghiso<= '".$_SESSION['NienDo']."-12-31'  ".$sql_mabp;
$OBJCT->setStrOderby($str_w);
$OBJHTTK->set_orderby(" matk in (".$matk.")");
$danhsachtk = $OBJHTTK->loadListHTTK_W1();
	
$dataChi = $OBJCT->load_danhsach_socai_chi_theotk($matk,$theonoidung,$sapxep);// lấy tất cả thu chi

$grouptheo ="thang";
if($sapxep=="noidung"){
    $grouptheo ="mand";
}else{
    $grouptheo ="thang";
}
$matk_arr = explode(",",$matk);

if($congdontheosocai=="0"){
    foreach ($matk_arr as $item_tk){
        foreach ($dataChi[$item_tk] as $item_danhsach){
            $tk = $item_danhsach['tk'];
            $thang = $item_danhsach[$grouptheo];
			if(substr($tk,0,3)=='511' || substr($tk,0,3)=='711'){
				$danhsach_data['DT'][$thang]= $danhsach_data['DT'][$thang] + $item_danhsach['tienco'];
			}   
			if(substr($tk,0,3)=='632' || substr($tk,0,3)=='641' || substr($tk,0,3)=='642' || substr($tk,0,3)=='811'){
				$danhsach_data['CP'][$thang]= $danhsach_data['CP'][$thang] + $item_danhsach['tienno'];
			}
        }
    }
}
?>
<table style="width: 100%;border: 1px solid green;" border="1">
    <tr>
        <td align="center" colspan="11" STYLE="color: red;"><b>BẢNG PHÂN TÍCH DOANH THU - CHI PHÍ THEO THÁNG</b></td>
    </tr>
    <tr>
        <td align="center"><b>Số TT</b></td>
        <td align="center"><b>Tháng</b></td>
        <td align="center"><b>Doanh Thu</b></td>
        <td align="center"><b>Chi Phí</b></td>
        <td align="center"><b>Chênh Lệch</b></td>
    </tr>
    <?php
    $sott = 0;
    $TongHang = 0;
    $TongThue = 0;
    for($i=1;$i<13;$i++){
            $sott++;
            $TongDT += $danhsach_data['DT'][$i];
            $TongCP += $danhsach_data['CP'][$i];
            ?>
            <tr>
                <td align="center"><?php echo $i; ?></td>
                <td align="center"><?php echo $i; ?></td>
                <td align="center"><?php echo number_format($danhsach_data['DT'][$i], 0, ",", "."); ?></td>
                <td align="center"><?php echo number_format($danhsach_data['CP'][$i], 0, ",", "."); ?></td>
                <td align="center"><?php echo number_format(($danhsach_data['DT'][$i]-$danhsach_data['CP'][$i]), 0, ",", "."); ?></td>
            </tr>
	<?php
    }
	?>
    <tr STYLE="font-weight: bold;">
        <td colspan=2 align="center"><b>TỔNG CỘNG</b></td>
        <td align="right"><?php echo number_format($TongDT, 0, ",", ".") ?><b></td>
        <td align="right"><?php echo number_format($TongCP, 0, ",", ".") ?><b></td>
        <td align="right"><?php echo number_format($TongDT - $TongCP, 0, ",", ".") ?><b></td>
    </tr>
</table>