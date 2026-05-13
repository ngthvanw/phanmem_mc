<?php
include("../../config.php");
$OBJ = new dmsanpham();
$result = $OBJ->loadListMaSP_CB();
?>
<option value="ALL">TẤT CẢ BỘ PHẬN</option>
<?php
foreach($result as $item){
?>
<option value="<?php echo $item['masp'] ?>"><?php echo $item['tenct'];  ?></option>
<?php	
}
?>
