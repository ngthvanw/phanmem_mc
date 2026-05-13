<?php
include("../../config.php");
$OBJ = new dmsanpham();
$result = $OBJ->loadListMaSP_CB_ChiCT();
?>
<option value="0001">0001 - TẤT CẢ</option>
<?php
foreach($result as $item){
?>
<option value="<?php echo $item['masp'] ?>"><?php echo $item['tenct'];  ?></option>
<?php	
}
?>
