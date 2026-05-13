<?php
include("../../config.php");
$OBJ = new  makhachhang();
$SQL = "select makh,tenkh,makh_nh,tenkh_nh,mapskt,loaiphieu as phieu,tkco from pskt where makh_nh !='' and makh!=makh_nh ORDER BY makh_nh";
$resuft = $OBJ->re_query($SQL);
$data = $OBJ->re_fetch_all($resuft);
?>
<table style="width: 100%;border: 1px solid green;" border="1">
        <tr>
            <td align="center" colspan="8" STYLE="color: red;"><b>DANH SÁCH KHÁCH HÀNG KHÁC NHAU TRONG PHIẾU</b></td>
        </tr>
        <tr>
            <td align="center"><b>Số TT</b></td>
            <td align="center"><b>TK</b></td>
            <td align="center"><b>Mã KH NH</b></td>
            <td align="center"><b>Tên KH NH</b></td>
			 <td align="center"><b>Mã KH</b></td>
            <td align="center"><b>Tên KH</b></td>
            <td align="center"><b>Số Phiếu</b></td>
            <td align="center"><b>Phiếu</b></td>
        </tr>
<?php
$sott=0;
foreach ($data as $item){
	$sott++;
	$Style = "";
	if(substr($item['tkco'],0,3)!='341'){
		$Style = "style='background-color: coral;'";
	}
    ?>
	<tr <?php echo $Style; ?>>
		<td align="center"><?php echo $sott ?></td>
		<td align="left"><?php echo ($item['tkco']) ?></td>
		<td align="left"><?php echo ($item['makh_nh']) ?></td>
		<td align="left"><?php echo ($item['tenkh_nh']) ?></td>
		<td align="left"><?php echo ($item['makh']) ?></td>
		<td align="left"><?php echo ($item['tenkh']) ?></td>
		<td align="center"><?php echo ($item['mapskt']) ?></td>
		<td align="center"><?php echo ($item['phieu']) ?></td>
	</tr>
	<?php
}
?>
</table>