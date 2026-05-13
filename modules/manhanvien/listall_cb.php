<?php
include("../../config.php");
$OBJ = new manhanvien();
$result = $OBJ->loadListMaNV();
?>
<option value="ALL">--Tất cả--</option>
<?php
foreach ($result as $item){
    ?>
    <option value="<?php echo $item['manhanvien'] ?>"><?php echo $item['manhanvien']." - ".$item['tennv']; ?></option>
<?php
}
?>