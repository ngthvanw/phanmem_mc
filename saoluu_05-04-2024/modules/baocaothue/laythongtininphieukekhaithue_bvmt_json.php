<?php
include("../../config.php");
$OBJCT = new baocaothue();
$thangtinhthue = $_GET['thangtinhthue'];
$namtinhthue = $_GET['namtinhthue'];

$tenphieu= $_GET['tenphieu'];
$ngaylap= $_GET['ngaylap'];
$loaitokhai= $_GET['loaitokhai'];

$data = $OBJCT->load_danhsach_tokhai_BVMT($thangtinhthue."-".$namtinhthue,$loaitokhai);// thông tin tồn đầu kỳ

echo json_encode($data);




