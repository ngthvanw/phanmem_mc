<?php
include("../../config.php");
$OBJ = new manoidung;
$result = $OBJ->loadListMaNoiDung();
?>
    <option value="ALL">TẤT CẢ - NỘI DUNG</option>
<?php
foreach($result as $item){
    ?>
    <option value="<?php echo $item['mand'] ?>"><?php echo $item['mand']." - ".$item['tennoidung'];  ?></option>
    <?php
}
?>