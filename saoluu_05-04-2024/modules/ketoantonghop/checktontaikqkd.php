<?php
include("../../config.php");
$OBJKTTH = new ketoantonghop();
$Quy = $_GET['quy'];
echo $tien = $OBJKTTH->SumSoTienKQKD($Quy);



