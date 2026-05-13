<?php
include("../../config.php");
$OBJCT = new  ketoantonghop();
$matk = $_GET['matk'];
$tentk = $_GET['tentk'];
$gioihanton = str_replace(",","",$_GET['gioihanton']);

$str_w = "";
$str_w2 = "";


$tongtonkho = 0;
$str_w = " and ngayghiso >='" . $_SESSION['kyketoan_tungay'] . "' and ngayghiso< '" . $_SESSION['kyketoan_tungay'] . "'  " . $sql_mabp;
$OBJCT->setStrOderby($str_w);
$str_w2 = " and ngayghiso >='" . $_SESSION['kyketoan_tungay'] . "' and ngayghiso<'" . $_SESSION['kyketoan_tungay'] . "'  " . $sql_mabp1;
$OBJCT->setStrOderby2($str_w2);
$dauky = $OBJCT->load_danhsach_socai_dk_theotk($matk, "ALL", 'ngayghiso');

$str_w = " and ngayghiso >='" . $_SESSION['kyketoan_tungay'] . "' and ngayghiso<= '" . $_SESSION['kyketoan_denngay'] . "'  " . $sql_mabp;
$OBJCT->setStrOderby($str_w);
$str_w2 = " and ngayghiso >='" . $_SESSION['kyketoan_tungay'] . "' and ngayghiso<='" . $_SESSION['kyketoan_denngay'] . "'  " . $sql_mabp1;
$OBJCT->setStrOderby2($str_w2);

$dataChi = $OBJCT->load_danhsach_socai_chi_theotk($matk, "ALL", 'ngayghiso');// lấy tất cả thu chi

$TongSoTon = $dauky[$matk]['tienno']-$dauky[$matk]['tienco'];
    ?>
    <table style="width: 100%;border: 1px solid green;" border="1" id="bangkiemtra">
        <tr>
            <td align="center" colspan="7" STYLE="color: red;"><b>DANH SÁCH KIỂM TRA SỐ TỒN TK <?php echo $matk. ' - ' .$tentk; ?> KHÔNG ĐỦ ĐIỀU KIỆN</b></td>
        </tr>
        <tr>
            <td align="center"><b>Ngày ghi sổ</b></td>
            <td align="center"><b>Ngày chứng từ</b></td>
            <td align="center"><b>Chứng từ</b></td>
            <td align="center"><b>Diễn giải</b></td>
            <td align="center"><b>Nợ</b></td>
            <td align="center"><b>Có</b></td>
            <td align="center"><b>Tồn</b></td>
        </tr>
        <?php
foreach ($dataChi[$matk] as $item) {
$TongSoTon = $TongSoTon+($item['tienno']-$item['tienco']);
    if (($TongSoTon < 0) || ($TongSoTon > $gioihanton)) {
        ?>
        <tr>
            <td align="center" style="padding: 5px;"><?php echo date("d-m",strtotime($item['ngayghiso'])) ?></td>
            <td align="center" style="padding: 5px;"><?php echo date("d-m",strtotime($item['ngayhoadon'])) ?></td>
            <td align="center" style="padding: 5px;"><?php echo ($item['sophieu']) ?></td>
            <td align="left" style="padding: 5px;"><?php echo $item['noidung']; ?></td>
            <td align="right" style="padding: 5px;"><?php echo number_format($item['tienno'])==0?"":number_format($item['tienno']) ?></td>
            <td align="right" style="padding: 5px;"><?php echo number_format($item['tienco'])==0?"":number_format($item['tienco']) ?></td>
            <td align="right" style="padding: 5px;"><?php echo number_format($TongSoTon,0) ?></td>
        </tr>
        <?php
    }
}
        ?>
    </table>
    <?php