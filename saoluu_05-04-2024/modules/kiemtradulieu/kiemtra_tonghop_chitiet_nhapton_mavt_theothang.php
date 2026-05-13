<?php
include("../../config.php");
$thang = $_GET['thang'];
$OBJ_KIEMTRADULIEU = new  ketoantonghop();
$res_nhapkho = $OBJ_KIEMTRADULIEU->re_query("SELECT sum(soluongnhap) soluongnhap,sum(thanhtiennhap) thanhtiennhap,thang,mavt FROM (SELECT chitiet_psvt.mavt,chitiet_psvt.soluongnhap soluongnhap,chitiet_psvt.donggianhap,(chitiet_psvt.thanhtien+chitiet_psvt.cpmuahang) thanhtiennhap,month(ngayghiso) thang FROM `chitiet_psvt` INNER JOIN psvt on (chitiet_psvt.sophieu = psvt.sophieu) WHERE psvt.loaiphieu=1 and month(ngayghiso)='{$thang}') X GROUP BY mavt");
while ($result_nhapkho = $OBJ_KIEMTRADULIEU->re_fetch($res_nhapkho)){
    $data_nhapkho[] = $result_nhapkho;
}

$res_nhapkho_tk = $OBJ_KIEMTRADULIEU->re_query("SELECT mavt,sum(soluongnhap) soluongnhap,sum(thanhtiennhap) thanhtiennhap,thang FROM `tkthang` WHERE thang = {$_GET['thang']} GROUP by mavt");
while ($result_nhapkho_tk = $OBJ_KIEMTRADULIEU->re_fetch($res_nhapkho_tk)){
    $data_nhapkho_tk[$result_nhapkho_tk['mavt']] = $result_nhapkho_tk;
}
?>
    <table style="width: 100%;border: 1px solid green;" border="1">
        <tr>
            <td align="center" colspan="10" STYLE="color: red;"><b>KIỂM TRA TỔNG HỢP - CHI TIẾT MÃ VẬT TƯ TRONG NHẬP KHO</b></td>
        </tr>
        <tr>
            <td align="center"><b>Số TT</b></td>
            <td align="center"><b>Tháng</b></td>
            <td align="center"><b>SL Nhập TH</b></td>
            <td align="center"><b>Tổng Nhập TH</b></td>
            <td align="center"><b>SL Nhập CT</b></td>
            <td align="center"><b>Tổng Nhập CT</b></td>
            <td align="center"><b>Chênh lệch</b></td>
            <td align="center"><b>Chênh lệch</b></td>
            <td align="center"><b>CT Mã VT</b></td>
        </tr>
        <?php
        $ott=0;
            foreach ($data_nhapkho as $item){
                $ott++;
                ?>
                <tr>
                    <td align="center"><?php echo $ott ?></td>
                    <td align="center"><?php echo ($item['mavt']) ?></td>
                    <td align="right"><?php echo number_format($item['soluongnhap']) ?></td>
                    <td align="center"><?php echo number_format($item['thanhtiennhap']); ?></td>
                    <td align="center"><?php echo ($data_nhapkho_tk[$item['mavt']]['mavt']) ?></td>
                    <td align="center"><?php echo number_format($data_nhapkho_tk[$item['mavt']]['soluongnhap']); ?></td>
                    <td align="center"><?php echo number_format($data_nhapkho_tk[$item['mavt']]['thanhtiennhap']); ?></td>
                    <td align="center"><?php echo number_format($item['thanhtiennhap']-$data_nhapkho_tk[$item['mavt']]['thanhtiennhap']); ?></td>
                    <td align="center"<?php echo "Xem"; ?></td>
                </tr>
                <?php
            }
        ?>
    </table>