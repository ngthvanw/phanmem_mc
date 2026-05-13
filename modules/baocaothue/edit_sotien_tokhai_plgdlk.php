<?php
include("../../config.php");
$OBJ = new baocaothue();
$sott = $_GET['sott'];
$maso = $_GET['maso'];
$chiphilaivay = $_GET['chiphilaivay'];
$laitiengui = $_GET['laitiengui'];
$laivaytrutiengui = $_GET['laivaytrutiengui'];
$chiphikhauhao = $_GET['chiphikhauhao'];
$loinhuanthuan = $_GET['loinhuanthuan'];
$ebitda = $_GET['ebitda'];
$laivayduoctru = $_GET['laivayduoctru'];
$chiphilaivaykhongduoctru = $_GET['chiphilaivaykhongduoctru'];
$chiphilaivaykhongduoctruchuyentiep = $_GET['chiphilaivaykhongduoctruchuyentiep'];
$ghichu = check_data($_GET['ghichu']);

$OBJ->re_query(" update plgdlk set chiphilaivay=".$chiphilaivay.",laitiengui=".$laitiengui.",laivaytrutiengui=".$laivaytrutiengui.",chiphikhauhao=".$chiphikhauhao.",loinhuanthuan=".$loinhuanthuan.",ebitda=".$ebitda.",laivayduoctru=".$laivayduoctru.",chiphilaivaykhongduoctru=".$chiphilaivaykhongduoctru.",chiphilaivaykhongduoctruchuyentiep=".$chiphilaivaykhongduoctruchuyentiep.",ghichu='".$ghichu."' where sott='{$sott}'");

?>