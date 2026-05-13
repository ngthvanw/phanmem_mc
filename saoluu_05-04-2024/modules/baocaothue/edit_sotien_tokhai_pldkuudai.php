<?php
include("../../config.php");
$OBJ = new baocaothue();
//debug($_GET);
$sott = $_GET['sott'];
$chonuudai = $_GET['chonuudai'];

database::re_query(" update plthuetndnuudai set chonuudai=".$chonuudai." where sott='{$sott}'");

?>