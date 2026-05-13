<?php
include("../../config.php");
$OBJ = new manhomkh();
$result = $OBJ->loadListMaNhom();
?>
<option value="ALL">TẤT CẢ - NHÓM KHÁCH HÀNG</option>
<?php
foreach($result as $item){
    ?>
    <option value="<?php echo $item['manhom'] ?>"><?php echo $item['manhom']." - ". $item['tennhom'];  ?></option>
    <?php
}
?>
