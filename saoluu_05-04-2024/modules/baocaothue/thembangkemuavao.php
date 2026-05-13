<?php
include("../../config.php");
$OBJCT = new baocaothue();
$chitiet = $_GET['kieuin'];// loại bảng kê tổng hợp hoặc chi tiết
$tungay = $_GET['tungay'];

$denngay = $_GET['denngay'];

$_SESSION['TuNgay'] = $tungay;
$_SESSION['DenNgay'] = $denngay;

$intheothuesuat = $_GET['intheothuesuat'];
$intheochungtu= $_GET['intheochungtu'];
$sapxeptheohoadon= $_GET['sapxeptheohoadon'];
$tenphieu= $_GET['tenphieu'];
$ngaylap= $_GET['ngaylap'];
$tmp_thue = array(2=>"k",3=>"5", 4=>"10", 5=>"20",6=>"0");// Danh sách thuế
if($intheothuesuat==1){
    $array_thue = $tmp_thue;
}else{
    $array_thue=array($tmp_thue[$intheothuesuat]);
}

function load_doanhngiep($dir){
    $fp1 = @fopen($dir."/".'info.db', "r"); // đọc thông tin chung
    $string_info = explode(":",giaima2chieu(fgets($fp1)));
    fclose($fp1);
    return ($string_info);
}
$arr_doanhnghiep = load_doanhngiep($driver."/datafile/".$_SESSION['MST']);
$ListKHCHa="";
if($arr_doanhnghiep[7]==2){
    $ListKHCHa = $OBJCT->loadListMaKH_CHA();
}
$array_dungchung = array(0,1);

//debug($ListKHCHa);
$str_thue = implode("','",$array_thue);
foreach ($array_dungchung as $itemDungChung){
    $str_w=" and dungchung=".$itemDungChung." and thuesuat in('".$str_thue."') and ngayghiso >='".$tungay."' and ngayghiso<= '".$denngay."'";
    $str_w2=" and dungchung=".$itemDungChung." and thuesuat1 in('".$str_thue."') and ngayghiso >='".$tungay."' and ngayghiso<='".$denngay."'";
    $OBJCT->setStrOderby($str_w);
    $OBJCT->setStrOderby2($str_w2);
	if($chitiet==1){
		$data1 = $OBJCT->load_danhsach_muavao($sapxeptheohoadon,$ListKHCHa);// thông tin tồn đầu kỳ
	}else{
		$data1 = $OBJCT->load_danhsach_muavao_group_kiemtra_nganhang($sapxeptheohoadon,$ListKHCHa);
		$data2 = $OBJCT->load_danhsach_muavao2_group_kiemtra_nganhang($sapxeptheohoadon,$ListKHCHa);
	}
    if($data1[0]!="" && $data2[0]!=""){
		$dataCT[$itemDungChung]=array_merge($data1,$data2);
	}
	if($data1[0]!="" && $data2[0]==""){
		$dataCT[$itemDungChung]=$data1;
	}
	if($data1[0]=="" && $data2[0]!=""){
		$dataCT[$itemDungChung]=$data2;
	}
}
$sqlin = "Insert into tmp_bangke_daura(sophieu,mapskt,ngayhoadon,ngayghiso,makh,tenkh,thanhtien,thue,tkco) VALUE ";
foreach ($dataCT as $ItemCT){
    foreach ($ItemCT as $itemChiTiet){
        $val.="('$itemChiTiet[sophieu]','$itemChiTiet[mapskt]','$itemChiTiet[ngayhoadon]','$itemChiTiet[ngayghiso]','$itemChiTiet[makh]','$itemChiTiet[tenkh]','$itemChiTiet[thanhtien]','$itemChiTiet[thue]','$itemChiTiet[tkco]'),";
    }
}

database::re_query("delete from tmp_bangke_daura");
database::re_query("ALTER TABLE tmp_bangke_daura AUTO_INCREMENT = 1");

database::re_query($sqlin.substr($val,0,-1));

$datavuot = $OBJCT->kiemtra_khachkhang_vuot20trieu($sapxeptheohoadon,$ListKHCHa);

$_SESSION["THONGTINPHIEU"]['thangtk'] = "Từ  " .dd_mm_yyy($tungay) ." đến " .dd_mm_yyy($denngay);

$_SESSION["THONGTINPHIEU"]['tenphieu'] = $_GET['tenphieu'];
$_SESSION["THONGTINPHIEU"]['ngaylap'] = $_GET['ngaylap'];
$_SESSION["THONGTINPHIEU"]['ngayhoadon'] = $_GET['ngayhoadon'];
$_SESSION["LISTCTMUAVAO"] = $dataCT;
?>
<table width="100%" border="1" id="table_vuot20trieu">
    <tr style="text-align: center;font-weight: bold;padding: 1px;">
        <td>STT</td>
        <td>Ngày HĐ</td>
        <td>Mã KH</td>
        <td>Tên KH</td>
        <td>Tổng tiền</td>
    </tr>
    <?php
    $dem = 0;
    foreach ($datavuot as $itemvuot){
        if($itemvuot['tongtien']>=20000000 && $itemvuot['tkco']='1111') {
            $dem++;
            ?>
                <tr>
                    <td align="center"><?php echo $itemvuot['mapskt']; ?></td>
                    <td><?php echo date("d-m-Y",strtotime($itemvuot['ngayhoadon'])); ?></td>
                    <td><?php echo $itemvuot['makh']; ?></td>
                    <td><?php echo $itemvuot['tenkh']; ?></td>
                    <td align="right"><?php echo number_format($itemvuot['tongtien']); ?></td>
                </tr>
            <?php
        }
    }
    if($dem==0){
        ?>
        <tr>
            <td colspan="5" align="center">KHÔNG CÓ HOÁ ĐƠN VƯỢT QUÁ 20 TRIỆU</td>
        </tr>
        <?php
    }
    ?>
</table>






