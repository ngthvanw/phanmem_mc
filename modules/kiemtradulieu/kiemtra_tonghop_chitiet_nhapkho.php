<?php
include("../../config.php");
$OBJ_KIEMTRADULIEU = new  ketoantonghop();
$data = $OBJ_KIEMTRADULIEU->kiemtra_tonghop_chitiet_nhapxuatkho();
$soluong =  count($data);
if($soluong){
    ?>
    <table style="width: 100%;border: 1px solid green;" border="1">
        <tr>
            <td align="center" colspan="4" STYLE="color: red;"><b>KIỂM TRA TỔNG HỢP - CHI TIẾT TRONG TỪNG PHIẾU NHẬP KHO</b></td>
        </tr>
        <tr>
            <td align="center"><b>Số CT</b></td>
            <td align="center"><b>Tiền hàng TH</b></td>
            <td align="center"><b>Tiền hàng CT</b></td>
            <td align="center"><b>Loại phiếu</b></td>
        </tr>
        <?php
            foreach ($data as $item){
                ?>
                <tr>
                    <td align="center"><?php echo $item['mapskt'] ?></td>
                    <td align="right"><?php echo number_format($item['thanhtienth']) ?></td>
                    <td align="right"><?php echo number_format($item['thanhtienct']) ?></td>
                    <td align="center"><?php echo ($item['loaiphieu']==1)?"NK":"XK"; ?></td>
                </tr>
                <?php
            }
        ?>
    </table>
<?php
}else{
    echo "Không phát hiện sai sót trong phiếu nhập xuất kho";
}