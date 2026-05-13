<?php
include("../../config.php");
$OBJ = new MaKho;
$result = $OBJ->loadListMaKho();
foreach ($result as $item) {
    ?>
    <option value="<?php echo $item['makho']; ?>"><?php echo $item['tenkho']; ?></option>
    <?php
}
    ?>
