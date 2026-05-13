<?php
include("../../config.php");
$OBJ = new ps_chitiet_mavattu();
$maspsaochep = $_GET['maspsaochep'];
$masphientai = $_GET['masphientai'];
//$loaiphieu = $_GET['loaiphieu'];

$sqlsophieusaochep = "select count(sott) as sophieu from chitiet_dinhmuc_sp WHERE masp='{$maspsaochep}'";
$sophieusaochep = $OBJ->re_query($sqlsophieusaochep);
$datasophieusaochep = $OBJ->re_fetch($sophieusaochep);
$sophieusaochep = $datasophieusaochep['sophieu'];
if($sophieusaochep==0){
    echo "THÔNG BÁO \n\n KHÔNG TÌM THẤY DỮ LIỆU CẦN SAO CHÉP.";
    return false;
}
  $sql_copy = "INSERT INTO chitiet_dinhmuc_sp (mapsdm,masp,mavt,dvt,dinhmuc,tylehaohoc,dinhmuckecakhauhao)
               SELECT mapsdm,'{$masphientai}',mavt,dvt,dinhmuc,tylehaohoc,dinhmuckecakhauhao
               FROM chitiet_dinhmuc_sp WHERE masp = '{$maspsaochep}'";
  $OBJ->re_query($sql_copy);

  $update_sott = "SET  @num := 0;
                  UPDATE chitiet_dinhmuc_sp SET sott = @num := (@num+1);";
  $OBJ->re_query($update_sott);
  $OBJ->re_query("ALTER TABLE `chitiet_dinhmuc_sp` ADD PRIMARY KEY(`sott`);");
  $OBJ->re_query("ALTER TABLE `chitiet_dinhmuc_sp` CHANGE `sott` `sott` INT(11) NOT NULL AUTO_INCREMENT;");