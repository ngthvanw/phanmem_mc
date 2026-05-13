<?php
include("../../config.php");
$OBJ = new manhom();
$result = $OBJ->CB_ListMaNhomVTHH();
foreach ($result as $item) {
    ?>
    <option value="<?php echo $item['manhom']; ?>"><?php echo $item['tennhom']; ?></option>
    <?php
}
    ?>
