<?php
include("../../config.php");
$OBJ = new baocaothue();
//debug($_GET);
$sott = $_GET['sott'];
echo $phantram = $_GET['phantram'];
$nam = $_GET['nam'];
$ketunam = $_GET['ketunam'];
//echo " update plthuetndnuudai set phantram='".$phantram."',nam='".$nam."',ketunam='".$ketunam."' where sott='{$sott}'";
database::re_query(" update plthuetndnuudai set phantram='".$phantram."',nam='".$nam."',ketunam='".$ketunam."' where sott='{$sott}'");

?>