<?php
include("../../config.php");
$OBJ_KIEMTRADULIEU = new  ketoantonghop();
$sql = "SELECT sott,mapskt,loaiphieu,ngayghiso,seri,sct,makh,tenkh,diachi,masothue,noidung,tienhang,tienthue,tongcong,chuthich,1 as nhapxuat,0 as tentkco FROM psvt WHERE masothue in (select masothue from dulieuchung.`doanhnghiep_bathopphap`)
                UNION ALL 
        SELECT pskt.sott,pskt.mapskt,pskt.loaiphieu,pskt.ngayghiso,seri,sct,makh,tenkh,diachi,masothue,noidung1 as noidung,gtvnd1 as tienhang,gtvnd2 as tienthue,tongcong,chuthich,2 as nhapxuat,pskt.tentkco from pskt inner join chitiet_pskt on(pskt.sophieu = chitiet_pskt.sophieu) WHERE masothue in (select masothue from dulieuchung.`doanhnghiep_bathopphap`)";
$res_nhapkho = $OBJ_KIEMTRADULIEU->re_query("$sql");
while ($result_nhapkho = $OBJ_KIEMTRADULIEU->re_fetch($res_nhapkho)) {
    $data_nhapkho[] = $result_nhapkho;
}
$_SESSION['DSHDBATHOPPHAP'] = $data_nhapkho;
?>
<table style="width: 100%;border: 1px solid green;" border="1">
    <tr>
        <td align="center" colspan="11" STYLE="color: red;"><b>DANH SÁCH HOÁ ĐƠN BẤT HỢP PHÁP -
                NĂM: <?php echo $_SESSION['NienDo']; ?></b></td>
    </tr>
    <tr>
        <td align="center"><b>Số TT</b></td>
        <td align="center"><b>Số phiếu</b></td>
        <td align="center"><b>Loại phiếu</b></td>
        <td align="center"><b>Ký hiệu</b></td>
        <td align="center"><b>Số HĐ</b></td>
        <td align="center"><b>Mã KH</b></td>
        <td align="center"><b>Tên KH</b></td>
        <td align="center"><b>Nội dung</b></td>
        <td align="center"><b>Tiền hàng</b></td>
        <td align="center"><b>Tiền thuế</td>
        <td align="center"><b>Tổng tiền</td>
    </tr>
    <?php
    $sott = 0;
    $TongHang = 0;
    $TongThue = 0;
    foreach ($data_nhapkho as $item) {
        if ($item['sct'] != "") {
            $sott++;
            $TongHang += $item['tienhang'];
            $TongThue += $item['tienthue'];
            ?>
            <tr>
                <td align="center"><?php echo $sott ?></td>
                <td align="center"><?php echo($item['mapskt']) ?></td>
                <td align="center"><?php
                    $nhapxuat = $item['nhapxuat'];
                    $loaiphieu = $item['loaiphieu'];
                    if ($nhapxuat == 1) {
                        if ($loaiphieu == 1) {
                            echo "NHẬP KHO";
                        } else {
                            echo "XUẤT KHO";
                        }
                    }
                    if ($nhapxuat == 2) {
                        if ($loaiphieu == 1) {
                            echo "PHIẾU THU";
                        } else if ($loaiphieu == 2) {
                            echo "PHIẾU CHI";
                        } else if ($loaiphieu == 3) {
                            echo "PHIẾU GHI NỢ";
                        } else if ($loaiphieu == 4) {
                            echo "PHIẾU GHI CÓ";
                        } else if ($loaiphieu >= 5 && $loaiphieu % 2 != 0 && $loaiphieu <= 64) {
                            echo "PHIẾU THU NH";
                        } else if ($loaiphieu >= 5 && $loaiphieu % 2 == 0 && $loaiphieu <= 64) {
                            echo "PHIẾU CHI NH";
                        } else if ($loaiphieu >= 65) {
                            echo "PHIẾU PHÁT SINH";
                        }
                    }
                    ?></td>
                <td align="center"><?php echo($item['seri']) ?></td>
                <td align="center"><?php echo($item['sct']) ?></td>
                <td align="left"><?php echo($item['makh']) ?></td>
                <td align="left"><?php echo($item['tenkh']) ?></td>
                <td align="left"><?php echo($item['noidung']) ?></td>
                <td align="right"><?php echo number_format($item['tienhang'], 0, ",", ".") ?></td>
                <td align="right"><?php echo number_format($item['tienthue'], 0, ",", ".") ?></td>
                <td align="right"><?php echo number_format($item['tienhang'] + $item['tienthue'], 0, ",", ".") ?></td>
            </tr>
            <?php
        }
    }
    ?>
    <tr STYLE="font-weight: bold;">
        <td colspan=8 align="center"><b>TỔNG CỘNG</b></td>
        <td align="right"><?php echo number_format($TongHang, 0, ",", ".") ?><b></td>
        <td align="right"><?php echo number_format($TongThue, 0, ",", ".") ?><b></td>
        <td align="right"><?php echo number_format($TongHang + $TongThue, 0, ",", ".") ?><b></td>
    </tr>
</table>