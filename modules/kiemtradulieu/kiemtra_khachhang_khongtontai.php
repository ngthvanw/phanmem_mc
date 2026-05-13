<?php
include("../../config.php");
$OBJ = new  makhachhang();
$SQL = "select * from (
			select makh,tenkh,mapskt,loaiphieu,'TC' as phieu from pskt where makh !=''
			union all
			select makh_nh,tenkh_nh,mapskt,loaiphieu,'TC' as phieu from pskt where makh_nh !=''
			union all
			select makh,tenkh,mapskt,loaiphieu,'NX' as phieu from psvt where makh !=''
		) x 
		WHERE makh NOT IN (SELECT makh FROM makh);";
$resuft = $OBJ->re_query($SQL);
$data = $OBJ->re_fetch_all($resuft);
?>
<table style="width: 100%;border: 1px solid green;" border="1">
        <tr>
            <td align="center" colspan="6" STYLE="color: red;"><b>DANH SÁCH KHÁCH HÀNG KHÔNG TỒN TẠI</b></td>
        </tr>
        <tr>
            <td align="center"><b>Số TT</b></td>
            <td align="center"><b>Mã KH</b></td>
            <td align="center"><b>Tên KH</b></td>
            <td align="center"><b>Số Phiếu</b></td>
            <td align="center"><b>Loại Phiếu</b></td>
            <td align="center"><b>Phiếu</b></td>
        </tr>
<?php
$sott=0;
foreach ($data as $item){
	$sott++;
    ?>
	<tr>
		<td align="center"><?php echo $sott ?></td>
		<td align="left"><?php echo ($item['makh']) ?></td>
		<td align="left"><?php echo ($item['tenkh']) ?></td>
		<td align="left"><?php echo ($item['mapskt']) ?></td>
		<td align="left"><?php echo ($item['loaiphieu']) ?></td>
		<td align="left"><?php echo ($item['phieu']) ?></td>
	</tr>
	<?php
}
?>
</table>