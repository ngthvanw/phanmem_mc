<?php
include("../../config.php");
$thang = $_GET['thang'];
$giavon = $_GET['giavon'];
$mahang = $_GET['mahang'];
$soluong = $_GET['soluong'];
$makho = $_GET['makho'];

$OBJCT = new ps_chitiet_mavattu();
$sql_select = "(select tkthang.mavt,tkthang.tenvt,tkthang.dvt,slton,dongiabinhquan from tkthang inner join tmp_tkhientai on (tkthang.mavt = tmp_tkhientai.mavt) where tkthang.mavt!='{$mahang}' AND slton>={$soluong} AND dongiabinhquan<={$giavon} and thang='{$thang}' and tkthang.makho='{$makho}' order by dongiabinhquan DESC LIMIT 10) 
               UNION ALL
               (select tkthang.mavt,tkthang.tenvt,tkthang.dvt,slton,dongiabinhquan from tkthang inner join tmp_tkhientai on (tkthang.mavt = tmp_tkhientai.mavt) where tkthang.mavt!='{$mahang}' AND slton>={$soluong} AND dongiabinhquan>{$giavon} and thang='{$thang}' and tkthang.makho='{$makho}' order by dongiabinhquan DESC LIMIT 10)
";
$query = database::re_query($sql_select);
$data = database::re_fetch_all($query);
$soluong =  count($data);
if($soluong){
    ?>
    <table style="width: 100%;border: 1px solid green;" border="1">
        <tr>
            <td align="center" colspan="7" STYLE="color: red;"><b>DANH SÁCH HÀNG HOÁ TƯƠNG ĐƯƠNG</b></td>
        </tr>
        <tr>
            <td align="center"><b>Số TT</b></td>
            <td align="center"><b>Mã VT</b></td>
            <td align="center"><b>tên VT</b></td>
            <td align="center"><b>ĐVT</b></td>
            <td align="center"><b>Số lượng</b></td>
            <td align="center"><b>Đơn giá</b></td>
        </tr>
        <?php
        $sott = 0;
        foreach ($data as $item){
            $sott++;
            ?>
            <tr>
                <td align="center" width="40px;"><?php echo $sott; ?></td>
                <td align="left" width="80px;"><?php echo $item['mavt'] ?></td>
                <td align="left" width="250px;"><?php echo $item['tenvt'] ?></td>
                <td align="center" width="40px;"><?php echo $item['dvt']; ?></td>
                <td align="right" width="100px;"><?php echo number_format($item['slton'],3); ?></td>
                <td align="right" width="100px;"><?php echo number_format($item['dongiabinhquan'],3); ?></td>
            </tr>
            <?php
        }
        ?>
    </table>
    <?php
}else{
    echo "KHÔNG TÌM THẤY MÃ HÀNG TƯƠNG ĐƯƠNG";
}



