<?php
include("../../config.php");
$OBJ_KIEMTRADULIEU = new  ketoantonghop();
$res_nhapkho = $OBJ_KIEMTRADULIEU->re_query("select * from pscptt WHERE tanggiam=1 and thamchieu not in (SELECT sophieu from pskt)");
while ($result_nhapkho = $OBJ_KIEMTRADULIEU->re_fetch($res_nhapkho)){
    $data_nhapkho[] = $result_nhapkho;
}
?>
    <table style="width: 100%;border: 1px solid green;" border="1">
        <tr>
            <td align="center" colspan="10" STYLE="color: red;"><b>DANH SÁCH PHIẾU CHƯA NHẬP TỔNG HỢP TRONG CHI PHÍ TRẢ TRƯỚC</b></td>
        </tr>
        <tr>
            <td align="center"><b>Số TT</b></td>
            <td align="center"><b>Số phiếu</b></td>
            <td align="center"><b>Mã CP</b></td>
            <td align="center"><b>Tên CP</td>
            <td align="center"><b>Nguyên giá</b></td>
        </tr>
        <?php
        $sott=0;
		$TongTien1=0;
            foreach ($data_nhapkho as $item){
                $sott++;
				$TongTien1+= $item['gtvnd1'];
                ?>
                <tr>
                    <td align="center"><?php echo $sott ?></td>
                    <td align="left"><?php echo ($item['mapsts']) ?></td>
                    <td align="left"><?php echo ($item['mats']) ?></td>
                    <td align="left"><?php echo ($item['tents']) ?></td>
                    <td align="right"><?php echo number_format($item['nguyengia']) ?></td>
 
                </tr>
                <?php
            }
        ?>
    </table>