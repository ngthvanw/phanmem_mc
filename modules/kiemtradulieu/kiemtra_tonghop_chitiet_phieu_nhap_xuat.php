<?php
include("../../config.php");
$OBJ_KIEMTRADULIEU = new  ketoantonghop();
$Arr_SoPhieu = "";
$res_chitiet = $OBJ_KIEMTRADULIEU->re_query("SELECT sum(thanhtien) thanhtien,sum(thue) thue,sophieu FROM chitiet_psvt group by sophieu;");
while ($result_chitiet = $OBJ_KIEMTRADULIEU->re_fetch($res_chitiet)){
	$Arr_SoPhieu[$result_chitiet['sophieu']]= $result_chitiet['sophieu'];
    $data_chitiet[$result_chitiet['sophieu']] = $result_chitiet;
}

$res_tonghop = $OBJ_KIEMTRADULIEU->re_query("SELECT sum(tongcong) tongcong,sophieu,mapskt FROM psvt group by sophieu;");

while ($result_tonghop = $OBJ_KIEMTRADULIEU->re_fetch($res_tonghop)){
	$Arr_SoPhieu[$result_tonghop['sophieu']]= $result_tonghop['sophieu'];
    $data_tonghop[$result_tonghop['sophieu']] = $result_tonghop;
}
?>
    <table style="width: 100%;border: 1px solid green;" border="1">
        <tr>
            <td align="center" colspan="10" STYLE="color: red;"><b>KIỂM TRA TỔNG HỢP - CHI TIẾT PHIẾU NHẬP XUẤT KHO</b></td>
        </tr>
        <tr>
            <td align="center"><b>Số TT</b></td>
            <td align="center"><b>Số phiếu</b></td>
            <td align="center"><b>Số tiền TH</b></td>
            <td align="center"><b>Số tiền CT</b></td>
            <td align="center"><b>Chênh lệch</b></td>
        </tr>
        <?php
        $sott=0;
            foreach ($$result_tonghop as $K_SoPhieu=>$item){
				$TongTienCT = $data_chitiet[$K_SoPhieu]['thanhtien']+$data_chitiet[$K_SoPhieu]['thue'];
				$TongTienTH = $result_tonghop[$K_SoPhieu]['tongcong'];
				$ChenhLech = $TongTienTH-$TongTienCT;
				if($ChenhLech!=0){
                $sott++;
                ?>
                <tr>
                    <td align="center"><?php echo $sott ?></td>
                    <td align="center"><?php echo $result_tonghop[$K_SoPhieu]['mapskt'] ?></td>
                    <td align="right"><?php echo number_format($TongTienTH) ?></td>
                    <td align="center"><?php echo number_format($TongTienCT); ?></td>
                    <td align="center"><?php echo number_format($ChenhLech); ?></td>
                </tr>
                <?php
				}
            }
        ?>
    </table>