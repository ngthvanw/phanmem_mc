<?php
include("../../config.php");
$OBJ = new  makhachhang();
$SQL = "select * from (
						select mavt,tenvt,dvt from chitiet_psvt group by mavt
					) x 
		WHERE mavt NOT IN (SELECT mavt FROM mavt);";
$resuft = $OBJ->re_query($SQL);
$data = $OBJ->re_fetch_all($resuft);
?>
<table style="width: 100%;border: 1px solid green;" border="1">
        <tr>
            <td align="center" colspan="6" STYLE="color: red;"><b>DANH SÁCH HÀNG HOÁ KHÔNG TỒN TẠI</b></td>
        </tr>
        <tr>
            <td align="center"><b>Số TT</b></td>
            <td align="center"><b>Mã VT</b></td>
            <td align="center"><b>Tên VT</b></td>
            <td align="center"><b>ĐVT</b></td>
        </tr>
<?php
$sott=0;
foreach ($data as $item){
	$sott++;
    ?>
	<tr>
		<td align="center"><?php echo $sott ?></td>
		<td align="left"><?php echo ($item['mavt']) ?></td>
		<td align="left"><?php echo ($item['tenvt']) ?></td>
		<td align="left"><?php echo ($item['dvt']) ?></td>
	</tr>
	<?php
}
?>
</table>