<?php
include("../../config.php");
$OBJ = new ps_chitiet_mavattu();
$OBJ->re_query("CREATE TABLE phpmyadmin.`danhsach_kehoach_{$noiluu_phanmem}`(     `sott` BIGINT NOT NULL AUTO_INCREMENT,
                                                                                    `dscongty` VARCHAR(500) NOT NULL,
                                                                                    `tenkd` VARCHAR(500) NOT NULL,
                                                                                    `nguoigui` CHAR(30) NOT NULL,
                                                                                    `ngaygui` DATETIME NOT NULL,
                                                                                    `tungay` DATE NOT NULL,
                                                                                    `denngay` DATE NOT NULL,
                                                                                    `ghichu` TEXT NOT NULL,
                                                                                    `trangthai` INT NOT NULL,
                                                                                    PRIMARY KEY(`sott`)
                                                                                ) ENGINE = InnoDB");

$sub = rand(10,99);
$ID = trim(trim($_SESSION['UserID']).time()).$sub;
$sott = $ID;

$tencongty          =   check_data($_GET['dscongty']);
$nguoigui          =   check_data($_GET['nguoigui']);
$ngaygui     =   check_data($_GET['ngaygui']);
$nguoiduyet          =   check_data($_GET['nguoiduyet']);
$tungay    =   check_data($_GET['tungay']);
$denngay          =   check_data($_GET['denngay']);
$trangthai            =   check_data($_GET['trangthai']);
$ghichu             = check_data($_GET['ghichu']);
$tenkd              =   khu_dau_vn(check_data($_GET['dscongty']));

$sql_ins = "INSERT INTO phpmyadmin.danhsach_kehoach_{$noiluu_phanmem}(`sott`,`dscongty`, `tenkd`, `nguoigui`, `ngaygui`, `tungay`, `denngay`, `ghichu`, `trangthai`)
                                                              VALUE ('{$sott}','{$tencongty}','{$tenkd}','{$nguoigui}','{$ngaygui}','{$tungay}','{$denngay}','{$ghichu}','{$trangthai}');";
database::re_query($sql_ins);
echo "{\"recId\": \"" . $sott . "\"}";
?>