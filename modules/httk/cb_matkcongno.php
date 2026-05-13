<?php
include("../../config.php");
$OBJ = new hethongtaikhoan();
$matk = $String_tkno_KH;
$OBJ->set_orderby("matk in ($matk)");
$data = $OBJ->loadListHTTK_W();
?>
<option value="ALL">TẤT CẢ - TÀI KHOẢN</option>
<?php
foreach($data as $item){
    ?>
    <option value="<?php echo $item['matk'] ?>"><?php echo $item['matk']." - ". $item['tentk'];  ?></option>
    <?php
}
?>