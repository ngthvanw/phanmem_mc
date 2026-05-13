<?php
include("../../config.php");
$OBJ = new  makhachhang();
$SQL = "SELECT *, COUNT(sct) AS soluong 
			FROM (
				SELECT makhno AS makh, tenkhachhang AS tenkh, sophieu, CAST(sct AS UNSIGNED) AS sct 
				FROM chitiet_pskt 
				WHERE maloai IN (1, 2)
				GROUP BY sophieu, makh, sct

				UNION ALL

				SELECT makh, tenkh, sophieu, CAST(sct AS UNSIGNED) AS sct 
				FROM psvt 
				WHERE maloai IN (1, 2)
			) X 
			GROUP BY makh, sct 
			HAVING COUNT(sct) > 1
			 ";
$resuft = $OBJ->re_query($SQL);
$data = $OBJ->re_fetch_all($resuft);
?>
<table style="width: 100%;border: 1px solid green;" border="1">
        <tr>
            <td align="center" colspan="5" STYLE="color: red;"><b>DANH SÁCH HOÁ ĐƠN TRÙNG SỐ HOÁ ĐƠN</b></td>
        </tr>
        <tr>
            <td align="center"><b>Số TT</b></td>
            <td align="center"><b>Mã KH</b></td>
            <td align="center"><b>Tên KH</b></td>
			<td align="center"><b>Số Hoá Đơn</b></td>
			<td align="center"><b>Số lượng trùng</b></td>
        </tr>
<?php
$sott=0;
foreach ($data as $item){
	$sott++;
	$Style = "";
	if(substr($item['tkco'],0,3)!='341'){
		$Style = "";
	}
    ?>
	<tr <?php echo $Style; ?>>
		<td align="center"><?php echo $sott ?></td>
		<td align="left"><?php echo ($item['makh']) ?></td>
		<td align="left"><?php echo ($item['tenkh']) ?></td>
		<td align="center"><?php echo ($item['sct']) ?></td>
		<td align="center"><?php echo ($item['soluong']) ?></td>
	</tr>
	<?php
}
?>
</table>