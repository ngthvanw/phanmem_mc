<?php
include("../../config.php");
$OBJ_KIEMTRADULIEU = new  ketoantonghop();
$res_nhapkho = $OBJ_KIEMTRADULIEU->re_query("SELECT 0 soluongxuat,0 donggiaxuat,sum(gtvnd1) thanhtienxuat,month(ngayghiso) thang FROM `chitiet_pskt` INNER JOIN pskt on (chitiet_pskt.sophieu = pskt.sophieu) WHERE pskt.loaiphieu=65 group by thang");
while ($result_nhapkho = $OBJ_KIEMTRADULIEU->re_fetch($res_nhapkho)){
    $data_nhapkho[] = $result_nhapkho;
}

$res_nhapkho_tk = $OBJ_KIEMTRADULIEU->re_query("SELECT mavt,sum(soluongxuat) soluongxuat,sum(thanhtienxuat) thanhtienxuat,thang FROM `tkthang` WHERE soluongxuat!=0 GROUP by thang");
while ($result_nhapkho_tk = $OBJ_KIEMTRADULIEU->re_fetch($res_nhapkho_tk)){
    $data_nhapkho_tk[$result_nhapkho_tk['thang']] = $result_nhapkho_tk;
}
?>
    <table style="width: 100%;border: 1px solid green;" border="1">
        <tr>
            <td align="center" colspan="10" STYLE="color: red;"><b>KIỂM TRA TỔNG HỢP - CHI TIẾT TRONG XUẤT KHO</b></td>
        </tr>
        <tr>
            <td align="center"><b>Số TT</b></td>
            <td align="center"><b>Tháng</b></td>
            <td align="center"><b>SL Nhập TH</b></td>
            <td align="center"><b>Tổng Nhập TH</b></td>
            <td align="center"><b>SL Nhập CT</b></td>
            <td align="center"><b>Tổng Nhập CT</b></td>
            <td align="center"><b>Chênh lệch</b></td>
            <td align="center"><b>CT STT</b></td>
            <td align="center"><b>CT Mã VT</b></td>
        </tr>
        <?php
        $ott=0;
            foreach ($data_nhapkho as $item){
                $ott++;
                ?>
                <tr>
                    <td align="center"><?php echo $ott ?></td>
                    <td align="center"><?php echo ($item['thang']) ?></td>
                    <td align="right"><?php echo number_format($item['soluongxuat']) ?></td>
                    <td align="center"><?php echo number_format($item['thanhtienxuat']); ?></td>
                    <td align="center"><?php echo number_format($data_nhapkho_tk[$item['thang']]['soluongxuat']); ?></td>
                    <td align="center"><?php echo number_format($data_nhapkho_tk[$item['thang']]['thanhtienxuat']); ?></td>
                    <td align="center"><?php echo number_format($item['thanhtienxuat']-$data_nhapkho_tk[$item['thang']]['thanhtienxuat']); ?></td>
                    <td align="center"><?php echo "Xem"; ?></td>
                    <td align="center"><a target="_blank" href="modules/kiemtradulieu/kiemtra_tonghop_chitiet_xuatton_mavt_theothang.php?thang=<?php echo $item['thang']; ?>"><?php echo "Xem" ?></a></td>
                </tr>
                <?php
            }
        ?>
    </table>