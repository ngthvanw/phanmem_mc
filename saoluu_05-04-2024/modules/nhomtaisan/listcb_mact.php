<?php
include("../../config.php");
$OBJ = new mact;
$result = $OBJ->loadListMaCT_W();
//debug($result);
foreach($result as $item){
?>
<option value="<?php echo $item['mact'] ?>"><?php echo $item['mact']." - ".$item['tenct'];  ?></option>
<?php	
}
?>
