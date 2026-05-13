<?php
include("../../config.php");
$OBJ_KIEMTRADULIEU = new  ketoantonghop();
$res_nhapkho = $OBJ_KIEMTRADULIEU->re_query("select pskt.mapskt,pskt.tkco,pskt.makh,tenkhachhang,chitiet_pskt.tkno1,chitiet_pskt.gtvnd1,chitiet_pskt.tkno2,chitiet_pskt.gtvnd2,(select nguyengia from pscptt where thamchieu=chitiet_pskt.sott) as nguyengia from chitiet_pskt INNER JOIN pskt ON (pskt.sophieu = chitiet_pskt.sophieu) WHERE (SUBSTRING(chitiet_pskt.tkno1,1,3)='242' OR SUBSTRING(chitiet_pskt.tkno2,1,3)='242') and pskt.loaiphieu<=30");
while ($result_nhapkho = $OBJ_KIEMTRADULIEU->re_fetch($res_nhapkho)){
    $data_nhapkho[] = $result_nhapkho;
}
?>
    <table style="width: 100%;border: 1px solid green;" border="1">
        <tr>
            <td align="center" colspan="10" STYLE="color: red;"><b>DANH SÁCH PHIẾU CHƯA NHẬP CHI TIẾT TRONG CHI PHÍ TRẢ TRƯỚC</b></td>
        </tr>
        <tr>
            <td align="center"><b>Số TT</b></td>
            <td align="center"><b>Số phiếu</b></td>
            <td align="center"><b>Mã TK</b></td>
            <td align="center"><b>Mã KH</b></td>
            <td align="center"><b>Tên KH
            <td align="center"><b>TK 1</b></td>
            <td align="center"><b>Tiền 1</b></td>
            <td align="center"><b>TK 2</b></td>
            <td align="center"><b>Tiền 2</td>
            <td align="center"><b>Tiền CP</td>
            <td align="center"><b>So sánh</td>
        </tr>
        <?php
        $sott=0;
		$TongTien1=0;
		$TongTien2=0;
            foreach ($data_nhapkho as $item){
                $sott++;
				$TongTien1+= $item['gtvnd1'];
				$TongTien2+= $item['nguyengia'];
                ?>
                <tr>
                    <td align="center"><?php echo $sott ?></td>
                    <td align="left"><?php echo ($item['mapskt']) ?></td>
                    <td align="left"><?php echo  ($item['tkco']) ?></td>
                    <td align="left"><?php echo ($item['makh']) ?></td>
                    <td align="left"><?php echo ($item['tenkhachhang']) ?></td>
                    <td align="left"><?php echo ($item['tkno1']) ?></td>
                    <td align="right"><?php echo number_format($item['gtvnd1']) ?></td>
                    <td align="left"><?php echo ($item['tkno2']) ?></td>
                    <td align="right"><?php echo number_format($item['gtvnd2']) ?></td>
                    <td align="right"><?php echo number_format($item['nguyengia']) ?></td>
                    <td align="right"><?php 
						if($item['gtvnd1']!=$item['nguyengia']){
						echo "KHÔNG";
						}
					?></td>
                </tr>
                <?php
            }
        ?>
		        <tr>
            <td colspan=6 align="center"><b>TỔNG</b></td>
            <td align="center"><b><?php echo number_format($TongTien1); ?></b></td>
            <td align="center"><b></b></td>
            <td align="center"><b></td>
            <td align="center"><b><?php echo number_format($TongTien2); ?></td>
            <td align="center"><b></td>
        </tr>
    </table>