<?php
include("../../config.php");
$thang = $_GET['thang'];
$OBJ_KIEMTRADULIEU = new  ketoantonghop();
$res_nhapkho = $OBJ_KIEMTRADULIEU->re_query("SELECT sum(soluongnhap) soluongnhap,sum(thanhtiennhap) thanhtiennhap,thang,mavt,mapskt FROM (SELECT chitiet_psvt.mavt,chitiet_psvt.soluongnhap soluongnhap,((select dongiabinhquan from tkthang where thang={$thang} and tkthang.mavt = chitiet_psvt.mavt)* chitiet_psvt.soluongnhap) thanhtiennhap,month(ngayghiso) thang,psvt.mapskt FROM `chitiet_psvt` INNER JOIN psvt on (chitiet_psvt.sophieu = psvt.sophieu) WHERE psvt.loaiphieu=2 and month(ngayghiso)='{$thang}') X GROUP BY mapskt");
while ($result_nhapkho = $OBJ_KIEMTRADULIEU->re_fetch($res_nhapkho)){
    $data_nhapkho[] = $result_nhapkho;
}

//echo "SELECT 0 soluongxuat,0 donggiaxuat,sum(gtvnd1) thanhtiennhap,month(ngayghiso) thang,pskt.mapskt FROM `chitiet_pskt` INNER JOIN pskt on (chitiet_pskt.sophieu = pskt.sophieu) WHERE pskt.loaiphieu=65 and month(ngayghiso)='{$thang}' group by pskt.mapskt";
$res_nhapkho_tk = $OBJ_KIEMTRADULIEU->re_query("SELECT 0 soluongxuat,0 donggiaxuat,sum(gtvnd1) thanhtiennhap,month(ngayghiso) thang,pskt.mapskt FROM `chitiet_pskt` INNER JOIN pskt on (chitiet_pskt.sophieu = pskt.sophieu) WHERE pskt.loaiphieu=65 and month(ngayghiso)='{$thang}' group by pskt.mapskt");
while ($result_nhapkho_tk = $OBJ_KIEMTRADULIEU->re_fetch($res_nhapkho_tk)){
    $data_nhapkho_tk[$result_nhapkho_tk['mapskt']] = $result_nhapkho_tk;
}
//debug($data_nhapkho_tk);
?>
    <table style="width: 100%;border: 1px solid green;" border="1">
        <tr>
            <td align="center" colspan="10" STYLE="color: red;"><b>KIỂM TRA TỔNG HỢP - CHI TIẾT MÃ VẬT TƯ TRONG XUẤT KHO</b></td>
        </tr>
        <tr>
            <td align="center"><b>Số TT</b></td>
            <td align="center"><b>Số CT</b></td>
            <td align="center"><b>SL Nhập TH</b></td>
            <td align="center"><b>Tổng Nhập TH</b></td>
            <td align="center"><b>SL Nhập CT</b></td>
            <td align="center"><b>Tổng Nhập CT</b></td>
            <td align="center"><b>Thành Tiên CT</b></td>
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
                    <td align="center"><?php echo ($item['mapskt']) ?></td>
                    <td align="right"><?php echo number_format($item['soluongnhap']) ?></td>
                    <td align="center"><?php echo number_format($item['thanhtiennhap']); ?></td>
                    <td align="center"><?php echo ($data_nhapkho_tk[$item['mapskt']]['mapskt']) ?></td>
                    <td align="center"><?php echo number_format($data_nhapkho_tk[$item['mapskt']]['soluongnhap']); ?></td>
                    <td align="center"><?php echo number_format($data_nhapkho_tk[$item['mapskt']]['thanhtiennhap']); ?></td>
                    <td align="center"><?php echo number_format($item['thanhtiennhap']-$data_nhapkho_tk[$item['mapskt']]['thanhtiennhap']); ?></td>
                    <td align="center"<?php echo "Xem"; ?></td>
                </tr>
                <?php
            }
        ?>
    </table>