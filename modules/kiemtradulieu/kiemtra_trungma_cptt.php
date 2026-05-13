<?php
include("../../config.php");
$OBJ_KIEMTRADULIEU = new  ketoantonghop();
$res_nhapkho = $OBJ_KIEMTRADULIEU->re_query(" SELECT * , COUNT(*) AS number_record FROM pscptt GROUP BY mats HAVING number_record > 1");
while ($result_nhapkho = $OBJ_KIEMTRADULIEU->re_fetch($res_nhapkho)){
    $data_nhapkho[] = $result_nhapkho;
}
?>
    <table style="width: 100%;border: 1px solid green;" border="1">
        <tr>
            <td align="center" colspan="10" STYLE="color: red;"><b>DANH SÁCH CHI PHÍ TRẢ TRƯỚC BỊ TRÙNG MÃ</b></td>
        </tr>
        <tr>
            <td align="center"><b>Số TT</b></td>
            <td align="center"><b>Mã CP</b></td>
            <td align="center"><b>Tên CP</b></td>
        </tr>
        <?php
        $ott=0;
            foreach ($data_nhapkho as $item){
                $sott++;
                ?>
                <tr>
                    <td align="center"><?php echo $sott ?></td>
                    <td align="left"><?php echo ($item['mats']) ?></td>
                    <td align="left"><?php echo  ($item['tents']) ?></td>
                </tr>
                <?php
            }
        ?>
    </table>