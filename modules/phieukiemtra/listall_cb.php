<?php
include("../../config.php");
$OBJ = new makhachhang;
$result = $OBJ->loadListMaKH_CB();
?>
<option value="ALL">Toàn bộ</option>
<?php
foreach ($result as $item){
    ?>
    <option value="<?php echo $item['makh'] ?>"><?php echo $item['makh']." - ".$item['tenkh']; ?></option>
<?php
}
?>